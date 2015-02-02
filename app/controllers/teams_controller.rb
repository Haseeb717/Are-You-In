class TeamsController < ApplicationController
	before_action :set_team, only: [:show, :edit, :update, :destroy, :add_player, :message, :team_feeds]
	layout false, :only => :new

	respond_to :html

	def index
		redirect_to dashboard_path 
	end

	def show
		respond_with(@team)
	end

	def new
		render :partial => "teams/form", :locals => {:team => Team.new, :team_avatar => TeamAvatar.new}, :layout => false
	end

	def edit
	end

	def create
		@team = Team.new(team_params)
		@team.admin = current_user
		if @team.save
			current_user.teams << @team

			unless params[:team_avatar_id] == "null" || params[:team_avatar_id] == "undefined" || params[:team_avatar_id].nil?
				team_avatar = TeamAvatar.find(params[:team_avatar_id])
				@team.team_avatars << team_avatar
			end

			render json: { :team => @team }, :status => 200
		else
			render json: { error: @team.errors.full_messages.join(',')}, :status => 400
		end
	end

	def update
		begin
			if @team.admin?(current_user)
				@team.update(team_params)

				unless params[:team_avatar_id] == "null" || params[:team_avatar_id] == "undefined" || params[:team_avatar_id].nil?
					team_avatar = TeamAvatar.find(params[:team_avatar_id])
					@team.team_avatars << team_avatar
				end
				
				design = render_to_string(:partial => "teams/team_profile", :locals => { :team => @team, :team_avatar => @team.team_avatars.last || TeamAvatar.new }, :layout => false )
				render json: { :message => "Team #{@team.name.titleize} updated successfully.", :design => design }, :status => 200
			else
				render json: { :alert => "You don't have permissions to update team #{@team.name.titleize}." }, :status => 200
			end			
		rescue Exception => ex
			render json: { :error => ex.message }, :status => 400
		end
	end

	def destroy
		begin
			if @team.admin?(current_user)
				@team.destroy
				render json: { :message => "Team deleted successfullt." }, :status => 200
			else
				render json: { :alert => "You don't have permissions to delete this team." }, :status => 200
			end
		rescue Exception => ex
			render json: { :error => ex.message }, :status => 400
		end
	end

	def add_player
		user = nil
		begin
			if @team.admin?(current_user)
				user = User.where(:email => player_params[:email]).first_or_initialize
				if user.new_record?
					user.assign_attributes(player_params)
					password = Devise.friendly_token.first(10)
					user.assign_attributes(:password => password, :password_confirmation => password)
					user.save!

					UserMailer.registration_request(current_user, user, password).deliver!
				end
				
				if @team.users.include?(user) || user.teams.include?(@team)
					raise "#{user.email} is already added to team #{@team.name.titleize}."
				else
					@team.users << user unless @team.users.include?(user)
					user.teams << @team unless user.teams.include?(@team)
					team_user = TeamsUser.where(:user => user, :team =>@team).first
					team_user.update_attributes(:first_name =>params["first_name"] , :last_name=>params["last_name"])
				end
				
				unless params[:player_avatar_id] == "null" || params[:player_avatar_id] == "undefined"
					player_avatar = PlayerAvatar.find(params[:player_avatar_id])
					user.player_avatars << player_avatar
				end

				design = render_to_string(:partial => "teams/team_players", :locals => { :team => @team }, :layout => false )
				render json: { :message => "Player #{user.email} has been successfully added.", :design => design }, :status => 200
			else
				render json: { :error => "You don't have permissions to add player in team #{@team.name.titleize}." }, :status => 400
			end
		rescue Exception => ex
			error = ex.message
			error = user.errors.collect{|error, name| name}.join(", ") unless user.errors.empty?
			render json: { :error => error }, :status => 400
		end
	end

	def update_player
		team_user = nil
		begin
			@team = Team.where(:id =>params["id"]).first
			team_user = TeamsUser.where(:user => params["user_id"], :team =>params["id"]).first
			if !team_user.nil?
				team_user.update_attributes(:first_name =>params["first_name"] , :last_name=>params["last_name"])
				design = render_to_string(:partial => "teams/team_players", :locals => { :team => @team }, :layout => false )
				render json: { :message => "Player has been successfully updated.", :design => design }, :status => 200
			else
				render json: { :error => "Sorry Player not updated." }, :status => 400
			end
		rescue Exception => ex
			error = ex.message
			error = team_user.errors.collect{|error, name| name}.join(", ") unless team_user.errors.empty?
			render json: { :error => error }, :status => 400
		end
	end

	def message
		begin
			# confirming if user is part of the team
			if current_user and @team.users.include?(current_user)
				message = TeamMessage.new(message_params)
				@team.team_messages << message

				# checking if it is reply of some message
				unless params[:parent].nil? or params[:parent].empty?
					parent = TeamMessage.find(params[:parent])
					parent.replies << message unless parent.parent
				end

				# checking if it is reply to some specific user
				unless params[:reply_to].nil? or params[:reply_to].empty?
					# send message to this user
					user = User.find(params[:reply_to])
					UserMailer.reply_message_notification(message, user).deliver! if user.allow_email
				else
					@team.users.each do |user|
						# send message to full team users
						# confirming if it is reply or a new thread
						UserMailer.reply_message_notification(message, user).deliver! if user.allow_email and parent
						UserMailer.general_message_notification(message, user).deliver! if user.allow_email and !parent
					end
				end
				
				message.save!
			else

			end
		rescue Exception => ex
			
		end

		# refreshing whole team or dashboard feeds
		# also checking if dashboard or team page
		unless params[:page].nil? or params[:page].empty?
			design = render_to_string(:partial => "teams/team_feeds", :locals => {:teams => current_user.teams, :allow_user_to_message => false}, :layout => false)
		else
			design = render_to_string(:partial => "teams/team_feeds", :locals => {:teams => [@team], :allow_user_to_message => true}, :layout => false)
		end
		render json: { :design => design }, :status => 200
	end

	def team_feeds
		begin
			design = render_to_string(:partial => "teams/team_feeds", :locals => {:teams => [@team], :allow_user_to_message => true}, :layout => false)
			render json: { :design => design }, :status => 200
		rescue Exception => e
		end
	end

	private
		def set_team
			@team = Team.find(params[:id])
		end

		def team_params
			params.permit(:name, :sport, :city, :gender, :age, :age_from, :age_to, :public_contact_info)
		end

		def message_params
			params.permit(:text, :user_id)
		end

		def player_params
			params.permit(:first_name, :last_name, :email, :gender, :phone)
		end
end

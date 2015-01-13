class TeamsController < ApplicationController
	before_action :set_team, only: [:show, :edit, :update, :destroy, :add_player]
	layout false, :only => :new

	respond_to :html

	def index
		redirect_to dashboard_path 
	end

	def show
		@team_avatar = @team.team_avatars.last || TeamAvatar.new
		@event = Event.new

		@player_avatar = PlayerAvatar.new
		@player = User.new

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
					raise "#{user.email} is already add to team #{@team.name.titleize}."
				else
					@team.users << user unless @team.users.include?(user)
					user.teams << @team unless user.teams.include?(@team)
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
			render json: { :error => ex.message }, :status => 400
		end
	end

	private
		def set_team
			@team = Team.find(params[:id])
		end

		def team_params
			params.permit(:name, :sport, :city, :gender, :age, :age_from, :age_to, :public_contact_info)
		end

		def player_params
			params.permit(:first_name, :last_name, :email, :gender, :phone)
		end
end

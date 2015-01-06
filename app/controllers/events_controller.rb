class EventsController < ApplicationController
	before_action :set_event, only: [:show, :edit, :update, :destroy, :rsvp]
	after_action :send_invitations, :only => [:create]

	respond_to :html

	def index
		@events = Event.all
		respond_with(@events)
	end

	def show
		respond_with(@event)
	end

	def new
		@event = Event.new
		respond_with(@event)
	end

	def edit
	end

	def create
		begin
			team = Team.find(params[:team_id])
			event = Event.new(event_params)

			if team and team.admin?(current_user)
				if event.save
					team.events << event

					design = render_to_string(:partial => "teams/team_events", :locals => { :team => team }, :layout => false )
					render json: { :design => design }, :status => 200
				else
					render json: { error: @event.errors.full_messages.join(',')}, :status => 400
				end
			else
				render json: { alert: "You don't have permissions to add event in team #{@team.name.titleize}"}, :status => 200
			end
		rescue Exception => ex
			render json: { error: ex.message}, :status => 400
		end
	end

	def rsvp
		rsvp = @event.rsvps.user_rvsp(current_user.id).first_or_initialize
		rsvp.response = params[:response].downcase
		rsvp.save!

		render :partial => "events/rsvp_list", :locals => { :event => @event }
	end

	def update
		begin
			team = Team.find(params[:team_id])
			if team && team.admin?(current_user)
				@event.update(event_params)

				design = render_to_string(:partial => "teams/team_events", :locals => { :team => team }, :layout => false )
				render json: { :design => design }, :status => 200
			else
				render json: { :alert => "You don't have permissions to delete event #{event.title.titleize}." }, :status => 200
			end
		rescue Exception => ex
			render json: { :error => ex.message }, :status => 400
		end
	end

	def destroy
		begin
			team = Team.find(params[:team_id])
			if team && team.admin?(current_user)
				@event.destroy

				design = render_to_string(:partial => "teams/team_events", :locals => { :team => team }, :layout => false )
				render json: { :design => design }, :status => 200
			else
				render json: { :alert => "You don't have permissions to delete event #{event.title.titleize}." }, :status => 200
			end
		rescue Exception => ex
			render json: { :error => ex.message }, :status => 400
		end
	end

	private
	def send_invitations
		begin
			if @event.errors.empty?
				@event.team.users.each do |user|
					unless @event.team.admin?(user)
						invitation = EventInvitation.create(:sender => current_user,
							:reciever => user,
							:event => @event,
							:token => Digest::MD5.hexdigest(current_user.email + user.email + @event.id.to_s + Time.now.to_s)
						)
						EventInvitationMailer.send_invitation(invitation).deliver!
					end
				end
			end
		rescue Exception => ex
			
		end
	end

	def set_event
		@event = Event.find(params[:id])
	end

	def event_params
		params.permit(:title, :category, :opponent, :date, :time, :note, :team_id)
	end
end

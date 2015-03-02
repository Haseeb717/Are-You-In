class EventsController < ApplicationController
	before_action :set_event, only: [:show, :edit, :update, :destroy, :rsvp]
	respond_to :html

	def index
		@events = Event.all
		respond_with(@events)
	end

	def show
		respond_with(@event)
	end

	def new
		render :partial => "events/form", :locals => {:event => Event.new}, :layout => false
	end

	def edit
	end

	def create
		begin
			team = Team.find(params[:team_id])
			@event = Event.new(event_params)
			if team and team.admin?(current_user)
				if @event.save
					team.events << @event

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

		render :partial => "events/event_details", :locals => { :event => @event }

	end

	def update
		begin
			team = Team.find(params[:team_id])
			if team && team.admin?(current_user)
				@event.update(event_params)

				if params[:dashboard] == "true"
					design = render_to_string(:partial => "events/user_events", :locals => { :user_events => current_user.reload.get_all_events }, :layout => false )
				else
					design = render_to_string(:partial => "teams/team_events", :locals => { :team => team }, :layout => false )
				end

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
			team = @event.team
			if team && team.admin?(current_user)
				@event.destroy
				if params[:dashboard] == "true"
					design = render_to_string(:partial => "events/user_events", :locals => { :user_events => current_user.reload.get_all_events }, :layout => false )
				else
					design = render_to_string(:partial => "teams/team_events", :locals => { :team => team }, :layout => false )
				end
				render json: { :design => design }, :status => 200
			else
				render json: { :alert => "You don't have permissions to delete event #{event.title.titleize}." }, :status => 200
			end
		rescue Exception => ex
			render json: { :error => ex.message }, :status => 400
		end
	end

	def cancel
		begin
			event = Event.find(params[:id])
			team = event.team
			if team && team.admin?(current_user)
				event.update(status_params)
				event.team.users.each do |user|
					unless event.team.admin == user
						mail = EventInvitationMailer.cancel_event(user,team,event)
						mail.deliver! if user.allow_email
					end
				end
				if params[:dashboard] == "true"
					design = render_to_string(:partial => "events/user_events", :locals => { :user_events => current_user.reload.get_all_events }, :layout => false )
				else
					design = render_to_string(:partial => "teams/team_events", :locals => { :team => team }, :layout => false )
				end
				render json: { :design => design }, :status => 200
			else
				render json: { :alert => "You don't have permissions to delete event #{event.title.titleize}." }, :status => 200
			end
		rescue Exception => ex
			render json: { :error => ex.message }, :status => 400
		end
	end
	private
	def set_event
		@event = Event.find(params[:id])
	end

	def status_params
		params.permit(:status)
	end

	def event_params
		params.permit(:title, :category, :opponent, :date, :time, :note, :team_id, :where)
	end
end

class EventsController < ApplicationController
	before_action :set_event, only: [:show, :edit, :update, :destroy, :rsvp]
	after_action :invite_players, :only => [:create]

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
		@event = Event.new(event_params)
		begin
			if @event.save
				unless params[:team_id] == "null" || params[:team_id] == "undefined"
					@team = Team.find(params[:team_id])
					@team.events << @event
				end

				render json: { :event => @event }, :status => 200
			else
				render json: { error: @event.errors.full_messages.join(',')}, :status => 400
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
		@event.update(event_params)
		respond_with(@event)
	end

	def destroy
		begin
			@event.destroy
			render json: { :message => "success" }, :status => 200
		rescue Exception => ex
			render json: { :error => ex.message }, :status => 400
		end
	end

	private
	def invite_players
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

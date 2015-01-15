require "twilio-ruby"

class StaticController < ApplicationController
	skip_before_filter :authenticate_user!, :only => [:landing, :invitation_response, :sms_response]
	before_filter :redirect_if_current_user, :only => [:landing]
	layout "landing_layout", :only => [:landing]
	
	def landing
	end

	def dashboard
		redirect_to welcome_path if (current_user.teams.count==0 || current_user.get_all_events.count==0)
	end

	def welcome
	end

	def invitation_response
		# getting invitation
		@invitation = EventInvitation.where(:token => params[:token]).first		
		status = params[:status]

		if @invitation
			# checking if user has respond already
			@rsvp = @invitation.event.rsvps.user_rvsp(@invitation.reciever).first_or_initialize
			if @rsvp and Rsvp.states.include?(status.downcase)
				@rsvp.update_attributes(:response => status.downcase)
				@invitation.update_attributes(:respond_at => Time.now)
			end

			# current user will be signed out if user isn't same
			sign_out current_user if @invitation.reciever != current_user
		else

		end
	end

	def sms_response
		user = nil?
		begin
			from = params[:From]
			from = "0" + from[3..-1]
			body = params[:Body]
			raise "invalid parameters." if from.nil? || body.nil?

			# getting event id and response status from message body
			event_id, status = body.split(" ")[0..1]

			# confirming if event exists
			event = Event.find(event_id)
			user = User.where(:phone => from).first
			
			# confirming user and response status is valid
			if user and Rsvp.states.include?(status.downcase)
				@rsvp = event.rsvps.user_rvsp(user).first_or_initialize
				@rsvp.update_attributes(:response =>status.downcase)

			else
				raise "Response is invalid.Your response should be event_id and your status"
			end
			# response = "Your response has been noted successfully"
			twiml = Twilio::TwiML::Response.new do |r|
				r.Message "Your response has been noted successfully"
			end
			render :text => twiml.text
		rescue Exception => ex
			#response = "Your response is invalid"
			twiml = Twilio::TwiML::Response.new do |r|
				r.Message "We could not something...."
			end
			render :text => twiml.text
		end
	end

	private
	def redirect_if_current_user
		redirect_to after_sign_in_path_for(current_user) if current_user
	end

end

class StaticController < ApplicationController
	skip_before_filter :authenticate_user!, :only => [:landing, :invitation_response]
	before_filter :redirect_if_current_user, :only => [:landing]
	layout "landing_layout", :only => [:landing]
	
	def landing
	end

	def dashboard
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

	private
	def redirect_if_current_user
		redirect_to after_sign_in_path_for(current_user) if current_user
	end

end

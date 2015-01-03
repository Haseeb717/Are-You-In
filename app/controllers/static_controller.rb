class StaticController < ApplicationController
	skip_before_filter :authenticate_user!, :only => [:landing]
	before_filter :redirect_if_current_user, :only => [:landing]
	layout "landing_layout", :only => [:landing]
	
	def landing
		
	end

	def dashboard
	end

	def invitation_response
		@invitation = EventInvitation.where(:token => params[:token]).first
		status = params[:status]

		if @invitation
			@rsvp = @invitation.event.rsvps.user_rvsp(@invitation.reciever).first_or_initialize
			if @rsvps and Rsvp.states.include?(states.downcase)
				@rsvps.update_attributes(:response => status.downcase)
				@invitation.update_attributes(:respond_at => Time.now)
			end

			if invitation.reciever != current_user
				sign_out current_user
			end
		else

		end
	end

	private
	def redirect_if_current_user
		redirect_to after_sign_in_path_for(current_user) if current_user
	end

end

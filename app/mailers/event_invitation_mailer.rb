class EventInvitationMailer < ActionMailer::Base
	default :from => MAILER_CONFIG[:from]

	def send_event_invitation(invitation)
		@invitation = invitation
		name = (@invitation.reciever.name || @invitation.reciever.first_name).titleize
		
		mail(:to => "#{name} <#{@invitation.reciever.email}>",
			:subject => "#{@invitation.sender.name.titleize} has invited you on #{@invitation.event.title.titleize}"
		)
	end

	def invitation_final_report(invitation)
		@invitation = invitation
		name = (@invitation.reciever.name || @invitation.reciever.first_name).titleize
		
		mail(:to => "#{name} <#{@invitation.reciever.email}>",
			:subject => "#{@invitation.event.title.titleize} Guest List"
		)
	end

	def cancel_event(reciever,team,event)
		@team = team
		@event = event
		name = (reciever.name || reciever.first_name).titleize
  		mail(:to => "#{name} <#{reciever.email}>",
			:subject => "Event cancel"
		)
	end

	def weekly_events(reciever,events)
		byebug
		@reciever = reciever
		@events = events
		name = (reciever.name || reciever.first_name).titleize
		mail(:to => "#{name} <#{reciever.email}>",
			:subject => "Weekly events list"
		)
	end
end

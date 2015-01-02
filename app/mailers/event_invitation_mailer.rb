class EventInvitationMailer < ActionMailer::Base
	default :from => MAILER_CONFIG[:from]

	def send_invitation(invitation)

		@invitation = invitation

		@sender = invitation.sender
		@reciever = invitation.reciever
		@event = invitation.event
		@team = @event.team
		
		mail(:to => "#{@reciever.name.titleize} <#{@reciever.email}>", :subject => "#{@sender.name.titleize} has invited you on #{@event.title.titleize}")
	end


end

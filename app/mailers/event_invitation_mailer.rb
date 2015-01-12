class EventInvitationMailer < ActionMailer::Base
	default :from => MAILER_CONFIG[:from]

	def send_invitation(invitation)

		@invitation = invitation		
		name = (@invitation.reciever.name || @invitation.reciever.first_name).titleize
		
		mail(:to => "#{name} <#{@invitation.reciever.email}>",
			:subject => "#{@invitation.sender.name.titleize} has invited you on #{@invitation.event.title.titleize}"
		)
	end


end

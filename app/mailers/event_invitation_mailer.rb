class EventInvitationMailer < ActionMailer::Base
	default :from => MAILER_CONFIG[:from]

	def send_invitation(invitation)
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
			:subject => "#{@invitation.sender.name.titleize} has invited you on #{@invitation.event.title.titleize}"
		)
		
	end

	def send_sms(invitation)

		@invitation = invitation
		@sender = invitation.sender
		@reciever = invitation.reciever
		@event = invitation.event
		@team = @event.team
		name = (@reciever.name || @reciever.first_name).titleize
		
		byebug
		mail(:to => "#{name} <#{@reciever.email}>", :subject => "#{@sender.name.titleize} has invited you on #{@event.title.titleize}")
	end

end

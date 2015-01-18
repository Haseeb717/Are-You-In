class UserMailer < ActionMailer::Base
  default :from => MAILER_CONFIG[:from]
  	
  	def registration_request(sender, reciever, password)	
  		@sender = sender
  		@reciever = reciever
  		@password = password 
		mail(:to => "#{reciever.name} <#{reciever.email}>", :subject => "Registration of Are-You-In")
	end

	def general_message_notification(message, user)
		@message = message
		@user = user

		mail(:to => "#{user.name} <#{user.email}>", :subject => "#{message.team.name.titleize}: #{message.user.name.titleize} has posted new comment.")
	end

	def reply_message_notification(message, user)
		@message = message
		@user = user
		
		mail(:to => "#{user.name} <#{user.email}>", :subject => "#{message.team.name.titleize}: #{message.user.name.titleize} has posted new reply.")
	end
end

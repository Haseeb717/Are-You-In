class UserMailer < ActionMailer::Base
  default :from => MAILER_CONFIG[:from]
  	
  	def registration_request(sender, reciever, password,team)	
  		@sender = sender
  		@reciever = reciever
  		@password = password 
  		@team = team
		mail(:to => "#{reciever.name} <#{reciever.email}>", :subject => "You were added to #{team.name}")
	end

	def general_message_notification(message, user)
		@message = message
		@user = user
		dummy_address = "notification+all@are-you.in"
		mail(:to => "#{user.name} <#{user.email}>,<#{dummy_address}>", :subject => "#{message.team.name.titleize}: #{message.user.name.titleize} has posted new comment.")
	end

	def reply_message_notification(message, user)
		@message = message
		@user = user
		dummy_address = "notification+all@are-you.in"
		mail(:to => "#{user.name} <#{user.email}>,<#{dummy_address}>", :subject => "#{message.team.name.titleize}: #{message.user.name.titleize} has posted new reply.")
	end
end

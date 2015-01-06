class UserMailer < ActionMailer::Base
  default :from => MAILER_CONFIG[:from]
  	
  	def registration_request(sender, reciever, password)	
  		@sender = sender
  		@reciever = reciever
  		@password = password 
		mail(:to => "#{reciever.name} <#{reciever.email}>", :subject => "Registration of Are-You-In")
	end
end

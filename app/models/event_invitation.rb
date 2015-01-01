class EventInvitation < ActiveRecord::Base
	belongs_to :sender, :class_name => "User", :foreign_key => "sender_id"
	belongs_to :reciever, :class_name => "User", :foreign_key => "reciever_id"

	belongs_to :event

	after_create :send_invitation

	private
	def send_invitation
		sender = self.sender.name.titleize
		reciever = self.reciever.name.titleize
		event = self.event
		team = event.team

		mail = Mail.new do
			from		"no-reply@run.com"
			to			self.reciever.email
			subject		"#{sender} has invite you on #{event.title.titleize}"
			body		"Hi #{reciever}, <br/> You are being invited by #{sender} to attend #{event.title.titleize} on #{event.date.strftime('%A, %b')} #{event.date.day.ordinalize} at #{team.city.titleize} at #{event.time.strftime('%I:%M %p')}"
		end

		mail.delivery_method :smtp
		mail.deliver
	end
end

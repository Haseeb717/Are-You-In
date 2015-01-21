require "sanitize"
require "twilio-ruby"

class Event < ActiveRecord::Base
	include Webhookable
	belongs_to :team
	has_many :rsvps, :dependent => :destroy
	has_many :event_invitations, :dependent => :destroy

	validates :title, :presence => true, :length => { :minimum => 5}
	validates_presence_of :date
	validates :time, :presence => true

	before_save do
		self.title = self.title.downcase if self.title
		self.opponent = self.opponent.downcase if self.opponent
		self.category = self.category.downcase if self.category

		self.opponent = nil unless self.category == "game"
	end

	def users_in
		self.rsvps.in.collect{|rsvp| rsvp.user}
	end

	def users_out
		self.rsvps.out.collect{|rsvp| rsvp.user}
	end

	def users_not_sure
		self.rsvps.maybe.collect{|rsvp| rsvp.user}
	end

	def admin?(user)
		self.team.admin?(user)
	end

	# cron to send event invitations
	def self.initial_notifications
		# get events whose initial invitation isn't sent
		events = Event.where(:initial_call => false)
		events.each do|event|
			# combining event date and time into datetime for validation
			# send email when X hours remains in event's start
			event_datetime = DateTime.new(event.date.year, event.date.month, event.date.day, event.time.hour, event.time.min, event.time.sec, event.time.zone)
			next unless (DateTime.now .. DateTime.now + INVITATION_CONFIG[:initial_call].hour).cover?(event_datetime)

			# send invitation to every user, except admin
			event.team.users.each do |user|
				begin
					unless event.team.admin == user
						invitation = EventInvitation.where(:sender => event.team.admin, :reciever => user, :event => event).first_or_create
						invitation.update_attributes(:token => Digest::MD5.hexdigest(event.team.admin.email + user.email + event.id.to_s + Time.now.to_s))
						mail = EventInvitationMailer.send_event_invitation(invitation)

						mail.deliver! if user.allow_email
						send_text_message(user.phone, mail.body.to_s) if user.phone and user.allow_sms
					end
				rescue Exception => ex
				end
			end
			event.update_attributes(:initial_call => true)
		end
	end

	#cron to send event invitations only to maybe
	def self.reminder_notifications
		# send event invitation to those users whose response is "Maybe, Not Sure"
		events = Event.where(:reminder_call => false, :initial_call => true)
		events.each do|event|
			# combining event date and time into datetime for validation
			# send email when X hours remains in event's start
			event_datetime = DateTime.new(event.date.year, event.date.month, event.date.day, event.time.hour, event.time.min, event.time.sec, event.time.zone)
			next unless (DateTime.now .. DateTime.now + INVITATION_CONFIG[:reminder_call].hour).cover?(event_datetime)

			# send invitation to user whose status is not sure
			event.users_not_sure.each do |user|
				begin
					unless event.team.admin == user
						invitation = EventInvitation.where(:sender => event.team.admin, :reciever => user, :event => event).first_or_create
						invitation.update_attributes(:token => Digest::MD5.hexdigest(event.team.admin.email + user.email + event.id.to_s + Time.now.to_s))
						mail = EventInvitationMailer.send_event_invitation(invitation)

						mail.deliver! if user.allow_email
						send_text_message(user.phone, mail.body.to_s) if user.phone and user.allow_sms
					end
				rescue Exception => ex
				end
			end
			
			event.update_attributes(:reminder_call => true)
		end
	end

	#cron to send event's final invitations to all users with extra information
	def self.final_notifications
		# send event invitation to all users
		events = Event.where(:final_call => false, :initial_call => true, :reminder_call => true)
		events.each do|event|
			# combining event date and time into datetime for validation
			# send email when X hours remains in event's start
			event_datetime = DateTime.new(event.date.year, event.date.month, event.date.day, event.time.hour, event.time.min, event.time.sec, event.time.zone)
			next unless (DateTime.now .. DateTime.now + INVITATION_CONFIG[:final_call].hour).cover?(event_datetime)

			# send invitation to all users
			event.team.users.each do |user|
				begin
					unless event.team.admin == user
						invitation = EventInvitation.where(:sender => event.team.admin, :reciever => user, :event => event).first
						mail = EventInvitationMailer.invitation_final_report(invitation)

						mail.deliver! if user.allow_email
						send_text_message(user.phone, mail.body.to_s) if user.phone and user.allow_sms
					end
				rescue Exception => ex
				end
			end
			event.update_attributes(:final_call => true)
		end
	end

	def self.send_text_message(to, body, from = nil)
		TWILIO_CLIENT.account.messages.create(:from => from || TWILIO_CONFIG[:number], :to => to, :body => sanitize_to_plain_text(body))
	end

	def self.sanitize_to_plain_text(body)
		body = Sanitize.fragment(body.to_s, :elements => ["a"], :attributes => {"a" => ["href"]})
		Nokogiri::HTML(body).xpath("//a").each do |tag|
			body = body.gsub(tag.to_html, tag.text + "\n" + tag.attributes["href"].value)
		end
		body.gsub("\n ", "\n").gsub("\t", "").gsub(/[\n]+/, "\n");
	end
end

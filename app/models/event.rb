require 'twilio-ruby' 

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
			organizer = event.team.admin
			# send invitation to every user, except admin
			event.team.users.each do |user|
				begin

					unless organizer == user
						invitation = EventInvitation.where(:sender => organizer, :reciever => user, :event => event).first_or_create
						invitation.update_attributes(:token => Digest::MD5.hexdigest(organizer.email + user.email + event.id.to_s + Time.now.to_s))
						EventInvitationMailer.send_invitation(invitation).deliver! if user.allow_email
						e = Event.new
						e.send_sms(invitation) if user.allow_sms
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
			
			organizer = event.team.admin
			# send invitation to user whose status is not sure
			event.users_not_sure.each do |user|
				begin
					unless organizer == user
						invitation = EventInvitation.where(:sender => organizer, :reciever => user, :event => event).first_or_create
						invitation.update_attributes(:token => Digest::MD5.hexdigest(organizer.email + user.email + event.id.to_s + Time.now.to_s))
						EventInvitationMailer.send_invitation(invitation).deliver! if user.allow_email
						x = Event.new
						x.reminder_sms(invitation) if user.allow_sms
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
		events = Event.where(:final_call => false, :initial_call => true, :reminder_call => true).take(1)
		events.each do|event|
			# combining event date and time into datetime for validation
			# send email when X hours remains in event's start
			event_datetime = DateTime.new(event.date.year, event.date.month, event.date.day, event.time.hour, event.time.min, event.time.sec, event.time.zone)
			#next if DateTime.now + INVITATION_CONFIG[:final_call].hour < event_datetime

			organizer = event.team.admin
			# send invitation to all users
			event.team.users.each do |user|
				begin
					unless organizer == user
						invitation = EventInvitation.where(:sender => organizer, :reciever => user, :event => event).first
						EventInvitationMailer.invitation_final_report(invitation).deliver!
						z = Event.new
						z.final_sms(invitation)
					end
				rescue Exception => ex
					
				end
			end
			event.update_attributes(:final_call => true)
		end
	end

	def send_sms(invitation)
		# make yml for twilio
		body = EventInvitationMailer.send_sms(invitation).body.to_s
		TWILIO_CLIENT.account.messages.create(:from => TWILIO_CONFIG[:number], 
			:to => "+923364568667",
			:body => body);

		# bitly = Bitly.client
		# account_sid = 'AC38942978f76f0fc338e4c633c15f6ec1'
		# auth_token = '3577da211579071cc2cf02134cb78a77'
		# set up a client to talk to the Twilio REST API
		# @client = Twilio::REST::Client.new account_sid, auth_token
		# from = '+15017644999'
		# events = Event.where(date >= ?, DateTime.now.to_date)
		# events.each do|event|
			# organizer = event.team.admin
			# send invitation to every user, except admin
			# event.team.users.each do |user|
				# begin
					#unless organizer == user
					# invitation = EventInvitation.where(:sender => organizer, :reciever => user, :event => event).first_or_create
					# invitation.update_attributes(:token => Digest::MD5.hexdigest(organizer.email + user.email + event.id.to_s + Time.now.to_s))
					# body = EventInvitationMailer.send_sms(invitation,bitly).body
					# @client.account.messages.create({
						# :from => '+15017644999'
						# :to => '+923364568667'
						# :body => body, , # })
						# end
					# rescue Exception => ex"
				# end
			# end
		# end

    end

    def reminder_sms(invitation)
    	body = EventInvitationMailer.send_sms(invitation).body.to_s
		TWILIO_CLIENT.account.messages.create(:from => TWILIO_CONFIG[:number], 
			:to => "+923364568667",
			:body => body);
    end

    def final_sms(invitation)
    	body = EventInvitationMailer.final_sms(invitation).body.to_s
    	TWILIO_CLIENT.account.messages.create(:from => TWILIO_CONFIG[:number], 
			:to => "+923364568667",
			:body => body);
	end

	
end

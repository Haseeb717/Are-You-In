class Event < ActiveRecord::Base
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
			next if DateTime.now + INVITATION_CONFIG[:initial_call].hour < event_datetime

			organizer = event.team.admin
			# send invitation to every user, except admin
			event.team.users.each do |user|
				begin
					unless organizer == user
						invitation = EventInvitation.where(:sender => organizer, :reciever => user, :event => event).first_or_create
						invitation.update_attributes(:token => Digest::MD5.hexdigest(organizer.email + user.email + event.id.to_s + Time.now.to_s))

						EventInvitationMailer.send_invitation(invitation).deliver!
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
			next if DateTime.now + INVITATION_CONFIG[:reminder_call].hour < event_datetime

			organizer = event.team.admin
			# send invitation to user whose status is not sure
			event.users_not_sure.each do |user|
				begin
					unless organizer == user
						invitation = EventInvitation.where(:sender => organizer, :reciever => user, :event => event).first_or_create
						invitation.update_attributes(:token => Digest::MD5.hexdigest(organizer.email + user.email + event.id.to_s + Time.now.to_s))

						EventInvitationMailer.send_invitation(invitation).deliver!
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
			next if DateTime.now + INVITATION_CONFIG[:final_call].hour < event_datetime

			organizer = event.team.admin
			# send invitation to all users
			event.team.users.each do |user|
				begin
					unless organizer == user
						invitation = EventInvitation.where(:sender => organizer, :reciever => user, :event => event).first
						EventInvitationMailer.invitation_final_report(invitation).deliver!
					end
				rescue Exception => ex
					
				end
			end
			event.update_attributes(:final_call => true)
		end
	end

end
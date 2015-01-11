class Event < ActiveRecord::Base
	belongs_to :team
	has_many :rsvps, :dependent => :destroy
	has_many :event_invitations, :dependent => :destroy

	validates :title, :presence => true, :length => { :minimum => 5}
	validates_presence_of :date
	validates :time, :presence => true

	def users_in
		self.rsvps.in.collect{|rsvp| rsvp.user.name.titleize}.join(", ")
	end

	def users_out
		self.rsvps.out.collect{|rsvp| rsvp.user.name.titleize}.join(", ")
	end

	def users_not_sure
		self.rsvps.maybe.collect{|rsvp| rsvp.user.name.titleize}.join(", ")
	end

	def admin?(user)
		self.team.admin?(user)
	end

	def maybe_users
		self.rsvps.maybe.collect{|rsvp| rsvp.user}
	end
	# cron to send event invitations
	def self.send_notifications
		
		# get future events
		events = Event.where("date >= ?", DateTime.now.to_date)
		events.each do|event|
			organizer = event.team.admin
			# send invitation to every user, except admin
			event.team.users.each do |user|
				begin
					unless organizer == user
						invitation = EventInvitation.where(:reciever_id=>user.id,:event_id=>event.id,:sender_id=>organizer ).first_or_create
						invitation.update_attributes(:token => Digest::MD5.hexdigest(organizer.email + user.email + event.id.to_s + Time.now.to_s))
						EventInvitationMailer.send_invitation(invitation).deliver!
					end
				rescue Exception => ex
					
				end
			end
		end
	end

	#cron to send event invitations only to maybes
	def self.maybes_notifications
		# get future events
		events = Event.where("date >= ?", DateTime.now.to_date)
		events.each do|event|
			organizer = event.team.admin
			users = event.maybe_users
			
			# send invitation to every user, except admin
			users.each do |user|
				begin
					unless organizer == user
						invitation = EventInvitation.create(:sender => organizer, :reciever => user, :event => event, :token => Digest::MD5.hexdigest(organizer.email + user.email + event.id.to_s + Time.now.to_s))
						EventInvitationMailer.send_invitation(invitation).deliver!
					end
				rescue Exception => ex
					
				end
			end
		end
	end




end

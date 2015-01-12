require 'twilio-ruby' 

class Event < ActiveRecord::Base
	include Webhookable
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
						invitation = EventInvitation.where(:reciever_id=>user.id,:event_id=>event.id,:sender_id=>organizer.id ).first_or_create
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

	def self.send_sms
		account_sid = 'AC38942978f76f0fc338e4c633c15f6ec1' 
      	auth_token = '3577da211579071cc2cf02134cb78a77'
		# set up a client to talk to the Twilio REST API 
    	@client = Twilio::REST::Client.new account_sid, auth_token 
 		from = '+15017644999'
    	events = Event.where("date >= ?", DateTime.now.to_date)
		events.each do|event|
			organizer = event.team.admin
			# send invitation to every user, except admin
			event.team.users.each do |user|
				begin
					unless organizer == user
						invitation = EventInvitation.create(:sender => organizer, :reciever => user, :event => event, :token => Digest::MD5.hexdigest(organizer.email + user.email + event.id.to_s + Time.now.to_s))
						byebug
						body = EventInvitationMailer.send_sms(invitation).body
						@client.account.messages.create({
          					:from => '+15017644999', 
          					:to => '+923364568667', 
          					:body => body,  
      					})
					end
				rescue Exception => ex
					
				end
			end
		end
	end


end

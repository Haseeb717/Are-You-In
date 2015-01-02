class Event < ActiveRecord::Base
	belongs_to :team
	has_many :rsvps, :dependent => :destroy
	has_many :event_invitations, :dependent => :destroy

	validates :title, :presence => true, :length => { :minimum => 5}
	validates_presence_of :date
	validates :time, :presence => true

	def users_in
		self.rsvps.in.collect{|rsvp| rsvp.user.name}.join(", ")
	end

	def users_out
		self.rsvps.out.collect{|rsvp| rsvp.user.name}.join(", ")
	end

	def users_not_sure
		self.rsvps.maybe.collect{|rsvp| rsvp.user.name}.join(", ")
	end

end

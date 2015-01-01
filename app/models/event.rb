class Event < ActiveRecord::Base
	belongs_to :team
	has_many :rsvps, :dependent => :destroy


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

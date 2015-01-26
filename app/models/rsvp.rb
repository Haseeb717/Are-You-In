class Rsvp < ActiveRecord::Base

	belongs_to :user
	belongs_to :event

	scope :user_rvsp, lambda { |user_id| where(:user_id => user_id)  }

	scope :in, -> { where(:response => "in") }
	scope :maybe, -> { where(:response => "maybe") }
	scope :out, -> { where(:response => "out") }

	def self.states
		["in", "maybe", "out"]
	end

	def self.in_options
		["okay","oka","in","done","yeah","sure","yup","yea","yes","OK","ok","k","K"].collect{|status| status.downcase}
	end

	def self.out_options
		["no","sorry","out","note","nope","cant"].collect{|status| status.downcase}
	end

	def self.maybe_options
		["maybe","when","try","may be","letsee","let see","hope so","may"].collect{|status| status.downcase}
	end

	# scope :rsvp, lambda { |user_id, team_id| where(:user_id => user_id, :team_id => team_id)  }
end

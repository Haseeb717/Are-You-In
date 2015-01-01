class Rsvp < ActiveRecord::Base

	belongs_to :user
	belongs_to :event

	scope :user_rvsp, lambda { |user_id| where(:user_id => user_id)  }

	scope :in, -> { where(:response => "in") }
	scope :maybe, -> { where(:response => "maybe") }
	scope :out, -> { where(:response => "out") }

	# scope :rsvp, lambda { |user_id, team_id| where(:user_id => user_id, :team_id => team_id)  }
end

class Event < ActiveRecord::Base
	belongs_to :team
	has_many :rsvps, :dependent => :destroy
end

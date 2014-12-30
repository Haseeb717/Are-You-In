class Team < ActiveRecord::Base	
	belongs_to :user
	has_many :team_avatars, :dependent => :destroy

	has_many :events, :dependent => :destroy

end

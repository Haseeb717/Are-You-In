class Team < ActiveRecord::Base	
	has_and_belongs_to_many :users
	has_many :team_avatars, :dependent => :destroy

	has_many :events, :dependent => :destroy

end

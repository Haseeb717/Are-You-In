class Team < ActiveRecord::Base	
	has_and_belongs_to_many :users
	has_many :team_avatars, :dependent => :destroy

	belongs_to :admin, :class_name => "User", :foreign_key => "admin_id"
	has_many :events, :dependent => :destroy


end

class Team < ActiveRecord::Base	
	has_and_belongs_to_many :users
	has_many :team_avatars, :dependent => :destroy

	belongs_to :admin, :class_name => "User", :foreign_key => "admin_id"
	has_many :events, :dependent => :destroy

	validates :name, :presence => true, :length => { :minimum => 5}
	validates_presence_of :sport
	validates :city, :presence => true

	def is_admin?(user)
		self.admin == user
	end
end

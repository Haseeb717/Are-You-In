class Team < ActiveRecord::Base	
	has_and_belongs_to_many :users
	has_many :team_avatars, :dependent => :destroy

	belongs_to :admin, :class_name => "User", :foreign_key => "admin_id"
	has_many :events, :dependent => :destroy

	validates :name, :presence => true, :length => { :minimum => 5}
	validates_presence_of :sport
	validates :city, :presence => true

	before_save do
		self.age = self.age.downcase if self.age
		self.name = self.name if self.name
		self.sport = self.sport if self.sport
		self.city = self.city if self.city
		self.gender = self.gender.downcase if self.gender

		self.age_to = self.age_from = nil unless self.age == "youth"
	end

	def admin?(user)
		self.admin == user
	end
end

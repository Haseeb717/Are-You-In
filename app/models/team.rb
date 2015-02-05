class Team < ActiveRecord::Base	
	has_many :teams_users
	has_many :users, through: :teams_users
	has_many :team_avatars, :dependent => :destroy

	belongs_to :admin, :class_name => "User", :foreign_key => "admin_id"
	has_many :events, :dependent => :destroy
	has_many :team_messages, :dependent => :destroy

	validates :name, :presence => true, :length => { :minimum => 5}
	validates_presence_of :sport
	validates :city, :presence => true
	validates :code, :uniqueness => {message: "Team with this code already exists."}, :if => "code.present?"

	before_save do
		self.age = self.age.downcase if self.age
		self.name = self.name.downcase if self.name
		self.sport = self.sport.downcase if self.sport
		self.city = self.city.downcase if self.city
		self.gender = self.gender.downcase if self.gender
		self.code = self.code.gsub(/\s+/, "") if self.code

		self.age_to = self.age_from = nil unless self.age == "youth"
	end

	def admin?(user)
		self.admin == user
	end
end

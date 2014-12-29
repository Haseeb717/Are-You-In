class User < ActiveRecord::Base
	# Include default devise modules. Others available are:
	# :confirmable, :lockable, :timeoutable and :omniauthable
	devise :database_authenticatable, :registerable, :omniauthable,
			:recoverable, :rememberable, :trackable, :validatable

	has_many :identities, :dependent => :destroy
	has_many :teams, :dependent => :destroy

	def self.find_or_create(auth)

		# If user exists then update else create new user
		email = auth.info.email || auth.uid + "@twitter.com"
		user = User.where("email = '#{email}'").first_or_initialize
		user.email = email
		user.name = auth.info.name
		user.save!(:validate => false)

		user
	end

	def is_team_admin?(team)
		self.teams.include?(team)
	end

end

class User < ActiveRecord::Base
	# Include default devise modules. Others available are:
	# :confirmable, :lockable, :timeoutable and :omniauthable
	devise :database_authenticatable, :registerable, :omniauthable,
			:recoverable, :rememberable, :trackable, :validatable

	has_many :identities, :dependent => :destroy
	has_many :teams, :dependent => :destroy

	attr_accessor :login

	def self.find_or_create(auth)

		# If user exists then update else create new user
		email = auth.info.email || auth.uid + "@twitter.com"
		user = User.where("email = '#{email}'").first_or_initialize
		user.email = email
		user.name = auth.info.name
		user.save!(:validate => false)

		user
	end

	def get_all_events
		events = Array.new
		self.teams.each do |team|
			events = events + team.events
		end
		
		events.sort_by(&:time).group_by(&:date)
	end

	def is_team_admin?(team)
		self.teams.include?(team)
	end

	private
	def self.find_for_database_authentication(warden_conditions)
      conditions = warden_conditions.dup
      if login = conditions.delete(:login)
        where(conditions).where(["phone = :value OR lower(email) = :value", { :value => login.downcase }]).first
      else
        where(conditions).first
      end
    end

end

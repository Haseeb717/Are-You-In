class User < ActiveRecord::Base
	# Include default devise modules. Others available are:
	# :confirmable, :lockable, :timeoutable and :omniauthable
	devise :database_authenticatable, :registerable, :omniauthable,
			:recoverable, :rememberable, :trackable, :validatable

	has_many :identities, :dependent => :destroy
	has_many :teams_users
	has_many :teams, through: :teams_users
	has_many :team_avatars, :dependent => :destroy
	has_many :player_avatars, :dependent => :destroy
	has_many :event_invitations, :foreign_key => "sender_id", :dependent => :destroy
	has_many :event_invitations, :foreign_key => "reciever_id", :dependent => :destroy
	has_many :rsvps, :dependent => :destroy
	has_many :team_messages, :dependent => :destroy

	before_save do
		# user name
		self.first_name = self.first_name.downcase if self.first_name
		self.last_name = self.last_name.downcase if self.last_name
		self.name = "#{self.first_name} #{self.last_name}" if self.name.nil? || self.name.empty?
		self.name = self.name.downcase if self.name

		# other details
		self.gender = self.gender.downcase if self.gender
		self.gender = nil unless GENDER.include?(self.gender)

		self.city = self.city.downcase if self.city
		self.country = self.country.downcase if self.country
		self.country = nil unless COUNTRIES.collect{|code| code.first.downcase}.include?(self.country)
		self.state = self.state.downcase if self.state
		self.state = nil unless STATES.collect{|code| code.first.downcase}.include?(self.state)
	end

	validate :phone_number_with_code, :if => "phone.present?"
	validates :phone, :uniqueness => {message: "Player with this phone already exists."}, :if => "phone.present?"
	
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
		events.uniq.sort_by(&:time).group_by(&:date)
	end

	def is_team_admin?(team)
		self.teams.include?(team)
	end

	def get_all_message_feeds(teams)
		message_feeds = []
		teams.each do |team|
			message_feeds += team.team_messages
		end

		message_feeds
	end

	private
	# login using email or mobile
	def self.find_for_database_authentication(warden_conditions)
		conditions = warden_conditions.dup
		if login = conditions.delete(:login)
			where(conditions).where(["phone = :value OR lower(email) = :value", { :value => login.downcase }]).first
		else
			where(conditions).first
		end
	end

	def phone_number_with_code
		# extracting phone number by ignoring all special and normal charaters
		number = self.phone.gsub(/[^\d]/, '')
		if number.length == 10
			self.phone = "+1" + number
		elsif number.length == 11 and number.start_with?("1")
			self.phone = "+" + number
		elsif number.length == 12 and number.start_with?("+1")
			self.phone = number
		else
			errors.add(:phone, "Please enter 10 digit valid phone number")
		end
	end

end

class TeamMessage < ActiveRecord::Base
	belongs_to :user
	belongs_to :team

	belongs_to :parent, :class_name => "TeamMessage", :foreign_key => "parent_id"
	has_many :replies, :class_name => "TeamMessage", :foreign_key => "parent_id"

	validates :text, :presence => true, :allow_blank => false
	validates_presence_of :team_id
	validates_presence_of :user_id

	scope :parent_messages, -> { where(:parent => nil) }

	before_save do
		self.text = self.text.strip
	end
	
end

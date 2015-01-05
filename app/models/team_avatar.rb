class TeamAvatar < ActiveRecord::Base
	belongs_to :team
	belongs_to :user
	
	has_attached_file :avatar, :styles => { :medium => "315x178>", :thumb => "100x100>" },
					  :path => ":rails_root/public/teams/:id/:style/:basename.:extension",
					  :url => "/teams/:id/:style/:basename.:extension",
					  :default_url => "/teams/missing.png"
	
	validates_attachment :avatar, 
		:presence => true,
		:content_type => { :content_type => /\Aimage\/.*\Z/ },
		:size => { :less_than => 1.megabyte }

end

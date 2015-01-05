class PlayerAvatar < ActiveRecord::Base
	belongs_to :user
	
	has_attached_file :avatar, :styles => { :medium => "300x300>", :thumb => "100x100>" },
					  :path => ":rails_root/public/users/:id/:style/:basename.:extension",
					  :url => "/users/:id/:style/:basename.:extension",
					  :default_url => "/users/missing.png"
	
	validates_attachment :avatar, 
		:presence => true,
		:content_type => { :content_type => /\Aimage\/.*\Z/ },
		:size => { :less_than => 1.megabyte }
end

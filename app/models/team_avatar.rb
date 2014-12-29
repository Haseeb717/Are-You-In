class TeamAvatar < ActiveRecord::Base
	belongs_to :team
	
	has_attached_file :avatar, :styles => { :medium => "300x300>", :thumb => "100x100>" },
					  :path => ":rails_root/public/avatar/:id/:style/:basename.:extension"
	
	validates_attachment :avatar, 
		:presence => true,
		:content_type => { :content_type => /\Aimage\/.*\Z/ },
		:size => { :less_than => 1.megabyte }

end

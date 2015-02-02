class TeamsUser < ActiveRecord::Base
	belongs_to :user
  	belongs_to :team

  	before_save do
  		
  	end
end
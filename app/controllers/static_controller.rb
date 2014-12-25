class StaticController < ApplicationController
	skip_before_filter :authenticate_user!
	layout "landing_layout"
	
	def landing
		
	end

end

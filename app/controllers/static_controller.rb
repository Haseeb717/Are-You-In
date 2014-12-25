class StaticController < ApplicationController
	skip_before_filter :authenticate_user!, :only => [:landing]
	layout "landing_layout"
	
	def landing
		
	end

end

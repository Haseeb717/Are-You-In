class StaticController < ApplicationController
	skip_before_filter :authenticate_user!, :only => [:landing]
	layout "landing_layout", :only => [:landing]
	
	def landing
		
	end

	def dashboard
		
	end

end

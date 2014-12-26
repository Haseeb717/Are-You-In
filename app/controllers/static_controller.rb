class StaticController < ApplicationController
	skip_before_filter :authenticate_user!, :only => [:landing]
	before_filter :redirect_if_current_user, :only => [:landing]
	layout "landing_layout", :only => [:landing]
	
	def landing
		
	end

	def dashboard
		@team = Team.new
		@team_avatar = TeamAvatar.new
	end

	private
	def redirect_if_current_user
		redirect_to after_sign_in_path_for(current_user) if current_user
	end

end

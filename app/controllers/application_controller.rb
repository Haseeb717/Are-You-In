class ApplicationController < ActionController::Base
	# Prevent CSRF attacks by raising an exception.
	# For APIs, you may want to use :null_session instead.
	protect_from_forgery with: :null_session#, if: Proc.new { |c| c.request.format == 'application/json' }

	before_action :authenticate_user!
	before_filter :configure_permitted_parameters, if: :devise_controller?

	before_filter :header_information, :if => :user_signed_in?

	def header_information
		@teams = current_user.teams
		@events = current_user.get_all_events
	end

	protected
	def configure_permitted_parameters
		devise_parameter_sanitizer.for(:sign_up) { |u| u.permit(:email, :password, :password_confirmation, :name, :phone) }
		devise_parameter_sanitizer.for(:sign_in) { |u| u.permit(:login, :email, :phone, :password, :remember_me) }
    end

	private
	def after_sign_in_path_for(resource)
		if resource.class == User
			resource.teams.empty? ? welcome_path : dashboard_path
		end
	end

	def after_sign_up_path_for(resource)
		after_sign_in_path_for(resource)
	end
end

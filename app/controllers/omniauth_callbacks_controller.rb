class OmniauthCallbacksController < Devise::OmniauthCallbacksController

	def callback
		auth = request.env["omniauth.auth"]
		user = current_user || User.find_or_create(auth)
		identity = Identity.find_or_create(auth, user)

		if current_user.nil?
			# User tries to Sign In / Register through some social network
			if user.encrypted_password.empty?
				sign_in_and_redirect user
			else
				# User is already registered. Now trying to login through social network
				sign_in_and_redirect user
			end
		else
			# User already signed in and tries to connect with some identity
			# redirect_to user_connections_path(:user_id => user.id)
		end
	end

	alias_method :facebook,	:callback
	alias_method :twitter,	:callback

end

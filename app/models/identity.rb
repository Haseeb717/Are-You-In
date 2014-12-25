class Identity < ActiveRecord::Base
	belongs_to :user

	def self.find_or_create(auth, user)

		identity = where(auth.slice(:provider, :uid)).first_or_initialize

		identity.user_id		= user.id
		identity.provider		= auth.provider
		identity.uid			= auth.uid
		identity.token			= auth.credentials.token
		identity.secret			= auth.credentials.secret
		identity.expires_at		= Time.at(auth.credentials.expires_at) if auth.credentials.expires_at
		identity.refresh_token	||= auth.credentials.refresh_token

		identity.save!
		user.identities << identity

		identity
	end
	
end

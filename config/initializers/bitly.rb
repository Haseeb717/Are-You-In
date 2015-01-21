Bitly.use_api_version_3

Bitly.configure do |config|
	config.api_version = BITLY_CONFIG[:version].to_i
	config.access_token = BITLY_CONFIG[:access_token]
end
Bitly.configure do |config|
  config.api_version = BITLY_CONFIG[:version]
  config.login = BITLY_CONFIG[:login]
  config.api_key = BITLY_CONFIG[:key]
end
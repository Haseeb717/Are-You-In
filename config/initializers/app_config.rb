FACEBOOK_CONFIG = YAML.load_file("#{Rails.root}/config/facebook.yml")[Rails.env].symbolize_keys
TWITTER_CONFIG = YAML.load_file("#{Rails.root}/config/twitter.yml")[Rails.env].symbolize_keys
MAILER_CONFIG = YAML.load_file("#{Rails.root}/config/mailer.yml")[Rails.env].symbolize_keys
INVITATION_CONFIG = YAML.load_file("#{Rails.root}/config/invitation.yml")[Rails.env].symbolize_keys
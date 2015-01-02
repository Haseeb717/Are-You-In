ActionMailer::Base.smtp_settings = {
	:address				=> "smtp.gmail.com",
	:port					=> 587,
	:domain					=> "gmail.com",
	:user_name				=> MAILER_CONFIG[:username],
	:password				=> MAILER_CONFIG[:password],
	:authentication			=> "plain",
	:enable_starttls_auto	=> true
}


ActionMailer::Base.default_url_options[:host] = MAILER_CONFIG[:host]
ActionMailer::Base.smtp_settings = {
	:address				=> MAILER_CONFIG[:address],
	:port					=> MAILER_CONFIG[:port],
	:domain					=> MAILER_CONFIG[:domain],
	:user_name				=> MAILER_CONFIG[:username],
	:password				=> MAILER_CONFIG[:password],
	:authentication			=> "login",
	:enable_starttls_auto	=> true
}
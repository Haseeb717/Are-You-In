class EmailProcessor

	def initialize(email)
	    @email = email
	end	
	
	def process
		puts "email raw html"+@email.raw_html
		puts "email from"+@email.from[:email]
		puts "email raw body"+@email.raw_body    
	end
end
class EmailProcessor

	def initialize(email)
	    @email = email
	end	
	
	def process
		puts "do something here"
		puts "email subject"+@email.subject
		puts "email raw body"+@email.raw_text
		puts "email from"+@email.from    
	end
end
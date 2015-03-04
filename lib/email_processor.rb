class EmailProcessor

	def initialize(email)
	    @email = email
	end	
	
	def process
		puts "abc"
		puts "email raw html"+@email.raw_html
		puts "email from"+@email.from[:email]
		puts "email raw body"+@email.raw_body 

		# thread  = TeamMessage.where(id parent nil ) || TeamMessage.find(id).parent 


	end
end
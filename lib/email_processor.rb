class EmailProcessor

	def initialize(email)
	    @email = email
	end	
	
	def process
		raw_html = @email.raw_html
		id = raw_html.xpath('//input[name="parent_id"').first
		puts "id is"+" "+id
		from = @email.from[:email]
		body = @email.body
		puts body
		# thread  = TeamMessage.where(id parent nil ) || TeamMessage.find(id).parent 


	end
end
class EmailProcessor

	def initialize(email)
	    @email = email
	end	
	
	def process
		raw_html = @email.raw_html
		puts "abc"
		id = Nokogiri::HTML(raw_html).xpath('//input[name="parent_id"').first
		puts "id is"+" "+id
		from = @email.from[:email]
		puts @email.body
		# thread  = TeamMessage.where(id parent nil ) || TeamMessage.find(id).parent 
	end
end
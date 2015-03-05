class EmailProcessor

	def initialize(email)
	    @email = email
	end	
	
	def process
		puts @email.body
		puts @email.from[:email]
		raw_html = @email.raw_html
		id = Nokogiri::HTML(raw_html).xpath("//input[@name='parent_id']").first.attr("value")
		puts "id is"+" "+id
		# thread  = TeamMessage.where(id parent nil ) || TeamMessage.find(id).parent 
	end
end
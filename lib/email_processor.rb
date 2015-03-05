class EmailProcessor

	def initialize(email)
	    @email = email
	end	
	
	def process
		puts "checking"
		begin
		 	text =  @email.body
		 	from = @email.from[:email]
		 	raw_html = @email.raw_html

		 	id = Nokogiri::HTML(raw_html).xpath("//input[@name='parent_id']").first.attr("value")
		 	puts "email id is #{id}"

		 	thread = TeamMessage.where(:id=>id).first
		 	puts "thread id is #{thread.id}"
		 	user_id = User.where(:email=>from).first.id
		 	puts "user is"+" "+user_id
			# unless thread.nil? or thread.empty?
			# 	team_id = thread.team_id
			# 	team = Team.where(:id=>id).first
			# 	puts "team is"+" "+team
			# 	message = TeamMessage.new(:id=>id,:text=>text,:team_id=>team_id,:user_id=>user_id)
			# 	puts "message is "+message
			# 	team.team_messages << message
			# 	if thread.parent_id.nil?
			# 		thread.replies << message
			# 	else
			# 		temp = TeamMessage.where(:id=>thread.parent_id).first
			# 		temp.replies << message
			# 	end
			# 	message.save!
			# 	puts "message is "+message
			# end

		rescue Exception => e
			puts "Exception"+" "+e.message
		end
	end

end
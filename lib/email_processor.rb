class EmailProcessor

	def initialize(email)
	    @email = email
	end	
	
	def process
		begin
		 	text =  @email.body
		 	from = @email.from[:email]
		 	raw_html = @email.raw_html

		 	team_message_id = Nokogiri::HTML(raw_html).xpath("//input[@name='parent_id']").first.attr("value")
		 	team_message = TeamMessage.find(team_message_id)
		 	parent = team_message.parent || team_message
		 	puts "parent is #{parent}"
		 	team = team_message.team
		 	user = team.users.where(:email => from).first

			if team_message and user
				# creating new message
				message = TeamMessage.new(:text => text)

				# associate with team and respective user
				team.team_messages << message
				user.team_messages << message

				# managing reply
				message.parent = parent
				puts "message parent is #{message.parent}"
				team_message.replies << message

				message.save!				
			end

		rescue Exception => e
			puts "Exception #{e.message}"
		end
	end

end
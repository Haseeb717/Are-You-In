class EmailProcessor

	def initialize(email)
	    @email = email
	end	
	
	def process
		begin
			puts "email cc #{@email.cc}"

		 	text =  @email.body
		 	from = @email.from[:email]
		 	reply_cc = @email.cc
		 	reply_to = @email.to
		 	
		 	puts "reply_to #{reply_to.count}"
		 	raw_html = @email.raw_html
		 	team_message_id = Nokogiri::HTML(raw_html).xpath("//input[@name='parent_id']").first.attr("value")
		 	team_message = TeamMessage.find(team_message_id)
		 	parent = team_message.parent || team_message
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
				
				message.save!
				puts "message save"
				if reply_cc.empty? && reply_to.count==1
					puts "reply"
					UserMailer.reply_message_notification(message, parent.user).deliver! if user.allow_email and parent
		
				else
					team.users.each do |u|
						unless u==user
							puts "user is #{u.email}"
							UserMailer.reply_message_notification(message, u).deliver! if u.allow_email and parent
						end
					end
				end
				
			end

		rescue Exception => e
			puts "Exception #{e.message}"
		end
	end

end
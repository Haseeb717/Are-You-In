class EmailProcessor

	def initialize(email)
	    @email = email
	end	
	
	def process
		begin
			puts "email to #{@email.from}"
			puts "email cc #{@email.cc}"

		 	text =  @email.body
		 	from = @email.from[:email]
		 	replies_all = @email.cc[:email]
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
				if replies_all
					UserMailer.reply_message_notification(message, parent.user).deliver! if user.allow_email and parent
				else
					team.users.each do |user|
						UserMailer.reply_message_notification(message, user).deliver! if user.allow_email and parent
					end
				end
				UserMailer.reply_message_notification(message, parent.user).deliver! if user.allow_email and parent				
			end

		rescue Exception => e
			puts "Exception #{e.message}"
		end
	end

end
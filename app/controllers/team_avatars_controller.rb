class TeamAvatarsController < ApplicationController

	def create
		@team_avatar = TeamAvatar.create(team_avatar_params)
		if @team_avatar.save
			# send success header
			render json: { message: "success", fileID: @upload.id }, :status => 200
		else
			#  you need to send an error header, otherwise Dropzone
			#  will not interpret the response as an error:
			render json: { error: @upload.errors.full_messages.join(',')}, :status => 400
		end
	end

	private
	def team_avatar_params
		params.require(:team_avatar).permit(:avatar)
	end

end

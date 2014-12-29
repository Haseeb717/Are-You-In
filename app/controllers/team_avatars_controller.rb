class TeamAvatarsController < ApplicationController
	before_filter :team_avatar_params, :only => [:create]

	def create
		@team_avatar = TeamAvatar.create(team_avatar_params)
		if @team_avatar.save
			# send success header
			render json: { message: "success", fileID: @team_avatar.id }, :status => 200
		else
			#  need to send an error header, otherwise Dropzone will not interpret the response as an error
			render json: { error: @team_avatar.errors.full_messages.join(',')}, :status => 400
		end
	end

	def destroy
		@team_avatar = TeamAvatar.find(params[:id])
		if @team_avatar.destroy
			render json: { message: "File deleted from server" }
		else
			render json: { message: @team_avatar.errors.full_messages.join(',') }
		end
	end

	private
	def team_avatar_params
		params.require(:team_avatar).permit(:avatar)
	end

end

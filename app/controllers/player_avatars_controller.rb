class PlayerAvatarsController < ApplicationController
	before_filter :player_avatar_params, :only => [:create]

	def create
		@player_avatar = PLayerAvatar.create(player_avatar_params)
		if @player_avatar.save
			# send success header
			render json: { message: "success", fileID: @player_avatar.id }, :status => 200
		else
			#  need to send an error header, otherwise Dropzone will not interpret the response as an error
			render json: { error: @player_avatar.errors.full_messages.join(',')}, :status => 400
		end
	end

	def destroy
		@player_avatar = PLayerAvatar.find(params[:id])
		if @player_avatar.destroy
			render json: { message: "File deleted from server" }
		else
			render json: { message: @player_avatar.errors.full_messages.join(',') }
		end
	end

	private
	def player_avatar_params
		params.require(:player_avatar).permit(:avatar)
	end
end

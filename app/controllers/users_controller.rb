class UsersController < ApplicationController
	before_action :set_user, only: [:edit, :update, :destroy, :update_avatar]
	before_filter :authenticate_user!
	respond_to :html

	def index
		redirect_to user_path(current_user)
	end

	def show
		@user = User.find(params[:id])
		respond_with(@user)
	end

	def new
		redirect_to edit_user_path(current_user)
	end

	def edit
	end

	def create
		@user = current_user
		respond_with(@user)
	end

	def update
		# email and sms settings
		@user.allow_email = false if user_params[:allow_email].nil?
		@user.allow_sms = false if user_params[:allow_sms].nil?

		@user.update(user_params)

		# updating user's password
		unless params[:password].nil? || params[:password].empty?
			@user.password = params[:password]
			@user.password_confirmation = params[:password]
			@user.save!
		end
		redirect_to user_path(@user)
	end

	def update_avatar
		# adding player avatar
		unless params[:avatar].nil? || params[:avatar].empty?
			begin
				avatar = PlayerAvatar.find(params[:avatar])
				@user.player_avatars.collect{|avatar| avatar.destroy}
				@user.player_avatars << avatar
			rescue Exception => ex
			end
		end
		design = render_to_string(:partial => "users/user_avatar", :locals => {:user => @user}, :layout => false )
		render json: { :design => design }, :status => 200
	end

	def destroy
		@user.destroy
		respond_with(@user)
	end

	private
		def set_user
			@user = current_user
		end

		def user_params
			params.permit(:name, :first_name, :last_name, :dob, :phone, :gender, :city, :country, :state, :allow_email, :allow_sms)
		end
end

class UsersController < ApplicationController
	before_action :set_user, only: [:show, :edit, :update, :destroy]
	before_filter :authenticate_user!
	respond_to :html

	def index
		redirect_to user_path(current_user)
	end

	def show
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
		@user.update(user_params)
		redirect_to dashboard_path 
	end

	def destroy
		@user.destroy
		respond_with(@user)
	end

	private
		def set_user
			@user = User.find(current_user.id)
		end

		def user_params
			params.require(:user).permit(:name, :phone, :email, :gender, :password, :first_name, :last_name)
		end
end

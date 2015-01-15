class UsersController < ApplicationController
	before_action :set_user, only: [:show, :edit, :update, :destroy]
	before_filter :authenticate_user!
	respond_to :html

	def index
		@users = User.all
		respond_with(@users)
	end

	def show
		respond_with(@user)
	end

	def new
		@user = User.new
		respond_with(@user)
	end

	def edit
		
	end

	def create
		@user = User.new(user_params)
		@user.save
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

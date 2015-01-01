class UsersController < ApplicationController
	before_action :set_user, only: [:show, :edit, :update, :destroy]

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
		respond_with(@user)
	end

	def destroy
		@user.destroy
		respond_with(@user)
	end

	def player
		

		password_length = 8
		password = Devise.friendly_token.first(password_length)
		team_id = params["team_id"]

		user = User.where(:email=>params["user"]["email"]).first_or_create
		user.update_attributes({
			:name=>params["user"]["name"],
			:phone=>params["user"]["phone"],
			:gender=>params["user"]["gender"],
			:password=>password,
			:password_confirmation => password
					
		})
		
		unless params["player_avatar_id"] == "null" || params["player_avatar_id"] == "undefined"
        	player_avatar = PlayerAvatar.find(params["player_avatar_id"])
        	byebug
        	user.player_avatars << player_avatar
      	end
      	
		team = Team.find(team_id)
		user.teams << team
		@ab = "Player Added"
		render :json => @ab
	end


	private
		def set_user
			@user = User.find(params[:id])
		end

		def user_params
			params.require(:user).permit(:name, :phone, :email, :gender, :password)
		end
end

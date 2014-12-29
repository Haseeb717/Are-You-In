class TeamsController < ApplicationController
  before_action :set_team, only: [:show, :edit, :update, :destroy]

  respond_to :html

  def index
    @teams = Team.all
    respond_with(@teams)
  end

  def show
    respond_with(@team)
  end

  def new
    @team = Team.new
    respond_with(@team)
  end

  def edit
  end

  def create
    @team = Team.new(team_params)
    if @team.save
      current_user.teams << @team

      team_avatar = TeamAvatar.find(params[:team_avatar_id])
      @team.team_avatars << team_avatar

      render json: { message: "success" }, :status => 200
    else
      render json: { error: @team.errors.full_messages.join(',')}, :status => 400
    end
  end

  def update
    @team.update(team_params)
    respond_with(@team)
  end

  def destroy
    @team.destroy
    respond_with(@team)
  end

  private
    def set_team
      @team = Team.find(params[:id])
    end

    def team_params
      params.permit(:name, :sport, :city, :gender, :age, :age_from, :age_to, :public_contact_info)
    end
end

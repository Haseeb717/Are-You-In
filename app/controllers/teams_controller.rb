class TeamsController < ApplicationController
  before_action :set_team, only: [:show, :edit, :update, :destroy]
  layout false, :only => :new

  respond_to :html

  def index
    redirect_to dashboard_path 
  end

  def show
    @team_avatar = @team.team_avatars.last || TeamAvatar.new
    @event = Event.new

    @player_avatar = PlayerAvatar.new
    @player = User.new

    respond_with(@team)
  end

  def new
    @team = Team.new
    @team_avatar = TeamAvatar.new

    respond_with(@team)
  end

  def edit
  end

  def create
    @team = Team.new(team_params)
    @team.admin = current_user
    if @team.save
      current_user.teams << @team

      unless params[:team_avatar_id] == "null" || params[:team_avatar_id] == "undefined" || params[:team_avatar_id].nil?
        team_avatar = TeamAvatar.find(params[:team_avatar_id])
        @team.team_avatars << team_avatar
      end

      message = render_to_string(:partial => "teams/team_status", :layout => false )
      render json: { :message => message }, :status => 200
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

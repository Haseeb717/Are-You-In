class EventsController < ApplicationController
  before_action :set_event, only: [:show, :edit, :update, :destroy, :rvsp]

  respond_to :html

  def index
    @events = Event.all
    respond_with(@events)
  end

  def show
    respond_with(@event)
  end

  def new
    @event = Event.new
    respond_with(@event)
  end

  def edit
  end

  def create
    @event = Event.new(event_params)
    begin
      if @event.save
        unless params[:team_id] == "null" || params[:team_id] == "undefined"
           @team = Team.find(params[:team_id])

           @team.events << @event
        end

        render json: { :event => @event }, :status => 200
      else
        render json: { error: @event.errors.full_messages.join(',')}, :status => 400
      end      
    rescue Exception => ex
      render json: { error: ex.message}, :status => 400
    end
  end

  def rvsp
    debugger
    vsd = "aaaa"
  end

  def update
    @event.update(event_params)
    respond_with(@event)
  end

  def destroy
    @event.destroy
    respond_with(@event)
  end

  private
    def set_event
      @event = Event.find(params[:id])
    end

    def event_params
      params.permit(:title, :category, :opponent, :date, :time, :note, :team_id)
    end
end

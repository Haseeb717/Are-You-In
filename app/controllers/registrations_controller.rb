class RegistrationsController < Devise::RegistrationsController
	clear_respond_to
	respond_to :json, :only => [:create]

	def create
		begin
			unless params[:code].to_s.empty?
				team = Team.where(:code => params[:code].strip).first
				raise "Enter a valid team code or leave it empty" if team.nil?
			end
	
			super
	
			resource.teams << team if team
		rescue Exception => ex
			render json: { :team_code => ex.message }, :status => 400
		end
	end

end
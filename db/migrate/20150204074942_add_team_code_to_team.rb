class AddTeamCodeToTeam < ActiveRecord::Migration
  def change
    add_column :teams, :code, :string
  end
end

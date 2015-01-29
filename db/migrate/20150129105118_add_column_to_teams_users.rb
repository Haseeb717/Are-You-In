class AddColumnToTeamsUsers < ActiveRecord::Migration
  def change
  	add_column :teams_users, :id, :primary_key
    add_column :teams_users, :first_name, :string
    add_column :teams_users, :last_name, :string
  end
end

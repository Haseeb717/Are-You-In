class CreateTeamsUsers < ActiveRecord::Migration
  def change
    create_table :teams_users, :id => false do |t|
    	t.references :user
        t.references :team
        t.timestamps
    end
  end
end

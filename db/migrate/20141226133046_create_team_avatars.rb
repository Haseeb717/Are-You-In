class CreateTeamAvatars < ActiveRecord::Migration
  def change
    create_table :team_avatars do |t|
      t.integer :team_id

      t.timestamps
    end
  end
end

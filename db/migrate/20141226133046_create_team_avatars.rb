class CreateTeamAvatars < ActiveRecord::Migration
  def change
    create_table :team_avatars do |t|
      t.integer :user_id

      t.timestamps
    end
  end
end

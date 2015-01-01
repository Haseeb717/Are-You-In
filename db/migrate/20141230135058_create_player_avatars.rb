class CreatePlayerAvatars < ActiveRecord::Migration
  def change
    create_table :player_avatars do |t|
    	t.integer :user_id
    	t.timestamps
    end
  end
end

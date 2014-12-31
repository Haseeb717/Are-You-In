class CreatePlayerAvatars < ActiveRecord::Migration
  def change
    create_table :player_avatars do |t|

      t.timestamps
    end
  end
end

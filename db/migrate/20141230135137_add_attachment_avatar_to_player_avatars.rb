class AddAttachmentAvatarToPlayerAvatars < ActiveRecord::Migration
  def self.up
    change_table :player_avatars do |t|
      t.attachment :avatar
    end
  end

  def self.down
    remove_attachment :player_avatars, :avatar
  end
end

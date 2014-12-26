class AddAttachmentAvatarToTeamAvatars < ActiveRecord::Migration
  def self.up
    change_table :team_avatars do |t|
      t.attachment :avatar
    end
  end

  def self.down
    remove_attachment :team_avatars, :avatar
  end
end

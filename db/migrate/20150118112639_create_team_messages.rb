class CreateTeamMessages < ActiveRecord::Migration
  def change
    create_table :team_messages do |t|
      t.text :text

      t.integer :parent_id
      t.integer :team_id
      t.integer :user_id

      t.timestamps
    end
  end
end

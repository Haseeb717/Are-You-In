class CreateTeams < ActiveRecord::Migration
  def change
    create_table :teams do |t|
      t.string :name
      t.string :sport
      t.string :city
      t.string :gender
      t.string :age
      t.integer :age_from
      t.integer :age_to
      t.boolean :public_contact_info, :default => false

      t.integer :user_id
      t.integer :admin_id

      t.timestamps
    end
  end
end

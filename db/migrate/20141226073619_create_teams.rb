class CreateTeams < ActiveRecord::Migration
  def change
    create_table :teams do |t|
      t.string :name
      t.string :sport
      t.string :city
      t.string :gender
      t.string :age_group
      t.integer :age_from
      t.integer :age_to
      t.boolean :public_info, :default => false

      t.timestamps
    end
  end
end

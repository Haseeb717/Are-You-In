class CreateUsers < ActiveRecord::Migration
  def change
    create_table :users do |t|
      t.string :name
      t.string :phone
      t.string :gender
      t.string :first_name
      t.string :last_name
      t.timestamps
    end
  end
end

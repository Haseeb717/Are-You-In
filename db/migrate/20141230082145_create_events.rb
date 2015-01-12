class CreateEvents < ActiveRecord::Migration
  def change
    create_table :events do |t|
      t.string :title
      t.string :category
      t.string :opponent
      t.date :date
      t.time :time
      t.text :note
      
      t.boolean :initial_call, :default => false
      t.boolean :reminder_call, :default => false
      t.boolean :final_call, :default => false

      t.integer :team_id

      t.timestamps
    end
  end
end

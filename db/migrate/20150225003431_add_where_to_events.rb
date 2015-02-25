class AddWhereToEvents < ActiveRecord::Migration
  def change
    add_column :events, :where, :text
  end
end

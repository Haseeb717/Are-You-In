class AddLocationToUsers < ActiveRecord::Migration
  def change
    add_column :users, :dob, :date
    add_column :users, :country, :string
    add_column :users, :state, :string
    add_column :users, :city, :string
    add_column :users, :allow_sms, :boolean, :default => true
    add_column :users, :allow_email, :boolean, :default => true
  end
end

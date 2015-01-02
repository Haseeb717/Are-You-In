class CreateEventInvitations < ActiveRecord::Migration
  def change
    create_table :event_invitations do |t|
      t.string :token
      t.integer :sender_id
      t.integer :reciever_id
      t.integer :event_id
      t.datetime :sent_at
      t.datetime :respond_at

      t.timestamps
    end
  end
end

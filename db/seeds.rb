# This file should contain all the record creation needed to seed the database with its default values.
# The data can then be loaded with the rake db:seed (or created alongside the db with db:setup).
#
# Examples:
#
#   cities = City.create([{ name: 'Chicago' }, { name: 'Copenhagen' }])
#   Mayor.create(name: 'Emanuel', city: cities.first)


user = User.create(:email => "test@gmail.com", :password => "test1234", :password_confirmation => "test1234", :name => "Test Test", :phone => "9876543210")

team1 = Team.create(:name => "Hanahan Hawks", :sport => "cricket", :city => "Field B, Alabama", :gender => "male", :age => "adult", :public_contact_info => true, :admin => user)
team2 = Team.create(:name => "Saturday Basketball", :sport => "football", :city => "Field B, Florida", :gender => "male", :age => "youth", :age_from => "8", :age_to => "12", :public_contact_info => true, :admin => user)
team3 = Team.create(:name => "Hanahan Galaxy", :sport => "tennis", :city => "Field B, Idaho", :gender => "female", :age => "youth", :age_from => "8", :age_to => "12", :public_contact_info => false, :admin => user)
team4 = Team.create(:name => "Bourne Group", :sport => "running", :city => "Field B, Illinois", :gender => "coed", :age => "adult", :public_contact_info => false, :admin => user)


event1 = Event.create(:title => "Fly & Form Structures", :category => "practice", :date => "16 December, 2014", :time => "7:00 AM", :note => "Don't note!!!!")
event2 = Event.create(:title => "Pug Life", :category => "game", :date => "17 December, 2015", :time => "10:00 PM", :note => "Don't note!!!!")
event3 = Event.create(:title => "MtP Misfits", :category => "other", :date => "18 December, 2015", :time => "10:00 AM", :note => "Don't note!!!!")
event4 = Event.create(:title => "New Leaf", :category => "pickup", :date => "17 December, 2015", :time => "9:00 AM", :note => "Don't note!!!!")

user.teams = user.teams + [team1, team2, team3, team4]
team1.events = team1.events + [event1, event2, event3, event4]
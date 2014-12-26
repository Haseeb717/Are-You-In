json.array!(@teams) do |team|
  json.extract! team, :id, :name, :sport, :city, :gender, :age_group, :age_from, :age_to, :public_info
  json.url team_url(team, format: :json)
end

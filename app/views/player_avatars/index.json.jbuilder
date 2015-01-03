json.array!(@player_avatars) do |player_avatar|
  json.extract! player_avatar, :id
  json.url player_avatar_url(player_avatar, format: :json)
end

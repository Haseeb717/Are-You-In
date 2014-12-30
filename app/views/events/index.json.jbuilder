json.array!(@events) do |event|
  json.extract! event, :id, :title, :type, :opponent, :date, :time, :note
  json.url event_url(event, format: :json)
end

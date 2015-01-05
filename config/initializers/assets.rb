Rails.application.config.assets.precompile += %w(landing.css)
Rails.application.config.assets.precompile += %w(landing.js)
Rails.application.config.assets.precompile << /\.(?:svg|eot|woff|ttf)\z/
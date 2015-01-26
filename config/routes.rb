Rails.application.routes.draw do
  resources :events do
    member do
      post "rsvp"
    end
  end

  resources :teams do
    member do
      post "add_player"
      post "message"
      get "team_feeds"
    end
  end
  resources :team_avatars
  
  resources :players
  resources :player_avatars

  devise_for :users, :controllers => { :omniauth_callbacks => "omniauth_callbacks", :registrations => "registrations" }
  resources :users do
    member do
      put "update_avatar"
      get "team_feeds"
    end
  end

  get "/dashboard", :to => "static#dashboard"
  get "/invitation_response", :to => "static#invitation_response"
  post "/sms_response", :to => "static#sms_response"
  get "/welcome", :to => "static#welcome"

  # The priority is based upon order of creation: first created -> highest priority.
  # See how all your routes lay out with "rake routes".
  get "/settings", :to => "users#edit"
  # You can have the root of your site routed with "root"
  root "static#landing"
  
  # Example of regular route:
  #   get 'products/:id' => 'catalog#view'

  # Example of named route that can be invoked with purchase_url(id: product.id)
  #   get 'products/:id/purchase' => 'catalog#purchase', as: :purchase

  # Example resource route (maps HTTP verbs to controller actions automatically):
  #   resources :products

  # Example resource route with options:
  #   resources :products do
  #     member do
  #       get 'short'
  #       post 'toggle'
  #     end
  #
  #     collection do
  #       get 'sold'
  #     end
  #   end

  # Example resource route with sub-resources:
  #   resources :products do
  #     resources :comments, :sales
  #     resource :seller
  #   end

  # Example resource route with more complex sub-resources:
  #   resources :products do
  #     resources :comments
  #     resources :sales do
  #       get 'recent', on: :collection
  #     end
  #   end

  # Example resource route with concerns:
  #   concern :toggleable do
  #     post 'toggle'
  #   end
  #   resources :posts, concerns: :toggleable
  #   resources :photos, concerns: :toggleable

  # Example resource route within a namespace:
  #   namespace :admin do
  #     # Directs /admin/products/* to Admin::ProductsController
  #     # (app/controllers/admin/products_controller.rb)
  #     resources :products
  #   end
end

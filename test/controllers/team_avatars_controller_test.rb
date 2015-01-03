require 'test_helper'

class TeamAvatarsControllerTest < ActionController::TestCase
  setup do
    @team_avatar = team_avatars(:one)
  end

  test "should get index" do
    get :index
    assert_response :success
    assert_not_nil assigns(:team_avatars)
  end

  test "should get new" do
    get :new
    assert_response :success
  end

  test "should create team_avatar" do
    assert_difference('TeamAvatar.count') do
      post :create, team_avatar: {  }
    end

    assert_redirected_to team_avatar_path(assigns(:team_avatar))
  end

  test "should show team_avatar" do
    get :show, id: @team_avatar
    assert_response :success
  end

  test "should get edit" do
    get :edit, id: @team_avatar
    assert_response :success
  end

  test "should update team_avatar" do
    patch :update, id: @team_avatar, team_avatar: {  }
    assert_redirected_to team_avatar_path(assigns(:team_avatar))
  end

  test "should destroy team_avatar" do
    assert_difference('TeamAvatar.count', -1) do
      delete :destroy, id: @team_avatar
    end

    assert_redirected_to team_avatars_path
  end
end

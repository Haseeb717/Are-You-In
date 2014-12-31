$(document).ready(function(){
    $('#player_submit').click(function() {
        var gender = ''
        var name = $("#user_name").val();
        var email = $("#user_email").val();
        var phone = $("#user_phone").val();
        var user_id = $("#user_id").val();
        var team_id = $("#team_id").val();
        if($('#new_user input[type=radio]').eq(1).prop("checked")){
          gender = 'Female'
        }
        else{
          gender = 'Male'
        }
        var formdata = name + ',' +email +',' +phone + ',' +gender+ ',' + team_id;
        $.ajax({

            url : "/users/"+user_id+"/player/",
            dataType : "html",
            method: "post",
            data : {
              "list_name" : formdata,
            },
            success : function(data){
              $('.response').html(data);
            }
        }); 
    });

  })

$(document).ready(function(){
    $('#player_submit').click(function() {

        
        var user_id = $("#user_id").val();
        var team_id = $("#team_id").val();
        
        avatar = $(".dz-remove").attr("id")
            if (avatar == null || avatar == undefined)
                avatar = null;

        formdata = $(".add-player-form").serialize() + "&player_avatar_id=" + avatar  + "&team_id=" + team_id;
        $.ajax({

            url : "/users/"+user_id+"/player/",
            dataType : "html",
            method: "post",
            data : formdata,
            success : function(data){
              
                $( '.modal-body' ).hide( "slow", function() {
                        // Animation complete.
                });
                $( '.modal-footer' ).hide( "slow", function() {
                        // Animation complete.
                });

                $('.response').html(data);
                $( '.response' ).show( "slow");
            }
        }); 
    });

  })

$(document).ready(function() {
    $("#add-player-form").bootstrapValidator({
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            // first_name: { validators: { notEmpty: { message: 'The first name is required' } } }
        }
    }).on("success.form.bv", function(event) {
        // Prevent form submission
        event.preventDefault();
        var user_id = $("#user_id").val();
        var team_id = $("#team_id").val();

        avatar = $("#player-avatar .dz-remove").attr("id")
        if (avatar == null || avatar == undefined)
            avatar = null;

        postData = $("#add-player-form").serialize() + "&player_avatar_id=" + avatar;

        // Use Ajax to submit form data
        $.ajax({
            type: "POST",
            url: "/teams/" + team_id + "/add_player",
            dataType: "JSON",
            data: postData,
            success: function (data) {
                console.log(data);
                $("#add-player-status").text(data.message);
                $(".friend-list").html(data.design);

            },
            error: function(XMLHttpRequest, textStatus, errorThrown) {
                console.log(XMLHttpRequest.responseText);
                $("#add-player-status").text(XMLHttpRequest.responseText);
            }
        });
    });

});

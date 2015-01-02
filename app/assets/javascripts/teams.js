$(document).ready(function() {
	$("#add-team-form").bootstrapValidator({
		feedbackIcons: {
			valid: "glyphicon glyphicon-ok",
			invalid: "glyphicon glyphicon-remove",
			validating: "glyphicon glyphicon-refresh"
		},
		fields: {
			team_name: { validators: { notEmpty: { message: "The team name is required" }, stringLength: { min: 5, message: "The length of team name should be greate then 5." } } },
			sport: { validators: { notEmpty: { message: "The sport is required" } } },
			city: { validators: { notEmpty: { message: "The city is required" } } }
		}
	}).on("success.form.bv", function(event) {
			// Prevent form submission
			event.preventDefault();
			// Get the form instance
			var $form = $(event.target);
			// Get the BootstrapValidator instance
			var bv = $form.data("bootstrapValidator");

			// team image if any
			avatar = $(".dz-remove").attr("id")
			if (avatar == null || avatar == undefined)
				avatar = null;

			// append team avatar in post request
			postData = $(".add-team-form").serialize().replace("team_name", "name") + "&team_avatar_id=" + avatar;

			// Use Ajax to submit form data
			 $.ajax({
				 type: "POST",
				 url: "/teams",
				 dataType: "JSON",
				 data: postData,
				 success: function (data) {
					console.log(data);
					 $( ".form-wrap" ).hide( "slow", function() {
						// Animation complete.
					  });

					 $("#status").html(data.message);
					 $( "#status" ).show( "slow");
				 },
				 error: function(XMLHttpRequest, textStatus, errorThrown) {
					response = JSON.parse(XMLHttpRequest.responseText);
					console.log(response);

					$("#add-team-form .create").removeAttr("disabled");
					$("#add-team-form .message").html(response.error);
					$("#add-team-form .message").show();
				 }
			 });

		});
});
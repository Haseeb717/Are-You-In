$(document).ready(function() {
	// form validation fields
	// insert new team on successfull validation
	$(".add-team-form").bootstrapValidator({
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
		postData = $("#add-team-form").serialize().replace("team_name", "name") + "&team_avatar_id=" + avatar;

		// Use Ajax to submit form data
		$.ajax({
			type: "post",
			url: "/teams",
			dataType: "JSON",
			data: postData,
			success: function (data) {
				// console.log(data);

				// redirect to team page
				window.location = "/teams/" + data.team.id;
			},
			error: function(XMLHttpRequest, textStatus, errorThrown) {
				// console.log(response);
				response = JSON.parse(XMLHttpRequest.responseText);

				$("#add-team-form .create").removeAttr("disabled");
				$("#add-team-form .message").html(response.error);
				$("#add-team-form .message").show();
			}
		});
	});

	// Delete Team
	$(document.body).on("click", ".team-delete", function(event) {
		event.preventDefault();
		team_id = $(this).siblings(".team_id").val();

		$.ajax({
			type: "DELETE",
			url: "/teams/" + team_id,
			dataType: "JSON",
			success: function (data) {
				console.log(data);
				window.location = "/";
			},
			error: function(XMLHttpRequest, textStatus, errorThrown) {
				console.log(XMLHttpRequest.responseText);
			}
		});
	});


	// update form validator
	// Update Team
	$(".add-team-form").each(function() {
		// new form will be handled above by another function
		if ($(this).attr("id") != "add-team-form") {
			
			$(this).bootstrapValidator({
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
				event.preventDefault();

				team_id = $(this).attr("action").slice(-1);
				avatar_form = $("form", $(this).parents(".team-modal")).eq(0);

				// team image if any
				avatar = $(".dz-remove", avatar_form).attr("id");
				if (avatar == null || avatar == undefined)
					avatar = null;

				// append team avatar in post request
				postData = $(this).serialize().replace("team_name", "name") + "&team_avatar_id=" + avatar;

				$.ajax({
					type: "PUT",
					url: "/teams/" + team_id,
					dataType: "JSON",
					data: postData,
					success: function (data) {
						console.log(data);


					},
					error: function(XMLHttpRequest, textStatus, errorThrown) {
						console.log(XMLHttpRequest.responseText);
					}
				});
			});
		}
	});

	// Show and Hide Age Drop Downs for Add Team modal
	$(".toggles input[type=radio]").on("change", function () {
		if (!this.checked) return;

		$(".collapse").not($("div." + $(this).attr("class"))).slideUp();
		$(".collapse." + $(this).attr("class")).slideDown();
	});

	$("#add_team").on("hidden.bs.modal", function(event) {

		// renew form
		$.ajax({
			type: "GET",
			url: "/teams/new",
			dataType: "HTML",
			success: function (data) {
				// console.log(data);
				$("#add_team").replaceWith(data);
				applyDropZoneToTeamAvatars();

			},
			error: function(XMLHttpRequest, textStatus, errorThrown) {
				console.log(XMLHttpRequest.responseText);
			}
		});
	});

});
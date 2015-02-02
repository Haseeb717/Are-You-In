$(document).ready(function() {
	
	// when player modal closed out (hide)
	// data needs to be removed. Renew Form
	function refreshPlayerForm() {
		$.ajax({
			type: "GET",
			url: "/players/new",
			dataType: "HTML",
			success: function (data) {
				// console.log(data);

				// bootstrap dynamic content issue
				$("#add_player").modal("hide");
				$(".modal-backdrop").remove();
				$(".modal-open").removeClass("modal-open");

				$("#add_player").replaceWith(data);
				applyValidationToAddPlayerForm();

			},
			error: function(XMLHttpRequest, textStatus, errorThrown) {
				console.log(XMLHttpRequest.responseText);
			}
		});
	}
	$("#add_player").on("hidden.bs.modal", function(event) {
		refreshPlayerForm();
	});

	applyValidationToAddPlayerForm();

	// add player in team
	// form validation (first_name, last_name and email)
	function applyValidationToAddPlayerForm() {
		$("#add-player-form").bootstrapValidator({
			feedbackIcons: {
				valid: "glyphicon glyphicon-ok",
				invalid: "glyphicon glyphicon-remove",
				validating: "glyphicon glyphicon-refresh"
			},
			fields: {
				first_name: { validators: { notEmpty: { message: "First name is required" } } },
				last_name: { validators: { notEmpty: { message: "Last name is required" } } },
				email: { validators: { notEmpty: { message: "Email address is required" }, emailAddress: { message: "Email address is not valid" } } },
				phone: { validators: { phone: { country: "US", message: "Phone number is not valid" } } },
			}
		}).on("success.form.bv", function(event) {
			// Prevent form submission
			event.preventDefault();
			var team_id = $("#team_id").val();

			// can't process if team_id isn't there
			if (team_id == null || team_id == undefined)
				return;

			avatar = $("#player-avatar .dz-remove").attr("id")
			if (avatar == null || avatar == undefined)
				avatar = null;

			$("#add-player-form button[type=submit]").attr("disabled", "disabled");
			postData = $("#add-player-form").serialize() + "&player_avatar_id=" + avatar;

			$("#add-player-status").text("");

			// Use Ajax to submit form data
			$.ajax({
				type: "POST",
				url: "/teams/" + team_id + "/add_player",
				dataType: "JSON",
				data: postData,
				success: function (data) {
					// console.log(data);

					// update players 
					$(".friend-list").html(data.design);
					// hide modal
					refreshPlayerForm();
					$("#add_player").modal("hide");
				},
				error: function(XMLHttpRequest, textStatus, errorThrown) {
					console.log(XMLHttpRequest.responseText);
					$("#add-player-status").text(XMLHttpRequest.responseJSON.error);
					$("#add_player form button[type=submit]").removeAttr("disabled");
				}
			});
		});
	}

	applyValidationToEditPlayerForm();
	function applyValidationToEditPlayerForm() {
		$(".edit_user").bootstrapValidator({
			feedbackIcons: {
				valid: "glyphicon glyphicon-ok",
				invalid: "glyphicon glyphicon-remove",
				validating: "glyphicon glyphicon-refresh"
			},
			fields: {
				first_name: { validators: { notEmpty: { message: "First name is required" } } },
				last_name: { validators: { notEmpty: { message: "Last name is required" } } },
				email: { validators: { notEmpty: { message: "Email address is required" }, emailAddress: { message: "Email address is not valid" } } },
				phone: { validators: { phone: { country: "US", message: "Phone number is not valid" } } },
			}
		}).on("success.form.bv", function(event) {
			// Prevent form submission
			event.preventDefault();
			user_id = $(".user_id", this).val();

			// event is required for this operation
			if (user_id == undefined || user_id == null)
				return;

			var team_id = $("#team_id").val();

			// can't process if team_id isn't there
			if (team_id == null || team_id == undefined)
				return;

			

			$("button[type=submit]", this).attr("disabled", "disabled");
			postData = $(this).serialize() + "&user_id=" + user_id;

			$("#add-player-status", this).text("");
			form = $(this);

			// Use Ajax to submit form data
			$.ajax({
				type: "PUT",
				url: "/teams/" + team_id + "/update_player",
				dataType: "JSON",
				data: postData,
				success: function (data) {
					// console.log(data);

					// update players 
					$(".friend-list").html(data.design);
					// hide modal
					applyValidationToEditPlayerForm();
					$(".edit_user").modal("hide");

					// bootstrap dynamic content issue
					$(".modal-backdrop").remove();
					$(".modal-open").removeClass("modal-open");
				},
				error: function(XMLHttpRequest, textStatus, errorThrown) {
					console.log(XMLHttpRequest.responseText);

					error = XMLHttpRequest.responseJSON.error;
					$("#add-player-status", form).text(error);
					$("button[type=submit]", form).removeAttr("disabled");
					
				}
			});
		});
	}
});

$(document).ready(function() {
	// form validation fields
	// insert new team on successfull validation
	$("#add-team-form").bootstrapValidator({
		feedbackIcons: {
			valid: "glyphicon glyphicon-ok",
			invalid: "glyphicon glyphicon-remove",
			validating: "glyphicon glyphicon-refresh"
		},
		fields: {
			name: { validators: { notEmpty: { message: "The team name is required" }, stringLength: { min: 5, message: "The length of team name should be greater or equal to 5." } } },
			sport: { validators: { notEmpty: { message: "The sport is required" } } },
			city: { validators: { notEmpty: { message: "The city is required" } } },
			code: {
				validators: {
					notEmpty: { message: "The code is required" },
					remote: {
						message: "Team code already taken",
						url: "/teams/check_code",
						type: "GET"
					}
				}
			}
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
		postData = $("#add-team-form").serialize() + "&team_avatar_id=" + avatar;

		// Use Ajax to submit form data
		$.ajax({
			type: "post",
			url: "/teams",
			dataType: "JSON",
			data: postData,
			success: function (data) {
				// console.log(data);

				// redirect to team page
				
			},
			error: function(XMLHttpRequest, textStatus, errorThrown) {
				// console.log(response);
				response = JSON.parse(XMLHttpRequest.responseText);

				
			}
		});
	});

	// team's code suggestion (team name random string characters)
	$(document).on("blur", "#add-team-form #team_name", function(event) {
		name = $("#add-team-form #team_name").val().replace(/ /g,'').toLowerCase();
		coded = false;
		
		if (name.length >= 5 && $("#add-team-form #code").val() == "") {
			// looping for name, cutting first n digits
			for (i = 5; i <= name.length; i++) {
				value = name.substring(0, i);

				if (checkTeamCode(value)) {
					coded = true;
					break;
				}
			}

			while (true && !coded) {
				value = randomeString(6);
				if (checkTeamCode(value)) break;
			}

			$("#add-team-form #code").val(value);
			$("#add-team-form").data("bootstrapValidator").revalidateField("code");
		}
	});

	// return small alphabets string depend upon length
	function randomeString(str_length) {
		var text = "";
		var possible = "abcdefghijklmnopqrstuvwxyz";
		for(i = 0; i < str_length; i++) {
			text += possible.charAt(Math.floor(Math.random() * possible.length));
		}

		return text;
	}

	// check if team with code exists
	function checkTeamCode(code) {
		result = false;

		$.ajax({
			type: "GET",
			url: "/teams/check_code",
			dataType: "JSON",
			async: false,
			data: { code: code },
			success: function (data) {
				console.log(data);

				result = data.valid;
			},
			error: function(XMLHttpRequest, textStatus, errorThrown) {
				console.log(XMLHttpRequest.responseText);
			}
		});

		return result;
	}

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
					name: { validators: { notEmpty: { message: "The team name is required" }, stringLength: { min: 5, message: "The length of team name should be greate then 5." } } },
					sport: { validators: { notEmpty: { message: "The sport is required" } } },
					city: { validators: { notEmpty: { message: "The city is required" } } }
				}
			}).on("success.form.bv", function(event) {
				event.preventDefault();

				// extacting team's id, required for form submission
				team_id = $(".team_id", this).val();
				if (team_id == undefined || team_id == null)
					return;

				avatar_form = $("form", $(this).parents(".team-modal")).eq(0);

				// team image if any
				avatar = $(".dz-remove", avatar_form).attr("id");
				if (avatar == null || avatar == undefined)
					avatar = null;

				// append team avatar in post request
				postData = $(this).serialize() + "&team_avatar_id=" + avatar;

				$.ajax({
					type: "PUT",
					url: "/teams/" + team_id,
					dataType: "JSON",
					data: postData,
					success: function (data) {
						// console.log(data);
						$("#add_team" + team_id).modal("hide");
						$("#add_team" + team_id + " .team-update").removeAttr("disabled");

						if (data.design != undefined && data.design != null)
							$(".team-profile-widget").html(data.design);

					},
					error: function(XMLHttpRequest, textStatus, errorThrown) {
						// console.log(XMLHttpRequest.responseText);
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
		// renew team form

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

	// join team by enetring code
	$(".join-team-form").bootstrapValidator({
		feedbackIcons: {
			valid: "glyphicon glyphicon-ok",
			invalid: "glyphicon glyphicon-remove",
			validating: "glyphicon glyphicon-refresh"
		},
		fields: {
			code: {
				validators: {
					notEmpty: { message: "Team code is required" },
					callback: {
						message: "Team with this code does not exist",
						callback: function (value, validator, $field) {
							result = false;

							// checking if code exist in database
							if (value != "") {
								$.ajax({
									type: "GET",
									url: "/teams/check_code",
									dataType: "JSON",
									async: false,
									data: {
										code: value
									},
									success: function (data) {
										console.log(data);
										result = !data.valid;

									},
									error: function(XMLHttpRequest, textStatus, errorThrown) {
										console.log(XMLHttpRequest.responseText);
									}
								});
							}

							return result;
						}
					}
				}
			}
		}
	}).on("success.form.bv", function(event) {
		// Prevent form submission
		event.preventDefault();
		postData = $(this).serialize();

		$.ajax({
			type: "POST",
			url: "/teams/join",
			dataType: "JSON",
			data: postData,
			success: function (data) {
				console.log(data);
				window.location = "/teams/" + data.team.id;
			},
			error: function(XMLHttpRequest, textStatus, errorThrown) {
				console.log(XMLHttpRequest.responseText);
				$(".join-team-form #join-team-error").text(XMLHttpRequest.responseJSON.error);
				$(".join-team-form button[type=submit]").removeAttr("disabled", "disabled");
			}
		});
	});
});

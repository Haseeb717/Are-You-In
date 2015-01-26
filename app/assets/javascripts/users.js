$(document).ready(function() {
	// welcome dashbord
	// adding first event
	$("#add-first-event").bootstrapValidator({
		feedbackIcons: {
			valid: 'glyphicon glyphicon-ok',
			invalid: 'glyphicon glyphicon-remove',
			validating: 'glyphicon glyphicon-refresh'
		},
		fields: {
			team_id: { validators: { notEmpty: { message: 'Please select team for this event' } } },
			title: { validators: { notEmpty: { message: 'The event title is required' }, stringLength: { min: 5, message: "The length of event name should be greater or equal to 5." } } },
			date: { validators: { notEmpty: { message: 'The event date is required' } } },
			time: { validators: { notEmpty: { message: 'The event time is required' } } }
		}
	}).on("success.form.bv", function(event) {
		// Prevent form submission
		event.preventDefault();
		postData = $("#add-first-event").serialize() + "&team_id=" + $("#team_id").val();

		// Use Ajax to submit form data
		$.ajax({
			type: "POST",
			url: "/events",
			dataType: "JSON",
			data: postData,
			success: function (data) {
				// console.log(data);

				window.location.href = "/dashboard";
			},
			error: function(XMLHttpRequest, textStatus, errorThrown) {
				console.log(XMLHttpRequest.responseText);
			}
		});
	});


	// date and time picker for add event
	// evaluating fields on set
	$("#add-first-event .datepicker").pickadate({
		onSet: function(context) {
			if ($("#add-first-event").length > 0)
				$("#add-first-event").data("bootstrapValidator").revalidateField("date");
		}
	});
	$("#add-first-event .timepicker").pickatime({
		onSet: function(context) {
			if ($("#add-first-event").length > 0)
				$("#add-first-event").data("bootstrapValidator").revalidateField("time");
		}
	});

	// adding user avatar on submit
	$(document).on("click", ".update-avatar", function(event) {
		if ($(".dz-remove").length > 0) {
			
			postData = "avatar=" + $(".dz-remove").attr("id");
			user = $("#user").val();
			// user id need to update user
			if (user == undefined || user == null || user == "")
				return;
		
			// Use Ajax to submit form data
			$.ajax({
				type: "PUT",
				url: "/users/" + user + "/update_avatar",
				dataType: "JSON",
				data: postData,
				success: function (data) {
					// update user picture
					$(".user-profile-pic").html(data.design);
					$(".profile-pic").html(data.design);

					// hide modal
					$("#edit-picture").modal("hide");
				},
				error: function(XMLHttpRequest, textStatus, errorThrown) {
				}
			});
		}
	});

	// filter dashboard content with respect to teams
	$(document).on("change", ".dashboard .team-filter", function(event) {
		team = $(this).val();
		if (team == undefined || team == null) team = "";
		window.location.href = "/dashboard?team=" + team;
	});
});
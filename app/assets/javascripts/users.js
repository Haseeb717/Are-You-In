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
	$("#update-user-form").submit(function() {
		if ($(".dz-remove").length > 0) {
			$("#update-user-form #avatar").val($(".dz-remove").attr("id"));
		}

	});
});
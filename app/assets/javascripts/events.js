$(document).ready(function() {
	$("#add-event-form").bootstrapValidator({
		feedbackIcons: {
			valid: 'glyphicon glyphicon-ok',
			invalid: 'glyphicon glyphicon-remove',
			validating: 'glyphicon glyphicon-refresh'
		},
		fields: {
			title: { validators: { notEmpty: { message: 'The Event Title is required' } } }
		}
	}).on("success.form.bv", function(event) {
		// Prevent form submission
		event.preventDefault();
		postData = $("#add-event-form").serialize() + "&team_id=" + $("#team_id").val();

		// Use Ajax to submit form data
		$.ajax({
			type: "POST",
			url: "/events",
			dataType: "JSON",
			data: postData,
			success: function (data) {
				console.log(data);
				event = data.event
				$("#event-message").html("Event <u>" + event.title + "</u> has been created successfully.");

			},
			error: function(XMLHttpRequest, textStatus, errorThrown) {
				console.log(XMLHttpRequest.responseText);
			}
		});
	});


	$("#add_event").on("shown.bs.modal", function(event) {
		// renew form

		$("form", this).find("input[type=text], textarea").val("");
		$("form button", this).removeAttr("disabled");
		$("#event-message").html("");

		$("form .help-block", this).remove();
		$("form .form-control-feedback", this).remove();
	});
});

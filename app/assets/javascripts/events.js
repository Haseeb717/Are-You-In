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



	$(document.body).on("click", ".run-btns button", function (event) {
		event_id = $(".event_id", $(this).parents(".event-wrap")).val();
		if (event_id == undefined || event_id == null || event_id == "")
			return;

		if ($(this).hasClass("in-btn")) {
			// in case of participation
			text = $(this).siblings(".toggle-in").text().trim();

			BootstrapDialog.alert({
				title: "I am IN",
				message: text,
				closable: false,
				buttonLabel: "Confirm that I am IN",
				callback: function(result) {
					// user pressed confirmation button
					sendRVSPResponse(event_id, "in");

            	}
			});
		}
		else if ($(this).hasClass("maybe-btn")) {
			alert("btn-maybe");
		}
		else if ($(this).hasClass("out-btn")) {
			alert("btn-out");
		}
	});

	function sendRVSPResponse(event_id, response) {
		$.ajax({
			type: "POST",
			url: "/events/" + event_id + "/rvsp",
			dataType: "JSON",
			data: postData,
			success: function (data) {
				console.log(data);

			},
			error: function(XMLHttpRequest, textStatus, errorThrown) {
				console.log(XMLHttpRequest.responseText);
			}
		});
	}
});

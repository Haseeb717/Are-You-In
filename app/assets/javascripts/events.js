$(document).ready(function() {
	$("#add-event-form").bootstrapValidator({
		feedbackIcons: {
			valid: 'glyphicon glyphicon-ok',
			invalid: 'glyphicon glyphicon-remove',
			validating: 'glyphicon glyphicon-refresh'
		},
		fields: {
			title: { validators: { notEmpty: { message: 'The event title is required' } } }
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
		// $("form button", this).removeAttr("disabled");
		$("#event-message").html("");

		$("form .help-block", this).remove();
		$("form .form-control-feedback", this).remove();
	});


	$(document.body).on("click", ".run-btns button", function (event) {
		event_id = $(".event_id", $(this).parents(".event-wrap")).val();
		responseElement = $(this).parent().siblings(".listit");
		if (event_id == undefined || event_id == null || event_id == "")
			return;

		if ($(this).hasClass("in-btn")) {
			// in case of participation
			text = $(this).siblings(".toggle-in").text().trim();

			BootstrapDialog.alert({
				title: "I am IN",
				message: text,
				closable: true,
				buttonLabel: "Confirm that I am IN",
				callback: function(result) {
					// user pressed confirmation button
					saveRVSPResponse(event_id, "in", responseElement);
				}
			});
		}
		else if ($(this).hasClass("maybe-btn")) {
			// in case of not sure
			text = $(this).siblings(".toggle-maybe").text().trim();

			BootstrapDialog.alert({
				title: "Maybe, Not Sure",
				message: text,
				closable: true,
				buttonLabel: "Not sure yet, Remind me again",
				callback: function(result) {
					// user pressed confirmation button
					saveRVSPResponse(event_id, "maybe", responseElement);
				}
			});
		}
		else if ($(this).hasClass("out-btn")) {
			// in case of not participation
			text = $(this).siblings(".toggle-out").text().trim();

			BootstrapDialog.alert({
				title: "I am Out",
				message: text,
				closable: true,
				buttonLabel: "Confirm that I am Out",
				callback: function(result) {
					// user pressed confirmation button
					saveRVSPResponse(event_id, "out", responseElement);
				}
			});
		}
	});

	function saveRVSPResponse(event_id, response, Element) {
		$.ajax({
			type: "POST",
			url: "/events/" + event_id + "/rsvp",
			dataType: "HTML",
			data: {
				response: response
			},
			success: function (data) {
				console.log(data);
				$(Element).html(data);

				// bind popover effect on dynamic elements
				$(".run-count").popover({ placement : "top", html : "true" });
			},
			error: function(XMLHttpRequest, textStatus, errorThrown) {
				console.log(XMLHttpRequest.responseText);
			}
		});
	}


	// remove event
	$(document.body).on("click", ".event-remove", function(event) {
		event.preventDefault();
		event_id = $(this).siblings(".event_id").val();

		$.ajax({
			type: "DELETE",
			url: "/events/" + event_id,
			dataType: "JSON",
			success: function (data) {
				console.log(data);
				// remove from UI
				$(".event_id[value='" + event_id + "']").parents(".event-wrap.widget-item").remove();
			},
			error: function(XMLHttpRequest, textStatus, errorThrown) {
				console.log(XMLHttpRequest.responseText);
			}
		});
	});

	// update event
	$(document.body).on("click", ".event-update", function(event) {
		event.preventDefault();
		event_id = $(this).siblings(".event_id").val();

		$.ajax({
			type: "DELETE",
			url: "/events/" + event_id,
			dataType: "JSON",
			success: function (data) {
				console.log(data);

			},
			error: function(XMLHttpRequest, textStatus, errorThrown) {
				console.log(XMLHttpRequest.responseText);
			}
		});
	});
	
});

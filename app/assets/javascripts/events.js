$(document).ready(function() {
	applyValidationsToAddEventForm();

	function refreshEventForm() {
		$.ajax({
			type: "GET",
			url: "/events/new",
			dataType: "HTML",
			success: function (data) {
				// console.log(data);

				// bootstrap dynamic content issue
				$("#add_event").modal("hide");
				$(".modal-backdrop").remove();
				$(".modal-open").removeClass("modal-open");

				$("#add_event").replaceWith(data);
				applyValidationsToAddEventForm();

			},
			error: function(XMLHttpRequest, textStatus, errorThrown) {
				console.log(XMLHttpRequest.responseText);
			}
		});
	}

	function applyValidationsToAddEventForm() {
		$("#add-event-form").bootstrapValidator({
			feedbackIcons: {
				valid: 'glyphicon glyphicon-ok',
				invalid: 'glyphicon glyphicon-remove',
				validating: 'glyphicon glyphicon-refresh'
			},
			fields: {
				title: { validators: { notEmpty: { message: 'The event title is required' }, stringLength: { min: 5, message: "The length of event name should be greater or equal to 5." } } },
				date: { validators: { notEmpty: { message: 'The event date is required' } } },
				time: { validators: { notEmpty: { message: 'The event time is required' } } },
				where: { validators: { notEmpty: { message: 'The event where is required' } } }
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
					// console.log(data);

					refreshEventForm();
					$("#add_event").modal("hide");
					$(".team-events-widget").html(data.design);
					applyValidationToEditEventForm();

				},
				error: function(XMLHttpRequest, textStatus, errorThrown) {
					console.log(XMLHttpRequest.responseText);
				}
			});
		});


		// date and time picker for add event
		// evaluating fields on set
		$(".datepicker").pickadate({
			onSet: function(context) {
				if ($("#add-event-form").length > 0)
					$("#add-event-form").data("bootstrapValidator").revalidateField("date");
			}
		});
		$(".timepicker").pickatime({
			onSet: function(context) {
				if ($("#add-event-form").length > 0)
					$("#add-event-form").data("bootstrapValidator").revalidateField("time");
			}
		});

		// Show and Hide Game Opponent Input
		$(".toggles input[type=radio]").on("change", function () {
			if (!this.checked) return
			$(".collapse").not($("div." + $(this).attr("class"))).slideUp();
			$(".collapse." + $(this).attr("class")).slideDown();
		});
	}

	// clearing old text from event-form
	// renew event form
	$("#add_event").on("hidden.bs.modal", function(event) {
		$.ajax({
			type: "GET",
			url: "/events/new",
			dataType: "HTML",
			success: function (data) {
				// console.log(data);
				
				$("#add_event").replaceWith(data);
				applyValidationsToAddEventForm();
			},
			error: function(XMLHttpRequest, textStatus, errorThrown) {
				console.log(XMLHttpRequest.responseText);
			}
		});
	});


	// RSVP Buttons with resposes
	// Yes Maybe No, all three fire from here.
	// callbacks are attached to save the response
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
					if (result) saveRVSPResponse(event_id, "in", responseElement);
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
					if (result) saveRVSPResponse(event_id, "maybe", responseElement);
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
					if (result) saveRVSPResponse(event_id, "out", responseElement);
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
				// console.log(data);
				$(Element).html(data);

				// bind popover effect on dynamic elements
				$(".run-count").popover({ placement : "top", html : "true" });
			},
			error: function(XMLHttpRequest, textStatus, errorThrown) {
				console.log(XMLHttpRequest.responseText);
			}
		});
	}

	$(".run-count").popover({ placement : "top", html : "true" });

	// remove event
	// delete the event and refresh content list
	$(document.body).on("click", ".event-remove", function(event) {
		event.preventDefault();
		event_id = $(this).siblings(".event_id").val();

		// event is required for this operation
		if (event_id == undefined || event_id == null)
			return;

		// checking if user is in dashboard or on teams page
		dashboard = false;
		if (window.location.href.indexOf("dashboard") >= 0) dashboard = true;
		postData = "dashboard=" + dashboard;

		$.ajax({
			type: "DELETE",
			url: "/events/" + event_id,
			dataType: "JSON",
			data: postData,
			success: function (data) {
				// console.log(data);

				// bootstrap dynamic content issue
				$("#add_event" + event_id).modal("hide");
				$(".modal-backdrop").remove();
				$(".modal-open").removeClass("modal-open");

				// remove from UI, depending on page
				if (dashboard)
					$(".dashboard-event-widget").html(data.design);
				else
					$(".team-events-widget").html(data.design);
				applyValidationToEditEventForm();
			},
			error: function(XMLHttpRequest, textStatus, errorThrown) {
				console.log(XMLHttpRequest.responseText);
			}
		});
	});

	// update event
	// update the event and refresh content list
	applyValidationToEditEventForm();
	function applyValidationToEditEventForm() {

		// date and time picker for edit event
		// evaluating fields on set
		$(".datepicker").pickadate({
			onSet: function(context) {
				$(".edit_event").data("bootstrapValidator").revalidateField("date");
			}
		});
		$(".timepicker").pickatime({
			onSet: function(context) {
				$(".edit_event").data("bootstrapValidator").revalidateField("time");
			}
		});

		$(".edit_event").bootstrapValidator({
			feedbackIcons: {
				valid: 'glyphicon glyphicon-ok',
				invalid: 'glyphicon glyphicon-remove',
				validating: 'glyphicon glyphicon-refresh'
			},
			fields: {
				title: { validators: { notEmpty: { message: 'The event title is required' }, stringLength: { min: 5, message: "The length of event name should be greater or equal to 5." } } },
				date: { validators: { notEmpty: { message: 'The event date is required' } } },
				time: { validators: { notEmpty: { message: 'The event time is required' } } },
				where: { validators: { notEmpty: { message: 'The event where is required' } } }
			}
		}).on("success.form.bv", function(event) {
			// Prevent form submission
			event.preventDefault();
			event_id = $(".event_id", this).val();

			// event is required for this operation
			if (event_id == undefined || event_id == null)
				return;

			// checking if user is on dashboard or on teams page
			dashboard = false;
			if (window.location.href.indexOf("dashboard") >= 0) dashboard = true;
			postData = "&dashboard=" + dashboard;
			postData = $(this).serialize() + postData;

			// Use Ajax to submit form data
			$.ajax({
				type: "PUT",
				url: "/events/" + event_id,
				dataType: "JSON",
				data: postData,
				success: function (data) {
					// console.log(data);

					// bootstrap dynamic content issue
					$("#add_event" + event_id).modal("hide");
					$(".modal-backdrop").remove();
					$(".modal-open").removeClass("modal-open");

					// update UI depending on page
					if (dashboard)
						$(".dashboard-event-widget").html(data.design);
					else
						$(".team-events-widget").html(data.design);
					applyValidationToEditEventForm();
				},
				error: function(XMLHttpRequest, textStatus, errorThrown) {
					console.log(XMLHttpRequest.responseText);
				}
			});
		});
	}
});

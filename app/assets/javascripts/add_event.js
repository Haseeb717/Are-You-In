$(document).ready(function() {
	$("#add-event").bootstrapValidator({
		feedbackIcons: {
			valid: 'glyphicon glyphicon-ok',
			invalid: 'glyphicon glyphicon-remove',
			validating: 'glyphicon glyphicon-refresh'
		},
		fields: {
			event_title: {
				validators: {
					notEmpty: {
						message: 'The Event Title is required'
					}
				}
			}
		}

	  })

		.on('success.form.bv', function(e) {
			// Prevent form submission
			e.preventDefault();

			// Get the form instance
			var $form = $(e.target);

			// Get the BootstrapValidator instance
			var bv = $form.data('bootstrapValidator');

			avatar = $(".dz-remove").attr("id")
			if (avatar == null || avatar == undefined)
				avatar = null;

			postData = $("#add-event").serialize();

			// Use Ajax to submit form data
			 $.ajax({
				 type: "POST",
				 url: "/events",
				 dataType: 'json',
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
					$("#create-team").removeAttr("disabled");

					response = JSON.parse(XMLHttpRequest.responseText);
					// response.error
				 }
			 });

		});

	});
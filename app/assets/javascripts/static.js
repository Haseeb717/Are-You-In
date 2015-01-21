$(document).ready(function() {
	// LOGIN
	$("#form-login").bind("ajax:success", function(event, xhr, settings) {
		// in case of successfull login
		window.location.href = "/dashboard";
	}).bind("ajax:error", function(event, xhr, settings) {
		// in case of login failed
		$("#login-form-error").text("Invalid login or password.");
	});

	// SIGN UP
	$("#form-register").bind("ajax:success", function(event, xhr, settings) {
		// in case of successfull signup
		window.location.href = "/dashboard";
	}).bind("ajax:error", function(event, xhr, settings) {
		// in case of failed registration
		errors = "";

		// email errors
		if (xhr.responseJSON.errors.email != undefined) {
			for(var i = 0; i < xhr.responseJSON.errors.email.length; i++) {
				errors = errors + "Email " + xhr.responseJSON.errors.email[i] + "<br/>";
			}
		}

		// password errors
		if (xhr.responseJSON.errors.password != undefined) {
			for(var i = 0; i < xhr.responseJSON.errors.password.length; i++) {
				errors = errors + "Password " + xhr.responseJSON.errors.password[i] + "<br/>";
			}
		}

		// phone errors
		if (xhr.responseJSON.errors.phone != undefined) {
			for(var i = 0; i < xhr.responseJSON.errors.phone.length; i++) {
				// phone has customized error messages in user model
				errors = errors + xhr.responseJSON.errors.phone[i] + "<br/>";
			}
		}

		// password confirmation errors
		if (xhr.responseJSON.errors.password_confirmation != undefined) {
			for(var i = 0; i < xhr.responseJSON.errors.password_confirmation.length; i++) {
				errors = errors + "Confirm password " + xhr.responseJSON.errors.password_confirmation[i] + "<br/>";
			}
		}

		if (errors == "") {
			errors = xhr.responseText;
		}

		$("#registration-form-error").html(errors);
	});


	// Return validation status from jQuery validate plugin.
	function validate(formData, jqForm, options) { 
		return $("#form-login").valid();
	}
});
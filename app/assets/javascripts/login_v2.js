/* Webarch Admin Dashboard 
-----------------------------------------------------------------*/ 
$(document).ready(function() {
	$(document).on( "click", "#login_toggle", function() {
		$("#form-login").show();

		$("#form-register").hide();
		$("#form-forgot-password").hide();
	})

	$(document).on( "click", "#register_toggle", function() {
		$("#form-login").hide();
		$("#form-forgot-password").hide();
		
		$("#form-register").show();
	})


	$(document).on( "click", "#forgot_toggle", function() {
		$("#form-forgot-password").show();
		
		$("#form-register").hide();
		$("#form-login").hide();
    });

	
	$(".lazy").lazyload({
		effect : "fadeIn"
	});
});
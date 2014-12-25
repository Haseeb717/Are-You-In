/* Webarch Admin Dashboard 
-----------------------------------------------------------------*/ 
$(document).ready(function() {
	$(document).on( "click", "#login_toggle", function() {
		$('#form-login').show();
		$('#form-register').hide();
	})

	$(document).on( "click", "#register_toggle", function() {
		$('#form-login').hide();
		$('#form-register').show();
	})
	
	$(".lazy").lazyload({
      effect : "fadeIn"
   });
});
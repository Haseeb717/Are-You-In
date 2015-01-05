$(document).ready(function() {

	// ajax start and ajax end, to show loading etc
	$("#loading").show(); 
	$("#loading").hide();

});

// Add another Team function
$( ".add-another" ).click(function() {
	$( ".form-wrap" ).show( "slow", function() {
		$(".form-wrap").each (function(){
			$(this).reset();
			$(".select2-container").select2("val", "");
		});
	});

	$( "#status" ).hide( "slow", function() {
		// Animation complete.
	});
});



	// toggle messaging div on team page

	$(".reply-trigger").click(function() {
	$(this).closest(".feed-function").find(".reply-wrap").slideToggle("fast");
	return false;
	});


	// shorten text, and show "more" button .. used on team message system
	$(".text-description").shorten({
		"showChars" : 160,
		"moreText"  : "See More",
		"lessText"  : "Less",
	});




$(document).ready(function(){
	$(".run-count").popover({
		placement : "top",
		html : "true"
	});
});

// Return validation status from jQuery validate plugin.
function validate(formData, jqForm, options) { 
	return $("#form-login").valid();
}
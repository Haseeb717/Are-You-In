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


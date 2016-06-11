/* Webarch Admin Dashboard 
/* This JS is only for DEMO Purposes - Extract the code that you need
-----------------------------------------------------------------*/	
//Cool ios7 switch - Beta version
//Done using pure Javascript
	

$(document).ready(function(){
	  //Dropdown menu - select2 plug-in
	  $(".source").select2();
	  
		$('.source-nosearch').select2({
		    minimumResultsForSearch: -1
		});

	  //Multiselect - Select2 plug-in
	  $("#multi").val(["Jim","Lucy"]).select2();
	  
	  //Date Pickers
	  $('.input-append.date').datepicker({
				autoclose: true,
				todayHighlight: true
	   });
	 
	 $('#dp5').datepicker();
	 
	 $('#sandbox-advance').datepicker({
			format: "dd/mm/yyyy",
			startView: 1,
			daysOfWeekDisabled: "3,4",
			autoclose: true,
			todayHighlight: true
    });
	
	//Time pickers
	$('.timepicker-default').timepicker();
    $('.timepicker-24').timepicker({
                minuteStep: 1,
                showSeconds: true,
                showMeridian: false
     });

	//Input mask - Input helper
	$(function($){
	   $("#date").mask("99/99/9999");
	   $("#phone").mask("(999) 999-9999");
	   $("#tin").mask("99-9999999");
	   $("#ssn").mask("999-99-9999");
	});
	
	/*/Drag n Drop up-loader
	$("div#myId").dropzone({ url: "/file/post" });
	*/

});
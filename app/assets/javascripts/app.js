$(document).ready(function() {

// ajax start and ajax end, to show loading etc


  $("#loading").show(); 

  $("#loading").hide();


    $('#add-team-form').bootstrapValidator({
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            team_name: {
                validators: {
                    notEmpty: {
                        message: 'The Team Name is required'
                    }
                }
            },
            sport: {
                validators: {
                    notEmpty: {
                        message: 'The Sport is required'
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

            postData = $(".add-team-form").serialize().replace("team_name", "name") + "&team_avatar_id=" + avatar;

            // Use Ajax to submit form data
             $.ajax({
                 type: "POST",
                 url: "/teams",
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



  // Add another Team function

  $( ".add-another" ).click(function() {

     $( ".form-wrap" ).show( "slow", function() {

        $('.form-wrap').each (function(){
          $(this).reset();
          $('.select2-container').select2('val', '');
        });

      });                     
     $( "#status" ).hide( "slow", function() {
        // Animation complete.
      });

  });


// creates a modal from button

    // $('.source-code').each(function(index){
    //     var $section = $(this);
    //     var code = $(this).html().replace('<!--', '').replace('-->', '');
                
    //     // Run code
    //     if($section.hasClass('in')){
    //         var $button = $('<div class="slide-primary"><input type="checkbox" name="switch" class="ios" checked="checked"/></div>');
    //         $button.on('click', {code: code}, function(event){
    //             eval(event.data.code);
    //         });
    //         $button.insertAfter($section);

    //         var Switch = require('ios7-switch')
    //                 , checkbox = $button.find('.ios')[0]
    //                 , mySwitch = new Switch(checkbox);
    //          mySwitch.toggle();
    //               mySwitch.el.addEventListener('click', function(e){
    //                 e.preventDefault();
    //                 mySwitch.toggle();
    //               }, false);

    //     }
    // });


    // $('.source-code').each(function(index){
    //     var $section = $(this);
    //     var code = $(this).html().replace('<!--', '').replace('-->', '');
                
    //     // Run code
    //     if($section.hasClass('maybe')){
    //         var $button = $('<a href="#">Not sure yet, remind me again</a>');
    //         $button.on('click', {code: code}, function(event){
    //             eval(event.data.code);
    //         });
    //         $button.insertAfter($section);
    //     }
    // });


    // // IN event fired
    // $('.source-code').each(function(index){
    //     var $section = $(this);
    //     var code = $(this).html().replace('<!--', '').replace('-->', '');
                
    //     // Run code
    //     if($section.hasClass('toggle-in')){
    //         var $button = $('<button class="btn first in-btn">In</button>');
    //         $button.on('click', {code: code}, function(event){
    //             eval(event.data.code);
    //             // $(".event_id", $(this).closest(".event-wrap")).val();
    //         });
    //         $button.insertAfter($section);
    //     }
    // });

    // $('.source-code').each(function(index){
    //     var $section = $(this);
    //     var code = $(this).html().replace('<!--', '').replace('-->', '');
                
    //     // Run code
    //     if($section.hasClass('toggle-maybe')){
    //         var $button = $('<button class="btn maybe-btn">Maybe</button>');
    //         $button.on('click', {code: code}, function(event){
    //             eval(event.data.code);
    //         });
    //         $button.insertAfter($section);
    //     }
    // });

    // $('.source-code').each(function(index){
    //     var $section = $(this);
    //     var code = $(this).html().replace('<!--', '').replace('-->', '');
                
    //     // Run code
    //     if($section.hasClass('toggle-out')){
    //         var $button = $('<button class="btn out-btn">Out</button>');
    //         $button.on('click', {code: code}, function(event){
    //             eval(event.data.code);
    //         });
    //         $button.insertAfter($section);
    //     }
    // });



    // Show and Hide Age Drop Downs for Add Team modal

    $('.toggles input[type=radio]').on('change', function () {
        if (!this.checked) return
        $('.collapse').not($('div.' + $(this).attr('class'))).slideUp();
        $('.collapse.' + $(this).attr('class')).slideDown();
    });


    // Show and Hide Game Opponent Input

    $('.toggles input[type=radio]').on('change', function () {
        if (!this.checked) return
        $('.collapse').not($('div.' + $(this).attr('class'))).slideUp();
        $('.collapse.' + $(this).attr('class')).slideDown();
    });

    // toggle messaging div on team page

    $('.reply-trigger').click(function() {
    $(this).closest('.feed-function').find('.reply-wrap').slideToggle('fast');
    return false;
    });

    // date and time picker for event

    $('.datepicker').pickadate()
    $('.timepicker').pickatime()


    // shorten text, and show 'more' button .. used on team message system

    $(".text-description").shorten({
        "showChars" : 160,
        "moreText"  : "See More",
        "lessText"  : "Less",
    });




$(document).ready(function(){
    $(".run-count").popover({
        placement : 'top',
        html : 'true'
    });
});

// Return validation status from jQuery validate plugin.
function validate(formData, jqForm, options) { 
    return $('#form-login').valid();
}
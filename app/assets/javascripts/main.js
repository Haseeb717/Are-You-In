/*

	APPY TEMPLATE BY IAMSUPVIEW.BE
	
	01. SMOOTH SCROLLING FOR ELEMENTS
	02. COLOR CHANGERS OF THE NAVIGATIONS
	03. OWL CAROUSEL USED FOR SCREENSHOTS
	04. MEDIACHECK
	05. HEADER TEXT FADE OUT ON SCROLL
	06. HEADER BLUR ON SCROLL EFFECT
	07. PARALLAX EFFECT
	08. TESTIMONIALS
	09. MODAL WINDOW ( THANKS DOWNLOAD )
	10. FORM SENDER
	11. FADE IN - FADE OUT BETWEEN EACH PAGES


*/


var ajax_form = true;

$(document).ready(function () { // Document ready



/*-----------------------------------------------------------------------------------*/
/*	01. SMOOTH SCROLLING FOR ELEMENTS ( JUST USE .scrollTo Class for smooth scrolling )
/*-----------------------------------------------------------------------------------*/
	
	
// SCROLL TO 
$('.scrollTo').click( function() { // Au clic sur un élément
	var page = $(this).attr('href'); // Page cible
	var speed = 1200; // Durée de l'animation (en ms)
	$('html, body').animate( { scrollTop: $(page).offset().top }, speed ); // Go
	return false;
});


/*-----------------------------------------------------------------------------------*/
/*	02. COLOR CHANGERS OF THE NAVIGATIONS
/*-----------------------------------------------------------------------------------*/


// NAVIGATIONS LINKS

$("section").waypoint(function(direction) {
    background = $(this).css('background-color');
        // Scrolling down
        if (direction === 'up') {
    background = $(this).css('background-color');
        // Scrolling down
        if (background == 'rgb(255, 255, 255)') {
            $("nav a").css("color","#FFF");
        } else {
            $("nav a").css("color","rgba(91,94,97,0.9)");

        }
        }
}, { offset: 45 });	



$("section").waypoint(function(direction) {
    background = $(this).css('background-color');
        // Scrolling down
        if (background == 'rgb(255, 255, 255)') {
            $("nav a").css("color","rgba(91,94,97,0.9)");
        } else {
            $("nav a").css("color","#fff");
        }
}, { offset: 45 });


// NAVIGATIONS LOGO

$("section").waypoint(function(direction) {
    background = $(this).css('background-color');
        // Scrolling down
        if (direction === 'up') {
        if (background == 'rgb(255, 255, 255)') {
            $(".topBar .barInner h1").css('background-image', 'url("/assets/logo_white.png")');
        } else {
            $(".topBar .barInner h1").css('background-image', 'url("/assets/logo.png")');
        }
        }
}, { offset: 45 });



$("section").waypoint(function(direction) {
    background = $(this).css('background-color');
        // Scrolling down
        if (background == 'rgb(255, 255, 255)') {
            $(".topBar .barInner h1").css('background-image', 'url("/assets/logo.png")');
        } else {
            $(".topBar .barInner h1").css('background-image', 'url("/assets/logo_white.png")');
        }
}, { offset: 45 });




	var sections = $("section");
	var navigation_links = $("nav a");
	
	sections.waypoint({
		handler: function(event, direction) {
		
			var active_section;
			active_section = $(this);
			if (direction === "up") active_section = active_section.prev();

			var active_link = $('nav a[href="#' + active_section.attr("id") + '"]');
			navigation_links.removeClass("selected");
			active_link.addClass("selected");

		},
		offset: '45'
	});




/*-----------------------------------------------------------------------------------*/
/*	03. OWL CAROUSEL USED FOR SCREENSHOTS
/*-----------------------------------------------------------------------------------*/




/*-----------------------------------------------------------------------------------*/
/*	04. MEDIACHECK
/*-----------------------------------------------------------------------------------*/


    mediaCheck({
        media: '(max-width: 768px)',
        entry: function () {



        },
        exit: function () {


/*-----------------------------------------------------------------------------------*/
/*	05. HEADER TEXT FADE OUT ON SCROLL
/*-----------------------------------------------------------------------------------*/
  

		YUI().use('node', function (Y) {
		  Y.on('domready', function () {
		    
		    var scrolling = false,
		        lastScroll,
		        i = 0;
		    
		    Y.on('scroll', function () {
		      if (scrolling === false) {
		        fade();
		      }
		      scrolling = true;
		      setTimeout(function () {
		        scrolling = false;
		        fade();
		      }, 0);
		    });
		    
		    function fade() {
		      
		      lastScroll = window.scrollY;
		      
		      Y.one('#leadFader').setStyles({
		        'transform' : 'translate3d(0,' + Math.round(lastScroll/1.9) + 'px,0)',
		        'opacity' : (100 - lastScroll/5)/100
		      });
		      
		      
		      if (scrolling === true) {
		        window.requestAnimationFrame(fade);
		      }
		    }
		    
		  });
		});


/*-----------------------------------------------------------------------------------*/
/*	06. HEADER BLUR ON SCROLL EFFECT
/*-----------------------------------------------------------------------------------*/
 
  
	(function() {
	  $(window).scroll(function() {
	    var oVal;
	    oVal = $(window).scrollTop() / 500;
	    return $(".blur").css("opacity", oVal);
	  });
	
	}).call(this);


/*-----------------------------------------------------------------------------------*/
/*	07. PARALLAX EFFECT
/*-----------------------------------------------------------------------------------*/
 


	//.parallax(xPosition, speedFactor, outerHeight) options:
	//xPosition - Horizontal position of the element
	//inertia - speed to move relative to vertical scroll. Example: 0.1 is one tenth the speed of scrolling, 2 is twice the speed of scrolling
	//outerHeight (true/false) - Whether or not jQuery should use it's outerHeight option to determine when a section is in the viewport
	$('.blurImg > div ').parallax("100%", 0.4);	
	$('#quotes').parallax("100%", -0.4);	




   }


}); /* END OF THE MEDIACHECK */



/*-----------------------------------------------------------------------------------*/
/*	08. TESTIMONIALS
/*-----------------------------------------------------------------------------------*/




    if ($('#testimonials').length){
		$('.testimonial-box-nav li a').each(function(e){
			if (e == 0) $(this).parents('#testimonials').children( $(this).attr('href') ).css('display','block').siblings('.testimonial').css('display','none');
      $(this).mouseenter(function(){
				$(this).addClass('active').parent().siblings().children('a').removeClass('active');
				$(this).parents('#testimonials').children( $(this).attr('href') ).css('display','block').siblings('.testimonial').css('display','none');
				$.waypoints('refresh');
			}).click(function(e){
				e.preventDefault();
			});
		});
	}




}); /* END OF Document Ready */


/*-----------------------------------------------------------------------------------*/
/*	11. FADE IN - FADE OUT BETWEEN EACH PAGES
/*-----------------------------------------------------------------------------------*/
 

function redirectPage() {
  window.location = linkLocation;
}

$(document).ready(function() {

$(".loader").fadeOut(600);

$('nav a, .fade-link').click(function(event) {
    if (this.href == "" || this.href == null) {
      event.preventDefault();
      return;
    }
    if ((this.href.indexOf("#") == -1) && (this.href.indexOf("mailto:") == -1) && (this.href.indexOf("javascript:") == -1) && (this.target != "_blank")) {
      event.preventDefault();
      linkLocation = this.href;
      $(".loader").fadeIn(600, redirectPage);
    }
  });

/*-----------------------------------------------------------------------------------*/
/*	11. FA CUSTOM
/*-----------------------------------------------------------------------------------*/

 /* Parsley Form Validation Front End */


$("form").each(function() {
	$(this).parsley()
});

});


$(document).ready(function() {   
    $('.dropdown').on('show.bs.dropdown', function(e){ 		// When dropdown is shown
	  $(this).find('.dropdown-menu').slideDown(300); 		// Slide down the submenu
	});

	$('.dropdown').on('hide.bs.dropdown', function(e){ 		// When dropdown is hidden
	  $(this).find('.dropdown-menu').slideUp(200);			// Slide up the submenu
	});

	$(window).scroll(function() {
	    if ($(this).scrollTop() >= 50) {        			// When page is scrolled more than 50px
	        $('#return-to-top').fadeIn(200);    			// Fade in the arrow
	    } else {
	        $('#return-to-top').fadeOut(200);   			// Else fade out the arrow
	    }
	});

	$('#return-to-top').click(function() {      			// When arrow is clicked
    	$('body,html').animate({
        	scrollTop : 0                       			// Scroll to top of body
    	}, 500);
	});

	$('.hamburger').click(function() {						// WHen hamburger menu is clicked
		$(this).toggleClass('is-active');					// Toggle class for animation
	});

	$(window).scroll(function(e) {							
		var headerHeight = $('.main-header').height();
		var imgHeight = $('.featured-img').height();
		var titleHeight = $('.post-heading').height();
		var scrollHeight = headerHeight + imgHeight + titleHeight;

	  	if ($(this).scrollTop() > scrollHeight) {							// When scroll height reach the share button
	   		$('.share-buttons').addClass('share-buttons--fix');				// Add class to fix the placement of button
	  	} else {
	    	$('.share-buttons').removeClass('share-buttons--fix');			// Else remove class
	  	}
	});

	$(window).scroll(function(e) {
		var headerHeight = $('.main-header').height();
		if ($(this).scrollTop() > headerHeight) {							// When scroll height reach the nav bar
	   		$('.navbar-wrapper').addClass('sticky').slideDown(300);			// Fix the nav bar wrapper to the top of window
	   		$('.sticky-logo').show();										// Show alt-logo
	  	} else {
	    	$('.navbar-wrapper').removeClass('sticky').removeAttr('style');	// Else remove the sticky class
	    	$('.sticky-logo').hide();										// Hide alt-logo
		};
	});
});

// ===== Scroll to Top ==== 

$(document).ready(function () {
  $('.dropdown').on('show.bs.dropdown', function (e) { // When dropdown is shown
    $(this).find('.dropdown-menu').slideDown(300); // Slide down the submenu
  });

  $('.dropdown').on('hide.bs.dropdown', function (e) { // When dropdown is hidden
    $(this).find('.dropdown-menu').slideUp(200); // Slide up the submenu
  });

  $(window).scroll(function () {
    if ($(this).scrollTop() >= 50) {  // When page is scrolled more than 50px
      $('#return-to-top').fadeIn(200);  // Fade in the arrow
    } else {
      $('#return-to-top').fadeOut(200); // Else fade out the arrow
    }
  });

  $('#return-to-top').click(function () { // When arrow is clicked
    $('body,html').animate({
      scrollTop: 0  // Scroll to top of body
    }, 500);
  });

  $('.hamburger').click(function () { // WHen hamburger menu is clicked
    $(this).toggleClass('is-active'); // Toggle class for animation
  });

  $(window).scroll(function (e) {
    let headerHeight = $('.main-header').height() || 0;
    let imgHeight = $('.featured-img').height() || 0;
    let titleHeight = $('.post-heading').height() || 0;
    let scrollHeight = headerHeight + imgHeight + titleHeight;

    if ($(this).scrollTop() > scrollHeight) { // When scroll height reach the share button
      $('.share-buttons').addClass('share-buttons--fix'); // Add class to fix the placement of button
    } else {
      $('.share-buttons').removeClass('share-buttons--fix');  // Else remove class
    }
  });

  $(window).scroll(function (e) {
    const headerHeight = $('.main-header').height();
    if ($(this).scrollTop() > headerHeight) { // When scroll height reach the nav bar
      $('.navbar-wrapper').addClass('sticky').slideDown("slow"); // Fix the nav bar wrapper to the top of window
      $('.sticky-logo').show(); // Show alt-logo
      $('.main-logo').hide(); // Hide main-logo
    } else {
      $('.navbar-wrapper').removeClass('sticky').removeAttr('style'); // Else remove the sticky class
      $('.sticky-logo').hide(); // Hide alt-logo
      $('.main-logo').show(); // Show main-logo
    }
  });

  // $(window).on('load resize',function(e) {
  // 	if ($(window).width() < 1201) {												// When window size is less than 1201px (mobile & tablet)
  // 		var position = $(window).scrollTop();
  // 		$(window).scroll(function() {
  // 			var scroll = $(window).scrollTop();
  // 		    if (scroll > position) {											// When scrolled down
  // 		        // $('.wc-pagination-mobile').slideUp(200);
  // 		        $('.wc-pagination-mobile').addClass('translate-up');			// Slide up top bar
  // 		        $('.wc-pagination-fix-mobile').addClass('translate-down');		// Slide down bottom bar
  // 		    } else {															// When scrolled up
  // 		    	// $('.wc-pagination-mobile').slideDown(200);
  // 		    	$('.wc-pagination-mobile').removeClass('translate-up');			// Slide down top bar
  // 		    	$('.wc-pagination-fix-mobile').removeClass('translate-down');	// Slide up bottom bar
  // 		    };
  // 		    position = scroll;
  // 		});
  // 	} else if ($(window).width() >= 1200) {										// When window size is more or equal than 1200px (desktop)
  // 		var position = $(window).scrollTop();
  // 		$(window).scroll(function() {
  // 			var scroll = $(window).scrollTop();
  // 		    if (scroll > position) {											// When scrolled down
  // 		        $('.wc-pagination-web').addClass('translate-up');				// Slide up top bar
  // 		    } else {															// When scrolled up
  // 		    	$('.wc-pagination-web').removeClass('translate-up');			// Slide down top bar
  // 		    };
  // 		    position = scroll;
  // 		});
  // 	}
  // });

  // $(window).on('click', function(e) {
  //     if ($(window).width() < 1201) {                                             // When window size is less than 1201px (mobile & tablet)
  //         $('.wc-pagination-mobile').toggleClass('translate-up');
  //         $('.wc-pagination-fix-mobile').toggleClass('translate-down');
  //     } else if ($(window).width() >= 1200) {                                     // When window size is more or equal than 1200px (desktop)
  //         $('.wc-pagination-web').toggleClass('translate-up');
  //     }
  // });

  $(window).on('mousemove', function (e) {
    if ($(window).width() < 1201 && e.clientY <= 10) {                           // When window size is less than 1201px (mobile & tablet)
      if ($(".wc-pagination-mobile").hasClass("translate-up")
        && $('.wc-pagination-fix-mobile').hasClass('translate-down')) {
        $('.wc-pagination-mobile').removeClass('translate-up');
        $('.wc-pagination-fix-mobile').removeClass('translate-down');
      }
      console.log(1);
    } else if ($(window).width() >= 1200 && e.clientY <= 10) {                   // When window size is more or equal than 1200px (desktop)
      if ($('.wc-pagination-web').hasClass('translate-up')) {
        $('.wc-pagination-web').removeClass('translate-up');
      }
    }
  });

});




// Theme Scripts

(function($) {

   'use strict';	
 
 // Lets make our mobile menu work
   
   		var nav = $( '#site-navigation' ), button, menu;
		if ( ! nav ) {
			return;
		}

		button = nav.find( '.menu-toggle' );
		if ( ! button ) {
			return;
		}

		// Hide button if menu is missing or empty.
		menu = nav.find( '.nav-menu' );
		if ( ! menu || ! menu.children().length ) {
			button.hide();
			return;
		}

		$( '.menu-toggle' ).on( 'click.startblogging', function() {
			nav.toggleClass( 'toggled-on' );
		} );	


//Go to top
$(function($) {
	var goTop = $('.go-top');
	$(window).scroll(function() {
		if ( $(this).scrollTop() > 600 ) {
			goTop.addClass('show');
		} else {
			goTop.removeClass('show');
		}
	}); 

	goTop.on('click', function() {
		$("html, body").animate({ scrollTop: 0 }, 1000);
		return false;
	});
});



})( jQuery );
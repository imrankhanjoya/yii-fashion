(function($) {

	//Viewport Checker
	$('.animate').viewportChecker({
		classToAdd: 'active', // Class to add to the elements when they are visible
	});

	/* Giving credit where it is due: thanks to Array for these sub-menu snippets */
	// Toggle sidebar sub menus
	$( ".menu" ).find( "li.menu-item-has-children, li.page_item_has_children" ).click( function(){
		$( ".menu li" ).not( this ).find( "ul" ).next().slideUp( 100 );
		$( this ).find( "> ul" ).stop( true, true ).slideToggle( 100 );
		$( this ).toggleClass( "active-sub-menu" );
		return false;
	});

	// Don't fire sub menu toggle if a user is trying to click the link
	$( ".menu-item-has-children a, .page_item_has_children a" ).click( function(e) {
		e.stopPropagation();
		return true;
	});

})(jQuery); //End of ( function( $ ) {
jQuery(document).ready(function() {

    // Sticky Menu
    var stickyNavTop = jQuery( '.dt-sticky' );

    if (stickyNavTop.length) {
        var stickyNavTop = stickyNavTop.offset().top;

        var stickyNav = function(){
            var scrollTop = jQuery(window).scrollTop();

            if (scrollTop > stickyNavTop) {
                jQuery( '.dt-sticky' ).addClass( 'dt-menu-sticky');
            } else {
                jQuery( '.dt-sticky' ).removeClass( 'dt-menu-sticky' );
            }
        };

        jQuery(window).scroll(function() {
            stickyNav();
        });
    }

    // Toggle Menu
    jQuery( '.dt-menu-md-js' ).on( 'click', function(){
        jQuery( '.dt-menu-wrap .menu' ).toggleClass( 'menu-show' );
        jQuery(this).find( '.fa' ).toggleClass( 'fa-bars fa-close' );
    });



    jQuery(".img-check").click(function(){
        jQuery(this).toggleClass("check");
    });
    jQuery(".showloading").click(function(){
        jQuery('#loading').modal({
        show: 'true'
        });
    });


   

});

 function saveFav(pid){
        jQuery('#loading').modal({
        show: 'true'
        });
        jQuery.ajax({
            url : ajax_url,
            type : 'post',
            async: false,
            dataType: 'json',
            data : {
                action : 'post_vote',
                post_id:pid
            },
            success : function( response ) {
                $(".vcount").html(response);
                $(".voteLable").html("Thanks for Vote");
                jQuery('#loading').modal('hide');

            }
        });
    }

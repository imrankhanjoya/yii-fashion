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
    jQuery( '.dt-menu-md' ).on( 'click', function(){
        jQuery( '.dt-menu-wrap .menu' ).toggleClass( 'menu-show' );
        jQuery(this).find( '.fa' ).toggleClass( 'fa-bars fa-close' );
    });

    // Featured Posts Slider

    var dt_featured_post_slider = new Swiper('.dt-featured-post-slider', {
        pagination: {
            el: '.swiper-pagination',
            type: 'bullets',
            clickable: true
        },
        slidesPerView: 3,
        breakpoints: {
            // when window width is <= 320px
            420: {
                slidesPerView: 1,
                spaceBetween: 0
            },
            // when window width is <= 640px
            640: {
                slidesPerView: 2,
                spaceBetween: 15
            },
            // when window width is <= 768px
            768: {
                slidesPerView: 2,
                spaceBetween: 20
            }
        },
        paginationClickable: true,
        spaceBetween: 30,
        autoplay: 3000,
        speed: 800,
        touchEventsTarget: 'swiper-wrapper'
    });

    // Back to Top
    if (jQuery('#back-to-top').length) {
        var scrollTrigger = 500, // px
            backToTop = function () {
                var scrollTop = jQuery(window).scrollTop();
                if (scrollTop > scrollTrigger) {
                    jQuery('#back-to-top').addClass('show');
                } else {
                    jQuery('#back-to-top').removeClass('show');
                }
            };
        backToTop();
        jQuery(window).on('scroll', function () {
            backToTop();
        });
        jQuery('#back-to-top').on('click', function (e) {
            e.preventDefault();
            jQuery('html,body').animate({
                scrollTop: 0
            }, 600);
        });
    }
});

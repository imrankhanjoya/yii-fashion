jQuery(document).ready(function($) {

    $(".navbar-toggle").click(function(){
        $(".navbar-default").toggleClass("in");
    });

    
    $(window).scroll(function (){
        var $nav = $('.navbar');
        if (150 <= $(window).scrollTop() ){
            $nav.addClass('navbar-small');
        } else {
            $nav.removeClass('navbar-small');
        }
    });
    

    // Sidebar slide
    $(".btn-sidebar").click(function(){
        $(".sidebar-button").toggleClass("active");
        $(".sidebar").toggleClass("active");
        $(".navbar-brand").toggleClass("active");
    });


    // Back to top
    jQuery(window).scroll(function () {
        if (jQuery(this).scrollTop() > 100) {
            jQuery('.back-to-top').css({
                bottom: "30px"
            });
        } else {
            jQuery('.back-to-top').css({
                bottom: "-100px"
            });
        }
    });
    jQuery('.back-to-top').click(function () {
        jQuery('html, body').animate({
            scrollTop: '0px'
        }, 1800);
        return false;
    });


    // Fade in on scroll
    $(window).scroll( function(){
        $('.fade-in').each( function(i){
            var bottom_of_object = $(this).position().top + $(this).outerHeight();
            var bottom_of_window = $(window).scrollTop() + $(window).height();
            if( bottom_of_window > bottom_of_object ){
                $(this).animate({'opacity':'1'},1500);
            }
        });
    });

    // Tooltip
    $('[data-toggle="tooltip"]').tooltip();
});
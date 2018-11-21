$(document).ready(function(){
	$('[data-toggle="tooltip"]').tooltip(); 
});

window.onload=function(){if(window.jQuery){$(document).ready(function(){$(".sidebarNavigation .navbar-collapse").hide().clone().appendTo("body").removeAttr("class").addClass("idaani-nav-menu").show();$("body").append("<div class='mobile-cnt-open'></div>");$(".navbar-toggle, .navbar-toggler").on("click",function(){$(".idaani-nav-menu").addClass($(".sidebarNavigation").attr("data-sidebarClass"));$(".idaani-nav-menu, .mobile-cnt-open").toggleClass("open");$(".mobile-cnt-open").on("click",function(){$(this).removeClass("open");$(".idaani-nav-menu").removeClass("open")})});$("body").on("click",".idaani-nav-menu.open .nav-item",function(){if(!$(this).hasClass("dropdown")){$(".idaani-nav-menu, .mobile-cnt-open").toggleClass("open")}});$(window).resize(function(){if($(".navbar-toggler").is(":hidden")){$(".idaani-nav-menu, .mobile-cnt-open").hide()}else{$(".idaani-nav-menu, .mobile-cnt-open").show()}})})}else{console.log("sidebarNavigation Requires jQuery")}}
$(document).ready(function() {
$(".tab").click(function () {
$(".tab").removeClass("active");
// $(".tab").addClass("active"); // instead of this do the below 
$(this).addClass("active");   
});
});

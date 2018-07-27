<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Pashmina
 */


$post = get_post();  

wp_enqueue_script( 'masonry','//cdnjs.cloudflare.com/ajax/libs/masonry/2.1.07/jquery.masonry.min.js', array( 'jquery' ), '4.0.6', '' );


wp_enqueue_script( 'infinitescroll', get_template_directory_uri() . '/js/jquery.infinitescroll.min.js', array( 'jquery' ), '4.0.6', '' );




?>


<h3>Who else have participated</h3>
<div id="container" class="grid" style="margin-bottom:25px;"></div>






<script type="text/javascript">
var $ = jQuery.noConflict();
var page = 0;
function loadData($grid){
		page++;
	jQuery.ajax({
      url : "/contest-participent.php?postid=348&page=1",
      type : 'GET',
      async: false,
      dataType: 'json',
      data : {
          postid :<?=$post->post_parent?>,
          page:page,
      },
      success : function( response ) {
          
          jQuery.each(response.data, function(index, value) {
          				
                    jQuery(".grid").append("<a href='"+value.guid+"' class='grid-item hidden-xs'><img   src='"+value.meta_value+"' /></a>");
                    jQuery(".grid").append("<a href='"+value.guid+"' class='grid-item hidden-md hidden-lg' ><img   src='"+value.meta_value+"' style='width:150px' /></a>");
                   
     
    						
                    
           });
          
				
          console.log(response.data);
          $grid.masonry('layout');
          $("#container").css("height","auto");
                       
      }
  });
}
$(document).ready(function() {
	var $grid = $('.grid').masonry({
				itemSelector: '.grid-item',
				columnWidth:100,
				percentPosition: true,

				});
	loadData($grid);			 
});

</script>

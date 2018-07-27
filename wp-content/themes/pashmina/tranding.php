<?php /* Template Name: Tranding */ ?>
<?php
if(!session_id()) {
    session_start();
}
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Pashmina
 */




wp_enqueue_script( 'masonry','//cdnjs.cloudflare.com/ajax/libs/masonry/2.1.07/jquery.masonry.min.js', array( 'jquery' ), '4.0.6', '' );


wp_enqueue_script( 'infinitescroll', get_template_directory_uri() . '/js/jquery.infinitescroll.min.js', array( 'jquery' ), '4.0.6', '' );

get_header(); 

/*****************************************************************/
global $wpdb;
$query =  "select posts.ID,posts.post_date,posts.post_content,posts.post_title,posts.guid,meta.meta_value from $wpdb->posts as posts 
left join $wpdb->postmeta as meta on meta.post_id = posts.ID and meta_key = 'image'
where  posts.post_type= 'contest_replay' and posts.post_status = 'publish'";
// $query =  "select posts.ID,posts.post_date,posts.post_content,posts.post_title,posts.guid as meta_value from $wpdb->posts as posts 
//  where  posts.post_type= 'attachment' ";

$results = $wpdb->get_results($query, ARRAY_A );
foreach($results as $key=>$val){
    $array = explode('.',$val['meta_value']);
    if(!empty($array)){
      $newimage = str_replace(".".end($array),"-mid.".end($array),$val['meta_value']);
    }

    $results[$key]['meta_value'] =$newimage;
  
}


/*****************************************************************/

?>
<div class="container">
<div class="col-md-12" style="margin-bottom:50px;">
                


<h3>Who else have participated</h3>
<div id="container" class="grid">
  <?PHP
  foreach ($results as $key => $value) {
  echo "<div class='grid-item frame'><a href='".$value['guid']."'><img src='".$value['meta_value']."' style='width:200px'></a></div>";
  }
  ?>

</div>
<style type="text/css">
.grid-item{margin:5px; }
.frame img{ border:1px solid #ccc; }
</style>



</div> 
</div> 



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
          page:page,
      },
      success : function( response ) {
          
          jQuery.each(response.data, function(index, value) {
                  
                    jQuery(".grid").append("<a href='"+value.guid+"' class='grid-item'><img   src='"+value.meta_value+"' /></a>");
                   
     
                
                    
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
        gutter:5

        });
  //loadData($grid);       
});

</script>
<?php
get_footer();
?>


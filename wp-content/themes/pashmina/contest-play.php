<?php /* Template Name: ContestPlay */ ?>
<?php
get_header('nomenu'); 

$post_ID = get_the_ID();
$post = get_post();
// global $query_string;
// echo $contest = $GLOBALS['wp_query']->query;
// print_r($contest);

?>


<div class="container">
   <div class="row">
      <div class="col-lg-3 col-xs-12 col-md-3 col-sm-12 panel-body">
      	Contest Play
      </div>
   </div>
</div>


<?php
get_footer();

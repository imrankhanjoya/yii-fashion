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
        <style type="text/css">
            .img-bdr-padd {
                border: 1px solid #ccc;
                padding: 2px;
                margin-bottom: 5px;
                width: 100%;
            }
            .padd-0 {
                padding: 0px !important;
            }
            .padd-1{
            	padding: 5px;
            }
            .padd-2{
            	padding: 5px !important;
            }
            .li-type {
                font-size: 12px;
                color: #555555;
                display: block;
            }
            .icon-1{
            	margin: 28px 12px;
				background-color: #000;
				padding: 9px;
				color: #fff;
				opacity: .6;
            }
            .li-1 {
                display: block;
                margin-top: 25px;
            }
            .paragraph-1 {
                line-height: 20px;
                margin-top: 48px;
                color: #555555;
                font-style: italic;
                font-size: 14px;
                padding-left: 13px;
            }
            .paragraph-3 {
                line-height: 20px;
                margin-top: 40px;
                color: #555555;
                font-style: italic;
                font-size: 14px;
                padding-left: 13px;
            }
            .paragraph-2 {
                line-height: 20px;
                margin-top: 20px;
                color: #555555;
                font-style: italic;
                font-size: 12px;
                padding-left: 13px;
            }
            .paragraph-4{
                color: #555555;
                font-style: ;
                font-size: 12px;
                float: left;
                padding-right: 10px;
            }
            .h1-style{
            	margin-top: 0px;
            	margin-bottom: 0px;
            }
            .dv-p {
                background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAASwAAAAUCAYAAAA3IwABAAAAlklEQVR4nO3XQQqDMBRFUfe/vpgVmG34OystHaS2kPbBOfBQ1EwvuNXEvu9PV4Bf2WYfCBbwLwQLiCFYQAzBAmIIFhBDsIAYggXEECwghmABMQQLiCFYQAzBAmIIFhBDsIAYggXEeDtYvfc6z/P+/PEeYIVpsHrvVVXVWnt5J1rASh//EooVsNo2xqirO47j8hkzs293A6A8+X1DGukpAAAAAElFTkSuQmCC);
                background-repeat: repeat-y;
            }
            .icon-bg{
            	background-image: url(http://images.thesartorialist.com/thumbnails/2018/07/61518pittitie-59x94.jpg);
				background-repeat: no-repeat;
				width: 60px;
				height: 94px;
				margin-top: -15px;
				margin-left: -6px;
            }
            .row-p {
                padding-left: 5px;
                margin-left: 10px;
            }
            .main-div{
            	background-color: #ce3e01;
				height: 68px;
				margin-top: 30px;
				margin-bottom: 30px;
            }
            .sycn-icon{
            	text-align:right;
            	float: right;
            	margin-top: 10px;
            	margin-bottom: 10px;
            }
            .b-b-img{
            	width: 100%;
            	margin-top: 30px;
            }
            .paragraph-5{
            	line-height: 17px;
            	padding: 8px 0px;
            }
            @media screen and (max-width: 768px) {
			.paragraph-5{
			    font-size: 13px;
			    padding-left: 30px;
			  }
			}
            .btn-1{
            	padding: 0px 0px;
            	font-size: 10px;
            }
            .img-lock{
            	margin-top: 10px;
            	width: 100%;
            }
            .link-div{
            	margin-bottom: 200px;
            }
            .titl-div{}
            .images-hover:hover .middle-ttl{
			    background: red;
			    position: relative;
			    -webkit-animation: mymove 1s infinite;
			    animation: mymove 1s forwards;
			    opacity: 1;
			    bottom: -200px;
			}
			@-webkit-keyframes mymove {
			    from {left: 0px;}
			    to {left: 200px;}
			}

			@keyframes mymove {
			    from {top: 0px;}
			    to {bottom: 150px;}

			}
			.middle-ttl {
			  background-color: #4CAF50;
			  color: white;
			  font-size: 12px;
			  text-align:center;
			  padding: 16px 32px;
			  position: absolute;
			  opacity: 0;
			  margin-top: -60px;
			}
        </style>
        <div class="container">
            <div class="col-md-8 col-lg-8 col-xs-12 padd-0">
            <div class="col-md-8 col-xs-12 ctitl-div">
                    <h1 class="h1-style">Title</h1>
                   </div>
                   <div class="col-md-12 col-xs-12" style="">
                   	<p class="paragraph-4">Date</p>
                   	<p class="paragraph-4">About line ..........</p>
                   	<p class="paragraph-4">contact us</p>
                   </div>
                <div class="col-md-4 col-xs-6 padd-2 images-hover">                    
                	<img class="img-bdr-padd" src="http://images.thesartorialist.com/thumbnails/2013/04/JoeMcKennaWeb-184x279.jpg">
                	<h5 class="middle-ttl">This is Title</h5>
                </div>
                <div class="col-md-4 col-xs-6 padd-2 images-hover">                    
                	<img class="img-bdr-padd" src="http://images.thesartorialist.com/thumbnails/2012/02/61610Sam_2136Web-184x279.jpg">
                	<h5 class="middle-ttl">This is Title</h5>
                </div>
                <div class="col-md-4 col-xs-6 padd-2 images-hover">                    
                	<img class="img-bdr-padd" src="http://images.thesartorialist.com/thumbnails/2012/03/101411IMG_6782web1-184x279.jpg">
                	<h5 class="middle-ttl">This is Title</h5>
                </div>
                <div class="col-md-4 col-xs-6 padd-2 images-hover">                    
                	<img class="img-bdr-padd" src="http://images.thesartorialist.com/thumbnails/2012/02/kurino4-184x279.jpg">
                	<h5 class="middle-ttl">This is Title</h5>
                </div>
                <div class="col-md-4 col-xs-6 padd-2 images-hover">                    
                	<img class="img-bdr-padd" src="http://images.thesartorialist.com/thumbnails/2012/02/eva4-184x279.jpg">
                	<h5 class="middle-ttl">This is Title</h5>
                </div>
                <div class="col-md-4 col-xs-6 padd-2 images-hover">                    
                	<img class="img-bdr-padd" src="http://images.thesartorialist.com/thumbnails/2012/02/617denim-dress2543Web-184x279.jpg">
                	<h5 class="middle-ttl">This is Title</h5>
                </div>
                <div class="col-md-12 col-xs-12 titl-div">
                    <h1 class="h1-style">Title</h1>
                   </div>
                   <div class="col-md-12 col-xs-12 col-sm-12">
                   	<p class="paragraph-4">Date</p>
                   	<p class="paragraph-4">About line ..........</p>
                   	<p class="paragraph-4">contact us</p>
                   </div>
                <div class="col-md-4 col-xs-6 padd-2 images-hover">
                    <img class="img-bdr-padd" src="http://images.thesartorialist.com/thumbnails/2012/02/RichardPrince-184x279.jpg">
                    <h5 class="middle-ttl">This is Title</h5>
                </div>
                <div class="col-md-4 col-xs-6 padd-2 images-hover">
                    <img class="img-bdr-padd" src="http://images.thesartorialist.com/thumbnails/2012/02/soth3-184x279.jpg">
                    <h5 class="middle-ttl">This is Title</h5>
                </div>
                <div class="col-md-4 col-xs-6 padd-2 images-hover">
                    <img class="img-bdr-padd" src="http://images.thesartorialist.com/thumbnails/2012/01/091211beigetop7622web-184x279.jpg">
                    <h5 class="middle-ttl">This is Title</h5>
                </div>
                <div class="col-md-4 col-xs-6 padd-2 images-hover">
                    <img class="img-bdr-padd" src="http://images.thesartorialist.com/thumbnails/2012/01/11510NWClubCollar_3227Web-184x279.jpg">
                    <h5 class="middle-ttl">This is Title</h5>
                </div>
                <div class="col-md-4 col-xs-6 padd-2 images-hover">
                    <img class="img-bdr-padd" src="http://images.thesartorialist.com/thumbnails/2012/01/12212Vict_9744Web1-184x279.jpg">
                    <h5 class="middle-ttl">This is Title</h5>
                </div>
                <div class="col-md-4 col-xs-6 padd-2 images-hover">
                    <img class="img-bdr-padd" src="http://images.thesartorialist.com/thumbnails/2012/01/41410MH_4859Web-184x279.jpg">
                    <h5 class="middle-ttl">This is Title</h5>
                </div>
                <div class="col-md-12 col-xs-12 titl-div">
                    <h1 class="h1-style">Title</h1>
                   </div>
                   <div class="col-md-12 col-xs-12 col-sm-12">
                   	<p class="paragraph-4">Date</p>
                   	<p class="paragraph-4">About line ..........</p>
                   	<p class="paragraph-4">contact us</p>
                   </div>
                <div class="col-md-4 col-xs-6 padd-2 images-hover">
                    <img class="img-bdr-padd" src="http://images.thesartorialist.com/thumbnails/2012/01/61911BlkCam_6813Web-184x279.jpg">
                    <h5 class="middle-ttl">This is Title</h5>
                </div>
                <div class="col-md-4 col-xs-6 padd-2 images-hover">
                    <img class="img-bdr-padd" src="http://images.thesartorialist.com/thumbnails/2012/01/angelo62311Denim_7999Web-184x279.jpg">
                    <h5 class="middle-ttl">This is Title</h5>
                </div>
                <div class="col-md-4 col-xs-6 padd-2 images-hover">
                    <img class="img-bdr-padd" src="http://images.thesartorialist.com/thumbnails/2012/01/121511Camel_1595Web1-184x279.jpg">
                    <h5 class="middle-ttl">This is Title</h5>
                </div>
                <div class="col-md-4 col-xs-6 padd-2 images-hover">
                    <img class="img-bdr-padd" src="http://images.thesartorialist.com/thumbnails/2012/01/GRL-NYC-2007web-184x279.jpg">
                    <h5 class="middle-ttl">This is Title</h5>
                </div>
                <div class="col-md-4 col-xs-6 padd-2 images-hover">
                    <img class="img-bdr-padd" src="http://images.thesartorialist.com/thumbnails/2012/01/2149BruceWeb1-184x279.jpg">
                    <h5 class="middle-ttl">This is Title</h5>
                </div>
                <div class="col-md-4 col-xs-6 padd-2 images-hover">
                    <img class="img-bdr-padd" src="http://images.thesartorialist.com/thumbnails/2012/01/111611GChat_3274Web-184x279.jpg">
                    <h5 class="middle-ttl">This is Title</h5>
                </div>
                <div class="col-md-12 col-xs-12 titl-div col-xs-12">
                    <h1 class="h1-style">Title</h1>
                   </div>
                   <div class="col-md-12 col-xs-12 col-sm-12">
                   	<p class="paragraph-4">Date</p>
                   	<p class="paragraph-4">About line ..........</p>
                   	<p class="paragraph-4">contact us</p>
                   </div>
                <div class="col-md-4 col-xs-6 padd-2 images-hover">
                    <img class="img-bdr-padd" src="http://images.thesartorialist.com/thumbnails/2011/12/22511Marina_0534Web1-184x279.jpg">
                    <h5 class="middle-ttl">This is Title</h5>
                </div>
                <div class="col-md-4 col-xs-6 padd-2 images-hover">
                    <img class="img-bdr-padd" src="http://images.thesartorialist.com/thumbnails/2011/12/111911NimaF_3478Web-184x279.jpg">
                    <h5 class="middle-ttl">This is Title</h5>
                </div>
                <div class="col-md-4 col-xs-6 padd-2 images-hover">
                    <img class="img-bdr-padd" src="http://images.thesartorialist.com/thumbnails/2011/12/kirk40511KM_8637Web-184x279.jpg">
                    <h5 class="middle-ttl">This is Title</h5>
                </div>
                <div class="col-md-4 col-xs-6 padd-2 images-hover">
                    <img class="img-bdr-padd" src="http://images.thesartorialist.com/thumbnails/2011/12/21211AlessandraCodinha_5500Web-184x279.jpg">
                    <h5 class="middle-ttl">This is Title</h5>
                </div>
                <div class="col-md-4 col-xs-6 padd-2 images-hover">
                    <img class="img-bdr-padd" src="http://images.thesartorialist.com/thumbnails/thumbs_import/9289AlexsandraCol2206Web-184x279.jpg">
                    <h5 class="middle-ttl">This is Title</h5>
                </div>
                <div class="col-md-4 col-xs-6 padd-2 images-hover">
                    <img class="img-bdr-padd" src="http://images.thesartorialist.com/thumbnails/thumbs_import/2008_1205_1-184x279.jpg">
                    <h5 class="middle-ttl">This is Title</h5>
                </div>
                <div class="col-md-8 col-xs-6 padd-2 images-hover">
                    <h6><i><span class="glyphicon glyphicon-triangle-left"></span>Older Entries</i></h6>
                </div>
            </div>
        
            <div class="col-md-4 col-lg-4 col-sx-4 padd-0">
                <div class="row padd-0">
                    <div class="col-md-6 col-xs-6">
                        <ul class="">
                            <li class="li-1">CATEGORIES</li>
                            <li class="li-type">...</li>
                            <li class="li-type">Man</li>
                            <li class="li-type">Woman</li>
                            <li class="li-type">Fashion Shows</li>
                            <li class="li-type">Book Features</li>
                            <li class="li-type">Style Profiles</li>
                            <li class="li-type">Vintage Photos</li>
                        </ul>
                    </div>
                    <div class="col-md-6 col-xs-6">
                        <ul class="">
                            <li class="li-1">ARCHIVES</li>
                            <li class="li-type">...</li>
                            <li class="li-type">July 2018</li>
                            <li class="li-type">June 2018</li>
                            <li class="li-type">May 2018</li>
                            <li class="li-type">April 2018</li>
                            <li class="li-type">March 2018</li>
                            <li class="li-type"><i>full archives<span class="glyphicon glyphicon-arrow-right"></span> </i></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-12 col-xs-12 col-sm-12">
                <hr>  
                </div>
                <div class="col-md-12 col-xs-12 col-sm-12 ">
                	<div class="main-div">
                			<div class="col-md-2 col-xs-2 col-sm-2 ">
                			<div class="icon-bg">
                					<span class="glyphicon glyphicon-search icon-1"></span>
                				</div>
                			</div>
                			<div class="col-md-10 col-xs-10 col-sm-10">
                				<p class="paragraph-5">To browser Photos by,keyword Use the advanced search</p> 
                			</div>
                		</div>
                	</div>
                <div class="col-md-12 col-xs-12 col-sm-12 padd-0">
                	<div class="col-md-6 col-xs-6 col-sm-6">
                		<h5>RANDOM POSTS</h5>
                	</div>
                	<div class="col-md-6 col-xs-6 col-sm-6 ">
                		<span style="" class="glyphicon glyphicon-refresh sycn-icon"></span>
                	</div>
                </div>
                <div class="col-md-4 col-xs-4 col-sm-4 padd-2">
                    <img class="img-bdr-padd" src="http://images.thesartorialist.com/thumbnails/thumbs_import/Guido-Palau-84x129.jpg">
                </div>
                <div class="col-md-4 col-xs-4 col-sm-4 padd-2">
                    <img class="img-bdr-padd" src="http://images.thesartorialist.com/thumbnails/2012/12/Brooks-Bros-tall-socks_web-84x129.jpg">
                </div>
                <div class="col-md-4 col-xs-4 col-sm-4 padd-2">
                    <img class="img-bdr-padd" src="http://images.thesartorialist.com/thumbnails/thumbs_import/30911Eliza_6612Web-84x129.jpg">
                </div>
                <div class="col-md-4 col-xs-4 col-sm-4 padd-2">
                    <img class="img-bdr-padd" src="http://images.thesartorialist.com/thumbnails/2014/12/111214BikeB7131Web-84x129.jpg">
                </div>
                <div class="col-md-4 col-xs-4 col-sm-4 padd-2">
                    <img class="img-bdr-padd" src="http://images.thesartorialist.com/thumbnails/thumbs_import/baggy-84x129.jpg">
                </div>
                <div class="col-md-4 col-xs-4 col-sm-4 padd-2">
                    <img class="img-bdr-padd" src="http://images.thesartorialist.com/thumbnails/thumbs_import/6238FabWalkingweb-84x129.jpg">
                </div>
                <div class="col-md-4 col-xs-4 col-sm-4 padd-2">
                    <img class="img-bdr-padd" src="http://images.thesartorialist.com/thumbnails/2012/01/11112Claudia_5220Web-84x129.jpg">
                </div>
                <div class="col-md-4 col-xs-4 col-sm-4 padd-2">
                    <img class="img-bdr-padd" src="http://images.thesartorialist.com/thumbnails/2015/01/11415Michi6B2794Web-84x129.jpg">
                </div>
                <div class="col-md-4 col-xs-4 col-sm-4 padd-2">
                    <img class="img-bdr-padd" src="http://images.thesartorialist.com/thumbnails/2013/09/7213Flam16818web-84x129.jpg">
                </div>
                <div class="col-md-12 col-xs-12 col-sm-12">
                	<img class="b-b-img" src="http://www.thesartorialist.com/wp-content/themes/sartorialist/images/sartorialist_x_book.jpg">
                </div>
                <div class="col-md-12 col-xs-12 col-sm-12">
                <h5 style="margin-top: 30px;">TWITTER</h5>
                </div>
				<div class="row-p">
				<div class="col-md-12 col-xs-12 col-sm-12" style="padding-left: 0px;">
					<div class="dv-p">
					<p class="paragraph-1">side barWriting Basics—The Paragraph. ... Paragraphs are visual cues to writing, cues for keeping the reader on track. If you're writing a novel or short story, you're well beyond </p>	
					<p class="paragraph-3">side barWriting Basics—The Paragraph. ... Paragraphs are visual cues to writing, cues for keeping the reader on track. If you're writing a novel or short story, you're well beyond </p>	
					<p class="paragraph-3">side barWriting Basics—The Paragraph. ... Paragraphs are visual cues to writing, cues for keeping the reader on track. If you're writing a novel or short story, you're well beyond </p>	
					</div>
				</div>
				</div>
				<div class="col-md-12 col-xs-12 col-sm-12">
				<button type="button" style="padding: 0px; margin-top: 20px; border-radius: 0px;" class="btn btn btn-secondary"><i>Follow the sartorialist<span class="glyphicon glyphicon-arrow-right"></span></i></button>
            </div>
          	    <div class="col-md-4 col-xs-4 padd-2">
                    <img class="img-lock" src="http://images.thesartorialist.com/thumbnails/2016/08/1317370907459042868-1471263602-90x90.jpg">
                </div>
                <div class="col-md-4 col-xs-4 padd-2">
                    <img class="img-lock" src="http://images.thesartorialist.com/thumbnails/2016/08/1316002170352821033-1471116002-90x90.jpg">
                </div>
                <div class="col-md-4 col-xs-4 padd-2">
                    <img class="img-lock" src="http://images.thesartorialist.com/thumbnails/2016/08/1315547083553677058-1471114802-90x90.jpg">
                </div>
                <div class="col-md-4 col-xs-4 padd-2">
                    <img class="img-lock" src="http://images.thesartorialist.com/thumbnails/2016/08/1315385574580170266-1471113601-90x90.jpg">
                </div>
                <div class="col-md-4 col-xs-4 padd-2">
                    <img class="img-lock" src="http://images.thesartorialist.com/thumbnails/2016/08/1315275462767102135-1471112402-90x90.jpg">
                </div>
                <div class="col-md-4 col-xs-4 padd-2">
                    <img class="img-lock" src="http://images.thesartorialist.com/thumbnails/2016/08/1315184054102271239-1471002602-90x90.jpg">
                </div>
                 <div class="col-md-4 col-xs-4 padd-2">
                    <img class="img-lock" src="http://images.thesartorialist.com/thumbnails/2016/08/1314792937678533296-1470955802-90x90.jpg">
                </div>
                <div class="col-md-4 col-xs-4 padd-2">
                    <img class="img-lock" src="http://images.thesartorialist.com/thumbnails/2016/08/1314647054735632457-1470939002-90x90.jpg">
                </div>
                <div class="col-md-4 col-xs-4 padd-2">
                    <img class="img-lock" src="http://images.thesartorialist.com/thumbnails/2016/08/1314580159864947072-1470930601-90x90.jpg">
                </div>
                <div class="col-md-12 col-xs-12 col-sm-12 padd-0">
				<button type="button" style="padding: 0px; margin-top: 20px; border-radius: 0px;" class="btn btn btn-secondary"><i>Follow the sartorialist<span class="glyphicon glyphicon-arrow-right"></span></i></button>
            </div>
            <div class="col-md-12 col-xs-12 col-sm-12 link-div">
            	<h4>LINKS</h4>
            	<div class="col-md-6 col-xs-6 col-sm-6">
            		<p>....</p>
            		<img src="http://www.thesartorialist.com/wp-content/themes/sartorialist/images/link_danziger.jpg">
            		<p>...</p>
            	</div>
            	<div class="col-md-6 col-xs-6 col-sm-6">
            		<p>....</p>
            		<img src="http://www.thesartorialist.com/wp-content/themes/sartorialist/images/link_garance.jpg">
            		<p>...</p>
            	</div>
            </div>
            <div class="col-md-12 col-xs-12 col-sm-12">
            	<h3>SUBSCRIBE</h3>
            	<p>....</p>
            	<h4>THE SARTORIALIST</h4>
            	<p class="paragraph-2">Subscribe to the content of this blog, in the rss feed reader of your choice.</p>
            </div>

        </div>
      </div>

        <?php
get_footer();
?>
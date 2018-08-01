<?php
/*
Plugin Name: MySiteMap
Plugin URI: http://simplysocial.co.in
description:-
This is to generate gloat.me sitemap
Version: 1.2
Author: Mr. Imran khan joya
Author URI: https://imrankhanjoya.wordpress.com
License: GPL2
*/



function sg_create_sitemap() {

	$allFiles = [];
	for($i=0;$i<100;$i++) {
			$page = $i;
			$per_page =20000;
			$offset = $page *$per_page;
		  $postsForSitemap = get_posts(array(
		    'posts_per_page' => $per_page,
			 'offset'=>$offset,
		    'orderby' => 'modified',
		    'post_type'  => array('top_items','discuss'),
		    'order'    => 'DESC'
		  ));
		  if(empty($postsForSitemap))
				continue;

		  $sitemap = '<?xml version="1.0" encoding="UTF-8"?>';
		  $sitemap .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';

		  foreach($postsForSitemap as $post) {
		    setup_postdata($post);

		    $postdate = explode(" ", $post->post_modified);
		    $date = date("Y-m-d\TH:i:s.000\Z",strtotime($postdate));
		    $sitemap .= '<url>'.
		      '<loc>'. get_permalink($post->ID) .'</loc>'.
		      '<lastmod>'.$date.'</lastmod>'.
		      '<changefreq>daily</changefreq>'.
		      '<priority>0.8</priority>'.
		    '</url>';
		  }

		  $sitemap .= '</urlset>';

		  $file = "pro/sitemap-co-".$page.".xml";
			$filePath = ABSPATH .$file;
			$fp = fopen($filePath, "w");
		  
		  fwrite($fp, $sitemap);
		  fclose($fp);
		  $allFiles[] = $file;
	}
	return $allFiles;
}


function create_sitemap_product() {
	$allFiles = [];
	for($i=0;$i<100;$i++) {
	
			$page = $i;
			$per_page =20000;
			$offset = $page *$per_page;		
			$postsForSitemap = get_posts(array(
			 'posts_per_page' => $per_page,
			 'offset'=>$offset,
			 'orderby' => 'ID',
			 'post_type'  => array('product'),
			 'order'    => 'ASC'
			));
			if(empty($postsForSitemap))
				continue;

			$sitemap = '<?xml version="1.0" encoding="UTF-8"?>';
			$sitemap .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';

			foreach($postsForSitemap as $post) {
			 setup_postdata($post);

			 $postdate = explode(" ", $post->post_modified);
			 $date = date("Y-m-d\TH:i:s.000\Z",strtotime($postdate)); 
			 $sitemap .= '<url>'.
			   '<loc>'. get_permalink($post->ID) .'</loc>'.
			   '<lastmod>'.$date.'</lastmod>'.
			   '<changefreq>daily</changefreq>'.
			   '<priority>0.8</priority>'.
			 '</url>';
			}

			$sitemap .= '</urlset>';
			$file = "pro/sitemap-pro-".$page.".xml";
			$filePath = ABSPATH .$file;
			$fp = fopen($filePath, "w");
			fwrite($fp, $sitemap);
			fclose($fp);

			$allFiles[] = $file;
	}
	return $allFiles;
}

function tag_sitemap(){
	$allFiles = [];
	$terms = get_tags();
	$allTerms = array_chunk($terms,100);
	foreach($allTerms as $page=>$cterms){
		$sitemap = '<?xml version="1.0" encoding="UTF-8"?>';
			$sitemap .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';
		foreach($cterms as $term){
			$date = date("Y-m-d\TH:i:s.000\Z"); 
			$sitemap .= '<url>'.
			   '<loc>'. get_term_link($term->term_taxonomy_id).'</loc>'.
			   '<lastmod>'.$date.'</lastmod>'.
			   '<changefreq>daily</changefreq>'.
			   '<priority>0.8</priority>'.
			 '</url>';
			
		}
		$sitemap .= '</urlset>';
		$file = "pro/sitemap-tag-".$page.".xml";
		$filePath = ABSPATH .$file;
		$fp = fopen($filePath, "w");
		fwrite($fp, $sitemap);
		fclose($fp);
		$allFiles[] = $file;
	}
	return $allFiles;
}
function cat_sitemap(){
	$allFiles = [];
	$terms = get_categories();
	$allTerms = array_chunk($terms,100);
	foreach($allTerms as $page=>$cterms){
		$sitemap = '<?xml version="1.0" encoding="UTF-8"?>';
			$sitemap .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';
		foreach($cterms as $term){
			$date = date("Y-m-d\TH:i:s.000\Z"); 
			$sitemap .= '<url>'.
			   '<loc>'. get_term_link($term->term_taxonomy_id).'</loc>'.
			   '<lastmod>'.$date.'</lastmod>'.
			   '<changefreq>daily</changefreq>'.
			   '<priority>0.8</priority>'.
			 '</url>';
			
		}
		$sitemap .= '</urlset>';
		$file = "pro/sitemap-cat-".$page.".xml";
		$filePath = ABSPATH .$file;
		$fp = fopen($filePath, "w");
		fwrite($fp, $sitemap);
		fclose($fp);
		$allFiles[] = $file;
	}
	return $allFiles;
}

function create_sitemap(){
	
	//create_sitemap_static();
	$all1 = create_sitemap_product();
	$all2 = sg_create_sitemap();
	$all3 = tag_sitemap();
	$all4 = cat_sitemap();

	$alltotal = array_merge($all1,$all2,$all3,$all4);
	$sitemap = '<?xml version="1.0" encoding="UTF-8"?>';
	$sitemap .= '<sitemapindex xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';
	foreach($alltotal as $val){
		$date = date("Y-m-d\TH:i:s.000\Z"); 
		$sitemap .= '<sitemap>'.
			   '<loc>'.site_url()."/".$val.'</loc>'.
			   '<lastmod>'.$date.'</lastmod>'.
			 '</sitemap>';
	}
	$sitemap .= '</sitemapindex>';

	$filePath = ABSPATH .'sitemap.xml';
	$fp = fopen($filePath, "w");
	fwrite($fp, $sitemap);
	fclose($fp);


}
add_action("init", "create_sitemap");

/*
<?xml version="1.0" encoding="UTF-8"?>
<sitemapindex xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">

   <sitemap>

      <loc>http://www.example.com/sitemap1.xml.gz</loc>

      <lastmod>2004-10-01T18:23:17+00:00</lastmod>

   </sitemap>

   <sitemap>

      <loc>http://www.example.com/sitemap2.xml.gz</loc>

      <lastmod>2005-01-01</lastmod>

   </sitemap>

</sitemapindex>
 */
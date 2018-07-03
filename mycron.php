<?php
/**
 * A pseudo-CRON daemon for scheduling WordPress tasks
 *
 * WP Cron is triggered when the site receives a visit. In the scenario
 * where a site may not receive enough visits to execute scheduled tasks
 * in a timely manner, this file can be called directly or via a server
 * CRON daemon for X number of times.
 *
 * Defining DISABLE_WP_CRON as true and calling this file directly are
 * mutually exclusive and the latter does not rely on the former to work.
 *
 * The HTTP request to this file will not slow down the visitor who happens to
 * visit when the cron job is needed to run.
 *
 * @package WordPress
 */

ignore_user_abort(true);

if ( !empty($_POST) || defined('DOING_AJAX') || defined('DOING_CRON') )
	die();

/**
 * Tell WordPress we are doing the CRON task.
 *
 * @var bool
 */
define('DOING_CRON', true);

if ( !defined('ABSPATH') ) {
	/** Set up WordPress environment */
	require_once( dirname( __FILE__ ) . '/wp-load.php' );
}

require_once( ABSPATH . '/wp-admin/includes/taxonomy.php');


function amazonProduct($brand,$i,$cats){
        $region = "in";
        $private_key = "Hvipqt6B5syvI1YitiP61cTX6f0WasKcxnCepa1W";
        $associate_tag = "buypid-21";
        $public_key = 'AKIAIK7E2OWNUD4OEXAQ';
        $params = array(
            "Service" => "AWSECommerceService",
            "Operation" => "ItemSearch",
            "AWSAccessKeyId" => $public_key,
            "AssociateTag" => $associate_tag,
            "SearchIndex" => $cats, //Electronics
            "Keywords" => $brand,
            "ItemPage"=> $i,
            "ResponseGroup" => "Images,ItemAttributes,Offers,Reviews,SalesRank",
        );

            $url = aws_signed_request($region, $params, $public_key, $private_key, $associate_tag);
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
            $outputs = curl_exec ($ch);
            curl_close ($ch);
            $xml = json_encode(simplexml_load_string($outputs));
            $amazondata[] = json_decode($xml);
            if(isset($amazondata[0]->Items->Item) && count($amazondata[0]->Items->Item)>0){
               $products = $amazondata[0]->Items->Item;
               foreach($products as $product){
                if(isset($product->ItemAttributes->Brand)){
                    
                    savePost($product,$brand);
                }
               }
               
               
            if($amazondata[0]->Items->TotalPages>$i && $i<10){
                amazonProduct($brand,$i,$cats);
            }
        }
    }

     function aws_signed_request($region, $params, $public_key, $private_key, $associate_tag=NULL, $version='2017-08-01'){
        $method = 'GET';
        $host = 'webservices.amazon.'.$region;
        $uri = '/onca/xml';
        
        // additional parameters
        $params['Service'] = 'AWSECommerceService';
        $params['AWSAccessKeyId'] = $public_key;
        // GMT timestamp
        $params['Timestamp'] = gmdate('Y-m-d\TH:i:s\Z');
        // API version
        $params['Version'] = $version;
        if ($associate_tag !== NULL) {
            $params['AssociateTag'] = $associate_tag;
        }
        
        // sort the parameters
        ksort($params);
        
        // create the canonicalized query
        $canonicalized_query = array();
        foreach ($params as $param=>$value)
        {
            $param = str_replace('%7E', '~', rawurlencode($param));
            $value = str_replace('%7E', '~', rawurlencode($value));
            $canonicalized_query[] = $param.'='.$value;
        }
        $canonicalized_query = implode('&', $canonicalized_query);
        
        // create the string to sign
        $string_to_sign = $method."\n".$host."\n".$uri."\n".$canonicalized_query;
        
        // calculate HMAC with SHA256 and base64-encoding
        $signature = base64_encode(hash_hmac('sha256', $string_to_sign, $private_key, TRUE));
        
        // encode the signature for the request
        $signature = str_replace('%7E', '~', rawurlencode($signature));
        
        // create request
        $request = 'http://'.$host.$uri.'?'.$canonicalized_query.'&Signature='.$signature;
        
        return $request;
    }




function savePost($item,$brand){

	if($item->ItemAttributes->Title==""){
		return false;
	}

    echo "Storing Product";
	$ASIN = $item->ASIN;
	global $wpdb;
	$results = $wpdb->get_results( "select post_id, meta_key from $wpdb->postmeta where meta_value ='{$ASIN}' order by meta_id desc limit 1 ", ARRAY_A );

	$postId = isset($results[0]['post_id'])?$results[0]['post_id']:0;
	$tiemAttr = $item->ItemAttributes;
	$postarr = array();
	$postarr['ID'] =  $postId;
	$postarr['post_author'] = 1;
	$postarr['post_type'] = 'product';
	$postarr['post_title'] =  $tiemAttr->Title;
	$postarr['post_name'] =  $tiemAttr->Title;
    if(is_array($tiemAttr->Feature)){
	   $postarr['post_content'] =  "<ul class='pro_featurs'><li>".implode("</li><li>",$tiemAttr->Feature)."</li></ul>";
    }else{
       $postarr['post_content'] = $tiemAttr->LegalDisclaimer;
    }
        
	$postarr['post_excerpt'] =  $tiemAttr->LegalDisclaimer;
    $postarr['post_status'] =  "publish";
	$postarr['comment_status'] =  "open";
	$postarr['meta_input']['ASIN'] =  $item->ASIN;
	$postarr['meta_input']['EAN'] =  $tiemAttr->EAN;
	$postarr['meta_input']['LargeImage'] =  $item->LargeImage->URL;
	$postarr['meta_input']['SalesRank'] =  $item->SalesRank;
	$postarr['meta_input']['DetailPageURL'] =  $item->DetailPageURL;
    $postarr['meta_input']['ListPrice'] =  $tiemAttr->ListPrice->FormattedPrice;
    $postarr['meta_input']['LowestNewPrice'] =  $tiemAttr->OfferSummary->LowestNewPrice->FormattedPrice;
    $postarr['meta_input']['Publisher'] =  $tiemAttr->Publisher;
    $postarr['meta_input']['Manufacturer'] =  $tiemAttr->Manufacturer;
    $postarr['meta_input']['Brand'] =  $tiemAttr->Brand;
	$tags = array();
	$Tagresult = preg_replace("/[^a-zA-Z ]+/", "",$tiemAttr->Title);
	$tags = explode(" ",$Tagresult);
	$skip = array("and","the","an","a","of","with","which");
	foreach ($tags as $key => $value) {
	    
	    if(strlen($value)<2 || in_array($value,$skip)){
	        unset($tags[$key]);
	    }
	}




	$post_ID = wp_insert_post($postarr,true );
    echo "\n";
    echo $postarr['post_title'];
    echo " ".$post_ID;
    echo "\n";
    $cat[] = wp_create_category($tiemAttr->Brand,0);
	$cat[] = wp_create_category($brand,0);
	$cat[] = wp_create_category($tiemAttr->ProductGroup,0);
	wp_set_post_categories( $post_ID,$cat); 
	wp_set_post_tags($post_ID,$tags);

}
amazonProduct("aloe vera",1,"Beauty");
amazonProduct("oily skin",1,"Beauty");
die();
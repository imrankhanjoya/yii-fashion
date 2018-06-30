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


$item = '{"ASIN":"B00DRE0XJ4","DetailPageURL":"https:\/\/www.amazon.in\/Lotus-Herbals-Whitening-Brightening-Nourishing\/dp\/B00DRE0XJ4?SubscriptionId=AKIAIK7E2OWNUD4OEXAQ&tag=buypid-21&linkCode=xm2&camp=2025&creative=165953&creativeASIN=B00DRE0XJ4","ItemLinks":{"ItemLink":[{"Description":"Add To Wishlist","URL":"https:\/\/www.amazon.in\/gp\/registry\/wishlist\/add-item.html?asin.0=B00DRE0XJ4&SubscriptionId=AKIAIK7E2OWNUD4OEXAQ&tag=buypid-21&linkCode=xm2&camp=2025&creative=165953&creativeASIN=B00DRE0XJ4"},{"Description":"Tell A Friend","URL":"https:\/\/www.amazon.in\/gp\/pdp\/taf\/B00DRE0XJ4?SubscriptionId=AKIAIK7E2OWNUD4OEXAQ&tag=buypid-21&linkCode=xm2&camp=2025&creative=165953&creativeASIN=B00DRE0XJ4"},{"Description":"All Customer Reviews","URL":"https:\/\/www.amazon.in\/review\/product\/B00DRE0XJ4?SubscriptionId=AKIAIK7E2OWNUD4OEXAQ&tag=buypid-21&linkCode=xm2&camp=2025&creative=165953&creativeASIN=B00DRE0XJ4"},{"Description":"All Offers","URL":"https:\/\/www.amazon.in\/gp\/offer-listing\/B00DRE0XJ4?SubscriptionId=AKIAIK7E2OWNUD4OEXAQ&tag=buypid-21&linkCode=xm2&camp=2025&creative=165953&creativeASIN=B00DRE0XJ4"}]},"SalesRank":"371","SmallImage":{"URL":"https:\/\/images-eu.ssl-images-amazon.com\/images\/I\/51OOx1z77qL._SL75_.jpg","Height":"75","Width":"75"},"MediumImage":{"URL":"https:\/\/images-eu.ssl-images-amazon.com\/images\/I\/51OOx1z77qL._SL160_.jpg","Height":"160","Width":"160"},"LargeImage":{"URL":"https:\/\/images-eu.ssl-images-amazon.com\/images\/I\/51OOx1z77qL.jpg","Height":"500","Width":"500"},"ImageSets":{"ImageSet":[{"@attributes":{"Category":"variant"},"SwatchImage":{"URL":"https:\/\/images-eu.ssl-images-amazon.com\/images\/I\/51E9Pl8kdhL._SL30_.jpg","Height":"30","Width":"30"},"SmallImage":{"URL":"https:\/\/images-eu.ssl-images-amazon.com\/images\/I\/51E9Pl8kdhL._SL75_.jpg","Height":"75","Width":"75"},"ThumbnailImage":{"URL":"https:\/\/images-eu.ssl-images-amazon.com\/images\/I\/51E9Pl8kdhL._SL75_.jpg","Height":"75","Width":"75"},"TinyImage":{"URL":"https:\/\/images-eu.ssl-images-amazon.com\/images\/I\/51E9Pl8kdhL._SL110_.jpg","Height":"110","Width":"110"},"MediumImage":{"URL":"https:\/\/images-eu.ssl-images-amazon.com\/images\/I\/51E9Pl8kdhL._SL160_.jpg","Height":"160","Width":"160"},"LargeImage":{"URL":"https:\/\/images-eu.ssl-images-amazon.com\/images\/I\/51E9Pl8kdhL.jpg","Height":"500","Width":"500"}},{"@attributes":{"Category":"variant"},"SwatchImage":{"URL":"https:\/\/images-eu.ssl-images-amazon.com\/images\/I\/51XwcZlf2AL._SL30_.jpg","Height":"30","Width":"30"},"SmallImage":{"URL":"https:\/\/images-eu.ssl-images-amazon.com\/images\/I\/51XwcZlf2AL._SL75_.jpg","Height":"75","Width":"75"},"ThumbnailImage":{"URL":"https:\/\/images-eu.ssl-images-amazon.com\/images\/I\/51XwcZlf2AL._SL75_.jpg","Height":"75","Width":"75"},"TinyImage":{"URL":"https:\/\/images-eu.ssl-images-amazon.com\/images\/I\/51XwcZlf2AL._SL110_.jpg","Height":"110","Width":"110"},"MediumImage":{"URL":"https:\/\/images-eu.ssl-images-amazon.com\/images\/I\/51XwcZlf2AL._SL160_.jpg","Height":"160","Width":"160"},"LargeImage":{"URL":"https:\/\/images-eu.ssl-images-amazon.com\/images\/I\/51XwcZlf2AL.jpg","Height":"500","Width":"500"}},{"@attributes":{"Category":"primary"},"SwatchImage":{"URL":"https:\/\/images-eu.ssl-images-amazon.com\/images\/I\/51OOx1z77qL._SL30_.jpg","Height":"30","Width":"30"},"SmallImage":{"URL":"https:\/\/images-eu.ssl-images-amazon.com\/images\/I\/51OOx1z77qL._SL75_.jpg","Height":"75","Width":"75"},"ThumbnailImage":{"URL":"https:\/\/images-eu.ssl-images-amazon.com\/images\/I\/51OOx1z77qL._SL75_.jpg","Height":"75","Width":"75"},"TinyImage":{"URL":"https:\/\/images-eu.ssl-images-amazon.com\/images\/I\/51OOx1z77qL._SL110_.jpg","Height":"110","Width":"110"},"MediumImage":{"URL":"https:\/\/images-eu.ssl-images-amazon.com\/images\/I\/51OOx1z77qL._SL160_.jpg","Height":"160","Width":"160"},"LargeImage":{"URL":"https:\/\/images-eu.ssl-images-amazon.com\/images\/I\/51OOx1z77qL.jpg","Height":"500","Width":"500"}}]},"ItemAttributes":{"Binding":"Personal Care","Brand":"Lotus","EAN":"0806360270608","EANList":{"EANListElement":"0806360270608"},"Feature":["Reduces Uneven Pigmentation","Enhances Skins Radiance","Reduces Dark Spots","Visible Fairness in a Week","Milk enzyme in the composition helps block melanin pathways"],"IsAdultProduct":"0","ItemDimensions":{"Height":"512","Length":"197","Weight":"57","Width":"118"},"Label":"Lotus","LegalDisclaimer":"Lotus Herbals White Glow Skin Whitening and Brightening Nourishing Night Cr\u00e8me, 60g","ListPrice":{"Amount":"42500","CurrencyCode":"INR","FormattedPrice":"INR 425.00"},"Manufacturer":"Lotus","Model":"B100116","MPN":"806360270608","NumberOfItems":"1","PackageDimensions":{"Height":"280","Length":"291","Weight":"49","Width":"291"},"PackageQuantity":"1","PartNumber":"806360270608","ProductGroup":"Beauty","ProductTypeName":"BEAUTY","Publisher":"Lotus","ReleaseDate":"2017-01-01","Studio":"Lotus","Title":"Lotus Herbals White Glow Skin Whitening and Brightening Nourishing Night Creme, 60g","UPC":"806360270608","UPCList":{"UPCListElement":"806360270608"}},"OfferSummary":{"LowestNewPrice":{"Amount":"26000","CurrencyCode":"INR","FormattedPrice":"INR 260.00"},"TotalNew":"47","TotalUsed":"0","TotalCollectible":"0","TotalRefurbished":"0"},"Offers":{"TotalOffers":"1","TotalOfferPages":"1","MoreOffersUrl":"https:\/\/www.amazon.in\/gp\/offer-listing\/B00DRE0XJ4?SubscriptionId=AKIAIK7E2OWNUD4OEXAQ&tag=buypid-21&linkCode=xm2&camp=2025&creative=165953&creativeASIN=B00DRE0XJ4","Offer":{"OfferAttributes":{"Condition":"New"},"OfferListing":{"OfferListingId":"dgUDnloHqxna2g%2B9Qy%2FuuEQjhqTpHXSm0NZwTl5YB1Bnw5quzD3xC7awwkyqCm8stVPSkcq0wp8SpjSAUBlJJdRozUTK%2B9nKZV6hFz9rn2YXgnkipJdq%2FA%3D%3D","Price":{"Amount":"31900","CurrencyCode":"INR","FormattedPrice":"INR 319.00"},"AmountSaved":{"Amount":"10600","CurrencyCode":"INR","FormattedPrice":"INR 106.00"},"PercentageSaved":"25","Availability":"Usually dispatched within 24 hours","AvailabilityAttributes":{"AvailabilityType":"now","MinimumHours":"0","MaximumHours":"0"},"IsEligibleForSuperSaverShipping":"1","IsEligibleForPrime":"1"}}},"CustomerReviews":{"IFrameURL":"https:\/\/www.amazon.in\/reviews\/iframe?akid=AKIAIK7E2OWNUD4OEXAQ&alinkCode=xm2&asin=B00DRE0XJ4&atag=buypid-21&exp=2018-06-30T09%3A05%3A45Z&v=2&sig=awPcrOLqK%252F5yutlJIYshYdtalWdl99jsHv%252B9pIGVh6Y%253D","HasReviews":"true"}}';

$item = json_decode($item);

print_r($item);

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
$postarr['post_content'] =  "<ul class='pro_featurs'><li>".implode("</li><li>",$tiemAttr->Feature)."</li></ul>";
$postarr['post_excerpt'] =  $tiemAttr->LegalDisclaimer;
$postarr['comment_status'] =  "open";
$postarr['meta_input']['ASIN'] =  $item->ASIN;
$postarr['meta_input']['EAN'] =  $tiemAttr->EAN;
$postarr['meta_input']['LargeImage'] =  $item->LargeImage->URL;
$postarr['meta_input']['SalesRank'] =  $item->SalesRank;
$postarr['meta_input']['DetailPageURL'] =  $item->DetailPageURL;
$postarr['meta_input']['ListPrice'] =  $tiemAttr->ListPrice->FormattedPrice;
$postarr['meta_input']['LowestNewPrice'] =  $tiemAttr->OfferSummary->LowestNewPrice->FormattedPrice;
$postarr['meta_input']['Publisher'] =  $tiemAttr->Publisher;
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

$cat[] = wp_create_category($tiemAttr->Brand,0);
$cat[] = wp_create_category($tiemAttr->ProductGroup,0);
wp_set_post_categories( $post_ID,$cat); 
wp_set_post_tags($post_ID,$tags);
print_r($val);
die();

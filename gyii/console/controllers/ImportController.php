<?PHP
namespace console\controllers;


use yii;
use yii\console\Controller;
use common\models\Skipwords;
use common\models\Products;
use common\models\WpTermsQuery;
use common\models\ProductTerms;
use common\models\Brands;
use common\models\WpTermTaxonomy;
use common\models\ProductTermsQuery;
/*
TRUNCATE wp_term_taxonomy;
TRUNCATE wp_terms;
TRUNCATE wp_termmeta;
TRUNCATE product_terms;
TRUNCATE products;


SELECT wp_term_taxonomy.term_id,wp_terms.name from wp_term_taxonomy join wp_terms on wp_terms.term_id = wp_term_taxonomy.term_id where wp_term_taxonomy.taxonomy = 'category'


*/

class ImportController extends Controller
{
    
    public function actionIndex(){
        for($i=0;$i<200;$i++) {
            $brands = new brands();
            $brand = $brands->find()->orderBy(["modified_at"=>"desc"])->one();
            print_r($brand->brand);
            $this->actionProducts($brand->brand,1,"Beauty",false); 
            $brand->modified_at = date("Y-m-d h:m:s");
            $brand->save();
              
        }
    }
    

     public function actionProducts($brand,$i,$cats,$skip=false){

        echo "Porcessing Page $i for brand $brand and $cats";
        echo "\n";
        
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

        	//sleep(4);
        	$key = md5(serialize($params));
        	$xml = \Yii::$app->cache->get($key);
            
            

            if(empty($xml)){
            	echo $url = $this->aws_signed_request($region, $params, $public_key, $private_key, $associate_tag);

	            $ch = curl_init();
	            curl_setopt($ch, CURLOPT_URL, $url);
	            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
	            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
	            $outputs = curl_exec ($ch);
	            curl_close ($ch);
	            $xml = json_encode(simplexml_load_string($outputs));
	            Yii::$app->cache->set($key,$xml);
        	}
            $amazondata[] = json_decode($xml);
            
            if(isset($amazondata[0]->Items->Item) && count($amazondata[0]->Items->Item)>0){
               $products = $amazondata[0]->Items->Item;
               foreach($products as $product){
                if(isset($product->ItemAttributes->Brand)){ 
                    $this->savePost($product,$brand,$skip);
                }
               }
               
               
                if($amazondata[0]->Items->TotalPages>$i && $i<10){
                    $i++;
                    $this->actionProducts($brand,$i,$cats);

                }
            }else{
                echo $xml;
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




function savePost($item,$brand,$skip=false){

	if($item->ItemAttributes->Title=="" || !isset($item->LargeImage)){
		return false;
	}


    

    if( !isset($item->ItemAttributes->ListPrice) || (!isset($item->OfferSummary->LowestNewPrice) && $item->ItemAttributes->ListPrice->FormattedPrice=="")){
        return false;   
    }
    echo "Price";
    echo $item->ItemAttributes->ListPrice->FormattedPrice;
    echo "\n";
    $tiemAttr = $item->ItemAttributes;

    if($tiemAttr->ListPrice->FormattedPrice==""){
        echo "\nFormate price is empty ".$tiemAttr->ListPrice->FormattedPrice."\n";
        return false;
    }
    $offerPrice = 'NA';
    if(isset($tiemAttr->OfferSummary)){
    	$offerPrice = $tiemAttr->OfferSummary->LowestNewPrice->FormattedPrice;
        print_r($tiemAttr->OfferSummary);
    }

	$ASIN = $item->ASIN;
	

	$LegalDisclaimer = isset($tiemAttr->LegalDisclaimer)?$tiemAttr->LegalDisclaimer:"NA";

	$Products = new Products();
	$Products = $Products->findOne(['sku'=>$ASIN]);
	if(empty($Products)){
		echo "\nStoring new product\n";
		$Products = new Products();	
		$data['Products']['ID'] = 0;
	}else{
		echo "\Updating product\n";
	}

	if(isset($tiemAttr->Feature) && is_array($tiemAttr->Feature)){
	   $post_content =  "<ul class='pro_featurs'><li>".implode("</li><li>",$tiemAttr->Feature)."</li></ul>";
    }else{
       $post_content = $LegalDisclaimer;
    }
	
	$data['Products']['sku'] = $item->ASIN;
	$data['Products']['post_date'] = date("Y-m-d h:m:i");
	$data['Products']['post_content'] = $post_content;
	$data['Products']['post_title'] = $tiemAttr->Title;
	$data['Products']['post_excerpt'] = $LegalDisclaimer;
	$data['Products']['post_status'] = 'active';
	$data['Products']['post_parent'] = 0;
	$data['Products']['image'] = $item->LargeImage->URL;
	$data['Products']['guid'] = $this->gen_slug($tiemAttr->Title);
	$data['Products']['SalesRank'] =  isset($item->SalesRank)?$item->SalesRank:0;
	$data['Products']['DetailPageURL'] =  $item->DetailPageURL;
    $data['Products']['ListPrice'] =  $tiemAttr->ListPrice->FormattedPrice;
    $data['Products']['price'] =  $tiemAttr->ListPrice->Amount/100;
    $data['Products']['LowestNewPrice'] =  $offerPrice;
    $data['Products']['Publisher'] =  isset($tiemAttr->Publisher)?$tiemAttr->Publisher:"NA";
    $data['Products']['Manufacturer'] =  isset($tiemAttr->Manufacturer)?$tiemAttr->Manufacturer:"NA";
    $data['Products']['Brand'] =  $tiemAttr->Brand;
	$Products->load($data);
	
    if($Products->save(true)){

        if($skip ==true){
            //Save Or Get Term
            $WpTermsModel = new WpTermsQuery();
            $term_id = $WpTermsModel->saveInTerm($brand);

            //Save or get Term Texanomy
            $WpTermTaxonomyModel = new WpTermTaxonomy();
            $term_texonomy_id = $WpTermTaxonomyModel->saveGet($term_id,"post_tag");  
            
            //Save or get Term Texanomy in product terms
            $ProductTermsQueryModel = new ProductTermsQuery();
            $slug = $this->gen_slug($brand);
            $ProductTermsQueryModel->saveGet($term_texonomy_id,$Products->ID,$brand,$slug);

            $brand = $tiemAttr->Brand;
        }
            echo $brand;
            echo "\n";
            //Save Or Get Term
            $WpTermsModel = new WpTermsQuery();
            $term_id = $WpTermsModel->saveInTerm($brand);


            //Save or get Term Texanomy
            $WpTermTaxonomyModel = new WpTermTaxonomy();
            $term_texonomy_id = $WpTermTaxonomyModel->saveGet($term_id,"category");  

            
            //Save or get Term Texanomy in product terms
            $ProductTermsQueryModel = new ProductTermsQuery();
            $slug = $this->gen_slug($brand);
            $ProductTermsQueryModel->saveGet($term_texonomy_id,$Products->ID,$brand,$slug);

        
        $tags = array();
        $Tagresult = preg_replace("/[^a-zA-Z ]+/", "",$tiemAttr->Title);
        $tags = explode(" ",$Tagresult);
        $skipWords = $this->getSkipWords();
        foreach ($tags as $key => $value) {
            $lvalue = strtolower($value);
            if(strlen($value)<2 || in_array($lvalue,$skipWords) || in_array($value,$skipWords)){
                unset($tags[$key]);
                continue;
            }
            //Save Or Get Term
            $WpTermsModel = new WpTermsQuery();
            $term_id = $WpTermsModel->saveInTerm($value);


            //Save or get Term Texanomy
            $WpTermTaxonomyModel = new WpTermTaxonomy();
            $term_texonomy_id = $WpTermTaxonomyModel->saveGet($term_id,"post_tag");  
            
            //Save or get Term Texanomy in product terms
            $ProductTermsQueryModel = new ProductTermsQuery();
            $slug = $this->gen_slug($value);
            $ProductTermsQueryModel->saveGet($term_texonomy_id,$Products->ID,$value,$slug);
        }
    }else{
        print_r($data);
        print_r($Products->geterrors());
    }

	return;


}



function  gen_slug($str){
    # special accents
    $a = array('À','Á','Â','Ã','Ä','Å','Æ','Ç','È','É','Ê','Ë','Ì','Í','Î','Ï','Ð','Ñ','Ò','Ó','Ô','Õ','Ö','Ø','Ù','Ú','Û','Ü','Ý','ß','à','á','â','ã','ä','å','æ','ç','è','é','ê','ë','ì','í','î','ï','ñ','ò','ó','ô','õ','ö','ø','ù','ú','û','ü','ý','ÿ','A','a','A','a','A','a','C','c','C','c','C','c','C','c','D','d','Ð','d','E','e','E','e','E','e','E','e','E','e','G','g','G','g','G','g','G','g','H','h','H','h','I','i','I','i','I','i','I','i','I','i','?','?','J','j','K','k','L','l','L','l','L','l','?','?','L','l','N','n','N','n','N','n','?','O','o','O','o','O','o','Œ','œ','R','r','R','r','R','r','S','s','S','s','S','s','Š','š','T','t','T','t','T','t','U','u','U','u','U','u','U','u','U','u','U','u','W','w','Y','y','Ÿ','Z','z','Z','z','Ž','ž','?','ƒ','O','o','U','u','A','a','I','i','O','o','U','u','U','u','U','u','U','u','U','u','?','?','?','?','?','?');
    $b = array('A','A','A','A','A','A','AE','C','E','E','E','E','I','I','I','I','D','N','O','O','O','O','O','O','U','U','U','U','Y','s','a','a','a','a','a','a','ae','c','e','e','e','e','i','i','i','i','n','o','o','o','o','o','o','u','u','u','u','y','y','A','a','A','a','A','a','C','c','C','c','C','c','C','c','D','d','D','d','E','e','E','e','E','e','E','e','E','e','G','g','G','g','G','g','G','g','H','h','H','h','I','i','I','i','I','i','I','i','I','i','IJ','ij','J','j','K','k','L','l','L','l','L','l','L','l','l','l','N','n','N','n','N','n','n','O','o','O','o','O','o','OE','oe','R','r','R','r','R','r','S','s','S','s','S','s','S','s','T','t','T','t','T','t','U','u','U','u','U','u','U','u','U','u','U','u','W','w','Y','y','Y','Z','z','Z','z','Z','z','s','f','O','o','U','u','A','a','I','i','O','o','U','u','U','u','U','u','U','u','U','u','A','a','AE','ae','O','o');
    return strtolower(preg_replace(array('/[^a-zA-Z0-9 -]/','/[ -]+/','/^-|-$/'),array('','-',''),str_replace($a,$b,$str)));
}
function getSkipWords(){
    $skipWordsModel = new Skipwords();
    $skipwordsArray = $skipWordsModel->find()->select(['word'])->asArray()->all();
    $skipwords = array();
    foreach ($skipwordsArray as $key => $value) {
        $skipwords[] = $value['word'];
    }
    return $skipwords;
}


function actionImportBrand(){

    /*
    DELETE from brands where id in (
    SELECT id from (
    SELECT count(brand) as c , id 
    FROM brands 
    GROUP by brand HAVING c >1) as t)
    */
    $json = file_get_contents("http://dis.deideo.com/brands.json");
    $json = json_decode($json,true);
    foreach($json as $key => $value) {
        $brandModel = new Brands();
        $brandModel->brand = $value;
        $brandModel->image = "NA";
        $brandModel->status = 1;
        $brandModel->created_at = date("y-m-d h:m:i");
        $brandModel->modified_at = date("y-m-d h:m:i");
        $brandModel->save();
        print_r($brandModel->geterrors());

    }
    

}


}
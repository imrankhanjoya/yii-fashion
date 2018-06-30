<?php
/*
Plugin Name: MyAmazon
Plugin URI: http://simplysocial.co.in
description:-
My custom post ype system
Version: 1.2
Author: Mr. Imran khan joya
Author URI: http://mrtotallyawesome.com
License: GPL2
*/
?>
<?PHP
 function amazonProduct($brand,$i,$cats){
        //pr($keyword);die;
        $region = "in";
        $public_key = $this->AWSAccessKeyId;
        //$private_key = "It01rY+Ozsy1sOMpd2dY6Zi5IKEs0Zgg3uaOyfO0";
        //$associate_tag = "wwwgadgetguid-21";
        $private_key = $this->Secret_Access_Key;
        $associate_tag = $this->AssociateTag;
        $params = array(
            "Service" => "AWSECommerceService",
            "Operation" => "ItemSearch",
            "AWSAccessKeyId" => $public_key,
            "AssociateTag" => $associate_tag,
            "SearchIndex" => $cats->search_index, //Electronics
            "Keywords" => $cats->category.' '.$brand,
            //"Keywords" => $keyword,
            "ItemPage"=> $i,
            "ResponseGroup" => "Images,ItemAttributes,Offers,Reviews,SalesRank",
            //"Manufacturer" => $brand
        );

        $url = $this->aws_signed_request($region, $params, $public_key, $private_key, $associate_tag);
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
                    $save_product[] = [$cats->category,'amazon',json_encode($product),$product->ASIN,$product->ItemAttributes->Brand,date('Y-m-d h:i:s',time()),date('Y-m-d h:i:s',time())];
                }
               }
               
               //echo "<pre>";print_r($save_product);die;
               if(isset($save_product) && !empty($save_product)){
                    echo count($save_product);echo "<hr>";
                    Yii::$app->db2->createCommand()->batchInsert('raw_products', ['category','type','raw_data','affilated_product_id','brand','created_at','modified_at'], 
                        $save_product
                    )->execute();
                       $i++;
               }
            if($amazondata[0]->Items->TotalPages>$i && $i<10){
                $this->amazonProduct($brand,$i,$cats);
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
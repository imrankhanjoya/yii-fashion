<?php

namespace api\modules\v1\controllers;

use common\models\WpFavoritePost;
use yii\rest\Controller;
use Yii;

/**
 * Country Controller API
 *
 * @author Budi Irawan <deerawan@gmail.com>
 */
class FollowController extends Controller
{


    public function actionAddit(){

        $rawJson = file_get_contents("php://input");
        $postData  = json_decode($rawJson,true);  

        $WpFavoritePost = new WpFavoritePost();
        $WpFavoritePost = $WpFavoritePost->find();
        $favData = $WpFavoritePost->where(["user_id"=>$postData['user_id'],"post_id"=>$postData['post_id'],"post_type"=>$postData["post_type"]])->one();

        if(empty($favData)){
            $WpFavoritePost = new WpFavoritePost();
            $WpFavoritePost->user_id = $postData['user_id'];    
            $WpFavoritePost->post_id = $postData['post_id'];    
            $WpFavoritePost->post_type = $postData['post_type'];   
            if($WpFavoritePost->save(true)){
                return ["status"=>true,"msg"=>"added","data"=>$WpFavoritePost->id];        
            }else{
                return ["status"=>false,"msg"=>"error","post"=>$postData,"data"=>$WpFavoritePost->getErrors()];    
            }
        }else{
            $favData->delete();
            return ["status"=>true,"msg"=>"removed","data"=>$postData];
        }

            
        

        Yii::app()->end();

    }
}



<?php

namespace api\modules\v1\controllers;

use yii\rest\Controller;
use common\models\WpCommentsQuery;

/**
 * Country Controller API
 *
 * @author Budi Irawan <deerawan@gmail.com>
 */
class CommentController extends Controller
{
    public function actionProductComment(){
        $rawJson = file_get_contents("php://input");
        $postData  = json_decode($rawJson,true);
        
        $WpCommentsQuery = new WpCommentsQuery();
        $postComment =true;
        $existingComment = $WpCommentsQuery->find()->where(["comment_content"=>$postData['comment_content'],"comment_author"=>$postData['comment_author'],"comment_post_ID"=>$postData["comment_post_ID"]])->orderBy(["comment_ID"=>SORT_DESC])->one();

        if(!empty($existingComment)){
            $pID = $existingComment['comment_ID'];
            $tdiff = time() - strtotime($existingComment['comment_date']);
            if($tdiff>=4000){
                $postComment =true;
            }else{
                $postComment =false;
            }
        }
        if($postComment){
            
            $WpCommentsQuery = new WpCommentsQuery();
            $WpCommentsQuery->comment_ID = $postData['comment_ID']; 
            $WpCommentsQuery->comment_post_ID = $postData['comment_post_ID']; 
            $WpCommentsQuery->comment_content = $postData['comment_content']; 
            $WpCommentsQuery->comment_author_url = $postData['comment_author_url']; 
            $WpCommentsQuery->comment_author_IP = $postData['comment_author_IP']; 
            $WpCommentsQuery->comment_author_email = $postData['comment_author_email']; 
            $WpCommentsQuery->comment_karma = $postData['comment_karma']; 
            $WpCommentsQuery->comment_approved = $postData['comment_approved']; 
            $WpCommentsQuery->comment_type = $postData['comment_type']; 
            $WpCommentsQuery->user_id = $postData['user_id']; 
            $WpCommentsQuery->comment_agent = $postData['comment_agent']; 
            $WpCommentsQuery->comment_parent = $postData['comment_parent']; 
            $WpCommentsQuery->comment_author = $postData['comment_author']; 
            $WpCommentsQuery->comment_date = date("Y-m-d h:m:i"); 
            $WpCommentsQuery->comment_date_gmt = date("Y-m-d h:m:i"); 
            $WpCommentsQuery->load($postData);
            $WpCommentsQuery->save();
            return ["status"=>true,"msg"=>$pID."Posted commnet".$tdiff,"data"=>[]];    
            Yii::app()->end();    
        }else{
            return ["status"=>false,"msg"=>$pID."You are posting too fast".$tdiff,"data"=>$existingComment];    
            Yii::app()->end();    
        }

        
    }
}



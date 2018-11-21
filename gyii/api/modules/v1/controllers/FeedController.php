<?php

namespace api\modules\v1\controllers;

use yii\rest\Controller;
use common\models\WpPostsQuery;
use common\models\WpCommentsQuery;
use common\models\WpFavoritePost;
use common\models\WpUsers;

/**
 * Country Controller API
 *
 * @author Budi Irawan <deerawan@gmail.com>
 */
class FeedController extends Controller
{


    public function  actionAll(){



    }

    public function  actionPosts($userid,$page=0){
    	$limit = 10;
    	$offset = $limit * $page;
    	$postModel = new WpPostsQuery();
        $postModel = $postModel->find();
        $postModel = $postModel->select(["post_title","post_date","post_name","comment_count"]);
        $postModel = $postModel->where(["post_author"=>$userid,"post_status"=>'publish']);
        $postModel = $postModel->offset($offset)->limit($limit)->orderBy(['wp_posts.post_modified'=>SORT_DESC]);
        $allPosts = $postModel->asArray()->all();
        return ["status"=>true,"msg"=>"Discussion topic list","data"=>$allPosts];
        Yii::app()->end();
    }

    public function  actionUserComments($userid,$page=0){
        $limit = 10;
        $offset = $limit * $page;
        $postModel = new WpCommentsQuery();
        $postModel = $postModel->find();
        $postModel = $postModel->select(["post_title","post_date","comment_count"]);
        $postModel = $postModel->join("inner join","wp_posts","wp_posts.ID = wp_comments.comment_post_ID");
        $postModel = $postModel->where(["user_id"=>$userid]);
        $postModel = $postModel->offset($offset)->limit($limit)->orderBy(['comment_date'=>SORT_DESC]);
        $allPosts = $postModel->asArray()->all();
        return ["status"=>true,"msg"=>"Discussion topic list","data"=>$allPosts];
        Yii::app()->end();
    }

    public function  actionFollowing($userid,$page=0){
        $limit = 10;
        $offset = $limit * $page;
        $postModel = new WpFavoritePost();
        $postModel = $postModel->find();
        $postModel = $postModel->select(["wp_favorite_post.user_id","wp_favorite_post.post_id","wp_users.*","wp_usermeta.meta_value"]);
        $postModel = $postModel->join("inner join","wp_users","wp_users.Id = wp_favorite_post.post_id");
        $postModel = $postModel->join("left join","wp_usermeta","wp_users.Id = wp_usermeta.user_id and wp_usermeta.meta_key='cupp_upload_meta'");
        $postModel = $postModel->where(["wp_favorite_post.user_id"=>$userid]);
        $postModel = $postModel->offset($offset)->limit($limit);
        $allPosts = $postModel->asArray()->all();
        return ["status"=>true,"msg"=>"Discussion topic list","data"=>$allPosts];
        Yii::app()->end();
    }

    public function  actionUsers($page=0){
    	$limit = 10;
    	$offset = $limit * $page;
    	$postModel = new WpUsers();
        $postModel = $postModel->find();
        $postModel = $postModel->select(["wp_users.*","wp_usermeta.meta_value"]);
        $postModel = $postModel->join("left join","wp_usermeta","wp_users.Id = wp_usermeta.user_id and wp_usermeta.meta_key='cupp_upload_meta'");
        $postModel = $postModel->offset($offset)->limit($limit);
        $allPosts = $postModel->asArray()->all();
        return ["status"=>true,"msg"=>"Top user list","data"=>$allPosts];
        Yii::app()->end();
    }

}



<?php
namespace api\modules\v1\controllers;

use yii\rest\Controller;
use common\models\WpTermRelationships;
use common\models\WpTermTaxonomy;
use common\models\WpPostsQuery;
use common\models\WpCommentsQuery;

/**
 * Country Controller API
 *
 * @author Budi Irawan <deerawan@gmail.com>
 */
class DiscussController extends Controller
{

    public function actionIndex($page=0,$limit=10){
        $postModel = new WpPostsQuery();
        $allPosts = $postModel->getList($page,"discuss",$limit,true);

        return ["status"=>true,"msg"=>"Discussion topic list","data"=>$allPosts];
        Yii::app()->end();
    }

    public function actionNocomment($page=0,$limit=10,$nocomment=true){
        $postModel = new WpPostsQuery();
        $allPosts = $postModel->getNocomments($page,"discuss",$limit,false,$nocomment);

        return ["status"=>true,"msg"=>"Discussion topic list","data"=>$allPosts];
        Yii::app()->end();
    }


    //http://dis.deideo.com/gyii/api/web/index.php?r=v1/detail&slug=this-sgre
    public function actionDetail($slug){
        $postModel = new WpPostsQuery();
        $onePosts = $postModel->getDetail($slug,'discuss');


        $WpTermRelationships = new WpTermRelationships();
        $term_taxonomy_ids = $WpTermRelationships->getTags($onePosts['ID']);

        $WpTermTaxonomy = new WpTermTaxonomy();
        $term_names_ids = $WpTermTaxonomy->find()->select(["wp_terms.name","wp_terms.slug","wp_term_taxonomy.term_taxonomy_id"])
        ->join("left join","wp_terms","wp_terms.term_id = wp_term_taxonomy.term_id")
        ->where(["in","term_taxonomy_id",$term_taxonomy_ids])->asArray()->all();
        $onePosts['tags'] =$term_names_ids;

        $WpCommentsQuery = new WpCommentsQuery();
        $onePosts['postComments'] = $WpCommentsQuery->getCommentByPost($onePosts['ID']);



        return ["status"=>true,"msg"=>"Product list","data"=>$onePosts];
        Yii::app()->end();
    }


    public function actionTopuser(){
        $WpCommentsQuery = new WpCommentsQuery();
        $topUser = $WpCommentsQuery->getTopUsers();

        return ["status"=>true,"msg"=>"Product list","data"=>$topUser];
        Yii::app()->end();
    }

    



}



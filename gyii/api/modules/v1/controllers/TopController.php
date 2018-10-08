<?php

namespace api\modules\v1\controllers;

use common\models\ProductsQuery;
use common\models\WpTermRelationships;
use common\models\WpTermTaxonomy;
use common\models\WpPostsQuery;
use yii\db\Query;
use yii\rest\Controller;


/**
 * Country Controller API
 *
 * @author Budi Irawan <deerawan@gmail.com>
 */
class TopController extends Controller
{
    //http://dis.deideo.com/gyii/api/web/index.php?r=v1/top&page=0
    public function actionIndex($page=0,$limit=12){

        $postModel = new WpPostsQuery();
        $allPosts = $postModel->getList($page,"top_items",$limit);

        return ["status"=>true,"msg"=>"Product list","data"=>$allPosts];
        Yii::app()->end();
    }

    //http://dis.deideo.com/gyii/api/web/index.php?r=v1/top&page=0
    public function actionRecent($page=0,$limit=4){

        $postModel = new WpPostsQuery();
        $allPosts = $postModel->getList($page,"top_items",$limit);

        return ["status"=>true,"msg"=>"Product list","data"=>$allPosts];
        Yii::app()->end();
    }

    //http://dis.deideo.com/gyii/api/web/index.php?r=v1/detail&slug=this-sgre
    public function actionDetail($slug){
    	$postModel = new WpPostsQuery();
        $onePosts = $postModel->getDetail($slug);

        $WpTermRelationships = new WpTermRelationships();
        $term_taxonomy_ids = $WpTermRelationships->getTags($onePosts['ID']);

        $WpTermTaxonomy = new WpTermTaxonomy();
        $term_names_ids = $WpTermTaxonomy->find()->select(["wp_terms.name","wp_terms.slug","wp_term_taxonomy.term_taxonomy_id"])
        ->join("left join","wp_terms","wp_terms.term_id = wp_term_taxonomy.term_id")
        ->where(["in","term_taxonomy_id",$term_taxonomy_ids])->asArray()->all();
        


        $ProductsQuery = new ProductsQuery();
        $bytermtax = $ProductsQuery->bytermtax($term_taxonomy_ids);

        $onePosts['tags'] =$term_names_ids;
        $onePosts['products'] =$bytermtax;
        return ["status"=>true,"msg"=>"Product list","data"=>$onePosts];
        Yii::app()->end();
    }

    
    
}



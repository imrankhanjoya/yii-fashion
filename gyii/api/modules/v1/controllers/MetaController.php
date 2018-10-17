<?php
namespace api\modules\v1\controllers;

use yii;
use yii\rest\Controller;
use common\models\Products;
use common\models\WpTermsQuery;
use common\models\WpTermTaxonomy;
use common\models\ProductTerms;
use common\models\Brands;

/**
 * Country Controller API
 *
 * @author Budi Irawan <deerawan@gmail.com>
 */
class MetaController extends Controller
{

    public function actionTags(){
        
        $allTags = yii::$app->cache->get("alltags");
        if(empty($allTags)){
            $WpTermTaxonomy = new WpTermTaxonomy();
            $val = $WpTermTaxonomy->find()->select(["wp_terms.name","wp_terms.slug","wp_term_taxonomy.term_taxonomy_id","wp_term_taxonomy.taxonomy"])->join("inner join","wp_terms","wp_terms.term_id = wp_term_taxonomy.term_id")->where(["taxonomy"=>"post_tag"])->orderBy(["wp_term_taxonomy.count"=>SORT_DESC])->asArray()->all();
            $allTags = [];
            foreach ($val as $key => $value) {
                $allTags[$value['term_taxonomy_id']] = array($value['name'],$value['slug'],$value['taxonomy']);
            }
            yii::$app->cache->set("alltags",$allTags);
        }

        return ["status"=>true,"msg"=>"Please avoid duplicate post","data"=>$allTags];
        Yii::app()->end();

        
    }

    public function actionCategories(){
        
        $allTags = yii::$app->cache->get("allCates");
        if(empty($allTags)){
            $WpTermTaxonomy = new WpTermTaxonomy();
            $val = $WpTermTaxonomy->find()->select(["wp_terms.name","wp_terms.slug","wp_term_taxonomy.term_taxonomy_id","wp_term_taxonomy.taxonomy"])->join("inner join","wp_terms","wp_terms.term_id = wp_term_taxonomy.term_id")->where(["taxonomy"=>"category"])->orderBy(["wp_term_taxonomy.count"=>SORT_DESC])->asArray()->all();
            $allTags = [];
            foreach ($val as $key => $value) {
                $allTags[$value['term_taxonomy_id']] = array($value['name'],$value['slug'],$value['taxonomy']);
            }
            yii::$app->cache->set("alltags",$allTags);
        }
        return ["status"=>true,"msg"=>"Please avoid duplicate post","data"=>$allTags];
        Yii::app()->end();

        
    }
}



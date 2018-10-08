<?PHP
namespace console\controllers;

use yii;
use yii\console\Controller;
use common\models\Skipwords;
use common\models\Products;
use common\models\WpTermsQuery;
use common\models\WpTermTaxonomy;
use common\models\ProductTerms;
use common\models\Brands;


class MycacheController extends Controller
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
        print_r($allTags);

        
    }
    



}
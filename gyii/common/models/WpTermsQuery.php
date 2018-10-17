<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\WpTerms;
use common\models\WpTermTaxonomy;
use common\models\ProductTermsQuery;

/**
 * WpTermsQuery represents the model behind the search form of `common\models\WpTerms`.
 */
class WpTermsQuery extends WpTerms
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['term_id', 'term_group'], 'integer'],
            [['name', 'slug'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = WpTerms::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'term_id' => $this->term_id,
            'term_group' => $this->term_group,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'slug', $this->slug]);

        return $dataProvider;
    }

    public function saveInTerm($term,$term_group=10){
        $term = trim($term);
        $fterm = $this->findOne(["name"=>$term]);
        if(empty($fterm)){
            $this->term_id    = 0;
            $this->name       = $term;
            $this->term_group = $term_group;
            $this->slug       = $this->gen_slug($term);
            if($this->save(true)){
                return $this->term_id;
            }else{
                return false;
            }
        }else{
            
            return $fterm->term_id;
        }
    }

    public function findTag($term,$type='post_tag'){
        $term = trim($term);
        $fterm = $this->find();
        $fterm = $fterm->select(["product_terms.object_id"]);
        
        $fterm = $fterm->join("inner join","wp_term_taxonomy","wp_terms.term_id = wp_term_taxonomy.term_id");
        $fterm = $fterm->join("inner join","product_terms","product_terms.term_taxonomy_id = wp_term_taxonomy.term_taxonomy_id");
        $fterm = $fterm->where(["LIKE","wp_terms.slug",$term]);
        $fterm = $fterm->andWhere(["wp_term_taxonomy.taxonomy"=>$type]);
        //echo $fterm->createCommand()->getRawSql();exit;
        $allProductIds = $fterm->asArray()->all();
        
        $allPId = [];
        foreach ($allProductIds as $key => $value) {
            $allPId[]=$value['object_id']*1;
        }
        return $allPId;
    }

    function  gen_slug($str){
    # special accents
    $a = array('À','Á','Â','Ã','Ä','Å','Æ','Ç','È','É','Ê','Ë','Ì','Í','Î','Ï','Ð','Ñ','Ò','Ó','Ô','Õ','Ö','Ø','Ù','Ú','Û','Ü','Ý','ß','à','á','â','ã','ä','å','æ','ç','è','é','ê','ë','ì','í','î','ï','ñ','ò','ó','ô','õ','ö','ø','ù','ú','û','ü','ý','ÿ','A','a','A','a','A','a','C','c','C','c','C','c','C','c','D','d','Ð','d','E','e','E','e','E','e','E','e','E','e','G','g','G','g','G','g','G','g','H','h','H','h','I','i','I','i','I','i','I','i','I','i','?','?','J','j','K','k','L','l','L','l','L','l','?','?','L','l','N','n','N','n','N','n','?','O','o','O','o','O','o','Œ','œ','R','r','R','r','R','r','S','s','S','s','S','s','Š','š','T','t','T','t','T','t','U','u','U','u','U','u','U','u','U','u','U','u','W','w','Y','y','Ÿ','Z','z','Z','z','Ž','ž','?','ƒ','O','o','U','u','A','a','I','i','O','o','U','u','U','u','U','u','U','u','U','u','?','?','?','?','?','?');
    $b = array('A','A','A','A','A','A','AE','C','E','E','E','E','I','I','I','I','D','N','O','O','O','O','O','O','U','U','U','U','Y','s','a','a','a','a','a','a','ae','c','e','e','e','e','i','i','i','i','n','o','o','o','o','o','o','u','u','u','u','y','y','A','a','A','a','A','a','C','c','C','c','C','c','C','c','D','d','D','d','E','e','E','e','E','e','E','e','E','e','G','g','G','g','G','g','G','g','H','h','H','h','I','i','I','i','I','i','I','i','I','i','IJ','ij','J','j','K','k','L','l','L','l','L','l','L','l','l','l','N','n','N','n','N','n','n','O','o','O','o','O','o','OE','oe','R','r','R','r','R','r','S','s','S','s','S','s','S','s','T','t','T','t','T','t','U','u','U','u','U','u','U','u','U','u','U','u','W','w','Y','y','Y','Z','z','Z','z','Z','z','s','f','O','o','U','u','A','a','I','i','O','o','U','u','U','u','U','u','U','u','U','u','A','a','AE','ae','O','o');
    return strtolower(preg_replace(array('/[^a-zA-Z0-9 -]/','/[ -]+/','/^-|-$/'),array('','-',''),str_replace($a,$b,$str)));
    }


    function getallTags(){
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
        return $allTags;
    }

    
}

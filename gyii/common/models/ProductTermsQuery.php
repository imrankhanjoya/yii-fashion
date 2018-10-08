<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\ProductTerms;

/**
 * ProductTermsQuery represents the model behind the search form of `common\models\ProductTerms`.
 */
class ProductTermsQuery extends ProductTerms
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['object_id', 'term_taxonomy_id', 'term_order'], 'integer'],
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
        $query = ProductTerms::find();

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
            'object_id' => $this->object_id,
            'term_taxonomy_id' => $this->term_taxonomy_id,
            'term_order' => $this->term_order,
        ]);

        return $dataProvider;
    }

    function saveGet($termId,$pid,$name,$slug){
        
        $model = $this->findOne(["term_taxonomy_id"=>$termId,"object_id"=>$pid]);
        if(empty($model)){
            $this->object_id = $pid;
            $this->term_taxonomy_id = $termId;
            $this->term_order = 0;
            $this->name = $name;
            $this->slug = $slug;
            if($this->save(true)){
                return true;
            }else{
                echo $termId ." For pid ".$pid;
                exit;
            }
        }

    }

    function productTags($pid){

        $ptags = $this->find();
        $ptags = $ptags->select(["wp_terms.name","wp_terms.slug","wp_term_taxonomy.taxonomy"]);
        $ptags = $ptags->join("inner join","wp_term_taxonomy","wp_term_taxonomy.term_taxonomy_id = product_terms.term_taxonomy_id");
        $ptags = $ptags->join("inner join","wp_terms","wp_terms.term_id = wp_term_taxonomy.term_id");
        $ptags = $ptags->where(["object_id"=>$pid]);
        $ptags = $ptags->asArray()->all();

        return $ptags;


    }
}

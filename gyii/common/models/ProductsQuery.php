<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Products;

/**
 * ProductsQuery represents the model behind the search form of `common\models\Products`.
 */
class ProductsQuery extends Products
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ID', 'SalesRank', 'price', 'post_parent'], 'integer'],
            [['sku', 'ListPrice', 'LowestNewPrice', 'post_date', 'post_content', 'post_title', 'post_excerpt', 'post_status', 'image', 'DetailPageURL', 'Publisher', 'Manufacturer', 'Brand', 'guid'], 'safe'],
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
        $query = Products::find();

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
            'ID' => $this->ID,
            'SalesRank' => $this->SalesRank,
            'price' => $this->price,
            'post_date' => $this->post_date,
            'post_parent' => $this->post_parent,
        ]);

        $query->andFilterWhere(['like', 'sku', $this->sku])
            ->andFilterWhere(['like', 'ListPrice', $this->ListPrice])
            ->andFilterWhere(['like', 'LowestNewPrice', $this->LowestNewPrice])
            ->andFilterWhere(['like', 'post_content', $this->post_content])
            ->andFilterWhere(['like', 'post_title', $this->post_title])
            ->andFilterWhere(['like', 'post_excerpt', $this->post_excerpt])
            ->andFilterWhere(['like', 'post_status', $this->post_status])
            ->andFilterWhere(['like', 'image', $this->image])
            ->andFilterWhere(['like', 'DetailPageURL', $this->DetailPageURL])
            ->andFilterWhere(['like', 'Publisher', $this->Publisher])
            ->andFilterWhere(['like', 'Manufacturer', $this->Manufacturer])
            ->andFilterWhere(['like', 'Brand', $this->Brand])
            ->andFilterWhere(['like', 'guid', $this->guid]);

        return $dataProvider;
    }

    //http://dis.deideo.com/gyii/api/web/index.php?r=v1/products
    public function bytag($tag,$page=0){

        $WpTermsQueryModel = new WpTermsQuery();
        $pIds = $WpTermsQueryModel->findTag($tag);

        $productModel = new ProductsQuery();
        $offset = $page * 10;

        $productModel = $productModel->find();
        $productModel = $productModel->where(["in","ID",$pIds]);
        $productModel = $productModel->offset($offset)->limit(10)->orderBy(['id'=> SORT_DESC]);
        //echo $productModel->createCommand()->getRawSql();exit;
        $allProducts = $productModel->all();
        return ["status"=>true,"msg"=>"Product list by $tag","data"=>$allProducts];
        Yii::app()->end();
    }

    public function bytermtax($ttids,$page=0){

        $ProductTermsQueryModel = new ProductTermsQuery();
        $ptermsAll = $ProductTermsQueryModel->find()->where(["in","term_taxonomy_id",$ttids])->asArray()->all();
        $pids = [];
        foreach($ptermsAll as $val){
            $pids[] = $val['object_id'];
        }
        //exit;

        $productModel = new ProductsQuery();
        $offset = $page * 10;

        $productModel = $productModel->find();
        $productModel = $productModel->join("inner join","product_terms","product_terms.object_id = products.ID");
        $productModel = $productModel->where(["in","product_terms.term_taxonomy_id",$pids]);
        $productModel = $productModel->offset($offset)->limit(10)->orderBy(['id'=> SORT_DESC]);
        //echo $productModel->createCommand()->getRawSql();exit;
        $allProducts = $productModel->all();
        return $allProducts;
    }

    public function detail($slug){
        $productModel = new ProductsQuery();

        $productModel = $productModel->find();
        $productModel = $productModel->where(["guid"=>$slug]);
        //echo $productModel->createCommand()->getRawSql();exit;
        $productDetail = $productModel->asArray()->one();
        

        return $productDetail;
    }
}

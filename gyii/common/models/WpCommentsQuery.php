<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\WpComments;

/**
 * WpCommentsQuery represents the model behind the search form of `common\models\WpComments`.
 */
class WpCommentsQuery extends WpComments
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['comment_ID', 'comment_post_ID', 'comment_karma', 'comment_parent', 'user_id'], 'integer'],
            [['comment_author', 'comment_author_email', 'comment_author_url', 'comment_author_IP', 'comment_date', 'comment_date_gmt', 'comment_content', 'comment_approved', 'comment_agent', 'comment_type','url'], 'safe'],
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
        $query = WpComments::find();

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
            'comment_ID' => $this->comment_ID,
            'comment_post_ID' => $this->comment_post_ID,
            'comment_date' => $this->comment_date,
            'comment_date_gmt' => $this->comment_date_gmt,
            'comment_karma' => $this->comment_karma,
            'comment_parent' => $this->comment_parent,
            'user_id' => $this->user_id,
        ]);

        $query->andFilterWhere(['like', 'comment_author', $this->comment_author])
            ->andFilterWhere(['like', 'comment_author_email', $this->comment_author_email])
            ->andFilterWhere(['like', 'comment_author_url', $this->comment_author_url])
            ->andFilterWhere(['like', 'comment_author_IP', $this->comment_author_IP])
            ->andFilterWhere(['like', 'comment_content', $this->comment_content])
            ->andFilterWhere(['like', 'comment_approved', $this->comment_approved])
            ->andFilterWhere(['like', 'comment_agent', $this->comment_agent])
            ->andFilterWhere(['like', 'comment_type', $this->comment_type]);

        return $dataProvider;
    }

    public function getCommentByPost($pid,$cType=false){

        $mquery = $this->find();
        $mquery = $mquery->select(["wp_comments.*","wp_usermeta.meta_value as userimage","wp_commentmeta.meta_value"]);
        $mquery = $mquery->join("left join","wp_usermeta","wp_usermeta.user_id = wp_comments.user_id and wp_usermeta.meta_key='cupp_upload_meta' ");
        $mquery = $mquery->join("left join","wp_commentmeta","wp_commentmeta.comment_id = wp_comments.comment_ID and wp_commentmeta.meta_key='attachmentId' ");
        $mquery = $mquery->where(["comment_post_ID"=>$pid]);
        if($cType){
            $mquery = $mquery->andWhere(["comment_type"=>$cType]);
        }else{
            $mquery = $mquery->andWhere(["!=","comment_type","product_review"]);
        }
        //echo $mquery->createCommand()->getRawSql();exit;
        return $mquery->asArray()->all();

    }
    public function getTopUsers(){
        $mquery = $this->find();
        $mquery = $mquery->select(["count(wp_comments.comment_ID) as count","wp_usermeta.meta_value as userimage","wp_comments.comment_author"]);
        $mquery = $mquery->join("left join","wp_usermeta","wp_usermeta.user_id = wp_comments.user_id and wp_usermeta.meta_key='cupp_upload_meta' ");
        $mquery->groupby(["wp_comments.user_id"]);
        $mquery->orderby(["count"=>SORT_DESC]);
        //echo $mquery->createCommand()->getRawSql();exit;
        return $mquery->asArray()->all();

    }
}

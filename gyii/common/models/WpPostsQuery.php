<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\WpPosts;

/**
 * WpPostsQuery represents the model behind the search form of `common\models\WpPosts`.
 */
class WpPostsQuery extends WpPosts
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ID', 'post_author', 'post_parent', 'menu_order', 'comment_count'], 'integer'],
            [['post_date', 'post_date_gmt', 'post_content', 'post_title', 'post_excerpt', 'post_status', 'comment_status', 'ping_status', 'post_password', 'post_name', 'to_ping', 'pinged', 'post_modified', 'post_modified_gmt', 'post_content_filtered', 'guid', 'post_type', 'post_mime_type'], 'safe'],
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
        $query = WpPosts::find();

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
            'post_author' => $this->post_author,
            'post_date' => $this->post_date,
            'post_date_gmt' => $this->post_date_gmt,
            'post_modified' => $this->post_modified,
            'post_modified_gmt' => $this->post_modified_gmt,
            'post_parent' => $this->post_parent,
            'menu_order' => $this->menu_order,
            'comment_count' => $this->comment_count,
        ]);

        $query->andFilterWhere(['like', 'post_content', $this->post_content])
            ->andFilterWhere(['like', 'post_title', $this->post_title])
            ->andFilterWhere(['like', 'post_excerpt', $this->post_excerpt])
            ->andFilterWhere(['like', 'post_status', $this->post_status])
            ->andFilterWhere(['like', 'comment_status', $this->comment_status])
            ->andFilterWhere(['like', 'ping_status', $this->ping_status])
            ->andFilterWhere(['like', 'post_password', $this->post_password])
            ->andFilterWhere(['like', 'post_name', $this->post_name])
            ->andFilterWhere(['like', 'to_ping', $this->to_ping])
            ->andFilterWhere(['like', 'pinged', $this->pinged])
            ->andFilterWhere(['like', 'post_content_filtered', $this->post_content_filtered])
            ->andFilterWhere(['like', 'guid', $this->guid])
            ->andFilterWhere(['like', 'post_type', $this->post_type])
            ->andFilterWhere(['like', 'post_mime_type', $this->post_mime_type]);

        return $dataProvider;
    }

    public function getList($page,$type,$limit=10,$getUser=false){
        $postModel = $this->find();
        $offset = $page * $limit;
        if($getUser)
            $fileds = ["wp_posts.*","pimg.guid as image","usermeta.meta_value as userimage","user.user_nicename","user.display_name"];
        else
            $fileds = ["wp_posts.*","pimg.guid as image"];
        $postModel = $postModel->select($fileds);
        
        if($getUser){
            $postModel = $postModel->join("inner join","wp_users as user","user.ID = wp_posts.post_author");
            $postModel = $postModel->join("left join","wp_usermeta as usermeta","usermeta.user_id = wp_posts.post_author and usermeta.meta_key = 'cupp_upload_meta'");
        }
        $postModel = $postModel->join("left join","wp_postmeta","wp_postmeta.post_id = wp_posts.ID and wp_postmeta.meta_key ='_thumbnail_id'");
        $postModel = $postModel->join("left join","wp_posts as pimg","pimg.ID = wp_postmeta.meta_value and pimg.post_type='attachment'");
        
        $postModel = $postModel->where(["wp_posts.post_status"=>"publish"]);
        $postModel = $postModel->andWhere(["wp_posts.post_type"=>$type]);
        $postModel = $postModel->offset($offset)->limit($limit)->orderBy(['wp_posts.post_modified'=>'desc']);

        //echo $postModel->createCommand()->getRawSql();exit;

        $allPosts = $postModel->asArray()->all();
        return $allPosts;
    }

    public function getNocomments($page,$type,$limit=10,$getUser=false,$nocomment=true){
        $postModel = $this->find();
        $offset = $page * $limit;
        if($getUser)
            $fileds = ["wp_posts.post_title","wp_posts.post_name","pimg.guid as image","usermeta.meta_value as userimage","user.user_nicename","user.display_name"];
        else
            $fileds = ["wp_posts.*","pimg.guid as image"];
        $postModel = $postModel->select($fileds);
        
        if($getUser){
            $postModel = $postModel->join("left join","wp_users as user","user.ID = wp_posts.post_author");
            $postModel = $postModel->join("left join","wp_usermeta as usermeta","usermeta.user_id = wp_posts.post_author and usermeta.meta_key = 'cupp_upload_meta'");
        }
        $postModel = $postModel->join("left join","wp_postmeta","wp_postmeta.post_id = wp_posts.ID and wp_postmeta.meta_key ='_thumbnail_id'");
        $postModel = $postModel->join("left join","wp_posts as pimg","pimg.ID = wp_postmeta.meta_value and pimg.post_type='attachment'");
        
        $postModel = $postModel->where(["wp_posts.post_status"=>"publish"]);
        if($nocomment==true)
            $postModel = $postModel->andWhere(["wp_posts.comment_count"=>0]);
        else
            $postModel = $postModel->andWhere(["!=","wp_posts.comment_count",0]);
        $postModel = $postModel->andWhere(["wp_posts.post_type"=>$type]);
        $postModel = $postModel->offset($offset)->limit($limit)->orderBy(['wp_posts.post_modified'=>'desc']);

        //echo $postModel->createCommand()->getRawSql();exit;

        $allPosts = $postModel->asArray()->all();
        return $allPosts;
    }

    public function getDetail($slug,$type='top_items'){

        $postModel = $this->find();
        $postModel = $postModel->select(["wp_posts.*","pimg.guid as image"]);
        $postModel = $postModel->join("left join","wp_postmeta","wp_postmeta.post_id = wp_posts.ID and wp_postmeta.meta_key ='_thumbnail_id'");
        $postModel = $postModel->join("left join","wp_posts as pimg","pimg.ID = wp_postmeta.meta_value and pimg.post_type='attachment'");
        $postModel = $postModel->where(["wp_posts.post_status"=>"publish"]);
        $postModel = $postModel->andWhere(["wp_posts.post_type"=>$type]);
        $postModel = $postModel->andWhere(["wp_posts.post_name"=>$slug]);
        //echo $postModel->createCommand()->getRawSql();exit;
        $onePosts = $postModel->asArray()->one();
        return $onePosts;
    }
}

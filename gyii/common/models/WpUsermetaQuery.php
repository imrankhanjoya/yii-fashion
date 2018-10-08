<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\WpUsermeta;

/**
 * WpUsermetaQuery represents the model behind the search form of `common\models\WpUsermeta`.
 */
class WpUsermetaQuery extends WpUsermeta
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['umeta_id', 'user_id'], 'integer'],
            [['meta_key', 'meta_value'], 'safe'],
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
        $query = WpUsermeta::find();

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
            'umeta_id' => $this->umeta_id,
            'user_id' => $this->user_id,
        ]);

        $query->andFilterWhere(['like', 'meta_key', $this->meta_key])
            ->andFilterWhere(['like', 'meta_value', $this->meta_value]);

        return $dataProvider;
    }

    public function saveupdate($uid,$key,$val){

        $dval = $this->find()->where(["user_id"=>$uid,"meta_key"=>$key,"meta_value"=>$val])->asArray()->all();
        if(empty($dval)){
            $dval = $this->findOne(["user_id"=>$uid,"meta_key"=>$key]);
            if(!empty($dval)){
                $dval->meta_value = $val;
                $dval->save();
                //var_dump($dval->errors);
                
            }else{
                var_dump($dval);
                $this->user_id = $uid;
                $this->meta_key = $key;
                $this->meta_value = $val;
                $this->save();
            }
        }
    }
}

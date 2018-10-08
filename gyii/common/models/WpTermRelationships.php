<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "wp_term_relationships".
 *
 * @property string $object_id
 * @property string $term_taxonomy_id
 * @property int $term_order
 */
class WpTermRelationships extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'wp_term_relationships';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['object_id', 'term_taxonomy_id'], 'required'],
            [['object_id', 'term_taxonomy_id', 'term_order'], 'integer'],
            [['object_id', 'term_taxonomy_id'], 'unique', 'targetAttribute' => ['object_id', 'term_taxonomy_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'object_id' => 'Object ID',
            'term_taxonomy_id' => 'Term Taxonomy ID',
            'term_order' => 'Term Order',
        ];
    }

    public function getTags($object_id){
        $WpTermRelationships = new WpTermRelationships();
        $allTags = $WpTermRelationships->find()->where(["object_id"=>(int)$object_id]);
        $allTags = $allTags->asArray()->all();
        $term_taxonomy_ids = [];
        foreach($allTags as $tags){
            $term_taxonomy_ids[]= $tags['term_taxonomy_id'];
        }
        return $term_taxonomy_ids;
    }
}

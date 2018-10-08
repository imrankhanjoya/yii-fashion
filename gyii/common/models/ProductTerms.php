<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "product_terms".
 *
 * @property string $object_id
 * @property string $term_taxonomy_id
 * @property int $term_order
 * @property string $name
 * @property string $slug
 */
class ProductTerms extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product_terms';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['object_id', 'term_taxonomy_id', 'name', 'slug'], 'required'],
            [['object_id', 'term_taxonomy_id', 'term_order'], 'integer'],
            [['name', 'slug'], 'string', 'max' => 200],
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
            'name' => 'Name',
            'slug' => 'Slug',
        ];
    }
}

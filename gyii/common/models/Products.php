<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "products".
 *
 * @property string $ID
 * @property string $sku
 * @property int $SalesRank
 * @property string $ListPrice
 * @property double $price
 * @property string $LowestNewPrice
 * @property string $post_date
 * @property string $post_content
 * @property string $post_title
 * @property string $post_excerpt
 * @property string $post_status
 * @property string $post_parent
 * @property string $image
 * @property string $DetailPageURL
 * @property string $Publisher
 * @property string $Manufacturer
 * @property string $Brand
 * @property string $guid
 */
class Products extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'products';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['sku', 'SalesRank', 'ListPrice', 'price', 'LowestNewPrice', 'post_content', 'post_title', 'post_excerpt', 'image', 'DetailPageURL', 'Publisher', 'Manufacturer', 'Brand'], 'required'],
            [['SalesRank', 'post_parent'], 'integer'],
            [['price'], 'number'],
            [['post_date'], 'safe'],
            [['post_content', 'post_title', 'post_excerpt', 'DetailPageURL'], 'string'],
            [['sku', 'ListPrice', 'LowestNewPrice'], 'string', 'max' => 100],
            [['post_status'], 'string', 'max' => 20],
            [['image', 'Publisher', 'Manufacturer', 'Brand'], 'string', 'max' => 200],
            [['guid'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'sku' => 'Sku',
            'SalesRank' => 'Sales Rank',
            'ListPrice' => 'List Price',
            'price' => 'Price',
            'LowestNewPrice' => 'Lowest New Price',
            'post_date' => 'Post Date',
            'post_content' => 'Post Content',
            'post_title' => 'Post Title',
            'post_excerpt' => 'Post Excerpt',
            'post_status' => 'Post Status',
            'post_parent' => 'Post Parent',
            'image' => 'Image',
            'DetailPageURL' => 'Detail Page Url',
            'Publisher' => 'Publisher',
            'Manufacturer' => 'Manufacturer',
            'Brand' => 'Brand',
            'guid' => 'Guid',
        ];
    }
}

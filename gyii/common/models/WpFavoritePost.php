<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "wp_favorite_post".
 *
 * @property int $id
 * @property int $user_id
 * @property int $post_id
 * @property string $post_type
 */
class WpFavoritePost extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'wp_favorite_post';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'post_id'], 'integer'],
            [['post_type'], 'required'],
            [['post_type'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'post_id' => 'Post ID',
            'post_type' => 'Post Type',
        ];
    }
}

<?php
namespace frontend\models;

use yii\base\Model;
use common\models\WpUsers;
use frontend\components\apiCall;
use Yii;
/**
 * Signup form
 */
class PostForm extends Model
{
    public $title;
    public $content;
    public $tags;
    public $category;
    private $_user;
    public $ID;


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['ID', 'trim'],
            ['title', 'trim'],
            ['title', 'required'],
            ['title', 'string', 'min' => 2, 'max' => 455],

            ['tags', 'trim'],
            ['tags', 'required'],
            ['tags', 'string', 'min' => 2, 'max' => 455],

            ['category', 'trim'],
            ['category', 'required'],
            ['category', 'string', 'min' => 2, 'max' => 455],

            ['content', 'trim'],
            ['content', 'required'],

        ];
    }


   
    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'title' => 'Dicussion title',
            'tags' => 'tags',
            'category' => 'Category',
            'content' => 'Your post',
        ];
    }

    

}

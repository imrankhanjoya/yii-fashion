<?php
namespace frontend\models;

use yii\base\Model;
use common\models\WpUsers;
use frontend\components\apiCall;
use Yii;
/**
 * Signup form
 */
class CommentForm extends Model
{
    public $title;
    public $content;
    public $url;
    public $type;
    public $parentID;
    private $_user;
    public $ID;


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['ID', 'trim'],
            ['parentID', 'trim'],
            
            ['title', 'trim'],
            ['title', 'required'],
            ['title', 'string', 'min' => 2, 'max' => 455],

            ['url', 'trim'],
            ['url', 'string', 'min' => 6, 'max' => 455],

            

            ['content', 'trim'],
            ['content', 'required'],

            ['type', 'trim'],
            ['type', 'required'],

        ];
    }


   
    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'title'    => 'Dicussion title',
            'type'     => 'Type',
            'url'      => 'Url',
            'category' => 'Category',
            'content'  => 'Your post',
        ];
    }

    

}

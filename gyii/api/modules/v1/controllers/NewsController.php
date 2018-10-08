<?php

namespace api\modules\v1\controllers;

use yii;

use yii\rest\Controller;
use common\models\News;
use common\models\NewsSearch;

/**
 * Country Controller API
 *
 * @author Budi Irawan <deerawan@gmail.com>
 */
class NewsController extends Controller
{

    public function behaviors()
    {
        return array_merge(parent::behaviors(), [

            // For cross-domain AJAX request
            'corsFilter'  => [
                'class' => \yii\filters\Cors::className(),
                'cors'  => [
                    // restrict access to domains:
                    'Origin'                           => ['*'],
                    'Access-Control-Request-Method'    => ['POST'],
                    'Access-Control-Allow-Credentials' => true,
                    'Access-Control-Max-Age'           => 3600,                 // Cache (seconds)

                ],
            ],

        ]);
    }
    //public  $modelClass = null;
    //public $modelClass = 'api\modules\v1\models\Courts';
    public function actionIndex(){

        $news = new News();

        $topNews = $news->find()
            ->where(['!=','title',''])
            ->andFilterWhere(['or',["category"=>"high_court"],["category"=>"supreme_court"],["category"=>"indian_penal_court"],["category"=>"code_of_criminal_procedure"]])
            ->orderBy(['id'=> SORT_DESC,])
            ->limit(10)
            ->all();
        $allNews = array();
        foreach($topNews as $news){
            $oneNews['title']= $news->getAttribute('title');
            $oneNews['image']= "https://images1-focus-opensocial.googleusercontent.com/gadgets/proxy?container=focus&resize_w=200&url=".$news->getAttribute('image');
            $oneNews['url']= $news->getAttribute('url');
            $oneNews['content']= $news->getAttribute('content');
            $allNews[] = $oneNews;

        }

        return ["status"=>true,"msg"=>"Top news","data"=>$allNews];

        Yii::app()->end();


    }
    
    public function actionCat($cat){


        $news = new News();

        $query = $news->find()
            ->where(['!=','title',''])
            ->where(['like','title',$cat])
            ->where(['like','content',$cat])
            ->andFilterWhere(['or',["category"=>"high_court"],["category"=>"supreme_court"],["category"=>"indian_penal_court"],["category"=>"code_of_criminal_procedure"]])
            ->orderBy(['id'=> SORT_DESC,])
            ->limit(10);
//        echo $query->createCommand()->getRawSql();
//        exit;
        $topNews =   $query->all();
        $allNews = array();
        foreach($topNews as $news){
            $oneNews['title']= $news->getAttribute('title');
            $oneNews['image']= "https://images1-focus-opensocial.googleusercontent.com/gadgets/proxy?container=focus&resize_w=200&url=".$news->getAttribute('image');
            $oneNews['url']= $news->getAttribute('url');
            $oneNews['content']= $news->getAttribute('content');
            $oneNews['date']= Yii::$app->formatter->asDate($news->getAttribute('created'), 'dd-MM-yyyy');
            $allNews[] = $oneNews;

        }

        return ["status"=>true,"msg"=>"Top news","data"=>$allNews];

        Yii::app()->end();


    }


    public function actionLalaNews($cat){


        $news = new NewsSearch();
        $topNews = $news->newByCat($cat);
        $allNews = array();
        foreach($topNews as $news){


            $oneNews['title']= str_replace('&#39;',"'",$news->getAttribute('title'));
            $oneNews['image']= "https://images1-focus-opensocial.googleusercontent.com/gadgets/proxy?container=focus&resize_w=200&url=".$news->getAttribute('image');
            

            $oneNews['url']= $news->getAttribute('url');
            $urlPrased = parse_url($news->getAttribute('url'));
            $oneNews['source']= $urlPrased['host'];

            $oneNews['content']= str_replace('&#39;',"'",$news->getAttribute('content'));
            $oneNews['date'] = date('d-M-Y h:i:s A',$news['created']);
            $allNews[] = $oneNews;

        }

        return ["status"=>true,"msg"=>"Top news","data"=>$allNews];

        Yii::app()->end();


    }


    public function actionHomeNewsLala(){

       $news = new NewsSearch();

       $result = $news->newsForHomePage();
       $allNews = array();
        foreach($result as $news){
            $oneNews['title']= $news['title'];
            $oneNews['image']= "https://images1-focus-opensocial.googleusercontent.com/gadgets/proxy?container=focus&resize_w=200&url=".$news['image'];
            $oneNews['url']= $news['url'];
            $urlPrased = parse_url($news->getAttribute('url'));
            $oneNews['source']= $urlPrased['host'];
            $oneNews['category']= $news['category'];
            $oneNews['content']= $news['content'];
            $oneNews['date'] = date('d-M-Y h:i:s A',$news['created']);
            $allNews[] = $oneNews;

        }

        return ["status"=>true,"msg"=>"home page latest 5 news","data"=>$allNews];

        Yii::app()->end();


    }
}



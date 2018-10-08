<?php
namespace frontend\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use frontend\models\WpTermRelationships;
use frontend\components\apiCall;

/**
 * Site controller
 */
class TopController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex($slug)
    {
        $apiCall = new apiCall();
        $data['slug'] = $slug;
        $topDetail = $apiCall->curlget('v1/top/detail',$data);
        $vData['topDetail'] =$topDetail['data'];
       
        //GET RELATED PRODUCTS
        if(isset($vData['topDetail']['tags'][0])){
            $tag = $vData['topDetail']['tags'][0]['name'];
        }else{
            $tag = "skin";
        }
        $data['page'] = 0;
        $data['limit'] = 4;
        $data['tag'] = $tag;
        $relatedList = $apiCall->curlget('v1/products/related',$data);
        $vData['topDetail']['related'] =$relatedList['data'];
        //GET RELATED PRODUCTS

        //GET TOP LIST
        $apiCall = new apiCall();
        $data['limit'] = 6;
        $data['page'] = 0;
        $topList = $apiCall->curlget('v1/top/recent',$data);
        $vData['topDetail']['topList'] =$topList['data'];
        //GET TOP LIST
        
        return $this->render('index',$vData);
    }

    public function actionList()
    {
        $apiCall = new apiCall();
        $data['page'] = 0;
        $topList = $apiCall->curlget('v1/top',$data);
        $vData['topList'] =$topList['data'];


        return $this->render('top-list',$vData);
    }

    
}

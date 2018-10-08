<?php
namespace frontend\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use frontend\components\apiCall;

/**
 * Site controller
 */
class CommunityController extends Controller
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
    public function actionIndex($page=0)
    {
        $apiCall = new apiCall();
        $data['page'] = $page;
        $data['limit'] = 10;
        $topList = $apiCall->curlget('v1/discuss',$data);
        $vData['discussList'] =$topList['data'];


        $data['page'] = 0;
        $data['limit'] = 10;
        $data['nocomment'] = true;
        $topList = $apiCall->curlget('v1/discuss/nocomment',$data);
        $vData['nocomment'] =$topList['data'];

        $data['page'] = 0;
        $data['limit'] = 10;
        $data['nocomment'] = false;
        $mostecommented = $apiCall->curlget('v1/discuss/nocomment',$data);
        $vData['mostecommented'] =$mostecommented['data'];

        $data['page'] = 0;
        $data['limit'] = 10;
        $data['nocomment'] = false;
        $topUsers = $apiCall->curlget('v1/discuss/topuser',$data);
        $vData['topUsers'] =$topUsers['data'];


        //echo count($vData['discussList']);
        return $this->render('index',$vData);
    }

    public function actionDetail($slug)
    {
        $apiCall = new apiCall();
        $data['slug'] = $slug;
        $discussDetail = $apiCall->curlget('v1/discuss/detail',$data);
        $vData['discussList'] = $discussDetail['data'];

        return $this->render('detail',$vData);
    }

    
}

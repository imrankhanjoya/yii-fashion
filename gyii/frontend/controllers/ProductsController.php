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
use frontend\components\apiCall;

/**
 * Site controller
 */
class ProductsController extends Controller
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
        $pDetail = $apiCall->curlget('v1/products/detail',$data);
        $vData['pDetail'] =$pDetail['data'];

        //print_r($vData['pDetail']);exit;

        $data['page'] = 0;
        $data['limit'] = 4;
        $data['tag'] = $vData['pDetail']['tags'][0]['name'];
        $relatedList = $apiCall->curlget('v1/products/related',$data);
        $vData['pDetail']['related'] =$relatedList['data'];

        return $this->render('index',$vData);
    }

    public function actionList()
    {
        
        $apiCall = new apiCall();
        $data['page'] = 0;
        $pList = $apiCall->curlget('v1/products',$data);
        $vData['pList'] =$pList['data'];

        return $this->render('list',$vData);
    }

    public function actionBrand($brand){
        $apiCall = new apiCall();
        $data['page'] = 0;
        $data['brand'] = $brand;
        $pList = $apiCall->curlget('v1/products/bybrand',$data);
        $vData['pList'] =$pList['data'];

        return $this->render('brand',$vData);
    }

    public function actionTag($tag){
        $apiCall = new apiCall();
        $data['page'] = 0;
        $data['tag'] = $tag;
        $pList = $apiCall->curlget('v1/products/bytag',$data);
        $vData['pList'] =$pList['data'];

        return $this->render('brand',$vData);
    }

    
}

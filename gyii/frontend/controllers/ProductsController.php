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
use frontend\models\CommentForm;
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

        


        $model = new CommentForm();
        $vData['model'] = $model;
        if ($model->load(Yii::$app->request->post())) {
            if (Yii::$app->user->isGuest) {
                return $this->goHome();
            }

            $postData = Yii::$app->request->post('CommentForm');    


            $user = Yii::$app->user->identity;
            
            $postID = $vData['pDetail']['ID'];
            $postData['comment_ID'] = 0; 
            $postData['comment_post_ID'] = $postID; 
            $postData['comment_content'] = $postData['content'] ; 
            $postData['comment_author_url'] = ''; 
            $postData['comment_author_IP'] = $_SERVER['REMOTE_ADDR']; 
            $postData['comment_author_email'] = $user->user_email; 
            $postData['comment_karma'] = 0; 
            $postData['comment_approved'] = 0; 
            $postData['comment_type'] = 'product_review'; 
            $postData['user_id'] = $user->ID;
            $postData['comment_author'] = $user->user_nicename;
            $postData['comment_agent'] = $_SERVER['HTTP_USER_AGENT'] ; 
            $postData['comment_parent'] = $postData['parentID']; 
            $postData['comment_date'] = date("Y-m-d h:m:i"); 
            $postData['comment_date_gmt'] = date("Y-m-d h:m:i");
            $postData['url'] = "thisisurl";
            $apiCall = new apiCall();
            $result = $apiCall->curlpost('v1/comment/post',$postData);
            $result = json_decode($result,true);
            
            

        }

        $apiCall = new apiCall();
        $data['pid'] = $postID = $vData['pDetail']['ID'];
        $pcomments = $apiCall->curlget('v1/comment/product-comments',$data);
        //echo $result = json_decode($result,true);
        $vData['pDetail']['pcommnets'] = $pcomments['data'];

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

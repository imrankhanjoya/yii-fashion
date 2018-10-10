<?php
namespace frontend\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
//use frontend\models\SignupForm;
use frontend\models\ProfileForm;

use frontend\models\GloatForm;
use frontend\models\ContactForm;
use frontend\components\apiCall;

/**
 * Site controller
 */
class SiteController extends Controller
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
    public function actionIndex()
    {


        
        //GET TOP ITEM DATA
        $apiCall = new apiCall();
        $data['page'] = 0;
        $data['limit'] = 2;
        $topList = $apiCall->curlget('v1/top',$data);
        $vData['topList'] =$topList['data'];
        //GET TOP ITEM DATA


        //GET RELATED PRODUCTS 
        $tag = "skin";
        $data['page'] = 0;
        $data['limit'] = 24;
        $data['tag'] = $tag;
        $relatedList = $apiCall->curlget('v1/products/related',$data);
        $vData['proTag'] =$relatedList['data'];
        $vData['proOneTitle'] = "See it Shop it";
        //GET RELATED PRODUCTS

        //GET RELATED PRODUCTS 
        $tag = "skin";
        $data['page'] = 0;
        $data['limit'] = 24;
        $data['tag'] = "nail";
        $tagList = $apiCall->curlget('v1/products/bytag',$data);
        $vData['proTagTag'] =$tagList['data'];
        $vData['proTwoTitle'] = "For #Nail";
        //GET RELATED PRODUCTS



        return $this->render('index',$vData);
    }

    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin()
    {

        
        
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new GloatForm();
        $model->setScenario("login");


        if ($model->load(Yii::$app->request->post())) {
            $val = $model->login();
            
            return $this->goBack();
        } else {
            $model->password = '';

            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending your message.');
            }

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
    {
        $model = new GloatForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                print_r($user);
            }
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {

        $res['status']=false;
        $res['msg']='';

        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $response = $model->sendEmail();
            print_r($response);
            exit;
            $res['msg']=$response['msg'];
            if ($response['status']==true) {
                $res['status']=true;
                
            } else {
                $res['status']=false;
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,'res'=>$res
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        try {
            
            $apiCall = new apiCall();
            $data['token'] = $token;
            $discussDetail = $apiCall->curlpost('v1/app-users/check-token',$data);   
            $discussDetail = json_decode($discussDetail,true);    

        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        
        $model = new ProfileForm();
        $ID = $discussDetail['data']['ID'];
        $msg = "";
        if ($model->load(Yii::$app->request->post())) {
            
            $params = Yii::$app->request->post();
            $params['ProfileForm']['ID'] = $ID*1;

            $apiCall = new apiCall();
            $userPorfile = $apiCall->curlpost('v1/app-users/update-pass',$params['ProfileForm']);
            $userPorfile = json_decode($userPorfile,true);

            if($userPorfile['status']==false){
                $msg = "Error while updating password";
            }else{
                $msg = "Your password has been updated.";
            }

        }


        
        return $this->render('resetPassword',[
                'model' => $model,
                'msg' => $msg,
            ]);
    }
}

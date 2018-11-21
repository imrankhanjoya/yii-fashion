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
use frontend\models\ProfileForm;
use frontend\models\User;
use frontend\components\apiCall;

/**
 * Site controller
 */
class ProfileController extends Controller
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
    public function actionIndex($slug=false)
    {
        
        //GET TOP ITEM DATA
        $apiCall = new apiCall();
        if($slug!=false){
            $data['ID'] = 0;
            $data['slug'] = $slug;
        }else{
            if (Yii::$app->user->isGuest) {
                return $this->goHome();
            }else{
                $data['ID'] = Yii::$app->user->getId();
            }
        }
        $userPorfile = $apiCall->curlget('v1/app-users/profile',$data);

        /**USERtopusers**/
        $apiCall = new apiCall();
        $uData['page'] = 0;
        $userList = $apiCall->curlget('v1/feed/users',$uData);
        
        if($userList['status']==true){
            $userPorfile['data']['topusers'] = $userList['data'];
        }
        /**USERtopusers**/

        /**USERFOLLOW**/
        $apiCall = new apiCall();
        $uData['userid'] = $userPorfile['data']['ID'];
        $uData['page'] = 0;
        $userList = $apiCall->curlget('v1/feed/following',$uData);
        
        if($userList['status']==true){
            $userPorfile['data']['following'] = $userList['data'];
        }
        /**USERFOLLOW**/

        /**USERPOSTS**/
        $apiCall = new apiCall();
        $uData['userid'] = $userPorfile['data']['ID'];
        $uData['page'] = 0;
        $postList = $apiCall->curlget('v1/feed/posts',$uData);
        
        if($postList['status']==true){
            $userPorfile['data']['postList'] = $postList['data'];
        }
        /**USERPOSTS**/

        /**USERCOMMENTS**/
        $apiCall = new apiCall();
        $uData['user_id'] = $userPorfile['data']['ID'];
        $uData['page'] = 0;
        $uData['limit'] = 0;
        $commentList = $apiCall->curlget('v1/comment/user-comments',$uData);
        
        if($commentList['status']==true){
            $userPorfile['data']['commentList'] = $commentList['data'];
        }
        /**USERCOMMENTS**/


        




        return $this->render('index',array("userProfile"=>$userPorfile['data']));
    }

    public function actionFilters()
    {
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        $model = new ProfileForm();
        $ID = Yii::$app->user->getId();
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


        
        return $this->render('filters',[
                'model' => $model,
                'msg' => $msg,
            ]);    
    }

    public function actionEditPass()
    {
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        $model = new ProfileForm();
        $ID = Yii::$app->user->getId();
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


        
        return $this->render('edit-pass',[
                'model' => $model,
                'msg' => $msg,
            ]);    
    }

    public function actionEdit()
    {
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        $model = new ProfileForm();
        $ID = Yii::$app->user->getId();

        if ($model->load(Yii::$app->request->post())) {
            $params = Yii::$app->request->post();
            $params['ProfileForm']['ID'] = $ID*1;

            $apiCall = new apiCall();
            $userPorfile = $apiCall->curlpost('v1/app-users/update',$params['ProfileForm']);
        }



        
        $apiCall = new apiCall();
        $data['ID'] = $ID*1;
        $userPorfile = $apiCall->curlget('v1/app-users/profile',$data);
        if($userPorfile['status']){
           
            $model->ID = $userPorfile['data']['ID'];
            $model->user_login = $userPorfile['data']['user_login'];
            $model->display_name = $userPorfile['data']['display_name'];
            $model->user_email = $userPorfile['data']['user_email'];
            if(isset($userPorfile['data']['usermeta']['cupp_upload_meta'])){
            $model->usermeta['image'] = $userPorfile['data']['usermeta']['cupp_upload_meta'];
            }else{
                $model->usermeta['image'] ='';
            }
            if(isset($userPorfile['data']['usermeta']['description'])){
            $model->usermeta['description'] = $userPorfile['data']['usermeta']['description'];
            }else{
                $model->usermeta['description'] ='';
            }
            if(isset($userPorfile['data']['usermeta']['birthday'])){
                $model->usermeta['birthday'] = $userPorfile['data']['usermeta']['birthday'];
            }else{
                $model->usermeta['birthday'] ='';
            }
        }
        

        return $this->render('edit',[
                'model' => $model,
            ]);
    }



    
}

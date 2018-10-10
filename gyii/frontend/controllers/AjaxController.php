<?php
namespace frontend\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\rest\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use frontend\components\apiCall;
use Intervention\Image\ImageManager;

/**
 * Site controller
 */
class AjaxController extends Controller
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


    public function userimg($img){
        $manager = new ImageManager(array('driver' => 'imagick'));
        
        //$img = 'upload/user/19/gloatme_pexels-photo-341970.jpeg';    

        $image = $manager->make($img);
        $image->resize(null, 400, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        });
        $image->resizeCanvas(400,400, 'center', false, 'ffffff');

        $image->save($img);
        return $img;
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionFav()
    {

        $rawJson = file_get_contents("php://input");
        $postData  = json_decode($rawJson,true); 
        
        //GET TOP ITEM DATA
        $apiCall = new apiCall();
        $data['user_id'] = 1;
        $data['post_id'] = 455;
        $data['post_type'] = 'product' ;
        return $result = $apiCall->curlpost('v1/follow/addit',$data);
        //$vData['topList'] =$topList['data'];

    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionAddmeta()
    {

        $rawJson = file_get_contents("php://input");
        $postData  = json_decode($rawJson,true); 
        if(isset($_POST)){
            $postData  = $_POST;
        }
        $user = Yii::$app->user;
        $user_id = Yii::$app->user->ID; 
            
        //GET TOP ITEM DATA
        $apiCall = new apiCall();
        $data['user_id'] = $user_id;
        $data['metakey'] = $postData['metakey'];
        $data['metavalue'] = $postData['metaval'];
        return $result = $apiCall->curlpost('v1/app-users/update-meta',$data);
        //$vData['topList'] =$topList['data'];

    }

    public function actionList()
    {
        return $this->render('top-list');
    }

    //Upload user image 
    public function actionUpload()
    {
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $return = array("status"=>false,"msg"=>"","data"=>"");

        $file = $_FILES['profilepic'];
        
        $fileType = trim($file['type']);
        if($file['size']<= 1961538 && ( $fileType == 'image/jpeg' || $fileType == 'image/jpg' || $fileType == 'image/png')){
            

            $user = Yii::$app->user;
            $user_id = Yii::$app->user->ID;  
            $siteFolder = "upload/user/".$user_id;   
            $move = "".$siteFolder;
            $ifDir = false;
            if(!file_exists($move)){
                $val = mkdir($move);
                if($val){
                    $ifDir = true;
                }
            }else{
                $ifDir = true;
            }
            if($ifDir){
                $pathfromweb = $siteFolder."/gloatme_".$file['name'];
                $movefilepath = $move."/gloatme_".$file['name'];
                $val = move_uploaded_file($file['tmp_name'], $movefilepath);
                if($val){

                    $pathfromweb = $this->userimg($pathfromweb);
                    
                    $return['status'] = true;
                    $return['msg'] = "File has been uploade";
                    $return['path'] = Yii::getAlias('@web').'/'.$pathfromweb;       

                    echo json_encode($return);
                    exit;
                }
            }
            $return['status'] = false;
            $return['msg'] = "Error while uploading file";
            $return['path'] = ""; 
            echo json_encode($return);
            exit;

        }
        $return['status'] = false;
        $return['msg'] = "Check file type and size";
        $return['path'] = ""; 
        echo json_encode($return);
        exit;
        
    }



    public function actionPostComment(){
        //GET TOP ITEM DATA
        $apiCall = new apiCall();
        $data['user_id'] = 1;
        $data['post_id'] = 455;
        $data['post_type'] = 'product' ;
        return $result = $apiCall->curlpost('v1/comment/porduct-comment',$data);
        //$vData['topList'] =$topList['data'];
    }

    
}

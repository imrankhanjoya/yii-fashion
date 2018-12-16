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
use frontend\components\TextUtility;
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
        if(isset($_POST)){
            $post_id = $_POST['post_id'];
            $post_type = $_POST['post_type'];
        }
        
        $user = Yii::$app->user;
        $user_id = Yii::$app->user->ID; 

        //GET TOP ITEM DATA
        $apiCall = new apiCall();
        $data['user_id'] = $user_id;
        $data['post_id'] = $post_id;
        $data['post_type'] = $post_type;
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

        $return = array("msg"=>"","data"=>"");

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

    //Upload disucss  image 
    public function actionMedia()
    {
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }


        $return = array("status"=>false,"msg"=>"","data"=>"");

        $file = $_FILES['file'];

        $fileType = trim($file['type']);
        if($file['size']<= 1961538 && ( $fileType == 'image/jpeg' || $fileType == 'image/jpg' || $fileType == 'image/png')){
            

            $user = Yii::$app->user;
            $user_id = Yii::$app->user->ID;  
            $siteFolder = "upload/media/".$user_id;   
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
                    $return['uploaded'] = true;
                    $return['msg'] = "File has been uploade";
                    $return['path'] = Yii::getAlias('@web').'/'.$pathfromweb;       
                    $return['location'] = Yii::getAlias('@web').'/'.$pathfromweb;       

                    return json_encode($return);
                    exit;
                }
            }
            $return['status'] = false;
            $return['msg'] = "Error while uploading file";
            $return['location'] = ""; 
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

        $user = Yii::$app->user;
        $user_id = Yii::$app->user->ID;
        //GET TOP ITEM DATA
        $apiCall = new apiCall();
        $data['user_id'] = $user_id;
        $data['post_id'] = 455;
        $data['post_type'] = 'product' ;

        return $result = $apiCall->curlpost('v1/comment/product-comment',$data);
        //$vData['topList'] =$topList['data'];
    }

    public function actionCreatePost(){

        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        $rawJson = file_get_contents("php://input");
        $postData  = json_decode($rawJson,true);
        


        $user = Yii::$app->user;
        $user_id = Yii::$app->user->ID;
        $TextUtility = new TextUtility();
        //GET TOP ITEM DATA
        $apiCall = new apiCall();
        $data['user_id'] = $user_id;
        $data['post_type'] = 'discuss';
        $data['post_title'] = $_POST['PostForm']['title'];
        $data['post_author'] = $user_id;
        $data['post_date'] = date("Y-m-d h:m:i"); 
        $data['post_date_gmt'] = date("Y-m-d h:m:i"); 
        $data['post_content'] = $_POST['PostForm']['content'];
        $data['post_excerpt'] = strip_tags($_POST['PostForm']['content']);
        $data['post_status'] = 'publish';
        $data['comment_status'] = 'open';
        $data['ping_status'] = 'closed';
        //$data['post_password'] = ;
        $data['post_name'] = $_POST['PostForm']['title'];
        $data['to_ping'] = '';
        $data['pinged'] = '';
        $data['post_modified'] = date("Y-m-d h:m:i"); 
        $data['post_modified_gmt'] = date("Y-m-d h:m:i"); 
        $data['post_content_filtered'] = 'html';
        $data['post_parent'] = 0;
        $data['guid'] = $TextUtility->gen_slug('This is for hair');
        $data['menu_order'] = 0;
        $data['post_mime_type'] = 'html';
        $data['comment_count'] = 0;

        return $result = $apiCall->curlpost('v1/discuss/create-post',$data);
        //$vData['topList'] =$topList['data'];
    }


    function actionDeleteComment($cid){
        $apiCall = new apiCall();
        $user_id = Yii::$app->user->ID;
        $data['cid'] = $cid; 
        $data['user_id'] = $user_id; 
        return $result = $apiCall->curlpost('v1/comment/comment-delete',$data);
        
    }


    
}

<?php
namespace frontend\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use frontend\components\apiCall;
use frontend\models\PostForm;
use frontend\components\TextUtility;


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




        


        return $this->render('detail',$vData);
    }


    public function actionPost($slug = null){

        $postForm = new PostForm();


        $result = array();
        $ID = Yii::$app->user->getId();
        if ($postForm->load(Yii::$app->request->post())) {
            // $apiCall = new apiCall();
            // $data['slug'] = $slug;
            // $discussDetail = $apiCall->curlget('v1/discuss/detail',$data);
            // $vData['discussList'] = $discussDetail['data'];
            // return $this->render('detail',$vData);
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
            
            if($_POST['PostForm']['ID']!='' && $_POST['PostForm']['ID']>0 ){
                $data['ID'] = $_POST['PostForm']['ID'];                
            }

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
            $data['category'] = $_POST['PostForm']['category'];
            $data['tags'] = $_POST['PostForm']['tags'];
            $result = $apiCall->curlpost('v1/discuss/create-post',$data);
            $result = json_decode($result,true);
            //print_r($result['data']['slug']);exit;
            if($result['status']==true){
                $this->redirect(["community/detail","slug"=>$result['data']['slug']]);
            }

        }

        if($slug!=null){

            $apiCall = new apiCall();
            $data['slug'] = $slug;
            $discussDetail = $apiCall->curlget('v1/discuss/detail',$data);
            $postForm->title =$discussDetail['data']['post_title'];    
            $postForm->content =$discussDetail['data']['post_content']; 
            $tags = [];
            $category = '';
            foreach($discussDetail['data']['tags'] as $key=>$val){
                if($val['taxonomy']=='post_tag')
                    $tags[] = $val['name'];
                else
                    $category = $val['name'];
            }   
            $postForm->tags = implode(",",$tags); 
            $postForm->category = $category; 
            $postForm->ID = $discussDetail['data']['ID']; 

        }

        return $this->render('post',['model'=>$postForm,'result'=>$result]);
    }

    
}

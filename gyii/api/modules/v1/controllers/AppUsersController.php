<?php

namespace api\modules\v1\controllers;

use common\models\WpUsers;
use common\models\WpUsermeta;
use common\models\WpFavoritePost;
use common\models\WpUsermetaQuery;
use yii\rest\Controller;
use Yii;

/**
 * Country Controller API
 *
 * @author Budi Irawan <deerawan@gmail.com>
 */
class AppUsersController extends Controller
{


    /**
     * @return array
     * http://localhost/m/yii2/api/web/index.php?r=v1/app-users/create
     */
    public function actionCreate(){

        $rawJson = file_get_contents("php://input");
        $postData  = json_decode($rawJson,true);
        
        $wpuser = new WpUsers();
        $wpuser = $wpuser->find();
        $wpuser = $wpuser->where(["user_email"=>$postData['user_email']])->asArray()->all();
        if(!empty($wpuser)){
            return ["status"=>false,"msg"=>"Email allready taken","data"=>[]];    
            Yii::app()->end();
        }

        $wpuser = new WpUsers();
        $wpuser = $wpuser->find();
        $wpuser = $wpuser->where(["user_login"=>$postData['user_login']])->asArray()->all();
        if(!empty($wpuser)){
            return ["status"=>false,"msg"=>"Username allready taken","data"=>[]];    
            Yii::app()->end();
        }

        if(isset($postData['fbid'])){
            $WpUsermeta = new WpUsermeta();
            $WpUsermeta = $WpUsermeta->find();
            $WpUsermeta = $WpUsermeta->where(["meta_value"=>$postData['fbid']])->asArray()->all();
            if(!empty($WpUsermeta)){
                return ["status"=>false,"msg"=>"Facebook account allready taken","data"=>[]];    
                Yii::app()->end();
            }
        }
        

        $wpUser = new WpUsers();
        $wpUser->user_login = $postData['user_login'];
        $wpUser->user_email = $postData['user_email'];
        $wpUser->user_registered = date("Y-m-d h:m:i");
        $wpUser->user_pass = md5($postData['password']);
        if($wpUser->save(true)){
            if(isset($postData['fbid'])){
                $userMeta = new WpUsermeta();
                $userMeta->user_id = $wpUser->ID;
                $userMeta->meta_key = "fbid";
                $userMeta->meta_value = $postData['fbid'];
                $userMeta->save();
            }
            if(isset($postData['fbtoken'])){
                $userMeta = new WpUsermeta();
                $userMeta->user_id = $wpUser->ID;
                $userMeta->meta_key = "fbtoken";
                $userMeta->meta_value = $postData['fbtoken'];
                $userMeta->save();
            }

        }
        return ["status"=>false,"msg"=>"Error while processing","data"=>$postData,"errors"=>""];  
        exit;


    }

    /**
     * @return array
     * http://localhost/m/yii2/api/web/index.php?r=v1/app-users/update-pass
     */
    public function actionUpdatePass(){
        $rawJson = file_get_contents("php://input");
        $postData  = json_decode($rawJson,true);
        if(strlen($postData['password'])>5 && $postData['confirm_password']==$postData['password']){

            $wpUser = new WpUsers();
            $wpUser = $wpUser->findOne($postData['ID']);
            $wpUser->user_pass = md5($postData['password']);
            $wpUser->save();


            return ["status"=>true,"msg"=>"Password has been updated"];    
            Yii::app()->end();
        }else{
            return ["status"=>false,"msg"=>"Error while updating password","data"=>$postData];    
            Yii::app()->end();    
        }
        
    }
    /**
     * @return array
     * http://localhost/m/yii2/api/web/index.php?r=v1/app-users/update
     */
    public function actionUpdate(){

        $rawJson = file_get_contents("php://input");
        $postData  = json_decode($rawJson,true);
        

        
        $wpuser = new WpUsers();
        $wpuser = $wpuser->find();
        $wpuser = $wpuser->where(["user_email"=>$postData['user_email']])->asArray()->all();

        if(!empty($wpuser) && $postData['ID']!=$wpuser[0]['ID']){
            return ["status"=>false,"msg"=>"Email allready taken","data"=>[]];    
            Yii::app()->end();
        }

        $wpuser = new WpUsers();
        $wpuser = $wpuser->find();
        $wpuser = $wpuser->where(["user_login"=>$postData['user_login']])->asArray()->all();
        if(!empty($wpuser) && $postData['ID']!=$wpuser[0]['ID']){
            return ["status"=>false,"msg"=>"Username allready taken","data"=>[]];    
            Yii::app()->end();
        }



        
        
        $wpUser = new WpUsers();
        $wpUser = $wpUser->findOne($postData['ID']);
        
        $wpUser->user_login = $postData['user_login'];
        $wpUser->display_name = $postData['display_name'];
        $wpUser->user_email = $postData['user_email'];
        $wpUser->user_registered = date("Y-m-d h:m:i");
        if ($wpUser->save()) {
            if(isset($postData['usermeta']['"image"'])){
                $userMeta = new WpUsermetaQuery();
                $metaval =$postData['usermeta']['"image"'];
                $userMeta->saveupdate($postData['ID'],"cupp_upload_meta",$metaval);
            }
            if(isset($postData['birthday'])){
                $userMeta = new WpUsermetaQuery();
                $metaval =$postData['birthday'];
                $userMeta->saveupdate($postData['ID'],"birthday",$metaval);
            }
            if(isset($postData['description'])){
                $userMeta = new WpUsermetaQuery();
                $metaval =$postData['description'];
                $userMeta->saveupdate($postData['ID'],"description",$metaval);
            }
        
        
            return ["status"=>true,"msg"=>"User updated","data"=>$postData,"errors"=>""]; 
        }
        return ["status"=>false,"msg"=>"Error while processing","data"=>$postData,"errors"=>$wpUser->geterrors()];  
        exit;


    }


    /**
     * @return array
     * http://localhost/m/yii2/api/web/index.php?r=v1/app-users/update
     */
    public function actionUpdateMeta(){

        $rawJson = file_get_contents("php://input");
        $postData  = json_decode($rawJson,true);
        
        
        $wpUser = new WpUsers();
        $wpUser = $wpUser->findOne($postData['user_id']);
        
        
        if (!empty($wpUser)) {
            if($postData['metakey']=='skin_type' || $postData['metakey']=='skin_color' || $postData['metakey']=='eye_color' || $postData['metakey']=='eye_color' || $postData['metakey']=='dress_size' || $postData['metakey']=='top_size'){
                $userMeta = new WpUsermetaQuery();
                $metaval  =  $postData['metavalue'];
                $userMeta->saveupdate($postData['user_id'],$postData['metakey'],$metaval);
            }
            return ["status"=>true,"msg"=>"User updated","data"=>$postData,"errors"=>""]; 
        }
        return ["status"=>false,"msg"=>"Error while processing","data"=>$postData,"errors"=>$wpUser->geterrors()];  
        exit;

    }



    public function actionLogin(){
        $rawJson = file_get_contents("php://input");
        $postData  = json_decode($rawJson,true);    
        $wpuser = new WpUsers();

        $userModel = $wpuser->find();
        $userModel = $userModel->where([
            'user_login'=>$postData['user_login'],
            'user_pass'=>md5($postData['password']),
            "user_status"=>1]);
        $userData = $userModel->asArray()->all();
        
        return ["status"=>false,"msg"=>"Error while processing","data"=>$userData,"errors"=>""];  
        Yii::app()->end();
    }
    
    //http://dis.deideo.com/gyii/api/web/index.php?r=v1/app-users/profile&ID=1
    public function actionProfile($ID,$slug= false){
            
        $wpuser = new WpUsers();
        $userModel = $wpuser->find();
        if($slug==false){
            $userModel = $userModel->where(['ID'=>$ID]);
        }else{
            $userModel = $userModel->where(['user_login'=>$slug]);
        }

        //echo $userModel->createCommand()->getRawSql();exit;
        $userData = $userModel->asArray()->one();

        $metaInfo = [];
        if(!empty($userData)){
            $wpUserMeta = new wpUserMeta();
            $wpUserMeta = $wpUserMeta->find();
            $wpUserMeta = $wpUserMeta->where(['user_id'=>$userData['ID']]);
            $wpUserMeta = $wpUserMeta->asArray()->all();
            foreach ($wpUserMeta as $key => $value) {
                $metaInfo[$value['meta_key']] = $value['meta_value'];
            }
            $userData['usermeta'] = $metaInfo;

            $WpFavoritePost = new WpFavoritePost();

            $userData['following'] = $WpFavoritePost->find()->where(["user_id"=>$userData['ID'],"post_type"=>""]);

        }
        
        return ["status"=>true,"msg"=>"User porfiel","data"=>$userData,"errors"=>""];  
        Yii::app()->end();


    }

    public function actionIfuser(){
        $model = new Appusers();
        $param['deviceId'] = isset($_REQUEST['deviceId'])?$_REQUEST['deviceId']:"deviceId";
        $param['package'] = isset($_REQUEST['package'])?$_REQUEST['package']:"package";
        $val = $model->find()->where($param)->asArray()->all();

        if ($val ) {
            $timeDiff = time() - $val[0]['created'];
            $days = (($timeDiff/60)/60)/24;
            $days = ceil($days);
            $userinfo = (array)$val[0];
            $userinfo['days'] = (string)$days;
            return ["status"=>true,"msg"=>"Use exists","data"=>$userinfo];
        }else{
            $userinfo = array("id"=>null,"name"=>"","email"=>"","phone"=>"","location"=>"","package"=>"","v"=>"","created"=>0,"deviceId"=>"","profession"=>"","days"=>"");
            return ["status"=>false,"msg"=>"User not found","data"=>$userinfo];
        }

        Yii::app()->end();

    }

    public function actionResetpass(){
        $rawJson = file_get_contents("php://input");
        $postData  = json_decode($rawJson,true);

        //$postData['email'] = 'imran.khan.joya@gmail.com';
        $wpuser = new WpUsers();
        $userModel = $wpuser->find();
        $userData = $userModel->where(['user_email'=>$postData['user_email']])->one();

        if(!empty($userData)){
            $userData->user_activation_key = "thisisforreset".time();
            if($userData->save(true)){
                $user = $userData;
                Yii::$app->mailer->compose(['html' => 'passwordResetToken-html', 'text' => 'passwordResetToken-text'],['user'=>$user])->setFrom([Yii::$app->params['supportEmail'] => Yii::$app->name . 'robot'])->setTo($postData['user_email'])->setSubject('Password reset for '.Yii::$app->name)->send();

                return ["status"=>true,"msg"=>"User password reset email has been sent.","data"=>[]];
            }else{
                return ["status"=>false,"msg"=>"Error while processing data","data"=>[]];
            }
        }else{
            return ["status"=>false,"msg"=>"User not found","data"=>[]];
        }
        Yii::app()->end();
        
    } 

    public function actionCheckToken(){
        $rawJson = file_get_contents("php://input");
        $postData  = json_decode($rawJson,true);
        $wpuser = new WpUsers();
        $userModel = $wpuser->find();
        $userData = $userModel->where(['user_activation_key'=>$postData['token']])->one();

        if(!empty($userData)){
            return ["status"=>true,"msg"=>"Error while processing data","data"=>$userData];
        }else{
            return ["status"=>false,"msg"=>"User not found","data"=>[]];
        }
        Yii::app()->end();
    }


}



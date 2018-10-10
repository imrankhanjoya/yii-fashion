<?php
namespace frontend\models;

use Yii;
use yii\base\Model;
use common\models\User;
use frontend\components\apiCall;


/**
 * Password reset request form
 */
class PasswordResetRequestForm extends Model
{
    public $email;


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
        ];
    }

    /**
     * Sends an email with a link, for resetting the password.
     *
     * @return bool whether the email was send
     */
    public function sendEmail()
    {
        

        $apiCall = new apiCall();
        $data['user_email'] = $this->email;
        $discussDetail = $apiCall->curlpost('v1/app-users/resetpass',$data);
        return json_decode($discussDetail,true);
        
    }
}

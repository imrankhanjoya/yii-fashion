<?PHP
namespace frontend\models;

//app\models\gii\Users is the model generated using Gii from users table

//use app\models\gii\Users as DbUser;
use common\models\WpUsers as DbUser;

class User extends \yii\base\Object implements \yii\web\IdentityInterface {

public $ID;
public $user_login;
public $user_url;
public $user_nicename;
public $rememberMe;
public $display_name;
public $user_pass;
public $authKey;
public $accessToken;
public $user_email;
public $phone_number;
public $user_type;
public $user_activation_key;
public $user_registered;
public $user_status;


/**
 * @inheritdoc
 */
public static function findIdentity($id) {
    $dbUser = DbUser::find()
            ->where([
                "ID" => $id
            ])
            ->one();
    if (!count($dbUser)) {
        return null;
    }
    return new static($dbUser);
}

/**
 * @inheritdoc
 */
public static function findIdentityByAccessToken($token, $userType = null) {

    $dbUser = DbUser::find()
            ->where(["accessToken" => $token])
            ->one();
    if (!count($dbUser)) {
        return null;
    }
    return new static($dbUser);
}

/**
 * Finds user by username
 *
 * @param  string      $username
 * @return static|null
 */
public static function findByUsername($username) {
    $dbUser = DbUser::find()->where(["user_login" => $username])->one();
    if (!count($dbUser)) {
        return null;
    }
    
    return new static($dbUser);
}

/**
 * @inheritdoc
 */
public function getId() {
    return $this->ID;
}
/**
 * @inheritdoc
 */
public function getUsername() {
    return $this->user_login;
}

/**
 * @inheritdoc
 */
public function getAuthKey() {
    return $this->authKey;
}

/**
 * @inheritdoc
 */
public function validateAuthKey($authKey) {
    return $this->authKey === $authKey;
}

/**
 * Validates password
 *
 * @param  string  $password password to validate
 * @return boolean if password provided is valid for current user
 */
public function validatePassword($password) {
    return $this->password === $password;
}

}

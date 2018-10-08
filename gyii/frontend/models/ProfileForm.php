<?php
namespace frontend\models;

use yii\base\Model;
use common\models\WpUsers;
use frontend\components\apiCall;
use Yii;
/**
 * Signup form
 */
class ProfileForm extends Model
{
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
	public $password;
    public $usermeta;
    public $description;
    public $birthday;
    public $confirm_password;
    public $skintype;
    public $skincolor;
    public $eyecolor;
    public $dresssize;
	public $topsize;

    const SCENARIO_LOGIN = 'login';
    const SCENARIO_RESET = 'login';
    private $_user;


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['user_login', 'trim'],
            ['user_login', 'required'],
            ['user_login', 'unique', 'targetClass' => '\common\models\WpUsers', 'message' => 'This username has already been taken.'],
            ['user_login', 'string', 'min' => 2, 'max' => 255],

            ['user_url', 'trim'],
            ['user_url', 'required'],
            ['user_url', 'string', 'min' => 2, 'max' => 255],



            ['user_email', 'trim'],
            ['user_email', 'required'],
            ['user_email', 'email'],
            ['user_email', 'string', 'max' => 255],
            ['user_email', 'unique', 'targetClass' => '\common\models\WpUsers', 'message' => 'This email has already been taken.'],

            ['password', 'required'],
            ['password', 'string', 'min' => 6],

            ['confirm_password', 'required'],
            ['confirm_password', 'string', 'min' => 6],
            ['confirm_password', 'compare', 'compareAttribute'=>'password', 'message'=>"Passwords don't match"],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'user_email' => 'Email',
            'user_login' => 'Username',
            'description' => 'Style Statement',
        ];
    }

    public function scenarios()
    {
        $scenarios = parent::scenarios();
        $scenarios[self::SCENARIO_LOGIN] = ['password','user_login'];
        return $scenarios;
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
        
        if (!$this->validate()) {
            
            return null;
        }

        $apiCall = new apiCall();
        $data['user_login'] = $this->user_login;
        $data['user_email'] = $this->user_email;
        $data['password'] = $this->password;
        $discussDetail = $apiCall->curlpost('v1/app-users/create',$data);
        
        return $discussDetail;
        
    }
    
    public function login()
    {

        
        $this->setScenario("login");
    	

        $apiCall = new apiCall();
        $data['user_login'] = $this->user_login;
        $data['user_email'] = $this->user_email;
        $data['password'] = $this->password;
        $discussDetail = $apiCall->curlpost('v1/app-users/login',$data);
        
        return Yii::$app->user->login($this->getUser(),0);
        
    }
    /**
     * Finds user by [[username]]
     *
     * @return User|null
     */
    protected function getUser()
    {
        if ($this->_user === null) {
            $this->_user = User::findByUsername($this->user_login);
        }

        return $this->_user;
    }

}

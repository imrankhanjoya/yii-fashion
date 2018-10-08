<?PHP
namespace app\components;

use Yii;
use yii\base\Component;
use yii\base\InvalidConfigException;

class GoogleLogin extends Component
{
    public $GoogleClient;
    public $objOAuthService;

    public function  __construct(){

        $this->GoogleClient = Yii::$app->Google_Client;
        $this->GoogleClient->setClientId(Yii::$app->params['GClientID']);
        $this->GoogleClient->setClientSecret(Yii::$app->params['GClientSecret']);
        $this->GoogleClient->setRedirectUri(Yii::$app->params['GRedirectURI']);
        $this->GoogleClient->setScopes(\Google_Service_Plus::USERINFO_EMAIL);
        $this->GoogleClient->setAccessType('offline');
        $this->objOAuthService = Yii::$app->Google_Service_Oauth2;
        $this-> objOAuthService->__construct($this->GoogleClient);

        parent::init();
    }



    public function createAuthUrl()
    {
         return $this->GoogleClient->createAuthUrl();
    }

    public function fetchAccessTokenWithAuthCode($token){

        return $access_token = $this->GoogleClient->fetchAccessTokenWithAuthCode($token);
    }

    public function getProfile($access_token){

        //$access_token = \json_decode($access_token,true);
        $this->GoogleClient->setAccessToken($access_token);
        $profile = $this->objOAuthService->userinfo->get();
        return $profile;


    }





}
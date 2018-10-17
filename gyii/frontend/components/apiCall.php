<?PHP
namespace frontend\components;

use Yii;
use yii\base\Component;
use yii\base\InvalidConfigException;

class apiCall extends Component
{

    public $apiurl = 'http://dis.deideo.com/gyii/api/web/index.php?r=';
    public $apikey = 'D433KeY';
    public $country_code = "in";
    public $lang_code = "en";
    public $_format = 'json';


    /**
     * curlget
     *
     * @param string $method method
     * @param null   $data   data
     *
     * @return mixed
     */
    public function curlget($method, $data = null)
    {
        //$this->apiurl = Yii::$app->params['apiUrl'];
        $flushcache = false;
        if (isset($_REQUEST['flushcache'])) {
            $flushcache = $_REQUEST['flushcache'];
        }

        $isGuest = yii::$app->user->isGuest;

        if (!$isGuest) {
            $token = $data['token'] = "bac";
        }else{
            $token = '123';
        }


        $data['apikey'] = $this->apikey;
        $data['country_code'] = $this->country_code;
        $data['lang_code'] = $this->lang_code;
        $data['_format'] = 'json';

        $action = trim($method);
        $apiurl = $this->apiurl . $action . "&" . http_build_query($data);

        $cache_key = "";//$this->generateKey($apiurl);

        $set_api_data = '';//Cache::read($cache_key);
        if (empty($set_api_data) || $flushcache=='true') {
            $headers[] = "Accept: */*";
            $headers[] = "Connection: Keep-Alive";
            $headers[] = "Cookie: " .$token;
            $cSession = curl_init();
            curl_setopt($cSession, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($cSession, CURLOPT_COOKIESESSION, true);
            curl_setopt($cSession, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($cSession, CURLOPT_URL, $apiurl);
            $result = curl_exec($cSession);
            $apiData = json_decode($result);
            curl_close($cSession);

            //if data is not empty then write in cache
            $isValid = $this->validateData($result, $apiurl);
            if ($isValid) {
                Cache::write($cache_key, $result);
            }
        } else {
            $result = $set_api_data;
        }
        if(isset($_GET["d"]) && $_GET["d"]="show"){
            echo $apiurl;
            echo "<pre>";
            print_r($result);
            echo "</pre>";
        }

        return json_decode($result,true);
    }

    public function curlgetURL($method)
    {
        $apiurl = trim($method);
            $cSession = curl_init();
            curl_setopt($cSession, CURLOPT_COOKIESESSION, true);
            curl_setopt($cSession, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($cSession, CURLOPT_URL, $apiurl);
            $result = curl_exec($cSession);
            curl_close($cSession);
        return json_decode($result,true);
    }

    /**
     * generateKey
     *
     * @param string $apiurl apiurl
     *
     * @return string
     */
    public function generateKey($apiurl)
    {

        $controller = $this->controller->request->params['controller'];
        $action = $this->controller->request->params['action'];
        $method = $controller."_".$action;
        return $cache_key = $_SERVER['HTTP_HOST'] . '_' .md5(serialize($apiurl));


    }

    /**
     * validateData
     *
     * @param string $result action
     * @param string $apiurl apiurl
     *
     * @return string
     */
    public function validateData($result, $apiurl)
    {
        $isValid = false;
        $apiData = json_decode($result);
        $subject =  '';
        if (isset($apiData->name)) {
            $subject = $apiData->name;
        } elseif (isset($apiData->result->data) && $apiData->result->data!="") {
            $isValid = true;
        } else {
            $subject = 'No data found';
        }
        if (!$isValid) {
            $apiurl .= " \n\t".json_encode($_SERVER);

        }
        return $isValid;
    }


    /**
     * curlpost
     *
     * @param string $method method
     * @param string $data   data
     *
     * @return string
     */
    public function curlpost($method, $data)
    {
        //$this->apiurl = Yii::$app->params['apiUrl'];
        $data['apikey'] = $this->apikey;
        $data['country_code'] = $this->country_code;
        $data['lang_code'] = $this->lang_code;
        $data['_format'] = 'json';

        $isGuest = yii::$app->user->isGuest;

        if (!$isGuest) {
            $token = "advanced-backend=".Yii::$app->session['user']['session_token'];
        }else{
            $token = "";
        }

        $action = trim($method);

        $apiurl = $this->apiurl . $action;
        $data = json_encode($data);

        if(isset($_GET['d']) && $_GET['d']=='show' ){
            echo $apiurl;
            print_r($data);
        }


        $headers[] = "Accept: */*";
        $headers[] = "Connection: Keep-Alive";
        $headers[] = "Content-type: application/json";
        $headers[] = "charset: UTF-8";
        $headers[] = "Cookie: " . $token;
        $cSession = curl_init();
        curl_setopt($cSession, CURLOPT_HTTPHEADER,$headers);
        curl_setopt($cSession, CURLOPT_COOKIESESSION, true);
        curl_setopt($cSession, CURLOPT_HEADER, false);
        curl_setopt($cSession, CURLOPT_URL,$apiurl);
        curl_setopt($cSession, CURLOPT_POST,true);
        curl_setopt($cSession, CURLOPT_POSTFIELDS,$data);
        ob_start();
        curl_exec($cSession);
        $result = ob_get_contents();
        ob_end_clean();
        curl_close($cSession);
        
	    return $result;

    }

    /**
     * extractToken
     *
     * @param string $result result
     *
     * @return string
     */
    public function extractToken($result)
    {
        $fields = explode("\r\n", preg_replace('/\x0D\x0A[\x09\x20]+/', ' ', $result));
        $repsonse = json_decode(end($fields));
        $token = '';
        $headers = $this->http_parse_headers($result);

        if (!empty($headers) && isset($headers['Set-Cookie']) && !empty($headers['Set-Cookie']) && is_array($headers['Set-Cookie'])) {
            foreach ($headers['Set-Cookie'] as $key => $val) {
                preg_match('/([^:]+);/m', $val, $match);
                $token = $match[1];
            }
        } elseif (isset($headers['Set-Cookie']) && !empty($headers['Set-Cookie'])) {
            $val = $headers['Set-Cookie'];
            preg_match('/([^:]+);/m', $val, $match);
            $token = $match[1];
        }
        //$this->Session->write('AUTH_TOKEN', $token);
        return json_encode($repsonse);
    }

    /**
     * getToken
     *
     * @return void
     */
    public function getToken()
    {
        if ($this->Session->check('AUTH_TOKEN')) {
            return $this->Session->read('AUTH_TOKEN');
        } else {
            return;
        }
    }

    //@codingStandardsIgnoreStart
    /**
     * http_parse_headers
     *
     * @param string $header header
     *
     * @return array
     */
    public function http_parse_headers($header)
    {
        $retVal = array();
        $fields = explode("\r\n", preg_replace('/\x0D\x0A[\x09\x20]+/', ' ', $header));
        $json_reponse = end($fields);
        foreach ($fields as $field) {
            if (preg_match('/([^:]+): (.+)/m', $field, $match)) {
                $match[1] = preg_replace('/(?<=^|[\x09\x20\x2D])./e', 'strtoupper("\0")', strtolower(trim($match[1])));
                if (isset($retVal[$match[1]])) {
                    if (!is_array($retVal[$match[1]])) {
                        $retVal[$match[1]] = array($retVal[$match[1]]);
                    }
                    $retVal[$match[1]][] = $match[2];
                } else {
                    $retVal[$match[1]] = trim($match[2]);
                }
            }
        }
        return $retVal;
    }

    /**
     * Get Data Using Curl
     *
     * @param string $url        Url
     * @param bool   $postfields Postfields
     * @param bool   $header     Header
     *
     * @return mixed
     * @throws XMLException
     */
    public static function getData($url, $postfields = false, $header = false)
    {
        $cache_key = '';

        $flushcache = false;
        if(isset($_REQUEST['flushcache'])){
            $flushcache = $_REQUEST['flushcache'];
        }

        if(!strstr($url,'getviewcountbypostname')){
            $cache_key = $_SERVER['HTTP_HOST'] . '_news_' . md5(serialize($url));
        }
        Cache::set(array('duration' => '+30 minutes'));
        $data = Cache::read($cache_key);
        if (empty($data) || $flushcache=='true') {
            $ch = curl_init();
            $timeout = 1800;
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
            curl_setopt($ch, CURLOPT_TIMEOUT, 1000);
            if ($postfields) {
                curl_setopt($ch, CURLOPT_POSTFIELDS, $postfields);
            }
            if ($header) {
                curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
            }
            $data = curl_exec($ch);
            $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            curl_close($ch);
            if (in_array($httpCode, array(200, 201, 202, 203, 204, 205, 206))) {
                Cache::set(array('duration' => '+1 hours'));
                Cache::write($cache_key, $data);
            } else {
                throw new \Exception("Request To {$url} Failed Http Response Code is {$httpCode} and response is {$data}");
            }
        }
        return $data;
    }


}

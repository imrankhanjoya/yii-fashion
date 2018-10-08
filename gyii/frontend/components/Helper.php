<?php

namespace app\components;

use Yii;

class Helper {

    //put your code here
    public static function printR($data, $die = false) {
        echo '<pre>';
        print_r($data);
        echo '</pre>';
        ($die) ? die('-->in helper') : "";
    }

    public static function getDays() {
        return array('monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday');
    }

    public static function getStaticRuleValue($staticRule, $key, $storedval) {
        $revArr = array_flip($staticRule[$key]);
        return isset($revArr[$storedval]) ? $revArr[$storedval] : "";
    }

    public static function getResponseErrors($response, $delimeter = '<p>') {
        $delimeterArr = ['<p>' => '<p>'];
        $errMsg = [];
        $message = json_decode($response['message'], TRUE);
        $errorArr = isset($message['error']) ? json_decode($message['error'], TRUE) : $message;
        foreach ($errorArr as $singleErr) {
            if (is_array($singleErr)) {
                foreach ($singleErr as $err) {
//                    $errMsg.=$delimeter.$err.$delimeterArr[$delimeter];
                    $errMsg[] = $err;
                }
            } else {
//                $errMsg.=$delimeter.$err.$delimeterArr[$delimeter];
                $errMsg[] = $err;
            }
        }
        return $errMsg;
    }

    public static function getNdcDueData($dueData, $ndc_form_id, $form_id, $key = 'value') {
        return (isset($dueData[$ndc_form_id][$form_id])) ? $dueData[$ndc_form_id][$form_id][$key] : null;
    }

}

<?php

namespace app\components;

use yii\base\Component;
use Yii;
use yii\base\Exception;
use yii\helpers\Json;

class DateUtility extends Component {

    public static function addDayswithdate($date, $days = 1) {
        $date = strtotime("+" . $days . " days", strtotime($date));
        return date("Y-m-d", $date);
    }

    /*
     * Array
      (
      [0] => 2017-04-25
      [1] => 2017-04-26
      [2] => 2017-04-27
     */

    public static function dateRangeArr($startDate, $endDate) {
        $diff1 = new \DateTime($startDate);
        $diff2 = new \DateTime($endDate);
        $interval = $diff1->diff($diff2);

        $date1 = $startDate;
        $date2 = $endDate;

        if (intval($interval->format('%R%a')) == 0) {//for same date
            $dateArr = array($date1);
            return $dateArr;
        }

        if (intval($interval->format('%R%a')) < 0) {//if date are given in reverse order(2017-04-28,2017-04-26)
            $date1 = $endDate;
            $date2 = $startDate;
        }
        $dateArr = array($date1);
        $nextDate = $date1;
        $endDate = new \DateTime($date2);
        while (1) {
            $nextDate = self::addDayswithdate($nextDate);
            $newDate1 = new \DateTime($nextDate);
            $interval = $newDate1->diff($endDate);
            $dateArr[] = $nextDate;
            if ($interval->days == 0) {
                break;
            }
        }
        return $dateArr;
    }

    /*
     * [2017-04-25]=>'Tuesday'
     * Sun Sat
     */

    public static function getDateDayName($startDate, $endDate) {
        $dateArr = self::dateRangeArr($startDate, $endDate);
        $response = array();
        foreach ($dateArr as $singleDate) {
            $nameOfDay = date('l', strtotime($singleDate));
            $response[$singleDate] = strtolower($nameOfDay);
        }
        return $response;
    }

    //hrms_leave_policyinDateRange
    //begin_date---> Leave policy begining date
    //end_date --> Leave policy end date
    public static function inDateRange($begin_date, $end_date, $leaveDateRangeArr) {
        $begin_date = new \DateTime($begin_date);
        $begin_date = $begin_date->getTimestamp();
        $end_date = new \DateTime($end_date);
        $end_date = $end_date->getTimestamp();
        $response = TRUE;
        foreach ($leaveDateRangeArr as $singleLeaveDate) {
            $singleLeaveDate = new \DateTime($singleLeaveDate);
            $singleLeaveDate = $singleLeaveDate->getTimestamp();
            if (!($singleLeaveDate >= $begin_date) || !($singleLeaveDate <= $end_date)) {
                $response = FALSE;
                break;
            }
        }
        return $response;
    }

    /*
     * check date is given no. of days like 5 in back and forth 
     * return true or false
     */

    public static function checkInRange($dateTocheck, $start_date, $days, $action = '+') {
        if ($action == '-') {//for back date end date will be today
            $endTs = strtotime($start_date);
            $startTs = strtotime("$action" . $days . " days", $endTs);
        } else {
            $startTs = strtotime($start_date);
            $endTs = strtotime("$action" . $days . " days", $startTs);
        }
        $userTs = strtotime($dateTocheck);
        return (($userTs >= $startTs) && ($userTs <= $endTs));
    }

    /*
     * Check date lies between to given date
     * return true or false
     */

    public static function checkDateBet($dateTocheck, $start_date, $end_date) {
        $startTs = strtotime($start_date);
        $endTs = strtotime($end_date);
        $userTs = strtotime($dateTocheck);
        return (($userTs >= $startTs) && ($userTs <= $endTs));
    }

    /*
     * first date is greate than second
     * eg:2017-04-27 is greater date than 2017-04-28
     */

    public static function isGreaterDate($firstDate, $secondDate) {
        $startTs = strtotime($firstDate);
        $endTs = strtotime($secondDate);
        return (($startTs < $endTs));
    }
//2017-05-26 is lesser 2017-05-16
    public static function isLessEqualDate($firstDate , $secondDate) {
        $startTs = strtotime($firstDate);
        $endTs = strtotime($secondDate);
        return (($startTs >= $endTs));
    }

    public static function dateFormate($date){
        
        $time = strtotime($date);
        return date(" j M D, Y h:i A",$time);

    }

}

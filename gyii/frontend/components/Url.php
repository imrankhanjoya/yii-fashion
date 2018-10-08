<?php

namespace app\components;

use Yii;

class Url extends \yii\helpers\Url {

    public static function processUrl($staticUrl, $url) {
        if (is_array($url)) {
            array_unshift($url, $staticUrl); //add static url on first place
            $staticUrl = $url;
        } else {
            $staticUrl = ($url != '') ? array($staticUrl, $url) : array($staticUrl);
        }
        return $staticUrl;
    }

    public static function callTo($methodName, $param = '', $scheme = false) {
        if (method_exists(get_class(), $methodName))
            return self::$methodName($param, $scheme);
        return '';
    }

    public static function home($url = '', $scheme = false) {
        $url = self::processUrl('/admin/employee/profile/', $url);
        return parent::to($url, $scheme);
    }

    public static function profile($url = '', $scheme = false) {
        $url = self::processUrl('/admin/company/profile/', $url);
        return parent::to($url, $scheme);
    }

    public static function location($url = '', $scheme = false) {
        $url = self::processUrl('/admin/company/profile/location', $url);
        return parent::to($url, $scheme);
    }

    public static function editLocation($url = '', $scheme = false) {
        $url = self::processUrl('/admin/company/profile/edit-location', $url);
        return parent::to($url, $scheme);
    }

    public static function financeHierarchyLevel($url = '', $scheme = false) {
        $url = self::processUrl('/admin/company/finance-hierarchy/finance-hierarchy-level', $url);
        return parent::to($url, $scheme);
    }

    public static function hrHierarchyLevel($url = '', $scheme = false) {
        $url = self::processUrl('/admin/company/hr-hierarchy/hr-hierarchy-level', $url);
        return parent::to($url, $scheme);
    }

    public static function designation($url = '', $scheme = false) {
        $url = self::processUrl('/admin/company/designation/index', $url);
        return parent::to($url, $scheme);
    }

    public static function leavePolicyDashboard($url = '', $scheme = false) {
        $url = self::processUrl('/admin/leave-policy/leave-policy-dashboard', $url);
        return parent::to($url, $scheme);
    }

    public static function companyConfig($url = '', $scheme = false) {
        $url = self::processUrl('/admin/company/profile/company-config', $url);
        return parent::to($url, $scheme);
    }

    public static function employmentType($url = '', $scheme = false) {
        $url = self::processUrl('/admin/employment-type', $url);
        return parent::to($url, $scheme);
    }

    public static function editEmploymentType($url = '', $scheme = false) {
        $url = self::processUrl('/admin/employment-type/edit-employment-type', $url);
        return parent::to($url, $scheme);
    }

    public static function shiftRoaster($url = '', $scheme = false) {
        $url = self::processUrl('/admin/shift-roaster', $url);
        return parent::to($url, $scheme);
    }

    public static function editShiftRoaster($url = '', $scheme = false) {
        $url = self::processUrl('/admin/shift-roaster/edit-shift-roaster', $url);
        return parent::to($url, $scheme);
    }

    public static function attendance($url = '', $scheme = false) {
        $url = self::processUrl('/admin/attendance', $url);
        return parent::to($url, $scheme);
    }

    public static function editAttendanceSource($url = '', $scheme = false) {
        $url = self::processUrl('/admin/attendance/edit-attendance-source', $url);
        return parent::to($url, $scheme);
    }

    public static function holidayCalendar($url = '', $scheme = false) {
        $url = self::processUrl('/admin/holiday-calendar', $url);
        return parent::to($url, $scheme);
    }

    public static function editHolidayCalendar($url = '', $scheme = false) {
        $url = self::processUrl('/admin/holiday-calendar/edit-holyday-calendar', $url);
        return parent::to($url, $scheme);
    }

    public static function leavePolicy($url = '', $scheme = false) {
        $url = self::processUrl('/admin/leave-policy', $url);
        return parent::to($url, $scheme);
    }

    public static function leavePolicyAddRule($url = '', $scheme = false) {
        $url = self::processUrl('/admin/leave-policy/add-rule', $url);
        return parent::to($url, $scheme);
    }

    public static function leavePolicyListing($url = '', $scheme = false) {
        $url = self::processUrl('/admin/leave-policy/leave-policy-listing', $url);
        return parent::to($url, $scheme);
    }

    public static function attendancePolicyListing($url = '', $scheme = false) {
        $url = self::processUrl('/admin/attendance-policy/attendance-policy-listing', $url);
        return parent::to($url, $scheme);
    }

    public static function attendancePolicyAddRule($url = '', $scheme = false) {
        $url = self::processUrl('/admin/attendance-policy/add-rule', $url);
        return parent::to($url, $scheme);
    }

    public static function userCreateEmployee($url = '', $scheme = false) {
        $url = self::processUrl('/admin/user/user/create-employee', $url);
        return parent::to($url, $scheme);
    }

    /*     * *****************USER RELATED URLS****************** */

    public static function employeeProfile($url = '', $scheme = false) {
        $url = self::processUrl('/admin/employee/profile', $url);
        return parent::to($url, $scheme);
    }

    public static function dashboardHelp($url = '', $scheme = false) {
        $url = self::processUrl('/admin/employee/dashboard/help', $url);
        return parent::to($url, $scheme);
    }

    public static function employeePubProfile($url = '', $scheme = false) {
        $url = self::processUrl('/admin/employee/profile', $url);
        return parent::to($url, $scheme);
    }

    public static function employeeDashboard($url = '', $scheme = false) {
        $url = self::processUrl('/admin/employee/dashboard', $url);
        return parent::to($url, $scheme);
    }

    public static function userProfile($url = '', $scheme = false) {
        $url = self::processUrl('/admin/employee/profile', $url);
        return parent::to($url, $scheme);
    }

    public static function attendancePubView($url = '', $scheme = false) {
        $url = self::processUrl('/admin/employee/attendance/attendance-view', $url);
        return parent::to($url, $scheme);
    }

    public static function attendanceView($url = '', $scheme = false) {
        $url = self::processUrl('/admin/employee/attendance/attendance-view', $url);
        return parent::to($url, $scheme);
    }

    public static function userLogout($url = '', $scheme = false) {
        $url = self::processUrl('/admin/user/user/logout', $url);
        return parent::to($url, $scheme);
    }

    public static function employeePubLeave($url = '', $scheme = false) {
        $url = self::processUrl('/admin/employee/leave', $url);
        return parent::to($url, $scheme);
    }

    public static function employeeLeave($url = '', $scheme = false) {
        $url = self::processUrl('/admin/employee/leave', $url);
        return parent::to($url, $scheme);
    }

    public static function employeeExit($url = '', $scheme = false) {
        $url = self::processUrl('/admin/employee/resignation', $url);
        return parent::to($url, $scheme);
    }

    public static function empResignationDetail($url = '', $scheme = false) {
        $url = self::processUrl('/admin/employee/resignation/resignation-detail', $url);
        return parent::to($url, $scheme);
    }

    public static function empNdcDetail($url = '', $scheme = false) {
        $url = self::processUrl('/admin/employee/resignation/ndc-detail', $url);
        return parent::to($url, $scheme);
    }

    public static function userNdcDetail($url = '', $scheme = false) {
        $url = self::processUrl('/admin/employee/resignation/ndc-usr-detail', $url);
        return parent::to($url, $scheme);
    }

    public static function employeePubExit($url = '', $scheme = false) {
        $url = self::processUrl('/admin/employee/resignation', $url);
        return parent::to($url, $scheme);
    }

    /*     * *****************END OF USER RELATED URLS****************** */


    /*     * *****************HR MANAGER URLS****************** */

    public static function hrTeamList($url = '', $scheme = false) {
        $url = self::processUrl('/admin/manage/hr-emp', $url);
        return parent::to($url, $scheme);
    }

    /*     * *****************END HR MANAGER URLS****************** */
    
    /*     * **********************NDC--configuration*************************************** */

    public static function exitConfigurationDepartment($url = '', $scheme = false) {
        $url = self::processUrl('/admin/exit-configuration/department', $url);
        return parent::to($url, $scheme);
    }

    public static function exitConfigurationAddDepartment($url = '', $scheme = false) {
        $url = self::processUrl('/admin/exit-configuration/add-department', $url);
        return parent::to($url, $scheme);
    }

    public static function dueFormDetail($url = '', $scheme = false) {
        $url = self::processUrl('/admin/exit-configuration/due-form-detail', $url);
        return parent::to($url, $scheme);
    }

    public static function editDueFormDetail($url = '', $scheme = false) {
        $url = self::processUrl('/admin/exit-configuration/edit-due-form', $url);
        return parent::to($url, $scheme);
    }

    public static function addDueForm($url = '', $scheme = false) {
        $url = self::processUrl('/admin/exit-configuration/add-due-form', $url);
        return parent::to($url, $scheme);
    }
    public static function departmentUserDetail($url = '', $scheme = false) {
        $url = self::processUrl('/admin/exit-configuration/department-user-detail', $url);
        return parent::to($url, $scheme);
    }

    /*     * ***********************End NDC--configuration************************************** */
    
    
    
    /*     * *****************Candidate/Recruitment URLS****************** */
    
    public static function candidateProfile($url = '', $scheme = false) {
        $url = self::processUrl('/admin/candidate/profile', $url);
        return parent::to($url, $scheme);
    }
    public static function createProfile($url = '', $scheme = false) {
        $url = self::processUrl('/admin/candidate/profile/create-profile', $url);
        return parent::to($url, $scheme);
    }
    
    /*     * ***************** End Candidate/Recruitment URLS****************** */
}

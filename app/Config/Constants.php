<?php

//--------------------------------------------------------------------
// App Namespace
//--------------------------------------------------------------------
// This defines the default Namespace that is used throughout
// CodeIgniter to refer to the Application directory. Change
// this constant to change the namespace that all application
// classes should use.
//
// NOTE: changing this will require manually modifying the
// existing namespaces of App\* namespaced-classes.
//
defined('APP_NAMESPACE') || define('APP_NAMESPACE', 'App');

/*
|--------------------------------------------------------------------------
| Composer Path
|--------------------------------------------------------------------------
|
| The path that Composer's autoload file is expected to live. By default,
| the vendor folder is in the Root directory, but you can customize that here.
*/
defined('COMPOSER_PATH') || define('COMPOSER_PATH', ROOTPATH . 'vendor/autoload.php');

/*
|--------------------------------------------------------------------------
| Timing Constants
|--------------------------------------------------------------------------
|
| Provide simple ways to work with the myriad of PHP functions that
| require information to be in seconds.
*/
defined('SECOND') || define('SECOND', 1);
defined('MINUTE') || define('MINUTE', 60);
defined('HOUR')   || define('HOUR', 3600);
defined('DAY')    || define('DAY', 86400);
defined('WEEK')   || define('WEEK', 604800);
defined('MONTH')  || define('MONTH', 2592000);
defined('YEAR')   || define('YEAR', 31536000);
defined('DECADE') || define('DECADE', 315360000);

/*
|--------------------------------------------------------------------------
| Exit Status Codes
|--------------------------------------------------------------------------
|
| Used to indicate the conditions under which the script is exit()ing.
| While there is no universal standard for error codes, there are some
| broad conventions.  Three such conventions are mentioned below, for
| those who wish to make use of them.  The CodeIgniter defaults were
| chosen for the least overlap with these conventions, while still
| leaving room for others to be defined in future versions and user
| applications.
|
| The three main conventions used for determining exit status codes
| are as follows:
|
|    Standard C/C++ Library (stdlibc):
|       http://www.gnu.org/software/libc/manual/html_node/Exit-Status.html
|       (This link also contains other GNU-specific conventions)
|    BSD sysexits.h:
|       http://www.gsp.com/cgi-bin/man.cgi?section=3&topic=sysexits
|    Bash scripting:
|       http://tldp.org/LDP/abs/html/exitcodes.html
|
*/
defined('EXIT_SUCCESS')        || define('EXIT_SUCCESS', 0); // no errors
defined('EXIT_ERROR')          || define('EXIT_ERROR', 1); // generic error
defined('EXIT_CONFIG')         || define('EXIT_CONFIG', 3); // configuration error
defined('EXIT_UNKNOWN_FILE')   || define('EXIT_UNKNOWN_FILE', 4); // file not found
defined('EXIT_UNKNOWN_CLASS')  || define('EXIT_UNKNOWN_CLASS', 5); // unknown class
defined('EXIT_UNKNOWN_METHOD') || define('EXIT_UNKNOWN_METHOD', 6); // unknown class member
defined('EXIT_USER_INPUT')     || define('EXIT_USER_INPUT', 7); // invalid user input
defined('EXIT_DATABASE')       || define('EXIT_DATABASE', 8); // database error
defined('EXIT__AUTO_MIN')      || define('EXIT__AUTO_MIN', 9); // lowest automatically-assigned error code
defined('EXIT__AUTO_MAX')      || define('EXIT__AUTO_MAX', 125); // highest automatically-assigned error code


defined('ADMIN_NAME')          || define('ADMIN_NAME', 'Panda CMS'); // CMS name
defined('ADMIN_PATH')          || define('ADMIN_PATH', 'quantri'); // admin base path
defined('ADMIN_RECRUITMENT')     || define('ADMIN_RECRUITMENT', 'nha-tuyen-dung'); // admin base path
defined('PWD_SALT')            || define('PWD_SALT', 'Ac1disvFdxMDdmjOsdpecFw'); // admin base path
defined('PUBLISH_FOLDER')      || define('PUBLISH_FOLDER', 'public_html');
defined('SESSION_USER_ID_KEY') || define('SESSION_USER_ID_KEY', 'session_user_id');
defined('SESSION_USER_TYPE_KEY') || define('SESSION_USER_TYPE_KEY', 'session_user_type');
defined('SEEKER_PATH')          || define('SEEKER_PATH', 'trang-ca-nhan');


//define array_common
const POSITION_WANTED = array(
    1 => 'Mới tốt nghiệp / Thực tập sinh',
    2 => 'Nhân viên',
    3 => 'Trưởng nhóm',
    4 => 'Trưởng phòng',
    5 => 'Phó giám đốc',
    6 => 'Giám đốc',
    7 => 'Tổng giám đốc điều hành',
    8 => 'Khác',
);
const EDUCATION_LEVEL = array(
    1 => 'Tiến sĩ',
    2 => 'Thạc sĩ',
    3 => 'Kỹ sư',
    4 => 'Cử nhân',
    5 => 'Cao đẳng',
    6 => 'Trung cấp',
    7 => 'Trung học',
    8 => 'Lao động phổ thông',
);
const EXPERIENCE = array(
    1 => 'Chưa có kinh nghiệm',
    2 => '6 tháng',
    3 => '1 năm',
    4 => '2 năm',
    5 => '3 năm',
    6 => '5 năm',
    7 => 'hơn 5 năm',
);
const JOB_TYPE = array(
    'fulltime' => 'Toàn thời gian cố định',
    'partime' => 'Thực tập',
    'remote' => 'Làm việc tại nhà',
    'option' => 'Theo hợp đồng tư vấn'
);

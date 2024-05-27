<?php
$protocol = $_SERVER['REQUEST_SCHEME'];
$domain = $_SERVER['HTTP_HOST'];
if($_SERVER['HTTP_HOST'] == "localhost"){
    $url = "http://$domain";
}else{
    $url = "https://$domain";
}

defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);
defined('SITE_ROOT') ? null : define('SITE_ROOT', getcwd());
defined('MAIN_SITE_URL') ? null : define('MAIN_SITE_URL', $url);

if ($_SERVER['HTTP_HOST'] == "localhost") {
    defined('BASE_URL') ? null : define('BASE_URL', MAIN_SITE_URL . "/creditsecrets/wp-content/root/");
    defined('DEV_URL') ? null : define('DEV_URL', MAIN_SITE_URL . "/creditsecrets/wp-content/root/");
    defined('COMMON_DIR') ? null : define('COMMON_DIR', MAIN_SITE_URL . "/creditsecrets/wp-content/root/common");
    defined('LIB_PATH') ? null : define('LIB_PATH', SITE_ROOT . DS . 'common');
    defined('ASSETS_PATH') ? null : define('ASSETS_PATH', COMMON_DIR . "/assets");
} else if ($_SERVER['HTTP_HOST'] == "creditsecrets.local") {
    defined('BASE_URL') ? null : define('BASE_URL', MAIN_SITE_URL . "/wp-content/root/");
    defined('DEV_URL') ? null : define('DEV_URL', MAIN_SITE_URL . "/wp-content/root/");
    defined('COMMON_DIR') ? null : define('COMMON_DIR', MAIN_SITE_URL . "/wp-content/root/common");
    defined('LIB_PATH') ? null : define('LIB_PATH', SITE_ROOT . DS . 'common');
    defined('ASSETS_PATH') ? null : define('ASSETS_PATH', COMMON_DIR . "/assets");
} else {
    defined('DEV_URL') ? null : define('DEV_URL', MAIN_SITE_URL . "/");
    defined('BASE_URL') ? null : define('BASE_URL', MAIN_SITE_URL . "/");
    defined('COMMON_DIR') ? null : define('COMMON_DIR', MAIN_SITE_URL . "/common");
    defined('LIB_PATH') ? null : define('LIB_PATH', SITE_ROOT . DS . 'common');
    defined('ASSETS_PATH') ? null : define('ASSETS_PATH', COMMON_DIR . "/assets");
}




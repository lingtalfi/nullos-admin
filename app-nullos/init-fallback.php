<?php

use BumbleBee\Autoload\ButineurAutoloader;
use Crud\CrudModule;
use Lang\LangModule;
use Privilege\Privilege;
use Privilege\PrivilegeUser;
use QuickPdo\QuickPdo;


//--------------------------------------------
// PHP TOP CONFIG
//--------------------------------------------
$sessionTimeout = 60 * 5 * 1000;
if (null !== $sessionTimeout) { // or session expires when browser quits
    ini_set('session.cookie_lifetime', $sessionTimeout);
}
session_start();


//------------------------------------------------------------------------------/
// UNIVERSE AUTOLOADER (bigbang)
//------------------------------------------------------------------------------/
require_once __DIR__ . '/class-planets/BumbleBee/Autoload/BeeAutoloader.php';
require_once __DIR__ . '/class-planets/BumbleBee/Autoload/ButineurAutoloader.php';
ButineurAutoloader::getInst()
    ->addLocation(__DIR__ . "/class")
    ->addLocation(__DIR__ . "/class-modules")
    ->addLocation(__DIR__ . "/class-planets");
ButineurAutoloader::getInst()->start();


//--------------------------------------------
// FUNCTIONS
//--------------------------------------------
require_once __DIR__ . "/functions/main-functions.php";


//--------------------------------------------
// REDIRECTION
//--------------------------------------------
if ('/index.php' === $_SERVER['PHP_SELF']) {
    define('URL_PREFIX', '');
} else {

    define('URL_PREFIX', substr($_SERVER['PHP_SELF'], 0, strrpos($_SERVER['PHP_SELF'], '/')));
}

//--------------------------------------------
// LOCAL VS PROD
//--------------------------------------------
ini_set('error_log', __DIR__ . "/log/php.err.log");
ini_set('display_errors', 1);


//--------------------------------------------
// GENERAL CONFIG
//--------------------------------------------
// paths
define('APP_ROOT_DIR', __DIR__);


// website
// used in mail communication and authentication form,
// used in html title, and at the top of the left menu
define('WEBSITE_NAME', 'Nullos Admin');


Spirit::set('ricSeparator', '--*--');


//--------------------------------------------
// PRIVILEGE
//--------------------------------------------
PrivilegeUser::$sessionTimeout = $sessionTimeout;


PrivilegeUser::refresh();
if (array_key_exists('disconnect', $_GET)) {
    PrivilegeUser::disconnect();
    if ('' !== $_SERVER['HTTP_REFERER']) {
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit;
    }
}
Privilege::setProfiles([
    'root' => [
        '*',
    ],
    'admin' => [],
]);


//--------------------------------------------
// TRANSLATION
//--------------------------------------------
define('APP_DICTIONARY_PATH', APP_ROOT_DIR . "/lang/" . LangModule::getLang());


define('I_AM_JUST_THE_FALLBACK_INIT', true);




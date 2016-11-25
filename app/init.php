<?php

use BumbleBee\Autoload\ButineurAutoloader;
use Crud\CrudModule;
use Privilege\Privilege;
use Privilege\PrivilegeUser;
use QuickPdo\QuickPdo;


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
// LOCAL VS PROD
//--------------------------------------------
ini_set('error_log', __DIR__ . "/log/php.err.log");

if (true === Helper::isLocal()) {
    $dbUser = 'root';
    $dbPass = 'root';
    $dbName = 'oui';
    define('NULLOS_URL_PREFIX', '');
    ini_set('display_errors', 1);
} else {
    $dbUser = 'my_website_admin';
    $dbPass = 'gjie1i11gR40';
    $dbName = 'oui';
    define('NULLOS_URL_PREFIX', '/nullos');
    ini_set('display_errors', 0);
}


QuickPdo::setConnection("mysql:host=localhost;dbname=$dbName", $dbUser, $dbPass, [
    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'",
    PDO::MYSQL_ATTR_INIT_COMMAND => "SET sql_mode=(SELECT REPLACE(@@sql_mode,'ONLY_FULL_GROUP_BY','')), NAMES 'utf8'",
//    PDO::MYSQL_ATTR_INIT_COMMAND => "SET sql_mode=(SELECT REPLACE(@@sql_mode,'STRICT_TRANS_TABLES','')), NAMES 'utf8'",
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
]);


//--------------------------------------------
// CONFIG
//--------------------------------------------
// paths
define('NULLOS_APP_ROOT_DIR', __DIR__);


// website
// used in mail communication and authentication form,
// used in html title, and at the top of the left menu
define('NULLOS_WEBSITE_NAME', 'my website');


Spirit::set('ricSeparator', '--*--');


//--------------------------------------------
// PRIVILEGE
//--------------------------------------------
PrivilegeUser::$sessionTimeout = 60 * 5 * 1000;
PrivilegeUser::refresh();
if (array_key_exists('disconnect', $_GET)) {
    PrivilegeUser::disconnect();
}
Privilege::setProfiles([
    'root' => [
        '*',
    ],
    'admin' => [
        '*',
        '-mysql.privilege.admin',
    ],
]);


//--------------------------------------------
// TRANSLATION
//--------------------------------------------
define('NULLOS_APP_DICTIONARY_PATH', NULLOS_APP_ROOT_DIR . "/lang/fr");





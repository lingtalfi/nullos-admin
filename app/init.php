<?php

use BumbleBee\Autoload\ButineurAutoloader;
use QuickPdo\QuickPdo;


//session_start();


$__butineurStart = false;
require "bigbang.php";
require __DIR__ . "/functions/main-functions.php";

//--------------------------------------------
// ADD MY OWN CLASSES
//--------------------------------------------
ButineurAutoloader::getInst()
    ->addLocation(__DIR__ . "/class")
    ->start();


//--------------------------------------------
// LOCAL VS PROD
//--------------------------------------------
ini_set('error_log', __DIR__ . "/log/php.err.log");

if (true === Helper::isLocal()) {
    $dbUser = 'root';
    $dbPass = 'root';
    $dbName = 'oui';
    define('URL_PREFIX', '');
    ini_set('display_errors', 1);
} else {
    $dbUser = 'my_website_admin';
    $dbPass = 'gjie1i11gR40';
    $dbName = 'oui';
    define('URL_PREFIX', '/nullos');
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
define('APP_ROOT_DIR', __DIR__);


// website
define('WEBSITE_NAME', 'my website'); // used in mail communication


// email
define('MAIL_ADMIN', "postmaster@my_website.com");
define('MAIL_HOST', "ssl.some_fai.net");
define('MAIL_PORT', 465);
define('MAIL_USER', 'postmaster@my_website.com');
define('MAIL_PASS', "feozejoiijz");
define('MAIL_FROM', 'postmaster@my_website.com');



Spirit::set('ricSeparator', '--*--');


// Session user
//define('USER_SESSION_TIMEOUT', 60 * 5 * 1000); // number of seconds before session times out
//
//
//
////--------------------------------------------
//// USER
////--------------------------------------------
//User::refresh();
//if (array_key_exists('disconnect', $_GET)) {
//    User::disconnect();
//}


//--------------------------------------------
// TRANSLATION
//--------------------------------------------
define('APP_DICTIONARY_PATH', APP_ROOT_DIR . "/lang/en");



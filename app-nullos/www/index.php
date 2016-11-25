<?php


use Privilege\PrivilegeUser;

//require __DIR__ . "/../../../app-nullos/init.php";
require __DIR__ . "/../init.php";


//--------------------------------------------
// ROUTER
//--------------------------------------------
if (PrivilegeUser::isConnected()) {


    $uri2pagesMap = [
        '/' => 'home.php',
        '/table' => 'table.php',
    ];

    $uri = explode('?', $_SERVER['REQUEST_URI'])[0];
    if ('' !== URL_PREFIX && URL_PREFIX === substr($uri, 0, strlen(URL_PREFIX))) {
        $uri = substr($uri, strlen(URL_PREFIX));
    }
    Spirit::set('uri', $uri);

    $page = "404.php";
    if (array_key_exists($uri, $uri2pagesMap)) {
        $page = $uri2pagesMap[$uri];
    }

} else {
    $page = 'login.php';
}


require_once APP_ROOT_DIR . "/pages/" . $page;


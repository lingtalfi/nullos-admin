<?php


use Privilege\PrivilegeUser;

if (file_exists(__DIR__ . "/../init.php")) {
    require_once __DIR__ . "/../init.php";
} else {
    require_once __DIR__ . "/../init-fallback.php";
}


//--------------------------------------------
// ROUTER
//--------------------------------------------
ob_start(); // ob start gives us the ability to do redirect from php "view" code, using header(location...); exit;
if (PrivilegeUser::isConnected()) {


    $uri2pagesMap = [
        '/' => 'home.php',
        '/table' => 'table.php',
        '/quickstart' => 'quickstart.php',
        '/test' => 'test.php',
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
echo ob_get_clean();
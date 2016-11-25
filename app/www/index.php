<?php


use Privilege\PrivilegeUser;

require __DIR__ . "/../init.php";


//--------------------------------------------
// ROUTER
//--------------------------------------------
if (PrivilegeUser::isConnected()) {


    $uri2pagesMap = [
        '/' => 'home.php',
        '/table' => 'table.php',
        '/crudgen' => 'crudgen.php',
    ];

    $uri = explode('?', $_SERVER['REQUEST_URI'])[0];
    if ('' !== NULLOS_URL_PREFIX && NULLOS_URL_PREFIX === substr($uri, 0, strlen(NULLOS_URL_PREFIX))) {
        $uri = substr($uri, strlen(NULLOS_URL_PREFIX));
    }
    Spirit::set('uri', $uri);

    $page = "404.php";
    if (array_key_exists($uri, $uri2pagesMap)) {
        $page = $uri2pagesMap[$uri];
    }

} else {
    $page = 'login.php';
}


require_once __DIR__ . "/../pages/" . $page;


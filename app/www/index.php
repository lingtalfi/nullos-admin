<?php


require __DIR__ . "/../init.php";




//--------------------------------------------
// ROUTER
//--------------------------------------------
$uri2pagesMap = [
    '/' => 'home.php',
    '/table' => 'table.php',
    '/crudgen' => 'crudgen.php',
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
require_once __DIR__ . "/../pages/" . $page;





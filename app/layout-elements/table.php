<?php


$table = null;
$action = "list";

if (array_key_exists('name', $_GET)) {
    $table = (string)$_GET['name'];


    if (array_key_exists('action', $_GET)) {
        $action = (string)$_GET['action'];
    }

    $actions = ['list', 'edit', 'insert'];

    if (in_array($action, $actions, true)) {
        if('list' !== $action){
            $action = 'form';
        }

        $file = APP_ROOT_DIR . "/crud/" . $action . '/' . $table . '.php';
        if (file_exists($file)) {
            require_once $file;
        } else {
            Logger::log("file does not exist: $file");
        }
    }

}









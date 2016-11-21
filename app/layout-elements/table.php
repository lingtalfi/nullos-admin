<?php


$name = null;
$action = "list";
if (array_key_exists('name', $_GET)) {
    $name = (string)$_GET['name'];
}

if (array_key_exists('action', $_GET)) {
    $action = (string)$_GET['action'];
}


$actions = ['list'];


if (in_array($action, $actions, true)) {
    require_once __DIR__ . "/table/" . $action . '.php';
}










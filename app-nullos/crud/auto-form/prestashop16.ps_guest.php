<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_guest", ['id_guest']);



$form->labels = [
    "id_guest" => "id guest",
    "id_operating_system" => "id operating system",
    "id_web_browser" => "id web browser",
    "id_customer" => "id customer",
    "javascript" => "javascript",
    "screen_resolution_x" => "screen resolution x",
    "screen_resolution_y" => "screen resolution y",
    "screen_color" => "screen color",
    "sun_java" => "sun java",
    "adobe_flash" => "adobe flash",
    "adobe_director" => "adobe director",
    "apple_quicktime" => "apple quicktime",
    "real_player" => "real player",
    "windows_media" => "windows media",
    "accept_language" => "accept language",
    "mobile_theme" => "mobile theme",
];


$form->title = "Ps guest";


$form->addControl("id_operating_system")->type("text")
->value(0);
$form->addControl("id_web_browser")->type("text")
->value(0);
$form->addControl("id_customer")->type("text")
->value(0);
$form->addControl("javascript")->type("text")
->value("0");
$form->addControl("screen_resolution_x")->type("text");
$form->addControl("screen_resolution_y")->type("text");
$form->addControl("screen_color")->type("text")
->value(0);
$form->addControl("sun_java")->type("text")
->value(0);
$form->addControl("adobe_flash")->type("text")
->value(0);
$form->addControl("adobe_director")->type("text")
->value(0);
$form->addControl("apple_quicktime")->type("text")
->value(0);
$form->addControl("real_player")->type("text")
->value(0);
$form->addControl("windows_media")->type("text")
->value(0);
$form->addControl("accept_language")->type("text");
$form->addControl("mobile_theme")->type("text")
->value("0");


$form->display();

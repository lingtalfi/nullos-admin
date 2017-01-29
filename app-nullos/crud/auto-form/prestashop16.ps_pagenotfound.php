<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_pagenotfound", ['id_pagenotfound']);



$form->labels = [
    "id_pagenotfound" => "id pagenotfound",
    "id_shop" => "id shop",
    "id_shop_group" => "id shop group",
    "request_uri" => "request uri",
    "http_referer" => "http referer",
    "date_add" => "date add",
];


$form->title = "Ps pagenotfound";


$form->addControl("id_shop")->type("text")
->value("1");
$form->addControl("id_shop_group")->type("text")
->value("1");
$form->addControl("request_uri")->type("text");
$form->addControl("http_referer")->type("text");
$form->addControl("date_add")->type("date6");


$form->display();

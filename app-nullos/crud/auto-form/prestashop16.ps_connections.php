<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_connections", ['id_connections']);



$form->labels = [
    "id_connections" => "id connections",
    "id_shop_group" => "id shop group",
    "id_shop" => "id shop",
    "id_guest" => "id guest",
    "id_page" => "id page",
    "ip_address" => "ip address",
    "date_add" => "date add",
    "http_referer" => "http referer",
];


$form->title = "Ps connections";


$form->addControl("id_shop_group")->type("text")
->value("1");
$form->addControl("id_shop")->type("text")
->value("1");
$form->addControl("id_guest")->type("text")
->value(0);
$form->addControl("id_page")->type("text")
->value(0);
$form->addControl("ip_address")->type("text");
$form->addControl("date_add")->type("date6");
$form->addControl("http_referer")->type("text");


$form->display();

<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_connections_source", ['id_connections_source']);



$form->labels = [
    "id_connections_source" => "id connections source",
    "id_connections" => "id connections",
    "http_referer" => "http referer",
    "request_uri" => "request uri",
    "keywords" => "keywords",
    "date_add" => "date add",
];


$form->title = "Ps connections source";


$form->addControl("id_connections")->type("text")
->value(0);
$form->addControl("http_referer")->type("text");
$form->addControl("request_uri")->type("text");
$form->addControl("keywords")->type("text");
$form->addControl("date_add")->type("date6");


$form->display();

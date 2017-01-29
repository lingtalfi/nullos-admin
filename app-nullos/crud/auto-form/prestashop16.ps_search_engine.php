<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_search_engine", ['id_search_engine']);



$form->labels = [
    "id_search_engine" => "id search engine",
    "server" => "server",
    "getvar" => "getvar",
];


$form->title = "Ps search engine";


$form->addControl("server")->type("text");
$form->addControl("getvar")->type("text");


$form->display();

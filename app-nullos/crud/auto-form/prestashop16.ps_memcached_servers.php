<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_memcached_servers", ['id_memcached_server']);



$form->labels = [
    "id_memcached_server" => "id memcached server",
    "ip" => "ip",
    "port" => "port",
    "weight" => "weight",
];


$form->title = "Ps memcached servers";


$form->addControl("ip")->type("text");
$form->addControl("port")->type("text")
->value(0);
$form->addControl("weight")->type("text")
->value(0);


$form->display();

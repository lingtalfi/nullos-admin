<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_referrer_cache", ['id_connections_source', 'id_referrer']);



$form->labels = [
    "id_connections_source" => "id connections source",
    "id_referrer" => "id referrer",
];


$form->title = "Ps referrer cache";


$form->addControl("id_connections_source")->type("text")
->value(0);
$form->addControl("id_referrer")->type("text")
->value(0);


$form->display();

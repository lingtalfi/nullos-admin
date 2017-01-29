<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_request_sql", ['id_request_sql']);



$form->labels = [
    "id_request_sql" => "id request sql",
    "name" => "name",
    "sql" => "sql",
];


$form->title = "Ps request sql";


$form->addControl("name")->type("text");
$form->addControl("sql")->type("message");


$form->display();

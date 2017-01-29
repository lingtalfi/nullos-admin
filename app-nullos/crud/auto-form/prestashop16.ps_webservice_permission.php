<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_webservice_permission", ['id_webservice_permission']);



$form->labels = [
    "id_webservice_permission" => "id webservice permission",
    "resource" => "resource",
    "method" => "method",
    "id_webservice_account" => "id webservice account",
];


$form->title = "Ps webservice permission";


$form->addControl("resource")->type("text");
$form->addControl("method")->type("select", ['GET','POST','PUT','DELETE','HEAD']);
$form->addControl("id_webservice_account")->type("text")
->value(0);


$form->display();

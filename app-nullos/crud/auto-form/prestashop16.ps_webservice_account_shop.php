<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_webservice_account_shop", ['id_webservice_account', 'id_shop']);



$form->labels = [
    "id_webservice_account" => "id webservice account",
    "id_shop" => "id shop",
];


$form->title = "Ps webservice account shop";


$form->addControl("id_webservice_account")->type("text")
->value(0);
$form->addControl("id_shop")->type("text")
->value(0);


$form->display();

<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_contact_shop", ['id_contact', 'id_shop']);



$form->labels = [
    "id_contact" => "id contact",
    "id_shop" => "id shop",
];


$form->title = "Ps contact shop";


$form->addControl("id_contact")->type("text")
->value(0);
$form->addControl("id_shop")->type("text")
->value(0);


$form->display();

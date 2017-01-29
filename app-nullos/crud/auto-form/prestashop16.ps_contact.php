<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_contact", ['id_contact']);



$form->labels = [
    "id_contact" => "id contact",
    "email" => "email",
    "customer_service" => "customer service",
    "position" => "position",
];


$form->title = "Ps contact";


$form->addControl("email")->type("text");
$form->addControl("customer_service")->type("text")
->value("0");
$form->addControl("position")->type("text")
->value("0");


$form->display();

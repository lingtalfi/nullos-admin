<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_homeslider", ['id_homeslider_slides', 'id_shop']);



$form->labels = [
    "id_homeslider_slides" => "id homeslider slides",
    "id_shop" => "id shop",
];


$form->title = "Ps homeslider";


$form->addControl("id_shop")->type("text")
->value(0);


$form->display();

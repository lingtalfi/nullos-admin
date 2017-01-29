<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_linksmenutop", ['id_linksmenutop']);



$form->labels = [
    "id_linksmenutop" => "id linksmenutop",
    "id_shop" => "id shop",
    "new_window" => "new window",
];


$form->title = "Ps linksmenutop";


$form->addControl("id_shop")->type("text")
->value(0);
$form->addControl("new_window")->type("text")
->value(0);


$form->display();

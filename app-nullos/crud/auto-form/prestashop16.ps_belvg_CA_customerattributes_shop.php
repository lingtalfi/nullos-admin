<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_belvg_CA_customerattributes_shop", ['id_belvg_customerattributes', 'id_shop']);



$form->labels = [
    "id_belvg_customerattributes" => "id belvg customerattributes",
    "id_shop" => "id shop",
];


$form->title = "Ps belvg CA customerattributes shop";


$form->addControl("id_belvg_customerattributes")->type("text")
->value(0);
$form->addControl("id_shop")->type("text")
->value(0);


$form->display();

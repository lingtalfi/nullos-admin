<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_employee_shop", ['id_employee', 'id_shop']);



$form->labels = [
    "id_employee" => "id employee",
    "id_shop" => "id shop",
];


$form->title = "Ps employee shop";


$form->addControl("id_employee")->type("text")
->value(0);
$form->addControl("id_shop")->type("text")
->value(0);


$form->display();

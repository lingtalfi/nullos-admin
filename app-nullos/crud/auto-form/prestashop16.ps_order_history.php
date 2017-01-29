<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_order_history", ['id_order_history']);



$form->labels = [
    "id_order_history" => "id order history",
    "id_employee" => "id employee",
    "id_order" => "id order",
    "id_order_state" => "id order state",
    "date_add" => "date add",
];


$form->title = "Ps order history";


$form->addControl("id_employee")->type("text")
->value(0);
$form->addControl("id_order")->type("text")
->value(0);
$form->addControl("id_order_state")->type("text")
->value(0);
$form->addControl("date_add")->type("date6");


$form->display();

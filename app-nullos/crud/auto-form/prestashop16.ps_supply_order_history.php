<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_supply_order_history", ['id_supply_order_history']);



$form->labels = [
    "id_supply_order_history" => "id supply order history",
    "id_supply_order" => "id supply order",
    "id_employee" => "id employee",
    "employee_lastname" => "employee lastname",
    "employee_firstname" => "employee firstname",
    "id_state" => "id state",
    "date_add" => "date add",
];


$form->title = "Ps supply order history";


$form->addControl("id_supply_order")->type("text")
->value(0);
$form->addControl("id_employee")->type("text")
->value(0);
$form->addControl("employee_lastname")->type("text")
->value("");
$form->addControl("employee_firstname")->type("text")
->value("");
$form->addControl("id_state")->type("text")
->value(0);
$form->addControl("date_add")->type("date6");


$form->display();

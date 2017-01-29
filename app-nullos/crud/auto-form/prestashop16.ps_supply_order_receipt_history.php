<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_supply_order_receipt_history", ['id_supply_order_receipt_history']);



$form->labels = [
    "id_supply_order_receipt_history" => "id supply order receipt history",
    "id_supply_order_detail" => "id supply order detail",
    "id_employee" => "id employee",
    "employee_lastname" => "employee lastname",
    "employee_firstname" => "employee firstname",
    "id_supply_order_state" => "id supply order state",
    "quantity" => "quantity",
    "date_add" => "date add",
];


$form->title = "Ps supply order receipt history";


$form->addControl("id_supply_order_detail")->type("text")
->value(0);
$form->addControl("id_employee")->type("text")
->value(0);
$form->addControl("employee_lastname")->type("text")
->value("");
$form->addControl("employee_firstname")->type("text")
->value("");
$form->addControl("id_supply_order_state")->type("text")
->value(0);
$form->addControl("quantity")->type("text")
->value(0);
$form->addControl("date_add")->type("date6");


$form->display();

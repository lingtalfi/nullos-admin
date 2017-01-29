<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_supply_order_state", ['id_supply_order_state']);



$form->labels = [
    "id_supply_order_state" => "id supply order state",
    "delivery_note" => "delivery note",
    "editable" => "editable",
    "receipt_state" => "receipt state",
    "pending_receipt" => "pending receipt",
    "enclosed" => "enclosed",
    "color" => "color",
];


$form->title = "Ps supply order state";


$form->addControl("delivery_note")->type("text")
->value("0");
$form->addControl("editable")->type("text")
->value("0");
$form->addControl("receipt_state")->type("text")
->value("0");
$form->addControl("pending_receipt")->type("text")
->value("0");
$form->addControl("enclosed")->type("text")
->value("0");
$form->addControl("color")->type("text");


$form->display();

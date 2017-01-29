<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_order_invoice_tax", ['id_order_invoice', 'type', 'id_tax', 'amount']);



$form->labels = [
    "id_order_invoice" => "id order invoice",
    "type" => "type",
    "id_tax" => "id tax",
    "amount" => "amount",
];


$form->title = "Ps order invoice tax";


$form->addControl("id_order_invoice")->type("text")
->value(0);
$form->addControl("type")->type("text");
$form->addControl("id_tax")->type("text")
->value(0);
$form->addControl("amount")->type("text")
->value("0.000000");


$form->display();

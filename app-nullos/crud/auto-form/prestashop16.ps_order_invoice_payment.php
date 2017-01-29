<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_order_invoice_payment", ['id_order_invoice', 'id_order_payment']);



$form->labels = [
    "id_order_invoice" => "id order invoice",
    "id_order_payment" => "id order payment",
    "id_order" => "id order",
];


$form->title = "Ps order invoice payment";


$form->addControl("id_order_invoice")->type("text")
->value(0);
$form->addControl("id_order_payment")->type("text")
->value(0);
$form->addControl("id_order")->type("text")
->value(0);


$form->display();

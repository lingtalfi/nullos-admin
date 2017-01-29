<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_order_payment", ['id_order_payment']);



$form->labels = [
    "id_order_payment" => "id order payment",
    "order_reference" => "order reference",
    "id_currency" => "id currency",
    "amount" => "amount",
    "payment_method" => "payment method",
    "conversion_rate" => "conversion rate",
    "transaction_id" => "transaction",
    "card_number" => "card number",
    "card_brand" => "card brand",
    "card_expiration" => "card expiration",
    "card_holder" => "card holder",
    "date_add" => "date add",
];


$form->title = "Ps order payment";


$form->addControl("order_reference")->type("text");
$form->addControl("id_currency")->type("text")
->value(0);
$form->addControl("amount")->type("text");
$form->addControl("payment_method")->type("text");
$form->addControl("conversion_rate")->type("text")
->value("1.000000");
$form->addControl("transaction_id")->type("text");
$form->addControl("card_number")->type("text");
$form->addControl("card_brand")->type("text");
$form->addControl("card_expiration")->type("text");
$form->addControl("card_holder")->type("text");
$form->addControl("date_add")->type("date6");


$form->display();

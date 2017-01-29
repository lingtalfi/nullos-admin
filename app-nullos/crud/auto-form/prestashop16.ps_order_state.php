<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_order_state", ['id_order_state']);



$form->labels = [
    "id_order_state" => "id order state",
    "invoice" => "invoice",
    "send_email" => "send email",
    "module_name" => "module name",
    "color" => "color",
    "unremovable" => "unremovable",
    "hidden" => "hidden",
    "logable" => "logable",
    "delivery" => "delivery",
    "shipped" => "shipped",
    "paid" => "paid",
    "pdf_invoice" => "pdf invoice",
    "pdf_delivery" => "pdf delivery",
    "deleted" => "deleted",
];


$form->title = "Ps order state";


$form->addControl("invoice")->type("text")
->value("0");
$form->addControl("send_email")->type("text")
->value("0");
$form->addControl("module_name")->type("text");
$form->addControl("color")->type("text");
$form->addControl("unremovable")->type("text")
->value(0);
$form->addControl("hidden")->type("text")
->value("0");
$form->addControl("logable")->type("text")
->value("0");
$form->addControl("delivery")->type("text")
->value("0");
$form->addControl("shipped")->type("text")
->value("0");
$form->addControl("paid")->type("text")
->value("0");
$form->addControl("pdf_invoice")->type("text")
->value("0");
$form->addControl("pdf_delivery")->type("text")
->value("0");
$form->addControl("deleted")->type("text")
->value("0");


$form->display();

<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_order_detail_tax", ['id_order_detail', 'id_tax', 'unit_amount', 'total_amount']);



$form->labels = [
    "id_order_detail" => "id order detail",
    "id_tax" => "id tax",
    "unit_amount" => "unit amount",
    "total_amount" => "total amount",
];


$form->title = "Ps order detail tax";


$form->addControl("id_order_detail")->type("text")
->value(0);
$form->addControl("id_tax")->type("text")
->value(0);
$form->addControl("unit_amount")->type("text")
->value("0.000000");
$form->addControl("total_amount")->type("text")
->value("0.000000");


$form->display();

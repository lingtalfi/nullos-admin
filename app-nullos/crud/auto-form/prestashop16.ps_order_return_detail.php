<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_order_return_detail", ['id_order_return', 'id_order_detail', 'id_customization']);



$form->labels = [
    "id_order_return" => "id order return",
    "id_order_detail" => "id order detail",
    "id_customization" => "id customization",
    "product_quantity" => "product quantity",
];


$form->title = "Ps order return detail";


$form->addControl("id_order_return")->type("text")
->value(0);
$form->addControl("id_order_detail")->type("text")
->value(0);
$form->addControl("id_customization")->type("text")
->value("0");
$form->addControl("product_quantity")->type("text")
->value("0");


$form->display();

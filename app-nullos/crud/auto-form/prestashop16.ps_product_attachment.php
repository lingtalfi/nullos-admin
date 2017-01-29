<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_product_attachment", ['id_product', 'id_attachment']);



$form->labels = [
    "id_product" => "id product",
    "id_attachment" => "id attachment",
];


$form->title = "Ps product attachment";


$form->addControl("id_product")->type("text")
->value(0);
$form->addControl("id_attachment")->type("text")
->value(0);


$form->display();

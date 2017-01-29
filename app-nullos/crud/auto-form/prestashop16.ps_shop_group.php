<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_shop_group", ['id_shop_group']);



$form->labels = [
    "id_shop_group" => "id shop group",
    "name" => "name",
    "share_customer" => "share customer",
    "share_order" => "share order",
    "share_stock" => "share stock",
    "active" => "active",
    "deleted" => "deleted",
];


$form->title = "Ps shop group";


$form->addControl("name")->type("text");
$form->addControl("share_customer")->type("text")
->value(0);
$form->addControl("share_order")->type("text")
->value(0);
$form->addControl("share_stock")->type("text")
->value(0);
$form->addControl("active")->type("text")
->value("1");
$form->addControl("deleted")->type("text")
->value("0");


$form->display();

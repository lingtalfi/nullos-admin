<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_referrer_shop", ['id_referrer', 'id_shop']);



$form->labels = [
    "id_referrer" => "id referrer",
    "id_shop" => "id shop",
    "cache_visitors" => "cache visitors",
    "cache_visits" => "cache visits",
    "cache_pages" => "cache pages",
    "cache_registrations" => "cache registrations",
    "cache_orders" => "cache orders",
    "cache_sales" => "cache sales",
    "cache_reg_rate" => "cache reg rate",
    "cache_order_rate" => "cache order rate",
];


$form->title = "Ps referrer shop";


$form->addControl("id_shop")->type("text")
->value("1");
$form->addControl("cache_visitors")->type("text")
->value(0);
$form->addControl("cache_visits")->type("text")
->value(0);
$form->addControl("cache_pages")->type("text")
->value(0);
$form->addControl("cache_registrations")->type("text")
->value(0);
$form->addControl("cache_orders")->type("text")
->value(0);
$form->addControl("cache_sales")->type("text");
$form->addControl("cache_reg_rate")->type("text");
$form->addControl("cache_order_rate")->type("text");


$form->display();

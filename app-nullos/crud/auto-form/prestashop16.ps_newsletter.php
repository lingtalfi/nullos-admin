<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_newsletter", ['id']);



$form->labels = [
    "id" => "id",
    "id_shop" => "id shop",
    "id_shop_group" => "id shop group",
    "email" => "email",
    "newsletter_date_add" => "newsletter date add",
    "ip_registration_newsletter" => "ip registration newsletter",
    "http_referer" => "http referer",
    "active" => "active",
];


$form->title = "Ps newsletter";


$form->addControl("id_shop")->type("text")
->value("1");
$form->addControl("id_shop_group")->type("text")
->value("1");
$form->addControl("email")->type("text");
$form->addControl("newsletter_date_add")->type("date6");
$form->addControl("ip_registration_newsletter")->type("text");
$form->addControl("http_referer")->type("text");
$form->addControl("active")->type("text")
->value("0");


$form->display();

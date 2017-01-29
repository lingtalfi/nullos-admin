<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_shop_url", ['id_shop_url']);



$form->labels = [
    "id_shop_url" => "id shop url",
    "id_shop" => "id shop",
    "domain" => "domain",
    "domain_ssl" => "domain ssl",
    "physical_uri" => "physical uri",
    "virtual_uri" => "virtual uri",
    "main" => "main",
    "active" => "active",
];


$form->title = "Ps shop url";


$form->addControl("id_shop")->type("text")
->value(0);
$form->addControl("domain")->type("text");
$form->addControl("domain_ssl")->type("text");
$form->addControl("physical_uri")->type("text");
$form->addControl("virtual_uri")->type("text");
$form->addControl("main")->type("text")
->value(0);
$form->addControl("active")->type("text")
->value(0);


$form->display();

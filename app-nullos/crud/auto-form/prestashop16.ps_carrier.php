<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_carrier", ['id_carrier']);



$form->labels = [
    "id_carrier" => "id carrier",
    "id_reference" => "id reference",
    "id_tax_rules_group" => "id tax rules group",
    "name" => "name",
    "url" => "url",
    "active" => "active",
    "deleted" => "deleted",
    "shipping_handling" => "shipping handling",
    "range_behavior" => "range behavior",
    "is_module" => "is module",
    "is_free" => "is free",
    "shipping_external" => "shipping external",
    "need_range" => "need range",
    "external_module_name" => "external module name",
    "shipping_method" => "shipping method",
    "position" => "position",
    "max_width" => "max width",
    "max_height" => "max height",
    "max_depth" => "max depth",
    "max_weight" => "max weight",
    "grade" => "grade",
];


$form->title = "Ps carrier";


$form->addControl("id_reference")->type("text")
->value(0);
$form->addControl("id_tax_rules_group")->type("text")
->value("0");
$form->addControl("name")->type("text");
$form->addControl("url")->type("text");
$form->addControl("active")->type("text")
->value("0");
$form->addControl("deleted")->type("text")
->value("0");
$form->addControl("shipping_handling")->type("text")
->value("1");
$form->addControl("range_behavior")->type("text")
->value("0");
$form->addControl("is_module")->type("text")
->value("0");
$form->addControl("is_free")->type("text")
->value("0");
$form->addControl("shipping_external")->type("text")
->value("0");
$form->addControl("need_range")->type("text")
->value("0");
$form->addControl("external_module_name")->type("text");
$form->addControl("shipping_method")->type("text")
->value("0");
$form->addControl("position")->type("text")
->value("0");
$form->addControl("max_width")->type("text")
->value("0");
$form->addControl("max_height")->type("text")
->value("0");
$form->addControl("max_depth")->type("text")
->value("0");
$form->addControl("max_weight")->type("text")
->value("0.000000");
$form->addControl("grade")->type("text")
->value("0");


$form->display();

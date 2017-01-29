<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_belvg_CA_customerattributes", ['id_belvg_customerattributes']);



$form->labels = [
    "id_belvg_customerattributes" => "id belvg customerattributes",
    "code" => "code",
    "type" => "type",
    "is_enabled" => "is enabled",
    "sort_order" => "sort order",
    "display_on" => "display on",
    "required" => "required",
    "validation" => "validation",
    "values" => "values",
    "groups" => "groups",
    "max_text_length" => "max text length",
    "file_size" => "file size",
    "file_extensions" => "file extensions",
    "date_add" => "date add",
    "date_upd" => "date upd",
];


$form->title = "Ps belvg CA customerattributes";


$form->addControl("code")->type("text");
$form->addControl("type")->type("select", ['text','textarea','date','radio','multiselect','dropdown','image','attachment']);
$form->addControl("is_enabled")->type("text")
->value("0");
$form->addControl("sort_order")->type("text")
->value("0");
$form->addControl("display_on")->type("radioList", ['create','myaccount','both']);
$form->addControl("required")->type("text")
->value("0");
$form->addControl("validation")->type("text");
$form->addControl("values")->type("message");
$form->addControl("groups")->type("message");
$form->addControl("max_text_length")->type("text")
->value(0);
$form->addControl("file_size")->type("text")
->value(0);
$form->addControl("file_extensions")->type("message");
$form->addControl("date_add")->type("date6");
$form->addControl("date_upd")->type("date6");


$form->display();

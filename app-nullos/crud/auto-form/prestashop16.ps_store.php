<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_store", ['id_store']);



$form->labels = [
    "id_store" => "id store",
    "id_country" => "id country",
    "id_state" => "id state",
    "name" => "name",
    "address1" => "address1",
    "address2" => "address2",
    "city" => "city",
    "postcode" => "postcode",
    "latitude" => "latitude",
    "longitude" => "longitude",
    "hours" => "hours",
    "phone" => "phone",
    "fax" => "fax",
    "email" => "email",
    "note" => "note",
    "active" => "active",
    "date_add" => "date add",
    "date_upd" => "date upd",
];


$form->title = "Ps store";


$form->addControl("id_country")->type("text")
->value(0);
$form->addControl("id_state")->type("text")
->value(0);
$form->addControl("name")->type("text");
$form->addControl("address1")->type("text");
$form->addControl("address2")->type("text");
$form->addControl("city")->type("text");
$form->addControl("postcode")->type("text");
$form->addControl("latitude")->type("text");
$form->addControl("longitude")->type("text");
$form->addControl("hours")->type("text");
$form->addControl("phone")->type("text");
$form->addControl("fax")->type("text");
$form->addControl("email")->type("text");
$form->addControl("note")->type("message");
$form->addControl("active")->type("text")
->value("0");
$form->addControl("date_add")->type("date6");
$form->addControl("date_upd")->type("date6");


$form->display();

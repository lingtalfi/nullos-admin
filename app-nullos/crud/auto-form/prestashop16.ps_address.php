<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_address", ['id_address']);



$form->labels = [
    "id_address" => "id address",
    "id_country" => "id country",
    "id_state" => "id state",
    "id_customer" => "id customer",
    "id_manufacturer" => "id manufacturer",
    "id_supplier" => "id supplier",
    "id_warehouse" => "id warehouse",
    "alias" => "alias",
    "company" => "company",
    "lastname" => "lastname",
    "firstname" => "firstname",
    "address1" => "address1",
    "address2" => "address2",
    "postcode" => "postcode",
    "city" => "city",
    "other" => "other",
    "phone" => "phone",
    "phone_mobile" => "phone mobile",
    "vat_number" => "vat number",
    "dni" => "dni",
    "date_add" => "date add",
    "date_upd" => "date upd",
    "active" => "active",
    "deleted" => "deleted",
];


$form->title = "Ps address";


$form->addControl("id_country")->type("text")
->value(0);
$form->addControl("id_state")->type("text")
->value(0);
$form->addControl("id_customer")->type("text")
->value("0");
$form->addControl("id_manufacturer")->type("text")
->value("0");
$form->addControl("id_supplier")->type("text")
->value("0");
$form->addControl("id_warehouse")->type("text")
->value("0");
$form->addControl("alias")->type("text");
$form->addControl("company")->type("text");
$form->addControl("lastname")->type("text");
$form->addControl("firstname")->type("text");
$form->addControl("address1")->type("text");
$form->addControl("address2")->type("text");
$form->addControl("postcode")->type("text");
$form->addControl("city")->type("text");
$form->addControl("other")->type("message");
$form->addControl("phone")->type("text");
$form->addControl("phone_mobile")->type("text");
$form->addControl("vat_number")->type("text");
$form->addControl("dni")->type("text");
$form->addControl("date_add")->type("date6");
$form->addControl("date_upd")->type("date6");
$form->addControl("active")->type("text")
->value("1");
$form->addControl("deleted")->type("text")
->value("0");


$form->display();

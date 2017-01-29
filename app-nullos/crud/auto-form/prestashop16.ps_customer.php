<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_customer", ['id_customer']);



$form->labels = [
    "id_customer" => "id customer",
    "id_shop_group" => "id shop group",
    "id_shop" => "id shop",
    "id_gender" => "id gender",
    "id_default_group" => "id default group",
    "id_lang" => "id lang",
    "id_risk" => "id risk",
    "company" => "company",
    "siret" => "siret",
    "ape" => "ape",
    "firstname" => "firstname",
    "lastname" => "lastname",
    "email" => "email",
    "passwd" => "passwd",
    "last_passwd_gen" => "last passwd gen",
    "birthday" => "birthday",
    "newsletter" => "newsletter",
    "ip_registration_newsletter" => "ip registration newsletter",
    "newsletter_date_add" => "newsletter date add",
    "optin" => "optin",
    "website" => "website",
    "outstanding_allow_amount" => "outstanding allow amount",
    "show_public_prices" => "show public prices",
    "max_payment_days" => "max payment days",
    "secure_key" => "secure key",
    "note" => "note",
    "active" => "active",
    "is_guest" => "is guest",
    "deleted" => "deleted",
    "date_add" => "date add",
    "date_upd" => "date upd",
];


$form->title = "Ps customer";


$form->addControl("id_shop_group")->type("text")
->value("1");
$form->addControl("id_shop")->type("text")
->value("1");
$form->addControl("id_gender")->type("text")
->value(0);
$form->addControl("id_default_group")->type("text")
->value("1");
$form->addControl("id_lang")->type("text")
->value(0);
$form->addControl("id_risk")->type("text")
->value("1");
$form->addControl("company")->type("text");
$form->addControl("siret")->type("text");
$form->addControl("ape")->type("text");
$form->addControl("firstname")->type("text");
$form->addControl("lastname")->type("text");
$form->addControl("email")->type("text");
$form->addControl("passwd")->type("text");
$form->addControl("last_passwd_gen")->type("text")
->value("CURRENT_TIMESTAMP");
$form->addControl("birthday")->type("date3");
$form->addControl("newsletter")->type("text")
->value("0");
$form->addControl("ip_registration_newsletter")->type("text");
$form->addControl("newsletter_date_add")->type("date6");
$form->addControl("optin")->type("text")
->value("0");
$form->addControl("website")->type("text");
$form->addControl("outstanding_allow_amount")->type("text")
->value("0.000000");
$form->addControl("show_public_prices")->type("text")
->value("0");
$form->addControl("max_payment_days")->type("text")
->value("60");
$form->addControl("secure_key")->type("text")
->value("-1");
$form->addControl("note")->type("message");
$form->addControl("active")->type("text")
->value("0");
$form->addControl("is_guest")->type("text")
->value("0");
$form->addControl("deleted")->type("text")
->value("0");
$form->addControl("date_add")->type("date6");
$form->addControl("date_upd")->type("date6");


$form->display();

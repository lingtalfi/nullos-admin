<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_employee", ['id_employee']);



$form->labels = [
    "id_employee" => "id employee",
    "id_profile" => "id profile",
    "id_lang" => "id lang",
    "lastname" => "lastname",
    "firstname" => "firstname",
    "email" => "email",
    "passwd" => "passwd",
    "last_passwd_gen" => "last passwd gen",
    "stats_date_from" => "stats date from",
    "stats_date_to" => "stats date to",
    "stats_compare_from" => "stats compare from",
    "stats_compare_to" => "stats compare to",
    "stats_compare_option" => "stats compare option",
    "preselect_date_range" => "preselect date range",
    "bo_color" => "bo color",
    "bo_theme" => "bo theme",
    "bo_css" => "bo css",
    "default_tab" => "default tab",
    "bo_width" => "bo width",
    "bo_menu" => "bo menu",
    "active" => "active",
    "optin" => "optin",
    "id_last_order" => "id last order",
    "id_last_customer_message" => "id last customer message",
    "id_last_customer" => "id last customer",
    "last_connection_date" => "last connection date",
];


$form->title = "Ps employee";


$form->addControl("id_profile")->type("text")
->value(0);
$form->addControl("id_lang")->type("text")
->value("0");
$form->addControl("lastname")->type("text");
$form->addControl("firstname")->type("text");
$form->addControl("email")->type("text");
$form->addControl("passwd")->type("text");
$form->addControl("last_passwd_gen")->type("text")
->value("CURRENT_TIMESTAMP");
$form->addControl("stats_date_from")->type("date3");
$form->addControl("stats_date_to")->type("date3");
$form->addControl("stats_compare_from")->type("date3");
$form->addControl("stats_compare_to")->type("date3");
$form->addControl("stats_compare_option")->type("text")
->value("1");
$form->addControl("preselect_date_range")->type("text");
$form->addControl("bo_color")->type("text");
$form->addControl("bo_theme")->type("text");
$form->addControl("bo_css")->type("text");
$form->addControl("default_tab")->type("text")
->value("0");
$form->addControl("bo_width")->type("text")
->value("0");
$form->addControl("bo_menu")->type("text")
->value("1");
$form->addControl("active")->type("text")
->value("0");
$form->addControl("optin")->type("text")
->value("1");
$form->addControl("id_last_order")->type("text")
->value("0");
$form->addControl("id_last_customer_message")->type("text")
->value("0");
$form->addControl("id_last_customer")->type("text")
->value("0");
$form->addControl("last_connection_date")->type("date3")
->value("0000-00-00");


$form->display();

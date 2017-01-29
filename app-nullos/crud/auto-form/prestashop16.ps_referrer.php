<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_referrer", ['id_referrer']);



$form->labels = [
    "id_referrer" => "id referrer",
    "name" => "name",
    "passwd" => "passwd",
    "http_referer_regexp" => "http referer regexp",
    "http_referer_like" => "http referer like",
    "request_uri_regexp" => "request uri regexp",
    "request_uri_like" => "request uri like",
    "http_referer_regexp_not" => "http referer regexp not",
    "http_referer_like_not" => "http referer like not",
    "request_uri_regexp_not" => "request uri regexp not",
    "request_uri_like_not" => "request uri like not",
    "base_fee" => "base fee",
    "percent_fee" => "percent fee",
    "click_fee" => "click fee",
    "date_add" => "date add",
];


$form->title = "Ps referrer";


$form->addControl("name")->type("text");
$form->addControl("passwd")->type("text");
$form->addControl("http_referer_regexp")->type("text");
$form->addControl("http_referer_like")->type("text");
$form->addControl("request_uri_regexp")->type("text");
$form->addControl("request_uri_like")->type("text");
$form->addControl("http_referer_regexp_not")->type("text");
$form->addControl("http_referer_like_not")->type("text");
$form->addControl("request_uri_regexp_not")->type("text");
$form->addControl("request_uri_like_not")->type("text");
$form->addControl("base_fee")->type("text")
->value("0.00");
$form->addControl("percent_fee")->type("text")
->value("0.00");
$form->addControl("click_fee")->type("text")
->value("0.00");
$form->addControl("date_add")->type("date6");


$form->display();

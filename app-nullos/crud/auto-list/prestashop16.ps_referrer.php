<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_referrer,
name,
passwd,
http_referer_regexp,
http_referer_like,
request_uri_regexp,
request_uri_like,
http_referer_regexp_not,
http_referer_like_not,
request_uri_regexp_not,
request_uri_like_not,
base_fee,
percent_fee,
click_fee,
date_add
';


$query = "select
%s
from prestashop16.ps_referrer
";


$table = CrudModule::getDataTable("prestashop16.ps_referrer", $query, $fields, ['id_referrer']);

$table->title = "Ps referrer";


$table->columnLabels= [
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


$table->hiddenColumns = [
    "id_referrer",
];


$table->displayTable();

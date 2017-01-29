<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_customer,
id_shop_group,
id_shop,
id_gender,
id_default_group,
id_lang,
id_risk,
company,
siret,
ape,
firstname,
lastname,
email,
passwd,
last_passwd_gen,
birthday,
newsletter,
ip_registration_newsletter,
newsletter_date_add,
optin,
website,
outstanding_allow_amount,
show_public_prices,
max_payment_days,
secure_key,
note,
active,
is_guest,
deleted,
date_add,
date_upd
';


$query = "select
%s
from prestashop16.ps_customer
";


$table = CrudModule::getDataTable("prestashop16.ps_customer", $query, $fields, ['id_customer']);

$table->title = "Ps customer";


$table->columnLabels= [
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


$table->hiddenColumns = [
    "id_customer",
];


$n = 30;
$table->setTransformer('note', function ($v) use ($n) {
    return substr($v, 0, $n) . '...';
});


$table->displayTable();

<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_customer_thread,
id_shop,
id_lang,
id_contact,
id_customer,
id_order,
id_product,
status,
email,
token,
date_add,
date_upd
';


$query = "select
%s
from prestashop16.ps_customer_thread
";


$table = CrudModule::getDataTable("prestashop16.ps_customer_thread", $query, $fields, ['id_customer_thread']);

$table->title = "Ps customer thread";


$table->columnLabels= [
    "id_customer_thread" => "id customer thread",
    "id_shop" => "id shop",
    "id_lang" => "id lang",
    "id_contact" => "id contact",
    "id_customer" => "id customer",
    "id_order" => "id order",
    "id_product" => "id product",
    "status" => "status",
    "email" => "email",
    "token" => "token",
    "date_add" => "date add",
    "date_upd" => "date upd",
];


$table->hiddenColumns = [
    "id_customer_thread",
];


$table->displayTable();

<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_employee,
id_profile,
id_lang,
lastname,
firstname,
email,
passwd,
last_passwd_gen,
stats_date_from,
stats_date_to,
stats_compare_from,
stats_compare_to,
stats_compare_option,
preselect_date_range,
bo_color,
bo_theme,
bo_css,
default_tab,
bo_width,
bo_menu,
active,
optin,
id_last_order,
id_last_customer_message,
id_last_customer,
last_connection_date
';


$query = "select
%s
from prestashop16.ps_employee
";


$table = CrudModule::getDataTable("prestashop16.ps_employee", $query, $fields, ['id_employee']);

$table->title = "Ps employee";


$table->columnLabels= [
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


$table->hiddenColumns = [
    "id_employee",
];


$table->displayTable();

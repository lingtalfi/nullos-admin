<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_cart_rule,
id_country
';


$query = "select
%s
from prestashop16.ps_cart_rule_country
";


$table = CrudModule::getDataTable("prestashop16.ps_cart_rule_country", $query, $fields, ['id_cart_rule', 'id_country']);

$table->title = "Ps cart rule country";


$table->columnLabels= [
    "id_cart_rule" => "id cart rule",
    "id_country" => "id country",
];


$table->displayTable();

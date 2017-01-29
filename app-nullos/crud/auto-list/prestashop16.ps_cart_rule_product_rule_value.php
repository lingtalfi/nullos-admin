<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_product_rule,
id_item
';


$query = "select
%s
from prestashop16.ps_cart_rule_product_rule_value
";


$table = CrudModule::getDataTable("prestashop16.ps_cart_rule_product_rule_value", $query, $fields, ['id_product_rule', 'id_item']);

$table->title = "Ps cart rule product rule value";


$table->columnLabels= [
    "id_product_rule" => "id product rule",
    "id_item" => "id item",
];


$table->displayTable();

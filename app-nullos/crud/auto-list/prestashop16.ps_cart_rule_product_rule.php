<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_product_rule,
id_product_rule_group,
type
';


$query = "select
%s
from prestashop16.ps_cart_rule_product_rule
";


$table = CrudModule::getDataTable("prestashop16.ps_cart_rule_product_rule", $query, $fields, ['id_product_rule']);

$table->title = "Ps cart rule product rule";


$table->columnLabels= [
    "id_product_rule" => "id product rule",
    "id_product_rule_group" => "id product rule group",
    "type" => "type",
];


$table->hiddenColumns = [
    "id_product_rule",
];


$table->displayTable();

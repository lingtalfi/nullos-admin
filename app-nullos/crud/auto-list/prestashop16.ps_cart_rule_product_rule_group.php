<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_product_rule_group,
id_cart_rule,
quantity
';


$query = "select
%s
from prestashop16.ps_cart_rule_product_rule_group
";


$table = CrudModule::getDataTable("prestashop16.ps_cart_rule_product_rule_group", $query, $fields, ['id_product_rule_group']);

$table->title = "Ps cart rule product rule group";


$table->columnLabels= [
    "id_product_rule_group" => "id product rule group",
    "id_cart_rule" => "id cart rule",
    "quantity" => "quantity",
];


$table->hiddenColumns = [
    "id_product_rule_group",
];


$table->displayTable();

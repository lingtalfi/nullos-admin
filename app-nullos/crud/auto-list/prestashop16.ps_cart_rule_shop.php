<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_cart_rule,
id_shop
';


$query = "select
%s
from prestashop16.ps_cart_rule_shop
";


$table = CrudModule::getDataTable("prestashop16.ps_cart_rule_shop", $query, $fields, ['id_cart_rule', 'id_shop']);

$table->title = "Ps cart rule shop";


$table->columnLabels= [
    "id_cart_rule" => "id cart rule",
    "id_shop" => "id shop",
];


$table->displayTable();

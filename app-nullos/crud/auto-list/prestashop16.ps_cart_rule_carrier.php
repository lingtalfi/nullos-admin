<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_cart_rule,
id_carrier
';


$query = "select
%s
from prestashop16.ps_cart_rule_carrier
";


$table = CrudModule::getDataTable("prestashop16.ps_cart_rule_carrier", $query, $fields, ['id_cart_rule', 'id_carrier']);

$table->title = "Ps cart rule carrier";


$table->columnLabels= [
    "id_cart_rule" => "id cart rule",
    "id_carrier" => "id carrier",
];


$table->displayTable();

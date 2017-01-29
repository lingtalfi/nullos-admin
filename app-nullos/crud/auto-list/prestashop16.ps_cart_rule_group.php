<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_cart_rule,
id_group
';


$query = "select
%s
from prestashop16.ps_cart_rule_group
";


$table = CrudModule::getDataTable("prestashop16.ps_cart_rule_group", $query, $fields, ['id_cart_rule', 'id_group']);

$table->title = "Ps cart rule group";


$table->columnLabels= [
    "id_cart_rule" => "id cart rule",
    "id_group" => "id group",
];


$table->displayTable();

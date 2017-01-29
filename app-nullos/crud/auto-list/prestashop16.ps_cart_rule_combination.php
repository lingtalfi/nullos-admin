<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_cart_rule_1,
id_cart_rule_2
';


$query = "select
%s
from prestashop16.ps_cart_rule_combination
";


$table = CrudModule::getDataTable("prestashop16.ps_cart_rule_combination", $query, $fields, ['id_cart_rule_1', 'id_cart_rule_2']);

$table->title = "Ps cart rule combination";


$table->columnLabels= [
    "id_cart_rule_1" => "id cart rule 1",
    "id_cart_rule_2" => "id cart rule 2",
];


$table->displayTable();

<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_specific_price_rule_condition_group,
id_specific_price_rule
';


$query = "select
%s
from prestashop16.ps_specific_price_rule_condition_group
";


$table = CrudModule::getDataTable("prestashop16.ps_specific_price_rule_condition_group", $query, $fields, ['id_specific_price_rule_condition_group', 'id_specific_price_rule']);

$table->title = "Ps specific price rule condition group";


$table->columnLabels= [
    "id_specific_price_rule_condition_group" => "id specific price rule condition group",
    "id_specific_price_rule" => "id specific price rule",
];


$table->hiddenColumns = [
    "id_specific_price_rule_condition_group",
];


$table->displayTable();

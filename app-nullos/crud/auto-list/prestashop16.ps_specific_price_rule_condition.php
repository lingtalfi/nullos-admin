<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_specific_price_rule_condition,
id_specific_price_rule_condition_group,
type,
value
';


$query = "select
%s
from prestashop16.ps_specific_price_rule_condition
";


$table = CrudModule::getDataTable("prestashop16.ps_specific_price_rule_condition", $query, $fields, ['id_specific_price_rule_condition']);

$table->title = "Ps specific price rule condition";


$table->columnLabels= [
    "id_specific_price_rule_condition" => "id specific price rule condition",
    "id_specific_price_rule_condition_group" => "id specific price rule condition group",
    "type" => "type",
    "value" => "value",
];


$table->hiddenColumns = [
    "id_specific_price_rule_condition",
];


$table->displayTable();

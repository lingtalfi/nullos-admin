<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_tax_rule,
id_tax_rules_group,
id_country,
id_state,
zipcode_from,
zipcode_to,
id_tax,
behavior,
description
';


$query = "select
%s
from prestashop16.ps_tax_rule
";


$table = CrudModule::getDataTable("prestashop16.ps_tax_rule", $query, $fields, ['id_tax_rule']);

$table->title = "Ps tax rule";


$table->columnLabels= [
    "id_tax_rule" => "id tax rule",
    "id_tax_rules_group" => "id tax rules group",
    "id_country" => "id country",
    "id_state" => "id state",
    "zipcode_from" => "zipcode from",
    "zipcode_to" => "zipcode to",
    "id_tax" => "id tax",
    "behavior" => "behavior",
    "description" => "description",
];


$table->hiddenColumns = [
    "id_tax_rule",
];


$table->displayTable();

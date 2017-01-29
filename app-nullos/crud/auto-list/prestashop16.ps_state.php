<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_state,
id_country,
id_zone,
name,
iso_code,
tax_behavior,
active
';


$query = "select
%s
from prestashop16.ps_state
";


$table = CrudModule::getDataTable("prestashop16.ps_state", $query, $fields, ['id_state']);

$table->title = "Ps state";


$table->columnLabels= [
    "id_state" => "id state",
    "id_country" => "id country",
    "id_zone" => "id zone",
    "name" => "name",
    "iso_code" => "iso code",
    "tax_behavior" => "tax behavior",
    "active" => "active",
];


$table->hiddenColumns = [
    "id_state",
];


$table->displayTable();

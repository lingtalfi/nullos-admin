<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_risk,
percent,
color
';


$query = "select
%s
from prestashop16.ps_risk
";


$table = CrudModule::getDataTable("prestashop16.ps_risk", $query, $fields, ['id_risk']);

$table->title = "Ps risk";


$table->columnLabels= [
    "id_risk" => "id risk",
    "percent" => "percent",
    "color" => "color",
];


$table->hiddenColumns = [
    "id_risk",
];


$table->displayTable();

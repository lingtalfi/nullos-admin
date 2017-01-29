<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_badge,
id_ps_badge,
type,
id_group,
group_position,
scoring,
awb,
validated
';


$query = "select
%s
from prestashop16.ps_badge
";


$table = CrudModule::getDataTable("prestashop16.ps_badge", $query, $fields, ['id_badge']);

$table->title = "Ps badge";


$table->columnLabels= [
    "id_badge" => "id badge",
    "id_ps_badge" => "id ps badge",
    "type" => "type",
    "id_group" => "id group",
    "group_position" => "group position",
    "scoring" => "scoring",
    "awb" => "awb",
    "validated" => "validated",
];


$table->hiddenColumns = [
    "id_badge",
];


$table->displayTable();

<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_tax_rules_group,
name,
active,
deleted,
date_add,
date_upd
';


$query = "select
%s
from prestashop16.ps_tax_rules_group
";


$table = CrudModule::getDataTable("prestashop16.ps_tax_rules_group", $query, $fields, ['id_tax_rules_group']);

$table->title = "Ps tax rules group";


$table->columnLabels= [
    "id_tax_rules_group" => "id tax rules group",
    "name" => "name",
    "active" => "active",
    "deleted" => "deleted",
    "date_add" => "date add",
    "date_upd" => "date upd",
];


$table->hiddenColumns = [
    "id_tax_rules_group",
];


$table->displayTable();

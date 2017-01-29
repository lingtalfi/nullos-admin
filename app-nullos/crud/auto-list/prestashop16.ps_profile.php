<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_profile
';


$query = "select
%s
from prestashop16.ps_profile
";


$table = CrudModule::getDataTable("prestashop16.ps_profile", $query, $fields, ['id_profile']);

$table->title = "Ps profile";


$table->columnLabels= [
    "id_profile" => "id profile",
];


$table->hiddenColumns = [
    "id_profile",
];


$table->displayTable();

<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_group,
id_lang,
name
';


$query = "select
%s
from prestashop16.ps_group_lang
";


$table = CrudModule::getDataTable("prestashop16.ps_group_lang", $query, $fields, ['id_group', 'id_lang']);

$table->title = "Ps group lang";


$table->columnLabels= [
    "id_group" => "id group",
    "id_lang" => "id lang",
    "name" => "name",
];


$table->displayTable();

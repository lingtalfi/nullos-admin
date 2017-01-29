<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_quick_access,
id_lang,
name
';


$query = "select
%s
from prestashop16.ps_quick_access_lang
";


$table = CrudModule::getDataTable("prestashop16.ps_quick_access_lang", $query, $fields, ['id_quick_access', 'id_lang']);

$table->title = "Ps quick access lang";


$table->columnLabels= [
    "id_quick_access" => "id quick access",
    "id_lang" => "id lang",
    "name" => "name",
];


$table->displayTable();

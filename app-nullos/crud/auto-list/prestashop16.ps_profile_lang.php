<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_lang,
id_profile,
name
';


$query = "select
%s
from prestashop16.ps_profile_lang
";


$table = CrudModule::getDataTable("prestashop16.ps_profile_lang", $query, $fields, ['id_profile', 'id_lang']);

$table->title = "Ps profile lang";


$table->columnLabels= [
    "id_lang" => "id lang",
    "id_profile" => "id profile",
    "name" => "name",
];


$table->displayTable();

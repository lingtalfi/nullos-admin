<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_gender,
id_lang,
name
';


$query = "select
%s
from prestashop16.ps_gender_lang
";


$table = CrudModule::getDataTable("prestashop16.ps_gender_lang", $query, $fields, ['id_gender', 'id_lang']);

$table->title = "Ps gender lang";


$table->columnLabels= [
    "id_gender" => "id gender",
    "id_lang" => "id lang",
    "name" => "name",
];


$table->displayTable();

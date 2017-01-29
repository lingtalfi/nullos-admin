<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_feature,
id_lang,
name
';


$query = "select
%s
from prestashop16.ps_feature_lang
";


$table = CrudModule::getDataTable("prestashop16.ps_feature_lang", $query, $fields, ['id_feature', 'id_lang']);

$table->title = "Ps feature lang";


$table->columnLabels= [
    "id_feature" => "id feature",
    "id_lang" => "id lang",
    "name" => "name",
];


$table->displayTable();

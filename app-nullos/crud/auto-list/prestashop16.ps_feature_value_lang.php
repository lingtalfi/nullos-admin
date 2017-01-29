<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_feature_value,
id_lang,
value
';


$query = "select
%s
from prestashop16.ps_feature_value_lang
";


$table = CrudModule::getDataTable("prestashop16.ps_feature_value_lang", $query, $fields, ['id_feature_value', 'id_lang']);

$table->title = "Ps feature value lang";


$table->columnLabels= [
    "id_feature_value" => "id feature value",
    "id_lang" => "id lang",
    "value" => "value",
];


$table->displayTable();

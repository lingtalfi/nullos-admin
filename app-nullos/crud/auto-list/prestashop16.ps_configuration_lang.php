<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_configuration,
id_lang,
value,
date_upd
';


$query = "select
%s
from prestashop16.ps_configuration_lang
";


$table = CrudModule::getDataTable("prestashop16.ps_configuration_lang", $query, $fields, ['id_configuration', 'id_lang']);

$table->title = "Ps configuration lang";


$table->columnLabels= [
    "id_configuration" => "id configuration",
    "id_lang" => "id lang",
    "value" => "value",
    "date_upd" => "date upd",
];


$n = 30;
$table->setTransformer('value', function ($v) use ($n) {
    return substr($v, 0, $n) . '...';
});


$table->displayTable();

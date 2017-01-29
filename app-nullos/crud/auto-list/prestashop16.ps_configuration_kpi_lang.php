<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_configuration_kpi,
id_lang,
value,
date_upd
';


$query = "select
%s
from prestashop16.ps_configuration_kpi_lang
";


$table = CrudModule::getDataTable("prestashop16.ps_configuration_kpi_lang", $query, $fields, ['id_configuration_kpi', 'id_lang']);

$table->title = "Ps configuration kpi lang";


$table->columnLabels= [
    "id_configuration_kpi" => "id configuration kpi",
    "id_lang" => "id lang",
    "value" => "value",
    "date_upd" => "date upd",
];


$n = 30;
$table->setTransformer('value', function ($v) use ($n) {
    return substr($v, 0, $n) . '...';
});


$table->displayTable();

<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_risk,
id_lang,
name
';


$query = "select
%s
from prestashop16.ps_risk_lang
";


$table = CrudModule::getDataTable("prestashop16.ps_risk_lang", $query, $fields, ['id_risk', 'id_lang']);

$table->title = "Ps risk lang";


$table->columnLabels= [
    "id_risk" => "id risk",
    "id_lang" => "id lang",
    "name" => "name",
];


$table->displayTable();

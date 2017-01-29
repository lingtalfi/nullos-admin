<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_tax,
id_lang,
name
';


$query = "select
%s
from prestashop16.ps_tax_lang
";


$table = CrudModule::getDataTable("prestashop16.ps_tax_lang", $query, $fields, ['id_tax', 'id_lang']);

$table->title = "Ps tax lang";


$table->columnLabels= [
    "id_tax" => "id tax",
    "id_lang" => "id lang",
    "name" => "name",
];


$table->displayTable();

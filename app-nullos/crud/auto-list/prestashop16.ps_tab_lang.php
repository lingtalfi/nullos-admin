<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_tab,
id_lang,
name
';


$query = "select
%s
from prestashop16.ps_tab_lang
";


$table = CrudModule::getDataTable("prestashop16.ps_tab_lang", $query, $fields, ['id_tab', 'id_lang']);

$table->title = "Ps tab lang";


$table->columnLabels= [
    "id_tab" => "id tab",
    "id_lang" => "id lang",
    "name" => "name",
];


$table->displayTable();

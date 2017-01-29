<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_country,
id_lang,
name
';


$query = "select
%s
from prestashop16.ps_country_lang
";


$table = CrudModule::getDataTable("prestashop16.ps_country_lang", $query, $fields, ['id_country', 'id_lang']);

$table->title = "Ps country lang";


$table->columnLabels= [
    "id_country" => "id country",
    "id_lang" => "id lang",
    "name" => "name",
];


$table->displayTable();

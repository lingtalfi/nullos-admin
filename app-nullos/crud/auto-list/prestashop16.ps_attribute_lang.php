<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_attribute,
id_lang,
name
';


$query = "select
%s
from prestashop16.ps_attribute_lang
";


$table = CrudModule::getDataTable("prestashop16.ps_attribute_lang", $query, $fields, ['id_attribute', 'id_lang']);

$table->title = "Ps attribute lang";


$table->columnLabels= [
    "id_attribute" => "id attribute",
    "id_lang" => "id lang",
    "name" => "name",
];


$table->displayTable();

<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_attribute_group,
id_lang,
name,
public_name
';


$query = "select
%s
from prestashop16.ps_attribute_group_lang
";


$table = CrudModule::getDataTable("prestashop16.ps_attribute_group_lang", $query, $fields, ['id_attribute_group', 'id_lang']);

$table->title = "Ps attribute group lang";


$table->columnLabels= [
    "id_attribute_group" => "id attribute group",
    "id_lang" => "id lang",
    "name" => "name",
    "public_name" => "public name",
];


$table->displayTable();

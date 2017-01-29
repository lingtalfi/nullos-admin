<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_customization_field,
id_lang,
id_shop,
name
';


$query = "select
%s
from prestashop16.ps_customization_field_lang
";


$table = CrudModule::getDataTable("prestashop16.ps_customization_field_lang", $query, $fields, ['id_customization_field', 'id_lang', 'id_shop']);

$table->title = "Ps customization field lang";


$table->columnLabels= [
    "id_customization_field" => "id customization field",
    "id_lang" => "id lang",
    "id_shop" => "id shop",
    "name" => "name",
];


$table->displayTable();

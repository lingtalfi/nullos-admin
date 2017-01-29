<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_tag,
id_lang,
name
';


$query = "select
%s
from prestashop16.ps_tag
";


$table = CrudModule::getDataTable("prestashop16.ps_tag", $query, $fields, ['id_tag']);

$table->title = "Ps tag";


$table->columnLabels= [
    "id_tag" => "id tag",
    "id_lang" => "id lang",
    "name" => "name",
];


$table->hiddenColumns = [
    "id_tag",
];


$table->displayTable();

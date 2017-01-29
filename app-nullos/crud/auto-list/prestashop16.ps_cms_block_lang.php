<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_cms_block,
id_lang,
name
';


$query = "select
%s
from prestashop16.ps_cms_block_lang
";


$table = CrudModule::getDataTable("prestashop16.ps_cms_block_lang", $query, $fields, ['id_cms_block', 'id_lang']);

$table->title = "Ps cms block lang";


$table->columnLabels= [
    "id_cms_block" => "id cms block",
    "id_lang" => "id lang",
    "name" => "name",
];


$table->displayTable();

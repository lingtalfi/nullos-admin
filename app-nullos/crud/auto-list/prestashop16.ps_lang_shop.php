<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_lang,
id_shop
';


$query = "select
%s
from prestashop16.ps_lang_shop
";


$table = CrudModule::getDataTable("prestashop16.ps_lang_shop", $query, $fields, ['id_lang', 'id_shop']);

$table->title = "Ps lang shop";


$table->columnLabels= [
    "id_lang" => "id lang",
    "id_shop" => "id shop",
];


$table->displayTable();

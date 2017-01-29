<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_word,
id_shop,
id_lang,
word
';


$query = "select
%s
from prestashop16.ps_search_word
";


$table = CrudModule::getDataTable("prestashop16.ps_search_word", $query, $fields, ['id_word']);

$table->title = "Ps search word";


$table->columnLabels= [
    "id_word" => "id word",
    "id_shop" => "id shop",
    "id_lang" => "id lang",
    "word" => "word",
];


$table->hiddenColumns = [
    "id_word",
];


$table->displayTable();

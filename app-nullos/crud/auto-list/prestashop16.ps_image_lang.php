<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_image,
id_lang,
legend
';


$query = "select
%s
from prestashop16.ps_image_lang
";


$table = CrudModule::getDataTable("prestashop16.ps_image_lang", $query, $fields, ['id_image', 'id_lang']);

$table->title = "Ps image lang";


$table->columnLabels= [
    "id_image" => "id image",
    "id_lang" => "id lang",
    "legend" => "legend",
];


$table->displayTable();

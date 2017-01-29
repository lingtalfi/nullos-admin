<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_manufacturer,
id_lang,
description,
short_description,
meta_title,
meta_keywords,
meta_description
';


$query = "select
%s
from prestashop16.ps_manufacturer_lang
";


$table = CrudModule::getDataTable("prestashop16.ps_manufacturer_lang", $query, $fields, ['id_manufacturer', 'id_lang']);

$table->title = "Ps manufacturer lang";


$table->columnLabels= [
    "id_manufacturer" => "id manufacturer",
    "id_lang" => "id lang",
    "description" => "description",
    "short_description" => "short description",
    "meta_title" => "meta title",
    "meta_keywords" => "meta keywords",
    "meta_description" => "meta description",
];


$n = 30;
$table->setTransformer('description', function ($v) use ($n) {
    return substr($v, 0, $n) . '...';
});
$table->setTransformer('short_description', function ($v) use ($n) {
    return substr($v, 0, $n) . '...';
});


$table->displayTable();

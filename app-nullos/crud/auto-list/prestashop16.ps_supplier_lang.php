<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_supplier,
id_lang,
description,
meta_title,
meta_keywords,
meta_description
';


$query = "select
%s
from prestashop16.ps_supplier_lang
";


$table = CrudModule::getDataTable("prestashop16.ps_supplier_lang", $query, $fields, ['id_supplier', 'id_lang']);

$table->title = "Ps supplier lang";


$table->columnLabels= [
    "id_supplier" => "id supplier",
    "id_lang" => "id lang",
    "description" => "description",
    "meta_title" => "meta title",
    "meta_keywords" => "meta keywords",
    "meta_description" => "meta description",
];


$n = 30;
$table->setTransformer('description', function ($v) use ($n) {
    return substr($v, 0, $n) . '...';
});


$table->displayTable();

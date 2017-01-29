<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_attachment,
id_lang,
name,
description
';


$query = "select
%s
from prestashop16.ps_attachment_lang
";


$table = CrudModule::getDataTable("prestashop16.ps_attachment_lang", $query, $fields, ['id_attachment', 'id_lang']);

$table->title = "Ps attachment lang";


$table->columnLabels= [
    "id_attachment" => "id attachment",
    "id_lang" => "id lang",
    "name" => "name",
    "description" => "description",
];


$table->hiddenColumns = [
    "id_attachment",
];


$n = 30;
$table->setTransformer('description', function ($v) use ($n) {
    return substr($v, 0, $n) . '...';
});


$table->displayTable();

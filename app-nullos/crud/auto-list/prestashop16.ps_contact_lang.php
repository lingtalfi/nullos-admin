<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_contact,
id_lang,
name,
description
';


$query = "select
%s
from prestashop16.ps_contact_lang
";


$table = CrudModule::getDataTable("prestashop16.ps_contact_lang", $query, $fields, ['id_contact', 'id_lang']);

$table->title = "Ps contact lang";


$table->columnLabels= [
    "id_contact" => "id contact",
    "id_lang" => "id lang",
    "name" => "name",
    "description" => "description",
];


$n = 30;
$table->setTransformer('description', function ($v) use ($n) {
    return substr($v, 0, $n) . '...';
});


$table->displayTable();

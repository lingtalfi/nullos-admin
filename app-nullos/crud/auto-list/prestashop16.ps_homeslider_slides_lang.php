<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_homeslider_slides,
id_lang,
title,
description,
legend,
url,
image
';


$query = "select
%s
from prestashop16.ps_homeslider_slides_lang
";


$table = CrudModule::getDataTable("prestashop16.ps_homeslider_slides_lang", $query, $fields, ['id_homeslider_slides', 'id_lang']);

$table->title = "Ps homeslider slides lang";


$table->columnLabels= [
    "id_homeslider_slides" => "id homeslider slides",
    "id_lang" => "id lang",
    "title" => "title",
    "description" => "description",
    "legend" => "legend",
    "url" => "url",
    "image" => "image",
];


$n = 30;
$table->setTransformer('description', function ($v) use ($n) {
    return substr($v, 0, $n) . '...';
});


$table->displayTable();

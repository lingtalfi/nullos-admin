<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_hook,
name,
title,
description,
position,
live_edit
';


$query = "select
%s
from prestashop16.ps_hook
";


$table = CrudModule::getDataTable("prestashop16.ps_hook", $query, $fields, ['id_hook']);

$table->title = "Ps hook";


$table->columnLabels= [
    "id_hook" => "id hook",
    "name" => "name",
    "title" => "title",
    "description" => "description",
    "position" => "position",
    "live_edit" => "live edit",
];


$table->hiddenColumns = [
    "id_hook",
];


$n = 30;
$table->setTransformer('description', function ($v) use ($n) {
    return substr($v, 0, $n) . '...';
});


$table->displayTable();

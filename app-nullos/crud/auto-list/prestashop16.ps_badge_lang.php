<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_badge,
id_lang,
name,
description,
group_name
';


$query = "select
%s
from prestashop16.ps_badge_lang
";


$table = CrudModule::getDataTable("prestashop16.ps_badge_lang", $query, $fields, ['id_badge', 'id_lang']);

$table->title = "Ps badge lang";


$table->columnLabels= [
    "id_badge" => "id badge",
    "id_lang" => "id lang",
    "name" => "name",
    "description" => "description",
    "group_name" => "group name",
];


$table->displayTable();

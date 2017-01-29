<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_group,
id_tag,
id_lang,
id_shop,
counter
';


$query = "select
%s
from prestashop16.ps_tag_count
";


$table = CrudModule::getDataTable("prestashop16.ps_tag_count", $query, $fields, ['id_group', 'id_tag']);

$table->title = "Ps tag count";


$table->columnLabels= [
    "id_group" => "id group",
    "id_tag" => "id tag",
    "id_lang" => "id lang",
    "id_shop" => "id shop",
    "counter" => "counter",
];


$table->displayTable();

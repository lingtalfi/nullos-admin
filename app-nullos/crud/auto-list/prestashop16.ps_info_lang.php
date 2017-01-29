<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_info,
id_lang,
text
';


$query = "select
%s
from prestashop16.ps_info_lang
";


$table = CrudModule::getDataTable("prestashop16.ps_info_lang", $query, $fields, ['id_info', 'id_lang']);

$table->title = "Ps info lang";


$table->columnLabels= [
    "id_info" => "id info",
    "id_lang" => "id lang",
    "text" => "text",
];


$n = 30;
$table->setTransformer('text', function ($v) use ($n) {
    return substr($v, 0, $n) . '...';
});


$table->displayTable();

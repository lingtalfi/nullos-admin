<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_advice,
id_lang,
html
';


$query = "select
%s
from prestashop16.ps_advice_lang
";


$table = CrudModule::getDataTable("prestashop16.ps_advice_lang", $query, $fields, ['id_advice', 'id_lang']);

$table->title = "Ps advice lang";


$table->columnLabels= [
    "id_advice" => "id advice",
    "id_lang" => "id lang",
    "html" => "html",
];


$n = 30;
$table->setTransformer('html', function ($v) use ($n) {
    return substr($v, 0, $n) . '...';
});


$table->displayTable();

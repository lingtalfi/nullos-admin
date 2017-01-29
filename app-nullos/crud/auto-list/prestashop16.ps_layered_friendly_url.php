<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_layered_friendly_url,
url_key,
data,
id_lang
';


$query = "select
%s
from prestashop16.ps_layered_friendly_url
";


$table = CrudModule::getDataTable("prestashop16.ps_layered_friendly_url", $query, $fields, ['id_layered_friendly_url']);

$table->title = "Ps layered friendly url";


$table->columnLabels= [
    "id_layered_friendly_url" => "id layered friendly url",
    "url_key" => "url key",
    "data" => "data",
    "id_lang" => "id lang",
];


$table->hiddenColumns = [
    "id_layered_friendly_url",
];


$table->setTransformer('url_key', function ($v) {
    return '<a href="' . htmlspecialchars($v) . '">' . $v . '</a>';
});


$table->displayTable();

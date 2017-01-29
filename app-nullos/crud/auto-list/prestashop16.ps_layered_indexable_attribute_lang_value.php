<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_attribute,
id_lang,
url_name,
meta_title
';


$query = "select
%s
from prestashop16.ps_layered_indexable_attribute_lang_value
";


$table = CrudModule::getDataTable("prestashop16.ps_layered_indexable_attribute_lang_value", $query, $fields, ['id_attribute', 'id_lang']);

$table->title = "Ps layered indexable attribute lang value";


$table->columnLabels= [
    "id_attribute" => "id attribute",
    "id_lang" => "id lang",
    "url_name" => "url name",
    "meta_title" => "meta title",
];


$table->setTransformer('url_name', function ($v) {
    return '<a href="' . htmlspecialchars($v) . '">' . $v . '</a>';
});


$table->displayTable();

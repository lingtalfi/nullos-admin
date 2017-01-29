<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_feature_value,
id_lang,
url_name,
meta_title
';


$query = "select
%s
from prestashop16.ps_layered_indexable_feature_value_lang_value
";


$table = CrudModule::getDataTable("prestashop16.ps_layered_indexable_feature_value_lang_value", $query, $fields, ['id_feature_value', 'id_lang']);

$table->title = "Ps layered indexable feature value lang value";


$table->columnLabels= [
    "id_feature_value" => "id feature value",
    "id_lang" => "id lang",
    "url_name" => "url name",
    "meta_title" => "meta title",
];


$table->setTransformer('url_name', function ($v) {
    return '<a href="' . htmlspecialchars($v) . '">' . $v . '</a>';
});


$table->displayTable();

<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_meta,
id_shop,
id_lang,
title,
description,
keywords,
url_rewrite
';


$query = "select
%s
from prestashop16.ps_meta_lang
";


$table = CrudModule::getDataTable("prestashop16.ps_meta_lang", $query, $fields, ['id_meta', 'id_shop', 'id_lang']);

$table->title = "Ps meta lang";


$table->columnLabels= [
    "id_meta" => "id meta",
    "id_shop" => "id shop",
    "id_lang" => "id lang",
    "title" => "title",
    "description" => "description",
    "keywords" => "keywords",
    "url_rewrite" => "url rewrite",
];


$table->setTransformer('url_rewrite', function ($v) {
    return '<a href="' . htmlspecialchars($v) . '">' . $v . '</a>';
});


$table->displayTable();

<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_cms_category,
id_lang,
id_shop,
name,
description,
link_rewrite,
meta_title,
meta_keywords,
meta_description
';


$query = "select
%s
from prestashop16.ps_cms_category_lang
";


$table = CrudModule::getDataTable("prestashop16.ps_cms_category_lang", $query, $fields, ['id_cms_category', 'id_shop', 'id_lang']);

$table->title = "Ps cms category lang";


$table->columnLabels= [
    "id_cms_category" => "id cms category",
    "id_lang" => "id lang",
    "id_shop" => "id shop",
    "name" => "name",
    "description" => "description",
    "link_rewrite" => "link rewrite",
    "meta_title" => "meta title",
    "meta_keywords" => "meta keywords",
    "meta_description" => "meta description",
];


$n = 30;
$table->setTransformer('description', function ($v) use ($n) {
    return substr($v, 0, $n) . '...';
});


$table->displayTable();

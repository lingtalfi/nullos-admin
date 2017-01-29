<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_product,
id_shop,
id_lang,
description,
description_short,
link_rewrite,
meta_description,
meta_keywords,
meta_title,
name,
available_now,
available_later
';


$query = "select
%s
from prestashop16.ps_product_lang
";


$table = CrudModule::getDataTable("prestashop16.ps_product_lang", $query, $fields, ['id_product', 'id_shop', 'id_lang']);

$table->title = "Ps product lang";


$table->columnLabels= [
    "id_product" => "id product",
    "id_shop" => "id shop",
    "id_lang" => "id lang",
    "description" => "description",
    "description_short" => "description short",
    "link_rewrite" => "link rewrite",
    "meta_description" => "meta description",
    "meta_keywords" => "meta keywords",
    "meta_title" => "meta title",
    "name" => "name",
    "available_now" => "available now",
    "available_later" => "available later",
];


$n = 30;
$table->setTransformer('description', function ($v) use ($n) {
    return substr($v, 0, $n) . '...';
});
$table->setTransformer('description_short', function ($v) use ($n) {
    return substr($v, 0, $n) . '...';
});


$table->displayTable();

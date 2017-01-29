<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_cms,
id_lang,
id_shop,
meta_title,
meta_description,
meta_keywords,
content,
link_rewrite
';


$query = "select
%s
from prestashop16.ps_cms_lang
";


$table = CrudModule::getDataTable("prestashop16.ps_cms_lang", $query, $fields, ['id_cms', 'id_shop', 'id_lang']);

$table->title = "Ps cms lang";


$table->columnLabels= [
    "id_cms" => "id cms",
    "id_lang" => "id lang",
    "id_shop" => "id shop",
    "meta_title" => "meta title",
    "meta_description" => "meta description",
    "meta_keywords" => "meta keywords",
    "content" => "content",
    "link_rewrite" => "link rewrite",
];


$table->displayTable();

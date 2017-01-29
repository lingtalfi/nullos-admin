<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_item,
id_shop,
id_lang,
item_order,
title,
title_use,
hook,
url,
target,
image,
image_w,
image_h,
html,
active
';


$query = "select
%s
from prestashop16.ps_themeconfigurator
";


$table = CrudModule::getDataTable("prestashop16.ps_themeconfigurator", $query, $fields, ['id_item']);

$table->title = "Ps themeconfigurator";


$table->columnLabels= [
    "id_item" => "id item",
    "id_shop" => "id shop",
    "id_lang" => "id lang",
    "item_order" => "item order",
    "title" => "title",
    "title_use" => "title use",
    "hook" => "hook",
    "url" => "url",
    "target" => "target",
    "image" => "image",
    "image_w" => "image w",
    "image_h" => "image h",
    "html" => "html",
    "active" => "active",
];


$table->hiddenColumns = [
    "id_item",
];


$n = 30;
$table->setTransformer('url', function ($v) use ($n) {
    return substr($v, 0, $n) . '...';
});
$table->setTransformer('html', function ($v) use ($n) {
    return substr($v, 0, $n) . '...';
});


$table->displayTable();

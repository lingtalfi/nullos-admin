<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_product,
id_tag,
id_lang
';


$query = "select
%s
from prestashop16.ps_product_tag
";


$table = CrudModule::getDataTable("prestashop16.ps_product_tag", $query, $fields, ['id_product', 'id_tag']);

$table->title = "Ps product tag";


$table->columnLabels= [
    "id_product" => "id product",
    "id_tag" => "id tag",
    "id_lang" => "id lang",
];


$table->displayTable();

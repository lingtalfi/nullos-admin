<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_compare,
id_product,
date_add,
date_upd
';


$query = "select
%s
from prestashop16.ps_compare_product
";


$table = CrudModule::getDataTable("prestashop16.ps_compare_product", $query, $fields, ['id_compare', 'id_product']);

$table->title = "Ps compare product";


$table->columnLabels= [
    "id_compare" => "id compare",
    "id_product" => "id product",
    "date_add" => "date add",
    "date_upd" => "date upd",
];


$table->displayTable();

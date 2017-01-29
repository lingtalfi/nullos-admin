<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_category,
id_shop,
position
';


$query = "select
%s
from prestashop16.ps_category_shop
";


$table = CrudModule::getDataTable("prestashop16.ps_category_shop", $query, $fields, ['id_category', 'id_shop']);

$table->title = "Ps category shop";


$table->columnLabels= [
    "id_category" => "id category",
    "id_shop" => "id shop",
    "position" => "position",
];


$table->displayTable();

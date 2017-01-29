<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_cms_category,
id_shop
';


$query = "select
%s
from prestashop16.ps_cms_category_shop
";


$table = CrudModule::getDataTable("prestashop16.ps_cms_category_shop", $query, $fields, ['id_cms_category', 'id_shop']);

$table->title = "Ps cms category shop";


$table->columnLabels= [
    "id_cms_category" => "id cms category",
    "id_shop" => "id shop",
];


$table->hiddenColumns = [
    "id_cms_category",
];


$table->displayTable();

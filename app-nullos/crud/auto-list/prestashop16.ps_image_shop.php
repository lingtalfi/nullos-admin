<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_product,
id_image,
id_shop,
cover
';


$query = "select
%s
from prestashop16.ps_image_shop
";


$table = CrudModule::getDataTable("prestashop16.ps_image_shop", $query, $fields, ['id_image', 'id_shop']);

$table->title = "Ps image shop";


$table->columnLabels= [
    "id_product" => "id product",
    "id_image" => "id image",
    "id_shop" => "id shop",
    "cover" => "cover",
];


$table->displayTable();

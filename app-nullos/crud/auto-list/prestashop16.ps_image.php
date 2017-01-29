<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_image,
id_product,
position,
cover
';


$query = "select
%s
from prestashop16.ps_image
";


$table = CrudModule::getDataTable("prestashop16.ps_image", $query, $fields, ['id_image']);

$table->title = "Ps image";


$table->columnLabels= [
    "id_image" => "id image",
    "id_product" => "id product",
    "position" => "position",
    "cover" => "cover",
];


$table->hiddenColumns = [
    "id_image",
];


$table->displayTable();

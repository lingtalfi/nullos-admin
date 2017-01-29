<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_product_download,
id_product,
display_filename,
filename,
date_add,
date_expiration,
nb_days_accessible,
nb_downloadable,
active,
is_shareable
';


$query = "select
%s
from prestashop16.ps_product_download
";


$table = CrudModule::getDataTable("prestashop16.ps_product_download", $query, $fields, ['id_product_download']);

$table->title = "Ps product download";


$table->columnLabels= [
    "id_product_download" => "id product download",
    "id_product" => "id product",
    "display_filename" => "display filename",
    "filename" => "filename",
    "date_add" => "date add",
    "date_expiration" => "date expiration",
    "nb_days_accessible" => "nb days accessible",
    "nb_downloadable" => "nb downloadable",
    "active" => "active",
    "is_shareable" => "is shareable",
];


$table->hiddenColumns = [
    "id_product_download",
];


$table->displayTable();

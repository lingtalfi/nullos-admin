<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_product,
id_attachment
';


$query = "select
%s
from prestashop16.ps_product_attachment
";


$table = CrudModule::getDataTable("prestashop16.ps_product_attachment", $query, $fields, ['id_product', 'id_attachment']);

$table->title = "Ps product attachment";


$table->columnLabels= [
    "id_product" => "id product",
    "id_attachment" => "id attachment",
];


$table->displayTable();

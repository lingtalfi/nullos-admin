<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_order_return,
id_order_detail,
id_customization,
product_quantity
';


$query = "select
%s
from prestashop16.ps_order_return_detail
";


$table = CrudModule::getDataTable("prestashop16.ps_order_return_detail", $query, $fields, ['id_order_return', 'id_order_detail', 'id_customization']);

$table->title = "Ps order return detail";


$table->columnLabels= [
    "id_order_return" => "id order return",
    "id_order_detail" => "id order detail",
    "id_customization" => "id customization",
    "product_quantity" => "product quantity",
];


$table->displayTable();

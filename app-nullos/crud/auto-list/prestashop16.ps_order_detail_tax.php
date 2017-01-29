<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_order_detail,
id_tax,
unit_amount,
total_amount
';


$query = "select
%s
from prestashop16.ps_order_detail_tax
";


$table = CrudModule::getDataTable("prestashop16.ps_order_detail_tax", $query, $fields, ['id_order_detail', 'id_tax', 'unit_amount', 'total_amount']);

$table->title = "Ps order detail tax";


$table->columnLabels= [
    "id_order_detail" => "id order detail",
    "id_tax" => "id tax",
    "unit_amount" => "unit amount",
    "total_amount" => "total amount",
];


$table->displayTable();

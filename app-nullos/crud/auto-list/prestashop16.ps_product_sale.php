<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_product,
quantity,
sale_nbr,
date_upd
';


$query = "select
%s
from prestashop16.ps_product_sale
";


$table = CrudModule::getDataTable("prestashop16.ps_product_sale", $query, $fields, ['id_product']);

$table->title = "Ps product sale";


$table->columnLabels= [
    "id_product" => "id product",
    "quantity" => "quantity",
    "sale_nbr" => "sale nbr",
    "date_upd" => "date upd",
];


$table->displayTable();

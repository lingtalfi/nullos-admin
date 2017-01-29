<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_supplier,
id_shop
';


$query = "select
%s
from prestashop16.ps_supplier_shop
";


$table = CrudModule::getDataTable("prestashop16.ps_supplier_shop", $query, $fields, ['id_supplier', 'id_shop']);

$table->title = "Ps supplier shop";


$table->columnLabels= [
    "id_supplier" => "id supplier",
    "id_shop" => "id shop",
];


$table->displayTable();

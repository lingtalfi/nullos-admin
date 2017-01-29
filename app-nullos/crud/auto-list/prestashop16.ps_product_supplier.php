<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_product_supplier,
id_product,
id_product_attribute,
id_supplier,
product_supplier_reference,
product_supplier_price_te,
id_currency
';


$query = "select
%s
from prestashop16.ps_product_supplier
";


$table = CrudModule::getDataTable("prestashop16.ps_product_supplier", $query, $fields, ['id_product_supplier']);

$table->title = "Ps product supplier";


$table->columnLabels= [
    "id_product_supplier" => "id product supplier",
    "id_product" => "id product",
    "id_product_attribute" => "id product attribute",
    "id_supplier" => "id supplier",
    "product_supplier_reference" => "product supplier reference",
    "product_supplier_price_te" => "product supplier price te",
    "id_currency" => "id currency",
];


$table->hiddenColumns = [
    "id_product_supplier",
];


$table->displayTable();

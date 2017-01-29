<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_manufacturer,
id_shop
';


$query = "select
%s
from prestashop16.ps_manufacturer_shop
";


$table = CrudModule::getDataTable("prestashop16.ps_manufacturer_shop", $query, $fields, ['id_manufacturer', 'id_shop']);

$table->title = "Ps manufacturer shop";


$table->columnLabels= [
    "id_manufacturer" => "id manufacturer",
    "id_shop" => "id shop",
];


$table->displayTable();

<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_delivery,
id_shop,
id_shop_group,
id_carrier,
id_range_price,
id_range_weight,
id_zone,
price
';


$query = "select
%s
from prestashop16.ps_delivery
";


$table = CrudModule::getDataTable("prestashop16.ps_delivery", $query, $fields, ['id_delivery']);

$table->title = "Ps delivery";


$table->columnLabels= [
    "id_delivery" => "id delivery",
    "id_shop" => "id shop",
    "id_shop_group" => "id shop group",
    "id_carrier" => "id carrier",
    "id_range_price" => "id range price",
    "id_range_weight" => "id range weight",
    "id_zone" => "id zone",
    "price" => "price",
];


$table->hiddenColumns = [
    "id_delivery",
];


$table->displayTable();

<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_zone,
id_shop
';


$query = "select
%s
from prestashop16.ps_zone_shop
";


$table = CrudModule::getDataTable("prestashop16.ps_zone_shop", $query, $fields, ['id_zone', 'id_shop']);

$table->title = "Ps zone shop";


$table->columnLabels= [
    "id_zone" => "id zone",
    "id_shop" => "id shop",
];


$table->displayTable();

<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_country,
id_shop
';


$query = "select
%s
from prestashop16.ps_country_shop
";


$table = CrudModule::getDataTable("prestashop16.ps_country_shop", $query, $fields, ['id_country', 'id_shop']);

$table->title = "Ps country shop";


$table->columnLabels= [
    "id_country" => "id country",
    "id_shop" => "id shop",
];


$table->displayTable();

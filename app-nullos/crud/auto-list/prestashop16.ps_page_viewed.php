<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_page,
id_shop_group,
id_shop,
id_date_range,
counter
';


$query = "select
%s
from prestashop16.ps_page_viewed
";


$table = CrudModule::getDataTable("prestashop16.ps_page_viewed", $query, $fields, ['id_page', 'id_date_range', 'id_shop']);

$table->title = "Ps page viewed";


$table->columnLabels= [
    "id_page" => "id page",
    "id_shop_group" => "id shop group",
    "id_shop" => "id shop",
    "id_date_range" => "id date range",
    "counter" => "counter",
];


$table->displayTable();

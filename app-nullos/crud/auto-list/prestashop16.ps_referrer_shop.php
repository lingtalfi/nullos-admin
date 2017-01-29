<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_referrer,
id_shop,
cache_visitors,
cache_visits,
cache_pages,
cache_registrations,
cache_orders,
cache_sales,
cache_reg_rate,
cache_order_rate
';


$query = "select
%s
from prestashop16.ps_referrer_shop
";


$table = CrudModule::getDataTable("prestashop16.ps_referrer_shop", $query, $fields, ['id_referrer', 'id_shop']);

$table->title = "Ps referrer shop";


$table->columnLabels= [
    "id_referrer" => "id referrer",
    "id_shop" => "id shop",
    "cache_visitors" => "cache visitors",
    "cache_visits" => "cache visits",
    "cache_pages" => "cache pages",
    "cache_registrations" => "cache registrations",
    "cache_orders" => "cache orders",
    "cache_sales" => "cache sales",
    "cache_reg_rate" => "cache reg rate",
    "cache_order_rate" => "cache order rate",
];


$table->hiddenColumns = [
    "id_referrer",
];


$table->displayTable();

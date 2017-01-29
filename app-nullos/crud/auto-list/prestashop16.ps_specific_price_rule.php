<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_specific_price_rule,
name,
id_shop,
id_currency,
id_country,
id_group,
from_quantity,
price,
reduction,
reduction_tax,
reduction_type,
from,
to
';


$query = "select
%s
from prestashop16.ps_specific_price_rule
";


$table = CrudModule::getDataTable("prestashop16.ps_specific_price_rule", $query, $fields, ['id_specific_price_rule']);

$table->title = "Ps specific price rule";


$table->columnLabels= [
    "id_specific_price_rule" => "id specific price rule",
    "name" => "name",
    "id_shop" => "id shop",
    "id_currency" => "id currency",
    "id_country" => "id country",
    "id_group" => "id group",
    "from_quantity" => "from quantity",
    "price" => "price",
    "reduction" => "reduction",
    "reduction_tax" => "reduction tax",
    "reduction_type" => "reduction type",
    "from" => "from",
    "to" => "to",
];


$table->hiddenColumns = [
    "id_specific_price_rule",
];


$table->displayTable();

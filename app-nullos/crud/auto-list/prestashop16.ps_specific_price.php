<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_specific_price,
id_specific_price_rule,
id_cart,
id_product,
id_shop,
id_shop_group,
id_currency,
id_country,
id_group,
id_customer,
id_product_attribute,
price,
from_quantity,
reduction,
reduction_tax,
reduction_type,
from,
to
';


$query = "select
%s
from prestashop16.ps_specific_price
";


$table = CrudModule::getDataTable("prestashop16.ps_specific_price", $query, $fields, ['id_specific_price']);

$table->title = "Ps specific price";


$table->columnLabels= [
    "id_specific_price" => "id specific price",
    "id_specific_price_rule" => "id specific price rule",
    "id_cart" => "id cart",
    "id_product" => "id product",
    "id_shop" => "id shop",
    "id_shop_group" => "id shop group",
    "id_currency" => "id currency",
    "id_country" => "id country",
    "id_group" => "id group",
    "id_customer" => "id customer",
    "id_product_attribute" => "id product attribute",
    "price" => "price",
    "from_quantity" => "from quantity",
    "reduction" => "reduction",
    "reduction_tax" => "reduction tax",
    "reduction_type" => "reduction type",
    "from" => "from",
    "to" => "to",
];


$table->hiddenColumns = [
    "id_specific_price",
];


$table->displayTable();

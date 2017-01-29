<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_order_slip,
id_order_detail,
product_quantity,
unit_price_tax_excl,
unit_price_tax_incl,
total_price_tax_excl,
total_price_tax_incl,
amount_tax_excl,
amount_tax_incl
';


$query = "select
%s
from prestashop16.ps_order_slip_detail
";


$table = CrudModule::getDataTable("prestashop16.ps_order_slip_detail", $query, $fields, ['id_order_slip', 'id_order_detail']);

$table->title = "Ps order slip detail";


$table->columnLabels= [
    "id_order_slip" => "id order slip",
    "id_order_detail" => "id order detail",
    "product_quantity" => "product quantity",
    "unit_price_tax_excl" => "unit price tax excl",
    "unit_price_tax_incl" => "unit price tax incl",
    "total_price_tax_excl" => "total price tax excl",
    "total_price_tax_incl" => "total price tax incl",
    "amount_tax_excl" => "amount tax excl",
    "amount_tax_incl" => "amount tax incl",
];


$table->displayTable();

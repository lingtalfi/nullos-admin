<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_customization,
id_product_attribute,
id_address_delivery,
id_cart,
id_product,
quantity,
quantity_refunded,
quantity_returned,
in_cart
';


$query = "select
%s
from prestashop16.ps_customization
";


$table = CrudModule::getDataTable("prestashop16.ps_customization", $query, $fields, ['id_customization', 'id_cart', 'id_product', 'id_address_delivery']);

$table->title = "Ps customization";


$table->columnLabels= [
    "id_customization" => "id customization",
    "id_product_attribute" => "id product attribute",
    "id_address_delivery" => "id address delivery",
    "id_cart" => "id cart",
    "id_product" => "id product",
    "quantity" => "quantity",
    "quantity_refunded" => "quantity refunded",
    "quantity_returned" => "quantity returned",
    "in_cart" => "in cart",
];


$table->hiddenColumns = [
    "id_customization",
];


$table->displayTable();

<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_cart,
id_shop_group,
id_shop,
id_carrier,
delivery_option,
id_lang,
id_address_delivery,
id_address_invoice,
id_currency,
id_customer,
id_guest,
secure_key,
recyclable,
gift,
gift_message,
mobile_theme,
allow_seperated_package,
date_add,
date_upd
';


$query = "select
%s
from prestashop16.ps_cart
";


$table = CrudModule::getDataTable("prestashop16.ps_cart", $query, $fields, ['id_cart']);

$table->title = "Ps cart";


$table->columnLabels= [
    "id_cart" => "id cart",
    "id_shop_group" => "id shop group",
    "id_shop" => "id shop",
    "id_carrier" => "id carrier",
    "delivery_option" => "delivery option",
    "id_lang" => "id lang",
    "id_address_delivery" => "id address delivery",
    "id_address_invoice" => "id address invoice",
    "id_currency" => "id currency",
    "id_customer" => "id customer",
    "id_guest" => "id guest",
    "secure_key" => "secure key",
    "recyclable" => "recyclable",
    "gift" => "gift",
    "gift_message" => "gift message",
    "mobile_theme" => "mobile theme",
    "allow_seperated_package" => "allow seperated package",
    "date_add" => "date add",
    "date_upd" => "date upd",
];


$table->hiddenColumns = [
    "id_cart",
];


$n = 30;
$table->setTransformer('delivery_option', function ($v) use ($n) {
    return substr($v, 0, $n) . '...';
});
$table->setTransformer('gift_message', function ($v) use ($n) {
    return substr($v, 0, $n) . '...';
});


$table->displayTable();

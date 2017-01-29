<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_order_payment,
order_reference,
id_currency,
amount,
payment_method,
conversion_rate,
transaction_id,
card_number,
card_brand,
card_expiration,
card_holder,
date_add
';


$query = "select
%s
from prestashop16.ps_order_payment
";


$table = CrudModule::getDataTable("prestashop16.ps_order_payment", $query, $fields, ['id_order_payment']);

$table->title = "Ps order payment";


$table->columnLabels= [
    "id_order_payment" => "id order payment",
    "order_reference" => "order reference",
    "id_currency" => "id currency",
    "amount" => "amount",
    "payment_method" => "payment method",
    "conversion_rate" => "conversion rate",
    "transaction_id" => "transaction",
    "card_number" => "card number",
    "card_brand" => "card brand",
    "card_expiration" => "card expiration",
    "card_holder" => "card holder",
    "date_add" => "date add",
];


$table->hiddenColumns = [
    "id_order_payment",
];


$table->displayTable();

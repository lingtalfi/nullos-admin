<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_order_invoice,
id_order_payment,
id_order
';


$query = "select
%s
from prestashop16.ps_order_invoice_payment
";


$table = CrudModule::getDataTable("prestashop16.ps_order_invoice_payment", $query, $fields, ['id_order_invoice', 'id_order_payment']);

$table->title = "Ps order invoice payment";


$table->columnLabels= [
    "id_order_invoice" => "id order invoice",
    "id_order_payment" => "id order payment",
    "id_order" => "id order",
];


$table->displayTable();

<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_order_invoice,
type,
id_tax,
amount
';


$query = "select
%s
from prestashop16.ps_order_invoice_tax
";


$table = CrudModule::getDataTable("prestashop16.ps_order_invoice_tax", $query, $fields, ['id_order_invoice', 'type', 'id_tax', 'amount']);

$table->title = "Ps order invoice tax";


$table->columnLabels= [
    "id_order_invoice" => "id order invoice",
    "type" => "type",
    "id_tax" => "id tax",
    "amount" => "amount",
];


$table->displayTable();

<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_order_state,
invoice,
send_email,
module_name,
color,
unremovable,
hidden,
logable,
delivery,
shipped,
paid,
pdf_invoice,
pdf_delivery,
deleted
';


$query = "select
%s
from prestashop16.ps_order_state
";


$table = CrudModule::getDataTable("prestashop16.ps_order_state", $query, $fields, ['id_order_state']);

$table->title = "Ps order state";


$table->columnLabels= [
    "id_order_state" => "id order state",
    "invoice" => "invoice",
    "send_email" => "send email",
    "module_name" => "module name",
    "color" => "color",
    "unremovable" => "unremovable",
    "hidden" => "hidden",
    "logable" => "logable",
    "delivery" => "delivery",
    "shipped" => "shipped",
    "paid" => "paid",
    "pdf_invoice" => "pdf invoice",
    "pdf_delivery" => "pdf delivery",
    "deleted" => "deleted",
];


$table->hiddenColumns = [
    "id_order_state",
];


$table->displayTable();

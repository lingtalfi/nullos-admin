<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_supply_order_state,
delivery_note,
editable,
receipt_state,
pending_receipt,
enclosed,
color
';


$query = "select
%s
from prestashop16.ps_supply_order_state
";


$table = CrudModule::getDataTable("prestashop16.ps_supply_order_state", $query, $fields, ['id_supply_order_state']);

$table->title = "Ps supply order state";


$table->columnLabels= [
    "id_supply_order_state" => "id supply order state",
    "delivery_note" => "delivery note",
    "editable" => "editable",
    "receipt_state" => "receipt state",
    "pending_receipt" => "pending receipt",
    "enclosed" => "enclosed",
    "color" => "color",
];


$table->hiddenColumns = [
    "id_supply_order_state",
];


$table->displayTable();

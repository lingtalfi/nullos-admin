<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_customer_message,
id_customer_thread,
id_employee,
message,
file_name,
ip_address,
user_agent,
date_add,
date_upd,
private,
read
';


$query = "select
%s
from prestashop16.ps_customer_message
";


$table = CrudModule::getDataTable("prestashop16.ps_customer_message", $query, $fields, ['id_customer_message']);

$table->title = "Ps customer message";


$table->columnLabels= [
    "id_customer_message" => "id customer message",
    "id_customer_thread" => "id customer thread",
    "id_employee" => "id employee",
    "message" => "message",
    "file_name" => "file name",
    "ip_address" => "ip address",
    "user_agent" => "user agent",
    "date_add" => "date add",
    "date_upd" => "date upd",
    "private" => "private",
    "read" => "read",
];


$table->hiddenColumns = [
    "id_customer_message",
];


$table->displayTable();

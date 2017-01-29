<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_contact,
email,
customer_service,
position
';


$query = "select
%s
from prestashop16.ps_contact
";


$table = CrudModule::getDataTable("prestashop16.ps_contact", $query, $fields, ['id_contact']);

$table->title = "Ps contact";


$table->columnLabels= [
    "id_contact" => "id contact",
    "email" => "email",
    "customer_service" => "customer service",
    "position" => "position",
];


$table->hiddenColumns = [
    "id_contact",
];


$table->displayTable();

<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_customer,
vat,
statut
';


$query = "select
%s
from prestashop16.ps_customer_vatncg
";


$table = CrudModule::getDataTable("prestashop16.ps_customer_vatncg", $query, $fields, ['id_customer']);

$table->title = "Ps customer vatncg";


$table->columnLabels= [
    "id_customer" => "id customer",
    "vat" => "vat",
    "statut" => "statut",
];


$table->displayTable();

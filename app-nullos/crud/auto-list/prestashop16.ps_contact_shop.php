<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_contact,
id_shop
';


$query = "select
%s
from prestashop16.ps_contact_shop
";


$table = CrudModule::getDataTable("prestashop16.ps_contact_shop", $query, $fields, ['id_contact', 'id_shop']);

$table->title = "Ps contact shop";


$table->columnLabels= [
    "id_contact" => "id contact",
    "id_shop" => "id shop",
];


$table->displayTable();

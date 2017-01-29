<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_cart,
id_cart_rule
';


$query = "select
%s
from prestashop16.ps_cart_cart_rule
";


$table = CrudModule::getDataTable("prestashop16.ps_cart_cart_rule", $query, $fields, ['id_cart', 'id_cart_rule']);

$table->title = "Ps cart cart rule";


$table->columnLabels= [
    "id_cart" => "id cart",
    "id_cart_rule" => "id cart rule",
];


$table->displayTable();

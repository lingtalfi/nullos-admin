<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_attribute,
id_shop
';


$query = "select
%s
from prestashop16.ps_attribute_shop
";


$table = CrudModule::getDataTable("prestashop16.ps_attribute_shop", $query, $fields, ['id_attribute', 'id_shop']);

$table->title = "Ps attribute shop";


$table->columnLabels= [
    "id_attribute" => "id attribute",
    "id_shop" => "id shop",
];


$table->displayTable();

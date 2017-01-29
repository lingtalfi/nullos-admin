<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_attribute_group,
id_shop
';


$query = "select
%s
from prestashop16.ps_attribute_group_shop
";


$table = CrudModule::getDataTable("prestashop16.ps_attribute_group_shop", $query, $fields, ['id_attribute_group', 'id_shop']);

$table->title = "Ps attribute group shop";


$table->columnLabels= [
    "id_attribute_group" => "id attribute group",
    "id_shop" => "id shop",
];


$table->displayTable();

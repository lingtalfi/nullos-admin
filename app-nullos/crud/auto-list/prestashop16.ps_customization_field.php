<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_customization_field,
id_product,
type,
required
';


$query = "select
%s
from prestashop16.ps_customization_field
";


$table = CrudModule::getDataTable("prestashop16.ps_customization_field", $query, $fields, ['id_customization_field']);

$table->title = "Ps customization field";


$table->columnLabels= [
    "id_customization_field" => "id customization field",
    "id_product" => "id product",
    "type" => "type",
    "required" => "required",
];


$table->hiddenColumns = [
    "id_customization_field",
];


$table->displayTable();

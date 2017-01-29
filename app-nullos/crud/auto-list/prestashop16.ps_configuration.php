<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_configuration,
id_shop_group,
id_shop,
name,
value,
date_add,
date_upd
';


$query = "select
%s
from prestashop16.ps_configuration
";


$table = CrudModule::getDataTable("prestashop16.ps_configuration", $query, $fields, ['id_configuration']);

$table->title = "Ps configuration";


$table->columnLabels= [
    "id_configuration" => "id configuration",
    "id_shop_group" => "id shop group",
    "id_shop" => "id shop",
    "name" => "name",
    "value" => "value",
    "date_add" => "date add",
    "date_upd" => "date upd",
];


$table->hiddenColumns = [
    "id_configuration",
];


$n = 30;
$table->setTransformer('value', function ($v) use ($n) {
    return substr($v, 0, $n) . '...';
});


$table->displayTable();

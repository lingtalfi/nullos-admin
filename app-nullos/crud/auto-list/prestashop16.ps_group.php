<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_group,
reduction,
price_display_method,
show_prices,
date_add,
date_upd
';


$query = "select
%s
from prestashop16.ps_group
";


$table = CrudModule::getDataTable("prestashop16.ps_group", $query, $fields, ['id_group']);

$table->title = "Ps group";


$table->columnLabels= [
    "id_group" => "id group",
    "reduction" => "reduction",
    "price_display_method" => "price display method",
    "show_prices" => "show prices",
    "date_add" => "date add",
    "date_upd" => "date upd",
];


$table->hiddenColumns = [
    "id_group",
];


$table->displayTable();

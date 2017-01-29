<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_homeslider_slides,
id_shop
';


$query = "select
%s
from prestashop16.ps_homeslider
";


$table = CrudModule::getDataTable("prestashop16.ps_homeslider", $query, $fields, ['id_homeslider_slides', 'id_shop']);

$table->title = "Ps homeslider";


$table->columnLabels= [
    "id_homeslider_slides" => "id homeslider slides",
    "id_shop" => "id shop",
];


$table->hiddenColumns = [
    "id_homeslider_slides",
];


$table->displayTable();

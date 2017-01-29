<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_homeslider_slides,
position,
active
';


$query = "select
%s
from prestashop16.ps_homeslider_slides
";


$table = CrudModule::getDataTable("prestashop16.ps_homeslider_slides", $query, $fields, ['id_homeslider_slides']);

$table->title = "Ps homeslider slides";


$table->columnLabels= [
    "id_homeslider_slides" => "id homeslider slides",
    "position" => "position",
    "active" => "active",
];


$table->hiddenColumns = [
    "id_homeslider_slides",
];


$table->displayTable();

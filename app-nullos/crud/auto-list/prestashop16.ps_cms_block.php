<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_cms_block,
id_cms_category,
location,
position,
display_store
';


$query = "select
%s
from prestashop16.ps_cms_block
";


$table = CrudModule::getDataTable("prestashop16.ps_cms_block", $query, $fields, ['id_cms_block']);

$table->title = "Ps cms block";


$table->columnLabels= [
    "id_cms_block" => "id cms block",
    "id_cms_category" => "id cms category",
    "location" => "location",
    "position" => "position",
    "display_store" => "display store",
];


$table->hiddenColumns = [
    "id_cms_block",
];


$table->displayTable();

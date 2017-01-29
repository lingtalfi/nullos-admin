<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_cms,
id_cms_category,
position,
active,
indexation
';


$query = "select
%s
from prestashop16.ps_cms
";


$table = CrudModule::getDataTable("prestashop16.ps_cms", $query, $fields, ['id_cms']);

$table->title = "Ps cms";


$table->columnLabels= [
    "id_cms" => "id cms",
    "id_cms_category" => "id cms category",
    "position" => "position",
    "active" => "active",
    "indexation" => "indexation",
];


$table->hiddenColumns = [
    "id_cms",
];


$table->displayTable();

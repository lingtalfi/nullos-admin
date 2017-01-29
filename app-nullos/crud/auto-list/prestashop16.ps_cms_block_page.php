<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_cms_block_page,
id_cms_block,
id_cms,
is_category
';


$query = "select
%s
from prestashop16.ps_cms_block_page
";


$table = CrudModule::getDataTable("prestashop16.ps_cms_block_page", $query, $fields, ['id_cms_block_page']);

$table->title = "Ps cms block page";


$table->columnLabels= [
    "id_cms_block_page" => "id cms block page",
    "id_cms_block" => "id cms block",
    "id_cms" => "id cms",
    "is_category" => "is category",
];


$table->hiddenColumns = [
    "id_cms_block_page",
];


$table->displayTable();

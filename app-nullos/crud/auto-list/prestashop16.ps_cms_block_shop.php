<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_cms_block,
id_shop
';


$query = "select
%s
from prestashop16.ps_cms_block_shop
";


$table = CrudModule::getDataTable("prestashop16.ps_cms_block_shop", $query, $fields, ['id_cms_block', 'id_shop']);

$table->title = "Ps cms block shop";


$table->columnLabels= [
    "id_cms_block" => "id cms block",
    "id_shop" => "id shop",
];


$table->hiddenColumns = [
    "id_cms_block",
];


$table->displayTable();

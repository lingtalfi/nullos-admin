<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_belvg_customerattributes,
id_shop
';


$query = "select
%s
from prestashop16.ps_belvg_CA_customerattributes_shop
";


$table = CrudModule::getDataTable("prestashop16.ps_belvg_CA_customerattributes_shop", $query, $fields, ['id_belvg_customerattributes', 'id_shop']);

$table->title = "Ps belvg CA customerattributes shop";


$table->columnLabels= [
    "id_belvg_customerattributes" => "id belvg customerattributes",
    "id_shop" => "id shop",
];


$table->displayTable();

<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_sekeyword,
id_shop,
id_shop_group,
keyword,
date_add
';


$query = "select
%s
from prestashop16.ps_sekeyword
";


$table = CrudModule::getDataTable("prestashop16.ps_sekeyword", $query, $fields, ['id_sekeyword']);

$table->title = "Ps sekeyword";


$table->columnLabels= [
    "id_sekeyword" => "id sekeyword",
    "id_shop" => "id shop",
    "id_shop_group" => "id shop group",
    "keyword" => "keyword",
    "date_add" => "date add",
];


$table->hiddenColumns = [
    "id_sekeyword",
];


$table->displayTable();

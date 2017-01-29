<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_linksmenutop,
id_shop,
new_window
';


$query = "select
%s
from prestashop16.ps_linksmenutop
";


$table = CrudModule::getDataTable("prestashop16.ps_linksmenutop", $query, $fields, ['id_linksmenutop']);

$table->title = "Ps linksmenutop";


$table->columnLabels= [
    "id_linksmenutop" => "id linksmenutop",
    "id_shop" => "id shop",
    "new_window" => "new window",
];


$table->hiddenColumns = [
    "id_linksmenutop",
];


$table->displayTable();

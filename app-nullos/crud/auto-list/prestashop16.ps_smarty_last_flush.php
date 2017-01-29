<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
type,
last_flush
';


$query = "select
%s
from prestashop16.ps_smarty_last_flush
";


$table = CrudModule::getDataTable("prestashop16.ps_smarty_last_flush", $query, $fields, ['type']);

$table->title = "Ps smarty last flush";


$table->columnLabels= [
    "type" => "type",
    "last_flush" => "last flush",
];


$table->displayTable();

<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id,
objet,
message,
email,
date_creation
';


$query = "select
%s
from oui.messages
";


$table = CrudModule::getDataTable();

$table->title = "Messages";


$table->columnHeaders = [
    "id" => "id",
    "objet" => "objet",
    "message" => "message",
    "email" => "email",
    "date_creation" => "date creation",
];


$table->hiddenColumns = [
    "id",
];


$n = 30;
$table->setTransformer('message', function ($v) use ($n) {
    return substr($v, 0, $n) . '...';
});


$table->printTable('oui.messages', $query, $fields, ['id']);

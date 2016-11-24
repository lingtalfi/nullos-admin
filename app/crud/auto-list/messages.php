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
from messages
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


$table->printTable('messages', $query, $fields, ['id']);

<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_attachment,
file,
file_name,
file_size,
mime
';


$query = "select
%s
from prestashop16.ps_attachment
";


$table = CrudModule::getDataTable("prestashop16.ps_attachment", $query, $fields, ['id_attachment']);

$table->title = "Ps attachment";


$table->columnLabels= [
    "id_attachment" => "id attachment",
    "file" => "file",
    "file_name" => "file name",
    "file_size" => "file size",
    "mime" => "mime",
];


$table->hiddenColumns = [
    "id_attachment",
];


$table->displayTable();

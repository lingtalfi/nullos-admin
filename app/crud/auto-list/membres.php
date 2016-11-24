<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id,
pseudo,
email,
url_photo
';


$query = "select
%s
from membres
";


$table = CrudModule::getDataTable();

$table->title = "Membres";


$table->columnHeaders = [
    "id" => "id",
    "pseudo" => "pseudo",
    "email" => "email",
    "url_photo" => "url photo",
];


$table->hiddenColumns = [
    "id",
];


$table->setTransformer('url_photo', function ($v) {
    return '<a href="' . htmlspecialchars($v) . '">' . $v . '</a>';
});


$table->printTable('membres', $query, $fields, ['id']);

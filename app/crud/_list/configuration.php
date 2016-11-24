<?php

use Crud\CrudModule;

$fields = '
cle,
valeur
';


$query = "select
%s
from configuration
";


$table = CrudModule::getDataTable();


$table->title = "Configuration";


//$this->multipleActions = [
//    'deleteAll' => [
//        'Delete all',
//        ':deleteAll', // this is a special notation to indicate that we want to use the deleteAll method of THIS class
//    ],
//];

//$this->singleActions = [
//    'edit' => ['<a href="/table?name={tableName}&action=edit&ric={ric}">Edit</a>'],
//    // :delete is a special notation to indicate that we want to use the delete method of THIS class
//    'delete' => ['<a class="postlink" data-action="delete" data-ric="{ric}" href="#">Delete</a>', ':delete'],
//];



$table->columnHeaders = [
    'cle' => 'clé',
];






$table->printTable('configuration', $query, $fields, ['cle']);
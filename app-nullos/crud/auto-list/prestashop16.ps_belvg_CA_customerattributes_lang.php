<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_belvg_customerattributes,
id_lang,
name
';


$query = "select
%s
from prestashop16.ps_belvg_CA_customerattributes_lang
";


$table = CrudModule::getDataTable("prestashop16.ps_belvg_CA_customerattributes_lang", $query, $fields, ['id_belvg_customerattributes', 'id_lang']);

$table->title = "Ps belvg CA customerattributes lang";


$table->columnLabels= [
    "id_belvg_customerattributes" => "id belvg customerattributes",
    "id_lang" => "id lang",
    "name" => "name",
];


$table->displayTable();

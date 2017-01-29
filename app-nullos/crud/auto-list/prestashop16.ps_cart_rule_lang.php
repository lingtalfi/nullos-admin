<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_cart_rule,
id_lang,
name
';


$query = "select
%s
from prestashop16.ps_cart_rule_lang
";


$table = CrudModule::getDataTable("prestashop16.ps_cart_rule_lang", $query, $fields, ['id_cart_rule', 'id_lang']);

$table->title = "Ps cart rule lang";


$table->columnLabels= [
    "id_cart_rule" => "id cart rule",
    "id_lang" => "id lang",
    "name" => "name",
];


$table->displayTable();

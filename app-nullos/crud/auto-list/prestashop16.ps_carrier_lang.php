<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_carrier,
id_shop,
id_lang,
delay
';


$query = "select
%s
from prestashop16.ps_carrier_lang
";


$table = CrudModule::getDataTable("prestashop16.ps_carrier_lang", $query, $fields, ['id_lang', 'id_shop', 'id_carrier']);

$table->title = "Ps carrier lang";


$table->columnLabels= [
    "id_carrier" => "id carrier",
    "id_shop" => "id shop",
    "id_lang" => "id lang",
    "delay" => "delay",
];


$table->displayTable();

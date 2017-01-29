<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_linksmenutop,
id_lang,
id_shop,
label,
link
';


$query = "select
%s
from prestashop16.ps_linksmenutop_lang
";


$table = CrudModule::getDataTable("prestashop16.ps_linksmenutop_lang", $query, $fields, ['id_linksmenutop', 'id_lang', 'id_shop', 'label', 'link']);

$table->title = "Ps linksmenutop lang";


$table->columnLabels= [
    "id_linksmenutop" => "id linksmenutop",
    "id_lang" => "id lang",
    "id_shop" => "id shop",
    "label" => "label",
    "link" => "link",
];


$table->displayTable();

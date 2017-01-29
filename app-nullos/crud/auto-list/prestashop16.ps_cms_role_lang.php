<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_cms_role,
id_lang,
id_shop,
name
';


$query = "select
%s
from prestashop16.ps_cms_role_lang
";


$table = CrudModule::getDataTable("prestashop16.ps_cms_role_lang", $query, $fields, ['id_cms_role', 'id_lang', 'id_shop']);

$table->title = "Ps cms role lang";


$table->columnLabels= [
    "id_cms_role" => "id cms role",
    "id_lang" => "id lang",
    "id_shop" => "id shop",
    "name" => "name",
];


$table->displayTable();

<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_shop_url,
id_shop,
domain,
domain_ssl,
physical_uri,
virtual_uri,
main,
active
';


$query = "select
%s
from prestashop16.ps_shop_url
";


$table = CrudModule::getDataTable("prestashop16.ps_shop_url", $query, $fields, ['id_shop_url']);

$table->title = "Ps shop url";


$table->columnLabels= [
    "id_shop_url" => "id shop url",
    "id_shop" => "id shop",
    "domain" => "domain",
    "domain_ssl" => "domain ssl",
    "physical_uri" => "physical uri",
    "virtual_uri" => "virtual uri",
    "main" => "main",
    "active" => "active",
];


$table->hiddenColumns = [
    "id_shop_url",
];


$table->displayTable();

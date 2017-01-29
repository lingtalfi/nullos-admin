<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_tax_rules_group,
id_shop
';


$query = "select
%s
from prestashop16.ps_tax_rules_group_shop
";


$table = CrudModule::getDataTable("prestashop16.ps_tax_rules_group_shop", $query, $fields, ['id_tax_rules_group', 'id_shop']);

$table->title = "Ps tax rules group shop";


$table->columnLabels= [
    "id_tax_rules_group" => "id tax rules group",
    "id_shop" => "id shop",
];


$table->displayTable();

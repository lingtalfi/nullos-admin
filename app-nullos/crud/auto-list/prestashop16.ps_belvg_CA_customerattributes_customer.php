<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_belvg_customerattributes,
id_customer,
value
';


$query = "select
%s
from prestashop16.ps_belvg_CA_customerattributes_customer
";


$table = CrudModule::getDataTable("prestashop16.ps_belvg_CA_customerattributes_customer", $query, $fields, ['id_belvg_customerattributes', 'id_customer']);

$table->title = "Ps belvg CA customerattributes customer";


$table->columnLabels= [
    "id_belvg_customerattributes" => "id belvg customerattributes",
    "id_customer" => "id customer",
    "value" => "value",
];


$n = 30;
$table->setTransformer('value', function ($v) use ($n) {
    return substr($v, 0, $n) . '...';
});


$table->displayTable();

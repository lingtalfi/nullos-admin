<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_address,
id_country,
id_state,
id_customer,
id_manufacturer,
id_supplier,
id_warehouse,
alias,
company,
lastname,
firstname,
address1,
address2,
postcode,
city,
other,
phone,
phone_mobile,
vat_number,
dni,
date_add,
date_upd,
active,
deleted
';


$query = "select
%s
from prestashop16.ps_address
";


$table = CrudModule::getDataTable("prestashop16.ps_address", $query, $fields, ['id_address']);

$table->title = "Ps address";


$table->columnLabels= [
    "id_address" => "id address",
    "id_country" => "id country",
    "id_state" => "id state",
    "id_customer" => "id customer",
    "id_manufacturer" => "id manufacturer",
    "id_supplier" => "id supplier",
    "id_warehouse" => "id warehouse",
    "alias" => "alias",
    "company" => "company",
    "lastname" => "lastname",
    "firstname" => "firstname",
    "address1" => "address1",
    "address2" => "address2",
    "postcode" => "postcode",
    "city" => "city",
    "other" => "other",
    "phone" => "phone",
    "phone_mobile" => "phone mobile",
    "vat_number" => "vat number",
    "dni" => "dni",
    "date_add" => "date add",
    "date_upd" => "date upd",
    "active" => "active",
    "deleted" => "deleted",
];


$table->hiddenColumns = [
    "id_address",
];


$n = 30;
$table->setTransformer('other', function ($v) use ($n) {
    return substr($v, 0, $n) . '...';
});


$table->displayTable();

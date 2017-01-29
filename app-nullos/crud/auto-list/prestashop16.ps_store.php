<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_store,
id_country,
id_state,
name,
address1,
address2,
city,
postcode,
latitude,
longitude,
hours,
phone,
fax,
email,
note,
active,
date_add,
date_upd
';


$query = "select
%s
from prestashop16.ps_store
";


$table = CrudModule::getDataTable("prestashop16.ps_store", $query, $fields, ['id_store']);

$table->title = "Ps store";


$table->columnLabels= [
    "id_store" => "id store",
    "id_country" => "id country",
    "id_state" => "id state",
    "name" => "name",
    "address1" => "address1",
    "address2" => "address2",
    "city" => "city",
    "postcode" => "postcode",
    "latitude" => "latitude",
    "longitude" => "longitude",
    "hours" => "hours",
    "phone" => "phone",
    "fax" => "fax",
    "email" => "email",
    "note" => "note",
    "active" => "active",
    "date_add" => "date add",
    "date_upd" => "date upd",
];


$table->hiddenColumns = [
    "id_store",
];


$n = 30;
$table->setTransformer('note', function ($v) use ($n) {
    return substr($v, 0, $n) . '...';
});


$table->displayTable();

<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
u.users_id,
ou.email as users_email,
u.instruments_id,
o.nom as instruments_nom
';


$query = "select
%s
from oui.users_has_instruments u
inner join oui.instruments o on o.id=u.instruments_id
inner join oui.users ou on ou.id=u.users_id
";


$table = CrudModule::getDataTable();

$table->title = "Users has instruments";


$table->columnHeaders = [
    "users_email" => "users id",
    "instruments_nom" => "instruments id",
];


$table->hiddenColumns = [
    "users_id",
    "instruments_id",
];


$table->setTransformer('users_email', function ($v, array $item) {
    return '<a href="' . CrudHelper::getUpdateFormUrl('oui.users', $item['users_id']) . '">' . $v . '</a>';
});

$table->setTransformer('instruments_nom', function ($v, array $item) {
    return '<a href="' . CrudHelper::getUpdateFormUrl('oui.instruments', $item['instruments_id']) . '">' . $v . '</a>';
});




$table->printTable('oui.users_has_instruments', $query, $fields, ['users_id', 'instruments_id']);

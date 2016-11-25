<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
u.users_id,
us.pseudo as users_pseudo,
u.instruments_id,
i.nom as instruments_nom
';


$query = "select
%s
from users_has_instruments u
inner join instruments i on i.id=u.instruments_id
inner join users us on us.id=u.users_id
";


$table = CrudModule::getDataTable();

$table->title = "Instruments des utilisateurs";


$table->columnHeaders = [
    "users_pseudo" => "utilisateur",
    "instruments_nom" => "instrument",
];


$table->hiddenColumns = [
    "users_id",
    "instruments_id",
];


$table->setTransformer('users_pseudo', function ($v, array $item) {
    return '<a href="' . CrudHelper::getUpdateFormUrl('users', $item['users_id']) . '">' . $v . '</a>';
});

$table->setTransformer('instruments_nom', function ($v, array $item) {
    return '<a href="' . CrudHelper::getUpdateFormUrl('instruments', $item['instruments_id']) . '">' . $v . '</a>';
});




$table->printTable('users_has_instruments', $query, $fields, ['users_id', 'instruments_id']);

<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
u.users_id,
us.pseudo as users_pseudo,
u.styles_musicaux_id,
s.nom as styles_musicaux_nom
';


$query = "select
%s
from users_has_styles_musicaux u
inner join styles_musicaux s on s.id=u.styles_musicaux_id
inner join users us on us.id=u.users_id
";


$table = CrudModule::getDataTable();

$table->title = "Styles musical des utilisateurs";


$table->columnHeaders = [
    "users_id" => "users id",
    "styles_musicaux_id" => "styles musicaux id",
];


$table->hiddenColumns = [
    "users_id",
    "styles_musicaux_id",
];


$table->setTransformer('users_pseudo', function ($v, array $item) {
    return '<a href="' . CrudHelper::getUpdateFormUrl('users', $item['users_id']) . '">' . $v . '</a>';
});

$table->setTransformer('styles_musicaux_nom', function ($v, array $item) {
    return '<a href="' . CrudHelper::getUpdateFormUrl('styles_musicaux', $item['styles_musicaux_id']) . '">' . $v . '</a>';
});




$table->printTable('users_has_styles_musicaux', $query, $fields, ['users_id', 'styles_musicaux_id']);

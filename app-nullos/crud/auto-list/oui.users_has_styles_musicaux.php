<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
u.users_id,
ou.email as users_email,
u.styles_musicaux_id,
o.nom as styles_musicaux_nom
';


$query = "select
%s
from oui.users_has_styles_musicaux u
inner join oui.styles_musicaux o on o.id=u.styles_musicaux_id
inner join oui.users ou on ou.id=u.users_id
";


$table = CrudModule::getDataTable();

$table->title = "Users has styles musicaux";


$table->actionColumnsPosition = "right";


$table->columnHeaders = [
    "users_email" => "users",
    "styles_musicaux_nom" => "styles musicaux",
];


$table->hiddenColumns = [
    "users_id",
    "styles_musicaux_id",
];


$table->setTransformer('users_email', function ($v, array $item) {
    return '<a href="' . CrudHelper::getUpdateFormUrl('oui.users', $item['users_id']) . '">' . $v . '</a>';
});

$table->setTransformer('styles_musicaux_nom', function ($v, array $item) {
    return '<a href="' . CrudHelper::getUpdateFormUrl('oui.styles_musicaux', $item['styles_musicaux_id']) . '">' . $v . '</a>';
});




$table->printTable('oui.users_has_styles_musicaux', $query, $fields, ['users_id', 'styles_musicaux_id']);

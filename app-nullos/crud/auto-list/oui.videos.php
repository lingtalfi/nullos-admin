<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
v.id,
v.active,
v.users_id,
ou.email as users_email,
v.concours_id,
o.titre as concours_titre,
v.titre,
v.url,
v.url_photo,
v.nb_likes,
v.nb_vues,
v.date_creation
';


$query = "select
%s
from oui.videos v
inner join oui.concours o on o.id=v.concours_id
inner join oui.users ou on ou.id=v.users_id
";


$table = CrudModule::getDataTable("oui.videos", $query, $fields, ['id']);

$table->title = "Videos";


$table->columnLabels= [
    "id" => "id",
    "active" => "active",
    "users_email" => "users",
    "concours_titre" => "concours",
    "titre" => "titre",
    "url" => "url",
    "url_photo" => "url photo",
    "nb_likes" => "nb likes",
    "nb_vues" => "nb vues",
    "date_creation" => "date creation",
];


$table->hiddenColumns = [
    "id",
    "users_id",
    "concours_id",
];


$table->setTransformer('url_photo', function ($v) {
    return '<a href="' . htmlspecialchars($v) . '">' . $v . '</a>';
});


$table->setTransformer('users_email', function ($v, array $item) {
    return '<a href="' . CrudHelper::getUpdateFormUrl('oui.users', $item['users_id']) . '">' . $v . '</a>';
});

$table->setTransformer('concours_titre', function ($v, array $item) {
    return '<a href="' . CrudHelper::getUpdateFormUrl('oui.concours', $item['concours_id']) . '">' . $v . '</a>';
});




$table->displayTable();

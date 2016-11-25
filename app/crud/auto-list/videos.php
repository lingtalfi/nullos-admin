<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
v.id,
v.active,
v.users_id,
u.pseudo as users_pseudo,
v.concours_id,
c.titre as concours_titre,
v.titre,
v.url,
v.url_photo,
v.nb_likes,
v.nb_vues,
v.date_creation
';


$query = "select
%s
from videos v
inner join concours c on c.id=v.concours_id
inner join users u on u.id=v.users_id
";


$table = CrudModule::getDataTable();

$table->title = "Vidéos";


$table->columnHeaders = [
    "id" => "id",
    "active" => "actif",
    "users_pseudo" => "utilisateur",
    "concours_titre" => "concours",
    "titre" => "titre",
    "url" => "url",
    "url_photo" => "url de la photo",
    "nb_likes" => "nb likes",
    "nb_vues" => "nb vues",
    "date_creation" => "date création",
];


$table->hiddenColumns = [
    "id",
    "users_id",
    "concours_id",
];


$table->setTransformer('url_photo', function ($v) {
    return '<a href="' . htmlspecialchars($v) . '">' . $v . '</a>';
});


$table->setTransformer('users_pseudo', function ($v, array $item) {
    return '<a href="' . CrudHelper::getUpdateFormUrl('users', $item['users_id']) . '">' . $v . '</a>';
});

$table->setTransformer('concours_titre', function ($v, array $item) {
    return '<a href="' . CrudHelper::getUpdateFormUrl('concours', $item['concours_id']) . '">' . $v . '</a>';
});




$table->printTable('videos', $query, $fields, ['id']);

<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
v.id,
v.active,
u.pseudo as user_pseudo, 
c.id as concours_id,
c.titre as concours_titre,
v.url,
v.nb_vues,
v.nb_likes,
v.date_creation
';


$query = "select
%s
from videos v
inner join users u on u.id=v.users_id
inner join concours c on c.id=v.concours_id
";


$table = CrudModule::getDataTable();

$table->title = "Liste des vidéos";


$table->columnHeaders = [
    'user_pseudo' => 'pseudo',
    'concours_titre' => 'concours',
    'nb_vues' => 'nb vues',
    'nb_likes' => 'nb likes',
    'date_creation' => 'creation date',
];
$table->hiddenColumns = [
    'id',
    'concours_id',
];


$table->setTransformer('url', function ($v) {
    return '<a href="' . htmlspecialchars($v) . '">' . $v . '</a>';
});


$table->setTransformer('concours_titre', function ($v, array $item) {
    return '<a href="' . CrudHelper::getUpdateFormUrl('concours', $item['concours_id']) . '">' . $v . '</a>';
});


$table->printTable('videos', $query, $fields, ['id']);
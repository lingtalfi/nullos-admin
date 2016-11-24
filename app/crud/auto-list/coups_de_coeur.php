<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
c.id,
c.videos_id,
v.titre as videos_titre,
c.position
';


$query = "select
%s
from coups_de_coeur c
inner join videos v on v.id=c.videos_id
";


$table = CrudModule::getDataTable();

$table->title = "Coups de coeur";


$table->columnHeaders = [
    "id" => "id",
    "videos_id" => "videos id",
    "position" => "position",
];


$table->hiddenColumns = [
    "id",
    "videos_id",
];


$table->setTransformer('videos_titre', function ($v, array $item) {
    return '<a href="' . CrudHelper::getUpdateFormUrl('videos', $item['videos_id']) . '">' . $v . '</a>';
});




$table->printTable('coups_de_coeur', $query, $fields, ['id']);

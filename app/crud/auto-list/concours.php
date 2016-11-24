<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
c.id,
c.equipe_id,
e.nom as equipe_nom,
c.titre,
c.url_photo,
c.url_video,
c.date_debut,
c.date_fin,
c.lots,
c.reglement,
c.description
';


$query = "select
%s
from concours c
inner join equipe e on e.id=c.equipe_id
";


$table = CrudModule::getDataTable();

$table->title = "Concours";


$table->columnHeaders = [
    "id" => "id",
    "equipe_id" => "equipe id",
    "titre" => "titre",
    "url_photo" => "url photo",
    "url_video" => "url video",
    "date_debut" => "date debut",
    "date_fin" => "date fin",
    "lots" => "lots",
    "reglement" => "reglement",
    "description" => "description",
];


$table->hiddenColumns = [
    "id",
    "equipe_id",
];


$table->setTransformer('url_photo', function ($v) {
    return '<a href="' . htmlspecialchars($v) . '">' . $v . '</a>';
});
$table->setTransformer('url_video', function ($v) {
    return '<a href="' . htmlspecialchars($v) . '">' . $v . '</a>';
});


$table->setTransformer('equipe_nom', function ($v, array $item) {
    return '<a href="' . CrudHelper::getUpdateFormUrl('equipe', $item['equipe_id']) . '">' . $v . '</a>';
});




$table->printTable('concours', $query, $fields, ['id']);

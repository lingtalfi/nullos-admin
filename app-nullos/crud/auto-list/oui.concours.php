<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
c.id,
c.equipe_id,
o.nom as equipe_nom,
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
from oui.concours c
inner join oui.equipe o on o.id=c.equipe_id
";


$table = CrudModule::getDataTable();

$table->title = "Concours";


$table->columnHeaders = [
    "id" => "id",
    "equipe_nom" => "equipe id",
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


$n = 30;
$table->setTransformer('lots', function ($v) use ($n) {
    return substr($v, 0, $n) . '...';
});
$table->setTransformer('reglement', function ($v) use ($n) {
    return substr($v, 0, $n) . '...';
});
$table->setTransformer('description', function ($v) use ($n) {
    return substr($v, 0, $n) . '...';
});


$table->setTransformer('equipe_nom', function ($v, array $item) {
    return '<a href="' . CrudHelper::getUpdateFormUrl('oui.equipe', $item['equipe_id']) . '">' . $v . '</a>';
});




$table->printTable('oui.concours', $query, $fields, ['id']);

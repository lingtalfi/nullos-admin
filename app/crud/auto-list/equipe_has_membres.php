<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
e.equipe_id,
eq.nom as equipe_nom,
e.membres_id,
m.pseudo as membres_pseudo
';


$query = "select
%s
from equipe_has_membres e
inner join equipe eq on eq.id=e.equipe_id
inner join membres m on m.id=e.membres_id
";


$table = CrudModule::getDataTable();

$table->title = "Membres des équipes";


$table->columnHeaders = [
    "equipe_nom" => "équipe",
    "membres_pseudo" => "membre",
];


$table->hiddenColumns = [
    "equipe_id",
    "membres_id",
];


$table->setTransformer('equipe_nom', function ($v, array $item) {
    return '<a href="' . CrudHelper::getUpdateFormUrl('equipe', $item['equipe_id']) . '">' . $v . '</a>';
});

$table->setTransformer('membres_pseudo', function ($v, array $item) {
    return '<a href="' . CrudHelper::getUpdateFormUrl('membres', $item['membres_id']) . '">' . $v . '</a>';
});




$table->printTable('equipe_has_membres', $query, $fields, ['equipe_id', 'membres_id']);

<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
e.equipe_id,
o.nom as equipe_nom,
e.membres_id,
ou.pseudo as membres_pseudo
';


$query = "select
%s
from oui.equipe_has_membres e
inner join oui.equipe o on o.id=e.equipe_id
inner join oui.membres ou on ou.id=e.membres_id
";


$table = CrudModule::getDataTable("oui.equipe_has_membres", $query, $fields, ['equipe_id', 'membres_id']);

$table->title = "Equipe has membres";


$table->columnLabels= [
    "equipe_nom" => "equipe",
    "membres_pseudo" => "membres",
];


$table->hiddenColumns = [
    "equipe_id",
    "membres_id",
];


$table->setTransformer('equipe_nom', function ($v, array $item) {
    return '<a href="' . CrudHelper::getUpdateFormUrl('oui.equipe', $item['equipe_id']) . '">' . $v . '</a>';
});

$table->setTransformer('membres_pseudo', function ($v, array $item) {
    return '<a href="' . CrudHelper::getUpdateFormUrl('oui.membres', $item['membres_id']) . '">' . $v . '</a>';
});




$table->displayTable();

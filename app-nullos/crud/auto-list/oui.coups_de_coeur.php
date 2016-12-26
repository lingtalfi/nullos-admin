<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
c.id,
c.videos_id,
o.titre as videos_titre,
c.position
';


$query = "select
%s
from oui.coups_de_coeur c
inner join oui.videos o on o.id=c.videos_id
";


$table = CrudModule::getDataTable("oui.coups_de_coeur", $query, $fields, ['id']);

$table->title = "Coups de coeur";


$table->columnLabels= [
    "id" => "id",
    "videos_titre" => "videos",
    "position" => "position",
];


$table->hiddenColumns = [
    "id",
    "videos_id",
];


$table->setTransformer('videos_titre', function ($v, array $item) {
    return '<a href="' . CrudHelper::getUpdateFormUrl('oui.videos', $item['videos_id']) . '">' . $v . '</a>';
});




$table->displayTable();

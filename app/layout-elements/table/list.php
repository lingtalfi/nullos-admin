<?php


//$t = TableConfig::create();


//$fields = '
//c.id,
//c.titre,
//c.url_photo,
//c.url_video,
//c.date_debut,
//c.date_fin,
//e.nom as equipe_nom
//';
//$markers = [];
//$pageGetKey = 'page';
//
//$query = "select
//%s
//from concours c
//inner join equipe e on e.id=c.equipe_id
//";
//
//
//$table = new DataTable();
//$table->title = "Liste des concours";
//$table->printTable($query, $fields, ['id']);


$fields = '
v.id,
v.active,
u.pseudo as user_pseudo, 
c.titre as concours_titre,
v.url,
v.nb_vues,
v.nb_likes,
v.date_creation
';
$pageGetKey = 'page';

$query = "select
%s
from videos v
inner join users u on u.id=v.users_id
inner join concours c on c.id=v.concours_id
";


$table = new DataTable();
//$table->searchColumns = ['v.url', 'c.titre'];
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
];
$table->nbItemsPerPage = 5;
$table->sortColumn = 'id';
$table->sortColumnDir = 'desc';
//$table->customizeWidget('pagination', false);
//$table->customizeWidget('search', false);
//$table->customizeWidget('multipleActions', false);

$table->registerSingleAction('ric_link', '<a class="postlink" data-action="ric_link" data-ric="{ric}" href="#">Click me</a>', function($table, array $ric){
    a("table: $table, ric: " . implode(', ', $ric));
});
// string(23) "table: videos, ric: 195"

$table->setTransformer('url', function($v){
    return '<a target="_blank" href="'. htmlspecialchars($v) .'">'. $v .'</a>';
});



$table->printTable('videos', $query, $fields, ['id']);
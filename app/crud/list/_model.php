<?php

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


// change $_GET keys
//$table->pageGetKey = 'page';
//$table->nbItemsPerPageGetKey = 'nipp';
//$table->sortColumnGetKey = 'sort';
//$table->sortColumnDirGetKey = 'dir';
//$table->searchGetKey = 'search';


//$this->nbItemsPerPage = 50;
//$this->sortColumn = null;
//$this->sortColumnDir = null;
//$this->nbItemsPerPageList = [5, 10, 25, 50, 100, 250, 'all']; // all is a special value


$table->title = "Liste des vidéos";


//$this->multipleActions = [
//    'deleteAll' => [
//        'Delete all',
//        ':deleteAll', // this is a special notation to indicate that we want to use the deleteAll method of THIS class
//    ],
//];

//$this->singleActions = [
//    'edit' => ['<a href="/table?name={tableName}&action=edit&ric={ric}">Edit</a>'],
//    // :delete is a special notation to indicate that we want to use the delete method of THIS class
//    'delete' => ['<a class="postlink" data-action="delete" data-ric="{ric}" href="#">Delete</a>', ':delete'],
//];


//$table->searchColumns = ['v.url', 'c.titre'];
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


//$table->customizeWidget('pagination', false);
//$table->customizeWidget('search', false);
//$table->customizeWidget('multipleActions', false);

$table->registerSingleAction('ric_link', '<a class="postlink" data-action="ric_link" data-ric="{ric}" href="#">Click me</a>', function ($table, array $ric) {
    a("table: $table, ric: " . implode(', ', $ric));
});



$table->setTransformer('url', function ($v) {
    return '<a target="_blank" href="' . htmlspecialchars($v) . '">' . $v . '</a>';
});
$table->setTransformer('concours_titre', function ($v, array $item) {
    return '<a href="/table?name=concours&action=edit&ric=' . $item['concours_id'] . '">' . $v . '</a>';
});




$table->printTable('videos', $query, $fields, ['id']);
<?php


use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
c.id,
c.equipe_id, 
o.nom as equipe_nom,
c.titre,
c.url_video,
c.lots
';


$query = "select
%s
from oui.concours c
inner join oui.equipe o on o.id=c.equipe_id
";


$table = CrudModule::getDataTable();

$table->title = "Concours";
$table->actionColumnsPosition = "left";

$table->columnHeaders = [
    "equipe_nom" => "equipe",
    "url_video" => "url video",
];

$table->hiddenColumns = [
    "id",
    "equipe_id",
];


$table->setTransformer('url_video', function ($v) {
    return '<a href="' . htmlspecialchars($v) . '">' . $v . '</a>';
});

$n = 30;
$table->setTransformer('lots', function ($v) use ($n) {
    return substr($v, 0, $n) . '...';
});

$table->setTransformer('equipe_nom', function ($v, array $item) {
    return '<a href="' . CrudHelper::getUpdateFormUrl('oui.equipe', $item['equipe_id']) . '">' . $v . '</a>';
});


$table->customizeWidget("pageSelector", false);
$table->customizeWidget("search", false);
$table->customizeWidget("newItemLink", false);
$table->customizeWidget("nippSelector", false);
$table->customizeWidget("pagination", false);
$table->customizeWidget("multipleActions", true);


$table->showCheckboxes = true;


$table->dropSingleActions();


$table->registerSingleAction('edit', '<a class="action-link" href="' . CrudHelper::getUpdateFormUrl('{tableName}', '{ric}') . '">My Edit</a>');
$table->registerSingleAction('delete', '<a class="action-link postlink confirmlink" data-action="delete" data-ric="{ric}" href="#">My Delete</a>', ":delete");
$table->registerSingleAction('debug', '<a class="action-link postlink" data-action="debug" data-ric="{ric}" href="#">Debug row</a>', function($table, array $ric){
    a("The table is $table");
    a($ric);
});


$table->dropMultipleActions();
$table->registerMultipleAction('deleteAll', "My delete all", ":deleteAll", true);
$table->registerMultipleAction('debugRows', "Debug rows", function($tables, array $rics){
    a(func_get_args());
}, false); // <---(here)


$table->printTable('oui.concours', $query, $fields, ['id']);

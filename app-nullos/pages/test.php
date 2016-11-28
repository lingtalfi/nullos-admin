<?php


use Crud\DataTable;

$fields = '
v.id,
v.active,
v.users_id,
u.email as users_email,
v.concours_id,
c.titre as concours_titre,
v.titre,
v.url,
v.url_photo,
v.nb_likes,
v.nb_vues,
v.date_creation
';


$query = "select
%s
from oui.videos v
inner join oui.concours c on c.id=v.concours_id
inner join oui.users u on u.id=v.users_id
";



$table = new DataTable();
$ric = ['id'];
$table->printTable('oui.videos', $query, $fields, $ric);
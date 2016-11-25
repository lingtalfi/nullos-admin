<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
u.id,
u.active,
u.email,
u.pseudo,
u.password,
u.url_photo,
u.nom,
u.prenom,
u.sexe,
u.date_naissance,
u.code_postal,
u.ville,
u.pays_id,
p.nom as pays_nom,
u.niveaux_id,
n.nom as niveaux_nom,
u.biographie,
u.influences,
u.prochains_concerts,
u.sites_internet,
u.newsletter,
u.show_sexe,
u.show_date_naissance,
u.show_niveau
';


$query = "select
%s
from users u
inner join niveaux n on n.id=u.niveaux_id
inner join pays p on p.id=u.pays_id
";


$table = CrudModule::getDataTable();

$table->title = "Utilisateurs";


$table->columnHeaders = [
    "id" => "id",
    "active" => "actif",
    "email" => "email",
    "pseudo" => "pseudo",
    "password" => "mot de passe",
    "url_photo" => "url de la photo",
    "nom" => "nom",
    "prenom" => "prenom",
    "sexe" => "sexe",
    "date_naissance" => "date naissance",
    "code_postal" => "code postal",
    "ville" => "ville",
    "pays_nom" => "pays",
    "niveaux_nom" => "niveau",
    "biographie" => "biographie",
    "influences" => "influences",
    "prochains_concerts" => "prochains concerts",
    "sites_internet" => "sites internet",
    "newsletter" => "newsletter",
    "show_sexe" => "affichage sexe",
    "show_date_naissance" => "affichage date de naissance",
    "show_niveau" => "affichage niveau",
];


$table->hiddenColumns = [
    "id",
    "pays_id",
    "niveaux_id",
];


$table->setTransformer('url_photo', function ($v) {
    return '<a href="' . htmlspecialchars($v) . '">' . $v . '</a>';
});


$n = 30;
$table->setTransformer('biographie', function ($v) use ($n) {
    return substr($v, 0, $n) . '...';
});
$table->setTransformer('influences', function ($v) use ($n) {
    return substr($v, 0, $n) . '...';
});
$table->setTransformer('prochains_concerts', function ($v) use ($n) {
    return substr($v, 0, $n) . '...';
});
$table->setTransformer('sites_internet', function ($v) use ($n) {
    return substr($v, 0, $n) . '...';
});


$table->setTransformer('pays_nom', function ($v, array $item) {
    return '<a href="' . CrudHelper::getUpdateFormUrl('pays', $item['pays_id']) . '">' . $v . '</a>';
});

$table->setTransformer('niveaux_nom', function ($v, array $item) {
    return '<a href="' . CrudHelper::getUpdateFormUrl('niveaux', $item['niveaux_id']) . '">' . $v . '</a>';
});




$table->printTable('users', $query, $fields, ['id']);

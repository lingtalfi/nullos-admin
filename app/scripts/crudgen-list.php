<?php


require_once __DIR__ . "/../init.php";


use Crud\CrudGenerator;


$table = 'configuration';
$table = 'users';
$table = 'users_has_instruments';
$table = 'concours';
$table = 'videos';

$gen = new CrudGenerator();
$gen->foreignKeyPrettierColumns = [


    'equipe' => 'nom',
    'membres' => 'pseudo',
    'videos' => 'titre',
    'users' => 'pseudo',
    'concours' => 'titre',
    'pays' => 'nom',
    'instruments' => 'nom',
    'niveaux' => 'nom',
    'styles_musicaux' => 'nom',

];

$gen->fixPrettyColumnNames = [
    'instruments_id' => 'instruments',
];

$gen->prettyTableNames = [
    'equipe' => 'équipe',
    'equipe_has_membres' => "membres des équipes",
    'videos' => "vidéos",
    'users_has_instruments' => "instruments des utilisateurs",
    'users_has_styles_musicaux' => "styles musical des utilisateurs",
];

$gen->urlTransformerIf = function ($c) {
    return (false !== strpos($c, 'url_'));
};



$gen->generateLists();





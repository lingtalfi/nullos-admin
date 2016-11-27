<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
ville_id,
ville_departement,
ville_slug,
ville_nom,
ville_nom_simple,
ville_nom_reel,
ville_nom_soundex,
ville_nom_metaphone,
ville_code_postal,
ville_commune,
ville_code_commune,
ville_arrondissement,
ville_canton,
ville_amdi,
ville_population_2010,
ville_population_1999,
ville_population_2012,
ville_densite_2010,
ville_surface,
ville_longitude_deg,
ville_latitude_deg,
ville_longitude_grd,
ville_latitude_grd,
ville_longitude_dms,
ville_latitude_dms,
ville_zmin,
ville_zmax
';


$query = "select
%s
from ville.villes_france_free
";


$table = CrudModule::getDataTable();

$table->title = "Villes france free";


$table->columnHeaders = [
    "ville_id" => "ville id",
    "ville_departement" => "ville departement",
    "ville_slug" => "ville slug",
    "ville_nom" => "ville nom",
    "ville_nom_simple" => "ville nom simple",
    "ville_nom_reel" => "ville nom reel",
    "ville_nom_soundex" => "ville nom soundex",
    "ville_nom_metaphone" => "ville nom metaphone",
    "ville_code_postal" => "ville code postal",
    "ville_commune" => "ville commune",
    "ville_code_commune" => "ville code commune",
    "ville_arrondissement" => "ville arrondissement",
    "ville_canton" => "ville canton",
    "ville_amdi" => "ville amdi",
    "ville_population_2010" => "ville population 2010",
    "ville_population_1999" => "ville population 1999",
    "ville_population_2012" => "ville population 2012",
    "ville_densite_2010" => "ville densite 2010",
    "ville_surface" => "ville surface",
    "ville_longitude_deg" => "ville longitude deg",
    "ville_latitude_deg" => "ville latitude deg",
    "ville_longitude_grd" => "ville longitude grd",
    "ville_latitude_grd" => "ville latitude grd",
    "ville_longitude_dms" => "ville longitude dms",
    "ville_latitude_dms" => "ville latitude dms",
    "ville_zmin" => "ville zmin",
    "ville_zmax" => "ville zmax",
];


$table->hiddenColumns = [
    "ville_id",
];


$table->printTable('ville.villes_france_free', $query, $fields, ['ville_id']);

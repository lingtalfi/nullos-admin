<?php


use Crud\CrudModule;


$form = CrudModule::getForm('concours', ['id']);


// common
//$form->controlErrorLocation = 'local';
//$form->allowMultipleErrorsPerControl = true;


// instance specific
$form->title = null;
$form->labels = [
    'equipe_id' => 'equipe',
    'url_photo' => 'photo url',
    'url_video' => 'video url',
    'date_debut' => 'starts at',
    'date_fin' => 'ends at',
    'reglement' => 'règlement',
];
$form->insertDefaults = [
    'date_debut' => '2014-06-05 14:05:00',
];







$form->addControl('equipe_id')->type("selectByRequest", "select id, nom from equipe");
$form->addControl('titre')->type("text")
    ->addConstraint("required")
    ->addConstraint("minChar", 5)
;
$form->addControl('url_photo')->type("text");
$form->addControl('url_video')->type("text");
$form->addControl('date_debut')->type("date6");
$form->addControl('date_fin')->type("date6");
//$form->addControl('lots')->type("message");
$form->addControl('reglement')->type("message");
$form->addControl('description')->type("message");


$form->display();
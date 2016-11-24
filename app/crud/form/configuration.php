<?php


use Crud\CrudModule;


$form = CrudModule::getForm('configuration', ['cle']);


$form->labels = [
    'cle' => 'clé',
];



$form->addControl('cle')->type("text")
    ->addConstraint("required");
$form->addControl('valeur')->type("text");


$form->display();
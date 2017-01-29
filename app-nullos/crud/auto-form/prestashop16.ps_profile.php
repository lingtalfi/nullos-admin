<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_profile", ['id_profile']);



$form->labels = [
    "id_profile" => "id profile",
];


$form->title = "Ps profile";




$form->display();

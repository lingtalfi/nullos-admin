<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_cms_role", ['id_cms_role', 'id_cms']);



$form->labels = [
    "id_cms_role" => "id cms role",
    "name" => "name",
    "id_cms" => "id cms",
];


$form->title = "Ps cms role";


$form->addControl("name")->type("text");
$form->addControl("id_cms")->type("text")
->value(0);


$form->display();

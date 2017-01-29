<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_attachment", ['id_attachment']);



$form->labels = [
    "id_attachment" => "id attachment",
    "file" => "file",
    "file_name" => "file name",
    "file_size" => "file size",
    "mime" => "mime",
];


$form->title = "Ps attachment";


$form->addControl("file")->type("text");
$form->addControl("file_name")->type("text");
$form->addControl("file_size")->type("text")
->value("0");
$form->addControl("mime")->type("text");


$form->display();

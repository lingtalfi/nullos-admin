<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_customer_message_sync_imap", ['md5_header']);



$form->labels = [
    "md5_header" => "md5 header",
];


$form->title = "Ps customer message sync imap";


$form->addControl("md5_header")->type("text");


$form->display();

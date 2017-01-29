<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_mail,
recipient,
template,
subject,
id_lang,
date_add
';


$query = "select
%s
from prestashop16.ps_mail
";


$table = CrudModule::getDataTable("prestashop16.ps_mail", $query, $fields, ['id_mail']);

$table->title = "Ps mail";


$table->columnLabels= [
    "id_mail" => "id mail",
    "recipient" => "recipient",
    "template" => "template",
    "subject" => "subject",
    "id_lang" => "id lang",
    "date_add" => "date add",
];


$table->hiddenColumns = [
    "id_mail",
];


$table->displayTable();

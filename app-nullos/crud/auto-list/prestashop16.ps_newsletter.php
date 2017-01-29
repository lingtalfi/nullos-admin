<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id,
id_shop,
id_shop_group,
email,
newsletter_date_add,
ip_registration_newsletter,
http_referer,
active
';


$query = "select
%s
from prestashop16.ps_newsletter
";


$table = CrudModule::getDataTable("prestashop16.ps_newsletter", $query, $fields, ['id']);

$table->title = "Ps newsletter";


$table->columnLabels= [
    "id" => "id",
    "id_shop" => "id shop",
    "id_shop_group" => "id shop group",
    "email" => "email",
    "newsletter_date_add" => "newsletter date add",
    "ip_registration_newsletter" => "ip registration newsletter",
    "http_referer" => "http referer",
    "active" => "active",
];


$table->hiddenColumns = [
    "id",
];


$table->displayTable();

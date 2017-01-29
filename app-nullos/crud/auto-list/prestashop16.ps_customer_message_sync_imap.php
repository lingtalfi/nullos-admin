<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
md5_header
';


$query = "select
%s
from prestashop16.ps_customer_message_sync_imap
";


$table = CrudModule::getDataTable("prestashop16.ps_customer_message_sync_imap", $query, $fields, ['md5_header']);

$table->title = "Ps customer message sync imap";


$table->columnLabels= [
    "md5_header" => "md5 header",
];


$table->displayTable();

<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_cronjob,
id_module,
description,
task,
hour,
day,
month,
day_of_week,
updated_at,
one_shot,
active,
id_shop,
id_shop_group
';


$query = "select
%s
from prestashop16.ps_cronjobs
";


$table = CrudModule::getDataTable("prestashop16.ps_cronjobs", $query, $fields, ['id_cronjob']);

$table->title = "Ps cronjobs";


$table->columnLabels= [
    "id_cronjob" => "id cronjob",
    "id_module" => "id module",
    "description" => "description",
    "task" => "task",
    "hour" => "hour",
    "day" => "day",
    "month" => "month",
    "day_of_week" => "day of week",
    "updated_at" => "updated at",
    "one_shot" => "one shot",
    "active" => "active",
    "id_shop" => "id shop",
    "id_shop_group" => "id shop group",
];


$table->hiddenColumns = [
    "id_cronjob",
];


$n = 30;
$table->setTransformer('description', function ($v) use ($n) {
    return substr($v, 0, $n) . '...';
});
$table->setTransformer('task', function ($v) use ($n) {
    return substr($v, 0, $n) . '...';
});


$table->displayTable();

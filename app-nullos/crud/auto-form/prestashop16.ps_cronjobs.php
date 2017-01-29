<?php


use Crud\CrudModule;

$form = CrudModule::getForm("prestashop16.ps_cronjobs", ['id_cronjob']);



$form->labels = [
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


$form->title = "Ps cronjobs";


$form->addControl("id_module")->type("text")
->value(0);
$form->addControl("description")->type("message");
$form->addControl("task")->type("message");
$form->addControl("hour")->type("text")
->value("-1");
$form->addControl("day")->type("text")
->value("-1");
$form->addControl("month")->type("text")
->value("-1");
$form->addControl("day_of_week")->type("text")
->value("-1");
$form->addControl("updated_at")->type("date6");
$form->addControl("one_shot")->type("text")
->value("0");
$form->addControl("active")->type("text")
->value("0");
$form->addControl("id_shop")->type("text")
->value("0");
$form->addControl("id_shop_group")->type("text")
->value("0");


$form->display();

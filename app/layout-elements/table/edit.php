<?php


/**
 * There are three types of tables:
 *
 * - with auto-increment
 * - with multiple indexes (ric)
 * - with no indexes
 *
 *
 * And two types of form interactions:
 *
 * - insert
 * - update
 *
 * In this script, we only treat the update case (where ric is provided),
 * but the Form object should be used for both insert and updates.
 *
 *
 *
 *
 *
 *
 * Advanced, optional, later---
 * Some form can insert/update in multiple tables at the same time,
 * typically when a table HAS items, and you want to provide a gui way of adding multiple items
 * from the same form.
 *
 *
 */


$form = new Form('concours', ['id']);
//$form->setFeedRequest('select * from concours where id=:id', ['id' => (int)$id]);
//$form->setRicValues(['id' => (int)$id]);



$form->insertDefaults = [
    'date_debut' => '2014-06-05 14:05:00',
];



$form->addControl('equipe_id')->type("selectByRequest", "select id, nom from equipe");
$form->addControl('titre')->type("text");
$form->addControl('url_photo')->type("text");
$form->addControl('url_video')->type("text");
$form->addControl('date_debut')->type("date6");
$form->addControl('date_fin')->type("date6");
$form->addControl('lots')->type("message");
$form->addControl('reglement')->type("message");
$form->addControl('description')->type("message");


$form->display();
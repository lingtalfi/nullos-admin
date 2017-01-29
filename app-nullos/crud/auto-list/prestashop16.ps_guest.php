<?php

use Crud\CrudHelper;
use Crud\CrudModule;

$fields = '
id_guest,
id_operating_system,
id_web_browser,
id_customer,
javascript,
screen_resolution_x,
screen_resolution_y,
screen_color,
sun_java,
adobe_flash,
adobe_director,
apple_quicktime,
real_player,
windows_media,
accept_language,
mobile_theme
';


$query = "select
%s
from prestashop16.ps_guest
";


$table = CrudModule::getDataTable("prestashop16.ps_guest", $query, $fields, ['id_guest']);

$table->title = "Ps guest";


$table->columnLabels= [
    "id_guest" => "id guest",
    "id_operating_system" => "id operating system",
    "id_web_browser" => "id web browser",
    "id_customer" => "id customer",
    "javascript" => "javascript",
    "screen_resolution_x" => "screen resolution x",
    "screen_resolution_y" => "screen resolution y",
    "screen_color" => "screen color",
    "sun_java" => "sun java",
    "adobe_flash" => "adobe flash",
    "adobe_director" => "adobe director",
    "apple_quicktime" => "apple quicktime",
    "real_player" => "real player",
    "windows_media" => "windows media",
    "accept_language" => "accept language",
    "mobile_theme" => "mobile theme",
];


$table->hiddenColumns = [
    "id_guest",
];


$table->displayTable();

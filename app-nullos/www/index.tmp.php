<?php


use Linguist\Util\LinguistEqualizer;


require_once __DIR__ . "/../init.php";



$srcFile = "/Volumes/Macintosh HD 2/it/php/projects/nullos-admin/app-nullos/lang/ch/aa.php";
$dstFile = "/Volumes/Macintosh HD 2/it/php/projects/nullos-admin/app-nullos/lang/fr/aa.php";



$defs = [
    'Log In' => "Rateau",
];

LinguistEqualizer::copyWithComments($srcFile, $dstFile, $defs);
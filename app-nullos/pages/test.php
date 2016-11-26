<?php


require_once "bigbang.php";

use ArrayToString\ArrayToStringUtil;
use ArrayToString\SymbolManager\PhpArrayToStringSymbolManager;


$a = [
    'pou' => 456,
    'aaa' => 777,
    'bbb' => [
        'omélie' => 'archeval',
        'pedros' => 'la casa',
    ],
];

header("content-type: text/plain");
$manager = new PhpArrayToStringSymbolManager();
$manager->setNbSpaces(4);
$manager->setIndentationCallback(function ($spaceSymbol, $nbSpaces, $level) {
    if (1 === $level) {
        return str_repeat($spaceSymbol, 4);
    }
    return str_repeat($spaceSymbol, $nbSpaces * $level);
});
$manager->setEndSymbol(function ($level) {
    if (1 === $level) {
        return ']';
    }
    return ']';
});



echo 'return ' . ArrayToStringUtil::create()->setSymbolManager($manager)->toString($a) . ';';

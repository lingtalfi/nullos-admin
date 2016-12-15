<?php


use Tokens\TokenRegex\Element\AtomElement;
use Tokens\TokenRegex\RegexEngine;
use Tokens\TokenRegex\TokenModel;

require_once __DIR__ . "/../init.php";


$model = TokenModel::create()
    ->addAtom(AtomElement::create()->symbol('c'))
    ->addAtom(AtomElement::create()->symbol('h'))
    ->addAtom(AtomElement::create()->symbol('i'))
    ->addAtom(AtomElement::create()->symbol('e'))
    ->addAtom(AtomElement::create()->symbol('n'));


$tokenIdentifiers = [
    'a',
    'b',
    'c',
    'h',
    'i',
    'e',
    'n',
    'c',
];
$s = '';
RegexEngine::create()->match($tokenIdentifiers, $model, function (array $match, array $markers = null) use (&$s) {
    foreach ($match as $element) {
        $s .= $element;
    }
});
a($s);



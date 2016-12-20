<?php


use Linguist\Util\LinguistScanner;
use NullosInfo\Util\InfoScanner;
use QuickDoc\Util\TocUtil;
use QuickDoc\Util\TodoUtil;
use SequenceMatcher\Element\Group;
use SequenceMatcher\Model;
use SequenceMatcher\SequenceMatcher;
use Tokens\SequenceMatcher\Element\TokenEntity;
use Tokens\SequenceMatcher\Util\TokensSequenceMatcherUtil;
use Tokens\Tokens;

require_once __DIR__ . "/../init.php";


ini_set('display_errors', 1);


a(InfoScanner::getLogCalls());



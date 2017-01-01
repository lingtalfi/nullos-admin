<?php


use ModuleInstaller\Universe\UniverseUtil;
use ModuleInstaller\Util\ListFilesUtil;
use QuickDoc\Util\TreeUtil;
use Tokens\Util\UseStatementsUtil as UseStatementsUtil;

require_once __DIR__ . "/../init.php";


$files = (ListFilesUtil::getModuleFiles('Counter'));
foreach ($files as $file) {
    echo '"' . $file . '",<br>';
}
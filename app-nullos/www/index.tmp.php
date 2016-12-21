<?php


use Bat\FileSystemTool;
use QuickDoc\Util\TreeUtil;

require_once __DIR__ . "/../init.php";


ini_set('display_errors', 1);


header('Content-Type: text/plain');
$srcDir = APP_ROOT_DIR . "/../doc-abstract";
$filter = function ($file, $realFile, $level) {
    if (is_dir($realFile)) {
        return true;
    }
    $ext = strtolower(FileSystemTool::getFileExtension($file));
    return ('md' === $ext);
};
$s = TreeUtil::createTree($srcDir);
echo $s;



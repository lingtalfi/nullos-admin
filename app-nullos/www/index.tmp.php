<?php


use Bat\FileSystemTool;
use Crud\ArrayDataTable;
use FrontOne\FrontOneInstaller;
use Layout\LayoutBridge;
use QuickDoc\Util\TreeUtil;

require_once __DIR__ . "/../init.php";


ini_set('display_errors', 1);




//FrontOneInstaller::install();
FrontOneInstaller::uninstall();

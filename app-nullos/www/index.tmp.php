<?php


use Bat\FileSystemTool;
use Crud\ArrayDataTable;
use FrontOne\FrontOneInstaller;
use Layout\LayoutBridge;
use ModuleInstaller\ModuleInstallerUtil;
use QuickDoc\Util\TreeUtil;

require_once __DIR__ . "/../init.php";


ini_set('display_errors', 1);


a(FileSystemTool::tempDir()); // /private/var/tmp/cTzJZe
a(FileSystemTool::tempDir(__DIR__)); // /Users/me/webproject/www/XJEubG
a(FileSystemTool::tempDir(null, '/private/var/tmp/xxxijtKdi'));
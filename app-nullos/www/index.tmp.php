<?php


use Bat\FileSystemTool;
use Crud\ArrayDataTable;
use FrontOne\FrontOneInstaller;
use Layout\LayoutBridge;
use ModuleInstaller\ModuleInstallerUtil;
use QuickDoc\Util\TreeUtil;

require_once __DIR__ . "/../init.php";


ini_set('display_errors', 1);




a(ModuleInstallerUtil::getModulesList());
//FrontOneInstaller::install();
//FrontOneInstaller::uninstall();

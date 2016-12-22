<?php


namespace FrontOne;

use FrontOne\Installer\Operations\DeployFilesOperation;
use FrontOne\Installer\Operations\Init\InstallInitAutoloadOperation;
use FrontOne\Installer\Operations\Init\UninstallInitAutoloadOperation;
use FrontOne\Installer\Operations\Layout\InstallLayoutBridgeDisplayLeftMenuBlockOperation;
use FrontOne\Installer\Operations\Layout\UninstallLayoutBridgeDisplayLeftMenuBlockOperation;
use FrontOne\Installer\Operations\RemoveFilesOperation;
use FrontOne\Installer\Operations\Router\InstallRouterBridgeUri2PagesOperation;
use FrontOne\Installer\Operations\Router\UninstallRouterBridgeUri2PagesOperation;
use Installer\Installer;
use Installer\Report\Report;


/**
 * Install process is composed of many operations
 *
 * Each operation can add messages to the Report.
 *
 * An operation can throw an AbortInstallException, which would stop the
 * whole process.
 *
 * An operation can throw any other exception, which would automatically be added
 * to the report.
 *
 */
class FrontOneInstaller
{
    public static function install()
    {
        /**
         * Deploy Files:
         * - /app-vitrine-one/
         * - /pages/modules/frontOne/
         * - /layout-elements/nullos/modules/frontOne/
         * - /lang/++/modules/frontOne/
         * - /assets/modules/frontOne/
         * - ../class-shared
         * - /services/modules/frontOne/
         *
         *
         * Hook into:
         * - class/Router/RouterBridge
         * - class/Layout/LayoutBridge
         * - init.php (autoloader)
         */
        $installer = new Installer();
        $installer->addOperation(InstallInitAutoloadOperation::create());
        $installer->addOperation(InstallLayoutBridgeDisplayLeftMenuBlockOperation::create());
        $installer->addOperation(InstallRouterBridgeUri2PagesOperation::create());
        $installer->addOperation(DeployFilesOperation::create());

        $report = new Report();
        $installer->run($report);
        return $report;
    }


    public static function uninstall()
    {
        $installer = new Installer();
        $installer->addOperation(UninstallInitAutoloadOperation::create());
        $installer->addOperation(UninstallLayoutBridgeDisplayLeftMenuBlockOperation::create());
        $installer->addOperation(UninstallRouterBridgeUri2PagesOperation::create());
        $installer->addOperation(RemoveFilesOperation::create());


        $report = new Report();
        $installer->run($report);
        return $report;
    }
}
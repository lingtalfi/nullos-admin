<?php


namespace FrontOne;


use Installer\Installer;
use Installer\Operation\Init\InitAutoloadOperation\InitAutoloadOperation;
use Installer\Operation\LayoutBridge\LayoutBridgeDisplayLeftMenuBlocksOperation;
use Installer\Operation\RouterBridge\RouterBridgeUri2PagesOperation;
use Installer\Report\Report;
use Installer\WithPackModuleInstaller;


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
class FrontOneInstaller extends WithPackModuleInstaller
{
    public function install()
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
        $installer->addOperation(InitAutoloadOperation::create()->setLocationTransformer(function (array &$locations) {
            $loc = '__DIR__ . "/../class-shared"';
            if (false === in_array($loc, $locations, true)) {
                $locations[] = $loc;
            }
        }));
        $installer->addOperation(LayoutBridgeDisplayLeftMenuBlocksOperation::create()->setLocationTransformerAfter('FrontOneModule::displayLeftMenuBlocks()', 'ToolsLeftMenuSectionModule'));
        $installer->addOperation(RouterBridgeUri2PagesOperation::create()->setLocationTransformerAppend('FrontOneModule::decorateUri2PagesMap($uri2pagesMap)'));


        $this->prepareDeployFiles($installer);

        $report = new Report();
        $installer->run($report);
        return $report;
    }


    public function uninstall()
    {
        $installer = new Installer();
        $installer->addOperation(InitAutoloadOperation::create()->setLocationTransformer(function (array &$locations) {
            $loc = '__DIR__ . "/../class-shared"';
            foreach ($locations as $k => $loca) {
                if ($loca === $loc) {
                    unset($locations[$k]);
                }
            }
        }));
        $installer->addOperation(LayoutBridgeDisplayLeftMenuBlocksOperation::create()->setLocationTransformerRemoveBySubstr('FrontOneModule::displayLeftMenuBlocks()'));
        $installer->addOperation(RouterBridgeUri2PagesOperation::create()->setLocationTransformerRemoveBySubstr('FrontOneModule::decorateUri2PagesMap'));

        $this->prepareRemoveFiles($installer);

        $report = new Report();
        $installer->run($report);
        return $report;
    }


    //------------------------------------------------------------------------------/
    // PACKER
    //------------------------------------------------------------------------------/
    protected function getSources()
    {
        return [
            'class-shared/FrontOne',
            'app-vitrine-one',
            'app-nullos/lang/en/modules/frontOne',
            'app-nullos/layout-elements/nullos/modules/frontOne',
            'app-nullos/pages/modules/frontOne',
            'app-nullos/www/services/modules/frontOne',
        ];
    }

    protected function getTargetDir()
    {
        return APP_ROOT_DIR . "/..";
    }

    protected function getSourceDir()
    {
        return __DIR__ . "/InstallAssets/project";
    }


}
<?php


namespace QuickStart;

use Bat\FileSystemTool;
use Crud\CrudModule;
use Privilege\Privilege;

class QuickStartModule
{


    public static function decorateUri2PagesMap(array &$uri2pagesMap)
    {
        $uri2pagesMap['/quickstart'] = 'modules/quickstart/quickstart.php';
    }


    public static function displayLeftMenuBlocks()
    {

        $ll = "modules/quickstart/quickstart";

        if (true === QuickStartConfig::showLeftMenuLinks()) {
            if (Privilege::has('quickStart.access')):
                ?>
                <section class="section-block table-links">
                    <h3><?php echo __("Quickstart", $ll); ?></h3>
                    <ul class="linkslist">
                        <li>
                            <a href="<?php echo self::getQuickStartUrl('configure'); ?>"><?php echo __("Configure", $ll); ?></a>
                        </li>
                        <li>
                            <a href="<?php echo self::getQuickStartUrl('reset'); ?>"><?php echo __("Reset", $ll); ?></a>
                        </li>
                    </ul>
                </section>
                <?php
            endif;
        }
    }


    public static function getQuickStartUrl($action = null, array $params = null)
    {
        if (null === $action) {
            $action = 'start';
        }
        if (null === $params) {
            $params = [];
        }
        $params['action'] = $action;
        return url('/quickstart', $params, false);
    }




    public static function reset($removeInit = true, $resetCrudConfig = true, $emptyCrudFilesDir = true)
    {

        // remove init file
        if (true === $removeInit) {
            $init = __DIR__ . "/../../init.php";
            if (file_exists($init)) {
                unlink($init);
            }
        }

        if (true === $resetCrudConfig) {
            CrudModule::resetCrudConfig();
        }

        if ($emptyCrudFilesDir) {
            CrudModule::emptyCrudFilesDirectories();
        }
    }

}
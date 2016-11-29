<?php


namespace QuickStart;

use Bat\FileSystemTool;
use Crud\CrudModule;
use Privilege\Privilege;

class QuickStartModule
{

    public static function displayLeftMenuLinks()
    {

        if (true === QuickStartConfig::showLeftMenuLinks()) {
            if (Privilege::has('quickstart.access')):
                ?>
                <section class="section-block table-links">
                    <h3><?php echo __("Quickstart", "quickstart"); ?></h3>
                    <ul class="linkslist">
                        <li>
                            <a href="<?php echo self::getQuickStartUrl('configure'); ?>"><?php echo __("Configure", "quickstart"); ?></a>
                        </li>
                        <li>
                            <a href="<?php echo self::getQuickStartUrl('crud-generators'); ?>"><?php echo __("Crud Generators", "quickstart"); ?></a>
                        </li>
                        <li>
                            <a href="<?php echo self::getQuickStartUrl('reset'); ?>"><?php echo __("Reset", "quickstart"); ?></a>
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


    public static function generateInitTmp(array $tags = [])
    {
        $defaults = [
            '{dbNameLocal}' => 'my_db',
            '{dbUserLocal}' => 'root',
            '{dbPassLocal}' => 'root',
            //
            '{dbNameDistant}' => 'my_db',
            '{dbUserDistant}' => 'root',
            '{dbPassDistant}' => 'root',


            '{websiteName}' => 'Nullos admin',

            '{lang}' => 'en',
        ];
        $ftags = [];
        foreach ($tags as $k => $v) {
            $ftags['{' . $k . '}'] = $v;
        }

        $_tags = array_replace($defaults, $ftags);


        $s = file_get_contents(__DIR__ . "/template/init-tmp.php");
        $s2 = str_replace(array_keys($_tags), array_values($_tags), $s);
        $file = APP_ROOT_DIR . "/init.php";
        if (false !== file_put_contents($file, $s2)) {
            return true;
        }
        return false;
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
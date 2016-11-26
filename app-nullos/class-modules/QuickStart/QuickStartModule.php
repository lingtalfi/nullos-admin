<?php


namespace QuickStart;

use Privilege\Privilege;
use QuickPdo\QuickPdoInfoTool;

class QuickStartModule
{

    public static function displayLeftMenuLinks()
    {

//        $db = QuickPdoInfoTool::getDatabase();
//        $tables = QuickPdoInfoTool::getTables($db);


        /**
         * The start links page contains a form with:
         *
         * - user
         * - password
         * - ?db (in second page?)
         *
         */
        if (Privilege::has('quickstart.access')):
            ?>


            <section class="section-block table-links">
                <h3>Quickstart</h3>
                <ul class="linkslist">
                    <li><a href="<?php echo self::getQuickStartUrl('start'); ?>">Start</a></li>
                </ul>
            </section>
            <?php
        endif;
    }


    public static function getQuickStartUrl($action = null)
    {
        if (null === $action) {
            $action = 'start';
        }
        return url('/quickstart?action=' . $action);
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

}
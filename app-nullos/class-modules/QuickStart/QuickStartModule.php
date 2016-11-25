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


        if (Privilege::has('quickstart.access')):
            ?>


            <section class="section-block table-links">
                <h3>Quickstart</h3>
                <ul class="linkslist">
                    <li>
                        <a href="<?php echo self::getQuickStartUrl(''); ?>">Start</a>
                    </li>
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

}
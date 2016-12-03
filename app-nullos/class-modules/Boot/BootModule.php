<?php

namespace Boot;


use Privilege\Privilege;

class BootModule
{

    public static function applicationIsInitialized()
    {
        return (false === defined('I_AM_JUST_THE_FALLBACK_INIT'));
    }


    public static function decorateUri2PagesMap(array &$uri2pagesMap)
    {
        $uri2pagesMap[BootConfig::getBootUri()] = BootConfig::getBootPage();
    }


    public static function displayToolsLeftMenuLinks()
    {

        $ll = "modules/boot/boot";
        if (Privilege::has('boot.access')):
            ?>
            <li>
                <a href="<?php echo self::getUrl('boot'); ?>"><?php echo __("Init writer", $ll); ?></a>
            </li>
            <?php
        endif;
    }



    public static function getUrl()
    {
        return BootConfig::getBootUri();
    }

}
<?php

namespace LeftMenuSection\Tools;


use Layout\LayoutBridge;
use Privilege\Privilege;

class ToolsLeftMenuSectionModule
{
    public static function displayLeftMenuBlocks()
    {
        if (Privilege::has('toolsLeftMenuSection.access')):
            ?>
            <section class="section-block tools">
                <h3>Tools</h3>
                <ul class="linkslist">
                    <?php LayoutBridge::displayToolsLeftMenuLinks(); ?>
                </ul>
            </section>
            <?php
        endif;

    }
}
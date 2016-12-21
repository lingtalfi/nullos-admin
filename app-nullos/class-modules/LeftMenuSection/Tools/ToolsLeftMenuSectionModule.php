<?php

namespace LeftMenuSection\Tools;


use Layout\LayoutBridge;
use Layout\LayoutHelper;
use Privilege\Privilege;

class ToolsLeftMenuSectionModule
{
    public static function displayLeftMenuBlocks()
    {
        if (Privilege::has('toolsLeftMenuSection.access')):
            ?>
            <section class="section-block tools">
                <?php LayoutHelper::displayLeftMenuExpandableTitle(__("Tools")); ?>
                <ul class="linkslist">
                    <?php LayoutBridge::displayToolsLeftMenuLinks(); ?>
                </ul>
            </section>
            <?php
        endif;

    }
}
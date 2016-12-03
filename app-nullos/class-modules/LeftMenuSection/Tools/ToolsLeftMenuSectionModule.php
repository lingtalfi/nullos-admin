<?php

namespace LeftMenuSection\Tools;


use Privilege\Privilege;

class ToolsLeftMenuSectionModule
{
    public static function displayLeftMenuBlocks()
    {
        if (Privilege::has('toolsLeftMenuSection.access')):
            ?>
            <section class="section-block table-links">
                <h3>Tools</h3>
                <ul class="linkslist">
                    <?php \Bridge::displayToolsLeftMenuLinks(); ?>
                </ul>
            </section>
            <?php
        endif;

    }
}
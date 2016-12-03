<?php


/**
 * Main Layout helper
 */
class Goofy
{
    public static function technicalNote($msg, $return = false)
    {
        if (true === $return) {
            ob_start();
        }

        ?>
        <div class="technical-note icon-box">
            <div>
                <span><?php Icons::printIcon('build'); ?></span>
                <span class="text">
                <?php echo $msg; ?>
            </span>
            </div>
        </div>
        <?php
        if (true === $return) {
            return ob_get_clean();
        }
    }
}
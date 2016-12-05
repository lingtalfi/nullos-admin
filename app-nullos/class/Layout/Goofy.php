<?php

namespace Layout;


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
                <span><?php \Icons::printIcon('build'); ?></span>
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

    public static function alertSuccess($msg, $return = false, $clickHereToContinue = true)
    {
        if (true === $return) {
            ob_start();
        }

        ?>
        <div class="alert alert-success flexc">
            <span class="icon-span"><?php echo \Icons::printIcon('done', 'green', 48); ?></span>
            <div>
                <span class="text"><?php echo $msg; ?></span>
                <?php if (true === $clickHereToContinue): ?>
                    <br>
                    <span>
                <?php
                echo __("{ClickHere} to continue.", "form", [
                    'ClickHere' => '<a href="' . htmlspecialchars($_SERVER['REQUEST_URI']) . '">' . __("ClickHere", "form") . '</a>',
                ]);
                ?>
            </span>
                <?php endif; ?>
            </div>
        </div>
        <?php
        if (true === $return) {
            return ob_get_clean();
        }
    }

    public static function alertError($msg, $return = false)
    {
        if (true === $return) {
            ob_start();
        }

        ?>
        <div class="alert alert-error flexc">
            <span class="icon-span"><?php echo \Icons::printIcon('warning', '#d21c1c', 48); ?></span>
            <div>
                <span class="text"><?php echo $msg; ?></span>
            </div>
        </div>
        <?php
        if (true === $return) {
            return ob_get_clean();
        }
    }
}
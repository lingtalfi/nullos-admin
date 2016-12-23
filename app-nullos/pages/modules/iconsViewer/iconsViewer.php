<?php


use Layout\Layout;

/**
 * test
 */

Layout::create()->setElementFiles([
    'body' => Helper::layoutElementIf("modules/iconsViewer/iconsViewer.php", "iconsViewer.access"),
])->display();



<?php

require_once "bigbang.php";


require_once __DIR__ . "/../../init.php";


if (true === Helper::isLocal()) {
    $token = true;
    require_once "quick-feed.inc.php";
    require_once "bullsheet.inc.php";
    require_once "quick-feed-after.inc.php";
}
else{
    echo "nope";
}

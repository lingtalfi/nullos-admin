<?php

/**
 * Call this script before pushing nullos to github.com to generate the concrete doc from the abstract doc.
 */


use QuickDoc\QuickDocUtil;

require_once __DIR__ . "/../app-nullos/init.php";
QuickDocUtil::copyDoc();


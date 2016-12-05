<?php

use Layout\Goofy;
use QuickDoc\QuickDocUtil;


$success = false;
if (array_key_exists('rescan', $_POST)) {
    QuickDocUtil::scanDoc();
    $success = true;
}

$success2 = false;
if (array_key_exists('regenerate', $_POST)) {
    QuickDocUtil::copyDoc();
    $success2 = true;
}


?>
<div class="tac quickdoc">
    <section class="boxy">
        <?php
        if (true === $success) {
            Goofy::alertSuccess("The dictionary has been successfully rescanned", false, false);
        } elseif (true === $success2) {
            Goofy::alertSuccess("The doc has been successfully regenerated", false, false);
        }
        ?>
        Click the button below to rescan the dictionary
        <br>
        <form action="" method="post">
            <button type="submit" class="big" name="rescan">Rescan</button>
        </form>
    </section>
    <section class="boxy">
        Click the button below to generate the doc
        <br>
        <form action="" method="post">
            <button type="submit" class="big" name="regenerate">Regenerate</button>
        </form>
    </section>
</div>
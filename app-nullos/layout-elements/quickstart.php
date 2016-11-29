<?php

use Privilege\Privilege;

if (Privilege::has('quickstart.access')):

    $actions = ['configure', 'crud-generators', 'reset'];


    $action = 'configure';
    if (array_key_exists('action', $_GET)) {
        $action = (string)$_GET['action'];
    }
    if (!in_array($action, $actions, true)) {
        $action = 'configure';
    }


    ?>
    <section class="freepage">
        <?php require_once __DIR__ . "/quickstart/$action.php"; ?>
    </section>

    <?php

endif;
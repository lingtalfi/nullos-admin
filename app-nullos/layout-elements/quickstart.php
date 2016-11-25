<?php


$actions = ['start'];


$action = 'start';
if (array_key_exists('action', $_GET)) {
    $action = (string)$_GET['action'];
}
if (!in_array($action, $actions, true)) {
    $action = 'start';
}


?>
<section class="freepage">
    <?php
    if ('start' === $action) {
        require_once __DIR__ . "/quickstart/start.php";

    } else {
        Logger::log("Not implemented yet");
    }


    ?>
</section>


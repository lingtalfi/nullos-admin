<?php



$actions = ['start', 'reset', 'end'];


$action = 'start';
if (array_key_exists('action', $_GET)) {
    $action = (string)$_GET['action'];
}
if (!in_array($action, $actions, true)) {
    $action = 'start';
}


?>
<section class="freepage">
    <?php require_once __DIR__ . "/quickstart/$action.php"; ?>
</section>


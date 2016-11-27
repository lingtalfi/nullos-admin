<?php

define('LL', 'quickstart');
function linkt($text, $href, $external = false)
{
    $target = '';
    if (true === $external) {
        $target = 'target="_blank"';
    }
    return '<a ' . $target . ' href="' . $href . '">' . __($text, LL) . '</a>';
}


?>
<div class="tac bignose install-page">
    <?php if (array_key_exists('f', $_GET)): ?>
        <h3 class="congrats">
            <span><?php Icons::printIcon('thumb-up', 'green', 48); ?></span>
            <span class="text"><?php echo __("Congratulations!", LL); ?></span>
        </h3>
        <p>
            <?php echo __("Your admin website is now ready to use.", LL); ?>
        </p>
    <?php endif; ?>
    <p>
        <?php echo __("If you want to remove the Quickstart section in the left menu, please consult this {page}", LL, ['page' => linkt("page", wl2("nullos-doc-hide-quickstart-menu"))]); ?>
    </p>
</div>
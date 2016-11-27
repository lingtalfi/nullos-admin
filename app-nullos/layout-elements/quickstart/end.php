<?php

define('LL', 'quickstart');
function linkt($text, $href, $external = false)
{
    $target = '';
    if (true === $external) {
        $target = 'target="_blank"';
    }
    return '<a ' . $target . ' href="' . htmlspecialchars($href) . '">' . __($text, LL) . '</a>';
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
        <?php echo __("If you want to remove the Quickstart section in the left menu, do the following:", LL); ?>
    </p>
    <ul class="centered-ul">
        <li>
            <?php echo __("Open the {path} file in your favorite editor.", LL, ['path' => '<span class="path">class-modules/QuickStart/QuickStartConfig.php</span>']); ?>
        </li>
        <li>
            <?php echo __("Replace the line {code} with {code2}.", LL, [
                'code' => '<span class="code">public static $showLeftMenuLinks = true;</span>',
                'code2' => '<span class="code">public static $showLeftMenuLinks = false;</span>',
            ]); ?>
        </li>
    </ul>
    <p>
        <?php echo __("For more information please visit the {link}.", LL, ['link' => linkt("nullos documentation", wl2('nullos-doc-install-end'))]); ?>
    </p>
</div>
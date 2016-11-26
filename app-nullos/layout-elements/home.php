<?php

if (false === defined('I_AM_JUST_THE_FALLBACK_INIT')):
    ?>
    <div class="freepage">
        <p>
            <?php echo __("Welcome to {website}", 'page-home', ['website' => WEBSITE_NAME]); ?>
        </p>
    </div>
    <?php
else:
    require_once __DIR__ . "/quickstart.php";
endif;
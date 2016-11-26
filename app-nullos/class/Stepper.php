<?php


class Stepper
{

    public $steps;


    public function __construct(array $steps = [])
    {
        $this->steps = $steps;
    }


    public function display($key)
    {
        $active = false;
        $i = 0;
        ?>
        <ul class="qf-stepper">
            <?php foreach ($this->steps as $k => $step):
                if (0 !== $i++) {
                    ?>
<!--                    <div class="separator"></div>-->
                    <?php
                }
                if ($k === $key) {
                    $active = true;
                }

                $sactive = (true === $active) ? ' active' : '';
                ?>

                <li class="step<?php echo $sactive; ?>"><?php echo $step; ?></li>
            <?php endforeach; ?>
        </ul>
        <?php
    }

}
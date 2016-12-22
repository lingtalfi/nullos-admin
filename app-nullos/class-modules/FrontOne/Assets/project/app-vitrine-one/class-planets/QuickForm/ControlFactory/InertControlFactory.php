<?php

namespace QuickForm\ControlFactory;

use Bat\StringTool;
use QuickForm\QuickForm;
use QuickForm\QuickFormControl;


/**
 * Factory for fake controls.
 * The intent is:
 * - a check all/uncheck all toggle button
 *
 *
 */
class InertControlFactory implements ControlFactoryInterface
{

    public static function create()
    {
        return new self();
    }

    //--------------------------------------------
    //
    //--------------------------------------------
    public function displayControl($name, QuickFormControl $c, QuickForm $f)
    {
        $canHandle = true;
        $type = $c->getType();
        $args = $c->getTypeArgs();

        switch ($type) {
            case 'button':
                $c->markAsFake();
                $label = $args[0];
                $htmlAttr = (array_key_exists(1, $args)) ? $args[1] : [];
                ?>
                <button <?php echo StringTool::htmlAttributes($htmlAttr); ?>><?php echo $label; ?></button>
                <?php
                break;
            default:
                $canHandle = false;
                break;
        }
        return $canHandle;
    }



    //--------------------------------------------
    //
    //--------------------------------------------
    private function error($m)
    {
        throw new \Exception($m);
    }


}
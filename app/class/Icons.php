<?php


class Icons
{
    private static $icons = [];

    public static function printIcon($name, $color = null, $size = 24)
    {

        $fill = (null !== $color) ? 'fill="' . $color . '"' : '';
        ?>
        <svg class="icon" viewBox="0 0 24 24" <?php echo $fill; ?>
             style="width:<?php echo $size; ?>px; height: <?php echo $size; ?>px">
            <use
                xlink:href="#<?php echo $name; ?>"></use>
        </svg>
        <?php
        self::$icons[] = $name;
    }


    public static function printIconsDefinitions()
    {

        if (count(self::$icons) > 0):
            ?>
            <svg class="hidden">
                <defs>
                    <?php
                    foreach (self::$icons as $name):

                        switch ($name) {
                            case 'add':
                                ?>
                                <g id="add">
                                    <path d="M19 13h-6v6h-2v-6H5v-2h6V5h2v6h6v2z"/>
                                    <path d="M0 0h24v24H0z" fill="none"/>
                                </g>
                                <?php
                                break;
                        }
                    endforeach;
                    ?>
                </defs>
            </svg>
            <?php
        endif;
    }


}
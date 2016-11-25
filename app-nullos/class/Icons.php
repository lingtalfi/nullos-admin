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
                            case 'exit':
                                ?>
                                <g id="exit">
                                    <path d="M0 0h24v24H0z" fill="none"/>
                                    <path
                                        d="M10.09 15.59L11.5 17l5-5-5-5-1.41 1.41L12.67 11H3v2h9.67l-2.58 2.59zM19 3H5c-1.11 0-2 .9-2 2v4h2V5h14v14H5v-4H3v4c0 1.1.89 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2z"/>
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
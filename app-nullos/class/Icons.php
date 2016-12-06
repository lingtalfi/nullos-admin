<?php

// https://github.com/lingtalfi/Icons
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
                            case 'announcement':
                                ?>
                                <g id="announcement">
                                    <path d="M20 2H4c-1.1 0-1.99.9-1.99 2L2 22l4-4h14c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2zm-7 9h-2V5h2v6zm0 4h-2v-2h2v2z"/>
                                    <path d="M0 0h24v24H0z" fill="none"/>
                                </g>
                                <?php
                                break;
                            case 'build':
                                ?>
                                <g id="build">
                                    <path clip-rule="evenodd" d="M0 0h24v24H0z" fill="none"/>
                                    <path d="M22.7 19l-9.1-9.1c.9-2.3.4-5-1.5-6.9-2-2-5-2.4-7.4-1.3L9 6 6 9 1.6 4.7C.4 7.1.9 10.1 2.9 12.1c1.9 1.9 4.6 2.4 6.9 1.5l9.1 9.1c.4.4 1 .4 1.4 0l2.3-2.3c.5-.4.5-1.1.1-1.4z"/>
                                </g>
                                <?php
                                break;
                            case 'done':
                                ?>
                                <g id="done">
                                    <path d="M0 0h24v24H0z" fill="none"/>
                                    <path d="M9 16.2L4.8 12l-1.4 1.4L9 19 21 7l-1.4-1.4L9 16.2z"/>
                                </g>
                                <?php
                                break;
                            case 'error':
                                ?>
                                <g id="error">
                                    <path d="M0 0h24v24H0z" fill="none"/>
                                    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-2h2v2zm0-4h-2V7h2v6z"/>
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
                            case 'help':
                                ?>
                                <g id="help">
                                    <path d="M0 0h24v24H0z" fill="none"/>
                                    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 17h-2v-2h2v2zm2.07-7.75l-.9.92C13.45 12.9 13 13.5 13 15h-2v-.5c0-1.1.45-2.1 1.17-2.83l1.24-1.26c.37-.36.59-.86.59-1.41 0-1.1-.9-2-2-2s-2 .9-2 2H8c0-2.21 1.79-4 4-4s4 1.79 4 4c0 .88-.36 1.68-.93 2.25z"/>
                                </g>
                                <?php
                                break;
                            case 'image':
                                ?>
                                <g id="image">
                                    <path d="M0 0h24v24H0z" fill="none"/>
                                    <path d="M21 19V5c0-1.1-.9-2-2-2H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2zM8.5 13.5l2.5 3.01L14.5 12l4.5 6H5l3.5-4.5z"/>
                                </g>
                                <?php
                                break;
                            case 'link':
                                ?>
                                <g id="link">
                                    <path d="M0 0h24v24H0z" fill="none"/>
                                    <path d="M3.9 12c0-1.71 1.39-3.1 3.1-3.1h4V7H7c-2.76 0-5 2.24-5 5s2.24 5 5 5h4v-1.9H7c-1.71 0-3.1-1.39-3.1-3.1zM8 13h8v-2H8v2zm9-6h-4v1.9h4c1.71 0 3.1 1.39 3.1 3.1s-1.39 3.1-3.1 3.1h-4V17h4c2.76 0 5-2.24 5-5s-2.24-5-5-5z"/>
                                </g>
                                <?php
                                break;
                            case 'play':
                                ?>
                                <g id="play">
                                    <path d="M0 0h24v24H0z" fill="none"/>
                                    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 14.5v-9l6 4.5-6 4.5z"/>
                                </g>
                                <?php
                                break;
                            case 'settings':
                                ?>
                                <g id="settings">
                                    <path d="M0 0h24v24H0z" fill="none"/>
                                    <path d="M19.43 12.98c.04-.32.07-.64.07-.98s-.03-.66-.07-.98l2.11-1.65c.19-.15.24-.42.12-.64l-2-3.46c-.12-.22-.39-.3-.61-.22l-2.49 1c-.52-.4-1.08-.73-1.69-.98l-.38-2.65C14.46 2.18 14.25 2 14 2h-4c-.25 0-.46.18-.49.42l-.38 2.65c-.61.25-1.17.59-1.69.98l-2.49-1c-.23-.09-.49 0-.61.22l-2 3.46c-.13.22-.07.49.12.64l2.11 1.65c-.04.32-.07.65-.07.98s.03.66.07.98l-2.11 1.65c-.19.15-.24.42-.12.64l2 3.46c.12.22.39.3.61.22l2.49-1c.52.4 1.08.73 1.69.98l.38 2.65c.03.24.24.42.49.42h4c.25 0 .46-.18.49-.42l.38-2.65c.61-.25 1.17-.59 1.69-.98l2.49 1c.23.09.49 0 .61-.22l2-3.46c.12-.22.07-.49-.12-.64l-2.11-1.65zM12 15.5c-1.93 0-3.5-1.57-3.5-3.5s1.57-3.5 3.5-3.5 3.5 1.57 3.5 3.5-1.57 3.5-3.5 3.5z"/>
                                </g>
                                <?php
                                break;
                            case 'thumb-up':
                                ?>
                                <g id="thumb-up">
                                    <path d="M0 0h24v24H0z" fill="none"/>
                                    <path
                                            d="M1 21h4V9H1v12zm22-11c0-1.1-.9-2-2-2h-6.31l.95-4.57.03-.32c0-.41-.17-.79-.44-1.06L14.17 1 7.59 7.59C7.22 7.95 7 8.45 7 9v10c0 1.1.9 2 2 2h9c.83 0 1.54-.5 1.84-1.22l3.02-7.05c.09-.23.14-.47.14-.73v-1.91l-.01-.01L23 10z"/>
                                </g>
                                <?php
                                break;
                            case 'translate':
                                ?>
                                <g id="translate">
                                    <path d="M0 0h24v24H0z" fill="none"/>
                                    <path d="M12.87 15.07l-2.54-2.51.03-.03c1.74-1.94 2.98-4.17 3.71-6.53H17V4h-7V2H8v2H1v1.99h11.17C11.5 7.92 10.44 9.75 9 11.35 8.07 10.32 7.3 9.19 6.69 8h-2c.73 1.63 1.73 3.17 2.98 4.56l-5.09 5.02L4 19l5-5 3.11 3.11.76-2.04zM18.5 10h-2L12 22h2l1.12-3h4.75L21 22h2l-4.5-12zm-2.62 7l1.62-4.33L19.12 17h-3.24z"/>
                                </g>
                                <?php
                                break;
                            case 'warning':
                                ?>
                                <g id="warning">
                                    <path d="M0 0h24v24H0z" fill="none"/>
                                    <path d="M1 21h22L12 2 1 21zm12-3h-2v-2h2v2zm0-4h-2v-4h2v4z"/>
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
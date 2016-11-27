<?php


class Layout
{

    private $elementFiles;
    private $elementsDir;


    private function __construct()
    {
        $this->elementsDir = APP_ROOT_DIR . "/layout-elements";
    }

    public static function create()
    {
        return new self;
    }


    /**
     * array of elementType => fileName
     */
    public function setElementFiles(array $files)
    {
        $this->elementFiles = $files;
        return $this;
    }

    public function display()
    {
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <title><?php echo ucfirst(WEBSITE_NAME); ?></title>
            <link rel="stylesheet" href="<?php echo url('/style/style.css'); ?>">
            <script src="<?php echo url('/libs/split/split.js'); ?>"></script>
        </head>

        <body class="holygrail">
        <div class="topbar">
            <?php Bridge::displayTopBar(); ?>

        </div>
        <div class="body panes-container">
            <div id="one" class="pane-main leftmenu">
                <section class="header">
                    <span class="title"><?php echo ucfirst(WEBSITE_NAME); ?></span>
                    <a href="<?php echo url('/?disconnect=1'); ?>"><?php echo Icons::printIcon('exit'); ?></a>
                </section>
                <?php Bridge::displayLeftMenuBlocks(); ?>
            </div>
            <div id="two" class="pane-aux right-pane">
                <?php $this->includeElement('body'); ?>
            </div>
        </div>
        <div class="bottombar"></div>


        <script>
            Split(['#one', '#two'], {
                sizes: [20, 80],
                minSize: 20
            });
        </script>


        <?php Icons::printIconsDefinitions(); ?>

        </body>
        </html>
        <?php
    }


    private function includeElement($key)
    {
        $fileName = $this->elementFiles[$key];
        $file = $this->elementsDir . "/" . $fileName;
        require_once $file;
    }
}
<?php

namespace Layout;

class Layout
{

    private $elementFiles;
    private $elementsDir;

    protected $onDisplayBefore;


    protected function __construct()
    {
        $this->elementsDir = APP_ROOT_DIR . "/layout-elements/nullos";
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
        if (is_callable($this->onDisplayBefore)) {
            call_user_func($this->onDisplayBefore, $this);
        }

        $exception = null;
        ob_start();
        ?>


        <body class="holygrail">
        <div class="topbar">
            <?php LayoutBridge::displayTopBar(); ?>

        </div>
        <div class="body panes-container">
            <div id="one" class="pane-main leftmenu">
                <section class="header">
                    <span class="title"><?php echo ucfirst(WEBSITE_NAME); ?></span>
                    <a href="<?php echo url('/?disconnect=1'); ?>"><?php echo \Icons::printIcon('exit'); ?></a>
                </section>
                <?php LayoutBridge::displayLeftMenuBlocks(); ?>
            </div>
            <div id="two" class="pane-aux right-pane">
                <?php
                try {
                    // we just prevent the exception from breaking the ob_start
                    $this->includeElement('body');
                } catch (\Exception $exception) {
                    if (false === LayoutConfig::showBodyExceptionInYourFace()) {
                        Goofy::alertError(__("Oops, an unexpected error occurred, please check the logs"), false, false);
                        \Logger::log($exception, "layout.body");
                    } else {
                        a($exception);
                    }
                }
                ?>
            </div>
        </div>
        <div class="bottombar"></div>


        <script>
            Split(['#one', '#two'], {
                sizes: [20, 80],
                minSize: 20
            });
        </script>


        <?php \Icons::printIconsDefinitions(); ?>

        </body>
        <?php
        $body = ob_get_clean();
        ?>


        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <title><?php echo ucfirst(WEBSITE_NAME); ?></title>
            <link rel="stylesheet" href="<?php echo url('/style/style.css'); ?>">
            <link rel="stylesheet" href="<?php echo url('/style/layout.css'); ?>">
            <link rel="stylesheet" href="<?php echo url('/style/pastel-theme.css'); ?>">
            <script src="<?php echo url('/libs/split/split.js'); ?>"></script>
            <?php
            $assets = new AssetsList();
            LayoutBridge::registerAssets($assets);
            $assets->displayList();
            ?>
        </head>
        <?php echo $body; ?>
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
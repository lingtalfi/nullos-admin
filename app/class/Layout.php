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
            <title>My Admin</title>
            <link rel="stylesheet" href="/style/style.css">
            <script src="/libs/split/split.js"></script>
        </head>

        <body>

        <div class="panes-container">
            <div id="one" class="pane-main leftmenu">
                <section class="header">
                    <span class="title">My admin</span>
                </section>
                <section class="section-block table-links">
                    <h3>Some Tables</h3>
                    <ul class="linkslist">
                        <li><a href="/table?name=concours">concours</a></li>
                        <li><a href="#">table b</a></li>
                        <li><a href="#">table b</a></li>
                        <li><a href="#">table b</a></li>
                        <li><a href="#">table b</a></li>
                        <li><a href="#">table b</a></li>
                    </ul>
                </section>
            </div>
            <div id="two" class="pane-aux right-pane">
                <?php $this->includeElement('body'); ?>
            </div>
        </div>


        <script>
            Split(['#one', '#two'], {
                sizes: [20, 80],
                minSize: 200
            });
        </script>

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
<?php

use DirScanner\YorgDirScannerTool;
use Linguist\Util\LinguistScanner;


$dir = APP_ROOT_DIR;
$files = YorgDirScannerTool::getFiles($dir, true, true);
$dirs = YorgDirScannerTool::getDirs($dir, true, true);


$messages = [];
$thefile = "";
$thedir = "";
if (array_key_exists('file', $_POST)) {
    $thefile = $_POST['file'];
    $messages = LinguistScanner::scanTranslationsByFile($thefile);
} elseif (array_key_exists('dir', $_POST)) {
    $thedir = $_POST['dir'];
    $messages = LinguistScanner::scanTranslationsByDir($thedir);
}


?>

<section class="pad">
    <div class="tac boxy">
        <div>
            <?php echo __("Choose a file to display its translations", LL); ?>

            <form method="post" action="" id="theform">
                <select name="file" id="theselect">
                    <option value="0"><?php echo __("Choose a file...", LL); ?></option>
                    <?php foreach ($files as $file):
                        $absFile = $dir . '/' . $file;
                        $sel = ($thefile === $absFile) ? ' selected="selected"' : '';
                        ?>
                        <option <?php echo $sel; ?> value="<?php echo $absFile; ?>"><?php echo $file; ?></option>
                    <?php endforeach; ?>
                </select>
            </form>
        </div>
        <div>
            <?php echo __("Or choose a directory to display all the translations it contains", LL); ?>

            <form method="post" action="" id="theformdir">
                <select name="dir" id="theselectdir">
                    <option value="0"><?php echo __("Choose a directory...", LL); ?></option>
                    <?php foreach ($dirs as $_dir):
                        $absDir = $dir . '/' . $_dir;
                        $sel = ($thedir === $absDir) ? ' selected="selected"' : '';
                        ?>
                        <option <?php echo $sel; ?> value="<?php echo $absDir; ?>"><?php echo $_dir; ?></option>
                    <?php endforeach; ?>
                </select>
            </form>
        </div>


        <script>
            var form = document.getElementById('theform');
            var select = document.getElementById('theselect');
            select.addEventListener('change', function () {
                form.submit();
            });


            var formDir = document.getElementById('theformdir');
            var selectDir = document.getElementById('theselectdir');
            selectDir.addEventListener('change', function () {
                formDir.submit();
            });
        </script>


        <div class="results">
            <?php
            foreach ($messages as $info) {
                $id = str_replace('"', '\\"', $info['id']);

                echo '"' . $id . '" => "' . $id . '",';
                echo '<br>';
            }

            ?>
        </div>
    </div>
</section>
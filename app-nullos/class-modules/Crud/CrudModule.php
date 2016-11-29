<?php


namespace Crud;


use ArrayToString\ArrayToStringUtil;
use ArrayToString\SymbolManager\PhpArrayToStringSymbolManager;
use Bat\FileSystemTool;
use QuickPdo\QuickPdoInfoTool;

class CrudModule
{

    private static $tables = [];

    public static function registerTables(array $tables)
    {
        self::$tables = $tables;
    }

    public static function displayLeftMenuLinks()
    {
        $prettyTables = CrudConfig::getPrettyTableNames();
        $sections = CrudConfig::getLeftMenuSections();
        $classes = CrudConfig::getLeftMenuSectionsClasses();

        foreach ($sections as $label => $tables):
            $class = (array_key_exists($label, $classes)) ? $classes[$label] : '';
            ?>
            <section class="section-block table-links <?php echo $class; ?>">
                <h3><?php echo $label; ?></h3>
                <ul class="linkslist">
                    <?php foreach ($tables as $table):
                        $original = $table;
                        if (array_key_exists($table, $prettyTables)) {
                            $table = $prettyTables[$table];
                        } else {
                            if (false !== ($pos = strpos($table, '.'))) {
                                $table = substr($table, $pos + 1);
                            }
                        }
                        ?>
                        <li>
                            <a href="<?php echo CrudHelper::getListUrl($original); ?>"><?php echo ucfirst($table); ?></a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </section>
            <?php
        endforeach;
    }


    /**
     * default DataTable instance for all lists (configure nipp, widgets,...)
     */
    public static function getDataTable()
    {
        return new DataTable();
    }

    /**
     * default Form instance for all forms (configure errorLocation, ...)
     */
    public static function getForm($table, array $ric, $mode = null)
    {
        return new Form($table, $ric, $mode);
    }

    public static function triggerGenerators($db = null, $rewriteConfig = false, $createCrudFiles = true)
    {
        $foreignKeyPrettierColumns = $prettyTables = $cols = $actionColumnsPosition = null;
        $doGenerate = true;


        if (null === $db) {
            $db = QuickPdoInfoTool::getDatabase();
        }
        if (true === $rewriteConfig) {

            $actionColumnsPosition = 'right';

            /**
             * Todo maybe: ask the user if she wants multi-language generated CrudConfig (see comment in CrudConfig::getPrettyColumnNames)
             */
            $src = __DIR__ . "/template/CrudConfig-tmp.php";
            $dst = __DIR__ . "/CrudConfig.php";

            $tables = QuickPdoInfoTool::getTables($db);
            $fullTables = array_map(function ($v) use ($db) {
                return $db . '.' . $v;
            }, $tables);


            //{tables}
            $fTables = self::listify($fullTables, 16);

            //{leftMenuSections}
            // creating a "Main" and "Others" sections, just to get started
            $sections = [];
            $c = count($fullTables);
            if ($c > 1) {
                $half = (int)floor($c / 2);
                $sections[__('Main', LL)] = array_slice($fullTables, 0, $half);
                $sections[__('Others', LL)] = array_slice($fullTables, $half);
            } else {
                $sections[__('Main', LL)] = $fullTables;
                $sections[__('Others', LL)] = [];
            }
            $sSections = self::arrayToString($sections);


            //{prettyTableNames}
            $prettyTables = [];
            foreach ($fullTables as $table) {
                if (false !== strpos($table, '_')) {
                    $p = explode('.', $table, 2);
                    $ftable = array_pop($p);
                    $prettyTables[$table] = str_replace('_', ' ', $ftable);
                }
            }

            //{foreignKeyPrettierColumns}
            $foreignKeyPrettierColumns = CrudGenHelper::generateForeignKeyPrettierColumns();


            //{getPrettyColumnNames}
            $cols = [];
            foreach ($tables as $table) {
                $names = QuickPdoInfoTool::getColumnNames($table, $db);
                foreach ($names as $name) {
                    if (false !== strpos($name, '_')) {
                        $cleanName = $name;
                        if ('_id' === substr($name, -3)) {
                            $cleanName = substr($name, 0, -3);
                        }
                        $cols[$name] = str_replace('_', ' ', $cleanName);
                    }
                }
            }


            // convert data to php array
            $sPrettyTableNames = self::arrayToString($prettyTables);
            $sForeign = self::arrayToString($foreignKeyPrettierColumns);
            $sPrettyColNames = self::arrayToString($cols);

            $tags = [
                '//{tables}' => implode(PHP_EOL, $fTables),
                '//{leftMenuSections}' => $sSections,
                '//{prettyTableNames}' => $sPrettyTableNames,
                '//{foreignKeyPrettierColumns}' => $sForeign,
                '//{getPrettyColumnNames}' => $sPrettyColNames,
            ];
            $s = file_get_contents($src);
            $s = str_replace(array_keys($tags), array_values($tags), $s);
            $ret = file_put_contents($dst, $s);
            $doGenerate = (false !== $ret);

        } else {
            $foreignKeyPrettierColumns = CrudConfig::getForeignKeyPrettierColumns();
            $prettyTables = CrudConfig::getPrettyTableNames();
            $cols = CrudConfig::getPrettyColumnNames();
            $actionColumnsPosition = CrudConfig::getActionColumnsPosition();
        }


        if (true === $createCrudFiles && false !== $doGenerate) {
            // generate lists files
            $gen = new CrudListGenerator();
            $gen->db = $db;
            $gen->actionColumnsPosition = $actionColumnsPosition;
            $gen->foreignKeyPrettierColumns = $foreignKeyPrettierColumns;
            $gen->prettyTableNames = $prettyTables;
            $gen->fixPrettyColumnNames = $cols;
            $gen->urlTransformerIf = CrudConfig::getListUrlTransformerIfCallback();
            $gen->generateLists();


            // generate forms files
            $gen = new CrudFormGenerator();
            $gen->db = $db;
            $gen->foreignKeyPrettierColumns = $foreignKeyPrettierColumns;
            $gen->prettyTableNames = $prettyTables;
            $gen->fixPrettyColumnNames = $cols;
            $gen->generateForms();

        }
    }


    public static function emptyCrudFilesDirectories()
    {
        // empty crud dirs
        $autoform = __DIR__ . "/../../crud/auto-form";
        $autolist = __DIR__ . "/../../crud/auto-list";
        FileSystemTool::clearDir($autoform);
        FileSystemTool::clearDir($autolist);
    }


    public static function resetCrudConfig()
    {
        // reset CrudConfig
        $src = __DIR__ . "/template/CrudConfigBlank-tmp.php";
        $dst = __DIR__ . "/CrudConfig.php";
        $s = file_get_contents($src);
        file_put_contents($dst, $s);
    }



    //--------------------------------------------
    // 
    //--------------------------------------------
    private static function listify(array $items, $n = 12)
    {
        $i = 0;
        return array_map(function ($v) use ($n, &$i) {
            if (0 === $i++) {
                $s = '';
            } else {
                $s = str_repeat(' ', $n);
            }
            return $s . "'" . $v . "',";
        }, $items);
    }

    private static function arrayToString(array $items)
    {
        $manager = new PhpArrayToStringSymbolManager();
        $manager->setIndentationCallback(function ($spaceSymbol, $nbSpaces, $level) {
            if (0 === $level) {
                return str_repeat($spaceSymbol, 8);
            }
            if (1 === $level) {
                return str_repeat($spaceSymbol, 12);
            }
            return str_repeat($spaceSymbol, 16);
        });

        return 'return ' . ArrayToStringUtil::create()->setSymbolManager($manager)->toString($items) . ";";
    }


}
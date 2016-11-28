<?php


namespace Crud;


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

    public static function triggerGenerators()
    {
        // generate lists files
        $gen = new CrudListGenerator();
        $gen->actionColumnsPosition = CrudConfig::getActionColumnsPosition();
        $gen->foreignKeyPrettierColumns = CrudConfig::getForeignKeyPrettierColumns();
        $gen->prettyTableNames = CrudConfig::getPrettyTableNames();
        $gen->fixPrettyColumnNames = CrudConfig::getPrettyColumnNames();
        $gen->urlTransformerIf = CrudConfig::getListUrlTransformerIfCallback();
        $gen->generateLists();


        // generate forms files
        $gen = new CrudFormGenerator();
        $gen->foreignKeyPrettierColumns = CrudConfig::getForeignKeyPrettierColumns();
        $gen->prettyTableNames = CrudConfig::getPrettyTableNames();
        $gen->fixPrettyColumnNames = CrudConfig::getPrettyColumnNames();
        $gen->generateForms();
    }

}
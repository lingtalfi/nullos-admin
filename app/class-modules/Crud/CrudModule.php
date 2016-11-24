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
        $tables = CrudConfig::getTables();
        ?>
        <section class="section-block table-links">
            <h3>Crud</h3>
            <ul class="linkslist">
                <?php foreach ($tables as $table): ?>
                    <li><a href="/table?name=<?php echo $table; ?>"><?php echo ucfirst($table); ?></a></li>
                <?php endforeach; ?>
            </ul>
        </section>
        <?php
    }


    /**
     * default DataTable instance for all lists (configure nipp, widgets,...)
     */
    public static function getDataTable()
    {
        return new \DataTable();
    }

    /**
     * default Form instance for all forms (configure errorLocation, ...)
     */
    public static function getForm($table, array $ric, $mode = null)
    {
        return new \Form($table, $ric, $mode);
    }
}
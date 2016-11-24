<?php


namespace Crud;

use Bat\FileSystemTool;
use QuickPdo\QuickPdoInfoTool;


/**
 * Helps creating the default crud files in app/crud/form and app/crud/list
 */
class CrudGenerator
{


    public $foreignKeyPrettierColumns;
    public $prettyTableNames;
    public $fixPrettyColumnNames;
    public $urlTransformerIf;

    private $out;

    /**
     * table null means all tables
     */
    public function __construct()
    {
        $this->foreignKeyPrettierColumns = [];
        $this->prettyTableNames = [];
        $this->fixPrettyColumnNames = [];
    }


    public function generateLists()
    {
        $db = QuickPdoInfoTool::getDatabase();
        $tables = QuickPdoInfoTool::getTables($db);
        $autoListDir = CrudConfig::getCrudGenListDir();
        FileSystemTool::mkdir($autoListDir);
        foreach ($tables as $table) {
            $this->generateList($table, $autoListDir . "/" . $table . '.php');
        }
    }

    public function generateList($table, $outFile = null)
    {

        $this->out = '';
        $this->line('<?php');
        $this->line('');
        $this->line('use Crud\CrudHelper;');
        $this->line('use Crud\CrudModule;');
        $this->line('');


        $foreignKeyPrettierColumns = $this->foreignKeyPrettierColumns;
        $prettyTableNames = $this->prettyTableNames;
        $fixPrettyColumnNames = $this->fixPrettyColumnNames;
        $fkTransformersInfo = [];


        $db = QuickPdoInfoTool::getDatabase();


        $columnNames = QuickPdoInfoTool::getColumnNames($table, $db);
//        a($columnNames);

        $primaryKey = QuickPdoInfoTool::getPrimaryKey($table, $db);
//        a($primaryKey);


        $autoIncrementedColumn = QuickPdoInfoTool::getAutoIncrementedField($table, $db);
//        a($autoIncrementedColumn);


        $fkInfo = QuickPdoInfoTool::getForeignKeysInfo($table, $db);
//        a($fkInfo);

        $hasForeignKey = (count($fkInfo) > 0);


        //--------------------------------------------
        // WRITE THE FIELDS PART
        //--------------------------------------------
        $fields = [];


        $foreignTables = [];
        $tableAliases = [];
        $mainAlias = null;
        $replacedForeignKeys = [];


        if (false === $hasForeignKey) {
            $fields = $columnNames;
        } else {
            $foreignTables = self::getForeignTables($table, $db);
//            a("foreign tables", $foreignTables);
            $tableAliases = self::getTableAliases($table, $foreignTables);
//            a("tables aliases", $tableAliases);
            $mainAlias = $tableAliases[$table];

            foreach ($columnNames as $c) {
                $fields[] = $mainAlias . '.' . $c;

                if (array_key_exists($c, $foreignTables)) {
                    $foreignTable = $foreignTables[$c];
                    if (array_key_exists($foreignTable, $foreignKeyPrettierColumns)) {
                        $prettyColumnName = $foreignKeyPrettierColumns[$foreignTable];
                        $auxAlias = $tableAliases[$foreignTable];
                        $fields[] = $auxAlias . '.' . $prettyColumnName . ' as ' . $foreignTable . '_' . $prettyColumnName;
                        $replacedForeignKeys[] = $c;
                        $fkTransformersInfo[] = [
                            $foreignTable . '_' . $prettyColumnName,
                            $foreignTable,
                            $c,
                        ];

                    } else {
                        // todo... fallback to choose a decent column with automated heuristics
                        // in which case don't forget to update $replacedForeignKeys and $fkTransformersInfo too...
                    }
                }
            }

        }

        $this->fields($fields);
        $this->line('');
        $this->line('');

        //--------------------------------------------
        // WRITE THE QUERY PART
        //--------------------------------------------
        $this->line('$query = "select');
        $this->line('%s');
        $al = (true === $hasForeignKey) ? ' ' . $mainAlias : '';
        $this->line('from ' . $table . $al);
        foreach ($foreignTables as $k => $t) {
            $this->line("inner join " . $t . " " . $tableAliases[$t] . " on " . $tableAliases[$t] . '.' . $fkInfo[$k][2] . '=' . $mainAlias . '.' . $k);
        }
        $this->line('";');
        $this->line('');
        $this->line('');
        $this->line('$table = CrudModule::getDataTable();');
        $this->line('');


        //--------------------------------------------
        // WRITE TITLE
        //--------------------------------------------
        if (array_key_exists($table, $prettyTableNames)) {
            $title = $prettyTableNames[$table];
        } else {
            $title = str_replace('_', ' ', $table);
        }
        $title = ucfirst($title);
        $this->line('$table->title = "' . $this->dqe($title) . '";');
        $this->line('');
        $this->line('');


        //--------------------------------------------
        // COLUMN HEADERS
        //--------------------------------------------
        $headers = [];
        foreach ($columnNames as $c) {
            if (array_key_exists($c, $fixPrettyColumnNames)) {
                $headers[$c] = $fixPrettyColumnNames[$c];
            } else {
                $headers[$c] = str_replace('_', ' ', $c);
            }
        }
        if (count($headers) > 0) {
            $this->line('$table->columnHeaders = [');
            foreach ($headers as $k => $v) {
                $this->line('    "' . $this->dqe($k) . '" => "' . $this->dqe($v) . '",');
            }
            $this->line('];');
            $this->line('');
            $this->line('');
        }


        //--------------------------------------------
        // HIDDEN COLUMNS
        //--------------------------------------------
        $hidden = [];
        if (false !== $autoIncrementedColumn) {
            $hidden[] = $autoIncrementedColumn;
        }
        $hidden = array_merge($hidden, $replacedForeignKeys);
        if (count($hidden) > 0) {
            $this->line('$table->hiddenColumns = [');
            foreach ($hidden as $v) {
                $this->line('    "' . $this->dqe($v) . '",');
            }
            $this->line('];');
            $this->line('');
            $this->line('');
        }


        //--------------------------------------------
        // TRANSFORMERS -- URL
        //--------------------------------------------
        $urlTransformerColumns = [];
        if (is_callable($this->urlTransformerIf)) {
            foreach ($columnNames as $c) {
                if (true === call_user_func($this->urlTransformerIf, $c)) {
                    $urlTransformerColumns[] = $c;
                }
            }
        }
        if (count($urlTransformerColumns) > 0) {
            foreach ($urlTransformerColumns as $v) {
                $this->line('$table->setTransformer(\'' . $this->sqe($v) . '\', function ($v) {');
                $this->line('    return \'<a href="\' . htmlspecialchars($v) . \'">\' . $v . \'</a>\';');
                $this->line('});');
            }
            $this->line('');
            $this->line('');
        }


        //--------------------------------------------
        // FK TRANSFORMERS
        //--------------------------------------------
        if (count($fkTransformersInfo) > 0) {
            foreach ($fkTransformersInfo as $info) {
                $this->line('$table->setTransformer(\'' . $info[0] . '\', function ($v, array $item) {');
                $this->line('    return \'<a href="\' . CrudHelper::getUpdateFormUrl(\'' . $info[1] . '\', $item[\'' . $info[2] . '\']) . \'">\' . $v . \'</a>\';');
                $this->line('});');
                $this->line('');
            }
            $this->line('');
            $this->line('');
            $this->line('');
        }


        //--------------------------------------------
        // PRINT TABLE
        //--------------------------------------------
        $ric = array_map(function ($v) {
            return "'" . $v . "'";
        }, $primaryKey);

        $this->line('$table->printTable(\'' . $table . '\', $query, $fields, [' . implode(', ', $ric) . ']);');


        //--------------------------------------------
        // OUTPUT THE RESULT SOMEWHERE
        //--------------------------------------------
        if (null !== $outFile) {
            file_put_contents($outFile, $this->out);
        } else {
            echo $this->out;
        }
    }

    //--------------------------------------------
    //
    //--------------------------------------------
    private function line($m)
    {
        $this->out .= $m . PHP_EOL;
    }

    private function dqe($m)
    {
        return str_replace('"', '\"', $m);
    }

    private function sqe($m)
    {
        return str_replace("'", "\\'", $m);
    }

    private function fields(array $fields)
    {
        $this->line('$fields = \'');
        $c = count($fields);
        foreach ($fields as $i => $field) {
            $comma = ((int)($i + 1) === (int)$c) ? '' : ',';
            $this->line($field . $comma);
        }
        $this->line('\';');
    }

    //--------------------------------------------
    //
    //--------------------------------------------
    private static function getTableAliases($table, array $foreignTables)
    {
        $tableAliases = [
            $table => substr($table, 0, 1),
        ];
        foreach ($foreignTables as $t) {
            $c = 1;
            do {
                $try = substr($t, 0, $c++);

            } while (in_array($try, $tableAliases, true));
            $tableAliases[$t] = $try;
        }
        return $tableAliases;
    }

    private static function getForeignTables($table, $db = null)
    {
        $fkInfo = QuickPdoInfoTool::getForeignKeysInfo($table, $db);
        return array_map(function ($v) {
            return $v[1];
        }, $fkInfo);
    }
}
<?php


namespace Crud;

use QuickPdo\QuickPdoInfoTool;


/**
 * Helps creating the default crud files in app/crud/form and app/crud/list
 */
class CrudGeneratorCopy
{


    public $foreignKeyPrettierColumns;
    public $prettyTableNames;
    public $fixPrettyColumnNames;
    public $urlTransformerIf;

    /**
     * table null means all tables
     */
    public function __construct($table = null)
    {
        $this->table = $table;
        $this->foreignKeyPrettierColumns = [];
        $this->prettyTableNames = [];
        $this->fixPrettyColumnNames = [];
    }


    public function generateList()
    {

        $foreignKeyPrettierColumns = $this->foreignKeyPrettierColumns;
        $prettyTableNames = $this->prettyTableNames;
        $fixPrettyColumnNames = $this->fixPrettyColumnNames;
        $fkTransformersInfo = [];


        $table = $this->table;

        $db = QuickPdoInfoTool::getDatabase();

        //a(QuickPdoInfoTool::getTables($db));
        $columnNames = QuickPdoInfoTool::getColumnNames($table, $db);
        a($columnNames);

        $primaryKey = QuickPdoInfoTool::getPrimaryKey($table, $db);
        a($primaryKey);


        $autoIncrementedColumn = QuickPdoInfoTool::getAutoIncrementedField($table, $db);
        a($autoIncrementedColumn);


        $fkInfo = QuickPdoInfoTool::getForeignKeysInfo($table, $db);
        a($fkInfo);

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

        a("fields");
        a($fields);

        //--------------------------------------------
        // WRITE THE QUERY PART
        //--------------------------------------------
        $query = "select %s from " . $table;
        if (true === $hasForeignKey) {
            $query .= " " . $mainAlias . "\n";
            foreach ($foreignTables as $k => $t) {
                $query .= "inner join " . $t . " " . $tableAliases[$t] . " on " . $tableAliases[$t] . '.' . $fkInfo[$k][2] . '=' . $mainAlias . '.' . $k . "\n";
            }
        }
        a($query);


        //--------------------------------------------
        // WRITE TITLE
        //--------------------------------------------
        $title = "";
        if (array_key_exists($table, $prettyTableNames)) {
            $title = $prettyTableNames[$table];
        } else {
            $title = str_replace('_', ' ', $table);
        }
        $title = ucfirst($title);
        a("title: " . $title);


        //--------------------------------------------
        // COLUMN HEADERS
        //--------------------------------------------
        $headers = [];
        a("headers");
        foreach ($columnNames as $c) {
            if (array_key_exists($c, $fixPrettyColumnNames)) {
                $headers[$c] = $fixPrettyColumnNames[$c];
            } else {
                $headers[$c] = str_replace('_', ' ', $c);
            }
        }
        a($headers);


        //--------------------------------------------
        // HIDDEN COLUMNS
        //--------------------------------------------
        a("hidden");
        $hidden = [];
        if (false !== $autoIncrementedColumn) {
            $hidden[] = $autoIncrementedColumn;
        }
        $hidden = array_merge($hidden, $replacedForeignKeys);
        a($hidden);


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
        a('urlTransformerColumns');
        a($urlTransformerColumns);


        //--------------------------------------------
        // FK TRANSFORMERS
        //--------------------------------------------
        a('fkTransformersInfo');
        a($fkTransformersInfo);


        //--------------------------------------------
        // PRINT TABLE
        //--------------------------------------------
        $ric = $primaryKey;
        a("printTable", $table, $ric);

    }


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
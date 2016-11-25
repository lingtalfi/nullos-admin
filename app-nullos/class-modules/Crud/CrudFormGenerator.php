<?php


namespace Crud;

use Bat\FileSystemTool;
use QuickPdo\QuickPdo;
use QuickPdo\QuickPdoInfoTool;


/**
 * Helps creating the default crud files in app/crud/form
 */
class CrudFormGenerator extends AbstractCrudGenerator
{


    public $foreignKeyPrettierColumns;
    public $prettyTableNames;
    public $fixPrettyColumnNames;

    // types
    public $sqlType2Type;
    public $column2Type;

    // constraints
    public $column2Constraint;


    /**
     * table null means all tables
     */
    public function __construct()
    {
        parent::__construct();
        $this->foreignKeyPrettierColumns = null;
        $this->prettyTableNames = [];
        $this->fixPrettyColumnNames = [];
        /**
         *
         * - foreign keys are automatically converted to select
         *
         * - then, the column2Type mapping is tried
         *
         * - only if none of the above has matched, the sqlType2Type map will be applied
         *
         * - if everything else fails, text is used.
         *
         *
         * In column2Type and sqlType2Type arrays, the type value can either a string or an array.
         * If it's a string, it's the type, if it's an array, it must contain two entries:
         *
         * - 0: type (string)
         * - 1: typeArgs (array)
         *
         */
        $this->column2Type = [];
        $this->sqlType2Type = [
            'varchar' => 'text',
            'tinyint' => 'text',
            'int' => 'text',
            'enum' => 'text',
            'char' => 'text',
            'text' => 'message',
            'datetime' => 'date6',
            'date' => 'date3',
        ];
        /**
         * By default, the generator only adds a required constraint on a field if it
         * is in the foreignKeyPrettierColumns array.
         *
         * You can add your own constraints via the column2Constraint array,
         * which keys are a target, and which values represent the constraint to apply.
         *
         * <target> => <constraint>,
         * ...
         *
         *
         * Target is a column name; it can be prefixed by a table name followed by a dot.
         *
         * - target: <column> | <table> <.> <column>
         *
         * The constraint is either a string, or an array.
         * If it's a string, it is the constraint name.
         * The array let you define constraint arguments, the syntax is the following:
         *
         * - array: [ str:constraintName, array:constraintArgs ]
         *
         *
         * As for now, constraints do not apply on foreign keys.
         *
         * As for now, you can only apply one constraint per column (remember that this is just a helper,
         * so it gives you roughly where you want to go, but you still need to customize things a bit).
         *
         *
         *
         *
         */
        $this->column2Constraint = [];
    }


    public function generateForms()
    {
        $db = QuickPdoInfoTool::getDatabase();
        $tables = QuickPdoInfoTool::getTables($db);
        $autoFormDir = CrudConfig::getCrudGenFormDir();
        FileSystemTool::mkdir($autoFormDir);
        foreach ($tables as $table) {
            $this->generateForm($table, $autoFormDir . "/" . $table . '.php');
        }
    }

    public function generateForm($table, $outFile = null)
    {


        $db = QuickPdoInfoTool::getDatabase();
        $columnNames = QuickPdoInfoTool::getColumnNames($table, $db);
        $primaryKey = QuickPdoInfoTool::getPrimaryKey($table, $db);
        $autoIncrementedColumn = QuickPdoInfoTool::getAutoIncrementedField($table, $db);
        $fkInfo = QuickPdoInfoTool::getForeignKeysInfo($table, $db);
        $foreignKeyPrettierColumns = $this->foreignKeyPrettierColumns;
        if (null === $foreignKeyPrettierColumns) {
            $foreignKeyPrettierColumns = $this->generateForeignKeyPrettierColumns();
        }
        $prettyTableNames = $this->prettyTableNames;
        $fixPrettyColumnNames = $this->fixPrettyColumnNames;
        $columnTypes = QuickPdoInfoTool::getColumnDataTypes($table, false);


//        a("table", $table);
//        a("fkInfo", $fkInfo);
//        a("foreignKeyPrettierColumns", $foreignKeyPrettierColumns);
//        a("prettyTableNames", $prettyTableNames);
//        az();

        $this->out = '';
        $this->line('<?php');
        $this->line('');
        $this->line('');
        $this->line('use Crud\CrudModule;');
        $this->line('');


        //--------------------------------------------
        // INSTANTIATION
        //--------------------------------------------
        $ric = array_map(function ($v) {
            return "'" . $v . "'";
        }, $primaryKey);


        $this->line('$form = CrudModule::getForm("' . $table . '", [' . implode(', ', $ric) . ']);');
        $this->line('');
        $this->line('');
        $this->line('');


        //--------------------------------------------
        // LABELS
        //--------------------------------------------
        $labels = [];
        foreach ($columnNames as $c) {
            if (array_key_exists($c, $fixPrettyColumnNames)) {
                $labels[$c] = $fixPrettyColumnNames[$c];
            } else {
                $labels[$c] = str_replace('_', ' ', $c);
            }
        }
        if (count($labels) > 0) {
            $this->line('$form->labels = [');
            foreach ($labels as $k => $v) {
                $this->line('    "' . $this->dqe($k) . '" => "' . $this->dqe($v) . '",');
            }
            $this->line('];');
            $this->line('');
            $this->line('');
        }


        //--------------------------------------------
        // WRITE TITLE
        //--------------------------------------------
        if (array_key_exists($table, $prettyTableNames)) {
            $title = $prettyTableNames[$table];
        } else {
            $title = str_replace('_', ' ', $table);
        }
        $title = ucfirst($title);
        $this->line('$form->title = "' . $this->dqe($title) . '";');
        $this->line('');
        $this->line('');


        //--------------------------------------------
        // ADD CONTROLS
        //--------------------------------------------
        $controls = [];
        foreach ($columnNames as $k => $c) {
            if ($autoIncrementedColumn !== $c) {
                $controls[] = $c;
            }
        }
        // fks
        foreach ($fkInfo as $column => $info) {
            $prettyColumn = null;
            if (array_key_exists($info[1], $foreignKeyPrettierColumns)) {
                $prettyColumn = $foreignKeyPrettierColumns[$info[1]];
            } else {
                throw new \Exception("Please provide an entry for the foreignKeyPrettierColumns with the key " . $info[1] . '.' . $info[2] . ', table is ' . $table);
            }
            $this->line('$form->addControl("' . $column . '")->type("selectByRequest", "select ' . $info[2] . ', ' . $prettyColumn . ' from ' . $info[1] . '");');
        }

        // other fields
        foreach ($controls as $c) {
            if (!array_key_exists($c, $fkInfo)) {

                $type = 'text';
                if (array_key_exists($c, $this->column2Type)) {
                    $type = $this->column2Type[$c];
                } else {
                    $columnType = $columnTypes[$c];
                    if (array_key_exists($columnType, $this->sqlType2Type)) {
                        $type = $this->sqlType2Type[$columnType];
                    }
                }
                $typeArgs = [];
                if (is_array($type)) {
                    $typeArgs = $type[1];
                    $type = $type[0];
                }
                $args = '';
                if (count($typeArgs) > 0) {
                    $typeArgs = array_map(function ($v) {
                        return '"' . $this->dqe($v) . '"';
                    }, $typeArgs);
                    $args = implode(', ', $typeArgs);
                }


                // constraints?
                $constraint = null;
                if (array_key_exists($table . '.' . $c, $this->column2Constraint)) {
                    $constraint = $this->column2Constraint[$table . '.' . $c];
                } elseif (array_key_exists($c, $this->column2Constraint)) {
                    $constraint = $this->column2Constraint[$c];
                } elseif (array_key_exists($table, $foreignKeyPrettierColumns) && $c === $foreignKeyPrettierColumns[$table]) {
                    $constraint = "required";
                } elseif (array_key_exists(0, $primaryKey) && $c === $primaryKey[0] &&  array_key_exists($primaryKey[0], $columnTypes) && 'varchar' === $columnTypes[$primaryKey[0]]) { // configuration table with 2 columns: cle, valeur
                    $constraint = "required";
                }



                $semiColon = (null === $constraint) ? ';' : '';
                $this->line('$form->addControl("' . $c . '")->type("' . $type . '"' . $args . ')' . $semiColon);

                if (null !== $constraint) {
                    if (is_string($constraint)) {
                        $this->line('->addConstraint("' . $constraint . '");');
                    } elseif (is_array($constraint)) {
                        $args = array_map(function ($v) {
                            return '"' . $this->dqe($v) . '"';
                        }, $constraint[1]);
                        $sArgs = implode(', ', $args);
                        $this->line('->addConstraint("' . $constraint[0] . '"' . $sArgs . ');');
                    } else {
                        throw new \Exception("Constraint must be a string or an array");
                    }
                }
            }
        }


        //--------------------------------------------
        // PRINT FORM
        //--------------------------------------------
        $this->line('');
        $this->line('');
        $this->line('$form->display();');


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
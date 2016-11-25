<?php


namespace Crud;

use Bat\FileSystemTool;
use QuickPdo\QuickPdoInfoTool;


/**
 * Helps creating the default crud files in app/crud/list
 */
class AbstractCrudGenerator
{

    protected $out;


    public function __construct()
    {
        $this->out = '';
    }

    //--------------------------------------------
    //
    //--------------------------------------------
    protected function line($m)
    {
        $this->out .= $m . PHP_EOL;
    }

    protected function dqe($m)
    {
        return str_replace('"', '\"', $m);
    }

    protected function sqe($m)
    {
        return str_replace("'", "\\'", $m);
    }

    protected function generateForeignKeyPrettierColumns()
    {
        $ret = [];
        $db = QuickPdoInfoTool::getDatabase();
        $tables = QuickPdoInfoTool::getTables($db);
        foreach ($tables as $table) {
            $fkInfos = QuickPdoInfoTool::getForeignKeysInfo($table);
            foreach ($fkInfos as $fkInfo) {

                $fkTable = $fkInfo[1];
                if (!array_key_exists($fkTable, $ret)) {
                    $types = QuickPdoInfoTool::getColumnDataTypes($fkTable, false);
                    foreach($types as $prettyColumn => $type){
                        if('varchar' === $type){
                            break;
                        }
                    }
                    $ret[$fkTable] = $prettyColumn;
                }
            }
        }
        return $ret;
    }

    //--------------------------------------------
    //
    //--------------------------------------------
    public static function getForeignKeyPrettierColumns()
    {
        return [
            'equipe' => 'nom',
            'membres' => 'pseudo',
            'videos' => 'titre',
            'users' => 'pseudo',
            'concours' => 'titre',
            'pays' => 'nom',
            'instruments' => 'nom',
            'niveaux' => 'nom',
            'styles_musicaux' => 'nom',
        ];
    }
}
<?php


namespace Crud;

use QuickPdo\QuickPdoInfoTool;

class CrudGenHelper
{

    public static function generateForeignKeyPrettierColumns()
    {
        $ret = [];
        $db = QuickPdoInfoTool::getDatabase();
        $tables = QuickPdoInfoTool::getTables($db);
        foreach ($tables as $table) {
            $fkInfos = QuickPdoInfoTool::getForeignKeysInfo($table);
            foreach ($fkInfos as $fkInfo) {

                $fkTable = $fkInfo[0] . '.' . $fkInfo[1];
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
}
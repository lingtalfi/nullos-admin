<?php


namespace Crud;

class CrudHelper
{

    public static function getUpdateFormUrl($table, $ric)
    {
        return CrudConfig::getCrudRootUrl() . '?name=' . $table . '&action=edit&ric=' . $ric;
    }

    public static function getListUrl($table)
    {
        return CrudConfig::getCrudRootUrl() . '?name=' . $table;
    }
}
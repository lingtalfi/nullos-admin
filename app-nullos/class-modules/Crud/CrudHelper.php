<?php


namespace Crud;


class CrudHelper
{

    public static function getUpdateFormUrl($table, $ric)
    {
        return url(CrudConfig::getCrudUri() . '?name=' . $table . '&action=edit&ric=' . $ric);
    }

    public static function getInsertFormUrl($table)
    {
        return url(CrudConfig::getCrudUri() . '?name=' . $table . '&action=insert');
    }

    public static function getListUrl($table)
    {
        return url(CrudConfig::getCrudUri() . '?name=' . $table);
    }
}
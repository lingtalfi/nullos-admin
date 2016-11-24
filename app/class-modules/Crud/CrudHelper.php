<?php


namespace Crud;

class CrudHelper
{

    public static function getUpdateFormUrl($table, $ric)
    {
        return '/table?name=' . $table . '&action=edit&ric=' . $ric . '';
    }
}
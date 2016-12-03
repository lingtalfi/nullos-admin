<?php


namespace QuickStart;

use Bat\FileSystemTool;
use Crud\CrudModule;
use Privilege\Privilege;

class QuickStartModule
{





    public static function getQuickStartUrl($action = null, array $params = null)
    {
        if (null === $action) {
            $action = 'start';
        }
        if (null === $params) {
            $params = [];
        }
        $params['action'] = $action;
        return url('/quickstart', $params, false);
    }


}
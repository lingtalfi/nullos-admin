<?php

namespace Boot;


class BootUtil
{


    public static function generateInitTmp(array $tags = [])
    {
        $defaults = [
            '{dbNameLocal}' => 'my_db',
            '{dbUserLocal}' => 'root',
            '{dbPassLocal}' => 'root',
            //
            '{dbNameDistant}' => 'my_db',
            '{dbUserDistant}' => 'root',
            '{dbPassDistant}' => 'root',


            '{websiteName}' => 'Nullos admin',
            '{timezone}' => 'Europe/Paris',
            '{lang}' => 'en',
        ];
        $ftags = [];
        foreach ($tags as $k => $v) {
            $ftags['{' . $k . '}'] = $v;
        }

        $_tags = array_replace($defaults, $ftags);


        $s = file_get_contents(__DIR__ . "/template/init-tmp.php");
        $s2 = str_replace(array_keys($_tags), array_values($_tags), $s);
        $file = APP_ROOT_DIR . "/init.php";
        if (false !== file_put_contents($file, $s2)) {
            return true;
        }
        return false;
    }
}
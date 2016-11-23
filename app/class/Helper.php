<?php


class Helper
{

    public static function isLocal()
    {
        if ('/Volumes/' === substr(__DIR__, 0, 9)) {
            return true;
        }
        return false;
    }


    public static function getWhereFragmentFromRic(array $ric, array &$markers)
    {
        $i = 0;
        $q = "(";
        foreach ($ric as $k => $v) {
            if (0 !== $i) {
                $q .= " and ";
            }
            $marker = 'm' . $i++;
            $q .= "$k=:" . $marker;
            $markers[$marker] = $v;
        }
        $q .= ")";
        return $q;
    }
}
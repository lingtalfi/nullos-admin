<?php


use Privilege\Privilege;

class Helper
{

    public static function isLocal()
    {
        if ('/Volumes/' === substr(__DIR__, 0, 9)) {
            return true;
        }
        return false;
    }


    public static function layoutElementIf($fileName, $privilege, $default = null)
    {
        if (true === Privilege::has($privilege)) {
            return $fileName;
        }
        if(null===$default){
            $default = "page-denied.php";
        }
        return $default;
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


    /**
     * goal of this function:
     * you are in js code, and you need to write a translation string (see DataTable.php -> multiple action), like so:
     *
     *
     * if (confirm) {
     * if (true === window.confirm("<?php echo Helper::jsQuote(__("Are you sure you want to delete all the selected rows?")); ?>")) {
     * tableForm.submit();
     * }
     * }
     * else {
     * tableForm.submit();
     * }
     *
     */
    public static function jsQuote($m)
    {
        return str_replace('"', '\"', $m);
    }
}
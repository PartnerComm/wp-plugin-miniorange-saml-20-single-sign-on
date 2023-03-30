<?php


abstract class BasicEnum
{
    private static $constCacheArray = NULL;
    public static function getConstants()
    {
        if (!(self::$constCacheArray == NULL)) {
            goto Ad;
        }
        self::$constCacheArray = [];
        Ad:
        $Zh = get_called_class();
        if (!empty(self::$constCacheArray[$Zh])) {
            goto Z0;
        }
        $d5 = new ReflectionClass($Zh);
        self::$constCacheArray[$Zh] = $d5->getConstants();
        Z0:
        return self::$constCacheArray[$Zh];
    }
    public static function isValidName($YB, $BF = false)
    {
        $JL = self::getConstants();
        if (!$BF) {
            goto WW;
        }
        return !empty($JL[$YB]);
        WW:
        $lD = array_map("\163\x74\162\164\x6f\154\x6f\x77\x65\162", array_keys($JL));
        return in_array(strtolower($YB), $lD);
    }
    public static function isValidValue($cK, $BF = true)
    {
        $Yr = array_values(self::getConstants());
        return in_array($cK, $Yr, $BF);
    }
}

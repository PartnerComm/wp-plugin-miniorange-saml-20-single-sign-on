<?php


abstract class BasicEnum
{
    private static $constCacheArray = NULL;
    public static function getConstants()
    {
        if (!(self::$constCacheArray == NULL)) {
            goto a9a;
        }
        self::$constCacheArray = array();
        a9a:
        $OH = get_called_class();
        if (array_key_exists($OH, self::$constCacheArray)) {
            goto NpH;
        }
        $I0 = new ReflectionClass($OH);
        self::$constCacheArray[$OH] = $I0->getConstants();
        NpH:
        return self::$constCacheArray[$OH];
    }
    public static function isValidName($eB, $OO = false)
    {
        $Ok = self::getConstants();
        if (!$OO) {
            goto v9Z;
        }
        return array_key_exists($eB, $Ok);
        v9Z:
        $Kn = array_map("\163\164\162\x74\157\x6c\x6f\167\x65\x72", array_keys($Ok));
        return in_array(strtolower($eB), $Kn);
    }
    public static function isValidValue($zw, $OO = true)
    {
        $Uj = array_values(self::getConstants());
        return in_array($zw, $Uj, $OO);
    }
}

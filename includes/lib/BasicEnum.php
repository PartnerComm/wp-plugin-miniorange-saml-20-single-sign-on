<?php


abstract class BasicEnum
{
    private static $constCacheArray = NULL;
    public static function getConstants()
    {
        if (!(self::$constCacheArray == NULL)) {
            goto Qa;
        }
        self::$constCacheArray = array();
        Qa:
        $mg = get_called_class();
        if (array_key_exists($mg, self::$constCacheArray)) {
            goto L9;
        }
        $Zv = new ReflectionClass($mg);
        self::$constCacheArray[$mg] = $Zv->getConstants();
        L9:
        return self::$constCacheArray[$mg];
    }
    public static function isValidName($M7, $x6 = false)
    {
        $vd = self::getConstants();
        if (!$x6) {
            goto BB;
        }
        return array_key_exists($M7, $vd);
        BB:
        $wu = array_map("\163\164\x72\x74\157\x6c\x6f\x77\145\162", array_keys($vd));
        return in_array(strtolower($M7), $wu);
    }
    public static function isValidValue($q0, $x6 = true)
    {
        $yE = array_values(self::getConstants());
        return in_array($q0, $yE, $x6);
    }
}

<?php


abstract class BasicEnum
{
    private static $constCacheArray = NULL;
    public static function getConstants()
    {
        if (!(self::$constCacheArray == NULL)) {
            goto SX;
        }
        self::$constCacheArray = [];
        SX:
        $vW = get_called_class();
        if (array_key_exists($vW, self::$constCacheArray)) {
            goto Af;
        }
        $dY = new ReflectionClass($vW);
        self::$constCacheArray[$vW] = $dY->getConstants();
        Af:
        return self::$constCacheArray[$vW];
    }
    public static function isValidName($JI, $L3 = false)
    {
        $ci = self::getConstants();
        if (!$L3) {
            goto u6;
        }
        return array_key_exists($JI, $ci);
        u6:
        $M6 = array_map("\x73\x74\x72\x74\157\154\x6f\167\145\x72", array_keys($ci));
        return in_array(strtolower($JI), $M6);
    }
    public static function isValidValue($St, $L3 = true)
    {
        $go = array_values(self::getConstants());
        return in_array($St, $go, $L3);
    }
}

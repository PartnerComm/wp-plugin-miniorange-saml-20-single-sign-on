<?php


abstract class BasicEnum
{
    private static $constCacheArray = NULL;
    public static function getConstants()
    {
        if (!(self::$constCacheArray == NULL)) {
            goto vf8;
        }
        self::$constCacheArray = array();
        vf8:
        $Ip = get_called_class();
        if (array_key_exists($Ip, self::$constCacheArray)) {
            goto eJs;
        }
        $S3 = new ReflectionClass($Ip);
        self::$constCacheArray[$Ip] = $S3->getConstants();
        eJs:
        return self::$constCacheArray[$Ip];
    }
    public static function isValidName($Ze, $Tp = false)
    {
        $Su = self::getConstants();
        if (!$Tp) {
            goto lJi;
        }
        return array_key_exists($Ze, $Su);
        lJi:
        $wA = array_map("\163\x74\x72\x74\x6f\x6c\157\x77\145\x72", array_keys($Su));
        return in_array(strtolower($Ze), $wA);
    }
    public static function isValidValue($j1, $Tp = true)
    {
        $Sr = array_values(self::getConstants());
        return in_array($j1, $Sr, $Tp);
    }
}

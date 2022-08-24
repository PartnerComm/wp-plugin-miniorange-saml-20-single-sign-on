<?php


abstract class BasicEnum
{
    private static $constCacheArray = NULL;
    public static function getConstants()
    {
        if (!(self::$constCacheArray == NULL)) {
            goto et;
        }
        self::$constCacheArray = [];
        et:
        $c0 = get_called_class();
        if (array_key_exists($c0, self::$constCacheArray)) {
            goto mT;
        }
        $cD = new ReflectionClass($c0);
        self::$constCacheArray[$c0] = $cD->getConstants();
        mT:
        return self::$constCacheArray[$c0];
    }
    public static function isValidName($lK, $Mc = false)
    {
        $a_ = self::getConstants();
        if (!$Mc) {
            goto zB;
        }
        return array_key_exists($lK, $a_);
        zB:
        $Tp = array_map("\163\x74\x72\164\157\154\x6f\167\145\x72", array_keys($a_));
        return in_array(strtolower($lK), $Tp);
    }
    public static function isValidValue($x9, $Mc = true)
    {
        $oG = array_values(self::getConstants());
        return in_array($x9, $oG, $Mc);
    }
}

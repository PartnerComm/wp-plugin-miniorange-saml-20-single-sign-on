<?php


abstract class BasicEnum
{
    private static $constCacheArray = NULL;
    public static function getConstants()
    {
        if (!(self::$constCacheArray == NULL)) {
            goto foe;
        }
        self::$constCacheArray = array();
        foe:
        $PB = get_called_class();
        if (array_key_exists($PB, self::$constCacheArray)) {
            goto wk_;
        }
        $XC = new ReflectionClass($PB);
        self::$constCacheArray[$PB] = $XC->getConstants();
        wk_:
        return self::$constCacheArray[$PB];
    }
    public static function isValidName($vd, $Vs = false)
    {
        $K9 = self::getConstants();
        if (!$Vs) {
            goto Ls7;
        }
        return array_key_exists($vd, $K9);
        Ls7:
        $ID = array_map("\x73\164\162\x74\157\154\x6f\x77\x65\x72", array_keys($K9));
        return in_array(strtolower($vd), $ID);
    }
    public static function isValidValue($Iy, $Vs = true)
    {
        $o0 = array_values(self::getConstants());
        return in_array($Iy, $o0, $Vs);
    }
}

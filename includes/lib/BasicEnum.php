<?php


abstract class BasicEnum
{
    private static $constCacheArray = NULL;
    public static function getConstants()
    {
        if (!(self::$constCacheArray == NULL)) {
            goto GlC;
        }
        self::$constCacheArray = array();
        GlC:
        $wS = get_called_class();
        if (array_key_exists($wS, self::$constCacheArray)) {
            goto aSq;
        }
        $dS = new ReflectionClass($wS);
        self::$constCacheArray[$wS] = $dS->getConstants();
        aSq:
        return self::$constCacheArray[$wS];
    }
    public static function isValidName($ly, $Sq = false)
    {
        $gB = self::getConstants();
        if (!$Sq) {
            goto O_S;
        }
        return array_key_exists($ly, $gB);
        O_S:
        $ro = array_map("\x73\x74\x72\164\x6f\x6c\x6f\x77\x65\162", array_keys($gB));
        return in_array(strtolower($ly), $ro);
    }
    public static function isValidValue($DE, $Sq = true)
    {
        $XV = array_values(self::getConstants());
        return in_array($DE, $XV, $Sq);
    }
}

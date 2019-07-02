<?php


namespace RobRichards\XMLSecLibs\Utils;

class XPath
{
    const ALPHANUMERIC = "\134\167\x5c\144";
    const NUMERIC = "\x5c\144";
    const LETTERS = "\134\x77";
    const EXTENDED_ALPHANUMERIC = "\134\x77\134\x64\x5c\163\134\55\137\x3a\x5c\x2e";
    const SINGLE_QUOTE = "\47";
    const DOUBLE_QUOTE = "\x22";
    const ALL_QUOTES = "\133\x27\x22\135";
    public static function filterAttrValue($Iy, $Jf = self::ALL_QUOTES)
    {
        return preg_replace("\43" . $Jf . "\x23", '', $Iy);
    }
    public static function filterAttrName($vd, $Bx = self::EXTENDED_ALPHANUMERIC)
    {
        return preg_replace("\x23\x5b\x5e" . $Bx . "\135\43", '', $vd);
    }
}

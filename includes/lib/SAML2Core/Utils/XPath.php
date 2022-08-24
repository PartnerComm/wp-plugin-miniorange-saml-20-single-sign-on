<?php


namespace RobRichards\XMLSecLibs\Utils;

class XPath
{
    const ALPHANUMERIC = "\134\x77\134\144";
    const NUMERIC = "\x5c\144";
    const LETTERS = "\134\167";
    const EXTENDED_ALPHANUMERIC = "\134\167\x5c\x64\x5c\x73\x5c\x2d\137\72\134\56";
    const SINGLE_QUOTE = "\47";
    const DOUBLE_QUOTE = "\42";
    const ALL_QUOTES = "\x5b\x27\42\135";
    public static function filterAttrValue($x9, $iG = self::ALL_QUOTES)
    {
        return preg_replace("\x23" . $iG . "\x23", '', $x9);
    }
    public static function filterAttrName($lK, $P1 = self::EXTENDED_ALPHANUMERIC)
    {
        return preg_replace("\x23\133\136" . $P1 . "\135\43", '', $lK);
    }
}

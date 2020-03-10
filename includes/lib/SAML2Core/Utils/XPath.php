<?php


namespace RobRichards\XMLSecLibs\Utils;

class XPath
{
    const ALPHANUMERIC = "\x5c\x77\x5c\144";
    const NUMERIC = "\134\x64";
    const LETTERS = "\x5c\167";
    const EXTENDED_ALPHANUMERIC = "\x5c\x77\x5c\x64\134\x73\134\55\x5f\x3a\134\56";
    const SINGLE_QUOTE = "\x27";
    const DOUBLE_QUOTE = "\x22";
    const ALL_QUOTES = "\x5b\x27\x22\x5d";
    public static function filterAttrValue($zw, $lA = self::ALL_QUOTES)
    {
        return preg_replace("\43" . $lA . "\43", '', $zw);
    }
    public static function filterAttrName($eB, $yZ = self::EXTENDED_ALPHANUMERIC)
    {
        return preg_replace("\x23\133\x5e" . $yZ . "\135\43", '', $eB);
    }
}

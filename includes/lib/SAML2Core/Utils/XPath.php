<?php


namespace RobRichards\XMLSecLibs\Utils;

class XPath
{
    const ALPHANUMERIC = "\134\x77\x5c\x64";
    const NUMERIC = "\x5c\x64";
    const LETTERS = "\134\x77";
    const EXTENDED_ALPHANUMERIC = "\134\167\134\x64\134\163\x5c\55\137\72\134\56";
    const SINGLE_QUOTE = "\47";
    const DOUBLE_QUOTE = "\x22";
    const ALL_QUOTES = "\133\x27\42\x5d";
    public static function filterAttrValue($j1, $w7 = self::ALL_QUOTES)
    {
        return preg_replace("\x23" . $w7 . "\43", '', $j1);
    }
    public static function filterAttrName($Ze, $zg = self::EXTENDED_ALPHANUMERIC)
    {
        return preg_replace("\x23\x5b\x5e" . $zg . "\135\x23", '', $Ze);
    }
}

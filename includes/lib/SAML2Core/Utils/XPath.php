<?php


namespace RobRichards\XMLSecLibs\Utils;

class XPath
{
    const ALPHANUMERIC = "\134\x77\134\x64";
    const NUMERIC = "\134\144";
    const LETTERS = "\134\167";
    const EXTENDED_ALPHANUMERIC = "\134\167\134\x64\x5c\163\134\x2d\137\x3a\134\x2e";
    const SINGLE_QUOTE = "\47";
    const DOUBLE_QUOTE = "\42";
    const ALL_QUOTES = "\x5b\47\x22\135";
    public static function filterAttrValue($DE, $a7 = self::ALL_QUOTES)
    {
        return preg_replace("\43" . $a7 . "\43", '', $DE);
    }
    public static function filterAttrName($ly, $NJ = self::EXTENDED_ALPHANUMERIC)
    {
        return preg_replace("\43\x5b\x5e" . $NJ . "\x5d\43", '', $ly);
    }
}

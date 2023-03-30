<?php


namespace RobRichards\XMLSecLibs\Utils;

class XPath
{
    const ALPHANUMERIC = "\134\x77\x5c\x64";
    const NUMERIC = "\134\x64";
    const LETTERS = "\134\167";
    const EXTENDED_ALPHANUMERIC = "\134\167\134\x64\x5c\x73\134\x2d\137\x3a\134\56";
    const SINGLE_QUOTE = "\x27";
    const DOUBLE_QUOTE = "\42";
    const ALL_QUOTES = "\133\x27\x22\135";
    public static function filterAttrValue($cK, $dY = self::ALL_QUOTES)
    {
        return preg_replace("\43" . $dY . "\43", '', $cK);
    }
    public static function filterAttrName($YB, $tl = self::EXTENDED_ALPHANUMERIC)
    {
        return preg_replace("\43\133\136" . $tl . "\x5d\x23", '', $YB);
    }
}

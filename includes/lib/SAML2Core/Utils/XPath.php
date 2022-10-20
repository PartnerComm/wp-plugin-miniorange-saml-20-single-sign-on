<?php


namespace RobRichards\XMLSecLibs\Utils;

class XPath
{
    const ALPHANUMERIC = "\134\x77\134\144";
    const NUMERIC = "\134\144";
    const LETTERS = "\x5c\x77";
    const EXTENDED_ALPHANUMERIC = "\x5c\x77\x5c\x64\x5c\163\134\55\137\72\x5c\56";
    const SINGLE_QUOTE = "\47";
    const DOUBLE_QUOTE = "\42";
    const ALL_QUOTES = "\x5b\x27\x22\135";
    public static function filterAttrValue($St, $Be = self::ALL_QUOTES)
    {
        return preg_replace("\x23" . $Be . "\x23", '', $St);
    }
    public static function filterAttrName($JI, $k_ = self::EXTENDED_ALPHANUMERIC)
    {
        return preg_replace("\x23\133\x5e" . $k_ . "\135\x23", '', $JI);
    }
}

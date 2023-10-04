<?php
/**
 * This file is a part of the miniorange-saml-20-single-sign-on plugin.
 *
 * @link https://plugins.miniorange.com/
 * @author miniOrange
 * @package miniorange-saml-20-single-sign-on
 */


namespace RobRichards\XMLSecLibs\Utils;

class XPath
{
    const ALPHANUMERIC = "\x5c\167\134\144";
    const NUMERIC = "\134\144";
    const LETTERS = "\x5c\x77";
    const EXTENDED_ALPHANUMERIC = "\x5c\167\134\x64\x5c\163\x5c\x2d\137\x3a\134\56";
    const SINGLE_QUOTE = "\x27";
    const DOUBLE_QUOTE = "\42";
    const ALL_QUOTES = "\x5b\x27\x22\135";
    public static function filterAttrValue($Wl, $Dk = self::ALL_QUOTES)
    {
        return preg_replace("\43" . $Dk . "\43", '', $Wl);
    }
    public static function filterAttrName($Zz, $rt = self::EXTENDED_ALPHANUMERIC)
    {
        return preg_replace("\43\133\x5e" . $rt . "\x5d\43", '', $Zz);
    }
}

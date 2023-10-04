<?php
/**
 * This file is a part of the miniorange-saml-20-single-sign-on plugin.
 *
 * @link https://plugins.miniorange.com/
 * @author miniOrange
 * @package miniorange-saml-20-single-sign-on
 */


if (defined("\101\102\123\x50\x41\124\x48")) {
    goto pm;
}
exit;
pm:
abstract class Mo_Saml_Basic_Enum
{
    private static $const_cache_array = null;
    public static function get_constants()
    {
        if (!(null === self::$const_cache_array)) {
            goto zT;
        }
        self::$const_cache_array = array();
        zT:
        $AB = get_called_class();
        if (!empty(self::$const_cache_array[$AB])) {
            goto A3;
        }
        $B_ = new ReflectionClass($AB);
        self::$const_cache_array[$AB] = $B_->getConstants();
        A3:
        return self::$const_cache_array[$AB];
    }
    public static function is_valid_name($Zz, $Ce = false)
    {
        $Vf = self::get_constants();
        if (!$Ce) {
            goto rz;
        }
        return !empty($Vf[$Zz]);
        rz:
        $hl = array_map("\163\164\x72\164\157\154\157\167\x65\x72", array_keys($Vf));
        return in_array(strtolower($Zz), $hl, true);
    }
    public static function is_valid_value($Wl, $Ce = true)
    {
        $o9 = array_values(self::get_constants());
        return in_array($Wl, $o9, true);
    }
}

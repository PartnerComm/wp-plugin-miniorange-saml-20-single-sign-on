<?php
/**
 * This file is a part of the miniorange-saml-20-single-sign-on plugin.
 *
 * @link https://plugins.miniorange.com/
 * @author miniOrange
 * @package miniorange-saml-20-single-sign-on
 */


if (defined("\x41\x42\x53\120\x41\x54\110")) {
    goto FiI;
}
exit;
FiI:
class Mo_Saml_Config_Utility
{
    public static function mo_saml_get_sp_entity_id($j1)
    {
        $g8 = get_option("\155\x6f\137\x73\x61\155\154\x5f\163\160\x5f\x65\156\164\151\x74\171\x5f\x69\144");
        if (!empty($g8)) {
            goto AkI;
        }
        $g8 = $j1 . "\x2f\x77\160\x2d\x63\157\156\164\145\156\x74\x2f\160\x6c\x75\147\x69\x6e\x73\57\155\151\x6e\x69\157\162\x61\156\x67\x65\55\x73\141\x6d\154\x2d\x32\60\x2d\x73\x69\x6e\147\154\x65\55\x73\x69\x67\156\55\157\156\57";
        AkI:
        return $g8;
    }
}

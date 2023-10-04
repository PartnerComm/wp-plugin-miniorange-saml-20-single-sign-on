<?php
/**
 * This file is a part of the miniorange-saml-20-single-sign-on plugin.
 *
 * @link https://plugins.miniorange.com/
 * @author miniOrange
 * @package miniorange-saml-20-single-sign-on
 */


class AESEncryption
{
    public static function encrypt_data($iZ, $mr)
    {
        $mr = openssl_digest($mr, "\163\x68\141\x32\x35\66");
        $YW = "\x61\x65\x73\55\61\x32\x38\55\x65\x63\142";
        $kv = openssl_encrypt($iZ, $YW, $mr, OPENSSL_RAW_DATA || OPENSSL_ZERO_PADDING);
        return base64_encode($kv);
    }
    public static function decrypt_data($iZ, $mr)
    {
        $kJ = base64_decode($iZ);
        $mr = openssl_digest($mr, "\163\150\x61\x32\65\66");
        $YW = "\x41\105\123\x2d\x31\x32\70\x2d\x45\103\x42";
        $Mi = openssl_cipher_iv_length($YW);
        $YA = substr($kJ, 0, $Mi);
        $iZ = substr($kJ, $Mi);
        $JH = openssl_decrypt($iZ, $YW, $mr, OPENSSL_RAW_DATA || OPENSSL_ZERO_PADDING, $YA);
        return $JH;
    }
}

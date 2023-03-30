<?php


class AESEncryption
{
    public static function encrypt_data($h4, $WO)
    {
        $WO = openssl_digest($WO, "\163\150\x61\62\65\x36");
        $u0 = "\x61\145\163\x2d\61\62\70\55\x65\x63\142";
        $Mb = openssl_encrypt($h4, $u0, $WO, OPENSSL_RAW_DATA || OPENSSL_ZERO_PADDING);
        return base64_encode($Mb);
    }
    public static function decrypt_data($h4, $WO)
    {
        $to = base64_decode($h4);
        $WO = openssl_digest($WO, "\x73\150\x61\62\x35\x36");
        $u0 = "\x41\x45\x53\x2d\x31\62\x38\55\105\103\102";
        $Bn = openssl_cipher_iv_length($u0);
        $PR = substr($to, 0, $Bn);
        $h4 = substr($to, $Bn);
        $Rp = openssl_decrypt($h4, $u0, $WO, OPENSSL_RAW_DATA || OPENSSL_ZERO_PADDING, $PR);
        return $Rp;
    }
}

<?php


class AESEncryption
{
    public static function encrypt_data($cd, $ES)
    {
        $ES = openssl_digest($ES, "\163\x68\x61\x32\x35\x36");
        $XC = "\x61\x65\x73\x2d\x31\x32\70\x2d\145\143\142";
        $Q0 = openssl_encrypt($cd, $XC, $ES, OPENSSL_RAW_DATA || OPENSSL_ZERO_PADDING);
        return base64_encode($Q0);
    }
    public static function decrypt_data($cd, $ES)
    {
        $BX = base64_decode($cd);
        $ES = openssl_digest($ES, "\x73\x68\141\62\65\66");
        $XC = "\x41\105\123\x2d\61\62\70\x2d\105\103\x42";
        $h8 = openssl_cipher_iv_length($XC);
        $Ju = substr($BX, 0, $h8);
        $cd = substr($BX, $h8);
        $xe = openssl_decrypt($cd, $XC, $ES, OPENSSL_RAW_DATA || OPENSSL_ZERO_PADDING, $Ju);
        return $xe;
    }
}
?>

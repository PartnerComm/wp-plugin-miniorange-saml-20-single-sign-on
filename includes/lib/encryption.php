<?php


class AESEncryption
{
    public static function encrypt_data($aS, $Kn)
    {
        $Kn = openssl_digest($Kn, "\x73\150\x61\62\x35\x36");
        $N0 = "\x41\x45\123\55\61\x32\70\x2d\x45\x43\102";
        $Kj = openssl_cipher_iv_length($N0);
        $o4 = openssl_random_pseudo_bytes($Kj);
        $CL = openssl_encrypt($aS, $N0, $Kn, OPENSSL_RAW_DATA || OPENSSL_ZERO_PADDING, $o4);
        return base64_encode($o4 . $CL);
    }
    public static function decrypt_data($aS, $Kn)
    {
        $AM = base64_decode($aS);
        $Kn = openssl_digest($Kn, "\x73\x68\141\62\65\x36");
        $N0 = "\101\x45\x53\55\x31\62\70\55\x45\x43\x42";
        $Kj = openssl_cipher_iv_length($N0);
        $o4 = substr($AM, 0, $Kj);
        $aS = substr($AM, $Kj);
        $LV = openssl_decrypt($aS, $N0, $Kn, OPENSSL_RAW_DATA || OPENSSL_ZERO_PADDING, $o4);
        return $LV;
    }
}
?>

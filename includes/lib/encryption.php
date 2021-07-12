<?php


class AESEncryption
{
    public static function encrypt_data($u_, $Ej)
    {
        $Ej = openssl_digest($Ej, "\x73\150\x61\x32\65\x36");
        $De = "\141\x65\x73\x2d\x31\62\x38\x2d\x65\x63\x62";
        $b7 = openssl_encrypt($u_, $De, $Ej, OPENSSL_RAW_DATA || OPENSSL_ZERO_PADDING);
        return base64_encode($b7);
    }
    public static function decrypt_data($u_, $Ej)
    {
        $df = base64_decode($u_);
        $Ej = openssl_digest($Ej, "\163\150\141\x32\x35\x36");
        $De = "\101\105\x53\55\x31\62\x38\55\x45\103\102";
        $qu = openssl_cipher_iv_length($De);
        $QS = substr($df, 0, $qu);
        $u_ = substr($df, $qu);
        $Vx = openssl_decrypt($u_, $De, $Ej, OPENSSL_RAW_DATA || OPENSSL_ZERO_PADDING, $QS);
        return $Vx;
    }
}
?>

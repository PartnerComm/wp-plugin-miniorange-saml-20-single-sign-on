<?php


class AESEncryption
{
    public static function encrypt_data($Qk, $k3)
    {
        $k3 = openssl_digest($k3, "\x73\x68\x61\62\65\x36");
        $CG = "\141\145\x73\x2d\x31\62\70\55\145\x63\x62";
        $eM = openssl_encrypt($Qk, $CG, $k3, OPENSSL_RAW_DATA || OPENSSL_ZERO_PADDING);
        return base64_encode($eM);
    }
    public static function decrypt_data($Qk, $k3)
    {
        $iF = base64_decode($Qk);
        $k3 = openssl_digest($k3, "\163\x68\141\62\65\x36");
        $CG = "\x41\x45\123\55\61\62\x38\x2d\105\103\x42";
        $i5 = openssl_cipher_iv_length($CG);
        $K7 = substr($iF, 0, $i5);
        $Qk = substr($iF, $i5);
        $yf = openssl_decrypt($Qk, $CG, $k3, OPENSSL_RAW_DATA || OPENSSL_ZERO_PADDING, $K7);
        return $yf;
    }
}
?>

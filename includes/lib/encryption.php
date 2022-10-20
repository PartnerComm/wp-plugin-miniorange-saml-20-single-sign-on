<?php


class AESEncryption
{
    public static function encrypt_data($WL, $U6)
    {
        $U6 = openssl_digest($U6, "\x73\x68\141\x32\x35\x36");
        $Hl = "\141\145\x73\x2d\x31\x32\70\x2d\x65\143\x62";
        $b2 = openssl_encrypt($WL, $Hl, $U6, OPENSSL_RAW_DATA || OPENSSL_ZERO_PADDING);
        return base64_encode($b2);
    }
    public static function decrypt_data($WL, $U6)
    {
        $HQ = base64_decode($WL);
        $U6 = openssl_digest($U6, "\x73\x68\141\62\x35\66");
        $Hl = "\101\105\123\x2d\61\x32\x38\x2d\105\103\102";
        $Aj = openssl_cipher_iv_length($Hl);
        $Mt = substr($HQ, 0, $Aj);
        $WL = substr($HQ, $Aj);
        $mi = openssl_decrypt($WL, $Hl, $U6, OPENSSL_RAW_DATA || OPENSSL_ZERO_PADDING, $Mt);
        return $mi;
    }
}

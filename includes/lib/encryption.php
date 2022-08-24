<?php


class AESEncryption
{
    public static function encrypt_data($pm, $N5)
    {
        $N5 = openssl_digest($N5, "\x73\x68\141\62\x35\66");
        $Hu = "\141\145\x73\55\61\62\x38\x2d\x65\143\142";
        $ic = openssl_encrypt($pm, $Hu, $N5, OPENSSL_RAW_DATA || OPENSSL_ZERO_PADDING);
        return base64_encode($ic);
    }
    public static function decrypt_data($pm, $N5)
    {
        $MJ = base64_decode($pm);
        $N5 = openssl_digest($N5, "\x73\150\x61\62\x35\x36");
        $Hu = "\x41\105\x53\x2d\x31\62\x38\55\x45\x43\x42";
        $GR = openssl_cipher_iv_length($Hu);
        $GI = substr($MJ, 0, $GR);
        $pm = substr($MJ, $GR);
        $bC = openssl_decrypt($pm, $Hu, $N5, OPENSSL_RAW_DATA || OPENSSL_ZERO_PADDING, $GI);
        return $bC;
    }
}

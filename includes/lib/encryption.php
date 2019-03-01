<?php


class AESEncryption
{
    public static function encrypt_data($Or, $nz)
    {
        $nz = openssl_digest($nz, "\163\150\x61\x32\65\x36");
        $lY = "\101\105\x53\55\x31\x32\70\55\105\103\x42";
        $vU = openssl_cipher_iv_length($lY);
        $aj = openssl_random_pseudo_bytes($vU);
        $ok = openssl_encrypt($Or, $lY, $nz, OPENSSL_RAW_DATA || OPENSSL_ZERO_PADDING, $aj);
        return base64_encode($aj . $ok);
    }
    public static function decrypt_data($Or, $nz)
    {
        $YM = base64_decode($Or);
        $nz = openssl_digest($nz, "\163\x68\141\62\x35\66");
        $lY = "\x41\105\123\55\x31\x32\70\55\105\103\x42";
        $vU = openssl_cipher_iv_length($lY);
        $aj = substr($YM, 0, $vU);
        $Or = substr($YM, $vU);
        $kW = openssl_decrypt($Or, $lY, $nz, OPENSSL_RAW_DATA || OPENSSL_ZERO_PADDING, $aj);
        return $kW;
    }
}
?>

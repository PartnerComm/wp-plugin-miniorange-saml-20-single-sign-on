<?php


class CertificateUtility
{
    public static function generate_certificate($N5, $jj, $hK)
    {
        $Jh = openssl_pkey_new();
        $my = openssl_csr_new($N5, $Jh, $jj);
        $yD = openssl_csr_sign($my, null, $Jh, $hK, $jj, time());
        openssl_csr_export($my, $la);
        openssl_x509_export($yD, $q4);
        openssl_pkey_export($Jh, $o7);
        Sa:
        if (!(($El = openssl_error_string()) !== false)) {
            goto Bw;
        }
        error_log("\103\145\162\x74\x69\x66\151\x63\x61\x74\x65\125\164\151\x6c\x69\164\x79\x3a\40\105\162\162\x6f\162\40\x67\145\x6e\145\x72\141\x74\151\156\147\40\143\x65\162\164\x69\x66\151\143\x61\x74\145\56\x20" . $El);
        goto Sa;
        Bw:
        $ZY = array("\160\165\x62\154\x69\x63\x5f\153\145\x79" => $q4, "\x70\x72\151\x76\x61\x74\145\x5f\x6b\145\171" => $o7);
        return $ZY;
    }
}

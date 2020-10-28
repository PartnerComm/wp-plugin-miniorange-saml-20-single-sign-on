<?php


class CertificateUtility
{
    public static function generate_certificate($J_, $j9, $vw)
    {
        $xm = openssl_pkey_new();
        $yZ = openssl_csr_new($J_, $xm, $j9);
        $UY = openssl_csr_sign($yZ, null, $xm, $vw, $j9, time());
        openssl_csr_export($yZ, $zh);
        openssl_x509_export($UY, $n8);
        openssl_pkey_export($xm, $OK);
        Kp5:
        if (!(($XE = openssl_error_string()) !== false)) {
            goto IJJ;
        }
        error_log("\x43\145\162\164\151\146\151\143\141\164\145\125\164\151\154\x69\x74\171\x3a\x20\105\x72\x72\x6f\162\40\147\x65\156\x65\162\141\x74\151\156\x67\x20\143\145\162\164\151\x66\x69\143\x61\164\x65\56\x20" . $XE);
        goto Kp5;
        IJJ:
        $AQ = array("\160\x75\142\x6c\151\143\137\153\x65\x79" => $n8, "\x70\162\x69\166\141\164\x65\137\153\x65\x79" => $OK);
        return $AQ;
    }
}

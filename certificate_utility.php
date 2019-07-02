<?php


class CertificateUtility
{
    public static function generate_certificate($TF, $Kf, $au)
    {
        $tz = openssl_pkey_new();
        $P_ = openssl_csr_new($TF, $tz, $Kf);
        $hb = openssl_csr_sign($P_, null, $tz, $au, $Kf, time());
        openssl_csr_export($P_, $Ak);
        openssl_x509_export($hb, $B4);
        openssl_pkey_export($tz, $Bv);
        lmt:
        if (!(($xr = openssl_error_string()) !== false)) {
            goto P3a;
        }
        error_log("\x43\145\162\x74\151\x66\x69\x63\141\x74\145\125\x74\151\x6c\x69\164\x79\72\x20\105\x72\x72\157\162\x20\147\x65\156\x65\x72\x61\164\151\156\x67\x20\x63\145\x72\x74\151\x66\151\143\x61\x74\145\56\40" . $xr);
        goto lmt;
        P3a:
        $pj = array("\160\165\142\x6c\x69\x63\137\153\x65\x79" => $B4, "\160\162\x69\166\x61\164\x65\137\153\145\x79" => $Bv);
        return $pj;
    }
}

<?php


class CertificateUtility
{
    public static function generate_certificate($v8, $Rf, $xp)
    {
        $x_ = openssl_pkey_new();
        $m4 = openssl_csr_new($v8, $x_, $Rf);
        $RB = openssl_csr_sign($m4, null, $x_, $xp, $Rf, time());
        openssl_csr_export($m4, $IV);
        openssl_x509_export($RB, $eP);
        openssl_pkey_export($x_, $XW);
        LY:
        if (!(($F5 = openssl_error_string()) !== false)) {
            goto H4;
        }
        error_log("\x43\x65\x72\x74\x69\146\151\143\x61\x74\145\x55\x74\x69\154\151\164\171\72\x20\x45\162\x72\x6f\x72\x20\x67\145\156\x65\x72\141\164\151\156\147\x20\x63\145\162\x74\151\x66\151\143\x61\x74\x65\x2e\40" . $F5);
        goto LY;
        H4:
        $Nw = array("\160\165\x62\154\x69\x63\x5f\x6b\x65\x79" => $eP, "\160\162\x69\166\x61\x74\145\137\x6b\145\x79" => $XW);
        return $Nw;
    }
}

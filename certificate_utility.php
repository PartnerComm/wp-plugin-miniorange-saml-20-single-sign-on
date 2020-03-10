<?php


class CertificateUtility
{
    public static function generate_certificate($xh, $AX, $DK)
    {
        $zQ = openssl_pkey_new();
        $L3 = openssl_csr_new($xh, $zQ, $AX);
        $DA = openssl_csr_sign($L3, null, $zQ, $DK, $AX, time());
        openssl_csr_export($L3, $Wk);
        openssl_x509_export($DA, $Py);
        openssl_pkey_export($zQ, $rp);
        hpW:
        if (!(($sL = openssl_error_string()) !== false)) {
            goto jeX;
        }
        error_log("\x43\145\162\x74\x69\146\151\143\141\x74\145\x55\164\x69\154\151\164\171\x3a\x20\x45\162\162\157\162\40\x67\145\156\145\162\x61\164\151\x6e\x67\x20\143\x65\x72\164\x69\x66\x69\x63\x61\164\145\x2e\40" . $sL);
        goto hpW;
        jeX:
        $li = array("\160\165\x62\x6c\151\x63\137\x6b\x65\171" => $Py, "\x70\162\151\166\141\x74\145\x5f\x6b\145\x79" => $rp);
        return $li;
    }
}

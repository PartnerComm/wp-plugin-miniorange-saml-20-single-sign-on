<?php


class CertificateUtility
{
    public static function generate_certificate($he, $TV, $Qr)
    {
        $uY = openssl_pkey_new();
        $xY = openssl_csr_new($he, $uY, $TV);
        $Ny = openssl_csr_sign($xY, null, $uY, $Qr, $TV, time());
        openssl_csr_export($xY, $LE);
        openssl_x509_export($Ny, $xd);
        openssl_pkey_export($uY, $UH);
        Gk:
        if (!(($qc = openssl_error_string()) !== false)) {
            goto M0;
        }
        error_log("\x43\145\x72\x74\151\146\x69\x63\x61\x74\145\125\x74\151\154\x69\x74\171\x3a\40\105\x72\x72\x6f\162\40\147\145\x6e\x65\x72\141\x74\151\x6e\x67\x20\143\145\162\164\151\x66\151\x63\x61\164\x65\x2e\40" . $qc);
        goto Gk;
        M0:
        $mG = array("\160\165\x62\x6c\151\x63\137\153\145\x79" => $xd, "\160\162\151\x76\x61\x74\x65\137\x6b\x65\x79" => $UH);
        return $mG;
    }
}

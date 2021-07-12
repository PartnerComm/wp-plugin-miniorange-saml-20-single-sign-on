<?php


class CertificateUtility
{
    public static function generate_certificate($Ve, $t7, $eL)
    {
        $W8 = openssl_pkey_new();
        $Ra = openssl_csr_new($Ve, $W8, $t7);
        $Mh = openssl_csr_sign($Ra, null, $W8, $eL, $t7, time());
        openssl_csr_export($Ra, $IU);
        openssl_x509_export($Mh, $HV);
        openssl_pkey_export($W8, $HB);
        xE2:
        if (!(($L2 = openssl_error_string()) !== false)) {
            goto H76;
        }
        error_log("\103\x65\x72\164\151\146\151\x63\x61\164\145\x55\x74\151\154\151\x74\x79\x3a\40\x45\x72\x72\x6f\x72\x20\x67\145\156\x65\162\141\x74\x69\x6e\x67\40\143\145\162\164\151\x66\x69\143\x61\164\x65\56\40" . $L2);
        goto xE2;
        H76:
        $VZ = array("\x70\x75\x62\154\151\x63\x5f\153\x65\171" => $HV, "\160\x72\151\166\141\164\x65\137\x6b\145\x79" => $HB);
        return $VZ;
    }
}

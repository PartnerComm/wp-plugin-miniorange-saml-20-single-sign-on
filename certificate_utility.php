<?php
/**
 * This file is a part of the miniorange-saml-20-single-sign-on plugin.
 *
 * @link https://plugins.miniorange.com/
 * @author miniOrange
 * @package miniorange-saml-20-single-sign-on
 */


class CertificateUtility
{
    public static function generate_certificate($Oa, $V3, $AW)
    {
        $nm = openssl_pkey_new();
        $Kl = openssl_csr_new($Oa, $nm, $V3);
        $xg = openssl_csr_sign($Kl, null, $nm, $AW, $V3, time());
        openssl_csr_export($Kl, $eg);
        openssl_x509_export($xg, $z7);
        openssl_pkey_export($nm, $f1);
        oV:
        if (!(($cN = openssl_error_string()) !== false)) {
            goto pN;
        }
        error_log("\103\145\162\x74\151\146\x69\143\141\x74\x65\x55\x74\151\154\x69\x74\171\72\x20\x45\162\x72\157\162\40\x67\x65\x6e\145\x72\141\x74\x69\x6e\147\40\143\145\x72\164\x69\146\151\x63\141\164\x65\x2e\40" . $cN);
        goto oV;
        pN:
        $GU = array("\160\x75\x62\154\151\x63\x5f\x6b\x65\x79" => $z7, "\x70\x72\151\166\141\164\x65\137\x6b\x65\171" => $f1);
        return $GU;
    }
}

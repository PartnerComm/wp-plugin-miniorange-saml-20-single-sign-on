<?php


class CertificateUtility
{
    public static function generate_certificate($RL, $nK, $kO)
    {
        $CT = openssl_pkey_new();
        $Td = openssl_csr_new($RL, $CT, $nK);
        $A1 = openssl_csr_sign($Td, null, $CT, $kO, $nK, time());
        openssl_csr_export($Td, $qb);
        openssl_x509_export($A1, $ro);
        openssl_pkey_export($CT, $ra);
        C1:
        if (!(($Tr = openssl_error_string()) !== false)) {
            goto bP;
        }
        error_log("\103\145\162\x74\x69\x66\x69\143\x61\x74\x65\125\x74\151\154\151\164\171\x3a\x20\105\x72\x72\157\x72\x20\147\145\156\145\162\x61\x74\151\156\x67\40\x63\x65\x72\164\x69\146\x69\x63\x61\164\145\x2e\x20" . $Tr);
        goto C1;
        bP:
        $Z2 = array("\x70\x75\142\x6c\x69\143\x5f\x6b\x65\x79" => $ro, "\x70\162\151\x76\x61\x74\x65\x5f\153\x65\171" => $ra);
        return $Z2;
    }
}

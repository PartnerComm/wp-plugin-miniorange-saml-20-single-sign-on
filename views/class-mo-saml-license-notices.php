<?php
/**
 * This file is a part of the miniorange-saml-20-single-sign-on plugin.
 *
 * @link https://plugins.miniorange.com/
 * @author miniOrange
 * @package miniorange-saml-20-single-sign-on
 */


if (defined("\101\x42\x53\120\x41\124\x48")) {
    goto zx3;
}
exit;
zx3:
class Mo_Saml_License_Notices
{
    public static function get_license_notice_message($OI, $nJ, $Jn)
    {
        $XL = Mo_Saml_License_Utility::get_disable_date($OI);
        $Li = Mo_Saml_License_Utility::get_plugin_notice_content($OI, $nJ, $XL, $Jn);
        $i5 = "\15\12\11\x9\11\x3c\x64\151\x76\40\x69\144\75\x22\155\x65\x73\163\141\x67\145\x22\x20\x73\164\171\154\145\x3d\x22\x64\151\163\x70\154\141\x79\x3a\146\154\x65\x78\73\42\x20\143\x6c\x61\163\x73\75\x22\x6e\x6f\164\x69\x63\x65\40" . esc_attr(Mo_Saml_License_Utility::get_expiry_admin_notice($nJ)) . "\x22\76\xd\12\11\11\11\11\74\x64\151\x76\x3e\15\12\x9\x9\x9\11\x9\x3c\151\x6d\147\x20\163\162\143\x3d\x22" . esc_attr(SAMLSPUtilities::mo_saml_get_plugin_dir_url()) . "\151\155\x61\147\145\x73\x2f\x6d\x69\x6e\x69\157\x72\x61\x6e\x67\x65\x2d\154\157\147\x6f\56\x70\x6e\x67\42\40\143\154\141\x73\x73\x3d\42\141\154\151\147\156\x6c\x65\x66\164\x22\40\x68\145\151\147\x68\x74\x3d\42\70\67\x22\40\167\151\144\x74\x68\75\x22\x36\66\42\40\x61\154\164\75\42\155\151\156\x69\x4f\162\141\x6e\x67\145\x20\154\157\x67\x6f\42\x20\x73\164\171\154\x65\x3d\x22\x6d\141\162\147\151\156\72\62\x32\45\x20\x31\x30\160\170\40\62\x32\45\x20\60\73\x20\x68\x65\151\147\150\164\72\61\62\x38\160\x78\73\x20\167\x69\x64\164\150\72\40\61\x32\70\160\170\73\42\76\xd\xa\x9\11\11\x9\74\x2f\144\x69\166\x3e\xd\xa\11\11\11\x9\x3c\x64\151\166\76\xd\12\11\x9\11\11\11\x3c\x64\151\x76\x20\x63\154\141\x73\x73\75\42\x61\x6c\x69\x67\x6e\162\151\x67\150\x74\x22\40\163\164\171\154\x65\75\42\160\x61\144\144\151\156\147\x2d\x74\x6f\160\x3a\x20\x31\62\160\x78\x3b\42\76\15\xa\11\11\11\x9\x9\11\74\141\40\150\x72\145\146\75\42\141\144\x6d\151\x6e\x2e\160\150\x70\x3f\160\141\x67\x65\x3d\x6d\x6f\137\163\x61\x6d\x6c\137\x73\x65\164\164\151\156\x67\x73\x26\x74\141\x62\75\141\143\143\x6f\165\156\x74\137\151\156\146\x6f\x22\x3e\x3c\142\165\164\x74\157\156\x20\143\x6c\141\163\163\75\42\x62\x75\x74\164\157\x6e\40\142\x75\164\164\157\156\55\160\162\151\x6d\x61\162\171\x22\40\164\171\160\145\75\42\x62\165\x74\x74\x6f\x6e\x22\x3e\107\x6f\x20\x74\x6f\40\120\x6c\165\147\151\x6e\x20\123\x65\x74\164\x69\156\147\x73\x3c\57\142\x75\164\x74\157\x6e\76\x3c\57\x61\x3e\xd\12\x9\11\x9\11\11\x3c\x2f\144\151\x76\76\15\12\11\11\11\11\x9\x3c\150\62\40\163\164\x79\x6c\x65\x3d\42\146\x6f\156\164\x2d\163\x69\x7a\145\x3a\62\x32\160\x78\x3b\x6d\141\x72\x67\x69\x6e\x3a\x31\x65\x6d\40\60\73\42\x3e" . esc_html($Li["\150\x65\x61\x64\151\156\147"]) . "\x3c\57\x68\62\76\15\12\x9\11\11\11\11\x3c\144\x69\x76\x20\x63\x6c\141\163\163\75\42\141\154\x69\147\156\x6c\x65\146\x74\42\76\15\xa\x9\x9\x9\x9\11\11\74\160\x20\x63\x6c\x61\163\163\x3d\x22\155\x6f\137\x73\x61\x6d\154\x5f\x6c\151\x63\x65\156\163\x65\x5f\156\x6f\164\151\143\x65\42\76\40" . $Li["\143\x6f\155\x6d\x6f\x6e\x5f\156\157\x74\x65\137\x31"] . "\x20\x3c\x2f\160\76\xd\12\11\x9\11\11\x9\11\x3c\x70\x20\143\x6c\x61\x73\163\x3d\42\155\x6f\x5f\163\141\x6d\x6c\x5f\x6c\151\143\145\156\163\145\x5f\x6e\157\x74\x69\x63\x65\x22\76\x20" . $Li["\163\x75\x62\x5f\156\157\164\x65"] . "\x20" . $Li["\162\x65\156\x65\167\137\156\157\164\x65"] . "\40\x3c\x2f\160\x3e\xd\12\x9\x9\11\11\11\11\74\x70\40\143\154\x61\x73\x73\75\42\155\157\137\163\141\x6d\x6c\x5f\154\151\x63\145\x6e\163\x65\137\x6e\157\x74\x69\x63\x65\42\76\40" . $Li["\143\157\x6d\x6d\157\156\137\156\x6f\164\x65\x5f\x32"] . "\x20\74\x2f\160\x3e";
        if (!($nJ > 10)) {
            goto a3Y;
        }
        $i5 .= "\74\x70\x20\x69\144\x3d\42\x6d\x6f\x5f\163\x61\x6d\x6c\137\154\x69\143\x65\x6e\163\x65\x5f\x6e\x6f\x74\151\143\145\x5f\144\151\x73\155\151\x73\x73\42\40\x63\x6c\141\x73\x73\75\42\141\x6c\151\147\156\x72\151\147\x68\x74\x20\x62\165\x74\164\157\x6e\40\142\165\x74\164\x6f\156\55\x6c\151\156\153\42\x3e\104\x69\163\155\151\163\163\74\57\x70\76\xd\12\x9\x9\11\x9\x9\11\x3c\144\x69\x76\x20\143\x6c\141\163\x73\x3d\x22\x63\x6c\145\141\x72\x22\76\74\x2f\x64\151\x76\x3e";
        a3Y:
        $i5 .= "\74\57\144\x69\166\76\15\12\x9\11\x9\x9\74\57\144\151\166\x3e\xd\12\11\11\11\74\x2f\144\151\166\x3e";
        $i5 .= "\15\12\x9\x9\11\x3c\146\x6f\x72\155\40\155\145\x74\150\x6f\x64\x3d\x22\160\157\x73\164\x22\x20\156\x61\155\x65\75\42\42\40\141\143\164\x69\x6f\x6e\x3d\x22\42\x20\151\x64\75\x22\155\x6f\137\163\141\155\154\x5f\x6c\151\143\145\156\x73\x65\x5f\156\157\164\151\143\x65\x5f\144\151\163\155\151\163\163\137\146\157\x72\155\42\76\40" . wp_nonce_field("\155\157\137\163\141\155\x6c\137\x6c\151\x63\145\156\163\x65\x5f\x6e\157\x74\x69\x63\x65\x5f\144\x69\163\x6d\151\163\163") . "\x20\xd\xa\11\11\x9\11\74\151\x6e\160\165\164\40\x74\171\160\145\75\x22\x68\x69\144\x64\x65\156\x22\40\156\141\155\145\75\42\157\x70\x74\x69\157\156\x22\40\166\x61\x6c\165\145\75\42\x6d\157\137\163\141\x6d\154\x5f\x6c\151\143\145\156\x73\x65\x5f\x6e\157\164\151\x63\145\x5f\x64\151\x73\155\x69\163\x73\42\57\x3e\15\xa\11\11\x9\x3c\57\146\157\x72\155\x3e\xd\12\11\15\12\11\11\11\x3c\x73\x63\x72\151\x70\x74\x3e\xd\xa\x9\11\11\x9\x6a\121\x75\145\162\x79\50\x22\43\x6d\x6f\137\x73\x61\x6d\154\137\154\x69\143\145\156\x73\x65\x5f\x6e\157\x74\x69\x63\145\x5f\144\x69\x73\x6d\151\163\163\42\51\56\143\154\151\x63\x6b\50\146\165\x6e\x63\164\x69\x6f\x6e\x28\51\173\xd\xa\11\x9\11\11\11\x6a\x51\165\145\162\171\x28\42\x23\155\x6f\x5f\x73\x61\155\154\x5f\154\151\x63\x65\x6e\163\145\x5f\x6e\x6f\164\151\143\x65\137\x64\151\163\155\151\163\163\137\x66\157\162\155\x22\51\x2e\x73\x75\x62\x6d\151\x74\x28\51\x3b\15\12\11\x9\x9\11\x7d\x29\73\15\xa\11\x9\11\x3c\x2f\x73\x63\162\x69\160\x74\x3e";
        return $i5;
    }
    public static function get_trial_notice_message($U1, $Gl)
    {
        if (!$U1) {
            goto lhF;
        }
        $xX = "\x59\157\165\162\40\124\x52\111\101\114\40\x6c\x69\x63\x65\x6e\x73\x65\40\146\x6f\162\x20\x6d\151\x6e\151\117\162\x61\x6e\147\145\x20\x53\101\115\x4c\x20\62\x2e\60\40\123\x69\x6e\x67\x6c\145\40\x53\151\147\156\40\x4f\156\x20\x70\x6c\x75\147\151\x6e\40\x68\x61\163\40\142\145\145\x6e\x20\145\170\160\x69\162\x65\x64\40\157\156\x20";
        $EH = "\x50\x6c\x65\x61\163\145\40\x3c\142\x3e\x3c\x61\x20\x68\x72\145\x66\75\x22" . esc_url(Mo_Saml_License_Utility::$pricing_faqs) . "\x22\x20\164\141\162\x67\145\x74\75\x22\x5f\142\154\x61\x6e\153\42\76\x70\x75\x72\143\150\x61\x73\x65\x20\x74\x68\145\x20\x70\x6c\165\x67\151\x6e\74\57\x61\x3e\74\57\142\x3e\40\x6f\162\x20\x63\x6f\x6e\164\x61\143\x74\40\165\163\40\x61\x74\x20\x3c\x61\x20\150\x72\145\x66\x3d\x22\x6d\141\x69\154\164\x6f\72\163\141\155\x6c\163\x75\160\x70\x6f\x72\164\x40\x78\145\x63\165\162\151\146\x79\x2e\x63\x6f\155\42\x20\x63\154\141\163\163\75\42\x74\145\x78\x74\x2d\160\x72\151\x6d\141\x72\171\42\x3e\x3c\x62\76\x73\141\155\154\x73\x75\x70\x70\x6f\162\164\100\x78\x65\143\x75\162\x69\x66\171\56\x63\x6f\x6d\x3c\x2f\142\x3e\x3c\x2f\141\76\x2e";
        goto NMG;
        lhF:
        $xX = "\131\x6f\x75\162\40\124\122\x49\x41\114\40\154\x69\x63\x65\156\163\x65\x20\x66\157\162\40\155\151\156\x69\x4f\162\x61\156\x67\145\x20\x53\x41\115\114\x20\62\x2e\x30\x20\123\151\x6e\x67\154\145\x20\x53\x69\147\156\40\117\x6e\x20\x70\x6c\x75\147\x69\x6e\40\150\141\x73\x20\142\145\145\x6e\40\x61\143\164\151\166\x61\x74\145\144\40\141\x6e\144\x20\x77\151\x6c\154\40\142\145\40\x76\141\154\x69\x64\x20\164\x69\154\154\40";
        $EH = "\111\x66\x20\171\157\x75\x20\x6e\x65\x65\x64\40\x61\156\171\40\150\x65\x6c\x70\40\151\x6e\x20\163\145\x74\x74\x69\156\147\40\165\160\x20\x74\150\145\40\x53\x53\117\x2c\40\x70\x6c\x65\141\163\145\x20\x72\x65\141\x63\150\x20\x6f\165\164\40\164\x6f\40\165\x73\x20\x61\x74\40\x3c\x61\x20\150\162\145\146\75\42\x6d\x61\151\154\164\x6f\x3a\163\x61\x6d\154\x73\165\160\160\157\x72\x74\100\170\x65\x63\x75\x72\151\146\171\x2e\143\157\x6d\42\40\143\154\141\x73\x73\x3d\x22\x74\145\170\164\55\160\162\x69\155\x61\162\x79\42\x3e\74\x62\x3e\x73\x61\x6d\154\x73\x75\x70\160\157\162\164\x40\170\x65\143\165\162\151\x66\x79\x2e\x63\x6f\155\x3c\x2f\142\76\x3c\57\x61\x3e\56";
        NMG:
        $i5 = "\xd\12\x9\x9\x3c\x64\151\x76\x20\143\154\x61\x73\x73\x3d\x22\x6e\157\164\x69\143\x65\x20\x6e\157\x74\x69\x63\x65\55\167\141\162\156\151\156\x67\x20\x6d\x6f\137\163\x61\155\x6c\137\164\162\x69\x61\154\137\156\x6f\164\151\x63\x65\137\x62\x61\156\x6e\145\x72\x22\76\xd\12\x9\x9\x9\74\x69\x6d\x67\40\x73\162\x63\x3d\x22" . esc_attr(SAMLSPUtilities::mo_saml_get_plugin_dir_url()) . "\x69\x6d\x61\147\145\163\57\155\x69\x6e\151\x6f\162\x61\x6e\x67\145\x2e\160\x6e\147\42\57\x3e\46\x6e\142\163\160\x3b\46\156\x62\163\160\73\xd\12\x9\11\11\74\163\x70\141\x6e\40\x63\x6c\x61\163\163\75\42\155\157\137\x73\141\155\x6c\x5f\164\162\x69\x61\154\137\156\x6f\164\x69\x63\145\x5f\x74\145\170\164\x22\x3e\40\15\xa\11\x9\11\x9\74\142\76" . esc_html($xX) . esc_html($Gl) . "\x2e\40\x3c\x2f\142\76\15\12\x9\x9\x9\11\74\x62\162\x3e" . wp_kses($EH, array("\x61" => array("\x68\x72\x65\x66" => array()), "\142" => array())) . "\15\12\x9\11\11\74\57\163\x70\x61\x6e\x3e\xd\xa\x9\x9\74\57\144\151\x76\x3e";
        return $i5;
    }
    public static function get_license_details_view()
    {
        $OI = SAMLSPUtilities::mo_saml_decrypt_data(get_option("\155\157\137\163\x61\155\154\137\x6c\x65\144"));
        $nJ = Mo_Saml_License_Utility::get_expiry_remaining_days($OI);
        $lh = Mo_Saml_License_Utility::get_grace_days_left($nJ);
        $vU = '';
        if (Mo_Saml_License_Utility::is_trial_license_activated()) {
            goto wRK;
        }
        if ($nJ < 60 && $nJ > 0) {
            goto qHn;
        }
        if ($nJ <= 0) {
            goto Umc;
        }
        goto uDV;
        wRK:
        if (Mo_Saml_License_Utility::is_trial_license_expired()) {
            goto CuY;
        }
        $vU = "\131\x6f\x75\40\x61\x72\145\x20\143\x75\162\162\145\x6e\164\154\171\x20\x6f\156\40\x74\162\151\x61\154\40\160\x6c\x75\147\x69\x6e\40\x6c\151\143\x65\156\x73\145\56\x20\x50\x6c\x65\141\x73\145\x20\160\165\162\x63\150\141\x73\145\40\x74\150\145\40\160\154\165\x67\x69\x6e\40\x74\157\x20\143\x6f\156\164\151\x6e\x75\145\40\167\151\x74\150\40\x73\x65\x61\x6d\154\145\163\x73\x20\123\x53\117\x20\x65\170\x70\x65\162\x69\145\156\143\145\x2e";
        goto BuP;
        CuY:
        $vU = "\x59\157\165\x72\40\x74\x72\x69\x61\154\x20\x70\x6c\x75\147\151\x6e\40\x6c\x69\143\145\156\x73\145\40\150\x61\163\40\145\x78\x70\x69\x72\x65\x64\x2e\x20\120\154\145\x61\x73\145\x20\160\165\162\143\150\x61\163\x65\x20\x74\150\145\x20\160\x6c\x75\x67\151\x6e\40\164\157\x20\x63\x6f\x6e\164\x69\156\x75\145\x20\x77\151\164\x68\40\163\145\141\155\x6c\x65\x73\163\40\x53\123\x4f\x20\145\x78\x70\x65\x72\x69\145\x6e\x63\145\x2e";
        BuP:
        goto uDV;
        qHn:
        $vU = "\131\x6f\165\x72\40\160\x6c\x75\x67\151\156\x20\x6c\151\143\145\156\163\x65\40\151\x73\40\147\157\x69\x6e\147\40\164\x6f\x20\145\170\x70\151\x72\x65\x20\151\156\40" . esc_html($nJ) . "\40\144\141\x79\x73";
        goto uDV;
        Umc:
        if (Mo_Saml_License_Utility::is_plugin_license_expired(true)) {
            goto sXk;
        }
        $vU = "\x59\x6f\165\40\x61\x72\x65\x20\143\x75\x72\x72\145\x6e\x74\x6c\171\x20\157\156\40\x67\162\x61\x63\145\x20\x70\x65\x72\151\x6f\x64\x20\x66\x6f\x72\40\162\x65\156\145\167\141\154\56\x20" . esc_html($lh) . "\x20\144\x61\x79\x73\40\x6c\145\x66\x74\x20\142\x65\x66\x6f\x72\x65\40\x53\x53\117\x20\151\x73\40\x64\x69\x73\x61\x62\x6c\x65\144\x20\x6f\156\40\171\157\165\x72\40\x73\151\x74\x65\x2e";
        goto Wm2;
        sXk:
        $vU = "\131\x6f\x75\x72\40\160\x6c\165\x67\x69\x6e\40\154\x69\143\x65\x6e\163\145\40\x68\x61\x73\40\145\x78\160\x69\162\145\x64\x20\x61\156\144\x20\x74\x68\x65\40\x70\154\x75\147\x69\156\x20\150\141\x73\x20\163\x74\x6f\160\x70\x65\x64\40\x77\157\x72\153\x69\156\x67\x2e\40\120\154\145\x61\x73\145\40\162\x65\156\x65\x77\x20\x79\x6f\x75\x72\x20\154\x69\143\145\156\163\x65\x20\151\x6d\155\x65\144\151\141\164\145\154\x79\x2e";
        Wm2:
        uDV:
        $qj = '';
        $qj .= "\15\12\11\x9\x3c\144\x69\x76\40\163\164\171\154\x65\75\x22\x64\x69\163\160\154\141\171\72\x66\x6c\x65\x78\x3b\40\x74\x65\x78\x74\55\141\x6c\151\x67\x6e\72\40\x63\145\x6e\x74\145\x72\x3b\42\x3e\15\xa\11\11\11\74\x64\151\x76\x20\163\x74\171\154\145\x3d\x22\x77\x69\144\x74\150\72\x31\x30\45\42\76\x3c\x69\x6d\x67\x20\163\x72\x63\75\42" . esc_attr(SAMLSPUtilities::mo_saml_get_plugin_dir_url()) . "\x69\155\x61\147\145\x73\x2f\155\x69\156\x69\x6f\x72\141\156\x67\145\x2d\x6c\x6f\147\x6f\56\x70\x6e\x67\x22\40\167\151\144\x74\x68\75\x22\65\x30\160\170\x22\x2f\76\74\x2f\x64\151\166\76\xd\12\x9\x9\x9\74\x64\x69\166\x20\x73\164\171\154\145\75\42\167\x69\144\164\x68\72\x31\x35\x30\x72\x65\155\x22\76\74\150\62\76\x6d\151\x6e\151\117\x72\x61\156\x67\x65\x20\123\x41\115\x4c\40\123\x53\x4f\x20\x50\154\x75\x67\151\156\x3c\x2f\150\62\x3e\x3c\x2f\x64\x69\x76\76\15\xa\x9\x9\x3c\x2f\x64\x69\166\x3e";
        $qj .= !empty($vU) ? "\x3c\x64\151\166\x20\x63\x6c\x61\163\163\x3d\42\155\157\55\x73\141\155\154\55\156\157\164\151\143\x65\55\x63\157\x6e\x74\141\x69\x6e\x65\x72\42\76\xd\12\x9\x9\11\74\160\40\143\x6c\141\163\163\x3d\42\x6d\x6f\55\x73\x61\x6d\154\55\x6e\157\x74\x69\143\x65\55\164\145\170\164\42\x3e" . esc_html($vU) . "\74\x2f\x70\x3e\15\12\x9\x9\74\x2f\x64\x69\x76\76" : '';
        $qj .= "\x3c\144\151\x76\40\x73\164\171\154\145\x3d\42\164\x65\170\x74\x2d\x61\x6c\x69\x67\156\72\143\145\156\x74\145\162\42\x3e\xd\xa\11\11\11\x3c\164\141\x62\154\x65\40\142\157\162\x64\x65\x72\x3d\x22\61\42\40\x63\x6c\x61\x73\x73\x3d\42\x6d\x6f\x2d\163\141\155\x6c\55\154\x69\143\145\156\163\x65\55\145\170\x70\151\x72\171\55\144\x65\x74\x61\151\154\163\42\76\xd\xa\11\x9\11\x9\74\164\x72\x3e\15\12\x9\11\11\x9\11\x3c\164\144\x20\163\164\x79\x6c\x65\75\x22\x77\151\x64\164\x68\x3a\x34\x35\x25\73\x20\x70\x61\x64\144\151\x6e\147\x3a\x20\x31\60\x70\170\x3b\x22\76\x3c\x62\x3e\155\151\x6e\151\x4f\162\x61\x6e\147\x65\40\x41\143\143\x6f\x75\156\164\x20\105\x6d\x61\151\x6c\74\57\142\76\x3c\57\x74\x64\76\15\12\11\x9\11\11\x9\74\164\x64\x20\x73\x74\171\x6c\x65\x3d\x22\167\151\x64\164\150\x3a\x35\65\x25\73\40\x70\141\x64\x64\151\x6e\147\72\40\x31\x30\160\x78\x3b\42\76" . esc_html(get_option("\x6d\x6f\x5f\163\141\x6d\154\137\141\x64\x6d\151\x6e\x5f\145\155\141\151\x6c")) . "\74\57\164\x64\x3e\15\12\x9\x9\11\x9\x3c\x2f\164\x72\76\15\12\11\x9\11\x9\74\x74\x72\76\15\12\x9\x9\x9\x9\11\x3c\164\x64\x20\163\x74\x79\154\145\x3d\42\167\151\x64\164\150\72\x34\x35\45\73\40\x70\x61\144\x64\x69\x6e\x67\72\x20\61\60\160\170\x3b\42\76\x3c\x62\76\x50\154\x75\x67\151\x6e\40\x4c\151\143\x65\x6e\x73\145\40\x45\x78\160\x69\x72\x79\40\104\x61\164\x65\x3c\57\142\x3e\74\57\164\x64\x3e\xd\xa\x9\11\x9\11\x9\x3c\164\144\40\x73\x74\171\x6c\145\x3d\42\167\151\144\164\x68\72\x35\65\45\x3b\40\x70\x61\x64\144\151\156\x67\72\40\61\x30\160\170\73\x22\x3e\x3c\x62\x3e\40" . esc_html($OI) . "\40\x3c\x2f\x62\x3e\74\x2f\x74\x64\x3e\15\12\11\11\x9\x9\x3c\x2f\164\x72\76\15\12\x9\x9\11\74\x2f\x74\x61\142\154\x65\x3e\15\12\x9\11\74\x2f\144\x69\x76\76\xd\xa\x9\11\74\144\x69\166\x20\143\x6c\141\x73\x73\75\x22\x6d\x6f\55\x73\x61\x6d\154\x2d\x73\165\160\x70\x6f\162\x74\x2d\x6c\151\156\153\163\x22\76\15\xa\x9\x9\x3c\144\x69\x76\x3e\x3c\141\x20\150\x72\x65\x66\75\x22" . admin_url("\141\144\155\x69\x6e\56\x70\150\160\77\x70\x61\147\145\x3d\x6d\157\137\x73\141\x6d\154\x5f\x73\145\164\x74\x69\x6e\147\163") . "\42\40\x73\x74\171\154\x65\75\x22\143\x6f\154\157\162\72\x77\150\151\164\x65\73\x22\76\74\x62\165\x74\x74\x6f\x6e\x20\143\x6c\141\x73\x73\x3d\x22\x62\165\164\164\x6f\156\40\x62\x75\164\164\157\x6e\55\x70\162\151\155\141\162\x79\40\142\165\x74\164\157\156\x2d\x6c\141\x72\x67\x65\x22\x3e\x3c\x62\x3e\107\x6f\x20\164\157\x20\160\154\x75\x67\151\156\40\163\x65\164\x74\151\156\147\163\x3c\57\142\x3e\x3c\x2f\142\x75\164\164\x6f\x6e\x3e\74\57\x61\x3e\74\x2f\144\x69\x76\x3e\15\xa\11\11\x3c\144\x69\x76\76\x4e\x65\145\144\40\141\x6e\171\x20\150\x65\x6c\160\x3f\x20\103\157\x6e\164\x61\143\164\x20\165\x73\40\x6f\156\40\74\x61\x20\150\x72\145\x66\75\42\x6d\x61\151\154\x74\x6f\72\163\141\x6d\x6c\163\165\x70\x70\x6f\162\164\100\170\145\143\x75\162\x69\x66\x79\56\x63\x6f\155\42\x3e\74\142\76\163\x61\x6d\154\163\x75\x70\x70\x6f\162\164\100\x78\x65\x63\165\x72\x69\x66\x79\56\x63\x6f\x6d\74\57\x62\x3e\x3c\x2f\141\x3e\74\57\144\x69\166\x3e\xd\12\x9\11\11\15\xa\11\x9\x3c\x2f\144\x69\x76\x3e";
        return $qj;
    }
}
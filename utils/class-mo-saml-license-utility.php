<?php
/**
 * This file is a part of the miniorange-saml-20-single-sign-on plugin.
 *
 * @link https://plugins.miniorange.com/
 * @author miniOrange
 * @package miniorange-saml-20-single-sign-on
 */


if (defined("\101\102\x53\x50\101\124\x48")) {
    goto mK7;
}
exit;
mK7:
class Mo_Saml_License_Utility
{
    public static $renewal_steps_faq = "\x68\164\164\160\163\72\x2f\x2f\146\x61\161\56\155\x69\x6e\x69\157\x72\141\156\147\145\56\x63\x6f\x6d\57\x6b\156\x6f\x77\x6c\x65\144\147\145\x62\141\x73\145\x2f\x68\x6f\x77\x2d\x63\x61\156\55\151\x2d\162\x65\x6e\x65\167\55\155\x79\55\x77\x6f\162\144\x70\x72\145\x73\163\55\160\154\x75\x67\151\156\x2d\x6c\x69\143\x65\156\163\x65\57";
    public static $pricing_faqs = "\150\164\164\x70\x73\72\57\x2f\x70\154\165\147\151\x6e\x73\56\155\151\156\x69\x6f\x72\x61\156\147\x65\56\143\x6f\x6d\x2f\167\157\x72\x64\x70\x72\x65\163\x73\55\x73\151\x6e\x67\154\x65\x2d\163\151\147\x6e\x2d\157\x6e\x2d\163\x73\157\x23\x70\162\x69\143\151\156\x67";
    public static function get_expiry_remaining_days($OI)
    {
        $Oo = strtotime($OI);
        $tx = $Oo - time();
        $nJ = intval($tx / (60 * 60 * 24));
        return $nJ;
    }
    public static function is_plugin_license_expired($mm = false)
    {
        $OI = Mo_Saml_License_Handler::fetch_expiry_date();
        if ($OI) {
            goto me3;
        }
        return false;
        me3:
        $bb = new DateTime();
        if ($mm) {
            goto uS8;
        }
        $gY = strtotime($OI);
        goto cYn;
        uS8:
        $gY = strtotime("\53\x31\65\40\x64\141\x79\163", strtotime($OI));
        cYn:
        $bb->setTimestamp($gY);
        if (!(new DateTime() > $bb)) {
            goto yF6;
        }
        return true;
        yF6:
        return false;
    }
    public static function reset_license_values()
    {
        delete_option("\155\x6f\137\163\x61\x6d\x6c\x5f\154\x69\143\x65\x6e\163\x65\137\x65\170\160\151\x72\x65\x64");
        delete_option("\155\157\x5f\x73\141\x6d\x6c\x5f\145\x78\160\137\x6e\x6f\x74\151\x63\145\x5f\x63\154\157\163\x65");
    }
    public static function get_license_expiry_date($OW)
    {
        $g_ = new DateTime($OW);
        $Ex = $g_->getTimestamp();
        $c8 = gmdate("\x46\x20\152\x2c\40\131", $Ex);
        return $c8;
    }
    public static function show_expiry_notice($nJ)
    {
        $l7 = get_option("\x6d\x6f\137\163\x61\155\x6c\x5f\145\170\160\137\156\157\164\x69\143\145\x5f\x63\154\157\x73\145");
        if (!isset($nJ) || $nJ > 60) {
            goto Inv;
        }
        if ($nJ <= 10) {
            goto aly;
        }
        if (!$l7 && $nJ <= 60) {
            goto iA9;
        }
        if ($l7 && $l7 > 30 && $nJ <= 30) {
            goto jYW;
        }
        goto rz2;
        Inv:
        return false;
        goto rz2;
        aly:
        return true;
        goto rz2;
        iA9:
        return true;
        goto rz2;
        jYW:
        return true;
        rz2:
        return false;
    }
    public static function is_customer_license_valid($G_ = false, $ff = true)
    {
        $x6 = self::is_trial_license_activated();
        if (!$x6) {
            goto Nkq;
        }
        if (!self::is_trial_license_expired()) {
            goto gEJ;
        }
        return $G_ ? "\144\x69\163\141\x62\x6c\145\144" : false;
        gEJ:
        return $G_ ? '' : true;
        Nkq:
        $MA = get_option("\x73\x6d\154\137\x6c\153");
        $kr = get_option("\155\x6f\x5f\x73\x61\155\x6c\137\x61\144\x6d\151\156\137\145\155\x61\151\154");
        $v5 = get_option("\155\157\137\163\x61\155\154\137\x61\x64\155\x69\x6e\x5f\x63\x75\163\164\x6f\x6d\145\x72\x5f\x6b\x65\x79");
        $Gr = self::is_plugin_license_expired(true);
        $kb = $ff ? !$Gr : true;
        if (!($kb && $MA && $kr && $v5 && is_numeric(trim($v5)))) {
            goto F35;
        }
        return $G_ ? '' : true;
        F35:
        return $G_ ? "\x64\x69\x73\141\142\x6c\145\x64" : false;
    }
    public static function is_trial_license_activated()
    {
        $kn = get_option("\x6d\x6f\137\163\x61\x6d\x6c\137\x74\154\141");
        if (!$kn) {
            goto J9L;
        }
        return true;
        J9L:
        return false;
    }
    public static function is_trial_license_expired()
    {
        if (!self::is_trial_license_activated()) {
            goto gUp;
        }
        $OI = SAMLSPUtilities::mo_saml_decrypt_data(get_option("\155\x6f\x5f\x73\141\x6d\x6c\x5f\x6c\x65\144"));
        if (!(new DateTime() >= $OI)) {
            goto xyY;
        }
        return false;
        xyY:
        return true;
        gUp:
        return false;
    }
    public static function get_grace_days_left($nJ)
    {
        if (!($nJ > 0)) {
            goto h32;
        }
        return false;
        h32:
        return 15 + $nJ;
    }
    public static function get_plugin_notice_content($OI, $nJ, $XL, $Jn)
    {
        $Li = array();
        $Li["\150\x65\141\144\x69\x6e\147"] = "\101\164\x74\x65\x6e\x74\x69\157\x6e\72\x20\x52\x65\x6e\145\x77\x61\x6c\40\122\x65\161\x75\x69\x72\145\144\40\146\157\x72\40\155\151\x6e\x69\117\x72\x61\x6e\x67\145\x20\x53\101\x4d\x4c\40\x32\56\x30\x20\x53\151\156\147\154\145\40\x53\x69\x67\x6e\x2d\x4f\156\40\120\x6c\165\147\x69\156\x20\114\x69\x63\x65\x6e\163\145";
        $Li["\x63\157\155\x6d\x6f\x6e\x5f\156\x6f\x74\145\137\61"] = "\x59\x6f\165\162\x20\x6c\151\x63\x65\156\163\x65\40\146\x6f\162\40\x6d\x69\156\x69\x4f\x72\141\x6e\147\x65\x20\x53\101\x4d\x4c\40\x32\56\x30\40\x53\x69\156\147\x6c\x65\x20\123\151\x67\156\x20\117\x6e\40\x70\x6c\165\147\151\156\40\165\156\144\x65\162\40\x61\143\x63\x6f\165\156\164\x20\74\142\x3e" . esc_html($Jn) . "\x3c\57\142\76\x20\x69\163\40\147\157\x69\156\147\x20\x74\157\40\x65\x78\160\x69\x72\x65\40\157\x6e\x20\74\142\x3e\x3c\x75\x3e" . esc_html($OI) . "\74\x2f\x75\76\x3c\57\x62\x3e\56";
        $Li["\x73\x75\142\x5f\x6e\157\164\145"] = "\x3c\x62\x3e\120\154\145\141\163\x65\40\162\x65\156\145\x77\x20\164\x68\x65\40\x6c\x69\143\145\x6e\x73\x65\40\x62\x65\146\157\162\145\x20\164\150\145\40\x65\x78\x70\x69\162\x79\x20\144\x61\x74\145\56\40\74\57\142\76";
        $Li["\x72\145\156\x65\167\x5f\x6e\157\164\145"] = "\74\x62\x3e\106\x61\x69\x6c\165\162\145\x20\164\x6f\x20\x64\x6f\40\163\x6f\x20\x77\x69\154\154\40\143\x61\165\x73\x65\x20\164\x68\145\40\x70\x6c\165\147\151\156\40\x74\157\40\x73\x74\157\160\40\x77\157\162\153\x69\156\x67\x2e\x20\x59\157\165\40\x63\141\x6e\40\x72\145\156\x65\x77\40\x74\150\x65\40\x6c\x69\143\145\x6e\x73\x65\40\x62\171\x20\x66\x6f\154\154\157\167\x69\x6e\x67\x20\164\150\145\40\x3c\141\40\150\162\x65\x66\x3d\x22" . self::$renewal_steps_faq . "\x22\40\x74\x61\162\147\145\x74\x3d\x22\x5f\142\x6c\141\x6e\x6b\42\76\163\164\145\160\x73\x20\x6d\x65\156\x74\151\x6f\x6e\x65\x64\x20\150\x65\162\x65\x3c\x2f\141\x3e\56\x3c\57\x62\76";
        $Li["\x63\157\155\155\x6f\x6e\137\156\157\164\x65\x5f\62"] = "\x50\154\145\x61\x73\x65\40\x6e\157\x74\145\40\x74\150\x61\164\x20\x61\40\x6e\157\x74\151\146\x69\x63\x61\x74\x69\157\156\40\x77\151\x6c\154\x20\142\145\x20\163\x65\156\164\40\x74\x6f\x20\x74\x68\x65\x20\145\155\x61\x69\154\x20\141\x64\144\x72\145\163\x73\x20\74\142\x3e" . esc_html($Jn) . "\x3c\x2f\142\x3e\56\x20\111\x6e\40\x63\x61\163\x65\x20\x79\157\165\40\144\x6f\40\156\157\x74\40\162\x65\143\145\x69\166\145\40\x74\x68\145\40\x6e\157\164\x69\x66\151\x63\x61\x74\151\157\x6e\x2c\40\x61\x72\145\40\x75\x6e\x61\x62\x6c\145\x20\164\157\40\141\x63\143\x65\x73\163\x20\x74\x68\x69\x73\40\x6d\x61\151\154\142\157\x78\x2c\x20\157\162\40\x68\141\x76\145\40\141\x6e\171\40\x71\165\145\163\164\151\157\x6e\x73\40\162\145\147\141\162\x64\x69\156\x67\x20\x72\145\156\x65\167\141\154\x2c\40\153\x69\x6e\x64\154\x79\x20\143\x6f\x6e\164\x61\x63\x74\x20\x75\163\40\x69\x6d\155\145\144\x69\141\164\145\x6c\x79\40\x61\x74\40\74\x61\40\x68\162\x65\x66\75\x22\155\x61\151\154\x74\157\72\163\141\x6d\154\163\x75\160\160\157\162\x74\100\170\145\143\165\x72\151\146\x79\x2e\x63\157\155\x22\x3e\74\142\x3e\x73\141\155\x6c\163\x75\160\x70\157\162\x74\x40\x78\145\143\165\162\x69\146\x79\56\x63\157\155\x3c\57\x62\x3e\74\x2f\x61\x3e\x2e";
        if ($nJ <= 10 && $nJ >= 0) {
            goto qwi;
        }
        if ($nJ < 0 && $nJ > -15) {
            goto cuI;
        }
        if ($nJ <= -15) {
            goto W51;
        }
        goto ZP9;
        qwi:
        $Li["\150\145\141\x64\151\x6e\x67"] = "\x49\x6d\155\x65\x64\x69\141\x74\x65\40\101\164\164\145\156\x74\x69\157\x6e\x20\122\x65\161\x75\x69\162\x65\x64\72\x20\122\145\x6e\x65\167\40\x79\x6f\x75\162\x20\155\x69\x6e\151\x4f\162\x61\x6e\x67\145\x20\x53\x41\x4d\114\40\62\x2e\60\40\123\151\156\x67\154\x65\x20\123\151\x67\156\x2d\x4f\x6e\x20\114\151\x63\145\156\163\145\x20";
        $Li["\163\165\x62\x5f\156\157\x74\145"] = "\x3c\142\x3e\x50\x6c\145\141\x73\x65\x20\162\145\x6e\145\x77\40\164\x68\145\x20\154\151\143\145\156\163\145\40\x62\x65\146\157\162\145\40\x74\x68\x65\40\x65\x78\x70\x69\162\x79\40\144\x61\164\x65\x20\x74\157\40\141\x76\141\151\x6c\40\x74\x68\145\40\65\x30\x25\40\162\145\x6e\145\167\x61\x6c\40\144\151\163\143\157\165\156\164\x2e\x3c\x2f\x62\76";
        goto ZP9;
        cuI:
        $Li["\x68\x65\141\x64\151\x6e\x67"] = "\111\155\155\x65\x64\151\x61\164\x65\x20\101\143\x74\151\157\156\x20\x52\x65\x71\x75\x69\162\145\x64\x3a\40\x52\x65\156\x65\x77\40\x79\157\x75\162\x20\155\x69\156\x69\117\162\x61\156\147\x65\40\123\101\x4d\114\x20\62\56\60\40\123\x69\156\x67\154\145\40\x53\151\147\156\55\x4f\x6e\x20\114\x69\143\145\156\x73\x65";
        $Li["\x63\x6f\155\x6d\x6f\156\x5f\x6e\157\164\x65\x5f\61"] = "\x59\157\165\x72\40\x6c\x69\143\145\x6e\163\x65\x20\146\157\x72\x20\155\151\156\x69\117\x72\x61\156\147\x65\40\123\101\115\114\x20\62\56\60\40\x53\151\156\147\x6c\x65\x20\123\x69\147\x6e\40\117\156\40\160\154\x75\147\151\x6e\x20\165\156\x64\145\x72\40\141\143\143\157\165\x6e\x74\x20\x3c\x62\x3e" . esc_html($Jn) . "\x3c\x2f\142\76\x20\150\141\163\40\x65\x78\160\x69\162\x65\x64\40\x6f\x6e\40\74\x62\x3e\x3c\165\x3e" . esc_html($OI) . "\x3c\x2f\165\x3e\x3c\x2f\142\x3e\56";
        $Li["\x73\165\142\137\156\x6f\x74\x65"] = "\x3c\142\76\x59\157\165\x72\40\x70\154\x75\147\x69\156\40\154\x69\x63\x65\x6e\163\x65\x20\150\141\163\x20\145\170\160\151\162\145\144\40\x61\x6e\144\40\x69\x73\x20\x63\x75\x72\x72\145\156\164\x6c\171\x20\x69\x6e\40\147\x72\x61\143\145\40\x70\145\x72\x69\x6f\x64\40\x66\157\x72\40\162\x65\156\x65\167\141\154\x2e\x3c\x2f\142\x3e\40\x54\x68\x65\40\x70\x6c\165\147\151\x6e\x20\x77\x69\x6c\x6c\x20\142\145\x63\x6f\155\145\x20\156\157\x6e\x2d\x66\x75\156\143\164\x69\157\156\x61\154\x20\157\x6e\x63\145\40\x74\x68\x65\x20\147\162\x61\143\145\x20\x70\x65\x72\x69\157\144\40\x69\163\40\157\x76\145\162\40\x69\x2e\x65\56\40\157\156\40\x3c\x62\76\74\x75\76" . esc_html($XL) . "\74\x2f\165\76\74\57\x62\76\56";
        $Li["\x72\145\x6e\145\167\137\x6e\x6f\x74\145"] = "\x52\x65\x6e\x65\167\x20\171\x6f\165\x72\40\160\x6c\x75\147\151\156\40\x6c\x69\143\x65\156\x73\x65\40\x62\x79\40\x66\x6f\x6c\x6c\x6f\167\151\x6e\x67\40\x74\x68\x65\x20\74\141\40\150\x72\145\146\75\x22" . self::$renewal_steps_faq . "\x22\x20\x74\141\x72\147\x65\164\75\x22\x5f\x62\154\x61\156\x6b\42\76\x73\x74\x65\x70\163\x20\155\145\156\164\x69\157\x6e\145\x64\40\150\145\x72\x65\74\x2f\x61\76\x2e\40\x3c\x62\x3e\74\165\x3e\x50\154\145\141\x73\145\x20\156\157\x74\145\x20\x74\150\141\x74\x20\x74\150\145\x20\x35\x30\45\40\x72\145\156\145\167\x61\154\x20\x64\151\163\143\x6f\165\156\x74\x20\x77\x69\154\x6c\x20\142\145\40\162\145\x64\x75\143\145\x64\40\164\157\40\x33\65\x25\40\x6f\x6e\x63\145\40\x74\150\x65\x20\x67\162\x61\143\x65\x20\160\x65\162\x69\x6f\144\x20\x69\163\40\157\166\145\x72\56\74\x2f\x75\76\x3c\x2f\142\76";
        goto ZP9;
        W51:
        $Li["\150\145\x61\144\x69\x6e\x67"] = "\x49\x6d\155\x65\x64\x69\141\x74\x65\40\x41\x63\x74\151\157\156\x20\x52\145\161\x75\x69\162\145\x64\72\x20\x52\x65\156\145\x77\x20\171\157\x75\162\x20\x6d\151\x6e\151\117\x72\141\156\147\x65\40\123\101\x4d\114\x20\62\56\x30\x20\123\x69\156\147\x6c\x65\x20\x53\151\x67\156\x2d\117\x6e\40\x4c\x69\x63\145\x6e\x73\x65";
        $Li["\x63\x6f\x6d\155\x6f\x6e\137\156\157\x74\145\x5f\x31"] = "\x59\x6f\x75\x72\x20\x6c\x69\x63\x65\156\163\x65\40\x66\x6f\x72\x20\155\151\156\151\x4f\162\x61\x6e\x67\145\40\x53\x41\x4d\114\40\62\x2e\60\x20\x53\151\156\147\154\x65\x20\x53\151\147\x6e\x20\x4f\x6e\40\160\x6c\x75\147\151\x6e\x20\x75\x6e\144\x65\x72\40\x61\x63\x63\x6f\x75\156\164\x20\x3c\x62\76" . esc_html($Jn) . "\x3c\57\x62\x3e\40\x68\x61\x73\40\141\x6c\162\x65\x61\x64\x79\40\x65\170\x70\x69\x72\x65\x64\40\157\x6e\40\74\142\x3e\74\x75\76" . esc_html($OI) . "\74\57\x75\76\74\x2f\142\x3e\56";
        $Li["\x73\x75\x62\137\156\157\164\x65"] = "\x59\x6f\165\x72\40\147\162\141\143\x65\40\160\145\x72\151\157\x64\40\146\x6f\x72\40\x6c\x69\143\x65\156\x73\145\40\x72\145\156\x65\x77\141\154\40\150\x61\163\40\145\170\x70\151\x72\145\x64\56\x20\74\x73\160\x61\x6e\40\163\164\171\154\145\x3d\x22\146\x6f\x6e\164\x2d\x73\151\172\145\72\40\x31\66\160\170\x3b\143\157\x6c\x6f\162\72\40\x72\x65\144\x3b\x22\x3e\74\x75\x3e\x53\123\x4f\x20\150\x61\x73\x20\163\164\x6f\160\x70\x65\x64\x20\167\157\162\153\151\x6e\147\x20\x6f\x6e\40\171\157\165\162\40\x73\151\164\x65\x3c\x2f\165\x3e\x3c\x2f\163\x70\x61\156\x3e\x20\141\156\144\40\x68\x65\x6e\143\x65\x2c\x20\171\157\x75\162\x20\165\163\145\162\163\40\x77\x69\x6c\154\40\x6e\157\x74\x20\142\x65\x20\141\x62\x6c\x65\x20\164\x6f\x20\154\x6f\x67\x69\156\x20\x74\150\x72\157\165\x67\x68\40\x53\x53\117\x20\x61\x6e\x79\x6d\x6f\162\145\56";
        $Li["\162\145\x6e\145\167\137\156\x6f\x74\x65"] = "\x3c\x62\76\x52\x65\x6e\x65\167\40\x79\157\165\x72\x20\x70\154\165\147\x69\x6e\x20\154\151\143\x65\156\163\145\40\151\155\155\x65\144\151\141\x74\x65\x6c\171\74\57\142\x3e\x20\x62\171\x20\146\157\x6c\154\157\167\x69\x6e\x67\x20\164\x68\x65\x20\74\x61\40\150\x72\145\146\x3d\42" . self::$renewal_steps_faq . "\42\40\164\141\162\147\145\x74\x3d\42\x5f\142\154\x61\156\153\x22\76\163\164\145\x70\x73\40\155\x65\x6e\164\x69\157\156\x65\x64\x20\x68\145\x72\145\74\57\141\76\40\x74\x6f\40\162\x65\163\x74\157\x72\x65\40\x53\x69\156\147\x6c\x65\40\123\x69\147\156\55\117\x6e\x20\157\156\40\x79\x6f\165\162\x20\163\151\x74\x65\x2e";
        ZP9:
        return $Li;
    }
    public static function get_disable_date($OI)
    {
        return gmdate("\x4d\40\x64\x2c\x20\x59", strtotime($OI . "\53\61\x35\40\144\141\x79\163"));
    }
    public static function get_box_expiry_notice_heading($OI, $nJ, $XL)
    {
        $Zr = '';
        if ($nJ < 60 && $nJ > 0) {
            goto RLl;
        }
        if (0 === $nJ) {
            goto FwK;
        }
        if ($nJ < 0 && $nJ > -15) {
            goto CXy;
        }
        if ($nJ <= -15) {
            goto Gou;
        }
        goto cv1;
        RLl:
        $Zr = "\114\151\143\145\156\163\x65\x20\x45\170\x70\151\x72\171\x20\x4e\157\x74\x69\x63\145\40\72\x20\x50\x6c\x75\x67\151\x6e\x20\x4c\x69\143\x65\x6e\163\x65\40\x67\x65\164\164\x69\156\147\40\x65\x78\160\x69\x72\x65\x64\x20\151\156\40\x3c\x73\x70\141\x6e\x20\x69\x64\x3d\x22\155\x6f\x5f\x73\141\155\x6c\x5f\160\162\x6f\x66\151\154\x65\x5f\142\157\x78\137\x63\157\165\x6e\x74\x65\x72\x22\x3e" . ($nJ + 1) . "\74\57\163\x70\141\x6e\x3e\40\x64\141\171\x73";
        goto cv1;
        FwK:
        $Zr = "\x4c\x69\143\x65\x6e\x73\x65\x20\x45\x78\x70\151\x72\171\x20\116\x6f\164\x69\143\x65\40\72\x20\120\x6c\165\147\x69\x6e\40\x4c\x69\x63\145\x6e\x73\145\x20\x67\x65\164\164\x69\156\147\x20\x65\170\x70\x69\x72\145\144\40\x69\156\x20\x3c\x73\160\141\x6e\40\x69\144\x3d\42\x6d\157\x5f\x73\141\155\154\137\x70\x72\x6f\x66\151\154\145\137\x62\x6f\170\x5f\x63\x6f\165\x6e\x74\x65\x72\42\x3e" . ($nJ + 1) . "\x3c\x2f\x73\160\x61\156\x3e\x20\144\x61\x79";
        goto cv1;
        CXy:
        $Zr = "\x59\157\x75\x72\40\160\x6c\x75\147\x69\x6e\x20\x68\141\x73\40\145\x78\x70\x69\x72\x65\144\40\141\x6e\x64\x20\x53\x53\117\x20\167\151\154\154\x20\163\x74\157\x70\x20\167\157\x72\x6b\151\x6e\147\40\157\156\x20" . $XL . "\x2e\40\x52\145\156\x65\167\40\x79\x6f\165\162\40\154\x69\x63\x65\156\x73\145\40\x6e\157\x77\40\x74\157\x20\141\x76\157\x69\144\40\144\x69\163\x72\165\160\x74\x69\157\156\56";
        goto cv1;
        Gou:
        $Zr = "\127\141\162\156\x69\x6e\147\40\72\x20\131\157\165\x72\40\x53\x53\x4f\x20\150\x61\x73\40\x73\x74\x6f\160\x70\x65\144\x20\167\x6f\x72\153\151\x6e\147\x2e\x20\122\145\x6e\x65\167\40\171\157\x75\x72\40\154\x69\x63\x65\x6e\163\145\40\156\x6f\167\41";
        cv1:
        return $Zr;
    }
    public static function get_expiry_admin_notice($nJ)
    {
        if ($nJ > 10) {
            goto tKp;
        }
        if ($nJ <= 10) {
            goto O7G;
        }
        goto I07;
        tKp:
        return "\x6e\x6f\x74\x69\143\x65\x2d\167\141\x72\156\x69\156\147";
        goto I07;
        O7G:
        return "\x6e\157\x74\151\143\145\x2d\145\x72\x72\x6f\162";
        I07:
        return '';
    }
}
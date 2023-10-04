<?php
/**
 * This file is a part of the miniorange-saml-20-single-sign-on plugin.
 *
 * @link https://plugins.miniorange.com/
 * @author miniOrange
 * @package miniorange-saml-20-single-sign-on
 */


if (defined("\x41\102\123\x50\x41\124\110")) {
    goto vt;
}
exit;
vt:
class Mo_Saml_License_Handler
{
    public static function run_license_cron()
    {
        $u5 = get_option("\154\156\137\x63\x68\x65\143\153\137\x74");
        if (!$u5) {
            goto hN;
        }
        $u5 = intval($u5);
        if (!(time() - $u5 < 3600 * 24 * 30)) {
            goto JT;
        }
        return;
        JT:
        hN:
        self::fetch_license_info();
        update_option("\x6c\156\x5f\143\150\145\x63\153\137\164", time());
    }
    public static function fetch_expiry_date()
    {
        $OI = SAMLSPUtilities::mo_saml_decrypt_data(get_option("\155\x6f\137\x73\x61\155\154\x5f\x6c\x65\x64"));
        if ($OI) {
            goto em;
        }
        $OI = self::fetch_license_info();
        em:
        return $OI;
    }
    public static function fetch_license_info()
    {
        $YJ = new Customersaml();
        $HO = $YJ->check_customer_ln();
        if ($HO) {
            goto ud;
        }
        return false;
        ud:
        $HO = json_decode($HO, true);
        if (!empty($HO) && strcasecmp($HO["\x73\x74\141\x74\165\163"], "\123\x55\103\103\x45\x53\x53") === 0) {
            goto kx;
        }
        $mr = get_option("\155\157\137\x73\141\x6d\154\137\x63\165\163\164\x6f\x6d\145\162\137\164\157\153\x65\x6e");
        update_option("\163\x69\x74\x65\x5f\143\153\x5f\154", AESEncryption::encrypt_data("\146\x61\x6c\x73\x65", $mr));
        return false;
        goto tv;
        kx:
        return self::update_license_expiry($HO);
        tv:
    }
    private static function update_license_expiry($HO)
    {
        if (empty($HO["\x6c\151\x63\145\x6e\163\x65\105\170\x70\151\162\x79"])) {
            goto m1;
        }
        $c8 = Mo_Saml_License_Utility::get_license_expiry_date($HO["\x6c\x69\143\x65\x6e\x73\x65\x45\170\160\x69\x72\171"]);
        update_option("\x6d\x6f\x5f\x73\x61\155\x6c\x5f\154\145\144", SAMLSPUtilities::mo_saml_encrypt_data($c8));
        if (Mo_Saml_License_Utility::is_plugin_license_expired(true)) {
            goto uu;
        }
        if (!get_option("\155\x6f\x5f\163\141\x6d\x6c\137\x6c\x69\143\x65\x6e\163\145\x5f\x65\170\160\x69\162\x65\x64")) {
            goto Up;
        }
        Mo_Saml_License_Utility::reset_license_values();
        Up:
        goto kG;
        uu:
        update_option("\155\157\x5f\163\x61\x6d\154\137\154\151\143\x65\x6e\163\x65\137\x65\x78\160\151\162\145\144", true);
        kG:
        return $c8;
        m1:
        return false;
    }
    public static function add_license_dashboard_widget()
    {
        if (!(Mo_Saml_License_Utility::is_customer_license_valid(false, false) && current_user_can("\155\x61\x6e\x61\x67\145\x5f\x6f\160\x74\x69\x6f\x6e\163"))) {
            goto uA;
        }
        global $wp_meta_boxes;
        wp_add_dashboard_widget("\155\157\137\x73\x61\x6d\x6c\x5f\x6c\x69\x63\145\156\x73\x65\x5f\144\145\x74\x61\x69\154\x73", "\x6d\151\x6e\x69\117\x72\141\x6e\147\x65\40\123\101\115\x4c\x20\x32\x2e\60\x20\123\x53\x4f\x20\x50\154\x75\147\x69\x6e", array("\115\x6f\137\123\x61\x6d\154\x5f\114\x69\x63\x65\x6e\163\x65\x5f\x48\x61\156\144\x6c\145\x72", "\144\151\163\160\154\141\x79\137\144\x61\163\150\x62\157\141\x72\x64\x5f\167\x69\144\x67\145\x74"));
        $kG = $wp_meta_boxes["\x64\x61\163\150\142\x6f\141\162\x64"]["\156\x6f\x72\x6d\141\x6c"]["\143\157\162\145"];
        $Dg = array("\x6d\x6f\x5f\163\141\155\154\x5f\x6c\x69\x63\145\x6e\x73\x65\x5f\x64\145\x74\x61\x69\x6c\163" => $kG["\x6d\157\x5f\163\x61\155\x6c\137\x6c\151\x63\145\x6e\163\145\137\144\x65\164\141\151\x6c\163"]);
        unset($kG["\155\x6f\137\163\141\x6d\154\137\154\x69\x63\145\x6e\x73\x65\137\x64\x65\164\x61\x69\x6c\163"]);
        $kG = !empty($kG) ? $kG : array();
        $NC = array_merge($Dg, $kG);
        $wp_meta_boxes["\144\141\163\x68\142\157\x61\x72\144"]["\156\157\x72\155\x61\x6c"]["\143\157\162\x65"] = $NC;
        uA:
    }
    public static function display_dashboard_widget()
    {
        $K4 = Mo_Saml_License_Notices::get_license_details_view();
        echo $K4;
    }
    public static function dismiss_license_admin_notice()
    {
        if (!(current_user_can("\x6d\x61\156\x61\x67\x65\137\157\160\164\x69\x6f\156\x73") && !empty($_POST["\x6f\160\x74\x69\x6f\156"]) && "\x6d\x6f\137\x73\141\155\154\137\154\x69\143\145\156\x73\x65\x5f\x6e\x6f\x74\x69\143\145\137\x64\151\x73\x6d\151\x73\163" === $_POST["\x6f\160\164\151\x6f\x6e"] && check_admin_referer("\x6d\x6f\x5f\163\141\x6d\154\137\x6c\x69\143\145\156\163\145\x5f\156\157\x74\151\x63\x65\x5f\144\x69\163\155\x69\x73\x73"))) {
            goto qN;
        }
        $OI = SAMLSPUtilities::mo_saml_decrypt_data(get_option("\155\157\x5f\163\141\x6d\154\x5f\154\145\x64"));
        $nJ = Mo_Saml_License_Utility::get_expiry_remaining_days($OI);
        update_option("\155\157\x5f\163\141\x6d\154\137\145\x78\160\137\x6e\x6f\x74\x69\x63\x65\x5f\143\x6c\x6f\163\x65", $nJ);
        qN:
    }
    public static function show_license_notice()
    {
        if (!(Mo_Saml_License_Utility::is_customer_license_valid(false, false) && current_user_can("\155\x61\x6e\141\x67\x65\x5f\x6f\160\164\x69\x6f\156\163"))) {
            goto Aa;
        }
        $ax = '';
        $OI = SAMLSPUtilities::mo_saml_decrypt_data(get_option("\x6d\157\x5f\163\x61\x6d\x6c\137\154\145\x64"));
        $nJ = Mo_Saml_License_Utility::get_expiry_remaining_days($OI);
        if (Mo_Saml_License_Utility::is_trial_license_activated()) {
            goto LF;
        }
        if ($OI && Mo_Saml_License_Utility::show_expiry_notice($nJ)) {
            goto qu;
        }
        goto Jp;
        LF:
        $U1 = Mo_Saml_License_Utility::is_trial_license_expired();
        $ax = Mo_Saml_License_Notices::get_trial_notice_message($U1, $OI);
        goto Jp;
        qu:
        $Jn = get_option("\155\x6f\137\x73\x61\x6d\154\137\x61\144\x6d\x69\156\x5f\x65\x6d\141\x69\x6c");
        $ax = Mo_Saml_License_Notices::get_license_notice_message($OI, $nJ, $Jn);
        Jp:
        echo $ax;
        Aa:
    }
}

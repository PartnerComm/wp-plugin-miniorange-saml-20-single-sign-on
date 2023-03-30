<?php
/*
Plugin Name: miniOrange SSO using SAML 2.0
Plugin URI: https://miniorange.com/
Description: (Premium Single-Site)miniOrange SAML 2.0 SSO enables user to perform Single Sign On with any SAML 2.0 enabled Identity Provider.
Version: 12.1.4
Author: miniOrange
Author URI: https://miniorange.com/
*/


include_once dirname( __FILE__ ) . '/mo_login_saml_sso_widget.php';
include_once 'xmlseclibs.php';
use \RobRichards\XMLSecLibs\XMLSecurityKey;
use \RobRichards\XMLSecLibs\XMLSecurityDSig;
use \RobRichards\XMLSecLibs\XMLSecEnc;
require('mo-saml-class-customer.php');
require('mo_saml_settings_page.php');
require('MetadataReader.php');
require('certificate_utility.php');
require('licenseutils.php');
require('LicenseUtils/LicenseDao.php');
require_once('mo-saml-plugin-version-update.php');
require_once('actions/MoSamlAdminActions.php');
class saml_mo_login
{
    private $widgetObj;
    function __construct()
    {
        new MoSamlAdminActions();
        add_action("\x61\144\155\x69\156\x5f\155\145\x6e\x75", array($this, "\155\151\x6e\151\x6f\x72\x61\x6e\147\145\137\x73\x73\157\137\x6d\145\156\x75"));
        add_action("\141\144\x6d\151\156\137\151\x6e\x69\x74", array($this, "\x6d\151\x6e\x69\x6f\162\x61\156\x67\145\x5f\154\x6f\147\x69\x6e\x5f\x77\x69\144\147\145\164\137\x73\141\x6d\x6c\x5f\x73\141\166\145\137\163\x65\164\164\151\x6e\x67\163"));
        add_action("\x61\144\x6d\151\x6e\x5f\145\x6e\x71\165\145\x75\x65\137\163\143\x72\151\160\x74\x73", array($this, "\x70\154\x75\147\x69\156\x5f\x73\145\164\x74\151\x6e\x67\x73\x5f\163\x74\x79\x6c\145"), 1);
        register_deactivation_hook(__FILE__, array($this, "\x6d\x6f\x5f\x73\163\x6f\x5f\x73\x61\x6d\154\137\x64\x65\x61\143\x74\x69\x76\141\164\x65"));
        add_action("\x61\x64\x6d\x69\x6e\137\145\156\x71\x75\145\x75\x65\x5f\x73\x63\162\151\160\164\163", array($this, "\x70\x6c\165\147\151\x6e\x5f\x73\x65\x74\164\x69\x6e\147\163\x5f\163\x63\x72\151\160\x74"), 1);
        remove_action("\x61\144\x6d\x69\156\137\156\157\x74\x69\143\145\163", array($this, "\x6d\157\x5f\x73\141\155\x6c\137\x73\165\143\143\x65\163\x73\x5f\x6d\145\x73\163\x61\147\x65"));
        remove_action("\141\144\x6d\151\x6e\137\156\157\164\151\x63\x65\x73", array($this, "\155\157\x5f\x73\141\155\154\x5f\145\x72\x72\157\162\137\x6d\x65\163\163\x61\147\x65"));
        add_action("\x77\160\x5f\x61\x75\164\150\145\x6e\x74\x69\143\141\164\145", array($this, "\155\157\x5f\163\141\x6d\x6c\137\x61\x75\164\x68\145\156\164\x69\x63\x61\x74\x65"));
        add_action("\x77\x70", array($this, "\x6d\157\x5f\x73\x61\155\x6c\x5f\x61\x75\x74\x6f\x5f\x72\145\144\x69\x72\145\143\x74"));
        $this->widgetObj = new mo_login_wid();
        add_action("\151\156\x69\164", array($this->widgetObj, "\155\157\137\x73\x61\155\x6c\137\167\151\144\x67\145\x74\137\151\156\x69\x74"));
        add_action("\141\x64\155\x69\156\x5f\151\x6e\151\x74", "\155\x6f\x5f\163\x61\155\154\x5f\x64\x6f\167\x6e\x6c\157\x61\x64");
        add_action("\x6c\x6f\147\151\x6e\x5f\145\x6e\x71\165\x65\x75\145\x5f\x73\143\x72\x69\160\164\163", array($this, "\155\x6f\137\163\141\155\154\x5f\154\x6f\147\x69\156\137\145\156\x71\x75\145\165\145\x5f\x73\143\x72\x69\x70\164\163"));
        add_action("\154\157\147\151\156\137\146\x6f\162\x6d", array($this, "\155\157\x5f\x73\x61\155\x6c\137\155\x6f\144\151\x66\171\x5f\154\157\147\x69\x6e\137\146\157\x72\x6d"));
        add_shortcode("\x4d\x4f\137\x53\x41\115\x4c\137\106\x4f\122\115", array($this, "\x6d\x6f\x5f\x67\x65\164\x5f\x73\x61\x6d\x6c\x5f\x73\150\157\162\164\x63\157\144\145"));
        add_filter("\x63\x72\x6f\x6e\137\x73\143\150\x65\144\165\x6c\145\x73", array($this, "\x6d\x79\x70\x72\145\146\x69\x78\137\141\144\x64\x5f\x63\x72\x6f\156\x5f\x73\x63\x68\x65\x64\165\154\x65"));
        add_action("\x6d\145\x74\x61\144\x61\x74\x61\137\x73\171\x6e\143\137\143\162\x6f\156\137\x61\x63\164\151\x6f\156", array($this, "\x6d\x65\164\x61\x64\141\x74\x61\x5f\163\x79\x6e\143\137\x63\x72\x6f\156\137\x61\x63\164\x69\157\x6e"));
        register_activation_hook(__FILE__, array($this, "\155\x6f\137\x73\141\155\154\x5f\x63\x68\145\143\x6b\137\157\x70\x65\156\163\163\x6c"));
        add_action("\160\x6c\x75\x67\x69\x6e\137\x61\x63\164\x69\x6f\x6e\137\154\x69\x6e\153\163\137" . plugin_basename(__FILE__), array($this, "\x6d\x6f\x5f\163\x61\x6d\154\137\160\154\165\147\x69\156\137\141\x63\164\x69\157\x6e\137\154\151\156\153\x73"));
        add_action("\141\144\x6d\x69\156\137\x69\x6e\x69\x74", array($this, "\x64\145\x66\141\165\154\164\137\143\x65\x72\x74\x69\x66\151\x63\141\x74\x65"));
        add_option("\154\143\144\x6a\153\141\x73\x6a\x64\x6b\163\141\x63\154", "\144\x65\x66\141\165\x6c\x74\x2d\143\x65\162\164\x69\x66\x69\143\x61\x74\145");
        add_filter("\155\141\x6e\x61\147\x65\137\165\x73\x65\x72\x73\137\143\x6f\x6c\x75\155\x6e\x73", array($this, "\155\157\x5f\163\141\155\154\x5f\x63\x75\163\164\x6f\x6d\x5f\x61\x74\164\x72\137\143\x6f\x6c\165\155\x6e"));
        add_filter("\x6d\141\156\x61\147\x65\x5f\165\x73\145\x72\x73\x5f\143\x75\163\x74\157\x6d\x5f\143\157\x6c\165\x6d\156", array($this, "\x6d\157\137\163\x61\x6d\154\137\x61\164\164\x72\137\143\x6f\154\165\x6d\156\x5f\143\x6f\x6e\x74\x65\x6e\x74"), 10, 3);
        global $Sy;
        if ((float) $Sy < 5.5 && (float) $Sy > 5.2) {
            goto X4;
        }
        add_action("\167\x70\x5f\154\x6f\147\x6f\x75\164", array($this->widgetObj, "\x6d\157\x5f\x73\x61\x6d\x6c\137\x6c\157\x67\157\165\164"), 1, 1);
        goto j2;
        X4:
        add_filter("\x6c\157\147\157\x75\x74\137\162\x65\144\x69\162\x65\x63\164", array($this, "\x6d\x6f\137\163\x61\x6d\x6c\137\154\x6f\x67\x6f\165\x74\x5f\142\x72\x6f\x6b\145\162\137\167\151\x74\150\x5f\146\x69\x6c\x74\145\x72"), 10, 3);
        j2:
    }
    function mo_saml_logout_broker_with_filter($PK, $qR, $user)
    {
        $this->widgetObj->mo_saml_logout($user->ID);
    }
    function default_certificate()
    {
        $zM = file_get_contents(plugin_dir_path(__FILE__) . "\162\x65\x73\157\x75\162\143\x65\163" . DIRECTORY_SEPARATOR . "\x6d\151\156\151\x6f\162\x61\156\147\145\55\163\x70\x2d\x63\145\162\x74\151\146\151\x63\141\164\145\x2e\143\162\164");
        $z_ = file_get_contents(plugin_dir_path(__FILE__) . "\162\x65\x73\157\165\162\x63\x65\163" . DIRECTORY_SEPARATOR . "\155\x69\x6e\x69\x6f\x72\x61\x6e\x67\145\55\163\x70\x2d\143\x65\x72\164\151\x66\x69\143\x61\164\145\x2d\x70\x72\151\x76\56\153\145\171");
        if (!(!get_option("\x6d\x6f\137\x73\x61\155\x6c\137\143\x75\162\x72\145\156\x74\137\x63\x65\162\x74") && !get_option("\x6d\157\x5f\x73\x61\155\x6c\x5f\x63\165\162\x72\145\156\164\x5f\x63\145\162\x74\137\x70\162\x69\166\x61\164\145\x5f\153\145\x79"))) {
            goto DH;
        }
        update_option("\x6d\157\137\x73\x61\155\154\137\x63\165\162\x72\145\156\164\137\x63\145\x72\x74", $zM);
        update_option("\155\x6f\137\163\x61\155\x6c\137\143\165\162\x72\x65\x6e\x74\x5f\x63\x65\162\164\137\160\x72\x69\x76\141\164\x65\x5f\153\145\171", $z_);
        DH:
    }
    function mo_saml_check_openssl()
    {
        if (mo_saml_is_extension_installed("\157\x70\x65\156\x73\x73\154")) {
            goto We;
        }
        wp_die("\120\110\120\x20\x6f\160\145\156\163\x73\154\40\145\x78\x74\145\x6e\163\x69\x6f\x6e\40\151\163\40\156\x6f\164\x20\151\156\163\x74\x61\x6c\154\x65\144\40\157\x72\x20\144\151\x73\x61\x62\154\145\144\x2c\x70\x6c\x65\141\x73\x65\40\x65\x6e\x61\142\x6c\145\40\x69\x74\40\164\x6f\40\141\143\x74\x69\x76\141\x74\x65\40\x74\x68\145\40\160\x6c\x75\147\151\x6e\56");
        We:
        add_option("\101\x63\x74\x69\166\x61\x74\145\144\x5f\120\x6c\x75\147\151\156", "\x50\154\165\x67\151\156\x2d\x53\154\165\x67");
    }
    function myprefix_add_cron_schedule($xx)
    {
        $xx["\x77\x65\x65\x6b\x6c\x79"] = array("\x69\156\164\x65\162\166\x61\x6c" => 604800, "\144\x69\163\160\154\141\x79" => __("\x4f\x6e\143\145\x20\x57\145\x65\153\154\171"));
        $xx["\155\x6f\156\164\x68\x6c\171"] = array("\151\156\164\145\162\x76\141\x6c" => 2635200, "\x64\151\x73\x70\154\x61\x79" => __("\x4f\156\143\x65\x20\115\157\x6e\x74\150\154\x79"));
        return $xx;
    }
    function metadata_sync_cron_action()
    {
        error_log("\155\151\156\x69\x6f\x72\x61\x6e\x67\145\40\x3a\x20\122\101\116\x20\123\x59\116\103\x20\x2d\x20" . time());
        $IC = LicenseHelper::getCurrentOption(mo_options_enum_service_provider::Identity_name);
        $this->upload_metadata(@file_get_contents(get_option("\163\141\x6d\154\x5f\155\x65\164\x61\144\x61\x74\x61\137\165\162\x6c\x5f\146\157\162\137\x73\171\x6e\x63")));
        update_option("\x73\141\x6d\154\x5f\x69\144\x65\x6e\164\151\164\x79\137\156\141\x6d\145", $IC);
    }
    function mo_login_widget_saml_options()
    {
        global $wpdb;
        update_option("\x6d\157\x5f\x73\x61\x6d\154\137\150\x6f\163\x74\x5f\x6e\x61\x6d\145", "\x68\x74\x74\160\163\72\x2f\x2f\x6c\x6f\147\151\156\56\x78\145\x63\x75\162\x69\146\x79\x2e\x63\x6f\155");
        $kA = get_option("\155\157\137\x73\141\x6d\154\137\150\x6f\x73\164\137\x6e\141\155\x65");
        mo_register_saml_sso();
    }
    public function mo_sso_saml_deactivate()
    {
        if (!is_multisite()) {
            goto Ts;
        }
        global $wpdb;
        $zJ = $wpdb->get_col("\123\x45\x4c\105\x43\124\40\x62\x6c\157\x67\137\151\144\40\x46\122\x4f\x4d\40{$wpdb->blogs}");
        $ey = get_current_blog_id();
        do_action("\155\x6f\x5f\x73\141\x6d\154\x5f\146\154\165\x73\150\137\143\141\x63\x68\145");
        foreach ($zJ as $blog_id) {
            switch_to_blog($blog_id);
            delete_option("\155\x6f\137\x73\141\x6d\154\137\x68\157\x73\164\x5f\156\x61\155\145");
            delete_option("\155\x6f\137\x73\x61\x6d\x6c\x5f\x6e\145\167\137\162\145\x67\151\163\x74\x72\x61\164\151\157\156");
            delete_option("\x6d\x6f\x5f\163\x61\x6d\x6c\x5f\x61\144\x6d\x69\156\x5f\160\150\157\x6e\145");
            delete_option("\x6d\x6f\x5f\163\141\155\x6c\137\x61\x64\x6d\x69\156\x5f\x70\141\x73\163\167\x6f\162\x64");
            delete_option("\x6d\x6f\137\163\x61\155\x6c\x5f\x76\x65\x72\x69\x66\x79\137\143\x75\x73\164\157\x6d\x65\x72");
            delete_option("\x6d\x6f\137\163\141\x6d\x6c\x5f\141\x64\x6d\151\156\x5f\143\165\163\164\x6f\x6d\x65\162\x5f\x6b\x65\x79");
            delete_option("\155\x6f\x5f\163\x61\x6d\x6c\x5f\x61\144\x6d\151\x6e\x5f\141\160\x69\x5f\x6b\145\171");
            delete_option("\155\x6f\x5f\163\141\155\x6c\137\x63\x75\x73\x74\157\x6d\x65\162\x5f\164\157\153\x65\x6e");
            delete_option("\155\x6f\x5f\x73\141\x6d\154\x5f\x6d\x65\x73\163\141\147\145");
            delete_option("\155\157\137\163\x61\155\154\x5f\x72\145\147\x69\163\x74\162\x61\164\151\x6f\x6e\x5f\163\x74\x61\x74\165\x73");
            delete_option("\155\x6f\x5f\x73\141\155\x6c\137\x69\x64\160\137\143\157\156\146\151\147\137\x63\x6f\x6d\160\x6c\x65\164\145");
            delete_option("\x6d\x6f\x5f\x73\141\155\x6c\137\164\162\x61\x6e\x73\141\x63\164\151\x6f\x6e\x49\x64");
            delete_option("\166\154\137\143\x68\145\143\153\x5f\164");
            delete_option("\x76\154\137\143\150\145\x63\x6b\137\163");
            delete_option("\x6d\157\x5f\163\x61\155\x6c\x5f\163\x68\157\167\x5f\x61\x64\144\x6f\x6e\163\137\156\x6f\164\151\x63\145");
            delete_option("\163\155\154\x5f\154\x6b");
            delete_option("\155\157\137\x73\141\155\x6c\x5f\x74\x6c\x61");
            delete_option("\155\157\x5f\163\141\155\x6c\x5f\x6c\151\143\145\x6e\x73\x65\x5f\145\x78\x70\151\x72\171\x5f\144\x61\164\x65");
            Ca:
        }
        th:
        switch_to_blog($ey);
        goto HL;
        Ts:
        do_action("\x6d\157\x5f\x73\x61\155\154\137\146\x6c\x75\x73\150\x5f\143\x61\x63\150\145");
        delete_option("\155\x6f\x5f\163\x61\x6d\x6c\137\150\157\x73\164\x5f\x6e\x61\x6d\145");
        delete_option("\155\x6f\x5f\163\141\x6d\154\x5f\x6e\145\x77\x5f\x72\x65\x67\x69\x73\164\x72\141\164\x69\157\x6e");
        delete_option("\155\157\137\x73\141\155\x6c\137\141\144\155\151\156\x5f\x70\x68\x6f\x6e\145");
        delete_option("\x6d\x6f\137\163\x61\x6d\x6c\137\141\144\x6d\x69\x6e\x5f\160\141\x73\x73\x77\157\162\x64");
        delete_option("\x6d\157\x5f\x73\x61\x6d\154\137\166\x65\162\151\x66\171\x5f\143\165\x73\164\157\155\x65\162");
        delete_option("\x6d\x6f\x5f\x73\x61\x6d\154\137\x61\x64\x6d\151\156\x5f\143\165\x73\x74\157\x6d\x65\162\137\153\x65\171");
        delete_option("\x6d\x6f\137\x73\141\x6d\154\x5f\141\x64\155\x69\x6e\137\x61\x70\151\137\153\x65\171");
        delete_option("\155\157\x5f\x73\141\x6d\x6c\x5f\143\x75\163\x74\157\155\145\162\x5f\x74\x6f\x6b\145\156");
        delete_option("\155\x6f\137\163\x61\155\154\137\155\145\163\x73\x61\x67\x65");
        delete_option("\155\157\x5f\x73\141\155\x6c\x5f\162\x65\147\x69\x73\x74\x72\141\164\x69\x6f\x6e\137\x73\x74\x61\164\x75\x73");
        delete_option("\155\157\x5f\x73\x61\155\154\137\151\144\160\x5f\x63\x6f\x6e\146\x69\147\x5f\143\157\155\160\x6c\x65\x74\145");
        delete_option("\155\x6f\137\163\x61\155\x6c\137\164\162\141\x6e\163\x61\x63\164\151\x6f\x6e\111\144");
        delete_option("\x6d\157\137\x73\x61\155\154\137\145\156\141\x62\154\145\x5f\x63\x6c\157\165\144\x5f\142\162\x6f\x6b\145\x72");
        delete_option("\x76\x6c\137\143\150\x65\x63\153\137\164");
        delete_option("\166\x6c\137\x63\x68\145\143\x6b\x5f\163");
        delete_option("\155\157\x5f\163\x61\155\x6c\x5f\x73\150\x6f\167\x5f\x61\x64\x64\x6f\x6e\x73\x5f\156\x6f\x74\151\x63\145");
        delete_option("\163\155\154\x5f\x6c\153");
        delete_option("\155\157\x5f\163\141\x6d\154\137\164\x6c\x61");
        delete_option("\155\157\137\163\141\155\154\137\x6c\x69\143\x65\156\163\145\137\145\170\x70\151\x72\x79\x5f\144\x61\x74\145");
        HL:
    }
    function djkasjdksaduwaj($wC, $K_, $k0, $uU = "\146\x61\x6c\x73\x65")
    {
        $q1 = $K_->check_customer_ln();
        if ($q1) {
            goto nk;
        }
        if (!($uU == "\164\x72\165\145")) {
            goto qR;
        }
        WP_CLI::error(mo_saml_cli_error::Poor_Internet);
        qR:
        return;
        nk:
        $q1 = json_decode($q1, true);
        if (strcasecmp($q1["\163\164\x61\x74\x75\x73"], "\123\125\103\103\105\x53\x53") == 0) {
            goto t6;
        }
        $WO = get_option("\x6d\157\x5f\163\141\155\154\137\x63\165\163\164\157\155\x65\x72\137\x74\x6f\x6b\x65\156");
        update_option("\x73\x69\x74\145\x5f\143\x6b\x5f\x6c", AESEncryption::encrypt_data("\x66\141\154\x73\x65", $WO));
        if (!($uU == "\x74\x72\x75\x65")) {
            goto oC;
        }
        WP_CLI::error(mo_saml_cli_error::Not_Upgraded);
        oC:
        $of = add_query_arg(array("\x74\x61\x62" => "\154\151\143\x65\156\x73\x69\156\147"), $_SERVER["\122\105\121\125\x45\x53\x54\137\x55\x52\x49"]);
        update_option("\x6d\157\x5f\x73\x61\x6d\x6c\x5f\155\145\163\x73\x61\147\x65", "\x59\x6f\x75\x20\150\x61\166\145\x20\x6e\x6f\164\40\x75\x70\x67\x72\x61\144\145\144\x20\171\x65\x74\x2e\40" . addLink("\103\154\x69\143\153\40\x68\145\x72\145", $of) . "\40\164\x6f\40\165\x70\147\162\141\x64\x65\40\164\x6f\40\160\x72\145\155\x69\165\155\x20\x76\145\x72\163\151\x6f\156\x2e");
        SAMLSPUtilities::mo_saml_show_error_message();
        goto Kv;
        t6:
        if (empty($q1["\x6c\151\x63\145\156\163\145\105\x78\x70\151\x72\x79"])) {
            goto VQ;
        }
        update_option("\x6d\157\137\163\x61\155\154\137\154\151\143\145\156\x73\x65\137\145\170\160\x69\162\171\x5f\x64\141\164\145", $this->mo_saml_parse_expiry_date($q1["\x6c\151\143\145\156\x73\145\105\170\160\151\162\x79"]));
        if (new DateTime() > new DateTime($q1["\x6c\151\143\x65\x6e\x73\145\x45\170\160\x69\162\x79"])) {
            goto FU;
        }
        update_option("\x6d\157\x5f\163\x61\x6d\x6c\137\163\x6c\145", false);
        goto uG;
        FU:
        update_option("\x6d\157\137\x73\141\155\154\137\x73\x6c\145", true);
        uG:
        VQ:
        $q1 = json_decode($K_->mo_saml_vl($wC, false), true);
        update_option("\x76\154\137\x63\x68\x65\x63\153\x5f\164", time());
        if (!empty($q1["\x69\x73\x54\162\x69\x61\x6c"])) {
            goto Ny;
        }
        update_option("\x6d\157\137\x73\141\x6d\x6c\137\164\154\141", false);
        goto tZ;
        Ny:
        update_option("\155\157\137\163\x61\x6d\x6c\x5f\164\154\x61", $q1["\x69\163\x54\162\x69\141\x6c"]);
        update_option("\x6d\157\x5f\x73\141\155\x6c\137\154\x69\143\145\156\x73\x65\x5f\145\x78\x70\x69\162\171\137\x64\x61\164\x65", $q1["\x6c\151\x63\x65\x6e\x73\145\x45\x78\160\151\x72\171\x44\x61\x74\x65"]);
        tZ:
        if (is_array($q1) and strcasecmp($q1["\163\x74\141\164\x75\x73"], "\x53\125\103\x43\105\123\x53") == 0) {
            goto wf;
        }
        if (is_array($q1) and strcasecmp($q1["\163\x74\x61\x74\165\163"], "\x46\101\x49\x4c\105\x44") == 0) {
            goto SU;
        }
        if (!($uU == "\x74\162\x75\x65")) {
            goto OL;
        }
        WP_CLI::error(mo_saml_cli_error::Poor_Internet);
        OL:
        update_option("\155\157\x5f\163\141\155\154\137\x6d\145\163\x73\141\x67\145", "\101\x6e\40\x65\162\162\157\x72\40\157\143\143\165\x72\145\x64\40\x77\150\x69\x6c\145\40\x70\162\x6f\143\x65\163\163\x69\156\x67\40\171\157\165\x72\40\162\145\161\165\x65\163\164\x2e\40\x50\154\145\x61\x73\x65\40\124\162\x79\x20\x61\147\x61\151\x6e\x2e");
        SAMLSPUtilities::mo_saml_show_error_message();
        goto m_;
        SU:
        if (strcasecmp($q1["\155\145\163\x73\x61\147\145"], "\103\x6f\x64\145\40\150\141\x73\40\x45\170\160\151\162\145\144") == 0) {
            goto xV;
        }
        if (!($uU == "\x74\162\x75\x65")) {
            goto N2;
        }
        WP_CLI::error(mo_saml_cli_error::Invalid_License);
        N2:
        update_option("\155\x6f\x5f\x73\x61\x6d\x6c\x5f\155\x65\163\x73\x61\x67\x65", "\x59\157\165\x20\150\x61\x76\145\40\145\x6e\x74\145\x72\145\x64\40\141\x6e\x20\151\x6e\x76\x61\x6c\x69\144\40\154\x69\x63\145\x6e\163\145\40\x6b\145\171\x2e\40\120\154\x65\x61\163\x65\40\x65\x6e\164\x65\x72\x20\141\x20\166\x61\154\x69\144\40\154\x69\143\145\156\x73\x65\40\153\145\171\x2e");
        goto jt;
        xV:
        if (!($uU == "\x74\x72\x75\145")) {
            goto OT;
        }
        WP_CLI::error(mo_saml_cli_error::Code_Expired);
        OT:
        $of = add_query_arg(array("\164\141\142" => "\x6c\x69\143\x65\156\163\151\156\x67"), $_SERVER["\x52\x45\x51\125\x45\x53\x54\137\125\122\x49"]);
        update_option("\x6d\157\x5f\163\x61\x6d\154\x5f\x6d\145\163\163\x61\147\x65", "\114\x69\x63\145\156\163\x65\x20\x6b\145\171\x20\x79\157\x75\x20\150\141\x76\145\x20\x65\x6e\164\145\x72\145\x64\40\150\141\x73\40\141\x6c\162\145\141\x64\171\40\x62\145\145\156\x20\165\x73\x65\x64\x2e\40\120\x6c\145\x61\163\145\x20\x65\x6e\164\145\x72\x20\141\x20\x6b\x65\171\x20\167\x68\x69\143\150\40\150\x61\163\x20\156\x6f\x74\40\x62\x65\x65\x6e\x20\165\x73\145\x64\x20\x62\145\146\x6f\162\x65\40\x6f\156\x20\141\x6e\171\40\x6f\x74\150\x65\x72\x20\x69\x6e\163\164\x61\x6e\143\x65\x20\x6f\162\x20\151\146\40\x79\157\x75\x20\x68\141\x76\x65\40\x65\170\141\x75\x73\x74\145\144\x20\x61\x6c\154\x20\x79\157\x75\x72\x20\153\x65\x79\163\x20\x74\x68\145\156\x20" . addLink("\x43\154\151\x63\153\40\150\x65\162\145", $of) . "\x20\164\157\40\x62\x75\x79\40\155\x6f\162\x65\x2e");
        jt:
        SAMLSPUtilities::mo_saml_show_error_message();
        m_:
        goto zZ;
        wf:
        $WO = get_option("\x6d\x6f\x5f\x73\x61\x6d\x6c\137\143\165\163\x74\157\155\x65\x72\x5f\x74\x6f\x6b\145\156");
        update_option("\x73\x6d\x6c\137\x6c\153", AESEncryption::encrypt_data($wC, $WO));
        update_option("\x6d\157\137\163\141\x6d\154\137\x6d\145\x73\163\141\147\x65", $k0);
        $WO = get_option("\155\x6f\137\163\x61\x6d\154\137\143\x75\163\164\x6f\x6d\145\x72\x5f\x74\157\x6b\145\x6e");
        update_option("\x73\151\x74\145\x5f\143\153\137\154", AESEncryption::encrypt_data("\164\162\x75\145", $WO));
        update_option("\x74\137\163\151\x74\145\x5f\x73\164\x61\164\x75\163", AESEncryption::encrypt_data("\x66\141\x6c\163\x65", $WO));
        $ou = plugin_dir_path(__FILE__);
        $dw = home_url();
        $dw = trim($dw, "\57");
        if (preg_match("\43\x5e\x68\x74\x74\160\50\163\51\77\x3a\57\57\x23", $dw)) {
            goto hr;
        }
        $dw = "\x68\164\x74\x70\x3a\57\x2f" . $dw;
        hr:
        $MW = parse_url($dw);
        $hn = preg_replace("\x2f\136\x77\167\167\134\x2e\x2f", '', $MW["\150\157\163\164"]);
        $Iw = wp_upload_dir();
        $iR = $hn . "\x2d" . $Iw["\142\141\163\145\x64\x69\162"];
        $P6 = hash_hmac("\163\150\x61\x32\65\x36", $iR, "\x34\104\x48\146\x6a\x67\x66\152\141\163\156\x64\x66\x73\x61\x6a\146\110\x47\x4a");
        $Ua = $this->djkasjdksa();
        $il = round(strlen($Ua) / rand(2, 20));
        $Ua = substr_replace($Ua, $P6, $il, 0);
        $xs = base64_decode($Ua);
        if (is_writable($ou . "\x6c\151\x63\x65\156\163\145")) {
            goto iB;
        }
        $Ua = str_rot13($Ua);
        $kX = base64_decode("bGNkamthc2pka3NhY2w=");
        update_option($kX, $Ua);
        goto y6;
        iB:
        file_put_contents($ou . "\154\151\x63\x65\156\163\x65", $xs);
        y6:
        update_option("\x6c\143\x77\x72\164\154\146\x73\141\155\x6c", true);
        if (!($uU == "\164\x72\x75\145")) {
            goto a7;
        }
        WP_CLI::success("\114\151\x63\145\x6e\x73\145\x20\141\160\x70\x6c\x69\145\x64\40\x73\165\x63\143\145\x73\163\x66\x75\154\154\171\x2e");
        a7:
        $of = add_query_arg(array("\x74\x61\x62" => "\x67\145\x6e\x65\162\141\154"), $_SERVER["\x52\105\121\125\x45\x53\x54\x5f\x55\122\111"]);
        SAMLSPUtilities::mo_saml_show_success_message();
        zZ:
        Kv:
    }
    function mo_cli_save_details($T1, $PS, $NC, $G2, $H6)
    {
        if (mo_saml_is_extension_installed("\x63\x75\x72\x6c")) {
            goto pd;
        }
        WP_CLI::error(mo_saml_cli_error::Curl_Error);
        pd:
        update_option("\x6d\x6f\x5f\163\x61\x6d\x6c\x5f\162\x65\x67\151\163\x74\162\x61\164\151\157\x6e\x5f\x73\164\141\164\x75\163", '');
        update_option("\x6d\157\137\163\x61\155\x6c\x5f\166\145\162\151\146\x79\x5f\x63\x75\163\164\x6f\x6d\145\162", '');
        delete_option("\x6d\157\137\x73\141\155\x6c\x5f\156\145\x77\137\x72\145\x67\x69\x73\164\162\141\x74\x69\x6f\156");
        delete_option("\x6d\157\137\163\141\x6d\154\137\x61\144\155\151\x6e\137\145\x6d\141\151\154");
        delete_option("\155\157\137\x73\141\x6d\154\x5f\x61\x64\x6d\151\156\137\x70\x68\157\156\x65");
        delete_option("\x73\x6d\x6c\x5f\154\153");
        delete_option("\164\x5f\163\x69\x74\x65\x5f\163\164\x61\164\165\x73");
        delete_option("\163\x69\x74\x65\137\x63\153\137\154");
        $mg = sanitize_email($G2);
        update_option("\155\x6f\x5f\x73\141\x6d\154\137\141\x64\155\151\x6e\x5f\x65\x6d\x61\x69\154", $mg);
        $K_ = new CustomerSaml();
        $q1 = $K_->check_customer();
        if ($q1) {
            goto Zl;
        }
        WP_CLI::error(mo_saml_cli_error::Poor_Internet);
        Zl:
        $q1 = json_decode($q1, true);
        if (!(strcasecmp($q1["\163\164\x61\x74\165\x73"], "\x43\x55\123\x54\x4f\115\x45\122\137\116\117\124\137\x46\x4f\125\116\104") == 0)) {
            goto Pi;
        }
        WP_CLI::error(mo_saml_cli_error::Customer_Not_Found);
        Pi:
        update_option("\155\x6f\137\x73\141\155\154\137\x61\x64\155\151\x6e\x5f\x63\x75\163\x74\157\x6d\x65\162\137\153\145\171", $T1);
        update_option("\155\157\137\x73\x61\x6d\154\x5f\141\144\155\x69\156\137\x61\160\151\137\x6b\x65\x79", $PS);
        update_option("\155\157\x5f\x73\x61\x6d\154\x5f\143\165\x73\164\x6f\x6d\x65\x72\137\x74\x6f\x6b\145\156", $NC);
        update_option("\x6d\157\137\x73\141\155\154\x5f\x72\145\x67\x69\163\164\x72\x61\x74\x69\157\156\x5f\163\164\x61\164\165\x73", "\105\x78\x69\x73\x74\151\156\147\x20\x55\x73\145\x72");
        delete_option("\155\157\137\163\141\x6d\154\x5f\x76\145\x72\151\146\171\x5f\143\x75\163\164\x6f\x6d\145\162");
        $wC = htmlspecialchars(trim($H6));
        $k0 = "\131\157\165\162\x20\x6c\x69\x63\x65\x6e\x73\x65\x20\151\163\40\166\145\162\151\x66\151\145\144\x2e\40\131\x6f\165\40\143\x61\156\x20\x6e\x6f\x77\x20\x73\145\x74\x75\160\x20\164\150\x65\x20\x70\x6c\165\147\151\156\x2e";
        $this->djkasjdksaduwaj($wC, $K_, $k0, "\164\162\x75\145");
    }
    function plugin_settings_style($yt)
    {
        if (!("\164\157\160\x6c\x65\x76\x65\x6c\137\x70\141\147\x65\x5f\155\x6f\137\163\x61\x6d\154\x5f\x73\145\164\x74\151\x6e\147\x73" != $yt && "\155\151\x6e\x69\157\162\x61\156\x67\x65\55\x73\141\x6d\x6c\55\62\x2d\x30\x2d\163\163\157\x5f\160\141\x67\x65\137\155\157\137\155\141\156\x61\x67\145\x5f\154\x69\143\x65\x6e\163\145" != $yt)) {
            goto rO;
        }
        return;
        rO:
        if (!(isset($_REQUEST["\x74\x61\x62"]) && $_REQUEST["\164\141\142"] == "\x6c\x69\143\145\156\x73\151\156\147")) {
            goto Lv;
        }
        wp_enqueue_style("\x6d\x6f\137\163\x61\x6d\x6c\x5f\x62\x6f\157\164\163\x74\x72\141\160\137\x63\x73\163", plugins_url("\151\x6e\x63\154\165\x64\145\163\57\143\163\163\x2f\142\x6f\x6f\164\163\164\x72\x61\160\x2f\142\157\x6f\164\163\164\x72\141\x70\56\155\151\156\56\143\163\163", __FILE__), array(), mo_options_plugin_constants::Version, "\x61\x6c\x6c");
        Lv:
        wp_enqueue_style("\x6d\157\x5f\163\x61\155\154\x5f\141\x64\x6d\151\x6e\x5f\163\145\164\x74\151\x6e\147\x73\x5f\152\x71\165\145\x72\171\137\163\x74\171\x6c\145", plugins_url("\151\156\x63\154\165\x64\x65\x73\x2f\143\x73\x73\x2f\152\x71\x75\x65\x72\x79\56\165\x69\x2e\143\x73\x73", __FILE__), array(), mo_options_plugin_constants::Version, "\141\154\154");
        wp_enqueue_style("\x6d\157\x5f\163\141\155\154\137\x61\144\155\151\156\x5f\x73\x65\164\x74\151\156\147\163\137\x73\x74\171\154\145\x5f\x74\x72\141\x63\153\145\x72", plugins_url("\x69\x6e\143\154\x75\144\x65\163\57\x63\x73\x73\57\x70\x72\157\x67\x72\145\x73\x73\x2d\164\162\x61\143\153\x65\162\56\x63\x73\163", __FILE__), array(), mo_options_plugin_constants::Version, "\x61\154\154");
        wp_enqueue_style("\155\157\137\x73\141\x6d\154\x5f\x61\x64\155\151\156\x5f\x73\145\164\164\151\x6e\147\x73\x5f\x73\164\171\154\x65", plugins_url("\x69\156\x63\x6c\x75\x64\x65\163\57\143\x73\x73\57\163\164\171\154\x65\137\163\x65\x74\x74\151\156\147\x73\x2e\155\x69\x6e\56\x63\x73\163", __FILE__), array(), mo_options_plugin_constants::Version, "\141\154\x6c");
        wp_enqueue_style("\155\x6f\137\163\141\155\x6c\x5f\x61\144\155\x69\x6e\x5f\163\145\164\x74\x69\x6e\x67\163\137\160\150\157\156\145\137\x73\x74\171\154\145", plugins_url("\151\156\143\x6c\165\144\x65\163\57\x63\x73\163\x2f\x70\x68\x6f\x6e\145\x2e\155\151\156\x2e\x63\163\163", __FILE__), array(), mo_options_plugin_constants::Version, "\141\154\x6c");
        wp_enqueue_style("\155\157\137\x73\x61\x6d\154\x5f\167\160\x62\x2d\146\x61", plugins_url("\151\156\143\154\165\144\x65\163\57\143\x73\x73\x2f\x66\x6f\156\x74\55\141\x77\x65\163\157\155\145\56\155\151\x6e\x2e\143\163\163", __FILE__), array(), mo_options_plugin_constants::Version, "\x61\154\154");
        wp_enqueue_style("\x6d\157\x5f\x73\x61\155\154\x5f\x6d\x61\x6e\141\147\x65\x5f\154\x69\143\x65\156\x73\145\137\163\145\164\x74\x69\156\147\x73\x5f\163\x74\x79\154\x65", plugins_url("\114\151\x63\x65\156\163\145\125\164\151\x6c\163\x2f\166\x69\145\167\x73\x2f\114\151\x63\x65\156\x73\145\x56\151\x65\167\x2e\143\x73\163", __FILE__), array(), mo_options_plugin_constants::Version, "\x61\154\x6c");
    }
    function plugin_settings_script($yt)
    {
        if (!("\164\157\x70\154\145\166\145\x6c\x5f\x70\141\x67\x65\137\155\x6f\x5f\163\x61\155\x6c\x5f\163\x65\x74\x74\151\156\x67\163" != $yt && "\x6d\x69\x6e\x69\x6f\x72\x61\x6e\x67\x65\55\163\141\155\154\x2d\62\x2d\60\x2d\163\x73\157\x5f\160\141\147\145\x5f\x6d\x6f\137\x6d\x61\156\141\x67\145\x5f\x6c\151\143\x65\x6e\x73\x65" != $yt)) {
            goto C3;
        }
        return;
        C3:
        wp_enqueue_script("\152\161\x75\x65\162\171");
        wp_enqueue_script("\x6d\157\137\x73\141\155\154\x5f\141\x64\x6d\151\156\137\163\145\164\x74\151\156\147\x73\137\x63\157\x6c\157\162\x5f\x73\143\162\x69\160\x74", plugins_url("\x69\156\x63\154\165\144\145\163\57\x6a\163\57\x6a\x73\x63\x6f\x6c\x6f\x72\x2f\x6a\163\143\157\154\157\x72\x2e\x6a\x73", __FILE__), array(), mo_options_plugin_constants::Version, false);
        wp_enqueue_script("\x6d\x6f\137\x73\141\x6d\x6c\137\141\144\x6d\x69\x6e\x5f\x73\145\164\164\151\x6e\x67\163\x5f\163\x63\x72\151\160\x74", plugins_url("\151\x6e\143\154\x75\144\x65\163\57\x6a\x73\x2f\x73\145\164\164\151\x6e\x67\x73\56\155\x69\x6e\x2e\x6a\163", __FILE__), array(), mo_options_plugin_constants::Version, false);
        wp_enqueue_script("\155\x6f\137\x73\141\155\x6c\137\x61\144\155\151\x6e\137\x73\x65\164\164\x69\x6e\x67\x73\x5f\160\x68\157\x6e\145\x5f\163\143\x72\151\x70\x74", plugins_url("\151\156\x63\x6c\165\x64\145\163\57\152\x73\57\x70\x68\x6f\156\x65\x2e\x6d\x69\x6e\56\152\163", __FILE__), array(), mo_options_plugin_constants::Version, false);
        wp_enqueue_script("\155\157\x5f\163\x61\x6d\154\x5f\x61\x64\155\151\x6e\137\142\x6f\x6f\164\x73\164\162\141\x70\137\x73\143\162\151\160\x74", plugins_url("\151\x6e\143\x6c\x75\x64\145\163\57\152\x73\57\x62\x6f\157\164\x73\164\x72\x61\160\x2f\x62\x6f\x6f\164\163\x74\x72\141\160\x2e\x6d\151\156\56\152\x73", __FILE__), array(), mo_options_plugin_constants::Version, false);
        if (!(isset($_REQUEST["\164\x61\x62"]) && $_REQUEST["\164\x61\142"] == "\154\x69\143\145\156\x73\x69\156\147")) {
            goto ts;
        }
        wp_enqueue_script("\155\157\137\163\x61\155\x6c\x5f\155\x6f\144\x65\x72\156\x69\172\x72\x5f\163\143\x72\x69\x70\164", plugins_url("\x69\x6e\143\x6c\165\x64\x65\163\57\152\x73\x2f\x6d\157\x64\145\x72\x6e\x69\x7a\x72\56\152\x73", __FILE__), array(), mo_options_plugin_constants::Version, false);
        ts:
    }
    function mo_saml_activation_message()
    {
        $a4 = "\165\160\x64\141\x74\x65\144";
        $k0 = get_option("\155\x6f\x5f\163\141\155\154\137\x6d\145\163\163\141\x67\145");
        echo "\74\x64\151\x76\40\143\154\x61\x73\163\x3d\x27" . $a4 . "\47\x3e\40\74\160\x3e" . $k0 . "\x3c\x2f\x70\76\74\57\144\x69\x76\x3e";
    }
    function get_empty_strings()
    {
        return '';
    }
    function mo_saml_custom_attr_column($Tg)
    {
        $WC = maybe_unserialize(get_option("\x73\141\155\154\137\x73\150\157\x77\137\x75\x73\x65\162\137\x61\164\x74\162\x69\142\165\x74\x65"));
        if (!is_array($WC)) {
            goto cg;
        }
        $hj = maybe_unserialize(get_option("\155\x6f\x5f\x73\x61\x6d\x6c\137\x63\x75\x73\x74\x6f\x6d\137\141\x74\x74\x72\x73\137\155\x61\160\x70\151\156\147"));
        $lw = 0;
        if (!(!empty($WC) && is_array($hj))) {
            goto gC;
        }
        foreach ($hj as $WO => $cK) {
            if (empty($WO)) {
                goto M4;
            }
            if (!in_array($lw, $WC)) {
                goto UK;
            }
            $Tg[$WO] = $WO;
            UK:
            M4:
            $lw++;
            k_:
        }
        sS:
        gC:
        cg:
        return $Tg;
    }
    function mo_saml_attr_column_content($WW, $Nq, $tF)
    {
        $hj = maybe_unserialize(get_option("\155\157\x5f\x73\141\155\x6c\x5f\143\165\163\x74\157\x6d\x5f\141\164\x74\162\x73\137\x6d\141\160\x70\x69\156\x67"));
        if (!is_array($hj)) {
            goto QR;
        }
        foreach ($hj as $WO => $cK) {
            if (!($WO === $Nq)) {
                goto W1;
            }
            $q1 = get_user_meta($tF, $Nq, false);
            if (empty($q1)) {
                goto HK;
            }
            if (!is_array($q1[0])) {
                goto nA;
            }
            $cQ = '';
            foreach ($q1[0] as $AL) {
                $cQ = $cQ . $AL;
                if (!next($q1[0])) {
                    goto o3;
                }
                $cQ = $cQ . "\40\174\x20";
                o3:
                MJ:
            }
            At:
            return $cQ;
            goto AX;
            nA:
            return $q1[0];
            AX:
            HK:
            W1:
            Hv:
        }
        ft:
        QR:
        return $WW;
    }
    static function mo_check_option_admin_referer($jh)
    {
        return !empty($_POST["\x6f\160\164\x69\x6f\x6e"]) and $_POST["\x6f\160\164\x69\157\x6e"] == $jh and check_admin_referer($jh);
    }
    function miniorange_login_widget_saml_save_settings()
    {
        if (!current_user_can("\x6d\x61\156\141\x67\145\137\157\x70\x74\x69\x6f\156\163")) {
            goto Eq;
        }
        if (!(is_admin() && get_option("\101\143\164\151\x76\x61\164\145\x64\x5f\120\x6c\165\x67\x69\156") == "\120\x6c\165\x67\x69\156\55\123\154\165\x67")) {
            goto Oa;
        }
        delete_option("\101\143\x74\151\166\x61\x74\x65\x64\x5f\x50\x6c\x75\x67\x69\156");
        update_option("\x6d\157\137\x73\x61\155\x6c\137\155\x65\x73\x73\141\x67\x65", "\107\157\x20\x74\x6f\x20\160\154\165\147\151\x6e\40\74\x62\x3e\74\x61\40\150\x72\145\146\x3d\x22\141\x64\x6d\151\x6e\56\160\150\160\77\160\141\147\145\x3d\x6d\157\x5f\163\x61\x6d\154\x5f\163\x65\164\164\151\x6e\x67\163\42\76\163\145\x74\x74\x69\156\x67\x73\x3c\x2f\141\76\x3c\x2f\142\76\x20\164\x6f\x20\x63\157\x6e\x66\x69\147\x75\162\145\x20\123\101\115\114\x20\x53\x69\156\147\154\x65\40\x53\151\x67\156\40\117\x6e\40\x62\171\40\155\151\156\151\x4f\162\x61\x6e\147\145\x2e");
        add_action("\141\x64\155\151\x6e\x5f\156\x6f\x74\x69\143\x65\x73", array($this, "\x6d\x6f\137\163\141\x6d\x6c\x5f\x61\143\164\x69\166\x61\x74\x69\157\x6e\137\155\145\x73\163\141\x67\145"));
        Oa:
        Eq:
        if (!(!empty($_POST["\x6f\x70\164\x69\x6f\156"]) && current_user_can("\x6d\141\156\141\147\145\137\x6f\x70\x74\x69\x6f\x6e\x73"))) {
            goto hP;
        }
        if (!self::mo_check_option_admin_referer("\x6d\157\137\x6d\x61\x6e\x61\x67\x65\137\154\151\143\145\156\x73\x65")) {
            goto rW;
        }
        if (isset($_POST["\x6d\x6f\x5f\145\x6e\x61\142\154\145\137\x6d\x75\x6c\x74\151\160\x6c\x65\x5f\154\151\143\145\x6e\163\x65\163"])) {
            goto BV;
        }
        delete_option("\x6d\x6f\137\x65\x6e\141\142\x6c\145\137\x6d\x75\x6c\164\x69\x70\154\145\x5f\154\x69\x63\x65\156\x73\145\x73");
        goto iX;
        BV:
        update_option("\x6d\157\x5f\145\156\x61\x62\x6c\145\137\155\165\154\x74\x69\x70\154\145\137\154\151\143\x65\x6e\x73\145\163", "\x63\150\x65\143\153\145\x64");
        initializeLicenseObjectArray();
        iX:
        update_option("\155\x6f\137\163\x61\x6d\154\137\x6d\145\163\x73\x61\147\145", "\x43\157\156\x66\151\147\165\x72\x61\164\x69\x6f\x6e\40\163\x61\166\145\144\40\163\x75\143\x63\x65\x73\163\x66\165\154\x6c\171");
        SAMLSPUtilities::mo_saml_show_success_message();
        rW:
        if (!self::mo_check_option_admin_referer("\155\157\137\141\x64\144\151\156\x67\137\141\154\164\145\x72\156\x61\164\145\137\x65\x6e\166\151\162\157\156\x6d\145\x6e\164\163")) {
            goto yx;
        }
        if (updateLicenseObjects($_POST)) {
            goto Jh;
        }
        update_option("\x6d\157\x5f\163\x61\155\x6c\x5f\155\145\x73\x73\x61\x67\145", "\x59\x6f\x75\162\40\143\150\x61\156\x67\145\x73\40\167\145\x72\145\40\156\157\x74\x20\163\141\x76\x65\x64\56\x20\x50\154\145\141\163\x65\40\160\x72\157\x76\151\144\145\40\x75\x6e\x69\161\165\x65\x20\166\141\x6c\x75\145\x73\x20\x66\157\162\x20\171\157\165\162\40\145\x6e\x76\151\162\x6f\x6e\155\145\156\164\x73\40\x61\156\144\40\144\x6f\156\x27\164\40\x72\x65\x6d\157\166\x65\x20\164\150\145\40\143\x75\162\162\145\x6e\x74\x20\145\x6e\x76\x69\x72\157\156\x6d\x65\x6e\x74");
        SAMLSPUtilities::mo_saml_show_error_message();
        goto Vy;
        Jh:
        update_option("\155\157\x5f\163\x61\155\x6c\x5f\x6d\145\163\163\141\147\x65", "\x45\156\166\x69\162\157\x6e\x6d\145\156\164\x73\40\x75\160\144\141\164\x65\x64\40\163\165\x63\143\x65\163\163\146\x75\x6c\154\x79");
        SAMLSPUtilities::mo_saml_show_success_message();
        Vy:
        yx:
        if (!self::mo_check_option_admin_referer("\x6d\157\x5f\x63\150\x61\x6e\x67\x65\137\x65\156\166\151\162\x6f\156\145\155\164")) {
            goto QV;
        }
        update_option("\155\x6f\x5f\163\141\155\154\137\x73\x65\154\145\x63\164\145\144\x5f\x65\x6e\166\151\162\x6f\x6e\x6d\145\156\x74", $_POST["\x65\x6e\166\x69\x72\x6f\x6e\155\145\x6e\164"]);
        update_option("\x6d\x6f\137\x73\141\x6d\154\x5f\155\145\163\163\x61\x67\x65", "\x45\x6e\166\x69\x72\157\x6e\x6d\145\x6e\x74\40\143\150\141\x6e\147\x65\144\x20\163\x75\x63\143\145\x73\x73\146\165\154\154\x79");
        SAMLSPUtilities::mo_saml_show_success_message();
        QV:
        if (self::mo_check_option_admin_referer("\x6c\x6f\x67\151\156\x5f\167\151\144\147\x65\164\137\x73\x61\x6d\x6c\137\163\x61\x76\145\137\x73\145\164\x74\x69\x6e\x67\x73")) {
            goto VT;
        }
        if (self::mo_check_option_admin_referer("\154\x6f\147\151\156\x5f\x77\151\144\147\145\164\x5f\x73\x61\155\154\137\x61\x74\x74\162\x69\142\165\164\145\x5f\155\x61\x70\x70\x69\156\x67")) {
            goto S_;
        }
        if (self::mo_check_option_admin_referer("\x63\x6c\x65\141\162\x5f\x61\x74\x74\162\163\137\x6c\151\x73\x74")) {
            goto w4;
        }
        if (self::mo_check_option_admin_referer("\x6d\x6f\137\x73\141\x6d\154\137\x61\x64\144\157\156\x73\137\155\145\x73\163\141\147\x65")) {
            goto ml;
        }
        if (self::mo_check_option_admin_referer("\x6c\157\147\x69\156\137\167\151\144\x67\x65\164\137\163\x61\155\x6c\x5f\x72\157\x6c\x65\x5f\155\x61\160\160\151\156\x67")) {
            goto Ah;
        }
        if (self::mo_check_option_admin_referer("\163\141\155\x6c\x5f\x66\157\162\x6d\x5f\144\157\x6d\x61\x69\x6e\137\x72\x65\163\x74\162\151\x63\x74\151\157\x6e\137\157\160\164\151\x6f\156")) {
            goto k9;
        }
        if (self::mo_check_option_admin_referer("\x6d\x6f\137\163\141\x6d\154\137\x75\x70\x64\x61\164\145\x5f\151\144\x70\137\x73\145\x74\164\151\x6e\x67\x73\137\x6f\x70\x74\x69\157\156")) {
            goto VO;
        }
        if (!self::mo_check_option_admin_referer("\163\141\x6d\154\x5f\165\160\x6c\x6f\x61\x64\137\x6d\x65\164\141\x64\x61\x74\x61")) {
            goto aM;
        }
        if (!empty($_POST["\x73\x61\155\154\x5f\151\144\x65\156\x74\151\164\171\x5f\155\145\x74\x61\144\141\x74\x61\137\160\x72\157\x76\x69\x64\x65\x72"])) {
            goto tA;
        }
        update_option("\155\157\137\x73\141\x6d\154\137\155\x65\x73\x73\x61\x67\x65", "\120\154\x65\141\x73\x65\40\x45\156\164\x65\x72\x20\166\x61\x6c\151\144\x20\111\x64\x65\x6e\x74\151\164\171\x20\x50\162\157\x76\151\144\145\x72\40\156\141\155\145\x2e");
        SAMLSPUtilities::mo_saml_show_error_message();
        return;
        tA:
        if (preg_match("\x2f\x5e\x5c\167\x2a\44\x2f", $_POST["\x73\141\x6d\x6c\137\151\x64\145\x6e\x74\151\164\x79\x5f\x6d\x65\164\x61\x64\141\164\x61\x5f\160\162\x6f\166\x69\144\x65\162"])) {
            goto PM;
        }
        update_option("\x6d\157\x5f\163\141\155\154\137\x6d\145\x73\x73\x61\x67\x65", "\120\x6c\145\x61\163\145\40\x6d\141\164\x63\150\x20\x74\x68\145\x20\162\x65\161\x75\x65\x73\164\x65\x64\x20\x66\x6f\x72\155\x61\164\x20\x66\157\162\40\x49\144\x65\156\x74\x69\x74\171\x20\120\162\x6f\x76\x69\144\145\x72\x20\x4e\141\155\145\56\40\117\x6e\154\x79\x20\x61\x6c\160\x68\141\142\x65\164\x73\x2c\40\x6e\x75\x6d\142\x65\162\x73\40\141\x6e\144\40\x75\156\144\145\162\x73\143\x6f\x72\x65\x20\x69\x73\x20\x61\x6c\154\x6f\167\x65\144\x2e");
        SAMLSPUtilities::mo_saml_show_error_message();
        return;
        PM:
        if (!function_exists("\x77\x70\137\150\x61\156\144\x6c\145\137\165\x70\x6c\157\x61\144")) {
            require_once ABSPATH . "\167\x70\55\141\144\x6d\x69\156\x2f\x69\x6e\143\x6c\x75\144\x65\x73\x2f\146\x69\x6c\145\x2e\160\150\x70";
        }
        $this->_handle_upload_metadata();
        aM:
        goto Ci;
        VO:
        if (!(!empty($_POST["\155\157\137\x73\x61\155\154\x5f\163\160\x5f\x62\x61\x73\145\x5f\x75\x72\x6c"]) && !empty($_POST["\155\157\137\163\141\x6d\x6c\x5f\163\x70\137\x65\x6e\164\151\164\x79\137\x69\144"]))) {
            goto EM;
        }
        $PG = htmlspecialchars($_POST["\x6d\157\137\163\x61\x6d\154\137\x73\x70\137\x62\x61\x73\x65\x5f\x75\162\x6c"]);
        $rb = htmlspecialchars($_POST["\155\x6f\137\x73\141\x6d\154\137\x73\x70\x5f\x65\156\x74\x69\164\x79\x5f\x69\x64"]);
        if (!(substr($PG, -1) == "\57")) {
            goto Fg;
        }
        $PG = substr($PG, 0, -1);
        Fg:
        update_option("\155\x6f\137\163\141\x6d\x6c\137\x73\160\137\142\x61\163\145\137\165\x72\154", $PG);
        update_option("\155\157\x5f\163\141\155\154\137\x73\x70\137\145\156\164\151\164\171\x5f\x69\144", $rb);
        EM:
        update_option("\155\157\x5f\163\141\155\x6c\137\x6d\x65\163\163\141\x67\145", "\123\x65\x74\164\151\x6e\x67\163\x20\x75\160\144\141\164\145\144\x20\163\x75\x63\x63\x65\x73\163\146\x75\x6c\x6c\x79\56");
        SAMLSPUtilities::mo_saml_show_success_message();
        Ci:
        goto C2;
        k9:
        $Q7 = LicenseHelper::getSelectedEnvironment();
        mo_save_environment_settings($_POST);
        if (!($Q7 and $Q7 != LicenseHelper::getCurrentEnvironment())) {
            goto rw;
        }
        return;
        rw:
        $fr = !empty($_POST["\155\x6f\x5f\163\x61\155\154\x5f\x65\156\141\x62\x6c\x65\x5f\x64\157\155\x61\151\156\x5f\162\x65\163\164\x72\151\143\x74\x69\x6f\x6e\137\x6c\157\147\151\x6e"]) ? htmlspecialchars($_POST["\x6d\157\x5f\x73\x61\x6d\154\137\145\156\141\x62\154\x65\x5f\144\157\x6d\x61\151\x6e\x5f\x72\145\163\164\162\151\x63\x74\x69\157\x6e\x5f\154\x6f\147\x69\x6e"]) : '';
        $tu = !empty($_POST["\155\x6f\x5f\x73\x61\x6d\154\x5f\141\154\x6c\x6f\x77\137\x64\145\x6e\171\137\165\x73\145\162\137\167\x69\x74\150\137\x64\157\155\x61\x69\156"]) ? htmlspecialchars($_POST["\x6d\x6f\137\163\x61\155\x6c\137\141\x6c\x6c\157\x77\137\144\145\x6e\171\x5f\165\x73\x65\x72\137\x77\x69\164\150\137\144\157\x6d\x61\151\x6e"]) : "\x61\x6c\x6c\157\x77";
        $k8 = !empty($_POST["\x73\141\155\154\137\141\155\137\x65\155\141\151\154\137\144\x6f\x6d\141\151\156\163"]) ? htmlspecialchars($_POST["\163\141\155\154\137\x61\x6d\x5f\x65\x6d\x61\151\154\x5f\144\157\155\x61\151\x6e\163"]) : '';
        update_option("\155\157\137\x73\141\155\x6c\137\x65\x6e\x61\142\x6c\x65\137\x64\157\155\x61\151\x6e\137\x72\145\163\164\x72\x69\x63\164\151\x6f\156\137\154\x6f\147\x69\156", $fr);
        update_option("\155\x6f\137\x73\x61\155\x6c\137\141\154\154\157\x77\137\x64\x65\x6e\171\x5f\x75\163\x65\162\x5f\167\151\x74\x68\x5f\x64\x6f\x6d\x61\151\156", $tu);
        update_option("\x73\141\x6d\154\x5f\x61\155\137\x65\155\x61\x69\154\137\x64\x6f\155\x61\x69\x6e\x73", $k8);
        update_option("\155\157\x5f\163\x61\155\x6c\x5f\155\x65\x73\163\x61\147\145", "\x44\157\155\x61\x69\x6e\x20\x52\145\x73\164\x72\x69\143\x74\151\157\x6e\40\150\141\163\x20\142\145\145\x6e\40\x73\141\x76\x65\x64\40\163\165\x63\x63\145\163\x73\146\165\x6c\x6c\171\56");
        SAMLSPUtilities::mo_saml_show_success_message();
        C2:
        goto qv;
        Ah:
        $Q7 = LicenseHelper::getSelectedEnvironment();
        mo_save_environment_settings($_POST);
        if (!($Q7 and $Q7 != LicenseHelper::getCurrentEnvironment())) {
            goto GM;
        }
        return;
        GM:
        if (mo_saml_is_extension_installed("\x63\165\162\x6c")) {
            goto dD;
        }
        update_option("\155\157\137\x73\x61\155\154\x5f\155\x65\x73\163\x61\x67\x65", "\x45\x52\122\117\x52\72\40\120\110\120\40\143\x55\x52\x4c\40\x65\x78\x74\145\156\x73\151\157\x6e\40\151\163\40\x6e\157\164\x20\151\156\x73\164\141\154\154\x65\x64\40\x6f\162\x20\x64\151\163\x61\142\x6c\145\144\x2e\40\123\141\166\145\40\122\x6f\x6c\145\40\x4d\x61\x70\x70\x69\156\x67\40\x66\x61\x69\154\145\x64\56");
        SAMLSPUtilities::mo_saml_show_error_message();
        return;
        dD:
        if (empty($_POST["\163\141\x6d\154\137\x61\155\137\x64\145\x66\141\x75\154\164\137\165\x73\x65\x72\137\x72\x6f\x6c\x65"])) {
            goto DR;
        }
        $nP = htmlspecialchars($_POST["\x73\x61\155\154\x5f\141\155\137\144\145\146\x61\165\x6c\164\137\165\163\x65\x72\137\x72\x6f\154\145"]);
        update_option("\163\x61\155\154\x5f\141\155\x5f\144\x65\146\141\x75\154\x74\x5f\x75\x73\x65\x72\137\x72\x6f\154\145", $nP);
        DR:
        if (isset($_POST["\163\141\x6d\x6c\137\x61\x6d\137\144\157\x6e\x74\137\141\154\154\x6f\x77\137\x75\156\x6c\x69\x73\164\145\144\137\165\x73\145\x72\137\162\157\x6c\x65"])) {
            goto EA;
        }
        update_option("\x73\x61\155\154\x5f\x61\155\137\144\x6f\156\x74\x5f\141\x6c\154\x6f\x77\x5f\x75\x6e\154\151\163\x74\x65\x64\x5f\x75\x73\145\x72\137\162\x6f\x6c\x65", "\x75\156\143\x68\145\x63\153\145\x64");
        goto VG;
        EA:
        update_option("\x73\x61\155\154\x5f\x61\x6d\137\x64\x65\146\141\165\x6c\x74\137\x75\163\x65\x72\137\x72\x6f\x6c\x65", false);
        update_option("\163\x61\155\x6c\x5f\141\x6d\137\x64\x6f\156\x74\x5f\x61\x6c\x6c\157\x77\x5f\165\156\154\151\163\x74\145\x64\x5f\x75\163\x65\162\x5f\x72\x6f\x6c\145", "\143\150\145\x63\153\145\x64");
        VG:
        if (isset($_POST["\x6d\157\x5f\x73\141\x6d\154\x5f\144\x6f\156\x74\x5f\143\x72\x65\x61\x74\x65\137\165\163\x65\x72\x5f\151\x66\137\x72\x6f\x6c\145\x5f\x6e\157\164\137\x6d\x61\x70\160\145\x64"])) {
            goto KN;
        }
        update_option("\x6d\x6f\x5f\163\x61\x6d\154\137\144\157\x6e\164\137\x63\162\145\x61\164\145\x5f\165\163\x65\162\137\151\146\x5f\162\157\154\145\137\156\x6f\x74\x5f\155\x61\160\160\x65\144", "\165\x6e\x63\150\x65\x63\153\145\x64");
        goto tQ;
        KN:
        update_option("\155\x6f\x5f\163\x61\155\154\x5f\x64\157\156\x74\x5f\143\162\145\x61\x74\x65\x5f\x75\163\145\x72\137\151\x66\137\162\157\154\145\137\x6e\157\164\x5f\155\x61\160\x70\x65\x64", "\x63\x68\145\x63\153\x65\x64");
        update_option("\163\141\x6d\x6c\137\x61\x6d\137\x64\x65\146\x61\x75\154\164\137\x75\x73\x65\x72\137\x72\157\154\145", false);
        update_option("\x73\141\x6d\x6c\137\x61\x6d\x5f\x64\157\x6e\164\137\x61\154\154\157\167\137\165\156\154\151\163\x74\x65\x64\137\165\x73\x65\162\137\x72\157\154\x65", "\x75\156\143\150\145\143\153\x65\x64");
        tQ:
        if (isset($_POST["\155\157\137\x73\x61\155\x6c\x5f\x64\x6f\156\164\x5f\x75\x70\144\x61\164\x65\x5f\x65\170\151\x73\x74\151\156\x67\137\x75\x73\x65\x72\137\162\x6f\x6c\x65"])) {
            goto V3;
        }
        update_option("\x73\141\x6d\x6c\137\141\x6d\x5f\x64\x6f\x6e\164\x5f\165\160\144\141\x74\x65\137\145\170\x69\163\x74\151\156\x67\137\165\x73\145\162\x5f\x72\157\x6c\x65", "\x75\x6e\x63\x68\145\143\153\x65\144");
        goto wl;
        V3:
        update_option("\x73\141\x6d\x6c\137\x61\155\x5f\x64\x6f\x6e\164\x5f\165\160\x64\141\x74\x65\137\145\x78\151\x73\164\151\x6e\147\x5f\x75\163\145\162\x5f\x72\x6f\154\145", "\143\150\x65\x63\x6b\145\x64");
        update_option("\x73\x61\x6d\x6c\137\141\x6d\x5f\165\x70\x64\141\x74\145\137\141\144\x6d\151\156\137\x75\163\145\162\x73\137\162\x6f\154\145", "\165\x6e\143\150\x65\143\153\145\x64");
        wl:
        if (isset($_POST["\x6d\x6f\137\163\141\155\x6c\x5f\165\x70\x64\x61\x74\x65\137\x61\144\x6d\x69\x6e\137\x75\163\145\x72\x73\137\x72\157\x6c\x65"])) {
            goto ai;
        }
        update_option("\x73\141\x6d\154\137\x61\155\x5f\x75\160\144\141\x74\x65\137\141\144\x6d\151\x6e\137\165\x73\x65\x72\163\137\162\x6f\x6c\145", "\165\x6e\143\x68\145\x63\x6b\x65\144");
        goto LF;
        ai:
        update_option("\x73\141\155\154\x5f\141\x6d\137\165\x70\144\141\x74\x65\x5f\141\x64\155\151\x6e\137\165\x73\x65\162\x73\x5f\x72\157\x6c\x65", "\143\x68\x65\143\x6b\145\x64");
        LF:
        if (isset($_POST["\x6d\157\137\x73\141\155\x6c\137\144\x6f\156\164\137\141\x6c\154\157\167\x5f\165\x73\145\162\x5f\x74\157\154\x6f\x67\x69\156\x5f\143\x72\145\x61\164\x65\x5f\167\x69\164\150\137\x67\x69\166\145\156\x5f\x67\x72\x6f\x75\160\163"])) {
            goto HU;
        }
        update_option("\x73\x61\x6d\x6c\x5f\x61\x6d\x5f\x64\x6f\x6e\164\137\x61\x6c\x6c\157\167\x5f\165\x73\x65\x72\x5f\x74\x6f\154\x6f\147\151\156\x5f\x63\162\x65\x61\164\x65\x5f\x77\x69\x74\x68\x5f\x67\151\166\x65\x6e\137\x67\162\157\x75\x70\x73", "\165\156\143\150\x65\143\153\x65\144");
        goto W3;
        HU:
        update_option("\163\x61\x6d\154\x5f\141\155\137\144\157\156\164\137\141\154\x6c\x6f\x77\137\x75\163\145\x72\x5f\x74\157\x6c\157\147\x69\x6e\137\x63\x72\x65\x61\x74\145\x5f\167\x69\x74\x68\x5f\147\x69\166\x65\156\x5f\x67\x72\157\165\x70\x73", "\x63\150\145\143\153\145\x64");
        if (isset($_POST["\x6d\157\x5f\x73\141\155\154\x5f\x72\145\163\164\x72\x69\x63\x74\137\165\x73\x65\162\x73\137\x77\x69\x74\x68\137\x67\x72\x6f\x75\x70\x73"])) {
            goto nR;
        }
        update_option("\x6d\x6f\x5f\163\x61\155\154\137\162\145\163\x74\x72\151\x63\x74\137\x75\x73\x65\162\x73\137\167\x69\164\x68\x5f\x67\162\x6f\x75\160\163", '');
        goto PN;
        nR:
        update_option("\x6d\x6f\137\163\x61\155\154\137\x72\x65\163\x74\x72\151\x63\164\137\x75\163\x65\162\x73\x5f\x77\x69\x74\150\137\147\x72\x6f\165\160\163", htmlspecialchars(stripslashes($_POST["\x6d\x6f\x5f\x73\141\155\154\x5f\x72\145\163\x74\x72\151\x63\x74\x5f\165\x73\145\x72\x73\x5f\167\151\x74\150\x5f\147\162\157\x75\160\163"])));
        PN:
        W3:
        $wp_roles = new WP_Roles();
        $gs = $wp_roles->get_names();
        $zl = array();
        foreach ($gs as $bc => $Ag) {
            $IT = "\163\141\155\154\137\x61\x6d\x5f\x67\162\157\x75\x70\137\x61\164\164\x72\x5f\166\x61\x6c\x75\x65\163\137" . $bc;
            $zl[$bc] = htmlspecialchars(stripslashes($_POST[$IT]));
            dV:
        }
        Lr:
        update_option("\x73\141\x6d\x6c\x5f\x61\155\137\162\157\154\145\x5f\x6d\141\160\160\x69\156\x67", $zl);
        update_option("\x6d\157\x5f\x73\141\155\154\x5f\x6d\145\x73\163\x61\147\145", "\122\x6f\154\145\x20\x4d\x61\x70\160\x69\x6e\x67\40\x64\x65\164\x61\x69\x6c\163\40\x73\x61\x76\145\144\40\x73\x75\143\x63\145\163\163\x66\165\154\154\x79\x2e");
        SAMLSPUtilities::mo_saml_show_success_message();
        qv:
        goto bR;
        ml:
        update_option("\155\x6f\x5f\x73\141\x6d\154\x5f\163\150\x6f\167\x5f\x61\x64\144\157\156\163\137\156\157\x74\151\x63\145", 1);
        bR:
        goto h4;
        w4:
        delete_option("\155\157\x5f\x73\x61\x6d\x6c\137\164\x65\163\x74\x5f\143\157\156\146\151\x67\137\x61\x74\x74\x72\163");
        update_option("\155\157\137\x73\141\x6d\154\137\x6d\x65\x73\163\x61\147\145", "\101\x74\x74\x72\x69\x62\x75\164\145\163\x20\x6c\x69\x73\164\40\x72\145\x6d\x6f\x76\145\x64\40\163\165\143\x63\145\x73\x73\146\x75\154\x6c\171");
        SAMLSPUtilities::mo_saml_show_success_message();
        h4:
        goto TY;
        S_:
        if (mo_saml_is_extension_installed("\x63\x75\162\x6c")) {
            goto Ja;
        }
        update_option("\155\157\x5f\163\141\155\x6c\x5f\155\145\x73\163\x61\147\x65", "\105\x52\122\117\122\72\x20\120\110\120\x20\x63\125\122\114\40\x65\x78\164\x65\x6e\x73\x69\157\x6e\x20\151\x73\x20\x6e\x6f\164\40\x69\x6e\x73\164\x61\x6c\x6c\x65\x64\40\157\162\40\x64\x69\x73\x61\x62\x6c\145\x64\56\x20\123\x61\166\x65\x20\x41\164\x74\162\151\142\x75\164\x65\x20\x4d\x61\160\160\x69\156\147\40\x66\141\151\x6c\x65\144\56");
        SAMLSPUtilities::mo_saml_show_error_message();
        return;
        Ja:
        $Q7 = LicenseHelper::getSelectedEnvironment();
        mo_save_environment_settings($_POST);
        if (!($Q7 and $Q7 != LicenseHelper::getCurrentEnvironment())) {
            goto Qj;
        }
        return;
        Qj:
        update_option("\x73\x61\x6d\154\137\x61\155\x5f\x75\163\x65\162\156\141\155\145", htmlspecialchars(stripslashes($_POST["\x73\141\x6d\154\x5f\x61\155\137\x75\x73\145\162\x6e\141\155\x65"])));
        update_option("\163\x61\155\154\137\x61\155\137\145\x6d\141\x69\154", htmlspecialchars(stripslashes($_POST["\163\141\155\154\x5f\x61\155\x5f\145\x6d\x61\x69\154"])));
        update_option("\x73\141\x6d\154\137\x61\x6d\137\x66\151\162\163\x74\137\156\x61\x6d\x65", htmlspecialchars(stripslashes($_POST["\x73\141\155\x6c\137\x61\x6d\137\x66\x69\162\x73\164\137\156\x61\155\145"])));
        update_option("\163\x61\155\154\137\141\x6d\x5f\154\x61\x73\x74\137\156\x61\155\x65", htmlspecialchars(stripslashes($_POST["\163\x61\x6d\154\137\x61\x6d\137\154\x61\163\x74\137\156\x61\155\145"])));
        update_option("\x73\x61\x6d\154\x5f\x61\x6d\137\147\x72\x6f\x75\160\137\156\x61\155\145", htmlspecialchars(stripslashes($_POST["\163\141\155\x6c\137\x61\155\137\x67\162\157\x75\160\x5f\x6e\x61\x6d\145"])));
        update_option("\x73\141\155\x6c\x5f\141\x6d\x5f\x64\x69\x73\160\x6c\141\171\137\x6e\141\x6d\145", htmlspecialchars(stripslashes($_POST["\163\141\155\154\x5f\x61\x6d\x5f\x64\x69\163\160\154\141\171\x5f\156\x61\155\145"])));
        $hj = array();
        $lD = array();
        $Yr = array();
        $Z9 = array();
        if (empty($_POST["\x6d\157\x5f\163\141\155\154\137\143\165\163\x74\x6f\x6d\x5f\141\164\164\x72\x69\142\165\x74\x65\x5f\153\145\171\x73"])) {
            goto OX;
        }
        $lD = $_POST["\x6d\157\x5f\x73\x61\155\x6c\x5f\x63\x75\x73\x74\x6f\155\137\x61\x74\x74\162\x69\x62\165\164\x65\137\153\x65\171\x73"];
        OX:
        if (empty($_POST["\155\x6f\137\x73\141\x6d\x6c\137\x63\x75\x73\164\157\155\137\x61\164\x74\162\x69\x62\x75\164\145\137\166\x61\x6c\165\145\163"])) {
            goto Av;
        }
        $Yr = $_POST["\155\157\x5f\x73\141\x6d\154\x5f\143\x75\163\164\x6f\155\137\141\x74\164\162\151\x62\x75\164\x65\137\166\x61\154\x75\145\x73"];
        Av:
        $oB = count($lD);
        if (!($oB > 0)) {
            goto d9;
        }
        $lD = array_map("\x68\164\155\x6c\x73\x70\x65\143\151\141\154\x63\150\x61\x72\163", $lD);
        $Yr = array_map("\x68\164\155\x6c\163\x70\145\x63\151\141\x6c\x63\150\x61\162\163", $Yr);
        $hV = 0;
        MZ:
        if (!($hV < $oB)) {
            goto JF;
        }
        if (empty($_POST["\x6d\157\137\163\141\x6d\154\x5f\x64\x69\x73\x70\x6c\141\x79\x5f\141\164\x74\x72\x69\x62\x75\164\145\x5f" . $hV])) {
            goto GK;
        }
        array_push($Z9, $hV);
        GK:
        $hV++;
        goto MZ;
        JF:
        d9:
        update_option("\163\x61\155\x6c\137\163\x68\x6f\x77\x5f\165\163\x65\162\x5f\141\x74\x74\x72\x69\x62\165\164\145", $Z9);
        $hj = array_combine($lD, $Yr);
        $hj = array_filter($hj);
        if (!empty($hj)) {
            goto Mr;
        }
        $hj = get_option("\155\x6f\137\x73\x61\155\154\x5f\143\x75\x73\164\x6f\155\x5f\141\x74\164\x72\163\137\155\141\160\x70\x69\156\147");
        if (empty($hj)) {
            goto HS;
        }
        delete_option("\x6d\157\137\x73\x61\155\154\137\x63\165\x73\164\157\155\137\x61\x74\164\162\x73\137\155\x61\x70\x70\x69\156\147");
        HS:
        goto IG;
        Mr:
        update_option("\155\157\137\163\141\155\x6c\137\143\x75\x73\164\157\x6d\137\x61\164\164\162\x73\x5f\x6d\x61\x70\160\x69\156\147", $hj);
        IG:
        update_option("\155\x6f\137\x73\x61\x6d\x6c\137\x6d\145\x73\x73\x61\x67\x65", "\x41\164\x74\x72\x69\142\x75\x74\145\40\x4d\x61\x70\x70\x69\156\x67\x20\x64\x65\164\x61\151\x6c\163\x20\x73\141\166\145\x64\40\163\165\x63\x63\145\x73\x73\x66\165\154\154\x79");
        SAMLSPUtilities::mo_saml_show_success_message();
        TY:
        goto k2;
        VT:
        if (mo_saml_is_extension_installed("\x63\165\162\154")) {
            goto Ae;
        }
        update_option("\155\157\x5f\163\141\x6d\154\137\x6d\145\x73\x73\141\x67\145", "\105\122\x52\117\x52\72\x20\x50\x48\120\x20\143\125\x52\x4c\x20\x65\x78\x74\145\x6e\x73\151\x6f\x6e\x20\151\163\40\156\x6f\x74\40\151\x6e\x73\164\x61\x6c\x6c\145\x64\x20\x6f\x72\x20\x64\151\163\141\x62\x6c\x65\144\56\40\x53\141\166\x65\40\111\144\x65\x6e\x74\x69\164\x79\x20\x50\162\157\166\x69\x64\145\162\x20\x43\157\156\146\151\x67\165\x72\x61\164\x69\x6f\x6e\x20\146\x61\151\x6c\145\x64\56");
        SAMLSPUtilities::mo_saml_show_error_message();
        return;
        Ae:
        $Q7 = LicenseHelper::getSelectedEnvironment();
        mo_save_environment_settings($_POST);
        if (!($Q7 and $Q7 != LicenseHelper::getCurrentEnvironment())) {
            goto nj;
        }
        return;
        nj:
        $IC = '';
        $DI = '';
        $Sa = '';
        $Sm = '';
        $h0 = '';
        $Cd = '';
        $DR = '';
        $zn = '';
        $So = '';
        if (empty($_POST["\x73\141\x6d\x6c\137\x69\144\x65\x6e\x74\x69\164\171\x5f\156\x61\x6d\145"]) || empty($_POST["\x73\141\x6d\154\137\x6c\157\x67\151\x6e\137\165\x72\x6c"]) || empty($_POST["\163\141\155\154\137\x69\x73\163\x75\x65\162"]) || empty($_POST["\163\141\x6d\x6c\x5f\x6e\x61\x6d\145\x69\x64\x5f\x66\x6f\162\155\141\x74"])) {
            goto Vh;
        }
        if (!preg_match("\x2f\x5e\x5c\167\x2a\x24\x2f", $_POST["\163\x61\x6d\154\137\151\x64\x65\156\x74\151\x74\x79\137\156\x61\155\145"])) {
            goto Ek;
        }
        $IC = htmlspecialchars(trim($_POST["\x73\141\x6d\154\137\x69\144\145\x6e\x74\151\164\x79\x5f\156\x61\155\x65"]));
        $Sa = htmlspecialchars(trim($_POST["\163\x61\x6d\x6c\x5f\154\157\x67\x69\156\x5f\165\x72\x6c"]));
        if (empty($_POST["\163\141\155\x6c\x5f\x6c\157\x67\151\156\x5f\142\x69\156\x64\151\x6e\x67\x5f\x74\x79\160\145"])) {
            goto XT;
        }
        $DI = htmlspecialchars($_POST["\x73\x61\155\x6c\x5f\x6c\157\x67\x69\x6e\x5f\142\151\x6e\x64\x69\156\x67\137\x74\171\x70\x65"]);
        XT:
        if (empty($_POST["\x73\141\155\x6c\137\x6c\157\x67\x6f\165\x74\137\x62\151\x6e\144\x69\156\x67\137\x74\171\x70\145"])) {
            goto ql;
        }
        $Sm = htmlspecialchars($_POST["\163\141\x6d\x6c\x5f\154\x6f\x67\x6f\165\164\x5f\x62\x69\156\144\x69\156\147\x5f\164\171\160\145"]);
        ql:
        if (empty($_POST["\163\x61\x6d\154\x5f\154\157\147\x6f\x75\x74\137\165\162\154"])) {
            goto qY;
        }
        $h0 = htmlspecialchars(trim($_POST["\163\141\155\154\x5f\154\157\x67\x6f\x75\x74\137\x75\x72\154"]));
        qY:
        $Cd = htmlspecialchars(trim($_POST["\163\141\x6d\154\x5f\151\x73\x73\x75\145\162"]));
        if (empty($_POST["\x6d\x6f\137\x73\141\x6d\154\137\151\144\x65\156\164\x69\164\x79\137\160\x72\x6f\x76\151\x64\145\162\x5f\151\144\x65\156\164\x69\x66\151\x65\x72\x5f\156\141\x6d\145"])) {
            goto tu;
        }
        $cH = htmlspecialchars($_POST["\x6d\x6f\x5f\163\141\155\154\x5f\151\144\145\x6e\x74\x69\x74\171\137\x70\162\x6f\166\x69\x64\145\162\137\151\x64\145\156\x74\151\x66\x69\145\162\137\x6e\x61\x6d\x65"]);
        update_option("\155\157\x5f\x73\x61\155\x6c\x5f\x69\144\x65\x6e\x74\151\164\x79\137\x70\x72\x6f\166\x69\144\x65\162\137\151\144\145\156\x74\x69\x66\x69\x65\x72\137\156\141\155\x65", $cH);
        tu:
        $DR = $_POST["\163\141\155\154\x5f\x78\x35\60\x39\x5f\x63\x65\162\164\x69\x66\x69\143\141\164\x65"];
        $So = htmlspecialchars($_POST["\163\x61\x6d\x6c\137\156\141\x6d\145\x69\144\137\x66\157\162\155\141\x74"]);
        goto Zr;
        Ek:
        update_option("\x6d\157\137\x73\x61\x6d\x6c\x5f\x6d\145\163\163\141\147\145", "\120\x6c\145\141\163\x65\x20\155\x61\164\143\150\x20\164\150\x65\40\x72\145\x71\165\x65\163\x74\x65\144\40\x66\157\162\x6d\x61\x74\x20\x66\157\x72\40\111\x64\x65\x6e\164\x69\x74\171\40\x50\x72\x6f\x76\x69\144\x65\x72\40\x4e\x61\155\145\x2e\x20\x4f\x6e\154\x79\x20\x61\154\x70\150\x61\x62\x65\x74\163\x2c\x20\x6e\x75\155\x62\145\x72\x73\x20\x61\x6e\144\40\x75\x6e\x64\x65\162\163\143\x6f\162\145\40\151\x73\x20\x61\x6c\x6c\x6f\167\x65\x64\56");
        SAMLSPUtilities::mo_saml_show_error_message();
        return;
        Zr:
        goto Wi;
        Vh:
        update_option("\155\157\x5f\x73\141\x6d\x6c\137\x6d\x65\x73\163\141\x67\x65", "\x41\154\x6c\x20\x74\150\x65\x20\x66\151\145\x6c\144\x73\x20\141\x72\145\40\x72\x65\161\165\x69\x72\x65\144\x2e\x20\120\154\145\x61\163\x65\40\x65\x6e\x74\145\162\x20\x76\x61\x6c\x69\144\x20\x65\156\164\162\x69\145\x73\x2e");
        SAMLSPUtilities::mo_saml_show_error_message();
        return;
        Wi:
        update_option("\163\x61\x6d\x6c\137\151\x64\145\156\x74\151\164\171\137\x6e\x61\x6d\x65", $IC);
        update_option("\163\x61\155\x6c\137\154\x6f\x67\x69\156\x5f\142\151\156\x64\x69\156\147\137\x74\x79\160\x65", $DI);
        update_option("\163\x61\x6d\154\137\x6c\157\147\151\x6e\x5f\165\162\x6c", $Sa);
        update_option("\x73\x61\x6d\x6c\137\154\157\147\157\x75\x74\137\x62\151\156\144\x69\156\147\x5f\x74\171\160\x65", $Sm);
        update_option("\163\x61\x6d\154\137\x6c\157\147\x6f\x75\x74\x5f\165\x72\x6c", $h0);
        update_option("\x73\141\155\x6c\x5f\151\x73\x73\165\145\x72", $Cd);
        update_option("\x73\x61\155\154\x5f\156\x61\x6d\x65\x69\x64\137\x66\x6f\162\x6d\x61\164", $So);
        if (isset($_POST["\x73\x61\155\x6c\x5f\x72\x65\x71\165\145\163\164\x5f\163\x69\x67\156\145\x64"])) {
            goto CQ;
        }
        update_option("\163\141\155\154\x5f\x72\x65\x71\x75\x65\163\164\137\x73\x69\x67\x6e\x65\x64", "\165\156\143\x68\x65\x63\153\x65\x64");
        goto vE;
        CQ:
        update_option("\163\x61\155\x6c\137\162\145\161\165\x65\x73\x74\137\x73\x69\147\156\x65\144", "\143\x68\145\x63\153\x65\144");
        vE:
        foreach ($DR as $WO => $cK) {
            if (empty($cK)) {
                goto Jc;
            }
            $DR[$WO] = SAMLSPUtilities::sanitize_certificate($cK);
            if (@openssl_x509_read($DR[$WO])) {
                goto kr;
            }
            update_option("\x6d\x6f\x5f\x73\x61\155\154\x5f\x6d\145\x73\163\x61\x67\x65", "\111\x6e\166\141\x6c\x69\144\40\x63\x65\162\164\151\146\x69\143\141\164\x65\72\x20\x50\154\x65\x61\163\145\40\160\162\157\166\151\x64\145\40\141\40\x76\x61\154\x69\144\x20\143\145\162\164\x69\146\151\x63\141\x74\145\x2e");
            SAMLSPUtilities::mo_saml_show_error_message();
            delete_option("\163\x61\x6d\x6c\x5f\170\x35\60\71\137\x63\x65\x72\164\x69\x66\x69\143\141\x74\x65");
            return;
            kr:
            goto Bj;
            Jc:
            unset($DR[$WO]);
            Bj:
            JD:
        }
        KB:
        if (!empty($DR)) {
            goto EP;
        }
        update_option("\x6d\x6f\137\x73\x61\x6d\x6c\x5f\x6d\145\x73\x73\141\x67\145", "\x49\156\x76\x61\154\151\144\x20\103\x65\162\164\x69\x66\151\143\x61\164\x65\x3a\120\x6c\145\x61\163\145\x20\160\x72\157\166\151\x64\145\40\x61\40\x63\x65\162\164\x69\146\x69\143\141\x74\145");
        SAMLSPUtilities::mo_saml_show_error_message();
        return;
        EP:
        update_option("\163\x61\155\x6c\137\x78\x35\60\x39\137\x63\x65\x72\164\x69\146\x69\x63\141\x74\x65", maybe_serialize($DR));
        if (isset($_POST["\x73\141\x6d\154\137\x72\145\x73\160\157\156\163\x65\137\163\x69\147\x6e\x65\x64"])) {
            goto qe;
        }
        update_option("\x73\141\155\154\137\x72\x65\163\x70\x6f\156\x73\x65\x5f\x73\x69\147\x6e\x65\144", "\x59\145\x73");
        goto Xc;
        qe:
        update_option("\163\x61\155\154\x5f\x72\145\x73\160\157\x6e\x73\x65\x5f\163\x69\x67\x6e\x65\x64", "\143\150\145\x63\153\x65\144");
        Xc:
        if (isset($_POST["\x73\x61\x6d\x6c\137\x61\x73\x73\x65\162\164\x69\157\156\x5f\x73\x69\x67\156\145\144"])) {
            goto ZC;
        }
        update_option("\x73\x61\x6d\154\x5f\141\163\163\x65\x72\164\x69\x6f\156\x5f\163\151\x67\156\145\144", "\131\145\163");
        goto FI;
        ZC:
        update_option("\x73\141\155\x6c\137\x61\x73\163\145\x72\x74\x69\x6f\156\x5f\x73\x69\x67\x6e\x65\x64", "\x63\x68\x65\x63\153\145\x64");
        FI:
        if (isset($_POST["\x6d\157\x5f\x73\x61\155\x6c\137\x65\x6e\x63\x6f\x64\151\x6e\x67\x5f\x65\156\x61\x62\154\x65\144"])) {
            goto Wa;
        }
        update_option("\155\157\137\x73\141\155\x6c\137\x65\156\143\157\x64\151\x6e\147\137\145\x6e\141\x62\x6c\145\x64", "\x75\x6e\143\x68\x65\x63\x6b\x65\144");
        goto io;
        Wa:
        update_option("\x6d\157\137\x73\141\155\x6c\x5f\x65\156\143\157\144\x69\156\x67\x5f\x65\x6e\141\142\x6c\x65\144", "\x63\150\x65\x63\x6b\145\144");
        io:
        update_option("\x6d\x6f\137\163\x61\155\154\137\x6d\145\163\163\141\x67\x65", "\111\x64\x65\x6e\x74\x69\x74\x79\x20\x50\162\157\x76\151\144\145\x72\40\144\x65\164\141\151\154\x73\40\163\x61\x76\145\144\x20\163\x75\x63\x63\145\163\x73\146\x75\x6c\154\x79\x2e");
        SAMLSPUtilities::mo_saml_show_success_message();
        k2:
        if (!self::mo_check_option_admin_referer("\165\x70\147\162\x61\144\145\x5f\x63\x65\162\164")) {
            goto ew;
        }
        $zM = file_get_contents(plugin_dir_path(__FILE__) . "\162\x65\163\157\165\x72\143\145\163" . DIRECTORY_SEPARATOR . "\x6d\151\156\x69\157\x72\x61\x6e\x67\145\x2d\163\x70\x2d\x63\145\162\x74\151\146\151\x63\x61\x74\145\x2e\143\162\x74");
        $z_ = file_get_contents(plugin_dir_path(__FILE__) . "\162\x65\x73\x6f\165\162\143\145\x73" . DIRECTORY_SEPARATOR . "\x6d\x69\156\151\x6f\x72\x61\156\147\145\x2d\163\160\55\143\145\x72\x74\151\x66\151\x63\x61\164\145\x2d\x70\x72\151\166\56\x6b\145\x79");
        update_option("\155\x6f\137\163\x61\x6d\x6c\137\x63\165\162\162\x65\156\x74\x5f\143\x65\162\x74", $zM);
        update_option("\155\x6f\137\x73\x61\x6d\154\x5f\x63\165\x72\162\x65\156\164\x5f\x63\x65\162\164\x5f\x70\x72\151\166\141\164\x65\137\153\145\171", $z_);
        update_option("\x6d\x6f\137\163\x61\x6d\x6c\x5f\143\x65\x72\x74\151\x66\x69\x63\141\x74\145\137\x72\x6f\x6c\x6c\137\x62\x61\143\153\x5f\x61\166\x61\x69\154\141\x62\154\145", true);
        update_option("\x6d\x6f\x5f\x73\141\x6d\x6c\137\155\145\163\163\x61\x67\145", "\103\x65\162\164\x69\x66\x69\x63\141\x74\145\40\x55\160\x67\162\141\144\145\144\40\x73\165\143\143\x65\163\163\146\165\x6c\x6c\171");
        SAMLSPUtilities::mo_saml_show_success_message();
        ew:
        if (!self::mo_check_option_admin_referer("\x72\x6f\x6c\x6c\x62\x61\143\x6b\137\x63\x65\162\164")) {
            goto gy;
        }
        $zM = file_get_contents(plugin_dir_path(__FILE__) . "\x72\145\x73\x6f\x75\x72\143\145\163" . DIRECTORY_SEPARATOR . "\x73\160\55\143\145\162\x74\151\146\x69\x63\141\164\145\x2e\x63\x72\164");
        $z_ = file_get_contents(plugin_dir_path(__FILE__) . "\x72\145\163\x6f\165\x72\x63\x65\x73" . DIRECTORY_SEPARATOR . "\163\160\x2d\153\145\x79\56\153\145\x79");
        update_option("\x6d\157\x5f\163\x61\x6d\154\137\x63\x75\x72\x72\x65\156\164\137\x63\x65\x72\x74", $zM);
        update_option("\x6d\157\x5f\x73\141\x6d\154\137\x63\x75\162\162\145\156\164\137\x63\x65\162\164\x5f\x70\162\151\x76\141\164\145\x5f\153\x65\171", $z_);
        update_option("\155\x6f\x5f\x73\x61\x6d\x6c\137\155\x65\163\163\141\147\145", "\x43\145\x72\x74\x69\x66\x69\143\141\x74\x65\40\x52\157\154\x6c\x2d\142\141\x63\x6b\145\x64\x20\163\x75\143\143\145\163\x73\146\x75\x6c\154\171");
        delete_option("\155\x6f\x5f\x73\x61\x6d\154\137\143\145\x72\164\x69\x66\151\x63\141\x74\x65\x5f\x72\157\x6c\x6c\x5f\x62\x61\x63\x6b\x5f\x61\x76\141\151\x6c\141\142\x6c\x65");
        SAMLSPUtilities::mo_saml_show_success_message();
        gy:
        if (self::mo_check_option_admin_referer("\x61\x64\144\x5f\143\x75\163\164\157\155\x5f\143\x65\162\x74\151\x66\151\x63\x61\x74\x65")) {
            goto oE;
        }
        if (self::mo_check_option_admin_referer("\141\144\144\x5f\143\x75\163\x74\157\155\137\155\145\x73\163\x61\x67\145\x73")) {
            goto Dg;
        }
        if (!self::mo_check_option_admin_referer("\155\x6f\x5f\163\141\155\154\137\162\145\x6c\x61\171\137\x73\x74\x61\164\x65\137\157\x70\x74\x69\x6f\x6e")) {
            goto pL;
        }
        if (isset($_POST["\155\x6f\x5f\x73\141\155\154\x5f\163\x65\156\144\137\x61\x62\163\157\154\165\164\145\137\x72\x65\x6c\x61\171\137\163\164\141\x74\x65"])) {
            goto xy;
        }
        $AW = false;
        goto dg;
        xy:
        $AW = true;
        dg:
        $ap = !empty($_POST["\155\x6f\137\163\x61\155\154\137\x72\145\154\141\x79\x5f\163\x74\141\x74\x65"]) ? htmlspecialchars($_POST["\x6d\x6f\137\x73\x61\x6d\154\x5f\162\145\x6c\x61\x79\137\x73\x74\141\164\145"]) : '';
        $R_ = !empty($_POST["\155\157\137\x73\141\x6d\x6c\x5f\154\x6f\147\x6f\165\164\137\162\145\x6c\141\171\137\x73\x74\141\164\145"]) ? htmlspecialchars($_POST["\155\157\137\163\x61\x6d\x6c\x5f\x6c\x6f\x67\x6f\165\x74\137\x72\145\x6c\141\x79\x5f\163\x74\x61\x74\145"]) : '';
        update_option("\x6d\x6f\x5f\163\141\155\x6c\137\162\x65\x6c\x61\x79\x5f\x73\x74\x61\164\x65", $ap);
        update_option("\155\x6f\x5f\x73\x61\155\x6c\x5f\x6c\157\x67\x6f\165\x74\x5f\x72\x65\154\141\171\137\163\x74\x61\164\145", $R_);
        update_option("\155\157\x5f\163\141\x6d\x6c\x5f\x73\145\156\144\137\x61\x62\163\x6f\x6c\165\164\145\137\162\x65\x6c\141\x79\137\163\164\x61\164\145", $AW);
        update_option("\155\157\x5f\x73\x61\x6d\x6c\137\x6d\x65\x73\x73\x61\x67\145", "\122\x65\x6c\141\171\x20\123\164\141\x74\145\x20\165\160\x64\141\x74\145\144\40\x73\x75\x63\143\x65\x73\163\146\x75\x6c\154\171\56");
        SAMLSPUtilities::mo_saml_show_success_message();
        pL:
        goto M2;
        Dg:
        update_option("\x6d\157\137\163\141\155\x6c\137\141\143\143\157\x75\156\164\137\143\162\x65\141\164\x69\x6f\x6e\137\144\151\163\141\x62\x6c\x65\144\x5f\155\163\147", htmlspecialchars($_POST["\x6d\x6f\137\x73\x61\x6d\x6c\137\141\x63\143\157\x75\x6e\164\x5f\143\162\145\x61\x74\x69\x6f\x6e\137\144\151\x73\141\x62\x6c\x65\144\x5f\x6d\x73\x67"]));
        update_option("\155\x6f\137\163\141\155\154\x5f\x72\x65\163\164\x72\151\x63\164\x65\144\x5f\x64\157\155\141\x69\x6e\x5f\145\162\162\x6f\162\x5f\x6d\x73\x67", htmlspecialchars($_POST["\x6d\x6f\x5f\163\141\x6d\154\x5f\162\x65\x73\x74\162\x69\143\x74\x65\x64\x5f\144\157\155\x61\x69\x6e\x5f\x65\162\x72\x6f\162\137\x6d\163\x67"]));
        update_option("\x6d\157\137\163\x61\x6d\x6c\137\155\x65\x73\163\141\147\x65", "\x43\x6f\156\x66\x69\x67\x75\x72\x61\x74\x69\x6f\x6e\40\150\x61\163\40\x62\145\145\156\x20\x73\x61\166\x65\144\40\x73\165\x63\x63\x65\163\163\146\x75\154\x6c\x79\56");
        SAMLSPUtilities::mo_saml_show_success_message();
        M2:
        goto Y0;
        oE:
        $zM = file_get_contents(plugin_dir_path(__FILE__) . "\x72\145\163\157\165\162\143\x65\163" . DIRECTORY_SEPARATOR . "\x6d\x69\156\151\x6f\x72\141\x6e\x67\145\55\x73\160\x2d\143\145\162\x74\x69\x66\151\143\x61\164\145\x2e\x63\162\164");
        $z_ = file_get_contents(plugin_dir_path(__FILE__) . "\x72\145\163\157\x75\162\x63\x65\163" . DIRECTORY_SEPARATOR . "\155\x69\156\151\x6f\162\141\x6e\x67\x65\x2d\163\160\x2d\143\x65\x72\164\151\146\151\x63\141\164\145\55\x70\x72\x69\166\56\153\145\171");
        if (!empty($_POST["\x73\x75\142\x6d\x69\x74"]) and $_POST["\x73\165\142\x6d\151\164"] == "\125\160\154\x6f\x61\x64") {
            goto PT;
        }
        if (!(!empty($_POST["\163\x75\142\x6d\x69\164"]) and $_POST["\163\x75\142\x6d\151\164"] == "\x52\145\x73\x65\x74")) {
            goto L_;
        }
        delete_option("\155\x6f\x5f\163\x61\155\x6c\x5f\x63\x75\163\164\157\155\137\x63\145\162\x74");
        delete_option("\x6d\157\x5f\x73\141\155\154\137\143\165\x73\x74\157\155\x5f\x63\x65\162\164\x5f\160\162\151\166\141\x74\x65\137\x6b\145\x79");
        update_option("\155\157\137\163\x61\x6d\154\137\143\x75\162\x72\x65\x6e\164\x5f\143\145\x72\164", $zM);
        update_option("\155\157\137\x73\x61\155\x6c\x5f\x63\x75\x72\162\145\x6e\164\x5f\143\x65\x72\164\137\160\x72\x69\166\141\x74\145\137\x6b\x65\171", $z_);
        update_option("\x6d\157\137\163\x61\x6d\154\137\x6d\x65\163\163\141\147\x65", "\x52\145\x73\145\164\x20\x43\145\162\164\x69\146\x69\143\x61\164\x65\40\x73\x75\143\143\145\x73\x73\146\165\154\154\x79\56");
        SAMLSPUtilities::mo_saml_show_success_message();
        L_:
        goto bo;
        PT:
        if (!@openssl_x509_read($_POST["\163\x61\x6d\x6c\137\160\165\142\x6c\x69\x63\x5f\x78\65\x30\71\137\x63\x65\x72\164\151\146\151\x63\x61\x74\145"])) {
            goto TM;
        }
        if (!@openssl_x509_check_private_key($_POST["\163\141\x6d\154\137\x70\x75\142\154\151\x63\x5f\x78\65\x30\x39\x5f\143\145\162\x74\x69\146\151\143\x61\x74\x65"], $_POST["\x73\141\x6d\x6c\x5f\x70\x72\151\166\141\x74\145\x5f\x78\65\60\x39\x5f\143\145\x72\164\x69\146\151\x63\x61\x74\x65"])) {
            goto h_;
        }
        if (openssl_x509_read($_POST["\163\x61\155\154\137\x70\165\142\x6c\x69\x63\x5f\170\x35\60\71\x5f\x63\145\162\x74\x69\x66\151\143\141\x74\145"]) && openssl_x509_check_private_key($_POST["\163\141\x6d\154\x5f\x70\165\142\x6c\x69\x63\x5f\170\x35\60\71\x5f\x63\145\162\164\x69\146\x69\x63\x61\164\145"], $_POST["\163\x61\x6d\154\x5f\160\x72\x69\166\x61\x74\x65\x5f\170\65\60\x39\x5f\x63\145\x72\x74\151\146\151\x63\x61\x74\145"])) {
            goto I2;
        }
        goto j1;
        TM:
        update_option("\155\157\137\163\141\x6d\x6c\x5f\155\145\163\x73\x61\147\145", "\x49\x6e\166\x61\154\151\x64\40\x43\145\x72\x74\151\146\151\143\141\164\x65\40\146\157\x72\x6d\141\x74\56\40\120\x6c\x65\x61\x73\x65\x20\145\x6e\164\145\x72\x20\x61\x20\x76\x61\154\x69\x64\x20\143\145\x72\164\x69\x66\x69\x63\141\x74\x65\56");
        SAMLSPUtilities::mo_saml_show_error_message();
        return;
        goto j1;
        h_:
        update_option("\155\x6f\137\163\141\x6d\x6c\137\x6d\x65\x73\x73\x61\147\145", "\x49\156\166\141\x6c\151\144\x20\x50\162\151\166\141\164\145\40\x4b\145\171\56");
        SAMLSPUtilities::mo_saml_show_error_message();
        return;
        goto j1;
        I2:
        $Ik = $_POST["\x73\141\155\154\x5f\x70\x75\142\154\x69\143\x5f\x78\65\60\x39\137\x63\145\x72\164\151\146\x69\143\141\164\x65"];
        $T9 = $_POST["\x73\x61\155\x6c\x5f\x70\x72\151\166\141\x74\x65\x5f\x78\65\x30\71\137\x63\145\162\164\x69\146\x69\x63\141\164\x65"];
        update_option("\155\x6f\x5f\163\141\155\x6c\137\143\x75\163\x74\157\155\x5f\143\x65\162\164", $Ik);
        update_option("\155\x6f\137\x73\141\x6d\x6c\x5f\143\x75\x73\164\x6f\x6d\x5f\x63\x65\162\164\x5f\160\x72\151\166\x61\164\x65\137\x6b\x65\171", $T9);
        update_option("\155\x6f\137\163\x61\155\154\x5f\x63\165\x72\x72\x65\156\164\x5f\x63\x65\162\x74", $Ik);
        update_option("\x6d\157\x5f\x73\x61\x6d\x6c\x5f\x63\x75\x72\162\145\156\164\137\143\145\162\x74\x5f\160\x72\151\166\x61\x74\145\137\x6b\x65\171", $T9);
        update_option("\x6d\x6f\137\x73\x61\x6d\x6c\x5f\155\x65\x73\x73\141\x67\x65", "\x43\x75\x73\x74\x6f\155\40\x43\145\x72\164\151\146\151\143\x61\x74\145\40\165\160\144\141\x74\145\144\x20\163\x75\143\x63\145\163\163\146\x75\154\x6c\x79\56");
        SAMLSPUtilities::mo_saml_show_success_message();
        j1:
        bo:
        Y0:
        if (self::mo_check_option_admin_referer("\155\x6f\x5f\163\141\155\154\x5f\x77\151\144\x67\145\x74\137\157\160\x74\x69\x6f\x6e")) {
            goto kA;
        }
        if (self::mo_check_option_admin_referer("\x6d\x6f\137\x73\x61\155\154\137\162\x65\147\151\x73\164\x65\162\137\x63\x75\x73\x74\x6f\x6d\145\162")) {
            goto RK;
        }
        if (self::mo_check_option_admin_referer("\155\157\137\163\x61\155\154\137\x76\x61\154\151\144\x61\x74\145\137\157\x74\x70")) {
            goto kW;
        }
        if (self::mo_check_option_admin_referer("\x6d\x6f\x5f\x73\x61\155\x6c\x5f\x76\145\162\151\x66\171\137\143\x75\163\164\157\x6d\145\162")) {
            goto Nr;
        }
        if (self::mo_check_option_admin_referer("\x6d\x6f\x5f\163\x61\x6d\x6c\137\143\157\156\x74\x61\x63\x74\137\165\163\x5f\x71\165\145\x72\171\x5f\x6f\160\x74\x69\x6f\x6e")) {
            goto Bq;
        }
        if (self::mo_check_option_admin_referer("\x6d\x6f\x5f\163\x61\x6d\154\137\162\x65\163\x65\x6e\x64\137\157\164\x70\x5f\145\x6d\x61\151\154")) {
            goto VU;
        }
        if (self::mo_check_option_admin_referer("\155\157\x5f\x73\141\x6d\x6c\137\x72\145\x73\x65\x6e\x64\137\157\x74\x70\x5f\160\x68\x6f\x6e\145")) {
            goto o2;
        }
        if (self::mo_check_option_admin_referer("\x6d\x6f\137\163\x61\x6d\x6c\x5f\147\x6f\x5f\x62\141\143\x6b")) {
            goto O1;
        }
        if (self::mo_check_option_admin_referer("\x6d\157\x5f\x73\x61\x6d\x6c\x5f\162\x65\147\x69\163\x74\x65\162\137\x77\151\164\150\x5f\160\x68\x6f\x6e\145\137\157\x70\x74\x69\x6f\x6e")) {
            goto CX;
        }
        if (self::mo_check_option_admin_referer("\x6d\x6f\x5f\x73\141\155\x6c\137\x72\x65\x67\151\163\164\145\x72\145\144\137\157\156\x6c\x79\137\141\143\143\x65\x73\x73\x5f\157\160\x74\151\157\156")) {
            goto Hj;
        }
        if (self::mo_check_option_admin_referer("\x6d\x6f\x5f\163\141\x6d\x6c\137\162\145\144\151\162\145\x63\164\137\164\x6f\137\167\x70\137\154\157\x67\x69\x6e\137\157\x70\x74\151\157\156")) {
            goto MK;
        }
        if (self::mo_check_option_admin_referer("\155\157\137\x73\x61\155\x6c\137\x66\x6f\x72\143\x65\x5f\141\x75\x74\150\x65\x6e\x74\151\143\x61\x74\151\157\x6e\x5f\x6f\x70\x74\151\157\156")) {
            goto g6;
        }
        if (self::mo_check_option_admin_referer("\x6d\x6f\137\x73\x61\155\154\x5f\145\x6e\x61\142\x6c\x65\137\x72\x73\163\x5f\141\143\143\x65\163\163\137\157\x70\164\151\x6f\156")) {
            goto Rf;
        }
        if (self::mo_check_option_admin_referer("\155\x6f\137\163\x61\x6d\x6c\x5f\145\156\x61\142\x6c\145\137\154\157\147\151\x6e\x5f\162\x65\x64\x69\162\x65\x63\164\x5f\x6f\160\164\x69\157\156")) {
            goto sC;
        }
        if (self::mo_check_option_admin_referer("\x6d\x6f\x5f\x73\x61\155\154\x5f\x61\x64\144\x5f\163\x73\157\137\x62\165\164\x74\x6f\x6e\137\x77\160\137\157\x70\164\x69\x6f\x6e")) {
            goto Ig;
        }
        if (self::mo_check_option_admin_referer("\155\157\x5f\x73\141\x6d\154\137\165\x73\x65\137\142\x75\164\x74\x6f\x6e\137\x61\x73\137\x73\150\x6f\x72\x74\x63\x6f\x64\145\137\157\x70\164\x69\157\x6e")) {
            goto us;
        }
        if (self::mo_check_option_admin_referer("\155\x6f\137\x73\x61\155\154\x5f\165\x73\x65\x5f\142\165\x74\164\157\156\x5f\x61\163\137\167\x69\144\147\145\164\137\x6f\x70\164\x69\157\156")) {
            goto Bp;
        }
        if (self::mo_check_option_admin_referer("\155\157\137\x73\141\155\154\x5f\x61\x6c\154\157\x77\x5f\167\160\137\x73\151\x67\156\x69\x6e\x5f\x6f\160\x74\x69\157\156")) {
            goto du;
        }
        if (self::mo_check_option_admin_referer("\x6d\x6f\x5f\163\x61\x6d\154\137\x63\165\x73\164\x6f\155\137\142\x75\164\x74\157\x6e\x5f\157\160\x74\151\x6f\156")) {
            goto HY;
        }
        if (self::mo_check_option_admin_referer("\155\x6f\x5f\163\141\155\x6c\x5f\x66\157\x72\x67\x6f\x74\137\x70\x61\163\163\167\157\162\x64\137\146\x6f\x72\x6d\137\157\x70\x74\x69\x6f\156")) {
            goto fT;
        }
        if (self::mo_check_option_admin_referer("\x6d\x6f\x5f\163\x61\155\x6c\x5f\166\145\162\151\146\x79\x5f\x6c\x69\x63\145\156\x73\145")) {
            goto D8;
        }
        if (self::mo_check_option_admin_referer("\x6d\x6f\x5f\x73\141\155\154\137\143\x68\x65\x63\153\137\154\151\143\x65\x6e\163\x65")) {
            goto BD;
        }
        if (!self::mo_check_option_admin_referer("\x6d\157\x5f\x73\141\155\154\x5f\x72\x65\155\157\166\145\137\141\143\x63\157\165\156\x74")) {
            goto uA;
        }
        $this->mo_sso_saml_deactivate();
        add_option("\x6d\157\137\163\x61\x6d\154\137\162\145\x67\x69\x73\164\x72\141\x74\x69\157\x6e\137\163\164\141\x74\x75\x73", "\162\x65\155\x6f\x76\145\144\x5f\141\x63\x63\157\x75\x6e\164");
        $of = add_query_arg(array("\x74\x61\142" => "\154\x6f\147\x69\x6e"), $_SERVER["\122\105\121\125\x45\123\124\137\x55\122\111"]);
        header("\x4c\x6f\143\141\x74\151\x6f\x6e\x3a\x20" . $of);
        uA:
        goto IU;
        BD:
        LicenseHelper::migrateExistingEnvironments();
        $K_ = new Customersaml();
        $WO = get_option("\x6d\x6f\137\163\x61\155\154\x5f\x63\x75\x73\x74\x6f\x6d\x65\162\x5f\164\x6f\x6b\145\156");
        $wC = AESEncryption::decrypt_data(get_option("\163\155\154\137\154\x6b"), $WO);
        $k0 = "\131\x6f\165\x20\150\x61\166\145\40\x73\165\143\x63\145\163\163\146\165\x6c\x6c\x79\x20\x75\x70\x64\x61\x74\145\144\40\x79\157\165\x72\40\154\x69\143\145\x6e\x73\145\x20\x64\x65\164\x61\151\154\x73\56";
        $this->djkasjdksaduwaj($wC, $K_, $k0);
        IU:
        goto j0;
        D8:
        if (!empty($_POST["\x73\x61\x6d\x6c\x5f\x6c\151\143\145\x6e\x63\145\x5f\153\145\171"])) {
            goto GC;
        }
        update_option("\155\x6f\137\x73\x61\x6d\154\137\155\x65\x73\x73\x61\147\x65", "\101\x6c\154\x20\164\x68\145\x20\146\x69\145\x6c\x64\x73\40\141\x72\x65\40\x72\145\x71\165\x69\162\145\144\56\x20\x50\x6c\x65\x61\163\x65\40\x65\x6e\x74\145\162\40\x76\141\x6c\x69\x64\40\x6c\x69\x63\145\x6e\163\145\x20\x6b\145\x79\56");
        SAMLSPUtilities::mo_saml_show_error_message();
        return;
        GC:
        $wC = htmlspecialchars(trim($_POST["\x73\x61\x6d\154\137\x6c\x69\143\x65\156\x63\145\137\x6b\x65\171"]));
        $K_ = new Customersaml();
        $k0 = "\x59\157\165\162\x20\x6c\x69\x63\145\156\163\145\40\x69\x73\40\166\x65\162\x69\146\151\145\x64\x2e\x20\131\157\165\40\143\x61\x6e\40\156\x6f\167\40\163\x65\x74\165\160\40\164\x68\x65\40\x70\154\165\147\x69\156\x2e";
        $this->djkasjdksaduwaj($wC, $K_, $k0);
        j0:
        goto Ud;
        fT:
        if (mo_saml_is_extension_installed("\x63\165\162\x6c")) {
            goto eC;
        }
        update_option("\x6d\157\x5f\x73\141\155\x6c\x5f\x6d\145\x73\163\141\x67\145", "\105\122\122\117\x52\72\40\x50\x48\120\x20\x63\125\x52\114\40\x65\170\x74\x65\156\x73\151\x6f\x6e\40\x69\163\x20\156\157\x74\x20\x69\x6e\x73\164\x61\x6c\x6c\145\x64\40\x6f\162\x20\144\x69\x73\x61\x62\154\145\144\x2e\40\x52\145\x73\145\156\144\x20\x4f\124\x50\x20\x66\141\x69\x6c\x65\x64\56");
        SAMLSPUtilities::mo_saml_show_error_message();
        return;
        eC:
        $mg = get_option("\x6d\x6f\x5f\x73\x61\155\x6c\137\141\144\x6d\x69\156\x5f\145\155\x61\151\x6c");
        $K_ = new Customersaml();
        $q1 = $K_->mo_saml_forgot_password($mg);
        if ($q1) {
            goto N3;
        }
        return;
        N3:
        $q1 = json_decode($q1, true);
        if (strcasecmp($q1["\x73\164\x61\x74\165\x73"], "\123\125\103\103\x45\x53\x53") == 0) {
            goto ZP;
        }
        update_option("\155\x6f\137\163\141\155\154\x5f\155\x65\163\x73\141\x67\x65", "\101\x6e\x20\145\x72\162\x6f\x72\x20\x6f\x63\x63\x75\x72\145\144\x20\167\150\x69\x6c\x65\40\160\x72\x6f\x63\x65\x73\163\151\156\147\40\x79\157\x75\x72\x20\162\145\161\x75\145\x73\164\56\x20\120\x6c\145\141\163\x65\40\124\x72\x79\x20\x61\x67\x61\x69\156\56");
        SAMLSPUtilities::mo_saml_show_error_message();
        goto He;
        ZP:
        update_option("\x6d\x6f\137\x73\x61\155\154\137\x6d\145\x73\x73\x61\x67\145", "\131\x6f\x75\x72\x20\x70\x61\x73\x73\x77\157\162\x64\x20\x68\x61\x73\40\142\145\145\156\40\162\x65\163\145\164\40\163\x75\x63\143\x65\163\163\x66\x75\154\x6c\x79\56\x20\120\154\145\x61\x73\x65\x20\145\156\x74\x65\x72\40\x74\x68\x65\x20\x6e\145\167\40\160\x61\x73\x73\x77\x6f\162\144\40\x73\145\x6e\164\x20\164\x6f\x20" . $mg . "\56");
        SAMLSPUtilities::mo_saml_show_success_message();
        He:
        Ud:
        goto d2;
        HY:
        $Xt = '';
        $wD = '';
        $dz = '';
        $OC = '';
        $TJ = '';
        $id = '';
        $BB = '';
        $xP = '';
        $ZW = '';
        $uo = '';
        $SQ = "\x61\142\x6f\x76\145";
        if (empty($_POST["\x6d\157\137\x73\141\x6d\154\137\142\165\x74\x74\157\156\x5f\163\x69\172\145"])) {
            goto Ks;
        }
        $dz = htmlspecialchars($_POST["\155\x6f\x5f\x73\x61\155\154\137\x62\x75\164\x74\157\156\137\x73\151\x7a\x65"]);
        Ks:
        if (empty($_POST["\x6d\157\137\163\x61\x6d\154\137\142\x75\164\164\157\x6e\137\x77\151\144\x74\150"])) {
            goto s8;
        }
        $OC = htmlspecialchars($_POST["\x6d\157\x5f\x73\x61\x6d\154\x5f\142\x75\164\x74\157\156\x5f\x77\151\144\x74\150"]);
        s8:
        if (empty($_POST["\155\x6f\x5f\x73\141\x6d\x6c\137\142\x75\x74\x74\x6f\156\137\x68\145\x69\147\150\x74"])) {
            goto yE;
        }
        $TJ = htmlspecialchars($_POST["\x6d\157\137\x73\141\x6d\154\137\x62\x75\164\164\x6f\156\x5f\x68\145\151\x67\150\x74"]);
        yE:
        if (empty($_POST["\x6d\x6f\137\x73\141\155\154\137\x62\165\x74\164\x6f\x6e\x5f\x63\x75\x72\x76\x65"])) {
            goto cU;
        }
        $id = htmlspecialchars($_POST["\x6d\157\x5f\x73\x61\155\x6c\x5f\x62\x75\x74\x74\x6f\x6e\x5f\x63\x75\162\x76\x65"]);
        cU:
        if (empty($_POST["\x6d\157\137\x73\141\155\x6c\137\142\x75\164\164\157\156\137\x63\157\154\157\x72"])) {
            goto sb;
        }
        $BB = htmlspecialchars($_POST["\x6d\x6f\137\x73\x61\155\154\137\142\x75\164\x74\157\x6e\137\x63\157\x6c\x6f\162"]);
        sb:
        if (empty($_POST["\x6d\157\x5f\163\141\x6d\x6c\x5f\142\165\164\164\x6f\156\137\x74\150\145\x6d\x65"])) {
            goto g0;
        }
        $Xt = htmlspecialchars($_POST["\x6d\157\137\163\141\155\x6c\x5f\142\x75\164\x74\x6f\x6e\137\x74\150\145\x6d\145"]);
        g0:
        if (empty($_POST["\x6d\157\137\163\141\x6d\154\137\142\x75\164\x74\x6f\x6e\x5f\164\x65\x78\x74"])) {
            goto T0;
        }
        $xP = htmlspecialchars($_POST["\x6d\x6f\x5f\x73\x61\155\154\x5f\142\x75\164\164\x6f\156\137\x74\145\170\x74"]);
        if (!(empty($xP) || $xP == "\x4c\157\147\151\x6e")) {
            goto nt;
        }
        $xP = "\114\157\x67\151\156";
        nt:
        $xF = LicenseHelper::getCurrentOption(mo_options_enum_service_provider::Identity_name);
        $xP = str_replace("\x23\43\x49\104\x50\x23\43", $xF, $xP);
        T0:
        if (empty($_POST["\155\x6f\x5f\163\141\x6d\x6c\137\146\x6f\156\164\137\143\x6f\x6c\157\162"])) {
            goto rp;
        }
        $ZW = htmlspecialchars($_POST["\155\157\137\163\141\155\x6c\137\x66\x6f\156\164\x5f\x63\157\x6c\157\x72"]);
        rp:
        if (empty($_POST["\x6d\157\137\163\x61\155\154\x5f\146\x6f\156\x74\137\x73\151\172\145"])) {
            goto c7;
        }
        $uo = htmlspecialchars($_POST["\155\157\x5f\x73\x61\155\x6c\137\146\157\156\x74\x5f\163\151\x7a\x65"]);
        c7:
        if (empty($_POST["\163\163\x6f\x5f\x62\x75\x74\x74\157\x6e\137\x6c\x6f\147\151\156\x5f\x66\x6f\x72\x6d\x5f\160\x6f\x73\151\x74\x69\157\x6e"])) {
            goto ow;
        }
        $SQ = htmlspecialchars($_POST["\163\163\x6f\137\142\165\164\164\x6f\x6e\137\154\157\147\151\x6e\x5f\x66\157\x72\155\x5f\x70\x6f\163\x69\164\151\157\156"]);
        ow:
        update_option("\x6d\157\137\163\x61\x6d\x6c\137\x62\165\x74\164\x6f\x6e\x5f\164\150\x65\x6d\x65", $Xt);
        update_option("\155\x6f\x5f\x73\x61\155\154\137\x62\165\164\164\x6f\156\x5f\x73\x69\x7a\x65", $dz);
        update_option("\x6d\x6f\137\x73\141\155\154\x5f\x62\165\x74\x74\157\156\137\167\151\144\164\x68", $OC);
        update_option("\155\157\137\163\x61\155\154\137\x62\x75\x74\164\x6f\156\x5f\150\x65\x69\x67\150\164", $TJ);
        update_option("\155\x6f\x5f\x73\x61\155\154\137\142\165\x74\164\157\156\x5f\x63\x75\x72\x76\145", $id);
        update_option("\x6d\157\x5f\x73\x61\155\154\x5f\x62\165\164\164\157\156\x5f\143\x6f\154\157\x72", $BB);
        update_option("\x6d\157\137\x73\141\155\x6c\x5f\x62\165\x74\164\x6f\x6e\x5f\x74\145\x78\x74", $xP);
        update_option("\155\x6f\x5f\163\x61\155\154\x5f\x66\157\156\164\x5f\143\157\154\x6f\162", $ZW);
        update_option("\155\x6f\137\x73\141\155\x6c\x5f\146\157\156\164\x5f\x73\151\x7a\145", $uo);
        update_option("\163\x73\157\137\x62\165\164\164\157\156\x5f\x6c\x6f\147\151\156\137\146\157\162\x6d\x5f\160\x6f\x73\x69\x74\x69\157\x6e", $SQ);
        update_option("\x6d\157\137\163\141\x6d\x6c\137\155\x65\163\163\141\147\x65", "\x53\x69\x67\156\40\111\x6e\40\163\145\164\164\x69\156\x67\x73\40\165\160\x64\141\x74\x65\144\x2e");
        SAMLSPUtilities::mo_saml_show_success_message();
        d2:
        goto eo;
        du:
        $uL = "\x66\x61\154\163\145";
        if (!empty($_POST["\155\x6f\137\x73\x61\155\x6c\x5f\x61\154\x6c\x6f\167\137\167\160\x5f\x73\151\x67\x6e\x69\x6e"])) {
            goto wG;
        }
        $w8 = "\x66\141\x6c\x73\x65";
        goto Ho;
        wG:
        $w8 = htmlspecialchars($_POST["\155\x6f\x5f\x73\x61\155\x6c\x5f\x61\154\x6c\157\x77\x5f\167\160\x5f\x73\x69\147\156\151\x6e"]);
        Ho:
        if ($w8 == "\x74\x72\165\x65") {
            goto lD;
        }
        update_option("\x6d\157\137\163\x61\155\x6c\137\141\154\x6c\x6f\x77\x5f\x77\160\x5f\163\x69\x67\x6e\x69\x6e", '');
        goto sh;
        lD:
        update_option("\x6d\157\137\163\141\155\x6c\x5f\141\x6c\x6c\x6f\x77\x5f\x77\160\137\x73\151\147\x6e\151\x6e", "\x74\x72\165\145");
        if (empty($_POST["\155\157\137\x73\x61\x6d\154\137\x62\141\x63\153\x64\157\157\162\x5f\x75\162\x6c"])) {
            goto kK;
        }
        $uL = htmlspecialchars(trim($_POST["\155\157\137\163\x61\x6d\x6c\137\142\x61\x63\153\144\x6f\x6f\x72\x5f\x75\162\x6c"]));
        kK:
        sh:
        update_option("\x6d\x6f\137\x73\141\x6d\x6c\x5f\142\x61\143\153\144\x6f\157\162\x5f\x75\x72\154", $uL);
        update_option("\x6d\157\x5f\163\x61\155\x6c\137\155\145\x73\163\x61\147\145", "\123\x69\147\x6e\40\111\x6e\40\163\145\164\x74\x69\x6e\147\163\40\165\x70\144\x61\164\x65\144\56");
        SAMLSPUtilities::mo_saml_show_success_message();
        eo:
        goto iI;
        Bp:
        if (mo_saml_is_sp_configured()) {
            goto wj;
        }
        update_option("\x6d\157\x5f\x73\x61\155\154\137\155\145\x73\163\x61\147\145", "\120\154\x65\x61\x73\x65\x20\143\157\x6d\x70\154\145\164\x65\40" . addLink("\x53\x65\162\x76\x69\143\145\x20\120\x72\157\x76\151\144\x65\162", add_query_arg(array("\x74\x61\x62" => "\163\x61\x76\145"), $_SERVER["\122\x45\x51\x55\105\x53\x54\x5f\x55\x52\111"])) . "\40\143\x6f\x6e\146\151\147\165\162\141\x74\x69\x6f\x6e\x20\146\x69\x72\163\x74\x2e");
        SAMLSPUtilities::mo_saml_show_error_message();
        goto F5;
        wj:
        if (!empty($_POST["\x6d\x6f\137\x73\x61\155\154\137\x75\x73\145\x5f\142\165\x74\164\157\156\x5f\x61\163\137\167\x69\x64\x67\x65\x74"])) {
            goto OB;
        }
        $Ci = "\x66\x61\154\x73\145";
        goto HG;
        OB:
        $Ci = htmlspecialchars($_POST["\155\157\137\163\141\x6d\154\137\165\x73\145\x5f\x62\x75\x74\x74\x6f\x6e\137\x61\163\137\x77\x69\144\147\145\x74"]);
        HG:
        update_option("\155\157\137\163\141\x6d\154\137\x75\163\x65\137\x62\x75\x74\164\x6f\156\x5f\x61\163\137\167\151\144\147\145\164", $Ci);
        update_option("\155\157\x5f\163\141\x6d\x6c\x5f\155\x65\x73\x73\141\147\145", "\123\151\x67\x6e\x20\151\156\x20\x6f\x70\x74\151\157\156\163\x20\x75\160\x64\141\164\145\x64\56");
        SAMLSPUtilities::mo_saml_show_success_message();
        F5:
        iI:
        goto vL;
        us:
        if (mo_saml_is_sp_configured()) {
            goto kD;
        }
        update_option("\155\157\137\x73\x61\x6d\154\x5f\155\145\x73\x73\141\147\x65", "\120\154\x65\141\x73\x65\x20\143\157\x6d\x70\x6c\145\x74\145\x20" . addLink("\123\145\x72\x76\x69\143\145\40\120\162\x6f\166\151\x64\x65\162", add_query_arg(array("\164\141\142" => "\163\141\x76\145"), $_SERVER["\x52\105\121\x55\105\x53\x54\137\125\122\111"])) . "\40\x63\157\x6e\146\x69\x67\x75\162\141\164\x69\x6f\x6e\x20\x66\151\x72\163\x74\x2e");
        SAMLSPUtilities::mo_saml_show_error_message();
        goto lL;
        kD:
        if (!empty($_POST["\x6d\157\x5f\163\141\155\x6c\x5f\165\163\x65\x5f\x62\x75\x74\x74\x6f\x6e\137\141\163\137\163\150\157\x72\164\143\x6f\x64\145"])) {
            goto S6;
        }
        $Ci = "\x66\x61\154\x73\x65";
        goto kU;
        S6:
        $Ci = htmlspecialchars($_POST["\155\x6f\137\163\141\155\154\137\165\163\x65\x5f\142\165\164\164\x6f\156\x5f\x61\163\137\163\x68\157\x72\x74\143\x6f\144\145"]);
        kU:
        update_option("\155\157\137\x73\141\x6d\x6c\137\165\x73\145\137\142\165\x74\164\x6f\156\137\141\163\137\x73\x68\157\x72\164\x63\x6f\x64\145", $Ci);
        update_option("\x6d\x6f\x5f\x73\x61\x6d\x6c\137\x6d\145\x73\x73\x61\x67\x65", "\123\151\147\x6e\x20\151\x6e\x20\x6f\x70\x74\x69\x6f\x6e\x73\x20\165\160\144\x61\x74\x65\x64\56");
        SAMLSPUtilities::mo_saml_show_success_message();
        lL:
        vL:
        goto D6;
        Ig:
        if (mo_saml_is_sp_configured()) {
            goto Ma;
        }
        update_option("\x6d\x6f\137\163\141\155\x6c\137\x6d\145\163\x73\141\x67\x65", "\x50\x6c\145\141\163\145\40\x63\157\155\x70\154\145\x74\x65\40" . addLink("\123\x65\162\x76\151\x63\x65\x20\120\x72\x6f\166\x69\x64\145\162", add_query_arg(array("\x74\x61\142" => "\163\141\x76\x65"), $_SERVER["\x52\x45\121\x55\x45\123\124\137\125\122\x49"])) . "\x20\x63\157\x6e\146\x69\147\x75\162\141\164\151\157\156\40\146\151\x72\163\x74\56");
        SAMLSPUtilities::mo_saml_show_error_message();
        goto i_;
        Ma:
        if (!empty($_POST["\155\x6f\x5f\163\x61\x6d\x6c\x5f\141\144\144\137\163\163\x6f\x5f\142\x75\164\164\157\x6e\x5f\167\160"])) {
            goto vR;
        }
        $rp = "\146\141\x6c\163\x65";
        goto tM;
        vR:
        $rp = htmlspecialchars($_POST["\155\x6f\x5f\163\141\x6d\154\137\x61\x64\x64\x5f\x73\163\157\x5f\x62\165\164\164\x6f\x6e\x5f\167\160"]);
        tM:
        update_option("\x6d\157\x5f\163\141\155\x6c\137\141\x64\144\137\x73\163\157\137\x62\x75\164\x74\x6f\156\x5f\x77\x70", $rp);
        update_option("\x6d\157\137\163\141\155\154\x5f\x6d\145\163\163\141\147\x65", "\x53\151\x67\156\40\151\x6e\40\x6f\x70\x74\151\157\156\163\40\x75\x70\x64\141\x74\145\144\x2e");
        SAMLSPUtilities::mo_saml_show_success_message();
        i_:
        D6:
        goto RE;
        sC:
        if (mo_saml_is_sp_configured()) {
            goto Ym;
        }
        update_option("\x6d\157\x5f\163\141\x6d\154\x5f\x6d\x65\163\163\x61\147\x65", "\x50\154\145\141\x73\145\x20\x63\x6f\x6d\160\x6c\145\x74\145\40" . addLink("\x53\x65\162\166\x69\x63\145\40\120\162\x6f\166\151\x64\145\162", add_query_arg(array("\x74\x61\x62" => "\163\141\x76\x65"), $_SERVER["\x52\105\121\x55\x45\123\x54\x5f\x55\x52\111"])) . "\40\143\x6f\x6e\x66\151\147\165\x72\141\x74\151\157\x6e\x20\146\x69\162\x73\x74\56");
        SAMLSPUtilities::mo_saml_show_error_message();
        goto zP;
        Ym:
        if (!empty($_POST["\155\x6f\137\x73\x61\155\154\137\145\156\x61\142\154\x65\137\154\x6f\x67\x69\156\x5f\x72\x65\144\151\x72\145\143\164"])) {
            goto eJ;
        }
        $A8 = "\146\x61\x6c\163\145";
        goto Ln;
        eJ:
        $A8 = htmlspecialchars($_POST["\x6d\x6f\x5f\x73\141\155\x6c\x5f\x65\x6e\141\x62\154\x65\x5f\x6c\x6f\147\151\x6e\137\x72\x65\x64\x69\x72\145\143\164"]);
        Ln:
        if ($A8 == "\x74\x72\x75\x65") {
            goto GX;
        }
        update_option("\155\x6f\x5f\163\141\x6d\x6c\x5f\145\156\141\x62\154\x65\x5f\154\157\x67\151\x6e\x5f\162\145\144\x69\x72\145\143\164", '');
        update_option("\155\x6f\x5f\163\x61\x6d\x6c\137\x61\154\154\x6f\167\137\167\160\137\163\151\147\x6e\151\156", '');
        goto aK;
        GX:
        update_option("\155\157\x5f\163\x61\155\x6c\137\145\156\141\142\154\145\137\154\x6f\147\x69\x6e\x5f\162\x65\144\151\162\145\x63\x74", "\x74\x72\x75\145");
        update_option("\x6d\x6f\137\x73\141\155\154\137\x61\x6c\x6c\x6f\167\137\167\160\137\x73\151\147\156\151\x6e", "\x74\162\165\x65");
        aK:
        update_option("\x6d\157\137\163\x61\155\154\137\x6d\145\163\x73\141\147\x65", "\x53\151\147\156\x20\x69\x6e\x20\x6f\160\x74\151\x6f\156\163\40\x75\160\x64\141\x74\145\x64\x2e");
        SAMLSPUtilities::mo_saml_show_success_message();
        zP:
        RE:
        goto n2;
        Rf:
        if (mo_saml_is_sp_configured()) {
            goto cJ;
        }
        update_option("\x6d\x6f\x5f\163\x61\x6d\x6c\137\155\x65\x73\x73\141\x67\145", "\x50\154\145\x61\x73\x65\x20\x63\157\155\x70\154\x65\x74\x65\40" . addLink("\123\x65\x72\x76\x69\143\145\x20\x50\x72\x6f\x76\151\144\x65\x72", add_query_arg(array("\x74\141\x62" => "\163\x61\166\x65"), $_SERVER["\122\105\x51\125\x45\123\x54\x5f\125\122\x49"])) . "\40\x63\157\x6e\x66\x69\x67\x75\162\141\164\151\x6f\156\40\x66\151\162\163\164\56");
        SAMLSPUtilities::mo_saml_show_error_message();
        goto ik;
        cJ:
        if (!empty($_POST["\x6d\157\137\x73\141\x6d\x6c\137\x65\x6e\x61\142\154\145\137\x72\x73\x73\x5f\141\x63\143\145\163\163"])) {
            goto TE;
        }
        $RZ = false;
        goto E0;
        TE:
        $RZ = htmlspecialchars($_POST["\x6d\157\137\x73\141\155\x6c\137\x65\x6e\141\142\154\x65\x5f\162\x73\163\x5f\141\x63\143\145\x73\163"]);
        E0:
        if ($RZ == "\x74\x72\165\x65") {
            goto XS;
        }
        update_option("\x6d\157\137\163\x61\x6d\x6c\137\145\156\x61\142\154\x65\x5f\162\163\x73\137\x61\143\143\145\163\163", '');
        goto Um;
        XS:
        update_option("\155\x6f\x5f\x73\141\x6d\x6c\137\x65\x6e\141\x62\154\145\137\162\163\163\137\141\143\x63\145\x73\163", "\164\x72\165\x65");
        Um:
        update_option("\x6d\157\137\163\x61\x6d\x6c\x5f\155\145\x73\x73\141\x67\145", "\x52\123\x53\x20\x46\x65\x65\x64\x20\x6f\160\164\x69\x6f\x6e\x20\165\x70\x64\141\x74\145\144\x2e");
        SAMLSPUtilities::mo_saml_show_success_message();
        ik:
        n2:
        goto E_;
        g6:
        if (mo_saml_is_sp_configured()) {
            goto Zs;
        }
        update_option("\155\157\137\x73\x61\x6d\154\x5f\155\145\163\163\141\147\145", "\x50\x6c\x65\x61\163\145\x20\143\157\155\160\154\x65\x74\145\40" . addLink("\x53\145\x72\166\151\143\x65\40\x50\x72\x6f\x76\151\x64\x65\x72", add_query_arg(array("\164\x61\x62" => "\163\x61\166\x65"), $_SERVER["\x52\x45\x51\125\105\x53\x54\137\x55\122\x49"])) . "\x20\143\157\156\146\151\x67\165\162\x61\164\151\157\x6e\x20\146\151\x72\163\164\x2e");
        SAMLSPUtilities::mo_saml_show_error_message();
        goto qP;
        Zs:
        if (!empty($_POST["\x6d\157\137\163\141\155\154\137\x66\157\162\x63\145\x5f\141\x75\x74\x68\145\156\x74\x69\143\x61\164\151\157\x6e"])) {
            goto ec;
        }
        $A8 = "\146\x61\154\163\x65";
        goto SB;
        ec:
        $A8 = htmlspecialchars($_POST["\x6d\157\x5f\x73\141\155\x6c\137\x66\x6f\x72\x63\x65\137\x61\165\164\x68\x65\156\x74\x69\143\x61\x74\x69\157\156"]);
        SB:
        if ($A8 == "\164\162\x75\145") {
            goto ov;
        }
        update_option("\x6d\157\137\163\x61\x6d\154\x5f\x66\x6f\162\143\145\x5f\141\x75\164\150\x65\156\x74\x69\x63\x61\164\x69\x6f\156", '');
        goto wQ;
        ov:
        update_option("\x6d\157\137\163\x61\155\x6c\137\x66\x6f\162\x63\145\137\x61\165\164\150\145\x6e\164\151\143\x61\164\151\157\x6e", "\x74\162\165\x65");
        wQ:
        update_option("\x6d\157\137\163\x61\x6d\154\x5f\155\145\163\x73\141\x67\x65", "\x53\151\147\156\x20\151\x6e\x20\x6f\x70\164\151\x6f\156\x73\40\165\160\144\141\164\145\144\x2e");
        SAMLSPUtilities::mo_saml_show_success_message();
        qP:
        E_:
        goto gQ;
        MK:
        if (!mo_saml_is_sp_configured()) {
            goto l2;
        }
        if (!empty($_POST["\155\x6f\x5f\x73\x61\155\154\x5f\x72\145\144\151\x72\145\143\x74\x5f\x74\157\x5f\x77\x70\x5f\x6c\157\x67\x69\x6e"])) {
            goto kT;
        }
        $tW = "\146\141\x6c\x73\145";
        goto hd;
        kT:
        $tW = htmlspecialchars($_POST["\155\x6f\x5f\x73\141\155\154\x5f\x72\145\144\151\162\145\x63\164\x5f\x74\x6f\137\167\160\x5f\x6c\x6f\147\151\156"]);
        hd:
        update_option("\155\x6f\x5f\163\141\155\154\137\162\x65\144\151\x72\145\x63\x74\137\164\157\137\167\160\137\x6c\x6f\x67\151\156", $tW);
        update_option("\155\x6f\x5f\163\x61\155\x6c\137\x6d\x65\163\x73\x61\147\145", "\123\x69\x67\x6e\x20\x69\x6e\x20\157\160\164\151\157\x6e\x73\40\x75\x70\x64\141\x74\145\144\56");
        SAMLSPUtilities::mo_saml_show_success_message();
        l2:
        gQ:
        goto zJ;
        Hj:
        if (mo_saml_is_sp_configured()) {
            goto mF;
        }
        update_option("\155\157\x5f\x73\x61\x6d\x6c\x5f\x6d\x65\163\x73\141\147\x65", "\x50\x6c\145\141\163\x65\40\x63\157\155\x70\154\145\x74\x65\x20" . addLink("\123\x65\162\x76\x69\143\145\x20\120\x72\157\x76\x69\144\x65\x72", add_query_arg(array("\x74\x61\142" => "\163\141\166\x65"), $_SERVER["\x52\105\121\125\105\x53\124\x5f\x55\x52\x49"])) . "\x20\x63\157\156\146\151\x67\x75\162\x61\164\x69\157\156\x20\146\151\x72\163\164\56");
        SAMLSPUtilities::mo_saml_show_error_message();
        goto A3;
        mF:
        if (!empty($_POST["\x6d\x6f\137\x73\x61\155\154\x5f\162\x65\147\x69\163\x74\145\162\x65\144\x5f\157\156\x6c\171\137\x61\x63\x63\x65\x73\x73"])) {
            goto NP;
        }
        $A8 = "\x66\x61\x6c\163\145";
        goto Fl;
        NP:
        $A8 = htmlspecialchars($_POST["\x6d\x6f\x5f\163\x61\155\154\x5f\x72\x65\x67\x69\x73\164\x65\x72\x65\x64\137\x6f\x6e\154\x79\x5f\141\x63\x63\x65\163\163"]);
        Fl:
        if ($A8 == "\164\162\x75\145") {
            goto kv;
        }
        update_option("\x6d\157\x5f\x73\x61\155\154\137\x72\145\x67\151\163\164\145\x72\145\144\137\x6f\x6e\154\171\x5f\141\x63\x63\145\163\x73", '');
        goto g9;
        kv:
        update_option("\x6d\x6f\137\163\x61\155\x6c\137\162\145\x67\x69\163\164\145\162\145\x64\137\157\x6e\x6c\171\x5f\141\x63\x63\145\x73\163", "\x74\162\165\x65");
        g9:
        update_option("\x6d\x6f\x5f\x73\141\155\x6c\137\155\x65\x73\x73\x61\147\x65", "\x53\151\147\156\40\x69\156\40\157\x70\164\x69\x6f\x6e\x73\x20\165\160\144\141\164\x65\144\x2e");
        SAMLSPUtilities::mo_saml_show_success_message();
        A3:
        zJ:
        goto ky;
        CX:
        if (mo_saml_is_extension_installed("\x63\165\162\x6c")) {
            goto vK;
        }
        update_option("\155\x6f\137\163\141\x6d\154\137\155\145\163\163\141\147\145", "\x45\122\122\117\x52\x3a\40\120\x48\x50\40\143\x55\x52\x4c\x20\x65\170\x74\x65\156\163\151\x6f\156\40\x69\163\x20\156\157\x74\40\151\156\163\164\x61\154\154\145\x64\40\x6f\162\40\144\x69\x73\141\142\x6c\x65\144\56\x20\122\x65\x73\145\x6e\x64\x20\117\124\x50\x20\146\x61\151\154\145\144\x2e");
        SAMLSPUtilities::mo_saml_show_error_message();
        return;
        vK:
        $Ze = htmlspecialchars($_POST["\x70\150\157\156\145"]);
        $Ze = str_replace("\x20", '', $Ze);
        $Ze = str_replace("\x2d", '', $Ze);
        update_option("\155\157\137\x73\141\x6d\x6c\137\141\144\x6d\151\156\x5f\x70\150\x6f\156\x65", $Ze);
        $K_ = new CustomerSaml();
        $q1 = $K_->send_otp_token('', $Ze, FALSE, TRUE);
        if ($q1) {
            goto uW;
        }
        return;
        uW:
        $q1 = json_decode($q1, true);
        if (strcasecmp($q1["\x73\x74\141\164\x75\x73"], "\x53\125\103\x43\105\123\x53") == 0) {
            goto jg;
        }
        update_option("\155\157\137\x73\x61\155\154\x5f\155\x65\x73\x73\x61\147\x65", "\x54\x68\145\x72\x65\x20\x77\141\x73\x20\x61\x6e\x20\145\162\x72\157\x72\x20\x69\x6e\x20\x73\145\x6e\x64\x69\156\x67\40\x53\115\x53\56\40\120\x6c\145\x61\163\x65\40\143\x6c\151\x63\x6b\x20\x6f\x6e\x20\x52\145\163\x65\156\144\x20\x4f\x54\x50\x20\164\157\40\164\x72\x79\40\x61\x67\141\x69\156\x2e");
        update_option("\155\x6f\137\x73\x61\x6d\154\x5f\x72\145\x67\x69\163\164\x72\x61\x74\x69\157\x6e\x5f\x73\164\x61\164\x75\x73", "\x4d\x4f\x5f\117\124\120\137\x44\105\114\111\126\105\x52\105\104\137\x46\x41\x49\114\125\x52\105\x5f\x50\x48\x4f\x4e\105");
        SAMLSPUtilities::mo_saml_show_error_message();
        goto IY;
        jg:
        update_option("\155\x6f\137\x73\x61\x6d\154\137\x6d\x65\x73\x73\x61\147\x65", "\x20\x41\40\157\156\145\x20\x74\x69\155\145\x20\160\x61\163\163\143\x6f\144\x65\40\x69\163\x20\x73\145\x6e\x74\40\x74\x6f\40" . get_option("\155\x6f\137\163\141\155\x6c\137\x61\144\155\151\x6e\137\x70\x68\157\156\x65") . "\x2e\x20\x50\154\145\x61\163\x65\40\145\156\164\x65\x72\x20\x74\150\145\40\157\164\x70\40\x68\x65\x72\145\x20\164\157\x20\x76\145\162\151\x66\x79\40\171\157\165\x72\x20\x65\155\x61\x69\x6c\x2e");
        update_option("\x6d\x6f\137\163\x61\155\x6c\137\164\x72\x61\156\x73\141\x63\164\151\157\156\111\144", $q1["\164\170\x49\144"]);
        update_option("\155\157\137\x73\x61\x6d\154\137\x72\x65\x67\x69\x73\x74\x72\x61\x74\151\157\x6e\x5f\x73\x74\141\x74\165\163", "\x4d\x4f\137\x4f\x54\x50\x5f\104\105\x4c\x49\x56\105\x52\x45\104\137\123\x55\x43\103\105\x53\123\137\120\x48\117\x4e\x45");
        SAMLSPUtilities::mo_saml_show_success_message();
        IY:
        ky:
        goto sQ;
        O1:
        update_option("\155\x6f\137\163\x61\x6d\x6c\137\x72\145\x67\151\x73\164\x72\141\x74\x69\157\156\x5f\163\x74\141\x74\165\163", '');
        update_option("\155\157\137\x73\x61\155\x6c\137\x76\x65\x72\151\146\171\x5f\x63\x75\x73\164\157\155\x65\162", '');
        delete_option("\x6d\157\137\163\x61\155\x6c\x5f\156\145\x77\137\x72\145\147\x69\163\164\x72\x61\x74\x69\157\156");
        delete_option("\155\x6f\x5f\163\141\155\x6c\137\141\144\x6d\151\x6e\x5f\x65\155\141\x69\x6c");
        delete_option("\x6d\157\137\x73\x61\155\x6c\x5f\x61\144\155\x69\x6e\x5f\160\x68\x6f\x6e\x65");
        delete_site_option("\163\155\154\x5f\x6c\153");
        delete_site_option("\164\x5f\163\151\164\145\x5f\x73\x74\x61\x74\x75\x73");
        delete_site_option("\x73\151\x74\145\x5f\x63\153\x5f\154");
        sQ:
        goto sY;
        o2:
        if (mo_saml_is_extension_installed("\x63\x75\162\154")) {
            goto Z_;
        }
        update_option("\x6d\x6f\137\x73\x61\x6d\x6c\x5f\155\145\x73\x73\x61\x67\x65", "\x45\122\x52\x4f\x52\x3a\40\120\110\120\40\x63\x55\x52\x4c\x20\145\170\x74\145\x6e\163\x69\x6f\156\40\151\163\x20\x6e\157\164\40\151\x6e\x73\x74\x61\154\154\145\x64\x20\157\162\40\144\x69\x73\x61\142\154\145\x64\56\40\x52\145\x73\145\156\144\40\117\124\120\x20\146\141\151\154\x65\144\56");
        SAMLSPUtilities::mo_saml_show_error_message();
        return;
        Z_:
        $Ze = get_option("\x6d\x6f\x5f\163\x61\155\154\x5f\141\144\x6d\x69\156\137\x70\150\157\156\x65");
        $K_ = new CustomerSaml();
        $q1 = $K_->send_otp_token('', $Ze, FALSE, TRUE);
        if ($q1) {
            goto EV;
        }
        return;
        EV:
        $q1 = json_decode($q1, true);
        if (strcasecmp($q1["\163\164\x61\x74\x75\163"], "\123\x55\x43\x43\x45\x53\123") == 0) {
            goto lc;
        }
        update_option("\x6d\157\x5f\163\x61\x6d\x6c\x5f\155\x65\163\163\141\x67\x65", "\124\150\145\162\145\40\x77\x61\x73\40\141\x6e\40\x65\x72\x72\x6f\x72\x20\151\156\40\163\145\156\x64\x69\x6e\x67\x20\145\x6d\141\151\x6c\x2e\40\x50\x6c\145\x61\163\x65\40\x63\x6c\x69\x63\x6b\x20\157\156\40\122\145\x73\x65\156\144\x20\117\124\x50\x20\164\157\40\x74\162\x79\40\141\147\141\x69\156\x2e");
        update_option("\x6d\157\x5f\x73\141\155\154\x5f\162\x65\147\151\163\164\162\141\164\x69\157\x6e\x5f\x73\x74\x61\164\165\x73", "\115\117\x5f\117\x54\x50\x5f\x44\x45\114\111\126\x45\122\x45\104\x5f\106\101\111\x4c\125\x52\105\137\120\110\117\116\105");
        SAMLSPUtilities::mo_saml_show_error_message();
        goto Ll;
        lc:
        update_option("\x6d\157\137\163\x61\x6d\154\137\155\145\163\x73\141\147\145", "\40\x41\40\157\x6e\145\x20\164\x69\155\145\40\160\141\163\x73\x63\157\144\145\x20\151\163\40\x73\x65\156\164\40\x74\x6f\x20" . $Ze . "\40\x61\x67\141\x69\156\x2e\x20\x50\154\145\x61\163\145\40\x63\x68\145\143\x6b\x20\x69\x66\x20\x79\x6f\165\x20\147\x6f\164\40\164\150\145\x20\157\x74\x70\x20\x61\x6e\x64\40\145\156\x74\x65\x72\40\x69\164\x20\x68\145\x72\145\56");
        update_option("\155\157\137\163\x61\155\154\137\x74\x72\141\156\x73\141\143\x74\x69\x6f\156\111\x64", $q1["\164\170\111\x64"]);
        update_option("\155\157\x5f\163\141\x6d\154\137\x72\x65\x67\151\163\x74\162\x61\x74\x69\157\156\x5f\163\164\141\164\165\163", "\115\x4f\x5f\x4f\124\120\137\x44\x45\x4c\x49\126\x45\122\105\104\137\x53\125\x43\x43\x45\123\x53\x5f\120\110\x4f\116\x45");
        SAMLSPUtilities::mo_saml_show_success_message();
        Ll:
        sY:
        goto fl;
        VU:
        if (mo_saml_is_extension_installed("\143\x75\162\x6c")) {
            goto ua;
        }
        update_option("\x6d\157\x5f\163\141\x6d\x6c\x5f\155\x65\x73\x73\x61\x67\x65", "\105\x52\x52\117\x52\x3a\x20\x50\110\x50\x20\x63\125\122\x4c\40\145\x78\164\145\x6e\x73\151\x6f\156\x20\151\163\x20\x6e\x6f\x74\40\x69\x6e\163\164\x61\154\154\145\144\40\x6f\x72\x20\x64\151\x73\141\142\x6c\145\144\56\40\x52\x65\x73\x65\x6e\144\x20\117\124\x50\40\146\141\x69\x6c\145\144\x2e");
        SAMLSPUtilities::mo_saml_show_error_message();
        return;
        ua:
        $mg = get_option("\x6d\x6f\137\163\141\155\x6c\137\141\x64\155\x69\x6e\137\145\155\141\151\154");
        $K_ = new CustomerSaml();
        $q1 = $K_->send_otp_token($mg, '');
        if ($q1) {
            goto Pq;
        }
        return;
        Pq:
        $q1 = json_decode($q1, true);
        if (strcasecmp($q1["\x73\164\x61\164\165\x73"], "\x53\x55\x43\x43\x45\x53\x53") == 0) {
            goto LE;
        }
        update_option("\155\x6f\x5f\x73\x61\x6d\x6c\137\x6d\x65\x73\x73\x61\147\145", "\x54\x68\145\x72\145\x20\167\141\x73\40\141\156\x20\x65\162\162\x6f\x72\x20\x69\156\40\x73\x65\156\144\x69\156\x67\x20\x65\x6d\x61\151\154\x2e\40\x50\x6c\x65\141\x73\x65\40\143\154\151\143\153\x20\x6f\x6e\x20\x52\145\x73\145\x6e\x64\40\117\124\x50\x20\164\157\x20\164\x72\x79\x20\141\x67\141\x69\x6e\x2e");
        update_option("\155\x6f\x5f\163\x61\x6d\154\137\x72\x65\147\151\x73\x74\162\x61\164\151\x6f\156\x5f\x73\x74\x61\164\165\x73", "\115\117\137\x4f\x54\x50\x5f\104\105\114\x49\x56\105\122\x45\104\x5f\106\101\111\x4c\125\x52\x45\x5f\x45\115\101\x49\x4c");
        SAMLSPUtilities::mo_saml_show_error_message();
        goto pT;
        LE:
        update_option("\155\157\137\163\x61\x6d\154\x5f\x6d\x65\x73\x73\141\x67\x65", "\40\x41\x20\x6f\x6e\x65\x20\164\x69\x6d\x65\x20\160\141\163\x73\x63\157\144\x65\x20\x69\163\40\163\x65\x6e\164\40\x74\x6f\x20" . get_option("\155\x6f\137\163\141\155\154\x5f\x61\144\x6d\x69\156\x5f\145\x6d\141\x69\154") . "\x20\141\x67\141\x69\x6e\x2e\x20\x50\x6c\145\x61\163\145\40\x63\x68\145\143\153\40\151\146\40\x79\x6f\x75\x20\x67\157\x74\x20\164\x68\145\x20\x6f\164\160\40\141\156\144\40\145\x6e\x74\x65\162\40\151\x74\40\150\145\162\145\56");
        update_option("\155\157\x5f\x73\x61\x6d\154\137\164\162\x61\156\163\x61\143\x74\151\x6f\156\x49\144", $q1["\x74\x78\x49\x64"]);
        update_option("\x6d\x6f\x5f\163\x61\x6d\154\137\162\x65\147\x69\x73\x74\x72\141\164\x69\157\x6e\x5f\163\164\x61\164\165\x73", "\115\117\x5f\117\124\120\x5f\x44\x45\x4c\x49\126\x45\122\x45\x44\137\x53\x55\x43\x43\x45\x53\x53\137\x45\115\x41\111\114");
        SAMLSPUtilities::mo_saml_show_success_message();
        pT:
        fl:
        goto jk;
        Bq:
        if (mo_saml_is_extension_installed("\143\165\x72\154")) {
            goto z4;
        }
        update_option("\x6d\x6f\137\x73\x61\155\154\x5f\155\145\163\x73\141\x67\145", "\105\x52\122\117\x52\72\40\120\x48\x50\40\143\x55\122\x4c\x20\145\x78\164\145\156\x73\x69\x6f\x6e\40\x69\163\x20\x6e\x6f\164\x20\x69\x6e\163\164\141\x6c\154\x65\x64\x20\x6f\162\x20\x64\151\x73\x61\x62\x6c\145\x64\x2e\x20\121\x75\145\x72\x79\x20\x73\x75\142\155\x69\164\40\x66\141\x69\x6c\145\x64\x2e");
        SAMLSPUtilities::mo_saml_show_error_message();
        return;
        z4:
        $mg = sanitize_email($_POST["\x6d\157\137\163\141\x6d\154\x5f\143\157\156\x74\x61\143\164\x5f\x75\163\x5f\145\155\x61\x69\154"]);
        $Ze = htmlspecialchars($_POST["\155\157\137\x73\x61\155\x6c\137\x63\x6f\x6e\x74\141\x63\x74\x5f\165\163\137\160\150\157\156\x65"]);
        $Ws = htmlspecialchars($_POST["\155\x6f\x5f\163\141\155\154\137\x63\157\x6e\x74\x61\143\x74\x5f\165\163\x5f\x71\x75\x65\x72\171"]);
        if (!empty($_POST["\163\x65\156\144\137\x70\154\x75\x67\x69\156\x5f\x63\x6f\x6e\146\151\147"])) {
            goto I1;
        }
        update_option("\x73\145\x6e\x64\137\160\154\165\x67\151\x6e\x5f\143\157\156\146\151\x67", "\157\146\146");
        goto Da;
        I1:
        $VZ = miniorange_import_export(true, true);
        $Ws .= $VZ;
        delete_option("\163\145\156\144\137\160\x6c\165\147\151\x6e\137\x63\157\156\x66\151\147");
        Da:
        $K_ = new CustomerSaml();
        if (empty($mg) || empty($Ws)) {
            goto x5;
        }
        if (!filter_var($mg, FILTER_VALIDATE_EMAIL)) {
            goto rX;
        }
        $Zf = $K_->submit_contact_us($mg, $Ze, $Ws);
        if ($Zf) {
            goto d6;
        }
        return;
        d6:
        update_option("\155\157\137\163\141\155\x6c\137\x6d\145\163\x73\141\147\145", "\124\x68\141\156\153\x73\40\146\x6f\162\x20\147\145\164\164\x69\156\147\40\x69\x6e\x20\x74\157\x75\143\150\x21\40\127\145\x20\x73\150\x61\154\154\40\147\x65\x74\x20\x62\x61\x63\153\40\164\157\x20\171\x6f\x75\x20\163\x68\x6f\162\164\154\x79\x2e");
        SAMLSPUtilities::mo_saml_show_success_message();
        goto MQ;
        rX:
        update_option("\x6d\157\x5f\163\141\x6d\154\x5f\155\145\163\163\141\x67\x65", "\x50\154\x65\141\163\x65\x20\x65\156\x74\145\162\40\141\40\166\141\x6c\x69\144\x20\x65\x6d\141\x69\154\40\141\144\x64\162\x65\163\163\x2e");
        SAMLSPUtilities::mo_saml_show_error_message();
        return;
        MQ:
        goto qB;
        x5:
        update_option("\155\157\x5f\x73\x61\155\x6c\137\155\145\x73\x73\x61\147\145", "\x50\x6c\145\141\x73\x65\x20\146\x69\x6c\154\x20\165\x70\x20\x45\x6d\x61\x69\154\40\x61\x6e\x64\40\x51\x75\x65\x72\171\40\146\151\x65\154\144\x73\x20\164\x6f\x20\x73\165\142\155\151\164\x20\171\157\x75\x72\x20\161\165\145\162\x79\56");
        SAMLSPUtilities::mo_saml_show_error_message();
        qB:
        jk:
        goto rU;
        Nr:
        if (mo_saml_is_extension_installed("\143\x75\162\154")) {
            goto gT;
        }
        update_option("\x6d\157\x5f\x73\141\155\154\x5f\155\145\163\163\x61\x67\x65", "\x45\122\x52\x4f\122\72\40\x50\110\120\x20\x63\125\x52\114\x20\145\x78\x74\145\156\163\x69\x6f\156\x20\x69\x73\40\156\x6f\x74\x20\151\156\x73\x74\141\154\154\145\x64\40\157\162\x20\x64\x69\163\141\142\154\x65\x64\x2e\40\x4c\x6f\x67\151\156\40\146\141\151\x6c\x65\144\56");
        SAMLSPUtilities::mo_saml_show_error_message();
        return;
        gT:
        $mg = '';
        $mi = self::get_empty_strings();
        if (empty($_POST["\x65\x6d\x61\151\154"]) || empty($_POST["\160\x61\x73\163\x77\x6f\162\x64"])) {
            goto A1;
        }
        if ($this->checkPasswordPattern(strip_tags($_POST["\x70\141\x73\163\167\157\162\x64"]))) {
            goto Yh;
        }
        $mg = sanitize_email($_POST["\x65\x6d\x61\151\154"]);
        $mi = stripslashes(strip_tags($_POST["\x70\x61\163\x73\167\x6f\x72\144"]));
        goto lH;
        Yh:
        update_option("\155\x6f\137\x73\x61\x6d\x6c\137\155\x65\x73\x73\141\x67\x65", "\x4d\151\x6e\x69\155\x75\155\40\x36\x20\x63\150\x61\162\x61\143\164\145\x72\163\x20\163\150\x6f\165\x6c\144\40\142\145\x20\x70\162\x65\x73\x65\x6e\164\56\x20\x4d\x61\170\x69\155\x75\x6d\x20\61\x35\x20\143\150\141\162\141\x63\164\x65\162\x73\40\x73\x68\x6f\165\154\x64\40\142\145\x20\x70\x72\x65\x73\145\156\164\56\x20\117\156\154\171\40\146\x6f\x6c\154\x6f\167\x69\156\147\x20\x73\x79\155\142\x6f\154\x73\40\x28\41\100\x23\56\x24\x25\x5e\46\x2a\55\x5f\x29\40\163\x68\157\x75\x6c\144\40\x62\145\x20\x70\162\x65\163\145\x6e\x74\56");
        SAMLSPUtilities::mo_saml_show_error_message();
        return;
        lH:
        goto u5;
        A1:
        update_option("\155\x6f\137\x73\x61\155\154\x5f\x6d\145\163\x73\x61\x67\145", "\x41\154\154\x20\164\x68\145\x20\x66\151\x65\x6c\x64\163\40\x61\x72\x65\40\x72\x65\161\165\x69\x72\145\x64\x2e\x20\120\154\x65\141\x73\x65\x20\x65\156\164\x65\x72\x20\x76\x61\x6c\x69\144\x20\x65\156\164\x72\151\145\x73\x2e");
        SAMLSPUtilities::mo_saml_show_error_message();
        return;
        u5:
        update_option("\155\157\x5f\163\x61\x6d\154\137\141\144\x6d\x69\x6e\x5f\x65\155\141\x69\x6c", $mg);
        update_option("\x6d\157\x5f\x73\x61\x6d\154\137\141\x64\x6d\x69\156\x5f\160\x61\x73\163\167\157\162\144", $mi);
        $K_ = new Customersaml();
        $q1 = $K_->get_customer_key();
        if ($q1) {
            goto iO;
        }
        return;
        iO:
        $UY = json_decode($q1, true);
        if (json_last_error() == JSON_ERROR_NONE) {
            goto jw;
        }
        update_option("\155\157\x5f\163\x61\x6d\154\x5f\155\145\163\x73\141\147\145", "\x49\156\166\x61\154\151\144\x20\x75\163\x65\x72\x6e\141\155\145\x20\x6f\162\40\x70\x61\x73\163\167\x6f\x72\x64\x2e\x20\120\x6c\145\x61\163\145\40\164\x72\x79\x20\141\x67\x61\x69\156\x2e");
        SAMLSPUtilities::mo_saml_show_error_message();
        goto BT;
        jw:
        update_option("\155\x6f\x5f\x73\x61\155\x6c\x5f\x61\144\x6d\x69\x6e\137\143\165\163\164\x6f\x6d\x65\162\137\153\x65\x79", $UY["\151\x64"]);
        update_option("\x6d\x6f\137\x73\x61\x6d\154\x5f\141\x64\155\x69\x6e\137\x61\160\151\x5f\153\145\171", $UY["\x61\160\151\x4b\145\x79"]);
        update_option("\x6d\x6f\x5f\163\x61\x6d\154\137\143\165\x73\164\157\x6d\x65\162\137\x74\157\153\145\156", $UY["\164\x6f\x6b\x65\x6e"]);
        if (empty($UY["\x70\150\157\x6e\x65"])) {
            goto n1;
        }
        update_option("\x6d\157\x5f\163\x61\x6d\x6c\137\x61\144\x6d\151\x6e\x5f\x70\x68\157\156\145", $UY["\x70\x68\x6f\156\x65"]);
        n1:
        update_option("\x6d\157\x5f\163\141\155\x6c\x5f\141\144\x6d\x69\x6e\137\160\x61\x73\163\x77\x6f\162\144", '');
        update_option("\155\157\137\163\x61\155\x6c\137\155\x65\163\163\x61\x67\145", "\103\x75\163\164\157\155\x65\162\40\x72\145\164\x72\151\x65\x76\145\x64\40\x73\165\143\143\145\x73\x73\146\x75\x6c\x6c\x79");
        update_option("\155\x6f\137\163\x61\x6d\x6c\x5f\162\x65\147\151\x73\x74\x72\141\164\x69\x6f\156\137\163\x74\x61\164\165\163", "\105\x78\151\x73\x74\151\x6e\147\x20\x55\163\145\x72");
        delete_option("\155\157\137\163\x61\x6d\154\x5f\166\x65\x72\151\146\171\x5f\x63\x75\x73\164\157\x6d\x65\162");
        if (get_option("\x73\x6d\154\137\x6c\153")) {
            goto li;
        }
        SAMLSPUtilities::mo_saml_show_success_message();
        goto bx;
        li:
        $WO = get_option("\x6d\157\x5f\163\141\155\x6c\x5f\x63\x75\163\164\x6f\155\x65\162\137\x74\157\x6b\x65\156");
        $wC = AESEncryption::decrypt_data(get_option("\x73\155\x6c\137\x6c\153"), $WO);
        $q1 = json_decode($K_->mo_saml_vl($wC, false), true);
        update_option("\166\x6c\137\x63\150\x65\x63\x6b\137\x74", time());
        if (!empty($q1["\151\x73\124\x72\151\x61\x6c"])) {
            goto MG;
        }
        update_option("\155\157\x5f\x73\x61\155\154\137\x74\154\x61", false);
        goto Bk;
        MG:
        update_option("\155\x6f\137\x73\141\155\154\137\x74\x6c\141", $q1["\x69\x73\x54\x72\x69\x61\x6c"]);
        update_option("\155\157\x5f\x73\141\155\154\x5f\154\151\143\145\x6e\163\x65\137\145\170\x70\151\x72\x79\x5f\144\141\164\145", $q1["\x6c\151\x63\x65\x6e\x73\x65\x45\170\x70\x69\x72\x79\104\141\x74\145"]);
        Bk:
        if (is_array($q1) and strcasecmp($q1["\163\x74\x61\x74\165\163"], "\x53\x55\103\x43\x45\x53\123") == 0) {
            goto U2;
        }
        update_option("\x6d\157\x5f\163\x61\x6d\154\x5f\x6d\x65\x73\163\x61\147\145", "\114\x69\143\x65\x6e\x73\145\40\x6b\x65\x79\x20\x66\x6f\x72\40\x74\150\x69\x73\x20\151\156\163\164\141\156\x63\145\x20\151\x73\40\151\x6e\x63\x6f\162\162\x65\143\164\56\40\x4d\141\153\x65\x20\x73\165\162\x65\40\171\x6f\165\40\150\141\x76\145\x20\x6e\157\x74\x20\164\x61\155\160\145\162\x65\144\x20\167\x69\164\x68\40\151\x74\40\x61\x74\x20\141\x6c\x6c\x2e\x20\x50\x6c\x65\x61\163\x65\40\145\x6e\x74\145\162\x20\141\x20\166\x61\154\x69\x64\40\x6c\151\x63\x65\x6e\x73\145\40\x6b\x65\171\x2e");
        delete_option("\163\x6d\x6c\137\154\153");
        SAMLSPUtilities::mo_saml_show_error_message();
        goto yF;
        U2:
        if (empty($q1["\154\x69\143\145\x6e\163\145\x45\x78\160\x69\x72\x79\x44\x61\x74\145"])) {
            goto OF;
        }
        update_option("\x6d\157\137\163\141\155\x6c\137\154\x69\143\x65\x6e\163\x65\x5f\x65\x78\x70\x69\162\x79\137\x64\x61\164\145", $q1["\x6c\151\x63\x65\156\x73\145\105\x78\x70\151\162\x79\x44\141\x74\x65"]);
        OF:
        $ou = plugin_dir_path(__FILE__);
        $dw = home_url();
        $dw = trim($dw, "\x2f");
        if (preg_match("\x23\136\150\x74\x74\160\50\x73\51\77\x3a\x2f\57\43", $dw)) {
            goto Al;
        }
        $dw = "\150\x74\x74\x70\72\x2f\x2f" . $dw;
        Al:
        $MW = parse_url($dw);
        $hn = preg_replace("\x2f\x5e\167\167\x77\x5c\x2e\x2f", '', $MW["\x68\157\163\164"]);
        $Iw = wp_upload_dir();
        $iR = $hn . "\x2d" . $Iw["\142\x61\163\x65\x64\151\x72"];
        $P6 = hash_hmac("\x73\x68\141\x32\65\x36", $iR, "\x34\x44\110\x66\152\x67\x66\152\141\x73\156\144\x66\x73\x61\x6a\146\110\107\x4a");
        $Ua = $this->djkasjdksa();
        $il = round(strlen($Ua) / rand(2, 20));
        $Ua = substr_replace($Ua, $P6, $il, 0);
        $xs = base64_decode($Ua);
        if (is_writable($ou . "\154\x69\143\x65\x6e\163\x65")) {
            goto js;
        }
        $Ua = str_rot13($Ua);
        $kX = base64_decode("bGNkamthc2pka3NhY2w=");
        update_option($kX, $Ua);
        goto Oy;
        js:
        file_put_contents($ou . "\154\151\x63\x65\x6e\x73\x65", $xs);
        Oy:
        update_option("\154\143\x77\162\164\x6c\146\163\141\x6d\x6c", true);
        SAMLSPUtilities::mo_saml_show_success_message();
        yF:
        bx:
        BT:
        update_option("\155\157\137\x73\x61\x6d\154\x5f\x61\144\x6d\151\156\x5f\160\141\x73\x73\167\x6f\162\144", '');
        rU:
        goto ha;
        kW:
        if (mo_saml_is_extension_installed("\143\x75\162\154")) {
            goto jP;
        }
        update_option("\155\157\137\163\141\155\x6c\x5f\155\x65\x73\x73\x61\147\x65", "\x45\x52\x52\117\x52\72\40\120\110\x50\40\143\125\x52\114\x20\x65\x78\164\x65\156\x73\x69\157\156\40\151\x73\x20\x6e\157\x74\x20\x69\156\163\x74\141\154\x6c\145\144\x20\x6f\x72\x20\x64\151\163\x61\x62\154\145\x64\x2e\x20\x56\141\154\151\144\x61\164\145\x20\117\x54\x50\40\146\x61\x69\154\145\x64\56");
        SAMLSPUtilities::mo_saml_show_error_message();
        return;
        jP:
        $Vv = '';
        if (empty($_POST["\x6f\164\x70\137\164\157\153\145\156"])) {
            goto tI;
        }
        $Vv = htmlspecialchars($_POST["\157\164\160\x5f\164\x6f\x6b\x65\156"]);
        goto Zd;
        tI:
        update_option("\155\157\x5f\163\141\x6d\x6c\x5f\155\x65\x73\x73\141\147\145", "\x50\x6c\145\141\163\145\x20\x65\x6e\164\x65\162\40\141\40\166\x61\x6c\165\x65\40\151\156\x20\157\164\160\x20\146\151\x65\x6c\144\x2e");
        SAMLSPUtilities::mo_saml_show_error_message();
        return;
        Zd:
        $K_ = new CustomerSaml();
        $q1 = $K_->validate_otp_token(get_option("\x6d\x6f\137\x73\141\155\x6c\137\164\162\141\156\163\141\x63\164\x69\x6f\156\x49\144"), $Vv);
        if ($q1) {
            goto eu;
        }
        return;
        eu:
        $q1 = json_decode($q1, true);
        if (strcasecmp($q1["\163\164\141\164\165\x73"], "\123\x55\103\x43\105\x53\x53") == 0) {
            goto kO;
        }
        update_option("\x6d\x6f\137\163\141\155\154\x5f\155\x65\x73\163\x61\x67\x65", "\111\x6e\x76\141\x6c\x69\x64\40\157\x6e\x65\40\164\151\155\145\x20\160\x61\x73\x73\143\x6f\144\x65\56\x20\x50\154\x65\141\163\145\x20\x65\x6e\x74\x65\x72\40\141\40\x76\141\154\151\x64\40\157\164\160\56");
        SAMLSPUtilities::mo_saml_show_error_message();
        goto ON;
        kO:
        $this->create_customer();
        ON:
        ha:
        goto CC;
        RK:
        if (mo_saml_is_extension_installed("\x63\x75\162\154")) {
            goto Cq;
        }
        update_option("\155\x6f\137\x73\141\x6d\x6c\137\155\x65\x73\x73\x61\x67\145", "\x45\x52\x52\117\x52\x3a\x20\x50\x48\x50\40\143\125\x52\x4c\40\x65\170\x74\x65\156\x73\x69\157\x6e\40\x69\x73\40\x6e\157\x74\x20\x69\156\x73\x74\141\154\154\x65\x64\40\x6f\x72\x20\x64\151\163\141\x62\154\x65\144\x2e\40\x52\145\x67\151\163\164\162\141\x74\151\157\x6e\40\x66\141\x69\154\145\x64\x2e");
        SAMLSPUtilities::mo_saml_show_error_message();
        return;
        Cq:
        $mg = '';
        $Ze = '';
        $mi = self::get_empty_strings();
        $pi = self::get_empty_strings();
        if (empty($_POST["\145\155\141\x69\x6c"]) || empty($_POST["\x70\x61\x73\163\x77\157\x72\x64"]) || empty($_POST["\x63\x6f\x6e\146\x69\x72\x6d\120\141\x73\x73\167\157\x72\144"])) {
            goto BR;
        }
        if (strlen($_POST["\160\x61\163\x73\x77\157\162\x64"]) < 6 || strlen($_POST["\143\x6f\x6e\146\x69\x72\x6d\120\141\x73\163\x77\157\x72\144"]) < 6) {
            goto iE;
        }
        if ($this->checkPasswordPattern(strip_tags($_POST["\x70\x61\x73\163\x77\x6f\x72\x64"]))) {
            goto JX;
        }
        $mg = sanitize_email($_POST["\x65\x6d\141\x69\x6c"]);
        if (empty($_POST["\160\150\x6f\x6e\145"])) {
            goto po;
        }
        $Ze = htmlspecialchars($_POST["\160\150\157\x6e\x65"]);
        po:
        $mi = stripslashes(strip_tags($_POST["\x70\x61\163\163\167\x6f\x72\x64"]));
        $pi = stripslashes(strip_tags($_POST["\143\x6f\156\x66\x69\162\155\120\x61\163\x73\x77\x6f\162\144"]));
        goto DB;
        JX:
        update_option("\x6d\x6f\x5f\163\141\155\x6c\137\x6d\x65\x73\163\x61\x67\145", "\115\x69\156\x69\155\165\155\40\66\x20\x63\150\x61\x72\x61\x63\164\x65\x72\x73\40\x73\150\157\165\154\144\40\142\x65\40\160\x72\145\x73\x65\x6e\164\x2e\x20\x4d\141\170\x69\x6d\165\x6d\40\x31\65\x20\x63\x68\141\x72\141\x63\x74\x65\162\x73\x20\x73\150\157\x75\154\144\40\142\145\x20\160\x72\145\x73\x65\x6e\x74\x2e\x20\117\x6e\154\x79\x20\146\x6f\154\154\157\x77\x69\156\x67\40\163\x79\155\142\157\x6c\163\x20\50\41\100\43\56\x24\x25\x5e\x26\x2a\x2d\137\51\x20\x73\x68\157\x75\x6c\x64\x20\142\145\40\160\162\x65\x73\145\x6e\164\56");
        SAMLSPUtilities::mo_saml_show_error_message();
        return;
        DB:
        goto q4;
        iE:
        update_option("\x6d\x6f\x5f\x73\x61\x6d\154\137\x6d\145\x73\x73\x61\x67\x65", "\x43\150\x6f\x6f\x73\x65\40\141\40\x70\x61\163\163\167\x6f\162\144\40\167\151\x74\150\x20\x6d\x69\156\x69\155\165\155\40\154\x65\x6e\147\x74\x68\40\66\x2e");
        SAMLSPUtilities::mo_saml_show_error_message();
        return;
        q4:
        goto xx;
        BR:
        update_option("\x6d\157\137\163\x61\155\x6c\137\155\x65\x73\x73\x61\x67\145", "\101\154\x6c\x20\164\150\145\40\x66\x69\x65\154\144\x73\x20\141\x72\145\x20\x72\x65\161\x75\151\162\145\144\56\x20\x50\x6c\145\141\163\145\40\145\x6e\164\145\162\40\x76\x61\154\151\144\x20\x65\156\164\x72\x69\x65\x73\x2e");
        SAMLSPUtilities::mo_saml_show_error_message();
        return;
        xx:
        update_option("\x6d\157\x5f\x73\141\x6d\154\x5f\x61\144\155\x69\156\137\145\155\x61\x69\x6c", $mg);
        update_option("\x6d\x6f\137\x73\141\x6d\154\x5f\x61\x64\155\x69\156\x5f\x70\x68\157\156\x65", $Ze);
        if (strcmp($mi, $pi) == 0) {
            goto Yk;
        }
        update_option("\155\x6f\x5f\163\141\x6d\154\137\x6d\x65\x73\163\141\147\145", "\x50\141\x73\x73\x77\157\x72\x64\x73\x20\144\157\x20\x6e\157\164\x20\155\141\x74\x63\x68\56");
        delete_option("\155\x6f\137\x73\141\155\x6c\137\166\145\x72\151\146\171\137\x63\165\x73\164\x6f\155\x65\x72");
        SAMLSPUtilities::mo_saml_show_error_message();
        goto LZ;
        Yk:
        update_option("\x6d\x6f\137\x73\141\155\x6c\x5f\141\x64\155\x69\156\137\x70\141\x73\x73\167\x6f\x72\144", $mi);
        $mg = get_option("\x6d\157\137\163\x61\155\x6c\137\x61\x64\x6d\151\x6e\x5f\145\x6d\x61\x69\x6c");
        $K_ = new CustomerSaml();
        $q1 = $K_->check_customer();
        if ($q1) {
            goto Q3;
        }
        return;
        Q3:
        $q1 = json_decode($q1, true);
        if (strcasecmp($q1["\x73\164\141\164\165\163"], "\x43\125\123\x54\117\x4d\x45\x52\x5f\x4e\117\124\137\106\117\x55\x4e\104") == 0) {
            goto fj;
        }
        $this->get_current_customer();
        goto nr;
        fj:
        $q1 = $K_->send_otp_token($mg, '');
        if ($q1) {
            goto Ir;
        }
        return;
        Ir:
        $q1 = json_decode($q1, true);
        if (strcasecmp($q1["\x73\x74\x61\x74\165\163"], "\x53\x55\103\x43\105\x53\x53") == 0) {
            goto UG;
        }
        update_option("\155\x6f\137\163\141\x6d\x6c\x5f\155\x65\x73\163\x61\147\x65", "\x54\150\145\162\145\40\167\x61\163\40\141\156\x20\x65\162\x72\x6f\162\40\151\156\40\x73\x65\156\144\151\x6e\147\x20\x65\155\141\x69\x6c\x2e\x20\120\154\x65\141\163\x65\x20\166\x65\x72\x69\x66\x79\40\171\x6f\x75\x72\x20\x65\x6d\141\x69\x6c\40\141\x6e\x64\40\x74\162\x79\x20\141\147\x61\151\x6e\56");
        update_option("\x6d\x6f\137\x73\141\x6d\x6c\x5f\x72\145\147\151\x73\x74\162\141\x74\x69\x6f\156\137\163\164\x61\164\x75\x73", "\115\117\137\117\x54\120\x5f\x44\x45\x4c\x49\x56\x45\122\x45\104\x5f\106\101\x49\114\125\x52\105\x5f\105\x4d\x41\111\x4c");
        SAMLSPUtilities::mo_saml_show_error_message();
        goto Tv;
        UG:
        update_option("\155\157\137\163\141\155\154\x5f\x6d\145\163\163\141\x67\x65", "\40\x41\x20\x6f\156\145\40\x74\x69\x6d\x65\x20\x70\x61\x73\163\143\157\144\x65\40\151\163\40\x73\145\156\x74\40\x74\x6f\x20" . get_option("\155\x6f\x5f\x73\141\155\x6c\x5f\x61\x64\155\151\x6e\137\145\155\141\x69\154") . "\x2e\40\120\x6c\x65\x61\x73\145\x20\x65\156\164\145\162\40\x74\150\145\40\157\164\160\x20\x68\145\x72\145\40\164\157\x20\166\145\x72\x69\146\x79\x20\171\157\165\x72\40\145\155\141\151\x6c\56");
        update_option("\155\x6f\x5f\163\141\x6d\x6c\x5f\164\162\x61\156\163\x61\143\164\151\157\156\x49\x64", $q1["\x74\x78\x49\x64"]);
        update_option("\155\157\x5f\x73\x61\x6d\154\137\162\x65\x67\x69\x73\x74\162\x61\x74\x69\157\x6e\137\x73\164\141\x74\165\163", "\115\x4f\x5f\117\x54\120\137\104\x45\114\111\126\x45\122\x45\104\x5f\x53\125\x43\103\x45\x53\123\137\105\x4d\x41\111\x4c");
        SAMLSPUtilities::mo_saml_show_success_message();
        Tv:
        nr:
        LZ:
        CC:
        goto EC;
        kA:
        $X6 = htmlspecialchars($_POST["\155\157\137\163\x61\x6d\154\137\x63\165\163\164\x6f\x6d\137\154\157\x67\151\156\x5f\x74\145\170\x74"]);
        update_option("\x6d\x6f\x5f\163\141\x6d\x6c\137\x63\x75\163\x74\x6f\x6d\x5f\x6c\157\x67\x69\156\137\x74\x65\170\x74", stripcslashes($X6));
        $mt = htmlspecialchars($_POST["\x6d\157\137\x73\x61\x6d\x6c\x5f\x63\x75\x73\x74\157\155\137\x67\162\145\145\164\151\x6e\147\x5f\164\x65\x78\x74"]);
        update_option("\155\157\x5f\x73\141\x6d\x6c\137\x63\x75\163\164\157\155\x5f\x67\162\x65\145\x74\x69\x6e\x67\137\x74\145\170\x74", stripcslashes($mt));
        $J1 = htmlspecialchars($_POST["\x6d\157\137\x73\141\155\x6c\x5f\x67\162\145\x65\164\151\x6e\x67\137\156\x61\x6d\x65"]);
        update_option("\x6d\x6f\x5f\x73\x61\155\x6c\137\x67\x72\145\145\x74\x69\x6e\147\137\x6e\x61\x6d\145", stripslashes($J1));
        $Dy = htmlspecialchars($_POST["\155\x6f\x5f\x73\141\x6d\x6c\x5f\143\x75\163\164\x6f\x6d\x5f\154\157\x67\157\165\x74\x5f\x74\x65\170\x74"]);
        update_option("\155\157\137\x73\141\x6d\154\137\143\165\163\164\157\155\137\154\x6f\147\x6f\x75\164\137\x74\145\170\164", stripcslashes($Dy));
        update_option("\155\x6f\x5f\x73\141\155\154\x5f\155\x65\163\x73\x61\147\x65", "\x57\151\144\147\x65\164\40\x53\x65\x74\164\151\x6e\147\163\x20\165\x70\x64\x61\164\x65\x64\40\x73\x75\x63\x63\145\x73\x73\x66\165\154\x6c\x79\56");
        SAMLSPUtilities::mo_saml_show_success_message();
        EC:
        hP:
        if (mo_saml_is_trial_active()) {
            goto i6;
        }
        if (site_check()) {
            goto Ic;
        }
        delete_option("\155\157\137\163\x61\155\x6c\x5f\x66\157\162\x63\145\137\141\165\x74\150\x65\156\x74\151\x63\x61\x74\x69\157\156");
        Ic:
        goto dx;
        i6:
        if (!decryptSamlElement()) {
            goto rE;
        }
        $WO = get_option("\155\x6f\x5f\x73\x61\155\154\x5f\143\165\163\164\157\x6d\x65\x72\x5f\164\x6f\153\145\x6e");
        update_option("\164\x5f\x73\x69\x74\145\x5f\163\164\x61\164\165\163", AESEncryption::encrypt_data("\146\x61\x6c\163\145", $WO));
        rE:
        dx:
    }
    function djkasjdksa()
    {
        $MU = "\x21\176\x40\x23\x24\x25\x5e\x26\52\50\51\x5f\53\x7c\173\175\x3c\76\77\x30\x31\62\63\x34\65\x36\67\70\71\141\142\x63\x64\x65\146\147\x68\151\152\153\x6c\155\156\x6f\160\x71\x72\x73\x74\x75\x76\167\170\x79\x7a\101\102\103\x44\x45\x46\x47\x48\111\112\113\114\x4d\116\x4f\120\x51\122\123\x54\x55\126\127\x58\131\132";
        $DC = strlen($MU);
        $Dd = '';
        $lw = 0;
        xl:
        if (!($lw < 10000)) {
            goto ru;
        }
        $Dd .= $MU[rand(0, $DC - 1)];
        IK:
        $lw++;
        goto xl;
        ru:
        return $Dd;
    }
    function create_customer()
    {
        $K_ = new CustomerSaml();
        $q1 = $K_->create_customer();
        if ($q1) {
            goto Wz;
        }
        return;
        Wz:
        $UY = json_decode($q1, true);
        if (strcasecmp($UY["\163\x74\x61\164\x75\x73"], "\x43\x55\123\x54\x4f\115\x45\122\x5f\x55\123\105\122\116\101\115\x45\x5f\x41\x4c\122\105\x41\x44\131\137\x45\x58\x49\x53\124\x53") == 0) {
            goto kX;
        }
        if (!(strcasecmp($UY["\163\164\141\164\x75\x73"], "\123\x55\x43\x43\x45\x53\x53") == 0)) {
            goto x6;
        }
        update_option("\x6d\157\137\163\x61\155\154\137\x61\x64\x6d\x69\x6e\137\143\165\x73\164\x6f\x6d\145\162\x5f\153\145\171", $UY["\x69\144"]);
        update_option("\155\157\x5f\163\x61\155\154\x5f\141\144\155\151\156\x5f\141\x70\151\137\153\145\x79", $UY["\141\x70\151\x4b\145\x79"]);
        update_option("\x6d\x6f\x5f\x73\x61\x6d\154\x5f\143\165\163\x74\x6f\x6d\145\162\137\164\x6f\153\145\x6e", $UY["\x74\x6f\153\x65\x6e"]);
        update_option("\155\x6f\137\x73\141\x6d\154\137\141\144\x6d\151\156\x5f\x70\x61\163\x73\x77\157\162\x64", '');
        update_option("\155\x6f\137\163\141\x6d\x6c\x5f\155\145\163\x73\x61\147\145", "\x54\150\x61\156\153\x20\x79\157\x75\40\146\x6f\x72\40\x72\x65\x67\x69\x73\x74\145\x72\x69\156\x67\40\x77\151\164\150\40\x6d\x69\x6e\151\x6f\162\141\156\147\x65\x2e");
        update_option("\155\157\x5f\x73\x61\x6d\154\x5f\x72\145\147\x69\163\x74\x72\141\x74\x69\x6f\x6e\x5f\163\164\x61\164\x75\163", '');
        delete_option("\155\157\x5f\163\x61\x6d\x6c\x5f\166\x65\162\151\146\x79\x5f\x63\165\163\164\x6f\155\145\x72");
        delete_option("\x6d\x6f\x5f\x73\141\x6d\x6c\137\156\145\x77\x5f\x72\x65\x67\151\163\164\162\x61\x74\x69\x6f\x6e");
        SAMLSPUtilities::mo_saml_show_success_message();
        x6:
        goto Sp;
        kX:
        $this->get_current_customer();
        Sp:
        update_option("\155\x6f\137\163\141\155\154\x5f\x61\144\x6d\x69\156\137\x70\x61\x73\163\x77\x6f\x72\x64", '');
    }
    function get_current_customer()
    {
        $K_ = new CustomerSaml();
        $q1 = $K_->get_customer_key();
        if ($q1) {
            goto Rb;
        }
        return;
        Rb:
        $UY = json_decode($q1, true);
        if (json_last_error() == JSON_ERROR_NONE) {
            goto KJ;
        }
        update_option("\155\x6f\137\x73\x61\155\x6c\137\x6d\x65\x73\163\141\147\x65", "\131\157\165\x20\141\x6c\162\x65\x61\144\171\x20\x68\x61\x76\145\40\x61\x6e\x20\x61\143\x63\x6f\x75\156\164\40\x77\151\x74\150\x20\x6d\x69\x6e\x69\x4f\x72\141\x6e\x67\x65\x2e\40\x50\x6c\x65\141\163\145\40\145\156\x74\x65\162\40\x61\x20\x76\x61\x6c\x69\x64\40\160\x61\x73\163\x77\x6f\x72\144\56");
        update_option("\x6d\157\137\x73\x61\155\x6c\x5f\x76\x65\162\x69\146\x79\137\x63\165\x73\164\x6f\x6d\145\162", "\164\x72\165\x65");
        delete_option("\x6d\x6f\x5f\x73\x61\x6d\x6c\x5f\156\x65\x77\137\x72\x65\147\151\163\164\162\141\x74\x69\157\x6e");
        SAMLSPUtilities::mo_saml_show_error_message();
        goto j7;
        KJ:
        update_option("\x6d\x6f\137\163\141\155\154\137\141\144\x6d\151\x6e\137\143\165\163\x74\x6f\155\x65\162\137\153\145\x79", $UY["\151\x64"]);
        update_option("\x6d\x6f\x5f\163\141\155\154\137\x61\x64\x6d\x69\x6e\x5f\141\x70\x69\x5f\x6b\x65\x79", $UY["\x61\160\151\x4b\x65\x79"]);
        update_option("\x6d\x6f\x5f\x73\x61\x6d\154\x5f\x63\165\x73\164\157\155\145\x72\137\164\x6f\153\145\156", $UY["\x74\x6f\153\145\156"]);
        update_option("\155\157\x5f\163\141\x6d\x6c\x5f\x61\x64\x6d\151\156\x5f\160\x61\x73\163\167\157\162\x64", '');
        update_option("\155\x6f\x5f\x73\x61\155\x6c\137\155\x65\x73\x73\x61\x67\x65", "\131\157\x75\x72\x20\x61\x63\143\157\x75\156\x74\x20\150\141\163\x20\142\145\145\x6e\x20\162\x65\164\162\151\x65\166\145\x64\40\163\165\143\x63\x65\x73\163\x66\165\x6c\154\171\x2e");
        delete_option("\x6d\x6f\137\x73\141\x6d\x6c\x5f\x76\x65\x72\151\146\171\x5f\143\165\163\164\x6f\155\x65\x72");
        delete_option("\155\x6f\x5f\x73\x61\155\x6c\x5f\x6e\x65\167\x5f\162\145\147\151\x73\x74\162\x61\x74\x69\x6f\x6e");
        SAMLSPUtilities::mo_saml_show_success_message();
        j7:
    }
    function miniorange_sso_menu()
    {
        $yt = add_menu_page("\x4d\x4f\x20\x53\x41\x4d\x4c\x20\x53\x65\164\164\151\x6e\147\163\x20" . __("\103\157\156\x66\x69\147\165\162\x65\x20\123\x41\x4d\x4c\40\111\144\x65\x6e\164\x69\164\171\x20\x50\x72\x6f\x76\151\144\145\162\40\x66\x6f\162\x20\123\x53\x4f", "\x6d\157\x5f\163\x61\155\154\137\x73\145\x74\x74\151\x6e\147\163"), "\x6d\x69\156\x69\117\x72\141\x6e\x67\145\x20\123\101\x4d\114\40\62\56\60\40\x53\x53\117", "\141\144\155\151\x6e\x69\163\164\x72\x61\x74\157\162", "\155\157\137\163\141\155\x6c\137\163\145\x74\164\x69\156\x67\x73", array($this, "\x6d\157\137\154\157\147\151\156\137\167\x69\x64\147\145\164\x5f\x73\141\x6d\x6c\137\157\x70\164\151\x6f\x6e\x73"), plugin_dir_url(__FILE__) . "\x69\x6d\x61\147\x65\x73\x2f\155\x69\156\151\157\162\141\x6e\147\x65\x2e\160\x6e\x67");
        if (!mo_saml_is_customer_license_key_verified()) {
            goto aD;
        }
        add_submenu_page("\x6d\157\137\x73\141\155\154\x5f\x73\x65\x74\x74\x69\156\147\163", "\x4d\141\156\141\147\145\40\x4c\x69\x63\145\x6e\163\x65\x20\x4b\145\x79\x73", "\115\141\x6e\141\x67\x65\x20\114\x69\143\145\x6e\163\x65\x20\x4b\145\171\x73", "\x61\x64\155\x69\x6e\151\x73\x74\x72\x61\x74\x6f\x72", "\155\x6f\x5f\x6d\141\156\x61\147\x65\137\x6c\x69\143\x65\x6e\x73\145", "\x6d\x6f\x5f\x6d\141\156\141\x67\145\137\154\151\x63\145\156\163\x65");
        add_submenu_page("\155\157\x5f\x73\x61\155\x6c\137\163\x65\164\x74\151\156\147\x73", "\x6d\x69\x6e\151\117\162\141\156\x67\x65\40\123\101\x4d\114\x20\x32\x2e\x30\x20\x53\x53\x4f", __("\74\144\151\x76\x20\151\x64\75\x22\x6d\x6f\x5f\163\141\155\154\x5f\141\144\x64\x6f\x6e\163\137\x73\x75\x62\155\145\156\165\x22\x3e\101\144\x64\55\x4f\156\163\74\57\x64\x69\166\76", "\x6d\x69\156\151\157\x72\141\x6e\x67\145\x2d\163\x61\x6d\154\x2d\x32\x30\55\163\151\x6e\x67\x6c\x65\x2d\x73\151\147\156\x2d\157\x6e"), "\x6d\141\156\141\x67\x65\x5f\157\x70\164\x69\x6f\x6e\x73", "\x6d\157\137\163\x61\155\154\x5f\163\145\164\164\x69\156\x67\x73\46\164\141\x62\x3d\x61\x64\144\x2d\x6f\156\x73", array($this, "\x6d\157\x5f\x6c\157\x67\151\x6e\137\x77\x69\144\147\x65\x74\137\163\x61\155\154\137\157\x70\x74\151\157\156\x73"));
        aD:
    }
    function mo_saml_redirect_for_authentication($ap)
    {
        if (!mo_saml_is_customer_license_key_verified()) {
            goto Us;
        }
        if (!(get_option("\155\x6f\x5f\x73\x61\155\154\x5f\x72\x65\147\x69\x73\x74\145\x72\145\x64\x5f\157\156\x6c\x79\137\141\x63\143\x65\x73\x73") == "\164\x72\x75\145")) {
            goto r9;
        }
        $base_url = home_url();
        echo "\74\163\x63\x72\151\x70\164\76\167\151\x6e\144\x6f\x77\56\x6c\x6f\143\141\164\x69\157\156\56\x68\162\x65\146\x3d\47{$base_url}\57\x3f\x6f\x70\x74\151\157\x6e\x3d\163\x61\155\x6c\137\x75\x73\x65\x72\137\x6c\x6f\x67\x69\x6e\46\x72\145\x64\151\x72\x65\x63\164\137\164\x6f\75\x27\x2b\x65\x6e\x63\157\x64\145\x55\122\111\103\x6f\x6d\x70\x6f\156\x65\156\x74\50\167\151\x6e\144\x6f\x77\56\x6c\x6f\143\141\x74\x69\157\156\x2e\x68\x72\145\x66\x29\73\74\57\x73\x63\x72\x69\160\164\76";
        exit;
        r9:
        if (get_option("\x6d\x6f\137\x73\141\x6d\154\137\162\145\147\x69\x73\x74\x65\x72\145\x64\x5f\157\x6e\154\171\137\x61\143\x63\x65\x73\163") == "\164\x72\165\x65" || get_option("\155\x6f\x5f\x73\141\x6d\154\x5f\145\x6e\141\x62\x6c\x65\x5f\154\x6f\147\151\156\137\x72\x65\x64\151\162\x65\143\164") == "\x74\x72\165\145") {
            goto qD;
        }
        if (!(get_option("\155\157\x5f\163\x61\155\x6c\137\162\145\x64\151\x72\x65\x63\x74\x5f\x74\157\137\167\160\137\154\x6f\x67\x69\x6e") == "\x74\x72\165\x65")) {
            goto UU;
        }
        if (!(mo_saml_is_sp_configured() && !is_user_logged_in())) {
            goto WR;
        }
        $of = site_url() . "\x2f\167\160\55\154\x6f\147\151\156\56\x70\150\160";
        if (empty($ap)) {
            goto Oq;
        }
        $of = $of . "\x3f\x72\x65\144\151\x72\145\143\x74\137\164\157\x3d" . urlencode($ap) . "\46\x72\145\x61\x75\x74\150\x3d\61";
        Oq:
        header("\x4c\157\x63\141\x74\151\x6f\156\72\40" . $of);
        exit;
        WR:
        UU:
        goto fy;
        qD:
        if (!(mo_saml_is_sp_configured() && !is_user_logged_in())) {
            goto gz;
        }
        $PG = get_option("\155\x6f\137\163\141\155\154\137\163\x70\x5f\142\x61\x73\145\137\x75\x72\154");
        if (!empty($PG)) {
            goto HC;
        }
        $PG = home_url();
        HC:
        if (!(get_option("\155\x6f\x5f\x73\141\x6d\x6c\137\x72\145\x6c\x61\x79\x5f\163\x74\x61\164\145") && get_option("\155\x6f\x5f\x73\141\155\154\x5f\x72\145\x6c\x61\x79\x5f\163\x74\141\x74\x65") != '')) {
            goto DD;
        }
        $ap = get_option("\x6d\157\x5f\163\141\x6d\x6c\137\x72\x65\154\141\x79\137\x73\164\141\164\x65");
        DD:
        $ap = mo_saml_get_relay_state($ap);
        $Ln = empty($ap) ? "\x2f" : $ap;
        $eX = htmlspecialchars_decode(LicenseHelper::getCurrentOption(mo_options_enum_service_provider::Login_URL));
        $j5 = LicenseHelper::getCurrentOption(mo_options_enum_service_provider::Login_binding_type);
        $s2 = get_option("\x6d\x6f\x5f\163\x61\x6d\154\x5f\146\x6f\162\143\x65\137\141\x75\164\150\x65\x6e\x74\151\x63\x61\164\x69\157\x6e");
        $Uf = $PG . "\57";
        $rb = get_option(mo_options_enum_identity_provider::SP_Entity_ID);
        $So = LicenseHelper::getCurrentOption(mo_options_enum_service_provider::NameID_Format);
        if (!empty($So)) {
            goto zG;
        }
        $So = "\61\56\x31\x3a\x6e\x61\155\x65\151\144\x2d\x66\157\x72\x6d\141\x74\x3a\165\156\x73\x70\x65\143\151\146\151\145\144";
        zG:
        if (!empty($rb)) {
            goto gO;
        }
        $rb = $PG . "\57\167\x70\55\143\157\156\164\x65\x6e\164\x2f\160\154\165\x67\151\x6e\x73\57\155\x69\x6e\151\x6f\x72\141\156\x67\x65\55\163\141\x6d\x6c\x2d\62\60\55\x73\x69\x6e\x67\x6c\145\55\x73\151\x67\x6e\x2d\x6f\x6e\x2f";
        gO:
        $SJ = SAMLSPUtilities::createAuthnRequest($Uf, $rb, $eX, $s2, $j5, $So);
        if (empty($j5) || $j5 == "\110\164\x74\x70\x52\145\x64\151\x72\x65\x63\x74") {
            goto kJ;
        }
        if (!(LicenseHelper::getCurrentOption(mo_options_enum_service_provider::Request_signed) == "\x75\x6e\x63\150\145\143\x6b\x65\x64")) {
            goto IN;
        }
        $sw = base64_encode($SJ);
        SAMLSPUtilities::postSAMLRequest($eX, $sw, $Ln);
        exit;
        IN:
        $sw = SAMLSPUtilities::signXML($SJ, "\116\141\155\x65\x49\x44\120\157\x6c\151\x63\x79");
        SAMLSPUtilities::postSAMLRequest($eX, $sw, $Ln);
        goto aG;
        kJ:
        $vm = $eX;
        if (strpos($eX, "\77") !== false) {
            goto d_;
        }
        $vm .= "\x3f";
        goto Wu;
        d_:
        $vm .= "\x26";
        Wu:
        if (!(LicenseHelper::getCurrentOption(mo_options_enum_service_provider::Request_signed) == "\165\156\143\150\145\x63\x6b\x65\x64")) {
            goto hI;
        }
        $vm .= "\x53\101\115\x4c\x52\145\161\165\145\x73\164\x3d" . $SJ . "\46\122\x65\154\141\171\123\164\x61\x74\145\x3d" . urlencode($Ln);
        header("\143\x61\143\x68\x65\x2d\143\157\156\x74\x72\x6f\x6c\72\x20\155\141\x78\55\141\147\145\75\x30\54\40\x70\x72\151\x76\x61\164\x65\x2c\x20\156\x6f\x2d\163\164\157\162\x65\54\40\x6e\x6f\55\143\141\143\x68\x65\54\40\155\165\x73\x74\x2d\162\x65\166\x61\x6c\x69\x64\141\164\x65");
        header("\114\x6f\x63\x61\x74\151\157\156\x3a\40" . $vm);
        exit;
        hI:
        $SJ = "\x53\101\115\x4c\x52\145\161\165\145\x73\164\x3d" . $SJ . "\46\122\x65\x6c\141\x79\123\164\141\x74\145\x3d" . urlencode($Ln) . "\x26\123\151\147\101\x6c\147\75" . urlencode(XMLSecurityKey::RSA_SHA256);
        $Jp = array("\164\171\160\x65" => "\x70\x72\x69\x76\141\x74\x65");
        $WO = new XMLSecurityKey(XMLSecurityKey::RSA_SHA256, $Jp);
        $iW = get_option("\155\x6f\137\x73\x61\x6d\154\x5f\x63\165\162\x72\x65\x6e\164\x5f\x63\x65\x72\x74\137\160\x72\151\166\x61\x74\145\x5f\153\x65\x79");
        $WO->loadKey($iW, FALSE);
        $tT = new XMLSecurityDSig();
        $MA = $WO->signData($SJ);
        $MA = base64_encode($MA);
        $vm .= $SJ . "\46\123\x69\x67\156\x61\x74\x75\162\145\75" . urlencode($MA);
        header("\143\141\x63\x68\x65\55\x63\157\x6e\164\162\157\x6c\x3a\40\155\141\170\x2d\x61\147\x65\75\60\54\40\160\162\x69\x76\141\x74\145\54\40\x6e\x6f\x2d\x73\x74\x6f\x72\x65\54\40\156\x6f\x2d\x63\141\143\x68\145\x2c\x20\x6d\165\163\164\x2d\x72\x65\166\x61\154\x69\x64\141\x74\145");
        header("\114\x6f\x63\x61\x74\x69\157\156\x3a\x20" . $vm);
        exit;
        aG:
        gz:
        fy:
        Us:
    }
    function mo_saml_login_redirect($PK)
    {
        $Xr = false;
        if (!(strcmp(wp_login_url(), $PK) == 0)) {
            goto Kr;
        }
        $Xr = true;
        Kr:
        if (!empty($PK) && !$Xr) {
            goto KC;
        }
        header("\x4c\157\143\x61\x74\151\157\156\x3a\x20" . home_url());
        goto LK;
        KC:
        header("\x4c\x6f\x63\141\164\151\x6f\156\72\x20" . $PK);
        LK:
        exit;
    }
    function mo_saml_authenticate()
    {
        $PK = '';
        if (empty($_REQUEST["\x72\x65\144\x69\162\x65\143\x74\137\x74\157"])) {
            goto HQ;
        }
        $PK = htmlspecialchars($_REQUEST["\x72\145\144\151\162\145\143\x74\137\164\x6f"]);
        HQ:
        if (!is_user_logged_in()) {
            goto XK;
        }
        $this->mo_saml_login_redirect($PK);
        XK:
        if (!(get_option("\x6d\157\137\163\x61\155\x6c\x5f\145\156\x61\x62\154\x65\x5f\154\157\x67\151\x6e\x5f\162\x65\x64\151\x72\x65\143\164") == "\x74\162\165\x65")) {
            goto Pn;
        }
        $Fa = get_option("\155\157\x5f\163\x61\x6d\x6c\x5f\142\x61\143\153\x64\x6f\157\162\x5f\165\162\154") ? trim(get_option("\x6d\x6f\x5f\x73\x61\155\154\137\x62\x61\143\x6b\144\157\x6f\162\137\165\x72\154")) : "\x66\x61\x6c\x73\145";
        if (isset($_GET["\154\x6f\x67\x67\x65\144\x6f\x75\164"]) && $_GET["\154\157\147\x67\145\x64\157\165\164"] == "\x74\x72\x75\x65") {
            goto Qg;
        }
        if (get_option("\155\x6f\137\x73\x61\155\x6c\x5f\x61\x6c\154\157\x77\x5f\x77\160\x5f\163\x69\147\156\x69\156") == "\164\162\x75\x65") {
            goto F7;
        }
        goto xA;
        Qg:
        header("\114\157\143\x61\x74\x69\x6f\x6e\72\x20" . home_url());
        exit;
        goto xA;
        F7:
        if (!empty($_GET["\x73\x61\155\x6c\x5f\163\x73\157"]) && $_GET["\x73\141\x6d\x6c\137\x73\163\x6f"] === $Fa || !empty($_POST["\163\x61\155\x6c\x5f\163\x73\157"]) && $_POST["\x73\141\x6d\154\137\x73\x73\x6f"] === $Fa) {
            goto GO;
        }
        if (!empty($_REQUEST["\x72\x65\144\151\x72\145\x63\164\x5f\164\x6f"])) {
            goto Go;
        }
        goto mf;
        GO:
        return;
        goto mf;
        Go:
        $PK = htmlspecialchars($_REQUEST["\x72\145\144\x69\x72\145\x63\x74\137\x74\157"]);
        if (!(strpos($PK, "\167\x70\x2d\141\144\155\151\156") !== false && strpos($PK, "\x73\141\x6d\x6c\x5f\x73\x73\x6f\x3d" . $Fa) !== false)) {
            goto md;
        }
        return;
        md:
        mf:
        xA:
        $this->mo_saml_redirect_for_authentication($PK);
        Pn:
    }
    function mo_saml_auto_redirect()
    {
        $cQ = false;
        $cQ = apply_filters("\x6d\157\137\x73\x61\x6d\154\137\142\145\146\x6f\x72\145\x5f\x61\165\164\x6f\x5f\162\x65\x64\x69\x72\145\x63\164", $cQ);
        if (!(is_user_logged_in() || $cQ)) {
            goto JU;
        }
        return;
        JU:
        if (!(get_option("\x6d\x6f\137\163\141\x6d\154\137\x72\x65\147\151\163\164\x65\x72\145\144\137\x6f\x6e\x6c\x79\x5f\x61\143\143\x65\163\163") == "\164\162\165\145" || get_option("\x6d\x6f\137\163\141\155\x6c\x5f\162\145\x64\151\162\145\x63\x74\x5f\x74\157\137\167\160\x5f\x6c\x6f\147\x69\x6e") == "\164\162\165\x65")) {
            goto Yd;
        }
        if (!(get_option("\x6d\x6f\137\163\x61\155\x6c\137\x65\156\141\142\154\x65\x5f\x72\163\x73\x5f\x61\x63\143\145\x73\163") == "\x74\162\x75\145" && is_feed())) {
            goto Rc;
        }
        return;
        Rc:
        $ap = saml_get_current_page_url();
        $this->mo_saml_redirect_for_authentication($ap);
        Yd:
    }
    function mo_saml_modify_login_form()
    {
        $Fa = get_option("\155\157\137\x73\141\155\x6c\x5f\x62\141\143\153\144\157\157\162\x5f\x75\x72\154") ? trim(get_option("\x6d\x6f\x5f\x73\141\155\154\x5f\x62\x61\x63\x6b\x64\x6f\157\162\x5f\x75\x72\x6c")) : "\146\141\154\163\x65";
        echo "\74\151\x6e\x70\165\x74\40\x74\171\160\145\x3d\42\150\x69\x64\x64\x65\x6e\x22\x20\x6e\x61\x6d\x65\x3d\x22\163\141\155\154\137\x73\x73\x6f\42\x20\x76\x61\154\x75\x65\75" . $Fa . "\x3e" . "\xa";
        if (!(get_option("\x6d\157\x5f\163\x61\x6d\154\x5f\x61\x64\x64\137\163\x73\x6f\137\x62\165\x74\164\x6f\156\137\167\160") == "\164\162\165\145")) {
            goto hh;
        }
        $this->mo_saml_add_sso_button();
        hh:
    }
    function mo_saml_login_enqueue_scripts()
    {
        wp_enqueue_script("\x6a\161\x75\145\162\171");
    }
    function mo_saml_add_sso_button()
    {
        if (mo_saml_is_customer_license_key_verified()) {
            goto q8;
        }
        return;
        q8:
        $Vy = SAMLSPUtilities::mo_saml_is_user_logged_in();
        if ($Vy) {
            goto T8;
        }
        $PG = get_option("\155\157\137\x73\141\155\x6c\137\x73\x70\137\x62\x61\163\x65\137\x75\162\154");
        if (!empty($PG)) {
            goto mM;
        }
        $PG = home_url();
        mM:
        $U9 = get_option("\x6d\x6f\x5f\x73\141\x6d\154\137\142\x75\x74\x74\x6f\x6e\137\x77\x69\144\164\x68") ? get_option("\155\x6f\x5f\163\141\155\154\137\x62\165\x74\x74\157\156\x5f\x77\x69\144\164\150") : "\61\x30\x30";
        $ej = get_option("\155\157\x5f\x73\x61\x6d\x6c\x5f\x62\x75\x74\x74\x6f\156\x5f\150\145\151\x67\x68\164") ? get_option("\155\157\137\163\141\155\154\x5f\142\165\164\164\x6f\156\137\150\x65\151\147\x68\x74") : "\x35\x30";
        $KX = get_option("\x6d\x6f\x5f\163\141\155\154\x5f\x62\165\x74\164\157\x6e\137\x73\151\172\145") ? get_option("\155\x6f\137\163\141\x6d\x6c\x5f\x62\165\164\164\x6f\156\137\163\x69\x7a\145") : "\65\60";
        $vD = get_option("\x6d\x6f\137\163\x61\155\x6c\137\x62\x75\x74\x74\x6f\x6e\137\x63\165\162\x76\145") ? get_option("\x6d\157\x5f\163\141\155\x6c\137\142\165\164\x74\x6f\156\137\x63\x75\162\x76\x65") : "\x35";
        $xS = get_option("\x6d\157\137\163\141\155\154\137\x62\x75\x74\x74\157\x6e\137\x63\157\154\157\x72") ? get_option("\x6d\x6f\x5f\x73\x61\x6d\x6c\137\x62\165\164\164\x6f\156\137\143\x6f\x6c\157\x72") : "\60\60\x38\x35\x62\141";
        $PJ = get_option("\155\x6f\x5f\163\141\x6d\154\x5f\x62\165\164\x74\157\156\137\164\150\x65\x6d\x65") ? get_option("\155\157\137\163\141\x6d\154\137\x62\x75\x74\x74\x6f\156\137\164\x68\145\155\145") : "\x6c\157\156\147\142\x75\164\x74\157\x6e";
        $wH = LicenseHelper::getCurrentOption(mo_options_enum_service_provider::Identity_name);
        $nZ = get_option("\x6d\x6f\137\x73\x61\155\x6c\x5f\x62\x75\164\x74\x6f\156\137\x74\145\x78\x74") ? get_option("\x6d\157\x5f\x73\x61\155\x6c\137\x62\x75\164\x74\157\x6e\x5f\x74\145\170\x74") : ($wH ? $wH : "\114\157\147\151\x6e");
        $IO = get_option("\x6d\157\x5f\163\x61\155\154\x5f\146\x6f\x6e\x74\137\143\157\154\157\x72") ? get_option("\x6d\x6f\x5f\x73\x61\x6d\154\137\x66\x6f\156\x74\x5f\143\157\x6c\x6f\x72") : "\x66\146\146\x66\146\146";
        $XY = get_option("\x6d\x6f\137\163\x61\155\x6c\x5f\x66\157\x6e\x74\x5f\163\x69\172\x65") ? get_option("\x6d\x6f\137\163\141\155\x6c\137\146\x6f\x6e\164\x5f\x73\151\x7a\x65") : "\62\x30";
        $SQ = get_option("\163\163\157\x5f\x62\x75\x74\x74\x6f\x6e\137\154\157\147\x69\156\137\x66\x6f\x72\x6d\x5f\x70\157\x73\151\164\151\x6f\x6e") ? get_option("\x73\x73\x6f\137\x62\165\x74\164\157\156\x5f\154\157\x67\151\x6e\137\146\x6f\162\x6d\x5f\160\x6f\x73\x69\x74\x69\157\x6e") : "\x61\x62\157\166\145";
        $Hw = "\74\151\x6e\160\165\x74\40\164\x79\160\145\x3d\x22\142\x75\x74\164\157\x6e\42\40\156\x61\x6d\x65\x3d\42\x6d\x6f\137\163\x61\155\154\137\167\x70\137\x73\163\x6f\x5f\142\165\x74\x74\157\156\42\40\166\x61\x6c\165\145\75\42" . $nZ . "\42\40\163\164\x79\154\145\x3d\42";
        $Ka = '';
        if ($PJ == "\x6c\157\x6e\x67\x62\165\x74\164\x6f\156") {
            goto WM;
        }
        if ($PJ == "\143\x69\162\x63\x6c\x65") {
            goto Sc;
        }
        if ($PJ == "\x6f\x76\141\154") {
            goto eL;
        }
        if ($PJ == "\x73\x71\x75\x61\x72\x65") {
            goto wm;
        }
        goto MW;
        Sc:
        $Ka = $Ka . "\167\x69\144\164\150\x3a" . $KX . "\x70\x78\73";
        $Ka = $Ka . "\x68\145\151\x67\x68\164\x3a" . $KX . "\160\x78\73";
        $Ka = $Ka . "\x62\x6f\162\x64\x65\162\55\162\x61\144\151\x75\163\x3a\71\x39\71\x70\x78\x3b";
        goto MW;
        eL:
        $Ka = $Ka . "\167\151\144\164\150\72" . $KX . "\160\x78\x3b";
        $Ka = $Ka . "\x68\145\x69\x67\x68\164\x3a" . $KX . "\x70\170\x3b";
        $Ka = $Ka . "\142\x6f\162\x64\x65\162\55\162\x61\x64\151\x75\163\72\x35\160\x78\73";
        goto MW;
        wm:
        $Ka = $Ka . "\x77\x69\144\x74\150\x3a" . $KX . "\160\x78\x3b";
        $Ka = $Ka . "\150\145\x69\147\150\x74\72" . $KX . "\x70\170\73";
        $Ka = $Ka . "\142\157\162\x64\x65\162\x2d\x72\x61\x64\x69\x75\163\72\60\160\170\73";
        $Ka = $Ka . "\160\x61\144\x64\151\156\147\x3a\x30\160\170\73";
        MW:
        goto ZD;
        WM:
        $Ka = $Ka . "\167\x69\x64\x74\x68\x3a" . $U9 . "\x70\x78\x3b";
        $Ka = $Ka . "\150\x65\151\147\x68\x74\x3a" . $ej . "\160\x78\73";
        $Ka = $Ka . "\142\x6f\162\x64\145\x72\55\162\141\x64\151\x75\163\72" . $vD . "\x70\x78\x3b";
        ZD:
        $Ka = $Ka . "\142\x61\143\x6b\147\x72\x6f\x75\x6e\x64\x2d\x63\x6f\154\x6f\162\72\43" . $xS . "\73";
        $Ka = $Ka . "\x62\157\x72\144\145\x72\55\143\157\x6c\x6f\x72\72\x74\162\141\156\x73\160\x61\x72\145\x6e\x74\73";
        $Ka = $Ka . "\143\x6f\154\x6f\162\72\43" . $IO . "\x3b";
        $Ka = $Ka . "\x66\157\156\x74\x2d\163\151\x7a\x65\x3a" . $XY . "\160\170\73";
        $Ka = $Ka . "\143\x75\162\x73\157\x72\x3a\160\x6f\151\x6e\164\145\162";
        $Hw = $Hw . $Ka . "\42\x2f\76";
        $PK = '';
        if (!isset($_GET["\162\145\144\x69\162\145\x63\x74\137\164\157"])) {
            goto N9;
        }
        $PK = urlencode($_GET["\x72\x65\144\151\x72\145\x63\x74\137\164\x6f"]);
        N9:
        $S9 = "\x3c\141\x20\x68\162\x65\146\x3d\x22" . $PG . "\x2f\x3f\x6f\160\164\151\x6f\x6e\75\163\141\155\154\137\165\x73\145\x72\137\x6c\157\147\x69\x6e\46\162\145\144\151\162\145\143\x74\x5f\164\x6f\x3d" . $PK . "\42\40\x73\164\x79\x6c\145\x3d\42\x74\145\170\164\x2d\144\x65\143\157\162\x61\x74\x69\x6f\x6e\72\156\157\156\x65\73\x22\x3e" . $Hw . "\74\x2f\x61\x3e";
        $S9 = "\x3c\x64\x69\x76\40\x73\164\171\154\x65\75\x22\160\141\144\144\x69\156\147\x3a\x31\x30\160\x78\x3b\42\76" . $S9 . "\74\57\144\151\x76\x3e";
        if ($SQ == "\x61\142\157\166\x65") {
            goto Jv;
        }
        $S9 = "\x3c\144\151\x76\40\x69\144\75\42\163\x73\x6f\137\x62\x75\x74\164\157\156\x22\40\163\x74\171\x6c\145\75\42\x74\x65\170\x74\55\141\x6c\151\x67\x6e\x3a\143\x65\x6e\164\145\162\x22\x3e\74\144\151\166\x20\x73\164\x79\154\145\75\42\160\x61\144\144\x69\x6e\147\72\65\160\x78\73\x66\157\x6e\x74\55\x73\151\172\145\x3a\61\x34\160\170\73\42\76\74\x62\76\x4f\x52\74\57\x62\76\74\57\x64\151\x76\x3e" . $S9 . "\x3c\x2f\144\151\166\x3e\74\x62\162\57\x3e";
        goto vd;
        Jv:
        $S9 = "\74\144\x69\166\x20\151\144\x3d\x22\x73\163\x6f\x5f\x62\x75\x74\164\157\156\42\x20\x73\164\171\154\x65\x3d\x22\x74\x65\170\164\55\x61\154\x69\147\x6e\72\x63\145\156\164\145\162\x22\x3e" . $S9 . "\x3c\144\x69\166\x20\x73\164\x79\154\x65\75\x22\x70\141\x64\144\151\x6e\x67\x3a\x35\160\x78\x3b\x66\x6f\x6e\x74\55\x73\x69\x7a\145\72\61\x34\160\x78\x3b\x22\76\74\142\x3e\x4f\x52\74\57\x62\x3e\x3c\x2f\x64\151\x76\76\74\57\144\151\166\x3e\74\x62\162\x2f\76";
        $S9 = $S9 . "\x3c\163\x63\162\151\x70\x74\x3e\xa\x9\x9\11\166\141\x72\40\44\145\154\145\x6d\145\156\164\x20\x3d\40\152\x51\165\x65\x72\171\50\42\x23\x75\163\x65\x72\137\x6c\157\147\x69\x6e\x22\x29\x3b\12\11\x9\11\x6a\x51\x75\145\162\171\50\x22\43\163\x73\x6f\137\142\165\164\x74\x6f\156\x22\x29\56\x69\156\163\x65\162\x74\x42\x65\x66\x6f\162\145\50\152\x51\x75\x65\x72\x79\x28\x22\x6c\x61\x62\x65\x6c\133\x66\x6f\x72\x3d\47\x22\x2b\x24\145\x6c\x65\x6d\145\x6e\x74\x2e\x61\x74\x74\162\50\47\x69\x64\47\51\53\x22\47\135\x22\x29\x29\x3b\xa\11\x9\x9\x3c\x2f\163\x63\162\151\x70\x74\x3e";
        vd:
        echo $S9;
        T8:
    }
    function mo_get_saml_shortcode($Bu)
    {
        $Vy = SAMLSPUtilities::mo_saml_is_user_logged_in();
        if (!$Vy) {
            goto pI;
        }
        $current_user = wp_get_current_user();
        $mt = "\110\x65\154\154\157\54";
        if (!get_option("\155\157\137\163\141\155\154\x5f\x63\165\163\x74\x6f\x6d\x5f\147\162\145\145\x74\151\156\147\x5f\164\x65\x78\x74")) {
            goto ox;
        }
        $mt = get_option("\155\157\137\163\x61\x6d\154\x5f\143\x75\163\x74\x6f\x6d\x5f\x67\x72\x65\145\164\x69\156\147\137\x74\x65\x78\x74");
        ox:
        $J1 = '';
        if (!get_option("\155\157\x5f\x73\x61\155\154\137\147\162\x65\x65\x74\151\x6e\x67\137\156\x61\155\x65")) {
            goto O8;
        }
        switch (get_option("\155\157\137\163\x61\155\154\137\147\162\x65\x65\x74\x69\156\x67\x5f\156\x61\155\145")) {
            case "\125\123\105\x52\116\101\115\105":
                $J1 = $current_user->user_login;
                goto RU;
            case "\105\115\x41\111\x4c":
                $J1 = $current_user->user_email;
                goto RU;
            case "\106\116\101\115\105":
                $J1 = $current_user->user_firstname;
                goto RU;
            case "\x4c\116\101\x4d\x45":
                $J1 = $current_user->user_lastname;
                goto RU;
            case "\106\116\x41\x4d\x45\x5f\x4c\116\101\x4d\x45":
                $J1 = $current_user->user_firstname . "\40" . $current_user->user_lastname;
                goto RU;
            case "\114\116\x41\x4d\x45\x5f\106\116\101\x4d\105":
                $J1 = $current_user->user_lastname . "\x20" . $current_user->user_firstname;
                goto RU;
            default:
                $J1 = $current_user->user_login;
        }
        sk:
        RU:
        O8:
        $J1 = trim($J1);
        if (!empty($J1)) {
            goto FX;
        }
        $J1 = $current_user->user_login;
        FX:
        $vv = $mt . "\x20" . $J1;
        $qj = "\114\157\x67\x6f\x75\x74";
        if (!get_option("\x6d\x6f\x5f\x73\x61\x6d\x6c\x5f\143\165\x73\164\x6f\155\137\154\157\147\157\165\164\137\164\145\170\164")) {
            goto VJ;
        }
        $qj = get_option("\x6d\x6f\x5f\163\x61\155\154\x5f\x63\x75\x73\x74\x6f\155\x5f\154\x6f\x67\157\x75\164\137\x74\x65\170\x74");
        VJ:
        $S9 = $vv . "\40\174\40\74\x61\x20\150\x72\145\x66\75\42" . wp_logout_url(home_url()) . "\x22\40\x74\151\164\154\x65\x3d\42\154\x6f\147\x6f\165\164\x22\40\76" . $qj . "\x3c\57\x61\x3e\x3c\x2f\x6c\151\76";
        goto U4;
        pI:
        $PG = get_option("\155\x6f\137\x73\141\x6d\154\137\x73\x70\137\x62\x61\163\145\137\165\x72\154");
        if (!empty($PG)) {
            goto OM;
        }
        $PG = home_url();
        OM:
        if (mo_saml_is_sp_configured() && mo_saml_is_customer_license_key_verified()) {
            goto kP;
        }
        $S9 = "\123\x50\40\x69\x73\x20\156\x6f\x74\x20\x63\157\x6e\146\151\x67\x75\x72\x65\144\x2e";
        goto pQ;
        kP:
        $MO = LicenseHelper::getCurrentOption(mo_options_enum_service_provider::Identity_name);
        $dV = '';
        if (!(!empty($Bu) and is_array($Bu))) {
            goto k1;
        }
        if (empty($Bu["\x69\144\x70"])) {
            goto hx;
        }
        $MO = $Bu["\151\144\160"];
        $dV = $MO;
        hx:
        k1:
        $I5 = "\114\157\x67\x69\156\x20\x77\151\164\x68\x20" . LicenseHelper::getCurrentOption(mo_options_enum_service_provider::Identity_name);
        if (!get_option("\155\x6f\x5f\163\x61\x6d\154\137\x63\165\163\x74\x6f\x6d\x5f\154\x6f\x67\151\156\137\x74\145\x78\164")) {
            goto NA;
        }
        $I5 = get_option("\x6d\157\x5f\163\x61\155\154\137\x63\165\x73\x74\x6f\x6d\137\x6c\157\147\151\x6e\137\164\x65\170\x74");
        NA:
        $xF = LicenseHelper::getCurrentOption(mo_options_enum_service_provider::Identity_name);
        $I5 = str_replace("\43\x23\x49\x44\x50\43\x23", $xF, $I5);
        $Ci = false;
        if (!get_option("\155\x6f\137\163\x61\155\x6c\137\x75\163\x65\x5f\142\165\x74\x74\157\156\137\x61\163\x5f\163\x68\x6f\x72\x74\x63\x6f\x64\x65")) {
            goto yi;
        }
        if (!(get_option("\x6d\157\x5f\x73\141\155\x6c\137\x75\x73\145\x5f\142\x75\x74\164\x6f\156\x5f\x61\163\x5f\163\150\157\162\164\143\157\144\x65") == "\x74\162\165\x65")) {
            goto RN;
        }
        $Ci = true;
        RN:
        yi:
        if (!$Ci) {
            goto Qm;
        }
        $U9 = get_option("\155\157\x5f\x73\141\155\154\137\142\x75\164\x74\157\x6e\137\x77\151\x64\x74\150") ? get_option("\x6d\x6f\x5f\163\x61\155\x6c\x5f\x62\x75\164\x74\x6f\x6e\x5f\167\x69\x64\x74\150") : "\x31\x30\x30";
        $ej = get_option("\155\157\137\163\141\x6d\154\137\142\165\x74\x74\157\x6e\137\150\x65\151\x67\150\164") ? get_option("\155\x6f\x5f\163\x61\x6d\x6c\x5f\x62\x75\164\164\157\x6e\137\150\145\151\147\x68\164") : "\65\x30";
        $KX = get_option("\x6d\157\137\x73\x61\x6d\154\x5f\x62\165\x74\164\x6f\x6e\137\x73\x69\172\x65") ? get_option("\x6d\x6f\137\x73\141\155\x6c\x5f\142\165\x74\x74\x6f\x6e\x5f\163\151\x7a\x65") : "\x35\60";
        $vD = get_option("\155\157\x5f\x73\x61\155\154\x5f\x62\165\164\164\157\156\x5f\x63\x75\x72\166\x65") ? get_option("\155\157\x5f\x73\141\x6d\x6c\137\x62\165\x74\x74\x6f\156\x5f\x63\x75\162\x76\145") : "\x35";
        $xS = get_option("\155\x6f\x5f\x73\x61\x6d\x6c\x5f\142\x75\x74\x74\157\156\137\x63\x6f\x6c\x6f\x72") ? get_option("\155\157\x5f\x73\x61\x6d\x6c\x5f\x62\x75\x74\164\157\x6e\x5f\143\x6f\154\157\162") : "\x30\x30\70\65\142\x61";
        $PJ = get_option("\155\157\137\x73\141\x6d\x6c\137\x62\165\x74\x74\157\x6e\137\x74\150\x65\x6d\145") ? get_option("\155\157\x5f\163\x61\155\x6c\x5f\x62\165\x74\x74\x6f\156\137\x74\150\x65\x6d\145") : "\x6c\x6f\x6e\x67\x62\165\x74\164\x6f\156";
        $wH = LicenseHelper::getCurrentOption(mo_options_enum_service_provider::Identity_name);
        $nZ = get_option("\155\157\137\x73\141\155\154\137\x62\x75\x74\x74\157\x6e\137\x74\145\x78\164") ? get_option("\x6d\x6f\137\x73\141\155\x6c\137\x62\x75\164\164\x6f\156\x5f\164\x65\170\164") : ($wH ? $wH : "\114\157\147\x69\x6e");
        $IO = get_option("\x6d\157\x5f\x73\141\x6d\154\x5f\x66\157\156\x74\137\x63\x6f\154\x6f\162") ? get_option("\155\157\137\163\x61\x6d\154\137\x66\x6f\x6e\x74\137\143\157\x6c\x6f\x72") : "\146\146\146\146\146\146";
        $XY = get_option("\x6d\x6f\x5f\163\x61\x6d\154\137\146\x6f\156\164\x5f\163\x69\x7a\145") ? get_option("\155\x6f\x5f\163\141\155\x6c\x5f\x66\157\x6e\x74\x5f\163\x69\x7a\x65") : "\62\60";
        $I5 = "\x3c\151\156\160\165\x74\x20\164\171\160\145\75\42\x62\165\164\164\x6f\156\42\x20\x6e\x61\155\145\75\x22\155\157\x5f\x73\x61\x6d\154\x5f\x77\160\137\x73\x73\157\x5f\142\x75\x74\x74\157\x6e\42\40\x76\141\154\165\145\x3d\42" . $nZ . "\42\x20\163\x74\171\x6c\x65\x3d\x22";
        $Ka = '';
        if ($PJ == "\x6c\x6f\x6e\147\142\165\164\x74\x6f\x6e") {
            goto yn;
        }
        if ($PJ == "\143\151\x72\x63\154\145") {
            goto k4;
        }
        if ($PJ == "\x6f\166\x61\x6c") {
            goto Ve;
        }
        if ($PJ == "\x73\161\x75\141\162\x65") {
            goto Cb;
        }
        goto vq;
        k4:
        $Ka = $Ka . "\x77\x69\x64\164\150\x3a" . $KX . "\160\x78\73";
        $Ka = $Ka . "\150\x65\x69\x67\150\164\72" . $KX . "\x70\x78\x3b";
        $Ka = $Ka . "\142\157\162\x64\145\x72\55\x72\x61\144\x69\165\x73\72\x39\x39\71\160\x78\x3b";
        goto vq;
        Ve:
        $Ka = $Ka . "\167\151\x64\x74\x68\x3a" . $KX . "\160\x78\73";
        $Ka = $Ka . "\x68\x65\x69\x67\x68\164\x3a" . $KX . "\x70\170\73";
        $Ka = $Ka . "\142\x6f\162\144\145\x72\55\162\141\x64\x69\x75\x73\72\65\x70\170\73";
        goto vq;
        Cb:
        $Ka = $Ka . "\x77\151\144\x74\150\x3a" . $KX . "\160\170\x3b";
        $Ka = $Ka . "\x68\145\151\x67\150\164\72" . $KX . "\160\170\x3b";
        $Ka = $Ka . "\x62\157\x72\144\145\162\x2d\162\141\x64\151\x75\x73\72\60\x70\x78\x3b";
        vq:
        goto jB;
        yn:
        $Ka = $Ka . "\167\151\x64\x74\x68\x3a" . $U9 . "\x70\170\73";
        $Ka = $Ka . "\x68\145\x69\x67\x68\164\72" . $ej . "\160\170\x3b";
        $Ka = $Ka . "\142\157\x72\144\x65\x72\x2d\x72\x61\144\151\x75\x73\72" . $vD . "\x70\170\73";
        jB:
        $Ka = $Ka . "\x62\x61\x63\x6b\x67\162\x6f\x75\x6e\x64\55\x63\157\154\x6f\x72\72\43" . $xS . "\x3b";
        $Ka = $Ka . "\x62\157\x72\x64\145\162\55\x63\157\x6c\x6f\162\x3a\x74\162\141\x6e\163\x70\141\x72\x65\x6e\x74\x3b";
        $Ka = $Ka . "\143\x6f\x6c\x6f\x72\72\43" . $IO . "\x3b";
        $Ka = $Ka . "\x66\157\x6e\x74\55\x73\151\172\145\72" . $XY . "\160\x78\x3b";
        $Ka = $Ka . "\160\x61\144\x64\151\156\147\x3a\x30\160\170\73";
        $I5 = $I5 . $Ka . "\x22\57\76";
        Qm:
        $PK = urlencode(saml_get_current_page_url());
        $S9 = "\74\x61\x20\x73\164\171\154\145\x3d\42\144\x69\x73\160\154\x61\171\x3a\x62\154\157\143\x6b\x22\40\x68\162\145\x66\75\x22" . $PG . "\57\77\x6f\160\164\151\x6f\x6e\x3d\163\x61\x6d\154\137\165\163\145\x72\x5f\154\x6f\x67\x69\x6e";
        if (empty($dV)) {
            goto Kx;
        }
        $S9 .= "\46\x69\x64\x70\x3d" . $MO;
        Kx:
        $S9 .= "\x26\x72\x65\x64\x69\162\145\x63\164\x5f\x74\157\75" . $PK . "\42";
        if (!$Ci) {
            goto CK;
        }
        $S9 = $S9 . "\x73\x74\171\x6c\x65\75\42\164\x65\170\164\x2d\144\x65\x63\x6f\162\x61\164\151\x6f\156\72\x6e\157\x6e\145\73\x22";
        CK:
        $S9 = $S9 . "\76" . $I5 . "\x3c\57\x61\76";
        pQ:
        U4:
        return $S9;
    }
    function _handle_upload_metadata()
    {
        if (!(!empty($_FILES["\155\x65\164\x61\144\141\x74\x61\x5f\x66\151\x6c\x65"]) || !empty($_POST["\155\145\x74\141\144\x61\164\141\137\165\x72\154"]))) {
            goto gU;
        }
        if (!empty($_FILES["\155\x65\164\x61\144\141\x74\x61\137\x66\151\x6c\145"]["\x74\x6d\160\x5f\156\141\x6d\x65"])) {
            goto K1;
        }
        if (mo_saml_is_extension_installed("\143\165\162\x6c")) {
            goto GH;
        }
        update_option("\x6d\157\137\x73\141\155\x6c\x5f\155\x65\163\163\141\147\x65", "\120\110\120\x20\x63\125\122\114\40\145\170\x74\x65\x6e\x73\x69\157\x6e\x20\x69\163\40\x6e\x6f\164\40\x69\x6e\x73\164\141\154\154\x65\144\x20\x6f\162\x20\x64\x69\163\x61\142\154\x65\x64\56\40\x43\141\156\156\157\164\x20\x66\x65\164\143\x68\x20\155\x65\164\x61\144\x61\164\141\40\x66\162\157\x6d\40\125\122\114\x2e");
        SAMLSPUtilities::mo_saml_show_error_message();
        return;
        GH:
        $of = filter_var(htmlspecialchars($_POST["\x6d\x65\164\141\144\141\164\x61\x5f\x75\x72\154"]), FILTER_SANITIZE_URL);
        $Oc = SAMLSPUtilities::mo_saml_wp_remote_call($of, array("\x73\x73\x6c\166\x65\162\151\146\171" => false), true);
        if (!$Oc) {
            goto xW;
        }
        $ZD = $Oc;
        goto va;
        xW:
        return;
        va:
        if (isset($_POST["\x73\x79\x6e\143\x5f\155\x65\164\141\144\x61\164\x61"])) {
            goto zH;
        }
        delete_option("\163\x61\x6d\x6c\x5f\155\x65\x74\x61\144\141\164\141\x5f\x75\x72\x6c\x5f\146\157\x72\137\163\171\156\x63");
        delete_option("\163\141\x6d\x6c\x5f\155\x65\164\141\x64\141\164\141\x5f\x73\x79\x6e\x63\x5f\x69\x6e\x74\145\162\x76\141\154");
        wp_unschedule_event(wp_next_scheduled("\x6d\x65\164\x61\144\141\x74\x61\x5f\x73\x79\156\143\x5f\143\162\157\156\x5f\141\143\x74\151\157\x6e"), "\155\145\x74\141\x64\x61\x74\x61\137\163\171\156\143\137\x63\162\157\156\137\141\143\164\x69\x6f\x6e");
        goto uc;
        zH:
        update_option("\x73\x61\x6d\154\137\155\145\164\x61\144\141\x74\x61\x5f\x75\x72\x6c\x5f\x66\157\162\x5f\163\171\156\143", htmlspecialchars($_POST["\x6d\145\x74\141\x64\x61\164\x61\137\x75\162\x6c"]));
        update_option("\163\141\x6d\154\137\x6d\x65\x74\x61\x64\141\164\x61\x5f\163\x79\x6e\143\x5f\151\156\x74\145\x72\166\141\154", htmlspecialchars($_POST["\163\x79\156\x63\x5f\151\156\x74\145\x72\166\141\154"]));
        if (wp_next_scheduled("\155\x65\x74\x61\x64\141\164\x61\137\x73\171\156\x63\x5f\143\x72\x6f\156\x5f\x61\143\164\x69\x6f\x6e")) {
            goto ax;
        }
        wp_schedule_event(time(), htmlspecialchars($_POST["\163\x79\x6e\143\137\x69\x6e\164\145\x72\x76\141\154"]), "\x6d\x65\x74\141\x64\141\x74\x61\x5f\x73\171\156\x63\137\x63\x72\157\156\137\141\x63\164\x69\x6f\x6e");
        ax:
        uc:
        goto cV;
        K1:
        $ZD = @file_get_contents($_FILES["\155\x65\x74\141\x64\141\164\x61\137\146\x69\154\145"]["\164\x6d\x70\x5f\x6e\141\x6d\x65"]);
        cV:
        $this->upload_metadata($ZD);
        gU:
    }
    function upload_metadata($ZD)
    {
        $YJ = set_error_handler(array($this, "\150\141\156\x64\154\145\130\x6d\154\x45\x72\x72\x6f\162"));
        $HL = new DOMDocument();
        $HL->loadXML($ZD);
        restore_error_handler();
        $z1 = $HL->firstChild;
        if (!empty($z1)) {
            goto hz;
        }
        if (!empty($_FILES["\x6d\145\164\141\x64\141\164\x61\137\146\x69\x6c\x65"]["\x74\x6d\160\137\x6e\x61\x6d\145"])) {
            goto sg;
        }
        if (!empty($_POST["\x6d\145\164\141\144\141\164\141\x5f\x75\162\154"])) {
            goto vs;
        }
        update_option("\x6d\157\x5f\163\x61\x6d\154\x5f\155\x65\x73\163\141\147\x65", "\120\154\x65\x61\163\145\40\x70\162\157\166\x69\144\145\40\141\x20\x76\x61\x6c\x69\x64\x20\155\x65\164\141\x64\141\x74\141\40\146\151\x6c\145\40\157\162\x20\x61\40\x76\x61\154\x69\x64\x20\x55\x52\114\56");
        SAMLSPUtilities::mo_saml_show_error_message();
        return;
        goto VN;
        vs:
        update_option("\155\x6f\x5f\163\141\x6d\x6c\137\155\x65\163\163\141\x67\x65", "\x50\x6c\x65\x61\x73\x65\40\160\x72\x6f\x76\x69\144\145\x20\x61\40\166\x61\x6c\151\x64\x20\x6d\x65\164\141\x64\x61\164\x61\40\x55\122\x4c\x2e");
        SAMLSPUtilities::mo_saml_show_error_message();
        VN:
        goto O0;
        sg:
        update_option("\x6d\157\137\x73\141\x6d\154\x5f\x6d\x65\x73\x73\x61\147\145", "\x50\x6c\x65\x61\x73\145\x20\160\x72\x6f\x76\151\x64\145\40\x61\40\166\x61\x6c\151\x64\x20\155\145\164\x61\x64\x61\164\x61\x20\x66\x69\154\145\x2e");
        SAMLSPUtilities::mo_saml_show_error_message();
        O0:
        goto FL;
        hz:
        $C1 = new IDPMetadataReader($HL);
        $TG = $C1->getIdentityProviders();
        if (!empty($TG)) {
            goto s7;
        }
        update_option("\155\x6f\137\163\141\155\154\137\155\x65\163\163\141\x67\x65", "\120\x6c\x65\x61\x73\x65\40\x70\x72\157\166\151\x64\145\x20\141\40\166\141\x6c\151\144\x20\155\x65\x74\x61\x64\141\164\141\40\146\x69\154\x65\x2e");
        SAMLSPUtilities::mo_saml_show_error_message();
        return;
        s7:
        foreach ($TG as $WO => $MO) {
            $IC = LicenseHelper::getCurrentOption(mo_options_enum_service_provider::Identity_name);
            if (empty($_POST["\163\x61\x6d\154\137\151\x64\x65\156\x74\x69\164\171\137\x6d\145\164\x61\x64\141\x74\x61\137\x70\x72\157\166\x69\144\x65\162"])) {
                goto hF;
            }
            $IC = htmlspecialchars($_POST["\163\141\x6d\x6c\x5f\x69\144\145\x6e\x74\x69\x74\171\137\155\x65\x74\x61\144\x61\164\141\x5f\160\x72\x6f\166\x69\x64\x65\162"]);
            hF:
            $DI = "\110\164\164\x70\122\145\x64\151\162\145\x63\164";
            $Sa = '';
            $oN = $MO->getLoginDetails();
            if (!empty($oN["\110\x54\124\120\55\122\145\x64\x69\162\145\143\164"])) {
                goto qh;
            }
            if (empty($oN["\x48\x54\x54\x50\55\120\117\x53\x54"])) {
                goto kj;
            }
            $DI = "\x48\164\x74\160\120\x6f\163\x74";
            $Sa = $MO->getLoginURL("\110\124\x54\120\x2d\120\x4f\123\x54");
            kj:
            goto UP;
            qh:
            $Sa = $MO->getLoginURL("\110\x54\124\x50\55\122\x65\144\151\162\x65\x63\164");
            UP:
            $Sm = "\x48\x74\164\160\x52\145\144\151\162\x65\x63\164";
            $h0 = '';
            $jG = $MO->getLogoutDetails();
            if (!empty($jG["\x48\x54\x54\x50\55\122\145\x64\x69\162\145\143\x74"])) {
                goto UH;
            }
            if (empty($jG["\110\x54\124\x50\x2d\120\117\x53\x54"])) {
                goto Wt;
            }
            $Sm = "\x48\x74\x74\x70\x50\x6f\x73\164";
            $h0 = $MO->getLogoutURL("\x48\124\124\120\x2d\x50\117\123\124");
            Wt:
            goto mH;
            UH:
            $h0 = $MO->getLogoutURL("\x48\x54\124\x50\x2d\122\145\144\x69\162\145\143\164");
            mH:
            $Cd = $MO->getEntityID();
            $DR = $MO->getSigningCertificate();
            if (!get_option("\x6d\x6f\137\145\156\141\142\x6c\145\137\x6d\165\154\164\151\160\154\145\137\154\151\143\145\156\x73\x65\163")) {
                goto dw;
            }
            $v1 = get_option("\155\157\137\x73\141\x6d\x6c\137\145\x6e\x76\151\x72\157\156\155\x65\x6e\164\x5f\157\x62\x6a\x65\143\164\163");
            $Pu = LicenseHelper::getSelectedEnvironment();
            if (!isset($v1[$Pu])) {
                goto UO;
            }
            $bD = $v1[$Pu]->getPluginSettings();
            $bD[mo_options_enum_service_provider::Identity_name] = $IC;
            $bD[mo_options_enum_service_provider::Login_URL] = $Sa;
            $bD[mo_options_enum_service_provider::Issuer] = $Cd;
            $bD[mo_options_enum_service_provider::X509_certificate] = maybe_serialize($DR);
            $bD[mo_options_enum_service_provider::Logout_URL] = $h0;
            $bD[mo_options_enum_service_provider::Login_binding_type] = $DI;
            $bD[mo_options_enum_service_provider::Logout_binding_type] = $Sm;
            $v1[$Pu]->setPluginSettings($bD);
            update_option("\155\x6f\137\163\x61\x6d\x6c\x5f\145\156\x76\x69\162\157\156\x6d\145\156\x74\x5f\157\142\152\x65\143\164\x73", $v1);
            $Q7 = LicenseHelper::getSelectedEnvironment();
            if (!($Q7 and $Q7 != LicenseHelper::getCurrentEnvironment())) {
                goto CL;
            }
            goto IM;
            CL:
            UO:
            dw:
            update_option("\x73\x61\155\154\x5f\151\144\145\156\164\151\x74\171\x5f\x6e\141\155\x65", $IC);
            update_option("\163\x61\x6d\154\137\154\157\147\151\x6e\x5f\x62\x69\x6e\x64\x69\156\147\137\164\x79\160\x65", $DI);
            update_option("\163\x61\x6d\154\137\154\157\x67\x69\156\x5f\x75\162\154", $Sa);
            update_option("\x73\141\155\x6c\x5f\x6c\x6f\147\x6f\x75\164\x5f\142\151\156\144\x69\156\x67\137\x74\x79\160\x65", $Sm);
            update_option("\163\141\155\154\137\x6c\157\147\157\165\x74\137\x75\x72\154", $h0);
            update_option("\x73\x61\155\154\137\x69\x73\163\x75\145\162", $Cd);
            update_option("\x73\141\x6d\x6c\137\156\x61\x6d\x65\151\x64\137\146\x6f\x72\155\141\164", "\x31\56\61\72\x6e\x61\155\x65\x69\144\x2d\x66\x6f\162\x6d\141\x74\x3a\x75\156\163\160\145\143\x69\146\151\x65\x64");
            update_option("\163\141\x6d\154\137\x78\65\x30\71\137\143\x65\162\x74\x69\x66\151\143\141\x74\x65", maybe_serialize($DR));
            goto IM;
            G0:
        }
        IM:
        update_option("\155\x6f\137\x73\141\x6d\154\x5f\155\145\x73\163\x61\147\145", "\x49\x64\145\156\x74\151\164\171\40\x50\162\x6f\166\151\144\x65\162\x20\x64\145\164\141\x69\x6c\163\40\163\141\x76\145\x64\40\163\x75\143\x63\145\163\x73\146\165\154\154\x79\56");
        SAMLSPUtilities::mo_saml_show_success_message();
        FL:
    }
    function handleXmlError($Ge, $QJ, $oJ, $QA)
    {
        if ($Ge == E_WARNING && substr_count($QJ, "\x44\x4f\115\104\x6f\143\165\155\145\x6e\x74\72\72\154\157\x61\x64\130\115\x4c\50\51") > 0) {
            goto HH;
        }
        return false;
        goto vg;
        HH:
        return;
        vg:
    }
    function mo_saml_plugin_action_links($B5)
    {
        $B5 = array_merge(array("\x3c\141\40\x68\162\145\146\75\42" . esc_url(admin_url("\x61\x64\155\x69\156\56\160\150\x70\x3f\160\141\147\145\x3d\155\x6f\x5f\163\x61\155\154\137\163\145\x74\x74\151\156\147\163")) . "\x22\x3e" . __("\x53\145\164\x74\x69\x6e\147\x73", "\x74\x65\x78\x74\144\157\x6d\x61\151\x6e") . "\x3c\x2f\141\x3e"), $B5);
        return $B5;
    }
    function checkPasswordPattern($mi)
    {
        $JO = "\57\x5e\x5b\x28\134\x77\x29\52\50\x5c\41\x5c\x40\134\x23\x5c\x24\134\45\134\136\x5c\46\x5c\52\134\x2e\134\55\x5c\137\51\52\135\x2b\44\57";
        return !preg_match($JO, $mi);
    }
    function mo_saml_parse_expiry_date($tz)
    {
        $VH = new DateTime($tz);
        $vE = $VH->getTimestamp();
        return date("\106\x20\x6a\54\x20\131", $vE);
    }
}
new saml_mo_login();

<?php
/**
 * This file is a part of the miniorange-saml-20-single-sign-on plugin.
 *
 * @link https://plugins.miniorange.com/
 * @author miniOrange
 * @package miniorange-saml-20-single-sign-on
 */
/*
Plugin Name: miniOrange SSO using SAML 2.0
Plugin URI: https://miniorange.com/
Description: (Premium Single-Site)miniOrange SAML 2.0 SSO enables user to perform Single Sign On with any SAML 2.0 enabled Identity Provider.
Version: 12.1.7.1
Author: miniOrange
Author URI: https://miniorange.com/
*/


define("\115\117\137\x53\101\115\114\137\120\114\x55\x47\111\116\x5f\104\x49\122", dirname(__FILE__));
const OPTIONS_ENUM = "\x2f\151\x6e\143\x6c\165\x64\x65\x73\x2f\154\x69\142\57\x6d\x6f\x2d\157\160\x74\151\x6f\156\163\x2d\x65\156\165\x6d\56\160\x68\x70";
require_once dirname(__FILE__) . OPTIONS_ENUM;
require_once Mo_Saml_Plugin_Files::SSO_WIDGET;
require_once "\x78\155\x6c\x73\145\x63\x6c\151\142\x73\x2e\x70\150\x70";
use RobRichards\XMLSecLibs\XMLSecurityKey;
use RobRichards\XMLSecLibs\XMLSecurityDSig;
use RobRichards\XMLSecLibs\XMLSecEnc;
require_once Mo_Saml_Plugin_Files::CLASS_CUSTOMER;
require_once Mo_Saml_Plugin_Files::SETTINGS_PAGE;
require_once Mo_Saml_Plugin_Files::METADATA_READER;
require_once Mo_Saml_Plugin_Files::CERTIFICATE_UTILITY;
require_once Mo_Saml_Plugin_Files::ENV_LICENSE_UTILITY;
require_once Mo_Saml_Plugin_Files::ENV_LICENSE_DAO;
require_once Mo_Saml_Plugin_Files::PLUGIN_VERSION_UPDATE;
require_once Mo_Saml_Plugin_Files::LICENSE_ACTIONS;
require_once Mo_Saml_Plugin_Files::LICENSE_HANDLER;
require_once Mo_Saml_Plugin_Files::LICENSE_UTILITY;
require_once Mo_Saml_Plugin_Files::ERROR_CODES_VIEW;
class saml_mo_login
{
    private $widgetObj;
    function __construct()
    {
        new Mo_Saml_License_Actions();
        add_action("\141\144\x6d\151\x6e\x5f\155\x65\156\165", array($this, "\x6d\151\156\151\x6f\x72\x61\156\147\145\x5f\163\x73\157\137\x6d\145\x6e\x75"));
        add_action("\x61\144\x6d\151\x6e\x5f\151\x6e\x69\164", array($this, "\x6d\x69\x6e\151\x6f\x72\x61\x6e\147\x65\x5f\x6c\x6f\x67\151\x6e\x5f\167\x69\x64\147\145\164\137\163\141\x6d\154\137\163\141\166\x65\x5f\163\145\x74\x74\x69\x6e\x67\163"));
        add_action("\141\x64\155\x69\156\x5f\x65\x6e\161\165\145\165\145\x5f\163\143\162\x69\160\x74\x73", array($this, "\x70\x6c\165\147\x69\x6e\137\x73\x65\x74\164\151\x6e\147\163\137\x73\x74\x79\x6c\145"), 1);
        register_deactivation_hook(__FILE__, array($this, "\x6d\x6f\x5f\x73\163\157\x5f\x73\x61\155\x6c\x5f\144\x65\x61\x63\164\151\166\141\164\145"));
        add_action("\141\x64\x6d\151\x6e\137\x65\x6e\x71\x75\145\x75\145\x5f\163\143\162\x69\x70\164\163", array($this, "\160\154\165\147\x69\x6e\137\x73\x65\x74\x74\x69\156\x67\x73\x5f\x73\x63\162\151\160\164"), 1);
        remove_action("\141\144\155\151\156\x5f\156\x6f\164\151\143\x65\163", array($this, "\x6d\x6f\137\163\141\x6d\x6c\137\x73\x75\x63\143\x65\x73\x73\x5f\155\145\x73\163\141\x67\x65"));
        remove_action("\141\144\x6d\151\x6e\x5f\x6e\x6f\164\x69\143\145\x73", array($this, "\155\157\137\x73\141\x6d\154\137\x65\x72\162\x6f\162\x5f\155\x65\163\x73\141\147\x65"));
        add_action("\167\160\137\141\x75\164\x68\145\156\164\151\143\x61\164\145", array($this, "\x6d\x6f\x5f\x73\x61\x6d\x6c\x5f\141\x75\x74\x68\x65\156\x74\x69\x63\141\x74\x65"));
        add_action("\167\160", array($this, "\155\x6f\137\163\141\x6d\154\137\141\165\164\x6f\137\162\145\144\x69\162\x65\143\164"));
        $this->widgetObj = new mo_login_wid();
        add_action("\151\156\x69\164", array($this->widgetObj, "\x6d\157\137\163\141\155\x6c\137\x77\151\144\x67\x65\x74\137\x69\x6e\151\164"));
        add_action("\x61\x64\155\x69\x6e\137\x69\x6e\151\164", "\155\x6f\137\163\141\155\154\x5f\144\157\167\x6e\154\x6f\141\x64");
        add_action("\154\157\147\151\156\137\145\x6e\161\165\x65\165\145\137\x73\143\x72\151\160\164\163", array($this, "\155\x6f\x5f\163\x61\155\154\x5f\154\x6f\x67\151\156\137\145\156\x71\165\x65\165\145\137\163\x63\x72\151\x70\x74\163"));
        add_action("\x6c\157\x67\x69\x6e\137\146\x6f\x72\x6d", array($this, "\x6d\157\x5f\163\x61\155\154\x5f\x6d\x6f\x64\151\146\x79\137\154\x6f\x67\x69\x6e\137\x66\x6f\162\x6d"));
        add_shortcode("\x4d\117\x5f\x53\101\x4d\114\137\106\x4f\x52\115", array($this, "\x6d\157\137\147\145\x74\137\x73\x61\155\x6c\137\x73\x68\x6f\162\164\x63\x6f\144\145"));
        add_filter("\x63\x72\157\156\137\x73\x63\x68\145\x64\165\x6c\x65\163", array($this, "\155\171\x70\162\x65\x66\x69\x78\x5f\141\x64\144\x5f\x63\162\157\156\137\x73\143\150\145\x64\165\x6c\x65"));
        add_action(Mo_Options_Enum_Metadata_Sync::METADATA_SYNC_CRON_ACTION, array($this, Mo_Options_Enum_Metadata_Sync::METADATA_SYNC_CRON_ACTION));
        register_activation_hook(__FILE__, array($this, "\x6d\x6f\x5f\x73\x61\155\x6c\137\143\x68\x65\143\153\137\157\160\145\x6e\163\x73\154"));
        add_action("\160\x6c\165\147\x69\x6e\x5f\141\143\164\151\x6f\x6e\137\154\151\156\x6b\x73\x5f" . plugin_basename(__FILE__), array($this, "\155\x6f\x5f\163\141\x6d\x6c\137\160\154\165\147\x69\x6e\137\141\143\164\151\x6f\x6e\137\154\151\156\153\x73"));
        add_action("\x61\144\155\x69\156\137\x69\156\x69\164", array($this, "\144\x65\146\141\x75\x6c\164\x5f\x63\x65\x72\164\x69\x66\151\x63\141\x74\x65"));
        add_option("\x6c\x63\144\x6a\153\141\x73\x6a\144\153\x73\x61\x63\x6c", "\144\x65\x66\x61\x75\x6c\x74\x2d\x63\145\162\164\x69\x66\x69\143\141\x74\145");
        add_filter("\155\141\156\x61\x67\x65\x5f\x75\163\145\x72\x73\137\x63\157\x6c\165\x6d\x6e\x73", array($this, "\x6d\x6f\137\x73\x61\x6d\x6c\x5f\x63\x75\163\164\157\x6d\x5f\141\164\x74\x72\137\143\x6f\x6c\165\x6d\x6e"));
        add_filter("\155\141\156\x61\x67\x65\x5f\x75\163\145\x72\163\137\143\x75\x73\164\x6f\x6d\x5f\x63\157\x6c\165\x6d\x6e", array($this, "\x6d\x6f\x5f\x73\x61\155\x6c\x5f\141\164\x74\162\137\143\157\x6c\x75\155\156\x5f\x63\157\156\x74\145\x6e\164"), 10, 3);
        global $wp_version;
        if ((float) $wp_version < 5.5 && (float) $wp_version > 5.2) {
            goto ZL;
        }
        add_action("\167\160\x5f\154\x6f\x67\x6f\165\x74", array($this->widgetObj, "\x6d\x6f\x5f\163\141\155\x6c\x5f\154\157\147\157\x75\164"), 1, 1);
        goto HV;
        ZL:
        add_filter("\154\157\x67\x6f\165\x74\x5f\162\145\144\x69\162\x65\x63\164", array($this, "\x6d\x6f\137\163\x61\155\154\137\154\x6f\147\157\165\x74\x5f\x62\x72\157\x6b\x65\162\137\x77\151\164\150\137\146\151\x6c\x74\x65\162"), 10, 3);
        HV:
    }
    function mo_saml_logout_broker_with_filter($d9, $gl, $user)
    {
        $this->widgetObj->mo_saml_logout($user->ID, $d9);
    }
    function default_certificate()
    {
        $sp = file_get_contents(plugin_dir_path(__FILE__) . "\x72\x65\x73\x6f\165\162\x63\x65\163" . DIRECTORY_SEPARATOR . "\155\151\156\x69\157\162\141\156\147\x65\55\163\x70\x2d\x63\x65\x72\x74\151\146\x69\143\141\x74\145\56\x63\162\x74");
        $HM = file_get_contents(plugin_dir_path(__FILE__) . "\x72\x65\x73\157\x75\162\143\x65\163" . DIRECTORY_SEPARATOR . "\x6d\x69\x6e\x69\157\162\x61\156\x67\x65\55\x73\x70\x2d\143\x65\162\x74\x69\146\x69\143\141\164\x65\x2d\160\162\151\166\56\153\x65\x79");
        if (!(!get_option("\155\157\x5f\x73\141\155\154\x5f\x63\165\162\x72\145\156\164\x5f\143\x65\162\x74") && !get_option("\x6d\157\137\163\x61\155\x6c\x5f\143\x75\162\162\145\x6e\x74\137\143\145\162\164\137\160\162\151\x76\x61\164\x65\x5f\x6b\145\x79"))) {
            goto RX;
        }
        update_option("\x6d\157\x5f\163\141\155\154\x5f\x63\x75\x72\162\x65\156\164\x5f\143\145\x72\164", $sp);
        update_option("\x6d\157\x5f\163\x61\155\154\x5f\x63\x75\x72\162\145\156\164\137\143\x65\162\164\137\160\162\151\x76\x61\x74\145\x5f\153\x65\171", $HM);
        RX:
    }
    function mo_saml_check_openssl()
    {
        if (mo_saml_is_extension_installed("\x6f\x70\145\156\x73\163\x6c")) {
            goto Be;
        }
        wp_die("\120\110\x50\x20\157\x70\145\x6e\163\x73\154\40\145\170\164\x65\156\163\151\157\156\40\151\163\40\156\x6f\x74\x20\x69\156\163\164\x61\154\154\145\144\x20\x6f\x72\40\144\151\163\141\x62\x6c\x65\x64\x2c\160\154\145\141\x73\145\40\x65\156\141\x62\154\145\x20\151\x74\x20\164\x6f\x20\x61\143\164\151\x76\141\x74\x65\40\x74\x68\x65\x20\x70\x6c\165\x67\x69\x6e\x2e");
        Be:
        add_option("\x41\x63\x74\x69\166\141\164\145\x64\x5f\120\154\165\147\151\156", "\120\154\165\x67\x69\156\55\x53\x6c\x75\147");
    }
    function myprefix_add_cron_schedule($is)
    {
        $is["\x77\x65\x65\153\154\171"] = array("\151\156\164\145\162\x76\x61\x6c" => 604800, "\x64\151\x73\160\x6c\x61\171" => __("\x4f\156\x63\x65\x20\127\x65\145\x6b\154\x79"));
        $is["\x6d\x6f\x6e\x74\x68\154\x79"] = array("\x69\156\x74\145\x72\166\141\154" => 2635200, "\x64\151\163\x70\154\141\171" => __("\117\156\143\x65\40\x4d\x6f\x6e\x74\x68\x6c\x79"));
        return $is;
    }
    function metadata_sync_cron_action()
    {
        $w7 = get_option(Mo_Options_Enum_Metadata_Sync::METADATA_SYNC_URL);
        if (empty($w7)) {
            goto n8;
        }
        error_log("\x6d\x69\156\151\x6f\162\141\x6e\147\145\x20\72\x20\x52\x41\116\40\x53\x59\x4e\103\x20\x2d\x20" . time());
        $aY = LicenseHelper::getCurrentOption(Mo_Saml_Options_Enum_Service_Provider::IDENTITY_NAME);
        $this->upload_metadata(@file_get_contents($w7));
        update_option("\x73\141\155\154\137\x69\144\x65\156\x74\151\164\171\137\156\141\155\145", $aY);
        n8:
    }
    function mo_login_widget_saml_options()
    {
        global $wpdb;
        update_option("\x6d\157\x5f\x73\141\155\154\x5f\x68\x6f\163\x74\137\156\x61\x6d\145", "\150\164\x74\160\163\72\57\57\x6c\x6f\x67\x69\x6e\56\170\145\x63\x75\x72\151\146\x79\x2e\143\x6f\x6d");
        $H_ = get_option("\x6d\x6f\137\x73\x61\155\x6c\137\150\x6f\x73\164\x5f\156\141\x6d\x65");
        mo_register_saml_sso();
    }
    public function mo_sso_saml_deactivate()
    {
        if (!is_plugin_active_for_network(plugin_basename(dirname(__FILE__) . DIRECTORY_SEPARATOR . Mo_Saml_Plugin_Files::MAIN_PLUGIN_FILE))) {
            goto L3;
        }
        global $wpdb;
        $vS = $wpdb->get_col("\x53\105\114\105\x43\124\x20\x62\154\157\x67\137\x69\x64\40\x46\x52\x4f\x4d\x20{$wpdb->blogs}");
        $TY = get_current_blog_id();
        do_action("\x6d\x6f\x5f\163\x61\x6d\154\x5f\146\154\165\163\150\137\x63\x61\x63\x68\x65");
        foreach ($vS as $blog_id) {
            switch_to_blog($blog_id);
            delete_option("\x6d\x6f\x5f\x73\141\x6d\x6c\137\150\157\x73\x74\x5f\x6e\x61\155\145");
            delete_option("\155\x6f\x5f\163\x61\155\x6c\x5f\x61\x64\155\151\x6e\x5f\160\x68\x6f\x6e\145");
            delete_option("\x6d\x6f\137\x73\141\155\154\x5f\141\x64\x6d\151\x6e\137\x70\141\163\x73\x77\157\162\x64");
            delete_option("\x6d\x6f\x5f\163\141\x6d\154\137\166\145\x72\151\146\x79\137\143\165\163\164\157\x6d\145\162");
            delete_option("\x6d\157\x5f\163\x61\155\x6c\x5f\141\x64\155\151\x6e\x5f\x63\x75\x73\x74\x6f\x6d\x65\162\137\x6b\145\x79");
            delete_option("\x6d\x6f\137\163\141\155\x6c\x5f\x61\144\x6d\151\x6e\x5f\x61\x70\151\x5f\x6b\x65\x79");
            delete_option("\155\x6f\137\163\x61\x6d\x6c\x5f\143\x75\x73\x74\x6f\x6d\x65\162\x5f\x74\x6f\x6b\145\156");
            delete_option("\x6d\157\137\163\x61\155\154\137\x6d\x65\163\163\x61\147\x65");
            delete_option("\x6d\157\x5f\163\141\155\x6c\137\151\x64\160\x5f\143\157\156\146\x69\x67\x5f\x63\x6f\155\160\x6c\145\164\x65");
            delete_option("\x76\154\x5f\143\x68\145\143\153\137\164");
            delete_option("\x76\x6c\137\143\x68\145\x63\153\x5f\x73");
            delete_option("\154\156\137\x63\150\145\143\x6b\x5f\x74");
            delete_option("\x6d\157\x5f\x73\x61\155\x6c\x5f\163\x68\157\x77\137\x61\144\144\x6f\156\x73\137\x6e\x6f\164\x69\x63\145");
            delete_option("\163\155\x6c\x5f\x6c\x6b");
            delete_option("\155\157\137\163\141\x6d\x6c\137\x74\154\141");
            delete_option("\155\157\x5f\x73\x61\155\154\137\x6c\145\144");
            rM:
        }
        EB:
        switch_to_blog($TY);
        goto y3;
        L3:
        do_action("\155\x6f\137\163\141\x6d\x6c\137\146\x6c\x75\x73\x68\137\143\141\x63\150\145");
        delete_option("\x6d\157\137\163\x61\x6d\x6c\x5f\x68\x6f\163\x74\x5f\156\141\x6d\x65");
        delete_option("\155\157\137\x73\141\x6d\x6c\x5f\141\144\x6d\151\x6e\137\160\x68\157\x6e\x65");
        delete_option("\x6d\157\137\x73\141\155\154\x5f\141\144\x6d\151\156\x5f\160\141\x73\x73\167\x6f\x72\144");
        delete_option("\x6d\157\137\x73\141\x6d\154\137\166\145\x72\151\146\171\x5f\143\165\163\164\x6f\155\x65\x72");
        delete_option("\155\x6f\137\x73\x61\155\x6c\x5f\141\144\x6d\151\156\x5f\143\x75\163\164\157\155\x65\162\137\x6b\145\x79");
        delete_option("\155\x6f\x5f\x73\141\x6d\154\137\141\x64\x6d\x69\156\x5f\x61\x70\x69\137\153\x65\171");
        delete_option("\155\x6f\x5f\x73\141\155\x6c\x5f\x63\x75\x73\164\x6f\155\x65\162\x5f\164\x6f\153\145\x6e");
        delete_option("\x6d\x6f\137\163\141\155\154\137\x6d\145\163\x73\x61\x67\145");
        delete_option("\155\157\x5f\163\x61\x6d\x6c\x5f\x69\x64\160\x5f\143\157\156\x66\151\x67\x5f\143\x6f\x6d\160\x6c\x65\164\x65");
        delete_option("\x6d\157\137\x73\x61\x6d\x6c\137\x65\x6e\141\142\x6c\x65\137\143\154\157\x75\x64\137\142\x72\x6f\x6b\145\162");
        delete_option("\x76\154\x5f\x63\150\x65\x63\x6b\x5f\164");
        delete_option("\166\154\137\x63\x68\145\143\153\137\x73");
        delete_option("\154\x6e\x5f\143\150\145\143\x6b\x5f\x74");
        delete_option("\155\157\x5f\163\x61\155\x6c\x5f\163\150\x6f\167\137\141\144\144\x6f\x6e\163\x5f\x6e\157\x74\151\x63\145");
        delete_option("\163\x6d\x6c\137\154\x6b");
        delete_option("\x6d\157\x5f\163\141\155\154\x5f\x74\x6c\141");
        delete_option("\x6d\157\137\x73\x61\x6d\154\137\x6c\x65\x64");
        y3:
    }
    function djkasjdksaduwaj($rV, $YJ, $CE, $Yq = "\x66\x61\154\163\x65")
    {
        $HO = $YJ->check_customer_ln();
        if ($HO) {
            goto IL;
        }
        if (!($Yq == "\x74\162\x75\x65")) {
            goto Hq;
        }
        WP_CLI::error(Mo_Saml_Cli_Error::POOR_INTERNET);
        Hq:
        return;
        IL:
        $HO = json_decode($HO, true);
        if (strcasecmp($HO["\163\164\x61\x74\x75\163"], "\x53\125\103\x43\105\x53\123") == 0) {
            goto Lo;
        }
        $mr = get_option("\x6d\157\137\163\x61\155\154\137\x63\x75\x73\164\157\x6d\145\x72\x5f\x74\157\153\x65\156");
        update_option("\x73\x69\164\x65\x5f\143\153\137\154", AESEncryption::encrypt_data("\x66\x61\154\163\x65", $mr));
        if (!($Yq == "\164\x72\165\145")) {
            goto ST;
        }
        WP_CLI::error(Mo_Saml_Cli_Error::NOT_UPGRADED);
        ST:
        $gA = add_query_arg(array("\164\x61\142" => "\154\151\143\x65\156\163\151\156\147"), $_SERVER["\122\x45\121\x55\105\x53\124\x5f\125\x52\x49"]);
        update_option("\x6d\157\137\163\141\x6d\154\x5f\x6d\145\x73\x73\x61\x67\145", "\x59\157\165\40\x68\x61\x76\145\x20\x6e\157\x74\40\165\160\147\162\x61\144\145\x64\x20\x79\x65\x74\x2e\x20" . addLink("\103\154\x69\x63\x6b\40\150\145\x72\x65", $gA) . "\40\x74\x6f\x20\165\160\147\162\x61\144\145\40\x74\157\40\x70\162\x65\155\x69\x75\x6d\x20\166\145\162\x73\151\x6f\x6e\56");
        SAMLSPUtilities::mo_saml_show_error_message();
        goto us;
        Lo:
        if (empty($HO["\154\151\x63\x65\x6e\x73\145\x45\170\x70\151\x72\x79"])) {
            goto sH;
        }
        update_option("\155\x6f\x5f\x73\141\x6d\154\137\x6c\x65\x64", SAMLSPUtilities::mo_saml_encrypt_data(Mo_Saml_License_Utility::get_license_expiry_date($HO["\154\x69\x63\145\156\x73\x65\105\x78\x70\x69\162\x79"])));
        if (new DateTime() > new DateTime($HO["\x6c\151\143\145\156\163\145\105\170\160\x69\x72\x79"])) {
            goto aR;
        }
        update_option("\155\157\x5f\163\141\155\154\x5f\163\x6c\145", false);
        goto Ow;
        aR:
        update_option("\155\157\x5f\x73\141\155\154\137\x73\154\x65", true);
        Ow:
        sH:
        $HO = json_decode($YJ->mo_saml_vl($rV, false), true);
        update_option("\166\154\137\x63\150\145\x63\153\137\x74", time());
        if (!empty($HO["\x69\x73\x54\x72\x69\x61\x6c"])) {
            goto nq;
        }
        update_option("\155\x6f\x5f\163\141\155\x6c\137\x74\154\141", false);
        goto XJ;
        nq:
        update_option("\x6d\157\137\163\141\155\x6c\137\164\154\x61", $HO["\151\163\x54\162\151\x61\x6c"]);
        XJ:
        if (is_array($HO) and strcasecmp($HO["\163\x74\141\x74\165\x73"], "\123\x55\103\103\105\x53\x53") == 0) {
            goto Og;
        }
        if (is_array($HO) and strcasecmp($HO["\163\164\x61\x74\165\x73"], "\106\101\x49\114\x45\104") == 0) {
            goto Pk;
        }
        if (!($Yq == "\164\162\x75\x65")) {
            goto Uc;
        }
        WP_CLI::error(Mo_Saml_Cli_Error::POOR_INTERNET);
        Uc:
        update_option("\x6d\157\x5f\163\141\x6d\154\x5f\155\145\163\x73\x61\x67\145", "\101\156\40\x65\162\x72\157\162\40\x6f\143\143\x75\x72\145\x64\x20\167\x68\x69\x6c\x65\40\x70\x72\157\143\x65\163\x73\151\x6e\x67\x20\x79\157\x75\162\40\162\x65\161\x75\x65\x73\164\56\x20\x50\x6c\145\141\163\x65\x20\124\x72\171\40\x61\147\141\x69\156\56");
        SAMLSPUtilities::mo_saml_show_error_message();
        goto LK;
        Pk:
        if (strcasecmp($HO["\x6d\x65\x73\163\x61\147\145"], "\x43\x6f\x64\145\x20\x68\141\x73\40\x45\170\x70\151\x72\145\144") == 0) {
            goto C5;
        }
        if (!($Yq == "\x74\162\x75\x65")) {
            goto az;
        }
        WP_CLI::error(Mo_Saml_Cli_Error::INVALID_LICENSE);
        az:
        update_option("\x6d\x6f\137\163\141\155\154\137\x6d\145\163\163\x61\x67\145", "\x59\157\x75\x20\150\x61\x76\x65\40\x65\x6e\164\145\x72\145\x64\x20\141\156\x20\151\x6e\x76\141\x6c\151\x64\x20\154\151\143\145\x6e\163\145\40\153\x65\171\x2e\x20\120\x6c\145\141\x73\145\40\145\156\x74\145\x72\40\141\x20\166\x61\x6c\151\x64\x20\x6c\151\143\x65\x6e\163\x65\40\153\x65\x79\x2e");
        goto d9;
        C5:
        if (!($Yq == "\164\162\x75\x65")) {
            goto U2;
        }
        WP_CLI::error(Mo_Saml_Cli_Error::CODE_EXPIRED);
        U2:
        $gA = add_query_arg(array("\164\x61\x62" => "\x6c\151\x63\x65\156\163\x69\156\x67"), $_SERVER["\122\105\x51\125\105\123\x54\x5f\x55\122\x49"]);
        update_option("\x6d\x6f\x5f\x73\x61\x6d\154\137\155\x65\x73\163\141\147\x65", "\114\x69\143\x65\x6e\x73\145\40\x6b\145\x79\40\x79\x6f\x75\40\150\141\166\145\x20\x65\x6e\x74\145\162\x65\144\x20\150\141\163\40\x61\154\162\145\x61\144\x79\40\142\x65\x65\x6e\40\165\x73\x65\x64\56\x20\120\154\145\x61\163\145\x20\x65\x6e\164\x65\x72\40\x61\40\x6b\x65\x79\x20\167\150\151\x63\x68\40\x68\141\163\x20\x6e\157\x74\40\142\x65\x65\156\40\165\x73\x65\144\40\x62\x65\x66\x6f\x72\x65\40\x6f\x6e\x20\141\x6e\171\40\x6f\164\150\x65\x72\x20\151\156\x73\x74\141\x6e\x63\x65\x20\157\x72\x20\x69\146\x20\x79\x6f\x75\x20\x68\x61\x76\x65\x20\145\x78\141\165\163\x74\x65\144\40\141\x6c\154\x20\x79\157\x75\162\x20\153\x65\x79\x73\x20\164\x68\x65\x6e\x20" . addLink("\103\x6c\151\143\x6b\x20\x68\x65\162\145", $gA) . "\40\164\x6f\x20\142\165\171\x20\155\x6f\162\x65\56");
        d9:
        SAMLSPUtilities::mo_saml_show_error_message();
        LK:
        goto NJ;
        Og:
        $mr = get_option("\x6d\x6f\137\x73\141\x6d\154\137\143\165\x73\x74\x6f\x6d\x65\x72\137\x74\157\x6b\145\156");
        update_option("\163\155\x6c\x5f\154\153", AESEncryption::encrypt_data($rV, $mr));
        update_option("\155\x6f\137\x73\141\x6d\154\137\x6d\145\x73\x73\x61\x67\x65", $CE);
        $mr = get_option("\155\157\x5f\163\141\155\x6c\137\x63\165\x73\164\157\155\x65\162\x5f\x74\157\x6b\145\156");
        update_option("\163\151\164\145\137\x63\x6b\137\x6c", AESEncryption::encrypt_data("\x74\162\165\x65", $mr));
        update_option("\164\137\163\151\164\x65\x5f\163\164\x61\x74\x75\163", AESEncryption::encrypt_data("\146\141\x6c\x73\x65", $mr));
        $Xd = plugin_dir_path(__FILE__);
        $Va = home_url();
        $Va = trim($Va, "\57");
        if (preg_match("\43\x5e\150\164\164\x70\50\x73\51\x3f\x3a\x2f\57\x23", $Va)) {
            goto Qa;
        }
        $Va = "\x68\x74\x74\160\x3a\57\57" . $Va;
        Qa:
        $Jf = parse_url($Va);
        $dd = preg_replace("\x2f\136\167\x77\x77\134\56\x2f", '', $Jf["\x68\157\163\164"]);
        $M1 = wp_upload_dir();
        $no = $dd . "\x2d" . $M1["\x62\x61\x73\x65\x64\151\162"];
        $rA = hash_hmac("\x73\x68\141\62\x35\66", $no, "\x34\104\110\146\x6a\x67\146\x6a\x61\163\156\144\x66\x73\x61\152\x66\110\x47\x4a");
        $eZ = $this->djkasjdksa();
        $NZ = round(strlen($eZ) / rand(2, 20));
        $eZ = substr_replace($eZ, $rA, $NZ, 0);
        $FA = base64_decode($eZ);
        if (is_writable($Xd . "\154\x69\x63\x65\156\163\145")) {
            goto vs;
        }
        $eZ = str_rot13($eZ);
        $v6 = "\x62\107\116\153\141\155\164\150\x63\62\160\153\141\x33\x4e\150\131\x32\167\x3d";
        $af = base64_decode($v6);
        update_option($af, $eZ);
        goto P4;
        vs:
        file_put_contents($Xd . "\154\x69\143\145\156\163\x65", $FA);
        P4:
        update_option("\154\143\167\x72\164\x6c\146\x73\x61\155\154", true);
        if (!($Yq == "\164\162\x75\x65")) {
            goto hV;
        }
        WP_CLI::success("\x4c\x69\x63\x65\x6e\x73\145\x20\x61\x70\x70\x6c\151\145\144\x20\x73\x75\x63\x63\145\163\163\146\x75\154\x6c\x79\56");
        hV:
        $gA = add_query_arg(array("\x74\141\142" => "\147\145\156\x65\x72\x61\x6c"), $_SERVER["\122\x45\x51\125\x45\x53\124\137\125\x52\111"]);
        SAMLSPUtilities::mo_saml_show_success_message();
        NJ:
        us:
    }
    function mo_cli_save_details($v5, $dB, $lH, $XE, $MA)
    {
        if (mo_saml_is_extension_installed("\143\x75\x72\154")) {
            goto ab;
        }
        WP_CLI::error(Mo_Saml_Cli_Error::CURL_ERROR);
        ab:
        update_option("\x6d\x6f\x5f\163\x61\x6d\154\137\x76\x65\162\151\146\x79\x5f\143\165\x73\x74\157\x6d\145\x72", '');
        delete_option("\155\x6f\137\163\141\x6d\154\137\141\144\x6d\x69\156\137\x65\x6d\x61\x69\x6c");
        delete_option("\x6d\x6f\x5f\x73\141\x6d\154\137\x61\x64\x6d\x69\156\137\160\150\157\156\145");
        delete_option("\163\155\x6c\x5f\x6c\x6b");
        delete_option("\x74\137\x73\x69\x74\145\137\x73\x74\x61\x74\x75\x73");
        delete_option("\x73\x69\164\x65\x5f\x63\x6b\137\154");
        $kr = sanitize_email($XE);
        update_option("\155\157\x5f\x73\141\155\x6c\x5f\x61\x64\x6d\x69\156\137\145\155\141\151\154", $kr);
        $YJ = new CustomerSaml();
        $HO = $YJ->check_customer();
        if ($HO) {
            goto rj;
        }
        WP_CLI::error(Mo_Saml_Cli_Error::POOR_INTERNET);
        rj:
        $HO = json_decode($HO, true);
        if (!(strcasecmp($HO["\163\x74\141\x74\x75\x73"], "\103\x55\123\x54\x4f\x4d\105\x52\x5f\116\117\x54\137\x46\x4f\x55\116\x44") == 0)) {
            goto aL;
        }
        WP_CLI::error(Mo_Saml_Cli_Error::CUSTOMER_NOT_FOUND);
        aL:
        update_option("\155\157\x5f\x73\x61\155\154\x5f\141\x64\155\151\x6e\x5f\x63\165\x73\164\x6f\x6d\145\x72\x5f\153\x65\171", $v5);
        update_option("\155\157\x5f\163\141\155\154\x5f\x61\x64\x6d\151\156\137\141\x70\x69\137\153\x65\171", $dB);
        update_option("\x6d\x6f\x5f\163\x61\155\154\137\x63\165\x73\x74\157\x6d\145\162\x5f\164\x6f\x6b\145\156", $lH);
        delete_option("\155\x6f\x5f\x73\141\x6d\154\x5f\166\145\162\x69\x66\171\x5f\x63\x75\x73\x74\x6f\155\145\162");
        $rV = htmlspecialchars(trim($MA));
        $CE = "\131\x6f\165\162\x20\x6c\151\x63\x65\x6e\x73\x65\40\x69\163\x20\166\145\x72\151\146\151\x65\144\x2e\40\x59\157\165\40\x63\x61\156\x20\x6e\157\x77\40\x73\145\x74\x75\x70\x20\x74\150\x65\40\160\154\165\x67\151\156\x2e";
        $this->djkasjdksaduwaj($rV, $YJ, $CE, "\x74\x72\165\x65");
    }
    function plugin_settings_style($eV)
    {
        if (!("\x69\x6e\x64\145\x78\x2e\160\x68\160" === $eV)) {
            goto ra;
        }
        wp_enqueue_style("\x6d\x6f\x5f\163\141\155\x6c\x5f\x64\141\x73\x68\x62\157\x61\x72\x64\137\x77\151\144\x67\145\164\137\163\164\x79\x6c\x65", plugins_url("\x69\x6e\x63\x6c\x75\x64\x65\163\57\143\x73\163\57\x64\141\163\150\142\157\x61\x72\144\x5f\167\151\144\147\x65\x74\x2e\x6d\151\x6e\x2e\x63\x73\163", __FILE__), array(), Mo_Saml_Options_Plugin_Constants::VERSION, "\x61\154\x6c");
        return;
        ra:
        if (!("\x74\x6f\160\x6c\145\166\x65\154\x5f\160\x61\x67\145\x5f\155\x6f\137\163\x61\155\154\137\x73\x65\x74\x74\x69\x6e\x67\x73" != $eV && "\x6d\151\x6e\151\157\x72\x61\156\147\x65\55\x73\141\x6d\154\55\62\55\60\55\x73\x73\x6f\x5f\160\141\x67\145\x5f\155\157\137\x6d\x61\x6e\x61\147\x65\137\x6c\x69\143\145\x6e\163\x65" != $eV && "\155\151\x6e\x69\157\x72\x61\x6e\x67\145\55\163\x61\155\x6c\55\x32\x2d\x30\x2d\x73\x73\x6f\x5f\x70\141\x67\145\137\x6d\x6f\137\145\162\x72\157\x72\137\143\157\144\145\163" !== $eV)) {
            goto mK;
        }
        return;
        mK:
        if (!(isset($_REQUEST["\x74\141\142"]) && $_REQUEST["\x74\x61\142"] == "\x6c\151\143\x65\156\163\x69\156\x67")) {
            goto Hd;
        }
        wp_enqueue_style("\155\x6f\x5f\x73\x61\x6d\x6c\137\x62\157\157\164\163\x74\x72\141\x70\137\143\163\x73", plugins_url("\x69\156\143\154\165\144\145\x73\57\x63\x73\x73\57\142\x6f\157\164\x73\164\162\x61\160\57\x62\157\x6f\164\x73\x74\162\141\160\x2e\155\x69\x6e\x2e\143\x73\x73", __FILE__), array(), Mo_Saml_Options_Plugin_Constants::VERSION, "\141\154\x6c");
        Hd:
        wp_enqueue_style("\x6d\x6f\x5f\163\x61\155\154\137\x61\x64\x6d\x69\156\137\163\x65\164\x74\151\x6e\x67\163\x5f\x6a\x71\x75\x65\x72\171\x5f\163\164\171\154\145", plugins_url("\x69\x6e\143\154\x75\144\x65\163\57\143\163\x73\x2f\x6a\x71\165\145\162\x79\56\x75\x69\56\155\151\x6e\56\143\x73\163", __FILE__), array(), Mo_Saml_Options_Plugin_Constants::VERSION, "\x61\x6c\154");
        wp_enqueue_style("\155\x6f\137\x73\x61\155\x6c\x5f\141\144\155\x69\156\x5f\x73\145\x74\x74\151\x6e\147\163\x5f\163\164\x79\x6c\x65\137\x74\x72\x61\x63\153\145\x72", plugins_url("\x69\156\143\x6c\165\144\x65\163\x2f\143\x73\163\x2f\160\x72\157\147\x72\145\x73\x73\55\x74\162\x61\143\153\x65\x72\x2e\x63\163\x73", __FILE__), array(), Mo_Saml_Options_Plugin_Constants::VERSION, "\141\x6c\154");
        wp_enqueue_style("\x6d\157\137\x73\141\x6d\x6c\137\x61\x64\155\151\x6e\137\x73\145\164\x74\x69\156\147\x73\x5f\163\164\x79\154\145", plugins_url("\x69\156\x63\154\165\x64\x65\163\x2f\143\163\163\x2f\163\x74\171\154\145\137\163\145\x74\164\x69\x6e\147\163\x2e\155\x69\156\56\143\x73\163", __FILE__), array(), Mo_Saml_Options_Plugin_Constants::VERSION, "\x61\x6c\154");
        wp_enqueue_style("\x6d\x6f\x5f\163\x61\155\154\x5f\141\144\x6d\x69\x6e\x5f\163\x65\164\x74\151\x6e\x67\163\137\x70\x68\157\x6e\145\x5f\163\164\x79\x6c\x65", plugins_url("\x69\156\x63\x6c\165\x64\145\x73\57\x63\x73\x73\57\160\150\157\156\x65\56\x6d\x69\156\56\143\163\x73", __FILE__), array(), Mo_Saml_Options_Plugin_Constants::VERSION, "\x61\154\x6c");
        wp_enqueue_style("\155\157\137\163\x61\155\x6c\x5f\x6d\x61\156\141\x67\145\137\x6c\151\x63\x65\156\x73\x65\137\163\145\x74\164\151\156\x67\163\x5f\163\164\171\x6c\145", plugins_url("\x4c\151\x63\x65\156\x73\145\125\164\151\x6c\163\x2f\x76\151\x65\167\x73\57\x4c\151\x63\x65\156\163\x65\126\151\x65\167\56\x63\x73\163", __FILE__), array(), Mo_Saml_Options_Plugin_Constants::VERSION, "\141\x6c\x6c");
    }
    function plugin_settings_script($eV)
    {
        if (!("\164\157\x70\x6c\145\x76\x65\x6c\x5f\x70\141\x67\x65\x5f\x6d\x6f\137\x73\141\x6d\x6c\x5f\163\x65\164\164\x69\156\x67\163" != $eV && "\155\151\156\151\157\162\x61\x6e\147\145\x2d\163\141\x6d\x6c\55\62\x2d\60\55\x73\163\157\x5f\x70\x61\147\145\x5f\155\157\137\x6d\x61\x6e\141\x67\145\137\154\151\x63\145\156\x73\x65" != $eV && "\155\151\x6e\151\x6f\x72\141\x6e\147\145\55\163\141\x6d\x6c\x2d\x32\55\x30\55\x73\x73\157\137\x70\x61\147\145\137\x6d\x6f\137\x65\162\x72\157\162\x5f\x63\x6f\144\145\x73" !== $eV)) {
            goto Lp;
        }
        return;
        Lp:
        wp_enqueue_script("\x6a\161\x75\x65\162\171");
        wp_enqueue_script("\155\157\x5f\163\141\x6d\154\x5f\x61\x64\x6d\x69\156\137\163\x65\x74\164\x69\156\147\x73\137\x63\157\154\157\x72\137\x73\143\162\151\x70\x74", plugins_url("\x69\x6e\x63\154\x75\x64\145\x73\57\152\163\57\x6a\x73\x63\157\x6c\157\x72\57\152\163\x63\157\154\157\x72\x2e\152\163", __FILE__), array(), Mo_Saml_Options_Plugin_Constants::VERSION, false);
        wp_enqueue_script("\x6d\157\x5f\x73\x61\x6d\x6c\x5f\x61\144\155\151\x6e\x5f\163\145\x74\x74\151\156\147\x73\x5f\163\143\x72\151\160\164", plugins_url("\x69\x6e\x63\154\x75\x64\x65\x73\57\152\163\57\x73\145\164\164\151\x6e\147\x73\x2e\x6d\x69\x6e\56\x6a\x73", __FILE__), array(), Mo_Saml_Options_Plugin_Constants::VERSION, false);
        wp_enqueue_script("\155\x6f\x5f\163\141\x6d\x6c\x5f\x61\x64\x6d\151\x6e\x5f\x73\x65\x74\164\151\x6e\x67\163\x5f\160\150\157\x6e\145\x5f\x73\143\x72\x69\160\x74", plugins_url("\x69\x6e\x63\154\x75\x64\145\163\x2f\x6a\163\57\160\x68\x6f\x6e\x65\56\155\x69\x6e\x2e\x6a\163", __FILE__), array(), Mo_Saml_Options_Plugin_Constants::VERSION, false);
        wp_enqueue_script("\x6d\x6f\x5f\x73\141\x6d\x6c\x5f\141\144\155\x69\156\137\142\157\x6f\164\x73\x74\x72\x61\160\137\163\x63\162\151\160\x74", plugins_url("\151\x6e\x63\x6c\x75\x64\145\163\57\x6a\x73\x2f\142\157\157\164\163\x74\x72\141\x70\x2f\x62\157\x6f\164\x73\x74\x72\x61\160\56\155\151\x6e\x2e\152\x73", __FILE__), array(), Mo_Saml_Options_Plugin_Constants::VERSION, false);
        if (!(isset($_REQUEST["\x74\141\x62"]) && $_REQUEST["\x74\141\x62"] == "\x6c\x69\143\x65\156\x73\x69\x6e\147")) {
            goto Ls;
        }
        wp_enqueue_script("\155\157\x5f\163\x61\x6d\154\x5f\155\x6f\144\x65\162\156\151\x7a\162\x5f\163\x63\x72\x69\x70\x74", plugins_url("\151\156\x63\154\165\x64\x65\163\57\152\x73\57\155\157\144\x65\x72\156\x69\172\x72\56\152\163", __FILE__), array(), Mo_Saml_Options_Plugin_Constants::VERSION, false);
        Ls:
    }
    function mo_saml_activation_message()
    {
        $kh = "\x75\x70\x64\141\x74\x65\144";
        $CE = get_option("\155\x6f\x5f\x73\141\155\154\x5f\x6d\145\x73\163\141\x67\145");
        echo "\x3c\x64\x69\166\x20\143\x6c\x61\163\163\x3d\47" . $kh . "\47\76\40\74\160\76" . $CE . "\x3c\x2f\x70\76\x3c\57\x64\151\x76\x3e";
    }
    function get_empty_strings()
    {
        return '';
    }
    function mo_saml_custom_attr_column($Af)
    {
        $OD = maybe_unserialize(get_option("\163\141\155\154\x5f\163\x68\x6f\x77\x5f\165\x73\145\162\x5f\x61\164\164\x72\x69\142\x75\164\x65"));
        if (!is_array($OD)) {
            goto TI;
        }
        $K5 = maybe_unserialize(get_option("\155\x6f\137\x73\x61\155\154\137\x63\165\x73\164\x6f\x6d\x5f\x61\164\164\162\x73\137\x6d\x61\160\160\x69\156\x67"));
        $p0 = 0;
        if (!(!empty($OD) && is_array($K5))) {
            goto dA;
        }
        foreach ($K5 as $mr => $Wl) {
            if (empty($mr)) {
                goto kq;
            }
            if (!in_array($p0, $OD)) {
                goto tl;
            }
            $Af[$mr] = $mr;
            tl:
            kq:
            $p0++;
            mb:
        }
        FQ:
        dA:
        TI:
        return $Af;
    }
    function mo_saml_attr_column_content($aJ, $tj, $Kn)
    {
        $K5 = maybe_unserialize(get_option("\x6d\x6f\137\x73\x61\155\x6c\137\x63\165\x73\164\x6f\155\x5f\x61\164\164\162\x73\137\155\x61\160\160\x69\156\x67"));
        if (!is_array($K5)) {
            goto uX;
        }
        foreach ($K5 as $mr => $Wl) {
            if (!($mr === $tj)) {
                goto xg;
            }
            $HO = get_user_meta($Kn, $tj, false);
            if (empty($HO)) {
                goto qe;
            }
            if (!is_array($HO[0])) {
                goto bs;
            }
            $OY = '';
            foreach ($HO[0] as $zv) {
                $OY = $OY . $zv;
                if (!next($HO[0])) {
                    goto vP;
                }
                $OY = $OY . "\x20\174\40";
                vP:
                po:
            }
            nR:
            return $OY;
            goto Wq;
            bs:
            return $HO[0];
            Wq:
            qe:
            xg:
            HD:
        }
        w6:
        uX:
        return $aJ;
    }
    static function mo_check_option_admin_referer($RW)
    {
        return !empty($_POST["\157\160\164\151\x6f\x6e"]) and $_POST["\157\x70\164\x69\157\x6e"] == $RW and check_admin_referer($RW);
    }
    function miniorange_login_widget_saml_save_settings()
    {
        if (!current_user_can("\155\141\156\141\x67\x65\137\157\160\164\x69\x6f\156\x73")) {
            goto fP;
        }
        if (!(is_admin() && get_option("\101\x63\164\151\x76\141\x74\145\x64\x5f\x50\x6c\x75\x67\x69\x6e") == "\120\154\165\x67\151\x6e\x2d\x53\154\x75\147")) {
            goto Jf;
        }
        delete_option("\x41\x63\x74\x69\166\x61\164\145\x64\x5f\x50\x6c\165\147\x69\156");
        update_option("\x6d\x6f\x5f\x73\x61\155\x6c\x5f\155\145\163\x73\141\x67\145", "\x47\x6f\x20\164\x6f\40\160\x6c\x75\147\x69\156\40\74\142\76\x3c\x61\40\150\162\145\x66\x3d\x22\141\x64\x6d\x69\x6e\x2e\x70\x68\x70\77\160\x61\x67\145\75\155\x6f\x5f\x73\141\x6d\154\x5f\x73\145\x74\x74\151\156\147\163\x22\x3e\x73\145\x74\x74\x69\x6e\x67\x73\x3c\x2f\141\76\x3c\57\x62\x3e\40\x74\x6f\40\x63\x6f\x6e\x66\x69\147\x75\x72\x65\40\123\101\x4d\x4c\40\123\x69\x6e\x67\154\145\40\123\151\x67\156\x20\x4f\156\40\x62\x79\40\x6d\x69\156\x69\117\162\141\156\147\x65\56");
        add_action("\141\x64\155\x69\x6e\x5f\x6e\157\164\151\x63\145\x73", array($this, "\x6d\157\137\x73\x61\155\154\x5f\141\x63\164\x69\x76\x61\x74\x69\157\x6e\x5f\x6d\x65\x73\x73\x61\147\145"));
        Jf:
        fP:
        if (!(empty($_POST["\x6f\160\164\x69\x6f\156"]) || !current_user_can("\155\141\156\141\x67\x65\137\157\160\x74\151\157\156\163"))) {
            goto sx;
        }
        return;
        sx:
        if (!Mo_Saml_License_Utility::is_customer_license_valid()) {
            goto n0;
        }
        if (self::mo_check_option_admin_referer("\155\x6f\x5f\155\x61\x6e\x61\x67\145\137\154\x69\143\x65\156\x73\145")) {
            goto ES;
        }
        if (self::mo_check_option_admin_referer("\x6d\x6f\x5f\x61\144\144\x69\156\x67\x5f\141\x6c\164\145\162\x6e\x61\x74\145\137\145\x6e\166\x69\162\x6f\x6e\x6d\145\156\x74\x73")) {
            goto hT;
        }
        if (self::mo_check_option_admin_referer("\x6d\x6f\x5f\x63\x68\141\x6e\x67\145\x5f\145\156\x76\x69\x72\x6f\156\x65\x6d\x74")) {
            goto Gs;
        }
        if (self::mo_check_option_admin_referer("\x6c\x6f\x67\x69\156\137\167\x69\x64\x67\x65\164\x5f\163\141\x6d\154\x5f\x73\x61\x76\145\137\x73\145\x74\164\x69\x6e\147\x73")) {
            goto X3;
        }
        if (self::mo_check_option_admin_referer("\x6c\x6f\x67\x69\156\137\x77\x69\x64\147\145\164\137\163\141\155\x6c\x5f\141\164\164\162\151\x62\165\164\x65\137\155\x61\x70\160\x69\x6e\147")) {
            goto iJ;
        }
        if (self::mo_check_option_admin_referer("\x63\x6c\x65\141\x72\137\x61\x74\x74\162\163\137\154\151\x73\x74")) {
            goto o0;
        }
        if (self::mo_check_option_admin_referer("\155\157\137\x73\141\x6d\x6c\x5f\x61\x64\144\x6f\x6e\163\137\155\x65\x73\163\x61\147\x65")) {
            goto wF;
        }
        if (self::mo_check_option_admin_referer("\x6c\x6f\x67\151\x6e\x5f\x77\151\x64\x67\145\x74\x5f\163\141\x6d\x6c\137\x72\x6f\x6c\x65\137\x6d\141\160\x70\x69\156\x67")) {
            goto eT;
        }
        if (self::mo_check_option_admin_referer("\x73\x61\x6d\154\x5f\146\x6f\x72\155\137\x64\x6f\x6d\x61\x69\x6e\x5f\162\145\163\164\162\x69\143\x74\151\157\x6e\137\x6f\x70\x74\151\x6f\x6e")) {
            goto EG;
        }
        if (self::mo_check_option_admin_referer("\x6d\x6f\x5f\x73\141\155\154\x5f\165\160\144\141\164\145\x5f\151\x64\160\137\x73\145\164\164\151\x6e\x67\163\x5f\x6f\x70\x74\x69\157\x6e")) {
            goto V5;
        }
        if (self::mo_check_option_admin_referer("\x73\x61\155\154\137\165\160\x6c\157\x61\x64\x5f\x6d\x65\x74\x61\x64\141\x74\141")) {
            goto Kt;
        }
        if (self::mo_check_option_admin_referer("\165\x70\x67\162\141\144\145\137\143\145\162\164")) {
            goto vh;
        }
        goto tL;
        ES:
        if (isset($_POST["\x6d\157\x5f\145\x6e\141\142\154\x65\137\x6d\x75\154\164\x69\160\154\145\x5f\x6c\x69\143\x65\x6e\163\x65\163"])) {
            goto iH;
        }
        delete_option("\155\157\x5f\145\x6e\x61\x62\154\x65\x5f\x6d\x75\x6c\164\x69\160\154\145\x5f\x6c\x69\x63\x65\x6e\x73\145\163");
        goto nV;
        iH:
        update_option("\x6d\x6f\137\x65\156\x61\x62\154\x65\137\155\165\154\164\x69\160\154\145\137\x6c\151\143\145\156\163\145\163", "\x63\x68\x65\143\x6b\x65\x64");
        initializeLicenseObjectArray();
        nV:
        update_option("\155\x6f\137\x73\x61\x6d\x6c\137\155\x65\x73\163\141\147\145", "\x43\157\156\x66\x69\x67\165\x72\x61\164\x69\157\156\x20\163\141\166\x65\144\x20\x73\165\143\x63\x65\x73\163\x66\165\154\x6c\171");
        SAMLSPUtilities::mo_saml_show_success_message();
        goto tL;
        hT:
        if (updateLicenseObjects($_POST)) {
            goto Pm;
        }
        update_option("\x6d\x6f\137\163\x61\x6d\x6c\x5f\155\x65\x73\x73\x61\x67\145", "\x59\x6f\x75\x72\x20\x63\150\x61\x6e\x67\145\163\x20\x77\x65\162\145\x20\156\x6f\x74\x20\x73\x61\166\145\144\x2e\40\x50\154\x65\141\163\145\x20\160\162\157\166\x69\144\x65\40\165\x6e\x69\x71\x75\x65\x20\166\141\154\165\145\163\40\146\x6f\x72\x20\x79\157\x75\162\40\145\x6e\x76\151\x72\157\x6e\x6d\x65\x6e\x74\163\x20\x61\x6e\x64\x20\x64\157\156\47\164\x20\x72\145\155\157\x76\145\40\164\150\x65\40\x63\165\162\162\145\x6e\164\40\x65\156\166\x69\x72\157\156\155\145\x6e\x74");
        SAMLSPUtilities::mo_saml_show_error_message();
        goto WG;
        Pm:
        update_option("\x6d\x6f\137\x73\x61\155\154\137\155\x65\x73\x73\x61\x67\x65", "\105\x6e\x76\151\x72\x6f\156\155\x65\156\x74\163\x20\165\x70\144\x61\164\x65\144\40\163\165\143\143\145\163\x73\146\x75\x6c\x6c\x79");
        SAMLSPUtilities::mo_saml_show_success_message();
        WG:
        goto tL;
        Gs:
        update_option("\155\x6f\137\x73\x61\x6d\x6c\x5f\163\145\x6c\145\143\164\x65\144\x5f\x65\x6e\166\x69\x72\x6f\x6e\x6d\x65\x6e\x74", $_POST["\x65\x6e\166\151\x72\157\x6e\x6d\145\x6e\x74"]);
        update_option("\x6d\157\x5f\163\141\x6d\154\x5f\155\x65\x73\x73\x61\x67\x65", "\105\156\166\x69\x72\x6f\156\x6d\x65\x6e\x74\x20\143\150\141\156\147\145\144\x20\163\165\x63\143\145\x73\x73\146\165\154\154\171");
        SAMLSPUtilities::mo_saml_show_success_message();
        goto tL;
        X3:
        if (mo_saml_is_extension_installed("\143\x75\162\154")) {
            goto be;
        }
        update_option("\x6d\x6f\x5f\163\141\x6d\154\137\x6d\x65\x73\x73\141\x67\x65", "\x45\122\122\x4f\122\72\x20\x50\x48\x50\40\x63\125\x52\x4c\x20\145\170\164\145\156\x73\151\x6f\x6e\40\151\x73\40\156\157\164\40\151\156\163\164\141\x6c\154\145\144\40\157\162\x20\x64\x69\163\141\x62\x6c\145\144\x2e\40\123\141\166\145\40\111\x64\145\156\x74\x69\164\171\x20\120\x72\x6f\166\x69\x64\145\162\40\103\x6f\x6e\x66\151\147\x75\162\x61\x74\151\x6f\156\x20\146\141\x69\x6c\145\144\x2e");
        SAMLSPUtilities::mo_saml_show_error_message();
        return;
        be:
        $S0 = LicenseHelper::getSelectedEnvironment();
        mo_save_environment_settings($_POST);
        if (!($S0 and $S0 != LicenseHelper::getCurrentEnvironment())) {
            goto AO;
        }
        return;
        AO:
        $aY = '';
        $fg = '';
        $bV = '';
        $os = '';
        $QH = '';
        $W1 = '';
        $CD = '';
        $mG = '';
        $Kp = '';
        if (empty($_POST["\x73\x61\x6d\154\137\x69\144\x65\x6e\x74\151\164\171\x5f\156\141\x6d\145"]) || empty($_POST["\163\x61\x6d\154\137\154\157\147\x69\156\137\165\162\x6c"]) || empty($_POST["\x73\141\155\154\x5f\151\163\163\165\145\x72"]) || empty($_POST["\x73\x61\x6d\154\x5f\x6e\x61\155\145\x69\x64\137\x66\157\x72\x6d\x61\164"])) {
            goto rN;
        }
        if (!preg_match("\x2f\x5e\x5c\167\52\44\57", $_POST["\163\141\x6d\x6c\137\151\x64\145\x6e\x74\151\x74\171\137\x6e\141\155\x65"])) {
            goto CW;
        }
        if (!empty($_POST["\163\171\156\x63\137\x6d\145\164\141\x64\141\x74\141"]) && !empty($_POST["\155\145\164\x61\x64\141\164\141\x5f\165\x72\154"]) && !empty($_POST["\x73\171\156\x63\x5f\151\x6e\x74\145\x72\166\141\x6c"])) {
            goto P3;
        }
        $this->mo_saml_disable_metadata_sync();
        goto yg;
        P3:
        SAMLSPUtilities::update_metadata_cron($_POST["\163\171\156\143\x5f\x69\156\x74\145\162\166\141\154"], $_POST["\x6d\145\164\x61\144\141\164\141\137\x75\x72\154"]);
        yg:
        $aY = htmlspecialchars(trim($_POST["\163\x61\155\x6c\137\151\x64\145\x6e\x74\151\164\171\137\156\x61\x6d\145"]));
        $bV = htmlspecialchars(trim($_POST["\x73\141\155\154\137\154\x6f\147\x69\156\137\x75\x72\154"]));
        if (empty($_POST["\163\141\x6d\x6c\137\x6c\157\x67\x69\x6e\x5f\142\x69\156\x64\151\x6e\147\137\164\171\x70\145"])) {
            goto cI;
        }
        $fg = htmlspecialchars($_POST["\x73\x61\x6d\154\x5f\154\x6f\x67\x69\156\137\x62\151\x6e\x64\x69\x6e\x67\137\x74\x79\x70\145"]);
        cI:
        if (empty($_POST["\163\x61\x6d\x6c\x5f\154\157\x67\157\165\x74\x5f\x62\x69\156\x64\x69\156\x67\x5f\x74\x79\x70\x65"])) {
            goto xu;
        }
        $os = htmlspecialchars($_POST["\x73\x61\155\154\x5f\x6c\157\147\157\x75\164\x5f\x62\x69\156\144\x69\156\x67\x5f\164\x79\160\x65"]);
        xu:
        if (empty($_POST["\x73\x61\155\154\x5f\154\157\x67\157\165\164\137\165\x72\x6c"])) {
            goto so;
        }
        $QH = htmlspecialchars(trim($_POST["\x73\141\x6d\154\x5f\154\157\147\x6f\x75\164\x5f\165\162\x6c"]));
        so:
        $W1 = htmlspecialchars(trim($_POST["\x73\141\155\154\137\151\x73\163\x75\145\162"]));
        if (empty($_POST["\x6d\x6f\137\x73\141\155\x6c\137\x69\144\x65\156\164\151\164\171\137\160\x72\x6f\x76\151\x64\145\162\137\x69\x64\145\x6e\x74\x69\146\x69\145\162\137\x6e\141\155\x65"])) {
            goto Zj;
        }
        $vh = htmlspecialchars($_POST["\155\x6f\137\163\141\155\x6c\x5f\x69\144\x65\x6e\x74\x69\x74\171\137\160\x72\x6f\166\151\144\x65\x72\137\x69\144\145\x6e\164\151\x66\151\145\x72\137\156\x61\155\145"]);
        update_option("\x6d\157\137\163\x61\x6d\154\x5f\151\144\x65\x6e\164\x69\x74\x79\137\160\x72\157\x76\x69\x64\x65\162\137\x69\x64\145\x6e\x74\151\x66\x69\x65\162\x5f\x6e\141\155\x65", $vh);
        Zj:
        $CD = $_POST["\x73\141\x6d\154\137\170\x35\60\x39\137\x63\x65\x72\x74\x69\x66\151\143\141\164\145"];
        $Kp = htmlspecialchars($_POST["\x73\x61\155\x6c\137\x6e\141\155\x65\151\144\x5f\x66\x6f\162\x6d\x61\164"]);
        goto e5;
        CW:
        update_option("\x6d\x6f\x5f\x73\x61\155\x6c\137\155\145\163\x73\x61\147\x65", "\120\x6c\x65\141\163\x65\x20\x6d\141\x74\143\x68\40\164\150\145\x20\x72\145\161\165\145\163\164\145\x64\40\146\x6f\x72\x6d\141\164\x20\x66\157\162\40\111\x64\145\156\164\x69\164\x79\40\x50\162\157\166\x69\144\145\x72\40\116\x61\155\x65\56\x20\x4f\x6e\x6c\x79\x20\x61\154\x70\150\x61\142\145\x74\x73\54\40\x6e\165\x6d\x62\x65\x72\x73\x20\141\x6e\144\40\x75\x6e\x64\x65\x72\163\143\x6f\162\145\40\x69\163\40\141\154\154\157\x77\145\144\56");
        SAMLSPUtilities::mo_saml_show_error_message();
        return;
        e5:
        goto GK;
        rN:
        update_option("\155\x6f\x5f\x73\141\155\154\137\x6d\x65\163\x73\141\147\x65", "\101\154\154\x20\x74\x68\145\x20\x66\x69\x65\x6c\144\163\x20\141\162\145\x20\162\145\161\x75\x69\162\x65\144\56\x20\x50\x6c\145\x61\163\x65\x20\145\x6e\x74\145\162\40\166\141\154\151\x64\x20\145\x6e\164\162\x69\145\x73\56");
        SAMLSPUtilities::mo_saml_show_error_message();
        return;
        GK:
        update_option("\163\x61\155\154\x5f\151\x64\x65\156\x74\151\164\171\x5f\156\x61\155\x65", $aY);
        update_option("\x73\x61\155\154\137\x6c\x6f\147\x69\x6e\137\x62\x69\156\144\151\156\147\137\164\x79\160\x65", $fg);
        update_option("\x73\x61\155\x6c\137\x6c\x6f\147\151\x6e\137\165\x72\154", $bV);
        update_option("\x73\141\155\154\137\154\157\147\x6f\x75\164\x5f\x62\x69\x6e\x64\x69\x6e\x67\x5f\x74\x79\160\x65", $os);
        update_option("\x73\x61\x6d\154\137\154\x6f\x67\x6f\x75\x74\x5f\165\x72\x6c", $QH);
        update_option("\x73\x61\x6d\154\137\151\163\x73\x75\x65\x72", $W1);
        update_option("\163\141\x6d\154\x5f\156\x61\x6d\x65\151\144\x5f\x66\157\x72\155\x61\164", $Kp);
        if (isset($_POST["\x73\x61\155\x6c\x5f\162\x65\x71\x75\x65\x73\x74\137\163\x69\x67\156\145\144"])) {
            goto hG;
        }
        update_option("\x73\141\155\154\x5f\162\145\161\x75\145\163\164\x5f\163\x69\x67\156\145\144", "\x75\156\x63\x68\145\x63\153\x65\x64");
        goto Wc;
        hG:
        update_option("\163\141\155\154\137\162\x65\161\x75\x65\x73\164\x5f\x73\x69\147\x6e\145\x64", "\x63\x68\145\x63\x6b\145\144");
        Wc:
        foreach ($CD as $mr => $Wl) {
            if (empty($Wl)) {
                goto QY;
            }
            $CD[$mr] = SAMLSPUtilities::sanitize_certificate($Wl);
            if (@openssl_x509_read($CD[$mr])) {
                goto ZE;
            }
            update_option("\x6d\157\x5f\163\141\x6d\154\137\x6d\x65\x73\x73\x61\147\145", "\111\156\166\141\154\151\144\40\143\145\162\164\x69\146\151\143\141\164\x65\72\40\120\154\x65\141\163\x65\x20\160\162\x6f\x76\x69\x64\x65\40\141\40\166\141\x6c\151\x64\40\143\x65\162\x74\x69\x66\x69\x63\141\x74\x65\56");
            SAMLSPUtilities::mo_saml_show_error_message();
            delete_option("\163\141\155\154\137\x78\65\60\x39\137\143\x65\x72\x74\x69\146\151\143\x61\164\145");
            return;
            ZE:
            goto yI;
            QY:
            unset($CD[$mr]);
            yI:
            jp:
        }
        mp:
        if (!empty($CD)) {
            goto ej;
        }
        update_option("\155\x6f\x5f\163\141\155\154\137\155\145\163\163\141\x67\145", "\111\x6e\x76\x61\x6c\151\144\x20\103\x65\162\x74\151\x66\151\x63\141\x74\x65\x3a\120\x6c\145\x61\x73\145\x20\160\162\157\x76\x69\x64\145\40\141\x20\143\145\x72\x74\151\x66\151\143\x61\164\x65");
        SAMLSPUtilities::mo_saml_show_error_message();
        return;
        ej:
        update_option("\163\141\x6d\154\x5f\170\x35\x30\x39\x5f\x63\x65\x72\164\151\146\151\x63\x61\164\x65", maybe_serialize($CD));
        if (isset($_POST["\x73\x61\x6d\x6c\137\x72\145\163\160\157\156\163\x65\x5f\x73\x69\147\156\x65\x64"])) {
            goto J4;
        }
        update_option("\163\141\155\154\x5f\x72\145\163\160\157\x6e\x73\145\137\x73\151\147\x6e\x65\144", "\x59\x65\x73");
        goto xT;
        J4:
        update_option("\163\x61\155\x6c\x5f\162\145\x73\x70\157\156\x73\x65\137\163\x69\147\156\145\144", "\x63\150\145\143\153\x65\144");
        xT:
        if (isset($_POST["\x73\141\155\x6c\x5f\x61\163\163\x65\x72\x74\x69\157\156\137\163\x69\147\156\x65\x64"])) {
            goto EH;
        }
        update_option("\x73\141\155\154\137\141\163\163\x65\162\164\x69\157\x6e\137\x73\x69\x67\156\145\x64", "\131\x65\x73");
        goto XO;
        EH:
        update_option("\163\141\x6d\x6c\x5f\141\163\x73\145\x72\x74\151\x6f\156\x5f\x73\x69\x67\156\145\x64", "\x63\150\x65\x63\153\x65\144");
        XO:
        if (isset($_POST["\155\157\137\163\x61\x6d\x6c\137\x65\x6e\143\x6f\x64\151\x6e\147\137\x65\156\x61\x62\154\x65\144"])) {
            goto wR;
        }
        update_option("\x6d\x6f\x5f\x73\141\x6d\x6c\137\x65\x6e\x63\x6f\144\x69\156\x67\137\x65\x6e\x61\142\x6c\x65\144", "\165\156\143\150\145\143\153\145\x64");
        goto vK;
        wR:
        update_option("\x6d\x6f\137\x73\x61\155\x6c\137\x65\x6e\x63\157\x64\x69\x6e\x67\137\x65\156\x61\142\x6c\145\x64", "\x63\150\145\x63\153\x65\144");
        vK:
        update_option("\x6d\x6f\x5f\163\x61\155\x6c\x5f\x6d\x65\x73\163\x61\x67\x65", "\x49\x64\x65\x6e\x74\151\164\x79\40\120\x72\x6f\x76\x69\x64\145\162\x20\144\x65\164\x61\151\x6c\x73\x20\163\x61\x76\x65\x64\40\163\x75\x63\143\145\163\x73\146\165\154\x6c\171\x2e");
        SAMLSPUtilities::mo_saml_show_success_message();
        goto tL;
        iJ:
        if (mo_saml_is_extension_installed("\x63\165\162\154")) {
            goto Pg;
        }
        update_option("\155\157\x5f\163\x61\x6d\x6c\x5f\x6d\145\x73\x73\x61\x67\145", "\105\122\x52\117\122\x3a\x20\x50\110\x50\x20\x63\x55\x52\114\x20\145\170\164\145\x6e\163\x69\x6f\156\40\x69\x73\40\x6e\x6f\164\40\151\x6e\x73\x74\x61\x6c\154\145\x64\40\157\162\x20\x64\151\x73\x61\x62\x6c\x65\x64\x2e\40\123\141\x76\x65\40\x41\164\164\x72\x69\142\x75\x74\x65\x20\115\x61\x70\160\x69\156\147\x20\146\141\151\154\x65\144\x2e");
        SAMLSPUtilities::mo_saml_show_error_message();
        return;
        Pg:
        $S0 = LicenseHelper::getSelectedEnvironment();
        mo_save_environment_settings($_POST);
        if (!($S0 and $S0 != LicenseHelper::getCurrentEnvironment())) {
            goto X8;
        }
        return;
        X8:
        update_option("\163\141\155\154\x5f\141\155\137\x75\x73\x65\162\x6e\x61\155\x65", htmlspecialchars(stripslashes($_POST["\x73\x61\155\154\x5f\x61\x6d\137\x75\x73\145\162\x6e\141\x6d\x65"])));
        update_option("\x73\141\x6d\154\x5f\x61\x6d\137\145\x6d\x61\151\154", htmlspecialchars(stripslashes($_POST["\x73\x61\x6d\154\137\x61\x6d\137\x65\x6d\141\x69\x6c"])));
        update_option("\x73\x61\155\x6c\137\141\x6d\137\x66\151\162\163\x74\137\156\141\155\x65", htmlspecialchars(stripslashes($_POST["\x73\x61\x6d\x6c\x5f\x61\155\137\x66\151\x72\163\164\137\x6e\x61\155\x65"])));
        update_option("\x73\x61\155\154\137\141\x6d\137\x6c\x61\x73\x74\137\156\141\155\x65", htmlspecialchars(stripslashes($_POST["\x73\x61\x6d\x6c\137\x61\155\137\x6c\x61\x73\164\137\x6e\141\155\x65"])));
        update_option("\x73\x61\x6d\154\137\141\x6d\137\147\x72\157\165\160\137\156\x61\155\145", htmlspecialchars(stripslashes($_POST["\163\x61\155\x6c\137\141\x6d\137\x67\x72\x6f\x75\160\137\156\x61\x6d\145"])));
        update_option("\x73\x61\x6d\154\137\x61\x6d\x5f\x64\151\163\x70\154\x61\171\x5f\x6e\x61\x6d\x65", htmlspecialchars(stripslashes($_POST["\x73\x61\155\x6c\x5f\141\155\x5f\144\151\163\x70\x6c\x61\171\137\x6e\141\x6d\145"])));
        $K5 = array();
        $hl = array();
        $o9 = array();
        $SH = array();
        if (empty($_POST["\155\x6f\x5f\163\141\155\x6c\x5f\x63\165\163\164\x6f\155\137\141\164\x74\162\x69\142\165\164\x65\x5f\x6b\x65\x79\x73"])) {
            goto tt;
        }
        $hl = $_POST["\155\157\x5f\x73\141\155\154\x5f\x63\165\x73\x74\x6f\155\137\141\164\x74\162\x69\142\x75\164\x65\137\153\x65\171\163"];
        tt:
        if (empty($_POST["\x6d\x6f\137\x73\x61\x6d\154\x5f\143\165\163\x74\x6f\155\x5f\141\164\164\x72\x69\x62\x75\x74\145\x5f\166\x61\154\x75\145\x73"])) {
            goto ur;
        }
        $o9 = $_POST["\x6d\157\137\163\141\x6d\x6c\x5f\143\x75\163\164\157\x6d\137\141\x74\164\x72\x69\142\165\164\x65\137\x76\x61\x6c\165\145\163"];
        ur:
        $qa = count($hl);
        if (!($qa > 0)) {
            goto sE;
        }
        $hl = array_map("\x68\x74\x6d\154\x73\160\x65\x63\x69\141\x6c\x63\150\x61\x72\163", $hl);
        $o9 = array_map("\x68\164\155\154\x73\160\145\143\x69\141\x6c\143\x68\x61\x72\x73", $o9);
        $lo = 0;
        no:
        if (!($lo < $qa)) {
            goto YO;
        }
        if (empty($_POST["\x6d\157\x5f\x73\141\155\x6c\137\x64\x69\163\x70\154\x61\171\137\141\x74\164\x72\151\142\165\164\145\137" . $lo])) {
            goto AA;
        }
        array_push($SH, $lo);
        AA:
        $lo++;
        goto no;
        YO:
        sE:
        update_option("\x73\x61\155\x6c\x5f\163\x68\x6f\x77\137\165\x73\x65\162\137\141\164\x74\x72\151\142\165\x74\x65", $SH);
        $K5 = array_combine($hl, $o9);
        $K5 = array_filter($K5);
        if (!empty($K5)) {
            goto Vh;
        }
        $K5 = get_option("\155\x6f\x5f\x73\141\155\x6c\137\143\165\x73\164\x6f\x6d\137\x61\x74\x74\x72\163\137\x6d\141\x70\160\151\156\x67");
        if (empty($K5)) {
            goto Fd;
        }
        delete_option("\155\157\x5f\x73\x61\155\154\x5f\x63\165\x73\164\157\x6d\137\141\164\x74\162\x73\x5f\x6d\x61\160\160\151\x6e\x67");
        Fd:
        goto tD;
        Vh:
        update_option("\155\157\137\163\x61\155\154\x5f\x63\165\x73\x74\157\x6d\x5f\x61\x74\x74\x72\x73\x5f\155\141\160\160\151\156\x67", $K5);
        tD:
        update_option("\x6d\157\x5f\163\141\155\154\x5f\x6d\x65\x73\x73\x61\147\x65", "\101\x74\x74\x72\151\142\x75\164\145\x20\x4d\x61\160\160\151\156\x67\x20\x64\145\x74\141\151\154\x73\40\x73\141\x76\145\x64\x20\163\x75\143\143\x65\163\x73\x66\x75\154\154\171");
        SAMLSPUtilities::mo_saml_show_success_message();
        goto tL;
        o0:
        delete_option("\155\x6f\x5f\x73\x61\155\154\137\164\145\x73\x74\x5f\143\x6f\156\x66\151\147\137\x61\164\164\162\x73");
        update_option("\155\x6f\x5f\163\141\x6d\154\137\x6d\x65\163\x73\141\147\x65", "\101\x74\164\x72\x69\142\x75\164\x65\x73\x20\x6c\151\x73\x74\40\x72\x65\155\157\x76\x65\x64\x20\163\165\143\x63\145\x73\x73\x66\165\x6c\154\171");
        SAMLSPUtilities::mo_saml_show_success_message();
        goto tL;
        wF:
        update_option("\155\157\x5f\163\x61\155\154\137\163\150\157\167\137\141\x64\x64\x6f\x6e\163\x5f\156\157\164\151\143\145", 1);
        goto tL;
        eT:
        $S0 = LicenseHelper::getSelectedEnvironment();
        mo_save_environment_settings($_POST);
        if (!($S0 and $S0 != LicenseHelper::getCurrentEnvironment())) {
            goto Ae;
        }
        return;
        Ae:
        if (mo_saml_is_extension_installed("\143\x75\162\x6c")) {
            goto hz;
        }
        update_option("\155\x6f\137\x73\141\155\154\x5f\155\145\163\163\x61\147\145", "\105\122\122\x4f\x52\x3a\40\120\110\120\40\143\125\x52\x4c\40\x65\170\164\145\x6e\x73\x69\157\x6e\40\151\163\x20\x6e\157\x74\x20\151\x6e\x73\x74\x61\x6c\x6c\x65\x64\40\x6f\x72\x20\x64\x69\163\x61\x62\154\x65\144\x2e\x20\123\141\x76\x65\40\122\157\x6c\145\x20\115\x61\x70\x70\x69\x6e\x67\x20\146\x61\x69\x6c\x65\144\x2e");
        SAMLSPUtilities::mo_saml_show_error_message();
        return;
        hz:
        if (empty($_POST["\x73\141\155\x6c\x5f\x61\155\x5f\x64\x65\146\x61\165\154\164\137\165\x73\x65\162\137\162\x6f\x6c\x65"])) {
            goto uV;
        }
        $yU = htmlspecialchars($_POST["\163\x61\x6d\x6c\137\141\x6d\137\x64\145\x66\141\x75\x6c\164\x5f\165\x73\145\x72\x5f\x72\157\154\x65"]);
        update_option("\x73\141\x6d\154\x5f\141\x6d\x5f\x64\x65\x66\x61\165\x6c\164\x5f\x75\x73\x65\x72\137\x72\157\154\145", $yU);
        uV:
        if (isset($_POST["\x73\141\155\154\137\141\x6d\x5f\x64\x6f\x6e\164\137\x61\154\154\157\x77\x5f\165\156\154\x69\163\x74\145\x64\137\x75\x73\145\x72\137\162\x6f\x6c\x65"])) {
            goto ZC;
        }
        update_option("\163\x61\x6d\154\x5f\x61\155\137\x64\157\156\x74\x5f\141\154\x6c\157\167\137\x75\156\154\151\163\164\145\144\137\165\x73\145\162\x5f\x72\157\154\145", "\x75\x6e\x63\150\x65\143\x6b\x65\x64");
        goto QS;
        ZC:
        update_option("\163\141\x6d\154\x5f\x61\x6d\x5f\144\x65\146\x61\x75\154\164\137\x75\x73\x65\x72\x5f\x72\x6f\154\145", false);
        update_option("\163\x61\155\x6c\x5f\141\155\x5f\144\x6f\x6e\x74\x5f\141\x6c\154\x6f\x77\x5f\165\156\154\x69\x73\164\145\x64\x5f\165\x73\x65\162\137\x72\157\154\145", "\x63\150\x65\x63\153\145\x64");
        QS:
        if (isset($_POST["\155\x6f\x5f\x73\x61\155\154\137\x64\157\156\x74\137\x63\162\145\141\x74\x65\x5f\165\163\145\x72\137\x69\x66\x5f\162\157\x6c\x65\137\156\157\164\137\x6d\141\x70\160\145\144"])) {
            goto Rt;
        }
        update_option("\x6d\157\137\163\x61\x6d\x6c\x5f\x64\157\156\x74\x5f\x63\x72\x65\x61\164\145\x5f\165\163\145\162\x5f\x69\146\137\x72\157\154\x65\137\x6e\x6f\x74\137\x6d\141\160\x70\145\x64", "\x75\x6e\143\150\x65\x63\x6b\x65\x64");
        goto L4;
        Rt:
        update_option("\x6d\157\x5f\x73\x61\155\154\x5f\x64\x6f\156\x74\x5f\143\162\145\141\164\145\137\x75\x73\145\x72\x5f\151\146\137\x72\x6f\x6c\x65\x5f\x6e\157\x74\137\155\x61\x70\x70\145\144", "\x63\150\145\143\153\x65\x64");
        update_option("\163\x61\x6d\x6c\x5f\x61\x6d\x5f\144\x65\x66\141\165\x6c\x74\137\x75\x73\145\162\137\162\x6f\x6c\145", false);
        update_option("\x73\141\155\x6c\137\x61\155\x5f\x64\x6f\156\164\x5f\141\154\x6c\x6f\167\137\165\x6e\154\151\x73\164\x65\x64\x5f\x75\x73\145\x72\x5f\x72\x6f\154\x65", "\x75\156\143\x68\145\x63\x6b\145\x64");
        L4:
        if (isset($_POST["\x6d\x6f\x5f\163\141\x6d\154\x5f\144\157\156\x74\137\x75\x70\144\x61\x74\x65\137\145\x78\x69\x73\x74\151\156\147\137\x75\x73\x65\162\x5f\x72\x6f\x6c\145"])) {
            goto vl;
        }
        update_option("\163\x61\155\154\137\x61\x6d\x5f\x64\157\x6e\164\x5f\x75\160\x64\x61\x74\x65\x5f\x65\170\x69\163\x74\x69\x6e\147\137\165\163\x65\x72\x5f\162\x6f\154\145", "\165\156\x63\x68\145\x63\153\145\x64");
        goto r9;
        vl:
        update_option("\163\141\155\x6c\x5f\141\x6d\x5f\144\x6f\156\x74\137\165\160\x64\141\164\x65\x5f\x65\x78\x69\x73\x74\x69\x6e\x67\137\165\x73\145\162\137\162\157\x6c\x65", "\143\x68\145\x63\153\x65\x64");
        update_option("\163\x61\155\x6c\x5f\141\155\137\x75\x70\x64\x61\x74\145\x5f\x61\144\x6d\151\x6e\x5f\165\x73\145\x72\163\137\x72\157\x6c\x65", "\x75\x6e\143\x68\145\x63\x6b\145\x64");
        r9:
        if (isset($_POST["\x6d\157\137\x73\x61\155\154\x5f\x75\160\x64\x61\x74\x65\137\141\x64\155\151\156\x5f\165\x73\145\162\163\x5f\x72\x6f\x6c\x65"])) {
            goto Q9;
        }
        update_option("\163\141\x6d\154\137\x61\155\x5f\x75\x70\144\x61\164\145\137\141\x64\155\151\x6e\x5f\165\163\x65\x72\163\x5f\162\x6f\154\145", "\x75\x6e\143\150\x65\x63\153\145\x64");
        goto Hm;
        Q9:
        update_option("\163\141\155\x6c\137\x61\155\137\x75\x70\144\141\164\x65\137\141\144\x6d\x69\156\x5f\x75\x73\x65\x72\163\137\x72\x6f\x6c\x65", "\x63\x68\x65\143\153\x65\144");
        Hm:
        if (isset($_POST["\x6d\157\137\163\x61\x6d\154\137\144\157\x6e\164\x5f\x61\x6c\154\x6f\167\x5f\165\x73\145\162\x5f\164\x6f\x6c\157\x67\x69\156\137\143\x72\145\141\x74\x65\x5f\167\151\164\x68\137\147\151\x76\x65\x6e\137\x67\162\x6f\165\x70\163"])) {
            goto Jm;
        }
        update_option("\163\141\155\x6c\x5f\141\x6d\x5f\x64\x6f\x6e\164\x5f\141\154\x6c\157\167\x5f\165\x73\x65\x72\137\164\157\154\x6f\x67\x69\156\137\143\x72\145\141\x74\x65\x5f\x77\151\164\150\x5f\x67\151\166\x65\156\137\x67\x72\157\x75\x70\163", "\165\156\143\x68\x65\x63\153\145\144");
        goto gA;
        Jm:
        update_option("\163\141\155\x6c\137\x61\x6d\x5f\144\x6f\156\164\137\x61\154\x6c\x6f\x77\x5f\x75\x73\145\x72\x5f\164\x6f\154\x6f\147\151\156\x5f\143\x72\145\141\x74\x65\x5f\167\x69\x74\x68\x5f\147\151\166\145\156\x5f\x67\x72\x6f\x75\160\x73", "\x63\150\145\x63\x6b\145\144");
        if (isset($_POST["\x6d\x6f\137\163\141\155\x6c\137\x72\x65\x73\x74\x72\151\x63\164\x5f\165\x73\x65\162\x73\x5f\x77\151\164\150\137\x67\x72\x6f\x75\160\x73"])) {
            goto Sm;
        }
        update_option("\155\157\137\163\x61\155\x6c\137\162\145\x73\x74\162\x69\143\x74\137\165\x73\145\162\x73\x5f\x77\151\164\x68\137\x67\162\x6f\165\160\x73", '');
        goto vO;
        Sm:
        update_option("\x6d\157\x5f\x73\x61\155\154\x5f\x72\145\x73\x74\x72\151\143\x74\x5f\165\x73\x65\162\x73\x5f\x77\x69\x74\150\x5f\x67\162\x6f\165\x70\163", htmlspecialchars(stripslashes($_POST["\x6d\x6f\x5f\163\x61\x6d\x6c\x5f\x72\x65\x73\x74\x72\x69\143\x74\137\x75\163\x65\162\x73\137\167\x69\x74\x68\x5f\147\x72\157\x75\160\x73"])));
        vO:
        gA:
        $wp_roles = new WP_Roles();
        $y0 = $wp_roles->get_names();
        $p5 = array();
        foreach ($y0 as $Wt => $or) {
            $z1 = "\163\141\x6d\x6c\137\141\155\137\147\x72\x6f\165\x70\137\x61\x74\164\x72\137\166\x61\154\165\145\163\x5f" . $Wt;
            $p5[$Wt] = htmlspecialchars(stripslashes($_POST[$z1]));
            tB:
        }
        z0:
        update_option("\163\141\155\x6c\137\x61\155\x5f\x72\157\154\145\137\x6d\x61\160\x70\151\156\x67", $p5);
        update_option("\x6d\157\x5f\163\141\155\154\x5f\155\x65\163\163\x61\147\x65", "\x52\157\x6c\145\40\x4d\141\x70\160\151\x6e\x67\40\144\145\x74\x61\x69\154\163\x20\163\141\166\145\x64\x20\x73\165\143\143\145\163\x73\146\165\x6c\x6c\171\x2e");
        SAMLSPUtilities::mo_saml_show_success_message();
        goto tL;
        EG:
        $S0 = LicenseHelper::getSelectedEnvironment();
        mo_save_environment_settings($_POST);
        if (!($S0 and $S0 != LicenseHelper::getCurrentEnvironment())) {
            goto Ij;
        }
        return;
        Ij:
        $yf = !empty($_POST["\x6d\x6f\x5f\x73\x61\155\x6c\x5f\x65\156\141\142\154\145\x5f\144\157\x6d\x61\151\156\x5f\162\x65\163\x74\162\151\x63\164\x69\157\156\137\154\x6f\147\151\x6e"]) ? htmlspecialchars($_POST["\155\x6f\137\x73\141\x6d\x6c\x5f\x65\156\141\142\x6c\145\x5f\144\157\155\141\151\x6e\137\x72\145\163\164\162\x69\143\164\x69\x6f\x6e\x5f\x6c\157\147\151\156"]) : '';
        $hf = !empty($_POST["\x6d\157\x5f\163\x61\155\154\x5f\141\x6c\x6c\157\167\x5f\144\x65\x6e\171\x5f\x75\x73\x65\x72\137\x77\x69\164\x68\x5f\144\x6f\x6d\x61\151\156"]) ? htmlspecialchars($_POST["\x6d\157\137\x73\x61\x6d\x6c\x5f\141\154\x6c\x6f\x77\x5f\x64\x65\156\171\137\x75\163\145\162\137\x77\151\164\150\137\144\x6f\155\141\x69\156"]) : "\x61\x6c\x6c\157\167";
        $Vv = !empty($_POST["\x73\x61\155\x6c\137\141\155\x5f\145\x6d\141\x69\x6c\137\144\157\155\x61\151\156\163"]) ? htmlspecialchars($_POST["\x73\x61\155\x6c\x5f\x61\x6d\137\x65\x6d\141\151\154\137\x64\157\x6d\x61\151\x6e\163"]) : '';
        update_option("\x6d\157\x5f\x73\x61\x6d\x6c\x5f\145\156\x61\x62\154\x65\137\144\157\155\x61\151\x6e\x5f\x72\x65\163\164\162\x69\x63\x74\151\x6f\156\x5f\154\157\147\151\156", $yf);
        update_option("\x6d\x6f\x5f\163\x61\x6d\154\x5f\141\x6c\x6c\x6f\167\137\x64\x65\x6e\171\x5f\165\163\145\162\x5f\x77\151\x74\x68\137\144\x6f\x6d\x61\151\156", $hf);
        update_option("\163\x61\155\154\x5f\141\155\137\145\155\141\x69\154\x5f\x64\157\x6d\141\151\x6e\x73", $Vv);
        update_option("\155\x6f\x5f\x73\141\155\x6c\x5f\x6d\145\x73\x73\x61\x67\x65", "\104\x6f\x6d\x61\151\156\x20\x52\x65\163\x74\x72\x69\x63\x74\x69\x6f\156\x20\150\141\163\40\142\x65\145\156\x20\x73\141\x76\145\144\x20\x73\x75\x63\143\x65\163\163\x66\165\x6c\154\x79\56");
        SAMLSPUtilities::mo_saml_show_success_message();
        goto tL;
        V5:
        if (!(!empty($_POST["\x6d\157\x5f\163\x61\x6d\x6c\137\x73\160\137\x62\141\x73\x65\x5f\165\162\154"]) && !empty($_POST["\x6d\x6f\x5f\163\x61\155\154\137\163\160\137\x65\156\164\151\x74\171\137\151\144"]))) {
            goto YZ;
        }
        $j1 = htmlspecialchars($_POST["\155\157\x5f\x73\x61\x6d\154\137\163\160\x5f\x62\141\x73\x65\137\x75\x72\x6c"]);
        $g8 = htmlspecialchars($_POST["\x6d\x6f\137\x73\141\155\154\137\x73\x70\137\145\x6e\x74\151\164\x79\x5f\151\144"]);
        if (!(substr($j1, -1) == "\57")) {
            goto di;
        }
        $j1 = substr($j1, 0, -1);
        di:
        update_option("\155\x6f\x5f\x73\x61\155\x6c\137\x73\x70\137\142\x61\163\x65\137\x75\162\154", $j1);
        update_option("\x6d\x6f\x5f\x73\x61\x6d\154\137\163\x70\137\145\x6e\x74\151\x74\x79\x5f\151\x64", $g8);
        YZ:
        update_option("\155\157\137\163\141\x6d\154\x5f\x6d\145\x73\163\x61\x67\x65", "\123\x65\164\164\151\156\x67\x73\x20\165\x70\144\141\x74\x65\x64\40\163\165\x63\143\145\163\163\x66\x75\x6c\154\171\x2e");
        SAMLSPUtilities::mo_saml_show_success_message();
        goto tL;
        Kt:
        if (!empty($_POST["\163\141\155\x6c\137\151\144\x65\x6e\164\x69\x74\x79\137\x6d\145\x74\141\144\141\164\x61\x5f\160\162\x6f\x76\x69\144\x65\162"])) {
            goto z3;
        }
        update_option("\155\157\x5f\163\141\155\154\137\155\x65\163\x73\x61\147\145", "\120\154\x65\141\163\145\40\x45\156\164\x65\162\40\166\141\x6c\151\x64\40\111\x64\x65\x6e\x74\151\x74\171\x20\x50\x72\x6f\x76\151\144\x65\162\40\x6e\x61\155\145\x2e");
        SAMLSPUtilities::mo_saml_show_error_message();
        return;
        z3:
        if (preg_match("\57\x5e\x5c\x77\x2a\x24\x2f", $_POST["\163\x61\155\x6c\x5f\151\144\145\x6e\164\151\x74\171\x5f\155\145\x74\x61\144\x61\164\141\137\x70\x72\x6f\166\151\x64\x65\x72"])) {
            goto mv;
        }
        update_option("\155\x6f\x5f\x73\x61\x6d\x6c\137\x6d\x65\163\x73\141\147\145", "\x50\x6c\x65\141\x73\x65\x20\x6d\141\164\x63\x68\x20\x74\x68\x65\40\162\145\x71\165\145\x73\x74\145\144\x20\x66\157\x72\155\141\164\40\x66\157\x72\40\x49\144\145\x6e\x74\x69\164\171\40\120\x72\157\x76\151\144\x65\x72\40\116\x61\x6d\x65\56\x20\x4f\x6e\154\171\40\141\154\160\x68\141\x62\145\164\163\54\x20\x6e\165\x6d\x62\145\x72\x73\40\x61\156\x64\x20\x75\x6e\144\x65\x72\x73\x63\157\x72\x65\x20\x69\163\x20\x61\154\154\x6f\x77\x65\144\56");
        SAMLSPUtilities::mo_saml_show_error_message();
        return;
        mv:
        if (!function_exists("\x77\160\137\x68\141\156\x64\154\x65\137\165\160\x6c\157\x61\144")) {
            require_once Mo_Saml_WordPress_Files::WP_ADMIN_FILE;
        }
        $this->_handle_upload_metadata();
        goto tL;
        vh:
        $sp = file_get_contents(plugin_dir_path(__FILE__) . "\x72\145\x73\x6f\x75\x72\x63\145\163" . DIRECTORY_SEPARATOR . "\x6d\x69\156\151\157\x72\141\x6e\147\x65\x2d\163\x70\x2d\x63\x65\x72\x74\151\146\151\143\141\164\x65\x2e\x63\162\x74");
        $HM = file_get_contents(plugin_dir_path(__FILE__) . "\x72\145\163\x6f\165\162\143\x65\x73" . DIRECTORY_SEPARATOR . "\155\151\x6e\x69\x6f\x72\x61\156\x67\145\x2d\163\160\x2d\143\x65\162\164\x69\x66\151\x63\x61\x74\145\x2d\x70\x72\151\x76\56\153\145\171");
        update_option("\155\x6f\137\163\x61\x6d\154\137\x63\165\x72\162\145\x6e\x74\x5f\143\145\x72\x74", $sp);
        update_option("\155\157\137\x73\x61\x6d\x6c\137\x63\165\162\x72\x65\x6e\x74\x5f\143\x65\162\164\137\160\x72\151\166\x61\x74\x65\x5f\153\x65\x79", $HM);
        update_option("\x6d\x6f\x5f\163\x61\x6d\154\x5f\143\145\162\164\151\x66\151\143\141\x74\145\x5f\162\157\154\154\x5f\x62\141\143\153\x5f\141\166\141\151\154\141\x62\x6c\x65", true);
        update_option("\155\157\137\163\141\155\x6c\137\x6d\x65\163\163\141\147\145", "\103\145\x72\164\x69\x66\151\x63\x61\x74\x65\40\x55\160\147\x72\141\144\x65\x64\x20\x73\x75\143\x63\145\163\163\146\x75\154\154\x79");
        SAMLSPUtilities::mo_saml_show_success_message();
        tL:
        if (self::mo_check_option_admin_referer("\x72\157\x6c\154\x62\x61\x63\x6b\137\x63\145\x72\x74")) {
            goto Ps;
        }
        if (self::mo_check_option_admin_referer("\141\x64\x64\137\x63\x75\163\164\x6f\x6d\137\x63\145\x72\x74\151\146\x69\x63\x61\x74\145")) {
            goto v7;
        }
        if (self::mo_check_option_admin_referer("\x61\x64\144\137\143\165\163\164\157\155\x5f\155\145\163\163\x61\x67\145\163")) {
            goto VN;
        }
        if (self::mo_check_option_admin_referer("\155\x6f\x5f\x73\141\155\154\137\162\145\154\x61\x79\x5f\x73\x74\141\164\145\137\x6f\x70\x74\151\x6f\156")) {
            goto Mg;
        }
        if (self::mo_check_option_admin_referer("\155\x6f\137\163\141\155\x6c\137\x77\x69\x64\x67\x65\164\x5f\157\x70\x74\151\x6f\x6e")) {
            goto Js;
        }
        if (self::mo_check_option_admin_referer("\155\x6f\137\163\141\155\154\137\162\x65\147\x69\x73\164\x65\x72\x65\x64\x5f\x6f\x6e\x6c\x79\x5f\x61\x63\143\145\x73\x73\x5f\157\x70\164\151\157\x6e")) {
            goto pz;
        }
        if (self::mo_check_option_admin_referer("\155\x6f\137\163\x61\x6d\154\x5f\162\145\144\x69\162\x65\143\x74\x5f\x74\x6f\x5f\167\x70\137\x6c\157\x67\151\x6e\137\x6f\x70\x74\151\157\156")) {
            goto uS;
        }
        if (self::mo_check_option_admin_referer("\155\x6f\x5f\163\141\155\154\137\146\x6f\162\x63\145\137\141\165\164\150\x65\x6e\164\x69\x63\x61\164\151\x6f\x6e\137\157\x70\164\x69\x6f\x6e")) {
            goto pE;
        }
        if (self::mo_check_option_admin_referer("\155\x6f\x5f\163\141\x6d\x6c\137\145\156\x61\x62\154\x65\137\162\163\x73\x5f\x61\x63\x63\x65\x73\x73\x5f\157\160\164\151\x6f\x6e")) {
            goto f9;
        }
        if (self::mo_check_option_admin_referer("\155\157\137\163\x61\x6d\x6c\x5f\145\x6e\141\142\x6c\145\x5f\x6c\157\x67\x69\156\x5f\162\145\x64\x69\162\x65\143\x74\137\157\x70\x74\151\157\x6e")) {
            goto np;
        }
        if (self::mo_check_option_admin_referer("\155\157\x5f\163\141\155\x6c\137\141\144\x64\137\x73\x73\157\137\x62\165\164\x74\x6f\156\137\167\160\137\157\x70\x74\151\x6f\x6e")) {
            goto wD;
        }
        if (self::mo_check_option_admin_referer("\x6d\157\137\x73\141\x6d\154\137\x75\163\145\137\x62\165\164\164\x6f\x6e\137\141\163\137\x73\x68\x6f\x72\164\143\157\x64\x65\137\x6f\x70\x74\x69\x6f\x6e")) {
            goto CG;
        }
        if (self::mo_check_option_admin_referer("\x6d\157\x5f\x73\141\x6d\x6c\137\165\163\145\x5f\142\x75\x74\x74\157\156\137\141\x73\137\167\x69\x64\x67\145\164\x5f\157\160\164\151\157\156")) {
            goto aU;
        }
        if (self::mo_check_option_admin_referer("\155\157\x5f\x73\x61\155\x6c\137\141\x6c\x6c\x6f\167\137\x77\160\137\x73\x69\x67\156\x69\156\137\x6f\x70\x74\151\157\156")) {
            goto bT;
        }
        if (self::mo_check_option_admin_referer("\x6d\157\x5f\x73\141\x6d\154\x5f\x63\x75\x73\x74\157\x6d\137\x62\x75\164\164\x6f\x6e\x5f\x6f\160\x74\151\157\156")) {
            goto zB;
        }
        goto Ts;
        Ps:
        $sp = file_get_contents(plugin_dir_path(__FILE__) . "\x72\x65\163\157\x75\162\x63\145\163" . DIRECTORY_SEPARATOR . "\163\x70\x2d\x63\x65\162\164\151\146\151\x63\x61\164\145\56\x63\162\x74");
        $HM = file_get_contents(plugin_dir_path(__FILE__) . "\x72\145\x73\157\x75\162\x63\145\163" . DIRECTORY_SEPARATOR . "\163\x70\x2d\x6b\145\171\56\x6b\145\x79");
        update_option("\x6d\x6f\137\163\x61\x6d\x6c\x5f\x63\x75\162\162\145\156\x74\x5f\x63\x65\x72\x74", $sp);
        update_option("\155\x6f\137\163\x61\x6d\x6c\137\x63\x75\x72\x72\145\x6e\164\137\x63\145\x72\164\137\160\162\x69\166\x61\164\145\137\153\145\x79", $HM);
        update_option("\x6d\x6f\137\x73\141\x6d\154\137\x6d\145\x73\163\x61\x67\145", "\x43\x65\162\x74\151\x66\x69\x63\141\164\145\40\122\x6f\154\x6c\55\x62\141\143\153\145\x64\x20\x73\165\x63\143\x65\x73\x73\x66\165\x6c\x6c\171");
        delete_option("\x6d\157\x5f\x73\x61\155\x6c\x5f\143\x65\x72\x74\x69\x66\151\143\141\x74\x65\137\162\157\x6c\x6c\137\142\141\143\x6b\137\141\166\141\151\x6c\141\x62\154\x65");
        SAMLSPUtilities::mo_saml_show_success_message();
        goto Ts;
        v7:
        $sp = file_get_contents(plugin_dir_path(__FILE__) . "\x72\145\x73\157\x75\162\x63\145\163" . DIRECTORY_SEPARATOR . "\155\151\x6e\151\157\x72\141\156\x67\x65\x2d\x73\160\55\143\x65\162\164\x69\146\x69\x63\141\x74\145\56\143\162\164");
        $HM = file_get_contents(plugin_dir_path(__FILE__) . "\x72\145\x73\x6f\165\x72\143\x65\x73" . DIRECTORY_SEPARATOR . "\155\151\156\151\x6f\162\141\x6e\x67\x65\55\163\160\55\143\145\162\164\151\146\x69\143\141\164\145\55\160\x72\x69\x76\x2e\153\x65\x79");
        if (!empty($_POST["\163\165\x62\x6d\x69\x74"]) and $_POST["\x73\165\142\x6d\x69\x74"] == "\x55\160\x6c\x6f\141\x64") {
            goto Ce;
        }
        if (!(!empty($_POST["\x73\165\x62\155\151\x74"]) and $_POST["\163\165\x62\155\x69\164"] == "\x52\x65\163\x65\x74")) {
            goto GR;
        }
        delete_option("\x6d\x6f\x5f\x73\x61\x6d\x6c\x5f\x63\165\163\x74\x6f\x6d\137\143\145\162\x74");
        delete_option("\155\157\x5f\x73\141\x6d\x6c\137\x63\x75\x73\x74\157\155\x5f\143\x65\162\164\x5f\x70\x72\151\166\x61\x74\145\137\153\x65\171");
        update_option("\155\157\x5f\x73\141\x6d\154\x5f\x63\x75\x72\162\145\156\x74\x5f\x63\145\x72\164", $sp);
        update_option("\x6d\x6f\x5f\163\x61\155\x6c\137\143\165\x72\162\x65\156\164\137\x63\x65\x72\164\x5f\160\x72\151\166\x61\164\x65\137\x6b\x65\171", $HM);
        update_option("\155\x6f\x5f\x73\x61\x6d\x6c\137\155\x65\x73\163\141\x67\145", "\122\145\x73\x65\164\40\103\145\162\x74\151\146\151\x63\x61\x74\x65\40\163\165\x63\143\x65\163\163\146\x75\x6c\x6c\171\56");
        SAMLSPUtilities::mo_saml_show_success_message();
        GR:
        goto X7;
        Ce:
        if (!@openssl_x509_read($_POST["\x73\141\x6d\x6c\x5f\160\x75\x62\x6c\x69\143\137\x78\65\60\x39\137\143\x65\x72\164\x69\146\x69\x63\141\164\x65"])) {
            goto ZK;
        }
        if (!@openssl_x509_check_private_key($_POST["\163\x61\155\154\137\160\165\x62\154\151\143\x5f\x78\x35\60\71\x5f\x63\x65\x72\x74\x69\146\x69\x63\x61\x74\x65"], $_POST["\x73\141\x6d\154\137\x70\162\x69\166\141\x74\x65\x5f\x78\65\x30\71\137\143\x65\x72\164\151\146\x69\143\x61\164\145"])) {
            goto WW;
        }
        if (openssl_x509_read($_POST["\x73\141\x6d\x6c\x5f\160\x75\x62\154\x69\143\137\x78\x35\60\71\x5f\143\x65\162\x74\151\146\x69\143\141\164\x65"]) && openssl_x509_check_private_key($_POST["\x73\x61\x6d\x6c\137\160\x75\142\154\151\143\137\170\65\x30\71\x5f\143\145\x72\164\151\146\x69\x63\141\x74\x65"], $_POST["\x73\x61\x6d\x6c\137\x70\162\x69\x76\x61\x74\145\x5f\170\x35\60\71\x5f\143\x65\162\x74\x69\146\151\x63\x61\164\x65"])) {
            goto N1;
        }
        goto DX;
        ZK:
        update_option("\x6d\x6f\137\163\x61\155\x6c\137\x6d\x65\x73\x73\141\x67\x65", "\x49\x6e\166\x61\154\x69\x64\x20\103\145\162\x74\151\146\x69\x63\141\164\145\x20\x66\157\x72\155\141\x74\56\40\120\154\145\x61\163\x65\x20\x65\156\164\145\162\x20\x61\40\166\x61\x6c\151\144\x20\143\145\x72\164\x69\146\151\x63\141\164\x65\56");
        SAMLSPUtilities::mo_saml_show_error_message();
        return;
        goto DX;
        WW:
        update_option("\x6d\157\137\163\x61\155\x6c\137\155\x65\x73\163\x61\x67\x65", "\111\x6e\166\141\x6c\151\144\40\120\x72\151\x76\141\164\x65\40\x4b\x65\x79\56");
        SAMLSPUtilities::mo_saml_show_error_message();
        return;
        goto DX;
        N1:
        $pi = $_POST["\x73\x61\155\x6c\137\x70\x75\142\154\151\x63\137\170\x35\60\71\137\x63\x65\162\164\151\146\x69\143\x61\x74\145"];
        $Ox = $_POST["\x73\141\x6d\x6c\137\160\162\x69\166\141\164\x65\137\x78\x35\60\x39\137\x63\x65\162\x74\x69\x66\151\x63\141\164\x65"];
        update_option("\x6d\x6f\137\163\141\155\154\x5f\143\165\163\164\x6f\155\x5f\143\145\162\164", $pi);
        update_option("\155\157\137\163\x61\x6d\x6c\137\x63\x75\x73\x74\x6f\x6d\x5f\x63\145\x72\164\x5f\160\162\151\166\x61\164\145\x5f\153\145\x79", $Ox);
        update_option("\x6d\157\137\x73\141\x6d\154\137\x63\x75\x72\162\145\x6e\164\x5f\x63\x65\x72\x74", $pi);
        update_option("\x6d\x6f\x5f\163\141\155\x6c\x5f\143\x75\x72\162\145\156\x74\137\143\145\162\164\137\160\162\x69\x76\141\164\x65\x5f\153\x65\171", $Ox);
        update_option("\155\157\137\163\141\x6d\154\x5f\x6d\x65\163\163\x61\147\145", "\x43\x75\x73\x74\x6f\155\x20\x43\x65\x72\164\x69\x66\x69\143\x61\x74\x65\x20\165\160\x64\x61\x74\145\144\40\163\x75\x63\143\x65\163\x73\146\165\154\154\171\x2e");
        SAMLSPUtilities::mo_saml_show_success_message();
        DX:
        X7:
        goto Ts;
        VN:
        update_option("\155\157\137\163\x61\155\154\x5f\141\143\143\157\x75\156\164\137\x63\x72\x65\x61\164\151\157\x6e\x5f\x64\151\163\141\x62\x6c\x65\x64\137\x6d\163\x67", htmlspecialchars($_POST["\155\x6f\x5f\x73\141\155\154\137\x61\143\143\x6f\x75\x6e\x74\x5f\x63\x72\145\141\164\151\157\x6e\137\144\151\x73\141\142\x6c\x65\144\x5f\x6d\x73\147"]));
        update_option("\x6d\157\x5f\x73\141\155\154\x5f\x72\145\x73\x74\x72\x69\143\x74\x65\144\x5f\144\x6f\x6d\141\151\x6e\137\145\x72\162\x6f\162\x5f\x6d\x73\147", htmlspecialchars($_POST["\155\157\137\163\x61\x6d\154\137\x72\145\x73\164\162\151\x63\164\145\144\x5f\144\x6f\x6d\141\x69\x6e\137\x65\x72\x72\157\x72\x5f\155\x73\147"]));
        update_option("\x6d\157\x5f\x73\141\155\x6c\x5f\155\x65\163\163\141\x67\x65", "\x43\x6f\x6e\x66\151\x67\165\x72\x61\164\151\x6f\x6e\x20\150\141\x73\x20\x62\145\x65\x6e\x20\163\141\x76\x65\x64\40\163\165\143\143\x65\x73\x73\x66\165\x6c\154\171\x2e");
        SAMLSPUtilities::mo_saml_show_success_message();
        goto Ts;
        Mg:
        if (isset($_POST["\155\157\137\x73\141\x6d\x6c\137\x73\145\156\x64\x5f\141\x62\163\x6f\x6c\x75\164\145\137\162\145\154\141\x79\137\163\164\x61\164\x65"])) {
            goto O9;
        }
        $Mo = false;
        goto Uy;
        O9:
        $Mo = true;
        Uy:
        $d2 = !empty($_POST["\x6d\157\x5f\163\141\x6d\x6c\x5f\x72\x65\x6c\x61\171\x5f\163\164\141\x74\145"]) ? htmlspecialchars($_POST["\155\x6f\137\163\x61\155\x6c\x5f\x72\145\x6c\141\171\x5f\163\x74\x61\164\x65"]) : '';
        $Zm = !empty($_POST["\155\x6f\x5f\163\x61\155\154\x5f\x6c\157\x67\x6f\165\164\x5f\x72\x65\x6c\x61\171\x5f\163\164\141\x74\145"]) ? htmlspecialchars($_POST["\x6d\x6f\137\163\141\155\x6c\137\154\157\x67\157\x75\x74\137\x72\x65\154\141\x79\137\x73\164\141\x74\x65"]) : '';
        update_option("\155\x6f\137\x73\141\x6d\x6c\137\x72\x65\154\141\x79\137\x73\164\141\164\x65", $d2);
        update_option("\x6d\157\137\x73\x61\x6d\x6c\x5f\x6c\157\147\157\165\x74\x5f\x72\145\x6c\141\171\137\x73\x74\x61\x74\145", $Zm);
        update_option("\x6d\x6f\137\163\x61\x6d\154\x5f\x73\x65\156\144\x5f\x61\142\163\157\x6c\x75\164\x65\x5f\x72\x65\154\141\x79\137\163\x74\141\164\x65", $Mo);
        update_option("\x6d\x6f\137\x73\141\155\154\x5f\x6d\x65\x73\x73\x61\147\145", "\122\145\x6c\141\171\40\x53\164\141\164\x65\x20\165\x70\x64\141\164\145\x64\40\x73\x75\143\143\x65\163\x73\146\x75\x6c\154\171\56");
        SAMLSPUtilities::mo_saml_show_success_message();
        goto Ts;
        Js:
        $z3 = htmlspecialchars($_POST["\155\157\137\163\141\x6d\154\x5f\x63\165\163\164\157\x6d\x5f\154\157\x67\x69\156\x5f\164\145\170\x74"]);
        update_option("\x6d\157\137\163\141\x6d\x6c\137\143\x75\x73\164\157\155\137\154\157\x67\x69\x6e\137\164\x65\170\164", stripcslashes($z3));
        $yh = htmlspecialchars($_POST["\x6d\157\137\x73\141\x6d\x6c\x5f\143\165\x73\x74\x6f\155\137\x67\162\x65\x65\164\x69\x6e\147\137\164\x65\170\164"]);
        update_option("\x6d\157\x5f\163\x61\x6d\x6c\137\143\x75\163\x74\157\x6d\x5f\147\162\145\x65\164\x69\156\147\x5f\164\x65\x78\164", stripcslashes($yh));
        $kU = htmlspecialchars($_POST["\155\x6f\137\163\141\155\x6c\137\x67\162\145\x65\x74\151\156\147\137\x6e\141\x6d\x65"]);
        update_option("\x6d\x6f\x5f\163\141\155\154\137\147\162\x65\x65\164\151\x6e\x67\x5f\156\141\x6d\145", stripslashes($kU));
        $Iq = htmlspecialchars($_POST["\155\x6f\x5f\x73\x61\155\x6c\137\143\x75\163\x74\x6f\155\137\154\x6f\147\x6f\x75\x74\x5f\x74\x65\x78\164"]);
        update_option("\x6d\157\137\x73\x61\x6d\x6c\137\x63\x75\x73\164\x6f\x6d\137\154\157\147\157\x75\164\137\164\x65\x78\164", stripcslashes($Iq));
        update_option("\155\x6f\137\x73\141\155\154\137\155\145\163\x73\141\147\x65", "\127\151\x64\x67\x65\x74\40\123\x65\164\x74\x69\156\x67\x73\x20\165\x70\x64\141\164\145\144\40\163\165\143\x63\145\163\163\146\x75\x6c\x6c\171\56");
        SAMLSPUtilities::mo_saml_show_success_message();
        goto Ts;
        pz:
        if (mo_saml_is_sp_configured()) {
            goto Vm;
        }
        update_option("\x6d\x6f\137\163\141\x6d\154\x5f\155\145\163\163\x61\147\145", "\120\x6c\x65\x61\163\x65\x20\143\157\155\x70\x6c\145\164\x65\x20" . addLink("\123\x65\162\166\x69\x63\x65\x20\120\162\x6f\x76\151\144\145\x72", add_query_arg(array("\x74\x61\142" => "\x73\141\x76\x65"), $_SERVER["\x52\x45\121\125\x45\123\124\137\125\x52\111"])) . "\x20\143\157\x6e\146\151\x67\x75\x72\x61\x74\151\x6f\x6e\40\146\151\x72\163\164\x2e");
        SAMLSPUtilities::mo_saml_show_error_message();
        goto EE;
        Vm:
        if (!empty($_POST["\x6d\x6f\137\x73\141\x6d\154\137\162\x65\x67\151\163\x74\x65\162\145\x64\x5f\157\x6e\154\171\137\141\143\x63\145\x73\163"])) {
            goto BA;
        }
        $gV = "\x66\141\x6c\163\x65";
        goto LP;
        BA:
        $gV = htmlspecialchars($_POST["\x6d\157\x5f\163\x61\155\x6c\x5f\162\x65\147\x69\x73\x74\x65\x72\x65\144\x5f\x6f\156\x6c\x79\x5f\141\x63\143\x65\163\163"]);
        LP:
        if ($gV == "\164\162\x75\145") {
            goto Xu;
        }
        update_option("\155\x6f\x5f\163\141\x6d\x6c\137\162\145\147\x69\x73\164\145\162\x65\x64\x5f\157\x6e\x6c\171\137\141\143\x63\x65\163\163", '');
        goto rO;
        Xu:
        update_option("\x6d\157\x5f\163\141\155\154\137\x72\145\147\151\x73\164\145\x72\145\144\137\157\x6e\x6c\x79\137\141\x63\143\x65\163\163", "\164\162\x75\145");
        rO:
        update_option("\x6d\157\137\163\141\155\154\137\x6d\x65\163\x73\141\147\145", "\x53\x69\x67\156\x20\151\x6e\40\x6f\x70\x74\x69\157\156\x73\40\x75\x70\144\141\x74\x65\x64\x2e");
        SAMLSPUtilities::mo_saml_show_success_message();
        EE:
        goto Ts;
        uS:
        if (!mo_saml_is_sp_configured()) {
            goto Ui;
        }
        if (!empty($_POST["\x6d\x6f\137\163\x61\x6d\154\x5f\x72\x65\x64\151\162\145\x63\x74\137\164\x6f\137\167\160\x5f\x6c\x6f\x67\x69\156"])) {
            goto Ik;
        }
        $M5 = "\x66\141\x6c\x73\145";
        goto dy;
        Ik:
        $M5 = htmlspecialchars($_POST["\155\x6f\x5f\x73\141\x6d\x6c\137\162\145\x64\151\x72\145\x63\x74\137\x74\157\137\x77\160\x5f\x6c\157\x67\x69\x6e"]);
        dy:
        update_option("\x6d\157\x5f\163\x61\x6d\x6c\137\x72\x65\x64\x69\x72\x65\x63\x74\x5f\x74\x6f\x5f\167\160\137\x6c\x6f\147\151\156", $M5);
        update_option("\155\157\x5f\163\x61\155\154\x5f\x6d\145\x73\163\141\147\145", "\x53\151\x67\156\40\x69\156\40\x6f\160\x74\151\x6f\156\163\x20\165\160\144\x61\x74\x65\144\56");
        SAMLSPUtilities::mo_saml_show_success_message();
        Ui:
        goto Ts;
        pE:
        if (mo_saml_is_sp_configured()) {
            goto Gg;
        }
        update_option("\155\x6f\137\163\141\x6d\154\137\155\x65\x73\x73\x61\147\145", "\120\154\145\x61\163\145\40\x63\x6f\x6d\160\154\145\x74\145\40" . addLink("\123\145\162\166\151\143\x65\40\x50\x72\157\166\151\x64\145\162", add_query_arg(array("\164\141\142" => "\x73\141\x76\x65"), $_SERVER["\122\105\121\125\x45\x53\124\137\x55\x52\111"])) . "\40\x63\x6f\x6e\146\x69\x67\x75\162\x61\164\151\x6f\156\40\146\x69\162\x73\164\56");
        SAMLSPUtilities::mo_saml_show_error_message();
        goto o2;
        Gg:
        if (!empty($_POST["\155\157\137\163\141\x6d\154\137\x66\157\162\143\x65\x5f\x61\x75\x74\x68\145\x6e\164\151\x63\x61\164\151\x6f\x6e"])) {
            goto uR;
        }
        $gV = "\146\141\x6c\x73\145";
        goto g_;
        uR:
        $gV = htmlspecialchars($_POST["\x6d\x6f\137\163\141\155\154\x5f\x66\x6f\162\x63\x65\x5f\141\x75\164\x68\145\x6e\x74\151\x63\x61\164\x69\157\x6e"]);
        g_:
        if ($gV == "\164\x72\165\145") {
            goto pq;
        }
        update_option("\155\x6f\137\163\x61\x6d\154\x5f\146\x6f\x72\143\145\137\x61\165\164\150\145\x6e\164\151\x63\141\x74\151\x6f\156", '');
        goto vD;
        pq:
        update_option("\x6d\x6f\137\163\141\x6d\154\137\x66\x6f\162\x63\x65\137\x61\x75\x74\x68\145\156\164\151\x63\141\x74\x69\x6f\x6e", "\164\x72\165\x65");
        vD:
        update_option("\x6d\157\137\x73\141\155\x6c\137\155\145\x73\x73\141\147\x65", "\x53\151\147\x6e\40\x69\x6e\40\157\160\164\151\x6f\156\x73\40\165\160\144\x61\164\x65\x64\56");
        SAMLSPUtilities::mo_saml_show_success_message();
        o2:
        goto Ts;
        f9:
        if (mo_saml_is_sp_configured()) {
            goto Qd;
        }
        update_option("\155\x6f\137\x73\x61\155\x6c\x5f\155\145\x73\x73\141\x67\145", "\x50\x6c\145\141\x73\x65\40\143\x6f\155\160\154\145\x74\145\40" . addLink("\x53\x65\x72\x76\151\143\145\40\120\x72\x6f\x76\151\144\x65\162", add_query_arg(array("\x74\x61\x62" => "\163\141\x76\x65"), $_SERVER["\122\105\x51\x55\x45\123\x54\x5f\x55\122\x49"])) . "\40\143\157\x6e\146\x69\147\x75\162\x61\164\151\157\x6e\x20\x66\151\x72\x73\164\x2e");
        SAMLSPUtilities::mo_saml_show_error_message();
        goto Q_;
        Qd:
        if (!empty($_POST["\x6d\x6f\x5f\x73\x61\x6d\154\137\x65\156\x61\x62\x6c\145\137\x72\x73\163\137\x61\143\x63\145\x73\x73"])) {
            goto PR;
        }
        $J1 = false;
        goto HN;
        PR:
        $J1 = htmlspecialchars($_POST["\155\x6f\137\163\141\155\154\x5f\x65\156\x61\142\x6c\x65\x5f\x72\163\x73\x5f\x61\143\143\x65\163\x73"]);
        HN:
        if ($J1 == "\164\x72\x75\x65") {
            goto yE;
        }
        update_option("\155\157\x5f\x73\141\x6d\x6c\137\x65\x6e\x61\142\154\145\x5f\162\163\x73\137\141\x63\x63\145\163\x73", '');
        goto hi;
        yE:
        update_option("\x6d\157\x5f\x73\141\155\154\137\145\x6e\141\x62\x6c\x65\x5f\162\x73\163\137\x61\143\143\x65\x73\163", "\x74\162\165\x65");
        hi:
        update_option("\x6d\157\137\163\141\x6d\154\x5f\x6d\145\x73\163\141\147\145", "\x52\123\x53\x20\x46\145\145\x64\x20\157\160\x74\151\157\156\40\x75\x70\144\x61\164\x65\x64\x2e");
        SAMLSPUtilities::mo_saml_show_success_message();
        Q_:
        goto Ts;
        np:
        if (mo_saml_is_sp_configured()) {
            goto Ei;
        }
        update_option("\x6d\157\137\163\141\155\154\x5f\155\145\x73\x73\141\x67\145", "\x50\x6c\145\x61\163\145\40\143\157\155\160\154\x65\x74\x65\40" . addLink("\123\x65\162\x76\x69\x63\145\40\x50\162\157\166\x69\x64\145\x72", add_query_arg(array("\x74\141\142" => "\163\x61\x76\x65"), $_SERVER["\x52\105\121\x55\x45\123\x54\137\125\122\x49"])) . "\40\x63\157\156\146\x69\147\x75\x72\x61\x74\x69\x6f\156\40\x66\x69\162\x73\x74\x2e");
        SAMLSPUtilities::mo_saml_show_error_message();
        goto QD;
        Ei:
        if (!empty($_POST["\155\157\137\x73\x61\155\x6c\137\x65\156\141\142\x6c\145\x5f\x6c\x6f\x67\x69\x6e\x5f\x72\x65\144\151\162\145\x63\x74"])) {
            goto f1;
        }
        $gV = "\x66\141\154\x73\145";
        goto DF;
        f1:
        $gV = htmlspecialchars($_POST["\155\157\137\x73\x61\155\154\137\145\156\141\142\x6c\145\x5f\x6c\157\147\x69\x6e\x5f\x72\x65\x64\x69\162\x65\x63\x74"]);
        DF:
        if ($gV == "\x74\x72\165\145") {
            goto qO;
        }
        update_option("\155\x6f\137\x73\141\x6d\154\137\x65\156\141\x62\x6c\145\x5f\x6c\157\147\x69\x6e\x5f\162\x65\x64\151\x72\x65\x63\164", '');
        update_option("\155\157\x5f\x73\141\155\x6c\x5f\x61\154\154\x6f\x77\x5f\167\160\x5f\163\x69\x67\x6e\x69\x6e", '');
        goto Vx;
        qO:
        update_option("\155\157\x5f\x73\x61\x6d\154\x5f\x65\x6e\141\x62\154\x65\x5f\154\157\147\151\156\x5f\162\145\x64\x69\x72\x65\143\164", "\164\x72\165\x65");
        update_option("\x6d\157\x5f\163\141\x6d\154\137\x61\x6c\x6c\157\167\137\167\x70\137\x73\x69\x67\x6e\151\156", "\x74\x72\165\145");
        Vx:
        update_option("\155\157\137\x73\141\155\154\x5f\155\x65\x73\x73\141\147\x65", "\123\151\x67\156\x20\151\156\40\157\160\164\x69\157\x6e\163\40\165\160\144\x61\x74\x65\144\x2e");
        SAMLSPUtilities::mo_saml_show_success_message();
        QD:
        goto Ts;
        wD:
        if (mo_saml_is_sp_configured()) {
            goto bk;
        }
        update_option("\x6d\x6f\137\163\x61\x6d\x6c\x5f\x6d\x65\163\x73\x61\147\145", "\120\154\145\141\163\145\40\x63\x6f\x6d\x70\154\145\x74\145\x20" . addLink("\123\x65\x72\166\x69\143\145\x20\x50\162\x6f\166\151\x64\x65\x72", add_query_arg(array("\164\x61\x62" => "\163\141\x76\x65"), $_SERVER["\x52\x45\121\125\105\123\124\x5f\x55\x52\111"])) . "\40\x63\157\156\x66\151\x67\165\x72\141\164\151\x6f\x6e\40\x66\x69\162\163\164\56");
        SAMLSPUtilities::mo_saml_show_error_message();
        goto s_;
        bk:
        if (!empty($_POST["\155\x6f\x5f\x73\x61\155\x6c\x5f\141\144\x64\137\x73\163\x6f\137\142\165\164\x74\157\156\137\167\160"])) {
            goto sn;
        }
        $YO = "\146\x61\x6c\x73\x65";
        goto u7;
        sn:
        $YO = htmlspecialchars($_POST["\x6d\157\x5f\163\141\155\154\x5f\141\x64\x64\x5f\x73\163\157\x5f\x62\x75\164\x74\x6f\x6e\137\x77\x70"]);
        u7:
        update_option("\x6d\x6f\x5f\163\x61\x6d\154\x5f\x61\x64\x64\137\163\163\x6f\137\142\165\164\164\x6f\x6e\137\x77\160", $YO);
        update_option("\155\157\137\x73\x61\155\x6c\x5f\155\x65\163\163\141\147\x65", "\123\x69\x67\156\x20\x69\156\40\157\160\x74\151\x6f\156\163\x20\165\x70\144\141\164\x65\144\56");
        SAMLSPUtilities::mo_saml_show_success_message();
        s_:
        goto Ts;
        CG:
        if (mo_saml_is_sp_configured()) {
            goto kF;
        }
        update_option("\x6d\x6f\137\163\141\x6d\x6c\x5f\155\145\163\x73\x61\x67\145", "\120\154\x65\141\163\x65\40\143\x6f\x6d\x70\154\x65\164\x65\40" . addLink("\123\x65\x72\166\x69\143\145\40\x50\x72\x6f\166\151\144\145\x72", add_query_arg(array("\164\x61\142" => "\x73\141\x76\145"), $_SERVER["\122\105\121\125\105\123\x54\137\x55\122\x49"])) . "\x20\x63\157\156\x66\x69\147\165\x72\141\164\151\x6f\x6e\x20\146\151\x72\163\164\x2e");
        SAMLSPUtilities::mo_saml_show_error_message();
        goto OD;
        kF:
        if (!empty($_POST["\155\x6f\137\x73\141\155\x6c\x5f\x75\x73\145\x5f\x62\165\164\x74\x6f\x6e\137\x61\163\x5f\163\150\x6f\162\x74\143\x6f\144\x65"])) {
            goto Fb;
        }
        $Rd = "\146\141\154\x73\x65";
        goto RI;
        Fb:
        $Rd = htmlspecialchars($_POST["\x6d\157\x5f\163\x61\x6d\x6c\x5f\x75\163\145\x5f\142\x75\164\x74\x6f\156\137\x61\163\137\163\150\157\162\164\x63\157\144\145"]);
        RI:
        update_option("\x6d\157\x5f\163\141\155\154\x5f\x75\x73\145\137\x62\x75\164\164\157\156\x5f\141\x73\x5f\163\150\x6f\162\x74\143\x6f\x64\145", $Rd);
        update_option("\155\x6f\137\x73\x61\x6d\154\137\155\145\163\163\x61\147\145", "\x53\151\147\x6e\40\151\156\x20\x6f\x70\x74\x69\x6f\156\163\x20\x75\160\144\141\x74\x65\x64\x2e");
        SAMLSPUtilities::mo_saml_show_success_message();
        OD:
        goto Ts;
        aU:
        if (mo_saml_is_sp_configured()) {
            goto eY;
        }
        update_option("\x6d\157\137\x73\141\x6d\154\x5f\x6d\x65\x73\x73\x61\147\145", "\120\154\x65\141\x73\145\x20\x63\157\x6d\x70\154\x65\164\x65\40" . addLink("\x53\145\x72\x76\x69\143\x65\40\x50\x72\157\x76\x69\x64\x65\162", add_query_arg(array("\164\x61\142" => "\x73\141\166\x65"), $_SERVER["\122\105\121\x55\105\x53\x54\137\125\122\x49"])) . "\x20\143\x6f\156\146\151\147\165\162\141\x74\151\157\x6e\40\x66\151\162\163\x74\56");
        SAMLSPUtilities::mo_saml_show_error_message();
        goto lT;
        eY:
        if (!empty($_POST["\155\x6f\x5f\163\141\155\154\137\x75\163\x65\137\142\x75\164\x74\x6f\156\x5f\x61\163\137\167\x69\144\x67\145\164"])) {
            goto lv;
        }
        $Rd = "\146\x61\x6c\163\145";
        goto ig;
        lv:
        $Rd = htmlspecialchars($_POST["\x6d\x6f\x5f\x73\x61\155\154\x5f\x75\x73\145\x5f\142\x75\164\164\157\x6e\x5f\x61\163\137\167\151\144\x67\x65\x74"]);
        ig:
        update_option("\155\x6f\x5f\x73\x61\155\154\x5f\x75\163\x65\x5f\x62\165\164\164\x6f\156\x5f\141\163\x5f\167\x69\x64\x67\x65\x74", $Rd);
        update_option("\155\x6f\x5f\163\x61\x6d\x6c\137\x6d\x65\163\x73\x61\147\145", "\x53\151\147\x6e\40\151\156\40\157\160\x74\x69\157\156\x73\x20\165\x70\x64\141\164\145\x64\x2e");
        SAMLSPUtilities::mo_saml_show_success_message();
        lT:
        goto Ts;
        bT:
        $ph = "\146\141\154\x73\x65";
        if (!empty($_POST["\x6d\157\137\x73\x61\155\x6c\x5f\x61\154\x6c\157\x77\x5f\x77\x70\x5f\163\x69\x67\x6e\151\x6e"])) {
            goto YR;
        }
        $gx = "\146\x61\154\x73\145";
        goto W5;
        YR:
        $gx = htmlspecialchars($_POST["\x6d\157\x5f\163\141\x6d\154\x5f\141\x6c\x6c\x6f\x77\137\x77\160\x5f\163\151\x67\x6e\151\156"]);
        W5:
        if ($gx == "\164\x72\165\145") {
            goto mC;
        }
        update_option("\155\x6f\137\x73\x61\x6d\154\137\141\154\x6c\x6f\x77\137\167\160\x5f\x73\x69\x67\156\151\156", '');
        goto td;
        mC:
        update_option("\x6d\157\137\163\141\x6d\154\x5f\141\x6c\x6c\x6f\x77\x5f\x77\x70\137\163\x69\x67\156\151\x6e", "\x74\x72\165\x65");
        if (empty($_POST["\x6d\x6f\x5f\163\x61\x6d\154\x5f\x62\141\x63\153\x64\157\x6f\x72\x5f\x75\162\154"])) {
            goto Af;
        }
        $ph = htmlspecialchars(trim($_POST["\155\157\x5f\x73\x61\155\x6c\x5f\142\141\x63\x6b\144\x6f\157\x72\x5f\165\x72\x6c"]));
        Af:
        td:
        update_option("\155\157\137\x73\x61\155\154\137\x62\141\x63\x6b\x64\157\x6f\162\137\x75\162\x6c", $ph);
        update_option("\x6d\x6f\x5f\163\x61\155\154\x5f\155\x65\163\x73\141\x67\145", "\x53\x69\147\156\40\111\x6e\40\163\x65\x74\x74\151\x6e\147\163\40\165\x70\x64\141\164\145\x64\56");
        SAMLSPUtilities::mo_saml_show_success_message();
        goto Ts;
        zB:
        $wm = '';
        $KD = '';
        $tO = '';
        $A8 = '';
        $XC = '';
        $jb = '';
        $XJ = '';
        $eH = '';
        $Ad = '';
        $D1 = '';
        $j6 = "\x61\142\x6f\x76\x65";
        if (empty($_POST["\x6d\x6f\137\163\141\155\154\137\142\x75\164\164\x6f\156\x5f\163\x69\172\x65"])) {
            goto el;
        }
        $tO = htmlspecialchars($_POST["\155\157\x5f\x73\141\155\x6c\x5f\x62\x75\164\164\157\156\x5f\163\151\x7a\145"]);
        el:
        if (empty($_POST["\155\157\137\163\x61\x6d\154\x5f\x62\x75\x74\164\157\156\137\167\151\144\164\x68"])) {
            goto en;
        }
        $A8 = htmlspecialchars($_POST["\x6d\x6f\137\x73\x61\x6d\154\x5f\x62\x75\x74\164\157\156\137\167\151\144\164\x68"]);
        en:
        if (empty($_POST["\x6d\157\x5f\x73\141\x6d\x6c\x5f\x62\165\x74\164\157\x6e\137\150\145\151\x67\150\x74"])) {
            goto WN;
        }
        $XC = htmlspecialchars($_POST["\x6d\157\137\163\x61\155\x6c\x5f\142\165\164\164\157\x6e\x5f\x68\145\x69\147\x68\x74"]);
        WN:
        if (empty($_POST["\x6d\x6f\x5f\163\141\x6d\x6c\137\x62\165\164\x74\x6f\156\137\x63\165\x72\166\145"])) {
            goto Za;
        }
        $jb = htmlspecialchars($_POST["\155\157\137\163\x61\x6d\x6c\x5f\x62\x75\x74\164\157\156\x5f\143\x75\x72\166\145"]);
        Za:
        if (empty($_POST["\x6d\x6f\x5f\163\x61\155\154\137\142\165\164\164\x6f\x6e\x5f\x63\157\154\x6f\x72"])) {
            goto Os;
        }
        $XJ = htmlspecialchars($_POST["\155\157\x5f\x73\141\155\154\x5f\142\165\x74\164\157\156\x5f\x63\157\x6c\157\162"]);
        Os:
        if (empty($_POST["\x6d\x6f\137\163\x61\x6d\x6c\137\142\x75\164\x74\157\x6e\x5f\x74\150\x65\155\x65"])) {
            goto CN;
        }
        $wm = htmlspecialchars($_POST["\155\157\137\x73\x61\x6d\x6c\x5f\142\165\164\164\157\x6e\137\164\150\x65\x6d\x65"]);
        CN:
        if (empty($_POST["\155\157\137\163\x61\155\154\x5f\142\x75\x74\164\x6f\x6e\x5f\x74\145\x78\164"])) {
            goto TA;
        }
        $eH = htmlspecialchars($_POST["\155\x6f\137\x73\x61\155\154\137\142\x75\164\x74\157\x6e\x5f\x74\x65\170\164"]);
        if (!(empty($eH) || $eH == "\114\x6f\147\x69\156")) {
            goto Bq;
        }
        $eH = "\114\157\x67\151\156";
        Bq:
        $ws = LicenseHelper::getCurrentOption(Mo_Saml_Options_Enum_Service_Provider::IDENTITY_NAME);
        $eH = str_replace("\x23\43\x49\x44\120\x23\43", $ws, $eH);
        TA:
        if (empty($_POST["\x6d\157\137\x73\141\155\154\x5f\146\x6f\x6e\164\x5f\143\x6f\154\157\x72"])) {
            goto B7;
        }
        $Ad = htmlspecialchars($_POST["\x6d\157\137\163\141\155\154\137\x66\x6f\x6e\x74\x5f\143\157\x6c\157\x72"]);
        B7:
        if (empty($_POST["\x6d\157\x5f\163\141\x6d\x6c\x5f\x66\x6f\x6e\164\x5f\x73\151\172\145"])) {
            goto ya;
        }
        $D1 = htmlspecialchars($_POST["\155\157\137\163\x61\x6d\x6c\x5f\x66\x6f\x6e\164\137\163\x69\172\x65"]);
        ya:
        if (empty($_POST["\x73\163\x6f\x5f\x62\165\x74\164\x6f\156\137\x6c\157\x67\x69\x6e\137\x66\x6f\162\x6d\137\160\x6f\163\151\164\x69\157\x6e"])) {
            goto J5;
        }
        $j6 = htmlspecialchars($_POST["\x73\x73\x6f\137\x62\165\x74\164\x6f\x6e\137\x6c\x6f\x67\151\x6e\x5f\146\157\162\155\137\160\157\163\x69\164\151\157\156"]);
        J5:
        update_option("\155\x6f\x5f\x73\x61\155\x6c\137\x62\165\x74\164\157\x6e\137\164\x68\x65\155\145", $wm);
        update_option("\155\x6f\137\163\x61\155\x6c\137\142\x75\164\x74\157\x6e\137\163\151\172\145", $tO);
        update_option("\155\157\137\x73\141\155\154\137\x62\165\x74\x74\157\156\137\167\x69\x64\164\150", $A8);
        update_option("\x6d\157\x5f\x73\x61\155\154\x5f\142\165\164\164\157\x6e\x5f\150\x65\x69\x67\x68\164", $XC);
        update_option("\x6d\x6f\137\x73\141\x6d\154\137\142\x75\164\x74\157\156\137\x63\165\162\166\x65", $jb);
        update_option("\155\x6f\137\x73\x61\x6d\154\x5f\x62\x75\x74\164\x6f\156\137\x63\157\x6c\x6f\x72", $XJ);
        update_option("\x6d\157\x5f\163\x61\155\154\137\142\x75\164\x74\x6f\x6e\x5f\x74\145\x78\x74", $eH);
        update_option("\x6d\x6f\137\163\141\x6d\154\137\146\157\x6e\164\137\143\157\x6c\157\162", $Ad);
        update_option("\155\x6f\137\x73\x61\x6d\154\137\x66\157\156\x74\x5f\x73\151\172\145", $D1);
        update_option("\163\163\157\x5f\142\165\x74\x74\157\156\x5f\x6c\x6f\x67\x69\x6e\x5f\x66\157\x72\155\137\x70\157\163\151\x74\151\x6f\x6e", $j6);
        update_option("\x6d\x6f\137\x73\x61\155\x6c\137\155\x65\163\x73\141\x67\x65", "\123\x69\147\156\40\x49\156\40\163\145\x74\x74\x69\x6e\147\x73\40\x75\160\144\141\x74\x65\144\x2e");
        SAMLSPUtilities::mo_saml_show_success_message();
        Ts:
        n0:
        if (!self::mo_check_option_admin_referer("\x6d\157\x5f\x73\x61\x6d\154\x5f\x76\145\162\151\x66\171\x5f\x63\x75\163\x74\157\x6d\145\162")) {
            goto dE;
        }
        if (mo_saml_is_extension_installed("\143\165\x72\x6c")) {
            goto l0;
        }
        update_option("\155\157\137\x73\x61\x6d\154\x5f\155\x65\x73\x73\x61\x67\145", "\x45\x52\122\117\122\x3a\40\x50\110\x50\x20\143\x55\122\x4c\x20\145\170\x74\x65\156\163\151\x6f\x6e\40\x69\163\x20\x6e\x6f\164\x20\x69\156\x73\164\141\154\x6c\145\144\40\157\x72\40\144\151\x73\x61\142\x6c\x65\x64\x2e\40\x4c\157\x67\151\x6e\40\146\141\x69\x6c\x65\144\x2e");
        SAMLSPUtilities::mo_saml_show_error_message();
        return;
        l0:
        $kr = '';
        $vO = self::get_empty_strings();
        if (empty($_POST["\x65\x6d\x61\x69\x6c"]) || empty($_POST["\x70\141\163\163\x77\x6f\162\x64"])) {
            goto KY;
        }
        if ($this->checkPasswordPattern(strip_tags($_POST["\x70\141\163\163\x77\x6f\x72\144"]))) {
            goto Eg;
        }
        $kr = sanitize_email($_POST["\145\x6d\141\151\x6c"]);
        $vO = stripslashes(strip_tags($_POST["\160\141\163\163\x77\x6f\162\x64"]));
        goto qS;
        Eg:
        update_option("\x6d\157\137\163\141\155\154\x5f\155\x65\x73\163\x61\x67\145", "\x4d\151\156\151\x6d\x75\155\40\x36\40\143\x68\141\162\141\x63\164\x65\162\163\x20\163\x68\x6f\x75\154\x64\40\142\145\x20\160\162\x65\x73\x65\156\164\x2e\40\115\141\x78\x69\x6d\165\155\40\61\x35\x20\143\150\x61\x72\141\143\x74\x65\x72\x73\40\x73\150\157\x75\x6c\x64\40\142\145\40\160\x72\145\163\x65\156\x74\56\x20\117\156\x6c\x79\40\x66\157\x6c\x6c\157\x77\x69\156\x67\40\x73\171\x6d\x62\157\x6c\x73\x20\50\41\x40\x23\56\44\45\x5e\x26\52\55\137\x29\x20\163\x68\x6f\165\x6c\144\40\x62\x65\40\x70\162\x65\163\x65\156\x74\x2e");
        SAMLSPUtilities::mo_saml_show_error_message();
        return;
        qS:
        goto Uk;
        KY:
        update_option("\155\x6f\x5f\x73\x61\155\x6c\x5f\x6d\x65\163\163\x61\147\145", "\101\154\x6c\x20\164\150\x65\40\x66\151\x65\154\144\x73\40\141\162\145\40\x72\145\161\x75\151\x72\145\x64\56\40\x50\154\x65\141\163\x65\40\x65\x6e\x74\145\x72\x20\166\x61\x6c\151\144\x20\x65\156\164\162\151\145\x73\56");
        SAMLSPUtilities::mo_saml_show_error_message();
        return;
        Uk:
        update_option("\155\x6f\137\163\x61\x6d\x6c\x5f\141\144\x6d\151\156\137\145\x6d\x61\151\x6c", $kr);
        update_option("\155\157\x5f\163\141\x6d\154\137\x61\144\155\151\x6e\137\160\x61\x73\x73\167\x6f\162\x64", $vO);
        $YJ = new Customersaml();
        $HO = $YJ->get_customer_key();
        if ($HO) {
            goto W1;
        }
        return;
        W1:
        $Mz = json_decode($HO, true);
        if (json_last_error() == JSON_ERROR_NONE) {
            goto DI;
        }
        update_option("\155\x6f\137\x73\x61\x6d\154\137\x6d\145\163\163\x61\147\145", "\x49\x6e\x76\x61\x6c\151\144\40\165\163\x65\162\x6e\x61\155\x65\x20\157\x72\40\160\x61\x73\163\167\x6f\162\x64\56\x20\x50\x6c\145\141\x73\x65\40\x74\162\x79\40\x61\147\141\151\x6e\x2e");
        SAMLSPUtilities::mo_saml_show_error_message();
        goto nW;
        DI:
        update_option("\155\x6f\137\x73\x61\x6d\x6c\x5f\x61\x64\155\x69\156\x5f\x63\165\163\x74\x6f\x6d\x65\162\137\x6b\145\171", $Mz["\151\144"]);
        update_option("\x6d\x6f\x5f\x73\x61\x6d\x6c\137\141\x64\155\151\x6e\x5f\141\160\151\x5f\x6b\x65\171", $Mz["\141\160\151\113\x65\x79"]);
        update_option("\x6d\157\x5f\163\141\x6d\x6c\137\143\x75\x73\164\157\x6d\145\162\x5f\164\x6f\153\x65\x6e", $Mz["\x74\x6f\x6b\x65\x6e"]);
        if (empty($Mz["\160\x68\157\156\x65"])) {
            goto Hu;
        }
        update_option("\155\157\137\x73\x61\155\x6c\137\141\x64\155\x69\x6e\x5f\x70\150\x6f\156\x65", $Mz["\160\150\157\156\145"]);
        Hu:
        update_option("\155\x6f\x5f\x73\141\x6d\154\x5f\x61\x64\155\151\x6e\x5f\160\141\163\163\x77\x6f\162\144", '');
        update_option("\155\157\x5f\x73\x61\155\154\x5f\x6d\x65\163\163\141\147\x65", "\x43\x75\163\164\x6f\155\145\162\x20\162\x65\164\x72\x69\x65\166\145\x64\40\x73\x75\143\x63\145\x73\163\146\165\154\154\171");
        delete_option("\155\x6f\x5f\163\141\155\x6c\x5f\x76\145\x72\151\146\x79\137\143\165\163\x74\157\155\x65\162");
        if (get_option("\163\x6d\154\137\x6c\153")) {
            goto PK;
        }
        SAMLSPUtilities::mo_saml_show_success_message();
        goto OL;
        PK:
        $mr = get_option("\x6d\x6f\x5f\163\x61\x6d\x6c\x5f\x63\165\163\164\157\155\x65\162\137\x74\x6f\153\x65\x6e");
        $rV = AESEncryption::decrypt_data(get_option("\x73\x6d\x6c\137\x6c\x6b"), $mr);
        $HO = json_decode($YJ->mo_saml_vl($rV, false), true);
        update_option("\x76\x6c\137\143\150\x65\143\x6b\x5f\x74", time());
        if (!empty($HO["\x69\x73\x54\x72\x69\141\x6c"])) {
            goto ns;
        }
        update_option("\155\x6f\137\163\x61\155\x6c\x5f\164\154\x61", false);
        goto LS;
        ns:
        update_option("\155\x6f\x5f\163\x61\x6d\x6c\137\164\154\141", $HO["\151\163\x54\x72\151\x61\x6c"]);
        update_option("\155\x6f\x5f\163\141\x6d\x6c\x5f\154\x65\144", $HO["\x6c\151\143\145\x6e\163\145\x45\170\x70\151\162\x79\104\141\164\x65"]);
        LS:
        if (is_array($HO) and strcasecmp($HO["\163\164\x61\164\x75\163"], "\x53\125\103\x43\x45\123\123") == 0) {
            goto YN;
        }
        update_option("\155\x6f\137\x73\141\x6d\x6c\x5f\155\x65\x73\163\141\147\x65", "\114\x69\143\x65\x6e\x73\x65\40\x6b\x65\171\40\x66\157\x72\40\x74\150\x69\163\40\151\156\163\164\x61\156\143\145\40\x69\x73\40\x69\x6e\x63\x6f\162\x72\145\x63\164\56\40\115\x61\x6b\145\40\163\x75\x72\x65\40\171\x6f\x75\40\x68\141\166\x65\40\156\157\x74\x20\164\141\155\x70\145\x72\145\x64\40\167\x69\164\x68\x20\151\164\40\141\164\x20\141\x6c\x6c\56\x20\x50\154\145\141\163\145\x20\x65\x6e\164\145\x72\40\141\x20\x76\x61\x6c\x69\144\x20\154\x69\x63\145\x6e\163\x65\40\153\x65\171\56");
        delete_option("\x73\155\154\x5f\x6c\x6b");
        SAMLSPUtilities::mo_saml_show_error_message();
        goto DJ;
        YN:
        if (empty($HO["\x6c\x69\x63\x65\156\x73\145\x45\170\x70\151\162\171\x44\x61\x74\145"])) {
            goto nn;
        }
        update_option("\155\157\x5f\163\x61\x6d\154\137\154\145\x64", SAMLSPUtilities::mo_saml_encrypt_data($HO["\154\151\143\x65\x6e\163\145\105\x78\160\151\x72\171\x44\141\164\x65"]));
        nn:
        $Xd = plugin_dir_path(__FILE__);
        $Va = home_url();
        $Va = trim($Va, "\x2f");
        if (preg_match("\x23\x5e\x68\164\164\x70\50\163\51\x3f\72\57\x2f\x23", $Va)) {
            goto Cr;
        }
        $Va = "\x68\x74\164\160\72\57\57" . $Va;
        Cr:
        $Jf = parse_url($Va);
        $dd = preg_replace("\57\x5e\x77\167\x77\134\56\57", '', $Jf["\x68\157\163\164"]);
        $M1 = wp_upload_dir();
        $no = $dd . "\55" . $M1["\142\141\163\x65\x64\x69\162"];
        $rA = hash_hmac("\163\x68\x61\62\65\x36", $no, "\x34\104\110\146\152\x67\146\152\141\163\x6e\144\x66\x73\141\x6a\146\110\107\112");
        $eZ = $this->djkasjdksa();
        $NZ = round(strlen($eZ) / rand(2, 20));
        $eZ = substr_replace($eZ, $rA, $NZ, 0);
        $FA = base64_decode($eZ);
        if (is_writable($Xd . "\154\x69\143\x65\x6e\x73\x65")) {
            goto ba;
        }
        $eZ = str_rot13($eZ);
        $v6 = "\x62\x47\x4e\x6b\x61\155\164\150\143\62\x70\153\141\63\x4e\x68\131\x32\167\75";
        $af = base64_decode($v6);
        update_option($af, $eZ);
        goto p5;
        ba:
        file_put_contents($Xd . "\154\x69\143\x65\156\163\x65", $FA);
        p5:
        update_option("\x6c\x63\x77\x72\164\x6c\x66\163\141\155\154", true);
        SAMLSPUtilities::mo_saml_show_success_message();
        DJ:
        OL:
        nW:
        update_option("\x6d\157\x5f\163\141\x6d\x6c\137\x61\x64\155\151\156\x5f\x70\x61\163\x73\x77\157\162\x64", '');
        dE:
        if (!self::mo_check_option_admin_referer("\155\157\x5f\163\141\x6d\154\137\143\x6f\156\164\x61\x63\x74\x5f\165\x73\x5f\161\165\145\162\x79\x5f\x6f\160\164\151\x6f\156")) {
            goto j1;
        }
        if (mo_saml_is_extension_installed("\143\x75\x72\154")) {
            goto ht;
        }
        update_option("\x6d\x6f\x5f\163\x61\155\154\x5f\x6d\145\163\x73\141\x67\x65", "\x45\x52\x52\x4f\x52\72\40\x50\x48\120\40\x63\x55\x52\114\x20\x65\170\164\145\x6e\x73\151\157\x6e\40\151\163\x20\x6e\157\x74\x20\151\x6e\163\164\x61\154\x6c\x65\144\40\x6f\162\x20\144\151\163\141\x62\x6c\145\144\56\x20\121\x75\x65\162\x79\x20\x73\x75\x62\155\x69\x74\x20\146\141\x69\x6c\x65\144\56");
        SAMLSPUtilities::mo_saml_show_error_message();
        return;
        ht:
        $kr = sanitize_email($_POST["\x6d\157\137\x73\141\x6d\154\137\x63\157\156\164\x61\x63\x74\x5f\x75\x73\x5f\x65\x6d\141\x69\x6c"]);
        $KM = htmlspecialchars($_POST["\155\157\137\x73\x61\x6d\x6c\x5f\x63\157\x6e\x74\141\143\164\x5f\x75\163\x5f\160\150\x6f\156\145"]);
        $CI = htmlspecialchars($_POST["\x6d\157\137\163\141\x6d\154\x5f\x63\157\x6e\164\x61\x63\x74\137\x75\163\137\x71\x75\145\162\x79"]);
        if (!empty($_POST["\x73\x65\x6e\144\137\160\x6c\x75\x67\151\x6e\x5f\x63\x6f\156\146\151\147"])) {
            goto v4;
        }
        update_option("\163\145\x6e\144\137\160\x6c\x75\x67\151\x6e\x5f\x63\x6f\156\146\x69\x67", "\x6f\x66\146");
        goto P1;
        v4:
        $nH = miniorange_import_export(true, true);
        $CI .= $nH;
        delete_option("\x73\x65\x6e\x64\137\x70\x6c\165\147\151\156\x5f\143\x6f\156\x66\x69\x67");
        P1:
        $YJ = new CustomerSaml();
        if (empty($kr) || empty($CI)) {
            goto sc;
        }
        if (!filter_var($kr, FILTER_VALIDATE_EMAIL)) {
            goto Sy;
        }
        $sQ = $YJ->submit_contact_us($kr, $KM, $CI);
        if ($sQ) {
            goto hw;
        }
        return;
        hw:
        update_option("\x6d\157\x5f\163\x61\155\x6c\137\155\x65\x73\x73\141\x67\145", "\x54\150\x61\x6e\153\x73\40\x66\157\162\40\147\x65\164\x74\151\156\147\x20\x69\156\40\x74\157\x75\x63\150\41\x20\127\145\x20\x73\150\x61\x6c\x6c\40\147\x65\x74\40\142\141\143\x6b\x20\164\x6f\x20\171\x6f\165\40\x73\150\157\x72\x74\154\171\x2e");
        SAMLSPUtilities::mo_saml_show_success_message();
        goto z2;
        Sy:
        update_option("\x6d\157\137\163\141\x6d\154\x5f\155\145\x73\163\x61\147\x65", "\x50\x6c\145\141\163\x65\x20\x65\156\x74\x65\162\40\141\40\166\141\154\151\x64\40\x65\155\x61\x69\x6c\x20\141\144\x64\162\x65\163\163\56");
        SAMLSPUtilities::mo_saml_show_error_message();
        return;
        z2:
        goto s1;
        sc:
        update_option("\155\x6f\x5f\x73\x61\155\154\137\155\145\163\163\x61\147\x65", "\x50\x6c\145\141\x73\x65\x20\x66\x69\x6c\154\40\165\x70\40\x45\x6d\x61\x69\154\x20\x61\156\144\40\x51\x75\145\x72\171\40\146\x69\145\x6c\144\163\40\164\157\40\x73\x75\x62\x6d\151\164\x20\171\x6f\x75\162\40\x71\x75\145\162\x79\56");
        SAMLSPUtilities::mo_saml_show_error_message();
        s1:
        j1:
        if (!self::mo_check_option_admin_referer("\x6d\157\x5f\163\x61\x6d\154\137\x76\x65\x72\151\146\x79\137\x6c\151\143\145\x6e\163\x65")) {
            goto yA;
        }
        if (!empty($_POST["\x73\x61\155\154\x5f\154\151\143\145\x6e\143\145\137\x6b\145\171"])) {
            goto KF;
        }
        update_option("\x6d\x6f\x5f\x73\141\x6d\x6c\x5f\155\145\163\x73\141\147\x65", "\101\154\x6c\40\x74\150\x65\40\x66\151\145\x6c\144\163\40\x61\162\x65\40\x72\145\x71\165\151\x72\145\144\56\x20\x50\x6c\145\141\163\x65\x20\x65\x6e\164\145\x72\x20\x76\141\x6c\151\x64\40\x6c\x69\143\x65\156\x73\145\x20\x6b\145\171\x2e");
        SAMLSPUtilities::mo_saml_show_error_message();
        return;
        KF:
        $rV = htmlspecialchars(trim($_POST["\x73\x61\155\154\137\x6c\x69\143\145\156\143\145\137\x6b\145\x79"]));
        $YJ = new Customersaml();
        $CE = "\x59\x6f\165\x72\x20\x6c\x69\143\x65\x6e\x73\145\x20\x69\x73\x20\x76\145\162\151\146\x69\145\x64\56\40\131\x6f\x75\40\143\x61\156\40\x6e\157\167\40\163\x65\164\x75\160\x20\164\150\x65\x20\x70\154\165\147\x69\x6e\56";
        $this->djkasjdksaduwaj($rV, $YJ, $CE);
        yA:
        if (!self::mo_check_option_admin_referer("\155\157\x5f\163\x61\155\x6c\x5f\143\x68\145\143\x6b\137\x6c\151\x63\145\156\163\145")) {
            goto v1;
        }
        LicenseHelper::migrateExistingEnvironments();
        $YJ = new Customersaml();
        $mr = get_option("\155\157\137\x73\x61\x6d\x6c\x5f\x63\x75\x73\x74\157\155\145\162\137\164\157\x6b\145\156");
        $rV = AESEncryption::decrypt_data(get_option("\163\x6d\154\137\154\153"), $mr);
        $CE = "\131\x6f\165\40\x68\141\166\145\40\163\165\x63\x63\x65\x73\x73\146\x75\154\x6c\171\x20\x75\x70\x64\x61\x74\145\x64\x20\x79\157\x75\x72\x20\154\x69\143\x65\x6e\x73\x65\40\x64\145\164\141\x69\154\x73\x2e";
        $this->djkasjdksaduwaj($rV, $YJ, $CE);
        v1:
        if (!self::mo_check_option_admin_referer("\155\x6f\x5f\163\x61\155\154\x5f\162\145\155\157\166\145\x5f\x61\x63\x63\x6f\x75\x6e\x74")) {
            goto Nc;
        }
        $this->mo_sso_saml_deactivate();
        Mo_Saml_License_Utility::reset_license_values();
        $gA = add_query_arg(array("\x74\141\142" => "\154\157\147\x69\156"), $_SERVER["\x52\x45\x51\x55\x45\123\124\137\125\x52\111"]);
        header("\x4c\x6f\143\x61\x74\151\x6f\x6e\x3a\40" . $gA);
        Nc:
        site_check();
    }
    function djkasjdksa()
    {
        $Xp = "\41\176\x40\x23\x24\45\x5e\x26\x2a\50\51\x5f\53\x7c\x7b\175\x3c\76\77\60\x31\x32\63\64\x35\x36\67\70\71\141\x62\x63\144\x65\x66\147\x68\151\152\x6b\x6c\155\x6e\157\160\x71\x72\163\x74\x75\166\167\170\171\172\x41\x42\103\104\x45\106\107\110\x49\112\x4b\114\x4d\x4e\x4f\x50\x51\122\x53\124\x55\126\x57\x58\131\132";
        $a0 = strlen($Xp);
        $Wa = '';
        $p0 = 0;
        Et:
        if (!($p0 < 10000)) {
            goto EV;
        }
        $Wa .= $Xp[rand(0, $a0 - 1)];
        Db:
        $p0++;
        goto Et;
        EV:
        return $Wa;
    }
    function create_customer()
    {
        $YJ = new CustomerSaml();
        $HO = $YJ->create_customer();
        if ($HO) {
            goto FA;
        }
        return;
        FA:
        $Mz = json_decode($HO, true);
        if (strcasecmp($Mz["\163\164\141\x74\165\163"], "\x43\125\123\124\x4f\115\x45\122\x5f\125\123\x45\x52\x4e\101\x4d\105\137\101\114\122\x45\x41\x44\131\137\x45\130\x49\123\124\123") == 0) {
            goto rS;
        }
        if (!(strcasecmp($Mz["\163\164\x61\x74\x75\x73"], "\123\x55\x43\103\x45\x53\123") == 0)) {
            goto I5;
        }
        update_option("\x6d\x6f\137\163\141\x6d\x6c\137\141\144\155\151\156\137\x63\x75\163\164\x6f\x6d\x65\x72\137\153\x65\x79", $Mz["\x69\144"]);
        update_option("\x6d\157\137\163\141\155\154\137\x61\x64\x6d\x69\156\x5f\141\x70\151\x5f\153\x65\171", $Mz["\141\x70\x69\113\x65\171"]);
        update_option("\x6d\x6f\137\x73\141\155\154\137\143\165\x73\x74\157\x6d\x65\x72\137\164\x6f\x6b\145\156", $Mz["\x74\157\153\x65\x6e"]);
        update_option("\155\x6f\137\163\x61\155\154\x5f\x61\144\155\x69\x6e\x5f\160\141\x73\x73\x77\157\x72\x64", '');
        update_option("\x6d\x6f\x5f\x73\141\x6d\154\137\155\145\x73\x73\141\x67\145", "\x54\150\141\156\153\x20\x79\x6f\x75\x20\146\157\x72\40\x72\x65\147\151\163\x74\145\162\x69\x6e\x67\x20\x77\x69\164\150\40\155\x69\x6e\x69\157\x72\x61\156\147\145\56");
        delete_option("\x6d\x6f\x5f\163\141\155\154\x5f\x76\145\162\151\x66\x79\137\143\165\163\x74\x6f\155\x65\x72");
        SAMLSPUtilities::mo_saml_show_success_message();
        I5:
        goto R7;
        rS:
        $this->get_current_customer();
        R7:
        update_option("\155\x6f\x5f\x73\141\155\154\x5f\x61\x64\155\x69\x6e\x5f\160\141\x73\x73\x77\157\x72\144", '');
    }
    function get_current_customer()
    {
        $YJ = new CustomerSaml();
        $HO = $YJ->get_customer_key();
        if ($HO) {
            goto fZ;
        }
        return;
        fZ:
        $Mz = json_decode($HO, true);
        if (json_last_error() == JSON_ERROR_NONE) {
            goto p7;
        }
        update_option("\x6d\x6f\137\163\141\x6d\x6c\x5f\x6d\145\x73\x73\141\x67\145", "\131\x6f\x75\x20\141\x6c\162\145\x61\x64\171\x20\x68\141\x76\x65\x20\141\156\40\141\x63\143\x6f\x75\156\x74\x20\167\x69\x74\x68\x20\x6d\x69\x6e\151\x4f\162\x61\156\x67\145\x2e\40\x50\154\145\141\163\x65\x20\145\x6e\x74\x65\162\x20\x61\x20\166\x61\154\151\144\40\x70\x61\163\163\167\157\x72\x64\x2e");
        update_option("\155\x6f\x5f\163\141\x6d\154\x5f\x76\145\162\151\x66\171\x5f\x63\x75\x73\x74\x6f\155\x65\x72", "\x74\x72\165\x65");
        SAMLSPUtilities::mo_saml_show_error_message();
        goto J0;
        p7:
        update_option("\155\157\137\x73\x61\155\154\137\x61\144\155\151\x6e\x5f\143\x75\x73\x74\x6f\155\x65\162\x5f\153\x65\x79", $Mz["\151\x64"]);
        update_option("\155\157\137\163\141\155\x6c\137\141\144\155\x69\x6e\x5f\141\160\x69\137\x6b\x65\x79", $Mz["\141\x70\151\113\x65\171"]);
        update_option("\155\x6f\137\163\141\155\154\x5f\143\165\x73\164\x6f\x6d\145\x72\x5f\164\x6f\x6b\x65\156", $Mz["\x74\x6f\153\145\x6e"]);
        update_option("\155\157\137\163\x61\155\x6c\x5f\141\144\155\151\156\x5f\x70\x61\x73\x73\167\x6f\x72\x64", '');
        update_option("\155\157\x5f\163\141\155\x6c\x5f\155\145\x73\163\141\147\145", "\131\x6f\x75\162\x20\x61\x63\x63\157\x75\x6e\164\40\150\x61\x73\40\x62\145\145\x6e\40\x72\x65\164\x72\151\x65\166\145\144\x20\x73\x75\x63\x63\145\163\x73\146\165\154\x6c\171\x2e");
        delete_option("\x6d\x6f\x5f\163\x61\155\154\137\166\x65\x72\151\146\171\137\x63\x75\163\x74\x6f\x6d\x65\162");
        SAMLSPUtilities::mo_saml_show_success_message();
        J0:
    }
    function miniorange_sso_menu()
    {
        $eV = add_menu_page("\115\117\x20\123\x41\115\x4c\x20\123\123\117\40\123\145\164\164\151\156\x67\163", "\155\x69\156\151\117\x72\x61\156\147\x65\40\x53\x41\x4d\114\x20\62\56\60\x20\123\123\117", "\x61\144\155\x69\156\x69\163\x74\162\141\164\157\162", "\155\x6f\x5f\x73\141\x6d\x6c\137\163\145\164\x74\x69\156\x67\x73", array($this, "\155\157\x5f\x6c\x6f\x67\x69\x6e\x5f\167\151\144\147\145\x74\x5f\x73\141\155\154\x5f\157\x70\164\151\157\x6e\163"), plugin_dir_url(__FILE__) . "\151\155\x61\147\145\x73\57\155\x69\156\151\157\x72\x61\x6e\147\145\x2e\x70\x6e\x67");
        if (!Mo_Saml_License_Utility::is_customer_license_valid(false, false)) {
            goto cM;
        }
        add_submenu_page("\155\157\x5f\x73\x61\155\154\x5f\x73\145\x74\x74\151\156\147\x73", "\x4d\x61\156\141\147\145\40\115\x75\x6c\164\x69\160\x6c\145\x20\105\156\x76\x69\x72\157\156\155\145\x6e\x74\x73", "\115\x61\156\141\147\x65\40\115\x75\154\164\151\x70\154\x65\40\x45\x6e\166\151\162\157\x6e\155\x65\156\x74\163", "\x61\x64\155\151\x6e\x69\163\x74\162\x61\x74\157\162", "\x6d\x6f\137\x6d\x61\156\x61\x67\x65\137\154\x69\x63\145\x6e\x73\145", "\155\157\x5f\x6d\x61\x6e\x61\x67\x65\137\x6c\x69\143\x65\x6e\163\145");
        add_submenu_page("\x6d\x6f\137\x73\141\x6d\x6c\137\x73\145\164\x74\151\x6e\147\x73", "\155\x69\156\x69\x4f\x72\x61\156\147\x65\40\x53\101\x4d\x4c\40\x32\56\60\40\x53\x53\117", __("\x3c\x64\151\x76\x20\151\x64\x3d\x22\x6d\157\x5f\163\x61\155\154\x5f\x61\x64\144\157\x6e\163\x5f\163\165\x62\155\x65\x6e\x75\x22\76\x41\144\144\x2d\117\x6e\x73\x3c\57\144\151\x76\x3e", "\155\x69\156\151\x6f\162\x61\x6e\147\145\55\163\x61\155\154\x2d\x32\x30\55\x73\x69\x6e\147\x6c\145\55\x73\151\147\x6e\x2d\157\156"), "\x6d\141\156\141\x67\145\137\157\160\x74\151\157\156\x73", "\x6d\x6f\137\163\141\x6d\x6c\137\163\x65\164\164\x69\x6e\147\163\46\164\x61\x62\75\141\x64\x64\x2d\x6f\156\163", array($this, "\155\157\x5f\154\x6f\147\x69\156\x5f\167\151\144\x67\x65\164\x5f\163\141\155\154\137\157\160\164\151\x6f\x6e\x73"));
        cM:
        add_submenu_page("\155\x6f\137\163\x61\x6d\x6c\x5f\x73\145\x74\x74\x69\156\x67\163", "\105\x72\x72\157\162\40\103\x6f\144\145\x73", "\105\x72\x72\x6f\162\x20\x43\157\x64\145\x73", "\141\x64\x6d\x69\156\x69\163\x74\x72\141\x74\157\162", "\155\157\137\145\x72\x72\157\x72\137\143\157\x64\x65\x73", array("\x4d\x6f\x5f\x53\141\155\154\x5f\x45\x72\x72\x6f\x72\x5f\x43\157\x64\x65\163\x5f\126\x69\x65\167", "\x6d\x6f\137\x73\x61\x6d\x6c\x5f\x67\x65\x74\137\145\x72\x72\157\x72\x5f\x63\x6f\144\145\163\x5f\x76\x69\145\167"));
    }
    function mo_saml_redirect_for_authentication($d2)
    {
        if (!Mo_Saml_License_Utility::is_customer_license_valid()) {
            goto Jw;
        }
        if (!(get_option("\155\157\x5f\x73\141\x6d\x6c\137\x72\145\x67\151\163\x74\x65\162\x65\144\137\x6f\156\x6c\x79\x5f\141\x63\x63\x65\x73\x73") == "\164\162\165\x65")) {
            goto c7;
        }
        $base_url = home_url();
        echo "\74\x73\143\x72\x69\x70\164\x3e\x77\151\156\144\157\x77\56\x6c\157\x63\141\x74\151\157\x6e\x2e\x68\162\145\146\x3d\x27{$base_url}\57\77\x6f\160\164\x69\157\x6e\x3d\x73\x61\155\154\x5f\x75\x73\145\162\137\154\x6f\147\x69\x6e\46\x72\145\144\x69\x72\145\x63\x74\x5f\x74\x6f\x3d\x27\x2b\145\x6e\143\x6f\x64\x65\x55\x52\111\103\x6f\x6d\160\157\156\x65\156\x74\50\x77\151\156\144\x6f\167\x2e\154\x6f\x63\x61\x74\x69\x6f\x6e\x2e\x68\162\145\146\51\x3b\74\57\x73\x63\x72\151\x70\164\76";
        exit;
        c7:
        if (get_option("\x6d\x6f\137\163\141\155\x6c\137\162\x65\147\x69\163\x74\x65\162\x65\x64\137\157\156\x6c\x79\137\x61\143\143\x65\163\x73") == "\x74\x72\x75\145" || get_option("\155\x6f\x5f\163\141\x6d\154\x5f\x65\156\141\142\x6c\145\x5f\154\157\x67\x69\156\137\162\145\x64\151\162\145\143\x74") == "\x74\x72\165\x65") {
            goto Sv;
        }
        if (!(get_option("\155\x6f\137\x73\x61\x6d\x6c\x5f\x72\x65\144\x69\x72\x65\x63\164\137\164\157\x5f\x77\160\137\x6c\x6f\x67\x69\x6e") == "\x74\x72\165\x65")) {
            goto iY;
        }
        if (!(mo_saml_is_sp_configured() && !is_user_logged_in())) {
            goto Wd;
        }
        $gA = site_url() . "\57\x77\160\55\x6c\157\147\x69\156\56\x70\150\x70";
        if (empty($d2)) {
            goto MB;
        }
        $gA = $gA . "\x3f\162\145\x64\x69\x72\x65\143\164\137\x74\x6f\75" . urlencode($d2) . "\x26\162\x65\x61\165\164\150\x3d\x31";
        MB:
        header("\x4c\157\143\x61\164\151\x6f\156\72\x20" . $gA);
        exit;
        Wd:
        iY:
        goto iX;
        Sv:
        if (!(mo_saml_is_sp_configured() && !is_user_logged_in())) {
            goto c5;
        }
        $j1 = get_option("\x6d\157\x5f\163\141\x6d\x6c\137\163\160\x5f\x62\x61\163\145\x5f\x75\x72\154");
        if (!empty($j1)) {
            goto Ec;
        }
        $j1 = home_url();
        Ec:
        if (!(get_option("\155\x6f\x5f\x73\141\x6d\154\x5f\162\145\154\141\171\x5f\163\164\x61\164\145") && get_option("\x6d\x6f\x5f\163\x61\x6d\x6c\x5f\x72\x65\154\x61\171\137\163\x74\141\x74\x65") != '')) {
            goto hR;
        }
        $d2 = get_option("\x6d\157\137\163\141\155\x6c\137\162\145\x6c\x61\171\137\x73\164\141\164\145");
        hR:
        $d2 = mo_saml_get_relay_state($d2);
        $xl = empty($d2) ? "\x2f" : $d2;
        $yc = htmlspecialchars_decode(LicenseHelper::getCurrentOption(Mo_Saml_Options_Enum_Service_Provider::LOGIN_URL));
        $ab = LicenseHelper::getCurrentOption(Mo_Saml_Options_Enum_Service_Provider::LOGIN_BINDING_TYPE);
        $qe = get_option("\x6d\157\x5f\x73\141\x6d\x6c\137\x66\x6f\162\x63\145\x5f\141\165\x74\150\145\x6e\164\x69\x63\x61\164\x69\157\156");
        $KG = $j1 . "\x2f";
        $g8 = get_option(Mo_Saml_Options_Enum_Identity_Provider::SP_ENTITY_ID);
        $Kp = LicenseHelper::getCurrentOption(Mo_Saml_Options_Enum_Service_Provider::NAMEID_FORMAT);
        if (!empty($Kp)) {
            goto Oi;
        }
        $Kp = "\61\56\x31\x3a\156\x61\x6d\x65\x69\144\x2d\146\x6f\x72\155\141\x74\x3a\x75\156\x73\x70\x65\x63\x69\x66\x69\145\x64";
        Oi:
        if (!empty($g8)) {
            goto yv;
        }
        $g8 = $j1 . "\57\167\x70\55\143\157\156\164\x65\156\x74\x2f\x70\154\x75\x67\x69\156\163\x2f\155\151\x6e\x69\157\162\141\156\147\x65\x2d\163\141\x6d\154\55\x32\x30\x2d\163\x69\156\147\x6c\x65\x2d\163\151\x67\x6e\x2d\157\x6e\57";
        yv:
        $Jk = SAMLSPUtilities::createAuthnRequest($KG, $g8, $yc, $qe, $ab, $Kp);
        if (empty($ab) || $ab == "\x48\x74\x74\160\122\145\144\151\162\x65\143\164") {
            goto oI;
        }
        if (!(LicenseHelper::getCurrentOption(Mo_Saml_Options_Enum_Service_Provider::REQUEST_SIGNED) == "\165\x6e\143\150\145\143\x6b\145\x64")) {
            goto qz;
        }
        $ru = base64_encode($Jk);
        SAMLSPUtilities::postSAMLRequest($yc, $ru, $xl);
        exit;
        qz:
        $ru = SAMLSPUtilities::signXML($Jk, "\x4e\141\155\x65\111\104\120\157\x6c\x69\143\x79");
        SAMLSPUtilities::postSAMLRequest($yc, $ru, $xl);
        goto y7;
        oI:
        $ZB = $yc;
        if (strpos($yc, "\77") !== false) {
            goto dR;
        }
        $ZB .= "\77";
        goto c3;
        dR:
        $ZB .= "\x26";
        c3:
        if (!(LicenseHelper::getCurrentOption(Mo_Saml_Options_Enum_Service_Provider::REQUEST_SIGNED) == "\x75\156\143\x68\x65\143\x6b\x65\144")) {
            goto WP;
        }
        $ZB .= "\x53\101\115\x4c\122\145\x71\165\145\163\164\x3d" . $Jk . "\46\x52\x65\154\x61\171\123\x74\x61\164\145\75" . urlencode($xl);
        header("\x63\141\x63\150\x65\55\x63\x6f\x6e\164\x72\157\154\x3a\40\155\x61\170\55\141\147\145\75\60\x2c\40\x70\162\151\x76\141\x74\x65\54\x20\x6e\157\x2d\163\164\157\x72\x65\54\40\x6e\x6f\x2d\x63\x61\143\x68\145\x2c\x20\155\165\163\164\x2d\162\145\166\x61\154\x69\x64\141\x74\145");
        header("\114\x6f\143\141\x74\151\157\156\72\x20" . $ZB);
        exit;
        WP:
        $Jk = "\123\101\115\114\122\145\161\x75\x65\163\x74\x3d" . $Jk . "\46\x52\x65\x6c\141\x79\123\x74\x61\x74\145\x3d" . urlencode($xl) . "\x26\x53\x69\x67\101\154\x67\75" . urlencode(XMLSecurityKey::RSA_SHA256);
        $t8 = array("\164\171\160\x65" => "\x70\x72\151\x76\x61\164\x65");
        $mr = new XMLSecurityKey(XMLSecurityKey::RSA_SHA256, $t8);
        $UZ = get_option("\155\x6f\137\163\x61\x6d\x6c\x5f\x63\165\x72\162\145\x6e\164\x5f\143\x65\162\x74\x5f\x70\162\151\x76\x61\164\145\x5f\153\x65\x79");
        $mr->loadKey($UZ, FALSE);
        $N2 = new XMLSecurityDSig();
        $UR = $mr->signData($Jk);
        $UR = base64_encode($UR);
        $ZB .= $Jk . "\x26\x53\x69\147\x6e\141\164\x75\x72\x65\75" . urlencode($UR);
        header("\143\141\143\150\x65\55\x63\157\x6e\x74\162\x6f\154\72\x20\x6d\141\x78\x2d\141\147\145\75\60\x2c\40\160\162\x69\x76\141\x74\x65\54\40\156\157\55\163\164\x6f\162\145\54\40\x6e\x6f\x2d\x63\x61\143\x68\x65\x2c\x20\x6d\x75\x73\164\55\x72\145\x76\141\154\x69\x64\141\164\145");
        header("\114\x6f\143\x61\x74\x69\x6f\156\x3a\40" . $ZB);
        exit;
        y7:
        c5:
        iX:
        Jw:
    }
    function mo_saml_login_redirect($d9)
    {
        $Ix = false;
        if (!(strcmp(wp_login_url(), $d9) == 0)) {
            goto yV;
        }
        $Ix = true;
        yV:
        if (!empty($d9) && !$Ix) {
            goto eD;
        }
        header("\x4c\157\x63\x61\x74\151\x6f\x6e\72\x20" . home_url());
        goto Ci;
        eD:
        header("\114\x6f\x63\x61\x74\151\157\156\x3a\x20" . $d9);
        Ci:
        exit;
    }
    function mo_saml_authenticate()
    {
        $d9 = '';
        if (empty($_REQUEST["\x72\145\x64\x69\162\145\143\164\x5f\x74\157"])) {
            goto QW;
        }
        $d9 = htmlspecialchars($_REQUEST["\x72\x65\144\x69\x72\145\143\164\x5f\x74\x6f"]);
        QW:
        if (!is_user_logged_in()) {
            goto pP;
        }
        $this->mo_saml_login_redirect($d9);
        pP:
        if (!(get_option("\155\x6f\x5f\x73\x61\x6d\x6c\137\x65\156\x61\142\x6c\x65\x5f\154\157\147\151\x6e\137\x72\145\x64\x69\x72\145\143\x74") == "\x74\162\x75\145")) {
            goto wx;
        }
        if (!Mo_Saml_License_Utility::is_plugin_license_expired(true)) {
            goto L1;
        }
        return;
        L1:
        $uM = get_option("\x6d\x6f\137\x73\x61\x6d\154\137\142\x61\x63\153\x64\157\157\x72\137\165\162\x6c") ? trim(get_option("\155\157\x5f\x73\141\x6d\x6c\137\x62\141\143\153\x64\x6f\x6f\x72\137\x75\x72\154")) : "\146\x61\154\x73\x65";
        if (isset($_GET["\154\x6f\147\147\145\144\157\165\164"]) && $_GET["\154\x6f\147\x67\145\144\157\x75\x74"] == "\164\162\x75\145") {
            goto wS;
        }
        if (get_option("\155\157\x5f\x73\141\x6d\154\137\141\154\154\157\x77\137\x77\x70\x5f\x73\151\x67\156\151\156") == "\164\x72\165\x65") {
            goto oz;
        }
        goto RB;
        wS:
        header("\x4c\157\x63\x61\164\151\x6f\x6e\x3a\40" . home_url());
        exit;
        goto RB;
        oz:
        if (!empty($_REQUEST["\163\x61\155\154\137\163\163\157"]) && $_REQUEST["\163\x61\155\154\x5f\163\x73\157"] === $uM) {
            goto sf;
        }
        if (!empty($_REQUEST["\162\145\144\x69\x72\x65\x63\x74\x5f\x74\x6f"])) {
            goto VT;
        }
        goto rT;
        sf:
        return;
        goto rT;
        VT:
        $d9 = htmlspecialchars($_REQUEST["\x72\x65\x64\151\162\145\x63\164\137\164\x6f"]);
        if (!(strpos($d9, "\x77\160\55\x61\x64\155\x69\x6e") !== false && strpos($d9, "\163\x61\x6d\154\137\x73\x73\x6f\75" . $uM) !== false)) {
            goto Hg;
        }
        return;
        Hg:
        rT:
        RB:
        $this->mo_saml_redirect_for_authentication($d9);
        wx:
    }
    function mo_saml_auto_redirect()
    {
        $OY = false;
        $OY = apply_filters("\155\x6f\137\x73\141\x6d\x6c\x5f\x62\x65\146\157\x72\x65\x5f\141\x75\164\x6f\x5f\162\x65\144\x69\162\x65\x63\164", $OY);
        if (!(is_user_logged_in() || $OY)) {
            goto yd;
        }
        return;
        yd:
        if (!(get_option("\x6d\157\137\163\x61\155\x6c\137\x72\145\147\x69\163\164\x65\162\x65\x64\137\157\156\154\171\137\141\143\x63\145\163\x73") == "\x74\x72\165\x65" || get_option("\x6d\x6f\137\163\x61\x6d\154\137\162\x65\144\151\x72\x65\143\x74\x5f\164\157\137\167\x70\137\x6c\x6f\147\151\x6e") == "\x74\162\x75\145")) {
            goto zF;
        }
        if (!(get_option("\155\157\x5f\163\x61\155\154\137\x65\156\141\142\154\x65\137\x72\x73\x73\137\x61\143\x63\x65\163\163") == "\164\x72\165\145" && is_feed())) {
            goto n1;
        }
        return;
        n1:
        $d2 = saml_get_current_page_url();
        $this->mo_saml_redirect_for_authentication($d2);
        zF:
    }
    function mo_saml_modify_login_form()
    {
        $uM = get_option("\155\x6f\137\163\141\155\154\x5f\x62\x61\143\x6b\144\x6f\x6f\x72\x5f\165\162\154") ? trim(get_option("\155\157\x5f\x73\141\155\x6c\x5f\142\141\143\153\x64\x6f\157\x72\137\165\162\154")) : "\x66\x61\x6c\163\145";
        echo "\74\x69\156\x70\165\164\x20\x74\x79\160\x65\75\x22\150\x69\144\144\145\x6e\x22\x20\x6e\141\155\x65\x3d\x22\x73\x61\155\154\x5f\x73\x73\x6f\x22\x20\166\141\x6c\165\x65\75" . $uM . "\x3e" . "\xa";
        if (!(get_option("\155\157\x5f\163\141\155\154\137\x61\144\x64\137\x73\x73\157\x5f\142\x75\164\x74\x6f\156\137\x77\160") == "\x74\162\x75\145")) {
            goto oZ;
        }
        $this->mo_saml_add_sso_button();
        oZ:
    }
    function mo_saml_login_enqueue_scripts()
    {
        wp_enqueue_script("\x6a\161\x75\x65\x72\171");
    }
    function mo_saml_add_sso_button()
    {
        $Kg = SAMLSPUtilities::mo_saml_is_user_logged_in();
        if ($Kg) {
            goto m9;
        }
        $j1 = get_option("\155\157\137\x73\x61\155\154\x5f\163\x70\137\142\141\163\x65\x5f\165\162\x6c");
        if (!empty($j1)) {
            goto Rs;
        }
        $j1 = home_url();
        Rs:
        $Xs = get_option("\x6d\157\x5f\163\x61\x6d\x6c\x5f\142\165\x74\164\157\156\137\x77\x69\x64\164\150") ? get_option("\x6d\157\x5f\x73\141\x6d\x6c\137\142\165\164\x74\157\156\x5f\x77\151\144\164\150") : "\61\60\60";
        $vB = get_option("\155\x6f\x5f\163\x61\x6d\x6c\137\142\x75\164\164\x6f\156\x5f\150\x65\x69\147\150\x74") ? get_option("\155\x6f\x5f\163\x61\x6d\154\137\x62\165\x74\164\157\x6e\137\x68\x65\x69\x67\150\164") : "\65\x30";
        $kx = get_option("\x6d\157\x5f\x73\x61\155\x6c\137\x62\165\164\x74\157\x6e\x5f\x73\x69\172\x65") ? get_option("\155\157\137\x73\x61\x6d\x6c\x5f\142\x75\164\x74\x6f\x6e\137\x73\151\x7a\x65") : "\65\x30";
        $Gg = get_option("\x6d\x6f\137\163\141\155\x6c\x5f\x62\x75\x74\164\x6f\x6e\x5f\143\x75\162\166\x65") ? get_option("\155\x6f\x5f\163\x61\155\154\x5f\x62\165\164\x74\157\156\x5f\x63\165\162\x76\145") : "\x35";
        $Ug = get_option("\155\x6f\137\163\141\155\154\137\x62\x75\x74\164\x6f\x6e\137\x63\157\x6c\157\162") ? get_option("\x6d\157\137\163\141\155\154\x5f\x62\x75\x74\x74\x6f\x6e\137\143\x6f\154\157\x72") : "\x23\x30\60\x38\65\142\141";
        $D0 = get_option("\x6d\x6f\137\163\x61\155\x6c\x5f\142\x75\164\x74\x6f\156\x5f\164\x68\x65\155\145") ? get_option("\x6d\x6f\137\163\141\155\x6c\x5f\x62\x75\x74\x74\157\x6e\137\164\x68\145\x6d\x65") : "\x6c\157\156\147\x62\165\164\164\x6f\156";
        $Gz = LicenseHelper::getCurrentOption(Mo_Saml_Options_Enum_Service_Provider::IDENTITY_NAME);
        $QL = get_option("\x6d\x6f\x5f\163\141\x6d\154\137\x62\165\x74\164\x6f\156\137\x74\x65\x78\x74") ? get_option("\x6d\x6f\x5f\x73\x61\x6d\x6c\x5f\142\x75\x74\164\x6f\x6e\x5f\x74\x65\x78\164") : ($Gz ? $Gz : "\114\x6f\147\151\156");
        $vM = get_option("\x6d\157\x5f\163\141\155\x6c\137\146\157\x6e\x74\137\x63\157\x6c\157\x72") ? get_option("\x6d\x6f\137\x73\x61\155\154\137\x66\157\x6e\x74\x5f\143\x6f\154\x6f\x72") : "\43\x66\146\146\x66\146\146";
        $kl = get_option("\155\157\137\x73\x61\155\x6c\x5f\146\x6f\156\x74\x5f\163\151\x7a\x65") ? get_option("\x6d\x6f\137\163\141\x6d\x6c\x5f\x66\157\156\x74\x5f\x73\x69\172\x65") : "\x32\x30";
        $j6 = get_option("\x73\163\157\137\x62\x75\x74\x74\157\156\137\154\x6f\x67\x69\156\x5f\x66\x6f\x72\155\137\x70\157\163\x69\x74\x69\157\x6e") ? get_option("\x73\x73\x6f\x5f\142\165\x74\x74\x6f\x6e\x5f\154\157\x67\x69\156\137\146\157\x72\x6d\137\x70\x6f\x73\151\164\151\x6f\156") : "\x61\x62\x6f\166\145";
        $Bj = "\x3c\151\x6e\160\x75\x74\40\164\x79\160\x65\x3d\42\x62\x75\164\164\157\156\x22\40\156\x61\x6d\145\x3d\x22\x6d\157\x5f\163\141\x6d\x6c\x5f\167\160\x5f\x73\x73\x6f\x5f\142\165\164\164\157\156\x22\40\166\141\x6c\x75\x65\x3d\x22" . $QL . "\42\40\163\164\171\x6c\x65\x3d\42";
        $EB = '';
        if ($D0 == "\x6c\157\156\x67\142\165\164\164\x6f\x6e") {
            goto gU;
        }
        if ($D0 == "\x63\151\x72\x63\x6c\145") {
            goto WR;
        }
        if ($D0 == "\x6f\166\141\154") {
            goto tY;
        }
        if ($D0 == "\x73\161\x75\141\x72\145") {
            goto ko;
        }
        goto s3;
        WR:
        $EB = $EB . "\167\x69\144\164\150\72" . $kx . "\x70\170\73";
        $EB = $EB . "\x68\145\x69\147\150\164\x3a" . $kx . "\160\x78\73";
        $EB = $EB . "\142\x6f\162\144\x65\x72\55\x72\x61\x64\x69\x75\163\x3a\71\71\x39\160\x78\x3b";
        goto s3;
        tY:
        $EB = $EB . "\167\151\144\164\150\72" . $kx . "\x70\170\73";
        $EB = $EB . "\x68\145\x69\x67\x68\x74\72" . $kx . "\160\170\x3b";
        $EB = $EB . "\x62\157\x72\x64\x65\162\x2d\x72\141\x64\151\x75\163\72\65\160\170\73";
        goto s3;
        ko:
        $EB = $EB . "\x77\x69\144\x74\150\x3a" . $kx . "\x70\x78\x3b";
        $EB = $EB . "\150\145\x69\147\150\164\x3a" . $kx . "\160\x78\x3b";
        $EB = $EB . "\142\x6f\162\x64\x65\162\x2d\162\141\x64\151\165\163\72\60\x70\x78\x3b";
        $EB = $EB . "\160\141\x64\144\x69\x6e\147\x3a\60\160\x78\x3b";
        s3:
        goto CZ;
        gU:
        $EB = $EB . "\167\151\144\x74\150\72" . $Xs . "\x70\x78\73";
        $EB = $EB . "\150\145\x69\147\150\x74\72" . $vB . "\160\x78\73";
        $EB = $EB . "\142\157\x72\x64\x65\x72\55\162\141\144\x69\165\x73\72" . $Gg . "\160\x78\x3b";
        CZ:
        $EB = $EB . "\142\141\x63\x6b\147\162\x6f\165\156\x64\55\143\x6f\154\x6f\x72\x3a" . $Ug . "\73";
        $EB = $EB . "\142\x6f\x72\144\145\x72\55\x63\x6f\x6c\157\x72\72\164\x72\141\x6e\x73\x70\x61\162\145\156\164\x3b";
        $EB = $EB . "\x63\157\154\x6f\162\x3a" . $vM . "\73";
        $EB = $EB . "\x66\157\x6e\164\x2d\163\151\x7a\x65\72" . $kl . "\x70\x78\x3b";
        $EB = $EB . "\143\x75\162\x73\157\162\72\x70\157\x69\x6e\x74\x65\162";
        $Bj = $Bj . $EB . "\42\57\x3e";
        $d9 = '';
        if (!isset($_GET["\162\x65\x64\151\x72\145\x63\x74\x5f\x74\x6f"])) {
            goto MM;
        }
        $d9 = urlencode($_GET["\x72\x65\x64\x69\x72\145\x63\x74\137\x74\157"]);
        MM:
        $qj = "\74\x61\x20\x68\162\x65\146\75\42" . $j1 . "\x2f\77\x6f\160\164\151\157\156\75\163\x61\155\x6c\x5f\x75\163\x65\x72\137\154\157\147\x69\156\46\x72\145\x64\x69\x72\145\143\x74\x5f\164\x6f\75" . $d9 . "\42\x20\163\164\171\x6c\x65\x3d\x22\x74\145\x78\164\x2d\144\145\x63\157\162\x61\x74\151\x6f\x6e\x3a\x6e\157\156\x65\x3b\x22\x3e" . $Bj . "\x3c\57\141\x3e";
        $qj = "\x3c\144\x69\x76\x20\x73\x74\x79\x6c\x65\75\x22\160\x61\144\144\x69\156\x67\x3a\x31\x30\160\170\x3b\42\76" . $qj . "\x3c\x2f\144\x69\166\x3e";
        if ($j6 == "\141\x62\157\166\x65") {
            goto Oo;
        }
        $qj = "\74\144\151\x76\x20\x69\144\x3d\42\x73\163\x6f\137\x62\x75\x74\x74\157\x6e\x22\40\x73\x74\x79\154\145\75\x22\x74\145\x78\x74\55\x61\154\151\x67\156\72\x63\x65\156\164\145\x72\42\x3e\x3c\x64\x69\x76\40\163\164\x79\154\145\75\x22\x70\141\x64\144\x69\x6e\x67\x3a\65\160\170\73\146\x6f\156\x74\55\163\x69\172\x65\72\61\x34\160\x78\73\42\76\74\142\x3e\x4f\x52\74\x2f\x62\76\x3c\x2f\144\151\x76\76" . $qj . "\74\x2f\x64\x69\x76\76\x3c\142\162\x2f\76";
        goto th;
        Oo:
        $qj = "\x3c\x64\x69\x76\x20\151\x64\75\42\163\x73\157\137\x62\x75\164\x74\157\x6e\42\x20\163\x74\171\x6c\145\75\x22\164\x65\x78\x74\55\x61\154\151\147\x6e\x3a\143\145\x6e\x74\x65\x72\x22\76" . $qj . "\x3c\x64\151\166\x20\x73\164\x79\x6c\145\75\42\x70\141\144\x64\151\x6e\147\x3a\x35\x70\x78\x3b\x66\157\156\x74\55\163\x69\x7a\145\72\61\x34\x70\170\73\x22\x3e\74\142\76\x4f\122\74\x2f\142\76\x3c\x2f\144\151\x76\x3e\x3c\x2f\144\x69\x76\x3e\74\142\162\57\76";
        $qj = $qj . "\74\163\143\162\151\160\x74\76\15\xa\x9\11\x9\166\x61\x72\x20\44\145\x6c\145\155\x65\156\x74\x20\75\x20\x6a\x51\x75\x65\162\171\x28\x22\x23\x75\x73\145\162\137\154\x6f\x67\151\156\x22\51\x3b\15\xa\11\11\x9\152\121\x75\x65\162\171\x28\42\x23\x73\163\x6f\x5f\142\165\x74\x74\157\156\x22\x29\56\x69\x6e\163\145\162\164\x42\145\146\x6f\x72\145\50\152\121\x75\145\162\171\50\x22\x6c\x61\x62\145\x6c\133\x66\157\x72\x3d\x27\x22\53\x24\x65\x6c\145\x6d\145\156\x74\x2e\141\164\x74\x72\x28\47\x69\x64\47\x29\53\x22\x27\135\42\51\51\x3b\15\12\x9\11\11\x3c\57\163\143\162\151\160\164\76";
        th:
        echo $qj;
        m9:
    }
    function mo_get_saml_shortcode($ED)
    {
        if (Mo_Saml_License_Utility::is_customer_license_valid()) {
            goto io;
        }
        return "\x6d\x69\156\x69\117\x72\141\x6e\147\x65\40\x57\120\x20\x53\x41\115\114\x20\123\123\117\x20\x50\154\165\x67\x69\x6e\47\163\x20\114\x69\143\145\156\163\x65\x20\x4b\x65\171\40\151\x73\x20\156\157\x74\x20\x76\x61\154\151\144";
        io:
        $Kg = SAMLSPUtilities::mo_saml_is_user_logged_in();
        if (!$Kg) {
            goto on;
        }
        $current_user = wp_get_current_user();
        $yh = "\x48\145\154\154\157\54";
        if (!get_option("\155\x6f\137\163\141\x6d\x6c\137\143\165\x73\x74\157\x6d\137\147\x72\x65\145\164\x69\156\x67\137\x74\145\x78\164")) {
            goto TQ;
        }
        $yh = get_option("\x6d\x6f\137\x73\x61\155\154\x5f\x63\165\163\x74\157\155\137\x67\x72\145\145\164\151\156\x67\x5f\x74\x65\x78\164");
        TQ:
        $kU = '';
        if (!get_option("\155\157\137\163\x61\155\154\x5f\x67\162\145\x65\x74\151\156\x67\137\156\x61\155\145")) {
            goto nF;
        }
        switch (get_option("\155\157\x5f\x73\141\x6d\x6c\x5f\147\162\145\145\x74\151\156\147\x5f\156\141\155\x65")) {
            case "\125\123\x45\x52\116\101\115\105":
                $kU = $current_user->user_login;
                goto AC;
            case "\x45\115\x41\111\x4c":
                $kU = $current_user->user_email;
                goto AC;
            case "\106\x4e\x41\115\105":
                $kU = $current_user->user_firstname;
                goto AC;
            case "\114\116\x41\x4d\x45":
                $kU = $current_user->user_lastname;
                goto AC;
            case "\106\116\101\115\x45\137\x4c\x4e\x41\115\105":
                $kU = $current_user->user_firstname . "\x20" . $current_user->user_lastname;
                goto AC;
            case "\114\x4e\101\x4d\105\x5f\x46\116\101\x4d\x45":
                $kU = $current_user->user_lastname . "\40" . $current_user->user_firstname;
                goto AC;
            default:
                $kU = $current_user->user_login;
        }
        yW:
        AC:
        nF:
        $kU = trim($kU);
        if (!empty($kU)) {
            goto sM;
        }
        $kU = $current_user->user_login;
        sM:
        $ie = $yh . "\x20" . $kU;
        $nK = "\x4c\157\147\x6f\x75\164";
        if (!get_option("\155\157\137\163\141\x6d\154\x5f\x63\x75\x73\x74\x6f\x6d\137\154\x6f\147\157\165\x74\137\164\145\170\x74")) {
            goto Nz;
        }
        $nK = get_option("\x6d\157\137\163\x61\155\154\x5f\x63\165\x73\164\157\155\137\154\x6f\x67\157\165\164\137\x74\145\x78\x74");
        Nz:
        $qj = $ie . "\x20\x7c\x20\x3c\141\40\150\x72\145\146\75\42" . wp_logout_url(home_url()) . "\42\40\164\x69\164\x6c\x65\75\42\154\x6f\147\x6f\165\164\42\x20\76" . $nK . "\74\x2f\x61\x3e\x3c\57\154\x69\x3e";
        goto Ml;
        on:
        $j1 = get_option("\x6d\157\x5f\x73\x61\x6d\154\x5f\163\x70\137\x62\141\x73\145\x5f\165\x72\154");
        if (!empty($j1)) {
            goto TJ;
        }
        $j1 = home_url();
        TJ:
        if (mo_saml_is_sp_configured()) {
            goto YQ;
        }
        $qj = "\x53\x50\x20\x69\x73\x20\156\157\164\40\x63\x6f\x6e\146\151\147\x75\162\145\144\x2e";
        goto pb;
        YQ:
        $nU = LicenseHelper::getCurrentOption(Mo_Saml_Options_Enum_Service_Provider::IDENTITY_NAME);
        $Am = '';
        if (!(!empty($ED) and is_array($ED))) {
            goto jk;
        }
        if (empty($ED["\151\144\x70"])) {
            goto Sk;
        }
        $nU = $ED["\151\x64\160"];
        $Am = $nU;
        Sk:
        jk:
        $mp = "\x4c\157\x67\151\156\40\167\x69\164\x68\40" . LicenseHelper::getCurrentOption(Mo_Saml_Options_Enum_Service_Provider::IDENTITY_NAME);
        if (!get_option("\x6d\x6f\x5f\163\141\x6d\x6c\x5f\143\x75\163\164\x6f\x6d\x5f\154\x6f\x67\151\156\x5f\x74\x65\170\164")) {
            goto Ch;
        }
        $mp = get_option("\155\x6f\x5f\163\x61\x6d\154\137\x63\x75\x73\x74\x6f\x6d\x5f\154\157\147\x69\156\137\164\x65\x78\x74");
        Ch:
        $ws = LicenseHelper::getCurrentOption(Mo_Saml_Options_Enum_Service_Provider::IDENTITY_NAME);
        $mp = str_replace("\x23\43\x49\104\x50\43\x23", $ws, $mp);
        $Rd = false;
        if (!get_option("\x6d\x6f\x5f\163\x61\x6d\154\x5f\x75\163\145\137\x62\x75\164\x74\x6f\x6e\137\141\163\x5f\x73\x68\x6f\162\x74\143\x6f\144\145")) {
            goto xP;
        }
        if (!(get_option("\x6d\157\x5f\163\x61\x6d\154\137\165\163\x65\x5f\142\x75\164\x74\157\x6e\137\141\163\137\163\x68\157\x72\x74\143\x6f\144\x65") == "\x74\162\165\x65")) {
            goto iy;
        }
        $Rd = true;
        iy:
        xP:
        if (!$Rd) {
            goto IG;
        }
        $Xs = get_option("\155\x6f\137\163\x61\x6d\x6c\x5f\x62\165\x74\x74\x6f\x6e\137\167\x69\144\164\x68") ? get_option("\x6d\157\137\x73\x61\x6d\x6c\x5f\142\x75\x74\x74\157\x6e\137\x77\151\144\164\x68") : "\61\x30\60";
        $vB = get_option("\155\x6f\x5f\163\x61\155\x6c\137\142\165\x74\x74\157\x6e\x5f\x68\x65\151\147\150\x74") ? get_option("\155\157\x5f\163\x61\155\154\x5f\142\165\x74\x74\x6f\x6e\x5f\150\x65\151\x67\150\x74") : "\x35\60";
        $kx = get_option("\x6d\x6f\137\x73\141\x6d\154\x5f\142\165\164\164\157\156\137\163\x69\x7a\x65") ? get_option("\x6d\x6f\x5f\x73\141\155\x6c\137\x62\165\164\164\157\156\x5f\163\151\x7a\145") : "\65\x30";
        $Gg = get_option("\x6d\157\137\x73\141\155\x6c\x5f\142\165\164\164\x6f\x6e\x5f\143\165\x72\166\x65") ? get_option("\x6d\157\x5f\x73\141\x6d\x6c\137\x62\165\x74\x74\157\x6e\x5f\143\165\x72\166\x65") : "\x35";
        $Ug = get_option("\x6d\x6f\137\x73\141\x6d\x6c\x5f\x62\x75\164\164\x6f\156\x5f\143\157\154\x6f\x72") ? get_option("\155\157\137\163\x61\155\154\x5f\142\x75\164\164\x6f\x6e\x5f\143\157\x6c\157\x72") : "\x30\60\x38\x35\142\x61";
        $D0 = get_option("\x6d\157\137\163\x61\155\154\137\142\x75\164\164\x6f\x6e\x5f\x74\x68\145\155\x65") ? get_option("\x6d\x6f\x5f\163\x61\x6d\154\137\x62\165\164\164\x6f\156\x5f\x74\x68\x65\155\x65") : "\154\x6f\156\x67\142\165\x74\x74\x6f\156";
        $Gz = LicenseHelper::getCurrentOption(Mo_Saml_Options_Enum_Service_Provider::IDENTITY_NAME);
        $QL = get_option("\x6d\157\x5f\x73\x61\x6d\x6c\137\142\165\x74\x74\157\x6e\137\x74\145\170\x74") ? get_option("\x6d\157\137\163\141\x6d\x6c\137\x62\x75\x74\164\157\x6e\137\164\145\170\164") : ($Gz ? $Gz : "\114\157\147\151\156");
        $vM = get_option("\155\157\137\x73\x61\155\x6c\x5f\146\x6f\156\x74\137\143\157\154\x6f\x72") ? get_option("\155\157\137\x73\141\155\x6c\x5f\x66\x6f\156\x74\137\x63\x6f\154\157\162") : "\x66\x66\146\x66\146\x66";
        $kl = get_option("\155\x6f\137\163\x61\155\154\137\146\157\156\164\137\x73\x69\172\145") ? get_option("\155\x6f\x5f\163\141\155\154\x5f\x66\157\156\x74\137\x73\x69\x7a\x65") : "\x32\x30";
        $mp = "\74\151\x6e\160\165\x74\x20\x74\x79\x70\x65\x3d\42\x62\x75\x74\x74\157\x6e\42\x20\156\141\155\x65\75\42\155\157\x5f\163\x61\155\x6c\137\167\x70\x5f\163\163\x6f\137\142\x75\x74\x74\x6f\156\x22\40\x76\141\x6c\165\x65\75\x22" . $QL . "\42\40\x73\164\171\x6c\145\x3d\x22";
        $EB = '';
        if ($D0 == "\x6c\157\156\x67\142\165\x74\164\157\156") {
            goto Lh;
        }
        if ($D0 == "\143\151\162\x63\x6c\145") {
            goto ku;
        }
        if ($D0 == "\x6f\166\x61\x6c") {
            goto Ba;
        }
        if ($D0 == "\163\161\x75\141\162\x65") {
            goto xr;
        }
        goto z8;
        ku:
        $EB = $EB . "\167\151\144\x74\150\72" . $kx . "\160\x78\73";
        $EB = $EB . "\x68\145\151\147\150\x74\x3a" . $kx . "\160\x78\73";
        $EB = $EB . "\x62\157\162\144\145\x72\55\x72\141\x64\x69\x75\x73\x3a\71\71\71\x70\170\x3b";
        goto z8;
        Ba:
        $EB = $EB . "\167\151\x64\x74\150\x3a" . $kx . "\x70\x78\x3b";
        $EB = $EB . "\150\x65\x69\x67\150\x74\72" . $kx . "\160\170\x3b";
        $EB = $EB . "\142\x6f\162\x64\145\162\55\x72\141\x64\x69\165\x73\72\x35\x70\170\x3b";
        goto z8;
        xr:
        $EB = $EB . "\167\x69\x64\164\150\x3a" . $kx . "\160\x78\73";
        $EB = $EB . "\150\x65\151\x67\x68\164\72" . $kx . "\x70\x78\x3b";
        $EB = $EB . "\x62\157\162\144\145\x72\55\162\141\144\151\x75\163\x3a\x30\x70\170\x3b";
        z8:
        goto Pi;
        Lh:
        $EB = $EB . "\x77\151\144\x74\x68\x3a" . $Xs . "\160\x78\x3b";
        $EB = $EB . "\150\145\151\x67\x68\164\72" . $vB . "\160\170\x3b";
        $EB = $EB . "\x62\157\162\x64\145\x72\55\x72\x61\x64\151\x75\x73\72" . $Gg . "\160\170\x3b";
        Pi:
        $EB = $EB . "\x62\141\x63\x6b\147\x72\157\165\156\x64\55\143\x6f\x6c\x6f\x72\x3a\43" . $Ug . "\x3b";
        $EB = $EB . "\x62\157\x72\x64\x65\162\55\x63\157\x6c\x6f\x72\72\164\x72\x61\x6e\163\x70\141\162\145\156\164\x3b";
        $EB = $EB . "\x63\x6f\x6c\x6f\162\x3a\43" . $vM . "\x3b";
        $EB = $EB . "\x66\x6f\x6e\164\x2d\163\x69\172\145\72" . $kl . "\x70\170\73";
        $EB = $EB . "\x70\141\x64\144\151\156\x67\x3a\x30\x70\x78\73";
        $mp = $mp . $EB . "\x22\57\x3e";
        IG:
        $d9 = urlencode(saml_get_current_page_url());
        $qj = "\74\x61\x20\163\164\x79\154\x65\x3d\x22\x64\x69\x73\160\154\x61\171\x3a\x62\x6c\x6f\x63\x6b\x22\40\150\x72\145\146\75\x22" . $j1 . "\x2f\77\x6f\160\164\x69\157\156\x3d\163\x61\155\x6c\137\x75\x73\145\162\x5f\154\x6f\x67\151\156";
        if (empty($Am)) {
            goto q3;
        }
        $qj .= "\46\151\x64\x70\x3d" . $nU;
        q3:
        $qj .= "\x26\x72\145\x64\x69\x72\145\x63\x74\137\164\157\x3d" . $d9 . "\42";
        if (!$Rd) {
            goto l_;
        }
        $qj = $qj . "\163\x74\x79\x6c\145\75\42\x74\x65\x78\x74\x2d\x64\145\x63\x6f\x72\141\164\151\x6f\156\x3a\156\x6f\156\145\x3b\42";
        l_:
        $qj = $qj . "\x3e" . $mp . "\x3c\x2f\141\x3e";
        pb:
        Ml:
        return $qj;
    }
    function _handle_upload_metadata()
    {
        if (!(!empty($_FILES["\155\x65\x74\141\x64\141\x74\141\x5f\x66\151\x6c\145"]) || !empty($_POST["\x6d\x65\164\x61\x64\x61\x74\x61\137\165\x72\x6c"]))) {
            goto cy;
        }
        if (!empty($_FILES["\x6d\145\164\x61\x64\x61\x74\x61\x5f\x66\151\154\145"]["\x74\155\x70\137\156\x61\155\x65"])) {
            goto gR;
        }
        if (mo_saml_is_extension_installed("\143\x75\x72\x6c")) {
            goto hY;
        }
        update_option("\x6d\x6f\137\x73\141\x6d\154\137\155\x65\163\x73\141\147\145", "\x50\110\x50\40\x63\125\122\x4c\40\x65\x78\164\x65\156\x73\151\x6f\156\x20\x69\x73\x20\156\157\164\40\151\156\x73\164\141\154\x6c\145\x64\40\157\x72\x20\144\x69\x73\141\142\154\145\x64\56\40\103\x61\x6e\156\157\164\40\146\145\164\x63\x68\40\155\x65\164\x61\144\141\x74\141\x20\146\x72\157\x6d\x20\x55\x52\x4c\56");
        SAMLSPUtilities::mo_saml_show_error_message();
        return;
        hY:
        $gA = filter_var(htmlspecialchars($_POST["\x6d\x65\x74\x61\x64\141\164\141\x5f\165\162\x6c"]), FILTER_SANITIZE_URL);
        $eq = SAMLSPUtilities::mo_saml_wp_remote_call($gA, array("\x73\163\154\166\x65\162\x69\x66\171" => false), true);
        if (!$eq) {
            goto pv;
        }
        $b6 = $eq;
        goto dm;
        pv:
        return;
        dm:
        if (!empty($_POST["\x73\x79\x6e\x63\x5f\155\145\164\141\144\x61\164\141"]) && !empty($_POST["\163\x79\156\x63\x5f\x69\156\164\x65\162\x76\141\x6c"])) {
            goto fs;
        }
        $this->mo_saml_disable_metadata_sync();
        goto ez;
        fs:
        SAMLSPUtilities::update_metadata_cron($_POST["\163\x79\x6e\143\x5f\x69\x6e\x74\x65\x72\x76\x61\154"], $_POST["\x6d\145\164\x61\x64\x61\164\x61\137\x75\162\154"]);
        ez:
        goto gL;
        gR:
        $b6 = @file_get_contents($_FILES["\155\145\x74\x61\x64\141\164\141\137\146\151\x6c\145"]["\164\x6d\160\x5f\x6e\141\155\145"]);
        $this->mo_saml_disable_metadata_sync();
        gL:
        $this->upload_metadata($b6);
        cy:
    }
    function mo_saml_disable_metadata_sync()
    {
        delete_option(Mo_Options_Enum_Metadata_Sync::METADATA_SYNC_URL);
        delete_option(Mo_Options_Enum_Metadata_Sync::METADATA_SYNC_INTERVAL);
        wp_unschedule_event(wp_next_scheduled(Mo_Options_Enum_Metadata_Sync::METADATA_SYNC_CRON_ACTION), Mo_Options_Enum_Metadata_Sync::METADATA_SYNC_CRON_ACTION);
    }
    function upload_metadata($b6)
    {
        $tR = SAMLSPUtilities::mo_saml_safe_load_xml($b6);
        if (!(is_string($tR) && strpos($tR, "\127\x50\x53\101\x4d\x4c\x45\122\122") !== false)) {
            goto Xs;
        }
        update_option("\155\157\137\x73\x61\x6d\154\137\x6d\x65\163\x73\x61\147\145", "\x50\154\145\141\x73\x65\x20\x70\x72\x6f\x76\151\x64\145\40\x61\x20\166\x61\154\151\144\40\155\145\x74\141\144\x61\164\x61\x20\146\151\x6c\x65\x20\x6f\162\x20\x61\40\166\x61\x6c\151\144\x20\x55\122\x4c\x2e");
        SAMLSPUtilities::mo_saml_show_error_message();
        return;
        Xs:
        $QB = $tR->firstChild;
        if (!empty($QB)) {
            goto hc;
        }
        if (!empty($_FILES["\155\x65\x74\x61\144\141\x74\x61\137\146\x69\154\x65"]["\x74\155\160\137\x6e\x61\155\x65"])) {
            goto fk;
        }
        if (!empty($_POST["\155\x65\164\141\x64\141\164\141\137\x75\162\154"])) {
            goto aQ;
        }
        update_option("\x6d\157\x5f\x73\141\x6d\x6c\x5f\x6d\x65\x73\x73\141\x67\x65", "\120\x6c\145\x61\163\x65\x20\160\162\x6f\166\x69\144\145\x20\141\x20\x76\141\x6c\151\144\x20\155\x65\x74\x61\144\141\164\141\40\146\x69\x6c\x65\40\157\162\x20\141\x20\166\141\x6c\151\x64\x20\x55\122\114\x2e");
        SAMLSPUtilities::mo_saml_show_error_message();
        return;
        goto G0;
        aQ:
        update_option("\x6d\x6f\x5f\x73\141\155\x6c\x5f\155\x65\x73\163\141\x67\x65", "\120\154\x65\141\x73\145\x20\x70\162\x6f\x76\151\144\145\x20\x61\x20\166\x61\x6c\x69\x64\40\x6d\145\164\141\144\141\x74\x61\40\x55\x52\114\56");
        SAMLSPUtilities::mo_saml_show_error_message();
        G0:
        goto uW;
        fk:
        update_option("\x6d\x6f\137\163\x61\x6d\x6c\x5f\155\x65\163\x73\x61\147\145", "\x50\x6c\145\x61\163\x65\40\x70\162\x6f\x76\151\x64\145\x20\x61\x20\x76\x61\x6c\151\144\x20\x6d\145\x74\x61\144\141\164\141\40\146\151\x6c\x65\x2e");
        SAMLSPUtilities::mo_saml_show_error_message();
        uW:
        goto Pb;
        hc:
        $rc = new IDPMetadataReader($tR);
        $la = $rc->getIdentityProviders();
        if (!empty($la)) {
            goto Iy;
        }
        update_option("\155\157\x5f\x73\141\155\154\x5f\x6d\145\163\x73\141\147\x65", "\x50\154\x65\141\x73\x65\x20\160\162\157\166\x69\144\145\40\x61\40\x76\x61\x6c\x69\x64\40\155\x65\x74\x61\x64\x61\164\x61\40\x66\151\154\145\56");
        SAMLSPUtilities::mo_saml_show_error_message();
        return;
        Iy:
        foreach ($la as $mr => $nU) {
            $aY = LicenseHelper::getCurrentOption(Mo_Saml_Options_Enum_Service_Provider::IDENTITY_NAME);
            if (empty($_POST["\x73\141\x6d\154\x5f\151\144\145\156\164\x69\164\x79\x5f\155\145\164\141\x64\141\164\141\137\x70\162\x6f\x76\x69\x64\x65\x72"])) {
                goto jM;
            }
            $aY = htmlspecialchars($_POST["\163\x61\x6d\x6c\x5f\x69\144\x65\156\164\151\164\171\137\x6d\x65\x74\141\x64\x61\x74\x61\x5f\160\x72\157\166\x69\144\145\162"]);
            jM:
            $fg = "\110\x74\x74\x70\122\x65\144\x69\x72\145\143\x74";
            $bV = '';
            $vK = $nU->getLoginDetails();
            if (!empty($vK["\110\124\124\x50\55\122\x65\144\151\162\x65\143\x74"])) {
                goto rU;
            }
            if (empty($vK["\110\124\124\x50\55\x50\x4f\123\124"])) {
                goto DW;
            }
            $fg = "\x48\164\164\160\120\157\x73\x74";
            $bV = $nU->getLoginURL("\x48\124\x54\x50\55\x50\x4f\123\x54");
            DW:
            goto TU;
            rU:
            $bV = $nU->getLoginURL("\x48\x54\124\120\x2d\x52\x65\144\x69\162\145\x63\x74");
            TU:
            $os = "\x48\x74\x74\160\122\x65\x64\151\x72\x65\x63\x74";
            $QH = '';
            $Tj = $nU->getLogoutDetails();
            if (!empty($Tj["\x48\124\x54\120\x2d\122\x65\144\x69\162\145\x63\x74"])) {
                goto zY;
            }
            if (empty($Tj["\x48\x54\124\120\x2d\120\x4f\123\x54"])) {
                goto jN;
            }
            $os = "\x48\x74\164\160\120\157\x73\164";
            $QH = $nU->getLogoutURL("\110\124\124\x50\x2d\x50\x4f\123\124");
            jN:
            goto jc;
            zY:
            $QH = $nU->getLogoutURL("\110\124\x54\x50\55\x52\145\x64\x69\162\x65\x63\x74");
            jc:
            $W1 = $nU->getEntityID();
            $CD = $nU->getSigningCertificate();
            if (!get_option("\x6d\x6f\x5f\145\156\141\x62\x6c\145\x5f\155\x75\x6c\164\x69\x70\x6c\x65\x5f\x6c\151\143\145\156\163\x65\163")) {
                goto C8;
            }
            $Wf = get_option("\x6d\157\137\x73\x61\x6d\154\x5f\x65\156\x76\151\162\x6f\156\155\145\156\x74\x5f\157\x62\152\x65\143\x74\163");
            $gW = LicenseHelper::getSelectedEnvironment();
            if (!isset($Wf[$gW])) {
                goto IV;
            }
            $n4 = $Wf[$gW]->getPluginSettings();
            $n4[Mo_Saml_Options_Enum_Service_Provider::IDENTITY_NAME] = $aY;
            $n4[Mo_Saml_Options_Enum_Service_Provider::LOGIN_URL] = $bV;
            $n4[Mo_Saml_Options_Enum_Service_Provider::ISSUER] = $W1;
            $n4[Mo_Saml_Options_Enum_Service_Provider::X509_CERTIFICATE] = maybe_serialize($CD);
            $n4[Mo_Saml_Options_Enum_Service_Provider::LOGOUT_URL] = $QH;
            $n4[Mo_Saml_Options_Enum_Service_Provider::LOGIN_BINDING_TYPE] = $fg;
            $n4[Mo_Saml_Options_Enum_Service_Provider::LOGOUT_BINDING_TYPE] = $os;
            $Wf[$gW]->setPluginSettings($n4);
            update_option("\155\x6f\x5f\x73\x61\155\154\137\x65\x6e\166\151\162\x6f\156\x6d\145\x6e\164\x5f\x6f\x62\152\x65\x63\x74\163", $Wf);
            $S0 = LicenseHelper::getSelectedEnvironment();
            if (!($S0 and $S0 != LicenseHelper::getCurrentEnvironment())) {
                goto ey;
            }
            goto ew;
            ey:
            IV:
            C8:
            update_option("\x73\141\x6d\154\x5f\x69\144\x65\x6e\164\151\164\171\x5f\x6e\x61\155\145", $aY);
            update_option("\163\x61\155\154\137\x6c\x6f\x67\151\x6e\137\142\x69\156\144\151\156\x67\x5f\164\x79\x70\x65", $fg);
            update_option("\x73\x61\155\x6c\137\154\x6f\x67\x69\x6e\137\165\x72\154", $bV);
            update_option("\163\x61\x6d\154\x5f\154\x6f\147\x6f\165\x74\x5f\142\151\156\x64\x69\156\x67\137\164\171\x70\x65", $os);
            update_option("\x73\141\x6d\x6c\x5f\154\x6f\x67\157\165\164\x5f\x75\162\x6c", $QH);
            update_option("\x73\141\x6d\154\137\151\163\x73\x75\145\x72", $W1);
            update_option("\x73\141\x6d\x6c\137\x78\x35\x30\71\137\143\x65\162\164\151\x66\x69\x63\141\x74\x65", maybe_serialize($CD));
            goto ew;
            oJ:
        }
        ew:
        update_option("\x6d\x6f\137\x73\x61\155\154\x5f\155\x65\x73\x73\x61\147\145", "\x49\x64\x65\156\164\151\x74\x79\40\x50\162\157\x76\151\x64\145\x72\x20\144\145\164\141\x69\x6c\x73\40\x73\x61\166\x65\x64\40\x73\x75\143\143\145\163\x73\x66\x75\x6c\x6c\x79\x2e");
        SAMLSPUtilities::mo_saml_show_success_message();
        Pb:
    }
    function mo_saml_plugin_action_links($wx)
    {
        $wx = array_merge(array("\x3c\141\x20\150\x72\145\x66\75\x22" . esc_url(admin_url("\x61\144\155\x69\156\56\x70\150\160\77\160\141\147\x65\75\x6d\157\x5f\163\141\155\x6c\137\163\145\x74\164\151\156\147\163")) . "\x22\76" . __("\123\145\x74\x74\151\156\147\163", "\x74\x65\x78\x74\144\157\155\141\151\x6e") . "\x3c\x2f\x61\x3e"), $wx);
        return $wx;
    }
    function checkPasswordPattern($vO)
    {
        $Eh = "\57\136\x5b\50\x5c\x77\x29\x2a\50\134\x21\x5c\x40\134\43\134\44\x5c\45\x5c\136\134\x26\134\x2a\134\56\134\55\134\137\x29\x2a\x5d\53\44\57";
        return !preg_match($Eh, $vO);
    }
    function mo_saml_parse_expiry_date($p8)
    {
        $jR = new DateTime($p8);
        $Ex = $jR->getTimestamp();
        return date("\x46\x20\x6a\x2c\x20\131", $Ex);
    }
}
new saml_mo_login();

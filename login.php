<?php
/*
Plugin Name: miniOrange SSO using SAML 2.0
Plugin URI: http://miniorange.com/
Description: (Premium Single-Site)miniOrange SAML 2.0 SSO enables user to perform Single Sign On with any SAML 2.0 enabled Identity Provider.
Version: 12.0.8
Author: miniOrange
Author URI: http://miniorange.com/
*/


include_once dirname(__FILE__) . "\x2f\155\157\x5f\x6c\x6f\147\x69\x6e\x5f\163\x61\x6d\154\x5f\163\163\157\137\x77\151\144\147\x65\x74\56\x70\150\x70";
include_once "\170\x6d\154\163\145\x63\x6c\151\x62\163\56\160\150\x70";
use RobRichards\XMLSecLibs\XMLSecurityKey;
use RobRichards\XMLSecLibs\XMLSecurityDSig;
use RobRichards\XMLSecLibs\XMLSecEnc;
require "\155\157\x2d\163\x61\x6d\154\x2d\x63\154\141\x73\x73\x2d\143\x75\x73\x74\157\155\145\162\56\160\x68\160";
require "\x6d\157\x5f\x73\x61\x6d\x6c\137\x73\x65\x74\x74\151\x6e\x67\x73\x5f\160\x61\x67\145\x2e\x70\150\160";
require "\115\x65\x74\x61\144\141\x74\141\122\145\x61\144\x65\x72\x2e\160\150\x70";
require "\x63\x65\162\x74\151\146\151\x63\141\x74\x65\137\x75\x74\x69\x6c\x69\164\x79\56\160\150\160";
require "\x6c\151\143\145\x6e\x73\x65\165\164\x69\154\163\x2e\x70\x68\160";
require "\114\x69\143\x65\156\x73\x65\x55\164\x69\154\x73\57\114\x69\143\145\x6e\x73\145\104\141\157\56\x70\x68\x70";
require_once "\x6d\x6f\x2d\x73\x61\155\x6c\55\x70\154\165\x67\151\x6e\55\166\x65\162\163\151\157\156\55\x75\160\x64\x61\164\145\x2e\160\150\x70";
class saml_mo_login
{
    private $widgetObj;
    function __construct()
    {
        add_action("\141\x64\x6d\x69\x6e\137\x6d\145\x6e\x75", array($this, "\155\x69\156\151\157\162\141\x6e\x67\x65\x5f\163\x73\157\137\x6d\x65\x6e\165"));
        add_action("\x61\x64\x6d\151\x6e\x5f\151\x6e\151\x74", array($this, "\x6d\151\x6e\151\x6f\162\x61\x6e\147\145\x5f\154\x6f\147\x69\x6e\x5f\167\x69\x64\147\x65\x74\137\163\141\155\x6c\137\x73\141\x76\145\137\x73\145\164\164\151\156\147\163"));
        add_action("\x61\144\x6d\151\x6e\137\145\156\161\x75\145\x75\x65\137\x73\143\162\x69\x70\164\163", array($this, "\x70\x6c\165\147\x69\156\137\163\x65\164\164\x69\156\x67\163\137\x73\x74\171\154\145"), 1);
        register_deactivation_hook(__FILE__, array($this, "\x6d\157\137\x73\163\157\x5f\163\141\155\154\x5f\144\x65\x61\x63\x74\151\x76\x61\164\x65"));
        add_action("\141\x64\x6d\x69\x6e\137\x65\156\x71\165\x65\x75\x65\137\x73\x63\162\151\160\164\x73", array($this, "\x70\x6c\x75\x67\x69\x6e\x5f\163\145\164\164\x69\156\147\x73\137\163\143\162\151\x70\164"), 1);
        remove_action("\141\x64\155\151\156\137\156\x6f\164\151\143\145\x73", array($this, "\155\x6f\137\x73\x61\x6d\x6c\137\x73\x75\143\x63\x65\163\163\x5f\155\x65\163\163\141\x67\145"));
        remove_action("\x61\144\155\x69\156\137\x6e\157\164\x69\143\x65\x73", array($this, "\155\x6f\x5f\163\141\x6d\x6c\x5f\x65\x72\x72\x6f\162\137\155\145\163\163\141\147\145"));
        add_action("\x77\160\x5f\141\165\x74\150\x65\156\164\x69\143\141\x74\x65", array($this, "\x6d\157\x5f\x73\x61\x6d\154\137\x61\x75\164\150\x65\x6e\x74\x69\143\x61\x74\x65"));
        add_action("\167\x70", array($this, "\155\x6f\x5f\163\141\155\x6c\x5f\x61\165\164\157\137\x72\145\144\151\162\x65\143\x74"));
        $this->widgetObj = new mo_login_wid();
        add_action("\151\x6e\151\164", array($this->widgetObj, "\155\x6f\137\x73\141\155\154\137\167\x69\144\x67\145\164\137\151\x6e\x69\x74"));
        add_action("\141\x64\x6d\151\x6e\x5f\x69\156\151\x74", "\x6d\x6f\x5f\x73\x61\x6d\154\x5f\144\157\167\x6e\x6c\x6f\x61\144");
        add_action("\x6c\157\x67\x69\156\137\145\x6e\x71\165\145\x75\x65\137\163\143\162\151\160\x74\163", array($this, "\155\x6f\137\163\x61\155\154\x5f\x6c\157\x67\151\156\x5f\145\156\x71\165\x65\165\145\137\x73\x63\162\x69\160\x74\x73"));
        add_action("\x6c\x6f\147\x69\x6e\x5f\146\x6f\162\155", array($this, "\x6d\157\x5f\163\x61\x6d\x6c\137\x6d\x6f\x64\151\146\171\x5f\154\157\x67\x69\156\x5f\x66\x6f\162\155"));
        add_shortcode("\x4d\x4f\137\x53\101\115\x4c\137\106\117\x52\x4d", array($this, "\155\157\x5f\147\x65\x74\x5f\x73\x61\155\x6c\x5f\163\150\157\162\164\x63\x6f\144\145"));
        add_filter("\143\162\157\x6e\137\163\x63\150\x65\x64\x75\154\145\163", array($this, "\155\x79\160\x72\x65\146\x69\170\137\141\144\x64\137\x63\x72\x6f\156\137\x73\x63\x68\x65\144\165\x6c\145"));
        add_action("\x6d\x65\x74\141\x64\x61\164\x61\x5f\163\x79\x6e\x63\x5f\143\x72\157\156\x5f\x61\x63\x74\x69\157\x6e", array($this, "\x6d\145\x74\x61\144\x61\164\x61\137\x73\171\x6e\143\x5f\x63\x72\x6f\x6e\137\141\x63\164\x69\157\156"));
        register_activation_hook(__FILE__, array($this, "\155\x6f\137\163\x61\155\154\137\x63\x68\x65\x63\x6b\x5f\x6f\160\145\156\x73\x73\154"));
        add_action("\x70\154\165\x67\x69\156\x5f\x61\143\x74\151\157\156\137\x6c\151\156\x6b\x73\x5f" . plugin_basename(__FILE__), array($this, "\x6d\x6f\137\163\x61\155\154\137\160\x6c\165\147\151\156\x5f\141\143\164\x69\x6f\x6e\x5f\154\151\156\x6b\163"));
        add_action("\141\x64\x6d\x69\x6e\137\151\x6e\151\x74", array($this, "\x64\145\x66\141\165\154\x74\x5f\143\145\x72\x74\151\146\x69\x63\141\x74\x65"));
        add_option("\154\143\144\152\x6b\x61\x73\x6a\x64\153\x73\x61\143\x6c", "\144\145\x66\x61\x75\x6c\x74\55\143\x65\162\164\151\x66\x69\x63\x61\x74\x65");
        add_filter("\155\x61\x6e\x61\x67\145\x5f\165\x73\x65\x72\x73\x5f\x63\x6f\x6c\x75\x6d\x6e\163", array($this, "\x6d\157\x5f\163\141\155\x6c\137\x63\x75\x73\x74\x6f\x6d\x5f\141\x74\x74\162\x5f\x63\x6f\154\x75\155\156"));
        add_filter("\x6d\141\156\x61\147\145\137\x75\163\145\x72\x73\137\143\165\x73\164\x6f\155\137\143\x6f\x6c\165\155\x6e", array($this, "\155\157\x5f\x73\x61\x6d\154\x5f\x61\x74\x74\x72\x5f\x63\x6f\154\x75\155\156\x5f\143\157\156\164\x65\x6e\164"), 10, 3);
        global $rV;
        if ((float) $rV < 5.5 && (float) $rV > 5.2) {
            goto fM;
        }
        add_action("\167\160\x5f\154\157\x67\x6f\165\164", array($this->widgetObj, "\155\157\137\x73\x61\155\x6c\x5f\x6c\x6f\x67\157\165\164"), 1, 1);
        goto cJ;
        fM:
        add_filter("\x6c\157\x67\157\165\x74\137\x72\145\x64\151\162\145\143\x74", array($this, "\155\x6f\x5f\163\x61\155\x6c\137\x6c\x6f\x67\x6f\x75\164\x5f\142\x72\157\x6b\145\x72\137\167\151\x74\150\x5f\146\151\x6c\x74\145\x72"), 10, 3);
        cJ:
    }
    function mo_saml_logout_broker_with_filter($jS, $Gf, $user)
    {
        $this->widgetObj->mo_saml_logout($user->ID);
    }
    function default_certificate()
    {
        $V1 = file_get_contents(plugin_dir_path(__FILE__) . "\x72\x65\x73\157\165\162\x63\145\x73" . DIRECTORY_SEPARATOR . "\155\x69\x6e\x69\157\162\141\x6e\147\145\137\x73\160\x5f\62\x30\62\x30\x2e\143\162\164");
        $uQ = file_get_contents(plugin_dir_path(__FILE__) . "\162\145\163\x6f\x75\x72\143\x65\163" . DIRECTORY_SEPARATOR . "\x6d\151\x6e\151\x6f\162\141\156\x67\145\137\x73\160\x5f\x32\60\x32\60\x5f\x70\x72\x69\166\56\x6b\145\x79");
        if (!(!get_option("\155\x6f\x5f\163\141\155\x6c\x5f\x63\165\x72\162\x65\156\164\137\x63\x65\162\164") && !get_option("\155\x6f\137\163\x61\155\x6c\x5f\x63\165\x72\x72\145\156\164\x5f\x63\145\162\x74\137\x70\x72\x69\x76\141\x74\145\x5f\153\145\x79"))) {
            goto jP;
        }
        update_option("\155\x6f\137\163\x61\x6d\154\x5f\x63\x75\162\x72\x65\x6e\x74\137\143\x65\162\164", $V1);
        update_option("\155\157\137\x73\x61\155\154\x5f\x63\x75\162\x72\x65\156\164\x5f\x63\x65\x72\x74\137\160\162\x69\x76\141\164\145\137\153\x65\171", $uQ);
        jP:
    }
    function mo_saml_check_openssl()
    {
        if (mo_saml_is_extension_installed("\x6f\x70\x65\156\163\163\x6c")) {
            goto mJ;
        }
        wp_die("\120\x48\x50\x20\x6f\x70\x65\x6e\x73\x73\x6c\40\145\170\x74\145\156\x73\151\x6f\156\x20\151\163\40\156\x6f\x74\40\x69\x6e\x73\164\x61\x6c\x6c\145\x64\40\157\162\x20\144\x69\x73\x61\x62\154\145\144\54\160\x6c\145\x61\x73\x65\x20\x65\156\141\x62\154\145\x20\151\x74\40\x74\x6f\x20\x61\143\x74\151\166\x61\x74\x65\40\164\x68\145\x20\160\x6c\165\x67\151\x6e\x2e");
        mJ:
        add_option("\x41\143\164\x69\166\141\x74\x65\144\x5f\x50\154\x75\x67\x69\156", "\120\154\165\147\151\156\55\123\154\165\147");
    }
    function myprefix_add_cron_schedule($tf)
    {
        $tf["\167\145\x65\x6b\x6c\171"] = array("\x69\156\x74\145\x72\x76\141\x6c" => 604800, "\144\x69\163\x70\x6c\141\x79" => __("\117\x6e\143\145\x20\x57\145\145\x6b\154\171"));
        $tf["\x6d\157\156\164\x68\154\x79"] = array("\x69\156\164\x65\x72\166\141\x6c" => 2635200, "\x64\151\x73\x70\x6c\x61\171" => __("\117\156\x63\145\x20\x4d\157\156\164\x68\154\171"));
        return $tf;
    }
    function metadata_sync_cron_action()
    {
        error_log("\x6d\151\x6e\151\157\162\x61\156\147\145\40\x3a\x20\122\101\116\40\x53\131\x4e\x43\x20\x2d\40" . time());
        $Wy = LicenseHelper::getCurrentOption(mo_options_enum_service_provider::Identity_name);
        $this->upload_metadata(@file_get_contents(get_option("\x73\x61\155\154\x5f\155\x65\164\141\144\141\164\141\x5f\165\162\154\x5f\x66\157\x72\137\x73\x79\156\143")));
        update_option("\x73\141\x6d\154\x5f\151\144\145\x6e\x74\x69\x74\171\137\x6e\141\155\x65", $Wy);
    }
    function mo_login_widget_saml_options()
    {
        global $wpdb;
        update_option("\155\157\137\x73\141\x6d\154\x5f\x68\157\x73\x74\x5f\x6e\x61\155\145", "\150\164\164\x70\163\72\x2f\x2f\154\x6f\147\x69\156\56\170\x65\143\165\x72\x69\x66\x79\56\x63\x6f\155");
        $gt = get_option("\x6d\157\137\x73\141\x6d\x6c\137\150\x6f\163\164\x5f\156\141\155\x65");
        mo_register_saml_sso();
    }
    function mo_saml_success_message()
    {
        $Pp = "\x65\x72\162\157\162";
        $ci = get_option("\x6d\x6f\x5f\163\x61\x6d\x6c\137\x6d\145\x73\163\141\147\x65");
        echo "\x3c\x64\x69\166\x20\x63\x6c\x61\163\x73\x3d\47" . $Pp . "\x27\x3e\x20\74\x70\76" . $ci . "\74\x2f\x70\x3e\74\57\x64\x69\x76\x3e";
    }
    function mo_saml_error_message()
    {
        $Pp = "\x75\160\x64\141\x74\x65\x64";
        $ci = get_option("\x6d\x6f\137\163\x61\x6d\x6c\137\x6d\x65\x73\x73\x61\x67\145");
        echo "\74\144\x69\166\40\143\x6c\141\163\163\x3d\x27" . $Pp . "\x27\x3e\x20\x3c\160\x3e" . $ci . "\74\57\160\x3e\74\x2f\144\x69\x76\76";
    }
    public function mo_sso_saml_deactivate()
    {
        if (!is_multisite()) {
            goto Tn;
        }
        global $wpdb;
        $U3 = $wpdb->get_col("\123\x45\114\105\103\x54\x20\142\154\x6f\147\137\x69\144\x20\x46\x52\x4f\115\40{$wpdb->blogs}");
        $pL = get_current_blog_id();
        do_action("\x6d\157\x5f\163\x61\x6d\154\137\x66\x6c\x75\163\x68\x5f\x63\141\x63\150\145");
        foreach ($U3 as $blog_id) {
            switch_to_blog($blog_id);
            delete_option("\155\157\137\163\141\155\x6c\x5f\x68\157\163\x74\x5f\x6e\x61\155\x65");
            delete_option("\x6d\157\x5f\x73\x61\155\154\x5f\156\145\x77\137\162\145\x67\x69\x73\164\x72\x61\x74\151\x6f\156");
            delete_option("\x6d\157\137\163\x61\155\x6c\137\x61\x64\155\x69\156\x5f\160\x68\x6f\x6e\145");
            delete_option("\x6d\157\137\163\x61\x6d\x6c\137\x61\x64\155\151\156\x5f\x70\141\x73\163\x77\157\x72\144");
            delete_option("\155\157\x5f\x73\141\x6d\154\x5f\x76\x65\x72\151\x66\171\137\x63\x75\163\x74\157\155\x65\162");
            delete_option("\155\x6f\137\x73\x61\x6d\x6c\x5f\141\x64\x6d\151\156\137\x63\x75\x73\164\x6f\x6d\x65\x72\137\153\x65\x79");
            delete_option("\x6d\157\137\x73\141\155\x6c\x5f\141\x64\155\x69\x6e\137\x61\x70\151\x5f\x6b\145\x79");
            delete_option("\155\x6f\137\x73\141\155\x6c\137\143\165\163\x74\157\155\145\x72\137\x74\157\153\145\156");
            delete_option("\x6d\x6f\x5f\x73\141\155\154\x5f\x6d\x65\x73\163\x61\147\145");
            delete_option("\155\157\x5f\x73\x61\155\154\x5f\162\x65\147\151\x73\164\x72\x61\x74\x69\157\x6e\137\x73\164\x61\x74\x75\163");
            delete_option("\x6d\x6f\x5f\x73\x61\x6d\x6c\137\x69\x64\x70\137\143\157\156\x66\x69\147\137\143\x6f\x6d\x70\154\x65\x74\x65");
            delete_option("\x6d\x6f\x5f\x73\141\155\x6c\137\164\x72\x61\156\163\x61\143\x74\151\157\x6e\111\x64");
            delete_option("\166\x6c\137\x63\x68\145\143\153\x5f\164");
            delete_option("\166\x6c\x5f\143\x68\x65\x63\153\x5f\x73");
            delete_option("\x6d\157\x5f\x73\x61\x6d\154\x5f\x73\150\x6f\167\137\141\x64\x64\x6f\156\x73\x5f\x6e\x6f\164\151\143\x65");
            uK:
        }
        Ui:
        switch_to_blog($pL);
        goto n5;
        Tn:
        do_action("\155\x6f\x5f\163\x61\x6d\x6c\x5f\146\x6c\165\163\150\x5f\143\141\x63\x68\x65");
        delete_option("\155\157\137\163\x61\x6d\154\x5f\150\157\x73\164\137\x6e\141\x6d\x65");
        delete_option("\155\157\137\163\141\155\x6c\x5f\156\145\x77\137\162\x65\147\151\x73\x74\x72\141\x74\151\157\156");
        delete_option("\155\157\x5f\x73\141\x6d\x6c\137\x61\144\x6d\x69\x6e\x5f\x70\x68\x6f\x6e\x65");
        delete_option("\x6d\x6f\x5f\163\141\155\x6c\x5f\x61\x64\155\151\156\137\x70\141\x73\x73\x77\x6f\x72\x64");
        delete_option("\155\x6f\137\x73\x61\155\154\137\x76\x65\x72\x69\x66\171\x5f\x63\165\163\164\157\x6d\x65\x72");
        delete_option("\155\x6f\137\x73\141\x6d\154\137\141\144\155\x69\x6e\x5f\x63\x75\163\x74\157\155\145\162\137\153\145\x79");
        delete_option("\x6d\157\137\x73\141\x6d\x6c\x5f\x61\144\x6d\x69\156\137\141\x70\x69\137\153\x65\171");
        delete_option("\155\157\x5f\x73\141\x6d\x6c\137\x63\x75\163\x74\x6f\155\x65\x72\x5f\x74\x6f\x6b\145\x6e");
        delete_option("\155\157\x5f\x73\x61\155\154\137\x6d\x65\x73\163\x61\x67\145");
        delete_option("\x6d\x6f\137\163\141\155\154\137\162\145\x67\x69\x73\164\x72\141\164\x69\x6f\156\137\163\164\141\x74\x75\x73");
        delete_option("\x6d\157\x5f\x73\141\155\154\137\x69\144\x70\137\143\157\156\x66\x69\x67\x5f\143\x6f\x6d\x70\154\x65\x74\145");
        delete_option("\x6d\x6f\x5f\x73\x61\x6d\154\137\164\x72\x61\x6e\163\x61\143\x74\x69\x6f\x6e\111\144");
        delete_option("\x6d\157\x5f\x73\x61\x6d\x6c\x5f\145\x6e\x61\x62\x6c\145\x5f\143\154\x6f\165\x64\137\x62\162\x6f\153\145\162");
        delete_option("\166\154\137\143\150\145\x63\x6b\137\x74");
        delete_option("\166\x6c\x5f\x63\150\145\x63\153\x5f\163");
        delete_option("\x6d\x6f\137\x73\141\155\154\137\x73\150\157\167\x5f\x61\144\x64\x6f\156\163\x5f\156\x6f\x74\151\143\x65");
        n5:
    }
    function djkasjdksaduwaj($fi, $e7, $Wi = "\146\x61\x6c\163\145")
    {
        $nD = $e7->check_customer_ln();
        if ($nD) {
            goto uJ;
        }
        if (!($Wi == "\x74\162\165\145")) {
            goto Zk;
        }
        WP_CLI::error(mo_saml_cli_error::Poor_Internet);
        Zk:
        return;
        uJ:
        $nD = json_decode($nD, true);
        if (strcasecmp($nD["\x73\164\x61\164\165\163"], "\x53\125\x43\x43\105\x53\x53") == 0) {
            goto JQ;
        }
        $N5 = get_option("\155\x6f\137\163\141\155\154\x5f\x63\165\x73\164\x6f\x6d\145\x72\137\x74\x6f\153\145\156");
        update_option("\x73\x69\164\x65\137\x63\153\x5f\154", AESEncryption::encrypt_data("\x66\x61\x6c\x73\145", $N5));
        if (!($Wi == "\x74\x72\165\145")) {
            goto w7;
        }
        WP_CLI::error(mo_saml_cli_error::Not_Upgraded);
        w7:
        $hD = add_query_arg(array("\x74\141\x62" => "\x6c\151\143\x65\x6e\163\151\156\147"), $_SERVER["\122\105\121\125\105\123\124\137\x55\122\x49"]);
        update_option("\x6d\x6f\137\163\x61\x6d\154\x5f\x6d\145\x73\x73\141\x67\145", "\x59\x6f\x75\40\x68\x61\x76\145\x20\x6e\157\x74\x20\x75\x70\x67\x72\x61\x64\x65\x64\40\171\x65\164\x2e\40" . addLink("\103\x6c\x69\x63\x6b\40\x68\x65\x72\145", $hD) . "\40\164\x6f\40\x75\160\x67\x72\141\x64\x65\x20\x74\157\40\160\162\145\155\x69\165\155\40\x76\145\162\x73\151\157\156\56");
        $this->mo_saml_show_error_message();
        goto o1;
        JQ:
        $nD = json_decode($e7->mo_saml_vl($fi, false), true);
        update_option("\x76\154\x5f\x63\x68\x65\143\153\x5f\164", time());
        if (is_array($nD) and strcasecmp($nD["\163\164\x61\164\x75\x73"], "\123\x55\103\103\x45\123\123") == 0) {
            goto M7;
        }
        if (is_array($nD) and strcasecmp($nD["\x73\x74\141\x74\165\x73"], "\106\101\111\114\105\x44") == 0) {
            goto Jt;
        }
        if (!($Wi == "\x74\x72\165\145")) {
            goto su;
        }
        WP_CLI::error(mo_saml_cli_error::Poor_Internet);
        su:
        update_option("\155\157\x5f\x73\x61\155\154\x5f\155\145\163\x73\x61\147\x65", "\101\156\40\145\162\x72\157\162\40\x6f\143\143\165\162\145\144\x20\167\x68\x69\154\145\x20\x70\x72\x6f\143\145\x73\x73\x69\156\147\40\x79\x6f\x75\162\x20\162\x65\161\x75\145\163\164\56\x20\x50\154\x65\141\x73\145\x20\124\x72\x79\x20\x61\x67\141\x69\156\56");
        $this->mo_saml_show_error_message();
        goto XU;
        Jt:
        if (strcasecmp($nD["\155\145\x73\x73\141\x67\x65"], "\x43\157\x64\145\x20\150\x61\163\x20\105\170\160\x69\162\145\x64") == 0) {
            goto rx;
        }
        if (!($Wi == "\164\162\x75\145")) {
            goto zk;
        }
        WP_CLI::error(mo_saml_cli_error::Invalid_License);
        zk:
        update_option("\x6d\x6f\137\x73\x61\x6d\154\x5f\x6d\x65\163\x73\x61\147\145", "\x59\157\x75\40\150\141\x76\x65\40\x65\x6e\x74\x65\x72\145\x64\x20\141\x6e\x20\151\156\x76\x61\x6c\151\x64\40\x6c\x69\143\145\x6e\x73\x65\x20\x6b\145\171\x2e\40\120\154\145\x61\x73\x65\x20\145\156\x74\x65\x72\x20\x61\x20\x76\141\154\151\144\40\154\151\143\x65\156\x73\145\x20\x6b\145\171\x2e");
        goto Dr;
        rx:
        if (!($Wi == "\164\x72\x75\145")) {
            goto kS;
        }
        WP_CLI::error(mo_saml_cli_error::Code_Expired);
        kS:
        $hD = add_query_arg(array("\164\x61\x62" => "\x6c\x69\x63\x65\156\163\x69\156\x67"), $_SERVER["\122\x45\121\x55\x45\123\x54\137\125\x52\x49"]);
        update_option("\155\157\x5f\163\x61\155\154\137\155\145\163\x73\141\x67\145", "\x4c\151\x63\145\x6e\x73\145\40\x6b\145\x79\40\x79\157\165\x20\150\141\166\145\x20\145\156\164\x65\162\x65\x64\x20\x68\141\x73\x20\x61\x6c\162\145\141\144\x79\x20\142\145\145\x6e\40\x75\163\x65\144\56\x20\120\x6c\145\x61\x73\x65\40\145\x6e\164\145\x72\40\x61\x20\x6b\x65\x79\x20\x77\150\151\x63\150\x20\x68\141\x73\40\156\x6f\x74\x20\142\x65\145\x6e\x20\165\x73\x65\x64\40\142\x65\146\157\162\145\40\157\156\40\141\156\x79\x20\157\x74\x68\145\x72\40\151\x6e\163\164\x61\156\143\145\x20\157\162\40\151\146\40\171\157\x75\40\150\x61\x76\145\40\145\170\x61\x75\x73\164\145\x64\40\x61\x6c\154\40\x79\157\165\x72\x20\x6b\x65\171\163\40\x74\x68\x65\x6e\x20" . addLink("\103\154\151\143\153\x20\150\x65\x72\x65", $hD) . "\x20\x74\x6f\x20\x62\165\171\40\155\157\162\x65\56");
        Dr:
        $this->mo_saml_show_error_message();
        XU:
        goto NV;
        M7:
        $N5 = get_option("\x6d\x6f\x5f\163\141\155\x6c\x5f\143\165\163\164\x6f\155\145\x72\x5f\164\x6f\x6b\x65\x6e");
        update_option("\x73\155\154\x5f\154\x6b", AESEncryption::encrypt_data($fi, $N5));
        $ci = "\131\x6f\165\162\x20\x6c\151\x63\x65\156\x73\145\40\x69\163\x20\x76\x65\162\151\146\x69\145\144\56\40\131\x6f\x75\40\143\141\156\x20\x6e\x6f\167\x20\x73\x65\x74\165\160\40\164\x68\145\40\x70\154\x75\147\x69\x6e\x2e";
        update_option("\155\x6f\137\x73\x61\155\154\x5f\x6d\x65\x73\x73\141\x67\x65", $ci);
        $N5 = get_option("\x6d\x6f\x5f\x73\x61\x6d\154\x5f\x63\x75\163\x74\x6f\155\x65\x72\137\164\x6f\153\145\x6e");
        update_option("\163\x69\164\145\137\x63\x6b\x5f\154", AESEncryption::encrypt_data("\x74\162\x75\x65", $N5));
        update_option("\x74\137\x73\x69\x74\145\137\163\164\x61\164\165\163", AESEncryption::encrypt_data("\146\141\x6c\x73\145", $N5));
        $aT = plugin_dir_path(__FILE__);
        $mq = home_url();
        $mq = trim($mq, "\x2f");
        if (preg_match("\x23\136\150\x74\164\x70\x28\163\x29\77\72\57\x2f\43", $mq)) {
            goto Wp;
        }
        $mq = "\150\164\164\160\x3a\57\x2f" . $mq;
        Wp:
        $tJ = parse_url($mq);
        $ng = preg_replace("\57\136\x77\167\167\134\56\57", '', $tJ["\150\x6f\x73\164"]);
        $am = wp_upload_dir();
        $bX = $ng . "\55" . $am["\x62\141\163\145\144\x69\x72"];
        $wu = hash_hmac("\x73\150\x61\x32\x35\66", $bX, "\x34\104\x48\146\x6a\147\x66\x6a\141\x73\x6e\144\146\x73\141\x6a\x66\x48\x47\x4a");
        $vR = $this->djkasjdksa();
        $Oy = round(strlen($vR) / rand(2, 20));
        $vR = substr_replace($vR, $wu, $Oy, 0);
        $Pk = base64_decode($vR);
        if (is_writable($aT . "\x6c\x69\x63\x65\156\163\x65")) {
            goto a5;
        }
        $vR = str_rot13($vR);
        $wW = base64_decode("\142\107\116\153\141\155\164\x68\x63\62\x70\x6b\x61\63\x4e\x68\131\62\x77\75");
        update_option($wW, $vR);
        goto gC;
        a5:
        file_put_contents($aT . "\154\x69\143\x65\156\x73\145", $Pk);
        gC:
        update_option("\154\x63\x77\162\x74\154\x66\163\141\x6d\x6c", true);
        if (!($Wi == "\x74\x72\165\145")) {
            goto Lz;
        }
        WP_CLI::success("\114\151\143\x65\156\163\145\x20\x61\x70\160\x6c\x69\x65\144\x20\x73\x75\143\x63\x65\x73\163\x66\165\x6c\x6c\x79\x2e");
        Lz:
        $hD = add_query_arg(array("\x74\141\x62" => "\147\145\x6e\x65\162\x61\x6c"), $_SERVER["\x52\x45\x51\125\x45\123\124\137\125\x52\111"]);
        $this->mo_saml_show_success_message();
        NV:
        o1:
    }
    function mo_cli_save_details($Ef, $ry, $m3, $Z3, $ei)
    {
        if (mo_saml_is_extension_installed("\x63\165\x72\x6c")) {
            goto OG;
        }
        WP_CLI::error(mo_saml_cli_error::Curl_Error);
        OG:
        update_option("\x6d\157\137\163\x61\x6d\x6c\137\x72\x65\147\151\163\164\x72\x61\x74\151\x6f\156\x5f\163\x74\141\x74\x75\163", '');
        update_option("\155\157\137\x73\141\155\154\x5f\x76\x65\x72\151\146\171\x5f\x63\x75\x73\x74\x6f\155\x65\x72", '');
        delete_option("\155\157\137\x73\x61\155\x6c\x5f\156\145\x77\137\x72\145\x67\151\163\x74\x72\x61\x74\151\x6f\x6e");
        delete_option("\x6d\x6f\137\163\x61\x6d\x6c\137\141\144\155\151\156\137\x65\155\x61\x69\154");
        delete_option("\155\157\137\x73\141\155\x6c\x5f\141\144\x6d\151\x6e\137\160\x68\157\x6e\145");
        delete_option("\163\155\x6c\x5f\154\153");
        delete_option("\x74\x5f\163\x69\164\145\x5f\x73\x74\141\x74\x75\163");
        delete_option("\x73\x69\x74\145\x5f\143\x6b\137\154");
        $OM = sanitize_email($Z3);
        update_option("\155\x6f\137\x73\141\155\154\137\141\x64\x6d\151\x6e\137\145\x6d\141\151\154", $OM);
        $e7 = new CustomerSaml();
        $nD = $e7->check_customer();
        if ($nD) {
            goto yo;
        }
        WP_CLI::error(mo_saml_cli_error::Poor_Internet);
        yo:
        $nD = json_decode($nD, true);
        if (!(strcasecmp($nD["\x73\164\x61\x74\165\163"], "\103\x55\x53\x54\x4f\115\x45\x52\x5f\x4e\117\x54\x5f\x46\x4f\125\x4e\104") == 0)) {
            goto UX;
        }
        WP_CLI::error(mo_saml_cli_error::Customer_Not_Found);
        UX:
        update_option("\x6d\x6f\x5f\163\x61\x6d\154\137\x61\144\155\x69\x6e\137\x63\x75\x73\x74\157\155\145\x72\137\153\145\171", $Ef);
        update_option("\x6d\157\137\x73\141\x6d\154\x5f\141\x64\x6d\x69\156\137\141\x70\151\x5f\x6b\145\171", $ry);
        update_option("\x6d\157\x5f\163\141\155\154\137\x63\x75\x73\x74\157\x6d\x65\x72\x5f\164\x6f\153\x65\156", $m3);
        update_option("\155\157\137\x73\141\x6d\154\x5f\x72\x65\147\x69\x73\164\x72\141\x74\151\x6f\156\x5f\x73\164\141\x74\x75\163", "\105\x78\x69\x73\164\151\x6e\147\40\125\x73\145\162");
        delete_option("\155\x6f\x5f\163\x61\155\x6c\137\x76\x65\x72\x69\146\x79\137\143\x75\163\x74\x6f\155\145\x72");
        $fi = htmlspecialchars(trim($ei));
        $this->djkasjdksaduwaj($fi, $e7, "\x74\x72\x75\x65");
    }
    function mo_saml_show_success_message()
    {
        remove_action("\141\x64\155\151\x6e\137\156\157\164\x69\x63\145\163", array($this, "\155\157\137\163\x61\155\154\137\x73\165\143\x63\145\x73\x73\x5f\155\145\x73\163\x61\x67\145"));
        add_action("\141\144\155\151\x6e\137\156\157\164\151\x63\145\x73", array($this, "\x6d\157\x5f\163\141\x6d\154\137\x65\162\x72\157\162\137\x6d\145\x73\163\x61\x67\x65"));
    }
    function mo_saml_show_error_message()
    {
        remove_action("\x61\x64\155\x69\x6e\x5f\x6e\x6f\x74\x69\143\145\163", array($this, "\x6d\157\137\x73\141\x6d\154\x5f\145\x72\162\x6f\x72\x5f\155\x65\x73\x73\141\x67\145"));
        add_action("\141\144\x6d\151\156\137\x6e\x6f\164\x69\143\x65\163", array($this, "\155\x6f\137\x73\141\155\154\x5f\x73\x75\x63\x63\145\163\163\137\155\x65\163\163\x61\147\x65"));
    }
    function plugin_settings_style($HO)
    {
        if (!("\x74\x6f\160\154\x65\166\x65\154\x5f\160\141\x67\145\x5f\x6d\157\137\163\141\155\154\x5f\163\x65\164\164\151\x6e\x67\163" != $HO && "\155\x69\156\151\x6f\x72\x61\x6e\147\145\55\x73\141\155\154\55\x32\x2d\60\55\x73\x73\157\x5f\160\x61\x67\x65\x5f\155\157\x5f\155\x61\x6e\x61\147\145\x5f\154\151\x63\145\x6e\x73\x65" != $HO)) {
            goto Gh;
        }
        return;
        Gh:
        if (!(isset($_REQUEST["\164\x61\x62"]) && $_REQUEST["\x74\x61\x62"] == "\x6c\x69\143\145\x6e\163\151\156\x67")) {
            goto sH;
        }
        wp_enqueue_style("\x6d\x6f\137\x73\x61\155\x6c\x5f\x62\157\x6f\x74\163\x74\162\x61\160\x5f\143\163\163", plugins_url("\x69\x6e\143\154\165\144\x65\x73\x2f\143\163\163\57\142\157\157\164\163\164\162\141\x70\57\x62\x6f\x6f\164\163\x74\162\141\x70\x2e\x6d\x69\156\x2e\143\163\x73", __FILE__), array(), mo_options_plugin_constants::Version, "\141\x6c\154");
        sH:
        wp_enqueue_style("\x6d\x6f\x5f\x73\x61\155\154\x5f\x61\x64\x6d\151\156\137\163\x65\x74\164\x69\156\x67\163\137\152\x71\165\x65\x72\171\x5f\x73\164\x79\x6c\x65", plugins_url("\x69\x6e\143\x6c\x75\144\145\x73\x2f\143\x73\x73\57\152\x71\165\145\x72\x79\56\x75\151\56\143\163\163", __FILE__), array(), mo_options_plugin_constants::Version, "\x61\154\x6c");
        wp_enqueue_style("\x6d\157\137\163\141\155\154\x5f\141\144\155\151\156\137\x73\145\x74\x74\x69\x6e\147\x73\137\x73\x74\171\154\x65\137\x74\x72\x61\143\153\145\162", plugins_url("\151\156\x63\x6c\165\144\x65\163\57\x63\163\x73\57\x70\162\157\147\x72\x65\x73\163\x2d\164\x72\141\x63\153\145\x72\x2e\143\x73\x73", __FILE__), array(), mo_options_plugin_constants::Version, "\141\x6c\154");
        wp_enqueue_style("\x6d\x6f\137\163\x61\x6d\154\137\141\144\155\x69\x6e\x5f\163\145\164\164\x69\156\147\x73\137\163\x74\x79\x6c\x65", plugins_url("\151\x6e\143\154\x75\144\x65\x73\x2f\143\x73\x73\x2f\163\x74\x79\x6c\x65\137\x73\x65\164\164\x69\156\x67\163\x2e\x6d\x69\156\x2e\143\163\163", __FILE__), array(), mo_options_plugin_constants::Version, "\x61\x6c\154");
        wp_enqueue_style("\x6d\157\137\x73\141\155\154\137\141\x64\155\151\156\137\163\x65\164\164\x69\x6e\147\x73\137\x70\150\157\x6e\145\137\x73\164\x79\x6c\145", plugins_url("\x69\x6e\143\154\x75\144\x65\x73\57\x63\x73\x73\57\x70\150\157\x6e\145\x2e\x6d\151\x6e\56\x63\163\x73", __FILE__), array(), mo_options_plugin_constants::Version, "\141\154\x6c");
        wp_enqueue_style("\155\x6f\137\163\141\155\x6c\x5f\167\x70\142\x2d\146\x61", plugins_url("\151\x6e\143\x6c\165\144\145\163\x2f\143\x73\x73\57\x66\x6f\156\164\x2d\x61\167\x65\163\x6f\x6d\145\56\155\x69\156\56\143\x73\x73", __FILE__), array(), mo_options_plugin_constants::Version, "\141\154\x6c");
        wp_enqueue_style("\155\x6f\x5f\163\141\x6d\x6c\137\155\x61\156\x61\x67\145\x5f\x6c\x69\143\x65\x6e\x73\x65\x5f\163\x65\x74\x74\151\156\147\163\137\x73\x74\x79\x6c\145", plugins_url("\x4c\x69\x63\x65\156\163\x65\125\164\x69\x6c\163\x2f\x76\x69\145\167\163\57\x4c\x69\143\145\156\x73\145\x56\151\145\167\56\143\163\163", __FILE__), array(), mo_options_plugin_constants::Version, "\141\154\154");
    }
    function plugin_settings_script($HO)
    {
        if (!("\164\x6f\160\154\145\x76\145\154\137\160\141\147\145\137\x6d\157\x5f\x73\x61\155\154\x5f\x73\x65\x74\x74\x69\x6e\147\x73" != $HO && "\x6d\x69\x6e\151\x6f\162\141\156\x67\145\55\x73\141\155\x6c\55\x32\55\x30\55\x73\x73\157\x5f\x70\141\x67\145\x5f\155\x6f\x5f\x6d\141\x6e\141\147\145\x5f\154\151\143\x65\156\163\x65" != $HO)) {
            goto um;
        }
        return;
        um:
        wp_enqueue_script("\152\x71\x75\145\162\171");
        wp_enqueue_script("\155\x6f\x5f\x73\x61\x6d\x6c\137\141\x64\155\151\x6e\137\163\x65\164\x74\151\156\x67\163\137\143\157\x6c\157\162\137\x73\x63\162\x69\x70\164", plugins_url("\151\x6e\x63\x6c\x75\x64\x65\163\57\x6a\163\x2f\x6a\x73\x63\157\154\x6f\x72\57\152\x73\143\157\154\x6f\162\56\152\163", __FILE__), array(), mo_options_plugin_constants::Version, false);
        wp_enqueue_script("\155\x6f\x5f\x73\141\155\x6c\137\141\x64\155\x69\156\137\x73\x65\164\164\151\156\x67\x73\x5f\163\143\x72\151\x70\x74", plugins_url("\151\x6e\143\x6c\x75\144\145\x73\57\x6a\163\x2f\163\145\164\164\x69\x6e\x67\163\x2e\x6d\x69\x6e\x2e\152\x73", __FILE__), array(), mo_options_plugin_constants::Version, false);
        wp_enqueue_script("\x6d\x6f\x5f\163\x61\155\154\x5f\141\144\x6d\151\156\137\x73\x65\x74\x74\151\x6e\147\x73\137\x70\150\x6f\156\x65\137\163\x63\162\151\x70\164", plugins_url("\151\156\143\154\165\x64\x65\163\57\x6a\x73\57\x70\150\x6f\156\145\x2e\x6d\151\x6e\x2e\x6a\163", __FILE__), array(), mo_options_plugin_constants::Version, false);
        if (!(isset($_REQUEST["\164\x61\x62"]) && $_REQUEST["\164\x61\x62"] == "\154\x69\x63\x65\156\163\x69\x6e\147")) {
            goto Fy;
        }
        wp_enqueue_script("\155\x6f\x5f\x73\x61\x6d\x6c\x5f\x6d\157\144\145\x72\156\x69\x7a\162\137\163\x63\162\151\160\x74", plugins_url("\151\x6e\143\154\165\x64\x65\163\57\152\163\57\155\x6f\x64\x65\162\156\x69\172\162\x2e\x6a\163", __FILE__), array(), mo_options_plugin_constants::Version, false);
        wp_enqueue_script("\155\157\x5f\163\x61\155\x6c\137\160\x6f\160\157\166\145\162\x5f\x73\x63\162\x69\160\x74", plugins_url("\x69\156\x63\x6c\165\x64\145\x73\x2f\152\x73\57\x62\x6f\x6f\164\x73\164\x72\x61\x70\x2f\160\157\160\160\x65\x72\56\155\151\156\x2e\x6a\163", __FILE__), array(), mo_options_plugin_constants::Version, false);
        wp_enqueue_script("\155\x6f\x5f\x73\141\155\x6c\137\142\x6f\x6f\164\x73\164\162\141\160\137\163\x63\162\x69\x70\164", plugins_url("\151\x6e\x63\x6c\x75\144\145\x73\57\x6a\x73\57\x62\x6f\157\x74\163\x74\x72\141\160\x2f\x62\157\x6f\164\163\164\x72\x61\x70\56\155\151\x6e\56\x6a\163", __FILE__), array(), mo_options_plugin_constants::Version, false);
        Fy:
    }
    function mo_saml_activation_message()
    {
        $Pp = "\165\x70\x64\141\164\145\x64";
        $ci = get_option("\155\x6f\137\x73\141\155\x6c\137\x6d\x65\x73\x73\141\147\145");
        echo "\74\x64\151\x76\x20\143\154\141\x73\163\x3d\x27" . $Pp . "\x27\x3e\x20\x3c\160\x3e" . $ci . "\x3c\x2f\160\76\x3c\57\144\x69\166\x3e";
    }
    function get_empty_strings()
    {
        return '';
    }
    function mo_saml_custom_attr_column($Ja)
    {
        $rl = maybe_unserialize(get_option("\x6d\x6f\137\x73\141\155\x6c\137\x63\165\163\164\157\x6d\x5f\141\x74\x74\x72\163\137\155\x61\x70\160\x69\x6e\x67"));
        $hN = get_option("\163\x61\x6d\x6c\x5f\x73\x68\157\167\x5f\x75\163\x65\162\137\141\x74\164\162\151\x62\x75\x74\145");
        $Sm = 0;
        if (!is_array($rl)) {
            goto CZ;
        }
        foreach ($rl as $N5 => $x9) {
            if (empty($N5)) {
                goto iS;
            }
            if (!in_array($Sm, $hN)) {
                goto rt;
            }
            $Ja[$N5] = $N5;
            rt:
            iS:
            $Sm++;
            gO:
        }
        GX:
        CZ:
        return $Ja;
    }
    function mo_saml_attr_column_content($Cy, $j7, $Zn)
    {
        $rl = maybe_unserialize(get_option("\155\157\137\x73\141\x6d\x6c\x5f\x63\165\163\x74\x6f\x6d\137\x61\x74\x74\162\163\x5f\x6d\141\x70\160\x69\156\147"));
        if (!is_array($rl)) {
            goto Hn;
        }
        foreach ($rl as $N5 => $x9) {
            if (!($N5 === $j7)) {
                goto ll;
            }
            $nD = get_user_meta($Zn, $j7, false);
            if (empty($nD)) {
                goto HD;
            }
            if (!is_array($nD[0])) {
                goto OZ;
            }
            $Du = '';
            foreach ($nD[0] as $bt) {
                $Du = $Du . $bt;
                if (!next($nD[0])) {
                    goto QG;
                }
                $Du = $Du . "\x20\x7c\x20";
                QG:
                LI:
            }
            Qn:
            return $Du;
            goto F_;
            OZ:
            return $nD[0];
            F_:
            HD:
            ll:
            Tb:
        }
        DQ:
        Hn:
        return $Cy;
    }
    static function mo_check_option_admin_referer($bh)
    {
        return isset($_POST["\157\160\x74\151\x6f\156"]) and $_POST["\x6f\x70\164\x69\x6f\x6e"] == $bh and check_admin_referer($bh);
    }
    function miniorange_login_widget_saml_save_settings()
    {
        if (!current_user_can("\155\x61\x6e\141\147\145\137\157\160\x74\151\x6f\x6e\163")) {
            goto k1;
        }
        if (!(is_admin() && get_option("\101\x63\164\x69\166\x61\x74\x65\x64\137\120\x6c\165\147\x69\156") == "\x50\x6c\x75\x67\151\156\x2d\123\154\165\x67")) {
            goto dk;
        }
        delete_option("\x41\143\164\151\166\x61\x74\x65\x64\137\x50\154\x75\x67\x69\156");
        update_option("\x6d\x6f\137\163\141\x6d\x6c\137\155\145\163\x73\x61\147\145", "\107\x6f\x20\x74\157\x20\160\154\165\147\151\x6e\40\x3c\x62\x3e\x3c\141\x20\150\x72\145\x66\x3d\x22\x61\x64\x6d\x69\156\x2e\x70\x68\160\x3f\x70\x61\147\145\75\x6d\x6f\x5f\163\141\155\x6c\137\163\145\164\164\151\156\147\x73\x22\76\x73\145\x74\x74\x69\x6e\147\x73\74\x2f\x61\x3e\x3c\x2f\x62\76\40\x74\157\40\x63\157\x6e\146\151\x67\165\162\x65\x20\x53\x41\115\x4c\40\x53\x69\156\147\154\145\40\123\151\147\x6e\x20\x4f\x6e\x20\x62\x79\x20\155\x69\156\x69\x4f\162\141\x6e\147\x65\56");
        add_action("\141\x64\x6d\151\156\137\156\x6f\x74\x69\x63\x65\163", array($this, "\x6d\x6f\x5f\163\x61\x6d\x6c\137\x61\x63\x74\x69\166\141\x74\151\x6f\156\137\x6d\x65\163\163\141\147\145"));
        dk:
        k1:
        if (!(isset($_POST["\x6f\160\164\x69\157\x6e"]) && current_user_can("\x6d\141\x6e\x61\147\145\x5f\157\x70\164\x69\157\x6e\163"))) {
            goto Vp;
        }
        if (!self::mo_check_option_admin_referer("\155\157\x5f\x6d\x61\x6e\x61\147\145\137\154\x69\x63\x65\x6e\x73\x65")) {
            goto C8;
        }
        if (array_key_exists("\155\157\x5f\x65\x6e\141\142\x6c\145\137\x6d\165\154\x74\x69\x70\x6c\145\137\154\x69\x63\145\x6e\163\x65\x73", $_POST)) {
            goto q0;
        }
        delete_option("\155\157\x5f\145\x6e\141\x62\154\x65\137\155\165\x6c\x74\x69\x70\x6c\x65\x5f\x6c\x69\143\145\x6e\x73\x65\163");
        goto vz;
        q0:
        update_option("\x6d\x6f\x5f\145\x6e\141\x62\x6c\145\137\155\165\x6c\164\151\x70\154\x65\137\x6c\x69\x63\x65\x6e\163\145\x73", "\143\150\x65\x63\153\145\x64");
        initializeLicenseObjectArray();
        vz:
        update_option("\155\x6f\x5f\x73\141\155\x6c\x5f\x6d\x65\163\163\141\147\145", "\x43\x6f\156\x66\151\147\x75\x72\141\164\x69\157\x6e\x20\163\x61\x76\x65\144\x20\163\165\143\143\145\163\163\x66\165\x6c\x6c\171");
        $this->mo_saml_show_success_message();
        C8:
        if (!self::mo_check_option_admin_referer("\155\x6f\x5f\x61\144\x64\x69\x6e\x67\x5f\x61\x6c\x74\x65\162\x6e\x61\164\x65\137\x65\156\166\x69\162\x6f\156\155\x65\156\x74\x73")) {
            goto FT;
        }
        if (updateLicenseObjects($_POST)) {
            goto jl;
        }
        update_option("\x6d\x6f\x5f\163\x61\155\154\x5f\155\x65\163\x73\x61\147\x65", "\131\x6f\x75\162\x20\143\x68\141\x6e\x67\145\x73\40\x77\x65\x72\145\x20\x6e\x6f\x74\40\x73\141\x76\x65\x64\x2e\40\120\x6c\x65\x61\x73\145\40\160\162\157\x76\x69\x64\145\40\x75\x6e\151\161\165\145\40\x76\x61\154\165\145\x73\40\x66\x6f\x72\40\x79\157\165\162\x20\145\156\166\x69\x72\x6f\x6e\x6d\x65\x6e\x74\163\x20\141\156\144\x20\144\x6f\156\47\x74\x20\x72\145\155\x6f\166\145\40\164\x68\145\x20\x63\165\162\x72\x65\156\164\40\145\x6e\166\151\162\x6f\156\155\145\x6e\164");
        $this->mo_saml_show_error_message();
        goto MB;
        jl:
        update_option("\x6d\157\137\163\x61\x6d\154\x5f\x6d\145\x73\x73\x61\x67\x65", "\x45\x6e\x76\151\x72\157\156\x6d\145\x6e\x74\163\x20\165\x70\144\141\164\x65\144\x20\163\x75\x63\x63\x65\163\163\x66\x75\154\154\171");
        $this->mo_saml_show_success_message();
        MB:
        FT:
        if (!self::mo_check_option_admin_referer("\155\x6f\137\x63\150\141\156\x67\x65\x5f\x65\156\166\151\162\157\156\x65\x6d\x74")) {
            goto tn;
        }
        update_option("\155\157\137\163\141\x6d\x6c\x5f\x73\x65\x6c\x65\x63\164\145\144\x5f\x65\156\x76\151\x72\157\x6e\155\x65\156\x74", $_POST["\145\156\166\151\x72\x6f\156\155\x65\x6e\x74"]);
        update_option("\x6d\157\137\x73\141\x6d\x6c\137\x6d\x65\x73\x73\141\147\x65", "\x45\x6e\x76\x69\162\x6f\156\155\x65\156\164\x20\x63\x68\x61\156\x67\145\x64\x20\x73\x75\143\x63\x65\x73\163\146\x75\x6c\154\171");
        $this->mo_saml_show_success_message();
        tn:
        if (self::mo_check_option_admin_referer("\154\x6f\x67\151\156\137\167\151\144\x67\x65\x74\137\x73\x61\155\154\137\163\141\166\x65\x5f\163\x65\x74\x74\x69\x6e\147\163")) {
            goto ux;
        }
        if (self::mo_check_option_admin_referer("\x6c\157\147\x69\x6e\137\167\x69\144\x67\145\164\137\163\x61\x6d\154\x5f\141\x74\x74\x72\151\142\165\164\x65\137\155\x61\x70\x70\x69\x6e\147")) {
            goto RZ;
        }
        if (self::mo_check_option_admin_referer("\143\x6c\x65\x61\162\x5f\x61\164\x74\x72\163\x5f\x6c\x69\x73\x74")) {
            goto IA;
        }
        if (self::mo_check_option_admin_referer("\x6d\157\x5f\163\141\155\x6c\137\x61\144\144\x6f\156\x73\x5f\155\145\163\163\x61\147\x65")) {
            goto u0;
        }
        if (self::mo_check_option_admin_referer("\154\x6f\x67\151\156\x5f\x77\151\144\147\145\164\x5f\163\x61\x6d\x6c\x5f\x72\157\154\x65\137\x6d\x61\x70\160\x69\x6e\x67")) {
            goto Lh;
        }
        if (self::mo_check_option_admin_referer("\x73\141\x6d\x6c\x5f\146\157\x72\155\x5f\x64\x6f\155\141\151\156\x5f\x72\145\163\164\x72\x69\143\164\x69\157\x6e\x5f\x6f\160\164\x69\x6f\156")) {
            goto yG;
        }
        if (self::mo_check_option_admin_referer("\155\x6f\137\163\x61\x6d\x6c\137\x75\160\144\141\164\145\137\x69\144\160\x5f\163\145\164\164\x69\x6e\x67\x73\x5f\x6f\x70\164\x69\157\x6e")) {
            goto nN;
        }
        if (!self::mo_check_option_admin_referer("\163\141\x6d\x6c\137\165\x70\154\x6f\141\144\137\155\x65\164\141\x64\x61\164\141")) {
            goto iU;
        }
        if (preg_match("\x2f\136\x5c\167\52\44\x2f", $_POST["\x73\141\x6d\154\x5f\151\x64\x65\156\x74\151\164\x79\137\x6d\x65\x74\141\144\x61\x74\141\137\160\162\157\166\x69\144\145\x72"])) {
            goto Y2;
        }
        update_option("\x6d\157\x5f\163\141\155\x6c\137\x6d\x65\x73\x73\x61\147\145", "\x50\154\145\141\163\145\40\155\141\x74\143\x68\40\x74\x68\x65\x20\x72\x65\161\165\x65\x73\x74\x65\x64\x20\146\157\162\x6d\x61\164\40\x66\157\x72\40\111\144\145\156\164\x69\x74\171\x20\120\x72\157\166\x69\x64\145\162\40\116\x61\155\145\x2e\x20\117\156\154\x79\40\141\x6c\160\x68\141\142\145\164\x73\54\40\x6e\x75\155\142\x65\x72\163\40\x61\x6e\x64\40\x75\156\x64\145\x72\163\143\157\x72\x65\40\x69\163\40\141\154\x6c\x6f\167\x65\x64\56");
        $this->mo_saml_show_error_message();
        return;
        Y2:
        if (!function_exists("\x77\160\x5f\x68\x61\x6e\x64\x6c\x65\137\x75\160\x6c\157\141\144")) {
            require_once ABSPATH . "\167\x70\55\x61\144\155\151\156\57\151\x6e\143\x6c\x75\x64\x65\163\57\146\x69\x6c\x65\x2e\160\150\160";
        }
        $this->_handle_upload_metadata();
        iU:
        goto q3;
        nN:
        if (!(isset($_POST["\155\157\137\x73\141\x6d\154\137\x73\160\x5f\142\x61\163\145\137\x75\x72\x6c"]) && isset($_POST["\155\157\137\163\x61\155\x6c\137\x73\160\137\145\156\x74\x69\x74\171\137\151\x64"]))) {
            goto T7;
        }
        $ZS = htmlspecialchars($_POST["\x6d\x6f\137\163\141\x6d\154\x5f\x73\x70\x5f\142\141\x73\x65\137\x75\x72\x6c"]);
        $vs = htmlspecialchars($_POST["\155\x6f\137\x73\x61\155\154\x5f\163\x70\x5f\145\156\164\x69\x74\171\137\151\144"]);
        if (!(substr($ZS, -1) == "\x2f")) {
            goto X1;
        }
        $ZS = substr($ZS, 0, -1);
        X1:
        update_option("\155\x6f\137\x73\x61\x6d\154\137\163\x70\137\x62\141\163\x65\x5f\165\162\154", $ZS);
        update_option("\155\157\137\x73\x61\155\x6c\x5f\x73\160\x5f\x65\156\x74\151\x74\x79\x5f\151\x64", $vs);
        T7:
        update_option("\155\157\x5f\163\x61\155\x6c\x5f\x6d\145\163\x73\141\x67\x65", "\123\x65\164\x74\x69\x6e\147\163\40\165\x70\144\141\x74\145\x64\40\x73\165\x63\x63\x65\163\x73\x66\165\154\x6c\x79\x2e");
        $this->mo_saml_show_success_message();
        q3:
        goto Zy;
        yG:
        $B0 = LicenseHelper::getSelectedEnvironment();
        mo_save_environment_settings($_POST);
        if (!($B0 and $B0 != LicenseHelper::getCurrentEnvironment())) {
            goto Ea;
        }
        return;
        Ea:
        $ZT = isset($_POST["\155\157\137\163\141\155\x6c\137\x65\156\141\142\154\x65\x5f\144\x6f\x6d\141\x69\156\137\x72\145\x73\164\162\x69\x63\x74\x69\x6f\156\x5f\x6c\157\x67\x69\x6e"]) && !empty($_POST["\x6d\x6f\x5f\x73\141\x6d\154\x5f\x65\156\141\142\x6c\145\x5f\144\x6f\155\141\151\x6e\137\x72\145\x73\x74\x72\x69\x63\x74\151\157\156\x5f\154\157\147\x69\156"]) ? htmlspecialchars($_POST["\155\x6f\137\x73\141\x6d\x6c\x5f\145\x6e\x61\142\x6c\145\x5f\x64\157\155\141\x69\x6e\137\162\145\163\164\x72\x69\x63\x74\151\157\x6e\137\x6c\157\147\x69\156"]) : '';
        $aQ = isset($_POST["\x6d\x6f\x5f\x73\141\155\154\137\x61\154\154\157\167\137\x64\145\156\171\x5f\x75\163\x65\162\137\167\x69\164\150\137\144\157\155\x61\151\156"]) && !empty($_POST["\155\x6f\137\163\141\155\154\x5f\x61\154\154\x6f\x77\137\144\145\x6e\x79\137\165\163\145\162\137\167\151\164\x68\137\144\157\x6d\141\x69\x6e"]) ? htmlspecialchars($_POST["\155\x6f\137\163\141\155\x6c\137\141\154\x6c\157\x77\x5f\144\145\x6e\x79\x5f\165\x73\145\162\137\167\151\x74\x68\x5f\x64\x6f\155\141\151\x6e"]) : "\x61\154\x6c\157\167";
        $DD = isset($_POST["\x73\141\x6d\x6c\x5f\141\x6d\137\x65\155\141\151\154\137\x64\x6f\x6d\141\x69\156\163"]) && !empty($_POST["\x73\x61\x6d\154\x5f\141\155\137\145\x6d\141\151\154\x5f\144\x6f\155\x61\151\x6e\163"]) ? htmlspecialchars($_POST["\x73\141\155\x6c\137\141\155\137\145\x6d\141\x69\x6c\x5f\x64\x6f\155\141\x69\156\163"]) : '';
        update_option("\x6d\157\137\163\x61\155\x6c\137\145\156\141\x62\154\x65\x5f\144\x6f\x6d\141\151\x6e\x5f\x72\x65\163\164\x72\151\x63\164\151\157\x6e\137\x6c\x6f\x67\151\156", $ZT);
        update_option("\x6d\x6f\137\x73\141\155\x6c\137\x61\154\154\x6f\167\137\x64\145\x6e\171\x5f\165\163\145\x72\x5f\x77\151\164\x68\137\x64\x6f\155\x61\151\x6e", $aQ);
        update_option("\x73\x61\155\154\x5f\141\155\137\x65\x6d\x61\151\x6c\x5f\x64\157\155\x61\151\156\163", $DD);
        update_option("\155\157\x5f\163\141\155\x6c\x5f\x6d\x65\163\163\x61\x67\x65", "\104\157\155\141\x69\156\x20\x52\145\x73\x74\162\151\x63\x74\151\157\x6e\40\x68\141\x73\x20\142\x65\145\156\x20\163\x61\166\x65\x64\40\x73\x75\143\x63\145\163\x73\146\x75\154\x6c\171\x2e");
        $this->mo_saml_show_success_message();
        Zy:
        goto NM;
        Lh:
        $B0 = LicenseHelper::getSelectedEnvironment();
        mo_save_environment_settings($_POST);
        if (!($B0 and $B0 != LicenseHelper::getCurrentEnvironment())) {
            goto J0;
        }
        return;
        J0:
        if (mo_saml_is_extension_installed("\x63\x75\x72\154")) {
            goto yq;
        }
        update_option("\155\x6f\137\163\x61\x6d\154\137\155\145\163\163\x61\x67\x65", "\x45\122\122\117\122\x3a\x20\x50\x48\x50\x20\x63\125\x52\x4c\40\x65\x78\164\x65\x6e\x73\x69\x6f\x6e\x20\x69\163\x20\156\x6f\164\40\151\x6e\163\164\141\x6c\154\x65\x64\x20\x6f\162\x20\144\x69\163\141\x62\154\145\144\56\x20\x53\141\166\x65\40\122\157\x6c\x65\40\x4d\141\x70\160\x69\156\x67\x20\x66\x61\151\x6c\x65\x64\x2e");
        $this->mo_saml_show_error_message();
        return;
        yq:
        if (!isset($_POST["\163\x61\155\x6c\x5f\141\155\x5f\144\x65\146\141\x75\154\x74\137\165\x73\x65\162\x5f\162\x6f\154\x65"])) {
            goto Wk;
        }
        $ls = htmlspecialchars($_POST["\x73\141\x6d\x6c\137\141\x6d\137\144\x65\146\141\165\154\x74\x5f\x75\163\145\x72\137\162\x6f\x6c\145"]);
        update_option("\x73\141\x6d\x6c\137\x61\155\x5f\x64\145\146\x61\x75\x6c\x74\x5f\165\163\x65\x72\137\162\x6f\x6c\x65", $ls);
        Wk:
        if (isset($_POST["\163\141\155\154\137\141\155\x5f\x64\x6f\156\x74\137\x61\x6c\154\157\x77\x5f\x75\156\154\151\x73\164\x65\144\x5f\x75\x73\145\162\x5f\162\x6f\x6c\x65"])) {
            goto Jb;
        }
        update_option("\x73\141\155\154\x5f\x61\x6d\x5f\x64\x6f\156\164\x5f\141\x6c\x6c\x6f\167\137\x75\x6e\x6c\x69\163\x74\x65\x64\x5f\165\163\145\162\x5f\x72\x6f\x6c\x65", "\x75\x6e\x63\x68\x65\x63\x6b\x65\144");
        goto vl;
        Jb:
        update_option("\163\141\155\154\137\141\x6d\x5f\144\145\x66\x61\165\154\x74\x5f\x75\163\x65\x72\137\x72\157\154\x65", false);
        update_option("\x73\141\x6d\154\x5f\x61\x6d\137\144\157\x6e\164\137\141\x6c\x6c\157\x77\137\165\156\154\151\x73\164\145\144\137\x75\163\145\x72\x5f\162\x6f\x6c\145", "\143\x68\x65\x63\x6b\x65\x64");
        vl:
        if (isset($_POST["\x6d\157\137\x73\141\x6d\154\x5f\144\157\156\x74\137\143\162\x65\x61\x74\145\137\165\x73\x65\162\x5f\151\146\137\x72\x6f\154\145\137\x6e\157\x74\137\155\x61\x70\160\145\x64"])) {
            goto Df;
        }
        update_option("\155\157\137\163\141\155\154\137\144\x6f\x6e\164\137\143\x72\145\x61\x74\x65\x5f\x75\163\x65\x72\137\x69\x66\137\162\x6f\154\x65\x5f\x6e\157\x74\137\155\x61\x70\160\x65\144", "\x75\x6e\143\x68\145\143\x6b\145\x64");
        goto Vx;
        Df:
        update_option("\155\x6f\137\x73\x61\x6d\x6c\x5f\144\x6f\156\x74\x5f\143\162\x65\x61\x74\x65\x5f\165\163\145\162\137\151\146\x5f\162\x6f\154\145\x5f\156\x6f\x74\x5f\155\x61\x70\x70\145\x64", "\x63\x68\145\143\153\145\x64");
        update_option("\163\141\x6d\x6c\137\141\x6d\x5f\144\x65\146\x61\x75\154\x74\x5f\165\163\145\162\x5f\162\x6f\154\x65", false);
        update_option("\x73\141\x6d\154\x5f\x61\x6d\x5f\144\157\x6e\x74\x5f\x61\x6c\x6c\157\x77\137\x75\156\x6c\151\x73\x74\145\144\137\165\x73\x65\x72\x5f\x72\x6f\x6c\x65", "\x75\156\143\x68\x65\x63\153\x65\x64");
        Vx:
        if (isset($_POST["\155\157\x5f\163\x61\x6d\154\137\x64\x6f\156\x74\x5f\165\x70\144\141\x74\145\x5f\x65\x78\151\x73\164\151\x6e\147\x5f\x75\x73\145\x72\x5f\162\x6f\x6c\145"])) {
            goto Aw;
        }
        update_option("\x73\141\155\154\x5f\x61\x6d\137\144\157\156\x74\137\x75\160\x64\141\x74\145\137\x65\170\x69\x73\164\x69\156\x67\137\165\x73\x65\x72\137\x72\x6f\x6c\x65", "\x75\x6e\143\150\x65\x63\x6b\145\144");
        goto q2;
        Aw:
        update_option("\x73\141\155\154\x5f\x61\155\137\x64\x6f\x6e\164\x5f\x75\160\144\x61\164\145\137\x65\x78\x69\x73\164\151\156\x67\x5f\x75\x73\x65\162\137\162\157\154\x65", "\143\150\145\143\x6b\145\x64");
        update_option("\163\141\155\154\137\x61\155\137\x75\160\144\x61\x74\x65\x5f\x61\144\155\151\156\x5f\165\163\x65\162\163\x5f\x72\x6f\154\x65", "\x75\x6e\143\x68\x65\143\x6b\x65\x64");
        q2:
        if (isset($_POST["\x6d\x6f\137\x73\x61\x6d\154\137\165\x70\144\x61\x74\145\137\141\x64\155\151\x6e\x5f\x75\x73\x65\162\x73\137\162\x6f\154\x65"])) {
            goto Ha;
        }
        update_option("\x73\141\x6d\x6c\137\x61\x6d\x5f\x75\x70\144\141\x74\145\x5f\141\144\155\151\x6e\x5f\x75\x73\145\x72\x73\x5f\x72\157\x6c\145", "\165\156\x63\150\145\143\153\x65\x64");
        goto TM;
        Ha:
        update_option("\163\141\155\x6c\137\141\155\x5f\x75\x70\x64\x61\x74\145\137\x61\x64\155\x69\156\x5f\x75\x73\x65\162\163\x5f\x72\x6f\154\x65", "\x63\150\x65\143\x6b\x65\144");
        TM:
        if (isset($_POST["\155\157\137\x73\x61\x6d\x6c\x5f\144\157\x6e\164\137\x61\x6c\154\157\x77\x5f\x75\163\145\x72\x5f\x74\x6f\x6c\x6f\x67\x69\156\x5f\143\x72\x65\x61\x74\x65\x5f\x77\x69\164\150\x5f\147\151\x76\145\x6e\x5f\x67\x72\x6f\x75\x70\163"])) {
            goto G3;
        }
        update_option("\x73\x61\155\154\137\141\155\x5f\x64\x6f\x6e\x74\137\x61\154\154\x6f\167\x5f\x75\163\145\x72\137\164\x6f\x6c\x6f\x67\151\x6e\x5f\x63\162\x65\141\164\145\137\x77\151\x74\x68\x5f\147\151\166\x65\156\137\x67\x72\157\x75\x70\163", "\x75\156\143\150\145\x63\153\x65\144");
        goto DR;
        G3:
        update_option("\x73\141\155\x6c\x5f\x61\155\137\x64\x6f\156\x74\137\141\x6c\x6c\x6f\x77\x5f\165\163\x65\x72\137\x74\x6f\x6c\157\x67\x69\156\x5f\143\162\145\141\x74\145\137\x77\x69\x74\x68\x5f\x67\151\x76\x65\156\137\x67\x72\x6f\x75\160\x73", "\143\x68\145\x63\153\x65\x64");
        if (!isset($_POST["\x6d\157\137\x73\x61\x6d\154\137\162\145\163\x74\x72\151\143\x74\x5f\165\163\145\x72\163\137\x77\151\164\150\137\x67\162\157\165\160\x73"])) {
            goto Ab;
        }
        if (!empty($_POST["\x6d\157\x5f\x73\x61\155\x6c\x5f\x72\x65\x73\164\162\151\x63\164\137\x75\x73\x65\x72\x73\x5f\167\151\164\x68\x5f\x67\162\x6f\x75\160\x73"])) {
            goto gb;
        }
        update_option("\x6d\157\x5f\163\141\155\x6c\137\162\145\x73\164\x72\x69\143\x74\x5f\x75\163\145\162\163\137\167\151\x74\x68\x5f\147\162\x6f\165\160\163", '');
        goto Ox;
        gb:
        update_option("\155\157\137\x73\x61\155\x6c\x5f\162\x65\x73\x74\162\x69\143\x74\137\x75\x73\x65\x72\x73\137\x77\151\164\150\x5f\x67\x72\157\x75\x70\x73", htmlspecialchars(stripslashes($_POST["\x6d\x6f\x5f\163\x61\x6d\x6c\137\x72\x65\163\x74\x72\151\x63\164\x5f\x75\x73\145\x72\x73\137\167\x69\x74\x68\x5f\x67\x72\x6f\165\160\163"])));
        Ox:
        Ab:
        DR:
        $wp_roles = new WP_Roles();
        $Mu = $wp_roles->get_names();
        $zF = array();
        foreach ($Mu as $GV => $TG) {
            $j9 = "\x73\x61\x6d\x6c\x5f\141\x6d\137\x67\x72\x6f\165\160\x5f\141\x74\164\162\x5f\x76\141\x6c\165\x65\x73\x5f" . $GV;
            $zF[$GV] = htmlspecialchars(stripslashes($_POST[$j9]));
            aT:
        }
        tD:
        update_option("\163\141\x6d\x6c\x5f\141\x6d\137\162\157\x6c\145\137\155\x61\160\x70\x69\x6e\x67", $zF);
        update_option("\155\157\x5f\163\x61\x6d\154\137\x6d\x65\163\x73\141\147\x65", "\122\157\154\145\40\x4d\x61\x70\x70\x69\x6e\147\40\x64\145\164\141\151\x6c\x73\40\163\141\x76\145\144\40\163\x75\x63\143\x65\x73\x73\146\x75\x6c\x6c\x79\x2e");
        $this->mo_saml_show_success_message();
        NM:
        goto rk;
        u0:
        update_option("\155\157\x5f\x73\x61\x6d\x6c\x5f\163\150\157\167\x5f\x61\144\x64\157\x6e\x73\137\x6e\x6f\164\x69\143\145", 1);
        rk:
        goto AP;
        IA:
        delete_option("\x6d\x6f\137\x73\x61\155\154\137\x74\145\163\164\137\x63\x6f\x6e\x66\151\147\x5f\x61\164\x74\x72\163");
        update_option("\x6d\157\137\x73\141\x6d\x6c\137\x6d\145\x73\163\141\147\x65", "\101\164\164\x72\151\x62\x75\164\x65\163\x20\154\x69\x73\x74\40\162\145\x6d\157\166\145\x64\40\x73\165\x63\143\x65\x73\x73\146\x75\154\154\171");
        $this->mo_saml_show_success_message();
        AP:
        goto ZN;
        RZ:
        if (mo_saml_is_extension_installed("\143\x75\162\154")) {
            goto rw;
        }
        update_option("\155\157\x5f\163\141\x6d\154\x5f\x6d\x65\x73\x73\x61\147\145", "\x45\122\122\x4f\122\x3a\40\x50\x48\120\40\x63\125\x52\114\40\x65\170\x74\x65\x6e\163\151\x6f\156\x20\x69\163\40\156\157\164\x20\x69\156\163\164\x61\154\x6c\x65\144\40\157\162\x20\144\x69\163\x61\142\154\x65\x64\x2e\x20\123\x61\166\x65\40\x41\164\x74\162\151\x62\165\x74\145\x20\115\141\160\x70\151\x6e\x67\x20\146\x61\x69\154\145\x64\56");
        $this->mo_saml_show_error_message();
        return;
        rw:
        $B0 = LicenseHelper::getSelectedEnvironment();
        mo_save_environment_settings($_POST);
        if (!($B0 and $B0 != LicenseHelper::getCurrentEnvironment())) {
            goto Xc;
        }
        return;
        Xc:
        update_option("\163\141\155\x6c\x5f\141\155\x5f\165\x73\x65\x72\156\141\x6d\145", htmlspecialchars(stripslashes($_POST["\163\141\155\x6c\x5f\x61\x6d\x5f\x75\163\x65\x72\156\x61\155\145"])));
        update_option("\163\141\x6d\x6c\x5f\x61\x6d\x5f\145\x6d\141\x69\154", htmlspecialchars(stripslashes($_POST["\x73\x61\155\x6c\137\141\x6d\x5f\x65\155\x61\x69\154"])));
        update_option("\163\x61\155\154\137\x61\x6d\x5f\x66\151\x72\163\164\137\156\x61\155\x65", htmlspecialchars(stripslashes($_POST["\x73\x61\155\154\x5f\141\x6d\x5f\x66\151\x72\163\x74\137\x6e\x61\x6d\x65"])));
        update_option("\x73\x61\x6d\x6c\137\141\155\137\x6c\x61\163\164\137\x6e\141\x6d\x65", htmlspecialchars(stripslashes($_POST["\x73\141\x6d\154\x5f\x61\x6d\137\x6c\141\x73\164\137\x6e\141\155\145"])));
        update_option("\163\141\x6d\154\x5f\141\155\x5f\x67\x72\157\165\160\x5f\x6e\141\155\x65", htmlspecialchars(stripslashes($_POST["\x73\141\x6d\x6c\x5f\141\x6d\137\x67\x72\x6f\165\x70\x5f\156\x61\155\145"])));
        update_option("\163\141\155\x6c\x5f\x61\x6d\x5f\x64\151\x73\x70\154\141\x79\137\x6e\x61\155\x65", htmlspecialchars(stripslashes($_POST["\x73\141\x6d\154\x5f\141\155\137\x64\x69\163\x70\154\141\171\137\156\141\155\x65"])));
        $rl = array();
        $Tp = array();
        $oG = array();
        $b5 = array();
        if (!(isset($_POST["\155\157\137\163\x61\155\x6c\x5f\143\x75\x73\x74\x6f\x6d\137\141\164\x74\162\x69\142\165\x74\x65\x5f\153\145\x79\x73"]) && !empty($_POST["\155\x6f\137\163\141\155\x6c\x5f\x63\165\x73\164\157\155\137\141\164\x74\162\151\x62\165\164\145\137\x6b\x65\x79\x73"]))) {
            goto dI;
        }
        $Tp = $_POST["\155\157\137\x73\141\155\x6c\x5f\x63\x75\x73\164\x6f\155\x5f\141\x74\x74\162\151\142\165\164\x65\137\x6b\145\171\163"];
        dI:
        if (!(isset($_POST["\155\x6f\x5f\163\x61\x6d\x6c\x5f\143\165\163\164\x6f\x6d\137\141\164\x74\162\x69\x62\x75\x74\x65\137\x76\141\154\x75\145\163"]) && !empty($_POST["\x6d\157\137\x73\141\155\154\137\143\x75\x73\164\157\155\137\x61\164\x74\x72\x69\142\x75\x74\145\x5f\166\x61\x6c\x75\x65\x73"]))) {
            goto D1;
        }
        $oG = $_POST["\x6d\157\137\163\x61\155\x6c\x5f\143\x75\163\164\157\x6d\x5f\x61\x74\x74\162\151\142\165\x74\x65\137\x76\141\x6c\165\x65\163"];
        D1:
        $Vb = count($Tp);
        if (!($Vb > 0)) {
            goto Re;
        }
        $Tp = array_map("\150\x74\155\154\163\x70\145\x63\151\141\154\x63\x68\x61\162\163", $Tp);
        $oG = array_map("\150\164\x6d\x6c\x73\160\145\143\151\x61\154\143\x68\x61\162\x73", $oG);
        $X9 = 0;
        Sw:
        if (!($X9 < $Vb)) {
            goto MO;
        }
        if (!(isset($_POST["\155\x6f\x5f\x73\x61\155\154\137\x64\x69\x73\x70\154\x61\171\x5f\x61\164\164\x72\151\142\x75\164\145\x5f" . $X9]) && !empty($_POST["\x6d\157\x5f\163\x61\155\154\x5f\144\x69\x73\x70\154\x61\171\137\141\164\164\x72\151\142\x75\164\x65\x5f" . $X9]))) {
            goto C7;
        }
        array_push($b5, $X9);
        C7:
        $X9++;
        goto Sw;
        MO:
        Re:
        update_option("\x73\141\x6d\x6c\137\163\x68\157\x77\137\165\163\x65\162\137\x61\164\164\x72\151\142\x75\x74\145", $b5);
        $rl = array_combine($Tp, $oG);
        $rl = array_filter($rl);
        if (!empty($rl)) {
            goto IE;
        }
        $rl = get_option("\155\157\x5f\163\x61\x6d\154\137\143\x75\163\x74\x6f\x6d\137\141\164\164\162\163\x5f\155\141\x70\x70\x69\x6e\x67");
        if (empty($rl)) {
            goto MT;
        }
        delete_option("\x6d\157\x5f\163\141\155\x6c\x5f\143\x75\163\164\x6f\x6d\x5f\141\164\164\162\163\137\x6d\x61\160\x70\151\156\147");
        MT:
        goto D9;
        IE:
        update_option("\x6d\157\137\163\141\x6d\154\137\143\165\x73\x74\157\x6d\137\x61\x74\164\x72\x73\137\x6d\x61\x70\160\x69\156\x67", $rl);
        D9:
        update_option("\155\x6f\x5f\163\141\x6d\154\x5f\x6d\145\163\x73\141\x67\x65", "\101\x74\164\162\x69\x62\x75\164\x65\x20\x4d\141\x70\160\x69\156\x67\40\x64\145\164\141\151\x6c\x73\x20\163\x61\x76\145\x64\40\x73\165\x63\143\x65\163\163\146\165\x6c\x6c\171");
        $this->mo_saml_show_success_message();
        ZN:
        goto Gr;
        ux:
        if (mo_saml_is_extension_installed("\143\x75\162\x6c")) {
            goto dU;
        }
        update_option("\x6d\157\x5f\x73\x61\155\154\x5f\155\x65\x73\x73\x61\147\145", "\x45\122\x52\x4f\x52\x3a\40\x50\110\120\x20\x63\125\122\x4c\40\x65\x78\x74\x65\156\x73\x69\x6f\156\x20\151\x73\40\156\157\x74\40\151\x6e\x73\164\x61\154\154\145\144\x20\157\162\40\x64\151\x73\x61\142\x6c\145\144\56\x20\x53\141\166\145\x20\111\144\x65\156\x74\151\x74\171\40\x50\x72\x6f\x76\x69\x64\145\162\40\103\x6f\x6e\x66\151\147\x75\162\x61\164\x69\x6f\x6e\40\146\141\151\x6c\145\x64\x2e");
        $this->mo_saml_show_error_message();
        return;
        dU:
        $B0 = LicenseHelper::getSelectedEnvironment();
        mo_save_environment_settings($_POST);
        if (!($B0 and $B0 != LicenseHelper::getCurrentEnvironment())) {
            goto ZH;
        }
        return;
        ZH:
        $Wy = '';
        $PV = '';
        $n_ = '';
        $W0 = '';
        $aq = '';
        $Pg = '';
        $x6 = '';
        $Lv = '';
        $L1 = '';
        if ($this->mo_saml_check_empty_or_null($_POST["\163\x61\155\154\x5f\x69\x64\x65\x6e\x74\x69\164\171\137\x6e\141\155\145"]) || $this->mo_saml_check_empty_or_null($_POST["\x73\x61\x6d\x6c\x5f\154\x6f\x67\x69\x6e\137\x75\x72\x6c"]) || $this->mo_saml_check_empty_or_null($_POST["\163\141\x6d\x6c\x5f\x69\163\163\x75\145\x72"]) || $this->mo_saml_check_empty_or_null($_POST["\163\x61\x6d\x6c\x5f\156\141\155\x65\151\x64\137\x66\x6f\x72\x6d\141\x74"])) {
            goto Hb;
        }
        if (!preg_match("\57\x5e\x5c\167\x2a\x24\x2f", $_POST["\x73\x61\155\x6c\x5f\151\144\x65\x6e\x74\151\164\x79\x5f\x6e\141\155\145"])) {
            goto md;
        }
        $Wy = htmlspecialchars(trim($_POST["\163\x61\x6d\154\137\x69\144\x65\x6e\164\x69\x74\171\137\156\141\155\145"]));
        $n_ = htmlspecialchars(trim($_POST["\163\141\x6d\x6c\137\x6c\157\147\x69\156\137\165\x72\x6c"]));
        if (!array_key_exists("\163\141\x6d\154\x5f\154\x6f\x67\151\156\137\x62\151\x6e\144\x69\156\147\137\164\x79\x70\145", $_POST)) {
            goto fV;
        }
        $PV = htmlspecialchars($_POST["\163\141\x6d\154\x5f\154\157\147\151\156\x5f\142\x69\156\x64\151\156\147\137\164\171\160\x65"]);
        fV:
        if (!array_key_exists("\x73\x61\155\154\137\x6c\157\x67\x6f\165\x74\x5f\x62\x69\x6e\x64\151\x6e\147\137\164\x79\x70\145", $_POST)) {
            goto hK;
        }
        $W0 = htmlspecialchars($_POST["\163\141\155\154\137\154\157\x67\x6f\x75\x74\x5f\142\x69\156\x64\x69\x6e\147\137\x74\171\x70\145"]);
        hK:
        if (!array_key_exists("\x73\x61\x6d\154\x5f\x6c\x6f\147\x6f\x75\164\x5f\x75\162\x6c", $_POST)) {
            goto W5;
        }
        $aq = htmlspecialchars(trim($_POST["\163\141\155\x6c\137\154\157\147\157\165\164\137\x75\162\x6c"]));
        W5:
        $Pg = htmlspecialchars(trim($_POST["\163\141\155\x6c\x5f\x69\x73\x73\x75\145\162"]));
        if (!array_key_exists("\x6d\x6f\137\x73\141\155\154\x5f\x69\144\x65\x6e\x74\x69\164\171\x5f\x70\x72\157\166\x69\144\145\162\x5f\x69\144\145\x6e\x74\x69\146\151\x65\162\137\x6e\141\x6d\x65", $_POST)) {
            goto vR;
        }
        $FD = htmlspecialchars($_POST["\155\x6f\137\x73\141\x6d\154\x5f\151\144\x65\156\164\x69\x74\x79\137\160\x72\157\x76\x69\x64\x65\162\x5f\151\144\145\156\164\x69\x66\151\145\162\x5f\x6e\141\155\x65"]);
        update_option("\x6d\x6f\137\x73\x61\x6d\154\x5f\151\x64\x65\x6e\x74\151\164\x79\137\x70\x72\157\x76\151\144\145\x72\137\151\x64\x65\156\x74\151\x66\x69\x65\x72\137\x6e\141\x6d\x65", $FD);
        vR:
        $x6 = $_POST["\163\x61\155\x6c\x5f\x78\65\60\71\137\143\145\162\164\151\x66\x69\143\x61\x74\145"];
        $L1 = htmlspecialchars($_POST["\x73\141\x6d\154\x5f\x6e\141\x6d\145\x69\x64\x5f\146\157\162\155\141\164"]);
        goto gi;
        md:
        update_option("\155\x6f\137\x73\141\155\x6c\x5f\x6d\145\x73\163\x61\147\145", "\x50\154\145\x61\x73\145\40\x6d\141\x74\143\150\40\x74\150\x65\x20\x72\145\161\165\145\x73\x74\x65\144\x20\x66\157\162\155\x61\x74\40\146\x6f\x72\x20\x49\x64\x65\156\x74\x69\x74\x79\x20\x50\162\157\166\x69\144\x65\162\40\x4e\141\x6d\x65\56\40\117\156\154\x79\x20\141\154\160\150\141\x62\145\164\x73\54\x20\156\x75\155\142\x65\162\163\40\x61\156\x64\40\165\156\144\145\x72\x73\x63\157\162\x65\x20\151\163\40\141\x6c\154\x6f\167\x65\144\56");
        $this->mo_saml_show_error_message();
        return;
        gi:
        goto ND;
        Hb:
        update_option("\155\157\137\163\141\x6d\154\x5f\x6d\x65\x73\x73\x61\147\145", "\x41\154\x6c\40\164\x68\145\40\x66\151\x65\x6c\144\x73\x20\x61\x72\x65\x20\162\x65\161\165\x69\162\145\x64\56\x20\120\154\x65\x61\x73\x65\40\145\x6e\x74\145\x72\x20\166\141\x6c\x69\144\x20\x65\156\164\162\x69\145\163\56");
        $this->mo_saml_show_error_message();
        return;
        ND:
        update_option("\163\141\x6d\154\137\x69\144\x65\x6e\x74\151\x74\x79\x5f\x6e\x61\155\x65", $Wy);
        update_option("\163\x61\155\x6c\137\154\x6f\147\151\x6e\x5f\x62\x69\156\x64\151\156\147\137\x74\x79\x70\x65", $PV);
        update_option("\163\x61\155\154\137\154\157\147\x69\x6e\x5f\165\x72\x6c", $n_);
        update_option("\163\141\x6d\154\137\154\x6f\147\x6f\165\164\137\142\x69\156\x64\151\156\x67\x5f\x74\171\160\x65", $W0);
        update_option("\163\x61\155\154\x5f\x6c\x6f\x67\x6f\165\x74\137\165\x72\154", $aq);
        update_option("\x73\x61\155\x6c\x5f\x69\163\163\165\x65\162", $Pg);
        update_option("\163\141\x6d\154\137\156\x61\155\x65\151\144\x5f\146\157\x72\155\x61\164", $L1);
        if (isset($_POST["\163\141\155\154\137\x72\x65\161\x75\x65\x73\x74\x5f\x73\x69\x67\x6e\x65\x64"])) {
            goto K3;
        }
        update_option("\x73\141\x6d\154\137\162\x65\161\165\x65\163\164\137\x73\151\x67\156\145\x64", "\x75\156\143\x68\x65\143\153\145\144");
        goto iK;
        K3:
        update_option("\x73\141\x6d\154\137\162\x65\161\x75\145\x73\164\x5f\x73\x69\x67\156\x65\144", "\x63\150\145\x63\x6b\145\x64");
        iK:
        foreach ($x6 as $N5 => $x9) {
            if (empty($x9)) {
                goto MN;
            }
            $x6[$N5] = SAMLSPUtilities::sanitize_certificate($x9);
            if (@openssl_x509_read($x6[$N5])) {
                goto PK;
            }
            update_option("\155\x6f\137\163\x61\155\154\137\x6d\145\163\163\141\147\x65", "\x49\x6e\x76\141\x6c\x69\144\x20\143\145\x72\164\151\146\x69\x63\x61\164\145\x3a\x20\x50\154\145\141\x73\145\x20\160\162\157\166\x69\144\145\x20\x61\40\166\x61\154\151\144\40\x63\x65\162\164\151\x66\x69\x63\x61\164\145\x2e");
            $this->mo_saml_show_error_message();
            delete_option("\x73\x61\155\x6c\137\x78\65\60\x39\x5f\x63\145\162\164\x69\146\x69\x63\141\x74\x65");
            return;
            PK:
            goto I8;
            MN:
            unset($x6[$N5]);
            I8:
            Ts:
        }
        kr:
        if (!empty($x6)) {
            goto RT;
        }
        update_option("\x6d\157\137\163\x61\155\x6c\137\x6d\x65\x73\163\141\x67\145", "\111\x6e\166\x61\154\151\144\40\x43\145\x72\164\x69\146\151\x63\x61\x74\x65\72\x50\x6c\145\x61\x73\145\x20\160\x72\x6f\166\x69\144\x65\40\141\x20\143\145\162\x74\151\x66\x69\x63\141\164\x65");
        $this->mo_saml_show_error_message();
        return;
        RT:
        update_option("\x73\x61\155\154\137\x78\65\60\x39\137\x63\145\162\x74\151\x66\x69\x63\141\164\x65", maybe_serialize($x6));
        if (isset($_POST["\163\x61\x6d\154\x5f\x72\145\x73\160\157\156\x73\x65\137\x73\x69\x67\x6e\145\x64"])) {
            goto jW;
        }
        update_option("\163\x61\155\154\137\x72\145\163\160\x6f\x6e\163\x65\137\163\151\x67\x6e\145\144", "\x59\x65\163");
        goto N2;
        jW:
        update_option("\163\x61\155\154\137\162\x65\x73\160\x6f\x6e\x73\x65\x5f\163\151\x67\x6e\x65\144", "\143\150\x65\143\x6b\x65\144");
        N2:
        if (isset($_POST["\163\x61\x6d\x6c\x5f\x61\x73\x73\x65\162\164\x69\157\156\x5f\163\x69\x67\156\145\144"])) {
            goto La;
        }
        update_option("\x73\x61\x6d\x6c\137\141\163\x73\145\x72\164\151\157\x6e\x5f\163\151\x67\x6e\x65\x64", "\x59\145\x73");
        goto U3;
        La:
        update_option("\x73\x61\155\154\137\141\163\x73\x65\x72\164\151\x6f\156\137\x73\x69\147\x6e\145\x64", "\x63\x68\145\143\x6b\145\144");
        U3:
        if (array_key_exists("\x6d\x6f\x5f\x73\x61\x6d\x6c\137\145\156\143\x6f\144\151\156\x67\x5f\x65\156\x61\142\154\145\x64", $_POST)) {
            goto lM;
        }
        update_option("\x6d\157\137\163\141\x6d\x6c\x5f\x65\156\x63\157\144\151\x6e\147\137\145\x6e\x61\x62\154\x65\x64", "\165\156\x63\x68\145\x63\153\x65\144");
        goto tr;
        lM:
        update_option("\155\157\x5f\163\x61\x6d\154\x5f\145\156\x63\157\144\151\156\x67\x5f\145\156\x61\142\x6c\x65\x64", "\143\x68\145\143\x6b\x65\x64");
        tr:
        update_option("\155\x6f\137\x73\141\155\154\x5f\155\145\163\163\141\147\145", "\x49\x64\x65\x6e\x74\151\x74\x79\40\120\x72\x6f\x76\151\144\145\162\x20\144\x65\x74\x61\151\154\x73\40\x73\x61\166\145\x64\x20\163\165\x63\x63\145\x73\163\x66\165\154\154\x79\56");
        $this->mo_saml_show_success_message();
        Gr:
        if (!self::mo_check_option_admin_referer("\165\160\147\162\x61\x64\x65\x5f\143\x65\162\x74")) {
            goto kk;
        }
        $V1 = file_get_contents(plugin_dir_path(__FILE__) . "\x72\145\x73\x6f\x75\162\x63\145\x73" . DIRECTORY_SEPARATOR . "\155\x69\x6e\x69\157\x72\141\156\x67\145\x5f\163\160\x5f\62\60\x32\60\56\143\x72\164");
        $uQ = file_get_contents(plugin_dir_path(__FILE__) . "\162\145\x73\157\x75\162\x63\145\163" . DIRECTORY_SEPARATOR . "\155\151\156\x69\157\162\141\156\x67\x65\x5f\163\160\137\62\x30\x32\x30\137\160\x72\x69\166\x2e\153\x65\171");
        update_option("\155\157\137\163\141\155\x6c\x5f\143\165\162\162\x65\x6e\164\x5f\x63\x65\x72\164", $V1);
        update_option("\155\157\x5f\163\141\x6d\x6c\x5f\143\165\162\162\x65\x6e\x74\x5f\143\x65\x72\x74\x5f\160\x72\x69\x76\x61\x74\145\x5f\x6b\145\171", $uQ);
        update_option("\155\x6f\137\163\141\155\154\x5f\x63\x65\x72\164\151\146\151\143\x61\164\x65\x5f\x72\x6f\x6c\x6c\x5f\x62\x61\x63\x6b\137\x61\166\141\x69\154\x61\142\x6c\x65", true);
        update_option("\x6d\x6f\x5f\x73\141\x6d\154\137\x6d\x65\163\163\141\147\145", "\x43\x65\162\164\x69\x66\x69\x63\x61\x74\145\x20\125\160\x67\x72\x61\x64\x65\144\x20\x73\165\x63\143\x65\x73\163\x66\x75\x6c\154\x79");
        $this->mo_saml_show_success_message();
        kk:
        if (!self::mo_check_option_admin_referer("\x72\x6f\154\x6c\x62\x61\x63\153\137\x63\x65\162\x74")) {
            goto FX;
        }
        $V1 = file_get_contents(plugin_dir_path(__FILE__) . "\x72\145\x73\x6f\165\x72\143\145\163" . DIRECTORY_SEPARATOR . "\x73\x70\x2d\x63\x65\162\x74\x69\146\151\x63\x61\164\x65\x2e\143\x72\164");
        $uQ = file_get_contents(plugin_dir_path(__FILE__) . "\162\x65\163\157\x75\162\x63\x65\x73" . DIRECTORY_SEPARATOR . "\x73\160\55\153\145\x79\56\x6b\x65\171");
        update_option("\x6d\157\137\163\141\155\154\137\143\x75\162\162\x65\156\x74\137\143\x65\x72\x74", $V1);
        update_option("\x6d\x6f\x5f\x73\141\155\154\x5f\x63\x75\x72\162\x65\156\164\x5f\143\145\162\x74\137\160\162\x69\166\141\164\145\x5f\153\x65\x79", $uQ);
        update_option("\x6d\x6f\137\x73\141\x6d\154\137\155\145\163\x73\x61\x67\145", "\103\145\x72\164\x69\146\151\x63\x61\164\145\40\x52\x6f\x6c\x6c\55\x62\x61\x63\x6b\145\144\40\x73\x75\143\143\145\x73\163\146\x75\154\154\171");
        delete_option("\155\x6f\x5f\x73\141\155\154\137\x63\145\x72\164\151\146\x69\143\141\x74\145\137\x72\157\x6c\154\137\142\x61\143\153\137\x61\x76\x61\151\154\x61\x62\x6c\x65");
        $this->mo_saml_show_success_message();
        FX:
        if (self::mo_check_option_admin_referer("\141\144\x64\137\143\x75\x73\x74\157\x6d\x5f\143\x65\162\164\151\x66\151\x63\141\x74\x65")) {
            goto VG;
        }
        if (self::mo_check_option_admin_referer("\x61\144\144\137\143\165\x73\x74\x6f\x6d\x5f\155\145\163\x73\x61\x67\x65\163")) {
            goto M2;
        }
        if (!self::mo_check_option_admin_referer("\155\x6f\x5f\163\141\155\x6c\137\x72\x65\x6c\x61\171\x5f\x73\164\x61\164\x65\137\157\x70\164\151\x6f\x6e")) {
            goto vQ;
        }
        if (isset($_POST["\x6d\157\x5f\x73\x61\155\154\x5f\163\x65\x6e\144\137\141\142\163\x6f\x6c\x75\164\145\x5f\162\x65\x6c\141\171\137\x73\164\x61\164\145"]) and !empty($_POST["\x6d\x6f\x5f\163\141\x6d\x6c\x5f\163\x65\156\x64\x5f\141\142\x73\x6f\154\x75\164\x65\x5f\x72\145\x6c\141\x79\137\x73\x74\141\x74\x65"])) {
            goto dh;
        }
        $bg = false;
        goto Xj;
        dh:
        $bg = true;
        Xj:
        $zW = isset($_POST["\x6d\x6f\x5f\163\141\155\154\x5f\162\145\x6c\141\171\x5f\163\x74\141\164\x65"]) ? htmlspecialchars($_POST["\155\x6f\x5f\x73\x61\x6d\154\x5f\162\x65\x6c\x61\x79\137\x73\x74\x61\164\145"]) : '';
        $fK = isset($_POST["\155\157\x5f\x73\141\155\154\x5f\154\157\147\157\165\x74\x5f\x72\145\154\x61\171\137\163\x74\141\164\145"]) ? htmlspecialchars($_POST["\155\x6f\137\x73\141\x6d\154\x5f\x6c\x6f\x67\x6f\165\x74\x5f\162\145\x6c\x61\171\x5f\x73\x74\x61\x74\x65"]) : '';
        update_option("\155\157\137\163\141\155\x6c\x5f\162\x65\x6c\x61\171\x5f\x73\x74\x61\164\x65", $zW);
        update_option("\x6d\x6f\x5f\163\141\155\x6c\x5f\x6c\157\147\x6f\x75\x74\137\x72\x65\154\x61\x79\137\x73\x74\x61\x74\x65", $fK);
        update_option("\x6d\157\137\x73\141\x6d\x6c\x5f\163\x65\x6e\144\137\141\142\x73\157\x6c\165\x74\145\x5f\x72\145\154\141\x79\x5f\x73\x74\141\164\x65", $bg);
        update_option("\155\x6f\137\x73\x61\155\154\x5f\155\x65\x73\x73\x61\x67\x65", "\122\145\154\141\x79\40\x53\x74\141\164\145\x20\165\160\144\141\x74\x65\x64\x20\x73\x75\143\x63\145\x73\x73\x66\165\x6c\x6c\171\56");
        $this->mo_saml_show_success_message();
        vQ:
        goto zw;
        M2:
        update_option("\x6d\x6f\137\x73\x61\x6d\154\137\141\x63\x63\157\165\x6e\x74\137\x63\162\x65\x61\x74\151\x6f\156\137\x64\x69\x73\x61\x62\154\145\144\137\155\163\147", htmlspecialchars($_POST["\x6d\x6f\x5f\x73\141\x6d\x6c\137\141\143\x63\157\165\156\x74\x5f\143\x72\x65\141\x74\x69\157\x6e\137\144\151\163\x61\x62\154\x65\x64\x5f\x6d\163\x67"]));
        update_option("\155\x6f\x5f\x73\x61\x6d\x6c\137\162\145\163\x74\162\151\x63\x74\145\x64\x5f\x64\157\x6d\141\151\156\x5f\145\x72\x72\157\x72\x5f\155\163\x67", htmlspecialchars($_POST["\x6d\x6f\x5f\x73\x61\x6d\154\x5f\x72\x65\163\164\x72\151\143\x74\x65\x64\137\x64\157\x6d\141\x69\156\x5f\145\x72\x72\157\162\137\155\163\x67"]));
        update_option("\155\x6f\137\x73\x61\x6d\154\137\x6d\x65\163\163\x61\x67\145", "\x43\x6f\x6e\x66\x69\147\165\x72\x61\x74\151\157\x6e\40\x68\x61\163\40\x62\145\145\x6e\40\163\x61\x76\145\144\x20\163\x75\x63\x63\145\163\x73\146\165\x6c\154\171\x2e");
        $this->mo_saml_show_success_message();
        zw:
        goto ML;
        VG:
        $V1 = file_get_contents(plugin_dir_path(__FILE__) . "\162\145\x73\157\x75\x72\x63\x65\163" . DIRECTORY_SEPARATOR . "\155\x69\156\151\x6f\162\x61\x6e\x67\145\x5f\163\160\x5f\x32\x30\x32\x30\56\143\162\x74");
        $uQ = file_get_contents(plugin_dir_path(__FILE__) . "\162\x65\x73\x6f\x75\x72\143\x65\x73" . DIRECTORY_SEPARATOR . "\155\151\x6e\151\157\162\x61\156\147\145\137\163\160\x5f\x32\60\62\x30\x5f\160\162\151\x76\x2e\153\x65\x79");
        if (isset($_POST["\163\x75\142\x6d\151\x74"]) and $_POST["\x73\x75\142\x6d\x69\164"] == "\125\160\154\x6f\x61\144") {
            goto rf;
        }
        if (!(isset($_POST["\x73\165\x62\155\x69\x74"]) and $_POST["\163\x75\142\x6d\151\x74"] == "\122\145\163\145\x74")) {
            goto Ft;
        }
        delete_option("\x6d\157\x5f\x73\x61\x6d\154\x5f\143\165\x73\164\157\x6d\137\x63\145\x72\x74");
        delete_option("\155\157\137\163\141\155\x6c\137\143\x75\x73\164\157\x6d\x5f\x63\145\162\x74\137\160\162\x69\x76\x61\164\x65\x5f\x6b\x65\x79");
        update_option("\x6d\157\x5f\163\141\x6d\x6c\137\143\x75\162\162\145\156\x74\x5f\x63\145\x72\164", $V1);
        update_option("\x6d\157\x5f\163\x61\155\x6c\x5f\x63\165\162\162\145\x6e\164\137\x63\x65\162\x74\137\160\x72\151\166\x61\x74\145\x5f\x6b\145\x79", $uQ);
        update_option("\155\157\x5f\x73\141\x6d\x6c\x5f\155\x65\163\163\x61\147\x65", "\122\145\x73\x65\164\x20\103\x65\x72\x74\151\x66\x69\x63\x61\x74\145\40\163\165\143\143\x65\x73\x73\x66\x75\x6c\x6c\171\56");
        $this->mo_saml_show_success_message();
        Ft:
        goto p6;
        rf:
        if (!@openssl_x509_read($_POST["\163\141\155\154\x5f\160\165\142\154\151\x63\x5f\170\x35\x30\x39\x5f\x63\145\x72\164\151\x66\151\143\141\x74\145"])) {
            goto BX;
        }
        if (!@openssl_x509_check_private_key($_POST["\x73\141\x6d\154\137\160\165\x62\x6c\151\143\x5f\170\65\x30\x39\x5f\x63\145\162\164\151\x66\151\143\141\x74\145"], $_POST["\163\141\155\x6c\137\160\x72\x69\166\141\164\145\137\x78\65\x30\x39\137\143\145\162\x74\151\x66\x69\143\x61\x74\145"])) {
            goto k4;
        }
        if (openssl_x509_read($_POST["\x73\141\x6d\x6c\137\x70\x75\142\x6c\x69\x63\x5f\170\x35\60\x39\x5f\x63\x65\x72\164\x69\146\151\143\x61\x74\x65"]) && openssl_x509_check_private_key($_POST["\163\141\x6d\x6c\x5f\160\x75\x62\x6c\x69\x63\137\170\65\60\71\x5f\143\145\162\x74\x69\x66\151\x63\141\164\x65"], $_POST["\163\141\x6d\154\x5f\x70\162\151\x76\141\x74\x65\137\x78\65\x30\71\x5f\143\145\x72\x74\151\146\x69\x63\141\x74\x65"])) {
            goto an;
        }
        goto G5;
        BX:
        update_option("\x6d\157\137\163\141\x6d\x6c\x5f\155\145\163\163\141\x67\145", "\111\156\x76\x61\x6c\151\x64\x20\x43\145\162\x74\x69\x66\151\x63\x61\x74\145\40\146\157\x72\155\141\x74\56\x20\120\154\x65\x61\x73\x65\40\145\x6e\164\x65\162\x20\141\x20\166\x61\154\x69\144\x20\x63\x65\162\164\x69\x66\151\143\x61\x74\x65\56");
        $this->mo_saml_show_error_message();
        return;
        goto G5;
        k4:
        update_option("\x6d\157\x5f\163\x61\x6d\154\137\155\x65\163\x73\x61\147\145", "\x49\156\166\x61\x6c\x69\x64\40\x50\x72\x69\x76\x61\x74\145\40\x4b\145\x79\x2e");
        $this->mo_saml_show_error_message();
        return;
        goto G5;
        an:
        $My = $_POST["\x73\141\x6d\x6c\x5f\x70\x75\x62\x6c\151\x63\137\x78\65\60\x39\137\x63\145\x72\x74\151\x66\x69\x63\141\x74\145"];
        $z0 = $_POST["\163\141\155\154\137\x70\162\151\x76\141\x74\145\x5f\170\65\60\71\x5f\x63\x65\x72\x74\151\x66\x69\143\x61\x74\x65"];
        update_option("\x6d\x6f\137\x73\x61\x6d\x6c\137\143\x75\x73\x74\157\155\137\x63\145\162\164", $My);
        update_option("\155\x6f\x5f\163\x61\155\154\137\x63\x75\163\164\157\x6d\137\143\145\x72\164\137\x70\x72\151\166\141\x74\145\137\x6b\145\x79", $z0);
        update_option("\x6d\157\x5f\x73\141\155\154\x5f\x63\x75\x72\162\145\156\x74\137\x63\x65\x72\164", $My);
        update_option("\x6d\x6f\137\163\x61\x6d\x6c\x5f\143\165\x72\162\x65\x6e\x74\137\143\x65\x72\164\x5f\160\162\x69\x76\141\x74\145\137\x6b\x65\171", $z0);
        update_option("\155\157\x5f\x73\x61\155\x6c\137\x6d\145\163\163\x61\147\x65", "\x43\x75\x73\x74\157\x6d\x20\103\x65\162\x74\151\x66\x69\x63\141\x74\x65\x20\165\160\144\141\x74\x65\x64\x20\x73\165\x63\x63\x65\163\163\x66\x75\154\154\x79\x2e");
        $this->mo_saml_show_success_message();
        G5:
        p6:
        ML:
        if (self::mo_check_option_admin_referer("\x6d\x6f\x5f\x73\141\x6d\x6c\x5f\167\151\144\x67\145\x74\x5f\157\160\x74\151\x6f\156")) {
            goto He;
        }
        if (self::mo_check_option_admin_referer("\x6d\157\x5f\x73\x61\155\x6c\x5f\162\145\147\x69\x73\x74\x65\x72\x5f\x63\165\x73\164\x6f\x6d\145\162")) {
            goto QM;
        }
        if (self::mo_check_option_admin_referer("\x6d\157\137\163\141\155\154\x5f\166\141\154\151\144\x61\164\145\137\157\x74\160")) {
            goto tX;
        }
        if (self::mo_check_option_admin_referer("\x6d\x6f\137\163\141\155\154\137\166\x65\x72\x69\x66\171\x5f\143\165\163\x74\x6f\155\x65\162")) {
            goto j0;
        }
        if (self::mo_check_option_admin_referer("\155\157\x5f\x73\x61\155\x6c\x5f\143\x6f\x6e\x74\141\143\x74\x5f\x75\x73\137\x71\165\x65\x72\x79\137\157\160\164\151\157\156")) {
            goto QI;
        }
        if (self::mo_check_option_admin_referer("\155\x6f\x5f\x73\x61\x6d\x6c\x5f\162\x65\163\145\x6e\144\137\157\x74\x70\x5f\x65\x6d\141\151\154")) {
            goto ky;
        }
        if (self::mo_check_option_admin_referer("\x6d\157\137\x73\x61\155\x6c\x5f\x72\x65\x73\145\156\x64\137\x6f\x74\x70\137\160\x68\x6f\x6e\145")) {
            goto fF;
        }
        if (self::mo_check_option_admin_referer("\x6d\x6f\137\163\x61\x6d\154\137\x67\157\137\x62\141\x63\x6b")) {
            goto aX;
        }
        if (self::mo_check_option_admin_referer("\x6d\x6f\x5f\163\x61\155\x6c\137\x72\x65\147\151\x73\164\145\x72\x5f\167\x69\164\x68\137\160\150\157\x6e\x65\x5f\157\x70\x74\151\157\156")) {
            goto DK;
        }
        if (self::mo_check_option_admin_referer("\x6d\157\137\x73\141\155\x6c\x5f\162\x65\x67\151\x73\x74\145\x72\x65\144\x5f\x6f\156\x6c\171\x5f\141\143\143\x65\x73\163\x5f\157\x70\164\x69\157\x6e")) {
            goto oG;
        }
        if (self::mo_check_option_admin_referer("\x6d\157\137\163\x61\155\154\137\162\x65\144\151\x72\x65\x63\x74\137\164\x6f\137\167\160\x5f\x6c\x6f\147\x69\x6e\x5f\x6f\160\164\151\x6f\156")) {
            goto jM;
        }
        if (self::mo_check_option_admin_referer("\155\157\x5f\163\141\155\154\x5f\x66\x6f\162\x63\145\137\x61\165\x74\150\145\156\164\x69\x63\141\x74\x69\157\x6e\137\x6f\x70\164\x69\157\156")) {
            goto Kv;
        }
        if (self::mo_check_option_admin_referer("\155\157\x5f\163\141\155\x6c\137\x65\x6e\141\142\x6c\x65\137\162\x73\x73\x5f\141\x63\x63\145\163\163\137\157\x70\164\x69\157\x6e")) {
            goto OY;
        }
        if (self::mo_check_option_admin_referer("\155\x6f\137\163\x61\x6d\x6c\x5f\145\x6e\x61\x62\x6c\x65\x5f\x6c\x6f\147\151\156\x5f\x72\x65\x64\x69\x72\145\143\x74\137\157\160\164\x69\157\156")) {
            goto lc;
        }
        if (self::mo_check_option_admin_referer("\155\157\x5f\x73\141\x6d\x6c\x5f\x61\x64\x64\137\163\163\x6f\x5f\x62\x75\164\164\157\x6e\137\167\x70\x5f\x6f\160\164\151\157\x6e")) {
            goto Ww;
        }
        if (self::mo_check_option_admin_referer("\155\x6f\x5f\x73\141\155\x6c\x5f\165\163\x65\x5f\142\165\164\164\157\156\137\x61\x73\x5f\163\x68\157\x72\164\143\x6f\144\145\137\x6f\x70\x74\x69\157\156")) {
            goto Vh;
        }
        if (self::mo_check_option_admin_referer("\155\157\x5f\163\x61\155\154\137\x75\x73\x65\x5f\x62\165\164\x74\x6f\x6e\x5f\x61\163\x5f\x77\151\x64\147\x65\x74\137\157\x70\x74\151\x6f\156")) {
            goto u2;
        }
        if (self::mo_check_option_admin_referer("\155\x6f\137\x73\141\x6d\x6c\137\141\154\154\157\x77\x5f\x77\160\x5f\163\x69\x67\156\151\x6e\x5f\157\x70\x74\151\157\x6e")) {
            goto Ix;
        }
        if (self::mo_check_option_admin_referer("\155\x6f\137\x73\x61\155\x6c\x5f\143\x75\163\x74\157\x6d\137\142\x75\164\164\157\156\x5f\157\x70\164\x69\157\156")) {
            goto IO;
        }
        if (self::mo_check_option_admin_referer("\x6d\x6f\x5f\x73\141\155\154\137\146\x6f\162\x67\x6f\164\137\160\x61\x73\x73\x77\157\x72\144\137\146\x6f\162\155\x5f\x6f\x70\x74\x69\x6f\x6e")) {
            goto Zt;
        }
        if (self::mo_check_option_admin_referer("\x6d\x6f\x5f\163\x61\x6d\x6c\x5f\166\145\x72\151\146\x79\137\154\151\x63\145\156\x73\x65")) {
            goto G0;
        }
        if (self::mo_check_option_admin_referer("\155\157\x5f\x73\x61\155\x6c\x5f\146\x72\x65\145\x5f\164\x72\151\141\x6c")) {
            goto zW;
        }
        if (self::mo_check_option_admin_referer("\x6d\x6f\137\163\x61\155\x6c\137\x63\150\x65\143\x6b\137\x6c\x69\x63\145\156\x73\145")) {
            goto NK;
        }
        if (!self::mo_check_option_admin_referer("\155\x6f\x5f\x73\x61\x6d\x6c\137\162\x65\155\157\166\x65\137\x61\x63\143\x6f\165\156\x74")) {
            goto h7;
        }
        $this->mo_sso_saml_deactivate();
        add_option("\155\157\x5f\x73\141\x6d\x6c\137\162\145\147\x69\x73\x74\x72\x61\164\151\157\x6e\137\163\x74\141\x74\165\163", "\162\145\x6d\x6f\166\145\x64\x5f\141\x63\143\x6f\x75\x6e\164");
        $hD = add_query_arg(array("\164\x61\x62" => "\154\157\147\x69\x6e"), $_SERVER["\x52\105\x51\125\x45\x53\x54\137\x55\122\111"]);
        header("\114\x6f\143\141\164\x69\x6f\x6e\72\x20" . $hD);
        h7:
        goto uS;
        NK:
        LicenseHelper::migrateExistingEnvironments();
        $e7 = new Customersaml();
        $nD = $e7->check_customer_ln();
        if ($nD) {
            goto ct;
        }
        return;
        ct:
        $nD = json_decode($nD, true);
        if (strcasecmp($nD["\x73\x74\141\x74\x75\163"], "\123\125\x43\103\x45\x53\x53") == 0) {
            goto Lf;
        }
        $N5 = get_option("\155\x6f\137\163\x61\x6d\x6c\x5f\143\165\163\x74\157\x6d\145\162\x5f\164\157\x6b\x65\x6e");
        update_option("\x73\x69\164\x65\137\x63\x6b\x5f\154", AESEncryption::encrypt_data("\146\141\154\x73\x65", $N5));
        $hD = add_query_arg(array("\x74\141\x62" => "\x6c\151\x63\x65\156\x73\151\x6e\x67"), $_SERVER["\122\x45\x51\125\105\x53\x54\x5f\x55\122\111"]);
        update_option("\x6d\x6f\137\163\x61\155\154\x5f\x6d\x65\x73\x73\x61\147\145", "\131\x6f\165\40\150\141\x76\x65\40\156\x6f\x74\40\165\160\147\x72\x61\144\x65\144\x20\x79\145\164\56\40" . addLink("\x43\154\151\x63\x6b\40\150\x65\x72\145", $hD) . "\40\164\157\x20\x75\160\147\x72\x61\144\x65\x20\x74\157\x20\160\162\x65\155\x69\x75\155\40\166\x65\x72\163\x69\x6f\156\x2e");
        $this->mo_saml_show_error_message();
        goto KS;
        Lf:
        if (array_key_exists("\x6c\151\x63\x65\x6e\x73\145\x50\154\141\x6e", $nD) && !$this->mo_saml_check_empty_or_null($nD["\154\151\143\x65\x6e\163\x65\120\x6c\x61\156"])) {
            goto UJ;
        }
        $N5 = get_option("\155\x6f\137\163\141\155\154\x5f\143\165\163\x74\157\x6d\145\x72\137\x74\x6f\153\x65\156");
        update_option("\x73\151\x74\x65\x5f\143\x6b\x5f\x6c", AESEncryption::encrypt_data("\146\x61\154\163\145", $N5));
        $hD = add_query_arg(array("\164\x61\142" => "\x6c\x69\x63\145\x6e\x73\151\156\x67"), $_SERVER["\x52\105\121\x55\105\123\124\137\x55\122\x49"]);
        update_option("\155\x6f\x5f\163\141\x6d\x6c\137\155\145\x73\163\x61\x67\x65", "\x59\x6f\165\x20\150\x61\x76\x65\x20\156\157\164\40\165\x70\x67\162\141\x64\x65\x64\40\171\x65\x74\x2e\40" . addLink("\103\154\151\143\153\x20\x68\145\x72\x65", $hD) . "\x20\164\x6f\x20\x75\160\147\x72\141\x64\x65\40\164\x6f\x20\160\162\x65\x6d\x69\x75\x6d\x20\166\145\x72\x73\x69\x6f\x6e\x2e");
        $this->mo_saml_show_error_message();
        goto g0;
        UJ:
        update_option("\155\x6f\x5f\163\141\x6d\x6c\137\x6c\151\143\x65\x6e\163\145\137\156\x61\x6d\145", base64_encode($nD["\154\151\143\145\156\163\x65\x50\154\141\156"]));
        $N5 = get_option("\155\157\x5f\163\141\155\x6c\137\143\x75\163\x74\x6f\x6d\x65\x72\137\x74\x6f\153\x65\156");
        if (!(array_key_exists("\x6e\157\x4f\146\125\163\x65\x72\x73", $nD) && !$this->mo_saml_check_empty_or_null($nD["\x6e\157\117\146\125\163\x65\x72\x73"]))) {
            goto gr;
        }
        update_option("\x6d\x6f\x5f\163\141\x6d\154\x5f\x75\x73\162\x5f\154\155\x74", AESEncryption::encrypt_data($nD["\156\157\x4f\x66\125\x73\x65\x72\163"], $N5));
        gr:
        if (!(array_key_exists("\154\x69\x63\145\156\x73\145\x45\x78\x70\x69\162\x79", $nD) && !$this->mo_saml_check_empty_or_null($nD["\154\x69\143\x65\x6e\x73\145\105\170\x70\151\x72\x79"]))) {
            goto OO;
        }
        update_option("\155\157\x5f\163\141\x6d\x6c\137\154\x69\x63\145\x6e\163\x65\137\145\x78\160\151\x72\171\x5f\x64\141\164\x65", $this->mo_saml_parse_expiry_date($nD["\x6c\x69\x63\x65\156\x73\145\105\170\160\x69\162\171"]));
        if (new DateTime() > new DateTime($nD["\154\x69\143\x65\156\163\x65\x45\x78\x70\x69\x72\171"])) {
            goto gA;
        }
        update_option("\x6d\157\x5f\163\141\x6d\154\x5f\163\154\145", false);
        goto yB;
        gA:
        update_option("\x6d\x6f\137\x73\141\x6d\x6c\x5f\163\154\145", true);
        yB:
        OO:
        update_option("\x73\x69\164\x65\137\x63\x6b\x5f\154", AESEncryption::encrypt_data("\x74\162\165\x65", $N5));
        $aT = plugin_dir_path(__FILE__);
        $mq = home_url();
        $mq = trim($mq, "\x2f");
        if (preg_match("\x23\x5e\x68\x74\164\160\50\163\x29\x3f\72\x2f\x2f\43", $mq)) {
            goto GE;
        }
        $mq = "\150\x74\164\x70\x3a\57\57" . $mq;
        GE:
        $tJ = parse_url($mq);
        $ng = preg_replace("\57\x5e\167\x77\167\x5c\x2e\57", '', $tJ["\x68\x6f\x73\x74"]);
        $am = wp_upload_dir();
        $bX = $ng . "\55" . $am["\142\x61\163\x65\x64\x69\162"];
        $wu = hash_hmac("\163\150\141\x32\x35\x36", $bX, "\x34\104\110\x66\152\x67\146\152\x61\x73\x6e\x64\x66\163\141\x6a\146\110\x47\x4a");
        $vR = $this->djkasjdksa();
        $Oy = round(strlen($vR) / rand(2, 20));
        $vR = substr_replace($vR, $wu, $Oy, 0);
        $Pk = base64_decode($vR);
        if (is_writable($aT . "\154\x69\x63\145\156\x73\145")) {
            goto ZQ;
        }
        $vR = str_rot13($vR);
        $wW = base64_decode("\142\x47\116\x6b\141\x6d\164\x68\143\x32\160\x6b\141\x33\116\x68\131\62\167\x3d");
        update_option($wW, $vR);
        goto hs;
        ZQ:
        file_put_contents($aT . "\154\151\143\x65\156\163\145", $Pk);
        hs:
        update_option("\154\x63\x77\162\x74\154\x66\163\141\x6d\x6c", true);
        $hD = add_query_arg(array("\x74\x61\142" => "\x67\x65\156\145\x72\141\154"), $_SERVER["\122\105\121\x55\105\x53\124\x5f\125\x52\111"]);
        update_option("\155\x6f\x5f\x73\x61\x6d\154\137\x6d\145\x73\x73\141\147\145", "\131\157\165\x20\x68\x61\166\x65\x20\x73\x75\x63\x63\x65\x73\x73\x66\x75\x6c\x6c\171\40\165\160\147\x72\x61\144\145\144\40\x79\x6f\x75\x72\x20\154\151\143\145\x6e\x73\145\56");
        $this->mo_saml_show_success_message();
        g0:
        KS:
        uS:
        goto ud;
        zW:
        if (decryptSamlElement()) {
            goto EE;
        }
        $fi = postResponse();
        $e7 = new Customersaml();
        $nD = $e7->mo_saml_vl($fi, false);
        if ($nD) {
            goto a2;
        }
        return;
        a2:
        $nD = json_decode($nD, true);
        if (strcasecmp($nD["\x73\x74\141\164\x75\x73"], "\123\125\103\103\x45\123\123") == 0) {
            goto cX;
        }
        if (strcasecmp($nD["\x73\164\x61\164\x75\163"], "\106\101\111\114\x45\104") == 0) {
            goto vA;
        }
        update_option("\155\157\137\x73\x61\x6d\x6c\137\x6d\145\163\x73\141\147\145", "\x41\x6e\40\145\x72\x72\157\162\40\x6f\x63\x63\x75\x72\x65\144\x20\x77\x68\151\x6c\145\x20\x70\x72\157\x63\x65\163\163\151\x6e\x67\x20\x79\157\165\162\x20\x72\x65\161\x75\145\x73\x74\56\x20\x50\x6c\145\141\163\145\x20\x54\x72\171\40\x61\147\141\151\x6e\56");
        $this->mo_saml_show_error_message();
        goto F2;
        vA:
        update_option("\x6d\x6f\x5f\x73\x61\155\x6c\137\155\145\163\x73\x61\x67\145", "\124\x68\145\162\145\x20\167\x61\x73\x20\x61\x6e\40\145\x72\x72\x6f\162\40\x61\143\164\x69\166\x61\x74\151\156\x67\x20\x79\157\x75\x72\40\x54\122\x49\101\x4c\40\x76\145\162\x73\151\x6f\156\56\40\120\x6c\x65\x61\163\x65\x20\143\157\156\x74\141\143\x74\40\151\x6e\x66\157\x40\x78\x65\143\165\x72\151\146\171\56\x63\157\x6d\40\146\157\x72\40\x67\x65\x74\x74\151\156\147\40\x6e\145\167\40\154\151\x63\x65\156\163\x65\40\146\x6f\162\40\x74\x72\x69\x61\154\40\166\x65\x72\163\151\157\156\x2e");
        $this->mo_saml_show_error_message();
        F2:
        goto zl;
        cX:
        $N5 = get_option("\x6d\157\x5f\x73\141\x6d\x6c\x5f\x63\x75\x73\x74\157\155\145\x72\137\x74\157\153\x65\156");
        $N5 = get_option("\155\x6f\x5f\x73\x61\x6d\154\x5f\143\x75\x73\164\157\x6d\145\x72\x5f\164\157\x6b\145\156");
        update_option("\x74\x5f\x73\151\164\145\x5f\163\164\141\164\x75\x73", AESEncryption::encrypt_data("\164\162\165\145", $N5));
        update_option("\155\157\137\163\141\x6d\x6c\x5f\155\x65\163\163\x61\147\145", "\131\x6f\165\x72\40\65\40\144\141\171\163\x20\124\122\x49\x41\x4c\40\x69\163\x20\141\x63\164\x69\166\x61\164\x65\144\56\x20\131\157\x75\x20\143\x61\x6e\x20\156\x6f\167\40\163\x65\164\165\160\x20\164\150\145\x20\x70\154\165\147\x69\156\x2e");
        $this->mo_saml_show_success_message();
        zl:
        goto Ep;
        EE:
        update_option("\x6d\x6f\137\163\141\x6d\x6c\x5f\x6d\145\163\x73\141\147\x65", "\x54\x68\145\162\x65\x20\x77\x61\163\x20\141\x6e\x20\145\x72\x72\157\x72\40\141\x63\x74\151\166\x61\x74\x69\156\147\40\x79\x6f\x75\162\40\124\x52\111\x41\x4c\x20\166\145\162\x73\151\157\156\56\40\x45\x69\x74\x68\145\162\x20\171\x6f\165\x72\40\x74\x72\151\141\154\40\x70\145\162\x69\x6f\x64\40\x69\x73\40\x65\170\x70\151\162\145\x64\x20\x6f\162\x20\171\157\165\40\141\x72\145\x20\165\163\151\x6e\147\x20\167\162\157\156\147\40\164\x72\151\141\154\40\166\x65\x72\x73\151\157\156\x2e\40\x50\x6c\145\x61\x73\x65\x20\143\x6f\x6e\x74\141\x63\x74\x20\x69\x6e\146\157\100\170\145\x63\x75\x72\151\146\x79\56\x63\157\155\40\146\x6f\162\40\x67\x65\x74\164\151\156\147\x20\x6e\x65\x77\x20\154\x69\x63\145\x6e\x73\x65\x20\146\157\162\40\164\x72\151\141\154\40\x76\x65\162\x73\151\x6f\156\x2e");
        $this->mo_saml_show_error_message();
        Ep:
        ud:
        goto LP;
        G0:
        if (!$this->mo_saml_check_empty_or_null($_POST["\163\x61\x6d\154\137\154\151\143\x65\x6e\x63\145\x5f\153\x65\x79"])) {
            goto MD;
        }
        update_option("\155\x6f\137\x73\141\155\154\x5f\155\x65\x73\163\141\147\145", "\x41\154\154\x20\164\x68\x65\40\x66\x69\x65\x6c\x64\163\40\x61\162\145\40\x72\145\161\x75\151\x72\145\x64\56\40\x50\154\x65\x61\x73\145\x20\145\x6e\164\x65\162\40\x76\141\x6c\x69\144\40\x6c\x69\143\145\x6e\163\x65\x20\x6b\x65\171\56");
        $this->mo_saml_show_error_message();
        return;
        MD:
        $fi = htmlspecialchars(trim($_POST["\x73\141\155\x6c\137\154\151\x63\x65\x6e\x63\145\137\x6b\x65\x79"]));
        $e7 = new Customersaml();
        $this->djkasjdksaduwaj($fi, $e7);
        LP:
        goto r8;
        Zt:
        if (mo_saml_is_extension_installed("\x63\165\x72\x6c")) {
            goto Ag;
        }
        update_option("\155\157\137\163\141\155\154\137\x6d\145\163\163\141\x67\145", "\x45\122\x52\117\x52\72\40\x50\x48\120\40\143\x55\122\114\40\145\170\x74\145\156\x73\x69\157\156\x20\151\163\x20\x6e\x6f\164\40\151\156\163\x74\141\x6c\154\145\144\x20\157\x72\x20\x64\x69\163\141\142\154\145\144\56\40\x52\145\x73\145\x6e\144\x20\x4f\x54\120\x20\146\141\x69\x6c\x65\144\x2e");
        $this->mo_saml_show_error_message();
        return;
        Ag:
        $OM = get_option("\155\157\137\163\x61\155\x6c\137\x61\144\155\151\156\x5f\145\x6d\x61\151\x6c");
        $e7 = new Customersaml();
        $nD = $e7->mo_saml_forgot_password($OM);
        if ($nD) {
            goto TT;
        }
        return;
        TT:
        $nD = json_decode($nD, true);
        if (strcasecmp($nD["\163\164\x61\x74\x75\163"], "\123\125\103\103\x45\x53\123") == 0) {
            goto XB;
        }
        update_option("\155\157\x5f\x73\141\x6d\x6c\x5f\155\145\163\163\141\x67\145", "\x41\x6e\x20\x65\x72\162\157\162\40\157\143\143\x75\162\x65\144\x20\167\150\x69\x6c\x65\40\160\x72\x6f\143\145\163\163\x69\x6e\147\40\x79\x6f\x75\162\40\162\x65\161\x75\145\x73\x74\x2e\x20\120\154\145\x61\163\x65\40\x54\162\x79\40\141\x67\141\151\156\x2e");
        $this->mo_saml_show_error_message();
        goto Qq;
        XB:
        update_option("\155\157\137\163\141\155\154\137\x6d\145\163\163\141\147\x65", "\x59\x6f\165\x72\40\160\x61\x73\163\x77\x6f\x72\x64\x20\150\141\x73\x20\x62\x65\x65\x6e\40\162\145\x73\x65\x74\40\x73\x75\x63\x63\145\x73\163\146\x75\154\154\171\x2e\x20\120\154\x65\x61\163\x65\40\x65\x6e\x74\145\162\40\164\150\145\x20\156\x65\167\40\160\x61\x73\163\x77\157\162\x64\x20\163\x65\156\x74\40\x74\157\x20" . $OM . "\56");
        $this->mo_saml_show_success_message();
        Qq:
        r8:
        goto TL;
        IO:
        $jC = '';
        $fd = '';
        $mF = '';
        $rP = '';
        $GL = '';
        $sU = '';
        $tz = '';
        $G3 = '';
        $j1 = '';
        $b9 = '';
        $U8 = "\141\142\157\x76\x65";
        if (!(array_key_exists("\x6d\157\137\163\x61\155\154\x5f\x62\x75\164\164\157\x6e\x5f\x73\151\x7a\x65", $_POST) && !empty($_POST["\x6d\x6f\x5f\x73\x61\x6d\x6c\137\142\x75\x74\164\x6f\x6e\x5f\x73\x69\172\145"]))) {
            goto lj;
        }
        $mF = htmlspecialchars($_POST["\155\x6f\x5f\163\141\x6d\x6c\137\x62\x75\x74\x74\x6f\x6e\137\163\151\172\145"]);
        lj:
        if (!(array_key_exists("\x6d\x6f\x5f\163\x61\x6d\x6c\x5f\x62\x75\x74\x74\x6f\156\137\x77\151\144\x74\x68", $_POST) && !empty($_POST["\x6d\157\137\x73\141\x6d\x6c\137\142\x75\x74\x74\157\x6e\137\167\x69\144\x74\x68"]))) {
            goto pm;
        }
        $rP = htmlspecialchars($_POST["\x6d\157\137\163\141\155\154\x5f\142\x75\x74\x74\x6f\x6e\137\167\151\x64\164\150"]);
        pm:
        if (!(array_key_exists("\x6d\x6f\137\x73\x61\155\x6c\137\142\165\x74\x74\157\x6e\x5f\150\145\151\x67\150\164", $_POST) && !empty($_POST["\155\157\137\x73\x61\155\x6c\137\x62\165\x74\164\x6f\156\137\x68\145\x69\x67\150\x74"]))) {
            goto Gf;
        }
        $GL = htmlspecialchars($_POST["\x6d\x6f\137\x73\x61\155\154\137\142\x75\x74\164\157\x6e\x5f\150\145\151\147\x68\x74"]);
        Gf:
        if (!(array_key_exists("\x6d\157\137\x73\x61\155\154\x5f\x62\165\x74\164\x6f\x6e\x5f\143\165\162\166\145", $_POST) && !empty($_POST["\x6d\157\137\x73\141\x6d\x6c\x5f\142\165\164\164\x6f\156\x5f\143\165\162\166\x65"]))) {
            goto Qk;
        }
        $sU = htmlspecialchars($_POST["\155\x6f\x5f\163\x61\155\154\x5f\x62\x75\164\x74\x6f\156\x5f\x63\165\162\166\x65"]);
        Qk:
        if (!array_key_exists("\x6d\x6f\137\163\141\x6d\154\137\x62\165\164\x74\157\156\x5f\x63\x6f\x6c\157\x72", $_POST)) {
            goto T4;
        }
        $tz = htmlspecialchars($_POST["\155\x6f\x5f\x73\141\155\x6c\x5f\142\x75\164\x74\x6f\x6e\137\143\157\154\157\162"]);
        T4:
        if (!array_key_exists("\x6d\x6f\x5f\163\141\155\154\137\142\x75\164\164\157\x6e\x5f\164\150\145\x6d\x65", $_POST)) {
            goto Rf;
        }
        $jC = htmlspecialchars($_POST["\155\157\x5f\163\141\x6d\154\x5f\142\165\164\x74\x6f\156\x5f\164\150\x65\x6d\x65"]);
        Rf:
        if (!array_key_exists("\155\157\x5f\x73\141\155\x6c\137\142\x75\x74\x74\157\156\x5f\164\x65\170\x74", $_POST)) {
            goto qL;
        }
        $G3 = htmlspecialchars($_POST["\155\157\137\x73\x61\155\x6c\x5f\142\x75\x74\x74\x6f\x6e\137\164\145\x78\164"]);
        if (!(empty($G3) || $G3 == "\114\x6f\x67\x69\x6e")) {
            goto wP;
        }
        $G3 = "\x4c\157\147\151\x6e";
        wP:
        $t8 = LicenseHelper::getCurrentOption(mo_options_enum_service_provider::Identity_name);
        $G3 = str_replace("\x23\x23\x49\104\x50\43\x23", $t8, $G3);
        qL:
        if (!array_key_exists("\155\157\137\163\141\155\154\x5f\x66\x6f\156\164\137\143\157\x6c\x6f\x72", $_POST)) {
            goto xe;
        }
        $j1 = htmlspecialchars($_POST["\x6d\157\x5f\163\141\155\154\137\146\x6f\x6e\x74\137\143\x6f\154\x6f\162"]);
        xe:
        if (!array_key_exists("\155\x6f\137\x73\141\x6d\154\x5f\146\157\x6e\x74\137\163\151\172\x65", $_POST)) {
            goto Ky;
        }
        $b9 = htmlspecialchars($_POST["\155\x6f\x5f\163\x61\155\154\x5f\146\x6f\156\x74\137\x73\151\172\145"]);
        Ky:
        if (!array_key_exists("\x73\163\x6f\137\142\165\164\164\x6f\x6e\x5f\x6c\157\147\151\156\x5f\146\x6f\x72\155\x5f\160\157\163\x69\x74\151\157\156", $_POST)) {
            goto iL;
        }
        $U8 = htmlspecialchars($_POST["\163\163\x6f\x5f\142\x75\164\x74\x6f\156\x5f\154\x6f\147\x69\156\x5f\146\157\x72\x6d\137\x70\157\x73\151\x74\x69\157\x6e"]);
        iL:
        update_option("\155\x6f\137\x73\141\x6d\x6c\x5f\x62\165\164\164\157\x6e\137\164\150\x65\155\145", $jC);
        update_option("\155\157\x5f\x73\141\155\x6c\137\x62\x75\164\164\157\156\137\163\x69\x7a\x65", $mF);
        update_option("\155\157\x5f\163\x61\x6d\x6c\137\x62\x75\x74\x74\157\x6e\137\167\x69\144\x74\150", $rP);
        update_option("\x6d\x6f\x5f\x73\141\x6d\154\137\x62\x75\x74\x74\x6f\156\137\150\x65\151\147\x68\164", $GL);
        update_option("\x6d\x6f\x5f\163\x61\155\x6c\x5f\142\165\164\164\x6f\x6e\x5f\143\x75\x72\x76\145", $sU);
        update_option("\155\x6f\x5f\163\x61\155\x6c\137\142\165\x74\x74\157\x6e\137\x63\x6f\154\157\x72", $tz);
        update_option("\155\x6f\x5f\163\141\x6d\x6c\137\x62\x75\164\164\x6f\x6e\x5f\x74\x65\170\x74", $G3);
        update_option("\155\x6f\137\163\x61\155\x6c\137\146\157\x6e\x74\x5f\143\157\154\157\162", $j1);
        update_option("\x6d\x6f\137\163\141\x6d\x6c\x5f\146\157\x6e\x74\x5f\163\151\172\145", $b9);
        update_option("\x73\163\x6f\x5f\x62\165\164\x74\157\x6e\137\x6c\157\x67\151\x6e\x5f\146\157\162\x6d\x5f\x70\157\x73\151\x74\151\157\x6e", $U8);
        update_option("\x6d\157\x5f\163\141\155\154\x5f\155\145\163\x73\x61\x67\145", "\x53\x69\x67\156\40\x49\x6e\40\x73\x65\164\x74\151\x6e\147\163\x20\x75\160\144\x61\164\x65\x64\x2e");
        $this->mo_saml_show_success_message();
        TL:
        goto hJ;
        Ix:
        $qN = "\146\141\x6c\163\145";
        if (array_key_exists("\155\157\137\x73\x61\x6d\x6c\x5f\x61\154\x6c\157\167\x5f\167\x70\137\x73\x69\147\x6e\151\x6e", $_POST)) {
            goto NY;
        }
        $Bb = "\x66\141\154\x73\x65";
        goto Zz;
        NY:
        $Bb = htmlspecialchars($_POST["\x6d\x6f\137\163\141\x6d\154\137\x61\x6c\154\157\167\x5f\x77\160\x5f\x73\x69\x67\x6e\151\156"]);
        Zz:
        if ($Bb == "\x74\162\x75\145") {
            goto bm;
        }
        update_option("\x6d\157\137\x73\x61\155\x6c\x5f\141\x6c\154\x6f\167\x5f\167\x70\137\163\x69\147\156\151\156", '');
        goto YC;
        bm:
        update_option("\155\x6f\x5f\x73\x61\155\154\x5f\x61\154\154\157\167\x5f\x77\160\137\x73\151\147\x6e\151\x6e", "\x74\x72\x75\x65");
        if (!array_key_exists("\155\157\137\x73\141\155\154\x5f\142\141\x63\153\x64\x6f\x6f\162\x5f\165\x72\x6c", $_POST)) {
            goto kg;
        }
        $qN = htmlspecialchars(trim($_POST["\x6d\157\x5f\x73\x61\155\154\137\142\141\x63\x6b\144\x6f\x6f\162\137\x75\x72\x6c"]));
        kg:
        YC:
        update_option("\155\x6f\x5f\x73\141\x6d\154\137\142\x61\143\153\144\x6f\x6f\x72\137\x75\x72\154", $qN);
        update_option("\155\157\x5f\x73\141\155\154\x5f\155\145\163\x73\141\x67\145", "\x53\x69\147\156\40\111\156\40\163\145\164\x74\151\156\147\163\x20\165\x70\144\141\x74\145\x64\56");
        $this->mo_saml_show_success_message();
        hJ:
        goto w2;
        u2:
        if (mo_saml_is_sp_configured()) {
            goto bz;
        }
        update_option("\155\157\137\x73\x61\x6d\154\x5f\x6d\145\x73\163\141\147\145", "\x50\154\x65\141\163\145\x20\x63\x6f\x6d\x70\x6c\145\164\x65\x20" . addLink("\x53\x65\162\166\x69\x63\x65\x20\120\x72\157\x76\151\144\145\162", add_query_arg(array("\164\141\142" => "\x73\x61\x76\145"), $_SERVER["\122\105\121\125\105\x53\124\137\x55\122\111"])) . "\x20\143\x6f\x6e\x66\x69\147\x75\x72\x61\164\x69\x6f\x6e\x20\x66\x69\x72\x73\x74\x2e");
        $this->mo_saml_show_error_message();
        goto ii;
        bz:
        if (array_key_exists("\x6d\x6f\x5f\163\x61\x6d\154\137\165\x73\x65\x5f\142\165\164\164\x6f\x6e\137\141\163\137\x77\151\144\147\x65\x74", $_POST)) {
            goto ur;
        }
        $DF = "\x66\141\154\x73\145";
        goto ca;
        ur:
        $DF = htmlspecialchars($_POST["\155\157\137\x73\x61\x6d\x6c\x5f\x75\163\145\x5f\142\x75\164\x74\157\156\x5f\141\x73\x5f\x77\x69\144\147\x65\164"]);
        ca:
        update_option("\x6d\x6f\137\163\141\155\154\x5f\x75\163\145\x5f\x62\x75\164\164\x6f\x6e\137\x61\x73\x5f\x77\151\144\147\145\164", $DF);
        update_option("\155\x6f\x5f\163\x61\155\154\137\155\145\x73\163\141\147\x65", "\x53\x69\147\156\40\151\156\x20\x6f\x70\x74\x69\157\x6e\x73\40\x75\160\x64\x61\x74\145\x64\x2e");
        $this->mo_saml_show_success_message();
        ii:
        w2:
        goto Po;
        Vh:
        if (mo_saml_is_sp_configured()) {
            goto c2;
        }
        update_option("\x6d\157\137\163\141\155\x6c\137\155\x65\163\163\141\147\145", "\120\x6c\x65\x61\163\x65\x20\x63\157\155\160\154\145\164\x65\40" . addLink("\123\x65\x72\166\151\x63\145\x20\120\x72\x6f\x76\151\x64\x65\162", add_query_arg(array("\x74\x61\142" => "\163\141\x76\x65"), $_SERVER["\x52\105\x51\125\105\123\x54\x5f\125\122\x49"])) . "\x20\143\157\x6e\x66\x69\147\x75\x72\x61\x74\151\x6f\156\40\146\151\x72\163\164\x2e");
        $this->mo_saml_show_error_message();
        goto iT;
        c2:
        if (array_key_exists("\155\157\137\163\141\x6d\154\x5f\x75\163\145\137\x62\165\x74\x74\x6f\156\137\141\163\x5f\163\x68\x6f\x72\x74\143\x6f\x64\145", $_POST)) {
            goto ub;
        }
        $DF = "\x66\x61\x6c\163\145";
        goto BI;
        ub:
        $DF = htmlspecialchars($_POST["\155\x6f\x5f\163\x61\155\x6c\x5f\x75\x73\145\137\x62\x75\x74\164\x6f\x6e\x5f\141\x73\x5f\x73\150\157\162\x74\143\x6f\x64\x65"]);
        BI:
        update_option("\155\157\137\163\141\x6d\154\x5f\x75\x73\145\x5f\142\165\x74\164\157\x6e\x5f\x61\163\137\x73\x68\x6f\162\164\x63\x6f\x64\x65", $DF);
        update_option("\155\x6f\137\x73\x61\155\x6c\x5f\155\145\163\x73\x61\147\145", "\x53\151\147\156\x20\x69\x6e\40\157\160\164\x69\x6f\x6e\x73\40\x75\160\144\x61\x74\145\x64\56");
        $this->mo_saml_show_success_message();
        iT:
        Po:
        goto gQ;
        Ww:
        if (mo_saml_is_sp_configured()) {
            goto dJ;
        }
        update_option("\155\x6f\137\x73\x61\155\x6c\137\155\x65\163\163\141\x67\145", "\x50\x6c\145\141\x73\145\40\x63\157\x6d\160\154\x65\164\x65\x20" . addLink("\123\x65\x72\x76\151\x63\x65\x20\x50\x72\x6f\x76\x69\x64\145\162", add_query_arg(array("\164\141\x62" => "\163\141\166\x65"), $_SERVER["\x52\105\121\125\x45\x53\x54\x5f\x55\x52\111"])) . "\40\x63\x6f\156\146\151\147\165\x72\x61\164\x69\x6f\x6e\40\146\151\162\x73\164\56");
        $this->mo_saml_show_error_message();
        goto ik;
        dJ:
        if (array_key_exists("\x6d\157\137\x73\141\x6d\154\x5f\x61\x64\144\x5f\x73\163\157\x5f\x62\165\164\164\x6f\x6e\x5f\x77\160", $_POST)) {
            goto L_;
        }
        $qU = "\x66\141\154\163\145";
        goto Xa;
        L_:
        $qU = htmlspecialchars($_POST["\x6d\157\137\163\141\x6d\x6c\137\x61\144\x64\137\x73\x73\157\137\x62\x75\x74\x74\x6f\156\137\x77\160"]);
        Xa:
        update_option("\155\157\137\x73\x61\x6d\154\137\141\144\144\137\163\x73\157\x5f\142\165\x74\x74\157\x6e\x5f\167\x70", $qU);
        update_option("\x6d\x6f\137\x73\x61\x6d\x6c\x5f\155\x65\x73\x73\x61\x67\145", "\123\151\147\156\40\151\x6e\40\157\160\x74\x69\x6f\156\163\40\165\160\x64\x61\x74\x65\144\x2e");
        $this->mo_saml_show_success_message();
        ik:
        gQ:
        goto Tk;
        lc:
        if (mo_saml_is_sp_configured()) {
            goto PA;
        }
        update_option("\x6d\157\x5f\163\141\155\x6c\x5f\155\145\163\163\x61\147\145", "\120\154\x65\141\163\x65\40\x63\157\x6d\x70\154\145\164\x65\x20" . addLink("\123\145\x72\166\151\143\145\40\x50\162\157\166\x69\x64\x65\x72", add_query_arg(array("\164\x61\142" => "\163\141\166\145"), $_SERVER["\x52\105\x51\x55\x45\x53\x54\137\x55\122\x49"])) . "\x20\143\x6f\x6e\146\x69\147\165\162\x61\164\x69\157\x6e\40\x66\x69\162\163\164\56");
        $this->mo_saml_show_error_message();
        goto Hd;
        PA:
        if (array_key_exists("\155\157\x5f\x73\x61\155\154\x5f\x65\x6e\x61\x62\154\145\137\154\157\x67\x69\156\137\x72\x65\144\x69\x72\145\143\164", $_POST)) {
            goto bw;
        }
        $cW = "\146\x61\x6c\x73\x65";
        goto jx;
        bw:
        $cW = htmlspecialchars($_POST["\155\157\137\x73\x61\155\x6c\137\145\156\141\142\154\145\137\x6c\x6f\147\151\x6e\x5f\162\x65\x64\151\x72\145\143\x74"]);
        jx:
        if ($cW == "\164\x72\165\145") {
            goto DH;
        }
        update_option("\x6d\157\x5f\163\141\x6d\x6c\137\145\156\x61\142\x6c\x65\x5f\x6c\x6f\x67\x69\156\137\162\145\144\x69\162\x65\143\164", '');
        update_option("\x6d\157\137\x73\x61\155\x6c\137\141\x6c\154\x6f\167\x5f\167\160\137\x73\151\147\x6e\x69\x6e", '');
        goto xP;
        DH:
        update_option("\x6d\x6f\x5f\163\x61\x6d\154\137\x65\156\x61\x62\x6c\145\x5f\154\x6f\147\x69\x6e\137\162\x65\144\x69\162\145\x63\164", "\164\162\165\x65");
        update_option("\x6d\157\137\163\x61\x6d\x6c\137\141\154\x6c\x6f\167\x5f\167\160\x5f\x73\x69\147\x6e\x69\x6e", "\164\x72\x75\x65");
        xP:
        update_option("\x6d\157\137\x73\x61\x6d\x6c\137\x6d\x65\x73\163\141\x67\x65", "\x53\x69\x67\156\x20\x69\156\40\x6f\x70\164\x69\157\x6e\163\x20\x75\160\144\x61\164\145\x64\56");
        $this->mo_saml_show_success_message();
        Hd:
        Tk:
        goto tb;
        OY:
        if (mo_saml_is_sp_configured()) {
            goto Vm;
        }
        update_option("\x6d\157\137\x73\x61\x6d\154\137\x6d\145\163\x73\x61\x67\145", "\x50\x6c\x65\141\163\145\x20\x63\x6f\155\160\x6c\145\x74\x65\x20" . addLink("\x53\145\162\166\151\x63\145\x20\x50\x72\x6f\166\151\x64\145\x72", add_query_arg(array("\164\141\x62" => "\x73\141\x76\145"), $_SERVER["\122\105\x51\125\105\x53\x54\x5f\125\x52\111"])) . "\x20\x63\157\x6e\146\151\147\165\162\141\x74\151\x6f\x6e\40\x66\151\162\163\164\56");
        $this->mo_saml_show_error_message();
        goto he;
        Vm:
        if (array_key_exists("\155\x6f\x5f\163\141\155\154\x5f\145\156\141\x62\154\145\137\x72\163\163\x5f\141\x63\143\x65\163\163", $_POST)) {
            goto Uh;
        }
        $he = false;
        goto UV;
        Uh:
        $he = htmlspecialchars($_POST["\155\x6f\137\x73\141\155\x6c\x5f\145\x6e\141\142\154\145\x5f\162\x73\x73\137\141\143\143\x65\163\x73"]);
        UV:
        if ($he == "\164\162\x75\x65") {
            goto Yo;
        }
        update_option("\x6d\157\137\163\141\155\154\x5f\145\x6e\141\142\154\145\x5f\162\163\x73\x5f\141\143\143\x65\x73\x73", '');
        goto tc;
        Yo:
        update_option("\155\157\137\x73\x61\155\x6c\x5f\x65\x6e\x61\142\x6c\x65\x5f\x72\x73\x73\137\x61\143\143\145\x73\x73", "\x74\x72\x75\145");
        tc:
        update_option("\155\x6f\x5f\163\x61\155\x6c\137\155\145\x73\163\x61\147\x65", "\122\x53\123\x20\x46\145\x65\x64\40\157\x70\164\151\x6f\x6e\x20\x75\x70\x64\x61\x74\x65\144\x2e");
        $this->mo_saml_show_success_message();
        he:
        tb:
        goto Ow;
        Kv:
        if (mo_saml_is_sp_configured()) {
            goto K5;
        }
        update_option("\155\157\x5f\163\x61\x6d\154\x5f\155\x65\x73\x73\141\x67\145", "\120\154\145\x61\x73\x65\x20\143\157\x6d\160\154\x65\x74\x65\40" . addLink("\123\145\x72\x76\151\x63\x65\40\120\162\x6f\166\x69\x64\145\x72", add_query_arg(array("\164\141\142" => "\163\x61\166\x65"), $_SERVER["\122\x45\x51\125\105\123\124\137\x55\x52\x49"])) . "\x20\x63\157\x6e\x66\151\147\165\162\x61\164\x69\x6f\156\x20\x66\x69\162\163\x74\x2e");
        $this->mo_saml_show_error_message();
        goto qS;
        K5:
        if (array_key_exists("\155\157\x5f\x73\141\x6d\x6c\x5f\146\x6f\x72\x63\145\137\141\165\x74\150\x65\x6e\164\x69\143\141\x74\x69\x6f\156", $_POST)) {
            goto UZ;
        }
        $cW = "\x66\x61\154\163\x65";
        goto xi;
        UZ:
        $cW = htmlspecialchars($_POST["\155\157\137\x73\141\155\x6c\137\x66\x6f\162\143\x65\137\141\165\x74\x68\x65\156\164\x69\143\x61\164\x69\x6f\x6e"]);
        xi:
        if ($cW == "\164\x72\x75\145") {
            goto PB;
        }
        update_option("\155\x6f\x5f\163\141\155\154\x5f\x66\x6f\x72\143\145\137\x61\165\x74\150\x65\x6e\x74\151\143\141\x74\x69\157\x6e", '');
        goto lp;
        PB:
        update_option("\155\x6f\137\163\141\155\154\x5f\x66\157\162\x63\x65\137\141\x75\164\x68\x65\156\164\151\x63\141\164\x69\x6f\156", "\164\x72\165\x65");
        lp:
        update_option("\x6d\x6f\x5f\163\141\155\154\137\155\x65\x73\163\141\147\x65", "\x53\x69\147\156\40\x69\156\40\157\x70\164\151\157\156\x73\40\x75\x70\x64\x61\164\145\x64\x2e");
        $this->mo_saml_show_success_message();
        qS:
        Ow:
        goto qo;
        jM:
        if (!mo_saml_is_sp_configured()) {
            goto AY;
        }
        if (array_key_exists("\x6d\157\x5f\163\x61\x6d\154\x5f\x72\x65\x64\151\162\145\x63\164\x5f\x74\x6f\137\x77\x70\137\154\x6f\147\x69\x6e", $_POST)) {
            goto r6;
        }
        $XJ = "\x66\x61\x6c\x73\145";
        goto jv;
        r6:
        $XJ = htmlspecialchars($_POST["\x6d\157\x5f\x73\141\155\154\x5f\x72\145\x64\151\162\x65\143\x74\137\164\x6f\x5f\x77\160\137\x6c\157\x67\x69\156"]);
        jv:
        update_option("\155\157\x5f\163\141\x6d\x6c\x5f\162\x65\x64\x69\x72\145\x63\x74\137\164\157\x5f\167\x70\x5f\x6c\x6f\x67\151\x6e", $XJ);
        update_option("\155\x6f\137\163\141\155\x6c\137\155\x65\x73\x73\141\147\145", "\123\x69\147\x6e\x20\151\156\x20\157\160\164\x69\x6f\x6e\x73\40\165\x70\x64\x61\x74\145\x64\56");
        $this->mo_saml_show_success_message();
        AY:
        qo:
        goto TZ;
        oG:
        if (mo_saml_is_sp_configured()) {
            goto xm;
        }
        update_option("\155\x6f\137\163\141\155\154\137\155\x65\x73\163\x61\147\145", "\120\154\x65\141\163\x65\40\x63\x6f\x6d\x70\154\145\164\x65\x20" . addLink("\x53\145\x72\166\x69\143\x65\x20\x50\162\157\x76\151\x64\145\162", add_query_arg(array("\164\x61\142" => "\x73\x61\166\145"), $_SERVER["\x52\x45\121\x55\x45\x53\124\137\125\x52\x49"])) . "\40\x63\157\x6e\146\x69\147\165\x72\141\164\x69\157\x6e\x20\x66\x69\x72\x73\x74\x2e");
        $this->mo_saml_show_error_message();
        goto hF;
        xm:
        if (array_key_exists("\155\157\x5f\x73\x61\155\154\x5f\162\145\147\x69\x73\x74\x65\162\x65\144\137\x6f\156\x6c\x79\137\141\x63\143\145\163\163", $_POST)) {
            goto th;
        }
        $cW = "\146\x61\154\x73\x65";
        goto ye;
        th:
        $cW = htmlspecialchars($_POST["\155\157\137\x73\141\155\154\x5f\162\145\x67\x69\x73\164\145\162\145\x64\137\157\x6e\x6c\171\137\141\143\x63\145\x73\x73"]);
        ye:
        if ($cW == "\x74\162\165\145") {
            goto Ay;
        }
        update_option("\155\157\137\163\x61\155\x6c\137\x72\x65\x67\x69\x73\164\145\162\145\144\x5f\x6f\156\154\x79\x5f\141\143\143\145\163\x73", '');
        goto wq;
        Ay:
        update_option("\155\157\x5f\163\141\155\154\137\162\x65\x67\151\x73\164\x65\x72\145\x64\137\x6f\156\154\171\x5f\x61\x63\143\145\163\x73", "\x74\162\165\x65");
        wq:
        update_option("\x6d\157\x5f\163\x61\x6d\x6c\x5f\x6d\x65\163\163\x61\x67\145", "\123\151\147\156\x20\151\156\40\157\160\x74\x69\x6f\156\163\x20\x75\160\144\x61\x74\145\144\x2e");
        $this->mo_saml_show_success_message();
        hF:
        TZ:
        goto Mj;
        DK:
        if (mo_saml_is_extension_installed("\x63\165\x72\x6c")) {
            goto Yj;
        }
        update_option("\155\x6f\x5f\163\141\x6d\154\137\155\x65\x73\163\141\x67\x65", "\105\x52\x52\x4f\x52\x3a\x20\x50\x48\x50\40\x63\125\x52\114\40\x65\x78\x74\x65\156\163\151\157\x6e\40\151\x73\x20\156\157\164\x20\x69\156\x73\164\141\154\154\x65\144\40\x6f\162\x20\144\151\x73\x61\x62\154\x65\144\x2e\40\122\x65\163\145\x6e\144\40\117\124\120\40\146\x61\x69\x6c\x65\144\x2e");
        $this->mo_saml_show_error_message();
        return;
        Yj:
        $d3 = htmlspecialchars($_POST["\x70\150\157\x6e\145"]);
        $d3 = str_replace("\40", '', $d3);
        $d3 = str_replace("\x2d", '', $d3);
        update_option("\x6d\157\137\163\x61\155\154\137\x61\x64\x6d\x69\156\137\x70\150\157\156\x65", $d3);
        $e7 = new CustomerSaml();
        $nD = $e7->send_otp_token('', $d3, FALSE, TRUE);
        if ($nD) {
            goto gV;
        }
        return;
        gV:
        $nD = json_decode($nD, true);
        if (strcasecmp($nD["\163\164\x61\164\165\x73"], "\123\125\x43\103\105\x53\x53") == 0) {
            goto Im;
        }
        update_option("\x6d\157\x5f\x73\141\x6d\154\137\x6d\145\163\163\x61\x67\145", "\124\x68\145\x72\x65\x20\167\x61\x73\40\x61\x6e\x20\x65\x72\x72\157\162\40\151\x6e\x20\163\145\156\x64\151\156\147\40\x53\115\x53\x2e\x20\x50\x6c\145\x61\163\x65\x20\x63\x6c\x69\143\153\40\x6f\156\x20\x52\145\163\145\x6e\x64\40\x4f\124\120\40\164\157\40\x74\162\x79\40\141\x67\x61\151\156\x2e");
        update_option("\155\x6f\x5f\x73\x61\155\154\x5f\x72\145\147\x69\x73\164\162\x61\x74\151\157\x6e\x5f\x73\164\x61\164\x75\163", "\x4d\x4f\137\x4f\124\120\137\104\105\x4c\111\126\105\x52\105\104\137\x46\101\x49\x4c\125\122\105\x5f\120\x48\117\x4e\x45");
        $this->mo_saml_show_error_message();
        goto Tz;
        Im:
        update_option("\x6d\x6f\137\x73\141\x6d\154\x5f\x6d\145\163\x73\141\x67\x65", "\40\101\40\157\x6e\x65\40\164\x69\x6d\x65\x20\x70\141\x73\163\143\157\x64\x65\40\151\x73\x20\163\x65\x6e\164\40\164\x6f\40" . get_option("\x6d\157\137\x73\141\x6d\x6c\x5f\141\x64\x6d\x69\156\137\x70\x68\x6f\156\145") . "\x2e\40\120\x6c\145\141\x73\145\x20\x65\x6e\164\145\162\x20\164\x68\x65\40\x6f\x74\160\40\x68\145\162\145\40\164\157\x20\x76\145\162\x69\146\171\x20\171\157\165\162\40\x65\x6d\141\151\154\56");
        update_option("\x6d\157\137\163\141\155\154\137\x74\162\x61\x6e\x73\x61\x63\164\151\157\x6e\111\x64", $nD["\164\170\111\x64"]);
        update_option("\155\x6f\x5f\x73\x61\x6d\154\137\x72\145\x67\x69\163\164\162\x61\x74\151\157\x6e\137\x73\164\x61\x74\165\163", "\115\x4f\137\117\x54\x50\x5f\x44\105\114\111\126\x45\122\105\x44\137\123\125\103\x43\x45\123\x53\137\x50\110\117\x4e\x45");
        $this->mo_saml_show_success_message();
        Tz:
        Mj:
        goto RP;
        aX:
        update_option("\155\x6f\x5f\x73\141\x6d\x6c\137\162\x65\147\x69\163\164\162\141\164\151\157\x6e\137\x73\164\x61\164\x75\163", '');
        update_option("\x6d\157\137\x73\141\155\154\x5f\166\x65\x72\x69\x66\x79\137\143\x75\x73\x74\x6f\x6d\145\162", '');
        delete_option("\155\157\137\163\x61\x6d\154\137\x6e\x65\x77\x5f\x72\x65\x67\151\x73\x74\x72\141\x74\x69\157\x6e");
        delete_option("\x6d\x6f\x5f\163\141\x6d\154\x5f\141\144\155\x69\156\137\x65\x6d\x61\x69\x6c");
        delete_option("\x6d\157\x5f\x73\x61\x6d\154\137\x61\x64\155\x69\156\x5f\160\x68\157\x6e\145");
        delete_site_option("\163\x6d\154\137\x6c\153");
        delete_site_option("\164\x5f\163\151\x74\x65\137\x73\x74\141\x74\x75\163");
        delete_site_option("\163\151\164\145\137\x63\x6b\x5f\154");
        RP:
        goto JJ;
        fF:
        if (mo_saml_is_extension_installed("\143\x75\x72\x6c")) {
            goto dC;
        }
        update_option("\155\157\x5f\163\141\x6d\154\x5f\155\x65\163\x73\x61\x67\145", "\x45\122\x52\117\122\72\x20\120\x48\x50\x20\x63\125\x52\x4c\40\x65\170\x74\145\156\x73\x69\157\156\x20\x69\163\x20\156\x6f\x74\x20\151\156\x73\x74\x61\154\x6c\x65\x64\x20\x6f\162\x20\144\151\x73\141\x62\x6c\145\144\56\40\122\x65\163\145\156\x64\x20\x4f\124\x50\40\146\141\x69\154\x65\144\56");
        $this->mo_saml_show_error_message();
        return;
        dC:
        $d3 = get_option("\x6d\157\x5f\163\x61\155\x6c\x5f\x61\x64\x6d\151\x6e\137\x70\150\157\x6e\x65");
        $e7 = new CustomerSaml();
        $nD = $e7->send_otp_token('', $d3, FALSE, TRUE);
        if ($nD) {
            goto zp;
        }
        return;
        zp:
        $nD = json_decode($nD, true);
        if (strcasecmp($nD["\163\x74\x61\164\x75\x73"], "\123\125\x43\x43\x45\123\x53") == 0) {
            goto Wq;
        }
        update_option("\155\157\x5f\x73\x61\155\x6c\137\155\x65\163\x73\141\147\x65", "\x54\150\x65\162\x65\x20\167\x61\163\40\x61\156\40\x65\x72\162\x6f\x72\40\151\156\40\163\x65\156\144\151\156\x67\40\x65\x6d\141\151\x6c\56\x20\120\154\x65\x61\163\145\40\x63\154\151\x63\x6b\40\x6f\156\x20\122\x65\163\145\x6e\144\x20\117\x54\x50\40\164\x6f\x20\x74\x72\171\x20\x61\147\x61\x69\x6e\x2e");
        update_option("\x6d\157\137\x73\x61\x6d\154\x5f\x72\145\147\x69\163\x74\162\141\x74\x69\x6f\x6e\x5f\163\x74\141\164\x75\163", "\x4d\x4f\x5f\117\x54\120\137\x44\105\114\111\x56\x45\122\105\x44\137\x46\x41\x49\114\x55\x52\105\x5f\120\x48\117\x4e\105");
        $this->mo_saml_show_error_message();
        goto KN;
        Wq:
        update_option("\x6d\x6f\137\163\141\155\154\x5f\155\145\163\163\141\x67\x65", "\40\x41\40\157\156\x65\40\164\x69\155\x65\x20\x70\141\163\x73\143\x6f\144\x65\x20\151\x73\40\x73\x65\x6e\x74\x20\164\157\40" . $d3 . "\40\x61\147\x61\x69\156\56\40\x50\154\x65\141\x73\x65\x20\143\x68\x65\143\153\x20\151\x66\x20\x79\x6f\165\x20\x67\x6f\x74\40\x74\x68\145\x20\157\164\160\x20\141\x6e\x64\x20\x65\x6e\164\x65\162\x20\151\x74\40\x68\145\x72\145\x2e");
        update_option("\x6d\x6f\x5f\163\x61\155\x6c\x5f\164\x72\141\156\x73\x61\143\164\151\157\x6e\111\x64", $nD["\x74\170\x49\144"]);
        update_option("\x6d\x6f\x5f\x73\x61\155\x6c\x5f\162\x65\147\x69\x73\x74\162\x61\x74\x69\x6f\156\137\x73\164\141\164\165\163", "\x4d\117\137\117\x54\x50\x5f\x44\x45\x4c\111\126\x45\122\105\104\x5f\x53\x55\103\x43\105\x53\x53\x5f\x50\110\x4f\x4e\x45");
        $this->mo_saml_show_success_message();
        KN:
        JJ:
        goto GI;
        ky:
        if (mo_saml_is_extension_installed("\143\x75\x72\154")) {
            goto P1;
        }
        update_option("\155\x6f\137\163\x61\x6d\154\x5f\x6d\x65\163\x73\x61\147\145", "\x45\x52\122\x4f\122\72\x20\120\x48\120\40\x63\125\122\x4c\x20\145\x78\x74\x65\156\163\151\157\156\x20\151\163\40\156\157\164\x20\151\156\163\x74\141\x6c\x6c\x65\x64\40\x6f\162\x20\x64\x69\163\141\142\x6c\145\x64\56\40\122\145\x73\145\x6e\x64\x20\x4f\x54\120\40\x66\141\x69\154\145\144\56");
        $this->mo_saml_show_error_message();
        return;
        P1:
        $OM = get_option("\x6d\157\137\x73\x61\x6d\x6c\x5f\x61\x64\x6d\151\156\137\145\155\x61\x69\x6c");
        $e7 = new CustomerSaml();
        $nD = $e7->send_otp_token($OM, '');
        if ($nD) {
            goto j7;
        }
        return;
        j7:
        $nD = json_decode($nD, true);
        if (strcasecmp($nD["\163\164\x61\x74\165\163"], "\123\125\x43\103\105\123\x53") == 0) {
            goto CW;
        }
        update_option("\x6d\157\x5f\163\141\x6d\154\x5f\155\145\x73\163\141\147\x65", "\x54\150\145\162\145\40\x77\141\x73\x20\x61\156\40\145\x72\x72\x6f\x72\40\151\x6e\40\163\x65\x6e\x64\x69\x6e\147\x20\x65\155\141\151\x6c\x2e\40\120\x6c\x65\x61\x73\145\40\x63\154\151\143\153\x20\x6f\x6e\40\x52\145\163\145\x6e\144\x20\x4f\x54\120\x20\164\x6f\x20\x74\x72\171\40\141\x67\x61\151\156\56");
        update_option("\155\x6f\137\x73\x61\155\x6c\x5f\162\145\x67\x69\163\164\162\141\x74\151\157\156\x5f\x73\x74\x61\x74\165\x73", "\x4d\x4f\x5f\x4f\124\120\137\104\105\x4c\111\126\x45\x52\105\104\137\x46\x41\111\x4c\125\122\105\137\105\x4d\x41\111\x4c");
        $this->mo_saml_show_error_message();
        goto xV;
        CW:
        update_option("\155\157\137\163\x61\155\x6c\x5f\155\x65\x73\x73\141\147\145", "\40\101\x20\157\156\x65\40\164\x69\x6d\145\x20\160\141\x73\x73\x63\x6f\144\x65\40\151\163\x20\163\x65\156\164\40\164\157\x20" . get_option("\x6d\157\x5f\x73\x61\155\154\x5f\x61\x64\155\x69\x6e\x5f\x65\155\x61\151\x6c") . "\x20\x61\x67\x61\151\156\x2e\x20\120\x6c\x65\x61\x73\145\40\x63\x68\145\143\x6b\x20\151\x66\40\x79\157\x75\x20\147\x6f\164\x20\164\150\145\40\x6f\164\160\40\141\156\x64\40\x65\156\164\x65\162\40\x69\164\40\x68\145\162\x65\x2e");
        update_option("\x6d\x6f\x5f\x73\141\x6d\154\x5f\164\x72\x61\x6e\x73\141\x63\164\x69\x6f\x6e\x49\144", $nD["\164\170\x49\144"]);
        update_option("\155\x6f\137\x73\x61\155\154\137\162\145\147\x69\x73\164\162\141\164\x69\x6f\x6e\x5f\x73\x74\x61\x74\x75\163", "\x4d\x4f\x5f\x4f\124\120\137\104\105\x4c\111\126\105\x52\x45\104\137\123\125\x43\103\x45\123\x53\x5f\105\115\x41\111\x4c");
        $this->mo_saml_show_success_message();
        xV:
        GI:
        goto rI;
        QI:
        if (mo_saml_is_extension_installed("\x63\165\162\154")) {
            goto mx;
        }
        update_option("\155\x6f\x5f\x73\141\x6d\x6c\x5f\x6d\145\163\x73\x61\147\x65", "\x45\x52\x52\117\122\72\40\120\x48\120\x20\x63\x55\x52\x4c\40\x65\x78\x74\145\x6e\163\151\x6f\156\40\151\x73\40\156\157\164\40\x69\x6e\x73\164\141\x6c\x6c\x65\x64\x20\157\x72\40\144\151\163\x61\x62\x6c\x65\x64\56\40\121\165\x65\162\171\40\x73\165\142\x6d\x69\164\x20\x66\x61\151\x6c\145\x64\x2e");
        $this->mo_saml_show_error_message();
        return;
        mx:
        $OM = sanitize_email($_POST["\x6d\157\x5f\163\141\x6d\x6c\x5f\143\157\156\x74\x61\x63\164\137\x75\x73\137\145\x6d\141\151\154"]);
        $d3 = htmlspecialchars($_POST["\x6d\x6f\137\x73\141\155\x6c\x5f\x63\x6f\156\164\141\143\164\137\165\x73\x5f\160\150\157\156\145"]);
        $xK = htmlspecialchars($_POST["\155\157\137\163\141\x6d\x6c\137\x63\157\x6e\x74\x61\143\x74\x5f\x75\163\x5f\161\x75\x65\162\x79"]);
        if (array_key_exists("\x73\145\156\144\137\x70\154\165\147\151\156\x5f\x63\x6f\156\146\151\x67", $_POST) === true) {
            goto C0;
        }
        update_option("\x73\x65\156\x64\137\160\154\165\x67\x69\156\x5f\143\x6f\x6e\x66\151\x67", "\157\x66\146");
        goto k5;
        C0:
        $vC = miniorange_import_export(true, true);
        $xK .= $vC;
        delete_option("\163\145\x6e\144\137\160\x6c\165\147\x69\x6e\x5f\143\x6f\x6e\x66\151\147");
        k5:
        $e7 = new CustomerSaml();
        if ($this->mo_saml_check_empty_or_null($OM) || $this->mo_saml_check_empty_or_null($xK)) {
            goto J7;
        }
        if (!filter_var($OM, FILTER_VALIDATE_EMAIL)) {
            goto x8;
        }
        $Om = $e7->submit_contact_us($OM, $d3, $xK);
        if ($Om) {
            goto sT;
        }
        return;
        sT:
        update_option("\155\157\x5f\x73\x61\x6d\x6c\x5f\155\145\x73\163\x61\x67\x65", "\124\x68\141\x6e\153\x73\40\x66\x6f\162\40\x67\x65\164\164\151\156\x67\x20\151\x6e\x20\164\157\165\143\x68\x21\40\127\145\40\163\x68\141\154\154\x20\x67\x65\164\40\142\x61\x63\x6b\x20\164\x6f\40\x79\157\x75\40\x73\x68\x6f\162\x74\154\171\56");
        $this->mo_saml_show_success_message();
        goto Js;
        x8:
        update_option("\x6d\157\137\163\x61\x6d\x6c\137\x6d\145\163\163\141\x67\145", "\120\x6c\145\x61\x73\145\40\x65\156\x74\145\x72\x20\141\40\166\x61\x6c\x69\144\40\x65\x6d\141\151\154\x20\141\x64\144\x72\145\163\x73\x2e");
        $this->mo_saml_show_error_message();
        return;
        Js:
        goto hV;
        J7:
        update_option("\x6d\x6f\x5f\163\x61\155\x6c\137\x6d\x65\163\163\141\147\x65", "\x50\x6c\145\x61\x73\x65\x20\x66\151\x6c\x6c\x20\165\160\x20\x45\x6d\x61\x69\x6c\x20\x61\x6e\144\x20\121\x75\x65\162\x79\x20\146\151\x65\154\x64\x73\x20\164\x6f\40\163\x75\x62\155\151\164\x20\171\157\x75\162\x20\x71\x75\145\162\171\x2e");
        $this->mo_saml_show_error_message();
        hV:
        rI:
        goto KX;
        j0:
        if (mo_saml_is_extension_installed("\143\x75\162\154")) {
            goto eW;
        }
        update_option("\x6d\157\137\163\141\x6d\x6c\137\x6d\x65\163\163\x61\x67\145", "\x45\x52\x52\117\x52\72\40\x50\x48\x50\40\x63\x55\x52\x4c\x20\145\x78\164\x65\x6e\163\151\x6f\156\40\x69\x73\x20\x6e\157\164\40\x69\x6e\163\x74\141\x6c\154\145\144\x20\x6f\162\40\144\x69\163\x61\x62\x6c\x65\x64\56\x20\114\157\x67\x69\156\x20\x66\x61\x69\x6c\x65\x64\x2e");
        $this->mo_saml_show_error_message();
        return;
        eW:
        $OM = '';
        $vJ = self::get_empty_strings();
        if ($this->mo_saml_check_empty_or_null($_POST["\x65\155\141\151\x6c"]) || $this->mo_saml_check_empty_or_null($_POST["\x70\x61\x73\163\x77\157\162\144"])) {
            goto VT;
        }
        if ($this->checkPasswordPattern(strip_tags($_POST["\x70\141\x73\163\x77\x6f\162\x64"]))) {
            goto Nt;
        }
        $OM = sanitize_email($_POST["\x65\x6d\141\151\154"]);
        $vJ = stripslashes(strip_tags($_POST["\x70\141\163\x73\167\157\x72\144"]));
        goto fm;
        Nt:
        update_option("\x6d\157\x5f\163\141\155\154\x5f\155\145\x73\x73\x61\x67\x65", "\x4d\x69\x6e\x69\x6d\x75\155\x20\x36\40\143\150\x61\162\x61\143\164\x65\162\163\40\163\150\157\x75\x6c\144\40\x62\x65\x20\160\x72\145\163\145\x6e\x74\56\x20\115\141\x78\151\x6d\x75\155\40\x31\x35\40\x63\x68\141\162\x61\x63\x74\145\x72\163\x20\x73\150\x6f\x75\154\x64\40\142\145\40\160\x72\x65\x73\145\156\164\x2e\x20\117\x6e\154\x79\x20\x66\x6f\154\154\157\x77\x69\156\x67\40\x73\x79\155\x62\157\x6c\x73\40\50\41\100\43\x2e\44\45\136\x26\x2a\x2d\137\51\x20\x73\x68\x6f\x75\x6c\144\x20\142\x65\40\160\162\145\163\x65\156\164\56");
        $this->mo_saml_show_error_message();
        return;
        fm:
        goto v4;
        VT:
        update_option("\155\157\137\163\141\155\154\137\155\145\x73\163\141\x67\x65", "\x41\x6c\x6c\x20\164\150\x65\40\x66\151\x65\154\x64\163\40\141\162\145\x20\162\x65\161\165\151\162\145\144\x2e\40\x50\154\145\x61\163\145\40\145\156\164\145\162\x20\166\141\x6c\151\x64\40\145\156\164\x72\x69\145\x73\56");
        $this->mo_saml_show_error_message();
        return;
        v4:
        update_option("\155\157\x5f\x73\x61\x6d\x6c\x5f\x61\x64\155\151\x6e\x5f\145\x6d\x61\151\154", $OM);
        update_option("\155\157\137\163\x61\155\x6c\x5f\141\x64\x6d\x69\x6e\x5f\160\141\163\163\x77\x6f\x72\x64", $vJ);
        $e7 = new Customersaml();
        $nD = $e7->get_customer_key();
        if ($nD) {
            goto Ez;
        }
        return;
        Ez:
        $jx = json_decode($nD, true);
        if (json_last_error() == JSON_ERROR_NONE) {
            goto Qz;
        }
        update_option("\x6d\x6f\137\163\141\155\x6c\137\x6d\x65\x73\x73\x61\x67\145", "\x49\x6e\x76\141\154\x69\x64\x20\x75\163\x65\x72\x6e\141\x6d\x65\40\157\162\x20\x70\x61\163\x73\167\x6f\162\x64\56\x20\120\154\x65\x61\163\x65\x20\x74\x72\x79\40\x61\147\x61\x69\x6e\56");
        $this->mo_saml_show_error_message();
        goto UN;
        Qz:
        update_option("\155\x6f\x5f\163\141\155\154\137\x61\x64\155\151\x6e\137\143\165\163\164\157\155\145\x72\137\x6b\145\x79", $jx["\x69\x64"]);
        update_option("\x6d\157\x5f\163\141\x6d\154\137\141\x64\x6d\151\156\137\x61\x70\151\137\x6b\x65\x79", $jx["\x61\x70\151\x4b\145\171"]);
        update_option("\155\x6f\x5f\163\x61\x6d\x6c\137\143\x75\163\x74\157\x6d\145\162\x5f\x74\x6f\153\x65\x6e", $jx["\164\157\x6b\x65\x6e"]);
        if (empty($jx["\x70\x68\x6f\156\x65"])) {
            goto tB;
        }
        update_option("\x6d\157\x5f\x73\x61\x6d\x6c\137\141\144\x6d\151\x6e\x5f\160\150\x6f\x6e\x65", $jx["\160\x68\x6f\156\145"]);
        tB:
        update_option("\x6d\157\137\163\x61\x6d\154\x5f\x61\x64\155\x69\x6e\137\160\141\x73\163\x77\157\x72\144", '');
        update_option("\x6d\x6f\137\x73\141\x6d\154\137\155\145\163\163\141\x67\x65", "\x43\x75\163\x74\x6f\x6d\145\162\40\x72\x65\164\x72\x69\145\x76\x65\x64\x20\163\165\143\x63\x65\163\x73\x66\x75\154\154\171");
        update_option("\155\x6f\x5f\x73\x61\155\x6c\137\162\145\x67\x69\163\164\162\x61\x74\151\157\x6e\137\163\164\141\x74\165\163", "\105\x78\151\163\164\151\156\x67\x20\125\163\145\x72");
        delete_option("\x6d\x6f\137\x73\141\x6d\154\137\x76\x65\x72\x69\x66\171\x5f\x63\x75\x73\x74\x6f\155\145\x72");
        if (get_option("\163\155\x6c\x5f\x6c\153")) {
            goto b_;
        }
        $this->mo_saml_show_success_message();
        goto Mg;
        b_:
        $N5 = get_option("\155\157\x5f\163\x61\x6d\x6c\137\x63\x75\163\x74\157\x6d\x65\162\x5f\x74\157\153\145\x6e");
        $fi = AESEncryption::decrypt_data(get_option("\x73\155\154\137\x6c\153"), $N5);
        $nD = json_decode($e7->mo_saml_vl($fi, false), true);
        update_option("\166\x6c\137\143\x68\145\x63\153\x5f\164", time());
        if (is_array($nD) and strcasecmp($nD["\x73\x74\x61\164\165\x73"], "\123\125\x43\103\105\x53\123") == 0) {
            goto fB;
        }
        update_option("\x6d\x6f\137\163\x61\x6d\x6c\137\x6d\x65\163\x73\141\147\x65", "\114\151\x63\x65\156\x73\145\40\x6b\145\x79\x20\x66\157\x72\40\164\150\151\x73\x20\x69\156\163\164\x61\156\143\145\x20\x69\x73\40\x69\x6e\x63\x6f\x72\x72\145\x63\x74\x2e\x20\x4d\x61\x6b\145\40\x73\x75\162\145\40\x79\157\x75\40\150\x61\x76\x65\40\156\x6f\164\40\x74\141\155\x70\x65\x72\145\144\x20\x77\151\164\150\40\151\164\40\x61\x74\40\141\154\x6c\56\40\x50\x6c\145\x61\163\145\40\x65\156\164\145\x72\40\x61\40\x76\141\x6c\x69\x64\40\154\x69\143\x65\x6e\x73\x65\x20\x6b\145\171\x2e");
        delete_option("\163\155\154\137\x6c\153");
        $this->mo_saml_show_error_message();
        goto r1;
        fB:
        $aT = plugin_dir_path(__FILE__);
        $mq = home_url();
        $mq = trim($mq, "\x2f");
        if (preg_match("\x23\136\x68\x74\164\x70\50\163\51\77\x3a\x2f\57\43", $mq)) {
            goto Sg;
        }
        $mq = "\150\164\x74\160\72\x2f\x2f" . $mq;
        Sg:
        $tJ = parse_url($mq);
        $ng = preg_replace("\57\x5e\x77\x77\167\134\x2e\57", '', $tJ["\150\157\163\164"]);
        $am = wp_upload_dir();
        $bX = $ng . "\x2d" . $am["\x62\x61\163\145\x64\x69\x72"];
        $wu = hash_hmac("\x73\x68\141\x32\65\x36", $bX, "\x34\104\110\146\152\x67\x66\152\141\x73\x6e\x64\x66\163\x61\152\x66\x48\107\x4a");
        $vR = $this->djkasjdksa();
        $Oy = round(strlen($vR) / rand(2, 20));
        $vR = substr_replace($vR, $wu, $Oy, 0);
        $Pk = base64_decode($vR);
        if (is_writable($aT . "\154\151\x63\145\x6e\163\x65")) {
            goto eb;
        }
        $vR = str_rot13($vR);
        $wW = base64_decode("\142\x47\x4e\x6b\141\155\x74\150\x63\62\x70\153\141\x33\116\150\131\62\x77\75");
        update_option($wW, $vR);
        goto jF;
        eb:
        file_put_contents($aT . "\x6c\x69\143\145\156\x73\x65", $Pk);
        jF:
        update_option("\154\x63\x77\162\164\x6c\146\163\x61\155\154", true);
        $this->mo_saml_show_success_message();
        r1:
        Mg:
        UN:
        update_option("\x6d\x6f\x5f\x73\x61\x6d\154\x5f\141\x64\155\151\x6e\137\x70\141\x73\163\167\x6f\x72\x64", '');
        KX:
        goto XC;
        tX:
        if (mo_saml_is_extension_installed("\143\165\x72\x6c")) {
            goto Q4;
        }
        update_option("\x6d\x6f\137\163\x61\x6d\154\137\155\x65\163\x73\x61\x67\x65", "\x45\x52\x52\117\x52\x3a\40\120\110\120\x20\143\125\122\114\x20\145\x78\164\x65\156\x73\x69\157\x6e\40\x69\x73\40\156\157\164\x20\x69\156\163\164\x61\x6c\x6c\145\x64\x20\157\x72\40\144\151\x73\141\x62\x6c\x65\144\x2e\x20\x56\x61\x6c\x69\144\141\x74\x65\40\117\124\120\x20\146\141\151\x6c\x65\144\x2e");
        $this->mo_saml_show_error_message();
        return;
        Q4:
        $tK = '';
        if ($this->mo_saml_check_empty_or_null($_POST["\x6f\x74\160\x5f\164\x6f\x6b\145\x6e"])) {
            goto tF;
        }
        $tK = htmlspecialchars($_POST["\x6f\164\160\x5f\x74\157\153\145\x6e"]);
        goto NL;
        tF:
        update_option("\155\x6f\x5f\163\141\155\x6c\137\155\145\x73\163\x61\x67\145", "\x50\154\145\141\x73\x65\40\x65\x6e\164\145\162\40\141\40\x76\x61\x6c\165\145\x20\151\156\40\x6f\x74\160\40\x66\x69\145\154\x64\x2e");
        $this->mo_saml_show_error_message();
        return;
        NL:
        $e7 = new CustomerSaml();
        $nD = $e7->validate_otp_token(get_option("\x6d\157\x5f\163\141\155\154\x5f\x74\162\141\156\163\141\143\x74\151\157\x6e\x49\144"), $tK);
        if ($nD) {
            goto sy;
        }
        return;
        sy:
        $nD = json_decode($nD, true);
        if (strcasecmp($nD["\163\x74\141\x74\x75\x73"], "\x53\x55\x43\x43\105\123\123") == 0) {
            goto sI;
        }
        update_option("\155\x6f\x5f\x73\x61\x6d\154\137\155\x65\163\x73\x61\x67\145", "\x49\x6e\166\x61\x6c\x69\144\40\x6f\156\x65\40\164\151\155\145\x20\160\141\163\163\x63\x6f\144\145\56\x20\120\154\145\141\x73\145\x20\145\156\164\x65\x72\40\141\x20\x76\x61\x6c\x69\144\x20\x6f\x74\160\x2e");
        $this->mo_saml_show_error_message();
        goto k8;
        sI:
        $this->create_customer();
        k8:
        XC:
        goto de;
        QM:
        if (mo_saml_is_extension_installed("\143\x75\162\154")) {
            goto vH;
        }
        update_option("\x6d\157\137\x73\x61\155\x6c\137\155\145\x73\163\x61\x67\x65", "\x45\122\x52\x4f\122\x3a\x20\x50\110\x50\40\x63\125\122\114\40\x65\170\164\x65\x6e\x73\151\x6f\156\x20\x69\163\x20\x6e\157\164\x20\151\x6e\163\164\x61\154\154\145\x64\x20\157\162\40\144\151\x73\x61\x62\x6c\x65\x64\x2e\40\x52\x65\147\x69\x73\164\162\141\164\151\157\156\40\x66\x61\x69\x6c\x65\144\56");
        $this->mo_saml_show_error_message();
        return;
        vH:
        $OM = '';
        $d3 = '';
        $vJ = self::get_empty_strings();
        $vj = self::get_empty_strings();
        if ($this->mo_saml_check_empty_or_null($_POST["\x65\x6d\141\151\x6c"]) || $this->mo_saml_check_empty_or_null($_POST["\160\141\163\x73\x77\x6f\162\144"]) || $this->mo_saml_check_empty_or_null($_POST["\x63\x6f\156\x66\151\162\x6d\120\141\163\163\167\x6f\x72\x64"])) {
            goto Wt;
        }
        if (strlen($_POST["\x70\141\163\163\x77\157\x72\144"]) < 6 || strlen($_POST["\x63\157\x6e\146\151\x72\x6d\x50\x61\163\163\x77\x6f\162\x64"]) < 6) {
            goto a9;
        }
        if ($this->checkPasswordPattern(strip_tags($_POST["\x70\x61\163\163\167\x6f\x72\x64"]))) {
            goto ch;
        }
        $OM = sanitize_email($_POST["\x65\x6d\141\151\x6c"]);
        if (!isset($_POST["\160\150\157\156\x65"])) {
            goto Wg;
        }
        $d3 = htmlspecialchars($_POST["\x70\x68\157\x6e\145"]);
        Wg:
        $vJ = stripslashes(strip_tags($_POST["\x70\141\163\x73\x77\x6f\162\x64"]));
        $vj = stripslashes(strip_tags($_POST["\x63\157\x6e\x66\x69\x72\x6d\x50\141\x73\x73\x77\x6f\162\x64"]));
        goto g1;
        ch:
        update_option("\155\x6f\x5f\x73\141\x6d\x6c\x5f\155\145\163\163\x61\147\x65", "\x4d\151\156\x69\155\x75\x6d\x20\x36\x20\x63\x68\x61\162\x61\143\164\x65\162\x73\x20\x73\150\x6f\x75\154\144\x20\142\x65\40\160\x72\145\x73\x65\x6e\x74\56\40\115\141\170\151\155\x75\155\40\61\x35\40\143\x68\141\x72\x61\143\x74\x65\x72\x73\40\x73\150\157\x75\154\x64\40\x62\x65\40\x70\x72\145\163\x65\x6e\x74\x2e\x20\117\156\x6c\171\40\146\x6f\x6c\x6c\x6f\x77\x69\156\147\x20\163\171\x6d\x62\x6f\154\x73\x20\x28\41\x40\x23\x2e\44\x25\136\x26\52\55\x5f\51\x20\163\x68\x6f\x75\x6c\144\40\142\145\x20\160\162\145\x73\145\156\x74\56");
        $this->mo_saml_show_error_message();
        return;
        g1:
        goto i4;
        a9:
        update_option("\x6d\x6f\137\163\141\155\x6c\x5f\x6d\145\163\163\141\x67\145", "\x43\x68\157\157\x73\145\40\141\x20\160\141\x73\163\167\157\x72\144\x20\x77\151\x74\x68\x20\x6d\x69\x6e\151\x6d\165\x6d\x20\154\x65\156\x67\164\x68\40\66\56");
        $this->mo_saml_show_error_message();
        return;
        i4:
        goto pb;
        Wt:
        update_option("\x6d\157\137\163\141\x6d\154\x5f\155\145\163\163\x61\x67\x65", "\101\x6c\154\x20\164\x68\145\x20\x66\151\145\154\x64\x73\40\141\162\145\40\162\145\161\x75\x69\162\145\x64\56\x20\x50\x6c\x65\141\x73\x65\x20\x65\x6e\164\x65\162\40\x76\141\154\x69\x64\x20\145\x6e\164\x72\151\x65\x73\x2e");
        $this->mo_saml_show_error_message();
        return;
        pb:
        update_option("\x6d\157\x5f\x73\x61\155\x6c\137\x61\144\x6d\x69\x6e\137\x65\155\x61\x69\x6c", $OM);
        update_option("\155\x6f\137\163\141\155\x6c\137\x61\x64\x6d\151\x6e\x5f\160\150\157\156\145", $d3);
        if (strcmp($vJ, $vj) == 0) {
            goto jS;
        }
        update_option("\155\157\137\163\141\x6d\154\x5f\x6d\x65\x73\163\x61\x67\145", "\x50\141\x73\x73\167\x6f\x72\144\163\x20\144\157\40\156\157\x74\40\155\141\x74\x63\150\56");
        delete_option("\x6d\x6f\x5f\x73\x61\155\154\137\166\x65\162\x69\x66\171\137\x63\165\x73\164\x6f\x6d\x65\x72");
        $this->mo_saml_show_error_message();
        goto Yy;
        jS:
        update_option("\x6d\157\x5f\163\x61\155\154\x5f\x61\x64\x6d\151\x6e\137\160\141\x73\x73\x77\x6f\162\144", $vJ);
        $OM = get_option("\x6d\157\x5f\163\141\x6d\x6c\x5f\x61\x64\x6d\151\156\137\x65\155\141\151\x6c");
        $e7 = new CustomerSaml();
        $nD = $e7->check_customer();
        if ($nD) {
            goto IV;
        }
        return;
        IV:
        $nD = json_decode($nD, true);
        if (strcasecmp($nD["\x73\164\x61\x74\x75\163"], "\103\x55\123\x54\117\x4d\x45\122\x5f\116\x4f\124\137\x46\x4f\125\x4e\104") == 0) {
            goto Id;
        }
        $this->get_current_customer();
        goto Sa;
        Id:
        $nD = $e7->send_otp_token($OM, '');
        if ($nD) {
            goto bk;
        }
        return;
        bk:
        $nD = json_decode($nD, true);
        if (strcasecmp($nD["\x73\164\141\164\165\x73"], "\x53\125\103\x43\105\x53\x53") == 0) {
            goto cB;
        }
        update_option("\155\157\137\x73\x61\155\154\x5f\x6d\145\x73\x73\141\147\x65", "\124\x68\x65\162\x65\x20\167\141\163\40\141\x6e\x20\x65\x72\162\157\x72\40\x69\x6e\x20\x73\x65\x6e\x64\151\156\147\x20\x65\155\141\151\x6c\x2e\x20\120\x6c\145\x61\163\x65\x20\x76\145\x72\151\x66\x79\x20\171\x6f\x75\x72\x20\145\x6d\141\x69\x6c\x20\141\156\x64\40\x74\x72\x79\40\141\147\x61\151\156\x2e");
        update_option("\155\157\137\x73\141\x6d\x6c\x5f\x72\x65\147\151\x73\164\162\x61\x74\x69\157\156\137\163\x74\x61\164\165\x73", "\x4d\x4f\x5f\117\x54\120\137\x44\x45\114\111\126\105\x52\x45\x44\x5f\106\101\x49\114\125\122\105\137\105\115\x41\111\114");
        $this->mo_saml_show_error_message();
        goto lE;
        cB:
        update_option("\155\157\137\x73\x61\x6d\x6c\x5f\x6d\x65\x73\163\x61\147\x65", "\x20\101\40\157\156\x65\x20\164\151\x6d\x65\40\160\x61\x73\x73\143\x6f\x64\x65\40\x69\x73\40\x73\x65\156\x74\40\164\157\40" . get_option("\x6d\x6f\x5f\163\141\155\x6c\137\141\x64\x6d\151\156\137\145\x6d\x61\151\154") . "\x2e\40\120\154\x65\x61\x73\x65\40\x65\x6e\x74\145\x72\x20\164\x68\145\x20\x6f\x74\x70\x20\x68\x65\162\x65\x20\164\x6f\x20\166\x65\x72\151\146\x79\x20\171\157\x75\x72\x20\145\155\141\x69\154\x2e");
        update_option("\x6d\x6f\x5f\x73\141\x6d\154\137\164\162\141\x6e\163\141\x63\x74\151\157\x6e\x49\x64", $nD["\164\170\x49\144"]);
        update_option("\155\157\137\163\x61\155\x6c\x5f\x72\145\x67\x69\x73\164\x72\141\x74\x69\x6f\156\x5f\x73\164\141\164\165\x73", "\x4d\117\x5f\x4f\124\x50\137\x44\x45\x4c\x49\x56\x45\122\x45\104\137\x53\x55\103\x43\x45\x53\123\137\105\115\101\111\x4c");
        $this->mo_saml_show_success_message();
        lE:
        Sa:
        Yy:
        de:
        goto Ff;
        He:
        $Be = htmlspecialchars($_POST["\155\x6f\137\x73\141\x6d\154\137\143\x75\163\164\157\x6d\137\x6c\x6f\147\x69\x6e\137\164\145\170\164"]);
        update_option("\x6d\157\x5f\163\x61\155\x6c\x5f\x63\165\x73\164\x6f\x6d\x5f\x6c\x6f\147\x69\156\x5f\x74\145\x78\164", stripcslashes($Be));
        $Gt = htmlspecialchars($_POST["\x6d\157\x5f\163\x61\155\154\137\x63\x75\163\164\157\155\x5f\x67\162\145\x65\x74\151\156\147\x5f\x74\145\x78\164"]);
        update_option("\x6d\x6f\x5f\x73\141\155\154\137\x63\x75\163\x74\x6f\x6d\137\147\162\x65\x65\164\151\x6e\x67\x5f\164\x65\170\x74", stripcslashes($Gt));
        $mH = htmlspecialchars($_POST["\x6d\x6f\x5f\x73\x61\x6d\x6c\137\147\x72\145\x65\x74\151\x6e\x67\x5f\156\141\x6d\145"]);
        update_option("\x6d\157\x5f\x73\x61\155\154\x5f\147\x72\x65\x65\x74\x69\156\x67\137\x6e\141\x6d\x65", stripslashes($mH));
        $EG = htmlspecialchars($_POST["\x6d\157\137\163\x61\155\x6c\x5f\x63\x75\163\164\x6f\x6d\x5f\x6c\157\147\157\165\164\x5f\164\x65\170\164"]);
        update_option("\x6d\x6f\137\x73\141\155\x6c\x5f\143\x75\163\164\157\x6d\137\x6c\x6f\147\x6f\x75\164\x5f\164\x65\170\164", stripcslashes($EG));
        update_option("\x6d\157\x5f\x73\141\155\154\x5f\155\x65\x73\x73\x61\x67\x65", "\x57\x69\x64\147\x65\164\40\123\145\x74\x74\151\x6e\x67\163\40\x75\x70\144\141\164\145\144\x20\x73\x75\x63\x63\x65\x73\163\x66\165\x6c\x6c\x79\56");
        $this->mo_saml_show_success_message();
        Ff:
        Vp:
        if (mo_saml_is_trial_active()) {
            goto nl;
        }
        if (site_check()) {
            goto lL;
        }
        delete_option("\x6d\x6f\137\x73\141\155\x6c\x5f\x66\157\x72\143\x65\x5f\x61\x75\164\x68\x65\156\164\x69\143\141\x74\151\x6f\156");
        lL:
        goto zG;
        nl:
        if (!decryptSamlElement()) {
            goto mF;
        }
        $N5 = get_option("\155\x6f\137\x73\x61\155\154\137\x63\x75\x73\164\x6f\155\x65\162\x5f\164\x6f\153\145\x6e");
        update_option("\x74\137\x73\x69\x74\145\137\163\x74\141\164\165\x73", AESEncryption::encrypt_data("\146\141\154\163\x65", $N5));
        mF:
        zG:
    }
    function djkasjdksa()
    {
        $D0 = "\41\176\x40\x23\x24\x25\136\x26\x2a\50\51\137\x2b\174\173\175\x3c\x3e\77\x30\x31\62\63\64\65\x36\x37\x38\x39\141\x62\x63\144\x65\146\147\x68\x69\x6a\153\x6c\x6d\x6e\157\x70\161\x72\163\164\x75\166\x77\x78\171\x7a\x41\x42\x43\104\x45\x46\107\110\x49\112\x4b\x4c\x4d\116\117\120\x51\x52\123\124\x55\x56\127\x58\x59\x5a";
        $Q_ = strlen($D0);
        $Kj = '';
        $Sm = 0;
        Am:
        if (!($Sm < 10000)) {
            goto PV;
        }
        $Kj .= $D0[rand(0, $Q_ - 1)];
        s2:
        $Sm++;
        goto Am;
        PV:
        return $Kj;
    }
    function create_customer()
    {
        $e7 = new CustomerSaml();
        $nD = $e7->create_customer();
        if ($nD) {
            goto uH;
        }
        return;
        uH:
        $jx = json_decode($nD, true);
        if (strcasecmp($jx["\x73\x74\x61\164\165\x73"], "\x43\x55\x53\x54\117\x4d\105\x52\137\125\123\x45\122\116\x41\x4d\x45\x5f\101\114\122\105\101\x44\x59\x5f\x45\130\x49\x53\124\123") == 0) {
            goto vx;
        }
        if (!(strcasecmp($jx["\163\x74\x61\x74\165\163"], "\123\125\x43\x43\x45\123\x53") == 0)) {
            goto hw;
        }
        update_option("\x6d\x6f\x5f\163\141\155\154\137\141\144\155\151\156\137\143\165\163\164\157\155\x65\162\137\x6b\145\x79", $jx["\151\x64"]);
        update_option("\x6d\x6f\x5f\x73\141\155\x6c\137\x61\144\155\x69\x6e\137\x61\160\x69\x5f\153\x65\x79", $jx["\141\160\x69\113\145\x79"]);
        update_option("\x6d\157\137\x73\x61\x6d\x6c\x5f\143\165\163\164\x6f\155\145\x72\x5f\164\157\153\145\x6e", $jx["\x74\x6f\x6b\145\x6e"]);
        update_option("\155\157\137\x73\x61\x6d\x6c\137\x61\144\x6d\151\156\x5f\x70\141\x73\163\167\x6f\162\144", '');
        update_option("\x6d\x6f\x5f\163\141\x6d\154\137\x6d\145\x73\163\141\x67\145", "\x54\x68\141\156\153\40\x79\157\x75\x20\146\x6f\162\x20\x72\x65\x67\x69\163\164\145\x72\151\156\147\x20\x77\151\x74\x68\40\x6d\151\156\151\x6f\x72\x61\x6e\147\x65\56");
        update_option("\x6d\x6f\x5f\163\x61\x6d\x6c\x5f\x72\x65\147\x69\163\x74\162\x61\164\151\157\156\137\x73\x74\x61\164\x75\x73", '');
        delete_option("\x6d\x6f\137\163\141\155\154\x5f\166\x65\162\x69\x66\x79\137\143\x75\x73\164\x6f\x6d\x65\x72");
        delete_option("\155\157\x5f\163\x61\x6d\154\x5f\156\145\x77\137\162\145\x67\151\163\164\x72\141\x74\x69\x6f\156");
        $this->mo_saml_show_success_message();
        hw:
        goto TB;
        vx:
        $this->get_current_customer();
        TB:
        update_option("\155\157\137\x73\x61\155\x6c\x5f\x61\x64\x6d\x69\156\137\x70\x61\163\163\167\157\x72\144", '');
    }
    function get_current_customer()
    {
        $e7 = new CustomerSaml();
        $nD = $e7->get_customer_key();
        if ($nD) {
            goto z0;
        }
        return;
        z0:
        $jx = json_decode($nD, true);
        if (json_last_error() == JSON_ERROR_NONE) {
            goto Ny;
        }
        update_option("\x6d\x6f\x5f\163\141\155\x6c\137\x6d\x65\x73\x73\x61\x67\x65", "\x59\x6f\165\40\141\x6c\x72\145\141\144\171\x20\150\x61\166\145\x20\141\156\x20\x61\x63\x63\x6f\165\x6e\164\x20\167\151\164\150\x20\155\151\156\x69\x4f\x72\x61\156\147\145\56\40\120\154\145\x61\163\x65\40\x65\x6e\x74\x65\162\x20\x61\40\166\141\x6c\x69\144\x20\x70\141\163\163\167\x6f\x72\144\56");
        update_option("\x6d\157\137\x73\x61\x6d\x6c\137\x76\x65\x72\151\146\x79\137\x63\165\x73\164\x6f\x6d\x65\x72", "\x74\162\165\145");
        delete_option("\155\x6f\x5f\163\x61\155\154\x5f\x6e\x65\x77\x5f\162\145\x67\151\163\164\x72\x61\164\151\157\x6e");
        $this->mo_saml_show_error_message();
        goto te;
        Ny:
        update_option("\155\157\137\x73\x61\x6d\x6c\x5f\141\144\155\151\156\x5f\143\165\x73\164\x6f\x6d\x65\162\x5f\153\x65\x79", $jx["\151\144"]);
        update_option("\155\157\137\163\141\x6d\154\x5f\141\144\x6d\151\156\x5f\x61\160\x69\137\x6b\x65\171", $jx["\x61\x70\151\113\145\171"]);
        update_option("\x6d\157\137\163\x61\x6d\154\x5f\143\x75\163\164\157\155\x65\x72\137\164\x6f\153\x65\156", $jx["\164\157\153\x65\156"]);
        update_option("\155\x6f\137\x73\x61\155\154\137\x61\144\155\151\x6e\x5f\160\x61\163\x73\167\x6f\x72\144", '');
        update_option("\x6d\x6f\x5f\x73\x61\155\154\137\x6d\145\163\x73\x61\x67\145", "\131\157\x75\162\40\141\143\143\157\x75\x6e\x74\40\150\x61\x73\40\x62\x65\145\x6e\x20\x72\x65\x74\x72\x69\x65\x76\145\x64\40\x73\165\143\143\x65\163\x73\146\x75\154\x6c\171\56");
        delete_option("\x6d\157\137\163\141\x6d\x6c\137\166\x65\x72\x69\146\x79\137\143\x75\x73\164\157\x6d\145\x72");
        delete_option("\155\x6f\137\163\141\155\154\x5f\156\145\167\x5f\162\145\x67\x69\x73\x74\x72\x61\x74\x69\157\x6e");
        $this->mo_saml_show_success_message();
        te:
    }
    public function mo_saml_check_empty_or_null($x9)
    {
        if (!(!isset($x9) || empty($x9))) {
            goto tv;
        }
        return true;
        tv:
        return false;
    }
    function miniorange_sso_menu()
    {
        $HO = add_menu_page("\x4d\x4f\40\x53\101\x4d\114\x20\123\x65\164\164\x69\156\x67\x73\x20" . __("\103\157\x6e\146\151\147\x75\162\x65\x20\x53\101\115\x4c\x20\x49\x64\145\x6e\164\x69\x74\171\x20\x50\162\157\x76\151\x64\145\162\x20\146\x6f\x72\x20\123\x53\x4f", "\155\157\137\163\x61\155\154\137\163\x65\164\x74\151\x6e\x67\163"), "\155\x69\x6e\151\117\x72\x61\x6e\x67\x65\x20\123\x41\115\114\40\62\56\x30\40\x53\123\117", "\x61\144\x6d\x69\156\151\163\164\x72\141\x74\157\162", "\x6d\x6f\137\x73\x61\155\154\137\x73\x65\x74\x74\151\x6e\147\x73", array($this, "\x6d\x6f\x5f\154\157\x67\151\x6e\137\x77\151\144\x67\145\x74\x5f\x73\141\x6d\154\x5f\x6f\160\164\x69\x6f\x6e\x73"), plugin_dir_url(__FILE__) . "\151\155\x61\147\x65\163\x2f\155\x69\x6e\151\157\162\x61\156\x67\145\x2e\x70\156\x67");
        if (!mo_saml_is_customer_license_key_verified()) {
            goto sm;
        }
        add_submenu_page("\155\x6f\x5f\163\141\155\154\x5f\163\145\164\164\151\x6e\x67\163", "\115\141\156\141\x67\x65\x20\114\x69\143\x65\x6e\163\145\x20\x4b\x65\x79\163", "\x4d\x61\x6e\x61\147\145\40\x4c\151\143\145\156\x73\x65\x20\113\145\171\163", "\x61\x64\155\x69\x6e\151\163\x74\x72\141\164\x6f\162", "\x6d\x6f\x5f\x6d\141\x6e\x61\x67\145\137\154\x69\143\145\156\163\145", "\155\x6f\137\x6d\x61\x6e\x61\x67\x65\137\154\151\143\x65\156\x73\x65");
        add_submenu_page("\155\x6f\x5f\163\141\x6d\154\137\x73\145\164\x74\151\156\147\163", "\155\x69\156\x69\117\x72\141\156\147\x65\40\x53\x41\x4d\114\x20\62\x2e\60\x20\123\123\x4f", __("\74\144\x69\166\40\151\x64\75\x22\x6d\x6f\x5f\163\141\155\154\x5f\x61\x64\144\157\156\x73\x5f\x73\165\x62\x6d\145\x6e\x75\42\x3e\x41\x64\144\55\117\x6e\x73\x3c\x2f\144\x69\166\76", "\155\x69\x6e\x69\157\x72\x61\x6e\x67\145\x2d\x73\x61\x6d\x6c\x2d\x32\x30\x2d\x73\x69\156\147\x6c\145\x2d\163\x69\x67\156\x2d\x6f\156"), "\x6d\x61\x6e\x61\147\145\x5f\x6f\160\164\x69\157\x6e\163", "\155\x6f\x5f\163\x61\155\154\137\x73\x65\x74\164\151\x6e\147\x73\46\164\141\142\x3d\x61\144\x64\x2d\x6f\156\x73", array($this, "\x6d\x6f\x5f\x6c\x6f\147\x69\x6e\x5f\x77\151\144\147\x65\x74\x5f\163\x61\x6d\154\137\157\x70\164\x69\x6f\156\163"));
        sm:
    }
    function mo_saml_redirect_for_authentication($zW)
    {
        if (!mo_saml_is_customer_license_key_verified()) {
            goto BK;
        }
        if (!(get_option("\x6d\157\137\163\x61\x6d\x6c\137\162\x65\147\151\x73\164\x65\162\145\144\x5f\157\156\x6c\171\x5f\141\x63\x63\145\x73\x73") == "\x74\x72\165\x65")) {
            goto c4;
        }
        $base_url = home_url();
        echo "\74\x73\x63\162\151\x70\164\x3e\x77\151\156\144\157\167\56\x6c\157\143\x61\164\151\x6f\156\x2e\x68\x72\x65\x66\75\47{$base_url}\57\77\157\160\164\151\x6f\x6e\x3d\x73\x61\x6d\x6c\x5f\165\x73\145\x72\x5f\154\157\147\151\156\x26\162\x65\x64\151\x72\x65\143\164\137\x74\x6f\75\x27\x2b\x65\156\x63\157\x64\145\125\x52\111\x43\157\x6d\x70\x6f\x6e\x65\x6e\x74\x28\167\x69\x6e\144\x6f\x77\x2e\x6c\x6f\143\141\x74\151\x6f\156\56\x68\162\x65\x66\51\x3b\74\57\x73\143\162\x69\x70\x74\x3e";
        exit;
        c4:
        if (get_option("\x6d\157\137\x73\x61\x6d\x6c\x5f\x72\x65\147\x69\x73\x74\145\x72\x65\144\137\x6f\156\x6c\x79\x5f\x61\143\143\145\163\163") == "\x74\162\x75\x65" || get_option("\x6d\x6f\137\163\x61\x6d\x6c\x5f\145\x6e\141\142\154\x65\137\x6c\x6f\147\x69\156\137\x72\145\x64\x69\x72\x65\x63\x74") == "\164\x72\x75\x65") {
            goto FR;
        }
        if (!(get_option("\155\157\137\163\141\x6d\x6c\137\162\145\x64\151\x72\x65\x63\164\137\164\x6f\137\167\x70\137\154\157\147\151\x6e") == "\x74\162\x75\x65")) {
            goto QD;
        }
        if (!(mo_saml_is_sp_configured() && !is_user_logged_in())) {
            goto je;
        }
        $hD = site_url() . "\57\x77\160\55\x6c\x6f\x67\151\156\x2e\x70\x68\x70";
        if (empty($zW)) {
            goto Jf;
        }
        $hD = $hD . "\77\162\x65\x64\151\x72\x65\x63\x74\x5f\164\157\75" . urlencode($zW) . "\x26\162\x65\141\x75\x74\150\75\61";
        Jf:
        header("\x4c\157\x63\x61\x74\x69\157\156\72\40" . $hD);
        exit;
        je:
        QD:
        goto z_;
        FR:
        if (!(mo_saml_is_sp_configured() && !is_user_logged_in())) {
            goto Vr;
        }
        $ZS = get_option("\x6d\x6f\137\x73\141\x6d\154\137\x73\160\137\x62\141\x73\x65\x5f\x75\162\154");
        if (!empty($ZS)) {
            goto ON;
        }
        $ZS = home_url();
        ON:
        if (!(get_option("\155\157\x5f\163\x61\x6d\x6c\x5f\162\145\154\141\171\x5f\x73\164\x61\164\x65") && get_option("\155\x6f\x5f\x73\141\x6d\x6c\137\162\x65\x6c\x61\x79\x5f\163\x74\x61\x74\145") != '')) {
            goto eo;
        }
        $zW = get_option("\155\157\137\163\141\x6d\x6c\x5f\162\145\x6c\x61\x79\137\163\x74\x61\x74\145");
        eo:
        $zW = mo_saml_get_relay_state($zW);
        $lu = empty($zW) ? "\57" : $zW;
        $fG = htmlspecialchars_decode(LicenseHelper::getCurrentOption(mo_options_enum_service_provider::Login_URL));
        $xm = LicenseHelper::getCurrentOption(mo_options_enum_service_provider::Login_binding_type);
        $N3 = get_option("\x6d\x6f\x5f\x73\x61\155\154\x5f\146\x6f\x72\x63\x65\137\141\165\164\x68\x65\156\164\x69\x63\141\164\x69\x6f\x6e");
        $d4 = $ZS . "\57";
        $vs = get_option(mo_options_enum_identity_provider::SP_Entity_ID);
        $L1 = LicenseHelper::getCurrentOption(mo_options_enum_service_provider::NameID_Format);
        if (!empty($L1)) {
            goto xE;
        }
        $L1 = "\61\x2e\61\x3a\x6e\141\x6d\x65\151\144\55\146\x6f\162\155\141\164\x3a\x75\156\163\x70\x65\143\x69\146\x69\145\144";
        xE:
        if (!empty($vs)) {
            goto ks;
        }
        $vs = $ZS . "\x2f\x77\x70\x2d\x63\157\x6e\x74\145\x6e\x74\x2f\x70\154\165\x67\151\x6e\x73\x2f\x6d\151\x6e\151\x6f\162\x61\156\147\x65\55\x73\x61\x6d\154\x2d\62\60\x2d\163\x69\156\x67\154\x65\55\x73\x69\x67\x6e\x2d\x6f\x6e\x2f";
        ks:
        $CB = SAMLSPUtilities::createAuthnRequest($d4, $vs, $fG, $N3, $xm, $L1);
        if (empty($xm) || $xm == "\x48\164\164\x70\x52\145\144\x69\x72\145\x63\164") {
            goto mR;
        }
        if (!(LicenseHelper::getCurrentOption(mo_options_enum_service_provider::Request_signed) == "\x75\156\x63\x68\x65\x63\153\145\144")) {
            goto Yz;
        }
        $Zr = base64_encode($CB);
        SAMLSPUtilities::postSAMLRequest($fG, $Zr, $lu);
        exit;
        Yz:
        $Zr = SAMLSPUtilities::signXML($CB, "\116\141\x6d\x65\111\104\120\157\154\x69\x63\x79");
        SAMLSPUtilities::postSAMLRequest($fG, $Zr, $lu);
        goto NR;
        mR:
        $bW = $fG;
        if (strpos($fG, "\77") !== false) {
            goto s0;
        }
        $bW .= "\77";
        goto pp;
        s0:
        $bW .= "\46";
        pp:
        if (!(LicenseHelper::getCurrentOption(mo_options_enum_service_provider::Request_signed) == "\165\x6e\x63\150\x65\143\x6b\x65\144")) {
            goto MP;
        }
        $bW .= "\x53\101\115\x4c\122\x65\x71\x75\x65\163\x74\75" . $CB . "\46\122\x65\154\x61\x79\x53\x74\141\164\145\x3d" . urlencode($lu);
        header("\143\x61\x63\150\x65\55\143\157\x6e\164\x72\157\154\x3a\x20\x6d\141\x78\55\x61\147\x65\x3d\x30\x2c\40\x70\162\151\x76\x61\164\145\x2c\x20\x6e\157\x2d\163\x74\x6f\162\x65\54\x20\156\x6f\55\143\x61\143\150\x65\x2c\x20\x6d\165\x73\x74\55\162\x65\x76\x61\154\151\144\x61\164\145");
        header("\x4c\157\x63\x61\x74\x69\157\156\72\40" . $bW);
        exit;
        MP:
        $CB = "\x53\x41\x4d\x4c\x52\x65\x71\165\x65\x73\164\75" . $CB . "\46\122\x65\154\x61\171\123\164\x61\x74\145\x3d" . urlencode($lu) . "\x26\x53\151\x67\101\154\147\x3d" . urlencode(XMLSecurityKey::RSA_SHA256);
        $mL = array("\x74\x79\x70\145" => "\x70\x72\151\166\x61\x74\x65");
        $N5 = new XMLSecurityKey(XMLSecurityKey::RSA_SHA256, $mL);
        $QU = get_option("\155\x6f\x5f\163\141\155\154\137\x63\165\162\x72\145\x6e\x74\137\x63\145\162\x74\x5f\x70\162\151\x76\141\164\145\137\153\x65\x79");
        $N5->loadKey($QU, FALSE);
        $MW = new XMLSecurityDSig();
        $Yp = $N5->signData($CB);
        $Yp = base64_encode($Yp);
        $bW .= $CB . "\46\123\x69\147\156\141\164\165\x72\x65\75" . urlencode($Yp);
        header("\x63\x61\x63\150\x65\x2d\x63\x6f\156\164\x72\157\154\72\x20\x6d\141\170\55\141\147\x65\x3d\x30\x2c\x20\160\x72\151\x76\x61\x74\x65\x2c\x20\x6e\x6f\55\x73\x74\157\162\x65\x2c\x20\x6e\x6f\55\143\141\x63\150\145\x2c\40\x6d\165\163\x74\x2d\162\145\x76\141\x6c\151\144\x61\x74\x65");
        header("\114\x6f\x63\141\164\151\x6f\156\72\40" . $bW);
        exit;
        NR:
        Vr:
        z_:
        BK:
    }
    function mo_saml_login_redirect($jS)
    {
        $o2 = false;
        if (!(strcmp(wp_login_url(), $jS) == 0)) {
            goto zJ;
        }
        $o2 = true;
        zJ:
        if (!empty($jS) && !$o2) {
            goto LV;
        }
        header("\x4c\157\143\141\164\x69\157\156\x3a\40" . home_url());
        goto tW;
        LV:
        header("\114\157\x63\x61\x74\x69\157\156\x3a\x20" . $jS);
        tW:
        exit;
    }
    function mo_saml_authenticate()
    {
        $jS = '';
        if (!isset($_REQUEST["\162\145\144\x69\162\145\x63\164\137\164\157"])) {
            goto cV;
        }
        $jS = htmlspecialchars($_REQUEST["\x72\x65\x64\x69\162\x65\143\164\137\164\157"]);
        cV:
        if (!is_user_logged_in()) {
            goto fY;
        }
        $this->mo_saml_login_redirect($jS);
        fY:
        if (!(get_option("\155\x6f\137\163\141\155\x6c\x5f\x65\x6e\x61\x62\154\145\137\154\157\147\151\156\x5f\162\x65\144\x69\x72\145\143\x74") == "\x74\162\165\145")) {
            goto Oe;
        }
        $q3 = get_option("\x6d\x6f\x5f\163\141\155\x6c\137\x62\x61\143\x6b\x64\157\157\x72\x5f\165\162\154") ? trim(get_option("\x6d\157\x5f\163\141\x6d\154\137\x62\141\143\x6b\144\x6f\x6f\162\x5f\165\x72\154")) : "\x66\141\154\x73\145";
        if (isset($_GET["\154\x6f\x67\x67\x65\x64\157\x75\x74"]) && $_GET["\x6c\157\x67\x67\145\144\157\x75\x74"] == "\164\x72\x75\x65") {
            goto dT;
        }
        if (get_option("\155\157\x5f\x73\141\155\154\137\141\x6c\x6c\x6f\x77\137\167\160\x5f\163\151\x67\156\x69\156") == "\164\162\165\x65") {
            goto H5;
        }
        goto pB;
        dT:
        header("\x4c\x6f\x63\141\x74\151\157\156\72\40" . home_url());
        exit;
        goto pB;
        H5:
        if (isset($_GET["\163\x61\155\x6c\137\163\163\157"]) && $_GET["\163\141\155\x6c\137\x73\x73\x6f"] === $q3 || isset($_POST["\163\x61\155\x6c\137\163\x73\x6f"]) && $_POST["\x73\141\x6d\154\x5f\x73\163\x6f"] === $q3) {
            goto sh;
        }
        if (isset($_REQUEST["\x72\x65\x64\151\162\x65\143\x74\137\x74\157"])) {
            goto VK;
        }
        goto wz;
        sh:
        return;
        goto wz;
        VK:
        $jS = htmlspecialchars($_REQUEST["\162\x65\144\x69\x72\145\143\164\137\x74\x6f"]);
        if (!(strpos($jS, "\x77\160\55\x61\144\x6d\151\x6e") !== false && strpos($jS, "\163\x61\155\x6c\x5f\163\163\157\75" . $q3) !== false)) {
            goto q8;
        }
        return;
        q8:
        wz:
        pB:
        $this->mo_saml_redirect_for_authentication($jS);
        Oe:
    }
    function mo_saml_auto_redirect()
    {
        $Du = false;
        $Du = apply_filters("\x6d\157\137\x73\x61\155\x6c\x5f\x62\x65\x66\157\x72\145\137\x61\x75\164\157\x5f\162\145\x64\x69\x72\x65\143\x74", $Du);
        if (!(is_user_logged_in() || $Du)) {
            goto kX;
        }
        return;
        kX:
        if (!(get_option("\155\x6f\x5f\x73\141\x6d\x6c\x5f\x72\145\147\151\163\x74\145\162\145\x64\x5f\157\x6e\154\171\x5f\x61\143\143\x65\x73\x73") == "\x74\162\x75\145" || get_option("\x6d\x6f\x5f\x73\x61\x6d\x6c\137\162\145\x64\x69\162\x65\143\164\x5f\x74\157\x5f\x77\x70\x5f\x6c\157\147\x69\156") == "\164\x72\165\x65")) {
            goto HP;
        }
        if (!(get_option("\x6d\x6f\137\163\x61\155\154\x5f\x65\156\x61\142\x6c\145\x5f\162\163\163\x5f\x61\x63\x63\145\x73\163") == "\164\162\x75\145" && is_feed())) {
            goto gU;
        }
        return;
        gU:
        $zW = saml_get_current_page_url();
        $this->mo_saml_redirect_for_authentication($zW);
        HP:
    }
    function mo_saml_modify_login_form()
    {
        $q3 = get_option("\x6d\x6f\137\163\x61\x6d\154\137\x62\x61\143\153\144\157\x6f\x72\137\x75\162\154") ? trim(get_option("\x6d\157\x5f\x73\141\x6d\x6c\137\x62\141\143\153\144\x6f\x6f\x72\137\165\x72\x6c")) : "\146\141\x6c\x73\145";
        echo "\x3c\x69\156\160\165\x74\40\x74\x79\160\145\75\42\150\151\x64\x64\x65\156\42\x20\156\x61\155\145\75\x22\x73\141\x6d\x6c\x5f\163\x73\157\42\x20\x76\x61\154\x75\145\75" . $q3 . "\76" . "\12";
        if (!(get_option("\155\157\x5f\163\141\155\154\137\x61\x64\144\x5f\x73\x73\x6f\x5f\x62\x75\164\164\x6f\x6e\137\x77\160") == "\x74\x72\165\x65")) {
            goto H7;
        }
        $this->mo_saml_add_sso_button();
        H7:
    }
    function mo_saml_login_enqueue_scripts()
    {
        wp_enqueue_script("\x6a\x71\x75\145\162\171");
    }
    function mo_saml_add_sso_button()
    {
        $pI = SAMLSPUtilities::mo_saml_is_user_logged_in();
        if ($pI) {
            goto dS;
        }
        $ZS = get_option("\x6d\x6f\137\x73\x61\155\154\137\163\160\x5f\x62\x61\163\x65\x5f\x75\x72\154");
        if (!empty($ZS)) {
            goto QT;
        }
        $ZS = home_url();
        QT:
        $nJ = get_option("\x6d\x6f\x5f\x73\x61\155\154\x5f\x62\165\164\164\157\x6e\137\x77\x69\144\164\150") ? get_option("\x6d\x6f\137\163\x61\x6d\154\x5f\x62\165\164\164\x6f\x6e\137\x77\x69\144\164\150") : "\x31\x30\60";
        $Ko = get_option("\x6d\157\x5f\x73\141\x6d\x6c\x5f\142\165\164\x74\x6f\156\x5f\x68\145\x69\147\150\x74") ? get_option("\x6d\157\137\x73\141\155\x6c\137\x62\165\x74\164\x6f\x6e\x5f\x68\x65\x69\x67\150\x74") : "\x35\x30";
        $pe = get_option("\x6d\x6f\137\163\x61\x6d\x6c\137\142\165\x74\x74\157\x6e\x5f\163\x69\x7a\145") ? get_option("\x6d\x6f\137\163\x61\155\x6c\x5f\142\x75\x74\164\157\x6e\137\x73\x69\172\x65") : "\x35\60";
        $Fh = get_option("\155\157\137\163\141\155\x6c\137\x62\x75\164\164\157\156\x5f\x63\x75\x72\x76\145") ? get_option("\x6d\157\x5f\163\x61\155\x6c\x5f\142\165\x74\164\157\x6e\x5f\x63\165\x72\x76\145") : "\65";
        $op = get_option("\x6d\157\137\163\x61\x6d\x6c\x5f\x62\x75\x74\x74\157\156\137\143\157\x6c\157\162") ? get_option("\155\x6f\x5f\163\x61\155\x6c\137\x62\x75\x74\x74\x6f\x6e\137\x63\157\x6c\157\x72") : "\x30\x30\70\65\x62\141";
        $r8 = get_option("\155\x6f\137\163\x61\x6d\154\137\x62\165\x74\x74\x6f\156\137\x74\150\x65\155\145") ? get_option("\155\157\x5f\163\x61\155\x6c\x5f\x62\165\164\164\157\156\x5f\164\150\145\155\145") : "\x6c\x6f\x6e\x67\x62\165\164\x74\x6f\x6e";
        $N0 = LicenseHelper::getCurrentOption(mo_options_enum_service_provider::Identity_name);
        $AQ = get_option("\x6d\157\x5f\163\141\x6d\154\137\142\x75\164\164\157\x6e\137\x74\145\170\x74") ? get_option("\x6d\x6f\x5f\x73\x61\155\154\x5f\142\165\x74\164\157\156\x5f\x74\145\x78\164") : ($N0 ? $N0 : "\x4c\x6f\147\x69\x6e");
        $kQ = get_option("\x6d\x6f\137\163\141\x6d\154\x5f\146\157\156\164\x5f\x63\157\154\157\x72") ? get_option("\x6d\157\x5f\163\x61\155\154\x5f\146\x6f\156\x74\x5f\x63\157\154\157\x72") : "\x66\146\x66\146\x66\146";
        $g6 = get_option("\155\157\x5f\x73\x61\x6d\x6c\137\146\157\x6e\x74\x5f\163\151\x7a\145") ? get_option("\155\x6f\137\163\x61\x6d\154\x5f\146\x6f\156\x74\137\x73\x69\x7a\145") : "\x32\x30";
        $U8 = get_option("\x73\x73\157\x5f\142\x75\x74\164\157\156\x5f\x6c\157\x67\151\156\137\x66\157\162\x6d\x5f\160\157\x73\x69\164\151\157\x6e") ? get_option("\163\163\x6f\x5f\x62\x75\x74\x74\157\x6e\137\x6c\x6f\x67\x69\x6e\x5f\x66\157\162\155\137\160\x6f\163\x69\164\x69\157\x6e") : "\x61\x62\157\x76\145";
        $ip = "\74\151\x6e\160\165\164\x20\x74\x79\x70\145\x3d\x22\x62\165\x74\x74\x6f\156\x22\40\156\x61\155\145\75\42\x6d\157\137\x73\x61\x6d\154\x5f\x77\x70\x5f\x73\163\x6f\137\x62\165\164\164\x6f\x6e\42\40\166\x61\x6c\165\x65\x3d\42" . $AQ . "\42\40\x73\x74\x79\154\145\75\42";
        $Mz = '';
        if ($r8 == "\x6c\157\156\x67\x62\165\164\x74\157\156") {
            goto gM;
        }
        if ($r8 == "\143\x69\x72\x63\154\145") {
            goto CQ;
        }
        if ($r8 == "\x6f\x76\141\154") {
            goto ab;
        }
        if ($r8 == "\163\161\x75\141\162\x65") {
            goto WY;
        }
        goto Nz;
        CQ:
        $Mz = $Mz . "\x77\x69\x64\164\150\72" . $pe . "\160\x78\73";
        $Mz = $Mz . "\x68\x65\x69\147\150\x74\x3a" . $pe . "\160\170\73";
        $Mz = $Mz . "\142\157\162\x64\x65\x72\x2d\162\x61\144\151\x75\163\72\71\71\71\160\170\x3b";
        goto Nz;
        ab:
        $Mz = $Mz . "\x77\x69\144\164\x68\x3a" . $pe . "\160\170\73";
        $Mz = $Mz . "\x68\x65\x69\147\x68\164\72" . $pe . "\x70\x78\73";
        $Mz = $Mz . "\142\157\x72\144\x65\162\x2d\x72\141\144\x69\x75\163\x3a\x35\x70\170\73";
        goto Nz;
        WY:
        $Mz = $Mz . "\167\151\144\164\150\72" . $pe . "\160\x78\x3b";
        $Mz = $Mz . "\x68\x65\x69\147\150\x74\x3a" . $pe . "\160\170\73";
        $Mz = $Mz . "\x62\157\162\144\x65\162\55\162\141\144\x69\165\163\72\60\160\x78\73";
        $Mz = $Mz . "\160\141\144\144\x69\x6e\147\x3a\60\x70\170\73";
        Nz:
        goto mh;
        gM:
        $Mz = $Mz . "\x77\x69\x64\164\150\x3a" . $nJ . "\x70\170\x3b";
        $Mz = $Mz . "\x68\145\151\x67\150\x74\72" . $Ko . "\x70\170\x3b";
        $Mz = $Mz . "\x62\157\162\144\145\162\55\162\141\144\x69\165\163\x3a" . $Fh . "\160\x78\x3b";
        mh:
        $Mz = $Mz . "\x62\141\x63\153\147\162\x6f\165\x6e\144\55\x63\x6f\x6c\x6f\162\72\43" . $op . "\73";
        $Mz = $Mz . "\142\157\162\x64\145\x72\x2d\143\x6f\154\157\162\x3a\x74\162\x61\x6e\163\160\141\162\x65\x6e\164\x3b";
        $Mz = $Mz . "\x63\x6f\154\157\162\72\43" . $kQ . "\73";
        $Mz = $Mz . "\x66\157\x6e\164\55\163\x69\172\145\x3a" . $g6 . "\x70\170\x3b";
        $Mz = $Mz . "\x63\165\162\163\157\162\72\x70\157\151\156\164\145\162";
        $ip = $ip . $Mz . "\42\x2f\76";
        $jS = '';
        if (!isset($_GET["\162\145\144\151\162\x65\x63\x74\x5f\x74\157"])) {
            goto UF;
        }
        $jS = urlencode($_GET["\162\145\x64\151\x72\x65\x63\164\137\164\x6f"]);
        UF:
        $mw = "\x3c\x61\x20\150\162\145\146\75\42" . $ZS . "\x2f\x3f\157\x70\x74\151\157\156\x3d\163\141\x6d\x6c\137\x75\163\x65\x72\137\x6c\x6f\x67\x69\x6e\46\162\145\x64\151\x72\x65\143\x74\x5f\164\157\x3d" . $jS . "\42\x20\163\164\x79\154\x65\75\42\164\145\x78\164\x2d\x64\145\x63\x6f\162\141\x74\x69\157\156\x3a\156\x6f\x6e\145\x3b\42\76" . $ip . "\x3c\57\x61\x3e";
        $mw = "\x3c\144\151\x76\x20\163\x74\x79\154\x65\x3d\42\160\141\x64\x64\151\156\147\72\x31\60\x70\170\x3b\x22\x3e" . $mw . "\74\57\144\151\x76\x3e";
        if ($U8 == "\x61\x62\x6f\166\x65") {
            goto mY;
        }
        $mw = "\x3c\x64\x69\166\x20\x69\x64\75\42\163\x73\x6f\137\142\165\164\x74\157\x6e\42\x20\163\164\171\x6c\x65\x3d\42\164\145\x78\164\x2d\x61\154\x69\x67\x6e\72\143\x65\x6e\164\x65\x72\x22\76\74\x64\151\166\40\x73\x74\x79\154\x65\75\42\x70\141\144\x64\x69\156\x67\x3a\65\160\170\x3b\x66\157\156\164\x2d\x73\151\x7a\145\72\x31\x34\x70\x78\73\x22\x3e\x3c\142\x3e\x4f\x52\74\x2f\x62\x3e\74\x2f\144\151\166\x3e" . $mw . "\74\57\x64\x69\166\x3e\74\x62\x72\57\x3e";
        goto tm;
        mY:
        $mw = "\74\x64\151\x76\x20\151\x64\75\x22\163\x73\x6f\x5f\142\165\x74\164\157\x6e\x22\x20\x73\x74\x79\x6c\145\75\42\x74\x65\x78\x74\55\x61\x6c\x69\147\x6e\72\143\x65\156\164\145\162\42\x3e" . $mw . "\74\x64\151\x76\x20\x73\164\x79\154\145\x3d\42\x70\141\144\x64\151\x6e\x67\72\x35\x70\x78\x3b\146\x6f\x6e\164\55\x73\151\x7a\145\72\x31\x34\160\x78\73\x22\76\x3c\x62\x3e\117\x52\x3c\57\142\x3e\x3c\57\144\x69\166\76\x3c\57\x64\151\166\76\x3c\142\x72\57\76";
        $mw = $mw . "\74\163\143\162\151\x70\x74\x3e\15\xa\x9\x9\11\166\141\x72\x20\x24\x65\154\x65\155\x65\x6e\164\x20\75\40\152\x51\165\145\162\x79\50\x22\43\x75\x73\x65\x72\137\x6c\x6f\147\x69\x6e\x22\51\73\15\12\x9\11\x9\152\121\165\145\162\171\x28\x22\43\x73\x73\157\137\142\x75\164\x74\x6f\156\42\51\x2e\x69\x6e\x73\145\x72\164\102\x65\146\157\162\145\x28\x6a\121\x75\145\x72\171\50\42\154\x61\142\145\x6c\133\146\157\162\75\x27\42\x2b\x24\145\154\x65\x6d\x65\156\164\x2e\x61\164\x74\162\50\47\151\x64\x27\51\53\42\x27\135\x22\51\x29\73\15\12\x9\x9\x9\x3c\57\x73\x63\x72\151\x70\164\x3e";
        tm:
        echo $mw;
        dS:
    }
    function mo_get_saml_shortcode($st)
    {
        $pI = SAMLSPUtilities::mo_saml_is_user_logged_in();
        if (!$pI) {
            goto oh;
        }
        $current_user = wp_get_current_user();
        $Gt = "\110\145\154\x6c\x6f\x2c";
        if (!get_option("\x6d\157\x5f\x73\x61\155\154\137\x63\165\x73\x74\157\155\x5f\x67\162\145\x65\x74\151\x6e\147\x5f\x74\145\x78\164")) {
            goto Om;
        }
        $Gt = get_option("\x6d\157\137\x73\141\x6d\154\137\143\x75\163\164\157\x6d\137\147\162\x65\145\164\x69\156\147\137\164\145\170\x74");
        Om:
        $mH = '';
        if (!get_option("\155\157\137\x73\x61\x6d\x6c\x5f\x67\162\145\145\164\151\156\x67\137\156\x61\155\145")) {
            goto od;
        }
        switch (get_option("\x6d\157\137\163\x61\x6d\154\x5f\x67\x72\145\x65\x74\x69\x6e\x67\x5f\156\141\155\x65")) {
            case "\125\123\x45\122\x4e\x41\x4d\105":
                $mH = $current_user->user_login;
                goto UU;
            case "\105\115\x41\111\114":
                $mH = $current_user->user_email;
                goto UU;
            case "\106\x4e\x41\x4d\x45":
                $mH = $current_user->user_firstname;
                goto UU;
            case "\114\116\101\115\x45":
                $mH = $current_user->user_lastname;
                goto UU;
            case "\106\116\x41\x4d\x45\x5f\x4c\x4e\101\x4d\105":
                $mH = $current_user->user_firstname . "\40" . $current_user->user_lastname;
                goto UU;
            case "\114\116\x41\115\105\137\106\116\x41\x4d\x45":
                $mH = $current_user->user_lastname . "\40" . $current_user->user_firstname;
                goto UU;
            default:
                $mH = $current_user->user_login;
        }
        YD:
        UU:
        od:
        $mH = trim($mH);
        if (!empty($mH)) {
            goto wA;
        }
        $mH = $current_user->user_login;
        wA:
        $Wn = $Gt . "\40" . $mH;
        $IT = "\x4c\x6f\147\157\x75\x74";
        if (!get_option("\155\157\137\x73\141\x6d\x6c\x5f\x63\165\163\x74\157\x6d\x5f\x6c\157\x67\157\x75\x74\x5f\164\145\170\x74")) {
            goto By;
        }
        $IT = get_option("\155\x6f\x5f\x73\x61\x6d\x6c\137\143\165\x73\x74\x6f\x6d\137\154\157\x67\x6f\165\164\137\x74\x65\170\x74");
        By:
        $mw = $Wn . "\x20\174\40\74\x61\40\150\x72\x65\x66\x3d\42" . wp_logout_url(home_url()) . "\42\40\164\x69\164\x6c\x65\75\x22\x6c\157\147\157\x75\164\x22\40\x3e" . $IT . "\x3c\57\141\76\74\57\154\x69\x3e";
        goto YV;
        oh:
        $ZS = get_option("\x6d\157\x5f\x73\141\155\154\137\x73\160\137\142\141\163\145\x5f\165\x72\154");
        if (!empty($ZS)) {
            goto bU;
        }
        $ZS = home_url();
        bU:
        if (mo_saml_is_sp_configured() && mo_saml_is_customer_license_key_verified()) {
            goto lq;
        }
        $mw = "\123\120\40\x69\163\40\156\x6f\x74\x20\143\157\x6e\146\x69\147\165\x72\145\x64\x2e";
        goto nR;
        lq:
        $LH = LicenseHelper::getCurrentOption(mo_options_enum_service_provider::Identity_name);
        $mo = '';
        if (!(!empty($st) and is_array($st))) {
            goto NH;
        }
        if (!isset($st["\x69\x64\x70"])) {
            goto HU;
        }
        $LH = $st["\151\x64\x70"];
        $mo = $LH;
        HU:
        NH:
        $BT = "\x4c\157\147\x69\x6e\40\167\x69\164\x68\x20" . LicenseHelper::getCurrentOption(mo_options_enum_service_provider::Identity_name);
        if (!get_option("\155\x6f\137\x73\x61\155\154\137\x63\x75\x73\x74\157\x6d\x5f\154\x6f\147\x69\156\137\164\x65\170\x74")) {
            goto uN;
        }
        $BT = get_option("\155\157\x5f\x73\141\x6d\x6c\137\143\x75\x73\164\157\x6d\x5f\154\x6f\147\151\x6e\137\x74\145\170\164");
        uN:
        $t8 = LicenseHelper::getCurrentOption(mo_options_enum_service_provider::Identity_name);
        $BT = str_replace("\x23\43\x49\x44\120\x23\43", $t8, $BT);
        $DF = false;
        if (!get_option("\155\157\x5f\x73\141\155\x6c\x5f\x75\x73\x65\137\142\165\x74\x74\157\x6e\137\141\163\137\163\x68\157\x72\164\x63\157\144\x65")) {
            goto p9;
        }
        if (!(get_option("\155\157\x5f\163\141\155\x6c\x5f\x75\x73\x65\x5f\x62\x75\164\x74\x6f\x6e\137\x61\x73\x5f\163\150\x6f\x72\x74\143\157\144\145") == "\x74\x72\165\145")) {
            goto SA;
        }
        $DF = true;
        SA:
        p9:
        if (!$DF) {
            goto yw;
        }
        $nJ = get_option("\x6d\x6f\137\x73\x61\155\x6c\x5f\142\165\x74\164\x6f\x6e\x5f\x77\151\x64\164\150") ? get_option("\x6d\157\x5f\163\141\155\x6c\x5f\x62\165\164\164\x6f\x6e\137\167\x69\144\x74\150") : "\x31\x30\60";
        $Ko = get_option("\x6d\157\137\x73\x61\155\154\x5f\142\165\x74\x74\157\156\137\x68\145\151\x67\150\164") ? get_option("\x6d\x6f\137\x73\x61\155\154\137\x62\x75\164\164\157\156\137\x68\145\151\x67\150\164") : "\65\x30";
        $pe = get_option("\x6d\157\137\x73\x61\155\x6c\x5f\142\165\x74\x74\x6f\x6e\x5f\x73\x69\x7a\145") ? get_option("\155\157\137\x73\141\155\x6c\137\142\x75\x74\x74\157\x6e\x5f\x73\x69\x7a\x65") : "\65\60";
        $Fh = get_option("\155\157\137\x73\x61\155\154\x5f\142\x75\164\x74\x6f\x6e\137\143\x75\162\x76\145") ? get_option("\155\x6f\x5f\x73\141\x6d\154\137\x62\x75\164\x74\157\x6e\x5f\x63\165\x72\x76\145") : "\x35";
        $op = get_option("\155\x6f\137\163\x61\x6d\x6c\137\142\165\164\x74\157\156\137\x63\157\x6c\x6f\162") ? get_option("\x6d\x6f\x5f\x73\141\155\x6c\x5f\142\x75\164\164\157\156\x5f\x63\x6f\154\x6f\x72") : "\60\x30\x38\x35\x62\141";
        $r8 = get_option("\155\x6f\x5f\x73\141\x6d\x6c\x5f\x62\x75\164\164\x6f\x6e\137\x74\x68\x65\x6d\x65") ? get_option("\155\x6f\x5f\x73\x61\155\154\x5f\142\x75\164\164\157\x6e\x5f\164\x68\x65\155\145") : "\154\x6f\156\x67\142\x75\164\x74\157\x6e";
        $N0 = LicenseHelper::getCurrentOption(mo_options_enum_service_provider::Identity_name);
        $AQ = get_option("\x6d\x6f\137\x73\141\155\154\x5f\x62\165\164\x74\x6f\156\137\x74\145\170\x74") ? get_option("\x6d\157\x5f\163\x61\x6d\154\137\142\x75\164\164\x6f\x6e\137\164\145\x78\164") : ($N0 ? $N0 : "\114\x6f\x67\151\156");
        $kQ = get_option("\x6d\157\137\163\x61\x6d\154\137\146\x6f\x6e\x74\x5f\143\157\154\157\162") ? get_option("\155\x6f\x5f\163\x61\x6d\x6c\137\x66\x6f\156\x74\137\143\157\154\x6f\162") : "\146\146\x66\x66\x66\x66";
        $g6 = get_option("\x6d\157\137\163\141\155\x6c\137\146\x6f\x6e\x74\137\x73\x69\x7a\145") ? get_option("\155\157\x5f\163\x61\x6d\154\x5f\146\x6f\156\x74\x5f\163\151\x7a\x65") : "\x32\x30";
        $BT = "\x3c\x69\156\x70\165\x74\x20\x74\x79\160\x65\75\x22\x62\x75\x74\x74\x6f\x6e\x22\40\x6e\x61\155\145\75\x22\155\x6f\137\163\x61\155\x6c\137\x77\160\137\x73\163\x6f\x5f\142\x75\x74\x74\157\x6e\x22\x20\x76\x61\154\165\x65\x3d\x22" . $AQ . "\x22\40\x73\164\171\154\145\x3d\x22";
        $Mz = '';
        if ($r8 == "\x6c\157\156\x67\142\165\164\164\x6f\156") {
            goto h9;
        }
        if ($r8 == "\143\x69\162\143\154\x65") {
            goto yn;
        }
        if ($r8 == "\x6f\x76\x61\154") {
            goto ax;
        }
        if ($r8 == "\x73\161\165\141\162\145") {
            goto ge;
        }
        goto rV;
        yn:
        $Mz = $Mz . "\167\x69\144\x74\150\72" . $pe . "\x70\170\73";
        $Mz = $Mz . "\150\x65\x69\x67\x68\x74\72" . $pe . "\x70\x78\73";
        $Mz = $Mz . "\x62\157\162\144\x65\x72\x2d\x72\x61\x64\151\x75\x73\x3a\x39\x39\x39\160\x78\x3b";
        goto rV;
        ax:
        $Mz = $Mz . "\167\151\144\164\x68\72" . $pe . "\x70\x78\x3b";
        $Mz = $Mz . "\150\145\151\x67\150\164\x3a" . $pe . "\x70\170\x3b";
        $Mz = $Mz . "\142\157\162\x64\145\x72\55\162\141\x64\x69\x75\x73\72\65\160\170\x3b";
        goto rV;
        ge:
        $Mz = $Mz . "\167\x69\x64\164\x68\x3a" . $pe . "\160\x78\73";
        $Mz = $Mz . "\x68\145\x69\147\x68\x74\x3a" . $pe . "\x70\x78\73";
        $Mz = $Mz . "\142\157\162\x64\x65\x72\55\x72\x61\144\x69\x75\163\x3a\x30\160\x78\73";
        rV:
        goto na;
        h9:
        $Mz = $Mz . "\x77\x69\x64\164\150\x3a" . $nJ . "\160\170\x3b";
        $Mz = $Mz . "\x68\x65\151\x67\150\x74\x3a" . $Ko . "\x70\170\x3b";
        $Mz = $Mz . "\x62\x6f\x72\144\145\x72\x2d\x72\x61\x64\x69\x75\x73\72" . $Fh . "\x70\170\73";
        na:
        $Mz = $Mz . "\142\x61\x63\x6b\147\162\x6f\165\156\x64\55\143\157\154\x6f\162\x3a\x23" . $op . "\x3b";
        $Mz = $Mz . "\x62\x6f\162\144\145\162\55\143\x6f\154\x6f\162\x3a\x74\162\141\x6e\163\x70\141\162\x65\156\164\73";
        $Mz = $Mz . "\x63\x6f\154\x6f\162\x3a\43" . $kQ . "\x3b";
        $Mz = $Mz . "\146\157\x6e\164\55\x73\x69\172\x65\x3a" . $g6 . "\160\x78\x3b";
        $Mz = $Mz . "\160\x61\x64\144\151\156\x67\x3a\x30\x70\x78\73";
        $BT = $BT . $Mz . "\x22\57\76";
        yw:
        $jS = urlencode(saml_get_current_page_url());
        $mw = "\x3c\141\x20\150\x72\145\x66\x3d\x22" . $ZS . "\x2f\77\157\160\164\151\x6f\x6e\75\163\141\x6d\x6c\x5f\165\x73\145\162\137\x6c\x6f\147\x69\x6e";
        if (empty($mo)) {
            goto Ak;
        }
        $mw .= "\46\x69\x64\x70\x3d" . $LH;
        Ak:
        $mw .= "\46\x72\x65\x64\151\x72\145\x63\x74\137\x74\157\75" . $jS . "\x22";
        if (!$DF) {
            goto KF;
        }
        $mw = $mw . "\x73\164\171\154\145\x3d\42\164\145\x78\164\x2d\144\145\143\x6f\162\x61\164\x69\157\x6e\72\x6e\157\156\x65\73\x22";
        KF:
        $mw = $mw . "\x3e" . $BT . "\74\57\141\76";
        nR:
        YV:
        return $mw;
    }
    function _handle_upload_metadata()
    {
        if (!(isset($_FILES["\x6d\x65\x74\141\144\141\x74\141\x5f\x66\151\x6c\145"]) || isset($_POST["\155\145\x74\x61\144\141\x74\x61\137\165\x72\x6c"]))) {
            goto hA;
        }
        if (!empty($_FILES["\x6d\145\x74\x61\x64\x61\x74\x61\137\x66\x69\x6c\x65"]["\x74\155\x70\137\156\x61\x6d\x65"])) {
            goto Uz;
        }
        if (mo_saml_is_extension_installed("\143\x75\x72\154")) {
            goto Eq;
        }
        update_option("\x6d\x6f\137\x73\141\155\154\x5f\155\x65\x73\163\x61\147\145", "\x50\110\120\40\143\125\122\x4c\40\x65\170\x74\x65\x6e\x73\x69\x6f\x6e\40\151\x73\40\156\x6f\164\x20\151\156\163\164\x61\x6c\154\145\144\40\x6f\162\40\144\151\x73\141\142\154\145\144\x2e\x20\103\141\x6e\x6e\157\x74\40\146\x65\x74\x63\150\40\155\145\164\x61\144\x61\x74\141\x20\146\x72\157\x6d\40\125\x52\114\x2e");
        $this->mo_saml_show_error_message();
        return;
        Eq:
        $hD = filter_var(htmlspecialchars($_POST["\x6d\x65\x74\x61\144\x61\x74\x61\137\165\x72\154"]), FILTER_SANITIZE_URL);
        $A4 = SAMLSPUtilities::mo_saml_wp_remote_call($hD, array("\x73\x73\x6c\x76\145\162\x69\x66\171" => false), true);
        if (!$A4) {
            goto ps;
        }
        $ms = $A4;
        goto wi;
        ps:
        return;
        wi:
        if (isset($_POST["\x73\171\156\143\x5f\155\x65\164\141\x64\x61\x74\x61"])) {
            goto vf;
        }
        delete_option("\x73\x61\155\154\x5f\155\x65\164\141\144\141\164\141\x5f\x75\x72\154\137\x66\x6f\162\137\x73\x79\x6e\x63");
        delete_option("\163\141\155\x6c\x5f\155\x65\164\x61\x64\141\164\141\x5f\x73\171\156\x63\137\x69\156\x74\145\x72\166\x61\154");
        wp_unschedule_event(wp_next_scheduled("\x6d\x65\x74\x61\144\141\x74\x61\x5f\x73\171\x6e\143\137\143\162\157\156\137\x61\x63\164\151\x6f\156"), "\x6d\145\164\141\x64\x61\164\141\x5f\x73\171\x6e\x63\x5f\x63\162\157\156\x5f\x61\x63\x74\x69\x6f\156");
        goto XX;
        vf:
        update_option("\163\141\155\x6c\x5f\x6d\145\x74\x61\x64\x61\x74\141\137\165\x72\x6c\137\146\157\x72\137\x73\171\x6e\x63", htmlspecialchars($_POST["\x6d\x65\164\x61\144\141\164\141\x5f\x75\x72\x6c"]));
        update_option("\x73\141\x6d\x6c\x5f\x6d\145\164\x61\144\x61\x74\x61\x5f\163\x79\156\143\137\151\x6e\164\145\x72\x76\x61\x6c", htmlspecialchars($_POST["\x73\x79\156\143\x5f\151\156\164\x65\162\166\x61\x6c"]));
        if (wp_next_scheduled("\155\x65\x74\x61\x64\141\164\x61\137\x73\x79\156\143\137\x63\162\x6f\156\x5f\x61\143\164\151\x6f\x6e")) {
            goto rY;
        }
        wp_schedule_event(time(), htmlspecialchars($_POST["\163\171\156\x63\137\151\x6e\164\145\x72\166\x61\154"]), "\x6d\145\164\x61\144\x61\x74\x61\x5f\163\171\156\143\137\143\x72\x6f\x6e\137\141\143\x74\151\157\x6e");
        rY:
        XX:
        goto u3;
        Uz:
        $ms = @file_get_contents($_FILES["\155\x65\x74\x61\144\141\x74\x61\x5f\146\151\x6c\x65"]["\164\x6d\x70\137\156\x61\155\145"]);
        u3:
        $this->upload_metadata($ms);
        hA:
    }
    function upload_metadata($ms)
    {
        $FP = set_error_handler(array($this, "\x68\x61\x6e\x64\154\145\130\155\154\105\x72\x72\157\162"));
        $yP = new DOMDocument();
        $yP->loadXML($ms);
        restore_error_handler();
        $Sx = $yP->firstChild;
        if (!empty($Sx)) {
            goto ql;
        }
        if (!empty($_FILES["\x6d\145\x74\x61\144\x61\x74\x61\137\x66\x69\x6c\x65"]["\164\155\160\x5f\x6e\x61\155\145"])) {
            goto so;
        }
        if (!empty($_POST["\155\x65\x74\x61\144\x61\x74\141\x5f\165\162\154"])) {
            goto P9;
        }
        update_option("\x6d\157\137\x73\141\155\x6c\x5f\x6d\145\163\x73\141\147\x65", "\120\x6c\x65\x61\163\145\40\160\162\157\166\151\144\x65\40\x61\x20\x76\141\154\x69\x64\40\155\x65\164\x61\144\x61\x74\141\x20\146\151\154\x65\40\157\x72\x20\141\40\x76\x61\154\x69\144\40\125\122\x4c\x2e");
        $this->mo_saml_show_error_message();
        return;
        goto Et;
        P9:
        update_option("\x6d\157\137\163\141\155\x6c\137\x6d\x65\x73\x73\141\x67\x65", "\x50\x6c\x65\x61\163\x65\x20\x70\x72\x6f\166\x69\x64\x65\40\141\x20\x76\x61\x6c\x69\x64\40\155\145\164\141\x64\141\x74\141\40\x55\x52\114\x2e");
        $this->mo_saml_show_error_message();
        Et:
        goto Nb;
        so:
        update_option("\x6d\157\137\163\x61\155\x6c\x5f\x6d\145\x73\x73\141\x67\145", "\120\154\x65\141\x73\145\x20\x70\x72\x6f\x76\151\x64\x65\x20\141\x20\x76\141\154\x69\144\x20\155\145\164\x61\x64\x61\164\141\x20\x66\x69\154\145\x2e");
        $this->mo_saml_show_error_message();
        Nb:
        goto G9;
        ql:
        $qm = new IDPMetadataReader($yP);
        $Ui = $qm->getIdentityProviders();
        if (!empty($Ui)) {
            goto ro;
        }
        update_option("\x6d\x6f\x5f\163\141\155\x6c\137\155\x65\163\x73\141\147\145", "\120\x6c\145\x61\x73\x65\40\x70\162\157\x76\151\x64\145\x20\x61\x20\166\x61\x6c\151\x64\x20\155\145\164\141\x64\141\x74\141\x20\146\151\x6c\145\x2e");
        $this->mo_saml_show_error_message();
        return;
        ro:
        foreach ($Ui as $N5 => $LH) {
            $Wy = LicenseHelper::getCurrentOption(mo_options_enum_service_provider::Identity_name);
            if (!isset($_POST["\x73\141\155\154\x5f\151\x64\x65\156\x74\x69\x74\x79\x5f\x6d\145\x74\x61\144\141\164\141\137\160\162\x6f\166\151\144\145\162"])) {
                goto gH;
            }
            $Wy = htmlspecialchars($_POST["\x73\x61\155\154\x5f\151\x64\145\x6e\x74\x69\164\x79\x5f\x6d\145\x74\141\144\141\x74\141\x5f\160\162\157\x76\x69\144\145\162"]);
            gH:
            $PV = "\x48\164\x74\x70\122\145\144\x69\x72\x65\x63\164";
            $n_ = '';
            if (array_key_exists("\x48\124\124\x50\55\x52\145\144\x69\x72\145\143\x74", $LH->getLoginDetails())) {
                goto t4;
            }
            if (!array_key_exists("\x48\x54\124\120\55\x50\x4f\123\124", $LH->getLoginDetails())) {
                goto ts;
            }
            $PV = "\x48\x74\164\160\120\157\x73\164";
            $n_ = $LH->getLoginURL("\x48\x54\x54\x50\55\x50\117\123\x54");
            ts:
            goto oN;
            t4:
            $n_ = $LH->getLoginURL("\110\124\x54\x50\x2d\x52\145\144\151\162\145\x63\164");
            oN:
            $W0 = "\110\164\164\x70\122\x65\x64\x69\x72\145\x63\x74";
            $aq = '';
            if (array_key_exists("\x48\124\x54\x50\x2d\122\x65\144\x69\162\x65\x63\x74", $LH->getLogoutDetails())) {
                goto xo;
            }
            if (!array_key_exists("\x48\x54\x54\120\x2d\x50\x4f\x53\x54", $LH->getLogoutDetails())) {
                goto dF;
            }
            $W0 = "\110\x74\x74\x70\120\157\163\164";
            $aq = $LH->getLogoutURL("\110\124\x54\x50\x2d\x50\117\x53\x54");
            dF:
            goto cp;
            xo:
            $aq = $LH->getLogoutURL("\x48\124\x54\x50\x2d\x52\x65\x64\x69\162\145\x63\x74");
            cp:
            $Pg = $LH->getEntityID();
            $x6 = $LH->getSigningCertificate();
            if (!get_option("\155\x6f\x5f\x65\x6e\x61\142\x6c\145\137\155\165\154\x74\151\160\x6c\145\x5f\x6c\x69\143\x65\156\163\145\163")) {
                goto uU;
            }
            $XO = get_option("\x6d\x6f\x5f\163\x61\x6d\154\x5f\x65\x6e\166\x69\x72\x6f\x6e\x6d\x65\x6e\x74\x5f\x6f\x62\152\145\143\164\163");
            $W2 = LicenseHelper::getSelectedEnvironment();
            if (!isset($XO[$W2])) {
                goto Lj;
            }
            $Hi = $XO[$W2]->getPluginSettings();
            $Hi[mo_options_enum_service_provider::Identity_name] = $Wy;
            $Hi[mo_options_enum_service_provider::Login_URL] = $n_;
            $Hi[mo_options_enum_service_provider::Issuer] = $Pg;
            $Hi[mo_options_enum_service_provider::X509_certificate] = maybe_serialize($x6);
            $Hi[mo_options_enum_service_provider::Logout_URL] = $aq;
            $Hi[mo_options_enum_service_provider::Login_binding_type] = $PV;
            $Hi[mo_options_enum_service_provider::Logout_binding_type] = $W0;
            $XO[$W2]->setPluginSettings($Hi);
            update_option("\x6d\x6f\137\163\141\155\x6c\x5f\145\x6e\x76\x69\162\157\156\155\x65\x6e\164\137\x6f\142\152\145\143\164\x73", $XO);
            $B0 = LicenseHelper::getSelectedEnvironment();
            if (!($B0 and $B0 != LicenseHelper::getCurrentEnvironment())) {
                goto Eg;
            }
            goto Pq;
            Eg:
            Lj:
            uU:
            update_option("\x73\141\155\154\x5f\151\x64\x65\x6e\x74\151\164\x79\137\156\141\155\x65", $Wy);
            update_option("\x73\141\x6d\x6c\x5f\x6c\157\147\x69\156\137\142\151\x6e\x64\x69\x6e\147\137\x74\x79\x70\x65", $PV);
            update_option("\x73\141\155\154\x5f\x6c\x6f\147\x69\156\137\165\x72\x6c", $n_);
            update_option("\163\x61\x6d\x6c\137\x6c\x6f\x67\x6f\165\164\x5f\142\x69\x6e\144\151\156\147\x5f\164\171\x70\145", $W0);
            update_option("\163\x61\x6d\x6c\x5f\154\x6f\x67\157\165\164\x5f\165\x72\154", $aq);
            update_option("\x73\141\x6d\154\x5f\x69\163\x73\x75\x65\162", $Pg);
            update_option("\163\141\x6d\154\x5f\156\141\x6d\x65\151\144\x5f\146\157\162\155\x61\x74", "\x31\56\x31\72\x6e\141\x6d\145\x69\x64\55\x66\157\x72\x6d\141\164\72\x75\156\163\160\x65\143\151\146\x69\145\144");
            update_option("\163\x61\155\154\137\170\65\60\x39\137\x63\x65\x72\164\151\x66\x69\143\141\x74\x65", maybe_serialize($x6));
            goto Pq;
            DA:
        }
        Pq:
        update_option("\x6d\x6f\137\163\x61\155\154\x5f\155\x65\163\163\141\x67\x65", "\x49\144\145\156\x74\x69\x74\171\40\120\162\157\166\151\144\145\162\40\x64\x65\164\x61\151\x6c\x73\40\x73\141\x76\x65\144\40\163\165\143\143\145\x73\x73\146\165\154\x6c\171\56");
        $this->mo_saml_show_success_message();
        G9:
    }
    function handleXmlError($nj, $UC, $T1, $YJ)
    {
        if ($nj == E_WARNING && substr_count($UC, "\x44\x4f\115\x44\x6f\143\165\x6d\145\156\x74\72\x3a\154\157\x61\x64\130\x4d\114\50\x29") > 0) {
            goto zz;
        }
        return false;
        goto hp;
        zz:
        return;
        hp:
    }
    function mo_saml_plugin_action_links($hC)
    {
        $hC = array_merge(array("\74\x61\40\150\x72\x65\x66\x3d\42" . esc_url(admin_url("\141\x64\155\x69\x6e\x2e\160\x68\160\77\160\x61\147\145\75\155\157\x5f\163\141\x6d\x6c\137\163\145\x74\164\x69\156\x67\x73")) . "\x22\x3e" . __("\x53\x65\164\x74\151\x6e\x67\163", "\x74\145\170\164\x64\x6f\155\x61\151\x6e") . "\74\57\x61\x3e"), $hC);
        return $hC;
    }
    function checkPasswordPattern($vJ)
    {
        $Uu = "\x2f\136\x5b\x28\x5c\x77\x29\52\50\134\41\x5c\100\x5c\43\x5c\x24\134\x25\x5c\x5e\134\46\x5c\x2a\134\56\x5c\55\x5c\137\x29\x2a\x5d\53\44\x2f";
        return !preg_match($Uu, $vJ);
    }
    function mo_saml_parse_expiry_date($Ws)
    {
        $Il = new DateTime($Ws);
        $C8 = $Il->getTimestamp();
        return date("\x46\40\152\54\x20\x59", $C8);
    }
}
new saml_mo_login();

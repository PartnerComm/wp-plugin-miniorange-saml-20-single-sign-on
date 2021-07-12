<?php
/*
Plugin Name: miniOrange SSO using SAML 2.0
Plugin URI: http://miniorange.com/
Description: (Premium Single-Site)miniOrange SAML 2.0 SSO enables user to perform Single Sign On with any SAML 2.0 enabled Identity Provider.
Version: 12.0.4
Author: miniOrange
Author URI: http://miniorange.com/
*/


include_once dirname(__FILE__) . "\x2f\155\x6f\137\x6c\x6f\147\x69\156\x5f\x73\141\155\154\137\x73\163\x6f\137\x77\151\x64\x67\x65\164\x2e\x70\150\160";
include_once "\170\155\x6c\x73\145\x63\154\x69\x62\x73\x2e\x70\x68\x70";
use RobRichards\XMLSecLibs\XMLSecurityKey;
use RobRichards\XMLSecLibs\XMLSecurityDSig;
use RobRichards\XMLSecLibs\XMLSecEnc;
require "\155\x6f\55\163\141\x6d\x6c\55\143\154\x61\x73\x73\55\x63\x75\163\x74\x6f\155\145\x72\56\x70\x68\160";
require "\x6d\x6f\x5f\x73\141\x6d\x6c\x5f\163\145\164\x74\x69\x6e\x67\163\x5f\160\141\147\145\x2e\160\150\x70";
require "\115\x65\x74\x61\144\141\x74\141\x52\145\x61\144\145\162\56\160\150\x70";
require "\143\x65\x72\164\x69\x66\x69\x63\x61\x74\x65\x5f\165\x74\151\154\x69\164\x79\x2e\160\150\x70";
require "\x6c\x69\x63\145\156\x73\x65\165\164\151\154\x73\56\x70\150\160";
require "\114\x69\x63\145\x6e\163\145\x55\x74\x69\154\x73\57\x4c\151\x63\x65\x6e\163\145\104\141\157\56\160\x68\160";
require_once "\155\x6f\x2d\x73\x61\155\154\x2d\160\154\x75\x67\x69\x6e\x2d\x76\145\162\x73\x69\157\156\x2d\165\x70\x64\141\x74\x65\x2e\160\x68\160";
class saml_mo_login
{
    function __construct()
    {
        add_action("\x61\x64\155\151\156\137\x6d\x65\x6e\x75", array($this, "\x6d\x69\x6e\x69\x6f\162\x61\156\x67\145\x5f\163\x73\x6f\137\x6d\145\156\165"));
        add_action("\x61\x64\155\x69\156\x5f\151\x6e\x69\x74", array($this, "\x6d\151\156\x69\157\x72\141\x6e\x67\145\x5f\x6c\157\x67\x69\156\x5f\x77\151\x64\x67\145\x74\x5f\x73\141\x6d\x6c\137\163\141\166\x65\x5f\x73\x65\x74\164\151\156\x67\163"));
        add_action("\x61\x64\155\x69\x6e\137\x65\156\161\165\x65\165\x65\x5f\163\143\x72\151\160\164\x73", array($this, "\x70\x6c\x75\147\x69\x6e\x5f\163\145\x74\164\x69\156\147\163\137\x73\164\171\154\x65"));
        register_deactivation_hook(__FILE__, array($this, "\155\x6f\137\x73\163\157\137\163\141\155\154\137\x64\145\141\143\164\151\166\141\x74\145"));
        add_action("\141\x64\x6d\x69\x6e\x5f\x65\x6e\x71\165\145\165\145\137\163\143\x72\x69\160\164\x73", array($this, "\160\154\x75\x67\x69\x6e\137\x73\x65\164\164\151\156\147\x73\137\163\x63\x72\x69\160\164"));
        remove_action("\141\144\x6d\151\156\137\x6e\157\164\151\x63\145\x73", array($this, "\x6d\x6f\137\x73\141\x6d\154\137\163\x75\143\143\x65\x73\163\x5f\155\145\163\163\x61\x67\145"));
        remove_action("\141\x64\x6d\x69\x6e\x5f\x6e\x6f\164\x69\x63\145\163", array($this, "\x6d\x6f\137\x73\141\155\x6c\x5f\x65\162\x72\x6f\x72\137\x6d\145\163\163\141\147\145"));
        add_action("\167\x70\137\x61\x75\x74\150\145\156\164\151\x63\x61\x74\x65", array($this, "\155\157\137\163\141\x6d\x6c\x5f\x61\165\164\x68\145\156\x74\151\143\141\164\145"));
        add_action("\x77\x70", array($this, "\x6d\x6f\137\163\141\155\154\x5f\141\x75\164\157\x5f\x72\145\144\151\x72\145\x63\164"));
        $YZ = new mo_login_wid();
        add_filter("\x6c\x6f\147\157\165\x74\137\x72\x65\144\x69\162\x65\x63\164", array($YZ, "\x6d\x6f\137\163\141\155\x6c\137\x6c\157\x67\157\x75\x74"), 10, 3);
        add_action("\x69\156\151\164", array($YZ, "\155\157\x5f\163\x61\x6d\154\137\167\x69\x64\147\145\x74\137\151\156\151\164"));
        add_action("\x61\144\x6d\x69\x6e\x5f\x69\156\151\x74", "\155\x6f\137\x73\x61\155\x6c\137\144\x6f\167\156\154\x6f\141\144");
        add_action("\x6c\x6f\x67\151\x6e\137\145\156\x71\165\145\x75\145\x5f\x73\143\x72\x69\160\x74\x73", array($this, "\x6d\157\137\163\141\155\x6c\x5f\x6c\x6f\147\x69\x6e\x5f\x65\x6e\161\165\x65\165\145\137\x73\143\x72\151\160\x74\x73"));
        add_action("\x6c\x6f\147\151\156\137\x66\x6f\162\155", array($this, "\155\x6f\137\x73\x61\x6d\154\x5f\x6d\x6f\144\151\x66\x79\x5f\x6c\x6f\x67\151\x6e\137\146\157\162\x6d"));
        add_shortcode("\115\117\x5f\x53\x41\115\114\x5f\x46\x4f\122\115", array($this, "\155\157\137\147\145\164\x5f\x73\x61\x6d\154\137\x73\150\x6f\x72\164\143\x6f\144\x65"));
        add_filter("\x63\x72\157\156\x5f\x73\143\150\145\x64\165\x6c\x65\x73", array($this, "\x6d\171\160\162\x65\146\x69\x78\137\141\144\x64\137\143\x72\157\x6e\137\x73\143\x68\145\x64\165\x6c\x65"));
        add_action("\155\145\164\141\144\141\x74\x61\137\163\171\156\x63\x5f\x63\x72\157\x6e\137\141\143\164\151\x6f\x6e", array($this, "\x6d\x65\x74\141\144\141\x74\x61\137\x73\x79\156\x63\x5f\x63\x72\157\156\x5f\141\143\x74\151\157\x6e"));
        register_activation_hook(__FILE__, array($this, "\x6d\x6f\x5f\163\141\x6d\x6c\137\x63\150\145\x63\153\137\157\160\145\x6e\x73\x73\x6c"));
        add_action("\160\x6c\x75\147\x69\156\137\x61\x63\x74\x69\157\156\137\154\x69\x6e\153\x73\x5f" . plugin_basename(__FILE__), array($this, "\x6d\157\x5f\163\141\x6d\x6c\137\160\154\165\x67\x69\x6e\137\141\x63\164\151\x6f\156\x5f\x6c\x69\156\x6b\163"));
        add_action("\x61\144\155\x69\x6e\137\x69\156\x69\x74", array($this, "\x64\x65\146\141\x75\x6c\164\137\143\x65\162\x74\151\146\x69\143\x61\164\x65"));
        add_option("\154\143\144\x6a\153\141\163\x6a\144\x6b\x73\141\143\154", "\x64\145\x66\x61\x75\x6c\164\55\x63\x65\x72\164\x69\x66\x69\x63\141\x74\145");
        add_filter("\155\x61\x6e\x61\147\x65\137\x75\163\145\x72\163\x5f\143\x6f\x6c\x75\155\156\163", array($this, "\155\x6f\x5f\x73\x61\155\154\x5f\x63\x75\163\x74\157\155\x5f\x61\164\x74\x72\x5f\143\x6f\154\x75\x6d\156"));
        add_filter("\155\x61\x6e\141\x67\x65\x5f\x75\x73\x65\162\163\137\143\x75\163\x74\x6f\x6d\x5f\x63\157\x6c\x75\x6d\x6e", array($this, "\155\157\x5f\x73\141\155\154\x5f\141\x74\x74\x72\x5f\143\157\x6c\x75\x6d\156\137\x63\157\x6e\164\x65\156\164"), 10, 3);
    }
    function default_certificate()
    {
        $Km = file_get_contents(plugin_dir_path(__FILE__) . "\162\x65\x73\x6f\165\162\143\145\x73" . DIRECTORY_SEPARATOR . "\x6d\x69\156\x69\x6f\162\x61\x6e\147\145\137\163\160\x5f\x32\x30\x32\x30\x2e\143\x72\x74");
        $bq = file_get_contents(plugin_dir_path(__FILE__) . "\162\145\x73\x6f\165\162\143\x65\163" . DIRECTORY_SEPARATOR . "\155\x69\156\x69\157\x72\x61\x6e\147\x65\137\x73\160\x5f\x32\60\x32\60\x5f\x70\x72\x69\166\56\x6b\145\171");
        if (!(!get_option("\155\157\x5f\163\141\155\x6c\x5f\143\x75\x72\x72\145\x6e\x74\137\x63\145\x72\x74") && !get_option("\x6d\x6f\137\x73\x61\x6d\154\137\143\x75\162\x72\x65\x6e\164\x5f\x63\x65\162\164\137\160\162\151\166\x61\x74\x65\137\x6b\x65\171"))) {
            goto GK;
        }
        update_option("\155\157\137\x73\141\x6d\x6c\x5f\143\x75\162\162\145\156\x74\x5f\143\x65\x72\164", $Km);
        update_option("\x6d\157\137\163\x61\155\x6c\137\x63\165\162\x72\x65\x6e\x74\137\143\x65\162\x74\x5f\x70\162\x69\166\x61\x74\x65\x5f\153\x65\x79", $bq);
        GK:
    }
    function mo_saml_check_openssl()
    {
        if (mo_saml_is_extension_installed("\x6f\x70\x65\156\163\x73\x6c")) {
            goto wE;
        }
        wp_die("\120\110\120\x20\x6f\x70\x65\x6e\x73\163\154\40\145\x78\164\145\156\x73\x69\157\156\40\x69\x73\40\x6e\x6f\x74\40\x69\x6e\163\164\141\154\x6c\x65\x64\x20\x6f\162\40\144\151\163\141\x62\x6c\x65\144\54\x70\154\145\x61\163\145\40\x65\x6e\x61\142\154\145\40\151\x74\40\164\157\40\x61\x63\x74\151\166\x61\x74\145\40\x74\x68\145\40\160\x6c\x75\147\x69\156\56");
        wE:
        add_option("\101\143\x74\x69\166\141\x74\145\x64\137\120\x6c\x75\x67\151\x6e", "\120\x6c\165\x67\151\156\x2d\x53\154\x75\x67");
    }
    function myprefix_add_cron_schedule($yd)
    {
        $yd["\167\x65\145\153\154\x79"] = array("\151\x6e\164\145\162\x76\141\154" => 604800, "\144\x69\163\x70\154\x61\x79" => __("\x4f\x6e\x63\x65\x20\x57\x65\145\x6b\154\171"));
        $yd["\155\157\x6e\164\x68\154\171"] = array("\151\156\164\x65\162\x76\141\x6c" => 2635200, "\144\151\163\160\x6c\141\x79" => __("\117\x6e\x63\145\x20\x4d\x6f\156\x74\x68\154\x79"));
        return $yd;
    }
    function metadata_sync_cron_action()
    {
        error_log("\x6d\x69\156\x69\x6f\162\141\156\x67\145\x20\72\40\122\101\x4e\x20\123\131\x4e\103\x20\x2d\40" . time());
        $Mc = LicenseHelper::getCurrentOption(mo_options_enum_service_provider::Identity_name);
        $this->upload_metadata(@file_get_contents(get_option("\163\x61\155\154\x5f\155\145\x74\x61\x64\141\164\141\x5f\165\x72\x6c\x5f\146\x6f\162\x5f\163\171\x6e\143")));
        update_option("\x73\141\x6d\x6c\137\151\x64\145\x6e\164\x69\x74\x79\137\156\x61\x6d\x65", $Mc);
    }
    function mo_login_widget_saml_options()
    {
        global $wpdb;
        update_option("\x6d\x6f\x5f\163\141\x6d\154\x5f\x68\157\163\164\137\156\x61\155\145", "\150\x74\164\x70\x73\x3a\x2f\57\x6c\x6f\x67\x69\156\x2e\170\145\143\x75\x72\151\146\171\x2e\143\x6f\x6d");
        $Kb = get_option("\155\x6f\137\x73\141\155\154\x5f\150\157\163\164\137\156\141\x6d\x65");
        mo_register_saml_sso();
    }
    function mo_saml_success_message()
    {
        $ed = "\x65\x72\162\x6f\x72";
        $M3 = get_option("\155\x6f\137\163\141\x6d\154\137\155\x65\x73\163\x61\147\x65");
        echo "\x3c\144\151\x76\x20\143\x6c\141\x73\163\x3d\x27" . $ed . "\47\76\40\x3c\160\76" . $M3 . "\x3c\57\x70\76\74\57\144\x69\166\x3e";
    }
    function mo_saml_error_message()
    {
        $ed = "\x75\x70\x64\141\164\x65\x64";
        $M3 = get_option("\x6d\x6f\137\x73\141\x6d\x6c\137\155\x65\163\x73\141\147\145");
        echo "\x3c\x64\151\166\x20\x63\154\141\x73\163\x3d\x27" . $ed . "\x27\x3e\x20\74\x70\76" . $M3 . "\74\x2f\160\76\74\57\x64\x69\x76\x3e";
    }
    public function mo_sso_saml_deactivate()
    {
        if (!is_multisite()) {
            goto ME;
        }
        global $wpdb;
        $MS = $wpdb->get_col("\x53\x45\114\x45\103\124\40\x62\x6c\x6f\147\x5f\151\144\40\x46\122\x4f\115\40{$wpdb->blogs}");
        $E6 = get_current_blog_id();
        do_action("\155\x6f\x5f\x73\x61\155\x6c\x5f\x66\154\165\163\150\x5f\143\x61\143\150\145");
        foreach ($MS as $blog_id) {
            switch_to_blog($blog_id);
            delete_option("\x6d\x6f\137\x73\141\155\154\137\150\157\x73\x74\137\x6e\x61\155\145");
            delete_option("\x6d\157\x5f\163\x61\x6d\154\137\156\145\167\137\x72\x65\147\x69\163\x74\162\x61\x74\x69\x6f\156");
            delete_option("\x6d\x6f\x5f\163\141\155\x6c\x5f\141\x64\155\x69\x6e\137\x70\150\157\156\x65");
            delete_option("\155\157\137\x73\x61\155\x6c\x5f\x61\x64\155\151\x6e\x5f\160\x61\163\x73\167\x6f\x72\x64");
            delete_option("\x6d\x6f\x5f\x73\x61\x6d\154\137\x76\145\162\151\x66\x79\137\143\x75\x73\164\157\x6d\145\x72");
            delete_option("\x6d\x6f\x5f\163\141\x6d\154\x5f\141\144\155\151\x6e\x5f\x63\165\163\164\x6f\155\145\162\x5f\153\145\171");
            delete_option("\155\x6f\x5f\163\141\x6d\154\137\141\x64\x6d\x69\x6e\x5f\x61\x70\x69\137\x6b\x65\x79");
            delete_option("\155\157\x5f\163\x61\x6d\x6c\137\x63\165\163\164\x6f\155\145\162\x5f\164\157\x6b\x65\156");
            delete_option("\155\157\137\163\141\155\x6c\137\x6d\145\x73\163\x61\x67\145");
            delete_option("\155\x6f\x5f\163\x61\x6d\154\137\162\145\147\x69\163\x74\x72\x61\164\151\157\156\137\163\x74\x61\164\x75\163");
            delete_option("\155\x6f\137\163\141\155\154\137\x69\x64\x70\137\x63\157\156\146\x69\x67\x5f\143\x6f\x6d\x70\x6c\x65\x74\x65");
            delete_option("\x6d\x6f\x5f\x73\141\155\x6c\137\164\x72\x61\x6e\x73\141\143\x74\151\x6f\x6e\x49\144");
            delete_option("\166\154\x5f\x63\x68\145\143\153\137\164");
            delete_option("\166\x6c\x5f\x63\150\145\143\153\x5f\x73");
            BK:
        }
        w5:
        switch_to_blog($E6);
        goto E2;
        ME:
        do_action("\x6d\x6f\137\163\141\155\154\x5f\146\154\165\163\x68\137\x63\141\143\150\145");
        delete_option("\x6d\157\x5f\x73\x61\x6d\154\x5f\x68\157\163\x74\x5f\156\141\x6d\145");
        delete_option("\155\x6f\137\x73\x61\155\x6c\x5f\156\145\x77\137\x72\145\147\151\163\x74\x72\141\x74\151\157\x6e");
        delete_option("\x6d\157\137\x73\x61\155\x6c\137\x61\144\x6d\x69\x6e\x5f\160\x68\x6f\x6e\x65");
        delete_option("\x6d\157\137\x73\x61\x6d\x6c\137\x61\144\155\151\156\137\x70\x61\163\163\167\x6f\x72\144");
        delete_option("\x6d\x6f\x5f\x73\x61\155\154\137\166\145\x72\x69\x66\171\x5f\x63\x75\163\164\157\x6d\145\x72");
        delete_option("\x6d\157\137\163\x61\x6d\154\137\x61\144\155\151\156\137\143\165\x73\x74\157\155\145\162\137\x6b\x65\171");
        delete_option("\155\157\137\163\x61\155\154\137\141\x64\x6d\x69\156\137\x61\x70\151\137\153\x65\x79");
        delete_option("\x6d\x6f\x5f\x73\141\x6d\154\x5f\143\x75\163\x74\x6f\155\x65\162\x5f\x74\157\x6b\x65\x6e");
        delete_option("\x6d\x6f\137\163\141\155\154\137\x6d\x65\x73\x73\x61\147\145");
        delete_option("\155\x6f\x5f\163\x61\155\154\137\162\145\x67\151\163\164\x72\x61\x74\151\157\156\137\163\x74\141\x74\x75\163");
        delete_option("\x6d\157\x5f\x73\x61\155\154\137\151\144\160\x5f\x63\157\x6e\146\x69\x67\x5f\143\157\155\x70\x6c\x65\164\145");
        delete_option("\155\157\x5f\163\x61\155\x6c\137\x74\162\x61\156\x73\141\x63\164\x69\157\x6e\111\144");
        delete_option("\155\x6f\137\x73\141\155\x6c\137\145\x6e\141\x62\x6c\x65\137\143\x6c\x6f\x75\x64\137\x62\162\157\153\x65\x72");
        delete_option("\166\154\137\x63\x68\145\143\153\137\x74");
        delete_option("\166\154\x5f\x63\x68\145\x63\x6b\x5f\x73");
        E2:
    }
    function mo_saml_show_success_message()
    {
        remove_action("\x61\x64\155\151\156\x5f\156\x6f\164\151\x63\x65\x73", array($this, "\x6d\x6f\137\163\x61\155\x6c\137\x73\165\x63\143\145\163\x73\137\155\145\163\x73\141\x67\x65"));
        add_action("\x61\144\x6d\x69\156\x5f\156\157\164\x69\143\145\x73", array($this, "\155\x6f\x5f\163\141\x6d\x6c\x5f\145\x72\x72\157\x72\137\x6d\x65\163\x73\x61\147\145"));
    }
    function mo_saml_show_error_message()
    {
        remove_action("\141\x64\x6d\151\x6e\x5f\156\x6f\164\151\143\145\x73", array($this, "\155\x6f\137\x73\141\x6d\x6c\x5f\145\x72\x72\x6f\x72\x5f\155\145\163\x73\x61\x67\145"));
        add_action("\x61\x64\155\151\x6e\137\156\x6f\164\x69\x63\145\163", array($this, "\155\x6f\137\x73\141\155\154\137\163\165\143\143\x65\163\x73\x5f\x6d\145\x73\163\x61\x67\145"));
    }
    function plugin_settings_style($bE)
    {
        if (!("\x74\157\x70\154\145\x76\145\x6c\x5f\160\141\x67\145\137\x6d\x6f\137\x73\x61\x6d\x6c\x5f\163\x65\164\164\151\x6e\x67\x73" != $bE && "\155\151\156\151\x6f\x72\x61\x6e\x67\145\x2d\163\141\x6d\154\55\62\x2d\60\55\x73\x73\x6f\137\160\141\147\x65\137\155\x6f\x5f\155\141\x6e\x61\x67\x65\x5f\154\151\143\x65\x6e\x73\145" != $bE)) {
            goto WF;
        }
        return;
        WF:
        if (!(isset($_REQUEST["\x74\x61\x62"]) && $_REQUEST["\164\x61\142"] == "\154\151\143\145\156\x73\151\156\x67")) {
            goto sn;
        }
        wp_enqueue_style("\x6d\157\137\163\141\x6d\x6c\137\x62\x6f\x6f\x74\163\x74\x72\x61\x70\137\x63\163\163", plugins_url("\151\x6e\143\x6c\165\144\x65\163\57\143\163\x73\x2f\x62\x6f\x6f\x74\x73\164\162\141\160\x2f\142\x6f\157\164\163\x74\x72\x61\x70\x2e\155\151\156\x2e\x63\163\x73", __FILE__), array(), mo_options_plugin_constants::Version, "\x61\x6c\154");
        sn:
        wp_enqueue_style("\155\157\x5f\x73\141\x6d\x6c\x5f\x61\144\x6d\151\156\x5f\x73\145\164\164\x69\x6e\x67\x73\137\x6a\161\165\x65\x72\171\x5f\163\164\x79\154\x65", plugins_url("\151\x6e\x63\154\165\x64\145\163\57\143\163\163\x2f\x6a\161\x75\145\162\x79\x2e\165\151\x2e\143\x73\163", __FILE__), array(), mo_options_plugin_constants::Version, "\x61\x6c\x6c");
        wp_enqueue_style("\155\157\x5f\x73\x61\155\x6c\x5f\x61\144\155\151\156\137\x73\145\164\164\151\x6e\x67\163\x5f\x73\164\171\x6c\x65\x5f\164\x72\x61\143\x6b\x65\162", plugins_url("\x69\x6e\x63\154\x75\x64\145\163\57\x63\163\x73\57\x70\162\x6f\147\162\x65\163\x73\x2d\164\x72\x61\143\x6b\145\x72\56\x63\163\163", __FILE__), array(), mo_options_plugin_constants::Version, "\141\154\x6c");
        wp_enqueue_style("\x6d\x6f\x5f\x73\x61\155\154\137\x61\144\x6d\151\x6e\x5f\163\145\x74\164\151\x6e\x67\x73\137\163\x74\x79\x6c\x65", plugins_url("\x69\x6e\x63\x6c\165\x64\x65\x73\57\143\163\x73\57\163\x74\171\154\145\x5f\163\145\x74\164\151\156\147\x73\56\x6d\151\x6e\x2e\x63\x73\163", __FILE__), array(), mo_options_plugin_constants::Version, "\141\x6c\154");
        wp_enqueue_style("\155\157\137\x73\141\x6d\x6c\x5f\141\x64\x6d\151\156\137\x73\145\164\164\151\156\x67\163\137\160\x68\157\156\x65\x5f\x73\164\x79\x6c\x65", plugins_url("\151\x6e\143\x6c\165\x64\145\x73\x2f\x63\163\163\57\160\x68\157\x6e\x65\x2e\x6d\151\x6e\x2e\x63\x73\x73", __FILE__), array(), mo_options_plugin_constants::Version, "\141\x6c\x6c");
        wp_enqueue_style("\155\157\x5f\x73\141\155\154\x5f\x77\160\142\55\x66\x61", plugins_url("\151\156\143\154\x75\144\145\163\x2f\x63\x73\163\57\x66\x6f\156\x74\55\x61\x77\x65\x73\x6f\155\x65\x2e\x6d\x69\x6e\x2e\x63\x73\x73", __FILE__), array(), mo_options_plugin_constants::Version, "\141\x6c\154");
        wp_enqueue_style("\155\157\137\x73\x61\x6d\154\137\155\x61\x6e\141\147\x65\137\154\x69\143\145\156\x73\x65\x5f\x73\x65\164\x74\x69\x6e\147\163\x5f\163\164\x79\x6c\145", plugins_url("\114\x69\143\145\156\163\145\x55\x74\151\154\x73\57\166\x69\x65\167\x73\57\114\x69\143\x65\x6e\x73\x65\126\x69\x65\x77\56\143\163\x73", __FILE__), array(), mo_options_plugin_constants::Version, "\x61\x6c\x6c");
    }
    function plugin_settings_script($bE)
    {
        if (!("\x74\157\x70\154\x65\x76\145\x6c\137\x70\x61\147\x65\x5f\155\157\x5f\163\x61\155\x6c\137\163\145\x74\164\151\156\x67\x73" != $bE && "\x6d\x69\x6e\151\x6f\x72\x61\156\x67\145\55\x73\141\x6d\154\55\x32\x2d\x30\x2d\x73\x73\x6f\137\x70\141\147\145\x5f\x6d\157\x5f\x6d\x61\x6e\141\x67\145\x5f\x6c\x69\143\x65\x6e\163\145" != $bE)) {
            goto bL;
        }
        return;
        bL:
        wp_enqueue_script("\x6a\161\x75\145\x72\171");
        wp_enqueue_script("\155\157\137\x73\x61\155\154\x5f\141\x64\x6d\151\156\137\x73\x65\x74\164\x69\156\147\x73\137\x63\x6f\154\x6f\162\x5f\x73\143\x72\x69\x70\164", plugins_url("\151\x6e\143\154\165\144\145\163\x2f\x6a\163\x2f\x6a\x73\x63\x6f\x6c\157\162\x2f\x6a\x73\x63\x6f\x6c\x6f\x72\x2e\152\163", __FILE__), array(), mo_options_plugin_constants::Version, false);
        wp_enqueue_script("\155\157\x5f\163\141\x6d\x6c\137\x61\x64\x6d\x69\x6e\x5f\x62\157\x6f\x74\163\x74\162\141\x70\137\x73\143\162\x69\160\x74", plugins_url("\151\156\x63\x6c\165\144\145\x73\57\x6a\x73\x2f\142\157\x6f\x74\x73\x74\x72\141\160\x2e\152\163", __FILE__), array(), mo_options_plugin_constants::Version, false);
        wp_enqueue_script("\155\x6f\x5f\x73\x61\x6d\154\x5f\x61\144\155\x69\x6e\137\163\x65\164\164\x69\156\147\x73\137\163\143\162\x69\x70\x74", plugins_url("\x69\x6e\x63\154\165\x64\145\x73\x2f\152\x73\57\163\145\164\164\151\156\147\163\x2e\x6d\x69\156\56\152\x73", __FILE__), array(), mo_options_plugin_constants::Version, false);
        wp_enqueue_script("\155\157\x5f\163\141\155\154\x5f\x61\144\x6d\151\x6e\137\x73\x65\x74\164\151\x6e\x67\163\137\160\x68\157\x6e\x65\137\x73\143\162\x69\160\x74", plugins_url("\x69\156\143\x6c\x75\x64\145\163\57\152\163\x2f\160\x68\157\156\x65\x2e\155\151\156\x2e\152\x73", __FILE__), array(), mo_options_plugin_constants::Version, false);
        if (!(isset($_REQUEST["\164\x61\142"]) && $_REQUEST["\x74\x61\x62"] == "\154\151\x63\145\x6e\x73\x69\156\147")) {
            goto Zy;
        }
        wp_enqueue_script("\x6d\x6f\137\x73\x61\155\154\137\x6d\x6f\144\x65\162\156\x69\172\x72\137\163\x63\x72\x69\x70\x74", plugins_url("\x69\x6e\x63\x6c\x75\x64\145\x73\x2f\x6a\163\57\x6d\157\144\145\x72\156\x69\172\x72\x2e\x6a\x73", __FILE__), array(), mo_options_plugin_constants::Version, false);
        wp_enqueue_script("\155\x6f\137\x73\x61\155\x6c\x5f\x70\157\x70\157\x76\145\162\137\x73\x63\x72\x69\160\x74", plugins_url("\151\156\x63\154\165\144\145\x73\57\152\163\57\142\x6f\157\x74\163\x74\x72\141\160\57\160\x6f\160\x70\145\x72\56\155\151\x6e\56\152\163", __FILE__), array(), mo_options_plugin_constants::Version, false);
        wp_enqueue_script("\155\x6f\137\163\141\x6d\x6c\x5f\142\x6f\157\x74\163\164\162\141\x70\x5f\x73\x63\x72\151\x70\164", plugins_url("\151\x6e\143\154\165\x64\x65\x73\57\x6a\x73\57\142\157\x6f\164\163\164\162\x61\160\57\142\x6f\157\164\163\x74\x72\141\160\x2e\155\151\156\56\x6a\163", __FILE__), array(), mo_options_plugin_constants::Version, false);
        Zy:
    }
    function mo_saml_activation_message()
    {
        $ed = "\x75\160\x64\x61\164\x65\x64";
        $M3 = get_option("\155\157\137\163\141\155\x6c\x5f\x6d\x65\163\163\x61\x67\x65");
        echo "\x3c\x64\151\166\x20\x63\x6c\x61\163\163\x3d\47" . $ed . "\x27\x3e\x20\x3c\x70\76" . $M3 . "\74\57\x70\x3e\x3c\57\144\151\166\76";
    }
    function get_empty_strings()
    {
        return '';
    }
    function mo_saml_custom_attr_column($JX)
    {
        $xw = maybe_unserialize(get_option("\155\157\x5f\x73\141\155\154\x5f\x63\x75\x73\164\x6f\x6d\x5f\141\x74\164\x72\163\x5f\155\x61\160\160\151\x6e\x67"));
        $uD = get_option("\x73\x61\155\154\137\163\150\x6f\167\137\165\163\145\162\x5f\x61\x74\x74\x72\x69\x62\x75\x74\x65");
        $Eh = 0;
        if (!is_array($xw)) {
            goto M_;
        }
        foreach ($xw as $Ej => $j1) {
            if (empty($Ej)) {
                goto Fo;
            }
            if (!in_array($Eh, $uD)) {
                goto kU;
            }
            $JX[$Ej] = $Ej;
            kU:
            Fo:
            $Eh++;
            w6:
        }
        eh:
        M_:
        return $JX;
    }
    function mo_saml_attr_column_content($ZW, $X4, $vj)
    {
        $xw = maybe_unserialize(get_option("\155\157\x5f\163\141\155\x6c\137\x63\165\163\164\157\155\x5f\141\164\x74\x72\x73\x5f\x6d\141\x70\160\x69\x6e\x67"));
        if (!is_array($xw)) {
            goto Py;
        }
        foreach ($xw as $Ej => $j1) {
            if (!($Ej === $X4)) {
                goto Yw;
            }
            $mw = get_user_meta($vj, $X4, false);
            if (empty($mw)) {
                goto fj;
            }
            if (!is_array($mw[0])) {
                goto Sg;
            }
            $gq = '';
            foreach ($mw[0] as $bz) {
                $gq = $gq . $bz;
                if (!next($mw[0])) {
                    goto eu;
                }
                $gq = $gq . "\40\x7c\x20";
                eu:
                PR:
            }
            RO:
            return $gq;
            goto gw;
            Sg:
            return $mw[0];
            gw:
            fj:
            Yw:
            N5:
        }
        lF:
        Py:
        return $ZW;
    }
    static function mo_check_option_admin_referer($vR)
    {
        return isset($_POST["\x6f\x70\x74\x69\157\156"]) and $_POST["\x6f\160\x74\151\x6f\156"] == $vR and check_admin_referer($vR);
    }
    function miniorange_login_widget_saml_save_settings()
    {
        if (!current_user_can("\155\x61\x6e\141\x67\145\137\157\160\x74\x69\157\x6e\163")) {
            goto PV;
        }
        if (!(is_admin() && get_option("\101\x63\164\x69\166\141\164\145\x64\x5f\x50\x6c\165\x67\x69\156") == "\120\x6c\x75\x67\151\x6e\55\x53\x6c\x75\x67")) {
            goto ho;
        }
        delete_option("\101\143\164\x69\166\141\164\x65\144\x5f\120\x6c\x75\147\x69\156");
        update_option("\x6d\157\x5f\163\141\x6d\154\137\155\145\163\163\x61\x67\x65", "\x47\x6f\x20\x74\x6f\40\160\x6c\165\147\x69\x6e\x20\x3c\142\x3e\74\x61\x20\150\x72\145\146\75\42\x61\144\155\151\x6e\56\x70\150\x70\77\160\x61\x67\x65\x3d\155\157\137\x73\141\155\154\x5f\163\x65\x74\164\151\156\147\x73\42\x3e\163\145\164\164\x69\x6e\147\x73\74\x2f\x61\x3e\74\x2f\142\x3e\40\164\x6f\40\x63\157\156\146\151\147\x75\162\145\40\123\x41\x4d\114\x20\123\x69\156\x67\154\145\40\123\151\x67\156\40\x4f\x6e\x20\x62\171\x20\155\151\x6e\151\x4f\162\x61\156\147\x65\x2e");
        add_action("\x61\x64\155\151\x6e\137\156\157\x74\x69\143\145\x73", array($this, "\155\x6f\x5f\x73\141\155\x6c\137\141\143\x74\151\166\141\164\x69\x6f\156\137\155\145\x73\163\141\147\145"));
        ho:
        PV:
        if (!(isset($_POST["\x6f\160\x74\151\157\156"]) && current_user_can("\x6d\x61\x6e\x61\147\x65\137\157\160\164\x69\x6f\x6e\x73"))) {
            goto O_;
        }
        if (!self::mo_check_option_admin_referer("\155\157\x5f\155\x61\156\141\147\145\x5f\x6c\151\143\145\156\x73\145")) {
            goto Gg;
        }
        if (array_key_exists("\x6d\x6f\137\x65\x6e\x61\142\154\145\x5f\x6d\x75\x6c\x74\x69\x70\154\x65\137\x6c\x69\x63\145\156\x73\x65\163", $_POST)) {
            goto Rg;
        }
        delete_option("\x6d\157\x5f\145\x6e\x61\142\x6c\145\x5f\x6d\x75\x6c\164\x69\160\154\x65\137\x6c\x69\143\x65\x6e\163\x65\163");
        goto NI;
        Rg:
        update_option("\x6d\157\x5f\x65\x6e\141\142\154\x65\137\x6d\x75\154\164\x69\x70\x6c\x65\x5f\x6c\151\143\x65\156\163\x65\163", "\143\150\x65\x63\x6b\145\144");
        initializeLicenseObjectArray();
        NI:
        update_option("\x6d\x6f\137\x73\141\155\x6c\137\155\145\x73\163\141\x67\145", "\x43\157\156\x66\151\x67\x75\162\x61\x74\151\x6f\156\x20\163\141\166\145\144\x20\163\165\143\x63\x65\x73\x73\x66\165\154\154\171");
        $this->mo_saml_show_success_message();
        Gg:
        if (!self::mo_check_option_admin_referer("\x6d\x6f\137\x61\144\x64\x69\x6e\147\x5f\141\154\164\145\162\x6e\x61\x74\145\x5f\145\156\x76\151\162\x6f\x6e\155\x65\x6e\x74\163")) {
            goto iz;
        }
        if (updateLicenseObjects($_POST)) {
            goto Xe;
        }
        update_option("\x6d\157\137\163\x61\x6d\x6c\x5f\155\145\163\x73\141\x67\145", "\131\157\x75\x72\x20\x63\x68\x61\x6e\x67\x65\163\x20\167\x65\162\x65\40\156\x6f\x74\40\x73\141\166\x65\144\56\x20\x50\154\145\x61\163\145\x20\x70\x72\x6f\x76\151\144\x65\40\165\156\151\161\x75\x65\x20\x76\141\154\x75\x65\x73\40\x66\157\162\x20\171\x6f\x75\162\40\145\x6e\x76\151\x72\x6f\156\x6d\x65\x6e\164\x73\40\x61\156\x64\40\x64\157\x6e\47\164\x20\162\145\155\157\166\x65\40\x74\150\145\x20\x63\165\x72\x72\x65\x6e\x74\x20\145\156\166\151\162\x6f\156\x6d\145\156\164");
        $this->mo_saml_show_error_message();
        goto m_;
        Xe:
        update_option("\155\x6f\137\x73\x61\x6d\154\137\x6d\145\163\163\x61\x67\x65", "\x45\x6e\x76\151\162\157\x6e\x6d\x65\156\164\163\x20\165\160\144\141\164\x65\144\x20\x73\x75\x63\143\145\163\163\146\x75\154\x6c\x79");
        $this->mo_saml_show_success_message();
        m_:
        iz:
        if (!self::mo_check_option_admin_referer("\x6d\x6f\137\x63\150\x61\156\147\145\137\x65\156\x76\x69\x72\x6f\x6e\x65\155\x74")) {
            goto N3;
        }
        update_option("\x6d\x6f\x5f\x73\x61\155\154\137\163\x65\x6c\145\x63\x74\x65\x64\x5f\145\x6e\x76\x69\x72\157\x6e\x6d\x65\x6e\164", $_POST["\145\x6e\166\151\x72\x6f\x6e\x6d\x65\x6e\x74"]);
        update_option("\x6d\x6f\137\163\x61\155\x6c\x5f\155\145\163\x73\141\147\145", "\x45\156\166\x69\162\157\156\x6d\145\x6e\164\40\x63\x68\x61\156\x67\145\144\x20\163\x75\x63\x63\145\163\163\146\x75\x6c\154\171");
        $this->mo_saml_show_success_message();
        N3:
        if (self::mo_check_option_admin_referer("\x6c\157\x67\151\x6e\x5f\x77\151\144\x67\145\x74\x5f\x73\x61\155\154\x5f\x73\x61\166\145\x5f\163\x65\x74\x74\151\x6e\x67\163")) {
            goto Tb;
        }
        if (self::mo_check_option_admin_referer("\x6c\x6f\x67\x69\156\x5f\167\x69\x64\x67\x65\164\x5f\163\141\x6d\x6c\x5f\141\x74\164\162\151\142\165\x74\145\x5f\155\x61\160\160\x69\156\x67")) {
            goto qK;
        }
        if (self::mo_check_option_admin_referer("\143\x6c\145\x61\x72\137\141\164\x74\162\x73\137\x6c\151\163\164")) {
            goto QD;
        }
        if (self::mo_check_option_admin_referer("\x6c\x6f\x67\x69\x6e\137\167\151\x64\x67\x65\x74\x5f\163\141\155\154\x5f\x72\157\154\x65\137\x6d\x61\160\160\151\156\x67")) {
            goto oR1;
        }
        if (self::mo_check_option_admin_referer("\x73\x61\155\154\137\146\x6f\x72\x6d\x5f\144\157\155\141\151\x6e\137\x72\145\163\x74\x72\151\143\x74\151\x6f\x6e\137\x6f\160\x74\x69\x6f\156")) {
            goto m8;
        }
        if (self::mo_check_option_admin_referer("\x6d\x6f\137\163\x61\x6d\x6c\x5f\x75\x70\x64\141\x74\145\137\151\144\160\x5f\163\145\x74\x74\151\x6e\x67\163\137\x6f\160\164\151\x6f\x6e")) {
            goto yy;
        }
        if (!self::mo_check_option_admin_referer("\163\x61\x6d\x6c\137\x75\x70\x6c\157\141\x64\137\155\145\164\141\144\141\164\x61")) {
            goto de;
        }
        if (preg_match("\x2f\136\x5c\167\52\44\57", $_POST["\163\x61\x6d\x6c\137\151\144\145\x6e\x74\151\x74\171\x5f\155\145\164\x61\144\141\x74\x61\137\160\x72\x6f\x76\151\144\x65\162"])) {
            goto cR;
        }
        update_option("\x6d\x6f\137\163\x61\155\154\x5f\155\145\163\x73\141\147\145", "\120\154\145\x61\163\145\x20\155\x61\x74\143\150\x20\164\150\145\x20\x72\x65\x71\x75\145\x73\x74\x65\144\40\x66\157\x72\x6d\141\164\40\x66\x6f\x72\x20\x49\144\145\156\164\151\x74\171\x20\x50\162\x6f\x76\151\144\x65\x72\x20\x4e\141\x6d\x65\x2e\40\x4f\156\x6c\x79\40\141\154\160\x68\141\x62\x65\164\x73\x2c\x20\156\165\x6d\x62\145\x72\163\x20\x61\x6e\x64\40\165\x6e\x64\145\162\x73\x63\157\x72\145\x20\151\x73\x20\x61\x6c\x6c\157\167\x65\144\x2e");
        $this->mo_saml_show_error_message();
        return;
        cR:
        if (function_exists("\x77\160\x5f\150\x61\x6e\144\154\x65\137\x75\x70\154\x6f\x61\144")) {
            goto UF;
        }
        require_once ABSPATH . "\167\160\55\x61\x64\155\151\x6e\57\x69\156\143\x6c\165\144\145\x73\x2f\146\151\154\145\56\x70\x68\160";
        UF:
        $this->_handle_upload_metadata();
        de:
        goto YR;
        yy:
        if (!(isset($_POST["\x6d\x6f\x5f\x73\x61\155\x6c\137\x73\x70\x5f\x62\141\x73\145\x5f\x75\x72\x6c"]) && isset($_POST["\x6d\157\137\x73\x61\x6d\154\x5f\163\x70\137\x65\x6e\164\x69\164\171\137\151\x64"]))) {
            goto Jl;
        }
        $Ca = htmlspecialchars($_POST["\155\157\137\163\141\x6d\154\x5f\163\160\x5f\x62\141\163\145\137\165\x72\154"]);
        $CU = htmlspecialchars($_POST["\x6d\x6f\x5f\x73\x61\155\x6c\x5f\x73\160\137\x65\x6e\x74\x69\164\x79\x5f\x69\x64"]);
        if (!(substr($Ca, -1) == "\57")) {
            goto iV;
        }
        $Ca = substr($Ca, 0, -1);
        iV:
        update_option("\155\x6f\x5f\163\141\x6d\154\137\163\x70\x5f\142\141\x73\x65\137\165\x72\x6c", $Ca);
        update_option("\x6d\x6f\137\163\x61\155\x6c\x5f\x73\x70\x5f\145\156\x74\151\164\x79\x5f\x69\144", $CU);
        Jl:
        update_option("\x6d\x6f\x5f\163\x61\155\x6c\x5f\x6d\x65\x73\x73\x61\x67\145", "\123\145\x74\x74\151\156\x67\x73\40\x75\160\144\141\x74\145\144\x20\163\x75\x63\143\x65\163\163\146\x75\x6c\154\171\56");
        $this->mo_saml_show_success_message();
        YR:
        goto mC;
        m8:
        $Iz = LicenseHelper::getSelectedEnvironment();
        mo_save_environment_settings($_POST);
        if (!($Iz and $Iz != LicenseHelper::getCurrentEnvironment())) {
            goto dB;
        }
        return;
        dB:
        $j9 = isset($_POST["\155\x6f\137\163\x61\x6d\x6c\137\145\156\x61\142\154\x65\137\x64\157\155\141\151\156\137\x72\145\x73\164\x72\x69\143\x74\151\x6f\156\137\154\157\147\151\x6e"]) && !empty($_POST["\x6d\x6f\137\163\141\x6d\x6c\x5f\x65\x6e\141\x62\x6c\145\x5f\x64\157\x6d\141\151\156\x5f\162\145\163\x74\x72\x69\x63\x74\x69\157\156\x5f\154\x6f\147\x69\x6e"]) ? htmlspecialchars($_POST["\x6d\x6f\137\x73\x61\155\x6c\137\145\156\141\x62\154\x65\x5f\144\x6f\x6d\141\x69\156\137\162\x65\x73\164\x72\x69\143\x74\151\x6f\x6e\137\154\157\147\151\156"]) : '';
        $LJ = isset($_POST["\x6d\x6f\137\163\141\x6d\154\x5f\141\154\154\x6f\x77\x5f\144\145\x6e\x79\x5f\165\163\x65\x72\x5f\x77\151\x74\x68\137\x64\x6f\155\141\151\x6e"]) && !empty($_POST["\x6d\157\137\163\141\155\154\137\x61\x6c\x6c\157\x77\137\144\x65\156\x79\x5f\165\x73\x65\162\137\167\151\x74\150\137\144\x6f\x6d\x61\151\156"]) ? htmlspecialchars($_POST["\x6d\157\x5f\163\141\155\154\x5f\141\154\154\157\x77\x5f\144\145\x6e\171\137\x75\163\x65\x72\x5f\x77\x69\x74\150\137\x64\157\x6d\x61\x69\x6e"]) : "\x61\154\x6c\x6f\167";
        $Y9 = isset($_POST["\x73\141\155\x6c\x5f\x61\x6d\x5f\145\155\x61\151\154\137\x64\x6f\155\141\151\x6e\163"]) && !empty($_POST["\x73\141\155\x6c\137\141\x6d\137\145\x6d\x61\151\x6c\137\x64\157\x6d\x61\x69\156\163"]) ? htmlspecialchars($_POST["\163\141\155\154\137\141\x6d\x5f\145\x6d\141\151\154\x5f\x64\x6f\x6d\141\151\156\163"]) : '';
        update_option("\155\157\137\163\141\155\154\137\x65\156\x61\x62\154\x65\x5f\144\x6f\x6d\x61\151\156\x5f\162\x65\163\164\x72\x69\143\164\x69\x6f\x6e\x5f\x6c\157\x67\x69\156", $j9);
        update_option("\155\157\x5f\163\141\x6d\154\x5f\141\154\154\x6f\x77\137\x64\x65\156\x79\137\x75\163\145\162\x5f\167\151\x74\x68\137\x64\x6f\155\141\x69\x6e", $LJ);
        update_option("\163\141\x6d\154\137\x61\155\137\145\x6d\x61\x69\x6c\137\x64\157\x6d\141\x69\156\x73", $Y9);
        update_option("\155\157\137\x73\x61\x6d\154\x5f\x6d\x65\x73\163\141\147\x65", "\104\157\155\x61\151\156\40\x52\145\x73\x74\x72\x69\x63\x74\151\157\156\x20\x68\x61\163\40\142\x65\x65\156\x20\x73\x61\166\145\x64\40\163\165\x63\x63\145\163\x73\146\165\x6c\154\171\56");
        $this->mo_saml_show_success_message();
        mC:
        goto oE;
        oR1:
        $Iz = LicenseHelper::getSelectedEnvironment();
        mo_save_environment_settings($_POST);
        if (!($Iz and $Iz != LicenseHelper::getCurrentEnvironment())) {
            goto zl;
        }
        return;
        zl:
        if (mo_saml_is_extension_installed("\x63\x75\162\154")) {
            goto Cm;
        }
        update_option("\x6d\x6f\x5f\x73\x61\155\154\x5f\x6d\145\x73\163\x61\147\145", "\105\122\122\117\122\x3a\x20\x50\110\120\40\143\x55\x52\x4c\x20\145\170\x74\x65\156\163\x69\x6f\156\40\x69\163\x20\x6e\x6f\x74\40\151\156\163\164\x61\x6c\154\x65\x64\40\157\162\x20\144\151\x73\141\142\x6c\x65\144\x2e\x20\123\141\x76\x65\40\122\157\154\145\40\x4d\141\x70\x70\151\156\x67\x20\x66\x61\151\x6c\145\x64\x2e");
        $this->mo_saml_show_error_message();
        return;
        Cm:
        if (!isset($_POST["\x73\141\155\x6c\x5f\141\155\x5f\x64\145\x66\x61\x75\154\x74\x5f\x75\163\x65\162\x5f\162\x6f\154\x65"])) {
            goto jW;
        }
        $YD = htmlspecialchars($_POST["\x73\141\x6d\154\137\x61\x6d\137\x64\145\146\x61\x75\x6c\164\137\x75\x73\x65\x72\x5f\162\x6f\x6c\145"]);
        update_option("\163\141\x6d\x6c\137\x61\155\137\144\145\146\141\165\154\164\x5f\x75\163\145\x72\x5f\162\x6f\154\145", $YD);
        jW:
        if (isset($_POST["\x73\141\x6d\x6c\x5f\141\155\137\x64\157\x6e\x74\137\141\154\x6c\157\x77\137\x75\x6e\154\151\163\x74\145\144\x5f\165\163\145\162\x5f\x72\x6f\x6c\x65"])) {
            goto oz;
        }
        update_option("\163\141\x6d\154\137\x61\x6d\x5f\144\157\156\164\137\x61\x6c\x6c\157\167\137\x75\156\x6c\x69\x73\x74\x65\x64\x5f\165\163\x65\x72\x5f\162\x6f\x6c\x65", "\x75\156\x63\x68\145\143\153\145\x64");
        goto Sr;
        oz:
        update_option("\x73\141\x6d\x6c\x5f\141\x6d\x5f\144\x65\146\141\x75\x6c\164\x5f\165\x73\145\162\x5f\162\157\x6c\145", false);
        update_option("\163\x61\x6d\x6c\x5f\x61\155\x5f\144\157\156\164\x5f\x61\154\154\157\167\x5f\x75\156\x6c\x69\163\x74\145\144\x5f\165\163\x65\162\137\x72\x6f\154\145", "\x63\150\145\x63\x6b\145\144");
        Sr:
        if (isset($_POST["\155\157\x5f\163\x61\x6d\x6c\137\x64\157\x6e\x74\137\x63\162\x65\141\164\x65\137\165\x73\145\x72\137\x69\146\137\x72\x6f\154\x65\x5f\x6e\157\164\x5f\155\x61\x70\x70\x65\x64"])) {
            goto j4;
        }
        update_option("\155\157\x5f\x73\141\x6d\154\137\144\157\x6e\164\137\x63\x72\x65\x61\x74\x65\137\165\x73\145\162\x5f\x69\146\137\x72\157\154\x65\x5f\x6e\x6f\164\137\155\141\x70\x70\145\144", "\x75\x6e\143\150\x65\x63\153\145\x64");
        goto Ye;
        j4:
        update_option("\x6d\x6f\137\x73\x61\x6d\154\137\144\x6f\x6e\x74\137\x63\x72\x65\141\164\145\137\x75\163\x65\162\x5f\x69\146\x5f\x72\x6f\x6c\145\137\x6e\157\164\x5f\155\141\x70\160\145\x64", "\x63\150\145\x63\153\x65\x64");
        update_option("\x73\x61\155\x6c\137\x61\155\x5f\x64\x65\x66\141\x75\154\x74\x5f\x75\x73\x65\162\x5f\x72\x6f\154\145", false);
        update_option("\163\141\x6d\x6c\137\141\155\x5f\144\157\156\x74\137\141\x6c\x6c\x6f\167\137\x75\156\154\151\x73\x74\x65\144\x5f\x75\x73\x65\162\137\x72\157\154\x65", "\165\x6e\x63\x68\x65\x63\x6b\x65\144");
        Ye:
        if (isset($_POST["\155\x6f\x5f\x73\141\x6d\154\137\144\x6f\156\164\x5f\165\x70\144\x61\164\145\x5f\145\170\x69\163\x74\151\x6e\147\x5f\x75\x73\x65\162\137\162\x6f\154\145"])) {
            goto Tc;
        }
        update_option("\x73\141\x6d\154\137\141\x6d\137\x64\x6f\x6e\164\137\x75\160\144\x61\x74\145\137\145\x78\x69\163\164\151\156\147\137\165\x73\x65\x72\x5f\162\157\154\x65", "\x75\156\143\150\145\x63\x6b\x65\x64");
        goto Ra;
        Tc:
        update_option("\x73\x61\155\154\137\141\x6d\x5f\x64\157\x6e\x74\137\165\x70\144\141\164\145\137\x65\x78\x69\163\x74\x69\x6e\147\137\x75\163\145\x72\x5f\x72\157\x6c\x65", "\x63\x68\145\143\x6b\x65\144");
        Ra:
        if (isset($_POST["\155\x6f\x5f\163\141\x6d\x6c\137\x64\157\x6e\164\x5f\141\x6c\154\x6f\x77\x5f\165\163\x65\x72\137\164\157\x6c\157\x67\x69\x6e\137\x63\x72\x65\x61\x74\x65\137\x77\x69\164\x68\137\147\151\x76\x65\156\x5f\147\162\157\x75\160\163"])) {
            goto NV;
        }
        update_option("\x73\x61\155\x6c\137\x61\155\137\x64\x6f\156\x74\x5f\141\154\154\x6f\167\x5f\165\163\x65\162\137\164\157\154\x6f\147\x69\156\137\143\x72\x65\x61\x74\145\137\x77\151\164\x68\137\147\x69\166\145\156\137\x67\x72\x6f\x75\x70\x73", "\165\156\x63\x68\x65\143\x6b\145\144");
        goto nq;
        NV:
        update_option("\x73\x61\155\x6c\x5f\141\155\x5f\144\x6f\156\x74\137\141\154\154\x6f\x77\137\165\x73\x65\x72\x5f\164\x6f\x6c\x6f\147\151\156\137\143\162\145\x61\x74\x65\137\167\151\164\150\x5f\x67\x69\x76\x65\156\x5f\147\162\x6f\165\160\163", "\143\x68\x65\x63\x6b\x65\x64");
        if (!isset($_POST["\x6d\x6f\137\x73\141\x6d\154\137\x72\145\x73\x74\162\151\143\164\137\165\x73\145\162\x73\137\167\x69\x74\x68\137\x67\x72\157\165\x70\163"])) {
            goto EC;
        }
        if (!empty($_POST["\155\x6f\x5f\163\x61\x6d\x6c\x5f\x72\x65\163\164\x72\x69\143\164\x5f\165\x73\x65\x72\x73\x5f\167\x69\164\150\x5f\x67\x72\x6f\x75\x70\163"])) {
            goto I0;
        }
        update_option("\155\x6f\137\163\x61\x6d\154\137\162\x65\x73\164\x72\x69\x63\164\137\165\x73\145\x72\x73\137\167\x69\164\150\x5f\x67\162\157\x75\160\x73", '');
        goto O1;
        I0:
        update_option("\155\x6f\x5f\x73\x61\155\154\x5f\x72\x65\x73\x74\x72\x69\x63\x74\x5f\165\x73\x65\x72\163\137\x77\x69\x74\150\137\x67\162\157\x75\x70\x73", htmlspecialchars(stripslashes($_POST["\x6d\157\137\163\x61\155\x6c\x5f\x72\x65\163\164\162\x69\x63\x74\x5f\x75\163\145\162\x73\137\167\x69\164\x68\x5f\x67\x72\x6f\165\x70\x73"])));
        O1:
        EC:
        nq:
        $wp_roles = new WP_Roles();
        $Zz = $wp_roles->get_names();
        $Wb = array();
        foreach ($Zz as $wa => $eR) {
            $yD = "\x73\x61\155\154\137\141\155\137\147\162\x6f\165\x70\137\x61\164\164\162\137\x76\141\x6c\165\x65\x73\137" . $wa;
            $Wb[$wa] = htmlspecialchars(stripslashes($_POST[$yD]));
            o9:
        }
        s3:
        update_option("\163\x61\x6d\x6c\x5f\x61\x6d\x5f\x72\x6f\154\145\x5f\155\141\x70\160\151\156\147", $Wb);
        update_option("\155\x6f\137\163\x61\x6d\154\x5f\155\145\x73\163\x61\x67\x65", "\x52\x6f\154\145\x20\115\141\160\x70\x69\156\x67\x20\144\145\x74\x61\x69\154\x73\x20\163\141\x76\145\144\x20\x73\x75\x63\143\x65\x73\163\x66\165\154\154\x79\56");
        $this->mo_saml_show_success_message();
        oE:
        goto XC;
        QD:
        delete_option("\x6d\x6f\137\163\141\155\x6c\x5f\164\x65\x73\x74\x5f\x63\x6f\156\x66\x69\x67\x5f\141\164\x74\x72\x73");
        update_option("\155\157\x5f\x73\x61\155\154\x5f\155\x65\x73\163\x61\147\145", "\101\164\x74\x72\151\142\165\x74\x65\x73\x20\x6c\x69\x73\164\40\162\x65\155\157\166\x65\144\x20\x73\x75\143\x63\x65\x73\x73\146\x75\x6c\x6c\x79");
        $this->mo_saml_show_success_message();
        XC:
        goto bR;
        qK:
        if (mo_saml_is_extension_installed("\x63\x75\162\154")) {
            goto sp;
        }
        update_option("\155\157\137\x73\x61\x6d\x6c\x5f\155\x65\x73\x73\141\x67\145", "\105\122\x52\x4f\122\72\40\120\110\x50\40\143\125\x52\x4c\40\145\170\164\x65\x6e\163\151\157\156\x20\x69\163\40\156\157\x74\40\x69\156\163\x74\x61\154\154\145\144\x20\x6f\x72\x20\x64\x69\x73\141\x62\154\x65\x64\56\x20\123\x61\x76\145\x20\x41\x74\164\x72\x69\x62\x75\164\145\x20\115\141\x70\160\151\156\x67\40\x66\x61\151\x6c\145\144\56");
        $this->mo_saml_show_error_message();
        return;
        sp:
        $Iz = LicenseHelper::getSelectedEnvironment();
        mo_save_environment_settings($_POST);
        if (!($Iz and $Iz != LicenseHelper::getCurrentEnvironment())) {
            goto zH;
        }
        return;
        zH:
        update_option("\x73\x61\155\154\137\x61\155\x5f\165\163\145\x72\156\141\x6d\145", htmlspecialchars(stripslashes($_POST["\163\141\155\x6c\x5f\x61\x6d\137\x75\x73\x65\162\156\141\155\145"])));
        update_option("\x73\x61\x6d\x6c\x5f\x61\x6d\x5f\x65\155\141\x69\x6c", htmlspecialchars(stripslashes($_POST["\x73\x61\x6d\154\137\x61\x6d\x5f\x65\155\141\x69\x6c"])));
        update_option("\163\x61\155\x6c\x5f\141\155\137\x66\151\x72\163\164\137\156\x61\x6d\145", htmlspecialchars(stripslashes($_POST["\x73\x61\155\x6c\137\141\155\137\146\151\162\163\164\x5f\156\141\155\x65"])));
        update_option("\x73\x61\x6d\x6c\x5f\141\155\x5f\x6c\141\x73\x74\137\156\141\155\145", htmlspecialchars(stripslashes($_POST["\x73\x61\x6d\x6c\x5f\141\x6d\x5f\x6c\x61\163\164\137\156\141\155\145"])));
        update_option("\163\141\155\x6c\137\141\x6d\137\147\162\157\x75\160\137\156\141\155\145", htmlspecialchars(stripslashes($_POST["\163\141\155\154\137\x61\155\137\x67\x72\157\x75\160\137\156\141\x6d\145"])));
        update_option("\163\x61\x6d\154\137\x61\x6d\137\x64\x69\x73\160\x6c\141\171\x5f\156\x61\155\145", htmlspecialchars(stripslashes($_POST["\163\x61\x6d\154\x5f\x61\x6d\x5f\x64\151\x73\x70\x6c\141\171\x5f\156\x61\155\x65"])));
        $xw = array();
        $wA = array();
        $Sr = array();
        $i2 = array();
        if (!(isset($_POST["\155\x6f\x5f\163\x61\155\154\x5f\143\x75\x73\164\157\155\137\x61\164\x74\162\151\x62\x75\x74\145\137\153\x65\171\163"]) && !empty($_POST["\155\157\x5f\163\x61\155\154\x5f\x63\x75\163\x74\157\155\x5f\x61\164\164\x72\151\x62\165\164\145\137\153\x65\x79\163"]))) {
            goto xk;
        }
        $wA = $_POST["\155\x6f\137\163\x61\x6d\154\137\x63\165\x73\x74\157\x6d\x5f\141\x74\x74\162\151\142\x75\x74\x65\137\153\x65\171\x73"];
        xk:
        if (!(isset($_POST["\x6d\157\x5f\x73\141\155\154\x5f\143\x75\163\164\157\155\x5f\x61\x74\x74\x72\151\142\165\164\145\x5f\166\141\154\x75\x65\x73"]) && !empty($_POST["\155\157\x5f\x73\x61\155\154\137\x63\x75\163\x74\x6f\155\137\x61\164\x74\x72\151\142\165\164\x65\x5f\166\141\x6c\165\x65\163"]))) {
            goto na;
        }
        $Sr = $_POST["\155\x6f\x5f\x73\x61\155\154\137\x63\165\x73\x74\x6f\155\x5f\141\164\164\162\x69\x62\165\x74\145\137\x76\x61\154\x75\145\163"];
        na:
        $W6 = count($wA);
        if (!($W6 > 0)) {
            goto IT;
        }
        $wA = array_map("\150\x74\x6d\154\x73\x70\145\143\151\141\154\143\150\141\x72\x73", $wA);
        $Sr = array_map("\x68\x74\x6d\154\163\x70\145\143\151\141\154\143\x68\x61\162\x73", $Sr);
        $aT = 0;
        VK:
        if (!($aT < $W6)) {
            goto Wt;
        }
        if (!(isset($_POST["\155\x6f\x5f\163\141\x6d\154\137\144\x69\163\160\x6c\141\171\x5f\x61\x74\164\x72\151\x62\x75\x74\x65\137" . $aT]) && !empty($_POST["\155\x6f\137\163\141\x6d\x6c\x5f\144\151\x73\x70\x6c\x61\x79\137\x61\x74\x74\x72\x69\x62\x75\164\x65\137" . $aT]))) {
            goto NT;
        }
        array_push($i2, $aT);
        NT:
        $aT++;
        goto VK;
        Wt:
        IT:
        update_option("\x73\x61\155\x6c\x5f\163\x68\157\167\137\x75\x73\145\162\137\141\x74\164\x72\151\142\165\164\145", $i2);
        $xw = array_combine($wA, $Sr);
        $xw = array_filter($xw);
        if (!empty($xw)) {
            goto WG;
        }
        $xw = get_option("\155\x6f\137\163\x61\155\x6c\x5f\143\x75\163\x74\x6f\x6d\x5f\x61\x74\164\x72\x73\x5f\x6d\x61\160\160\x69\156\x67");
        if (empty($xw)) {
            goto dd;
        }
        delete_option("\x6d\157\137\x73\x61\x6d\x6c\x5f\143\165\x73\x74\157\155\137\x61\164\164\162\x73\137\155\141\x70\x70\151\x6e\147");
        dd:
        goto K2;
        WG:
        update_option("\x6d\x6f\137\x73\x61\155\154\x5f\143\x75\163\164\157\x6d\x5f\141\x74\x74\162\163\x5f\x6d\x61\x70\160\x69\x6e\x67", $xw);
        K2:
        update_option("\155\157\137\x73\141\x6d\x6c\x5f\x6d\145\163\x73\x61\147\145", "\101\x74\x74\x72\151\142\x75\164\145\x20\115\x61\x70\x70\x69\156\x67\40\x64\145\164\141\151\x6c\163\40\x73\x61\166\x65\x64\40\163\x75\143\x63\x65\163\x73\146\165\154\x6c\x79");
        $this->mo_saml_show_success_message();
        bR:
        goto u1;
        Tb:
        if (mo_saml_is_extension_installed("\x63\165\x72\x6c")) {
            goto DI;
        }
        update_option("\x6d\157\x5f\x73\x61\x6d\x6c\x5f\x6d\145\163\x73\x61\x67\x65", "\x45\x52\x52\x4f\x52\x3a\40\x50\110\120\x20\143\125\x52\x4c\40\145\x78\x74\145\x6e\x73\x69\157\x6e\x20\151\x73\40\156\x6f\164\x20\x69\156\x73\x74\x61\x6c\154\145\x64\x20\x6f\162\x20\144\x69\163\141\142\x6c\145\x64\x2e\x20\x53\x61\x76\x65\40\111\144\145\x6e\164\151\164\171\40\120\x72\157\166\151\144\145\x72\40\x43\x6f\156\146\151\147\x75\x72\141\x74\x69\x6f\156\40\x66\x61\151\x6c\x65\x64\56");
        $this->mo_saml_show_error_message();
        return;
        DI:
        $Iz = LicenseHelper::getSelectedEnvironment();
        mo_save_environment_settings($_POST);
        if (!($Iz and $Iz != LicenseHelper::getCurrentEnvironment())) {
            goto zZ;
        }
        return;
        zZ:
        $Mc = '';
        $gP = '';
        $Lx = '';
        $Ql = '';
        $X9 = '';
        $Vn = '';
        $xY = '';
        $fe = '';
        $ml = '';
        if ($this->mo_saml_check_empty_or_null($_POST["\x73\141\155\x6c\x5f\151\x64\145\156\164\x69\164\x79\137\x6e\x61\155\145"]) || $this->mo_saml_check_empty_or_null($_POST["\163\141\155\154\x5f\154\157\x67\x69\x6e\x5f\165\x72\x6c"]) || $this->mo_saml_check_empty_or_null($_POST["\x73\x61\155\x6c\137\151\163\x73\165\x65\x72"]) || $this->mo_saml_check_empty_or_null($_POST["\163\x61\155\154\137\156\141\x6d\x65\151\x64\137\146\157\162\x6d\141\164"])) {
            goto sE;
        }
        if (!preg_match("\x2f\136\134\167\52\x24\57", $_POST["\163\141\155\x6c\x5f\151\144\x65\x6e\164\151\x74\171\137\156\x61\155\145"])) {
            goto V2;
        }
        $Mc = htmlspecialchars(trim($_POST["\163\x61\x6d\154\x5f\x69\x64\x65\156\x74\151\x74\x79\x5f\x6e\x61\155\x65"]));
        $Lx = htmlspecialchars(trim($_POST["\163\x61\x6d\154\x5f\x6c\x6f\x67\151\x6e\137\165\x72\x6c"]));
        if (!array_key_exists("\x73\141\155\154\137\154\x6f\147\x69\156\137\x62\x69\156\144\151\x6e\x67\137\x74\171\160\x65", $_POST)) {
            goto uc;
        }
        $gP = htmlspecialchars($_POST["\163\x61\x6d\x6c\137\x6c\x6f\x67\x69\156\x5f\x62\151\x6e\144\151\156\147\x5f\164\171\x70\x65"]);
        uc:
        if (!array_key_exists("\163\141\155\154\137\x6c\157\x67\157\x75\164\137\x62\x69\x6e\x64\x69\156\x67\137\x74\171\x70\145", $_POST)) {
            goto yZ;
        }
        $Ql = htmlspecialchars($_POST["\163\141\155\154\137\154\x6f\x67\157\x75\x74\x5f\x62\x69\x6e\144\x69\x6e\147\x5f\164\171\x70\145"]);
        yZ:
        if (!array_key_exists("\163\141\155\x6c\x5f\154\x6f\x67\157\165\164\x5f\165\162\154", $_POST)) {
            goto X2;
        }
        $X9 = htmlspecialchars(trim($_POST["\163\141\x6d\154\137\154\x6f\x67\x6f\x75\x74\x5f\x75\162\x6c"]));
        X2:
        $Vn = htmlspecialchars(trim($_POST["\x73\x61\155\154\x5f\x69\163\x73\x75\145\162"]));
        $v_ = htmlspecialchars(trim($_POST["\163\141\155\x6c\137\x69\x64\145\156\164\151\164\171\x5f\160\162\x6f\x76\151\x64\145\x72\x5f\x67\165\x69\144\x65\x5f\x6e\x61\155\145"]));
        $xY = $_POST["\163\x61\x6d\x6c\x5f\170\x35\60\71\x5f\x63\145\162\164\151\146\x69\x63\141\164\x65"];
        $ml = htmlspecialchars($_POST["\x73\x61\155\154\137\156\141\155\145\x69\144\137\x66\157\x72\x6d\141\x74"]);
        goto qg;
        V2:
        update_option("\155\x6f\137\x73\x61\x6d\x6c\x5f\155\x65\163\163\x61\147\x65", "\x50\x6c\145\141\x73\145\x20\x6d\x61\164\x63\x68\x20\x74\x68\145\x20\x72\x65\161\x75\x65\x73\x74\145\144\x20\146\157\x72\x6d\x61\x74\x20\x66\157\162\40\x49\144\145\x6e\164\x69\x74\x79\x20\120\162\x6f\x76\151\144\x65\x72\x20\116\x61\155\145\56\x20\x4f\156\x6c\171\40\141\x6c\160\150\x61\142\145\x74\163\54\40\156\165\155\x62\x65\162\163\40\x61\x6e\x64\40\x75\156\x64\145\x72\x73\x63\x6f\x72\x65\40\x69\163\40\141\x6c\x6c\157\167\x65\x64\56");
        $this->mo_saml_show_error_message();
        return;
        qg:
        goto B1;
        sE:
        update_option("\155\x6f\137\163\x61\155\x6c\137\155\145\163\163\x61\x67\145", "\101\154\x6c\40\x74\150\x65\x20\x66\151\145\154\x64\x73\40\141\x72\145\40\x72\145\161\x75\151\162\145\144\56\x20\120\154\145\141\163\x65\x20\145\x6e\x74\x65\x72\x20\166\141\154\x69\x64\40\x65\x6e\164\x72\x69\x65\x73\56");
        $this->mo_saml_show_error_message();
        return;
        B1:
        update_option("\163\141\155\x6c\137\x69\144\145\x6e\164\x69\164\171\x5f\x6e\x61\155\x65", $Mc);
        update_option("\163\141\x6d\154\x5f\x6c\157\x67\x69\x6e\137\x62\x69\x6e\144\151\156\x67\137\x74\171\160\145", $gP);
        update_option("\x73\x61\x6d\x6c\137\x6c\157\x67\x69\x6e\x5f\165\x72\x6c", $Lx);
        update_option("\x73\141\155\154\x5f\x6c\x6f\147\157\x75\164\x5f\x62\x69\156\144\151\x6e\147\x5f\164\171\x70\145", $Ql);
        update_option("\x73\141\155\154\137\x6c\157\x67\x6f\165\164\x5f\x75\x72\x6c", $X9);
        update_option("\163\141\155\154\137\151\163\163\165\x65\x72", $Vn);
        update_option("\163\x61\155\154\x5f\156\x61\x6d\145\x69\144\137\146\157\x72\x6d\x61\164", $ml);
        update_option("\163\x61\155\154\137\151\144\x65\156\x74\x69\x74\171\137\x70\162\x6f\x76\151\144\145\x72\x5f\x67\165\151\144\145\137\x6e\x61\x6d\x65", $v_);
        if (isset($_POST["\x73\141\155\x6c\x5f\162\145\161\165\x65\163\164\x5f\x73\x69\x67\156\x65\144"])) {
            goto jf;
        }
        update_option("\163\x61\x6d\x6c\x5f\x72\145\x71\165\145\x73\164\x5f\x73\x69\x67\x6e\145\144", "\165\156\143\150\x65\x63\x6b\x65\144");
        goto y3;
        jf:
        update_option("\163\141\155\154\137\x72\x65\161\x75\145\x73\164\x5f\x73\x69\147\x6e\145\144", "\x63\x68\x65\143\x6b\x65\144");
        y3:
        foreach ($xY as $Ej => $j1) {
            if (empty($j1)) {
                goto um;
            }
            $xY[$Ej] = SAMLSPUtilities::sanitize_certificate($j1);
            if (@openssl_x509_read($xY[$Ej])) {
                goto mo;
            }
            update_option("\x6d\x6f\137\x73\x61\x6d\x6c\137\155\x65\163\x73\141\x67\x65", "\x49\156\x76\141\x6c\151\144\x20\x63\x65\162\x74\x69\x66\x69\x63\x61\164\145\x3a\x20\x50\154\145\x61\x73\145\40\160\x72\x6f\x76\x69\x64\145\40\x61\40\166\x61\154\x69\144\40\143\145\162\164\151\146\x69\x63\x61\x74\x65\56");
            $this->mo_saml_show_error_message();
            delete_option("\x73\141\x6d\x6c\137\x78\65\60\x39\137\143\x65\x72\164\151\x66\151\x63\x61\164\x65");
            return;
            mo:
            goto x6;
            um:
            unset($xY[$Ej]);
            x6:
            Xt:
        }
        zb:
        if (!empty($xY)) {
            goto oG;
        }
        update_option("\x6d\x6f\137\x73\x61\x6d\154\137\155\145\163\163\x61\x67\x65", "\x49\x6e\x76\x61\x6c\151\144\40\103\145\x72\164\151\x66\151\143\x61\x74\x65\x3a\120\154\145\x61\163\145\40\x70\x72\x6f\166\151\144\x65\x20\x61\40\x63\x65\162\x74\x69\x66\x69\x63\141\x74\x65");
        $this->mo_saml_show_error_message();
        return;
        oG:
        update_option("\x73\141\155\154\137\x78\65\x30\x39\137\x63\x65\x72\164\x69\146\151\x63\141\x74\145", maybe_serialize($xY));
        if (isset($_POST["\163\x61\155\x6c\x5f\x72\x65\x73\x70\x6f\x6e\163\x65\x5f\x73\151\147\156\145\144"])) {
            goto o3;
        }
        update_option("\x73\141\155\x6c\137\162\x65\163\x70\157\x6e\163\145\x5f\163\151\147\156\x65\144", "\x59\x65\163");
        goto p1;
        o3:
        update_option("\x73\141\155\154\x5f\x72\x65\163\160\157\156\163\145\137\x73\151\x67\156\x65\144", "\x63\150\145\143\153\145\144");
        p1:
        if (isset($_POST["\163\x61\155\154\137\x61\163\163\x65\x72\164\x69\157\156\x5f\163\x69\x67\156\145\x64"])) {
            goto Mh;
        }
        update_option("\x73\141\x6d\x6c\x5f\x61\x73\163\145\x72\x74\151\x6f\156\x5f\163\x69\x67\156\145\144", "\131\145\163");
        goto MV;
        Mh:
        update_option("\x73\141\155\x6c\137\141\x73\163\145\x72\x74\151\x6f\156\137\163\151\147\x6e\x65\144", "\x63\x68\x65\x63\x6b\145\x64");
        MV:
        if (array_key_exists("\155\x6f\137\x73\141\x6d\154\x5f\145\156\143\157\x64\x69\156\147\x5f\x65\156\141\142\154\x65\x64", $_POST)) {
            goto Yu;
        }
        update_option("\155\157\137\x73\141\155\x6c\137\x65\x6e\x63\157\144\151\x6e\147\x5f\x65\156\141\142\154\x65\144", "\x75\156\x63\150\145\143\153\x65\144");
        goto Ts;
        Yu:
        update_option("\x6d\157\137\x73\x61\155\x6c\x5f\x65\x6e\143\x6f\x64\151\156\147\137\x65\x6e\x61\142\x6c\145\144", "\x63\x68\x65\143\153\x65\x64");
        Ts:
        update_option("\155\x6f\x5f\x73\141\x6d\x6c\137\155\x65\163\163\x61\147\145", "\111\144\x65\x6e\x74\151\x74\x79\40\x50\x72\157\166\x69\144\145\162\x20\144\x65\164\x61\151\x6c\163\40\163\141\166\145\144\40\163\x75\x63\x63\x65\x73\x73\146\x75\154\x6c\171\x2e");
        $this->mo_saml_show_success_message();
        u1:
        if (!self::mo_check_option_admin_referer("\x75\160\x67\x72\141\x64\x65\x5f\143\145\x72\164")) {
            goto wG;
        }
        $Km = file_get_contents(plugin_dir_path(__FILE__) . "\162\x65\x73\x6f\165\162\x63\145\x73" . DIRECTORY_SEPARATOR . "\155\x69\x6e\151\157\x72\141\x6e\x67\145\137\x73\x70\x5f\62\x30\x32\x30\56\x63\162\x74");
        $bq = file_get_contents(plugin_dir_path(__FILE__) . "\162\x65\x73\x6f\165\x72\143\145\x73" . DIRECTORY_SEPARATOR . "\155\x69\x6e\x69\x6f\162\141\156\x67\x65\x5f\x73\160\137\x32\60\x32\x30\137\x70\162\151\166\x2e\x6b\x65\171");
        update_option("\155\157\x5f\x73\x61\x6d\x6c\x5f\x63\165\x72\x72\x65\x6e\164\x5f\143\x65\x72\164", $Km);
        update_option("\x6d\x6f\137\x73\x61\155\154\137\x63\165\162\x72\x65\156\x74\x5f\143\x65\162\x74\137\x70\x72\151\166\141\x74\x65\x5f\153\145\171", $bq);
        update_option("\155\157\137\x73\x61\155\x6c\137\143\145\x72\x74\x69\x66\x69\143\141\x74\x65\137\x72\157\x6c\154\x5f\142\x61\x63\x6b\137\x61\x76\x61\151\154\x61\142\x6c\145", true);
        update_option("\155\157\137\163\x61\x6d\154\x5f\155\145\x73\163\141\147\145", "\x43\145\x72\x74\151\146\x69\x63\x61\x74\145\x20\x55\160\x67\162\x61\x64\145\144\40\163\165\x63\x63\145\x73\163\x66\x75\x6c\154\x79");
        $this->mo_saml_show_success_message();
        wG:
        if (!self::mo_check_option_admin_referer("\162\x6f\154\154\142\x61\x63\153\137\x63\x65\x72\x74")) {
            goto J0;
        }
        $Km = file_get_contents(plugin_dir_path(__FILE__) . "\162\145\163\157\165\x72\143\145\163" . DIRECTORY_SEPARATOR . "\163\160\x2d\143\145\162\164\151\146\151\x63\141\164\x65\56\x63\162\x74");
        $bq = file_get_contents(plugin_dir_path(__FILE__) . "\x72\x65\163\157\165\x72\x63\145\x73" . DIRECTORY_SEPARATOR . "\163\x70\x2d\x6b\145\171\56\153\145\171");
        update_option("\155\x6f\x5f\x73\x61\x6d\x6c\137\143\165\162\x72\x65\x6e\x74\137\x63\145\x72\x74", $Km);
        update_option("\x6d\x6f\137\x73\x61\x6d\x6c\137\143\165\x72\162\145\156\x74\x5f\x63\145\x72\164\137\160\162\151\166\x61\x74\145\137\x6b\145\171", $bq);
        update_option("\155\157\x5f\x73\x61\155\154\137\155\145\x73\163\141\147\x65", "\103\145\162\164\151\146\151\143\141\164\x65\x20\x52\x6f\154\x6c\55\x62\x61\143\153\x65\144\40\163\x75\143\x63\x65\x73\x73\146\165\154\x6c\x79");
        delete_option("\x6d\x6f\x5f\x73\141\x6d\x6c\137\x63\x65\162\164\151\x66\151\143\x61\164\x65\x5f\162\x6f\x6c\x6c\137\142\141\143\153\137\x61\166\x61\x69\x6c\141\x62\154\x65");
        $this->mo_saml_show_success_message();
        J0:
        if (self::mo_check_option_admin_referer("\141\x64\144\137\143\x75\x73\x74\157\x6d\137\143\145\x72\x74\x69\146\x69\x63\x61\164\x65")) {
            goto qY;
        }
        if (self::mo_check_option_admin_referer("\x61\x64\x64\137\143\x75\163\x74\x6f\155\137\x6d\145\x73\163\x61\147\x65\163")) {
            goto Wq;
        }
        if (!self::mo_check_option_admin_referer("\155\x6f\137\163\141\x6d\x6c\137\x72\145\154\x61\171\x5f\x73\x74\141\x74\x65\x5f\157\160\x74\x69\x6f\x6e")) {
            goto TM;
        }
        if (isset($_POST["\x6d\157\137\x73\141\155\154\x5f\x73\145\x6e\144\137\x61\142\x73\157\x6c\x75\x74\x65\x5f\162\145\154\141\x79\137\x73\x74\x61\164\x65"]) and !empty($_POST["\x6d\157\x5f\163\x61\155\x6c\137\163\x65\156\144\x5f\x61\142\163\x6f\x6c\165\x74\145\137\x72\145\154\x61\x79\x5f\163\x74\x61\x74\x65"])) {
            goto Lp;
        }
        $Iv = false;
        goto gn;
        Lp:
        $Iv = true;
        gn:
        $VK = isset($_POST["\155\x6f\x5f\163\x61\x6d\154\137\162\x65\x6c\141\171\137\x73\164\x61\164\145"]) ? htmlspecialchars($_POST["\x6d\x6f\x5f\163\141\155\x6c\x5f\x72\145\x6c\141\171\137\163\x74\141\164\x65"]) : '';
        $Er = isset($_POST["\155\157\137\163\x61\x6d\x6c\137\154\x6f\x67\x6f\165\x74\x5f\x72\145\x6c\141\x79\137\x73\164\141\164\x65"]) ? htmlspecialchars($_POST["\155\157\x5f\163\141\155\x6c\137\x6c\x6f\x67\157\x75\x74\137\x72\x65\154\x61\171\x5f\163\x74\141\164\x65"]) : '';
        update_option("\155\x6f\x5f\163\x61\155\x6c\137\x72\x65\x6c\141\171\x5f\x73\x74\141\x74\145", $VK);
        update_option("\x6d\157\137\x73\141\x6d\154\x5f\154\157\147\x6f\x75\x74\137\x72\x65\154\x61\171\x5f\x73\164\141\x74\x65", $Er);
        update_option("\155\157\x5f\163\141\x6d\154\x5f\x73\x65\x6e\144\137\x61\x62\x73\157\x6c\165\x74\145\137\162\145\x6c\x61\171\137\163\x74\x61\164\x65", $Iv);
        update_option("\x6d\157\137\x73\x61\155\154\137\x6d\145\163\163\141\x67\x65", "\x52\x65\x6c\141\171\40\x53\x74\141\164\145\40\x75\160\x64\141\x74\145\x64\40\163\x75\x63\143\145\x73\x73\146\x75\x6c\x6c\x79\56");
        $this->mo_saml_show_success_message();
        TM:
        goto Fi;
        Wq:
        update_option("\155\x6f\x5f\x73\141\155\x6c\x5f\x61\x63\143\x6f\165\x6e\x74\x5f\x63\162\145\x61\164\151\157\x6e\137\x64\151\x73\141\x62\x6c\145\x64\137\155\163\x67", htmlspecialchars($_POST["\155\157\137\x73\141\x6d\154\x5f\x61\143\x63\157\x75\156\164\x5f\143\x72\x65\141\x74\x69\x6f\x6e\x5f\144\x69\163\141\142\x6c\145\x64\137\x6d\163\x67"]));
        update_option("\x6d\x6f\x5f\163\x61\155\x6c\137\162\x65\x73\x74\162\151\x63\x74\x65\x64\x5f\144\x6f\x6d\x61\151\156\137\145\162\x72\x6f\162\x5f\x6d\x73\147", htmlspecialchars($_POST["\155\x6f\137\x73\141\x6d\x6c\x5f\x72\x65\163\164\x72\151\143\x74\145\144\137\144\x6f\155\141\151\x6e\137\x65\x72\162\157\x72\x5f\155\163\x67"]));
        update_option("\x6d\157\x5f\x73\141\x6d\x6c\137\155\x65\x73\163\141\x67\x65", "\x43\157\x6e\x66\151\147\165\162\x61\164\x69\x6f\156\x20\x68\x61\163\40\142\145\x65\x6e\x20\163\141\166\145\144\x20\x73\165\x63\143\145\x73\x73\x66\165\154\154\171\x2e");
        $this->mo_saml_show_success_message();
        Fi:
        goto AB;
        qY:
        $Km = file_get_contents(plugin_dir_path(__FILE__) . "\162\145\x73\157\x75\162\143\x65\163" . DIRECTORY_SEPARATOR . "\x6d\151\156\151\x6f\x72\x61\x6e\x67\145\x5f\163\x70\137\x32\x30\x32\x30\56\143\x72\x74");
        $bq = file_get_contents(plugin_dir_path(__FILE__) . "\x72\145\x73\157\165\162\x63\145\x73" . DIRECTORY_SEPARATOR . "\x6d\x69\x6e\151\x6f\x72\x61\x6e\x67\x65\137\163\x70\x5f\62\60\x32\x30\x5f\160\x72\x69\x76\56\x6b\145\171");
        if (isset($_POST["\163\165\142\155\x69\x74"]) and $_POST["\163\165\142\x6d\x69\x74"] == "\x55\160\x6c\157\x61\144") {
            goto Ud;
        }
        if (!(isset($_POST["\x73\x75\x62\x6d\x69\164"]) and $_POST["\163\x75\142\155\151\164"] == "\x52\x65\x73\x65\x74")) {
            goto Fx;
        }
        delete_option("\x6d\157\137\x73\141\x6d\x6c\137\143\x75\x73\164\157\155\x5f\143\145\162\x74");
        delete_option("\155\157\x5f\163\x61\x6d\x6c\x5f\x63\165\x73\164\157\x6d\x5f\143\x65\162\164\x5f\x70\162\151\166\x61\164\145\137\x6b\145\171");
        update_option("\x6d\x6f\x5f\x73\141\155\154\x5f\143\165\162\162\145\x6e\164\137\143\145\162\164", $Km);
        update_option("\x6d\157\137\163\x61\155\154\x5f\143\x75\x72\x72\x65\x6e\164\x5f\143\x65\x72\164\x5f\x70\162\151\166\141\164\145\x5f\x6b\145\x79", $bq);
        update_option("\x6d\x6f\137\x73\141\155\x6c\x5f\x6d\145\x73\163\x61\147\145", "\x52\x65\163\x65\164\40\x43\x65\162\164\151\x66\151\x63\x61\164\145\x20\163\x75\x63\x63\x65\163\x73\x66\x75\x6c\154\x79\56");
        $this->mo_saml_show_success_message();
        Fx:
        goto zU;
        Ud:
        if (!@openssl_x509_read($_POST["\163\x61\x6d\x6c\x5f\x70\165\x62\x6c\x69\x63\137\x78\x35\x30\x39\137\x63\145\x72\164\151\x66\x69\143\x61\x74\145"])) {
            goto OJ;
        }
        if (!@openssl_x509_check_private_key($_POST["\x73\141\x6d\154\x5f\160\165\142\x6c\151\x63\137\170\x35\x30\71\137\x63\145\162\164\151\146\x69\143\141\164\145"], $_POST["\x73\141\x6d\x6c\x5f\x70\162\x69\x76\141\164\x65\x5f\x78\x35\x30\x39\137\143\145\x72\164\151\146\151\143\x61\x74\145"])) {
            goto oF;
        }
        if (openssl_x509_read($_POST["\163\x61\x6d\x6c\x5f\x70\x75\x62\154\151\143\x5f\170\65\60\71\x5f\143\145\x72\164\x69\146\x69\x63\141\x74\145"]) && openssl_x509_check_private_key($_POST["\163\x61\x6d\x6c\137\160\x75\142\154\151\143\x5f\x78\x35\x30\71\137\143\x65\162\164\x69\x66\151\x63\x61\164\x65"], $_POST["\163\x61\x6d\154\137\160\x72\151\166\x61\x74\145\x5f\x78\65\x30\71\x5f\x63\145\x72\x74\x69\146\151\143\141\164\145"])) {
            goto zs;
        }
        goto Yd;
        OJ:
        update_option("\x6d\x6f\x5f\x73\141\155\x6c\137\155\145\x73\x73\x61\147\x65", "\x49\x6e\166\141\x6c\151\x64\40\103\x65\x72\x74\151\146\151\x63\141\164\x65\40\x66\157\x72\x6d\x61\x74\56\x20\120\x6c\x65\x61\163\145\x20\145\x6e\164\145\x72\x20\141\40\166\x61\154\x69\144\40\x63\x65\x72\x74\151\x66\151\143\141\x74\145\56");
        $this->mo_saml_show_error_message();
        return;
        goto Yd;
        oF:
        update_option("\x6d\x6f\137\163\x61\x6d\x6c\x5f\155\145\163\163\141\147\x65", "\x49\x6e\x76\141\154\151\144\40\120\162\x69\x76\x61\x74\x65\x20\113\145\171\56");
        $this->mo_saml_show_error_message();
        return;
        goto Yd;
        zs:
        $sU = $_POST["\x73\x61\x6d\x6c\x5f\160\x75\142\x6c\x69\143\137\x78\65\x30\x39\137\x63\x65\x72\x74\151\x66\x69\143\141\x74\x65"];
        $Qx = $_POST["\x73\141\x6d\154\x5f\160\x72\x69\166\x61\x74\x65\137\x78\x35\60\x39\x5f\143\x65\x72\x74\x69\x66\151\x63\x61\x74\x65"];
        update_option("\x6d\157\137\x73\141\155\x6c\137\x63\165\163\x74\x6f\155\137\143\145\162\164", $sU);
        update_option("\x6d\x6f\x5f\x73\x61\155\x6c\137\143\165\163\x74\157\x6d\x5f\x63\145\162\x74\137\160\x72\151\x76\x61\164\145\137\x6b\145\x79", $Qx);
        update_option("\x6d\157\137\163\x61\155\154\x5f\x63\165\x72\162\145\156\164\137\143\145\x72\164", $sU);
        update_option("\155\x6f\137\163\141\x6d\154\137\x63\165\162\162\145\x6e\164\137\x63\145\x72\164\x5f\x70\162\x69\166\x61\x74\145\x5f\x6b\x65\x79", $Qx);
        update_option("\155\157\137\163\x61\x6d\x6c\x5f\x6d\x65\163\163\141\x67\x65", "\x43\x75\x73\x74\157\155\40\x43\145\x72\164\x69\x66\x69\143\141\164\145\x20\x75\x70\x64\141\x74\x65\144\40\x73\165\143\x63\x65\163\x73\x66\x75\x6c\x6c\171\x2e");
        $this->mo_saml_show_success_message();
        Yd:
        zU:
        AB:
        if (self::mo_check_option_admin_referer("\155\x6f\x5f\x73\x61\x6d\x6c\x5f\x77\x69\x64\x67\x65\x74\x5f\157\160\x74\151\x6f\x6e")) {
            goto sl;
        }
        if (self::mo_check_option_admin_referer("\155\157\x5f\163\x61\x6d\154\137\162\145\147\151\x73\x74\145\x72\x5f\143\165\163\x74\157\x6d\145\x72")) {
            goto Mo;
        }
        if (self::mo_check_option_admin_referer("\155\157\x5f\x73\141\x6d\154\x5f\x76\x61\154\151\144\x61\x74\x65\x5f\157\164\160")) {
            goto J3;
        }
        if (self::mo_check_option_admin_referer("\155\157\137\163\x61\155\154\x5f\x76\x65\162\x69\x66\171\x5f\143\165\x73\164\157\155\145\x72")) {
            goto R9;
        }
        if (self::mo_check_option_admin_referer("\x6d\x6f\x5f\x73\141\155\154\137\x63\157\x6e\x74\141\x63\x74\137\165\x73\137\161\x75\145\x72\171\137\x6f\x70\x74\151\157\x6e")) {
            goto cS;
        }
        if (self::mo_check_option_admin_referer("\155\x6f\137\x73\141\155\154\137\x72\x65\163\x65\156\144\137\x6f\x74\160\137\145\155\141\x69\154")) {
            goto SL;
        }
        if (self::mo_check_option_admin_referer("\x6d\x6f\137\x73\x61\x6d\154\137\x72\145\163\145\x6e\x64\137\157\164\x70\x5f\160\150\x6f\x6e\145")) {
            goto NS;
        }
        if (self::mo_check_option_admin_referer("\155\x6f\137\x73\x61\155\154\x5f\147\157\137\x62\x61\x63\x6b")) {
            goto IK;
        }
        if (self::mo_check_option_admin_referer("\155\157\x5f\163\x61\155\x6c\137\162\x65\x67\x69\x73\164\145\162\x5f\167\x69\164\x68\x5f\160\150\157\156\145\x5f\x6f\160\x74\151\x6f\156")) {
            goto EM;
        }
        if (self::mo_check_option_admin_referer("\x6d\157\x5f\x73\x61\155\x6c\x5f\x72\145\147\x69\x73\164\145\162\x65\144\x5f\x6f\x6e\154\171\137\x61\143\143\x65\163\163\137\157\160\x74\x69\x6f\x6e")) {
            goto cB;
        }
        if (self::mo_check_option_admin_referer("\155\x6f\x5f\x73\141\x6d\x6c\137\x72\145\144\x69\162\145\143\x74\x5f\164\157\x5f\167\x70\137\x6c\x6f\x67\151\156\137\157\x70\164\x69\157\156")) {
            goto OZ;
        }
        if (self::mo_check_option_admin_referer("\x6d\x6f\x5f\x73\141\x6d\x6c\137\146\x6f\x72\143\145\137\x61\x75\x74\150\145\156\x74\151\143\x61\x74\x69\x6f\156\x5f\157\x70\164\151\x6f\x6e")) {
            goto zT;
        }
        if (self::mo_check_option_admin_referer("\155\x6f\137\x73\141\155\x6c\x5f\145\x6e\141\x62\154\145\137\162\163\x73\x5f\141\143\x63\145\163\163\x5f\157\160\x74\x69\x6f\156")) {
            goto D3;
        }
        if (self::mo_check_option_admin_referer("\155\157\137\x73\141\155\154\x5f\145\x6e\x61\x62\x6c\x65\137\x6c\157\147\151\156\x5f\162\x65\x64\x69\x72\x65\x63\164\x5f\x6f\160\164\151\x6f\156")) {
            goto MH;
        }
        if (self::mo_check_option_admin_referer("\x6d\157\137\x73\141\x6d\154\137\x61\x64\x64\137\163\163\157\x5f\x62\x75\x74\164\x6f\x6e\x5f\167\160\137\x6f\160\164\x69\x6f\156")) {
            goto ve;
        }
        if (self::mo_check_option_admin_referer("\x6d\x6f\137\163\x61\x6d\154\137\165\x73\145\137\142\x75\164\164\157\156\137\x61\x73\137\x73\150\x6f\x72\x74\x63\x6f\144\x65\137\x6f\x70\164\151\157\x6e")) {
            goto TE;
        }
        if (self::mo_check_option_admin_referer("\155\157\x5f\x73\141\155\154\x5f\165\163\145\x5f\x62\165\164\x74\157\x6e\x5f\x61\163\137\x77\x69\144\147\145\x74\137\x6f\160\x74\151\157\x6e")) {
            goto TT;
        }
        if (self::mo_check_option_admin_referer("\x6d\x6f\x5f\x73\141\155\154\x5f\141\x6c\154\157\167\x5f\x77\160\x5f\x73\x69\147\x6e\151\156\x5f\157\x70\164\x69\157\x6e")) {
            goto Q6;
        }
        if (self::mo_check_option_admin_referer("\155\157\x5f\163\x61\155\x6c\x5f\143\x75\163\164\157\x6d\x5f\142\x75\x74\164\x6f\x6e\x5f\x6f\160\x74\x69\x6f\156")) {
            goto Uc;
        }
        if (self::mo_check_option_admin_referer("\155\157\137\x73\141\155\154\137\x66\x6f\x72\147\157\164\137\x70\x61\x73\x73\x77\157\x72\x64\x5f\146\x6f\x72\155\x5f\x6f\160\164\x69\157\156")) {
            goto Bs;
        }
        if (self::mo_check_option_admin_referer("\x6d\157\x5f\163\141\x6d\x6c\137\x76\145\162\x69\146\171\137\154\151\x63\x65\x6e\x73\x65")) {
            goto lo;
        }
        if (self::mo_check_option_admin_referer("\155\157\137\x73\x61\155\154\137\x66\162\x65\x65\x5f\164\162\151\x61\x6c")) {
            goto f9;
        }
        if (self::mo_check_option_admin_referer("\155\x6f\x5f\163\141\x6d\154\137\x63\x68\145\x63\x6b\137\154\x69\x63\x65\x6e\163\145")) {
            goto Wk;
        }
        if (!self::mo_check_option_admin_referer("\155\x6f\137\x73\x61\x6d\x6c\x5f\162\145\x6d\157\166\x65\x5f\x61\143\143\x6f\x75\156\164")) {
            goto E7;
        }
        $this->mo_sso_saml_deactivate();
        add_option("\155\157\137\x73\x61\x6d\154\x5f\162\x65\x67\x69\163\x74\x72\141\x74\151\x6f\156\x5f\163\x74\141\x74\165\163", "\162\x65\x6d\x6f\x76\145\x64\x5f\141\x63\143\157\165\x6e\x74");
        $xz = add_query_arg(array("\x74\141\x62" => "\x6c\157\x67\151\156"), $_SERVER["\122\x45\121\125\x45\123\124\137\x55\122\x49"]);
        header("\x4c\x6f\x63\x61\164\151\157\x6e\x3a\40" . $xz);
        E7:
        goto hG;
        Wk:
        LicenseHelper::migrateExistingEnvironments();
        $e9 = new Customersaml();
        $mw = $e9->check_customer_ln();
        if ($mw) {
            goto qd;
        }
        return;
        qd:
        $mw = json_decode($mw, true);
        if (strcasecmp($mw["\x73\164\x61\164\x75\163"], "\123\125\x43\x43\105\x53\123") == 0) {
            goto M5;
        }
        $Ej = get_option("\155\157\137\x73\x61\x6d\x6c\x5f\143\x75\163\164\157\x6d\x65\162\x5f\x74\x6f\153\x65\x6e");
        update_option("\163\x69\164\x65\x5f\x63\x6b\137\x6c", AESEncryption::encrypt_data("\x66\141\x6c\x73\145", $Ej));
        $xz = add_query_arg(array("\164\141\x62" => "\154\x69\x63\x65\x6e\163\x69\156\x67"), $_SERVER["\x52\x45\x51\x55\x45\x53\x54\137\125\122\x49"]);
        update_option("\155\157\137\x73\x61\155\x6c\x5f\155\x65\x73\x73\x61\x67\145", "\131\157\165\x20\x68\141\166\145\40\x6e\157\164\40\165\x70\147\162\x61\144\x65\x64\x20\x79\145\164\56\40" . addLink("\x43\154\x69\143\153\x20\150\145\x72\x65", $xz) . "\40\164\x6f\40\165\160\x67\162\141\144\145\x20\x74\x6f\x20\x70\x72\145\155\x69\x75\155\x20\166\145\162\163\151\157\156\x2e");
        $this->mo_saml_show_error_message();
        goto Oa;
        M5:
        if (array_key_exists("\154\151\x63\x65\x6e\163\145\x50\154\141\x6e", $mw) && !$this->mo_saml_check_empty_or_null($mw["\154\x69\x63\x65\156\x73\145\x50\x6c\141\x6e"])) {
            goto Us;
        }
        $Ej = get_option("\155\x6f\137\x73\141\x6d\x6c\x5f\143\x75\163\x74\157\x6d\x65\162\x5f\164\157\153\145\156");
        update_option("\163\x69\x74\x65\x5f\143\153\137\154", AESEncryption::encrypt_data("\146\141\154\163\x65", $Ej));
        $xz = add_query_arg(array("\x74\141\142" => "\x6c\151\143\145\156\x73\x69\156\x67"), $_SERVER["\x52\x45\x51\x55\105\123\124\137\125\122\x49"]);
        update_option("\x6d\x6f\x5f\163\141\x6d\x6c\x5f\x6d\145\163\163\x61\147\x65", "\x59\x6f\165\40\150\141\166\145\40\x6e\157\x74\x20\165\160\x67\162\x61\144\x65\x64\40\171\145\x74\56\40" . addLink("\103\x6c\x69\143\x6b\40\x68\x65\x72\145", $xz) . "\40\164\157\40\165\x70\x67\x72\141\x64\x65\40\x74\x6f\40\x70\x72\145\155\x69\165\x6d\40\x76\145\x72\163\151\157\156\56");
        $this->mo_saml_show_error_message();
        goto Y2;
        Us:
        update_option("\155\x6f\137\x73\x61\155\154\x5f\154\151\x63\x65\x6e\x73\145\x5f\x6e\x61\155\145", base64_encode($mw["\x6c\151\143\x65\x6e\163\x65\x50\x6c\141\x6e"]));
        $Ej = get_option("\155\x6f\x5f\163\141\155\x6c\137\143\x75\x73\x74\157\155\145\x72\137\164\x6f\x6b\145\x6e");
        if (!(array_key_exists("\156\157\x4f\146\125\163\x65\162\163", $mw) && !$this->mo_saml_check_empty_or_null($mw["\x6e\x6f\x4f\x66\x55\x73\x65\162\163"]))) {
            goto AI;
        }
        update_option("\155\157\137\163\141\x6d\x6c\x5f\165\x73\x72\137\154\x6d\x74", AESEncryption::encrypt_data($mw["\156\x6f\x4f\x66\x55\163\x65\x72\x73"], $Ej));
        AI:
        if (!(array_key_exists("\x6c\x69\x63\x65\156\x73\x65\x45\170\x70\x69\162\x79", $mw) && !$this->mo_saml_check_empty_or_null($mw["\154\151\x63\145\156\163\x65\105\x78\160\x69\162\x79"]))) {
            goto bd;
        }
        update_option("\x6d\157\137\x73\x61\155\x6c\x5f\154\151\143\x65\x6e\x73\x65\137\x65\x78\x70\x69\162\171\x5f\x64\x61\x74\145", $this->mo_saml_parse_expiry_date($mw["\154\151\143\x65\x6e\163\x65\x45\x78\160\151\x72\171"]));
        if (new DateTime() > new DateTime($mw["\154\x69\x63\145\156\163\145\x45\x78\160\151\x72\171"])) {
            goto Zf;
        }
        update_option("\155\157\137\163\141\x6d\x6c\137\x73\154\145", false);
        goto J9;
        Zf:
        update_option("\x6d\x6f\137\x73\x61\155\x6c\137\163\x6c\145", true);
        J9:
        bd:
        update_option("\x73\151\x74\x65\x5f\x63\x6b\137\x6c", AESEncryption::encrypt_data("\164\162\x75\145", $Ej));
        $ij = plugin_dir_path(__FILE__);
        $cq = home_url();
        $cq = trim($cq, "\x2f");
        if (preg_match("\x23\x5e\x68\164\164\160\50\x73\51\x3f\x3a\57\57\43", $cq)) {
            goto FB;
        }
        $cq = "\150\x74\164\x70\72\57\57" . $cq;
        FB:
        $kP = parse_url($cq);
        $Fa = preg_replace("\x2f\136\167\x77\167\x5c\56\57", '', $kP["\x68\157\163\164"]);
        $dk = wp_upload_dir();
        $CX = $Fa . "\55" . $dk["\x62\x61\x73\145\x64\151\x72"];
        $Hk = hash_hmac("\163\x68\x61\x32\x35\x36", $CX, "\64\104\x48\146\x6a\x67\146\152\x61\163\156\x64\x66\163\141\x6a\x66\x48\107\112");
        $xN = $this->djkasjdksa();
        $cp = round(strlen($xN) / rand(2, 20));
        $xN = substr_replace($xN, $Hk, $cp, 0);
        $J5 = base64_decode($xN);
        if (is_writable($ij . "\154\151\143\x65\x6e\163\x65")) {
            goto NW;
        }
        $xN = str_rot13($xN);
        $ON = base64_decode("\142\107\x4e\x6b\x61\x6d\x74\150\x63\x32\x70\153\141\63\x4e\150\131\x32\167\75");
        update_option($ON, $xN);
        goto q2;
        NW:
        file_put_contents($ij . "\x6c\x69\x63\145\x6e\163\x65", $J5);
        q2:
        update_option("\154\143\x77\162\x74\x6c\x66\x73\141\x6d\x6c", true);
        $xz = add_query_arg(array("\x74\141\x62" => "\147\145\x6e\x65\162\141\154"), $_SERVER["\x52\x45\x51\x55\105\x53\124\x5f\125\122\111"]);
        update_option("\155\x6f\137\163\x61\155\154\137\155\x65\163\163\141\147\x65", "\x59\x6f\x75\40\x68\141\166\145\40\163\165\x63\x63\145\163\x73\146\165\x6c\x6c\171\x20\165\160\x67\162\x61\x64\x65\x64\40\x79\157\x75\x72\40\x6c\151\x63\145\x6e\163\145\56");
        $this->mo_saml_show_success_message();
        Y2:
        Oa:
        hG:
        goto Zj;
        f9:
        if (decryptSamlElement()) {
            goto lk;
        }
        $l4 = postResponse();
        $e9 = new Customersaml();
        $mw = $e9->mo_saml_vl($l4, false);
        if ($mw) {
            goto wo;
        }
        return;
        wo:
        $mw = json_decode($mw, true);
        if (strcasecmp($mw["\x73\164\x61\x74\x75\163"], "\x53\x55\x43\x43\x45\x53\123") == 0) {
            goto uQ;
        }
        if (strcasecmp($mw["\163\x74\141\x74\165\163"], "\x46\x41\x49\114\105\x44") == 0) {
            goto hZ;
        }
        update_option("\x6d\x6f\137\163\x61\x6d\154\x5f\x6d\x65\x73\163\141\147\x65", "\101\156\x20\145\x72\162\x6f\162\x20\x6f\143\143\165\x72\145\144\40\x77\150\x69\x6c\145\x20\x70\162\157\x63\x65\x73\x73\151\x6e\147\40\x79\157\x75\x72\x20\162\x65\x71\165\x65\x73\x74\x2e\x20\x50\154\x65\141\163\x65\x20\124\x72\x79\40\x61\x67\x61\x69\156\56");
        $this->mo_saml_show_error_message();
        goto w9;
        hZ:
        update_option("\155\157\137\x73\141\x6d\154\x5f\x6d\x65\x73\163\141\147\145", "\124\x68\x65\x72\145\x20\x77\141\x73\40\x61\x6e\x20\x65\162\162\x6f\x72\40\x61\x63\x74\151\x76\141\x74\151\156\x67\x20\x79\157\x75\162\x20\124\122\x49\x41\x4c\40\x76\x65\162\x73\x69\157\156\56\40\x50\x6c\145\x61\x73\x65\x20\x63\x6f\156\x74\x61\x63\164\x20\151\x6e\146\x6f\x40\x78\x65\x63\165\162\x69\x66\x79\56\x63\157\155\40\x66\x6f\x72\40\x67\x65\x74\164\x69\x6e\x67\x20\x6e\145\x77\x20\x6c\x69\143\x65\x6e\163\x65\40\x66\157\162\40\164\162\151\141\x6c\x20\166\145\x72\163\151\x6f\x6e\56");
        $this->mo_saml_show_error_message();
        w9:
        goto Zd;
        uQ:
        $Ej = get_option("\x6d\157\137\163\x61\155\154\x5f\x63\x75\163\164\x6f\155\145\x72\137\x74\157\153\x65\156");
        $Ej = get_option("\155\157\x5f\163\141\155\154\x5f\x63\x75\163\x74\157\155\145\x72\137\x74\157\153\145\x6e");
        update_option("\164\137\x73\151\x74\145\137\x73\164\x61\164\x75\163", AESEncryption::encrypt_data("\164\x72\x75\145", $Ej));
        update_option("\x6d\157\x5f\x73\x61\155\154\137\x6d\x65\163\x73\141\x67\145", "\x59\x6f\165\x72\40\x35\40\144\141\171\163\40\x54\x52\111\x41\x4c\x20\151\x73\x20\141\143\x74\x69\x76\x61\164\145\x64\x2e\40\x59\157\x75\x20\143\141\x6e\x20\156\x6f\167\x20\163\145\x74\x75\x70\40\164\150\145\40\160\x6c\x75\147\x69\x6e\56");
        $this->mo_saml_show_success_message();
        Zd:
        goto Zw;
        lk:
        update_option("\x6d\157\x5f\x73\141\155\154\x5f\x6d\145\163\163\141\147\x65", "\124\x68\x65\x72\145\x20\x77\x61\x73\x20\x61\x6e\40\x65\162\162\157\162\40\x61\x63\164\151\166\141\x74\x69\x6e\x67\x20\171\157\x75\x72\x20\124\122\x49\x41\x4c\40\x76\x65\162\x73\x69\x6f\156\x2e\40\x45\151\x74\150\x65\x72\40\171\157\165\162\x20\x74\x72\x69\141\x6c\x20\160\x65\x72\x69\x6f\144\40\151\x73\40\145\170\160\x69\162\x65\144\40\157\x72\x20\171\x6f\165\40\x61\x72\145\x20\x75\x73\151\156\x67\40\x77\x72\x6f\x6e\147\40\164\x72\151\141\154\40\166\x65\x72\163\151\157\156\x2e\x20\x50\154\145\x61\x73\145\40\143\157\x6e\164\141\143\164\x20\151\x6e\x66\x6f\100\x78\145\x63\x75\x72\x69\x66\171\x2e\x63\x6f\155\40\x66\x6f\162\x20\147\145\x74\164\151\x6e\x67\x20\x6e\x65\x77\x20\154\151\x63\x65\x6e\163\145\x20\146\157\162\40\x74\x72\x69\141\154\40\x76\145\162\163\x69\157\x6e\x2e");
        $this->mo_saml_show_error_message();
        Zw:
        Zj:
        goto Y7;
        lo:
        if (!$this->mo_saml_check_empty_or_null($_POST["\x73\141\155\x6c\137\x6c\x69\x63\x65\156\x63\x65\x5f\x6b\145\x79"])) {
            goto IW;
        }
        update_option("\x6d\157\x5f\163\141\x6d\x6c\x5f\x6d\145\x73\x73\141\x67\145", "\x41\x6c\x6c\x20\164\x68\145\40\x66\x69\145\154\144\x73\x20\x61\x72\145\x20\x72\145\161\165\151\162\145\144\x2e\x20\120\x6c\x65\141\163\x65\40\145\x6e\164\x65\x72\40\x76\141\x6c\x69\x64\x20\154\151\x63\145\x6e\163\145\40\x6b\145\x79\56");
        $this->mo_saml_show_error_message();
        return;
        IW:
        $l4 = htmlspecialchars(trim($_POST["\x73\x61\155\154\x5f\154\151\143\145\156\x63\145\137\x6b\145\171"]));
        $e9 = new Customersaml();
        $mw = $e9->check_customer_ln();
        if ($mw) {
            goto ZL;
        }
        return;
        ZL:
        $mw = json_decode($mw, true);
        if (strcasecmp($mw["\163\164\x61\x74\x75\163"], "\123\x55\x43\103\x45\x53\x53") == 0) {
            goto TO;
        }
        $Ej = get_option("\155\x6f\137\163\x61\x6d\154\x5f\143\165\x73\x74\x6f\x6d\x65\162\137\x74\x6f\x6b\145\156");
        update_option("\x73\x69\164\145\137\x63\x6b\x5f\x6c", AESEncryption::encrypt_data("\146\x61\x6c\163\x65", $Ej));
        $xz = add_query_arg(array("\x74\x61\142" => "\x6c\x69\x63\x65\156\163\151\156\147"), $_SERVER["\122\x45\121\x55\x45\x53\124\x5f\x55\x52\111"]);
        update_option("\x6d\157\x5f\x73\x61\x6d\x6c\x5f\x6d\145\x73\163\x61\x67\x65", "\x59\157\x75\x20\x68\141\166\145\x20\156\x6f\164\x20\165\x70\x67\x72\141\x64\x65\144\x20\171\145\x74\x2e\x20" . addLink("\x43\x6c\x69\x63\x6b\40\150\145\162\145", $xz) . "\40\x74\157\x20\x75\160\147\162\141\x64\x65\40\x74\157\40\x70\x72\145\x6d\151\x75\155\40\166\145\x72\163\x69\157\156\x2e");
        $this->mo_saml_show_error_message();
        goto H0;
        TO:
        $mw = json_decode($e9->mo_saml_vl($l4, false), true);
        update_option("\166\x6c\x5f\x63\150\145\x63\153\x5f\164", time());
        if (is_array($mw) and strcasecmp($mw["\x73\164\x61\164\165\x73"], "\123\x55\103\x43\105\123\x53") == 0) {
            goto bE;
        }
        if (is_array($mw) and strcasecmp($mw["\163\164\141\x74\165\163"], "\x46\101\x49\114\x45\104") == 0) {
            goto UP;
        }
        update_option("\x6d\157\x5f\163\x61\x6d\154\137\155\x65\163\163\141\147\x65", "\101\156\x20\x65\x72\162\x6f\x72\x20\x6f\x63\x63\x75\162\145\144\x20\x77\150\151\x6c\145\x20\x70\x72\x6f\x63\x65\x73\x73\151\x6e\x67\40\x79\x6f\x75\x72\40\x72\x65\x71\165\x65\163\x74\56\40\120\154\145\x61\x73\145\40\x54\x72\x79\x20\141\x67\x61\x69\x6e\x2e");
        $this->mo_saml_show_error_message();
        goto K1;
        UP:
        if (strcasecmp($mw["\x6d\145\x73\163\141\147\145"], "\x43\x6f\x64\x65\40\150\141\x73\x20\x45\x78\160\151\162\145\144") == 0) {
            goto jR;
        }
        update_option("\155\157\137\163\141\155\154\137\x6d\x65\163\x73\141\147\145", "\x59\x6f\165\40\150\x61\166\145\40\145\x6e\164\x65\x72\x65\x64\x20\x61\x6e\x20\x69\156\x76\x61\154\151\x64\40\154\x69\143\145\x6e\x73\x65\x20\153\145\x79\56\40\x50\154\x65\x61\x73\x65\x20\x65\156\x74\x65\x72\40\x61\x20\x76\141\154\151\144\x20\x6c\x69\x63\145\156\163\x65\x20\153\145\171\x2e");
        goto zg;
        jR:
        $xz = add_query_arg(array("\164\x61\x62" => "\x6c\x69\143\145\x6e\163\x69\x6e\x67"), $_SERVER["\122\x45\x51\125\x45\x53\x54\x5f\x55\122\111"]);
        update_option("\x6d\x6f\x5f\163\x61\155\154\x5f\x6d\145\x73\x73\141\x67\145", "\114\151\x63\145\x6e\x73\x65\40\x6b\145\171\x20\x79\x6f\165\40\x68\x61\x76\145\40\x65\x6e\164\145\x72\145\144\x20\x68\x61\x73\x20\141\154\x72\x65\x61\x64\171\40\x62\145\x65\x6e\x20\165\163\x65\144\56\40\120\154\145\x61\163\145\40\x65\x6e\164\145\x72\40\141\x20\153\x65\x79\40\x77\x68\151\x63\x68\40\150\141\163\40\156\x6f\x74\x20\x62\x65\x65\156\40\x75\x73\145\144\x20\x62\145\x66\x6f\162\x65\x20\157\x6e\x20\x61\156\171\x20\157\x74\150\x65\x72\40\x69\x6e\x73\x74\x61\156\x63\145\40\x6f\162\40\151\146\40\x79\157\165\40\150\x61\x76\x65\40\x65\x78\x61\165\x73\x74\x65\x64\x20\x61\x6c\x6c\x20\171\157\x75\x72\x20\153\x65\171\x73\x20\164\x68\x65\156\40" . addLink("\103\154\x69\x63\153\x20\x68\145\x72\145", $xz) . "\x20\x74\x6f\40\142\165\171\x20\x6d\157\x72\145\56");
        zg:
        $this->mo_saml_show_error_message();
        K1:
        goto Ki;
        bE:
        $Ej = get_option("\155\157\137\x73\x61\x6d\154\x5f\143\165\x73\x74\x6f\x6d\x65\162\137\164\x6f\153\145\x6e");
        update_option("\163\155\x6c\137\x6c\x6b", AESEncryption::encrypt_data($l4, $Ej));
        $M3 = "\x59\157\x75\162\40\x6c\151\x63\145\x6e\x73\145\40\151\x73\x20\166\145\x72\151\x66\151\x65\144\56\x20\x59\157\165\x20\x63\141\x6e\x20\156\x6f\167\x20\163\x65\x74\165\x70\40\x74\x68\x65\x20\160\154\165\147\151\x6e\x2e";
        update_option("\x6d\157\137\163\141\x6d\x6c\x5f\155\145\x73\x73\x61\x67\x65", $M3);
        $Ej = get_option("\155\157\x5f\x73\x61\x6d\x6c\137\143\x75\163\x74\157\x6d\145\x72\137\x74\157\153\145\x6e");
        update_option("\163\x69\x74\145\137\143\x6b\x5f\x6c", AESEncryption::encrypt_data("\x74\162\x75\x65", $Ej));
        update_option("\x74\x5f\x73\151\164\145\x5f\163\x74\141\x74\x75\x73", AESEncryption::encrypt_data("\146\x61\x6c\163\x65", $Ej));
        $ij = plugin_dir_path(__FILE__);
        $cq = home_url();
        $cq = trim($cq, "\x2f");
        if (preg_match("\43\x5e\x68\164\164\x70\x28\163\51\x3f\72\57\x2f\43", $cq)) {
            goto TJ;
        }
        $cq = "\150\x74\164\160\x3a\57\x2f" . $cq;
        TJ:
        $kP = parse_url($cq);
        $Fa = preg_replace("\57\136\167\x77\x77\x5c\x2e\x2f", '', $kP["\150\x6f\163\x74"]);
        $dk = wp_upload_dir();
        $CX = $Fa . "\x2d" . $dk["\x62\x61\x73\145\144\x69\162"];
        $Hk = hash_hmac("\163\150\x61\x32\65\x36", $CX, "\x34\x44\110\146\x6a\x67\146\152\x61\163\x6e\144\146\163\x61\152\146\110\x47\x4a");
        $xN = $this->djkasjdksa();
        $cp = round(strlen($xN) / rand(2, 20));
        $xN = substr_replace($xN, $Hk, $cp, 0);
        $J5 = base64_decode($xN);
        if (is_writable($ij . "\154\151\x63\x65\x6e\x73\145")) {
            goto ew;
        }
        $xN = str_rot13($xN);
        $ON = base64_decode("\142\107\116\x6b\x61\x6d\x74\150\143\x32\x70\x6b\x61\63\x4e\150\x59\x32\167\75");
        update_option($ON, $xN);
        goto ag;
        ew:
        file_put_contents($ij . "\x6c\151\x63\x65\x6e\163\x65", $J5);
        ag:
        update_option("\x6c\143\x77\162\x74\x6c\x66\x73\x61\155\154", true);
        $xz = add_query_arg(array("\x74\x61\142" => "\147\145\156\145\x72\141\154"), $_SERVER["\122\105\121\x55\x45\x53\x54\137\125\x52\x49"]);
        $this->mo_saml_show_success_message();
        Ki:
        H0:
        Y7:
        goto VD;
        Bs:
        if (mo_saml_is_extension_installed("\x63\165\x72\154")) {
            goto i9;
        }
        update_option("\155\157\x5f\163\141\x6d\154\x5f\155\x65\x73\163\x61\147\145", "\105\122\122\117\122\72\40\120\x48\x50\x20\143\x55\122\114\x20\145\170\164\x65\x6e\163\151\x6f\156\40\151\163\40\x6e\x6f\164\40\151\156\163\164\141\x6c\x6c\x65\x64\40\x6f\162\40\144\151\163\x61\x62\x6c\145\144\x2e\40\x52\145\x73\x65\156\x64\40\x4f\x54\120\x20\146\x61\x69\154\145\144\x2e");
        $this->mo_saml_show_error_message();
        return;
        i9:
        $dn = get_option("\155\x6f\x5f\163\141\x6d\x6c\x5f\141\x64\x6d\151\156\x5f\145\x6d\x61\x69\154");
        $e9 = new Customersaml();
        $mw = $e9->mo_saml_forgot_password($dn);
        if ($mw) {
            goto Lf;
        }
        return;
        Lf:
        $mw = json_decode($mw, true);
        if (strcasecmp($mw["\x73\x74\141\x74\165\x73"], "\x53\125\103\x43\105\x53\x53") == 0) {
            goto h0;
        }
        update_option("\155\x6f\137\163\141\155\x6c\x5f\x6d\145\163\163\x61\147\145", "\x41\156\x20\x65\162\x72\157\162\x20\157\x63\143\x75\162\x65\x64\40\x77\150\x69\154\145\x20\160\162\157\143\x65\163\x73\x69\156\147\40\x79\157\165\x72\x20\162\145\x71\165\145\x73\x74\x2e\40\120\x6c\x65\141\163\145\40\124\x72\171\40\141\x67\x61\151\x6e\56");
        $this->mo_saml_show_error_message();
        goto iO;
        h0:
        update_option("\x6d\157\x5f\x73\x61\155\154\x5f\155\145\163\x73\x61\147\x65", "\131\x6f\165\x72\40\160\141\x73\163\x77\x6f\162\x64\x20\x68\141\x73\x20\142\145\145\x6e\x20\x72\x65\x73\x65\x74\x20\163\x75\x63\143\145\163\x73\146\165\x6c\154\x79\56\x20\120\154\145\x61\x73\145\x20\x65\x6e\164\x65\162\x20\x74\x68\145\40\156\x65\167\40\160\141\163\163\167\x6f\162\144\40\163\x65\156\164\x20\x74\x6f\x20" . $dn . "\56");
        $this->mo_saml_show_success_message();
        iO:
        VD:
        goto ep;
        Uc:
        $hx = '';
        $sJ = '';
        $vy = '';
        $oa = '';
        $LI = '';
        $yl = '';
        $U5 = '';
        $Xo = '';
        $Dz = '';
        $ff = '';
        $Mi = "\141\x62\157\166\145";
        if (!(array_key_exists("\x6d\157\137\x73\141\155\154\x5f\x62\165\164\x74\x6f\156\x5f\x73\151\172\145", $_POST) && !empty($_POST["\x6d\x6f\x5f\163\141\x6d\x6c\x5f\142\x75\x74\x74\x6f\x6e\x5f\x73\151\172\x65"]))) {
            goto UX;
        }
        $vy = htmlspecialchars($_POST["\155\x6f\137\163\x61\x6d\x6c\x5f\x62\x75\x74\164\x6f\156\137\x73\151\x7a\x65"]);
        UX:
        if (!(array_key_exists("\155\157\137\x73\x61\155\x6c\x5f\142\x75\x74\164\x6f\156\x5f\167\151\x64\164\150", $_POST) && !empty($_POST["\155\x6f\137\x73\141\155\x6c\137\x62\165\x74\164\x6f\156\137\167\x69\x64\164\x68"]))) {
            goto a1;
        }
        $oa = htmlspecialchars($_POST["\x6d\157\137\x73\141\155\154\137\x62\x75\164\164\157\x6e\x5f\167\x69\144\x74\150"]);
        a1:
        if (!(array_key_exists("\x6d\157\137\x73\141\x6d\154\x5f\x62\x75\164\164\157\x6e\x5f\150\x65\151\x67\x68\x74", $_POST) && !empty($_POST["\x6d\157\x5f\x73\x61\155\154\137\x62\x75\x74\164\157\156\x5f\x68\x65\151\x67\150\x74"]))) {
            goto wQ;
        }
        $LI = htmlspecialchars($_POST["\x6d\x6f\x5f\x73\141\155\x6c\137\142\165\164\x74\x6f\x6e\x5f\150\x65\151\x67\150\x74"]);
        wQ:
        if (!(array_key_exists("\x6d\x6f\x5f\x73\141\155\154\137\142\165\164\164\157\x6e\x5f\143\165\x72\166\x65", $_POST) && !empty($_POST["\155\x6f\x5f\163\141\155\154\x5f\x62\x75\164\164\157\156\x5f\143\x75\162\166\x65"]))) {
            goto Hv;
        }
        $yl = htmlspecialchars($_POST["\155\157\137\163\141\155\x6c\x5f\x62\x75\x74\164\157\156\137\143\x75\162\x76\145"]);
        Hv:
        if (!array_key_exists("\155\x6f\x5f\163\141\155\x6c\x5f\142\165\x74\x74\157\156\137\x63\x6f\x6c\157\162", $_POST)) {
            goto C6;
        }
        $U5 = htmlspecialchars($_POST["\155\157\x5f\163\x61\x6d\x6c\x5f\142\165\x74\x74\157\156\x5f\143\157\154\157\x72"]);
        C6:
        if (!array_key_exists("\155\x6f\x5f\x73\141\x6d\x6c\137\142\165\x74\164\157\156\137\x74\x68\x65\x6d\145", $_POST)) {
            goto Ni;
        }
        $hx = htmlspecialchars($_POST["\155\x6f\x5f\x73\141\x6d\x6c\137\142\x75\x74\164\x6f\156\x5f\164\x68\145\155\145"]);
        Ni:
        if (!array_key_exists("\x6d\x6f\x5f\163\x61\x6d\154\x5f\142\165\x74\164\x6f\156\137\x74\x65\x78\164", $_POST)) {
            goto PE;
        }
        $Xo = htmlspecialchars($_POST["\155\x6f\x5f\163\141\155\x6c\137\x62\x75\x74\x74\x6f\x6e\x5f\x74\145\x78\164"]);
        if (!(empty($Xo) || $Xo == "\x4c\157\x67\151\156")) {
            goto XH;
        }
        $Xo = "\x4c\157\x67\151\x6e";
        XH:
        $x8 = LicenseHelper::getCurrentOption(mo_options_enum_service_provider::Identity_name);
        $Xo = str_replace("\43\43\x49\x44\120\43\43", $x8, $Xo);
        PE:
        if (!array_key_exists("\155\x6f\x5f\x73\x61\155\x6c\137\x66\x6f\x6e\164\x5f\x63\x6f\x6c\x6f\x72", $_POST)) {
            goto ZW;
        }
        $Dz = htmlspecialchars($_POST["\155\x6f\x5f\x73\141\x6d\154\137\x66\157\156\x74\137\143\157\x6c\157\162"]);
        ZW:
        if (!array_key_exists("\155\157\137\x73\141\155\154\137\146\157\x6e\164\x5f\163\151\x7a\x65", $_POST)) {
            goto qP;
        }
        $ff = htmlspecialchars($_POST["\x6d\157\x5f\163\141\155\154\x5f\x66\x6f\x6e\164\x5f\163\x69\172\x65"]);
        qP:
        if (!array_key_exists("\x73\x73\x6f\x5f\142\x75\x74\164\157\x6e\x5f\154\x6f\147\151\156\x5f\x66\x6f\x72\155\x5f\x70\x6f\163\151\164\x69\157\x6e", $_POST)) {
            goto KS;
        }
        $Mi = htmlspecialchars($_POST["\x73\163\x6f\x5f\x62\165\164\164\157\156\x5f\154\x6f\x67\x69\x6e\x5f\146\x6f\x72\x6d\x5f\160\157\163\151\x74\x69\157\x6e"]);
        KS:
        update_option("\x6d\x6f\x5f\x73\141\155\154\137\x62\165\164\164\x6f\156\x5f\x74\x68\x65\155\x65", $hx);
        update_option("\155\x6f\x5f\x73\141\x6d\154\x5f\x62\x75\164\x74\x6f\156\x5f\163\151\172\x65", $vy);
        update_option("\x6d\x6f\137\x73\x61\155\x6c\137\x62\165\x74\164\x6f\156\x5f\x77\x69\x64\x74\150", $oa);
        update_option("\155\157\x5f\x73\141\155\154\x5f\x62\x75\x74\x74\157\156\x5f\150\145\151\x67\150\164", $LI);
        update_option("\x6d\x6f\x5f\163\141\x6d\x6c\x5f\x62\x75\x74\164\x6f\156\137\x63\165\x72\166\145", $yl);
        update_option("\155\x6f\x5f\x73\141\155\154\137\142\x75\164\164\157\x6e\x5f\143\x6f\x6c\x6f\x72", $U5);
        update_option("\155\x6f\137\x73\x61\155\154\137\x62\x75\164\x74\x6f\156\137\164\145\170\164", $Xo);
        update_option("\x6d\157\137\x73\x61\x6d\x6c\137\x66\x6f\x6e\x74\x5f\x63\157\154\x6f\162", $Dz);
        update_option("\x6d\157\x5f\x73\141\x6d\154\137\x66\x6f\156\164\137\x73\151\x7a\145", $ff);
        update_option("\x73\x73\157\x5f\142\x75\164\x74\157\x6e\137\154\x6f\147\x69\156\x5f\146\x6f\162\155\137\x70\x6f\163\x69\x74\x69\157\x6e", $Mi);
        update_option("\x6d\x6f\x5f\163\x61\155\x6c\x5f\x6d\145\163\x73\x61\147\x65", "\123\151\x67\156\x20\111\156\40\x73\x65\164\164\x69\x6e\147\163\x20\165\160\144\x61\x74\x65\144\56");
        $this->mo_saml_show_success_message();
        ep:
        goto tR;
        Q6:
        $ZX = "\146\141\x6c\x73\145";
        if (array_key_exists("\155\157\x5f\163\141\x6d\x6c\137\x61\x6c\x6c\x6f\x77\x5f\167\160\137\x73\151\147\156\151\156", $_POST)) {
            goto O8;
        }
        $pm = "\x66\141\154\x73\x65";
        goto MT;
        O8:
        $pm = htmlspecialchars($_POST["\x6d\x6f\137\x73\x61\x6d\x6c\137\141\154\x6c\x6f\167\x5f\167\160\137\163\151\147\156\151\x6e"]);
        MT:
        if ($pm == "\164\162\165\x65") {
            goto q0;
        }
        update_option("\155\x6f\137\163\x61\x6d\x6c\x5f\x61\154\154\x6f\x77\x5f\167\x70\x5f\x73\151\147\x6e\x69\156", '');
        goto Nh;
        q0:
        update_option("\155\157\x5f\x73\141\x6d\x6c\137\x61\154\154\x6f\167\x5f\167\160\x5f\x73\x69\147\156\x69\x6e", "\x74\162\165\x65");
        if (!array_key_exists("\x6d\x6f\x5f\163\x61\155\x6c\x5f\x62\x61\x63\x6b\144\x6f\x6f\x72\x5f\x75\162\154", $_POST)) {
            goto K8;
        }
        $ZX = htmlspecialchars(trim($_POST["\155\157\x5f\x73\141\x6d\154\x5f\x62\141\x63\x6b\x64\x6f\x6f\x72\137\165\x72\x6c"]));
        K8:
        Nh:
        update_option("\155\157\137\163\141\155\x6c\137\142\141\143\153\x64\x6f\157\162\x5f\165\x72\154", $ZX);
        update_option("\155\157\x5f\163\141\155\x6c\137\155\145\163\x73\141\147\x65", "\x53\x69\147\156\x20\111\x6e\x20\x73\x65\x74\x74\x69\x6e\x67\x73\40\x75\x70\144\141\x74\145\144\x2e");
        $this->mo_saml_show_success_message();
        tR:
        goto ei;
        TT:
        if (mo_saml_is_sp_configured()) {
            goto mN;
        }
        update_option("\x6d\x6f\137\163\141\155\x6c\x5f\x6d\145\163\x73\141\147\x65", "\x50\154\x65\141\x73\x65\x20\x63\157\x6d\160\154\145\x74\x65\40" . addLink("\x53\145\162\x76\x69\143\x65\40\x50\x72\x6f\x76\x69\x64\145\x72", add_query_arg(array("\164\x61\x62" => "\x73\x61\x76\x65"), $_SERVER["\x52\x45\x51\x55\105\x53\x54\x5f\125\x52\x49"])) . "\x20\143\x6f\x6e\x66\x69\147\165\x72\141\164\151\x6f\x6e\40\x66\x69\162\163\x74\56");
        $this->mo_saml_show_error_message();
        goto qQ;
        mN:
        if (array_key_exists("\155\157\x5f\163\141\x6d\x6c\137\x75\x73\x65\137\142\x75\x74\164\x6f\x6e\x5f\x61\x73\x5f\167\x69\144\x67\145\x74", $_POST)) {
            goto ko;
        }
        $U2 = "\146\141\x6c\x73\145";
        goto oU;
        ko:
        $U2 = htmlspecialchars($_POST["\x6d\157\x5f\x73\x61\x6d\x6c\x5f\165\163\145\x5f\142\x75\164\164\157\x6e\137\x61\163\x5f\x77\x69\144\147\x65\x74"]);
        oU:
        update_option("\x6d\x6f\x5f\163\141\x6d\154\x5f\x75\x73\x65\x5f\x62\x75\164\164\157\156\137\141\x73\x5f\167\x69\x64\x67\145\x74", $U2);
        update_option("\x6d\157\x5f\163\141\155\154\x5f\155\145\x73\x73\x61\147\145", "\x53\151\x67\x6e\40\x69\156\40\x6f\x70\164\151\x6f\x6e\x73\40\x75\160\144\141\x74\145\x64\x2e");
        $this->mo_saml_show_success_message();
        qQ:
        ei:
        goto xU;
        TE:
        if (mo_saml_is_sp_configured()) {
            goto w2;
        }
        update_option("\x6d\x6f\x5f\163\141\155\x6c\x5f\155\145\163\x73\141\147\145", "\x50\154\x65\141\163\145\40\x63\157\155\160\x6c\x65\x74\145\x20" . addLink("\x53\145\x72\x76\x69\x63\x65\40\120\x72\x6f\166\151\x64\x65\x72", add_query_arg(array("\164\x61\142" => "\163\141\x76\x65"), $_SERVER["\122\105\x51\x55\105\x53\124\137\125\x52\111"])) . "\40\143\x6f\156\146\x69\x67\165\162\x61\164\151\157\x6e\x20\146\151\162\x73\164\56");
        $this->mo_saml_show_error_message();
        goto uX;
        w2:
        if (array_key_exists("\155\x6f\x5f\x73\x61\x6d\x6c\137\x75\x73\x65\x5f\x62\x75\164\x74\157\x6e\x5f\x61\163\137\163\150\x6f\162\x74\143\x6f\144\145", $_POST)) {
            goto cf;
        }
        $U2 = "\x66\x61\154\163\x65";
        goto ut;
        cf:
        $U2 = htmlspecialchars($_POST["\155\x6f\137\x73\141\x6d\x6c\x5f\x75\163\x65\137\142\165\x74\x74\x6f\x6e\137\141\163\x5f\163\150\x6f\x72\x74\143\x6f\x64\x65"]);
        ut:
        update_option("\x6d\157\137\x73\141\155\154\x5f\x75\x73\145\x5f\142\x75\164\x74\x6f\156\137\141\163\x5f\163\x68\x6f\162\x74\143\x6f\144\x65", $U2);
        update_option("\x6d\157\137\163\141\155\x6c\x5f\x6d\145\x73\163\x61\x67\x65", "\123\x69\x67\x6e\x20\151\156\40\157\x70\x74\x69\157\x6e\163\40\165\160\x64\141\x74\x65\x64\56");
        $this->mo_saml_show_success_message();
        uX:
        xU:
        goto cz;
        ve:
        if (mo_saml_is_sp_configured()) {
            goto q5;
        }
        update_option("\155\x6f\x5f\163\x61\x6d\154\137\x6d\x65\163\x73\141\x67\145", "\120\x6c\145\x61\163\145\x20\143\157\x6d\x70\154\145\164\x65\x20" . addLink("\123\x65\162\166\x69\x63\x65\40\120\x72\157\166\151\144\x65\162", add_query_arg(array("\x74\x61\142" => "\x73\x61\x76\145"), $_SERVER["\122\x45\121\x55\105\x53\x54\x5f\x55\x52\111"])) . "\40\x63\157\156\x66\151\x67\x75\x72\141\x74\x69\x6f\x6e\x20\146\151\x72\x73\164\56");
        $this->mo_saml_show_error_message();
        goto sf;
        q5:
        if (array_key_exists("\x6d\x6f\137\163\141\x6d\154\x5f\x61\x64\x64\137\x73\x73\x6f\137\142\165\164\164\x6f\x6e\137\167\160", $_POST)) {
            goto Cq;
        }
        $XS = "\x66\x61\154\x73\145";
        goto wZ;
        Cq:
        $XS = htmlspecialchars($_POST["\155\157\x5f\x73\141\155\154\x5f\x61\144\144\137\163\x73\x6f\137\142\165\x74\164\157\156\x5f\x77\160"]);
        wZ:
        update_option("\x6d\157\137\163\141\155\154\x5f\x61\x64\x64\x5f\x73\x73\157\137\142\x75\x74\164\x6f\156\137\167\x70", $XS);
        update_option("\155\x6f\x5f\163\x61\x6d\x6c\137\x6d\x65\x73\x73\141\147\145", "\x53\x69\x67\156\40\151\156\40\157\160\x74\151\157\x6e\163\x20\165\160\144\141\164\145\144\x2e");
        $this->mo_saml_show_success_message();
        sf:
        cz:
        goto Im;
        MH:
        if (mo_saml_is_sp_configured()) {
            goto fD;
        }
        update_option("\x6d\x6f\x5f\x73\x61\155\154\137\x6d\145\x73\x73\141\147\x65", "\120\154\145\x61\x73\145\40\x63\x6f\x6d\160\x6c\x65\164\145\40" . addLink("\123\x65\162\x76\151\x63\x65\40\120\162\x6f\x76\x69\144\x65\162", add_query_arg(array("\164\141\142" => "\163\141\166\145"), $_SERVER["\122\x45\x51\x55\x45\x53\124\137\125\122\111"])) . "\x20\143\157\x6e\146\x69\147\165\x72\x61\x74\151\x6f\x6e\x20\x66\x69\x72\x73\164\56");
        $this->mo_saml_show_error_message();
        goto gO;
        fD:
        if (array_key_exists("\x6d\157\x5f\163\x61\155\x6c\137\145\x6e\x61\x62\154\145\137\154\157\147\151\156\x5f\x72\x65\x64\151\x72\x65\143\x74", $_POST)) {
            goto x9;
        }
        $gn = "\x66\x61\x6c\163\145";
        goto Nl;
        x9:
        $gn = htmlspecialchars($_POST["\x6d\157\x5f\163\141\x6d\x6c\x5f\145\x6e\x61\142\x6c\145\x5f\154\x6f\147\151\x6e\x5f\x72\x65\144\x69\x72\x65\x63\164"]);
        Nl:
        if ($gn == "\164\162\165\x65") {
            goto Ss;
        }
        update_option("\x6d\157\137\163\141\155\154\x5f\x65\x6e\x61\142\154\145\x5f\154\x6f\x67\151\x6e\137\162\x65\144\x69\x72\x65\143\x74", '');
        update_option("\x6d\157\137\x73\141\x6d\154\137\141\154\x6c\157\x77\137\167\x70\137\x73\x69\147\x6e\x69\156", '');
        goto oZ;
        Ss:
        update_option("\155\x6f\x5f\x73\x61\155\154\x5f\x65\x6e\141\x62\x6c\x65\x5f\154\x6f\x67\x69\x6e\137\162\x65\144\x69\162\x65\x63\164", "\x74\x72\x75\145");
        update_option("\155\157\137\x73\x61\155\x6c\137\141\154\154\x6f\x77\x5f\x77\x70\137\x73\151\x67\x6e\x69\x6e", "\x74\x72\165\x65");
        oZ:
        update_option("\x6d\157\137\163\141\x6d\x6c\137\155\x65\163\163\141\x67\145", "\x53\x69\147\156\x20\151\156\x20\157\160\164\151\x6f\x6e\163\x20\165\160\144\x61\164\145\x64\x2e");
        $this->mo_saml_show_success_message();
        gO:
        Im:
        goto UQ;
        D3:
        if (mo_saml_is_sp_configured()) {
            goto FD;
        }
        update_option("\155\x6f\137\163\141\x6d\154\137\155\x65\163\x73\141\x67\145", "\x50\154\145\x61\163\145\x20\143\x6f\155\160\154\145\x74\x65\40" . addLink("\x53\145\x72\166\151\143\145\40\x50\x72\x6f\x76\151\144\x65\x72", add_query_arg(array("\x74\x61\142" => "\163\x61\x76\145"), $_SERVER["\x52\x45\x51\125\x45\x53\124\137\125\122\111"])) . "\40\143\x6f\156\x66\x69\x67\x75\162\141\x74\x69\x6f\x6e\40\146\151\x72\x73\x74\x2e");
        $this->mo_saml_show_error_message();
        goto d8;
        FD:
        if (array_key_exists("\155\x6f\137\x73\x61\155\154\x5f\145\x6e\x61\x62\154\x65\x5f\162\163\x73\x5f\x61\x63\x63\x65\163\163", $_POST)) {
            goto uI;
        }
        $lm = false;
        goto v0;
        uI:
        $lm = htmlspecialchars($_POST["\155\x6f\137\163\141\155\x6c\x5f\x65\156\141\x62\x6c\145\x5f\x72\163\x73\x5f\x61\x63\x63\145\x73\163"]);
        v0:
        if ($lm == "\164\x72\x75\145") {
            goto Di;
        }
        update_option("\x6d\x6f\x5f\163\x61\x6d\x6c\137\145\x6e\141\x62\x6c\145\x5f\x72\x73\163\137\x61\x63\143\145\x73\163", '');
        goto t4;
        Di:
        update_option("\155\x6f\137\x73\141\155\154\137\x65\x6e\141\142\x6c\145\137\162\163\163\x5f\141\143\143\145\x73\163", "\164\x72\165\145");
        t4:
        update_option("\155\x6f\137\163\141\x6d\154\137\155\145\x73\x73\141\147\x65", "\122\123\x53\40\106\x65\x65\x64\40\157\160\164\x69\x6f\x6e\x20\x75\160\144\x61\x74\x65\144\56");
        $this->mo_saml_show_success_message();
        d8:
        UQ:
        goto iH;
        zT:
        if (mo_saml_is_sp_configured()) {
            goto an;
        }
        update_option("\155\157\137\x73\141\x6d\154\x5f\155\145\163\x73\x61\147\145", "\x50\154\x65\x61\163\x65\x20\x63\x6f\155\160\x6c\x65\164\145\x20" . addLink("\123\x65\162\x76\151\x63\x65\40\x50\x72\x6f\166\151\x64\145\x72", add_query_arg(array("\164\141\142" => "\163\x61\x76\x65"), $_SERVER["\122\105\121\125\105\123\124\137\125\x52\111"])) . "\40\x63\157\156\146\151\x67\165\x72\141\164\x69\x6f\156\40\x66\151\162\163\x74\x2e");
        $this->mo_saml_show_error_message();
        goto d6;
        an:
        if (array_key_exists("\155\x6f\137\x73\x61\x6d\154\x5f\146\157\x72\143\145\137\141\165\164\150\x65\x6e\x74\151\x63\x61\164\151\x6f\x6e", $_POST)) {
            goto rZ;
        }
        $gn = "\x66\141\154\163\x65";
        goto LJ;
        rZ:
        $gn = htmlspecialchars($_POST["\155\157\x5f\x73\x61\155\154\x5f\146\157\162\x63\x65\x5f\141\165\x74\150\145\156\164\x69\x63\141\x74\151\x6f\156"]);
        LJ:
        if ($gn == "\x74\162\x75\145") {
            goto Ya;
        }
        update_option("\x6d\x6f\x5f\x73\141\155\154\x5f\x66\157\x72\143\145\x5f\141\165\x74\x68\145\156\x74\151\143\x61\x74\x69\x6f\156", '');
        goto go;
        Ya:
        update_option("\x6d\157\x5f\x73\x61\x6d\154\137\x66\x6f\162\x63\x65\x5f\141\165\x74\x68\x65\156\164\151\x63\x61\164\151\x6f\x6e", "\164\x72\x75\145");
        go:
        update_option("\155\x6f\x5f\163\x61\x6d\154\137\155\145\x73\x73\141\x67\x65", "\x53\151\147\x6e\40\x69\x6e\x20\x6f\x70\164\x69\x6f\x6e\x73\x20\x75\160\x64\141\164\145\144\x2e");
        $this->mo_saml_show_success_message();
        d6:
        iH:
        goto KF;
        OZ:
        if (!mo_saml_is_sp_configured()) {
            goto X0;
        }
        if (array_key_exists("\x6d\x6f\x5f\163\141\155\x6c\137\162\x65\x64\151\162\145\143\164\x5f\164\x6f\x5f\167\x70\x5f\x6c\157\x67\x69\156", $_POST)) {
            goto dO1;
        }
        $f5 = "\x66\x61\154\163\x65";
        goto NG;
        dO1:
        $f5 = htmlspecialchars($_POST["\155\157\137\x73\x61\155\154\137\162\x65\x64\x69\x72\x65\x63\164\137\164\157\x5f\x77\160\x5f\154\x6f\147\x69\156"]);
        NG:
        update_option("\x6d\157\x5f\x73\141\x6d\154\x5f\162\145\144\x69\x72\145\143\164\137\x74\x6f\x5f\167\160\137\x6c\157\147\x69\x6e", $f5);
        update_option("\155\x6f\x5f\x73\x61\x6d\154\137\x6d\145\x73\163\141\x67\x65", "\x53\x69\x67\156\x20\151\x6e\x20\157\160\164\x69\x6f\156\163\x20\165\160\144\141\x74\145\144\x2e");
        $this->mo_saml_show_success_message();
        X0:
        KF:
        goto CF;
        cB:
        if (mo_saml_is_sp_configured()) {
            goto gu;
        }
        update_option("\x6d\157\137\163\x61\155\154\137\155\145\163\163\141\x67\x65", "\120\154\145\141\x73\145\x20\143\157\155\x70\x6c\145\x74\x65\x20" . addLink("\x53\x65\162\x76\151\x63\145\40\120\x72\x6f\x76\x69\x64\x65\x72", add_query_arg(array("\x74\x61\x62" => "\x73\141\x76\145"), $_SERVER["\x52\x45\x51\x55\x45\x53\x54\x5f\125\x52\x49"])) . "\40\143\x6f\156\146\151\x67\165\x72\141\x74\x69\157\156\40\x66\x69\162\x73\x74\56");
        $this->mo_saml_show_error_message();
        goto ef;
        gu:
        if (array_key_exists("\x6d\x6f\137\x73\x61\x6d\x6c\x5f\x72\145\x67\151\x73\164\145\162\x65\144\137\x6f\x6e\154\x79\137\x61\143\x63\x65\x73\x73", $_POST)) {
            goto u9;
        }
        $gn = "\146\141\154\163\x65";
        goto Bn;
        u9:
        $gn = htmlspecialchars($_POST["\x6d\157\x5f\163\141\155\x6c\137\x72\x65\147\x69\x73\164\x65\162\145\x64\x5f\157\156\154\x79\137\141\143\143\145\x73\163"]);
        Bn:
        if ($gn == "\164\162\x75\x65") {
            goto M3;
        }
        update_option("\x6d\157\137\163\141\x6d\154\x5f\162\x65\x67\151\163\x74\x65\162\x65\x64\137\157\156\154\171\x5f\141\x63\x63\x65\163\x73", '');
        goto pE;
        M3:
        update_option("\155\x6f\137\x73\141\155\154\137\x72\145\147\x69\163\x74\145\162\x65\x64\137\157\156\154\171\x5f\x61\143\143\145\163\x73", "\x74\162\165\x65");
        pE:
        update_option("\x6d\x6f\x5f\x73\141\155\x6c\137\155\145\163\x73\141\x67\145", "\123\151\147\156\x20\x69\x6e\x20\x6f\x70\164\151\x6f\x6e\163\40\165\x70\x64\141\x74\x65\x64\56");
        $this->mo_saml_show_success_message();
        ef:
        CF:
        goto VY;
        EM:
        if (mo_saml_is_extension_installed("\x63\x75\x72\x6c")) {
            goto Tg;
        }
        update_option("\x6d\157\137\163\141\155\x6c\x5f\x6d\x65\163\163\x61\147\145", "\105\122\122\x4f\122\72\x20\120\x48\x50\x20\143\x55\122\114\40\145\170\164\x65\x6e\x73\x69\x6f\156\40\151\x73\x20\156\157\x74\40\x69\x6e\163\164\141\154\154\x65\144\x20\x6f\x72\x20\144\x69\163\141\x62\x6c\145\144\x2e\40\122\x65\x73\145\156\x64\x20\117\124\120\40\146\x61\x69\154\145\144\56");
        $this->mo_saml_show_error_message();
        return;
        Tg:
        $Mb = htmlspecialchars($_POST["\160\150\x6f\x6e\x65"]);
        $Mb = str_replace("\40", '', $Mb);
        $Mb = str_replace("\55", '', $Mb);
        update_option("\x6d\x6f\x5f\163\141\155\x6c\x5f\141\x64\x6d\x69\156\137\x70\150\x6f\156\145", $Mb);
        $e9 = new CustomerSaml();
        $mw = $e9->send_otp_token('', $Mb, FALSE, TRUE);
        if ($mw) {
            goto aF;
        }
        return;
        aF:
        $mw = json_decode($mw, true);
        if (strcasecmp($mw["\163\x74\x61\x74\165\x73"], "\x53\125\x43\103\x45\x53\123") == 0) {
            goto Sq;
        }
        update_option("\x6d\157\x5f\163\141\155\154\137\x6d\145\163\x73\141\x67\145", "\124\x68\145\x72\145\x20\x77\141\163\40\x61\156\x20\x65\162\162\157\x72\x20\x69\156\x20\163\145\x6e\144\x69\x6e\147\40\x53\115\123\56\x20\120\x6c\x65\x61\163\x65\x20\143\154\x69\x63\153\40\157\156\x20\x52\145\163\x65\x6e\144\40\117\124\x50\x20\x74\x6f\x20\164\162\171\x20\x61\x67\141\151\x6e\56");
        update_option("\x6d\x6f\137\163\141\155\154\x5f\162\145\x67\151\163\164\x72\141\x74\x69\x6f\x6e\137\x73\x74\141\x74\x75\x73", "\115\x4f\x5f\x4f\124\120\x5f\x44\105\x4c\x49\126\105\x52\105\x44\x5f\x46\x41\x49\x4c\125\122\x45\x5f\120\x48\117\x4e\105");
        $this->mo_saml_show_error_message();
        goto yr;
        Sq:
        update_option("\x6d\x6f\x5f\x73\x61\155\154\137\x6d\145\x73\163\141\147\x65", "\x20\x41\x20\x6f\156\x65\40\164\151\x6d\145\x20\160\141\163\163\143\157\144\145\x20\151\x73\x20\x73\145\156\x74\40\x74\157\x20" . get_option("\155\x6f\x5f\163\x61\x6d\154\x5f\141\144\155\x69\x6e\137\160\150\157\156\145") . "\x2e\40\x50\x6c\x65\x61\163\145\x20\145\x6e\164\145\x72\40\x74\x68\x65\40\x6f\x74\x70\40\150\145\x72\x65\40\x74\x6f\40\166\x65\162\151\x66\171\x20\x79\157\x75\x72\40\145\155\x61\x69\x6c\x2e");
        update_option("\x6d\x6f\x5f\x73\x61\x6d\x6c\x5f\164\x72\x61\x6e\x73\x61\x63\x74\x69\x6f\156\x49\144", $mw["\x74\170\x49\x64"]);
        update_option("\155\157\137\163\x61\x6d\154\137\x72\x65\x67\x69\x73\x74\x72\141\x74\151\157\156\x5f\x73\x74\x61\164\165\163", "\x4d\x4f\x5f\117\x54\x50\137\104\105\114\111\126\x45\122\x45\104\137\123\125\x43\103\x45\x53\x53\137\120\x48\117\116\105");
        $this->mo_saml_show_success_message();
        yr:
        VY:
        goto n6;
        IK:
        update_option("\x6d\x6f\137\x73\x61\x6d\154\137\x72\145\147\x69\x73\164\162\141\x74\151\157\156\x5f\x73\x74\x61\x74\x75\x73", '');
        update_option("\155\157\137\163\x61\155\x6c\137\166\x65\162\151\146\x79\137\x63\165\x73\164\157\155\145\162", '');
        delete_option("\x6d\x6f\x5f\163\141\x6d\154\137\x6e\145\167\137\162\145\x67\x69\x73\164\x72\x61\x74\151\157\156");
        delete_option("\x6d\x6f\x5f\x73\141\x6d\x6c\137\141\144\x6d\151\x6e\x5f\x65\x6d\141\151\154");
        delete_option("\155\157\x5f\x73\141\x6d\x6c\x5f\141\x64\155\151\x6e\x5f\x70\150\157\x6e\x65");
        delete_site_option("\x73\x6d\154\137\x6c\x6b");
        delete_site_option("\164\x5f\163\x69\164\x65\x5f\x73\164\x61\x74\x75\163");
        delete_site_option("\x73\x69\x74\145\x5f\143\153\137\154");
        n6:
        goto Vt;
        NS:
        if (mo_saml_is_extension_installed("\x63\x75\x72\x6c")) {
            goto ph;
        }
        update_option("\155\157\137\163\141\x6d\154\137\x6d\145\163\163\x61\147\145", "\105\122\x52\117\122\x3a\x20\x50\x48\120\x20\x63\x55\x52\114\40\145\x78\164\145\x6e\x73\x69\157\156\x20\151\x73\x20\156\x6f\164\x20\151\x6e\x73\164\141\x6c\154\x65\144\40\x6f\162\x20\x64\151\163\x61\x62\x6c\x65\144\56\x20\122\145\x73\x65\x6e\144\x20\x4f\x54\120\40\x66\x61\x69\154\x65\x64\x2e");
        $this->mo_saml_show_error_message();
        return;
        ph:
        $Mb = get_option("\155\157\137\x73\141\x6d\x6c\x5f\x61\x64\x6d\151\x6e\137\x70\150\x6f\x6e\x65");
        $e9 = new CustomerSaml();
        $mw = $e9->send_otp_token('', $Mb, FALSE, TRUE);
        if ($mw) {
            goto KO;
        }
        return;
        KO:
        $mw = json_decode($mw, true);
        if (strcasecmp($mw["\x73\164\141\164\x75\163"], "\x53\125\103\x43\x45\123\123") == 0) {
            goto VL;
        }
        update_option("\x6d\x6f\137\x73\x61\155\x6c\137\x6d\145\163\163\x61\147\x65", "\124\150\145\x72\x65\x20\x77\x61\x73\x20\141\x6e\x20\x65\162\162\x6f\162\40\x69\156\x20\163\x65\x6e\144\x69\x6e\x67\40\145\x6d\141\x69\x6c\56\40\x50\154\145\141\163\145\x20\x63\x6c\151\143\153\x20\x6f\x6e\40\x52\145\x73\x65\x6e\144\x20\117\x54\120\40\x74\157\x20\164\162\x79\x20\x61\x67\x61\x69\156\56");
        update_option("\155\x6f\x5f\163\141\x6d\x6c\x5f\162\x65\147\x69\x73\x74\x72\x61\164\151\157\x6e\x5f\163\x74\141\x74\x75\163", "\115\117\x5f\x4f\x54\120\137\104\105\x4c\111\x56\x45\122\105\x44\137\106\101\111\x4c\125\122\x45\137\x50\x48\117\x4e\105");
        $this->mo_saml_show_error_message();
        goto cH;
        VL:
        update_option("\155\x6f\x5f\163\141\x6d\154\137\155\x65\163\163\x61\147\145", "\40\101\40\x6f\156\x65\40\164\x69\155\145\40\x70\141\163\x73\143\157\x64\x65\40\x69\x73\40\x73\145\x6e\x74\40\x74\x6f\40" . $Mb . "\x20\141\x67\x61\x69\x6e\x2e\40\120\154\145\x61\x73\x65\x20\143\x68\145\143\153\x20\x69\146\40\x79\x6f\165\40\x67\x6f\x74\40\164\x68\x65\40\x6f\x74\x70\x20\x61\x6e\144\40\145\156\164\145\x72\x20\151\x74\40\x68\145\162\x65\x2e");
        update_option("\x6d\x6f\x5f\x73\x61\x6d\x6c\x5f\164\x72\141\x6e\x73\141\143\164\x69\x6f\156\x49\144", $mw["\x74\x78\111\x64"]);
        update_option("\155\x6f\137\163\x61\155\154\x5f\x72\145\147\x69\163\164\162\x61\x74\151\157\156\x5f\x73\164\141\164\165\163", "\x4d\x4f\x5f\117\x54\120\x5f\x44\105\114\x49\126\105\122\x45\104\137\123\x55\103\x43\x45\x53\123\x5f\x50\x48\117\116\x45");
        $this->mo_saml_show_success_message();
        cH:
        Vt:
        goto Gy;
        SL:
        if (mo_saml_is_extension_installed("\x63\165\x72\154")) {
            goto kX;
        }
        update_option("\155\157\x5f\163\141\x6d\154\137\155\x65\x73\x73\x61\147\145", "\x45\x52\x52\x4f\122\72\40\120\110\120\x20\143\125\x52\x4c\40\x65\170\x74\x65\156\x73\x69\x6f\x6e\40\x69\163\40\x6e\157\164\40\x69\x6e\x73\164\141\154\x6c\x65\144\40\x6f\162\40\144\151\x73\141\142\x6c\145\144\x2e\40\x52\145\x73\x65\x6e\144\x20\x4f\124\x50\40\146\x61\151\154\x65\x64\56");
        $this->mo_saml_show_error_message();
        return;
        kX:
        $dn = get_option("\x6d\x6f\137\x73\141\x6d\154\x5f\x61\x64\155\x69\x6e\x5f\x65\155\141\x69\x6c");
        $e9 = new CustomerSaml();
        $mw = $e9->send_otp_token($dn, '');
        if ($mw) {
            goto cN;
        }
        return;
        cN:
        $mw = json_decode($mw, true);
        if (strcasecmp($mw["\163\164\x61\164\x75\x73"], "\123\125\103\103\105\x53\x53") == 0) {
            goto Ir;
        }
        update_option("\x6d\157\x5f\163\141\x6d\154\x5f\155\145\x73\x73\141\x67\x65", "\x54\x68\145\162\145\x20\167\141\x73\x20\x61\156\x20\x65\x72\162\x6f\162\x20\151\156\40\163\x65\156\x64\x69\156\147\40\x65\155\x61\x69\x6c\56\40\x50\154\145\x61\163\145\40\143\x6c\x69\143\x6b\40\x6f\156\x20\x52\x65\x73\x65\156\144\x20\117\124\120\x20\x74\157\40\x74\162\171\40\x61\x67\141\151\x6e\x2e");
        update_option("\155\x6f\137\x73\x61\x6d\x6c\137\x72\x65\147\151\x73\x74\162\x61\x74\x69\157\x6e\x5f\x73\164\x61\164\x75\163", "\x4d\117\x5f\x4f\x54\120\137\x44\105\x4c\111\x56\105\x52\105\x44\x5f\x46\x41\111\x4c\x55\x52\105\137\x45\115\x41\111\x4c");
        $this->mo_saml_show_error_message();
        goto jM;
        Ir:
        update_option("\155\x6f\137\x73\x61\x6d\x6c\x5f\155\145\x73\163\141\x67\x65", "\40\x41\40\157\156\145\40\164\151\x6d\145\x20\160\x61\x73\163\143\x6f\144\x65\40\151\x73\40\163\x65\156\x74\x20\164\x6f\40" . get_option("\155\157\137\163\141\155\154\137\141\144\155\x69\156\x5f\145\x6d\x61\151\154") . "\x20\141\x67\x61\151\x6e\56\x20\120\154\x65\x61\x73\145\40\x63\150\145\x63\x6b\x20\x69\x66\40\x79\157\165\40\147\x6f\164\40\x74\x68\x65\x20\157\x74\160\x20\x61\156\144\x20\x65\156\164\145\x72\x20\151\164\x20\150\145\162\145\x2e");
        update_option("\155\157\137\163\141\155\x6c\137\x74\x72\x61\x6e\x73\141\x63\164\151\x6f\156\111\144", $mw["\x74\170\x49\x64"]);
        update_option("\155\x6f\x5f\x73\141\155\x6c\137\162\145\147\151\163\164\x72\x61\164\151\x6f\156\x5f\x73\x74\x61\164\x75\x73", "\115\x4f\137\x4f\x54\120\x5f\104\x45\x4c\111\126\x45\x52\105\104\137\123\125\x43\x43\x45\x53\123\137\105\x4d\x41\111\x4c");
        $this->mo_saml_show_success_message();
        jM:
        Gy:
        goto o4;
        cS:
        if (mo_saml_is_extension_installed("\143\165\x72\154")) {
            goto iC;
        }
        update_option("\155\x6f\x5f\x73\141\155\154\x5f\155\145\x73\163\141\x67\145", "\x45\x52\122\x4f\x52\x3a\40\120\110\x50\x20\x63\x55\122\x4c\x20\x65\x78\164\x65\x6e\163\x69\157\x6e\x20\x69\x73\40\x6e\x6f\x74\40\151\156\x73\164\141\x6c\154\145\x64\x20\157\x72\40\x64\x69\163\x61\142\154\145\x64\x2e\x20\x51\165\145\162\171\40\x73\x75\x62\155\x69\x74\x20\x66\x61\151\154\145\144\x2e");
        $this->mo_saml_show_error_message();
        return;
        iC:
        $dn = sanitize_email($_POST["\x6d\x6f\x5f\x73\141\x6d\x6c\x5f\x63\157\x6e\x74\x61\x63\164\x5f\x75\x73\137\x65\155\x61\x69\x6c"]);
        $Mb = htmlspecialchars($_POST["\155\157\x5f\x73\x61\x6d\154\137\143\x6f\x6e\164\141\143\164\x5f\x75\x73\x5f\x70\150\x6f\x6e\145"]);
        $mr = htmlspecialchars($_POST["\155\x6f\137\x73\x61\x6d\x6c\x5f\x63\x6f\x6e\x74\x61\x63\x74\137\x75\163\x5f\161\x75\x65\162\171"]);
        if (array_key_exists("\x73\145\x6e\x64\137\160\154\165\x67\x69\x6e\137\143\x6f\156\x66\151\x67", $_POST) === true) {
            goto lN;
        }
        update_option("\163\x65\x6e\144\x5f\x70\154\165\x67\151\x6e\137\x63\x6f\x6e\x66\151\x67", "\x6f\146\x66");
        goto kJ;
        lN:
        $h8 = miniorange_import_export(true, true);
        $mr .= $h8;
        delete_option("\163\145\x6e\x64\x5f\160\x6c\165\x67\151\156\x5f\143\x6f\156\x66\151\147");
        kJ:
        $e9 = new CustomerSaml();
        if ($this->mo_saml_check_empty_or_null($dn) || $this->mo_saml_check_empty_or_null($mr)) {
            goto cw;
        }
        if (!filter_var($dn, FILTER_VALIDATE_EMAIL)) {
            goto iM;
        }
        $o0 = $e9->submit_contact_us($dn, $Mb, $mr);
        if ($o0) {
            goto lS;
        }
        return;
        lS:
        update_option("\x6d\x6f\x5f\x73\x61\x6d\x6c\137\x6d\145\163\x73\x61\147\x65", "\x54\150\x61\156\153\163\40\146\157\162\x20\147\145\x74\164\151\156\147\40\x69\x6e\x20\164\x6f\165\143\x68\x21\40\x57\145\40\163\150\141\x6c\x6c\x20\x67\x65\x74\x20\x62\x61\x63\153\40\x74\x6f\40\171\x6f\x75\40\x73\150\x6f\x72\x74\154\x79\x2e");
        $this->mo_saml_show_success_message();
        goto oH;
        iM:
        update_option("\x6d\x6f\x5f\x73\141\x6d\154\137\x6d\x65\163\163\x61\147\145", "\x50\x6c\145\x61\x73\x65\40\145\x6e\164\x65\x72\x20\141\40\x76\x61\x6c\151\x64\40\x65\155\x61\x69\154\x20\141\144\x64\162\145\163\163\x2e");
        $this->mo_saml_show_error_message();
        return;
        oH:
        goto RJ;
        cw:
        update_option("\x6d\157\137\163\x61\155\154\137\155\145\163\x73\x61\147\x65", "\x50\154\145\141\x73\x65\40\x66\151\x6c\154\40\x75\x70\x20\x45\155\141\151\154\x20\x61\156\144\40\121\165\145\162\x79\40\x66\151\145\x6c\144\163\40\x74\157\40\163\x75\x62\155\151\164\x20\x79\157\165\x72\x20\161\165\145\162\x79\56");
        $this->mo_saml_show_error_message();
        RJ:
        o4:
        goto nM;
        R9:
        if (mo_saml_is_extension_installed("\x63\x75\162\x6c")) {
            goto cq;
        }
        update_option("\155\x6f\x5f\163\x61\155\154\x5f\x6d\x65\x73\x73\x61\147\x65", "\105\122\122\117\122\72\40\x50\110\x50\40\143\125\x52\114\x20\145\170\x74\145\156\x73\x69\157\x6e\40\x69\x73\x20\x6e\157\x74\40\151\156\163\164\141\154\x6c\x65\x64\40\157\x72\40\144\151\163\141\142\154\145\x64\56\40\x4c\x6f\147\x69\x6e\x20\146\x61\151\154\x65\x64\x2e");
        $this->mo_saml_show_error_message();
        return;
        cq:
        $dn = '';
        $FT = self::get_empty_strings();
        if ($this->mo_saml_check_empty_or_null($_POST["\x65\x6d\x61\x69\x6c"]) || $this->mo_saml_check_empty_or_null($_POST["\x70\x61\x73\163\167\x6f\x72\x64"])) {
            goto HU;
        }
        if ($this->checkPasswordPattern(strip_tags($_POST["\160\141\x73\163\x77\x6f\162\x64"]))) {
            goto FV;
        }
        $dn = sanitize_email($_POST["\x65\155\x61\151\154"]);
        $FT = stripslashes(strip_tags($_POST["\160\141\x73\x73\x77\x6f\x72\x64"]));
        goto Nv;
        FV:
        update_option("\x6d\157\x5f\163\141\155\154\x5f\x6d\145\x73\x73\x61\147\x65", "\x4d\x69\x6e\x69\155\x75\155\40\x36\x20\x63\150\141\x72\141\143\164\145\162\x73\40\x73\x68\157\x75\x6c\144\x20\142\145\x20\x70\x72\x65\163\145\156\164\x2e\x20\x4d\141\x78\151\155\165\155\x20\x31\65\40\x63\x68\141\162\x61\x63\164\145\x72\163\x20\x73\x68\157\165\154\144\40\x62\145\x20\160\x72\145\x73\x65\x6e\164\x2e\40\x4f\156\x6c\x79\x20\x66\157\x6c\154\157\167\x69\x6e\x67\x20\163\171\155\142\157\154\163\40\50\x21\x40\43\x2e\x24\45\x5e\x26\x2a\x2d\x5f\x29\40\163\150\x6f\165\x6c\x64\40\142\145\40\160\x72\145\x73\145\x6e\164\56");
        $this->mo_saml_show_error_message();
        return;
        Nv:
        goto Qz;
        HU:
        update_option("\x6d\157\137\x73\x61\155\x6c\137\155\x65\163\x73\141\x67\145", "\x41\x6c\154\40\x74\150\145\x20\146\x69\x65\x6c\x64\163\40\x61\162\x65\x20\x72\x65\161\165\x69\162\145\144\x2e\40\120\154\x65\141\x73\145\x20\x65\156\x74\145\162\40\x76\141\x6c\151\x64\40\145\x6e\x74\x72\151\145\163\x2e");
        $this->mo_saml_show_error_message();
        return;
        Qz:
        update_option("\x6d\x6f\137\x73\x61\155\x6c\x5f\141\x64\155\x69\156\137\145\155\x61\x69\x6c", $dn);
        update_option("\x6d\157\137\163\141\x6d\x6c\x5f\141\x64\155\x69\156\137\x70\141\163\163\167\x6f\162\144", $FT);
        $e9 = new Customersaml();
        $mw = $e9->get_customer_key();
        if ($mw) {
            goto UK;
        }
        return;
        UK:
        $Vj = json_decode($mw, true);
        if (json_last_error() == JSON_ERROR_NONE) {
            goto AX;
        }
        update_option("\155\x6f\x5f\163\x61\155\154\x5f\155\145\x73\x73\x61\x67\x65", "\x49\156\x76\141\154\x69\x64\x20\x75\163\145\x72\156\x61\155\145\x20\157\162\x20\160\x61\163\163\x77\157\162\144\56\x20\120\x6c\x65\141\x73\x65\40\x74\x72\171\x20\141\x67\x61\x69\156\x2e");
        $this->mo_saml_show_error_message();
        goto ca;
        AX:
        update_option("\155\157\x5f\163\141\x6d\154\x5f\x61\x64\155\x69\156\137\143\x75\x73\164\x6f\x6d\x65\162\137\153\x65\x79", $Vj["\x69\144"]);
        update_option("\155\157\x5f\163\x61\155\x6c\x5f\141\144\155\x69\x6e\137\141\x70\x69\x5f\x6b\145\171", $Vj["\141\160\x69\x4b\x65\x79"]);
        update_option("\x6d\x6f\137\163\141\155\x6c\137\x63\x75\163\x74\157\x6d\145\162\x5f\164\x6f\x6b\x65\x6e", $Vj["\x74\x6f\153\x65\156"]);
        if (empty($Vj["\x70\x68\157\x6e\x65"])) {
            goto pb;
        }
        update_option("\155\x6f\x5f\163\x61\155\x6c\x5f\x61\x64\155\x69\x6e\x5f\160\x68\157\x6e\x65", $Vj["\x70\150\157\x6e\x65"]);
        pb:
        update_option("\155\157\137\163\141\155\154\137\141\144\155\151\x6e\137\x70\x61\x73\163\167\x6f\x72\144", '');
        update_option("\155\157\x5f\163\x61\155\x6c\x5f\155\x65\x73\x73\141\147\x65", "\x43\165\163\164\157\x6d\x65\162\x20\162\145\x74\x72\x69\145\166\x65\x64\x20\163\x75\143\143\145\x73\x73\146\x75\x6c\x6c\171");
        update_option("\x6d\x6f\137\x73\141\155\154\x5f\x72\145\x67\151\x73\164\162\141\x74\151\x6f\x6e\x5f\163\x74\x61\x74\x75\x73", "\x45\170\x69\163\164\151\156\x67\40\x55\163\x65\x72");
        delete_option("\x6d\x6f\x5f\163\141\x6d\154\x5f\x76\x65\162\x69\146\x79\137\x63\x75\163\x74\x6f\155\145\162");
        if (get_option("\163\155\x6c\x5f\154\153")) {
            goto il;
        }
        $this->mo_saml_show_success_message();
        goto AW;
        il:
        $Ej = get_option("\155\157\137\163\x61\x6d\154\x5f\x63\x75\x73\164\157\155\x65\162\137\164\x6f\x6b\145\x6e");
        $l4 = AESEncryption::decrypt_data(get_option("\163\x6d\x6c\x5f\x6c\153"), $Ej);
        $mw = json_decode($e9->mo_saml_vl($l4, false), true);
        update_option("\166\x6c\x5f\x63\150\x65\143\x6b\x5f\164", time());
        if (strcasecmp($mw["\x73\164\141\164\165\x73"], "\x53\x55\103\x43\105\x53\x53") == 0) {
            goto gL;
        }
        update_option("\x6d\157\137\x73\x61\x6d\154\137\155\145\163\163\141\147\x65", "\114\151\x63\145\x6e\163\145\x20\153\x65\171\40\x66\157\x72\40\164\150\x69\163\x20\x69\156\x73\164\141\156\143\x65\40\x69\x73\x20\x69\156\143\157\x72\162\145\143\x74\x2e\40\x4d\141\153\x65\x20\x73\165\162\145\40\171\157\165\40\150\x61\x76\x65\x20\156\157\164\40\164\x61\155\x70\x65\162\x65\144\40\167\151\164\x68\40\151\x74\x20\141\164\40\x61\154\x6c\x2e\40\x50\x6c\x65\141\x73\x65\x20\145\x6e\164\145\162\40\141\40\x76\141\154\x69\x64\x20\154\151\x63\145\156\x73\145\40\153\145\x79\56");
        delete_option("\163\x6d\x6c\x5f\154\153");
        $this->mo_saml_show_error_message();
        goto Lx;
        gL:
        $ij = plugin_dir_path(__FILE__);
        $cq = home_url();
        $cq = trim($cq, "\57");
        if (preg_match("\x23\x5e\x68\164\x74\160\x28\163\51\x3f\72\57\x2f\43", $cq)) {
            goto Os;
        }
        $cq = "\x68\164\164\x70\x3a\57\x2f" . $cq;
        Os:
        $kP = parse_url($cq);
        $Fa = preg_replace("\x2f\136\167\x77\167\134\56\57", '', $kP["\x68\x6f\x73\x74"]);
        $dk = wp_upload_dir();
        $CX = $Fa . "\55" . $dk["\x62\x61\163\x65\144\x69\x72"];
        $Hk = hash_hmac("\x73\x68\141\x32\65\66", $CX, "\64\x44\110\x66\x6a\147\146\152\x61\x73\x6e\x64\x66\163\141\x6a\x66\x48\107\x4a");
        $xN = $this->djkasjdksa();
        $cp = round(strlen($xN) / rand(2, 20));
        $xN = substr_replace($xN, $Hk, $cp, 0);
        $J5 = base64_decode($xN);
        if (is_writable($ij . "\154\151\x63\x65\156\163\x65")) {
            goto gx;
        }
        $xN = str_rot13($xN);
        $ON = base64_decode("\x62\x47\116\x6b\x61\x6d\164\x68\143\x32\160\153\141\x33\x4e\x68\131\62\167\75");
        update_option($ON, $xN);
        goto aX;
        gx:
        file_put_contents($ij . "\154\151\x63\145\156\163\145", $J5);
        aX:
        update_option("\154\143\x77\x72\x74\154\146\x73\x61\155\x6c", true);
        $this->mo_saml_show_success_message();
        Lx:
        AW:
        ca:
        update_option("\x6d\x6f\137\x73\141\x6d\154\137\x61\x64\x6d\151\x6e\x5f\160\141\x73\x73\167\x6f\162\x64", '');
        nM:
        goto vc;
        J3:
        if (mo_saml_is_extension_installed("\143\x75\x72\154")) {
            goto jE;
        }
        update_option("\x6d\157\x5f\x73\x61\x6d\154\x5f\155\145\163\x73\141\x67\x65", "\105\x52\x52\117\122\x3a\x20\x50\110\x50\x20\143\125\122\x4c\x20\x65\170\x74\x65\x6e\x73\x69\x6f\x6e\x20\x69\163\40\156\157\164\40\151\x6e\163\164\141\154\x6c\x65\144\x20\157\162\x20\x64\151\x73\141\142\x6c\x65\144\x2e\40\x56\x61\154\151\x64\x61\x74\145\x20\x4f\124\120\40\146\x61\x69\154\x65\x64\x2e");
        $this->mo_saml_show_error_message();
        return;
        jE:
        $OV = '';
        if ($this->mo_saml_check_empty_or_null($_POST["\157\x74\160\137\x74\157\x6b\x65\x6e"])) {
            goto v7;
        }
        $OV = htmlspecialchars($_POST["\x6f\164\160\x5f\x74\157\x6b\x65\x6e"]);
        goto mz;
        v7:
        update_option("\155\x6f\137\x73\141\x6d\x6c\137\155\x65\163\x73\x61\x67\x65", "\x50\154\x65\141\163\145\40\x65\156\x74\145\x72\x20\x61\x20\x76\141\x6c\165\145\40\151\156\x20\x6f\x74\160\40\x66\151\145\154\144\56");
        $this->mo_saml_show_error_message();
        return;
        mz:
        $e9 = new CustomerSaml();
        $mw = $e9->validate_otp_token(get_option("\x6d\157\x5f\x73\x61\x6d\154\x5f\x74\x72\141\156\163\x61\143\164\x69\157\x6e\111\x64"), $OV);
        if ($mw) {
            goto f_;
        }
        return;
        f_:
        $mw = json_decode($mw, true);
        if (strcasecmp($mw["\x73\x74\141\164\x75\163"], "\123\x55\x43\103\105\x53\123") == 0) {
            goto rI;
        }
        update_option("\155\157\137\163\x61\x6d\154\x5f\x6d\x65\163\x73\141\x67\x65", "\x49\x6e\x76\x61\154\151\144\x20\x6f\x6e\145\40\x74\151\155\145\x20\x70\141\163\x73\x63\x6f\144\145\x2e\40\x50\154\145\x61\163\145\x20\145\156\164\x65\162\40\x61\x20\x76\141\x6c\x69\144\40\157\164\x70\56");
        $this->mo_saml_show_error_message();
        goto zV;
        rI:
        $this->create_customer();
        zV:
        vc:
        goto RC;
        Mo:
        if (mo_saml_is_extension_installed("\x63\x75\162\154")) {
            goto rR;
        }
        update_option("\155\157\x5f\x73\141\155\154\x5f\155\145\x73\x73\141\147\x65", "\105\122\122\117\x52\x3a\x20\120\110\120\40\143\125\x52\114\x20\145\170\164\145\156\x73\151\157\156\x20\x69\x73\40\x6e\x6f\164\x20\151\x6e\x73\x74\x61\154\x6c\x65\144\40\157\162\40\144\x69\163\x61\142\x6c\145\x64\x2e\40\x52\145\147\x69\x73\x74\162\141\164\x69\x6f\x6e\x20\x66\x61\151\x6c\x65\x64\56");
        $this->mo_saml_show_error_message();
        return;
        rR:
        $dn = '';
        $Mb = '';
        $FT = self::get_empty_strings();
        $AP = self::get_empty_strings();
        if ($this->mo_saml_check_empty_or_null($_POST["\145\155\x61\151\x6c"]) || $this->mo_saml_check_empty_or_null($_POST["\160\x61\x73\x73\x77\157\x72\144"]) || $this->mo_saml_check_empty_or_null($_POST["\x63\x6f\156\146\151\x72\155\120\x61\x73\163\167\x6f\162\144"])) {
            goto JI;
        }
        if (strlen($_POST["\160\141\x73\163\167\157\x72\x64"]) < 6 || strlen($_POST["\143\157\156\146\151\x72\155\120\141\163\x73\167\157\x72\x64"]) < 6) {
            goto FY;
        }
        if ($this->checkPasswordPattern(strip_tags($_POST["\x70\141\163\163\167\157\162\144"]))) {
            goto JJ;
        }
        $dn = sanitize_email($_POST["\x65\x6d\141\151\154"]);
        if (!isset($_POST["\x70\150\x6f\x6e\145"])) {
            goto Gz;
        }
        $Mb = htmlspecialchars($_POST["\160\x68\x6f\x6e\x65"]);
        Gz:
        $FT = stripslashes(strip_tags($_POST["\x70\x61\x73\163\167\x6f\162\x64"]));
        $AP = stripslashes(strip_tags($_POST["\143\157\x6e\x66\151\x72\x6d\x50\141\163\163\x77\x6f\x72\144"]));
        goto j6;
        JJ:
        update_option("\155\x6f\x5f\x73\141\155\154\137\x6d\x65\163\163\x61\147\x65", "\115\151\x6e\x69\x6d\165\x6d\x20\x36\x20\x63\150\141\x72\141\143\x74\145\x72\163\x20\x73\x68\157\165\154\144\x20\x62\145\40\160\x72\x65\163\145\x6e\x74\56\x20\115\141\170\151\155\x75\x6d\x20\x31\65\x20\x63\x68\x61\162\141\143\x74\x65\x72\x73\x20\163\150\157\x75\x6c\x64\x20\142\145\40\160\x72\x65\x73\x65\156\x74\56\40\117\x6e\154\x79\x20\146\157\154\154\157\x77\x69\x6e\x67\40\x73\x79\x6d\x62\x6f\154\x73\40\x28\x21\100\x23\x2e\44\45\136\x26\x2a\55\x5f\51\x20\163\x68\157\165\154\144\40\142\x65\x20\x70\162\145\x73\x65\x6e\164\56");
        $this->mo_saml_show_error_message();
        return;
        j6:
        goto Ry;
        FY:
        update_option("\x6d\x6f\x5f\163\141\155\154\x5f\155\145\x73\x73\x61\x67\145", "\103\x68\157\157\x73\145\40\x61\x20\x70\141\x73\163\167\x6f\x72\144\x20\x77\x69\x74\x68\x20\155\x69\156\x69\x6d\x75\155\40\x6c\x65\156\147\x74\150\x20\x36\x2e");
        $this->mo_saml_show_error_message();
        return;
        Ry:
        goto I7;
        JI:
        update_option("\155\x6f\x5f\163\141\155\154\x5f\x6d\x65\x73\163\141\147\x65", "\101\x6c\154\x20\x74\x68\145\40\x66\151\145\154\144\163\x20\x61\162\145\40\162\x65\x71\165\x69\x72\145\144\56\x20\120\154\x65\141\x73\x65\40\145\x6e\x74\145\162\x20\166\x61\x6c\151\144\x20\145\156\164\162\x69\x65\x73\56");
        $this->mo_saml_show_error_message();
        return;
        I7:
        update_option("\x6d\x6f\x5f\x73\141\x6d\154\x5f\x61\x64\155\x69\156\x5f\145\x6d\x61\151\x6c", $dn);
        update_option("\x6d\157\137\x73\141\155\x6c\137\x61\x64\x6d\151\x6e\137\x70\150\157\x6e\x65", $Mb);
        if (strcmp($FT, $AP) == 0) {
            goto iW;
        }
        update_option("\x6d\x6f\137\x73\141\x6d\x6c\137\155\x65\163\163\x61\x67\x65", "\120\141\163\163\x77\x6f\x72\144\163\40\144\157\40\156\x6f\x74\x20\x6d\x61\164\143\x68\56");
        delete_option("\155\157\137\x73\141\x6d\x6c\x5f\x76\145\162\x69\146\171\x5f\x63\x75\163\164\157\155\x65\x72");
        $this->mo_saml_show_error_message();
        goto jh;
        iW:
        update_option("\155\157\137\x73\141\155\154\137\x61\144\x6d\x69\x6e\x5f\x70\141\x73\163\x77\157\162\x64", $FT);
        $dn = get_option("\x6d\157\137\x73\x61\x6d\x6c\x5f\x61\144\155\x69\156\137\x65\x6d\x61\x69\154");
        $e9 = new CustomerSaml();
        $mw = $e9->check_customer();
        if ($mw) {
            goto qN;
        }
        return;
        qN:
        $mw = json_decode($mw, true);
        if (strcasecmp($mw["\x73\x74\141\164\x75\x73"], "\x43\x55\123\x54\x4f\115\105\x52\137\x4e\117\124\x5f\x46\117\x55\x4e\x44") == 0) {
            goto Gl;
        }
        $this->get_current_customer();
        goto ux;
        Gl:
        $mw = $e9->send_otp_token($dn, '');
        if ($mw) {
            goto Xh;
        }
        return;
        Xh:
        $mw = json_decode($mw, true);
        if (strcasecmp($mw["\x73\x74\x61\164\x75\x73"], "\123\125\x43\x43\x45\x53\123") == 0) {
            goto EH;
        }
        update_option("\x6d\157\137\163\141\x6d\154\137\x6d\x65\x73\163\x61\147\145", "\x54\x68\145\162\x65\40\x77\141\x73\x20\x61\156\40\145\162\162\x6f\162\40\151\156\40\x73\145\156\x64\x69\x6e\x67\x20\x65\x6d\x61\x69\x6c\x2e\x20\x50\154\145\x61\163\145\40\166\145\162\x69\x66\x79\40\171\x6f\165\162\x20\145\x6d\x61\x69\154\x20\x61\156\x64\40\164\162\x79\40\141\147\141\x69\156\56");
        update_option("\155\x6f\x5f\163\141\155\x6c\137\x72\145\x67\x69\163\164\162\x61\x74\x69\157\x6e\x5f\163\x74\141\164\x75\x73", "\x4d\117\x5f\117\x54\120\137\x44\x45\x4c\111\126\105\122\x45\x44\137\106\101\111\x4c\x55\x52\105\x5f\105\x4d\101\x49\x4c");
        $this->mo_saml_show_error_message();
        goto YW;
        EH:
        update_option("\155\x6f\x5f\x73\x61\155\154\137\155\x65\x73\x73\x61\x67\x65", "\40\101\x20\157\156\145\x20\x74\151\x6d\x65\x20\x70\x61\x73\x73\x63\x6f\x64\x65\x20\151\x73\40\x73\x65\156\164\40\x74\x6f\40" . get_option("\x6d\157\137\163\141\155\x6c\x5f\x61\144\155\151\x6e\x5f\145\x6d\141\x69\x6c") . "\56\x20\120\x6c\x65\x61\163\x65\40\145\156\x74\x65\162\40\164\150\145\x20\x6f\x74\160\40\150\x65\x72\145\40\164\x6f\x20\166\145\162\151\146\x79\x20\171\157\x75\x72\x20\145\155\x61\x69\154\x2e");
        update_option("\155\x6f\x5f\x73\x61\x6d\154\x5f\164\162\141\156\x73\141\143\x74\x69\x6f\x6e\x49\144", $mw["\x74\x78\111\x64"]);
        update_option("\155\157\137\x73\141\155\x6c\x5f\x72\145\x67\x69\163\x74\162\141\x74\151\x6f\x6e\137\163\x74\x61\164\x75\163", "\115\x4f\x5f\x4f\124\120\x5f\104\105\114\x49\x56\105\x52\x45\104\137\x53\125\x43\103\105\x53\123\x5f\105\115\101\x49\114");
        $this->mo_saml_show_success_message();
        YW:
        ux:
        jh:
        RC:
        goto Jk;
        sl:
        $TB = htmlspecialchars($_POST["\x6d\x6f\137\163\141\x6d\x6c\137\x63\x75\x73\164\157\155\x5f\154\157\x67\151\x6e\x5f\x74\x65\170\x74"]);
        update_option("\x6d\157\137\163\141\155\154\137\143\x75\x73\x74\x6f\x6d\x5f\154\157\147\151\x6e\137\164\145\170\164", stripcslashes($TB));
        $fI = htmlspecialchars($_POST["\155\157\137\x73\141\x6d\154\x5f\143\165\163\164\157\x6d\137\147\162\145\145\x74\x69\x6e\x67\x5f\164\x65\170\164"]);
        update_option("\155\157\137\163\141\155\x6c\x5f\x63\x75\163\x74\x6f\155\x5f\x67\162\x65\145\164\x69\x6e\147\137\x74\145\x78\x74", stripcslashes($fI));
        $gE = htmlspecialchars($_POST["\155\157\x5f\163\141\155\x6c\137\x67\162\145\145\164\151\156\147\137\156\x61\155\145"]);
        update_option("\x6d\x6f\x5f\x73\x61\x6d\154\137\x67\162\x65\x65\164\x69\x6e\x67\137\x6e\141\155\x65", stripslashes($gE));
        $eX = htmlspecialchars($_POST["\x6d\x6f\x5f\163\x61\x6d\x6c\137\143\165\x73\164\157\x6d\x5f\x6c\x6f\147\x6f\165\164\137\x74\x65\x78\164"]);
        update_option("\x6d\157\137\x73\x61\x6d\154\x5f\143\x75\163\x74\157\155\137\154\x6f\147\x6f\165\x74\137\164\x65\x78\164", stripcslashes($eX));
        update_option("\155\157\137\x73\x61\x6d\x6c\137\155\145\163\x73\x61\147\145", "\x57\151\x64\147\145\164\40\123\x65\164\x74\x69\x6e\147\163\40\165\160\144\x61\x74\145\144\40\163\x75\x63\143\x65\x73\x73\146\x75\154\154\x79\56");
        $this->mo_saml_show_success_message();
        Jk:
        O_:
        if (mo_saml_is_trial_active()) {
            goto I8;
        }
        if (site_check()) {
            goto fi;
        }
        delete_option("\155\x6f\137\x73\x61\155\154\x5f\146\157\162\x63\145\x5f\141\x75\x74\x68\x65\x6e\x74\x69\x63\x61\x74\151\157\156");
        fi:
        goto zw;
        I8:
        if (!decryptSamlElement()) {
            goto eD;
        }
        $Ej = get_option("\155\x6f\137\163\x61\x6d\x6c\137\143\165\x73\164\157\x6d\x65\162\137\x74\x6f\x6b\x65\156");
        update_option("\164\x5f\163\x69\x74\145\137\x73\164\141\164\x75\x73", AESEncryption::encrypt_data("\x66\141\x6c\163\x65", $Ej));
        eD:
        zw:
    }
    function djkasjdksa()
    {
        $RI = "\41\176\100\x23\x24\x25\x5e\x26\x2a\50\x29\137\53\x7c\x7b\x7d\74\76\x3f\60\x31\x32\63\64\x35\66\67\70\x39\x61\x62\143\144\x65\x66\x67\x68\x69\152\153\154\155\156\x6f\160\161\162\x73\164\x75\x76\x77\170\x79\172\101\x42\x43\x44\x45\106\x47\x48\x49\x4a\113\x4c\x4d\116\117\120\x51\122\x53\x54\125\126\127\x58\x59\x5a";
        $qJ = strlen($RI);
        $Wc = '';
        $Eh = 0;
        mF:
        if (!($Eh < 10000)) {
            goto v3;
        }
        $Wc .= $RI[rand(0, $qJ - 1)];
        u5:
        $Eh++;
        goto mF;
        v3:
        return $Wc;
    }
    function create_customer()
    {
        $e9 = new CustomerSaml();
        $mw = $e9->create_customer();
        if ($mw) {
            goto j5;
        }
        return;
        j5:
        $Vj = json_decode($mw, true);
        if (strcasecmp($Vj["\163\164\141\x74\x75\x73"], "\103\125\x53\124\x4f\115\105\122\x5f\x55\123\105\122\116\101\x4d\x45\137\101\x4c\x52\105\101\x44\x59\137\105\130\111\x53\x54\123") == 0) {
            goto HO;
        }
        if (!(strcasecmp($Vj["\163\164\x61\x74\165\x73"], "\x53\x55\x43\103\x45\123\x53") == 0)) {
            goto rO;
        }
        update_option("\155\157\x5f\x73\141\x6d\154\x5f\x61\144\155\x69\x6e\x5f\143\x75\x73\164\x6f\155\x65\162\137\153\145\171", $Vj["\151\144"]);
        update_option("\x6d\x6f\137\163\x61\155\154\137\x61\x64\x6d\x69\156\x5f\x61\160\151\x5f\x6b\145\x79", $Vj["\x61\160\x69\113\145\x79"]);
        update_option("\155\157\x5f\163\x61\155\x6c\x5f\143\x75\x73\x74\x6f\x6d\145\162\x5f\x74\157\153\x65\156", $Vj["\x74\157\153\145\156"]);
        update_option("\x6d\x6f\137\163\141\x6d\154\x5f\x61\144\155\x69\156\x5f\160\x61\x73\163\x77\x6f\162\x64", '');
        update_option("\x6d\x6f\137\x73\141\155\154\x5f\x6d\x65\163\x73\141\x67\x65", "\124\x68\x61\x6e\153\40\x79\157\x75\x20\x66\x6f\x72\x20\162\x65\x67\x69\x73\x74\x65\x72\151\x6e\147\x20\167\151\164\150\x20\155\151\x6e\x69\157\x72\141\156\x67\x65\x2e");
        update_option("\x6d\x6f\x5f\x73\x61\155\x6c\137\162\145\x67\151\x73\x74\x72\x61\x74\x69\157\156\x5f\x73\x74\141\164\165\x73", '');
        delete_option("\155\x6f\137\x73\x61\155\154\x5f\166\x65\162\151\146\x79\x5f\x63\165\163\164\x6f\155\145\162");
        delete_option("\155\157\x5f\x73\141\155\154\137\156\145\167\x5f\162\145\147\151\163\x74\x72\141\x74\151\157\156");
        $this->mo_saml_show_success_message();
        rO:
        goto UL;
        HO:
        $this->get_current_customer();
        UL:
        update_option("\x6d\157\x5f\163\x61\x6d\x6c\137\x61\x64\155\151\x6e\137\160\x61\x73\163\x77\x6f\x72\144", '');
    }
    function get_current_customer()
    {
        $e9 = new CustomerSaml();
        $mw = $e9->get_customer_key();
        if ($mw) {
            goto SC;
        }
        return;
        SC:
        $Vj = json_decode($mw, true);
        if (json_last_error() == JSON_ERROR_NONE) {
            goto Rc;
        }
        update_option("\x6d\x6f\x5f\x73\x61\155\x6c\137\x6d\x65\x73\x73\x61\x67\145", "\131\157\x75\x20\x61\x6c\x72\x65\x61\x64\x79\x20\x68\141\166\145\40\141\x6e\40\141\x63\143\x6f\x75\x6e\164\x20\167\x69\164\x68\x20\155\151\156\x69\117\x72\141\156\x67\x65\56\40\120\x6c\145\x61\x73\x65\40\145\x6e\x74\145\x72\x20\x61\40\x76\x61\154\151\144\x20\x70\141\163\x73\x77\157\x72\144\56");
        update_option("\x6d\x6f\x5f\163\141\155\154\137\x76\x65\162\151\x66\171\137\x63\165\x73\164\x6f\155\x65\x72", "\x74\x72\x75\145");
        delete_option("\x6d\x6f\x5f\163\141\x6d\x6c\x5f\156\145\167\x5f\162\145\x67\151\163\x74\162\x61\164\x69\x6f\x6e");
        $this->mo_saml_show_error_message();
        goto H6;
        Rc:
        update_option("\155\157\137\x73\x61\x6d\x6c\137\x61\144\155\x69\156\137\143\x75\163\164\x6f\155\145\162\x5f\153\x65\x79", $Vj["\151\144"]);
        update_option("\x6d\157\x5f\x73\x61\155\154\x5f\141\144\155\151\156\x5f\141\x70\x69\137\153\145\171", $Vj["\141\x70\151\113\145\x79"]);
        update_option("\155\x6f\137\x73\x61\155\154\137\x63\165\x73\x74\157\155\x65\x72\x5f\x74\x6f\x6b\145\x6e", $Vj["\164\157\x6b\x65\x6e"]);
        update_option("\155\157\x5f\x73\x61\x6d\154\137\141\x64\155\x69\156\x5f\x70\141\x73\163\167\x6f\162\144", '');
        update_option("\x6d\157\x5f\x73\x61\155\x6c\137\155\145\x73\x73\141\147\145", "\131\157\x75\162\x20\141\x63\143\x6f\x75\156\x74\40\x68\141\x73\40\142\145\145\x6e\x20\x72\145\x74\162\151\145\x76\145\x64\x20\163\x75\x63\143\145\163\163\146\x75\154\x6c\171\x2e");
        delete_option("\155\157\x5f\x73\141\x6d\x6c\x5f\166\145\x72\x69\x66\x79\137\x63\165\163\164\x6f\155\145\x72");
        delete_option("\155\157\x5f\x73\141\x6d\154\137\156\145\167\137\x72\145\147\x69\163\164\x72\x61\164\x69\157\x6e");
        $this->mo_saml_show_success_message();
        H6:
    }
    public function mo_saml_check_empty_or_null($j1)
    {
        if (!(!isset($j1) || empty($j1))) {
            goto kK;
        }
        return true;
        kK:
        return false;
    }
    function miniorange_sso_menu()
    {
        $bE = add_menu_page("\x4d\x4f\x20\x53\101\x4d\x4c\40\123\x65\x74\164\151\x6e\x67\x73\40" . __("\103\157\156\x66\151\x67\165\162\x65\40\123\x41\x4d\114\40\x49\x64\x65\x6e\164\x69\164\171\40\x50\162\x6f\x76\x69\x64\145\162\x20\146\x6f\x72\x20\123\123\117", "\x6d\157\137\x73\x61\155\154\x5f\163\x65\x74\164\151\156\x67\x73"), "\x6d\151\x6e\151\117\x72\141\x6e\x67\x65\x20\x53\101\115\114\40\x32\x2e\60\40\123\x53\117", "\141\x64\155\151\x6e\151\x73\164\x72\141\x74\x6f\162", "\x6d\x6f\x5f\163\x61\155\x6c\137\x73\x65\164\x74\x69\x6e\x67\x73", array($this, "\x6d\157\x5f\154\x6f\147\151\x6e\137\167\151\144\x67\145\164\137\x73\141\x6d\x6c\137\x6f\x70\164\151\x6f\x6e\163"), plugin_dir_url(__FILE__) . "\151\x6d\141\x67\x65\x73\57\155\151\156\151\x6f\x72\x61\156\147\145\x2e\160\156\x67");
        if (!mo_saml_is_customer_license_key_verified()) {
            goto AQ;
        }
        add_submenu_page("\155\157\137\163\x61\155\x6c\137\163\x65\x74\x74\x69\x6e\147\163", "\115\x61\156\x61\x67\145\40\114\151\143\x65\156\x73\x65\x20\113\x65\171\163", "\x4d\x61\156\141\147\145\x20\x4c\151\x63\x65\156\x73\145\40\113\145\171\163", "\x61\144\x6d\x69\156\x69\163\164\x72\x61\x74\x6f\162", "\155\157\137\x6d\141\156\141\x67\x65\137\x6c\x69\143\145\156\163\x65", "\155\157\137\155\141\156\x61\x67\x65\x5f\154\151\143\145\x6e\163\145");
        AQ:
    }
    function mo_saml_redirect_for_authentication($VK)
    {
        if (!mo_saml_is_customer_license_key_verified()) {
            goto fH;
        }
        if (!(get_option("\155\x6f\x5f\163\141\155\154\x5f\162\145\147\151\x73\164\x65\162\145\144\x5f\157\156\154\x79\137\x61\x63\143\x65\x73\x73") == "\164\x72\x75\x65")) {
            goto kH;
        }
        $base_url = home_url();
        echo "\74\x73\143\x72\x69\160\164\76\167\151\x6e\144\157\167\56\154\157\143\x61\164\x69\157\156\x2e\x68\162\x65\x66\75\47{$base_url}\57\77\x6f\x70\164\x69\157\156\x3d\x73\x61\155\x6c\x5f\165\x73\145\x72\x5f\x6c\157\147\x69\156\x26\x72\145\144\x69\x72\145\143\164\x5f\164\157\x3d\x27\x2b\145\x6e\143\x6f\144\145\125\122\x49\x43\157\155\x70\157\156\x65\156\164\50\167\151\156\x64\x6f\167\x2e\x6c\157\143\x61\164\151\157\x6e\56\150\x72\x65\x66\x29\x3b\x3c\x2f\163\x63\x72\x69\x70\164\x3e";
        die;
        kH:
        if (get_option("\155\157\x5f\x73\x61\x6d\154\x5f\162\x65\147\x69\x73\x74\145\162\x65\144\137\157\156\154\171\x5f\x61\x63\x63\145\163\x73") == "\x74\x72\x75\x65" || get_option("\x6d\157\137\x73\141\155\154\137\145\x6e\141\x62\x6c\145\x5f\154\x6f\x67\x69\156\x5f\x72\145\144\x69\162\x65\143\x74") == "\x74\162\x75\x65") {
            goto yN;
        }
        if (!(get_option("\x6d\x6f\x5f\x73\x61\155\x6c\x5f\162\x65\x64\151\162\x65\143\164\137\x74\157\x5f\x77\x70\137\154\157\x67\151\x6e") == "\x74\162\165\145")) {
            goto jo;
        }
        if (!(mo_saml_is_sp_configured() && !is_user_logged_in())) {
            goto za;
        }
        $xz = site_url() . "\x2f\x77\x70\55\x6c\x6f\x67\151\156\x2e\x70\x68\160";
        if (empty($VK)) {
            goto Zl;
        }
        $xz = $xz . "\x3f\x72\145\x64\151\x72\145\143\x74\x5f\x74\157\75" . urlencode($VK) . "\x26\x72\145\x61\x75\x74\150\75\61";
        Zl:
        header("\x4c\x6f\143\x61\164\151\157\x6e\x3a\40" . $xz);
        die;
        za:
        jo:
        goto lM;
        yN:
        if (!(mo_saml_is_sp_configured() && !is_user_logged_in())) {
            goto Ml;
        }
        $Ca = get_option("\x6d\157\x5f\163\x61\155\154\137\x73\x70\x5f\x62\x61\x73\145\137\165\x72\x6c");
        if (!empty($Ca)) {
            goto jC;
        }
        $Ca = home_url();
        jC:
        if (!(get_option("\155\x6f\137\163\x61\155\x6c\137\x72\x65\154\141\x79\x5f\163\164\x61\164\x65") && get_option("\x6d\x6f\x5f\x73\x61\x6d\x6c\x5f\162\145\154\141\171\x5f\x73\164\141\164\x65") != '')) {
            goto e5;
        }
        $VK = get_option("\x6d\x6f\137\163\141\x6d\x6c\137\162\145\x6c\141\x79\137\163\164\141\164\x65");
        e5:
        $VK = mo_saml_get_relay_state($VK);
        $Nc = empty($VK) ? "\x2f" : $VK;
        $ZS = htmlspecialchars_decode(LicenseHelper::getCurrentOption(mo_options_enum_service_provider::Login_URL));
        $yF = LicenseHelper::getCurrentOption(mo_options_enum_service_provider::Login_binding_type);
        $b8 = get_option("\155\157\137\163\x61\x6d\154\x5f\x66\x6f\162\143\x65\137\141\165\x74\x68\145\156\164\x69\143\x61\164\x69\157\x6e");
        $Ii = $Ca . "\x2f";
        $CU = get_option(mo_options_enum_identity_provider::SP_Entity_ID);
        $ml = LicenseHelper::getCurrentOption(mo_options_enum_service_provider::NameID_Format);
        if (!empty($ml)) {
            goto X6;
        }
        $ml = "\x31\x2e\61\x3a\156\x61\155\145\x69\x64\55\146\157\x72\x6d\x61\164\72\x75\x6e\x73\x70\x65\x63\x69\x66\151\145\144";
        X6:
        if (!empty($CU)) {
            goto Je;
        }
        $CU = $Ca . "\x2f\x77\x70\55\143\x6f\x6e\x74\x65\156\164\x2f\160\154\165\x67\x69\156\163\57\x6d\x69\x6e\x69\157\x72\x61\x6e\147\x65\55\x73\x61\155\154\55\62\60\55\163\151\x6e\147\154\x65\55\x73\151\147\x6e\55\x6f\x6e\57";
        Je:
        $AJ = SAMLSPUtilities::createAuthnRequest($Ii, $CU, $ZS, $b8, $yF, $ml);
        if (empty($yF) || $yF == "\110\164\164\160\122\145\x64\x69\x72\x65\143\164") {
            goto cZ;
        }
        if (!(LicenseHelper::getCurrentOption(mo_options_enum_service_provider::Request_signed) == "\165\156\143\150\x65\143\x6b\x65\x64")) {
            goto Gh;
        }
        $pl = base64_encode($AJ);
        SAMLSPUtilities::postSAMLRequest($ZS, $pl, $Nc);
        die;
        Gh:
        $pl = SAMLSPUtilities::signXML($AJ, "\x4e\141\x6d\x65\111\x44\120\x6f\x6c\x69\x63\x79");
        SAMLSPUtilities::postSAMLRequest($ZS, $pl, $Nc);
        goto fN1;
        cZ:
        $IV = $ZS;
        if (strpos($ZS, "\x3f") !== false) {
            goto jB;
        }
        $IV .= "\77";
        goto lh;
        jB:
        $IV .= "\x26";
        lh:
        if (!(LicenseHelper::getCurrentOption(mo_options_enum_service_provider::Request_signed) == "\x75\156\143\x68\x65\143\153\145\144")) {
            goto Xa;
        }
        $IV .= "\123\101\x4d\x4c\x52\x65\x71\165\145\163\x74\75" . $AJ . "\46\122\145\x6c\141\x79\x53\x74\141\164\x65\75" . urlencode($Nc);
        header("\143\x61\143\150\145\x2d\143\157\156\164\x72\x6f\x6c\72\x20\x6d\141\x78\55\x61\x67\145\x3d\x30\x2c\x20\160\162\151\x76\141\x74\145\x2c\40\x6e\x6f\x2d\163\x74\157\162\x65\54\x20\156\157\55\x63\x61\x63\150\x65\54\40\155\165\163\164\55\x72\x65\166\x61\x6c\151\144\141\x74\145");
        header("\114\157\143\141\164\151\x6f\156\x3a\40" . $IV);
        die;
        Xa:
        $AJ = "\123\101\x4d\x4c\122\x65\x71\165\145\x73\164\75" . $AJ . "\46\122\x65\154\141\171\123\164\141\164\x65\75" . urlencode($Nc) . "\x26\123\x69\x67\101\x6c\x67\x3d" . urlencode(XMLSecurityKey::RSA_SHA256);
        $Z6 = array("\164\x79\x70\145" => "\x70\162\151\x76\141\x74\x65");
        $Ej = new XMLSecurityKey(XMLSecurityKey::RSA_SHA256, $Z6);
        $N1 = get_option("\x6d\157\137\x73\x61\x6d\154\137\143\x75\162\x72\145\156\164\x5f\x63\x65\162\x74\x5f\x70\162\151\x76\141\164\145\137\153\x65\171");
        $Ej->loadKey($N1, FALSE);
        $kj = new XMLSecurityDSig();
        $xZ = $Ej->signData($AJ);
        $xZ = base64_encode($xZ);
        $IV .= $AJ . "\x26\123\x69\x67\156\141\x74\x75\162\145\x3d" . urlencode($xZ);
        header("\x63\x61\x63\x68\x65\55\143\157\x6e\x74\x72\157\x6c\72\40\x6d\x61\x78\55\141\x67\145\75\x30\54\40\160\162\x69\x76\141\x74\145\x2c\40\156\x6f\55\163\x74\x6f\162\145\54\40\156\x6f\55\x63\141\x63\x68\145\x2c\40\155\165\x73\164\55\x72\145\x76\x61\x6c\151\x64\141\164\x65");
        header("\x4c\x6f\143\141\x74\x69\x6f\x6e\72\x20" . $IV);
        die;
        fN1:
        Ml:
        lM:
        fH:
    }
    function mo_saml_login_redirect($k1)
    {
        $Sb = false;
        if (!(strcmp(wp_login_url(), $k1) == 0)) {
            goto GQ;
        }
        $Sb = true;
        GQ:
        if (!empty($k1) && !$Sb) {
            goto l7;
        }
        header("\114\x6f\143\x61\164\151\x6f\x6e\72\40" . home_url());
        goto bC;
        l7:
        header("\x4c\x6f\143\x61\164\151\157\156\72\40" . $k1);
        bC:
        die;
    }
    function mo_saml_authenticate()
    {
        $k1 = '';
        if (!isset($_REQUEST["\x72\145\x64\151\162\x65\143\164\137\x74\157"])) {
            goto Bj;
        }
        $k1 = htmlspecialchars($_REQUEST["\x72\145\x64\x69\x72\145\143\x74\137\x74\x6f"]);
        Bj:
        if (!is_user_logged_in()) {
            goto gz;
        }
        $this->mo_saml_login_redirect($k1);
        gz:
        if (!(get_option("\x6d\x6f\137\163\141\155\154\137\x65\x6e\141\142\x6c\145\137\x6c\x6f\x67\x69\156\x5f\162\145\x64\151\x72\145\143\x74") == "\164\162\165\145")) {
            goto ON;
        }
        $hL = get_option("\155\157\137\163\x61\x6d\154\137\142\141\x63\153\144\157\x6f\x72\x5f\x75\162\x6c") ? trim(get_option("\155\157\x5f\163\x61\155\x6c\x5f\142\141\143\x6b\x64\x6f\x6f\162\x5f\x75\162\x6c")) : "\x66\141\154\163\145";
        if (isset($_GET["\x6c\157\147\x67\x65\144\157\165\164"]) && $_GET["\154\x6f\x67\x67\145\x64\x6f\x75\164"] == "\x74\162\x75\145") {
            goto pQ;
        }
        if (get_option("\x6d\x6f\137\x73\141\155\154\137\141\x6c\x6c\157\x77\137\x77\x70\x5f\x73\x69\147\156\x69\156") == "\164\x72\x75\x65") {
            goto gc;
        }
        goto ja;
        pQ:
        header("\x4c\x6f\143\141\164\x69\157\x6e\x3a\x20" . home_url());
        die;
        goto ja;
        gc:
        if (isset($_GET["\x73\x61\155\154\x5f\163\x73\x6f"]) && $_GET["\163\x61\155\x6c\137\x73\163\x6f"] === $hL || isset($_POST["\163\141\x6d\x6c\x5f\163\x73\x6f"]) && $_POST["\163\x61\155\154\137\163\x73\157"] === $hL) {
            goto IH;
        }
        if (isset($_REQUEST["\x72\145\144\151\x72\x65\x63\x74\137\164\x6f"])) {
            goto xQ;
        }
        goto Wo;
        IH:
        return;
        goto Wo;
        xQ:
        $k1 = htmlspecialchars($_REQUEST["\162\145\x64\x69\162\x65\x63\164\x5f\164\157"]);
        if (!(strpos($k1, "\x77\x70\55\x61\x64\x6d\x69\x6e") !== false && strpos($k1, "\x73\x61\x6d\154\x5f\x73\163\x6f\75" . $hL) !== false)) {
            goto iv;
        }
        return;
        iv:
        Wo:
        ja:
        $this->mo_saml_redirect_for_authentication($k1);
        ON:
    }
    function mo_saml_auto_redirect()
    {
        if (!is_user_logged_in()) {
            goto Ut;
        }
        return;
        Ut:
        if (!(get_option("\155\157\137\163\x61\x6d\x6c\x5f\x72\145\147\x69\163\164\x65\x72\x65\x64\137\157\x6e\x6c\171\137\x61\x63\143\x65\x73\163") == "\164\162\165\x65" || get_option("\x6d\157\x5f\163\141\155\x6c\x5f\x72\x65\x64\x69\162\x65\143\164\x5f\x74\x6f\x5f\x77\x70\137\x6c\157\x67\x69\156") == "\164\x72\165\145")) {
            goto G5;
        }
        if (!(get_option("\x6d\x6f\x5f\x73\x61\155\x6c\x5f\x65\x6e\x61\142\x6c\x65\x5f\162\163\163\x5f\141\x63\x63\x65\163\x73") == "\164\162\165\x65" && is_feed())) {
            goto PM;
        }
        return;
        PM:
        $VK = saml_get_current_page_url();
        $this->mo_saml_redirect_for_authentication($VK);
        G5:
    }
    function mo_saml_modify_login_form()
    {
        $hL = get_option("\x6d\157\x5f\163\141\x6d\154\137\142\x61\x63\153\x64\157\157\162\137\165\162\x6c") ? trim(get_option("\x6d\157\x5f\163\x61\x6d\x6c\x5f\x62\141\143\x6b\x64\157\157\162\x5f\165\x72\x6c")) : "\146\141\154\163\145";
        echo "\74\x69\156\x70\165\164\x20\164\171\160\x65\x3d\x22\x68\x69\144\144\x65\156\x22\x20\x6e\x61\155\x65\x3d\x22\x73\141\155\154\137\x73\x73\157\x22\x20\166\x61\154\165\145\x3d" . $hL . "\x3e" . "\xa";
        if (!(get_option("\x6d\x6f\137\163\x61\155\154\x5f\x61\144\x64\137\x73\163\157\x5f\x62\x75\x74\164\x6f\x6e\137\x77\160") == "\x74\162\x75\x65")) {
            goto qb;
        }
        $this->mo_saml_add_sso_button();
        qb:
    }
    function mo_saml_login_enqueue_scripts()
    {
        wp_enqueue_script("\152\161\165\145\162\171");
    }
    function mo_saml_add_sso_button()
    {
        if (is_user_logged_in()) {
            goto df;
        }
        $Ca = get_option("\x6d\157\137\163\141\x6d\154\x5f\163\x70\x5f\x62\x61\x73\x65\x5f\x75\x72\154");
        if (!empty($Ca)) {
            goto Z9;
        }
        $Ca = home_url();
        Z9:
        $Xk = get_option("\x6d\157\137\163\141\x6d\x6c\137\142\165\x74\x74\x6f\x6e\137\x77\151\x64\x74\x68") ? get_option("\x6d\x6f\x5f\163\x61\155\154\137\142\x75\x74\164\x6f\156\x5f\167\x69\144\x74\x68") : "\61\x30\60";
        $Sq = get_option("\155\x6f\x5f\x73\x61\155\x6c\137\x62\165\x74\164\157\x6e\137\x68\145\x69\x67\x68\x74") ? get_option("\155\x6f\x5f\163\x61\x6d\154\x5f\x62\x75\164\x74\157\x6e\x5f\150\145\151\147\150\164") : "\65\60";
        $RG = get_option("\x6d\x6f\x5f\163\141\155\154\137\142\165\x74\x74\x6f\156\137\163\x69\x7a\145") ? get_option("\x6d\x6f\x5f\x73\x61\155\x6c\x5f\142\x75\164\164\157\156\x5f\x73\x69\172\145") : "\x35\x30";
        $k8 = get_option("\155\157\137\163\141\155\x6c\137\x62\165\164\164\157\156\137\143\165\x72\166\x65") ? get_option("\155\x6f\137\x73\141\155\x6c\137\142\x75\164\x74\157\156\x5f\143\x75\x72\166\145") : "\65";
        $GA = get_option("\x6d\x6f\x5f\163\141\x6d\154\137\x62\165\164\164\157\x6e\137\143\157\x6c\x6f\162") ? get_option("\x6d\x6f\x5f\x73\141\155\154\137\142\165\164\x74\157\156\x5f\143\x6f\x6c\x6f\x72") : "\60\x30\70\x35\142\141";
        $bm = get_option("\x6d\157\137\x73\x61\x6d\154\137\142\x75\x74\x74\157\x6e\x5f\x74\150\x65\155\x65") ? get_option("\x6d\157\x5f\163\x61\x6d\x6c\x5f\x62\x75\164\x74\x6f\x6e\x5f\x74\x68\145\x6d\x65") : "\x6c\157\x6e\147\142\165\x74\x74\x6f\156";
        $MX = LicenseHelper::getCurrentOption(mo_options_enum_service_provider::Identity_name);
        $hP = get_option("\x6d\x6f\x5f\x73\x61\155\x6c\137\x62\165\x74\164\x6f\x6e\137\x74\145\x78\x74") ? get_option("\x6d\157\137\163\x61\x6d\154\137\142\165\x74\x74\x6f\x6e\x5f\164\145\170\x74") : ($MX ? $MX : "\114\x6f\x67\151\x6e");
        $XY = get_option("\x6d\157\x5f\x73\141\155\x6c\137\x66\x6f\156\x74\137\x63\x6f\154\x6f\162") ? get_option("\155\x6f\x5f\x73\x61\x6d\x6c\137\146\x6f\x6e\x74\137\x63\x6f\x6c\157\x72") : "\x66\x66\146\x66\146\146";
        $IX = get_option("\155\x6f\x5f\x73\x61\x6d\x6c\137\146\x6f\x6e\x74\137\x73\x69\172\145") ? get_option("\x6d\x6f\137\x73\x61\x6d\154\137\x66\157\156\164\x5f\x73\151\x7a\x65") : "\62\60";
        $Mi = get_option("\163\163\157\x5f\142\165\x74\164\x6f\x6e\x5f\x6c\x6f\147\151\156\137\x66\157\162\x6d\137\x70\157\163\x69\x74\151\x6f\156") ? get_option("\163\x73\157\x5f\x62\165\164\164\x6f\x6e\137\x6c\157\147\151\x6e\x5f\x66\157\162\x6d\x5f\x70\x6f\163\151\x74\x69\x6f\x6e") : "\x61\x62\x6f\166\x65";
        $Di = "\74\x69\x6e\x70\165\164\x20\x74\171\160\x65\x3d\x22\142\165\x74\x74\157\156\x22\x20\x6e\x61\x6d\x65\75\42\155\x6f\137\163\141\x6d\154\x5f\167\x70\137\163\163\157\x5f\142\165\164\x74\157\x6e\x22\40\x76\141\154\x75\145\75\42" . $hP . "\42\x20\163\x74\x79\154\145\x3d\42";
        $Qa = '';
        if ($bm == "\154\x6f\156\x67\x62\x75\164\164\157\156") {
            goto ml;
        }
        if ($bm == "\143\x69\162\143\x6c\145") {
            goto h6;
        }
        if ($bm == "\157\x76\141\x6c") {
            goto Lr;
        }
        if ($bm == "\163\161\x75\x61\162\x65") {
            goto Um;
        }
        goto Hk;
        h6:
        $Qa = $Qa . "\x77\151\x64\x74\x68\x3a" . $RG . "\x70\170\x3b";
        $Qa = $Qa . "\150\145\151\147\x68\164\x3a" . $RG . "\160\x78\73";
        $Qa = $Qa . "\142\157\162\144\x65\162\55\162\141\x64\151\165\163\72\x39\x39\71\x70\x78\x3b";
        goto Hk;
        Lr:
        $Qa = $Qa . "\167\151\x64\164\x68\72" . $RG . "\x70\x78\x3b";
        $Qa = $Qa . "\150\x65\151\147\x68\x74\72" . $RG . "\x70\x78\73";
        $Qa = $Qa . "\x62\x6f\x72\x64\x65\162\x2d\162\141\x64\x69\165\163\72\x35\x70\x78\x3b";
        goto Hk;
        Um:
        $Qa = $Qa . "\167\151\x64\164\150\72" . $RG . "\160\170\73";
        $Qa = $Qa . "\150\x65\x69\x67\150\x74\72" . $RG . "\x70\170\x3b";
        $Qa = $Qa . "\142\x6f\162\144\145\x72\55\162\141\x64\151\165\163\x3a\60\x70\170\73";
        $Qa = $Qa . "\160\x61\x64\x64\151\x6e\x67\x3a\60\x70\170\x3b";
        Hk:
        goto sx;
        ml:
        $Qa = $Qa . "\167\151\144\164\x68\x3a" . $Xk . "\x70\170\73";
        $Qa = $Qa . "\x68\145\x69\147\150\x74\x3a" . $Sq . "\160\170\x3b";
        $Qa = $Qa . "\142\157\x72\x64\145\162\55\x72\141\144\151\165\x73\72" . $k8 . "\160\x78\x3b";
        sx:
        $Qa = $Qa . "\x62\141\143\x6b\147\162\x6f\x75\156\x64\55\x63\x6f\x6c\157\x72\72\x23" . $GA . "\73";
        $Qa = $Qa . "\x62\x6f\x72\144\145\162\55\143\x6f\x6c\x6f\x72\72\x74\162\141\x6e\163\x70\141\162\145\156\164\73";
        $Qa = $Qa . "\143\157\154\157\x72\72\43" . $XY . "\73";
        $Qa = $Qa . "\146\157\156\164\55\163\x69\172\145\x3a" . $IX . "\x70\x78\x3b";
        $Qa = $Qa . "\143\x75\x72\x73\157\x72\72\x70\x6f\x69\x6e\164\145\x72";
        $Di = $Di . $Qa . "\x22\57\76";
        $k1 = '';
        if (!isset($_GET["\162\145\144\151\x72\x65\x63\x74\137\x74\157"])) {
            goto R2;
        }
        $k1 = urlencode($_GET["\162\145\144\x69\x72\145\143\164\x5f\x74\157"]);
        R2:
        $X7 = "\x3c\141\x20\150\x72\145\x66\x3d\42" . $Ca . "\x2f\77\157\160\x74\x69\x6f\156\75\x73\141\155\x6c\x5f\x75\163\x65\162\137\x6c\x6f\147\151\156\46\162\x65\x64\x69\x72\x65\143\164\137\164\x6f\75" . $k1 . "\42\x20\163\x74\x79\154\145\75\x22\x74\145\x78\164\x2d\x64\145\x63\157\162\141\x74\x69\x6f\x6e\72\x6e\157\156\145\73\x22\76" . $Di . "\x3c\x2f\x61\76";
        $X7 = "\x3c\x64\151\166\x20\x73\x74\x79\154\145\x3d\x22\x70\x61\144\x64\x69\x6e\x67\x3a\61\x30\x70\170\73\42\76" . $X7 . "\74\x2f\x64\151\166\76";
        if ($Mi == "\x61\x62\157\166\x65") {
            goto w3;
        }
        $X7 = "\x3c\x64\x69\x76\x20\x69\x64\x3d\42\x73\163\157\137\x62\165\x74\164\x6f\156\x22\x20\x73\164\171\154\x65\75\x22\x74\x65\x78\x74\55\x61\x6c\151\x67\x6e\72\143\145\156\164\x65\x72\x22\76\74\x64\x69\166\40\163\164\x79\154\x65\x3d\42\x70\141\x64\x64\151\x6e\147\72\65\160\170\x3b\146\x6f\156\x74\x2d\x73\151\172\145\x3a\x31\x34\x70\170\x3b\x22\76\74\142\x3e\117\122\74\x2f\x62\76\x3c\57\x64\x69\x76\76" . $X7 . "\74\57\144\x69\x76\x3e\74\142\162\57\76";
        goto o2;
        w3:
        $X7 = "\74\x64\x69\166\40\151\144\75\x22\x73\163\157\137\x62\165\x74\164\157\156\42\x20\x73\x74\171\x6c\x65\75\42\164\x65\x78\164\x2d\x61\154\x69\147\156\72\143\145\x6e\x74\x65\162\42\x3e" . $X7 . "\74\x64\x69\x76\40\163\164\171\154\145\75\42\x70\x61\144\x64\x69\156\147\x3a\x35\x70\x78\73\146\157\x6e\x74\x2d\163\151\x7a\145\x3a\61\64\160\170\73\x22\76\x3c\142\x3e\x4f\122\74\57\142\76\x3c\57\144\x69\166\x3e\x3c\57\144\151\166\x3e\x3c\142\162\x2f\76";
        $X7 = $X7 . "\x3c\163\143\x72\151\x70\x74\x3e\xd\xa\11\11\11\x76\x61\x72\40\x24\x65\154\x65\x6d\145\x6e\164\40\75\40\152\121\x75\x65\162\171\50\x22\x23\165\x73\145\x72\137\154\157\x67\x69\156\x22\51\73\15\xa\11\x9\x9\x6a\121\165\145\x72\x79\50\42\x23\x73\x73\x6f\x5f\x62\x75\x74\164\x6f\x6e\42\x29\x2e\151\156\163\x65\162\164\102\145\146\157\x72\x65\50\x6a\121\165\x65\162\171\x28\42\154\141\x62\145\x6c\133\x66\x6f\162\x3d\x27\x22\53\44\x65\154\145\155\x65\x6e\x74\x2e\141\164\164\162\50\47\151\x64\x27\51\x2b\x22\47\135\42\x29\51\73\15\xa\11\x9\x9\x3c\x2f\163\143\162\x69\x70\x74\x3e";
        o2:
        echo $X7;
        df:
    }
    function mo_get_saml_shortcode($S_)
    {
        if (!is_user_logged_in()) {
            goto Tm;
        }
        $current_user = wp_get_current_user();
        $fI = "\110\x65\154\x6c\157\x2c";
        if (!get_option("\155\157\137\x73\141\x6d\154\x5f\x63\x75\x73\164\x6f\155\137\147\x72\x65\145\164\x69\x6e\147\137\164\145\170\164")) {
            goto jF;
        }
        $fI = get_option("\x6d\x6f\137\163\x61\x6d\154\x5f\143\165\163\x74\157\155\x5f\147\162\145\145\164\151\156\x67\x5f\164\145\x78\164");
        jF:
        $gE = '';
        if (!get_option("\x6d\x6f\137\163\x61\155\x6c\x5f\x67\x72\x65\145\164\151\156\147\137\x6e\141\155\145")) {
            goto YC;
        }
        switch (get_option("\155\157\x5f\163\x61\155\154\137\147\162\145\145\x74\151\156\x67\137\x6e\141\155\145")) {
            case "\125\x53\105\x52\116\101\x4d\x45":
                $gE = $current_user->user_login;
                goto Qh;
            case "\x45\115\101\111\114":
                $gE = $current_user->user_email;
                goto Qh;
            case "\106\116\x41\115\x45":
                $gE = $current_user->user_firstname;
                goto Qh;
            case "\114\x4e\x41\x4d\x45":
                $gE = $current_user->user_lastname;
                goto Qh;
            case "\106\x4e\x41\x4d\x45\x5f\x4c\116\101\115\105":
                $gE = $current_user->user_firstname . "\x20" . $current_user->user_lastname;
                goto Qh;
            case "\114\x4e\101\115\105\137\x46\116\x41\115\105":
                $gE = $current_user->user_lastname . "\40" . $current_user->user_firstname;
                goto Qh;
            default:
                $gE = $current_user->user_login;
        }
        Kx:
        Qh:
        YC:
        $gE = trim($gE);
        if (!empty($gE)) {
            goto rG;
        }
        $gE = $current_user->user_login;
        rG:
        $ZT = $fI . "\x20" . $gE;
        $JL = "\114\x6f\147\157\165\x74";
        if (!get_option("\155\x6f\x5f\163\141\155\154\137\143\165\163\x74\157\155\x5f\x6c\157\x67\x6f\x75\164\137\164\145\x78\164")) {
            goto Xo;
        }
        $JL = get_option("\x6d\157\137\x73\141\155\x6c\137\x63\x75\x73\164\157\x6d\x5f\x6c\x6f\147\x6f\165\164\x5f\x74\x65\x78\x74");
        Xo:
        $X7 = $ZT . "\x20\174\x20\x3c\141\x20\x68\x72\x65\x66\75\x22" . wp_logout_url(home_url()) . "\x22\40\x74\x69\164\x6c\x65\x3d\42\154\x6f\x67\157\x75\164\x22\40\76" . $JL . "\x3c\x2f\x61\76\74\57\154\151\x3e";
        goto uE;
        Tm:
        $Ca = get_option("\x6d\x6f\137\x73\x61\155\154\137\163\160\x5f\142\x61\163\145\x5f\165\x72\154");
        if (!empty($Ca)) {
            goto T3;
        }
        $Ca = home_url();
        T3:
        if (mo_saml_is_sp_configured() && mo_saml_is_customer_license_key_verified()) {
            goto Sc;
        }
        $X7 = "\x53\120\40\151\x73\x20\156\157\164\40\x63\157\x6e\x66\151\x67\165\x72\145\x64\x2e";
        goto z1;
        Sc:
        $wJ = LicenseHelper::getCurrentOption(mo_options_enum_service_provider::Identity_name);
        $pL = '';
        if (!(!empty($S_) and is_array($S_))) {
            goto j_;
        }
        if (!isset($S_["\151\144\160"])) {
            goto zS;
        }
        $wJ = $S_["\x69\144\160"];
        $pL = $wJ;
        zS:
        j_:
        $kA = "\114\157\x67\151\156\40\167\151\164\150\x20" . LicenseHelper::getCurrentOption(mo_options_enum_service_provider::Identity_name);
        if (!get_option("\155\x6f\x5f\x73\141\155\154\x5f\x63\165\163\x74\x6f\155\x5f\x6c\157\x67\151\x6e\x5f\x74\x65\170\164")) {
            goto Lc;
        }
        $kA = get_option("\x6d\157\x5f\163\x61\155\154\137\143\165\163\164\x6f\x6d\137\x6c\x6f\x67\151\156\x5f\x74\x65\170\164");
        Lc:
        $x8 = LicenseHelper::getCurrentOption(mo_options_enum_service_provider::Identity_name);
        $kA = str_replace("\43\43\x49\x44\x50\43\x23", $x8, $kA);
        $U2 = false;
        if (!get_option("\x6d\157\137\163\141\155\x6c\137\165\x73\x65\137\x62\165\x74\164\x6f\x6e\x5f\141\163\x5f\163\150\x6f\x72\164\143\x6f\x64\145")) {
            goto ST;
        }
        if (!(get_option("\x6d\x6f\x5f\163\141\155\x6c\x5f\x75\163\x65\x5f\142\165\164\164\157\156\x5f\141\163\x5f\163\x68\157\162\x74\x63\x6f\x64\145") == "\x74\x72\x75\x65")) {
            goto af;
        }
        $U2 = true;
        af:
        ST:
        if (!$U2) {
            goto LP;
        }
        $Xk = get_option("\x6d\x6f\137\163\141\x6d\154\137\x62\x75\164\x74\157\x6e\137\x77\x69\x64\164\x68") ? get_option("\155\157\x5f\x73\141\155\154\137\x62\165\x74\x74\x6f\156\137\x77\x69\144\164\150") : "\x31\x30\x30";
        $Sq = get_option("\155\157\x5f\163\x61\x6d\x6c\137\142\165\164\x74\x6f\156\137\x68\x65\151\x67\150\x74") ? get_option("\155\157\137\163\141\x6d\x6c\x5f\x62\165\x74\164\157\156\x5f\x68\145\x69\x67\x68\x74") : "\x35\x30";
        $RG = get_option("\155\x6f\x5f\163\x61\x6d\x6c\x5f\142\x75\164\x74\157\x6e\137\163\x69\x7a\x65") ? get_option("\x6d\x6f\x5f\163\141\155\x6c\x5f\142\x75\x74\x74\157\156\137\x73\151\172\145") : "\x35\x30";
        $k8 = get_option("\155\x6f\x5f\163\x61\x6d\154\137\x62\165\164\x74\157\x6e\x5f\x63\x75\x72\x76\x65") ? get_option("\x6d\157\x5f\x73\x61\155\154\137\142\165\x74\x74\157\156\137\x63\x75\162\166\145") : "\65";
        $GA = get_option("\x6d\x6f\137\163\141\x6d\154\x5f\142\165\x74\x74\157\156\x5f\x63\x6f\x6c\157\162") ? get_option("\155\157\137\163\141\155\x6c\137\x62\x75\164\164\x6f\x6e\x5f\143\157\x6c\157\x72") : "\60\x30\70\65\142\x61";
        $bm = get_option("\x6d\x6f\x5f\163\141\x6d\x6c\x5f\142\165\x74\164\157\156\x5f\x74\x68\145\x6d\145") ? get_option("\155\x6f\x5f\163\141\155\x6c\x5f\x62\x75\x74\x74\157\x6e\137\x74\150\145\155\x65") : "\x6c\x6f\x6e\147\142\165\164\164\157\x6e";
        $MX = LicenseHelper::getCurrentOption(mo_options_enum_service_provider::Identity_name);
        $hP = get_option("\x6d\157\137\163\x61\155\x6c\137\x62\x75\164\164\157\x6e\x5f\x74\145\170\164") ? get_option("\155\157\137\163\x61\x6d\x6c\137\x62\165\x74\164\157\156\x5f\164\x65\170\x74") : ($MX ? $MX : "\x4c\157\x67\151\x6e");
        $XY = get_option("\155\157\x5f\163\x61\155\154\137\146\x6f\156\164\137\x63\157\x6c\x6f\x72") ? get_option("\x6d\157\x5f\x73\x61\155\x6c\x5f\x66\157\x6e\x74\137\143\x6f\154\x6f\162") : "\x66\x66\146\x66\146\x66";
        $IX = get_option("\x6d\157\137\x73\x61\x6d\x6c\137\x66\x6f\156\164\x5f\x73\x69\x7a\145") ? get_option("\x6d\157\x5f\163\141\155\154\x5f\146\157\x6e\x74\x5f\163\x69\172\x65") : "\x32\x30";
        $kA = "\x3c\151\156\160\x75\x74\40\x74\x79\160\x65\75\x22\x62\165\164\x74\x6f\156\42\x20\156\x61\155\145\75\42\155\x6f\x5f\163\141\x6d\x6c\x5f\167\x70\137\163\163\x6f\x5f\x62\x75\164\x74\x6f\x6e\x22\40\166\141\154\165\x65\x3d\42" . $hP . "\42\x20\x73\164\x79\154\x65\x3d\42";
        $Qa = '';
        if ($bm == "\x6c\157\156\147\142\165\164\164\157\x6e") {
            goto l3;
        }
        if ($bm == "\x63\x69\162\x63\154\x65") {
            goto fv;
        }
        if ($bm == "\x6f\x76\141\x6c") {
            goto AV;
        }
        if ($bm == "\163\x71\165\x61\162\x65") {
            goto i_;
        }
        goto It;
        fv:
        $Qa = $Qa . "\x77\151\144\x74\x68\x3a" . $RG . "\x70\x78\73";
        $Qa = $Qa . "\x68\x65\151\147\x68\x74\72" . $RG . "\160\x78\x3b";
        $Qa = $Qa . "\142\x6f\162\144\x65\162\55\162\141\144\x69\165\163\x3a\x39\71\x39\x70\x78\73";
        goto It;
        AV:
        $Qa = $Qa . "\x77\x69\x64\164\x68\72" . $RG . "\160\170\x3b";
        $Qa = $Qa . "\x68\x65\x69\x67\150\164\x3a" . $RG . "\160\170\73";
        $Qa = $Qa . "\x62\157\162\144\145\162\55\x72\x61\144\151\165\x73\x3a\65\x70\x78\73";
        goto It;
        i_:
        $Qa = $Qa . "\167\x69\x64\164\150\x3a" . $RG . "\160\170\x3b";
        $Qa = $Qa . "\150\145\x69\x67\x68\x74\x3a" . $RG . "\x70\x78\73";
        $Qa = $Qa . "\x62\x6f\x72\144\145\x72\55\x72\x61\x64\151\165\163\72\60\160\170\73";
        It:
        goto vu;
        l3:
        $Qa = $Qa . "\x77\151\144\x74\x68\72" . $Xk . "\x70\170\x3b";
        $Qa = $Qa . "\150\145\x69\x67\150\x74\72" . $Sq . "\x70\170\x3b";
        $Qa = $Qa . "\142\157\162\x64\145\x72\x2d\162\141\144\151\x75\x73\72" . $k8 . "\160\170\73";
        vu:
        $Qa = $Qa . "\142\141\143\153\x67\162\157\x75\x6e\144\x2d\143\157\x6c\157\162\x3a\43" . $GA . "\73";
        $Qa = $Qa . "\x62\157\x72\144\x65\162\55\x63\x6f\x6c\157\162\72\164\x72\141\156\163\x70\141\162\145\x6e\x74\73";
        $Qa = $Qa . "\143\x6f\154\157\x72\72\43" . $XY . "\x3b";
        $Qa = $Qa . "\146\x6f\156\164\55\x73\x69\x7a\x65\x3a" . $IX . "\x70\170\73";
        $Qa = $Qa . "\x70\141\x64\144\151\156\x67\x3a\60\160\170\73";
        $kA = $kA . $Qa . "\x22\57\x3e";
        LP:
        $k1 = urlencode(saml_get_current_page_url());
        $X7 = "\74\141\x20\x68\162\145\x66\x3d\x22" . $Ca . "\x2f\x3f\x6f\x70\164\x69\157\156\x3d\x73\x61\x6d\154\137\x75\x73\145\x72\x5f\154\157\x67\151\156";
        if (empty($pL)) {
            goto Lu;
        }
        $X7 .= "\46\151\144\160\75" . $wJ;
        Lu:
        $X7 .= "\46\162\145\x64\151\x72\145\x63\x74\137\164\x6f\75" . $k1 . "\x22";
        if (!$U2) {
            goto Bp;
        }
        $X7 = $X7 . "\163\x74\x79\154\145\x3d\42\x74\145\x78\x74\x2d\144\x65\x63\x6f\x72\141\x74\x69\x6f\156\72\x6e\157\x6e\x65\x3b\42";
        Bp:
        $X7 = $X7 . "\76" . $kA . "\x3c\x2f\x61\x3e";
        z1:
        uE:
        return $X7;
    }
    function _handle_upload_metadata()
    {
        if (!(isset($_FILES["\155\x65\x74\x61\144\141\164\141\x5f\146\151\x6c\x65"]) || isset($_POST["\155\x65\x74\141\x64\141\x74\x61\x5f\x75\162\154"]))) {
            goto TS;
        }
        if (!empty($_FILES["\155\145\164\141\144\141\x74\141\137\146\x69\154\145"]["\164\155\160\137\156\x61\155\x65"])) {
            goto Lz;
        }
        if (mo_saml_is_extension_installed("\x63\165\162\x6c")) {
            goto is;
        }
        update_option("\x6d\x6f\x5f\x73\x61\x6d\x6c\137\155\x65\x73\x73\141\x67\x65", "\x50\x48\x50\x20\x63\x55\x52\x4c\x20\145\170\164\x65\156\163\x69\x6f\156\40\x69\163\x20\156\x6f\x74\x20\x69\x6e\x73\x74\x61\x6c\154\x65\x64\40\157\x72\x20\x64\151\x73\141\142\x6c\x65\x64\x2e\40\x43\x61\x6e\156\x6f\164\x20\146\145\x74\143\150\x20\155\145\164\x61\144\141\x74\141\40\x66\162\157\155\x20\125\x52\x4c\x2e");
        $this->mo_saml_show_error_message();
        return;
        is:
        $xz = filter_var(htmlspecialchars($_POST["\x6d\x65\164\x61\x64\x61\164\141\x5f\165\162\154"]), FILTER_SANITIZE_URL);
        $gj = SAMLSPUtilities::mo_saml_wp_remote_call($xz, array("\163\x73\154\166\145\x72\151\x66\x79" => false), true);
        if (!$gj) {
            goto DG;
        }
        $Yx = $gj;
        goto wC;
        DG:
        return;
        wC:
        if (isset($_POST["\x73\171\x6e\143\137\x6d\x65\164\141\x64\x61\164\141"])) {
            goto Uu;
        }
        delete_option("\x73\x61\155\x6c\x5f\x6d\145\164\141\x64\141\164\141\137\165\162\x6c\137\146\x6f\x72\x5f\x73\x79\x6e\x63");
        delete_option("\x73\141\155\x6c\137\155\145\x74\141\144\141\164\x61\137\163\171\156\x63\x5f\151\x6e\x74\x65\x72\166\x61\154");
        wp_unschedule_event(wp_next_scheduled("\155\145\x74\x61\144\141\164\x61\137\163\171\156\143\x5f\x63\162\x6f\x6e\x5f\x61\x63\x74\151\157\x6e"), "\x6d\145\x74\x61\x64\141\164\141\x5f\x73\x79\156\143\x5f\x63\x72\157\156\x5f\x61\x63\164\x69\x6f\x6e");
        goto ft;
        Uu:
        update_option("\x73\141\x6d\154\x5f\155\145\164\x61\x64\141\x74\x61\137\x75\x72\154\137\x66\157\x72\x5f\x73\x79\x6e\143", htmlspecialchars($_POST["\x6d\x65\x74\141\144\x61\164\x61\x5f\x75\x72\x6c"]));
        update_option("\163\x61\x6d\x6c\x5f\x6d\x65\164\141\144\141\x74\141\x5f\x73\171\x6e\143\137\x69\x6e\164\145\x72\166\x61\x6c", htmlspecialchars($_POST["\163\171\x6e\143\137\151\156\164\145\x72\x76\141\x6c"]));
        if (wp_next_scheduled("\x6d\145\164\x61\x64\141\x74\141\137\x73\x79\156\x63\x5f\143\x72\157\156\137\x61\143\164\151\x6f\x6e")) {
            goto pT;
        }
        wp_schedule_event(time(), htmlspecialchars($_POST["\x73\171\x6e\143\137\x69\x6e\x74\x65\162\166\141\154"]), "\155\145\x74\141\x64\x61\164\x61\x5f\x73\x79\x6e\x63\137\x63\x72\x6f\156\x5f\141\143\x74\151\157\x6e");
        pT:
        ft:
        goto iQ;
        Lz:
        $Yx = @file_get_contents($_FILES["\x6d\x65\164\141\144\141\164\141\137\146\x69\154\x65"]["\x74\x6d\160\x5f\156\x61\x6d\145"]);
        iQ:
        $this->upload_metadata($Yx);
        TS:
    }
    function upload_metadata($Yx)
    {
        $GO = set_error_handler(array($this, "\x68\141\x6e\x64\154\x65\130\x6d\154\105\162\162\157\162"));
        $eB = new DOMDocument();
        $eB->loadXML($Yx);
        restore_error_handler();
        $O9 = $eB->firstChild;
        if (!empty($O9)) {
            goto RT;
        }
        if (!empty($_FILES["\155\145\x74\x61\x64\141\x74\141\137\x66\x69\x6c\145"]["\x74\155\160\137\156\141\155\x65"])) {
            goto RP;
        }
        if (!empty($_POST["\155\145\x74\141\x64\x61\164\x61\x5f\x75\162\x6c"])) {
            goto bH;
        }
        update_option("\x6d\157\137\x73\x61\155\154\137\x6d\145\x73\163\141\147\145", "\120\x6c\145\141\163\145\40\x70\x72\157\166\x69\144\145\40\x61\40\166\141\x6c\x69\144\x20\155\x65\x74\x61\x64\x61\x74\141\40\x66\151\154\x65\x20\157\162\40\x61\40\x76\141\x6c\151\144\40\x55\122\x4c\x2e");
        $this->mo_saml_show_error_message();
        return;
        goto Tp;
        bH:
        update_option("\155\157\137\x73\x61\x6d\x6c\x5f\x6d\145\x73\x73\x61\x67\x65", "\120\154\x65\x61\x73\x65\x20\x70\162\x6f\166\151\x64\145\40\141\x20\x76\141\154\x69\144\x20\x6d\x65\164\x61\x64\141\x74\141\x20\125\122\114\56");
        $this->mo_saml_show_error_message();
        Tp:
        goto CH;
        RP:
        update_option("\155\x6f\137\x73\141\155\154\x5f\155\x65\163\x73\141\x67\x65", "\x50\154\145\x61\x73\x65\x20\160\162\157\166\151\x64\x65\40\141\x20\x76\x61\x6c\x69\x64\x20\x6d\145\x74\x61\144\x61\164\x61\40\146\x69\x6c\x65\x2e");
        $this->mo_saml_show_error_message();
        CH:
        goto ln;
        RT:
        $uS = new IDPMetadataReader($eB);
        $j8 = $uS->getIdentityProviders();
        if (!empty($j8)) {
            goto es;
        }
        update_option("\155\x6f\137\163\x61\x6d\154\137\x6d\145\x73\x73\141\147\145", "\x50\x6c\145\x61\x73\x65\x20\x70\x72\157\166\x69\144\x65\x20\141\40\166\x61\x6c\x69\144\40\x6d\x65\x74\x61\x64\x61\164\141\40\x66\x69\154\x65\x2e");
        $this->mo_saml_show_error_message();
        return;
        es:
        foreach ($j8 as $Ej => $wJ) {
            $Mc = LicenseHelper::getCurrentOption(mo_options_enum_service_provider::Identity_name);
            if (!isset($_POST["\x73\141\x6d\154\x5f\151\144\x65\156\x74\151\x74\x79\137\x6d\x65\164\x61\144\141\164\141\137\160\x72\x6f\166\151\144\x65\x72"])) {
                goto aq;
            }
            $Mc = htmlspecialchars($_POST["\x73\141\155\x6c\137\x69\144\145\x6e\x74\x69\164\171\x5f\x6d\x65\x74\x61\144\141\x74\141\x5f\x70\x72\x6f\x76\x69\x64\145\x72"]);
            aq:
            $gP = "\110\164\x74\160\x52\145\144\151\x72\x65\143\x74";
            $Lx = '';
            if (array_key_exists("\x48\x54\124\x50\55\122\x65\144\x69\x72\145\143\x74", $wJ->getLoginDetails())) {
                goto iw;
            }
            if (!array_key_exists("\110\124\x54\x50\55\120\x4f\123\x54", $wJ->getLoginDetails())) {
                goto tC;
            }
            $gP = "\110\x74\x74\x70\x50\157\x73\x74";
            $Lx = $wJ->getLoginURL("\110\x54\124\120\55\120\117\x53\124");
            tC:
            goto Bt;
            iw:
            $Lx = $wJ->getLoginURL("\x48\124\x54\120\x2d\122\145\x64\151\x72\145\x63\164");
            Bt:
            $Ql = "\110\x74\x74\160\122\x65\144\x69\162\145\x63\x74";
            $X9 = '';
            if (array_key_exists("\x48\x54\124\120\x2d\x52\145\144\x69\x72\x65\x63\x74", $wJ->getLogoutDetails())) {
                goto g9;
            }
            if (!array_key_exists("\110\124\124\x50\x2d\x50\x4f\123\124", $wJ->getLogoutDetails())) {
                goto So;
            }
            $Ql = "\x48\164\x74\160\x50\157\163\x74";
            $X9 = $wJ->getLogoutURL("\x48\x54\x54\x50\x2d\120\x4f\123\x54");
            So:
            goto yA;
            g9:
            $X9 = $wJ->getLogoutURL("\110\x54\124\x50\x2d\x52\x65\144\x69\162\145\x63\164");
            yA:
            $Vn = $wJ->getEntityID();
            $xY = $wJ->getSigningCertificate();
            if (!get_option("\155\x6f\137\x65\x6e\x61\142\x6c\x65\x5f\x6d\x75\x6c\x74\x69\x70\154\x65\x5f\154\x69\143\145\x6e\x73\145\163")) {
                goto Hm;
            }
            $ko = get_option("\x6d\x6f\x5f\163\x61\155\x6c\137\x65\156\166\151\x72\x6f\156\x6d\x65\x6e\164\137\x6f\142\x6a\145\143\164\x73");
            $TE = LicenseHelper::getSelectedEnvironment();
            if (!isset($ko[$TE])) {
                goto Gq;
            }
            $D7 = $ko[$TE]->getPluginSettings();
            $D7[mo_options_enum_service_provider::Identity_name] = $Mc;
            $D7[mo_options_enum_service_provider::Login_URL] = $Lx;
            $D7[mo_options_enum_service_provider::Issuer] = $Vn;
            $D7[mo_options_enum_service_provider::X509_certificate] = maybe_serialize($xY);
            $D7[mo_options_enum_service_provider::Logout_URL] = $X9;
            $D7[mo_options_enum_service_provider::Login_binding_type] = $gP;
            $D7[mo_options_enum_service_provider::Logout_binding_type] = $Ql;
            $ko[$TE]->setPluginSettings($D7);
            update_option("\155\x6f\137\x73\x61\155\154\137\145\156\166\151\162\x6f\156\155\145\156\164\137\x6f\142\152\145\x63\x74\163", $ko);
            $Iz = LicenseHelper::getSelectedEnvironment();
            if (!($Iz and $Iz != LicenseHelper::getCurrentEnvironment())) {
                goto eZ;
            }
            goto H3;
            eZ:
            Gq:
            Hm:
            update_option("\163\141\155\x6c\137\x69\144\145\x6e\164\x69\x74\x79\x5f\156\141\x6d\145", $Mc);
            update_option("\163\x61\x6d\x6c\137\154\157\x67\x69\156\137\x62\151\x6e\144\151\x6e\147\137\164\171\160\x65", $gP);
            update_option("\x73\141\155\154\137\154\x6f\147\x69\156\x5f\x75\x72\x6c", $Lx);
            update_option("\163\141\x6d\x6c\137\154\x6f\x67\x6f\x75\x74\137\x62\151\156\x64\x69\x6e\x67\137\x74\x79\160\145", $Ql);
            update_option("\163\x61\x6d\154\x5f\x6c\x6f\x67\x6f\165\164\137\165\162\x6c", $X9);
            update_option("\163\x61\155\x6c\x5f\x69\x73\163\165\x65\x72", $Vn);
            update_option("\163\141\155\x6c\137\156\141\155\145\151\144\137\x66\157\x72\x6d\141\164", "\x31\x2e\61\72\156\141\x6d\145\151\144\x2d\x66\x6f\162\x6d\141\x74\x3a\x75\x6e\163\x70\x65\143\x69\x66\151\145\x64");
            update_option("\x73\141\155\x6c\x5f\x78\x35\x30\71\137\x63\145\162\x74\x69\146\151\x63\x61\164\145", maybe_serialize($xY));
            goto H3;
            kD:
        }
        H3:
        update_option("\155\x6f\x5f\163\x61\155\x6c\x5f\x6d\145\163\163\141\147\145", "\111\144\x65\156\x74\151\164\171\x20\x50\x72\x6f\x76\x69\x64\x65\x72\x20\144\145\x74\x61\151\x6c\x73\40\x73\141\x76\145\144\40\163\165\143\x63\145\163\x73\x66\x75\154\154\x79\x2e");
        $this->mo_saml_show_success_message();
        ln:
    }
    function handleXmlError($C5, $wm, $Y2, $Rf)
    {
        if ($C5 == E_WARNING && substr_count($wm, "\x44\117\115\x44\157\143\165\x6d\145\x6e\164\72\72\x6c\x6f\141\144\130\115\114\50\51") > 0) {
            goto fe;
        }
        return false;
        goto OT;
        fe:
        return;
        OT:
    }
    function mo_saml_plugin_action_links($As)
    {
        $As = array_merge(array("\74\x61\40\x68\162\x65\146\75\x22" . esc_url(admin_url("\141\144\x6d\x69\x6e\56\x70\150\x70\77\160\141\147\x65\75\155\157\137\x73\141\155\x6c\137\163\x65\164\x74\151\x6e\x67\x73")) . "\x22\x3e" . __("\123\x65\x74\164\151\156\x67\163", "\x74\145\x78\x74\x64\157\155\x61\x69\x6e") . "\x3c\x2f\141\x3e"), $As);
        return $As;
    }
    function checkPasswordPattern($FT)
    {
        $ud = "\x2f\x5e\x5b\x28\134\x77\x29\x2a\x28\x5c\x21\x5c\x40\x5c\43\x5c\x24\134\x25\134\136\x5c\46\134\x2a\134\x2e\134\x2d\x5c\137\51\x2a\135\53\x24\57";
        return !preg_match($ud, $FT);
    }
    function mo_saml_parse_expiry_date($xG)
    {
        $on = new DateTime($xG);
        $Hc = $on->getTimestamp();
        return date("\106\x20\x6a\54\40\x59", $Hc);
    }
}
new saml_mo_login();

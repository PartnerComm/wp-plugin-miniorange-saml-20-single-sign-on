<?php
/*
Plugin Name: miniOrange SSO using SAML 2.0
Plugin URI: https://miniorange.com/
Description: (Premium Single-Site)miniOrange SAML 2.0 SSO enables user to perform Single Sign On with any SAML 2.0 enabled Identity Provider.
Version: 12.1.0
Author: miniOrange
Author URI: https://miniorange.com/
*/


include_once dirname(__FILE__) . "\57\x6d\157\x5f\x6c\x6f\x67\x69\x6e\x5f\163\x61\x6d\154\x5f\x73\163\157\137\x77\151\x64\x67\x65\164\x2e\160\x68\x70";
include_once "\x78\x6d\154\163\145\143\154\x69\x62\163\56\160\150\x70";
use RobRichards\XMLSecLibs\XMLSecurityKey;
use RobRichards\XMLSecLibs\XMLSecurityDSig;
use RobRichards\XMLSecLibs\XMLSecEnc;
require "\155\157\x2d\x73\x61\155\154\55\143\154\x61\x73\x73\55\143\x75\x73\x74\x6f\x6d\145\x72\56\160\150\160";
require "\x6d\x6f\137\163\141\155\154\137\x73\145\164\x74\151\156\147\x73\x5f\x70\x61\x67\145\56\160\150\160";
require "\115\x65\164\141\x64\141\x74\141\122\145\141\144\x65\162\56\160\x68\x70";
require "\143\145\162\x74\x69\x66\151\x63\x61\x74\145\x5f\x75\164\151\154\151\164\171\56\160\x68\x70";
require "\x6c\151\143\145\156\163\x65\165\x74\151\154\x73\x2e\160\x68\160";
require "\x4c\x69\143\145\x6e\163\145\x55\x74\x69\x6c\163\x2f\x4c\x69\143\x65\x6e\163\145\104\x61\157\x2e\x70\x68\160";
require_once "\x6d\x6f\x2d\x73\141\155\154\55\160\154\165\x67\x69\156\x2d\166\145\x72\x73\151\x6f\x6e\x2d\165\160\x64\141\164\145\56\x70\x68\x70";
require_once "\141\x63\x74\151\157\x6e\x73\57\115\x6f\123\141\x6d\154\x41\x64\x6d\151\x6e\x41\143\x74\x69\157\x6e\x73\x2e\x70\x68\160";
class saml_mo_login
{
    private $widgetObj;
    function __construct()
    {
        new MoSamlAdminActions();
        add_action("\141\144\155\x69\156\137\155\145\156\x75", array($this, "\155\151\156\151\157\x72\141\x6e\147\145\x5f\163\x73\157\x5f\155\145\x6e\165"));
        add_action("\141\x64\155\151\x6e\x5f\151\x6e\x69\x74", array($this, "\155\x69\x6e\x69\x6f\162\141\156\147\145\137\x6c\157\147\x69\x6e\x5f\x77\x69\144\x67\x65\x74\137\163\x61\x6d\154\137\x73\141\x76\x65\137\x73\145\164\x74\151\x6e\147\x73"));
        add_action("\x61\144\x6d\x69\x6e\x5f\145\x6e\161\x75\x65\165\x65\137\x73\143\x72\x69\x70\164\x73", array($this, "\x70\154\165\147\151\156\x5f\163\x65\164\164\x69\156\147\x73\137\163\x74\171\154\145"), 1);
        register_deactivation_hook(__FILE__, array($this, "\x6d\157\x5f\163\163\157\137\163\141\x6d\154\137\144\145\x61\x63\164\151\x76\x61\x74\145"));
        add_action("\141\x64\x6d\x69\x6e\137\x65\156\161\x75\x65\x75\x65\x5f\163\143\162\x69\160\164\x73", array($this, "\x70\x6c\165\x67\x69\156\137\x73\x65\x74\164\151\156\x67\x73\137\163\x63\162\x69\x70\x74"), 1);
        remove_action("\x61\144\x6d\151\156\x5f\x6e\x6f\164\151\x63\145\163", array($this, "\x6d\x6f\x5f\x73\x61\x6d\154\137\163\165\143\x63\x65\163\163\x5f\x6d\145\x73\163\141\x67\x65"));
        remove_action("\141\x64\155\151\156\x5f\156\157\164\151\x63\145\163", array($this, "\x6d\157\137\x73\x61\155\x6c\137\x65\x72\162\x6f\x72\x5f\x6d\145\x73\163\141\147\x65"));
        add_action("\x77\x70\x5f\141\x75\164\150\145\156\x74\x69\x63\141\x74\145", array($this, "\x6d\157\x5f\163\141\x6d\x6c\x5f\x61\165\164\x68\145\156\164\x69\x63\141\164\x65"));
        add_action("\167\x70", array($this, "\x6d\x6f\137\163\x61\x6d\x6c\137\141\165\x74\x6f\137\x72\145\144\x69\x72\145\143\164"));
        $this->widgetObj = new mo_login_wid();
        add_action("\151\x6e\151\164", array($this->widgetObj, "\155\x6f\x5f\x73\141\x6d\154\137\167\151\x64\x67\x65\x74\x5f\x69\x6e\151\x74"));
        add_action("\141\144\x6d\151\x6e\137\151\x6e\x69\x74", "\x6d\x6f\x5f\x73\x61\155\x6c\x5f\144\x6f\x77\156\x6c\157\141\x64");
        add_action("\154\157\x67\x69\156\137\145\x6e\x71\x75\x65\165\x65\137\x73\x63\162\151\160\164\163", array($this, "\155\x6f\137\163\x61\x6d\x6c\x5f\x6c\157\x67\151\x6e\137\x65\x6e\x71\x75\145\x75\x65\x5f\x73\x63\x72\x69\x70\164\x73"));
        add_action("\x6c\x6f\x67\x69\156\137\x66\157\x72\x6d", array($this, "\155\157\x5f\163\141\155\154\x5f\x6d\x6f\144\x69\146\x79\137\x6c\157\x67\x69\x6e\137\x66\157\162\155"));
        add_shortcode("\x4d\117\137\x53\x41\x4d\114\x5f\106\x4f\122\115", array($this, "\155\x6f\137\147\145\x74\x5f\163\x61\155\154\137\163\150\157\162\164\x63\157\x64\x65"));
        add_filter("\x63\x72\157\x6e\137\163\143\150\145\144\x75\x6c\x65\x73", array($this, "\155\x79\x70\x72\145\x66\151\x78\x5f\141\x64\144\137\x63\162\157\156\x5f\x73\143\150\145\144\165\154\145"));
        add_action("\x6d\x65\x74\141\x64\x61\x74\141\x5f\x73\171\156\143\x5f\x63\x72\x6f\156\137\141\143\164\x69\x6f\x6e", array($this, "\155\145\x74\141\144\141\x74\x61\137\x73\171\156\x63\137\143\162\157\156\x5f\141\x63\164\151\x6f\156"));
        register_activation_hook(__FILE__, array($this, "\x6d\157\137\x73\x61\155\x6c\x5f\143\150\x65\x63\x6b\x5f\x6f\x70\x65\156\163\x73\154"));
        add_action("\160\154\x75\x67\x69\x6e\137\x61\x63\164\151\157\156\137\x6c\151\x6e\153\163\x5f" . plugin_basename(__FILE__), array($this, "\x6d\x6f\x5f\163\141\155\x6c\x5f\160\154\165\x67\151\x6e\x5f\x61\143\x74\151\157\x6e\137\x6c\x69\156\153\x73"));
        add_action("\141\144\155\x69\x6e\x5f\x69\x6e\151\164", array($this, "\144\x65\146\x61\165\x6c\x74\137\143\x65\162\164\151\x66\x69\143\x61\x74\145"));
        add_option("\x6c\x63\x64\x6a\153\x61\163\152\144\153\163\x61\143\x6c", "\x64\145\146\141\165\x6c\164\x2d\143\145\162\x74\151\146\151\143\x61\x74\x65");
        add_filter("\x6d\x61\156\x61\147\x65\x5f\165\x73\x65\162\163\137\x63\x6f\154\x75\x6d\156\163", array($this, "\x6d\x6f\x5f\163\141\x6d\154\x5f\x63\165\163\164\x6f\155\x5f\x61\164\x74\162\x5f\143\157\x6c\165\155\x6e"));
        add_filter("\x6d\141\x6e\141\x67\x65\x5f\165\x73\x65\x72\x73\137\x63\165\163\x74\157\155\x5f\143\x6f\x6c\165\155\156", array($this, "\155\x6f\137\163\x61\x6d\154\x5f\x61\164\x74\162\x5f\143\157\154\165\155\156\137\x63\x6f\x6e\x74\x65\x6e\164"), 10, 3);
        global $jY;
        if ((float) $jY < 5.5 && (float) $jY > 5.2) {
            goto B2;
        }
        add_action("\167\160\137\154\x6f\147\157\x75\x74", array($this->widgetObj, "\x6d\x6f\x5f\x73\x61\155\154\137\x6c\x6f\147\x6f\x75\164"), 1, 1);
        goto uX;
        B2:
        add_filter("\x6c\x6f\x67\x6f\165\164\137\162\145\144\x69\162\x65\x63\x74", array($this, "\155\x6f\137\x73\x61\x6d\x6c\137\154\157\147\157\165\x74\137\x62\162\x6f\153\145\x72\x5f\x77\151\164\150\x5f\x66\151\154\164\x65\162"), 10, 3);
        uX:
    }
    function mo_saml_logout_broker_with_filter($gV, $CA, $user)
    {
        $this->widgetObj->mo_saml_logout($user->ID);
    }
    function default_certificate()
    {
        $eM = file_get_contents(plugin_dir_path(__FILE__) . "\162\x65\x73\x6f\x75\x72\x63\145\163" . DIRECTORY_SEPARATOR . "\x6d\151\156\151\157\x72\x61\156\147\145\55\163\160\55\x63\x65\x72\164\151\x66\x69\x63\x61\164\145\56\x63\162\x74");
        $TM = file_get_contents(plugin_dir_path(__FILE__) . "\x72\145\x73\x6f\x75\162\x63\x65\x73" . DIRECTORY_SEPARATOR . "\x6d\151\156\151\157\162\x61\156\x67\145\55\x73\160\55\x63\x65\162\164\x69\x66\x69\x63\x61\164\x65\55\x70\x72\x69\x76\x2e\x6b\145\171");
        if (!(!get_option("\155\x6f\137\x73\x61\155\154\x5f\143\165\162\162\x65\x6e\164\x5f\143\x65\x72\164") && !get_option("\x6d\157\x5f\x73\x61\155\154\137\143\x75\162\x72\145\x6e\164\x5f\x63\x65\162\x74\x5f\160\162\x69\166\141\x74\x65\x5f\153\145\171"))) {
            goto h1;
        }
        update_option("\x6d\157\x5f\163\x61\155\x6c\x5f\143\x75\162\162\x65\x6e\164\x5f\x63\145\x72\164", $eM);
        update_option("\155\x6f\x5f\x73\x61\x6d\x6c\x5f\x63\165\162\162\x65\x6e\164\x5f\x63\145\x72\x74\x5f\x70\162\x69\x76\141\x74\x65\137\153\x65\171", $TM);
        h1:
    }
    function mo_saml_check_openssl()
    {
        if (mo_saml_is_extension_installed("\x6f\160\x65\156\x73\163\154")) {
            goto wq;
        }
        wp_die("\x50\110\120\40\x6f\x70\x65\x6e\x73\x73\x6c\x20\x65\x78\x74\145\156\x73\x69\x6f\x6e\40\x69\163\x20\156\157\164\x20\151\156\163\x74\141\x6c\x6c\x65\144\40\157\x72\40\144\151\163\141\142\154\x65\x64\54\160\x6c\145\141\x73\145\x20\x65\156\141\x62\x6c\145\40\x69\x74\40\164\x6f\x20\x61\143\x74\151\x76\141\x74\145\40\x74\x68\145\x20\160\x6c\x75\x67\x69\156\x2e");
        wq:
        add_option("\101\x63\x74\x69\166\x61\164\x65\x64\x5f\x50\154\165\x67\151\156", "\x50\154\165\x67\x69\156\x2d\x53\x6c\165\147");
    }
    function myprefix_add_cron_schedule($Hi)
    {
        $Hi["\x77\x65\x65\153\x6c\171"] = array("\151\x6e\164\145\162\166\141\x6c" => 604800, "\x64\x69\163\160\x6c\141\171" => __("\117\156\x63\x65\40\x57\x65\145\153\154\171"));
        $Hi["\x6d\x6f\156\x74\150\x6c\171"] = array("\x69\x6e\164\145\x72\166\x61\x6c" => 2635200, "\x64\151\163\160\154\141\171" => __("\x4f\156\143\x65\40\115\x6f\x6e\x74\150\x6c\171"));
        return $Hi;
    }
    function metadata_sync_cron_action()
    {
        error_log("\155\151\x6e\151\157\x72\x61\x6e\147\x65\x20\72\x20\122\101\116\x20\x53\x59\x4e\103\x20\55\x20" . time());
        $JR = LicenseHelper::getCurrentOption(mo_options_enum_service_provider::Identity_name);
        $this->upload_metadata(@file_get_contents(get_option("\x73\141\155\154\137\x6d\145\x74\141\144\141\164\x61\x5f\x75\x72\x6c\x5f\146\x6f\x72\137\x73\171\156\x63")));
        update_option("\x73\141\x6d\154\x5f\x69\x64\x65\156\x74\x69\x74\x79\137\x6e\141\155\x65", $JR);
    }
    function mo_login_widget_saml_options()
    {
        global $wpdb;
        update_option("\x6d\157\x5f\x73\141\x6d\154\137\150\157\x73\x74\x5f\156\141\155\x65", "\x68\x74\164\x70\x73\72\x2f\57\x6c\x6f\x67\151\x6e\56\x78\x65\x63\165\x72\151\146\171\56\x63\157\155");
        $AN = get_option("\155\157\137\x73\x61\x6d\x6c\x5f\x68\x6f\x73\x74\x5f\x6e\141\x6d\145");
        mo_register_saml_sso();
    }
    function mo_saml_success_message()
    {
        $YI = "\145\162\162\157\x72";
        $J7 = get_option("\x6d\x6f\137\x73\141\x6d\x6c\x5f\155\145\x73\x73\x61\147\x65");
        echo "\x3c\144\x69\166\40\x63\154\x61\x73\x73\x3d\47" . $YI . "\x27\x3e\x20\x3c\160\76" . $J7 . "\x3c\57\160\x3e\74\57\x64\x69\x76\76";
    }
    function mo_saml_error_message()
    {
        $YI = "\x75\x70\144\141\x74\x65\144";
        $J7 = get_option("\155\x6f\137\x73\141\x6d\154\x5f\155\145\163\163\x61\x67\145");
        echo "\x3c\x64\x69\x76\40\x63\154\141\163\x73\75\x27" . $YI . "\x27\76\x20\74\x70\76" . $J7 . "\x3c\57\x70\x3e\74\57\144\x69\166\x3e";
    }
    public function mo_sso_saml_deactivate()
    {
        if (!is_multisite()) {
            goto Xk;
        }
        global $wpdb;
        $uq = $wpdb->get_col("\123\105\114\x45\103\x54\x20\x62\154\157\x67\x5f\x69\144\x20\x46\x52\117\x4d\40{$wpdb->blogs}");
        $hv = get_current_blog_id();
        do_action("\155\x6f\137\163\141\155\154\x5f\x66\x6c\165\163\x68\137\143\141\143\150\x65");
        foreach ($uq as $blog_id) {
            switch_to_blog($blog_id);
            delete_option("\x6d\157\137\163\141\x6d\x6c\137\x68\x6f\163\x74\137\156\141\x6d\x65");
            delete_option("\155\157\x5f\163\x61\155\154\137\x6e\x65\x77\x5f\162\x65\147\151\x73\x74\162\x61\x74\x69\157\156");
            delete_option("\x6d\157\137\x73\141\x6d\154\137\x61\x64\x6d\151\x6e\x5f\x70\x68\157\156\x65");
            delete_option("\155\157\x5f\163\x61\155\154\137\141\x64\155\151\156\x5f\x70\x61\x73\x73\167\157\x72\144");
            delete_option("\x6d\x6f\137\x73\x61\155\x6c\137\166\x65\162\x69\146\171\x5f\143\165\163\x74\x6f\155\145\162");
            delete_option("\x6d\x6f\137\163\x61\x6d\154\x5f\141\x64\x6d\x69\x6e\137\x63\165\x73\164\x6f\155\x65\x72\137\153\x65\x79");
            delete_option("\155\157\137\x73\141\x6d\x6c\x5f\141\x64\x6d\151\156\137\141\160\x69\x5f\153\145\171");
            delete_option("\x6d\157\137\163\141\x6d\154\x5f\143\165\163\x74\157\x6d\x65\x72\137\164\x6f\153\x65\156");
            delete_option("\155\157\x5f\163\x61\155\154\x5f\155\145\x73\x73\141\x67\x65");
            delete_option("\155\x6f\x5f\x73\141\x6d\x6c\x5f\162\145\147\x69\x73\x74\162\141\164\x69\157\156\137\163\x74\141\164\165\x73");
            delete_option("\155\157\137\163\x61\155\x6c\137\x69\144\160\137\143\x6f\156\146\151\147\137\x63\x6f\x6d\160\154\x65\164\145");
            delete_option("\155\157\137\x73\x61\x6d\x6c\137\164\x72\141\156\x73\141\143\x74\151\x6f\156\111\x64");
            delete_option("\x76\x6c\x5f\143\x68\x65\x63\153\137\164");
            delete_option("\166\x6c\137\x63\150\145\143\x6b\x5f\163");
            delete_option("\x6d\x6f\x5f\163\141\x6d\154\x5f\x73\x68\x6f\x77\x5f\x61\144\144\x6f\x6e\163\137\x6e\x6f\164\x69\143\145");
            delete_option("\x73\x6d\154\x5f\154\x6b");
            delete_option("\x6d\157\137\163\x61\155\154\x5f\x74\154\x61");
            delete_option("\155\157\x5f\163\141\x6d\154\x5f\154\151\x63\145\156\163\x65\x5f\x65\x78\160\151\162\x79\x5f\144\141\x74\x65");
            nd:
        }
        Vx:
        switch_to_blog($hv);
        goto Xc;
        Xk:
        do_action("\155\157\x5f\x73\141\155\x6c\137\146\x6c\165\163\150\137\143\141\x63\150\145");
        delete_option("\x6d\157\x5f\x73\141\x6d\x6c\137\x68\157\x73\164\137\156\x61\155\145");
        delete_option("\155\x6f\x5f\163\141\x6d\154\137\156\145\x77\x5f\162\x65\147\151\x73\164\162\x61\164\x69\157\x6e");
        delete_option("\155\x6f\137\163\141\155\154\x5f\141\144\x6d\151\156\137\x70\150\x6f\156\145");
        delete_option("\x6d\x6f\x5f\x73\x61\155\x6c\x5f\x61\144\x6d\x69\x6e\x5f\x70\x61\x73\163\x77\x6f\162\144");
        delete_option("\x6d\x6f\x5f\163\x61\155\x6c\137\x76\145\162\x69\x66\x79\137\143\x75\x73\x74\157\155\x65\162");
        delete_option("\155\157\137\163\141\x6d\154\137\x61\x64\x6d\151\x6e\x5f\x63\165\x73\x74\x6f\155\x65\x72\137\153\x65\x79");
        delete_option("\x6d\x6f\137\163\141\155\x6c\x5f\141\x64\x6d\x69\156\x5f\141\x70\151\137\153\x65\171");
        delete_option("\x6d\x6f\x5f\163\141\x6d\154\x5f\x63\165\163\164\x6f\155\145\162\x5f\164\x6f\153\x65\x6e");
        delete_option("\155\x6f\x5f\163\141\155\154\137\155\145\x73\163\x61\x67\145");
        delete_option("\155\157\137\x73\x61\x6d\x6c\137\162\145\147\x69\x73\164\162\141\164\x69\157\x6e\x5f\163\x74\x61\x74\165\163");
        delete_option("\155\157\x5f\163\x61\155\x6c\137\x69\x64\160\137\143\157\x6e\x66\x69\x67\x5f\143\157\x6d\x70\x6c\145\164\145");
        delete_option("\x6d\x6f\137\x73\x61\155\154\x5f\x74\162\x61\x6e\x73\141\x63\164\x69\157\156\x49\144");
        delete_option("\155\157\137\x73\141\x6d\x6c\x5f\x65\156\141\x62\x6c\x65\137\x63\154\x6f\x75\144\x5f\x62\162\157\153\x65\162");
        delete_option("\x76\x6c\137\x63\150\x65\x63\153\x5f\164");
        delete_option("\166\154\x5f\x63\150\x65\x63\153\x5f\x73");
        delete_option("\155\157\x5f\163\141\155\x6c\137\163\150\x6f\167\x5f\x61\144\144\157\156\x73\x5f\x6e\x6f\164\151\143\x65");
        delete_option("\x73\x6d\x6c\x5f\154\x6b");
        delete_option("\x6d\157\x5f\163\x61\155\x6c\x5f\164\x6c\x61");
        delete_option("\155\x6f\137\163\x61\155\154\137\154\151\143\x65\156\163\145\x5f\145\x78\x70\151\x72\x79\137\144\141\164\x65");
        Xc:
    }
    function djkasjdksaduwaj($e1, $h1, $J7, $QZ = "\146\141\x6c\163\x65")
    {
        $Rs = $h1->check_customer_ln();
        if ($Rs) {
            goto nH;
        }
        if (!($QZ == "\x74\x72\165\x65")) {
            goto K1;
        }
        WP_CLI::error(mo_saml_cli_error::Poor_Internet);
        K1:
        return;
        nH:
        $Rs = json_decode($Rs, true);
        if (strcasecmp($Rs["\163\x74\141\x74\x75\163"], "\123\x55\x43\x43\105\123\x53") == 0) {
            goto FK;
        }
        $U6 = get_option("\x6d\x6f\137\163\x61\155\154\x5f\x63\165\x73\164\x6f\155\x65\x72\137\164\x6f\x6b\x65\156");
        update_option("\163\x69\164\145\x5f\x63\x6b\x5f\x6c", AESEncryption::encrypt_data("\x66\x61\154\163\x65", $U6));
        if (!($QZ == "\x74\x72\x75\145")) {
            goto xH;
        }
        WP_CLI::error(mo_saml_cli_error::Not_Upgraded);
        xH:
        $GV = add_query_arg(array("\x74\x61\x62" => "\154\151\x63\145\x6e\163\x69\x6e\x67"), $_SERVER["\x52\105\x51\125\x45\123\x54\137\125\122\x49"]);
        update_option("\x6d\157\x5f\x73\141\x6d\x6c\137\155\x65\163\163\141\x67\x65", "\131\x6f\165\x20\x68\141\x76\145\40\x6e\x6f\x74\x20\x75\160\x67\162\x61\144\x65\144\40\171\x65\x74\x2e\40" . addLink("\103\x6c\151\x63\x6b\40\150\x65\x72\x65", $GV) . "\40\x74\157\x20\x75\160\x67\x72\141\144\145\40\164\157\x20\160\x72\145\155\x69\x75\155\x20\166\x65\x72\163\151\x6f\x6e\56");
        $this->mo_saml_show_error_message();
        goto hD;
        FK:
        if (!(array_key_exists("\x6c\x69\x63\x65\156\163\x65\x45\170\160\x69\162\x79", $Rs) && !$this->mo_saml_check_empty_or_null($Rs["\x6c\151\143\x65\156\163\x65\x45\170\160\x69\162\x79"]))) {
            goto PO;
        }
        update_option("\155\157\x5f\163\x61\155\154\x5f\154\151\x63\x65\x6e\163\145\137\145\170\160\x69\162\171\137\144\141\x74\x65", $this->mo_saml_parse_expiry_date($Rs["\154\151\x63\145\156\163\145\x45\170\x70\151\162\171"]));
        if (new DateTime() > new DateTime($Rs["\154\x69\143\145\x6e\163\145\x45\x78\160\151\162\171"])) {
            goto zm;
        }
        update_option("\155\157\x5f\163\x61\x6d\154\x5f\163\154\x65", false);
        goto y2;
        zm:
        update_option("\x6d\157\x5f\163\x61\155\x6c\x5f\x73\154\x65", true);
        y2:
        PO:
        $Rs = json_decode($h1->mo_saml_vl($e1, false), true);
        update_option("\x76\x6c\137\143\150\x65\x63\x6b\x5f\x74", time());
        if (isset($Rs["\x69\x73\124\162\x69\141\154"]) and !empty($Rs["\x69\163\x54\162\151\x61\154"])) {
            goto sA;
        }
        update_option("\x6d\157\x5f\163\x61\x6d\x6c\137\164\154\141", false);
        goto hi;
        sA:
        update_option("\155\157\137\x73\x61\155\154\x5f\x74\154\x61", $Rs["\151\x73\x54\162\x69\x61\154"]);
        update_option("\155\157\x5f\163\x61\155\154\137\154\x69\x63\145\x6e\163\145\137\145\170\x70\x69\x72\x79\137\144\x61\164\x65", $Rs["\x6c\151\143\145\156\163\145\105\x78\x70\151\x72\171\x44\141\164\145"]);
        hi:
        if (is_array($Rs) and strcasecmp($Rs["\163\x74\141\164\x75\x73"], "\123\125\x43\103\x45\x53\123") == 0) {
            goto Ui;
        }
        if (is_array($Rs) and strcasecmp($Rs["\163\164\141\164\165\x73"], "\x46\101\x49\x4c\105\x44") == 0) {
            goto jp;
        }
        if (!($QZ == "\164\x72\x75\145")) {
            goto GO;
        }
        WP_CLI::error(mo_saml_cli_error::Poor_Internet);
        GO:
        update_option("\155\157\137\163\141\155\x6c\x5f\x6d\145\163\x73\141\147\145", "\x41\x6e\40\145\162\162\x6f\162\40\157\143\x63\165\x72\145\144\x20\167\150\151\154\145\40\160\x72\157\x63\145\x73\x73\151\x6e\147\x20\171\x6f\165\162\40\162\145\x71\165\x65\163\164\56\x20\x50\x6c\145\141\163\145\x20\x54\x72\x79\40\x61\x67\141\x69\156\56");
        $this->mo_saml_show_error_message();
        goto qe;
        jp:
        if (strcasecmp($Rs["\x6d\x65\x73\163\x61\x67\145"], "\103\x6f\144\145\x20\150\141\163\40\x45\x78\x70\x69\x72\145\x64") == 0) {
            goto xF;
        }
        if (!($QZ == "\164\x72\x75\x65")) {
            goto aU;
        }
        WP_CLI::error(mo_saml_cli_error::Invalid_License);
        aU:
        update_option("\x6d\157\x5f\163\141\155\154\x5f\x6d\x65\163\x73\141\147\x65", "\131\157\165\x20\150\x61\166\145\x20\x65\156\164\145\x72\x65\x64\40\141\x6e\x20\151\156\166\x61\x6c\151\x64\40\154\151\143\145\156\x73\145\40\153\x65\x79\56\40\120\154\145\x61\x73\x65\40\x65\156\x74\145\162\x20\141\x20\x76\x61\154\151\x64\x20\154\151\x63\145\x6e\x73\145\40\153\145\x79\56");
        goto a_;
        xF:
        if (!($QZ == "\x74\162\165\x65")) {
            goto yY;
        }
        WP_CLI::error(mo_saml_cli_error::Code_Expired);
        yY:
        $GV = add_query_arg(array("\x74\x61\x62" => "\154\151\143\145\x6e\163\151\156\x67"), $_SERVER["\122\105\121\125\x45\123\124\137\125\122\x49"]);
        update_option("\155\157\x5f\x73\x61\155\x6c\137\x6d\145\163\163\x61\x67\145", "\x4c\x69\x63\145\x6e\x73\145\40\153\x65\171\x20\x79\157\165\40\x68\141\x76\145\x20\145\156\164\x65\162\x65\144\x20\150\x61\163\x20\141\154\x72\x65\x61\144\x79\40\142\145\x65\156\40\165\163\145\x64\56\40\120\154\x65\141\x73\x65\40\x65\x6e\164\145\162\40\141\40\153\145\x79\40\167\x68\x69\x63\x68\40\x68\141\x73\x20\x6e\157\x74\40\x62\145\145\156\x20\x75\163\x65\144\x20\142\145\146\157\162\x65\40\x6f\x6e\x20\x61\x6e\171\x20\x6f\x74\x68\x65\x72\40\151\156\163\164\141\x6e\x63\x65\40\157\162\40\x69\x66\40\171\157\165\x20\x68\141\166\x65\x20\145\170\x61\x75\x73\x74\x65\144\40\141\x6c\154\40\171\x6f\165\162\x20\x6b\x65\171\163\40\164\x68\145\156\40" . addLink("\103\x6c\x69\143\153\40\x68\145\162\145", $GV) . "\40\x74\x6f\x20\x62\x75\171\40\155\x6f\x72\145\x2e");
        a_:
        $this->mo_saml_show_error_message();
        qe:
        goto g_;
        Ui:
        $U6 = get_option("\155\157\137\x73\141\155\154\137\143\165\163\x74\x6f\x6d\145\x72\x5f\x74\157\x6b\x65\x6e");
        update_option("\163\x6d\154\137\x6c\153", AESEncryption::encrypt_data($e1, $U6));
        update_option("\155\x6f\x5f\x73\x61\155\154\137\155\x65\x73\163\x61\147\x65", $J7);
        $U6 = get_option("\155\157\137\163\x61\x6d\154\x5f\143\x75\x73\x74\x6f\x6d\145\162\x5f\x74\157\x6b\145\156");
        update_option("\163\x69\x74\145\x5f\143\153\137\154", AESEncryption::encrypt_data("\x74\162\165\x65", $U6));
        update_option("\x74\x5f\x73\151\164\x65\137\x73\x74\x61\x74\165\163", AESEncryption::encrypt_data("\x66\141\x6c\x73\145", $U6));
        $hf = plugin_dir_path(__FILE__);
        $A7 = home_url();
        $A7 = trim($A7, "\57");
        if (preg_match("\43\136\x68\164\x74\x70\x28\x73\51\77\72\x2f\x2f\x23", $A7)) {
            goto UP;
        }
        $A7 = "\150\164\164\x70\72\x2f\x2f" . $A7;
        UP:
        $lc = parse_url($A7);
        $VX = preg_replace("\57\x5e\167\167\167\134\56\x2f", '', $lc["\x68\157\163\164"]);
        $E4 = wp_upload_dir();
        $tU = $VX . "\55" . $E4["\x62\x61\x73\x65\x64\x69\x72"];
        $tE = hash_hmac("\x73\150\x61\62\65\x36", $tU, "\x34\104\x48\x66\152\x67\146\152\x61\x73\156\x64\146\x73\x61\x6a\146\110\107\112");
        $N8 = $this->djkasjdksa();
        $rp = round(strlen($N8) / rand(2, 20));
        $N8 = substr_replace($N8, $tE, $rp, 0);
        $Tx = base64_decode($N8);
        if (is_writable($hf . "\x6c\x69\x63\x65\156\163\x65")) {
            goto vz;
        }
        $N8 = str_rot13($N8);
        $cy = base64_decode("\142\x47\x4e\153\141\x6d\164\150\143\62\x70\153\141\x33\116\150\x59\x32\x77\x3d");
        update_option($cy, $N8);
        goto on;
        vz:
        file_put_contents($hf . "\154\x69\143\145\156\x73\145", $Tx);
        on:
        update_option("\x6c\x63\167\x72\x74\154\x66\x73\x61\x6d\154", true);
        if (!($QZ == "\x74\x72\165\145")) {
            goto Rc;
        }
        WP_CLI::success("\x4c\151\x63\145\156\x73\145\40\141\x70\x70\x6c\x69\x65\x64\40\x73\165\x63\x63\x65\163\163\x66\165\154\154\x79\x2e");
        Rc:
        $GV = add_query_arg(array("\164\141\x62" => "\x67\145\156\145\x72\x61\154"), $_SERVER["\122\x45\121\x55\105\123\124\x5f\125\122\111"]);
        $this->mo_saml_show_success_message();
        g_:
        hD:
    }
    function mo_cli_save_details($xl, $nW, $Y_, $jL, $lV)
    {
        if (mo_saml_is_extension_installed("\x63\x75\162\x6c")) {
            goto NK;
        }
        WP_CLI::error(mo_saml_cli_error::Curl_Error);
        NK:
        update_option("\155\157\x5f\163\x61\155\154\137\x72\x65\147\x69\163\164\x72\x61\x74\151\157\x6e\x5f\x73\164\x61\164\x75\x73", '');
        update_option("\155\x6f\x5f\163\x61\155\154\137\x76\145\x72\x69\146\x79\x5f\143\165\x73\x74\x6f\x6d\x65\162", '');
        delete_option("\155\157\x5f\163\141\155\154\137\x6e\x65\167\137\x72\x65\x67\151\163\x74\x72\x61\164\x69\157\156");
        delete_option("\155\157\x5f\163\141\x6d\154\137\141\144\155\151\x6e\x5f\x65\x6d\x61\x69\154");
        delete_option("\x6d\x6f\x5f\x73\x61\x6d\154\x5f\141\144\155\151\156\137\160\150\157\156\x65");
        delete_option("\163\x6d\154\137\154\153");
        delete_option("\164\137\163\151\164\145\x5f\163\164\x61\164\165\x73");
        delete_option("\163\151\x74\x65\137\x63\x6b\x5f\154");
        $r6 = sanitize_email($jL);
        update_option("\155\x6f\x5f\x73\141\155\x6c\137\141\x64\155\151\156\x5f\145\155\141\x69\x6c", $r6);
        $h1 = new CustomerSaml();
        $Rs = $h1->check_customer();
        if ($Rs) {
            goto fh;
        }
        WP_CLI::error(mo_saml_cli_error::Poor_Internet);
        fh:
        $Rs = json_decode($Rs, true);
        if (!(strcasecmp($Rs["\163\x74\x61\x74\x75\163"], "\103\x55\123\124\x4f\115\105\122\x5f\116\117\124\x5f\x46\x4f\125\x4e\104") == 0)) {
            goto EZ;
        }
        WP_CLI::error(mo_saml_cli_error::Customer_Not_Found);
        EZ:
        update_option("\155\x6f\x5f\x73\x61\155\x6c\x5f\x61\144\155\151\x6e\137\143\x75\x73\x74\x6f\x6d\145\x72\137\x6b\x65\171", $xl);
        update_option("\155\157\137\163\x61\x6d\x6c\x5f\x61\144\x6d\x69\x6e\x5f\141\x70\151\137\x6b\145\x79", $nW);
        update_option("\155\157\x5f\x73\141\x6d\x6c\x5f\143\x75\163\x74\x6f\155\x65\x72\x5f\164\x6f\153\145\x6e", $Y_);
        update_option("\155\x6f\x5f\163\141\x6d\154\x5f\162\145\x67\x69\x73\164\x72\x61\164\x69\x6f\x6e\x5f\163\164\141\x74\x75\163", "\x45\x78\151\163\164\x69\156\147\x20\125\163\x65\162");
        delete_option("\x6d\157\x5f\163\x61\155\154\x5f\166\145\162\151\146\x79\137\x63\165\x73\164\x6f\x6d\145\162");
        $e1 = htmlspecialchars(trim($lV));
        $J7 = "\x59\157\x75\x72\40\x6c\151\143\145\156\163\x65\x20\151\163\x20\x76\145\x72\x69\x66\151\x65\144\56\40\131\x6f\x75\40\143\141\x6e\x20\x6e\157\167\40\x73\x65\164\x75\x70\x20\164\150\x65\40\160\x6c\165\147\151\156\x2e";
        $this->djkasjdksaduwaj($e1, $h1, $J7, "\164\162\165\145");
    }
    function mo_saml_show_success_message()
    {
        remove_action("\141\x64\x6d\151\156\137\x6e\x6f\x74\151\143\x65\x73", array($this, "\155\x6f\137\x73\x61\x6d\x6c\x5f\x73\165\x63\x63\145\x73\x73\x5f\x6d\145\x73\x73\x61\147\145"));
        add_action("\141\x64\155\151\156\x5f\x6e\x6f\x74\x69\143\x65\x73", array($this, "\x6d\157\x5f\x73\x61\155\154\137\x65\x72\x72\157\x72\x5f\x6d\x65\x73\x73\141\147\x65"));
    }
    function mo_saml_show_error_message()
    {
        remove_action("\x61\x64\x6d\151\x6e\137\156\157\x74\151\x63\x65\x73", array($this, "\155\x6f\x5f\163\x61\x6d\154\137\x65\162\162\x6f\162\137\155\x65\163\163\x61\x67\145"));
        add_action("\x61\x64\x6d\x69\156\x5f\156\x6f\x74\151\143\x65\x73", array($this, "\x6d\x6f\137\x73\x61\x6d\154\x5f\163\x75\x63\x63\145\x73\x73\x5f\x6d\x65\163\x73\141\x67\145"));
    }
    function plugin_settings_style($Aa)
    {
        if (!("\164\x6f\x70\x6c\x65\x76\145\154\x5f\160\x61\147\x65\137\155\157\137\163\141\x6d\154\x5f\x73\x65\164\x74\151\x6e\x67\x73" != $Aa && "\155\151\156\151\157\162\141\156\x67\145\x2d\x73\141\x6d\x6c\55\x32\55\x30\55\163\163\x6f\x5f\160\141\x67\145\137\155\x6f\x5f\x6d\141\156\x61\147\x65\137\x6c\x69\143\145\x6e\163\145" != $Aa)) {
            goto Xi;
        }
        return;
        Xi:
        if (!(isset($_REQUEST["\x74\141\x62"]) && $_REQUEST["\x74\141\x62"] == "\x6c\x69\x63\x65\156\x73\151\x6e\x67")) {
            goto PX;
        }
        wp_enqueue_style("\155\157\137\163\141\155\154\x5f\x62\157\x6f\x74\x73\x74\162\141\160\137\x63\x73\163", plugins_url("\x69\x6e\143\154\x75\x64\145\163\57\143\163\x73\57\x62\x6f\x6f\164\163\164\162\x61\160\x2f\x62\157\157\164\x73\164\162\141\x70\56\x6d\x69\x6e\56\x63\x73\x73", __FILE__), array(), mo_options_plugin_constants::Version, "\141\x6c\x6c");
        PX:
        wp_enqueue_style("\x6d\157\137\163\x61\x6d\x6c\137\141\144\x6d\151\x6e\137\x73\145\x74\164\151\156\147\x73\137\x6a\x71\x75\145\162\171\137\163\164\x79\x6c\x65", plugins_url("\151\x6e\143\x6c\165\144\145\163\x2f\143\163\163\x2f\152\x71\x75\x65\162\171\56\165\151\56\143\x73\163", __FILE__), array(), mo_options_plugin_constants::Version, "\141\x6c\x6c");
        wp_enqueue_style("\155\x6f\137\x73\141\x6d\154\137\x61\144\x6d\x69\x6e\137\163\145\x74\164\x69\x6e\147\163\137\163\164\x79\x6c\x65\137\164\x72\141\143\x6b\145\x72", plugins_url("\151\x6e\143\x6c\x75\144\145\x73\57\x63\163\x73\57\160\162\x6f\147\162\x65\163\163\55\x74\x72\x61\143\x6b\x65\162\x2e\x63\163\163", __FILE__), array(), mo_options_plugin_constants::Version, "\x61\154\x6c");
        wp_enqueue_style("\155\x6f\137\x73\141\155\x6c\137\141\x64\x6d\151\x6e\x5f\x73\145\164\164\151\x6e\147\163\137\x73\x74\x79\x6c\x65", plugins_url("\151\x6e\x63\154\165\x64\x65\x73\57\143\x73\x73\57\x73\164\x79\x6c\145\137\163\x65\x74\164\x69\156\147\x73\x2e\x6d\151\156\x2e\x63\x73\x73", __FILE__), array(), mo_options_plugin_constants::Version, "\x61\x6c\154");
        wp_enqueue_style("\x6d\157\137\163\x61\155\x6c\137\x61\144\x6d\151\156\137\x73\x65\x74\164\x69\x6e\147\163\137\160\x68\157\156\x65\137\x73\164\x79\x6c\x65", plugins_url("\151\x6e\x63\154\165\144\145\163\x2f\x63\163\x73\57\160\x68\157\x6e\x65\56\155\151\156\56\x63\x73\x73", __FILE__), array(), mo_options_plugin_constants::Version, "\x61\154\x6c");
        wp_enqueue_style("\155\x6f\x5f\163\x61\155\x6c\x5f\167\x70\142\55\x66\x61", plugins_url("\x69\x6e\143\154\x75\x64\x65\163\57\x63\x73\163\57\x66\x6f\x6e\x74\55\x61\x77\x65\x73\157\x6d\x65\56\x6d\x69\x6e\x2e\143\163\163", __FILE__), array(), mo_options_plugin_constants::Version, "\x61\154\x6c");
        wp_enqueue_style("\x6d\157\137\x73\x61\x6d\x6c\137\155\141\x6e\x61\x67\145\x5f\154\151\x63\145\156\163\145\137\163\145\x74\x74\x69\x6e\147\x73\137\x73\164\171\x6c\x65", plugins_url("\x4c\151\143\x65\156\x73\x65\x55\x74\x69\x6c\163\57\x76\x69\x65\x77\x73\x2f\x4c\x69\143\145\x6e\163\x65\x56\151\145\x77\x2e\143\163\x73", __FILE__), array(), mo_options_plugin_constants::Version, "\x61\154\154");
    }
    function plugin_settings_script($Aa)
    {
        if (!("\x74\x6f\x70\154\145\x76\x65\154\x5f\160\141\147\145\137\x6d\157\137\163\x61\155\x6c\x5f\163\x65\164\x74\151\x6e\x67\x73" != $Aa && "\155\x69\156\151\x6f\x72\141\x6e\x67\145\x2d\163\x61\155\154\x2d\x32\x2d\x30\55\163\163\x6f\x5f\160\x61\147\145\137\x6d\x6f\x5f\155\141\156\141\x67\x65\137\x6c\x69\x63\x65\156\163\145" != $Aa)) {
            goto pz;
        }
        return;
        pz:
        wp_enqueue_script("\x6a\x71\x75\x65\x72\x79");
        wp_enqueue_script("\155\157\x5f\x73\x61\155\x6c\x5f\141\x64\x6d\x69\x6e\x5f\163\145\164\164\151\x6e\147\163\x5f\x63\x6f\x6c\x6f\162\137\x73\143\162\x69\x70\164", plugins_url("\x69\x6e\x63\154\x75\144\145\163\57\152\x73\57\x6a\163\x63\157\154\157\x72\57\152\163\x63\x6f\154\157\x72\56\152\x73", __FILE__), array(), mo_options_plugin_constants::Version, false);
        wp_enqueue_script("\x6d\x6f\137\163\141\x6d\154\x5f\x61\x64\155\151\x6e\x5f\x73\145\x74\x74\151\x6e\147\x73\x5f\x73\x63\162\151\160\164", plugins_url("\x69\x6e\143\154\x75\144\145\x73\x2f\152\163\57\163\145\x74\164\x69\156\147\163\56\155\x69\156\x2e\x6a\x73", __FILE__), array(), mo_options_plugin_constants::Version, false);
        wp_enqueue_script("\155\x6f\x5f\163\x61\155\154\137\x61\x64\x6d\151\x6e\137\163\x65\x74\164\x69\156\x67\x73\x5f\x70\150\157\156\145\137\163\143\x72\x69\x70\x74", plugins_url("\x69\156\143\x6c\x75\x64\145\x73\57\x6a\x73\x2f\160\x68\157\156\145\56\x6d\151\x6e\x2e\x6a\163", __FILE__), array(), mo_options_plugin_constants::Version, false);
        wp_enqueue_script("\155\157\x5f\x73\x61\155\154\137\x61\144\x6d\151\156\x5f\142\x6f\x6f\x74\163\x74\x72\x61\160\137\163\x63\x72\x69\160\164", plugins_url("\x69\156\143\x6c\x75\144\145\x73\x2f\152\x73\x2f\142\x6f\x6f\x74\163\x74\x72\141\160\x2e\155\x69\x6e\x2e\152\x73", __FILE__), array(), mo_options_plugin_constants::Version, false);
        if (!(isset($_REQUEST["\164\141\x62"]) && $_REQUEST["\x74\x61\x62"] == "\154\x69\x63\x65\x6e\163\x69\156\147")) {
            goto j4;
        }
        wp_enqueue_script("\155\x6f\x5f\163\141\155\x6c\137\x6d\157\144\145\x72\156\151\x7a\162\x5f\x73\143\x72\x69\160\x74", plugins_url("\151\x6e\143\x6c\165\144\x65\163\x2f\x6a\x73\x2f\155\x6f\144\x65\162\156\151\x7a\162\56\152\x73", __FILE__), array(), mo_options_plugin_constants::Version, false);
        wp_enqueue_script("\x6d\x6f\x5f\x73\141\155\x6c\x5f\x70\157\160\x6f\166\x65\x72\137\163\x63\x72\151\160\164", plugins_url("\x69\156\143\x6c\165\144\145\163\57\152\163\x2f\142\x6f\157\x74\x73\164\x72\x61\x70\x2f\x70\x6f\160\x70\145\x72\x2e\155\151\156\x2e\x6a\x73", __FILE__), array(), mo_options_plugin_constants::Version, false);
        wp_enqueue_script("\155\157\137\x73\141\155\x6c\x5f\x62\x6f\x6f\x74\163\x74\162\x61\x70\x5f\163\143\162\151\x70\x74", plugins_url("\x69\156\x63\154\x75\x64\x65\x73\x2f\152\163\x2f\142\x6f\157\164\x73\x74\x72\141\x70\57\142\157\x6f\x74\x73\164\162\x61\160\x2e\155\x69\156\56\152\163", __FILE__), array(), mo_options_plugin_constants::Version, false);
        j4:
    }
    function mo_saml_activation_message()
    {
        $YI = "\165\160\144\141\x74\x65\x64";
        $J7 = get_option("\155\x6f\x5f\x73\x61\x6d\x6c\x5f\x6d\145\163\x73\141\x67\145");
        echo "\x3c\144\x69\x76\40\143\154\x61\x73\x73\75\x27" . $YI . "\x27\76\40\x3c\160\x3e" . $J7 . "\x3c\x2f\x70\76\x3c\57\144\151\x76\x3e";
    }
    function get_empty_strings()
    {
        return '';
    }
    function mo_saml_custom_attr_column($yy)
    {
        $VK = maybe_unserialize(get_option("\155\157\137\163\141\x6d\154\x5f\143\x75\x73\164\x6f\155\x5f\x61\164\x74\162\163\137\155\x61\x70\160\151\156\x67"));
        $je = get_option("\163\x61\155\154\137\163\x68\157\167\137\165\163\145\x72\137\141\164\x74\x72\x69\x62\x75\x74\x65");
        $jb = 0;
        if (!is_array($VK)) {
            goto lc;
        }
        foreach ($VK as $U6 => $St) {
            if (empty($U6)) {
                goto YM;
            }
            if (!in_array($jb, $je)) {
                goto eW;
            }
            $yy[$U6] = $U6;
            eW:
            YM:
            $jb++;
            nK:
        }
        oT:
        lc:
        return $yy;
    }
    function mo_saml_attr_column_content($Bv, $Me, $eb)
    {
        $VK = maybe_unserialize(get_option("\155\x6f\x5f\163\x61\155\x6c\x5f\x63\x75\163\164\157\155\137\x61\x74\x74\162\163\x5f\x6d\x61\160\x70\x69\156\147"));
        if (!is_array($VK)) {
            goto cv;
        }
        foreach ($VK as $U6 => $St) {
            if (!($U6 === $Me)) {
                goto lU;
            }
            $Rs = get_user_meta($eb, $Me, false);
            if (empty($Rs)) {
                goto CC;
            }
            if (!is_array($Rs[0])) {
                goto ku;
            }
            $Ls = '';
            foreach ($Rs[0] as $Tp) {
                $Ls = $Ls . $Tp;
                if (!next($Rs[0])) {
                    goto Gh;
                }
                $Ls = $Ls . "\x20\x7c\40";
                Gh:
                SA:
            }
            HB:
            return $Ls;
            goto nz;
            ku:
            return $Rs[0];
            nz:
            CC:
            lU:
            Y1:
        }
        bD:
        cv:
        return $Bv;
    }
    static function mo_check_option_admin_referer($en)
    {
        return isset($_POST["\x6f\160\x74\x69\x6f\156"]) and $_POST["\x6f\x70\164\151\x6f\156"] == $en and check_admin_referer($en);
    }
    function miniorange_login_widget_saml_save_settings()
    {
        if (!current_user_can("\155\141\x6e\141\147\145\137\x6f\160\x74\151\157\x6e\x73")) {
            goto u8;
        }
        if (!(is_admin() && get_option("\x41\143\164\151\x76\x61\164\145\144\137\x50\154\x75\x67\151\156") == "\120\154\x75\x67\x69\x6e\x2d\x53\154\x75\x67")) {
            goto C_;
        }
        delete_option("\101\x63\164\x69\166\x61\164\145\144\137\x50\x6c\x75\x67\x69\156");
        update_option("\155\157\x5f\163\x61\x6d\x6c\x5f\155\x65\163\x73\141\147\145", "\107\x6f\40\x74\x6f\x20\160\154\x75\x67\x69\156\40\74\142\76\74\x61\40\x68\162\x65\146\x3d\42\x61\144\155\151\x6e\x2e\160\150\x70\77\160\x61\147\145\75\x6d\157\137\x73\x61\x6d\x6c\x5f\163\145\x74\x74\151\x6e\147\x73\42\76\x73\145\164\x74\151\x6e\x67\163\74\x2f\x61\x3e\x3c\57\x62\76\x20\164\157\40\143\x6f\x6e\146\x69\x67\x75\x72\x65\40\x53\101\115\114\40\123\x69\156\x67\x6c\x65\40\123\x69\x67\x6e\x20\x4f\156\x20\x62\171\x20\x6d\x69\x6e\x69\117\162\x61\x6e\147\x65\56");
        add_action("\141\144\155\151\x6e\x5f\156\x6f\164\151\x63\145\163", array($this, "\x6d\x6f\x5f\x73\x61\155\x6c\x5f\141\143\164\x69\166\141\164\x69\157\156\137\x6d\145\163\163\x61\x67\145"));
        C_:
        u8:
        if (!(isset($_POST["\157\160\164\151\157\x6e"]) && current_user_can("\x6d\141\156\x61\147\x65\x5f\157\160\164\x69\157\156\x73"))) {
            goto J_;
        }
        if (!self::mo_check_option_admin_referer("\155\x6f\137\155\141\156\x61\x67\145\x5f\154\151\143\x65\x6e\163\145")) {
            goto iX;
        }
        if (array_key_exists("\155\157\137\x65\156\141\x62\154\145\x5f\155\165\x6c\x74\x69\160\x6c\145\x5f\x6c\x69\x63\145\x6e\163\145\x73", $_POST)) {
            goto KG;
        }
        delete_option("\155\157\137\x65\156\x61\x62\154\145\137\155\165\154\x74\x69\160\154\145\x5f\x6c\151\x63\x65\x6e\163\145\163");
        goto Z3;
        KG:
        update_option("\x6d\x6f\x5f\145\156\141\142\x6c\x65\x5f\155\165\154\164\151\160\x6c\x65\x5f\x6c\151\x63\145\x6e\x73\x65\x73", "\143\150\x65\143\x6b\145\x64");
        initializeLicenseObjectArray();
        Z3:
        update_option("\155\157\137\163\x61\x6d\x6c\x5f\x6d\x65\x73\163\x61\147\145", "\x43\157\156\146\151\147\165\162\141\x74\151\157\156\40\x73\x61\x76\x65\x64\x20\x73\165\143\143\x65\x73\x73\146\x75\x6c\x6c\171");
        $this->mo_saml_show_success_message();
        iX:
        if (!self::mo_check_option_admin_referer("\x6d\157\x5f\x61\144\x64\151\156\x67\x5f\x61\x6c\164\x65\x72\156\x61\x74\x65\x5f\145\x6e\x76\151\x72\157\156\155\x65\x6e\164\x73")) {
            goto uL;
        }
        if (updateLicenseObjects($_POST)) {
            goto ru;
        }
        update_option("\155\157\x5f\163\x61\x6d\x6c\137\x6d\145\x73\x73\141\x67\x65", "\131\157\165\162\40\x63\150\x61\x6e\147\x65\163\x20\167\x65\x72\145\40\156\157\x74\x20\163\141\x76\145\144\x2e\x20\120\154\x65\141\x73\x65\40\x70\x72\x6f\166\x69\x64\145\x20\165\156\x69\x71\165\145\40\166\x61\154\165\x65\163\40\x66\x6f\x72\40\171\x6f\165\x72\x20\x65\x6e\166\151\x72\x6f\x6e\155\145\x6e\164\x73\x20\x61\156\144\x20\144\x6f\156\47\164\x20\162\x65\155\157\x76\145\40\164\x68\x65\40\143\x75\x72\162\145\x6e\164\x20\145\x6e\x76\x69\x72\157\156\155\145\156\x74");
        $this->mo_saml_show_error_message();
        goto gT;
        ru:
        update_option("\155\157\x5f\x73\x61\x6d\x6c\137\155\x65\x73\x73\141\x67\x65", "\x45\x6e\x76\x69\x72\x6f\x6e\x6d\x65\156\164\x73\x20\165\x70\x64\141\x74\145\144\40\x73\165\143\x63\145\163\163\x66\x75\x6c\x6c\171");
        $this->mo_saml_show_success_message();
        gT:
        uL:
        if (!self::mo_check_option_admin_referer("\155\x6f\x5f\x63\x68\141\x6e\147\x65\137\145\x6e\166\151\162\157\x6e\145\x6d\164")) {
            goto ja;
        }
        update_option("\155\157\x5f\x73\x61\155\x6c\x5f\163\x65\154\x65\143\164\x65\144\137\x65\x6e\x76\x69\162\157\x6e\x6d\x65\156\164", $_POST["\145\156\166\151\162\157\156\x6d\145\x6e\x74"]);
        update_option("\x6d\x6f\x5f\x73\141\155\x6c\x5f\x6d\x65\163\163\x61\x67\145", "\x45\x6e\x76\151\162\x6f\x6e\x6d\145\156\x74\x20\143\x68\141\x6e\x67\145\144\40\163\x75\x63\143\145\163\x73\x66\x75\x6c\154\171");
        $this->mo_saml_show_success_message();
        ja:
        if (self::mo_check_option_admin_referer("\154\157\147\x69\x6e\x5f\167\x69\x64\x67\x65\164\x5f\163\x61\x6d\154\x5f\163\141\x76\145\137\163\x65\164\x74\151\x6e\147\x73")) {
            goto dv;
        }
        if (self::mo_check_option_admin_referer("\154\x6f\147\x69\156\137\x77\151\x64\x67\x65\164\x5f\163\x61\x6d\154\137\x61\x74\164\x72\151\142\x75\x74\x65\x5f\x6d\141\x70\x70\x69\x6e\x67")) {
            goto SN;
        }
        if (self::mo_check_option_admin_referer("\143\154\145\x61\x72\x5f\141\164\164\x72\163\137\154\151\x73\164")) {
            goto yR;
        }
        if (self::mo_check_option_admin_referer("\x6d\x6f\x5f\x73\x61\x6d\154\x5f\141\144\x64\x6f\156\x73\137\155\x65\x73\163\141\x67\145")) {
            goto Vk;
        }
        if (self::mo_check_option_admin_referer("\154\157\147\x69\x6e\137\x77\x69\144\x67\145\x74\x5f\x73\x61\155\154\x5f\x72\x6f\x6c\x65\137\x6d\141\x70\160\151\x6e\147")) {
            goto wh;
        }
        if (self::mo_check_option_admin_referer("\x73\x61\155\x6c\137\146\157\x72\155\x5f\144\157\x6d\x61\151\x6e\137\162\145\x73\164\162\151\x63\x74\151\x6f\156\x5f\x6f\160\x74\x69\x6f\156")) {
            goto in;
        }
        if (self::mo_check_option_admin_referer("\x6d\157\137\x73\x61\x6d\x6c\137\165\160\144\141\x74\x65\x5f\x69\x64\x70\137\x73\x65\x74\x74\151\x6e\147\x73\x5f\x6f\160\x74\x69\157\x6e")) {
            goto Ok;
        }
        if (!self::mo_check_option_admin_referer("\163\x61\x6d\154\137\x75\x70\154\x6f\141\144\137\155\145\164\141\x64\141\x74\x61")) {
            goto cg;
        }
        if (preg_match("\57\x5e\134\167\52\x24\x2f", $_POST["\163\x61\155\x6c\137\x69\x64\x65\x6e\164\x69\x74\171\137\x6d\x65\x74\x61\x64\x61\x74\x61\137\x70\x72\157\x76\x69\144\145\x72"])) {
            goto kw;
        }
        update_option("\155\157\137\x73\141\x6d\154\x5f\155\145\163\163\x61\x67\x65", "\x50\x6c\x65\141\x73\145\x20\155\141\164\x63\x68\x20\x74\x68\145\40\x72\x65\161\x75\x65\163\x74\x65\144\40\146\x6f\x72\155\141\164\40\x66\157\x72\40\111\144\145\156\164\151\x74\171\x20\x50\x72\157\x76\151\144\145\x72\40\x4e\141\x6d\x65\56\x20\x4f\156\154\x79\40\x61\x6c\160\150\141\x62\145\x74\x73\54\40\x6e\165\155\x62\x65\x72\163\x20\141\156\144\x20\165\x6e\144\145\162\x73\x63\x6f\162\145\x20\151\163\x20\141\x6c\154\157\167\145\144\x2e");
        $this->mo_saml_show_error_message();
        return;
        kw:
        if (!function_exists("\x77\x70\137\150\x61\x6e\x64\x6c\145\x5f\165\x70\x6c\157\141\x64")) {
            require_once ABSPATH . "\167\x70\x2d\141\144\x6d\151\x6e\x2f\151\x6e\x63\x6c\165\144\x65\163\x2f\146\x69\x6c\x65\56\x70\150\160";
        }
        $this->_handle_upload_metadata();
        cg:
        goto t0;
        Ok:
        if (!(isset($_POST["\x6d\157\137\x73\141\x6d\154\x5f\x73\160\x5f\142\x61\163\145\137\x75\162\154"]) && isset($_POST["\x6d\157\137\x73\141\x6d\x6c\x5f\163\x70\x5f\x65\156\164\x69\x74\x79\x5f\x69\144"]))) {
            goto Kd;
        }
        $yE = htmlspecialchars($_POST["\155\x6f\x5f\x73\x61\155\x6c\x5f\x73\x70\x5f\142\141\163\x65\x5f\165\x72\154"]);
        $lF = htmlspecialchars($_POST["\155\x6f\137\x73\x61\x6d\154\x5f\x73\160\x5f\145\156\164\151\x74\x79\x5f\x69\144"]);
        if (!(substr($yE, -1) == "\57")) {
            goto Fm;
        }
        $yE = substr($yE, 0, -1);
        Fm:
        update_option("\155\x6f\137\x73\x61\x6d\x6c\137\163\160\137\142\141\x73\x65\137\165\x72\x6c", $yE);
        update_option("\x6d\157\137\163\141\155\154\137\x73\x70\x5f\145\156\x74\151\x74\171\137\x69\x64", $lF);
        Kd:
        update_option("\155\157\137\x73\141\155\154\137\155\145\163\163\x61\147\145", "\123\x65\164\164\151\x6e\x67\163\40\165\x70\x64\141\164\x65\144\x20\163\x75\143\x63\145\x73\x73\146\x75\x6c\x6c\171\56");
        $this->mo_saml_show_success_message();
        t0:
        goto eP;
        in:
        $t3 = LicenseHelper::getSelectedEnvironment();
        mo_save_environment_settings($_POST);
        if (!($t3 and $t3 != LicenseHelper::getCurrentEnvironment())) {
            goto hI;
        }
        return;
        hI:
        $IR = isset($_POST["\155\x6f\137\x73\141\x6d\x6c\x5f\145\156\141\x62\x6c\145\137\144\x6f\155\x61\x69\x6e\x5f\x72\x65\x73\164\162\151\x63\164\151\x6f\x6e\137\154\157\147\x69\156"]) && !empty($_POST["\x6d\x6f\137\163\141\155\154\x5f\145\x6e\x61\142\x6c\x65\137\144\157\x6d\141\x69\x6e\137\162\145\163\x74\162\151\x63\164\151\x6f\156\x5f\x6c\157\147\x69\156"]) ? htmlspecialchars($_POST["\155\x6f\x5f\x73\141\155\x6c\137\x65\156\x61\x62\154\x65\x5f\144\x6f\155\x61\151\156\137\162\145\x73\164\x72\x69\143\x74\151\x6f\156\x5f\154\x6f\147\x69\x6e"]) : '';
        $Vp = isset($_POST["\x6d\157\137\163\141\x6d\x6c\137\141\x6c\154\157\x77\137\144\145\156\171\x5f\x75\x73\x65\162\137\167\151\164\x68\137\x64\x6f\155\x61\151\x6e"]) && !empty($_POST["\x6d\x6f\137\163\141\155\x6c\137\141\x6c\154\x6f\x77\x5f\x64\145\x6e\x79\x5f\165\163\x65\x72\x5f\x77\151\164\x68\x5f\x64\157\x6d\141\151\156"]) ? htmlspecialchars($_POST["\x6d\x6f\137\x73\x61\155\x6c\137\141\154\x6c\x6f\167\137\144\x65\x6e\171\137\x75\163\x65\x72\x5f\167\x69\x74\150\x5f\144\x6f\x6d\x61\151\x6e"]) : "\x61\154\154\x6f\x77";
        $HT = isset($_POST["\163\x61\155\x6c\137\141\155\x5f\x65\x6d\x61\151\x6c\137\144\x6f\x6d\x61\x69\x6e\163"]) && !empty($_POST["\163\x61\155\x6c\x5f\141\x6d\137\x65\x6d\x61\151\x6c\x5f\x64\x6f\x6d\x61\x69\156\163"]) ? htmlspecialchars($_POST["\163\141\x6d\x6c\137\x61\x6d\x5f\x65\x6d\x61\x69\154\137\144\x6f\155\141\151\156\163"]) : '';
        update_option("\155\x6f\x5f\163\x61\x6d\154\137\145\x6e\141\x62\x6c\145\137\x64\x6f\155\x61\x69\156\x5f\162\x65\163\x74\162\x69\143\x74\x69\157\156\x5f\x6c\157\147\x69\x6e", $IR);
        update_option("\155\x6f\x5f\163\x61\155\154\x5f\141\154\x6c\x6f\x77\x5f\x64\145\156\171\137\165\x73\x65\x72\x5f\x77\151\164\x68\x5f\x64\157\x6d\141\151\x6e", $Vp);
        update_option("\x73\141\x6d\154\x5f\141\155\x5f\145\155\141\x69\154\137\x64\157\155\141\151\156\163", $HT);
        update_option("\x6d\x6f\x5f\x73\141\x6d\x6c\x5f\x6d\x65\163\x73\141\147\x65", "\104\x6f\x6d\x61\x69\x6e\40\122\145\x73\x74\x72\x69\143\164\x69\157\156\x20\150\x61\x73\40\142\x65\x65\156\x20\x73\141\166\145\x64\40\x73\165\143\x63\x65\x73\x73\146\165\154\x6c\171\x2e");
        $this->mo_saml_show_success_message();
        eP:
        goto Nt;
        wh:
        $t3 = LicenseHelper::getSelectedEnvironment();
        mo_save_environment_settings($_POST);
        if (!($t3 and $t3 != LicenseHelper::getCurrentEnvironment())) {
            goto ct;
        }
        return;
        ct:
        if (mo_saml_is_extension_installed("\x63\x75\x72\x6c")) {
            goto Bc;
        }
        update_option("\x6d\157\x5f\x73\141\155\x6c\x5f\x6d\x65\x73\x73\141\x67\145", "\x45\122\122\117\x52\x3a\x20\x50\110\120\x20\143\x55\122\114\40\x65\170\164\145\156\x73\x69\157\x6e\x20\151\x73\x20\x6e\157\164\40\151\x6e\x73\x74\x61\x6c\x6c\x65\x64\40\x6f\x72\x20\x64\x69\163\x61\x62\154\x65\144\x2e\x20\123\x61\166\x65\x20\x52\157\x6c\145\x20\115\x61\x70\160\x69\156\x67\40\146\141\151\154\x65\x64\56");
        $this->mo_saml_show_error_message();
        return;
        Bc:
        if (!isset($_POST["\x73\141\155\154\x5f\141\x6d\x5f\x64\x65\146\141\165\154\x74\x5f\165\163\x65\x72\137\x72\157\154\145"])) {
            goto pa;
        }
        $AJ = htmlspecialchars($_POST["\163\141\x6d\154\x5f\141\x6d\x5f\x64\x65\146\141\x75\x6c\164\137\x75\163\x65\x72\137\162\x6f\x6c\145"]);
        update_option("\x73\x61\155\154\137\141\x6d\x5f\x64\x65\x66\x61\165\x6c\x74\x5f\x75\163\x65\162\137\162\157\154\145", $AJ);
        pa:
        if (isset($_POST["\x73\141\x6d\154\x5f\x61\x6d\x5f\x64\x6f\156\x74\x5f\x61\154\154\157\x77\137\165\156\154\x69\x73\x74\145\x64\x5f\x75\x73\145\162\x5f\162\157\x6c\x65"])) {
            goto ys;
        }
        update_option("\163\141\155\x6c\x5f\141\x6d\137\x64\x6f\x6e\164\x5f\141\x6c\x6c\x6f\x77\137\x75\x6e\x6c\x69\x73\x74\145\x64\137\x75\x73\x65\x72\137\162\x6f\x6c\145", "\165\156\x63\150\x65\143\x6b\145\x64");
        goto wG;
        ys:
        update_option("\x73\141\155\x6c\x5f\x61\155\x5f\144\x65\x66\x61\165\x6c\164\137\x75\163\x65\x72\x5f\x72\157\x6c\145", false);
        update_option("\163\141\155\154\x5f\x61\x6d\x5f\x64\157\x6e\x74\x5f\141\154\154\x6f\x77\137\165\x6e\x6c\x69\x73\x74\x65\x64\x5f\x75\x73\145\x72\137\x72\x6f\154\x65", "\x63\x68\x65\143\x6b\145\x64");
        wG:
        if (isset($_POST["\155\157\x5f\x73\141\x6d\x6c\137\x64\157\156\164\x5f\143\162\145\141\164\145\137\165\x73\145\x72\137\x69\x66\137\162\157\x6c\145\x5f\x6e\x6f\x74\x5f\x6d\x61\x70\x70\x65\x64"])) {
            goto Fh;
        }
        update_option("\155\157\x5f\x73\141\155\154\x5f\144\157\156\164\x5f\143\x72\145\141\164\145\x5f\165\163\145\x72\x5f\x69\x66\137\162\x6f\154\145\x5f\x6e\x6f\x74\137\155\141\x70\x70\145\x64", "\x75\156\143\x68\145\x63\153\145\144");
        goto TX;
        Fh:
        update_option("\155\157\x5f\x73\x61\x6d\154\x5f\x64\157\156\x74\137\x63\x72\145\141\164\x65\x5f\165\x73\x65\162\x5f\x69\146\x5f\x72\157\x6c\x65\x5f\x6e\x6f\164\x5f\x6d\x61\x70\x70\x65\x64", "\143\x68\x65\143\153\x65\144");
        update_option("\x73\141\155\154\x5f\141\155\137\x64\145\x66\x61\165\154\164\x5f\x75\163\145\162\137\162\157\x6c\x65", false);
        update_option("\163\x61\x6d\154\137\141\155\137\144\x6f\x6e\x74\137\141\x6c\154\157\x77\x5f\165\156\x6c\151\x73\164\x65\144\137\165\x73\145\x72\137\162\x6f\x6c\x65", "\165\x6e\x63\x68\145\143\153\x65\144");
        TX:
        if (isset($_POST["\155\x6f\x5f\x73\141\x6d\x6c\137\144\157\156\164\x5f\x75\x70\144\x61\x74\x65\x5f\145\170\x69\x73\x74\x69\x6e\x67\137\x75\x73\145\x72\x5f\162\157\x6c\145"])) {
            goto UM;
        }
        update_option("\x73\141\x6d\x6c\x5f\141\x6d\137\x64\x6f\156\x74\137\x75\160\144\141\x74\x65\x5f\145\x78\x69\163\164\x69\156\x67\137\x75\x73\x65\162\137\x72\x6f\154\x65", "\x75\x6e\x63\150\x65\143\153\145\144");
        goto aK;
        UM:
        update_option("\163\x61\155\154\x5f\x61\155\x5f\x64\x6f\x6e\x74\x5f\165\160\144\141\164\x65\x5f\x65\x78\151\163\x74\x69\x6e\x67\137\x75\x73\145\162\137\x72\157\x6c\145", "\x63\150\x65\x63\153\x65\144");
        update_option("\x73\141\155\154\x5f\141\x6d\137\165\160\x64\x61\x74\x65\x5f\x61\144\155\151\156\137\165\163\145\162\163\137\162\157\x6c\145", "\x75\156\x63\150\145\143\x6b\x65\x64");
        aK:
        if (isset($_POST["\155\x6f\137\163\141\x6d\154\x5f\x75\x70\144\141\164\x65\x5f\141\144\155\x69\156\x5f\165\x73\145\x72\x73\x5f\x72\157\x6c\x65"])) {
            goto b4;
        }
        update_option("\x73\x61\x6d\x6c\137\x61\155\x5f\165\160\144\x61\164\x65\137\141\x64\155\151\x6e\137\x75\163\145\162\x73\137\x72\157\154\x65", "\x75\156\x63\150\145\x63\153\145\x64");
        goto XB;
        b4:
        update_option("\x73\x61\155\154\137\x61\155\137\165\x70\144\141\164\145\x5f\141\x64\x6d\151\156\x5f\x75\163\145\x72\163\137\x72\x6f\x6c\x65", "\143\x68\145\x63\153\145\x64");
        XB:
        if (isset($_POST["\x6d\x6f\137\163\x61\x6d\154\x5f\x64\157\156\x74\137\x61\x6c\154\157\167\x5f\165\x73\145\x72\137\x74\x6f\x6c\157\x67\151\156\x5f\x63\162\145\141\x74\x65\x5f\167\x69\164\x68\137\147\x69\166\145\x6e\x5f\147\162\x6f\x75\x70\x73"])) {
            goto NO;
        }
        update_option("\x73\141\x6d\154\137\141\x6d\x5f\x64\x6f\156\164\x5f\141\154\154\157\x77\137\x75\163\145\162\137\x74\x6f\154\157\147\x69\156\137\143\x72\x65\x61\x74\145\137\167\x69\x74\x68\137\147\x69\x76\x65\156\x5f\x67\x72\157\165\x70\x73", "\165\x6e\143\x68\145\143\153\x65\144");
        goto fu;
        NO:
        update_option("\163\141\x6d\154\137\141\x6d\x5f\144\157\156\164\137\141\154\154\157\167\137\165\163\x65\x72\137\164\157\154\157\x67\x69\156\x5f\143\162\145\141\164\x65\x5f\x77\151\164\x68\x5f\x67\x69\x76\x65\156\137\x67\x72\x6f\x75\x70\163", "\143\150\x65\143\153\x65\144");
        if (!isset($_POST["\155\x6f\137\x73\141\x6d\x6c\x5f\162\x65\x73\164\162\151\x63\164\x5f\x75\163\x65\162\163\x5f\x77\x69\164\150\x5f\147\162\x6f\165\160\x73"])) {
            goto KD;
        }
        if (!empty($_POST["\155\157\x5f\x73\x61\155\154\x5f\162\x65\x73\164\x72\151\143\x74\x5f\x75\163\x65\x72\x73\137\x77\151\164\x68\137\147\162\x6f\165\160\x73"])) {
            goto Ut;
        }
        update_option("\x6d\157\137\x73\141\x6d\154\137\162\x65\163\x74\162\x69\x63\x74\x5f\165\x73\x65\x72\163\137\167\151\164\x68\x5f\147\x72\x6f\x75\160\x73", '');
        goto vj;
        Ut:
        update_option("\155\x6f\x5f\163\141\x6d\x6c\137\x72\x65\x73\x74\x72\151\x63\x74\x5f\x75\x73\x65\x72\163\x5f\x77\x69\164\x68\137\x67\x72\x6f\x75\x70\163", htmlspecialchars(stripslashes($_POST["\155\157\x5f\x73\141\155\154\137\162\x65\x73\x74\x72\x69\143\x74\137\x75\163\145\x72\163\137\167\x69\164\x68\x5f\147\x72\x6f\x75\x70\x73"])));
        vj:
        KD:
        fu:
        $wp_roles = new WP_Roles();
        $Qo = $wp_roles->get_names();
        $Dx = array();
        foreach ($Qo as $UY => $zu) {
            $UF = "\x73\x61\155\x6c\x5f\x61\155\x5f\x67\x72\x6f\x75\160\x5f\141\164\164\162\137\x76\141\154\x75\x65\x73\x5f" . $UY;
            $Dx[$UY] = htmlspecialchars(stripslashes($_POST[$UF]));
            Sx:
        }
        vy:
        update_option("\163\141\x6d\154\137\141\155\137\162\157\x6c\145\x5f\x6d\141\160\160\151\x6e\147", $Dx);
        update_option("\155\157\x5f\163\141\x6d\x6c\137\x6d\x65\163\x73\141\x67\x65", "\122\x6f\154\145\40\x4d\141\x70\160\151\x6e\x67\40\x64\x65\x74\141\151\154\163\x20\x73\x61\x76\145\144\x20\163\x75\143\x63\145\x73\163\x66\x75\x6c\154\x79\x2e");
        $this->mo_saml_show_success_message();
        Nt:
        goto wu;
        Vk:
        update_option("\x6d\157\x5f\163\141\155\154\137\x73\150\x6f\167\137\x61\144\x64\x6f\156\163\137\156\157\164\x69\x63\x65", 1);
        wu:
        goto pW;
        yR:
        delete_option("\x6d\157\x5f\x73\141\x6d\x6c\x5f\164\x65\163\x74\137\x63\157\x6e\146\151\147\137\141\x74\164\162\x73");
        update_option("\155\157\x5f\163\141\155\154\137\155\x65\x73\x73\x61\147\145", "\101\164\164\x72\x69\142\165\x74\145\163\x20\x6c\151\x73\164\40\x72\145\x6d\157\166\x65\144\40\x73\x75\x63\x63\145\x73\x73\146\x75\x6c\x6c\171");
        $this->mo_saml_show_success_message();
        pW:
        goto iD;
        SN:
        if (mo_saml_is_extension_installed("\143\165\x72\154")) {
            goto MX;
        }
        update_option("\x6d\157\137\x73\x61\155\x6c\x5f\x6d\145\x73\163\x61\x67\x65", "\105\122\x52\x4f\122\x3a\x20\x50\x48\120\40\143\125\122\x4c\x20\145\x78\164\145\x6e\163\x69\157\156\40\x69\x73\40\156\x6f\164\x20\x69\x6e\163\164\141\x6c\x6c\145\x64\40\x6f\162\x20\x64\151\163\x61\142\x6c\x65\x64\56\x20\x53\141\x76\x65\x20\101\x74\x74\162\x69\142\x75\164\x65\40\115\141\160\x70\151\x6e\147\x20\146\x61\151\x6c\x65\x64\56");
        $this->mo_saml_show_error_message();
        return;
        MX:
        $t3 = LicenseHelper::getSelectedEnvironment();
        mo_save_environment_settings($_POST);
        if (!($t3 and $t3 != LicenseHelper::getCurrentEnvironment())) {
            goto wn;
        }
        return;
        wn:
        update_option("\x73\141\x6d\154\x5f\141\155\137\165\163\145\x72\156\x61\155\145", htmlspecialchars(stripslashes($_POST["\x73\x61\155\154\x5f\x61\155\x5f\x75\x73\145\162\156\141\x6d\145"])));
        update_option("\x73\141\x6d\x6c\137\x61\155\x5f\x65\x6d\141\151\x6c", htmlspecialchars(stripslashes($_POST["\x73\x61\x6d\x6c\137\141\x6d\x5f\145\155\141\151\154"])));
        update_option("\163\x61\x6d\154\137\x61\155\x5f\x66\x69\x72\x73\x74\137\156\x61\155\x65", htmlspecialchars(stripslashes($_POST["\163\x61\155\x6c\x5f\x61\155\137\x66\151\162\163\164\x5f\156\141\155\145"])));
        update_option("\163\141\x6d\x6c\137\x61\155\137\x6c\x61\x73\x74\137\x6e\141\x6d\x65", htmlspecialchars(stripslashes($_POST["\163\141\x6d\x6c\137\x61\155\137\x6c\141\x73\x74\137\156\x61\155\x65"])));
        update_option("\163\141\155\154\137\x61\155\x5f\x67\162\157\165\x70\137\156\141\155\x65", htmlspecialchars(stripslashes($_POST["\x73\141\x6d\x6c\x5f\141\155\137\x67\162\x6f\165\160\137\156\x61\155\x65"])));
        update_option("\163\141\155\154\x5f\141\155\137\x64\151\163\160\154\141\171\x5f\x6e\141\x6d\145", htmlspecialchars(stripslashes($_POST["\x73\x61\155\154\x5f\x61\x6d\137\x64\151\x73\160\x6c\141\171\137\x6e\141\x6d\145"])));
        $VK = array();
        $M6 = array();
        $go = array();
        $qE = array();
        if (!(isset($_POST["\x6d\x6f\x5f\x73\x61\155\154\x5f\x63\165\163\x74\x6f\x6d\x5f\x61\164\164\162\x69\x62\x75\x74\145\x5f\153\x65\171\163"]) && !empty($_POST["\x6d\x6f\x5f\163\141\155\x6c\137\143\x75\163\164\157\155\137\141\164\x74\162\151\x62\165\x74\145\x5f\153\x65\x79\x73"]))) {
            goto S8;
        }
        $M6 = $_POST["\x6d\157\x5f\x73\x61\155\154\x5f\x63\165\163\164\x6f\x6d\137\141\x74\x74\x72\x69\142\x75\164\x65\137\153\x65\x79\x73"];
        S8:
        if (!(isset($_POST["\155\157\x5f\163\x61\155\154\x5f\x63\165\163\x74\x6f\155\x5f\141\x74\x74\162\x69\x62\165\x74\145\137\x76\x61\154\x75\145\163"]) && !empty($_POST["\155\157\137\163\x61\155\x6c\137\143\x75\x73\x74\x6f\155\137\x61\x74\x74\x72\151\142\165\164\x65\x5f\x76\141\x6c\165\x65\x73"]))) {
            goto qn;
        }
        $go = $_POST["\155\157\137\x73\x61\x6d\154\x5f\x63\165\x73\164\x6f\155\x5f\141\x74\x74\162\x69\x62\165\x74\145\x5f\166\x61\154\x75\x65\x73"];
        qn:
        $mJ = count($M6);
        if (!($mJ > 0)) {
            goto uW;
        }
        $M6 = array_map("\150\x74\x6d\x6c\x73\x70\x65\x63\151\x61\154\143\150\x61\x72\163", $M6);
        $go = array_map("\150\164\155\x6c\x73\x70\145\143\x69\x61\x6c\143\150\141\162\x73", $go);
        $OE = 0;
        y8:
        if (!($OE < $mJ)) {
            goto CZ;
        }
        if (!(isset($_POST["\x6d\157\137\x73\141\155\x6c\x5f\144\x69\163\x70\x6c\141\171\137\x61\x74\x74\x72\x69\x62\165\x74\x65\137" . $OE]) && !empty($_POST["\155\157\x5f\x73\x61\x6d\x6c\137\144\x69\x73\160\154\x61\171\x5f\141\x74\164\x72\151\142\165\x74\145\137" . $OE]))) {
            goto rw;
        }
        array_push($qE, $OE);
        rw:
        $OE++;
        goto y8;
        CZ:
        uW:
        update_option("\163\x61\155\154\x5f\x73\150\x6f\167\x5f\x75\x73\x65\x72\x5f\x61\x74\x74\x72\151\x62\165\164\145", $qE);
        $VK = array_combine($M6, $go);
        $VK = array_filter($VK);
        if (!empty($VK)) {
            goto XA;
        }
        $VK = get_option("\x6d\x6f\137\x73\x61\155\154\x5f\x63\165\x73\164\x6f\x6d\x5f\x61\164\164\x72\163\x5f\x6d\x61\160\x70\151\156\147");
        if (empty($VK)) {
            goto Kr;
        }
        delete_option("\155\x6f\x5f\x73\x61\x6d\154\137\x63\x75\x73\x74\157\x6d\137\141\164\164\x72\x73\137\155\x61\x70\160\151\156\x67");
        Kr:
        goto E4;
        XA:
        update_option("\x6d\157\x5f\x73\141\x6d\154\x5f\143\165\x73\164\157\155\137\x61\164\x74\x72\163\137\x6d\141\160\160\151\x6e\147", $VK);
        E4:
        update_option("\155\x6f\137\x73\x61\x6d\x6c\137\155\145\x73\163\x61\147\145", "\x41\164\164\x72\151\142\165\164\x65\40\x4d\x61\x70\160\x69\x6e\x67\x20\x64\x65\164\141\151\154\x73\40\163\141\166\x65\x64\x20\163\x75\x63\x63\x65\163\163\146\165\154\154\x79");
        $this->mo_saml_show_success_message();
        iD:
        goto ut;
        dv:
        if (mo_saml_is_extension_installed("\x63\x75\x72\154")) {
            goto Xz;
        }
        update_option("\x6d\157\137\163\141\155\154\x5f\155\145\x73\x73\141\147\x65", "\x45\122\x52\117\122\x3a\40\120\x48\120\x20\143\125\x52\x4c\x20\145\x78\164\145\x6e\x73\x69\x6f\x6e\40\x69\163\40\x6e\x6f\x74\x20\x69\x6e\163\164\x61\x6c\x6c\145\144\40\x6f\x72\x20\x64\151\x73\141\142\154\x65\x64\x2e\40\123\x61\x76\145\x20\x49\144\145\x6e\x74\151\164\x79\x20\120\162\x6f\166\x69\144\145\x72\x20\x43\x6f\x6e\x66\151\147\x75\162\141\x74\151\x6f\156\40\x66\x61\x69\154\145\x64\x2e");
        $this->mo_saml_show_error_message();
        return;
        Xz:
        $t3 = LicenseHelper::getSelectedEnvironment();
        mo_save_environment_settings($_POST);
        if (!($t3 and $t3 != LicenseHelper::getCurrentEnvironment())) {
            goto uB;
        }
        return;
        uB:
        $JR = '';
        $SX = '';
        $gA = '';
        $gL = '';
        $D4 = '';
        $T8 = '';
        $kC = '';
        $Wh = '';
        $O4 = '';
        if ($this->mo_saml_check_empty_or_null($_POST["\x73\x61\x6d\154\x5f\151\144\145\156\x74\x69\164\x79\137\156\141\x6d\145"]) || $this->mo_saml_check_empty_or_null($_POST["\x73\141\155\154\x5f\x6c\x6f\x67\x69\x6e\137\x75\x72\x6c"]) || $this->mo_saml_check_empty_or_null($_POST["\163\x61\x6d\x6c\137\x69\163\163\165\145\x72"]) || $this->mo_saml_check_empty_or_null($_POST["\x73\141\155\154\x5f\x6e\x61\155\x65\x69\x64\x5f\146\157\162\155\x61\x74"])) {
            goto H2;
        }
        if (!preg_match("\57\x5e\134\167\52\44\x2f", $_POST["\x73\x61\x6d\x6c\137\151\144\145\x6e\164\x69\164\x79\x5f\156\x61\155\x65"])) {
            goto nj;
        }
        $JR = htmlspecialchars(trim($_POST["\163\x61\155\x6c\137\x69\x64\145\156\x74\151\x74\x79\x5f\x6e\141\x6d\x65"]));
        $gA = htmlspecialchars(trim($_POST["\163\x61\155\x6c\137\x6c\x6f\x67\151\156\x5f\x75\x72\154"]));
        if (!array_key_exists("\x73\x61\x6d\154\x5f\154\x6f\x67\151\x6e\x5f\x62\151\156\144\151\156\x67\x5f\164\x79\x70\145", $_POST)) {
            goto Ey;
        }
        $SX = htmlspecialchars($_POST["\x73\141\x6d\x6c\x5f\154\x6f\x67\x69\x6e\x5f\x62\x69\x6e\144\151\x6e\147\137\164\x79\160\145"]);
        Ey:
        if (!array_key_exists("\163\141\x6d\x6c\x5f\154\157\147\157\x75\164\x5f\x62\151\x6e\x64\x69\156\x67\x5f\x74\171\160\145", $_POST)) {
            goto ub;
        }
        $gL = htmlspecialchars($_POST["\163\x61\155\x6c\137\x6c\157\147\x6f\x75\x74\x5f\x62\151\156\x64\151\x6e\147\137\164\171\x70\x65"]);
        ub:
        if (!array_key_exists("\163\141\x6d\154\x5f\154\x6f\147\157\165\164\x5f\165\x72\x6c", $_POST)) {
            goto Vp;
        }
        $D4 = htmlspecialchars(trim($_POST["\x73\x61\155\154\137\154\x6f\147\157\x75\164\x5f\x75\x72\x6c"]));
        Vp:
        $T8 = htmlspecialchars(trim($_POST["\163\x61\x6d\x6c\x5f\x69\x73\163\x75\145\x72"]));
        if (!array_key_exists("\155\157\137\x73\141\155\154\x5f\x69\144\145\156\164\151\x74\171\x5f\x70\x72\157\x76\x69\x64\x65\x72\137\x69\144\x65\x6e\x74\x69\146\151\x65\162\x5f\156\x61\155\145", $_POST)) {
            goto TC;
        }
        $kK = htmlspecialchars($_POST["\155\x6f\137\x73\141\x6d\154\137\x69\x64\145\156\164\151\x74\x79\x5f\160\162\157\x76\x69\x64\145\162\x5f\151\x64\x65\x6e\164\x69\146\151\x65\162\x5f\156\141\x6d\145"]);
        update_option("\x6d\x6f\137\163\x61\155\x6c\x5f\x69\x64\x65\x6e\164\x69\164\171\x5f\x70\162\x6f\166\x69\144\145\162\137\151\144\x65\156\x74\x69\x66\151\x65\x72\137\156\141\x6d\145", $kK);
        TC:
        $kC = $_POST["\x73\141\x6d\x6c\x5f\x78\x35\60\x39\137\x63\x65\162\x74\x69\146\151\x63\x61\164\145"];
        $O4 = htmlspecialchars($_POST["\x73\x61\x6d\154\x5f\156\x61\x6d\x65\x69\x64\137\x66\x6f\162\155\141\164"]);
        goto Fr;
        nj:
        update_option("\x6d\157\137\x73\141\155\x6c\x5f\x6d\x65\x73\163\x61\147\145", "\x50\154\x65\x61\163\x65\x20\x6d\x61\164\x63\x68\40\x74\150\x65\x20\x72\x65\x71\x75\x65\x73\164\145\144\40\146\157\x72\155\x61\164\40\146\x6f\x72\x20\x49\x64\x65\156\x74\151\x74\171\40\120\x72\x6f\x76\x69\x64\145\x72\x20\116\x61\155\x65\x2e\x20\x4f\x6e\x6c\171\40\141\154\x70\x68\x61\x62\x65\164\163\54\x20\x6e\x75\x6d\142\145\162\163\x20\141\x6e\144\40\x75\156\x64\145\x72\x73\143\x6f\162\x65\x20\x69\x73\x20\x61\154\x6c\x6f\167\145\144\56");
        $this->mo_saml_show_error_message();
        return;
        Fr:
        goto O7;
        H2:
        update_option("\x6d\157\x5f\x73\x61\155\x6c\137\x6d\145\163\x73\141\x67\145", "\x41\x6c\154\40\164\150\x65\40\146\151\145\x6c\144\x73\x20\141\162\x65\x20\x72\145\161\x75\151\x72\x65\144\56\40\x50\154\145\141\163\145\x20\x65\x6e\x74\145\x72\x20\166\141\x6c\151\144\x20\145\156\x74\162\x69\145\163\x2e");
        $this->mo_saml_show_error_message();
        return;
        O7:
        update_option("\x73\x61\x6d\x6c\x5f\x69\x64\145\156\164\x69\164\x79\137\x6e\141\155\145", $JR);
        update_option("\x73\141\x6d\x6c\x5f\154\157\x67\x69\156\x5f\x62\151\x6e\x64\x69\156\x67\x5f\x74\x79\160\x65", $SX);
        update_option("\x73\x61\x6d\x6c\x5f\x6c\157\x67\x69\x6e\x5f\x75\x72\154", $gA);
        update_option("\x73\x61\x6d\x6c\x5f\154\x6f\147\x6f\x75\x74\137\x62\151\x6e\x64\x69\x6e\147\x5f\x74\x79\x70\145", $gL);
        update_option("\163\x61\x6d\x6c\137\x6c\x6f\x67\157\165\164\137\165\162\154", $D4);
        update_option("\x73\141\x6d\154\137\151\163\163\165\145\162", $T8);
        update_option("\163\x61\x6d\154\137\x6e\x61\155\x65\151\x64\137\146\157\162\155\x61\x74", $O4);
        if (isset($_POST["\163\x61\x6d\154\137\162\145\161\165\x65\x73\164\x5f\163\151\147\156\145\144"])) {
            goto hB;
        }
        update_option("\163\x61\x6d\x6c\x5f\162\145\161\165\x65\x73\164\137\163\x69\x67\x6e\x65\144", "\x75\156\143\150\145\x63\153\145\x64");
        goto So;
        hB:
        update_option("\x73\141\155\154\x5f\x72\x65\161\165\x65\163\x74\137\163\151\x67\156\x65\x64", "\x63\x68\145\x63\x6b\145\144");
        So:
        foreach ($kC as $U6 => $St) {
            if (empty($St)) {
                goto DE;
            }
            $kC[$U6] = SAMLSPUtilities::sanitize_certificate($St);
            if (@openssl_x509_read($kC[$U6])) {
                goto YQ;
            }
            update_option("\155\157\137\163\141\155\154\x5f\155\x65\163\x73\x61\147\145", "\111\156\x76\141\154\x69\144\x20\x63\x65\162\164\x69\146\x69\x63\141\x74\x65\x3a\40\120\x6c\145\x61\x73\x65\x20\160\x72\157\x76\151\144\x65\40\141\x20\166\141\154\151\x64\40\143\145\162\x74\x69\146\151\x63\x61\164\x65\x2e");
            $this->mo_saml_show_error_message();
            delete_option("\x73\141\x6d\x6c\x5f\x78\x35\x30\x39\x5f\x63\x65\162\x74\x69\x66\151\x63\141\164\145");
            return;
            YQ:
            goto Wb;
            DE:
            unset($kC[$U6]);
            Wb:
            i2:
        }
        Ao:
        if (!empty($kC)) {
            goto GJ;
        }
        update_option("\x6d\x6f\x5f\x73\141\x6d\154\x5f\155\x65\163\163\x61\147\x65", "\x49\x6e\x76\141\154\x69\144\40\103\145\x72\x74\x69\x66\151\x63\x61\164\x65\72\x50\x6c\x65\141\163\x65\x20\160\162\157\x76\151\144\145\x20\x61\x20\x63\x65\x72\x74\151\146\151\x63\141\x74\145");
        $this->mo_saml_show_error_message();
        return;
        GJ:
        update_option("\163\141\x6d\x6c\x5f\x78\65\x30\71\x5f\x63\x65\x72\x74\151\146\151\143\x61\x74\x65", maybe_serialize($kC));
        if (isset($_POST["\x73\x61\x6d\x6c\137\x72\145\163\x70\x6f\x6e\163\x65\137\163\x69\147\x6e\x65\144"])) {
            goto bE;
        }
        update_option("\163\141\155\x6c\137\162\x65\163\160\x6f\x6e\163\x65\x5f\x73\x69\x67\156\145\144", "\131\145\163");
        goto Tm;
        bE:
        update_option("\x73\141\155\154\137\x72\145\163\160\x6f\x6e\x73\145\x5f\x73\x69\x67\x6e\145\144", "\x63\x68\x65\143\x6b\x65\144");
        Tm:
        if (isset($_POST["\x73\x61\x6d\154\x5f\141\x73\x73\x65\162\164\x69\157\x6e\137\163\151\x67\x6e\145\x64"])) {
            goto kG;
        }
        update_option("\x73\x61\x6d\154\x5f\141\x73\x73\145\x72\x74\151\x6f\156\137\163\x69\147\x6e\145\144", "\131\x65\163");
        goto QM;
        kG:
        update_option("\x73\141\x6d\154\137\x61\x73\x73\x65\x72\x74\x69\x6f\156\137\163\151\x67\x6e\x65\x64", "\x63\150\x65\x63\153\145\x64");
        QM:
        if (array_key_exists("\x6d\x6f\x5f\x73\141\x6d\x6c\x5f\145\x6e\x63\157\x64\151\x6e\147\x5f\x65\x6e\x61\x62\154\x65\144", $_POST)) {
            goto DG;
        }
        update_option("\155\x6f\137\x73\x61\x6d\154\x5f\145\x6e\143\157\x64\x69\x6e\147\137\145\156\141\x62\154\x65\x64", "\x75\x6e\x63\150\x65\x63\x6b\145\x64");
        goto LK;
        DG:
        update_option("\x6d\x6f\137\x73\141\x6d\154\137\145\x6e\x63\x6f\144\x69\x6e\147\x5f\145\156\141\142\x6c\145\144", "\143\150\x65\x63\153\145\x64");
        LK:
        update_option("\x6d\x6f\137\x73\x61\155\154\137\155\x65\x73\x73\x61\x67\x65", "\111\x64\145\x6e\x74\x69\164\x79\40\120\x72\x6f\166\151\x64\x65\x72\x20\144\145\164\x61\x69\154\x73\40\163\141\x76\x65\x64\x20\x73\165\x63\143\x65\163\x73\x66\x75\154\154\171\56");
        $this->mo_saml_show_success_message();
        ut:
        if (!self::mo_check_option_admin_referer("\165\x70\147\x72\141\x64\x65\x5f\x63\x65\x72\x74")) {
            goto UE;
        }
        $eM = file_get_contents(plugin_dir_path(__FILE__) . "\x72\x65\x73\x6f\165\162\x63\145\163" . DIRECTORY_SEPARATOR . "\155\x69\156\x69\x6f\162\x61\156\147\x65\x2d\x73\x70\x2d\x63\145\x72\164\151\x66\x69\143\x61\x74\145\56\x63\x72\164");
        $TM = file_get_contents(plugin_dir_path(__FILE__) . "\x72\145\x73\x6f\165\162\x63\145\x73" . DIRECTORY_SEPARATOR . "\x6d\x69\x6e\x69\157\x72\141\x6e\x67\x65\x2d\163\160\x2d\x63\145\x72\x74\151\146\151\x63\x61\x74\x65\55\x70\162\x69\x76\x2e\x6b\145\x79");
        update_option("\x6d\x6f\137\x73\x61\x6d\154\137\x63\165\162\x72\x65\x6e\164\137\143\x65\162\164", $eM);
        update_option("\x6d\x6f\137\163\141\x6d\154\x5f\143\x75\162\x72\x65\x6e\x74\137\x63\x65\x72\164\x5f\x70\x72\151\166\141\164\x65\x5f\x6b\x65\171", $TM);
        update_option("\x6d\x6f\x5f\x73\x61\155\154\x5f\x63\145\162\x74\151\146\151\x63\x61\164\145\137\162\157\x6c\154\137\x62\141\x63\x6b\x5f\x61\166\x61\151\154\141\142\154\x65", true);
        update_option("\x6d\157\x5f\163\x61\x6d\154\x5f\x6d\x65\163\x73\x61\x67\145", "\103\x65\x72\x74\x69\146\151\143\x61\164\x65\x20\125\160\x67\x72\x61\x64\x65\x64\40\x73\165\x63\x63\x65\163\163\x66\x75\x6c\x6c\171");
        $this->mo_saml_show_success_message();
        UE:
        if (!self::mo_check_option_admin_referer("\x72\x6f\x6c\154\x62\141\x63\x6b\137\x63\145\162\164")) {
            goto dU;
        }
        $eM = file_get_contents(plugin_dir_path(__FILE__) . "\x72\145\163\x6f\165\162\x63\145\163" . DIRECTORY_SEPARATOR . "\x73\160\55\x63\x65\162\x74\151\x66\151\x63\141\x74\x65\56\143\x72\x74");
        $TM = file_get_contents(plugin_dir_path(__FILE__) . "\x72\x65\x73\x6f\165\x72\143\145\163" . DIRECTORY_SEPARATOR . "\163\160\55\153\145\x79\56\x6b\x65\x79");
        update_option("\x6d\x6f\x5f\163\x61\155\154\x5f\x63\x75\x72\162\145\156\164\x5f\143\145\x72\164", $eM);
        update_option("\155\x6f\x5f\x73\x61\155\x6c\137\143\x75\x72\x72\145\156\164\x5f\x63\x65\x72\164\137\160\x72\x69\x76\x61\x74\145\x5f\153\145\171", $TM);
        update_option("\x6d\x6f\137\x73\x61\x6d\154\x5f\x6d\145\163\163\x61\147\145", "\103\145\x72\x74\x69\146\x69\143\x61\164\145\40\x52\x6f\154\x6c\x2d\x62\x61\x63\x6b\145\144\x20\163\x75\x63\143\x65\163\x73\x66\165\x6c\x6c\171");
        delete_option("\155\x6f\137\x73\x61\155\x6c\x5f\143\x65\162\x74\x69\x66\x69\143\141\x74\x65\137\x72\157\154\154\137\x62\141\143\153\137\x61\166\141\x69\154\x61\142\154\145");
        $this->mo_saml_show_success_message();
        dU:
        if (self::mo_check_option_admin_referer("\x61\x64\144\x5f\143\165\x73\x74\157\155\137\143\x65\162\x74\x69\x66\151\x63\141\x74\145")) {
            goto EH;
        }
        if (self::mo_check_option_admin_referer("\x61\144\x64\x5f\x63\165\163\x74\x6f\x6d\x5f\155\145\x73\163\x61\x67\x65\x73")) {
            goto vR;
        }
        if (!self::mo_check_option_admin_referer("\155\x6f\137\163\x61\155\x6c\137\162\x65\x6c\141\171\137\x73\164\x61\164\x65\137\157\x70\164\151\157\156")) {
            goto lm;
        }
        if (isset($_POST["\x6d\157\137\163\141\155\154\137\x73\145\156\x64\x5f\x61\142\163\x6f\154\x75\x74\145\x5f\x72\x65\x6c\141\171\137\163\164\x61\x74\x65"]) and !empty($_POST["\x6d\x6f\x5f\x73\x61\x6d\154\137\x73\145\x6e\x64\137\x61\x62\x73\157\x6c\x75\x74\x65\x5f\x72\145\x6c\x61\x79\x5f\x73\x74\141\x74\145"])) {
            goto EB;
        }
        $Yn = false;
        goto PR;
        EB:
        $Yn = true;
        PR:
        $bs = isset($_POST["\155\x6f\x5f\x73\141\x6d\x6c\x5f\162\145\154\141\x79\137\x73\164\x61\x74\x65"]) ? htmlspecialchars($_POST["\155\157\137\163\x61\155\154\137\162\x65\x6c\141\x79\x5f\x73\164\141\x74\x65"]) : '';
        $ZB = isset($_POST["\155\x6f\137\x73\141\x6d\154\x5f\x6c\x6f\x67\x6f\x75\x74\137\x72\x65\154\x61\171\x5f\x73\164\x61\x74\145"]) ? htmlspecialchars($_POST["\x6d\157\x5f\163\141\155\154\x5f\154\157\x67\157\165\x74\x5f\162\145\154\x61\171\137\163\x74\x61\x74\145"]) : '';
        update_option("\x6d\x6f\x5f\x73\141\x6d\x6c\x5f\x72\x65\154\141\x79\x5f\x73\x74\141\164\145", $bs);
        update_option("\155\157\x5f\163\x61\155\154\x5f\154\157\147\157\x75\164\137\x72\145\154\x61\x79\137\x73\164\x61\164\145", $ZB);
        update_option("\x6d\x6f\137\163\141\x6d\154\x5f\x73\x65\156\144\137\141\142\x73\x6f\154\x75\x74\145\x5f\162\x65\x6c\x61\171\x5f\163\x74\141\x74\145", $Yn);
        update_option("\x6d\157\x5f\163\141\155\x6c\x5f\x6d\x65\x73\x73\141\x67\145", "\x52\145\x6c\x61\171\40\x53\164\x61\164\145\x20\x75\x70\x64\x61\164\145\144\40\x73\165\x63\x63\145\163\x73\146\165\154\154\171\56");
        $this->mo_saml_show_success_message();
        lm:
        goto wx;
        vR:
        update_option("\155\157\137\163\141\155\x6c\x5f\141\x63\143\x6f\165\156\x74\137\143\x72\145\x61\164\151\157\x6e\137\x64\151\x73\141\x62\x6c\x65\x64\137\x6d\x73\x67", htmlspecialchars($_POST["\x6d\x6f\137\163\141\x6d\x6c\x5f\x61\143\x63\x6f\165\156\x74\137\143\162\145\141\x74\151\157\x6e\x5f\x64\x69\x73\141\142\154\145\144\137\155\163\x67"]));
        update_option("\x6d\157\137\163\141\x6d\154\137\162\145\163\164\x72\x69\143\164\145\144\137\x64\x6f\155\x61\151\x6e\x5f\x65\x72\x72\x6f\162\137\x6d\x73\x67", htmlspecialchars($_POST["\x6d\157\137\163\x61\x6d\154\x5f\x72\145\x73\164\x72\x69\143\x74\145\144\137\x64\x6f\155\141\x69\x6e\137\145\x72\x72\x6f\162\x5f\x6d\x73\147"]));
        update_option("\155\x6f\x5f\x73\141\155\154\137\155\x65\163\163\x61\x67\145", "\103\157\x6e\146\151\147\x75\162\141\x74\151\157\156\x20\x68\141\x73\x20\x62\145\x65\x6e\40\x73\141\166\145\144\40\x73\x75\x63\143\x65\163\x73\146\165\x6c\x6c\171\x2e");
        $this->mo_saml_show_success_message();
        wx:
        goto Eq;
        EH:
        $eM = file_get_contents(plugin_dir_path(__FILE__) . "\x72\x65\x73\157\x75\162\x63\x65\163" . DIRECTORY_SEPARATOR . "\155\x69\x6e\151\157\162\x61\x6e\x67\x65\x2d\163\x70\55\x63\x65\162\x74\x69\146\151\x63\x61\164\x65\56\x63\162\164");
        $TM = file_get_contents(plugin_dir_path(__FILE__) . "\x72\145\163\x6f\x75\162\143\145\163" . DIRECTORY_SEPARATOR . "\x6d\151\x6e\x69\x6f\x72\141\x6e\147\145\x2d\163\x70\55\x63\145\162\164\151\x66\x69\143\x61\164\145\55\160\x72\151\x76\x2e\153\x65\x79");
        if (isset($_POST["\163\165\142\155\x69\x74"]) and $_POST["\163\x75\x62\155\x69\x74"] == "\x55\160\154\157\141\x64") {
            goto x2;
        }
        if (!(isset($_POST["\163\x75\x62\155\x69\164"]) and $_POST["\x73\165\142\x6d\151\164"] == "\x52\145\x73\x65\164")) {
            goto tW;
        }
        delete_option("\155\x6f\137\x73\x61\x6d\x6c\137\x63\165\x73\164\157\x6d\x5f\x63\145\x72\164");
        delete_option("\155\x6f\x5f\x73\x61\x6d\x6c\137\143\165\163\164\157\x6d\137\143\145\162\164\137\x70\162\151\166\141\164\145\137\153\145\x79");
        update_option("\x6d\157\137\x73\x61\x6d\154\x5f\x63\x75\x72\x72\x65\156\x74\x5f\x63\145\x72\x74", $eM);
        update_option("\155\x6f\137\x73\x61\x6d\x6c\137\x63\x75\x72\x72\x65\156\x74\x5f\143\145\x72\x74\x5f\x70\x72\x69\x76\x61\164\145\137\153\x65\171", $TM);
        update_option("\x6d\157\x5f\163\141\155\154\137\155\x65\x73\x73\x61\x67\145", "\x52\145\163\x65\164\x20\x43\145\x72\164\x69\146\x69\143\x61\x74\145\40\x73\x75\x63\x63\145\163\x73\x66\x75\x6c\154\171\x2e");
        $this->mo_saml_show_success_message();
        tW:
        goto EM;
        x2:
        if (!@openssl_x509_read($_POST["\x73\x61\x6d\154\137\x70\x75\x62\x6c\151\x63\137\x78\65\x30\71\137\x63\x65\x72\x74\151\x66\x69\x63\x61\164\x65"])) {
            goto MO;
        }
        if (!@openssl_x509_check_private_key($_POST["\163\141\x6d\154\137\160\165\x62\x6c\151\x63\x5f\x78\65\x30\x39\x5f\x63\145\162\x74\151\146\x69\143\141\x74\x65"], $_POST["\x73\x61\155\154\137\160\x72\151\x76\x61\x74\x65\137\170\65\60\x39\x5f\x63\x65\x72\x74\151\146\x69\x63\x61\164\145"])) {
            goto r1;
        }
        if (openssl_x509_read($_POST["\x73\141\x6d\x6c\137\x70\x75\142\x6c\151\143\137\170\65\60\x39\x5f\143\x65\162\x74\151\x66\x69\x63\141\x74\x65"]) && openssl_x509_check_private_key($_POST["\163\x61\x6d\x6c\x5f\160\165\x62\x6c\151\143\x5f\x78\x35\x30\x39\x5f\x63\x65\162\x74\x69\146\x69\x63\x61\164\145"], $_POST["\163\x61\155\154\137\160\x72\151\166\x61\x74\x65\137\170\x35\x30\x39\137\x63\x65\x72\164\x69\146\151\x63\x61\164\x65"])) {
            goto Bm;
        }
        goto ng;
        MO:
        update_option("\155\157\x5f\163\141\x6d\154\x5f\155\x65\x73\x73\x61\x67\145", "\x49\156\166\x61\154\151\x64\x20\x43\145\x72\164\151\146\151\143\x61\164\145\x20\x66\157\162\155\141\x74\x2e\40\120\154\145\x61\x73\145\x20\x65\156\164\x65\x72\40\x61\40\166\141\x6c\x69\x64\40\x63\145\x72\x74\x69\146\151\x63\x61\164\145\x2e");
        $this->mo_saml_show_error_message();
        return;
        goto ng;
        r1:
        update_option("\x6d\157\137\163\141\x6d\154\x5f\155\x65\163\163\141\147\x65", "\111\156\166\x61\154\151\x64\40\x50\162\x69\166\x61\164\x65\40\113\x65\171\x2e");
        $this->mo_saml_show_error_message();
        return;
        goto ng;
        Bm:
        $WN = $_POST["\x73\x61\155\154\137\x70\165\x62\x6c\x69\143\x5f\170\65\x30\x39\137\143\x65\x72\x74\151\146\151\x63\141\x74\145"];
        $Zl = $_POST["\163\141\x6d\x6c\137\x70\x72\x69\x76\141\x74\145\137\x78\65\60\x39\137\143\145\x72\x74\x69\x66\151\x63\x61\x74\x65"];
        update_option("\x6d\x6f\x5f\x73\141\x6d\x6c\x5f\143\165\x73\164\157\x6d\x5f\143\145\x72\x74", $WN);
        update_option("\x6d\x6f\137\x73\x61\155\x6c\137\x63\x75\x73\164\x6f\155\137\143\x65\x72\164\x5f\160\x72\x69\x76\x61\164\x65\x5f\x6b\145\x79", $Zl);
        update_option("\155\x6f\x5f\163\x61\x6d\x6c\137\143\x75\x72\x72\145\156\x74\x5f\x63\145\x72\164", $WN);
        update_option("\155\157\x5f\163\x61\155\x6c\x5f\x63\x75\162\x72\x65\x6e\x74\137\143\145\x72\x74\137\160\162\x69\166\141\x74\x65\x5f\x6b\145\171", $Zl);
        update_option("\155\x6f\137\x73\x61\x6d\154\x5f\x6d\x65\x73\163\141\147\x65", "\103\x75\x73\x74\x6f\x6d\40\103\145\x72\x74\x69\x66\x69\143\x61\x74\x65\x20\x75\x70\x64\141\x74\145\x64\x20\163\165\143\143\x65\x73\x73\146\165\154\154\x79\x2e");
        $this->mo_saml_show_success_message();
        ng:
        EM:
        Eq:
        if (self::mo_check_option_admin_referer("\x6d\x6f\x5f\163\141\155\154\137\167\151\x64\x67\x65\164\x5f\x6f\x70\164\x69\157\x6e")) {
            goto Fo;
        }
        if (self::mo_check_option_admin_referer("\x6d\157\x5f\x73\141\155\x6c\137\162\145\x67\151\x73\x74\145\162\137\x63\x75\163\x74\157\x6d\145\x72")) {
            goto yM;
        }
        if (self::mo_check_option_admin_referer("\x6d\157\137\x73\141\155\154\137\166\141\x6c\151\144\x61\164\x65\x5f\x6f\164\x70")) {
            goto cf;
        }
        if (self::mo_check_option_admin_referer("\x6d\157\x5f\163\141\155\154\137\x76\x65\x72\x69\146\x79\137\143\x75\x73\x74\157\x6d\x65\x72")) {
            goto RN;
        }
        if (self::mo_check_option_admin_referer("\155\157\137\x73\x61\x6d\154\x5f\143\x6f\x6e\164\141\x63\164\137\x75\x73\x5f\161\x75\x65\x72\x79\137\157\160\164\x69\157\156")) {
            goto qO;
        }
        if (self::mo_check_option_admin_referer("\155\x6f\137\x73\x61\x6d\154\x5f\x72\x65\x73\145\x6e\144\137\x6f\x74\160\x5f\x65\x6d\x61\151\154")) {
            goto ID;
        }
        if (self::mo_check_option_admin_referer("\x6d\x6f\137\163\x61\155\154\137\x72\145\x73\x65\156\144\x5f\x6f\x74\160\x5f\x70\150\x6f\156\145")) {
            goto qm;
        }
        if (self::mo_check_option_admin_referer("\x6d\x6f\x5f\x73\141\155\154\x5f\147\157\137\x62\141\143\x6b")) {
            goto fQ;
        }
        if (self::mo_check_option_admin_referer("\x6d\157\137\x73\141\x6d\x6c\137\162\145\x67\x69\163\164\145\x72\137\167\151\x74\x68\137\160\150\157\x6e\x65\x5f\x6f\x70\164\x69\157\156")) {
            goto U9;
        }
        if (self::mo_check_option_admin_referer("\155\157\137\x73\141\155\x6c\x5f\x72\x65\x67\x69\163\164\x65\x72\x65\144\x5f\x6f\x6e\x6c\171\x5f\x61\143\143\145\163\x73\137\157\160\164\151\x6f\156")) {
            goto XM;
        }
        if (self::mo_check_option_admin_referer("\155\157\x5f\x73\141\155\154\137\x72\x65\x64\x69\162\x65\143\164\137\x74\x6f\137\167\160\x5f\154\157\147\151\x6e\x5f\157\160\164\x69\x6f\x6e")) {
            goto W7;
        }
        if (self::mo_check_option_admin_referer("\x6d\157\x5f\x73\141\155\x6c\x5f\146\157\x72\x63\x65\137\141\x75\x74\x68\145\x6e\164\151\x63\x61\x74\x69\x6f\156\137\157\160\164\x69\157\156")) {
            goto t7;
        }
        if (self::mo_check_option_admin_referer("\155\157\137\x73\141\155\154\137\145\156\x61\x62\x6c\145\137\162\163\163\x5f\141\x63\x63\x65\163\x73\137\x6f\x70\x74\x69\x6f\x6e")) {
            goto g3;
        }
        if (self::mo_check_option_admin_referer("\155\x6f\137\163\x61\x6d\x6c\x5f\x65\156\x61\142\x6c\145\x5f\154\x6f\147\x69\156\x5f\x72\x65\144\x69\x72\x65\143\164\x5f\157\x70\164\151\x6f\x6e")) {
            goto nm;
        }
        if (self::mo_check_option_admin_referer("\155\157\x5f\x73\x61\x6d\x6c\137\x61\144\x64\137\163\x73\x6f\137\142\x75\x74\x74\x6f\156\x5f\x77\160\137\157\160\164\x69\x6f\x6e")) {
            goto bF;
        }
        if (self::mo_check_option_admin_referer("\x6d\157\137\x73\141\155\154\x5f\165\163\145\137\x62\x75\164\164\x6f\156\137\x61\x73\x5f\x73\x68\x6f\162\x74\143\157\144\x65\137\x6f\160\x74\151\x6f\156")) {
            goto NN;
        }
        if (self::mo_check_option_admin_referer("\x6d\157\x5f\163\x61\155\x6c\137\x75\163\x65\x5f\142\x75\164\164\157\x6e\137\x61\x73\137\167\x69\x64\x67\145\164\137\157\x70\x74\151\x6f\156")) {
            goto sP;
        }
        if (self::mo_check_option_admin_referer("\155\x6f\137\x73\141\155\x6c\x5f\x61\154\x6c\157\167\137\x77\160\x5f\x73\151\147\x6e\151\x6e\x5f\x6f\160\164\151\157\x6e")) {
            goto fD;
        }
        if (self::mo_check_option_admin_referer("\155\157\137\x73\141\x6d\x6c\x5f\x63\x75\x73\164\x6f\x6d\137\x62\x75\x74\164\157\156\x5f\157\x70\164\x69\x6f\156")) {
            goto eF;
        }
        if (self::mo_check_option_admin_referer("\155\157\x5f\x73\141\x6d\x6c\137\x66\x6f\x72\147\x6f\164\137\x70\x61\163\163\x77\x6f\162\x64\x5f\x66\157\162\155\x5f\157\x70\x74\x69\x6f\x6e")) {
            goto o2;
        }
        if (self::mo_check_option_admin_referer("\155\x6f\137\x73\x61\155\154\x5f\166\x65\162\151\146\x79\137\x6c\x69\x63\145\156\x73\145")) {
            goto Oz;
        }
        if (self::mo_check_option_admin_referer("\x6d\x6f\x5f\x73\x61\155\x6c\137\143\x68\x65\143\153\x5f\x6c\x69\x63\x65\x6e\x73\x65")) {
            goto xy;
        }
        if (!self::mo_check_option_admin_referer("\155\x6f\137\163\141\x6d\x6c\x5f\162\x65\x6d\157\x76\x65\x5f\141\x63\143\157\165\x6e\x74")) {
            goto gL;
        }
        $this->mo_sso_saml_deactivate();
        add_option("\x6d\157\137\x73\x61\x6d\154\x5f\162\145\147\x69\x73\x74\162\141\x74\151\157\156\x5f\163\x74\x61\164\165\x73", "\x72\x65\x6d\157\x76\145\x64\x5f\141\x63\x63\x6f\x75\x6e\164");
        $GV = add_query_arg(array("\164\x61\142" => "\x6c\157\x67\151\x6e"), $_SERVER["\122\x45\121\125\105\x53\124\x5f\125\x52\111"]);
        header("\x4c\x6f\143\141\x74\151\x6f\x6e\72\40" . $GV);
        gL:
        goto ig;
        xy:
        LicenseHelper::migrateExistingEnvironments();
        $h1 = new Customersaml();
        $U6 = get_option("\155\157\x5f\x73\141\155\154\137\143\165\163\x74\x6f\155\x65\x72\x5f\x74\x6f\x6b\x65\156");
        $e1 = AESEncryption::decrypt_data(get_option("\163\x6d\154\x5f\154\x6b"), $U6);
        $J7 = "\x59\x6f\x75\40\x68\x61\x76\145\40\x73\x75\x63\143\x65\x73\x73\146\x75\x6c\154\x79\40\165\160\x67\x72\141\144\x65\144\40\171\x6f\165\x72\40\154\x69\143\145\x6e\163\x65\56";
        $this->djkasjdksaduwaj($e1, $h1, $J7);
        ig:
        goto iz;
        Oz:
        if (!$this->mo_saml_check_empty_or_null($_POST["\x73\x61\x6d\154\137\x6c\151\x63\x65\156\143\145\x5f\x6b\145\171"])) {
            goto GK;
        }
        update_option("\x6d\x6f\x5f\163\x61\x6d\154\137\155\x65\x73\x73\x61\x67\x65", "\101\x6c\154\40\164\x68\x65\40\146\151\145\x6c\x64\163\40\x61\162\x65\40\x72\x65\161\x75\151\162\145\144\56\x20\x50\154\x65\x61\163\145\40\145\156\x74\x65\162\40\166\x61\x6c\x69\144\x20\x6c\151\143\x65\x6e\x73\145\x20\x6b\145\171\x2e");
        $this->mo_saml_show_error_message();
        return;
        GK:
        $e1 = htmlspecialchars(trim($_POST["\163\x61\155\154\x5f\154\x69\143\145\156\x63\145\137\153\x65\171"]));
        $h1 = new Customersaml();
        $J7 = "\131\157\165\x72\40\x6c\151\x63\145\156\x73\x65\x20\151\x73\40\166\145\x72\x69\146\151\145\144\56\40\131\157\165\40\x63\x61\156\40\156\157\x77\x20\163\x65\x74\x75\160\x20\164\x68\x65\40\160\x6c\165\x67\x69\156\x2e";
        $this->djkasjdksaduwaj($e1, $h1, $J7);
        iz:
        goto yp;
        o2:
        if (mo_saml_is_extension_installed("\143\165\x72\154")) {
            goto C2;
        }
        update_option("\155\157\x5f\x73\141\155\x6c\x5f\x6d\x65\163\x73\x61\147\145", "\105\x52\122\x4f\x52\72\40\120\x48\x50\40\143\125\122\114\x20\x65\170\x74\x65\x6e\163\x69\x6f\156\40\x69\163\40\x6e\157\x74\40\x69\x6e\163\164\141\x6c\x6c\x65\144\x20\157\162\x20\x64\151\x73\141\142\x6c\x65\x64\56\40\122\x65\163\x65\x6e\x64\40\x4f\x54\x50\x20\x66\x61\151\154\145\x64\x2e");
        $this->mo_saml_show_error_message();
        return;
        C2:
        $r6 = get_option("\x6d\x6f\137\x73\141\x6d\x6c\x5f\141\x64\x6d\x69\x6e\x5f\145\x6d\141\x69\154");
        $h1 = new Customersaml();
        $Rs = $h1->mo_saml_forgot_password($r6);
        if ($Rs) {
            goto Il;
        }
        return;
        Il:
        $Rs = json_decode($Rs, true);
        if (strcasecmp($Rs["\x73\x74\x61\x74\165\x73"], "\x53\x55\x43\103\x45\123\123") == 0) {
            goto lS;
        }
        update_option("\x6d\x6f\x5f\x73\141\155\154\137\x6d\145\x73\x73\x61\147\145", "\101\156\40\x65\x72\x72\157\162\40\x6f\143\x63\x75\162\x65\x64\x20\x77\x68\x69\154\145\40\x70\x72\157\143\145\163\163\x69\x6e\x67\x20\171\157\165\162\40\162\145\161\165\x65\163\x74\x2e\40\120\x6c\x65\141\163\145\x20\124\162\x79\40\x61\x67\141\x69\156\56");
        $this->mo_saml_show_error_message();
        goto Ia;
        lS:
        update_option("\155\x6f\137\163\x61\x6d\154\137\x6d\145\x73\x73\141\x67\145", "\x59\157\165\x72\x20\x70\x61\x73\163\x77\x6f\162\144\x20\x68\141\x73\x20\x62\x65\x65\x6e\x20\x72\145\x73\x65\164\x20\x73\x75\143\x63\145\163\x73\146\165\x6c\x6c\171\x2e\40\120\154\x65\x61\x73\x65\x20\145\x6e\x74\x65\x72\40\164\150\x65\x20\x6e\x65\167\40\160\x61\x73\x73\x77\x6f\162\x64\40\163\145\156\164\x20\164\157\40" . $r6 . "\x2e");
        $this->mo_saml_show_success_message();
        Ia:
        yp:
        goto C8;
        eF:
        $O5 = '';
        $Vx = '';
        $bv = '';
        $fL = '';
        $hX = '';
        $PV = '';
        $LS = '';
        $Uu = '';
        $tm = '';
        $SL = '';
        $gi = "\x61\142\x6f\166\145";
        if (!(array_key_exists("\155\x6f\137\163\x61\155\x6c\137\142\x75\x74\x74\157\x6e\x5f\163\x69\x7a\145", $_POST) && !empty($_POST["\x6d\x6f\x5f\x73\x61\x6d\154\137\142\x75\x74\x74\x6f\x6e\x5f\x73\151\x7a\x65"]))) {
            goto me;
        }
        $bv = htmlspecialchars($_POST["\x6d\x6f\137\x73\x61\x6d\154\x5f\x62\x75\x74\x74\157\156\x5f\x73\151\x7a\145"]);
        me:
        if (!(array_key_exists("\155\x6f\x5f\163\x61\155\x6c\x5f\x62\x75\x74\164\x6f\156\x5f\167\151\x64\164\x68", $_POST) && !empty($_POST["\x6d\x6f\x5f\163\141\155\x6c\x5f\x62\x75\x74\x74\157\x6e\x5f\x77\151\144\x74\150"]))) {
            goto hb;
        }
        $fL = htmlspecialchars($_POST["\155\x6f\x5f\x73\x61\x6d\154\137\x62\x75\164\x74\x6f\x6e\x5f\x77\151\x64\164\x68"]);
        hb:
        if (!(array_key_exists("\x6d\157\x5f\163\141\x6d\154\137\142\165\x74\x74\x6f\x6e\x5f\x68\145\x69\x67\x68\164", $_POST) && !empty($_POST["\155\x6f\137\x73\141\x6d\154\137\142\x75\x74\x74\x6f\x6e\x5f\x68\145\x69\x67\x68\x74"]))) {
            goto J5;
        }
        $hX = htmlspecialchars($_POST["\x6d\x6f\x5f\x73\141\x6d\154\x5f\x62\165\x74\x74\x6f\156\x5f\x68\x65\x69\x67\x68\164"]);
        J5:
        if (!(array_key_exists("\155\x6f\x5f\x73\141\x6d\154\x5f\x62\x75\164\x74\157\156\137\x63\165\162\166\145", $_POST) && !empty($_POST["\155\x6f\137\x73\141\x6d\x6c\x5f\142\165\164\x74\157\156\137\143\165\162\x76\145"]))) {
            goto aW;
        }
        $PV = htmlspecialchars($_POST["\x6d\157\137\163\141\155\x6c\x5f\x62\x75\164\x74\157\156\137\x63\165\162\x76\x65"]);
        aW:
        if (!array_key_exists("\x6d\157\x5f\x73\x61\x6d\x6c\x5f\x62\165\164\164\x6f\156\x5f\x63\x6f\x6c\x6f\162", $_POST)) {
            goto FX;
        }
        $LS = htmlspecialchars($_POST["\x6d\157\137\x73\141\x6d\154\x5f\142\x75\164\164\x6f\x6e\137\x63\x6f\154\157\162"]);
        FX:
        if (!array_key_exists("\x6d\x6f\x5f\163\x61\x6d\x6c\x5f\142\x75\x74\164\x6f\x6e\137\x74\150\x65\x6d\x65", $_POST)) {
            goto nb;
        }
        $O5 = htmlspecialchars($_POST["\155\x6f\137\x73\x61\x6d\x6c\x5f\x62\x75\x74\164\x6f\156\x5f\x74\150\145\155\x65"]);
        nb:
        if (!array_key_exists("\x6d\x6f\x5f\x73\x61\x6d\154\137\142\x75\164\x74\157\156\137\x74\x65\x78\x74", $_POST)) {
            goto Zk;
        }
        $Uu = htmlspecialchars($_POST["\x6d\x6f\x5f\x73\x61\155\x6c\x5f\x62\x75\164\x74\157\156\137\x74\145\170\164"]);
        if (!(empty($Uu) || $Uu == "\114\157\x67\x69\x6e")) {
            goto mT;
        }
        $Uu = "\114\157\x67\x69\x6e";
        mT:
        $C1 = LicenseHelper::getCurrentOption(mo_options_enum_service_provider::Identity_name);
        $Uu = str_replace("\43\x23\111\104\120\43\x23", $C1, $Uu);
        Zk:
        if (!array_key_exists("\x6d\157\x5f\163\x61\155\x6c\137\146\157\156\x74\137\x63\157\154\x6f\x72", $_POST)) {
            goto l_;
        }
        $tm = htmlspecialchars($_POST["\x6d\157\x5f\x73\141\x6d\154\137\146\x6f\156\164\x5f\x63\157\x6c\x6f\x72"]);
        l_:
        if (!array_key_exists("\155\157\x5f\x73\141\x6d\154\137\146\x6f\x6e\x74\x5f\163\151\172\x65", $_POST)) {
            goto aP;
        }
        $SL = htmlspecialchars($_POST["\x6d\157\137\163\141\x6d\x6c\x5f\x66\x6f\x6e\164\137\x73\x69\172\145"]);
        aP:
        if (!array_key_exists("\163\163\x6f\137\142\165\x74\164\157\156\x5f\154\157\147\151\x6e\137\x66\x6f\x72\x6d\x5f\x70\x6f\x73\151\x74\x69\157\156", $_POST)) {
            goto O4;
        }
        $gi = htmlspecialchars($_POST["\x73\x73\x6f\137\x62\x75\164\164\x6f\156\137\x6c\x6f\147\x69\x6e\x5f\x66\157\x72\155\137\x70\157\163\x69\164\x69\x6f\x6e"]);
        O4:
        update_option("\155\x6f\x5f\x73\x61\x6d\x6c\x5f\142\x75\164\x74\x6f\156\x5f\x74\x68\145\155\145", $O5);
        update_option("\x6d\157\x5f\163\x61\x6d\x6c\137\x62\165\x74\164\157\156\137\163\151\x7a\x65", $bv);
        update_option("\155\157\137\163\141\x6d\x6c\137\x62\165\164\164\157\156\x5f\x77\x69\x64\164\x68", $fL);
        update_option("\x6d\x6f\137\x73\x61\155\x6c\137\x62\x75\164\x74\x6f\156\x5f\x68\x65\151\147\150\164", $hX);
        update_option("\155\157\137\163\x61\155\x6c\137\x62\x75\x74\x74\157\156\137\x63\x75\162\166\x65", $PV);
        update_option("\x6d\157\x5f\163\x61\155\x6c\137\142\x75\164\164\157\156\x5f\x63\157\154\x6f\162", $LS);
        update_option("\155\x6f\x5f\x73\141\x6d\154\x5f\142\165\164\x74\x6f\156\137\164\145\x78\x74", $Uu);
        update_option("\x6d\x6f\137\163\x61\x6d\x6c\x5f\x66\x6f\x6e\x74\x5f\x63\x6f\x6c\x6f\x72", $tm);
        update_option("\155\157\x5f\163\141\x6d\x6c\137\x66\x6f\x6e\x74\x5f\163\151\172\145", $SL);
        update_option("\x73\x73\157\137\142\165\164\164\157\x6e\x5f\x6c\x6f\x67\151\156\x5f\146\x6f\x72\x6d\x5f\x70\157\x73\151\x74\x69\157\x6e", $gi);
        update_option("\x6d\157\x5f\163\x61\155\x6c\137\155\x65\x73\x73\x61\x67\x65", "\123\151\147\156\x20\x49\156\40\x73\145\164\x74\x69\x6e\147\x73\x20\x75\x70\x64\x61\164\145\144\56");
        $this->mo_saml_show_success_message();
        C8:
        goto be;
        fD:
        $FD = "\146\x61\x6c\163\145";
        if (array_key_exists("\155\157\137\163\x61\x6d\x6c\x5f\141\154\x6c\x6f\x77\137\x77\x70\x5f\x73\x69\147\156\151\x6e", $_POST)) {
            goto xP;
        }
        $tY = "\146\x61\154\163\145";
        goto Nz;
        xP:
        $tY = htmlspecialchars($_POST["\x6d\157\x5f\163\x61\x6d\x6c\x5f\141\154\x6c\x6f\x77\x5f\x77\160\x5f\x73\x69\x67\156\151\156"]);
        Nz:
        if ($tY == "\x74\162\x75\x65") {
            goto AD;
        }
        update_option("\155\157\137\163\141\155\154\x5f\x61\154\154\157\x77\x5f\x77\160\x5f\163\151\147\x6e\x69\x6e", '');
        goto bp;
        AD:
        update_option("\155\x6f\x5f\x73\x61\155\x6c\x5f\141\154\154\x6f\x77\x5f\x77\x70\137\163\151\147\156\x69\x6e", "\x74\162\165\x65");
        if (!array_key_exists("\155\157\137\x73\x61\155\154\137\142\x61\x63\x6b\x64\157\x6f\x72\x5f\165\x72\x6c", $_POST)) {
            goto tp;
        }
        $FD = htmlspecialchars(trim($_POST["\x6d\x6f\x5f\163\x61\155\154\137\142\x61\x63\153\144\x6f\x6f\x72\137\165\x72\x6c"]));
        tp:
        bp:
        update_option("\x6d\157\137\x73\x61\155\x6c\137\142\x61\x63\153\x64\157\157\x72\137\x75\x72\x6c", $FD);
        update_option("\x6d\157\x5f\x73\141\x6d\x6c\137\155\145\x73\x73\141\147\x65", "\x53\x69\147\156\x20\111\x6e\40\x73\x65\164\x74\151\x6e\147\x73\40\x75\160\x64\x61\164\145\x64\x2e");
        $this->mo_saml_show_success_message();
        be:
        goto sD;
        sP:
        if (mo_saml_is_sp_configured()) {
            goto Qc;
        }
        update_option("\x6d\157\137\163\141\155\x6c\x5f\x6d\x65\163\163\x61\147\x65", "\120\154\145\x61\x73\145\x20\x63\157\155\160\x6c\x65\x74\145\x20" . addLink("\123\x65\x72\166\x69\x63\x65\40\120\162\157\x76\151\144\x65\162", add_query_arg(array("\x74\x61\142" => "\163\x61\x76\145"), $_SERVER["\122\x45\x51\x55\x45\123\124\x5f\125\x52\111"])) . "\40\x63\x6f\156\x66\151\x67\165\162\x61\x74\151\x6f\x6e\x20\146\151\162\163\164\x2e");
        $this->mo_saml_show_error_message();
        goto Px;
        Qc:
        if (array_key_exists("\155\157\137\163\x61\x6d\x6c\x5f\165\x73\145\x5f\x62\165\x74\x74\157\x6e\137\141\163\x5f\167\151\144\147\145\164", $_POST)) {
            goto LI;
        }
        $Ji = "\x66\141\x6c\163\x65";
        goto pp;
        LI:
        $Ji = htmlspecialchars($_POST["\155\157\137\x73\x61\155\x6c\137\165\163\145\137\142\x75\x74\164\157\x6e\x5f\x61\x73\x5f\x77\x69\x64\x67\x65\164"]);
        pp:
        update_option("\155\x6f\x5f\x73\141\x6d\154\137\165\163\145\x5f\x62\x75\164\x74\x6f\156\x5f\x61\163\x5f\x77\x69\144\x67\x65\x74", $Ji);
        update_option("\x6d\157\137\163\141\x6d\154\x5f\155\145\x73\163\141\x67\145", "\123\x69\x67\x6e\40\x69\156\x20\x6f\160\164\151\157\x6e\163\40\x75\x70\144\141\x74\145\x64\56");
        $this->mo_saml_show_success_message();
        Px:
        sD:
        goto pE;
        NN:
        if (mo_saml_is_sp_configured()) {
            goto su;
        }
        update_option("\155\157\137\x73\141\155\154\x5f\155\145\x73\x73\141\147\x65", "\120\154\145\x61\x73\145\x20\143\157\x6d\x70\154\x65\164\145\x20" . addLink("\123\145\162\x76\151\x63\x65\x20\x50\x72\x6f\x76\x69\x64\x65\162", add_query_arg(array("\164\x61\x62" => "\x73\x61\x76\x65"), $_SERVER["\x52\x45\121\125\105\123\124\x5f\x55\122\111"])) . "\40\x63\157\156\146\x69\147\165\162\x61\x74\151\157\156\40\x66\151\162\163\164\56");
        $this->mo_saml_show_error_message();
        goto RB;
        su:
        if (array_key_exists("\155\157\x5f\x73\x61\x6d\154\x5f\165\163\x65\x5f\142\x75\x74\x74\157\156\137\x61\163\137\163\x68\157\x72\x74\143\x6f\x64\145", $_POST)) {
            goto Bt;
        }
        $Ji = "\x66\141\x6c\x73\x65";
        goto GL;
        Bt:
        $Ji = htmlspecialchars($_POST["\155\x6f\x5f\x73\x61\x6d\x6c\137\x75\163\x65\137\x62\165\164\x74\157\x6e\137\x61\163\x5f\x73\x68\x6f\162\164\x63\x6f\144\145"]);
        GL:
        update_option("\155\x6f\x5f\x73\x61\155\154\x5f\x75\163\145\137\x62\x75\x74\x74\x6f\x6e\x5f\x61\x73\137\x73\x68\157\x72\164\143\x6f\144\145", $Ji);
        update_option("\155\157\137\x73\x61\155\154\x5f\155\145\163\163\x61\x67\x65", "\123\151\x67\156\x20\x69\x6e\x20\157\160\x74\x69\x6f\x6e\163\40\165\x70\144\x61\164\x65\x64\x2e");
        $this->mo_saml_show_success_message();
        RB:
        pE:
        goto Am;
        bF:
        if (mo_saml_is_sp_configured()) {
            goto Zc;
        }
        update_option("\x6d\x6f\x5f\163\x61\x6d\154\x5f\x6d\x65\163\x73\x61\x67\145", "\120\154\145\141\163\145\40\143\x6f\x6d\160\x6c\x65\164\145\x20" . addLink("\x53\145\162\166\x69\143\145\40\120\162\x6f\x76\x69\x64\x65\x72", add_query_arg(array("\x74\x61\x62" => "\x73\141\166\x65"), $_SERVER["\122\x45\x51\125\105\123\124\x5f\x55\122\x49"])) . "\40\143\157\x6e\146\151\147\x75\x72\141\164\x69\x6f\x6e\40\x66\x69\162\163\x74\x2e");
        $this->mo_saml_show_error_message();
        goto Uv;
        Zc:
        if (array_key_exists("\x6d\157\137\163\141\x6d\x6c\x5f\141\144\x64\x5f\163\x73\157\137\142\x75\164\x74\157\156\x5f\167\160", $_POST)) {
            goto rp;
        }
        $MZ = "\146\141\x6c\163\145";
        goto Pp;
        rp:
        $MZ = htmlspecialchars($_POST["\x6d\x6f\137\163\141\x6d\154\x5f\x61\x64\x64\x5f\163\163\x6f\x5f\x62\165\x74\164\157\156\x5f\167\160"]);
        Pp:
        update_option("\155\157\137\163\141\x6d\x6c\x5f\x61\x64\x64\x5f\x73\x73\x6f\137\x62\x75\x74\x74\x6f\156\137\x77\x70", $MZ);
        update_option("\x6d\157\x5f\x73\141\155\x6c\137\x6d\x65\163\x73\141\x67\145", "\x53\x69\x67\156\40\x69\x6e\40\157\160\164\151\x6f\156\163\40\165\x70\x64\x61\164\x65\x64\x2e");
        $this->mo_saml_show_success_message();
        Uv:
        Am:
        goto Qo;
        nm:
        if (mo_saml_is_sp_configured()) {
            goto Ii;
        }
        update_option("\x6d\x6f\137\x73\x61\155\x6c\x5f\x6d\145\x73\x73\x61\147\145", "\120\154\x65\x61\163\x65\40\143\x6f\x6d\x70\154\145\x74\x65\40" . addLink("\x53\145\x72\166\x69\143\x65\40\x50\x72\x6f\166\151\x64\145\162", add_query_arg(array("\x74\x61\x62" => "\x73\141\x76\x65"), $_SERVER["\x52\105\121\125\105\123\x54\137\x55\x52\111"])) . "\40\143\x6f\x6e\146\x69\147\165\162\x61\164\151\x6f\x6e\x20\146\x69\162\x73\164\56");
        $this->mo_saml_show_error_message();
        goto vZ;
        Ii:
        if (array_key_exists("\x6d\x6f\137\163\141\155\x6c\137\x65\x6e\x61\x62\x6c\145\x5f\x6c\157\147\x69\156\x5f\x72\145\144\x69\x72\145\143\164", $_POST)) {
            goto p6;
        }
        $lR = "\146\x61\x6c\x73\x65";
        goto FG;
        p6:
        $lR = htmlspecialchars($_POST["\x6d\x6f\x5f\163\x61\x6d\x6c\137\145\156\x61\x62\x6c\x65\x5f\154\x6f\x67\151\156\137\x72\145\x64\x69\162\x65\x63\x74"]);
        FG:
        if ($lR == "\164\x72\x75\145") {
            goto qP;
        }
        update_option("\x6d\x6f\x5f\163\x61\155\154\137\145\156\141\142\154\145\x5f\154\157\147\151\156\x5f\162\145\x64\151\162\145\x63\x74", '');
        update_option("\x6d\x6f\x5f\163\x61\155\154\x5f\x61\x6c\154\x6f\167\137\x77\160\x5f\163\x69\x67\x6e\151\x6e", '');
        goto Cw;
        qP:
        update_option("\x6d\157\x5f\163\x61\155\154\137\x65\156\x61\142\154\145\x5f\154\157\147\151\156\x5f\162\x65\x64\x69\162\145\x63\164", "\164\162\x75\x65");
        update_option("\x6d\x6f\137\x73\141\155\154\x5f\141\x6c\154\x6f\167\x5f\167\160\x5f\x73\151\x67\156\151\x6e", "\x74\x72\165\145");
        Cw:
        update_option("\155\157\137\163\141\155\154\137\x6d\x65\x73\163\141\x67\x65", "\123\x69\147\x6e\40\x69\156\40\157\x70\x74\151\157\156\x73\40\165\160\x64\x61\164\x65\144\56");
        $this->mo_saml_show_success_message();
        vZ:
        Qo:
        goto fS;
        g3:
        if (mo_saml_is_sp_configured()) {
            goto Bs;
        }
        update_option("\x6d\x6f\x5f\x73\x61\x6d\154\137\155\x65\x73\163\x61\x67\x65", "\120\154\x65\x61\163\x65\x20\143\157\x6d\x70\154\x65\x74\x65\x20" . addLink("\x53\145\x72\166\151\143\x65\40\x50\162\157\166\151\144\x65\162", add_query_arg(array("\x74\141\x62" => "\x73\141\166\145"), $_SERVER["\122\105\121\125\x45\123\x54\x5f\125\x52\x49"])) . "\x20\x63\x6f\156\x66\x69\x67\x75\x72\141\164\151\157\156\40\146\x69\162\x73\x74\x2e");
        $this->mo_saml_show_error_message();
        goto kJ;
        Bs:
        if (array_key_exists("\155\x6f\x5f\x73\141\x6d\x6c\x5f\145\156\x61\x62\x6c\145\137\162\x73\163\x5f\141\x63\143\145\163\163", $_POST)) {
            goto X4;
        }
        $XU = false;
        goto id;
        X4:
        $XU = htmlspecialchars($_POST["\155\x6f\137\x73\141\x6d\x6c\x5f\x65\x6e\x61\142\154\x65\137\162\x73\x73\137\x61\143\x63\x65\163\x73"]);
        id:
        if ($XU == "\x74\162\x75\x65") {
            goto KI;
        }
        update_option("\x6d\x6f\x5f\163\x61\x6d\154\137\145\x6e\x61\x62\154\145\x5f\x72\163\163\137\141\143\143\x65\163\x73", '');
        goto bL;
        KI:
        update_option("\x6d\x6f\137\163\x61\155\154\137\145\156\x61\142\154\145\x5f\162\163\x73\137\141\143\x63\x65\x73\163", "\x74\162\165\145");
        bL:
        update_option("\155\157\137\x73\141\x6d\154\137\155\145\x73\x73\x61\x67\x65", "\x52\123\x53\x20\x46\145\145\x64\40\x6f\x70\164\x69\157\x6e\40\165\160\x64\x61\164\145\x64\x2e");
        $this->mo_saml_show_success_message();
        kJ:
        fS:
        goto tB;
        t7:
        if (mo_saml_is_sp_configured()) {
            goto ao;
        }
        update_option("\x6d\157\x5f\x73\141\155\x6c\137\x6d\x65\x73\x73\x61\x67\145", "\x50\154\145\141\x73\145\x20\143\157\x6d\160\154\x65\x74\x65\40" . addLink("\x53\x65\162\x76\151\x63\x65\40\x50\x72\x6f\x76\x69\144\145\x72", add_query_arg(array("\x74\141\x62" => "\x73\141\166\145"), $_SERVER["\122\105\121\x55\x45\123\x54\137\125\x52\x49"])) . "\40\x63\157\156\x66\x69\147\165\x72\x61\x74\151\157\x6e\40\146\151\162\163\x74\x2e");
        $this->mo_saml_show_error_message();
        goto dM;
        ao:
        if (array_key_exists("\155\x6f\x5f\x73\x61\155\154\x5f\146\x6f\x72\x63\145\137\x61\x75\x74\150\x65\x6e\164\x69\143\141\164\151\157\156", $_POST)) {
            goto wK;
        }
        $lR = "\x66\x61\154\x73\145";
        goto Pn;
        wK:
        $lR = htmlspecialchars($_POST["\155\x6f\137\163\141\x6d\x6c\x5f\146\x6f\x72\143\x65\x5f\141\165\164\x68\x65\156\x74\151\143\141\164\x69\x6f\156"]);
        Pn:
        if ($lR == "\x74\x72\165\145") {
            goto zQ;
        }
        update_option("\155\x6f\x5f\x73\x61\155\x6c\x5f\x66\157\x72\143\x65\137\x61\165\164\x68\x65\x6e\x74\x69\143\x61\164\x69\157\x6e", '');
        goto fT;
        zQ:
        update_option("\155\x6f\x5f\163\x61\155\x6c\x5f\x66\x6f\162\143\x65\137\x61\165\164\150\x65\x6e\x74\151\143\x61\164\x69\157\x6e", "\164\x72\165\x65");
        fT:
        update_option("\155\157\x5f\163\141\155\x6c\137\x6d\x65\x73\x73\x61\147\x65", "\123\151\x67\x6e\x20\x69\156\x20\x6f\160\164\x69\x6f\x6e\163\x20\165\160\144\141\x74\145\x64\x2e");
        $this->mo_saml_show_success_message();
        dM:
        tB:
        goto u5;
        W7:
        if (!mo_saml_is_sp_configured()) {
            goto i1;
        }
        if (array_key_exists("\x6d\157\x5f\x73\x61\155\x6c\137\x72\145\144\x69\162\x65\143\x74\137\x74\157\x5f\167\160\x5f\154\x6f\x67\x69\x6e", $_POST)) {
            goto ib;
        }
        $XI = "\146\x61\154\x73\x65";
        goto Co;
        ib:
        $XI = htmlspecialchars($_POST["\155\157\x5f\x73\x61\155\x6c\x5f\x72\x65\x64\x69\x72\x65\143\x74\x5f\x74\x6f\x5f\167\160\137\154\157\147\x69\x6e"]);
        Co:
        update_option("\x6d\157\x5f\163\141\155\x6c\137\162\x65\144\151\162\145\x63\x74\x5f\x74\157\137\x77\x70\137\154\x6f\x67\151\x6e", $XI);
        update_option("\155\x6f\137\163\x61\x6d\x6c\137\155\145\x73\163\x61\147\145", "\x53\x69\147\156\x20\151\x6e\x20\157\160\164\x69\157\156\163\40\x75\x70\144\x61\164\x65\144\56");
        $this->mo_saml_show_success_message();
        i1:
        u5:
        goto d6;
        XM:
        if (mo_saml_is_sp_configured()) {
            goto Nn;
        }
        update_option("\x6d\x6f\x5f\x73\141\155\x6c\x5f\155\145\x73\x73\141\147\x65", "\120\x6c\x65\141\163\x65\40\143\157\155\x70\154\145\164\145\40" . addLink("\123\x65\x72\166\x69\x63\145\x20\120\x72\x6f\x76\x69\x64\x65\162", add_query_arg(array("\x74\x61\x62" => "\x73\x61\166\x65"), $_SERVER["\x52\x45\121\x55\x45\x53\124\137\125\122\111"])) . "\x20\143\157\x6e\x66\x69\147\165\x72\141\x74\x69\157\x6e\x20\x66\151\162\x73\x74\56");
        $this->mo_saml_show_error_message();
        goto TT;
        Nn:
        if (array_key_exists("\x6d\x6f\137\x73\141\155\x6c\137\162\145\147\151\x73\x74\145\x72\145\144\x5f\x6f\156\154\x79\137\141\x63\x63\145\x73\163", $_POST)) {
            goto xT;
        }
        $lR = "\x66\x61\x6c\x73\145";
        goto jD;
        xT:
        $lR = htmlspecialchars($_POST["\155\157\x5f\x73\x61\155\x6c\x5f\162\x65\x67\151\163\x74\x65\x72\145\144\x5f\157\x6e\x6c\x79\x5f\x61\x63\143\x65\163\163"]);
        jD:
        if ($lR == "\164\x72\165\x65") {
            goto wO;
        }
        update_option("\x6d\x6f\x5f\x73\141\155\154\x5f\x72\x65\147\x69\x73\164\x65\x72\145\x64\x5f\x6f\156\154\171\x5f\x61\x63\143\x65\163\163", '');
        goto U_;
        wO:
        update_option("\155\157\137\x73\141\155\x6c\x5f\162\x65\x67\151\163\164\145\x72\145\144\x5f\x6f\156\x6c\x79\137\x61\x63\x63\145\163\x73", "\x74\162\x75\x65");
        U_:
        update_option("\x6d\157\x5f\163\x61\155\154\137\155\x65\x73\x73\141\147\x65", "\123\151\147\156\40\x69\156\40\x6f\x70\164\x69\157\x6e\163\40\165\x70\144\x61\164\145\144\x2e");
        $this->mo_saml_show_success_message();
        TT:
        d6:
        goto mc;
        U9:
        if (mo_saml_is_extension_installed("\143\165\162\x6c")) {
            goto hZ;
        }
        update_option("\155\x6f\137\x73\141\155\x6c\137\155\145\163\163\141\x67\x65", "\105\122\x52\x4f\122\72\40\120\x48\x50\40\143\x55\122\x4c\x20\x65\x78\164\145\156\163\151\157\x6e\x20\x69\x73\x20\156\x6f\164\40\x69\x6e\x73\164\x61\154\154\x65\144\40\157\x72\40\x64\x69\163\141\142\x6c\145\x64\56\40\122\x65\163\x65\x6e\x64\40\x4f\x54\x50\40\x66\x61\x69\154\x65\x64\56");
        $this->mo_saml_show_error_message();
        return;
        hZ:
        $zo = htmlspecialchars($_POST["\x70\x68\157\x6e\x65"]);
        $zo = str_replace("\x20", '', $zo);
        $zo = str_replace("\55", '', $zo);
        update_option("\x6d\x6f\137\163\x61\x6d\x6c\x5f\141\x64\155\151\x6e\x5f\160\x68\x6f\x6e\145", $zo);
        $h1 = new CustomerSaml();
        $Rs = $h1->send_otp_token('', $zo, FALSE, TRUE);
        if ($Rs) {
            goto a7;
        }
        return;
        a7:
        $Rs = json_decode($Rs, true);
        if (strcasecmp($Rs["\163\x74\141\164\x75\x73"], "\x53\125\103\x43\105\x53\123") == 0) {
            goto ah;
        }
        update_option("\155\157\137\163\x61\x6d\154\x5f\x6d\145\x73\163\x61\x67\x65", "\124\150\145\x72\145\40\167\141\163\x20\x61\x6e\x20\x65\x72\x72\157\162\x20\x69\x6e\40\x73\x65\x6e\x64\x69\x6e\147\x20\123\x4d\123\56\x20\120\154\x65\141\163\145\x20\x63\154\151\x63\153\x20\x6f\156\40\x52\x65\x73\145\x6e\144\x20\117\124\120\40\x74\157\40\x74\x72\171\x20\141\x67\141\x69\156\x2e");
        update_option("\155\157\x5f\x73\x61\155\154\x5f\162\x65\x67\151\163\164\x72\141\164\x69\x6f\x6e\137\x73\164\x61\x74\165\163", "\115\x4f\137\117\x54\x50\x5f\104\x45\x4c\x49\x56\x45\122\105\104\137\x46\101\111\x4c\x55\x52\105\x5f\x50\110\117\x4e\105");
        $this->mo_saml_show_error_message();
        goto KQ;
        ah:
        update_option("\155\x6f\137\x73\141\155\154\x5f\155\145\163\x73\x61\147\145", "\x20\101\40\157\156\145\40\164\151\x6d\145\40\160\141\x73\163\x63\157\144\x65\x20\x69\163\40\x73\145\156\x74\x20\x74\157\40" . get_option("\x6d\157\x5f\x73\x61\155\154\x5f\x61\144\155\x69\x6e\137\160\150\x6f\156\145") . "\x2e\40\x50\154\x65\x61\163\145\x20\x65\x6e\x74\x65\x72\40\164\150\x65\40\x6f\x74\x70\x20\x68\145\x72\145\x20\164\157\40\166\145\x72\151\x66\171\x20\171\x6f\165\x72\x20\145\x6d\141\x69\154\x2e");
        update_option("\155\157\137\x73\x61\155\154\137\164\x72\141\x6e\163\141\x63\x74\151\x6f\x6e\111\x64", $Rs["\164\x78\x49\x64"]);
        update_option("\x6d\157\137\163\141\155\154\x5f\162\x65\x67\151\x73\x74\x72\141\x74\151\x6f\x6e\x5f\163\164\x61\164\165\163", "\x4d\x4f\137\117\124\120\137\x44\x45\x4c\x49\126\105\122\105\x44\137\123\x55\103\103\105\x53\x53\137\x50\x48\117\116\x45");
        $this->mo_saml_show_success_message();
        KQ:
        mc:
        goto T4;
        fQ:
        update_option("\155\157\x5f\x73\141\155\154\137\x72\x65\x67\x69\x73\x74\162\141\164\151\157\x6e\x5f\x73\x74\141\164\165\x73", '');
        update_option("\x6d\157\137\163\x61\155\154\137\x76\145\162\x69\x66\171\137\143\x75\x73\x74\157\155\x65\x72", '');
        delete_option("\x6d\157\137\163\141\155\154\x5f\x6e\x65\167\x5f\162\145\147\x69\x73\x74\162\x61\x74\x69\x6f\x6e");
        delete_option("\155\x6f\137\x73\x61\155\x6c\137\141\x64\x6d\x69\x6e\137\x65\155\141\151\x6c");
        delete_option("\x6d\x6f\x5f\x73\141\155\x6c\x5f\x61\x64\155\x69\156\137\x70\x68\x6f\x6e\145");
        delete_site_option("\x73\155\154\x5f\154\153");
        delete_site_option("\164\137\163\x69\164\145\x5f\163\x74\141\164\x75\x73");
        delete_site_option("\x73\151\164\x65\x5f\143\153\137\154");
        T4:
        goto Jv;
        qm:
        if (mo_saml_is_extension_installed("\143\x75\x72\154")) {
            goto yZ;
        }
        update_option("\x6d\157\137\163\x61\x6d\154\x5f\155\145\x73\163\x61\x67\x65", "\x45\122\x52\x4f\122\x3a\x20\x50\x48\x50\40\143\x55\x52\x4c\x20\x65\170\x74\145\156\x73\151\x6f\x6e\x20\151\163\40\x6e\x6f\x74\40\151\156\163\x74\x61\x6c\x6c\145\144\x20\157\x72\x20\144\151\163\x61\142\154\x65\144\56\x20\122\145\x73\145\156\144\x20\117\x54\120\x20\146\x61\151\x6c\x65\x64\56");
        $this->mo_saml_show_error_message();
        return;
        yZ:
        $zo = get_option("\x6d\157\137\x73\x61\x6d\x6c\137\141\x64\155\x69\x6e\137\160\x68\x6f\156\x65");
        $h1 = new CustomerSaml();
        $Rs = $h1->send_otp_token('', $zo, FALSE, TRUE);
        if ($Rs) {
            goto lX;
        }
        return;
        lX:
        $Rs = json_decode($Rs, true);
        if (strcasecmp($Rs["\163\x74\141\x74\165\163"], "\x53\125\x43\x43\x45\123\123") == 0) {
            goto Xb;
        }
        update_option("\155\x6f\x5f\x73\141\x6d\154\137\x6d\145\163\x73\x61\147\145", "\124\x68\x65\x72\x65\x20\x77\x61\163\40\x61\156\x20\x65\x72\x72\x6f\x72\x20\x69\x6e\x20\x73\x65\x6e\x64\x69\156\147\x20\145\x6d\141\x69\x6c\56\40\x50\154\x65\141\163\145\x20\143\154\x69\143\153\x20\x6f\156\x20\x52\145\x73\x65\x6e\x64\x20\117\x54\x50\x20\164\x6f\x20\164\162\171\x20\x61\x67\x61\151\x6e\x2e");
        update_option("\x6d\157\x5f\163\x61\x6d\x6c\137\162\145\147\x69\x73\164\162\141\x74\151\x6f\156\x5f\163\x74\141\164\x75\163", "\115\x4f\x5f\x4f\124\x50\x5f\104\x45\114\111\x56\x45\122\105\x44\x5f\106\101\111\x4c\125\x52\105\x5f\x50\110\117\116\105");
        $this->mo_saml_show_error_message();
        goto NX;
        Xb:
        update_option("\x6d\x6f\x5f\x73\141\x6d\x6c\137\155\145\x73\x73\141\x67\145", "\40\101\40\x6f\x6e\x65\40\x74\x69\x6d\x65\40\160\141\163\163\143\x6f\x64\145\40\x69\163\40\163\x65\x6e\164\40\164\x6f\40" . $zo . "\x20\141\147\141\x69\156\56\x20\x50\x6c\x65\141\163\145\x20\143\150\145\143\x6b\40\x69\x66\40\x79\x6f\x75\x20\147\x6f\164\40\x74\150\x65\40\x6f\164\160\x20\x61\156\144\40\145\156\164\145\162\40\x69\164\x20\x68\145\x72\145\x2e");
        update_option("\155\x6f\x5f\163\141\155\x6c\137\x74\162\141\x6e\x73\141\x63\164\x69\157\x6e\x49\x64", $Rs["\x74\170\x49\x64"]);
        update_option("\x6d\157\x5f\163\x61\x6d\x6c\x5f\162\145\147\151\163\x74\162\x61\x74\151\157\x6e\137\163\x74\x61\x74\165\163", "\x4d\117\137\x4f\124\x50\137\104\x45\114\111\126\x45\122\105\x44\x5f\x53\x55\x43\103\x45\x53\x53\137\120\x48\x4f\116\105");
        $this->mo_saml_show_success_message();
        NX:
        Jv:
        goto EG;
        ID:
        if (mo_saml_is_extension_installed("\143\165\x72\154")) {
            goto AQ;
        }
        update_option("\x6d\157\137\163\141\x6d\x6c\x5f\x6d\x65\x73\163\x61\147\145", "\105\x52\122\x4f\122\72\40\120\x48\120\40\x63\x55\122\x4c\40\145\x78\x74\x65\156\163\x69\x6f\156\40\151\x73\40\156\x6f\164\x20\x69\x6e\163\x74\141\x6c\154\x65\x64\40\157\162\x20\144\151\x73\141\x62\x6c\x65\x64\56\40\122\145\163\x65\156\x64\40\117\x54\120\x20\x66\x61\x69\154\x65\144\56");
        $this->mo_saml_show_error_message();
        return;
        AQ:
        $r6 = get_option("\x6d\x6f\137\163\141\x6d\x6c\x5f\141\144\155\x69\156\x5f\x65\155\141\151\154");
        $h1 = new CustomerSaml();
        $Rs = $h1->send_otp_token($r6, '');
        if ($Rs) {
            goto A9;
        }
        return;
        A9:
        $Rs = json_decode($Rs, true);
        if (strcasecmp($Rs["\163\164\x61\x74\x75\163"], "\123\125\x43\103\x45\123\x53") == 0) {
            goto bx;
        }
        update_option("\155\x6f\137\x73\141\155\154\137\155\145\163\x73\x61\147\x65", "\x54\150\145\x72\x65\40\x77\141\x73\40\x61\x6e\40\x65\x72\x72\x6f\x72\40\151\156\x20\163\145\156\x64\151\x6e\x67\40\x65\155\x61\151\154\x2e\40\120\154\145\x61\163\145\x20\143\x6c\x69\143\x6b\x20\x6f\x6e\x20\122\x65\x73\145\x6e\x64\40\117\124\x50\x20\164\157\40\164\x72\x79\40\x61\x67\141\151\156\x2e");
        update_option("\x6d\x6f\137\163\141\x6d\x6c\137\162\x65\x67\151\x73\x74\x72\141\164\x69\157\x6e\137\x73\164\141\164\x75\163", "\115\x4f\x5f\117\x54\x50\x5f\x44\x45\x4c\x49\x56\105\x52\105\104\x5f\x46\x41\111\x4c\x55\122\x45\137\105\x4d\x41\111\x4c");
        $this->mo_saml_show_error_message();
        goto OV;
        bx:
        update_option("\x6d\157\x5f\x73\x61\x6d\x6c\x5f\155\145\x73\x73\141\x67\145", "\x20\101\40\x6f\x6e\x65\x20\164\151\155\145\40\x70\141\163\x73\x63\157\144\145\x20\151\163\40\163\x65\156\164\x20\x74\x6f\40" . get_option("\155\157\x5f\163\x61\x6d\154\x5f\x61\x64\155\151\156\x5f\145\155\x61\151\x6c") . "\40\x61\147\141\151\156\56\x20\120\154\145\141\x73\145\x20\x63\150\x65\x63\153\40\x69\146\x20\x79\157\165\x20\x67\157\164\40\164\x68\x65\x20\157\x74\160\40\x61\156\x64\x20\145\x6e\164\145\x72\x20\x69\x74\x20\150\x65\162\145\56");
        update_option("\x6d\x6f\137\x73\141\x6d\x6c\137\164\x72\x61\x6e\x73\141\x63\164\151\157\156\111\x64", $Rs["\164\x78\x49\x64"]);
        update_option("\x6d\x6f\137\x73\141\155\154\x5f\162\145\x67\151\x73\164\x72\141\164\x69\157\156\137\x73\x74\141\164\165\163", "\x4d\x4f\137\x4f\124\x50\x5f\x44\x45\114\x49\x56\105\x52\x45\104\137\x53\x55\103\x43\105\x53\123\x5f\x45\x4d\x41\x49\x4c");
        $this->mo_saml_show_success_message();
        OV:
        EG:
        goto PK;
        qO:
        if (mo_saml_is_extension_installed("\143\165\x72\154")) {
            goto X5;
        }
        update_option("\x6d\157\137\x73\x61\x6d\154\x5f\x6d\145\x73\x73\x61\147\145", "\105\x52\x52\x4f\122\72\40\120\x48\x50\x20\143\x55\x52\114\40\x65\170\x74\x65\156\163\x69\x6f\156\40\x69\x73\x20\x6e\x6f\x74\x20\x69\156\163\x74\141\x6c\x6c\x65\144\x20\x6f\x72\40\144\x69\x73\141\142\x6c\145\144\56\40\x51\165\x65\162\x79\40\163\165\x62\x6d\x69\164\x20\x66\x61\x69\x6c\x65\x64\56");
        $this->mo_saml_show_error_message();
        return;
        X5:
        $r6 = sanitize_email($_POST["\155\157\x5f\x73\x61\x6d\x6c\137\143\x6f\156\x74\x61\143\x74\137\x75\x73\x5f\x65\x6d\141\x69\x6c"]);
        $zo = htmlspecialchars($_POST["\x6d\157\x5f\163\x61\x6d\154\x5f\x63\157\156\164\x61\143\164\x5f\165\x73\137\160\x68\157\x6e\145"]);
        $qX = htmlspecialchars($_POST["\155\157\137\x73\141\155\x6c\x5f\x63\157\156\x74\x61\x63\164\x5f\165\x73\137\x71\165\145\162\x79"]);
        if (array_key_exists("\x73\145\x6e\144\x5f\160\x6c\165\147\151\x6e\x5f\143\x6f\156\x66\151\x67", $_POST) === true) {
            goto y9;
        }
        update_option("\163\145\156\144\x5f\x70\154\x75\147\x69\x6e\x5f\143\x6f\x6e\x66\151\147", "\x6f\x66\146");
        goto Gw;
        y9:
        $G3 = miniorange_import_export(true, true);
        $qX .= $G3;
        delete_option("\163\x65\x6e\144\x5f\160\154\x75\x67\x69\x6e\x5f\x63\157\x6e\x66\x69\x67");
        Gw:
        $h1 = new CustomerSaml();
        if ($this->mo_saml_check_empty_or_null($r6) || $this->mo_saml_check_empty_or_null($qX)) {
            goto DR;
        }
        if (!filter_var($r6, FILTER_VALIDATE_EMAIL)) {
            goto FT;
        }
        $vM = $h1->submit_contact_us($r6, $zo, $qX);
        if ($vM) {
            goto Th;
        }
        return;
        Th:
        update_option("\x6d\157\x5f\163\141\155\154\137\155\x65\x73\x73\x61\x67\x65", "\x54\150\x61\156\x6b\163\40\x66\x6f\162\x20\147\145\x74\164\151\x6e\147\40\151\156\x20\x74\157\165\143\x68\41\x20\127\145\40\x73\x68\x61\154\154\40\147\x65\x74\x20\142\141\143\153\x20\164\157\x20\171\x6f\x75\x20\163\150\157\x72\x74\x6c\171\56");
        $this->mo_saml_show_success_message();
        goto Ry;
        FT:
        update_option("\x6d\x6f\137\x73\141\155\154\137\155\145\x73\163\x61\x67\x65", "\x50\154\x65\x61\x73\x65\x20\145\156\x74\x65\x72\40\x61\x20\x76\141\154\151\144\x20\145\155\141\x69\154\40\141\144\x64\162\x65\x73\x73\x2e");
        $this->mo_saml_show_error_message();
        return;
        Ry:
        goto K7;
        DR:
        update_option("\x6d\x6f\x5f\163\x61\155\x6c\137\x6d\x65\163\163\141\147\x65", "\x50\154\x65\141\163\x65\x20\x66\151\154\x6c\40\x75\x70\40\105\x6d\141\x69\x6c\x20\141\x6e\x64\x20\121\165\x65\x72\171\40\146\x69\x65\154\144\163\x20\164\157\x20\163\165\142\x6d\151\164\x20\171\x6f\165\162\x20\x71\165\x65\x72\171\56");
        $this->mo_saml_show_error_message();
        K7:
        PK:
        goto Cq;
        RN:
        if (mo_saml_is_extension_installed("\143\165\x72\154")) {
            goto TN;
        }
        update_option("\x6d\x6f\137\163\x61\155\154\x5f\x6d\145\x73\163\141\x67\x65", "\x45\x52\122\117\x52\72\x20\x50\110\x50\x20\x63\125\x52\114\40\x65\x78\164\x65\156\163\x69\x6f\156\x20\x69\x73\40\156\157\x74\x20\151\x6e\x73\x74\141\154\154\x65\x64\x20\157\x72\x20\x64\x69\x73\x61\x62\x6c\145\144\56\x20\114\157\147\151\x6e\40\146\141\x69\154\x65\x64\56");
        $this->mo_saml_show_error_message();
        return;
        TN:
        $r6 = '';
        $Ek = self::get_empty_strings();
        if ($this->mo_saml_check_empty_or_null($_POST["\145\x6d\141\x69\154"]) || $this->mo_saml_check_empty_or_null($_POST["\160\141\x73\x73\167\157\162\144"])) {
            goto s5;
        }
        if ($this->checkPasswordPattern(strip_tags($_POST["\160\141\163\163\x77\x6f\x72\144"]))) {
            goto km;
        }
        $r6 = sanitize_email($_POST["\x65\155\x61\151\x6c"]);
        $Ek = stripslashes(strip_tags($_POST["\x70\x61\163\163\167\x6f\x72\144"]));
        goto e6;
        km:
        update_option("\x6d\x6f\137\163\x61\155\x6c\x5f\x6d\145\x73\x73\141\x67\145", "\x4d\151\156\151\155\165\x6d\40\x36\40\143\150\141\162\141\x63\164\145\162\163\x20\163\150\157\x75\x6c\144\40\x62\x65\x20\x70\x72\145\163\x65\x6e\164\x2e\x20\x4d\x61\x78\151\x6d\165\155\40\x31\x35\40\143\x68\141\x72\141\x63\x74\x65\162\x73\x20\163\150\x6f\165\154\144\x20\142\x65\x20\160\162\x65\163\145\156\x74\x2e\x20\117\156\x6c\171\x20\x66\x6f\154\154\157\167\151\156\147\40\x73\171\155\x62\x6f\154\163\x20\50\x21\100\43\x2e\x24\x25\136\x26\52\55\x5f\51\x20\x73\x68\157\x75\154\144\40\142\x65\40\160\162\145\x73\x65\x6e\x74\x2e");
        $this->mo_saml_show_error_message();
        return;
        e6:
        goto OB;
        s5:
        update_option("\155\x6f\137\163\x61\x6d\x6c\x5f\155\145\x73\x73\141\x67\145", "\101\x6c\x6c\x20\x74\x68\x65\40\146\x69\x65\x6c\x64\163\40\x61\x72\x65\40\162\145\x71\165\151\162\145\x64\x2e\40\120\x6c\145\141\163\x65\40\145\156\164\x65\162\40\x76\141\x6c\151\144\x20\x65\x6e\x74\162\151\x65\163\x2e");
        $this->mo_saml_show_error_message();
        return;
        OB:
        update_option("\x6d\157\x5f\x73\141\155\154\137\141\x64\155\x69\156\x5f\145\155\x61\x69\x6c", $r6);
        update_option("\x6d\157\137\x73\141\155\154\x5f\141\144\x6d\151\x6e\137\160\141\x73\163\167\x6f\162\144", $Ek);
        $h1 = new Customersaml();
        $Rs = $h1->get_customer_key();
        if ($Rs) {
            goto Rp;
        }
        return;
        Rp:
        $I1 = json_decode($Rs, true);
        if (json_last_error() == JSON_ERROR_NONE) {
            goto Q2;
        }
        update_option("\x6d\x6f\x5f\x73\x61\x6d\154\137\x6d\145\163\163\141\x67\x65", "\x49\x6e\166\141\154\151\144\x20\x75\x73\145\162\156\141\155\x65\x20\157\162\40\x70\141\x73\163\167\157\162\144\56\40\x50\x6c\145\141\x73\x65\x20\164\x72\171\x20\x61\x67\x61\x69\x6e\x2e");
        $this->mo_saml_show_error_message();
        goto T7;
        Q2:
        update_option("\x6d\157\137\163\141\155\154\137\141\x64\x6d\x69\156\x5f\x63\x75\x73\164\x6f\155\145\162\137\153\x65\171", $I1["\x69\144"]);
        update_option("\x6d\x6f\137\163\141\155\x6c\137\141\144\x6d\x69\x6e\137\141\x70\151\137\153\145\171", $I1["\141\x70\151\x4b\x65\x79"]);
        update_option("\155\x6f\x5f\x73\x61\155\154\x5f\143\165\x73\x74\x6f\155\145\162\137\164\157\153\145\x6e", $I1["\164\157\x6b\145\156"]);
        if (empty($I1["\160\x68\157\x6e\145"])) {
            goto L1;
        }
        update_option("\155\157\137\x73\141\155\x6c\x5f\x61\144\x6d\151\156\137\x70\150\x6f\x6e\145", $I1["\x70\150\157\x6e\x65"]);
        L1:
        update_option("\x6d\x6f\137\163\x61\x6d\x6c\137\x61\x64\155\x69\x6e\137\160\141\x73\x73\167\x6f\162\144", '');
        update_option("\x6d\x6f\x5f\163\x61\x6d\154\x5f\155\x65\x73\163\141\x67\x65", "\103\x75\163\164\157\155\145\x72\40\162\x65\164\162\x69\145\x76\x65\144\40\x73\x75\143\x63\145\x73\x73\x66\165\x6c\x6c\x79");
        update_option("\155\157\x5f\163\141\x6d\x6c\x5f\x72\x65\147\x69\163\x74\162\x61\164\x69\157\156\137\163\x74\x61\164\165\163", "\x45\170\151\x73\164\151\156\147\40\x55\163\x65\162");
        delete_option("\155\157\137\x73\141\x6d\x6c\x5f\166\145\162\x69\x66\x79\137\143\x75\x73\164\x6f\x6d\x65\162");
        if (get_option("\163\155\x6c\x5f\154\153")) {
            goto p7;
        }
        $this->mo_saml_show_success_message();
        goto ke;
        p7:
        $U6 = get_option("\x6d\x6f\x5f\163\x61\155\x6c\137\143\165\x73\x74\x6f\155\145\x72\x5f\x74\x6f\153\x65\156");
        $e1 = AESEncryption::decrypt_data(get_option("\x73\x6d\154\x5f\x6c\x6b"), $U6);
        $Rs = json_decode($h1->mo_saml_vl($e1, false), true);
        update_option("\166\154\137\x63\150\145\x63\x6b\137\164", time());
        if (isset($Rs["\x69\163\124\162\151\x61\x6c"]) and !empty($Rs["\151\x73\x54\x72\151\141\154"])) {
            goto de;
        }
        update_option("\155\x6f\x5f\x73\141\x6d\x6c\137\x74\154\x61", false);
        goto QZ;
        de:
        update_option("\x6d\x6f\137\x73\x61\155\x6c\137\x74\154\x61", $Rs["\x69\x73\x54\x72\151\141\154"]);
        update_option("\x6d\157\137\x73\141\x6d\154\137\154\x69\x63\x65\x6e\163\145\x5f\145\x78\160\151\162\171\137\144\141\164\x65", $Rs["\x6c\151\143\x65\x6e\x73\145\105\x78\160\x69\162\171\104\x61\164\145"]);
        QZ:
        if (is_array($Rs) and strcasecmp($Rs["\163\x74\x61\x74\165\163"], "\x53\x55\x43\103\105\123\x53") == 0) {
            goto CI;
        }
        update_option("\155\x6f\137\163\x61\155\x6c\x5f\155\145\163\x73\x61\x67\x65", "\x4c\151\x63\x65\156\x73\145\x20\x6b\x65\x79\40\x66\157\162\40\x74\x68\x69\x73\40\151\x6e\163\x74\x61\156\143\x65\x20\151\x73\40\151\156\143\x6f\x72\x72\x65\143\x74\56\x20\x4d\141\153\x65\x20\x73\x75\x72\145\40\171\157\165\x20\150\x61\166\x65\40\x6e\x6f\x74\40\164\x61\155\x70\145\x72\x65\x64\40\167\x69\x74\x68\40\151\x74\x20\141\x74\40\x61\x6c\x6c\x2e\40\120\x6c\x65\141\x73\145\40\145\x6e\164\x65\162\40\x61\40\x76\x61\154\151\x64\40\x6c\x69\143\x65\x6e\x73\x65\x20\153\145\171\56");
        delete_option("\x73\x6d\154\137\x6c\x6b");
        $this->mo_saml_show_error_message();
        goto iJ;
        CI:
        if (!(isset($Rs["\154\x69\x63\145\x6e\x73\145\x45\170\160\151\x72\171\104\141\x74\x65"]) and !empty($Rs["\x6c\151\143\x65\x6e\x73\145\x45\170\160\x69\x72\x79\x44\x61\x74\145"]))) {
            goto gC;
        }
        update_option("\x6d\157\137\163\x61\x6d\x6c\x5f\x6c\x69\143\145\x6e\163\145\x5f\x65\x78\x70\151\x72\x79\137\144\x61\x74\x65", $Rs["\x6c\151\x63\x65\x6e\x73\145\105\x78\x70\151\162\171\104\141\164\145"]);
        gC:
        $hf = plugin_dir_path(__FILE__);
        $A7 = home_url();
        $A7 = trim($A7, "\57");
        if (preg_match("\43\136\x68\x74\x74\x70\50\163\x29\x3f\72\57\57\x23", $A7)) {
            goto Mv;
        }
        $A7 = "\x68\x74\164\160\72\x2f\57" . $A7;
        Mv:
        $lc = parse_url($A7);
        $VX = preg_replace("\x2f\x5e\x77\x77\167\x5c\x2e\57", '', $lc["\x68\x6f\163\164"]);
        $E4 = wp_upload_dir();
        $tU = $VX . "\x2d" . $E4["\142\141\163\145\x64\x69\x72"];
        $tE = hash_hmac("\163\x68\x61\62\x35\x36", $tU, "\64\x44\x48\x66\x6a\147\x66\152\x61\163\x6e\x64\x66\x73\141\x6a\146\110\107\112");
        $N8 = $this->djkasjdksa();
        $rp = round(strlen($N8) / rand(2, 20));
        $N8 = substr_replace($N8, $tE, $rp, 0);
        $Tx = base64_decode($N8);
        if (is_writable($hf . "\154\151\143\x65\156\x73\x65")) {
            goto ZF;
        }
        $N8 = str_rot13($N8);
        $cy = base64_decode("\x62\107\116\153\141\x6d\x74\150\x63\x32\x70\x6b\x61\x33\116\x68\x59\x32\167\75");
        update_option($cy, $N8);
        goto gZ;
        ZF:
        file_put_contents($hf . "\x6c\151\x63\x65\x6e\x73\145", $Tx);
        gZ:
        update_option("\x6c\x63\x77\x72\164\x6c\x66\x73\x61\x6d\154", true);
        $this->mo_saml_show_success_message();
        iJ:
        ke:
        T7:
        update_option("\x6d\x6f\x5f\x73\141\155\154\x5f\x61\x64\x6d\151\x6e\x5f\160\141\x73\163\x77\x6f\162\144", '');
        Cq:
        goto du;
        cf:
        if (mo_saml_is_extension_installed("\143\x75\x72\154")) {
            goto VU;
        }
        update_option("\155\x6f\137\x73\141\x6d\154\x5f\x6d\145\163\163\141\x67\145", "\105\x52\x52\x4f\x52\x3a\x20\x50\x48\120\40\143\x55\122\114\x20\145\x78\x74\145\x6e\163\151\157\x6e\40\151\163\40\x6e\x6f\x74\x20\151\156\x73\164\141\x6c\154\x65\x64\40\x6f\162\x20\x64\x69\x73\x61\142\154\145\144\x2e\x20\x56\x61\154\x69\x64\141\x74\145\40\117\124\120\40\x66\141\151\154\x65\x64\56");
        $this->mo_saml_show_error_message();
        return;
        VU:
        $b5 = '';
        if ($this->mo_saml_check_empty_or_null($_POST["\x6f\164\x70\137\x74\157\153\x65\x6e"])) {
            goto OX;
        }
        $b5 = htmlspecialchars($_POST["\157\x74\x70\137\164\x6f\153\145\156"]);
        goto TL;
        OX:
        update_option("\x6d\157\137\163\141\x6d\x6c\x5f\155\x65\163\x73\x61\147\145", "\120\x6c\x65\141\x73\x65\40\x65\156\164\145\162\40\141\x20\166\141\154\165\x65\40\151\x6e\40\157\x74\x70\x20\146\151\145\154\144\x2e");
        $this->mo_saml_show_error_message();
        return;
        TL:
        $h1 = new CustomerSaml();
        $Rs = $h1->validate_otp_token(get_option("\155\x6f\137\x73\141\x6d\x6c\137\164\162\141\156\x73\x61\x63\164\x69\157\x6e\111\x64"), $b5);
        if ($Rs) {
            goto I1;
        }
        return;
        I1:
        $Rs = json_decode($Rs, true);
        if (strcasecmp($Rs["\163\164\141\164\x75\x73"], "\123\x55\x43\103\x45\x53\123") == 0) {
            goto d0;
        }
        update_option("\x6d\x6f\137\x73\141\155\x6c\x5f\155\145\x73\163\x61\x67\x65", "\111\156\x76\x61\154\151\144\40\x6f\x6e\145\x20\x74\151\155\x65\40\160\141\163\x73\x63\x6f\144\145\x2e\x20\120\x6c\x65\141\x73\145\x20\x65\x6e\164\145\162\x20\x61\x20\166\x61\154\151\x64\x20\x6f\164\x70\x2e");
        $this->mo_saml_show_error_message();
        goto rm;
        d0:
        $this->create_customer();
        rm:
        du:
        goto wm;
        yM:
        if (mo_saml_is_extension_installed("\143\x75\162\154")) {
            goto iG;
        }
        update_option("\155\x6f\137\x73\x61\155\154\x5f\155\145\163\163\x61\x67\x65", "\x45\x52\x52\x4f\x52\x3a\x20\x50\110\120\40\143\x55\122\x4c\40\x65\170\x74\x65\x6e\163\x69\x6f\156\40\151\x73\x20\156\157\x74\x20\151\x6e\163\x74\x61\x6c\154\145\144\40\x6f\162\x20\144\151\163\x61\142\x6c\145\144\x2e\x20\x52\145\x67\151\163\164\x72\141\x74\x69\157\x6e\x20\x66\141\x69\x6c\145\144\x2e");
        $this->mo_saml_show_error_message();
        return;
        iG:
        $r6 = '';
        $zo = '';
        $Ek = self::get_empty_strings();
        $dZ = self::get_empty_strings();
        if ($this->mo_saml_check_empty_or_null($_POST["\145\x6d\141\x69\x6c"]) || $this->mo_saml_check_empty_or_null($_POST["\x70\141\163\163\x77\x6f\162\x64"]) || $this->mo_saml_check_empty_or_null($_POST["\143\157\x6e\146\x69\x72\x6d\x50\141\x73\163\x77\x6f\162\144"])) {
            goto bO;
        }
        if (strlen($_POST["\160\141\163\163\167\157\162\x64"]) < 6 || strlen($_POST["\143\x6f\156\146\x69\162\x6d\120\141\x73\x73\167\157\x72\x64"]) < 6) {
            goto xt;
        }
        if ($this->checkPasswordPattern(strip_tags($_POST["\160\141\x73\163\x77\x6f\162\x64"]))) {
            goto QV;
        }
        $r6 = sanitize_email($_POST["\145\155\x61\x69\154"]);
        if (!isset($_POST["\x70\150\x6f\x6e\x65"])) {
            goto KB;
        }
        $zo = htmlspecialchars($_POST["\160\150\157\156\x65"]);
        KB:
        $Ek = stripslashes(strip_tags($_POST["\x70\x61\163\x73\x77\157\x72\x64"]));
        $dZ = stripslashes(strip_tags($_POST["\143\157\x6e\x66\x69\x72\x6d\120\x61\163\x73\167\157\162\144"]));
        goto Ri;
        QV:
        update_option("\x6d\x6f\x5f\163\x61\155\x6c\137\x6d\x65\x73\163\x61\x67\145", "\x4d\151\156\151\155\x75\x6d\x20\66\40\143\x68\141\162\x61\143\x74\145\162\x73\x20\163\150\157\x75\154\144\40\x62\145\40\160\162\145\x73\145\x6e\x74\56\40\x4d\141\170\x69\x6d\x75\155\40\x31\x35\x20\143\x68\x61\162\141\x63\x74\x65\162\x73\40\x73\x68\x6f\x75\x6c\144\40\x62\145\x20\160\162\x65\x73\x65\156\x74\x2e\x20\117\x6e\x6c\x79\40\146\157\x6c\154\157\x77\151\156\147\x20\163\171\155\x62\157\x6c\163\40\x28\x21\x40\43\56\x24\45\136\46\x2a\55\x5f\51\40\163\150\x6f\165\154\144\40\x62\x65\40\160\x72\x65\x73\x65\x6e\164\56");
        $this->mo_saml_show_error_message();
        return;
        Ri:
        goto XJ;
        xt:
        update_option("\x6d\x6f\x5f\163\x61\x6d\154\137\x6d\x65\163\163\x61\147\x65", "\103\150\x6f\157\163\x65\40\141\40\x70\x61\163\x73\167\x6f\x72\x64\40\x77\151\x74\x68\x20\x6d\x69\156\151\x6d\x75\155\x20\154\145\x6e\x67\164\150\40\66\56");
        $this->mo_saml_show_error_message();
        return;
        XJ:
        goto jm;
        bO:
        update_option("\x6d\157\x5f\x73\x61\155\x6c\x5f\155\145\x73\163\x61\x67\x65", "\101\154\x6c\40\164\x68\145\x20\146\x69\145\154\144\x73\40\x61\162\145\40\162\145\161\165\x69\x72\145\144\x2e\40\120\154\145\141\163\145\40\145\156\x74\x65\x72\x20\x76\141\x6c\151\x64\x20\145\156\164\x72\x69\145\163\x2e");
        $this->mo_saml_show_error_message();
        return;
        jm:
        update_option("\155\x6f\x5f\163\141\155\x6c\137\141\x64\x6d\x69\156\137\x65\x6d\x61\x69\x6c", $r6);
        update_option("\155\157\x5f\163\x61\155\x6c\137\141\x64\155\x69\156\137\160\150\157\156\145", $zo);
        if (strcmp($Ek, $dZ) == 0) {
            goto m4;
        }
        update_option("\155\157\137\x73\141\155\154\x5f\x6d\x65\x73\163\141\x67\x65", "\x50\141\163\163\x77\x6f\162\144\163\x20\144\x6f\x20\156\157\164\x20\155\141\x74\x63\150\x2e");
        delete_option("\155\157\x5f\x73\x61\x6d\x6c\x5f\x76\145\x72\151\x66\x79\x5f\x63\165\x73\164\157\155\x65\x72");
        $this->mo_saml_show_error_message();
        goto Hx;
        m4:
        update_option("\x6d\157\137\163\x61\155\x6c\137\141\144\x6d\x69\x6e\137\160\141\163\x73\167\x6f\x72\x64", $Ek);
        $r6 = get_option("\x6d\157\137\163\x61\155\154\x5f\141\x64\x6d\x69\156\137\x65\x6d\141\151\x6c");
        $h1 = new CustomerSaml();
        $Rs = $h1->check_customer();
        if ($Rs) {
            goto pu;
        }
        return;
        pu:
        $Rs = json_decode($Rs, true);
        if (strcasecmp($Rs["\163\x74\x61\164\165\x73"], "\103\125\123\x54\117\115\x45\122\137\116\x4f\124\137\x46\x4f\125\x4e\104") == 0) {
            goto HT;
        }
        $this->get_current_customer();
        goto HF;
        HT:
        $Rs = $h1->send_otp_token($r6, '');
        if ($Rs) {
            goto La;
        }
        return;
        La:
        $Rs = json_decode($Rs, true);
        if (strcasecmp($Rs["\x73\x74\141\x74\165\x73"], "\x53\125\x43\x43\105\x53\123") == 0) {
            goto G_;
        }
        update_option("\155\x6f\137\x73\x61\155\154\x5f\155\x65\163\163\x61\147\x65", "\x54\150\145\162\145\x20\x77\141\163\40\141\156\x20\145\162\x72\x6f\x72\40\x69\x6e\x20\x73\145\x6e\x64\x69\x6e\147\x20\x65\155\141\151\x6c\56\x20\120\154\145\141\163\145\x20\x76\145\162\x69\x66\171\40\171\x6f\165\x72\x20\x65\155\x61\x69\x6c\40\x61\x6e\144\40\164\162\171\40\x61\147\141\x69\x6e\56");
        update_option("\155\x6f\x5f\x73\x61\155\154\137\162\145\x67\151\x73\164\162\x61\164\x69\x6f\156\137\x73\x74\141\x74\165\163", "\115\x4f\x5f\x4f\124\x50\x5f\104\x45\114\x49\x56\105\x52\105\104\x5f\x46\x41\x49\114\x55\x52\x45\137\x45\x4d\101\111\114");
        $this->mo_saml_show_error_message();
        goto uf;
        G_:
        update_option("\155\x6f\x5f\163\x61\155\x6c\137\x6d\145\163\x73\141\147\x65", "\x20\101\40\x6f\x6e\145\x20\x74\151\x6d\145\40\x70\141\x73\x73\x63\157\x64\145\40\x69\x73\x20\x73\145\156\x74\x20\164\157\40" . get_option("\155\157\x5f\x73\x61\x6d\154\137\x61\144\155\x69\x6e\x5f\145\x6d\141\151\x6c") . "\x2e\x20\120\x6c\145\x61\x73\145\x20\145\x6e\x74\x65\162\40\164\x68\145\40\157\x74\x70\x20\x68\145\162\x65\40\164\x6f\40\166\145\x72\x69\x66\x79\x20\x79\x6f\x75\162\40\x65\x6d\141\x69\154\56");
        update_option("\155\x6f\137\163\x61\155\154\137\164\x72\x61\156\163\x61\143\164\151\x6f\156\x49\144", $Rs["\x74\x78\x49\144"]);
        update_option("\x6d\157\137\163\x61\x6d\154\137\x72\145\147\151\x73\x74\x72\x61\164\x69\x6f\x6e\x5f\163\164\141\164\165\x73", "\115\117\137\117\124\120\x5f\x44\x45\114\x49\126\x45\122\x45\x44\x5f\x53\125\103\x43\105\x53\x53\x5f\x45\115\101\x49\114");
        $this->mo_saml_show_success_message();
        uf:
        HF:
        Hx:
        wm:
        goto HG;
        Fo:
        $gk = htmlspecialchars($_POST["\x6d\x6f\x5f\163\141\155\154\x5f\x63\x75\x73\164\157\155\x5f\x6c\x6f\147\x69\156\137\164\145\x78\x74"]);
        update_option("\x6d\157\137\163\x61\155\x6c\137\143\165\163\x74\157\x6d\x5f\154\x6f\x67\x69\x6e\x5f\x74\145\x78\164", stripcslashes($gk));
        $sf = htmlspecialchars($_POST["\x6d\157\137\163\x61\155\154\137\143\x75\163\x74\x6f\155\137\x67\162\145\145\164\x69\x6e\147\137\164\x65\x78\164"]);
        update_option("\155\x6f\137\x73\141\x6d\x6c\x5f\143\x75\x73\x74\157\155\137\x67\162\x65\x65\164\151\x6e\147\137\x74\x65\170\x74", stripcslashes($sf));
        $Cz = htmlspecialchars($_POST["\x6d\x6f\137\x73\141\x6d\x6c\137\x67\162\x65\x65\164\x69\156\147\x5f\x6e\141\155\145"]);
        update_option("\155\x6f\x5f\163\x61\155\x6c\x5f\147\x72\x65\145\164\x69\x6e\x67\137\x6e\x61\x6d\x65", stripslashes($Cz));
        $gD = htmlspecialchars($_POST["\x6d\x6f\137\163\141\x6d\154\137\143\x75\x73\x74\157\x6d\137\x6c\x6f\147\x6f\165\x74\137\x74\145\170\x74"]);
        update_option("\x6d\157\x5f\x73\x61\155\154\x5f\143\x75\163\164\157\x6d\137\154\157\147\x6f\165\x74\x5f\164\145\170\164", stripcslashes($gD));
        update_option("\x6d\x6f\x5f\163\141\155\x6c\137\x6d\x65\x73\x73\x61\147\x65", "\x57\x69\144\147\145\164\x20\123\145\164\x74\x69\156\147\x73\40\x75\160\144\x61\x74\x65\x64\40\x73\165\143\x63\145\163\163\x66\x75\x6c\154\171\x2e");
        $this->mo_saml_show_success_message();
        HG:
        J_:
        if (mo_saml_is_trial_active()) {
            goto g7;
        }
        if (site_check()) {
            goto CW;
        }
        delete_option("\x6d\157\137\x73\x61\155\154\x5f\x66\x6f\162\x63\x65\137\141\165\164\150\145\156\164\x69\x63\x61\x74\x69\157\156");
        CW:
        goto Vi;
        g7:
        if (!decryptSamlElement()) {
            goto c6;
        }
        $U6 = get_option("\x6d\157\137\163\x61\x6d\x6c\137\143\x75\163\164\x6f\155\145\x72\137\x74\157\x6b\x65\x6e");
        update_option("\164\137\163\151\x74\145\x5f\163\164\x61\164\165\163", AESEncryption::encrypt_data("\x66\x61\154\163\x65", $U6));
        c6:
        Vi:
    }
    function djkasjdksa()
    {
        $QA = "\x21\x7e\x40\43\x24\x25\x5e\46\52\50\x29\x5f\53\x7c\173\x7d\74\76\77\60\61\x32\x33\64\x35\x36\67\x38\x39\x61\x62\143\x64\x65\146\147\150\x69\152\x6b\154\x6d\156\157\x70\161\x72\163\x74\x75\166\167\170\x79\x7a\101\102\103\104\x45\106\107\110\111\112\113\x4c\x4d\116\117\x50\121\x52\x53\x54\x55\x56\x57\130\x59\132";
        $F2 = strlen($QA);
        $Zv = '';
        $jb = 0;
        yB:
        if (!($jb < 10000)) {
            goto GR;
        }
        $Zv .= $QA[rand(0, $F2 - 1)];
        LS:
        $jb++;
        goto yB;
        GR:
        return $Zv;
    }
    function create_customer()
    {
        $h1 = new CustomerSaml();
        $Rs = $h1->create_customer();
        if ($Rs) {
            goto nY;
        }
        return;
        nY:
        $I1 = json_decode($Rs, true);
        if (strcasecmp($I1["\x73\164\x61\x74\x75\163"], "\103\x55\x53\124\x4f\x4d\x45\122\137\125\x53\105\x52\116\x41\115\105\137\101\x4c\x52\105\101\104\131\137\105\x58\111\x53\x54\123") == 0) {
            goto uz;
        }
        if (!(strcasecmp($I1["\163\164\141\164\165\x73"], "\123\125\103\103\105\x53\x53") == 0)) {
            goto DB;
        }
        update_option("\155\157\137\x73\141\155\x6c\x5f\141\144\155\x69\x6e\x5f\143\165\x73\164\x6f\x6d\145\162\x5f\x6b\x65\171", $I1["\x69\x64"]);
        update_option("\155\x6f\137\163\141\x6d\154\137\x61\144\x6d\151\x6e\137\x61\160\151\x5f\153\145\x79", $I1["\141\x70\151\113\x65\x79"]);
        update_option("\x6d\157\137\163\141\x6d\x6c\137\x63\165\163\x74\x6f\155\x65\x72\x5f\x74\157\x6b\145\x6e", $I1["\x74\157\153\x65\x6e"]);
        update_option("\x6d\157\137\x73\141\x6d\x6c\137\141\144\155\x69\156\137\160\141\x73\x73\x77\x6f\x72\x64", '');
        update_option("\155\157\137\x73\141\155\154\137\x6d\145\x73\x73\141\147\x65", "\124\x68\x61\156\153\40\171\157\165\40\x66\x6f\x72\x20\x72\145\147\151\x73\x74\x65\x72\x69\156\x67\x20\167\x69\x74\150\x20\x6d\x69\156\x69\x6f\x72\x61\x6e\147\x65\56");
        update_option("\155\x6f\x5f\x73\x61\155\x6c\137\162\x65\147\151\163\164\162\141\164\151\157\156\x5f\x73\x74\x61\164\165\163", '');
        delete_option("\155\157\137\163\141\x6d\154\137\166\x65\162\151\x66\171\x5f\143\165\163\164\x6f\155\x65\162");
        delete_option("\155\x6f\137\x73\141\x6d\154\x5f\x6e\145\x77\137\162\145\147\x69\163\x74\162\x61\x74\151\x6f\156");
        $this->mo_saml_show_success_message();
        DB:
        goto Fy;
        uz:
        $this->get_current_customer();
        Fy:
        update_option("\x6d\x6f\137\x73\x61\x6d\154\137\141\144\x6d\151\x6e\x5f\x70\x61\163\x73\167\x6f\x72\144", '');
    }
    function get_current_customer()
    {
        $h1 = new CustomerSaml();
        $Rs = $h1->get_customer_key();
        if ($Rs) {
            goto Yv;
        }
        return;
        Yv:
        $I1 = json_decode($Rs, true);
        if (json_last_error() == JSON_ERROR_NONE) {
            goto Da;
        }
        update_option("\155\x6f\x5f\x73\141\x6d\x6c\137\x6d\145\163\x73\141\x67\145", "\x59\x6f\x75\x20\141\154\162\145\x61\144\x79\40\x68\141\166\145\x20\141\x6e\x20\141\143\x63\157\x75\156\x74\x20\167\x69\164\150\40\x6d\x69\156\151\117\x72\141\x6e\147\x65\x2e\40\120\154\145\141\x73\x65\x20\x65\156\x74\x65\x72\40\x61\x20\166\141\x6c\x69\144\40\x70\x61\x73\x73\167\x6f\162\x64\x2e");
        update_option("\155\157\137\x73\141\x6d\154\x5f\166\145\x72\x69\146\x79\x5f\143\165\x73\x74\157\155\x65\162", "\164\x72\165\145");
        delete_option("\155\157\x5f\163\x61\x6d\x6c\137\x6e\145\167\x5f\162\145\x67\151\x73\164\162\141\164\151\x6f\x6e");
        $this->mo_saml_show_error_message();
        goto Hi;
        Da:
        update_option("\x6d\157\137\163\x61\155\154\x5f\x61\x64\155\151\x6e\x5f\x63\x75\x73\x74\157\x6d\145\162\137\153\145\171", $I1["\x69\144"]);
        update_option("\x6d\x6f\137\163\x61\x6d\154\137\141\x64\155\151\156\137\141\160\151\x5f\153\145\x79", $I1["\141\x70\151\x4b\x65\171"]);
        update_option("\x6d\x6f\137\163\141\x6d\x6c\137\143\165\x73\x74\x6f\155\145\162\137\x74\x6f\153\145\x6e", $I1["\x74\x6f\x6b\145\x6e"]);
        update_option("\155\157\137\163\141\155\x6c\x5f\x61\x64\155\x69\x6e\137\x70\x61\163\163\167\157\x72\x64", '');
        update_option("\155\157\x5f\x73\x61\155\154\x5f\155\x65\163\x73\141\x67\x65", "\131\157\165\x72\x20\141\x63\x63\x6f\x75\x6e\164\40\x68\x61\163\40\x62\x65\145\x6e\40\x72\x65\164\162\x69\145\166\145\144\x20\163\x75\143\x63\x65\163\163\146\x75\x6c\x6c\171\x2e");
        delete_option("\x6d\157\137\163\x61\x6d\x6c\x5f\166\x65\x72\x69\x66\x79\137\x63\165\x73\164\x6f\x6d\x65\x72");
        delete_option("\155\157\x5f\163\141\x6d\x6c\137\x6e\x65\167\x5f\162\x65\x67\x69\163\164\x72\141\x74\151\157\156");
        $this->mo_saml_show_success_message();
        Hi:
    }
    public function mo_saml_check_empty_or_null($St)
    {
        if (!(!isset($St) || empty($St))) {
            goto iE;
        }
        return true;
        iE:
        return false;
    }
    function miniorange_sso_menu()
    {
        $Aa = add_menu_page("\x4d\117\40\x53\101\115\x4c\x20\123\145\164\164\151\156\x67\163\40" . __("\103\x6f\156\146\151\x67\x75\162\x65\40\123\x41\x4d\x4c\40\x49\144\145\156\164\x69\164\x79\x20\x50\162\157\166\151\x64\145\162\x20\x66\157\162\x20\x53\x53\117", "\155\x6f\x5f\163\x61\155\x6c\137\163\145\164\164\x69\156\x67\163"), "\155\x69\156\x69\x4f\162\x61\x6e\147\145\40\123\x41\115\114\40\x32\x2e\60\x20\x53\x53\x4f", "\141\x64\155\x69\x6e\151\x73\x74\162\x61\x74\157\x72", "\155\x6f\x5f\163\141\x6d\x6c\137\163\x65\164\164\151\156\x67\163", array($this, "\x6d\x6f\137\x6c\157\x67\151\156\x5f\167\x69\x64\147\x65\x74\x5f\x73\141\155\x6c\137\157\x70\164\x69\x6f\x6e\x73"), plugin_dir_url(__FILE__) . "\x69\155\x61\147\x65\163\57\x6d\x69\156\x69\157\x72\141\x6e\x67\x65\56\x70\156\x67");
        if (!mo_saml_is_customer_license_key_verified()) {
            goto tg;
        }
        add_submenu_page("\x6d\x6f\x5f\163\141\155\x6c\137\163\145\164\164\x69\x6e\x67\x73", "\x4d\141\156\141\x67\x65\40\114\x69\143\x65\156\163\145\40\x4b\x65\171\163", "\115\x61\156\x61\x67\x65\x20\114\151\143\145\x6e\163\145\x20\x4b\145\x79\x73", "\141\x64\155\x69\x6e\x69\163\164\162\x61\x74\157\162", "\155\x6f\x5f\155\141\156\141\x67\x65\137\x6c\x69\x63\x65\156\163\x65", "\x6d\x6f\x5f\x6d\x61\156\141\147\145\x5f\154\151\x63\x65\156\163\x65");
        add_submenu_page("\x6d\157\137\x73\x61\155\154\x5f\x73\x65\x74\164\151\x6e\147\x73", "\155\x69\x6e\x69\117\x72\x61\x6e\147\x65\40\x53\x41\x4d\x4c\40\x32\x2e\x30\40\123\x53\117", __("\74\x64\x69\x76\x20\151\x64\75\x22\x6d\157\x5f\x73\141\x6d\154\x5f\x61\144\144\x6f\x6e\x73\137\163\x75\142\x6d\145\x6e\165\42\76\101\x64\x64\55\x4f\156\163\74\x2f\x64\x69\166\76", "\155\151\156\151\157\162\141\156\147\145\x2d\x73\x61\x6d\154\x2d\62\x30\x2d\x73\x69\x6e\147\154\x65\55\163\151\147\x6e\55\157\156"), "\x6d\x61\x6e\141\x67\145\137\157\x70\164\x69\157\156\163", "\x6d\x6f\x5f\163\x61\155\x6c\x5f\x73\145\164\164\x69\156\147\x73\x26\x74\x61\x62\75\x61\x64\x64\x2d\157\156\x73", array($this, "\155\x6f\x5f\x6c\x6f\x67\x69\156\137\167\x69\x64\x67\145\x74\x5f\x73\x61\155\154\x5f\x6f\x70\164\151\157\156\163"));
        tg:
    }
    function mo_saml_redirect_for_authentication($bs)
    {
        if (!mo_saml_is_customer_license_key_verified()) {
            goto Nf;
        }
        if (!(get_option("\x6d\157\137\163\141\155\154\x5f\x72\x65\147\151\163\164\145\162\x65\x64\x5f\157\156\x6c\x79\x5f\141\x63\143\145\163\x73") == "\164\x72\165\x65")) {
            goto ba;
        }
        $base_url = home_url();
        echo "\74\163\x63\162\151\160\164\x3e\167\x69\156\x64\157\x77\x2e\x6c\x6f\143\141\164\x69\x6f\x6e\56\150\x72\145\x66\x3d\x27{$base_url}\57\x3f\157\160\x74\151\x6f\156\x3d\163\x61\155\x6c\x5f\x75\163\x65\162\x5f\x6c\x6f\x67\x69\156\46\x72\x65\x64\x69\162\x65\143\x74\137\164\157\75\x27\53\145\156\x63\x6f\x64\145\125\122\111\103\157\155\160\x6f\156\145\156\164\50\x77\151\156\x64\157\x77\56\154\x6f\143\x61\x74\151\x6f\156\56\x68\162\145\146\51\x3b\x3c\x2f\x73\x63\162\151\x70\x74\76";
        exit;
        ba:
        if (get_option("\x6d\x6f\x5f\163\x61\x6d\154\x5f\162\x65\147\151\163\x74\145\x72\x65\144\137\x6f\156\154\171\137\x61\x63\143\x65\x73\163") == "\x74\162\165\x65" || get_option("\x6d\x6f\x5f\x73\141\x6d\x6c\x5f\145\x6e\x61\x62\154\145\x5f\x6c\157\147\151\x6e\x5f\162\145\144\151\162\145\143\x74") == "\164\x72\165\x65") {
            goto i5;
        }
        if (!(get_option("\155\x6f\137\x73\x61\155\x6c\x5f\162\x65\144\151\x72\x65\x63\x74\137\164\157\137\167\x70\137\154\x6f\x67\x69\x6e") == "\164\x72\165\145")) {
            goto Sy;
        }
        if (!(mo_saml_is_sp_configured() && !is_user_logged_in())) {
            goto ji;
        }
        $GV = site_url() . "\57\167\x70\x2d\x6c\157\147\x69\156\x2e\x70\x68\x70";
        if (empty($bs)) {
            goto Cd;
        }
        $GV = $GV . "\x3f\x72\145\x64\151\162\145\x63\x74\137\x74\x6f\75" . urlencode($bs) . "\x26\x72\145\141\x75\164\x68\75\x31";
        Cd:
        header("\x4c\x6f\143\x61\x74\151\x6f\x6e\72\x20" . $GV);
        exit;
        ji:
        Sy:
        goto rV;
        i5:
        if (!(mo_saml_is_sp_configured() && !is_user_logged_in())) {
            goto fC;
        }
        $yE = get_option("\155\157\x5f\x73\x61\155\x6c\x5f\163\160\137\142\x61\163\x65\x5f\x75\162\x6c");
        if (!empty($yE)) {
            goto YH;
        }
        $yE = home_url();
        YH:
        if (!(get_option("\155\157\x5f\x73\141\x6d\154\x5f\162\x65\154\x61\171\137\163\x74\x61\164\145") && get_option("\155\x6f\137\x73\141\x6d\x6c\137\x72\145\154\x61\171\137\x73\x74\x61\x74\x65") != '')) {
            goto ex;
        }
        $bs = get_option("\155\x6f\137\163\141\155\x6c\137\162\145\x6c\141\x79\137\163\x74\x61\164\145");
        ex:
        $bs = mo_saml_get_relay_state($bs);
        $g1 = empty($bs) ? "\x2f" : $bs;
        $wW = htmlspecialchars_decode(LicenseHelper::getCurrentOption(mo_options_enum_service_provider::Login_URL));
        $fA = LicenseHelper::getCurrentOption(mo_options_enum_service_provider::Login_binding_type);
        $Fh = get_option("\155\157\137\x73\141\x6d\154\137\x66\x6f\x72\x63\145\x5f\141\x75\164\x68\x65\x6e\164\x69\143\141\x74\x69\x6f\x6e");
        $zj = $yE . "\57";
        $lF = get_option(mo_options_enum_identity_provider::SP_Entity_ID);
        $O4 = LicenseHelper::getCurrentOption(mo_options_enum_service_provider::NameID_Format);
        if (!empty($O4)) {
            goto Ot;
        }
        $O4 = "\x31\x2e\61\72\x6e\x61\155\145\151\144\x2d\146\x6f\162\x6d\x61\x74\x3a\165\x6e\x73\x70\x65\x63\151\146\x69\x65\144";
        Ot:
        if (!empty($lF)) {
            goto uN;
        }
        $lF = $yE . "\x2f\167\160\x2d\143\157\156\164\x65\x6e\164\57\160\154\165\147\151\156\163\57\155\x69\x6e\151\157\162\141\156\147\145\55\x73\x61\155\x6c\55\62\60\x2d\163\151\156\x67\154\145\55\163\151\x67\x6e\x2d\157\x6e\57";
        uN:
        $Xo = SAMLSPUtilities::createAuthnRequest($zj, $lF, $wW, $Fh, $fA, $O4);
        if (empty($fA) || $fA == "\110\x74\164\x70\x52\x65\144\151\x72\x65\143\x74") {
            goto sN;
        }
        if (!(LicenseHelper::getCurrentOption(mo_options_enum_service_provider::Request_signed) == "\165\156\x63\150\x65\x63\153\x65\144")) {
            goto ok;
        }
        $dC = base64_encode($Xo);
        SAMLSPUtilities::postSAMLRequest($wW, $dC, $g1);
        exit;
        ok:
        $dC = SAMLSPUtilities::signXML($Xo, "\116\x61\155\145\111\104\120\157\x6c\151\x63\x79");
        SAMLSPUtilities::postSAMLRequest($wW, $dC, $g1);
        goto tt;
        sN:
        $cH = $wW;
        if (strpos($wW, "\x3f") !== false) {
            goto iH;
        }
        $cH .= "\x3f";
        goto VE;
        iH:
        $cH .= "\x26";
        VE:
        if (!(LicenseHelper::getCurrentOption(mo_options_enum_service_provider::Request_signed) == "\165\x6e\x63\150\x65\143\x6b\145\x64")) {
            goto st;
        }
        $cH .= "\123\x41\x4d\114\x52\x65\x71\165\x65\x73\x74\x3d" . $Xo . "\46\x52\145\x6c\x61\171\x53\x74\141\x74\145\75" . urlencode($g1);
        header("\x63\x61\x63\x68\145\x2d\x63\x6f\x6e\164\x72\x6f\x6c\x3a\x20\155\x61\170\x2d\x61\147\x65\x3d\x30\x2c\x20\x70\x72\151\166\141\164\145\x2c\40\x6e\x6f\55\x73\164\157\162\145\x2c\40\156\x6f\55\x63\141\x63\x68\x65\x2c\x20\x6d\165\x73\x74\x2d\x72\145\x76\x61\154\x69\x64\x61\164\x65");
        header("\114\157\143\x61\x74\x69\157\156\x3a\40" . $cH);
        exit;
        st:
        $Xo = "\x53\x41\115\114\122\x65\161\165\x65\163\x74\x3d" . $Xo . "\x26\122\x65\x6c\141\x79\x53\164\141\164\x65\x3d" . urlencode($g1) . "\46\x53\151\147\x41\x6c\147\75" . urlencode(XMLSecurityKey::RSA_SHA256);
        $Sa = array("\164\x79\x70\x65" => "\160\162\151\166\x61\x74\x65");
        $U6 = new XMLSecurityKey(XMLSecurityKey::RSA_SHA256, $Sa);
        $ST = get_option("\155\x6f\x5f\x73\141\x6d\154\137\x63\165\x72\162\x65\x6e\164\x5f\x63\145\x72\164\x5f\x70\162\151\166\x61\164\145\x5f\153\145\171");
        $U6->loadKey($ST, FALSE);
        $aA = new XMLSecurityDSig();
        $Ju = $U6->signData($Xo);
        $Ju = base64_encode($Ju);
        $cH .= $Xo . "\46\x53\x69\147\x6e\x61\164\x75\162\x65\75" . urlencode($Ju);
        header("\x63\141\143\x68\145\55\143\157\x6e\164\x72\x6f\154\x3a\x20\x6d\141\170\x2d\141\147\x65\x3d\x30\54\40\x70\162\151\x76\x61\164\145\x2c\x20\x6e\157\x2d\163\164\x6f\162\145\54\40\x6e\x6f\55\x63\x61\x63\x68\x65\54\x20\x6d\x75\x73\164\x2d\162\145\166\x61\154\151\x64\141\x74\x65");
        header("\114\157\x63\x61\164\x69\157\x6e\72\40" . $cH);
        exit;
        tt:
        fC:
        rV:
        Nf:
    }
    function mo_saml_login_redirect($gV)
    {
        $eq = false;
        if (!(strcmp(wp_login_url(), $gV) == 0)) {
            goto YE;
        }
        $eq = true;
        YE:
        if (!empty($gV) && !$eq) {
            goto pP;
        }
        header("\114\x6f\143\141\x74\151\157\156\x3a\x20" . home_url());
        goto G7;
        pP:
        header("\114\x6f\x63\x61\164\x69\x6f\156\72\x20" . $gV);
        G7:
        exit;
    }
    function mo_saml_authenticate()
    {
        $gV = '';
        if (!isset($_REQUEST["\162\145\144\x69\162\x65\x63\164\x5f\164\157"])) {
            goto d9;
        }
        $gV = htmlspecialchars($_REQUEST["\x72\x65\x64\151\x72\x65\143\164\137\x74\x6f"]);
        d9:
        if (!is_user_logged_in()) {
            goto wV;
        }
        $this->mo_saml_login_redirect($gV);
        wV:
        if (!(get_option("\x6d\157\x5f\x73\141\x6d\154\137\x65\x6e\141\142\154\145\x5f\x6c\x6f\x67\x69\156\137\x72\x65\144\x69\162\145\x63\x74") == "\x74\x72\x75\x65")) {
            goto z4;
        }
        $GC = get_option("\x6d\x6f\x5f\163\141\x6d\154\137\x62\141\143\x6b\x64\x6f\157\162\137\165\162\154") ? trim(get_option("\155\x6f\x5f\x73\x61\x6d\154\x5f\142\141\143\x6b\x64\x6f\157\162\137\x75\162\154")) : "\146\x61\154\x73\x65";
        if (isset($_GET["\154\157\147\x67\145\144\x6f\x75\164"]) && $_GET["\154\x6f\147\147\x65\x64\x6f\165\x74"] == "\x74\x72\165\x65") {
            goto LE;
        }
        if (get_option("\x6d\157\x5f\163\x61\x6d\x6c\137\x61\154\x6c\157\x77\137\167\x70\x5f\x73\151\147\156\151\x6e") == "\x74\x72\x75\x65") {
            goto an;
        }
        goto Rx;
        LE:
        header("\x4c\x6f\x63\141\x74\151\x6f\156\72\40" . home_url());
        exit;
        goto Rx;
        an:
        if (isset($_GET["\x73\141\155\154\x5f\x73\x73\x6f"]) && $_GET["\x73\141\155\x6c\x5f\163\x73\x6f"] === $GC || isset($_POST["\163\141\x6d\x6c\137\163\x73\157"]) && $_POST["\x73\141\155\x6c\x5f\163\163\x6f"] === $GC) {
            goto HQ;
        }
        if (isset($_REQUEST["\162\x65\144\x69\x72\145\x63\164\137\x74\157"])) {
            goto oN;
        }
        goto Wu;
        HQ:
        return;
        goto Wu;
        oN:
        $gV = htmlspecialchars($_REQUEST["\x72\x65\x64\x69\x72\145\143\164\137\x74\x6f"]);
        if (!(strpos($gV, "\167\x70\55\141\x64\155\151\x6e") !== false && strpos($gV, "\x73\x61\155\154\x5f\x73\x73\157\75" . $GC) !== false)) {
            goto o6;
        }
        return;
        o6:
        Wu:
        Rx:
        $this->mo_saml_redirect_for_authentication($gV);
        z4:
    }
    function mo_saml_auto_redirect()
    {
        $Ls = false;
        $Ls = apply_filters("\155\x6f\137\163\x61\155\154\137\142\145\x66\157\x72\x65\137\x61\165\x74\157\137\x72\x65\144\151\162\x65\x63\x74", $Ls);
        if (!(is_user_logged_in() || $Ls)) {
            goto JF;
        }
        return;
        JF:
        if (!(get_option("\155\157\x5f\x73\141\x6d\154\137\162\145\x67\x69\163\x74\145\x72\x65\144\x5f\157\156\x6c\x79\x5f\x61\143\143\145\x73\x73") == "\x74\x72\x75\x65" || get_option("\155\157\x5f\x73\x61\155\154\x5f\162\145\x64\151\162\x65\143\x74\x5f\x74\x6f\x5f\167\160\137\154\x6f\147\x69\x6e") == "\x74\x72\x75\x65")) {
            goto rW;
        }
        if (!(get_option("\x6d\x6f\x5f\163\x61\155\x6c\x5f\x65\x6e\x61\142\154\145\137\162\x73\163\137\141\x63\143\x65\163\163") == "\x74\x72\165\145" && is_feed())) {
            goto c7;
        }
        return;
        c7:
        $bs = saml_get_current_page_url();
        $this->mo_saml_redirect_for_authentication($bs);
        rW:
    }
    function mo_saml_modify_login_form()
    {
        $GC = get_option("\x6d\157\137\x73\141\155\154\x5f\142\141\x63\x6b\x64\x6f\x6f\162\137\x75\162\154") ? trim(get_option("\x6d\157\137\x73\141\x6d\154\137\x62\141\143\153\144\x6f\x6f\162\x5f\x75\162\x6c")) : "\x66\x61\154\163\x65";
        echo "\74\151\156\x70\x75\164\40\164\x79\x70\x65\x3d\42\150\x69\144\x64\x65\x6e\42\x20\156\141\x6d\145\75\42\x73\141\155\154\x5f\163\163\x6f\42\x20\x76\x61\154\165\x65\x3d" . $GC . "\76" . "\xa";
        if (!(get_option("\x6d\157\x5f\x73\x61\x6d\x6c\x5f\x61\144\144\137\163\163\157\137\142\x75\x74\x74\157\x6e\x5f\167\x70") == "\x74\162\165\x65")) {
            goto vd;
        }
        $this->mo_saml_add_sso_button();
        vd:
    }
    function mo_saml_login_enqueue_scripts()
    {
        wp_enqueue_script("\152\x71\x75\x65\162\171");
    }
    function mo_saml_add_sso_button()
    {
        $rV = SAMLSPUtilities::mo_saml_is_user_logged_in();
        if ($rV) {
            goto Wi;
        }
        $yE = get_option("\x6d\157\x5f\163\141\155\154\137\x73\160\x5f\x62\x61\163\145\x5f\x75\x72\154");
        if (!empty($yE)) {
            goto DL;
        }
        $yE = home_url();
        DL:
        $aM = get_option("\155\157\x5f\x73\x61\x6d\x6c\137\142\165\x74\164\x6f\x6e\137\x77\151\144\164\150") ? get_option("\155\157\137\x73\x61\155\154\x5f\142\x75\x74\164\x6f\156\137\x77\x69\x64\164\150") : "\x31\x30\x30";
        $Uk = get_option("\x6d\x6f\x5f\x73\x61\155\154\137\x62\x75\x74\164\157\x6e\x5f\150\x65\x69\x67\150\164") ? get_option("\x6d\x6f\x5f\163\x61\x6d\x6c\x5f\x62\x75\164\x74\x6f\156\137\150\x65\x69\147\150\164") : "\65\60";
        $VQ = get_option("\155\157\137\163\x61\x6d\x6c\137\142\165\x74\164\x6f\x6e\x5f\x73\151\x7a\x65") ? get_option("\155\157\137\163\141\x6d\154\137\x62\x75\x74\164\157\156\137\x73\151\x7a\145") : "\x35\60";
        $aL = get_option("\x6d\x6f\x5f\163\x61\155\154\x5f\x62\165\x74\164\157\156\x5f\143\165\162\166\x65") ? get_option("\x6d\x6f\137\163\141\x6d\x6c\x5f\142\x75\164\x74\x6f\x6e\137\143\165\x72\166\x65") : "\65";
        $Yq = get_option("\x6d\x6f\x5f\163\141\x6d\x6c\x5f\142\x75\x74\164\x6f\156\137\x63\x6f\x6c\x6f\162") ? get_option("\x6d\x6f\137\163\141\x6d\154\x5f\x62\165\x74\164\x6f\x6e\137\x63\157\154\157\162") : "\x30\60\70\65\x62\141";
        $f5 = get_option("\x6d\x6f\137\163\x61\155\154\x5f\x62\165\164\x74\157\x6e\137\x74\150\x65\155\145") ? get_option("\x6d\157\x5f\163\141\155\x6c\x5f\x62\x75\164\164\x6f\x6e\x5f\164\150\x65\x6d\145") : "\154\x6f\156\147\x62\165\x74\x74\157\156";
        $UK = LicenseHelper::getCurrentOption(mo_options_enum_service_provider::Identity_name);
        $f9 = get_option("\x6d\157\137\163\141\155\154\x5f\142\x75\164\x74\157\156\x5f\164\x65\x78\x74") ? get_option("\x6d\157\x5f\x73\141\x6d\154\137\142\165\164\x74\157\156\137\x74\x65\x78\x74") : ($UK ? $UK : "\114\x6f\147\x69\156");
        $UI = get_option("\x6d\x6f\x5f\163\141\x6d\154\137\x66\x6f\156\x74\x5f\x63\x6f\x6c\x6f\x72") ? get_option("\155\x6f\137\x73\x61\155\154\x5f\146\x6f\x6e\164\x5f\x63\157\x6c\x6f\x72") : "\146\x66\146\x66\x66\x66";
        $QT = get_option("\155\x6f\137\x73\141\x6d\154\137\x66\157\156\x74\x5f\163\151\172\145") ? get_option("\x6d\x6f\x5f\163\x61\155\154\x5f\146\157\156\x74\x5f\163\151\172\145") : "\x32\60";
        $gi = get_option("\163\163\x6f\137\142\165\x74\164\x6f\x6e\137\x6c\x6f\147\x69\x6e\137\146\157\x72\155\137\160\157\x73\151\x74\151\x6f\156") ? get_option("\163\x73\157\x5f\x62\x75\164\x74\x6f\x6e\x5f\x6c\157\x67\151\x6e\x5f\146\x6f\162\155\137\160\x6f\163\x69\x74\x69\157\156") : "\141\142\x6f\166\x65";
        $wR = "\x3c\151\x6e\160\x75\164\x20\164\x79\160\x65\x3d\x22\142\x75\x74\x74\x6f\x6e\42\40\156\x61\155\x65\x3d\x22\155\x6f\137\163\141\x6d\154\137\x77\x70\137\163\163\x6f\137\142\x75\x74\164\157\x6e\42\40\166\x61\154\x75\x65\75\42" . $f9 . "\x22\x20\163\164\x79\154\x65\75\x22";
        $CD = '';
        if ($f5 == "\154\x6f\x6e\147\142\x75\x74\164\x6f\156") {
            goto kb;
        }
        if ($f5 == "\x63\x69\x72\x63\154\145") {
            goto oj;
        }
        if ($f5 == "\x6f\x76\x61\x6c") {
            goto H0;
        }
        if ($f5 == "\x73\161\165\141\x72\x65") {
            goto ZS;
        }
        goto Sh;
        oj:
        $CD = $CD . "\x77\151\x64\164\x68\72" . $VQ . "\x70\x78\73";
        $CD = $CD . "\x68\145\x69\x67\150\164\72" . $VQ . "\x70\x78\x3b";
        $CD = $CD . "\x62\157\162\x64\x65\x72\x2d\162\x61\144\151\165\x73\72\x39\x39\71\160\170\73";
        goto Sh;
        H0:
        $CD = $CD . "\167\x69\144\x74\150\72" . $VQ . "\160\170\x3b";
        $CD = $CD . "\150\145\151\x67\x68\164\72" . $VQ . "\x70\170\x3b";
        $CD = $CD . "\142\x6f\162\x64\x65\162\x2d\162\x61\144\151\165\163\x3a\x35\160\170\x3b";
        goto Sh;
        ZS:
        $CD = $CD . "\167\x69\144\164\x68\72" . $VQ . "\x70\170\73";
        $CD = $CD . "\150\x65\x69\x67\x68\164\x3a" . $VQ . "\x70\x78\73";
        $CD = $CD . "\x62\x6f\162\144\145\162\x2d\162\x61\x64\151\x75\163\x3a\x30\160\x78\73";
        $CD = $CD . "\x70\141\144\x64\x69\156\147\72\x30\160\x78\x3b";
        Sh:
        goto Kw;
        kb:
        $CD = $CD . "\x77\151\x64\164\x68\x3a" . $aM . "\x70\170\73";
        $CD = $CD . "\150\x65\151\x67\x68\x74\72" . $Uk . "\x70\170\x3b";
        $CD = $CD . "\142\157\x72\144\x65\x72\55\162\141\144\151\x75\163\72" . $aL . "\160\x78\x3b";
        Kw:
        $CD = $CD . "\142\x61\143\153\x67\162\x6f\x75\x6e\x64\55\x63\x6f\x6c\x6f\162\x3a\x23" . $Yq . "\73";
        $CD = $CD . "\142\x6f\162\x64\145\x72\55\143\x6f\x6c\157\162\72\164\162\x61\x6e\x73\x70\141\162\x65\x6e\x74\73";
        $CD = $CD . "\x63\157\154\x6f\x72\x3a\x23" . $UI . "\x3b";
        $CD = $CD . "\x66\x6f\156\x74\x2d\x73\151\x7a\x65\72" . $QT . "\160\170\x3b";
        $CD = $CD . "\143\x75\162\163\157\x72\x3a\160\x6f\151\x6e\x74\145\x72";
        $wR = $wR . $CD . "\x22\x2f\x3e";
        $gV = '';
        if (!isset($_GET["\162\x65\x64\151\162\x65\x63\x74\137\164\x6f"])) {
            goto JA;
        }
        $gV = urlencode($_GET["\162\145\144\x69\x72\145\143\x74\137\x74\157"]);
        JA:
        $XP = "\x3c\x61\x20\150\162\145\146\75\42" . $yE . "\x2f\x3f\x6f\x70\x74\x69\157\x6e\75\x73\x61\x6d\x6c\137\x75\163\145\162\x5f\x6c\157\147\x69\x6e\46\x72\x65\x64\151\162\x65\x63\164\x5f\x74\x6f\x3d" . $gV . "\42\x20\163\x74\x79\154\145\75\42\164\x65\170\x74\55\x64\145\143\x6f\x72\141\x74\x69\157\156\x3a\156\x6f\x6e\x65\73\42\x3e" . $wR . "\74\x2f\x61\x3e";
        $XP = "\74\x64\x69\166\x20\x73\x74\171\x6c\145\x3d\42\160\x61\x64\x64\x69\156\x67\72\x31\60\x70\170\73\42\x3e" . $XP . "\74\57\144\x69\166\x3e";
        if ($gi == "\141\x62\x6f\166\145") {
            goto nx;
        }
        $XP = "\x3c\144\151\166\x20\151\144\75\42\163\x73\157\x5f\x62\x75\164\x74\x6f\x6e\42\x20\x73\164\171\154\145\x3d\x22\x74\x65\x78\164\x2d\141\x6c\x69\x67\156\x3a\143\145\x6e\x74\145\162\42\76\x3c\x64\x69\x76\x20\163\164\171\154\145\75\42\160\141\144\x64\151\x6e\147\x3a\65\160\x78\x3b\146\157\x6e\164\x2d\x73\151\x7a\145\x3a\61\x34\160\170\73\x22\x3e\x3c\142\x3e\x4f\x52\74\57\x62\76\74\x2f\x64\x69\x76\76" . $XP . "\x3c\x2f\144\x69\x76\76\x3c\x62\162\57\76";
        goto dm;
        nx:
        $XP = "\x3c\x64\x69\x76\x20\151\x64\x3d\x22\163\x73\157\137\142\x75\x74\164\x6f\x6e\x22\x20\163\x74\x79\154\145\x3d\42\x74\x65\170\x74\x2d\x61\x6c\x69\147\x6e\72\143\145\x6e\x74\x65\x72\x22\x3e" . $XP . "\74\144\151\166\40\x73\x74\171\x6c\145\75\42\160\141\144\x64\x69\156\147\72\65\160\x78\x3b\x66\157\x6e\x74\55\x73\x69\172\x65\72\61\x34\x70\170\73\x22\x3e\x3c\x62\x3e\117\122\x3c\57\x62\x3e\74\57\144\151\166\x3e\74\57\x64\151\x76\76\74\142\162\x2f\x3e";
        $XP = $XP . "\x3c\163\x63\162\x69\160\164\x3e\15\xa\11\x9\11\x76\x61\x72\40\x24\x65\154\x65\x6d\145\x6e\164\x20\75\40\x6a\x51\x75\145\x72\171\x28\x22\43\x75\163\145\162\x5f\154\157\147\x69\156\42\x29\x3b\xd\xa\11\x9\11\152\121\165\x65\x72\x79\50\42\43\163\x73\x6f\137\142\x75\x74\x74\x6f\x6e\42\51\56\151\x6e\x73\145\162\x74\102\x65\146\157\x72\x65\x28\152\x51\x75\x65\162\171\50\x22\154\x61\x62\x65\154\133\x66\157\x72\75\47\x22\x2b\44\145\154\145\x6d\x65\156\164\56\x61\164\x74\162\50\x27\151\144\47\x29\x2b\42\x27\x5d\x22\51\51\x3b\xd\12\x9\x9\x9\74\x2f\163\143\x72\151\160\x74\x3e";
        dm:
        echo $XP;
        Wi:
    }
    function mo_get_saml_shortcode($xu)
    {
        $rV = SAMLSPUtilities::mo_saml_is_user_logged_in();
        if (!$rV) {
            goto RJ;
        }
        $current_user = wp_get_current_user();
        $sf = "\110\x65\x6c\154\157\54";
        if (!get_option("\x6d\x6f\x5f\x73\x61\x6d\154\x5f\x63\165\x73\164\157\x6d\137\147\162\145\145\164\151\x6e\147\137\164\145\170\x74")) {
            goto et;
        }
        $sf = get_option("\x6d\x6f\x5f\x73\x61\155\x6c\137\143\x75\x73\x74\x6f\x6d\137\147\162\145\x65\x74\x69\156\147\137\164\x65\170\164");
        et:
        $Cz = '';
        if (!get_option("\155\157\x5f\x73\141\155\154\x5f\x67\162\145\x65\x74\x69\x6e\147\137\x6e\141\x6d\145")) {
            goto SE;
        }
        switch (get_option("\x6d\x6f\137\x73\x61\x6d\154\137\147\162\x65\145\164\x69\156\147\x5f\x6e\141\x6d\145")) {
            case "\125\123\105\x52\x4e\101\x4d\x45":
                $Cz = $current_user->user_login;
                goto NJ;
            case "\105\115\x41\x49\x4c":
                $Cz = $current_user->user_email;
                goto NJ;
            case "\x46\x4e\101\115\x45":
                $Cz = $current_user->user_firstname;
                goto NJ;
            case "\114\116\x41\115\x45":
                $Cz = $current_user->user_lastname;
                goto NJ;
            case "\106\116\x41\115\105\x5f\114\x4e\101\115\x45":
                $Cz = $current_user->user_firstname . "\x20" . $current_user->user_lastname;
                goto NJ;
            case "\114\x4e\101\x4d\105\137\x46\116\x41\115\x45":
                $Cz = $current_user->user_lastname . "\x20" . $current_user->user_firstname;
                goto NJ;
            default:
                $Cz = $current_user->user_login;
        }
        MS:
        NJ:
        SE:
        $Cz = trim($Cz);
        if (!empty($Cz)) {
            goto XP;
        }
        $Cz = $current_user->user_login;
        XP:
        $Ks = $sf . "\40" . $Cz;
        $Fw = "\x4c\x6f\147\x6f\x75\x74";
        if (!get_option("\155\x6f\x5f\x73\141\x6d\x6c\137\143\165\163\x74\x6f\155\x5f\x6c\x6f\x67\157\165\164\137\164\145\x78\x74")) {
            goto BR;
        }
        $Fw = get_option("\x6d\157\x5f\x73\x61\155\154\137\143\165\163\164\x6f\x6d\x5f\x6c\x6f\147\x6f\165\164\x5f\164\x65\x78\164");
        BR:
        $XP = $Ks . "\40\174\40\x3c\x61\40\x68\162\x65\x66\75\42" . wp_logout_url(home_url()) . "\42\x20\x74\x69\x74\154\x65\75\42\154\157\x67\x6f\x75\x74\42\x20\x3e" . $Fw . "\74\57\x61\76\x3c\57\154\151\76";
        goto jz;
        RJ:
        $yE = get_option("\x6d\157\x5f\x73\x61\x6d\x6c\x5f\163\x70\137\142\141\163\145\x5f\x75\162\x6c");
        if (!empty($yE)) {
            goto Ws;
        }
        $yE = home_url();
        Ws:
        if (mo_saml_is_sp_configured() && mo_saml_is_customer_license_key_verified()) {
            goto fb;
        }
        $XP = "\123\120\40\151\163\x20\x6e\157\164\40\143\x6f\x6e\x66\x69\147\x75\162\145\x64\x2e";
        goto XK;
        fb:
        $Ti = LicenseHelper::getCurrentOption(mo_options_enum_service_provider::Identity_name);
        $b3 = '';
        if (!(!empty($xu) and is_array($xu))) {
            goto H9;
        }
        if (!isset($xu["\151\x64\160"])) {
            goto ie;
        }
        $Ti = $xu["\151\x64\160"];
        $b3 = $Ti;
        ie:
        H9:
        $Wu = "\x4c\157\x67\151\156\40\167\x69\164\x68\x20" . LicenseHelper::getCurrentOption(mo_options_enum_service_provider::Identity_name);
        if (!get_option("\155\157\137\x73\x61\155\x6c\137\143\165\x73\x74\x6f\155\x5f\x6c\157\x67\x69\156\137\164\145\170\164")) {
            goto am;
        }
        $Wu = get_option("\155\157\137\x73\x61\x6d\x6c\137\143\x75\x73\x74\157\155\x5f\x6c\x6f\x67\151\x6e\x5f\164\x65\x78\164");
        am:
        $C1 = LicenseHelper::getCurrentOption(mo_options_enum_service_provider::Identity_name);
        $Wu = str_replace("\x23\43\x49\x44\x50\43\43", $C1, $Wu);
        $Ji = false;
        if (!get_option("\155\157\137\163\x61\x6d\154\137\x75\163\x65\x5f\x62\165\164\x74\x6f\156\x5f\x61\x73\x5f\163\x68\x6f\x72\164\143\x6f\144\145")) {
            goto dX;
        }
        if (!(get_option("\155\x6f\x5f\163\x61\x6d\x6c\x5f\165\163\x65\137\142\165\x74\x74\x6f\x6e\x5f\141\163\x5f\x73\150\x6f\x72\164\143\x6f\x64\145") == "\x74\162\x75\145")) {
            goto Yr;
        }
        $Ji = true;
        Yr:
        dX:
        if (!$Ji) {
            goto bw;
        }
        $aM = get_option("\x6d\x6f\x5f\x73\141\155\x6c\x5f\142\165\164\x74\x6f\x6e\x5f\167\151\x64\x74\150") ? get_option("\x6d\157\137\x73\x61\x6d\x6c\x5f\x62\x75\x74\x74\157\156\137\167\x69\x64\x74\150") : "\61\60\x30";
        $Uk = get_option("\x6d\x6f\137\x73\141\155\154\137\x62\x75\164\164\x6f\x6e\x5f\150\x65\x69\147\x68\x74") ? get_option("\x6d\157\137\163\x61\155\x6c\137\x62\165\164\x74\x6f\156\137\x68\x65\151\x67\x68\x74") : "\x35\60";
        $VQ = get_option("\155\x6f\x5f\x73\141\155\x6c\137\142\165\164\x74\157\156\x5f\163\x69\172\145") ? get_option("\155\157\137\163\x61\x6d\154\x5f\142\165\x74\x74\x6f\156\137\163\151\172\x65") : "\x35\x30";
        $aL = get_option("\155\157\137\x73\x61\x6d\x6c\137\x62\x75\164\164\157\156\137\x63\165\x72\x76\145") ? get_option("\155\x6f\137\x73\x61\x6d\x6c\137\x62\165\164\x74\x6f\x6e\137\143\165\162\x76\145") : "\x35";
        $Yq = get_option("\155\x6f\x5f\163\x61\x6d\154\137\x62\x75\164\164\x6f\x6e\x5f\x63\x6f\154\x6f\162") ? get_option("\155\157\137\163\x61\155\x6c\x5f\x62\165\164\x74\x6f\156\x5f\x63\x6f\x6c\x6f\x72") : "\60\60\x38\65\142\x61";
        $f5 = get_option("\155\x6f\137\x73\x61\x6d\154\137\x62\165\164\164\x6f\x6e\x5f\164\150\145\x6d\x65") ? get_option("\155\x6f\x5f\x73\x61\x6d\x6c\137\x62\x75\x74\x74\x6f\x6e\137\x74\x68\145\155\145") : "\x6c\x6f\x6e\147\x62\165\164\x74\x6f\x6e";
        $UK = LicenseHelper::getCurrentOption(mo_options_enum_service_provider::Identity_name);
        $f9 = get_option("\155\x6f\137\x73\x61\155\154\137\x62\165\164\164\157\156\137\x74\x65\170\164") ? get_option("\x6d\x6f\137\x73\x61\155\154\x5f\x62\x75\x74\164\157\x6e\137\x74\x65\x78\164") : ($UK ? $UK : "\x4c\157\x67\151\156");
        $UI = get_option("\155\x6f\x5f\x73\141\155\x6c\137\146\157\x6e\x74\x5f\x63\x6f\x6c\157\x72") ? get_option("\x6d\157\137\x73\x61\155\x6c\x5f\146\157\x6e\164\x5f\143\x6f\x6c\x6f\x72") : "\x66\x66\146\146\146\x66";
        $QT = get_option("\x6d\x6f\137\163\x61\x6d\154\x5f\x66\157\156\x74\137\x73\x69\x7a\145") ? get_option("\x6d\x6f\137\x73\141\155\x6c\137\146\157\156\x74\137\x73\151\x7a\x65") : "\62\60";
        $Wu = "\x3c\151\156\160\x75\x74\40\x74\171\160\x65\75\42\142\165\164\x74\157\156\42\x20\x6e\141\155\x65\75\42\155\157\137\163\141\x6d\154\137\x77\160\137\163\163\x6f\x5f\142\165\164\x74\x6f\x6e\42\x20\x76\141\154\165\x65\75\42" . $f9 . "\42\40\163\164\171\x6c\145\x3d\42";
        $CD = '';
        if ($f5 == "\154\157\x6e\147\x62\x75\164\164\x6f\156") {
            goto Jx;
        }
        if ($f5 == "\143\151\x72\x63\x6c\145") {
            goto dy;
        }
        if ($f5 == "\157\x76\141\154") {
            goto er;
        }
        if ($f5 == "\x73\161\165\x61\x72\145") {
            goto AK;
        }
        goto GG;
        dy:
        $CD = $CD . "\x77\151\144\164\x68\72" . $VQ . "\x70\170\x3b";
        $CD = $CD . "\150\x65\x69\147\150\164\72" . $VQ . "\160\x78\x3b";
        $CD = $CD . "\x62\157\x72\144\145\162\55\x72\141\x64\x69\x75\x73\72\71\x39\71\160\x78\73";
        goto GG;
        er:
        $CD = $CD . "\x77\151\144\164\150\x3a" . $VQ . "\x70\170\x3b";
        $CD = $CD . "\x68\x65\151\147\x68\164\x3a" . $VQ . "\x70\x78\x3b";
        $CD = $CD . "\x62\157\162\x64\x65\162\55\x72\141\144\151\165\x73\72\x35\160\170\x3b";
        goto GG;
        AK:
        $CD = $CD . "\167\x69\144\x74\x68\x3a" . $VQ . "\x70\170\73";
        $CD = $CD . "\150\x65\151\147\x68\x74\x3a" . $VQ . "\x70\x78\x3b";
        $CD = $CD . "\x62\157\162\144\145\x72\55\x72\141\144\x69\165\x73\72\x30\x70\170\73";
        GG:
        goto R2;
        Jx:
        $CD = $CD . "\x77\151\144\x74\150\x3a" . $aM . "\x70\170\73";
        $CD = $CD . "\150\x65\151\x67\150\164\72" . $Uk . "\x70\170\73";
        $CD = $CD . "\142\157\x72\144\x65\x72\55\x72\141\144\151\165\x73\72" . $aL . "\x70\x78\73";
        R2:
        $CD = $CD . "\142\141\143\x6b\147\162\x6f\165\x6e\x64\x2d\x63\x6f\154\x6f\x72\x3a\43" . $Yq . "\x3b";
        $CD = $CD . "\x62\x6f\162\144\x65\x72\55\143\157\154\157\x72\72\x74\x72\141\156\x73\x70\x61\x72\x65\x6e\x74\73";
        $CD = $CD . "\143\x6f\x6c\x6f\x72\x3a\x23" . $UI . "\73";
        $CD = $CD . "\x66\x6f\156\164\x2d\163\x69\172\145\x3a" . $QT . "\x70\x78\x3b";
        $CD = $CD . "\x70\141\x64\x64\151\156\x67\x3a\60\160\x78\73";
        $Wu = $Wu . $CD . "\x22\x2f\76";
        bw:
        $gV = urlencode(saml_get_current_page_url());
        $XP = "\x3c\x61\x20\150\x72\145\x66\75\x22" . $yE . "\x2f\77\157\x70\x74\x69\157\x6e\x3d\163\141\155\154\137\165\x73\145\x72\137\154\157\147\151\156";
        if (empty($b3)) {
            goto T0;
        }
        $XP .= "\46\x69\144\x70\x3d" . $Ti;
        T0:
        $XP .= "\x26\x72\145\x64\x69\x72\x65\143\164\137\164\x6f\x3d" . $gV . "\x22";
        if (!$Ji) {
            goto je;
        }
        $XP = $XP . "\163\x74\x79\154\145\x3d\42\x74\145\x78\x74\x2d\144\x65\143\x6f\x72\x61\x74\151\x6f\x6e\72\x6e\157\156\x65\73\x22";
        je:
        $XP = $XP . "\76" . $Wu . "\74\57\x61\76";
        XK:
        jz:
        return $XP;
    }
    function _handle_upload_metadata()
    {
        if (!(isset($_FILES["\155\x65\164\141\x64\141\164\141\137\x66\x69\x6c\x65"]) || isset($_POST["\x6d\x65\x74\141\144\141\164\x61\137\165\x72\154"]))) {
            goto gH;
        }
        if (!empty($_FILES["\155\x65\164\141\144\141\164\141\x5f\x66\151\154\145"]["\164\x6d\x70\x5f\x6e\141\x6d\x65"])) {
            goto ms;
        }
        if (mo_saml_is_extension_installed("\143\165\162\154")) {
            goto zb;
        }
        update_option("\155\157\137\x73\x61\x6d\x6c\x5f\x6d\x65\x73\163\141\147\x65", "\x50\110\120\40\143\125\x52\x4c\x20\145\x78\164\145\156\163\151\x6f\x6e\x20\x69\x73\40\x6e\157\164\40\x69\x6e\163\x74\x61\154\154\x65\x64\40\x6f\162\x20\x64\151\x73\x61\142\x6c\145\144\56\x20\103\141\156\156\x6f\x74\x20\x66\145\164\x63\150\40\155\145\x74\141\144\141\164\x61\40\146\162\157\155\x20\x55\x52\x4c\x2e");
        $this->mo_saml_show_error_message();
        return;
        zb:
        $GV = filter_var(htmlspecialchars($_POST["\155\145\164\141\x64\141\164\x61\137\x75\162\x6c"]), FILTER_SANITIZE_URL);
        $e7 = SAMLSPUtilities::mo_saml_wp_remote_call($GV, array("\x73\x73\x6c\166\145\162\x69\x66\x79" => false), true);
        if (!$e7) {
            goto WZ;
        }
        $Sk = $e7;
        goto va;
        WZ:
        return;
        va:
        if (isset($_POST["\163\x79\156\x63\137\x6d\x65\x74\x61\x64\x61\x74\x61"])) {
            goto ox;
        }
        delete_option("\x73\x61\x6d\154\x5f\x6d\145\x74\141\144\x61\164\141\x5f\x75\x72\154\137\146\157\162\137\x73\171\x6e\143");
        delete_option("\x73\141\x6d\x6c\x5f\x6d\145\x74\141\144\141\x74\x61\x5f\163\171\156\x63\137\x69\x6e\164\145\162\166\141\x6c");
        wp_unschedule_event(wp_next_scheduled("\155\x65\164\141\144\x61\x74\141\x5f\163\x79\x6e\143\x5f\143\162\x6f\x6e\137\141\x63\x74\x69\157\156"), "\x6d\145\164\141\144\x61\164\141\137\x73\171\x6e\x63\x5f\143\x72\157\156\x5f\141\x63\164\x69\157\x6e");
        goto XT;
        ox:
        update_option("\163\x61\155\x6c\x5f\155\145\164\x61\x64\141\164\x61\x5f\165\162\x6c\x5f\146\157\162\137\x73\171\156\x63", htmlspecialchars($_POST["\155\x65\164\141\x64\141\164\141\137\165\x72\x6c"]));
        update_option("\163\x61\x6d\154\x5f\155\x65\x74\x61\x64\x61\164\141\x5f\x73\171\x6e\x63\137\x69\x6e\x74\x65\x72\166\141\154", htmlspecialchars($_POST["\163\x79\x6e\x63\x5f\x69\x6e\x74\145\162\166\141\154"]));
        if (wp_next_scheduled("\155\x65\x74\141\144\141\x74\141\x5f\163\x79\x6e\143\x5f\x63\x72\x6f\x6e\x5f\141\x63\x74\x69\x6f\x6e")) {
            goto zC;
        }
        wp_schedule_event(time(), htmlspecialchars($_POST["\163\x79\x6e\x63\x5f\151\156\164\x65\162\x76\141\154"]), "\155\x65\164\141\x64\141\x74\x61\x5f\163\171\x6e\143\137\143\162\157\156\x5f\x61\x63\x74\151\157\156");
        zC:
        XT:
        goto av;
        ms:
        $Sk = @file_get_contents($_FILES["\x6d\145\x74\x61\144\x61\x74\141\x5f\x66\x69\x6c\x65"]["\x74\155\x70\137\156\141\155\145"]);
        av:
        $this->upload_metadata($Sk);
        gH:
    }
    function upload_metadata($Sk)
    {
        $nT = set_error_handler(array($this, "\x68\141\156\144\154\145\x58\x6d\154\x45\x72\162\x6f\162"));
        $QQ = new DOMDocument();
        $QQ->loadXML($Sk);
        restore_error_handler();
        $bI = $QQ->firstChild;
        if (!empty($bI)) {
            goto Ji;
        }
        if (!empty($_FILES["\155\x65\164\x61\144\x61\164\141\137\146\151\x6c\145"]["\164\x6d\160\x5f\156\141\155\145"])) {
            goto ia;
        }
        if (!empty($_POST["\x6d\145\164\141\x64\x61\164\141\137\x75\x72\154"])) {
            goto Lk;
        }
        update_option("\x6d\157\137\x73\141\x6d\154\137\x6d\145\x73\x73\141\x67\145", "\120\x6c\145\141\x73\145\x20\x70\162\x6f\166\x69\x64\x65\40\141\x20\x76\141\154\x69\x64\40\155\145\164\141\144\141\164\141\x20\x66\x69\x6c\x65\40\157\x72\40\x61\40\x76\141\x6c\x69\x64\40\125\x52\114\x2e");
        $this->mo_saml_show_error_message();
        return;
        goto iW;
        Lk:
        update_option("\x6d\x6f\x5f\163\141\x6d\x6c\137\x6d\145\x73\163\141\147\145", "\x50\x6c\x65\141\x73\x65\40\x70\x72\x6f\166\151\x64\x65\40\141\x20\166\141\x6c\151\x64\40\x6d\145\x74\141\x64\141\164\141\40\125\122\114\x2e");
        $this->mo_saml_show_error_message();
        iW:
        goto Ju;
        ia:
        update_option("\155\157\x5f\x73\141\x6d\154\x5f\x6d\x65\x73\x73\141\x67\145", "\120\154\x65\x61\x73\145\40\160\x72\157\166\x69\x64\x65\x20\x61\x20\x76\141\154\151\x64\x20\155\x65\164\x61\x64\x61\x74\141\40\146\x69\154\145\56");
        $this->mo_saml_show_error_message();
        Ju:
        goto Gb;
        Ji:
        $f1 = new IDPMetadataReader($QQ);
        $jE = $f1->getIdentityProviders();
        if (!empty($jE)) {
            goto HW;
        }
        update_option("\155\157\137\163\141\x6d\154\137\x6d\x65\163\163\141\147\x65", "\120\154\145\141\x73\145\40\x70\x72\x6f\166\151\144\x65\40\141\x20\166\x61\x6c\151\x64\40\155\x65\x74\141\x64\141\x74\x61\x20\146\151\154\145\x2e");
        $this->mo_saml_show_error_message();
        return;
        HW:
        foreach ($jE as $U6 => $Ti) {
            $JR = LicenseHelper::getCurrentOption(mo_options_enum_service_provider::Identity_name);
            if (!isset($_POST["\x73\x61\155\154\137\151\x64\145\156\164\x69\x74\171\x5f\155\x65\x74\x61\144\141\164\141\x5f\160\162\157\x76\151\144\145\162"])) {
                goto q0;
            }
            $JR = htmlspecialchars($_POST["\163\x61\x6d\x6c\137\151\144\145\x6e\164\x69\x74\171\x5f\155\145\164\141\144\141\164\141\137\160\x72\x6f\166\151\144\x65\162"]);
            q0:
            $SX = "\x48\x74\164\x70\122\x65\x64\x69\x72\145\x63\164";
            $gA = '';
            if (array_key_exists("\x48\124\x54\x50\x2d\122\x65\144\151\162\145\143\164", $Ti->getLoginDetails())) {
                goto HJ;
            }
            if (!array_key_exists("\110\124\124\120\x2d\x50\117\123\124", $Ti->getLoginDetails())) {
                goto eK;
            }
            $SX = "\110\164\164\160\120\157\163\x74";
            $gA = $Ti->getLoginURL("\110\124\124\120\x2d\120\x4f\123\x54");
            eK:
            goto LD;
            HJ:
            $gA = $Ti->getLoginURL("\x48\x54\x54\x50\x2d\x52\145\144\x69\162\x65\143\x74");
            LD:
            $gL = "\110\x74\x74\x70\122\145\x64\151\x72\145\x63\x74";
            $D4 = '';
            if (array_key_exists("\x48\x54\x54\120\x2d\122\145\144\x69\x72\145\x63\x74", $Ti->getLogoutDetails())) {
                goto hk;
            }
            if (!array_key_exists("\110\124\124\x50\x2d\120\117\123\124", $Ti->getLogoutDetails())) {
                goto QF;
            }
            $gL = "\110\164\164\x70\120\157\x73\164";
            $D4 = $Ti->getLogoutURL("\x48\x54\x54\x50\55\120\x4f\x53\124");
            QF:
            goto qz;
            hk:
            $D4 = $Ti->getLogoutURL("\110\124\124\120\55\x52\145\144\151\x72\145\143\x74");
            qz:
            $T8 = $Ti->getEntityID();
            $kC = $Ti->getSigningCertificate();
            if (!get_option("\155\157\x5f\x65\156\x61\x62\x6c\145\x5f\x6d\x75\x6c\164\151\x70\154\145\x5f\154\151\143\x65\x6e\163\x65\163")) {
                goto DP;
            }
            $cV = get_option("\155\x6f\x5f\163\x61\x6d\x6c\x5f\145\156\166\x69\x72\x6f\156\155\145\156\x74\137\x6f\142\152\145\143\164\163");
            $xM = LicenseHelper::getSelectedEnvironment();
            if (!isset($cV[$xM])) {
                goto wc;
            }
            $PC = $cV[$xM]->getPluginSettings();
            $PC[mo_options_enum_service_provider::Identity_name] = $JR;
            $PC[mo_options_enum_service_provider::Login_URL] = $gA;
            $PC[mo_options_enum_service_provider::Issuer] = $T8;
            $PC[mo_options_enum_service_provider::X509_certificate] = maybe_serialize($kC);
            $PC[mo_options_enum_service_provider::Logout_URL] = $D4;
            $PC[mo_options_enum_service_provider::Login_binding_type] = $SX;
            $PC[mo_options_enum_service_provider::Logout_binding_type] = $gL;
            $cV[$xM]->setPluginSettings($PC);
            update_option("\x6d\157\x5f\x73\141\155\154\137\x65\156\166\x69\x72\x6f\156\155\145\156\164\137\157\142\152\x65\x63\x74\x73", $cV);
            $t3 = LicenseHelper::getSelectedEnvironment();
            if (!($t3 and $t3 != LicenseHelper::getCurrentEnvironment())) {
                goto h8;
            }
            goto uE;
            h8:
            wc:
            DP:
            update_option("\x73\141\x6d\x6c\x5f\151\144\x65\x6e\164\x69\x74\x79\x5f\156\141\x6d\145", $JR);
            update_option("\163\141\x6d\154\137\154\157\x67\x69\156\137\142\x69\156\x64\151\156\x67\x5f\164\171\160\x65", $SX);
            update_option("\163\x61\x6d\154\137\x6c\157\147\151\156\137\x75\x72\x6c", $gA);
            update_option("\163\x61\x6d\x6c\x5f\x6c\x6f\x67\x6f\165\164\137\x62\151\x6e\x64\151\x6e\147\x5f\x74\x79\x70\x65", $gL);
            update_option("\163\141\155\x6c\137\154\157\147\x6f\165\164\137\x75\162\x6c", $D4);
            update_option("\163\x61\155\x6c\x5f\x69\x73\x73\x75\145\162", $T8);
            update_option("\163\x61\x6d\x6c\x5f\x6e\x61\155\145\151\x64\x5f\x66\157\x72\155\x61\164", "\x31\56\x31\x3a\x6e\x61\155\x65\151\x64\x2d\x66\x6f\162\155\x61\x74\72\165\156\163\x70\x65\x63\151\x66\x69\x65\x64");
            update_option("\x73\141\x6d\x6c\x5f\x78\65\60\x39\137\143\145\162\164\x69\146\151\143\x61\164\145", maybe_serialize($kC));
            goto uE;
            MV:
        }
        uE:
        update_option("\x6d\157\137\x73\x61\155\x6c\137\x6d\145\163\x73\141\147\145", "\111\x64\145\x6e\164\151\x74\171\40\x50\x72\x6f\166\151\144\x65\162\40\144\x65\x74\x61\151\x6c\x73\x20\x73\141\166\145\x64\40\163\165\x63\x63\145\x73\163\146\x75\154\154\171\56");
        $this->mo_saml_show_success_message();
        Gb:
    }
    function handleXmlError($Rj, $Ze, $y0, $LB)
    {
        if ($Rj == E_WARNING && substr_count($Ze, "\104\x4f\115\104\x6f\x63\165\155\x65\156\164\72\72\x6c\157\x61\144\130\x4d\x4c\x28\51") > 0) {
            goto AF;
        }
        return false;
        goto V8;
        AF:
        return;
        V8:
    }
    function mo_saml_plugin_action_links($k7)
    {
        $k7 = array_merge(array("\74\x61\40\150\162\x65\x66\75\x22" . esc_url(admin_url("\141\144\155\151\x6e\x2e\160\150\x70\x3f\160\141\147\x65\x3d\x6d\157\x5f\163\141\x6d\x6c\137\x73\145\164\x74\x69\156\147\163")) . "\x22\x3e" . __("\123\x65\x74\164\x69\x6e\147\x73", "\164\x65\x78\x74\144\157\155\x61\151\x6e") . "\x3c\57\x61\76"), $k7);
        return $k7;
    }
    function checkPasswordPattern($Ek)
    {
        $Y5 = "\x2f\136\x5b\50\134\167\51\52\50\134\41\x5c\x40\134\43\x5c\x24\134\45\x5c\136\x5c\x26\x5c\x2a\x5c\x2e\x5c\x2d\x5c\137\51\x2a\135\53\44\57";
        return !preg_match($Y5, $Ek);
    }
    function mo_saml_parse_expiry_date($yC)
    {
        $a2 = new DateTime($yC);
        $Wk = $a2->getTimestamp();
        return date("\106\40\x6a\54\40\x59", $Wk);
    }
}
new saml_mo_login();

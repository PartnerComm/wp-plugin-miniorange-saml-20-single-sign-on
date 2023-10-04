<?php
/**
 * This file is a part of the miniorange-saml-20-single-sign-on plugin.
 *
 * @link https://plugins.miniorange.com/
 * @author miniOrange
 * @package miniorange-saml-20-single-sign-on
 */


require_once Mo_Saml_Plugin_Files::UTILITIES;
require_once Mo_Saml_Plugin_Files::RESPONSE;
require_once Mo_Saml_Plugin_Files::LOGOUT_REQUEST;
require_once Mo_Saml_Plugin_Files::XML_SEC_LIBS;
require_once Mo_Saml_Plugin_Files::CONFIG_UTILITY;
use RobRichards\XMLSecLibs\XMLSecurityKey;
use RobRichards\XMLSecLibs\XMLSecurityDSig;
use RobRichards\XMLSecLibs\XMLSecEnc;
if (class_exists("\101\105\123\105\x6e\x63\x72\x79\x70\x74\151\x6f\156")) {
    goto gc;
}
require_once Mo_Saml_Plugin_Files::ENCRYPTION;
gc:
class mo_login_wid extends WP_Widget
{
    public function __construct()
    {
        $ys = LicenseHelper::getCurrentOption(Mo_Saml_Options_Enum_Service_Provider::IDENTITY_NAME);
        parent::__construct("\x53\141\155\154\x5f\x4c\x6f\x67\x69\x6e\x5f\x57\x69\144\147\x65\x74", "\114\157\x67\151\156\40\x77\x69\164\150\40" . $ys, array("\144\145\163\143\162\151\x70\x74\151\157\x6e" => __("\x54\150\151\x73\x20\x69\x73\40\x61\40\155\151\156\x69\x4f\x72\x61\x6e\147\145\x20\123\101\x4d\x4c\x20\x6c\157\147\151\156\x20\167\151\144\147\145\x74\x2e", "\155\x6f\163\x61\x6d\154")));
    }
    public function widget($mH, $rh)
    {
        extract($mH);
        $qP = '';
        if (empty($rh["\167\x69\144\x5f\x74\x69\x74\x6c\145"])) {
            goto ll;
        }
        $qP = apply_filters("\x77\x69\x64\147\x65\164\137\x74\x69\164\x6c\x65", $rh["\167\151\144\137\164\x69\164\154\145"]);
        ll:
        echo $mH["\142\145\146\x6f\162\145\137\x77\x69\144\x67\145\164"];
        if (empty($qP)) {
            goto u8;
        }
        echo $mH["\142\145\146\157\x72\145\137\x74\x69\164\x6c\145"] . $qP . $mH["\141\146\x74\x65\x72\137\x74\151\x74\154\x65"];
        u8:
        $this->loginForm();
        echo $mH["\x61\146\164\x65\x72\137\x77\x69\x64\x67\145\x74"];
    }
    public function update($Ei, $wV)
    {
        $rh = array();
        $rh["\x77\x69\144\x5f\164\151\x74\x6c\x65"] = strip_tags($Ei["\x77\151\x64\137\164\151\164\154\x65"]);
        return $rh;
    }
    public function form($rh)
    {
        $qP = '';
        if (empty($rh["\x77\x69\144\137\x74\151\164\154\x65"])) {
            goto xb;
        }
        $qP = $rh["\167\x69\144\137\164\x69\164\x6c\145"];
        xb:
        echo "\xd\xa\x9\x9\74\x70\x3e\74\154\141\142\x65\154\40\x66\x6f\x72\x3d\42" . $this->get_field_id("\167\151\x64\x5f\164\151\x74\154\x65") . "\40\42\76" . _e("\x54\151\x74\154\x65\x3a") . "\40\74\57\x6c\141\142\145\x6c\x3e\xd\12\11\x9\x3c\151\x6e\x70\165\x74\x20\143\154\141\163\x73\75\42\167\151\x64\145\x66\x61\x74\42\40\x69\x64\x3d\42" . $this->get_field_id("\x77\x69\144\x5f\x74\x69\164\x6c\x65") . "\x22\x20\x6e\x61\155\x65\75\x22" . $this->get_field_name("\x77\151\x64\137\164\x69\164\154\145") . "\42\40\x74\x79\x70\x65\x3d\x22\164\x65\170\164\42\x20\166\x61\x6c\x75\145\x3d\x22" . $qP . "\42\40\x2f\x3e\xd\xa\11\x9\x3c\57\160\x3e";
    }
    public function loginForm()
    {
        global $post;
        $Kg = SAMLSPUtilities::mo_saml_is_user_logged_in();
        if (!$Kg) {
            goto Ut;
        }
        $current_user = wp_get_current_user();
        $yh = "\110\x65\x6c\154\x6f\x2c";
        if (!get_option("\155\157\137\163\141\155\x6c\137\143\165\163\x74\x6f\x6d\x5f\147\162\x65\x65\x74\151\156\147\x5f\164\x65\x78\x74")) {
            goto hB;
        }
        $yh = get_option("\155\x6f\x5f\x73\141\x6d\154\137\x63\x75\x73\164\157\155\137\x67\x72\x65\x65\164\151\x6e\147\137\164\145\170\x74");
        hB:
        $kU = '';
        if (!get_option("\155\x6f\137\x73\x61\155\x6c\137\147\x72\145\145\164\151\156\x67\137\156\141\155\x65")) {
            goto NU;
        }
        switch (get_option("\x6d\157\x5f\163\x61\x6d\154\137\x67\162\145\145\164\x69\x6e\147\137\156\x61\x6d\x65")) {
            case "\x55\123\x45\x52\116\x41\x4d\x45":
                $kU = $current_user->user_login;
                goto QI;
            case "\105\x4d\x41\111\x4c":
                $kU = $current_user->user_email;
                goto QI;
            case "\x46\x4e\x41\x4d\105":
                $kU = $current_user->user_firstname;
                goto QI;
            case "\x4c\116\101\115\105":
                $kU = $current_user->user_lastname;
                goto QI;
            case "\x46\116\101\115\x45\137\114\x4e\101\x4d\105":
                $kU = $current_user->user_firstname . "\40" . $current_user->user_lastname;
                goto QI;
            case "\x4c\x4e\x41\115\105\137\106\x4e\101\115\105":
                $kU = $current_user->user_lastname . "\40" . $current_user->user_firstname;
                goto QI;
            default:
                $kU = $current_user->user_login;
        }
        XN:
        QI:
        NU:
        $kU = trim($kU);
        if (!empty($kU)) {
            goto Co;
        }
        $kU = $current_user->user_login;
        Co:
        $ie = $yh . "\40" . $kU;
        $nK = "\x4c\x6f\147\x6f\x75\164";
        if (!get_option("\x6d\x6f\137\x73\x61\155\154\137\143\x75\x73\164\x6f\155\137\154\157\x67\x6f\x75\164\x5f\x74\x65\170\x74")) {
            goto jT;
        }
        $nK = get_option("\x6d\x6f\137\163\141\155\x6c\x5f\x63\x75\163\x74\157\x6d\x5f\154\x6f\x67\x6f\165\164\x5f\x74\x65\x78\164");
        jT:
        echo $ie . "\40\x7c\x20\74\141\40\x68\162\145\x66\75\42" . wp_logout_url(home_url()) . "\42\40\x74\x69\x74\x6c\x65\x3d\x22\154\x6f\147\x6f\x75\164\x22\40\76" . $nK . "\x3c\x2f\x61\76\74\x2f\154\x69\76";
        goto Ve;
        Ut:
        $d9 = saml_get_current_page_url();
        echo "\15\12\11\11\74\x73\x63\162\x69\160\x74\x3e\xd\xa\11\x9\x66\x75\156\x63\164\151\x6f\x6e\40\x73\x75\x62\x6d\x69\x74\123\x61\155\154\x46\x6f\x72\155\x28\51\173\x20\144\157\x63\x75\155\x65\156\164\56\x67\x65\164\x45\154\x65\155\x65\156\164\x42\x79\111\144\x28\x22\x6d\x69\x6e\x69\157\162\x61\156\147\x65\x2d\163\141\x6d\154\x2d\x73\x70\x2d\163\163\157\55\154\157\147\x69\x6e\x2d\146\157\x72\x6d\42\x29\56\x73\165\x62\x6d\x69\164\50\x29\x3b\x20\175\xd\xa\11\11\x3c\57\163\143\x72\151\x70\x74\76\15\xa\x9\x9\74\x66\x6f\162\x6d\40\156\141\x6d\x65\x3d\x22\155\x69\x6e\x69\157\x72\141\156\147\x65\55\x73\x61\155\x6c\x2d\x73\160\55\x73\x73\157\55\x6c\x6f\147\x69\x6e\55\146\x6f\162\155\42\40\x69\x64\75\x22\x6d\151\156\151\157\162\141\156\x67\x65\x2d\x73\141\155\154\x2d\163\160\55\163\163\x6f\55\x6c\x6f\147\151\x6e\55\146\157\162\x6d\x22\40\x6d\145\x74\150\x6f\x64\75\42\160\157\x73\164\x22\x20\141\x63\164\x69\x6f\x6e\x3d\x22\x22\x3e\xd\xa\x9\x9\74\151\x6e\160\165\x74\x20\164\171\x70\x65\75\x22\x68\x69\x64\144\145\x6e\x22\40\156\x61\155\145\75\42\157\x70\x74\151\x6f\156\x22\x20\166\x61\154\x75\x65\75\42\x73\x61\155\154\137\165\x73\145\162\x5f\x6c\157\147\151\x6e\x22\40\x2f\x3e\15\xa\x9\11\x3c\x69\x6e\160\x75\164\40\164\x79\x70\x65\75\x22\150\x69\144\144\145\156\x22\40\156\x61\155\x65\x3d\42\x72\145\x64\151\x72\145\x63\164\x5f\x74\x6f\42\40\166\141\x6c\x75\145\x3d\42" . $d9 . "\42\40\x2f\76\15\xa\xd\12\11\11\74\x66\157\156\x74\x20\163\x69\172\x65\x3d\x22\53\x31\42\40\x73\x74\x79\154\145\x3d\x22\x76\145\x72\164\151\x63\141\x6c\55\x61\x6c\x69\147\156\72\x74\157\x70\x3b\x22\76\x20\x3c\x2f\x66\157\156\164\x3e";
        $ws = LicenseHelper::getCurrentOption(Mo_Saml_Options_Enum_Service_Provider::IDENTITY_NAME);
        if (!empty($ws)) {
            goto oH;
        }
        echo "\120\x6c\x65\x61\163\x65\40\x63\157\x6e\146\x69\x67\165\162\145\x20\x74\150\145\40\x6d\x69\x6e\151\x4f\162\141\156\x67\145\40\123\101\115\x4c\x20\120\154\x75\x67\x69\x6e\40\x66\151\162\163\164\56";
        goto tK;
        oH:
        $mp = "\114\157\x67\x69\x6e\x20\167\151\x74\x68\x20\x23\43\x49\104\120\x23\x23";
        if (!get_option("\155\157\x5f\x73\141\155\x6c\137\x63\165\163\164\157\155\137\154\157\147\151\x6e\x5f\164\145\x78\164")) {
            goto FM;
        }
        $mp = get_option("\155\157\137\x73\141\155\154\137\143\x75\x73\164\157\x6d\137\x6c\x6f\x67\151\x6e\137\164\145\x78\x74");
        FM:
        $mp = str_replace("\43\43\111\x44\x50\43\x23", $ws, $mp);
        $Rd = false;
        if (!get_option("\x6d\x6f\137\163\x61\155\154\137\x75\163\145\137\x62\165\164\x74\157\x6e\137\x61\163\137\x77\151\144\x67\145\x74")) {
            goto eK;
        }
        if (!(get_option("\x6d\x6f\137\x73\141\x6d\x6c\x5f\165\x73\145\137\142\165\x74\164\157\156\137\x61\x73\x5f\167\151\x64\147\x65\x74") == "\164\162\x75\x65")) {
            goto CX;
        }
        $Rd = true;
        CX:
        eK:
        if (!$Rd) {
            goto Lm;
        }
        $Xs = get_option("\155\157\x5f\163\x61\x6d\154\137\x62\165\164\x74\157\156\x5f\167\151\144\x74\150") ? get_option("\155\157\137\163\141\155\x6c\137\142\165\x74\x74\x6f\156\x5f\x77\151\144\164\x68") : "\61\60\60";
        $vB = get_option("\x6d\157\137\163\x61\155\x6c\137\x62\x75\164\164\157\x6e\137\x68\x65\151\147\150\164") ? get_option("\x6d\157\137\163\141\x6d\154\x5f\x62\x75\164\x74\x6f\x6e\137\150\x65\151\147\150\164") : "\x35\60";
        $kx = get_option("\x6d\x6f\x5f\x73\141\155\x6c\137\142\165\x74\x74\x6f\156\137\163\x69\x7a\x65") ? get_option("\x6d\157\137\163\141\x6d\x6c\137\x62\165\164\x74\157\x6e\137\x73\151\x7a\145") : "\x35\60";
        $Gg = get_option("\x6d\x6f\x5f\163\141\155\154\x5f\142\x75\x74\164\157\x6e\137\x63\165\x72\166\145") ? get_option("\x6d\x6f\x5f\x73\141\x6d\x6c\137\x62\x75\164\x74\x6f\156\x5f\x63\165\x72\166\145") : "\65";
        $Ug = get_option("\155\157\137\163\x61\x6d\x6c\x5f\x62\165\x74\164\157\156\137\143\157\154\x6f\x72") ? get_option("\x6d\x6f\137\163\141\155\154\x5f\142\165\164\x74\157\x6e\x5f\143\157\154\x6f\x72") : "\x30\60\x38\65\142\x61";
        $D0 = get_option("\155\157\x5f\x73\141\x6d\x6c\137\142\165\x74\x74\x6f\x6e\137\164\150\145\x6d\x65") ? get_option("\x6d\x6f\x5f\163\141\155\154\137\142\x75\164\x74\x6f\x6e\x5f\164\150\145\155\145") : "\154\157\156\x67\x62\x75\x74\x74\157\x6e";
        $Gz = !empty($_SESSION["\155\x6f\137\x67\x75\145\x73\x74\137\154\x6f\147\151\156"]["\154\x6f\x67\x67\145\x64\x5f\x69\x6e\x5f\x69\144\160\x5f\156\141\155\x65"]) ? $_SESSION["\155\157\137\147\165\x65\x73\164\x5f\x6c\157\147\x69\x6e"]["\x6c\157\x67\147\x65\144\x5f\x69\x6e\137\151\144\x70\x5f\x6e\x61\x6d\145"] : LicenseHelper::getCurrentOption(Mo_Saml_Options_Enum_Service_Provider::IDENTITY_NAME);
        $QL = get_option("\x6d\157\137\x73\141\155\x6c\137\x62\165\164\164\157\x6e\137\164\145\170\x74") ? get_option("\x6d\x6f\137\163\141\155\x6c\x5f\x62\165\x74\164\157\x6e\x5f\x74\145\x78\164") : ($Gz ? $Gz : "\114\x6f\x67\x69\x6e");
        $vM = get_option("\155\157\x5f\x73\141\x6d\x6c\x5f\146\x6f\156\x74\x5f\x63\157\x6c\157\162") ? get_option("\155\x6f\x5f\x73\x61\155\154\x5f\x66\157\x6e\164\x5f\x63\x6f\154\x6f\x72") : "\x66\x66\x66\146\146\146";
        $pw = get_option("\x6d\x6f\x5f\163\141\155\x6c\x5f\x66\x6f\156\x74\137\163\x69\172\x65") ? get_option("\155\x6f\x5f\163\141\x6d\154\137\146\157\x6e\164\x5f\x73\151\172\x65") : "\62\60";
        $mp = "\x3c\x69\156\160\165\x74\40\164\171\160\x65\75\42\x62\165\x74\x74\x6f\x6e\x22\40\156\x61\155\145\x3d\x22\x6d\157\137\163\141\x6d\154\137\167\x70\137\x73\163\x6f\x5f\142\165\164\164\x6f\156\42\x20\166\x61\x6c\x75\145\75\42" . $QL . "\42\x20\x73\164\x79\154\145\x3d\x22";
        $EB = '';
        if ($D0 == "\x6c\x6f\156\147\142\x75\x74\x74\x6f\156") {
            goto MG;
        }
        if ($D0 == "\x63\151\162\143\x6c\145") {
            goto ke;
        }
        if ($D0 == "\157\x76\x61\x6c") {
            goto iL;
        }
        if ($D0 == "\163\161\x75\x61\162\x65") {
            goto J1;
        }
        goto t6;
        ke:
        $EB = $EB . "\x77\151\x64\x74\x68\72" . $kx . "\160\x78\x3b";
        $EB = $EB . "\150\145\x69\147\x68\164\72" . $kx . "\x70\170\x3b";
        $EB = $EB . "\x62\x6f\162\x64\145\x72\55\162\141\144\151\165\163\72\71\71\71\160\x78\73";
        goto t6;
        iL:
        $EB = $EB . "\x77\151\144\x74\x68\x3a" . $kx . "\160\x78\73";
        $EB = $EB . "\x68\145\x69\147\x68\164\72" . $kx . "\160\170\x3b";
        $EB = $EB . "\x62\157\162\x64\145\162\55\162\x61\x64\x69\165\x73\72\65\x70\x78\x3b";
        goto t6;
        J1:
        $EB = $EB . "\167\x69\144\x74\150\72" . $kx . "\160\170\x3b";
        $EB = $EB . "\x68\x65\151\147\x68\164\x3a" . $kx . "\160\170\73";
        $EB = $EB . "\142\x6f\162\144\x65\162\55\162\x61\x64\x69\165\163\x3a\x30\160\170\x3b";
        t6:
        goto Of;
        MG:
        $EB = $EB . "\x77\x69\144\164\x68\72" . $Xs . "\x70\170\x3b";
        $EB = $EB . "\150\145\x69\147\150\164\72" . $vB . "\x70\170\x3b";
        $EB = $EB . "\142\x6f\162\x64\145\x72\x2d\x72\141\144\151\x75\163\72" . $Gg . "\x70\170\x3b";
        Of:
        $EB = $EB . "\142\141\143\x6b\147\162\157\x75\x6e\x64\55\x63\157\154\x6f\162\72\43" . $Ug . "\x3b";
        $EB = $EB . "\x62\x6f\162\144\x65\x72\55\x63\157\154\x6f\x72\72\x74\162\x61\x6e\x73\x70\141\162\x65\x6e\164\73";
        $EB = $EB . "\x63\157\x6c\157\x72\x3a\43" . $vM . "\x3b";
        $EB = $EB . "\146\157\156\164\55\163\x69\172\145\72" . $pw . "\x70\170\73";
        $EB = $EB . "\160\x61\x64\144\151\x6e\147\72\x30\160\170\73";
        $mp = $mp . $EB . "\x22\x2f\x3e";
        Lm:
        echo "\40\x3c\x61\x20\150\x72\x65\146\75\42\43\x22\40\157\x6e\103\154\x69\x63\153\75\x22\163\165\142\x6d\x69\x74\123\x61\155\x6c\x46\157\x72\x6d\50\51\42\76";
        echo $mp;
        echo "\74\x2f\x61\76\x3c\x2f\x66\x6f\x72\155\76\x20";
        tK:
        echo "\11\x3c\x2f\165\154\76\xd\xa\11\11\x3c\x2f\146\157\x72\x6d\x3e";
        Ve:
    }
    public function mo_saml_widget_init()
    {
        if (!(defined("\x57\120\x5f\x43\114\x49") && WP_CLI)) {
            goto up;
        }
        require_once Mo_Saml_Plugin_Files::WP_CLI_COMMANDS;
        up:
        if (!(isset($_REQUEST["\157\160\164\x69\157\x6e"]) and $_REQUEST["\x6f\x70\164\151\157\x6e"] == "\163\141\x6d\x6c\137\x75\163\x65\x72\x5f\x6c\157\147\x6f\165\164")) {
            goto ZQ;
        }
        $user = is_user_logged_in() ? wp_get_current_user() : null;
        if (empty($user)) {
            goto nN;
        }
        wp_logout();
        nN:
        ZQ:
    }
    function mo_saml_logout($Kn, $d9 = '')
    {
        if (!(0 === $Kn)) {
            goto Cd;
        }
        return;
        Cd:
        if (!(!session_id() || session_id() == '' || empty($_SESSION))) {
            goto e9;
        }
        session_start();
        e9:
        if (!(empty($_COOKIE["\x6c\x6f\x67\147\145\x64\137\151\156\x5f\167\151\x74\150\137\x69\144\160"]) && empty($_SESSION["\x6d\157\137\163\x61\x6d\154"]["\x6c\x6f\147\x67\145\144\x5f\151\156\x5f\167\151\164\x68\x5f\x69\144\160"]))) {
            goto nX;
        }
        return $d9;
        nX:
        $user = get_user_by("\151\144", $Kn);
        $Jj = htmlspecialchars_decode(LicenseHelper::getCurrentOption(Mo_Saml_Options_Enum_Service_Provider::LOGOUT_URL));
        $tn = LicenseHelper::getCurrentOption(Mo_Saml_Options_Enum_Service_Provider::LOGOUT_BINDING_TYPE);
        $bg = wp_get_referer();
        $j1 = get_option("\x6d\x6f\x5f\163\x61\x6d\x6c\x5f\x73\x70\x5f\x62\x61\163\x65\x5f\165\162\x6c");
        $YI = false;
        if (!empty($bg)) {
            goto zu;
        }
        $bg = !empty($j1) ? $j1 : home_url();
        zu:
        if (empty($Jj)) {
            goto Lk;
        }
        if (!empty($_SESSION["\x6d\x6f\x5f\163\x61\x6d\154\137\154\x6f\147\x6f\x75\164\137\x72\145\x71\x75\145\x73\x74"])) {
            goto mH;
        }
        $current_user = $user;
        if (!empty($_SESSION["\155\157\x5f\147\x75\x65\x73\164\x5f\x6c\157\x67\151\156"]["\x6e\x61\x6d\x65\x49\x44"])) {
            goto Fp;
        }
        if (!empty($_COOKIE["\x6e\x61\155\145\111\x44"])) {
            goto KZ;
        }
        $Ag = get_user_meta($current_user->ID, "\155\157\x5f\x73\141\x6d\154\137\x6e\x61\x6d\145\137\151\x64");
        goto qZ;
        KZ:
        $Ag = $_COOKIE["\x6e\x61\155\x65\x49\104"];
        qZ:
        goto Nx;
        Fp:
        $Ag = $_SESSION["\x6d\157\x5f\147\x75\x65\163\164\137\154\x6f\147\151\x6e"]["\x6e\141\155\x65\111\x44"];
        Nx:
        if (!empty($_SESSION["\155\157\137\147\165\145\x73\x74\x5f\154\157\x67\x69\x6e"]["\x73\x65\x73\x73\151\157\x6e\111\x6e\x64\145\170"])) {
            goto sD;
        }
        if (!empty($_COOKIE["\x73\145\x73\163\151\x6f\156\x49\x6e\x64\145\x78"])) {
            goto rg;
        }
        $bZ = get_user_meta($current_user->ID, "\155\157\137\163\x61\x6d\154\137\163\x65\x73\x73\151\x6f\156\137\x69\x6e\144\x65\x78");
        goto fX;
        rg:
        $bZ = $_COOKIE["\163\145\x73\x73\x69\157\156\111\156\x64\x65\x78"];
        fX:
        goto vp;
        sD:
        $bZ = $_SESSION["\155\157\x5f\147\x75\x65\x73\x74\137\x6c\x6f\x67\151\156"]["\163\x65\x73\163\151\157\156\x49\156\144\145\x78"];
        vp:
        if (empty($Ag)) {
            goto FV;
        }
        SAMLSPUtilities::mo_saml_delete_plugin_cookies();
        mo_saml_create_logout_request($Ag, $bZ, $Jj, $tn, $bg);
        FV:
        goto D9;
        mH:
        self::createLogoutResponseAndRedirect($Jj, $tn);
        exit;
        D9:
        Lk:
        SAMLSPUtilities::mo_saml_delete_plugin_cookies();
        $Zm = get_option("\155\x6f\137\163\141\155\154\137\154\157\x67\157\165\x74\x5f\x72\145\x6c\x61\x79\137\163\164\x61\x74\x65");
        if (empty($Zm)) {
            goto hu;
        }
        wp_redirect($Zm);
        exit;
        hu:
        wp_redirect($bg);
        exit;
    }
    function createLogoutResponseAndRedirect($Jj, $tn)
    {
        $j1 = get_option("\x6d\157\x5f\163\141\155\x6c\137\163\x70\x5f\x62\141\163\x65\137\165\162\154");
        if (!empty($j1)) {
            goto gD;
        }
        $j1 = home_url();
        gD:
        $i0 = $_SESSION["\x6d\x6f\x5f\x73\141\155\154\137\154\157\x67\x6f\x75\x74\137\x72\145\x71\165\145\x73\x74"];
        $d2 = $_SESSION["\x6d\x6f\137\163\141\155\154\137\154\157\x67\157\x75\164\x5f\162\x65\154\x61\171\x5f\163\164\141\164\x65"];
        unset($_SESSION["\x6d\x6f\137\x73\141\x6d\154\137\154\157\x67\157\165\164\137\162\x65\161\x75\145\163\164"]);
        unset($_SESSION["\x6d\157\137\163\x61\x6d\154\137\x6c\x6f\147\x6f\165\x74\x5f\x72\145\x6c\x61\171\137\x73\x74\x61\164\145"]);
        $tR = SAMLSPUtilities::mo_saml_safe_load_xml($i0);
        if (!(is_string($tR) && strpos($tR, "\127\120\123\101\115\x4c\105\x52\122") !== false)) {
            goto Bo;
        }
        mo_saml_display_end_user_error_message_with_code(Mo_Saml_Error_Codes::$error_codes[$tR]);
        Bo:
        $i0 = $tR->firstChild;
        if (!($i0->localName == "\x4c\157\x67\157\165\164\122\x65\161\x75\145\x73\164")) {
            goto E0;
        }
        $j8 = new SAML2SPLogoutRequest($i0);
        $g8 = get_option("\x6d\157\x5f\x73\141\x6d\154\137\x73\160\137\x65\156\164\151\x74\171\137\x69\x64");
        if (!empty($g8)) {
            goto hM;
        }
        $g8 = $j1 . "\x2f\167\160\x2d\x63\x6f\156\164\x65\156\x74\x2f\x70\154\165\147\151\x6e\x73\57\155\151\156\151\157\x72\141\x6e\x67\x65\55\x73\141\155\154\x2d\62\60\x2d\x73\x69\156\x67\x6c\x65\x2d\x73\x69\x67\x6e\55\x6f\156\57";
        hM:
        $Mp = $Jj;
        $pM = SAMLSPUtilities::createLogoutResponse($j8->getId(), $g8, $Mp, $tn);
        if (empty($tn) || $tn == "\x48\x74\x74\x70\x52\x65\x64\151\162\x65\x63\164") {
            goto ee;
        }
        if (!(LicenseHelper::getCurrentOption(Mo_Saml_Options_Enum_Service_Provider::REQUEST_SIGNED) != "\x63\150\x65\x63\153\x65\x64")) {
            goto nQ;
        }
        $ru = base64_encode($pM);
        SAMLSPUtilities::postSAMLResponse($Jj, $ru, $d2);
        exit;
        nQ:
        $XD = '';
        $NH = '';
        $ru = SAMLSPUtilities::signXML($pM, "\x53\x74\141\164\165\163");
        SAMLSPUtilities::postSAMLResponse($Jj, $ru, $d2);
        goto D7;
        ee:
        $ZB = $Jj;
        if (strpos($Jj, "\77") !== false) {
            goto UE;
        }
        $ZB .= "\77";
        goto dY;
        UE:
        $ZB .= "\46";
        dY:
        if (!(LicenseHelper::getCurrentOption(Mo_Saml_Options_Enum_Service_Provider::REQUEST_SIGNED) != "\143\150\x65\x63\x6b\x65\x64")) {
            goto V0;
        }
        $ZB .= "\x53\x41\115\114\x52\145\x73\x70\x6f\x6e\163\x65\x3d" . $pM . "\x26\x52\x65\154\x61\171\123\x74\x61\164\x65\x3d" . urlencode($d2);
        header("\x4c\157\143\141\164\151\x6f\x6e\72\x20" . $ZB);
        exit;
        V0:
        $Jk = "\123\101\115\114\x52\145\x73\160\157\x6e\163\x65\75" . $pM . "\46\122\145\154\x61\171\123\x74\141\x74\145\75" . urlencode($d2) . "\46\123\151\x67\101\154\147\75" . urlencode(XMLSecurityKey::RSA_SHA256);
        $t8 = array("\x74\171\x70\x65" => "\x70\162\x69\166\x61\164\145");
        $mr = new XMLSecurityKey(XMLSecurityKey::RSA_SHA256, $t8);
        $UZ = get_option("\x6d\x6f\x5f\163\x61\x6d\x6c\x5f\x63\165\162\162\x65\x6e\164\x5f\143\145\x72\164\x5f\x70\162\x69\x76\x61\x74\x65\x5f\153\145\171");
        $mr->loadKey($UZ, FALSE);
        $N2 = new XMLSecurityDSig();
        $UR = $mr->signData($Jk);
        $UR = base64_encode($UR);
        $ZB .= $Jk . "\x26\x53\x69\x67\x6e\141\x74\x75\x72\145\75" . urlencode($UR);
        header("\x4c\157\143\x61\164\151\157\x6e\x3a\x20" . $ZB);
        exit;
        D7:
        E0:
    }
}
function mo_saml_create_logout_request($Ag, $bZ, $Jj, $tn, $bg)
{
    $j1 = get_option("\155\157\x5f\x73\141\x6d\x6c\137\x73\160\x5f\x62\141\x73\x65\x5f\165\162\x6c");
    if (!empty($j1)) {
        goto bf;
    }
    $j1 = home_url();
    bf:
    $g8 = get_option("\155\x6f\x5f\x73\x61\155\154\x5f\163\x70\137\145\x6e\x74\151\x74\x79\137\x69\144");
    if (!empty($g8)) {
        goto yB;
    }
    $g8 = $j1 . "\x2f\167\160\55\143\157\156\164\145\x6e\164\x2f\160\x6c\165\147\151\156\x73\57\x6d\151\x6e\x69\157\x72\x61\x6e\147\145\55\163\141\x6d\x6c\55\x32\60\55\163\151\156\x67\x6c\x65\x2d\x73\x69\147\156\55\x6f\156\57";
    yB:
    $Mp = $Jj;
    $xl = $bg;
    $xl = mo_saml_get_relay_state($xl);
    $Jk = SAMLSPUtilities::createLogoutRequest($Ag, $g8, $Mp, $bZ, $tn);
    if (empty($tn) || $tn == "\x48\x74\164\160\x52\145\144\151\x72\145\143\x74") {
        goto ca;
    }
    if (!(LicenseHelper::getCurrentOption(Mo_Saml_Options_Enum_Service_Provider::REQUEST_SIGNED) != "\143\150\145\x63\153\x65\144")) {
        goto cd;
    }
    $ru = base64_encode($Jk);
    SAMLSPUtilities::postSAMLRequest($Jj, $ru, $xl);
    exit;
    cd:
    $XD = '';
    $NH = '';
    $ru = SAMLSPUtilities::signXML($Jk, "\116\x61\155\145\111\x44");
    SAMLSPUtilities::postSAMLRequest($Jj, $ru, $xl);
    goto nm;
    ca:
    $ZB = $Jj;
    if (strpos($Jj, "\x3f") !== false) {
        goto NC;
    }
    $ZB .= "\x3f";
    goto VX;
    NC:
    $ZB .= "\x26";
    VX:
    if (!(LicenseHelper::getCurrentOption(Mo_Saml_Options_Enum_Service_Provider::REQUEST_SIGNED) != "\x63\150\x65\x63\x6b\145\144")) {
        goto JI;
    }
    $ZB .= "\123\x41\115\114\x52\x65\x71\x75\145\x73\x74\75" . $Jk . "\x26\122\x65\154\x61\171\123\x74\x61\164\x65\75" . urlencode($xl);
    header("\114\157\x63\x61\164\x69\x6f\x6e\x3a\40" . $ZB);
    exit;
    JI:
    $Jk = "\x53\x41\x4d\114\122\x65\x71\x75\145\163\164\75" . $Jk . "\x26\122\x65\x6c\141\171\123\x74\x61\164\145\75" . urlencode($xl) . "\x26\x53\x69\147\x41\154\147\75" . urlencode(XMLSecurityKey::RSA_SHA256);
    $t8 = array("\164\x79\160\145" => "\160\x72\151\x76\x61\164\145");
    $mr = new XMLSecurityKey(XMLSecurityKey::RSA_SHA256, $t8);
    $UZ = get_option("\x6d\x6f\x5f\x73\x61\155\154\x5f\x63\165\x72\162\145\156\x74\x5f\143\x65\162\164\137\160\x72\x69\166\141\x74\145\x5f\153\145\x79");
    $mr->loadKey($UZ, FALSE);
    $N2 = new XMLSecurityDSig();
    $UR = $mr->signData($Jk);
    $UR = base64_encode($UR);
    $ZB .= $Jk . "\x26\x53\x69\x67\156\x61\x74\165\162\x65\75" . urlencode($UR);
    header("\114\x6f\x63\x61\164\151\157\x6e\x3a\x20" . $ZB);
    exit;
    nm:
}
function mo_login_validate()
{
    if (Mo_Saml_License_Utility::is_customer_license_valid(false, false)) {
        goto u1;
    }
    return;
    u1:
    if (!(isset($_REQUEST["\x6f\x70\x74\x69\157\156"]) && $_REQUEST["\x6f\x70\x74\151\x6f\x6e"] == "\155\157\x73\141\x6d\154\x5f\x6d\145\164\141\x64\x61\164\x61" && Mo_Saml_License_Utility::is_customer_license_valid())) {
        goto bQ;
    }
    miniorange_generate_metadata();
    bQ:
    if (!(isset($_REQUEST["\157\160\164\151\157\x6e"]) && $_REQUEST["\157\160\164\151\x6f\156"] == "\145\170\160\157\x72\x74\x5f\143\x6f\156\x66\151\147\165\162\141\164\151\x6f\156")) {
        goto yp;
    }
    if (!(current_user_can("\x6d\141\x6e\141\147\x65\x5f\157\x70\164\x69\x6f\x6e\x73") && Mo_Saml_License_Utility::is_customer_license_valid())) {
        goto TP;
    }
    miniorange_import_export(true);
    TP:
    exit;
    yp:
    if (!(isset($_REQUEST["\157\x70\x74\x69\157\x6e"]) && $_REQUEST["\157\160\164\151\157\x6e"] == "\163\141\155\x6c\x5f\x75\163\145\162\137\154\x6f\x67\x69\156" || isset($_REQUEST["\x6f\160\164\x69\157\x6e"]) && $_REQUEST["\157\160\164\x69\157\x6e"] == "\164\145\163\164\151\144\x70\143\157\x6e\x66\x69\x67")) {
        goto ZP;
    }
    if (!mo_saml_is_sp_configured()) {
        goto Zq;
    }
    if (!(is_user_logged_in() && $_REQUEST["\x6f\x70\164\151\x6f\x6e"] == "\x73\141\155\x6c\137\165\x73\x65\x72\137\154\157\x67\x69\x6e")) {
        goto jV;
    }
    if (empty($_REQUEST["\x72\x65\x64\151\x72\145\x63\164\x5f\164\x6f"])) {
        goto Ta;
    }
    $GF = htmlspecialchars($_REQUEST["\x72\145\144\x69\x72\145\x63\164\137\164\x6f"]);
    wp_safe_redirect($GF);
    exit;
    Ta:
    return;
    jV:
    $j1 = get_option("\155\157\x5f\163\x61\155\154\137\x73\160\137\x62\141\x73\x65\137\165\x72\x6c");
    if (!empty($j1)) {
        goto Bu;
    }
    $j1 = home_url();
    Bu:
    if (isset($_REQUEST["\151\x64\x70"]) and !empty($_REQUEST["\151\x64\160"])) {
        goto vc;
    }
    $EQ = '';
    goto Ry;
    vc:
    $EQ = htmlspecialchars($_REQUEST["\151\144\160"]);
    Ry:
    if ($_REQUEST["\x6f\160\164\x69\157\x6e"] == "\164\145\163\x74\x69\x64\160\143\x6f\x6e\x66\151\x67" and isset($_REQUEST["\156\145\167\143\x65\x72\x74"])) {
        goto XW;
    }
    if ($_REQUEST["\157\x70\x74\151\157\x6e"] == "\164\x65\x73\x74\151\x64\x70\143\157\156\146\x69\147") {
        goto He;
    }
    if (get_option("\155\x6f\137\163\x61\x6d\154\137\x72\x65\x6c\x61\171\x5f\163\164\141\164\145") && get_option("\155\x6f\137\163\x61\155\154\x5f\162\x65\x6c\x61\171\137\163\164\x61\164\x65") != '') {
        goto Ez;
    }
    if (!empty($_REQUEST["\x72\x65\x64\x69\162\145\143\164\137\164\157"])) {
        goto ip;
    }
    $xl = wp_get_referer();
    goto AU;
    ip:
    $xl = htmlspecialchars($_REQUEST["\162\x65\x64\151\x72\145\143\x74\x5f\164\x6f"]);
    AU:
    goto EW;
    Ez:
    $xl = get_option("\x6d\x6f\137\x73\141\155\x6c\x5f\x72\x65\x6c\141\x79\137\x73\x74\141\x74\145");
    EW:
    goto Y5;
    He:
    $xl = "\164\x65\163\x74\x56\x61\154\x69\144\141\x74\145";
    Y5:
    goto Aq;
    XW:
    $xl = "\164\145\163\x74\116\x65\x77\103\x65\x72\164\x69\146\x69\143\x61\164\145";
    Aq:
    if (!empty($xl)) {
        goto CQ;
    }
    $xl = $j1;
    CQ:
    $yc = htmlspecialchars_decode(LicenseHelper::getCurrentOption(Mo_Saml_Options_Enum_Service_Provider::LOGIN_URL));
    $ab = LicenseHelper::getCurrentOption(Mo_Saml_Options_Enum_Service_Provider::LOGIN_BINDING_TYPE);
    $qe = get_option("\x6d\x6f\137\x73\x61\155\x6c\x5f\x66\x6f\162\143\x65\137\141\x75\x74\x68\x65\156\164\151\143\x61\164\x69\157\156");
    $KG = $j1 . "\57";
    $g8 = get_option("\155\x6f\137\163\141\155\x6c\x5f\163\160\137\x65\x6e\x74\151\x74\171\137\151\144");
    $Kp = LicenseHelper::getCurrentOption(Mo_Saml_Options_Enum_Service_Provider::NAMEID_FORMAT);
    if (!empty($Kp)) {
        goto x4;
    }
    $Kp = "\x31\x2e\61\72\156\x61\155\145\151\144\55\146\x6f\x72\155\x61\164\x3a\165\x6e\x73\x70\x65\143\151\146\x69\x65\x64";
    x4:
    if (!empty($g8)) {
        goto Dj;
    }
    $g8 = $j1 . "\x2f\x77\160\x2d\x63\x6f\156\x74\145\x6e\x74\x2f\160\154\x75\x67\x69\156\163\x2f\155\151\156\151\157\x72\x61\x6e\147\x65\x2d\x73\141\x6d\x6c\x2d\62\x30\x2d\x73\151\156\147\154\145\55\163\x69\147\x6e\55\157\x6e\57";
    Dj:
    $Jk = SAMLSPUtilities::createAuthnRequest($KG, $g8, $yc, $qe, $ab, $Kp);
    if (!($xl == "\x64\151\163\x70\x6c\141\x79\123\x41\115\x4c\122\145\161\165\x65\163\x74")) {
        goto dt;
    }
    mo_saml_show_SAML_log(SAMLSPUtilities::createAuthnRequest($KG, $g8, $yc, $qe, "\110\x54\x54\x50\x50\157\163\x74", $Kp), $xl);
    dt:
    $ZB = $yc;
    if (strpos($yc, "\x3f") !== false) {
        goto xO;
    }
    $ZB .= "\x3f";
    goto UT;
    xO:
    $ZB .= "\x26";
    UT:
    cldjkasjdksalc();
    $xl = mo_saml_get_relay_state($xl);
    $xl = empty($xl) ? "\57" : $xl;
    $TV = SAMLSPUtilities::mo_saml_sanitize_associative_array($_REQUEST);
    if (empty($ab) || $ab == "\110\164\x74\160\122\145\x64\151\162\145\x63\x74") {
        goto vV;
    }
    if (!(LicenseHelper::getCurrentOption(Mo_Saml_Options_Enum_Service_Provider::REQUEST_SIGNED) != "\x63\x68\x65\x63\x6b\x65\x64")) {
        goto uY;
    }
    $ru = base64_encode($Jk);
    SAMLSPUtilities::postSAMLRequest($yc, $ru, $xl, $TV);
    exit;
    uY:
    $XD = '';
    $NH = '';
    if ($_REQUEST["\157\x70\164\x69\157\156"] == "\164\145\163\164\x69\x64\160\x63\x6f\156\x66\151\x67" && isset($_REQUEST["\156\145\167\143\x65\162\x74"])) {
        goto o_;
    }
    $ru = SAMLSPUtilities::signXML($Jk, "\116\141\155\145\111\104\x50\157\x6c\151\x63\x79");
    goto Xl;
    o_:
    $ru = SAMLSPUtilities::signXML($Jk, "\x4e\141\x6d\x65\x49\104\120\157\x6c\151\143\171", true);
    Xl:
    SAMLSPUtilities::postSAMLRequest($yc, $ru, $xl, $TV, $EQ);
    update_option("\155\157\x5f\x73\141\x6d\154\x5f\156\145\x77\137\x63\x65\x72\164\x5f\164\x65\163\x74", true);
    goto u_;
    vV:
    if (!(LicenseHelper::getCurrentOption(Mo_Saml_Options_Enum_Service_Provider::REQUEST_SIGNED) != "\143\x68\x65\x63\153\145\144")) {
        goto l1;
    }
    $ZB .= "\123\x41\115\x4c\x52\145\x71\x75\x65\163\164\75" . $Jk . SAMLSPUtilities::mo_saml_append_params_redirect_binding($TV) . "\x26\122\145\x6c\141\171\123\164\141\164\145\75" . urlencode($xl);
    if (empty($EQ)) {
        goto yy;
    }
    $ZB .= "\x26\165\x73\145\162\116\141\155\145\x3d" . $EQ;
    yy:
    header("\x63\x61\x63\150\x65\x2d\143\157\x6e\164\x72\x6f\x6c\72\x20\155\141\170\55\x61\147\145\x3d\x30\x2c\x20\x70\162\x69\x76\141\x74\x65\54\40\x6e\x6f\55\163\164\157\162\145\x2c\40\156\x6f\x2d\x63\x61\x63\150\x65\54\x20\155\165\163\x74\55\x72\145\166\141\x6c\151\x64\141\x74\x65");
    header("\114\x6f\x63\141\x74\x69\x6f\156\x3a\40" . $ZB);
    exit;
    l1:
    $Jk = "\123\101\115\x4c\122\x65\x71\x75\145\x73\164\75" . $Jk . "\x26\122\145\x6c\x61\171\123\164\x61\x74\x65\75" . urlencode($xl) . "\46\x53\x69\x67\101\x6c\x67\x3d" . urlencode(XMLSecurityKey::RSA_SHA256);
    $t8 = array("\164\x79\160\145" => "\160\x72\151\x76\141\x74\145");
    $mr = new XMLSecurityKey(XMLSecurityKey::RSA_SHA256, $t8);
    if ($_REQUEST["\x6f\160\164\x69\x6f\156"] == "\x74\145\163\164\151\144\160\143\x6f\156\146\151\147" && isset($_REQUEST["\x6e\x65\167\x63\x65\x72\x74"])) {
        goto Ue;
    }
    $UZ = get_option("\x6d\x6f\x5f\x73\141\155\x6c\137\x63\x75\162\x72\x65\x6e\164\137\143\145\162\x74\x5f\x70\162\x69\x76\141\x74\x65\137\x6b\145\171");
    goto dK;
    Ue:
    $UZ = file_get_contents(plugin_dir_path(__FILE__) . "\162\145\x73\x6f\x75\162\x63\x65\163" . DIRECTORY_SEPARATOR . "\155\151\156\151\x6f\x72\141\x6e\147\145\55\163\160\55\143\145\162\164\x69\x66\x69\143\x61\164\145\x2d\x70\x72\151\166\56\x6b\145\x79");
    dK:
    $mr->loadKey($UZ, FALSE);
    $N2 = new XMLSecurityDSig();
    $UR = $mr->signData($Jk);
    $UR = base64_encode($UR);
    $ZB .= $Jk . "\x26\x53\151\147\x6e\x61\x74\165\x72\x65\75" . urlencode($UR) . SAMLSPUtilities::mo_saml_append_params_redirect_binding($TV);
    if (empty($EQ)) {
        goto UO;
    }
    $ZB .= "\x26\165\163\145\x72\116\141\x6d\x65\x3d" . $EQ;
    UO:
    header("\143\x61\143\x68\145\x2d\143\157\156\164\x72\x6f\154\x3a\x20\x6d\141\170\55\x61\x67\145\75\x30\x2c\x20\160\x72\151\166\141\x74\145\x2c\x20\x6e\157\x2d\163\164\x6f\x72\145\x2c\x20\156\x6f\x2d\143\x61\143\x68\x65\54\40\x6d\x75\x73\164\55\162\145\166\141\x6c\151\144\x61\164\x65");
    header("\114\157\143\x61\x74\151\x6f\156\72\40" . $ZB);
    exit;
    u_:
    Zq:
    ZP:
    if (empty($_REQUEST["\x53\x41\x4d\114\x52\x65\x73\x70\157\x6e\x73\145"])) {
        goto bo;
    }
    if (!empty($_POST["\122\145\x6c\141\x79\123\x74\x61\164\x65"]) && $_POST["\x52\145\x6c\141\x79\x53\x74\141\x74\x65"] != "\57") {
        goto UN;
    }
    $WF = '';
    goto Rv;
    UN:
    $WF = $_POST["\x52\x65\x6c\141\x79\x53\x74\x61\x74\x65"];
    Rv:
    $j1 = get_option("\155\157\137\x73\141\155\x6c\137\x73\160\137\x62\x61\163\145\137\x75\162\x6c");
    if (!empty($j1)) {
        goto HA;
    }
    $j1 = home_url();
    HA:
    $vH = htmlspecialchars($_REQUEST["\123\x41\x4d\x4c\x52\x65\163\160\157\156\x73\x65"]);
    $vH = base64_decode($vH);
    if (empty($_GET["\123\x41\x4d\114\x52\x65\x73\x70\157\156\x73\145"])) {
        goto o8;
    }
    $vH = gzinflate($vH);
    o8:
    $tR = SAMLSPUtilities::mo_saml_safe_load_xml($vH);
    if (!(is_string($tR) && strpos($tR, "\127\120\123\101\115\114\x45\x52\122") !== false)) {
        goto go;
    }
    mo_saml_display_end_user_error_message_with_code(Mo_Saml_Error_Codes::$error_codes[$tR]);
    go:
    $It = $tR->firstChild;
    $GD = $tR->documentElement;
    $Kf = new DOMXpath($tR);
    $Kf->registerNamespace("\x73\141\155\x6c\160", "\x75\162\156\x3a\x6f\141\163\151\163\72\156\141\x6d\x65\163\72\x74\x63\72\123\x41\x4d\x4c\x3a\62\56\x30\72\x70\162\x6f\x74\x6f\143\157\154");
    $Kf->registerNamespace("\163\141\x6d\x6c", "\x75\162\x6e\x3a\157\x61\x73\151\x73\x3a\x6e\x61\x6d\x65\163\72\x74\143\72\x53\101\115\x4c\x3a\62\x2e\x30\x3a\x61\x73\163\145\x72\164\x69\x6f\156");
    if ($It->localName == "\114\157\x67\157\165\164\x52\145\163\x70\157\156\163\145") {
        goto CD;
    }
    $g8 = Mo_Saml_Config_Utility::mo_saml_get_sp_entity_id($j1);
    update_option("\x6d\x6f\x5f\163\x61\x6d\x6c\137\x72\145\163\160\157\156\x73\145", base64_encode($vH));
    $vH = SAMLSPUtilities::mo_saml_get_saml_response_from_xml($It, $WF);
    if (SAMLSPUtilities::mo_saml_is_valid_audience($vH, $g8)) {
        goto qi;
    }
    mo_saml_display_test_config_invalid_audience_error($WF, $g8);
    mo_saml_display_end_user_error_message_with_code(Mo_Saml_Error_Codes::$error_codes["\x57\x50\x53\x41\x4d\x4c\x45\122\122\x30\60\x39"]);
    qi:
    $ck = $Kf->query("\57\163\x61\155\154\x70\x3a\x52\145\x73\x70\x6f\x6e\163\x65\x2f\x73\141\x6d\154\160\x3a\x53\164\x61\164\165\x73\57\x73\x61\x6d\x6c\160\72\123\x74\141\164\x75\x73\103\x6f\x64\145", $GD);
    $AJ = $ck->item(0)->getAttribute("\x56\141\x6c\x75\145");
    $HC = $Kf->query("\x2f\x73\x61\x6d\154\160\x3a\x52\x65\163\x70\157\x6e\x73\145\x2f\x73\x61\x6d\154\160\x3a\x53\164\x61\164\x75\x73\x2f\163\141\x6d\154\x70\72\123\x74\141\164\165\163\x4d\145\163\x73\141\147\145", $GD)->item(0);
    if (empty($HC)) {
        goto oG;
    }
    $HC = $HC->nodeValue;
    oG:
    $c6 = explode("\x3a", $AJ);
    $ck = $c6[7];
    if (!empty($_POST["\x52\145\x6c\x61\171\123\164\x61\164\x65"]) && $_POST["\122\x65\154\141\171\123\x74\141\x74\145"] != "\57") {
        goto et;
    }
    $WF = '';
    goto zV;
    et:
    $WF = $_POST["\x52\145\154\x61\171\123\x74\x61\x74\145"];
    zV:
    if (!($WF == "\x74\x65\x73\x74\126\141\x6c\151\x64\x61\164\x65" && !Mo_Saml_License_Utility::is_customer_license_valid())) {
        goto q_;
    }
    wp_die("\74\142\76\x5b\127\x50\x53\101\115\x4c\x45\x52\122\x30\60\x30\x5d\x3c\57\x62\76\40\x57\x65\40\x63\x6f\x75\x6c\144\x20\x6e\157\x74\40\163\x69\147\156\x20\171\x6f\x75\x20\x69\x6e\56\40\x50\154\x65\141\x73\x65\40\x63\x6f\x6e\x74\x61\143\164\40\171\157\x75\x72\x20\141\144\x6d\x69\156\x69\x73\164\162\141\x74\x6f\162\40\x77\151\x74\150\x20\164\150\x65\x20\x6d\x65\156\164\151\157\x6e\145\144\x20\145\x72\162\157\162\40\x63\x6f\x64\x65\x2e", "\133\x57\x50\123\x41\x4d\114\105\x52\x52\x30\x30\x30\135\x20\x49\x6e\x76\x61\x6c\151\144\x20\114\151\x63\145\156\x73\x65");
    q_:
    if (!($ck != "\x53\x75\x63\143\145\163\x73")) {
        goto Sq;
    }
    show_status_error($ck, $WF, $HC);
    Sq:
    $G1 = maybe_unserialize(LicenseHelper::getCurrentOption(Mo_Saml_Options_Enum_Service_Provider::X509_CERTIFICATE));
    $KG = $j1 . "\x2f";
    $uU = $vH->getSignatureData();
    $XF = current($vH->getAssertions())->getSignatureData();
    if (!(empty($XF) && empty($uU))) {
        goto WC;
    }
    if ($WF == "\x74\x65\163\x74\126\141\x6c\x69\x64\x61\164\145" or $WF == "\x74\x65\163\x74\116\x65\x77\x43\145\x72\164\x69\x66\151\143\141\164\x65") {
        goto XZ;
    }
    wp_die("\127\x65\40\x63\157\165\154\x64\40\x6e\157\x74\40\x73\x69\x67\156\40\171\157\165\40\151\x6e\x2e\40\x50\154\145\141\x73\145\40\143\x6f\156\x74\x61\143\164\x20\141\144\155\x69\x6e\x69\163\164\162\x61\x74\x6f\162", "\105\x72\x72\x6f\x72\x3a\40\x49\x6e\x76\x61\154\151\x64\x20\123\x41\115\114\40\122\x65\x73\x70\157\x6e\x73\x65");
    goto mi;
    XZ:
    $FO = Mo_Saml_Options_Error_Constants::ERROR_NO_CERTIFICATE;
    $of = Mo_Saml_Options_Error_Constants::CAUSE_NO_CERTIFICATE;
    echo "\74\144\x69\x76\x20\163\x74\x79\154\145\x3d\x22\x66\157\x6e\x74\55\146\141\x6d\x69\x6c\x79\72\103\141\154\x69\x62\x72\x69\x3b\x70\x61\x64\x64\x69\x6e\x67\72\x30\x20\x33\x25\x3b\x22\76\15\xa\11\11\11\11\x3c\x64\x69\166\x20\x73\164\171\154\145\75\42\x63\157\154\157\162\x3a\x20\43\141\71\64\64\x34\x32\x3b\142\141\x63\153\x67\162\157\165\x6e\144\55\x63\157\x6c\157\162\x3a\x20\x23\x66\62\x64\x65\x64\145\x3b\160\x61\x64\x64\x69\156\147\x3a\40\x31\65\x70\x78\73\x6d\x61\x72\147\151\156\55\x62\x6f\x74\x74\x6f\155\72\40\62\60\x70\170\73\164\145\170\164\x2d\141\154\x69\x67\x6e\72\143\145\x6e\x74\145\162\x3b\142\x6f\x72\x64\145\x72\72\61\160\170\40\163\157\x6c\x69\144\x20\43\x45\x36\x42\63\102\x32\73\146\157\x6e\x74\55\x73\x69\172\x65\72\x31\x38\x70\164\x3b\x22\76\x20\x45\122\122\x4f\x52\x3c\57\x64\151\x76\x3e\15\xa\11\x9\x9\11\74\x64\151\166\40\163\164\x79\154\145\75\42\x63\157\154\157\x72\72\x20\43\x61\x39\64\x34\x34\62\x3b\x66\x6f\156\x74\55\x73\x69\x7a\x65\72\x31\64\160\x74\73\40\155\141\x72\x67\x69\156\55\142\157\x74\x74\x6f\x6d\72\x32\x30\x70\170\73\x22\76\74\x70\76\74\163\164\x72\x6f\156\x67\x3e\105\x72\x72\x6f\x72\40\x20\x3a" . esc_html($FO) . "\x20\74\x2f\163\x74\x72\157\x6e\147\x3e\x3c\x2f\x70\x3e\15\12\11\x9\11\11\xd\12\x9\x9\11\x9\74\160\76\x3c\x73\x74\x72\x6f\x6e\x67\76\120\x6f\x73\163\x69\142\154\x65\x20\x43\x61\165\x73\x65\x3a\40" . esc_html($of) . "\74\57\x73\164\162\x6f\156\x67\x3e\x3c\57\160\76\15\12\x9\x9\11\x9\xd\12\11\x9\x9\x9\74\57\x64\x69\x76\76\x3c\57\x64\151\166\x3e";
    mo_saml_download_logs($FO, $of);
    exit;
    mi:
    WC:
    $gI = '';
    if (is_array($G1)) {
        goto Fm;
    }
    $lj = XMLSecurityKey::getRawThumbprint($G1);
    $lj = mo_saml_convert_to_windows_iconv($lj);
    $lj = preg_replace("\57\x5c\x73\53\x2f", '', $lj);
    if (empty($uU)) {
        goto II;
    }
    $gI = SAMLSPUtilities::processResponse($KG, $lj, $uU, $vH, 0, $WF);
    II:
    if (empty($XF)) {
        goto i1;
    }
    $gI = SAMLSPUtilities::processResponse($KG, $lj, $XF, $vH, 0, $WF);
    i1:
    goto xC;
    Fm:
    foreach ($G1 as $mr => $Wl) {
        $lj = XMLSecurityKey::getRawThumbprint($Wl);
        $lj = mo_saml_convert_to_windows_iconv($lj);
        $lj = preg_replace("\57\134\163\53\x2f", '', $lj);
        if (empty($uU)) {
            goto CL;
        }
        $gI = SAMLSPUtilities::processResponse($KG, $lj, $uU, $vH, $mr, $WF);
        CL:
        if (empty($XF)) {
            goto mD;
        }
        $gI = SAMLSPUtilities::processResponse($KG, $lj, $XF, $vH, $mr, $WF);
        mD:
        if (!$gI) {
            goto xA;
        }
        goto gJ;
        xA:
        Q8:
    }
    gJ:
    xC:
    if ($uU) {
        goto A8;
    }
    if ($XF) {
        goto vx;
    }
    goto a_;
    A8:
    $aL = $uU["\x43\x65\x72\164\151\146\x69\x63\141\164\145\x73"][0];
    goto a_;
    vx:
    $aL = $XF["\103\x65\x72\x74\x69\x66\x69\143\141\x74\x65\163"][0];
    a_:
    if ($gI) {
        goto ZF;
    }
    if ($WF == "\x74\x65\x73\x74\126\x61\154\x69\x64\141\164\145" or $WF == "\164\x65\x73\164\116\145\x77\x43\x65\162\164\151\146\x69\143\141\x74\145") {
        goto Zn;
    }
    wp_die("\127\x65\x20\x63\x6f\165\154\144\x20\156\157\x74\40\163\x69\x67\x6e\x20\171\157\x75\40\151\156\56\x20\120\154\x65\x61\x73\x65\40\x63\x6f\x6e\164\x61\x63\x74\x20\x79\157\165\162\40\x61\x64\x6d\x69\156\x69\163\164\x72\141\164\x6f\x72", "\x45\162\x72\x6f\162\x3a\40\111\156\x76\x61\x6c\x69\144\x20\123\x41\115\114\40\122\145\163\x70\157\x6e\163\x65");
    goto jg;
    Zn:
    $FO = Mo_Saml_Options_Error_Constants::ERROR_WRONG_CERTIFICATE;
    $of = Mo_Saml_Options_Error_Constants::CAUSE_WRONG_CERTIFICATE;
    $Tz = "\x2d\55\55\x2d\55\x42\105\x47\x49\116\40\x43\105\122\x54\111\x46\x49\103\101\x54\105\55\55\55\x2d\55\x3c\142\162\x3e" . chunk_split($aL, 64) . "\x3c\142\162\76\55\55\55\55\x2d\x45\x4e\104\40\103\x45\x52\124\x49\x46\111\103\101\x54\x45\55\x2d\55\55\x2d";
    echo "\74\x64\x69\x76\40\163\164\x79\x6c\x65\75\42\146\x6f\156\164\55\146\x61\155\151\154\x79\x3a\x43\x61\154\151\142\x72\151\73\160\141\144\144\x69\x6e\x67\72\x30\40\x33\45\73\x22\x3e";
    echo "\x3c\144\151\x76\40\x73\164\x79\x6c\x65\75\x22\x63\157\x6c\x6f\162\72\40\x23\x61\71\64\64\x34\62\x3b\x62\x61\143\x6b\x67\x72\157\x75\x6e\x64\x2d\143\x6f\x6c\x6f\x72\72\40\x23\x66\62\x64\145\144\x65\73\x70\141\x64\x64\x69\x6e\x67\x3a\x20\x31\65\x70\x78\73\155\x61\x72\x67\x69\x6e\x2d\x62\x6f\164\x74\157\155\72\x20\62\60\160\x78\x3b\x74\145\x78\164\x2d\x61\x6c\151\147\x6e\x3a\143\x65\x6e\164\145\x72\73\x62\157\162\144\x65\x72\x3a\x31\160\x78\x20\163\157\x6c\x69\x64\x20\43\x45\66\x42\63\102\62\73\146\157\x6e\164\55\x73\151\172\145\x3a\x31\x38\160\164\73\42\76\40\x45\122\122\x4f\122\74\x2f\144\x69\x76\x3e\xd\12\11\x9\11\x3c\144\x69\166\x20\163\x74\x79\x6c\145\75\42\x63\157\x6c\x6f\x72\x3a\x20\x23\x61\71\x34\64\x34\x32\x3b\146\x6f\x6e\164\x2d\x73\x69\172\145\x3a\61\x34\160\164\x3b\40\x6d\x61\x72\147\151\156\x2d\x62\157\164\164\157\155\x3a\x32\x30\x70\170\73\x22\76\x3c\160\76\74\163\x74\x72\x6f\156\x67\76\105\x72\162\157\162\x3a\x20\x3c\x2f\163\x74\x72\x6f\x6e\147\x3e\x55\x6e\141\x62\x6c\x65\x20\x74\157\x20\x66\x69\x6e\144\40\x61\x20\x63\145\x72\164\151\x66\x69\143\141\x74\145\40\155\141\x74\143\150\x69\x6e\147\40\164\x68\145\x20\143\157\x6e\x66\x69\147\165\x72\145\144\40\146\151\156\x67\145\162\160\162\151\x6e\x74\56\74\x2f\160\76\xd\xa\11\x9\x9\x3c\160\76\120\x6c\145\x61\x73\145\40\143\x6f\156\164\x61\143\x74\40\171\157\165\x72\x20\x61\144\x6d\x69\x6e\x69\163\x74\x72\x61\x74\157\x72\40\x61\x6e\x64\40\x72\x65\160\x6f\162\x74\x20\x74\150\x65\40\x66\x6f\154\x6c\157\167\151\x6e\147\x20\145\x72\x72\157\x72\x3a\74\x2f\x70\x3e\15\xa\11\11\11\x3c\x70\x3e\74\163\164\162\157\156\x67\76\x50\157\163\163\x69\x62\x6c\145\x20\x43\141\165\163\145\x3a\40\x3c\x2f\x73\x74\162\x6f\156\147\x3e\47\130\x2e\65\x30\x39\40\103\x65\x72\164\151\146\x69\143\x61\x74\x65\47\40\x66\151\145\x6c\x64\40\151\156\x20\x70\154\165\147\x69\156\40\x64\x6f\x65\163\40\156\x6f\x74\x20\x6d\141\164\x63\150\40\164\150\145\x20\143\x65\x72\x74\x69\x66\x69\143\x61\x74\x65\40\x66\x6f\165\x6e\144\x20\151\156\40\123\x41\x4d\114\x20\122\x65\x73\x70\x6f\156\x73\x65\56\74\57\160\x3e\xd\12\x9\x9\11\74\160\76\74\x73\164\162\157\x6e\147\76\103\x65\162\x74\x69\x66\x69\143\141\164\x65\x20\x66\157\165\x6e\144\x20\151\156\40\x53\x41\115\x4c\40\122\x65\163\x70\x6f\156\x73\145\72\x20\74\57\163\164\x72\157\x6e\147\x3e\74\146\x6f\156\x74\x20\x66\x61\143\145\75\x22\x43\x6f\x75\162\151\145\x72\40\x4e\x65\167\x22\x3b\146\x6f\x6e\x74\55\x73\x69\172\145\x3a\61\x30\160\164\76\74\142\162\76\74\142\x72\76" . $Tz . "\x3c\57\x70\76\x3c\x2f\x66\157\156\164\76\xd\12\11\11\x9\74\x70\76\x3c\x73\x74\x72\x6f\156\x67\x3e\123\157\x6c\x75\x74\x69\x6f\156\x3a\x20\x3c\57\x73\x74\162\x6f\156\x67\x3e\x3c\x2f\160\76\xd\12\11\x9\11\x20\74\157\154\76\15\12\x20\x20\40\40\x20\40\40\x20\40\x20\x20\x20\x20\40\40\x20\x3c\154\151\76\x43\157\160\x79\x20\x70\141\163\x74\x65\x20\x74\x68\x65\x20\143\x65\162\x74\x69\x66\x69\x63\x61\x74\145\x20\160\x72\x6f\166\x69\144\145\x64\40\141\x62\157\166\145\x20\x69\156\40\x58\65\x30\x39\40\x43\x65\x72\x74\x69\x66\151\143\x61\x74\x65\40\x75\156\144\145\162\x20\x53\145\162\x76\x69\143\145\x20\x50\162\157\166\151\x64\145\x72\x20\x53\145\164\165\160\x20\164\x61\142\56\x3c\57\x6c\x69\76\xd\12\x20\40\x20\x20\x20\x20\x20\x20\40\40\40\40\x20\x20\40\x20\74\x6c\151\x3e\111\x66\40\151\163\x73\x75\x65\40\x70\x65\162\x73\x69\x73\x74\163\40\x64\x69\163\x61\142\154\145\40\x3c\142\x3e\103\150\141\162\x61\143\x74\145\162\x20\145\156\x63\157\x64\x69\x6e\147\74\x2f\142\76\x20\x75\x6e\144\145\x72\x20\123\145\162\x76\x69\143\145\40\x50\x72\157\166\144\x65\162\x20\123\145\164\165\x70\40\164\x61\x62\56\x3c\57\154\151\76\15\12\40\x20\40\x20\x20\x20\x20\x20\x20\40\x20\40\40\74\x2f\x6f\154\76\11\x9\xd\12\x9\11\11\74\57\144\151\x76\76\15\xa\x9\11\11\x9\11\x3c\x64\x69\166\40\163\x74\171\154\x65\75\42\x6d\141\x72\x67\x69\x6e\72\63\45\x3b\x64\x69\x73\160\x6c\141\171\72\x62\x6c\157\143\153\73\x74\145\170\x74\x2d\x61\x6c\151\x67\x6e\x3a\x63\145\x6e\x74\145\x72\x3b\x22\76\xd\12\11\x9\x9\11\x9\x3c\144\x69\x76\40\163\164\171\154\145\x3d\x22\x6d\141\x72\x67\151\x6e\72\x33\45\x3b\144\x69\x73\x70\x6c\x61\171\x3a\x62\x6c\x6f\x63\153\x3b\x74\145\x78\164\55\x61\154\x69\147\x6e\x3a\143\145\x6e\x74\145\162\73\42\76\x3c\x69\x6e\x70\x75\164\40\x73\x74\x79\154\x65\75\42\160\x61\144\144\x69\156\147\x3a\x31\45\x3b\x77\151\x64\164\150\x3a\61\60\60\x70\170\73\142\x61\143\x6b\x67\x72\157\165\x6e\x64\x3a\40\43\x30\60\x39\61\103\104\40\x6e\x6f\x6e\145\40\162\x65\x70\145\x61\x74\40\163\x63\162\x6f\x6c\x6c\x20\x30\x25\40\x30\45\73\x63\x75\162\x73\x6f\x72\72\x20\160\157\151\156\164\x65\x72\73\146\157\x6e\x74\55\x73\x69\172\x65\72\61\x35\160\x78\x3b\x62\x6f\162\x64\145\x72\55\167\151\144\x74\x68\72\x20\x31\x70\x78\x3b\142\x6f\162\144\145\162\x2d\163\x74\171\154\x65\72\x20\x73\x6f\154\151\144\x3b\142\x6f\162\x64\x65\x72\x2d\x72\x61\144\x69\165\x73\72\40\63\160\x78\73\x77\x68\151\x74\145\55\x73\160\x61\x63\145\72\40\x6e\x6f\167\162\141\160\x3b\142\157\170\x2d\x73\151\x7a\x69\156\147\x3a\40\x62\157\162\144\x65\162\x2d\142\x6f\170\x3b\x62\x6f\x72\144\145\x72\x2d\143\157\x6c\x6f\x72\72\40\43\60\x30\x37\x33\x41\x41\x3b\x62\x6f\x78\x2d\x73\150\x61\x64\x6f\167\x3a\x20\60\160\x78\40\61\160\x78\x20\x30\x70\x78\x20\x72\x67\x62\x61\50\x31\x32\60\x2c\x20\62\x30\x30\x2c\40\62\63\x30\x2c\x20\x30\56\x36\51\x20\151\x6e\x73\145\x74\73\143\x6f\154\157\x72\x3a\40\x23\x46\106\x46\73\42\x74\171\x70\x65\x3d\42\x62\x75\164\x74\157\156\x22\40\166\141\x6c\x75\145\x3d\42\x44\x6f\x6e\145\42\40\157\156\103\154\x69\143\153\x3d\x22\x73\145\154\x66\x2e\x63\x6c\x6f\x73\x65\x28\51\73\x22\76\x3c\x2f\144\151\166\x3e";
    mo_saml_download_logs($FO, $of);
    exit;
    jg:
    ZF:
    $Og = LicenseHelper::getCurrentOption(Mo_Saml_Options_Enum_Service_Provider::ISSUER);
    SAMLSPUtilities::mo_saml_check_saml_response_for_reply_attack($vH);
    SAMLSPUtilities::validateIssuer($vH, $Og, $WF);
    $OZ = current(current($vH->getAssertions())->getNameId());
    $ED = current($vH->getAssertions())->getAttributes();
    $ED["\116\141\x6d\x65\111\104"] = array("\60" => $OZ);
    $bZ = current($vH->getAssertions())->getSessionIndex();
    mo_saml_checkMapping($ED, $WF, $bZ);
    goto IQ;
    CD:
    if (!isset($_REQUEST["\122\145\154\x61\171\123\164\141\164\145"])) {
        goto hh;
    }
    $d2 = $_REQUEST["\x52\x65\154\141\x79\123\164\141\x74\145"];
    hh:
    $Zm = get_option("\155\x6f\137\163\x61\x6d\x6c\x5f\154\157\147\x6f\165\164\137\162\145\x6c\x61\171\x5f\163\x74\x61\164\145");
    if (empty($Zm)) {
        goto uz;
    }
    $d2 = $Zm;
    uz:
    if (!is_user_logged_in()) {
        goto xt;
    }
    wp_destroy_current_session();
    wp_clear_auth_cookie();
    wp_set_current_user(0);
    xt:
    if (!empty($d2)) {
        goto zX;
    }
    $d2 = home_url();
    zX:
    header("\x4c\157\x63\x61\164\151\157\156\72\x20" . $d2);
    exit;
    IQ:
    bo:
    if (empty($_REQUEST["\x53\x41\x4d\x4c\x52\145\x71\x75\145\x73\164"])) {
        goto Ah;
    }
    $Jk = htmlspecialchars($_REQUEST["\123\101\x4d\x4c\x52\x65\161\x75\145\163\x74"]);
    $WF = "\57";
    if (empty($_REQUEST["\x52\145\x6c\x61\171\123\164\141\164\x65"])) {
        goto sZ;
    }
    $WF = $_REQUEST["\x52\x65\154\141\171\123\164\141\x74\x65"];
    sZ:
    $Jk = base64_decode($Jk);
    if (empty($_GET["\x53\x41\x4d\114\122\145\x71\x75\x65\x73\x74"])) {
        goto nP;
    }
    $Jk = gzinflate($Jk);
    nP:
    $tR = SAMLSPUtilities::mo_saml_safe_load_xml($Jk);
    if (!(is_string($tR) && strpos($tR, "\x57\x50\123\101\x4d\114\105\x52\x52") !== false)) {
        goto r1;
    }
    mo_saml_display_end_user_error_message_with_code(Mo_Saml_Error_Codes::$error_codes[$tR]);
    r1:
    $Sk = $tR->firstChild;
    if (!($Sk->localName == "\x4c\157\147\157\165\164\122\145\161\165\x65\163\164")) {
        goto Tn;
    }
    $j8 = new SAML2SPLogoutRequest($Sk);
    if (!(!session_id() || session_id() == '' || empty($_SESSION))) {
        goto Cq;
    }
    session_start();
    Cq:
    $_SESSION["\x6d\x6f\x5f\x73\x61\x6d\x6c\137\x6c\157\147\157\x75\x74\137\x72\145\x71\165\145\163\164"] = $Jk;
    $_SESSION["\155\157\x5f\x73\x61\x6d\154\x5f\x6c\157\147\157\165\164\137\x72\x65\154\x61\171\137\163\164\141\x74\145"] = $WF;
    wp_redirect(htmlspecialchars_decode(wp_logout_url()));
    exit;
    Tn:
    Ah:
}
function cldjkasjdksalc()
{
    $Xd = plugin_dir_path(__FILE__);
    $M1 = wp_upload_dir();
    $Va = home_url();
    $Va = trim($Va, "\x2f");
    if (preg_match("\x23\x5e\x68\164\x74\x70\50\x73\x29\77\x3a\57\57\43", $Va)) {
        goto Wm;
    }
    $Va = "\x68\164\x74\x70\72\57\x2f" . $Va;
    Wm:
    $Jf = parse_url($Va);
    $dd = preg_replace("\x2f\x5e\167\167\167\x5c\56\57", '', $Jf["\x68\157\163\x74"]);
    $no = $dd . "\55" . $M1["\142\x61\x73\x65\144\151\x72"];
    $rA = hash_hmac("\163\150\141\x32\65\66", $no, "\x34\104\110\146\152\147\x66\x6a\x61\x73\156\144\146\x73\141\x6a\146\110\107\112");
    if (is_writable($Xd . "\x6c\151\143\x65\156\163\145")) {
        goto IA;
    }
    $v6 = "\142\x47\116\153\141\155\164\x68\143\x32\160\153\141\x33\x4e\x68\131\62\x77\x3d";
    $af = base64_decode($v6);
    $b6 = get_option($af);
    if (empty($b6)) {
        goto i3;
    }
    $sg = str_rot13($b6);
    i3:
    goto TN;
    IA:
    $b6 = file_get_contents($Xd . "\x6c\x69\143\145\156\163\145");
    if (!$b6) {
        goto yZ;
    }
    $sg = base64_encode($b6);
    yZ:
    TN:
    if (!empty($b6)) {
        goto aO;
    }
    $fR = "\124\107\154\152\x5a\127\x35\x7a\132\x53\x42\x47\x61\127\x78\x6c\111\107\61\x70\x63\x33\x4e\160\x62\x6d\143\147\x5a\x6e\x4a\166\142\123\x42\x30\x61\107\x55\x67\x63\107\170\x31\x5a\x32\154\x75\x4c\x67\75\75";
    $dS = base64_decode($fR);
    wp_die($dS);
    aO:
    if (strpos($sg, $rA) !== false) {
        goto oE;
    }
    $YJ = new Customersaml();
    $mr = get_option("\155\157\x5f\163\x61\x6d\154\x5f\x63\x75\163\164\x6f\x6d\145\x72\137\x74\157\153\145\156");
    $rV = AESEncryption::decrypt_data(get_option("\x73\155\154\137\x6c\x6b"), $mr);
    $HO = $YJ->mo_saml_vl($rV, false);
    if ($HO) {
        goto cu;
    }
    return;
    cu:
    $HO = json_decode($HO, true);
    if (!empty($HO["\x69\163\x54\x72\151\141\154"])) {
        goto IT;
    }
    update_option("\x6d\x6f\137\x73\141\155\154\x5f\164\x6c\141", false);
    goto jU;
    IT:
    update_option("\x6d\157\x5f\163\x61\x6d\154\137\164\154\x61", $HO["\151\x73\x54\162\x69\x61\x6c"]);
    update_option("\155\x6f\137\163\x61\x6d\154\137\x6c\x65\144", $HO["\x6c\151\x63\x65\156\x73\x65\105\170\x70\151\162\171\x44\x61\x74\145"]);
    jU:
    if (!empty($HO["\163\164\141\164\165\x73"]) and strcasecmp($HO["\163\x74\x61\164\x75\x73"], "\123\x55\103\103\x45\123\123") == 0) {
        goto ax;
    }
    $kK = "\x53\x57\x35\62\131\x57\x78\160\132\103\x42\x4d\x61\x57\x4e\x6c\142\x6e\116\154\x49\x45\x5a\166\x64\127\x35\x6b\x4c\x69\x42\121\x62\x47\126\x68\143\x32\x55\x67\131\62\71\165\144\107\106\152\x64\x43\x42\65\142\63\x56\171\x49\107\106\153\x62\x57\154\165\x61\130\116\x30\143\x6d\106\60\142\x33\111\x67\144\107\70\x67\x64\130\x4e\154\111\110\122\x6f\x5a\x53\x42\152\142\63\x4a\x79\x5a\x57\x4e\x30\x49\107\x78\x70\x59\62\126\165\143\x32\125\165\111\105\132\x76\143\x69\x42\164\142\63\x4a\154\x49\107\122\154\x64\107\106\x70\x62\110\115\163\111\x48\102\171\142\x33\x5a\x70\132\x47\125\x67\144\107\x68\x6c\x49\x46\x4a\x6c\132\155\126\x79\x5a\127\65\152\132\x53\102\x4a\122\104\x6f\147\x54\125\x38\171\x4e\x44\111\64\x4d\x54\101\x79\x4d\x54\143\167\116\123\x42\60\x62\171\x42\x35\x62\x33\126\171\111\107\106\153\x62\127\154\165\141\130\116\60\x63\x6d\106\60\142\63\x49\x67\x64\107\x38\147\x59\62\x68\x6c\131\x32\x73\147\x61\130\121\x67\x64\x57\65\x6b\132\130\x49\147\123\x47\126\x73\143\103\101\x6d\111\x45\x5a\x42\125\123\x42\x30\131\127\x49\x67\x61\x57\x34\147\144\107\x68\x6c\x49\110\102\163\144\x57\144\x70\142\151\64\x3d";
    $w1 = base64_decode($kK);
    $w1 = str_replace("\x48\145\x6c\160\x20\46\x20\106\101\121\x20\x74\x61\142\40\x69\x6e", "\x46\x41\x51\x73\40\x73\x65\143\164\x69\157\x6e\x20\x6f\x66", $w1);
    $wP = "\x52\x58\x4a\x79\142\63\x49\x36\111\105\x6c\165\x64\x6d\x46\163\141\x57\121\147\x54\x47\154\152\132\x57\x35\172\132\x51\75\x3d";
    $p1 = base64_decode($wP);
    wp_die($w1, $p1);
    goto zo;
    ax:
    $Xd = plugin_dir_path(__FILE__);
    $Va = home_url();
    $Va = trim($Va, "\57");
    if (preg_match("\x23\x5e\x68\164\x74\160\50\x73\x29\77\x3a\x2f\57\43", $Va)) {
        goto R0;
    }
    $Va = "\x68\164\164\160\72\57\57" . $Va;
    R0:
    $Jf = parse_url($Va);
    $dd = preg_replace("\x2f\x5e\x77\x77\x77\134\x2e\57", '', $Jf["\150\x6f\163\164"]);
    $M1 = wp_upload_dir();
    $no = $dd . "\55" . $M1["\x62\141\x73\x65\144\151\x72"];
    $rA = hash_hmac("\163\x68\141\62\x35\66", $no, "\x34\104\x48\x66\x6a\147\x66\152\x61\163\x6e\x64\x66\x73\141\x6a\146\110\107\112");
    $eZ = djkasjdksa();
    $NZ = round(strlen($eZ) / rand(2, 20));
    $eZ = substr_replace($eZ, $rA, $NZ, 0);
    $FA = base64_decode($eZ);
    if (is_writable($Xd . "\154\151\x63\145\156\x73\x65")) {
        goto RJ;
    }
    $eZ = str_rot13($eZ);
    $rf = "\142\107\x4e\x6b\x61\155\x74\150\143\62\x70\153\141\63\116\x68\x59\62\x77\75";
    $af = base64_decode($rf);
    update_option($af, $eZ);
    goto FS;
    RJ:
    file_put_contents($Xd . "\154\x69\143\145\x6e\163\145", $FA);
    FS:
    return true;
    zo:
    goto zU;
    oE:
    return true;
    zU:
}
function djkasjdksa()
{
    $Xp = "\x21\x7e\x40\43\x24\x25\136\x26\52\50\x29\137\53\x7c\173\175\74\x3e\77\x30\x31\62\63\64\x35\66\67\70\x39\x61\142\143\144\145\146\147\x68\x69\x6a\x6b\154\x6d\156\157\160\161\162\x73\164\165\166\x77\170\171\x7a\x41\x42\103\104\x45\106\x47\110\x49\x4a\x4b\x4c\x4d\116\x4f\120\121\122\x53\124\125\x56\x57\x58\x59\132";
    $a0 = strlen($Xp);
    $Wa = '';
    $p0 = 0;
    dQ:
    if (!($p0 < 10000)) {
        goto hf;
    }
    $Wa .= $Xp[rand(0, $a0 - 1)];
    bD:
    $p0++;
    goto dQ;
    hf:
    return $Wa;
}
function mo_saml_checkMapping($ED, $WF, $bZ)
{
    try {
        $xN = get_option("\163\x61\155\x6c\x5f\141\x6d\x5f\x65\155\x61\x69\x6c");
        $xE = get_option("\163\141\155\154\137\x61\155\x5f\x75\163\145\x72\156\141\155\145");
        $WG = get_option("\x73\141\155\154\x5f\141\155\137\146\151\x72\x73\x74\x5f\x6e\x61\155\x65");
        $Bq = get_option("\x73\x61\x6d\154\x5f\141\x6d\x5f\x6c\141\x73\164\137\x6e\141\155\x65");
        $hI = get_option("\x73\141\155\x6c\x5f\141\x6d\x5f\x67\x72\157\x75\160\x5f\x6e\141\x6d\x65");
        $OE = get_option("\x73\141\155\x6c\137\x61\x6d\137\x64\x65\x66\141\x75\x6c\164\x5f\x75\163\145\162\x5f\x72\x6f\154\x65");
        $DN = get_option("\163\x61\x6d\x6c\x5f\x61\155\137\x64\157\x6e\x74\137\141\x6c\154\x6f\x77\x5f\165\156\x6c\151\163\x74\x65\144\x5f\165\163\145\162\137\x72\157\154\145");
        $Eq = get_option("\163\141\x6d\x6c\137\x61\x6d\x5f\x61\143\143\x6f\165\156\164\x5f\155\x61\164\143\150\145\162");
        $vZ = '';
        $BT = '';
        if (empty($ED)) {
            goto he;
        }
        if (!empty($ED[$WG])) {
            goto dl;
        }
        $WG = '';
        goto Wh;
        dl:
        $WG = $ED[$WG][0];
        Wh:
        if (!empty($ED[$Bq])) {
            goto YF;
        }
        $Bq = '';
        goto ms;
        YF:
        $Bq = $ED[$Bq][0];
        ms:
        if (!empty($ED[$xE])) {
            goto SE;
        }
        $BT = $ED["\116\141\x6d\145\x49\x44"][0];
        goto GX;
        SE:
        $BT = $ED[$xE][0];
        GX:
        if (!empty($ED[$xN])) {
            goto o3;
        }
        $vZ = $ED["\116\x61\x6d\145\x49\x44"][0];
        goto cg;
        o3:
        $vZ = $ED[$xN][0];
        cg:
        if (!empty($ED[$hI])) {
            goto uc;
        }
        $hI = array();
        goto Rq;
        uc:
        $hI = $ED[$hI];
        Rq:
        if (!empty($Eq)) {
            goto Hv;
        }
        $Eq = "\x65\x6d\141\151\x6c";
        Hv:
        he:
        if ($WF == "\164\145\163\x74\126\x61\154\x69\144\x61\x74\145") {
            goto Pr;
        }
        if ($WF == "\164\145\x73\164\x4e\145\x77\103\145\x72\164\151\146\x69\x63\x61\x74\145") {
            goto Hp;
        }
        mo_saml_login_user($vZ, $WG, $Bq, $BT, $hI, $DN, $OE, $WF, $Eq, $bZ, $ED["\x4e\141\x6d\145\111\104"][0], $ED);
        goto wY;
        Pr:
        update_option("\155\x6f\137\x73\141\155\x6c\137\164\x65\x73\164", "\124\145\x73\164\40\163\x75\143\x63\x65\163\x73\x66\x75\x6c");
        mo_saml_show_test_result($WG, $Bq, $vZ, $hI, $ED, $WF);
        goto wY;
        Hp:
        update_option("\155\157\x5f\163\x61\x6d\x6c\137\x74\x65\163\164\137\156\145\167\137\143\145\x72\164", "\x54\x65\x73\x74\40\163\x75\143\143\x65\x73\x73\x66\x75\x6c");
        mo_saml_show_test_result($WG, $Bq, $vZ, $hI, $ED, $WF);
        wY:
    } catch (Exception $cN) {
        echo sprintf("\101\x6e\40\145\x72\162\x6f\x72\40\157\143\143\165\162\x72\145\144\40\167\150\x69\x6c\145\40\160\162\157\x63\x65\163\163\151\x6e\147\40\164\x68\x65\x20\123\101\115\x4c\x20\x52\145\x73\x70\157\x6e\163\145\56");
        exit;
    }
}
function mo_saml_show_test_result($WG, $Bq, $vZ, $hI, $ED, $WF)
{
    echo "\x3c\x64\151\x76\x20\163\x74\171\x6c\x65\x3d\42\146\157\x6e\x74\55\x66\x61\x6d\x69\x6c\x79\72\103\x61\154\151\142\162\x69\73\x70\x61\x64\x64\x69\x6e\x67\x3a\x30\40\63\45\x3b\42\x3e";
    if (!empty($vZ)) {
        goto HF;
    }
    echo "\x3c\144\151\166\x20\x73\164\171\154\145\x3d\42\x63\157\x6c\157\162\x3a\40\x23\141\x39\x34\64\64\62\x3b\142\x61\x63\153\147\x72\x6f\x75\x6e\x64\55\143\157\x6c\157\x72\72\40\43\x66\62\x64\145\x64\145\x3b\x70\141\x64\x64\x69\156\147\x3a\x20\61\x35\160\170\73\155\141\162\x67\151\156\x2d\142\157\x74\x74\157\155\x3a\40\x32\60\x70\x78\73\x74\145\170\164\x2d\x61\154\x69\147\x6e\72\143\145\156\x74\x65\x72\x3b\142\157\162\144\x65\x72\x3a\61\x70\x78\x20\163\x6f\x6c\x69\144\40\43\105\x36\102\x33\102\x32\x3b\x66\x6f\156\x74\55\163\151\172\145\72\x31\70\x70\164\x3b\42\76\124\105\x53\124\x20\x46\x41\x49\x4c\x45\104\74\x2f\144\x69\x76\76\xd\xa\11\x9\x9\x9\74\x64\151\166\40\x73\x74\x79\154\145\x3d\42\x63\157\154\x6f\x72\x3a\40\x23\x61\71\x34\64\64\62\73\x66\157\x6e\x74\x2d\163\151\x7a\x65\x3a\61\64\160\x74\x3b\x20\x6d\141\162\x67\151\156\55\x62\157\164\x74\157\x6d\x3a\62\60\x70\170\x3b\42\76\127\x41\x52\116\x49\x4e\x47\72\40\123\157\155\145\40\x41\164\164\x72\x69\142\x75\x74\x65\163\40\x44\151\x64\40\x4e\157\164\x20\115\141\x74\x63\150\x2e\74\57\144\x69\166\76\15\xa\x9\x9\11\x9\x3c\x64\x69\x76\x20\163\x74\x79\154\x65\x3d\42\x64\x69\x73\x70\154\x61\x79\72\x62\x6c\157\143\x6b\73\164\145\x78\164\x2d\x61\154\x69\x67\156\x3a\143\x65\x6e\164\x65\162\x3b\x6d\x61\x72\147\151\156\x2d\142\x6f\164\164\157\x6d\72\64\45\73\x22\x3e\x3c\x69\x6d\147\40\163\164\171\154\145\75\x22\167\x69\144\x74\150\x3a\61\x35\x25\x3b\42\x73\x72\143\x3d\x22" . plugin_dir_url(__FILE__) . "\x69\x6d\141\147\x65\163\57\167\162\x6f\x6e\147\56\160\156\147\x22\x3e\x3c\x2f\144\151\166\76";
    goto id;
    HF:
    update_option("\155\x6f\x5f\163\141\155\x6c\137\x74\145\163\x74\137\x63\x6f\156\146\151\147\x5f\x61\x74\164\x72\x73", $ED);
    echo "\x3c\144\151\x76\x20\x73\164\171\154\145\x3d\x22\x63\x6f\x6c\157\x72\x3a\x20\x23\63\x63\67\66\63\x64\x3b\15\12\x9\11\11\11\142\x61\x63\153\x67\x72\x6f\165\156\x64\55\x63\157\154\157\162\x3a\x20\x23\144\146\146\x30\x64\x38\x3b\x20\160\x61\x64\144\x69\156\x67\72\x32\45\73\155\141\162\x67\x69\x6e\55\142\157\x74\x74\x6f\x6d\72\62\x30\x70\170\73\164\145\x78\x74\55\141\154\151\147\x6e\72\x63\145\156\164\x65\x72\x3b\40\142\157\162\x64\145\x72\x3a\x31\160\x78\40\x73\157\154\151\144\40\x23\x41\x45\104\102\x39\101\73\40\146\157\156\164\55\x73\151\x7a\145\72\x31\70\160\x74\x3b\x22\x3e\124\x45\123\x54\x20\123\x55\103\x43\105\123\123\x46\125\114\x3c\57\x64\x69\166\76\xd\xa\11\x9\x9\x9\x3c\x64\x69\166\x20\163\x74\171\x6c\x65\x3d\x22\144\151\x73\x70\x6c\x61\171\x3a\142\x6c\157\143\153\x3b\164\x65\170\x74\x2d\141\x6c\x69\x67\x6e\72\x63\145\156\164\x65\x72\x3b\x6d\141\162\x67\151\x6e\x2d\142\x6f\164\164\x6f\x6d\72\x34\45\x3b\x22\76\x3c\x69\x6d\147\x20\x73\164\171\154\x65\x3d\42\167\x69\x64\164\150\x3a\x31\65\45\x3b\x22\163\162\x63\x3d\x22" . plugin_dir_url(__FILE__) . "\151\155\141\x67\145\x73\57\147\162\145\145\156\137\x63\x68\x65\143\153\x2e\x70\156\147\x22\x3e\x3c\57\x64\151\166\76";
    id:
    $yf = get_option("\155\157\137\x73\x61\155\x6c\137\x65\156\x61\142\x6c\145\137\144\x6f\155\x61\151\x6e\x5f\x72\x65\x73\164\162\x69\x63\164\x69\x6f\156\x5f\x6c\157\x67\x69\x6e");
    $dC = $WF == "\164\145\163\164\116\145\x77\103\x65\x72\x74\151\x66\151\x63\x61\x74\145" ? "\144\x69\163\160\x6c\x61\171\72\156\157\x6e\145" : '';
    if (!$yf) {
        goto ex;
    }
    $hf = get_option("\x6d\157\x5f\x73\x61\155\x6c\x5f\x61\154\154\157\x77\137\144\145\156\171\137\x75\x73\145\x72\137\167\151\x74\150\x5f\144\x6f\x6d\x61\151\156");
    if (!empty($hf) && $hf == "\144\x65\156\171") {
        goto nc;
    }
    $Vv = get_option("\163\141\155\x6c\137\141\x6d\x5f\x65\155\141\x69\x6c\x5f\144\x6f\x6d\141\x69\x6e\x73");
    $Il = explode("\73", $Vv);
    $SD = explode("\100", $vZ);
    $eC = !empty($SD[1]) ? $SD[1] : '';
    if (in_array($eC, $Il)) {
        goto KQ;
    }
    echo "\74\x70\40\x73\164\171\x6c\145\x3d\42\143\157\154\157\x72\72\x72\145\144\x3b\42\x3e\124\x68\151\163\40\165\x73\145\x72\40\167\151\x6c\154\40\156\157\x74\x20\142\145\x20\x61\154\x6c\x6f\x77\x65\144\40\164\157\40\x6c\157\147\x69\156\x20\x61\x73\40\164\150\x65\x20\144\x6f\x6d\141\x69\156\40\x6f\x66\x20\164\x68\145\40\145\x6d\x61\x69\x6c\x20\x69\163\x20\156\x6f\164\x20\151\x6e\143\154\165\144\145\144\40\151\x6e\40\164\x68\145\x20\141\154\154\x6f\167\145\x64\x20\154\x69\x73\164\40\x6f\x66\40\x44\157\155\x61\x69\156\40\122\145\x73\x74\162\x69\x63\164\151\157\156\x2e\74\57\x70\x3e";
    KQ:
    goto GG;
    nc:
    $Vv = get_option("\163\141\155\x6c\137\141\x6d\137\x65\x6d\141\151\x6c\x5f\x64\157\155\141\x69\x6e\163");
    $Il = explode("\73", $Vv);
    $SD = explode("\100", $vZ);
    $eC = !empty($SD[1]) ? $SD[1] : '';
    if (!in_array($eC, $Il)) {
        goto ay;
    }
    echo "\74\x70\x20\163\x74\171\x6c\x65\x3d\42\x63\x6f\154\157\162\x3a\162\x65\144\x3b\42\x3e\x54\x68\x69\x73\40\165\163\145\162\x20\x77\151\x6c\154\40\x6e\157\164\x20\x62\x65\40\141\154\x6c\157\167\x65\x64\x20\164\x6f\40\x6c\x6f\147\151\156\x20\141\163\40\164\150\x65\x20\x64\157\155\x61\x69\x6e\x20\157\146\x20\x74\x68\x65\40\145\155\x61\151\154\x20\151\163\40\151\156\143\x6c\x75\144\x65\x64\40\151\x6e\x20\164\x68\145\40\x64\x65\x6e\x69\x65\144\x20\154\151\x73\x74\x20\157\x66\x20\x44\157\x6d\x61\151\156\x20\122\x65\163\x74\x72\151\143\164\x69\x6f\156\56\74\x2f\160\76";
    ay:
    GG:
    ex:
    $PR = get_option("\163\141\x6d\x6c\137\141\155\x5f\165\x73\x65\162\x6e\x61\x6d\x65");
    if (empty($ED[$PR])) {
        goto K1;
    }
    $py = $ED[$PR][0];
    if (!(strlen($py) > 60)) {
        goto OI;
    }
    echo "\x3c\160\x20\x73\x74\x79\x6c\x65\75\42\143\x6f\x6c\157\162\x3a\162\145\144\x3b\x22\x3e\x4e\117\124\105\x20\72\x20\124\x68\151\x73\x20\165\x73\145\x72\x20\167\x69\x6c\154\x20\156\157\164\40\x62\x65\40\141\x62\154\x65\40\164\157\x20\x6c\157\147\151\156\40\141\163\40\x74\150\145\x20\x75\x73\x65\x72\x6e\x61\x6d\x65\x20\166\x61\x6c\165\145\x20\151\163\x20\155\x6f\x72\145\x20\x74\150\x61\x6e\x20\66\60\x20\x63\x68\141\x72\141\x63\164\x65\x72\x73\40\154\157\156\x67\56\x3c\142\162\57\76\15\12\11\11\11\120\x6c\145\x61\x73\x65\40\x74\x72\171\x20\x63\150\141\156\x67\151\x6e\x67\40\x74\150\145\40\155\141\160\160\x69\156\147\x20\157\x66\x20\125\x73\145\x72\x6e\x61\x6d\145\40\146\x69\145\x6c\144\x20\151\x6e\x20\x3c\x61\x20\150\x72\145\x66\x3d\x22\43\x22\40\x6f\x6e\103\154\x69\x63\x6b\75\x22\143\154\x6f\x73\145\137\x61\156\x64\x5f\162\x65\x64\x69\162\x65\143\164\x28\51\73\42\76\101\x74\x74\162\x69\142\x75\164\145\x2f\x52\x6f\x6c\x65\x20\115\x61\160\160\151\156\147\74\57\141\76\40\x74\x61\x62\56\74\57\x70\76";
    OI:
    K1:
    echo "\x3c\x73\160\x61\x6e\x20\x73\164\x79\x6c\x65\x3d\42\146\157\156\164\x2d\x73\151\172\x65\72\x31\x34\160\x74\73\42\x3e\x3c\142\76\110\145\x6c\154\157\74\57\x62\76\54\x20" . $vZ . "\74\57\163\x70\141\156\76\x3c\142\x72\57\x3e\74\x70\40\163\x74\x79\x6c\145\75\42\x66\x6f\x6e\x74\x2d\x77\x65\151\147\x68\x74\x3a\x62\157\154\144\x3b\x66\x6f\156\164\55\163\x69\172\x65\x3a\61\64\x70\164\73\155\x61\162\x67\x69\156\55\x6c\145\146\x74\x3a\61\x25\73\42\x3e\x41\124\x54\x52\x49\x42\125\124\x45\x53\40\x52\105\x43\x45\x49\x56\105\104\72\74\x2f\x70\x3e\15\xa\x9\11\11\x9\x3c\164\x61\x62\x6c\145\40\x73\164\x79\154\x65\x3d\42\x62\157\x72\x64\145\x72\x2d\x63\x6f\154\x6c\x61\x70\x73\145\x3a\143\x6f\x6c\x6c\x61\160\x73\x65\73\x62\157\162\x64\x65\162\55\x73\160\141\x63\x69\156\147\x3a\x30\73\x20\144\151\x73\x70\154\x61\171\72\164\141\x62\154\145\x3b\167\151\x64\x74\x68\72\x31\x30\60\x25\73\40\146\157\156\x74\55\x73\151\x7a\145\x3a\61\x34\x70\164\73\142\x61\143\153\147\x72\x6f\165\x6e\x64\x2d\143\157\154\157\x72\x3a\x23\105\x44\105\104\105\x44\73\x22\76\15\12\11\x9\11\11\74\x74\162\40\x73\164\x79\x6c\x65\75\x22\164\x65\x78\164\x2d\x61\154\x69\x67\x6e\x3a\143\145\156\164\145\x72\73\x22\x3e\74\164\x64\x20\163\164\171\154\145\75\x22\146\x6f\156\x74\55\x77\x65\x69\x67\150\164\72\142\x6f\x6c\x64\73\142\x6f\162\144\x65\x72\72\62\160\x78\x20\x73\157\x6c\151\144\x20\x23\x39\x34\x39\60\x39\60\x3b\x70\141\x64\x64\151\x6e\x67\72\x32\45\x3b\42\76\x41\x54\x54\x52\111\x42\x55\x54\x45\40\x4e\x41\115\x45\x3c\x2f\164\144\x3e\74\164\144\40\x73\x74\171\x6c\x65\75\42\x66\157\156\164\55\x77\x65\151\x67\150\x74\72\x62\157\x6c\144\x3b\160\x61\x64\144\151\156\x67\72\62\x25\73\x62\157\162\x64\x65\162\72\62\160\170\x20\x73\157\x6c\x69\x64\40\x23\x39\x34\x39\x30\71\x30\x3b\x20\x77\157\162\144\x2d\167\162\141\160\x3a\142\x72\x65\141\153\55\x77\157\x72\x64\73\42\76\101\124\124\122\x49\x42\x55\124\x45\40\126\x41\x4c\x55\x45\74\57\164\x64\x3e\x3c\x2f\x74\x72\x3e";
    if (!empty($ED)) {
        goto ix;
    }
    echo "\x4e\157\40\101\164\164\x72\151\x62\x75\164\x65\163\x20\x52\x65\143\x65\x69\166\145\x64\56";
    goto aC;
    ix:
    foreach ($ED as $mr => $Wl) {
        echo "\x3c\x74\162\76\74\164\x64\40\163\164\x79\154\145\x3d\x27\146\x6f\156\164\55\167\145\151\147\x68\x74\x3a\142\157\x6c\x64\x3b\142\x6f\162\x64\x65\162\72\62\x70\x78\40\x73\157\x6c\151\144\40\43\71\x34\71\60\71\60\x3b\x70\141\144\x64\151\x6e\147\x3a\x32\45\x3b\47\x3e" . $mr . "\x3c\57\x74\144\76\74\164\144\40\163\164\171\x6c\x65\75\47\x70\x61\x64\144\151\x6e\147\72\x32\45\73\142\x6f\162\144\x65\x72\x3a\x32\160\x78\x20\x73\157\154\x69\144\x20\43\x39\x34\71\60\x39\60\73\x20\x77\157\x72\144\55\x77\162\141\160\x3a\x62\x72\145\x61\x6b\x2d\167\157\162\144\73\x27\x3e" . implode("\74\150\162\57\x3e", $Wl) . "\74\57\x74\144\76\74\57\x74\x72\x3e";
        dU:
    }
    qX:
    aC:
    echo "\x3c\57\164\141\142\x6c\145\76\x3c\x2f\x64\x69\x76\x3e";
    echo "\x3c\144\151\x76\x20\163\164\x79\x6c\145\75\x22\155\141\x72\x67\x69\156\x3a\x33\x25\73\x64\151\163\x70\x6c\x61\x79\x3a\x62\154\x6f\x63\x6b\73\164\145\x78\164\x2d\141\x6c\x69\147\156\72\143\x65\x6e\164\x65\162\73\42\x3e\xd\xa\x9\x9\x3c\151\156\160\x75\164\x20\x73\164\x79\154\145\75\42\160\141\x64\144\x69\156\147\72\x31\x25\73\167\151\144\x74\150\x3a\62\65\60\160\x78\73\x62\x61\143\x6b\x67\162\x6f\165\x6e\144\x3a\x20\x23\x30\x30\71\x31\103\x44\40\x6e\157\x6e\x65\x20\x72\x65\x70\x65\141\164\40\x73\143\x72\157\x6c\x6c\40\x30\45\x20\60\45\73\15\xa\11\11\x63\x75\x72\163\157\x72\x3a\x20\x70\x6f\151\x6e\x74\x65\162\73\146\x6f\156\164\x2d\x73\x69\172\x65\72\61\65\x70\x78\x3b\x62\x6f\x72\x64\145\x72\55\x77\151\x64\x74\x68\72\40\61\160\170\x3b\x62\157\162\144\145\x72\x2d\163\x74\171\x6c\145\x3a\x20\x73\x6f\x6c\151\144\x3b\x62\x6f\162\144\x65\162\55\162\141\144\x69\x75\x73\x3a\40\63\160\x78\73\x77\150\151\x74\145\55\x73\160\141\x63\x65\x3a\15\12\x9\11\x20\156\x6f\167\x72\141\160\x3b\142\x6f\x78\55\163\151\x7a\151\156\x67\x3a\40\142\157\x72\144\145\x72\55\142\x6f\x78\73\142\157\162\x64\x65\x72\x2d\x63\157\x6c\x6f\x72\x3a\x20\x23\x30\x30\x37\63\101\x41\x3b\x62\x6f\x78\55\x73\150\x61\x64\157\167\72\x20\x30\x70\170\x20\x31\160\x78\40\60\160\170\40\162\x67\x62\141\50\x31\x32\x30\x2c\x20\62\x30\60\x2c\40\62\x33\x30\x2c\x20\x30\x2e\66\x29\40\151\156\163\145\164\73\143\157\154\x6f\162\72\40\43\x46\106\106\73" . $dC . "\x22\xd\xa\40\40\40\40\x20\x20\40\x20\40\x20\40\x20\164\x79\160\145\x3d\x22\142\x75\x74\164\x6f\x6e\42\40\166\141\x6c\x75\x65\x3d\x22\103\157\156\x66\x69\147\165\162\145\40\101\x74\x74\162\x69\142\x75\164\x65\57\x52\157\154\x65\x20\115\141\160\x70\x69\156\147\x22\40\157\156\x43\154\x69\143\x6b\x3d\x22\143\154\157\163\145\137\x61\156\144\x5f\x72\x65\144\x69\162\x65\x63\x74\50\51\x3b\42\76\x20\46\x6e\x62\163\x70\x3b\x20\xd\xa\40\x20\x20\40\40\40\x20\40\x20\40\x20\x20\15\xa\x9\x9\74\x69\156\160\165\164\x20\x73\164\171\x6c\145\75\x22\160\141\x64\144\151\x6e\147\72\61\x25\73\x77\x69\x64\x74\x68\x3a\61\x30\60\x70\170\x3b\x62\141\x63\x6b\147\x72\x6f\x75\156\144\x3a\40\x23\60\60\71\x31\x43\104\x20\156\157\156\145\40\x72\145\160\x65\141\164\40\x73\143\x72\x6f\154\x6c\40\x30\45\40\x30\45\73\x63\x75\162\163\x6f\x72\72\x20\x70\157\151\x6e\164\145\x72\x3b\146\157\156\x74\55\163\151\172\145\72\61\65\160\170\73\x62\x6f\x72\144\145\162\x2d\167\151\144\x74\x68\72\x20\x31\160\x78\x3b\x62\157\162\x64\x65\x72\x2d\x73\164\x79\x6c\x65\72\40\x73\x6f\x6c\x69\144\73\142\157\x72\144\145\162\x2d\162\x61\144\x69\165\163\x3a\40\63\x70\x78\73\167\150\151\164\145\x2d\x73\x70\141\x63\145\x3a\x20\156\157\x77\x72\141\x70\x3b\142\157\170\x2d\x73\151\172\151\x6e\x67\x3a\x20\x62\157\x72\x64\x65\162\55\x62\157\170\73\x62\157\x72\144\145\162\x2d\143\x6f\x6c\157\x72\x3a\40\x23\60\60\x37\x33\101\101\x3b\x62\x6f\170\55\x73\150\141\x64\157\x77\x3a\x20\60\160\x78\x20\61\x70\x78\x20\x30\160\x78\40\x72\147\x62\141\50\61\62\x30\54\40\62\x30\x30\x2c\x20\62\63\60\x2c\x20\x30\56\x36\51\40\151\156\x73\x65\164\x3b\143\157\x6c\x6f\x72\72\x20\43\106\106\106\x3b\x22\164\171\160\145\x3d\42\142\x75\x74\164\x6f\156\x22\x20\166\141\x6c\x75\145\x3d\42\104\157\x6e\x65\42\x20\157\x6e\103\154\151\x63\153\75\x22\x73\145\154\x66\x2e\143\154\157\163\x65\x28\x29\x3b\42\76\74\57\x64\151\166\x3e\xd\12\11\x9\15\12\x9\x9\x3c\x73\143\x72\151\x70\164\76\15\12\x20\40\40\x20\x20\40\40\40\40\40\x20\x20\40\x66\x75\156\143\x74\x69\157\156\x20\x63\154\x6f\163\145\x5f\x61\x6e\x64\137\162\x65\x64\151\162\x65\x63\x74\50\51\173\15\12\x20\40\x20\40\x20\x20\40\x20\40\x20\40\x20\40\40\40\40\x20\x77\151\x6e\144\x6f\167\56\157\160\x65\156\145\162\x2e\162\x65\x64\x69\x72\145\x63\x74\137\164\x6f\137\141\164\x74\x72\151\x62\x75\164\145\137\155\141\x70\x70\x69\156\x67\x28\x29\x3b\xd\xa\x20\x20\x20\40\40\x20\x20\40\x20\40\x20\x20\x20\x20\40\40\40\x73\x65\x6c\146\56\143\x6c\x6f\163\x65\50\51\73\15\xa\x20\x20\x20\40\40\x20\x20\x20\40\x20\x20\x20\x20\175\40\40\x20\15\xa\xd\xa\11\x9\x3c\57\x73\x63\x72\x69\160\164\x3e";
    exit;
}
function mo_saml_convert_to_windows_iconv($lj)
{
    $PP = LicenseHelper::getCurrentOption(Mo_Saml_Options_Enum_Service_Provider::IS_ENCODING_ENABLED);
    if (!($PP === "\143\x68\x65\143\153\x65\x64" && mo_saml_is_extension_installed(Mo_Saml_Options_Enum_Extension::ICONV))) {
        goto Yf;
    }
    return @iconv(Mo_Saml_Options_Enum_Encoding::ENCODING_UTF_8, Mo_Saml_Options_Enum_Encoding::ENCODING_CP1252, $lj);
    Yf:
    return $lj;
}
function mo_saml_login_user($vZ, $WG, $Bq, $BT, $hI, $DN, $OE, $WF, $Eq, $bZ = '', $Ag = '', $ED = null)
{
    do_action("\155\157\137\141\x62\162\x5f\146\151\154\x74\145\162\137\x6c\157\x67\151\x6e", $ED, $Ag, $bZ);
    check_if_user_allowed_to_login_due_to_role_restriction($hI);
    $j1 = get_option("\x6d\x6f\x5f\163\x61\155\154\x5f\163\x70\x5f\x62\141\x73\145\x5f\165\162\154");
    if (!empty($j1)) {
        goto lV;
    }
    $j1 = home_url();
    lV:
    mo_saml_restrict_users_based_on_domain($vZ);
    $BT = mo_saml_sanitize_username($BT);
    if (!(strlen($BT) > 60)) {
        goto m4;
    }
    wp_die("\127\x65\x20\x63\x6f\165\154\144\40\156\157\x74\x20\163\151\147\x6e\x20\171\157\x75\x20\x69\156\x2e\x20\120\154\x65\x61\163\x65\x20\143\157\x6e\x74\141\x63\x74\40\x79\157\x75\x72\40\x61\x64\155\151\x6e\x69\x73\x74\162\141\x74\x6f\162\56", "\x45\x72\x72\157\x72\x20\x3a\40\x55\x73\x65\162\156\141\155\x65\x20\x6c\x65\x6e\x67\x74\x68\x20\154\x69\155\x69\164\40\x72\x65\141\143\x68\145\144");
    exit;
    m4:
    $ws = array("\151\x64\160\x5f\x6e\141\155\x65" => get_option("\x73\x61\155\x6c\137\151\144\145\156\164\x69\164\171\137\156\x61\155\145"));
    $wW = get_option("\155\x6f\137\x61\154\x6c\157\x77\x5f\x65\x78\151\163\x74\151\156\x67\x5f\165\163\145\x72\x5f\x6c\x6f\147\x69\156");
    $l1 = false;
    if (!SAMLSPUtilities::mo_saml_is_plugin_active(Mo_Saml_Addons_Directory::ADVANCED_ROLE_MAPPING)) {
        goto xJ;
    }
    $l1 = true;
    xJ:
    $Am = get_option("\163\141\155\x6c\137\x69\144\145\156\164\151\164\171\x5f\x6e\x61\155\x65");
    if (username_exists($BT) || email_exists($vZ)) {
        goto jR;
    }
    if (Mo_Saml_License_Utility::is_customer_license_valid()) {
        goto Zt;
    }
    wp_die("\x3c\142\76\133\x57\120\x53\101\115\114\x45\x52\x52\60\x30\x30\x5d\74\x2f\x62\x3e\40\127\145\40\143\157\x75\154\144\x20\156\157\164\x20\163\151\x67\156\40\x79\x6f\165\x20\x69\x6e\56\x20\x50\x6c\145\141\163\145\x20\143\157\x6e\x74\x61\143\x74\40\x79\x6f\165\x72\x20\x61\x64\155\151\156\151\x73\x74\x72\x61\164\157\162\x20\167\151\x74\x68\40\164\x68\x65\40\x6d\145\156\x74\151\x6f\x6e\x65\x64\x20\x65\162\162\157\x72\x20\143\157\x64\145\56", "\105\162\162\157\162\40\x3a\x20\133\127\120\123\x41\x4d\x4c\x45\122\x52\x30\x30\x30\x5d\40\111\x6e\166\x61\x6c\151\x64\x20\114\x69\x63\x65\x6e\x73\x65");
    Zt:
    do_action("\x6d\157\137\x67\165\x65\x73\x74\137\x6c\x6f\x67\151\x6e", $Ag, $bZ, $ws);
    $p5 = get_option("\x73\x61\x6d\x6c\137\x61\155\137\162\x6f\154\x65\x5f\155\x61\x70\160\x69\x6e\147");
    $p5 = maybe_unserialize($p5);
    $z8 = true;
    if ($l1) {
        goto BP;
    }
    $NB = get_option("\155\157\x5f\x73\141\x6d\x6c\x5f\x64\157\x6e\164\137\x63\162\x65\x61\x74\x65\x5f\165\x73\145\162\137\151\x66\x5f\x72\157\154\x65\x5f\x6e\x6f\x74\137\x6d\x61\160\160\x65\144");
    if (!(!empty($NB) && strcmp($NB, "\143\x68\x65\143\153\145\x64") == 0)) {
        goto GT;
    }
    $Kx = is_role_mapping_configured_for_user($p5, $hI);
    $z8 = $Kx;
    GT:
    BP:
    if ($z8 === true) {
        goto Fe;
    }
    $qL = get_option("\x6d\x6f\x5f\163\x61\155\154\x5f\141\x63\x63\157\x75\x6e\164\137\143\x72\x65\141\164\x69\157\x6e\x5f\144\x69\x73\141\x62\x6c\x65\x64\137\155\163\x67");
    if (!empty($qL)) {
        goto QT;
    }
    $qL = "\127\x65\40\x63\x6f\165\154\x64\40\156\157\164\x20\x73\x69\147\x6e\40\171\x6f\165\40\x69\x6e\56\40\120\x6c\145\x61\163\x65\40\x63\157\x6e\x74\141\x63\164\x20\x79\157\x75\162\x20\101\144\155\x69\156\x69\163\x74\x72\x61\x74\x6f\162\56";
    QT:
    wp_die($qL, "\105\x72\162\157\162\x3a\40\116\157\x74\40\141\x20\x57\x6f\x72\x64\120\x72\145\x73\163\40\x4d\145\155\x62\145\x72");
    exit;
    goto zg;
    Fe:
    $J5 = wp_generate_password(10, false);
    if (!empty($BT)) {
        goto Xd;
    }
    $Kn = wp_create_user($vZ, $J5, $vZ);
    goto g0;
    Xd:
    $Kn = wp_create_user($BT, $J5, $vZ);
    g0:
    if (!is_wp_error($Kn)) {
        goto H5;
    }
    wp_die($Kn->get_error_message() . "\x3c\x62\162\x3e\x50\154\145\x61\163\x65\x20\x63\157\x6e\164\141\143\x74\x20\x79\x6f\x75\x72\40\101\x64\x6d\151\x6e\x69\x73\164\x72\141\x74\x6f\x72\x2e\x3c\142\x72\x3e\74\x62\x3e\125\163\x65\x72\x6e\x61\155\x65\x3c\57\142\76\x3a\40" . $vZ, "\105\162\x72\x6f\162\x3a\40\103\x6f\165\x6c\x64\x6e\47\164\x20\143\162\x65\x61\164\145\x20\x75\x73\x65\x72");
    H5:
    $user = get_user_by("\x69\144", $Kn);
    if ($l1) {
        goto TK;
    }
    $dO = assign_roles_to_user($user, $p5, $hI);
    if ($dO !== true && !empty($DN) && $DN == "\x63\x68\x65\143\x6b\145\x64") {
        goto Fs;
    }
    if ($dO !== true && !empty($OE)) {
        goto CO;
    }
    if ($dO !== true) {
        goto mc;
    }
    goto vS;
    Fs:
    $e5 = wp_update_user(array("\111\x44" => $Kn, "\x72\157\154\145" => false));
    goto vS;
    CO:
    $e5 = wp_update_user(array("\111\104" => $Kn, "\162\157\x6c\x65" => $OE));
    goto vS;
    mc:
    $OE = get_option("\x64\x65\146\x61\165\x6c\164\x5f\162\x6f\154\145");
    $e5 = wp_update_user(array("\x49\104" => $Kn, "\x72\x6f\x6c\145" => $OE));
    vS:
    goto v2;
    TK:
    do_action("\155\x6f\x5f\163\141\155\154\137\x61\x73\x73\x69\147\x6e\x5f\x72\157\154\x65\137\x61\x72\x6d", $user, $ED, true, $Am);
    v2:
    mo_saml_map_attributes($user, $WG, $Bq, $ED);
    mo_saml_set_auth_cookie($user, $bZ, $Ag, true);
    do_action("\x6d\x6f\137\x73\x61\155\154\x5f\x61\164\164\162\151\x62\165\x74\145\163", $BT, $vZ, $WG, $Bq, $hI);
    zg:
    goto Ks;
    jR:
    if (!($wW != "\164\162\165\x65")) {
        goto wG;
    }
    do_action("\155\157\137\x67\165\x65\163\x74\x5f\x6c\157\x67\151\x6e", $Ag, $bZ, $ws);
    wG:
    if (username_exists($BT)) {
        goto fe;
    }
    if (!email_exists($vZ)) {
        goto lP;
    }
    $user = get_user_by("\x65\155\141\x69\154", $vZ);
    $Kn = $user->ID;
    lP:
    goto Cl;
    fe:
    $user = get_user_by("\154\x6f\x67\151\x6e", $BT);
    $Kn = $user->ID;
    if (!(!empty($vZ) && is_email($vZ))) {
        goto o1;
    }
    $e5 = wp_update_user(array("\111\x44" => $Kn, "\165\x73\x65\162\137\145\x6d\x61\x69\154" => $vZ));
    o1:
    Cl:
    if (!(!Mo_Saml_License_Utility::is_customer_license_valid() && !is_administrator_user($user))) {
        goto Ed;
    }
    wp_die("\74\142\x3e\x5b\x57\x50\123\101\115\114\x45\122\x52\x30\60\x30\135\x3c\x2f\x62\x3e\x20\127\x65\40\143\x6f\x75\x6c\144\x20\x6e\x6f\164\x20\x73\151\147\x6e\40\171\157\165\x20\151\156\x2e\40\120\154\x65\141\x73\145\x20\143\157\156\164\x61\x63\164\40\171\x6f\x75\162\x20\141\144\155\151\156\151\163\164\162\x61\164\x6f\162\40\167\x69\x74\x68\x20\164\150\145\x20\x6d\x65\x6e\x74\151\157\156\x65\144\40\x65\162\x72\x6f\x72\40\143\x6f\x64\x65\56", "\105\x72\162\157\162\x20\72\40\133\x57\x50\x53\x41\x4d\114\105\122\122\60\60\60\135\x20\x49\x6e\166\141\x6c\151\144\x20\114\151\x63\x65\x6e\x73\145");
    Ed:
    mo_saml_map_attributes($user, $WG, $Bq, $ED);
    if ($l1) {
        goto yl;
    }
    $p5 = maybe_unserialize(get_option("\x73\141\x6d\154\137\x61\x6d\x5f\162\x6f\154\x65\137\155\141\x70\160\x69\156\x67"));
    $sc = get_option("\163\141\155\154\137\141\x6d\137\144\157\x6e\x74\x5f\165\x70\x64\141\164\145\x5f\145\x78\151\163\x74\x69\156\147\137\165\163\x65\162\137\162\x6f\x6c\x65");
    if (!(empty($sc) || $sc != "\143\150\145\x63\x6b\145\x64")) {
        goto x2;
    }
    $dO = assign_roles_to_user($user, $p5, $hI);
    $vX = get_option("\163\141\155\154\x5f\141\155\137\x75\160\x64\x61\164\145\137\141\x64\155\x69\156\137\x75\x73\145\x72\163\137\162\157\154\x65");
    if ($dO !== true && !is_administrator_user($user) && !empty($DN) && $DN == "\x63\x68\145\x63\153\145\144") {
        goto D0;
    }
    if ($dO !== true && !is_administrator_user($user) && !empty($OE)) {
        goto hr;
    }
    if ($dO !== true && is_administrator_user($user) && !empty($vX) && $vX == "\x63\150\145\x63\x6b\x65\x64" && !empty($DN) && $DN == "\x63\x68\145\143\153\145\144") {
        goto dc;
    }
    if ($dO !== true && is_administrator_user($user) && !empty($vX) && $vX == "\143\150\x65\x63\153\x65\144" && !empty($OE)) {
        goto kN;
    }
    goto k7;
    D0:
    $e5 = wp_update_user(array("\x49\104" => $Kn, "\x72\157\x6c\x65" => false));
    goto k7;
    hr:
    $e5 = wp_update_user(array("\x49\104" => $Kn, "\x72\x6f\x6c\145" => $OE));
    goto k7;
    dc:
    $e5 = wp_update_user(array("\111\x44" => $Kn, "\x72\157\154\145" => false));
    goto k7;
    kN:
    $e5 = wp_update_user(array("\x49\x44" => $Kn, "\x72\157\154\145" => $OE));
    k7:
    x2:
    goto kQ;
    yl:
    do_action("\x6d\157\137\163\x61\155\x6c\x5f\141\x73\x73\151\x67\x6e\137\162\x6f\154\x65\x5f\141\x72\x6d", $user, $ED, false, $Am);
    kQ:
    mo_saml_set_auth_cookie($user, $bZ, $Ag);
    do_action("\x6d\x6f\137\x73\141\x6d\154\x5f\141\x74\x74\x72\x69\142\165\x74\x65\163", $BT, $vZ, $WG, $Bq, $hI);
    Ks:
    mo_saml_post_login_redirection($WF, $j1);
}
function mo_saml_sanitize_username($BT)
{
    $bw = sanitize_user($BT, true);
    $IO = apply_filters("\160\162\x65\137\165\x73\x65\x72\x5f\x6c\157\147\151\156", $bw);
    $BT = trim($IO);
    return $BT;
}
function mo_saml_restrict_users_based_on_domain($vZ)
{
    $yf = get_option("\155\x6f\x5f\163\x61\155\154\x5f\x65\x6e\141\x62\x6c\145\137\144\157\155\x61\151\x6e\x5f\x72\145\163\x74\162\x69\x63\164\x69\x6f\x6e\137\x6c\157\x67\x69\x6e");
    if (!$yf) {
        goto ON;
    }
    $Vv = get_option("\163\x61\x6d\154\x5f\141\x6d\137\145\x6d\x61\151\x6c\137\x64\x6f\x6d\x61\x69\x6e\x73");
    $Il = explode("\x3b", $Vv);
    $SD = explode("\100", $vZ);
    $eC = !empty($SD[1]) ? $SD[1] : '';
    $hf = get_option("\x6d\x6f\137\x73\x61\155\x6c\137\x61\x6c\x6c\x6f\167\137\x64\x65\156\171\137\165\163\145\x72\137\167\x69\164\x68\137\144\x6f\155\141\x69\x6e");
    $qL = get_option("\x6d\157\x5f\x73\x61\x6d\154\x5f\x72\145\163\164\162\x69\143\164\145\x64\137\144\157\x6d\141\151\x6e\137\x65\x72\x72\x6f\162\x5f\x6d\163\x67");
    if (!empty($qL)) {
        goto y5;
    }
    $qL = "\131\x6f\165\x20\x61\162\x65\x20\x6e\157\164\40\x61\x6c\154\157\x77\x65\144\40\x74\x6f\x20\x6c\x6f\147\x69\x6e\x2e\x20\120\154\145\141\x73\x65\x20\x63\157\x6e\164\x61\143\x74\x20\171\157\x75\162\40\101\144\x6d\x69\156\151\163\164\162\x61\164\x6f\x72\56";
    y5:
    if (!empty($hf) && $hf == "\144\145\156\x79") {
        goto U0;
    }
    if (in_array($eC, $Il)) {
        goto dF;
    }
    wp_die($qL, "\x50\x65\x72\155\x69\163\x73\x69\x6f\156\40\x44\x65\156\x69\145\144\x20\72\40\x4e\x6f\164\40\141\x20\127\x68\x69\164\x65\x6c\x69\163\164\x65\x64\x20\x75\163\x65\162\56");
    dF:
    goto PB;
    U0:
    if (!in_array($eC, $Il)) {
        goto Vq;
    }
    wp_die($qL, "\x50\x65\162\155\x69\x73\x73\x69\157\x6e\40\104\x65\156\x69\x65\144\x20\72\x20\x42\x6c\x61\x63\153\154\151\x73\x74\145\144\40\x75\163\145\162\x2e");
    Vq:
    PB:
    ON:
}
function mo_saml_map_attributes($user, $WG, $Bq, $ED)
{
    mo_saml_map_basic_attributes($user, $WG, $Bq, $ED);
    mo_saml_map_custom_attributes($user, $ED);
}
function mo_saml_map_basic_attributes($user, $WG, $Bq, $ED)
{
    $Kn = $user->ID;
    if (empty($WG)) {
        goto ox;
    }
    $e5 = wp_update_user(array("\x49\104" => $Kn, "\146\151\x72\x73\x74\x5f\156\x61\155\x65" => $WG));
    ox:
    if (empty($Bq)) {
        goto RF;
    }
    $e5 = wp_update_user(array("\x49\x44" => $Kn, "\154\x61\x73\x74\137\156\141\155\145" => $Bq));
    RF:
    if (is_null($ED)) {
        goto k5;
    }
    update_user_meta($Kn, "\155\157\x5f\x73\x61\155\154\x5f\x75\x73\145\162\137\x61\164\x74\x72\151\x62\165\164\145\x73", $ED);
    $zX = get_option("\x73\141\155\154\137\x61\x6d\x5f\x64\151\x73\160\x6c\141\x79\137\x6e\141\155\145");
    if (empty($zX)) {
        goto nH;
    }
    if (strcmp($zX, "\x55\x53\105\122\116\x41\x4d\x45") == 0) {
        goto gk;
    }
    if (strcmp($zX, "\x46\116\x41\115\x45") == 0 && !empty($WG)) {
        goto vQ;
    }
    if (strcmp($zX, "\114\x4e\x41\x4d\x45") == 0 && !empty($Bq)) {
        goto DH;
    }
    if (strcmp($zX, "\106\116\x41\115\105\x5f\x4c\116\101\x4d\x45") == 0 && !empty($Bq) && !empty($WG)) {
        goto F3;
    }
    if (!(strcmp($zX, "\x4c\x4e\101\115\x45\137\106\x4e\x41\x4d\x45") == 0 && !empty($Bq) && !empty($WG))) {
        goto Li;
    }
    $e5 = wp_update_user(array("\111\104" => $Kn, "\x64\x69\x73\160\154\141\171\137\156\141\x6d\145" => $Bq . "\40" . $WG));
    Li:
    goto PO;
    F3:
    $e5 = wp_update_user(array("\111\104" => $Kn, "\x64\x69\163\x70\x6c\141\x79\137\156\x61\155\145" => $WG . "\40" . $Bq));
    PO:
    goto mn;
    DH:
    $e5 = wp_update_user(array("\x49\x44" => $Kn, "\x64\151\x73\160\154\x61\x79\137\x6e\x61\155\145" => $Bq));
    mn:
    goto nk;
    vQ:
    $e5 = wp_update_user(array("\111\104" => $Kn, "\x64\x69\163\160\154\141\171\x5f\156\x61\x6d\x65" => $WG));
    nk:
    goto NV;
    gk:
    $e5 = wp_update_user(array("\x49\x44" => $Kn, "\x64\x69\163\x70\154\141\x79\137\x6e\141\155\145" => $user->user_login));
    NV:
    nH:
    k5:
}
function mo_saml_map_custom_attributes($user, $ED)
{
    $Kn = $user->ID;
    if (!get_option("\155\x6f\x5f\163\x61\155\x6c\137\x63\165\163\164\x6f\155\x5f\141\x74\x74\162\x73\x5f\155\x61\x70\160\x69\x6e\147")) {
        goto ie;
    }
    $K5 = maybe_unserialize(get_option("\x6d\x6f\x5f\x73\x61\155\x6c\x5f\x63\165\163\x74\157\155\137\141\164\x74\162\x73\x5f\155\x61\x70\160\151\156\x67"));
    foreach ($K5 as $mr => $Wl) {
        if (empty($ED[$Wl])) {
            goto mP;
        }
        $Rm = false;
        if (!(count($ED[$Wl]) == 1)) {
            goto XS;
        }
        $Rm = true;
        XS:
        if (!$Rm) {
            goto LD;
        }
        update_user_meta($Kn, $mr, $ED[$Wl][0]);
        goto j0;
        LD:
        $zv = array();
        foreach ($ED[$Wl] as $vv) {
            array_push($zv, $vv);
            EP:
        }
        l3:
        update_user_meta($Kn, $mr, $zv);
        j0:
        mP:
        Dq:
    }
    bA:
    ie:
}
function mo_saml_set_auth_cookie($user, $bZ, $Ag, $l8 = false)
{
    $Kn = $user->ID;
    $CH = SAMLSPUtilities::mo_saml_get_secure_cookie_attribute();
    wp_set_current_user($Kn);
    $Sw = false;
    $Sw = apply_filters("\x6d\157\x5f\162\x65\x6d\x65\x6d\142\145\x72\137\x6d\145", $Sw);
    wp_set_auth_cookie($Kn, $Sw);
    if (empty($bZ)) {
        goto kA;
    }
    update_user_meta($Kn, "\x6d\x6f\137\x73\x61\155\154\137\x73\145\163\163\x69\x6f\156\137\x69\x6e\x64\x65\170", $bZ);
    kA:
    if (empty($Ag)) {
        goto vq;
    }
    update_user_meta($Kn, "\x6d\157\137\x73\x61\155\154\x5f\x6e\x61\155\x65\137\151\x64", $Ag);
    vq:
    setcookie("\154\157\x67\x67\145\x64\137\x69\x6e\x5f\167\151\x74\150\137\x69\x64\x70", base64_encode($bZ . true), 0, "\x2f", '', $CH, true);
    if (!(!session_id() || session_id() == '' || empty($_SESSION))) {
        goto OC;
    }
    session_start();
    OC:
    $_SESSION["\155\157\137\x73\x61\155\154"]["\154\x6f\x67\x67\x65\144\137\x69\x6e\137\x77\x69\164\150\x5f\151\x64\x70"] = TRUE;
    if (!$l8) {
        goto t7;
    }
    do_action("\x75\163\x65\162\137\x72\145\147\151\163\164\x65\x72", $Kn);
    t7:
    do_action("\167\x70\x5f\154\x6f\147\151\x6e", $user->user_login, $user);
}
function mo_saml_post_login_redirection($WF, $j1)
{
    $WF = htmlspecialchars_decode($WF);
    $lb = get_option("\x6d\x6f\x5f\x73\141\x6d\x6c\x5f\x72\145\x6c\x61\171\x5f\163\164\x61\164\145");
    if (!empty($lb)) {
        goto ja;
    }
    if (empty($WF)) {
        goto DY;
    }
    $rr = '';
    if (!get_option("\x6d\x6f\x5f\163\141\155\x6c\x5f\x73\x65\x6e\144\x5f\x61\x62\163\157\154\x75\x74\145\x5f\x72\145\154\141\x79\x5f\x73\x74\141\x74\x65")) {
        goto os;
    }
    $v5 = get_option("\x6d\x6f\137\163\x61\x6d\154\137\143\165\x73\x74\x6f\x6d\x65\x72\x5f\164\157\x6b\x65\156");
    $rr = AESEncryption::decrypt_data($WF, $v5);
    os:
    if (!empty($rr)) {
        goto tU;
    }
    if (filter_var($WF, FILTER_VALIDATE_URL) === FALSE) {
        goto ih;
    }
    if (strpos($WF, home_url()) !== false) {
        goto VM;
    }
    $bD = htmlspecialchars_decode($j1);
    goto Sp;
    VM:
    $bD = htmlspecialchars_decode($WF);
    Sp:
    goto fH;
    tU:
    $bD = htmlspecialchars_decode($rr);
    goto fH;
    ih:
    $bD = htmlspecialchars_decode($WF);
    fH:
    DY:
    goto u5;
    ja:
    $bD = htmlspecialchars_decode($lb);
    u5:
    if (!empty($bD)) {
        goto qL;
    }
    $bD = htmlspecialchars_decode($j1);
    qL:
    wp_redirect($bD);
    exit;
}
function check_if_user_allowed_to_login_due_to_role_restriction($hI)
{
    $OC = get_option("\163\x61\x6d\154\x5f\141\155\x5f\x64\157\x6e\164\137\x61\154\x6c\x6f\x77\137\165\163\145\x72\137\x74\157\154\x6f\x67\x69\156\x5f\143\x72\145\141\164\x65\137\x77\151\x74\x68\x5f\x67\x69\x76\145\156\x5f\x67\x72\157\x75\160\x73");
    if (!($OC == "\x63\150\x65\143\x6b\145\144")) {
        goto TZ;
    }
    if (empty($hI)) {
        goto aE;
    }
    $J9 = get_option("\x6d\x6f\137\x73\x61\x6d\x6c\x5f\x72\145\x73\164\162\x69\143\164\x5f\165\x73\x65\x72\x73\x5f\167\x69\164\x68\x5f\x67\x72\157\165\160\163");
    $oR = explode("\73", $J9);
    foreach ($oR as $gd) {
        foreach ($hI as $Sl) {
            $Sl = trim($Sl);
            if (!(!empty($Sl) && $Sl == $gd)) {
                goto wa;
            }
            wp_die("\131\157\x75\x20\141\162\x65\40\x6e\157\164\x20\x61\165\164\x68\157\x72\151\172\x65\x64\40\x74\x6f\40\x6c\157\x67\x69\156\56\40\120\154\x65\141\163\x65\40\143\157\156\x74\141\x63\x74\40\x79\x6f\x75\x72\40\x61\144\155\151\x6e\151\163\164\x72\141\x74\x6f\162\x2e", "\105\162\162\157\162");
            wa:
            dH:
        }
        jJ:
        ME:
    }
    bB:
    aE:
    TZ:
}
function assign_roles_to_user($user, $p5, $hI)
{
    $dO = false;
    if (!(!empty($hI) && !empty($p5) && !is_administrator_user($user))) {
        goto si;
    }
    $user->set_role(false);
    $fw = '';
    $o5 = false;
    foreach ($p5 as $Wt => $vw) {
        $oR = explode("\73", $vw);
        foreach ($oR as $gd) {
            foreach ($hI as $Sl) {
                $Sl = trim($Sl);
                if (!(!empty($Sl) && $Sl == $gd)) {
                    goto Jt;
                }
                $dO = true;
                $user->add_role($Wt);
                Jt:
                eF:
            }
            sV:
            Jb:
        }
        Ub:
        o5:
    }
    Gi:
    si:
    return $dO;
}
function is_role_mapping_configured_for_user($p5, $hI)
{
    if (!(!empty($hI) && !empty($p5))) {
        goto zr;
    }
    foreach ($p5 as $Wt => $vw) {
        $oR = explode("\73", $vw);
        foreach ($oR as $gd) {
            foreach ($hI as $Sl) {
                $Sl = trim($Sl);
                if (!(!empty($Sl) && $Sl == $gd)) {
                    goto qj;
                }
                return true;
                qj:
                nY:
            }
            jW:
            dL:
        }
        zl:
        sL:
    }
    zE:
    zr:
    return false;
}
function is_administrator_user($user)
{
    $fY = $user->roles;
    if (!is_null($fY) && in_array("\x61\x64\155\151\x6e\151\x73\164\x72\x61\164\x6f\x72", $fY, TRUE)) {
        goto tX;
    }
    return false;
    goto by;
    tX:
    return true;
    by:
}
function mo_saml_is_customer_registered()
{
    $kr = get_option("\155\x6f\137\x73\141\x6d\154\137\141\x64\155\151\x6e\x5f\145\155\141\151\x6c");
    $Mz = get_option("\155\157\137\x73\x61\x6d\154\137\x61\x64\155\151\156\x5f\x63\x75\x73\164\157\x6d\x65\x72\137\153\x65\171");
    if (!$kr || !$Mz || !is_numeric(trim($Mz))) {
        goto eQ;
    }
    return 1;
    goto X1;
    eQ:
    return 0;
    X1:
}
function saml_get_current_page_url()
{
    $Zl = $_SERVER["\110\x54\124\120\137\x48\117\123\124"];
    if (!(substr($Zl, -1) == "\x2f")) {
        goto Da;
    }
    $Zl = substr($Zl, 0, -1);
    Da:
    $kq = $_SERVER["\x52\x45\x51\125\x45\123\x54\x5f\125\122\x49"];
    if (!(substr($kq, 0, 1) == "\57")) {
        goto Mm;
    }
    $kq = substr($kq, 1);
    Mm:
    $gn = !empty($_SERVER["\110\124\124\x50\123"]) && strcasecmp($_SERVER["\x48\124\124\x50\x53"], "\157\156") == 0;
    $d2 = "\150\x74\164\x70" . ($gn ? "\163" : '') . "\x3a\57\57" . $Zl . "\x2f" . $kq;
    return $d2;
}
function show_status_error($iw, $WF, $SI)
{
    $iw = strip_tags($iw);
    $SI = strip_tags($SI);
    if ($WF == "\164\145\163\x74\x56\x61\154\x69\144\x61\164\145" or $WF == "\x74\145\x73\164\x4e\145\167\103\145\x72\x74\x69\146\x69\143\x61\164\145") {
        goto Bp;
    }
    wp_die("\127\x65\x20\x63\x6f\x75\154\144\x20\x6e\x6f\x74\40\163\151\x67\156\x20\171\x6f\x75\x20\151\x6e\x2e\x20\120\x6c\x65\141\x73\x65\40\143\x6f\156\164\141\143\x74\40\171\x6f\165\x72\40\101\144\x6d\151\x6e\151\163\x74\x72\141\164\x6f\x72\56", "\105\x72\162\x6f\x72\72\x20\111\156\x76\x61\154\x69\x64\x20\x53\101\115\x4c\40\x52\145\163\x70\157\x6e\163\145\x20\123\x74\141\x74\165\x73");
    goto G6;
    Bp:
    echo "\x3c\x64\x69\x76\40\163\x74\171\154\x65\75\42\146\157\156\x74\55\x66\x61\x6d\x69\x6c\x79\x3a\x43\x61\154\151\x62\x72\151\73\160\141\144\x64\151\x6e\x67\x3a\x30\40\x33\45\x3b\42\76";
    echo "\74\x64\x69\x76\40\163\x74\171\154\x65\x3d\x22\x63\x6f\x6c\157\162\x3a\x20\43\x61\x39\x34\64\64\62\x3b\142\141\143\x6b\147\162\x6f\x75\x6e\144\55\x63\157\154\157\x72\x3a\x20\x23\146\x32\144\145\x64\x65\73\160\141\x64\144\x69\156\x67\72\x20\61\65\160\x78\73\x6d\141\x72\147\x69\156\55\142\157\164\x74\157\x6d\x3a\40\x32\x30\x70\170\73\164\145\x78\164\55\x61\154\x69\147\156\x3a\143\x65\156\x74\145\x72\73\142\157\x72\144\x65\162\72\61\x70\170\40\x73\x6f\154\x69\x64\x20\43\x45\x36\x42\63\x42\62\x3b\x66\157\x6e\x74\55\163\151\x7a\145\72\61\x38\x70\x74\x3b\x22\76\x20\105\x52\x52\x4f\122\74\x2f\144\151\166\76\xd\xa\x20\40\40\x20\x20\40\x20\40\x20\x20\x20\x20\x20\40\40\40\x3c\x64\x69\x76\x20\x73\164\x79\154\145\75\42\143\x6f\x6c\x6f\x72\72\40\x23\x61\71\64\x34\x34\62\73\146\x6f\x6e\x74\55\x73\151\172\x65\x3a\61\64\160\164\x3b\x20\x6d\141\x72\x67\151\x6e\55\x62\157\164\164\x6f\155\x3a\x32\x30\160\170\x3b\42\x3e\74\x70\76\74\163\x74\x72\x6f\x6e\147\x3e\105\x72\x72\157\162\x3a\40\x3c\x2f\163\x74\x72\x6f\x6e\147\76\x20\x49\156\166\141\x6c\x69\x64\x20\123\x41\115\114\x20\x52\145\163\160\157\156\163\145\40\x53\164\141\x74\x75\163\56\74\x2f\160\76\15\12\x20\x20\40\x20\x20\40\40\x20\x20\x20\40\x20\x20\40\40\x20\74\x70\76\74\x73\164\x72\x6f\156\x67\x3e\x43\141\165\x73\x65\x73\74\x2f\x73\164\x72\x6f\x6e\x67\x3e\72\40\x49\x64\145\x6e\x74\x69\x74\171\x20\x50\x72\157\x76\x69\144\145\x72\x20\150\x61\163\40\x73\x65\156\x74\40\x27" . esc_html($iw) . "\47\x20\163\x74\x61\x74\165\x73\40\143\x6f\144\145\x20\x69\x6e\x20\123\x41\115\x4c\x20\x52\x65\x73\160\x6f\x6e\x73\145\x2e\40\x3c\57\x70\x3e\15\xa\x9\11\x9\11\x9\11\x9\x9\74\x70\76\74\163\x74\162\157\x6e\x67\76\122\145\141\163\x6f\x6e\x3c\57\163\x74\162\x6f\156\x67\76\72\x20" . get_status_message(esc_html($iw)) . "\74\57\160\76\40";
    if (empty($SI)) {
        goto i9;
    }
    echo "\74\160\76\74\x73\x74\162\157\x6e\x67\x3e\x53\164\x61\164\165\163\40\115\145\x73\163\x61\x67\145\40\x69\156\x20\164\150\x65\x20\123\101\x4d\x4c\x20\122\x65\x73\x70\157\x6e\x73\x65\x3a\74\x2f\x73\164\x72\x6f\156\x67\76\40\x3c\x62\162\x2f\76" . esc_html($SI) . "\74\x2f\x70\76";
    i9:
    echo "\74\x62\162\x3e\15\12\40\x20\x20\40\40\40\40\x20\x20\x20\40\x20\40\x20\x20\40\x3c\x2f\x64\x69\166\x3e\15\xa\xd\xa\x20\x20\40\x20\40\40\x20\40\x20\x20\40\x20\40\x20\x20\x20\x3c\144\151\166\x20\163\164\171\154\145\x3d\x22\155\141\162\147\x69\x6e\x3a\63\45\73\144\x69\163\x70\154\x61\171\72\x62\x6c\x6f\x63\153\73\164\x65\170\x74\55\x61\154\151\147\156\72\x63\145\156\164\x65\162\73\42\76\xd\xa\x20\x20\x20\x20\40\x20\40\x20\40\x20\40\x20\40\40\x20\40\74\x64\151\x76\40\163\x74\171\154\145\75\x22\155\x61\162\x67\151\x6e\72\x33\x25\x3b\144\x69\x73\160\x6c\x61\x79\x3a\142\x6c\x6f\143\x6b\73\164\145\170\x74\x2d\141\154\151\147\x6e\72\143\145\x6e\x74\x65\162\x3b\x22\76\x3c\151\x6e\x70\x75\164\x20\x73\164\171\x6c\145\x3d\42\x70\x61\144\x64\151\x6e\x67\x3a\x31\x25\x3b\167\151\x64\164\x68\x3a\x31\x30\x30\x70\170\x3b\x62\x61\143\153\147\162\157\x75\x6e\144\x3a\x20\x23\60\60\x39\61\103\104\40\x6e\x6f\x6e\145\40\x72\x65\160\x65\141\164\x20\x73\x63\x72\157\154\154\40\60\x25\x20\60\x25\x3b\x63\165\x72\163\x6f\162\72\x20\160\x6f\151\156\x74\145\162\x3b\x66\x6f\156\164\55\x73\x69\172\145\72\x31\x35\160\x78\73\142\x6f\x72\x64\x65\x72\55\x77\x69\x64\x74\x68\72\40\x31\x70\170\73\142\x6f\162\144\x65\162\x2d\163\x74\x79\x6c\145\72\x20\x73\157\x6c\x69\x64\73\x62\157\x72\x64\145\162\x2d\x72\x61\x64\151\x75\x73\x3a\40\63\x70\x78\73\167\150\x69\x74\145\55\163\160\141\143\145\72\x20\156\x6f\x77\162\x61\x70\73\x62\157\170\55\163\x69\x7a\151\156\147\x3a\40\x62\x6f\x72\x64\145\162\x2d\142\x6f\x78\x3b\x62\157\x72\144\x65\162\x2d\143\x6f\x6c\x6f\x72\72\40\x23\60\x30\x37\x33\x41\x41\x3b\142\157\x78\55\163\x68\141\x64\x6f\167\x3a\40\60\160\170\40\61\x70\x78\40\60\x70\x78\x20\162\x67\x62\x61\x28\61\62\60\x2c\40\x32\x30\60\x2c\x20\x32\63\60\54\40\x30\56\x36\51\x20\151\x6e\163\145\164\x3b\x63\x6f\x6c\x6f\162\72\x20\x23\106\106\x46\73\42\164\x79\160\145\75\42\x62\165\164\164\x6f\156\x22\40\166\x61\154\165\145\75\42\x44\157\x6e\x65\x22\x20\x6f\x6e\103\154\x69\x63\x6b\x3d\x22\x73\x65\x6c\146\x2e\143\154\x6f\x73\145\x28\x29\73\42\76\74\x2f\x64\x69\166\76";
    exit;
    G6:
}
function addLink($LG, $jH)
{
    $qj = "\x3c\141\40\150\x72\145\146\x3d\x22" . $jH . "\42\x3e" . $LG . "\74\x2f\x61\x3e";
    return $qj;
}
function get_status_message($iw)
{
    switch ($iw) {
        case "\122\145\x71\x75\x65\163\164\145\x72":
            return "\x54\150\145\x20\x72\145\x71\165\145\163\x74\40\x63\157\x75\x6c\144\x20\156\x6f\x74\x20\x62\x65\x20\x70\x65\162\x66\x6f\162\x6d\145\144\x20\144\165\x65\x20\x74\157\40\141\x6e\x20\x65\x72\162\157\162\40\157\x6e\40\x74\x68\145\x20\x70\141\162\x74\x20\x6f\x66\x20\164\x68\x65\40\162\145\161\165\x65\163\164\145\x72\x2e";
            goto Rw;
        case "\x52\x65\163\x70\157\x6e\x64\x65\162":
            return "\124\x68\145\40\x72\145\161\x75\145\x73\164\x20\143\x6f\x75\154\x64\40\156\x6f\x74\40\x62\x65\40\x70\145\x72\146\157\x72\155\x65\x64\x20\144\x75\x65\40\164\157\x20\x61\156\x20\145\162\x72\157\x72\x20\x6f\x6e\x20\164\x68\x65\40\x70\141\162\x74\x20\x6f\146\x20\x74\x68\x65\x20\x53\101\115\x4c\x20\x72\x65\x73\x70\157\156\144\x65\x72\x20\x6f\x72\40\123\101\115\114\x20\x61\165\164\x68\x6f\x72\x69\164\171\56";
            goto Rw;
        case "\126\145\x72\x73\151\157\156\115\151\x73\155\x61\164\143\x68":
            return "\124\150\145\x20\x53\x41\115\x4c\40\x72\x65\163\x70\157\x6e\144\x65\162\40\143\157\165\154\x64\40\x6e\157\164\x20\x70\x72\x6f\143\x65\x73\163\40\x74\150\145\40\162\145\x71\x75\145\163\x74\x20\x62\145\143\141\x75\x73\x65\40\x74\x68\145\x20\166\x65\x72\x73\x69\x6f\x6e\x20\x6f\146\40\164\150\145\40\x72\x65\161\165\145\163\x74\40\155\145\163\x73\x61\147\x65\x20\x77\x61\x73\x20\x69\x6e\x63\157\x72\162\x65\x63\x74\x2e";
            goto Rw;
        default:
            return "\125\x6e\153\x6e\x6f\x77\x6e";
    }
    of:
    Rw:
}
function mo_saml_register_widget()
{
    register_widget("\155\157\x5f\x6c\157\x67\x69\156\137\167\x69\144");
}
function mo_saml_get_relay_state($d2)
{
    if (!($d2 == "\x74\145\163\x74\126\141\x6c\151\144\141\164\145" || $d2 == "\x74\145\163\164\x4e\x65\167\103\x65\x72\x74\x69\146\x69\143\x61\x74\x65")) {
        goto q2;
    }
    return $d2;
    q2:
    if (get_option("\x6d\x6f\137\x73\141\x6d\154\137\163\145\x6e\144\x5f\141\x62\x73\x6f\x6c\165\164\x65\137\x72\x65\x6c\x61\171\137\x73\164\x61\164\x65")) {
        goto Lf;
    }
    $jQ = parse_url($d2, PHP_URL_PATH);
    if (!parse_url($d2, PHP_URL_QUERY)) {
        goto k6;
    }
    $lU = parse_url($d2, PHP_URL_QUERY);
    $jQ = $jQ . "\77" . $lU;
    k6:
    if (!parse_url($d2, PHP_URL_FRAGMENT)) {
        goto dB;
    }
    $Jw = parse_url($d2, PHP_URL_FRAGMENT);
    $jQ = $jQ . "\x23" . $Jw;
    dB:
    goto hQ;
    Lf:
    $v5 = get_option("\x6d\157\x5f\x73\141\155\154\x5f\143\x75\x73\164\157\155\145\162\137\164\157\x6b\x65\x6e");
    $jQ = AESEncryption::encrypt_data($d2, $v5);
    hQ:
    return $jQ;
}
add_action("\x77\151\144\x67\x65\164\163\x5f\151\x6e\x69\164", "\155\x6f\137\x73\141\x6d\154\137\x72\145\x67\151\163\164\x65\x72\x5f\167\x69\144\x67\x65\x74");
add_action("\151\x6e\x69\x74", "\155\x6f\x5f\154\157\147\151\156\137\x76\x61\x6c\x69\x64\x61\164\x65");

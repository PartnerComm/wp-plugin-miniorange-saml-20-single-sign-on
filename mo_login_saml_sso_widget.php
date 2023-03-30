<?php


include_once dirname(__FILE__) . '/Utilities.php';
include_once dirname(__FILE__) . '/Response.php';
include_once dirname(__FILE__) . '/LogoutRequest.php';
include_once 'xmlseclibs.php';
use \RobRichards\XMLSecLibs\XMLSecurityKey;
use \RobRichards\XMLSecLibs\XMLSecurityDSig;
use \RobRichards\XMLSecLibs\XMLSecEnc;
if(!class_exists("AESEncryption")) {
	require_once dirname(__FILE__) . '/includes/lib/encryption.php';
}
class mo_login_wid extends WP_Widget
{
    public function __construct()
    {
        $ll = LicenseHelper::getCurrentOption(mo_options_enum_service_provider::Identity_name);
        parent::__construct("\x53\141\155\154\137\x4c\157\147\x69\x6e\137\x57\x69\144\x67\x65\164", "\114\157\147\x69\156\x20\x77\x69\x74\x68\x20" . $ll, array("\144\145\x73\143\162\151\x70\x74\151\157\156" => __("\124\150\151\x73\x20\151\x73\x20\141\x20\x6d\151\156\x69\117\162\x61\x6e\x67\x65\x20\123\101\x4d\x4c\40\x6c\157\x67\151\156\x20\167\151\144\x67\145\x74\x2e", "\x6d\157\x73\x61\155\x6c")));
    }
    public function widget($h6, $x1)
    {
        extract($h6);
        $cN = '';
        if (empty($x1["\167\151\x64\137\164\x69\164\x6c\x65"])) {
            goto en;
        }
        $cN = apply_filters("\x77\x69\144\147\145\164\137\x74\151\164\x6c\x65", $x1["\x77\x69\x64\137\x74\x69\x74\x6c\x65"]);
        en:
        echo $h6["\142\145\146\x6f\x72\145\137\x77\151\x64\147\x65\x74"];
        if (empty($cN)) {
            goto uU;
        }
        echo $h6["\142\x65\146\157\x72\145\x5f\164\151\x74\x6c\145"] . $cN . $h6["\141\146\x74\145\162\137\164\x69\164\154\145"];
        uU:
        $this->loginForm();
        echo $h6["\x61\x66\164\145\x72\137\x77\151\144\x67\x65\164"];
    }
    public function update($aW, $HJ)
    {
        $x1 = array();
        $x1["\167\x69\144\137\x74\151\x74\154\x65"] = strip_tags($aW["\167\151\x64\137\x74\151\x74\154\x65"]);
        return $x1;
    }
    public function form($x1)
    {
        $cN = '';
        if (empty($x1["\x77\x69\144\137\164\x69\x74\x6c\x65"])) {
            goto z6;
        }
        $cN = $x1["\167\x69\x64\x5f\x74\x69\x74\154\x65"];
        z6:
        echo "\xa\x9\11\74\160\76\x3c\x6c\141\142\x65\154\40\146\157\x72\x3d\x22" . $this->get_field_id("\x77\151\144\137\164\x69\164\x6c\145") . "\40\x22\x3e" . _e("\x54\151\164\154\x65\x3a") . "\x20\x3c\x2f\154\x61\x62\x65\x6c\x3e\12\11\x9\x3c\x69\x6e\x70\x75\x74\x20\x63\154\x61\x73\x73\x3d\x22\167\x69\x64\x65\146\141\164\42\x20\x69\144\75\42" . $this->get_field_id("\167\151\144\x5f\x74\x69\x74\x6c\x65") . "\42\x20\156\141\155\x65\75\42" . $this->get_field_name("\x77\x69\144\137\x74\151\164\154\145") . "\42\x20\164\171\x70\x65\x3d\42\164\x65\170\x74\42\x20\x76\141\x6c\165\145\75\42" . $cN . "\x22\40\57\x3e\12\x9\11\74\x2f\x70\76";
    }
    public function loginForm()
    {
        global $post;
        $Vy = SAMLSPUtilities::mo_saml_is_user_logged_in();
        if (!$Vy) {
            goto Og;
        }
        $current_user = wp_get_current_user();
        $mt = "\x48\145\x6c\154\157\54";
        if (!get_option("\x6d\x6f\x5f\163\x61\155\154\x5f\143\165\163\164\157\x6d\x5f\x67\x72\x65\145\164\x69\x6e\147\137\x74\x65\x78\164")) {
            goto Ol;
        }
        $mt = get_option("\x6d\157\x5f\x73\x61\x6d\154\x5f\143\165\163\164\x6f\x6d\x5f\147\x72\145\x65\x74\151\x6e\x67\x5f\x74\145\170\164");
        Ol:
        $J1 = '';
        if (!get_option("\x6d\x6f\137\x73\141\155\x6c\x5f\147\x72\x65\145\164\151\x6e\147\137\156\141\x6d\145")) {
            goto yT;
        }
        switch (get_option("\155\157\137\x73\141\155\154\137\147\x72\145\x65\x74\x69\156\147\x5f\156\141\155\145")) {
            case "\125\x53\105\122\116\101\x4d\105":
                $J1 = $current_user->user_login;
                goto Kj;
            case "\x45\x4d\x41\111\114":
                $J1 = $current_user->user_email;
                goto Kj;
            case "\x46\x4e\x41\115\105":
                $J1 = $current_user->user_firstname;
                goto Kj;
            case "\x4c\x4e\101\x4d\x45":
                $J1 = $current_user->user_lastname;
                goto Kj;
            case "\106\x4e\x41\x4d\x45\137\114\116\101\x4d\105":
                $J1 = $current_user->user_firstname . "\x20" . $current_user->user_lastname;
                goto Kj;
            case "\x4c\116\x41\115\x45\137\106\116\101\x4d\105":
                $J1 = $current_user->user_lastname . "\40" . $current_user->user_firstname;
                goto Kj;
            default:
                $J1 = $current_user->user_login;
        }
        wV:
        Kj:
        yT:
        $J1 = trim($J1);
        if (!empty($J1)) {
            goto oo;
        }
        $J1 = $current_user->user_login;
        oo:
        $vv = $mt . "\x20" . $J1;
        $qj = "\114\x6f\147\157\165\x74";
        if (!get_option("\x6d\157\137\x73\141\155\154\137\x63\165\x73\x74\157\155\x5f\154\x6f\x67\x6f\x75\164\x5f\x74\145\170\x74")) {
            goto cr;
        }
        $qj = get_option("\155\x6f\x5f\x73\141\155\x6c\x5f\143\165\x73\x74\x6f\x6d\137\154\157\147\157\x75\164\x5f\x74\145\x78\x74");
        cr:
        echo $vv . "\x20\x7c\x20\74\x61\40\150\x72\x65\x66\75\x22" . wp_logout_url(home_url()) . "\x22\40\164\x69\x74\x6c\145\x3d\42\154\x6f\x67\x6f\x75\x74\42\40\x3e" . $qj . "\x3c\x2f\141\76\74\x2f\x6c\151\76";
        goto e9;
        Og:
        $PK = saml_get_current_page_url();
        echo "\12\x9\x9\x3c\163\x63\162\151\x70\x74\76\xa\x9\x9\146\165\156\143\x74\151\157\156\x20\x73\x75\x62\x6d\x69\x74\x53\x61\155\x6c\x46\x6f\x72\x6d\x28\x29\x7b\40\x64\x6f\143\165\155\x65\x6e\x74\56\x67\145\x74\105\154\145\155\145\x6e\x74\x42\x79\x49\144\50\x22\x6d\x69\x6e\x69\x6f\162\141\156\x67\x65\55\163\x61\155\x6c\55\x73\160\x2d\x73\x73\157\x2d\x6c\x6f\147\151\156\x2d\146\157\162\x6d\42\51\56\x73\x75\x62\x6d\151\x74\x28\51\x3b\40\175\12\x9\11\x3c\x2f\163\143\x72\x69\160\x74\x3e\12\11\x9\74\x66\x6f\x72\155\x20\156\141\x6d\145\x3d\x22\155\151\156\151\x6f\162\141\156\147\145\x2d\163\141\x6d\x6c\x2d\x73\x70\x2d\x73\x73\157\55\x6c\x6f\x67\x69\156\x2d\146\157\x72\x6d\42\40\x69\144\x3d\42\155\151\156\x69\x6f\162\x61\x6e\147\145\55\163\x61\x6d\x6c\x2d\x73\160\x2d\x73\x73\157\x2d\x6c\x6f\x67\x69\x6e\55\146\157\x72\155\x22\x20\155\x65\164\x68\157\144\75\42\160\x6f\x73\164\x22\40\x61\x63\164\151\157\x6e\75\x22\x22\76\xa\11\x9\x3c\x69\156\x70\x75\164\x20\x74\x79\160\x65\x3d\42\150\151\144\144\x65\x6e\42\40\156\x61\x6d\x65\x3d\x22\x6f\x70\x74\151\157\x6e\x22\40\x76\141\x6c\165\x65\75\42\x73\x61\155\154\137\x75\163\145\162\137\154\x6f\147\151\x6e\42\40\x2f\x3e\xa\11\11\x3c\x69\x6e\160\x75\164\40\x74\171\x70\x65\75\42\x68\151\x64\x64\145\156\42\x20\156\141\x6d\x65\x3d\42\x72\145\144\151\162\x65\x63\x74\x5f\x74\157\42\40\x76\141\154\165\145\75\x22" . $PK . "\x22\x20\57\x3e\12\xa\11\11\74\x66\x6f\x6e\x74\x20\x73\x69\172\x65\x3d\x22\x2b\61\42\x20\163\x74\171\x6c\145\x3d\42\166\x65\x72\164\151\x63\141\154\x2d\141\x6c\x69\x67\x6e\x3a\164\x6f\x70\73\x22\76\x20\74\57\146\x6f\156\x74\x3e";
        $xF = LicenseHelper::getCurrentOption(mo_options_enum_service_provider::Identity_name);
        if (!empty($xF)) {
            goto dN;
        }
        echo "\x50\x6c\x65\141\x73\145\x20\143\157\156\x66\x69\147\x75\x72\145\x20\164\150\145\x20\155\151\x6e\x69\x4f\x72\x61\156\147\145\x20\x53\101\x4d\114\x20\120\x6c\x75\147\x69\156\x20\146\151\162\163\164\x2e";
        goto bz;
        dN:
        $I5 = "\x4c\157\x67\151\x6e\40\167\151\164\x68\x20\x23\43\111\x44\120\x23\x23";
        if (!get_option("\155\157\x5f\163\x61\x6d\154\137\x63\165\x73\x74\157\x6d\137\154\157\147\x69\156\x5f\164\145\170\164")) {
            goto kI;
        }
        $I5 = get_option("\x6d\157\x5f\163\x61\x6d\154\x5f\143\x75\163\x74\x6f\x6d\137\154\157\x67\151\156\137\164\x65\170\164");
        kI:
        $I5 = str_replace("\x23\43\x49\x44\x50\x23\43", $xF, $I5);
        $Ci = false;
        if (!get_option("\155\157\137\163\141\x6d\154\x5f\x75\x73\145\x5f\x62\165\164\164\157\x6e\x5f\141\x73\x5f\167\x69\144\x67\145\x74")) {
            goto Mz;
        }
        if (!(get_option("\155\157\137\163\141\155\x6c\137\x75\163\145\137\x62\x75\x74\x74\157\156\137\141\x73\137\167\151\144\147\145\x74") == "\164\162\165\x65")) {
            goto Ry;
        }
        $Ci = true;
        Ry:
        Mz:
        if (!$Ci) {
            goto Yy;
        }
        $U9 = get_option("\155\x6f\x5f\163\141\x6d\154\x5f\x62\165\164\x74\157\x6e\x5f\x77\151\144\164\x68") ? get_option("\x6d\x6f\137\163\x61\155\x6c\137\142\165\x74\x74\157\x6e\x5f\x77\x69\x64\164\150") : "\x31\60\x30";
        $ej = get_option("\155\157\137\x73\141\155\x6c\x5f\142\x75\x74\164\157\x6e\x5f\x68\x65\151\x67\150\x74") ? get_option("\x6d\x6f\x5f\x73\x61\x6d\154\x5f\x62\x75\164\x74\157\x6e\x5f\150\145\151\147\x68\x74") : "\65\x30";
        $KX = get_option("\x6d\x6f\137\163\x61\x6d\x6c\137\142\165\x74\164\157\x6e\137\x73\x69\x7a\145") ? get_option("\155\157\137\x73\x61\x6d\154\x5f\142\x75\164\x74\x6f\156\x5f\x73\151\x7a\145") : "\65\x30";
        $vD = get_option("\x6d\x6f\x5f\x73\141\155\x6c\x5f\142\x75\x74\164\157\156\x5f\x63\x75\162\x76\x65") ? get_option("\x6d\x6f\x5f\x73\141\x6d\154\x5f\x62\165\164\x74\157\x6e\137\143\x75\162\x76\145") : "\x35";
        $xS = get_option("\155\x6f\x5f\x73\141\x6d\154\137\x62\x75\164\x74\157\x6e\137\x63\x6f\x6c\x6f\x72") ? get_option("\x6d\157\137\163\141\155\154\x5f\142\x75\x74\164\157\x6e\x5f\x63\x6f\154\157\162") : "\60\60\70\x35\x62\141";
        $PJ = get_option("\x6d\x6f\x5f\163\141\155\154\137\x62\x75\164\x74\x6f\x6e\x5f\164\x68\x65\x6d\x65") ? get_option("\155\157\x5f\x73\x61\155\x6c\x5f\x62\165\x74\x74\x6f\156\x5f\x74\x68\x65\x6d\145") : "\154\x6f\x6e\x67\x62\x75\164\164\157\156";
        $wH = !empty($_SESSION["\155\157\x5f\x67\x75\x65\163\x74\137\154\x6f\x67\151\x6e"]["\x6c\x6f\147\147\x65\144\137\151\156\137\151\x64\x70\137\156\141\155\145"]) ? $_SESSION["\x6d\157\x5f\147\x75\145\163\x74\x5f\154\157\x67\151\x6e"]["\154\x6f\147\147\145\x64\137\151\156\x5f\x69\144\160\137\x6e\141\155\x65"] : LicenseHelper::getCurrentOption(mo_options_enum_service_provider::Identity_name);
        $nZ = get_option("\x6d\x6f\x5f\x73\141\155\x6c\x5f\142\x75\x74\x74\x6f\x6e\137\164\x65\x78\164") ? get_option("\155\157\x5f\x73\x61\x6d\x6c\x5f\x62\x75\164\x74\x6f\156\137\x74\145\x78\164") : ($wH ? $wH : "\x4c\x6f\x67\151\156");
        $IO = get_option("\155\x6f\137\163\x61\x6d\154\x5f\146\x6f\156\x74\137\143\x6f\154\157\x72") ? get_option("\155\x6f\x5f\163\141\155\x6c\137\146\157\156\x74\137\x63\x6f\x6c\157\x72") : "\x66\x66\x66\x66\x66\x66";
        $rP = get_option("\155\x6f\x5f\163\141\155\x6c\137\x66\157\x6e\x74\x5f\163\x69\172\x65") ? get_option("\155\157\137\x73\141\x6d\154\137\x66\157\156\x74\x5f\x73\x69\172\x65") : "\x32\60";
        $I5 = "\x3c\151\x6e\x70\165\164\40\x74\171\160\x65\75\x22\142\x75\x74\164\157\156\x22\x20\x6e\x61\x6d\x65\x3d\x22\x6d\157\137\163\x61\x6d\154\x5f\x77\160\137\x73\x73\x6f\x5f\142\x75\x74\164\x6f\x6e\42\40\x76\x61\x6c\165\x65\75\x22" . $nZ . "\x22\x20\163\x74\171\154\x65\75\42";
        $Ka = '';
        if ($PJ == "\x6c\157\x6e\147\x62\x75\164\x74\157\x6e") {
            goto h2;
        }
        if ($PJ == "\x63\151\162\143\154\145") {
            goto bM;
        }
        if ($PJ == "\157\x76\x61\x6c") {
            goto ES;
        }
        if ($PJ == "\x73\161\165\x61\162\145") {
            goto n6;
        }
        goto S5;
        bM:
        $Ka = $Ka . "\167\x69\x64\x74\150\72" . $KX . "\x70\170\73";
        $Ka = $Ka . "\x68\x65\x69\147\150\164\x3a" . $KX . "\160\x78\x3b";
        $Ka = $Ka . "\x62\157\x72\x64\x65\x72\55\162\141\144\x69\x75\x73\72\x39\x39\x39\x70\170\73";
        goto S5;
        ES:
        $Ka = $Ka . "\x77\151\x64\x74\150\72" . $KX . "\x70\x78\73";
        $Ka = $Ka . "\150\x65\151\147\150\x74\x3a" . $KX . "\x70\170\x3b";
        $Ka = $Ka . "\142\157\162\x64\x65\162\55\162\141\x64\151\165\163\x3a\65\160\170\x3b";
        goto S5;
        n6:
        $Ka = $Ka . "\x77\x69\144\x74\150\x3a" . $KX . "\160\170\x3b";
        $Ka = $Ka . "\x68\145\x69\147\x68\164\72" . $KX . "\160\170\x3b";
        $Ka = $Ka . "\x62\x6f\162\144\x65\162\x2d\162\141\x64\x69\165\163\72\60\x70\x78\x3b";
        S5:
        goto Ty;
        h2:
        $Ka = $Ka . "\x77\x69\144\x74\150\72" . $U9 . "\x70\170\73";
        $Ka = $Ka . "\x68\145\x69\x67\150\164\72" . $ej . "\x70\x78\73";
        $Ka = $Ka . "\x62\x6f\162\x64\145\162\x2d\x72\141\x64\x69\x75\163\x3a" . $vD . "\160\170\x3b";
        Ty:
        $Ka = $Ka . "\142\141\143\x6b\x67\162\x6f\x75\x6e\144\x2d\143\157\154\157\162\x3a\x23" . $xS . "\73";
        $Ka = $Ka . "\x62\x6f\162\144\145\162\x2d\x63\x6f\154\x6f\162\72\164\162\x61\156\x73\160\x61\162\145\156\x74\x3b";
        $Ka = $Ka . "\x63\157\154\x6f\162\72\x23" . $IO . "\73";
        $Ka = $Ka . "\146\x6f\x6e\164\55\x73\151\x7a\145\x3a" . $rP . "\x70\170\73";
        $Ka = $Ka . "\160\x61\x64\144\151\156\x67\72\x30\160\x78\73";
        $I5 = $I5 . $Ka . "\x22\57\x3e";
        Yy:
        echo "\x20\74\x61\x20\x68\162\145\146\75\x22\43\42\40\x6f\156\x43\x6c\x69\x63\x6b\75\x22\163\165\142\x6d\x69\x74\x53\x61\155\x6c\106\x6f\x72\155\x28\51\x22\x3e";
        echo $I5;
        echo "\74\57\141\76\x3c\57\146\157\162\155\76\x20";
        bz:
        echo "\x9\74\57\x75\x6c\76\12\11\x9\74\57\146\157\x72\155\76";
        e9:
    }
    public function mo_saml_widget_init()
    {
        if (!(defined("\x57\x50\x5f\103\114\111") && WP_CLI)) {
            goto YG;
        }
        require_once dirname(__FILE__) . "\57\155\x6f\x2d\x73\x61\155\154\55\167\x70\55\x63\154\x69\x2d\143\157\155\155\x61\x6e\144\163\x2e\x70\150\x70";
        YG:
        if (!(isset($_REQUEST["\x6f\x70\164\151\x6f\x6e"]) and $_REQUEST["\157\160\x74\151\x6f\x6e"] == "\163\x61\155\154\x5f\165\x73\145\162\x5f\x6c\x6f\147\x6f\x75\x74")) {
            goto re;
        }
        $user = is_user_logged_in() ? wp_get_current_user() : null;
        if (empty($user)) {
            goto Ag;
        }
        wp_logout();
        Ag:
        re:
    }
    function mo_saml_logout($tF)
    {
        $user = get_user_by("\x69\x64", $tF);
        $Yp = htmlspecialchars_decode(LicenseHelper::getCurrentOption(mo_options_enum_service_provider::Logout_URL));
        $qZ = LicenseHelper::getCurrentOption(mo_options_enum_service_provider::Logout_binding_type);
        $NU = wp_get_referer();
        $PG = get_option("\155\157\137\x73\141\x6d\154\137\x73\x70\x5f\x62\141\163\145\x5f\x75\x72\x6c");
        $j8 = false;
        if (empty($_COOKIE["\154\x6f\x67\147\145\144\x5f\x69\156\x5f\x77\x69\x74\x68\x5f\x69\x64\160"])) {
            goto bt;
        }
        $j8 = true;
        bt:
        if (!(!session_id() || session_id() == '' || empty($_SESSION))) {
            goto p9;
        }
        session_start();
        p9:
        if (!empty($NU)) {
            goto mg;
        }
        $NU = !empty($PG) ? $PG : home_url();
        mg:
        if (empty($Yp)) {
            goto Ta;
        }
        if (!empty($_SESSION["\155\x6f\137\x73\141\155\154\x5f\154\157\147\x6f\165\164\137\x72\145\161\165\145\x73\164"])) {
            goto X7;
        }
        if (!empty($_SESSION["\x6d\x6f\137\163\141\x6d\x6c"]["\154\x6f\147\147\x65\144\x5f\151\x6e\x5f\167\x69\164\150\137\x69\144\160"]) || $j8) {
            goto tl;
        }
        goto Dj;
        X7:
        self::createLogoutResponseAndRedirect($Yp, $qZ);
        exit;
        goto Dj;
        tl:
        $current_user = $user;
        if (!empty($_SESSION["\x6d\157\x5f\x67\165\x65\x73\x74\137\154\157\x67\151\x6e"]["\156\x61\x6d\x65\x49\104"])) {
            goto pF;
        }
        if (!empty($_COOKIE["\x6e\141\155\x65\111\104"])) {
            goto N0;
        }
        $OJ = get_user_meta($current_user->ID, "\x6d\x6f\137\163\x61\x6d\x6c\x5f\156\x61\155\x65\x5f\x69\x64");
        goto ZU;
        N0:
        $OJ = $_COOKIE["\156\x61\x6d\145\111\104"];
        ZU:
        goto xt;
        pF:
        $OJ = $_SESSION["\x6d\157\137\147\x75\145\163\x74\137\154\x6f\147\x69\x6e"]["\156\x61\155\x65\111\x44"];
        xt:
        if (!empty($_SESSION["\x6d\157\x5f\x67\165\145\x73\x74\137\x6c\x6f\147\x69\156"]["\163\145\163\163\x69\x6f\156\111\156\144\145\x78"])) {
            goto c9;
        }
        if (!empty($_COOKIE["\x73\145\x73\163\x69\x6f\156\111\x6e\144\145\x78"])) {
            goto jf;
        }
        $VU = get_user_meta($current_user->ID, "\x6d\x6f\x5f\x73\141\155\154\x5f\163\145\x73\163\x69\157\156\137\x69\x6e\144\x65\x78");
        goto vI;
        jf:
        $VU = $_COOKIE["\x73\x65\163\163\151\x6f\x6e\x49\156\144\x65\x78"];
        vI:
        goto Mb;
        c9:
        $VU = $_SESSION["\x6d\x6f\137\x67\165\x65\163\x74\x5f\154\157\x67\151\x6e"]["\x73\145\163\163\151\157\x6e\111\x6e\144\145\x78"];
        Mb:
        if (empty($OJ)) {
            goto X5;
        }
        unset($_SESSION["\155\x6f\137\163\x61\155\x6c"]);
        unset($_SESSION["\155\x6f\137\147\165\x65\163\x74\137\x6c\x6f\147\x69\156"]);
        unset($_COOKIE["\x6c\157\x67\147\145\x64\x5f\151\156\137\167\x69\x74\x68\x5f\x69\144\x70"]);
        setcookie("\x6c\157\147\x67\145\x64\x5f\x69\156\137\x77\151\164\x68\x5f\x69\x64\x70", '', time() - 3600, "\57");
        setcookie("\156\141\x6d\145\x49\104", '', time() - 3600, "\x2f");
        setcookie("\x73\x65\x73\x73\x69\157\156\x49\x6e\x64\145\170", '', time() - 3600, "\x2f");
        mo_saml_create_logout_request($OJ, $VU, $Yp, $qZ, $NU);
        X5:
        Dj:
        Ta:
        if (!isset($_SESSION["\155\157\137\x67\x75\x65\x73\164\137\154\x6f\147\x69\156"]["\156\x61\x6d\145\111\x44"])) {
            goto kL;
        }
        unset($_SESSION["\x6d\x6f\137\x67\165\145\x73\164\x5f\x6c\x6f\147\x69\156"]);
        setcookie("\x6e\x61\155\x65\111\x44", '', time() - 3600, "\x2f");
        setcookie("\163\x65\x73\x73\x69\x6f\156\x49\x6e\144\145\170", '', time() - 3600, "\57");
        kL:
        $R_ = get_option("\155\x6f\x5f\x73\x61\155\x6c\137\154\157\x67\x6f\x75\x74\x5f\162\x65\154\x61\171\x5f\x73\x74\141\x74\145");
        if (empty($R_)) {
            goto TX;
        }
        wp_redirect($R_);
        exit;
        TX:
        wp_redirect($NU);
        exit;
    }
    function createLogoutResponseAndRedirect($Yp, $qZ)
    {
        $PG = get_option("\x6d\x6f\137\x73\141\155\154\137\x73\x70\x5f\142\x61\163\145\137\165\162\154");
        if (!empty($PG)) {
            goto Sz;
        }
        $PG = home_url();
        Sz:
        $zg = $_SESSION["\155\157\137\163\141\x6d\x6c\137\154\x6f\x67\x6f\x75\x74\137\x72\145\x71\165\x65\x73\x74"];
        $ap = $_SESSION["\x6d\x6f\137\163\x61\x6d\x6c\x5f\x6c\157\x67\x6f\x75\x74\137\162\145\154\x61\x79\x5f\x73\164\x61\x74\145"];
        unset($_SESSION["\x6d\157\x5f\163\141\x6d\x6c\x5f\154\157\x67\x6f\165\164\x5f\162\145\x71\x75\x65\163\164"]);
        unset($_SESSION["\x6d\157\x5f\x73\x61\155\154\x5f\x6c\157\x67\157\x75\x74\x5f\162\x65\x6c\141\171\137\163\164\141\x74\145"]);
        $HL = new DOMDocument();
        $HL->loadXML($zg);
        $zg = $HL->firstChild;
        if (!($zg->localName == "\x4c\x6f\x67\x6f\x75\164\122\145\161\x75\x65\x73\164")) {
            goto Nk;
        }
        $M8 = new SAML2SPLogoutRequest($zg);
        $rb = get_option("\x6d\157\137\163\141\x6d\154\x5f\163\x70\x5f\x65\156\164\x69\164\x79\x5f\151\144");
        if (!empty($rb)) {
            goto uv;
        }
        $rb = $PG . "\x2f\x77\160\x2d\x63\x6f\156\164\145\x6e\x74\57\160\154\165\x67\151\x6e\x73\x2f\155\151\156\x69\157\x72\x61\156\147\x65\x2d\x73\141\x6d\154\x2d\x32\60\x2d\x73\151\156\x67\x6c\145\55\163\151\147\156\55\157\156\57";
        uv:
        $tG = $Yp;
        $EJ = SAMLSPUtilities::createLogoutResponse($M8->getId(), $rb, $tG, $qZ);
        if (empty($qZ) || $qZ == "\110\164\164\x70\122\145\144\x69\162\x65\143\x74") {
            goto C6;
        }
        if (!(LicenseHelper::getCurrentOption(mo_options_enum_service_provider::Request_signed) != "\143\150\x65\143\153\x65\144")) {
            goto pV;
        }
        $sw = base64_encode($EJ);
        SAMLSPUtilities::postSAMLResponse($Yp, $sw, $ap);
        exit;
        pV:
        $OY = '';
        $T8 = '';
        $sw = SAMLSPUtilities::signXML($EJ, "\x53\x74\141\164\165\163");
        SAMLSPUtilities::postSAMLResponse($Yp, $sw, $ap);
        goto Jb;
        C6:
        $vm = $Yp;
        if (strpos($Yp, "\77") !== false) {
            goto z2;
        }
        $vm .= "\x3f";
        goto Q4;
        z2:
        $vm .= "\46";
        Q4:
        if (!(LicenseHelper::getCurrentOption(mo_options_enum_service_provider::Request_signed) != "\x63\x68\145\x63\153\x65\x64")) {
            goto Pb;
        }
        $vm .= "\x53\x41\x4d\x4c\x52\145\163\x70\157\156\x73\145\75" . $EJ . "\46\x52\145\x6c\x61\171\x53\x74\141\164\145\75" . urlencode($ap);
        header("\x4c\157\x63\141\x74\151\157\x6e\x3a\40" . $vm);
        exit;
        Pb:
        $SJ = "\x53\101\115\x4c\x52\x65\x73\x70\157\x6e\163\x65\75" . $EJ . "\x26\x52\145\x6c\x61\x79\123\x74\x61\x74\145\x3d" . urlencode($ap) . "\46\x53\x69\147\101\x6c\x67\x3d" . urlencode(XMLSecurityKey::RSA_SHA256);
        $Jp = array("\x74\x79\160\145" => "\160\x72\x69\x76\x61\164\145");
        $WO = new XMLSecurityKey(XMLSecurityKey::RSA_SHA256, $Jp);
        $iW = get_option("\155\x6f\x5f\x73\x61\x6d\x6c\x5f\143\x75\162\x72\145\156\x74\137\x63\x65\x72\164\137\160\162\151\166\x61\x74\145\137\x6b\145\171");
        $WO->loadKey($iW, FALSE);
        $tT = new XMLSecurityDSig();
        $MA = $WO->signData($SJ);
        $MA = base64_encode($MA);
        $vm .= $SJ . "\46\x53\151\x67\x6e\141\164\x75\162\x65\x3d" . urlencode($MA);
        header("\x4c\x6f\x63\x61\164\x69\157\x6e\x3a\x20" . $vm);
        exit;
        Jb:
        Nk:
    }
}
function mo_saml_create_logout_request($OJ, $VU, $Yp, $qZ, $NU)
{
    $PG = get_option("\x6d\157\137\x73\x61\155\154\x5f\163\x70\137\142\x61\x73\145\137\x75\162\154");
    if (!empty($PG)) {
        goto zi;
    }
    $PG = home_url();
    zi:
    $rb = get_option("\155\x6f\137\163\x61\x6d\154\137\x73\160\137\145\156\164\x69\164\171\x5f\151\x64");
    if (!empty($rb)) {
        goto RQ;
    }
    $rb = $PG . "\57\167\x70\x2d\143\x6f\x6e\x74\145\x6e\x74\x2f\160\154\165\147\151\x6e\x73\x2f\x6d\x69\x6e\x69\157\x72\141\156\147\x65\x2d\163\141\155\154\55\62\x30\55\x73\x69\x6e\147\154\x65\x2d\163\151\x67\x6e\55\157\x6e\x2f";
    RQ:
    $tG = $Yp;
    $Ln = $NU;
    $Ln = mo_saml_get_relay_state($Ln);
    $SJ = SAMLSPUtilities::createLogoutRequest($OJ, $rb, $tG, $VU, $qZ);
    if (empty($qZ) || $qZ == "\x48\x74\164\160\122\x65\144\x69\162\145\143\x74") {
        goto lQ;
    }
    if (!(LicenseHelper::getCurrentOption(mo_options_enum_service_provider::Request_signed) != "\x63\x68\x65\143\153\x65\144")) {
        goto kS;
    }
    $sw = base64_encode($SJ);
    SAMLSPUtilities::postSAMLRequest($Yp, $sw, $Ln);
    exit;
    kS:
    $OY = '';
    $T8 = '';
    $sw = SAMLSPUtilities::signXML($SJ, "\116\x61\155\145\x49\x44");
    SAMLSPUtilities::postSAMLRequest($Yp, $sw, $Ln);
    goto VD;
    lQ:
    $vm = $Yp;
    if (strpos($Yp, "\77") !== false) {
        goto WD;
    }
    $vm .= "\77";
    goto c6;
    WD:
    $vm .= "\x26";
    c6:
    if (!(LicenseHelper::getCurrentOption(mo_options_enum_service_provider::Request_signed) != "\143\x68\145\x63\153\145\x64")) {
        goto y5;
    }
    $vm .= "\123\101\x4d\114\x52\x65\x71\x75\x65\x73\x74\75" . $SJ . "\x26\122\145\154\x61\x79\123\164\141\x74\x65\x3d" . urlencode($Ln);
    header("\114\x6f\x63\x61\x74\x69\x6f\x6e\x3a\x20" . $vm);
    exit;
    y5:
    $SJ = "\123\101\x4d\x4c\122\145\161\165\x65\163\164\x3d" . $SJ . "\46\x52\145\x6c\141\x79\x53\164\x61\164\145\x3d" . urlencode($Ln) . "\46\x53\x69\147\101\154\147\x3d" . urlencode(XMLSecurityKey::RSA_SHA256);
    $Jp = array("\x74\171\x70\145" => "\160\x72\x69\x76\x61\x74\145");
    $WO = new XMLSecurityKey(XMLSecurityKey::RSA_SHA256, $Jp);
    $iW = get_option("\x6d\x6f\x5f\163\141\155\154\x5f\143\x75\162\x72\145\x6e\x74\137\x63\145\x72\x74\137\x70\162\151\x76\141\x74\x65\137\153\145\171");
    $WO->loadKey($iW, FALSE);
    $tT = new XMLSecurityDSig();
    $MA = $WO->signData($SJ);
    $MA = base64_encode($MA);
    $vm .= $SJ . "\46\123\151\147\156\141\164\x75\162\x65\75" . urlencode($MA);
    header("\x4c\x6f\x63\141\x74\x69\x6f\156\72\40" . $vm);
    exit;
    VD:
}
function mo_login_validate()
{
    if (!(isset($_REQUEST["\x6f\x70\164\151\x6f\x6e"]) && $_REQUEST["\157\160\164\151\x6f\x6e"] == "\x6d\157\x73\141\155\154\137\155\x65\x74\x61\x64\x61\x74\x61")) {
        goto ye;
    }
    miniorange_generate_metadata();
    ye:
    if (!(isset($_REQUEST["\x6f\x70\164\x69\x6f\x6e"]) && $_REQUEST["\157\160\164\x69\x6f\156"] == "\145\170\160\157\x72\164\x5f\143\157\156\146\x69\x67\x75\x72\141\164\151\x6f\156")) {
        goto TK;
    }
    if (!current_user_can("\155\x61\x6e\x61\x67\145\x5f\157\160\164\x69\x6f\x6e\163")) {
        goto X2;
    }
    miniorange_import_export(true);
    X2:
    exit;
    TK:
    if (!mo_saml_is_customer_license_verified()) {
        goto No;
    }
    if (!(isset($_REQUEST["\157\x70\x74\151\157\156"]) && $_REQUEST["\x6f\x70\x74\151\x6f\156"] == "\x73\x61\x6d\154\137\x75\163\145\x72\x5f\154\157\x67\x69\156" || isset($_REQUEST["\x6f\x70\x74\151\157\156"]) && $_REQUEST["\157\x70\164\x69\x6f\156"] == "\164\145\163\x74\x69\x64\160\x63\x6f\156\x66\x69\147" || isset($_REQUEST["\x6f\x70\164\x69\157\x6e"]) && $_REQUEST["\x6f\x70\164\151\157\x6e"] == "\x67\x65\x74\x73\x61\x6d\154\x72\x65\x71\165\x65\163\x74" || isset($_REQUEST["\157\160\x74\151\x6f\156"]) && $_REQUEST["\x6f\x70\x74\x69\157\x6e"] == "\147\145\x74\x73\x61\x6d\x6c\162\145\163\160\x6f\156\x73\145")) {
        goto Od;
    }
    if (!mo_saml_is_sp_configured()) {
        goto at;
    }
    if (!(is_user_logged_in() && $_REQUEST["\x6f\x70\x74\x69\157\156"] == "\163\141\x6d\154\137\x75\163\145\x72\x5f\x6c\x6f\x67\x69\x6e")) {
        goto Y1;
    }
    if (empty($_REQUEST["\x72\145\144\151\162\145\x63\164\x5f\164\157"])) {
        goto y0;
    }
    $TS = htmlspecialchars($_REQUEST["\162\x65\x64\x69\162\x65\143\164\x5f\x74\x6f"]);
    wp_safe_redirect($TS);
    exit;
    y0:
    return;
    Y1:
    $PG = get_option("\155\x6f\x5f\163\x61\155\x6c\137\163\160\x5f\x62\x61\x73\145\137\x75\162\154");
    if (!empty($PG)) {
        goto N1;
    }
    $PG = home_url();
    N1:
    if (isset($_REQUEST["\x69\x64\x70"]) and !empty($_REQUEST["\151\144\160"])) {
        goto L8;
    }
    $WY = '';
    goto mj;
    L8:
    $WY = htmlspecialchars($_REQUEST["\151\144\x70"]);
    mj:
    if ($_REQUEST["\157\160\164\x69\157\156"] == "\x74\145\x73\164\x69\144\160\143\157\156\x66\x69\147" and isset($_REQUEST["\156\145\167\143\145\x72\x74"])) {
        goto ib;
    }
    if ($_REQUEST["\x6f\x70\x74\151\x6f\156"] == "\164\145\163\164\151\x64\x70\143\x6f\156\146\x69\147") {
        goto qM;
    }
    if ($_REQUEST["\x6f\x70\x74\151\157\156"] == "\147\x65\164\163\x61\155\x6c\x72\x65\x71\x75\145\x73\164") {
        goto kG;
    }
    if ($_REQUEST["\x6f\x70\164\151\157\x6e"] == "\147\145\x74\163\x61\155\154\162\145\163\x70\x6f\x6e\163\145") {
        goto Fj;
    }
    if (get_option("\x6d\x6f\137\163\x61\155\x6c\x5f\x72\145\154\x61\171\x5f\163\164\x61\164\145") && get_option("\155\157\137\163\x61\x6d\154\137\x72\145\154\141\x79\137\163\164\x61\164\x65") != '') {
        goto Xj;
    }
    if (!empty($_REQUEST["\x72\145\144\151\x72\x65\143\x74\137\x74\x6f"])) {
        goto eP;
    }
    $Ln = wp_get_referer();
    goto Vd;
    eP:
    $Ln = htmlspecialchars($_REQUEST["\162\x65\144\151\x72\x65\143\x74\137\164\x6f"]);
    Vd:
    goto jM;
    Xj:
    $Ln = get_option("\x6d\x6f\x5f\163\x61\x6d\x6c\137\x72\x65\154\141\x79\137\163\164\141\x74\145");
    jM:
    goto bN;
    Fj:
    $Ln = "\x64\151\163\160\154\x61\x79\123\101\115\x4c\122\145\x73\160\157\156\163\x65";
    bN:
    goto QG;
    kG:
    $Ln = "\144\x69\x73\160\x6c\x61\x79\123\101\115\x4c\122\145\x71\x75\145\x73\x74";
    QG:
    goto oG;
    qM:
    $Ln = "\x74\x65\163\x74\126\141\x6c\151\x64\141\x74\145";
    oG:
    goto Qc;
    ib:
    $Ln = "\164\145\x73\x74\116\145\x77\x43\145\x72\x74\x69\x66\151\143\141\164\x65";
    Qc:
    if (!empty($Ln)) {
        goto Pj;
    }
    $Ln = $PG;
    Pj:
    $eX = htmlspecialchars_decode(LicenseHelper::getCurrentOption(mo_options_enum_service_provider::Login_URL));
    $j5 = LicenseHelper::getCurrentOption(mo_options_enum_service_provider::Login_binding_type);
    $s2 = get_option("\155\x6f\x5f\x73\x61\155\154\137\x66\x6f\x72\x63\145\x5f\x61\165\164\x68\145\x6e\164\151\x63\x61\x74\151\x6f\x6e");
    $Uf = $PG . "\57";
    $rb = get_option("\155\x6f\137\x73\x61\155\154\137\163\x70\x5f\x65\x6e\x74\x69\x74\171\x5f\x69\144");
    $So = LicenseHelper::getCurrentOption(mo_options_enum_service_provider::NameID_Format);
    if (!empty($So)) {
        goto Jw;
    }
    $So = "\x31\x2e\61\x3a\x6e\141\155\x65\151\x64\x2d\146\x6f\162\x6d\141\x74\x3a\165\156\163\x70\145\143\151\x66\151\x65\x64";
    Jw:
    if (!empty($rb)) {
        goto yC;
    }
    $rb = $PG . "\x2f\x77\160\x2d\x63\157\x6e\164\145\x6e\164\x2f\x70\x6c\165\147\x69\x6e\x73\57\x6d\151\x6e\x69\x6f\162\x61\x6e\x67\145\55\163\x61\x6d\x6c\55\x32\60\55\163\x69\156\147\154\x65\55\163\151\x67\156\x2d\x6f\x6e\57";
    yC:
    $SJ = SAMLSPUtilities::createAuthnRequest($Uf, $rb, $eX, $s2, $j5, $So);
    if (!($Ln == "\144\x69\163\x70\x6c\x61\x79\x53\101\115\114\x52\x65\x71\x75\x65\163\x74")) {
        goto Zx;
    }
    mo_saml_show_SAML_log(SAMLSPUtilities::createAuthnRequest($Uf, $rb, $eX, $s2, "\x48\x54\x54\120\x50\157\x73\x74", $So), $Ln);
    Zx:
    $vm = $eX;
    if (strpos($eX, "\77") !== false) {
        goto gg;
    }
    $vm .= "\x3f";
    goto q5;
    gg:
    $vm .= "\x26";
    q5:
    cldjkasjdksalc();
    $Ln = mo_saml_get_relay_state($Ln);
    $Ln = empty($Ln) ? "\57" : $Ln;
    if (empty($j5) || $j5 == "\110\x74\164\160\122\x65\144\151\162\145\x63\x74") {
        goto LS;
    }
    if (!(LicenseHelper::getCurrentOption(mo_options_enum_service_provider::Request_signed) != "\x63\x68\145\x63\153\x65\x64")) {
        goto WA;
    }
    $sw = base64_encode($SJ);
    SAMLSPUtilities::postSAMLRequest($eX, $sw, $Ln);
    exit;
    WA:
    $OY = '';
    $T8 = '';
    if ($_REQUEST["\x6f\160\x74\151\x6f\x6e"] == "\x74\x65\x73\x74\x69\x64\x70\x63\x6f\156\146\x69\x67" && isset($_REQUEST["\156\145\x77\x63\x65\162\164"])) {
        goto A6;
    }
    $sw = SAMLSPUtilities::signXML($SJ, "\x4e\141\x6d\145\x49\104\120\x6f\154\x69\x63\x79");
    goto i9;
    A6:
    $sw = SAMLSPUtilities::signXML($SJ, "\116\x61\155\x65\111\x44\x50\x6f\x6c\151\x63\x79", true);
    i9:
    SAMLSPUtilities::postSAMLRequest($eX, $sw, $Ln, $WY);
    update_option("\155\x6f\137\163\141\155\154\137\156\145\167\137\x63\x65\x72\x74\137\x74\x65\163\x74", true);
    goto sJ;
    LS:
    if (!(LicenseHelper::getCurrentOption(mo_options_enum_service_provider::Request_signed) != "\x63\x68\x65\x63\x6b\145\x64")) {
        goto cL;
    }
    $vm .= "\x53\x41\x4d\x4c\122\x65\161\x75\145\x73\x74\x3d" . $SJ . "\x26\x52\145\154\x61\x79\x53\x74\x61\x74\x65\75" . urlencode($Ln);
    if (empty($WY)) {
        goto b0;
    }
    $vm .= "\x26\165\x73\145\x72\116\x61\x6d\x65\x3d" . $WY;
    b0:
    header("\x63\x61\x63\150\x65\x2d\143\x6f\156\164\x72\157\x6c\x3a\40\155\141\170\55\x61\x67\145\x3d\60\54\40\160\x72\151\166\x61\x74\145\x2c\40\156\157\x2d\163\164\x6f\x72\145\54\x20\x6e\x6f\55\143\x61\143\x68\x65\54\40\155\165\163\164\x2d\162\x65\x76\x61\154\x69\144\x61\x74\x65");
    header("\114\x6f\143\x61\x74\151\x6f\x6e\x3a\x20" . $vm);
    exit;
    cL:
    $SJ = "\123\x41\115\x4c\x52\x65\161\165\145\163\164\75" . $SJ . "\x26\122\x65\154\141\x79\x53\x74\x61\164\x65\75" . urlencode($Ln) . "\x26\123\x69\x67\x41\154\x67\x3d" . urlencode(XMLSecurityKey::RSA_SHA256);
    $Jp = array("\164\171\x70\x65" => "\x70\x72\x69\166\141\x74\x65");
    $WO = new XMLSecurityKey(XMLSecurityKey::RSA_SHA256, $Jp);
    if ($_REQUEST["\x6f\160\x74\151\x6f\x6e"] == "\x74\x65\x73\x74\x69\x64\x70\143\x6f\x6e\146\x69\147" && isset($_REQUEST["\x6e\x65\167\143\145\162\164"])) {
        goto jH;
    }
    $iW = get_option("\155\x6f\137\x73\141\x6d\154\137\x63\165\162\x72\145\156\164\137\x63\x65\162\164\137\x70\x72\x69\166\x61\164\x65\137\153\x65\171");
    goto H4;
    jH:
    $iW = file_get_contents(plugin_dir_path(__FILE__) . "\x72\145\163\x6f\165\x72\143\145\x73" . DIRECTORY_SEPARATOR . "\155\151\156\151\x6f\162\x61\x6e\x67\x65\55\163\160\55\143\145\162\x74\x69\146\151\143\x61\x74\145\55\x70\x72\151\x76\56\153\145\x79");
    H4:
    $WO->loadKey($iW, FALSE);
    $tT = new XMLSecurityDSig();
    $MA = $WO->signData($SJ);
    $MA = base64_encode($MA);
    $vm .= $SJ . "\x26\x53\x69\x67\x6e\x61\x74\165\162\145\75" . urlencode($MA);
    if (empty($WY)) {
        goto ap;
    }
    $vm .= "\46\165\163\145\x72\x4e\x61\x6d\x65\x3d" . $WY;
    ap:
    header("\x63\141\143\150\145\55\143\x6f\x6e\x74\162\x6f\x6c\x3a\40\155\x61\x78\x2d\x61\147\x65\x3d\x30\x2c\x20\160\x72\x69\166\141\164\145\54\x20\x6e\157\x2d\x73\x74\157\x72\x65\54\x20\156\x6f\55\143\x61\143\x68\145\x2c\x20\x6d\165\x73\164\x2d\162\x65\166\x61\154\151\x64\141\x74\x65");
    header("\114\157\x63\x61\x74\151\157\x6e\72\x20" . $vm);
    exit;
    sJ:
    at:
    Od:
    if (empty($_REQUEST["\x53\101\115\x4c\x52\145\163\160\157\x6e\163\x65"])) {
        goto ZI;
    }
    if (!empty($_POST["\x52\145\154\x61\x79\123\x74\141\164\x65"]) && $_POST["\x52\145\x6c\x61\x79\123\x74\141\164\x65"] != "\x2f") {
        goto n8;
    }
    $tr = '';
    goto tg;
    n8:
    $tr = $_POST["\122\145\x6c\141\171\123\x74\x61\164\x65"];
    tg:
    $PG = get_option("\155\157\137\163\141\x6d\x6c\137\x73\x70\x5f\142\141\163\145\137\x75\x72\x6c");
    if (!empty($PG)) {
        goto RJ;
    }
    $PG = home_url();
    RJ:
    $fe = htmlspecialchars($_REQUEST["\123\101\x4d\x4c\x52\145\163\160\157\x6e\x73\145"]);
    $fe = base64_decode($fe);
    if (!($tr == "\144\x69\163\x70\x6c\x61\x79\123\x41\x4d\x4c\x52\x65\x73\x70\x6f\156\x73\x65")) {
        goto wa;
    }
    mo_saml_show_SAML_log($fe, $tr);
    wa:
    if (empty($_GET["\x53\x41\x4d\x4c\122\145\x73\x70\x6f\156\163\x65"])) {
        goto fY;
    }
    $fe = gzinflate($fe);
    fY:
    $HL = new DOMDocument();
    $HL->loadXML($fe);
    $cJ = $HL->firstChild;
    $ik = $HL->documentElement;
    $Lt = new DOMXpath($HL);
    $Lt->registerNamespace("\x73\141\x6d\154\x70", "\x75\x72\156\72\157\x61\x73\x69\x73\72\x6e\x61\155\x65\x73\x3a\164\x63\72\x53\x41\115\114\72\62\x2e\x30\72\160\x72\x6f\x74\157\143\157\154");
    $Lt->registerNamespace("\163\x61\x6d\154", "\x75\x72\156\x3a\157\x61\163\x69\163\72\x6e\141\x6d\x65\163\72\164\x63\x3a\123\x41\x4d\x4c\x3a\x32\56\60\x3a\x61\163\163\x65\x72\x74\151\157\x6e");
    if ($cJ->localName == "\114\x6f\x67\157\x75\x74\122\145\163\x70\157\156\x73\145") {
        goto dJ;
    }
    $Lp = $Lt->query("\57\163\x61\155\x6c\160\x3a\x52\x65\163\160\157\x6e\x73\145\57\x73\141\x6d\154\160\72\x53\x74\x61\164\165\163\57\x73\x61\x6d\154\x70\x3a\123\x74\141\x74\x75\x73\x43\x6f\144\145", $ik);
    $JH = $Lp->item(0)->getAttribute("\126\x61\x6c\165\x65");
    $GG = $Lt->query("\x2f\163\x61\155\x6c\160\x3a\x52\x65\x73\160\x6f\x6e\163\145\57\163\x61\155\x6c\x70\x3a\x53\164\141\164\x75\x73\x2f\x73\x61\155\x6c\160\72\123\x74\141\164\x75\163\x4d\x65\163\163\x61\147\x65", $ik)->item(0);
    if (empty($GG)) {
        goto sq;
    }
    $GG = $GG->nodeValue;
    sq:
    $WS = explode("\72", $JH);
    $Lp = $WS[7];
    if (!empty($_POST["\122\145\x6c\141\171\123\x74\141\164\145"]) && $_POST["\122\145\154\141\171\123\164\141\x74\145"] != "\57") {
        goto lB;
    }
    $tr = '';
    goto pb;
    lB:
    $tr = $_POST["\x52\x65\x6c\x61\x79\x53\x74\x61\164\145"];
    pb:
    if (!($Lp != "\x53\x75\x63\x63\145\x73\x73")) {
        goto Uk;
    }
    show_status_error($Lp, $tr, $GG);
    Uk:
    $En = maybe_unserialize(LicenseHelper::getCurrentOption(mo_options_enum_service_provider::X509_certificate));
    $Uf = $PG . "\x2f";
    update_option("\155\157\x5f\x73\x61\x6d\154\x5f\x72\x65\163\160\157\x6e\163\x65", base64_encode($fe));
    if ($tr == "\x74\x65\163\164\x4e\145\x77\x43\x65\162\x74\151\146\151\143\x61\164\145") {
        goto BP;
    }
    $fe = new SAML2SPResponse($cJ, get_option("\x6d\x6f\x5f\x73\141\x6d\154\137\x63\165\x72\x72\145\156\x74\x5f\x63\145\162\x74\137\x70\162\x69\166\x61\164\145\x5f\153\x65\x79"));
    goto dF;
    BP:
    $p_ = file_get_contents(plugin_dir_path(__FILE__) . "\x72\x65\163\x6f\x75\162\143\145\163" . DIRECTORY_SEPARATOR . "\x6d\x69\x6e\151\157\x72\x61\156\x67\145\x2d\163\x70\55\143\x65\162\164\151\146\x69\143\x61\164\145\x2d\160\162\x69\166\56\x6b\x65\x79");
    $fe = new SAML2SPResponse($cJ, $p_);
    dF:
    $Vj = $fe->getSignatureData();
    $BO = current($fe->getAssertions())->getSignatureData();
    if (!(empty($BO) && empty($Vj))) {
        goto yt;
    }
    if ($tr == "\164\x65\163\x74\126\x61\x6c\151\144\x61\x74\x65" or $tr == "\x74\x65\x73\164\x4e\x65\167\103\x65\x72\164\151\146\151\143\141\164\145") {
        goto EO;
    }
    wp_die("\x57\145\x20\143\x6f\x75\x6c\144\x20\x6e\157\164\40\163\x69\147\156\x20\171\157\x75\40\151\x6e\x2e\x20\x50\154\145\141\x73\145\40\x63\x6f\156\x74\x61\143\164\x20\141\x64\x6d\151\156\151\x73\164\x72\141\164\x6f\x72", "\105\x72\x72\157\x72\x3a\40\x49\x6e\x76\141\x6c\151\144\x20\x53\101\x4d\114\x20\x52\145\163\x70\x6f\x6e\163\145");
    goto si;
    EO:
    $DP = mo_options_error_constants::Error_no_certificate;
    $aS = mo_options_error_constants::Cause_no_certificate;
    echo "\74\x64\x69\166\x20\x73\x74\171\x6c\145\75\x22\x66\157\x6e\164\55\146\141\155\151\154\x79\72\103\x61\154\x69\x62\x72\x69\x3b\x70\x61\144\144\151\156\x67\72\60\40\x33\45\73\42\x3e\xa\x9\x9\11\11\x3c\x64\151\x76\x20\x73\x74\171\x6c\145\x3d\42\143\157\x6c\157\x72\72\x20\x23\x61\71\64\x34\x34\x32\73\x62\x61\x63\153\147\x72\157\165\156\x64\x2d\x63\157\154\x6f\x72\x3a\x20\x23\x66\62\144\x65\x64\x65\x3b\x70\141\x64\144\151\156\147\x3a\40\x31\65\160\170\73\155\141\x72\x67\x69\156\55\x62\157\164\x74\157\x6d\72\40\62\x30\160\x78\x3b\164\x65\170\164\x2d\141\154\x69\147\x6e\x3a\x63\145\x6e\164\x65\x72\73\x62\x6f\162\x64\x65\x72\x3a\x31\x70\170\40\163\157\x6c\x69\x64\x20\43\x45\66\102\63\102\x32\73\146\x6f\x6e\164\55\163\x69\x7a\145\x3a\61\x38\160\x74\x3b\x22\x3e\x20\105\122\x52\117\122\74\x2f\144\x69\x76\76\xa\x9\11\x9\11\x3c\x64\x69\166\x20\x73\164\x79\154\x65\x3d\42\x63\157\x6c\157\x72\x3a\x20\x23\141\x39\x34\x34\x34\62\x3b\146\157\156\x74\55\x73\x69\x7a\145\x3a\61\x34\160\x74\x3b\x20\x6d\141\x72\147\151\156\55\142\157\164\x74\157\155\x3a\x32\x30\x70\x78\x3b\x22\76\x3c\160\x3e\x3c\163\x74\162\x6f\156\x67\x3e\105\162\x72\x6f\x72\x20\x20\72" . esc_html($DP) . "\40\74\57\163\164\x72\x6f\x6e\147\76\x3c\57\160\76\xa\11\11\11\x9\12\x9\x9\x9\11\x3c\160\76\x3c\x73\164\162\157\156\x67\76\x50\157\163\163\x69\142\154\x65\x20\103\141\165\163\x65\x3a\x20" . esc_html($aS) . "\74\x2f\x73\x74\162\157\x6e\147\x3e\74\57\x70\x3e\xa\x9\x9\11\x9\xa\x9\x9\x9\11\x3c\57\x64\151\166\76\x3c\x2f\x64\151\166\76";
    mo_saml_download_logs($DP, $aS);
    exit;
    si:
    yt:
    $DJ = '';
    if (is_array($En)) {
        goto LD;
    }
    $lx = XMLSecurityKey::getRawThumbprint($En);
    $lx = mo_saml_convert_to_windows_iconv($lx);
    $lx = preg_replace("\57\x5c\x73\53\57", '', $lx);
    if (empty($Vj)) {
        goto Ip;
    }
    $DJ = SAMLSPUtilities::processResponse($Uf, $lx, $Vj, $fe, 0, $tr);
    Ip:
    if (empty($BO)) {
        goto La;
    }
    $DJ = SAMLSPUtilities::processResponse($Uf, $lx, $BO, $fe, 0, $tr);
    La:
    goto wS;
    LD:
    foreach ($En as $WO => $cK) {
        $lx = XMLSecurityKey::getRawThumbprint($cK);
        $lx = mo_saml_convert_to_windows_iconv($lx);
        $lx = preg_replace("\x2f\134\163\53\x2f", '', $lx);
        if (empty($Vj)) {
            goto v9;
        }
        $DJ = SAMLSPUtilities::processResponse($Uf, $lx, $Vj, $fe, $WO, $tr);
        v9:
        if (empty($BO)) {
            goto be;
        }
        $DJ = SAMLSPUtilities::processResponse($Uf, $lx, $BO, $fe, $WO, $tr);
        be:
        if (!$DJ) {
            goto Xx;
        }
        goto NQ;
        Xx:
        bu:
    }
    NQ:
    wS:
    if ($Vj) {
        goto TZ;
    }
    if ($BO) {
        goto nS;
    }
    goto P4;
    TZ:
    $xV = $Vj["\103\145\162\164\151\146\151\143\x61\x74\x65\163"][0];
    goto P4;
    nS:
    $xV = $BO["\x43\x65\162\164\151\146\x69\143\141\164\145\163"][0];
    P4:
    if ($DJ) {
        goto b9;
    }
    if ($tr == "\x74\x65\x73\164\126\x61\154\151\x64\x61\x74\x65" or $tr == "\x74\145\x73\x74\x4e\x65\167\103\x65\162\164\151\146\151\143\x61\164\145") {
        goto cK;
    }
    wp_die("\127\145\x20\x63\157\x75\154\144\x20\x6e\157\x74\40\163\151\x67\156\x20\x79\157\165\40\x69\x6e\x2e\40\120\154\x65\141\163\x65\40\143\x6f\156\164\x61\143\x74\40\x79\157\165\162\40\x61\144\x6d\151\x6e\151\x73\x74\x72\x61\164\157\x72", "\105\162\162\x6f\162\72\x20\111\x6e\x76\x61\154\151\x64\x20\123\x41\x4d\114\40\x52\145\163\160\x6f\156\x73\x65");
    goto gk;
    cK:
    $DP = mo_options_error_constants::Error_wrong_certificate;
    $aS = mo_options_error_constants::Cause_wrong_certificate;
    $iK = "\55\55\55\55\x2d\102\x45\107\x49\x4e\40\103\x45\122\x54\x49\106\x49\103\x41\124\x45\55\55\55\55\55\74\142\162\76" . chunk_split($xV, 64) . "\x3c\142\x72\76\55\x2d\55\x2d\x2d\105\116\104\x20\103\x45\122\124\x49\x46\x49\103\x41\124\x45\x2d\55\55\x2d\55";
    echo "\74\x64\151\x76\x20\x73\x74\171\154\145\x3d\42\x66\157\x6e\164\55\x66\141\x6d\x69\x6c\171\72\x43\141\154\151\x62\162\151\73\160\141\144\144\x69\x6e\x67\x3a\x30\x20\63\45\x3b\x22\x3e";
    echo "\74\144\x69\x76\x20\x73\164\171\x6c\145\75\42\x63\157\154\157\162\72\x20\x23\141\71\64\64\64\x32\73\142\141\x63\153\x67\162\157\165\x6e\x64\x2d\143\x6f\154\x6f\162\72\x20\x23\x66\x32\144\145\144\145\x3b\x70\141\x64\144\x69\156\147\x3a\40\x31\65\160\x78\x3b\x6d\x61\162\147\151\x6e\55\x62\x6f\164\164\x6f\x6d\72\x20\62\60\x70\x78\73\x74\x65\x78\x74\55\x61\x6c\x69\x67\x6e\x3a\143\x65\156\x74\x65\x72\73\x62\157\x72\144\x65\x72\72\61\x70\x78\x20\163\157\154\151\x64\x20\43\105\x36\102\x33\x42\x32\73\146\157\156\x74\55\163\x69\x7a\x65\x3a\x31\x38\x70\x74\73\42\76\40\x45\x52\122\x4f\122\74\x2f\144\151\x76\x3e\xa\x9\11\11\x3c\x64\151\166\x20\163\x74\171\154\145\x3d\x22\143\157\x6c\x6f\x72\72\x20\x23\x61\71\64\64\64\62\73\146\x6f\156\x74\55\163\x69\x7a\x65\x3a\x31\x34\160\164\73\40\155\x61\162\x67\x69\x6e\x2d\x62\x6f\x74\164\x6f\155\x3a\x32\60\160\x78\73\42\x3e\74\x70\76\74\x73\164\162\157\x6e\x67\76\105\x72\x72\157\162\x3a\x20\74\x2f\163\x74\162\x6f\x6e\x67\x3e\x55\156\x61\142\154\145\x20\164\157\x20\146\x69\156\x64\x20\x61\x20\143\x65\162\x74\151\x66\x69\143\x61\x74\145\40\x6d\x61\x74\143\x68\151\156\x67\x20\x74\x68\x65\40\x63\x6f\x6e\146\x69\x67\165\x72\x65\144\x20\x66\151\156\x67\x65\x72\x70\x72\151\156\x74\x2e\x3c\57\x70\x3e\12\x9\11\x9\74\x70\76\x50\154\x65\141\x73\145\40\143\157\156\x74\x61\x63\x74\x20\x79\157\165\162\40\x61\x64\x6d\151\156\x69\x73\164\162\141\164\x6f\162\x20\141\156\x64\40\x72\x65\160\157\162\x74\x20\164\x68\145\x20\x66\x6f\154\x6c\157\167\x69\156\147\x20\145\x72\x72\x6f\162\x3a\74\x2f\160\76\xa\x9\11\x9\74\160\x3e\74\x73\x74\x72\x6f\x6e\x67\76\120\157\x73\x73\151\142\x6c\145\x20\x43\x61\165\163\145\72\x20\74\57\x73\164\162\x6f\x6e\x67\76\x27\130\56\65\x30\71\x20\103\145\162\164\x69\x66\151\143\141\x74\145\x27\40\x66\151\145\154\144\40\x69\156\x20\160\154\165\147\151\x6e\40\x64\157\x65\x73\40\156\157\x74\40\x6d\x61\164\143\x68\x20\x74\150\145\40\x63\x65\162\x74\151\x66\151\143\141\164\x65\40\146\x6f\165\x6e\144\x20\151\156\x20\123\x41\x4d\x4c\x20\x52\145\x73\160\157\156\163\145\x2e\74\57\x70\x3e\xa\x9\11\11\74\160\x3e\x3c\x73\164\x72\x6f\x6e\x67\76\103\x65\162\x74\151\x66\151\x63\141\x74\x65\x20\146\157\165\156\x64\40\x69\x6e\x20\123\x41\115\114\x20\x52\x65\163\x70\157\156\163\145\x3a\x20\74\57\163\164\x72\157\x6e\147\76\74\x66\157\x6e\x74\40\x66\x61\143\145\x3d\x22\x43\x6f\165\x72\151\x65\x72\x20\116\145\x77\x22\x3b\146\157\156\164\x2d\x73\151\x7a\145\x3a\x31\60\160\x74\76\x3c\x62\x72\76\74\x62\x72\76" . $iK . "\74\57\x70\x3e\74\x2f\146\x6f\x6e\164\x3e\xa\x9\11\11\x3c\160\76\x3c\163\x74\x72\157\x6e\x67\76\123\x6f\x6c\165\x74\151\157\x6e\72\40\74\57\163\x74\162\157\156\x67\76\x3c\x2f\160\x3e\xa\11\11\x9\40\74\157\154\76\12\x20\40\x20\40\40\40\40\40\x20\40\x20\40\40\40\x20\x20\x3c\x6c\x69\x3e\x43\x6f\x70\171\40\x70\141\163\x74\145\40\164\x68\145\x20\x63\x65\162\164\151\146\x69\143\141\164\145\x20\x70\162\157\166\151\144\x65\x64\40\141\142\x6f\166\x65\x20\151\156\x20\x58\x35\60\71\x20\103\145\x72\x74\151\146\x69\x63\x61\164\x65\40\x75\156\x64\x65\162\40\x53\x65\162\x76\x69\x63\145\x20\120\162\157\x76\151\x64\145\x72\40\x53\145\x74\x75\160\x20\164\x61\x62\x2e\74\57\154\x69\76\xa\x20\40\40\x20\x20\x20\40\x20\40\x20\40\40\x20\40\40\x20\x3c\x6c\x69\76\111\x66\x20\x69\163\x73\x75\x65\40\x70\x65\x72\x73\151\x73\164\x73\x20\144\x69\x73\141\x62\154\145\x20\x3c\x62\x3e\x43\150\x61\162\x61\x63\164\145\162\x20\145\156\x63\x6f\144\x69\156\x67\x3c\57\142\x3e\x20\x75\156\x64\x65\162\40\x53\145\x72\x76\x69\143\145\x20\x50\x72\157\x76\144\x65\x72\x20\x53\145\164\x75\160\x20\164\141\x62\56\74\57\x6c\x69\x3e\12\x20\40\x20\x20\40\40\40\40\40\x20\x20\40\40\x3c\x2f\157\x6c\76\x9\11\xa\x9\11\11\74\57\144\x69\166\x3e\12\x9\11\11\x9\11\x3c\x64\x69\166\40\163\164\171\x6c\x65\x3d\42\155\x61\162\x67\x69\x6e\x3a\x33\x25\73\144\151\x73\160\x6c\x61\171\72\x62\x6c\x6f\143\x6b\x3b\x74\145\x78\x74\x2d\x61\x6c\151\x67\x6e\72\x63\145\156\x74\x65\162\73\x22\x3e\12\x9\11\11\11\11\x3c\x64\151\166\x20\x73\x74\171\154\145\75\x22\x6d\141\x72\x67\x69\156\72\x33\45\73\x64\151\x73\160\x6c\x61\x79\72\142\x6c\x6f\143\x6b\73\164\145\x78\164\x2d\141\x6c\x69\147\x6e\72\143\145\x6e\164\x65\x72\73\42\x3e\x3c\151\x6e\160\x75\164\x20\x73\x74\171\x6c\x65\x3d\x22\160\x61\144\x64\151\156\147\72\x31\x25\x3b\x77\x69\x64\x74\150\72\61\60\x30\160\x78\x3b\142\x61\143\x6b\x67\162\x6f\x75\156\144\72\x20\x23\x30\x30\71\61\x43\x44\40\156\157\x6e\x65\x20\x72\x65\160\145\x61\164\40\x73\143\x72\157\x6c\x6c\40\x30\45\40\x30\x25\x3b\143\165\162\x73\157\x72\72\40\160\157\151\x6e\x74\x65\x72\x3b\x66\x6f\156\164\55\x73\151\172\145\72\61\65\x70\170\73\142\157\x72\x64\145\162\x2d\x77\151\144\164\150\x3a\x20\61\160\170\x3b\142\x6f\x72\x64\145\x72\55\x73\164\171\x6c\x65\72\x20\x73\157\x6c\151\144\73\142\x6f\x72\144\145\162\55\x72\141\144\x69\165\163\x3a\40\x33\160\x78\x3b\167\x68\x69\x74\145\55\163\160\x61\143\145\72\40\x6e\157\167\x72\x61\x70\x3b\142\x6f\x78\x2d\x73\x69\x7a\x69\156\147\x3a\x20\142\x6f\162\144\x65\x72\55\x62\x6f\x78\73\x62\x6f\162\x64\x65\x72\x2d\x63\157\154\157\x72\x3a\40\43\60\x30\67\x33\101\x41\73\142\x6f\x78\x2d\163\x68\x61\144\157\167\72\x20\60\160\170\x20\61\160\x78\40\60\160\170\x20\x72\147\142\141\x28\x31\x32\60\54\x20\x32\x30\60\x2c\40\62\x33\60\x2c\x20\x30\x2e\x36\x29\40\151\x6e\163\x65\164\73\x63\x6f\154\157\162\x3a\40\43\x46\106\x46\73\42\x74\x79\160\x65\x3d\42\142\x75\x74\164\157\156\x22\40\166\141\x6c\165\x65\x3d\42\x44\157\156\145\42\40\x6f\156\103\154\151\x63\x6b\x3d\x22\163\145\154\146\56\x63\x6c\157\163\x65\50\51\73\42\x3e\74\57\x64\x69\166\x3e";
    mo_saml_download_logs($DP, $aS);
    exit;
    gk:
    b9:
    $Ai = LicenseHelper::getCurrentOption(mo_options_enum_service_provider::Issuer);
    $rb = get_option("\155\157\x5f\x73\141\155\x6c\137\163\160\x5f\145\x6e\x74\151\x74\x79\x5f\x69\144");
    if (!empty($rb)) {
        goto Zv;
    }
    $rb = $PG . "\57\x77\x70\55\143\157\x6e\x74\x65\156\164\x2f\x70\x6c\165\147\151\x6e\163\57\155\x69\x6e\151\157\162\x61\156\x67\145\x2d\163\x61\155\154\x2d\62\x30\55\x73\151\x6e\147\x6c\145\55\163\x69\147\156\x2d\x6f\x6e\57";
    Zv:
    SAMLSPUtilities::validateIssuerAndAudience($fe, $rb, $Ai, $tr);
    $n2 = current(current($fe->getAssertions())->getNameId());
    $Bu = current($fe->getAssertions())->getAttributes();
    $Bu["\116\141\155\145\x49\x44"] = array("\60" => $n2);
    $VU = current($fe->getAssertions())->getSessionIndex();
    mo_saml_checkMapping($Bu, $tr, $VU);
    goto YR;
    dJ:
    if (!isset($_REQUEST["\122\145\154\141\171\123\164\141\164\x65"])) {
        goto Oz;
    }
    $ap = $_REQUEST["\x52\145\x6c\141\171\x53\164\141\164\145"];
    Oz:
    $R_ = get_option("\x6d\157\x5f\163\x61\x6d\x6c\137\x6c\x6f\x67\157\x75\164\137\162\145\x6c\x61\x79\x5f\x73\164\x61\x74\145");
    if (empty($R_)) {
        goto Es;
    }
    $ap = $R_;
    Es:
    if (!is_user_logged_in()) {
        goto zC;
    }
    wp_destroy_current_session();
    wp_clear_auth_cookie();
    wp_set_current_user(0);
    zC:
    if (!empty($ap)) {
        goto kq;
    }
    $ap = home_url();
    kq:
    header("\114\x6f\x63\x61\164\151\157\156\72\40" . $ap);
    exit;
    YR:
    ZI:
    if (empty($_REQUEST["\123\x41\115\x4c\x52\145\161\x75\x65\163\x74"])) {
        goto xw;
    }
    $SJ = htmlspecialchars($_REQUEST["\x53\101\x4d\114\122\x65\161\x75\145\x73\x74"]);
    $tr = "\x2f";
    if (empty($_REQUEST["\122\x65\154\x61\171\123\x74\x61\x74\x65"])) {
        goto vm;
    }
    $tr = $_REQUEST["\122\145\x6c\x61\x79\x53\x74\x61\164\x65"];
    vm:
    $SJ = base64_decode($SJ);
    if (empty($_GET["\x53\101\115\x4c\122\x65\x71\x75\145\163\x74"])) {
        goto GA;
    }
    $SJ = gzinflate($SJ);
    GA:
    $HL = new DOMDocument();
    $HL->loadXML($SJ);
    $YL = $HL->firstChild;
    if (!($YL->localName == "\x4c\157\x67\x6f\x75\164\x52\145\161\165\145\x73\164")) {
        goto wI;
    }
    $M8 = new SAML2SPLogoutRequest($YL);
    if (!(!session_id() || session_id() == '' || empty($_SESSION))) {
        goto mA;
    }
    session_start();
    mA:
    $_SESSION["\x6d\x6f\137\163\x61\x6d\x6c\x5f\x6c\x6f\147\x6f\x75\164\137\162\145\x71\165\x65\163\164"] = $SJ;
    $_SESSION["\x6d\x6f\x5f\x73\x61\155\x6c\137\154\x6f\x67\157\x75\164\137\x72\x65\x6c\x61\x79\x5f\163\164\141\164\x65"] = $tr;
    wp_redirect(htmlspecialchars_decode(wp_logout_url()));
    exit;
    wI:
    xw:
    No:
}
function cldjkasjdksalc()
{
    $ou = plugin_dir_path(__FILE__);
    $Iw = wp_upload_dir();
    $dw = home_url();
    $dw = trim($dw, "\x2f");
    if (preg_match("\x23\136\x68\x74\164\x70\50\163\51\77\x3a\x2f\x2f\43", $dw)) {
        goto fA;
    }
    $dw = "\x68\164\164\x70\x3a\x2f\57" . $dw;
    fA:
    $MW = parse_url($dw);
    $hn = preg_replace("\57\x5e\x77\167\167\134\56\57", '', $MW["\150\x6f\163\164"]);
    $iR = $hn . "\x2d" . $Iw["\142\141\x73\x65\x64\x69\x72"];
    $P6 = hash_hmac("\163\150\141\x32\x35\x36", $iR, "\64\x44\110\x66\x6a\x67\x66\152\141\163\156\x64\146\163\141\x6a\146\110\x47\x4a");
    if (is_writable($ou . "\x6c\151\x63\x65\156\x73\145")) {
        goto wB;
    }
    $kX = base64_decode("bGNkamthc2pka3NhY2w=");
    $ZD = get_option($kX);
    if (empty($ZD)) {
        goto hn;
    }
    $Jo = str_rot13($ZD);
    hn:
    goto Iz;
    wB:
    $ZD = file_get_contents($ou . "\x6c\151\143\145\x6e\163\x65");
    if (!$ZD) {
        goto dS;
    }
    $Jo = base64_encode($ZD);
    dS:
    Iz:
    if (!empty($ZD)) {
        goto Yc;
    }
    $hf = base64_decode("TGljZW5zZSBGaWxlIG1pc3NpbmcgZnJvbSB0aGUgcGx1Z2luLg==");
    wp_die($hf);
    Yc:
    if (strpos($Jo, $P6) !== false) {
        goto d4;
    }
    $K_ = new Customersaml();
    $WO = get_option("\155\157\137\x73\141\155\154\x5f\x63\165\x73\164\x6f\155\x65\x72\137\164\x6f\x6b\x65\x6e");
    $wC = AESEncryption::decrypt_data(get_option("\x73\155\x6c\x5f\x6c\x6b"), $WO);
    $q1 = $K_->mo_saml_vl($wC, false);
    if ($q1) {
        goto h8;
    }
    return;
    h8:
    $q1 = json_decode($q1, true);
    if (!empty($q1["\x69\x73\124\x72\151\141\x6c"])) {
        goto L4;
    }
    update_option("\x6d\157\137\x73\141\x6d\154\x5f\x74\x6c\x61", false);
    goto Iy;
    L4:
    update_option("\155\157\137\x73\x61\x6d\x6c\137\x74\154\x61", $q1["\x69\x73\x54\x72\x69\x61\154"]);
    update_option("\155\157\137\x73\x61\155\x6c\137\x6c\x69\143\x65\x6e\x73\x65\137\x65\x78\160\151\162\x79\137\144\x61\164\x65", $q1["\154\151\x63\145\156\x73\x65\x45\x78\160\151\x72\x79\104\141\x74\145"]);
    Iy:
    if (!empty($q1["\163\164\141\x74\x75\163"]) and strcasecmp($q1["\163\x74\x61\164\165\x73"], "\x53\x55\103\x43\105\x53\123") == 0) {
        goto yb;
    }
    $TB = base64_decode("SW52YWxpZCBMaWNlbnNlIEZvdW5kLiBQbGVhc2UgY29udGFjdCB5b3VyIGFkbWluaXN0cmF0b3IgdG8gdXNlIHRoZSBjb3JyZWN0IGxpY2Vuc2UuIEZvciBtb3JlIGRldGFpbHMsIHByb3ZpZGUgdGhlIFJlZmVyZW5jZSBJRDogTU8yNDI4MTAyMTcwNSB0byB5b3VyIGFkbWluaXN0cmF0b3IgdG8gY2hlY2sgaXQgdW5kZXIgSGVscCAmIEZBUSB0YWIgaW4gdGhlIHBsdWdpbi4=");
    $TB = str_replace("\x48\145\154\x70\40\x26\40\x46\x41\x51\x20\x74\141\142\x20\x69\x6e", "\106\x41\x51\163\40\x73\x65\x63\x74\151\157\x6e\x20\x6f\x66", $TB);
    $jv = base64_decode("RXJyb3I6IEludmFsaWQgTGljZW5zZQ==");
    wp_die($TB, $jv);
    goto Hw;
    yb:
    $ou = plugin_dir_path(__FILE__);
    $dw = home_url();
    $dw = trim($dw, "\57");
    if (preg_match("\x23\136\150\164\x74\160\50\x73\51\77\x3a\57\57\43", $dw)) {
        goto eT;
    }
    $dw = "\x68\x74\x74\x70\x3a\57\x2f" . $dw;
    eT:
    $MW = parse_url($dw);
    $hn = preg_replace("\x2f\x5e\167\x77\x77\134\x2e\57", '', $MW["\x68\157\x73\x74"]);
    $Iw = wp_upload_dir();
    $iR = $hn . "\55" . $Iw["\142\141\x73\x65\x64\x69\x72"];
    $P6 = hash_hmac("\x73\150\x61\x32\65\x36", $iR, "\x34\104\110\146\x6a\147\x66\152\x61\163\x6e\x64\x66\x73\x61\x6a\x66\110\107\x4a");
    $Ua = djkasjdksa();
    $il = round(strlen($Ua) / rand(2, 20));
    $Ua = substr_replace($Ua, $P6, $il, 0);
    $xs = base64_decode($Ua);
    if (is_writable($ou . "\154\x69\143\145\x6e\x73\145")) {
        goto zc;
    }
    $Ua = str_rot13($Ua);
    $kX = base64_decode("bGNkamthc2pka3NhY2w=");
    update_option($kX, $Ua);
    goto AZ;
    zc:
    file_put_contents($ou . "\x6c\x69\143\145\156\163\145", $xs);
    AZ:
    return true;
    Hw:
    goto o1;
    d4:
    return true;
    o1:
}
function djkasjdksa()
{
    $MU = "\x21\176\x40\43\x24\45\x5e\x26\x2a\50\x29\137\x2b\174\x7b\175\74\x3e\77\60\x31\x32\63\x34\x35\x36\67\x38\x39\141\x62\x63\144\x65\146\x67\x68\151\x6a\153\154\155\x6e\x6f\160\x71\162\163\164\165\x76\x77\170\x79\172\x41\x42\x43\x44\105\x46\x47\110\111\112\113\x4c\x4d\116\x4f\120\121\x52\123\124\125\126\x57\130\x59\x5a";
    $DC = strlen($MU);
    $Dd = '';
    $lw = 0;
    lz:
    if (!($lw < 10000)) {
        goto yW;
    }
    $Dd .= $MU[rand(0, $DC - 1)];
    i2:
    $lw++;
    goto lz;
    yW:
    return $Dd;
}
function mo_saml_show_SAML_log($YL, $YE)
{
    header("\103\x6f\x6e\164\x65\156\x74\x2d\124\171\160\145\72\40\x74\x65\170\x74\x2f\x68\x74\155\x6c");
    $ik = new DOMDocument();
    $ik->preserveWhiteSpace = false;
    $ik->formatOutput = true;
    $ik->loadXML($YL);
    if ($YE == "\x64\x69\163\x70\154\141\x79\x53\x41\115\114\x52\x65\x71\x75\145\163\164") {
        goto Z5;
    }
    $tf = "\x53\x41\x4d\x4c\40\122\145\x73\x70\157\x6e\163\x65";
    goto C5;
    Z5:
    $tf = "\123\x41\115\x4c\x20\122\145\x71\x75\x65\x73\164";
    C5:
    $v_ = $ik->saveXML();
    $pM = htmlentities($v_);
    $pM = rtrim($pM);
    $l3 = simplexml_load_string($v_);
    $No = json_encode($l3);
    $bH = json_decode($No);
    $of = plugins_url("\x69\x6e\x63\x6c\x75\144\x65\x73\57\143\x73\x73\57\163\164\x79\x6c\145\137\163\x65\164\x74\x69\x6e\x67\x73\56\x63\163\x73\77\x76\145\162\x3d\x34\56\70\56\64\x30", __FILE__);
    echo "\74\154\151\156\x6b\x20\162\x65\x6c\75\x27\163\164\x79\x6c\145\x73\x68\x65\x65\164\x27\40\151\x64\x3d\x27\x6d\157\137\163\141\155\x6c\x5f\x61\x64\155\x69\x6e\137\163\145\164\x74\x69\156\x67\x73\137\x73\x74\x79\154\145\x2d\x63\163\x73\x27\x20\x20\150\162\x65\146\75\47" . $of . "\47\x20\x74\171\x70\145\x3d\47\164\x65\170\x74\x2f\143\163\x73\47\40\x6d\x65\144\x69\x61\75\47\141\x6c\x6c\x27\40\57\x3e\12\40\x20\x20\x20\40\x20\x20\40\x20\x20\x20\40\12\x9\x9\x9\x3c\x64\151\166\x20\143\x6c\x61\x73\x73\x3d\42\x6d\x6f\x2d\144\151\163\160\x6c\x61\171\55\154\157\x67\163\42\x20\76\74\x70\x20\164\x79\x70\x65\x3d\x22\164\145\170\164\x22\40\x20\x20\151\x64\x3d\x22\123\101\115\x4c\x5f\x74\171\160\x65\x22\76" . $tf . "\74\57\x70\76\74\x2f\144\x69\166\76\xa\11\x9\x9\x9\xa\11\x9\x9\x3c\x64\151\166\x20\x74\171\x70\145\75\42\164\145\x78\x74\42\x20\151\x64\75\x22\x53\x41\115\x4c\x5f\x64\151\x73\x70\x6c\141\x79\x22\x20\143\x6c\x61\163\163\x3d\42\155\157\55\x64\151\x73\x70\x6c\x61\x79\x2d\x62\x6c\157\143\153\x22\x3e\x3c\160\162\x65\x20\143\x6c\141\163\x73\x3d\x27\142\162\x75\163\x68\x3a\40\170\155\154\73\47\76" . $pM . "\74\57\x70\x72\145\x3e\74\57\x64\151\x76\x3e\12\x9\x9\x9\x3c\142\162\76\12\11\11\x9\74\x64\x69\x76\11\40\x73\x74\171\x6c\145\x3d\42\x6d\141\x72\x67\151\156\72\x33\45\x3b\144\x69\163\160\154\141\171\x3a\x62\x6c\x6f\143\153\x3b\x74\145\170\x74\x2d\141\x6c\x69\147\156\72\x63\145\156\164\145\162\73\x22\76\12\40\x20\40\x20\x20\x20\x20\x20\x20\x20\x20\40\xa\11\11\x9\74\x64\x69\x76\x20\163\x74\x79\154\145\x3d\42\x6d\141\162\x67\151\x6e\x3a\x33\45\73\144\151\163\160\x6c\x61\x79\72\x62\x6c\x6f\143\153\x3b\x74\145\x78\x74\x2d\141\154\151\147\x6e\72\x63\145\x6e\x74\x65\162\x3b\x22\40\x3e\12\11\12\40\x20\40\40\x20\40\40\x20\x20\40\x20\40\x3c\57\144\x69\x76\x3e\12\11\x9\11\x3c\142\165\x74\x74\157\156\x20\151\x64\x3d\42\143\157\x70\x79\x22\40\157\x6e\143\154\151\143\153\x3d\x22\143\157\160\171\x44\x69\x76\124\x6f\x43\154\151\x70\142\x6f\x61\162\144\x28\x29\x22\40\x20\163\x74\x79\154\145\x3d\42\x70\x61\x64\x64\x69\156\x67\x3a\x31\45\x3b\x77\151\144\x74\x68\72\61\60\x30\x70\x78\x3b\x62\x61\x63\153\x67\x72\x6f\x75\156\x64\72\x20\43\x30\60\x39\61\103\104\40\156\x6f\x6e\145\40\162\145\160\145\141\x74\x20\x73\143\x72\x6f\x6c\154\x20\x30\x25\x20\x30\x25\x3b\x63\165\x72\x73\157\162\72\40\160\x6f\x69\x6e\164\x65\x72\73\x66\157\x6e\164\x2d\x73\151\172\145\72\61\65\x70\170\x3b\142\x6f\162\144\145\162\x2d\167\151\144\x74\x68\72\40\61\x70\170\73\142\x6f\162\x64\145\162\x2d\x73\164\171\x6c\x65\x3a\40\163\157\x6c\x69\144\73\x62\x6f\162\144\145\x72\x2d\x72\x61\144\x69\165\163\72\x20\x33\x70\170\73\167\150\151\x74\x65\55\x73\x70\141\x63\x65\x3a\40\x6e\157\167\162\141\160\x3b\x62\157\x78\x2d\x73\151\x7a\x69\156\147\72\40\142\x6f\162\x64\x65\162\x2d\142\157\x78\73\142\157\162\x64\x65\x72\55\143\x6f\x6c\x6f\162\72\x20\43\x30\60\x37\x33\101\x41\73\x62\157\170\x2d\163\x68\141\144\x6f\167\72\x20\x30\x70\170\40\x31\x70\x78\40\60\160\170\x20\162\x67\142\x61\50\61\62\x30\54\40\x32\x30\x30\54\x20\62\63\x30\54\x20\60\x2e\x36\x29\x20\x69\156\x73\x65\164\x3b\x63\x6f\154\157\x72\x3a\40\x23\x46\x46\x46\73\42\40\x3e\103\157\160\x79\x3c\57\142\x75\164\x74\x6f\156\x3e\xa\11\11\x9\46\156\x62\163\x70\x3b\12\40\40\x20\x20\x20\x20\x20\x20\40\x20\40\40\x20\x20\40\74\x69\x6e\160\165\x74\40\151\144\x3d\42\x64\x77\156\55\x62\164\x6e\x22\x20\x73\164\x79\154\145\75\x22\x70\141\x64\x64\x69\156\x67\x3a\61\x25\x3b\167\x69\x64\x74\x68\x3a\61\x30\60\x70\x78\x3b\x62\141\143\x6b\x67\162\157\165\x6e\144\72\40\x23\60\60\x39\x31\x43\x44\x20\156\157\156\x65\x20\162\145\160\x65\x61\x74\x20\163\143\x72\x6f\x6c\154\40\60\x25\40\60\x25\73\x63\165\x72\163\x6f\162\72\x20\160\157\151\x6e\x74\145\162\73\146\157\x6e\164\55\x73\151\172\145\x3a\x31\65\x70\170\73\x62\157\x72\144\x65\x72\55\167\151\144\164\x68\x3a\40\x31\x70\170\73\142\157\x72\144\x65\x72\55\x73\164\171\x6c\145\72\40\x73\x6f\x6c\151\x64\73\x62\x6f\x72\144\145\162\x2d\x72\141\144\x69\165\163\x3a\x20\x33\x70\x78\x3b\167\x68\x69\x74\145\x2d\x73\x70\141\143\145\72\x20\156\157\x77\x72\141\x70\x3b\142\x6f\x78\x2d\163\151\x7a\x69\156\147\72\40\x62\x6f\162\x64\x65\x72\x2d\142\157\170\73\x62\x6f\162\144\x65\x72\55\x63\x6f\x6c\x6f\x72\72\x20\43\60\60\x37\x33\101\x41\x3b\x62\157\x78\x2d\163\x68\x61\144\x6f\x77\72\40\60\160\x78\x20\x31\x70\x78\x20\60\160\170\x20\x72\x67\142\x61\x28\61\62\60\54\x20\x32\60\60\x2c\40\62\63\x30\54\x20\60\56\x36\x29\40\x69\x6e\163\x65\x74\x3b\x63\157\x6c\x6f\162\x3a\40\43\x46\106\x46\x3b\x22\x74\171\160\145\75\42\142\165\x74\164\x6f\x6e\x22\40\166\x61\x6c\x75\145\75\x22\104\157\167\156\x6c\x6f\x61\x64\42\40\12\x20\x20\40\40\40\x20\x20\40\x20\x20\x20\40\40\40\40\42\x3e\xa\x9\11\x9\x3c\57\144\x69\x76\x3e\12\x9\11\x9\74\57\x64\x69\166\x3e\xa\11\x9\x9\12\11\x9\xa\x9\11\x9";
    ob_end_flush();
    echo "\xa\11\x3c\x73\143\x72\151\x70\x74\x3e\12\12\40\40\40\x20\40\40\40\40\146\165\x6e\143\x74\151\157\x6e\x20\x63\x6f\x70\171\x44\151\166\x54\x6f\103\154\151\160\x62\x6f\x61\162\144\x28\x29\40\x7b\xa\40\40\x20\x20\x20\x20\40\x20\x20\40\40\x20\x76\x61\162\40\x61\x75\x78\40\x3d\40\x64\x6f\143\165\x6d\x65\x6e\x74\56\143\x72\145\141\164\145\105\154\145\x6d\x65\x6e\x74\50\42\x69\156\160\165\x74\42\51\x3b\12\x20\40\x20\40\40\40\40\40\x20\x20\40\x20\x61\165\x78\56\x73\145\x74\101\164\x74\162\x69\x62\x75\164\145\50\42\x76\141\x6c\165\x65\42\54\x20\144\x6f\143\165\155\145\156\164\56\147\x65\164\105\x6c\x65\x6d\x65\x6e\164\x42\x79\111\x64\x28\x22\123\101\x4d\114\137\x64\x69\163\x70\154\x61\x79\42\51\x2e\x74\145\170\x74\x43\x6f\x6e\x74\145\156\x74\51\73\12\40\x20\x20\40\40\x20\x20\x20\x20\40\40\x20\x64\x6f\x63\165\155\x65\x6e\x74\x2e\x62\157\x64\x79\x2e\141\160\x70\145\156\144\103\150\151\x6c\144\50\141\165\170\x29\x3b\xa\x20\x20\x20\40\x20\40\x20\x20\40\x20\40\40\x61\165\170\56\163\145\x6c\145\x63\164\50\x29\73\12\40\40\40\40\x20\x20\40\40\x20\x20\40\x20\x64\157\x63\165\x6d\x65\156\x74\x2e\145\170\145\x63\103\157\155\x6d\141\x6e\x64\50\42\x63\157\160\171\42\51\x3b\12\x20\40\40\x20\x20\x20\40\x20\x20\40\x20\40\x64\157\x63\165\x6d\x65\x6e\164\x2e\x62\x6f\144\x79\x2e\x72\145\155\157\x76\145\x43\x68\x69\x6c\144\50\x61\165\x78\51\x3b\xa\40\x20\40\40\40\40\40\40\40\x20\40\x20\x64\x6f\143\x75\155\x65\156\x74\56\147\x65\x74\x45\154\145\x6d\145\156\164\102\171\111\144\x28\47\x63\x6f\x70\x79\x27\x29\x2e\x74\145\170\x74\103\x6f\156\x74\145\x6e\164\x20\75\x20\x22\x43\157\160\x69\x65\144\42\73\12\40\x20\x20\40\x20\40\x20\x20\x20\40\40\x20\144\x6f\143\165\x6d\x65\156\x74\56\x67\x65\164\x45\154\145\155\x65\156\164\x42\171\x49\144\50\47\143\x6f\160\171\47\51\x2e\x73\164\171\154\x65\56\142\141\143\153\x67\x72\157\165\156\x64\40\x3d\x20\x22\x67\162\x65\x79\x22\x3b\12\x20\40\40\x20\x20\x20\40\x20\40\40\x20\x20\167\151\156\144\x6f\x77\56\x67\x65\164\123\x65\x6c\x65\143\x74\151\x6f\156\50\51\56\163\145\154\145\x63\x74\101\154\154\x43\150\x69\154\144\x72\145\156\50\40\x64\x6f\x63\x75\x6d\x65\156\164\x2e\x67\x65\x74\105\154\x65\x6d\x65\156\x74\102\x79\111\144\x28\40\x22\x53\101\115\x4c\x5f\144\x69\163\x70\x6c\141\x79\42\x20\x29\40\x29\x3b\12\12\x20\40\x20\40\40\40\x20\x20\175\xa\12\40\40\x20\x20\x20\x20\x20\x20\146\x75\x6e\x63\164\x69\157\156\x20\144\x6f\x77\156\x6c\x6f\141\x64\50\x66\151\154\145\156\x61\x6d\145\54\40\x74\145\170\x74\x29\40\x7b\xa\40\40\40\40\40\x20\x20\40\40\40\x20\x20\x76\x61\x72\40\145\x6c\x65\155\x65\x6e\164\x20\75\x20\x64\157\143\165\155\145\x6e\x74\56\x63\162\x65\141\164\145\105\x6c\x65\155\145\x6e\164\50\47\141\47\x29\73\12\40\x20\x20\40\40\x20\x20\40\x20\x20\x20\40\145\x6c\x65\x6d\x65\x6e\164\x2e\x73\x65\164\101\x74\164\162\x69\142\165\x74\145\50\47\x68\x72\145\146\47\54\x20\47\144\x61\x74\141\72\x41\x70\x70\154\151\143\141\x74\x69\x6f\x6e\57\x6f\143\164\x65\x74\x2d\x73\164\162\145\x61\x6d\x3b\143\x68\x61\x72\x73\x65\x74\x3d\x75\x74\146\x2d\70\x2c\47\x20\53\x20\145\156\x63\157\144\x65\125\122\111\103\x6f\x6d\160\157\156\145\x6e\164\x28\164\145\170\164\x29\x29\x3b\xa\40\x20\40\x20\x20\40\40\40\x20\x20\40\40\145\154\145\x6d\x65\156\x74\56\163\145\x74\101\x74\164\162\151\x62\165\164\145\50\47\x64\157\x77\x6e\x6c\x6f\x61\144\x27\x2c\40\146\151\154\x65\x6e\141\x6d\x65\x29\x3b\xa\xa\x20\40\40\40\x20\x20\40\x20\x20\40\x20\x20\145\154\x65\x6d\x65\156\164\x2e\163\x74\x79\x6c\145\56\x64\151\x73\160\154\x61\x79\40\75\x20\47\156\157\x6e\145\x27\x3b\12\x20\40\x20\40\x20\x20\x20\40\x20\40\x20\40\x64\x6f\143\x75\x6d\145\x6e\164\x2e\142\x6f\x64\x79\x2e\141\x70\160\x65\x6e\144\x43\150\x69\154\x64\x28\x65\x6c\145\155\x65\156\164\51\x3b\12\xa\x20\40\40\x20\x20\40\x20\x20\x20\40\x20\40\x65\154\145\155\145\156\x74\x2e\143\x6c\x69\x63\153\50\x29\x3b\12\xa\x20\x20\x20\x20\40\x20\40\40\x20\x20\x20\40\x64\157\143\x75\x6d\145\x6e\x74\56\142\x6f\x64\171\x2e\x72\145\x6d\x6f\x76\145\103\x68\x69\154\x64\50\145\x6c\x65\x6d\x65\x6e\x74\51\x3b\12\x20\x20\x20\40\40\x20\x20\x20\x7d\12\xa\40\x20\x20\x20\x20\x20\40\40\x64\x6f\143\x75\155\x65\x6e\x74\x2e\x67\145\x74\105\154\x65\155\x65\x6e\164\102\171\x49\x64\50\x22\x64\167\156\x2d\142\x74\x6e\42\x29\x2e\x61\144\144\x45\x76\145\x6e\x74\114\x69\x73\164\x65\156\x65\x72\50\x22\x63\154\x69\143\153\42\x2c\x20\146\165\156\143\x74\x69\x6f\x6e\x20\50\51\x20\x7b\xa\12\40\x20\40\x20\40\x20\x20\x20\x20\40\40\x20\166\141\x72\x20\146\x69\154\x65\x6e\141\155\145\40\x3d\40\x64\157\x63\165\155\x65\156\164\x2e\147\x65\164\x45\x6c\145\x6d\145\156\164\102\171\111\144\50\42\x53\x41\x4d\114\137\x74\171\x70\x65\42\51\x2e\164\145\170\x74\x43\157\156\164\x65\156\164\53\42\x2e\x78\155\154\42\73\12\x20\x20\40\x20\x20\x20\40\x20\x20\x20\x20\40\166\141\x72\x20\156\x6f\144\145\x20\75\x20\x64\157\x63\x75\155\145\x6e\x74\x2e\147\145\164\105\x6c\145\155\145\156\164\102\x79\111\x64\x28\42\123\x41\x4d\114\x5f\144\151\x73\160\154\141\171\x22\x29\73\12\40\x20\40\40\x20\x20\x20\40\40\x20\40\40\150\x74\x6d\x6c\x43\x6f\156\164\x65\156\x74\40\x3d\40\x6e\x6f\x64\x65\x2e\x69\156\156\x65\162\110\124\115\x4c\x3b\12\40\x20\40\x20\x20\x20\40\x20\40\x20\40\40\x74\145\170\164\x20\75\x20\156\x6f\144\x65\56\164\x65\x78\x74\103\157\x6e\x74\x65\156\164\x3b\12\40\x20\x20\x20\x20\40\40\40\x20\40\40\40\143\x6f\156\x73\157\x6c\x65\x2e\154\157\x67\x28\164\145\x78\x74\x29\x3b\xa\x20\x20\x20\x20\x20\40\40\40\40\40\x20\40\144\157\x77\156\x6c\157\141\x64\50\146\151\154\x65\x6e\141\155\145\54\40\x74\x65\170\164\51\73\xa\40\40\40\x20\x20\40\40\x20\x7d\54\40\146\141\154\x73\x65\x29\x3b\12\12\xa\xa\xa\xa\x20\x20\x20\40\74\57\163\143\x72\x69\x70\x74\x3e\12";
    exit;
}
function mo_saml_checkMapping($Bu, $tr, $VU)
{
    try {
        $Ym = get_option("\x73\141\155\154\137\141\x6d\x5f\145\155\141\151\x6c");
        $uw = get_option("\163\141\155\154\x5f\141\155\137\x75\x73\145\x72\156\141\x6d\145");
        $mY = get_option("\163\141\155\x6c\137\x61\155\137\x66\151\162\x73\x74\137\156\141\155\x65");
        $RP = get_option("\x73\141\155\x6c\137\141\x6d\137\154\141\163\164\137\x6e\141\155\145");
        $Mh = get_option("\x73\x61\x6d\154\137\141\x6d\137\x67\x72\x6f\x75\160\137\x6e\x61\155\145");
        $jf = get_option("\163\x61\155\154\x5f\141\155\137\144\145\x66\x61\165\x6c\x74\137\165\x73\x65\x72\x5f\162\x6f\x6c\x65");
        $iU = get_option("\x73\141\x6d\x6c\137\141\x6d\x5f\144\157\156\164\x5f\141\x6c\x6c\157\x77\x5f\x75\156\x6c\151\163\x74\145\x64\x5f\x75\x73\x65\x72\x5f\162\x6f\x6c\145");
        $Gh = get_option("\x73\141\x6d\x6c\x5f\x61\155\x5f\x61\143\143\x6f\165\x6e\x74\137\155\x61\x74\x63\x68\x65\162");
        $Wq = '';
        $ZB = '';
        if (empty($Bu)) {
            goto A7;
        }
        if (!empty($Bu[$mY])) {
            goto ah;
        }
        $mY = '';
        goto Ea;
        ah:
        $mY = $Bu[$mY][0];
        Ea:
        if (!empty($Bu[$RP])) {
            goto Dd;
        }
        $RP = '';
        goto eb;
        Dd:
        $RP = $Bu[$RP][0];
        eb:
        if (!empty($Bu[$uw])) {
            goto fq;
        }
        $ZB = $Bu["\116\x61\x6d\x65\x49\x44"][0];
        goto gS;
        fq:
        $ZB = $Bu[$uw][0];
        gS:
        if (!empty($Bu[$Ym])) {
            goto dY;
        }
        $Wq = $Bu["\x4e\141\x6d\x65\x49\104"][0];
        goto NN;
        dY:
        $Wq = $Bu[$Ym][0];
        NN:
        if (!empty($Bu[$Mh])) {
            goto fC;
        }
        $Mh = array();
        goto hA;
        fC:
        $Mh = $Bu[$Mh];
        hA:
        if (!empty($Gh)) {
            goto ut;
        }
        $Gh = "\x65\x6d\x61\151\154";
        ut:
        A7:
        if ($tr == "\164\145\163\164\126\x61\154\x69\144\141\x74\x65") {
            goto ee;
        }
        if ($tr == "\164\145\x73\x74\x4e\145\x77\x43\145\162\164\151\x66\151\143\141\x74\145") {
            goto nN;
        }
        mo_saml_login_user($Wq, $mY, $RP, $ZB, $Mh, $iU, $jf, $tr, $Gh, $VU, $Bu["\x4e\141\155\145\x49\104"][0], $Bu);
        goto z3;
        ee:
        update_option("\155\x6f\137\163\x61\155\154\x5f\164\x65\163\x74", "\x54\145\163\164\x20\x73\165\x63\x63\x65\163\x73\146\165\154");
        mo_saml_show_test_result($mY, $RP, $Wq, $Mh, $Bu, $tr);
        goto z3;
        nN:
        update_option("\155\x6f\137\163\x61\155\154\x5f\164\145\x73\164\x5f\156\145\167\x5f\x63\x65\x72\164", "\124\x65\163\164\x20\163\x75\x63\143\145\x73\x73\x66\x75\x6c");
        mo_saml_show_test_result($mY, $RP, $Wq, $Mh, $Bu, $tr);
        z3:
    } catch (Exception $qc) {
        echo sprintf("\x41\x6e\x20\x65\162\162\x6f\x72\40\157\143\143\165\162\162\x65\x64\x20\x77\150\151\x6c\145\x20\160\x72\157\143\145\163\163\151\156\147\40\x74\x68\145\x20\x53\101\115\114\40\122\145\x73\x70\x6f\156\x73\x65\x2e");
        exit;
    }
}
function mo_saml_show_test_result($mY, $RP, $Wq, $Mh, $Bu, $tr)
{
    echo "\74\144\151\x76\x20\163\x74\171\x6c\145\75\x22\146\157\x6e\x74\55\146\x61\155\151\154\171\72\103\x61\154\151\x62\162\x69\x3b\x70\x61\144\144\x69\x6e\147\x3a\60\x20\63\x25\x3b\x22\76";
    if (!empty($Wq)) {
        goto BJ;
    }
    echo "\x3c\144\151\166\x20\163\x74\x79\154\145\x3d\x22\x63\x6f\x6c\157\162\x3a\x20\x23\141\71\64\64\64\62\73\x62\x61\143\x6b\x67\162\157\x75\x6e\x64\x2d\x63\157\x6c\x6f\162\x3a\40\x23\146\x32\x64\x65\x64\145\73\160\x61\144\144\151\x6e\x67\x3a\40\61\x35\160\x78\73\x6d\141\162\147\x69\x6e\55\x62\157\164\164\x6f\x6d\72\40\x32\x30\x70\170\73\x74\x65\170\164\55\x61\154\x69\147\x6e\x3a\143\145\156\x74\x65\162\73\x62\x6f\x72\144\145\x72\x3a\x31\160\170\x20\x73\x6f\154\x69\144\40\x23\105\x36\102\x33\102\62\73\146\157\x6e\x74\x2d\x73\x69\172\x65\72\x31\70\160\x74\73\x22\x3e\124\105\x53\124\40\106\x41\111\114\105\104\x3c\x2f\144\x69\166\x3e\12\x9\11\x9\x9\x3c\144\151\x76\x20\163\x74\x79\154\x65\75\42\x63\x6f\154\157\x72\x3a\40\x23\141\71\64\64\x34\62\x3b\146\x6f\x6e\x74\55\163\151\x7a\x65\72\61\x34\160\x74\73\40\155\141\162\147\151\156\x2d\x62\x6f\x74\x74\x6f\155\72\62\60\x70\170\x3b\42\76\127\x41\x52\x4e\x49\116\x47\x3a\40\x53\x6f\x6d\145\x20\101\x74\x74\x72\x69\x62\165\x74\x65\163\40\104\151\144\40\116\x6f\x74\x20\115\x61\164\x63\150\x2e\74\57\x64\151\x76\x3e\12\x9\x9\x9\11\x3c\x64\x69\166\40\x73\164\171\154\x65\x3d\x22\144\x69\163\160\154\141\171\x3a\x62\154\157\143\153\x3b\164\x65\170\164\55\x61\154\151\147\156\x3a\x63\x65\156\x74\145\162\x3b\x6d\x61\162\147\x69\156\55\x62\x6f\x74\164\157\155\72\64\45\73\x22\76\74\x69\x6d\147\x20\x73\x74\x79\154\x65\75\x22\167\x69\144\x74\x68\72\61\65\x25\73\42\163\x72\x63\75\42" . plugin_dir_url(__FILE__) . "\151\155\x61\x67\x65\163\57\167\x72\x6f\x6e\147\56\x70\156\x67\x22\x3e\x3c\57\x64\x69\x76\76";
    goto hU;
    BJ:
    update_option("\x6d\x6f\137\163\141\155\x6c\x5f\164\x65\x73\x74\137\143\157\x6e\x66\151\x67\137\141\x74\x74\162\x73", $Bu);
    echo "\74\x64\151\x76\x20\163\164\x79\154\145\75\x22\143\157\154\x6f\x72\72\x20\43\x33\x63\x37\66\63\x64\73\xa\x9\11\x9\11\142\x61\x63\x6b\147\162\x6f\x75\x6e\144\x2d\x63\x6f\154\157\162\x3a\40\x23\144\146\146\x30\144\70\x3b\x20\x70\141\x64\x64\x69\x6e\x67\72\x32\45\x3b\x6d\x61\162\147\x69\x6e\55\142\x6f\x74\164\157\155\x3a\x32\x30\160\x78\73\x74\145\x78\x74\55\141\154\x69\x67\x6e\x3a\143\x65\156\x74\x65\162\x3b\x20\x62\157\x72\x64\145\x72\72\x31\x70\x78\40\163\157\x6c\151\x64\x20\43\101\x45\104\x42\71\x41\x3b\x20\146\x6f\156\164\55\163\x69\172\x65\72\61\x38\160\x74\73\42\x3e\124\x45\123\x54\40\x53\x55\103\x43\105\123\x53\x46\x55\x4c\x3c\57\x64\151\166\76\12\11\11\x9\x9\74\144\151\x76\40\163\x74\171\154\x65\x3d\42\144\151\x73\x70\x6c\x61\171\x3a\142\x6c\x6f\143\153\73\x74\x65\170\164\x2d\x61\x6c\151\147\156\72\143\x65\156\164\145\162\x3b\x6d\x61\162\x67\x69\156\55\x62\157\164\164\x6f\x6d\72\x34\x25\73\x22\76\x3c\x69\x6d\147\x20\163\164\171\x6c\145\x3d\x22\x77\151\144\x74\150\x3a\x31\x35\x25\x3b\x22\163\x72\x63\x3d\x22" . plugin_dir_url(__FILE__) . "\151\x6d\x61\147\145\163\x2f\x67\162\145\x65\156\137\143\150\x65\x63\153\56\x70\156\x67\x22\76\x3c\57\144\151\166\x3e";
    hU:
    $fr = get_option("\x6d\x6f\137\x73\x61\155\x6c\x5f\145\156\x61\x62\154\145\x5f\x64\x6f\155\x61\x69\156\x5f\162\145\x73\x74\162\151\143\164\151\157\156\137\x6c\x6f\147\151\x6e");
    $an = $tr == "\x74\145\x73\x74\116\x65\x77\103\145\x72\x74\151\146\151\143\141\164\145" ? "\144\x69\163\x70\x6c\141\x79\x3a\156\157\156\x65" : '';
    if (!$fr) {
        goto hG;
    }
    $tu = get_option("\x6d\157\137\163\141\155\x6c\x5f\141\x6c\x6c\157\x77\x5f\144\145\x6e\x79\137\165\163\x65\x72\x5f\167\151\x74\150\137\144\x6f\x6d\141\x69\x6e");
    if (!empty($tu) && $tu == "\144\x65\156\x79") {
        goto RS;
    }
    $k8 = get_option("\163\x61\x6d\x6c\137\x61\155\137\145\x6d\x61\151\154\137\x64\x6f\155\141\x69\x6e\163");
    $zS = explode("\73", $k8);
    $xb = explode("\100", $Wq);
    $pS = !empty($xb[1]) ? $xb[1] : '';
    if (in_array($pS, $zS)) {
        goto Gy;
    }
    echo "\74\160\x20\x73\164\171\x6c\145\x3d\42\x63\x6f\x6c\x6f\162\72\162\145\x64\x3b\42\x3e\x54\150\151\163\40\165\163\145\x72\40\167\x69\x6c\x6c\x20\x6e\157\164\x20\142\145\40\141\154\x6c\157\167\x65\144\x20\x74\x6f\40\x6c\157\147\x69\x6e\40\141\x73\x20\164\150\x65\40\x64\x6f\155\141\x69\x6e\x20\x6f\146\x20\x74\150\145\40\x65\155\x61\x69\x6c\40\x69\x73\40\x6e\157\164\40\151\x6e\143\154\165\x64\145\x64\x20\x69\156\x20\164\150\145\40\x61\154\x6c\157\x77\145\x64\x20\154\x69\163\164\40\157\146\40\104\157\x6d\x61\x69\x6e\x20\122\x65\x73\164\x72\151\x63\164\x69\x6f\156\x2e\x3c\x2f\x70\x3e";
    Gy:
    goto oD;
    RS:
    $k8 = get_option("\x73\141\x6d\154\x5f\141\155\137\145\155\x61\x69\154\x5f\x64\157\155\141\x69\x6e\163");
    $zS = explode("\x3b", $k8);
    $xb = explode("\x40", $Wq);
    $pS = !empty($xb[1]) ? $xb[1] : '';
    if (!in_array($pS, $zS)) {
        goto n4;
    }
    echo "\x3c\x70\x20\x73\x74\171\x6c\x65\75\x22\143\x6f\x6c\157\x72\72\x72\x65\x64\73\x22\x3e\124\150\151\x73\40\165\163\145\162\x20\167\151\154\x6c\40\156\157\x74\40\142\145\40\141\154\x6c\157\167\x65\x64\40\x74\x6f\40\x6c\x6f\x67\x69\x6e\x20\141\x73\x20\164\150\145\40\144\x6f\155\141\x69\x6e\x20\x6f\x66\40\164\150\145\40\x65\155\x61\151\154\40\x69\x73\40\151\x6e\x63\x6c\x75\144\x65\x64\40\x69\x6e\x20\x74\150\x65\40\144\x65\x6e\151\145\x64\40\x6c\151\163\164\x20\157\x66\x20\104\x6f\x6d\141\x69\x6e\x20\x52\x65\x73\x74\162\151\143\164\x69\157\x6e\x2e\x3c\57\x70\x3e";
    n4:
    oD:
    hG:
    $BD = get_option("\163\141\x6d\154\x5f\141\x6d\x5f\165\163\145\x72\x6e\x61\155\x65");
    if (empty($Bu[$BD])) {
        goto g2;
    }
    $Fq = $Bu[$BD][0];
    if (!(strlen($Fq) > 60)) {
        goto c5;
    }
    echo "\x3c\160\40\163\x74\x79\x6c\145\x3d\x22\x63\x6f\x6c\x6f\x72\72\x72\x65\144\x3b\42\76\116\x4f\124\105\40\72\x20\124\150\151\163\x20\165\163\x65\x72\40\x77\x69\154\154\x20\x6e\157\164\40\142\145\40\x61\142\x6c\x65\x20\164\157\40\x6c\157\147\151\156\40\141\x73\40\x74\150\145\40\x75\163\145\162\x6e\141\x6d\x65\x20\x76\x61\154\x75\x65\x20\x69\163\40\x6d\x6f\162\x65\x20\164\x68\x61\156\x20\66\60\x20\x63\x68\141\x72\x61\143\164\x65\162\x73\40\x6c\157\x6e\147\56\74\142\162\x2f\76\12\x9\x9\11\x50\x6c\x65\x61\x73\145\x20\164\162\x79\40\143\x68\141\x6e\x67\x69\156\x67\40\x74\x68\145\40\x6d\141\x70\160\151\x6e\147\40\x6f\146\x20\x55\163\145\162\x6e\141\155\145\x20\146\x69\x65\x6c\x64\x20\151\156\40\x3c\141\x20\x68\162\145\146\75\42\x23\x22\40\x6f\156\103\x6c\x69\143\x6b\75\x22\x63\x6c\157\x73\145\x5f\x61\x6e\144\137\162\x65\x64\x69\x72\x65\x63\x74\50\51\73\42\x3e\x41\164\x74\162\x69\142\165\164\145\57\122\x6f\154\x65\x20\x4d\x61\160\160\151\x6e\x67\x3c\57\x61\x3e\x20\164\x61\142\56\74\x2f\x70\x3e";
    c5:
    g2:
    echo "\74\163\160\x61\x6e\x20\163\x74\171\154\145\x3d\x22\146\x6f\x6e\x74\x2d\163\x69\172\x65\72\x31\x34\x70\x74\x3b\42\76\x3c\x62\76\110\145\154\154\157\x3c\57\142\76\54\40" . $Wq . "\x3c\57\163\160\x61\156\76\74\142\162\x2f\76\74\160\x20\163\164\171\154\145\75\42\146\x6f\x6e\x74\x2d\167\145\x69\147\150\164\72\x62\157\x6c\x64\73\x66\x6f\x6e\164\55\163\x69\x7a\145\x3a\61\64\x70\164\x3b\155\141\x72\x67\151\x6e\55\154\x65\x66\x74\x3a\x31\45\73\42\76\101\x54\x54\x52\111\102\x55\x54\105\123\40\x52\x45\x43\105\111\126\x45\104\x3a\74\x2f\160\76\xa\x9\x9\11\x9\x3c\164\x61\142\x6c\145\40\x73\164\x79\154\x65\75\42\x62\x6f\x72\x64\x65\162\x2d\143\x6f\154\x6c\141\x70\x73\145\72\x63\157\x6c\154\x61\x70\x73\x65\73\142\157\162\x64\x65\x72\x2d\163\160\x61\x63\x69\x6e\147\72\60\73\x20\144\x69\x73\x70\154\141\x79\x3a\x74\x61\x62\x6c\145\x3b\167\151\144\x74\x68\x3a\61\x30\60\x25\73\x20\x66\x6f\156\x74\55\163\x69\172\x65\72\x31\64\x70\164\x3b\x62\141\x63\153\147\162\x6f\165\x6e\x64\55\x63\157\154\157\162\x3a\x23\105\x44\105\104\105\104\x3b\42\x3e\12\x9\11\x9\11\74\164\x72\x20\163\x74\x79\154\x65\75\x22\x74\x65\x78\x74\55\x61\154\x69\x67\156\72\143\145\x6e\164\x65\162\73\x22\x3e\x3c\x74\x64\x20\x73\164\171\154\x65\x3d\42\x66\157\x6e\x74\x2d\x77\x65\151\147\x68\164\72\x62\157\154\144\x3b\142\x6f\162\144\x65\162\x3a\62\x70\x78\40\x73\x6f\154\151\144\x20\43\x39\x34\71\x30\71\x30\x3b\160\141\x64\x64\151\156\147\x3a\x32\x25\x3b\x22\x3e\101\124\124\x52\111\x42\x55\124\105\40\x4e\101\115\105\74\57\x74\x64\76\x3c\164\x64\x20\163\x74\171\154\x65\x3d\42\146\157\156\164\x2d\x77\145\x69\x67\x68\164\72\x62\x6f\154\144\73\x70\x61\144\x64\151\x6e\147\72\62\x25\x3b\142\x6f\162\144\x65\x72\72\x32\160\x78\40\x73\x6f\x6c\x69\x64\40\x23\x39\64\71\x30\71\x30\x3b\x20\x77\x6f\162\144\55\167\x72\x61\x70\x3a\142\162\145\141\x6b\55\x77\157\162\144\73\x22\x3e\x41\x54\x54\122\x49\x42\125\x54\105\x20\126\101\114\x55\x45\74\57\x74\144\76\74\x2f\164\162\x3e";
    if (!empty($Bu)) {
        goto qc;
    }
    echo "\x4e\157\40\101\x74\x74\x72\151\x62\165\164\145\x73\x20\x52\x65\143\x65\x69\166\145\144\56";
    goto U7;
    qc:
    foreach ($Bu as $WO => $cK) {
        echo "\x3c\164\162\x3e\x3c\164\144\40\x73\x74\x79\154\x65\75\x27\x66\x6f\156\164\x2d\167\x65\x69\147\x68\164\72\x62\x6f\x6c\x64\73\x62\x6f\162\x64\145\162\72\62\160\x78\40\163\157\154\x69\144\40\x23\x39\x34\x39\60\71\x30\73\x70\141\144\144\151\x6e\147\72\x32\45\x3b\47\76" . $WO . "\x3c\x2f\x74\144\x3e\74\164\144\40\x73\x74\171\x6c\x65\75\47\x70\x61\x64\144\x69\x6e\x67\x3a\x32\45\73\x62\x6f\x72\144\145\x72\72\62\160\x78\40\x73\x6f\x6c\x69\x64\40\x23\71\64\x39\60\71\60\x3b\x20\x77\157\162\x64\x2d\167\x72\x61\x70\x3a\x62\x72\x65\x61\153\55\167\157\x72\144\x3b\x27\x3e" . implode("\74\x68\x72\x2f\76", $cK) . "\74\57\x74\144\x3e\74\57\x74\x72\76";
        PP:
    }
    de:
    U7:
    echo "\x3c\x2f\x74\x61\x62\154\145\x3e\74\57\x64\151\x76\x3e";
    echo "\74\x64\151\x76\40\x73\x74\x79\x6c\145\75\x22\x6d\x61\162\x67\x69\156\x3a\63\x25\x3b\x64\151\163\x70\154\141\171\x3a\x62\154\157\x63\x6b\x3b\x74\145\x78\164\x2d\141\154\x69\147\x6e\72\143\145\x6e\164\145\162\x3b\x22\76\xa\x9\11\74\x69\156\160\x75\164\x20\x73\164\171\x6c\x65\x3d\x22\160\x61\x64\x64\151\156\x67\72\x31\45\x3b\167\x69\x64\x74\x68\72\62\x35\60\x70\170\x3b\142\141\143\153\x67\x72\157\165\x6e\144\x3a\40\43\x30\60\x39\x31\x43\x44\40\156\157\x6e\x65\40\162\x65\x70\x65\141\x74\40\163\x63\162\x6f\154\154\x20\x30\x25\40\x30\45\x3b\12\x9\x9\x63\x75\162\x73\157\162\x3a\40\x70\x6f\151\x6e\164\145\x72\x3b\x66\157\156\164\x2d\163\x69\x7a\x65\72\x31\x35\160\170\x3b\x62\x6f\162\x64\145\162\x2d\x77\151\144\x74\x68\72\40\x31\160\170\x3b\x62\x6f\x72\x64\145\162\55\163\x74\171\x6c\145\72\x20\163\157\x6c\x69\144\x3b\x62\157\162\x64\145\x72\55\x72\x61\144\x69\x75\x73\72\x20\63\x70\170\73\x77\x68\151\164\x65\x2d\x73\x70\x61\143\145\x3a\12\11\x9\x20\156\x6f\x77\x72\141\160\x3b\142\x6f\170\55\x73\151\x7a\151\156\x67\72\x20\142\157\162\x64\x65\162\55\142\x6f\x78\x3b\x62\x6f\162\144\145\162\55\143\x6f\x6c\157\x72\x3a\x20\43\60\60\x37\63\x41\x41\x3b\x62\157\x78\55\x73\x68\141\144\157\x77\72\x20\60\160\170\x20\x31\x70\x78\x20\60\x70\170\x20\x72\147\x62\141\50\61\62\x30\x2c\40\62\60\x30\x2c\40\x32\63\60\54\40\60\x2e\66\51\x20\x69\x6e\163\145\x74\73\x63\157\x6c\x6f\x72\72\x20\x23\x46\106\x46\x3b" . $an . "\x22\xa\40\x20\40\40\x20\40\x20\40\40\40\40\x20\164\x79\160\x65\75\x22\142\x75\x74\x74\x6f\156\x22\x20\166\141\154\x75\145\75\42\x43\157\x6e\x66\x69\147\x75\x72\x65\40\101\164\164\162\151\x62\165\164\x65\57\122\x6f\154\145\40\115\141\160\x70\151\x6e\x67\42\x20\x6f\156\x43\x6c\151\143\153\75\x22\143\x6c\157\163\145\x5f\x61\x6e\144\137\x72\x65\x64\x69\x72\x65\x63\x74\50\x29\x3b\x22\x3e\x20\x26\x6e\142\x73\160\x3b\40\xa\x20\40\x20\40\x20\40\x20\x20\40\x20\40\40\xa\11\11\74\x69\x6e\160\165\164\x20\x73\164\x79\154\145\75\42\x70\x61\144\x64\x69\156\147\x3a\x31\45\73\x77\x69\144\x74\x68\x3a\61\x30\60\x70\x78\73\x62\141\x63\153\147\x72\x6f\x75\156\x64\x3a\x20\43\x30\x30\x39\61\x43\104\x20\x6e\x6f\x6e\145\x20\162\145\160\145\141\164\40\x73\143\x72\x6f\x6c\x6c\40\x30\45\x20\x30\x25\73\x63\165\x72\x73\157\162\72\x20\160\157\x69\x6e\x74\x65\162\73\x66\157\156\164\x2d\x73\151\x7a\x65\72\61\65\x70\170\73\x62\x6f\x72\144\x65\x72\x2d\x77\151\x64\164\150\x3a\40\x31\x70\170\73\142\x6f\x72\x64\145\162\55\x73\x74\x79\154\145\72\40\163\x6f\x6c\x69\144\x3b\142\x6f\162\x64\x65\162\55\162\x61\144\x69\x75\163\72\40\63\160\170\73\167\x68\151\164\145\x2d\x73\x70\141\x63\145\x3a\x20\x6e\x6f\x77\162\x61\x70\73\x62\157\170\55\163\151\172\x69\156\147\x3a\x20\x62\157\x72\144\145\x72\x2d\x62\157\170\x3b\x62\x6f\162\144\x65\162\x2d\x63\x6f\x6c\x6f\x72\72\x20\43\60\x30\x37\x33\x41\101\73\x62\157\170\x2d\163\150\141\144\157\167\x3a\x20\60\x70\x78\40\61\160\x78\40\x30\160\170\40\x72\x67\142\141\x28\61\x32\x30\54\40\62\60\x30\x2c\x20\62\63\60\x2c\x20\x30\x2e\66\x29\x20\151\x6e\x73\145\x74\73\143\157\x6c\157\162\x3a\x20\43\x46\x46\106\x3b\x22\x74\x79\x70\x65\75\x22\142\165\164\164\x6f\x6e\x22\40\x76\x61\x6c\x75\145\75\x22\104\x6f\x6e\x65\42\x20\x6f\x6e\103\x6c\x69\x63\153\75\42\x73\x65\154\146\56\143\x6c\x6f\x73\145\50\51\73\x22\76\x3c\57\144\151\166\x3e\xa\x9\11\xa\x9\x9\x3c\x73\143\162\151\160\x74\x3e\xa\x20\40\x20\40\x20\x20\40\40\40\x20\x20\x20\x20\146\165\x6e\143\x74\151\157\156\x20\x63\154\x6f\163\145\137\141\156\x64\x5f\162\145\x64\151\x72\x65\x63\x74\x28\x29\x7b\12\x20\40\40\x20\x20\x20\40\x20\x20\x20\x20\x20\40\40\x20\x20\40\x77\x69\156\144\x6f\167\56\x6f\x70\x65\156\x65\162\x2e\162\145\x64\151\162\145\143\x74\137\x74\x6f\x5f\141\x74\x74\x72\151\142\x75\x74\x65\x5f\x6d\x61\x70\160\x69\x6e\x67\50\51\73\12\x20\x20\x20\40\x20\x20\40\40\40\40\40\40\x20\40\40\40\40\163\x65\x6c\x66\x2e\143\x6c\157\163\x65\50\51\x3b\xa\x20\x20\x20\x20\40\40\x20\40\x20\x20\x20\40\40\175\x20\x20\x20\xa\12\x9\11\x3c\x2f\x73\x63\x72\151\160\x74\76";
    exit;
}
function mo_saml_convert_to_windows_iconv($lx)
{
    $TR = LicenseHelper::getCurrentOption(mo_options_enum_service_provider::Is_encoding_enabled);
    if (!($TR === "\143\150\x65\143\153\x65\x64")) {
        goto XQ;
    }
    return iconv("\125\x54\106\x2d\70", "\103\120\61\x32\65\x32\x2f\x2f\x49\107\116\x4f\x52\105", $lx);
    XQ:
    return $lx;
}
function mo_saml_login_user($Wq, $mY, $RP, $ZB, $Mh, $iU, $jf, $tr, $Gh, $VU = '', $OJ = '', $Bu = null)
{
    do_action("\x6d\157\137\141\142\162\x5f\146\x69\154\164\x65\162\137\154\157\147\x69\x6e", $Bu, $OJ, $VU);
    check_if_user_allowed_to_login_due_to_role_restriction($Mh);
    $PG = get_option("\x6d\x6f\x5f\x73\x61\x6d\x6c\137\x73\x70\x5f\x62\141\163\x65\x5f\165\162\x6c");
    if (!empty($PG)) {
        goto ou;
    }
    $PG = home_url();
    ou:
    mo_saml_restrict_users_based_on_domain($Wq);
    $ZB = mo_saml_sanitize_username($ZB);
    if (!(strlen($ZB) > 60)) {
        goto Qv;
    }
    wp_die("\x57\x65\40\143\157\x75\x6c\x64\x20\x6e\x6f\x74\40\x73\x69\147\156\40\x79\157\165\40\x69\156\x2e\x20\120\x6c\145\141\163\145\x20\143\x6f\156\164\141\x63\x74\x20\171\157\x75\162\x20\x61\144\155\151\156\x69\163\164\x72\x61\x74\157\162\56", "\105\x72\x72\157\x72\40\72\40\x55\163\x65\162\x6e\141\155\x65\x20\154\145\156\x67\x74\150\40\x6c\151\155\x69\x74\40\162\145\141\143\x68\145\x64");
    exit;
    Qv:
    $xF = array("\151\x64\x70\x5f\x6e\141\155\145" => get_option("\163\141\155\x6c\x5f\x69\x64\145\x6e\164\x69\x74\x79\x5f\156\141\155\145"));
    $yT = get_option("\155\157\x5f\x61\x6c\154\x6f\167\137\x65\x78\x69\163\164\151\156\x67\x5f\x75\x73\145\x72\x5f\154\x6f\147\x69\x6e");
    if (username_exists($ZB) || email_exists($Wq)) {
        goto kc;
    }
    do_action("\x6d\157\137\x67\x75\x65\163\x74\x5f\154\x6f\x67\151\156", $OJ, $VU, $xF);
    $zl = get_option("\163\x61\x6d\154\137\x61\155\x5f\162\157\x6c\145\137\155\x61\x70\x70\151\x6e\147");
    $zl = maybe_unserialize($zl);
    $CK = true;
    $iM = get_option("\x6d\x6f\137\163\x61\x6d\x6c\x5f\x64\157\156\x74\137\143\162\145\141\164\x65\x5f\x75\163\x65\x72\x5f\151\146\137\x72\157\x6c\x65\x5f\156\x6f\x74\137\155\x61\160\160\x65\x64");
    if (!(!empty($iM) && strcmp($iM, "\x63\150\x65\x63\153\145\144") == 0)) {
        goto gZ;
    }
    $jp = is_role_mapping_configured_for_user($zl, $Mh);
    $CK = $jp;
    gZ:
    if ($CK === true) {
        goto oS;
    }
    $d4 = get_option("\155\x6f\x5f\x73\x61\155\x6c\137\141\x63\x63\x6f\x75\x6e\164\137\143\x72\145\x61\164\x69\x6f\x6e\137\x64\151\163\141\x62\154\x65\x64\x5f\155\x73\x67");
    if (!empty($d4)) {
        goto EE;
    }
    $d4 = "\x57\x65\40\x63\157\x75\154\144\x20\x6e\157\164\x20\x73\151\147\156\x20\171\x6f\165\40\x69\156\56\x20\120\x6c\x65\x61\163\x65\40\143\157\x6e\164\x61\143\x74\x20\171\x6f\165\162\40\x41\144\x6d\x69\156\x69\163\x74\x72\x61\164\x6f\162\x2e";
    EE:
    wp_die($d4, "\105\x72\162\x6f\x72\x3a\40\x4e\x6f\164\40\141\40\127\x6f\x72\x64\x50\x72\x65\163\163\x20\x4d\x65\x6d\142\x65\162");
    exit;
    goto Ko;
    oS:
    $RY = wp_generate_password(10, false);
    if (!empty($ZB)) {
        goto ci;
    }
    $tF = wp_create_user($Wq, $RY, $Wq);
    goto oI;
    ci:
    $tF = wp_create_user($ZB, $RY, $Wq);
    oI:
    if (!is_wp_error($tF)) {
        goto ed;
    }
    wp_die($tF->get_error_message() . "\x3c\x62\x72\76\120\x6c\145\141\x73\145\40\143\157\x6e\164\141\143\x74\40\171\x6f\165\162\x20\x41\x64\x6d\151\156\151\x73\x74\x72\141\x74\157\x72\x2e\x3c\142\162\76\74\142\76\x55\x73\x65\x72\x6e\141\155\x65\74\57\x62\x3e\x3a\40" . $Wq, "\105\x72\x72\x6f\162\72\40\103\157\x75\154\144\156\47\164\x20\x63\162\145\x61\x74\x65\40\x75\x73\145\162");
    ed:
    $user = get_user_by("\151\x64", $tF);
    $pq = assign_roles_to_user($user, $zl, $Mh);
    if ($pq !== true && !empty($iU) && $iU == "\143\150\x65\143\x6b\145\x64") {
        goto vt;
    }
    if ($pq !== true && !empty($jf)) {
        goto jR;
    }
    if ($pq !== true) {
        goto ir;
    }
    goto SN;
    vt:
    $gN = wp_update_user(array("\x49\104" => $tF, "\162\157\154\x65" => false));
    goto SN;
    jR:
    $gN = wp_update_user(array("\x49\104" => $tF, "\x72\157\x6c\x65" => $jf));
    goto SN;
    ir:
    $jf = get_option("\144\145\x66\141\165\x6c\x74\x5f\162\x6f\154\145");
    $gN = wp_update_user(array("\x49\104" => $tF, "\162\x6f\x6c\145" => $jf));
    SN:
    mo_saml_map_attributes($user, $mY, $RP, $Bu);
    mo_saml_set_auth_cookie($user, $VU, $OJ, true);
    do_action("\155\x6f\x5f\x73\x61\x6d\154\137\x61\164\x74\x72\x69\x62\x75\x74\145\163", $ZB, $Wq, $mY, $RP, $Mh);
    Ko:
    goto AC;
    kc:
    if (!($yT != "\x74\162\x75\x65")) {
        goto kz;
    }
    do_action("\x6d\157\x5f\x67\165\145\163\164\x5f\154\x6f\x67\151\x6e", $OJ, $VU, $xF);
    kz:
    if (username_exists($ZB)) {
        goto fO;
    }
    if (!email_exists($Wq)) {
        goto Zw;
    }
    $user = get_user_by("\x65\155\141\x69\x6c", $Wq);
    $tF = $user->ID;
    Zw:
    goto iS;
    fO:
    $user = get_user_by("\154\x6f\147\x69\x6e", $ZB);
    $tF = $user->ID;
    if (!(!empty($Wq) && is_email($Wq))) {
        goto NS;
    }
    $gN = wp_update_user(array("\x49\x44" => $tF, "\x75\x73\x65\x72\137\145\155\x61\151\x6c" => $Wq));
    NS:
    iS:
    mo_saml_map_attributes($user, $mY, $RP, $Bu);
    $zl = maybe_unserialize(get_option("\x73\141\x6d\x6c\137\141\155\137\162\x6f\154\x65\137\x6d\141\x70\x70\x69\x6e\x67"));
    $fX = get_option("\163\141\155\x6c\137\x61\x6d\x5f\x64\x6f\x6e\x74\137\x75\160\x64\x61\164\145\137\145\170\151\163\x74\151\156\x67\x5f\x75\x73\145\x72\137\162\x6f\154\145");
    if (!(empty($fX) || $fX != "\x63\x68\x65\143\153\145\x64")) {
        goto Ck;
    }
    $pq = assign_roles_to_user($user, $zl, $Mh);
    $rQ = get_option("\163\x61\155\x6c\x5f\141\155\137\x75\160\x64\141\x74\145\x5f\141\x64\155\151\156\x5f\165\x73\x65\162\x73\137\162\x6f\154\145");
    if ($pq !== true && !is_administrator_user($user) && !empty($iU) && $iU == "\143\x68\x65\143\x6b\x65\144") {
        goto dd;
    }
    if ($pq !== true && !is_administrator_user($user) && !empty($jf)) {
        goto St;
    }
    if ($pq !== true && is_administrator_user($user) && !empty($rQ) && $rQ == "\143\x68\145\x63\x6b\145\x64" && !empty($iU) && $iU == "\x63\x68\x65\x63\x6b\145\144") {
        goto wU;
    }
    if ($pq !== true && is_administrator_user($user) && !empty($rQ) && $rQ == "\143\150\145\x63\x6b\145\x64" && !empty($jf)) {
        goto XJ;
    }
    goto jp;
    dd:
    $gN = wp_update_user(array("\x49\104" => $tF, "\x72\x6f\154\x65" => false));
    goto jp;
    St:
    $gN = wp_update_user(array("\111\x44" => $tF, "\162\157\154\x65" => $jf));
    goto jp;
    wU:
    $gN = wp_update_user(array("\x49\x44" => $tF, "\162\x6f\x6c\145" => false));
    goto jp;
    XJ:
    $gN = wp_update_user(array("\x49\104" => $tF, "\x72\157\x6c\x65" => $jf));
    jp:
    Ck:
    mo_saml_set_auth_cookie($user, $VU, $OJ);
    do_action("\155\x6f\137\163\141\155\x6c\137\x61\x74\164\x72\x69\142\x75\164\145\163", $ZB, $Wq, $mY, $RP, $Mh);
    AC:
    mo_saml_post_login_redirection($tr, $PG);
}
function mo_saml_sanitize_username($ZB)
{
    $P0 = sanitize_user($ZB, true);
    $K3 = apply_filters("\x70\x72\145\137\165\x73\145\x72\137\154\x6f\147\151\x6e", $P0);
    $ZB = trim($K3);
    return $ZB;
}
function mo_saml_restrict_users_based_on_domain($Wq)
{
    $fr = get_option("\155\x6f\137\163\141\155\154\137\145\x6e\141\x62\154\145\137\144\x6f\x6d\x61\x69\x6e\137\x72\x65\163\x74\x72\x69\x63\x74\x69\x6f\x6e\x5f\154\157\x67\151\156");
    if (!$fr) {
        goto tP;
    }
    $k8 = get_option("\x73\x61\x6d\154\137\141\155\x5f\145\155\x61\151\x6c\x5f\x64\x6f\x6d\x61\151\x6e\163");
    $zS = explode("\73", $k8);
    $xb = explode("\100", $Wq);
    $pS = !empty($xb[1]) ? $xb[1] : '';
    $tu = get_option("\155\157\x5f\x73\141\155\x6c\137\x61\x6c\x6c\157\x77\137\144\145\x6e\x79\x5f\x75\163\145\162\x5f\167\x69\164\x68\137\144\157\x6d\141\x69\156");
    $d4 = get_option("\155\157\x5f\x73\141\x6d\154\x5f\x72\145\163\164\162\x69\x63\164\x65\144\137\144\157\x6d\x61\x69\x6e\x5f\x65\162\x72\157\x72\137\x6d\163\x67");
    if (!empty($d4)) {
        goto X_;
    }
    $d4 = "\x59\157\x75\40\141\x72\145\40\x6e\x6f\164\x20\141\x6c\x6c\157\x77\x65\x64\40\x74\x6f\40\154\x6f\x67\x69\156\56\x20\x50\x6c\x65\141\163\x65\40\x63\x6f\156\164\141\x63\164\40\x79\157\165\x72\x20\x41\x64\x6d\151\156\151\x73\164\162\x61\164\157\162\x2e";
    X_:
    if (!empty($tu) && $tu == "\x64\145\156\x79") {
        goto YS;
    }
    if (in_array($pS, $zS)) {
        goto Qa;
    }
    wp_die($d4, "\120\x65\x72\155\151\x73\x73\x69\157\156\x20\x44\x65\156\x69\145\x64\40\72\40\116\157\164\x20\x61\40\x57\150\151\164\145\x6c\151\x73\164\145\x64\x20\165\163\145\x72\56");
    Qa:
    goto Oc;
    YS:
    if (!in_array($pS, $zS)) {
        goto tX;
    }
    wp_die($d4, "\120\145\x72\155\x69\163\x73\x69\x6f\x6e\x20\104\145\156\x69\x65\144\x20\x3a\40\x42\x6c\x61\143\153\154\x69\x73\164\x65\x64\40\165\x73\145\162\x2e");
    tX:
    Oc:
    tP:
}
function mo_saml_map_attributes($user, $mY, $RP, $Bu)
{
    mo_saml_map_basic_attributes($user, $mY, $RP, $Bu);
    mo_saml_map_custom_attributes($user, $Bu);
}
function mo_saml_map_basic_attributes($user, $mY, $RP, $Bu)
{
    $tF = $user->ID;
    if (empty($mY)) {
        goto KA;
    }
    $gN = wp_update_user(array("\111\104" => $tF, "\146\151\x72\x73\x74\137\x6e\x61\155\145" => $mY));
    KA:
    if (empty($RP)) {
        goto TR;
    }
    $gN = wp_update_user(array("\111\x44" => $tF, "\x6c\141\163\x74\x5f\156\141\155\145" => $RP));
    TR:
    if (is_null($Bu)) {
        goto Fh;
    }
    update_user_meta($tF, "\155\x6f\x5f\163\141\x6d\154\137\165\163\145\162\137\141\164\164\162\x69\x62\165\164\145\163", $Bu);
    $lb = get_option("\163\x61\x6d\154\x5f\141\155\137\x64\x69\x73\160\x6c\x61\171\x5f\x6e\141\155\x65");
    if (empty($lb)) {
        goto JT;
    }
    if (strcmp($lb, "\125\x53\105\122\x4e\x41\115\x45") == 0) {
        goto BM;
    }
    if (strcmp($lb, "\x46\116\101\115\105") == 0 && !empty($mY)) {
        goto VZ;
    }
    if (strcmp($lb, "\x4c\116\x41\x4d\105") == 0 && !empty($RP)) {
        goto S1;
    }
    if (strcmp($lb, "\106\x4e\101\x4d\105\137\114\x4e\101\115\105") == 0 && !empty($RP) && !empty($mY)) {
        goto PV;
    }
    if (!(strcmp($lb, "\114\116\x41\115\x45\x5f\x46\x4e\101\115\x45") == 0 && !empty($RP) && !empty($mY))) {
        goto Nb;
    }
    $gN = wp_update_user(array("\x49\x44" => $tF, "\x64\151\x73\x70\x6c\x61\171\x5f\156\x61\x6d\x65" => $RP . "\40" . $mY));
    Nb:
    goto SP;
    PV:
    $gN = wp_update_user(array("\111\x44" => $tF, "\144\151\163\x70\x6c\141\171\137\156\x61\x6d\x65" => $mY . "\40" . $RP));
    SP:
    goto wx;
    S1:
    $gN = wp_update_user(array("\x49\104" => $tF, "\x64\x69\163\160\x6c\x61\171\x5f\x6e\141\155\x65" => $RP));
    wx:
    goto TT;
    VZ:
    $gN = wp_update_user(array("\x49\104" => $tF, "\144\x69\163\160\154\x61\x79\x5f\156\141\x6d\x65" => $mY));
    TT:
    goto mq;
    BM:
    $gN = wp_update_user(array("\x49\x44" => $tF, "\144\x69\163\160\154\x61\x79\137\x6e\x61\x6d\x65" => $user->user_login));
    mq:
    JT:
    Fh:
}
function mo_saml_map_custom_attributes($user, $Bu)
{
    $tF = $user->ID;
    if (!get_option("\x6d\x6f\x5f\163\x61\155\154\x5f\143\x75\163\x74\x6f\155\x5f\141\164\x74\162\163\137\x6d\141\x70\160\151\x6e\147")) {
        goto J3;
    }
    $hj = maybe_unserialize(get_option("\155\157\137\x73\x61\155\x6c\137\x63\165\163\x74\157\155\137\141\164\164\162\x73\x5f\155\x61\x70\x70\151\x6e\147"));
    foreach ($hj as $WO => $cK) {
        if (empty($Bu[$cK])) {
            goto hY;
        }
        $Aa = false;
        if (!(count($Bu[$cK]) == 1)) {
            goto LY;
        }
        $Aa = true;
        LY:
        if (!$Aa) {
            goto ZN;
        }
        update_user_meta($tF, $WO, $Bu[$cK][0]);
        goto AG;
        ZN:
        $AL = array();
        foreach ($Bu[$cK] as $Fd) {
            array_push($AL, $Fd);
            r3:
        }
        k3:
        update_user_meta($tF, $WO, $AL);
        AG:
        hY:
        Ua:
    }
    rf:
    J3:
}
function mo_saml_set_auth_cookie($user, $VU, $OJ, $Ek = false)
{
    $tF = $user->ID;
    wp_set_current_user($tF);
    $j3 = false;
    $j3 = apply_filters("\155\x6f\137\162\x65\x6d\x65\x6d\142\145\162\137\x6d\145", $j3);
    wp_set_auth_cookie($tF, $j3);
    if (empty($VU)) {
        goto Hs;
    }
    update_user_meta($tF, "\155\x6f\137\x73\141\x6d\154\137\x73\145\163\x73\x69\x6f\156\137\151\156\x64\x65\x78", $VU);
    Hs:
    if (empty($OJ)) {
        goto Pz;
    }
    update_user_meta($tF, "\x6d\x6f\x5f\x73\141\x6d\x6c\137\156\141\155\145\137\x69\144", $OJ);
    Pz:
    setcookie("\x6c\157\147\x67\145\x64\x5f\x69\156\137\167\151\x74\150\137\x69\x64\160", base64_encode($VU . true));
    if (!(!session_id() || session_id() == '' || empty($_SESSION))) {
        goto vx;
    }
    session_start();
    vx:
    $_SESSION["\155\x6f\137\x73\141\x6d\154"]["\x6c\x6f\147\x67\x65\144\137\x69\156\x5f\167\151\164\x68\x5f\151\144\160"] = TRUE;
    if (!$Ek) {
        goto rm;
    }
    do_action("\165\x73\145\162\137\x72\x65\x67\151\163\164\x65\x72", $tF);
    rm:
    do_action("\167\x70\x5f\154\157\x67\151\156", $user->user_login, $user);
}
function mo_saml_post_login_redirection($tr, $PG)
{
    $tr = htmlspecialchars_decode($tr);
    $pQ = get_option("\x6d\x6f\x5f\163\x61\x6d\x6c\137\x72\145\154\x61\171\x5f\x73\x74\141\164\x65");
    if (!empty($pQ)) {
        goto B7;
    }
    if (empty($tr)) {
        goto El;
    }
    $fj = '';
    if (!get_option("\x6d\157\x5f\163\x61\x6d\x6c\x5f\163\x65\156\x64\137\x61\x62\x73\157\154\165\x74\145\x5f\x72\145\x6c\x61\x79\x5f\x73\164\141\x74\x65")) {
        goto fV;
    }
    $T1 = get_option("\155\x6f\x5f\x73\x61\155\x6c\137\143\x75\x73\164\x6f\155\145\x72\x5f\x74\157\x6b\x65\156");
    $fj = AESEncryption::decrypt_data($tr, $T1);
    fV:
    if (!empty($fj)) {
        goto M5;
    }
    if (filter_var($tr, FILTER_VALIDATE_URL) === FALSE) {
        goto L6;
    }
    if (strpos($tr, home_url()) !== false) {
        goto VH;
    }
    $cw = htmlspecialchars_decode($PG);
    goto xU;
    VH:
    $cw = htmlspecialchars_decode($tr);
    xU:
    goto Tx;
    M5:
    $cw = htmlspecialchars_decode($fj);
    goto Tx;
    L6:
    $cw = htmlspecialchars_decode($tr);
    Tx:
    El:
    goto SL;
    B7:
    $cw = htmlspecialchars_decode($pQ);
    SL:
    if (!empty($cw)) {
        goto AB;
    }
    $cw = htmlspecialchars_decode($PG);
    AB:
    wp_redirect($cw);
    exit;
}
function check_if_user_allowed_to_login_due_to_role_restriction($Mh)
{
    $J2 = get_option("\163\141\x6d\x6c\x5f\141\x6d\137\x64\x6f\156\x74\137\x61\x6c\x6c\x6f\167\137\x75\x73\x65\x72\137\164\157\x6c\157\147\x69\x6e\137\143\x72\145\x61\x74\145\x5f\x77\x69\x74\x68\137\x67\x69\x76\x65\x6e\x5f\147\x72\x6f\x75\x70\163");
    if (!($J2 == "\143\150\145\143\x6b\x65\144")) {
        goto GL;
    }
    if (empty($Mh)) {
        goto Uo;
    }
    $Hg = get_option("\x6d\x6f\x5f\163\141\x6d\x6c\137\162\145\163\164\x72\x69\143\164\x5f\x75\x73\145\x72\x73\x5f\167\x69\164\x68\137\x67\x72\157\x75\x70\163");
    $ZX = explode("\73", $Hg);
    foreach ($ZX as $qn) {
        foreach ($Mh as $WA) {
            $WA = trim($WA);
            if (!(!empty($WA) && $WA == $qn)) {
                goto YU;
            }
            wp_die("\x59\x6f\165\40\141\162\x65\x20\156\157\x74\x20\x61\x75\164\150\157\162\151\x7a\145\144\x20\x74\157\x20\x6c\157\147\151\x6e\56\x20\x50\154\145\141\x73\x65\x20\143\x6f\x6e\x74\141\x63\164\40\x79\x6f\165\162\x20\x61\x64\155\151\156\151\x73\x74\x72\141\x74\x6f\162\x2e", "\x45\162\x72\157\x72");
            YU:
            Ki:
        }
        ja:
        x2:
    }
    ep:
    Uo:
    GL:
}
function assign_roles_to_user($user, $zl, $Mh)
{
    $pq = false;
    if (!(!empty($Mh) && !empty($zl) && !is_administrator_user($user))) {
        goto Gm;
    }
    $user->set_role(false);
    $HY = '';
    $qD = false;
    foreach ($zl as $bc => $wL) {
        $ZX = explode("\x3b", $wL);
        foreach ($ZX as $qn) {
            foreach ($Mh as $WA) {
                $WA = trim($WA);
                if (!(!empty($WA) && $WA == $qn)) {
                    goto ne;
                }
                $pq = true;
                $user->add_role($bc);
                ne:
                Hq:
            }
            uu:
            V8:
        }
        tD:
        AN:
    }
    Nq:
    Gm:
    return $pq;
}
function is_role_mapping_configured_for_user($zl, $Mh)
{
    if (!(!empty($Mh) && !empty($zl))) {
        goto qEU;
    }
    foreach ($zl as $bc => $wL) {
        $ZX = explode("\73", $wL);
        foreach ($ZX as $qn) {
            foreach ($Mh as $WA) {
                $WA = trim($WA);
                if (!(!empty($WA) && $WA == $qn)) {
                    goto mVS;
                }
                return true;
                mVS:
                u6F:
            }
            auu:
            d3:
        }
        Ub:
        te:
    }
    eN:
    qEU:
    return false;
}
function is_administrator_user($user)
{
    $J0 = $user->roles;
    if (!is_null($J0) && in_array("\141\x64\x6d\x69\x6e\x69\163\164\x72\141\164\157\x72", $J0, TRUE)) {
        goto Usb;
    }
    return false;
    goto lRG;
    Usb:
    return true;
    lRG:
}
function mo_saml_is_customer_registered()
{
    $mg = get_option("\155\x6f\x5f\163\x61\155\154\x5f\141\x64\155\151\x6e\x5f\145\x6d\x61\151\x6c");
    $UY = get_option("\155\157\137\x73\x61\x6d\154\x5f\141\x64\x6d\x69\x6e\137\143\165\x73\x74\157\x6d\x65\x72\137\x6b\145\171");
    if (!$mg || !$UY || !is_numeric(trim($UY))) {
        goto k1H;
    }
    return 1;
    goto V00;
    k1H:
    return 0;
    V00:
}
function mo_saml_is_customer_license_verified()
{
    $WO = get_option("\x6d\x6f\137\x73\x61\155\154\137\143\165\163\164\x6f\x6d\x65\162\x5f\164\x6f\153\145\x6e");
    $sX = AESEncryption::decrypt_data(get_option("\x74\x5f\163\x69\164\145\137\x73\x74\141\164\x75\x73"), $WO);
    $ZM = get_option("\x73\x6d\154\137\x6c\153");
    $mg = get_option("\155\x6f\137\x73\x61\x6d\154\x5f\141\x64\155\x69\x6e\137\145\155\141\151\154");
    $UY = get_option("\155\x6f\137\163\x61\155\x6c\137\141\x64\x6d\151\156\137\143\x75\x73\164\157\x6d\145\162\137\153\x65\171");
    if (!tasjgndigekgpe()) {
        goto zro;
    }
    return 0;
    zro:
    if (!$sX && !$ZM || !$mg || !$UY || !is_numeric(trim($UY))) {
        goto ZR_;
    }
    return 1;
    goto AjU;
    ZR_:
    return 0;
    AjU:
}
function saml_get_current_page_url()
{
    $bj = $_SERVER["\x48\x54\124\120\x5f\110\x4f\123\124"];
    if (!(substr($bj, -1) == "\x2f")) {
        goto mHh;
    }
    $bj = substr($bj, 0, -1);
    mHh:
    $T5 = $_SERVER["\x52\105\121\125\105\123\x54\137\125\x52\x49"];
    if (!(substr($T5, 0, 1) == "\57")) {
        goto PWz;
    }
    $T5 = substr($T5, 1);
    PWz:
    $O9 = !empty($_SERVER["\x48\124\x54\x50\123"]) && strcasecmp($_SERVER["\x48\x54\124\120\x53"], "\157\x6e") == 0;
    $ap = "\x68\164\164\160" . ($O9 ? "\x73" : '') . "\72\57\x2f" . $bj . "\x2f" . $T5;
    return $ap;
}
function show_status_error($H5, $tr, $kg)
{
    $H5 = strip_tags($H5);
    $kg = strip_tags($kg);
    if ($tr == "\x74\x65\163\164\x56\x61\x6c\151\144\x61\x74\x65" or $tr == "\164\x65\x73\164\x4e\x65\x77\x43\145\x72\164\x69\x66\x69\143\x61\x74\145") {
        goto thi;
    }
    wp_die("\127\x65\40\143\157\x75\154\144\x20\x6e\x6f\164\x20\x73\x69\x67\156\x20\171\x6f\165\x20\x69\x6e\x2e\x20\120\154\x65\141\x73\145\40\143\x6f\x6e\x74\141\143\164\x20\171\x6f\165\x72\40\101\144\155\x69\x6e\151\163\x74\x72\141\164\157\x72\x2e", "\x45\162\162\157\x72\72\40\x49\156\166\x61\x6c\x69\x64\40\123\101\115\114\40\122\145\x73\160\157\x6e\x73\x65\40\x53\164\141\164\x75\x73");
    goto mG7;
    thi:
    echo "\x3c\144\x69\x76\x20\163\x74\171\154\x65\x3d\x22\x66\157\x6e\164\55\146\141\x6d\x69\x6c\171\72\x43\x61\x6c\x69\142\162\x69\73\x70\141\x64\x64\151\156\x67\x3a\60\40\x33\45\x3b\x22\76";
    echo "\x3c\144\x69\166\40\163\164\171\154\x65\x3d\42\143\157\x6c\x6f\162\x3a\40\43\141\x39\x34\x34\x34\62\73\x62\141\x63\153\x67\x72\157\x75\x6e\144\x2d\x63\157\154\x6f\162\72\x20\x23\146\62\x64\x65\144\145\73\160\141\144\144\x69\156\x67\72\x20\61\x35\x70\x78\73\x6d\141\x72\x67\x69\x6e\55\x62\157\x74\164\x6f\x6d\72\40\x32\x30\160\170\x3b\x74\145\170\x74\x2d\x61\x6c\151\x67\156\x3a\x63\145\x6e\x74\x65\x72\x3b\x62\157\x72\144\145\x72\72\61\160\170\40\x73\x6f\154\151\x64\40\x23\x45\66\x42\x33\x42\62\x3b\146\x6f\156\164\x2d\x73\x69\172\145\72\x31\x38\160\x74\73\x22\76\40\x45\x52\x52\117\x52\x3c\x2f\144\151\166\76\12\x20\40\x20\x20\40\x20\40\40\x20\40\40\40\40\40\40\40\x3c\144\x69\166\x20\x73\x74\171\x6c\145\75\x22\x63\157\x6c\x6f\x72\72\x20\x23\141\71\x34\x34\64\x32\73\x66\157\x6e\164\x2d\163\x69\172\145\72\61\x34\160\x74\x3b\x20\155\141\162\x67\x69\x6e\x2d\x62\157\x74\x74\157\155\x3a\62\x30\x70\x78\x3b\42\76\74\x70\76\x3c\163\x74\x72\157\156\x67\x3e\x45\162\162\x6f\x72\72\x20\x3c\x2f\163\164\162\x6f\x6e\147\76\40\111\156\x76\141\154\151\x64\40\x53\x41\115\x4c\x20\x52\145\x73\x70\x6f\x6e\x73\x65\x20\x53\164\x61\x74\x75\163\x2e\74\x2f\x70\x3e\12\40\40\x20\40\40\40\40\x20\x20\40\40\x20\x20\40\x20\40\74\x70\76\x3c\x73\164\162\157\156\147\x3e\103\141\x75\x73\x65\x73\x3c\x2f\163\164\x72\x6f\156\147\x3e\72\x20\111\x64\x65\156\x74\x69\164\x79\40\120\x72\157\x76\x69\144\145\162\40\x68\x61\163\40\x73\x65\156\x74\x20\x27" . esc_html($H5) . "\x27\x20\x73\164\141\164\x75\x73\x20\143\x6f\x64\x65\x20\151\156\40\123\x41\x4d\114\40\x52\x65\x73\160\157\156\x73\x65\56\x20\74\57\x70\x3e\12\x9\11\11\x9\11\11\11\x9\74\160\76\74\163\x74\x72\x6f\x6e\x67\x3e\x52\x65\141\163\157\156\74\57\163\x74\x72\157\x6e\x67\x3e\x3a\x20" . get_status_message(esc_html($H5)) . "\74\57\x70\x3e\40";
    if (empty($kg)) {
        goto xP3;
    }
    echo "\74\x70\x3e\74\x73\164\x72\157\x6e\147\x3e\x53\x74\x61\x74\165\163\40\x4d\x65\163\x73\141\x67\x65\40\151\156\40\164\x68\145\x20\123\101\115\x4c\40\122\145\163\160\x6f\156\163\145\x3a\74\57\163\164\x72\x6f\156\x67\76\40\74\x62\162\57\x3e" . esc_html($kg) . "\74\x2f\x70\x3e";
    xP3:
    echo "\74\x62\162\x3e\xa\x20\x20\40\40\40\40\40\40\40\40\40\x20\x20\x20\x20\40\x3c\57\x64\151\166\x3e\xa\12\x20\40\40\x20\40\40\x20\40\x20\40\x20\x20\40\x20\x20\40\x3c\144\x69\x76\40\163\164\x79\x6c\x65\x3d\x22\x6d\141\162\x67\151\156\x3a\x33\x25\73\x64\x69\x73\160\154\x61\171\x3a\142\x6c\157\143\153\73\x74\145\170\164\x2d\141\x6c\151\147\156\x3a\x63\145\156\x74\145\x72\x3b\x22\76\12\40\x20\x20\40\x20\x20\40\x20\40\40\x20\40\40\40\40\40\74\x64\x69\166\x20\163\164\171\x6c\145\75\42\155\141\162\147\151\156\x3a\x33\x25\x3b\144\151\163\x70\x6c\141\x79\72\x62\x6c\157\143\x6b\73\164\x65\170\164\x2d\141\154\x69\147\x6e\72\x63\145\x6e\164\145\162\73\x22\x3e\74\x69\156\160\x75\164\x20\163\x74\171\x6c\145\75\42\x70\141\144\144\x69\156\x67\72\x31\45\x3b\167\x69\x64\x74\150\x3a\x31\x30\x30\x70\x78\73\x62\x61\x63\x6b\x67\x72\x6f\165\x6e\x64\72\40\43\x30\60\x39\61\x43\x44\x20\x6e\x6f\156\145\x20\162\x65\x70\x65\x61\164\x20\163\143\162\x6f\154\154\x20\x30\45\40\x30\45\x3b\143\165\162\x73\x6f\162\x3a\40\160\157\x69\156\164\145\162\73\146\157\x6e\x74\55\x73\151\x7a\145\72\61\x35\160\170\73\142\157\162\144\x65\162\x2d\167\151\144\x74\x68\72\x20\x31\x70\170\73\142\157\x72\x64\145\x72\x2d\x73\x74\171\154\x65\72\40\163\x6f\x6c\x69\x64\x3b\x62\157\162\144\145\162\55\x72\141\x64\x69\x75\x73\72\40\63\x70\x78\73\167\150\x69\164\145\55\163\160\x61\143\145\72\x20\156\157\167\x72\x61\x70\73\x62\x6f\170\55\x73\151\172\151\x6e\x67\72\x20\x62\157\162\144\145\162\55\x62\x6f\x78\73\x62\x6f\162\144\145\x72\x2d\143\x6f\x6c\x6f\x72\72\40\43\x30\60\67\63\101\101\73\142\157\x78\55\x73\x68\141\x64\157\x77\x3a\x20\x30\x70\x78\x20\x31\160\170\40\x30\x70\x78\40\162\147\x62\x61\x28\61\62\60\54\40\x32\60\x30\x2c\x20\62\x33\x30\x2c\x20\60\x2e\66\51\x20\x69\156\x73\x65\x74\73\x63\157\154\x6f\x72\72\40\x23\x46\106\106\73\x22\164\x79\160\145\x3d\x22\x62\165\164\164\x6f\156\42\40\x76\x61\154\165\145\75\x22\x44\157\x6e\145\42\40\x6f\x6e\103\x6c\151\x63\x6b\75\x22\163\x65\154\146\x2e\x63\154\157\x73\145\50\51\x3b\42\76\74\x2f\x64\x69\x76\x3e";
    exit;
    mG7:
}
function addLink($lc, $yR)
{
    $S9 = "\74\x61\40\150\x72\x65\x66\x3d\42" . $yR . "\x22\x3e" . $lc . "\74\57\x61\76";
    return $S9;
}
function get_status_message($H5)
{
    switch ($H5) {
        case "\x52\x65\161\165\x65\x73\x74\145\162":
            return "\124\x68\145\x20\x72\145\161\165\x65\x73\x74\40\143\x6f\x75\154\x64\40\x6e\x6f\x74\40\x62\x65\40\x70\145\162\146\x6f\x72\155\x65\144\x20\x64\165\x65\x20\x74\x6f\x20\141\x6e\40\145\x72\162\x6f\162\x20\157\156\x20\x74\150\145\x20\160\x61\162\x74\x20\x6f\x66\40\164\x68\x65\40\x72\x65\161\x75\145\x73\x74\x65\x72\56";
            goto zZb;
        case "\x52\x65\x73\160\157\156\x64\145\162":
            return "\124\150\145\40\162\145\161\x75\145\163\164\40\143\157\165\x6c\x64\x20\156\x6f\164\40\x62\x65\x20\160\145\162\146\x6f\x72\155\x65\144\x20\144\165\x65\40\x74\x6f\x20\141\x6e\40\145\162\x72\157\x72\x20\157\x6e\x20\164\150\145\40\160\x61\162\x74\x20\x6f\146\x20\x74\150\145\40\x53\101\x4d\114\40\162\x65\x73\x70\157\x6e\144\x65\x72\x20\x6f\x72\40\123\x41\x4d\x4c\40\141\x75\164\x68\x6f\162\151\164\x79\x2e";
            goto zZb;
        case "\126\x65\x72\x73\151\x6f\x6e\x4d\151\163\155\141\164\143\150":
            return "\x54\150\x65\40\x53\x41\x4d\114\40\162\145\x73\160\x6f\x6e\x64\x65\162\x20\x63\157\165\154\144\40\156\157\x74\x20\160\x72\157\143\x65\x73\x73\40\x74\x68\x65\x20\x72\x65\161\x75\x65\x73\x74\x20\x62\x65\x63\x61\165\163\x65\40\x74\x68\145\x20\166\x65\x72\163\x69\x6f\x6e\x20\x6f\x66\40\164\150\145\40\x72\x65\161\165\145\x73\164\40\155\145\x73\163\141\x67\145\40\x77\141\163\40\151\x6e\x63\157\162\162\x65\143\x74\x2e";
            goto zZb;
        default:
            return "\x55\x6e\x6b\156\x6f\167\x6e";
    }
    r_S:
    zZb:
}
function mo_saml_register_widget()
{
    register_widget("\155\157\137\x6c\x6f\147\x69\156\x5f\x77\x69\x64");
}
function mo_saml_get_relay_state($ap)
{
    if (!($ap == "\x74\145\x73\164\126\x61\154\151\144\141\164\x65" || $ap == "\x74\x65\163\x74\116\145\x77\103\145\162\x74\151\x66\x69\143\141\164\145")) {
        goto wIX;
    }
    return $ap;
    wIX:
    if (get_option("\x6d\x6f\137\163\x61\155\x6c\137\x73\x65\x6e\x64\x5f\141\x62\x73\x6f\x6c\165\x74\145\x5f\x72\145\154\141\x79\137\x73\x74\141\164\x65")) {
        goto WNj;
    }
    $yB = parse_url($ap, PHP_URL_PATH);
    if (!parse_url($ap, PHP_URL_QUERY)) {
        goto ttI;
    }
    $sp = parse_url($ap, PHP_URL_QUERY);
    $yB = $yB . "\x3f" . $sp;
    ttI:
    if (!parse_url($ap, PHP_URL_FRAGMENT)) {
        goto vi6;
    }
    $RM = parse_url($ap, PHP_URL_FRAGMENT);
    $yB = $yB . "\43" . $RM;
    vi6:
    goto tYa;
    WNj:
    $T1 = get_option("\155\x6f\x5f\163\x61\155\x6c\137\143\x75\163\164\157\155\145\162\x5f\164\x6f\153\145\x6e");
    $yB = AESEncryption::encrypt_data($ap, $T1);
    tYa:
    return $yB;
}
add_action("\x77\151\144\147\x65\164\x73\137\x69\x6e\151\x74", "\x6d\157\x5f\x73\x61\155\154\x5f\x72\x65\x67\x69\163\164\145\x72\x5f\x77\x69\x64\147\145\164");
add_action("\151\x6e\x69\164", "\155\x6f\137\154\x6f\x67\151\156\137\x76\141\154\151\x64\x61\164\x65");

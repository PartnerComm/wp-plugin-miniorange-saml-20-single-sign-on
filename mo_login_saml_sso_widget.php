<?php


include_once dirname(__FILE__) . "\57\125\164\x69\x6c\151\164\x69\x65\x73\56\160\150\x70";
include_once dirname(__FILE__) . "\57\122\145\163\160\x6f\x6e\x73\x65\x2e\160\x68\x70";
include_once dirname(__FILE__) . "\x2f\114\157\x67\157\165\x74\122\145\161\165\145\x73\x74\x2e\160\150\x70";
include_once "\170\155\x6c\163\145\143\x6c\151\142\x73\x2e\160\x68\160";
use RobRichards\XMLSecLibs\XMLSecurityKey;
use RobRichards\XMLSecLibs\XMLSecurityDSig;
use RobRichards\XMLSecLibs\XMLSecEnc;
if (class_exists("\x41\105\123\x45\156\143\162\x79\160\164\x69\157\x6e")) {
    goto v1;
}
require_once dirname(__FILE__) . "\57\151\x6e\143\x6c\x75\144\x65\163\57\154\x69\x62\57\x65\156\143\162\171\x70\x74\151\x6f\x6e\56\160\150\x70";
v1:
class mo_login_wid extends WP_Widget
{
    public function __construct()
    {
        $uI = LicenseHelper::getCurrentOption(mo_options_enum_service_provider::Identity_name);
        parent::__construct("\123\141\155\x6c\137\114\x6f\x67\x69\156\x5f\x57\x69\x64\147\145\x74", "\114\x6f\x67\x69\x6e\x20\167\151\164\x68\40" . $uI, array("\x64\145\x73\143\x72\151\160\x74\151\157\156" => __("\124\150\x69\x73\40\x69\x73\x20\141\x20\x6d\x69\156\151\x4f\x72\141\156\x67\x65\40\x53\101\x4d\x4c\40\154\157\147\x69\156\x20\x77\x69\144\x67\x65\x74\x2e", "\155\157\163\141\155\x6c")));
    }
    public function widget($gX, $Xf)
    {
        extract($gX);
        $GL = apply_filters("\167\x69\144\147\x65\164\137\164\151\164\154\x65", $Xf["\167\151\x64\137\x74\151\x74\x6c\145"]);
        echo $gX["\142\145\146\157\x72\x65\x5f\x77\x69\144\x67\145\x74"];
        if (empty($GL)) {
            goto Fq;
        }
        echo $gX["\x62\x65\x66\157\162\x65\x5f\x74\x69\164\154\145"] . $GL . $gX["\x61\x66\x74\x65\x72\x5f\164\151\x74\154\x65"];
        Fq:
        $this->loginForm();
        echo $gX["\141\146\x74\x65\x72\x5f\167\151\144\x67\145\x74"];
    }
    public function update($bQ, $TE)
    {
        $Xf = array();
        $Xf["\x77\x69\144\137\x74\151\164\x6c\x65"] = strip_tags($bQ["\167\151\144\x5f\164\151\x74\x6c\x65"]);
        return $Xf;
    }
    public function form($Xf)
    {
        $GL = '';
        if (!array_key_exists("\167\151\144\x5f\x74\151\164\154\x65", $Xf)) {
            goto Mz;
        }
        $GL = $Xf["\167\x69\x64\137\x74\x69\x74\154\x65"];
        Mz:
        echo "\xd\xa\11\11\x3c\x70\x3e\74\x6c\141\x62\145\x6c\40\x66\157\x72\x3d\x22" . $this->get_field_id("\167\151\144\137\164\x69\164\x6c\145") . "\40\42\76" . _e("\124\151\x74\x6c\x65\x3a") . "\x20\74\x2f\154\141\x62\145\154\x3e\15\xa\x9\11\74\x69\156\x70\165\164\x20\x63\x6c\141\163\x73\75\x22\167\x69\x64\x65\146\x61\x74\42\x20\151\x64\75\x22" . $this->get_field_id("\167\x69\144\x5f\164\151\x74\x6c\x65") . "\42\40\156\x61\155\145\75\42" . $this->get_field_name("\x77\x69\144\x5f\x74\151\164\154\145") . "\42\40\x74\x79\160\x65\x3d\x22\164\x65\170\164\x22\40\166\x61\x6c\x75\145\75\x22" . $GL . "\42\x20\x2f\x3e\xd\xa\11\11\74\x2f\x70\x3e";
    }
    public function loginForm()
    {
        global $post;
        $rV = SAMLSPUtilities::mo_saml_is_user_logged_in();
        if (!$rV) {
            goto LM;
        }
        $current_user = wp_get_current_user();
        $sf = "\x48\145\x6c\x6c\x6f\x2c";
        if (!get_option("\x6d\157\x5f\x73\141\155\x6c\137\143\165\x73\164\157\x6d\x5f\x67\x72\145\145\x74\x69\x6e\147\137\164\x65\x78\x74")) {
            goto yz;
        }
        $sf = get_option("\155\157\137\163\141\155\x6c\137\143\x75\163\164\x6f\x6d\x5f\x67\x72\145\145\164\x69\x6e\x67\x5f\x74\145\x78\x74");
        yz:
        $Cz = '';
        if (!get_option("\x6d\x6f\x5f\x73\x61\x6d\x6c\137\x67\x72\x65\145\x74\x69\x6e\147\x5f\156\141\x6d\145")) {
            goto ol;
        }
        switch (get_option("\x6d\x6f\x5f\x73\x61\155\x6c\x5f\x67\162\145\145\164\x69\156\x67\x5f\156\141\x6d\x65")) {
            case "\125\123\x45\x52\116\101\115\x45":
                $Cz = $current_user->user_login;
                goto db;
            case "\x45\x4d\101\x49\114":
                $Cz = $current_user->user_email;
                goto db;
            case "\x46\116\x41\x4d\105":
                $Cz = $current_user->user_firstname;
                goto db;
            case "\x4c\x4e\x41\115\105":
                $Cz = $current_user->user_lastname;
                goto db;
            case "\x46\116\101\x4d\105\137\x4c\x4e\x41\x4d\x45":
                $Cz = $current_user->user_firstname . "\40" . $current_user->user_lastname;
                goto db;
            case "\x4c\116\x41\x4d\x45\x5f\x46\116\101\x4d\x45":
                $Cz = $current_user->user_lastname . "\x20" . $current_user->user_firstname;
                goto db;
            default:
                $Cz = $current_user->user_login;
        }
        wk:
        db:
        ol:
        $Cz = trim($Cz);
        if (!empty($Cz)) {
            goto zV;
        }
        $Cz = $current_user->user_login;
        zV:
        $Ks = $sf . "\40" . $Cz;
        $Fw = "\x4c\x6f\x67\157\x75\x74";
        if (!get_option("\x6d\x6f\137\x73\141\x6d\x6c\137\143\x75\163\164\x6f\155\137\x6c\157\x67\157\x75\164\137\164\145\x78\164")) {
            goto LQ;
        }
        $Fw = get_option("\x6d\x6f\x5f\163\141\155\x6c\137\x63\165\163\164\157\155\137\154\157\147\x6f\165\x74\x5f\x74\x65\170\x74");
        LQ:
        echo $Ks . "\x20\174\x20\74\x61\40\x68\x72\145\146\75\x22" . wp_logout_url(home_url()) . "\x22\40\164\x69\x74\x6c\x65\75\42\x6c\x6f\x67\157\x75\x74\x22\x20\x3e" . $Fw . "\74\57\x61\76\x3c\57\x6c\x69\76";
        goto Va;
        LM:
        $gV = saml_get_current_page_url();
        echo "\xd\12\x9\11\74\x73\143\x72\x69\x70\x74\x3e\xd\xa\x9\11\146\x75\x6e\x63\x74\151\157\156\40\163\x75\x62\x6d\151\164\x53\141\x6d\154\x46\157\x72\x6d\50\51\173\x20\x64\157\x63\x75\x6d\145\156\164\56\x67\x65\164\x45\x6c\145\x6d\145\x6e\164\x42\x79\111\144\50\x22\x6d\151\x6e\x69\x6f\162\x61\x6e\147\x65\55\x73\x61\155\154\x2d\x73\160\55\x73\x73\157\55\154\x6f\x67\x69\x6e\55\146\x6f\x72\155\x22\x29\x2e\163\x75\142\x6d\151\164\50\51\x3b\x20\x7d\xd\xa\11\x9\x3c\57\x73\143\x72\151\160\164\x3e\15\12\x9\11\x3c\146\157\162\x6d\40\x6e\x61\x6d\145\x3d\42\x6d\x69\x6e\151\157\x72\141\x6e\x67\x65\x2d\163\x61\155\x6c\55\x73\x70\x2d\163\163\157\55\154\x6f\x67\x69\x6e\55\x66\x6f\x72\155\42\x20\x69\144\75\x22\155\x69\x6e\151\157\x72\x61\x6e\147\x65\x2d\x73\141\155\154\55\163\x70\55\163\163\157\55\x6c\157\147\x69\x6e\55\146\157\x72\x6d\42\x20\x6d\x65\164\x68\157\x64\x3d\42\x70\157\163\164\x22\x20\141\x63\164\x69\x6f\x6e\x3d\42\42\x3e\15\xa\x9\11\x3c\x69\156\160\165\x74\x20\x74\171\160\145\x3d\x22\x68\151\144\x64\145\156\x22\x20\x6e\x61\x6d\x65\75\x22\157\x70\164\151\x6f\156\x22\40\166\141\154\x75\145\75\x22\163\141\155\x6c\x5f\x75\163\145\162\x5f\x6c\x6f\147\151\x6e\42\40\x2f\x3e\15\xa\11\x9\x3c\x69\156\160\x75\164\40\x74\x79\x70\x65\x3d\x22\x68\151\x64\144\145\x6e\x22\40\x6e\141\x6d\x65\75\42\162\x65\144\151\162\x65\x63\x74\137\164\157\42\x20\166\x61\154\165\145\75\x22" . $gV . "\42\40\x2f\x3e\15\xa\xd\xa\x9\11\x3c\146\157\156\164\x20\x73\x69\172\x65\75\42\x2b\x31\x22\40\x73\x74\171\x6c\x65\75\42\166\145\x72\164\151\x63\x61\x6c\55\141\x6c\151\147\156\x3a\x74\157\160\x3b\x22\76\x20\x3c\57\x66\x6f\x6e\x74\x3e";
        $C1 = LicenseHelper::getCurrentOption(mo_options_enum_service_provider::Identity_name);
        if (!empty($C1)) {
            goto B6;
        }
        echo "\120\x6c\145\x61\x73\x65\x20\143\157\156\x66\151\x67\165\x72\x65\x20\x74\x68\x65\x20\x6d\151\156\151\117\162\141\156\x67\145\40\x53\101\115\114\40\120\154\165\x67\151\x6e\40\x66\151\162\163\x74\x2e";
        goto o4;
        B6:
        $Wu = "\x4c\x6f\x67\151\x6e\40\x77\x69\x74\x68\40\43\43\x49\104\120\43\43";
        if (!get_option("\155\157\137\x73\141\x6d\x6c\137\x63\x75\163\x74\x6f\x6d\x5f\154\157\147\151\156\137\x74\145\170\164")) {
            goto a9;
        }
        $Wu = get_option("\155\x6f\x5f\x73\x61\x6d\154\137\143\165\163\x74\157\x6d\x5f\154\x6f\147\151\x6e\137\164\x65\x78\x74");
        a9:
        $Wu = str_replace("\x23\43\x49\x44\120\x23\x23", $C1, $Wu);
        $Ji = false;
        if (!get_option("\x6d\157\137\163\x61\155\154\x5f\165\x73\x65\x5f\142\165\164\164\157\156\x5f\141\x73\137\x77\151\x64\147\145\164")) {
            goto NZ;
        }
        if (!(get_option("\155\157\137\163\141\155\x6c\137\x75\x73\145\137\142\x75\x74\164\x6f\156\137\x61\163\x5f\167\x69\144\x67\x65\x74") == "\164\x72\x75\x65")) {
            goto PQ;
        }
        $Ji = true;
        PQ:
        NZ:
        if (!$Ji) {
            goto b0;
        }
        $aM = get_option("\155\x6f\137\x73\141\155\x6c\137\142\x75\164\164\157\156\x5f\167\151\144\164\x68") ? get_option("\155\x6f\x5f\x73\141\x6d\x6c\x5f\x62\x75\x74\164\x6f\156\x5f\x77\151\144\164\x68") : "\x31\60\60";
        $Uk = get_option("\155\157\137\163\141\155\x6c\137\142\x75\x74\x74\157\156\x5f\150\x65\151\147\150\x74") ? get_option("\x6d\x6f\x5f\163\141\155\154\137\x62\165\164\164\157\x6e\x5f\x68\x65\x69\x67\150\x74") : "\65\x30";
        $VQ = get_option("\155\x6f\x5f\x73\x61\x6d\154\137\142\165\164\164\157\x6e\x5f\x73\151\172\x65") ? get_option("\155\157\137\163\x61\x6d\x6c\x5f\142\165\164\x74\x6f\x6e\x5f\x73\151\172\145") : "\x35\60";
        $aL = get_option("\155\157\x5f\163\141\155\154\x5f\x62\165\x74\164\x6f\x6e\x5f\x63\x75\x72\166\x65") ? get_option("\155\157\x5f\x73\x61\155\x6c\137\142\x75\164\x74\157\x6e\137\x63\165\162\166\145") : "\65";
        $Yq = get_option("\x6d\157\x5f\163\141\155\x6c\x5f\x62\x75\x74\x74\x6f\156\x5f\x63\x6f\154\x6f\x72") ? get_option("\x6d\157\137\x73\141\155\154\x5f\x62\165\x74\x74\157\x6e\x5f\143\157\154\157\162") : "\x30\x30\x38\x35\x62\x61";
        $f5 = get_option("\155\157\x5f\x73\141\155\x6c\137\x62\165\x74\164\x6f\x6e\137\x74\x68\x65\155\x65") ? get_option("\x6d\x6f\x5f\163\141\x6d\x6c\137\x62\x75\x74\164\157\156\x5f\x74\150\x65\155\145") : "\154\157\156\x67\x62\x75\164\x74\157\156";
        $UK = isset($_SESSION["\155\157\x5f\147\165\145\163\x74\137\x6c\x6f\147\151\156"]["\x6c\x6f\x67\x67\145\x64\x5f\151\x6e\x5f\151\144\x70\137\156\x61\155\145"]) ? $_SESSION["\x6d\x6f\137\x67\165\145\x73\164\x5f\154\157\147\x69\156"]["\x6c\x6f\x67\147\x65\144\137\x69\x6e\x5f\x69\144\x70\137\156\x61\155\145"] : LicenseHelper::getCurrentOption(mo_options_enum_service_provider::Identity_name);
        $f9 = get_option("\x6d\157\137\163\141\155\154\x5f\142\x75\x74\x74\x6f\156\x5f\164\x65\x78\164") ? get_option("\x6d\x6f\137\x73\x61\x6d\x6c\137\x62\x75\164\x74\x6f\156\137\164\145\x78\164") : ($UK ? $UK : "\x4c\157\x67\151\156");
        $UI = get_option("\155\157\x5f\163\x61\155\x6c\137\x66\157\x6e\x74\137\x63\x6f\154\x6f\162") ? get_option("\155\157\x5f\163\141\155\154\137\146\157\x6e\164\137\x63\157\154\x6f\162") : "\146\146\x66\x66\146\146";
        $N_ = get_option("\155\x6f\137\x73\141\x6d\154\x5f\x66\x6f\156\164\137\163\x69\x7a\145") ? get_option("\x6d\x6f\137\x73\141\155\x6c\137\146\157\156\x74\137\x73\x69\172\145") : "\62\x30";
        $Wu = "\x3c\x69\156\x70\165\x74\x20\x74\171\160\145\x3d\42\142\x75\164\164\157\x6e\x22\x20\156\141\155\x65\75\x22\155\157\137\x73\141\x6d\x6c\x5f\x77\x70\x5f\163\163\x6f\x5f\142\x75\164\164\x6f\156\x22\x20\166\x61\x6c\x75\145\75\x22" . $f9 . "\42\40\x73\x74\171\154\145\75\x22";
        $CD = '';
        if ($f5 == "\154\157\156\147\142\x75\164\164\x6f\156") {
            goto Ol;
        }
        if ($f5 == "\x63\x69\162\x63\154\x65") {
            goto nP;
        }
        if ($f5 == "\x6f\166\x61\x6c") {
            goto G2;
        }
        if ($f5 == "\x73\x71\165\141\x72\145") {
            goto Mb;
        }
        goto u7;
        nP:
        $CD = $CD . "\167\151\144\x74\150\x3a" . $VQ . "\x70\170\x3b";
        $CD = $CD . "\x68\x65\151\x67\150\164\72" . $VQ . "\x70\x78\x3b";
        $CD = $CD . "\142\157\x72\x64\x65\x72\x2d\x72\141\x64\151\165\163\72\71\71\71\x70\170\x3b";
        goto u7;
        G2:
        $CD = $CD . "\x77\x69\x64\164\x68\x3a" . $VQ . "\160\x78\73";
        $CD = $CD . "\x68\145\x69\x67\150\164\72" . $VQ . "\160\x78\73";
        $CD = $CD . "\x62\157\162\144\x65\x72\x2d\x72\141\144\151\165\163\x3a\x35\160\170\73";
        goto u7;
        Mb:
        $CD = $CD . "\x77\x69\144\164\150\x3a" . $VQ . "\x70\170\x3b";
        $CD = $CD . "\150\x65\x69\147\x68\164\72" . $VQ . "\160\170\73";
        $CD = $CD . "\142\157\162\144\145\162\x2d\162\x61\x64\151\x75\163\x3a\60\160\x78\73";
        u7:
        goto jM;
        Ol:
        $CD = $CD . "\x77\x69\144\164\150\72" . $aM . "\160\x78\73";
        $CD = $CD . "\150\145\151\x67\x68\164\x3a" . $Uk . "\160\170\x3b";
        $CD = $CD . "\142\157\162\144\x65\162\x2d\x72\141\x64\x69\x75\x73\x3a" . $aL . "\160\170\x3b";
        jM:
        $CD = $CD . "\x62\x61\143\x6b\147\x72\157\165\156\144\x2d\x63\157\154\157\162\x3a\43" . $Yq . "\x3b";
        $CD = $CD . "\142\x6f\162\x64\145\162\55\143\157\x6c\157\x72\72\164\x72\141\x6e\163\x70\x61\x72\x65\x6e\164\x3b";
        $CD = $CD . "\x63\157\154\x6f\162\72\43" . $UI . "\73";
        $CD = $CD . "\146\x6f\156\164\55\163\151\x7a\x65\72" . $N_ . "\160\170\73";
        $CD = $CD . "\x70\141\x64\144\x69\156\x67\x3a\x30\x70\170\x3b";
        $Wu = $Wu . $CD . "\x22\x2f\76";
        b0:
        echo "\x20\x3c\141\x20\x68\162\145\x66\75\42\43\42\40\x6f\x6e\103\154\x69\x63\153\x3d\x22\163\165\142\x6d\x69\x74\x53\141\x6d\x6c\x46\x6f\162\x6d\x28\x29\42\76";
        echo $Wu;
        echo "\x3c\57\x61\76\x3c\57\x66\157\162\155\x3e\40";
        o4:
        if ($this->mo_saml_check_empty_or_null_val(get_option("\155\157\x5f\x73\141\x6d\x6c\137\x72\x65\144\x69\x72\x65\x63\x74\137\x65\162\162\157\x72\137\x63\157\x64\x65"))) {
            goto Tj;
        }
        echo "\x3c\144\151\166\76\74\57\144\x69\166\76\74\x64\151\x76\40\164\151\164\x6c\145\x3d\x22\114\x6f\x67\x69\156\x20\x45\162\162\x6f\x72\x22\76\x3c\x66\x6f\x6e\x74\x20\143\x6f\x6c\x6f\x72\75\x22\162\145\x64\x22\76\x57\145\x20\143\x6f\x75\154\x64\40\156\157\164\40\x73\x69\147\156\x20\x79\157\165\x20\x69\x6e\x2e\40\120\x6c\x65\141\x73\x65\40\143\x6f\x6e\x74\x61\x63\164\x20\x79\157\x75\162\40\101\x64\x6d\x69\156\151\163\x74\162\x61\x74\157\162\x2e\74\x2f\146\157\156\164\76\x3c\x2f\144\x69\x76\76";
        delete_option("\155\157\x5f\163\x61\155\154\x5f\x72\145\144\x69\162\145\x63\164\137\145\x72\162\x6f\x72\137\143\157\144\x65");
        delete_option("\x6d\x6f\x5f\x73\141\155\x6c\137\x72\145\144\151\x72\x65\x63\x74\x5f\145\x72\162\x6f\x72\x5f\x72\145\x61\x73\157\x6e");
        Tj:
        echo "\x9\74\57\165\x6c\x3e\xd\xa\x9\x9\74\57\x66\x6f\162\x6d\76";
        Va:
    }
    public function mo_saml_check_empty_or_null_val($St)
    {
        if (!(!isset($St) || empty($St))) {
            goto yh;
        }
        return true;
        yh:
        return false;
    }
    public function mo_saml_widget_init()
    {
        if (!(defined("\x57\120\137\x43\x4c\111") && WP_CLI)) {
            goto FA;
        }
        require_once dirname(__FILE__) . "\57\155\x6f\x2d\163\141\155\x6c\55\167\x70\x2d\143\154\x69\x2d\x63\x6f\x6d\x6d\141\x6e\144\x73\56\160\150\x70";
        FA:
        if (!(isset($_REQUEST["\157\160\164\x69\157\156"]) and $_REQUEST["\x6f\160\164\151\157\156"] == "\163\141\155\x6c\x5f\165\x73\x65\162\x5f\154\157\147\157\x75\164")) {
            goto gi;
        }
        $user = is_user_logged_in() ? wp_get_current_user() : null;
        if (empty($user)) {
            goto mS;
        }
        wp_logout();
        mS:
        gi:
    }
    function mo_saml_logout($eb)
    {
        $user = get_user_by("\x69\x64", $eb);
        $lh = htmlspecialchars_decode(LicenseHelper::getCurrentOption(mo_options_enum_service_provider::Logout_URL));
        $X6 = LicenseHelper::getCurrentOption(mo_options_enum_service_provider::Logout_binding_type);
        $mf = wp_get_referer();
        $yE = get_option("\155\x6f\137\x73\141\155\x6c\137\163\160\x5f\x62\141\163\145\137\165\162\154");
        $AX = false;
        if (!(isset($_COOKIE["\154\x6f\x67\x67\145\144\137\x69\156\x5f\x77\x69\164\x68\137\x69\144\x70"]) and !empty($_COOKIE["\x6c\x6f\147\147\x65\144\x5f\x69\x6e\x5f\x77\151\164\150\x5f\x69\x64\x70"]))) {
            goto cB;
        }
        $AX = true;
        cB:
        if (!(!session_id() || session_id() == '' || !isset($_SESSION))) {
            goto sg;
        }
        session_start();
        sg:
        if (!empty($mf)) {
            goto c0;
        }
        $mf = !empty($yE) ? $yE : home_url();
        c0:
        if (empty($lh)) {
            goto y0;
        }
        if (isset($_SESSION["\155\x6f\137\163\141\155\154\x5f\154\x6f\x67\157\165\164\x5f\162\x65\x71\x75\x65\163\164"])) {
            goto Wd;
        }
        if (isset($_SESSION["\x6d\157\137\x73\x61\x6d\x6c"]["\154\157\x67\x67\145\144\x5f\x69\x6e\137\x77\151\164\150\x5f\x69\x64\x70"]) || $AX) {
            goto Qs;
        }
        goto W0;
        Wd:
        self::createLogoutResponseAndRedirect($lh, $X6);
        exit;
        goto W0;
        Qs:
        $current_user = $user;
        if (isset($_SESSION["\x6d\x6f\x5f\x67\x75\x65\x73\164\x5f\x6c\157\147\151\156"]["\x6e\141\155\x65\111\104"])) {
            goto d3;
        }
        if (isset($_COOKIE["\156\x61\155\145\x49\104"])) {
            goto ca;
        }
        $vk = get_user_meta($current_user->ID, "\x6d\x6f\x5f\x73\141\x6d\x6c\x5f\x6e\141\155\145\x5f\x69\144");
        goto N8;
        ca:
        $vk = $_COOKIE["\156\141\x6d\x65\111\x44"];
        N8:
        goto nO;
        d3:
        $vk = $_SESSION["\155\157\x5f\147\165\145\163\164\x5f\154\157\147\151\156"]["\x6e\141\155\145\x49\104"];
        nO:
        if (isset($_SESSION["\x6d\157\137\x67\165\145\163\x74\137\154\157\147\x69\x6e"]["\163\x65\163\x73\x69\157\x6e\111\156\x64\145\x78"])) {
            goto Dd;
        }
        if (isset($_COOKIE["\163\x65\x73\163\x69\x6f\156\x49\156\x64\x65\x78"])) {
            goto oL;
        }
        $U2 = get_user_meta($current_user->ID, "\155\157\137\163\x61\155\x6c\137\x73\145\x73\163\151\157\x6e\x5f\x69\156\144\x65\170");
        goto mN;
        oL:
        $U2 = $_COOKIE["\x73\x65\163\x73\x69\157\x6e\x49\156\x64\x65\x78"];
        mN:
        goto wt;
        Dd:
        $U2 = $_SESSION["\155\x6f\x5f\x67\x75\145\163\x74\x5f\154\157\147\151\156"]["\x73\145\163\x73\x69\x6f\156\x49\x6e\144\145\x78"];
        wt:
        if (empty($vk)) {
            goto ow;
        }
        unset($_SESSION["\x6d\157\137\163\141\x6d\154"]);
        unset($_SESSION["\x6d\157\137\x67\x75\x65\x73\164\x5f\x6c\x6f\147\x69\156"]);
        unset($_COOKIE["\154\x6f\x67\x67\x65\144\137\151\156\137\x77\151\164\x68\137\151\x64\160"]);
        setcookie("\x6c\x6f\x67\147\x65\x64\137\151\156\x5f\x77\x69\x74\150\137\x69\x64\x70", '', time() - 3600, "\57");
        setcookie("\x6e\141\155\145\111\104", '', time() - 3600, "\x2f");
        setcookie("\x73\x65\163\163\151\157\156\111\x6e\144\x65\x78", '', time() - 3600, "\x2f");
        mo_saml_create_logout_request($vk, $U2, $lh, $X6, $mf);
        ow:
        W0:
        y0:
        if (!isset($_SESSION["\x6d\157\x5f\x67\x75\x65\x73\164\x5f\x6c\x6f\147\x69\156"]["\156\141\155\x65\111\104"])) {
            goto BV;
        }
        unset($_SESSION["\x6d\x6f\137\147\x75\145\x73\164\137\x6c\x6f\147\151\156"]);
        setcookie("\156\141\x6d\145\111\104", '', time() - 3600, "\57");
        setcookie("\x73\145\x73\163\x69\157\156\111\156\x64\145\170", '', time() - 3600, "\x2f");
        BV:
        $ZB = get_option("\x6d\157\137\x73\x61\x6d\154\137\154\157\x67\x6f\x75\164\137\162\x65\x6c\141\x79\x5f\x73\x74\x61\164\x65");
        if (empty($ZB)) {
            goto Pg;
        }
        wp_redirect($ZB);
        exit;
        Pg:
        wp_redirect($mf);
        exit;
    }
    function createLogoutResponseAndRedirect($lh, $X6)
    {
        $yE = get_option("\x6d\x6f\x5f\x73\141\x6d\x6c\137\x73\160\137\x62\141\x73\x65\x5f\x75\162\154");
        if (!empty($yE)) {
            goto jY;
        }
        $yE = home_url();
        jY:
        $sV = $_SESSION["\x6d\x6f\137\163\141\x6d\x6c\x5f\154\157\147\x6f\x75\x74\x5f\162\145\161\x75\x65\163\x74"];
        $bs = $_SESSION["\155\x6f\x5f\163\x61\x6d\x6c\x5f\x6c\157\x67\157\x75\x74\x5f\162\x65\x6c\x61\171\x5f\163\x74\141\164\x65"];
        unset($_SESSION["\x6d\x6f\x5f\x73\x61\155\154\137\x6c\x6f\x67\157\165\x74\x5f\162\145\161\x75\145\x73\x74"]);
        unset($_SESSION["\155\157\x5f\x73\141\x6d\x6c\x5f\x6c\x6f\x67\157\165\x74\137\162\145\154\141\171\137\x73\164\141\x74\145"]);
        $QQ = new DOMDocument();
        $QQ->loadXML($sV);
        $sV = $QQ->firstChild;
        if (!($sV->localName == "\114\x6f\147\157\x75\164\122\x65\x71\x75\x65\163\164")) {
            goto Z_;
        }
        $bb = new SAML2SPLogoutRequest($sV);
        $lF = get_option("\x6d\x6f\x5f\163\141\x6d\x6c\137\x73\160\x5f\x65\156\164\151\x74\x79\137\x69\x64");
        if (!empty($lF)) {
            goto kB;
        }
        $lF = $yE . "\57\167\x70\x2d\x63\157\x6e\x74\x65\156\164\x2f\x70\x6c\165\147\151\156\x73\57\x6d\151\x6e\x69\157\x72\x61\x6e\147\x65\x2d\163\x61\x6d\x6c\x2d\62\x30\x2d\163\x69\156\x67\x6c\145\55\x73\151\147\156\x2d\x6f\x6e\x2f";
        kB:
        $P9 = $lh;
        $NM = SAMLSPUtilities::createLogoutResponse($bb->getId(), $lF, $P9, $X6);
        if (empty($X6) || $X6 == "\x48\x74\164\x70\x52\x65\144\151\162\145\143\164") {
            goto WA;
        }
        if (!(LicenseHelper::getCurrentOption(mo_options_enum_service_provider::Request_signed) != "\143\x68\145\143\x6b\145\144")) {
            goto Me;
        }
        $dC = base64_encode($NM);
        SAMLSPUtilities::postSAMLResponse($lh, $dC, $bs);
        exit;
        Me:
        $ZU = '';
        $py = '';
        $dC = SAMLSPUtilities::signXML($NM, "\123\x74\x61\x74\165\163");
        SAMLSPUtilities::postSAMLResponse($lh, $dC, $bs);
        goto po;
        WA:
        $cH = $lh;
        if (strpos($lh, "\77") !== false) {
            goto tU;
        }
        $cH .= "\x3f";
        goto Ur;
        tU:
        $cH .= "\x26";
        Ur:
        if (!(LicenseHelper::getCurrentOption(mo_options_enum_service_provider::Request_signed) != "\143\x68\x65\143\x6b\x65\x64")) {
            goto Qx;
        }
        $cH .= "\x53\101\115\114\122\x65\163\x70\157\156\163\145\x3d" . $NM . "\x26\122\145\x6c\x61\x79\x53\164\141\164\145\x3d" . urlencode($bs);
        header("\114\x6f\x63\141\164\151\x6f\156\72\40" . $cH);
        exit;
        Qx:
        $Xo = "\123\x41\115\114\122\x65\163\160\157\x6e\163\145\75" . $NM . "\46\x52\145\154\x61\171\123\x74\141\x74\145\x3d" . urlencode($bs) . "\x26\x53\x69\147\x41\154\x67\x3d" . urlencode(XMLSecurityKey::RSA_SHA256);
        $Sa = array("\x74\171\x70\x65" => "\160\x72\x69\166\141\164\145");
        $U6 = new XMLSecurityKey(XMLSecurityKey::RSA_SHA256, $Sa);
        $ST = get_option("\x6d\x6f\x5f\163\x61\x6d\154\x5f\143\x75\x72\162\x65\156\x74\137\x63\x65\162\164\x5f\160\162\x69\166\x61\x74\x65\x5f\153\x65\x79");
        $U6->loadKey($ST, FALSE);
        $aA = new XMLSecurityDSig();
        $Ju = $U6->signData($Xo);
        $Ju = base64_encode($Ju);
        $cH .= $Xo . "\x26\123\x69\x67\156\141\x74\165\162\x65\75" . urlencode($Ju);
        header("\x4c\157\x63\x61\x74\x69\157\x6e\x3a\40" . $cH);
        exit;
        po:
        Z_:
    }
}
function mo_saml_create_logout_request($vk, $U2, $lh, $X6, $mf)
{
    $yE = get_option("\155\x6f\x5f\163\x61\x6d\x6c\x5f\x73\x70\137\142\x61\163\x65\137\x75\x72\154");
    if (!empty($yE)) {
        goto fv;
    }
    $yE = home_url();
    fv:
    $lF = get_option("\x6d\x6f\x5f\x73\x61\x6d\154\x5f\x73\160\137\x65\x6e\164\151\x74\x79\x5f\x69\x64");
    if (!empty($lF)) {
        goto Nc;
    }
    $lF = $yE . "\x2f\167\160\55\x63\157\x6e\164\x65\156\164\57\x70\x6c\165\147\151\156\x73\57\155\x69\156\x69\x6f\x72\141\x6e\147\x65\x2d\163\141\155\154\55\x32\x30\55\x73\151\156\147\x6c\145\x2d\x73\151\x67\x6e\55\157\x6e\57";
    Nc:
    $P9 = $lh;
    $g1 = $mf;
    $g1 = mo_saml_get_relay_state($g1);
    $Xo = SAMLSPUtilities::createLogoutRequest($vk, $lF, $P9, $U2, $X6);
    if (empty($X6) || $X6 == "\x48\x74\x74\160\122\x65\144\x69\162\145\x63\164") {
        goto Aj;
    }
    if (!(LicenseHelper::getCurrentOption(mo_options_enum_service_provider::Request_signed) != "\x63\x68\x65\143\x6b\145\x64")) {
        goto wy;
    }
    $dC = base64_encode($Xo);
    SAMLSPUtilities::postSAMLRequest($lh, $dC, $g1);
    exit;
    wy:
    $ZU = '';
    $py = '';
    $dC = SAMLSPUtilities::signXML($Xo, "\x4e\x61\x6d\x65\x49\104");
    SAMLSPUtilities::postSAMLRequest($lh, $dC, $g1);
    goto Kp;
    Aj:
    $cH = $lh;
    if (strpos($lh, "\x3f") !== false) {
        goto tu;
    }
    $cH .= "\77";
    goto l9;
    tu:
    $cH .= "\46";
    l9:
    if (!(LicenseHelper::getCurrentOption(mo_options_enum_service_provider::Request_signed) != "\x63\x68\145\143\x6b\x65\144")) {
        goto pe;
    }
    $cH .= "\x53\x41\115\114\x52\x65\161\x75\x65\x73\x74\x3d" . $Xo . "\46\x52\145\x6c\x61\171\x53\164\x61\164\145\x3d" . urlencode($g1);
    header("\x4c\157\x63\141\164\x69\157\x6e\72\40" . $cH);
    exit;
    pe:
    $Xo = "\123\x41\115\x4c\122\145\161\165\x65\163\164\x3d" . $Xo . "\x26\x52\x65\154\x61\x79\x53\x74\x61\x74\x65\75" . urlencode($g1) . "\x26\x53\151\147\x41\154\147\75" . urlencode(XMLSecurityKey::RSA_SHA256);
    $Sa = array("\x74\x79\x70\145" => "\160\162\151\166\141\164\x65");
    $U6 = new XMLSecurityKey(XMLSecurityKey::RSA_SHA256, $Sa);
    $ST = get_option("\155\157\137\x73\141\x6d\x6c\137\143\165\x72\162\x65\156\164\137\143\x65\162\x74\x5f\160\x72\151\166\141\x74\145\x5f\153\x65\x79");
    $U6->loadKey($ST, FALSE);
    $aA = new XMLSecurityDSig();
    $Ju = $U6->signData($Xo);
    $Ju = base64_encode($Ju);
    $cH .= $Xo . "\46\x53\x69\147\x6e\141\164\165\162\x65\75" . urlencode($Ju);
    header("\114\x6f\143\141\164\x69\157\x6e\x3a\x20" . $cH);
    exit;
    Kp:
}
function mo_login_validate()
{
    if (!(isset($_REQUEST["\157\160\164\151\x6f\156"]) && $_REQUEST["\157\x70\x74\151\157\156"] == "\155\157\163\141\155\154\137\x6d\x65\x74\x61\144\141\x74\x61")) {
        goto xI;
    }
    miniorange_generate_metadata();
    xI:
    if (!(isset($_REQUEST["\157\x70\x74\151\157\x6e"]) && $_REQUEST["\x6f\160\x74\x69\x6f\x6e"] == "\145\x78\160\157\x72\164\137\143\157\156\x66\x69\x67\x75\x72\x61\x74\151\x6f\x6e")) {
        goto Uu;
    }
    if (!current_user_can("\x6d\x61\156\x61\x67\145\137\157\160\x74\x69\x6f\156\x73")) {
        goto Qq;
    }
    miniorange_import_export(true);
    Qq:
    exit;
    Uu:
    if (!mo_saml_is_customer_license_verified()) {
        goto qo5;
    }
    if (!(isset($_REQUEST["\x6f\160\x74\151\157\156"]) && $_REQUEST["\x6f\160\164\151\x6f\x6e"] == "\x73\x61\x6d\x6c\x5f\165\163\145\x72\137\154\157\147\151\156" || isset($_REQUEST["\157\160\x74\151\x6f\156"]) && $_REQUEST["\x6f\160\x74\151\x6f\x6e"] == "\x74\145\163\x74\x69\144\160\143\157\156\x66\151\147" || isset($_REQUEST["\x6f\160\x74\x69\x6f\156"]) && $_REQUEST["\x6f\x70\x74\151\x6f\x6e"] == "\x67\145\x74\163\141\x6d\x6c\x72\x65\161\165\145\163\164" || isset($_REQUEST["\x6f\160\164\x69\157\x6e"]) && $_REQUEST["\157\160\164\x69\157\x6e"] == "\x67\x65\x74\163\x61\155\x6c\162\x65\x73\160\x6f\x6e\163\x65")) {
        goto Za;
    }
    if (!mo_saml_is_sp_configured()) {
        goto TU;
    }
    if (!(is_user_logged_in() && $_REQUEST["\157\x70\164\151\157\156"] == "\163\141\155\154\x5f\165\x73\145\162\x5f\x6c\x6f\147\x69\x6e")) {
        goto PZ;
    }
    if (!isset($_REQUEST["\x72\x65\x64\x69\162\145\143\x74\137\x74\x6f"])) {
        goto IV;
    }
    $x4 = htmlspecialchars($_REQUEST["\162\x65\144\x69\x72\145\x63\x74\x5f\x74\157"]);
    wp_safe_redirect($x4);
    exit;
    IV:
    return;
    PZ:
    $yE = get_option("\x6d\x6f\x5f\163\141\155\154\137\x73\x70\x5f\x62\141\x73\x65\x5f\165\x72\154");
    if (!empty($yE)) {
        goto OH;
    }
    $yE = home_url();
    OH:
    if (isset($_REQUEST["\x69\x64\160"]) and !empty($_REQUEST["\151\144\160"])) {
        goto j9;
    }
    $vG = '';
    goto lg;
    j9:
    $vG = htmlspecialchars($_REQUEST["\151\144\160"]);
    lg:
    if ($_REQUEST["\157\160\164\x69\x6f\x6e"] == "\x74\x65\163\x74\151\x64\x70\x63\157\x6e\x66\x69\x67" and array_key_exists("\156\145\x77\x63\145\162\164", $_REQUEST)) {
        goto Qz;
    }
    if ($_REQUEST["\x6f\160\164\x69\x6f\156"] == "\164\x65\163\x74\x69\x64\x70\x63\x6f\x6e\146\x69\147") {
        goto at;
    }
    if ($_REQUEST["\157\x70\x74\x69\157\x6e"] == "\x67\x65\x74\x73\141\x6d\154\162\145\161\x75\145\163\x74") {
        goto A2;
    }
    if ($_REQUEST["\157\160\164\x69\157\156"] == "\147\x65\x74\x73\141\x6d\154\x72\x65\x73\x70\157\x6e\163\x65") {
        goto R1;
    }
    if (get_option("\155\x6f\137\x73\x61\x6d\x6c\137\162\x65\x6c\141\171\137\x73\164\141\164\145") && get_option("\x6d\157\x5f\x73\141\x6d\154\x5f\162\x65\154\x61\x79\x5f\x73\164\141\x74\x65") != '') {
        goto Ho;
    }
    if (isset($_REQUEST["\162\145\144\x69\162\145\x63\x74\x5f\164\x6f"])) {
        goto CN;
    }
    $g1 = wp_get_referer();
    goto Lj;
    CN:
    $g1 = htmlspecialchars($_REQUEST["\x72\x65\x64\x69\x72\145\x63\x74\137\164\157"]);
    Lj:
    goto VS;
    Ho:
    $g1 = get_option("\155\157\137\x73\x61\155\x6c\137\x72\145\154\141\x79\x5f\163\164\x61\164\x65");
    VS:
    goto U7;
    R1:
    $g1 = "\144\x69\x73\160\154\x61\x79\123\101\x4d\114\x52\x65\x73\160\157\156\163\x65";
    U7:
    goto yL;
    A2:
    $g1 = "\x64\x69\163\160\x6c\x61\171\123\101\x4d\114\122\145\161\165\x65\163\x74";
    yL:
    goto M1;
    at:
    $g1 = "\164\145\163\164\x56\141\154\151\x64\x61\164\x65";
    M1:
    goto Fl;
    Qz:
    $g1 = "\x74\x65\163\164\x4e\x65\x77\103\145\x72\x74\151\146\x69\x63\x61\x74\x65";
    Fl:
    if (!empty($g1)) {
        goto DD;
    }
    $g1 = $yE;
    DD:
    $wW = htmlspecialchars_decode(LicenseHelper::getCurrentOption(mo_options_enum_service_provider::Login_URL));
    $fA = LicenseHelper::getCurrentOption(mo_options_enum_service_provider::Login_binding_type);
    $Fh = get_option("\155\x6f\137\163\x61\155\154\137\146\x6f\x72\x63\145\137\x61\165\x74\x68\x65\x6e\x74\x69\143\x61\x74\151\157\x6e");
    $zj = $yE . "\57";
    $lF = get_option("\x6d\157\137\x73\141\x6d\154\137\x73\x70\137\145\x6e\164\151\164\171\x5f\x69\x64");
    $O4 = LicenseHelper::getCurrentOption(mo_options_enum_service_provider::NameID_Format);
    if (!empty($O4)) {
        goto vP;
    }
    $O4 = "\x31\x2e\x31\72\156\x61\155\145\151\144\55\146\157\x72\155\141\x74\x3a\165\x6e\x73\x70\x65\x63\x69\x66\x69\x65\144";
    vP:
    if (!empty($lF)) {
        goto K4;
    }
    $lF = $yE . "\57\x77\160\x2d\x63\x6f\x6e\x74\x65\x6e\164\x2f\x70\154\x75\147\151\x6e\x73\57\155\151\x6e\x69\x6f\x72\141\x6e\147\x65\55\x73\141\155\154\x2d\x32\60\x2d\163\151\x6e\x67\154\x65\x2d\x73\x69\147\156\x2d\x6f\x6e\57";
    K4:
    $Xo = SAMLSPUtilities::createAuthnRequest($zj, $lF, $wW, $Fh, $fA, $O4);
    if (!($g1 == "\x64\151\163\x70\x6c\x61\171\x53\x41\115\114\122\x65\x71\165\x65\x73\164")) {
        goto ZB;
    }
    mo_saml_show_SAML_log(SAMLSPUtilities::createAuthnRequest($zj, $lF, $wW, $Fh, "\110\124\124\x50\x50\157\x73\164", $O4), $g1);
    ZB:
    $cH = $wW;
    if (strpos($wW, "\77") !== false) {
        goto Ic;
    }
    $cH .= "\x3f";
    goto vL;
    Ic:
    $cH .= "\x26";
    vL:
    cldjkasjdksalc();
    $g1 = mo_saml_get_relay_state($g1);
    $g1 = empty($g1) ? "\57" : $g1;
    if (empty($fA) || $fA == "\110\x74\x74\160\122\x65\144\151\162\x65\x63\164") {
        goto R7;
    }
    if (!(LicenseHelper::getCurrentOption(mo_options_enum_service_provider::Request_signed) != "\x63\x68\145\x63\153\145\x64")) {
        goto bu;
    }
    $dC = base64_encode($Xo);
    SAMLSPUtilities::postSAMLRequest($wW, $dC, $g1);
    exit;
    bu:
    $ZU = '';
    $py = '';
    if ($_REQUEST["\157\x70\164\151\x6f\156"] == "\x74\145\163\x74\x69\144\x70\x63\157\x6e\x66\x69\x67" && array_key_exists("\156\145\167\x63\145\x72\x74", $_REQUEST)) {
        goto Cc;
    }
    $dC = SAMLSPUtilities::signXML($Xo, "\116\x61\x6d\145\x49\x44\120\157\154\x69\x63\171");
    goto Un;
    Cc:
    $dC = SAMLSPUtilities::signXML($Xo, "\116\x61\x6d\145\x49\x44\120\157\x6c\151\x63\x79", true);
    Un:
    SAMLSPUtilities::postSAMLRequest($wW, $dC, $g1, $vG);
    update_option("\155\x6f\137\x73\141\x6d\154\137\156\145\x77\137\x63\145\162\164\137\x74\145\163\164", true);
    goto F1;
    R7:
    if (!(LicenseHelper::getCurrentOption(mo_options_enum_service_provider::Request_signed) != "\143\x68\x65\x63\153\145\x64")) {
        goto wr;
    }
    $cH .= "\x53\x41\x4d\114\x52\x65\161\165\x65\163\x74\75" . $Xo . "\46\122\145\154\141\171\123\164\141\164\145\75" . urlencode($g1);
    if (empty($vG)) {
        goto dH;
    }
    $cH .= "\46\x75\x73\x65\x72\116\x61\155\145\75" . $vG;
    dH:
    header("\143\141\143\150\145\55\143\x6f\156\164\x72\x6f\154\72\40\155\141\170\55\x61\147\x65\75\x30\x2c\40\160\162\x69\x76\141\164\x65\x2c\40\x6e\157\x2d\163\164\x6f\x72\x65\54\40\x6e\x6f\x2d\x63\x61\x63\x68\145\54\40\x6d\165\x73\x74\x2d\162\145\x76\x61\154\151\x64\x61\x74\145");
    header("\x4c\157\x63\141\x74\151\157\156\x3a\x20" . $cH);
    exit;
    wr:
    $Xo = "\x53\101\x4d\x4c\122\145\x71\165\x65\x73\164\x3d" . $Xo . "\x26\122\x65\154\x61\x79\123\x74\x61\164\x65\75" . urlencode($g1) . "\46\x53\x69\147\x41\154\147\x3d" . urlencode(XMLSecurityKey::RSA_SHA256);
    $Sa = array("\164\171\x70\145" => "\x70\162\x69\166\x61\x74\x65");
    $U6 = new XMLSecurityKey(XMLSecurityKey::RSA_SHA256, $Sa);
    if ($_REQUEST["\157\160\164\x69\157\156"] == "\x74\x65\163\164\x69\144\160\x63\157\x6e\x66\x69\147" && array_key_exists("\156\x65\167\x63\145\x72\164", $_REQUEST)) {
        goto It;
    }
    $ST = get_option("\x6d\157\137\x73\141\x6d\x6c\x5f\x63\165\x72\x72\x65\x6e\164\137\143\145\x72\164\x5f\x70\162\x69\166\x61\164\x65\x5f\153\145\x79");
    goto o3;
    It:
    $ST = file_get_contents(plugin_dir_path(__FILE__) . "\x72\x65\x73\x6f\x75\162\x63\145\163" . DIRECTORY_SEPARATOR . "\155\x69\156\151\157\162\141\156\147\145\55\x73\x70\55\143\145\162\164\x69\x66\x69\x63\x61\x74\x65\55\160\x72\151\x76\56\x6b\145\x79");
    o3:
    $U6->loadKey($ST, FALSE);
    $aA = new XMLSecurityDSig();
    $Ju = $U6->signData($Xo);
    $Ju = base64_encode($Ju);
    $cH .= $Xo . "\x26\x53\x69\x67\x6e\141\x74\165\x72\x65\x3d" . urlencode($Ju);
    if (empty($vG)) {
        goto Po;
    }
    $cH .= "\x26\x75\x73\145\162\x4e\x61\155\x65\75" . $vG;
    Po:
    header("\x63\x61\x63\150\145\x2d\x63\x6f\x6e\x74\162\157\154\x3a\40\x6d\x61\170\55\x61\147\x65\x3d\60\54\40\x70\x72\151\166\x61\x74\145\54\40\x6e\157\x2d\163\164\x6f\162\145\x2c\x20\156\x6f\55\x63\x61\x63\x68\145\54\x20\x6d\165\x73\164\x2d\162\x65\166\141\x6c\151\x64\141\x74\145");
    header("\x4c\x6f\x63\x61\x74\151\x6f\156\72\x20" . $cH);
    exit;
    F1:
    TU:
    Za:
    if (!(array_key_exists("\123\101\115\x4c\x52\x65\163\x70\157\156\x73\145", $_REQUEST) && !empty($_REQUEST["\x53\x41\x4d\x4c\122\x65\163\x70\157\156\x73\145"]))) {
        goto LPU;
    }
    if (array_key_exists("\122\x65\x6c\x61\171\123\164\x61\164\x65", $_POST) && !empty($_POST["\122\145\x6c\141\171\123\164\141\x74\x65"]) && $_POST["\x52\x65\154\141\x79\123\164\x61\164\x65"] != "\x2f") {
        goto ou;
    }
    $IJ = '';
    goto AH;
    ou:
    $IJ = $_POST["\x52\145\154\x61\x79\123\164\141\164\145"];
    AH:
    $yE = get_option("\x6d\157\137\x73\141\155\x6c\x5f\163\x70\137\x62\141\163\145\x5f\165\162\x6c");
    if (!empty($yE)) {
        goto RH;
    }
    $yE = home_url();
    RH:
    $Yr = htmlspecialchars($_REQUEST["\123\x41\x4d\x4c\x52\145\163\160\157\x6e\163\145"]);
    $Yr = base64_decode($Yr);
    if (!($IJ == "\144\151\163\160\154\x61\x79\123\x41\x4d\114\122\x65\x73\x70\x6f\x6e\x73\145")) {
        goto Iz;
    }
    mo_saml_show_SAML_log($Yr, $IJ);
    Iz:
    if (!(array_key_exists("\x53\x41\115\114\122\x65\163\x70\157\x6e\163\145", $_GET) && !empty($_GET["\x53\x41\x4d\114\x52\x65\x73\160\x6f\156\x73\x65"]))) {
        goto ck;
    }
    $Yr = gzinflate($Yr);
    ck:
    $QQ = new DOMDocument();
    $QQ->loadXML($Yr);
    $q3 = $QQ->firstChild;
    $Ud = $QQ->documentElement;
    $PQ = new DOMXpath($QQ);
    $PQ->registerNamespace("\x73\x61\x6d\154\x70", "\x75\x72\x6e\x3a\x6f\x61\163\151\163\x3a\x6e\x61\x6d\x65\x73\x3a\x74\x63\x3a\x53\101\x4d\x4c\72\x32\56\x30\x3a\160\162\x6f\x74\157\143\x6f\x6c");
    $PQ->registerNamespace("\x73\141\x6d\154", "\x75\x72\156\72\x6f\x61\x73\x69\163\72\x6e\141\x6d\x65\x73\x3a\164\143\x3a\x53\101\115\114\x3a\62\x2e\x30\72\x61\163\163\x65\162\164\151\x6f\156");
    if ($q3->localName == "\x4c\157\147\x6f\x75\x74\x52\x65\163\160\x6f\x6e\163\x65") {
        goto nA9;
    }
    $hh = $PQ->query("\x2f\x73\141\x6d\x6c\160\72\122\x65\163\x70\157\156\163\145\x2f\163\141\155\x6c\160\x3a\x53\164\141\164\x75\163\57\x73\x61\155\154\160\72\123\x74\x61\x74\165\x73\x43\x6f\144\145", $Ud);
    $Em = $hh->item(0)->getAttribute("\126\x61\x6c\165\145");
    $sr = $PQ->query("\57\x73\x61\155\154\x70\x3a\x52\x65\x73\160\x6f\x6e\x73\x65\x2f\x73\x61\x6d\x6c\160\72\x53\164\x61\164\x75\x73\57\x73\141\x6d\x6c\160\72\123\x74\x61\x74\x75\x73\x4d\145\x73\x73\x61\147\145", $Ud)->item(0);
    if (empty($sr)) {
        goto ak0;
    }
    $sr = $sr->nodeValue;
    ak0:
    $Rg = explode("\x3a", $Em);
    $hh = $Rg[7];
    if (array_key_exists("\122\145\x6c\x61\171\x53\164\x61\x74\x65", $_POST) && !empty($_POST["\x52\145\154\x61\171\123\164\x61\164\145"]) && $_POST["\x52\x65\154\141\171\123\x74\141\x74\x65"] != "\57") {
        goto BDq;
    }
    $IJ = '';
    goto a3d;
    BDq:
    $IJ = $_POST["\122\145\154\141\x79\123\164\x61\x74\x65"];
    a3d:
    if (!($hh != "\x53\165\x63\143\145\x73\163")) {
        goto N4Y;
    }
    show_status_error($hh, $IJ, $sr);
    N4Y:
    $Le = maybe_unserialize(LicenseHelper::getCurrentOption(mo_options_enum_service_provider::X509_certificate));
    $zj = $yE . "\57";
    update_option("\x6d\x6f\137\163\x61\155\x6c\137\162\145\163\160\157\x6e\163\x65", base64_encode($Yr));
    if ($IJ == "\x74\145\x73\x74\x4e\x65\167\x43\x65\162\x74\x69\x66\x69\x63\141\x74\x65") {
        goto Kf0;
    }
    $Yr = new SAML2SPResponse($q3, get_option("\155\157\137\163\141\155\x6c\x5f\x63\x75\x72\162\145\x6e\164\x5f\143\145\x72\164\137\160\162\x69\x76\x61\x74\x65\x5f\x6b\x65\x79"));
    goto ypy;
    Kf0:
    $Dt = file_get_contents(plugin_dir_path(__FILE__) . "\162\x65\163\x6f\165\162\x63\x65\x73" . DIRECTORY_SEPARATOR . "\155\x69\x6e\x69\157\162\x61\x6e\147\x65\55\x73\160\x2d\x63\x65\162\164\x69\x66\x69\x63\x61\x74\x65\x2d\x70\162\x69\x76\56\x6b\x65\171");
    $Yr = new SAML2SPResponse($q3, $Dt);
    ypy:
    $Ai = $Yr->getSignatureData();
    $fZ = current($Yr->getAssertions())->getSignatureData();
    if (!(empty($fZ) && empty($Ai))) {
        goto vhp;
    }
    if ($IJ == "\x74\145\163\x74\126\x61\154\x69\144\x61\x74\145" or $IJ == "\164\x65\163\164\x4e\x65\167\103\x65\162\x74\x69\146\x69\143\x61\x74\x65") {
        goto D82;
    }
    wp_die("\x57\145\x20\x63\x6f\165\154\x64\x20\x6e\157\x74\40\163\x69\x67\x6e\40\171\x6f\165\40\x69\156\56\40\120\154\145\141\163\x65\40\143\157\x6e\164\141\x63\164\x20\x61\x64\x6d\x69\156\x69\163\164\x72\x61\164\x6f\x72", "\105\162\162\x6f\x72\72\40\x49\156\x76\x61\x6c\151\144\40\123\x41\x4d\x4c\x20\x52\145\163\160\x6f\x6e\163\x65");
    goto z9g;
    D82:
    $vR = mo_options_error_constants::Error_no_certificate;
    $ZY = mo_options_error_constants::Cause_no_certificate;
    echo "\74\x64\151\166\x20\163\x74\171\x6c\145\75\x22\x66\157\x6e\164\x2d\146\x61\155\x69\x6c\171\x3a\103\x61\x6c\x69\x62\162\x69\73\x70\x61\x64\144\x69\x6e\147\x3a\60\x20\63\45\x3b\x22\x3e\xd\xa\x9\11\11\x9\74\x64\151\x76\x20\x73\x74\x79\154\145\75\x22\143\x6f\x6c\x6f\162\x3a\x20\x23\141\71\64\64\64\62\73\142\x61\x63\153\147\x72\157\165\156\144\55\143\x6f\x6c\157\x72\72\40\x23\146\62\144\x65\x64\x65\73\x70\x61\x64\144\x69\x6e\x67\72\40\x31\x35\160\x78\x3b\155\141\162\147\x69\x6e\x2d\142\157\164\x74\x6f\155\72\x20\x32\x30\x70\170\x3b\164\145\x78\164\55\141\x6c\151\147\x6e\x3a\143\x65\x6e\x74\145\x72\73\x62\x6f\x72\144\x65\x72\x3a\61\x70\x78\x20\163\x6f\x6c\151\x64\x20\43\105\66\x42\x33\102\62\73\146\x6f\x6e\x74\x2d\x73\151\172\145\x3a\61\70\x70\x74\x3b\x22\x3e\40\x45\122\122\117\x52\74\57\144\151\166\x3e\15\xa\x9\x9\x9\11\x3c\144\x69\166\40\x73\164\171\x6c\x65\x3d\x22\x63\x6f\x6c\x6f\x72\x3a\40\43\x61\71\64\64\x34\x32\x3b\x66\x6f\156\x74\55\163\x69\x7a\x65\x3a\61\64\160\x74\x3b\40\155\141\162\147\x69\156\x2d\x62\x6f\164\164\x6f\x6d\x3a\62\x30\160\x78\73\x22\x3e\x3c\x70\x3e\74\163\x74\162\157\x6e\147\76\x45\x72\x72\157\x72\x20\40\x3a" . esc_html($vR) . "\x20\74\57\x73\164\162\x6f\156\x67\76\74\x2f\160\76\15\xa\x9\11\x9\x9\xd\12\x9\11\11\11\74\x70\76\x3c\x73\164\x72\157\x6e\x67\76\120\157\163\163\x69\x62\x6c\145\x20\x43\x61\x75\x73\145\72\40" . esc_html($ZY) . "\x3c\x2f\163\x74\162\157\156\x67\76\x3c\x2f\160\x3e\15\xa\x9\11\11\11\15\xa\x9\11\x9\11\74\x2f\x64\151\166\76\74\x2f\144\151\x76\76";
    mo_saml_download_logs($vR, $ZY);
    exit;
    z9g:
    vhp:
    $yB = '';
    if (is_array($Le)) {
        goto fjU;
    }
    $rT = XMLSecurityKey::getRawThumbprint($Le);
    $rT = mo_saml_convert_to_windows_iconv($rT);
    $rT = preg_replace("\57\x5c\x73\x2b\57", '', $rT);
    if (empty($Ai)) {
        goto yLI;
    }
    $yB = SAMLSPUtilities::processResponse($zj, $rT, $Ai, $Yr, 0, $IJ);
    yLI:
    if (empty($fZ)) {
        goto epO;
    }
    $yB = SAMLSPUtilities::processResponse($zj, $rT, $fZ, $Yr, 0, $IJ);
    epO:
    goto Gb6;
    fjU:
    foreach ($Le as $U6 => $St) {
        $rT = XMLSecurityKey::getRawThumbprint($St);
        $rT = mo_saml_convert_to_windows_iconv($rT);
        $rT = preg_replace("\57\x5c\x73\53\57", '', $rT);
        if (empty($Ai)) {
            goto Jb8;
        }
        $yB = SAMLSPUtilities::processResponse($zj, $rT, $Ai, $Yr, $U6, $IJ);
        Jb8:
        if (empty($fZ)) {
            goto W8x;
        }
        $yB = SAMLSPUtilities::processResponse($zj, $rT, $fZ, $Yr, $U6, $IJ);
        W8x:
        if (!$yB) {
            goto a_2;
        }
        goto Yhp;
        a_2:
        EWx:
    }
    Yhp:
    Gb6:
    if ($Ai) {
        goto xgJ;
    }
    if ($fZ) {
        goto RKX;
    }
    goto cTQ;
    xgJ:
    $gf = $Ai["\x43\145\x72\x74\151\146\x69\x63\x61\164\145\x73"][0];
    goto cTQ;
    RKX:
    $gf = $fZ["\103\x65\x72\164\151\146\x69\143\x61\x74\145\163"][0];
    cTQ:
    if ($yB) {
        goto FL_;
    }
    if ($IJ == "\x74\x65\163\x74\x56\x61\154\x69\x64\x61\x74\x65" or $IJ == "\x74\145\163\164\x4e\x65\x77\x43\x65\162\x74\x69\x66\x69\143\x61\164\x65") {
        goto GMI;
    }
    wp_die("\x57\145\x20\x63\x6f\165\x6c\x64\x20\156\x6f\164\40\x73\x69\147\x6e\40\171\x6f\x75\x20\151\156\56\x20\120\x6c\x65\141\163\x65\40\x63\x6f\x6e\x74\141\143\164\x20\x79\x6f\x75\x72\x20\x61\144\x6d\x69\x6e\151\x73\x74\162\x61\x74\157\162", "\105\162\x72\x6f\162\x3a\40\x49\156\x76\141\154\x69\x64\x20\123\x41\x4d\x4c\40\x52\x65\163\160\x6f\156\163\145");
    goto asM;
    GMI:
    $vR = mo_options_error_constants::Error_wrong_certificate;
    $ZY = mo_options_error_constants::Cause_wrong_certificate;
    $m7 = "\55\55\55\55\55\x42\105\107\111\116\40\x43\x45\122\x54\111\x46\x49\x43\101\124\x45\55\x2d\x2d\55\55\x3c\142\x72\76" . chunk_split($gf, 64) . "\74\142\x72\x3e\55\55\55\x2d\x2d\105\116\104\40\103\x45\122\124\x49\106\111\103\x41\x54\105\x2d\55\55\55\55";
    echo "\x3c\144\151\166\40\x73\164\171\154\x65\75\x22\146\157\156\x74\55\146\x61\155\x69\154\171\x3a\103\x61\154\151\142\x72\151\x3b\160\x61\144\144\151\x6e\147\72\x30\40\x33\45\73\42\x3e";
    echo "\74\x64\151\x76\40\163\164\x79\x6c\x65\75\x22\143\x6f\154\x6f\162\72\x20\43\141\x39\64\64\x34\x32\x3b\142\x61\143\153\x67\162\x6f\165\156\144\x2d\143\x6f\154\x6f\x72\72\40\x23\146\62\144\145\x64\145\73\160\141\144\x64\x69\156\147\x3a\x20\61\x35\x70\x78\x3b\x6d\141\x72\x67\x69\156\x2d\142\157\164\164\x6f\155\x3a\40\62\x30\x70\170\73\x74\x65\x78\x74\x2d\x61\154\x69\x67\x6e\72\143\145\x6e\x74\145\162\73\x62\157\x72\x64\145\x72\72\x31\x70\x78\x20\163\157\154\151\144\40\43\x45\x36\x42\x33\x42\62\x3b\x66\157\x6e\164\55\x73\151\x7a\x65\x3a\x31\70\160\164\73\42\x3e\x20\105\x52\122\x4f\122\74\x2f\144\x69\x76\76\15\12\x9\11\x9\x3c\144\x69\x76\40\163\164\171\154\x65\75\42\x63\157\x6c\157\x72\72\x20\x23\x61\71\x34\64\64\x32\73\x66\157\x6e\x74\55\163\x69\x7a\145\72\x31\x34\x70\164\73\40\155\x61\162\147\151\156\55\142\157\x74\x74\x6f\x6d\x3a\x32\60\x70\170\73\42\76\x3c\160\x3e\x3c\163\164\162\x6f\156\x67\76\105\162\162\x6f\162\72\x20\74\x2f\163\x74\162\157\x6e\147\76\125\x6e\x61\142\x6c\x65\40\164\x6f\x20\x66\x69\x6e\144\x20\141\40\143\145\x72\x74\151\146\151\x63\141\x74\145\x20\x6d\141\x74\x63\x68\151\x6e\x67\40\164\x68\145\40\x63\x6f\x6e\146\151\147\x75\162\x65\x64\x20\146\x69\156\147\x65\162\x70\x72\151\x6e\x74\x2e\74\57\160\76\xd\xa\11\11\11\x3c\160\x3e\120\154\x65\141\163\145\x20\143\157\156\x74\x61\143\164\x20\171\157\165\x72\x20\x61\x64\155\151\156\151\163\164\162\141\164\157\162\x20\x61\x6e\144\40\x72\145\x70\x6f\162\x74\x20\x74\150\x65\40\146\x6f\x6c\154\x6f\167\151\156\x67\40\x65\162\x72\x6f\x72\72\74\x2f\x70\x3e\xd\xa\11\11\x9\74\x70\x3e\x3c\163\164\x72\x6f\x6e\x67\x3e\120\157\163\x73\151\x62\x6c\x65\40\x43\141\x75\163\145\x3a\40\x3c\x2f\x73\164\162\x6f\156\147\76\47\x58\56\65\60\x39\40\103\145\162\x74\151\x66\151\x63\141\x74\x65\47\40\146\x69\x65\x6c\144\x20\151\156\40\x70\x6c\165\x67\x69\x6e\40\x64\x6f\x65\x73\40\x6e\x6f\164\40\155\x61\x74\x63\150\x20\x74\150\x65\x20\143\145\x72\164\151\x66\x69\143\x61\x74\x65\40\x66\157\x75\156\144\x20\151\x6e\40\x53\x41\x4d\x4c\40\122\145\163\160\x6f\156\x73\x65\56\x3c\57\160\x3e\xd\xa\x9\x9\11\x3c\x70\76\x3c\163\x74\162\x6f\x6e\147\76\103\145\x72\164\x69\146\151\143\141\164\145\x20\x66\157\x75\156\144\x20\151\x6e\x20\x53\101\x4d\x4c\40\x52\145\x73\x70\x6f\x6e\x73\145\x3a\40\x3c\57\x73\x74\x72\157\x6e\x67\x3e\x3c\146\x6f\x6e\x74\x20\x66\141\143\x65\75\x22\x43\x6f\x75\162\x69\x65\162\x20\x4e\x65\x77\x22\x3b\146\157\x6e\164\55\163\151\x7a\145\x3a\61\x30\x70\x74\76\74\x62\162\x3e\x3c\x62\x72\x3e" . $m7 . "\x3c\x2f\x70\76\x3c\x2f\x66\x6f\156\x74\x3e\15\12\x9\11\11\x3c\x70\x3e\x3c\x73\x74\162\157\156\x67\x3e\x53\157\154\x75\164\x69\157\x6e\x3a\x20\74\57\163\x74\162\157\156\x67\76\x3c\x2f\x70\76\15\12\11\x9\11\x20\74\157\x6c\x3e\xd\xa\40\40\40\40\x20\x20\x20\x20\40\40\x20\x20\40\40\x20\40\74\154\x69\x3e\x43\157\x70\171\x20\x70\141\163\164\145\x20\164\x68\145\40\143\145\162\x74\151\146\x69\x63\x61\x74\x65\x20\x70\x72\x6f\166\x69\x64\145\x64\x20\x61\x62\x6f\x76\145\40\x69\x6e\x20\130\x35\60\71\40\103\x65\162\164\x69\146\x69\143\141\164\x65\x20\x75\156\x64\x65\162\x20\x53\x65\162\x76\151\x63\145\x20\120\x72\x6f\x76\x69\x64\x65\x72\40\x53\145\x74\x75\x70\x20\164\x61\x62\56\x3c\x2f\154\x69\76\xd\12\40\40\x20\40\40\40\x20\x20\x20\x20\x20\40\x20\40\x20\x20\x3c\154\x69\76\111\146\x20\x69\x73\x73\165\145\40\x70\x65\162\x73\151\163\164\163\x20\x64\151\x73\141\142\x6c\x65\40\x3c\142\x3e\x43\150\141\x72\x61\143\x74\145\x72\40\145\x6e\x63\x6f\x64\x69\156\x67\x3c\57\142\x3e\x20\x75\x6e\x64\x65\162\x20\123\145\162\x76\x69\143\145\40\120\162\157\x76\144\x65\162\x20\123\x65\164\x75\160\x20\164\141\142\56\x3c\x2f\154\151\76\xd\12\40\40\40\40\x20\x20\40\x20\40\40\40\x20\40\74\57\157\154\x3e\x9\11\15\xa\11\11\11\x3c\57\x64\x69\x76\x3e\15\12\x9\x9\x9\11\11\74\144\151\166\x20\x73\x74\171\154\x65\x3d\x22\155\x61\x72\x67\151\156\x3a\x33\45\x3b\144\x69\163\x70\154\x61\171\72\142\154\x6f\143\153\73\x74\x65\x78\x74\x2d\x61\154\x69\147\156\x3a\x63\145\156\164\x65\162\73\x22\76\15\12\x9\11\11\11\11\x3c\144\x69\166\40\163\164\x79\154\x65\x3d\x22\x6d\141\x72\147\x69\156\72\x33\45\x3b\x64\151\x73\160\154\x61\x79\72\x62\x6c\157\143\153\73\x74\x65\170\x74\x2d\141\x6c\151\147\x6e\x3a\143\x65\x6e\x74\145\162\x3b\42\x3e\74\151\x6e\160\x75\x74\40\163\164\x79\154\x65\75\x22\x70\141\x64\144\x69\156\147\72\61\x25\73\x77\x69\x64\164\x68\72\61\60\60\x70\170\x3b\142\x61\143\x6b\147\x72\x6f\165\156\144\x3a\40\43\60\x30\71\61\103\x44\x20\156\157\x6e\145\x20\162\145\x70\x65\141\x74\40\163\x63\x72\x6f\x6c\x6c\40\x30\x25\40\x30\45\73\x63\165\x72\163\157\x72\x3a\40\x70\157\x69\x6e\164\x65\162\x3b\x66\x6f\156\164\x2d\163\151\x7a\x65\72\61\65\x70\170\x3b\x62\157\x72\144\x65\x72\55\x77\151\x64\164\x68\72\x20\61\x70\170\73\142\157\162\x64\145\x72\x2d\x73\x74\x79\x6c\x65\x3a\40\x73\x6f\x6c\x69\x64\x3b\x62\x6f\162\x64\145\x72\55\162\141\144\x69\165\163\72\40\x33\160\x78\x3b\x77\150\151\x74\x65\55\163\x70\141\143\145\72\40\156\157\x77\x72\x61\160\x3b\x62\157\170\x2d\x73\x69\x7a\x69\156\x67\72\40\142\157\x72\144\145\162\x2d\142\157\x78\73\x62\x6f\162\x64\145\162\x2d\x63\157\x6c\157\x72\72\x20\x23\x30\x30\x37\x33\x41\101\x3b\142\x6f\x78\55\x73\x68\x61\x64\157\167\x3a\x20\60\x70\x78\x20\x31\x70\x78\x20\x30\x70\170\40\162\147\x62\141\x28\x31\62\x30\54\x20\62\60\60\x2c\40\x32\63\60\x2c\x20\x30\x2e\66\51\40\151\x6e\x73\x65\x74\73\143\157\x6c\x6f\x72\72\x20\43\106\106\x46\73\x22\x74\x79\x70\145\75\42\x62\165\164\x74\x6f\x6e\42\x20\x76\x61\x6c\x75\x65\75\x22\x44\157\x6e\x65\42\x20\157\156\103\x6c\151\x63\153\x3d\42\x73\x65\x6c\146\x2e\x63\154\x6f\163\x65\50\x29\x3b\42\x3e\74\x2f\x64\x69\166\76";
    mo_saml_download_logs($vR, $ZY);
    exit;
    asM:
    FL_:
    $rk = LicenseHelper::getCurrentOption(mo_options_enum_service_provider::Issuer);
    $lF = get_option("\x6d\x6f\137\163\x61\155\154\x5f\x73\x70\x5f\x65\x6e\164\151\x74\x79\137\151\x64");
    if (!empty($lF)) {
        goto zIk;
    }
    $lF = $yE . "\x2f\x77\x70\x2d\x63\157\x6e\x74\x65\156\x74\57\x70\x6c\165\147\x69\156\x73\57\x6d\151\x6e\151\x6f\162\x61\x6e\147\145\x2d\163\141\155\x6c\55\62\60\55\x73\151\156\147\154\x65\55\163\151\147\x6e\x2d\157\x6e\57";
    zIk:
    SAMLSPUtilities::validateIssuerAndAudience($Yr, $lF, $rk, $IJ);
    $Lc = current(current($Yr->getAssertions())->getNameId());
    $xu = current($Yr->getAssertions())->getAttributes();
    $xu["\116\141\x6d\x65\x49\x44"] = array("\x30" => $Lc);
    $U2 = current($Yr->getAssertions())->getSessionIndex();
    mo_saml_checkMapping($xu, $IJ, $U2);
    goto aDn;
    nA9:
    if (!isset($_REQUEST["\122\145\154\x61\171\123\x74\x61\164\x65"])) {
        goto DK;
    }
    $bs = $_REQUEST["\122\145\x6c\141\x79\x53\x74\x61\x74\x65"];
    DK:
    $ZB = get_option("\x6d\x6f\137\x73\x61\155\154\137\x6c\x6f\x67\157\165\164\137\x72\145\154\141\171\x5f\163\x74\x61\164\x65");
    if (empty($ZB)) {
        goto RX;
    }
    $bs = $ZB;
    RX:
    if (!is_user_logged_in()) {
        goto vRz;
    }
    wp_destroy_current_session();
    wp_clear_auth_cookie();
    wp_set_current_user(0);
    vRz:
    if (!empty($bs)) {
        goto NUU;
    }
    $bs = home_url();
    NUU:
    header("\114\157\143\x61\164\x69\x6f\156\72\x20" . $bs);
    exit;
    aDn:
    LPU:
    if (!(array_key_exists("\123\101\x4d\x4c\122\x65\x71\x75\145\163\164", $_REQUEST) && !empty($_REQUEST["\x53\x41\x4d\114\122\145\161\x75\x65\x73\x74"]))) {
        goto EvZ;
    }
    $Xo = htmlspecialchars($_REQUEST["\x53\x41\x4d\x4c\122\145\161\x75\145\x73\164"]);
    $IJ = "\57";
    if (!array_key_exists("\x52\x65\154\x61\x79\123\164\141\164\145", $_REQUEST)) {
        goto NnK;
    }
    $IJ = $_REQUEST["\x52\x65\x6c\x61\x79\x53\x74\141\x74\145"];
    NnK:
    $Xo = base64_decode($Xo);
    if (!(array_key_exists("\x53\101\x4d\x4c\x52\x65\x71\165\x65\163\x74", $_GET) && !empty($_GET["\x53\x41\115\x4c\122\x65\x71\165\145\x73\164"]))) {
        goto w4x;
    }
    $Xo = gzinflate($Xo);
    w4x:
    $QQ = new DOMDocument();
    $QQ->loadXML($Xo);
    $cu = $QQ->firstChild;
    if (!($cu->localName == "\114\x6f\147\x6f\165\164\x52\145\x71\165\x65\163\164")) {
        goto Z0N;
    }
    $bb = new SAML2SPLogoutRequest($cu);
    if (!(!session_id() || session_id() == '' || !isset($_SESSION))) {
        goto owL;
    }
    session_start();
    owL:
    $_SESSION["\x6d\x6f\137\163\141\x6d\x6c\137\154\157\x67\x6f\x75\164\x5f\162\145\161\x75\x65\x73\x74"] = $Xo;
    $_SESSION["\x6d\x6f\137\163\141\155\154\137\154\x6f\147\x6f\165\x74\137\162\145\154\x61\x79\x5f\x73\x74\x61\x74\145"] = $IJ;
    wp_redirect(htmlspecialchars_decode(wp_logout_url()));
    exit;
    Z0N:
    EvZ:
    if (!(isset($_REQUEST["\x6f\x70\x74\151\157\156"]) and strpos($_REQUEST["\x6f\x70\164\x69\x6f\156"], "\x72\145\141\x64\163\x61\x6d\154\154\x6f\x67\x69\x6e") !== false)) {
        goto dap;
    }
    require_once dirname(__FILE__) . "\x2f\x69\156\x63\x6c\x75\144\145\x73\57\154\x69\142\x2f\x65\x6e\x63\x72\171\x70\x74\x69\x6f\156\56\x70\150\160";
    if (isset($_POST["\x53\x54\x41\124\125\x53"]) && $_POST["\x53\x54\x41\x54\x55\123"] == "\105\122\122\117\x52") {
        goto Rr2;
    }
    if (!(isset($_POST["\x53\124\101\124\125\123"]) && $_POST["\x53\124\x41\124\125\123"] == "\123\125\103\x43\x45\x53\123")) {
        goto k4b;
    }
    $gV = '';
    if (!(isset($_REQUEST["\x72\x65\144\151\162\x65\x63\164\137\164\157"]) && !empty($_REQUEST["\162\x65\x64\151\162\145\143\x74\137\164\x6f"]) && $_REQUEST["\x72\145\144\151\x72\x65\143\164\x5f\164\x6f"] != "\57")) {
        goto wau;
    }
    $gV = htmlspecialchars($_REQUEST["\x72\x65\144\151\162\x65\x63\164\137\x74\157"]);
    wau:
    delete_option("\155\157\137\x73\x61\x6d\154\137\x72\145\144\x69\162\145\143\164\137\x65\x72\x72\157\162\x5f\x63\157\x64\145");
    delete_option("\x6d\x6f\137\163\x61\x6d\x6c\137\x72\x65\x64\151\162\145\x63\x74\x5f\x65\162\162\x6f\x72\137\162\x65\141\163\x6f\156");
    try {
        $WW = get_option("\x73\141\155\154\137\x61\155\137\145\x6d\x61\x69\154");
        $Ao = get_option("\163\141\x6d\x6c\137\141\155\x5f\x75\x73\x65\162\x6e\141\x6d\x65");
        $x5 = get_option("\163\x61\155\154\137\141\x6d\x5f\146\x69\162\163\x74\137\156\x61\x6d\145");
        $qe = get_option("\163\x61\155\154\137\141\155\x5f\154\141\x73\164\x5f\x6e\x61\x6d\145");
        $sm = get_option("\x73\x61\155\x6c\137\x61\x6d\x5f\x67\162\157\x75\x70\x5f\156\x61\155\145");
        $No = get_option("\x73\x61\x6d\x6c\x5f\x61\155\x5f\144\x65\146\x61\165\154\x74\137\x75\x73\145\x72\137\x72\x6f\154\145");
        $V4 = get_option("\x73\x61\x6d\x6c\x5f\141\x6d\x5f\x64\x6f\156\x74\x5f\x61\x6c\x6c\x6f\x77\x5f\x75\x6e\154\x69\x73\164\145\144\x5f\x75\x73\145\x72\137\162\x6f\x6c\x65");
        $BK = get_option("\x73\141\155\x6c\137\x61\155\x5f\x61\x63\x63\x6f\165\x6e\x74\137\x6d\x61\164\143\x68\145\x72");
        $sB = '';
        $MY = '';
        $x5 = str_replace("\56", "\137", $x5);
        $x5 = str_replace("\40", "\x5f", $x5);
        if (!(!empty($x5) && array_key_exists($x5, $_POST))) {
            goto VSJ;
        }
        $x5 = htmlspecialchars($_POST[$x5]);
        VSJ:
        $qe = str_replace("\x2e", "\137", $qe);
        $qe = str_replace("\40", "\x5f", $qe);
        if (!(!empty($qe) && array_key_exists($qe, $_POST))) {
            goto pJU;
        }
        $qe = htmlspecialchars($_POST[$qe]);
        pJU:
        $Ao = str_replace("\x2e", "\x5f", $Ao);
        $Ao = str_replace("\x20", "\137", $Ao);
        if (!empty($Ao) && array_key_exists($Ao, $_POST)) {
            goto Paa;
        }
        $MY = htmlspecialchars($_POST["\x4e\141\155\145\x49\x44"]);
        goto ki0;
        Paa:
        $MY = htmlspecialchars($_POST[$Ao]);
        ki0:
        $sB = str_replace("\x2e", "\137", $WW);
        $sB = str_replace("\40", "\137", $WW);
        if (!empty($WW) && array_key_exists($WW, $_POST)) {
            goto w_3;
        }
        $sB = htmlspecialchars($_POST["\x4e\x61\155\145\x49\104"]);
        goto TT4;
        w_3:
        $sB = htmlspecialchars($_POST[$WW]);
        TT4:
        $sm = str_replace("\x2e", "\x5f", $sm);
        $sm = str_replace("\40", "\x5f", $sm);
        if (!(!empty($sm) && array_key_exists($sm, $_POST))) {
            goto pHz;
        }
        $sm = htmlspecialchars($_POST[$sm]);
        pHz:
        if (!empty($BK)) {
            goto J09;
        }
        $BK = "\x65\x6d\141\151\x6c";
        J09:
        $U6 = get_option("\x6d\x6f\x5f\163\x61\155\154\x5f\x63\165\163\x74\157\155\145\x72\x5f\164\x6f\153\145\156");
        if (!(isset($U6) || trim($U6) != '')) {
            goto FC0;
        }
        $LJ = AESEncryption::decrypt_data($sB, $U6);
        $sB = $LJ;
        FC0:
        if (!(!empty($x5) && !empty($U6))) {
            goto gc6;
        }
        $BO = AESEncryption::decrypt_data($x5, $U6);
        $x5 = $BO;
        gc6:
        if (!(!empty($qe) && !empty($U6))) {
            goto MEF;
        }
        $dr = AESEncryption::decrypt_data($qe, $U6);
        $qe = $dr;
        MEF:
        if (!(!empty($MY) && !empty($U6))) {
            goto aBc;
        }
        $mo = AESEncryption::decrypt_data($MY, $U6);
        $MY = $mo;
        aBc:
        if (!(!empty($sm) && !empty($U6))) {
            goto NZ2;
        }
        $WK = AESEncryption::decrypt_data($sm, $U6);
        $sm = $WK;
        NZ2:
    } catch (Exception $F5) {
        echo sprintf("\x41\156\40\x65\162\x72\157\x72\40\157\x63\143\x75\x72\x72\145\144\40\x77\x68\151\x6c\145\40\x70\162\157\x63\145\x73\x73\x69\156\x67\x20\x74\x68\x65\x20\123\101\x4d\114\40\122\x65\163\160\x6f\x6e\163\145\x2e");
        exit;
    }
    $VI = array($sm);
    mo_saml_login_user($sB, $x5, $qe, $MY, $VI, $V4, $No, $gV, $BK);
    k4b:
    goto Y2U;
    Rr2:
    update_option("\x6d\157\137\x73\141\155\154\137\162\x65\144\x69\x72\145\x63\164\x5f\x65\x72\162\157\162\x5f\x63\x6f\x64\145", htmlspecialchars($_POST["\105\x52\x52\117\x52\137\x52\x45\x41\123\117\116"]));
    update_option("\x6d\157\x5f\163\141\x6d\x6c\x5f\x72\x65\144\x69\x72\145\143\164\137\145\162\162\x6f\162\x5f\162\145\x61\163\x6f\156", htmlspecialchars($_POST["\x45\x52\x52\x4f\x52\137\115\105\x53\123\101\107\105"]));
    Y2U:
    dap:
    qo5:
}
function cldjkasjdksalc()
{
    $hf = plugin_dir_path(__FILE__);
    $E4 = wp_upload_dir();
    $A7 = home_url();
    $A7 = trim($A7, "\x2f");
    if (preg_match("\43\x5e\x68\164\164\160\x28\x73\x29\x3f\x3a\x2f\x2f\x23", $A7)) {
        goto hUy;
    }
    $A7 = "\x68\164\164\x70\x3a\x2f\x2f" . $A7;
    hUy:
    $lc = parse_url($A7);
    $VX = preg_replace("\57\x5e\167\x77\167\x5c\56\57", '', $lc["\x68\x6f\163\164"]);
    $tU = $VX . "\x2d" . $E4["\142\x61\163\x65\144\151\x72"];
    $tE = hash_hmac("\163\150\141\x32\x35\x36", $tU, "\64\x44\x48\146\152\x67\x66\152\141\x73\156\144\146\x73\141\152\x66\110\107\x4a");
    if (is_writable($hf . "\x6c\x69\143\145\x6e\163\145")) {
        goto Vjs;
    }
    $cy = base64_decode("\x62\107\x4e\153\141\155\x74\x68\143\62\x70\x6b\x61\x33\x4e\150\x59\x32\167\75");
    $Sk = get_option($cy);
    if (empty($Sk)) {
        goto uvn;
    }
    $gW = str_rot13($Sk);
    uvn:
    goto b2B;
    Vjs:
    $Sk = file_get_contents($hf . "\x6c\x69\x63\x65\156\x73\145");
    if (!$Sk) {
        goto Rvj;
    }
    $gW = base64_encode($Sk);
    Rvj:
    b2B:
    if (!empty($Sk)) {
        goto uYC;
    }
    $gK = base64_decode("\124\107\154\x6a\132\127\x35\x7a\132\x53\102\107\x61\x57\x78\154\111\x47\x31\160\x63\x33\116\x70\142\155\x63\x67\132\156\x4a\x76\142\123\102\x30\x61\x47\125\147\x63\x47\x78\x31\x5a\62\x6c\165\114\147\75\x3d");
    wp_die($gK);
    uYC:
    if (strpos($gW, $tE) !== false) {
        goto Z_P;
    }
    $h1 = new Customersaml();
    $U6 = get_option("\155\157\x5f\163\x61\155\154\x5f\143\x75\163\x74\x6f\155\x65\162\137\164\x6f\153\x65\x6e");
    $e1 = AESEncryption::decrypt_data(get_option("\163\155\x6c\x5f\154\x6b"), $U6);
    $Rs = $h1->mo_saml_vl($e1, false);
    if ($Rs) {
        goto fqZ;
    }
    return;
    fqZ:
    $Rs = json_decode($Rs, true);
    if (isset($Rs["\x69\x73\x54\x72\x69\x61\x6c"]) and !empty($Rs["\x69\163\124\x72\x69\141\x6c"])) {
        goto yVi;
    }
    update_option("\x6d\157\x5f\163\141\155\154\x5f\164\154\x61", false);
    goto T8T;
    yVi:
    update_option("\155\157\137\163\x61\x6d\154\137\164\x6c\141", $Rs["\151\163\124\x72\x69\x61\154"]);
    update_option("\x6d\157\137\163\x61\155\x6c\137\x6c\151\143\145\156\163\x65\137\145\x78\x70\151\162\x79\x5f\x64\x61\164\x65", $Rs["\x6c\x69\143\x65\156\x73\x65\x45\170\160\151\162\171\104\141\x74\145"]);
    T8T:
    if (isset($Rs["\163\164\x61\164\165\163"]) and strcasecmp($Rs["\x73\164\141\164\x75\163"], "\x53\125\x43\103\x45\123\123") == 0) {
        goto vxt;
    }
    $D9 = base64_decode("\123\x57\x35\x32\131\x57\170\160\132\103\102\x4d\x61\x57\x4e\154\x62\156\116\154\111\x45\x5a\x76\144\127\65\153\x4c\151\x42\x51\142\x47\x56\x68\x63\x32\x55\147\x59\x32\71\165\144\x47\106\x6a\x64\x43\x42\x35\x62\63\126\x79\x49\x47\x46\x6b\x62\x57\x6c\x75\141\x58\x4e\60\143\x6d\x46\x30\x62\x33\111\147\144\x47\x38\x67\x64\x58\x4e\x6c\111\110\122\x6f\x5a\123\x42\x6a\x62\63\x4a\x79\132\127\x4e\x30\111\x47\x78\x70\x59\62\x56\x75\x63\62\x55\165\x49\x45\x5a\x76\143\151\x42\164\142\x33\112\x6c\111\107\x52\x6c\x64\x47\x46\160\x62\110\115\x73\111\x48\x42\x79\x62\x33\x5a\x70\x5a\x47\125\x67\144\107\150\154\x49\x46\112\154\132\155\126\171\132\127\65\152\x5a\x53\x42\112\122\x44\157\147\x54\125\70\x79\116\104\111\64\x4d\124\x41\171\115\124\x63\x77\x4e\123\102\60\142\x79\x42\x35\142\63\x56\x79\111\x47\x46\x6b\142\127\154\x75\x61\x58\116\x30\x63\155\106\60\142\63\111\147\x64\107\x38\147\x59\x32\x68\154\x59\x32\163\147\x61\x58\121\x67\x64\x57\x35\153\x5a\130\111\147\123\x47\x56\x73\143\x43\101\x6d\x49\105\132\x42\125\123\102\x30\x59\x57\x49\147\141\127\x34\x67\144\107\x68\x6c\111\x48\x42\x73\144\127\144\160\142\151\64\x3d");
    $D9 = str_replace("\x48\x65\x6c\x70\40\x26\x20\106\x41\121\x20\x74\141\x62\x20\x69\x6e", "\106\x41\121\x73\40\x73\145\143\x74\151\x6f\156\x20\x6f\x66", $D9);
    $Ok = base64_decode("\x52\130\x4a\x79\142\x33\111\66\111\105\x6c\165\144\x6d\x46\x73\x61\x57\121\x67\x54\107\x6c\152\x5a\127\x35\x7a\x5a\121\75\x3d");
    wp_die($D9, $Ok);
    goto Bd_;
    vxt:
    $hf = plugin_dir_path(__FILE__);
    $A7 = home_url();
    $A7 = trim($A7, "\57");
    if (preg_match("\43\136\x68\x74\x74\160\50\163\x29\77\x3a\57\x2f\43", $A7)) {
        goto MHh;
    }
    $A7 = "\x68\x74\x74\x70\x3a\57\57" . $A7;
    MHh:
    $lc = parse_url($A7);
    $VX = preg_replace("\x2f\136\167\x77\x77\134\56\57", '', $lc["\x68\x6f\x73\x74"]);
    $E4 = wp_upload_dir();
    $tU = $VX . "\55" . $E4["\142\x61\163\145\144\x69\x72"];
    $tE = hash_hmac("\x73\x68\141\62\x35\66", $tU, "\x34\104\110\x66\x6a\x67\x66\152\x61\163\x6e\144\x66\x73\x61\152\146\110\x47\112");
    $N8 = djkasjdksa();
    $rp = round(strlen($N8) / rand(2, 20));
    $N8 = substr_replace($N8, $tE, $rp, 0);
    $Tx = base64_decode($N8);
    if (is_writable($hf . "\154\151\143\145\156\163\x65")) {
        goto XSZ;
    }
    $N8 = str_rot13($N8);
    $cy = base64_decode("\142\107\116\x6b\x61\155\164\150\143\62\x70\x6b\141\x33\x4e\150\x59\x32\167\x3d");
    update_option($cy, $N8);
    goto JNP;
    XSZ:
    file_put_contents($hf . "\154\x69\143\145\x6e\163\x65", $Tx);
    JNP:
    return true;
    Bd_:
    goto jXQ;
    Z_P:
    return true;
    jXQ:
}
function djkasjdksa()
{
    $QA = "\41\x7e\100\43\x24\x25\136\x26\x2a\50\51\x5f\x2b\174\x7b\175\74\x3e\x3f\x30\61\x32\63\x34\65\66\67\70\71\x61\142\x63\144\x65\146\147\x68\151\152\153\x6c\155\156\157\x70\161\162\163\x74\165\166\x77\170\x79\172\101\102\103\104\105\106\107\110\x49\112\113\x4c\x4d\116\117\120\x51\122\x53\124\125\126\127\130\x59\132";
    $F2 = strlen($QA);
    $Zv = '';
    $jb = 0;
    Pr4:
    if (!($jb < 10000)) {
        goto hl4;
    }
    $Zv .= $QA[rand(0, $F2 - 1)];
    w7L:
    $jb++;
    goto Pr4;
    hl4:
    return $Zv;
}
function mo_saml_show_SAML_log($cu, $HA)
{
    header("\103\157\x6e\164\x65\156\164\55\x54\171\x70\x65\72\x20\x74\145\170\x74\x2f\x68\x74\x6d\154");
    $Ud = new DOMDocument();
    $Ud->preserveWhiteSpace = false;
    $Ud->formatOutput = true;
    $Ud->loadXML($cu);
    if ($HA == "\x64\x69\163\160\154\x61\171\x53\101\x4d\114\122\145\x71\165\x65\x73\x74") {
        goto jG7;
    }
    $oO = "\123\x41\x4d\x4c\x20\122\145\x73\x70\x6f\156\163\145";
    goto U7T;
    jG7:
    $oO = "\x53\101\115\114\40\122\145\161\165\145\163\x74";
    U7T:
    $NR = $Ud->saveXML();
    $A6 = htmlentities($NR);
    $A6 = rtrim($A6);
    $wI = simplexml_load_string($NR);
    $lp = json_encode($wI);
    $CP = json_decode($lp);
    $GV = plugins_url("\x69\156\143\x6c\x75\144\x65\163\57\143\163\x73\57\x73\x74\x79\x6c\145\137\163\145\164\x74\151\156\x67\x73\56\143\163\x73\77\x76\x65\x72\75\64\x2e\x38\x2e\64\x30", __FILE__);
    echo "\74\x6c\x69\x6e\x6b\x20\x72\x65\154\x3d\47\x73\164\x79\x6c\145\x73\150\x65\145\x74\x27\x20\x69\144\x3d\47\155\157\x5f\x73\x61\x6d\154\137\141\x64\155\x69\156\137\163\145\x74\x74\x69\x6e\x67\163\137\163\164\x79\x6c\145\55\143\163\x73\x27\40\x20\x68\162\145\x66\x3d\x27" . $GV . "\x27\40\164\x79\160\x65\x3d\47\164\145\x78\x74\57\x63\x73\x73\47\40\x6d\145\x64\x69\141\75\47\x61\x6c\154\47\40\x2f\76\xd\12\40\x20\40\x20\x20\x20\x20\40\40\40\40\40\15\12\x9\11\11\x3c\x64\x69\x76\40\x63\154\x61\x73\163\x3d\42\155\157\55\144\151\163\x70\x6c\x61\171\x2d\154\x6f\x67\x73\x22\40\x3e\x3c\160\40\x74\x79\x70\145\75\x22\x74\145\x78\x74\42\40\x20\40\151\x64\x3d\42\123\101\115\x4c\137\164\171\x70\145\x22\76" . $oO . "\74\x2f\x70\x3e\74\x2f\144\x69\x76\76\15\12\x9\11\11\x9\15\xa\11\x9\11\x3c\x64\x69\x76\40\164\x79\x70\145\75\42\164\145\170\x74\x22\40\151\144\x3d\42\123\x41\115\114\137\x64\151\x73\160\154\x61\171\x22\40\x63\x6c\141\163\x73\x3d\x22\x6d\157\x2d\144\151\163\x70\x6c\141\x79\55\x62\x6c\157\143\x6b\x22\x3e\74\160\162\x65\x20\x63\154\x61\x73\x73\x3d\47\142\162\165\163\150\72\x20\170\x6d\x6c\x3b\x27\x3e" . $A6 . "\74\x2f\x70\162\145\x3e\74\57\144\x69\x76\x3e\xd\12\11\11\x9\x3c\x62\x72\76\15\xa\11\x9\x9\x3c\144\151\166\x9\x20\163\x74\x79\x6c\x65\75\42\155\141\x72\147\151\x6e\x3a\x33\45\x3b\x64\x69\x73\160\x6c\x61\171\72\x62\154\157\x63\x6b\73\164\145\170\164\55\x61\154\151\x67\x6e\72\x63\145\156\x74\145\x72\x3b\42\76\xd\xa\40\40\x20\x20\x20\x20\x20\40\x20\x20\x20\40\xd\xa\x9\11\11\74\x64\x69\166\40\x73\164\171\x6c\x65\x3d\42\155\x61\162\x67\x69\x6e\x3a\x33\45\x3b\144\x69\163\160\x6c\141\171\72\142\154\157\143\x6b\73\164\x65\170\164\55\x61\154\x69\147\x6e\72\x63\145\x6e\164\x65\x72\73\42\x20\x3e\15\xa\x9\xd\12\40\40\40\x20\40\x20\40\x20\40\40\40\40\x3c\57\x64\151\166\76\xd\12\11\11\11\x3c\142\165\164\x74\157\x6e\40\151\144\75\42\143\x6f\160\x79\42\x20\x6f\156\143\154\151\x63\153\x3d\42\143\157\160\x79\104\151\x76\x54\x6f\x43\154\x69\160\142\x6f\141\x72\x64\x28\51\x22\x20\40\163\164\171\154\x65\75\x22\x70\141\x64\144\151\156\x67\x3a\x31\45\x3b\167\x69\x64\x74\x68\x3a\x31\60\x30\x70\170\73\142\141\143\153\x67\162\x6f\x75\x6e\x64\72\40\43\60\x30\71\61\x43\104\40\x6e\157\x6e\145\x20\162\145\160\x65\x61\164\x20\x73\x63\x72\157\154\x6c\40\x30\x25\x20\60\x25\x3b\x63\165\162\163\157\x72\x3a\40\160\157\151\156\164\145\162\73\146\157\x6e\164\x2d\163\151\172\145\x3a\x31\x35\x70\170\73\x62\x6f\162\x64\145\x72\55\167\x69\x64\x74\x68\x3a\40\61\x70\170\x3b\142\x6f\x72\x64\x65\x72\x2d\x73\164\x79\x6c\145\x3a\x20\x73\x6f\x6c\151\144\73\142\x6f\162\144\145\162\x2d\x72\141\144\151\165\x73\72\40\63\x70\x78\x3b\167\150\151\x74\145\x2d\x73\x70\x61\143\x65\x3a\x20\156\x6f\x77\x72\x61\160\73\x62\x6f\x78\55\163\151\x7a\151\x6e\147\72\x20\x62\x6f\x72\144\x65\x72\55\x62\x6f\x78\73\x62\x6f\162\144\x65\162\55\x63\x6f\x6c\x6f\x72\72\40\43\60\x30\67\63\x41\x41\x3b\x62\x6f\x78\55\x73\x68\141\x64\x6f\167\x3a\x20\60\x70\170\40\61\160\170\x20\x30\160\170\40\x72\x67\142\141\x28\61\x32\x30\54\40\62\60\60\54\40\62\x33\60\54\x20\60\56\66\51\40\151\x6e\x73\145\164\x3b\143\x6f\x6c\x6f\162\x3a\40\x23\106\106\106\73\42\40\x3e\x43\x6f\x70\x79\x3c\57\x62\x75\x74\164\x6f\156\76\15\xa\x9\x9\x9\x26\156\x62\163\x70\73\15\xa\40\x20\x20\x20\x20\40\x20\x20\x20\40\40\40\40\40\x20\74\151\x6e\x70\165\x74\40\151\x64\75\42\144\x77\x6e\55\x62\164\156\x22\40\x73\x74\x79\x6c\145\75\42\160\x61\x64\x64\x69\156\x67\x3a\61\45\73\167\151\x64\x74\x68\x3a\61\x30\60\x70\170\x3b\142\x61\x63\153\147\x72\157\x75\156\144\x3a\40\43\x30\x30\71\x31\103\x44\x20\156\x6f\156\145\x20\162\145\x70\x65\x61\164\40\x73\143\162\157\x6c\x6c\40\x30\45\40\x30\x25\x3b\x63\x75\162\163\157\162\72\x20\x70\157\151\x6e\164\x65\x72\x3b\146\x6f\156\x74\55\x73\151\x7a\x65\x3a\x31\65\160\170\73\x62\x6f\162\x64\x65\x72\x2d\x77\151\144\x74\150\72\40\61\160\x78\73\x62\x6f\x72\x64\145\x72\55\163\164\x79\x6c\145\x3a\x20\163\157\154\151\144\73\x62\157\162\x64\145\162\x2d\x72\141\144\151\x75\163\72\x20\63\x70\170\x3b\x77\150\x69\x74\x65\55\x73\x70\x61\143\145\x3a\x20\x6e\x6f\167\162\x61\x70\x3b\142\157\170\55\x73\x69\172\x69\x6e\x67\x3a\40\x62\x6f\x72\x64\145\162\55\x62\157\170\73\x62\x6f\162\x64\x65\x72\x2d\143\x6f\x6c\x6f\x72\x3a\x20\43\60\x30\67\63\101\x41\73\x62\157\x78\55\x73\150\x61\x64\x6f\167\72\40\60\x70\x78\40\61\x70\x78\x20\60\160\x78\40\162\x67\142\x61\x28\x31\x32\x30\x2c\x20\62\x30\60\x2c\40\62\x33\x30\x2c\x20\60\56\x36\x29\40\x69\x6e\163\x65\x74\x3b\x63\157\x6c\x6f\162\x3a\40\x23\x46\x46\x46\x3b\42\x74\x79\x70\x65\75\x22\142\x75\164\164\157\156\42\40\x76\x61\x6c\x75\x65\75\x22\x44\157\167\156\x6c\x6f\141\x64\42\x20\15\12\40\x20\x20\x20\40\x20\x20\x20\x20\x20\x20\x20\40\40\40\x22\x3e\xd\12\x9\11\11\74\57\144\151\x76\76\15\12\11\11\11\74\57\144\x69\x76\x3e\xd\xa\x9\11\x9\xd\xa\11\x9\xd\xa\x9\11\11";
    ob_end_flush();
    echo "\xd\12\x9\74\x73\x63\162\151\160\164\x3e\15\xa\xd\12\40\x20\x20\x20\x20\40\40\x20\146\165\x6e\x63\164\151\x6f\156\40\x63\x6f\x70\171\x44\x69\x76\x54\157\103\x6c\x69\x70\x62\157\x61\x72\x64\x28\x29\x20\x7b\15\xa\x20\40\40\x20\40\x20\x20\x20\x20\x20\40\40\166\141\162\40\x61\165\x78\x20\75\40\x64\x6f\143\165\155\x65\156\164\56\143\x72\145\x61\x74\x65\x45\x6c\x65\x6d\145\156\164\x28\42\x69\x6e\160\165\x74\42\x29\73\xd\xa\40\x20\x20\x20\x20\40\x20\40\x20\x20\40\40\x61\x75\x78\x2e\163\145\164\101\164\x74\x72\151\142\165\x74\x65\x28\42\166\141\154\x75\145\42\54\40\144\x6f\143\x75\x6d\145\156\164\56\x67\x65\164\105\x6c\145\x6d\x65\x6e\164\102\171\x49\x64\x28\42\x53\101\115\x4c\x5f\x64\x69\x73\160\x6c\141\x79\x22\x29\x2e\164\x65\170\164\103\x6f\x6e\x74\145\156\x74\51\73\15\12\x20\40\x20\40\x20\40\40\40\x20\40\40\40\144\x6f\143\165\155\x65\x6e\164\x2e\142\x6f\144\171\x2e\141\160\160\145\156\144\x43\150\x69\154\x64\x28\x61\x75\170\x29\x3b\xd\xa\x20\x20\x20\x20\40\x20\40\x20\40\x20\40\40\x61\165\x78\56\x73\x65\x6c\145\143\164\x28\x29\73\15\xa\40\40\40\40\40\40\40\x20\40\40\x20\x20\x64\x6f\x63\x75\155\x65\x6e\164\x2e\x65\170\x65\x63\103\157\155\x6d\141\x6e\144\50\42\x63\x6f\x70\x79\42\x29\x3b\15\xa\40\40\40\40\40\x20\x20\40\40\x20\x20\40\x64\157\x63\x75\155\x65\156\164\56\x62\157\144\x79\56\x72\x65\155\157\x76\145\x43\x68\151\x6c\144\x28\141\x75\170\x29\73\15\12\40\40\40\x20\x20\40\x20\40\x20\x20\40\40\x64\157\143\x75\155\145\x6e\x74\56\x67\x65\164\105\x6c\145\x6d\145\156\164\102\x79\x49\144\50\x27\x63\157\x70\x79\47\x29\x2e\164\x65\170\164\103\157\x6e\164\145\x6e\x74\x20\75\40\x22\103\157\160\x69\145\x64\42\73\xd\12\x20\x20\40\x20\40\x20\x20\40\x20\x20\x20\40\144\157\x63\x75\x6d\145\x6e\x74\56\147\145\x74\105\x6c\145\155\145\156\164\102\171\x49\144\x28\47\143\157\160\x79\x27\x29\x2e\x73\164\171\x6c\145\x2e\x62\x61\143\x6b\x67\162\157\x75\156\x64\x20\75\x20\42\x67\x72\145\171\42\73\15\xa\40\x20\x20\x20\x20\x20\x20\40\x20\40\40\x20\167\151\156\144\157\167\56\x67\145\164\123\x65\x6c\145\x63\x74\x69\157\156\50\51\x2e\x73\145\154\145\x63\164\101\x6c\154\x43\x68\x69\154\144\x72\145\x6e\50\40\x64\157\x63\165\155\x65\156\164\x2e\147\x65\164\x45\154\145\x6d\x65\156\x74\x42\171\x49\x64\50\40\42\x53\101\115\114\137\144\151\163\x70\154\141\171\x22\40\51\40\x29\x3b\xd\xa\15\12\x20\x20\x20\40\x20\40\x20\40\175\15\12\xd\12\x20\x20\40\x20\40\x20\40\x20\146\x75\156\143\164\x69\x6f\x6e\x20\x64\x6f\167\156\x6c\157\x61\144\50\146\x69\x6c\x65\156\x61\x6d\x65\x2c\x20\164\145\x78\x74\51\40\173\15\12\x20\x20\x20\40\x20\40\40\40\40\40\x20\x20\x76\x61\x72\x20\145\x6c\x65\x6d\x65\x6e\164\40\75\40\x64\x6f\143\165\155\x65\156\x74\x2e\x63\162\x65\141\164\145\105\x6c\145\x6d\x65\156\164\x28\47\x61\x27\51\73\xd\xa\x20\40\x20\40\x20\x20\40\x20\x20\40\x20\40\145\154\145\x6d\x65\156\x74\x2e\x73\145\x74\x41\x74\164\162\x69\x62\165\164\x65\50\x27\x68\162\x65\146\x27\x2c\40\47\144\x61\x74\141\72\x41\160\160\154\151\143\141\164\x69\x6f\x6e\57\x6f\143\164\145\164\x2d\163\x74\162\x65\x61\155\x3b\143\150\141\162\163\145\x74\x3d\165\x74\146\x2d\70\x2c\47\40\53\x20\x65\x6e\x63\x6f\144\145\x55\x52\x49\x43\157\155\x70\157\156\145\156\164\x28\164\145\170\x74\x29\x29\x3b\15\xa\x20\x20\40\40\40\x20\40\40\x20\40\40\x20\x65\154\145\x6d\145\156\x74\x2e\163\145\x74\x41\164\164\x72\x69\142\x75\x74\145\x28\47\144\x6f\x77\x6e\154\x6f\x61\x64\47\54\x20\x66\x69\154\x65\156\141\x6d\145\51\x3b\xd\12\15\xa\40\40\40\40\x20\x20\x20\x20\x20\x20\40\x20\145\x6c\x65\x6d\x65\x6e\x74\x2e\163\164\x79\154\145\x2e\x64\151\163\160\154\x61\171\40\x3d\x20\47\156\157\x6e\x65\x27\x3b\15\12\x20\x20\x20\x20\x20\x20\x20\x20\40\x20\x20\40\144\x6f\x63\x75\155\x65\156\164\56\x62\x6f\144\171\x2e\x61\x70\160\145\x6e\x64\103\150\x69\x6c\x64\50\x65\x6c\x65\155\x65\x6e\x74\x29\x3b\15\xa\15\12\x20\40\40\40\40\40\40\40\x20\40\40\40\x65\154\x65\x6d\x65\156\x74\x2e\x63\x6c\151\x63\153\50\x29\73\xd\xa\xd\12\x20\40\x20\40\40\x20\x20\40\40\x20\x20\x20\x64\157\x63\165\155\x65\156\164\56\142\157\x64\171\x2e\x72\x65\x6d\x6f\166\145\103\150\x69\x6c\x64\x28\x65\154\145\155\145\x6e\x74\x29\73\xd\xa\x20\x20\x20\40\x20\40\40\40\175\xd\12\xd\12\x20\40\x20\x20\x20\40\x20\40\x64\157\143\165\155\x65\x6e\x74\56\147\x65\x74\105\x6c\145\155\145\x6e\x74\102\171\111\144\50\42\x64\167\156\x2d\142\x74\156\x22\x29\56\141\x64\144\105\x76\x65\x6e\164\x4c\x69\163\x74\x65\x6e\145\x72\50\42\143\154\x69\143\153\42\54\x20\146\165\x6e\143\164\x69\x6f\x6e\x20\x28\x29\40\173\15\xa\xd\12\x20\40\x20\x20\40\x20\x20\x20\40\40\40\x20\x76\141\x72\x20\x66\x69\x6c\x65\156\x61\155\x65\x20\x3d\x20\x64\157\x63\x75\x6d\x65\x6e\x74\x2e\x67\x65\x74\x45\x6c\x65\x6d\x65\156\164\x42\171\x49\x64\x28\42\x53\x41\x4d\114\x5f\x74\171\x70\145\x22\51\x2e\164\145\170\x74\103\157\x6e\x74\145\156\x74\x2b\42\x2e\170\x6d\154\42\73\xd\12\40\40\40\40\40\40\40\x20\x20\x20\x20\40\166\x61\x72\40\x6e\157\x64\145\x20\75\x20\x64\x6f\x63\x75\155\x65\156\164\56\147\x65\x74\x45\x6c\145\x6d\145\x6e\x74\x42\171\111\x64\x28\42\x53\101\115\114\x5f\144\x69\163\x70\154\x61\x79\42\x29\73\15\12\40\x20\x20\40\40\40\40\x20\x20\x20\40\40\150\164\155\154\x43\157\x6e\x74\x65\156\164\x20\x3d\x20\x6e\157\144\145\56\x69\x6e\156\145\x72\x48\x54\x4d\114\73\xd\12\40\40\40\40\x20\x20\40\40\x20\x20\40\40\164\145\x78\x74\x20\x3d\40\156\x6f\144\145\x2e\164\145\170\164\x43\x6f\156\164\145\156\x74\x3b\xd\xa\x20\40\40\x20\40\x20\x20\40\x20\x20\40\40\143\157\x6e\x73\157\x6c\145\56\x6c\157\x67\x28\164\145\x78\x74\x29\73\15\12\40\x20\x20\40\x20\40\x20\x20\40\x20\40\x20\144\x6f\x77\x6e\x6c\157\x61\144\50\146\x69\x6c\x65\x6e\x61\x6d\145\54\x20\164\x65\x78\164\x29\73\xd\xa\40\x20\40\40\40\x20\x20\40\x7d\x2c\x20\x66\x61\x6c\x73\145\x29\x3b\15\12\xd\12\15\xa\xd\xa\xd\12\15\xa\40\x20\x20\40\x3c\x2f\x73\x63\x72\x69\160\164\76\15\12";
    exit;
}
function mo_saml_checkMapping($xu, $IJ, $U2)
{
    try {
        $WW = get_option("\163\x61\x6d\154\x5f\141\x6d\x5f\145\155\141\151\x6c");
        $Ao = get_option("\x73\x61\155\x6c\x5f\141\155\137\165\163\145\x72\x6e\141\x6d\x65");
        $x5 = get_option("\163\141\x6d\x6c\137\x61\155\x5f\146\151\162\x73\x74\x5f\156\x61\x6d\x65");
        $qe = get_option("\x73\141\x6d\x6c\x5f\x61\x6d\x5f\154\141\163\x74\137\x6e\141\155\145");
        $sm = get_option("\x73\x61\155\x6c\x5f\x61\155\x5f\x67\x72\157\165\160\x5f\x6e\x61\x6d\145");
        $No = get_option("\x73\141\155\x6c\137\x61\155\x5f\x64\x65\146\x61\x75\154\x74\137\165\163\145\x72\137\162\x6f\154\x65");
        $V4 = get_option("\x73\x61\x6d\154\x5f\141\155\x5f\x64\157\x6e\164\x5f\141\x6c\x6c\x6f\167\x5f\165\156\x6c\x69\x73\164\145\144\137\165\x73\x65\162\137\x72\x6f\x6c\x65");
        $BK = get_option("\163\141\155\154\x5f\x61\x6d\x5f\141\143\x63\157\165\x6e\164\137\155\x61\x74\x63\150\x65\162");
        $sB = '';
        $MY = '';
        if (empty($xu)) {
            goto LWX;
        }
        if (!empty($x5) && array_key_exists($x5, $xu)) {
            goto wRY;
        }
        $x5 = '';
        goto Xo7;
        wRY:
        $x5 = $xu[$x5][0];
        Xo7:
        if (!empty($qe) && array_key_exists($qe, $xu)) {
            goto zL0;
        }
        $qe = '';
        goto SBn;
        zL0:
        $qe = $xu[$qe][0];
        SBn:
        if (!empty($Ao) && array_key_exists($Ao, $xu)) {
            goto n8K;
        }
        $MY = $xu["\x4e\x61\x6d\145\x49\104"][0];
        goto DKy;
        n8K:
        $MY = $xu[$Ao][0];
        DKy:
        if (!empty($WW) && array_key_exists($WW, $xu)) {
            goto iIF;
        }
        $sB = $xu["\116\141\x6d\x65\111\104"][0];
        goto wnK;
        iIF:
        $sB = $xu[$WW][0];
        wnK:
        if (!empty($sm) && array_key_exists($sm, $xu)) {
            goto u7y;
        }
        $sm = array();
        goto kz5;
        u7y:
        $sm = $xu[$sm];
        kz5:
        if (!empty($BK)) {
            goto gQq;
        }
        $BK = "\x65\155\141\x69\x6c";
        gQq:
        LWX:
        if ($IJ == "\x74\x65\x73\164\x56\141\154\x69\144\141\164\145") {
            goto SmD;
        }
        if ($IJ == "\x74\145\x73\x74\x4e\145\167\103\145\x72\x74\x69\146\151\x63\141\x74\x65") {
            goto o5I;
        }
        mo_saml_login_user($sB, $x5, $qe, $MY, $sm, $V4, $No, $IJ, $BK, $U2, $xu["\116\x61\x6d\145\111\x44"][0], $xu);
        goto O0a;
        SmD:
        update_option("\x6d\157\137\x73\x61\x6d\154\137\x74\145\163\x74", "\124\145\163\164\40\x73\165\143\143\x65\163\x73\146\165\154");
        mo_saml_show_test_result($x5, $qe, $sB, $sm, $xu, $IJ);
        goto O0a;
        o5I:
        update_option("\x6d\157\x5f\x73\141\x6d\x6c\x5f\x74\x65\163\164\137\x6e\145\x77\137\143\x65\x72\164", "\x54\145\163\164\x20\163\165\143\x63\145\x73\x73\x66\165\154");
        mo_saml_show_test_result($x5, $qe, $sB, $sm, $xu, $IJ);
        O0a:
    } catch (Exception $F5) {
        echo sprintf("\101\x6e\x20\x65\x72\x72\157\x72\40\157\x63\143\165\x72\162\x65\x64\x20\x77\x68\151\x6c\145\x20\160\x72\x6f\x63\145\x73\x73\x69\x6e\147\x20\164\150\145\x20\123\101\x4d\114\x20\x52\x65\x73\x70\x6f\x6e\x73\x65\56");
        exit;
    }
}
function mo_saml_show_test_result($x5, $qe, $sB, $sm, $xu, $IJ)
{
    echo "\x3c\x64\x69\x76\40\163\164\171\x6c\x65\75\42\146\x6f\156\x74\x2d\146\x61\155\x69\x6c\x79\x3a\103\141\154\x69\142\x72\x69\73\160\x61\x64\x64\151\156\x67\72\60\x20\x33\45\73\x22\76";
    if (!empty($sB)) {
        goto G_j;
    }
    echo "\74\144\x69\x76\40\163\164\171\154\145\x3d\42\x63\157\154\x6f\162\x3a\x20\43\141\x39\64\64\64\62\x3b\142\x61\143\x6b\x67\162\157\165\156\144\55\143\157\x6c\x6f\x72\72\40\43\146\x32\144\145\144\145\x3b\160\x61\x64\144\x69\x6e\147\72\x20\61\65\160\x78\x3b\155\141\162\147\151\x6e\55\x62\x6f\x74\x74\157\x6d\72\40\62\60\160\170\73\x74\145\170\x74\55\141\x6c\151\147\156\72\x63\x65\x6e\164\x65\162\x3b\142\x6f\x72\x64\145\162\72\61\160\x78\40\x73\157\x6c\151\x64\x20\43\x45\x36\102\63\x42\62\73\146\x6f\x6e\x74\x2d\163\x69\172\145\72\61\x38\160\x74\x3b\42\76\x54\x45\x53\124\x20\106\101\x49\114\105\104\x3c\57\x64\151\166\76\xd\12\x9\11\11\x9\x3c\x64\x69\x76\x20\163\x74\x79\x6c\x65\x3d\x22\143\x6f\154\x6f\162\72\40\43\141\x39\x34\64\x34\62\73\x66\x6f\x6e\164\x2d\x73\151\x7a\145\x3a\x31\64\160\x74\73\x20\x6d\x61\162\x67\151\156\x2d\142\x6f\x74\x74\x6f\x6d\x3a\62\x30\160\170\x3b\x22\76\x57\x41\x52\x4e\x49\x4e\107\x3a\40\x53\x6f\x6d\145\x20\101\x74\x74\162\x69\x62\165\x74\x65\163\x20\x44\151\x64\x20\116\x6f\164\x20\x4d\x61\164\x63\150\x2e\x3c\x2f\144\x69\166\x3e\15\12\x9\11\11\x9\x3c\144\x69\166\x20\163\x74\171\154\x65\x3d\42\x64\151\x73\x70\154\x61\171\72\x62\x6c\x6f\143\x6b\73\164\145\x78\164\55\x61\x6c\x69\147\x6e\72\143\145\156\164\145\x72\73\155\141\x72\147\x69\156\x2d\x62\x6f\x74\x74\x6f\155\72\x34\45\x3b\x22\x3e\x3c\151\155\x67\x20\163\164\171\154\145\x3d\42\167\x69\144\164\150\72\x31\65\45\73\42\x73\162\143\75\42" . plugin_dir_url(__FILE__) . "\x69\155\x61\147\x65\163\57\x77\162\x6f\156\147\56\x70\156\147\x22\76\x3c\x2f\144\151\x76\76";
    goto u9P;
    G_j:
    update_option("\155\157\137\163\x61\x6d\x6c\137\x74\x65\163\x74\x5f\x63\157\x6e\146\151\147\137\x61\164\x74\x72\x73", $xu);
    echo "\x3c\144\x69\x76\x20\163\164\171\x6c\x65\75\42\143\x6f\154\x6f\x72\72\40\x23\x33\x63\67\x36\63\144\x3b\15\xa\11\x9\x9\x9\142\141\x63\153\147\162\157\x75\x6e\x64\55\x63\157\x6c\x6f\162\72\40\43\x64\146\146\60\144\x38\73\x20\160\141\x64\x64\151\156\147\72\x32\x25\73\x6d\x61\x72\x67\151\x6e\x2d\142\x6f\x74\x74\x6f\155\72\x32\x30\x70\170\73\164\145\170\x74\55\x61\x6c\x69\x67\156\72\x63\145\x6e\x74\x65\162\x3b\x20\x62\157\x72\x64\x65\162\72\x31\160\170\40\163\x6f\154\151\x64\x20\x23\x41\105\104\102\71\101\x3b\x20\146\x6f\x6e\164\x2d\x73\151\172\145\x3a\x31\70\160\x74\x3b\42\x3e\x54\105\x53\124\40\123\x55\103\x43\105\x53\x53\106\x55\114\74\57\x64\151\166\x3e\15\12\11\x9\x9\11\x3c\x64\x69\166\40\163\164\171\154\145\x3d\x22\144\x69\x73\160\x6c\141\x79\72\x62\154\157\x63\153\73\164\x65\170\164\55\141\154\x69\147\156\x3a\x63\x65\x6e\164\x65\x72\73\x6d\x61\x72\147\151\156\55\142\x6f\x74\164\157\x6d\x3a\x34\45\73\42\x3e\x3c\x69\155\147\x20\x73\164\x79\x6c\145\x3d\42\167\x69\144\164\x68\72\61\x35\x25\x3b\x22\x73\162\x63\x3d\42" . plugin_dir_url(__FILE__) . "\151\155\x61\147\x65\163\x2f\x67\x72\145\x65\156\137\x63\x68\x65\143\x6b\x2e\x70\156\147\42\x3e\x3c\x2f\x64\x69\166\x3e";
    u9P:
    $IR = get_option("\x6d\157\137\163\141\x6d\154\x5f\x65\156\x61\x62\154\x65\x5f\x64\x6f\155\x61\151\x6e\x5f\162\x65\x73\x74\x72\x69\x63\x74\151\157\156\x5f\x6c\x6f\x67\151\156");
    $HC = $IJ == "\x74\145\163\164\x4e\x65\167\103\x65\162\x74\151\146\x69\x63\141\x74\145" ? "\144\151\x73\x70\x6c\141\x79\72\156\x6f\156\x65" : '';
    if (!$IR) {
        goto ZAH;
    }
    $Vp = get_option("\155\157\x5f\x73\x61\155\154\x5f\141\x6c\154\157\x77\137\144\x65\156\171\x5f\165\x73\145\162\x5f\167\151\164\150\137\144\x6f\x6d\141\x69\156");
    if (!empty($Vp) && $Vp == "\x64\x65\156\171") {
        goto FcX;
    }
    $HT = get_option("\163\141\155\x6c\x5f\141\155\x5f\145\x6d\x61\151\154\x5f\x64\157\155\x61\x69\x6e\x73");
    $De = explode("\73", $HT);
    $Dd = explode("\x40", $sB);
    $VT = array_key_exists("\61", $Dd) ? $Dd[1] : '';
    if (in_array($VT, $De)) {
        goto Ptz;
    }
    echo "\x3c\x70\40\163\164\x79\x6c\x65\x3d\x22\x63\x6f\154\x6f\162\x3a\162\145\144\73\42\x3e\124\150\151\163\x20\x75\163\145\x72\40\x77\x69\x6c\x6c\40\156\157\164\x20\142\x65\x20\x61\154\x6c\157\167\x65\x64\x20\x74\157\40\x6c\x6f\147\x69\x6e\x20\x61\163\x20\164\x68\x65\x20\x64\x6f\x6d\141\x69\156\40\157\x66\40\x74\x68\145\40\145\155\141\x69\x6c\x20\x69\x73\x20\x6e\157\164\x20\151\x6e\143\154\x75\144\x65\144\x20\151\156\40\164\150\x65\40\x61\x6c\x6c\157\167\x65\x64\x20\x6c\x69\163\164\40\x6f\146\40\x44\x6f\155\141\151\x6e\x20\122\x65\163\164\162\151\143\164\x69\157\156\56\x3c\x2f\x70\76";
    Ptz:
    goto Pj2;
    FcX:
    $HT = get_option("\163\x61\155\154\137\x61\155\137\145\155\x61\151\154\137\144\x6f\155\141\151\x6e\x73");
    $De = explode("\73", $HT);
    $Dd = explode("\x40", $sB);
    $VT = array_key_exists("\x31", $Dd) ? $Dd[1] : '';
    if (!in_array($VT, $De)) {
        goto vsv;
    }
    echo "\x3c\160\x20\163\164\171\x6c\x65\75\42\x63\x6f\154\x6f\x72\x3a\162\x65\x64\x3b\42\76\x54\150\x69\163\x20\165\x73\145\162\40\167\151\x6c\154\x20\x6e\157\x74\40\x62\145\x20\x61\x6c\x6c\157\x77\145\144\40\164\157\x20\154\157\x67\x69\x6e\x20\141\163\40\x74\x68\145\x20\x64\x6f\x6d\141\151\156\40\x6f\146\x20\x74\150\x65\x20\x65\155\x61\x69\x6c\40\x69\163\40\x69\x6e\143\154\165\x64\x65\x64\x20\x69\x6e\40\x74\150\x65\x20\144\145\156\151\145\x64\40\x6c\151\163\x74\x20\157\146\40\x44\x6f\155\141\x69\x6e\x20\x52\145\163\164\162\151\x63\164\151\x6f\x6e\56\x3c\57\160\x3e";
    vsv:
    Pj2:
    ZAH:
    $Vo = get_option("\x73\141\155\x6c\137\141\155\137\165\163\x65\x72\156\141\x6d\x65");
    if (!(!empty($Vo) && array_key_exists($Vo, $xu))) {
        goto p5x;
    }
    $VU = $xu[$Vo][0];
    if (!(strlen($VU) > 60)) {
        goto IMu;
    }
    echo "\x3c\x70\x20\x73\164\x79\x6c\x65\x3d\42\143\157\154\x6f\162\72\162\145\144\73\42\x3e\116\x4f\124\x45\40\72\40\x54\x68\151\x73\40\165\163\145\162\x20\x77\151\154\154\x20\x6e\157\x74\x20\x62\145\40\x61\142\x6c\145\x20\164\x6f\40\154\x6f\147\x69\156\x20\x61\x73\40\164\x68\145\x20\165\163\x65\x72\156\x61\x6d\x65\x20\166\x61\x6c\165\145\x20\x69\163\40\x6d\x6f\x72\x65\x20\164\150\141\156\x20\x36\x30\x20\143\x68\141\162\141\x63\164\145\x72\163\x20\154\x6f\x6e\147\x2e\74\x62\x72\x2f\x3e\xd\12\x9\11\x9\x50\154\145\141\163\145\x20\x74\162\171\x20\143\x68\141\156\x67\151\156\147\40\x74\150\x65\x20\155\x61\160\160\151\156\x67\x20\157\146\40\125\x73\x65\162\x6e\x61\155\145\40\x66\151\x65\x6c\144\x20\151\x6e\40\74\x61\x20\150\x72\145\x66\x3d\x22\x23\x22\x20\x6f\156\x43\x6c\x69\x63\153\x3d\x22\143\x6c\x6f\163\x65\x5f\x61\156\x64\x5f\162\145\144\x69\162\x65\143\x74\50\x29\73\42\76\101\x74\x74\162\x69\142\165\x74\145\x2f\x52\x6f\x6c\x65\40\x4d\x61\160\x70\x69\156\147\x3c\x2f\x61\76\40\x74\141\x62\56\74\57\x70\x3e";
    IMu:
    p5x:
    echo "\x3c\x73\x70\141\x6e\40\x73\x74\x79\x6c\x65\75\x22\x66\157\x6e\164\x2d\163\x69\172\x65\x3a\61\x34\x70\164\x3b\x22\x3e\74\142\x3e\110\x65\x6c\x6c\157\x3c\57\x62\76\x2c\40" . $sB . "\x3c\x2f\x73\x70\141\x6e\x3e\74\142\x72\x2f\76\74\160\x20\163\164\171\x6c\145\x3d\x22\146\x6f\x6e\x74\55\167\145\151\147\x68\164\x3a\142\157\154\144\73\146\157\x6e\x74\55\x73\x69\172\145\x3a\61\64\x70\164\73\155\x61\x72\147\151\156\55\x6c\145\146\x74\72\61\45\x3b\x22\x3e\x41\124\124\x52\111\x42\x55\x54\x45\123\x20\122\x45\x43\x45\111\x56\x45\104\x3a\74\x2f\160\76\xd\xa\x9\11\x9\11\74\x74\141\142\x6c\x65\x20\x73\x74\x79\x6c\x65\x3d\42\142\157\162\x64\145\x72\x2d\x63\157\154\x6c\141\160\x73\x65\x3a\143\x6f\x6c\x6c\141\x70\x73\x65\73\x62\x6f\x72\x64\x65\x72\55\x73\160\141\x63\151\x6e\x67\x3a\60\x3b\x20\x64\x69\x73\160\x6c\x61\171\72\x74\141\142\x6c\145\x3b\x77\151\144\x74\150\x3a\x31\60\60\45\x3b\x20\x66\x6f\x6e\164\x2d\163\151\x7a\x65\72\61\64\x70\x74\x3b\142\x61\143\153\147\162\x6f\165\x6e\x64\x2d\x63\x6f\154\157\162\72\43\105\x44\105\104\x45\104\x3b\x22\x3e\15\xa\11\x9\x9\11\x3c\x74\162\x20\x73\164\x79\154\x65\75\42\164\145\170\x74\55\141\x6c\x69\x67\156\72\x63\x65\156\x74\145\162\x3b\x22\76\x3c\x74\144\x20\163\164\171\x6c\x65\x3d\42\x66\x6f\156\164\55\x77\145\x69\x67\150\x74\x3a\x62\x6f\154\x64\73\x62\157\162\x64\145\x72\x3a\62\x70\170\x20\163\157\x6c\x69\x64\x20\x23\x39\64\71\60\x39\60\x3b\x70\141\x64\144\x69\156\147\x3a\62\45\73\42\x3e\101\124\x54\122\111\x42\125\x54\105\x20\116\x41\115\105\x3c\x2f\164\x64\76\x3c\x74\144\40\x73\164\171\154\x65\x3d\x22\x66\x6f\x6e\164\x2d\167\x65\x69\x67\x68\x74\72\142\157\x6c\x64\73\160\x61\x64\x64\151\x6e\147\72\62\x25\x3b\x62\157\162\144\x65\162\72\62\160\x78\40\163\157\154\x69\144\x20\43\x39\x34\x39\60\71\60\x3b\40\167\157\162\144\x2d\x77\162\x61\160\72\142\x72\145\x61\153\x2d\167\157\x72\144\x3b\42\x3e\x41\124\x54\122\x49\102\x55\x54\105\x20\x56\x41\114\125\x45\74\x2f\164\144\x3e\x3c\57\164\162\x3e";
    if (!empty($xu)) {
        goto zi2;
    }
    echo "\x4e\x6f\40\x41\x74\164\x72\x69\x62\165\164\145\x73\40\x52\145\143\145\151\166\x65\x64\56";
    goto auA;
    zi2:
    foreach ($xu as $U6 => $St) {
        echo "\x3c\164\x72\x3e\x3c\x74\144\40\x73\x74\x79\x6c\x65\75\47\x66\157\156\x74\55\x77\145\151\147\x68\x74\x3a\x62\x6f\154\144\x3b\x62\x6f\x72\144\145\162\72\62\160\170\40\x73\x6f\154\x69\x64\40\x23\71\x34\x39\60\x39\x30\73\160\x61\x64\144\151\156\x67\72\x32\45\73\x27\x3e" . $U6 . "\74\x2f\164\144\76\74\164\x64\40\x73\x74\171\154\145\x3d\47\x70\141\144\144\151\x6e\x67\x3a\62\45\x3b\x62\x6f\x72\x64\145\x72\72\x32\160\170\40\163\x6f\x6c\x69\144\40\43\x39\x34\x39\x30\71\60\x3b\40\167\157\x72\144\55\167\x72\141\x70\x3a\142\x72\x65\141\x6b\55\167\157\x72\144\73\47\76" . implode("\x3c\150\162\57\x3e", $St) . "\74\57\164\x64\76\x3c\x2f\164\162\76";
        oHC:
    }
    SnO:
    auA:
    echo "\74\57\164\141\x62\154\145\76\x3c\57\144\x69\x76\x3e";
    echo "\x3c\144\151\166\40\x73\x74\171\154\145\75\42\x6d\x61\x72\147\x69\156\x3a\63\x25\73\144\151\x73\160\x6c\x61\x79\x3a\x62\154\x6f\143\x6b\73\164\145\170\x74\x2d\141\x6c\151\147\x6e\72\143\x65\x6e\x74\145\162\73\x22\x3e\15\12\x9\11\x3c\151\x6e\160\x75\164\40\163\164\x79\x6c\x65\75\42\160\x61\x64\144\151\156\147\72\x31\45\73\167\x69\144\164\x68\x3a\x32\65\60\x70\170\73\142\x61\143\x6b\x67\162\x6f\x75\x6e\x64\x3a\x20\x23\x30\60\71\61\103\x44\40\156\x6f\x6e\145\x20\162\145\x70\145\141\x74\40\x73\143\162\157\x6c\154\x20\60\45\x20\x30\x25\x3b\15\xa\11\x9\143\x75\162\x73\157\162\x3a\x20\160\x6f\x69\x6e\164\145\162\x3b\x66\x6f\156\164\x2d\163\x69\x7a\145\72\x31\65\160\x78\x3b\142\157\x72\144\x65\x72\x2d\167\x69\x64\x74\150\72\40\x31\160\170\x3b\142\157\162\144\145\x72\55\163\x74\171\154\x65\x3a\40\x73\157\154\x69\x64\x3b\142\157\162\144\145\162\55\x72\141\x64\x69\x75\x73\72\40\x33\160\x78\73\x77\150\x69\164\145\x2d\x73\160\141\x63\x65\72\xd\12\11\x9\x20\x6e\157\167\x72\x61\x70\x3b\142\x6f\170\x2d\x73\151\172\151\x6e\147\x3a\40\142\x6f\162\144\x65\162\55\142\x6f\170\x3b\142\157\162\144\x65\x72\55\x63\x6f\x6c\x6f\x72\x3a\x20\43\60\60\x37\x33\x41\101\x3b\142\157\170\55\163\150\x61\144\157\167\x3a\40\x30\x70\170\x20\x31\160\170\x20\x30\x70\x78\40\x72\147\142\x61\x28\x31\62\x30\x2c\x20\62\x30\60\x2c\40\62\63\60\54\40\60\x2e\x36\x29\40\x69\x6e\x73\x65\x74\73\x63\157\154\157\x72\72\40\43\106\106\x46\x3b" . $HC . "\x22\xd\xa\x20\40\x20\40\40\x20\x20\40\x20\40\40\40\x74\x79\160\x65\75\x22\x62\x75\x74\164\157\156\42\40\x76\x61\154\165\145\x3d\x22\x43\x6f\156\x66\x69\x67\x75\x72\x65\x20\101\x74\164\x72\151\142\165\164\145\x2f\122\157\x6c\145\x20\x4d\x61\x70\x70\151\x6e\x67\x22\x20\157\x6e\103\154\151\x63\153\x3d\42\143\154\x6f\163\x65\x5f\x61\156\144\137\162\145\144\x69\162\145\x63\164\x28\x29\73\42\x3e\40\x26\156\x62\163\160\73\40\xd\12\40\x20\40\40\x20\40\40\x20\40\40\x20\x20\15\12\x9\x9\x3c\151\x6e\160\165\x74\40\x73\x74\171\x6c\x65\75\x22\160\x61\x64\144\151\x6e\147\x3a\x31\x25\x3b\167\151\144\164\x68\72\61\60\x30\x70\x78\x3b\x62\x61\143\x6b\147\162\x6f\x75\156\x64\72\40\x23\x30\x30\71\61\103\x44\x20\x6e\x6f\x6e\x65\40\162\145\x70\x65\141\164\x20\x73\143\x72\157\154\x6c\x20\60\45\40\60\x25\73\143\165\162\163\x6f\162\x3a\40\x70\x6f\x69\x6e\x74\x65\162\73\146\x6f\156\164\x2d\163\x69\172\145\x3a\x31\65\x70\170\73\x62\157\162\x64\145\162\x2d\x77\x69\x64\x74\150\x3a\40\61\160\x78\x3b\x62\x6f\162\144\x65\162\x2d\163\x74\171\154\x65\72\40\163\x6f\x6c\x69\144\x3b\x62\157\162\x64\x65\x72\55\x72\x61\144\151\165\x73\72\x20\63\160\x78\73\167\150\151\x74\x65\x2d\x73\x70\x61\143\145\x3a\x20\x6e\157\167\162\x61\160\73\142\157\x78\x2d\x73\x69\172\x69\x6e\x67\72\40\142\157\x72\x64\145\x72\x2d\x62\x6f\x78\x3b\x62\x6f\162\144\145\162\55\x63\x6f\154\x6f\x72\x3a\40\43\60\60\67\63\101\x41\73\142\x6f\170\x2d\163\x68\141\144\157\167\x3a\40\x30\160\170\40\61\160\170\40\x30\160\170\x20\162\147\x62\x61\x28\61\x32\60\54\40\x32\60\60\x2c\x20\x32\63\60\x2c\x20\60\56\66\51\x20\151\156\163\145\x74\73\143\157\154\157\x72\72\40\x23\106\106\x46\73\42\x74\171\x70\145\x3d\42\142\x75\164\x74\157\x6e\42\x20\x76\x61\x6c\x75\145\75\x22\x44\157\x6e\x65\x22\x20\157\156\x43\154\x69\143\153\x3d\x22\163\x65\x6c\x66\x2e\143\x6c\x6f\163\x65\50\x29\x3b\42\x3e\74\57\144\151\166\x3e\15\xa\11\11\15\12\x9\11\74\163\x63\162\x69\x70\x74\x3e\15\xa\x20\40\x20\x20\x20\40\40\40\x20\40\x20\40\x20\146\x75\156\x63\x74\x69\x6f\x6e\x20\x63\154\157\163\x65\x5f\x61\x6e\x64\137\x72\145\x64\151\x72\145\x63\164\x28\51\173\15\xa\40\40\40\x20\x20\40\40\40\x20\40\x20\40\x20\40\40\40\x20\167\151\156\144\157\x77\x2e\x6f\160\145\x6e\145\162\x2e\162\x65\x64\151\x72\x65\143\x74\x5f\164\x6f\137\x61\164\164\x72\x69\142\x75\164\x65\x5f\155\141\x70\x70\151\x6e\147\x28\x29\73\xd\12\40\40\40\x20\x20\40\x20\40\x20\40\x20\x20\x20\40\x20\40\40\x73\x65\154\x66\56\x63\x6c\x6f\163\x65\x28\51\73\xd\12\x20\x20\40\x20\40\x20\x20\40\40\x20\x20\x20\40\x7d\40\40\x20\xd\12\15\12\11\11\74\57\x73\143\x72\x69\x70\164\76";
    exit;
}
function mo_saml_convert_to_windows_iconv($rT)
{
    $lA = LicenseHelper::getCurrentOption(mo_options_enum_service_provider::Is_encoding_enabled);
    if (!($lA === "\143\150\145\x63\153\x65\144")) {
        goto TWu;
    }
    return iconv("\125\x54\106\x2d\x38", "\x43\x50\x31\x32\65\x32\x2f\57\111\x47\x4e\x4f\122\x45", $rT);
    TWu:
    return $rT;
}
function mo_saml_login_user($sB, $x5, $qe, $MY, $sm, $V4, $No, $IJ, $BK, $U2 = '', $vk = '', $xu = null)
{
    do_action("\x6d\x6f\x5f\141\x62\162\137\x66\151\x6c\x74\x65\x72\x5f\x6c\x6f\147\151\156", $xu, $vk, $U2);
    check_if_user_allowed_to_login_due_to_role_restriction($sm);
    $yE = get_option("\155\x6f\137\163\141\155\154\137\163\x70\137\142\x61\163\x65\137\x75\162\x6c");
    if (!empty($yE)) {
        goto mTU;
    }
    $yE = home_url();
    mTU:
    mo_saml_restrict_users_based_on_domain($sB);
    $MY = mo_saml_sanitize_username($MY);
    if (!(strlen($MY) > 60)) {
        goto mOk;
    }
    wp_die("\x57\x65\40\143\x6f\165\x6c\x64\x20\156\x6f\164\x20\x73\151\x67\x6e\40\171\157\165\x20\151\156\56\40\120\x6c\x65\x61\163\145\x20\143\x6f\156\164\141\143\164\40\x79\157\165\162\40\141\x64\x6d\x69\156\151\x73\164\x72\x61\x74\157\x72\x2e", "\105\162\162\157\x72\x20\72\x20\x55\x73\145\x72\x6e\x61\155\145\x20\x6c\145\156\147\164\x68\40\154\151\155\x69\x74\40\162\145\x61\143\150\x65\x64");
    exit;
    mOk:
    $C1 = array("\x69\x64\x70\137\x6e\x61\x6d\145" => get_option("\x73\141\155\x6c\x5f\151\x64\145\156\x74\x69\x74\x79\137\156\x61\x6d\x65"));
    $ke = get_option("\x6d\157\x5f\x61\x6c\154\x6f\167\x5f\x65\x78\x69\x73\164\x69\x6e\x67\137\x75\163\x65\162\137\154\x6f\147\151\x6e");
    if (username_exists($MY) || email_exists($sB)) {
        goto lJv;
    }
    do_action("\x6d\157\137\x67\x75\145\x73\164\137\x6c\x6f\147\x69\156", $vk, $U2, $C1);
    $Dx = get_option("\163\x61\155\154\137\141\155\x5f\162\157\154\x65\137\x6d\141\x70\160\151\x6e\x67");
    $Dx = maybe_unserialize($Dx);
    $uQ = true;
    $vm = get_option("\x6d\157\137\x73\141\155\154\137\x64\157\156\x74\137\143\162\x65\x61\164\145\137\165\163\145\x72\x5f\151\x66\137\162\x6f\x6c\145\137\x6e\157\164\x5f\x6d\141\160\160\145\x64");
    if (!(!empty($vm) && strcmp($vm, "\143\150\x65\x63\153\x65\144") == 0)) {
        goto sKo;
    }
    $Jk = is_role_mapping_configured_for_user($Dx, $sm);
    $uQ = $Jk;
    sKo:
    if ($uQ === true) {
        goto m0d;
    }
    $aB = get_option("\x6d\x6f\x5f\x73\x61\x6d\154\137\x61\143\143\x6f\x75\x6e\x74\x5f\143\x72\x65\x61\x74\151\157\156\x5f\x64\151\x73\141\142\154\145\144\137\155\163\147");
    if (!empty($aB)) {
        goto cC3;
    }
    $aB = "\x57\x65\x20\x63\x6f\165\154\144\x20\x6e\157\x74\x20\x73\x69\147\x6e\40\x79\157\165\x20\151\x6e\x2e\40\120\x6c\x65\141\163\145\x20\143\157\156\164\141\x63\164\40\171\157\x75\x72\40\101\x64\x6d\x69\156\x69\163\164\162\141\164\x6f\x72\56";
    cC3:
    wp_die($aB, "\105\162\x72\157\x72\72\40\116\157\164\x20\141\40\x57\157\162\x64\x50\x72\145\x73\x73\40\x4d\145\155\142\145\162");
    exit;
    goto zpZ;
    m0d:
    $z1 = wp_generate_password(10, false);
    if (!empty($MY)) {
        goto sSY;
    }
    $eb = wp_create_user($sB, $z1, $sB);
    goto g1S;
    sSY:
    $eb = wp_create_user($MY, $z1, $sB);
    g1S:
    if (!is_wp_error($eb)) {
        goto QyU;
    }
    wp_die($eb->get_error_message() . "\74\142\162\76\x50\x6c\x65\x61\163\145\40\143\x6f\x6e\164\141\x63\164\x20\x79\x6f\165\162\x20\x41\x64\155\151\156\x69\x73\164\162\x61\x74\x6f\x72\56\x3c\x62\162\76\x3c\x62\x3e\x55\x73\x65\162\x6e\x61\155\145\74\x2f\142\76\72\40" . $sB, "\x45\x72\x72\157\162\72\x20\103\157\x75\x6c\x64\x6e\47\164\x20\x63\162\x65\141\164\x65\40\x75\x73\145\162");
    QyU:
    $user = get_user_by("\x69\x64", $eb);
    $ok = assign_roles_to_user($user, $Dx, $sm);
    if ($ok !== true && !empty($V4) && $V4 == "\x63\150\145\143\153\145\144") {
        goto CI_;
    }
    if ($ok !== true && !empty($No)) {
        goto IAO;
    }
    if ($ok !== true) {
        goto TCT;
    }
    goto mNb;
    CI_:
    $wd = wp_update_user(array("\x49\x44" => $eb, "\x72\x6f\x6c\x65" => false));
    goto mNb;
    IAO:
    $wd = wp_update_user(array("\x49\104" => $eb, "\x72\157\154\x65" => $No));
    goto mNb;
    TCT:
    $No = get_option("\x64\145\146\141\x75\x6c\x74\137\162\157\x6c\x65");
    $wd = wp_update_user(array("\x49\104" => $eb, "\x72\157\x6c\145" => $No));
    mNb:
    mo_saml_map_attributes($user, $x5, $qe, $xu);
    mo_saml_set_auth_cookie($user, $U2, $vk, true);
    do_action("\155\157\137\x73\141\155\x6c\x5f\x61\x74\x74\162\x69\x62\165\164\x65\x73", $MY, $sB, $x5, $qe, $sm);
    zpZ:
    goto BVz;
    lJv:
    if (!($ke != "\164\162\x75\145")) {
        goto h8b;
    }
    do_action("\155\157\x5f\147\x75\145\163\x74\137\x6c\x6f\x67\x69\156", $vk, $U2, $C1);
    h8b:
    if (username_exists($MY)) {
        goto k8K;
    }
    if (!email_exists($sB)) {
        goto R2x;
    }
    $user = get_user_by("\145\155\x61\151\154", $sB);
    $eb = $user->ID;
    R2x:
    goto ZXd;
    k8K:
    $user = get_user_by("\x6c\x6f\147\151\x6e", $MY);
    $eb = $user->ID;
    if (!(!empty($sB) && is_email($sB))) {
        goto wtl;
    }
    $wd = wp_update_user(array("\111\x44" => $eb, "\165\x73\x65\x72\137\145\x6d\141\151\154" => $sB));
    wtl:
    ZXd:
    mo_saml_map_attributes($user, $x5, $qe, $xu);
    $Dx = maybe_unserialize(get_option("\163\141\155\x6c\137\141\x6d\137\162\157\x6c\145\x5f\x6d\x61\160\160\x69\156\x67"));
    $E3 = get_option("\x73\141\x6d\154\x5f\141\155\137\144\157\x6e\164\x5f\165\x70\x64\x61\x74\145\137\x65\170\x69\163\164\151\x6e\x67\137\x75\x73\145\x72\x5f\162\157\154\x65");
    if (!(empty($E3) || $E3 != "\143\150\x65\143\153\x65\x64")) {
        goto VBD;
    }
    $ok = assign_roles_to_user($user, $Dx, $sm);
    $hk = get_option("\x73\141\155\x6c\x5f\x61\x6d\137\165\x70\x64\x61\164\x65\137\x61\144\x6d\151\156\x5f\165\163\145\x72\x73\137\x72\157\154\145");
    if ($ok !== true && !is_administrator_user($user) && !empty($V4) && $V4 == "\x63\x68\x65\x63\x6b\x65\144") {
        goto dRD;
    }
    if ($ok !== true && !is_administrator_user($user) && !empty($No)) {
        goto wJU;
    }
    if ($ok !== true && is_administrator_user($user) && !empty($hk) && $hk == "\143\150\x65\x63\153\145\x64" && !empty($V4) && $V4 == "\x63\x68\145\143\153\x65\144") {
        goto ZLb;
    }
    if ($ok !== true && is_administrator_user($user) && !empty($hk) && $hk == "\x63\150\145\143\153\145\x64" && !empty($No)) {
        goto mo6;
    }
    goto Aaj;
    dRD:
    $wd = wp_update_user(array("\111\104" => $eb, "\x72\x6f\154\145" => false));
    goto Aaj;
    wJU:
    $wd = wp_update_user(array("\x49\x44" => $eb, "\x72\x6f\x6c\145" => $No));
    goto Aaj;
    ZLb:
    $wd = wp_update_user(array("\111\x44" => $eb, "\162\x6f\154\x65" => false));
    goto Aaj;
    mo6:
    $wd = wp_update_user(array("\111\104" => $eb, "\x72\x6f\154\145" => $No));
    Aaj:
    VBD:
    mo_saml_set_auth_cookie($user, $U2, $vk);
    do_action("\x6d\x6f\x5f\163\141\155\154\137\141\x74\164\162\151\x62\165\164\145\163", $MY, $sB, $x5, $qe, $sm);
    BVz:
    mo_saml_post_login_redirection($IJ, $yE);
}
function mo_saml_sanitize_username($MY)
{
    $Qd = sanitize_user($MY, true);
    $Ox = apply_filters("\160\162\145\137\165\x73\145\162\x5f\154\157\147\151\x6e", $Qd);
    $MY = trim($Ox);
    return $MY;
}
function mo_saml_restrict_users_based_on_domain($sB)
{
    $IR = get_option("\x6d\x6f\137\x73\x61\155\154\137\x65\156\141\x62\x6c\x65\x5f\144\157\x6d\141\151\x6e\x5f\x72\145\163\164\162\151\143\x74\151\157\156\x5f\154\x6f\147\151\x6e");
    if (!$IR) {
        goto OZv;
    }
    $HT = get_option("\x73\141\x6d\x6c\137\x61\155\x5f\145\155\141\151\x6c\137\x64\157\155\x61\x69\156\163");
    $De = explode("\73", $HT);
    $Dd = explode("\100", $sB);
    $VT = array_key_exists("\61", $Dd) ? $Dd[1] : '';
    $Vp = get_option("\x6d\157\x5f\x73\x61\155\x6c\x5f\141\x6c\154\157\x77\137\x64\x65\156\x79\x5f\165\163\145\162\x5f\167\151\x74\x68\137\x64\157\155\x61\151\156");
    $aB = get_option("\155\157\137\163\x61\x6d\x6c\137\162\x65\x73\164\162\151\x63\x74\145\144\x5f\144\157\x6d\x61\x69\156\137\145\x72\162\x6f\162\137\155\163\x67");
    if (!empty($aB)) {
        goto h7N;
    }
    $aB = "\131\x6f\165\40\141\162\x65\x20\156\x6f\164\40\141\x6c\154\157\167\x65\144\40\164\157\40\x6c\157\x67\x69\156\56\x20\x50\154\x65\x61\163\145\x20\x63\157\x6e\x74\x61\x63\x74\x20\x79\157\x75\x72\40\x41\x64\x6d\x69\156\x69\163\x74\162\141\x74\x6f\162\56";
    h7N:
    if (!empty($Vp) && $Vp == "\144\145\156\171") {
        goto Tji;
    }
    if (in_array($VT, $De)) {
        goto k67;
    }
    wp_die($aB, "\x50\145\x72\x6d\x69\x73\x73\x69\157\x6e\x20\x44\145\x6e\151\x65\x64\x20\72\x20\x4e\157\164\40\x61\40\x57\150\151\164\145\154\151\163\x74\145\x64\x20\x75\163\145\x72\x2e");
    k67:
    goto CtN;
    Tji:
    if (!in_array($VT, $De)) {
        goto mXb;
    }
    wp_die($aB, "\x50\145\162\x6d\151\163\163\x69\x6f\156\40\104\x65\x6e\x69\x65\x64\40\72\x20\x42\154\x61\143\x6b\154\x69\163\x74\145\144\40\x75\163\x65\162\56");
    mXb:
    CtN:
    OZv:
}
function mo_saml_map_attributes($user, $x5, $qe, $xu)
{
    mo_saml_map_basic_attributes($user, $x5, $qe, $xu);
    mo_saml_map_custom_attributes($user, $xu);
}
function mo_saml_map_basic_attributes($user, $x5, $qe, $xu)
{
    $eb = $user->ID;
    if (empty($x5)) {
        goto dwT;
    }
    $wd = wp_update_user(array("\111\x44" => $eb, "\x66\151\x72\x73\x74\x5f\156\141\x6d\x65" => $x5));
    dwT:
    if (empty($qe)) {
        goto WhM;
    }
    $wd = wp_update_user(array("\111\104" => $eb, "\154\141\x73\x74\137\156\141\155\x65" => $qe));
    WhM:
    if (is_null($xu)) {
        goto rxA;
    }
    update_user_meta($eb, "\155\157\137\163\141\155\x6c\137\165\x73\x65\162\x5f\x61\164\164\x72\151\x62\x75\164\145\163", $xu);
    $de = get_option("\x73\141\155\x6c\137\x61\155\x5f\x64\x69\163\160\x6c\141\171\x5f\x6e\x61\155\x65");
    if (empty($de)) {
        goto zYR;
    }
    if (strcmp($de, "\125\123\x45\x52\x4e\101\115\105") == 0) {
        goto i0F;
    }
    if (strcmp($de, "\x46\x4e\x41\115\x45") == 0 && !empty($x5)) {
        goto I86;
    }
    if (strcmp($de, "\114\x4e\101\x4d\x45") == 0 && !empty($qe)) {
        goto v1J;
    }
    if (strcmp($de, "\x46\116\x41\x4d\x45\x5f\x4c\x4e\101\x4d\105") == 0 && !empty($qe) && !empty($x5)) {
        goto zmf;
    }
    if (!(strcmp($de, "\x4c\116\x41\115\x45\x5f\106\x4e\x41\x4d\105") == 0 && !empty($qe) && !empty($x5))) {
        goto BVH;
    }
    $wd = wp_update_user(array("\x49\x44" => $eb, "\x64\151\x73\x70\154\x61\171\137\x6e\141\x6d\x65" => $qe . "\x20" . $x5));
    BVH:
    goto o7G;
    zmf:
    $wd = wp_update_user(array("\111\104" => $eb, "\x64\151\x73\x70\x6c\x61\x79\137\156\141\x6d\x65" => $x5 . "\40" . $qe));
    o7G:
    goto LH5;
    v1J:
    $wd = wp_update_user(array("\111\x44" => $eb, "\x64\151\163\x70\154\141\x79\x5f\x6e\141\155\x65" => $qe));
    LH5:
    goto D2Q;
    I86:
    $wd = wp_update_user(array("\x49\104" => $eb, "\x64\151\163\160\x6c\141\x79\137\x6e\x61\155\x65" => $x5));
    D2Q:
    goto AzU;
    i0F:
    $wd = wp_update_user(array("\x49\104" => $eb, "\144\x69\x73\160\x6c\x61\x79\x5f\156\141\x6d\145" => $user->user_login));
    AzU:
    zYR:
    rxA:
}
function mo_saml_map_custom_attributes($user, $xu)
{
    $eb = $user->ID;
    if (!get_option("\155\157\x5f\x73\141\x6d\x6c\137\143\165\x73\164\157\x6d\137\x61\x74\164\162\x73\137\155\x61\160\160\x69\x6e\147")) {
        goto edN;
    }
    $VK = maybe_unserialize(get_option("\155\x6f\137\x73\141\155\154\x5f\x63\165\x73\164\x6f\x6d\137\x61\x74\164\162\x73\137\155\x61\160\x70\x69\156\x67"));
    foreach ($VK as $U6 => $St) {
        if (!array_key_exists($St, $xu)) {
            goto Yvk;
        }
        $Ds = false;
        if (!(count($xu[$St]) == 1)) {
            goto rV5;
        }
        $Ds = true;
        rV5:
        if (!$Ds) {
            goto p22;
        }
        update_user_meta($eb, $U6, $xu[$St][0]);
        goto fhk;
        p22:
        $Tp = array();
        foreach ($xu[$St] as $UO) {
            array_push($Tp, $UO);
            NyM:
        }
        pXd:
        update_user_meta($eb, $U6, $Tp);
        fhk:
        Yvk:
        Pci:
    }
    mpm:
    edN:
}
function mo_saml_set_auth_cookie($user, $U2, $vk, $Rb = false)
{
    $eb = $user->ID;
    wp_set_current_user($eb);
    $rc = false;
    $rc = apply_filters("\x6d\157\x5f\x72\x65\x6d\145\155\x62\145\x72\x5f\155\x65", $rc);
    wp_set_auth_cookie($eb, $rc);
    if (empty($U2)) {
        goto nH1;
    }
    update_user_meta($eb, "\155\x6f\x5f\x73\141\x6d\x6c\x5f\x73\x65\x73\163\x69\x6f\x6e\x5f\x69\156\144\145\x78", $U2);
    nH1:
    if (empty($vk)) {
        goto WCC;
    }
    update_user_meta($eb, "\x6d\157\137\163\x61\155\154\x5f\156\141\x6d\x65\137\151\x64", $vk);
    WCC:
    setcookie("\154\x6f\x67\147\x65\144\x5f\151\156\137\x77\151\x74\x68\137\x69\144\x70", base64_encode($U2 . true));
    if (!(!session_id() || session_id() == '' || !isset($_SESSION))) {
        goto t2e;
    }
    session_start();
    t2e:
    $_SESSION["\x6d\157\137\x73\x61\x6d\x6c"]["\x6c\x6f\147\x67\x65\144\x5f\151\x6e\137\167\x69\x74\150\x5f\x69\144\x70"] = TRUE;
    if (!$Rb) {
        goto hLp;
    }
    do_action("\x75\x73\x65\x72\x5f\162\145\x67\x69\x73\164\x65\162", $eb);
    hLp:
    do_action("\167\x70\137\x6c\157\x67\151\156", $user->user_login, $user);
}
function mo_saml_post_login_redirection($IJ, $yE)
{
    $IJ = htmlspecialchars_decode($IJ);
    $R4 = get_option("\x6d\x6f\137\x73\141\x6d\154\137\x72\x65\154\141\x79\x5f\163\164\x61\164\145");
    if (!empty($R4)) {
        goto VA3;
    }
    if (empty($IJ)) {
        goto qRO;
    }
    $Zh = '';
    if (!get_option("\155\x6f\137\x73\x61\155\154\x5f\x73\x65\156\144\x5f\x61\x62\163\157\x6c\x75\164\x65\137\162\x65\154\141\171\137\163\x74\141\164\145")) {
        goto hPt;
    }
    $xl = get_option("\x6d\x6f\137\163\x61\x6d\x6c\x5f\143\165\x73\x74\157\155\x65\x72\137\164\x6f\153\x65\x6e");
    $Zh = AESEncryption::decrypt_data($IJ, $xl);
    hPt:
    if (!empty($Zh)) {
        goto KU4;
    }
    if (filter_var($IJ, FILTER_VALIDATE_URL) === FALSE) {
        goto UyF;
    }
    if (strpos($IJ, home_url()) !== false) {
        goto n0Z;
    }
    $P4 = htmlspecialchars_decode($yE);
    goto Ak4;
    n0Z:
    $P4 = htmlspecialchars_decode($IJ);
    Ak4:
    goto km4;
    KU4:
    $P4 = htmlspecialchars_decode($Zh);
    goto km4;
    UyF:
    $P4 = htmlspecialchars_decode($IJ);
    km4:
    qRO:
    goto K8N;
    VA3:
    $P4 = htmlspecialchars_decode($R4);
    K8N:
    if (!empty($P4)) {
        goto KSi;
    }
    $P4 = htmlspecialchars_decode($yE);
    KSi:
    wp_redirect($P4);
    exit;
}
function check_if_user_allowed_to_login_due_to_role_restriction($sm)
{
    $tk = get_option("\163\141\155\154\137\141\155\x5f\x64\x6f\x6e\164\137\x61\154\x6c\x6f\x77\x5f\x75\163\x65\x72\137\x74\157\154\x6f\147\x69\156\137\143\162\145\x61\164\x65\x5f\x77\151\164\x68\137\147\151\x76\x65\156\137\x67\162\157\165\160\x73");
    if (!($tk == "\x63\x68\x65\x63\153\145\144")) {
        goto bK2;
    }
    if (empty($sm)) {
        goto MXY;
    }
    $LP = get_option("\x6d\x6f\137\163\141\155\x6c\137\x72\145\163\164\x72\151\143\x74\x5f\x75\x73\x65\162\x73\137\167\x69\x74\x68\137\147\162\x6f\165\160\x73");
    $e6 = explode("\x3b", $LP);
    foreach ($e6 as $YA) {
        foreach ($sm as $os) {
            $os = trim($os);
            if (!(!empty($os) && $os == $YA)) {
                goto mCD;
            }
            wp_die("\131\x6f\x75\40\x61\x72\145\x20\156\157\x74\40\x61\165\x74\150\x6f\x72\151\x7a\145\144\40\164\x6f\40\x6c\x6f\147\x69\156\x2e\x20\120\154\145\x61\x73\x65\x20\x63\x6f\x6e\164\x61\x63\164\x20\171\157\165\x72\x20\141\x64\x6d\151\156\151\x73\x74\x72\x61\x74\x6f\162\56", "\105\162\162\x6f\x72");
            mCD:
            IDw:
        }
        tPE:
        eVH:
    }
    dvm:
    MXY:
    bK2:
}
function assign_roles_to_user($user, $Dx, $sm)
{
    $ok = false;
    if (!(!empty($sm) && !empty($Dx) && !is_administrator_user($user))) {
        goto SM4;
    }
    $user->set_role(false);
    $mn = '';
    $Nm = false;
    foreach ($Dx as $UY => $T_) {
        $e6 = explode("\73", $T_);
        foreach ($e6 as $YA) {
            foreach ($sm as $os) {
                $os = trim($os);
                if (!(!empty($os) && $os == $YA)) {
                    goto Ww0;
                }
                $ok = true;
                $user->add_role($UY);
                Ww0:
                l_0:
            }
            Zl1:
            uar:
        }
        DLz:
        TKL:
    }
    b0U:
    SM4:
    return $ok;
}
function is_role_mapping_configured_for_user($Dx, $sm)
{
    if (!(!empty($sm) && !empty($Dx))) {
        goto d5L;
    }
    foreach ($Dx as $UY => $T_) {
        $e6 = explode("\73", $T_);
        foreach ($e6 as $YA) {
            foreach ($sm as $os) {
                $os = trim($os);
                if (!(!empty($os) && $os == $YA)) {
                    goto v2O;
                }
                return true;
                v2O:
                Muj:
            }
            xzU:
            PYf:
        }
        nak:
        osb:
    }
    YmL:
    d5L:
    return false;
}
function is_administrator_user($user)
{
    $MF = $user->roles;
    if (!is_null($MF) && in_array("\141\x64\155\x69\156\151\163\x74\x72\141\x74\157\162", $MF, TRUE)) {
        goto WGk;
    }
    return false;
    goto yot;
    WGk:
    return true;
    yot:
}
function mo_saml_is_customer_registered()
{
    $r6 = get_option("\x6d\157\137\x73\x61\155\x6c\137\141\x64\x6d\x69\156\137\145\155\141\x69\x6c");
    $I1 = get_option("\x6d\x6f\137\x73\x61\155\x6c\137\141\x64\x6d\x69\x6e\137\x63\x75\x73\x74\157\x6d\145\x72\137\x6b\x65\171");
    if (!$r6 || !$I1 || !is_numeric(trim($I1))) {
        goto dqF;
    }
    return 1;
    goto hjn;
    dqF:
    return 0;
    hjn:
}
function mo_saml_is_customer_license_verified()
{
    $U6 = get_option("\x6d\157\x5f\163\141\155\154\x5f\x63\x75\163\x74\157\x6d\x65\x72\x5f\164\x6f\153\145\156");
    $KQ = AESEncryption::decrypt_data(get_option("\x74\137\163\151\x74\x65\x5f\163\164\141\164\x75\163"), $U6);
    $Ub = get_option("\x73\155\154\x5f\x6c\x6b");
    $r6 = get_option("\155\x6f\137\163\x61\155\x6c\x5f\141\x64\x6d\151\156\137\x65\x6d\x61\151\x6c");
    $I1 = get_option("\155\x6f\137\x73\141\x6d\154\x5f\141\x64\155\x69\156\137\143\x75\163\x74\157\x6d\145\x72\x5f\153\x65\171");
    if (!tasjgndigekgpe()) {
        goto y_h;
    }
    return 0;
    y_h:
    if (!$KQ && !$Ub || !$r6 || !$I1 || !is_numeric(trim($I1))) {
        goto WGW;
    }
    return 1;
    goto nrI;
    WGW:
    return 0;
    nrI:
}
function saml_get_current_page_url()
{
    $Kz = $_SERVER["\110\124\124\x50\x5f\x48\x4f\x53\x54"];
    if (!(substr($Kz, -1) == "\57")) {
        goto m8M;
    }
    $Kz = substr($Kz, 0, -1);
    m8M:
    $ga = $_SERVER["\x52\x45\x51\125\105\x53\x54\x5f\125\122\x49"];
    if (!(substr($ga, 0, 1) == "\57")) {
        goto Yvr;
    }
    $ga = substr($ga, 1);
    Yvr:
    $h6 = isset($_SERVER["\x48\x54\x54\x50\123"]) && strcasecmp($_SERVER["\x48\124\x54\120\123"], "\157\x6e") == 0;
    $bs = "\x68\x74\x74\x70" . ($h6 ? "\163" : '') . "\x3a\x2f\x2f" . $Kz . "\57" . $ga;
    return $bs;
}
function show_status_error($iB, $IJ, $w8)
{
    $iB = strip_tags($iB);
    $w8 = strip_tags($w8);
    if ($IJ == "\164\145\163\x74\x56\141\154\x69\x64\141\x74\x65" or $IJ == "\x74\145\163\164\116\145\x77\103\x65\162\x74\x69\146\x69\143\x61\x74\145") {
        goto zN2;
    }
    wp_die("\127\x65\40\x63\x6f\x75\154\x64\40\156\x6f\x74\x20\x73\151\x67\156\x20\171\x6f\165\x20\151\x6e\x2e\x20\120\x6c\145\x61\163\x65\x20\x63\x6f\156\164\x61\x63\x74\40\x79\157\x75\162\40\101\x64\155\151\156\151\163\164\162\x61\x74\x6f\162\x2e", "\x45\x72\x72\x6f\x72\72\40\111\x6e\x76\141\x6c\x69\144\x20\x53\101\x4d\x4c\x20\122\x65\163\160\157\x6e\163\145\x20\123\x74\141\164\x75\163");
    goto SHN;
    zN2:
    echo "\74\x64\x69\x76\x20\x73\164\171\x6c\x65\75\x22\x66\157\156\x74\55\x66\x61\155\x69\154\x79\x3a\103\141\154\x69\x62\162\151\73\x70\141\144\144\151\x6e\x67\72\60\x20\63\45\x3b\42\76";
    echo "\x3c\x64\x69\x76\40\163\x74\171\154\x65\x3d\x22\x63\157\x6c\157\162\72\x20\x23\141\x39\x34\64\64\62\x3b\x62\141\143\x6b\147\x72\x6f\x75\x6e\144\55\143\157\154\x6f\x72\x3a\40\43\146\62\144\145\x64\145\x3b\160\x61\x64\144\x69\156\147\72\40\61\65\x70\170\x3b\x6d\141\x72\x67\151\x6e\55\x62\157\x74\x74\x6f\x6d\72\x20\x32\60\x70\170\x3b\x74\145\x78\164\x2d\x61\154\151\x67\x6e\72\143\145\x6e\x74\x65\x72\x3b\142\x6f\162\144\x65\x72\72\61\160\x78\40\x73\157\154\x69\144\40\x23\105\x36\102\63\102\62\73\146\x6f\x6e\x74\55\x73\x69\x7a\x65\72\61\x38\x70\x74\x3b\42\x3e\40\x45\x52\x52\117\x52\x3c\57\x64\151\x76\76\15\xa\40\40\40\40\40\40\40\40\x20\x20\40\40\x20\x20\x20\40\x3c\x64\151\166\40\163\x74\171\x6c\145\75\42\x63\x6f\x6c\x6f\x72\72\40\x23\141\x39\x34\x34\64\x32\x3b\x66\157\x6e\x74\55\163\x69\172\x65\x3a\x31\x34\x70\x74\73\x20\155\x61\x72\147\x69\156\55\x62\157\164\x74\157\x6d\x3a\x32\x30\160\x78\73\42\x3e\74\x70\76\x3c\x73\164\x72\157\156\x67\x3e\x45\162\x72\x6f\x72\x3a\x20\x3c\x2f\163\164\x72\x6f\x6e\147\x3e\40\x49\156\166\x61\154\x69\x64\x20\x53\101\x4d\x4c\40\x52\x65\x73\x70\157\156\163\145\x20\x53\x74\141\x74\165\163\56\x3c\x2f\x70\76\15\xa\40\x20\x20\x20\40\x20\40\x20\40\x20\x20\40\x20\40\x20\40\x3c\x70\76\x3c\x73\x74\162\157\x6e\147\x3e\x43\141\165\x73\145\x73\x3c\x2f\x73\x74\x72\x6f\x6e\x67\x3e\72\40\111\144\145\156\164\x69\164\x79\x20\x50\x72\x6f\x76\x69\x64\x65\162\40\x68\141\163\x20\x73\x65\x6e\164\40\x27" . esc_html($iB) . "\x27\40\163\164\141\164\165\x73\x20\x63\x6f\144\x65\x20\x69\x6e\x20\123\101\115\114\x20\122\x65\163\160\157\x6e\163\x65\56\40\x3c\x2f\x70\x3e\15\xa\x9\x9\x9\11\11\11\x9\11\74\x70\x3e\x3c\x73\164\162\x6f\156\x67\x3e\x52\145\141\163\x6f\156\x3c\x2f\x73\164\162\157\x6e\x67\x3e\72\40" . get_status_message(esc_html($iB)) . "\74\57\160\x3e\40";
    if (empty($w8)) {
        goto HVG;
    }
    echo "\74\160\x3e\74\163\164\162\x6f\x6e\147\x3e\123\x74\141\164\x75\163\x20\x4d\145\163\163\x61\147\145\x20\x69\156\40\x74\x68\145\x20\x53\x41\115\114\x20\122\x65\163\x70\157\156\163\145\x3a\x3c\x2f\163\164\x72\x6f\156\147\x3e\x20\x3c\x62\x72\57\76" . esc_html($w8) . "\74\x2f\160\x3e";
    HVG:
    echo "\74\142\x72\76\xd\12\40\x20\40\40\40\x20\x20\40\x20\40\40\40\40\40\40\x20\74\x2f\x64\151\166\x3e\15\xa\15\xa\40\x20\x20\x20\x20\40\40\40\x20\40\x20\40\40\40\40\40\x3c\x64\x69\x76\x20\x73\164\x79\x6c\145\75\42\155\x61\x72\147\151\156\72\x33\45\x3b\144\x69\163\160\154\x61\x79\72\x62\x6c\157\x63\x6b\73\x74\x65\170\164\55\141\x6c\x69\147\x6e\x3a\x63\x65\x6e\x74\145\x72\73\42\76\15\xa\40\x20\40\40\x20\40\x20\x20\40\x20\40\x20\40\40\x20\x20\74\x64\x69\x76\x20\x73\164\171\154\145\x3d\42\x6d\x61\x72\147\x69\156\x3a\x33\x25\73\144\151\x73\160\x6c\141\171\x3a\142\x6c\x6f\x63\x6b\73\x74\x65\170\164\x2d\141\154\x69\x67\156\x3a\x63\145\156\164\x65\x72\73\x22\76\x3c\x69\x6e\160\165\x74\40\x73\x74\171\154\145\75\x22\160\x61\x64\144\151\x6e\x67\72\61\x25\x3b\167\151\x64\x74\x68\72\x31\x30\60\x70\170\73\142\x61\143\153\147\162\157\x75\x6e\x64\72\x20\x23\x30\x30\x39\61\103\104\x20\x6e\157\156\x65\40\162\x65\160\x65\141\x74\x20\163\143\162\157\x6c\154\x20\x30\x25\x20\60\x25\x3b\143\x75\162\163\157\x72\x3a\40\160\157\x69\156\164\145\162\x3b\x66\x6f\156\x74\x2d\163\151\172\x65\x3a\61\65\160\x78\x3b\x62\x6f\162\144\145\162\55\x77\151\x64\x74\150\72\x20\x31\x70\170\73\142\157\x72\144\x65\x72\55\163\164\171\154\145\x3a\40\x73\x6f\154\151\144\73\x62\157\162\144\x65\162\55\x72\141\x64\x69\165\x73\72\x20\63\160\170\73\167\150\151\164\145\x2d\163\x70\x61\143\145\x3a\40\156\157\x77\162\x61\160\x3b\x62\157\170\55\163\x69\x7a\151\x6e\147\72\40\x62\x6f\162\144\145\x72\x2d\x62\x6f\170\73\x62\157\x72\x64\145\162\55\143\157\x6c\157\162\72\x20\43\60\60\x37\x33\101\x41\x3b\142\x6f\x78\x2d\x73\x68\x61\x64\157\x77\72\x20\x30\160\170\x20\x31\160\x78\x20\x30\x70\x78\40\x72\x67\142\x61\50\61\62\60\x2c\x20\62\60\60\x2c\40\62\63\x30\54\x20\x30\56\66\x29\40\x69\x6e\x73\x65\x74\73\143\157\x6c\x6f\162\x3a\x20\x23\x46\106\106\x3b\42\x74\171\160\x65\75\42\x62\x75\x74\x74\x6f\156\42\40\166\141\154\x75\145\75\42\104\157\x6e\145\x22\40\x6f\x6e\x43\154\x69\x63\x6b\x3d\42\x73\x65\x6c\x66\x2e\143\154\x6f\163\145\50\51\x3b\42\x3e\x3c\57\x64\151\x76\x3e";
    exit;
    SHN:
}
function addLink($BG, $ju)
{
    $XP = "\x3c\141\40\x68\162\x65\x66\x3d\x22" . $ju . "\42\x3e" . $BG . "\x3c\57\141\x3e";
    return $XP;
}
function get_status_message($iB)
{
    switch ($iB) {
        case "\122\145\161\x75\145\x73\164\x65\162":
            return "\124\150\x65\40\162\x65\x71\165\x65\x73\164\x20\x63\x6f\x75\154\144\x20\x6e\157\164\x20\x62\x65\40\x70\145\x72\x66\157\x72\x6d\x65\x64\x20\x64\x75\145\40\x74\157\x20\141\156\40\x65\x72\x72\x6f\162\40\157\x6e\40\164\150\x65\x20\160\141\162\164\40\x6f\146\40\164\150\x65\40\x72\145\161\x75\x65\163\164\145\162\56";
            goto VWN;
        case "\x52\145\163\160\157\x6e\144\145\x72":
            return "\x54\x68\x65\40\x72\x65\x71\x75\145\x73\164\40\x63\157\x75\x6c\x64\40\156\x6f\164\x20\142\145\40\x70\145\162\x66\x6f\162\155\145\x64\40\x64\165\145\x20\x74\157\x20\x61\156\x20\145\x72\162\x6f\162\40\x6f\156\x20\164\x68\x65\x20\160\141\x72\x74\x20\157\146\40\164\x68\145\40\123\x41\x4d\x4c\40\162\145\163\160\x6f\156\x64\x65\x72\40\157\x72\x20\123\101\115\x4c\40\x61\165\x74\x68\157\162\x69\164\171\56";
            goto VWN;
        case "\x56\145\x72\x73\x69\157\x6e\115\x69\x73\x6d\x61\x74\x63\x68":
            return "\124\x68\145\x20\123\101\115\114\x20\162\x65\163\160\x6f\x6e\144\145\x72\40\143\157\165\x6c\144\x20\x6e\x6f\164\40\x70\x72\x6f\x63\145\x73\163\40\164\150\x65\x20\162\x65\161\x75\x65\x73\164\x20\x62\x65\x63\141\165\163\145\40\164\x68\145\40\166\145\162\x73\x69\157\x6e\40\157\146\x20\x74\x68\145\x20\162\145\x71\x75\x65\x73\x74\x20\155\145\x73\163\141\147\x65\40\x77\x61\163\x20\151\156\143\x6f\162\x72\145\143\x74\x2e";
            goto VWN;
        default:
            return "\x55\x6e\153\156\157\167\156";
    }
    pj2:
    VWN:
}
function mo_saml_register_widget()
{
    register_widget("\155\157\x5f\x6c\x6f\147\151\x6e\137\167\x69\x64");
}
function mo_saml_get_relay_state($bs)
{
    if (!($bs == "\x74\x65\163\164\126\141\x6c\x69\144\141\164\145" || $bs == "\164\x65\x73\x74\x4e\x65\167\103\145\162\164\151\146\151\143\x61\164\x65")) {
        goto wfQ;
    }
    return $bs;
    wfQ:
    if (get_option("\155\157\137\163\x61\x6d\154\x5f\x73\x65\x6e\144\137\141\142\163\157\x6c\165\x74\x65\x5f\162\x65\154\141\171\x5f\x73\164\141\164\x65")) {
        goto pEG;
    }
    $ph = parse_url($bs, PHP_URL_PATH);
    if (!parse_url($bs, PHP_URL_QUERY)) {
        goto m7K;
    }
    $jy = parse_url($bs, PHP_URL_QUERY);
    $ph = $ph . "\x3f" . $jy;
    m7K:
    if (!parse_url($bs, PHP_URL_FRAGMENT)) {
        goto pCR;
    }
    $b9 = parse_url($bs, PHP_URL_FRAGMENT);
    $ph = $ph . "\x23" . $b9;
    pCR:
    goto qPb;
    pEG:
    $xl = get_option("\155\x6f\137\x73\x61\155\154\x5f\x63\165\x73\164\x6f\155\145\x72\x5f\164\x6f\153\x65\x6e");
    $ph = AESEncryption::encrypt_data($bs, $xl);
    qPb:
    return $ph;
}
add_action("\167\151\144\x67\145\164\163\137\x69\x6e\151\164", "\155\157\137\x73\141\155\154\137\162\x65\x67\x69\163\x74\145\162\x5f\167\x69\144\x67\x65\x74");
add_action("\x69\x6e\151\164", "\x6d\x6f\x5f\x6c\157\147\151\x6e\137\x76\x61\x6c\151\144\141\x74\x65");

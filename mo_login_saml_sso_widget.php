<?php


include_once dirname(__FILE__) . "\57\125\x74\151\154\x69\164\151\x65\163\56\160\150\x70";
include_once dirname(__FILE__) . "\x2f\122\145\x73\x70\x6f\x6e\x73\x65\56\x70\x68\x70";
include_once dirname(__FILE__) . "\x2f\114\157\x67\157\165\x74\x52\145\161\165\x65\163\164\x2e\x70\150\160";
include_once "\170\x6d\154\x73\145\143\154\151\142\163\56\x70\x68\x70";
use RobRichards\XMLSecLibs\XMLSecurityKey;
use RobRichards\XMLSecLibs\XMLSecurityDSig;
use RobRichards\XMLSecLibs\XMLSecEnc;
if (class_exists("\x41\105\x53\x45\156\x63\162\171\160\164\x69\x6f\x6e")) {
    goto NJ;
}
require_once dirname(__FILE__) . "\57\151\x6e\143\x6c\x75\x64\145\163\57\x6c\151\x62\57\x65\x6e\x63\162\x79\x70\164\x69\x6f\156\x2e\160\150\160";
NJ:
class mo_login_wid extends WP_Widget
{
    public function __construct()
    {
        $N7 = LicenseHelper::getCurrentOption(mo_options_enum_service_provider::Identity_name);
        parent::__construct("\123\141\155\154\137\x4c\157\147\151\x6e\137\127\151\x64\147\145\x74", "\x4c\157\147\151\x6e\40\x77\151\164\x68\x20" . $N7, array("\x64\145\163\143\x72\151\160\x74\151\x6f\x6e" => __("\x54\x68\x69\x73\x20\x69\163\40\x61\40\155\151\x6e\x69\117\x72\141\156\147\145\40\x53\101\x4d\114\40\154\x6f\147\151\x6e\40\167\x69\144\147\145\164\x2e", "\155\157\x73\141\x6d\x6c")));
    }
    public function widget($fa, $Wk)
    {
        extract($fa);
        $GH = apply_filters("\167\151\x64\x67\145\164\x5f\164\151\x74\154\145", $Wk["\167\x69\x64\137\164\x69\164\154\145"]);
        echo $fa["\x62\x65\x66\157\162\x65\x5f\167\x69\x64\147\145\x74"];
        if (empty($GH)) {
            goto Qd;
        }
        echo $fa["\x62\x65\146\x6f\x72\x65\x5f\x74\x69\x74\x6c\145"] . $GH . $fa["\141\x66\164\x65\x72\x5f\164\151\164\x6c\145"];
        Qd:
        $this->loginForm();
        echo $fa["\x61\x66\164\145\x72\x5f\167\151\x64\147\145\x74"];
    }
    public function update($yU, $FG)
    {
        $Wk = array();
        $Wk["\167\x69\144\x5f\x74\x69\x74\154\x65"] = strip_tags($yU["\167\x69\x64\137\164\x69\164\x6c\x65"]);
        return $Wk;
    }
    public function form($Wk)
    {
        $GH = '';
        if (!array_key_exists("\167\151\x64\x5f\x74\151\x74\x6c\145", $Wk)) {
            goto Pn;
        }
        $GH = $Wk["\x77\x69\x64\x5f\x74\x69\164\154\145"];
        Pn:
        echo "\15\xa\11\x9\x3c\x70\76\x3c\x6c\141\x62\x65\x6c\40\146\x6f\x72\x3d\x22" . $this->get_field_id("\x77\151\144\137\164\x69\x74\x6c\x65") . "\x20\x22\x3e" . _e("\124\x69\x74\154\x65\x3a") . "\40\74\57\154\141\x62\145\x6c\x3e\15\xa\x9\x9\74\151\156\x70\165\x74\40\x63\x6c\141\163\163\x3d\42\x77\x69\144\x65\x66\x61\x74\x22\40\x69\144\x3d\x22" . $this->get_field_id("\167\x69\x64\x5f\x74\x69\x74\x6c\145") . "\42\x20\x6e\x61\155\x65\x3d\x22" . $this->get_field_name("\167\151\x64\x5f\x74\151\164\154\145") . "\x22\40\164\171\x70\145\x3d\x22\x74\x65\170\x74\x22\40\166\x61\x6c\x75\x65\x3d\x22" . $GH . "\x22\x20\x2f\x3e\xd\12\11\x9\74\57\x70\76";
    }
    public function loginForm()
    {
        global $post;
        $pI = SAMLSPUtilities::mo_saml_is_user_logged_in();
        if (!$pI) {
            goto Lg;
        }
        $current_user = wp_get_current_user();
        $Gt = "\x48\145\x6c\154\x6f\54";
        if (!get_option("\155\x6f\137\163\141\x6d\154\137\143\165\163\164\157\155\x5f\147\162\145\x65\x74\x69\x6e\147\x5f\164\145\x78\164")) {
            goto yY;
        }
        $Gt = get_option("\x6d\157\x5f\x73\141\x6d\x6c\x5f\143\x75\x73\164\157\x6d\x5f\x67\162\145\x65\164\x69\156\x67\x5f\x74\x65\170\164");
        yY:
        $mH = '';
        if (!get_option("\155\x6f\137\x73\x61\x6d\x6c\137\x67\162\145\x65\164\151\156\x67\137\x6e\x61\155\x65")) {
            goto yk;
        }
        switch (get_option("\155\157\x5f\x73\x61\x6d\x6c\x5f\x67\162\x65\x65\x74\151\156\147\137\x6e\141\155\x65")) {
            case "\x55\x53\x45\x52\116\101\115\x45":
                $mH = $current_user->user_login;
                goto uv;
            case "\x45\x4d\101\x49\x4c":
                $mH = $current_user->user_email;
                goto uv;
            case "\106\116\x41\x4d\105":
                $mH = $current_user->user_firstname;
                goto uv;
            case "\x4c\x4e\x41\x4d\x45":
                $mH = $current_user->user_lastname;
                goto uv;
            case "\106\116\x41\x4d\105\x5f\114\x4e\101\115\x45":
                $mH = $current_user->user_firstname . "\x20" . $current_user->user_lastname;
                goto uv;
            case "\x4c\x4e\101\x4d\105\x5f\106\x4e\101\x4d\105":
                $mH = $current_user->user_lastname . "\40" . $current_user->user_firstname;
                goto uv;
            default:
                $mH = $current_user->user_login;
        }
        ZJ:
        uv:
        yk:
        $mH = trim($mH);
        if (!empty($mH)) {
            goto d6;
        }
        $mH = $current_user->user_login;
        d6:
        $Wn = $Gt . "\x20" . $mH;
        $IT = "\114\x6f\x67\157\x75\x74";
        if (!get_option("\x6d\157\137\x73\141\155\154\x5f\x63\x75\x73\x74\x6f\x6d\x5f\x6c\x6f\147\157\x75\x74\x5f\x74\145\170\x74")) {
            goto v5;
        }
        $IT = get_option("\x6d\157\137\163\x61\x6d\154\137\x63\x75\163\x74\157\x6d\x5f\x6c\157\147\x6f\165\164\x5f\x74\145\x78\x74");
        v5:
        echo $Wn . "\x20\x7c\x20\74\x61\x20\150\x72\145\x66\75\x22" . wp_logout_url(home_url()) . "\x22\x20\164\151\x74\x6c\x65\75\42\154\157\x67\157\x75\164\42\40\x3e" . $IT . "\74\x2f\x61\76\x3c\x2f\x6c\x69\x3e";
        goto pZ;
        Lg:
        $jS = saml_get_current_page_url();
        echo "\15\12\x9\x9\74\163\143\162\x69\160\164\76\xd\12\x9\x9\146\165\x6e\x63\164\x69\x6f\x6e\x20\163\x75\142\155\x69\164\123\141\155\154\106\x6f\x72\x6d\x28\x29\x7b\x20\144\157\143\x75\155\x65\x6e\x74\56\x67\145\x74\x45\154\x65\x6d\x65\156\x74\102\171\x49\144\x28\42\x6d\151\x6e\151\x6f\x72\x61\156\x67\x65\55\163\141\155\x6c\55\x73\x70\x2d\163\x73\157\x2d\154\157\x67\x69\x6e\x2d\x66\157\x72\155\x22\x29\x2e\x73\x75\x62\x6d\x69\x74\50\x29\73\40\175\15\xa\11\x9\x3c\57\x73\x63\162\151\x70\x74\x3e\15\xa\11\x9\x3c\146\x6f\162\x6d\40\156\141\155\145\75\x22\x6d\151\156\x69\157\162\141\156\147\x65\x2d\x73\141\x6d\x6c\55\163\x70\55\x73\x73\157\55\x6c\157\x67\151\156\55\146\157\x72\155\x22\40\151\144\75\x22\155\151\x6e\151\157\162\141\156\x67\145\x2d\163\141\155\x6c\55\163\x70\55\x73\163\x6f\55\154\x6f\x67\151\x6e\x2d\x66\157\x72\x6d\x22\40\155\x65\x74\150\x6f\144\x3d\x22\160\x6f\x73\164\x22\40\x61\143\x74\x69\157\156\75\x22\x22\x3e\xd\12\x9\11\74\151\156\160\x75\164\x20\164\x79\160\x65\75\x22\x68\151\144\x64\145\156\x22\x20\x6e\x61\155\145\x3d\x22\157\x70\x74\151\x6f\x6e\42\40\x76\x61\x6c\165\145\x3d\x22\163\x61\x6d\x6c\x5f\x75\x73\145\162\137\154\x6f\x67\151\156\x22\x20\x2f\x3e\xd\xa\11\x9\x3c\x69\x6e\x70\x75\x74\40\x74\171\160\145\75\42\150\x69\144\144\145\156\x22\40\x6e\x61\x6d\145\75\42\x72\x65\x64\x69\162\x65\143\164\x5f\164\157\42\x20\166\141\x6c\165\145\75\x22" . $jS . "\x22\x20\x2f\76\xd\xa\15\xa\x9\11\x3c\x66\x6f\x6e\x74\40\x73\x69\172\145\x3d\x22\53\61\42\40\163\x74\x79\x6c\145\x3d\x22\166\145\x72\164\151\143\x61\154\55\141\154\151\x67\x6e\72\x74\x6f\x70\x3b\x22\76\40\74\x2f\x66\157\156\164\76";
        $t8 = LicenseHelper::getCurrentOption(mo_options_enum_service_provider::Identity_name);
        if (!empty($t8)) {
            goto Yw;
        }
        echo "\120\x6c\x65\x61\x73\145\x20\x63\x6f\156\146\151\147\165\x72\x65\40\164\150\x65\x20\x6d\x69\x6e\x69\117\x72\141\156\x67\x65\40\123\101\x4d\114\x20\120\x6c\165\x67\151\x6e\x20\146\x69\x72\x73\x74\56";
        goto Vo;
        Yw:
        $BT = "\114\157\147\151\x6e\x20\167\x69\164\150\x20\x23\43\x49\104\120\43\x23";
        if (!get_option("\x6d\157\137\x73\x61\155\154\x5f\143\165\x73\x74\x6f\155\137\154\x6f\147\x69\156\137\x74\145\x78\164")) {
            goto FQ;
        }
        $BT = get_option("\155\157\x5f\x73\141\x6d\x6c\137\x63\x75\x73\164\157\155\137\154\x6f\147\151\x6e\137\164\x65\x78\x74");
        FQ:
        $BT = str_replace("\43\43\111\x44\x50\x23\43", $t8, $BT);
        $DF = false;
        if (!get_option("\155\x6f\x5f\x73\x61\x6d\154\x5f\x75\x73\145\137\x62\x75\164\x74\x6f\x6e\x5f\x61\163\137\x77\151\x64\147\x65\164")) {
            goto k0;
        }
        if (!(get_option("\155\157\x5f\163\141\x6d\154\x5f\x75\163\145\137\142\x75\164\164\x6f\156\x5f\141\x73\137\167\151\144\x67\145\x74") == "\164\x72\165\x65")) {
            goto nv;
        }
        $DF = true;
        nv:
        k0:
        if (!$DF) {
            goto Vj;
        }
        $nJ = get_option("\155\x6f\x5f\x73\x61\155\x6c\137\x62\x75\x74\164\x6f\156\137\167\151\144\x74\150") ? get_option("\155\157\137\163\141\155\x6c\x5f\x62\x75\x74\164\x6f\x6e\137\x77\x69\144\164\150") : "\61\60\x30";
        $Ko = get_option("\x6d\157\x5f\163\141\x6d\x6c\x5f\x62\165\164\164\x6f\x6e\x5f\150\x65\151\147\150\x74") ? get_option("\155\x6f\137\x73\141\155\154\x5f\142\165\164\164\157\x6e\137\x68\x65\x69\147\x68\164") : "\65\x30";
        $pe = get_option("\155\x6f\x5f\x73\x61\155\x6c\137\142\165\164\x74\x6f\156\137\163\x69\172\x65") ? get_option("\x6d\x6f\137\x73\x61\x6d\x6c\137\x62\165\x74\x74\x6f\x6e\137\x73\151\172\145") : "\x35\x30";
        $Fh = get_option("\x6d\157\x5f\163\141\x6d\154\x5f\x62\165\164\x74\x6f\x6e\x5f\x63\165\162\166\x65") ? get_option("\x6d\x6f\137\x73\141\x6d\x6c\x5f\x62\165\164\164\x6f\156\137\x63\x75\x72\166\x65") : "\65";
        $op = get_option("\x6d\157\x5f\163\x61\155\154\x5f\142\165\x74\x74\x6f\x6e\x5f\143\x6f\154\157\162") ? get_option("\x6d\x6f\x5f\x73\141\155\x6c\137\x62\165\x74\x74\157\156\x5f\143\x6f\154\x6f\x72") : "\x30\x30\x38\x35\x62\141";
        $r8 = get_option("\x6d\157\x5f\x73\141\155\x6c\x5f\142\x75\x74\x74\x6f\156\x5f\164\x68\145\x6d\145") ? get_option("\x6d\157\137\x73\x61\x6d\x6c\x5f\142\165\x74\164\157\x6e\x5f\x74\x68\145\155\145") : "\154\157\x6e\x67\x62\x75\164\x74\157\156";
        $N0 = isset($_SESSION["\155\x6f\x5f\x67\165\145\163\164\x5f\154\x6f\x67\151\156"]["\154\157\x67\147\145\144\137\151\156\137\x69\x64\x70\137\x6e\141\x6d\x65"]) ? $_SESSION["\x6d\x6f\137\147\165\x65\x73\x74\137\x6c\x6f\x67\x69\156"]["\x6c\x6f\x67\147\145\x64\137\151\156\137\151\x64\160\137\x6e\141\155\145"] : LicenseHelper::getCurrentOption(mo_options_enum_service_provider::Identity_name);
        $AQ = get_option("\x6d\157\x5f\163\x61\x6d\x6c\137\x62\x75\x74\164\157\x6e\x5f\x74\145\170\164") ? get_option("\155\157\137\x73\141\x6d\x6c\x5f\x62\x75\164\164\x6f\156\137\164\x65\x78\x74") : ($N0 ? $N0 : "\x4c\157\147\151\156");
        $kQ = get_option("\155\x6f\x5f\163\x61\155\154\x5f\146\157\156\164\137\143\157\x6c\x6f\x72") ? get_option("\x6d\x6f\137\x73\141\x6d\x6c\137\146\x6f\156\164\x5f\143\157\x6c\x6f\x72") : "\x66\x66\146\146\x66\146";
        $aE = get_option("\x6d\157\x5f\163\x61\155\x6c\x5f\x66\x6f\156\x74\x5f\163\x69\172\x65") ? get_option("\155\x6f\x5f\x73\x61\155\154\137\x66\x6f\x6e\164\x5f\x73\151\x7a\x65") : "\x32\x30";
        $BT = "\x3c\x69\x6e\160\165\x74\x20\x74\171\x70\145\75\42\142\165\164\x74\157\x6e\42\x20\x6e\x61\x6d\x65\x3d\42\x6d\x6f\x5f\x73\141\x6d\154\x5f\167\160\x5f\x73\163\x6f\x5f\x62\165\x74\164\x6f\156\x22\x20\166\141\x6c\165\145\x3d\42" . $AQ . "\x22\x20\163\164\x79\x6c\x65\75\42";
        $Mz = '';
        if ($r8 == "\x6c\x6f\x6e\x67\x62\x75\x74\164\x6f\x6e") {
            goto ss;
        }
        if ($r8 == "\x63\151\x72\143\x6c\145") {
            goto Cf;
        }
        if ($r8 == "\157\166\141\154") {
            goto yV;
        }
        if ($r8 == "\163\161\165\141\x72\x65") {
            goto nu;
        }
        goto cY;
        Cf:
        $Mz = $Mz . "\167\x69\144\x74\150\x3a" . $pe . "\x70\170\73";
        $Mz = $Mz . "\x68\x65\151\x67\150\x74\72" . $pe . "\x70\170\x3b";
        $Mz = $Mz . "\142\157\x72\x64\x65\x72\55\162\x61\144\x69\x75\163\x3a\71\71\71\160\170\73";
        goto cY;
        yV:
        $Mz = $Mz . "\x77\x69\144\164\150\x3a" . $pe . "\160\x78\x3b";
        $Mz = $Mz . "\x68\145\x69\147\x68\x74\72" . $pe . "\x70\170\73";
        $Mz = $Mz . "\142\157\x72\144\145\x72\55\x72\x61\x64\x69\165\163\72\65\x70\x78\x3b";
        goto cY;
        nu:
        $Mz = $Mz . "\x77\151\x64\164\150\72" . $pe . "\160\170\x3b";
        $Mz = $Mz . "\150\145\151\x67\150\x74\72" . $pe . "\160\x78\x3b";
        $Mz = $Mz . "\x62\157\162\x64\x65\162\55\162\x61\x64\x69\165\163\x3a\60\x70\x78\73";
        cY:
        goto vi;
        ss:
        $Mz = $Mz . "\167\151\144\164\x68\72" . $nJ . "\x70\170\x3b";
        $Mz = $Mz . "\x68\145\151\x67\x68\x74\x3a" . $Ko . "\x70\170\73";
        $Mz = $Mz . "\x62\157\162\144\x65\162\55\162\x61\144\x69\x75\x73\x3a" . $Fh . "\160\170\73";
        vi:
        $Mz = $Mz . "\142\141\x63\x6b\147\x72\157\x75\x6e\144\55\x63\x6f\x6c\x6f\x72\72\43" . $op . "\x3b";
        $Mz = $Mz . "\142\x6f\x72\144\145\162\x2d\x63\x6f\154\157\162\x3a\x74\x72\141\x6e\163\160\x61\162\145\156\x74\x3b";
        $Mz = $Mz . "\x63\x6f\x6c\x6f\x72\72\x23" . $kQ . "\x3b";
        $Mz = $Mz . "\146\x6f\x6e\164\55\163\151\x7a\145\x3a" . $aE . "\160\170\x3b";
        $Mz = $Mz . "\160\x61\x64\x64\x69\156\147\72\60\160\x78\x3b";
        $BT = $BT . $Mz . "\x22\x2f\x3e";
        Vj:
        echo "\x20\x3c\x61\40\x68\162\x65\x66\x3d\42\x23\x22\40\x6f\x6e\x43\154\151\143\153\x3d\42\163\165\142\x6d\151\x74\123\141\155\x6c\106\157\162\155\50\x29\x22\x3e";
        echo $BT;
        echo "\74\57\x61\76\x3c\57\x66\x6f\x72\x6d\x3e\40";
        Vo:
        if ($this->mo_saml_check_empty_or_null_val(get_option("\x6d\x6f\137\x73\x61\x6d\154\137\x72\x65\x64\x69\162\145\143\x74\137\x65\162\162\x6f\162\x5f\143\157\144\x65"))) {
            goto Kl;
        }
        echo "\74\x64\151\x76\76\74\57\x64\x69\166\x3e\74\x64\x69\166\x20\164\x69\164\154\x65\75\x22\114\157\147\151\156\x20\105\162\162\x6f\162\42\76\x3c\x66\157\x6e\164\40\x63\157\x6c\157\162\x3d\x22\162\145\x64\x22\x3e\x57\x65\x20\143\x6f\165\154\144\40\156\157\x74\40\x73\151\147\156\40\171\x6f\x75\40\151\156\x2e\x20\x50\x6c\x65\141\x73\x65\40\143\157\156\164\141\x63\164\40\171\157\165\x72\x20\101\x64\x6d\151\x6e\x69\x73\164\x72\141\164\x6f\162\56\74\57\146\x6f\x6e\x74\76\x3c\57\144\151\x76\x3e";
        delete_option("\x6d\157\137\x73\x61\x6d\x6c\137\x72\145\x64\x69\162\145\143\164\137\145\x72\162\157\162\137\143\x6f\x64\145");
        delete_option("\x6d\157\x5f\163\x61\155\x6c\137\162\x65\144\x69\x72\145\143\164\137\x65\162\162\157\x72\x5f\162\145\141\x73\x6f\x6e");
        Kl:
        echo "\x9\x3c\x2f\x75\x6c\76\15\12\11\x9\x3c\x2f\x66\157\162\x6d\76";
        pZ:
    }
    public function mo_saml_check_empty_or_null_val($x9)
    {
        if (!(!isset($x9) || empty($x9))) {
            goto bt;
        }
        return true;
        bt:
        return false;
    }
    public function mo_saml_widget_init()
    {
        if (!(defined("\127\x50\137\x43\x4c\111") && WP_CLI)) {
            goto Lk;
        }
        require_once dirname(__FILE__) . "\x2f\155\x6f\55\x73\141\155\154\x2d\167\x70\x2d\x63\x6c\x69\x2d\x63\157\155\x6d\x61\x6e\144\163\x2e\160\150\160";
        Lk:
        if (!(isset($_REQUEST["\x6f\160\x74\x69\157\x6e"]) and $_REQUEST["\x6f\160\x74\151\x6f\156"] == "\x73\141\155\154\137\165\163\145\162\x5f\154\157\147\157\x75\164")) {
            goto M6;
        }
        $user = is_user_logged_in() ? wp_get_current_user() : null;
        if (empty($user)) {
            goto PR;
        }
        wp_logout();
        PR:
        M6:
    }
    function mo_saml_logout($Zn)
    {
        $user = get_user_by("\x69\144", $Zn);
        $lD = htmlspecialchars_decode(LicenseHelper::getCurrentOption(mo_options_enum_service_provider::Logout_URL));
        $qa = LicenseHelper::getCurrentOption(mo_options_enum_service_provider::Logout_binding_type);
        $F6 = wp_get_referer();
        $ZS = get_option("\x6d\x6f\x5f\x73\141\155\x6c\x5f\163\x70\137\142\141\x73\x65\x5f\x75\x72\154");
        $ru = false;
        if (!(isset($_COOKIE["\x6c\x6f\x67\147\x65\144\x5f\x69\156\137\167\x69\164\x68\137\151\144\160"]) and !empty($_COOKIE["\154\157\147\147\145\144\x5f\x69\156\x5f\x77\151\164\x68\x5f\x69\144\x70"]))) {
            goto op;
        }
        $ru = true;
        op:
        if (!(!session_id() || session_id() == '' || !isset($_SESSION))) {
            goto dM;
        }
        session_start();
        dM:
        if (!empty($F6)) {
            goto bb;
        }
        $F6 = !empty($ZS) ? $ZS : home_url();
        bb:
        if (empty($lD)) {
            goto Px;
        }
        if (isset($_SESSION["\155\x6f\x5f\x73\x61\155\x6c\137\154\x6f\x67\157\165\164\137\162\x65\x71\x75\x65\163\164"])) {
            goto l6;
        }
        if (isset($_SESSION["\x6d\157\x5f\163\x61\x6d\x6c"]["\x6c\157\147\x67\145\144\137\x69\x6e\137\x77\151\164\150\137\151\x64\160"]) || $ru) {
            goto Ne;
        }
        goto Dv;
        l6:
        self::createLogoutResponseAndRedirect($lD, $qa);
        exit;
        goto Dv;
        Ne:
        $current_user = $user;
        if (isset($_SESSION["\155\x6f\x5f\x67\x75\145\x73\x74\x5f\154\x6f\147\151\156"]["\x6e\141\x6d\145\111\104"])) {
            goto az;
        }
        if (isset($_COOKIE["\156\141\155\x65\x49\104"])) {
            goto HK;
        }
        $vQ = get_user_meta($current_user->ID, "\155\x6f\137\x73\141\155\154\x5f\x6e\141\155\145\x5f\x69\144");
        goto b6;
        HK:
        $vQ = $_COOKIE["\x6e\141\155\145\111\104"];
        b6:
        goto xF;
        az:
        $vQ = $_SESSION["\155\x6f\x5f\147\x75\x65\x73\164\x5f\154\x6f\x67\x69\x6e"]["\x6e\x61\x6d\x65\x49\x44"];
        xF:
        if (isset($_SESSION["\x6d\157\x5f\147\x75\145\163\x74\137\x6c\157\x67\151\x6e"]["\x73\x65\163\163\151\x6f\156\111\x6e\x64\145\170"])) {
            goto t6;
        }
        if (isset($_COOKIE["\163\145\163\163\x69\x6f\156\x49\x6e\144\x65\170"])) {
            goto LA;
        }
        $pK = get_user_meta($current_user->ID, "\155\x6f\x5f\x73\141\x6d\x6c\137\163\145\163\x73\151\x6f\156\x5f\151\x6e\144\145\x78");
        goto g9;
        LA:
        $pK = $_COOKIE["\x73\145\x73\163\x69\157\156\111\x6e\144\145\x78"];
        g9:
        goto at;
        t6:
        $pK = $_SESSION["\155\x6f\x5f\147\165\145\163\x74\x5f\154\157\x67\151\x6e"]["\163\145\x73\163\151\157\156\x49\x6e\144\145\x78"];
        at:
        if (empty($vQ)) {
            goto XP;
        }
        unset($_SESSION["\x6d\x6f\x5f\163\x61\155\154"]);
        unset($_SESSION["\155\157\x5f\x67\x75\x65\x73\164\x5f\154\x6f\x67\151\156"]);
        unset($_COOKIE["\x6c\x6f\x67\147\x65\144\137\151\x6e\x5f\167\x69\164\x68\137\x69\144\x70"]);
        setcookie("\x6c\157\147\x67\x65\x64\137\151\x6e\x5f\x77\x69\x74\x68\x5f\x69\144\x70", '', time() - 3600, "\x2f");
        setcookie("\x6e\141\x6d\x65\x49\x44", '', time() - 3600, "\57");
        setcookie("\163\145\x73\163\x69\157\x6e\x49\x6e\x64\x65\170", '', time() - 3600, "\x2f");
        mo_saml_create_logout_request($vQ, $pK, $lD, $qa, $F6);
        XP:
        Dv:
        Px:
        if (!isset($_SESSION["\x6d\x6f\x5f\147\x75\145\x73\164\x5f\154\157\147\151\156"]["\156\x61\x6d\145\111\x44"])) {
            goto bO;
        }
        unset($_SESSION["\155\x6f\137\x67\165\145\x73\164\x5f\154\157\x67\151\x6e"]);
        setcookie("\156\141\x6d\145\x49\104", '', time() - 3600, "\x2f");
        setcookie("\x73\x65\163\163\x69\157\x6e\x49\156\144\x65\170", '', time() - 3600, "\57");
        bO:
        $fK = get_option("\x6d\x6f\x5f\163\141\x6d\x6c\137\154\157\x67\x6f\165\x74\x5f\162\x65\x6c\141\x79\x5f\163\164\x61\164\x65");
        if (empty($fK)) {
            goto NC;
        }
        wp_redirect($fK);
        exit;
        NC:
        wp_redirect($F6);
        exit;
    }
    function createLogoutResponseAndRedirect($lD, $qa)
    {
        $ZS = get_option("\155\157\x5f\x73\141\x6d\x6c\x5f\163\x70\137\142\141\x73\145\137\x75\162\154");
        if (!empty($ZS)) {
            goto Vf;
        }
        $ZS = home_url();
        Vf:
        $d1 = $_SESSION["\x6d\x6f\x5f\163\141\155\154\137\154\x6f\x67\157\x75\x74\x5f\162\x65\161\165\145\x73\164"];
        $zW = $_SESSION["\x6d\x6f\x5f\x73\141\x6d\154\x5f\154\157\147\157\x75\x74\x5f\x72\x65\x6c\x61\x79\137\x73\x74\x61\164\x65"];
        unset($_SESSION["\x6d\x6f\x5f\x73\141\155\x6c\x5f\x6c\x6f\x67\157\x75\164\137\x72\145\x71\x75\x65\x73\x74"]);
        unset($_SESSION["\x6d\157\x5f\163\x61\x6d\x6c\x5f\x6c\157\147\x6f\165\164\137\x72\x65\154\x61\171\137\x73\164\141\x74\145"]);
        $yP = new DOMDocument();
        $yP->loadXML($d1);
        $d1 = $yP->firstChild;
        if (!($d1->localName == "\x4c\157\x67\x6f\165\164\x52\x65\x71\165\x65\163\164")) {
            goto wp;
        }
        $Ar = new SAML2SPLogoutRequest($d1);
        $vs = get_option("\x6d\x6f\x5f\x73\141\x6d\154\x5f\x73\x70\x5f\x65\156\164\x69\164\171\x5f\151\144");
        if (!empty($vs)) {
            goto H1;
        }
        $vs = $ZS . "\57\x77\160\x2d\x63\x6f\156\164\145\x6e\x74\57\x70\x6c\x75\x67\151\156\163\x2f\155\151\156\151\157\x72\x61\156\147\x65\55\x73\x61\x6d\x6c\x2d\x32\60\x2d\x73\x69\x6e\x67\154\x65\x2d\163\151\x67\x6e\55\157\x6e\57";
        H1:
        $uZ = $lD;
        $uk = SAMLSPUtilities::createLogoutResponse($Ar->getId(), $vs, $uZ, $qa);
        if (empty($qa) || $qa == "\110\x74\164\160\122\145\x64\x69\162\145\143\164") {
            goto Jd;
        }
        if (!(LicenseHelper::getCurrentOption(mo_options_enum_service_provider::Request_signed) != "\x63\x68\x65\143\153\145\x64")) {
            goto GL;
        }
        $Zr = base64_encode($uk);
        SAMLSPUtilities::postSAMLResponse($lD, $Zr, $zW);
        exit;
        GL:
        $jo = '';
        $Wr = '';
        $Zr = SAMLSPUtilities::signXML($uk, "\x53\164\141\x74\165\x73");
        SAMLSPUtilities::postSAMLResponse($lD, $Zr, $zW);
        goto jd;
        Jd:
        $bW = $lD;
        if (strpos($lD, "\x3f") !== false) {
            goto kf;
        }
        $bW .= "\77";
        goto QJ;
        kf:
        $bW .= "\46";
        QJ:
        if (!(LicenseHelper::getCurrentOption(mo_options_enum_service_provider::Request_signed) != "\x63\x68\x65\143\x6b\145\144")) {
            goto H_;
        }
        $bW .= "\123\x41\115\114\122\145\163\160\x6f\156\x73\145\x3d" . $uk . "\46\122\145\154\141\x79\123\164\x61\164\x65\75" . urlencode($zW);
        header("\x4c\x6f\143\x61\x74\151\x6f\156\x3a\40" . $bW);
        exit;
        H_:
        $CB = "\123\101\x4d\114\x52\x65\x73\160\157\156\x73\145\x3d" . $uk . "\46\x52\145\x6c\141\x79\x53\x74\141\164\145\75" . urlencode($zW) . "\46\x53\x69\x67\x41\154\147\75" . urlencode(XMLSecurityKey::RSA_SHA256);
        $mL = array("\x74\171\x70\145" => "\x70\162\x69\166\141\x74\145");
        $N5 = new XMLSecurityKey(XMLSecurityKey::RSA_SHA256, $mL);
        $QU = get_option("\155\x6f\137\x73\x61\x6d\x6c\137\143\165\x72\x72\145\x6e\164\x5f\x63\x65\162\x74\137\x70\162\x69\166\141\x74\145\137\153\x65\171");
        $N5->loadKey($QU, FALSE);
        $MW = new XMLSecurityDSig();
        $Yp = $N5->signData($CB);
        $Yp = base64_encode($Yp);
        $bW .= $CB . "\x26\123\x69\x67\156\141\x74\x75\x72\145\x3d" . urlencode($Yp);
        header("\x4c\157\143\x61\164\151\157\156\x3a\40" . $bW);
        exit;
        jd:
        wp:
    }
}
function mo_saml_create_logout_request($vQ, $pK, $lD, $qa, $F6)
{
    $ZS = get_option("\x6d\x6f\x5f\x73\x61\x6d\x6c\137\x73\x70\137\142\141\163\x65\x5f\x75\x72\x6c");
    if (!empty($ZS)) {
        goto GY;
    }
    $ZS = home_url();
    GY:
    $vs = get_option("\x6d\157\137\163\x61\155\154\x5f\x73\x70\137\145\156\x74\151\164\x79\137\151\x64");
    if (!empty($vs)) {
        goto WM;
    }
    $vs = $ZS . "\57\x77\x70\x2d\x63\x6f\x6e\164\145\x6e\x74\x2f\x70\154\x75\147\151\156\163\x2f\x6d\151\156\151\x6f\x72\x61\156\147\x65\55\x73\141\155\154\x2d\x32\x30\55\x73\151\156\147\154\x65\55\x73\x69\x67\x6e\x2d\157\x6e\57";
    WM:
    $uZ = $lD;
    $lu = $F6;
    $lu = mo_saml_get_relay_state($lu);
    $CB = SAMLSPUtilities::createLogoutRequest($vQ, $vs, $uZ, $pK, $qa);
    if (empty($qa) || $qa == "\110\164\164\x70\122\145\144\x69\x72\x65\143\164") {
        goto T0;
    }
    if (!(LicenseHelper::getCurrentOption(mo_options_enum_service_provider::Request_signed) != "\x63\150\145\x63\x6b\145\x64")) {
        goto Ba;
    }
    $Zr = base64_encode($CB);
    SAMLSPUtilities::postSAMLRequest($lD, $Zr, $lu);
    exit;
    Ba:
    $jo = '';
    $Wr = '';
    $Zr = SAMLSPUtilities::signXML($CB, "\116\x61\155\x65\111\x44");
    SAMLSPUtilities::postSAMLRequest($lD, $Zr, $lu);
    goto R0;
    T0:
    $bW = $lD;
    if (strpos($lD, "\x3f") !== false) {
        goto I3;
    }
    $bW .= "\77";
    goto nD;
    I3:
    $bW .= "\x26";
    nD:
    if (!(LicenseHelper::getCurrentOption(mo_options_enum_service_provider::Request_signed) != "\143\x68\145\143\x6b\x65\144")) {
        goto bo;
    }
    $bW .= "\x53\101\x4d\x4c\x52\145\161\165\x65\x73\x74\x3d" . $CB . "\46\122\x65\x6c\x61\171\x53\164\x61\x74\x65\x3d" . urlencode($lu);
    header("\x4c\157\x63\x61\164\151\x6f\x6e\x3a\40" . $bW);
    exit;
    bo:
    $CB = "\123\x41\x4d\x4c\122\x65\x71\x75\x65\x73\x74\x3d" . $CB . "\46\122\145\x6c\x61\x79\x53\x74\x61\x74\145\x3d" . urlencode($lu) . "\x26\x53\151\147\101\x6c\x67\75" . urlencode(XMLSecurityKey::RSA_SHA256);
    $mL = array("\164\171\x70\x65" => "\160\x72\151\x76\x61\x74\145");
    $N5 = new XMLSecurityKey(XMLSecurityKey::RSA_SHA256, $mL);
    $QU = get_option("\155\x6f\137\x73\x61\x6d\154\137\x63\165\x72\162\x65\x6e\x74\137\x63\x65\162\x74\x5f\x70\x72\x69\x76\141\x74\145\x5f\x6b\x65\171");
    $N5->loadKey($QU, FALSE);
    $MW = new XMLSecurityDSig();
    $Yp = $N5->signData($CB);
    $Yp = base64_encode($Yp);
    $bW .= $CB . "\46\123\151\x67\156\141\x74\165\162\x65\x3d" . urlencode($Yp);
    header("\x4c\157\x63\141\164\x69\157\156\x3a\40" . $bW);
    exit;
    R0:
}
function mo_login_validate()
{
    if (!(isset($_REQUEST["\157\160\x74\x69\x6f\156"]) && $_REQUEST["\x6f\x70\164\151\157\156"] == "\x6d\157\x73\x61\155\154\137\155\145\x74\141\144\x61\164\x61")) {
        goto Lm;
    }
    miniorange_generate_metadata();
    Lm:
    if (!(isset($_REQUEST["\x6f\x70\164\x69\x6f\x6e"]) && $_REQUEST["\x6f\160\x74\151\x6f\x6e"] == "\145\170\160\x6f\x72\164\x5f\x63\x6f\x6e\x66\151\147\x75\162\141\164\x69\x6f\156")) {
        goto HT;
    }
    if (!current_user_can("\x6d\141\x6e\x61\147\145\137\x6f\160\164\x69\157\x6e\163")) {
        goto GJ;
    }
    miniorange_import_export(true);
    GJ:
    exit;
    HT:
    if (!mo_saml_is_customer_license_verified()) {
        goto kA;
    }
    if (!(isset($_REQUEST["\157\160\x74\x69\157\156"]) && $_REQUEST["\x6f\160\164\151\157\156"] == "\163\x61\x6d\154\x5f\x75\163\145\x72\x5f\154\x6f\x67\151\156" || isset($_REQUEST["\157\160\x74\151\x6f\x6e"]) && $_REQUEST["\x6f\x70\164\x69\157\x6e"] == "\x74\145\163\164\x69\144\160\143\157\156\x66\151\x67" || isset($_REQUEST["\157\x70\164\x69\157\x6e"]) && $_REQUEST["\157\160\x74\x69\x6f\156"] == "\147\x65\x74\x73\x61\155\154\162\145\x71\x75\x65\163\x74" || isset($_REQUEST["\x6f\160\164\x69\157\x6e"]) && $_REQUEST["\x6f\x70\164\151\157\x6e"] == "\x67\x65\164\x73\141\x6d\154\x72\145\x73\160\x6f\156\163\x65")) {
        goto n1;
    }
    if (!mo_saml_is_sp_configured()) {
        goto Cu;
    }
    if (!(is_user_logged_in() && $_REQUEST["\157\160\x74\151\x6f\156"] == "\163\141\x6d\x6c\137\165\x73\145\162\x5f\154\157\147\151\156")) {
        goto RB;
    }
    if (!isset($_REQUEST["\162\145\x64\151\x72\x65\x63\164\x5f\x74\x6f"])) {
        goto lr;
    }
    $xa = htmlspecialchars($_REQUEST["\x72\x65\x64\151\x72\145\x63\x74\137\164\157"]);
    header("\114\157\143\x61\164\x69\x6f\156\x3a\x20" . $xa);
    exit;
    lr:
    return;
    RB:
    $ZS = get_option("\x6d\157\137\163\x61\155\154\137\x73\160\137\x62\141\x73\145\137\165\162\x6c");
    if (!empty($ZS)) {
        goto IK;
    }
    $ZS = home_url();
    IK:
    if (isset($_REQUEST["\151\x64\160"]) and !empty($_REQUEST["\x69\x64\160"])) {
        goto kJ;
    }
    $S3 = '';
    goto eZ;
    kJ:
    $S3 = htmlspecialchars($_REQUEST["\x69\x64\160"]);
    eZ:
    if ($_REQUEST["\x6f\x70\164\x69\157\156"] == "\164\x65\163\x74\151\144\160\143\x6f\x6e\146\151\x67" and array_key_exists("\156\x65\x77\143\x65\162\164", $_REQUEST)) {
        goto R2;
    }
    if ($_REQUEST["\157\160\164\x69\x6f\156"] == "\164\x65\x73\x74\x69\x64\x70\143\157\156\x66\x69\147") {
        goto Tj;
    }
    if ($_REQUEST["\x6f\x70\x74\x69\x6f\156"] == "\147\x65\x74\163\x61\x6d\x6c\162\145\x71\x75\x65\x73\x74") {
        goto bi;
    }
    if ($_REQUEST["\x6f\160\x74\151\x6f\156"] == "\147\145\x74\x73\141\155\154\162\x65\163\x70\157\156\163\145") {
        goto dx;
    }
    if (get_option("\155\x6f\137\163\x61\155\x6c\x5f\x72\x65\154\x61\171\137\163\164\141\164\145") && get_option("\155\x6f\x5f\x73\x61\x6d\x6c\137\x72\145\x6c\x61\x79\x5f\x73\x74\141\164\x65") != '') {
        goto Lb;
    }
    if (isset($_REQUEST["\x72\x65\x64\x69\162\x65\x63\164\137\x74\157"])) {
        goto gx;
    }
    $lu = wp_get_referer();
    goto fz;
    gx:
    $lu = htmlspecialchars($_REQUEST["\x72\145\x64\151\x72\x65\x63\x74\137\x74\157"]);
    fz:
    goto jz;
    Lb:
    $lu = get_option("\x6d\157\x5f\x73\141\x6d\154\137\162\x65\154\x61\171\137\163\164\x61\164\x65");
    jz:
    goto RD;
    dx:
    $lu = "\x64\x69\163\x70\x6c\141\171\x53\x41\x4d\114\122\145\x73\x70\x6f\156\x73\x65";
    RD:
    goto Sk;
    bi:
    $lu = "\x64\x69\x73\x70\x6c\141\171\123\101\115\x4c\x52\145\161\x75\x65\x73\164";
    Sk:
    goto JU;
    Tj:
    $lu = "\164\x65\163\164\x56\141\x6c\151\x64\x61\164\x65";
    JU:
    goto QZ;
    R2:
    $lu = "\x74\x65\163\164\x4e\x65\x77\x43\145\x72\164\151\x66\x69\143\141\164\145";
    QZ:
    if (!empty($lu)) {
        goto QA;
    }
    $lu = $ZS;
    QA:
    $fG = htmlspecialchars_decode(LicenseHelper::getCurrentOption(mo_options_enum_service_provider::Login_URL));
    $xm = LicenseHelper::getCurrentOption(mo_options_enum_service_provider::Login_binding_type);
    $N3 = get_option("\x6d\157\137\x73\x61\155\154\137\x66\157\162\x63\145\x5f\x61\165\164\x68\145\x6e\x74\x69\x63\x61\164\151\x6f\156");
    $d4 = $ZS . "\57";
    $vs = get_option("\x6d\157\x5f\x73\141\x6d\154\x5f\163\160\137\145\156\x74\x69\164\171\137\x69\144");
    $L1 = LicenseHelper::getCurrentOption(mo_options_enum_service_provider::NameID_Format);
    if (!empty($L1)) {
        goto ZK;
    }
    $L1 = "\61\56\61\x3a\x6e\141\x6d\145\x69\144\x2d\146\157\x72\155\141\x74\72\165\156\x73\160\145\143\x69\146\151\x65\144";
    ZK:
    if (!empty($vs)) {
        goto t9;
    }
    $vs = $ZS . "\x2f\167\x70\x2d\143\157\156\x74\x65\156\164\x2f\160\154\x75\147\151\156\x73\57\155\151\156\151\x6f\162\141\x6e\x67\145\x2d\163\141\155\154\55\62\x30\x2d\x73\x69\x6e\x67\x6c\145\55\x73\x69\x67\156\55\x6f\x6e\x2f";
    t9:
    $CB = SAMLSPUtilities::createAuthnRequest($d4, $vs, $fG, $N3, $xm, $L1);
    if (!($lu == "\x64\151\x73\160\154\x61\171\x53\101\x4d\114\122\145\x71\x75\145\x73\164")) {
        goto VY;
    }
    mo_saml_show_SAML_log(SAMLSPUtilities::createAuthnRequest($d4, $vs, $fG, $N3, "\x48\124\124\120\120\157\163\x74", $L1), $lu);
    VY:
    $bW = $fG;
    if (strpos($fG, "\77") !== false) {
        goto yt;
    }
    $bW .= "\77";
    goto hS;
    yt:
    $bW .= "\46";
    hS:
    cldjkasjdksalc();
    $lu = mo_saml_get_relay_state($lu);
    $lu = empty($lu) ? "\57" : $lu;
    if (empty($xm) || $xm == "\110\164\x74\x70\122\x65\x64\x69\x72\145\143\164") {
        goto Bv;
    }
    if (!(LicenseHelper::getCurrentOption(mo_options_enum_service_provider::Request_signed) != "\143\x68\x65\x63\153\145\x64")) {
        goto VI;
    }
    $Zr = base64_encode($CB);
    SAMLSPUtilities::postSAMLRequest($fG, $Zr, $lu);
    exit;
    VI:
    $jo = '';
    $Wr = '';
    if ($_REQUEST["\157\x70\x74\x69\157\156"] == "\x74\145\163\164\x69\x64\x70\143\157\x6e\x66\x69\x67" && array_key_exists("\156\x65\167\143\x65\x72\x74", $_REQUEST)) {
        goto ia;
    }
    $Zr = SAMLSPUtilities::signXML($CB, "\116\x61\155\145\x49\x44\120\157\x6c\x69\x63\171");
    goto xI;
    ia:
    $Zr = SAMLSPUtilities::signXML($CB, "\116\x61\155\145\x49\x44\120\x6f\x6c\x69\143\x79", true);
    xI:
    SAMLSPUtilities::postSAMLRequest($fG, $Zr, $lu, $S3);
    update_option("\x6d\x6f\137\x73\x61\x6d\x6c\137\156\x65\x77\137\143\145\162\x74\x5f\x74\x65\x73\x74", true);
    goto HS;
    Bv:
    if (!(LicenseHelper::getCurrentOption(mo_options_enum_service_provider::Request_signed) != "\x63\x68\145\143\x6b\x65\144")) {
        goto rS;
    }
    $bW .= "\x53\x41\115\x4c\122\145\161\165\x65\163\x74\75" . $CB . "\46\122\145\154\141\171\123\x74\141\164\x65\x3d" . urlencode($lu);
    if (empty($S3)) {
        goto uq;
    }
    $bW .= "\46\165\163\x65\x72\116\141\x6d\x65\75" . $S3;
    uq:
    header("\x63\x61\143\150\145\x2d\x63\157\x6e\164\x72\x6f\x6c\72\40\155\x61\170\x2d\x61\147\x65\75\x30\54\x20\160\x72\x69\x76\141\x74\x65\54\x20\x6e\x6f\x2d\x73\x74\157\x72\x65\54\40\156\157\x2d\x63\141\143\x68\x65\x2c\x20\x6d\x75\163\164\x2d\x72\145\x76\x61\154\151\144\141\164\145");
    header("\114\157\x63\141\x74\151\157\156\x3a\x20" . $bW);
    exit;
    rS:
    $CB = "\123\101\115\x4c\122\145\x71\x75\145\x73\164\75" . $CB . "\x26\x52\x65\x6c\141\x79\123\164\141\x74\x65\x3d" . urlencode($lu) . "\x26\123\x69\x67\x41\154\147\75" . urlencode(XMLSecurityKey::RSA_SHA256);
    $mL = array("\x74\x79\160\145" => "\x70\x72\151\x76\x61\x74\x65");
    $N5 = new XMLSecurityKey(XMLSecurityKey::RSA_SHA256, $mL);
    if ($_REQUEST["\x6f\x70\x74\151\x6f\x6e"] == "\x74\145\x73\x74\x69\x64\160\143\157\x6e\146\151\147" && array_key_exists("\156\x65\x77\x63\145\x72\164", $_REQUEST)) {
        goto CV;
    }
    $QU = get_option("\x6d\157\x5f\163\141\155\154\x5f\x63\x75\x72\162\x65\156\x74\x5f\x63\145\x72\164\137\x70\x72\x69\x76\x61\x74\145\x5f\x6b\x65\171");
    goto cz;
    CV:
    $QU = file_get_contents(plugin_dir_path(__FILE__) . "\x72\145\x73\157\165\162\143\x65\x73" . DIRECTORY_SEPARATOR . "\155\x69\156\151\x6f\162\x61\156\x67\x65\x5f\x73\x70\x5f\x32\x30\62\x30\137\x70\162\x69\166\x2e\x6b\145\x79");
    cz:
    $N5->loadKey($QU, FALSE);
    $MW = new XMLSecurityDSig();
    $Yp = $N5->signData($CB);
    $Yp = base64_encode($Yp);
    $bW .= $CB . "\x26\123\151\147\x6e\141\164\165\162\x65\x3d" . urlencode($Yp);
    if (empty($S3)) {
        goto I9;
    }
    $bW .= "\x26\165\x73\145\162\x4e\x61\x6d\145\x3d" . $S3;
    I9:
    header("\143\141\x63\x68\145\55\x63\157\156\164\x72\x6f\x6c\72\x20\x6d\x61\170\x2d\x61\147\145\x3d\x30\x2c\40\160\162\151\x76\x61\164\145\54\40\156\x6f\x2d\163\x74\157\x72\x65\x2c\x20\x6e\157\x2d\x63\x61\143\x68\x65\54\x20\x6d\x75\163\x74\55\x72\x65\166\x61\x6c\x69\144\141\164\145");
    header("\114\157\143\x61\x74\151\157\156\x3a\x20" . $bW);
    exit;
    HS:
    Cu:
    n1:
    if (!(array_key_exists("\123\101\115\x4c\122\145\x73\x70\x6f\x6e\163\x65", $_REQUEST) && !empty($_REQUEST["\x53\101\x4d\114\x52\x65\163\160\x6f\x6e\x73\145"]))) {
        goto iy;
    }
    if (array_key_exists("\122\x65\x6c\x61\171\123\164\x61\x74\145", $_POST) && !empty($_POST["\x52\145\x6c\x61\171\123\x74\141\x74\x65"]) && $_POST["\122\145\154\x61\x79\x53\x74\141\x74\x65"] != "\57") {
        goto Kn;
    }
    $oK = '';
    goto Z5;
    Kn:
    $oK = $_POST["\x52\145\154\141\171\x53\x74\x61\x74\x65"];
    Z5:
    $ZS = get_option("\155\x6f\x5f\163\141\155\154\x5f\x73\160\137\x62\x61\163\x65\137\x75\162\x6c");
    if (!empty($ZS)) {
        goto xH;
    }
    $ZS = home_url();
    xH:
    $LA = htmlspecialchars($_REQUEST["\123\x41\115\114\x52\x65\x73\160\x6f\156\x73\x65"]);
    $LA = base64_decode($LA);
    if (!($oK == "\x64\x69\x73\160\x6c\x61\171\123\101\x4d\x4c\x52\x65\163\160\157\x6e\163\145")) {
        goto pt;
    }
    mo_saml_show_SAML_log($LA, $oK);
    pt:
    if (!(array_key_exists("\x53\x41\115\x4c\x52\145\163\160\157\156\x73\x65", $_GET) && !empty($_GET["\x53\101\115\114\x52\x65\163\160\x6f\x6e\x73\x65"]))) {
        goto ir;
    }
    $LA = gzinflate($LA);
    ir:
    $yP = new DOMDocument();
    $yP->loadXML($LA);
    $Og = $yP->firstChild;
    $JR = $yP->documentElement;
    $lm = new DOMXpath($yP);
    $lm->registerNamespace("\x73\141\155\154\160", "\165\162\156\72\157\141\163\x69\163\72\156\141\x6d\x65\x73\72\164\x63\x3a\123\101\115\x4c\72\x32\56\x30\x3a\160\162\x6f\x74\x6f\x63\x6f\x6c");
    $lm->registerNamespace("\x73\141\x6d\x6c", "\165\x72\156\x3a\157\141\163\151\x73\x3a\x6e\x61\x6d\145\x73\x3a\x74\x63\x3a\x53\x41\x4d\114\72\x32\x2e\60\72\141\163\163\x65\162\x74\151\157\156");
    if ($Og->localName == "\x4c\x6f\147\157\x75\164\122\x65\163\x70\157\156\x73\x65") {
        goto rL;
    }
    $xO = $lm->query("\57\163\141\155\x6c\160\72\x52\x65\163\160\157\x6e\163\145\57\x73\141\155\154\160\72\x53\x74\141\x74\165\x73\57\163\x61\x6d\154\x70\x3a\x53\x74\x61\x74\x75\163\x43\157\x64\145", $JR);
    $e2 = $xO->item(0)->getAttribute("\x56\141\x6c\x75\x65");
    $bT = $lm->query("\x2f\x73\141\155\x6c\160\x3a\x52\x65\163\160\x6f\156\163\145\x2f\163\x61\x6d\x6c\160\x3a\123\164\x61\164\x75\x73\x2f\x73\x61\155\x6c\160\x3a\x53\164\141\x74\x75\x73\115\145\163\163\x61\147\145", $JR)->item(0);
    if (empty($bT)) {
        goto AO;
    }
    $bT = $bT->nodeValue;
    AO:
    $kb = explode("\72", $e2);
    $xO = $kb[7];
    if (array_key_exists("\122\x65\154\x61\171\x53\x74\141\x74\x65", $_POST) && !empty($_POST["\122\x65\x6c\141\x79\x53\164\141\164\145"]) && $_POST["\122\x65\154\x61\x79\123\x74\x61\x74\145"] != "\57") {
        goto Rr;
    }
    $oK = '';
    goto Hh;
    Rr:
    $oK = $_POST["\122\145\x6c\x61\x79\123\x74\x61\164\x65"];
    Hh:
    if (!($xO != "\123\x75\143\x63\145\163\x73")) {
        goto Le;
    }
    show_status_error($xO, $oK, $bT);
    Le:
    $ZN = maybe_unserialize(LicenseHelper::getCurrentOption(mo_options_enum_service_provider::X509_certificate));
    $d4 = $ZS . "\57";
    update_option("\155\x6f\x5f\x73\x61\155\154\x5f\162\145\x73\160\157\156\163\x65", base64_encode($LA));
    if ($oK == "\x74\x65\x73\x74\x4e\145\167\103\145\162\164\x69\x66\151\x63\x61\164\x65") {
        goto hg;
    }
    $LA = new SAML2SPResponse($Og, get_option("\x6d\x6f\x5f\163\x61\155\x6c\x5f\x63\165\162\x72\x65\x6e\164\137\143\x65\x72\x74\x5f\x70\x72\x69\166\x61\164\x65\x5f\x6b\x65\x79"));
    goto b5;
    hg:
    $IC = file_get_contents(plugin_dir_path(__FILE__) . "\162\x65\163\157\x75\162\x63\145\163" . DIRECTORY_SEPARATOR . "\155\151\156\x69\157\162\x61\x6e\147\x65\137\163\x70\137\x32\x30\x32\x30\137\160\x72\151\x76\x2e\153\145\x79");
    $LA = new SAML2SPResponse($Og, $IC);
    b5:
    $RI = $LA->getSignatureData();
    $cI = current($LA->getAssertions())->getSignatureData();
    if (!(empty($cI) && empty($RI))) {
        goto Bk;
    }
    if ($oK == "\x74\145\163\164\x56\141\x6c\151\144\141\164\145" or $oK == "\x74\x65\163\164\116\x65\167\x43\x65\x72\x74\151\146\151\x63\141\x74\145") {
        goto Wm;
    }
    wp_die("\x57\x65\x20\143\157\165\x6c\144\40\156\x6f\164\40\163\x69\x67\x6e\40\171\157\165\40\151\x6e\x2e\x20\120\x6c\145\141\x73\145\x20\x63\157\156\164\x61\x63\x74\x20\x61\144\155\151\x6e\151\163\164\162\x61\x74\x6f\162", "\105\x72\162\157\x72\x3a\40\x49\x6e\166\x61\154\151\144\x20\x53\x41\x4d\114\x20\x52\145\163\160\x6f\156\163\x65");
    goto NN;
    Wm:
    $Cx = mo_options_error_constants::Error_no_certificate;
    $YG = mo_options_error_constants::Cause_no_certificate;
    echo "\x3c\144\x69\166\40\x73\164\171\154\x65\75\42\x66\x6f\156\164\55\x66\x61\x6d\151\x6c\171\72\x43\x61\x6c\151\142\162\151\x3b\x70\141\144\144\x69\x6e\147\x3a\60\40\x33\x25\73\x22\76\15\xa\x9\11\11\11\x3c\x64\x69\x76\x20\x73\164\x79\x6c\145\x3d\x22\143\157\154\x6f\x72\72\40\x23\141\x39\x34\x34\x34\62\x3b\142\141\x63\x6b\147\x72\x6f\165\156\144\55\x63\157\x6c\x6f\x72\x3a\40\x23\146\x32\x64\145\144\x65\73\160\141\144\x64\151\156\x67\72\x20\x31\x35\160\x78\x3b\155\x61\x72\147\x69\x6e\55\142\x6f\x74\x74\157\155\x3a\40\x32\60\160\x78\73\x74\145\x78\164\x2d\x61\x6c\151\x67\156\x3a\x63\145\x6e\x74\145\162\73\x62\x6f\x72\x64\145\162\x3a\x31\x70\170\x20\x73\x6f\x6c\151\x64\x20\43\x45\66\x42\63\x42\x32\x3b\146\x6f\156\164\x2d\x73\151\172\x65\x3a\x31\70\160\164\x3b\42\76\40\105\x52\x52\117\122\74\57\144\x69\166\x3e\xd\xa\11\x9\x9\x9\x3c\x64\151\x76\x20\x73\x74\x79\x6c\145\75\42\x63\157\x6c\157\x72\72\40\43\x61\71\64\64\64\62\x3b\x66\157\156\164\55\x73\151\x7a\145\72\x31\x34\160\x74\x3b\x20\x6d\141\x72\x67\x69\156\x2d\x62\x6f\164\164\x6f\155\72\x32\x30\160\170\73\x22\x3e\x3c\x70\x3e\x3c\x73\164\162\x6f\x6e\x67\76\x45\162\x72\x6f\162\x20\40\72" . $Cx . "\40\74\57\163\164\x72\x6f\156\x67\76\x3c\x2f\x70\76\xd\12\x9\x9\11\x9\15\12\x9\x9\x9\11\x3c\x70\x3e\74\163\164\x72\157\x6e\147\x3e\x50\157\x73\163\x69\x62\x6c\x65\40\103\141\165\x73\145\x3a\40" . $YG . "\x3c\x2f\x73\164\x72\157\x6e\147\x3e\74\x2f\160\76\xd\xa\11\11\11\x9\15\xa\x9\x9\x9\11\74\57\x64\151\166\x3e\74\x2f\144\151\x76\76";
    mo_saml_download_logs($Cx, $YG);
    exit;
    NN:
    Bk:
    $AZ = '';
    if (is_array($ZN)) {
        goto pe;
    }
    $gk = XMLSecurityKey::getRawThumbprint($ZN);
    $gk = mo_saml_convert_to_windows_iconv($gk);
    $gk = preg_replace("\57\134\x73\53\x2f", '', $gk);
    if (empty($RI)) {
        goto ZY;
    }
    $AZ = SAMLSPUtilities::processResponse($d4, $gk, $RI, $LA, 0, $oK);
    ZY:
    if (empty($cI)) {
        goto hn;
    }
    $AZ = SAMLSPUtilities::processResponse($d4, $gk, $cI, $LA, 0, $oK);
    hn:
    goto pK;
    pe:
    foreach ($ZN as $N5 => $x9) {
        $gk = XMLSecurityKey::getRawThumbprint($x9);
        $gk = mo_saml_convert_to_windows_iconv($gk);
        $gk = preg_replace("\57\134\163\x2b\x2f", '', $gk);
        if (empty($RI)) {
            goto Py;
        }
        $AZ = SAMLSPUtilities::processResponse($d4, $gk, $RI, $LA, $N5, $oK);
        Py:
        if (empty($cI)) {
            goto sN;
        }
        $AZ = SAMLSPUtilities::processResponse($d4, $gk, $cI, $LA, $N5, $oK);
        sN:
        if (!$AZ) {
            goto EG;
        }
        goto qG;
        EG:
        X8:
    }
    qG:
    pK:
    if ($RI) {
        goto yr;
    }
    if ($cI) {
        goto KE;
    }
    goto ao;
    yr:
    $qX = $RI["\x43\x65\162\164\151\x66\151\x63\x61\x74\x65\x73"][0];
    goto ao;
    KE:
    $qX = $cI["\103\145\x72\164\x69\x66\x69\143\141\x74\145\163"][0];
    ao:
    if ($AZ) {
        goto D3;
    }
    if ($oK == "\x74\x65\163\164\x56\141\x6c\151\x64\141\x74\145" or $oK == "\x74\x65\163\x74\x4e\x65\x77\103\x65\x72\x74\x69\146\151\143\x61\x74\145") {
        goto Go;
    }
    wp_die("\127\145\40\x63\x6f\x75\154\144\x20\x6e\x6f\164\x20\x73\x69\x67\156\40\171\x6f\165\40\x69\156\56\40\120\x6c\145\141\163\x65\40\x63\x6f\x6e\x74\x61\x63\x74\40\x79\x6f\165\162\40\141\144\x6d\x69\x6e\x69\163\164\x72\x61\164\157\x72", "\x45\x72\x72\x6f\162\72\x20\111\x6e\166\141\x6c\151\144\40\123\101\115\114\40\x52\145\x73\x70\x6f\x6e\163\145");
    goto zQ;
    Go:
    $Cx = mo_options_error_constants::Error_wrong_certificate;
    $YG = mo_options_error_constants::Cause_wrong_certificate;
    $Ci = "\x2d\x2d\x2d\x2d\55\x42\x45\107\x49\116\x20\103\105\122\x54\111\106\x49\x43\x41\124\105\x2d\x2d\x2d\x2d\55\x3c\x62\162\x3e" . chunk_split($qX, 64) . "\74\142\162\76\55\55\x2d\x2d\x2d\105\116\104\x20\103\105\122\124\111\106\x49\103\x41\x54\x45\55\55\x2d\x2d\55";
    echo "\74\x64\x69\166\x20\x73\164\171\154\145\75\x22\x66\157\x6e\x74\x2d\146\x61\x6d\x69\x6c\x79\72\103\141\154\x69\x62\162\151\73\160\x61\144\144\151\x6e\147\72\60\40\63\45\73\x22\x3e";
    echo "\74\x64\151\166\40\163\164\171\x6c\x65\x3d\42\143\x6f\154\157\162\72\40\43\x61\x39\64\64\64\62\73\x62\141\x63\x6b\147\x72\x6f\165\x6e\x64\x2d\x63\x6f\154\157\x72\x3a\40\x23\x66\62\144\145\144\x65\x3b\160\x61\144\144\151\x6e\147\72\x20\61\x35\x70\x78\73\155\x61\162\147\x69\156\55\x62\x6f\164\164\157\x6d\72\x20\x32\60\x70\170\x3b\164\145\x78\x74\55\141\x6c\151\147\x6e\x3a\143\x65\x6e\164\x65\x72\73\x62\x6f\x72\144\x65\162\72\61\x70\x78\40\x73\x6f\154\151\144\40\x23\105\x36\x42\x33\102\x32\73\146\157\156\164\55\163\151\172\145\x3a\61\70\x70\164\x3b\42\x3e\x20\x45\122\x52\117\x52\x3c\57\x64\x69\166\x3e\xd\xa\11\11\11\74\144\x69\x76\40\x73\x74\x79\x6c\x65\75\x22\143\x6f\x6c\157\162\72\40\43\x61\71\64\64\64\62\73\146\157\156\164\55\163\151\x7a\145\72\x31\x34\x70\164\73\x20\155\x61\x72\147\151\156\x2d\142\x6f\164\164\157\155\72\x32\x30\160\170\x3b\42\76\x3c\x70\x3e\74\163\x74\162\x6f\x6e\147\76\105\x72\162\x6f\x72\72\x20\x3c\x2f\163\x74\162\157\156\147\76\x55\156\x61\142\154\145\40\164\x6f\x20\x66\151\156\144\40\x61\x20\143\145\162\x74\151\146\x69\x63\141\164\145\40\x6d\141\x74\x63\x68\151\x6e\x67\40\164\x68\145\x20\143\157\156\146\x69\147\x75\x72\145\x64\x20\x66\x69\156\x67\145\x72\x70\162\151\156\164\x2e\74\x2f\x70\76\15\12\11\11\11\74\x70\x3e\x50\154\x65\x61\163\145\40\143\x6f\156\x74\141\143\164\x20\x79\x6f\165\x72\x20\141\x64\x6d\x69\x6e\x69\163\164\x72\141\164\x6f\162\40\x61\x6e\x64\x20\x72\x65\x70\x6f\x72\x74\40\164\x68\x65\40\x66\x6f\154\154\157\x77\151\156\147\40\x65\162\162\157\x72\72\x3c\x2f\x70\x3e\xd\12\11\11\x9\74\160\x3e\74\x73\164\x72\157\156\147\x3e\120\x6f\x73\x73\151\142\x6c\145\x20\103\x61\x75\163\145\x3a\40\x3c\x2f\x73\164\162\x6f\156\x67\76\47\x58\56\x35\60\71\40\103\145\162\164\x69\x66\x69\143\x61\164\145\47\40\146\151\145\154\x64\x20\151\156\40\x70\154\165\147\151\156\40\x64\x6f\x65\x73\x20\x6e\157\x74\x20\155\141\164\x63\x68\x20\x74\150\x65\x20\x63\145\x72\164\x69\146\151\143\141\x74\x65\x20\x66\x6f\165\x6e\x64\x20\151\156\40\123\101\115\114\40\122\x65\163\x70\x6f\156\x73\x65\56\74\57\x70\76\xd\12\11\11\x9\74\x70\x3e\x3c\163\x74\162\157\156\147\76\103\145\162\x74\x69\146\151\x63\x61\x74\x65\x20\x66\157\x75\156\144\x20\151\156\40\x53\101\x4d\x4c\40\x52\145\x73\x70\157\156\x73\145\72\40\74\x2f\x73\164\x72\157\156\x67\76\74\146\157\156\164\40\x66\x61\x63\145\x3d\42\103\x6f\x75\162\151\145\x72\x20\x4e\145\167\42\73\x66\157\156\164\x2d\x73\x69\x7a\x65\72\x31\60\x70\164\76\74\x62\162\x3e\74\142\x72\76" . $Ci . "\74\57\160\76\74\x2f\x66\157\156\164\x3e\15\xa\x9\11\11\x3c\160\x3e\74\163\x74\x72\157\x6e\147\x3e\x53\x6f\154\165\x74\151\157\156\x3a\40\x3c\57\x73\x74\x72\x6f\x6e\x67\76\74\x2f\x70\x3e\xd\12\x9\11\11\40\x3c\x6f\x6c\x3e\xd\12\x20\40\40\40\40\x20\x20\x20\40\40\40\40\40\x20\x20\x20\x3c\154\151\x3e\103\x6f\160\x79\40\x70\141\x73\164\145\x20\x74\x68\x65\40\143\x65\x72\x74\x69\x66\151\143\141\164\145\x20\160\162\x6f\x76\151\x64\145\x64\x20\x61\x62\157\166\145\40\x69\x6e\40\x58\x35\x30\x39\x20\103\x65\162\164\151\146\x69\x63\x61\x74\x65\x20\x75\156\x64\145\x72\x20\x53\145\x72\x76\x69\x63\x65\x20\120\162\x6f\166\x69\144\x65\162\x20\123\145\x74\165\160\x20\x74\141\142\x2e\74\x2f\x6c\x69\76\15\xa\x20\x20\x20\x20\x20\x20\40\40\40\40\x20\x20\x20\x20\40\x20\74\154\151\76\x49\146\x20\151\163\x73\165\x65\40\160\145\162\163\151\x73\164\163\x20\144\151\x73\x61\142\154\x65\40\74\x62\x3e\x43\150\x61\162\x61\143\x74\145\162\x20\x65\x6e\x63\x6f\x64\x69\x6e\147\74\x2f\142\76\x20\165\x6e\x64\145\x72\40\123\x65\x72\166\151\143\145\40\x50\x72\157\166\144\145\162\x20\123\145\x74\x75\160\40\x74\141\142\56\x3c\x2f\154\151\x3e\xd\12\x20\40\x20\40\x20\x20\40\40\x20\x20\x20\x20\40\x3c\x2f\x6f\x6c\x3e\x9\11\xd\xa\x9\x9\11\x3c\57\x64\151\x76\76\15\xa\11\11\11\x9\11\x3c\x64\x69\166\x20\x73\x74\171\x6c\x65\75\42\x6d\x61\x72\147\x69\156\x3a\63\45\x3b\144\x69\163\x70\154\141\171\72\142\x6c\x6f\x63\x6b\73\164\145\170\x74\x2d\141\x6c\x69\x67\156\72\143\145\156\164\145\162\73\42\76\xd\12\x9\11\x9\x9\x9\x3c\144\x69\166\40\x73\164\x79\x6c\145\75\x22\155\141\162\147\151\x6e\x3a\x33\x25\73\x64\151\x73\160\x6c\141\x79\x3a\x62\x6c\x6f\143\153\73\164\145\170\164\55\141\x6c\151\147\x6e\72\143\x65\156\164\145\x72\x3b\42\76\74\x69\156\x70\165\164\x20\x73\x74\171\154\x65\75\x22\x70\141\x64\144\x69\x6e\x67\72\x31\x25\x3b\167\x69\144\x74\150\x3a\x31\60\x30\160\x78\73\142\141\143\153\x67\x72\157\165\156\x64\72\x20\43\60\60\x39\x31\x43\x44\x20\156\157\156\x65\x20\162\x65\160\x65\141\x74\40\163\x63\x72\157\154\154\x20\60\45\40\60\x25\73\x63\x75\x72\x73\x6f\162\72\x20\x70\x6f\151\156\164\145\x72\73\146\157\156\x74\x2d\x73\151\172\x65\x3a\x31\65\160\170\x3b\142\x6f\x72\144\145\162\55\167\151\144\164\x68\x3a\x20\x31\x70\x78\x3b\x62\157\x72\144\x65\162\55\x73\164\171\x6c\x65\72\40\163\157\x6c\151\x64\73\x62\x6f\x72\144\x65\x72\55\x72\141\144\x69\165\x73\72\40\63\x70\170\x3b\x77\x68\151\164\x65\55\163\x70\x61\143\x65\72\40\x6e\157\167\162\x61\160\73\142\x6f\x78\x2d\x73\151\172\x69\156\x67\x3a\40\142\157\x72\x64\x65\162\55\142\157\x78\73\142\x6f\162\144\x65\x72\x2d\x63\x6f\x6c\157\x72\x3a\40\43\x30\60\67\63\101\x41\x3b\x62\x6f\x78\55\x73\x68\x61\x64\x6f\x77\x3a\x20\60\160\x78\40\61\x70\x78\x20\x30\x70\170\40\162\147\x62\141\50\61\62\x30\54\40\62\x30\x30\54\40\x32\63\x30\x2c\40\x30\x2e\x36\51\x20\151\x6e\x73\x65\x74\73\x63\x6f\154\x6f\x72\x3a\x20\43\106\x46\x46\73\x22\x74\x79\x70\x65\75\42\x62\x75\164\164\157\x6e\42\x20\x76\x61\154\165\x65\75\42\x44\157\156\x65\x22\x20\157\156\103\154\x69\x63\x6b\x3d\x22\x73\x65\x6c\146\x2e\143\x6c\157\x73\145\50\51\73\42\76\74\57\x64\x69\x76\x3e";
    mo_saml_download_logs($Cx, $YG);
    exit;
    zQ:
    D3:
    $gu = LicenseHelper::getCurrentOption(mo_options_enum_service_provider::Issuer);
    $vs = get_option("\x6d\157\137\163\141\x6d\x6c\x5f\163\x70\x5f\145\156\x74\151\164\x79\x5f\x69\144");
    if (!empty($vs)) {
        goto b8;
    }
    $vs = $ZS . "\x2f\x77\160\55\x63\x6f\156\164\x65\x6e\164\x2f\160\154\165\147\x69\x6e\x73\x2f\155\x69\156\151\157\x72\141\x6e\x67\145\x2d\x73\x61\155\x6c\55\x32\x30\x2d\163\x69\x6e\x67\154\145\55\x73\x69\147\x6e\55\157\156\x2f";
    b8:
    SAMLSPUtilities::validateIssuerAndAudience($LA, $vs, $gu, $oK);
    $v1 = current(current($LA->getAssertions())->getNameId());
    $st = current($LA->getAssertions())->getAttributes();
    $st["\x4e\141\x6d\x65\x49\x44"] = array("\60" => $v1);
    $pK = current($LA->getAssertions())->getSessionIndex();
    mo_saml_checkMapping($st, $oK, $pK);
    goto Dp;
    rL:
    if (!isset($_REQUEST["\x52\145\154\141\171\123\x74\x61\164\x65"])) {
        goto F7;
    }
    $zW = $_REQUEST["\122\x65\154\x61\171\123\164\x61\164\x65"];
    F7:
    $fK = get_option("\x6d\157\137\x73\x61\x6d\154\x5f\154\157\x67\157\x75\164\x5f\x72\145\154\x61\171\137\163\164\141\x74\x65");
    if (empty($fK)) {
        goto Da;
    }
    $zW = $fK;
    Da:
    if (!is_user_logged_in()) {
        goto e5;
    }
    wp_destroy_current_session();
    wp_clear_auth_cookie();
    wp_set_current_user(0);
    e5:
    if (!empty($zW)) {
        goto gu;
    }
    $zW = home_url();
    gu:
    header("\x4c\157\143\x61\x74\x69\157\x6e\x3a\x20" . $zW);
    exit;
    Dp:
    iy:
    if (!(array_key_exists("\x53\101\x4d\x4c\122\x65\x71\x75\x65\163\164", $_REQUEST) && !empty($_REQUEST["\x53\x41\115\x4c\122\145\161\x75\x65\x73\x74"]))) {
        goto dW;
    }
    $CB = htmlspecialchars($_REQUEST["\x53\x41\115\114\122\145\161\165\145\x73\164"]);
    $oK = "\57";
    if (!array_key_exists("\122\x65\154\141\x79\123\x74\x61\164\145", $_REQUEST)) {
        goto tl;
    }
    $oK = $_REQUEST["\x52\x65\154\141\171\x53\164\141\x74\x65"];
    tl:
    $CB = base64_decode($CB);
    if (!(array_key_exists("\x53\101\115\114\122\x65\161\165\x65\163\x74", $_GET) && !empty($_GET["\x53\101\x4d\114\x52\x65\161\165\145\x73\x74"]))) {
        goto UH;
    }
    $CB = gzinflate($CB);
    UH:
    $yP = new DOMDocument();
    $yP->loadXML($CB);
    $qg = $yP->firstChild;
    if (!($qg->localName == "\x4c\157\147\157\165\164\122\145\161\x75\x65\163\164")) {
        goto av;
    }
    $Ar = new SAML2SPLogoutRequest($qg);
    if (!(!session_id() || session_id() == '' || !isset($_SESSION))) {
        goto h8;
    }
    session_start();
    h8:
    $_SESSION["\x6d\x6f\137\x73\141\x6d\154\137\x6c\x6f\147\x6f\165\x74\137\x72\145\161\x75\x65\163\164"] = $CB;
    $_SESSION["\x6d\x6f\x5f\x73\141\x6d\154\x5f\154\157\147\157\x75\164\137\x72\145\x6c\x61\171\137\x73\164\141\x74\145"] = $oK;
    wp_redirect(htmlspecialchars_decode(wp_logout_url()));
    exit;
    av:
    dW:
    if (!(isset($_REQUEST["\x6f\x70\x74\x69\157\x6e"]) and strpos($_REQUEST["\x6f\x70\x74\x69\x6f\156"], "\x72\145\141\x64\x73\141\155\154\154\157\147\151\x6e") !== false)) {
        goto VU;
    }
    require_once dirname(__FILE__) . "\57\x69\156\x63\x6c\x75\144\x65\163\57\154\151\142\x2f\x65\x6e\143\162\171\x70\164\x69\157\156\56\x70\x68\160";
    if (isset($_POST["\x53\124\x41\124\125\123"]) && $_POST["\x53\124\x41\x54\x55\x53"] == "\x45\122\122\117\x52") {
        goto Yh;
    }
    if (!(isset($_POST["\123\124\101\124\125\123"]) && $_POST["\x53\124\101\x54\125\123"] == "\x53\x55\103\x43\105\x53\123")) {
        goto Oy;
    }
    $jS = '';
    if (!(isset($_REQUEST["\x72\145\x64\x69\x72\145\143\x74\x5f\x74\157"]) && !empty($_REQUEST["\162\x65\x64\151\x72\145\x63\164\x5f\x74\157"]) && $_REQUEST["\x72\x65\144\x69\x72\x65\x63\164\x5f\x74\157"] != "\x2f")) {
        goto eF;
    }
    $jS = htmlspecialchars($_REQUEST["\x72\x65\x64\151\162\145\x63\x74\137\x74\157"]);
    eF:
    delete_option("\155\x6f\137\163\x61\155\x6c\x5f\162\x65\144\x69\x72\145\x63\x74\137\x65\162\x72\157\162\x5f\x63\x6f\x64\x65");
    delete_option("\155\157\137\163\141\155\x6c\x5f\162\x65\144\151\x72\x65\143\x74\x5f\145\x72\162\x6f\162\137\x72\145\141\163\x6f\156");
    try {
        $Nj = get_option("\163\x61\155\154\x5f\141\x6d\137\x65\155\x61\x69\154");
        $Ou = get_option("\x73\141\x6d\x6c\x5f\141\x6d\137\x75\163\x65\162\156\141\x6d\x65");
        $CU = get_option("\163\x61\155\154\137\141\155\137\146\151\162\163\x74\x5f\156\x61\x6d\x65");
        $qP = get_option("\163\x61\155\154\137\x61\x6d\137\154\x61\x73\x74\x5f\x6e\141\x6d\x65");
        $Iu = get_option("\163\141\x6d\154\x5f\141\155\x5f\x67\162\157\165\160\x5f\x6e\141\x6d\145");
        $EI = get_option("\163\141\155\x6c\137\141\155\x5f\x64\145\146\x61\165\154\x74\137\x75\163\145\x72\x5f\162\x6f\x6c\145");
        $J1 = get_option("\x73\x61\x6d\x6c\137\x61\x6d\x5f\x64\x6f\156\164\x5f\x61\154\x6c\157\x77\x5f\x75\x6e\x6c\x69\163\x74\145\x64\137\165\x73\x65\162\137\162\157\x6c\x65");
        $u3 = get_option("\x73\x61\x6d\154\x5f\141\155\137\141\x63\143\157\165\156\164\137\x6d\x61\164\143\x68\145\162");
        $Mm = '';
        $Ts = '';
        $CU = str_replace("\x2e", "\x5f", $CU);
        $CU = str_replace("\40", "\137", $CU);
        if (!(!empty($CU) && array_key_exists($CU, $_POST))) {
            goto sj;
        }
        $CU = htmlspecialchars($_POST[$CU]);
        sj:
        $qP = str_replace("\56", "\x5f", $qP);
        $qP = str_replace("\x20", "\137", $qP);
        if (!(!empty($qP) && array_key_exists($qP, $_POST))) {
            goto hU;
        }
        $qP = htmlspecialchars($_POST[$qP]);
        hU:
        $Ou = str_replace("\x2e", "\x5f", $Ou);
        $Ou = str_replace("\40", "\x5f", $Ou);
        if (!empty($Ou) && array_key_exists($Ou, $_POST)) {
            goto CN;
        }
        $Ts = htmlspecialchars($_POST["\x4e\141\155\145\111\x44"]);
        goto aC;
        CN:
        $Ts = htmlspecialchars($_POST[$Ou]);
        aC:
        $Mm = str_replace("\x2e", "\x5f", $Nj);
        $Mm = str_replace("\40", "\x5f", $Nj);
        if (!empty($Nj) && array_key_exists($Nj, $_POST)) {
            goto qd;
        }
        $Mm = htmlspecialchars($_POST["\x4e\141\x6d\x65\111\104"]);
        goto v8;
        qd:
        $Mm = htmlspecialchars($_POST[$Nj]);
        v8:
        $Iu = str_replace("\56", "\137", $Iu);
        $Iu = str_replace("\40", "\x5f", $Iu);
        if (!(!empty($Iu) && array_key_exists($Iu, $_POST))) {
            goto ZL;
        }
        $Iu = htmlspecialchars($_POST[$Iu]);
        ZL:
        if (!empty($u3)) {
            goto xY;
        }
        $u3 = "\x65\155\x61\151\x6c";
        xY:
        $N5 = get_option("\x6d\x6f\137\x73\x61\155\x6c\x5f\143\x75\163\164\x6f\155\x65\x72\x5f\164\x6f\153\145\156");
        if (!(isset($N5) || trim($N5) != '')) {
            goto y7;
        }
        $o0 = AESEncryption::decrypt_data($Mm, $N5);
        $Mm = $o0;
        y7:
        if (!(!empty($CU) && !empty($N5))) {
            goto x_;
        }
        $OW = AESEncryption::decrypt_data($CU, $N5);
        $CU = $OW;
        x_:
        if (!(!empty($qP) && !empty($N5))) {
            goto Mk;
        }
        $Ap = AESEncryption::decrypt_data($qP, $N5);
        $qP = $Ap;
        Mk:
        if (!(!empty($Ts) && !empty($N5))) {
            goto yQ;
        }
        $Ju = AESEncryption::decrypt_data($Ts, $N5);
        $Ts = $Ju;
        yQ:
        if (!(!empty($Iu) && !empty($N5))) {
            goto KT;
        }
        $kA = AESEncryption::decrypt_data($Iu, $N5);
        $Iu = $kA;
        KT:
    } catch (Exception $Tr) {
        echo sprintf("\x41\156\x20\x65\x72\162\x6f\x72\40\157\x63\143\165\x72\162\x65\x64\40\167\x68\151\x6c\145\x20\160\x72\157\x63\x65\x73\163\x69\156\147\40\164\x68\x65\x20\123\x41\115\114\40\x52\145\163\160\157\156\163\x65\x2e");
        exit;
    }
    $pV = array($Iu);
    mo_saml_login_user($Mm, $CU, $qP, $Ts, $pV, $J1, $EI, $jS, $u3);
    Oy:
    goto Ce;
    Yh:
    update_option("\x6d\x6f\137\x73\x61\x6d\x6c\137\162\x65\144\151\x72\x65\x63\x74\137\145\x72\162\157\x72\137\143\x6f\144\x65", htmlspecialchars($_POST["\105\122\122\x4f\x52\137\122\105\x41\x53\117\116"]));
    update_option("\x6d\x6f\137\x73\x61\155\154\137\162\x65\144\x69\x72\x65\x63\x74\x5f\145\162\162\x6f\x72\x5f\x72\x65\x61\x73\x6f\x6e", htmlspecialchars($_POST["\x45\x52\122\x4f\122\x5f\x4d\x45\x53\x53\101\107\105"]));
    Ce:
    VU:
    kA:
}
function cldjkasjdksalc()
{
    $aT = plugin_dir_path(__FILE__);
    $am = wp_upload_dir();
    $mq = home_url();
    $mq = trim($mq, "\x2f");
    if (preg_match("\x23\136\x68\x74\x74\160\50\163\51\x3f\x3a\57\x2f\43", $mq)) {
        goto PU;
    }
    $mq = "\150\x74\164\x70\72\57\x2f" . $mq;
    PU:
    $tJ = parse_url($mq);
    $ng = preg_replace("\57\x5e\x77\x77\x77\134\56\x2f", '', $tJ["\150\157\163\164"]);
    $bX = $ng . "\55" . $am["\x62\x61\163\x65\x64\x69\x72"];
    $wu = hash_hmac("\163\x68\x61\x32\x35\66", $bX, "\x34\104\110\x66\152\x67\146\x6a\141\x73\156\x64\146\x73\141\x6a\x66\110\x47\x4a");
    if (is_writable($aT . "\154\151\143\x65\x6e\x73\x65")) {
        goto IH;
    }
    $wW = base64_decode("\x62\x47\x4e\x6b\x61\x6d\x74\150\x63\62\x70\x6b\141\63\x4e\x68\x59\x32\x77\75");
    $ms = get_option($wW);
    if (empty($ms)) {
        goto eU;
    }
    $o8 = str_rot13($ms);
    eU:
    goto NX;
    IH:
    $ms = file_get_contents($aT . "\x6c\x69\143\145\x6e\x73\145");
    if (!$ms) {
        goto Ee;
    }
    $o8 = base64_encode($ms);
    Ee:
    NX:
    if (!empty($ms)) {
        goto rP;
    }
    $YS = base64_decode("\124\107\154\152\x5a\x57\x35\x7a\132\123\102\x47\141\x57\x78\x6c\111\107\61\x70\x63\63\116\160\x62\155\143\x67\132\x6e\x4a\166\142\123\102\x30\x61\x47\125\x67\x63\107\170\61\132\x32\154\165\x4c\147\75\75");
    wp_die($YS);
    rP:
    if (strpos($o8, $wu) !== false) {
        goto Xw;
    }
    $e7 = new Customersaml();
    $N5 = get_option("\x6d\x6f\x5f\x73\141\155\154\x5f\143\x75\x73\164\157\x6d\x65\162\137\x74\157\153\x65\x6e");
    $fi = AESEncryption::decrypt_data(get_option("\163\x6d\x6c\x5f\x6c\x6b"), $N5);
    $nD = $e7->mo_saml_vl($fi, false);
    if ($nD) {
        goto xb;
    }
    return;
    xb:
    $nD = json_decode($nD, true);
    if (isset($nD["\163\164\x61\x74\x75\163"]) and strcasecmp($nD["\163\x74\141\164\165\x73"], "\x53\x55\103\103\105\x53\123") == 0) {
        goto dK;
    }
    $Au = base64_decode("\x53\x57\x35\x32\x59\x57\170\x70\132\103\102\115\x61\127\116\x6c\142\x6e\x4e\154\x49\105\x5a\166\144\127\65\153\114\x69\x42\121\142\x47\126\150\143\x32\x55\147\131\x32\71\165\144\107\x46\152\144\x43\x42\x35\x62\x33\x56\x79\111\x47\106\153\x62\x57\x6c\x75\x61\x58\x4e\x30\143\155\106\x30\142\x33\111\x67\144\x47\x38\x67\x64\x58\x4e\154\x49\x48\122\157\132\123\x42\x6a\142\63\112\171\x5a\x57\x4e\60\111\107\170\x70\x59\62\x56\x75\x63\x32\x55\165\111\105\x5a\x76\143\151\x42\164\x62\x33\112\154\111\x47\x52\x6c\144\x47\106\160\x62\110\x4d\163\111\110\102\x79\x62\63\x5a\x70\x5a\x47\125\147\144\107\x68\x6c\111\x46\112\154\x5a\155\x56\171\x5a\x57\65\152\132\123\x42\112\x52\x44\x6f\147\124\125\70\171\116\104\x49\x34\115\124\x41\171\115\x54\x63\167\116\123\x42\60\142\x79\x42\65\142\x33\126\171\111\107\106\x6b\142\127\x6c\165\x61\130\116\x30\143\155\106\60\x62\63\111\147\x64\107\70\x67\131\62\150\154\131\x32\x73\147\141\x58\121\x67\144\127\x35\x6b\132\x58\x49\x67\x53\107\x56\163\x63\x43\x41\155\111\x45\x5a\x42\x55\123\x42\x30\131\x57\x49\147\141\127\x34\x67\144\x47\x68\154\x49\110\102\163\144\x57\x64\160\142\x69\x34\75");
    $Au = str_replace("\x48\x65\x6c\x70\40\46\x20\106\x41\121\x20\x74\x61\x62\x20\151\156", "\x46\101\121\x73\x20\163\145\143\x74\x69\157\156\x20\157\x66", $Au);
    $V3 = base64_decode("\x52\x58\112\x79\x62\x33\111\66\111\x45\154\165\x64\x6d\106\163\x61\127\121\147\x54\107\154\x6a\x5a\127\x35\172\x5a\121\x3d\x3d");
    wp_die($Au, $V3);
    goto m3;
    dK:
    $aT = plugin_dir_path(__FILE__);
    $mq = home_url();
    $mq = trim($mq, "\57");
    if (preg_match("\43\136\x68\164\164\x70\50\163\51\x3f\72\x2f\57\x23", $mq)) {
        goto MC;
    }
    $mq = "\x68\164\x74\160\72\x2f\x2f" . $mq;
    MC:
    $tJ = parse_url($mq);
    $ng = preg_replace("\57\x5e\167\x77\167\134\x2e\x2f", '', $tJ["\150\157\163\x74"]);
    $am = wp_upload_dir();
    $bX = $ng . "\x2d" . $am["\x62\x61\163\x65\144\x69\162"];
    $wu = hash_hmac("\x73\150\141\x32\x35\66", $bX, "\64\x44\110\146\152\x67\x66\152\141\x73\156\144\x66\163\x61\152\146\110\107\x4a");
    $vR = djkasjdksa();
    $Oy = round(strlen($vR) / rand(2, 20));
    $vR = substr_replace($vR, $wu, $Oy, 0);
    $Pk = base64_decode($vR);
    if (is_writable($aT . "\x6c\x69\143\x65\156\163\145")) {
        goto KI;
    }
    $vR = str_rot13($vR);
    $wW = base64_decode("\x62\107\116\153\x61\155\164\150\x63\62\160\153\x61\63\x4e\x68\131\62\167\x3d");
    update_option($wW, $vR);
    goto uw;
    KI:
    file_put_contents($aT . "\x6c\151\143\145\x6e\x73\145", $Pk);
    uw:
    return true;
    m3:
    goto Jc;
    Xw:
    return true;
    Jc:
}
function djkasjdksa()
{
    $D0 = "\x21\x7e\x40\x23\x24\x25\136\x26\x2a\x28\x29\x5f\x2b\174\173\x7d\x3c\76\77\60\x31\x32\x33\64\65\66\67\x38\71\141\142\x63\144\x65\x66\147\x68\x69\x6a\153\x6c\x6d\156\157\x70\x71\x72\163\164\x75\166\167\170\171\172\101\102\x43\104\x45\x46\107\110\111\112\113\x4c\x4d\x4e\x4f\120\121\122\x53\x54\x55\126\127\130\x59\x5a";
    $Q_ = strlen($D0);
    $Kj = '';
    $Sm = 0;
    E0:
    if (!($Sm < 10000)) {
        goto CT;
    }
    $Kj .= $D0[rand(0, $Q_ - 1)];
    eu:
    $Sm++;
    goto E0;
    CT:
    return $Kj;
}
function mo_saml_show_SAML_log($qg, $nF)
{
    header("\x43\x6f\x6e\x74\145\156\x74\55\124\171\x70\145\x3a\x20\x74\145\x78\x74\57\150\x74\155\x6c");
    $JR = new DOMDocument();
    $JR->preserveWhiteSpace = false;
    $JR->formatOutput = true;
    $JR->loadXML($qg);
    if ($nF == "\x64\151\x73\x70\154\141\x79\x53\x41\115\x4c\x52\145\x71\x75\145\163\164") {
        goto mb;
    }
    $FA = "\x53\x41\115\114\x20\x52\x65\163\160\x6f\156\x73\x65";
    goto Dk;
    mb:
    $FA = "\x53\101\115\114\40\122\x65\x71\x75\x65\163\x74";
    Dk:
    $kJ = $JR->saveXML();
    $VA = htmlentities($kJ);
    $VA = rtrim($VA);
    $rS = simplexml_load_string($kJ);
    $B1 = json_encode($rS);
    $iR = json_decode($B1);
    $hD = plugins_url("\151\x6e\x63\154\x75\144\145\x73\x2f\x63\x73\163\57\163\164\171\154\x65\137\x73\145\x74\164\x69\156\x67\x73\56\143\163\163\x3f\x76\x65\162\75\64\56\x38\x2e\64\x30", __FILE__);
    echo "\x3c\x6c\x69\156\153\40\x72\145\154\x3d\47\x73\x74\171\x6c\x65\163\150\x65\145\x74\47\x20\x69\x64\75\47\155\157\137\163\141\x6d\x6c\x5f\141\144\155\x69\x6e\x5f\163\145\164\164\151\156\147\163\137\x73\x74\x79\154\x65\x2d\143\163\163\47\40\x20\150\x72\x65\146\75\47" . $hD . "\47\x20\x74\x79\160\145\x3d\47\x74\145\170\x74\x2f\143\163\x73\47\40\x6d\x65\x64\x69\141\75\47\x61\x6c\154\x27\x20\x2f\76\xd\xa\x20\x20\40\x20\x20\x20\40\40\40\40\40\40\xd\12\11\11\11\x3c\144\x69\x76\x20\x63\154\x61\163\x73\75\x22\x6d\x6f\x2d\144\x69\x73\x70\x6c\x61\x79\55\x6c\x6f\147\x73\42\40\76\74\160\x20\x74\x79\160\x65\x3d\42\164\145\x78\x74\42\40\40\x20\x69\144\75\x22\x53\x41\115\x4c\137\164\171\160\145\42\76" . $FA . "\74\57\x70\x3e\x3c\x2f\144\x69\166\x3e\15\12\11\11\x9\x9\xd\12\11\x9\x9\74\x64\151\x76\x20\x74\x79\x70\145\x3d\x22\164\145\x78\164\42\x20\151\x64\75\42\x53\101\x4d\114\x5f\144\x69\163\x70\x6c\x61\171\x22\40\x63\154\141\163\x73\75\42\155\x6f\x2d\x64\151\x73\x70\x6c\x61\171\55\142\154\157\x63\x6b\x22\x3e\x3c\160\x72\x65\x20\x63\x6c\x61\x73\163\75\47\142\162\x75\x73\x68\72\40\170\x6d\x6c\73\x27\76" . $VA . "\x3c\57\160\162\145\x3e\74\x2f\144\x69\166\76\15\12\11\11\11\74\x62\x72\x3e\xd\xa\x9\11\11\x3c\x64\x69\x76\x9\x20\163\164\171\x6c\x65\75\x22\155\141\x72\x67\x69\156\72\63\45\73\144\151\163\160\x6c\x61\171\x3a\142\x6c\x6f\x63\153\73\x74\x65\x78\x74\55\141\154\151\x67\x6e\72\143\x65\x6e\x74\x65\x72\x3b\42\76\15\12\x20\x20\x20\x20\x20\x20\40\x20\x20\40\x20\40\15\xa\x9\11\11\74\144\151\166\40\163\164\171\x6c\x65\75\x22\155\x61\x72\x67\x69\x6e\x3a\63\x25\x3b\144\x69\163\160\x6c\x61\171\72\142\x6c\x6f\143\153\73\164\145\170\164\55\x61\x6c\151\147\x6e\72\x63\145\156\164\145\162\73\42\40\76\xd\12\11\15\12\40\x20\x20\x20\x20\x20\40\40\40\x20\40\40\x3c\x2f\144\x69\166\x3e\15\12\x9\x9\x9\x3c\x62\165\x74\164\157\156\x20\151\x64\75\x22\x63\157\x70\x79\42\40\x6f\x6e\143\x6c\x69\x63\153\x3d\42\x63\157\x70\171\x44\x69\166\x54\x6f\103\x6c\151\160\142\157\141\162\144\x28\x29\42\40\x20\163\164\171\x6c\145\75\42\x70\141\144\144\x69\x6e\x67\x3a\x31\45\73\167\x69\144\164\x68\72\x31\x30\60\160\170\73\x62\x61\x63\x6b\147\162\x6f\x75\156\144\72\40\x23\x30\60\x39\x31\x43\104\40\x6e\x6f\156\x65\x20\162\x65\x70\145\141\x74\40\x73\x63\x72\157\x6c\x6c\x20\60\45\40\60\45\x3b\x63\x75\162\163\157\162\x3a\x20\160\x6f\x69\156\x74\x65\162\73\146\x6f\x6e\164\55\163\x69\x7a\x65\x3a\61\x35\160\170\73\142\x6f\162\x64\x65\x72\55\x77\151\x64\x74\150\72\40\x31\x70\x78\73\x62\157\x72\x64\x65\x72\55\x73\x74\171\154\x65\x3a\x20\163\157\x6c\151\x64\73\142\x6f\x72\x64\145\162\55\x72\141\x64\151\x75\163\x3a\x20\x33\160\170\73\x77\x68\x69\x74\x65\x2d\x73\x70\141\x63\145\72\x20\156\x6f\x77\162\x61\160\73\142\157\170\x2d\163\151\x7a\x69\156\147\72\x20\x62\x6f\x72\x64\145\162\x2d\x62\x6f\x78\x3b\142\x6f\x72\x64\145\162\55\x63\x6f\154\x6f\x72\x3a\x20\43\60\60\67\x33\101\101\73\x62\x6f\170\55\163\150\141\144\157\x77\72\40\60\x70\170\x20\x31\160\x78\40\x30\160\170\40\x72\147\x62\141\x28\x31\62\x30\54\40\62\x30\60\x2c\x20\62\63\x30\x2c\x20\x30\x2e\x36\x29\x20\x69\156\x73\x65\x74\73\143\157\154\x6f\162\x3a\40\x23\106\x46\x46\73\x22\40\x3e\103\x6f\x70\x79\74\x2f\142\165\164\x74\157\x6e\76\15\12\x9\11\x9\x26\x6e\x62\163\x70\73\xd\12\40\40\x20\40\x20\x20\40\x20\40\40\x20\40\40\x20\x20\x3c\x69\x6e\160\x75\164\x20\x69\x64\x3d\x22\144\167\x6e\55\x62\x74\x6e\x22\x20\163\x74\x79\x6c\x65\x3d\x22\160\141\x64\144\x69\156\147\72\x31\45\73\x77\x69\144\164\150\x3a\x31\x30\x30\160\x78\x3b\142\141\x63\x6b\147\162\157\165\x6e\144\72\40\43\60\60\x39\x31\x43\104\40\156\x6f\156\145\40\x72\145\x70\x65\x61\164\40\x73\x63\162\157\x6c\x6c\40\60\x25\x20\x30\45\x3b\x63\165\162\x73\x6f\162\72\x20\x70\x6f\x69\x6e\x74\145\162\73\146\x6f\156\x74\x2d\163\151\172\x65\x3a\x31\65\160\170\73\142\157\x72\x64\145\162\55\x77\151\x64\164\150\72\x20\x31\x70\170\73\142\157\x72\x64\145\x72\x2d\163\164\x79\x6c\x65\x3a\40\163\x6f\154\x69\144\73\x62\x6f\162\144\x65\x72\55\x72\x61\x64\x69\165\x73\x3a\x20\63\160\170\x3b\x77\150\151\164\x65\x2d\163\160\x61\143\x65\72\x20\x6e\157\167\162\141\x70\x3b\x62\x6f\170\55\x73\x69\x7a\x69\x6e\x67\x3a\40\142\157\x72\x64\145\x72\55\142\x6f\x78\x3b\x62\157\162\144\145\162\55\143\157\154\x6f\162\72\40\x23\60\x30\x37\x33\x41\101\x3b\x62\x6f\170\55\163\x68\141\x64\x6f\167\x3a\40\60\x70\x78\40\x31\160\x78\x20\60\160\x78\40\x72\x67\142\141\x28\x31\x32\x30\54\x20\x32\60\60\x2c\x20\62\63\x30\x2c\40\60\56\66\51\40\151\156\163\145\164\73\x63\157\x6c\157\162\x3a\x20\43\x46\106\x46\x3b\42\164\x79\160\x65\x3d\x22\142\165\x74\x74\x6f\156\42\40\166\x61\154\x75\x65\x3d\x22\x44\157\x77\156\x6c\157\x61\144\42\40\15\12\x20\x20\40\x20\x20\x20\40\x20\40\40\x20\40\40\x20\x20\x22\76\xd\xa\x9\11\11\74\57\x64\151\x76\x3e\15\12\11\11\x9\x3c\57\x64\151\x76\x3e\xd\xa\11\11\x9\15\xa\x9\11\xd\xa\11\x9\x9";
    ob_end_flush();
    echo "\xd\12\x9\x3c\x73\143\x72\x69\x70\164\x3e\xd\xa\15\12\40\x20\x20\40\x20\x20\40\x20\x66\165\156\x63\x74\x69\157\x6e\40\143\x6f\160\x79\104\151\x76\x54\157\103\x6c\x69\160\x62\157\x61\x72\x64\50\51\40\173\xd\12\x20\x20\40\x20\40\x20\40\40\x20\40\x20\x20\x76\141\x72\40\x61\165\170\x20\75\40\144\157\x63\x75\155\x65\x6e\164\56\x63\162\145\x61\164\145\105\x6c\145\155\145\156\164\50\42\x69\156\160\x75\164\42\x29\73\xd\12\40\40\x20\x20\x20\x20\x20\x20\40\40\x20\40\x61\165\x78\x2e\163\x65\164\x41\164\164\x72\151\142\165\x74\x65\50\x22\166\141\x6c\x75\x65\x22\x2c\x20\144\157\143\165\x6d\x65\156\x74\56\x67\145\164\105\154\x65\155\x65\156\x74\102\x79\111\144\x28\x22\123\x41\x4d\x4c\x5f\144\151\x73\160\154\141\x79\42\51\56\164\145\x78\164\103\x6f\x6e\164\x65\156\x74\x29\x3b\xd\xa\x20\40\x20\40\x20\40\40\x20\40\x20\x20\x20\x64\157\x63\x75\x6d\x65\156\164\56\x62\x6f\x64\171\x2e\141\x70\x70\145\x6e\x64\x43\x68\x69\154\x64\x28\141\165\x78\x29\x3b\15\12\40\40\x20\x20\x20\40\40\x20\x20\x20\x20\x20\x61\165\x78\56\x73\x65\x6c\145\143\x74\50\51\x3b\15\xa\40\x20\x20\40\40\40\40\40\40\x20\x20\40\144\x6f\x63\x75\155\x65\x6e\x74\56\145\170\145\x63\103\157\x6d\155\x61\x6e\144\x28\x22\143\157\x70\x79\42\51\73\xd\xa\40\x20\40\x20\40\40\x20\40\x20\x20\40\40\144\157\x63\x75\x6d\x65\156\164\56\142\x6f\x64\171\56\162\x65\155\x6f\x76\145\103\x68\151\154\144\50\141\x75\x78\x29\73\xd\12\x20\40\40\x20\x20\x20\x20\x20\x20\40\40\40\144\x6f\x63\x75\x6d\145\x6e\164\56\147\x65\164\105\x6c\x65\155\145\x6e\164\102\x79\111\144\50\x27\x63\x6f\x70\x79\x27\x29\56\x74\x65\170\164\x43\157\156\x74\145\156\164\40\x3d\x20\x22\x43\157\160\151\145\144\42\x3b\15\xa\40\40\40\40\x20\40\x20\x20\40\40\40\40\x64\x6f\x63\x75\155\x65\x6e\164\56\x67\x65\164\x45\154\145\x6d\x65\156\x74\x42\171\111\144\50\47\x63\x6f\160\x79\47\51\x2e\163\164\171\154\145\x2e\142\141\x63\x6b\x67\162\157\x75\x6e\x64\x20\x3d\x20\42\x67\x72\x65\x79\42\73\xd\xa\40\x20\x20\40\x20\40\x20\40\40\40\40\x20\x77\151\x6e\144\x6f\167\56\x67\x65\164\123\145\154\x65\x63\164\151\157\x6e\x28\51\56\163\145\154\x65\x63\x74\101\154\154\x43\150\151\154\x64\x72\145\156\50\x20\x64\x6f\x63\165\x6d\x65\156\x74\56\x67\145\164\x45\154\x65\155\145\x6e\x74\102\171\111\144\x28\x20\42\x53\x41\x4d\114\137\144\x69\163\160\154\141\171\42\x20\51\x20\x29\73\15\12\xd\12\x20\40\x20\40\40\40\40\40\x7d\15\12\15\xa\x20\40\40\40\40\40\x20\x20\x66\165\156\x63\164\151\x6f\156\40\144\157\x77\x6e\x6c\x6f\x61\144\x28\x66\151\154\145\x6e\x61\155\x65\54\40\164\145\170\x74\x29\40\173\15\xa\40\x20\x20\x20\x20\40\40\40\40\40\x20\x20\166\141\x72\x20\x65\x6c\x65\155\145\156\164\40\x3d\40\x64\157\x63\x75\x6d\x65\156\164\56\143\x72\145\x61\x74\145\x45\x6c\x65\155\145\156\x74\50\x27\x61\x27\x29\x3b\15\xa\40\x20\x20\x20\40\x20\40\x20\x20\x20\40\40\145\154\145\x6d\145\156\x74\56\x73\145\x74\101\164\164\162\x69\x62\165\164\145\50\x27\150\162\145\146\x27\54\40\x27\144\x61\164\141\72\101\160\160\154\x69\143\141\164\151\157\x6e\57\x6f\x63\x74\145\164\55\x73\164\162\x65\x61\x6d\x3b\x63\150\x61\162\x73\145\164\75\165\164\x66\x2d\x38\54\x27\40\53\40\145\156\143\x6f\144\x65\125\x52\111\x43\157\x6d\x70\157\x6e\145\x6e\164\x28\164\x65\170\164\51\x29\73\xd\xa\x20\x20\x20\40\x20\40\x20\40\40\x20\40\x20\x65\x6c\x65\155\x65\x6e\164\x2e\x73\x65\x74\101\164\x74\162\x69\142\165\164\x65\50\47\x64\157\x77\x6e\x6c\x6f\141\x64\x27\54\40\x66\151\x6c\x65\156\x61\155\x65\x29\x3b\15\xa\15\12\x20\40\40\x20\40\x20\40\40\40\40\x20\40\x65\154\x65\155\145\156\164\56\163\x74\171\x6c\x65\56\144\151\163\x70\154\x61\x79\40\75\40\47\x6e\x6f\156\x65\x27\x3b\xd\12\40\40\40\x20\x20\x20\x20\40\40\40\40\40\x64\157\143\165\155\145\x6e\x74\56\x62\x6f\x64\x79\x2e\x61\160\160\x65\x6e\144\103\150\x69\154\x64\50\x65\x6c\145\x6d\x65\156\x74\51\73\15\12\xd\xa\40\x20\40\40\40\40\40\40\x20\x20\x20\x20\145\x6c\x65\155\145\x6e\164\56\143\154\x69\x63\153\x28\x29\x3b\15\xa\xd\12\40\x20\40\40\x20\40\x20\x20\x20\40\40\x20\x64\157\x63\165\x6d\145\x6e\164\x2e\x62\157\x64\171\x2e\162\x65\155\x6f\x76\x65\x43\150\x69\x6c\144\x28\x65\x6c\145\155\x65\156\x74\x29\73\15\xa\40\40\x20\x20\40\40\x20\40\x7d\15\xa\xd\xa\40\x20\40\x20\x20\x20\40\40\x64\157\x63\165\x6d\x65\x6e\x74\x2e\147\x65\164\105\x6c\x65\x6d\145\x6e\x74\x42\171\x49\x64\x28\x22\x64\x77\x6e\x2d\142\x74\x6e\42\51\x2e\x61\144\x64\x45\166\145\156\x74\114\151\163\x74\145\156\x65\162\50\42\143\154\x69\x63\153\42\54\40\146\x75\x6e\143\164\151\x6f\156\40\50\x29\x20\x7b\15\xa\15\12\40\x20\x20\40\x20\x20\40\40\x20\x20\40\40\166\141\x72\40\146\x69\154\x65\156\141\155\x65\40\x3d\40\144\157\143\165\x6d\x65\x6e\164\x2e\147\145\x74\105\x6c\x65\x6d\x65\156\x74\x42\x79\111\144\x28\42\123\101\115\x4c\137\164\171\x70\x65\x22\51\x2e\x74\145\x78\164\103\x6f\156\x74\145\156\x74\x2b\42\56\170\x6d\x6c\x22\73\15\xa\40\x20\x20\x20\x20\x20\x20\x20\x20\40\40\40\166\x61\x72\40\156\157\144\145\40\x3d\x20\144\157\x63\165\155\145\156\x74\x2e\x67\145\x74\x45\x6c\145\155\x65\156\x74\102\171\x49\x64\50\x22\123\101\x4d\x4c\x5f\144\151\x73\160\154\x61\x79\42\51\73\xd\xa\40\x20\x20\x20\40\x20\40\x20\40\40\x20\x20\150\164\155\x6c\x43\x6f\156\x74\x65\x6e\164\x20\75\x20\x6e\x6f\x64\145\56\151\156\x6e\x65\162\110\x54\x4d\114\x3b\15\12\x20\x20\40\40\40\40\x20\x20\40\40\x20\x20\x74\x65\170\x74\40\x3d\40\156\157\144\x65\56\164\x65\170\164\x43\x6f\156\x74\145\x6e\164\x3b\15\xa\x20\x20\x20\x20\40\40\x20\x20\x20\x20\40\x20\x63\x6f\x6e\163\x6f\x6c\145\x2e\x6c\157\147\x28\x74\x65\170\164\51\73\15\12\40\x20\40\40\40\x20\40\x20\40\x20\40\40\144\157\x77\x6e\x6c\157\141\x64\x28\146\x69\154\x65\156\141\x6d\x65\54\40\x74\x65\x78\x74\x29\x3b\15\xa\x20\x20\x20\x20\40\x20\x20\x20\175\54\x20\x66\x61\x6c\163\145\x29\73\15\xa\xd\12\xd\12\15\12\15\xa\15\xa\40\x20\x20\40\74\57\x73\143\x72\151\160\164\76\15\12";
    exit;
}
function mo_saml_checkMapping($st, $oK, $pK)
{
    try {
        $Nj = get_option("\x73\141\155\154\x5f\141\x6d\x5f\x65\155\x61\x69\154");
        $Ou = get_option("\163\141\x6d\x6c\137\141\x6d\x5f\165\163\x65\x72\x6e\141\155\145");
        $CU = get_option("\x73\x61\x6d\154\x5f\141\x6d\x5f\146\151\162\163\164\137\x6e\141\155\145");
        $qP = get_option("\x73\x61\x6d\x6c\x5f\x61\155\137\154\141\163\x74\137\x6e\141\x6d\145");
        $Iu = get_option("\x73\141\155\x6c\x5f\x61\x6d\137\x67\x72\157\x75\160\137\x6e\x61\x6d\x65");
        $EI = get_option("\163\141\155\x6c\137\x61\155\x5f\144\145\146\x61\165\x6c\164\137\165\x73\145\x72\x5f\162\x6f\x6c\x65");
        $J1 = get_option("\163\x61\155\154\137\x61\155\x5f\144\157\x6e\164\137\141\x6c\154\157\167\x5f\x75\156\x6c\151\x73\164\x65\144\x5f\x75\163\145\x72\137\x72\157\154\x65");
        $u3 = get_option("\x73\141\x6d\154\x5f\x61\x6d\137\x61\143\x63\157\165\x6e\x74\137\x6d\x61\x74\x63\x68\x65\162");
        $Mm = '';
        $Ts = '';
        if (empty($st)) {
            goto U8;
        }
        if (!empty($CU) && array_key_exists($CU, $st)) {
            goto PI;
        }
        $CU = '';
        goto tx;
        PI:
        $CU = $st[$CU][0];
        tx:
        if (!empty($qP) && array_key_exists($qP, $st)) {
            goto lN;
        }
        $qP = '';
        goto Un;
        lN:
        $qP = $st[$qP][0];
        Un:
        if (!empty($Ou) && array_key_exists($Ou, $st)) {
            goto p8;
        }
        $Ts = $st["\x4e\x61\x6d\x65\x49\x44"][0];
        goto Wi;
        p8:
        $Ts = $st[$Ou][0];
        Wi:
        if (!empty($Nj) && array_key_exists($Nj, $st)) {
            goto K7;
        }
        $Mm = $st["\116\141\x6d\x65\111\104"][0];
        goto ag;
        K7:
        $Mm = $st[$Nj][0];
        ag:
        if (!empty($Iu) && array_key_exists($Iu, $st)) {
            goto k7;
        }
        $Iu = array();
        goto nw;
        k7:
        $Iu = $st[$Iu];
        nw:
        if (!empty($u3)) {
            goto Ho;
        }
        $u3 = "\145\x6d\141\x69\x6c";
        Ho:
        U8:
        if ($oK == "\x74\145\x73\164\x56\141\x6c\x69\x64\x61\164\145") {
            goto ds;
        }
        if ($oK == "\x74\145\x73\x74\x4e\145\167\x43\x65\x72\164\151\146\x69\143\141\164\145") {
            goto e1;
        }
        mo_saml_login_user($Mm, $CU, $qP, $Ts, $Iu, $J1, $EI, $oK, $u3, $pK, $st["\116\x61\x6d\x65\x49\x44"][0], $st);
        goto zc;
        ds:
        update_option("\155\x6f\137\163\141\x6d\x6c\137\164\145\163\164", "\x54\x65\x73\x74\40\163\165\x63\x63\x65\163\x73\x66\x75\154");
        mo_saml_show_test_result($CU, $qP, $Mm, $Iu, $st, $oK);
        goto zc;
        e1:
        update_option("\155\x6f\137\x73\141\155\x6c\x5f\164\145\163\164\x5f\x6e\x65\167\x5f\x63\145\162\x74", "\x54\x65\x73\x74\x20\163\x75\143\x63\145\163\x73\x66\x75\154");
        mo_saml_show_test_result($CU, $qP, $Mm, $Iu, $st, $oK);
        zc:
    } catch (Exception $Tr) {
        echo sprintf("\101\156\40\145\x72\x72\157\x72\40\x6f\x63\x63\165\162\162\x65\x64\x20\x77\x68\x69\x6c\145\x20\160\162\x6f\143\145\163\163\151\156\x67\x20\x74\150\145\x20\x53\x41\x4d\x4c\x20\x52\x65\x73\160\x6f\x6e\x73\x65\x2e");
        exit;
    }
}
function mo_saml_show_test_result($CU, $qP, $Mm, $Iu, $st, $oK)
{
    echo "\74\144\x69\166\40\x73\x74\171\x6c\x65\x3d\42\146\157\x6e\x74\x2d\x66\x61\155\151\154\171\x3a\x43\x61\x6c\151\x62\162\151\73\x70\141\144\x64\151\156\x67\x3a\x30\x20\63\x25\73\42\76";
    if (!empty($Mm)) {
        goto zs;
    }
    echo "\74\x64\x69\x76\40\x73\x74\x79\154\145\x3d\x22\x63\157\154\157\162\72\40\x23\x61\71\x34\x34\x34\62\73\142\141\143\x6b\x67\x72\157\165\156\144\x2d\x63\x6f\154\x6f\162\72\40\x23\x66\62\x64\x65\144\x65\73\x70\x61\144\144\x69\x6e\x67\72\x20\61\65\x70\170\x3b\155\x61\162\147\151\156\55\142\157\x74\164\x6f\155\72\x20\62\x30\x70\170\73\164\x65\x78\x74\55\x61\154\x69\x67\x6e\x3a\x63\x65\156\x74\x65\162\x3b\142\157\x72\144\x65\x72\x3a\x31\x70\x78\40\163\157\x6c\x69\x64\x20\43\105\66\102\63\x42\x32\73\x66\x6f\x6e\164\55\163\151\x7a\x65\x3a\x31\x38\160\164\73\42\76\x54\105\123\x54\40\106\101\x49\x4c\105\x44\x3c\57\x64\151\x76\76\15\xa\x9\x9\x9\11\74\x64\x69\x76\40\x73\164\171\x6c\x65\75\42\143\157\154\157\x72\x3a\40\x23\x61\71\x34\x34\x34\62\x3b\146\157\156\x74\x2d\163\151\x7a\145\72\61\64\x70\x74\73\40\x6d\x61\x72\x67\x69\x6e\55\142\157\x74\x74\x6f\x6d\x3a\x32\x30\x70\x78\x3b\x22\x3e\127\101\122\x4e\111\116\107\72\40\123\x6f\155\x65\x20\x41\x74\x74\162\x69\142\x75\164\145\163\x20\x44\151\144\x20\116\157\x74\40\115\141\164\143\x68\56\x3c\57\x64\x69\x76\76\xd\12\11\x9\11\11\x3c\x64\151\x76\40\x73\x74\x79\x6c\x65\x3d\42\x64\x69\163\x70\154\x61\171\x3a\142\154\x6f\x63\153\x3b\164\x65\x78\164\x2d\141\154\151\x67\x6e\72\143\x65\156\x74\x65\162\73\x6d\141\x72\x67\x69\x6e\x2d\x62\157\164\x74\157\155\x3a\64\x25\x3b\42\76\74\151\x6d\x67\x20\x73\x74\171\x6c\145\x3d\x22\x77\151\144\164\150\72\x31\x35\45\73\42\x73\x72\x63\75\42" . plugin_dir_url(__FILE__) . "\x69\x6d\141\x67\x65\163\57\x77\x72\x6f\x6e\x67\56\160\156\147\42\76\x3c\57\144\151\166\76";
    goto pW;
    zs:
    update_option("\155\157\x5f\x73\141\x6d\154\x5f\164\145\x73\164\137\143\x6f\x6e\146\151\x67\137\x61\164\164\162\163", $st);
    echo "\x3c\144\x69\166\x20\163\164\x79\154\145\75\42\143\x6f\x6c\x6f\162\72\x20\43\63\143\x37\x36\63\144\73\15\xa\x9\11\x9\11\142\141\143\153\147\162\157\x75\156\144\x2d\143\x6f\x6c\x6f\x72\x3a\x20\x23\x64\x66\x66\x30\144\x38\x3b\40\x70\141\144\x64\x69\156\147\x3a\62\x25\73\x6d\x61\162\x67\151\156\55\142\x6f\x74\x74\x6f\155\x3a\62\60\160\170\x3b\164\x65\x78\x74\x2d\141\154\x69\x67\156\x3a\x63\145\156\164\145\162\73\x20\x62\157\x72\x64\145\x72\x3a\61\160\170\40\x73\157\154\151\144\40\x23\101\105\x44\102\71\101\73\x20\146\x6f\x6e\x74\55\x73\151\x7a\x65\72\x31\70\x70\164\x3b\x22\x3e\124\105\x53\124\40\x53\125\x43\x43\105\x53\x53\x46\x55\114\74\x2f\144\151\x76\76\xd\xa\x9\11\11\x9\74\144\x69\x76\40\163\x74\171\154\145\75\x22\144\x69\163\x70\x6c\141\171\72\142\x6c\x6f\x63\x6b\73\x74\x65\170\x74\x2d\141\154\151\147\156\72\x63\145\x6e\x74\145\162\73\155\141\x72\147\x69\156\x2d\x62\157\x74\164\157\x6d\x3a\x34\45\x3b\42\76\74\151\155\x67\x20\163\x74\x79\154\x65\x3d\42\x77\151\144\164\150\72\x31\65\x25\73\x22\x73\162\143\x3d\42" . plugin_dir_url(__FILE__) . "\151\155\141\147\x65\x73\x2f\x67\162\x65\145\x6e\137\143\x68\145\x63\x6b\x2e\160\156\x67\x22\76\x3c\57\x64\151\x76\76";
    pW:
    $ZT = get_option("\155\x6f\137\x73\x61\x6d\154\x5f\145\x6e\141\142\x6c\145\137\x64\157\155\x61\x69\156\x5f\162\x65\x73\x74\x72\x69\x63\x74\151\x6f\156\137\154\x6f\x67\151\x6e");
    $kK = $oK == "\164\145\x73\x74\x4e\145\x77\x43\145\x72\x74\151\146\151\143\x61\x74\145" ? "\x64\151\163\160\154\x61\171\72\156\x6f\x6e\145" : '';
    if (!$ZT) {
        goto Rb;
    }
    $aQ = get_option("\x6d\157\x5f\163\x61\x6d\x6c\137\141\154\154\x6f\x77\x5f\x64\145\156\171\x5f\165\163\145\x72\137\167\x69\x74\150\x5f\144\157\x6d\141\x69\x6e");
    if (!empty($aQ) && $aQ == "\144\x65\x6e\x79") {
        goto a3;
    }
    $DD = get_option("\163\x61\x6d\x6c\137\141\x6d\137\x65\155\141\151\x6c\137\144\x6f\x6d\141\151\156\163");
    $vO = explode("\x3b", $DD);
    $HG = explode("\100", $Mm);
    $Im = array_key_exists("\61", $HG) ? $HG[1] : '';
    if (in_array($Im, $vO)) {
        goto K1;
    }
    echo "\74\160\x20\163\164\x79\154\x65\75\x22\143\x6f\154\x6f\162\72\162\145\144\73\x22\76\x54\x68\x69\163\x20\165\163\145\x72\x20\x77\x69\x6c\154\40\x6e\x6f\164\40\x62\x65\40\x61\x6c\154\157\167\145\x64\x20\164\157\40\154\x6f\147\151\156\x20\141\x73\x20\164\150\145\40\x64\157\155\x61\151\x6e\x20\157\x66\40\x74\150\145\40\x65\155\141\151\154\x20\151\x73\40\x6e\x6f\x74\x20\151\x6e\x63\154\165\144\145\144\40\x69\x6e\40\x74\x68\145\x20\141\154\154\x6f\167\145\144\40\x6c\151\x73\164\40\157\x66\x20\104\x6f\x6d\x61\x69\156\40\122\145\163\164\x72\151\x63\164\x69\157\156\56\x3c\x2f\x70\76";
    K1:
    goto TQ;
    a3:
    $DD = get_option("\163\141\x6d\154\x5f\141\155\x5f\x65\155\141\151\x6c\137\x64\x6f\x6d\141\151\156\x73");
    $vO = explode("\x3b", $DD);
    $HG = explode("\x40", $Mm);
    $Im = array_key_exists("\61", $HG) ? $HG[1] : '';
    if (!in_array($Im, $vO)) {
        goto Q7;
    }
    echo "\x3c\160\40\x73\164\171\x6c\145\75\x22\143\157\x6c\x6f\x72\x3a\x72\145\144\73\x22\x3e\x54\150\x69\x73\40\165\x73\145\162\x20\167\151\154\154\40\156\x6f\164\x20\x62\x65\x20\141\154\x6c\x6f\x77\x65\x64\40\164\157\x20\154\157\147\151\156\40\141\163\40\x74\x68\145\40\144\157\x6d\x61\151\156\40\157\146\40\x74\150\145\x20\x65\155\x61\151\154\x20\151\163\x20\x69\156\143\154\165\x64\145\x64\x20\x69\x6e\40\164\x68\145\x20\144\x65\x6e\x69\x65\144\x20\154\151\163\x74\x20\157\146\40\x44\x6f\x6d\x61\151\x6e\x20\x52\145\x73\164\x72\151\x63\x74\x69\157\x6e\x2e\x3c\x2f\160\76";
    Q7:
    TQ:
    Rb:
    $gv = get_option("\x73\x61\155\x6c\137\x61\x6d\137\x75\x73\145\162\x6e\x61\155\x65");
    if (!(!empty($gv) && array_key_exists($gv, $st))) {
        goto rF;
    }
    $W1 = $st[$gv][0];
    if (!(strlen($W1) > 60)) {
        goto iQ;
    }
    echo "\x3c\x70\40\163\x74\x79\x6c\x65\75\42\x63\157\x6c\157\x72\72\x72\145\x64\x3b\x22\x3e\116\117\124\105\x20\72\40\x54\150\x69\x73\40\x75\x73\145\162\40\167\151\x6c\154\x20\156\x6f\x74\40\142\145\40\141\x62\154\145\40\x74\x6f\40\154\157\x67\x69\x6e\x20\141\x73\40\x74\x68\145\40\x75\x73\x65\x72\156\x61\x6d\x65\x20\x76\x61\154\165\145\x20\x69\x73\x20\155\157\x72\x65\x20\x74\150\x61\156\40\66\x30\x20\x63\x68\x61\162\141\x63\164\145\x72\163\x20\154\157\x6e\147\x2e\74\142\x72\57\76\xd\xa\11\x9\x9\120\x6c\x65\x61\x73\145\40\164\162\x79\40\143\150\141\156\x67\151\x6e\147\40\164\150\x65\x20\155\x61\x70\160\x69\x6e\147\40\x6f\x66\40\x55\x73\x65\x72\x6e\141\155\x65\40\x66\x69\x65\154\x64\x20\151\156\x20\74\x61\40\x68\x72\145\146\x3d\42\x23\x22\x20\157\156\103\x6c\151\143\x6b\75\x22\x63\x6c\x6f\x73\x65\137\141\x6e\144\x5f\162\145\144\x69\x72\145\143\x74\50\x29\x3b\x22\76\101\x74\164\162\151\142\x75\164\x65\x2f\x52\x6f\x6c\145\x20\x4d\x61\160\160\x69\x6e\x67\x3c\57\x61\x3e\40\x74\141\x62\x2e\x3c\57\x70\x3e";
    iQ:
    rF:
    echo "\74\163\160\141\x6e\x20\x73\x74\171\x6c\145\x3d\x22\146\157\156\164\x2d\163\x69\172\x65\72\61\64\x70\164\73\42\x3e\x3c\142\76\x48\x65\x6c\x6c\x6f\74\x2f\142\76\x2c\40" . $Mm . "\x3c\57\x73\160\141\156\x3e\x3c\142\162\57\x3e\x3c\x70\40\163\164\171\x6c\145\75\42\146\x6f\x6e\164\55\167\x65\151\x67\x68\164\x3a\x62\157\154\144\73\146\x6f\156\164\x2d\x73\x69\x7a\145\72\61\x34\x70\x74\x3b\155\141\x72\147\x69\156\x2d\154\145\x66\164\72\61\45\73\x22\76\101\x54\124\x52\111\x42\125\124\105\x53\x20\122\105\x43\x45\x49\x56\x45\104\72\74\x2f\x70\x3e\15\xa\11\11\x9\11\x3c\164\141\x62\x6c\x65\x20\x73\x74\171\x6c\145\x3d\x22\x62\x6f\162\x64\x65\162\55\143\x6f\154\154\141\x70\x73\145\x3a\x63\x6f\x6c\154\141\x70\163\x65\73\x62\157\162\144\145\x72\55\x73\x70\141\x63\151\156\147\72\60\73\x20\x64\x69\x73\160\154\x61\x79\x3a\164\141\142\154\145\73\167\151\x64\x74\x68\x3a\x31\60\60\x25\x3b\40\x66\x6f\156\164\55\163\151\x7a\145\x3a\61\x34\x70\164\73\x62\x61\x63\x6b\x67\x72\157\165\156\144\x2d\143\x6f\154\x6f\x72\x3a\x23\105\x44\x45\x44\x45\x44\73\x22\x3e\xd\12\11\11\11\11\x3c\x74\x72\x20\x73\x74\171\x6c\145\75\x22\x74\145\x78\x74\x2d\141\x6c\x69\147\156\x3a\x63\x65\156\x74\145\162\x3b\x22\76\74\164\144\40\x73\x74\x79\154\145\x3d\42\x66\157\156\x74\55\167\145\151\x67\150\164\72\142\x6f\154\x64\73\142\157\x72\144\x65\162\72\x32\160\170\x20\x73\x6f\x6c\151\x64\40\x23\x39\x34\71\60\71\x30\73\160\141\x64\x64\151\x6e\147\72\62\45\x3b\42\76\x41\124\x54\x52\111\x42\125\124\x45\x20\x4e\x41\115\x45\x3c\57\x74\144\76\x3c\x74\144\40\x73\164\171\154\145\x3d\x22\x66\x6f\x6e\164\x2d\167\x65\151\147\x68\164\x3a\x62\x6f\x6c\144\x3b\x70\x61\x64\144\x69\156\x67\x3a\62\45\73\142\x6f\x72\144\x65\x72\x3a\x32\x70\170\x20\163\157\x6c\151\x64\x20\43\x39\x34\71\x30\71\60\73\x20\x77\157\162\144\55\x77\162\141\x70\72\x62\162\x65\141\x6b\55\x77\x6f\x72\x64\x3b\x22\x3e\x41\124\x54\122\111\x42\125\x54\x45\x20\126\x41\x4c\x55\x45\x3c\57\x74\x64\x3e\x3c\x2f\164\162\76";
    if (!empty($st)) {
        goto aG;
    }
    echo "\x4e\157\40\x41\x74\x74\x72\x69\x62\165\164\x65\163\x20\x52\145\143\x65\x69\166\x65\144\56";
    goto DS;
    aG:
    foreach ($st as $N5 => $x9) {
        echo "\74\164\162\76\x3c\164\144\40\163\164\x79\154\x65\75\47\x66\157\156\x74\55\167\x65\x69\x67\150\164\72\142\x6f\x6c\144\73\x62\157\162\144\145\162\x3a\62\x70\170\x20\x73\157\154\151\144\x20\x23\x39\x34\71\60\x39\60\x3b\160\141\144\x64\x69\156\x67\72\62\x25\x3b\47\x3e" . $N5 . "\x3c\x2f\x74\x64\x3e\74\x74\144\x20\163\164\x79\154\145\x3d\x27\x70\x61\x64\x64\151\x6e\x67\x3a\x32\45\x3b\142\x6f\162\x64\x65\162\72\62\160\x78\40\x73\157\154\151\x64\x20\x23\71\64\71\x30\x39\x30\x3b\40\167\x6f\162\x64\x2d\x77\162\x61\x70\72\x62\x72\x65\141\x6b\55\167\x6f\162\x64\x3b\47\76" . implode("\74\x68\x72\57\76", $x9) . "\x3c\57\x74\144\x3e\x3c\57\164\162\76";
        e4:
    }
    Is:
    DS:
    echo "\x3c\x2f\x74\x61\x62\x6c\x65\76\74\x2f\144\x69\x76\x3e";
    echo "\74\x64\151\166\40\x73\164\x79\154\x65\x3d\42\155\141\x72\147\151\x6e\72\63\x25\73\144\x69\163\160\154\141\171\72\142\154\157\x63\x6b\73\164\x65\x78\x74\55\141\x6c\151\x67\156\72\143\x65\x6e\x74\x65\162\x3b\x22\76\15\xa\x9\11\74\151\x6e\160\x75\164\40\x73\164\x79\x6c\x65\75\42\x70\141\144\x64\151\156\147\72\61\45\73\x77\x69\144\164\150\72\x32\65\60\x70\170\73\x62\141\x63\x6b\147\x72\x6f\x75\x6e\x64\72\40\43\x30\60\71\61\103\104\x20\x6e\x6f\x6e\x65\40\162\145\160\x65\x61\164\40\x73\143\162\157\x6c\x6c\x20\x30\x25\x20\60\45\x3b\xd\12\x9\11\x63\x75\x72\163\157\162\x3a\40\x70\157\151\156\164\x65\x72\73\x66\157\x6e\164\55\x73\151\172\x65\x3a\61\x35\x70\170\73\142\x6f\162\x64\x65\162\55\x77\151\144\x74\x68\x3a\40\61\160\x78\x3b\x62\x6f\x72\144\145\x72\x2d\163\164\171\154\145\72\40\x73\157\x6c\151\144\x3b\x62\157\162\144\x65\162\55\x72\x61\x64\x69\x75\x73\72\x20\63\160\x78\73\167\150\151\164\145\x2d\163\160\141\143\x65\x3a\15\xa\x9\11\40\156\x6f\x77\162\141\x70\73\142\x6f\x78\55\x73\151\x7a\x69\x6e\x67\x3a\40\x62\157\162\x64\x65\x72\x2d\x62\157\x78\x3b\x62\x6f\162\144\x65\162\55\x63\157\x6c\157\162\72\x20\43\60\60\x37\63\x41\x41\73\142\x6f\170\55\x73\150\141\144\157\x77\x3a\40\60\x70\x78\x20\61\x70\170\x20\x30\x70\170\40\162\x67\142\x61\x28\x31\62\x30\x2c\40\x32\60\60\54\40\62\63\60\54\40\60\x2e\66\51\40\x69\156\x73\145\x74\73\143\x6f\x6c\157\x72\72\40\x23\106\106\106\73" . $kK . "\x22\xd\xa\40\40\x20\x20\40\40\x20\x20\40\40\x20\40\164\x79\160\145\75\42\142\165\164\164\157\x6e\x22\40\x76\x61\x6c\x75\x65\75\x22\x43\157\x6e\146\151\x67\165\162\145\x20\x41\164\x74\x72\x69\x62\x75\164\x65\x2f\x52\157\x6c\x65\x20\x4d\x61\160\160\x69\156\x67\42\x20\x6f\156\x43\154\151\143\x6b\75\x22\143\154\x6f\x73\145\137\141\156\144\x5f\162\145\144\x69\x72\x65\x63\x74\x28\51\x3b\42\76\40\x26\156\142\x73\160\x3b\40\15\xa\40\40\x20\40\x20\x20\x20\40\40\40\x20\x20\xd\12\11\x9\x3c\151\156\160\x75\x74\40\x73\164\x79\154\145\75\42\160\x61\x64\144\x69\x6e\x67\72\x31\x25\73\167\x69\x64\164\150\72\x31\60\x30\160\x78\73\142\x61\x63\x6b\147\162\x6f\165\x6e\x64\x3a\40\43\60\60\x39\61\x43\104\x20\156\x6f\156\145\40\x72\145\160\145\x61\x74\40\163\x63\162\157\154\154\40\x30\x25\x20\60\x25\x3b\143\x75\x72\x73\157\162\x3a\40\x70\x6f\x69\156\164\145\162\73\x66\157\x6e\x74\55\x73\x69\x7a\x65\72\x31\x35\x70\x78\x3b\x62\157\x72\x64\x65\162\x2d\167\151\144\164\150\72\x20\x31\160\x78\73\142\157\x72\144\x65\x72\55\163\164\x79\154\x65\72\x20\163\157\154\151\x64\x3b\142\x6f\x72\144\145\162\x2d\162\141\x64\151\165\163\x3a\40\63\160\x78\x3b\x77\x68\151\164\x65\x2d\x73\160\x61\143\x65\x3a\x20\156\x6f\167\x72\x61\x70\73\x62\157\x78\x2d\x73\151\172\x69\x6e\147\72\40\x62\x6f\x72\x64\145\x72\x2d\142\157\x78\73\x62\x6f\162\x64\145\x72\x2d\x63\x6f\154\x6f\x72\72\x20\43\x30\60\67\x33\101\101\73\142\x6f\x78\55\163\150\x61\144\x6f\x77\x3a\40\x30\160\170\40\x31\x70\x78\40\x30\160\170\x20\162\x67\142\141\50\x31\62\x30\x2c\40\x32\60\60\x2c\x20\x32\x33\x30\x2c\x20\60\56\66\x29\40\151\156\163\x65\164\x3b\x63\x6f\x6c\157\x72\72\x20\43\106\x46\106\x3b\42\x74\x79\160\x65\x3d\x22\x62\x75\x74\164\x6f\x6e\42\40\x76\x61\x6c\x75\x65\75\x22\104\x6f\x6e\145\42\40\x6f\x6e\103\154\x69\143\x6b\75\x22\163\145\x6c\x66\x2e\x63\154\157\163\x65\50\x29\x3b\42\x3e\74\57\144\x69\166\76\xd\xa\11\x9\xd\12\11\x9\x3c\x73\x63\162\151\160\x74\76\xd\12\40\40\x20\x20\40\x20\40\40\x20\x20\x20\x20\x20\x66\165\x6e\x63\164\151\x6f\156\40\x63\x6c\157\x73\145\x5f\x61\x6e\x64\x5f\162\x65\x64\151\x72\145\x63\x74\50\51\x7b\xd\12\40\40\40\x20\40\40\x20\x20\x20\x20\40\40\x20\x20\x20\40\40\x77\151\x6e\144\x6f\x77\56\x6f\x70\145\x6e\x65\162\x2e\x72\145\144\151\162\145\x63\x74\x5f\x74\x6f\x5f\141\164\164\162\151\x62\165\x74\145\137\x6d\141\160\160\151\x6e\x67\x28\51\73\xd\xa\x20\40\40\x20\x20\40\x20\40\40\x20\x20\40\x20\x20\40\40\40\163\x65\x6c\x66\56\x63\154\x6f\x73\x65\x28\x29\73\15\xa\x20\x20\x20\x20\40\x20\x20\x20\x20\x20\40\x20\40\175\40\x20\40\15\xa\xd\xa\11\x9\x3c\57\x73\143\162\151\x70\x74\76";
    exit;
}
function mo_saml_convert_to_windows_iconv($gk)
{
    $WC = LicenseHelper::getCurrentOption(mo_options_enum_service_provider::Is_encoding_enabled);
    if (!($WC === "\x63\150\x65\x63\x6b\145\144")) {
        goto E2;
    }
    return iconv("\125\124\106\x2d\x38", "\x43\120\61\x32\x35\x32\57\x2f\x49\x47\116\x4f\x52\105", $gk);
    E2:
    return $gk;
}
function mo_saml_login_user($Mm, $CU, $qP, $Ts, $Iu, $J1, $EI, $oK, $u3, $pK = '', $vQ = '', $st = null)
{
    do_action("\x6d\157\137\x61\x62\162\137\146\151\x6c\x74\x65\162\137\x6c\x6f\147\151\x6e", $st, $vQ, $pK);
    check_if_user_allowed_to_login_due_to_role_restriction($Iu);
    $ZS = get_option("\155\x6f\137\x73\141\155\154\x5f\x73\160\137\142\141\163\145\137\x75\x72\x6c");
    if (!empty($ZS)) {
        goto R6;
    }
    $ZS = home_url();
    R6:
    mo_saml_restrict_users_based_on_domain($Mm);
    $Ts = mo_saml_sanitize_username($Ts);
    if (!(strlen($Ts) > 60)) {
        goto W2;
    }
    wp_die("\127\x65\x20\x63\x6f\165\x6c\144\x20\x6e\157\x74\40\163\x69\147\156\x20\x79\x6f\165\x20\x69\156\56\40\x50\x6c\145\141\x73\145\x20\143\157\156\x74\x61\x63\x74\40\x79\157\x75\x72\40\x61\x64\155\151\x6e\x69\x73\164\x72\x61\x74\x6f\162\56", "\105\x72\x72\157\x72\40\x3a\40\125\x73\x65\x72\156\141\155\145\40\154\x65\156\147\x74\x68\x20\154\151\x6d\x69\x74\x20\x72\145\x61\143\x68\x65\144");
    exit;
    W2:
    $t8 = array("\151\x64\x70\x5f\156\x61\155\145" => get_option("\163\141\155\154\137\x69\x64\x65\x6e\x74\151\164\171\137\156\x61\155\145"));
    $GN = get_option("\155\x6f\137\x61\x6c\x6c\x6f\167\x5f\x65\170\151\163\x74\151\x6e\x67\137\165\x73\145\162\x5f\154\157\x67\151\x6e");
    if (username_exists($Ts) || email_exists($Mm)) {
        goto zq;
    }
    do_action("\155\x6f\137\147\x75\x65\163\164\x5f\154\157\x67\151\156", $vQ, $pK, $t8);
    $zF = get_option("\163\141\155\x6c\137\x61\x6d\x5f\162\157\154\145\137\x6d\141\x70\x70\151\156\x67");
    $zF = maybe_unserialize($zF);
    $ww = true;
    $mB = get_option("\x6d\157\x5f\x73\x61\155\154\137\144\x6f\x6e\x74\137\x63\162\x65\x61\164\145\x5f\165\x73\145\162\x5f\x69\146\137\x72\157\154\x65\137\156\x6f\x74\137\155\141\x70\x70\145\144");
    if (!(!empty($mB) && strcmp($mB, "\143\x68\145\x63\x6b\x65\144") == 0)) {
        goto ob;
    }
    $iy = is_role_mapping_configured_for_user($zF, $Iu);
    $ww = $iy;
    ob:
    if ($ww === true) {
        goto rG;
    }
    $c_ = get_option("\155\157\137\x73\141\155\x6c\137\x61\x63\143\157\x75\156\164\137\x63\x72\x65\x61\x74\151\x6f\x6e\137\144\x69\163\x61\x62\154\145\144\x5f\155\163\147");
    if (!empty($c_)) {
        goto tS;
    }
    $c_ = "\127\x65\x20\x63\157\165\154\x64\x20\x6e\x6f\164\x20\163\151\x67\x6e\x20\171\x6f\165\40\x69\156\56\x20\x50\x6c\145\141\163\x65\40\x63\x6f\x6e\164\141\x63\164\40\x79\x6f\165\x72\40\x41\x64\155\x69\x6e\x69\x73\x74\162\x61\164\157\x72\x2e";
    tS:
    wp_die($c_, "\x45\162\x72\x6f\162\x3a\40\116\157\164\40\141\40\x57\x6f\162\144\x50\x72\145\163\x73\40\115\x65\x6d\x62\x65\162");
    exit;
    goto ZO;
    rG:
    $eU = wp_generate_password(10, false);
    if (!empty($Ts)) {
        goto NI;
    }
    $Zn = wp_create_user($Mm, $eU, $Mm);
    goto kE;
    NI:
    $Zn = wp_create_user($Ts, $eU, $Mm);
    kE:
    if (!is_wp_error($Zn)) {
        goto dE;
    }
    wp_die($Zn->get_error_message() . "\x3c\x62\x72\x3e\120\x6c\x65\x61\163\145\40\143\x6f\x6e\164\x61\x63\164\40\171\x6f\x75\162\40\101\x64\155\x69\x6e\x69\x73\164\162\x61\164\x6f\x72\56\x3c\x62\x72\76\74\x62\76\x55\163\145\x72\x6e\x61\155\x65\74\x2f\142\x3e\72\x20" . $Mm, "\105\162\x72\x6f\x72\x3a\x20\103\x6f\165\154\144\x6e\47\164\x20\143\x72\x65\141\x74\145\40\165\x73\x65\x72");
    dE:
    $user = get_user_by("\151\x64", $Zn);
    $ak = assign_roles_to_user($user, $zF, $Iu);
    if ($ak !== true && !empty($J1) && $J1 == "\143\150\145\x63\153\x65\144") {
        goto tY;
    }
    if ($ak !== true && !empty($EI)) {
        goto iM;
    }
    if ($ak !== true) {
        goto eT;
    }
    goto J6;
    tY:
    $Cj = wp_update_user(array("\x49\104" => $Zn, "\x72\157\x6c\145" => false));
    goto J6;
    iM:
    $Cj = wp_update_user(array("\111\104" => $Zn, "\x72\157\x6c\x65" => $EI));
    goto J6;
    eT:
    $EI = get_option("\x64\x65\x66\141\165\x6c\x74\x5f\162\157\x6c\145");
    $Cj = wp_update_user(array("\111\x44" => $Zn, "\x72\x6f\x6c\145" => $EI));
    J6:
    mo_saml_map_attributes($user, $CU, $qP, $st);
    mo_saml_set_auth_cookie($user, $pK, $vQ, true);
    do_action("\155\157\x5f\163\x61\155\x6c\x5f\141\x74\164\162\x69\142\165\164\x65\163", $Ts, $Mm, $CU, $qP, $Iu);
    ZO:
    goto VN;
    zq:
    if (!($GN != "\x74\162\165\145")) {
        goto iJ;
    }
    do_action("\x6d\157\137\147\165\145\163\x74\137\x6c\157\x67\x69\156", $vQ, $pK, $t8);
    iJ:
    if (username_exists($Ts)) {
        goto Sc;
    }
    if (!email_exists($Mm)) {
        goto vG;
    }
    $user = get_user_by("\x65\x6d\141\151\154", $Mm);
    $Zn = $user->ID;
    vG:
    goto Sx;
    Sc:
    $user = get_user_by("\154\157\x67\151\156", $Ts);
    $Zn = $user->ID;
    if (!(!empty($Mm) && is_email($Mm))) {
        goto wb;
    }
    $Cj = wp_update_user(array("\111\104" => $Zn, "\x75\163\145\162\x5f\145\155\141\151\x6c" => $Mm));
    wb:
    Sx:
    mo_saml_map_attributes($user, $CU, $qP, $st);
    $zF = maybe_unserialize(get_option("\x73\141\155\x6c\x5f\x61\x6d\137\162\x6f\154\145\137\x6d\x61\x70\160\x69\156\x67"));
    $g3 = get_option("\x73\141\x6d\154\x5f\x61\155\x5f\x64\x6f\x6e\x74\x5f\165\160\144\141\x74\x65\137\x65\170\151\163\164\151\156\147\137\165\163\145\162\x5f\162\x6f\x6c\x65");
    if (!(empty($g3) || $g3 != "\143\x68\145\143\153\x65\144")) {
        goto ua;
    }
    $ak = assign_roles_to_user($user, $zF, $Iu);
    $H0 = get_option("\163\141\x6d\x6c\137\141\x6d\x5f\x75\x70\x64\x61\x74\x65\x5f\141\x64\155\151\x6e\x5f\x75\x73\x65\162\x73\x5f\162\x6f\154\x65");
    if ($ak !== true && !is_administrator_user($user) && !empty($J1) && $J1 == "\143\150\x65\143\153\145\144") {
        goto AD;
    }
    if ($ak !== true && !is_administrator_user($user) && !empty($EI)) {
        goto O4;
    }
    if ($ak !== true && is_administrator_user($user) && !empty($H0) && $H0 == "\x63\150\145\143\x6b\x65\144" && !empty($J1) && $J1 == "\143\150\x65\143\153\145\144") {
        goto zb;
    }
    if ($ak !== true && is_administrator_user($user) && !empty($H0) && $H0 == "\143\x68\x65\143\153\145\144" && !empty($EI)) {
        goto vk;
    }
    goto Xq;
    AD:
    $Cj = wp_update_user(array("\x49\x44" => $Zn, "\x72\x6f\x6c\145" => false));
    goto Xq;
    O4:
    $Cj = wp_update_user(array("\111\104" => $Zn, "\162\157\154\145" => $EI));
    goto Xq;
    zb:
    $Cj = wp_update_user(array("\111\104" => $Zn, "\162\x6f\x6c\x65" => false));
    goto Xq;
    vk:
    $Cj = wp_update_user(array("\x49\x44" => $Zn, "\x72\157\154\x65" => $EI));
    Xq:
    ua:
    mo_saml_set_auth_cookie($user, $pK, $vQ);
    do_action("\155\157\137\x73\141\155\x6c\137\x61\x74\x74\162\x69\142\165\x74\x65\x73", $Ts, $Mm, $CU, $qP, $Iu);
    VN:
    mo_saml_post_login_redirection($oK, $ZS);
}
function mo_saml_sanitize_username($Ts)
{
    $hb = sanitize_user($Ts, true);
    $H7 = apply_filters("\160\x72\145\x5f\x75\x73\145\162\x5f\154\157\147\x69\x6e", $hb);
    $Ts = trim($H7);
    return $Ts;
}
function mo_saml_restrict_users_based_on_domain($Mm)
{
    $ZT = get_option("\x6d\157\x5f\163\141\155\x6c\x5f\x65\x6e\141\142\154\x65\137\144\x6f\x6d\141\151\x6e\x5f\x72\145\163\x74\x72\x69\143\164\x69\157\x6e\137\154\157\x67\x69\x6e");
    if (!$ZT) {
        goto lh;
    }
    $DD = get_option("\x73\x61\155\154\x5f\x61\155\137\145\x6d\x61\x69\x6c\137\144\157\x6d\141\151\156\163");
    $vO = explode("\73", $DD);
    $HG = explode("\x40", $Mm);
    $Im = array_key_exists("\61", $HG) ? $HG[1] : '';
    $aQ = get_option("\155\157\x5f\163\x61\155\154\137\x61\x6c\x6c\x6f\x77\137\x64\145\156\171\x5f\165\x73\x65\x72\137\x77\151\164\150\137\x64\x6f\x6d\x61\x69\156");
    $c_ = get_option("\155\157\137\163\141\x6d\154\x5f\162\145\163\x74\162\x69\x63\164\x65\144\137\x64\157\155\141\151\x6e\137\x65\x72\x72\x6f\x72\x5f\155\163\x67");
    if (!empty($c_)) {
        goto xM;
    }
    $c_ = "\131\157\165\40\x61\x72\145\x20\x6e\157\164\40\x61\x6c\x6c\x6f\167\x65\x64\40\164\157\40\154\157\x67\151\156\56\x20\x50\x6c\x65\141\163\145\x20\x63\x6f\156\164\x61\x63\164\40\x79\157\165\x72\x20\101\x64\x6d\151\x6e\x69\x73\164\x72\x61\x74\x6f\162\x2e";
    xM:
    if (!empty($aQ) && $aQ == "\144\x65\x6e\171") {
        goto iW;
    }
    if (in_array($Im, $vO)) {
        goto HX;
    }
    wp_die($c_, "\120\145\x72\155\151\x73\x73\x69\x6f\156\x20\x44\x65\x6e\151\x65\x64\x20\x3a\x20\x4e\157\x74\40\x61\x20\127\x68\x69\x74\x65\154\151\x73\x74\x65\144\40\165\163\x65\162\56");
    HX:
    goto MG;
    iW:
    if (!in_array($Im, $vO)) {
        goto W9;
    }
    wp_die($c_, "\x50\145\162\155\x69\x73\163\x69\x6f\156\x20\x44\145\156\151\145\x64\x20\x3a\x20\x42\x6c\141\x63\153\154\151\x73\164\x65\x64\40\x75\163\145\x72\56");
    W9:
    MG:
    lh:
}
function mo_saml_map_attributes($user, $CU, $qP, $st)
{
    mo_saml_map_basic_attributes($user, $CU, $qP, $st);
    mo_saml_map_custom_attributes($user, $st);
}
function mo_saml_map_basic_attributes($user, $CU, $qP, $st)
{
    $Zn = $user->ID;
    if (empty($CU)) {
        goto yj;
    }
    $Cj = wp_update_user(array("\111\x44" => $Zn, "\x66\151\x72\163\164\x5f\156\x61\x6d\145" => $CU));
    yj:
    if (empty($qP)) {
        goto SP;
    }
    $Cj = wp_update_user(array("\x49\x44" => $Zn, "\154\141\163\164\x5f\x6e\x61\155\x65" => $qP));
    SP:
    if (is_null($st)) {
        goto r_;
    }
    update_user_meta($Zn, "\155\157\137\x73\x61\x6d\154\x5f\x75\163\145\x72\x5f\x61\x74\x74\x72\x69\142\165\x74\x65\x73", $st);
    $AV = get_option("\163\x61\x6d\154\137\x61\155\137\144\151\163\160\154\141\171\x5f\156\x61\155\145");
    if (empty($AV)) {
        goto FS;
    }
    if (strcmp($AV, "\x55\123\105\x52\x4e\x41\115\105") == 0) {
        goto jR;
    }
    if (strcmp($AV, "\106\x4e\101\x4d\105") == 0 && !empty($CU)) {
        goto KB;
    }
    if (strcmp($AV, "\114\x4e\x41\x4d\105") == 0 && !empty($qP)) {
        goto J4;
    }
    if (strcmp($AV, "\x46\x4e\101\x4d\x45\x5f\114\116\101\x4d\x45") == 0 && !empty($qP) && !empty($CU)) {
        goto tT;
    }
    if (!(strcmp($AV, "\x4c\116\101\115\105\137\106\116\x41\115\x45") == 0 && !empty($qP) && !empty($CU))) {
        goto Mh;
    }
    $Cj = wp_update_user(array("\111\x44" => $Zn, "\x64\x69\163\x70\154\x61\171\137\x6e\141\x6d\x65" => $qP . "\40" . $CU));
    Mh:
    goto xr;
    tT:
    $Cj = wp_update_user(array("\x49\104" => $Zn, "\x64\x69\163\x70\x6c\x61\171\x5f\156\x61\x6d\145" => $CU . "\40" . $qP));
    xr:
    goto Ae;
    J4:
    $Cj = wp_update_user(array("\x49\x44" => $Zn, "\x64\151\163\160\154\x61\171\137\x6e\x61\155\145" => $qP));
    Ae:
    goto c3;
    KB:
    $Cj = wp_update_user(array("\111\x44" => $Zn, "\144\151\163\x70\154\141\171\x5f\x6e\x61\x6d\x65" => $CU));
    c3:
    goto IS;
    jR:
    $Cj = wp_update_user(array("\x49\x44" => $Zn, "\144\x69\x73\160\154\141\x79\x5f\156\141\155\145" => $user->user_login));
    IS:
    FS:
    r_:
}
function mo_saml_map_custom_attributes($user, $st)
{
    $Zn = $user->ID;
    if (!get_option("\x6d\x6f\137\163\141\155\x6c\x5f\143\165\163\164\x6f\x6d\137\141\164\x74\x72\x73\x5f\155\x61\160\160\x69\156\147")) {
        goto Gj;
    }
    $rl = maybe_unserialize(get_option("\155\x6f\x5f\163\141\x6d\154\137\143\165\163\x74\x6f\x6d\x5f\x61\164\x74\x72\x73\x5f\x6d\141\160\160\x69\156\x67"));
    foreach ($rl as $N5 => $x9) {
        if (!array_key_exists($x9, $st)) {
            goto fL;
        }
        $da = false;
        if (!(count($st[$x9]) == 1)) {
            goto Vl;
        }
        $da = true;
        Vl:
        if (!$da) {
            goto q5;
        }
        update_user_meta($Zn, $N5, $st[$x9][0]);
        goto gX;
        q5:
        $bt = array();
        foreach ($st[$x9] as $UN) {
            array_push($bt, $UN);
            Gz:
        }
        ny:
        update_user_meta($Zn, $N5, $bt);
        gX:
        fL:
        bE:
    }
    gj:
    Gj:
}
function mo_saml_set_auth_cookie($user, $pK, $vQ, $s7 = false)
{
    $Zn = $user->ID;
    wp_set_current_user($Zn);
    $Ti = false;
    $Ti = apply_filters("\155\157\137\x72\145\155\145\x6d\142\145\x72\137\x6d\145", $Ti);
    wp_set_auth_cookie($Zn, $Ti);
    if (empty($pK)) {
        goto WD;
    }
    update_user_meta($Zn, "\155\157\137\163\x61\155\x6c\137\163\145\x73\163\151\x6f\156\x5f\x69\156\x64\x65\170", $pK);
    WD:
    if (empty($vQ)) {
        goto mU;
    }
    update_user_meta($Zn, "\x6d\x6f\137\x73\x61\155\x6c\137\156\141\155\145\x5f\x69\144", $vQ);
    mU:
    setcookie("\x6c\157\x67\x67\x65\144\137\151\156\137\167\151\x74\x68\x5f\x69\144\x70", base64_encode($pK . true));
    if (!(!session_id() || session_id() == '' || !isset($_SESSION))) {
        goto nf;
    }
    session_start();
    nf:
    $_SESSION["\155\x6f\137\163\141\155\x6c"]["\154\157\147\147\x65\144\137\x69\x6e\x5f\x77\151\164\150\137\151\x64\x70"] = TRUE;
    if (!$s7) {
        goto Fw;
    }
    do_action("\x75\x73\145\162\x5f\x72\145\x67\151\x73\x74\145\162", $Zn);
    Fw:
    do_action("\167\x70\137\154\x6f\x67\x69\x6e", $user->user_login, $user);
}
function mo_saml_post_login_redirection($oK, $ZS)
{
    $oK = htmlspecialchars_decode($oK);
    $CN = get_option("\155\x6f\x5f\163\x61\x6d\154\x5f\162\145\x6c\141\171\x5f\x73\164\141\164\x65");
    if (!empty($CN)) {
        goto nZ;
    }
    if (empty($oK)) {
        goto qw;
    }
    $iF = '';
    if (!get_option("\x6d\x6f\137\163\x61\155\x6c\x5f\x73\x65\x6e\144\137\x61\142\163\x6f\154\x75\x74\x65\x5f\162\x65\154\x61\171\137\163\164\x61\164\145")) {
        goto yF;
    }
    $Ef = get_option("\155\157\137\x73\141\x6d\154\x5f\143\x75\x73\x74\x6f\155\x65\162\x5f\x74\157\153\145\x6e");
    $iF = AESEncryption::decrypt_data($oK, $Ef);
    yF:
    if (!empty($iF)) {
        goto Y3;
    }
    if (filter_var($oK, FILTER_VALIDATE_URL) === FALSE) {
        goto du;
    }
    if (strpos($oK, home_url()) !== false) {
        goto dP;
    }
    $ZW = htmlspecialchars_decode($ZS);
    goto RA;
    dP:
    $ZW = htmlspecialchars_decode($oK);
    RA:
    goto Aa;
    Y3:
    $ZW = htmlspecialchars_decode($iF);
    goto Aa;
    du:
    $ZW = htmlspecialchars_decode($oK);
    Aa:
    qw:
    goto H3;
    nZ:
    $ZW = htmlspecialchars_decode($CN);
    H3:
    if (!empty($ZW)) {
        goto FG;
    }
    $ZW = htmlspecialchars_decode($ZS);
    FG:
    wp_redirect($ZW);
    exit;
}
function check_if_user_allowed_to_login_due_to_role_restriction($Iu)
{
    $Oe = get_option("\163\x61\x6d\x6c\x5f\141\x6d\x5f\144\x6f\x6e\164\x5f\x61\154\x6c\x6f\167\x5f\x75\x73\145\x72\137\x74\157\154\x6f\147\x69\x6e\137\x63\x72\x65\141\164\x65\x5f\x77\x69\164\150\x5f\x67\x69\x76\x65\x6e\137\147\162\157\165\160\163");
    if (!($Oe == "\x63\x68\145\x63\x6b\x65\x64")) {
        goto MF;
    }
    if (empty($Iu)) {
        goto Zj;
    }
    $Sc = get_option("\155\x6f\137\163\141\x6d\154\x5f\x72\145\x73\164\x72\x69\x63\164\137\x75\x73\145\x72\x73\137\x77\151\164\x68\x5f\x67\x72\x6f\x75\x70\163");
    $n1 = explode("\73", $Sc);
    foreach ($n1 as $f7) {
        foreach ($Iu as $Oi) {
            $Oi = trim($Oi);
            if (!(!empty($Oi) && $Oi == $f7)) {
                goto QH;
            }
            wp_die("\x59\157\x75\40\141\x72\145\40\x6e\x6f\x74\40\141\x75\164\150\x6f\x72\x69\x7a\145\x64\x20\164\157\40\x6c\157\147\151\156\56\x20\x50\x6c\145\141\163\145\40\x63\x6f\x6e\x74\x61\x63\x74\x20\171\x6f\x75\162\x20\141\x64\x6d\151\x6e\x69\163\164\x72\x61\x74\157\x72\56", "\x45\162\162\x6f\162");
            QH:
            Nx:
        }
        l7:
        bJ:
    }
    my:
    Zj:
    MF:
}
function assign_roles_to_user($user, $zF, $Iu)
{
    $ak = false;
    if (!(!empty($Iu) && !empty($zF) && !is_administrator_user($user))) {
        goto xn;
    }
    $user->set_role(false);
    $pt = '';
    $cP = false;
    foreach ($zF as $GV => $uc) {
        $n1 = explode("\x3b", $uc);
        foreach ($n1 as $f7) {
            foreach ($Iu as $Oi) {
                $Oi = trim($Oi);
                if (!(!empty($Oi) && $Oi == $f7)) {
                    goto uR;
                }
                $ak = true;
                $user->add_role($GV);
                uR:
                MM:
            }
            W6:
            sB:
        }
        IX:
        rE:
    }
    PS:
    xn:
    return $ak;
}
function is_role_mapping_configured_for_user($zF, $Iu)
{
    if (!(!empty($Iu) && !empty($zF))) {
        goto Ok;
    }
    foreach ($zF as $GV => $uc) {
        $n1 = explode("\x3b", $uc);
        foreach ($n1 as $f7) {
            foreach ($Iu as $Oi) {
                $Oi = trim($Oi);
                if (!(!empty($Oi) && $Oi == $f7)) {
                    goto Bn;
                }
                return true;
                Bn:
                fs:
            }
            t5:
            zZ:
        }
        lT:
        Nl:
    }
    wZ:
    Ok:
    return false;
}
function is_administrator_user($user)
{
    $De = $user->roles;
    if (!is_null($De) && in_array("\141\x64\x6d\151\x6e\x69\163\164\x72\x61\x74\x6f\x72", $De, TRUE)) {
        goto EV;
    }
    return false;
    goto b9;
    EV:
    return true;
    b9:
}
function mo_saml_is_customer_registered()
{
    $OM = get_option("\155\x6f\137\163\x61\155\154\137\x61\x64\x6d\x69\x6e\137\x65\x6d\x61\x69\154");
    $jx = get_option("\x6d\x6f\x5f\163\x61\x6d\154\x5f\x61\x64\x6d\151\156\137\x63\165\x73\x74\157\x6d\x65\x72\137\x6b\x65\x79");
    if (!$OM || !$jx || !is_numeric(trim($jx))) {
        goto yf;
    }
    return 1;
    goto S0;
    yf:
    return 0;
    S0:
}
function mo_saml_is_customer_license_verified()
{
    $N5 = get_option("\155\157\x5f\x73\141\155\154\x5f\x63\165\163\x74\x6f\155\x65\x72\x5f\x74\x6f\153\x65\x6e");
    $II = AESEncryption::decrypt_data(get_option("\x74\x5f\x73\151\164\145\x5f\x73\164\x61\164\165\163"), $N5);
    $nm = get_option("\x73\155\x6c\137\154\153");
    $OM = get_option("\155\157\137\x73\141\x6d\x6c\x5f\x61\144\x6d\151\x6e\x5f\145\x6d\141\151\x6c");
    $jx = get_option("\x6d\x6f\137\x73\141\x6d\154\x5f\141\144\x6d\151\x6e\137\x63\x75\163\x74\x6f\155\x65\162\x5f\x6b\x65\171");
    if (!$II && !$nm || !$OM || !$jx || !is_numeric(trim($jx))) {
        goto Jr;
    }
    return 1;
    goto t0;
    Jr:
    return 0;
    t0:
}
function saml_get_current_page_url()
{
    $q0 = $_SERVER["\110\124\x54\x50\x5f\110\x4f\123\x54"];
    if (!(substr($q0, -1) == "\x2f")) {
        goto w0;
    }
    $q0 = substr($q0, 0, -1);
    w0:
    $nn = $_SERVER["\122\x45\121\x55\x45\x53\124\x5f\x55\122\x49"];
    if (!(substr($nn, 0, 1) == "\57")) {
        goto I6;
    }
    $nn = substr($nn, 1);
    I6:
    $Ox = isset($_SERVER["\110\x54\x54\120\123"]) && strcasecmp($_SERVER["\110\124\124\120\x53"], "\157\x6e") == 0;
    $zW = "\150\x74\x74\x70" . ($Ox ? "\x73" : '') . "\72\x2f\57" . $q0 . "\57" . $nn;
    return $zW;
}
function show_status_error($wy, $oK, $J9)
{
    $wy = strip_tags($wy);
    $J9 = strip_tags($J9);
    if ($oK == "\x74\x65\163\x74\x56\x61\154\x69\144\x61\164\x65" or $oK == "\x74\145\163\164\116\x65\x77\x43\x65\162\x74\151\146\x69\x63\141\x74\x65") {
        goto RQ;
    }
    wp_die("\x57\145\x20\x63\157\165\x6c\x64\x20\156\x6f\x74\40\x73\151\147\x6e\40\171\x6f\165\40\x69\x6e\56\x20\x50\x6c\145\x61\163\145\x20\143\157\x6e\x74\141\143\x74\40\x79\157\165\x72\40\x41\x64\155\x69\x6e\x69\x73\x74\x72\141\x74\x6f\162\56", "\x45\162\162\157\162\x3a\40\x49\156\x76\141\154\151\x64\x20\x53\101\115\114\40\122\145\163\160\157\156\x73\145\x20\123\164\x61\164\x75\163");
    goto y0;
    RQ:
    echo "\x3c\144\151\x76\40\163\x74\x79\x6c\x65\75\x22\146\157\156\x74\x2d\146\141\x6d\x69\x6c\171\x3a\103\141\154\x69\x62\162\151\x3b\160\141\144\x64\x69\x6e\147\72\x30\40\63\45\73\42\x3e";
    echo "\74\x64\x69\x76\40\163\164\171\154\145\75\x22\143\x6f\x6c\157\162\x3a\x20\x23\x61\71\64\x34\64\x32\x3b\142\141\143\153\x67\x72\157\165\x6e\144\x2d\143\157\154\157\162\x3a\40\43\x66\x32\x64\145\x64\145\73\160\141\x64\144\x69\x6e\147\72\40\x31\x35\x70\x78\73\155\x61\162\147\151\x6e\x2d\x62\x6f\164\x74\157\x6d\72\40\x32\x30\160\x78\73\164\x65\170\164\x2d\141\154\x69\147\156\72\x63\x65\156\164\145\x72\x3b\x62\x6f\x72\144\x65\162\x3a\x31\x70\x78\x20\163\x6f\154\x69\x64\40\43\105\x36\x42\63\x42\62\73\146\x6f\x6e\x74\55\x73\151\172\x65\x3a\61\x38\x70\x74\73\x22\x3e\40\x45\x52\122\x4f\122\74\x2f\x64\151\x76\x3e\15\xa\x20\x20\x20\x20\40\x20\x20\40\40\40\40\40\x20\40\x20\x20\74\144\151\166\x20\163\164\171\x6c\x65\x3d\42\143\157\154\x6f\x72\x3a\40\43\x61\71\x34\x34\x34\x32\73\x66\157\x6e\x74\x2d\x73\x69\172\x65\x3a\x31\64\x70\164\73\x20\155\141\x72\147\151\156\55\142\x6f\164\x74\x6f\x6d\72\x32\x30\x70\x78\x3b\42\76\x3c\x70\76\x3c\163\x74\x72\x6f\156\x67\76\x45\162\x72\157\162\72\x20\74\x2f\x73\164\x72\x6f\x6e\147\76\x20\x49\x6e\166\141\154\x69\144\x20\x53\x41\x4d\x4c\x20\x52\145\163\160\157\156\163\145\40\123\164\x61\x74\x75\x73\x2e\x3c\x2f\160\x3e\xd\12\x20\x20\x20\x20\40\x20\40\40\x20\x20\x20\40\40\40\40\x20\x3c\160\x3e\x3c\x73\164\162\157\x6e\x67\76\103\x61\165\x73\x65\163\x3c\x2f\163\x74\162\x6f\156\147\76\72\40\111\144\x65\156\164\151\x74\171\x20\120\162\x6f\166\x69\144\145\x72\40\150\141\163\40\163\145\x6e\164\x20\47" . $wy . "\47\x20\163\x74\x61\x74\x75\163\40\143\x6f\144\145\40\x69\156\x20\123\101\x4d\x4c\40\122\x65\163\160\157\x6e\x73\x65\56\x20\74\x2f\160\x3e\15\xa\x9\x9\11\x9\11\11\11\x9\x3c\x70\76\74\163\x74\x72\157\156\147\76\x52\x65\141\x73\157\156\x3c\57\163\x74\162\x6f\156\x67\x3e\72\x20" . get_status_message($wy) . "\74\x2f\x70\76\x20";
    if (empty($J9)) {
        goto qP;
    }
    echo "\74\160\x3e\74\163\164\x72\x6f\156\147\76\123\x74\141\x74\x75\163\x20\x4d\x65\x73\163\141\147\x65\x20\x69\156\40\x74\150\145\40\123\x41\x4d\x4c\x20\x52\145\x73\x70\x6f\x6e\x73\x65\x3a\74\57\x73\164\x72\x6f\x6e\147\x3e\x20\x3c\142\162\x2f\x3e" . $J9 . "\74\x2f\x70\76";
    qP:
    echo "\x3c\142\x72\x3e\15\12\40\40\x20\x20\x20\40\x20\40\x20\40\40\40\40\40\40\x20\x3c\57\144\x69\166\x3e\xd\12\15\xa\x20\x20\x20\x20\40\40\x20\40\x20\40\40\x20\40\x20\40\x20\x3c\x64\151\166\x20\163\164\x79\x6c\x65\75\x22\x6d\141\x72\x67\x69\156\x3a\x33\45\73\x64\x69\163\x70\154\141\x79\x3a\142\154\x6f\x63\153\x3b\164\145\170\164\x2d\x61\x6c\x69\x67\156\x3a\143\x65\x6e\x74\x65\x72\73\42\76\xd\12\x20\40\x20\x20\40\40\x20\40\40\40\40\40\x20\x20\x20\40\x3c\144\x69\166\x20\163\x74\x79\154\145\75\42\x6d\141\x72\147\x69\156\72\x33\x25\x3b\x64\x69\x73\160\x6c\141\171\x3a\x62\x6c\157\143\153\x3b\x74\x65\x78\x74\x2d\141\x6c\x69\147\x6e\x3a\x63\145\x6e\164\145\x72\x3b\x22\x3e\x3c\x69\x6e\160\165\164\40\163\164\171\154\145\75\x22\160\141\x64\x64\151\156\147\x3a\61\x25\73\167\x69\144\x74\150\72\61\60\x30\160\x78\x3b\142\141\143\153\x67\x72\x6f\165\x6e\x64\72\x20\43\60\60\x39\x31\103\104\x20\x6e\157\156\x65\x20\162\145\160\145\x61\x74\40\163\143\162\x6f\x6c\x6c\x20\60\x25\40\60\x25\x3b\x63\x75\162\163\157\x72\x3a\40\x70\x6f\x69\x6e\x74\145\162\x3b\146\x6f\x6e\x74\55\163\x69\x7a\145\72\61\65\160\170\x3b\x62\x6f\x72\x64\145\x72\55\167\151\x64\x74\150\x3a\x20\x31\x70\x78\x3b\x62\x6f\162\144\145\x72\x2d\x73\x74\171\154\x65\x3a\40\163\157\x6c\151\144\73\142\157\162\144\x65\x72\x2d\x72\x61\x64\x69\x75\x73\x3a\x20\x33\x70\x78\73\x77\150\151\x74\x65\55\163\160\x61\143\x65\72\x20\156\157\x77\162\x61\160\x3b\x62\157\x78\x2d\163\x69\172\151\156\x67\x3a\x20\x62\157\162\x64\145\162\x2d\x62\x6f\x78\x3b\142\x6f\x72\144\x65\162\x2d\143\x6f\x6c\x6f\162\x3a\x20\43\x30\60\x37\63\101\x41\x3b\x62\157\x78\55\163\150\x61\144\157\x77\x3a\x20\60\160\170\40\x31\160\x78\x20\x30\x70\x78\40\162\x67\x62\x61\50\x31\x32\x30\54\x20\62\60\x30\54\40\x32\x33\x30\54\x20\x30\56\66\x29\x20\151\156\x73\x65\x74\73\143\x6f\154\x6f\162\x3a\40\x23\106\x46\x46\73\x22\x74\x79\x70\x65\75\x22\x62\x75\x74\x74\x6f\156\x22\x20\166\141\x6c\x75\x65\x3d\x22\x44\157\x6e\145\x22\40\157\156\x43\154\x69\x63\153\75\42\x73\x65\x6c\x66\x2e\x63\x6c\157\163\145\50\x29\73\42\76\x3c\x2f\x64\x69\166\x3e";
    exit;
    y0:
}
function addLink($w0, $ZO)
{
    $mw = "\x3c\141\40\x68\x72\x65\146\75\42" . $ZO . "\42\76" . $w0 . "\x3c\x2f\141\76";
    return $mw;
}
function get_status_message($wy)
{
    switch ($wy) {
        case "\x52\145\161\165\145\x73\x74\x65\x72":
            return "\124\150\x65\40\162\x65\x71\x75\x65\x73\164\x20\x63\157\165\154\144\x20\x6e\x6f\164\40\x62\x65\40\160\x65\x72\x66\157\162\x6d\145\144\40\144\165\145\x20\x74\157\40\x61\156\40\145\x72\x72\157\x72\x20\157\156\x20\164\150\x65\40\x70\x61\x72\x74\40\157\x66\40\x74\x68\x65\x20\162\145\161\165\x65\163\x74\145\162\56";
            goto TW;
        case "\x52\145\x73\160\x6f\156\x64\145\162":
            return "\124\150\x65\40\162\145\161\165\x65\163\x74\x20\143\157\165\x6c\144\x20\156\x6f\164\40\x62\145\x20\160\x65\162\x66\x6f\162\x6d\145\x64\x20\144\165\x65\40\164\x6f\x20\141\x6e\40\x65\x72\162\x6f\x72\40\157\156\x20\x74\150\145\40\160\x61\x72\x74\40\157\146\x20\164\150\x65\40\123\101\x4d\114\40\162\x65\x73\x70\x6f\156\x64\145\162\40\x6f\162\40\x53\x41\115\x4c\x20\x61\x75\164\150\157\162\x69\164\x79\56";
            goto TW;
        case "\126\145\x72\x73\151\x6f\156\x4d\151\163\155\141\164\x63\150":
            return "\124\150\x65\x20\x53\x41\x4d\114\40\x72\145\163\x70\x6f\x6e\x64\145\x72\40\143\x6f\165\x6c\x64\40\x6e\157\x74\x20\160\162\157\143\x65\163\x73\40\164\x68\145\x20\x72\x65\x71\165\x65\x73\164\x20\x62\x65\x63\141\165\x73\x65\x20\164\x68\145\x20\x76\x65\x72\x73\151\157\x6e\x20\x6f\146\40\x74\150\145\40\162\145\161\165\145\163\164\x20\x6d\x65\x73\163\x61\147\145\40\167\141\163\x20\x69\x6e\x63\x6f\162\162\x65\143\164\x2e";
            goto TW;
        default:
            return "\125\156\153\156\157\167\156";
    }
    DD:
    TW:
}
function mo_saml_register_widget()
{
    register_widget("\155\x6f\x5f\x6c\157\147\x69\x6e\x5f\x77\151\144");
}
function mo_saml_get_relay_state($zW)
{
    if (!($zW == "\164\145\x73\x74\126\x61\154\151\144\141\164\145" || $zW == "\164\145\x73\x74\116\145\x77\103\145\x72\164\x69\x66\151\x63\141\164\145")) {
        goto pj;
    }
    return $zW;
    pj:
    if (get_option("\155\157\x5f\163\141\155\x6c\x5f\x73\x65\x6e\144\137\x61\142\x73\x6f\x6c\x75\164\145\x5f\x72\x65\x6c\141\x79\137\163\164\141\164\x65")) {
        goto VL;
    }
    $r5 = parse_url($zW, PHP_URL_PATH);
    if (!parse_url($zW, PHP_URL_QUERY)) {
        goto Uy;
    }
    $Mt = parse_url($zW, PHP_URL_QUERY);
    $r5 = $r5 . "\77" . $Mt;
    Uy:
    if (!parse_url($zW, PHP_URL_FRAGMENT)) {
        goto L2;
    }
    $vu = parse_url($zW, PHP_URL_FRAGMENT);
    $r5 = $r5 . "\43" . $vu;
    L2:
    goto a_;
    VL:
    $Ef = get_option("\x6d\157\x5f\163\141\155\154\x5f\x63\165\x73\x74\x6f\155\x65\162\137\x74\x6f\153\x65\x6e");
    $r5 = AESEncryption::encrypt_data($zW, $Ef);
    a_:
    return $r5;
}
add_action("\167\151\144\x67\145\164\x73\137\151\x6e\151\164", "\155\x6f\137\163\141\x6d\x6c\x5f\x72\x65\x67\151\x73\x74\145\162\137\167\151\144\147\145\164");
add_action("\x69\x6e\x69\164", "\155\x6f\x5f\154\x6f\147\151\x6e\137\166\x61\154\x69\144\141\x74\x65");

<?php


include_once dirname(__FILE__) . "\57\125\x74\151\154\x69\164\x69\x65\x73\x2e\160\x68\160";
include_once dirname(__FILE__) . "\x2f\x52\x65\163\160\157\x6e\163\x65\x2e\x70\150\160";
include_once dirname(__FILE__) . "\57\114\x6f\x67\157\x75\164\x52\145\x71\x75\145\163\164\56\x70\x68\x70";
include_once "\170\155\154\163\x65\143\x6c\x69\x62\x73\56\x70\150\160";
use RobRichards\XMLSecLibs\XMLSecurityKey;
use RobRichards\XMLSecLibs\XMLSecurityDSig;
use RobRichards\XMLSecLibs\XMLSecEnc;
if (class_exists("\x41\105\123\105\x6e\x63\x72\x79\x70\x74\151\x6f\156")) {
    goto Qo;
}
require_once dirname(__FILE__) . "\57\151\156\x63\154\x75\x64\x65\163\57\x6c\151\x62\57\145\156\143\162\171\160\164\151\x6f\156\56\160\150\x70";
Qo:
class mo_login_wid extends WP_Widget
{
    public function __construct()
    {
        $p3 = get_option("\163\141\x6d\x6c\x5f\x69\144\x65\156\164\151\x74\171\x5f\156\141\x6d\145");
        parent::__construct("\123\x61\155\154\x5f\x4c\157\x67\151\156\x5f\x57\151\x64\x67\145\x74", "\114\x6f\x67\x69\156\40\167\x69\164\150\40" . $p3, array("\x64\145\x73\143\162\x69\160\164\151\157\156" => __("\x54\x68\151\x73\40\x69\163\x20\x61\x20\155\151\156\151\117\162\x61\x6e\147\145\x20\123\101\115\114\x20\x6c\157\147\151\x6e\40\167\151\x64\x67\145\164\x2e", "\x6d\157\163\141\155\154")));
    }
    public function widget($yL, $xv)
    {
        extract($yL);
        $cG = apply_filters("\x77\151\144\147\145\x74\x5f\164\x69\164\x6c\145", $xv["\167\x69\x64\x5f\164\x69\164\x6c\145"]);
        echo $yL["\142\x65\146\157\x72\x65\x5f\167\151\x64\x67\x65\164"];
        if (empty($cG)) {
            goto hv;
        }
        echo $yL["\x62\x65\x66\157\162\145\137\x74\151\164\x6c\x65"] . $cG . $yL["\141\146\164\145\162\x5f\x74\151\164\154\x65"];
        hv:
        $this->loginForm();
        echo $yL["\x61\146\164\x65\x72\x5f\167\x69\144\147\x65\x74"];
    }
    public function update($K9, $l5)
    {
        $xv = array();
        $xv["\x77\151\144\137\164\x69\164\x6c\x65"] = strip_tags($K9["\x77\x69\x64\x5f\164\x69\164\154\145"]);
        return $xv;
    }
    public function form($xv)
    {
        $cG = '';
        if (!array_key_exists("\167\x69\144\x5f\164\x69\164\x6c\x65", $xv)) {
            goto ed;
        }
        $cG = $xv["\167\x69\x64\x5f\x74\151\164\x6c\145"];
        ed:
        echo "\12\x9\x9\74\x70\x3e\x3c\154\x61\x62\x65\x6c\40\x66\157\x72\x3d\x22" . $this->get_field_id("\x77\151\144\137\164\x69\x74\154\x65") . "\40\x22\x3e" . _e("\x54\151\164\154\145\72") . "\40\x3c\x2f\154\141\142\x65\x6c\76\xa\11\x9\x3c\151\156\160\x75\x74\40\143\154\141\163\x73\x3d\42\167\151\144\x65\146\141\x74\x22\x20\151\144\75\x22" . $this->get_field_id("\167\x69\144\137\164\x69\x74\x6c\x65") . "\x22\40\x6e\141\155\145\x3d\x22" . $this->get_field_name("\x77\151\x64\137\164\x69\164\154\x65") . "\x22\x20\x74\x79\160\x65\75\42\164\145\170\164\42\x20\x76\x61\154\165\145\75\x22" . $cG . "\x22\x20\x2f\x3e\12\x9\x9\74\57\x70\x3e";
    }
    public function loginForm()
    {
        global $post;
        if (!is_user_logged_in()) {
            goto Cm;
        }
        $current_user = wp_get_current_user();
        $sT = "\x48\145\154\154\157\x2c";
        if (!get_option("\155\157\137\163\x61\x6d\154\137\x63\165\x73\164\157\x6d\x5f\147\162\145\145\164\x69\156\x67\137\164\x65\x78\x74")) {
            goto N7;
        }
        $sT = get_option("\x6d\157\x5f\163\x61\155\x6c\137\143\x75\163\164\157\155\x5f\147\x72\x65\x65\164\151\156\147\x5f\x74\145\x78\x74");
        N7:
        $T_ = '';
        if (!get_option("\x6d\157\x5f\x73\x61\155\154\x5f\147\x72\x65\145\x74\151\x6e\147\137\156\x61\155\x65")) {
            goto B2;
        }
        switch (get_option("\155\157\137\x73\x61\155\154\137\147\162\x65\145\164\x69\x6e\x67\137\x6e\x61\155\145")) {
            case "\x55\123\105\122\x4e\x41\x4d\105":
                $T_ = $current_user->user_login;
                goto Vb;
            case "\105\x4d\x41\111\114":
                $T_ = $current_user->user_email;
                goto Vb;
            case "\x46\116\101\115\x45":
                $T_ = $current_user->user_firstname;
                goto Vb;
            case "\x4c\116\101\115\105":
                $T_ = $current_user->user_lastname;
                goto Vb;
            case "\106\x4e\x41\x4d\x45\x5f\114\116\x41\115\x45":
                $T_ = $current_user->user_firstname . "\x20" . $current_user->user_lastname;
                goto Vb;
            case "\x4c\116\101\x4d\105\137\106\x4e\101\115\105":
                $T_ = $current_user->user_lastname . "\40" . $current_user->user_firstname;
                goto Vb;
            default:
                $T_ = $current_user->user_login;
        }
        kg:
        Vb:
        B2:
        $T_ = trim($T_);
        if (!empty($T_)) {
            goto cG;
        }
        $T_ = $current_user->user_login;
        cG:
        $d_ = $sT . "\x20" . $T_;
        $yA = "\114\157\x67\x6f\x75\x74";
        if (!get_option("\x6d\x6f\137\163\x61\155\x6c\137\x63\165\x73\x74\x6f\x6d\x5f\154\x6f\x67\x6f\x75\x74\137\x74\x65\170\x74")) {
            goto fQ;
        }
        $yA = get_option("\x6d\x6f\x5f\x73\141\155\154\137\143\165\163\164\157\x6d\x5f\x6c\x6f\147\157\165\x74\x5f\164\x65\170\x74");
        fQ:
        echo $d_ . "\40\174\40\x3c\141\x20\x68\162\x65\146\75\42" . wp_logout_url(home_url()) . "\x22\40\x74\151\x74\154\145\x3d\42\x6c\x6f\x67\157\x75\164\42\40\x3e" . $yA . "\74\57\x61\x3e\x3c\x2f\x6c\151\x3e";
        goto W4;
        Cm:
        $eT = saml_get_current_page_url();
        echo "\12\11\11\x3c\x73\x63\x72\151\x70\x74\x3e\12\11\11\146\x75\x6e\x63\x74\x69\x6f\x6e\40\163\165\x62\x6d\x69\x74\123\141\155\154\106\157\x72\155\50\x29\173\x20\144\157\143\165\155\145\156\164\x2e\x67\145\164\x45\x6c\x65\155\145\x6e\164\102\x79\111\x64\x28\42\155\151\x6e\x69\x6f\x72\141\156\147\145\x2d\163\141\x6d\x6c\x2d\163\x70\x2d\x73\x73\157\55\154\x6f\147\x69\x6e\55\x66\157\x72\x6d\x22\x29\56\163\x75\142\155\x69\164\50\51\73\x20\x7d\12\11\x9\74\57\163\143\x72\151\160\164\76\xa\11\x9\x3c\146\x6f\162\155\40\x6e\141\x6d\145\75\x22\x6d\151\156\151\x6f\x72\141\x6e\147\x65\x2d\x73\141\x6d\x6c\55\x73\160\55\x73\163\x6f\x2d\x6c\x6f\147\151\156\x2d\x66\157\162\x6d\42\40\151\x64\75\x22\155\x69\x6e\x69\x6f\x72\141\156\x67\145\55\x73\141\x6d\154\x2d\163\160\x2d\x73\163\157\x2d\x6c\x6f\x67\x69\156\55\x66\x6f\x72\155\42\x20\x6d\145\x74\150\157\x64\x3d\42\160\157\163\164\x22\40\x61\x63\164\x69\x6f\156\x3d\42\42\76\xa\x9\x9\74\x69\156\x70\x75\164\40\164\x79\x70\145\75\42\x68\151\144\144\x65\x6e\x22\x20\156\x61\x6d\x65\x3d\x22\157\160\164\151\x6f\156\x22\x20\x76\141\154\165\145\75\x22\x73\x61\x6d\154\x5f\x75\x73\145\162\x5f\x6c\157\x67\x69\x6e\x22\x20\57\x3e\12\x9\11\74\x69\156\x70\165\164\x20\x74\171\x70\145\75\x22\x68\151\x64\144\x65\156\x22\40\x6e\x61\x6d\x65\75\42\162\145\x64\x69\x72\145\x63\x74\137\x74\157\x22\x20\x76\x61\154\x75\145\75\x22" . $eT . "\42\40\x2f\76\12\xa\11\x9\74\146\x6f\x6e\x74\40\163\151\172\x65\x3d\x22\x2b\61\42\x20\163\164\x79\154\145\x3d\42\166\x65\162\x74\151\143\x61\x6c\55\141\154\x69\147\156\72\164\x6f\x70\x3b\42\76\40\x3c\57\x66\x6f\x6e\164\x3e";
        $Rs = get_option("\x73\x61\155\x6c\137\x69\x64\x65\x6e\x74\151\164\x79\137\x6e\141\155\145");
        if (!empty($Rs)) {
            goto Fa;
        }
        echo "\x50\x6c\145\141\x73\145\40\143\x6f\x6e\x66\x69\147\165\x72\145\x20\x74\150\145\x20\x6d\151\156\x69\117\162\x61\156\147\x65\40\123\x41\x4d\x4c\x20\x50\x6c\x75\x67\x69\156\40\146\x69\x72\163\x74\x2e";
        goto eY;
        Fa:
        $g2 = "\114\157\147\151\x6e\40\x77\x69\x74\150\40\43\x23\x49\x44\120\43\43";
        if (!get_option("\x6d\x6f\137\163\141\x6d\154\x5f\143\x75\x73\164\x6f\x6d\137\x6c\157\x67\151\x6e\x5f\x74\x65\x78\x74")) {
            goto Mm;
        }
        $g2 = get_option("\x6d\x6f\x5f\163\x61\x6d\x6c\137\143\x75\163\x74\157\155\137\x6c\x6f\x67\151\156\x5f\164\x65\x78\x74");
        Mm:
        $g2 = str_replace("\x23\x23\x49\x44\x50\x23\43", $Rs, $g2);
        $iP = false;
        if (!get_option("\x6d\x6f\x5f\x73\x61\155\154\x5f\x75\163\145\137\x62\x75\164\164\x6f\156\137\141\x73\137\x77\151\x64\147\145\164")) {
            goto b0;
        }
        if (!(get_option("\155\x6f\x5f\163\x61\155\x6c\137\x75\x73\x65\x5f\x62\165\x74\x74\157\156\137\x61\163\x5f\x77\151\x64\x67\x65\164") == "\x74\x72\165\x65")) {
            goto V4;
        }
        $iP = true;
        V4:
        b0:
        if (!$iP) {
            goto id;
        }
        $fe = get_option("\155\157\x5f\x73\141\x6d\x6c\137\142\x75\164\164\157\x6e\x5f\x77\x69\x64\164\150") ? get_option("\155\157\137\163\141\155\154\137\142\165\x74\164\157\x6e\137\x77\151\144\x74\150") : "\61\60\x30";
        $oM = get_option("\x6d\157\137\x73\x61\155\x6c\x5f\142\165\x74\x74\157\x6e\x5f\x68\145\x69\147\x68\x74") ? get_option("\155\157\137\x73\141\x6d\154\x5f\x62\x75\164\x74\157\156\x5f\x68\145\151\147\150\164") : "\x35\x30";
        $Pq = get_option("\155\157\137\163\x61\155\154\x5f\142\x75\x74\164\157\x6e\137\x73\x69\x7a\x65") ? get_option("\155\x6f\x5f\x73\141\155\154\137\142\165\164\x74\x6f\156\x5f\163\151\x7a\145") : "\65\x30";
        $X_ = get_option("\x6d\157\x5f\163\141\155\154\x5f\142\165\164\164\x6f\156\x5f\143\x75\162\x76\145") ? get_option("\155\x6f\x5f\163\x61\155\x6c\137\142\x75\x74\x74\157\156\137\x63\165\162\166\145") : "\65";
        $Uu = get_option("\x6d\x6f\137\x73\141\x6d\154\137\142\165\164\x74\157\156\137\x63\157\x6c\x6f\x72") ? get_option("\x6d\157\x5f\163\141\x6d\x6c\137\142\x75\x74\x74\x6f\x6e\x5f\143\x6f\x6c\157\162") : "\60\60\70\65\x62\141";
        $MF = get_option("\155\x6f\137\x73\141\155\154\x5f\x62\165\x74\164\157\156\137\164\x68\145\x6d\x65") ? get_option("\155\x6f\x5f\x73\x61\155\x6c\x5f\142\x75\164\x74\157\156\137\164\150\x65\155\x65") : "\154\x6f\156\147\142\165\164\x74\x6f\156";
        $D7 = get_option("\x6d\157\137\x73\x61\155\154\x5f\x62\x75\164\x74\157\156\x5f\164\x65\170\x74") ? get_option("\155\157\137\163\x61\155\x6c\x5f\x62\x75\x74\164\x6f\156\x5f\x74\x65\x78\x74") : (get_option("\163\141\155\x6c\x5f\151\144\145\x6e\x74\x69\164\x79\x5f\x6e\141\x6d\145") ? get_option("\163\x61\x6d\x6c\137\151\144\x65\156\164\x69\164\x79\137\156\141\x6d\145") : "\114\x6f\x67\x69\x6e");
        $Ob = get_option("\x6d\157\137\163\x61\x6d\154\x5f\x66\157\156\x74\x5f\143\157\154\157\x72") ? get_option("\x6d\x6f\x5f\x73\141\155\154\x5f\x66\x6f\156\164\x5f\143\x6f\x6c\x6f\162") : "\146\x66\146\x66\x66\146";
        $Gj = get_option("\x6d\x6f\137\x73\141\155\x6c\137\x66\x6f\x6e\164\137\163\x69\172\x65") ? get_option("\155\157\x5f\x73\x61\155\154\137\x66\157\x6e\164\137\163\151\x7a\x65") : "\62\60";
        $g2 = "\x3c\151\156\160\x75\164\x20\164\x79\x70\x65\x3d\42\142\x75\x74\x74\157\156\x22\40\156\141\x6d\x65\75\42\155\x6f\137\163\141\x6d\154\x5f\x77\x70\x5f\x73\163\x6f\137\142\165\x74\164\x6f\156\42\40\166\x61\x6c\x75\x65\75\x22" . $D7 . "\42\x20\163\164\171\154\x65\x3d\42";
        $EU = '';
        if ($MF == "\x6c\157\156\x67\x62\165\x74\x74\157\156") {
            goto yM;
        }
        if ($MF == "\x63\151\162\x63\154\x65") {
            goto tL;
        }
        if ($MF == "\x6f\166\141\154") {
            goto AF;
        }
        if ($MF == "\163\161\165\141\x72\x65") {
            goto M9;
        }
        goto eb;
        tL:
        $EU = $EU . "\167\151\x64\164\x68\x3a" . $Pq . "\160\170\73";
        $EU = $EU . "\x68\145\151\147\x68\x74\x3a" . $Pq . "\x70\170\x3b";
        $EU = $EU . "\x62\x6f\x72\x64\145\x72\x2d\162\141\144\x69\x75\163\72\71\71\71\x70\170\x3b";
        goto eb;
        AF:
        $EU = $EU . "\167\x69\x64\164\x68\x3a" . $Pq . "\160\x78\x3b";
        $EU = $EU . "\150\145\x69\x67\150\x74\72" . $Pq . "\x70\x78\73";
        $EU = $EU . "\142\157\162\144\x65\x72\55\162\141\x64\x69\x75\163\72\x35\x70\x78\73";
        goto eb;
        M9:
        $EU = $EU . "\x77\151\x64\164\x68\72" . $Pq . "\x70\x78\x3b";
        $EU = $EU . "\150\145\x69\x67\150\x74\x3a" . $Pq . "\x70\170\x3b";
        $EU = $EU . "\x62\x6f\162\144\x65\162\55\162\141\x64\x69\x75\163\72\x30\160\170\x3b";
        eb:
        goto ZV;
        yM:
        $EU = $EU . "\167\x69\x64\164\150\72" . $fe . "\x70\170\x3b";
        $EU = $EU . "\x68\x65\151\x67\x68\164\x3a" . $oM . "\160\170\73";
        $EU = $EU . "\142\x6f\x72\x64\x65\x72\x2d\x72\x61\144\151\x75\163\72" . $X_ . "\x70\x78\73";
        ZV:
        $EU = $EU . "\142\141\x63\x6b\147\162\157\165\156\144\55\x63\157\154\x6f\162\72\43" . $Uu . "\73";
        $EU = $EU . "\142\157\x72\x64\145\x72\x2d\x63\x6f\x6c\x6f\162\72\164\x72\x61\156\x73\x70\141\x72\x65\x6e\164\x3b";
        $EU = $EU . "\143\x6f\x6c\x6f\162\72\43" . $Ob . "\x3b";
        $EU = $EU . "\x66\157\x6e\164\x2d\x73\x69\x7a\145\72" . $Gj . "\160\x78\x3b";
        $EU = $EU . "\160\141\x64\144\x69\156\147\72\60\160\x78\73";
        $g2 = $g2 . $EU . "\42\x2f\76";
        id:
        ?>
 <a href="#" onClick="submitSamlForm()"><?php 
        echo $g2;
        ?>
</a></form> <?php 
        eY:
        if ($this->mo_saml_check_empty_or_null_val(get_option("\155\157\137\163\141\x6d\154\x5f\162\145\x64\151\162\x65\x63\164\x5f\145\x72\x72\157\162\x5f\x63\x6f\x64\145"))) {
            goto yt;
        }
        echo "\74\x64\x69\166\76\x3c\57\x64\151\166\x3e\74\144\151\166\40\x74\151\164\x6c\x65\x3d\x22\x4c\157\x67\x69\156\40\x45\162\x72\157\162\42\x3e\74\146\x6f\x6e\x74\40\x63\x6f\x6c\x6f\162\75\x22\162\x65\x64\x22\76\x57\x65\x20\143\157\x75\154\144\x20\x6e\157\x74\x20\163\x69\x67\x6e\x20\171\157\165\40\x69\x6e\x2e\x20\x50\x6c\x65\x61\x73\x65\40\x63\x6f\x6e\164\x61\x63\x74\40\171\157\165\x72\x20\x41\144\155\151\x6e\x69\163\x74\162\x61\164\x6f\162\x2e\74\57\146\x6f\156\x74\76\74\x2f\144\x69\x76\76";
        delete_option("\155\x6f\x5f\163\x61\x6d\154\137\162\145\144\x69\162\145\143\164\x5f\145\x72\162\157\162\x5f\x63\157\144\145");
        delete_option("\155\x6f\137\x73\x61\155\154\137\162\x65\x64\151\162\x65\x63\164\x5f\145\162\162\157\x72\137\x72\145\141\163\x6f\x6e");
        yt:
        echo "\11\x3c\x2f\x75\154\76\12\x9\x9\x3c\x2f\146\157\162\155\x3e";
        W4:
    }
    public function mo_saml_check_empty_or_null_val($zw)
    {
        if (!(!isset($zw) || empty($zw))) {
            goto R3;
        }
        return true;
        R3:
        return false;
    }
    public function mo_saml_widget_init()
    {
        if (!(isset($_REQUEST["\157\160\164\151\x6f\156"]) and $_REQUEST["\157\160\x74\151\157\156"] == "\x73\141\155\x6c\137\165\x73\x65\x72\137\x6c\x6f\147\157\x75\x74")) {
            goto kD;
        }
        $user = is_user_logged_in() ? wp_get_current_user() : null;
        $this->mo_saml_logout('', '', $user);
        kD:
    }
    function mo_saml_logout($eT, $T4, $user)
    {
        $Xf = get_option("\x73\x61\x6d\154\137\x6c\157\x67\157\165\x74\137\x75\162\154");
        $Vl = get_option("\x73\141\x6d\x6c\137\x6c\x6f\147\x6f\165\164\137\x62\151\156\144\151\156\147\x5f\x74\x79\160\x65");
        $OT = wp_get_referer();
        if (!empty($OT)) {
            goto cn;
        }
        $OT = !empty(get_option("\x6d\157\137\163\x61\155\x6c\137\163\160\137\142\141\163\145\137\x75\162\x6c")) ? get_option("\155\157\137\x73\x61\155\x6c\137\x73\x70\137\x62\141\x73\145\x5f\x75\162\x6c") : home_url();
        cn:
        if (empty($Xf)) {
            goto kJ;
        }
        if (!(!session_id() || session_id() == '' || !isset($_SESSION))) {
            goto l6;
        }
        session_start();
        l6:
        if (isset($_SESSION["\x6d\x6f\x5f\163\x61\155\154\x5f\154\x6f\x67\x6f\165\164\x5f\x72\145\161\x75\x65\163\164"])) {
            goto Wv;
        }
        if (isset($_SESSION["\155\x6f\x5f\x73\141\155\x6c"]["\x6c\x6f\x67\x67\145\x64\x5f\151\156\137\167\151\164\150\x5f\x69\x64\x70"])) {
            goto vW;
        }
        goto Tp;
        Wv:
        self::createLogoutResponseAndRedirect($Xf, $Vl);
        die;
        goto Tp;
        vW:
        $current_user = $user;
        $HI = get_user_meta($current_user->ID, "\x6d\x6f\137\163\141\155\154\137\156\x61\155\145\x5f\x69\x64");
        $bP = get_user_meta($current_user->ID, "\155\157\x5f\163\x61\155\154\137\163\145\x73\x73\x69\x6f\x6e\x5f\x69\156\144\145\x78");
        if (empty($HI)) {
            goto Tw;
        }
        mo_saml_create_logout_request($HI, $bP, $Xf, $Vl, $OT);
        unset($_SESSION["\155\157\x5f\x73\x61\155\154"]);
        Tw:
        Tp:
        kJ:
        return $OT;
    }
    function createLogoutResponseAndRedirect($Xf, $Vl)
    {
        $Gp = get_option("\x6d\x6f\x5f\163\141\x6d\x6c\x5f\x73\160\x5f\x62\x61\x73\145\x5f\165\162\x6c");
        if (!empty($Gp)) {
            goto Cu;
        }
        $Gp = home_url();
        Cu:
        $uG = $_SESSION["\x6d\x6f\137\163\x61\x6d\x6c\137\154\x6f\147\x6f\x75\164\x5f\x72\x65\161\x75\145\x73\x74"];
        $yC = $_SESSION["\x6d\157\x5f\163\x61\155\154\x5f\154\x6f\x67\x6f\x75\x74\137\x72\145\154\141\x79\x5f\163\164\141\x74\145"];
        unset($_SESSION["\x6d\x6f\x5f\x73\x61\155\154\x5f\154\157\147\x6f\x75\x74\137\162\x65\x71\165\145\163\164"]);
        unset($_SESSION["\x6d\157\137\163\x61\155\x6c\137\x6c\157\x67\x6f\x75\164\x5f\162\145\154\x61\171\x5f\163\x74\141\x74\x65"]);
        $X8 = new DOMDocument();
        $X8->loadXML($uG);
        $uG = $X8->firstChild;
        if (!($uG->localName == "\114\x6f\147\x6f\x75\x74\122\145\161\165\145\x73\164")) {
            goto FE;
        }
        $Xk = new SAML2SPLogoutRequest($uG);
        $zY = get_option("\155\x6f\137\x73\141\155\x6c\137\x73\160\137\145\x6e\x74\x69\164\171\x5f\151\x64");
        if (!empty($zY)) {
            goto xe;
        }
        $zY = $Gp . "\57\x77\x70\x2d\x63\157\x6e\x74\x65\x6e\x74\57\160\154\165\x67\151\156\163\57\x6d\151\156\151\x6f\162\141\x6e\x67\x65\x2d\x73\x61\155\x6c\55\x32\x30\x2d\x73\151\x6e\x67\154\145\x2d\163\151\x67\156\55\x6f\156\x2f";
        xe:
        $ch = $Xf;
        $sZ = SAMLSPUtilities::createLogoutResponse($Xk->getId(), $zY, $ch, $Vl);
        if (empty($Vl) || $Vl == "\110\164\164\160\122\145\x64\x69\162\145\143\x74") {
            goto OR1;
        }
        if (!(get_option("\163\141\x6d\154\137\x72\145\x71\165\x65\x73\x74\x5f\163\151\147\x6e\145\x64") != "\143\x68\x65\143\x6b\x65\144")) {
            goto Ov;
        }
        $Ji = base64_encode($sZ);
        SAMLSPUtilities::postSAMLResponse($Xf, $Ji, $yC);
        die;
        Ov:
        $hw = '';
        $y9 = '';
        $Ji = SAMLSPUtilities::signXML($sZ, "\123\164\x61\x74\165\x73");
        SAMLSPUtilities::postSAMLResponse($Xf, $Ji, $yC);
        goto vb;
        OR1:
        $U_ = $Xf;
        if (strpos($Xf, "\x3f") !== false) {
            goto UI;
        }
        $U_ .= "\x3f";
        goto g0;
        UI:
        $U_ .= "\46";
        g0:
        if (!(get_option("\x73\x61\155\154\137\162\145\161\165\145\163\164\x5f\163\151\x67\156\145\144") != "\x63\x68\x65\143\153\145\144")) {
            goto R2;
        }
        $U_ .= "\123\101\x4d\114\122\145\163\x70\157\x6e\x73\x65\75" . $sZ . "\46\122\x65\x6c\x61\x79\123\164\x61\164\145\75" . urlencode($yC);
        header("\114\x6f\143\141\x74\x69\157\x6e\x3a\40" . $U_);
        die;
        R2:
        $o_ = "\x53\x41\115\x4c\122\145\163\x70\157\x6e\163\145\x3d" . $sZ . "\x26\122\x65\154\x61\171\123\164\141\x74\x65\75" . urlencode($yC) . "\x26\x53\151\x67\x41\154\147\x3d" . urlencode(XMLSecurityKey::RSA_SHA256);
        $b3 = array("\164\171\x70\x65" => "\x70\x72\x69\x76\141\164\145");
        $k3 = new XMLSecurityKey(XMLSecurityKey::RSA_SHA256, $b3);
        $Zb = get_option("\x6d\157\x5f\x73\x61\155\154\x5f\143\165\162\162\x65\x6e\164\x5f\x63\x65\162\164\137\160\x72\x69\166\x61\x74\145\137\153\145\171");
        $k3->loadKey($Zb, FALSE);
        $m0 = new XMLSecurityDSig();
        $bn = $k3->signData($o_);
        $bn = base64_encode($bn);
        $U_ .= $o_ . "\x26\123\x69\x67\x6e\141\x74\165\x72\145\x3d" . urlencode($bn);
        header("\114\157\x63\141\x74\151\157\156\x3a\40" . $U_);
        die;
        vb:
        FE:
    }
}
function mo_saml_create_logout_request($HI, $bP, $Xf, $Vl, $OT)
{
    $Gp = get_option("\155\x6f\x5f\x73\x61\155\154\x5f\x73\x70\137\x62\141\x73\145\x5f\x75\162\154");
    if (!empty($Gp)) {
        goto vS;
    }
    $Gp = home_url();
    vS:
    $zY = get_option("\155\x6f\x5f\x73\141\x6d\x6c\x5f\x73\160\137\145\156\x74\x69\164\x79\x5f\x69\144");
    if (!empty($zY)) {
        goto nV;
    }
    $zY = $Gp . "\x2f\x77\160\55\143\157\156\x74\145\x6e\164\57\x70\x6c\x75\147\x69\156\x73\x2f\x6d\151\156\x69\157\162\x61\156\147\x65\55\163\x61\155\154\x2d\x32\60\x2d\x73\x69\156\147\154\x65\x2d\x73\x69\x67\156\55\x6f\x6e\x2f";
    nV:
    $ch = $Xf;
    $ac = $OT;
    $ac = mo_saml_get_relay_state($ac);
    $o_ = SAMLSPUtilities::createLogoutRequest($HI, $bP, $zY, $ch, $Vl);
    if (empty($Vl) || $Vl == "\110\x74\164\160\122\x65\x64\151\162\145\143\x74") {
        goto CC;
    }
    if (!(get_option("\163\x61\155\x6c\137\162\145\161\165\145\163\x74\137\x73\x69\x67\156\145\144") != "\x63\x68\x65\x63\x6b\x65\x64")) {
        goto Bi;
    }
    $Ji = base64_encode($o_);
    SAMLSPUtilities::postSAMLRequest($Xf, $Ji, $ac);
    die;
    Bi:
    $hw = '';
    $y9 = '';
    $Ji = SAMLSPUtilities::signXML($o_, "\116\141\155\145\111\x44");
    SAMLSPUtilities::postSAMLRequest($Xf, $Ji, $ac);
    goto eD;
    CC:
    $U_ = $Xf;
    if (strpos($Xf, "\77") !== false) {
        goto Vt;
    }
    $U_ .= "\x3f";
    goto ra;
    Vt:
    $U_ .= "\46";
    ra:
    if (!(get_option("\163\x61\155\x6c\137\x72\145\x71\x75\x65\x73\x74\137\x73\151\147\x6e\145\144") != "\x63\x68\145\x63\x6b\145\x64")) {
        goto YF;
    }
    $U_ .= "\123\x41\x4d\x4c\x52\x65\x71\x75\145\163\x74\x3d" . $o_ . "\46\122\145\154\141\171\x53\x74\141\x74\x65\75" . urlencode($ac);
    header("\x4c\x6f\143\141\164\151\x6f\x6e\x3a\40" . $U_);
    die;
    YF:
    $o_ = "\x53\101\x4d\x4c\122\x65\161\165\x65\x73\x74\x3d" . $o_ . "\46\122\x65\x6c\x61\171\123\x74\x61\x74\145\75" . urlencode($ac) . "\46\123\151\x67\x41\154\147\75" . urlencode(XMLSecurityKey::RSA_SHA256);
    $b3 = array("\164\x79\x70\145" => "\x70\x72\151\x76\141\x74\145");
    $k3 = new XMLSecurityKey(XMLSecurityKey::RSA_SHA256, $b3);
    $Zb = get_option("\155\x6f\137\x73\x61\155\x6c\x5f\x63\165\x72\162\145\x6e\x74\137\x63\x65\x72\x74\x5f\x70\162\151\x76\x61\x74\x65\137\x6b\x65\x79");
    $k3->loadKey($Zb, FALSE);
    $m0 = new XMLSecurityDSig();
    $bn = $k3->signData($o_);
    $bn = base64_encode($bn);
    $U_ .= $o_ . "\46\123\x69\x67\x6e\141\x74\x75\162\x65\x3d" . urlencode($bn);
    header("\114\157\143\x61\x74\151\157\156\x3a\40" . $U_);
    die;
    eD:
}
function mo_login_validate()
{
    if (!(isset($_REQUEST["\x6f\160\x74\x69\157\156"]) && $_REQUEST["\x6f\x70\164\151\x6f\156"] == "\x6d\x6f\163\141\x6d\x6c\137\x6d\145\164\141\144\141\164\x61")) {
        goto W0;
    }
    miniorange_generate_metadata();
    W0:
    if (!(isset($_REQUEST["\157\x70\x74\151\x6f\156"]) && $_REQUEST["\x6f\160\x74\151\x6f\156"] == "\145\x78\160\157\x72\164\x5f\x63\157\156\x66\x69\x67\x75\162\x61\164\151\x6f\156")) {
        goto qB;
    }
    if (!current_user_can("\x6d\141\x6e\x61\147\145\x5f\x6f\160\164\151\x6f\x6e\163")) {
        goto dS;
    }
    miniorange_import_export(true);
    dS:
    die;
    qB:
    if (!mo_saml_is_customer_license_verified()) {
        goto Bv;
    }
    if (!(isset($_REQUEST["\x6f\x70\164\x69\x6f\156"]) && $_REQUEST["\x6f\x70\x74\x69\x6f\156"] == "\x73\141\x6d\x6c\x5f\x75\x73\145\x72\x5f\154\157\147\151\x6e" || isset($_REQUEST["\157\x70\x74\x69\x6f\156"]) && $_REQUEST["\x6f\160\x74\x69\157\x6e"] == "\x74\145\x73\x74\151\144\x70\x63\x6f\156\x66\x69\147" || isset($_REQUEST["\x6f\x70\164\x69\157\x6e"]) && $_REQUEST["\x6f\x70\x74\x69\x6f\x6e"] == "\x67\145\164\163\x61\155\154\162\x65\161\x75\145\163\164" || isset($_REQUEST["\157\160\164\151\157\156"]) && $_REQUEST["\157\160\164\x69\157\156"] == "\147\x65\164\163\x61\x6d\x6c\162\x65\163\x70\157\x6e\x73\x65")) {
        goto l2;
    }
    if (!mo_saml_is_sp_configured()) {
        goto Cj;
    }
    if (!(is_user_logged_in() && $_REQUEST["\x6f\x70\164\x69\157\x6e"] == "\x73\141\155\x6c\x5f\x75\x73\x65\x72\x5f\154\157\x67\x69\156")) {
        goto bc;
    }
    if (!isset($_REQUEST["\x72\145\144\x69\162\x65\143\164\137\x74\x6f"])) {
        goto IF1;
    }
    $Xd = htmlspecialchars($_REQUEST["\x72\x65\x64\x69\x72\145\x63\164\137\164\x6f"]);
    header("\114\157\x63\x61\164\x69\x6f\156\x3a\x20" . $Xd);
    die;
    IF1:
    return;
    bc:
    $Gp = get_option("\x6d\157\x5f\163\x61\x6d\154\x5f\163\x70\x5f\142\x61\163\x65\x5f\x75\162\154");
    if (!empty($Gp)) {
        goto qS;
    }
    $Gp = home_url();
    qS:
    if ($_REQUEST["\x6f\160\164\151\157\x6e"] == "\164\145\163\164\x69\144\160\143\157\156\146\x69\x67") {
        goto wG;
    }
    if ($_REQUEST["\x6f\160\164\x69\157\x6e"] == "\x67\x65\x74\163\x61\x6d\154\x72\145\x71\x75\x65\163\164") {
        goto h3;
    }
    if ($_REQUEST["\x6f\160\x74\151\x6f\x6e"] == "\x67\145\x74\163\x61\155\154\162\145\x73\x70\x6f\x6e\x73\145") {
        goto qn;
    }
    if (get_option("\155\x6f\x5f\163\141\x6d\x6c\x5f\x72\145\x6c\x61\x79\x5f\163\164\x61\x74\x65") && get_option("\x6d\x6f\x5f\163\141\x6d\154\x5f\x72\145\154\141\171\x5f\x73\164\x61\164\145") != '') {
        goto i5;
    }
    if (isset($_REQUEST["\162\x65\144\151\162\x65\143\164\137\x74\157"])) {
        goto bN;
    }
    $ac = wp_get_referer();
    goto r9;
    bN:
    $ac = htmlspecialchars($_REQUEST["\162\145\144\151\x72\x65\143\x74\137\x74\157"]);
    r9:
    goto cw;
    i5:
    $ac = get_option("\155\x6f\137\163\x61\x6d\154\x5f\162\145\x6c\x61\x79\137\x73\x74\141\164\145");
    cw:
    goto PK;
    qn:
    $ac = "\x64\151\x73\160\154\141\x79\x53\x41\x4d\114\x52\x65\163\x70\x6f\156\163\x65";
    PK:
    goto mw;
    h3:
    $ac = "\x64\x69\163\160\154\141\x79\x53\101\x4d\x4c\x52\x65\161\165\145\163\x74";
    mw:
    goto OI;
    wG:
    $ac = "\x74\x65\163\x74\126\x61\154\151\144\x61\x74\145";
    OI:
    if (!empty($ac)) {
        goto sk;
    }
    $ac = $Gp;
    sk:
    $So = get_option("\163\x61\x6d\x6c\x5f\x6c\x6f\x67\151\156\x5f\165\x72\x6c");
    $do = get_option("\163\141\155\x6c\137\x6c\157\x67\151\156\x5f\x62\151\156\144\x69\156\147\x5f\164\171\x70\x65");
    $cf = get_option("\x6d\x6f\137\163\141\155\154\x5f\146\157\x72\x63\145\137\141\165\164\x68\x65\x6e\164\x69\x63\141\x74\x69\x6f\156");
    $XR = $Gp . "\x2f";
    $zY = get_option("\155\157\x5f\163\x61\x6d\x6c\x5f\x73\x70\137\x65\156\164\151\164\x79\137\x69\144");
    $zT = get_option("\x73\x61\x6d\x6c\137\x6e\x61\155\145\151\x64\137\x66\157\162\155\141\x74");
    if (!empty($zT)) {
        goto Ib;
    }
    $zT = "\61\x2e\61\x3a\156\x61\x6d\x65\x69\144\55\x66\157\x72\155\141\164\x3a\x75\156\x73\x70\x65\143\151\x66\x69\145\x64";
    Ib:
    if (!empty($zY)) {
        goto gk;
    }
    $zY = $Gp . "\57\x77\160\x2d\x63\157\x6e\164\145\156\x74\x2f\x70\x6c\165\x67\151\x6e\x73\57\x6d\x69\x6e\151\157\x72\141\156\147\145\x2d\163\141\x6d\154\x2d\62\60\55\x73\151\x6e\x67\154\145\x2d\x73\x69\x67\x6e\x2d\x6f\156\57";
    gk:
    $o_ = SAMLSPUtilities::createAuthnRequest($XR, $zY, $So, $cf, $do, $zT);
    if (!($ac == "\144\151\163\x70\x6c\x61\171\123\x41\115\114\x52\x65\161\165\x65\163\x74")) {
        goto gx;
    }
    mo_saml_show_SAML_log(SAMLSPUtilities::createAuthnRequest($XR, $zY, $So, $cf, "\110\124\x54\x50\120\x6f\163\164", $zT), $ac);
    gx:
    $U_ = $So;
    if (strpos($So, "\x3f") !== false) {
        goto ue;
    }
    $U_ .= "\x3f";
    goto ZO;
    ue:
    $U_ .= "\x26";
    ZO:
    cldjkasjdksalc();
    $ac = mo_saml_get_relay_state($ac);
    $ac = empty($ac) ? "\x2f" : $ac;
    if (empty($do) || $do == "\110\164\164\x70\x52\145\x64\x69\162\x65\143\164") {
        goto q4;
    }
    if (!(get_option("\163\141\x6d\154\137\162\x65\161\165\x65\163\164\137\x73\x69\147\x6e\x65\x64") != "\x63\150\145\x63\153\x65\x64")) {
        goto O1;
    }
    $Ji = base64_encode($o_);
    SAMLSPUtilities::postSAMLRequest($So, $Ji, $ac);
    die;
    O1:
    $hw = '';
    $y9 = '';
    $Ji = SAMLSPUtilities::signXML($o_, "\116\141\155\x65\x49\x44\x50\157\154\151\143\171");
    SAMLSPUtilities::postSAMLRequest($So, $Ji, $ac);
    goto IL;
    q4:
    if (!(get_option("\163\x61\155\154\x5f\x72\x65\161\165\145\163\164\x5f\163\151\x67\x6e\x65\144") != "\143\x68\145\x63\x6b\145\144")) {
        goto mV;
    }
    $U_ .= "\123\101\x4d\114\122\145\161\x75\145\163\x74\75" . $o_ . "\x26\122\x65\x6c\x61\171\x53\x74\141\x74\x65\75" . urlencode($ac);
    header("\114\157\x63\x61\x74\x69\157\156\x3a\40" . $U_);
    die;
    mV:
    $o_ = "\x53\101\115\114\122\x65\161\x75\x65\x73\164\75" . $o_ . "\46\122\x65\x6c\141\171\x53\x74\141\164\145\x3d" . urlencode($ac) . "\46\x53\151\147\x41\x6c\x67\x3d" . urlencode(XMLSecurityKey::RSA_SHA256);
    $b3 = array("\x74\x79\x70\x65" => "\x70\x72\x69\166\x61\x74\x65");
    $k3 = new XMLSecurityKey(XMLSecurityKey::RSA_SHA256, $b3);
    $Zb = get_option("\x6d\157\137\x73\141\155\154\x5f\143\x75\162\162\x65\x6e\164\137\x63\x65\x72\x74\137\x70\x72\x69\166\x61\x74\145\x5f\153\x65\171");
    $k3->loadKey($Zb, FALSE);
    $m0 = new XMLSecurityDSig();
    $bn = $k3->signData($o_);
    $bn = base64_encode($bn);
    $U_ .= $o_ . "\46\123\151\147\x6e\141\x74\x75\162\145\x3d" . urlencode($bn);
    header("\x4c\157\143\x61\x74\151\157\156\x3a\x20" . $U_);
    die;
    IL:
    Cj:
    l2:
    if (!(array_key_exists("\x53\x41\115\x4c\x52\145\x73\160\157\x6e\x73\145", $_REQUEST) && !empty($_REQUEST["\x53\101\x4d\x4c\122\145\x73\160\x6f\x6e\163\145"]))) {
        goto V6;
    }
    if (array_key_exists("\122\x65\x6c\141\171\x53\164\141\164\145", $_POST) && !empty($_POST["\122\x65\154\141\171\x53\x74\141\x74\x65"]) && $_POST["\x52\145\154\141\171\x53\x74\x61\164\145"] != "\x2f") {
        goto l9;
    }
    $Ly = '';
    goto k0;
    l9:
    $Ly = $_POST["\x52\145\154\x61\171\123\164\x61\164\x65"];
    k0:
    $Gp = get_option("\x6d\x6f\x5f\163\x61\x6d\x6c\137\x73\x70\x5f\142\141\163\x65\x5f\165\162\x6c");
    if (!empty($Gp)) {
        goto Eo;
    }
    $Gp = home_url();
    Eo:
    $H1 = htmlspecialchars($_REQUEST["\123\101\x4d\114\122\145\x73\x70\157\156\163\x65"]);
    $H1 = base64_decode($H1);
    if (!($Ly == "\144\x69\x73\x70\x6c\141\171\x53\x41\x4d\114\x52\x65\x73\160\157\x6e\x73\145")) {
        goto FG;
    }
    mo_saml_show_SAML_log($H1, $Ly);
    FG:
    if (!(array_key_exists("\123\101\115\114\122\x65\163\x70\157\156\x73\145", $_GET) && !empty($_GET["\x53\101\x4d\x4c\122\x65\x73\x70\157\156\163\145"]))) {
        goto DB;
    }
    $H1 = gzinflate($H1);
    DB:
    $X8 = new DOMDocument();
    $X8->loadXML($H1);
    $II = $X8->firstChild;
    $pf = $X8->documentElement;
    $TB = new DOMXpath($X8);
    $TB->registerNamespace("\x73\x61\155\x6c\160", "\x75\162\x6e\x3a\x6f\141\163\x69\x73\72\156\x61\x6d\145\x73\x3a\x74\x63\x3a\123\101\x4d\114\72\62\56\60\x3a\160\x72\x6f\164\x6f\x63\157\154");
    $TB->registerNamespace("\163\141\155\154", "\x75\x72\x6e\72\x6f\x61\x73\x69\x73\72\x6e\x61\155\145\163\x3a\x74\143\72\123\101\115\x4c\x3a\x32\56\60\72\141\163\163\145\162\x74\x69\x6f\x6e");
    if ($II->localName == "\x4c\x6f\147\x6f\x75\164\x52\145\x73\160\157\x6e\163\145") {
        goto tc;
    }
    $HY = $TB->query("\57\x73\x61\x6d\154\x70\72\122\145\x73\x70\157\156\163\x65\x2f\163\141\x6d\x6c\160\72\x53\164\x61\164\x75\163\x2f\163\141\x6d\x6c\160\x3a\123\164\x61\x74\x75\x73\103\157\144\x65", $pf);
    $W4 = $HY->item(0)->getAttribute("\x56\x61\154\165\145");
    $JF = $TB->query("\x2f\x73\x61\x6d\x6c\x70\x3a\122\x65\x73\160\157\156\x73\145\57\x73\x61\155\154\x70\x3a\123\164\141\164\x75\x73\57\x73\x61\155\x6c\x70\x3a\123\164\141\x74\x75\163\x4d\x65\x73\x73\141\147\x65", $pf)->item(0);
    if (empty($JF)) {
        goto IV;
    }
    $JF = $JF->nodeValue;
    IV:
    $uU = explode("\x3a", $W4);
    $HY = $uU[7];
    if (array_key_exists("\x52\145\154\x61\171\123\164\141\x74\145", $_POST) && !empty($_POST["\122\x65\154\x61\171\123\164\x61\164\x65"]) && $_POST["\x52\x65\x6c\x61\x79\x53\164\x61\x74\145"] != "\57") {
        goto yd;
    }
    $Ly = '';
    goto zX;
    yd:
    $Ly = $_POST["\122\145\x6c\141\171\x53\164\141\x74\x65"];
    zX:
    if (!($HY != "\123\x75\143\x63\145\163\163")) {
        goto sG;
    }
    show_status_error($HY, $Ly, $JF);
    sG:
    $aE = maybe_unserialize(get_option("\x73\x61\x6d\154\137\170\65\60\71\137\x63\145\x72\x74\151\146\151\x63\141\164\x65"));
    $XR = $Gp . "\x2f";
    update_option("\155\157\137\163\141\155\154\x5f\162\x65\163\x70\x6f\156\x73\145", base64_encode($H1));
    $H1 = new SAML2SPResponse($II);
    $OS = $H1->getSignatureData();
    $U2 = current($H1->getAssertions())->getSignatureData();
    if (!(empty($U2) && empty($OS))) {
        goto Uz;
    }
    if ($Ly == "\164\x65\x73\164\x56\x61\154\x69\144\x61\164\145") {
        goto wf;
    }
    wp_die("\127\x65\40\x63\x6f\165\x6c\144\x20\x6e\157\x74\x20\163\x69\147\x6e\x20\171\157\x75\x20\151\156\56\x20\x50\x6c\x65\x61\x73\145\40\143\157\156\164\x61\143\x74\40\x61\144\x6d\151\156\x69\163\164\x72\x61\x74\x6f\x72", "\105\x72\x72\x6f\x72\x3a\40\111\x6e\x76\141\154\x69\144\40\x53\101\115\114\x20\122\x65\163\160\x6f\x6e\163\x65");
    goto AS1;
    wf:
    $Mc = mo_options_error_constants::Error_no_certificate;
    $g_ = mo_options_error_constants::Cause_no_certificate;
    echo "\x3c\144\151\166\x20\x73\x74\x79\154\145\x3d\x22\146\x6f\x6e\164\x2d\x66\x61\x6d\x69\x6c\171\x3a\103\141\154\151\x62\162\151\73\x70\141\144\x64\151\156\x67\72\x30\40\x33\45\x3b\42\x3e\xa\11\x9\11\11\74\144\151\166\40\163\x74\x79\154\x65\75\x22\143\x6f\154\x6f\162\x3a\x20\43\x61\71\x34\64\x34\62\x3b\x62\x61\x63\x6b\147\x72\157\165\156\x64\55\143\x6f\x6c\x6f\162\x3a\40\43\146\x32\144\x65\144\145\73\160\x61\144\144\151\x6e\x67\x3a\40\x31\65\x70\170\x3b\x6d\x61\162\x67\x69\x6e\x2d\142\x6f\164\164\157\x6d\72\40\62\60\x70\x78\73\164\x65\x78\164\x2d\x61\x6c\151\147\156\72\x63\x65\156\164\145\162\73\142\157\x72\144\145\x72\72\61\160\170\40\x73\157\154\151\x64\x20\x23\105\x36\102\x33\x42\x32\73\146\x6f\156\x74\55\163\151\x7a\x65\x3a\x31\70\x70\164\73\x22\76\40\x45\x52\x52\x4f\122\x3c\x2f\144\151\x76\76\xa\x9\11\x9\x9\74\x64\x69\166\40\x73\x74\171\x6c\x65\75\42\x63\157\x6c\x6f\x72\72\x20\43\141\x39\x34\x34\x34\x32\73\146\x6f\x6e\x74\55\x73\x69\172\145\72\61\x34\x70\164\73\x20\x6d\141\162\147\151\x6e\55\142\157\164\164\x6f\x6d\72\62\60\160\170\x3b\42\76\x3c\x70\x3e\x3c\x73\164\x72\157\x6e\x67\x3e\x45\x72\x72\x6f\x72\40\x20\72" . $Mc . "\x20\x3c\57\163\164\x72\x6f\156\x67\76\x3c\x2f\160\x3e\xa\x9\x9\x9\11\xa\11\11\x9\11\x3c\x70\x3e\74\163\164\162\157\156\147\76\120\x6f\163\163\x69\x62\154\x65\40\x43\x61\x75\163\x65\x3a\40" . $g_ . "\74\57\x73\164\162\157\156\147\x3e\x3c\x2f\160\76\12\x9\11\x9\x9\xa\x9\11\x9\11\74\57\144\x69\x76\x3e\x3c\x2f\144\x69\x76\76";
    mo_saml_download_logs($Mc, $g_);
    die;
    AS1:
    Uz:
    $X1 = '';
    if (is_array($aE)) {
        goto En;
    }
    $Rd = XMLSecurityKey::getRawThumbprint($aE);
    $Rd = mo_saml_convert_to_windows_iconv($Rd);
    $Rd = preg_replace("\57\134\163\53\x2f", '', $Rd);
    if (empty($OS)) {
        goto By;
    }
    $X1 = SAMLSPUtilities::processResponse($XR, $Rd, $OS, $H1, 0, $Ly);
    By:
    if (empty($U2)) {
        goto nb;
    }
    $X1 = SAMLSPUtilities::processResponse($XR, $Rd, $U2, $H1, 0, $Ly);
    nb:
    goto Tt;
    En:
    foreach ($aE as $k3 => $zw) {
        $Rd = XMLSecurityKey::getRawThumbprint($zw);
        $Rd = mo_saml_convert_to_windows_iconv($Rd);
        $Rd = preg_replace("\x2f\134\x73\53\x2f", '', $Rd);
        if (empty($OS)) {
            goto en;
        }
        $X1 = SAMLSPUtilities::processResponse($XR, $Rd, $OS, $H1, $k3, $Ly);
        en:
        if (empty($U2)) {
            goto Xw;
        }
        $X1 = SAMLSPUtilities::processResponse($XR, $Rd, $U2, $H1, $k3, $Ly);
        Xw:
        if (!$X1) {
            goto cy;
        }
        goto bg;
        cy:
        yZ:
    }
    bg:
    Tt:
    if ($OS) {
        goto qq;
    }
    if ($U2) {
        goto ZE;
    }
    goto K0;
    qq:
    $mV = $OS["\x43\x65\x72\x74\151\146\151\x63\141\164\x65\163"][0];
    goto K0;
    ZE:
    $mV = $U2["\x43\145\x72\x74\151\146\x69\143\x61\164\x65\163"][0];
    K0:
    if ($X1) {
        goto Du;
    }
    if ($Ly == "\x74\x65\163\x74\126\x61\x6c\151\x64\141\x74\145") {
        goto cF;
    }
    wp_die("\x57\x65\x20\x63\x6f\x75\154\144\x20\x6e\157\x74\x20\x73\x69\x67\156\40\x79\157\165\x20\151\x6e\56\x20\120\154\145\141\163\x65\40\x63\x6f\156\x74\141\143\x74\x20\171\x6f\x75\162\x20\x61\x64\155\x69\156\151\x73\164\x72\141\164\157\162", "\x45\x72\x72\x6f\x72\x3a\x20\111\156\166\x61\x6c\x69\144\40\x53\101\115\x4c\x20\x52\x65\x73\x70\x6f\x6e\163\x65");
    goto oZ;
    cF:
    $Mc = mo_options_error_constants::Error_wrong_certificate;
    $g_ = mo_options_error_constants::Cause_wrong_certificate;
    $xa = "\x2d\55\x2d\55\55\102\x45\107\111\x4e\40\x43\105\122\124\111\106\x49\103\x41\124\105\x2d\55\55\x2d\x2d\x3c\x62\162\76" . chunk_split($mV, 64) . "\74\142\x72\76\x2d\55\55\55\x2d\x45\116\104\x20\x43\x45\122\124\x49\106\x49\103\101\124\x45\55\x2d\55\x2d\x2d";
    echo "\74\144\151\166\x20\163\x74\x79\154\x65\75\42\x66\x6f\156\164\55\x66\x61\x6d\x69\x6c\171\72\103\x61\154\151\142\162\x69\x3b\x70\x61\144\x64\x69\156\147\72\x30\x20\63\x25\x3b\x22\76";
    echo "\x3c\144\151\166\40\163\x74\x79\x6c\145\x3d\42\x63\x6f\x6c\x6f\162\72\x20\43\x61\x39\64\x34\x34\x32\x3b\x62\141\143\153\147\x72\157\x75\x6e\x64\x2d\143\x6f\154\157\x72\x3a\40\43\146\x32\x64\x65\144\x65\x3b\x70\x61\144\x64\151\156\x67\72\x20\61\65\x70\x78\73\x6d\141\x72\147\x69\156\55\x62\157\164\x74\x6f\155\x3a\x20\x32\60\160\170\x3b\x74\x65\x78\x74\55\x61\154\x69\147\156\x3a\143\145\156\164\145\x72\73\142\x6f\162\x64\145\162\72\x31\160\170\x20\163\157\154\151\x64\x20\x23\105\x36\102\63\102\62\73\146\x6f\x6e\164\x2d\x73\x69\x7a\145\72\61\x38\x70\164\x3b\42\76\40\x45\122\x52\x4f\122\x3c\x2f\x64\x69\166\x3e\xa\x9\11\x9\74\144\x69\x76\40\163\x74\x79\154\x65\75\42\x63\157\154\x6f\x72\x3a\x20\43\141\71\x34\x34\64\62\x3b\x66\157\156\x74\55\x73\151\x7a\145\x3a\x31\64\x70\x74\73\x20\x6d\141\162\147\151\156\55\x62\157\x74\x74\157\x6d\x3a\62\x30\160\x78\x3b\x22\x3e\x3c\x70\76\x3c\163\164\x72\157\156\147\x3e\105\162\x72\x6f\x72\x3a\40\x3c\57\163\164\162\x6f\156\x67\x3e\x55\156\x61\x62\x6c\x65\40\x74\x6f\x20\146\151\x6e\x64\x20\141\40\x63\145\162\x74\151\146\x69\143\141\164\145\40\155\x61\164\x63\150\151\156\147\40\164\150\x65\x20\x63\157\156\x66\x69\x67\x75\162\145\144\x20\146\x69\x6e\x67\145\x72\x70\162\151\x6e\164\x2e\x3c\57\x70\x3e\xa\11\11\x9\x3c\160\76\120\154\x65\141\163\145\40\x63\157\156\164\x61\143\164\40\x79\x6f\165\162\40\x61\x64\155\151\156\151\163\x74\x72\141\x74\157\x72\x20\x61\x6e\144\40\162\145\160\157\x72\164\x20\164\x68\x65\x20\146\157\x6c\x6c\157\x77\151\156\147\x20\145\x72\162\x6f\162\x3a\x3c\x2f\x70\x3e\xa\x9\11\11\x3c\160\x3e\x3c\163\164\x72\x6f\x6e\147\76\x50\x6f\x73\163\x69\142\154\x65\x20\x43\x61\165\x73\145\72\40\x3c\57\x73\x74\162\x6f\156\x67\x3e\47\130\56\65\60\x39\40\103\145\x72\164\x69\146\x69\143\x61\164\x65\47\40\x66\x69\x65\x6c\144\40\151\156\40\160\x6c\165\x67\151\156\40\144\x6f\145\x73\x20\x6e\157\164\40\155\141\164\x63\x68\40\164\x68\x65\x20\x63\x65\162\164\151\146\151\x63\141\164\x65\x20\146\x6f\x75\x6e\144\40\x69\156\x20\x53\101\x4d\x4c\40\122\145\163\x70\x6f\156\163\145\56\x3c\x2f\160\x3e\12\11\11\11\x3c\x70\x3e\74\163\x74\x72\x6f\156\x67\x3e\103\x65\x72\164\x69\x66\151\x63\141\164\145\x20\146\x6f\165\x6e\x64\40\x69\x6e\x20\x53\x41\x4d\114\40\x52\x65\163\x70\157\x6e\163\x65\x3a\x20\x3c\x2f\x73\x74\162\x6f\x6e\x67\x3e\74\146\x6f\x6e\x74\40\146\141\143\x65\75\42\x43\157\165\x72\x69\145\x72\40\x4e\145\167\42\x3b\146\x6f\156\x74\x2d\163\x69\x7a\145\72\x31\x30\x70\x74\76\x3c\x62\x72\x3e\74\x62\x72\x3e" . $xa . "\74\x2f\x70\x3e\74\x2f\x66\157\x6e\x74\76\12\11\x9\x9\x3c\x70\76\74\163\x74\162\x6f\156\147\x3e\x53\x6f\x6c\165\x74\151\x6f\x6e\x3a\x20\74\57\163\x74\x72\157\x6e\x67\x3e\74\57\x70\x3e\12\11\11\x9\40\x3c\x6f\154\x3e\xa\x20\x20\40\x20\x20\40\x20\x20\40\40\40\40\x20\40\40\x20\74\x6c\151\x3e\x43\157\x70\x79\x20\160\x61\x73\164\x65\40\164\150\145\x20\x63\x65\162\164\x69\146\x69\x63\141\x74\145\x20\160\x72\x6f\x76\151\x64\145\144\40\x61\x62\157\166\145\x20\x69\x6e\x20\130\x35\x30\71\x20\103\x65\162\164\151\x66\x69\x63\141\x74\145\40\165\156\x64\145\x72\40\x53\x65\x72\x76\x69\143\145\40\x50\162\157\166\x69\x64\145\x72\40\123\x65\164\x75\x70\x20\164\x61\x62\56\74\57\x6c\x69\76\xa\x20\x20\x20\x20\x20\40\x20\x20\40\40\40\x20\x20\x20\x20\40\x3c\154\151\76\x49\146\40\151\x73\x73\165\x65\40\x70\145\x72\x73\151\x73\x74\x73\x20\x64\151\x73\141\142\154\x65\40\74\142\x3e\x43\150\x61\x72\x61\143\x74\145\x72\40\x65\156\x63\157\x64\x69\x6e\x67\74\57\x62\76\40\x75\156\x64\145\x72\40\x53\x65\x72\166\x69\143\145\40\x50\162\x6f\166\x64\145\162\40\123\x65\164\x75\160\40\164\x61\142\56\x3c\x2f\x6c\151\x3e\12\x20\40\x20\x20\40\40\x20\40\40\40\40\40\40\74\57\157\154\x3e\x9\x9\xa\x9\11\11\x3c\x2f\144\151\x76\76\xa\11\11\11\11\11\74\144\x69\166\40\x73\164\x79\x6c\x65\75\x22\155\141\162\147\x69\156\x3a\63\x25\x3b\144\151\x73\160\154\x61\171\72\x62\x6c\157\143\153\x3b\164\x65\170\x74\x2d\141\x6c\151\147\156\x3a\143\145\156\164\145\162\73\42\76\12\11\x9\11\x9\11\x3c\x64\x69\166\x20\163\x74\171\x6c\x65\75\42\155\141\162\147\x69\x6e\72\63\x25\73\144\x69\163\x70\x6c\141\x79\72\x62\154\x6f\143\x6b\x3b\164\145\x78\164\x2d\141\154\151\x67\x6e\72\x63\145\x6e\164\145\162\x3b\x22\76\x3c\x69\156\160\x75\164\x20\163\x74\x79\x6c\x65\x3d\42\160\141\144\x64\x69\156\147\72\x31\x25\x3b\167\151\x64\164\x68\x3a\61\60\x30\x70\x78\73\x62\141\x63\153\x67\x72\157\x75\x6e\144\x3a\40\x23\x30\60\71\x31\x43\104\40\156\157\x6e\145\40\x72\145\160\145\141\x74\40\x73\143\162\157\154\x6c\40\60\x25\x20\60\45\73\x63\165\162\163\x6f\x72\x3a\x20\160\x6f\151\156\164\145\x72\x3b\x66\x6f\156\164\x2d\x73\151\172\x65\72\x31\65\x70\x78\x3b\x62\x6f\x72\144\145\162\x2d\167\x69\x64\164\150\x3a\40\x31\x70\170\x3b\142\157\162\144\145\162\x2d\163\x74\171\x6c\145\x3a\x20\163\x6f\154\x69\144\x3b\x62\x6f\x72\144\145\162\55\x72\141\x64\151\165\x73\x3a\40\63\160\170\x3b\167\x68\151\x74\x65\x2d\163\160\141\143\145\x3a\x20\156\157\x77\x72\141\160\x3b\x62\x6f\170\x2d\x73\151\x7a\151\x6e\147\x3a\40\x62\157\x72\144\145\x72\55\142\157\170\73\x62\x6f\162\x64\145\x72\x2d\143\157\x6c\x6f\x72\72\40\43\60\60\x37\63\x41\101\73\x62\x6f\x78\55\163\x68\x61\144\x6f\x77\72\40\x30\x70\170\40\61\160\x78\40\60\160\170\40\162\x67\142\x61\x28\61\x32\60\54\x20\x32\60\x30\54\x20\x32\x33\60\x2c\40\60\x2e\x36\51\x20\x69\x6e\x73\x65\164\73\143\157\154\157\x72\72\40\x23\106\106\106\73\x22\x74\171\160\145\75\x22\142\x75\x74\164\157\x6e\x22\x20\166\141\154\165\145\x3d\x22\x44\x6f\156\x65\42\40\157\x6e\103\x6c\151\x63\153\x3d\x22\163\145\x6c\x66\56\x63\154\x6f\163\145\50\51\73\x22\76\74\x2f\144\151\x76\76";
    mo_saml_download_logs($Mc, $g_);
    die;
    oZ:
    Du:
    $Z6 = get_option("\163\x61\x6d\x6c\x5f\x69\x73\163\165\x65\162");
    $zY = get_option("\155\x6f\x5f\163\141\155\x6c\137\x73\160\x5f\145\156\164\151\164\x79\137\151\144");
    if (!empty($zY)) {
        goto rp;
    }
    $zY = $Gp . "\57\x77\160\55\x63\157\156\x74\145\156\164\x2f\160\x6c\x75\147\x69\x6e\x73\x2f\x6d\x69\x6e\151\x6f\x72\141\156\147\x65\55\x73\141\155\154\55\62\x30\x2d\163\x69\x6e\147\x6c\145\x2d\163\x69\147\156\x2d\x6f\156\57";
    rp:
    SAMLSPUtilities::validateIssuerAndAudience($H1, $zY, $Z6, $Ly);
    $gN = current(current($H1->getAssertions())->getNameId());
    $Cd = current($H1->getAssertions())->getAttributes();
    $Cd["\116\x61\x6d\145\x49\104"] = array("\x30" => $gN);
    $bP = current($H1->getAssertions())->getSessionIndex();
    mo_saml_checkMapping($Cd, $Ly, $bP);
    goto u0;
    tc:
    if (!isset($_REQUEST["\122\145\154\x61\x79\x53\164\141\164\145"])) {
        goto Ru;
    }
    $yC = $_REQUEST["\122\145\154\141\171\x53\x74\141\164\x65"];
    Ru:
    if (empty(get_option("\155\157\137\x73\141\155\154\x5f\154\157\147\x6f\165\164\137\162\145\x6c\141\171\x5f\163\164\141\x74\x65"))) {
        goto Qk;
    }
    $yC = get_option("\155\157\137\163\141\x6d\x6c\x5f\154\157\x67\x6f\165\x74\137\x72\145\x6c\141\171\x5f\163\164\141\x74\x65");
    Qk:
    wp_logout();
    if (!empty($yC)) {
        goto PR;
    }
    $yC = home_url();
    PR:
    header("\114\x6f\143\141\164\x69\x6f\156\x3a\x20" . $yC);
    die;
    u0:
    V6:
    if (!(array_key_exists("\123\101\x4d\114\122\x65\161\x75\x65\163\x74", $_REQUEST) && !empty($_REQUEST["\123\101\115\114\x52\x65\x71\165\x65\x73\164"]))) {
        goto I8;
    }
    $o_ = htmlspecialchars($_REQUEST["\123\101\115\114\122\145\161\x75\145\163\164"]);
    $Ly = "\57";
    if (!array_key_exists("\122\145\x6c\x61\x79\123\x74\x61\x74\145", $_REQUEST)) {
        goto HK;
    }
    $Ly = $_REQUEST["\122\x65\154\x61\x79\x53\164\x61\164\145"];
    HK:
    $o_ = base64_decode($o_);
    if (!(array_key_exists("\123\101\x4d\114\x52\145\x71\x75\145\x73\164", $_GET) && !empty($_GET["\123\x41\x4d\x4c\122\145\161\165\145\163\164"]))) {
        goto fJ;
    }
    $o_ = gzinflate($o_);
    fJ:
    $X8 = new DOMDocument();
    $X8->loadXML($o_);
    $Sq = $X8->firstChild;
    if (!($Sq->localName == "\114\157\x67\157\x75\164\122\x65\x71\165\x65\163\x74")) {
        goto IS;
    }
    $Xk = new SAML2SPLogoutRequest($Sq);
    if (!(!session_id() || session_id() == '' || !isset($_SESSION))) {
        goto wV;
    }
    session_start();
    wV:
    $_SESSION["\x6d\157\137\163\x61\155\x6c\137\154\157\x67\157\165\x74\137\162\145\161\165\145\x73\164"] = $o_;
    $_SESSION["\x6d\157\x5f\163\141\155\154\x5f\154\157\147\157\165\x74\x5f\162\145\x6c\141\x79\137\163\x74\x61\x74\x65"] = $Ly;
    wp_logout();
    IS:
    I8:
    if (!(isset($_REQUEST["\157\x70\164\151\x6f\x6e"]) and strpos($_REQUEST["\157\x70\164\x69\157\156"], "\x72\145\141\144\x73\141\155\154\x6c\157\147\151\156") !== false)) {
        goto su;
    }
    require_once dirname(__FILE__) . "\x2f\151\156\143\154\x75\x64\x65\x73\57\x6c\151\x62\x2f\145\156\143\x72\171\x70\164\x69\157\156\x2e\x70\150\x70";
    if (isset($_POST["\123\x54\101\124\x55\x53"]) && $_POST["\123\x54\x41\x54\x55\123"] == "\x45\122\x52\117\x52") {
        goto n1;
    }
    if (!(isset($_POST["\123\x54\101\x54\125\x53"]) && $_POST["\123\x54\101\124\x55\x53"] == "\123\125\103\103\x45\x53\123")) {
        goto rl;
    }
    $eT = '';
    if (!(isset($_REQUEST["\x72\145\x64\151\162\x65\143\x74\x5f\164\x6f"]) && !empty($_REQUEST["\x72\145\144\151\x72\x65\143\164\x5f\x74\x6f"]) && $_REQUEST["\x72\x65\x64\151\x72\145\143\x74\137\x74\157"] != "\x2f")) {
        goto bv;
    }
    $eT = htmlspecialchars($_REQUEST["\x72\x65\144\151\x72\145\x63\x74\137\164\x6f"]);
    bv:
    delete_option("\155\x6f\137\163\x61\155\x6c\x5f\x72\x65\x64\x69\162\x65\143\164\137\145\162\x72\157\x72\x5f\x63\x6f\x64\145");
    delete_option("\155\x6f\137\163\141\155\154\137\162\x65\144\x69\162\x65\143\x74\x5f\x65\162\162\157\x72\x5f\162\x65\x61\163\x6f\156");
    try {
        $Rl = get_option("\x73\141\x6d\154\x5f\x61\x6d\137\x65\x6d\141\151\154");
        $YC = get_option("\163\141\x6d\154\x5f\141\155\137\x75\163\145\x72\156\141\x6d\x65");
        $pY = get_option("\x73\141\x6d\154\x5f\141\155\137\x66\151\x72\x73\164\137\x6e\141\x6d\145");
        $Gu = get_option("\x73\x61\x6d\154\137\141\x6d\137\x6c\141\x73\164\137\156\x61\x6d\x65");
        $tp = get_option("\x73\141\155\x6c\137\141\155\137\147\162\x6f\165\160\137\x6e\141\155\145");
        $NU = get_option("\x73\x61\x6d\154\137\x61\155\137\144\145\x66\141\165\154\x74\137\165\x73\x65\x72\137\x72\x6f\154\x65");
        $wx = get_option("\x73\x61\x6d\x6c\137\141\155\137\144\157\x6e\x74\x5f\x61\154\154\x6f\x77\137\165\156\154\151\x73\164\145\144\137\165\x73\145\162\x5f\x72\157\x6c\145");
        $oe = get_option("\x73\x61\x6d\x6c\137\x61\x6d\137\x61\143\143\x6f\165\x6e\164\137\155\x61\x74\143\x68\x65\162");
        $Ct = '';
        $Q8 = '';
        $pY = str_replace("\x2e", "\x5f", $pY);
        $pY = str_replace("\x20", "\x5f", $pY);
        if (!(!empty($pY) && array_key_exists($pY, $_POST))) {
            goto wv;
        }
        $pY = htmlspecialchars($_POST[$pY]);
        wv:
        $Gu = str_replace("\x2e", "\137", $Gu);
        $Gu = str_replace("\40", "\137", $Gu);
        if (!(!empty($Gu) && array_key_exists($Gu, $_POST))) {
            goto OS;
        }
        $Gu = htmlspecialchars($_POST[$Gu]);
        OS:
        $YC = str_replace("\56", "\137", $YC);
        $YC = str_replace("\x20", "\137", $YC);
        if (!empty($YC) && array_key_exists($YC, $_POST)) {
            goto Cq;
        }
        $Q8 = htmlspecialchars($_POST["\x4e\x61\155\x65\111\x44"]);
        goto fk;
        Cq:
        $Q8 = htmlspecialchars($_POST[$YC]);
        fk:
        $Ct = str_replace("\x2e", "\137", $Rl);
        $Ct = str_replace("\x20", "\x5f", $Rl);
        if (!empty($Rl) && array_key_exists($Rl, $_POST)) {
            goto Fv;
        }
        $Ct = htmlspecialchars($_POST["\x4e\141\155\x65\x49\x44"]);
        goto jf;
        Fv:
        $Ct = htmlspecialchars($_POST[$Rl]);
        jf:
        $tp = str_replace("\x2e", "\137", $tp);
        $tp = str_replace("\x20", "\137", $tp);
        if (!(!empty($tp) && array_key_exists($tp, $_POST))) {
            goto xZ;
        }
        $tp = htmlspecialchars($_POST[$tp]);
        xZ:
        if (!empty($oe)) {
            goto E8;
        }
        $oe = "\145\x6d\141\x69\x6c";
        E8:
        $k3 = get_option("\x6d\157\137\163\x61\x6d\154\137\143\165\163\x74\157\155\145\x72\137\164\x6f\x6b\x65\156");
        if (!(isset($k3) || trim($k3) != '')) {
            goto hm;
        }
        $DN = AESEncryption::decrypt_data($Ct, $k3);
        $Ct = $DN;
        hm:
        if (!(!empty($pY) && !empty($k3))) {
            goto Hp;
        }
        $Wq = AESEncryption::decrypt_data($pY, $k3);
        $pY = $Wq;
        Hp:
        if (!(!empty($Gu) && !empty($k3))) {
            goto Oe;
        }
        $t1 = AESEncryption::decrypt_data($Gu, $k3);
        $Gu = $t1;
        Oe:
        if (!(!empty($Q8) && !empty($k3))) {
            goto fNb;
        }
        $tA = AESEncryption::decrypt_data($Q8, $k3);
        $Q8 = $tA;
        fNb:
        if (!(!empty($tp) && !empty($k3))) {
            goto fx;
        }
        $jW = AESEncryption::decrypt_data($tp, $k3);
        $tp = $jW;
        fx:
    } catch (Exception $sL) {
        echo sprintf("\x41\x6e\40\x65\x72\x72\x6f\162\x20\157\143\143\165\162\162\145\144\x20\167\150\151\154\145\40\x70\x72\157\143\145\x73\163\x69\x6e\147\x20\x74\x68\145\40\x53\x41\x4d\114\x20\x52\145\163\160\157\156\x73\145\x2e");
        die;
    }
    $Wo = array($tp);
    mo_saml_login_user($Ct, $pY, $Gu, $Q8, $Wo, $wx, $NU, $eT, $oe);
    rl:
    goto gv;
    n1:
    update_option("\x6d\157\x5f\163\141\155\154\x5f\x72\145\x64\151\x72\145\x63\x74\137\145\162\162\x6f\x72\137\x63\x6f\144\145", htmlspecialchars($_POST["\105\122\x52\117\x52\x5f\x52\x45\x41\123\117\116"]));
    update_option("\x6d\157\137\x73\141\155\x6c\137\162\x65\144\151\162\x65\x63\x74\x5f\145\x72\x72\157\x72\137\x72\145\x61\x73\x6f\156", htmlspecialchars($_POST["\105\x52\x52\x4f\122\137\115\105\123\123\x41\107\105"]));
    gv:
    su:
    Bv:
}
function cldjkasjdksalc()
{
    $ho = plugin_dir_path(__FILE__);
    $vo = wp_upload_dir();
    $IC = home_url();
    $IC = trim($IC, "\x2f");
    if (preg_match("\43\136\x68\164\x74\160\50\163\x29\x3f\72\x2f\57\x23", $IC)) {
        goto uK;
    }
    $IC = "\x68\164\164\x70\72\x2f\x2f" . $IC;
    uK:
    $rV = parse_url($IC);
    $ef = preg_replace("\57\136\x77\167\167\x5c\56\57", '', $rV["\150\157\163\x74"]);
    $iT = $ef . "\x2d" . $vo["\142\x61\x73\x65\144\151\162"];
    $bv = hash_hmac("\163\x68\x61\x32\x35\x36", $iT, "\64\104\110\x66\152\x67\x66\152\141\163\156\x64\146\163\x61\x6a\146\x48\x47\112");
    if (is_writable($ho . "\x6c\151\x63\x65\156\163\x65")) {
        goto fa;
    }
    $cJ = base64_decode("\x62\107\x4e\153\141\155\x74\150\143\62\x70\x6b\141\x33\x4e\150\131\62\x77\75");
    $eU = get_option($cJ);
    if (empty($eU)) {
        goto tt;
    }
    $m6 = str_rot13($eU);
    tt:
    goto kE;
    fa:
    $eU = file_get_contents($ho . "\x6c\151\x63\x65\156\x73\145");
    if (!$eU) {
        goto VQ;
    }
    $m6 = base64_encode($eU);
    VQ:
    kE:
    if (!empty($eU)) {
        goto Pq;
    }
    $Bs = base64_decode("\124\107\x6c\x6a\132\127\x35\x7a\132\x53\x42\x47\141\127\170\x6c\111\x47\61\x70\x63\63\x4e\x70\x62\155\x63\x67\x5a\x6e\112\x76\x62\123\102\60\141\x47\x55\x67\x63\x47\x78\x31\132\62\x6c\x75\114\x67\75\x3d");
    wp_die($Bs);
    Pq:
    if (strpos($m6, $bv) !== false) {
        goto cl;
    }
    $lF = new Customersaml();
    $k3 = get_option("\x6d\x6f\x5f\163\141\155\x6c\137\x63\165\163\164\x6f\155\x65\162\x5f\164\157\x6b\145\x6e");
    $oZ = AESEncryption::decrypt_data(get_option("\x73\x6d\154\x5f\154\x6b"), $k3);
    $C2 = $lF->mo_saml_vl($oZ, false);
    if ($C2) {
        goto Dd;
    }
    return;
    Dd:
    $C2 = json_decode($C2, true);
    if (strcasecmp($C2["\163\x74\141\x74\165\163"], "\x53\x55\103\103\105\x53\123") == 0) {
        goto kC;
    }
    $PD = base64_decode("\x53\x57\x35\x32\131\127\x78\160\132\103\x42\x4d\141\127\x4e\x6c\x62\156\x4e\x6c\x49\105\x5a\x76\x64\127\65\153\x4c\x69\x42\x51\x62\107\x56\150\143\x32\125\147\x59\x32\71\165\x64\107\106\152\144\x43\102\x35\x62\63\126\171\111\107\x46\153\x62\127\x6c\165\x61\x58\116\x30\x63\x6d\106\60\142\63\x49\x67\x64\x47\70\147\144\130\116\154\x49\110\122\x6f\132\x53\102\x6a\x62\x33\112\171\132\127\116\60\111\107\x78\160\131\x32\126\x75\x63\62\x55\165\111\105\x5a\166\143\151\102\164\x62\63\x4a\154\x49\x47\x52\x6c\x64\x47\106\x70\x62\x48\115\x73\x49\x48\x42\x79\142\63\x5a\160\x5a\x47\125\x67\144\x47\150\154\111\106\112\154\132\155\x56\171\x5a\x57\x35\x6a\x5a\123\x42\x4a\x52\x44\157\x67\x54\125\x38\x79\x4e\x44\x49\x34\115\124\101\171\x4d\124\143\x77\x4e\123\x42\x30\x62\171\x42\65\x62\x33\126\x79\x49\107\x46\153\x62\x57\x6c\165\141\x58\116\60\x63\x6d\106\x30\x62\63\111\147\144\x47\70\147\x59\x32\x68\x6c\131\x32\x73\147\141\x58\121\x67\x64\x57\65\x6b\132\x58\111\x67\123\x47\x56\163\143\x43\101\155\x49\x45\132\102\125\123\x42\x30\131\127\x49\x67\x61\x57\64\147\x64\x47\150\154\x49\110\102\163\144\x57\x64\160\x62\x69\64\75");
    $PD = str_replace("\x48\145\x6c\x70\x20\46\40\106\x41\x51\x20\164\x61\x62\x20\151\x6e", "\106\x41\x51\x73\x20\x73\145\x63\164\x69\x6f\x6e\40\157\146", $PD);
    $hN = base64_decode("\x52\130\x4a\x79\x62\63\x49\x36\111\x45\154\165\144\155\x46\163\x61\127\x51\x67\x54\x47\x6c\152\132\127\x35\172\132\x51\x3d\75");
    wp_die($PD, $hN);
    goto Vi;
    kC:
    $ho = plugin_dir_path(__FILE__);
    $IC = home_url();
    $IC = trim($IC, "\x2f");
    if (preg_match("\x23\136\150\x74\164\x70\x28\163\x29\x3f\x3a\57\57\43", $IC)) {
        goto Ox;
    }
    $IC = "\x68\164\x74\x70\x3a\57\57" . $IC;
    Ox:
    $rV = parse_url($IC);
    $ef = preg_replace("\x2f\x5e\167\167\x77\x5c\x2e\57", '', $rV["\150\x6f\163\x74"]);
    $vo = wp_upload_dir();
    $iT = $ef . "\x2d" . $vo["\142\141\163\x65\144\x69\x72"];
    $bv = hash_hmac("\163\x68\x61\62\x35\x36", $iT, "\64\x44\110\146\152\x67\x66\152\141\163\156\144\146\x73\x61\152\x66\x48\107\x4a");
    $LE = djkasjdksa();
    $f1 = round(strlen($LE) / rand(2, 20));
    $LE = substr_replace($LE, $bv, $f1, 0);
    $Ax = base64_decode($LE);
    if (is_writable($ho . "\154\x69\x63\145\x6e\x73\x65")) {
        goto mb;
    }
    $LE = str_rot13($LE);
    $cJ = base64_decode("\142\x47\x4e\x6b\141\155\164\x68\143\x32\160\x6b\x61\63\x4e\x68\131\x32\167\75");
    update_option($cJ, $LE);
    goto th;
    mb:
    file_put_contents($ho . "\x6c\151\143\x65\x6e\x73\x65", $Ax);
    th:
    return true;
    Vi:
    goto Vp;
    cl:
    return true;
    Vp:
}
function djkasjdksa()
{
    $lv = "\x21\x7e\100\x23\44\x25\136\46\x2a\50\51\x5f\53\x7c\173\x7d\x3c\76\77\60\x31\62\63\64\x35\x36\67\70\x39\141\x62\x63\x64\x65\x66\147\150\x69\152\x6b\154\155\156\x6f\160\161\162\163\164\x75\x76\167\170\171\172\x41\102\103\x44\x45\106\107\110\x49\x4a\x4b\114\x4d\116\x4f\120\x51\122\x53\x54\x55\126\x57\130\x59\x5a";
    $E2 = strlen($lv);
    $N6 = '';
    $lp = 0;
    EE:
    if (!($lp < 10000)) {
        goto Fq;
    }
    $N6 .= $lv[rand(0, $E2 - 1)];
    dy:
    $lp++;
    goto EE;
    Fq:
    return $N6;
}
function mo_saml_show_SAML_log($Sq, $ZL)
{
    header("\103\157\156\x74\145\x6e\x74\x2d\124\171\160\x65\72\40\x74\145\170\x74\x2f\150\x74\x6d\154");
    $pf = new DOMDocument();
    $pf->preserveWhiteSpace = false;
    $pf->formatOutput = true;
    $pf->loadXML($Sq);
    if ($ZL == "\x64\151\163\x70\154\141\171\x53\x41\x4d\114\x52\145\x71\x75\x65\x73\x74") {
        goto X5;
    }
    $zZ = "\x53\x41\115\x4c\40\x52\x65\163\x70\x6f\x6e\x73\x65";
    goto mn;
    X5:
    $zZ = "\123\101\x4d\114\x20\122\145\161\165\x65\x73\x74";
    mn:
    $bK = $pf->saveXML();
    $MA = htmlentities($bK);
    $MA = rtrim($MA);
    $Ip = simplexml_load_string($bK);
    $vm = json_encode($Ip);
    $zN = json_decode($vm);
    $WO = plugins_url("\x69\x6e\143\x6c\x75\144\145\163\x2f\143\x73\x73\57\163\x74\x79\x6c\145\x5f\x73\145\x74\164\x69\x6e\x67\x73\56\143\x73\163\x3f\x76\x65\162\x3d\x34\x2e\70\x2e\x34\x30", __FILE__);
    echo "\x3c\x6c\151\x6e\153\x20\162\145\x6c\75\47\163\x74\x79\x6c\x65\163\150\x65\145\x74\47\40\151\x64\x3d\x27\x6d\157\137\x73\141\x6d\x6c\137\x61\144\x6d\151\156\137\163\145\164\x74\x69\156\147\x73\x5f\163\164\x79\154\x65\x2d\x63\x73\x73\x27\x20\x20\x68\162\145\146\75\x27" . $WO . "\x27\x20\164\x79\160\x65\75\47\x74\x65\170\164\x2f\x63\x73\163\x27\40\x6d\145\x64\151\141\75\x27\141\154\x6c\x27\40\x2f\76\xa\40\x20\40\x20\x20\x20\x20\x20\x20\40\x20\40\xa\11\11\x9\74\x64\x69\166\x20\143\x6c\x61\163\163\x3d\42\155\157\55\x64\x69\x73\x70\x6c\141\x79\x2d\154\157\x67\163\42\40\x3e\x3c\x70\x20\164\x79\160\145\x3d\42\164\145\x78\x74\42\40\x20\x20\x69\x64\75\x22\123\101\115\x4c\x5f\x74\171\160\145\x22\x3e" . $zZ . "\x3c\x2f\160\x3e\74\57\x64\x69\166\76\12\11\11\11\11\xa\x9\x9\x9\74\144\151\166\x20\164\x79\x70\145\x3d\42\x74\x65\170\164\x22\40\x69\144\75\42\123\101\x4d\114\x5f\144\x69\x73\160\154\x61\x79\42\40\143\154\141\x73\x73\x3d\42\155\157\x2d\144\151\x73\x70\154\x61\171\x2d\142\x6c\157\143\153\x22\x3e\x3c\160\x72\x65\x20\143\x6c\141\163\163\75\47\x62\x72\x75\163\x68\72\40\170\x6d\x6c\x3b\x27\76" . $MA . "\74\57\x70\x72\145\76\x3c\x2f\144\151\x76\76\xa\x9\x9\11\74\x62\162\76\xa\x9\11\11\x3c\144\x69\166\11\x20\x73\164\x79\154\x65\75\x22\155\141\162\x67\x69\x6e\72\x33\x25\73\144\151\x73\160\154\141\171\72\x62\x6c\157\143\x6b\x3b\x74\145\170\164\x2d\141\x6c\x69\147\x6e\72\143\145\x6e\x74\145\x72\x3b\x22\76\12\40\40\40\40\x20\x20\x20\x20\x20\x20\40\x20\xa\11\11\11\x3c\144\x69\166\x20\163\x74\171\x6c\145\x3d\x22\x6d\x61\162\147\151\x6e\72\x33\x25\73\144\151\x73\160\154\141\171\x3a\x62\154\157\143\x6b\x3b\164\145\x78\164\x2d\x61\154\151\147\156\x3a\x63\145\156\x74\145\x72\73\x22\x20\x3e\xa\x9\xa\40\x20\40\40\40\40\40\40\x20\x20\40\40\74\57\144\x69\x76\x3e\12\x9\x9\x9\x3c\142\165\164\x74\157\156\40\151\144\x3d\42\143\x6f\160\x79\x22\x20\157\156\143\x6c\x69\143\153\x3d\42\143\x6f\160\x79\x44\151\x76\124\157\x43\154\x69\x70\x62\157\x61\162\144\50\x29\x22\40\x20\x73\164\171\x6c\145\75\42\x70\x61\x64\x64\151\156\147\x3a\x31\45\x3b\167\x69\144\x74\150\x3a\x31\x30\x30\160\170\x3b\142\x61\143\x6b\147\x72\157\x75\156\144\72\x20\x23\60\60\71\61\103\x44\x20\x6e\157\156\x65\40\162\x65\160\145\141\164\x20\x73\x63\162\157\x6c\x6c\40\x30\x25\40\x30\45\73\x63\165\x72\x73\157\162\x3a\40\x70\157\151\x6e\x74\145\x72\73\146\157\156\x74\55\163\151\172\x65\x3a\x31\x35\x70\x78\73\142\157\x72\144\145\x72\55\x77\x69\144\x74\x68\x3a\40\61\160\170\73\142\x6f\x72\x64\x65\x72\x2d\x73\164\x79\154\145\72\40\163\x6f\x6c\151\144\x3b\142\157\162\x64\x65\x72\55\162\x61\144\151\x75\163\x3a\40\63\x70\170\73\167\150\x69\164\x65\55\x73\x70\141\x63\x65\x3a\40\x6e\x6f\x77\162\x61\x70\x3b\142\x6f\x78\55\163\151\172\x69\156\x67\x3a\40\x62\x6f\162\x64\x65\162\x2d\x62\157\x78\x3b\142\157\x72\x64\x65\162\x2d\143\x6f\x6c\157\162\x3a\40\x23\60\60\x37\63\x41\101\73\x62\x6f\x78\55\x73\x68\141\144\157\167\x3a\x20\x30\160\170\x20\x31\x70\170\x20\x30\x70\170\x20\162\x67\x62\x61\x28\61\62\60\x2c\x20\62\60\x30\x2c\x20\62\x33\x30\54\40\x30\x2e\66\51\40\151\156\163\x65\x74\x3b\143\157\154\x6f\162\72\40\43\x46\106\106\73\42\40\x3e\x43\x6f\160\171\x3c\57\142\x75\164\164\157\x6e\76\xa\x9\x9\11\x26\156\x62\163\x70\x3b\xa\x20\x20\40\40\x20\40\40\x20\x20\x20\40\x20\40\40\x20\x3c\151\x6e\160\165\x74\40\151\144\x3d\42\144\167\156\55\x62\x74\x6e\42\40\163\x74\x79\154\145\75\x22\160\x61\x64\x64\x69\x6e\147\x3a\61\x25\x3b\167\x69\144\x74\x68\72\61\x30\60\160\x78\73\x62\141\143\153\x67\x72\x6f\x75\x6e\144\x3a\x20\43\60\60\71\x31\103\104\x20\156\157\156\145\x20\162\x65\160\x65\141\x74\40\163\143\162\x6f\154\154\40\x30\45\x20\60\45\73\x63\x75\162\x73\157\162\x3a\40\160\157\151\156\x74\x65\162\x3b\x66\x6f\156\164\x2d\x73\x69\172\x65\72\x31\x35\160\170\x3b\142\157\x72\x64\x65\x72\x2d\167\151\x64\x74\150\x3a\40\x31\160\170\73\142\157\x72\x64\x65\162\55\x73\164\x79\x6c\145\72\40\163\157\x6c\x69\x64\x3b\142\x6f\x72\x64\145\x72\x2d\x72\141\x64\x69\165\x73\72\40\x33\160\x78\x3b\x77\150\x69\x74\145\55\163\160\x61\143\145\72\40\x6e\157\167\162\141\160\x3b\x62\x6f\170\x2d\x73\x69\x7a\x69\x6e\147\x3a\x20\x62\157\x72\x64\x65\x72\x2d\142\157\x78\73\142\x6f\x72\144\x65\x72\x2d\x63\x6f\x6c\x6f\x72\72\40\x23\x30\60\67\63\x41\x41\x3b\142\x6f\170\x2d\163\150\x61\144\157\167\72\x20\x30\x70\170\40\61\160\x78\x20\60\x70\x78\x20\x72\147\142\141\50\61\62\60\54\x20\x32\x30\x30\x2c\x20\x32\x33\x30\54\x20\x30\x2e\66\51\x20\151\x6e\x73\x65\164\73\x63\157\154\x6f\x72\72\40\43\106\106\106\x3b\x22\x74\171\160\x65\x3d\42\142\x75\164\164\157\x6e\x22\x20\166\141\154\x75\145\75\42\x44\x6f\167\156\x6c\157\141\144\42\40\xa\40\x20\40\x20\x20\x20\x20\x20\40\40\40\x20\x20\40\x20\x22\x3e\xa\11\x9\x9\74\57\144\151\x76\x3e\12\11\x9\11\x3c\57\144\x69\166\76\12\x9\x9\11\12\x9\11\xa\11\11\x9";
    ob_end_flush();
    ?>

	<script>

        function copyDivToClipboard() {
            var aux = document.createElement("input");
            aux.setAttribute("value", document.getElementById("SAML_display").textContent);
            document.body.appendChild(aux);
            aux.select();
            document.execCommand("copy");
            document.body.removeChild(aux);
            document.getElementById('copy').textContent = "Copied";
            document.getElementById('copy').style.background = "grey";
            window.getSelection().selectAllChildren( document.getElementById( "SAML_display" ) );

        }

        function download(filename, text) {
            var element = document.createElement('a');
            element.setAttribute('href', 'data:Application/octet-stream;charset=utf-8,' + encodeURIComponent(text));
            element.setAttribute('download', filename);

            element.style.display = 'none';
            document.body.appendChild(element);

            element.click();

            document.body.removeChild(element);
        }

        document.getElementById("dwn-btn").addEventListener("click", function () {

            var filename = document.getElementById("SAML_type").textContent+".xml";
            var node = document.getElementById("SAML_display");
            htmlContent = node.innerHTML;
            text = node.textContent;
            console.log(text);
            download(filename, text);
        }, false);





    </script>
<?php 
    die;
}
function mo_saml_checkMapping($Cd, $Ly, $bP)
{
    try {
        $Rl = get_option("\163\x61\x6d\x6c\137\141\x6d\137\x65\x6d\141\x69\x6c");
        $YC = get_option("\x73\x61\x6d\154\x5f\x61\x6d\137\165\163\x65\x72\156\x61\155\x65");
        $pY = get_option("\x73\x61\x6d\x6c\x5f\x61\x6d\x5f\146\151\x72\x73\164\137\x6e\141\155\145");
        $Gu = get_option("\x73\141\x6d\154\x5f\x61\x6d\x5f\x6c\141\163\164\137\x6e\x61\155\x65");
        $tp = get_option("\163\141\x6d\x6c\x5f\141\155\137\147\162\x6f\x75\x70\x5f\156\x61\x6d\145");
        $NU = get_option("\163\141\155\154\x5f\x61\x6d\x5f\x64\145\146\141\x75\x6c\164\x5f\x75\x73\145\x72\137\162\157\154\145");
        $wx = get_option("\x73\141\155\x6c\137\141\155\137\x64\157\156\164\x5f\x61\x6c\x6c\x6f\x77\137\165\x6e\x6c\151\x73\164\x65\x64\x5f\165\x73\x65\162\137\162\157\x6c\145");
        $oe = get_option("\163\x61\155\x6c\x5f\141\x6d\137\141\x63\143\157\x75\156\164\x5f\155\141\164\x63\150\x65\x72");
        $Ct = '';
        $Q8 = '';
        if (empty($Cd)) {
            goto rG;
        }
        if (!empty($pY) && array_key_exists($pY, $Cd)) {
            goto o9;
        }
        $pY = '';
        goto ds;
        o9:
        $pY = $Cd[$pY][0];
        ds:
        if (!empty($Gu) && array_key_exists($Gu, $Cd)) {
            goto FT;
        }
        $Gu = '';
        goto RH;
        FT:
        $Gu = $Cd[$Gu][0];
        RH:
        if (!empty($YC) && array_key_exists($YC, $Cd)) {
            goto EK;
        }
        $Q8 = $Cd["\x4e\x61\155\x65\x49\x44"][0];
        goto DT;
        EK:
        $Q8 = $Cd[$YC][0];
        DT:
        if (!empty($Rl) && array_key_exists($Rl, $Cd)) {
            goto cL;
        }
        $Ct = $Cd["\116\141\x6d\x65\111\104"][0];
        goto OD;
        cL:
        $Ct = $Cd[$Rl][0];
        OD:
        if (!empty($tp) && array_key_exists($tp, $Cd)) {
            goto la;
        }
        $tp = array();
        goto iG;
        la:
        $tp = $Cd[$tp];
        iG:
        if (!empty($oe)) {
            goto BV;
        }
        $oe = "\x65\155\141\151\154";
        BV:
        rG:
        if ($Ly == "\164\145\163\x74\126\x61\154\x69\144\x61\164\145") {
            goto hR;
        }
        mo_saml_login_user($Ct, $pY, $Gu, $Q8, $tp, $wx, $NU, $Ly, $oe, $bP, $Cd["\x4e\x61\155\145\111\104"][0], $Cd);
        goto CE;
        hR:
        update_option("\155\x6f\137\163\141\x6d\154\137\164\145\163\x74", "\124\x65\x73\x74\x20\x73\165\x63\x63\x65\x73\x73\x66\165\154");
        mo_saml_show_test_result($pY, $Gu, $Ct, $tp, $Cd);
        CE:
    } catch (Exception $sL) {
        echo sprintf("\101\156\x20\x65\x72\x72\x6f\x72\x20\157\x63\x63\165\x72\x72\x65\x64\x20\x77\x68\x69\x6c\145\40\160\x72\x6f\143\145\163\163\151\x6e\x67\40\164\x68\145\40\123\101\115\114\x20\122\x65\163\160\157\x6e\163\145\56");
        die;
    }
}
function mo_saml_show_test_result($pY, $Gu, $Ct, $tp, $Cd)
{
    echo "\x3c\144\x69\166\x20\x73\164\171\x6c\x65\75\42\x66\157\x6e\164\x2d\x66\141\x6d\x69\x6c\171\72\x43\141\154\x69\142\162\151\x3b\x70\141\144\x64\151\156\147\x3a\60\x20\63\x25\x3b\42\x3e";
    if (!empty($Ct)) {
        goto Gf;
    }
    echo "\x3c\x64\151\166\x20\163\164\x79\x6c\x65\75\x22\x63\x6f\154\157\x72\x3a\40\x23\141\71\64\x34\64\x32\73\x62\141\143\153\147\x72\x6f\x75\x6e\144\55\143\x6f\x6c\157\x72\72\40\x23\x66\x32\x64\x65\144\x65\73\x70\141\144\144\x69\156\x67\72\40\x31\65\160\170\73\x6d\x61\x72\x67\x69\156\55\142\157\164\x74\x6f\x6d\x3a\x20\62\60\x70\170\73\x74\x65\170\x74\x2d\x61\x6c\151\147\156\72\x63\145\156\x74\x65\x72\73\142\x6f\162\x64\145\x72\72\x31\160\x78\40\163\157\x6c\151\x64\x20\43\x45\66\102\63\x42\x32\x3b\146\157\x6e\x74\x2d\163\x69\172\x65\x3a\61\70\x70\x74\x3b\x22\x3e\124\x45\123\124\40\x46\101\111\x4c\105\x44\x3c\57\x64\151\166\x3e\xa\x9\11\11\11\x3c\144\x69\x76\x20\x73\164\x79\154\x65\x3d\42\143\x6f\154\157\x72\x3a\40\43\x61\71\x34\x34\64\x32\x3b\146\x6f\x6e\x74\55\x73\151\172\x65\72\x31\64\x70\x74\x3b\x20\x6d\141\x72\147\151\156\55\x62\157\164\x74\x6f\155\x3a\x32\60\160\170\73\42\x3e\x57\101\x52\x4e\x49\116\x47\72\x20\x53\157\x6d\145\40\x41\x74\x74\x72\151\x62\x75\x74\x65\x73\x20\104\151\x64\x20\116\x6f\164\x20\x4d\x61\x74\x63\150\x2e\x3c\x2f\x64\151\x76\x3e\xa\11\11\x9\11\74\144\151\166\40\163\164\x79\154\x65\75\x22\144\x69\x73\160\154\x61\171\x3a\x62\x6c\x6f\143\x6b\73\x74\145\170\x74\x2d\141\x6c\x69\x67\156\x3a\143\145\x6e\x74\x65\x72\73\x6d\x61\162\x67\151\156\x2d\142\x6f\164\x74\x6f\155\x3a\x34\x25\x3b\x22\76\74\151\x6d\147\x20\163\164\171\154\x65\x3d\42\167\x69\x64\164\150\x3a\61\65\x25\73\42\x73\162\143\x3d\x22" . plugin_dir_url(__FILE__) . "\x69\155\141\x67\x65\163\x2f\x77\x72\x6f\x6e\x67\x2e\x70\156\x67\42\x3e\74\x2f\144\151\x76\x3e";
    goto OX;
    Gf:
    update_option("\x6d\157\x5f\163\x61\155\154\137\164\x65\x73\164\137\143\x6f\x6e\146\x69\147\x5f\141\x74\x74\162\x73", $Cd);
    echo "\74\x64\151\x76\x20\163\164\171\x6c\x65\75\x22\x63\x6f\154\x6f\162\72\x20\43\x33\143\67\x36\x33\144\73\xa\11\11\11\11\x62\x61\143\x6b\147\x72\157\x75\x6e\x64\x2d\143\157\x6c\x6f\162\72\x20\x23\144\146\x66\x30\144\x38\73\40\160\141\144\x64\151\156\147\72\x32\x25\73\155\x61\x72\x67\151\x6e\55\x62\x6f\164\164\x6f\155\x3a\62\x30\x70\170\x3b\x74\x65\170\x74\55\x61\154\x69\x67\156\x3a\x63\145\x6e\164\x65\162\73\x20\142\x6f\162\x64\x65\x72\72\x31\160\x78\40\x73\x6f\x6c\151\x64\40\43\x41\105\104\102\x39\101\73\40\x66\157\x6e\x74\x2d\x73\151\x7a\x65\x3a\x31\x38\160\x74\73\x22\x3e\124\x45\x53\124\40\123\x55\x43\x43\x45\123\x53\106\x55\x4c\x3c\x2f\x64\x69\166\76\xa\11\x9\11\x9\74\144\151\166\40\163\164\x79\x6c\145\x3d\x22\x64\151\x73\x70\x6c\x61\x79\x3a\142\154\x6f\x63\x6b\73\x74\x65\170\164\x2d\x61\154\151\x67\x6e\x3a\x63\x65\x6e\164\145\162\x3b\155\x61\x72\147\x69\x6e\55\x62\x6f\164\164\157\x6d\72\x34\x25\73\42\76\74\151\155\147\x20\163\164\x79\x6c\x65\x3d\x22\167\151\144\x74\150\72\x31\x35\45\x3b\x22\x73\162\x63\75\x22" . plugin_dir_url(__FILE__) . "\x69\155\141\x67\145\x73\57\x67\x72\x65\145\x6e\137\x63\x68\145\143\153\56\x70\156\x67\42\x3e\74\57\x64\151\166\76";
    OX:
    $AJ = get_option("\x6d\157\x5f\163\x61\155\x6c\x5f\145\x6e\x61\142\x6c\145\x5f\144\157\155\141\x69\156\137\x72\x65\x73\164\x72\151\143\x74\x69\157\x6e\137\154\157\x67\x69\156");
    if (!$AJ) {
        goto I0;
    }
    $nG = get_option("\155\157\137\163\141\x6d\154\137\141\154\x6c\157\x77\137\x64\x65\156\x79\137\165\163\x65\x72\x5f\x77\x69\164\150\x5f\x64\157\155\x61\x69\156");
    if (!empty($nG) && $nG == "\144\145\156\171") {
        goto qw;
    }
    $Qp = get_option("\x73\141\x6d\154\137\141\x6d\x5f\x65\155\141\x69\154\x5f\x64\157\155\141\x69\x6e\163");
    $XA = explode("\73", $Qp);
    $Ez = explode("\x40", $Ct);
    $lW = array_key_exists("\61", $Ez) ? $Ez[1] : '';
    if (in_array($lW, $XA)) {
        goto hC;
    }
    echo "\74\x70\40\163\x74\171\154\145\x3d\x22\x63\x6f\154\x6f\x72\72\162\x65\144\73\42\76\124\x68\x69\x73\40\x75\x73\x65\x72\40\167\151\154\154\x20\x6e\x6f\x74\40\x62\x65\x20\x61\154\x6c\157\167\145\x64\x20\x74\x6f\x20\154\x6f\x67\151\x6e\x20\141\163\x20\x74\150\145\x20\x64\x6f\x6d\x61\x69\x6e\40\x6f\146\x20\x74\x68\145\40\x65\155\141\151\x6c\40\x69\x73\40\156\x6f\164\x20\x69\156\143\154\165\144\x65\144\40\151\x6e\x20\x74\x68\x65\x20\141\154\154\x6f\167\x65\144\x20\154\151\163\164\x20\157\x66\x20\x44\157\x6d\x61\x69\156\x20\122\145\163\164\162\151\x63\x74\x69\x6f\156\56\x3c\57\160\x3e";
    hC:
    goto hQ;
    qw:
    $Qp = get_option("\x73\141\155\x6c\137\141\155\x5f\x65\155\141\x69\154\x5f\x64\x6f\155\141\x69\156\x73");
    $XA = explode("\x3b", $Qp);
    $Ez = explode("\100", $Ct);
    $lW = array_key_exists("\61", $Ez) ? $Ez[1] : '';
    if (!in_array($lW, $XA)) {
        goto TA;
    }
    echo "\74\x70\x20\x73\164\171\154\145\75\42\x63\x6f\154\x6f\x72\72\x72\x65\144\73\x22\76\124\x68\151\163\x20\x75\x73\145\x72\40\x77\x69\154\154\x20\156\x6f\164\x20\142\145\x20\141\x6c\x6c\157\167\x65\144\x20\x74\x6f\40\x6c\157\147\x69\x6e\40\141\163\40\x74\x68\x65\x20\144\x6f\x6d\x61\x69\x6e\x20\x6f\146\x20\164\x68\x65\x20\145\155\x61\151\x6c\x20\x69\163\40\x69\x6e\x63\x6c\x75\144\x65\x64\40\x69\156\x20\x74\150\145\x20\144\145\x6e\151\145\x64\x20\154\151\163\x74\40\x6f\146\x20\x44\157\155\141\x69\x6e\x20\x52\145\163\164\162\151\x63\x74\x69\x6f\x6e\56\74\57\160\76";
    TA:
    hQ:
    I0:
    $nw = get_option("\163\141\155\154\137\x61\x6d\x5f\165\x73\145\x72\x6e\x61\155\x65");
    if (!(!empty($nw) && array_key_exists($nw, $Cd))) {
        goto it;
    }
    $Td = $Cd[$nw][0];
    if (!(strlen($Td) > 60)) {
        goto Vy;
    }
    echo "\x3c\x70\40\163\x74\171\x6c\145\75\42\143\x6f\x6c\x6f\162\72\162\145\144\x3b\x22\76\x4e\117\x54\105\40\x3a\40\124\150\x69\x73\40\165\x73\145\x72\x20\x77\151\x6c\154\x20\x6e\157\164\x20\x62\145\40\x61\x62\x6c\145\40\164\157\40\x6c\157\x67\151\156\x20\141\163\40\x74\150\145\x20\x75\x73\x65\x72\156\x61\x6d\x65\40\x76\141\x6c\x75\x65\40\x69\163\x20\x6d\x6f\162\145\40\x74\150\x61\x6e\x20\66\60\40\143\150\141\162\141\x63\x74\145\162\x73\x20\x6c\x6f\156\147\56\74\142\x72\57\x3e\xa\x9\x9\x9\120\x6c\145\141\x73\x65\40\164\x72\x79\40\x63\x68\x61\156\x67\x69\156\x67\x20\164\x68\x65\x20\x6d\141\x70\160\x69\156\x67\x20\x6f\146\x20\125\x73\145\x72\x6e\x61\x6d\x65\x20\146\x69\145\x6c\x64\x20\x69\x6e\x20\x3c\141\40\150\x72\x65\x66\75\x22\43\x22\40\157\x6e\103\154\151\x63\x6b\x3d\x22\x63\x6c\x6f\x73\x65\x5f\141\x6e\x64\137\x72\x65\x64\x69\162\145\x63\x74\50\51\x3b\x22\x3e\x41\164\x74\162\x69\x62\165\164\x65\57\122\x6f\154\x65\x20\x4d\x61\x70\160\151\156\147\x3c\x2f\141\76\40\164\x61\x62\x2e\x3c\57\x70\x3e";
    Vy:
    it:
    echo "\74\x73\160\141\156\x20\x73\164\x79\154\x65\75\x22\146\157\156\x74\x2d\163\151\172\x65\72\61\64\160\x74\73\42\x3e\74\142\x3e\110\x65\154\x6c\157\74\x2f\142\76\x2c\x20" . $Ct . "\x3c\x2f\x73\160\141\156\76\74\x62\x72\x2f\x3e\74\160\x20\x73\x74\171\154\x65\x3d\42\146\157\156\x74\x2d\167\x65\151\147\150\164\x3a\x62\157\x6c\x64\x3b\x66\157\156\x74\55\x73\x69\172\145\x3a\x31\x34\x70\164\x3b\x6d\141\162\147\151\x6e\x2d\154\145\146\164\72\x31\x25\73\x22\x3e\101\124\124\x52\111\x42\x55\x54\x45\x53\40\122\105\103\x45\111\x56\105\x44\72\x3c\57\160\76\12\11\x9\x9\x9\74\x74\141\x62\x6c\x65\40\x73\x74\x79\154\145\x3d\42\142\157\x72\144\x65\x72\x2d\143\157\154\x6c\x61\x70\x73\145\72\143\x6f\x6c\154\x61\160\x73\145\73\x62\157\x72\144\145\162\55\x73\160\141\x63\151\x6e\147\x3a\x30\73\x20\x64\x69\163\x70\154\141\x79\x3a\164\x61\142\x6c\x65\73\x77\x69\x64\x74\150\x3a\x31\x30\60\45\73\x20\x66\157\x6e\164\x2d\x73\x69\x7a\x65\x3a\61\x34\160\x74\73\x62\141\x63\153\147\x72\157\x75\156\x64\x2d\143\x6f\154\x6f\x72\x3a\43\x45\x44\x45\104\x45\104\x3b\42\x3e\12\11\x9\11\11\x3c\164\162\x20\x73\x74\171\154\145\75\42\x74\x65\170\x74\55\x61\x6c\151\x67\156\x3a\143\x65\156\x74\x65\x72\x3b\42\x3e\x3c\x74\144\x20\x73\164\x79\154\145\x3d\42\146\157\x6e\164\55\x77\145\151\147\150\x74\72\x62\x6f\x6c\144\73\x62\x6f\x72\x64\x65\x72\x3a\62\x70\x78\x20\x73\x6f\154\151\144\x20\43\x39\x34\71\60\x39\x30\x3b\x70\141\144\x64\151\156\147\72\x32\x25\x3b\42\x3e\x41\124\124\x52\x49\102\125\124\105\x20\x4e\x41\115\105\74\x2f\x74\x64\76\74\x74\x64\40\x73\x74\171\x6c\x65\75\42\146\x6f\156\x74\x2d\167\x65\x69\x67\x68\164\72\x62\x6f\x6c\x64\73\x70\x61\x64\144\x69\156\x67\72\62\x25\x3b\142\x6f\x72\144\145\x72\x3a\x32\160\x78\40\163\x6f\154\151\144\40\x23\71\64\x39\x30\x39\x30\x3b\40\167\157\162\144\55\167\x72\x61\160\x3a\142\x72\x65\x61\x6b\x2d\167\x6f\x72\x64\73\42\x3e\x41\124\124\122\x49\102\x55\x54\x45\40\x56\101\x4c\125\x45\x3c\x2f\x74\144\x3e\74\x2f\164\x72\76";
    if (!empty($Cd)) {
        goto sD;
    }
    echo "\x4e\x6f\40\101\x74\164\162\x69\x62\165\x74\x65\x73\40\122\x65\143\145\x69\166\145\144\x2e";
    goto Uo;
    sD:
    foreach ($Cd as $k3 => $zw) {
        echo "\x3c\164\162\76\x3c\164\144\x20\x73\x74\x79\x6c\x65\75\47\x66\157\156\x74\x2d\167\x65\x69\147\x68\x74\x3a\x62\157\154\x64\x3b\x62\x6f\x72\144\145\x72\x3a\x32\x70\x78\x20\x73\x6f\154\x69\x64\40\x23\x39\64\71\60\x39\60\x3b\x70\x61\144\x64\151\x6e\147\72\x32\x25\73\x27\76" . $k3 . "\x3c\x2f\x74\144\x3e\74\164\x64\x20\163\x74\171\154\x65\75\x27\160\x61\144\144\151\x6e\147\x3a\x32\45\73\142\157\162\144\145\x72\72\62\x70\x78\x20\163\x6f\154\151\144\40\43\x39\64\x39\60\x39\60\x3b\x20\167\x6f\x72\x64\55\x77\x72\x61\160\x3a\x62\x72\x65\141\153\x2d\x77\157\162\x64\73\47\76" . implode("\x3c\x68\x72\57\76", $zw) . "\74\x2f\164\144\76\74\57\x74\x72\76";
        CJ:
    }
    Sc:
    Uo:
    echo "\x3c\57\164\x61\x62\154\145\76\74\x2f\x64\151\166\x3e";
    echo "\x3c\144\151\x76\x20\x73\164\171\154\x65\75\42\155\x61\x72\147\x69\x6e\72\63\45\73\x64\x69\163\x70\x6c\x61\171\72\142\x6c\x6f\143\x6b\73\164\x65\x78\x74\55\141\x6c\x69\147\156\x3a\x63\x65\x6e\164\x65\162\73\x22\x3e\xa\11\11\x3c\x69\156\x70\x75\x74\x20\163\164\171\x6c\x65\75\x22\160\x61\x64\x64\151\156\x67\72\x31\x25\73\x77\x69\x64\x74\x68\72\x32\x35\x30\x70\x78\x3b\x62\x61\x63\x6b\147\162\x6f\x75\x6e\144\x3a\x20\x23\x30\60\x39\x31\103\x44\40\156\157\156\145\40\x72\x65\x70\x65\141\164\40\163\x63\x72\157\154\154\40\60\45\40\60\x25\x3b\x63\x75\x72\163\157\x72\72\x20\160\157\151\156\x74\x65\x72\73\146\157\156\164\55\x73\151\x7a\x65\x3a\61\65\x70\x78\x3b\142\x6f\162\144\145\162\x2d\x77\x69\x64\x74\x68\72\40\x31\160\170\x3b\142\157\x72\x64\145\162\x2d\x73\164\x79\x6c\x65\x3a\x20\163\157\154\x69\x64\73\142\157\x72\x64\145\162\55\162\x61\144\151\165\x73\72\40\x33\x70\x78\x3b\x77\150\x69\164\x65\55\163\160\141\x63\x65\72\x20\156\x6f\167\x72\141\x70\73\x62\157\170\55\163\x69\172\x69\x6e\x67\72\x20\x62\x6f\x72\x64\x65\x72\55\x62\157\170\73\142\157\162\144\145\162\55\x63\157\x6c\x6f\162\72\x20\43\60\60\x37\x33\x41\101\73\142\x6f\170\x2d\163\x68\141\144\157\x77\x3a\x20\x30\160\170\x20\x31\160\x78\40\60\160\x78\40\x72\x67\x62\141\x28\x31\x32\x30\54\x20\x32\x30\60\x2c\40\62\x33\60\54\x20\x30\x2e\x36\51\40\x69\156\163\x65\x74\x3b\143\157\x6c\x6f\162\x3a\40\x23\106\x46\106\x3b\x22\xa\40\40\40\x20\x20\40\40\x20\x20\x20\40\x20\164\171\160\145\75\x22\142\165\164\x74\x6f\156\x22\40\x76\x61\154\x75\145\75\42\103\157\x6e\x66\151\x67\165\162\x65\40\101\164\164\162\x69\142\x75\164\145\x2f\x52\x6f\x6c\145\40\x4d\x61\160\160\151\156\x67\x22\x20\157\156\103\154\151\143\153\x3d\42\143\154\157\163\145\x5f\141\x6e\x64\x5f\x72\x65\x64\151\x72\145\x63\164\x28\51\x3b\42\76\40\46\x6e\x62\x73\160\73\40\12\11\x9\x3c\151\x6e\x70\165\164\x20\x73\x74\171\154\145\75\42\x70\141\x64\x64\x69\x6e\x67\72\61\45\x3b\x77\x69\x64\x74\150\x3a\x31\x30\60\x70\x78\x3b\x62\x61\x63\153\x67\162\157\165\x6e\x64\x3a\40\43\60\60\x39\x31\103\104\40\x6e\x6f\156\x65\x20\x72\x65\x70\x65\x61\164\x20\163\143\162\157\x6c\154\x20\60\45\40\60\x25\73\143\165\162\163\157\x72\72\40\160\157\x69\156\164\145\x72\73\146\x6f\156\x74\55\x73\x69\x7a\145\72\61\65\x70\170\x3b\142\x6f\x72\x64\x65\x72\x2d\x77\151\x64\164\150\72\40\x31\x70\x78\x3b\142\x6f\x72\x64\x65\162\x2d\163\x74\171\154\145\x3a\x20\x73\x6f\x6c\x69\x64\73\142\157\x72\x64\x65\162\55\162\141\x64\151\x75\163\x3a\x20\x33\x70\x78\73\x77\150\x69\164\x65\x2d\163\160\141\143\x65\x3a\40\x6e\157\167\162\x61\160\73\x62\157\x78\55\163\x69\172\151\156\147\x3a\x20\142\157\x72\x64\x65\x72\x2d\x62\157\170\73\142\157\x72\144\x65\162\55\x63\x6f\x6c\x6f\x72\x3a\x20\43\x30\x30\x37\63\101\101\x3b\x62\x6f\170\55\163\x68\x61\x64\x6f\x77\72\40\60\160\x78\40\x31\x70\x78\40\x30\x70\x78\x20\162\x67\142\x61\50\x31\62\60\x2c\x20\62\60\60\54\x20\62\63\x30\x2c\40\x30\x2e\x36\51\40\x69\156\x73\x65\164\x3b\143\x6f\154\157\x72\72\40\x23\x46\x46\x46\x3b\x22\x74\x79\x70\145\75\42\142\x75\164\164\157\x6e\42\40\166\x61\154\165\x65\75\x22\104\157\156\145\42\x20\157\156\x43\154\x69\x63\x6b\75\x22\x73\145\154\146\x2e\x63\x6c\157\163\145\x28\51\x3b\x22\x3e\x3c\x2f\144\151\x76\76\xa\x9\x9\12\11\x9\x3c\163\x63\x72\x69\x70\164\x3e\xa\40\40\40\40\x20\x20\40\40\40\x20\40\x20\x20\146\165\x6e\x63\x74\x69\x6f\156\40\x63\x6c\157\x73\x65\x5f\x61\x6e\144\137\x72\145\144\x69\x72\x65\x63\164\50\51\x7b\12\x20\x20\40\40\x20\x20\40\x20\40\x20\40\x20\40\x20\x20\x20\x20\167\x69\x6e\x64\157\167\56\x6f\160\x65\x6e\145\x72\x2e\162\x65\144\x69\162\145\143\164\137\x74\157\x5f\x61\x74\x74\x72\x69\x62\165\164\x65\x5f\155\141\x70\160\x69\x6e\147\x28\x29\73\12\40\40\40\40\x20\x20\40\x20\40\40\x20\40\x20\40\x20\x20\40\x73\145\154\x66\x2e\x63\154\x6f\x73\145\50\51\73\12\x20\40\40\x20\40\40\x20\40\40\40\40\40\40\x7d\40\40\x20\x20\12\x9\x9\x3c\x2f\x73\x63\162\151\160\164\x3e";
    die;
}
function mo_saml_convert_to_windows_iconv($Rd)
{
    $tP = get_option("\x6d\x6f\x5f\163\x61\x6d\154\x5f\x65\156\x63\x6f\144\151\x6e\x67\x5f\x65\x6e\141\142\x6c\x65\144");
    if (!($tP === '')) {
        goto cQ;
    }
    return $Rd;
    cQ:
    return iconv("\x55\x54\106\x2d\x38", "\x43\120\x31\62\x35\62\57\x2f\x49\x47\116\117\122\x45", $Rd);
}
function mo_saml_login_user($Ct, $pY, $Gu, $Q8, $tp, $wx, $NU, $Ly, $oe, $bP = '', $HI = '', $Cd = null)
{
    do_action("\155\x6f\137\141\142\162\137\146\x69\154\164\145\162\137\x6c\x6f\x67\x69\x6e", $Cd);
    check_if_user_allowed_to_login_due_to_role_restriction($tp);
    $Gp = get_option("\x6d\x6f\137\163\141\x6d\x6c\137\163\x70\x5f\x62\x61\x73\x65\x5f\x75\x72\x6c");
    if (!empty($Gp)) {
        goto mp;
    }
    $Gp = home_url();
    mp:
    mo_saml_restrict_users_based_on_domain($Ct);
    $Q8 = mo_saml_sanitize_username($Q8);
    if (!(strlen($Q8) > 60)) {
        goto sU;
    }
    wp_die("\x57\x65\x20\143\157\x75\154\x64\40\156\157\164\x20\163\x69\x67\156\40\171\157\165\40\x69\156\x2e\x20\x50\154\145\x61\163\x65\x20\143\157\x6e\164\x61\x63\x74\40\171\157\x75\162\40\141\144\155\x69\156\x69\x73\164\162\141\x74\157\162\56", "\x45\162\162\x6f\x72\x20\72\x20\125\x73\x65\162\x6e\141\x6d\145\40\x6c\145\156\x67\164\150\40\x6c\151\x6d\151\164\x20\162\145\x61\143\x68\x65\x64");
    die;
    sU:
    if (username_exists($Q8) || email_exists($Ct)) {
        goto Rg;
    }
    $bT = get_option("\x73\141\155\154\137\x61\155\137\x72\157\154\x65\137\155\x61\160\x70\x69\156\x67");
    if (!@unserialize($bT)) {
        goto Zi;
    }
    $bT = unserialize($bT);
    Zi:
    $tq = true;
    $SY = get_option("\x6d\157\x5f\163\x61\155\154\137\144\157\x6e\164\x5f\x63\162\x65\x61\x74\x65\137\x75\x73\145\162\x5f\151\146\x5f\162\x6f\x6c\145\137\156\157\x74\x5f\x6d\141\160\160\x65\x64");
    if (!(!empty($SY) && strcmp($SY, "\143\150\145\x63\x6b\x65\144") == 0)) {
        goto f5;
    }
    $G2 = is_role_mapping_configured_for_user($bT, $tp);
    $tq = $G2;
    f5:
    if ($tq === true) {
        goto rd;
    }
    $Qx = get_option("\x6d\157\x5f\x73\x61\155\154\137\x61\143\143\157\x75\x6e\164\137\x63\162\x65\141\164\x69\x6f\156\137\144\x69\x73\141\x62\x6c\145\144\x5f\x6d\x73\147");
    if (!empty($Qx)) {
        goto pN;
    }
    $Qx = "\127\x65\40\x63\157\165\x6c\144\40\x6e\x6f\x74\40\163\151\147\x6e\40\x79\x6f\165\40\151\x6e\56\x20\120\x6c\145\141\163\x65\40\x63\157\x6e\164\141\x63\164\x20\x79\157\165\x72\40\x41\x64\155\151\156\x69\x73\164\162\x61\164\157\x72\56";
    pN:
    wp_die($Qx, "\105\x72\162\157\x72\x3a\x20\116\x6f\164\40\x61\40\127\157\162\144\120\x72\x65\163\163\x20\115\145\x6d\x62\x65\x72");
    die;
    goto Tv;
    rd:
    $VI = wp_generate_password(10, false);
    if (!empty($Q8)) {
        goto XT;
    }
    $fd = wp_create_user($Ct, $VI, $Ct);
    goto pE;
    XT:
    $fd = wp_create_user($Q8, $VI, $Ct);
    pE:
    if (!is_wp_error($fd)) {
        goto sd;
    }
    wp_die($fd->get_error_message() . "\x3c\x62\162\76\120\154\x65\141\163\x65\x20\143\157\156\164\x61\x63\x74\x20\x79\157\165\x72\x20\x41\144\155\x69\156\151\163\x74\x72\x61\164\157\x72\x2e\x3c\142\162\x3e\74\x62\x3e\125\163\145\x72\156\141\155\x65\x3c\x2f\x62\x3e\x3a\x20" . $Ct, "\105\x72\162\157\162\x3a\x20\103\157\x75\154\144\x6e\47\x74\x20\143\x72\145\141\164\x65\x20\x75\x73\145\x72");
    sd:
    $user = get_user_by("\x69\144", $fd);
    $mK = assign_roles_to_user($user, $bT, $tp);
    if ($mK !== true && !empty($wx) && $wx == "\143\x68\x65\143\x6b\x65\x64") {
        goto jg;
    }
    if ($mK !== true && !empty($NU)) {
        goto hj;
    }
    if ($mK !== true) {
        goto Yv;
    }
    goto K2;
    jg:
    $Qc = wp_update_user(array("\111\x44" => $fd, "\x72\x6f\x6c\145" => false));
    goto K2;
    hj:
    $Qc = wp_update_user(array("\x49\104" => $fd, "\162\157\154\x65" => $NU));
    goto K2;
    Yv:
    $NU = get_option("\144\x65\x66\141\x75\154\x74\137\x72\157\154\145");
    $Qc = wp_update_user(array("\x49\x44" => $fd, "\162\157\154\145" => $NU));
    K2:
    mo_saml_map_attributes($user, $pY, $Gu, $Cd);
    mo_saml_set_auth_cookie($user, $bP, $HI, true);
    do_action("\x6d\157\x5f\163\141\155\154\137\141\x74\164\162\151\142\165\164\145\163", $Q8, $Ct, $pY, $Gu, $tp);
    Tv:
    goto qy;
    Rg:
    if (username_exists($Q8)) {
        goto RV;
    }
    if (!email_exists($Ct)) {
        goto Ju;
    }
    $user = get_user_by("\x65\x6d\141\151\154", $Ct);
    $fd = $user->ID;
    Ju:
    goto oF;
    RV:
    $user = get_user_by("\x6c\157\147\151\x6e", $Q8);
    $fd = $user->ID;
    if (empty($Ct)) {
        goto eB;
    }
    $Qc = wp_update_user(array("\111\104" => $fd, "\x75\163\x65\162\x5f\145\x6d\141\x69\x6c" => $Ct));
    eB:
    oF:
    mo_saml_map_attributes($user, $pY, $Gu, $Cd);
    $bT = get_option("\x73\x61\155\x6c\137\141\155\x5f\162\157\x6c\x65\137\x6d\141\160\x70\151\156\147");
    if (!@unserialize($bT)) {
        goto Pp;
    }
    $bT = unserialize($bT);
    Pp:
    $ml = get_option("\x73\x61\x6d\154\x5f\x61\x6d\x5f\x64\x6f\156\x74\x5f\x75\x70\144\x61\x74\145\x5f\145\170\x69\x73\x74\151\x6e\x67\137\x75\163\x65\x72\137\x72\157\154\x65");
    if (!(empty($ml) || $ml != "\x63\x68\x65\143\x6b\x65\x64")) {
        goto Gd;
    }
    $mK = assign_roles_to_user($user, $bT, $tp);
    if ($mK !== true && !is_administrator_user($user) && !empty($wx) && $wx == "\x63\150\145\x63\153\x65\x64") {
        goto ne;
    }
    if ($mK !== true && !is_administrator_user($user) && !empty($NU)) {
        goto oi;
    }
    goto tH;
    ne:
    $Qc = wp_update_user(array("\x49\104" => $fd, "\162\157\x6c\x65" => false));
    goto tH;
    oi:
    $Qc = wp_update_user(array("\111\x44" => $fd, "\x72\x6f\x6c\x65" => $NU));
    tH:
    Gd:
    mo_saml_set_auth_cookie($user, $bP, $HI);
    do_action("\x6d\x6f\x5f\x73\x61\155\x6c\x5f\x61\164\x74\x72\x69\x62\165\x74\145\163", $Q8, $Ct, $pY, $Gu, $tp);
    qy:
    mo_saml_post_login_redirection($Ly, $Gp);
}
function mo_saml_sanitize_username($Q8)
{
    $HS = sanitize_user($Q8, true);
    $Yy = apply_filters("\160\x72\x65\x5f\x75\x73\x65\x72\x5f\154\157\x67\x69\156", $HS);
    $Q8 = trim($Yy);
    return $Q8;
}
function mo_saml_restrict_users_based_on_domain($Ct)
{
    $AJ = get_option("\155\x6f\x5f\x73\141\155\x6c\x5f\x65\156\141\142\154\x65\137\x64\x6f\155\x61\x69\156\137\162\145\x73\x74\162\x69\143\x74\x69\x6f\156\x5f\x6c\x6f\147\151\x6e");
    if (!$AJ) {
        goto ib;
    }
    $Qp = get_option("\163\x61\155\x6c\x5f\x61\155\x5f\145\155\141\x69\x6c\137\x64\157\155\x61\x69\156\x73");
    $XA = explode("\73", $Qp);
    $Ez = explode("\100", $Ct);
    $lW = array_key_exists("\61", $Ez) ? $Ez[1] : '';
    $nG = get_option("\x6d\157\x5f\x73\x61\155\154\137\141\154\x6c\157\167\x5f\144\145\x6e\x79\137\165\x73\x65\x72\137\167\151\x74\150\137\x64\157\x6d\141\151\156");
    $Qx = get_option("\155\x6f\137\x73\141\155\x6c\x5f\162\145\163\164\x72\151\x63\x74\145\x64\x5f\x64\x6f\155\x61\x69\x6e\137\145\162\162\157\162\137\155\x73\147");
    if (!empty($Qx)) {
        goto Fk;
    }
    $Qx = "\131\x6f\x75\40\x61\x72\x65\x20\156\157\164\40\141\x6c\x6c\x6f\x77\x65\144\40\164\157\40\154\157\147\x69\156\x2e\x20\x50\154\145\141\x73\145\40\x63\157\x6e\164\141\143\164\x20\171\x6f\x75\162\x20\x41\144\x6d\x69\156\151\163\164\162\x61\164\x6f\162\x2e";
    Fk:
    if (!empty($nG) && $nG == "\x64\145\156\x79") {
        goto jk;
    }
    if (in_array($lW, $XA)) {
        goto KB;
    }
    wp_die($Qx, "\x50\145\x72\155\151\163\x73\x69\157\x6e\40\104\x65\156\151\x65\x64\40\x3a\x20\x4e\x6f\164\x20\141\x20\127\150\x69\x74\x65\x6c\x69\x73\164\145\144\x20\165\163\145\x72\56");
    KB:
    goto ec;
    jk:
    if (!in_array($lW, $XA)) {
        goto ay;
    }
    wp_die($Qx, "\120\145\x72\x6d\151\x73\x73\x69\157\156\40\x44\145\156\151\145\144\40\x3a\40\x42\x6c\141\x63\153\154\x69\163\x74\145\x64\40\x75\163\145\x72\56");
    ay:
    ec:
    ib:
}
function mo_saml_map_attributes($user, $pY, $Gu, $Cd)
{
    mo_saml_map_basic_attributes($user, $pY, $Gu, $Cd);
    mo_saml_map_custom_attributes($user, $Cd);
}
function mo_saml_map_basic_attributes($user, $pY, $Gu, $Cd)
{
    $fd = $user->ID;
    if (empty($pY)) {
        goto Xm;
    }
    $Qc = wp_update_user(array("\111\104" => $fd, "\x66\151\162\x73\164\x5f\156\141\x6d\145" => $pY));
    Xm:
    if (empty($Gu)) {
        goto GT;
    }
    $Qc = wp_update_user(array("\x49\x44" => $fd, "\x6c\141\x73\x74\137\x6e\x61\x6d\145" => $Gu));
    GT:
    if (is_null($Cd)) {
        goto Jy;
    }
    update_user_meta($fd, "\155\x6f\x5f\x73\141\155\154\x5f\x75\x73\145\162\137\x61\164\x74\162\x69\142\165\x74\x65\x73", $Cd);
    $fF = get_option("\163\x61\155\154\x5f\x61\x6d\x5f\x64\x69\163\160\x6c\141\x79\x5f\x6e\141\x6d\145");
    if (empty($fF)) {
        goto XH;
    }
    if (strcmp($fF, "\x55\123\x45\x52\x4e\x41\x4d\x45") == 0) {
        goto dU;
    }
    if (strcmp($fF, "\x46\x4e\x41\x4d\x45") == 0 && !empty($pY)) {
        goto pA;
    }
    if (strcmp($fF, "\x4c\116\101\x4d\105") == 0 && !empty($Gu)) {
        goto XB;
    }
    if (strcmp($fF, "\x46\116\101\115\x45\x5f\x4c\x4e\x41\115\105") == 0 && !empty($Gu) && !empty($pY)) {
        goto Ug;
    }
    if (!(strcmp($fF, "\114\x4e\x41\x4d\105\137\x46\116\101\115\105") == 0 && !empty($Gu) && !empty($pY))) {
        goto W7;
    }
    $Qc = wp_update_user(array("\x49\x44" => $fd, "\144\x69\x73\x70\154\x61\171\x5f\156\141\x6d\145" => $Gu . "\40" . $pY));
    W7:
    goto pn;
    Ug:
    $Qc = wp_update_user(array("\x49\104" => $fd, "\x64\x69\163\160\x6c\x61\x79\x5f\x6e\141\155\x65" => $pY . "\x20" . $Gu));
    pn:
    goto rL;
    XB:
    $Qc = wp_update_user(array("\111\104" => $fd, "\x64\x69\163\160\154\141\171\137\156\x61\155\145" => $Gu));
    rL:
    goto MD;
    pA:
    $Qc = wp_update_user(array("\x49\x44" => $fd, "\x64\x69\163\x70\154\x61\x79\x5f\x6e\141\155\145" => $pY));
    MD:
    goto o0;
    dU:
    $Qc = wp_update_user(array("\x49\x44" => $fd, "\x64\151\x73\160\154\x61\x79\137\156\x61\155\x65" => $user->user_login));
    o0:
    XH:
    Jy:
}
function mo_saml_map_custom_attributes($user, $Cd)
{
    $fd = $user->ID;
    if (!get_option("\155\x6f\137\x73\141\x6d\154\x5f\143\165\x73\164\157\x6d\137\x61\x74\164\162\x73\x5f\155\x61\x70\160\x69\156\x67")) {
        goto ya;
    }
    $th = get_option("\155\x6f\137\x73\x61\x6d\x6c\137\143\165\163\x74\x6f\x6d\137\141\x74\x74\162\163\x5f\155\141\160\160\151\156\x67");
    if (!@unserialize($th)) {
        goto wI;
    }
    $th = unserialize($th);
    wI:
    foreach ($th as $k3 => $zw) {
        if (!array_key_exists($zw, $Cd)) {
            goto O8;
        }
        $TJ = false;
        if (!(count($Cd[$zw]) == 1)) {
            goto hE;
        }
        $TJ = true;
        hE:
        if (!$TJ) {
            goto jP;
        }
        update_user_meta($fd, $k3, $Cd[$zw][0]);
        goto Ik;
        jP:
        $CH = array();
        foreach ($Cd[$zw] as $jo) {
            array_push($CH, $jo);
            T4:
        }
        NX:
        update_user_meta($fd, $k3, $CH);
        Ik:
        O8:
        u4:
    }
    UG:
    ya:
}
function mo_saml_set_auth_cookie($user, $bP, $HI, $sg = false)
{
    $fd = $user->ID;
    wp_set_current_user($fd);
    $q2 = false;
    $q2 = apply_filters("\155\x6f\137\162\x65\155\145\x6d\142\x65\x72\137\x6d\145", $q2);
    wp_set_auth_cookie($fd, $q2);
    if (!$sg) {
        goto Bm;
    }
    do_action("\x75\163\x65\x72\137\x72\145\x67\151\163\164\x65\x72", $fd);
    Bm:
    do_action("\x77\x70\x5f\154\157\x67\x69\x6e", $user->user_login, $user);
    if (empty($bP)) {
        goto yB;
    }
    update_user_meta($fd, "\x6d\x6f\x5f\163\141\x6d\x6c\x5f\x73\145\x73\x73\x69\157\x6e\x5f\151\x6e\x64\145\x78", $bP);
    yB:
    if (empty($HI)) {
        goto WH;
    }
    update_user_meta($fd, "\155\157\x5f\163\141\x6d\154\x5f\156\x61\x6d\x65\x5f\151\144", $HI);
    WH:
    if (!(!session_id() || session_id() == '' || !isset($_SESSION))) {
        goto hh;
    }
    session_start();
    hh:
    $_SESSION["\x6d\157\x5f\163\x61\155\x6c"]["\154\157\147\147\x65\144\137\x69\x6e\x5f\x77\151\164\x68\137\151\x64\160"] = TRUE;
}
function mo_saml_post_login_redirection($Ly, $Gp)
{
    $Wa = get_option("\155\157\137\x73\141\x6d\x6c\137\162\x65\154\x61\x79\x5f\163\x74\x61\164\145");
    if (!empty($Wa)) {
        goto e6;
    }
    if (!empty($Ly)) {
        goto UX;
    }
    wp_redirect($Gp);
    goto oB;
    UX:
    if (filter_var($Ly, FILTER_VALIDATE_URL) === FALSE) {
        goto DE;
    }
    if (strpos($Ly, home_url()) !== false) {
        goto Cc;
    }
    wp_redirect($Gp);
    goto de;
    Cc:
    wp_redirect($Ly);
    de:
    goto Tf;
    DE:
    wp_redirect($Ly);
    Tf:
    oB:
    goto Uy;
    e6:
    wp_redirect($Wa);
    Uy:
    die;
}
function check_if_user_allowed_to_login_due_to_role_restriction($tp)
{
    $JJ = get_option("\163\x61\155\154\137\141\155\x5f\144\x6f\156\164\x5f\141\x6c\x6c\x6f\167\137\165\x73\145\x72\137\164\x6f\x6c\157\147\151\156\137\x63\162\x65\141\164\145\137\167\x69\164\x68\x5f\x67\x69\166\x65\x6e\137\x67\x72\x6f\x75\x70\163");
    if (!($JJ == "\x63\x68\145\x63\x6b\x65\144")) {
        goto C3;
    }
    if (empty($tp)) {
        goto fp;
    }
    $Yt = get_option("\155\157\x5f\x73\x61\155\x6c\x5f\162\145\163\164\162\151\x63\x74\x5f\165\x73\145\162\x73\x5f\x77\x69\164\x68\137\147\162\157\x75\x70\x73");
    $Fz = explode("\73", $Yt);
    foreach ($Fz as $h3) {
        foreach ($tp as $Pr) {
            $Pr = trim($Pr);
            if (!(!empty($Pr) && $Pr == $h3)) {
                goto Lx;
            }
            wp_die("\x59\x6f\x75\40\x61\x72\x65\x20\156\157\164\40\141\x75\164\x68\157\x72\151\x7a\x65\x64\x20\x74\x6f\x20\154\x6f\147\x69\x6e\56\40\x50\154\145\x61\x73\x65\40\x63\157\x6e\x74\x61\143\x74\x20\171\x6f\x75\x72\x20\141\x64\155\x69\156\151\x73\164\x72\x61\x74\x6f\162\x2e", "\x45\x72\x72\x6f\162");
            Lx:
            nG:
        }
        GP:
        vv:
    }
    Hi:
    fp:
    C3:
}
function assign_roles_to_user($user, $bT, $tp)
{
    $mK = false;
    if (!(!empty($tp) && !empty($bT) && !is_administrator_user($user))) {
        goto ci;
    }
    $user->set_role(false);
    $MQ = '';
    $UA = false;
    foreach ($bT as $En => $QC) {
        $Fz = explode("\x3b", $QC);
        foreach ($Fz as $h3) {
            foreach ($tp as $Pr) {
                $Pr = trim($Pr);
                if (!(!empty($Pr) && $Pr == $h3)) {
                    goto lr;
                }
                $mK = true;
                $user->add_role($En);
                lr:
                he:
            }
            ul:
            oq:
        }
        KE:
        xX:
    }
    pM:
    ci:
    return $mK;
}
function is_role_mapping_configured_for_user($bT, $tp)
{
    if (!(!empty($tp) && !empty($bT))) {
        goto BU;
    }
    foreach ($bT as $En => $QC) {
        $Fz = explode("\73", $QC);
        foreach ($Fz as $h3) {
            foreach ($tp as $Pr) {
                $Pr = trim($Pr);
                if (!(!empty($Pr) && $Pr == $h3)) {
                    goto Sy;
                }
                return true;
                Sy:
                Rx:
            }
            Ui:
            Kr:
        }
        YL:
        AH:
    }
    iQ:
    BU:
    return false;
}
function is_administrator_user($user)
{
    $r_ = $user->roles;
    if (!is_null($r_) && in_array("\x61\144\155\x69\x6e\151\x73\x74\x72\x61\164\x6f\162", $r_, TRUE)) {
        goto P_;
    }
    return false;
    goto Sl;
    P_:
    return true;
    Sl:
}
function mo_saml_is_customer_registered()
{
    $Op = get_option("\x6d\157\137\x73\141\x6d\x6c\137\x61\x64\x6d\151\x6e\x5f\145\155\141\151\154");
    $F0 = get_option("\155\157\137\x73\x61\x6d\154\x5f\141\x64\155\x69\156\x5f\x63\x75\163\x74\157\155\145\162\x5f\x6b\145\x79");
    if (!$Op || !$F0 || !is_numeric(trim($F0))) {
        goto TO;
    }
    return 1;
    goto MF;
    TO:
    return 0;
    MF:
}
function mo_saml_is_customer_license_verified()
{
    $k3 = get_option("\155\157\137\163\x61\155\154\x5f\143\165\x73\164\x6f\155\145\162\137\164\157\153\145\x6e");
    $ab = AESEncryption::decrypt_data(get_option("\x74\137\163\x69\x74\x65\137\x73\164\x61\x74\165\x73"), $k3);
    $ut = get_option("\x73\x6d\x6c\x5f\154\x6b");
    $Op = get_option("\x6d\157\137\163\141\155\x6c\x5f\x61\x64\x6d\x69\156\x5f\x65\155\x61\x69\154");
    $F0 = get_option("\155\x6f\x5f\163\x61\155\x6c\137\x61\144\155\151\x6e\137\143\165\x73\x74\x6f\155\145\162\137\153\145\171");
    if (!$ab && !$ut || !$Op || !$F0 || !is_numeric(trim($F0))) {
        goto q1;
    }
    return 1;
    goto QN;
    q1:
    return 0;
    QN:
}
function saml_get_current_page_url()
{
    $WN = $_SERVER["\110\x54\124\x50\137\x48\x4f\x53\x54"];
    if (!(substr($WN, -1) == "\57")) {
        goto G1;
    }
    $WN = substr($WN, 0, -1);
    G1:
    $sx = $_SERVER["\x52\x45\121\125\x45\x53\x54\137\x55\122\111"];
    if (!(substr($sx, 0, 1) == "\x2f")) {
        goto Uw;
    }
    $sx = substr($sx, 1);
    Uw:
    $HC = isset($_SERVER["\110\124\124\120\x53"]) && strcasecmp($_SERVER["\x48\124\124\x50\123"], "\x6f\156") == 0;
    $yC = "\x68\164\x74\x70" . ($HC ? "\x73" : '') . "\x3a\x2f\x2f" . $WN . "\57" . $sx;
    return $yC;
}
function show_status_error($Js, $Ly, $JO)
{
    $Js = strip_tags($Js);
    $JO = strip_tags($JO);
    if ($Ly == "\x74\x65\x73\x74\x56\141\154\x69\x64\141\164\145") {
        goto XI;
    }
    wp_die("\x57\x65\x20\x63\157\x75\154\144\40\156\x6f\164\40\x73\x69\147\156\x20\x79\x6f\x75\x20\151\156\56\x20\x50\154\x65\141\163\x65\40\x63\157\x6e\164\x61\143\x74\x20\171\x6f\x75\162\x20\101\x64\x6d\x69\156\151\163\x74\162\x61\x74\x6f\162\x2e", "\105\x72\x72\157\162\x3a\40\111\156\166\x61\x6c\x69\x64\x20\123\101\x4d\114\40\x52\145\163\x70\157\156\x73\x65\x20\x53\164\x61\x74\x75\163");
    goto uu;
    XI:
    echo "\x3c\144\x69\166\x20\x73\164\x79\x6c\145\75\x22\x66\x6f\156\x74\x2d\x66\141\155\x69\154\171\72\x43\141\154\x69\x62\162\x69\x3b\x70\141\x64\x64\151\x6e\x67\x3a\x30\x20\63\x25\x3b\x22\76";
    echo "\74\144\151\166\x20\163\x74\x79\x6c\x65\x3d\x22\x63\x6f\x6c\x6f\162\72\x20\43\x61\x39\64\64\x34\62\x3b\142\141\x63\x6b\x67\x72\157\x75\x6e\144\x2d\x63\157\x6c\157\162\x3a\40\43\x66\x32\x64\x65\144\x65\73\x70\141\144\144\151\x6e\147\x3a\x20\61\65\x70\170\x3b\155\x61\162\x67\x69\156\55\x62\x6f\164\x74\x6f\155\x3a\x20\x32\x30\160\170\x3b\x74\x65\x78\164\55\x61\154\x69\x67\x6e\x3a\x63\145\156\x74\145\162\x3b\x62\157\x72\144\x65\162\72\x31\x70\170\x20\x73\157\x6c\151\x64\40\x23\105\x36\x42\63\102\62\x3b\x66\x6f\x6e\x74\55\163\151\172\145\72\x31\70\x70\x74\73\x22\x3e\40\x45\122\122\117\x52\x3c\x2f\144\x69\x76\76\12\40\40\x20\x20\40\x20\x20\x20\40\40\x20\40\x20\x20\40\x20\x3c\x64\151\166\x20\163\x74\x79\154\x65\x3d\x22\x63\157\154\157\x72\x3a\40\43\x61\71\64\64\x34\x32\73\x66\157\x6e\164\55\163\x69\x7a\x65\72\x31\x34\160\164\x3b\40\x6d\141\162\147\151\x6e\x2d\x62\157\164\164\157\155\x3a\62\x30\160\170\x3b\42\76\74\160\x3e\x3c\163\164\x72\157\156\147\x3e\x45\x72\162\x6f\162\x3a\40\x3c\57\x73\164\162\157\x6e\x67\x3e\40\111\x6e\x76\x61\x6c\x69\144\x20\123\101\x4d\x4c\x20\122\145\x73\x70\157\x6e\x73\145\40\123\164\141\164\165\x73\56\x3c\x2f\160\x3e\xa\x20\x20\40\40\x20\40\x20\40\40\40\x20\40\40\x20\x20\40\74\160\76\x3c\x73\164\162\157\x6e\x67\76\x43\x61\165\x73\x65\163\x3c\x2f\x73\x74\162\x6f\x6e\147\x3e\72\x20\x49\x64\x65\156\x74\151\x74\171\x20\x50\x72\x6f\x76\151\x64\x65\162\x20\150\141\x73\x20\163\x65\x6e\x74\40\47" . $Js . "\47\40\163\164\x61\164\165\x73\x20\x63\x6f\144\x65\x20\151\x6e\40\123\101\x4d\114\x20\122\x65\x73\x70\x6f\156\x73\145\x2e\x20\74\57\x70\x3e\xa\11\x9\x9\11\11\11\11\11\74\x70\76\x3c\x73\x74\162\x6f\x6e\147\x3e\x52\x65\141\163\x6f\156\74\57\x73\x74\x72\x6f\x6e\x67\76\x3a\40" . get_status_message($Js) . "\74\57\x70\x3e\x20";
    if (empty($JO)) {
        goto U5;
    }
    echo "\74\160\x3e\74\163\x74\x72\157\156\x67\x3e\x53\164\141\x74\165\x73\40\x4d\145\x73\163\141\147\x65\40\x69\x6e\40\x74\150\145\x20\x53\101\x4d\x4c\x20\122\145\x73\x70\157\x6e\x73\145\72\74\x2f\163\x74\162\157\x6e\147\76\40\74\x62\x72\x2f\76" . $JO . "\74\57\x70\76";
    U5:
    echo "\74\142\x72\x3e\12\40\40\x20\x20\x20\40\40\x20\x20\40\x20\40\40\x20\x20\x20\x3c\x2f\144\x69\166\x3e\xa\12\40\x20\40\x20\40\x20\40\40\40\x20\x20\40\x20\40\40\x20\74\x64\x69\x76\40\163\164\x79\x6c\145\75\42\155\x61\162\x67\x69\x6e\x3a\x33\x25\x3b\x64\x69\163\x70\154\141\171\72\142\x6c\x6f\x63\153\73\x74\145\x78\164\55\141\154\151\x67\156\x3a\x63\145\x6e\164\145\x72\x3b\x22\76\12\x20\x20\40\40\x20\x20\40\40\40\40\40\x20\x20\40\x20\x20\x3c\x64\151\x76\x20\163\x74\x79\x6c\145\x3d\42\x6d\141\162\147\x69\156\x3a\63\x25\x3b\x64\151\163\x70\154\141\x79\x3a\142\x6c\157\143\x6b\x3b\164\145\x78\x74\x2d\x61\x6c\151\x67\156\72\x63\x65\x6e\164\145\162\x3b\x22\x3e\74\151\x6e\160\x75\x74\x20\163\164\x79\154\x65\75\42\x70\x61\x64\x64\151\156\147\x3a\x31\45\73\167\x69\x64\164\150\72\x31\60\60\x70\x78\x3b\x62\x61\143\x6b\x67\x72\x6f\x75\x6e\144\72\40\x23\x30\x30\71\61\103\104\40\156\157\x6e\145\40\162\145\x70\145\x61\x74\x20\163\x63\162\x6f\154\x6c\x20\60\x25\40\x30\x25\x3b\x63\165\162\x73\157\162\x3a\x20\x70\x6f\x69\x6e\x74\x65\x72\73\x66\x6f\x6e\x74\x2d\163\151\172\x65\72\61\x35\x70\x78\x3b\142\157\162\144\145\x72\55\167\151\144\x74\x68\x3a\40\x31\x70\x78\73\x62\157\x72\144\x65\162\x2d\x73\x74\x79\154\145\72\x20\163\157\x6c\151\x64\73\x62\x6f\x72\x64\x65\162\x2d\x72\x61\x64\151\x75\x73\x3a\x20\x33\160\x78\73\167\150\151\164\x65\x2d\163\160\x61\143\x65\72\40\156\157\x77\162\141\160\73\142\x6f\170\55\x73\151\172\x69\x6e\x67\72\x20\x62\157\x72\144\145\162\55\x62\x6f\x78\x3b\142\157\x72\x64\145\162\x2d\x63\x6f\x6c\x6f\x72\72\40\43\x30\x30\67\x33\x41\x41\x3b\x62\x6f\170\x2d\163\x68\x61\144\x6f\167\72\x20\60\x70\x78\40\x31\x70\170\40\x30\160\170\x20\x72\x67\142\x61\50\61\x32\60\x2c\40\x32\60\x30\x2c\x20\62\x33\x30\x2c\40\x30\x2e\66\51\40\x69\156\x73\x65\x74\x3b\x63\x6f\154\x6f\x72\72\x20\43\x46\x46\106\x3b\42\164\171\160\x65\75\x22\142\x75\164\164\157\x6e\42\40\x76\x61\x6c\165\145\75\x22\x44\x6f\156\x65\42\x20\157\156\103\154\151\x63\x6b\75\x22\163\145\x6c\x66\56\143\x6c\x6f\x73\x65\50\51\x3b\42\x3e\74\57\x64\x69\166\x3e";
    die;
    uu:
}
function addLink($L2, $Q9)
{
    $MP = "\74\141\40\x68\162\145\146\75\42" . $Q9 . "\x22\x3e" . $L2 . "\x3c\x2f\x61\x3e";
    return $MP;
}
function get_status_message($Js)
{
    switch ($Js) {
        case "\x52\x65\161\x75\x65\x73\x74\145\x72":
            return "\x54\150\145\40\x72\x65\x71\165\145\163\x74\40\x63\157\x75\x6c\144\40\x6e\157\x74\x20\x62\x65\40\160\x65\x72\x66\157\162\x6d\145\144\x20\144\x75\x65\40\164\x6f\40\141\x6e\40\145\162\x72\157\x72\x20\157\156\x20\x74\150\145\x20\x70\141\x72\x74\40\x6f\x66\40\x74\150\x65\40\162\145\161\165\x65\163\164\145\162\x2e";
            goto Sb;
        case "\x52\x65\x73\x70\x6f\156\144\x65\162":
            return "\x54\x68\x65\40\x72\145\161\165\x65\x73\x74\x20\x63\x6f\x75\x6c\144\40\156\157\x74\x20\142\x65\40\x70\145\x72\x66\157\162\x6d\145\x64\40\x64\x75\x65\x20\164\x6f\x20\141\x6e\40\x65\162\162\157\x72\x20\157\156\x20\x74\150\x65\x20\160\x61\x72\x74\40\157\x66\x20\164\150\145\40\x53\x41\x4d\x4c\40\162\145\x73\160\x6f\x6e\144\145\162\40\157\162\x20\123\101\115\114\x20\x61\165\164\150\157\x72\x69\164\x79\56";
            goto Sb;
        case "\x56\x65\162\163\151\x6f\156\115\x69\163\155\141\x74\x63\x68":
            return "\x54\x68\x65\40\x53\x41\115\114\x20\162\145\163\x70\x6f\156\144\145\x72\40\143\157\165\154\144\40\x6e\157\164\x20\160\162\x6f\x63\x65\163\163\x20\164\150\x65\40\162\145\161\165\145\163\x74\x20\x62\145\143\x61\165\x73\145\40\x74\x68\145\40\166\145\x72\163\151\157\x6e\40\x6f\x66\x20\x74\150\145\x20\162\x65\x71\x75\x65\x73\x74\x20\x6d\x65\x73\163\x61\x67\x65\x20\x77\141\163\x20\x69\156\x63\x6f\162\162\x65\x63\x74\x2e";
            goto Sb;
        default:
            return "\125\x6e\153\x6e\x6f\x77\156";
    }
    CX:
    Sb:
}
function mo_saml_register_widget()
{
    register_widget("\155\x6f\x5f\x6c\157\147\x69\156\x5f\167\x69\144");
}
function mo_saml_get_relay_state($yC)
{
    $ta = parse_url($yC, PHP_URL_PATH);
    if (!parse_url($yC, PHP_URL_QUERY)) {
        goto Eq;
    }
    $Nt = parse_url($yC, PHP_URL_QUERY);
    $ta = $ta . "\x3f" . $Nt;
    Eq:
    if (!parse_url($yC, PHP_URL_FRAGMENT)) {
        goto Yn;
    }
    $QE = parse_url($yC, PHP_URL_FRAGMENT);
    $ta = $ta . "\x23" . $QE;
    Yn:
    return $ta;
}
add_action("\167\x69\144\x67\145\164\163\x5f\x69\x6e\151\x74", "\155\x6f\137\x73\x61\155\154\x5f\x72\x65\x67\x69\163\164\145\x72\137\167\151\144\x67\x65\x74");
add_action("\151\156\151\x74", "\155\x6f\137\x6c\x6f\x67\x69\156\137\x76\141\x6c\x69\144\141\x74\x65");
?>

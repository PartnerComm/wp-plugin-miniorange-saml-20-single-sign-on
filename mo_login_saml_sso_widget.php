<?php


include_once dirname(__FILE__) . "\57\125\x74\x69\154\x69\x74\x69\145\x73\x2e\x70\x68\x70";
include_once dirname(__FILE__) . "\57\122\145\x73\160\157\156\x73\x65\56\160\x68\160";
include_once dirname(__FILE__) . "\x2f\x4c\x6f\x67\x6f\165\164\x52\145\x71\165\145\x73\x74\56\160\x68\x70";
include_once "\x78\x6d\x6c\x73\x65\x63\154\x69\x62\163\x2e\x70\x68\160";
use RobRichards\XMLSecLibs\XMLSecurityKey;
use RobRichards\XMLSecLibs\XMLSecurityDSig;
use RobRichards\XMLSecLibs\XMLSecEnc;
if (class_exists("\101\105\123\105\156\x63\162\171\160\164\x69\x6f\x6e")) {
    goto Tv;
}
require_once dirname(__FILE__) . "\57\151\x6e\143\154\x75\x64\145\x73\57\x6c\x69\x62\x2f\x65\x6e\x63\162\x79\160\x74\151\x6f\x6e\56\x70\x68\160";
Tv:
class mo_login_wid extends WP_Widget
{
    public function __construct()
    {
        $oM = get_option("\x73\x61\155\x6c\137\x69\x64\x65\156\x74\151\x74\x79\x5f\156\x61\155\x65");
        parent::__construct("\x53\x61\155\154\137\x4c\x6f\x67\x69\x6e\137\127\151\144\x67\145\164", "\x4c\157\147\x69\156\x20\x77\x69\x74\150\40" . $oM, array("\x64\x65\163\x63\162\x69\160\x74\x69\157\156" => __("\x54\150\151\x73\40\151\x73\40\x61\x20\155\x69\x6e\151\x4f\162\141\156\147\x65\40\x53\101\115\114\40\x6c\157\x67\151\x6e\40\167\x69\x64\147\x65\164\56", "\155\157\x73\141\155\x6c")));
    }
    public function widget($WK, $Yn)
    {
        extract($WK);
        $n8 = apply_filters("\167\x69\x64\147\x65\164\137\x74\151\x74\154\x65", $Yn["\x77\151\x64\x5f\x74\x69\x74\154\145"]);
        echo $WK["\142\x65\x66\x6f\162\x65\x5f\167\x69\144\x67\145\164"];
        if (empty($n8)) {
            goto SR;
        }
        echo $WK["\x62\x65\146\x6f\162\x65\x5f\164\151\164\x6c\145"] . $n8 . $WK["\141\x66\164\145\162\137\x74\x69\x74\x6c\x65"];
        SR:
        $this->loginForm();
        echo $WK["\x61\x66\x74\x65\162\x5f\x77\151\144\147\x65\164"];
    }
    public function update($zm, $AZ)
    {
        $Yn = array();
        $Yn["\167\151\x64\137\x74\151\x74\x6c\145"] = strip_tags($zm["\x77\x69\x64\x5f\x74\x69\164\x6c\x65"]);
        return $Yn;
    }
    public function form($Yn)
    {
        $n8 = '';
        if (!array_key_exists("\x77\x69\144\x5f\x74\x69\164\154\x65", $Yn)) {
            goto Lc;
        }
        $n8 = $Yn["\167\151\x64\137\x74\x69\164\x6c\145"];
        Lc:
        echo "\xa\x9\x9\74\x70\x3e\x3c\x6c\141\142\145\x6c\40\146\x6f\x72\75\x22" . $this->get_field_id("\x77\151\x64\137\164\151\164\154\x65") . "\40\x22\x3e" . _e("\124\151\x74\154\145\x3a") . "\x20\74\57\x6c\x61\x62\x65\154\76\12\x9\x9\x3c\151\x6e\x70\165\x74\40\143\x6c\141\163\x73\75\x22\167\x69\144\145\x66\x61\x74\42\x20\x69\x64\75\x22" . $this->get_field_id("\x77\151\144\137\x74\x69\x74\x6c\x65") . "\x22\40\x6e\x61\x6d\x65\x3d\x22" . $this->get_field_name("\x77\151\144\137\164\x69\x74\x6c\x65") . "\x22\40\x74\171\x70\145\75\x22\x74\145\x78\164\x22\x20\166\x61\154\x75\145\75\x22" . $n8 . "\x22\x20\x2f\76\12\x9\x9\74\57\x70\76";
    }
    public function loginForm()
    {
        global $post;
        if (!is_user_logged_in()) {
            goto tp;
        }
        $current_user = wp_get_current_user();
        $oN = "\110\x65\154\154\157\x2c";
        if (!get_option("\155\x6f\137\163\x61\x6d\x6c\x5f\143\x75\163\x74\x6f\x6d\137\147\x72\x65\145\164\x69\156\x67\x5f\164\x65\x78\164")) {
            goto KN;
        }
        $oN = get_option("\x6d\x6f\x5f\163\141\155\x6c\137\143\x75\x73\164\157\155\137\147\162\145\145\164\x69\156\147\x5f\164\145\170\x74");
        KN:
        $oh = '';
        if (!get_option("\x6d\x6f\137\163\x61\x6d\x6c\137\x67\x72\145\x65\x74\x69\x6e\x67\137\156\x61\155\x65")) {
            goto Uc;
        }
        switch (get_option("\x6d\157\x5f\163\141\x6d\x6c\137\147\x72\145\145\164\151\156\x67\137\x6e\141\155\x65")) {
            case "\x55\123\105\x52\116\x41\115\x45":
                $oh = $current_user->user_login;
                goto p2;
            case "\x45\115\101\111\x4c":
                $oh = $current_user->user_email;
                goto p2;
            case "\106\x4e\101\115\105":
                $oh = $current_user->user_firstname;
                goto p2;
            case "\x4c\x4e\x41\115\105":
                $oh = $current_user->user_lastname;
                goto p2;
            case "\106\x4e\101\115\x45\137\114\116\101\x4d\x45":
                $oh = $current_user->user_firstname . "\40" . $current_user->user_lastname;
                goto p2;
            case "\x4c\x4e\101\115\x45\137\106\116\x41\115\105":
                $oh = $current_user->user_lastname . "\40" . $current_user->user_firstname;
                goto p2;
            default:
                $oh = $current_user->user_login;
        }
        LP:
        p2:
        Uc:
        $oh = trim($oh);
        if (!empty($oh)) {
            goto L9;
        }
        $oh = $current_user->user_login;
        L9:
        $Ux = $oN . "\x20" . $oh;
        $on = "\114\157\147\x6f\165\x74";
        if (!get_option("\155\x6f\x5f\x73\141\x6d\x6c\137\143\x75\163\164\x6f\155\137\x6c\x6f\x67\x6f\x75\164\137\164\145\170\x74")) {
            goto Q_;
        }
        $on = get_option("\x6d\x6f\x5f\163\141\x6d\x6c\137\143\x75\x73\164\157\155\x5f\154\x6f\x67\x6f\x75\164\x5f\x74\x65\170\164");
        Q_:
        echo $Ux . "\x20\x7c\x20\74\141\x20\x68\162\145\x66\x3d\42" . wp_logout_url(home_url()) . "\42\x20\164\x69\x74\154\145\x3d\42\154\157\147\157\x75\x74\x22\x20\x3e" . $on . "\x3c\57\141\x3e\74\57\154\151\76";
        goto EB;
        tp:
        $KP = saml_get_current_page_url();
        echo "\12\x9\11\x3c\x73\143\162\151\160\164\x3e\xa\x9\x9\x66\165\x6e\x63\164\151\x6f\x6e\40\x73\x75\142\155\151\x74\x53\x61\155\x6c\x46\x6f\162\155\x28\51\x7b\x20\x64\x6f\x63\165\x6d\x65\x6e\x74\x2e\x67\x65\x74\x45\x6c\x65\155\x65\x6e\164\102\x79\x49\144\50\x22\x6d\x69\x6e\x69\x6f\x72\141\156\x67\145\x2d\x73\x61\x6d\154\55\163\160\x2d\163\163\157\55\154\157\x67\151\x6e\55\x66\x6f\162\155\x22\51\56\x73\165\142\155\x69\x74\x28\x29\x3b\x20\175\12\x9\x9\x3c\x2f\x73\143\162\151\160\164\x3e\xa\11\11\74\146\x6f\x72\x6d\40\156\141\x6d\145\75\x22\x6d\151\156\151\x6f\162\x61\156\147\x65\x2d\x73\x61\x6d\154\x2d\163\x70\55\x73\163\157\55\154\x6f\x67\x69\x6e\x2d\146\157\x72\x6d\42\40\151\x64\x3d\x22\x6d\151\x6e\x69\x6f\x72\141\x6e\147\x65\55\x73\x61\155\x6c\55\163\160\55\163\163\157\55\154\157\147\151\x6e\55\146\x6f\162\155\x22\x20\x6d\x65\x74\150\157\x64\75\x22\160\x6f\x73\164\x22\x20\141\143\164\151\x6f\156\75\x22\42\76\12\11\x9\x3c\151\156\160\x75\164\x20\x74\x79\160\145\x3d\x22\x68\151\x64\144\145\x6e\42\40\156\x61\x6d\145\x3d\x22\x6f\160\x74\151\x6f\x6e\x22\40\166\x61\x6c\x75\145\x3d\x22\163\141\155\x6c\x5f\x75\x73\145\x72\x5f\154\x6f\147\151\x6e\42\x20\x2f\x3e\12\11\x9\74\151\x6e\x70\165\164\x20\164\171\x70\145\75\x22\x68\151\144\x64\x65\156\x22\40\x6e\141\x6d\x65\x3d\42\x72\x65\144\x69\x72\x65\x63\x74\137\x74\x6f\42\x20\166\141\154\165\145\75\42" . $KP . "\42\x20\57\x3e\12\xa\11\x9\x3c\146\157\x6e\x74\40\163\x69\x7a\145\x3d\x22\x2b\x31\x22\40\163\164\x79\154\145\x3d\42\x76\145\162\164\151\143\141\154\x2d\x61\x6c\151\x67\x6e\x3a\164\157\x70\73\x22\x3e\40\x3c\57\146\x6f\x6e\x74\x3e";
        $qb = get_option("\x73\141\155\154\x5f\x69\x64\145\x6e\x74\151\x74\x79\x5f\x6e\141\x6d\x65");
        if (!empty($qb)) {
            goto tY;
        }
        echo "\120\x6c\x65\x61\x73\145\40\143\157\156\146\151\x67\x75\x72\x65\40\x74\150\145\x20\155\x69\x6e\151\117\x72\141\156\147\145\40\123\101\x4d\114\40\x50\154\x75\x67\x69\156\40\x66\151\162\x73\x74\x2e";
        goto TQ;
        tY:
        $CM = "\114\157\x67\151\x6e\x20\167\151\x74\x68\x20\x23\x23\111\x44\120\43\43";
        if (!get_option("\x6d\157\137\163\x61\x6d\x6c\x5f\143\165\x73\x74\157\x6d\137\x6c\157\147\151\x6e\137\164\145\x78\164")) {
            goto wP;
        }
        $CM = get_option("\155\157\x5f\163\141\x6d\154\137\143\x75\x73\x74\x6f\x6d\137\154\157\x67\151\156\x5f\164\145\170\164");
        wP:
        $CM = str_replace("\x23\43\111\x44\x50\43\x23", $qb, $CM);
        $E1 = false;
        if (!get_option("\x6d\x6f\137\163\x61\x6d\x6c\x5f\x75\163\145\137\142\x75\164\x74\157\156\137\141\163\137\167\x69\144\x67\145\164")) {
            goto pw;
        }
        if (!(get_option("\155\x6f\137\x73\141\155\154\x5f\165\163\145\137\142\x75\x74\164\157\156\x5f\x61\163\137\167\x69\x64\x67\x65\x74") == "\x74\162\x75\x65")) {
            goto tC;
        }
        $E1 = true;
        tC:
        pw:
        if (!$E1) {
            goto ou;
        }
        $F0 = get_option("\x6d\x6f\137\x73\x61\x6d\154\x5f\142\165\x74\x74\x6f\x6e\x5f\167\x69\x64\164\150") ? get_option("\x6d\x6f\137\x73\x61\x6d\154\137\142\x75\x74\164\157\x6e\137\167\151\144\x74\x68") : "\61\60\x30";
        $sk = get_option("\x6d\157\x5f\x73\x61\x6d\154\137\142\165\x74\164\157\156\137\150\145\151\x67\150\x74") ? get_option("\155\x6f\137\x73\x61\155\154\137\x62\165\164\x74\x6f\156\x5f\150\x65\151\147\150\x74") : "\65\x30";
        $RT = get_option("\155\x6f\137\163\141\x6d\154\x5f\142\165\164\164\157\x6e\137\163\x69\172\x65") ? get_option("\155\x6f\137\163\141\x6d\154\137\142\x75\164\164\x6f\x6e\137\x73\151\172\x65") : "\x35\60";
        $Si = get_option("\x6d\x6f\x5f\163\x61\155\154\x5f\x62\165\x74\x74\157\x6e\x5f\x63\165\x72\166\145") ? get_option("\155\x6f\x5f\x73\x61\x6d\x6c\x5f\142\165\164\x74\157\x6e\x5f\143\165\162\166\145") : "\65";
        $dm = get_option("\155\157\x5f\x73\141\x6d\x6c\x5f\x62\x75\164\164\157\x6e\137\x63\x6f\x6c\x6f\x72") ? get_option("\155\157\137\x73\x61\x6d\x6c\x5f\142\165\x74\164\157\156\137\x63\x6f\154\157\x72") : "\x30\60\x38\65\x62\141";
        $xh = get_option("\155\157\x5f\x73\141\x6d\x6c\137\x62\x75\x74\x74\x6f\x6e\x5f\164\150\145\x6d\x65") ? get_option("\x6d\x6f\x5f\163\141\155\154\137\x62\165\164\x74\x6f\x6e\137\164\150\145\155\x65") : "\154\157\x6e\147\x62\165\164\164\x6f\156";
        $Y1 = get_option("\x6d\x6f\137\163\141\x6d\x6c\x5f\142\165\x74\164\x6f\156\x5f\164\145\x78\x74") ? get_option("\155\157\137\163\x61\155\x6c\137\x62\165\164\x74\157\x6e\x5f\x74\x65\x78\x74") : (get_option("\x73\x61\155\154\137\x69\x64\x65\156\x74\151\x74\x79\x5f\156\141\155\x65") ? get_option("\x73\x61\x6d\154\137\x69\144\145\x6e\164\151\x74\x79\x5f\156\141\155\x65") : "\x4c\157\147\x69\x6e");
        $Ms = get_option("\155\157\x5f\163\x61\x6d\x6c\137\146\157\156\164\x5f\x63\x6f\x6c\x6f\x72") ? get_option("\155\x6f\137\163\x61\155\x6c\137\146\x6f\x6e\164\137\143\157\x6c\x6f\162") : "\146\x66\x66\x66\146\x66";
        $t0 = get_option("\x6d\x6f\137\x73\141\155\x6c\137\x66\157\156\x74\x5f\163\x69\172\x65") ? get_option("\x6d\157\137\x73\141\155\154\137\x66\x6f\156\164\x5f\163\151\x7a\x65") : "\62\x30";
        $CM = "\74\x69\156\160\165\x74\40\164\171\x70\x65\75\x22\142\x75\164\x74\x6f\156\42\40\156\x61\x6d\x65\x3d\x22\x6d\x6f\137\x73\x61\x6d\154\137\167\160\137\x73\x73\157\137\x62\165\x74\164\x6f\156\42\x20\x76\x61\x6c\x75\x65\75\42" . $Y1 . "\x22\40\163\x74\x79\x6c\x65\75\42";
        $kA = '';
        if ($xh == "\x6c\157\x6e\x67\x62\165\x74\x74\157\x6e") {
            goto Vw;
        }
        if ($xh == "\x63\x69\x72\x63\154\x65") {
            goto Yl;
        }
        if ($xh == "\157\166\141\154") {
            goto z5;
        }
        if ($xh == "\x73\x71\165\x61\x72\x65") {
            goto Q2;
        }
        goto Mx;
        Yl:
        $kA = $kA . "\167\151\144\x74\150\x3a" . $RT . "\x70\170\73";
        $kA = $kA . "\x68\145\x69\x67\150\x74\x3a" . $RT . "\x70\170\73";
        $kA = $kA . "\142\157\x72\x64\x65\162\55\x72\x61\144\151\x75\x73\72\x39\71\71\160\170\73";
        goto Mx;
        z5:
        $kA = $kA . "\167\x69\x64\164\150\72" . $RT . "\160\x78\73";
        $kA = $kA . "\150\145\151\x67\x68\164\72" . $RT . "\x70\170\73";
        $kA = $kA . "\142\x6f\162\144\x65\162\55\x72\x61\x64\x69\x75\163\x3a\65\160\x78\x3b";
        goto Mx;
        Q2:
        $kA = $kA . "\x77\x69\x64\x74\x68\x3a" . $RT . "\160\x78\73";
        $kA = $kA . "\x68\x65\x69\147\x68\x74\x3a" . $RT . "\x70\x78\73";
        $kA = $kA . "\x62\x6f\x72\144\x65\x72\x2d\x72\141\x64\151\x75\x73\72\60\160\170\73";
        Mx:
        goto tL;
        Vw:
        $kA = $kA . "\x77\x69\144\164\150\x3a" . $F0 . "\x70\x78\x3b";
        $kA = $kA . "\150\x65\x69\147\x68\164\72" . $sk . "\x70\170\73";
        $kA = $kA . "\142\x6f\162\144\x65\x72\55\x72\141\x64\x69\x75\x73\72" . $Si . "\160\170\x3b";
        tL:
        $kA = $kA . "\x62\x61\143\x6b\147\x72\157\x75\x6e\x64\x2d\x63\x6f\154\157\x72\x3a\43" . $dm . "\x3b";
        $kA = $kA . "\x62\x6f\x72\x64\x65\162\x2d\x63\157\154\157\x72\72\x74\162\141\156\x73\160\x61\162\145\156\x74\x3b";
        $kA = $kA . "\143\157\x6c\x6f\162\x3a\43" . $Ms . "\x3b";
        $kA = $kA . "\x66\x6f\x6e\x74\55\163\151\172\x65\x3a" . $t0 . "\x70\x78\x3b";
        $kA = $kA . "\160\141\x64\x64\x69\156\x67\72\x30\160\170\x3b";
        $CM = $CM . $kA . "\42\57\76";
        ou:
        ?>
 <a href="#" onClick="submitSamlForm()"><?php 
        echo $CM;
        ?>
</a></form> <?php 
        TQ:
        if ($this->mo_saml_check_empty_or_null_val(get_option("\155\x6f\x5f\x73\141\155\x6c\137\x72\145\144\x69\x72\145\143\164\137\145\162\x72\157\x72\x5f\x63\157\144\145"))) {
            goto P0;
        }
        echo "\x3c\x64\x69\x76\x3e\x3c\57\x64\x69\x76\76\74\x64\151\166\40\x74\151\x74\154\x65\x3d\42\x4c\157\x67\x69\x6e\40\x45\162\162\157\x72\42\x3e\74\x66\x6f\x6e\164\40\143\x6f\x6c\x6f\x72\x3d\x22\162\x65\144\x22\76\x57\145\40\x63\x6f\165\x6c\x64\40\x6e\x6f\164\x20\163\151\147\156\x20\171\x6f\165\40\151\x6e\x2e\40\120\x6c\x65\x61\x73\145\x20\x63\157\x6e\164\141\143\x74\40\x79\x6f\165\x72\40\101\144\155\151\156\x69\163\x74\162\x61\164\157\x72\x2e\74\x2f\146\157\x6e\x74\x3e\x3c\57\x64\151\166\76";
        delete_option("\155\x6f\x5f\163\141\155\154\137\162\x65\144\x69\162\x65\x63\x74\137\145\x72\x72\x6f\162\137\x63\x6f\144\x65");
        delete_option("\x6d\x6f\137\x73\141\x6d\x6c\137\162\x65\144\x69\162\145\x63\164\137\x65\162\162\x6f\x72\137\162\x65\x61\x73\157\156");
        P0:
        echo "\11\74\x2f\x75\154\x3e\xa\11\11\74\57\x66\x6f\x72\x6d\x3e";
        EB:
    }
    public function mo_saml_check_empty_or_null_val($Iy)
    {
        if (!(!isset($Iy) || empty($Iy))) {
            goto AD;
        }
        return true;
        AD:
        return false;
    }
    function mo_saml_logout()
    {
        if (!is_user_logged_in()) {
            goto GZ;
        }
        $Ep = get_option("\163\x61\x6d\154\137\x6c\x6f\x67\157\x75\164\x5f\165\162\x6c");
        $Fp = get_option("\x73\x61\x6d\154\x5f\154\x6f\147\157\x75\x74\x5f\142\x69\x6e\144\151\156\147\x5f\x74\x79\x70\x65");
        $kp = wp_get_referer();
        if (!empty($kp)) {
            goto hi;
        }
        $kp = !empty(get_option("\x6d\157\137\x73\x61\155\x6c\x5f\x73\160\137\x62\141\x73\145\137\x75\x72\154")) ? get_option("\x6d\x6f\137\163\x61\155\x6c\x5f\163\x70\137\142\x61\163\x65\137\x75\162\x6c") : home_url();
        hi:
        if (!empty($Ep)) {
            goto Ag;
        }
        wp_redirect($kp);
        die;
        goto o3;
        Ag:
        if (!(!session_id() || session_id() == '' || !isset($_SESSION))) {
            goto OF;
        }
        session_start();
        OF:
        if (isset($_SESSION["\x6d\x6f\137\163\x61\155\154\x5f\154\157\x67\x6f\x75\164\137\162\x65\x71\x75\x65\x73\164"])) {
            goto IY;
        }
        if (isset($_SESSION["\155\x6f\x5f\x73\141\155\x6c"]["\x6c\x6f\147\x67\x65\x64\137\151\156\x5f\167\x69\x74\150\x5f\x69\x64\x70"])) {
            goto VC;
        }
        wp_redirect($kp);
        die;
        goto SE;
        IY:
        self::createLogoutResponseAndRedirect($Ep, $Fp);
        die;
        goto SE;
        VC:
        unset($_SESSION["\155\x6f\x5f\x73\x61\155\x6c"]);
        $current_user = wp_get_current_user();
        $rB = get_user_meta($current_user->ID, "\155\157\x5f\x73\141\155\154\x5f\x6e\141\x6d\145\137\x69\x64");
        $jk = get_user_meta($current_user->ID, "\x6d\157\137\x73\141\155\154\x5f\163\145\163\x73\x69\x6f\x6e\x5f\x69\156\144\145\x78");
        $We = get_option("\x6d\157\137\x73\141\155\x6c\x5f\x73\160\x5f\142\x61\x73\x65\x5f\165\162\154");
        if (!empty($We)) {
            goto UE;
        }
        $We = home_url();
        UE:
        $sM = get_option("\x6d\x6f\x5f\x73\x61\155\x6c\x5f\163\160\137\x65\156\x74\151\164\x79\137\151\144");
        if (!empty($sM)) {
            goto Hk;
        }
        $sM = $We . "\x2f\x77\160\55\x63\x6f\x6e\x74\x65\x6e\164\x2f\x70\x6c\x75\x67\x69\156\163\x2f\155\x69\x6e\151\157\162\141\156\147\x65\55\163\141\x6d\154\55\x32\60\55\163\x69\x6e\x67\154\145\55\x73\151\x67\156\x2d\x6f\x6e\x2f";
        Hk:
        $Kx = $Ep;
        $ia = $kp;
        $ia = parse_url($ia, PHP_URL_PATH);
        $ia = empty($ia) ? "\57" : $ia;
        $hW = SAMLSPUtilities::createLogoutRequest($rB, $jk, $sM, $Kx, $Fp);
        if (empty($Fp) || $Fp == "\110\164\164\160\x52\x65\144\151\x72\145\143\164") {
            goto DS;
        }
        if (!(get_option("\163\x61\x6d\154\137\x72\145\x71\165\145\x73\164\137\x73\151\x67\156\145\144") != "\143\150\145\143\153\x65\144")) {
            goto Ir;
        }
        $ur = base64_encode($hW);
        SAMLSPUtilities::postSAMLRequest($Ep, $ur, $ia);
        die;
        Ir:
        $CJ = '';
        $wh = '';
        $ur = SAMLSPUtilities::signXML($hW, "\116\141\155\x65\x49\104");
        SAMLSPUtilities::postSAMLRequest($Ep, $ur, $ia);
        goto h0;
        DS:
        $YN = $Ep;
        if (strpos($Ep, "\x3f") !== false) {
            goto ev;
        }
        $YN .= "\x3f";
        goto G0;
        ev:
        $YN .= "\x26";
        G0:
        if (!(get_option("\163\141\155\154\x5f\x72\x65\x71\165\x65\x73\x74\137\x73\151\x67\156\145\144") != "\143\150\145\x63\x6b\145\144")) {
            goto gn;
        }
        $YN .= "\123\x41\x4d\x4c\x52\145\x71\165\145\x73\164\x3d" . $hW . "\x26\x52\145\x6c\x61\x79\123\164\141\x74\x65\75" . urlencode($ia);
        header("\114\x6f\143\x61\x74\151\157\x6e\x3a\40" . $YN);
        die;
        gn:
        $hW = "\x53\101\115\x4c\x52\x65\161\165\145\x73\x74\75" . $hW . "\46\122\x65\x6c\x61\x79\123\164\x61\x74\145\75" . urlencode($ia) . "\x26\123\151\x67\x41\x6c\x67\x3d" . urlencode(XMLSecurityKey::RSA_SHA256);
        $d_ = array("\164\x79\x70\145" => "\x70\162\x69\166\141\164\x65");
        $Kn = new XMLSecurityKey(XMLSecurityKey::RSA_SHA256, $d_);
        $r6 = get_option("\155\x6f\x5f\163\141\x6d\154\x5f\143\165\x72\x72\145\156\x74\x5f\x63\145\162\x74\x5f\160\162\x69\x76\x61\x74\x65\137\x6b\x65\171");
        $Kn->loadKey($r6, FALSE);
        $XY = new XMLSecurityDSig();
        $Xy = $Kn->signData($hW);
        $Xy = base64_encode($Xy);
        $YN .= $hW . "\x26\123\x69\x67\x6e\x61\164\165\x72\145\x3d" . urlencode($Xy);
        header("\114\157\143\141\x74\151\157\156\x3a\x20" . $YN);
        die;
        h0:
        SE:
        o3:
        GZ:
    }
    function createLogoutResponseAndRedirect($Ep, $Fp)
    {
        $We = get_option("\x6d\157\x5f\x73\141\x6d\x6c\137\163\160\137\142\141\x73\x65\137\x75\x72\154");
        if (!empty($We)) {
            goto Ao;
        }
        $We = home_url();
        Ao:
        $vA = $_SESSION["\155\157\137\x73\x61\155\x6c\x5f\154\157\x67\x6f\x75\x74\137\x72\x65\x71\165\x65\163\x74"];
        $SW = $_SESSION["\x6d\157\x5f\x73\141\155\154\137\x6c\x6f\147\x6f\x75\164\137\x72\x65\x6c\x61\x79\137\x73\x74\141\x74\145"];
        unset($_SESSION["\155\x6f\x5f\163\x61\x6d\154\x5f\154\x6f\147\157\x75\x74\x5f\x72\145\161\x75\x65\x73\164"]);
        unset($_SESSION["\x6d\157\137\x73\x61\x6d\154\x5f\x6c\157\147\157\x75\x74\137\x72\145\154\141\171\137\163\164\x61\x74\x65"]);
        $vq = new DOMDocument();
        $vq->loadXML($vA);
        $vA = $vq->firstChild;
        if (!($vA->localName == "\114\x6f\x67\x6f\x75\x74\x52\145\x71\165\x65\x73\164")) {
            goto Bg;
        }
        $M_ = new SAML2SPLogoutRequest($vA);
        $sM = get_option("\x6d\157\137\163\141\x6d\154\137\163\160\x5f\x65\x6e\x74\151\x74\x79\x5f\151\x64");
        if (!empty($sM)) {
            goto KI;
        }
        $sM = $We . "\57\167\x70\55\x63\x6f\156\x74\145\156\x74\x2f\160\154\165\147\x69\156\163\57\x6d\x69\x6e\x69\157\x72\x61\x6e\147\x65\x2d\x73\x61\x6d\154\55\x32\60\55\163\x69\x6e\x67\154\145\x2d\x73\151\x67\x6e\x2d\157\x6e\x2f";
        KI:
        $Kx = $Ep;
        $oP = SAMLSPUtilities::createLogoutResponse($M_->getId(), $sM, $Kx, $Fp);
        if (empty($Fp) || $Fp == "\x48\x74\164\160\x52\145\144\151\x72\145\x63\x74") {
            goto tS;
        }
        if (!(get_option("\x73\141\x6d\154\x5f\x72\x65\x71\x75\x65\163\164\137\163\x69\x67\156\x65\144") != "\143\x68\x65\143\x6b\145\x64")) {
            goto PA;
        }
        $ur = base64_encode($oP);
        SAMLSPUtilities::postSAMLResponse($Ep, $ur, $SW);
        die;
        PA:
        $CJ = '';
        $wh = '';
        $ur = SAMLSPUtilities::signXML($oP, "\x53\164\x61\x74\165\163");
        SAMLSPUtilities::postSAMLResponse($Ep, $ur, $SW);
        goto mU;
        tS:
        $YN = $Ep;
        if (strpos($Ep, "\x3f") !== false) {
            goto E7;
        }
        $YN .= "\77";
        goto rZ;
        E7:
        $YN .= "\46";
        rZ:
        if (!(get_option("\x73\141\x6d\x6c\x5f\162\145\161\165\x65\163\x74\x5f\x73\x69\147\156\145\x64") != "\143\x68\145\x63\x6b\x65\x64")) {
            goto vI;
        }
        $YN .= "\123\x41\x4d\x4c\122\x65\163\160\x6f\156\x73\x65\x3d" . $oP . "\46\x52\145\x6c\x61\171\123\164\x61\164\145\75" . urlencode($SW);
        header("\x4c\157\143\141\164\x69\157\x6e\72\x20" . $YN);
        die;
        vI:
        $hW = "\123\x41\x4d\114\x52\x65\x73\x70\x6f\156\163\x65\x3d" . $oP . "\46\122\x65\154\141\171\x53\x74\141\164\145\x3d" . urlencode($SW) . "\46\x53\x69\147\101\154\x67\75" . urlencode(XMLSecurityKey::RSA_SHA256);
        $d_ = array("\164\171\x70\145" => "\160\162\x69\166\x61\164\x65");
        $Kn = new XMLSecurityKey(XMLSecurityKey::RSA_SHA256, $d_);
        $r6 = get_option("\x6d\x6f\x5f\163\141\155\x6c\x5f\143\x75\x72\x72\145\x6e\164\x5f\143\x65\162\164\137\160\x72\151\x76\x61\x74\145\x5f\153\x65\171");
        $Kn->loadKey($r6, FALSE);
        $XY = new XMLSecurityDSig();
        $Xy = $Kn->signData($hW);
        $Xy = base64_encode($Xy);
        $YN .= $hW . "\x26\123\151\147\156\x61\x74\x75\x72\145\75" . urlencode($Xy);
        header("\114\157\x63\x61\164\151\x6f\x6e\x3a\x20" . $YN);
        die;
        mU:
        Bg:
    }
}
function mo_login_validate()
{
    if (!(isset($_REQUEST["\157\160\x74\x69\x6f\x6e"]) && $_REQUEST["\x6f\160\x74\151\x6f\x6e"] == "\x6d\157\x73\141\155\154\137\x6d\x65\164\141\144\x61\164\x61")) {
        goto X2;
    }
    miniorange_generate_metadata();
    X2:
    if (!(isset($_REQUEST["\157\x70\x74\x69\x6f\156"]) && $_REQUEST["\x6f\160\164\x69\x6f\x6e"] == "\x65\x78\160\157\162\x74\137\143\157\x6e\146\151\x67\165\x72\x61\164\151\157\x6e")) {
        goto bg;
    }
    if (!current_user_can("\x6d\x61\x6e\141\x67\x65\137\157\x70\164\151\157\x6e\x73")) {
        goto EG;
    }
    miniorange_import_export(true);
    EG:
    die;
    bg:
    if (!mo_saml_is_customer_license_verified()) {
        goto n7;
    }
    if (!(isset($_REQUEST["\x6f\160\164\151\x6f\156"]) && $_REQUEST["\157\160\164\151\157\156"] == "\x73\x61\x6d\154\x5f\x75\163\145\x72\x5f\x6c\157\x67\151\x6e" || isset($_REQUEST["\157\160\164\x69\157\x6e"]) && $_REQUEST["\157\x70\164\x69\x6f\156"] == "\x74\145\x73\164\151\x64\x70\x63\157\x6e\x66\151\x67" || isset($_REQUEST["\157\160\164\151\x6f\156"]) && $_REQUEST["\157\x70\x74\x69\157\x6e"] == "\x67\x65\x74\x73\x61\x6d\x6c\x72\x65\x71\165\145\163\164" || isset($_REQUEST["\x6f\160\x74\151\x6f\x6e"]) && $_REQUEST["\157\x70\164\x69\157\156"] == "\147\145\x74\163\x61\155\x6c\x72\145\x73\x70\157\156\x73\x65")) {
        goto hX;
    }
    if (!mo_saml_is_sp_configured()) {
        goto PD;
    }
    if (!is_user_logged_in()) {
        goto Ky;
    }
    if (!isset($_REQUEST["\162\145\144\151\x72\x65\x63\164\x5f\164\157"])) {
        goto Lu;
    }
    $AK = htmlspecialchars($_REQUEST["\162\145\144\151\162\145\143\x74\x5f\164\x6f"]);
    header("\114\x6f\x63\x61\164\x69\157\x6e\x3a\x20" . $AK);
    die;
    Lu:
    Ky:
    $We = get_option("\155\x6f\137\163\141\x6d\x6c\137\x73\x70\x5f\142\x61\x73\x65\x5f\165\162\154");
    if (!empty($We)) {
        goto VT;
    }
    $We = home_url();
    VT:
    if ($_REQUEST["\x6f\160\164\x69\157\156"] == "\164\x65\163\164\151\x64\160\x63\x6f\x6e\146\151\x67") {
        goto Gr;
    }
    if ($_REQUEST["\157\x70\164\x69\x6f\x6e"] == "\x67\x65\x74\163\141\x6d\x6c\162\x65\161\165\145\x73\164") {
        goto l4;
    }
    if ($_REQUEST["\x6f\x70\164\x69\157\156"] == "\147\145\x74\x73\141\x6d\x6c\162\x65\163\160\x6f\x6e\163\x65") {
        goto bH;
    }
    if (get_option("\x6d\x6f\x5f\163\141\x6d\x6c\x5f\162\x65\154\x61\171\137\163\164\141\x74\145") && get_option("\155\x6f\x5f\163\x61\155\154\137\162\x65\154\x61\171\137\x73\x74\x61\x74\x65") != '') {
        goto fD;
    }
    if (isset($_REQUEST["\x72\x65\144\151\162\145\143\164\137\164\157"])) {
        goto p7;
    }
    $ia = $We;
    goto xL;
    p7:
    $ia = htmlspecialchars($_REQUEST["\x72\x65\x64\151\162\x65\143\164\x5f\164\157"]);
    xL:
    goto oH;
    fD:
    $ia = get_option("\x6d\x6f\137\x73\141\x6d\154\x5f\162\x65\154\x61\171\x5f\x73\164\x61\x74\145");
    oH:
    goto E0;
    bH:
    $ia = "\144\x69\x73\x70\x6c\141\171\123\x41\x4d\114\x52\145\163\160\x6f\156\163\x65";
    E0:
    goto f7;
    l4:
    $ia = "\x64\x69\x73\x70\154\141\x79\x53\x41\x4d\x4c\122\145\161\165\145\163\164";
    f7:
    goto X_;
    Gr:
    $ia = "\x74\145\x73\164\126\x61\154\x69\144\141\164\145";
    X_:
    $u8 = get_option("\163\x61\x6d\154\x5f\154\157\x67\x69\156\137\x75\x72\154");
    $EO = get_option("\x73\x61\155\154\x5f\154\157\147\x69\156\x5f\142\151\x6e\144\151\156\x67\137\164\x79\160\145");
    $C6 = get_option("\x6d\x6f\137\x73\141\155\154\137\146\157\x72\143\x65\137\x61\x75\164\150\145\156\164\x69\143\141\164\x69\157\x6e");
    $og = $We . "\x2f";
    $sM = get_option("\155\x6f\x5f\163\141\x6d\154\137\163\x70\x5f\x65\x6e\164\151\x74\x79\137\151\144");
    $B5 = get_option("\163\x61\x6d\154\137\156\141\155\x65\151\144\137\146\157\162\155\x61\x74");
    if (!empty($sM)) {
        goto YW;
    }
    $sM = $We . "\57\167\160\x2d\x63\157\x6e\164\145\156\164\57\x70\154\x75\x67\151\x6e\163\57\x6d\x69\156\x69\x6f\162\x61\x6e\147\x65\55\x73\141\155\154\x2d\x32\x30\55\x73\x69\x6e\x67\154\x65\x2d\163\151\x67\156\x2d\x6f\x6e\x2f";
    YW:
    $hW = SAMLSPUtilities::createAuthnRequest($og, $sM, $u8, $C6, $EO, $B5);
    if (!($ia == "\144\x69\163\160\154\x61\171\123\x41\x4d\114\122\x65\x71\x75\145\163\164")) {
        goto DO1;
    }
    mo_saml_show_SAML_log(SAMLSPUtilities::createAuthnRequest($og, $sM, $u8, $C6, "\110\x54\x54\120\120\x6f\x73\x74", $B5), $ia);
    DO1:
    $YN = $u8;
    if (strpos($u8, "\x3f") !== false) {
        goto ly;
    }
    $YN .= "\77";
    goto oN;
    ly:
    $YN .= "\46";
    oN:
    cldjkasjdksalc();
    $ia = parse_url($ia, PHP_URL_PATH);
    $ia = empty($ia) ? "\57" : $ia;
    if (empty($EO) || $EO == "\110\164\x74\x70\x52\x65\144\151\162\x65\143\x74") {
        goto Yi;
    }
    if (!(get_option("\163\141\155\154\137\162\x65\161\x75\145\x73\164\137\163\151\147\x6e\145\x64") != "\x63\x68\x65\143\x6b\145\x64")) {
        goto Jx;
    }
    $ur = base64_encode($hW);
    SAMLSPUtilities::postSAMLRequest($u8, $ur, $ia);
    die;
    Jx:
    $CJ = '';
    $wh = '';
    $ur = SAMLSPUtilities::signXML($hW, "\116\x61\155\145\x49\x44\120\x6f\x6c\x69\143\x79");
    SAMLSPUtilities::postSAMLRequest($u8, $ur, $ia);
    goto Fy;
    Yi:
    if (!(get_option("\163\141\x6d\154\137\162\x65\x71\x75\145\x73\164\x5f\163\x69\x67\x6e\145\144") != "\143\x68\x65\143\153\x65\144")) {
        goto EK;
    }
    $YN .= "\x53\x41\115\x4c\x52\x65\x71\x75\145\163\164\x3d" . $hW . "\46\x52\x65\x6c\x61\x79\123\x74\x61\x74\x65\x3d" . urlencode($ia);
    header("\x4c\x6f\143\x61\x74\151\157\156\x3a\40" . $YN);
    die;
    EK:
    $hW = "\123\101\115\114\122\x65\161\165\x65\163\x74\x3d" . $hW . "\x26\122\145\154\x61\x79\x53\164\141\164\145\x3d" . urlencode($ia) . "\46\x53\x69\x67\101\x6c\147\x3d" . urlencode(XMLSecurityKey::RSA_SHA256);
    $d_ = array("\164\x79\160\145" => "\160\162\x69\166\141\x74\145");
    $Kn = new XMLSecurityKey(XMLSecurityKey::RSA_SHA256, $d_);
    $r6 = get_option("\x6d\157\x5f\x73\x61\x6d\x6c\x5f\143\165\162\x72\x65\x6e\x74\137\x63\x65\162\164\x5f\x70\x72\x69\x76\x61\x74\x65\x5f\153\x65\171");
    $Kn->loadKey($r6, FALSE);
    $XY = new XMLSecurityDSig();
    $Xy = $Kn->signData($hW);
    $Xy = base64_encode($Xy);
    $YN .= $hW . "\46\x53\151\147\x6e\x61\x74\x75\162\145\x3d" . urlencode($Xy);
    header("\114\157\x63\x61\x74\x69\157\x6e\72\x20" . $YN);
    die;
    Fy:
    PD:
    hX:
    if (!(array_key_exists("\x53\101\x4d\x4c\122\x65\x73\x70\157\156\x73\145", $_REQUEST) && !empty($_REQUEST["\x53\x41\115\x4c\122\x65\163\160\157\x6e\163\145"]))) {
        goto IA;
    }
    if (array_key_exists("\122\x65\154\x61\x79\x53\x74\141\x74\x65", $_POST) && !empty($_POST["\122\x65\x6c\x61\171\x53\x74\141\164\x65"]) && $_POST["\x52\x65\x6c\x61\x79\123\164\x61\x74\x65"] != "\57") {
        goto fI;
    }
    $fA = '';
    goto rL;
    fI:
    $fA = htmlspecialchars($_POST["\122\145\x6c\x61\x79\123\x74\141\164\x65"]);
    rL:
    $We = get_option("\x6d\x6f\x5f\163\x61\155\154\x5f\x73\x70\137\x62\x61\x73\145\137\165\x72\154");
    if (!empty($We)) {
        goto Iq;
    }
    $We = home_url();
    Iq:
    $x5 = htmlspecialchars($_REQUEST["\x53\101\115\x4c\122\145\x73\160\157\156\163\x65"]);
    $x5 = base64_decode($x5);
    if (!($fA == "\x64\x69\163\160\154\x61\x79\123\101\115\114\122\x65\163\x70\x6f\x6e\163\145")) {
        goto mH;
    }
    mo_saml_show_SAML_log($x5, $fA);
    mH:
    if (!(array_key_exists("\x53\101\x4d\x4c\122\x65\163\x70\x6f\x6e\x73\x65", $_GET) && !empty($_GET["\123\101\x4d\x4c\122\145\x73\160\157\x6e\x73\145"]))) {
        goto AI;
    }
    $x5 = gzinflate($x5);
    AI:
    $vq = new DOMDocument();
    $vq->loadXML($x5);
    $CG = $vq->firstChild;
    $tW = $vq->documentElement;
    $w5 = new DOMXpath($vq);
    $w5->registerNamespace("\x73\141\155\x6c\x70", "\x75\162\156\x3a\x6f\141\163\151\x73\x3a\x6e\141\155\145\x73\x3a\164\143\x3a\x53\x41\115\114\x3a\x32\x2e\60\72\x70\x72\157\x74\157\143\x6f\154");
    $w5->registerNamespace("\x73\141\155\x6c", "\165\162\x6e\72\157\141\x73\x69\163\x3a\156\141\x6d\145\x73\x3a\164\143\x3a\x53\x41\115\114\72\x32\x2e\x30\x3a\x61\x73\163\x65\x72\164\x69\x6f\x6e");
    if ($CG->localName == "\x4c\x6f\x67\157\165\164\x52\145\x73\160\x6f\156\x73\145") {
        goto uQ;
    }
    $ig = $w5->query("\57\x73\141\x6d\x6c\x70\72\x52\145\163\160\157\156\163\x65\57\x73\141\155\x6c\160\x3a\123\164\141\x74\x75\x73\x2f\x73\141\x6d\154\x70\72\x53\x74\141\164\x75\x73\x43\157\x64\x65", $tW);
    $zC = $ig->item(0)->getAttribute("\126\x61\154\x75\x65");
    $Vm = $w5->query("\57\163\141\155\154\160\72\x52\x65\163\x70\157\156\x73\145\57\x73\141\x6d\x6c\x70\72\x53\x74\x61\x74\x75\163\x2f\163\x61\x6d\x6c\x70\72\x53\164\x61\x74\x75\163\x4d\145\x73\163\141\147\x65", $tW)->item(0);
    if (empty($Vm)) {
        goto c5;
    }
    $Vm = $Vm->nodeValue;
    c5:
    $vK = explode("\x3a", $zC);
    $ig = $vK[7];
    if (array_key_exists("\122\145\x6c\141\171\123\164\x61\164\145", $_POST) && !empty($_POST["\x52\145\154\x61\171\123\x74\141\164\145"]) && $_POST["\x52\145\x6c\141\x79\123\164\141\x74\145"] != "\57") {
        goto Ff;
    }
    $fA = '';
    goto Rr;
    Ff:
    $fA = htmlspecialchars($_POST["\122\x65\154\x61\171\123\x74\141\x74\x65"]);
    Rr:
    if (!($ig != "\x53\x75\x63\143\x65\x73\163")) {
        goto WV;
    }
    show_status_error($ig, $fA, $Vm);
    WV:
    $Xc = maybe_unserialize(get_option("\x73\x61\x6d\154\x5f\170\x35\x30\71\x5f\143\145\162\164\151\x66\151\143\141\164\145"));
    $og = $We . "\x2f";
    update_option("\155\157\137\x73\x61\x6d\154\137\x72\145\163\x70\x6f\x6e\163\x65", base64_encode($x5));
    $x5 = new SAML2SPResponse($CG);
    $w2 = $x5->getSignatureData();
    $I_ = current($x5->getAssertions())->getSignatureData();
    if (!(empty($I_) && empty($w2))) {
        goto Cr;
    }
    if ($fA == "\x74\145\163\x74\x56\141\x6c\151\144\141\x74\145") {
        goto sR;
    }
    wp_die("\x57\x65\x20\143\157\x75\154\x64\40\x6e\157\164\40\x73\151\147\x6e\x20\x79\x6f\165\x20\151\156\x2e\x20\120\x6c\x65\x61\x73\x65\x20\143\x6f\x6e\x74\141\x63\x74\x20\x61\144\155\151\156\x69\x73\x74\162\141\x74\157\162", "\105\162\x72\157\162\x3a\40\111\156\x76\x61\154\x69\x64\x20\x53\x41\x4d\x4c\x20\122\145\x73\x70\157\156\163\x65");
    goto gv;
    sR:
    $jT = mo_options_error_constants::Error_no_certificate;
    $TP = mo_options_error_constants::Cause_no_certificate;
    echo "\74\144\x69\166\x20\x73\164\x79\x6c\145\75\42\x66\x6f\x6e\x74\55\146\141\155\151\x6c\171\72\x43\141\x6c\151\142\x72\x69\x3b\160\141\144\x64\x69\156\x67\72\60\40\x33\45\73\x22\76\xa\11\11\x9\11\x3c\x64\151\166\x20\163\x74\x79\x6c\x65\75\x22\x63\157\154\x6f\x72\x3a\x20\43\x61\71\64\64\x34\62\73\142\x61\x63\153\x67\x72\157\165\x6e\x64\x2d\143\157\x6c\157\162\x3a\40\x23\146\x32\144\145\x64\x65\x3b\x70\x61\144\x64\151\x6e\147\72\40\61\x35\160\x78\x3b\x6d\x61\x72\147\151\x6e\55\x62\x6f\x74\x74\x6f\155\72\40\62\x30\x70\x78\x3b\x74\145\x78\164\x2d\141\x6c\151\x67\x6e\x3a\143\x65\x6e\x74\x65\x72\73\x62\157\162\144\x65\162\x3a\x31\160\170\40\163\x6f\154\151\x64\40\x23\x45\x36\102\63\x42\62\x3b\146\x6f\x6e\164\55\x73\x69\172\145\72\61\70\160\164\73\42\76\40\x45\x52\x52\117\x52\x3c\x2f\144\x69\166\x3e\xa\x9\x9\x9\x9\74\x64\151\166\40\163\164\171\x6c\x65\75\42\x63\x6f\x6c\157\162\x3a\40\x23\x61\x39\x34\x34\64\62\x3b\146\x6f\x6e\164\55\x73\151\172\145\x3a\x31\64\160\x74\x3b\x20\155\141\x72\147\151\156\x2d\142\157\x74\x74\157\x6d\72\62\x30\160\x78\x3b\x22\76\74\160\76\74\163\x74\x72\157\x6e\147\x3e\x45\162\162\x6f\x72\x20\40\72" . $jT . "\40\74\57\163\x74\162\157\x6e\147\76\74\57\160\x3e\12\x9\11\11\11\xa\11\11\11\x9\74\x70\76\74\x73\164\x72\x6f\156\147\x3e\x50\x6f\163\x73\151\x62\x6c\145\40\x43\x61\165\163\145\72\40" . $TP . "\74\x2f\163\x74\162\157\156\x67\x3e\x3c\57\160\76\12\11\11\11\11\xa\11\x9\11\x9\x3c\x2f\144\151\x76\76\74\57\x64\x69\x76\76";
    mo_saml_download_logs($jT, $TP);
    die;
    gv:
    Cr:
    $mb = '';
    if (is_array($Xc)) {
        goto Ht;
    }
    $Jy = XMLSecurityKey::getRawThumbprint($Xc);
    $Jy = mo_saml_convert_to_windows_iconv($Jy);
    $Jy = preg_replace("\57\134\x73\53\57", '', $Jy);
    if (empty($w2)) {
        goto fq;
    }
    $mb = SAMLSPUtilities::processResponse($og, $Jy, $w2, $x5, 0, $fA);
    fq:
    if (empty($I_)) {
        goto JI;
    }
    $mb = SAMLSPUtilities::processResponse($og, $Jy, $I_, $x5, 0, $fA);
    JI:
    goto Pw;
    Ht:
    foreach ($Xc as $Kn => $Iy) {
        $Jy = XMLSecurityKey::getRawThumbprint($Iy);
        $Jy = mo_saml_convert_to_windows_iconv($Jy);
        $Jy = preg_replace("\x2f\x5c\163\53\57", '', $Jy);
        if (empty($w2)) {
            goto CK;
        }
        $mb = SAMLSPUtilities::processResponse($og, $Jy, $w2, $x5, $Kn, $fA);
        CK:
        if (empty($I_)) {
            goto aB;
        }
        $mb = SAMLSPUtilities::processResponse($og, $Jy, $I_, $x5, $Kn, $fA);
        aB:
        if (!$mb) {
            goto a3;
        }
        goto lW;
        a3:
        aH:
    }
    lW:
    Pw:
    if ($w2) {
        goto SP;
    }
    if ($I_) {
        goto Gi;
    }
    goto qG;
    SP:
    $ty = $w2["\103\x65\162\x74\151\146\151\143\141\x74\145\163"][0];
    goto qG;
    Gi:
    $ty = $I_["\x43\145\162\164\151\146\x69\x63\141\164\145\163"][0];
    qG:
    if ($mb) {
        goto DB;
    }
    if ($fA == "\164\x65\163\164\126\141\154\x69\144\141\x74\x65") {
        goto he;
    }
    wp_die("\127\x65\x20\x63\x6f\x75\x6c\x64\x20\156\157\x74\40\x73\151\x67\156\40\x79\x6f\x75\x20\x69\x6e\56\x20\x50\154\145\x61\163\145\40\x63\157\156\164\x61\143\164\40\x79\157\x75\162\40\141\x64\155\151\x6e\x69\163\164\162\x61\x74\157\x72", "\x45\x72\162\x6f\x72\72\40\111\x6e\166\141\154\151\x64\40\123\x41\x4d\x4c\40\122\x65\163\x70\157\x6e\163\x65");
    goto LE;
    he:
    $jT = mo_options_error_constants::Error_wrong_certificate;
    $TP = mo_options_error_constants::Cause_wrong_certificate;
    $uu = "\55\55\x2d\55\55\x42\x45\107\111\x4e\40\103\x45\x52\124\x49\106\x49\x43\x41\x54\105\x2d\55\x2d\55\55\74\x62\x72\76" . chunk_split($ty, 64) . "\x3c\x62\x72\x3e\x2d\55\x2d\55\x2d\105\116\104\x20\x43\x45\122\124\x49\x46\111\103\101\124\x45\55\x2d\55\x2d\x2d";
    echo "\x3c\144\x69\x76\x20\163\x74\171\x6c\x65\x3d\x22\x66\x6f\156\164\x2d\146\141\155\x69\154\171\72\x43\x61\x6c\x69\x62\x72\151\x3b\x70\x61\x64\144\151\x6e\147\72\60\40\63\45\73\x22\x3e";
    echo "\x3c\144\x69\166\40\163\164\x79\x6c\x65\x3d\x22\143\157\154\157\x72\72\x20\x23\x61\x39\x34\64\64\x32\x3b\142\141\x63\153\x67\x72\157\x75\x6e\144\55\143\x6f\154\x6f\162\72\x20\x23\x66\62\144\x65\x64\145\x3b\x70\141\x64\144\x69\156\x67\x3a\x20\x31\65\x70\x78\x3b\155\141\x72\x67\x69\156\55\142\157\164\164\x6f\x6d\72\x20\x32\x30\160\170\73\164\x65\170\164\55\141\x6c\151\x67\156\x3a\x63\145\x6e\x74\x65\x72\73\x62\157\x72\x64\145\x72\72\61\x70\170\40\163\x6f\x6c\x69\x64\40\43\105\66\102\63\102\62\73\x66\x6f\x6e\164\x2d\163\x69\172\x65\72\x31\x38\x70\164\73\x22\x3e\40\x45\x52\x52\x4f\x52\x3c\57\x64\151\166\x3e\xa\x9\11\11\74\144\x69\x76\x20\163\164\171\x6c\145\x3d\x22\143\157\x6c\157\x72\x3a\40\x23\x61\71\x34\x34\64\x32\73\x66\157\x6e\164\x2d\x73\151\172\145\72\x31\64\160\164\x3b\40\155\x61\162\x67\151\x6e\55\x62\x6f\164\x74\x6f\155\x3a\62\60\x70\170\x3b\42\x3e\x3c\160\x3e\74\x73\x74\162\x6f\x6e\147\76\105\x72\x72\x6f\x72\72\40\74\x2f\x73\164\x72\157\x6e\x67\76\x55\x6e\x61\x62\x6c\x65\40\164\157\x20\146\x69\x6e\x64\40\141\x20\x63\x65\162\x74\x69\146\151\143\141\164\x65\x20\155\141\x74\143\x68\151\156\147\40\164\150\x65\40\143\157\x6e\x66\151\147\x75\162\145\144\x20\x66\151\156\147\145\x72\160\x72\x69\x6e\164\x2e\x3c\x2f\x70\76\12\x9\11\11\74\160\76\120\154\145\x61\x73\145\40\143\157\x6e\164\x61\143\164\x20\x79\x6f\x75\162\x20\141\x64\x6d\x69\156\151\163\164\x72\141\164\x6f\162\x20\141\156\x64\40\162\x65\160\x6f\162\x74\x20\164\x68\145\x20\146\x6f\154\154\x6f\167\151\x6e\x67\40\145\x72\x72\157\x72\72\74\57\160\x3e\12\11\11\11\x3c\x70\76\x3c\163\x74\x72\157\156\x67\76\x50\157\x73\163\x69\x62\x6c\x65\x20\x43\141\x75\163\145\x3a\x20\74\x2f\163\x74\x72\157\x6e\147\76\x27\130\x2e\65\60\x39\x20\103\x65\x72\164\151\x66\x69\143\141\x74\145\x27\x20\x66\x69\145\x6c\x64\40\151\156\x20\x70\x6c\165\147\151\156\x20\144\x6f\145\x73\40\x6e\157\x74\40\x6d\x61\x74\x63\x68\x20\164\150\145\40\x63\x65\x72\x74\x69\x66\151\x63\141\164\145\x20\146\157\x75\x6e\144\40\151\156\x20\123\x41\x4d\114\x20\x52\x65\163\160\x6f\x6e\163\x65\56\x3c\57\x70\76\xa\11\x9\x9\x3c\x70\76\74\163\x74\162\157\x6e\147\x3e\x43\x65\x72\x74\151\146\x69\143\141\x74\145\40\x66\x6f\x75\x6e\x64\x20\151\156\x20\x53\101\x4d\114\x20\x52\145\163\x70\x6f\x6e\x73\145\72\x20\x3c\57\x73\164\162\x6f\x6e\147\76\x3c\x66\157\156\164\x20\146\141\143\145\75\x22\103\157\165\x72\x69\145\x72\40\116\x65\167\42\x3b\146\x6f\156\164\x2d\x73\x69\172\145\72\x31\x30\160\164\76\74\x62\162\x3e\x3c\142\x72\x3e" . $uu . "\x3c\x2f\x70\76\74\57\146\157\156\x74\x3e\xa\11\11\11\74\x70\76\74\x73\x74\x72\157\x6e\x67\76\123\157\x6c\x75\164\151\x6f\156\72\x20\x3c\x2f\163\x74\162\157\156\147\76\74\x2f\160\76\xa\11\x9\x9\x20\x3c\x6f\x6c\x3e\12\x20\40\40\x20\x20\40\x20\x20\40\40\40\x20\x20\40\40\x20\74\154\151\76\x43\x6f\x70\171\x20\160\x61\x73\164\x65\x20\x74\150\145\x20\143\145\162\x74\151\x66\151\x63\141\164\145\x20\160\162\157\166\x69\x64\x65\144\40\141\x62\x6f\166\x65\x20\x69\156\x20\x58\65\60\71\x20\103\x65\x72\x74\x69\x66\151\x63\141\164\145\x20\x75\x6e\x64\145\x72\40\x53\x65\x72\166\151\x63\145\40\120\162\157\166\x69\x64\x65\162\40\x53\x65\164\x75\160\40\164\x61\142\x2e\x3c\57\154\151\76\xa\x20\40\40\x20\40\x20\40\40\x20\40\40\x20\40\x20\x20\x20\74\x6c\x69\76\x49\x66\x20\151\163\x73\x75\145\40\160\x65\162\x73\151\163\x74\163\x20\144\151\x73\x61\142\154\145\40\74\x62\76\103\x68\141\162\x61\x63\x74\x65\x72\x20\145\156\143\x6f\144\151\156\147\x3c\57\142\x3e\40\x75\x6e\x64\145\x72\x20\123\145\x72\x76\x69\143\145\40\120\162\157\x76\144\145\162\x20\x53\x65\164\165\160\x20\x74\x61\142\x2e\74\x2f\154\151\x3e\12\40\x20\40\40\x20\x20\x20\x20\40\x20\x20\x20\40\74\x2f\x6f\154\x3e\11\x9\12\x9\x9\11\74\57\x64\151\x76\x3e\xa\x9\x9\x9\x9\11\74\x64\x69\166\x20\163\x74\x79\154\145\75\42\x6d\x61\x72\147\151\156\72\x33\45\x3b\144\151\163\x70\x6c\x61\171\x3a\x62\154\157\143\x6b\x3b\x74\145\x78\x74\55\x61\x6c\x69\x67\x6e\72\x63\145\156\x74\x65\x72\x3b\x22\x3e\12\x9\11\x9\x9\x9\x3c\144\151\166\x20\163\164\171\154\x65\75\42\155\141\162\147\x69\x6e\x3a\63\x25\73\x64\x69\x73\x70\154\141\x79\x3a\142\154\157\x63\x6b\73\164\145\170\x74\x2d\141\154\x69\x67\x6e\x3a\x63\x65\156\164\x65\x72\x3b\42\76\x3c\x69\x6e\x70\x75\x74\x20\x73\164\171\x6c\145\x3d\x22\160\141\144\x64\x69\x6e\x67\x3a\61\x25\x3b\167\x69\144\164\150\x3a\x31\x30\x30\x70\x78\73\142\x61\x63\x6b\147\162\x6f\x75\156\144\x3a\40\x23\x30\60\71\61\x43\x44\40\x6e\x6f\x6e\145\40\162\x65\160\x65\141\164\x20\163\143\x72\157\154\154\40\x30\45\x20\x30\45\73\x63\165\162\x73\157\162\x3a\40\160\157\151\156\164\x65\x72\x3b\146\157\156\x74\55\x73\151\x7a\x65\x3a\61\x35\160\170\x3b\x62\x6f\162\x64\145\x72\55\167\151\144\164\150\72\40\61\160\x78\x3b\142\157\x72\144\x65\x72\55\163\164\x79\x6c\145\x3a\x20\163\x6f\x6c\151\x64\73\x62\x6f\162\x64\145\x72\x2d\162\x61\x64\x69\165\x73\72\40\63\160\170\73\167\x68\x69\164\145\55\163\x70\141\x63\x65\x3a\40\x6e\157\x77\x72\x61\x70\73\142\x6f\170\55\163\x69\x7a\151\156\147\x3a\40\x62\157\162\x64\x65\162\x2d\142\x6f\170\x3b\142\157\162\x64\x65\x72\55\x63\x6f\154\x6f\x72\72\40\x23\x30\x30\67\63\101\x41\x3b\142\157\170\x2d\163\x68\x61\x64\157\x77\72\x20\60\x70\x78\40\x31\160\x78\40\x30\x70\x78\40\162\147\x62\141\x28\61\62\60\54\x20\62\60\x30\x2c\40\62\63\60\54\x20\60\56\x36\51\40\151\156\163\145\164\x3b\143\x6f\154\157\162\x3a\40\43\x46\x46\x46\x3b\42\x74\x79\160\145\75\42\x62\165\164\x74\157\x6e\42\x20\x76\141\x6c\x75\x65\75\42\104\157\x6e\x65\x22\40\157\x6e\x43\x6c\151\x63\153\x3d\42\163\145\x6c\x66\56\x63\154\157\163\x65\x28\51\x3b\42\76\74\57\144\151\x76\76";
    mo_saml_download_logs($jT, $TP);
    die;
    LE:
    DB:
    $pY = get_option("\x73\x61\155\154\137\x69\x73\163\x75\145\162");
    $sM = get_option("\x6d\x6f\137\x73\141\155\154\x5f\x73\160\x5f\145\156\x74\151\x74\171\x5f\151\144");
    if (!empty($sM)) {
        goto b8;
    }
    $sM = $We . "\x2f\x77\160\55\143\157\x6e\x74\145\x6e\x74\57\160\154\165\x67\x69\x6e\163\x2f\155\x69\156\x69\157\x72\141\156\147\145\55\x73\x61\x6d\154\55\x32\x30\55\x73\x69\156\x67\154\145\55\x73\x69\147\x6e\x2d\x6f\156\x2f";
    b8:
    SAMLSPUtilities::validateIssuerAndAudience($x5, $sM, $pY, $fA);
    $Bk = current(current($x5->getAssertions())->getNameId());
    $wl = current($x5->getAssertions())->getAttributes();
    $wl["\116\141\155\x65\x49\x44"] = array("\x30" => $Bk);
    $jk = current($x5->getAssertions())->getSessionIndex();
    mo_saml_checkMapping($wl, $fA, $jk);
    goto J8;
    uQ:
    if (!isset($_REQUEST["\x52\x65\154\x61\171\x53\164\141\164\x65"])) {
        goto xO;
    }
    $SW = $_REQUEST["\x52\x65\154\x61\171\x53\164\141\x74\x65"];
    xO:
    wp_logout();
    if (!empty($SW)) {
        goto i_;
    }
    $SW = home_url();
    i_:
    header("\114\x6f\x63\x61\x74\151\x6f\x6e\72\40" . $SW);
    die;
    J8:
    IA:
    if (!(array_key_exists("\123\x41\115\114\122\x65\161\x75\145\x73\164", $_REQUEST) && !empty($_REQUEST["\123\101\x4d\114\122\145\x71\x75\x65\163\x74"]))) {
        goto u1;
    }
    $hW = htmlspecialchars($_REQUEST["\x53\101\115\x4c\x52\x65\x71\165\145\x73\x74"]);
    $fA = "\57";
    if (!array_key_exists("\122\x65\154\x61\x79\123\164\141\164\145", $_REQUEST)) {
        goto k4;
    }
    $fA = htmlspecialchars($_REQUEST["\x52\x65\154\141\x79\123\164\141\164\145"]);
    k4:
    $hW = base64_decode($hW);
    if (!(array_key_exists("\123\101\115\114\x52\x65\x71\165\x65\163\164", $_GET) && !empty($_GET["\x53\x41\x4d\114\122\145\161\x75\145\163\164"]))) {
        goto hZ;
    }
    $hW = gzinflate($hW);
    hZ:
    $vq = new DOMDocument();
    $vq->loadXML($hW);
    $xG = $vq->firstChild;
    if (!($xG->localName == "\x4c\x6f\x67\x6f\165\164\122\145\x71\165\x65\163\x74")) {
        goto Yv;
    }
    $M_ = new SAML2SPLogoutRequest($xG);
    if (!(!session_id() || session_id() == '' || !isset($_SESSION))) {
        goto Ta;
    }
    session_start();
    Ta:
    $_SESSION["\155\x6f\137\163\x61\155\x6c\137\x6c\157\147\157\165\x74\x5f\x72\145\x71\165\x65\x73\x74"] = $hW;
    $_SESSION["\155\157\x5f\x73\141\155\154\137\x6c\157\147\x6f\x75\164\137\162\145\154\141\x79\x5f\x73\x74\141\x74\145"] = $fA;
    wp_logout();
    Yv:
    u1:
    if (!(isset($_REQUEST["\157\160\x74\151\157\156"]) and strpos($_REQUEST["\x6f\160\164\x69\x6f\156"], "\162\145\x61\x64\x73\141\155\x6c\154\157\147\151\x6e") !== false)) {
        goto dU;
    }
    require_once dirname(__FILE__) . "\x2f\151\156\x63\x6c\165\x64\145\163\57\x6c\x69\x62\x2f\x65\156\143\162\171\x70\164\151\157\x6e\x2e\x70\x68\160";
    if (isset($_POST["\x53\124\101\124\125\x53"]) && $_POST["\123\x54\x41\124\125\x53"] == "\x45\x52\x52\x4f\122") {
        goto R1;
    }
    if (!(isset($_POST["\123\x54\x41\124\125\123"]) && $_POST["\x53\124\101\x54\125\x53"] == "\123\x55\103\103\105\x53\123")) {
        goto EO;
    }
    $KP = '';
    if (!(isset($_REQUEST["\x72\145\x64\x69\x72\145\143\164\x5f\x74\x6f"]) && !empty($_REQUEST["\x72\145\x64\151\162\145\x63\164\137\164\157"]) && $_REQUEST["\162\x65\144\x69\162\145\143\164\x5f\164\157"] != "\57")) {
        goto S5;
    }
    $KP = htmlspecialchars($_REQUEST["\x72\145\x64\151\162\145\143\164\x5f\x74\157"]);
    S5:
    delete_option("\155\157\137\163\141\x6d\154\x5f\162\145\x64\151\x72\145\x63\164\x5f\145\162\162\x6f\x72\x5f\143\x6f\x64\x65");
    delete_option("\x6d\x6f\137\163\x61\x6d\x6c\x5f\x72\145\144\x69\x72\145\143\x74\137\x65\x72\162\157\x72\x5f\162\145\141\163\x6f\156");
    try {
        $E9 = get_option("\163\141\155\x6c\x5f\x61\x6d\x5f\x65\x6d\141\x69\154");
        $UD = get_option("\x73\141\155\154\x5f\141\155\137\x75\163\x65\162\x6e\141\x6d\x65");
        $IF = get_option("\163\141\155\x6c\x5f\x61\155\137\146\x69\x72\x73\164\x5f\156\141\155\145");
        $p0 = get_option("\x73\x61\155\x6c\137\141\x6d\x5f\154\141\x73\164\x5f\156\141\x6d\x65");
        $Yh = get_option("\163\x61\x6d\154\137\x61\155\137\147\162\157\x75\x70\137\x6e\x61\155\145");
        $BY = get_option("\x73\141\155\154\137\x61\155\137\144\145\x66\x61\x75\154\x74\137\165\163\145\162\x5f\162\157\x6c\x65");
        $GG = get_option("\x73\x61\x6d\x6c\137\x61\155\x5f\144\157\x6e\164\137\x61\154\x6c\x6f\x77\137\165\x6e\154\151\163\x74\145\x64\x5f\x75\163\x65\162\137\x72\x6f\x6c\x65");
        $W2 = get_option("\x73\x61\155\x6c\x5f\x61\x6d\x5f\x61\143\x63\x6f\165\x6e\164\137\x6d\x61\164\143\x68\x65\x72");
        $ju = '';
        $a3 = '';
        $IF = str_replace("\x2e", "\x5f", $IF);
        $IF = str_replace("\40", "\x5f", $IF);
        if (!(!empty($IF) && array_key_exists($IF, $_POST))) {
            goto P9;
        }
        $IF = htmlspecialchars($_POST[$IF]);
        P9:
        $p0 = str_replace("\x2e", "\x5f", $p0);
        $p0 = str_replace("\x20", "\x5f", $p0);
        if (!(!empty($p0) && array_key_exists($p0, $_POST))) {
            goto Ay;
        }
        $p0 = htmlspecialchars($_POST[$p0]);
        Ay:
        $UD = str_replace("\x2e", "\137", $UD);
        $UD = str_replace("\x20", "\x5f", $UD);
        if (!empty($UD) && array_key_exists($UD, $_POST)) {
            goto vN;
        }
        $a3 = htmlspecialchars($_POST["\x4e\x61\x6d\145\x49\104"]);
        goto Oi;
        vN:
        $a3 = htmlspecialchars($_POST[$UD]);
        Oi:
        $ju = str_replace("\56", "\x5f", $E9);
        $ju = str_replace("\x20", "\137", $E9);
        if (!empty($E9) && array_key_exists($E9, $_POST)) {
            goto FP;
        }
        $ju = htmlspecialchars($_POST["\x4e\141\x6d\145\x49\104"]);
        goto Sl;
        FP:
        $ju = htmlspecialchars($_POST[$E9]);
        Sl:
        $Yh = str_replace("\56", "\x5f", $Yh);
        $Yh = str_replace("\40", "\137", $Yh);
        if (!(!empty($Yh) && array_key_exists($Yh, $_POST))) {
            goto cr;
        }
        $Yh = htmlspecialchars($_POST[$Yh]);
        cr:
        if (!empty($W2)) {
            goto Km;
        }
        $W2 = "\x65\155\x61\151\154";
        Km:
        $Kn = get_option("\155\157\137\x73\x61\x6d\x6c\x5f\x63\x75\163\164\x6f\x6d\x65\x72\x5f\164\x6f\153\145\156");
        if (!(isset($Kn) || trim($Kn) != '')) {
            goto Fb;
        }
        $k4 = AESEncryption::decrypt_data($ju, $Kn);
        $ju = $k4;
        Fb:
        if (!(!empty($IF) && !empty($Kn))) {
            goto St;
        }
        $fV = AESEncryption::decrypt_data($IF, $Kn);
        $IF = $fV;
        St:
        if (!(!empty($p0) && !empty($Kn))) {
            goto JX;
        }
        $kI = AESEncryption::decrypt_data($p0, $Kn);
        $p0 = $kI;
        JX:
        if (!(!empty($a3) && !empty($Kn))) {
            goto Fg;
        }
        $Yp = AESEncryption::decrypt_data($a3, $Kn);
        $a3 = $Yp;
        Fg:
        if (!(!empty($Yh) && !empty($Kn))) {
            goto Ei;
        }
        $ps = AESEncryption::decrypt_data($Yh, $Kn);
        $Yh = $ps;
        Ei:
    } catch (Exception $xr) {
        echo sprintf("\x41\156\x20\x65\162\162\x6f\x72\x20\x6f\143\x63\x75\162\x72\145\144\x20\167\x68\151\x6c\x65\40\160\x72\x6f\x63\145\x73\x73\151\156\147\40\x74\150\x65\40\x53\x41\115\114\x20\122\x65\x73\x70\157\156\163\x65\56");
        die;
    }
    $bf = array($Yh);
    mo_saml_login_user($ju, $IF, $p0, $a3, $bf, $GG, $BY, $KP, $W2);
    EO:
    goto Ka;
    R1:
    update_option("\155\157\x5f\163\x61\155\154\137\x72\145\x64\x69\x72\145\x63\164\x5f\145\x72\162\157\x72\x5f\x63\157\x64\x65", htmlspecialchars($_POST["\x45\x52\x52\117\x52\137\x52\x45\101\123\x4f\116"]));
    update_option("\155\x6f\x5f\x73\x61\155\x6c\x5f\x72\x65\144\x69\x72\145\x63\164\137\x65\x72\x72\x6f\x72\x5f\x72\145\141\x73\157\156", htmlspecialchars($_POST["\x45\x52\122\x4f\x52\137\115\105\x53\123\x41\107\105"]));
    Ka:
    dU:
    n7:
}
function cldjkasjdksalc()
{
    $zj = plugin_dir_path(__FILE__);
    $MX = wp_upload_dir();
    $eE = home_url();
    $eE = trim($eE, "\57");
    if (preg_match("\43\x5e\150\164\164\160\x28\x73\51\x3f\x3a\57\57\x23", $eE)) {
        goto SQ;
    }
    $eE = "\150\164\x74\x70\x3a\57\x2f" . $eE;
    SQ:
    $OQ = parse_url($eE);
    $dx = preg_replace("\57\136\167\x77\x77\x5c\56\x2f", '', $OQ["\150\x6f\163\x74"]);
    $cW = $dx . "\55" . $MX["\x62\x61\163\x65\x64\151\162"];
    $NZ = hash_hmac("\x73\x68\x61\62\65\66", $cW, "\x34\x44\x48\x66\x6a\x67\146\x6a\x61\x73\156\144\x66\163\141\x6a\x66\110\x47\112");
    if (is_writable($zj . "\154\x69\143\145\156\x73\x65")) {
        goto NO;
    }
    $yy = base64_decode("\x62\107\116\153\x61\x6d\164\x68\143\62\160\x6b\141\63\116\x68\x59\62\167\x3d");
    $Mp = get_option($yy);
    if (empty($Mp)) {
        goto Wq;
    }
    $lD = str_rot13($Mp);
    Wq:
    goto cd;
    NO:
    $Mp = file_get_contents($zj . "\154\x69\x63\145\156\x73\x65");
    if (!$Mp) {
        goto ty;
    }
    $lD = base64_encode($Mp);
    ty:
    cd:
    if (!empty($Mp)) {
        goto HU;
    }
    $VJ = base64_decode("\x54\107\154\x6a\x5a\127\x35\x7a\x5a\x53\102\x47\141\127\170\x6c\111\x47\61\x70\143\63\116\x70\x62\x6d\143\x67\x5a\x6e\x4a\166\x62\123\102\x30\x61\107\125\x67\x63\x47\170\61\132\x32\x6c\x75\114\x67\x3d\x3d");
    wp_die($VJ);
    HU:
    if (strpos($lD, $NZ) !== false) {
        goto V2;
    }
    $V4 = new Customersaml();
    $Kn = get_option("\x6d\157\137\163\x61\155\154\x5f\143\x75\163\x74\157\155\145\x72\x5f\164\x6f\153\x65\156");
    $ug = AESEncryption::decrypt_data(get_option("\163\155\154\x5f\x6c\x6b"), $Kn);
    $t2 = $V4->mo_saml_vl($ug, false);
    if ($t2) {
        goto CJ;
    }
    return;
    CJ:
    $t2 = json_decode($t2, true);
    if (strcasecmp($t2["\x73\164\x61\x74\165\163"], "\x53\125\103\x43\105\123\123") == 0) {
        goto WC;
    }
    $Is = base64_decode("\x53\x57\x35\x32\131\127\170\x70\132\x43\x42\x4d\x61\127\116\154\x62\156\116\154\111\105\132\166\x64\x57\x35\153\x4c\x69\x42\x51\142\107\126\150\x63\62\x55\x67\x59\x32\71\x75\144\x47\106\152\x64\x43\102\65\x62\x33\x56\171\111\107\x46\x6b\x62\127\154\165\x61\130\116\x30\143\x6d\106\60\142\x33\x49\147\144\x47\70\147\x64\x58\x4e\x6c\111\x48\122\157\132\123\102\x6a\x62\x33\x4a\171\132\127\x4e\x30\x49\x47\170\160\x59\62\126\165\x63\x32\125\x75\111\x45\132\166\x63\151\x42\x74\x62\x33\x4a\154\x49\x47\122\x6c\144\107\x46\160\x62\110\115\x73\111\x48\x42\171\142\x33\132\x70\132\x47\x55\x67\144\107\150\x6c\111\106\112\154\x5a\155\126\171\x5a\127\65\152\x5a\x53\102\x4a\122\x44\157\147\124\x55\x38\171\x4e\x44\x49\64\115\124\x41\171\115\124\x63\x77\x4e\123\x42\60\142\x79\x42\x35\x62\x33\x56\171\111\107\x46\153\x62\x57\154\165\x61\130\x4e\60\143\155\x46\x30\x62\x33\x49\147\144\107\70\147\x59\62\x68\154\x59\x32\x73\147\141\x58\121\147\x64\127\65\x6b\132\130\111\x67\x53\x47\x56\x73\143\x43\101\x6d\111\x45\132\x42\x55\123\x42\x30\x59\127\111\x67\141\127\x34\x67\144\107\x68\154\x49\x48\102\163\144\x57\x64\160\x62\151\64\x3d");
    $Is = str_replace("\110\145\154\160\x20\46\40\x46\101\121\x20\x74\141\x62\x20\x69\156", "\106\x41\x51\x73\x20\163\x65\x63\164\x69\157\x6e\x20\157\146", $Is);
    $Lb = base64_decode("\x52\130\x4a\171\x62\x33\x49\66\x49\x45\x6c\165\x64\155\x46\163\141\x57\121\147\x54\x47\154\152\x5a\127\65\x7a\132\x51\x3d\75");
    wp_die($Is, $Lb);
    goto SV;
    WC:
    $zj = plugin_dir_path(__FILE__);
    $eE = home_url();
    $eE = trim($eE, "\57");
    if (preg_match("\43\x5e\x68\x74\x74\160\x28\163\x29\x3f\72\57\x2f\43", $eE)) {
        goto FA;
    }
    $eE = "\150\164\x74\160\x3a\x2f\57" . $eE;
    FA:
    $OQ = parse_url($eE);
    $dx = preg_replace("\x2f\x5e\167\x77\x77\x5c\56\x2f", '', $OQ["\x68\x6f\163\x74"]);
    $MX = wp_upload_dir();
    $cW = $dx . "\x2d" . $MX["\142\141\x73\145\x64\151\x72"];
    $NZ = hash_hmac("\x73\x68\141\62\65\66", $cW, "\64\x44\x48\x66\x6a\x67\146\152\x61\163\x6e\x64\x66\x73\x61\152\146\110\x47\112");
    $D4 = djkasjdksa();
    $Ju = round(strlen($D4) / rand(2, 20));
    $D4 = substr_replace($D4, $NZ, $Ju, 0);
    $rX = base64_decode($D4);
    if (is_writable($zj . "\154\x69\143\145\x6e\163\x65")) {
        goto m3;
    }
    $D4 = str_rot13($D4);
    $yy = base64_decode("\x62\107\x4e\x6b\x61\155\164\x68\143\x32\x70\153\x61\x33\x4e\150\x59\x32\x77\75");
    update_option($yy, $D4);
    goto k7;
    m3:
    file_put_contents($zj . "\x6c\x69\x63\145\156\163\x65", $rX);
    k7:
    return true;
    SV:
    goto aa;
    V2:
    return true;
    aa:
}
function djkasjdksa()
{
    $SO = "\x21\x7e\100\x23\44\45\136\46\52\50\x29\x5f\x2b\x7c\x7b\x7d\x3c\76\77\x30\x31\x32\x33\64\65\66\x37\70\71\x61\142\143\x64\x65\146\147\x68\151\152\x6b\154\x6d\156\x6f\x70\161\x72\x73\164\165\166\167\x78\x79\x7a\101\102\x43\104\x45\x46\107\110\x49\112\113\114\x4d\116\117\x50\121\x52\x53\124\125\126\127\130\x59\132";
    $mX = strlen($SO);
    $wq = '';
    $W0 = 0;
    Y1:
    if (!($W0 < 10000)) {
        goto JA;
    }
    $wq .= $SO[rand(0, $mX - 1)];
    y0:
    $W0++;
    goto Y1;
    JA:
    return $wq;
}
function mo_saml_show_SAML_log($xG, $rj)
{
    header("\103\157\156\x74\145\156\x74\x2d\124\171\x70\145\x3a\x20\164\145\x78\x74\x2f\x68\164\155\x6c");
    $tW = new DOMDocument();
    $tW->preserveWhiteSpace = false;
    $tW->formatOutput = true;
    $tW->loadXML($xG);
    if ($rj == "\144\151\163\160\154\x61\x79\123\101\115\114\122\145\161\165\145\163\x74") {
        goto uV;
    }
    $I9 = "\123\x41\115\114\40\x52\145\163\x70\157\x6e\163\145";
    goto wJ;
    uV:
    $I9 = "\123\x41\115\x4c\40\x52\145\161\165\145\163\x74";
    wJ:
    $Rp = $tW->saveXML();
    $gk = htmlentities($Rp);
    $gk = rtrim($gk);
    $BO = simplexml_load_string($Rp);
    $lH = json_encode($BO);
    $t4 = json_decode($lH);
    $AP = plugins_url("\x69\x6e\x63\x6c\x75\x64\x65\x73\57\143\x73\x73\x2f\163\x74\x79\x6c\145\137\163\145\164\164\x69\156\x67\x73\x2e\143\x73\163\x3f\166\x65\x72\x3d\64\56\70\x2e\x34\60", __FILE__);
    echo "\x3c\154\x69\156\153\40\162\145\154\x3d\x27\163\x74\171\154\x65\x73\x68\x65\145\164\47\40\x69\x64\x3d\x27\x6d\157\137\x73\x61\x6d\154\x5f\141\144\x6d\x69\156\x5f\x73\x65\x74\x74\x69\x6e\x67\163\137\163\164\x79\x6c\x65\55\x63\163\163\47\x20\40\x68\162\x65\146\75\47" . $AP . "\x27\x20\x74\171\160\145\x3d\47\164\x65\170\x74\57\x63\x73\163\47\x20\155\x65\x64\151\x61\75\47\141\x6c\154\47\x20\57\76\xa\x20\x20\x20\x20\x20\x20\40\x20\x20\x20\40\40\12\x9\x9\x9\x3c\x64\151\166\x20\143\x6c\141\x73\163\75\42\155\x6f\55\x64\x69\x73\160\x6c\x61\x79\55\x6c\157\x67\163\42\40\76\74\x70\x20\x74\x79\160\145\75\x22\x74\x65\170\164\42\40\x20\40\151\x64\75\42\123\101\x4d\114\137\x74\171\160\145\42\x3e" . $I9 . "\x3c\57\x70\x3e\x3c\57\144\x69\x76\76\xa\11\11\x9\x9\12\x9\x9\11\74\144\x69\x76\x20\x74\x79\x70\x65\x3d\42\x74\145\170\164\x22\x20\x69\x64\75\42\x53\x41\115\x4c\137\144\x69\163\x70\x6c\141\x79\42\40\143\x6c\141\x73\163\x3d\42\x6d\157\x2d\144\151\x73\x70\x6c\x61\171\55\142\x6c\x6f\x63\153\x22\76\74\x70\x72\x65\x20\x63\x6c\141\163\x73\x3d\x27\142\x72\x75\x73\x68\72\40\x78\155\154\73\x27\76" . $gk . "\74\x2f\x70\162\x65\x3e\x3c\x2f\144\151\x76\x3e\12\x9\x9\x9\x3c\142\x72\76\xa\11\x9\11\x3c\x64\151\166\11\x20\x73\x74\x79\x6c\145\x3d\42\x6d\141\x72\x67\x69\x6e\72\63\45\x3b\x64\x69\163\160\x6c\141\x79\72\142\x6c\x6f\x63\x6b\73\x74\x65\170\x74\x2d\x61\x6c\151\147\156\72\x63\145\156\164\145\162\73\42\76\xa\x20\x20\40\40\40\40\40\x20\x20\40\x20\40\xa\11\x9\x9\x3c\144\151\166\40\x73\164\171\154\x65\x3d\x22\x6d\141\x72\147\151\156\72\x33\x25\73\144\151\x73\x70\154\x61\x79\72\x62\x6c\157\143\x6b\73\164\145\x78\x74\x2d\x61\154\x69\147\156\x3a\143\145\156\164\145\162\x3b\x22\40\x3e\xa\x9\xa\x20\40\x20\x20\x20\x20\40\40\40\x20\40\x20\74\x2f\144\151\x76\76\xa\x9\11\x9\74\x62\165\164\x74\x6f\156\x20\151\144\75\42\x63\157\x70\x79\x22\40\x6f\x6e\x63\x6c\151\143\x6b\75\x22\x63\157\160\x79\104\151\x76\124\157\103\x6c\151\160\142\157\x61\x72\x64\50\x29\42\x20\40\x73\164\171\154\x65\75\42\160\x61\x64\144\151\156\x67\x3a\61\45\73\167\151\x64\164\x68\72\61\x30\60\160\170\x3b\142\x61\143\x6b\147\162\157\x75\156\144\72\40\x23\60\x30\x39\x31\103\104\x20\x6e\x6f\x6e\145\x20\162\x65\x70\145\141\164\40\163\x63\x72\x6f\154\154\x20\x30\45\40\x30\45\x3b\x63\x75\x72\x73\x6f\162\x3a\40\160\157\x69\x6e\164\x65\162\73\x66\x6f\x6e\164\55\163\151\x7a\x65\x3a\x31\65\x70\170\x3b\x62\x6f\x72\144\145\x72\55\x77\x69\144\x74\150\x3a\x20\x31\x70\x78\73\x62\157\x72\144\x65\162\55\x73\164\x79\154\145\72\x20\163\157\154\151\x64\73\142\x6f\162\x64\x65\162\x2d\x72\141\x64\151\165\163\x3a\40\x33\x70\170\x3b\167\x68\151\x74\145\55\163\160\x61\143\x65\x3a\x20\x6e\x6f\x77\x72\x61\160\x3b\x62\x6f\x78\55\163\x69\x7a\x69\156\147\72\40\142\157\162\x64\145\162\55\x62\157\x78\73\x62\x6f\162\144\x65\162\x2d\143\157\x6c\157\162\72\40\x23\x30\x30\x37\63\101\x41\73\x62\157\170\55\x73\150\x61\144\x6f\x77\x3a\x20\x30\x70\x78\x20\61\x70\170\x20\60\160\x78\x20\162\147\142\x61\50\x31\x32\x30\x2c\40\62\60\60\54\40\62\x33\x30\54\40\60\x2e\66\51\x20\x69\x6e\163\x65\x74\x3b\x63\x6f\x6c\x6f\x72\x3a\40\x23\x46\106\106\x3b\x22\x20\x3e\103\x6f\x70\x79\x3c\x2f\142\165\x74\164\157\156\76\12\x9\11\11\46\x6e\142\x73\160\73\12\x20\x20\x20\x20\x20\x20\x20\x20\40\40\x20\40\x20\x20\x20\74\x69\x6e\x70\165\x74\40\151\144\75\x22\x64\167\156\55\142\164\156\42\x20\x73\x74\171\154\x65\75\x22\x70\141\144\x64\151\x6e\x67\72\61\x25\73\x77\x69\144\164\150\72\61\60\60\160\170\x3b\142\141\x63\153\147\162\x6f\165\x6e\x64\x3a\40\43\x30\60\71\x31\x43\x44\40\156\157\x6e\145\x20\x72\145\160\x65\x61\x74\x20\163\x63\x72\157\154\154\x20\x30\45\40\60\x25\73\x63\165\162\x73\x6f\162\72\40\x70\157\x69\x6e\164\x65\x72\73\x66\157\156\x74\55\163\151\172\x65\x3a\61\65\160\170\x3b\x62\x6f\162\x64\x65\162\55\167\151\x64\x74\x68\x3a\40\x31\x70\x78\x3b\142\157\x72\144\x65\x72\x2d\163\164\171\x6c\145\72\40\163\157\154\151\144\x3b\x62\x6f\162\x64\x65\162\x2d\x72\x61\x64\x69\165\163\x3a\x20\63\160\x78\73\167\150\x69\x74\x65\55\163\160\x61\143\145\72\x20\156\x6f\167\x72\141\160\x3b\142\x6f\x78\55\x73\151\172\151\x6e\x67\72\x20\x62\157\x72\144\x65\162\x2d\x62\157\170\73\x62\157\162\144\x65\x72\55\143\x6f\x6c\157\x72\x3a\40\x23\60\60\67\x33\101\x41\x3b\142\x6f\170\55\163\150\x61\144\157\167\72\x20\60\160\170\x20\61\x70\x78\x20\60\160\x78\x20\x72\x67\x62\141\x28\61\62\60\x2c\40\x32\60\60\x2c\x20\62\x33\60\x2c\x20\x30\x2e\x36\x29\x20\x69\156\163\x65\x74\x3b\143\x6f\x6c\x6f\x72\72\40\43\106\x46\106\x3b\x22\164\171\160\145\x3d\42\142\x75\x74\x74\157\156\42\x20\x76\x61\x6c\x75\x65\75\x22\104\x6f\167\x6e\x6c\x6f\141\x64\42\x20\12\40\x20\40\40\40\40\x20\40\40\40\40\40\x20\x20\x20\x22\x3e\12\11\11\11\x3c\x2f\x64\151\x76\x3e\xa\x9\x9\11\74\x2f\x64\151\166\x3e\xa\11\x9\11\12\x9\11\xa\11\11\11";
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
function mo_saml_checkMapping($wl, $fA, $jk)
{
    try {
        $E9 = get_option("\163\141\155\154\137\x61\x6d\137\145\155\x61\151\x6c");
        $UD = get_option("\x73\141\155\x6c\137\x61\155\137\x75\163\145\x72\x6e\141\x6d\145");
        $IF = get_option("\x73\141\x6d\x6c\x5f\x61\x6d\137\146\x69\x72\163\164\137\x6e\x61\155\x65");
        $p0 = get_option("\x73\x61\x6d\x6c\x5f\141\x6d\137\x6c\x61\x73\164\137\156\141\x6d\145");
        $Yh = get_option("\163\141\x6d\x6c\x5f\141\x6d\137\x67\162\x6f\x75\160\x5f\x6e\141\x6d\x65");
        $BY = get_option("\163\141\x6d\x6c\137\141\155\x5f\144\x65\146\141\165\x6c\164\x5f\165\x73\x65\x72\137\x72\x6f\154\145");
        $GG = get_option("\x73\x61\155\x6c\137\x61\x6d\137\144\x6f\156\164\x5f\141\154\x6c\x6f\167\x5f\165\x6e\x6c\x69\x73\164\x65\144\x5f\x75\x73\x65\x72\x5f\x72\x6f\154\x65");
        $W2 = get_option("\163\141\155\x6c\x5f\141\155\x5f\x61\143\x63\157\x75\156\x74\137\155\x61\x74\143\150\145\162");
        $ju = '';
        $a3 = '';
        if (empty($wl)) {
            goto Tt;
        }
        if (!empty($IF) && array_key_exists($IF, $wl)) {
            goto ww;
        }
        $IF = '';
        goto eK;
        ww:
        $IF = $wl[$IF][0];
        eK:
        if (!empty($p0) && array_key_exists($p0, $wl)) {
            goto PE;
        }
        $p0 = '';
        goto qk;
        PE:
        $p0 = $wl[$p0][0];
        qk:
        if (!empty($UD) && array_key_exists($UD, $wl)) {
            goto YB;
        }
        $a3 = $wl["\x4e\x61\155\x65\x49\x44"][0];
        goto Wz;
        YB:
        $a3 = $wl[$UD][0];
        Wz:
        if (!empty($E9) && array_key_exists($E9, $wl)) {
            goto Er;
        }
        $ju = $wl["\116\141\x6d\145\x49\104"][0];
        goto F3;
        Er:
        $ju = $wl[$E9][0];
        F3:
        if (!empty($Yh) && array_key_exists($Yh, $wl)) {
            goto gh;
        }
        $Yh = array();
        goto CR;
        gh:
        $Yh = $wl[$Yh];
        CR:
        if (!empty($W2)) {
            goto Cm;
        }
        $W2 = "\145\x6d\141\x69\x6c";
        Cm:
        Tt:
        if ($fA == "\164\145\163\x74\126\141\x6c\x69\x64\x61\x74\x65") {
            goto yD;
        }
        mo_saml_login_user($ju, $IF, $p0, $a3, $Yh, $GG, $BY, $fA, $W2, $jk, $wl["\x4e\x61\x6d\145\x49\x44"][0], $wl);
        goto x9;
        yD:
        update_option("\155\157\x5f\x73\x61\155\154\x5f\164\145\x73\164", "\124\145\x73\164\x20\x73\x75\143\x63\145\163\163\x66\165\x6c");
        mo_saml_show_test_result($IF, $p0, $ju, $Yh, $wl);
        x9:
    } catch (Exception $xr) {
        echo sprintf("\101\x6e\x20\x65\x72\162\x6f\x72\40\157\143\x63\x75\x72\x72\145\144\40\x77\150\151\x6c\x65\x20\x70\x72\x6f\143\x65\163\x73\151\156\147\x20\x74\150\145\40\x53\x41\x4d\114\x20\122\x65\x73\x70\157\156\163\x65\56");
        die;
    }
}
function mo_saml_show_test_result($IF, $p0, $ju, $Yh, $wl)
{
    echo "\74\x64\151\x76\x20\163\164\x79\154\x65\75\x22\146\157\156\x74\55\x66\x61\x6d\151\x6c\x79\x3a\103\141\154\x69\142\x72\x69\73\x70\x61\x64\144\151\x6e\x67\72\x30\40\63\x25\73\42\76";
    if (!empty($ju)) {
        goto zp;
    }
    echo "\x3c\144\x69\166\x20\x73\x74\171\154\x65\75\x22\143\x6f\154\x6f\162\72\x20\x23\141\x39\64\x34\64\62\x3b\x62\x61\x63\x6b\x67\162\x6f\x75\156\144\55\x63\x6f\154\x6f\162\x3a\x20\x23\146\x32\144\x65\144\x65\73\160\141\x64\x64\x69\156\147\72\x20\x31\x35\160\x78\73\155\x61\x72\x67\151\156\55\x62\x6f\x74\x74\157\155\x3a\40\62\60\160\170\x3b\164\145\170\164\x2d\x61\154\x69\x67\156\72\143\145\156\x74\145\x72\73\142\157\162\x64\145\x72\72\x31\160\x78\x20\x73\157\154\151\144\x20\x23\105\66\x42\63\x42\x32\73\x66\157\x6e\x74\x2d\x73\151\172\x65\x3a\x31\70\x70\x74\73\42\x3e\x54\x45\x53\124\40\106\x41\111\x4c\x45\104\x3c\x2f\x64\x69\x76\x3e\xa\x9\x9\x9\x9\74\x64\151\166\40\x73\164\171\154\145\75\x22\x63\x6f\x6c\x6f\x72\72\x20\x23\x61\x39\x34\x34\64\x32\73\x66\157\156\x74\x2d\x73\151\172\x65\72\x31\64\x70\x74\x3b\x20\x6d\x61\162\147\x69\x6e\x2d\x62\x6f\164\x74\x6f\x6d\72\62\60\160\170\x3b\x22\x3e\x57\101\122\116\111\116\x47\x3a\x20\x53\157\155\x65\40\101\x74\164\162\x69\x62\165\164\x65\163\x20\x44\x69\x64\x20\x4e\157\x74\40\115\141\164\143\x68\x2e\x3c\57\144\x69\166\x3e\xa\11\11\11\x9\x3c\144\151\166\40\163\164\171\x6c\145\75\42\x64\x69\x73\x70\154\x61\171\x3a\x62\x6c\157\143\153\73\x74\x65\x78\x74\x2d\141\x6c\x69\x67\156\x3a\x63\145\156\x74\145\x72\x3b\x6d\x61\x72\147\151\x6e\55\x62\157\164\164\x6f\x6d\x3a\64\45\x3b\42\x3e\74\x69\x6d\x67\40\163\164\171\x6c\x65\x3d\42\167\x69\x64\164\x68\72\x31\x35\x25\73\42\x73\x72\143\x3d\x22" . plugin_dir_url(__FILE__) . "\151\155\x61\147\x65\x73\57\167\162\157\156\x67\56\x70\x6e\147\x22\x3e\x3c\57\x64\x69\166\x3e";
    goto Hq;
    zp:
    update_option("\x6d\x6f\x5f\x73\141\x6d\154\x5f\x74\x65\x73\x74\x5f\143\x6f\156\x66\151\x67\x5f\141\164\164\x72\x73", $wl);
    echo "\x3c\144\151\166\x20\163\164\171\154\x65\x3d\42\143\x6f\x6c\x6f\x72\72\40\43\x33\x63\67\x36\63\x64\x3b\12\11\x9\x9\11\x62\x61\x63\153\147\162\x6f\x75\156\144\55\143\x6f\154\x6f\x72\72\x20\43\x64\146\x66\60\144\x38\73\40\x70\141\144\x64\x69\156\147\72\x32\x25\x3b\155\x61\162\147\151\156\55\x62\157\x74\x74\157\155\72\x32\x30\160\x78\x3b\164\145\170\164\55\141\x6c\x69\147\156\72\143\145\x6e\164\x65\x72\73\40\142\157\x72\144\145\x72\x3a\61\x70\x78\40\x73\157\x6c\151\144\40\43\101\105\x44\102\71\x41\x3b\x20\146\157\x6e\x74\55\163\x69\172\x65\72\x31\70\x70\x74\x3b\x22\76\124\x45\x53\124\x20\x53\125\103\x43\105\x53\123\106\125\114\x3c\x2f\144\x69\x76\76\12\11\x9\11\x9\x3c\144\x69\166\40\x73\x74\x79\x6c\145\75\42\144\x69\x73\160\x6c\x61\171\72\142\154\157\x63\x6b\73\x74\x65\170\164\x2d\141\154\151\x67\x6e\72\143\145\x6e\x74\145\162\73\155\141\162\147\x69\x6e\x2d\x62\157\x74\164\x6f\155\72\64\45\x3b\42\76\74\x69\x6d\x67\40\x73\164\171\154\145\75\x22\x77\151\144\164\150\72\61\65\45\73\42\x73\x72\143\x3d\x22" . plugin_dir_url(__FILE__) . "\x69\x6d\x61\x67\145\163\x2f\147\162\x65\x65\x6e\137\143\x68\x65\143\x6b\x2e\160\156\x67\42\x3e\74\57\144\151\x76\76";
    Hq:
    $vG = get_option("\155\x6f\137\163\x61\155\x6c\137\x65\156\141\x62\154\x65\x5f\144\157\155\141\x69\x6e\x5f\x72\145\x73\x74\x72\x69\143\x74\151\x6f\156\x5f\x6c\157\x67\151\156");
    if (!$vG) {
        goto zX;
    }
    $zU = get_option("\155\157\137\x73\x61\155\154\137\141\154\154\x6f\167\x5f\x64\x65\156\171\x5f\x75\163\x65\x72\137\x77\x69\x74\x68\137\x64\x6f\x6d\141\151\156");
    if (!empty($zU) && $zU == "\144\x65\156\171") {
        goto mn;
    }
    $xu = get_option("\163\141\x6d\154\137\x61\x6d\137\x65\x6d\141\151\154\x5f\144\157\x6d\141\x69\156\x73");
    $fz = explode("\x3b", $xu);
    $IA = explode("\100", $ju);
    $BT = array_key_exists("\61", $IA) ? $IA[1] : '';
    if (in_array($BT, $fz)) {
        goto Xr;
    }
    echo "\x3c\160\x20\x73\x74\171\x6c\x65\x3d\x22\x63\x6f\x6c\157\x72\72\162\145\x64\x3b\42\76\x54\x68\x69\163\x20\x75\x73\145\162\x20\x77\x69\x6c\154\x20\x6e\x6f\164\x20\x62\x65\x20\x61\154\154\x6f\167\145\144\40\x74\x6f\40\x6c\x6f\147\151\156\40\x61\163\x20\164\150\x65\40\x64\157\x6d\141\x69\x6e\x20\157\146\x20\164\150\x65\x20\145\x6d\x61\151\154\x20\x69\x73\40\x6e\x6f\x74\40\x69\x6e\143\154\x75\144\x65\144\40\151\x6e\x20\164\150\x65\40\141\x6c\x6c\x6f\x77\x65\x64\x20\x6c\151\163\x74\40\157\x66\x20\104\157\x6d\141\151\156\40\x52\x65\163\164\x72\x69\143\164\x69\157\x6e\x2e\x3c\x2f\160\76";
    Xr:
    goto VG;
    mn:
    $xu = get_option("\163\141\x6d\154\137\x61\x6d\137\x65\x6d\141\151\x6c\x5f\x64\157\155\141\x69\x6e\163");
    $fz = explode("\73", $xu);
    $IA = explode("\x40", $ju);
    $BT = array_key_exists("\61", $IA) ? $IA[1] : '';
    if (!in_array($BT, $fz)) {
        goto Ey;
    }
    echo "\x3c\160\x20\x73\x74\171\154\x65\75\x22\143\x6f\x6c\x6f\x72\x3a\x72\145\x64\x3b\42\76\124\150\151\x73\x20\x75\x73\145\x72\40\167\x69\x6c\154\x20\x6e\x6f\x74\x20\x62\145\x20\141\154\154\x6f\x77\145\x64\40\x74\157\40\154\x6f\x67\x69\x6e\x20\141\x73\40\x74\150\145\x20\x64\x6f\x6d\x61\151\x6e\40\157\x66\40\x74\150\145\x20\145\x6d\x61\x69\154\40\x69\x73\40\151\156\143\x6c\165\144\x65\x64\x20\151\156\x20\164\x68\145\x20\144\x65\156\151\145\x64\40\154\x69\163\164\40\157\x66\x20\x44\157\x6d\x61\151\156\x20\x52\145\x73\164\162\x69\x63\164\151\x6f\156\x2e\74\57\160\x3e";
    Ey:
    VG:
    zX:
    $C0 = get_option("\163\141\155\x6c\137\141\155\x5f\165\x73\145\x72\156\x61\x6d\x65");
    if (!(!empty($C0) && array_key_exists($C0, $wl))) {
        goto MM;
    }
    $Wa = $wl[$C0][0];
    if (!(strlen($Wa) > 60)) {
        goto SZ;
    }
    echo "\74\x70\x20\x73\164\x79\154\145\75\42\143\x6f\154\157\162\x3a\x72\x65\144\x3b\x22\x3e\116\117\124\x45\40\x3a\x20\124\150\151\x73\x20\x75\163\x65\162\x20\167\x69\x6c\x6c\40\156\x6f\x74\x20\142\x65\x20\141\142\154\145\40\164\157\x20\x6c\157\x67\x69\x6e\40\141\163\x20\x74\150\x65\40\x75\163\145\162\156\x61\155\145\x20\x76\x61\x6c\165\145\x20\151\x73\x20\155\x6f\x72\x65\x20\164\x68\141\x6e\x20\66\60\x20\x63\150\141\162\x61\143\164\x65\162\x73\x20\154\x6f\x6e\147\x2e\74\x62\x72\57\76\12\x9\11\11\120\x6c\x65\141\163\145\x20\x74\x72\x79\40\x63\150\141\x6e\x67\x69\156\147\40\164\150\x65\x20\x6d\141\160\x70\x69\x6e\x67\x20\x6f\146\x20\125\x73\x65\162\x6e\141\x6d\145\40\x66\x69\x65\154\x64\x20\151\x6e\40\x3c\141\x20\x68\x72\x65\146\75\x22\x23\42\x20\157\x6e\103\154\151\x63\153\x3d\42\143\154\x6f\163\145\137\x61\156\x64\137\x72\145\x64\x69\162\145\x63\x74\x28\x29\73\x22\x3e\x41\x74\x74\162\x69\x62\165\x74\145\x2f\122\157\x6c\145\40\x4d\141\160\x70\x69\x6e\147\74\57\141\x3e\x20\x74\141\142\56\74\57\160\x3e";
    SZ:
    MM:
    echo "\74\x73\x70\x61\156\40\163\x74\171\154\145\x3d\x22\146\x6f\156\x74\x2d\x73\151\x7a\145\x3a\x31\64\x70\164\73\x22\76\74\142\x3e\110\145\154\154\157\74\57\142\76\x2c\x20" . $ju . "\x3c\x2f\x73\x70\x61\x6e\76\74\142\x72\x2f\76\74\160\x20\163\164\171\x6c\145\75\x22\146\x6f\x6e\164\55\167\x65\151\x67\150\x74\x3a\142\157\154\144\73\146\x6f\156\164\55\163\x69\172\x65\72\61\64\x70\164\x3b\x6d\141\162\x67\x69\x6e\55\x6c\x65\x66\x74\72\x31\x25\73\42\76\101\x54\x54\122\x49\x42\125\124\x45\123\x20\122\x45\103\x45\x49\x56\105\104\x3a\x3c\x2f\x70\x3e\12\11\11\x9\11\x3c\x74\141\142\154\x65\x20\163\x74\171\x6c\145\x3d\42\142\157\162\x64\145\x72\x2d\x63\x6f\154\154\141\x70\163\145\x3a\x63\157\x6c\154\141\160\x73\145\73\142\x6f\162\144\x65\x72\55\163\x70\141\143\x69\x6e\147\72\60\x3b\40\x64\151\x73\160\154\x61\x79\72\164\141\x62\x6c\x65\73\x77\151\144\x74\x68\x3a\61\x30\60\x25\x3b\x20\x66\x6f\x6e\x74\55\x73\x69\172\x65\72\x31\64\x70\164\73\142\141\x63\x6b\147\162\x6f\165\x6e\x64\x2d\x63\x6f\x6c\157\162\x3a\x23\x45\104\x45\104\x45\104\73\x22\x3e\12\x9\x9\x9\11\74\x74\162\40\163\x74\x79\x6c\x65\x3d\42\164\x65\170\164\55\141\154\151\x67\x6e\x3a\143\145\156\164\145\162\x3b\42\76\x3c\164\x64\x20\163\164\171\154\x65\x3d\42\x66\x6f\156\164\x2d\167\x65\x69\x67\x68\164\72\142\157\154\144\x3b\142\157\162\144\145\x72\x3a\x32\x70\x78\x20\163\157\x6c\x69\144\x20\x23\x39\x34\71\60\71\60\x3b\160\x61\x64\x64\151\x6e\147\x3a\x32\x25\73\42\76\101\124\124\x52\x49\102\125\124\105\x20\116\x41\x4d\105\74\x2f\x74\x64\76\x3c\x74\x64\40\163\x74\171\x6c\x65\75\x22\x66\157\x6e\x74\55\167\145\x69\147\150\x74\72\x62\157\x6c\x64\73\x70\141\x64\144\151\156\x67\x3a\62\45\x3b\x62\x6f\x72\144\x65\162\x3a\62\x70\x78\40\x73\157\154\x69\x64\40\x23\x39\x34\71\x30\71\60\73\40\167\x6f\x72\144\55\x77\162\141\x70\x3a\x62\162\x65\141\153\x2d\x77\x6f\162\144\73\42\76\x41\x54\x54\x52\x49\102\125\124\x45\x20\x56\101\x4c\x55\105\x3c\x2f\x74\x64\x3e\x3c\x2f\164\x72\76";
    if (!empty($wl)) {
        goto Pz;
    }
    echo "\x4e\x6f\x20\101\164\164\x72\x69\142\165\164\145\163\x20\122\145\143\145\151\166\145\144\56";
    goto ZL;
    Pz:
    foreach ($wl as $Kn => $Iy) {
        echo "\74\164\162\x3e\x3c\x74\144\x20\x73\164\x79\154\145\x3d\47\x66\x6f\x6e\164\x2d\167\x65\151\147\x68\x74\72\x62\x6f\x6c\144\73\x62\157\162\144\x65\x72\x3a\62\x70\170\x20\163\x6f\x6c\x69\x64\40\x23\x39\x34\x39\60\x39\60\73\160\141\x64\144\151\156\147\72\x32\45\x3b\x27\76" . $Kn . "\x3c\x2f\x74\x64\x3e\74\x74\x64\40\163\164\x79\154\145\75\47\x70\141\x64\x64\x69\156\147\72\62\x25\73\142\157\162\144\x65\162\72\x32\160\x78\x20\x73\x6f\x6c\x69\144\x20\x23\71\x34\x39\x30\x39\x30\73\40\x77\x6f\162\x64\x2d\x77\x72\x61\160\72\142\162\145\141\153\x2d\167\x6f\x72\x64\73\x27\x3e" . implode("\x3c\150\x72\57\76", $Iy) . "\74\57\x74\144\76\x3c\57\164\x72\x3e";
        h_:
    }
    Af:
    ZL:
    echo "\74\x2f\164\141\x62\x6c\x65\76\x3c\x2f\144\151\x76\x3e";
    echo "\74\144\x69\x76\x20\x73\x74\171\x6c\145\x3d\x22\155\x61\162\x67\151\156\72\63\x25\73\x64\x69\x73\160\154\141\171\72\x62\x6c\157\x63\x6b\73\x74\x65\x78\x74\x2d\x61\x6c\x69\147\156\72\x63\145\156\x74\145\x72\x3b\42\76\xa\x9\x9\74\x69\156\160\165\x74\x20\163\x74\171\x6c\145\x3d\x22\160\141\144\144\x69\156\x67\72\61\45\x3b\167\151\144\x74\x68\x3a\x32\65\60\160\170\73\142\x61\x63\153\147\162\157\165\156\x64\x3a\x20\x23\x30\60\71\x31\x43\104\40\156\x6f\x6e\145\x20\x72\145\x70\x65\141\164\x20\163\x63\x72\x6f\x6c\154\x20\x30\45\x20\x30\x25\73\143\165\x72\163\x6f\162\x3a\x20\160\157\151\156\x74\145\162\x3b\x66\157\x6e\x74\55\163\151\x7a\145\x3a\x31\x35\x70\170\x3b\x62\157\162\144\145\x72\55\x77\x69\x64\164\x68\72\40\61\x70\170\73\x62\x6f\x72\144\145\162\x2d\163\164\171\154\145\72\x20\x73\157\154\x69\144\73\142\157\x72\144\145\162\55\x72\141\x64\x69\165\x73\x3a\x20\63\160\x78\x3b\167\x68\151\164\x65\x2d\x73\x70\x61\143\x65\72\40\x6e\x6f\167\x72\141\160\73\x62\x6f\x78\x2d\163\x69\x7a\x69\156\147\72\x20\142\157\162\x64\x65\x72\55\142\157\170\x3b\x62\157\162\144\145\162\55\143\157\x6c\x6f\162\x3a\x20\x23\x30\x30\x37\63\101\101\73\x62\x6f\170\55\x73\150\x61\144\x6f\x77\72\40\x30\160\x78\40\61\x70\x78\x20\x30\160\x78\40\162\x67\142\x61\x28\x31\62\60\x2c\40\62\x30\x30\54\40\62\x33\60\54\40\x30\56\x36\x29\x20\151\x6e\163\x65\164\x3b\143\157\154\x6f\x72\x3a\x20\43\x46\x46\x46\x3b\42\12\x20\x20\40\40\x20\x20\x20\x20\40\x20\x20\x20\x74\x79\160\x65\75\x22\142\x75\164\164\x6f\156\42\x20\x76\x61\154\165\145\x3d\42\x43\x6f\x6e\146\x69\x67\x75\x72\145\x20\101\164\x74\162\x69\142\165\164\145\57\122\x6f\x6c\145\x20\x4d\x61\x70\160\x69\x6e\x67\x22\40\157\x6e\x43\x6c\x69\143\x6b\x3d\x22\143\x6c\x6f\x73\x65\x5f\x61\x6e\144\137\x72\x65\x64\x69\162\x65\143\164\x28\x29\73\42\x3e\40\x26\x6e\142\163\160\73\40\12\11\11\74\x69\156\x70\x75\164\40\x73\x74\x79\154\x65\75\42\160\141\144\144\151\x6e\147\72\61\45\73\167\x69\144\x74\x68\x3a\61\x30\x30\x70\170\x3b\142\141\x63\153\147\162\x6f\x75\x6e\x64\72\x20\x23\x30\x30\x39\x31\x43\x44\40\156\157\x6e\145\40\x72\x65\x70\x65\141\164\40\x73\x63\x72\157\154\154\40\x30\45\40\x30\45\73\x63\x75\162\163\x6f\x72\72\x20\160\x6f\x69\156\x74\145\162\73\146\x6f\156\164\x2d\163\151\x7a\x65\72\x31\65\160\x78\73\142\x6f\x72\144\x65\x72\55\x77\151\144\x74\150\72\x20\61\x70\170\x3b\142\157\162\x64\145\162\55\163\164\171\x6c\145\x3a\x20\163\x6f\x6c\151\x64\x3b\142\x6f\162\x64\145\162\x2d\x72\x61\144\x69\x75\163\72\x20\x33\x70\170\x3b\x77\x68\x69\164\145\55\163\160\141\143\145\72\40\x6e\157\167\x72\x61\x70\73\142\x6f\170\55\163\x69\172\151\x6e\147\72\x20\142\157\162\144\145\162\55\x62\157\x78\x3b\x62\157\x72\x64\145\162\x2d\x63\x6f\x6c\157\x72\x3a\40\x23\60\60\67\63\x41\x41\x3b\x62\x6f\170\x2d\x73\x68\141\144\x6f\x77\x3a\x20\x30\x70\x78\40\61\160\170\x20\x30\x70\170\40\x72\x67\x62\141\x28\61\62\60\54\40\x32\60\x30\x2c\40\x32\x33\x30\x2c\40\x30\x2e\x36\51\x20\151\x6e\163\145\x74\73\143\x6f\154\157\162\72\x20\43\x46\106\106\x3b\42\x74\171\x70\145\x3d\42\142\165\164\x74\157\156\x22\x20\x76\x61\x6c\x75\145\x3d\x22\x44\x6f\x6e\145\42\40\x6f\x6e\103\154\x69\143\153\75\x22\163\x65\154\146\x2e\x63\154\x6f\163\x65\50\51\x3b\x22\x3e\x3c\57\x64\151\x76\76\12\11\11\xa\11\x9\74\x73\143\162\x69\160\x74\76\xa\40\x20\x20\x20\x20\40\40\x20\40\40\40\x20\40\146\x75\156\x63\x74\x69\157\156\40\143\x6c\x6f\163\x65\137\141\156\144\137\x72\x65\x64\x69\162\145\x63\x74\50\51\173\xa\40\x20\x20\40\x20\40\40\x20\x20\x20\40\40\40\40\40\40\x20\167\x69\156\144\157\167\56\157\160\145\156\145\x72\56\162\x65\x64\x69\162\x65\143\164\137\x74\157\137\141\x74\x74\x72\151\142\165\x74\x65\137\x6d\141\x70\x70\151\156\x67\50\51\73\xa\40\40\40\x20\x20\40\x20\x20\40\40\x20\x20\x20\40\x20\40\40\x73\145\x6c\146\x2e\x63\154\x6f\x73\x65\50\x29\x3b\12\40\40\x20\x20\x20\x20\40\40\40\x20\x20\x20\40\x7d\40\x20\40\40\12\x9\x9\74\57\163\x63\162\x69\x70\x74\x3e";
    die;
}
function mo_saml_convert_to_windows_iconv($Jy)
{
    $QZ = get_option("\155\x6f\x5f\163\x61\155\154\137\145\156\x63\157\x64\x69\156\x67\x5f\x65\156\x61\x62\154\x65\x64");
    if (!($QZ === '')) {
        goto Ws;
    }
    return $Jy;
    Ws:
    return iconv("\125\x54\106\55\70", "\103\120\x31\62\x35\x32\x2f\x2f\x49\107\116\117\x52\x45", $Jy);
}
function mo_saml_login_user($ju, $IF, $p0, $a3, $Yh, $GG, $BY, $fA, $W2, $jk = '', $rB = '', $wl = null)
{
    check_if_user_allowed_to_login_due_to_role_restriction($Yh);
    $We = get_option("\155\157\137\x73\141\x6d\x6c\x5f\x73\160\x5f\142\x61\163\145\137\x75\162\154");
    if (!empty($We)) {
        goto lZ;
    }
    $We = home_url();
    lZ:
    $vG = get_option("\155\157\x5f\163\x61\155\154\137\145\x6e\141\x62\154\145\x5f\x64\157\x6d\141\x69\156\137\162\x65\163\x74\x72\151\143\x74\x69\157\156\x5f\154\157\147\151\x6e");
    if (!$vG) {
        goto sS;
    }
    $xu = get_option("\x73\141\155\154\137\141\x6d\x5f\145\155\x61\151\154\137\144\x6f\155\x61\151\156\x73");
    $fz = explode("\73", $xu);
    $IA = explode("\x40", $ju);
    $BT = array_key_exists("\61", $IA) ? $IA[1] : '';
    $zU = get_option("\155\x6f\137\x73\141\155\154\x5f\141\x6c\x6c\x6f\167\137\144\145\x6e\171\137\x75\163\145\162\137\167\x69\x74\150\137\144\x6f\x6d\141\x69\x6e");
    $zn = get_option("\x6d\157\x5f\x73\x61\155\x6c\137\162\x65\163\164\x72\x69\143\x74\x65\144\x5f\144\x6f\155\x61\x69\156\137\x65\162\162\x6f\x72\x5f\155\163\147");
    if (!empty($zn)) {
        goto lx;
    }
    $zn = "\131\157\165\40\141\162\145\40\x6e\x6f\164\x20\141\154\x6c\x6f\167\145\144\40\164\x6f\40\154\x6f\x67\151\156\56\x20\x50\x6c\145\x61\163\145\x20\143\157\x6e\164\x61\143\x74\x20\x79\157\x75\x72\40\x41\144\155\x69\x6e\x69\163\164\x72\141\164\157\162\x2e";
    lx:
    if (!empty($zU) && $zU == "\144\145\x6e\x79") {
        goto EF;
    }
    if (in_array($BT, $fz)) {
        goto M5;
    }
    wp_die($zn, "\120\145\162\155\151\163\163\151\x6f\x6e\x20\x44\145\x6e\x69\x65\x64\40\x3a\x20\x4e\x6f\x74\x20\141\40\127\x68\x69\164\145\x6c\151\x73\164\145\x64\40\x75\163\x65\x72\56");
    M5:
    goto to;
    EF:
    if (!in_array($BT, $fz)) {
        goto E2;
    }
    wp_die($zn, "\x50\145\162\155\x69\163\163\x69\x6f\156\x20\x44\x65\156\151\x65\144\40\72\x20\x42\x6c\141\143\153\x6c\151\x73\164\x65\144\x20\165\x73\145\162\x2e");
    E2:
    to:
    sS:
    if (!(strlen($a3) > 60)) {
        goto yK;
    }
    wp_die("\127\x65\40\x63\x6f\165\154\x64\x20\x6e\157\164\40\x73\151\x67\x6e\x20\171\x6f\x75\x20\151\x6e\56\40\120\154\145\141\x73\145\x20\143\157\x6e\x74\141\143\x74\40\x79\157\x75\x72\40\141\x64\x6d\x69\x6e\151\x73\x74\162\141\x74\157\162\x2e", "\105\162\162\157\162\40\72\x20\x55\x73\x65\x72\x6e\x61\155\145\x20\154\145\156\x67\x74\150\x20\x6c\151\x6d\151\164\x20\x72\x65\x61\143\150\145\144");
    die;
    yK:
    do_action("\155\157\x5f\163\x61\x6d\x6c\x5f\141\x74\164\x72\151\x62\165\164\145\x73", $a3, $ju, $IF, $p0, $Yh);
    if (username_exists($a3) || email_exists($ju)) {
        goto CU;
    }
    $rd = get_option("\163\x61\x6d\154\x5f\x61\155\x5f\x72\x6f\154\x65\137\x6d\141\160\160\151\x6e\x67");
    if (!@unserialize($rd)) {
        goto B9;
    }
    $rd = unserialize($rd);
    B9:
    $yQ = true;
    $EV = get_option("\155\x6f\x5f\163\141\155\x6c\137\x64\157\x6e\164\x5f\143\162\145\141\x74\x65\x5f\x75\x73\145\x72\137\151\146\x5f\162\157\154\145\137\x6e\x6f\x74\137\155\141\160\160\145\144");
    if (!(!empty($EV) && strcmp($EV, "\143\x68\145\143\x6b\x65\x64") == 0)) {
        goto is;
    }
    $I3 = is_role_mapping_configured_for_user($rd, $Yh);
    $yQ = $I3;
    is:
    if ($yQ === true) {
        goto yN;
    }
    $zn = get_option("\155\x6f\137\163\x61\155\154\x5f\141\143\143\x6f\165\x6e\164\137\x63\x72\145\x61\x74\x69\x6f\x6e\x5f\144\x69\x73\x61\x62\x6c\145\x64\x5f\155\163\x67");
    if (!empty($zn)) {
        goto nT;
    }
    $zn = "\x57\x65\x20\143\157\x75\154\144\40\156\157\x74\x20\163\x69\x67\156\40\x79\x6f\165\x20\x69\156\x2e\x20\120\154\145\x61\x73\145\x20\143\157\156\x74\x61\143\164\x20\x79\157\165\162\x20\101\x64\155\x69\156\151\x73\x74\x72\141\x74\x6f\x72\x2e";
    nT:
    wp_die($zn, "\x45\x72\x72\157\x72\72\x20\116\157\164\x20\x61\40\x57\157\162\x64\x50\162\145\163\163\40\x4d\x65\x6d\142\x65\x72");
    die;
    goto wq;
    yN:
    $dP = wp_generate_password(10, false);
    if (!empty($a3)) {
        goto xv;
    }
    $wu = wp_create_user($ju, $dP, $ju);
    goto yz;
    xv:
    $wu = wp_create_user($a3, $dP, $ju);
    yz:
    $user = get_user_by("\x69\x64", $wu);
    $jU = assign_roles_to_user($user, $rd, $Yh);
    if ($jU !== true && !empty($GG) && $GG == "\143\x68\x65\x63\x6b\x65\144") {
        goto qR;
    }
    if ($jU !== true && !empty($BY)) {
        goto Fv;
    }
    if ($jU !== true) {
        goto Vh;
    }
    goto Yn;
    qR:
    $ru = wp_update_user(array("\x49\104" => $wu, "\162\157\x6c\145" => false));
    goto Yn;
    Fv:
    $ru = wp_update_user(array("\111\104" => $wu, "\162\x6f\154\x65" => $BY));
    goto Yn;
    Vh:
    $BY = get_option("\x64\x65\146\141\165\x6c\164\x5f\x72\x6f\154\x65");
    $ru = wp_update_user(array("\x49\104" => $wu, "\162\x6f\154\145" => $BY));
    Yn:
    if (empty($IF)) {
        goto Va;
    }
    $ru = wp_update_user(array("\111\104" => $wu, "\x66\151\x72\163\x74\137\156\141\155\x65" => $IF));
    Va:
    if (empty($p0)) {
        goto xS;
    }
    $ru = wp_update_user(array("\111\x44" => $wu, "\x6c\141\x73\x74\x5f\156\x61\155\145" => $p0));
    xS:
    if (is_null($wl)) {
        goto d0;
    }
    update_user_meta($wu, "\155\157\137\163\x61\155\x6c\x5f\x75\163\x65\162\x5f\141\x74\164\162\x69\142\165\164\x65\x73", $wl);
    $IZ = get_option("\163\141\x6d\154\137\141\x6d\137\144\x69\x73\x70\x6c\x61\171\137\x6e\x61\155\x65");
    if (empty($IZ)) {
        goto rO;
    }
    if (strcmp($IZ, "\x55\123\x45\122\116\x41\x4d\x45") == 0) {
        goto ZS;
    }
    if (strcmp($IZ, "\106\116\x41\x4d\x45") == 0 && !empty($IF)) {
        goto wR;
    }
    if (strcmp($IZ, "\x4c\116\101\115\105") == 0 && !empty($p0)) {
        goto jH;
    }
    if (strcmp($IZ, "\106\116\101\115\105\x5f\x4c\116\x41\115\105") == 0 && !empty($p0) && !empty($IF)) {
        goto j2;
    }
    if (!(strcmp($IZ, "\114\x4e\x41\x4d\105\137\106\116\101\x4d\105") == 0 && !empty($p0) && !empty($IF))) {
        goto tM;
    }
    $ru = wp_update_user(array("\111\104" => $wu, "\x64\x69\163\160\x6c\141\171\x5f\156\x61\155\145" => $p0 . "\40" . $IF));
    tM:
    goto AY;
    j2:
    $ru = wp_update_user(array("\x49\104" => $wu, "\144\x69\163\160\x6c\141\171\137\156\141\x6d\145" => $IF . "\40" . $p0));
    AY:
    goto nE;
    jH:
    $ru = wp_update_user(array("\x49\x44" => $wu, "\144\151\x73\x70\x6c\x61\171\x5f\x6e\141\155\x65" => $p0));
    nE:
    goto R0;
    wR:
    $ru = wp_update_user(array("\x49\104" => $wu, "\x64\x69\163\160\x6c\141\171\x5f\156\x61\155\x65" => $IF));
    R0:
    goto IN;
    ZS:
    $ru = wp_update_user(array("\111\x44" => $wu, "\x64\x69\163\160\x6c\141\x79\x5f\156\x61\x6d\x65" => $user->user_login));
    IN:
    rO:
    d0:
    wp_set_current_user($wu);
    wp_set_auth_cookie($wu);
    $user = get_user_by("\151\x64", $wu);
    do_action("\165\163\x65\x72\137\162\145\147\x69\x73\x74\x65\x72", $wu);
    do_action("\167\160\x5f\154\x6f\147\151\156", $user->user_login, $user);
    if (empty($jk)) {
        goto Mk;
    }
    update_user_meta($wu, "\155\157\137\x73\141\x6d\x6c\137\x73\x65\x73\x73\x69\157\156\x5f\x69\x6e\x64\145\170", $jk);
    Mk:
    if (empty($rB)) {
        goto L3;
    }
    update_user_meta($wu, "\155\157\x5f\x73\x61\155\x6c\x5f\156\141\155\145\x5f\151\144", $rB);
    L3:
    if (!get_option("\x6d\x6f\137\163\141\x6d\x6c\x5f\x63\x75\x73\x74\157\x6d\137\x61\x74\x74\162\163\137\155\141\160\160\x69\156\x67")) {
        goto F1;
    }
    $oY = get_option("\x6d\x6f\x5f\163\x61\155\154\137\143\165\163\x74\157\x6d\137\x61\164\164\x72\163\x5f\155\141\x70\160\x69\x6e\x67");
    if (!@unserialize($oY)) {
        goto I_;
    }
    $oY = unserialize($oY);
    I_:
    foreach ($oY as $Kn => $Iy) {
        if (!array_key_exists($Iy, $wl)) {
            goto QL;
        }
        $N4 = false;
        if (!(count($wl[$Iy]) == 1)) {
            goto kQ;
        }
        $N4 = true;
        kQ:
        if (!$N4) {
            goto PX;
        }
        update_user_meta($wu, $Kn, $wl[$Iy][0]);
        goto s0;
        PX:
        $Ex = array();
        foreach ($wl[$Iy] as $cp) {
            array_push($Ex, $cp);
            zu:
        }
        AH:
        update_user_meta($wu, $Kn, $Ex);
        s0:
        QL:
        nv:
    }
    qp:
    F1:
    if (!(!session_id() || session_id() == '' || !isset($_SESSION))) {
        goto Yx;
    }
    session_start();
    Yx:
    $_SESSION["\x6d\x6f\137\x73\141\x6d\154"]["\154\157\x67\147\x65\144\137\x69\x6e\137\167\151\164\150\137\x69\x64\160"] = TRUE;
    wq:
    $pg = get_option("\x6d\157\x5f\163\x61\155\154\x5f\x72\145\x6c\141\x79\x5f\163\x74\x61\x74\145");
    if (!empty($pg)) {
        goto Xk;
    }
    if (!empty($fA)) {
        goto md;
    }
    wp_redirect($We);
    goto ZT;
    md:
    if (filter_var($fA, FILTER_VALIDATE_URL) === FALSE) {
        goto g7;
    }
    if (strpos($fA, home_url()) !== false) {
        goto qT;
    }
    wp_redirect($We);
    goto D8;
    qT:
    wp_redirect($fA);
    D8:
    goto wg;
    g7:
    wp_redirect($fA);
    wg:
    ZT:
    goto rT;
    Xk:
    wp_redirect($pg);
    rT:
    die;
    goto qX;
    CU:
    if (username_exists($a3)) {
        goto Pe;
    }
    if (!email_exists($ju)) {
        goto hW;
    }
    $user = get_user_by("\x65\x6d\141\x69\154", $ju);
    $wu = $user->ID;
    hW:
    goto t0;
    Pe:
    $user = get_user_by("\154\157\x67\151\156", $a3);
    $wu = $user->ID;
    if (empty($ju)) {
        goto e3;
    }
    $ru = wp_update_user(array("\x49\x44" => $wu, "\x75\x73\145\162\x5f\x65\155\x61\x69\154" => $ju));
    e3:
    t0:
    if (empty($IF)) {
        goto aV;
    }
    $ru = wp_update_user(array("\111\104" => $wu, "\x66\151\162\x73\164\x5f\156\x61\x6d\x65" => $IF));
    aV:
    if (empty($p0)) {
        goto vo;
    }
    $ru = wp_update_user(array("\x49\104" => $wu, "\x6c\141\x73\x74\x5f\156\141\155\x65" => $p0));
    vo:
    if (!get_option("\155\157\x5f\x73\x61\x6d\154\137\x63\165\163\164\x6f\155\137\x61\x74\x74\x72\163\x5f\155\x61\x70\x70\151\156\x67")) {
        goto Su;
    }
    $oY = get_option("\x6d\x6f\137\x73\141\x6d\x6c\137\x63\x75\x73\164\x6f\x6d\137\141\x74\164\162\x73\x5f\x6d\x61\160\160\x69\156\x67");
    if (!@unserialize($oY)) {
        goto LY;
    }
    $oY = unserialize($oY);
    LY:
    foreach ($oY as $Kn => $Iy) {
        if (!array_key_exists($Iy, $wl)) {
            goto wu;
        }
        $N4 = false;
        if (!(count($wl[$Iy]) == 1)) {
            goto nb;
        }
        $N4 = true;
        nb:
        if (!$N4) {
            goto MP;
        }
        update_user_meta($wu, $Kn, $wl[$Iy][0]);
        goto fZ;
        MP:
        $Ex = array();
        foreach ($wl[$Iy] as $cp) {
            array_push($Ex, $cp);
            K1:
        }
        hq:
        update_user_meta($wu, $Kn, $Ex);
        fZ:
        wu:
        dt:
    }
    c4:
    Su:
    $rd = get_option("\163\x61\155\x6c\137\141\155\137\x72\157\154\x65\137\x6d\x61\160\x70\151\x6e\147");
    if (!@unserialize($rd)) {
        goto DA;
    }
    $rd = unserialize($rd);
    DA:
    $at = get_option("\163\x61\155\154\x5f\141\155\137\144\157\156\164\137\x75\160\144\x61\x74\145\137\145\x78\x69\163\x74\x69\x6e\147\x5f\165\163\x65\162\137\162\157\154\145");
    if (!(empty($at) || $at != "\x63\x68\145\x63\153\x65\144")) {
        goto vE;
    }
    $jU = assign_roles_to_user($user, $rd, $Yh);
    if ($jU !== true && !is_administrator_user($user) && !empty($GG) && $GG == "\x63\x68\145\143\153\145\144") {
        goto kE;
    }
    if ($jU !== true && !is_administrator_user($user) && !empty($BY)) {
        goto BW;
    }
    goto WJ;
    kE:
    $ru = wp_update_user(array("\111\104" => $wu, "\x72\x6f\154\145" => false));
    goto WJ;
    BW:
    $ru = wp_update_user(array("\111\x44" => $wu, "\x72\157\154\145" => $BY));
    WJ:
    vE:
    if (is_null($wl)) {
        goto Xn;
    }
    update_user_meta($wu, "\x6d\x6f\x5f\x73\x61\155\x6c\x5f\x75\x73\145\162\137\x61\x74\x74\162\151\142\x75\164\x65\163", $wl);
    $IZ = get_option("\x73\141\x6d\x6c\137\x61\155\x5f\x64\x69\163\160\x6c\x61\171\x5f\x6e\141\155\x65");
    if (empty($IZ)) {
        goto Jy;
    }
    if (strcmp($IZ, "\x55\123\105\x52\116\101\115\x45") == 0) {
        goto k_;
    }
    if (strcmp($IZ, "\x46\x4e\101\x4d\105") == 0 && !empty($IF)) {
        goto aK;
    }
    if (strcmp($IZ, "\x4c\x4e\101\x4d\105") == 0 && !empty($p0)) {
        goto VV;
    }
    if (strcmp($IZ, "\106\116\x41\x4d\x45\137\114\116\101\115\105") == 0 && !empty($p0) && !empty($IF)) {
        goto Eh;
    }
    if (!(strcmp($IZ, "\114\116\101\x4d\x45\x5f\x46\116\101\115\105") == 0 && !empty($p0) && !empty($IF))) {
        goto Vl;
    }
    $ru = wp_update_user(array("\x49\x44" => $wu, "\x64\x69\x73\160\154\141\x79\x5f\156\141\155\x65" => $p0 . "\x20" . $IF));
    Vl:
    goto rP;
    Eh:
    $ru = wp_update_user(array("\x49\104" => $wu, "\x64\151\163\x70\x6c\141\x79\x5f\156\141\x6d\145" => $IF . "\40" . $p0));
    rP:
    goto g9;
    VV:
    $ru = wp_update_user(array("\111\104" => $wu, "\x64\x69\163\160\154\141\171\137\156\x61\x6d\x65" => $p0));
    g9:
    goto pN;
    aK:
    $ru = wp_update_user(array("\111\104" => $wu, "\144\x69\x73\160\154\141\171\x5f\x6e\141\155\x65" => $IF));
    pN:
    goto Py;
    k_:
    $ru = wp_update_user(array("\111\x44" => $wu, "\144\151\163\x70\154\141\x79\x5f\x6e\x61\x6d\x65" => $user->user_login));
    Py:
    Jy:
    Xn:
    wp_set_current_user($wu);
    wp_set_auth_cookie($wu);
    $user = get_user_by("\151\144", $wu);
    do_action("\x77\160\137\x6c\x6f\147\151\x6e", $user->user_login, $user);
    if (empty($jk)) {
        goto Bi;
    }
    update_user_meta($wu, "\155\157\x5f\163\x61\155\154\x5f\163\145\x73\163\151\157\x6e\137\151\x6e\x64\145\x78", $jk);
    Bi:
    if (empty($rB)) {
        goto Fn;
    }
    update_user_meta($wu, "\155\x6f\x5f\163\x61\155\x6c\137\x6e\x61\155\x65\x5f\151\x64", $rB);
    Fn:
    if (!(!session_id() || session_id() == '' || !isset($_SESSION))) {
        goto MT;
    }
    session_start();
    MT:
    $_SESSION["\x6d\x6f\x5f\x73\x61\155\x6c"]["\154\x6f\x67\x67\x65\144\x5f\x69\x6e\137\x77\151\x74\150\137\151\x64\x70"] = TRUE;
    $pg = get_option("\155\157\x5f\163\x61\x6d\x6c\x5f\162\x65\x6c\141\x79\137\163\x74\141\164\145");
    if (!empty($pg)) {
        goto EM;
    }
    if (!empty($fA)) {
        goto ZF;
    }
    wp_redirect($We);
    goto G6;
    ZF:
    if (filter_var($fA, FILTER_VALIDATE_URL) === FALSE) {
        goto VZ;
    }
    wp_redirect($We);
    goto x6;
    VZ:
    wp_redirect($fA);
    x6:
    G6:
    goto oU;
    EM:
    wp_redirect($pg);
    oU:
    die;
    qX:
}
function check_if_user_allowed_to_login_due_to_role_restriction($Yh)
{
    $Ec = get_option("\x73\x61\x6d\154\137\141\155\x5f\144\x6f\156\x74\137\141\154\154\157\x77\x5f\165\x73\x65\x72\x5f\x74\x6f\154\157\147\151\x6e\137\143\x72\145\x61\x74\145\137\x77\151\164\150\137\x67\151\166\x65\156\137\147\x72\x6f\x75\x70\163");
    if (!($Ec == "\143\150\x65\143\153\x65\144")) {
        goto d2;
    }
    if (empty($Yh)) {
        goto dN;
    }
    $pt = get_option("\x6d\x6f\137\163\141\x6d\154\137\x72\x65\163\x74\162\x69\x63\x74\137\x75\163\145\x72\x73\x5f\x77\x69\x74\x68\137\x67\162\157\x75\160\163");
    $GL = explode("\x3b", $pt);
    foreach ($GL as $Ol) {
        foreach ($Yh as $P4) {
            $P4 = trim($P4);
            if (!(!empty($P4) && $P4 == $Ol)) {
                goto lQ;
            }
            wp_die("\131\x6f\165\x20\x61\162\x65\x20\x6e\x6f\x74\x20\141\165\x74\x68\x6f\162\x69\172\145\x64\x20\x74\157\40\154\157\x67\x69\156\x2e\40\x50\x6c\x65\141\x73\x65\40\143\x6f\156\x74\141\143\x74\40\x79\x6f\x75\x72\x20\141\x64\x6d\x69\156\151\163\x74\162\141\164\157\x72\56", "\105\162\x72\x6f\x72");
            lQ:
            TW:
        }
        GB:
        Di:
    }
    Ow:
    dN:
    d2:
}
function check_if_user_allowed_to_login($user, $We)
{
    $wu = $user->ID;
    global $wpdb;
    if (get_user_meta($wu, "\x6d\x6f\137\163\141\x6d\x6c\x5f\x75\163\145\162\x5f\x74\171\160\x65", true)) {
        goto B5;
    }
    if (get_option("\155\157\137\x73\141\155\x6c\137\x75\x73\x72\137\154\x6d\164")) {
        goto Op;
    }
    update_user_meta($wu, "\155\157\137\163\141\x6d\x6c\137\x75\x73\145\x72\137\x74\x79\160\x65", "\x73\163\157\137\x75\163\145\162");
    goto SO;
    Op:
    $Kn = get_option("\155\157\x5f\163\x61\155\x6c\137\x63\x75\163\164\157\x6d\145\x72\x5f\x74\x6f\x6b\145\x6e");
    $G9 = AESEncryption::decrypt_data(get_option("\155\x6f\137\163\x61\155\x6c\x5f\x75\x73\162\137\154\155\164"), $Kn);
    $C8 = "\x53\105\x4c\x45\103\x54\40\x43\x4f\125\116\x54\x28\x2a\51\x20\x46\122\x4f\115\40" . $wpdb->prefix . "\x75\163\145\x72\155\x65\x74\x61\x20\127\x48\x45\122\x45\40\x6d\x65\164\141\x5f\x6b\x65\x79\x3d\x27\x6d\157\137\x73\x61\x6d\154\137\x75\163\x65\x72\x5f\164\171\160\145\x27";
    $w_ = $wpdb->get_var($C8);
    if ($w_ >= $G9) {
        goto B8;
    }
    update_user_meta($wu, "\x6d\157\137\163\141\155\x6c\x5f\x75\x73\145\162\137\x74\171\x70\145", "\x73\163\157\137\165\x73\x65\162");
    goto ii;
    B8:
    if (get_option("\165\x73\145\x72\x5f\141\154\145\x72\164\137\145\155\x61\x69\154\137\163\x65\x6e\164")) {
        goto QH;
    }
    $V4 = new Customersaml();
    $V4->mo_saml_send_user_exceeded_alert_email($G9);
    QH:
    if (is_administrator_user($user)) {
        goto IS;
    }
    wp_redirect($We);
    die;
    goto UH;
    IS:
    update_user_meta($wu, "\155\x6f\x5f\x73\x61\155\154\137\x75\163\x65\x72\137\x74\x79\160\145", "\x73\163\157\x5f\x75\163\145\x72");
    UH:
    ii:
    SO:
    B5:
}
function assign_roles_to_user($user, $rd, $Yh)
{
    $jU = false;
    if (!(!empty($Yh) && !empty($rd) && !is_administrator_user($user))) {
        goto vT;
    }
    $user->set_role(false);
    $V7 = '';
    $ZP = false;
    foreach ($rd as $jP => $HD) {
        $GL = explode("\73", $HD);
        foreach ($GL as $Ol) {
            foreach ($Yh as $P4) {
                $P4 = trim($P4);
                if (!(!empty($P4) && $P4 == $Ol)) {
                    goto kX;
                }
                $jU = true;
                $user->add_role($jP);
                kX:
                RS:
            }
            vi:
            VW:
        }
        Ux:
        BH:
    }
    aS1:
    vT:
    return $jU;
}
function is_role_mapping_configured_for_user($rd, $Yh)
{
    if (!(!empty($Yh) && !empty($rd))) {
        goto tX;
    }
    foreach ($rd as $jP => $HD) {
        $GL = explode("\x3b", $HD);
        foreach ($GL as $Ol) {
            foreach ($Yh as $P4) {
                $P4 = trim($P4);
                if (!(!empty($P4) && is_regex_matched($Ol, $P4))) {
                    goto ue;
                }
                return true;
                ue:
                R3:
            }
            fu:
            TT:
        }
        sB:
        UJ:
    }
    rz:
    tX:
    return false;
}
function is_administrator_user($user)
{
    $Xz = $user->roles;
    if (!is_null($Xz) && in_array("\141\x64\x6d\x69\156\x69\163\164\162\141\x74\x6f\x72", $Xz, TRUE)) {
        goto gg;
    }
    return false;
    goto rE;
    gg:
    return true;
    rE:
}
function mo_saml_is_customer_registered()
{
    $oz = get_option("\x6d\x6f\137\163\141\155\x6c\x5f\141\144\x6d\151\156\x5f\x65\x6d\x61\151\154");
    $CQ = get_option("\x6d\x6f\x5f\x73\141\155\x6c\x5f\141\x64\x6d\x69\156\x5f\143\165\x73\x74\x6f\x6d\x65\162\x5f\x6b\145\x79");
    if (!$oz || !$CQ || !is_numeric(trim($CQ))) {
        goto YH;
    }
    return 1;
    goto AZ;
    YH:
    return 0;
    AZ:
}
function mo_saml_is_customer_license_verified()
{
    $Kn = get_option("\x6d\157\x5f\x73\x61\x6d\x6c\x5f\143\165\x73\164\157\155\145\x72\x5f\x74\x6f\153\x65\156");
    $Be = AESEncryption::decrypt_data(get_option("\164\137\163\151\x74\145\137\x73\164\141\164\x75\163"), $Kn);
    $i8 = get_option("\163\155\154\x5f\x6c\x6b");
    $oz = get_option("\155\x6f\137\x73\141\155\154\137\141\x64\x6d\x69\x6e\x5f\x65\155\141\x69\x6c");
    $CQ = get_option("\155\x6f\137\163\x61\x6d\154\x5f\141\144\155\x69\x6e\137\143\165\163\164\157\x6d\145\x72\x5f\x6b\x65\171");
    if (!$Be && !$i8 || !$oz || !$CQ || !is_numeric(trim($CQ))) {
        goto lf;
    }
    return 1;
    goto et;
    lf:
    return 0;
    et:
}
function saml_get_current_page_url()
{
    $zc = $_SERVER["\x48\x54\x54\120\x5f\x48\x4f\123\124"];
    if (!(substr($zc, -1) == "\x2f")) {
        goto eY;
    }
    $zc = substr($zc, 0, -1);
    eY:
    $K_ = $_SERVER["\122\105\121\x55\105\123\x54\137\x55\x52\x49"];
    if (!(substr($K_, 0, 1) == "\x2f")) {
        goto A5;
    }
    $K_ = substr($K_, 1);
    A5:
    $UY = isset($_SERVER["\110\124\x54\120\x53"]) && strcasecmp($_SERVER["\110\124\124\x50\123"], "\157\x6e") == 0;
    $SW = "\150\x74\x74\x70" . ($UY ? "\163" : '') . "\x3a\x2f\x2f" . $zc . "\57" . $K_;
    return $SW;
}
function show_status_error($Pb, $fA, $V3)
{
    $Pb = strip_tags($Pb);
    $V3 = strip_tags($V3);
    if ($fA == "\x74\x65\x73\164\126\x61\x6c\151\x64\141\164\x65") {
        goto gw;
    }
    wp_die("\x57\145\x20\x63\x6f\165\x6c\x64\x20\156\157\164\x20\163\x69\x67\156\x20\171\157\x75\x20\x69\x6e\x2e\x20\120\x6c\145\141\163\145\x20\143\157\156\x74\141\x63\164\x20\x79\157\x75\x72\40\101\144\x6d\151\x6e\x69\163\164\162\141\x74\157\162\56", "\105\162\x72\x6f\x72\x3a\x20\111\156\x76\141\x6c\151\x64\x20\x53\101\115\x4c\40\122\145\163\160\x6f\156\163\145\x20\123\164\141\x74\165\163");
    goto lp;
    gw:
    echo "\x3c\144\x69\x76\x20\x73\164\x79\x6c\x65\x3d\x22\x66\x6f\156\x74\x2d\x66\141\x6d\x69\x6c\x79\x3a\103\141\x6c\x69\142\x72\x69\73\160\x61\x64\x64\151\x6e\x67\72\60\40\x33\45\x3b\x22\x3e";
    echo "\x3c\144\151\166\40\x73\x74\171\x6c\145\75\42\143\157\x6c\157\x72\x3a\40\x23\x61\71\64\64\x34\x32\x3b\x62\x61\x63\x6b\x67\x72\x6f\x75\156\144\x2d\x63\x6f\x6c\157\x72\x3a\x20\43\146\x32\144\145\x64\145\73\160\x61\x64\x64\151\156\x67\72\x20\x31\x35\x70\170\x3b\x6d\141\162\x67\151\156\55\x62\x6f\164\x74\x6f\155\x3a\40\62\x30\160\x78\73\164\x65\170\164\55\x61\x6c\151\147\156\72\143\145\x6e\164\145\x72\73\142\x6f\x72\144\x65\162\72\61\160\x78\x20\x73\157\154\151\144\x20\x23\x45\66\102\63\x42\62\x3b\x66\157\x6e\164\55\x73\151\x7a\145\72\61\x38\x70\164\x3b\x22\x3e\40\x45\122\122\117\122\x3c\x2f\144\151\x76\x3e\12\x20\40\40\40\40\40\40\x20\40\x20\x20\x20\x20\40\40\x20\x3c\144\151\x76\x20\163\164\x79\154\x65\75\x22\143\x6f\x6c\x6f\162\x3a\40\43\x61\71\x34\64\64\62\x3b\146\x6f\x6e\164\x2d\x73\x69\172\145\x3a\x31\x34\x70\x74\73\40\155\141\162\147\151\x6e\55\x62\157\164\164\157\155\x3a\62\60\160\170\x3b\42\x3e\x3c\160\76\x3c\163\164\162\x6f\156\147\76\x45\x72\162\x6f\x72\x3a\x20\74\57\x73\x74\x72\157\x6e\147\76\40\x49\156\x76\141\x6c\151\144\x20\x53\x41\115\x4c\x20\122\x65\163\160\157\x6e\163\x65\40\x53\x74\x61\164\x75\x73\x2e\74\x2f\160\x3e\12\x20\x20\40\40\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\40\x3c\160\76\74\x73\164\x72\x6f\x6e\147\76\103\x61\x75\x73\x65\163\x3c\x2f\163\164\x72\x6f\156\147\x3e\x3a\40\111\x64\145\x6e\x74\x69\164\x79\x20\x50\x72\157\x76\x69\144\x65\x72\x20\x68\x61\163\40\x73\145\156\x74\40\47" . $Pb . "\47\x20\163\x74\141\x74\x75\163\x20\x63\x6f\x64\x65\x20\151\156\x20\x53\101\x4d\x4c\x20\122\x65\163\160\x6f\x6e\163\145\56\x20\74\57\x70\x3e\xa\11\x9\x9\x9\11\11\x9\x9\x3c\160\x3e\74\163\x74\162\157\x6e\x67\x3e\x52\145\141\x73\x6f\x6e\x3c\x2f\x73\x74\162\x6f\156\x67\x3e\72\x20" . get_status_message($Pb) . "\x3c\x2f\160\76\x20";
    if (empty($V3)) {
        goto uS;
    }
    echo "\74\160\76\x3c\x73\x74\x72\x6f\156\x67\76\123\x74\141\164\x75\163\40\x4d\x65\163\x73\141\x67\x65\x20\x69\x6e\40\164\x68\145\x20\123\x41\115\114\40\122\x65\163\160\x6f\x6e\x73\145\72\x3c\x2f\x73\x74\x72\x6f\x6e\x67\x3e\40\x3c\142\x72\57\76" . $V3 . "\74\x2f\x70\x3e";
    uS:
    echo "\74\142\x72\x3e\12\x20\40\40\x20\x20\40\40\40\40\40\x20\x20\40\x20\x20\x20\x3c\x2f\144\x69\166\76\xa\12\40\x20\x20\40\x20\x20\x20\x20\40\40\x20\40\40\40\x20\40\x3c\144\x69\x76\40\163\164\x79\154\145\75\x22\x6d\141\162\147\151\x6e\x3a\63\45\x3b\144\x69\163\160\x6c\x61\x79\72\142\154\157\x63\153\x3b\164\145\170\164\x2d\141\x6c\151\x67\156\x3a\143\x65\x6e\164\x65\162\x3b\42\76\xa\x20\40\40\x20\40\40\40\40\40\x20\40\40\x20\40\40\x20\74\x64\151\x76\40\163\164\x79\x6c\x65\x3d\x22\x6d\141\x72\147\x69\156\x3a\63\45\x3b\x64\x69\x73\160\x6c\141\171\72\142\154\157\x63\153\x3b\164\145\170\164\55\x61\x6c\151\147\x6e\72\x63\x65\156\164\x65\162\x3b\42\76\x3c\x69\x6e\x70\165\x74\40\163\x74\171\x6c\x65\x3d\42\x70\x61\x64\144\151\x6e\x67\72\x31\x25\73\x77\x69\144\164\150\x3a\61\x30\60\160\170\73\142\141\143\x6b\147\162\157\165\x6e\144\x3a\40\x23\x30\x30\71\x31\x43\x44\x20\x6e\157\156\145\40\162\x65\160\145\141\164\x20\163\143\162\157\x6c\x6c\x20\60\45\x20\60\45\73\143\x75\162\x73\157\162\x3a\x20\x70\157\151\156\x74\145\x72\x3b\146\157\x6e\164\x2d\163\x69\172\145\x3a\x31\x35\x70\170\x3b\x62\157\162\x64\x65\162\55\167\x69\x64\164\150\x3a\x20\x31\x70\170\x3b\142\x6f\162\x64\145\162\55\x73\164\171\154\x65\72\40\x73\x6f\154\x69\x64\x3b\x62\157\162\144\145\162\x2d\162\x61\x64\x69\165\163\x3a\40\63\x70\170\x3b\167\150\151\x74\145\55\163\x70\x61\x63\145\72\x20\156\157\167\162\141\x70\x3b\142\157\x78\55\163\x69\172\151\x6e\147\72\40\x62\157\162\144\145\162\x2d\142\157\170\73\x62\x6f\162\144\145\x72\55\143\157\154\x6f\162\x3a\40\43\60\60\x37\63\101\101\73\142\x6f\x78\x2d\163\150\x61\144\157\x77\x3a\40\60\160\x78\x20\61\160\x78\x20\60\x70\x78\x20\x72\147\x62\141\x28\x31\x32\60\x2c\40\62\x30\x30\x2c\x20\62\63\60\x2c\40\x30\56\66\x29\x20\151\x6e\x73\145\x74\73\143\157\154\x6f\x72\72\x20\x23\106\x46\x46\73\42\x74\171\160\145\x3d\x22\142\165\x74\164\157\x6e\x22\x20\166\141\x6c\x75\145\75\x22\104\157\156\x65\42\40\x6f\156\x43\x6c\151\x63\x6b\75\42\163\145\154\146\56\143\x6c\x6f\163\x65\50\x29\73\42\x3e\74\x2f\x64\x69\166\x3e";
    die;
    lp:
}
function addLink($y5, $Vi)
{
    $TK = "\74\141\x20\x68\162\145\146\75\x22" . $Vi . "\42\76" . $y5 . "\x3c\57\x61\x3e";
    return $TK;
}
function get_status_message($Pb)
{
    switch ($Pb) {
        case "\122\x65\x71\x75\145\x73\164\145\x72":
            return "\124\150\x65\40\x72\145\161\x75\x65\x73\x74\x20\x63\157\165\x6c\x64\40\156\x6f\x74\40\x62\145\x20\x70\x65\x72\x66\x6f\x72\x6d\x65\144\40\x64\165\x65\x20\x74\157\40\x61\x6e\40\145\162\x72\x6f\x72\x20\x6f\x6e\40\164\x68\x65\x20\x70\141\x72\164\x20\157\146\x20\164\150\x65\x20\162\145\161\165\145\x73\x74\145\162\x2e";
            goto XW;
        case "\122\x65\x73\x70\x6f\x6e\144\x65\x72":
            return "\x54\150\145\40\162\x65\161\x75\x65\x73\x74\x20\x63\x6f\x75\154\144\40\x6e\x6f\x74\40\x62\145\x20\160\145\x72\146\157\162\x6d\x65\144\x20\x64\x75\145\x20\x74\x6f\40\x61\x6e\40\x65\x72\162\157\162\x20\x6f\156\x20\x74\150\x65\40\x70\x61\162\x74\40\157\x66\x20\x74\150\x65\40\123\x41\115\x4c\40\x72\145\163\x70\x6f\x6e\144\x65\162\40\x6f\x72\x20\123\101\115\114\x20\141\x75\164\x68\x6f\x72\151\x74\171\x2e";
            goto XW;
        case "\x56\x65\x72\x73\151\157\156\x4d\151\x73\x6d\141\x74\x63\x68":
            return "\124\150\x65\x20\123\x41\x4d\x4c\x20\x72\145\x73\160\x6f\156\144\x65\x72\x20\x63\157\x75\154\144\40\156\x6f\164\x20\160\162\x6f\143\145\163\163\x20\164\x68\145\x20\x72\145\161\x75\145\163\x74\40\142\x65\x63\x61\165\x73\145\x20\x74\x68\145\40\166\x65\162\x73\x69\x6f\156\x20\x6f\146\x20\x74\150\145\x20\162\145\161\165\x65\x73\164\40\155\x65\163\x73\x61\x67\x65\x20\167\x61\x73\40\151\156\x63\x6f\x72\162\x65\143\164\x2e";
            goto XW;
        default:
            return "\125\156\x6b\156\157\167\156";
    }
    p8:
    XW:
}
function mo_saml_register_widget()
{
    register_widget("\x6d\157\137\154\157\147\x69\x6e\x5f\x77\151\x64");
}
add_action("\x77\x69\x64\147\145\x74\163\137\x69\156\151\164", "\x6d\157\x5f\163\141\x6d\x6c\x5f\x72\145\147\x69\163\164\x65\162\137\x77\x69\144\147\x65\x74");
add_action("\x69\x6e\151\164", "\155\157\137\x6c\x6f\x67\151\x6e\x5f\x76\141\154\x69\x64\141\164\x65");
?>

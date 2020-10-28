<?php


include_once dirname(__FILE__) . "\x2f\125\x74\x69\x6c\x69\x74\x69\x65\x73\56\160\150\160";
include_once dirname(__FILE__) . "\x2f\122\x65\163\x70\157\x6e\x73\145\56\x70\x68\160";
include_once dirname(__FILE__) . "\57\x4c\x6f\x67\157\x75\x74\122\145\x71\x75\x65\163\x74\x2e\x70\x68\x70";
include_once "\x78\x6d\154\x73\x65\x63\154\x69\x62\x73\56\x70\150\x70";
use RobRichards\XMLSecLibs\XMLSecurityKey;
use RobRichards\XMLSecLibs\XMLSecurityDSig;
use RobRichards\XMLSecLibs\XMLSecEnc;
if (class_exists("\x41\x45\x53\x45\x6e\x63\x72\171\x70\164\151\x6f\156")) {
    goto RN;
}
require_once dirname(__FILE__) . "\57\151\156\x63\154\165\x64\x65\163\x2f\154\x69\142\x2f\x65\x6e\143\162\171\x70\164\151\157\156\56\x70\x68\160";
RN:
class mo_login_wid extends WP_Widget
{
    public function __construct()
    {
        $om = get_option("\163\x61\155\x6c\x5f\x69\x64\145\156\x74\151\x74\171\137\156\141\155\x65");
        parent::__construct("\123\141\155\154\137\114\x6f\147\x69\x6e\x5f\127\x69\x64\x67\145\164", "\114\157\147\151\156\x20\x77\x69\x74\x68\x20" . $om, array("\x64\x65\163\143\162\x69\160\x74\x69\157\x6e" => __("\x54\150\151\x73\x20\151\x73\40\141\x20\155\151\x6e\151\117\x72\x61\156\x67\x65\40\123\x41\x4d\x4c\x20\154\x6f\x67\x69\156\40\x77\151\x64\147\145\164\x2e", "\155\x6f\x73\x61\x6d\x6c")));
    }
    public function widget($Ib, $jr)
    {
        extract($Ib);
        $cP = apply_filters("\167\x69\x64\x67\145\164\x5f\164\x69\x74\154\x65", $jr["\167\x69\x64\137\x74\x69\164\x6c\x65"]);
        echo $Ib["\142\145\146\157\x72\145\x5f\x77\x69\x64\147\145\164"];
        if (empty($cP)) {
            goto AV;
        }
        echo $Ib["\x62\145\x66\157\x72\145\x5f\164\x69\x74\x6c\145"] . $cP . $Ib["\x61\x66\164\145\x72\137\164\151\164\154\x65"];
        AV:
        $this->loginForm();
        echo $Ib["\x61\146\164\x65\x72\x5f\167\151\144\147\145\164"];
    }
    public function update($dk, $uh)
    {
        $jr = array();
        $jr["\167\151\144\x5f\164\151\x74\x6c\145"] = strip_tags($dk["\167\x69\x64\x5f\164\151\164\x6c\145"]);
        return $jr;
    }
    public function form($jr)
    {
        $cP = '';
        if (!array_key_exists("\x77\151\144\x5f\x74\151\164\154\x65", $jr)) {
            goto gX;
        }
        $cP = $jr["\167\x69\x64\137\x74\x69\x74\154\x65"];
        gX:
        echo "\15\xa\x9\11\x3c\x70\x3e\x3c\x6c\141\142\x65\154\x20\146\x6f\x72\x3d\x22" . $this->get_field_id("\x77\151\x64\137\x74\151\x74\154\x65") . "\40\42\x3e" . _e("\124\151\x74\x6c\145\72") . "\40\x3c\57\154\x61\x62\145\x6c\x3e\15\12\x9\11\x3c\151\156\160\x75\164\x20\x63\x6c\141\163\163\75\x22\167\151\144\x65\146\x61\164\42\x20\151\144\x3d\42" . $this->get_field_id("\167\x69\144\137\164\x69\164\x6c\145") . "\x22\40\x6e\141\155\x65\75\x22" . $this->get_field_name("\x77\151\144\137\x74\151\x74\154\x65") . "\x22\40\x74\171\160\x65\x3d\42\x74\x65\x78\x74\x22\x20\166\x61\x6c\165\145\75\42" . $cP . "\x22\x20\57\76\15\xa\11\x9\74\57\160\76";
    }
    public function loginForm()
    {
        global $post;
        if (!is_user_logged_in()) {
            goto oa;
        }
        $current_user = wp_get_current_user();
        $mV = "\110\145\x6c\154\x6f\x2c";
        if (!get_option("\x6d\x6f\x5f\163\x61\155\154\137\x63\x75\163\x74\x6f\155\x5f\x67\162\145\145\x74\x69\x6e\147\137\164\x65\x78\164")) {
            goto e2;
        }
        $mV = get_option("\155\157\x5f\x73\x61\x6d\x6c\137\143\165\x73\x74\x6f\155\137\147\x72\145\x65\x74\151\x6e\x67\x5f\x74\x65\170\x74");
        e2:
        $YC = '';
        if (!get_option("\155\x6f\137\163\141\155\x6c\137\147\162\x65\145\164\x69\x6e\x67\x5f\156\x61\155\145")) {
            goto kH;
        }
        switch (get_option("\x6d\157\137\x73\x61\x6d\154\137\147\x72\x65\145\x74\x69\156\x67\x5f\156\x61\x6d\x65")) {
            case "\125\123\x45\x52\x4e\x41\115\x45":
                $YC = $current_user->user_login;
                goto Dp;
            case "\x45\115\x41\111\114":
                $YC = $current_user->user_email;
                goto Dp;
            case "\x46\116\101\x4d\x45":
                $YC = $current_user->user_firstname;
                goto Dp;
            case "\114\x4e\x41\x4d\x45":
                $YC = $current_user->user_lastname;
                goto Dp;
            case "\x46\x4e\x41\x4d\x45\137\x4c\116\101\x4d\x45":
                $YC = $current_user->user_firstname . "\40" . $current_user->user_lastname;
                goto Dp;
            case "\114\116\x41\x4d\105\137\106\x4e\x41\115\x45":
                $YC = $current_user->user_lastname . "\40" . $current_user->user_firstname;
                goto Dp;
            default:
                $YC = $current_user->user_login;
        }
        vA:
        Dp:
        kH:
        $YC = trim($YC);
        if (!empty($YC)) {
            goto In;
        }
        $YC = $current_user->user_login;
        In:
        $dH = $mV . "\x20" . $YC;
        $sL = "\x4c\157\x67\157\165\164";
        if (!get_option("\x6d\157\x5f\163\141\x6d\154\137\x63\x75\163\x74\157\155\x5f\154\157\147\x6f\165\164\x5f\x74\145\x78\x74")) {
            goto Hv;
        }
        $sL = get_option("\x6d\157\x5f\163\141\x6d\154\x5f\143\x75\163\164\157\155\137\154\x6f\x67\x6f\165\164\x5f\x74\x65\x78\164");
        Hv:
        echo $dH . "\40\x7c\x20\74\141\40\150\162\x65\146\x3d\42" . wp_logout_url(home_url()) . "\x22\x20\164\x69\x74\x6c\145\75\42\x6c\x6f\147\x6f\165\x74\x22\40\x3e" . $sL . "\74\57\141\x3e\x3c\57\154\x69\76";
        goto K5;
        oa:
        $wA = saml_get_current_page_url();
        echo "\xd\12\11\x9\74\x73\143\162\151\x70\164\x3e\xd\xa\11\11\x66\x75\x6e\143\164\x69\x6f\156\40\163\165\142\155\x69\x74\x53\141\155\154\x46\x6f\162\x6d\50\x29\x7b\x20\144\157\x63\x75\x6d\x65\x6e\x74\x2e\x67\x65\164\105\154\145\155\145\x6e\x74\102\171\111\x64\x28\x22\x6d\x69\x6e\x69\x6f\162\x61\x6e\x67\x65\x2d\163\x61\155\154\x2d\x73\x70\55\163\163\x6f\55\x6c\157\x67\x69\156\55\146\157\x72\155\x22\x29\56\x73\x75\142\x6d\x69\164\x28\x29\73\40\x7d\xd\12\x9\x9\x3c\x2f\x73\143\x72\151\160\x74\76\15\12\11\x9\74\146\157\162\155\40\x6e\x61\155\x65\75\x22\155\151\156\x69\x6f\162\x61\156\147\x65\x2d\x73\141\x6d\x6c\55\x73\x70\x2d\163\163\157\55\154\x6f\147\151\156\x2d\x66\x6f\x72\x6d\x22\40\x69\144\75\x22\x6d\x69\156\x69\x6f\162\x61\156\x67\145\55\x73\x61\x6d\154\55\x73\160\55\x73\163\157\55\x6c\x6f\147\x69\156\55\x66\x6f\162\155\x22\40\155\145\164\x68\x6f\144\x3d\42\160\157\x73\x74\x22\40\141\143\164\151\157\x6e\75\42\x22\x3e\xd\12\11\11\74\x69\156\160\165\164\x20\164\x79\x70\x65\x3d\x22\150\151\144\x64\145\x6e\x22\x20\156\x61\x6d\145\75\x22\157\160\164\151\x6f\x6e\x22\x20\x76\x61\x6c\x75\x65\75\x22\163\x61\x6d\x6c\137\x75\163\x65\162\137\x6c\x6f\147\151\x6e\42\40\x2f\x3e\15\12\11\x9\74\151\156\x70\x75\164\40\x74\171\160\x65\x3d\x22\150\x69\x64\x64\145\156\x22\x20\156\141\x6d\x65\x3d\x22\162\145\144\151\x72\x65\x63\164\x5f\x74\x6f\x22\40\166\x61\x6c\165\145\75\42" . $wA . "\x22\40\x2f\x3e\xd\12\15\xa\11\x9\x3c\146\x6f\156\x74\x20\x73\x69\x7a\145\x3d\42\53\61\42\x20\x73\164\171\154\145\75\x22\x76\145\x72\x74\x69\143\x61\x6c\55\x61\x6c\151\x67\156\72\x74\x6f\160\73\x22\76\x20\74\57\x66\157\x6e\164\x3e";
        $Q9 = get_option("\x73\x61\155\154\137\151\x64\x65\156\x74\x69\164\x79\x5f\x6e\141\x6d\x65");
        if (!empty($Q9)) {
            goto dY;
        }
        echo "\120\x6c\x65\x61\163\145\x20\x63\157\x6e\146\x69\x67\x75\x72\x65\40\164\x68\x65\40\155\151\x6e\151\117\x72\x61\156\147\145\x20\123\x41\115\114\x20\x50\x6c\x75\147\x69\156\x20\146\151\x72\163\164\x2e";
        goto M4;
        dY:
        $zZ = "\x4c\157\147\x69\156\40\167\x69\x74\x68\x20\x23\x23\111\104\x50\43\x23";
        if (!get_option("\x6d\x6f\x5f\x73\141\x6d\x6c\x5f\143\x75\x73\x74\157\155\137\x6c\x6f\147\151\156\137\164\145\170\164")) {
            goto Od;
        }
        $zZ = get_option("\x6d\x6f\x5f\x73\141\x6d\x6c\137\143\x75\163\x74\x6f\155\x5f\154\x6f\x67\x69\156\137\x74\145\170\x74");
        Od:
        $zZ = str_replace("\x23\43\x49\x44\120\43\x23", $Q9, $zZ);
        $l9 = false;
        if (!get_option("\155\x6f\x5f\x73\x61\x6d\x6c\x5f\165\x73\145\137\142\165\164\164\x6f\156\137\x61\163\137\x77\x69\x64\147\x65\x74")) {
            goto TY;
        }
        if (!(get_option("\155\157\137\x73\x61\155\x6c\137\x75\163\x65\x5f\142\x75\x74\x74\157\x6e\137\x61\x73\137\167\x69\x64\147\145\x74") == "\x74\162\165\145")) {
            goto F1;
        }
        $l9 = true;
        F1:
        TY:
        if (!$l9) {
            goto gd;
        }
        $rs = get_option("\x6d\157\137\163\141\155\x6c\137\142\165\x74\x74\157\x6e\x5f\167\151\144\x74\x68") ? get_option("\x6d\157\x5f\x73\x61\x6d\154\x5f\x62\165\164\x74\x6f\156\137\167\151\144\x74\150") : "\x31\x30\60";
        $kf = get_option("\x6d\157\x5f\x73\x61\155\154\137\142\165\x74\x74\157\x6e\137\150\x65\151\147\150\x74") ? get_option("\155\157\137\x73\x61\155\x6c\x5f\x62\165\164\x74\157\x6e\x5f\x68\x65\x69\x67\x68\164") : "\65\x30";
        $TS = get_option("\x6d\157\137\163\141\155\x6c\137\142\x75\164\164\x6f\x6e\x5f\x73\x69\x7a\x65") ? get_option("\x6d\x6f\137\163\141\155\x6c\137\142\x75\164\164\157\x6e\137\x73\x69\172\x65") : "\x35\60";
        $ck = get_option("\155\157\x5f\x73\x61\x6d\154\x5f\x62\x75\x74\164\157\156\137\x63\x75\x72\166\x65") ? get_option("\155\x6f\137\163\141\155\x6c\137\x62\165\x74\164\157\x6e\137\143\165\162\x76\x65") : "\65";
        $QM = get_option("\x6d\157\x5f\x73\141\155\x6c\137\142\165\x74\x74\157\x6e\137\x63\x6f\x6c\x6f\x72") ? get_option("\x6d\x6f\x5f\x73\141\155\x6c\x5f\x62\165\x74\164\x6f\x6e\137\x63\157\x6c\x6f\162") : "\60\60\x38\65\x62\x61";
        $qf = get_option("\x6d\157\x5f\x73\141\155\154\x5f\142\165\x74\x74\x6f\x6e\137\x74\x68\145\155\x65") ? get_option("\x6d\x6f\137\163\141\155\154\137\142\x75\164\164\157\x6e\137\164\150\145\155\145") : "\154\157\156\147\x62\x75\164\x74\x6f\x6e";
        $r7 = get_option("\155\157\137\163\x61\x6d\x6c\137\x62\x75\164\164\x6f\x6e\x5f\x74\x65\170\x74") ? get_option("\155\157\x5f\163\141\155\x6c\x5f\142\x75\164\x74\x6f\156\137\164\145\x78\x74") : (get_option("\163\x61\155\154\137\151\144\145\156\x74\x69\164\171\x5f\x6e\x61\x6d\145") ? get_option("\x73\x61\155\154\x5f\x69\144\145\156\x74\x69\x74\x79\x5f\156\x61\x6d\145") : "\114\x6f\x67\x69\x6e");
        $mT = get_option("\x6d\x6f\137\x73\x61\155\x6c\137\146\157\x6e\164\137\x63\157\x6c\157\162") ? get_option("\155\157\137\163\x61\155\154\x5f\x66\157\x6e\164\x5f\x63\157\x6c\157\x72") : "\x66\146\x66\146\x66\146";
        $RO = get_option("\155\157\x5f\163\141\155\154\137\x66\157\x6e\x74\x5f\x73\151\172\145") ? get_option("\155\x6f\x5f\x73\141\x6d\154\x5f\146\x6f\x6e\164\137\x73\x69\x7a\x65") : "\x32\60";
        $zZ = "\x3c\x69\156\x70\165\164\40\x74\x79\x70\145\x3d\42\x62\165\164\x74\x6f\x6e\42\x20\156\141\155\x65\75\42\155\x6f\137\x73\141\155\x6c\x5f\167\x70\137\x73\163\x6f\137\x62\165\x74\164\x6f\156\x22\40\166\141\x6c\165\145\75\x22" . $r7 . "\x22\x20\x73\164\171\x6c\145\x3d\x22";
        $Hq = '';
        if ($qf == "\154\157\156\x67\142\x75\x74\164\x6f\156") {
            goto ZU;
        }
        if ($qf == "\x63\151\x72\x63\154\x65") {
            goto Vj;
        }
        if ($qf == "\157\x76\x61\154") {
            goto DN;
        }
        if ($qf == "\163\161\x75\141\162\x65") {
            goto sH;
        }
        goto Jt;
        Vj:
        $Hq = $Hq . "\167\x69\x64\x74\150\x3a" . $TS . "\x70\x78\x3b";
        $Hq = $Hq . "\150\145\x69\147\x68\x74\72" . $TS . "\160\170\x3b";
        $Hq = $Hq . "\142\157\x72\x64\x65\162\x2d\x72\141\x64\x69\165\163\72\x39\x39\x39\x70\170\x3b";
        goto Jt;
        DN:
        $Hq = $Hq . "\x77\x69\x64\x74\150\x3a" . $TS . "\160\x78\x3b";
        $Hq = $Hq . "\150\x65\x69\147\150\164\72" . $TS . "\x70\170\73";
        $Hq = $Hq . "\142\157\x72\x64\x65\x72\55\162\141\x64\151\x75\x73\x3a\65\160\170\x3b";
        goto Jt;
        sH:
        $Hq = $Hq . "\167\x69\144\164\150\72" . $TS . "\160\x78\73";
        $Hq = $Hq . "\x68\x65\151\147\150\164\72" . $TS . "\x70\170\x3b";
        $Hq = $Hq . "\x62\x6f\162\144\x65\x72\55\x72\141\x64\151\165\163\x3a\60\x70\x78\73";
        Jt:
        goto r2;
        ZU:
        $Hq = $Hq . "\x77\151\144\x74\150\x3a" . $rs . "\160\170\x3b";
        $Hq = $Hq . "\x68\145\151\147\150\x74\72" . $kf . "\x70\170\73";
        $Hq = $Hq . "\142\157\x72\x64\x65\x72\55\162\141\144\151\x75\x73\x3a" . $ck . "\x70\x78\x3b";
        r2:
        $Hq = $Hq . "\142\x61\143\153\147\x72\157\x75\x6e\x64\x2d\x63\x6f\154\157\162\x3a\43" . $QM . "\x3b";
        $Hq = $Hq . "\142\x6f\x72\144\145\162\x2d\143\157\154\157\x72\x3a\164\162\141\156\163\x70\141\x72\145\x6e\x74\73";
        $Hq = $Hq . "\143\157\x6c\157\162\x3a\43" . $mT . "\x3b";
        $Hq = $Hq . "\x66\x6f\x6e\164\55\x73\151\x7a\145\x3a" . $RO . "\x70\x78\73";
        $Hq = $Hq . "\160\141\x64\144\151\156\147\72\60\x70\x78\73";
        $zZ = $zZ . $Hq . "\42\57\76";
        gd:
        ?>
 <a href="#" onClick="submitSamlForm()"><?php 
        echo $zZ;
        ?>
</a></form> <?php 
        M4:
        if ($this->mo_saml_check_empty_or_null_val(get_option("\155\x6f\x5f\163\141\x6d\154\137\x72\145\144\151\162\x65\x63\x74\137\145\x72\162\157\x72\x5f\x63\x6f\x64\145"))) {
            goto o6;
        }
        echo "\74\x64\151\x76\76\74\57\144\151\x76\76\74\144\151\x76\40\164\151\x74\154\x65\x3d\42\x4c\157\147\x69\156\40\105\x72\x72\x6f\x72\42\x3e\74\x66\157\x6e\164\40\x63\x6f\x6c\x6f\162\x3d\x22\x72\145\x64\42\x3e\x57\x65\x20\143\157\165\x6c\x64\x20\x6e\x6f\164\x20\163\151\147\x6e\x20\x79\x6f\x75\40\151\x6e\x2e\40\120\x6c\145\x61\x73\x65\x20\x63\157\156\164\141\143\164\40\x79\x6f\x75\162\x20\101\144\155\151\x6e\151\x73\164\x72\x61\x74\157\x72\56\x3c\57\x66\157\x6e\x74\76\x3c\x2f\144\x69\166\x3e";
        delete_option("\x6d\x6f\137\163\x61\155\x6c\137\x72\145\144\151\x72\x65\x63\x74\x5f\145\x72\162\x6f\162\x5f\x63\x6f\x64\145");
        delete_option("\155\157\137\x73\141\155\x6c\x5f\x72\145\144\151\162\x65\143\164\x5f\x65\x72\x72\157\162\137\x72\x65\141\163\x6f\156");
        o6:
        echo "\x9\x3c\57\x75\154\76\15\xa\x9\x9\x3c\57\146\x6f\x72\x6d\76";
        K5:
    }
    public function mo_saml_check_empty_or_null_val($DE)
    {
        if (!(!isset($DE) || empty($DE))) {
            goto EK;
        }
        return true;
        EK:
        return false;
    }
    public function mo_saml_widget_init()
    {
        if (!(isset($_REQUEST["\157\x70\164\151\x6f\x6e"]) and $_REQUEST["\x6f\160\164\x69\157\156"] == "\163\x61\155\154\137\165\x73\x65\x72\x5f\x6c\157\x67\157\x75\x74")) {
            goto bL;
        }
        $user = is_user_logged_in() ? wp_get_current_user() : null;
        $this->mo_saml_logout('', '', $user);
        bL:
    }
    function mo_saml_logout($wA, $iK, $user)
    {
        $y1 = get_option("\163\141\x6d\154\x5f\x6c\157\147\x6f\x75\164\x5f\165\x72\x6c");
        $PP = get_option("\163\141\x6d\154\x5f\x6c\157\147\157\x75\164\x5f\142\x69\156\x64\x69\x6e\x67\137\164\171\x70\x65");
        $Jn = wp_get_referer();
        $Rj = get_option("\155\x6f\137\163\x61\155\x6c\x5f\163\160\x5f\x62\x61\x73\145\137\165\x72\154");
        if (!empty($Jn)) {
            goto Kr;
        }
        $Jn = !empty($Rj) ? $Rj : home_url();
        Kr:
        if (empty($y1)) {
            goto EB;
        }
        if (!(!session_id() || session_id() == '' || !isset($_SESSION))) {
            goto mz;
        }
        session_start();
        mz:
        if (isset($_SESSION["\x6d\157\137\x73\141\155\x6c\137\x6c\157\147\157\165\x74\x5f\x72\145\x71\165\x65\163\x74"])) {
            goto ye;
        }
        if (isset($_SESSION["\x6d\157\x5f\x73\x61\x6d\x6c"]["\x6c\x6f\147\x67\145\144\137\x69\x6e\137\x77\151\x74\x68\137\x69\x64\160"])) {
            goto jM;
        }
        goto r_;
        ye:
        self::createLogoutResponseAndRedirect($y1, $PP);
        die;
        goto r_;
        jM:
        $current_user = $user;
        $Kt = get_user_meta($current_user->ID, "\155\x6f\137\163\x61\x6d\x6c\137\156\x61\x6d\x65\x5f\151\x64");
        $jO = get_user_meta($current_user->ID, "\x6d\157\x5f\163\141\155\x6c\x5f\x73\145\x73\163\151\x6f\x6e\x5f\151\x6e\x64\145\x78");
        if (empty($Kt)) {
            goto Lg;
        }
        mo_saml_create_logout_request($Kt, $jO, $y1, $PP, $Jn);
        unset($_SESSION["\x6d\157\137\163\141\x6d\x6c"]);
        Lg:
        r_:
        EB:
        return $Jn;
    }
    function createLogoutResponseAndRedirect($y1, $PP)
    {
        $Rj = get_option("\x6d\157\137\163\141\155\x6c\x5f\x73\160\137\x62\141\x73\145\137\165\162\154");
        if (!empty($Rj)) {
            goto GR;
        }
        $Rj = home_url();
        GR:
        $Ay = $_SESSION["\x6d\x6f\137\x73\x61\155\x6c\137\154\157\147\157\165\164\x5f\x72\145\161\165\x65\x73\164"];
        $Ld = $_SESSION["\x6d\157\x5f\163\x61\155\154\x5f\154\x6f\147\x6f\x75\164\x5f\162\145\x6c\141\171\137\x73\164\x61\x74\145"];
        unset($_SESSION["\x6d\x6f\137\x73\141\x6d\x6c\137\154\x6f\x67\x6f\x75\x74\x5f\x72\x65\161\x75\x65\163\164"]);
        unset($_SESSION["\155\157\x5f\x73\141\155\x6c\137\x6c\157\147\157\165\164\x5f\x72\145\154\141\171\137\x73\x74\141\164\x65"]);
        $qW = new DOMDocument();
        $qW->loadXML($Ay);
        $Ay = $qW->firstChild;
        if (!($Ay->localName == "\x4c\x6f\x67\157\165\164\122\145\161\165\145\x73\164")) {
            goto wZ;
        }
        $wb = new SAML2SPLogoutRequest($Ay);
        $Yt = get_option("\155\x6f\x5f\163\141\155\x6c\137\x73\160\x5f\x65\156\164\x69\164\x79\x5f\x69\x64");
        if (!empty($Yt)) {
            goto FI;
        }
        $Yt = $Rj . "\x2f\167\x70\55\x63\157\156\164\x65\x6e\x74\x2f\160\x6c\165\x67\151\156\163\x2f\x6d\x69\x6e\x69\157\162\x61\x6e\x67\145\x2d\x73\x61\x6d\154\55\62\60\x2d\163\x69\x6e\x67\154\x65\55\x73\x69\x67\156\55\157\x6e\x2f";
        FI:
        $C2 = $y1;
        $B1 = SAMLSPUtilities::createLogoutResponse($wb->getId(), $Yt, $C2, $PP);
        if (empty($PP) || $PP == "\x48\164\164\x70\x52\145\144\x69\x72\x65\x63\164") {
            goto YQ;
        }
        if (!(get_option("\x73\141\155\154\137\162\x65\161\x75\145\163\164\x5f\x73\x69\x67\x6e\x65\144") != "\x63\150\x65\143\x6b\x65\x64")) {
            goto rq;
        }
        $hM = base64_encode($B1);
        SAMLSPUtilities::postSAMLResponse($y1, $hM, $Ld);
        die;
        rq:
        $UJ = '';
        $D8 = '';
        $hM = SAMLSPUtilities::signXML($B1, "\x53\164\141\x74\x75\x73");
        SAMLSPUtilities::postSAMLResponse($y1, $hM, $Ld);
        goto xS;
        YQ:
        $wa = $y1;
        if (strpos($y1, "\77") !== false) {
            goto cS;
        }
        $wa .= "\x3f";
        goto pV;
        cS:
        $wa .= "\46";
        pV:
        if (!(get_option("\163\x61\155\x6c\x5f\x72\145\161\x75\145\x73\x74\x5f\x73\151\x67\156\x65\144") != "\143\150\145\x63\x6b\145\144")) {
            goto N0;
        }
        $wa .= "\123\x41\115\x4c\x52\x65\x73\160\157\156\x73\145\x3d" . $B1 . "\46\x52\145\154\141\x79\x53\x74\141\164\x65\75" . urlencode($Ld);
        header("\114\x6f\x63\141\164\151\x6f\156\x3a\x20" . $wa);
        die;
        N0:
        $uz = "\x53\101\115\x4c\122\x65\x73\160\x6f\x6e\163\145\x3d" . $B1 . "\x26\122\x65\x6c\141\x79\x53\x74\141\x74\145\75" . urlencode($Ld) . "\x26\x53\x69\147\x41\154\x67\75" . urlencode(XMLSecurityKey::RSA_SHA256);
        $gs = array("\164\x79\x70\x65" => "\x70\x72\151\166\x61\164\145");
        $ES = new XMLSecurityKey(XMLSecurityKey::RSA_SHA256, $gs);
        $Zc = get_option("\x6d\x6f\x5f\x73\x61\x6d\154\x5f\143\x75\162\162\x65\x6e\164\137\x63\145\162\164\137\160\162\151\x76\141\164\145\137\153\145\x79");
        $ES->loadKey($Zc, FALSE);
        $Eg = new XMLSecurityDSig();
        $Ts = $ES->signData($uz);
        $Ts = base64_encode($Ts);
        $wa .= $uz . "\46\123\x69\147\x6e\x61\x74\x75\x72\x65\x3d" . urlencode($Ts);
        header("\x4c\x6f\143\x61\x74\151\x6f\156\72\40" . $wa);
        die;
        xS:
        wZ:
    }
}
function mo_saml_create_logout_request($Kt, $jO, $y1, $PP, $Jn)
{
    $Rj = get_option("\155\157\137\163\x61\x6d\x6c\137\163\160\x5f\142\141\x73\145\x5f\165\162\154");
    if (!empty($Rj)) {
        goto S4;
    }
    $Rj = home_url();
    S4:
    $Yt = get_option("\x6d\x6f\137\163\x61\x6d\x6c\x5f\x73\x70\x5f\x65\156\164\151\x74\171\x5f\x69\x64");
    if (!empty($Yt)) {
        goto AZ;
    }
    $Yt = $Rj . "\57\167\x70\55\x63\157\x6e\164\x65\156\x74\57\x70\154\x75\147\151\156\163\x2f\155\x69\156\x69\x6f\162\x61\156\147\145\x2d\163\141\x6d\x6c\55\x32\60\x2d\163\x69\x6e\147\154\145\55\163\x69\x67\156\55\157\156\57";
    AZ:
    $C2 = $y1;
    $Qj = $Jn;
    $Qj = mo_saml_get_relay_state($Qj);
    $uz = SAMLSPUtilities::createLogoutRequest($Kt, $jO, $Yt, $C2, $PP);
    if (empty($PP) || $PP == "\x48\x74\x74\x70\122\145\144\x69\x72\x65\x63\164") {
        goto mZ;
    }
    if (!(get_option("\x73\x61\155\154\137\x72\x65\x71\165\145\163\164\137\163\x69\147\156\145\144") != "\x63\x68\x65\143\153\145\144")) {
        goto Mh;
    }
    $hM = base64_encode($uz);
    SAMLSPUtilities::postSAMLRequest($y1, $hM, $Qj);
    die;
    Mh:
    $UJ = '';
    $D8 = '';
    $hM = SAMLSPUtilities::signXML($uz, "\116\141\155\145\111\104");
    SAMLSPUtilities::postSAMLRequest($y1, $hM, $Qj);
    goto LV;
    mZ:
    $wa = $y1;
    if (strpos($y1, "\x3f") !== false) {
        goto Rd;
    }
    $wa .= "\77";
    goto Ds;
    Rd:
    $wa .= "\x26";
    Ds:
    if (!(get_option("\x73\141\x6d\x6c\137\x72\x65\x71\165\x65\163\164\x5f\x73\151\x67\x6e\145\x64") != "\x63\x68\x65\143\153\145\x64")) {
        goto qV;
    }
    $wa .= "\x53\x41\115\114\x52\145\x71\165\145\163\x74\x3d" . $uz . "\x26\x52\x65\x6c\x61\171\x53\x74\x61\x74\145\x3d" . urlencode($Qj);
    header("\x4c\x6f\143\141\x74\151\157\156\72\40" . $wa);
    die;
    qV:
    $uz = "\123\101\115\114\x52\145\x71\165\x65\x73\164\75" . $uz . "\46\122\145\154\x61\171\123\x74\141\164\x65\75" . urlencode($Qj) . "\46\x53\x69\x67\101\154\x67\75" . urlencode(XMLSecurityKey::RSA_SHA256);
    $gs = array("\x74\x79\x70\145" => "\160\x72\151\x76\141\164\145");
    $ES = new XMLSecurityKey(XMLSecurityKey::RSA_SHA256, $gs);
    $Zc = get_option("\x6d\157\x5f\163\141\x6d\x6c\x5f\143\165\x72\x72\145\x6e\x74\137\x63\x65\x72\164\x5f\x70\162\151\x76\x61\164\145\137\x6b\145\x79");
    $ES->loadKey($Zc, FALSE);
    $Eg = new XMLSecurityDSig();
    $Ts = $ES->signData($uz);
    $Ts = base64_encode($Ts);
    $wa .= $uz . "\46\123\151\147\x6e\141\164\165\162\x65\75" . urlencode($Ts);
    header("\x4c\157\x63\141\164\151\157\156\72\x20" . $wa);
    die;
    LV:
}
function mo_login_validate()
{
    if (!(isset($_REQUEST["\x6f\160\x74\151\x6f\x6e"]) && $_REQUEST["\157\x70\x74\x69\x6f\156"] == "\x6d\157\x73\x61\x6d\154\x5f\x6d\145\x74\x61\144\141\164\141")) {
        goto iH;
    }
    miniorange_generate_metadata();
    iH:
    if (!(isset($_REQUEST["\157\x70\x74\151\x6f\156"]) && $_REQUEST["\x6f\x70\x74\151\x6f\x6e"] == "\x65\170\160\157\x72\164\x5f\x63\157\156\x66\151\x67\x75\x72\x61\x74\x69\x6f\x6e")) {
        goto XW;
    }
    if (!current_user_can("\x6d\141\156\141\x67\145\137\157\160\164\151\157\156\163")) {
        goto UO;
    }
    miniorange_import_export(true);
    UO:
    die;
    XW:
    if (!mo_saml_is_customer_license_verified()) {
        goto mT;
    }
    if (!(isset($_REQUEST["\x6f\160\164\151\x6f\x6e"]) && $_REQUEST["\x6f\160\x74\151\157\156"] == "\163\141\x6d\x6c\x5f\165\163\x65\x72\x5f\x6c\x6f\147\151\156" || isset($_REQUEST["\x6f\160\164\x69\x6f\x6e"]) && $_REQUEST["\157\x70\x74\151\157\x6e"] == "\x74\145\163\164\x69\x64\x70\143\157\156\146\151\x67" || isset($_REQUEST["\157\x70\x74\x69\x6f\x6e"]) && $_REQUEST["\157\x70\x74\x69\157\156"] == "\147\x65\164\x73\x61\155\154\162\145\161\x75\x65\163\164" || isset($_REQUEST["\157\x70\x74\x69\x6f\156"]) && $_REQUEST["\x6f\x70\164\151\x6f\156"] == "\x67\x65\164\x73\141\155\154\x72\x65\x73\160\x6f\156\x73\145")) {
        goto iY;
    }
    if (!mo_saml_is_sp_configured()) {
        goto gg;
    }
    if (!(is_user_logged_in() && $_REQUEST["\x6f\160\164\151\x6f\x6e"] == "\163\x61\155\154\137\x75\x73\145\162\137\154\157\x67\x69\156")) {
        goto sy;
    }
    if (!isset($_REQUEST["\x72\145\x64\151\162\x65\x63\x74\137\x74\157"])) {
        goto aI;
    }
    $TV = htmlspecialchars($_REQUEST["\162\x65\144\x69\x72\x65\143\x74\x5f\164\x6f"]);
    header("\x4c\x6f\143\141\164\x69\x6f\156\72\40" . $TV);
    die;
    aI:
    return;
    sy:
    $Rj = get_option("\155\x6f\x5f\x73\x61\155\154\137\163\x70\137\142\x61\163\145\137\x75\162\154");
    if (!empty($Rj)) {
        goto DA;
    }
    $Rj = home_url();
    DA:
    if ($_REQUEST["\157\160\164\151\x6f\156"] == "\164\x65\163\164\151\x64\x70\x63\157\x6e\146\151\147" and array_key_exists("\156\x65\x77\143\145\x72\164", $_REQUEST)) {
        goto D6;
    }
    if ($_REQUEST["\157\160\x74\151\157\x6e"] == "\164\x65\163\x74\151\144\160\x63\157\x6e\x66\x69\x67") {
        goto on;
    }
    if ($_REQUEST["\157\x70\x74\x69\157\156"] == "\x67\145\x74\x73\141\x6d\x6c\x72\145\x71\165\145\x73\x74") {
        goto Zh;
    }
    if ($_REQUEST["\x6f\x70\164\x69\x6f\156"] == "\147\145\x74\x73\141\x6d\x6c\162\x65\x73\x70\x6f\x6e\163\145") {
        goto rk;
    }
    if (get_option("\155\x6f\137\x73\x61\x6d\x6c\137\x72\145\x6c\141\x79\x5f\163\x74\x61\x74\145") && get_option("\x6d\x6f\137\x73\141\x6d\154\137\x72\x65\154\x61\x79\137\x73\164\x61\164\145") != '') {
        goto qB;
    }
    if (isset($_REQUEST["\x72\145\144\x69\162\x65\x63\x74\137\164\x6f"])) {
        goto ss;
    }
    $Qj = wp_get_referer();
    goto a_;
    ss:
    $Qj = htmlspecialchars($_REQUEST["\162\145\144\x69\162\x65\x63\164\x5f\164\157"]);
    a_:
    goto C2;
    qB:
    $Qj = get_option("\x6d\157\x5f\163\x61\x6d\154\137\x72\145\154\141\x79\x5f\x73\x74\x61\x74\x65");
    C2:
    goto A0;
    rk:
    $Qj = "\144\x69\163\x70\154\x61\x79\x53\x41\x4d\114\x52\145\x73\x70\x6f\156\163\145";
    A0:
    goto Yd;
    Zh:
    $Qj = "\x64\151\x73\x70\154\x61\171\x53\101\x4d\114\122\x65\161\165\x65\163\x74";
    Yd:
    goto Hd;
    on:
    $Qj = "\164\x65\163\x74\126\141\154\151\x64\x61\164\145";
    Hd:
    goto Bi;
    D6:
    $Qj = "\164\x65\163\x74\116\x65\167\103\x65\162\x74\x69\x66\151\x63\x61\164\x65";
    Bi:
    if (!empty($Qj)) {
        goto Si;
    }
    $Qj = $Rj;
    Si:
    $GH = html_entity_decode(get_option("\163\141\x6d\x6c\x5f\154\157\x67\151\x6e\137\165\162\154"));
    $OS = get_option("\x73\141\x6d\154\x5f\x6c\157\x67\151\x6e\x5f\x62\151\x6e\x64\151\x6e\x67\137\164\171\x70\x65");
    $NE = get_option("\x6d\157\137\163\141\x6d\154\137\146\157\x72\x63\145\x5f\141\165\164\150\x65\156\164\x69\x63\141\164\x69\157\156");
    $Xj = $Rj . "\57";
    $Yt = get_option("\x6d\157\x5f\x73\141\x6d\154\x5f\x73\x70\x5f\x65\x6e\164\151\164\171\137\x69\x64");
    $iz = get_option("\x73\141\x6d\154\x5f\156\x61\155\145\x69\x64\137\146\157\x72\x6d\141\x74");
    if (!empty($iz)) {
        goto Pg;
    }
    $iz = "\x31\x2e\x31\72\156\x61\x6d\x65\x69\144\55\x66\x6f\x72\155\141\164\72\165\x6e\x73\160\x65\143\151\146\151\145\144";
    Pg:
    if (!empty($Yt)) {
        goto nF;
    }
    $Yt = $Rj . "\57\x77\x70\55\x63\x6f\156\x74\145\156\x74\57\160\154\x75\147\151\156\163\57\155\151\x6e\x69\x6f\162\141\x6e\147\x65\x2d\x73\141\155\x6c\x2d\x32\x30\55\163\x69\156\147\154\145\x2d\x73\x69\x67\x6e\x2d\157\156\x2f";
    nF:
    $uz = SAMLSPUtilities::createAuthnRequest($Xj, $Yt, $GH, $NE, $OS, $iz);
    if (!($Qj == "\144\151\163\160\x6c\141\171\x53\101\115\x4c\x52\x65\x71\165\x65\163\x74")) {
        goto zt;
    }
    mo_saml_show_SAML_log(SAMLSPUtilities::createAuthnRequest($Xj, $Yt, $GH, $NE, "\110\x54\124\x50\x50\x6f\163\x74", $iz), $Qj);
    zt:
    $wa = $GH;
    if (strpos($GH, "\77") !== false) {
        goto js;
    }
    $wa .= "\x3f";
    goto gl;
    js:
    $wa .= "\46";
    gl:
    cldjkasjdksalc();
    $Qj = mo_saml_get_relay_state($Qj);
    $Qj = empty($Qj) ? "\57" : $Qj;
    if (empty($OS) || $OS == "\110\164\164\160\x52\145\144\x69\162\x65\143\x74") {
        goto BM;
    }
    if (!(get_option("\x73\x61\155\154\x5f\162\x65\x71\165\x65\x73\164\x5f\x73\x69\x67\x6e\x65\x64") != "\143\150\145\143\x6b\x65\x64")) {
        goto ns;
    }
    $hM = base64_encode($uz);
    SAMLSPUtilities::postSAMLRequest($GH, $hM, $Qj);
    die;
    ns:
    $UJ = '';
    $D8 = '';
    if ($_REQUEST["\x6f\x70\164\x69\157\156"] == "\164\x65\x73\164\x69\x64\x70\x63\x6f\x6e\146\x69\x67" && array_key_exists("\156\x65\167\143\x65\x72\x74", $_REQUEST)) {
        goto bp;
    }
    $hM = SAMLSPUtilities::signXML($uz, "\116\141\x6d\x65\111\x44\x50\157\154\x69\x63\171");
    goto Rz;
    bp:
    $hM = SAMLSPUtilities::signXML($uz, "\x4e\x61\x6d\145\111\x44\120\x6f\x6c\151\x63\171", true);
    Rz:
    SAMLSPUtilities::postSAMLRequest($GH, $hM, $Qj);
    update_option("\x6d\157\x5f\x73\141\x6d\154\137\x6e\x65\x77\137\x63\145\x72\x74\x5f\x74\x65\163\x74", true);
    goto e0;
    BM:
    if (!(get_option("\x73\141\155\x6c\137\x72\x65\161\165\145\x73\x74\137\163\x69\x67\156\145\x64") != "\x63\x68\x65\x63\153\145\144")) {
        goto Nh;
    }
    $wa .= "\123\101\x4d\x4c\x52\145\161\165\145\163\x74\x3d" . $uz . "\x26\x52\x65\154\141\171\x53\x74\141\164\145\75" . urlencode($Qj);
    header("\114\157\143\141\164\151\x6f\x6e\x3a\x20" . $wa);
    die;
    Nh:
    $uz = "\x53\x41\x4d\x4c\x52\x65\x71\165\145\163\164\x3d" . $uz . "\x26\122\145\x6c\x61\x79\x53\164\x61\164\x65\75" . urlencode($Qj) . "\x26\123\x69\147\101\154\x67\x3d" . urlencode(XMLSecurityKey::RSA_SHA256);
    $gs = array("\164\x79\x70\145" => "\160\162\151\x76\x61\164\x65");
    $ES = new XMLSecurityKey(XMLSecurityKey::RSA_SHA256, $gs);
    if ($_REQUEST["\157\x70\x74\151\x6f\156"] == "\x74\145\163\164\x69\144\x70\143\x6f\x6e\x66\151\x67" && array_key_exists("\x6e\x65\x77\x63\x65\162\164", $_REQUEST)) {
        goto xo;
    }
    $Zc = get_option("\155\x6f\x5f\163\141\155\x6c\137\143\x75\162\x72\145\x6e\x74\137\143\145\x72\x74\137\x70\x72\x69\166\141\164\145\137\153\x65\171");
    goto bI;
    xo:
    $Zc = file_get_contents(plugin_dir_path(__FILE__) . "\162\x65\x73\157\x75\162\143\145\163" . DIRECTORY_SEPARATOR . "\x6d\151\x6e\151\x6f\x72\141\x6e\x67\145\137\x73\x70\137\62\x30\x32\x30\137\x70\162\x69\x76\x2e\153\145\171");
    bI:
    $ES->loadKey($Zc, FALSE);
    $Eg = new XMLSecurityDSig();
    $Ts = $ES->signData($uz);
    $Ts = base64_encode($Ts);
    $wa .= $uz . "\46\123\151\147\x6e\x61\x74\165\162\145\x3d" . urlencode($Ts);
    header("\114\x6f\143\x61\164\151\x6f\156\72\x20" . $wa);
    die;
    e0:
    gg:
    iY:
    if (!(array_key_exists("\123\x41\115\x4c\122\x65\x73\160\x6f\x6e\163\x65", $_REQUEST) && !empty($_REQUEST["\123\101\115\x4c\122\145\x73\160\157\156\163\145"]))) {
        goto Ie;
    }
    if (array_key_exists("\122\145\154\x61\x79\x53\x74\x61\x74\x65", $_POST) && !empty($_POST["\x52\145\154\141\x79\123\164\x61\164\x65"]) && $_POST["\x52\x65\x6c\141\x79\x53\x74\141\164\x65"] != "\x2f") {
        goto GP;
    }
    $pg = '';
    goto JA;
    GP:
    $pg = $_POST["\x52\145\x6c\141\x79\x53\x74\141\164\x65"];
    JA:
    $Rj = get_option("\155\157\x5f\x73\141\x6d\x6c\137\163\160\x5f\142\141\x73\145\x5f\x75\x72\154");
    if (!empty($Rj)) {
        goto aQ;
    }
    $Rj = home_url();
    aQ:
    $zv = htmlspecialchars($_REQUEST["\x53\x41\115\x4c\x52\x65\x73\x70\157\x6e\x73\145"]);
    $zv = base64_decode($zv);
    if (!($pg == "\x64\151\x73\160\154\141\171\x53\x41\115\114\122\145\163\160\157\x6e\x73\x65")) {
        goto ur;
    }
    mo_saml_show_SAML_log($zv, $pg);
    ur:
    if (!(array_key_exists("\x53\x41\115\x4c\122\145\163\x70\157\x6e\x73\x65", $_GET) && !empty($_GET["\x53\x41\x4d\114\x52\x65\x73\x70\157\156\x73\145"]))) {
        goto cF;
    }
    $zv = gzinflate($zv);
    cF:
    $qW = new DOMDocument();
    $qW->loadXML($zv);
    $f2 = $qW->firstChild;
    $R0 = $qW->documentElement;
    $yJ = new DOMXpath($qW);
    $yJ->registerNamespace("\163\x61\x6d\x6c\x70", "\x75\x72\156\72\157\x61\x73\151\x73\x3a\x6e\x61\x6d\x65\163\72\164\x63\x3a\x53\x41\115\114\x3a\62\56\60\x3a\x70\x72\157\164\x6f\143\157\154");
    $yJ->registerNamespace("\x73\141\155\154", "\x75\x72\x6e\x3a\x6f\x61\163\x69\x73\72\156\x61\155\145\163\x3a\164\143\x3a\x53\101\x4d\x4c\x3a\62\56\x30\x3a\141\x73\x73\145\x72\x74\151\x6f\x6e");
    if ($f2->localName == "\114\157\147\157\165\164\122\145\163\160\x6f\156\163\x65") {
        goto Vm;
    }
    $lt = $yJ->query("\x2f\x73\141\155\154\x70\72\122\145\x73\x70\157\x6e\x73\x65\57\x73\141\155\x6c\160\72\x53\164\x61\x74\x75\x73\57\163\x61\155\154\160\x3a\123\164\141\x74\x75\163\x43\x6f\x64\x65", $R0);
    $jq = $lt->item(0)->getAttribute("\126\141\154\165\x65");
    $K6 = $yJ->query("\x2f\x73\x61\155\x6c\160\72\122\145\163\160\x6f\x6e\x73\145\x2f\x73\141\155\x6c\160\x3a\x53\x74\141\164\x75\163\57\163\141\x6d\154\x70\72\123\x74\141\164\x75\163\x4d\145\163\x73\x61\x67\x65", $R0)->item(0);
    if (empty($K6)) {
        goto kd;
    }
    $K6 = $K6->nodeValue;
    kd:
    $tP = explode("\72", $jq);
    $lt = $tP[7];
    if (array_key_exists("\x52\145\x6c\141\171\123\x74\x61\x74\x65", $_POST) && !empty($_POST["\122\145\154\x61\x79\x53\164\141\164\x65"]) && $_POST["\122\145\x6c\x61\x79\123\164\x61\x74\145"] != "\57") {
        goto xX;
    }
    $pg = '';
    goto FS;
    xX:
    $pg = $_POST["\x52\x65\154\141\x79\x53\164\x61\x74\x65"];
    FS:
    if (!($lt != "\123\x75\143\x63\145\163\x73")) {
        goto sC;
    }
    show_status_error($lt, $pg, $K6);
    sC:
    $n2 = maybe_unserialize(get_option("\163\x61\x6d\154\x5f\170\x35\x30\x39\x5f\x63\145\162\164\x69\x66\x69\143\x61\x74\145"));
    $Xj = $Rj . "\x2f";
    update_option("\155\157\x5f\x73\141\155\x6c\137\x72\145\163\160\x6f\156\163\x65", base64_encode($zv));
    if ($pg == "\x74\145\163\164\x4e\145\x77\x43\x65\162\x74\x69\146\x69\x63\141\164\x65") {
        goto rO;
    }
    $zv = new SAML2SPResponse($f2, get_option("\155\x6f\137\x73\141\155\x6c\x5f\x63\x75\162\x72\145\x6e\164\137\x63\x65\162\164\x5f\x70\x72\x69\x76\141\164\x65\x5f\x6b\x65\x79"));
    goto qd;
    rO:
    $XL = file_get_contents(plugin_dir_path(__FILE__) . "\x72\145\x73\157\165\x72\143\145\163" . DIRECTORY_SEPARATOR . "\x6d\x69\x6e\151\x6f\x72\141\156\x67\145\137\163\160\137\x32\x30\x32\x30\x5f\x70\162\x69\x76\x2e\x6b\x65\171");
    $zv = new SAML2SPResponse($f2, $XL);
    qd:
    $np = $zv->getSignatureData();
    $jG = current($zv->getAssertions())->getSignatureData();
    if (!(empty($jG) && empty($np))) {
        goto K0;
    }
    if ($pg == "\x74\145\163\x74\126\x61\x6c\151\144\x61\x74\x65" or $pg == "\x74\x65\163\164\116\x65\x77\103\x65\162\164\151\x66\151\143\141\x74\145") {
        goto Ip;
    }
    wp_die("\x57\145\x20\143\x6f\x75\154\x64\x20\156\157\x74\40\163\151\147\x6e\40\x79\x6f\x75\x20\151\156\x2e\x20\x50\154\x65\x61\x73\x65\40\143\x6f\156\x74\141\x63\x74\40\141\144\x6d\151\x6e\x69\x73\x74\162\x61\x74\157\162", "\x45\162\x72\x6f\x72\x3a\x20\111\156\x76\141\154\x69\144\40\x53\101\115\x4c\x20\122\x65\x73\160\x6f\156\163\x65");
    goto rr;
    Ip:
    $WK = mo_options_error_constants::Error_no_certificate;
    $Wc = mo_options_error_constants::Cause_no_certificate;
    echo "\74\144\x69\x76\40\163\x74\x79\154\x65\x3d\x22\x66\157\156\164\55\x66\141\155\151\x6c\x79\x3a\x43\141\154\x69\x62\162\x69\73\160\141\144\144\151\x6e\147\72\x30\40\x33\x25\x3b\x22\76\xd\12\x9\x9\11\x9\74\x64\151\166\x20\163\164\x79\154\x65\x3d\x22\143\x6f\x6c\x6f\x72\72\x20\x23\141\x39\64\x34\x34\x32\x3b\142\141\143\153\147\x72\x6f\165\156\144\x2d\x63\x6f\x6c\x6f\162\x3a\x20\43\x66\x32\144\145\x64\x65\73\x70\141\144\144\151\156\147\72\x20\x31\65\160\x78\x3b\155\141\x72\x67\x69\156\55\142\157\164\x74\x6f\x6d\x3a\40\x32\60\160\170\73\164\145\x78\x74\x2d\x61\x6c\x69\x67\156\x3a\x63\145\156\164\145\x72\x3b\x62\157\x72\x64\145\162\x3a\x31\160\x78\40\x73\x6f\154\151\x64\x20\x23\x45\66\x42\x33\102\62\x3b\x66\157\156\x74\55\163\x69\172\145\x3a\61\x38\160\x74\x3b\42\x3e\x20\105\x52\x52\x4f\x52\74\57\x64\x69\x76\x3e\15\12\11\11\11\11\74\x64\151\166\x20\x73\164\x79\154\145\75\42\x63\x6f\154\x6f\162\72\40\x23\x61\x39\x34\x34\64\x32\73\146\x6f\x6e\x74\55\x73\151\172\x65\x3a\61\x34\x70\x74\x3b\x20\x6d\141\162\x67\x69\156\x2d\x62\157\164\x74\157\155\72\62\x30\x70\x78\73\42\76\x3c\x70\x3e\x3c\x73\164\162\x6f\x6e\147\x3e\105\162\x72\x6f\162\x20\40\x3a" . $WK . "\x20\74\57\163\164\162\157\156\x67\76\74\57\160\x3e\15\12\11\x9\11\x9\15\12\x9\11\11\x9\x3c\x70\76\74\x73\164\x72\x6f\156\x67\x3e\120\x6f\x73\x73\151\142\x6c\145\40\103\x61\x75\163\145\x3a\40" . $Wc . "\74\x2f\x73\164\x72\x6f\156\x67\x3e\74\x2f\x70\76\15\xa\11\x9\11\x9\xd\xa\x9\11\11\11\74\x2f\x64\x69\166\76\x3c\x2f\x64\151\166\76";
    mo_saml_download_logs($WK, $Wc);
    die;
    rr:
    K0:
    $SW = '';
    if (is_array($n2)) {
        goto Gw;
    }
    $bm = XMLSecurityKey::getRawThumbprint($n2);
    $bm = mo_saml_convert_to_windows_iconv($bm);
    $bm = preg_replace("\57\x5c\x73\x2b\x2f", '', $bm);
    if (empty($np)) {
        goto m3;
    }
    $SW = SAMLSPUtilities::processResponse($Xj, $bm, $np, $zv, 0, $pg);
    m3:
    if (empty($jG)) {
        goto HY;
    }
    $SW = SAMLSPUtilities::processResponse($Xj, $bm, $jG, $zv, 0, $pg);
    HY:
    goto qT;
    Gw:
    foreach ($n2 as $ES => $DE) {
        $bm = XMLSecurityKey::getRawThumbprint($DE);
        $bm = mo_saml_convert_to_windows_iconv($bm);
        $bm = preg_replace("\x2f\x5c\163\53\57", '', $bm);
        if (empty($np)) {
            goto vd;
        }
        $SW = SAMLSPUtilities::processResponse($Xj, $bm, $np, $zv, $ES, $pg);
        vd:
        if (empty($jG)) {
            goto UT;
        }
        $SW = SAMLSPUtilities::processResponse($Xj, $bm, $jG, $zv, $ES, $pg);
        UT:
        if (!$SW) {
            goto j3;
        }
        goto Kf;
        j3:
        bl:
    }
    Kf:
    qT:
    if ($np) {
        goto Ov;
    }
    if ($jG) {
        goto Cw;
    }
    goto du;
    Ov:
    $hc = $np["\x43\x65\x72\164\151\x66\151\143\141\x74\x65\163"][0];
    goto du;
    Cw:
    $hc = $jG["\x43\145\x72\164\151\146\x69\143\x61\164\145\163"][0];
    du:
    if ($SW) {
        goto Xu;
    }
    if ($pg == "\164\x65\x73\x74\x56\141\154\151\144\141\164\145" or $pg == "\164\x65\x73\164\116\x65\x77\103\x65\162\x74\151\x66\x69\143\141\164\145") {
        goto d2;
    }
    wp_die("\127\x65\40\143\157\165\x6c\144\40\156\157\x74\40\163\151\147\156\40\171\x6f\165\40\x69\x6e\x2e\40\x50\154\x65\x61\163\145\40\x63\x6f\x6e\164\141\143\x74\40\x79\157\165\x72\40\x61\x64\155\151\x6e\151\163\164\x72\141\164\157\162", "\105\x72\x72\x6f\x72\x3a\40\x49\x6e\x76\141\154\151\x64\40\123\x41\x4d\x4c\x20\122\x65\163\160\x6f\x6e\163\145");
    goto Lc;
    d2:
    $WK = mo_options_error_constants::Error_wrong_certificate;
    $Wc = mo_options_error_constants::Cause_wrong_certificate;
    $JU = "\55\x2d\x2d\x2d\55\102\105\x47\111\x4e\40\x43\105\x52\x54\111\106\x49\x43\101\x54\105\55\x2d\55\x2d\x2d\74\142\x72\x3e" . chunk_split($hc, 64) . "\x3c\142\x72\x3e\x2d\55\x2d\55\55\105\x4e\x44\40\x43\105\122\124\111\x46\111\103\x41\124\x45\x2d\x2d\x2d\55\x2d";
    echo "\x3c\144\x69\x76\x20\163\x74\171\x6c\145\75\x22\146\x6f\x6e\x74\x2d\146\141\x6d\x69\154\x79\x3a\103\141\x6c\151\x62\162\x69\x3b\160\x61\144\144\151\156\x67\x3a\60\40\x33\45\x3b\x22\76";
    echo "\x3c\x64\151\x76\40\x73\x74\x79\154\x65\75\x22\x63\157\154\x6f\x72\72\x20\43\141\x39\64\64\64\62\x3b\142\x61\x63\x6b\x67\x72\157\165\156\x64\55\x63\157\154\157\x72\x3a\x20\x23\x66\62\x64\x65\144\145\73\160\141\144\144\151\x6e\147\72\x20\61\x35\x70\170\x3b\155\x61\162\147\x69\x6e\55\x62\x6f\x74\x74\x6f\x6d\x3a\x20\62\x30\x70\x78\x3b\164\x65\x78\164\55\x61\x6c\151\x67\156\x3a\x63\x65\156\164\145\x72\73\142\x6f\x72\144\145\x72\72\x31\x70\170\40\163\x6f\x6c\151\144\x20\x23\x45\66\x42\x33\102\62\73\x66\x6f\x6e\x74\55\x73\151\172\145\72\x31\x38\x70\x74\x3b\42\x3e\40\105\x52\122\x4f\122\74\57\x64\x69\x76\x3e\xd\xa\x9\x9\x9\x3c\x64\151\166\40\x73\x74\x79\154\x65\75\x22\143\157\x6c\x6f\162\72\x20\43\x61\71\x34\64\x34\x32\x3b\x66\157\156\164\55\163\x69\x7a\x65\72\61\x34\160\x74\x3b\x20\x6d\141\x72\147\151\x6e\55\x62\157\164\164\157\155\x3a\x32\60\x70\170\x3b\x22\76\x3c\x70\76\74\x73\x74\162\157\x6e\x67\76\x45\162\x72\x6f\162\x3a\40\74\x2f\x73\x74\x72\157\156\x67\x3e\125\156\141\x62\154\145\40\x74\157\x20\x66\151\x6e\x64\x20\141\x20\143\145\x72\164\x69\146\151\143\141\164\x65\40\155\x61\x74\x63\150\151\x6e\147\40\164\150\x65\40\143\x6f\x6e\x66\x69\x67\x75\162\x65\x64\x20\146\151\x6e\x67\145\x72\160\x72\151\156\x74\56\74\x2f\x70\x3e\15\12\x9\11\x9\x3c\x70\76\x50\154\x65\x61\x73\x65\40\x63\x6f\156\164\141\143\x74\x20\171\157\165\162\40\141\x64\155\x69\156\x69\x73\164\x72\141\164\157\162\x20\x61\x6e\144\x20\x72\x65\160\157\x72\x74\x20\x74\150\145\x20\146\x6f\x6c\x6c\x6f\x77\x69\x6e\x67\40\145\162\x72\x6f\x72\72\x3c\57\x70\76\15\xa\x9\11\x9\74\x70\76\74\163\x74\x72\157\x6e\147\x3e\120\157\163\x73\x69\x62\154\145\40\103\x61\165\163\145\x3a\40\74\x2f\163\x74\162\x6f\156\147\x3e\x27\130\56\65\60\x39\x20\103\145\x72\164\x69\x66\x69\143\x61\x74\145\47\40\x66\x69\x65\154\x64\x20\151\156\x20\x70\x6c\165\x67\x69\156\40\144\157\x65\x73\x20\156\x6f\164\40\155\141\164\x63\x68\x20\164\x68\145\40\143\145\x72\164\151\146\x69\143\141\x74\145\40\x66\157\x75\156\144\x20\151\156\x20\123\x41\115\114\40\122\145\163\160\157\x6e\x73\145\56\x3c\x2f\x70\76\15\xa\x9\11\11\74\160\76\x3c\163\164\162\157\156\147\76\x43\x65\x72\x74\x69\x66\151\x63\141\x74\x65\40\x66\x6f\x75\156\x64\x20\x69\156\40\x53\101\x4d\x4c\x20\122\x65\x73\x70\x6f\x6e\163\145\x3a\40\x3c\x2f\163\x74\x72\157\156\x67\x3e\74\146\157\x6e\164\x20\146\141\x63\x65\75\42\x43\x6f\165\x72\x69\145\x72\x20\116\x65\167\x22\73\x66\157\x6e\x74\55\163\151\x7a\x65\72\x31\60\160\164\x3e\74\x62\x72\x3e\74\x62\x72\x3e" . $JU . "\74\x2f\x70\x3e\74\x2f\146\157\x6e\164\76\15\12\x9\x9\11\x3c\x70\76\74\163\x74\x72\x6f\156\147\x3e\x53\x6f\x6c\x75\164\x69\x6f\x6e\x3a\40\x3c\x2f\163\x74\x72\157\x6e\x67\x3e\74\x2f\160\76\15\xa\x9\x9\11\x20\74\x6f\x6c\76\xd\12\x20\40\x20\x20\x20\40\x20\40\40\40\40\40\40\x20\x20\x20\x3c\x6c\151\76\x43\x6f\160\x79\40\160\x61\x73\x74\x65\40\x74\150\145\x20\x63\145\x72\164\x69\x66\151\143\141\x74\145\40\160\162\157\166\151\x64\145\144\40\x61\x62\157\166\145\x20\151\x6e\40\x58\x35\x30\x39\x20\103\145\x72\164\x69\x66\151\x63\141\164\145\x20\165\x6e\x64\x65\x72\x20\123\145\x72\x76\151\143\145\40\x50\162\157\166\x69\144\145\x72\x20\x53\x65\x74\x75\x70\x20\x74\141\x62\56\74\x2f\x6c\x69\76\15\12\40\x20\x20\40\40\40\x20\x20\40\40\40\40\x20\x20\x20\40\74\154\x69\76\x49\146\x20\151\163\x73\x75\x65\40\160\145\x72\x73\151\x73\x74\x73\x20\144\151\163\141\x62\x6c\145\x20\74\x62\x3e\x43\x68\141\x72\x61\x63\164\145\162\40\x65\x6e\x63\157\144\x69\x6e\x67\x3c\x2f\142\76\40\165\x6e\144\145\162\40\123\x65\x72\x76\151\x63\x65\40\120\162\x6f\x76\144\145\162\40\123\145\x74\165\160\x20\164\x61\142\56\x3c\57\x6c\x69\x3e\15\12\x20\40\40\x20\40\x20\40\40\x20\40\40\x20\40\74\x2f\157\x6c\76\11\x9\15\12\x9\11\11\x3c\x2f\144\151\x76\x3e\xd\xa\11\11\11\11\x9\x3c\144\151\166\x20\163\x74\171\154\145\x3d\42\x6d\x61\x72\147\151\156\x3a\63\45\73\144\x69\x73\160\154\x61\171\x3a\x62\x6c\157\x63\x6b\73\x74\145\x78\x74\55\x61\x6c\151\147\156\x3a\x63\x65\x6e\164\145\x72\73\x22\76\15\xa\x9\11\11\11\11\x3c\x64\x69\166\40\x73\164\171\154\x65\75\x22\155\x61\162\x67\151\156\72\63\45\73\x64\151\163\160\154\x61\x79\72\x62\154\x6f\x63\153\73\164\145\x78\164\x2d\141\x6c\x69\147\x6e\x3a\143\145\x6e\x74\145\162\73\x22\x3e\74\x69\x6e\160\x75\164\40\x73\x74\171\x6c\x65\75\42\x70\x61\144\144\x69\156\x67\x3a\x31\x25\73\x77\151\144\164\x68\x3a\61\60\x30\x70\x78\x3b\142\x61\143\153\147\x72\157\165\x6e\x64\72\40\43\60\60\x39\x31\103\x44\x20\x6e\157\x6e\x65\40\162\x65\160\145\141\164\x20\x73\x63\x72\157\x6c\154\40\60\x25\x20\60\45\73\x63\165\x72\x73\157\162\72\40\160\x6f\x69\156\164\145\162\x3b\146\x6f\x6e\x74\x2d\163\151\x7a\145\x3a\x31\65\160\x78\x3b\142\x6f\x72\144\x65\x72\x2d\x77\151\144\x74\x68\x3a\x20\x31\x70\x78\73\x62\157\x72\x64\145\x72\x2d\163\x74\171\154\x65\x3a\x20\x73\x6f\154\x69\x64\73\142\157\162\144\145\x72\x2d\162\x61\x64\151\x75\x73\x3a\x20\x33\160\170\73\167\150\x69\164\145\55\x73\160\141\x63\x65\x3a\x20\156\x6f\167\x72\x61\x70\73\142\x6f\170\x2d\x73\151\172\151\x6e\x67\x3a\x20\x62\x6f\x72\x64\x65\162\55\x62\x6f\x78\x3b\142\x6f\x72\144\145\162\x2d\x63\157\x6c\157\x72\72\40\x23\x30\60\x37\x33\x41\x41\x3b\x62\x6f\x78\55\x73\150\x61\x64\x6f\x77\72\x20\60\x70\170\40\x31\160\x78\40\60\x70\x78\x20\x72\147\142\x61\x28\61\x32\x30\x2c\x20\62\x30\x30\x2c\x20\62\63\60\54\40\x30\x2e\x36\x29\40\x69\156\163\145\x74\73\x63\x6f\x6c\x6f\x72\x3a\40\x23\106\x46\x46\73\x22\164\x79\160\145\x3d\42\142\x75\164\x74\x6f\156\42\40\166\x61\154\x75\145\x3d\x22\x44\x6f\x6e\145\42\40\157\x6e\103\154\151\143\x6b\75\42\163\x65\x6c\146\56\x63\x6c\x6f\x73\x65\50\51\73\x22\76\74\57\144\x69\166\x3e";
    mo_saml_download_logs($WK, $Wc);
    die;
    Lc:
    Xu:
    $Vs = get_option("\163\x61\x6d\154\x5f\151\163\x73\x75\145\x72");
    $Yt = get_option("\x6d\157\x5f\x73\141\x6d\154\137\x73\x70\137\145\x6e\164\151\164\x79\x5f\x69\144");
    if (!empty($Yt)) {
        goto oI;
    }
    $Yt = $Rj . "\57\x77\160\x2d\x63\x6f\x6e\x74\x65\x6e\164\57\160\x6c\x75\147\x69\x6e\163\x2f\155\151\156\151\x6f\x72\141\x6e\x67\145\x2d\x73\141\155\x6c\x2d\x32\x30\55\163\151\x6e\147\x6c\145\55\x73\x69\147\x6e\55\157\156\x2f";
    oI:
    SAMLSPUtilities::validateIssuerAndAudience($zv, $Yt, $Vs, $pg);
    $zb = current(current($zv->getAssertions())->getNameId());
    $jo = current($zv->getAssertions())->getAttributes();
    $jo["\x4e\x61\155\145\111\104"] = array("\x30" => $zb);
    $jO = current($zv->getAssertions())->getSessionIndex();
    mo_saml_checkMapping($jo, $pg, $jO);
    goto bP;
    Vm:
    if (!isset($_REQUEST["\122\x65\154\x61\x79\x53\164\x61\x74\145"])) {
        goto xn;
    }
    $Ld = $_REQUEST["\x52\x65\154\141\171\123\164\x61\x74\x65"];
    xn:
    $uv = get_option("\x6d\x6f\x5f\163\141\155\x6c\x5f\x6c\x6f\147\157\x75\x74\137\162\x65\x6c\141\x79\x5f\x73\x74\x61\164\145");
    if (empty($uv)) {
        goto HO;
    }
    $Ld = $uv;
    HO:
    wp_logout();
    if (!empty($Ld)) {
        goto i7;
    }
    $Ld = home_url();
    i7:
    header("\114\157\143\141\164\151\x6f\x6e\72\x20" . $Ld);
    die;
    bP:
    Ie:
    if (!(array_key_exists("\x53\x41\x4d\x4c\x52\145\161\165\145\x73\164", $_REQUEST) && !empty($_REQUEST["\123\x41\x4d\x4c\x52\x65\161\165\145\163\164"]))) {
        goto eH;
    }
    $uz = htmlspecialchars($_REQUEST["\123\101\x4d\114\x52\145\161\x75\x65\163\x74"]);
    $pg = "\57";
    if (!array_key_exists("\122\145\x6c\x61\171\x53\x74\141\164\145", $_REQUEST)) {
        goto Q7;
    }
    $pg = $_REQUEST["\122\145\154\x61\171\123\164\141\164\x65"];
    Q7:
    $uz = base64_decode($uz);
    if (!(array_key_exists("\123\x41\x4d\x4c\x52\145\161\165\x65\x73\x74", $_GET) && !empty($_GET["\123\101\115\114\122\x65\x71\165\145\163\x74"]))) {
        goto P6;
    }
    $uz = gzinflate($uz);
    P6:
    $qW = new DOMDocument();
    $qW->loadXML($uz);
    $MA = $qW->firstChild;
    if (!($MA->localName == "\114\x6f\x67\157\x75\x74\122\145\161\165\145\163\164")) {
        goto Gk;
    }
    $wb = new SAML2SPLogoutRequest($MA);
    if (!(!session_id() || session_id() == '' || !isset($_SESSION))) {
        goto ea;
    }
    session_start();
    ea:
    $_SESSION["\155\x6f\137\x73\x61\x6d\154\137\154\x6f\x67\x6f\165\x74\x5f\162\145\x71\x75\145\x73\164"] = $uz;
    $_SESSION["\x6d\157\137\x73\x61\155\154\137\154\x6f\x67\x6f\x75\164\x5f\x72\x65\154\141\171\137\x73\164\x61\164\145"] = $pg;
    wp_redirect(htmlspecialchars_decode(wp_logout_url()));
    die;
    Gk:
    eH:
    if (!(isset($_REQUEST["\x6f\x70\x74\151\157\x6e"]) and strpos($_REQUEST["\157\160\x74\151\157\x6e"], "\162\x65\x61\x64\163\141\x6d\x6c\154\x6f\147\151\156") !== false)) {
        goto RW;
    }
    require_once dirname(__FILE__) . "\x2f\x69\156\x63\x6c\165\x64\145\163\x2f\154\x69\142\57\x65\156\143\162\x79\x70\x74\151\x6f\156\x2e\x70\x68\x70";
    if (isset($_POST["\x53\x54\x41\124\125\x53"]) && $_POST["\x53\x54\101\124\x55\x53"] == "\105\122\122\x4f\x52") {
        goto Kk;
    }
    if (!(isset($_POST["\123\124\x41\x54\125\x53"]) && $_POST["\123\124\x41\x54\x55\x53"] == "\x53\125\x43\103\x45\123\123")) {
        goto UE;
    }
    $wA = '';
    if (!(isset($_REQUEST["\x72\x65\x64\x69\162\x65\x63\x74\137\164\x6f"]) && !empty($_REQUEST["\x72\x65\x64\151\x72\x65\x63\x74\137\x74\157"]) && $_REQUEST["\x72\145\x64\151\162\x65\x63\x74\x5f\x74\x6f"] != "\57")) {
        goto e1;
    }
    $wA = htmlspecialchars($_REQUEST["\162\x65\144\x69\x72\x65\x63\164\x5f\164\157"]);
    e1:
    delete_option("\x6d\x6f\137\163\x61\155\x6c\137\162\145\x64\x69\162\145\x63\164\x5f\x65\162\x72\x6f\162\x5f\x63\x6f\144\x65");
    delete_option("\x6d\157\x5f\x73\x61\x6d\x6c\137\x72\x65\144\x69\x72\x65\x63\164\x5f\x65\162\x72\x6f\x72\137\x72\145\141\x73\x6f\156");
    try {
        $eP = get_option("\163\x61\x6d\x6c\x5f\x61\155\x5f\145\155\x61\x69\154");
        $Jw = get_option("\163\141\x6d\154\x5f\x61\x6d\137\165\x73\145\162\156\x61\155\145");
        $qc = get_option("\x73\x61\155\x6c\137\141\x6d\137\146\x69\x72\x73\x74\137\156\141\155\145");
        $yK = get_option("\x73\141\155\154\137\x61\155\x5f\x6c\x61\x73\x74\x5f\156\141\x6d\145");
        $P3 = get_option("\163\141\x6d\x6c\x5f\x61\155\137\147\x72\157\165\x70\x5f\156\x61\155\x65");
        $Gq = get_option("\163\141\x6d\154\x5f\141\155\137\144\145\x66\x61\x75\x6c\164\137\165\x73\145\162\x5f\162\157\x6c\x65");
        $iq = get_option("\x73\141\155\154\x5f\x61\x6d\x5f\144\x6f\x6e\x74\137\x61\x6c\154\157\167\x5f\x75\x6e\154\x69\163\x74\x65\144\137\165\x73\x65\x72\137\162\157\x6c\145");
        $cO = get_option("\x73\x61\x6d\154\x5f\x61\155\137\x61\143\143\157\165\x6e\164\x5f\x6d\141\x74\x63\150\145\162");
        $Se = '';
        $WW = '';
        $qc = str_replace("\x2e", "\x5f", $qc);
        $qc = str_replace("\x20", "\x5f", $qc);
        if (!(!empty($qc) && array_key_exists($qc, $_POST))) {
            goto Nf;
        }
        $qc = htmlspecialchars($_POST[$qc]);
        Nf:
        $yK = str_replace("\x2e", "\137", $yK);
        $yK = str_replace("\x20", "\137", $yK);
        if (!(!empty($yK) && array_key_exists($yK, $_POST))) {
            goto dI;
        }
        $yK = htmlspecialchars($_POST[$yK]);
        dI:
        $Jw = str_replace("\56", "\137", $Jw);
        $Jw = str_replace("\40", "\x5f", $Jw);
        if (!empty($Jw) && array_key_exists($Jw, $_POST)) {
            goto MB;
        }
        $WW = htmlspecialchars($_POST["\x4e\x61\x6d\x65\111\104"]);
        goto PL;
        MB:
        $WW = htmlspecialchars($_POST[$Jw]);
        PL:
        $Se = str_replace("\56", "\137", $eP);
        $Se = str_replace("\40", "\x5f", $eP);
        if (!empty($eP) && array_key_exists($eP, $_POST)) {
            goto Mi;
        }
        $Se = htmlspecialchars($_POST["\x4e\141\155\145\111\x44"]);
        goto mm;
        Mi:
        $Se = htmlspecialchars($_POST[$eP]);
        mm:
        $P3 = str_replace("\x2e", "\137", $P3);
        $P3 = str_replace("\x20", "\137", $P3);
        if (!(!empty($P3) && array_key_exists($P3, $_POST))) {
            goto SZ;
        }
        $P3 = htmlspecialchars($_POST[$P3]);
        SZ:
        if (!empty($cO)) {
            goto sp;
        }
        $cO = "\x65\155\141\151\154";
        sp:
        $ES = get_option("\155\x6f\137\163\x61\155\x6c\137\143\165\163\164\157\155\x65\x72\137\164\x6f\x6b\x65\x6e");
        if (!(isset($ES) || trim($ES) != '')) {
            goto Vt;
        }
        $Kx = AESEncryption::decrypt_data($Se, $ES);
        $Se = $Kx;
        Vt:
        if (!(!empty($qc) && !empty($ES))) {
            goto bn;
        }
        $if = AESEncryption::decrypt_data($qc, $ES);
        $qc = $if;
        bn:
        if (!(!empty($yK) && !empty($ES))) {
            goto Yg;
        }
        $T4 = AESEncryption::decrypt_data($yK, $ES);
        $yK = $T4;
        Yg:
        if (!(!empty($WW) && !empty($ES))) {
            goto RX;
        }
        $G5 = AESEncryption::decrypt_data($WW, $ES);
        $WW = $G5;
        RX:
        if (!(!empty($P3) && !empty($ES))) {
            goto YG;
        }
        $Lh = AESEncryption::decrypt_data($P3, $ES);
        $P3 = $Lh;
        YG:
    } catch (Exception $XE) {
        echo sprintf("\101\x6e\40\x65\162\162\x6f\162\40\157\143\x63\165\162\162\x65\144\40\x77\150\x69\154\145\40\160\x72\x6f\x63\x65\163\163\x69\x6e\x67\x20\x74\150\x65\x20\x53\101\x4d\114\40\x52\145\x73\160\x6f\156\x73\145\56");
        die;
    }
    $qL = array($P3);
    mo_saml_login_user($Se, $qc, $yK, $WW, $qL, $iq, $Gq, $wA, $cO);
    UE:
    goto RG;
    Kk:
    update_option("\x6d\157\137\163\x61\155\154\137\162\145\x64\x69\162\145\143\x74\x5f\145\162\x72\x6f\162\137\143\x6f\x64\x65", htmlspecialchars($_POST["\105\122\122\117\122\137\122\x45\101\x53\117\116"]));
    update_option("\155\x6f\137\163\141\x6d\x6c\x5f\x72\145\x64\151\x72\x65\x63\164\x5f\145\162\162\157\x72\137\x72\145\x61\163\157\156", htmlspecialchars($_POST["\105\x52\x52\x4f\122\x5f\x4d\105\123\x53\101\x47\105"]));
    RG:
    RW:
    mT:
}
function cldjkasjdksalc()
{
    $SC = plugin_dir_path(__FILE__);
    $Us = wp_upload_dir();
    $iT = home_url();
    $iT = trim($iT, "\x2f");
    if (preg_match("\x23\x5e\150\x74\164\160\x28\x73\x29\x3f\72\57\x2f\43", $iT)) {
        goto B7;
    }
    $iT = "\x68\x74\164\x70\72\x2f\x2f" . $iT;
    B7:
    $t_ = parse_url($iT);
    $Fq = preg_replace("\57\136\167\x77\167\134\x2e\x2f", '', $t_["\150\x6f\163\164"]);
    $rB = $Fq . "\x2d" . $Us["\142\141\163\145\x64\x69\x72"];
    $xM = hash_hmac("\x73\x68\x61\62\65\x36", $rB, "\64\104\110\146\x6a\147\146\152\x61\x73\156\144\x66\x73\x61\x6a\146\110\107\x4a");
    if (is_writable($SC . "\x6c\151\x63\x65\156\x73\x65")) {
        goto q3;
    }
    $HL = base64_decode("\142\x47\x4e\x6b\141\155\x74\x68\143\62\160\x6b\141\63\116\150\131\x32\167\75");
    $pB = get_option($HL);
    if (empty($pB)) {
        goto D_;
    }
    $rk = str_rot13($pB);
    D_:
    goto L5;
    q3:
    $pB = file_get_contents($SC . "\x6c\151\143\x65\156\163\145");
    if (!$pB) {
        goto jP;
    }
    $rk = base64_encode($pB);
    jP:
    L5:
    if (!empty($pB)) {
        goto rg;
    }
    $wk = base64_decode("\124\x47\x6c\x6a\132\x57\65\x7a\132\x53\102\107\x61\x57\x78\x6c\x49\x47\x31\x70\x63\x33\116\160\x62\155\x63\x67\x5a\x6e\x4a\x76\x62\x53\102\60\x61\107\125\147\x63\107\x78\61\132\62\154\x75\x4c\147\75\x3d");
    wp_die($wk);
    rg:
    if (strpos($rk, $xM) !== false) {
        goto Ea;
    }
    $UL = new Customersaml();
    $ES = get_option("\x6d\157\x5f\163\141\x6d\154\x5f\143\165\163\164\157\155\145\x72\137\x74\x6f\x6b\145\156");
    $CT = AESEncryption::decrypt_data(get_option("\x73\x6d\x6c\x5f\154\x6b"), $ES);
    $sh = $UL->mo_saml_vl($CT, false);
    if ($sh) {
        goto eO;
    }
    return;
    eO:
    $sh = json_decode($sh, true);
    if (strcasecmp($sh["\x73\x74\141\x74\165\x73"], "\123\125\103\103\105\x53\123") == 0) {
        goto LP;
    }
    $LD = base64_decode("\x53\x57\x35\x32\x59\x57\170\x70\132\103\102\x4d\x61\x57\x4e\x6c\x62\x6e\116\x6c\111\105\132\x76\x64\x57\65\153\x4c\151\x42\x51\x62\x47\x56\x68\x63\62\125\147\131\x32\x39\165\x64\x47\x46\x6a\144\103\102\65\142\63\x56\171\x49\107\106\153\142\x57\x6c\165\141\x58\x4e\x30\x63\155\106\60\x62\63\111\147\x64\x47\70\x67\x64\x58\116\154\111\110\122\x6f\x5a\x53\102\152\x62\63\112\171\132\x57\116\x30\x49\107\170\160\x59\62\126\x75\x63\62\125\165\x49\105\132\166\x63\151\x42\x74\142\x33\x4a\154\x49\x47\x52\x6c\144\107\106\160\142\110\115\x73\111\110\102\171\142\x33\132\x70\x5a\x47\125\x67\144\x47\150\x6c\111\x46\x4a\x6c\x5a\x6d\x56\x79\132\x57\65\x6a\x5a\123\x42\x4a\x52\104\x6f\147\124\125\x38\171\x4e\x44\x49\64\115\124\101\x79\115\124\x63\x77\x4e\x53\x42\x30\142\x79\x42\65\142\x33\126\171\x49\107\106\153\x62\x57\154\165\x61\130\116\x30\143\155\106\60\x62\x33\x49\x67\144\107\x38\147\131\x32\150\154\131\62\x73\147\141\x58\x51\147\144\127\x35\153\x5a\x58\111\x67\x53\107\126\x73\143\x43\x41\x6d\x49\105\x5a\102\x55\123\102\60\x59\127\x49\x67\x61\127\x34\147\x64\107\x68\x6c\x49\x48\x42\x73\144\127\x64\160\x62\151\x34\x3d");
    $LD = str_replace("\110\x65\154\160\40\46\40\x46\101\121\x20\x74\141\142\40\151\x6e", "\106\x41\121\163\x20\x73\x65\x63\164\151\157\156\x20\157\146", $LD);
    $zY = base64_decode("\x52\130\x4a\171\142\x33\111\66\x49\x45\154\x75\x64\x6d\x46\x73\141\x57\121\x67\124\x47\154\152\132\127\65\172\x5a\121\75\75");
    wp_die($LD, $zY);
    goto uP;
    LP:
    $SC = plugin_dir_path(__FILE__);
    $iT = home_url();
    $iT = trim($iT, "\57");
    if (preg_match("\43\136\150\x74\164\160\x28\163\x29\x3f\x3a\57\57\x23", $iT)) {
        goto E4;
    }
    $iT = "\150\164\x74\160\72\x2f\57" . $iT;
    E4:
    $t_ = parse_url($iT);
    $Fq = preg_replace("\x2f\x5e\167\x77\x77\x5c\56\57", '', $t_["\150\x6f\x73\164"]);
    $Us = wp_upload_dir();
    $rB = $Fq . "\55" . $Us["\142\141\163\145\x64\151\162"];
    $xM = hash_hmac("\x73\150\141\62\65\x36", $rB, "\x34\x44\x48\146\152\x67\x66\152\141\x73\x6e\x64\146\x73\141\x6a\x66\x48\x47\x4a");
    $GY = djkasjdksa();
    $aL = round(strlen($GY) / rand(2, 20));
    $GY = substr_replace($GY, $xM, $aL, 0);
    $kn = base64_decode($GY);
    if (is_writable($SC . "\x6c\x69\143\x65\x6e\163\x65")) {
        goto pj;
    }
    $GY = str_rot13($GY);
    $HL = base64_decode("\x62\107\x4e\153\x61\x6d\164\x68\x63\x32\160\x6b\141\63\116\x68\x59\x32\x77\x3d");
    update_option($HL, $GY);
    goto En;
    pj:
    file_put_contents($SC . "\154\x69\x63\x65\156\x73\145", $kn);
    En:
    return true;
    uP:
    goto nq;
    Ea:
    return true;
    nq:
}
function djkasjdksa()
{
    $WF = "\41\176\x40\x23\44\x25\136\x26\52\x28\51\x5f\53\x7c\173\175\x3c\76\77\x30\61\62\63\64\x35\x36\x37\x38\x39\141\142\x63\144\x65\146\147\x68\x69\x6a\x6b\x6c\155\x6e\x6f\160\161\162\x73\164\x75\166\167\170\171\172\x41\102\103\104\x45\106\x47\110\x49\x4a\113\114\x4d\x4e\117\x50\121\122\123\x54\125\126\x57\130\x59\x5a";
    $KQ = strlen($WF);
    $zN = '';
    $gJ = 0;
    qN:
    if (!($gJ < 10000)) {
        goto bV;
    }
    $zN .= $WF[rand(0, $KQ - 1)];
    oN:
    $gJ++;
    goto qN;
    bV:
    return $zN;
}
function mo_saml_show_SAML_log($MA, $VL)
{
    header("\x43\157\156\x74\145\156\x74\x2d\x54\x79\160\x65\72\40\x74\145\170\x74\57\150\x74\x6d\x6c");
    $R0 = new DOMDocument();
    $R0->preserveWhiteSpace = false;
    $R0->formatOutput = true;
    $R0->loadXML($MA);
    if ($VL == "\x64\x69\163\160\154\141\x79\x53\101\115\114\x52\145\161\165\145\x73\x74") {
        goto oB;
    }
    $af = "\123\101\115\x4c\40\x52\145\163\x70\x6f\156\163\x65";
    goto jX;
    oB:
    $af = "\123\101\115\114\40\x52\145\x71\x75\x65\x73\x74";
    jX:
    $bH = $R0->saveXML();
    $sw = htmlentities($bH);
    $sw = rtrim($sw);
    $aX = simplexml_load_string($bH);
    $K_ = json_encode($aX);
    $S5 = json_decode($K_);
    $SY = plugins_url("\151\x6e\143\x6c\x75\x64\x65\163\57\143\163\163\57\x73\x74\171\x6c\145\137\163\x65\164\164\151\156\x67\163\x2e\x63\163\163\77\166\x65\x72\75\64\x2e\x38\56\x34\60", __FILE__);
    echo "\74\154\151\156\153\x20\x72\x65\x6c\75\x27\163\x74\x79\x6c\x65\x73\x68\145\x65\164\47\x20\151\144\75\x27\x6d\157\x5f\163\x61\155\154\x5f\141\144\155\x69\156\x5f\x73\x65\164\164\x69\156\147\x73\x5f\x73\164\x79\154\x65\x2d\143\163\163\x27\x20\x20\x68\162\145\x66\x3d\x27" . $SY . "\x27\x20\164\x79\x70\x65\x3d\x27\x74\x65\170\x74\x2f\143\x73\163\47\x20\x6d\145\144\x69\141\x3d\x27\141\154\154\x27\40\x2f\x3e\15\12\40\40\40\40\40\x20\x20\x20\40\x20\x20\40\15\xa\x9\x9\x9\x3c\x64\151\166\40\143\154\x61\163\163\75\42\x6d\x6f\x2d\x64\151\163\x70\154\x61\171\55\154\157\147\163\42\x20\x3e\x3c\160\40\x74\171\x70\x65\x3d\x22\164\145\x78\164\42\x20\x20\40\151\x64\x3d\42\123\101\115\x4c\x5f\x74\171\160\145\42\x3e" . $af . "\74\57\160\x3e\x3c\57\x64\x69\166\76\15\12\x9\x9\11\x9\15\xa\x9\11\11\74\x64\x69\x76\40\164\171\x70\145\75\42\164\145\x78\164\42\40\x69\144\x3d\42\123\101\x4d\114\x5f\x64\x69\x73\x70\154\x61\171\x22\40\143\x6c\x61\163\163\x3d\42\x6d\x6f\x2d\x64\x69\163\x70\x6c\x61\x79\55\x62\154\157\143\153\x22\76\74\160\x72\x65\x20\143\x6c\x61\x73\163\75\47\142\162\165\163\150\x3a\40\170\155\154\73\47\76" . $sw . "\x3c\57\x70\162\x65\76\x3c\x2f\x64\x69\x76\x3e\xd\xa\11\x9\x9\x3c\x62\162\76\xd\12\x9\11\11\x3c\x64\151\166\11\x20\163\164\x79\x6c\x65\x3d\x22\x6d\141\x72\x67\x69\156\72\63\45\x3b\x64\151\x73\x70\x6c\141\x79\72\142\x6c\157\x63\153\x3b\x74\145\170\164\x2d\141\x6c\151\x67\156\x3a\143\x65\x6e\164\x65\x72\73\42\76\xd\xa\x20\40\x20\x20\x20\40\x20\40\40\40\x20\40\xd\12\11\11\11\x3c\x64\151\166\x20\163\164\171\x6c\x65\x3d\x22\x6d\x61\x72\x67\x69\156\x3a\63\x25\x3b\x64\x69\163\x70\154\x61\x79\x3a\x62\154\x6f\x63\x6b\x3b\x74\x65\170\x74\55\141\x6c\151\147\156\72\143\x65\x6e\164\x65\x72\x3b\42\x20\76\15\xa\11\xd\xa\40\40\40\x20\x20\x20\40\40\40\40\40\40\74\57\x64\x69\166\x3e\xd\xa\x9\11\11\74\x62\x75\164\x74\x6f\156\40\x69\144\x3d\42\143\x6f\160\171\42\x20\x6f\156\x63\x6c\x69\143\x6b\75\42\143\157\x70\171\104\x69\166\124\157\103\x6c\151\x70\142\x6f\141\162\x64\x28\x29\x22\40\x20\163\164\x79\x6c\x65\x3d\x22\x70\x61\144\x64\151\156\x67\72\x31\45\x3b\167\151\x64\164\x68\72\x31\x30\60\x70\170\x3b\x62\x61\143\x6b\x67\x72\157\165\156\x64\x3a\40\x23\x30\60\71\61\103\x44\x20\x6e\x6f\x6e\x65\x20\x72\145\x70\x65\x61\x74\x20\163\143\x72\x6f\x6c\154\x20\x30\45\40\60\45\73\143\x75\162\x73\157\162\72\40\160\x6f\x69\x6e\x74\145\x72\x3b\x66\x6f\156\x74\55\x73\151\x7a\x65\x3a\61\65\x70\170\73\x62\x6f\x72\144\145\162\x2d\167\151\144\164\x68\72\x20\x31\160\x78\73\142\157\x72\144\x65\162\x2d\163\x74\x79\x6c\145\72\x20\163\x6f\154\151\x64\73\x62\157\x72\144\x65\x72\55\x72\x61\144\x69\x75\x73\72\40\63\x70\x78\73\167\x68\151\164\x65\55\163\160\141\143\x65\x3a\40\x6e\x6f\x77\162\x61\160\x3b\x62\157\x78\55\x73\151\172\x69\156\147\72\40\x62\157\x72\144\145\x72\x2d\x62\x6f\170\x3b\x62\157\162\x64\x65\x72\55\x63\x6f\x6c\x6f\x72\72\x20\43\x30\x30\x37\x33\x41\x41\x3b\142\157\x78\x2d\x73\150\x61\144\x6f\x77\x3a\40\60\x70\x78\40\61\x70\170\x20\x30\x70\x78\40\162\x67\x62\141\x28\x31\x32\60\54\x20\62\60\60\x2c\x20\62\x33\x30\54\40\60\56\66\51\x20\151\156\163\x65\164\x3b\x63\x6f\x6c\x6f\x72\72\x20\x23\106\x46\106\x3b\x22\40\x3e\x43\x6f\x70\x79\x3c\57\x62\x75\164\x74\x6f\156\76\xd\xa\11\11\x9\46\x6e\142\x73\x70\x3b\15\12\x20\x20\40\x20\40\40\40\40\x20\x20\40\x20\40\x20\40\x3c\151\x6e\x70\x75\x74\x20\151\x64\75\42\x64\167\x6e\55\142\164\x6e\x22\40\163\164\171\x6c\x65\75\x22\160\141\144\x64\151\x6e\147\72\x31\45\x3b\167\151\144\x74\150\x3a\x31\60\60\x70\x78\73\x62\141\x63\153\147\x72\157\x75\x6e\144\x3a\x20\x23\x30\60\71\61\103\x44\x20\156\157\x6e\145\40\162\x65\160\x65\x61\164\x20\x73\143\x72\157\x6c\154\x20\60\x25\x20\60\x25\73\x63\x75\162\x73\x6f\162\72\x20\160\x6f\x69\156\164\x65\162\x3b\146\x6f\156\164\55\x73\151\x7a\145\72\61\x35\160\170\73\x62\x6f\162\x64\x65\162\55\167\x69\144\x74\x68\x3a\40\x31\x70\x78\73\142\157\162\x64\145\x72\55\163\164\171\154\145\x3a\x20\x73\x6f\154\x69\x64\x3b\142\x6f\x72\x64\145\x72\x2d\162\x61\144\x69\165\163\72\x20\x33\160\170\73\x77\150\151\164\x65\55\x73\x70\x61\143\x65\x3a\x20\x6e\x6f\x77\x72\141\160\x3b\x62\157\170\x2d\163\x69\x7a\151\156\147\72\x20\x62\x6f\x72\x64\x65\x72\55\142\157\170\x3b\142\157\x72\x64\x65\162\x2d\143\157\154\157\x72\x3a\x20\x23\x30\x30\67\x33\x41\101\73\x62\x6f\x78\55\x73\x68\x61\144\157\x77\72\x20\x30\160\x78\x20\61\160\170\40\60\160\x78\x20\x72\147\x62\x61\x28\x31\x32\x30\54\40\x32\x30\x30\x2c\40\62\x33\60\54\40\60\56\66\51\40\151\x6e\163\145\164\x3b\143\x6f\x6c\157\x72\72\x20\43\x46\106\x46\73\42\164\x79\x70\x65\75\x22\142\x75\x74\x74\x6f\x6e\42\x20\x76\x61\154\x75\x65\75\42\x44\x6f\167\x6e\154\157\141\x64\42\x20\xd\xa\x20\x20\40\x20\40\x20\x20\40\x20\x20\x20\40\x20\40\40\42\x3e\15\12\11\11\x9\x3c\57\144\151\x76\x3e\15\12\x9\x9\11\x3c\57\144\151\166\76\15\xa\11\11\x9\15\xa\x9\x9\15\12\x9\11\x9";
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
function mo_saml_checkMapping($jo, $pg, $jO)
{
    try {
        $eP = get_option("\163\x61\155\154\137\x61\155\x5f\x65\x6d\x61\151\x6c");
        $Jw = get_option("\x73\x61\x6d\154\x5f\x61\x6d\137\x75\x73\x65\162\156\141\x6d\145");
        $qc = get_option("\x73\x61\155\154\x5f\x61\155\x5f\x66\x69\x72\x73\164\137\156\x61\155\x65");
        $yK = get_option("\163\141\x6d\x6c\x5f\141\x6d\x5f\154\x61\x73\x74\x5f\x6e\x61\x6d\145");
        $P3 = get_option("\x73\141\155\x6c\137\x61\x6d\x5f\x67\162\157\165\x70\x5f\156\141\155\145");
        $Gq = get_option("\x73\141\155\154\x5f\x61\155\137\144\x65\x66\141\165\154\x74\x5f\165\163\x65\x72\137\x72\157\154\x65");
        $iq = get_option("\x73\x61\x6d\x6c\137\141\155\x5f\144\x6f\156\x74\137\x61\154\154\x6f\x77\137\x75\156\x6c\151\x73\164\x65\x64\137\165\163\145\x72\137\162\157\154\x65");
        $cO = get_option("\163\x61\x6d\x6c\137\x61\x6d\x5f\141\x63\143\157\x75\156\164\x5f\155\141\164\143\150\x65\x72");
        $Se = '';
        $WW = '';
        if (empty($jo)) {
            goto Uy;
        }
        if (!empty($qc) && array_key_exists($qc, $jo)) {
            goto es;
        }
        $qc = '';
        goto xM;
        es:
        $qc = $jo[$qc][0];
        xM:
        if (!empty($yK) && array_key_exists($yK, $jo)) {
            goto rD;
        }
        $yK = '';
        goto OJ;
        rD:
        $yK = $jo[$yK][0];
        OJ:
        if (!empty($Jw) && array_key_exists($Jw, $jo)) {
            goto gr;
        }
        $WW = $jo["\116\141\155\145\111\x44"][0];
        goto e4;
        gr:
        $WW = $jo[$Jw][0];
        e4:
        if (!empty($eP) && array_key_exists($eP, $jo)) {
            goto md;
        }
        $Se = $jo["\116\141\x6d\145\x49\104"][0];
        goto FL;
        md:
        $Se = $jo[$eP][0];
        FL:
        if (!empty($P3) && array_key_exists($P3, $jo)) {
            goto zd;
        }
        $P3 = array();
        goto VS;
        zd:
        $P3 = $jo[$P3];
        VS:
        if (!empty($cO)) {
            goto Qy;
        }
        $cO = "\x65\155\141\x69\154";
        Qy:
        Uy:
        if ($pg == "\164\145\163\164\x56\141\x6c\151\144\x61\164\145") {
            goto fD;
        }
        if ($pg == "\x74\145\x73\x74\116\x65\167\x43\x65\x72\x74\x69\146\x69\x63\141\x74\x65") {
            goto TF;
        }
        mo_saml_login_user($Se, $qc, $yK, $WW, $P3, $iq, $Gq, $pg, $cO, $jO, $jo["\x4e\141\x6d\145\111\x44"][0], $jo);
        goto AU;
        fD:
        update_option("\x6d\x6f\137\163\x61\x6d\x6c\x5f\x74\x65\163\x74", "\x54\x65\x73\164\40\x73\x75\x63\143\145\163\x73\146\165\154");
        mo_saml_show_test_result($qc, $yK, $Se, $P3, $jo, $pg);
        goto AU;
        TF:
        update_option("\x6d\157\137\163\141\x6d\154\137\164\x65\x73\x74\x5f\x6e\x65\167\x5f\143\145\162\x74", "\x54\x65\x73\164\x20\163\x75\143\143\x65\163\x73\x66\165\x6c");
        mo_saml_show_test_result($qc, $yK, $Se, $P3, $jo, $pg);
        AU:
    } catch (Exception $XE) {
        echo sprintf("\101\156\40\x65\162\x72\157\162\40\x6f\143\143\x75\x72\162\145\144\x20\167\x68\151\154\x65\40\160\162\x6f\143\145\163\163\x69\x6e\x67\40\x74\150\145\40\x53\101\115\114\40\122\145\163\160\x6f\x6e\163\x65\x2e");
        die;
    }
}
function mo_saml_show_test_result($qc, $yK, $Se, $P3, $jo, $pg)
{
    echo "\74\x64\x69\166\40\163\x74\171\154\145\75\x22\146\157\156\x74\55\146\141\155\x69\x6c\171\72\x43\141\154\x69\142\x72\x69\x3b\x70\141\144\x64\x69\x6e\x67\x3a\60\40\x33\45\73\x22\76";
    if (!empty($Se)) {
        goto Wh;
    }
    echo "\x3c\144\151\x76\40\163\x74\171\154\x65\75\x22\x63\157\x6c\157\162\x3a\40\x23\141\71\x34\64\64\62\73\x62\141\x63\x6b\x67\x72\157\165\x6e\x64\55\x63\157\x6c\157\162\x3a\40\x23\x66\x32\144\x65\144\x65\73\160\x61\x64\144\151\156\147\x3a\40\61\x35\160\x78\73\x6d\141\162\x67\x69\x6e\x2d\x62\x6f\x74\164\x6f\x6d\72\40\x32\x30\x70\x78\73\164\145\x78\x74\55\141\154\x69\x67\x6e\72\x63\x65\156\x74\145\x72\x3b\x62\157\x72\x64\145\162\x3a\x31\160\x78\x20\x73\157\154\x69\x64\x20\43\105\x36\x42\63\x42\62\x3b\x66\157\156\164\55\163\x69\172\x65\72\61\x38\x70\164\73\42\x3e\124\105\x53\124\x20\106\101\111\x4c\x45\x44\x3c\x2f\144\151\166\76\xd\xa\x9\11\x9\11\74\x64\151\x76\x20\x73\164\x79\x6c\x65\x3d\42\143\157\x6c\x6f\162\72\x20\43\x61\71\x34\x34\64\62\73\146\x6f\156\x74\x2d\163\x69\172\x65\72\x31\x34\x70\164\x3b\x20\x6d\x61\x72\147\x69\x6e\55\142\157\164\x74\x6f\x6d\x3a\62\x30\160\170\73\42\76\127\x41\x52\116\x49\116\107\72\40\123\x6f\155\145\x20\x41\164\164\x72\x69\142\165\164\x65\163\x20\104\x69\x64\40\x4e\x6f\x74\x20\x4d\141\x74\143\150\x2e\74\57\144\151\x76\x3e\15\xa\x9\x9\x9\x9\x3c\144\151\x76\x20\x73\164\171\x6c\145\x3d\42\x64\151\x73\160\154\x61\x79\x3a\142\154\x6f\x63\153\x3b\x74\x65\170\x74\55\141\x6c\151\147\x6e\x3a\x63\145\x6e\x74\145\x72\73\x6d\x61\162\x67\151\x6e\55\x62\157\x74\x74\157\x6d\72\x34\45\x3b\x22\76\74\151\155\147\40\163\164\171\154\x65\75\42\x77\151\x64\x74\150\x3a\x31\65\45\73\x22\x73\162\x63\x3d\x22" . plugin_dir_url(__FILE__) . "\x69\155\x61\x67\145\x73\57\167\162\157\156\147\56\x70\156\147\x22\x3e\x3c\x2f\x64\151\x76\76";
    goto QZ;
    Wh:
    update_option("\155\x6f\137\163\141\x6d\154\x5f\164\x65\163\164\x5f\143\157\x6e\x66\x69\x67\137\x61\x74\164\x72\163", $jo);
    echo "\74\144\x69\x76\x20\x73\164\171\x6c\145\x3d\x22\143\157\x6c\157\x72\72\x20\x23\63\143\67\x36\x33\x64\x3b\xd\xa\x9\11\11\11\x62\141\x63\x6b\x67\x72\x6f\165\x6e\144\x2d\143\157\x6c\157\x72\72\40\x23\144\x66\146\x30\144\x38\x3b\40\x70\141\144\x64\x69\156\x67\72\62\x25\73\x6d\141\162\147\x69\156\x2d\x62\x6f\164\x74\157\155\x3a\x32\60\x70\170\x3b\x74\145\x78\164\x2d\x61\154\151\147\x6e\x3a\x63\x65\156\164\145\x72\x3b\x20\x62\157\162\144\x65\x72\x3a\61\160\170\x20\x73\x6f\154\x69\144\40\x23\101\x45\104\102\x39\101\x3b\x20\x66\157\x6e\x74\55\163\x69\x7a\145\x3a\61\x38\x70\x74\73\x22\x3e\124\x45\123\124\40\123\125\x43\103\x45\x53\123\106\x55\x4c\74\x2f\144\x69\x76\76\15\12\11\11\x9\11\74\144\151\166\x20\163\164\x79\154\x65\75\42\144\151\x73\x70\154\141\171\x3a\142\154\157\x63\x6b\73\164\145\170\164\x2d\x61\x6c\151\147\x6e\x3a\143\145\x6e\x74\145\x72\73\x6d\141\x72\147\151\156\x2d\x62\157\x74\164\x6f\155\72\x34\45\73\42\76\74\x69\x6d\x67\40\163\164\x79\154\145\75\x22\x77\151\144\x74\150\72\61\x35\x25\73\x22\x73\x72\x63\x3d\42" . plugin_dir_url(__FILE__) . "\x69\155\x61\147\x65\x73\x2f\x67\x72\145\145\x6e\x5f\x63\x68\145\143\153\56\x70\156\147\x22\76\x3c\x2f\144\151\x76\76";
    QZ:
    $xZ = get_option("\x6d\x6f\137\163\x61\155\x6c\137\x65\156\141\142\154\145\x5f\x64\x6f\155\141\151\x6e\137\x72\145\163\164\x72\151\x63\164\x69\x6f\x6e\137\154\x6f\147\151\x6e");
    $xs = $pg == "\x74\145\x73\164\x4e\x65\167\x43\145\162\x74\151\x66\151\x63\x61\164\145" ? "\144\151\163\x70\x6c\x61\x79\x3a\x6e\157\x6e\145" : '';
    if (!$xZ) {
        goto gV;
    }
    $A_ = get_option("\x6d\x6f\137\x73\141\155\x6c\137\x61\154\x6c\157\x77\137\144\x65\156\171\x5f\165\x73\x65\x72\137\x77\151\164\150\x5f\x64\157\x6d\141\x69\156");
    if (!empty($A_) && $A_ == "\x64\x65\156\x79") {
        goto fO;
    }
    $W3 = get_option("\163\141\x6d\154\137\141\155\137\145\155\141\x69\154\x5f\x64\x6f\x6d\x61\151\x6e\x73");
    $SJ = explode("\x3b", $W3);
    $DO = explode("\x40", $Se);
    $yF = array_key_exists("\61", $DO) ? $DO[1] : '';
    if (in_array($yF, $SJ)) {
        goto lb;
    }
    echo "\74\x70\40\163\164\171\154\145\75\x22\143\157\x6c\157\x72\x3a\x72\145\144\73\x22\76\x54\150\x69\163\x20\x75\163\145\x72\x20\167\x69\x6c\154\x20\x6e\157\164\x20\x62\x65\40\141\154\154\x6f\x77\x65\x64\x20\x74\157\x20\x6c\157\147\x69\156\40\x61\163\40\x74\150\145\x20\144\157\155\x61\151\156\x20\x6f\146\40\x74\150\x65\40\x65\155\141\151\154\x20\151\163\40\x6e\157\x74\x20\151\156\143\154\x75\x64\145\144\x20\x69\156\40\x74\x68\145\x20\x61\x6c\x6c\x6f\167\145\x64\40\x6c\x69\163\164\x20\x6f\146\x20\x44\157\155\141\151\156\x20\x52\145\163\x74\162\151\x63\164\151\x6f\156\56\x3c\57\x70\76";
    lb:
    goto fG;
    fO:
    $W3 = get_option("\163\141\x6d\x6c\x5f\141\155\137\x65\155\141\151\154\x5f\x64\157\x6d\x61\151\x6e\163");
    $SJ = explode("\x3b", $W3);
    $DO = explode("\100", $Se);
    $yF = array_key_exists("\x31", $DO) ? $DO[1] : '';
    if (!in_array($yF, $SJ)) {
        goto A2;
    }
    echo "\x3c\x70\x20\x73\164\171\x6c\145\x3d\x22\143\x6f\154\157\162\x3a\x72\145\x64\x3b\x22\76\124\x68\x69\163\40\x75\x73\145\x72\x20\x77\151\x6c\154\x20\x6e\157\164\40\x62\145\x20\141\154\x6c\x6f\x77\145\144\40\164\x6f\x20\x6c\x6f\x67\x69\156\40\x61\163\40\164\150\x65\40\144\x6f\155\141\151\x6e\40\x6f\x66\40\164\x68\145\40\x65\x6d\x61\x69\154\40\x69\x73\40\151\x6e\143\x6c\165\144\145\144\40\151\x6e\x20\x74\x68\145\40\x64\x65\x6e\x69\145\144\x20\x6c\151\163\x74\x20\157\146\40\x44\x6f\155\141\151\156\40\122\145\163\x74\x72\x69\x63\164\151\x6f\156\56\x3c\57\160\x3e";
    A2:
    fG:
    gV:
    $Qc = get_option("\x73\x61\x6d\x6c\x5f\141\x6d\x5f\x75\x73\x65\162\x6e\141\155\145");
    if (!(!empty($Qc) && array_key_exists($Qc, $jo))) {
        goto o2;
    }
    $Fh = $jo[$Qc][0];
    if (!(strlen($Fh) > 60)) {
        goto DP;
    }
    echo "\x3c\x70\40\x73\164\x79\x6c\x65\x3d\x22\143\x6f\154\157\x72\72\x72\145\x64\x3b\42\x3e\x4e\117\x54\105\40\72\x20\124\150\x69\163\40\x75\x73\145\x72\40\x77\x69\154\x6c\x20\156\x6f\x74\x20\x62\145\x20\x61\142\154\145\x20\164\157\40\154\x6f\147\151\x6e\x20\x61\x73\x20\x74\x68\145\x20\165\163\x65\x72\156\141\155\x65\40\166\x61\154\x75\145\x20\151\163\x20\x6d\157\x72\x65\40\x74\150\x61\156\40\x36\60\40\x63\150\141\x72\x61\x63\164\x65\x72\163\40\154\157\156\x67\56\74\142\x72\x2f\x3e\xd\xa\x9\11\11\120\x6c\145\x61\x73\x65\40\x74\x72\x79\x20\x63\x68\141\x6e\x67\x69\x6e\x67\x20\164\x68\145\40\x6d\x61\160\160\151\156\x67\x20\157\x66\x20\x55\x73\145\x72\x6e\141\155\x65\x20\x66\x69\145\154\144\40\151\x6e\40\x3c\x61\40\x68\x72\x65\146\75\42\43\x22\x20\157\x6e\x43\154\x69\x63\x6b\75\42\x63\x6c\157\163\x65\137\141\156\144\137\x72\x65\x64\151\x72\x65\143\164\50\51\x3b\42\76\101\164\x74\x72\x69\142\165\x74\145\x2f\122\x6f\154\x65\x20\x4d\141\x70\160\151\156\147\74\x2f\141\76\40\x74\x61\x62\56\74\x2f\x70\76";
    DP:
    o2:
    echo "\74\x73\x70\141\x6e\x20\x73\164\x79\154\145\75\x22\146\157\x6e\x74\55\163\151\172\145\72\x31\64\160\x74\x3b\x22\76\74\x62\76\x48\145\154\x6c\x6f\74\x2f\x62\x3e\x2c\x20" . $Se . "\x3c\57\x73\160\x61\156\x3e\x3c\x62\162\57\x3e\74\160\40\163\164\x79\x6c\x65\x3d\x22\x66\x6f\x6e\164\55\167\x65\151\x67\x68\x74\72\x62\157\154\144\73\146\157\156\x74\x2d\163\151\x7a\x65\72\x31\64\x70\x74\73\155\141\x72\x67\x69\156\x2d\x6c\145\x66\x74\x3a\61\x25\73\x22\76\101\124\x54\x52\111\102\125\124\105\123\40\122\105\x43\105\x49\x56\x45\x44\x3a\74\x2f\160\x3e\15\12\x9\x9\11\x9\74\x74\x61\x62\x6c\145\40\163\x74\171\x6c\x65\75\x22\142\x6f\162\144\145\x72\x2d\x63\x6f\154\x6c\x61\x70\x73\145\72\143\157\x6c\x6c\141\x70\163\x65\x3b\142\x6f\x72\x64\x65\162\55\163\x70\141\143\151\156\147\x3a\60\73\40\144\x69\163\x70\x6c\x61\171\72\164\141\x62\x6c\145\73\167\151\x64\164\x68\72\x31\60\60\x25\x3b\40\146\157\x6e\x74\55\x73\x69\x7a\x65\72\61\64\x70\164\x3b\x62\141\143\153\147\162\157\165\x6e\x64\55\x63\x6f\x6c\157\162\72\x23\x45\104\105\104\x45\104\x3b\42\76\15\xa\x9\11\11\x9\x3c\164\x72\x20\x73\x74\171\x6c\x65\x3d\x22\x74\x65\170\164\55\x61\x6c\151\x67\156\x3a\143\x65\156\x74\145\x72\x3b\x22\x3e\x3c\164\144\x20\163\164\x79\154\145\75\42\146\x6f\156\x74\x2d\x77\145\x69\147\x68\164\72\142\157\154\144\x3b\142\x6f\x72\x64\x65\162\72\x32\x70\170\x20\x73\157\154\151\x64\40\x23\71\64\71\x30\x39\x30\73\160\x61\144\x64\x69\156\x67\x3a\x32\x25\73\42\76\101\124\124\x52\x49\x42\125\x54\x45\x20\116\101\x4d\x45\x3c\57\164\144\x3e\74\164\x64\40\163\x74\171\154\x65\x3d\42\146\x6f\x6e\164\55\x77\x65\x69\147\x68\164\72\x62\157\x6c\144\73\x70\x61\x64\144\151\156\x67\x3a\62\x25\73\142\x6f\162\x64\145\x72\72\62\160\x78\40\163\157\x6c\151\144\x20\43\x39\64\71\60\x39\60\x3b\x20\167\157\x72\144\x2d\167\x72\x61\160\72\x62\x72\x65\141\x6b\55\x77\x6f\162\x64\73\42\x3e\101\124\x54\x52\111\102\x55\124\105\x20\126\101\x4c\125\x45\74\x2f\164\144\x3e\74\x2f\164\162\76";
    if (!empty($jo)) {
        goto zH;
    }
    echo "\x4e\x6f\x20\x41\x74\x74\162\x69\142\165\x74\x65\163\x20\122\145\x63\x65\x69\x76\x65\x64\56";
    goto Vy;
    zH:
    foreach ($jo as $ES => $DE) {
        echo "\74\x74\x72\76\x3c\x74\x64\x20\163\164\171\154\145\75\47\146\x6f\156\164\x2d\x77\x65\x69\x67\x68\x74\72\142\157\x6c\x64\x3b\142\x6f\162\x64\x65\162\72\x32\x70\170\x20\x73\157\x6c\151\x64\40\x23\x39\64\x39\x30\71\x30\73\160\141\144\x64\151\x6e\x67\x3a\62\45\73\47\76" . $ES . "\x3c\x2f\164\x64\x3e\x3c\164\144\40\x73\x74\171\x6c\x65\x3d\47\x70\x61\144\x64\151\x6e\147\72\x32\45\x3b\x62\157\162\x64\145\162\72\62\x70\x78\40\163\x6f\154\x69\x64\x20\43\x39\64\x39\x30\71\60\x3b\40\167\157\162\x64\55\x77\x72\141\160\72\x62\x72\145\141\153\x2d\x77\x6f\x72\144\x3b\47\76" . implode("\x3c\x68\x72\57\76", $DE) . "\x3c\57\164\144\76\x3c\x2f\x74\x72\x3e";
        Af:
    }
    Lo:
    Vy:
    echo "\74\x2f\x74\x61\x62\x6c\145\x3e\x3c\x2f\x64\x69\x76\76";
    echo "\74\144\x69\x76\x20\x73\x74\x79\x6c\x65\x3d\42\155\141\162\147\x69\x6e\x3a\x33\x25\73\x64\x69\163\x70\154\x61\171\x3a\142\154\157\x63\x6b\73\164\145\170\x74\x2d\141\154\x69\147\x6e\x3a\x63\145\x6e\x74\145\x72\73\42\x3e\xd\12\11\11\x3c\x69\x6e\x70\165\164\x20\163\164\x79\x6c\145\x3d\42\x70\x61\144\x64\x69\x6e\x67\72\x31\45\73\x77\151\x64\x74\150\72\x32\x35\60\160\x78\73\x62\141\143\x6b\x67\x72\x6f\x75\x6e\144\72\x20\43\60\x30\71\61\103\x44\x20\156\157\156\145\40\x72\145\x70\145\x61\x74\40\x73\x63\162\x6f\x6c\154\40\x30\x25\40\x30\45\x3b\15\12\x9\x9\x63\x75\x72\163\x6f\162\x3a\x20\160\157\x69\156\x74\x65\162\x3b\x66\x6f\156\x74\55\x73\x69\x7a\x65\72\x31\65\160\x78\x3b\142\x6f\162\144\x65\x72\x2d\167\x69\144\164\150\72\x20\61\x70\170\73\142\157\x72\x64\145\x72\55\x73\x74\171\x6c\145\72\x20\163\x6f\154\151\x64\x3b\x62\x6f\162\144\x65\162\55\162\x61\144\x69\165\163\72\x20\x33\160\170\x3b\167\x68\x69\x74\145\55\x73\x70\x61\143\x65\x3a\xd\12\x9\x9\40\x6e\x6f\167\x72\141\160\x3b\x62\157\170\x2d\163\151\172\151\x6e\147\x3a\x20\x62\157\162\144\145\162\x2d\142\x6f\170\x3b\x62\x6f\162\144\145\x72\x2d\x63\157\x6c\x6f\162\72\40\x23\x30\x30\x37\x33\101\x41\x3b\142\157\170\55\x73\150\x61\144\x6f\x77\x3a\x20\x30\x70\170\x20\61\x70\170\40\60\x70\170\40\162\147\x62\x61\x28\61\x32\60\x2c\x20\62\x30\x30\54\40\62\x33\60\x2c\40\60\x2e\66\51\40\x69\156\x73\x65\164\x3b\143\x6f\x6c\x6f\x72\x3a\x20\x23\x46\x46\x46\x3b" . $xs . "\42\xd\12\40\x20\40\x20\40\40\40\x20\40\x20\x20\x20\x74\x79\x70\x65\75\x22\x62\165\x74\x74\x6f\x6e\x22\x20\x76\x61\154\165\x65\75\x22\103\157\x6e\146\151\x67\x75\162\x65\x20\101\164\x74\162\151\142\165\x74\x65\57\x52\x6f\154\x65\40\115\141\160\160\x69\156\147\x22\40\x6f\156\103\x6c\151\x63\153\x3d\42\x63\154\x6f\163\x65\x5f\x61\156\144\x5f\162\145\x64\x69\x72\x65\143\x74\x28\x29\x3b\42\x3e\x20\x26\156\142\163\160\73\x20\xd\12\40\x20\x20\40\x20\40\40\40\x20\x20\x20\x20\15\12\11\x9\74\x69\156\x70\x75\164\x20\x73\164\171\x6c\x65\75\42\160\x61\x64\144\x69\x6e\x67\72\x31\x25\x3b\x77\151\x64\164\x68\72\61\60\60\x70\170\x3b\x62\x61\143\x6b\x67\x72\x6f\x75\x6e\x64\72\40\43\60\x30\71\x31\103\x44\x20\156\x6f\x6e\x65\40\162\145\x70\x65\x61\x74\40\163\x63\162\157\154\x6c\40\x30\45\x20\x30\x25\x3b\x63\x75\x72\163\x6f\x72\x3a\40\160\157\x69\156\164\145\x72\x3b\146\157\156\164\x2d\x73\x69\172\145\x3a\x31\65\160\170\x3b\x62\157\162\x64\145\162\x2d\167\151\x64\x74\x68\72\x20\x31\x70\x78\73\x62\157\162\x64\x65\162\55\x73\x74\171\154\145\72\40\163\157\x6c\151\x64\73\x62\157\162\x64\x65\x72\x2d\x72\x61\144\x69\165\163\72\40\x33\x70\x78\x3b\167\x68\151\x74\x65\x2d\x73\160\x61\143\145\72\x20\x6e\157\x77\162\x61\160\73\142\x6f\x78\55\163\151\x7a\x69\x6e\x67\x3a\40\x62\x6f\162\x64\x65\x72\55\142\x6f\x78\73\x62\157\x72\144\x65\x72\x2d\143\x6f\154\x6f\x72\72\40\43\x30\60\67\x33\101\101\73\142\157\170\x2d\x73\x68\141\144\x6f\167\x3a\40\x30\x70\170\x20\61\x70\170\40\x30\160\170\40\162\147\142\141\x28\x31\x32\x30\54\40\x32\60\60\54\40\62\x33\x30\54\40\x30\56\66\51\40\151\x6e\x73\x65\x74\x3b\143\x6f\154\x6f\162\x3a\x20\x23\x46\x46\x46\73\x22\164\171\x70\145\x3d\x22\x62\x75\164\x74\x6f\x6e\42\x20\x76\x61\154\165\145\75\42\x44\157\156\x65\x22\40\157\x6e\x43\154\x69\143\x6b\75\42\163\145\154\146\56\143\154\x6f\163\x65\x28\51\73\42\x3e\x3c\x2f\x64\x69\x76\x3e\xd\xa\11\11\15\xa\11\x9\74\x73\143\x72\151\x70\164\x3e\15\xa\x20\x20\x20\40\40\40\40\x20\x20\x20\x20\x20\40\146\x75\x6e\143\x74\x69\x6f\x6e\40\x63\154\157\x73\145\x5f\141\x6e\x64\x5f\162\145\x64\x69\162\x65\x63\164\50\x29\x7b\15\xa\x20\x20\x20\x20\40\x20\40\x20\x20\x20\x20\40\40\x20\40\40\x20\x77\x69\156\x64\x6f\x77\56\157\160\145\x6e\x65\x72\56\162\x65\x64\x69\162\x65\143\164\x5f\164\x6f\x5f\x61\164\164\x72\151\142\165\164\x65\x5f\155\141\x70\160\x69\x6e\147\x28\51\73\xd\12\x20\40\40\x20\x20\x20\40\x20\40\x20\40\40\40\40\40\x20\40\x73\145\154\146\x2e\143\x6c\157\163\145\x28\51\x3b\xd\xa\40\40\40\40\x20\x20\x20\x20\40\40\40\40\40\x7d\x20\40\40\15\12\x20\x20\x20\40\40\40\x20\x20\40\x20\40\40\x20\x77\151\156\x64\157\x77\56\x6f\x6e\165\156\x6c\x6f\x61\x64\40\75\x20\x72\x65\146\x72\x65\x73\x68\x50\x61\x72\145\156\164\73\15\12\40\x20\40\40\146\x75\x6e\143\164\x69\157\x6e\x20\162\x65\146\x72\x65\163\150\x50\141\162\145\156\x74\50\51\x20\173\xd\xa\40\x20\40\40\x20\40\x20\40\167\x69\156\144\x6f\167\56\157\x70\145\x6e\145\x72\56\154\x6f\143\141\x74\x69\157\156\x2e\x72\145\x6c\157\x61\144\50\x29\x3b\xd\12\x20\40\x20\x20\175\xd\12\11\11\74\57\163\143\x72\151\x70\164\76";
    die;
}
function mo_saml_convert_to_windows_iconv($bm)
{
    $Eq = get_option("\155\x6f\137\163\x61\x6d\154\137\x65\x6e\x63\157\x64\151\x6e\x67\x5f\145\x6e\x61\142\x6c\x65\144");
    if (!($Eq === '')) {
        goto Dw;
    }
    return $bm;
    Dw:
    return iconv("\x55\x54\106\55\70", "\103\x50\61\x32\x35\x32\57\57\111\107\116\x4f\122\105", $bm);
}
function mo_saml_login_user($Se, $qc, $yK, $WW, $P3, $iq, $Gq, $pg, $cO, $jO = '', $Kt = '', $jo = null)
{
    do_action("\155\x6f\x5f\x61\142\x72\137\146\151\154\164\x65\162\137\x6c\157\x67\x69\156", $jo);
    check_if_user_allowed_to_login_due_to_role_restriction($P3);
    $Rj = get_option("\155\x6f\137\x73\x61\155\154\x5f\x73\x70\x5f\x62\x61\163\145\137\x75\162\x6c");
    if (!empty($Rj)) {
        goto j1;
    }
    $Rj = home_url();
    j1:
    mo_saml_restrict_users_based_on_domain($Se);
    $WW = mo_saml_sanitize_username($WW);
    if (!(strlen($WW) > 60)) {
        goto AO;
    }
    wp_die("\x57\145\40\143\157\x75\154\144\40\156\x6f\x74\x20\163\151\x67\x6e\x20\x79\157\x75\40\151\156\56\x20\x50\154\x65\x61\163\145\x20\x63\157\x6e\x74\141\x63\164\40\x79\x6f\165\162\x20\x61\x64\155\x69\156\x69\x73\x74\162\x61\164\157\162\56", "\x45\x72\x72\157\162\40\72\40\125\163\x65\x72\156\x61\x6d\x65\40\154\145\x6e\147\164\150\40\x6c\x69\155\151\x74\x20\162\x65\x61\x63\150\145\144");
    die;
    AO:
    if (username_exists($WW) || email_exists($Se)) {
        goto HZ;
    }
    $Wq = get_option("\163\x61\155\x6c\137\x61\x6d\137\x72\x6f\x6c\x65\x5f\x6d\x61\160\160\151\156\147");
    if (!@unserialize($Wq)) {
        goto UV;
    }
    $Wq = unserialize($Wq);
    UV:
    $SK = true;
    $As = get_option("\155\157\x5f\x73\x61\155\154\137\x64\157\156\164\137\x63\x72\x65\141\x74\x65\x5f\165\x73\x65\x72\x5f\151\146\x5f\162\x6f\154\145\x5f\156\157\x74\137\x6d\141\x70\x70\145\144");
    if (!(!empty($As) && strcmp($As, "\x63\x68\145\x63\x6b\x65\x64") == 0)) {
        goto Wy;
    }
    $or = is_role_mapping_configured_for_user($Wq, $P3);
    $SK = $or;
    Wy:
    if ($SK === true) {
        goto Yn;
    }
    $ru = get_option("\155\x6f\137\x73\x61\155\x6c\x5f\141\x63\x63\157\165\156\164\x5f\143\x72\145\x61\164\151\157\156\x5f\x64\151\x73\x61\x62\x6c\x65\x64\x5f\x6d\x73\147");
    if (!empty($ru)) {
        goto tH;
    }
    $ru = "\x57\x65\40\x63\157\x75\154\x64\40\156\x6f\164\40\163\x69\147\x6e\40\171\x6f\165\x20\151\x6e\x2e\x20\x50\154\x65\141\163\x65\40\143\x6f\156\164\x61\143\164\40\171\157\165\x72\40\x41\x64\155\x69\156\151\x73\164\x72\x61\x74\x6f\162\56";
    tH:
    wp_die($ru, "\x45\x72\x72\x6f\x72\72\x20\116\x6f\x74\x20\141\x20\x57\x6f\x72\x64\120\162\145\x73\x73\40\115\x65\x6d\142\x65\162");
    die;
    goto N5;
    Yn:
    $nI = wp_generate_password(10, false);
    if (!empty($WW)) {
        goto qh;
    }
    $bj = wp_create_user($Se, $nI, $Se);
    goto J9;
    qh:
    $bj = wp_create_user($WW, $nI, $Se);
    J9:
    if (!is_wp_error($bj)) {
        goto fy;
    }
    wp_die($bj->get_error_message() . "\74\x62\x72\x3e\x50\154\145\x61\163\145\40\143\x6f\x6e\164\141\143\x74\x20\x79\157\x75\x72\40\x41\144\155\x69\156\x69\x73\x74\x72\141\x74\157\x72\56\74\x62\162\x3e\74\x62\x3e\125\163\145\x72\x6e\141\x6d\x65\74\x2f\x62\76\x3a\x20" . $Se, "\x45\162\x72\x6f\x72\72\x20\x43\157\x75\x6c\x64\x6e\47\164\x20\x63\x72\x65\141\164\145\40\165\x73\145\x72");
    fy:
    $user = get_user_by("\151\144", $bj);
    $z2 = assign_roles_to_user($user, $Wq, $P3);
    if ($z2 !== true && !empty($iq) && $iq == "\x63\150\145\x63\x6b\145\x64") {
        goto Zt;
    }
    if ($z2 !== true && !empty($Gq)) {
        goto J6;
    }
    if ($z2 !== true) {
        goto Jo;
    }
    goto vN;
    Zt:
    $Ej = wp_update_user(array("\x49\104" => $bj, "\162\157\154\x65" => false));
    goto vN;
    J6:
    $Ej = wp_update_user(array("\x49\x44" => $bj, "\x72\157\x6c\145" => $Gq));
    goto vN;
    Jo:
    $Gq = get_option("\144\145\x66\141\x75\154\x74\137\162\x6f\154\145");
    $Ej = wp_update_user(array("\x49\x44" => $bj, "\x72\157\154\145" => $Gq));
    vN:
    mo_saml_map_attributes($user, $qc, $yK, $jo);
    mo_saml_set_auth_cookie($user, $jO, $Kt, true);
    do_action("\155\x6f\x5f\163\x61\155\x6c\137\x61\x74\164\x72\x69\142\165\164\x65\x73", $WW, $Se, $qc, $yK, $P3);
    N5:
    goto rZ;
    HZ:
    if (username_exists($WW)) {
        goto Cb;
    }
    if (!email_exists($Se)) {
        goto qH;
    }
    $user = get_user_by("\x65\155\141\151\x6c", $Se);
    $bj = $user->ID;
    qH:
    goto S3;
    Cb:
    $user = get_user_by("\x6c\157\x67\151\x6e", $WW);
    $bj = $user->ID;
    if (empty($Se)) {
        goto hN;
    }
    $Ej = wp_update_user(array("\111\104" => $bj, "\x75\163\x65\x72\x5f\x65\x6d\x61\x69\154" => $Se));
    hN:
    S3:
    mo_saml_map_attributes($user, $qc, $yK, $jo);
    $Wq = get_option("\x73\x61\155\154\x5f\141\155\137\162\157\x6c\x65\137\x6d\141\160\x70\x69\x6e\147");
    if (!@unserialize($Wq)) {
        goto Bs;
    }
    $Wq = unserialize($Wq);
    Bs:
    $Wv = get_option("\x73\x61\x6d\154\137\141\x6d\x5f\144\157\156\x74\x5f\x75\x70\x64\x61\x74\145\137\145\170\151\x73\164\151\156\147\x5f\x75\x73\145\x72\x5f\x72\157\154\145");
    if (!(empty($Wv) || $Wv != "\143\150\x65\143\153\145\144")) {
        goto wU;
    }
    $z2 = assign_roles_to_user($user, $Wq, $P3);
    if ($z2 !== true && !is_administrator_user($user) && !empty($iq) && $iq == "\x63\x68\x65\x63\153\x65\144") {
        goto f4;
    }
    if ($z2 !== true && !is_administrator_user($user) && !empty($Gq)) {
        goto ma;
    }
    goto eP;
    f4:
    $Ej = wp_update_user(array("\x49\x44" => $bj, "\x72\x6f\154\145" => false));
    goto eP;
    ma:
    $Ej = wp_update_user(array("\111\104" => $bj, "\x72\157\x6c\x65" => $Gq));
    eP:
    wU:
    mo_saml_set_auth_cookie($user, $jO, $Kt);
    do_action("\x6d\x6f\x5f\x73\x61\155\x6c\x5f\141\164\x74\x72\151\142\165\164\x65\x73", $WW, $Se, $qc, $yK, $P3);
    rZ:
    mo_saml_post_login_redirection($pg, $Rj);
}
function mo_saml_sanitize_username($WW)
{
    $Aw = sanitize_user($WW, true);
    $lb = apply_filters("\x70\162\145\137\x75\163\145\162\137\154\x6f\147\151\156", $Aw);
    $WW = trim($lb);
    return $WW;
}
function mo_saml_restrict_users_based_on_domain($Se)
{
    $xZ = get_option("\x6d\x6f\137\163\141\155\x6c\x5f\145\x6e\x61\x62\x6c\145\x5f\x64\157\x6d\x61\151\x6e\137\162\x65\x73\164\162\x69\143\x74\151\x6f\156\137\x6c\x6f\x67\x69\x6e");
    if (!$xZ) {
        goto hC;
    }
    $W3 = get_option("\x73\x61\x6d\154\137\141\x6d\x5f\145\x6d\x61\151\x6c\x5f\144\157\155\141\151\156\x73");
    $SJ = explode("\73", $W3);
    $DO = explode("\100", $Se);
    $yF = array_key_exists("\x31", $DO) ? $DO[1] : '';
    $A_ = get_option("\x6d\157\137\163\x61\x6d\x6c\137\x61\x6c\x6c\x6f\x77\137\x64\145\x6e\x79\x5f\165\x73\x65\162\137\x77\x69\x74\150\x5f\144\157\x6d\x61\x69\156");
    $ru = get_option("\x6d\x6f\137\163\141\x6d\x6c\137\162\145\x73\164\x72\x69\143\x74\145\x64\x5f\144\157\x6d\141\x69\x6e\137\x65\x72\162\x6f\x72\x5f\x6d\163\147");
    if (!empty($ru)) {
        goto IJ;
    }
    $ru = "\131\157\165\40\x61\162\x65\40\156\157\x74\40\141\154\154\157\x77\x65\144\40\164\157\x20\x6c\x6f\147\x69\156\x2e\x20\120\154\x65\x61\x73\x65\40\143\x6f\156\x74\141\x63\x74\x20\171\157\x75\162\x20\101\144\155\x69\156\151\x73\x74\x72\x61\164\157\x72\56";
    IJ:
    if (!empty($A_) && $A_ == "\x64\x65\x6e\x79") {
        goto eM;
    }
    if (in_array($yF, $SJ)) {
        goto BG;
    }
    wp_die($ru, "\120\145\x72\155\151\163\163\x69\x6f\x6e\40\104\145\156\151\145\x64\x20\72\40\x4e\x6f\x74\40\x61\x20\x57\150\x69\164\x65\154\151\163\x74\145\x64\40\165\163\145\x72\56");
    BG:
    goto bZ;
    eM:
    if (!in_array($yF, $SJ)) {
        goto Mw;
    }
    wp_die($ru, "\x50\145\x72\x6d\151\x73\163\151\157\x6e\40\104\145\156\x69\145\144\40\x3a\40\x42\x6c\141\143\153\x6c\x69\163\164\145\144\x20\165\163\145\x72\x2e");
    Mw:
    bZ:
    hC:
}
function mo_saml_map_attributes($user, $qc, $yK, $jo)
{
    mo_saml_map_basic_attributes($user, $qc, $yK, $jo);
    mo_saml_map_custom_attributes($user, $jo);
}
function mo_saml_map_basic_attributes($user, $qc, $yK, $jo)
{
    $bj = $user->ID;
    if (empty($qc)) {
        goto Xg;
    }
    $Ej = wp_update_user(array("\111\104" => $bj, "\x66\x69\x72\163\164\x5f\156\x61\155\145" => $qc));
    Xg:
    if (empty($yK)) {
        goto pD;
    }
    $Ej = wp_update_user(array("\x49\104" => $bj, "\154\x61\163\164\137\156\141\x6d\x65" => $yK));
    pD:
    if (is_null($jo)) {
        goto aJ;
    }
    update_user_meta($bj, "\155\x6f\x5f\163\x61\x6d\154\x5f\165\x73\x65\x72\137\141\164\x74\x72\151\x62\165\x74\x65\163", $jo);
    $yw = get_option("\163\141\x6d\154\137\141\x6d\137\144\151\163\160\154\x61\x79\137\x6e\141\155\x65");
    if (empty($yw)) {
        goto DD;
    }
    if (strcmp($yw, "\x55\x53\x45\122\x4e\101\115\x45") == 0) {
        goto HP;
    }
    if (strcmp($yw, "\x46\x4e\x41\115\105") == 0 && !empty($qc)) {
        goto wx;
    }
    if (strcmp($yw, "\114\116\x41\115\x45") == 0 && !empty($yK)) {
        goto Ki;
    }
    if (strcmp($yw, "\106\116\101\x4d\105\137\x4c\116\101\x4d\x45") == 0 && !empty($yK) && !empty($qc)) {
        goto UI;
    }
    if (!(strcmp($yw, "\114\116\101\115\105\x5f\106\116\101\115\x45") == 0 && !empty($yK) && !empty($qc))) {
        goto iJ;
    }
    $Ej = wp_update_user(array("\x49\x44" => $bj, "\x64\151\x73\160\154\141\171\137\x6e\141\x6d\145" => $yK . "\x20" . $qc));
    iJ:
    goto Kc;
    UI:
    $Ej = wp_update_user(array("\111\x44" => $bj, "\x64\x69\x73\x70\154\141\x79\137\156\x61\155\145" => $qc . "\x20" . $yK));
    Kc:
    goto Ac;
    Ki:
    $Ej = wp_update_user(array("\111\x44" => $bj, "\144\x69\x73\160\154\x61\x79\x5f\156\x61\155\145" => $yK));
    Ac:
    goto wB;
    wx:
    $Ej = wp_update_user(array("\111\x44" => $bj, "\144\x69\x73\x70\x6c\141\171\137\156\141\155\145" => $qc));
    wB:
    goto WF;
    HP:
    $Ej = wp_update_user(array("\111\104" => $bj, "\x64\151\163\160\154\x61\171\137\x6e\x61\155\145" => $user->user_login));
    WF:
    DD:
    aJ:
}
function mo_saml_map_custom_attributes($user, $jo)
{
    $bj = $user->ID;
    if (!get_option("\155\x6f\137\163\x61\155\x6c\x5f\x63\x75\x73\164\157\155\137\141\x74\x74\x72\163\x5f\155\x61\x70\160\x69\156\147")) {
        goto Ca;
    }
    $dy = get_option("\155\157\x5f\x73\141\155\154\x5f\x63\x75\163\164\x6f\x6d\137\141\x74\164\162\x73\137\155\141\x70\160\151\156\x67");
    if (!@unserialize($dy)) {
        goto Hx;
    }
    $dy = unserialize($dy);
    Hx:
    foreach ($dy as $ES => $DE) {
        if (!array_key_exists($DE, $jo)) {
            goto BD;
        }
        $bP = false;
        if (!(count($jo[$DE]) == 1)) {
            goto NX;
        }
        $bP = true;
        NX:
        if (!$bP) {
            goto zY;
        }
        update_user_meta($bj, $ES, $jo[$DE][0]);
        goto yB;
        zY:
        $uI = array();
        foreach ($jo[$DE] as $jl) {
            array_push($uI, $jl);
            He:
        }
        tT:
        update_user_meta($bj, $ES, $uI);
        yB:
        BD:
        dP:
    }
    RM:
    Ca:
}
function mo_saml_set_auth_cookie($user, $jO, $Kt, $wh = false)
{
    $bj = $user->ID;
    wp_set_current_user($bj);
    $WG = false;
    $WG = apply_filters("\155\x6f\137\162\x65\155\x65\x6d\x62\145\x72\137\155\145", $WG);
    wp_set_auth_cookie($bj, $WG);
    if (!$wh) {
        goto i4;
    }
    do_action("\165\163\145\x72\137\162\145\147\151\x73\x74\145\162", $bj);
    i4:
    do_action("\x77\x70\x5f\x6c\x6f\x67\151\156", $user->user_login, $user);
    if (empty($jO)) {
        goto R1;
    }
    update_user_meta($bj, "\x6d\157\x5f\x73\x61\155\154\x5f\x73\x65\163\163\x69\x6f\156\x5f\151\x6e\144\x65\x78", $jO);
    R1:
    if (empty($Kt)) {
        goto gn;
    }
    update_user_meta($bj, "\x6d\x6f\137\163\141\x6d\x6c\137\156\141\155\145\x5f\x69\144", $Kt);
    gn:
    if (!(!session_id() || session_id() == '' || !isset($_SESSION))) {
        goto tt;
    }
    session_start();
    tt:
    $_SESSION["\155\x6f\137\x73\x61\155\154"]["\154\157\147\x67\x65\x64\x5f\151\x6e\x5f\x77\x69\x74\x68\x5f\151\x64\x70"] = TRUE;
}
function mo_saml_post_login_redirection($pg, $Rj)
{
    $I5 = get_option("\x6d\157\137\x73\x61\155\x6c\137\x72\145\x6c\x61\171\x5f\163\164\141\x74\x65");
    if (!empty($I5)) {
        goto ZG;
    }
    if (!empty($pg)) {
        goto PT;
    }
    wp_redirect($Rj);
    goto Zf;
    PT:
    if (filter_var($pg, FILTER_VALIDATE_URL) === FALSE) {
        goto GB;
    }
    if (strpos($pg, home_url()) !== false) {
        goto nj;
    }
    wp_redirect($Rj);
    goto fC;
    nj:
    wp_redirect($pg);
    fC:
    goto ET;
    GB:
    wp_redirect($pg);
    ET:
    Zf:
    goto ru;
    ZG:
    wp_redirect($I5);
    ru:
    die;
}
function check_if_user_allowed_to_login_due_to_role_restriction($P3)
{
    $nQ = get_option("\x73\x61\x6d\x6c\x5f\x61\155\x5f\144\x6f\x6e\164\x5f\141\154\154\x6f\x77\x5f\x75\x73\x65\162\x5f\164\157\x6c\157\x67\151\x6e\137\x63\x72\x65\141\x74\145\x5f\167\x69\x74\x68\137\147\151\166\x65\x6e\x5f\x67\162\x6f\x75\160\x73");
    if (!($nQ == "\143\150\x65\x63\153\145\x64")) {
        goto Pe;
    }
    if (empty($P3)) {
        goto OX;
    }
    $R3 = get_option("\155\157\137\x73\141\x6d\154\x5f\162\145\163\164\162\x69\143\164\137\165\x73\145\x72\163\x5f\x77\x69\164\150\137\x67\162\x6f\165\x70\x73");
    $YH = explode("\73", $R3);
    foreach ($YH as $si) {
        foreach ($P3 as $HN) {
            $HN = trim($HN);
            if (!(!empty($HN) && $HN == $si)) {
                goto eY;
            }
            wp_die("\x59\157\165\x20\141\x72\145\x20\156\157\164\x20\x61\165\x74\150\x6f\162\151\172\145\x64\x20\x74\157\40\x6c\157\x67\151\156\56\x20\x50\154\x65\141\163\x65\40\x63\157\156\x74\x61\143\164\40\171\x6f\x75\162\x20\141\x64\155\151\x6e\x69\x73\164\162\x61\x74\x6f\162\56", "\x45\162\162\x6f\x72");
            eY:
            Li:
        }
        WC:
        Ab:
    }
    v1:
    OX:
    Pe:
}
function assign_roles_to_user($user, $Wq, $P3)
{
    $z2 = false;
    if (!(!empty($P3) && !empty($Wq) && !is_administrator_user($user))) {
        goto fm;
    }
    $user->set_role(false);
    $em = '';
    $jx = false;
    foreach ($Wq as $rx => $w3) {
        $YH = explode("\73", $w3);
        foreach ($YH as $si) {
            foreach ($P3 as $HN) {
                $HN = trim($HN);
                if (!(!empty($HN) && $HN == $si)) {
                    goto RT;
                }
                $z2 = true;
                $user->add_role($rx);
                RT:
                ka:
            }
            mP:
            QA:
        }
        RR:
        fN1:
    }
    tK:
    fm:
    return $z2;
}
function is_role_mapping_configured_for_user($Wq, $P3)
{
    if (!(!empty($P3) && !empty($Wq))) {
        goto RV;
    }
    foreach ($Wq as $rx => $w3) {
        $YH = explode("\x3b", $w3);
        foreach ($YH as $si) {
            foreach ($P3 as $HN) {
                $HN = trim($HN);
                if (!(!empty($HN) && $HN == $si)) {
                    goto AB;
                }
                return true;
                AB:
                sx:
            }
            Ev:
            eU:
        }
        Fp:
        AY:
    }
    pm:
    RV:
    return false;
}
function is_administrator_user($user)
{
    $P7 = $user->roles;
    if (!is_null($P7) && in_array("\141\144\x6d\x69\156\151\163\164\x72\141\x74\x6f\162", $P7, TRUE)) {
        goto Ul;
    }
    return false;
    goto Vx;
    Ul:
    return true;
    Vx:
}
function mo_saml_is_customer_registered()
{
    $Ly = get_option("\155\x6f\x5f\163\141\155\154\x5f\x61\144\x6d\x69\156\x5f\145\x6d\x61\151\x6c");
    $QF = get_option("\x6d\x6f\x5f\163\x61\155\x6c\137\141\x64\155\x69\x6e\x5f\143\x75\163\164\x6f\x6d\x65\162\x5f\x6b\145\x79");
    if (!$Ly || !$QF || !is_numeric(trim($QF))) {
        goto LJ;
    }
    return 1;
    goto wc;
    LJ:
    return 0;
    wc:
}
function mo_saml_is_customer_license_verified()
{
    $ES = get_option("\155\x6f\137\163\x61\x6d\154\x5f\143\165\163\164\157\155\145\x72\x5f\164\157\x6b\145\x6e");
    $yX = AESEncryption::decrypt_data(get_option("\164\x5f\163\151\x74\x65\137\x73\x74\141\164\x75\x73"), $ES);
    $Tu = get_option("\163\x6d\x6c\x5f\x6c\153");
    $Ly = get_option("\155\157\137\163\x61\155\154\x5f\x61\x64\x6d\x69\x6e\137\x65\x6d\x61\151\x6c");
    $QF = get_option("\155\x6f\x5f\x73\141\155\154\x5f\141\x64\x6d\x69\x6e\137\x63\165\x73\x74\157\x6d\145\162\x5f\x6b\145\x79");
    if (!$yX && !$Tu || !$Ly || !$QF || !is_numeric(trim($QF))) {
        goto mG;
    }
    return 1;
    goto Tc;
    mG:
    return 0;
    Tc:
}
function saml_get_current_page_url()
{
    $RZ = $_SERVER["\110\x54\x54\120\x5f\110\x4f\x53\x54"];
    if (!(substr($RZ, -1) == "\x2f")) {
        goto gF;
    }
    $RZ = substr($RZ, 0, -1);
    gF:
    $qu = $_SERVER["\122\105\x51\125\105\123\x54\x5f\x55\122\x49"];
    if (!(substr($qu, 0, 1) == "\x2f")) {
        goto iq;
    }
    $qu = substr($qu, 1);
    iq:
    $ky = isset($_SERVER["\110\124\x54\120\x53"]) && strcasecmp($_SERVER["\110\x54\124\120\x53"], "\157\156") == 0;
    $Ld = "\x68\164\164\160" . ($ky ? "\163" : '') . "\x3a\57\57" . $RZ . "\x2f" . $qu;
    return $Ld;
}
function show_status_error($W_, $pg, $CH)
{
    $W_ = strip_tags($W_);
    $CH = strip_tags($CH);
    if ($pg == "\x74\x65\163\x74\x56\141\154\x69\x64\x61\x74\x65" or $pg == "\164\x65\x73\x74\116\145\x77\103\x65\162\x74\151\146\x69\143\141\x74\x65") {
        goto kt;
    }
    wp_die("\127\145\x20\143\157\165\154\144\x20\156\157\164\x20\163\x69\147\x6e\40\x79\x6f\165\x20\151\x6e\56\x20\120\154\145\x61\x73\x65\40\x63\x6f\x6e\x74\x61\143\164\x20\171\157\165\x72\x20\101\144\x6d\x69\156\151\x73\x74\x72\x61\x74\x6f\162\56", "\105\x72\x72\157\162\72\40\111\156\166\141\x6c\x69\x64\x20\123\x41\115\114\40\122\x65\163\x70\157\156\163\x65\x20\123\164\x61\164\165\163");
    goto fs;
    kt:
    echo "\x3c\x64\151\166\x20\x73\164\171\154\x65\75\x22\x66\157\156\164\x2d\146\x61\x6d\151\x6c\171\72\103\x61\154\151\142\162\151\73\x70\141\144\x64\151\156\x67\72\60\x20\63\45\73\x22\x3e";
    echo "\74\x64\151\x76\x20\x73\x74\171\154\145\x3d\x22\143\x6f\x6c\x6f\x72\x3a\40\x23\x61\71\64\x34\64\x32\x3b\x62\x61\x63\153\x67\x72\157\165\156\x64\x2d\143\157\x6c\x6f\x72\x3a\x20\x23\146\62\144\145\144\145\73\160\141\144\144\x69\156\147\72\40\61\x35\x70\170\x3b\x6d\x61\162\147\151\156\55\x62\157\164\164\x6f\x6d\72\40\62\x30\160\170\73\x74\x65\170\x74\x2d\x61\x6c\151\x67\156\72\x63\145\x6e\x74\x65\x72\x3b\142\x6f\162\x64\145\162\x3a\x31\x70\170\x20\x73\157\x6c\151\x64\40\x23\105\x36\102\63\102\62\73\x66\x6f\156\164\x2d\x73\x69\172\x65\x3a\x31\70\160\164\x3b\42\x3e\x20\105\122\x52\x4f\122\74\57\x64\151\x76\76\xd\12\40\40\x20\x20\40\x20\40\40\40\x20\40\40\40\x20\x20\x20\x3c\x64\x69\x76\x20\x73\x74\x79\x6c\145\x3d\42\143\x6f\154\157\162\72\40\43\x61\x39\64\64\64\x32\73\146\x6f\x6e\164\x2d\x73\x69\x7a\x65\72\61\64\x70\x74\x3b\40\x6d\x61\162\x67\151\x6e\55\x62\x6f\x74\164\157\x6d\x3a\62\x30\x70\170\73\x22\76\74\160\76\x3c\x73\x74\x72\x6f\x6e\x67\x3e\x45\x72\162\157\x72\72\x20\74\57\163\164\x72\157\156\x67\76\x20\111\x6e\166\x61\154\151\144\x20\x53\101\x4d\x4c\x20\122\145\x73\x70\157\156\x73\145\40\x53\x74\x61\164\x75\163\x2e\x3c\x2f\x70\x3e\15\xa\x20\x20\x20\x20\x20\40\x20\40\40\x20\x20\40\40\40\40\x20\x3c\160\76\x3c\x73\x74\162\157\x6e\x67\76\x43\141\x75\x73\x65\163\74\57\163\x74\x72\x6f\156\x67\x3e\x3a\40\111\144\145\x6e\164\151\x74\x79\x20\120\162\157\x76\151\x64\145\162\40\150\x61\163\x20\163\x65\156\x74\x20\47" . $W_ . "\47\40\163\x74\x61\x74\x75\x73\40\143\157\x64\145\x20\x69\x6e\40\123\101\x4d\114\x20\122\145\163\160\157\x6e\x73\145\56\40\74\57\160\76\xd\xa\x9\x9\x9\x9\x9\11\11\x9\x3c\x70\x3e\74\163\164\162\x6f\x6e\147\76\x52\145\x61\x73\x6f\156\x3c\x2f\163\x74\162\157\x6e\147\x3e\x3a\x20" . get_status_message($W_) . "\74\57\160\76\x20";
    if (empty($CH)) {
        goto Eh;
    }
    echo "\74\x70\x3e\x3c\x73\x74\x72\157\x6e\x67\76\123\x74\141\164\x75\163\x20\x4d\x65\163\x73\141\x67\x65\40\x69\x6e\40\164\x68\x65\40\x53\x41\115\x4c\40\122\x65\163\160\x6f\x6e\x73\x65\x3a\x3c\57\x73\x74\162\157\x6e\147\x3e\x20\x3c\x62\x72\57\76" . $CH . "\74\57\160\x3e";
    Eh:
    echo "\74\x62\x72\76\15\xa\x20\40\x20\x20\x20\40\x20\x20\x20\x20\x20\40\40\40\x20\x20\74\x2f\144\151\166\76\xd\xa\xd\xa\x20\x20\x20\x20\40\x20\40\40\40\x20\x20\40\40\40\x20\x20\x3c\x64\x69\x76\x20\x73\x74\x79\154\x65\75\42\x6d\x61\x72\x67\151\x6e\72\63\45\x3b\144\x69\x73\160\x6c\x61\171\x3a\142\154\x6f\143\x6b\x3b\164\x65\170\164\x2d\x61\154\x69\x67\x6e\72\143\145\x6e\164\145\162\73\x22\x3e\15\xa\x20\40\x20\x20\x20\x20\x20\40\x20\40\40\x20\x20\x20\x20\40\74\x64\x69\x76\40\x73\x74\x79\x6c\x65\x3d\x22\x6d\x61\162\x67\151\x6e\72\63\45\x3b\x64\151\x73\x70\x6c\141\171\x3a\142\154\157\x63\x6b\x3b\164\x65\x78\164\x2d\141\154\151\x67\x6e\x3a\x63\145\x6e\x74\x65\x72\73\42\76\74\151\156\160\165\x74\x20\163\x74\x79\x6c\145\75\42\x70\x61\144\144\x69\x6e\x67\x3a\61\45\x3b\167\151\144\x74\x68\72\61\60\60\160\170\x3b\142\141\x63\153\x67\x72\157\x75\x6e\144\x3a\40\43\x30\60\x39\61\x43\x44\40\156\x6f\156\x65\x20\x72\145\x70\145\141\164\x20\x73\143\162\157\154\154\40\60\x25\40\60\45\73\143\x75\162\163\x6f\x72\x3a\40\160\157\x69\x6e\x74\x65\162\73\x66\157\156\164\55\163\x69\x7a\x65\72\61\65\x70\170\73\x62\157\162\144\145\162\55\167\x69\144\x74\150\x3a\40\61\160\x78\x3b\x62\x6f\162\x64\x65\162\x2d\x73\x74\171\x6c\x65\72\x20\163\157\154\151\x64\73\x62\x6f\x72\x64\145\x72\55\162\141\144\x69\x75\163\72\40\x33\160\170\x3b\x77\x68\x69\x74\x65\x2d\x73\160\141\x63\x65\72\40\x6e\x6f\x77\162\141\x70\73\142\157\x78\x2d\x73\151\172\151\x6e\x67\x3a\40\142\x6f\162\144\145\162\x2d\x62\157\x78\73\x62\x6f\x72\x64\145\x72\x2d\143\x6f\x6c\157\162\72\40\43\60\x30\x37\x33\x41\101\x3b\142\x6f\170\55\x73\x68\141\x64\x6f\x77\72\x20\60\x70\x78\40\61\x70\170\x20\60\x70\170\40\162\x67\142\x61\50\61\62\x30\54\x20\62\60\x30\54\x20\62\x33\x30\54\40\x30\56\66\x29\40\151\x6e\x73\145\164\73\143\x6f\x6c\157\x72\x3a\40\x23\106\x46\106\x3b\x22\x74\171\160\x65\75\x22\x62\165\x74\164\157\x6e\42\x20\166\141\x6c\x75\145\75\x22\x44\157\156\145\42\40\157\x6e\103\x6c\x69\143\x6b\75\x22\163\x65\x6c\x66\56\143\154\157\163\145\50\x29\x3b\42\x3e\74\x2f\144\x69\166\x3e";
    die;
    fs:
}
function addLink($s9, $e1)
{
    $IU = "\74\x61\x20\150\162\145\x66\x3d\x22" . $e1 . "\42\76" . $s9 . "\x3c\57\x61\x3e";
    return $IU;
}
function get_status_message($W_)
{
    switch ($W_) {
        case "\122\145\161\165\x65\163\x74\145\162":
            return "\124\x68\145\x20\162\x65\161\165\x65\x73\164\x20\x63\x6f\x75\154\144\x20\x6e\157\164\x20\x62\x65\40\160\145\162\146\157\x72\155\145\x64\x20\144\x75\145\40\x74\157\x20\141\x6e\40\145\162\x72\157\x72\x20\157\x6e\40\x74\x68\x65\x20\x70\x61\x72\164\40\x6f\x66\40\164\x68\x65\x20\162\x65\x71\x75\145\x73\x74\x65\162\56";
            goto UR;
        case "\122\145\163\160\157\156\x64\x65\162":
            return "\124\150\x65\x20\x72\x65\161\165\145\163\164\40\x63\x6f\165\x6c\x64\40\x6e\x6f\164\40\x62\x65\40\160\145\x72\x66\x6f\x72\x6d\145\x64\x20\144\165\145\40\x74\x6f\x20\141\x6e\40\145\162\x72\x6f\162\40\x6f\x6e\40\164\150\145\x20\x70\141\162\x74\40\x6f\146\x20\164\x68\145\40\x53\101\x4d\114\40\162\145\x73\160\x6f\156\144\x65\x72\x20\157\x72\40\123\101\115\x4c\x20\x61\165\x74\x68\x6f\x72\x69\164\171\x2e";
            goto UR;
        case "\x56\x65\x72\163\151\157\x6e\x4d\x69\163\x6d\141\x74\143\x68":
            return "\x54\x68\x65\x20\x53\101\115\x4c\x20\162\x65\x73\x70\x6f\156\x64\145\162\40\143\157\x75\154\x64\x20\x6e\157\x74\x20\160\162\x6f\x63\145\163\163\x20\164\150\145\40\x72\x65\x71\165\145\x73\164\40\x62\145\143\x61\x75\x73\x65\x20\164\150\x65\40\166\x65\x72\x73\151\157\x6e\40\x6f\x66\x20\164\150\145\x20\x72\145\161\165\145\163\164\x20\155\x65\x73\x73\x61\147\145\40\x77\141\x73\x20\x69\156\143\x6f\x72\162\145\x63\164\56";
            goto UR;
        default:
            return "\125\156\153\156\157\167\x6e";
    }
    YJ:
    UR:
}
function mo_saml_register_widget()
{
    register_widget("\155\x6f\137\154\157\147\x69\156\x5f\167\151\144");
}
function mo_saml_get_relay_state($Ld)
{
    $Rz = parse_url($Ld, PHP_URL_PATH);
    if (!parse_url($Ld, PHP_URL_QUERY)) {
        goto nl;
    }
    $RF = parse_url($Ld, PHP_URL_QUERY);
    $Rz = $Rz . "\x3f" . $RF;
    nl:
    if (!parse_url($Ld, PHP_URL_FRAGMENT)) {
        goto yE;
    }
    $BH = parse_url($Ld, PHP_URL_FRAGMENT);
    $Rz = $Rz . "\x23" . $BH;
    yE:
    return $Rz;
}
add_action("\167\151\x64\147\x65\x74\163\137\x69\156\151\x74", "\x6d\157\x5f\163\141\155\x6c\x5f\162\x65\147\151\163\x74\x65\162\137\167\x69\x64\x67\145\x74");
add_action("\151\156\151\164", "\x6d\x6f\x5f\x6c\x6f\147\151\156\137\x76\x61\x6c\151\x64\141\x74\x65");
?>

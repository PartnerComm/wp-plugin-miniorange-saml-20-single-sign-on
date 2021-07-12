<?php


include_once dirname(__FILE__) . "\57\x55\x74\x69\x6c\151\x74\151\145\163\x2e\x70\x68\160";
include_once dirname(__FILE__) . "\x2f\x52\145\x73\x70\x6f\x6e\163\145\56\160\x68\x70";
include_once dirname(__FILE__) . "\57\114\157\x67\x6f\165\x74\122\x65\x71\x75\145\163\x74\56\160\150\x70";
include_once "\170\x6d\154\x73\x65\x63\154\151\142\163\x2e\160\x68\160";
use RobRichards\XMLSecLibs\XMLSecurityKey;
use RobRichards\XMLSecLibs\XMLSecurityDSig;
use RobRichards\XMLSecLibs\XMLSecEnc;
if (class_exists("\101\105\x53\x45\156\143\x72\x79\160\164\151\157\x6e")) {
    goto XA;
}
require_once dirname(__FILE__) . "\x2f\151\x6e\x63\154\x75\144\x65\163\57\x6c\151\142\57\x65\x6e\x63\x72\x79\160\x74\x69\x6f\156\56\x70\150\x70";
XA:
class mo_login_wid extends WP_Widget
{
    public function __construct()
    {
        $vp = LicenseHelper::getCurrentOption(mo_options_enum_service_provider::Identity_name);
        parent::__construct("\x53\141\155\x6c\x5f\114\157\x67\151\156\137\x57\151\144\147\145\164", "\114\x6f\147\151\x6e\40\x77\151\164\x68\40" . $vp, array("\144\145\163\143\162\x69\x70\x74\x69\157\156" => __("\x54\x68\x69\x73\x20\x69\163\x20\x61\x20\x6d\151\156\151\x4f\x72\x61\x6e\x67\145\x20\123\101\115\114\x20\x6c\x6f\x67\151\x6e\x20\x77\151\x64\147\145\164\56", "\x6d\157\x73\141\155\154")));
    }
    public function widget($CN, $NI)
    {
        extract($CN);
        $Fn = apply_filters("\167\x69\x64\147\145\164\137\164\x69\x74\x6c\x65", $NI["\x77\x69\144\137\x74\151\164\154\145"]);
        echo $CN["\142\x65\x66\157\162\145\x5f\167\x69\144\147\145\164"];
        if (empty($Fn)) {
            goto Rn;
        }
        echo $CN["\x62\145\x66\x6f\x72\x65\137\164\151\x74\154\145"] . $Fn . $CN["\x61\146\x74\145\x72\x5f\x74\151\164\x6c\145"];
        Rn:
        $this->loginForm();
        echo $CN["\x61\x66\164\x65\x72\137\167\x69\144\147\x65\x74"];
    }
    public function update($SP, $WN)
    {
        $NI = array();
        $NI["\x77\x69\144\x5f\x74\151\x74\x6c\x65"] = strip_tags($SP["\167\x69\144\137\164\151\164\154\x65"]);
        return $NI;
    }
    public function form($NI)
    {
        $Fn = '';
        if (!array_key_exists("\167\x69\x64\x5f\164\x69\x74\154\x65", $NI)) {
            goto NK;
        }
        $Fn = $NI["\x77\151\144\137\164\151\x74\154\x65"];
        NK:
        echo "\xd\12\x9\11\x3c\x70\76\x3c\154\141\x62\145\154\40\x66\x6f\x72\75\42" . $this->get_field_id("\167\x69\144\x5f\x74\x69\164\154\x65") . "\x20\42\x3e" . _e("\124\x69\164\154\x65\x3a") . "\40\x3c\x2f\x6c\x61\x62\145\x6c\76\15\xa\x9\11\x3c\x69\156\x70\x75\164\x20\143\154\x61\x73\x73\x3d\42\x77\151\144\x65\x66\x61\x74\42\x20\x69\x64\75\42" . $this->get_field_id("\x77\151\x64\137\164\x69\164\154\x65") . "\x22\x20\156\141\155\145\75\x22" . $this->get_field_name("\167\151\x64\x5f\x74\x69\x74\x6c\145") . "\42\40\x74\x79\160\x65\x3d\42\164\x65\x78\164\42\x20\166\x61\154\165\x65\x3d\42" . $Fn . "\x22\40\57\76\xd\12\x9\11\x3c\x2f\x70\76";
    }
    public function loginForm()
    {
        global $post;
        if (!is_user_logged_in()) {
            goto Xr;
        }
        $current_user = wp_get_current_user();
        $fI = "\x48\x65\x6c\154\157\x2c";
        if (!get_option("\x6d\x6f\x5f\x73\x61\155\154\x5f\143\x75\x73\164\157\155\x5f\147\x72\x65\x65\x74\151\x6e\x67\137\164\145\x78\x74")) {
            goto tH;
        }
        $fI = get_option("\155\157\x5f\163\x61\155\154\x5f\143\165\163\164\157\x6d\137\x67\x72\x65\x65\164\x69\x6e\147\137\164\x65\x78\164");
        tH:
        $gE = '';
        if (!get_option("\155\157\x5f\x73\141\x6d\x6c\x5f\x67\162\x65\145\164\151\x6e\x67\x5f\x6e\x61\155\145")) {
            goto h1;
        }
        switch (get_option("\155\157\137\163\x61\x6d\x6c\x5f\147\162\x65\x65\x74\151\x6e\147\x5f\156\x61\155\145")) {
            case "\x55\x53\105\122\x4e\101\x4d\x45":
                $gE = $current_user->user_login;
                goto Ax;
            case "\x45\x4d\x41\111\114":
                $gE = $current_user->user_email;
                goto Ax;
            case "\106\116\101\x4d\105":
                $gE = $current_user->user_firstname;
                goto Ax;
            case "\114\x4e\x41\x4d\x45":
                $gE = $current_user->user_lastname;
                goto Ax;
            case "\106\x4e\x41\x4d\105\137\x4c\x4e\x41\x4d\105":
                $gE = $current_user->user_firstname . "\40" . $current_user->user_lastname;
                goto Ax;
            case "\x4c\x4e\x41\115\x45\137\106\x4e\101\x4d\105":
                $gE = $current_user->user_lastname . "\40" . $current_user->user_firstname;
                goto Ax;
            default:
                $gE = $current_user->user_login;
        }
        dc:
        Ax:
        h1:
        $gE = trim($gE);
        if (!empty($gE)) {
            goto mx;
        }
        $gE = $current_user->user_login;
        mx:
        $ZT = $fI . "\40" . $gE;
        $JL = "\x4c\x6f\x67\x6f\x75\x74";
        if (!get_option("\155\x6f\x5f\163\x61\155\x6c\x5f\143\165\x73\164\157\155\137\154\157\x67\x6f\x75\x74\137\164\x65\x78\x74")) {
            goto WP;
        }
        $JL = get_option("\155\x6f\x5f\x73\x61\x6d\x6c\137\143\x75\163\164\157\155\137\154\x6f\147\x6f\165\x74\x5f\x74\145\170\164");
        WP:
        echo $ZT . "\40\174\40\74\x61\40\150\162\x65\x66\75\42" . wp_logout_url(home_url()) . "\42\x20\x74\151\164\x6c\145\75\42\154\x6f\147\157\x75\164\x22\x20\x3e" . $JL . "\74\x2f\x61\76\x3c\x2f\154\151\x3e";
        goto SH;
        Xr:
        $k1 = saml_get_current_page_url();
        echo "\15\12\11\x9\74\163\x63\162\x69\x70\164\x3e\xd\12\11\11\146\165\156\x63\164\151\x6f\x6e\40\163\x75\142\155\x69\164\123\x61\x6d\154\x46\x6f\x72\155\x28\51\x7b\40\144\x6f\x63\x75\x6d\x65\156\x74\x2e\x67\145\164\x45\154\145\x6d\145\156\164\102\x79\x49\144\50\42\x6d\x69\x6e\x69\157\x72\x61\156\x67\x65\x2d\x73\141\155\x6c\x2d\163\160\x2d\163\163\x6f\x2d\x6c\x6f\x67\x69\x6e\55\146\157\162\x6d\x22\x29\56\x73\x75\142\155\151\164\50\51\x3b\40\175\xd\12\11\11\x3c\57\163\143\162\x69\160\164\x3e\15\12\x9\x9\x3c\x66\x6f\x72\155\40\156\141\x6d\x65\x3d\x22\155\x69\156\151\x6f\162\x61\x6e\147\x65\55\163\141\155\x6c\x2d\163\x70\55\x73\163\x6f\55\x6c\157\147\x69\x6e\55\146\x6f\x72\155\x22\x20\151\x64\75\42\155\x69\156\151\x6f\x72\141\x6e\147\145\x2d\x73\141\155\x6c\x2d\x73\x70\55\x73\163\157\55\x6c\157\x67\151\x6e\55\x66\x6f\x72\x6d\42\x20\x6d\145\164\x68\x6f\x64\x3d\42\x70\x6f\x73\x74\42\x20\141\143\164\x69\157\x6e\x3d\42\x22\x3e\xd\xa\x9\11\74\x69\x6e\160\x75\x74\x20\x74\171\x70\x65\75\42\150\x69\x64\x64\145\x6e\x22\40\156\x61\x6d\x65\x3d\x22\157\x70\x74\x69\157\x6e\42\40\x76\x61\154\165\145\75\42\163\141\155\154\x5f\165\x73\145\x72\137\154\157\x67\x69\156\42\40\57\76\xd\xa\11\x9\x3c\151\156\x70\x75\164\40\x74\171\160\145\x3d\42\150\151\x64\144\x65\156\42\40\x6e\141\155\145\75\42\162\145\144\151\x72\145\x63\164\x5f\164\x6f\x22\x20\166\141\154\x75\x65\75\x22" . $k1 . "\42\40\x2f\76\15\xa\15\12\x9\11\x3c\146\x6f\156\x74\x20\x73\x69\172\145\75\42\x2b\x31\42\x20\163\164\x79\154\145\75\42\166\145\162\x74\151\x63\141\154\x2d\141\x6c\151\x67\156\72\x74\157\160\x3b\x22\76\40\74\57\146\157\156\164\x3e";
        $x8 = LicenseHelper::getCurrentOption(mo_options_enum_service_provider::Identity_name);
        if (!empty($x8)) {
            goto y8;
        }
        echo "\120\154\145\x61\163\145\x20\143\x6f\156\x66\151\147\165\x72\x65\x20\x74\x68\145\40\x6d\151\156\151\117\162\141\x6e\147\145\x20\x53\x41\115\114\x20\x50\154\x75\147\151\x6e\40\146\x69\162\x73\164\x2e";
        goto JZ;
        y8:
        $kA = "\x4c\157\x67\151\156\x20\x77\x69\164\x68\x20\43\x23\111\104\x50\43\43";
        if (!get_option("\x6d\x6f\137\163\141\155\154\137\x63\165\163\x74\157\155\x5f\x6c\157\x67\151\x6e\137\x74\x65\170\x74")) {
            goto E1;
        }
        $kA = get_option("\155\157\137\x73\x61\155\154\x5f\x63\165\x73\164\x6f\x6d\137\154\x6f\x67\151\156\137\x74\145\x78\164");
        E1:
        $kA = str_replace("\x23\x23\x49\x44\120\43\43", $x8, $kA);
        $U2 = false;
        if (!get_option("\155\157\137\x73\x61\x6d\154\x5f\165\163\145\137\x62\165\164\164\157\x6e\x5f\x61\x73\137\x77\x69\144\x67\x65\164")) {
            goto H7;
        }
        if (!(get_option("\155\x6f\x5f\163\141\x6d\154\137\x75\163\x65\x5f\x62\165\x74\x74\x6f\156\x5f\141\x73\137\167\x69\144\147\x65\164") == "\x74\x72\165\x65")) {
            goto d0;
        }
        $U2 = true;
        d0:
        H7:
        if (!$U2) {
            goto Kv;
        }
        $Xk = get_option("\x6d\x6f\x5f\163\141\155\x6c\137\x62\x75\x74\x74\157\x6e\137\167\x69\x64\x74\x68") ? get_option("\x6d\157\137\x73\141\x6d\x6c\137\x62\x75\164\x74\157\156\137\x77\x69\144\x74\150") : "\x31\x30\x30";
        $Sq = get_option("\155\x6f\137\x73\141\155\x6c\x5f\x62\x75\164\x74\x6f\x6e\x5f\150\x65\151\x67\x68\164") ? get_option("\155\x6f\137\x73\141\155\x6c\137\142\165\x74\164\x6f\156\137\x68\x65\151\147\x68\x74") : "\x35\x30";
        $RG = get_option("\x6d\157\x5f\163\x61\155\x6c\x5f\x62\x75\x74\x74\x6f\x6e\x5f\163\151\172\145") ? get_option("\x6d\157\137\163\141\155\x6c\x5f\x62\x75\164\164\157\x6e\x5f\x73\151\172\145") : "\65\x30";
        $k8 = get_option("\x6d\157\x5f\x73\141\155\x6c\137\142\165\x74\164\x6f\156\x5f\143\x75\x72\x76\x65") ? get_option("\155\x6f\x5f\163\x61\x6d\x6c\x5f\142\x75\164\164\x6f\156\x5f\143\165\162\x76\145") : "\65";
        $GA = get_option("\x6d\157\x5f\163\x61\155\x6c\137\x62\x75\164\x74\x6f\x6e\137\143\x6f\154\157\x72") ? get_option("\155\x6f\x5f\x73\x61\x6d\154\x5f\142\x75\x74\164\x6f\156\137\x63\157\x6c\157\x72") : "\x30\60\70\x35\142\x61";
        $bm = get_option("\155\157\137\x73\x61\x6d\154\x5f\x62\x75\x74\164\x6f\x6e\x5f\164\150\145\155\145") ? get_option("\155\157\x5f\163\141\x6d\x6c\137\142\165\164\164\x6f\x6e\x5f\164\x68\x65\155\x65") : "\154\x6f\x6e\x67\x62\165\x74\164\x6f\156";
        $MX = LicenseHelper::getCurrentOption(mo_options_enum_service_provider::Identity_name);
        $hP = get_option("\155\157\x5f\163\141\x6d\x6c\x5f\142\165\164\x74\157\x6e\137\x74\145\170\x74") ? get_option("\x6d\157\137\x73\x61\155\154\x5f\142\x75\164\164\x6f\156\x5f\x74\145\x78\164") : ($MX ? $MX : "\x4c\x6f\x67\x69\156");
        $XY = get_option("\x6d\157\137\x73\141\155\x6c\137\146\x6f\x6e\x74\x5f\x63\x6f\154\157\162") ? get_option("\x6d\157\137\163\x61\155\x6c\x5f\146\157\156\x74\x5f\143\157\154\157\162") : "\x66\146\146\146\146\x66";
        $i5 = get_option("\155\157\137\163\141\155\154\x5f\x66\157\x6e\x74\x5f\163\x69\172\x65") ? get_option("\155\157\x5f\x73\141\155\154\137\146\x6f\x6e\164\137\x73\151\x7a\145") : "\x32\x30";
        $kA = "\74\x69\156\160\165\164\x20\x74\171\x70\x65\75\x22\142\165\164\164\157\x6e\42\x20\156\x61\155\145\x3d\42\155\x6f\137\163\141\x6d\154\137\x77\x70\x5f\x73\163\157\x5f\142\x75\x74\164\x6f\x6e\42\x20\x76\x61\x6c\x75\145\x3d\x22" . $hP . "\x22\40\x73\164\171\x6c\x65\75\x22";
        $Qa = '';
        if ($bm == "\154\x6f\156\x67\x62\165\164\164\157\156") {
            goto QN;
        }
        if ($bm == "\x63\151\162\143\154\145") {
            goto lf;
        }
        if ($bm == "\157\166\x61\154") {
            goto Ep;
        }
        if ($bm == "\163\161\x75\x61\162\x65") {
            goto AJ;
        }
        goto RS;
        lf:
        $Qa = $Qa . "\x77\151\x64\164\x68\72" . $RG . "\160\x78\73";
        $Qa = $Qa . "\x68\x65\151\147\150\164\72" . $RG . "\160\170\x3b";
        $Qa = $Qa . "\x62\157\x72\144\145\x72\x2d\162\x61\144\x69\x75\163\72\x39\71\x39\x70\170\73";
        goto RS;
        Ep:
        $Qa = $Qa . "\167\x69\x64\164\x68\72" . $RG . "\x70\x78\73";
        $Qa = $Qa . "\x68\x65\151\147\150\164\x3a" . $RG . "\160\x78\73";
        $Qa = $Qa . "\142\157\x72\x64\x65\x72\55\162\141\x64\151\165\163\72\x35\x70\170\x3b";
        goto RS;
        AJ:
        $Qa = $Qa . "\x77\x69\144\164\150\x3a" . $RG . "\160\x78\x3b";
        $Qa = $Qa . "\150\x65\x69\x67\x68\x74\x3a" . $RG . "\x70\x78\73";
        $Qa = $Qa . "\142\157\162\144\x65\162\x2d\162\x61\144\151\165\163\x3a\60\x70\x78\x3b";
        RS:
        goto JQ;
        QN:
        $Qa = $Qa . "\167\151\x64\164\150\72" . $Xk . "\x70\x78\73";
        $Qa = $Qa . "\x68\145\x69\147\150\x74\x3a" . $Sq . "\x70\170\x3b";
        $Qa = $Qa . "\142\157\x72\144\x65\162\x2d\162\141\144\151\165\x73\72" . $k8 . "\x70\170\73";
        JQ:
        $Qa = $Qa . "\142\141\143\153\147\x72\x6f\x75\156\x64\55\x63\157\x6c\157\x72\72\43" . $GA . "\x3b";
        $Qa = $Qa . "\142\157\162\144\x65\x72\55\x63\x6f\x6c\157\162\x3a\164\162\x61\x6e\x73\160\141\x72\x65\x6e\x74\x3b";
        $Qa = $Qa . "\143\x6f\154\157\x72\72\x23" . $XY . "\73";
        $Qa = $Qa . "\x66\157\156\164\x2d\x73\x69\172\x65\72" . $i5 . "\160\x78\x3b";
        $Qa = $Qa . "\x70\141\144\144\151\156\147\72\x30\x70\170\x3b";
        $kA = $kA . $Qa . "\x22\x2f\x3e";
        Kv:
        ?>
 <a href="#" onClick="submitSamlForm()"><?php 
        echo $kA;
        ?>
</a></form> <?php 
        JZ:
        if ($this->mo_saml_check_empty_or_null_val(get_option("\155\157\x5f\163\x61\155\154\x5f\x72\x65\144\151\162\145\x63\164\137\145\x72\162\157\x72\137\x63\157\x64\x65"))) {
            goto el;
        }
        echo "\x3c\144\151\x76\76\x3c\57\144\x69\166\x3e\74\144\x69\166\x20\164\x69\x74\154\x65\75\x22\114\157\147\151\156\40\x45\162\162\157\x72\x22\76\74\146\x6f\156\x74\x20\x63\157\x6c\157\162\75\42\162\x65\144\x22\x3e\127\x65\40\143\x6f\165\x6c\144\x20\x6e\157\x74\40\163\x69\x67\x6e\x20\171\x6f\165\40\x69\x6e\56\x20\x50\154\145\x61\163\145\40\143\157\156\164\x61\x63\x74\40\x79\x6f\165\x72\40\x41\144\155\x69\156\x69\x73\x74\162\141\164\x6f\x72\x2e\74\x2f\146\x6f\x6e\164\76\74\x2f\144\x69\166\76";
        delete_option("\x6d\x6f\137\x73\141\x6d\154\137\162\145\144\x69\162\x65\x63\164\137\x65\162\x72\157\x72\x5f\x63\157\144\x65");
        delete_option("\x6d\x6f\x5f\163\x61\155\154\137\x72\145\x64\151\162\x65\143\164\x5f\x65\162\162\x6f\x72\137\162\x65\141\x73\157\x6e");
        el:
        echo "\11\x3c\57\165\154\x3e\xd\12\x9\x9\x3c\x2f\x66\x6f\x72\x6d\x3e";
        SH:
    }
    public function mo_saml_check_empty_or_null_val($j1)
    {
        if (!(!isset($j1) || empty($j1))) {
            goto yH;
        }
        return true;
        yH:
        return false;
    }
    public function mo_saml_widget_init()
    {
        if (!(isset($_REQUEST["\x6f\160\164\151\x6f\156"]) and $_REQUEST["\157\160\x74\x69\x6f\x6e"] == "\163\141\x6d\x6c\x5f\x75\x73\x65\162\x5f\x6c\157\147\157\x75\x74")) {
            goto SI;
        }
        $user = is_user_logged_in() ? wp_get_current_user() : null;
        $this->mo_saml_logout('', '', $user);
        SI:
    }
    function mo_saml_logout($k1, $gg, $user)
    {
        $Wz = htmlspecialchars_decode(LicenseHelper::getCurrentOption(mo_options_enum_service_provider::Logout_URL));
        $Vw = LicenseHelper::getCurrentOption(mo_options_enum_service_provider::Logout_binding_type);
        $Zi = wp_get_referer();
        $Ca = get_option("\x6d\157\137\x73\x61\155\x6c\137\163\x70\137\142\x61\163\x65\137\165\x72\154");
        if (!empty($Zi)) {
            goto XE;
        }
        $Zi = !empty($Ca) ? $Ca : home_url();
        XE:
        if (empty($Wz)) {
            goto ky;
        }
        if (!(!session_id() || session_id() == '' || !isset($_SESSION))) {
            goto N0;
        }
        session_start();
        N0:
        if (isset($_SESSION["\155\157\137\x73\x61\x6d\x6c\137\154\x6f\x67\157\x75\164\x5f\x72\145\x71\165\x65\163\164"])) {
            goto c2;
        }
        if (isset($_SESSION["\x6d\157\137\163\x61\155\154"]["\154\157\x67\x67\x65\144\137\151\156\137\x77\151\164\x68\137\151\x64\160"])) {
            goto tE;
        }
        goto D0;
        c2:
        self::createLogoutResponseAndRedirect($Wz, $Vw);
        die;
        goto D0;
        tE:
        $current_user = $user;
        $t0 = get_user_meta($current_user->ID, "\x6d\x6f\137\163\141\x6d\x6c\x5f\x6e\141\155\x65\x5f\151\144");
        $vq = get_user_meta($current_user->ID, "\x6d\x6f\137\163\141\155\154\137\163\x65\x73\163\151\x6f\156\x5f\x69\x6e\x64\x65\170");
        if (empty($t0)) {
            goto xn;
        }
        mo_saml_create_logout_request($t0, $vq, $Wz, $Vw, $Zi);
        unset($_SESSION["\155\x6f\x5f\x73\141\x6d\x6c"]);
        xn:
        D0:
        ky:
        $Er = get_option("\155\x6f\x5f\163\141\x6d\154\x5f\154\x6f\x67\157\x75\x74\x5f\x72\x65\154\x61\x79\x5f\163\164\x61\x74\x65");
        if (empty($Er)) {
            goto yC;
        }
        wp_redirect($Er);
        die;
        yC:
        return $Zi;
    }
    function createLogoutResponseAndRedirect($Wz, $Vw)
    {
        $Ca = get_option("\x6d\157\x5f\x73\141\155\x6c\x5f\x73\160\137\x62\x61\x73\145\x5f\165\x72\154");
        if (!empty($Ca)) {
            goto Kd;
        }
        $Ca = home_url();
        Kd:
        $Ps = $_SESSION["\155\157\137\x73\141\x6d\154\137\x6c\x6f\147\x6f\x75\164\x5f\x72\145\x71\x75\145\163\x74"];
        $VK = $_SESSION["\155\157\x5f\x73\141\155\154\137\x6c\x6f\x67\157\x75\164\137\x72\x65\154\x61\x79\137\x73\164\141\x74\145"];
        unset($_SESSION["\155\x6f\x5f\163\141\x6d\x6c\x5f\x6c\157\x67\157\x75\164\x5f\162\x65\161\165\145\x73\x74"]);
        unset($_SESSION["\155\x6f\137\163\x61\x6d\154\137\x6c\157\147\x6f\165\164\x5f\x72\x65\154\x61\x79\137\x73\164\141\x74\x65"]);
        $eB = new DOMDocument();
        $eB->loadXML($Ps);
        $Ps = $eB->firstChild;
        if (!($Ps->localName == "\x4c\x6f\147\157\x75\164\x52\x65\161\x75\x65\x73\x74")) {
            goto Sv;
        }
        $Mu = new SAML2SPLogoutRequest($Ps);
        $CU = get_option("\155\157\137\163\141\x6d\x6c\137\x73\x70\137\x65\x6e\164\x69\164\171\137\x69\x64");
        if (!empty($CU)) {
            goto vY;
        }
        $CU = $Ca . "\57\167\x70\55\143\157\156\164\145\156\164\57\160\154\165\147\151\156\163\57\x6d\x69\156\151\157\x72\141\x6e\147\145\x2d\x73\141\155\x6c\55\x32\x30\x2d\163\x69\156\147\154\x65\55\163\151\147\156\x2d\157\156\57";
        vY:
        $qd = $Wz;
        $F5 = SAMLSPUtilities::createLogoutResponse($Mu->getId(), $CU, $qd, $Vw);
        if (empty($Vw) || $Vw == "\110\x74\164\160\x52\x65\144\151\162\145\143\164") {
            goto nB;
        }
        if (!(LicenseHelper::getCurrentOption(mo_options_enum_service_provider::Request_signed) != "\143\150\x65\x63\x6b\145\x64")) {
            goto kR;
        }
        $pl = base64_encode($F5);
        SAMLSPUtilities::postSAMLResponse($Wz, $pl, $VK);
        die;
        kR:
        $ef = '';
        $TV = '';
        $pl = SAMLSPUtilities::signXML($F5, "\x53\164\141\164\165\x73");
        SAMLSPUtilities::postSAMLResponse($Wz, $pl, $VK);
        goto SY;
        nB:
        $IV = $Wz;
        if (strpos($Wz, "\77") !== false) {
            goto gb;
        }
        $IV .= "\77";
        goto KL;
        gb:
        $IV .= "\46";
        KL:
        if (!(LicenseHelper::getCurrentOption(mo_options_enum_service_provider::Request_signed) != "\x63\150\145\x63\x6b\145\x64")) {
            goto uY;
        }
        $IV .= "\x53\101\x4d\x4c\122\145\x73\160\157\x6e\x73\x65\x3d" . $F5 . "\46\122\x65\154\141\171\123\x74\141\164\x65\x3d" . urlencode($VK);
        header("\114\157\143\141\x74\151\157\156\x3a\40" . $IV);
        die;
        uY:
        $AJ = "\123\x41\x4d\x4c\122\x65\163\160\x6f\x6e\x73\145\x3d" . $F5 . "\x26\122\x65\154\x61\171\x53\x74\x61\x74\x65\75" . urlencode($VK) . "\46\123\151\x67\101\154\x67\x3d" . urlencode(XMLSecurityKey::RSA_SHA256);
        $Z6 = array("\x74\x79\x70\x65" => "\x70\x72\151\166\x61\164\145");
        $Ej = new XMLSecurityKey(XMLSecurityKey::RSA_SHA256, $Z6);
        $N1 = get_option("\155\x6f\x5f\163\141\155\154\x5f\x63\165\x72\162\145\156\164\x5f\x63\x65\x72\164\x5f\160\162\151\166\x61\x74\145\137\x6b\145\x79");
        $Ej->loadKey($N1, FALSE);
        $kj = new XMLSecurityDSig();
        $xZ = $Ej->signData($AJ);
        $xZ = base64_encode($xZ);
        $IV .= $AJ . "\x26\x53\151\x67\x6e\x61\x74\165\x72\145\75" . urlencode($xZ);
        header("\x4c\x6f\x63\141\x74\x69\157\x6e\x3a\40" . $IV);
        die;
        SY:
        Sv:
    }
}
function mo_saml_create_logout_request($t0, $vq, $Wz, $Vw, $Zi)
{
    $Ca = get_option("\x6d\x6f\137\163\141\155\x6c\x5f\x73\x70\x5f\142\141\x73\x65\137\x75\x72\154");
    if (!empty($Ca)) {
        goto oO;
    }
    $Ca = home_url();
    oO:
    $CU = get_option("\155\157\137\x73\141\x6d\154\x5f\163\x70\x5f\x65\156\x74\x69\164\x79\137\x69\x64");
    if (!empty($CU)) {
        goto SO;
    }
    $CU = $Ca . "\x2f\167\x70\55\143\x6f\x6e\x74\145\156\x74\x2f\160\154\x75\x67\x69\x6e\163\x2f\155\x69\x6e\151\x6f\162\x61\x6e\x67\145\55\163\x61\155\x6c\x2d\62\60\55\163\151\x6e\147\154\145\x2d\x73\x69\147\x6e\55\157\x6e\57";
    SO:
    $qd = $Wz;
    $Nc = $Zi;
    $Nc = mo_saml_get_relay_state($Nc);
    $AJ = SAMLSPUtilities::createLogoutRequest($t0, $CU, $qd, $vq, $Vw);
    if (empty($Vw) || $Vw == "\x48\164\164\x70\x52\145\144\x69\162\x65\143\164") {
        goto KV;
    }
    if (!(LicenseHelper::getCurrentOption(mo_options_enum_service_provider::Request_signed) != "\143\x68\x65\x63\x6b\145\144")) {
        goto HX;
    }
    $pl = base64_encode($AJ);
    SAMLSPUtilities::postSAMLRequest($Wz, $pl, $Nc);
    die;
    HX:
    $ef = '';
    $TV = '';
    $pl = SAMLSPUtilities::signXML($AJ, "\116\x61\155\145\111\x44");
    SAMLSPUtilities::postSAMLRequest($Wz, $pl, $Nc);
    goto qV;
    KV:
    $IV = $Wz;
    if (strpos($Wz, "\x3f") !== false) {
        goto k8;
    }
    $IV .= "\77";
    goto S2;
    k8:
    $IV .= "\x26";
    S2:
    if (!LicenseHelper::getCurrentOption(mo_options_enum_service_provider::Request_signed != "\143\150\145\x63\153\x65\x64")) {
        goto D5;
    }
    $IV .= "\x53\x41\115\114\122\145\161\x75\x65\163\164\75" . $AJ . "\x26\122\145\x6c\x61\171\x53\164\x61\x74\145\75" . urlencode($Nc);
    header("\x4c\157\143\x61\x74\x69\x6f\156\x3a\40" . $IV);
    die;
    D5:
    $AJ = "\x53\x41\115\x4c\122\145\161\x75\145\163\x74\x3d" . $AJ . "\46\122\145\154\x61\x79\123\164\141\164\x65\x3d" . urlencode($Nc) . "\46\x53\151\147\101\x6c\x67\x3d" . urlencode(XMLSecurityKey::RSA_SHA256);
    $Z6 = array("\x74\x79\160\145" => "\160\x72\151\166\141\164\145");
    $Ej = new XMLSecurityKey(XMLSecurityKey::RSA_SHA256, $Z6);
    $N1 = get_option("\155\x6f\x5f\x73\141\x6d\154\x5f\x63\165\162\x72\x65\156\x74\137\x63\x65\162\x74\137\160\162\151\x76\x61\164\145\x5f\153\145\x79");
    $Ej->loadKey($N1, FALSE);
    $kj = new XMLSecurityDSig();
    $xZ = $Ej->signData($AJ);
    $xZ = base64_encode($xZ);
    $IV .= $AJ . "\x26\x53\151\x67\x6e\141\x74\165\162\145\x3d" . urlencode($xZ);
    header("\114\157\143\141\164\x69\x6f\156\x3a\40" . $IV);
    die;
    qV:
}
function mo_login_validate()
{
    if (!(isset($_REQUEST["\x6f\x70\164\151\157\x6e"]) && $_REQUEST["\157\160\164\151\157\x6e"] == "\x6d\x6f\163\141\155\x6c\x5f\155\x65\164\x61\x64\x61\x74\x61")) {
        goto hg;
    }
    miniorange_generate_metadata();
    hg:
    if (!(isset($_REQUEST["\157\x70\x74\151\x6f\x6e"]) && $_REQUEST["\x6f\160\164\x69\157\156"] == "\145\x78\x70\x6f\x72\x74\137\143\157\x6e\146\x69\147\x75\x72\x61\164\x69\157\x6e")) {
        goto VT;
    }
    if (!current_user_can("\x6d\141\x6e\141\147\x65\x5f\x6f\160\x74\x69\x6f\x6e\x73")) {
        goto li;
    }
    miniorange_import_export(true);
    li:
    die;
    VT:
    if (!mo_saml_is_customer_license_verified()) {
        goto zB;
    }
    if (!(isset($_REQUEST["\x6f\x70\x74\x69\x6f\x6e"]) && $_REQUEST["\x6f\160\x74\151\157\156"] == "\163\x61\x6d\x6c\x5f\x75\x73\x65\162\x5f\x6c\x6f\x67\151\x6e" || isset($_REQUEST["\157\160\x74\151\157\156"]) && $_REQUEST["\x6f\x70\x74\x69\157\156"] == "\x74\145\163\164\151\x64\160\143\157\x6e\x66\x69\x67" || isset($_REQUEST["\x6f\x70\x74\x69\157\x6e"]) && $_REQUEST["\157\160\x74\151\x6f\156"] == "\147\x65\164\x73\x61\155\154\x72\145\x71\x75\145\163\x74" || isset($_REQUEST["\x6f\160\164\x69\x6f\x6e"]) && $_REQUEST["\157\x70\x74\151\157\x6e"] == "\x67\x65\164\x73\x61\155\154\x72\x65\163\x70\x6f\156\163\x65")) {
        goto B_;
    }
    if (!mo_saml_is_sp_configured()) {
        goto Fc;
    }
    if (!(is_user_logged_in() && $_REQUEST["\157\160\x74\x69\x6f\156"] == "\163\141\155\x6c\x5f\165\163\x65\x72\x5f\x6c\x6f\147\x69\x6e")) {
        goto rY;
    }
    if (!isset($_REQUEST["\x72\145\x64\x69\162\x65\143\164\137\x74\x6f"])) {
        goto tA;
    }
    $Aj = htmlspecialchars($_REQUEST["\x72\145\x64\151\162\145\143\164\x5f\164\157"]);
    header("\x4c\157\143\141\164\x69\x6f\x6e\x3a\40" . $Aj);
    die;
    tA:
    return;
    rY:
    $Ca = get_option("\155\157\x5f\x73\x61\x6d\154\x5f\x73\x70\x5f\142\141\x73\145\137\x75\162\x6c");
    if (!empty($Ca)) {
        goto fW;
    }
    $Ca = home_url();
    fW:
    if (isset($_REQUEST["\x69\x64\160"]) and !empty($_REQUEST["\x69\x64\160"])) {
        goto ZB;
    }
    $po = '';
    goto aK;
    ZB:
    $po = htmlspecialchars($_REQUEST["\x69\144\x70"]);
    aK:
    if ($_REQUEST["\x6f\160\x74\x69\157\x6e"] == "\164\145\163\x74\x69\144\x70\x63\157\x6e\x66\x69\x67" and array_key_exists("\x6e\x65\x77\x63\145\x72\x74", $_REQUEST)) {
        goto RY;
    }
    if ($_REQUEST["\157\x70\x74\151\157\x6e"] == "\x74\145\163\x74\x69\144\160\x63\157\x6e\146\x69\x67") {
        goto KN;
    }
    if ($_REQUEST["\157\x70\164\151\x6f\156"] == "\147\x65\164\x73\x61\x6d\154\162\x65\x71\165\x65\163\x74") {
        goto tJ;
    }
    if ($_REQUEST["\x6f\x70\164\151\157\156"] == "\x67\x65\x74\163\141\x6d\x6c\162\145\163\160\157\156\x73\145") {
        goto aS1;
    }
    if (get_option("\155\x6f\137\x73\141\x6d\x6c\x5f\x72\x65\x6c\x61\x79\137\x73\x74\141\x74\x65") && get_option("\155\x6f\x5f\163\x61\155\x6c\137\x72\x65\154\141\171\137\163\164\141\164\x65") != '') {
        goto TI;
    }
    if (isset($_REQUEST["\162\145\144\x69\x72\145\x63\164\x5f\164\157"])) {
        goto Mx;
    }
    $Nc = wp_get_referer();
    goto G_;
    Mx:
    $Nc = htmlspecialchars($_REQUEST["\x72\x65\144\x69\x72\145\143\x74\137\164\x6f"]);
    G_:
    goto oo;
    TI:
    $Nc = get_option("\x6d\157\137\x73\x61\155\x6c\x5f\162\145\154\141\x79\137\x73\164\141\164\145");
    oo:
    goto n5;
    aS1:
    $Nc = "\x64\151\x73\x70\154\141\x79\123\x41\x4d\x4c\x52\145\x73\160\157\156\x73\x65";
    n5:
    goto LZ;
    tJ:
    $Nc = "\x64\151\163\160\154\x61\171\123\101\115\114\x52\145\161\165\x65\163\164";
    LZ:
    goto l9;
    KN:
    $Nc = "\164\x65\x73\164\126\141\154\151\x64\x61\164\x65";
    l9:
    goto cr;
    RY:
    $Nc = "\164\145\x73\164\116\145\x77\x43\x65\x72\x74\151\x66\x69\143\141\x74\x65";
    cr:
    if (!empty($Nc)) {
        goto Rd;
    }
    $Nc = $Ca;
    Rd:
    $ZS = htmlspecialchars_decode(LicenseHelper::getCurrentOption(mo_options_enum_service_provider::Login_URL));
    $yF = LicenseHelper::getCurrentOption(mo_options_enum_service_provider::Login_binding_type);
    $b8 = get_option("\x6d\x6f\x5f\x73\x61\x6d\x6c\x5f\146\x6f\162\x63\x65\x5f\x61\165\164\150\x65\156\164\x69\x63\x61\164\151\x6f\x6e");
    $Ii = $Ca . "\x2f";
    $CU = get_option("\155\x6f\137\163\141\x6d\154\137\163\x70\x5f\145\x6e\x74\x69\x74\171\x5f\x69\144");
    $ml = LicenseHelper::getCurrentOption(mo_options_enum_service_provider::NameID_Format);
    if (!empty($ml)) {
        goto y2;
    }
    $ml = "\x31\x2e\x31\72\156\x61\155\145\x69\x64\x2d\x66\x6f\x72\155\x61\164\x3a\165\156\x73\160\x65\143\x69\146\x69\x65\144";
    y2:
    if (!empty($CU)) {
        goto cj;
    }
    $CU = $Ca . "\57\167\x70\x2d\143\157\x6e\164\145\156\164\57\x70\x6c\165\x67\x69\156\163\x2f\155\x69\156\x69\157\x72\x61\x6e\147\145\55\x73\x61\155\x6c\55\x32\60\55\x73\151\156\147\154\x65\55\x73\x69\x67\x6e\x2d\157\156\57";
    cj:
    $AJ = SAMLSPUtilities::createAuthnRequest($Ii, $CU, $ZS, $b8, $yF, $ml);
    if (!($Nc == "\x64\x69\163\160\154\141\x79\x53\x41\x4d\114\122\x65\161\165\x65\x73\164")) {
        goto fA;
    }
    mo_saml_show_SAML_log(SAMLSPUtilities::createAuthnRequest($Ii, $CU, $ZS, $b8, "\x48\x54\x54\120\x50\x6f\x73\164", $ml), $Nc);
    fA:
    $IV = $ZS;
    if (strpos($ZS, "\x3f") !== false) {
        goto hU;
    }
    $IV .= "\77";
    goto YS;
    hU:
    $IV .= "\x26";
    YS:
    cldjkasjdksalc();
    $Nc = mo_saml_get_relay_state($Nc);
    $Nc = empty($Nc) ? "\x2f" : $Nc;
    if (empty($yF) || $yF == "\110\x74\x74\160\122\x65\x64\151\x72\145\143\164") {
        goto Ui;
    }
    if (!(LicenseHelper::getCurrentOption(mo_options_enum_service_provider::Request_signed) != "\143\150\145\x63\153\145\x64")) {
        goto fS;
    }
    $pl = base64_encode($AJ);
    SAMLSPUtilities::postSAMLRequest($ZS, $pl, $Nc);
    die;
    fS:
    $ef = '';
    $TV = '';
    if ($_REQUEST["\157\160\164\x69\157\x6e"] == "\164\x65\x73\164\x69\x64\x70\x63\x6f\156\x66\x69\x67" && array_key_exists("\156\x65\167\143\x65\x72\164", $_REQUEST)) {
        goto k4;
    }
    $pl = SAMLSPUtilities::signXML($AJ, "\116\141\x6d\x65\x49\104\120\157\x6c\x69\143\x79");
    goto Aa;
    k4:
    $pl = SAMLSPUtilities::signXML($AJ, "\x4e\x61\x6d\145\111\x44\120\157\154\151\x63\x79", true);
    Aa:
    SAMLSPUtilities::postSAMLRequest($ZS, $pl, $Nc, $po);
    update_option("\x6d\157\x5f\x73\x61\155\154\137\x6e\145\x77\137\x63\x65\162\164\x5f\x74\x65\x73\x74", true);
    goto d4;
    Ui:
    if (!(LicenseHelper::getCurrentOption(mo_options_enum_service_provider::Request_signed) != "\x63\150\145\143\x6b\145\x64")) {
        goto uB;
    }
    $IV .= "\123\x41\115\x4c\122\x65\x71\165\x65\x73\x74\75" . $AJ . "\x26\122\x65\x6c\x61\x79\x53\164\x61\x74\145\75" . urlencode($Nc);
    if (empty($po)) {
        goto jb;
    }
    $IV .= "\x26\165\x73\x65\x72\x4e\141\x6d\145\75" . $po;
    jb:
    header("\x63\x61\143\150\145\x2d\143\x6f\156\164\x72\x6f\154\x3a\40\155\x61\170\x2d\x61\147\145\x3d\60\x2c\40\x70\x72\151\x76\x61\164\x65\x2c\x20\x6e\157\55\163\x74\157\x72\145\54\40\156\x6f\x2d\143\141\143\x68\145\54\x20\x6d\165\x73\x74\55\162\x65\x76\x61\154\151\144\141\164\x65");
    header("\x4c\157\x63\x61\x74\151\x6f\156\x3a\40" . $IV);
    die;
    uB:
    $AJ = "\x53\101\x4d\114\122\x65\161\x75\145\x73\x74\75" . $AJ . "\x26\x52\145\154\x61\171\123\164\141\x74\x65\75" . urlencode($Nc) . "\46\123\151\147\101\x6c\147\75" . urlencode(XMLSecurityKey::RSA_SHA256);
    $Z6 = array("\x74\x79\160\x65" => "\160\162\151\x76\141\164\145");
    $Ej = new XMLSecurityKey(XMLSecurityKey::RSA_SHA256, $Z6);
    if ($_REQUEST["\x6f\160\164\x69\x6f\x6e"] == "\164\x65\x73\164\151\x64\x70\x63\x6f\156\x66\151\147" && array_key_exists("\x6e\x65\x77\143\x65\x72\164", $_REQUEST)) {
        goto wu;
    }
    $N1 = get_option("\x6d\x6f\137\x73\x61\x6d\154\137\143\x75\162\162\145\156\164\x5f\x63\145\162\164\x5f\160\x72\x69\166\141\x74\145\137\x6b\x65\171");
    goto c8;
    wu:
    $N1 = file_get_contents(plugin_dir_path(__FILE__) . "\162\145\x73\x6f\x75\162\143\x65\163" . DIRECTORY_SEPARATOR . "\155\151\x6e\x69\157\x72\141\156\147\x65\137\163\x70\x5f\62\x30\x32\60\137\160\x72\151\x76\56\x6b\x65\171");
    c8:
    $Ej->loadKey($N1, FALSE);
    $kj = new XMLSecurityDSig();
    $xZ = $Ej->signData($AJ);
    $xZ = base64_encode($xZ);
    $IV .= $AJ . "\46\123\x69\x67\156\141\x74\x75\x72\145\75" . urlencode($xZ);
    if (empty($po)) {
        goto ad;
    }
    $IV .= "\46\165\x73\x65\162\116\141\155\x65\75" . $po;
    ad:
    header("\x63\x61\x63\x68\145\55\x63\x6f\156\x74\x72\x6f\x6c\x3a\40\x6d\141\x78\55\141\147\x65\75\60\54\40\160\162\151\166\141\164\x65\x2c\40\156\157\x2d\163\164\x6f\162\145\x2c\40\156\x6f\x2d\143\x61\x63\150\x65\x2c\x20\155\x75\x73\x74\55\162\x65\x76\x61\154\x69\144\141\x74\145");
    header("\x4c\x6f\x63\141\x74\151\x6f\x6e\x3a\40" . $IV);
    die;
    d4:
    Fc:
    B_:
    if (!(array_key_exists("\x53\101\115\x4c\122\145\x73\160\x6f\x6e\163\x65", $_REQUEST) && !empty($_REQUEST["\x53\101\x4d\114\x52\x65\163\x70\x6f\x6e\x73\x65"]))) {
        goto e8;
    }
    if (array_key_exists("\x52\145\154\x61\x79\x53\x74\141\164\x65", $_POST) && !empty($_POST["\x52\x65\x6c\141\x79\x53\x74\141\164\145"]) && $_POST["\122\145\154\141\171\x53\x74\x61\164\x65"] != "\57") {
        goto p7;
    }
    $cL = '';
    goto qm;
    p7:
    $cL = $_POST["\122\145\x6c\x61\171\123\x74\141\x74\145"];
    qm:
    $Ca = get_option("\x6d\157\x5f\163\x61\155\154\137\163\x70\x5f\x62\x61\163\145\x5f\x75\162\154");
    if (!empty($Ca)) {
        goto sA;
    }
    $Ca = home_url();
    sA:
    $am = htmlspecialchars($_REQUEST["\x53\x41\115\x4c\x52\145\163\160\x6f\x6e\163\x65"]);
    $am = base64_decode($am);
    if (!($cL == "\x64\x69\163\x70\154\x61\x79\x53\x41\x4d\x4c\x52\x65\x73\160\x6f\156\163\x65")) {
        goto lE;
    }
    mo_saml_show_SAML_log($am, $cL);
    lE:
    if (!(array_key_exists("\x53\101\115\114\122\x65\163\x70\x6f\x6e\x73\145", $_GET) && !empty($_GET["\x53\101\115\114\x52\x65\x73\160\x6f\x6e\x73\145"]))) {
        goto Pr;
    }
    $am = gzinflate($am);
    Pr:
    $eB = new DOMDocument();
    $eB->loadXML($am);
    $Bq = $eB->firstChild;
    $rq = $eB->documentElement;
    $eM = new DOMXpath($eB);
    $eM->registerNamespace("\x73\x61\155\154\160", "\x75\162\x6e\72\x6f\x61\163\151\163\72\156\x61\155\x65\x73\x3a\164\143\x3a\x53\x41\115\x4c\72\x32\56\x30\72\x70\x72\x6f\x74\x6f\x63\157\x6c");
    $eM->registerNamespace("\163\141\155\x6c", "\x75\x72\x6e\72\x6f\x61\163\151\163\x3a\156\141\x6d\145\x73\x3a\x74\x63\x3a\x53\101\115\x4c\72\62\x2e\60\x3a\141\x73\163\x65\x72\164\151\157\x6e");
    if ($Bq->localName == "\114\157\x67\x6f\x75\x74\122\x65\x73\x70\x6f\156\163\145") {
        goto kV;
    }
    $bf = $eM->query("\57\163\x61\x6d\x6c\160\72\122\x65\163\160\157\156\163\145\57\x73\141\x6d\x6c\x70\x3a\x53\x74\141\164\x75\163\57\x73\141\155\x6c\x70\x3a\x53\x74\x61\x74\x75\163\x43\x6f\x64\145", $rq);
    $qU = $bf->item(0)->getAttribute("\126\x61\x6c\165\x65");
    $U1 = $eM->query("\57\x73\x61\x6d\154\160\72\122\145\x73\x70\x6f\x6e\x73\145\x2f\x73\x61\155\154\x70\x3a\123\164\141\164\165\x73\x2f\x73\141\155\154\x70\72\x53\x74\141\164\165\x73\x4d\145\163\x73\x61\147\x65", $rq)->item(0);
    if (empty($U1)) {
        goto fC;
    }
    $U1 = $U1->nodeValue;
    fC:
    $OE = explode("\x3a", $qU);
    $bf = $OE[7];
    if (array_key_exists("\x52\x65\x6c\x61\171\123\164\141\164\145", $_POST) && !empty($_POST["\122\x65\154\141\171\x53\x74\x61\164\145"]) && $_POST["\122\x65\x6c\x61\x79\123\164\x61\x74\145"] != "\x2f") {
        goto tu;
    }
    $cL = '';
    goto U5;
    tu:
    $cL = $_POST["\122\x65\154\x61\171\123\x74\141\x74\x65"];
    U5:
    if (!($bf != "\123\x75\143\143\x65\163\163")) {
        goto xE;
    }
    show_status_error($bf, $cL, $U1);
    xE:
    $YB = maybe_unserialize(LicenseHelper::getCurrentOption(mo_options_enum_service_provider::X509_certificate));
    $Ii = $Ca . "\x2f";
    update_option("\x6d\157\137\163\x61\155\x6c\x5f\x72\145\163\160\157\156\x73\x65", base64_encode($am));
    if ($cL == "\164\145\x73\x74\116\x65\x77\x43\145\x72\x74\x69\x66\151\143\141\164\145") {
        goto IM;
    }
    $am = new SAML2SPResponse($Bq, get_option("\x6d\157\137\163\141\155\x6c\x5f\x63\x75\x72\x72\145\x6e\x74\x5f\143\145\162\164\137\x70\162\151\166\x61\164\x65\x5f\153\145\x79"));
    goto j7;
    IM:
    $GJ = file_get_contents(plugin_dir_path(__FILE__) . "\162\145\x73\157\x75\162\143\x65\x73" . DIRECTORY_SEPARATOR . "\155\x69\156\x69\157\162\141\156\147\x65\137\x73\160\137\62\60\x32\x30\x5f\160\x72\x69\x76\56\153\145\171");
    $am = new SAML2SPResponse($Bq, $GJ);
    j7:
    $yn = $am->getSignatureData();
    $B2 = current($am->getAssertions())->getSignatureData();
    if (!(empty($B2) && empty($yn))) {
        goto iu;
    }
    if ($cL == "\x74\145\x73\x74\126\141\154\x69\144\x61\164\x65" or $cL == "\x74\145\163\x74\116\145\167\103\145\162\x74\x69\x66\151\143\x61\x74\145") {
        goto V6;
    }
    wp_die("\x57\x65\40\143\x6f\165\154\144\x20\156\x6f\x74\40\163\x69\x67\x6e\40\x79\x6f\165\x20\x69\156\x2e\40\120\x6c\145\x61\x73\x65\x20\143\x6f\156\x74\x61\143\x74\x20\141\x64\x6d\x69\x6e\151\163\164\x72\x61\x74\157\162", "\105\162\162\x6f\162\x3a\40\111\x6e\x76\x61\x6c\x69\x64\x20\123\101\115\114\x20\122\145\x73\x70\157\156\163\x65");
    goto tt;
    V6:
    $w0 = mo_options_error_constants::Error_no_certificate;
    $OF = mo_options_error_constants::Cause_no_certificate;
    echo "\74\x64\x69\x76\40\163\164\171\x6c\x65\x3d\x22\146\x6f\x6e\164\55\x66\x61\x6d\151\154\171\72\x43\x61\x6c\x69\x62\x72\151\73\160\x61\x64\x64\x69\x6e\x67\x3a\x30\40\63\45\73\42\76\xd\xa\x9\x9\11\11\74\144\151\x76\x20\163\x74\171\x6c\145\x3d\x22\x63\157\x6c\157\162\x3a\x20\43\141\x39\64\64\64\x32\x3b\x62\141\143\153\x67\162\157\x75\156\x64\x2d\x63\x6f\x6c\x6f\162\x3a\40\x23\146\62\x64\x65\x64\x65\x3b\160\141\x64\x64\x69\156\x67\72\40\x31\x35\x70\170\73\155\141\162\147\x69\x6e\55\x62\x6f\164\x74\157\x6d\72\40\x32\60\160\x78\73\x74\x65\170\x74\x2d\141\154\x69\x67\x6e\72\143\x65\x6e\164\145\162\x3b\x62\x6f\162\x64\145\162\72\x31\160\x78\x20\x73\157\x6c\x69\144\x20\x23\x45\x36\102\63\x42\62\x3b\x66\x6f\156\164\x2d\x73\x69\x7a\x65\72\61\x38\x70\x74\x3b\42\x3e\x20\x45\x52\122\x4f\122\74\57\x64\151\166\x3e\xd\xa\11\11\11\11\74\144\151\x76\40\163\x74\x79\x6c\x65\x3d\x22\x63\x6f\x6c\157\x72\x3a\40\x23\x61\x39\x34\64\64\62\x3b\x66\x6f\156\x74\55\163\151\172\145\72\x31\x34\x70\x74\x3b\x20\155\x61\x72\x67\151\156\x2d\x62\x6f\164\164\157\155\72\x32\60\160\170\x3b\42\76\74\160\x3e\74\163\x74\x72\157\x6e\147\x3e\105\x72\162\x6f\x72\40\40\72" . $w0 . "\40\x3c\x2f\163\164\x72\157\156\x67\76\x3c\57\160\x3e\xd\xa\11\11\x9\x9\xd\12\x9\11\11\11\x3c\160\76\x3c\x73\164\162\157\156\147\x3e\x50\157\x73\x73\151\142\154\145\40\103\x61\x75\x73\145\x3a\40" . $OF . "\x3c\57\163\x74\x72\x6f\x6e\147\76\x3c\x2f\160\76\15\12\x9\11\11\11\xd\xa\x9\x9\x9\11\x3c\57\x64\151\166\76\x3c\57\144\x69\x76\76";
    mo_saml_download_logs($w0, $OF);
    die;
    tt:
    iu:
    $JM = '';
    if (is_array($YB)) {
        goto R_;
    }
    $KM = XMLSecurityKey::getRawThumbprint($YB);
    $KM = mo_saml_convert_to_windows_iconv($KM);
    $KM = preg_replace("\57\x5c\163\x2b\x2f", '', $KM);
    if (empty($yn)) {
        goto I_;
    }
    $JM = SAMLSPUtilities::processResponse($Ii, $KM, $yn, $am, 0, $cL);
    I_:
    if (empty($B2)) {
        goto Hy;
    }
    $JM = SAMLSPUtilities::processResponse($Ii, $KM, $B2, $am, 0, $cL);
    Hy:
    goto GX;
    R_:
    foreach ($YB as $Ej => $j1) {
        $KM = XMLSecurityKey::getRawThumbprint($j1);
        $KM = mo_saml_convert_to_windows_iconv($KM);
        $KM = preg_replace("\x2f\x5c\163\53\x2f", '', $KM);
        if (empty($yn)) {
            goto i6;
        }
        $JM = SAMLSPUtilities::processResponse($Ii, $KM, $yn, $am, $Ej, $cL);
        i6:
        if (empty($B2)) {
            goto Mg;
        }
        $JM = SAMLSPUtilities::processResponse($Ii, $KM, $B2, $am, $Ej, $cL);
        Mg:
        if (!$JM) {
            goto Rp;
        }
        goto sk;
        Rp:
        Dc:
    }
    sk:
    GX:
    if ($yn) {
        goto Xz;
    }
    if ($B2) {
        goto Ck;
    }
    goto XU;
    Xz:
    $mi = $yn["\103\145\x72\x74\151\146\x69\143\x61\x74\x65\x73"][0];
    goto XU;
    Ck:
    $mi = $B2["\103\145\162\164\151\146\x69\x63\141\164\x65\x73"][0];
    XU:
    if ($JM) {
        goto IQ;
    }
    if ($cL == "\164\x65\x73\164\x56\141\154\151\x64\x61\164\145" or $cL == "\164\145\163\x74\116\x65\x77\x43\x65\162\x74\x69\146\x69\x63\x61\164\x65") {
        goto Df;
    }
    wp_die("\127\145\x20\143\157\165\x6c\x64\40\x6e\157\x74\x20\163\151\x67\x6e\x20\171\157\165\x20\x69\x6e\x2e\40\120\x6c\x65\141\x73\145\x20\x63\x6f\x6e\164\141\x63\164\x20\171\x6f\165\162\40\141\144\x6d\x69\x6e\x69\163\164\162\x61\164\157\x72", "\x45\162\162\157\x72\72\x20\111\156\166\x61\154\x69\x64\40\x53\x41\x4d\114\40\x52\145\x73\160\157\156\x73\x65");
    goto ch;
    Df:
    $w0 = mo_options_error_constants::Error_wrong_certificate;
    $OF = mo_options_error_constants::Cause_wrong_certificate;
    $do = "\55\55\x2d\55\55\102\105\107\111\116\x20\103\x45\122\x54\111\x46\x49\103\x41\124\x45\55\x2d\55\55\x2d\74\142\162\76" . chunk_split($mi, 64) . "\74\x62\162\x3e\55\x2d\55\x2d\x2d\x45\116\x44\40\x43\x45\122\124\x49\x46\x49\103\101\x54\x45\55\x2d\55\x2d\x2d";
    echo "\74\x64\151\166\x20\163\164\171\154\x65\75\x22\146\157\156\x74\55\x66\141\155\151\x6c\171\72\x43\x61\x6c\151\142\162\x69\73\x70\141\144\144\x69\x6e\x67\72\60\40\x33\45\x3b\x22\x3e";
    echo "\x3c\x64\x69\x76\40\163\164\171\154\145\x3d\x22\x63\x6f\154\x6f\x72\x3a\40\43\141\x39\64\x34\x34\x32\x3b\142\141\143\153\147\162\157\165\x6e\144\55\143\x6f\154\x6f\x72\x3a\x20\43\146\62\x64\145\144\145\x3b\x70\141\144\144\151\156\147\72\40\61\65\160\170\x3b\x6d\x61\162\147\x69\x6e\55\142\157\x74\x74\x6f\x6d\x3a\40\x32\x30\160\x78\73\x74\x65\x78\x74\x2d\x61\x6c\x69\x67\156\72\x63\x65\156\164\145\x72\x3b\142\157\162\x64\x65\x72\72\61\160\x78\40\163\x6f\x6c\x69\144\x20\43\105\x36\102\63\102\x32\x3b\146\157\156\164\55\163\x69\x7a\145\72\61\x38\160\164\x3b\42\76\x20\105\x52\122\x4f\122\74\x2f\144\151\166\x3e\xd\xa\11\x9\11\74\x64\151\x76\x20\x73\164\x79\154\145\75\42\143\x6f\154\157\162\72\x20\43\x61\x39\x34\x34\64\62\x3b\146\157\x6e\164\x2d\163\x69\172\x65\x3a\x31\x34\160\x74\x3b\x20\155\141\162\147\x69\156\55\x62\x6f\x74\164\157\155\72\62\x30\x70\x78\x3b\42\76\x3c\160\76\74\x73\164\162\157\156\147\x3e\x45\x72\162\x6f\162\72\40\74\57\163\x74\x72\157\x6e\147\x3e\125\x6e\141\142\154\145\40\164\157\x20\x66\151\x6e\144\40\x61\40\143\145\x72\164\151\x66\x69\143\x61\164\x65\40\x6d\141\x74\143\150\151\x6e\147\x20\164\x68\x65\40\x63\x6f\x6e\146\151\147\165\162\x65\x64\40\146\151\156\147\x65\162\x70\x72\x69\156\x74\x2e\x3c\x2f\160\x3e\xd\12\11\11\11\74\160\76\x50\154\x65\x61\x73\x65\x20\x63\x6f\x6e\x74\141\x63\x74\x20\171\x6f\165\162\x20\141\144\x6d\x69\156\151\x73\x74\x72\x61\x74\x6f\162\x20\x61\x6e\x64\40\x72\145\160\x6f\162\x74\x20\164\150\x65\x20\x66\157\x6c\x6c\157\x77\x69\156\147\x20\145\162\x72\x6f\162\72\x3c\x2f\160\x3e\xd\12\11\x9\x9\74\160\76\74\163\164\162\x6f\156\x67\76\x50\x6f\163\x73\x69\142\x6c\x65\x20\x43\141\165\163\x65\72\x20\x3c\x2f\163\164\x72\157\156\147\x3e\47\x58\56\x35\x30\x39\40\x43\x65\x72\164\x69\146\151\x63\x61\164\x65\47\40\146\x69\x65\x6c\x64\x20\151\x6e\40\x70\x6c\x75\147\151\156\x20\144\157\145\163\40\x6e\x6f\164\x20\155\141\x74\143\150\x20\x74\x68\x65\40\143\145\162\164\x69\x66\151\143\x61\x74\x65\40\146\x6f\165\x6e\144\x20\151\x6e\40\x53\101\115\x4c\x20\122\x65\163\160\x6f\x6e\x73\x65\56\x3c\x2f\x70\x3e\15\xa\11\x9\x9\x3c\x70\x3e\74\163\x74\x72\x6f\156\x67\76\x43\x65\162\164\151\x66\151\x63\x61\164\145\40\x66\157\165\156\x64\x20\151\156\40\x53\x41\x4d\114\40\x52\145\x73\160\x6f\x6e\x73\145\x3a\x20\74\57\163\164\x72\157\x6e\x67\x3e\x3c\x66\157\156\164\x20\x66\141\143\145\75\42\x43\x6f\x75\162\151\x65\x72\40\116\x65\x77\42\x3b\146\157\x6e\164\x2d\x73\151\172\145\72\61\60\x70\164\76\74\x62\x72\76\x3c\x62\162\76" . $do . "\x3c\57\x70\x3e\74\57\146\157\x6e\x74\76\15\xa\11\x9\x9\x3c\x70\76\74\x73\x74\162\157\156\x67\76\123\x6f\x6c\x75\164\x69\x6f\x6e\x3a\40\74\57\163\x74\x72\157\x6e\147\x3e\74\57\160\x3e\xd\12\11\11\11\40\74\x6f\x6c\76\xd\xa\x20\40\x20\40\x20\40\x20\x20\40\x20\x20\40\x20\40\40\x20\74\x6c\151\76\x43\157\x70\171\40\160\141\x73\164\145\40\x74\150\x65\40\x63\x65\x72\x74\151\146\151\x63\141\164\145\40\x70\x72\157\x76\151\144\145\144\x20\141\x62\x6f\x76\x65\x20\x69\156\x20\130\65\x30\71\x20\x43\x65\162\x74\x69\x66\151\143\x61\x74\145\x20\x75\156\144\x65\x72\40\x53\x65\162\166\151\x63\x65\x20\x50\162\157\166\151\x64\145\162\40\123\145\x74\x75\160\40\x74\x61\142\56\74\57\x6c\x69\x3e\xd\xa\x20\40\x20\40\40\40\x20\40\40\x20\40\40\40\x20\x20\x20\x3c\154\151\76\x49\146\x20\x69\163\x73\x75\x65\x20\x70\145\162\x73\x69\163\x74\163\x20\x64\151\x73\x61\142\x6c\145\x20\x3c\x62\76\103\150\x61\x72\x61\x63\164\x65\x72\x20\x65\156\x63\x6f\144\x69\156\x67\74\x2f\x62\76\40\165\x6e\144\145\162\40\x53\x65\x72\x76\151\143\x65\40\x50\x72\x6f\x76\144\145\x72\x20\x53\x65\164\165\x70\x20\x74\141\x62\56\74\x2f\x6c\x69\76\15\12\x20\40\40\x20\x20\x20\40\x20\40\40\x20\40\x20\x3c\57\157\x6c\76\x9\x9\15\xa\11\11\11\x3c\57\x64\151\166\x3e\xd\xa\11\11\x9\x9\11\74\x64\x69\166\x20\163\x74\171\154\145\x3d\x22\x6d\x61\162\x67\x69\x6e\x3a\x33\x25\73\144\x69\163\160\154\x61\x79\x3a\x62\154\157\143\153\x3b\x74\145\x78\164\55\141\x6c\151\147\x6e\72\143\145\x6e\164\x65\x72\x3b\42\x3e\xd\xa\11\x9\11\11\x9\x3c\144\x69\166\x20\x73\x74\171\x6c\x65\x3d\42\x6d\141\x72\x67\x69\x6e\72\63\x25\73\x64\151\163\x70\154\141\x79\x3a\x62\154\x6f\x63\x6b\x3b\x74\145\170\x74\55\x61\154\x69\147\156\x3a\143\x65\x6e\164\145\162\x3b\x22\76\74\x69\x6e\160\165\164\x20\163\x74\x79\154\x65\75\x22\x70\x61\x64\x64\151\156\x67\x3a\61\x25\x3b\167\x69\144\x74\x68\72\x31\x30\x30\160\x78\x3b\x62\141\x63\x6b\147\162\x6f\x75\156\144\72\40\x23\x30\60\x39\61\103\x44\x20\156\x6f\x6e\145\40\162\x65\x70\x65\141\x74\x20\x73\143\162\x6f\154\x6c\x20\x30\45\x20\x30\45\73\x63\165\162\163\x6f\x72\72\x20\x70\x6f\151\156\x74\x65\162\x3b\x66\157\x6e\x74\55\163\x69\172\145\x3a\x31\x35\x70\170\73\x62\x6f\162\144\x65\162\x2d\167\151\x64\164\x68\72\x20\61\160\170\x3b\142\157\x72\144\145\x72\x2d\x73\164\x79\x6c\x65\x3a\40\x73\x6f\x6c\x69\144\73\x62\x6f\x72\x64\x65\x72\55\162\141\x64\x69\x75\163\x3a\40\x33\x70\170\73\167\x68\151\164\145\x2d\x73\x70\x61\x63\145\72\40\156\157\x77\x72\x61\160\73\142\x6f\170\55\163\x69\172\151\x6e\147\x3a\40\142\157\x72\144\x65\162\55\142\x6f\x78\x3b\142\x6f\162\x64\145\162\x2d\143\157\x6c\157\162\x3a\x20\x23\x30\60\67\63\101\x41\73\x62\x6f\x78\55\x73\150\141\144\157\167\72\40\x30\160\170\40\61\x70\x78\x20\60\160\170\40\162\x67\142\x61\50\61\x32\60\54\x20\62\60\60\54\40\x32\63\60\54\x20\x30\56\66\x29\40\151\x6e\163\x65\x74\73\x63\x6f\154\x6f\162\x3a\40\x23\106\106\x46\x3b\x22\x74\171\x70\145\75\x22\x62\165\x74\164\157\x6e\x22\40\166\141\154\165\x65\75\42\104\x6f\156\145\42\x20\x6f\x6e\103\x6c\x69\143\x6b\x3d\x22\163\145\154\x66\56\143\154\157\163\145\x28\51\73\x22\76\x3c\57\x64\151\166\x3e";
    mo_saml_download_logs($w0, $OF);
    die;
    ch:
    IQ:
    $e8 = LicenseHelper::getCurrentOption(mo_options_enum_service_provider::Issuer);
    $CU = get_option("\155\x6f\x5f\x73\141\155\154\x5f\x73\160\x5f\145\156\x74\151\x74\171\137\151\x64");
    if (!empty($CU)) {
        goto BY;
    }
    $CU = $Ca . "\x2f\x77\x70\55\x63\157\x6e\x74\x65\x6e\x74\x2f\x70\154\x75\147\151\x6e\163\x2f\x6d\151\x6e\151\x6f\162\141\156\147\x65\55\163\141\155\154\55\62\60\x2d\x73\151\156\147\154\145\55\163\151\x67\x6e\x2d\157\156\57";
    BY:
    SAMLSPUtilities::validateIssuerAndAudience($am, $CU, $e8, $cL);
    $YW = current(current($am->getAssertions())->getNameId());
    $S_ = current($am->getAssertions())->getAttributes();
    $S_["\116\141\155\x65\111\104"] = array("\x30" => $YW);
    $vq = current($am->getAssertions())->getSessionIndex();
    mo_saml_checkMapping($S_, $cL, $vq);
    goto Jd;
    kV:
    if (!isset($_REQUEST["\122\x65\x6c\141\x79\x53\x74\141\164\145"])) {
        goto y5;
    }
    $VK = $_REQUEST["\x52\x65\154\x61\171\x53\x74\141\164\x65"];
    y5:
    $Er = get_option("\155\157\x5f\x73\141\155\x6c\137\154\x6f\x67\x6f\165\x74\x5f\x72\145\x6c\141\x79\x5f\x73\164\x61\x74\145");
    if (empty($Er)) {
        goto t1;
    }
    $VK = $Er;
    t1:
    wp_logout();
    if (!empty($VK)) {
        goto xc;
    }
    $VK = home_url();
    xc:
    header("\x4c\x6f\x63\141\x74\x69\157\156\72\x20" . $VK);
    die;
    Jd:
    e8:
    if (!(array_key_exists("\123\x41\115\114\x52\x65\161\165\x65\x73\164", $_REQUEST) && !empty($_REQUEST["\x53\x41\x4d\x4c\122\145\161\x75\x65\x73\x74"]))) {
        goto Sw;
    }
    $AJ = htmlspecialchars($_REQUEST["\x53\101\115\x4c\122\x65\x71\165\145\163\164"]);
    $cL = "\x2f";
    if (!array_key_exists("\122\x65\154\x61\x79\123\164\141\x74\145", $_REQUEST)) {
        goto n3;
    }
    $cL = $_REQUEST["\x52\x65\154\141\171\123\x74\141\164\145"];
    n3:
    $AJ = base64_decode($AJ);
    if (!(array_key_exists("\x53\x41\x4d\114\122\x65\x71\x75\x65\163\x74", $_GET) && !empty($_GET["\x53\101\x4d\114\122\145\x71\165\145\x73\164"]))) {
        goto sU;
    }
    $AJ = gzinflate($AJ);
    sU:
    $eB = new DOMDocument();
    $eB->loadXML($AJ);
    $v0 = $eB->firstChild;
    if (!($v0->localName == "\114\157\x67\157\165\164\122\x65\x71\165\x65\163\x74")) {
        goto xo;
    }
    $Mu = new SAML2SPLogoutRequest($v0);
    if (!(!session_id() || session_id() == '' || !isset($_SESSION))) {
        goto av;
    }
    session_start();
    av:
    $_SESSION["\x6d\157\x5f\163\x61\155\x6c\137\x6c\157\147\x6f\x75\x74\x5f\162\145\161\x75\x65\x73\x74"] = $AJ;
    $_SESSION["\155\x6f\x5f\x73\x61\x6d\x6c\x5f\154\157\x67\x6f\165\x74\137\162\145\154\x61\x79\137\x73\164\x61\164\145"] = $cL;
    wp_redirect(htmlspecialchars_decode(wp_logout_url()));
    die;
    xo:
    Sw:
    if (!(isset($_REQUEST["\x6f\160\164\x69\157\x6e"]) and strpos($_REQUEST["\x6f\160\x74\x69\x6f\156"], "\x72\x65\x61\144\163\141\155\x6c\154\157\x67\x69\x6e") !== false)) {
        goto XI;
    }
    require_once dirname(__FILE__) . "\x2f\151\x6e\x63\x6c\x75\x64\x65\x73\57\x6c\151\142\x2f\145\156\143\162\171\x70\x74\151\157\156\x2e\x70\x68\x70";
    if (isset($_POST["\123\x54\x41\124\x55\x53"]) && $_POST["\123\x54\x41\x54\x55\123"] == "\105\122\x52\117\x52") {
        goto E9;
    }
    if (!(isset($_POST["\x53\x54\x41\124\x55\x53"]) && $_POST["\x53\x54\x41\124\x55\123"] == "\123\125\103\103\105\x53\123")) {
        goto HF;
    }
    $k1 = '';
    if (!(isset($_REQUEST["\x72\x65\144\151\x72\145\143\x74\137\164\x6f"]) && !empty($_REQUEST["\162\x65\x64\x69\162\145\x63\x74\137\164\157"]) && $_REQUEST["\x72\x65\144\x69\162\x65\x63\x74\137\164\x6f"] != "\57")) {
        goto mp;
    }
    $k1 = htmlspecialchars($_REQUEST["\162\x65\x64\151\x72\x65\143\x74\137\164\157"]);
    mp:
    delete_option("\155\x6f\137\x73\x61\155\x6c\x5f\x72\145\144\151\x72\145\143\x74\x5f\145\x72\162\157\x72\x5f\x63\157\x64\x65");
    delete_option("\155\157\137\163\141\x6d\154\x5f\162\145\144\151\x72\145\143\x74\137\145\162\x72\157\x72\137\x72\145\141\163\157\156");
    try {
        $s0 = get_option("\x73\x61\155\x6c\x5f\x61\155\137\145\155\141\151\x6c");
        $FU = get_option("\x73\141\x6d\x6c\137\x61\x6d\x5f\165\163\x65\162\156\141\155\145");
        $Nn = get_option("\x73\x61\x6d\x6c\137\x61\x6d\137\146\151\x72\x73\x74\x5f\156\141\155\x65");
        $yZ = get_option("\x73\141\x6d\154\137\141\x6d\x5f\154\141\163\x74\x5f\x6e\x61\155\x65");
        $YX = get_option("\163\141\x6d\x6c\x5f\141\x6d\137\x67\x72\x6f\165\x70\137\156\x61\x6d\145");
        $UL = get_option("\x73\141\x6d\x6c\137\141\155\137\144\x65\146\x61\165\x6c\x74\x5f\165\x73\145\162\137\162\x6f\154\x65");
        $GZ = get_option("\163\x61\155\154\x5f\x61\155\137\144\x6f\156\164\137\x61\x6c\154\157\167\x5f\x75\156\154\x69\x73\164\x65\x64\x5f\165\163\145\x72\137\162\157\154\x65");
        $vQ = get_option("\163\x61\155\154\x5f\x61\x6d\137\141\143\x63\x6f\165\x6e\x74\137\x6d\141\x74\143\150\145\x72");
        $fa = '';
        $IE = '';
        $Nn = str_replace("\56", "\x5f", $Nn);
        $Nn = str_replace("\40", "\137", $Nn);
        if (!(!empty($Nn) && array_key_exists($Nn, $_POST))) {
            goto oJ;
        }
        $Nn = htmlspecialchars($_POST[$Nn]);
        oJ:
        $yZ = str_replace("\x2e", "\137", $yZ);
        $yZ = str_replace("\40", "\137", $yZ);
        if (!(!empty($yZ) && array_key_exists($yZ, $_POST))) {
            goto y_;
        }
        $yZ = htmlspecialchars($_POST[$yZ]);
        y_:
        $FU = str_replace("\x2e", "\x5f", $FU);
        $FU = str_replace("\x20", "\x5f", $FU);
        if (!empty($FU) && array_key_exists($FU, $_POST)) {
            goto NB;
        }
        $IE = htmlspecialchars($_POST["\x4e\x61\x6d\x65\111\x44"]);
        goto N6;
        NB:
        $IE = htmlspecialchars($_POST[$FU]);
        N6:
        $fa = str_replace("\56", "\137", $s0);
        $fa = str_replace("\40", "\x5f", $s0);
        if (!empty($s0) && array_key_exists($s0, $_POST)) {
            goto r2;
        }
        $fa = htmlspecialchars($_POST["\116\x61\x6d\145\111\x44"]);
        goto LR;
        r2:
        $fa = htmlspecialchars($_POST[$s0]);
        LR:
        $YX = str_replace("\x2e", "\x5f", $YX);
        $YX = str_replace("\40", "\137", $YX);
        if (!(!empty($YX) && array_key_exists($YX, $_POST))) {
            goto t_;
        }
        $YX = htmlspecialchars($_POST[$YX]);
        t_:
        if (!empty($vQ)) {
            goto GH;
        }
        $vQ = "\145\x6d\x61\x69\154";
        GH:
        $Ej = get_option("\x6d\x6f\137\x73\141\155\154\137\143\x75\163\x74\157\155\x65\x72\x5f\164\157\153\145\156");
        if (!(isset($Ej) || trim($Ej) != '')) {
            goto kz;
        }
        $m_ = AESEncryption::decrypt_data($fa, $Ej);
        $fa = $m_;
        kz:
        if (!(!empty($Nn) && !empty($Ej))) {
            goto o8;
        }
        $m3 = AESEncryption::decrypt_data($Nn, $Ej);
        $Nn = $m3;
        o8:
        if (!(!empty($yZ) && !empty($Ej))) {
            goto dL;
        }
        $Kp = AESEncryption::decrypt_data($yZ, $Ej);
        $yZ = $Kp;
        dL:
        if (!(!empty($IE) && !empty($Ej))) {
            goto Xk;
        }
        $nV = AESEncryption::decrypt_data($IE, $Ej);
        $IE = $nV;
        Xk:
        if (!(!empty($YX) && !empty($Ej))) {
            goto RQ;
        }
        $Ha = AESEncryption::decrypt_data($YX, $Ej);
        $YX = $Ha;
        RQ:
    } catch (Exception $L2) {
        echo sprintf("\101\x6e\40\145\162\x72\157\162\x20\157\x63\x63\165\x72\162\x65\144\40\167\x68\x69\154\145\40\x70\162\157\143\145\163\x73\x69\156\147\40\x74\x68\x65\x20\123\x41\x4d\114\40\122\x65\163\160\157\x6e\x73\145\56");
        die;
    }
    $Wj = array($YX);
    mo_saml_login_user($fa, $Nn, $yZ, $IE, $Wj, $GZ, $UL, $k1, $vQ);
    HF:
    goto Vr;
    E9:
    update_option("\x6d\x6f\137\163\141\x6d\x6c\x5f\162\x65\144\x69\162\145\x63\164\x5f\x65\x72\x72\157\x72\x5f\143\157\x64\x65", htmlspecialchars($_POST["\105\122\x52\x4f\122\137\x52\105\101\123\x4f\116"]));
    update_option("\155\157\x5f\163\x61\x6d\154\x5f\x72\145\x64\x69\x72\x65\x63\x74\x5f\x65\162\162\x6f\162\137\162\x65\x61\x73\157\156", htmlspecialchars($_POST["\105\122\x52\117\122\137\x4d\105\x53\123\x41\107\x45"]));
    Vr:
    XI:
    zB:
}
function cldjkasjdksalc()
{
    $ij = plugin_dir_path(__FILE__);
    $dk = wp_upload_dir();
    $cq = home_url();
    $cq = trim($cq, "\x2f");
    if (preg_match("\43\x5e\150\164\164\160\50\x73\51\77\72\x2f\x2f\43", $cq)) {
        goto D2;
    }
    $cq = "\150\x74\164\x70\72\57\57" . $cq;
    D2:
    $kP = parse_url($cq);
    $Fa = preg_replace("\x2f\136\167\x77\x77\134\x2e\57", '', $kP["\150\157\x73\x74"]);
    $CX = $Fa . "\55" . $dk["\142\141\163\145\144\151\x72"];
    $Hk = hash_hmac("\163\150\141\62\65\66", $CX, "\64\104\x48\146\x6a\147\x66\x6a\x61\x73\156\144\x66\x73\141\152\x66\110\107\x4a");
    if (is_writable($ij . "\x6c\x69\x63\x65\x6e\x73\x65")) {
        goto rr;
    }
    $ON = base64_decode("\142\x47\116\x6b\x61\x6d\x74\x68\x63\x32\160\x6b\141\x33\116\x68\131\x32\x77\75");
    $Yx = get_option($ON);
    if (empty($Yx)) {
        goto P0;
    }
    $cz = str_rot13($Yx);
    P0:
    goto yS;
    rr:
    $Yx = file_get_contents($ij . "\154\151\143\x65\156\163\145");
    if (!$Yx) {
        goto F2;
    }
    $cz = base64_encode($Yx);
    F2:
    yS:
    if (!empty($Yx)) {
        goto M1;
    }
    $y1 = base64_decode("\124\107\x6c\x6a\x5a\x57\x35\x7a\132\123\102\107\x61\x57\x78\x6c\111\107\x31\x70\143\63\x4e\x70\142\155\143\x67\132\156\x4a\166\x62\x53\102\x30\141\x47\x55\x67\x63\107\x78\x31\132\x32\x6c\x75\x4c\x67\75\75");
    wp_die($y1);
    M1:
    if (strpos($cz, $Hk) !== false) {
        goto ic;
    }
    $e9 = new Customersaml();
    $Ej = get_option("\155\x6f\x5f\163\x61\x6d\x6c\137\x63\x75\163\x74\x6f\x6d\145\162\137\x74\x6f\x6b\145\x6e");
    $l4 = AESEncryption::decrypt_data(get_option("\x73\155\x6c\x5f\154\153"), $Ej);
    $mw = $e9->mo_saml_vl($l4, false);
    if ($mw) {
        goto N_;
    }
    return;
    N_:
    $mw = json_decode($mw, true);
    if (isset($mw["\163\x74\141\164\x75\x73"]) and strcasecmp($mw["\x73\164\141\x74\x75\163"], "\x53\x55\x43\103\105\123\123") == 0) {
        goto uC;
    }
    $Vq = base64_decode("\x53\127\65\62\x59\127\x78\160\x5a\103\102\115\141\127\116\x6c\142\x6e\116\154\x49\105\132\x76\x64\x57\65\x6b\x4c\151\102\121\x62\x47\x56\x68\x63\x32\125\147\131\62\x39\165\x64\x47\x46\152\144\103\x42\65\142\x33\126\x79\x49\107\x46\x6b\x62\127\154\165\141\x58\116\x30\143\155\106\60\142\63\x49\x67\x64\x47\x38\x67\144\130\x4e\154\111\110\x52\157\132\123\102\152\x62\x33\112\x79\132\x57\x4e\x30\111\107\170\x70\131\62\x56\x75\143\62\125\x75\x49\x45\132\166\143\x69\102\x74\142\x33\x4a\154\x49\x47\122\154\144\107\x46\x70\x62\x48\115\x73\x49\110\x42\171\x62\63\x5a\160\132\x47\125\147\x64\107\x68\x6c\111\106\x4a\x6c\132\155\126\171\x5a\127\x35\x6a\x5a\123\x42\112\122\x44\157\147\x54\125\70\171\x4e\x44\x49\64\x4d\x54\101\171\115\124\x63\167\116\123\102\60\x62\171\x42\65\x62\x33\126\171\111\107\106\x6b\x62\x57\x6c\165\141\x58\x4e\60\x63\x6d\106\60\x62\63\x49\147\144\x47\70\x67\x59\x32\150\x6c\131\62\x73\147\141\x58\x51\x67\x64\127\65\x6b\132\x58\111\147\x53\107\x56\x73\x63\103\101\x6d\x49\x45\132\102\x55\123\102\60\x59\127\111\147\141\x57\x34\x67\x64\107\x68\154\111\110\102\x73\x64\127\x64\160\x62\x69\x34\75");
    $Vq = str_replace("\110\x65\x6c\160\x20\46\x20\106\x41\121\40\164\x61\142\40\151\156", "\x46\101\121\x73\40\163\x65\143\164\x69\157\x6e\x20\x6f\x66", $Vq);
    $pQ = base64_decode("\122\130\112\x79\142\63\x49\x36\111\x45\x6c\165\144\155\106\x73\141\127\x51\147\x54\x47\154\x6a\x5a\x57\65\172\x5a\121\x3d\x3d");
    wp_die($Vq, $pQ);
    goto DA;
    uC:
    $ij = plugin_dir_path(__FILE__);
    $cq = home_url();
    $cq = trim($cq, "\x2f");
    if (preg_match("\43\136\x68\x74\x74\160\x28\x73\51\x3f\72\x2f\x2f\x23", $cq)) {
        goto Yr;
    }
    $cq = "\150\164\x74\160\x3a\x2f\57" . $cq;
    Yr:
    $kP = parse_url($cq);
    $Fa = preg_replace("\57\136\x77\167\x77\x5c\56\57", '', $kP["\x68\157\x73\x74"]);
    $dk = wp_upload_dir();
    $CX = $Fa . "\x2d" . $dk["\x62\x61\163\x65\x64\151\162"];
    $Hk = hash_hmac("\163\x68\141\62\x35\66", $CX, "\x34\x44\110\146\152\x67\x66\x6a\141\x73\x6e\x64\x66\163\x61\152\x66\110\107\x4a");
    $xN = djkasjdksa();
    $cp = round(strlen($xN) / rand(2, 20));
    $xN = substr_replace($xN, $Hk, $cp, 0);
    $J5 = base64_decode($xN);
    if (is_writable($ij . "\x6c\151\x63\x65\156\163\x65")) {
        goto fY;
    }
    $xN = str_rot13($xN);
    $ON = base64_decode("\x62\107\116\x6b\141\x6d\x74\150\x63\62\160\x6b\141\63\116\150\131\62\167\75");
    update_option($ON, $xN);
    goto k_;
    fY:
    file_put_contents($ij . "\x6c\151\143\145\156\163\x65", $J5);
    k_:
    return true;
    DA:
    goto yM;
    ic:
    return true;
    yM:
}
function djkasjdksa()
{
    $RI = "\41\176\100\x23\44\x25\136\46\52\x28\51\x5f\x2b\x7c\173\175\74\x3e\x3f\60\x31\62\x33\64\65\x36\67\70\x39\141\x62\x63\144\145\x66\x67\150\151\152\x6b\154\155\156\x6f\x70\x71\x72\163\x74\165\166\167\x78\x79\172\x41\x42\x43\104\x45\106\x47\110\111\112\113\114\x4d\x4e\117\x50\x51\x52\123\x54\x55\126\127\x58\131\132";
    $qJ = strlen($RI);
    $Wc = '';
    $Eh = 0;
    IJ:
    if (!($Eh < 10000)) {
        goto Wb;
    }
    $Wc .= $RI[rand(0, $qJ - 1)];
    st:
    $Eh++;
    goto IJ;
    Wb:
    return $Wc;
}
function mo_saml_show_SAML_log($v0, $dQ)
{
    header("\x43\157\156\x74\x65\156\164\55\x54\171\160\145\72\40\164\145\170\164\57\x68\x74\x6d\154");
    $rq = new DOMDocument();
    $rq->preserveWhiteSpace = false;
    $rq->formatOutput = true;
    $rq->loadXML($v0);
    if ($dQ == "\x64\151\163\x70\x6c\x61\171\x53\x41\115\x4c\x52\x65\x71\x75\145\163\164") {
        goto WT;
    }
    $Hd = "\123\101\115\114\x20\x52\145\x73\x70\x6f\x6e\163\145";
    goto Ld;
    WT:
    $Hd = "\x53\101\115\x4c\x20\122\x65\x71\165\x65\163\164";
    Ld:
    $NR = $rq->saveXML();
    $bZ = htmlentities($NR);
    $bZ = rtrim($bZ);
    $DG = simplexml_load_string($NR);
    $mB = json_encode($DG);
    $gc = json_decode($mB);
    $xz = plugins_url("\x69\x6e\143\154\x75\x64\x65\163\57\143\163\x73\57\x73\x74\171\x6c\145\137\163\145\164\x74\151\x6e\x67\163\x2e\x63\x73\x73\x3f\166\x65\162\75\64\x2e\x38\56\64\60", __FILE__);
    echo "\x3c\x6c\151\x6e\153\40\162\x65\154\x3d\x27\163\x74\x79\x6c\145\163\150\145\x65\x74\x27\40\x69\144\x3d\47\155\157\x5f\163\141\155\154\x5f\141\x64\155\x69\156\x5f\x73\145\164\x74\151\156\x67\x73\137\163\164\x79\154\x65\55\x63\163\x73\x27\40\x20\x68\162\145\146\x3d\x27" . $xz . "\x27\x20\x74\171\160\145\x3d\x27\164\145\x78\164\x2f\x63\163\163\47\x20\x6d\145\144\x69\x61\x3d\47\141\154\x6c\47\40\x2f\76\xd\xa\x20\x20\40\40\x20\40\x20\40\40\x20\40\x20\xd\xa\11\x9\11\74\x64\151\166\x20\x63\154\141\x73\x73\x3d\x22\155\157\x2d\x64\x69\163\160\x6c\x61\x79\x2d\x6c\157\147\x73\x22\40\x3e\x3c\160\40\x74\171\x70\x65\75\42\x74\145\x78\x74\x22\40\x20\40\x69\x64\x3d\42\x53\x41\115\114\x5f\164\171\x70\145\42\x3e" . $Hd . "\74\x2f\x70\76\74\x2f\144\151\166\76\xd\12\11\11\x9\x9\xd\12\11\x9\11\x3c\x64\x69\x76\40\x74\x79\x70\x65\75\x22\x74\145\170\x74\42\40\x69\x64\x3d\42\123\101\x4d\114\137\x64\x69\163\x70\154\141\171\42\40\143\154\x61\x73\163\x3d\x22\155\157\55\x64\151\x73\x70\154\x61\171\x2d\142\x6c\157\143\x6b\42\x3e\74\x70\x72\145\x20\x63\154\141\x73\x73\x3d\47\142\x72\x75\163\150\x3a\x20\x78\155\x6c\73\47\x3e" . $bZ . "\74\57\160\x72\145\x3e\x3c\57\x64\x69\166\x3e\15\12\x9\11\11\74\x62\162\76\xd\12\x9\11\x9\74\x64\x69\x76\x9\40\x73\x74\171\x6c\145\75\x22\x6d\x61\x72\x67\151\156\x3a\x33\x25\x3b\144\x69\163\x70\154\141\171\x3a\142\x6c\157\x63\153\73\164\145\170\164\55\141\154\151\147\x6e\x3a\143\x65\156\x74\145\162\x3b\42\x3e\xd\12\40\x20\40\x20\x20\40\x20\40\x20\40\x20\40\xd\12\11\x9\x9\74\144\x69\x76\40\163\x74\x79\x6c\145\x3d\x22\155\141\x72\147\x69\156\x3a\x33\x25\73\x64\151\163\160\x6c\141\x79\x3a\x62\154\157\143\153\73\164\145\170\x74\x2d\141\154\x69\x67\156\x3a\x63\x65\x6e\164\145\x72\73\42\x20\76\xd\xa\x9\xd\12\40\40\x20\40\40\x20\x20\x20\x20\40\40\40\74\57\144\x69\166\x3e\xd\12\11\11\x9\x3c\142\165\x74\164\x6f\156\40\151\144\x3d\x22\x63\157\160\x79\x22\40\x6f\156\143\x6c\x69\x63\x6b\75\42\x63\x6f\160\x79\x44\151\x76\x54\x6f\x43\x6c\151\160\142\157\x61\x72\x64\50\x29\42\x20\40\163\164\171\x6c\x65\x3d\42\x70\141\x64\x64\x69\156\x67\72\x31\x25\x3b\x77\x69\144\164\x68\72\61\60\x30\x70\x78\73\142\141\x63\153\x67\x72\157\165\156\144\72\40\43\60\x30\x39\x31\103\104\40\x6e\x6f\156\145\x20\x72\145\160\145\141\x74\40\x73\143\x72\157\x6c\x6c\x20\60\45\x20\60\x25\x3b\143\x75\x72\163\157\162\72\x20\160\x6f\x69\x6e\x74\x65\x72\x3b\x66\157\x6e\x74\x2d\163\x69\172\x65\x3a\x31\65\160\x78\x3b\x62\157\162\144\145\162\55\167\151\144\x74\x68\72\40\x31\160\x78\x3b\142\x6f\x72\x64\145\162\55\163\x74\171\x6c\145\x3a\40\x73\157\x6c\151\x64\73\x62\x6f\x72\144\145\162\55\162\x61\x64\x69\165\163\x3a\40\x33\160\170\x3b\167\150\151\x74\x65\55\163\160\x61\x63\x65\72\x20\x6e\157\167\x72\x61\160\x3b\142\157\170\55\163\x69\172\x69\156\x67\72\x20\142\157\162\x64\145\x72\x2d\142\x6f\170\x3b\x62\x6f\162\144\145\x72\x2d\x63\x6f\154\x6f\162\72\x20\43\x30\60\67\63\x41\x41\73\142\x6f\170\x2d\x73\150\141\144\x6f\167\72\x20\60\160\170\40\61\x70\170\x20\x30\x70\x78\40\x72\x67\x62\x61\50\61\62\60\x2c\40\62\x30\x30\x2c\x20\x32\63\x30\x2c\40\60\x2e\x36\x29\x20\151\156\x73\x65\164\x3b\x63\157\x6c\157\162\72\40\43\x46\x46\x46\73\42\40\x3e\x43\157\160\171\74\x2f\x62\x75\x74\164\x6f\x6e\76\15\12\11\11\x9\x26\156\x62\163\x70\x3b\15\xa\40\x20\40\x20\40\40\x20\40\40\40\40\40\x20\40\x20\x3c\x69\156\x70\165\x74\40\x69\x64\75\x22\144\167\156\x2d\142\164\156\x22\40\163\x74\171\x6c\145\75\42\160\x61\144\144\x69\x6e\147\x3a\61\45\x3b\x77\x69\144\x74\x68\72\61\x30\60\x70\x78\x3b\x62\141\x63\153\147\162\157\x75\x6e\144\72\40\43\x30\x30\x39\61\103\104\40\156\x6f\156\x65\40\x72\145\160\145\141\x74\x20\163\143\162\x6f\x6c\x6c\40\x30\x25\40\60\x25\73\143\165\162\x73\157\x72\x3a\40\x70\157\151\156\x74\x65\x72\x3b\146\157\156\164\x2d\163\x69\172\145\x3a\61\65\x70\170\73\x62\157\162\144\145\x72\55\167\151\x64\x74\x68\72\x20\61\160\170\x3b\x62\157\x72\x64\145\162\55\x73\164\171\154\145\72\40\163\157\x6c\x69\x64\73\142\x6f\162\144\x65\162\x2d\x72\141\144\151\x75\x73\x3a\40\63\160\x78\73\167\150\x69\164\x65\x2d\x73\x70\141\x63\145\72\40\156\x6f\x77\162\x61\160\73\142\x6f\170\x2d\x73\x69\172\x69\x6e\147\72\40\142\157\162\144\145\162\55\142\157\x78\73\142\157\162\x64\145\x72\x2d\143\157\x6c\x6f\x72\x3a\x20\x23\x30\x30\67\x33\x41\x41\73\x62\x6f\170\55\163\x68\141\144\157\167\72\x20\60\160\170\x20\x31\x70\170\40\x30\160\x78\x20\162\x67\142\x61\50\x31\x32\60\54\x20\62\60\x30\54\40\62\63\60\54\x20\x30\x2e\66\51\x20\x69\x6e\163\145\164\x3b\x63\x6f\154\x6f\x72\x3a\x20\x23\x46\106\106\x3b\42\164\171\160\x65\x3d\x22\142\165\164\164\x6f\x6e\x22\x20\x76\141\154\165\145\x3d\x22\x44\157\167\x6e\154\157\x61\x64\x22\x20\15\xa\x20\40\40\40\40\x20\40\40\x20\40\40\40\40\x20\40\42\x3e\xd\12\11\11\x9\x3c\57\144\x69\166\x3e\15\12\11\x9\11\x3c\57\x64\x69\166\76\xd\12\11\11\11\xd\xa\x9\x9\xd\12\x9\11\11";
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
function mo_saml_checkMapping($S_, $cL, $vq)
{
    try {
        $s0 = get_option("\x73\x61\155\154\x5f\141\155\137\145\155\x61\x69\154");
        $FU = get_option("\163\x61\x6d\x6c\137\x61\x6d\137\x75\163\145\x72\x6e\141\155\x65");
        $Nn = get_option("\163\141\155\154\x5f\x61\x6d\137\x66\x69\x72\163\x74\137\156\141\155\x65");
        $yZ = get_option("\x73\x61\x6d\x6c\x5f\x61\x6d\137\154\141\163\164\x5f\156\141\155\x65");
        $YX = get_option("\163\x61\x6d\154\x5f\x61\155\137\147\162\x6f\165\160\137\x6e\x61\155\145");
        $UL = get_option("\x73\141\155\x6c\137\x61\x6d\x5f\144\145\146\141\x75\154\164\x5f\x75\163\145\162\x5f\162\157\x6c\x65");
        $GZ = get_option("\163\141\155\x6c\137\x61\155\x5f\x64\x6f\x6e\x74\x5f\141\154\x6c\157\167\x5f\165\x6e\154\151\x73\x74\x65\144\x5f\165\163\x65\162\137\162\x6f\x6c\145");
        $vQ = get_option("\x73\141\x6d\x6c\137\x61\x6d\137\x61\143\143\x6f\x75\156\x74\x5f\x6d\x61\x74\143\150\x65\162");
        $fa = '';
        $IE = '';
        if (empty($S_)) {
            goto O0;
        }
        if (!empty($Nn) && array_key_exists($Nn, $S_)) {
            goto DT;
        }
        $Nn = '';
        goto fx;
        DT:
        $Nn = $S_[$Nn][0];
        fx:
        if (!empty($yZ) && array_key_exists($yZ, $S_)) {
            goto ke;
        }
        $yZ = '';
        goto vK;
        ke:
        $yZ = $S_[$yZ][0];
        vK:
        if (!empty($FU) && array_key_exists($FU, $S_)) {
            goto dR;
        }
        $IE = $S_["\x4e\141\155\145\111\104"][0];
        goto xj;
        dR:
        $IE = $S_[$FU][0];
        xj:
        if (!empty($s0) && array_key_exists($s0, $S_)) {
            goto xO;
        }
        $fa = $S_["\x4e\x61\x6d\x65\x49\x44"][0];
        goto fz;
        xO:
        $fa = $S_[$s0][0];
        fz:
        if (!empty($YX) && array_key_exists($YX, $S_)) {
            goto YO;
        }
        $YX = array();
        goto kq;
        YO:
        $YX = $S_[$YX];
        kq:
        if (!empty($vQ)) {
            goto CZ;
        }
        $vQ = "\x65\x6d\141\151\x6c";
        CZ:
        O0:
        if ($cL == "\164\x65\163\164\126\141\x6c\x69\144\141\164\x65") {
            goto GY;
        }
        if ($cL == "\164\145\163\x74\x4e\x65\167\103\145\x72\x74\151\146\151\x63\141\164\x65") {
            goto ao;
        }
        mo_saml_login_user($fa, $Nn, $yZ, $IE, $YX, $GZ, $UL, $cL, $vQ, $vq, $S_["\116\141\x6d\x65\111\104"][0], $S_);
        goto rQ;
        GY:
        update_option("\x6d\x6f\x5f\x73\141\x6d\154\137\164\x65\163\x74", "\124\x65\x73\164\40\163\165\143\x63\x65\x73\x73\x66\165\x6c");
        mo_saml_show_test_result($Nn, $yZ, $fa, $YX, $S_, $cL);
        goto rQ;
        ao:
        update_option("\x6d\157\137\163\x61\x6d\x6c\x5f\164\145\163\164\x5f\x6e\x65\x77\x5f\143\145\162\164", "\124\x65\x73\x74\x20\163\x75\143\143\145\163\163\x66\165\x6c");
        mo_saml_show_test_result($Nn, $yZ, $fa, $YX, $S_, $cL);
        rQ:
    } catch (Exception $L2) {
        echo sprintf("\x41\x6e\x20\145\x72\162\x6f\x72\x20\x6f\143\x63\165\162\x72\x65\x64\x20\167\x68\x69\x6c\x65\x20\x70\x72\x6f\143\x65\x73\163\151\x6e\147\x20\x74\150\x65\x20\123\x41\x4d\114\x20\122\x65\163\160\157\156\163\145\56");
        die;
    }
}
function mo_saml_show_test_result($Nn, $yZ, $fa, $YX, $S_, $cL)
{
    echo "\74\x64\x69\166\40\x73\x74\x79\154\145\x3d\x22\x66\157\x6e\164\x2d\146\x61\x6d\x69\154\x79\72\103\141\154\x69\142\x72\x69\x3b\x70\141\144\x64\x69\x6e\147\72\x30\40\x33\x25\x3b\x22\x3e";
    if (!empty($fa)) {
        goto NL;
    }
    echo "\74\144\x69\x76\40\x73\x74\x79\154\x65\75\x22\143\x6f\154\x6f\162\x3a\x20\43\141\x39\64\64\64\62\73\142\141\x63\153\147\x72\157\165\156\144\x2d\x63\x6f\x6c\157\x72\x3a\40\43\x66\62\144\145\144\x65\73\160\x61\x64\x64\151\x6e\147\72\x20\x31\65\160\x78\x3b\x6d\x61\x72\147\x69\x6e\x2d\x62\x6f\x74\x74\x6f\x6d\x3a\40\x32\x30\x70\170\73\164\x65\170\x74\55\x61\154\x69\147\x6e\x3a\143\145\156\x74\145\x72\73\x62\x6f\162\144\x65\x72\72\x31\160\170\40\x73\x6f\154\x69\x64\x20\x23\105\66\102\x33\102\x32\73\x66\157\x6e\x74\55\163\x69\x7a\x65\72\61\x38\160\164\x3b\42\x3e\x54\x45\x53\124\40\x46\x41\111\x4c\105\104\74\57\x64\151\x76\76\15\12\x9\11\11\x9\x3c\x64\x69\166\x20\163\164\x79\154\145\x3d\42\143\157\154\157\x72\x3a\40\43\141\x39\x34\64\x34\62\x3b\x66\157\x6e\164\x2d\163\151\172\x65\x3a\61\x34\x70\164\73\40\155\141\162\147\x69\x6e\x2d\x62\x6f\x74\x74\x6f\155\x3a\x32\x30\x70\x78\x3b\x22\76\127\x41\122\x4e\111\116\x47\x3a\x20\123\157\x6d\145\x20\x41\164\x74\x72\x69\142\165\164\145\x73\40\104\x69\144\40\x4e\x6f\164\40\x4d\x61\164\143\150\56\74\x2f\x64\x69\x76\x3e\xd\12\11\11\11\11\x3c\x64\151\x76\40\x73\164\171\x6c\x65\x3d\x22\x64\x69\163\160\154\x61\171\x3a\142\x6c\157\x63\153\73\x74\145\170\x74\55\141\x6c\151\147\156\72\x63\145\x6e\164\145\162\x3b\155\141\x72\147\x69\x6e\x2d\x62\x6f\x74\164\x6f\155\72\x34\x25\73\x22\76\x3c\151\x6d\x67\x20\163\164\x79\154\145\75\x22\x77\151\144\x74\150\x3a\x31\x35\45\x3b\42\x73\x72\x63\75\42" . plugin_dir_url(__FILE__) . "\x69\x6d\x61\x67\145\163\x2f\x77\x72\157\x6e\x67\x2e\x70\x6e\x67\x22\76\74\57\x64\151\166\76";
    goto y1;
    NL:
    update_option("\155\157\x5f\163\141\155\154\x5f\x74\x65\163\164\x5f\x63\x6f\x6e\146\151\147\137\x61\164\x74\x72\163", $S_);
    echo "\x3c\144\x69\166\x20\163\x74\x79\x6c\145\x3d\42\143\157\x6c\x6f\162\72\x20\43\63\x63\67\66\x33\x64\73\xd\12\11\x9\11\11\x62\x61\x63\153\x67\162\157\165\x6e\144\x2d\x63\157\x6c\157\162\72\40\x23\x64\x66\x66\60\x64\70\73\x20\160\141\144\144\151\156\147\72\x32\45\73\x6d\x61\x72\x67\151\156\x2d\x62\x6f\164\x74\x6f\x6d\72\x32\x30\160\x78\x3b\164\x65\170\164\x2d\x61\154\151\x67\156\72\143\x65\x6e\x74\x65\x72\x3b\x20\142\x6f\162\x64\145\162\72\61\160\170\40\x73\x6f\154\x69\x64\40\x23\x41\105\104\x42\x39\101\x3b\40\x66\157\x6e\164\55\x73\x69\x7a\145\72\61\x38\160\x74\x3b\x22\x3e\x54\105\x53\124\40\x53\x55\103\x43\105\x53\123\x46\125\x4c\74\x2f\144\151\166\76\xd\12\x9\x9\11\x9\x3c\x64\x69\166\x20\x73\164\171\154\x65\x3d\42\x64\151\x73\x70\x6c\x61\x79\72\x62\x6c\x6f\x63\153\x3b\164\145\x78\x74\x2d\141\x6c\151\147\156\x3a\143\x65\x6e\x74\145\162\x3b\155\141\162\x67\x69\156\x2d\x62\157\x74\x74\157\x6d\72\64\45\73\x22\76\74\151\155\x67\x20\163\164\x79\x6c\145\75\x22\167\151\x64\x74\150\72\61\x35\x25\x3b\x22\x73\162\143\75\x22" . plugin_dir_url(__FILE__) . "\x69\x6d\141\x67\x65\x73\x2f\x67\x72\x65\x65\x6e\x5f\143\x68\x65\143\x6b\x2e\x70\x6e\147\42\x3e\74\x2f\144\x69\166\x3e";
    y1:
    $j9 = get_option("\155\x6f\137\163\x61\x6d\154\137\145\156\141\142\x6c\145\x5f\x64\157\155\141\x69\156\x5f\x72\145\x73\x74\x72\x69\143\164\x69\x6f\x6e\137\x6c\x6f\x67\151\x6e");
    $ac = $cL == "\x74\x65\x73\164\116\145\x77\x43\x65\162\164\151\146\x69\143\141\x74\145" ? "\144\x69\163\x70\154\x61\x79\72\156\x6f\x6e\145" : '';
    if (!$j9) {
        goto gS;
    }
    $LJ = get_option("\155\157\x5f\163\x61\x6d\154\137\x61\x6c\x6c\x6f\167\x5f\144\145\156\171\137\165\x73\145\162\x5f\x77\151\x74\x68\137\x64\157\155\x61\151\x6e");
    if (!empty($LJ) && $LJ == "\144\x65\x6e\171") {
        goto V3;
    }
    $Y9 = get_option("\x73\x61\155\x6c\137\x61\x6d\137\145\155\141\151\x6c\137\144\157\155\141\151\156\x73");
    $oK = explode("\x3b", $Y9);
    $td = explode("\100", $fa);
    $Sc = array_key_exists("\61", $td) ? $td[1] : '';
    if (in_array($Sc, $oK)) {
        goto CE;
    }
    echo "\x3c\160\40\163\x74\x79\154\x65\75\42\x63\x6f\154\x6f\x72\72\162\x65\x64\73\x22\x3e\x54\x68\151\163\x20\x75\x73\145\x72\40\167\x69\154\x6c\x20\x6e\x6f\x74\40\142\145\x20\x61\x6c\154\157\x77\145\x64\40\x74\x6f\x20\154\x6f\147\x69\x6e\40\141\163\x20\x74\150\x65\40\x64\157\x6d\x61\151\156\x20\x6f\146\x20\164\150\x65\x20\x65\155\x61\151\x6c\40\151\163\x20\x6e\x6f\164\40\x69\x6e\x63\x6c\x75\144\145\144\40\151\156\x20\164\150\145\40\141\154\x6c\x6f\167\x65\x64\40\x6c\x69\163\164\x20\157\146\40\x44\157\155\141\151\156\x20\122\145\x73\164\162\x69\x63\x74\151\x6f\x6e\x2e\x3c\x2f\160\x3e";
    CE:
    goto cX;
    V3:
    $Y9 = get_option("\163\x61\x6d\x6c\x5f\141\x6d\x5f\145\x6d\x61\x69\154\137\144\157\155\141\x69\156\x73");
    $oK = explode("\x3b", $Y9);
    $td = explode("\100", $fa);
    $Sc = array_key_exists("\61", $td) ? $td[1] : '';
    if (!in_array($Sc, $oK)) {
        goto V0;
    }
    echo "\x3c\160\40\163\x74\x79\x6c\145\x3d\42\143\157\x6c\x6f\162\x3a\162\145\x64\73\x22\x3e\124\x68\151\163\x20\165\x73\145\162\x20\x77\x69\x6c\x6c\40\x6e\x6f\164\x20\x62\145\x20\x61\154\154\x6f\167\x65\144\40\164\157\x20\154\157\147\151\x6e\x20\x61\163\x20\164\150\x65\x20\x64\157\155\141\151\x6e\x20\157\146\40\164\x68\x65\40\145\155\x61\151\x6c\x20\151\x73\x20\x69\156\x63\154\x75\144\145\x64\40\x69\156\40\164\x68\x65\x20\x64\145\156\x69\145\144\x20\x6c\x69\163\x74\40\157\146\40\x44\x6f\x6d\141\151\x6e\40\122\x65\163\x74\x72\x69\x63\x74\x69\x6f\156\x2e\74\57\x70\76";
    V0:
    cX:
    gS:
    $G1 = get_option("\x73\x61\155\154\137\x61\x6d\x5f\x75\163\145\x72\156\x61\155\145");
    if (!(!empty($G1) && array_key_exists($G1, $S_))) {
        goto s1;
    }
    $Dd = $S_[$G1][0];
    if (!(strlen($Dd) > 60)) {
        goto e2;
    }
    echo "\74\x70\x20\163\164\171\x6c\x65\75\x22\x63\x6f\154\x6f\162\72\x72\x65\144\x3b\x22\76\116\x4f\x54\x45\40\x3a\x20\124\x68\151\x73\40\165\163\145\x72\x20\x77\151\x6c\154\x20\x6e\157\x74\40\142\145\40\x61\142\154\x65\x20\164\x6f\x20\x6c\157\x67\x69\156\40\x61\163\40\164\150\145\40\x75\163\x65\162\156\x61\x6d\145\x20\166\x61\154\x75\x65\x20\x69\163\40\155\x6f\162\x65\40\x74\150\x61\156\x20\66\60\x20\143\150\141\x72\x61\x63\164\145\x72\x73\40\154\157\x6e\147\x2e\74\142\162\57\76\15\xa\x9\11\x9\x50\x6c\145\141\163\145\x20\164\x72\171\x20\x63\150\x61\156\x67\151\x6e\147\40\164\x68\145\40\x6d\141\x70\160\151\156\x67\40\x6f\x66\40\125\163\145\162\x6e\141\155\x65\x20\x66\151\145\154\x64\40\x69\x6e\40\74\x61\x20\150\x72\145\146\75\x22\43\x22\40\157\x6e\103\154\151\143\153\75\x22\x63\x6c\x6f\163\145\x5f\x61\156\x64\x5f\x72\145\x64\x69\x72\145\x63\164\x28\51\x3b\42\76\x41\x74\x74\x72\x69\142\x75\x74\x65\57\122\x6f\154\x65\40\115\141\x70\160\x69\x6e\x67\x3c\x2f\141\76\x20\x74\141\142\56\74\x2f\x70\x3e";
    e2:
    s1:
    echo "\74\x73\160\141\x6e\40\x73\164\171\154\145\75\42\x66\157\x6e\164\x2d\163\x69\x7a\x65\72\61\64\160\164\x3b\42\x3e\x3c\142\76\x48\145\x6c\154\x6f\x3c\57\x62\76\54\40" . $fa . "\74\57\163\160\x61\x6e\76\74\x62\162\x2f\x3e\x3c\160\40\163\x74\171\154\145\75\42\x66\x6f\156\x74\x2d\167\145\151\x67\x68\x74\x3a\142\x6f\154\x64\x3b\x66\x6f\156\x74\55\163\151\172\145\72\x31\64\160\x74\73\x6d\x61\x72\x67\x69\156\55\154\x65\x66\164\72\x31\45\73\42\x3e\101\x54\124\x52\111\102\125\x54\x45\123\40\122\105\103\x45\x49\x56\105\104\x3a\x3c\57\160\76\15\xa\x9\11\11\11\74\x74\x61\142\x6c\x65\40\x73\164\171\x6c\145\x3d\x22\142\157\x72\144\145\x72\55\143\x6f\x6c\154\141\160\x73\x65\72\x63\x6f\x6c\154\141\x70\163\x65\73\142\x6f\162\144\145\x72\x2d\x73\x70\x61\x63\x69\156\x67\x3a\60\x3b\40\x64\151\163\x70\x6c\x61\x79\x3a\164\141\x62\154\145\73\x77\151\144\164\x68\72\x31\60\60\x25\73\40\x66\x6f\156\164\x2d\x73\151\172\x65\x3a\61\x34\x70\x74\x3b\x62\x61\143\153\147\162\157\x75\x6e\144\x2d\x63\x6f\x6c\x6f\162\x3a\43\105\104\105\104\105\104\73\42\x3e\15\12\x9\x9\x9\x9\x3c\x74\x72\x20\x73\x74\x79\x6c\x65\75\x22\x74\x65\170\164\x2d\x61\154\x69\x67\156\72\143\145\x6e\164\x65\162\73\42\76\74\164\x64\40\x73\x74\171\x6c\x65\75\42\x66\157\x6e\x74\x2d\x77\x65\x69\x67\150\164\x3a\142\157\x6c\144\x3b\142\157\162\x64\145\x72\72\x32\x70\170\40\x73\x6f\x6c\151\144\x20\x23\x39\64\71\x30\71\x30\73\160\141\x64\x64\x69\x6e\147\72\62\x25\x3b\x22\76\x41\124\x54\x52\111\x42\x55\124\105\x20\116\x41\115\105\74\x2f\x74\x64\x3e\x3c\x74\x64\x20\x73\x74\x79\154\x65\x3d\42\x66\x6f\x6e\164\x2d\x77\x65\x69\x67\150\164\72\x62\x6f\x6c\x64\73\x70\x61\x64\x64\151\x6e\147\x3a\x32\45\73\142\157\162\x64\x65\x72\72\62\x70\x78\x20\163\157\x6c\151\144\40\x23\71\x34\x39\60\71\60\x3b\40\167\157\162\x64\55\167\162\x61\160\72\142\162\145\141\153\x2d\x77\x6f\162\144\73\42\x3e\x41\124\124\x52\x49\x42\125\124\x45\40\x56\x41\x4c\125\105\74\57\164\x64\76\74\x2f\164\x72\x3e";
    if (!empty($S_)) {
        goto ZH;
    }
    echo "\116\157\40\101\164\164\162\x69\x62\165\164\x65\163\40\122\145\x63\145\x69\166\145\x64\56";
    goto DV;
    ZH:
    foreach ($S_ as $Ej => $j1) {
        echo "\x3c\x74\162\x3e\x3c\x74\144\x20\x73\x74\x79\154\x65\75\47\x66\157\156\x74\x2d\167\x65\151\x67\150\x74\x3a\x62\x6f\x6c\x64\x3b\x62\157\162\x64\145\x72\72\62\x70\170\40\x73\157\x6c\151\x64\x20\43\71\x34\x39\60\71\x30\73\x70\x61\144\x64\x69\156\147\72\x32\x25\73\47\x3e" . $Ej . "\x3c\x2f\x74\144\76\74\x74\x64\x20\163\164\171\154\x65\75\47\x70\x61\144\144\151\x6e\147\x3a\x32\45\73\142\x6f\x72\144\x65\162\x3a\x32\x70\170\x20\x73\157\154\x69\x64\x20\x23\x39\x34\71\x30\x39\x30\x3b\40\167\157\x72\x64\55\167\x72\141\x70\x3a\142\162\145\x61\x6b\55\167\x6f\162\144\73\47\76" . implode("\x3c\x68\162\57\x3e", $j1) . "\74\x2f\164\144\76\74\x2f\x74\162\76";
        Q5:
    }
    xp:
    DV:
    echo "\74\57\x74\x61\x62\154\x65\x3e\x3c\57\144\151\x76\76";
    echo "\74\144\x69\166\x20\163\x74\171\154\145\75\x22\x6d\141\162\147\x69\156\72\63\x25\73\144\151\x73\160\154\x61\x79\x3a\142\x6c\x6f\x63\153\73\x74\x65\x78\164\x2d\141\154\151\x67\x6e\x3a\143\x65\x6e\164\x65\162\x3b\42\76\xd\xa\x9\11\x3c\151\156\x70\165\164\x20\x73\164\x79\x6c\x65\75\x22\160\141\144\x64\151\x6e\x67\72\x31\45\73\x77\151\144\164\x68\x3a\x32\x35\x30\x70\170\73\142\x61\x63\153\x67\x72\157\165\x6e\x64\x3a\x20\x23\x30\x30\71\61\103\104\x20\156\x6f\156\x65\40\162\145\160\x65\141\164\x20\x73\x63\x72\x6f\154\x6c\x20\60\45\40\60\45\x3b\15\12\x9\11\143\x75\162\163\157\x72\72\40\160\x6f\x69\156\x74\x65\162\x3b\146\x6f\156\x74\55\x73\x69\x7a\x65\x3a\x31\65\x70\170\73\142\157\162\144\x65\162\x2d\167\151\x64\164\x68\x3a\x20\61\160\170\73\142\x6f\x72\x64\145\x72\55\163\x74\171\x6c\x65\x3a\x20\163\157\154\x69\x64\73\x62\157\162\x64\x65\162\55\x72\x61\x64\151\165\163\72\40\x33\160\x78\73\x77\150\x69\164\x65\x2d\x73\160\x61\143\x65\x3a\xd\12\x9\11\x20\156\x6f\167\162\x61\x70\x3b\x62\x6f\x78\55\163\151\172\151\x6e\x67\72\40\142\x6f\162\x64\x65\x72\55\x62\x6f\x78\73\142\157\x72\144\145\162\55\143\x6f\154\157\x72\x3a\x20\43\60\x30\67\63\101\101\x3b\x62\x6f\x78\55\163\150\x61\x64\157\167\72\40\60\160\x78\x20\x31\160\170\40\x30\160\x78\40\x72\x67\x62\x61\x28\x31\62\60\54\40\x32\x30\x30\54\x20\x32\x33\60\x2c\40\60\56\x36\51\x20\151\x6e\x73\145\164\73\143\x6f\x6c\157\162\72\x20\43\x46\106\106\x3b" . $ac . "\x22\15\xa\x20\40\x20\x20\40\40\x20\x20\40\x20\x20\x20\x74\171\x70\x65\x3d\42\142\165\x74\164\157\156\42\x20\x76\141\154\x75\145\75\x22\x43\157\x6e\146\x69\x67\165\x72\x65\40\101\164\x74\x72\x69\x62\165\164\145\x2f\x52\x6f\154\145\x20\x4d\x61\x70\x70\x69\156\147\42\x20\157\x6e\103\154\151\x63\x6b\x3d\x22\x63\154\157\163\x65\137\141\x6e\x64\137\x72\145\x64\x69\x72\x65\x63\164\x28\x29\x3b\42\76\x20\x26\156\142\x73\160\x3b\x20\15\xa\x20\x20\40\40\x20\40\40\40\40\40\x20\40\xd\12\11\11\74\151\x6e\x70\165\164\40\x73\164\x79\x6c\x65\x3d\x22\160\141\144\144\151\x6e\x67\x3a\x31\45\x3b\167\x69\144\x74\150\72\x31\x30\60\160\x78\x3b\x62\141\x63\153\147\162\x6f\x75\156\144\x3a\x20\43\x30\60\71\61\103\104\40\156\x6f\x6e\x65\40\x72\145\x70\x65\x61\x74\x20\x73\143\x72\157\154\154\40\60\x25\40\x30\45\x3b\143\165\x72\163\x6f\162\x3a\x20\x70\157\x69\x6e\164\x65\x72\x3b\x66\157\156\x74\x2d\x73\151\x7a\x65\x3a\61\65\160\x78\x3b\142\x6f\162\x64\x65\162\x2d\167\151\x64\x74\150\x3a\x20\x31\x70\x78\73\x62\x6f\x72\x64\x65\x72\55\163\164\x79\x6c\145\x3a\x20\x73\x6f\x6c\151\144\73\x62\x6f\x72\x64\145\x72\x2d\x72\141\x64\x69\x75\163\x3a\x20\63\160\x78\x3b\x77\x68\151\164\x65\x2d\163\160\141\143\145\72\40\x6e\157\x77\x72\x61\160\x3b\x62\x6f\170\55\x73\151\172\151\x6e\x67\72\x20\x62\157\x72\x64\145\162\x2d\142\157\170\x3b\142\x6f\x72\144\145\x72\x2d\x63\157\154\x6f\x72\72\40\x23\60\60\x37\63\101\x41\73\142\x6f\x78\55\163\x68\141\144\x6f\x77\72\x20\60\x70\x78\x20\x31\x70\170\40\x30\160\x78\x20\x72\x67\142\141\50\x31\x32\x30\54\40\x32\x30\x30\54\40\62\x33\60\x2c\x20\x30\56\x36\51\40\x69\x6e\163\145\x74\x3b\x63\157\x6c\157\x72\x3a\40\x23\106\106\x46\x3b\42\x74\171\160\x65\75\x22\x62\x75\x74\164\157\x6e\x22\x20\166\x61\x6c\x75\145\x3d\x22\104\157\156\x65\42\x20\x6f\x6e\x43\154\151\143\153\75\x22\163\x65\x6c\x66\x2e\x63\x6c\x6f\163\145\50\51\x3b\42\x3e\x3c\x2f\144\x69\166\76\15\xa\11\x9\xd\xa\11\11\74\163\143\x72\x69\160\164\76\15\xa\40\40\x20\40\40\40\40\40\40\40\40\x20\40\x66\x75\x6e\143\x74\151\157\156\40\143\x6c\x6f\x73\145\137\141\x6e\144\x5f\162\145\x64\151\x72\x65\x63\164\50\51\x7b\15\12\40\40\40\40\40\x20\40\40\40\x20\40\40\x20\40\x20\x20\40\167\151\156\x64\157\167\x2e\157\160\145\x6e\x65\x72\x2e\162\x65\x64\x69\162\145\x63\x74\137\164\157\137\141\164\x74\162\151\142\x75\164\145\x5f\x6d\x61\x70\160\151\x6e\147\50\x29\x3b\xd\12\x20\x20\x20\x20\40\x20\40\x20\40\40\40\x20\40\40\40\x20\40\x73\145\154\x66\x2e\x63\154\x6f\163\145\50\x29\73\xd\xa\40\x20\x20\40\40\40\40\x20\40\x20\40\x20\x20\x7d\x20\x20\x20\xd\12\40\x20\40\40\40\x20\x20\40\x20\x20\40\40\40\x77\151\156\144\x6f\x77\x2e\x6f\x6e\x75\156\x6c\x6f\141\x64\x20\75\x20\162\x65\146\162\x65\163\150\120\141\162\x65\x6e\x74\73\15\12\x20\40\40\x20\x66\165\156\x63\x74\151\x6f\x6e\40\x72\x65\x66\162\145\x73\x68\120\x61\162\x65\x6e\164\50\51\x20\x7b\xd\xa\x20\x20\x20\x20\x20\40\x20\x20\x77\151\x6e\144\x6f\167\x2e\157\x70\x65\x6e\x65\162\x2e\154\157\x63\141\x74\x69\x6f\x6e\x2e\162\x65\x6c\x6f\x61\x64\50\x29\x3b\15\12\40\x20\x20\40\x7d\15\12\x9\11\74\57\163\143\x72\151\160\x74\76";
    die;
}
function mo_saml_convert_to_windows_iconv($KM)
{
    $UU = LicenseHelper::getCurrentOption(mo_options_enum_service_provider::Is_encoding_enabled);
    if (!($UU === '')) {
        goto Zb;
    }
    return $KM;
    Zb:
    return iconv("\125\x54\x46\x2d\x38", "\x43\x50\x31\x32\65\62\57\57\x49\107\116\117\122\x45", $KM);
}
function mo_saml_login_user($fa, $Nn, $yZ, $IE, $YX, $GZ, $UL, $cL, $vQ, $vq = '', $t0 = '', $S_ = null)
{
    do_action("\x6d\x6f\x5f\141\142\x72\137\x66\x69\x6c\164\145\162\137\154\x6f\x67\x69\156", $S_, $t0, $vq);
    check_if_user_allowed_to_login_due_to_role_restriction($YX);
    $Ca = get_option("\x6d\157\137\163\x61\155\154\x5f\x73\160\x5f\x62\x61\163\x65\137\165\162\154");
    if (!empty($Ca)) {
        goto LF;
    }
    $Ca = home_url();
    LF:
    mo_saml_restrict_users_based_on_domain($fa);
    $IE = mo_saml_sanitize_username($IE);
    if (!(strlen($IE) > 60)) {
        goto DN;
    }
    wp_die("\127\145\40\x63\157\x75\154\x64\40\x6e\x6f\164\x20\x73\151\x67\156\40\171\157\165\x20\x69\156\56\40\x50\x6c\145\x61\x73\145\x20\143\x6f\156\x74\141\x63\164\40\171\x6f\165\x72\x20\x61\x64\155\151\x6e\151\163\x74\x72\x61\x74\x6f\162\x2e", "\x45\162\162\x6f\162\40\72\x20\x55\163\x65\x72\156\141\x6d\x65\x20\154\145\156\147\164\150\x20\154\151\x6d\x69\164\x20\162\x65\141\x63\150\145\x64");
    die;
    DN:
    if (username_exists($IE) || email_exists($fa)) {
        goto yE;
    }
    $Wb = get_option("\x73\x61\155\x6c\x5f\141\155\x5f\162\x6f\154\145\137\x6d\x61\160\160\x69\x6e\x67");
    $Wb = maybe_unserialize($Wb);
    $CV = true;
    $dr = get_option("\155\x6f\x5f\163\x61\155\154\x5f\144\x6f\x6e\x74\137\x63\x72\x65\141\x74\x65\x5f\165\x73\x65\162\137\151\x66\x5f\x72\157\x6c\145\137\x6e\x6f\164\137\x6d\141\x70\160\145\144");
    if (!(!empty($dr) && strcmp($dr, "\x63\x68\145\143\x6b\145\x64") == 0)) {
        goto HG;
    }
    $QM = is_role_mapping_configured_for_user($Wb, $YX);
    $CV = $QM;
    HG:
    if ($CV === true) {
        goto aD;
    }
    $ZQ = get_option("\155\157\x5f\x73\141\155\x6c\137\x61\143\143\x6f\165\x6e\164\137\x63\x72\x65\141\x74\151\x6f\x6e\137\x64\151\163\x61\142\154\x65\144\137\155\163\147");
    if (!empty($ZQ)) {
        goto Ef;
    }
    $ZQ = "\x57\x65\x20\143\x6f\x75\x6c\x64\x20\x6e\x6f\x74\x20\x73\x69\x67\156\x20\x79\157\165\x20\x69\156\56\40\x50\x6c\145\141\x73\145\40\x63\157\x6e\164\141\x63\x74\40\x79\x6f\x75\162\40\101\144\x6d\x69\x6e\151\x73\x74\x72\x61\x74\157\x72\56";
    Ef:
    wp_die($ZQ, "\105\x72\162\157\162\72\40\x4e\157\164\x20\x61\x20\x57\157\x72\144\120\162\145\x73\x73\40\x4d\145\155\142\x65\162");
    die;
    goto bk;
    aD:
    $XE = wp_generate_password(10, false);
    if (!empty($IE)) {
        goto vJ;
    }
    $vj = wp_create_user($fa, $XE, $fa);
    goto ie;
    vJ:
    $vj = wp_create_user($IE, $XE, $fa);
    ie:
    if (!is_wp_error($vj)) {
        goto aO;
    }
    wp_die($vj->get_error_message() . "\74\x62\x72\x3e\x50\x6c\145\141\x73\145\40\x63\x6f\x6e\x74\141\143\x74\40\x79\157\x75\162\40\101\x64\x6d\x69\x6e\151\163\x74\x72\141\x74\157\162\56\x3c\142\162\76\x3c\142\x3e\125\x73\x65\162\156\141\155\145\x3c\57\x62\x3e\x3a\40" . $fa, "\105\x72\162\x6f\x72\72\40\103\x6f\x75\154\x64\156\47\x74\40\143\x72\x65\x61\x74\145\x20\x75\163\x65\162");
    aO:
    $user = get_user_by("\x69\x64", $vj);
    $Hh = assign_roles_to_user($user, $Wb, $YX);
    if ($Hh !== true && !empty($GZ) && $GZ == "\x63\150\145\x63\x6b\145\144") {
        goto AH;
    }
    if ($Hh !== true && !empty($UL)) {
        goto Cp;
    }
    if ($Hh !== true) {
        goto E8;
    }
    goto At;
    AH:
    $ay = wp_update_user(array("\x49\x44" => $vj, "\162\157\154\x65" => false));
    goto At;
    Cp:
    $ay = wp_update_user(array("\x49\x44" => $vj, "\x72\x6f\154\x65" => $UL));
    goto At;
    E8:
    $UL = get_option("\x64\145\x66\x61\x75\x6c\x74\137\x72\157\x6c\145");
    $ay = wp_update_user(array("\111\104" => $vj, "\162\157\154\145" => $UL));
    At:
    mo_saml_map_attributes($user, $Nn, $yZ, $S_);
    mo_saml_set_auth_cookie($user, $vq, $t0, true);
    do_action("\x6d\157\x5f\x73\x61\155\154\137\141\164\164\x72\x69\142\x75\164\x65\163", $IE, $fa, $Nn, $yZ, $YX);
    bk:
    goto v8;
    yE:
    if (username_exists($IE)) {
        goto PA;
    }
    if (!email_exists($fa)) {
        goto z9;
    }
    $user = get_user_by("\145\155\x61\x69\154", $fa);
    $vj = $user->ID;
    z9:
    goto wj;
    PA:
    $user = get_user_by("\154\x6f\147\151\156", $IE);
    $vj = $user->ID;
    if (empty($fa)) {
        goto RV;
    }
    $ay = wp_update_user(array("\x49\x44" => $vj, "\165\x73\x65\x72\x5f\x65\x6d\141\x69\154" => $fa));
    RV:
    wj:
    mo_saml_map_attributes($user, $Nn, $yZ, $S_);
    $Wb = maybe_unserialize(get_option("\163\x61\155\x6c\137\141\x6d\137\162\x6f\x6c\145\x5f\155\141\x70\160\151\x6e\147"));
    $ts = get_option("\163\141\155\154\x5f\141\155\137\x64\x6f\x6e\x74\x5f\165\x70\x64\x61\164\145\x5f\145\170\x69\x73\x74\151\x6e\147\137\x75\x73\x65\x72\x5f\x72\x6f\x6c\x65");
    if (!(empty($ts) || $ts != "\x63\150\145\x63\x6b\145\144")) {
        goto v1;
    }
    $Hh = assign_roles_to_user($user, $Wb, $YX);
    if ($Hh !== true && !is_administrator_user($user) && !empty($GZ) && $GZ == "\143\150\x65\x63\x6b\x65\x64") {
        goto w0;
    }
    if ($Hh !== true && !is_administrator_user($user) && !empty($UL)) {
        goto DQ;
    }
    goto Vh;
    w0:
    $ay = wp_update_user(array("\x49\x44" => $vj, "\162\x6f\x6c\x65" => false));
    goto Vh;
    DQ:
    $ay = wp_update_user(array("\111\104" => $vj, "\162\157\x6c\x65" => $UL));
    Vh:
    v1:
    mo_saml_set_auth_cookie($user, $vq, $t0);
    do_action("\x6d\x6f\x5f\x73\x61\155\154\137\x61\164\164\x72\x69\142\x75\x74\145\x73", $IE, $fa, $Nn, $yZ, $YX);
    v8:
    mo_saml_post_login_redirection($cL, $Ca);
}
function mo_saml_sanitize_username($IE)
{
    $q2 = sanitize_user($IE, true);
    $uU = apply_filters("\x70\162\x65\x5f\165\x73\145\x72\x5f\154\157\x67\151\156", $q2);
    $IE = trim($uU);
    return $IE;
}
function mo_saml_restrict_users_based_on_domain($fa)
{
    $j9 = get_option("\x6d\157\x5f\163\141\155\154\137\x65\156\x61\x62\x6c\145\137\144\x6f\x6d\x61\151\156\x5f\162\x65\163\x74\x72\151\143\x74\x69\x6f\x6e\x5f\154\x6f\x67\x69\x6e");
    if (!$j9) {
        goto R0;
    }
    $Y9 = get_option("\x73\x61\x6d\x6c\137\141\x6d\137\145\x6d\x61\151\x6c\137\144\x6f\x6d\x61\x69\156\163");
    $oK = explode("\x3b", $Y9);
    $td = explode("\100", $fa);
    $Sc = array_key_exists("\x31", $td) ? $td[1] : '';
    $LJ = get_option("\x6d\x6f\137\163\x61\x6d\x6c\137\x61\x6c\x6c\157\x77\x5f\x64\145\x6e\x79\x5f\165\163\145\162\x5f\x77\151\x74\x68\x5f\144\x6f\155\x61\151\156");
    $ZQ = get_option("\155\157\x5f\x73\x61\155\154\x5f\x72\x65\x73\164\162\x69\x63\164\x65\x64\137\x64\x6f\x6d\141\151\156\x5f\x65\x72\162\x6f\x72\x5f\x6d\163\x67");
    if (!empty($ZQ)) {
        goto Ev;
    }
    $ZQ = "\131\157\x75\40\x61\162\145\x20\x6e\x6f\164\x20\141\154\154\x6f\x77\x65\144\x20\x74\157\40\x6c\157\147\x69\x6e\x2e\x20\120\154\x65\141\x73\x65\40\x63\x6f\156\164\141\x63\x74\40\x79\x6f\165\x72\x20\101\144\155\151\156\151\163\x74\x72\x61\x74\157\162\x2e";
    Ev:
    if (!empty($LJ) && $LJ == "\x64\145\156\x79") {
        goto vU;
    }
    if (in_array($Sc, $oK)) {
        goto sX;
    }
    wp_die($ZQ, "\x50\x65\x72\155\x69\163\163\151\157\156\x20\x44\145\156\151\x65\144\x20\x3a\x20\x4e\x6f\x74\x20\141\40\127\x68\151\x74\x65\154\151\x73\x74\x65\144\40\x75\x73\145\x72\x2e");
    sX:
    goto AA;
    vU:
    if (!in_array($Sc, $oK)) {
        goto A3;
    }
    wp_die($ZQ, "\120\145\x72\155\151\163\x73\x69\x6f\156\40\104\x65\x6e\151\x65\x64\x20\72\x20\102\154\x61\x63\153\154\151\163\164\x65\x64\x20\165\x73\x65\x72\56");
    A3:
    AA:
    R0:
}
function mo_saml_map_attributes($user, $Nn, $yZ, $S_)
{
    mo_saml_map_basic_attributes($user, $Nn, $yZ, $S_);
    mo_saml_map_custom_attributes($user, $S_);
}
function mo_saml_map_basic_attributes($user, $Nn, $yZ, $S_)
{
    $vj = $user->ID;
    if (empty($Nn)) {
        goto Za;
    }
    $ay = wp_update_user(array("\111\x44" => $vj, "\x66\x69\x72\163\164\x5f\x6e\x61\155\x65" => $Nn));
    Za:
    if (empty($yZ)) {
        goto Id;
    }
    $ay = wp_update_user(array("\111\104" => $vj, "\154\x61\x73\164\137\x6e\141\155\145" => $yZ));
    Id:
    if (is_null($S_)) {
        goto lw;
    }
    update_user_meta($vj, "\155\x6f\x5f\x73\141\155\x6c\137\x75\x73\145\162\x5f\141\x74\164\162\151\x62\x75\164\x65\x73", $S_);
    $hb = get_option("\x73\141\155\154\137\141\x6d\137\144\151\x73\x70\154\141\171\137\156\x61\x6d\x65");
    if (empty($hb)) {
        goto QR;
    }
    if (strcmp($hb, "\x55\123\105\122\116\101\115\x45") == 0) {
        goto MB;
    }
    if (strcmp($hb, "\106\116\x41\x4d\x45") == 0 && !empty($Nn)) {
        goto BX;
    }
    if (strcmp($hb, "\x4c\x4e\101\115\105") == 0 && !empty($yZ)) {
        goto vZ;
    }
    if (strcmp($hb, "\106\x4e\101\115\x45\x5f\114\116\x41\x4d\x45") == 0 && !empty($yZ) && !empty($Nn)) {
        goto jT;
    }
    if (!(strcmp($hb, "\114\116\101\x4d\x45\137\106\116\x41\115\105") == 0 && !empty($yZ) && !empty($Nn))) {
        goto gY;
    }
    $ay = wp_update_user(array("\111\104" => $vj, "\x64\151\x73\160\x6c\x61\171\x5f\x6e\x61\155\145" => $yZ . "\40" . $Nn));
    gY:
    goto Cf;
    jT:
    $ay = wp_update_user(array("\x49\x44" => $vj, "\144\x69\163\160\154\x61\x79\x5f\x6e\141\155\145" => $Nn . "\40" . $yZ));
    Cf:
    goto nk;
    vZ:
    $ay = wp_update_user(array("\111\x44" => $vj, "\x64\151\x73\x70\154\141\x79\137\x6e\x61\155\145" => $yZ));
    nk:
    goto i2;
    BX:
    $ay = wp_update_user(array("\x49\104" => $vj, "\144\151\x73\160\x6c\x61\171\x5f\156\141\x6d\145" => $Nn));
    i2:
    goto f6;
    MB:
    $ay = wp_update_user(array("\x49\x44" => $vj, "\x64\x69\163\x70\x6c\141\x79\x5f\156\141\155\145" => $user->user_login));
    f6:
    QR:
    lw:
}
function mo_saml_map_custom_attributes($user, $S_)
{
    $vj = $user->ID;
    if (!get_option("\155\x6f\x5f\163\x61\155\x6c\137\x63\165\163\x74\x6f\x6d\x5f\x61\164\x74\x72\163\x5f\x6d\141\x70\x70\151\x6e\147")) {
        goto ey;
    }
    $xw = maybe_unserialize(get_option("\155\157\137\x73\141\155\x6c\x5f\x63\165\163\x74\x6f\155\x5f\141\x74\x74\162\163\137\x6d\141\160\x70\x69\x6e\147"));
    foreach ($xw as $Ej => $j1) {
        if (!array_key_exists($j1, $S_)) {
            goto t8;
        }
        $Qc = false;
        if (!(count($S_[$j1]) == 1)) {
            goto gM;
        }
        $Qc = true;
        gM:
        if (!$Qc) {
            goto r0;
        }
        update_user_meta($vj, $Ej, $S_[$j1][0]);
        goto Ja;
        r0:
        $bz = array();
        foreach ($S_[$j1] as $m8) {
            array_push($bz, $m8);
            xz:
        }
        ZZ:
        update_user_meta($vj, $Ej, $bz);
        Ja:
        t8:
        yB:
    }
    ru:
    ey:
}
function mo_saml_set_auth_cookie($user, $vq, $t0, $cD = false)
{
    $vj = $user->ID;
    wp_set_current_user($vj);
    $uV = false;
    $uV = apply_filters("\x6d\x6f\137\x72\145\155\x65\155\x62\x65\162\137\x6d\x65", $uV);
    wp_set_auth_cookie($vj, $uV);
    if (!$cD) {
        goto yL;
    }
    do_action("\x75\x73\145\162\137\162\145\x67\151\x73\x74\x65\162", $vj);
    yL:
    do_action("\x77\160\137\x6c\x6f\x67\x69\156", $user->user_login, $user);
    if (empty($vq)) {
        goto UI;
    }
    update_user_meta($vj, "\155\x6f\x5f\163\x61\155\x6c\137\163\x65\163\163\151\x6f\156\137\151\x6e\x64\x65\x78", $vq);
    UI:
    if (empty($t0)) {
        goto sc;
    }
    update_user_meta($vj, "\x6d\157\x5f\163\x61\155\x6c\x5f\156\x61\155\145\x5f\151\x64", $t0);
    sc:
    if (!(!session_id() || session_id() == '' || !isset($_SESSION))) {
        goto zt;
    }
    session_start();
    zt:
    $_SESSION["\155\x6f\x5f\163\x61\x6d\x6c"]["\x6c\157\147\147\145\144\137\151\156\137\167\x69\x74\150\137\151\x64\x70"] = TRUE;
}
function mo_saml_post_login_redirection($cL, $Ca)
{
    $cL = htmlspecialchars_decode($cL);
    $C8 = get_option("\x6d\157\x5f\163\141\155\x6c\137\162\145\154\x61\x79\x5f\163\164\141\164\145");
    if (!empty($C8)) {
        goto dp;
    }
    if (empty($cL)) {
        goto rN;
    }
    $i0 = '';
    if (!get_option("\x6d\x6f\x5f\163\x61\155\154\137\x73\x65\x6e\x64\137\141\142\x73\157\154\x75\164\x65\x5f\162\x65\154\141\171\x5f\163\x74\x61\164\145")) {
        goto gT;
    }
    $wu = get_option("\x6d\157\x5f\163\x61\x6d\x6c\137\x63\x75\x73\x74\x6f\x6d\145\x72\137\164\x6f\153\x65\156");
    $i0 = AESEncryption::decrypt_data($cL, $wu);
    gT:
    if (!empty($i0)) {
        goto T8;
    }
    if (filter_var($cL, FILTER_VALIDATE_URL) === FALSE) {
        goto Q9;
    }
    if (strpos($cL, home_url()) !== false) {
        goto Ba;
    }
    $Na = htmlspecialchars_decode($Ca);
    goto U3;
    Ba:
    $Na = htmlspecialchars_decode($cL);
    U3:
    goto rl;
    T8:
    $Na = htmlspecialchars_decode($i0);
    goto rl;
    Q9:
    $Na = htmlspecialchars_decode($cL);
    rl:
    rN:
    goto wn;
    dp:
    $Na = htmlspecialchars_decode($C8);
    wn:
    if (!empty($Na)) {
        goto Gx;
    }
    $Na = htmlspecialchars_decode($Ca);
    Gx:
    wp_redirect($Na);
    die;
}
function check_if_user_allowed_to_login_due_to_role_restriction($YX)
{
    $zy = get_option("\163\x61\155\154\x5f\141\x6d\x5f\x64\x6f\x6e\x74\137\x61\x6c\154\x6f\x77\x5f\x75\163\145\162\x5f\164\x6f\x6c\x6f\x67\x69\x6e\x5f\x63\x72\x65\141\x74\145\x5f\167\151\164\x68\137\147\151\166\x65\x6e\x5f\x67\x72\x6f\165\x70\x73");
    if (!($zy == "\x63\x68\x65\x63\x6b\x65\x64")) {
        goto A6;
    }
    if (empty($YX)) {
        goto sh;
    }
    $XI = get_option("\x6d\157\x5f\x73\141\155\x6c\137\x72\145\163\164\162\x69\x63\164\x5f\x75\x73\145\x72\x73\137\167\151\x74\150\x5f\x67\162\x6f\165\160\x73");
    $yI = explode("\73", $XI);
    foreach ($yI as $mR) {
        foreach ($YX as $HA) {
            $HA = trim($HA);
            if (!(!empty($HA) && $HA == $mR)) {
                goto IA;
            }
            wp_die("\x59\x6f\165\40\141\162\x65\x20\156\157\x74\x20\x61\165\164\150\x6f\162\x69\172\145\x64\x20\x74\x6f\40\154\x6f\147\x69\156\x2e\40\120\154\x65\x61\163\145\x20\x63\157\x6e\164\141\x63\x74\x20\171\157\x75\162\x20\141\144\x6d\x69\156\x69\x73\164\x72\x61\164\x6f\x72\x2e", "\105\162\162\157\162");
            IA:
            oV:
        }
        sT:
        mm:
    }
    Is:
    sh:
    A6:
}
function assign_roles_to_user($user, $Wb, $YX)
{
    $Hh = false;
    if (!(!empty($YX) && !empty($Wb) && !is_administrator_user($user))) {
        goto RB;
    }
    $user->set_role(false);
    $ev = '';
    $xs = false;
    foreach ($Wb as $wa => $J8) {
        $yI = explode("\x3b", $J8);
        foreach ($yI as $mR) {
            foreach ($YX as $HA) {
                $HA = trim($HA);
                if (!(!empty($HA) && $HA == $mR)) {
                    goto dG;
                }
                $Hh = true;
                $user->add_role($wa);
                dG:
                gJ:
            }
            Kf:
            aH:
        }
        XT:
        B6:
    }
    Hi:
    RB:
    return $Hh;
}
function is_role_mapping_configured_for_user($Wb, $YX)
{
    if (!(!empty($YX) && !empty($Wb))) {
        goto MJ;
    }
    foreach ($Wb as $wa => $J8) {
        $yI = explode("\x3b", $J8);
        foreach ($yI as $mR) {
            foreach ($YX as $HA) {
                $HA = trim($HA);
                if (!(!empty($HA) && $HA == $mR)) {
                    goto pe;
                }
                return true;
                pe:
                Ug:
            }
            P1:
            iE:
        }
        sm:
        pJ:
    }
    FK:
    MJ:
    return false;
}
function is_administrator_user($user)
{
    $BZ = $user->roles;
    if (!is_null($BZ) && in_array("\141\144\155\151\x6e\151\163\x74\162\x61\164\157\162", $BZ, TRUE)) {
        goto d1;
    }
    return false;
    goto ck;
    d1:
    return true;
    ck:
}
function mo_saml_is_customer_registered()
{
    $dn = get_option("\155\157\x5f\x73\x61\x6d\154\137\141\x64\x6d\x69\156\137\145\x6d\141\x69\x6c");
    $Vj = get_option("\x6d\157\137\x73\141\x6d\x6c\x5f\x61\144\155\151\x6e\137\x63\165\163\164\157\155\x65\162\x5f\x6b\x65\171");
    if (!$dn || !$Vj || !is_numeric(trim($Vj))) {
        goto Nf;
    }
    return 1;
    goto S8;
    Nf:
    return 0;
    S8:
}
function mo_saml_is_customer_license_verified()
{
    $Ej = get_option("\155\x6f\x5f\163\141\x6d\154\x5f\143\165\x73\164\157\x6d\x65\162\137\164\157\x6b\x65\x6e");
    $Cc = AESEncryption::decrypt_data(get_option("\164\137\163\151\x74\145\137\163\164\x61\x74\x75\x73"), $Ej);
    $Xx = get_option("\x73\x6d\154\137\154\x6b");
    $dn = get_option("\155\157\137\x73\x61\x6d\x6c\x5f\x61\144\155\x69\156\137\x65\x6d\141\151\x6c");
    $Vj = get_option("\155\x6f\137\x73\x61\x6d\x6c\137\x61\144\x6d\x69\156\x5f\143\165\x73\x74\157\x6d\x65\162\x5f\x6b\x65\171");
    if (!$Cc && !$Xx || !$dn || !$Vj || !is_numeric(trim($Vj))) {
        goto Xu;
    }
    return 1;
    goto oX;
    Xu:
    return 0;
    oX:
}
function saml_get_current_page_url()
{
    $Yo = $_SERVER["\110\124\124\x50\x5f\110\x4f\x53\x54"];
    if (!(substr($Yo, -1) == "\57")) {
        goto Va;
    }
    $Yo = substr($Yo, 0, -1);
    Va:
    $B8 = $_SERVER["\x52\105\121\125\x45\123\x54\x5f\125\122\x49"];
    if (!(substr($B8, 0, 1) == "\57")) {
        goto kI;
    }
    $B8 = substr($B8, 1);
    kI:
    $Ef = isset($_SERVER["\x48\124\x54\120\x53"]) && strcasecmp($_SERVER["\x48\x54\x54\x50\x53"], "\157\x6e") == 0;
    $VK = "\x68\164\x74\x70" . ($Ef ? "\163" : '') . "\x3a\57\x2f" . $Yo . "\57" . $B8;
    return $VK;
}
function show_status_error($CG, $cL, $ft)
{
    $CG = strip_tags($CG);
    $ft = strip_tags($ft);
    if ($cL == "\164\x65\x73\x74\126\x61\154\151\144\141\x74\x65" or $cL == "\164\145\163\x74\x4e\145\x77\103\145\x72\x74\151\146\x69\143\141\164\145") {
        goto RN;
    }
    wp_die("\x57\x65\40\x63\x6f\x75\154\144\40\x6e\157\x74\40\163\151\147\156\x20\171\157\x75\40\151\x6e\x2e\40\120\x6c\x65\141\163\x65\40\x63\x6f\x6e\x74\141\x63\x74\x20\x79\157\x75\162\x20\101\x64\155\x69\156\151\x73\x74\x72\141\164\x6f\162\x2e", "\105\x72\162\157\162\72\40\111\x6e\166\x61\154\x69\x64\40\123\x41\x4d\x4c\x20\x52\x65\163\x70\157\x6e\x73\x65\40\x53\x74\x61\164\x75\163");
    goto VX;
    RN:
    echo "\74\x64\x69\166\x20\x73\x74\x79\154\145\x3d\x22\x66\157\156\164\55\x66\141\x6d\151\154\x79\72\x43\141\154\x69\142\162\151\x3b\160\141\x64\144\151\156\x67\x3a\x30\40\x33\x25\x3b\x22\76";
    echo "\74\x64\151\166\40\x73\164\171\154\x65\75\42\x63\x6f\154\x6f\162\x3a\x20\43\141\71\x34\x34\x34\x32\x3b\142\x61\143\x6b\x67\x72\157\x75\x6e\x64\x2d\143\157\x6c\x6f\162\72\x20\43\146\x32\144\x65\x64\x65\73\160\x61\144\x64\x69\x6e\x67\72\x20\x31\x35\160\x78\73\x6d\x61\162\147\151\156\55\142\157\164\164\157\x6d\72\40\x32\x30\160\170\x3b\164\145\170\164\x2d\141\x6c\151\147\156\x3a\x63\x65\156\164\x65\162\x3b\142\157\162\x64\x65\162\72\x31\160\x78\40\x73\157\x6c\x69\x64\40\x23\x45\66\x42\x33\x42\62\73\x66\157\156\164\55\x73\151\172\145\x3a\x31\x38\x70\164\73\x22\x3e\40\105\122\122\117\122\74\57\144\x69\x76\x3e\xd\xa\40\40\x20\40\x20\40\40\x20\x20\x20\40\x20\x20\x20\40\40\74\144\151\x76\x20\163\x74\171\x6c\x65\75\42\x63\157\154\x6f\162\x3a\40\43\141\71\64\64\x34\x32\73\146\157\x6e\x74\55\x73\151\172\x65\72\x31\x34\160\164\73\40\155\x61\x72\147\x69\156\x2d\142\x6f\x74\164\157\x6d\x3a\x32\x30\160\170\x3b\42\x3e\74\160\76\x3c\x73\164\162\157\156\x67\x3e\105\162\x72\x6f\x72\72\x20\74\x2f\163\164\162\157\156\147\76\x20\111\x6e\166\141\x6c\151\144\x20\x53\x41\115\x4c\x20\122\x65\x73\160\157\156\163\145\x20\x53\x74\141\164\165\x73\56\x3c\57\160\76\15\12\40\x20\x20\x20\40\40\x20\x20\40\40\40\x20\40\40\x20\40\74\160\76\x3c\x73\x74\x72\x6f\x6e\x67\76\103\141\x75\x73\145\x73\74\57\163\x74\x72\x6f\156\147\76\72\x20\x49\x64\x65\156\164\151\x74\x79\40\120\162\157\166\x69\x64\x65\x72\x20\150\x61\163\40\x73\x65\156\x74\40\47" . $CG . "\x27\40\163\164\141\164\165\163\x20\x63\x6f\x64\145\40\x69\156\x20\123\101\x4d\x4c\x20\x52\145\x73\160\157\156\x73\145\x2e\40\x3c\x2f\x70\x3e\xd\12\x9\x9\11\11\11\11\11\x9\74\x70\x3e\74\163\x74\x72\157\x6e\147\x3e\x52\x65\x61\x73\x6f\x6e\x3c\x2f\163\164\x72\157\156\147\x3e\72\x20" . get_status_message($CG) . "\x3c\57\x70\76\40";
    if (empty($ft)) {
        goto N2;
    }
    echo "\74\x70\x3e\x3c\163\x74\x72\x6f\x6e\x67\76\123\x74\141\x74\165\163\40\x4d\145\163\x73\x61\x67\145\40\151\x6e\40\x74\x68\145\x20\x53\101\x4d\114\x20\x52\x65\163\x70\x6f\x6e\x73\x65\72\x3c\x2f\x73\x74\162\157\156\147\76\x20\x3c\x62\162\57\x3e" . $ft . "\74\x2f\160\x3e";
    N2:
    echo "\74\142\162\x3e\15\xa\x20\40\40\x20\40\40\40\x20\x20\x20\40\40\40\40\x20\40\74\57\144\x69\x76\76\15\xa\xd\12\40\x20\x20\40\x20\40\x20\x20\x20\40\40\x20\x20\x20\x20\x20\74\x64\151\x76\x20\163\x74\x79\x6c\145\x3d\x22\155\141\162\147\151\156\72\63\x25\73\x64\x69\163\160\154\x61\171\x3a\x62\154\157\x63\x6b\73\x74\145\170\x74\55\141\154\151\147\156\72\143\x65\156\x74\145\162\73\42\x3e\xd\12\x20\x20\40\x20\40\x20\40\40\40\40\40\x20\40\40\40\40\x3c\x64\151\166\x20\163\x74\171\154\x65\x3d\x22\155\x61\x72\147\151\x6e\72\x33\45\73\x64\151\x73\x70\154\141\x79\x3a\142\x6c\157\143\153\73\164\145\x78\x74\55\x61\154\151\147\x6e\x3a\143\145\x6e\x74\145\162\x3b\42\x3e\x3c\151\156\x70\x75\x74\x20\x73\x74\171\x6c\x65\x3d\42\x70\141\x64\x64\x69\156\x67\72\61\45\x3b\x77\x69\x64\164\150\x3a\x31\x30\60\x70\x78\x3b\x62\141\x63\x6b\147\x72\x6f\165\x6e\x64\x3a\40\43\60\x30\x39\61\103\104\40\156\x6f\156\x65\x20\162\x65\x70\x65\x61\164\40\x73\x63\162\157\154\154\40\x30\x25\x20\60\x25\73\143\x75\162\163\x6f\x72\72\40\x70\157\x69\x6e\164\145\162\x3b\x66\157\156\164\x2d\x73\x69\172\145\72\61\x35\160\170\x3b\x62\157\x72\144\x65\162\55\167\x69\144\164\150\72\40\x31\160\170\x3b\142\x6f\162\x64\x65\x72\x2d\163\164\x79\x6c\145\72\40\163\x6f\x6c\x69\x64\73\142\x6f\162\144\x65\162\55\x72\141\x64\x69\165\163\x3a\40\x33\160\170\x3b\167\x68\151\164\145\55\x73\x70\x61\x63\x65\x3a\x20\156\x6f\x77\x72\x61\x70\73\142\x6f\x78\55\x73\x69\x7a\151\156\147\72\x20\x62\x6f\162\144\x65\162\x2d\142\x6f\170\73\142\157\162\x64\145\162\55\143\157\x6c\x6f\162\72\x20\43\x30\x30\67\63\101\x41\x3b\142\x6f\x78\x2d\163\150\141\x64\157\167\72\40\x30\x70\x78\40\x31\x70\170\x20\x30\x70\x78\x20\x72\147\x62\x61\50\x31\x32\x30\x2c\x20\x32\x30\60\54\x20\62\63\x30\54\x20\x30\56\66\x29\40\x69\156\163\x65\164\73\x63\157\x6c\x6f\x72\72\40\43\106\x46\x46\x3b\x22\x74\x79\x70\145\75\42\142\x75\x74\x74\157\156\42\x20\x76\141\154\x75\x65\x3d\x22\x44\157\x6e\x65\x22\x20\x6f\156\x43\154\151\x63\153\x3d\x22\x73\145\154\146\x2e\143\x6c\x6f\x73\145\x28\x29\73\x22\x3e\74\57\x64\151\166\x3e";
    die;
    VX:
}
function addLink($aU, $Xi)
{
    $X7 = "\74\x61\x20\150\162\x65\146\x3d\42" . $Xi . "\x22\76" . $aU . "\74\57\x61\x3e";
    return $X7;
}
function get_status_message($CG)
{
    switch ($CG) {
        case "\x52\145\x71\x75\x65\x73\164\145\162":
            return "\x54\150\x65\40\x72\x65\161\165\145\163\x74\40\x63\x6f\165\x6c\x64\x20\156\157\164\40\x62\x65\40\x70\x65\162\146\157\x72\155\x65\x64\x20\x64\x75\x65\40\164\x6f\x20\x61\x6e\40\x65\x72\x72\x6f\x72\x20\x6f\x6e\40\164\150\x65\x20\x70\x61\x72\164\40\x6f\146\40\x74\150\x65\x20\x72\145\x71\x75\x65\163\164\145\x72\x2e";
            goto S0;
        case "\122\145\x73\160\x6f\156\x64\x65\162":
            return "\124\150\x65\40\x72\145\x71\165\145\x73\164\x20\x63\x6f\165\154\x64\40\x6e\157\164\x20\142\145\x20\x70\145\x72\146\x6f\x72\155\x65\144\x20\144\x75\145\40\164\157\x20\141\156\40\145\162\162\157\x72\40\x6f\156\x20\x74\x68\145\x20\160\x61\x72\164\40\157\x66\40\164\x68\145\40\123\x41\115\x4c\40\162\145\163\160\x6f\156\x64\x65\162\x20\157\x72\x20\x53\x41\115\x4c\40\141\x75\164\150\157\x72\151\x74\171\x2e";
            goto S0;
        case "\x56\145\162\163\x69\x6f\156\115\x69\x73\155\141\x74\x63\150":
            return "\124\150\x65\40\x53\101\115\x4c\40\162\x65\163\160\x6f\x6e\144\x65\x72\40\143\157\165\x6c\144\40\156\x6f\164\40\x70\162\157\143\x65\163\x73\40\x74\x68\x65\40\x72\x65\x71\165\x65\x73\164\x20\142\x65\x63\x61\165\x73\x65\x20\x74\150\145\40\166\x65\x72\x73\151\157\x6e\x20\157\146\40\x74\x68\x65\40\x72\145\161\165\x65\x73\x74\40\x6d\x65\163\x73\141\x67\145\x20\167\141\x73\40\151\156\143\x6f\162\x72\x65\x63\164\x2e";
            goto S0;
        default:
            return "\125\156\153\x6e\157\x77\156";
    }
    zC:
    S0:
}
function mo_saml_register_widget()
{
    register_widget("\155\x6f\x5f\154\x6f\147\x69\156\x5f\167\151\x64");
}
function mo_saml_get_relay_state($VK)
{
    if (!($VK == "\164\x65\163\164\x56\141\154\151\144\x61\x74\145" || $VK == "\x74\145\163\x74\x4e\145\x77\103\145\x72\x74\151\146\151\143\x61\x74\x65")) {
        goto gR;
    }
    return $VK;
    gR:
    if (get_option("\x6d\157\137\x73\141\155\154\x5f\x73\x65\156\144\137\141\x62\x73\157\x6c\x75\164\x65\x5f\x72\145\x6c\141\171\x5f\x73\164\x61\164\x65")) {
        goto bJ;
    }
    $lI = parse_url($VK, PHP_URL_PATH);
    if (!parse_url($VK, PHP_URL_QUERY)) {
        goto LT;
    }
    $Be = parse_url($VK, PHP_URL_QUERY);
    $lI = $lI . "\77" . $Be;
    LT:
    if (!parse_url($VK, PHP_URL_FRAGMENT)) {
        goto ow;
    }
    $NL = parse_url($VK, PHP_URL_FRAGMENT);
    $lI = $lI . "\x23" . $NL;
    ow:
    goto x7;
    bJ:
    $wu = get_option("\x6d\x6f\137\x73\141\155\x6c\x5f\143\x75\163\x74\x6f\x6d\x65\162\137\x74\x6f\153\x65\x6e");
    $lI = AESEncryption::encrypt_data($VK, $wu);
    x7:
    return $lI;
}
add_action("\x77\151\x64\x67\145\x74\163\137\x69\x6e\x69\x74", "\155\157\x5f\x73\141\155\x6c\x5f\162\x65\147\x69\x73\x74\x65\x72\x5f\167\x69\144\x67\145\x74");
add_action("\x69\x6e\151\x74", "\x6d\157\x5f\x6c\x6f\x67\151\156\x5f\x76\x61\154\151\x64\141\164\145");
?>

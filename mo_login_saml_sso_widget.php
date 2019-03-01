<?php


include_once dirname(__FILE__) . "\57\x55\164\x69\x6c\151\x74\x69\x65\163\x2e\160\x68\160";
include_once dirname(__FILE__) . "\57\x52\x65\x73\160\157\x6e\x73\145\56\x70\x68\160";
include_once dirname(__FILE__) . "\57\x4c\157\147\x6f\165\x74\122\145\161\x75\x65\163\164\x2e\160\150\160";
if (class_exists("\x41\105\x53\105\x6e\x63\x72\x79\x70\164\151\157\156")) {
    goto Kr;
}
require_once dirname(__FILE__) . "\57\151\x6e\x63\x6c\x75\x64\x65\163\57\x6c\x69\x62\57\x65\156\143\162\171\160\164\x69\157\x6e\56\x70\x68\160";
Kr:
class mo_login_wid extends WP_Widget
{
    public function __construct()
    {
        $gg = get_option("\163\141\155\154\137\151\x64\145\x6e\164\x69\x74\x79\x5f\156\x61\155\145");
        parent::__construct("\x53\141\x6d\x6c\137\114\157\x67\151\x6e\x5f\127\x69\144\x67\x65\164", "\x4c\x6f\x67\x69\156\40\x77\151\x74\150\40" . $gg, array("\x64\x65\x73\x63\162\151\160\x74\x69\157\x6e" => __("\124\x68\x69\163\40\151\x73\40\x61\40\x6d\x69\156\151\x4f\162\141\x6e\x67\x65\40\x53\x41\x4d\x4c\x20\154\157\x67\151\156\40\x77\x69\x64\147\x65\164\x2e", "\155\x6f\x73\141\x6d\154")));
    }
    public function widget($TD, $yk)
    {
        extract($TD);
        $lV = apply_filters("\x77\151\x64\x67\145\x74\x5f\x74\151\164\154\145", $yk["\x77\x69\144\x5f\164\x69\x74\x6c\x65"]);
        echo $TD["\142\x65\146\x6f\x72\x65\137\167\151\144\147\145\164"];
        if (empty($lV)) {
            goto mC;
        }
        echo $TD["\x62\x65\x66\157\162\145\x5f\x74\x69\164\154\x65"] . $lV . $TD["\141\x66\x74\x65\162\137\x74\151\x74\154\145"];
        mC:
        $this->loginForm();
        echo $TD["\141\146\x74\145\x72\137\x77\151\144\x67\145\x74"];
    }
    public function update($JJ, $Xd)
    {
        $yk = array();
        $yk["\167\x69\x64\137\x74\x69\164\x6c\145"] = strip_tags($JJ["\167\x69\144\137\x74\151\x74\x6c\x65"]);
        return $yk;
    }
    public function form($yk)
    {
        $lV = '';
        if (!array_key_exists("\167\x69\x64\137\164\151\x74\154\x65", $yk)) {
            goto lk;
        }
        $lV = $yk["\167\x69\x64\137\164\x69\164\x6c\x65"];
        lk:
        echo "\xa\x9\x9\74\160\x3e\74\x6c\x61\142\x65\154\x20\146\x6f\x72\x3d\42" . $this->get_field_id("\x77\151\144\x5f\x74\x69\164\x6c\145") . "\40\42\x3e" . _e("\x54\151\164\x6c\145\72") . "\x20\x3c\x2f\x6c\x61\142\145\154\x3e\12\11\11\x3c\151\x6e\160\165\x74\40\x63\x6c\x61\163\163\75\42\167\151\x64\145\x66\141\164\42\x20\151\144\x3d\x22" . $this->get_field_id("\x77\x69\144\137\x74\151\x74\x6c\x65") . "\42\40\x6e\141\155\145\75\42" . $this->get_field_name("\167\151\x64\x5f\164\x69\164\154\x65") . "\42\x20\x74\x79\160\x65\x3d\x22\x74\x65\170\x74\42\40\166\x61\154\165\145\75\42" . $lV . "\42\40\57\x3e\12\x9\11\74\57\x70\76";
    }
    public function loginForm()
    {
        global $post;
        if (!is_user_logged_in()) {
            goto fS;
        }
        $current_user = wp_get_current_user();
        $iz = "\x48\145\154\x6c\157\x2c\x20" . $current_user->display_name;
        echo $iz . "\40\174\40";
        ?>
<a href="<?php 
        echo wp_logout_url(home_url());
        ?>
" title="logout" >Logout</a><?php 
        echo "\x3c\57\154\x69\x3e";
        goto DT;
        fS:
        $jL = saml_get_current_page_url();
        echo "\xa\x9\x9\74\163\x63\162\x69\x70\164\x3e\12\11\x9\x66\165\x6e\143\164\x69\x6f\x6e\40\163\165\142\x6d\151\x74\x53\141\x6d\154\x46\x6f\x72\155\x28\51\x7b\x20\144\x6f\143\165\155\145\x6e\x74\x2e\x67\x65\164\105\154\x65\x6d\x65\156\164\102\171\x49\x64\x28\x22\x6d\151\x6e\151\157\x72\141\x6e\147\145\55\163\141\x6d\x6c\x2d\x73\x70\x2d\x73\x73\x6f\x2d\x6c\157\x67\151\x6e\55\x66\x6f\162\155\42\x29\56\x73\165\x62\155\x69\164\50\x29\73\x20\x7d\xa\11\11\74\57\x73\x63\162\x69\160\164\76\12\x9\x9\x3c\x66\x6f\x72\x6d\40\x6e\x61\155\145\x3d\42\x6d\151\x6e\151\x6f\162\x61\156\147\x65\55\x73\141\x6d\154\x2d\163\160\55\x73\163\x6f\x2d\x6c\157\147\x69\156\x2d\x66\x6f\x72\x6d\42\40\151\144\75\42\155\151\x6e\x69\157\x72\x61\156\x67\x65\x2d\163\141\x6d\154\55\163\x70\55\163\163\x6f\55\154\157\147\151\156\55\x66\157\162\155\42\x20\155\145\164\x68\157\x64\x3d\42\160\157\x73\x74\42\40\x61\x63\x74\151\157\x6e\75\x22\x22\x3e\xa\x9\x9\x3c\151\x6e\x70\x75\164\40\x74\x79\160\145\x3d\42\150\151\144\144\145\156\42\40\156\x61\x6d\x65\x3d\x22\157\160\x74\151\x6f\x6e\x22\40\x76\x61\x6c\x75\x65\x3d\x22\163\141\x6d\x6c\137\x75\163\x65\162\137\154\x6f\x67\x69\156\x22\x20\57\76\12\x9\x9\74\x69\156\x70\165\x74\x20\x74\x79\160\145\75\x22\150\151\144\x64\x65\156\42\40\x6e\141\155\x65\x3d\42\162\145\x64\x69\x72\x65\143\x74\137\164\x6f\x22\40\166\141\x6c\165\145\75\x22" . $jL . "\x22\40\57\x3e\xa\xa\11\x9\x3c\146\x6f\156\164\40\163\x69\x7a\145\x3d\x22\x2b\61\x22\x20\x73\x74\x79\x6c\x65\75\x22\166\145\162\164\151\x63\x61\x6c\x2d\141\x6c\x69\147\156\72\164\157\x70\73\42\x3e\x20\74\x2f\x66\157\156\164\x3e";
        $gl = get_option("\x73\141\155\x6c\x5f\151\x64\145\x6e\x74\151\164\x79\x5f\x6e\x61\x6d\x65");
        if (!empty($gl)) {
            goto mZ;
        }
        echo "\120\x6c\x65\141\163\x65\x20\143\157\x6e\146\x69\x67\165\x72\145\x20\164\x68\x65\x20\x6d\151\156\151\x4f\x72\x61\x6e\147\145\x20\123\x41\115\114\x20\x50\x6c\165\x67\x69\x6e\40\146\151\162\x73\x74\x2e";
        goto HP;
        mZ:
        if (get_option("\155\x6f\x5f\163\141\x6d\x6c\137\x65\x6e\x61\x62\x6c\x65\137\x63\154\157\x75\x64\137\142\162\157\153\145\x72") != "\164\x72\x75\145") {
            goto EW;
        }
        ?>
 <a href="<?php 
        echo get_option("\155\x6f\137\x73\141\155\154\137\150\157\x73\x74\137\x6e\141\155\145");
        ?>
/moas/rest/saml/request?id=<?php 
        echo get_option("\155\x6f\x5f\163\141\155\154\x5f\x61\144\155\x69\156\137\x63\x75\x73\x74\x6f\x6d\145\x72\x5f\153\x65\x79");
        ?>
&returnurl=<?php 
        echo urlencode(home_url() . "\57\x3f\x6f\160\164\151\157\x6e\75\162\145\141\x64\163\x61\155\154\154\157\x67\151\156");
        ?>
">Login with <?php 
        echo $gl;
        ?>
</a> <?php 
        goto JN;
        EW:
        ?>
 <a href="#" onClick="submitSamlForm()">Login with <?php 
        echo $gl;
        ?>
</a></form> <?php 
        JN:
        HP:
        if ($this->mo_saml_check_empty_or_null_val(get_option("\x6d\157\x5f\163\141\x6d\154\137\x72\x65\144\x69\162\145\143\164\x5f\145\162\x72\x6f\x72\137\x63\x6f\x64\145"))) {
            goto nm;
        }
        echo "\x3c\144\x69\166\76\x3c\x2f\144\x69\166\76\74\144\x69\x76\40\x74\151\x74\154\145\x3d\x22\x4c\157\x67\151\x6e\x20\x45\x72\x72\157\x72\42\76\x3c\x66\157\x6e\164\40\x63\x6f\x6c\x6f\162\75\42\x72\x65\144\x22\x3e\x57\x65\40\143\157\x75\154\x64\40\x6e\x6f\164\40\x73\151\x67\x6e\x20\x79\157\165\40\x69\156\56\40\x50\154\x65\x61\163\145\x20\143\x6f\x6e\x74\141\x63\164\x20\171\x6f\x75\162\40\101\x64\x6d\151\156\x69\x73\x74\162\x61\164\157\162\x2e\74\x2f\146\x6f\x6e\x74\76\x3c\x2f\x64\x69\x76\76";
        delete_option("\x6d\x6f\x5f\163\141\x6d\154\x5f\x72\145\144\x69\x72\145\143\164\x5f\145\162\162\157\x72\137\x63\157\144\145");
        delete_option("\155\157\x5f\x73\x61\155\154\x5f\x72\x65\x64\x69\162\x65\143\x74\137\145\x72\x72\x6f\x72\137\x72\145\141\163\x6f\156");
        nm:
        echo "\x9\74\57\x75\154\76\12\x9\x9\74\x2f\146\x6f\x72\x6d\x3e";
        DT:
    }
    public function mo_saml_check_empty_or_null_val($q0)
    {
        if (!(!isset($q0) || empty($q0))) {
            goto qy;
        }
        return true;
        qy:
        return false;
    }
    function mo_saml_logout()
    {
        if (!is_user_logged_in()) {
            goto Fh;
        }
        $mA = get_option("\163\x61\x6d\x6c\137\154\x6f\x67\x6f\165\164\x5f\165\162\x6c");
        $TO = get_option("\x73\141\155\154\137\154\157\147\157\165\x74\137\x62\151\x6e\144\x69\156\x67\137\x74\x79\160\x65");
        if (empty($mA)) {
            goto m4;
        }
        if (!(!session_id() || session_id() == '' || !isset($_SESSION))) {
            goto R2;
        }
        session_start();
        R2:
        if (isset($_SESSION["\x6d\157\137\163\x61\x6d\154\137\154\157\x67\x6f\x75\x74\x5f\162\x65\161\x75\145\163\164"])) {
            goto al;
        }
        if (isset($_SESSION["\155\x6f\x5f\x73\x61\155\x6c"]["\x6c\157\147\147\x65\144\x5f\151\156\137\x77\151\x74\x68\x5f\151\144\x70"])) {
            goto Sb;
        }
        goto NI;
        al:
        self::createLogoutResponseAndRedirect($mA, $TO);
        die;
        goto NI;
        Sb:
        unset($_SESSION["\155\x6f\x5f\x73\x61\155\154"]);
        $current_user = wp_get_current_user();
        $RM = get_user_meta($current_user->ID, "\155\x6f\137\x73\x61\155\154\x5f\x6e\x61\155\145\137\151\144");
        $yW = get_user_meta($current_user->ID, "\x6d\x6f\x5f\x73\x61\155\x6c\x5f\x73\x65\163\163\x69\x6f\x6e\137\151\x6e\144\x65\x78");
        $zW = get_option("\155\157\x5f\163\x61\155\154\137\x73\160\x5f\x62\141\163\x65\x5f\x75\162\154");
        if (!empty($zW)) {
            goto hR;
        }
        $zW = home_url();
        hR:
        $ZD = get_option("\x6d\157\137\x73\141\x6d\x6c\x5f\x73\160\x5f\x65\x6e\164\151\164\171\137\151\144");
        if (!empty($ZD)) {
            goto Bd;
        }
        $ZD = $zW . "\x2f\167\x70\x2d\x63\157\x6e\x74\x65\156\x74\x2f\160\154\165\x67\151\x6e\163\57\155\x69\156\x69\157\x72\141\156\147\x65\x2d\163\141\155\154\55\x32\x30\55\163\x69\x6e\x67\x6c\145\x2d\x73\151\147\x6e\x2d\x6f\x6e\x2f";
        Bd:
        $NE = $mA;
        $Un = $zW;
        $zx = SAMLSPUtilities::createLogoutRequest($RM, $yW, $ZD, $NE, $TO);
        if (empty($TO) || $TO == "\110\164\x74\x70\x52\145\144\151\162\x65\x63\164") {
            goto nR;
        }
        if (!(get_option("\163\141\x6d\154\137\x72\x65\x71\x75\145\163\x74\x5f\x73\x69\x67\156\x65\x64") == "\165\156\x63\x68\x65\143\x6b\x65\144")) {
            goto A1;
        }
        $bD = base64_encode($zx);
        SAMLSPUtilities::postSAMLRequest($mA, $bD, $Un);
        die;
        A1:
        $j9 = '';
        $Cv = '';
        $bD = SAMLSPUtilities::signXML($zx, "\116\x61\x6d\x65\111\104");
        SAMLSPUtilities::postSAMLRequest($mA, $bD, $Un);
        goto Sz;
        nR:
        $ex = $mA;
        if (strpos($mA, "\77") !== false) {
            goto Gn;
        }
        $ex .= "\x3f";
        goto mN;
        Gn:
        $ex .= "\x26";
        mN:
        if (!(get_option("\x73\x61\155\154\137\162\x65\x71\165\145\x73\164\137\x73\x69\147\x6e\145\144") == "\x75\x6e\x63\x68\145\143\153\145\x64")) {
            goto Jd;
        }
        $ex .= "\123\x41\x4d\x4c\x52\x65\x71\165\145\163\164\75" . $zx . "\46\122\x65\154\141\171\x53\164\141\164\145\x3d" . urlencode($Un);
        header("\x4c\157\143\141\164\x69\x6f\156\72\40" . $ex);
        die;
        Jd:
        $zx = "\123\x41\115\x4c\122\x65\x71\165\x65\x73\x74\75" . $zx . "\46\x52\x65\154\141\x79\x53\164\x61\x74\145\75" . urlencode($Un) . "\46\123\x69\x67\x41\154\x67\75" . urlencode(XMLSecurityKey::RSA_SHA256);
        $Vs = array("\164\x79\160\x65" => "\160\x72\x69\x76\141\164\x65");
        $nz = new XMLSecurityKey(XMLSecurityKey::RSA_SHA256, $Vs);
        $J2 = get_option("\155\157\x5f\163\141\155\x6c\x5f\x63\x75\162\x72\x65\x6e\164\x5f\x63\145\162\x74\x5f\x70\162\x69\x76\141\x74\145\x5f\153\x65\x79");
        $nz->loadKey($J2, FALSE);
        $wr = new XMLSecurityDSig();
        $SI = $nz->signData($zx);
        $SI = base64_encode($SI);
        $ex .= $zx . "\x26\123\x69\x67\156\141\164\165\162\x65\75" . urlencode($SI);
        header("\114\157\x63\141\x74\151\157\x6e\x3a\40" . $ex);
        die;
        Sz:
        NI:
        m4:
        Fh:
    }
    function createLogoutResponseAndRedirect($mA, $TO)
    {
        $zW = get_option("\x6d\157\x5f\163\x61\155\x6c\x5f\x73\160\x5f\x62\x61\163\145\x5f\165\162\154");
        if (!empty($zW)) {
            goto fx;
        }
        $zW = home_url();
        fx:
        $pN = $_SESSION["\x6d\x6f\x5f\x73\x61\x6d\154\x5f\154\x6f\147\157\x75\x74\137\162\x65\161\x75\145\x73\164"];
        $Xk = $_SESSION["\155\x6f\137\163\141\x6d\154\137\154\157\x67\x6f\165\164\x5f\162\x65\x6c\x61\171\x5f\163\164\x61\164\x65"];
        unset($_SESSION["\x6d\157\137\163\141\155\154\137\154\157\x67\x6f\x75\164\x5f\162\145\161\165\145\163\x74"]);
        unset($_SESSION["\x6d\x6f\x5f\x73\x61\x6d\154\x5f\154\157\147\157\x75\x74\137\x72\x65\x6c\x61\171\137\x73\x74\141\x74\x65"]);
        $L_ = new DOMDocument();
        $L_->loadXML($pN);
        $pN = $L_->firstChild;
        if (!($pN->localName == "\x4c\157\x67\x6f\x75\x74\x52\145\161\165\145\x73\164")) {
            goto Ik;
        }
        $et = new SAML2SPLogoutRequest($pN);
        $ZD = get_option("\155\157\x5f\163\x61\155\x6c\x5f\x73\x70\x5f\145\x6e\x74\151\x74\x79\x5f\151\144");
        if (!empty($ZD)) {
            goto DA;
        }
        $ZD = $zW . "\57\167\x70\55\143\x6f\156\x74\x65\x6e\x74\57\x70\154\x75\x67\151\156\163\x2f\155\151\x6e\151\x6f\162\141\156\x67\x65\55\x73\141\155\x6c\55\62\x30\55\x73\151\156\147\154\145\x2d\163\x69\x67\x6e\55\x6f\156\x2f";
        DA:
        $NE = $mA;
        $u1 = SAMLSPUtilities::createLogoutResponse($et->getId(), $ZD, $NE, $TO);
        if (empty($TO) || $TO == "\x48\164\164\x70\122\x65\144\151\162\x65\x63\164") {
            goto aP;
        }
        if (!(get_option("\x73\141\x6d\x6c\137\x72\x65\161\165\x65\x73\x74\x5f\163\x69\147\x6e\x65\144") == "\x75\156\143\x68\x65\143\x6b\x65\x64")) {
            goto zH;
        }
        $bD = base64_encode($u1);
        SAMLSPUtilities::postSAMLResponse($mA, $bD, $Xk);
        die;
        zH:
        $j9 = '';
        $Cv = '';
        $bD = SAMLSPUtilities::signXML($u1, "\x53\x74\x61\164\165\x73");
        SAMLSPUtilities::postSAMLResponse($mA, $bD, $Xk);
        goto OJ;
        aP:
        $ex = $mA;
        if (strpos($mA, "\x3f") !== false) {
            goto yo;
        }
        $ex .= "\77";
        goto E7;
        yo:
        $ex .= "\x26";
        E7:
        if (!(get_option("\163\141\x6d\154\137\x72\145\161\165\x65\x73\164\x5f\x73\151\x67\156\145\144") == "\x75\156\x63\150\x65\143\153\x65\144")) {
            goto BM;
        }
        $ex .= "\x53\x41\115\x4c\122\x65\x73\x70\157\156\x73\145\x3d" . $u1 . "\x26\x52\x65\154\x61\x79\123\x74\x61\x74\145\x3d" . urlencode($Xk);
        header("\x4c\x6f\x63\141\x74\151\157\156\72\40" . $ex);
        die;
        BM:
        $zx = "\123\101\115\114\122\145\163\x70\157\156\x73\145\x3d" . $u1 . "\46\122\x65\154\141\171\123\164\x61\x74\x65\75" . urlencode($Xk) . "\x26\x53\x69\x67\101\154\x67\75" . urlencode(XMLSecurityKey::RSA_SHA256);
        $Vs = array("\164\x79\160\x65" => "\160\162\151\166\x61\164\145");
        $nz = new XMLSecurityKey(XMLSecurityKey::RSA_SHA256, $Vs);
        $J2 = get_option("\x6d\157\137\163\141\x6d\x6c\x5f\x63\x75\x72\162\x65\x6e\x74\x5f\143\x65\x72\164\x5f\160\x72\x69\166\141\164\145\137\x6b\145\x79");
        $nz->loadKey($J2, FALSE);
        $wr = new XMLSecurityDSig();
        $SI = $nz->signData($zx);
        $SI = base64_encode($SI);
        $ex .= $zx . "\x26\123\151\x67\156\x61\164\x75\162\145\75" . urlencode($SI);
        header("\114\157\x63\141\x74\x69\x6f\x6e\72\40" . $ex);
        die;
        OJ:
        Ik:
    }
}
function mo_login_validate()
{
    if (!(isset($_REQUEST["\157\160\x74\151\157\156"]) && $_REQUEST["\x6f\160\x74\x69\x6f\x6e"] == "\155\x6f\163\141\155\x6c\137\155\x65\164\141\144\141\164\141")) {
        goto y9;
    }
    miniorange_generate_metadata();
    y9:
    if (!mo_saml_is_customer_license_verified()) {
        goto CH;
    }
    if (!(isset($_REQUEST["\157\x70\164\x69\x6f\x6e"]) && $_REQUEST["\x6f\160\x74\x69\x6f\x6e"] == "\163\141\x6d\154\x5f\x75\163\145\162\x5f\x6c\x6f\x67\x69\x6e" || isset($_REQUEST["\157\x70\164\x69\x6f\x6e"]) && $_REQUEST["\157\160\x74\x69\x6f\156"] == "\164\x65\x73\164\x69\144\x70\143\157\156\x66\151\x67")) {
        goto mb;
    }
    if (!(is_user_logged_in() && $_REQUEST["\x6f\160\164\151\x6f\x6e"] != "\x74\x65\163\164\x69\144\x70\143\x6f\x6e\146\151\147")) {
        goto ND;
    }
    return;
    ND:
    if (!mo_saml_is_sp_configured()) {
        goto QE;
    }
    $zW = get_option("\x6d\x6f\x5f\x73\141\x6d\x6c\x5f\163\x70\x5f\x62\x61\163\145\x5f\x75\162\x6c");
    if (!empty($zW)) {
        goto t5;
    }
    $zW = home_url();
    t5:
    if ($_REQUEST["\157\160\x74\151\157\x6e"] == "\x74\145\x73\x74\151\x64\x70\x63\x6f\x6e\x66\x69\x67") {
        goto TN;
    }
    if (get_option("\155\x6f\x5f\x73\x61\155\154\x5f\162\x65\x6c\x61\171\137\163\164\141\164\145") && get_option("\155\x6f\137\163\x61\x6d\x6c\x5f\162\145\154\141\x79\137\x73\164\x61\164\x65") != '') {
        goto k5;
    }
    if (isset($_REQUEST["\162\x65\144\151\162\145\143\x74\137\164\157"])) {
        goto xQ;
    }
    $Un = $zW;
    goto C4;
    xQ:
    $Un = $_REQUEST["\162\145\144\151\x72\145\143\164\x5f\164\x6f"];
    C4:
    goto aj;
    k5:
    $Un = get_option("\x6d\157\137\x73\x61\155\x6c\x5f\x72\x65\x6c\141\x79\137\163\x74\x61\x74\145");
    aj:
    goto i9;
    TN:
    $Un = "\x74\145\163\164\x56\141\x6c\151\x64\x61\x74\x65";
    i9:
    if (get_option("\x6d\x6f\137\x73\x61\x6d\x6c\137\145\156\141\x62\154\x65\x5f\143\154\157\x75\x64\x5f\142\x72\x6f\153\x65\x72") != "\x74\x72\x75\x65") {
        goto Jc;
    }
    $Uf = get_option("\155\x6f\137\x73\x61\155\x6c\137\150\157\x73\x74\x5f\156\141\x6d\145") . "\57\155\x6f\x61\x73\x2f\x72\x65\x73\164\57\163\141\x6d\x6c\57\162\145\161\165\x65\163\x74\x3f\151\144\x3d" . get_option("\155\157\x5f\x73\141\x6d\x6c\x5f\x61\144\x6d\151\x6e\137\143\x75\x73\x74\157\155\x65\162\137\153\145\171") . "\x26\x72\x65\164\x75\162\156\x75\162\154\x3d" . urlencode(home_url() . "\x2f\77\x6f\x70\x74\x69\157\156\x3d\x72\x65\141\144\x73\x61\x6d\x6c\x6c\157\147\x69\x6e\x26\162\145\x64\151\x72\145\x63\x74\x5f\164\x6f\x3d" . urlencode($Un));
    header("\114\x6f\x63\141\164\x69\x6f\156\72\40" . $Uf);
    die;
    goto ET;
    Jc:
    $m6 = get_option("\163\x61\x6d\154\137\154\x6f\x67\151\x6e\x5f\x75\162\x6c");
    $r_ = get_option("\163\141\x6d\x6c\137\154\x6f\147\151\x6e\137\142\151\156\144\x69\x6e\x67\137\164\x79\160\145");
    $f4 = get_option("\x6d\x6f\x5f\163\141\x6d\154\137\x66\157\x72\x63\x65\x5f\141\165\x74\x68\145\156\x74\151\143\141\164\x69\157\156");
    $f3 = $zW . "\x2f";
    $ZD = get_option("\155\157\x5f\x73\141\155\154\x5f\163\160\137\145\156\164\x69\164\x79\137\151\x64");
    if (!empty($ZD)) {
        goto WX;
    }
    $ZD = $zW . "\x2f\x77\x70\x2d\x63\157\156\164\x65\x6e\164\57\160\154\x75\147\x69\x6e\163\x2f\155\151\x6e\x69\x6f\x72\141\156\147\x65\55\x73\x61\155\154\55\x32\x30\x2d\163\151\x6e\x67\x6c\145\x2d\163\x69\147\x6e\x2d\x6f\x6e\x2f";
    WX:
    $zx = SAMLSPUtilities::createAuthnRequest($f3, $ZD, $m6, $f4, $r_);
    $ex = $m6;
    if (strpos($m6, "\x3f") !== false) {
        goto hL;
    }
    $ex .= "\x3f";
    goto Zr;
    hL:
    $ex .= "\x26";
    Zr:
    cldjkasjdksalc();
    if (empty($r_) || $r_ == "\110\x74\164\160\122\145\x64\x69\x72\145\x63\x74") {
        goto yN;
    }
    if (!(get_option("\x73\x61\x6d\154\137\162\x65\x71\x75\x65\x73\164\x5f\x73\x69\x67\156\x65\144") == "\165\156\x63\150\x65\x63\x6b\x65\x64")) {
        goto Lo;
    }
    $bD = base64_encode($zx);
    SAMLSPUtilities::postSAMLRequest($m6, $bD, $Un);
    die;
    Lo:
    $j9 = '';
    $Cv = '';
    $bD = SAMLSPUtilities::signXML($zx, "\116\x61\155\x65\111\104\120\x6f\154\151\143\x79");
    SAMLSPUtilities::postSAMLRequest($m6, $bD, $Un);
    goto MS;
    yN:
    if (!(get_option("\163\141\155\x6c\137\162\145\x71\165\145\163\x74\137\163\x69\147\156\x65\x64") == "\165\x6e\143\150\x65\x63\153\145\144")) {
        goto DG;
    }
    $ex .= "\x53\101\115\x4c\x52\145\x71\165\145\163\x74\x3d" . $zx . "\46\122\145\154\141\171\123\x74\141\x74\x65\75" . urlencode($Un);
    header("\114\157\143\x61\164\x69\x6f\x6e\x3a\40" . $ex);
    die;
    DG:
    $zx = "\x53\101\115\114\122\145\x71\165\x65\163\x74\x3d" . $zx . "\46\122\x65\154\x61\171\x53\164\x61\164\x65\75" . urlencode($Un) . "\46\123\x69\147\101\x6c\x67\x3d" . urlencode(XMLSecurityKey::RSA_SHA256);
    $Vs = array("\x74\x79\x70\x65" => "\x70\x72\151\x76\x61\164\x65");
    $nz = new XMLSecurityKey(XMLSecurityKey::RSA_SHA256, $Vs);
    $J2 = get_option("\155\x6f\x5f\163\x61\x6d\x6c\137\143\x75\x72\162\145\156\x74\137\x63\145\x72\164\x5f\x70\x72\x69\166\x61\x74\145\x5f\153\145\x79");
    $nz->loadKey($J2, FALSE);
    $wr = new XMLSecurityDSig();
    $SI = $nz->signData($zx);
    $SI = base64_encode($SI);
    $ex .= $zx . "\x26\123\x69\147\156\x61\x74\165\x72\145\75" . urlencode($SI);
    if (!(get_option("\155\157\x5f\163\x61\155\154\x5f\x65\x6e\141\142\154\x65\x5f\x63\x6c\x6f\165\x64\x5f\142\162\x6f\x6b\145\x72") == "\164\162\165\145")) {
        goto Tx;
    }
    $ex = get_option("\155\x6f\137\163\x61\x6d\154\x5f\150\157\163\164\x5f\156\x61\155\145") . "\57\x6d\157\x61\163\x2f\x72\145\x73\164\x2f\x73\x61\155\154\x2f\x72\145\x71\165\145\163\164\x3f\x69\144\75" . get_option("\155\x6f\x5f\x73\141\155\x6c\x5f\x61\x64\x6d\x69\x6e\137\143\x75\163\164\157\155\145\162\x5f\x6b\145\x79") . "\x26\162\x65\x74\165\x72\156\165\162\x6c\75" . urlencode(site_url() . "\x2f\77\x6f\160\164\x69\157\x6e\75\x72\x65\141\x64\163\141\155\x6c\x6c\x6f\147\151\156\x26\x72\145\x64\151\x72\145\143\164\137\164\x6f\x3d" . urlencode($Un));
    Tx:
    header("\x4c\157\x63\141\x74\151\157\156\x3a\40" . $ex);
    die;
    MS:
    ET:
    QE:
    mb:
    if (!(array_key_exists("\123\101\115\114\122\145\163\160\x6f\x6e\163\145", $_REQUEST) && !empty($_REQUEST["\x53\x41\x4d\114\122\x65\x73\x70\157\156\x73\x65"]))) {
        goto Su;
    }
    $zW = get_option("\x6d\x6f\137\163\141\x6d\154\x5f\163\160\137\x62\141\x73\145\137\x75\162\x6c");
    if (!empty($zW)) {
        goto Ar;
    }
    $zW = home_url();
    Ar:
    $yg = $_REQUEST["\123\101\x4d\114\x52\145\x73\x70\157\x6e\x73\x65"];
    $yg = base64_decode($yg);
    if (!(array_key_exists("\x53\x41\x4d\x4c\122\x65\x73\x70\x6f\156\163\145", $_GET) && !empty($_GET["\x53\x41\115\x4c\122\x65\163\160\157\x6e\x73\145"]))) {
        goto cB;
    }
    $yg = gzinflate($yg);
    cB:
    $L_ = new DOMDocument();
    $L_->loadXML($yg);
    $bB = $L_->firstChild;
    $oL = $L_->documentElement;
    $tu = new DOMXpath($L_);
    $tu->registerNamespace("\x73\x61\155\154\x70", "\x75\162\156\x3a\x6f\x61\163\x69\163\x3a\x6e\x61\x6d\145\163\72\164\143\72\123\x41\115\x4c\x3a\62\56\x30\72\x70\162\x6f\x74\157\143\x6f\x6c");
    $tu->registerNamespace("\x73\x61\155\154", "\165\x72\156\x3a\157\x61\163\x69\x73\72\x6e\x61\x6d\x65\x73\72\x74\143\x3a\x53\x41\115\x4c\72\62\56\x30\x3a\141\x73\163\145\x72\x74\151\157\156");
    if ($bB->localName == "\114\157\147\x6f\165\x74\x52\x65\163\x70\157\x6e\163\145") {
        goto P8;
    }
    $rj = $tu->query("\x2f\x73\x61\x6d\154\x70\72\122\145\x73\160\x6f\156\x73\145\57\x73\x61\155\x6c\x70\72\x53\164\x61\164\165\x73\57\163\x61\x6d\x6c\x70\72\x53\x74\141\164\165\x73\103\x6f\x64\x65", $oL);
    $Pa = $rj->item(0)->getAttribute("\126\141\x6c\165\145");
    $k2 = explode("\72", $Pa);
    $rj = $k2[7];
    if (array_key_exists("\x52\x65\154\x61\x79\123\164\x61\x74\145", $_POST) && !empty($_POST["\x52\x65\x6c\141\x79\123\164\141\x74\145"]) && $_POST["\122\x65\x6c\x61\x79\x53\164\141\164\x65"] != "\x2f") {
        goto sn;
    }
    $mE = '';
    goto A_;
    sn:
    $mE = $_POST["\122\x65\x6c\x61\x79\x53\x74\141\164\145"];
    A_:
    if (!($rj != "\x53\x75\x63\x63\145\163\163")) {
        goto i7;
    }
    show_status_error($rj, $mE);
    i7:
    $Tx = maybe_unserialize(get_option("\x73\141\x6d\154\x5f\170\x35\60\x39\x5f\x63\x65\162\164\x69\146\151\143\141\x74\x65"));
    $f3 = $zW . "\x2f";
    $yg = new SAML2SPResponse($bB);
    $ki = $yg->getSignatureData();
    $mm = current($yg->getAssertions())->getSignatureData();
    if (!(empty($mm) && empty($ki))) {
        goto Ja;
    }
    echo "\x4e\x6f\40\163\151\x67\156\141\164\x75\162\x65\40\x66\x6f\165\x6e\144\x20\151\x6e\40\123\x41\115\114\x20\x52\x65\x73\160\157\156\x73\145\x20\x6f\162\40\101\x73\x73\x65\162\x74\151\157\156\56\x20\x50\x6c\145\141\x73\145\40\163\x69\147\x6e\40\x61\x74\40\154\x65\141\x73\x74\x20\x6f\156\145\40\x6f\x66\40\x74\150\145\x6d\56";
    die;
    Ja:
    if (is_array($Tx)) {
        goto Jp;
    }
    $kj = XMLSecurityKey::getRawThumbprint($Tx);
    $kj = iconv("\125\124\106\x2d\x38", "\103\120\x31\x32\65\x32\x2f\x2f\111\107\x4e\x4f\x52\x45", $kj);
    $kj = preg_replace("\57\x5c\x73\x2b\x2f", '', $kj);
    if (empty($ki)) {
        goto tj;
    }
    $y1 = SAMLSPUtilities::processResponse($f3, $kj, $ki, $yg, 0, $mE);
    tj:
    if (empty($mm)) {
        goto pV;
    }
    $y1 = SAMLSPUtilities::processResponse($f3, $kj, $mm, $yg, 0, $mE);
    pV:
    goto Ds;
    Jp:
    foreach ($Tx as $nz => $q0) {
        $kj = XMLSecurityKey::getRawThumbprint($q0);
        $kj = iconv("\125\124\x46\55\x38", "\103\120\61\62\x35\x32\57\57\x49\107\116\117\x52\105", $kj);
        $kj = preg_replace("\x2f\134\163\53\57", '', $kj);
        if (empty($ki)) {
            goto sO;
        }
        $y1 = SAMLSPUtilities::processResponse($f3, $kj, $ki, $yg, $nz, $mE);
        sO:
        if (empty($mm)) {
            goto IM;
        }
        $y1 = SAMLSPUtilities::processResponse($f3, $kj, $mm, $yg, $nz, $mE);
        IM:
        if (!$y1) {
            goto JL;
        }
        goto vt;
        JL:
        DJ:
    }
    vt:
    Ds:
    if ($ki) {
        goto EL;
    }
    if ($mm) {
        goto KI;
    }
    goto Bl;
    EL:
    $H2 = $ki["\103\145\162\x74\x69\x66\x69\x63\x61\164\x65\163"][0];
    goto Bl;
    KI:
    $H2 = $mm["\x43\x65\162\164\151\146\x69\143\x61\x74\x65\163"][0];
    Bl:
    if ($y1) {
        goto WU;
    }
    if ($mE == "\164\x65\x73\x74\x56\x61\x6c\151\x64\x61\164\145") {
        goto Do1;
    }
    wp_die("\127\145\x20\143\x6f\x75\x6c\144\40\156\x6f\x74\40\x73\151\147\156\x20\171\157\165\40\x69\x6e\x2e\40\x50\154\145\141\x73\145\x20\x63\x6f\156\x74\141\x63\164\40\141\x64\x6d\x69\x6e\151\x73\164\162\141\x74\157\x72", "\105\162\162\x6f\x72\x3a\x20\111\x6e\166\141\x6c\151\144\40\123\101\x4d\x4c\x20\122\x65\163\x70\x6f\156\163\x65");
    goto Tv;
    Do1:
    $xC = "\x2d\55\55\55\x2d\102\105\x47\111\x4e\x20\x43\x45\x52\124\111\x46\x49\103\101\124\105\x2d\55\55\x2d\x2d\74\x62\x72\76" . chunk_split($H2, 64) . "\x3c\x62\x72\76\55\55\x2d\55\x2d\x45\116\104\x20\x43\x45\x52\124\x49\x46\x49\x43\101\124\x45\x2d\x2d\55\x2d\x2d";
    echo "\x3c\x64\x69\166\x20\163\164\171\154\145\x3d\x22\x66\x6f\156\x74\55\x66\x61\155\x69\x6c\x79\72\x43\141\154\151\x62\x72\151\x3b\160\x61\144\144\151\156\x67\72\x30\x20\x33\45\x3b\x22\x3e";
    echo "\x3c\x64\151\166\x20\x73\164\171\x6c\145\75\x22\x63\x6f\154\157\162\72\40\x23\141\71\x34\64\x34\x32\73\x62\x61\x63\x6b\147\162\157\x75\x6e\x64\x2d\x63\157\154\x6f\x72\72\x20\43\146\x32\144\x65\x64\145\73\x70\x61\x64\x64\151\x6e\x67\x3a\40\x31\x35\160\170\73\155\141\162\147\x69\x6e\x2d\142\157\164\164\157\155\x3a\x20\x32\x30\x70\x78\x3b\x74\x65\170\x74\55\141\x6c\151\147\156\72\x63\145\x6e\x74\145\162\x3b\142\157\x72\x64\145\x72\72\61\x70\x78\x20\x73\x6f\x6c\151\x64\40\43\x45\x36\x42\x33\x42\x32\x3b\x66\157\156\x74\55\163\151\x7a\145\x3a\x31\x38\160\x74\73\42\x3e\40\105\x52\122\117\x52\74\57\x64\151\166\76\12\11\11\x9\x3c\x64\151\x76\40\163\164\171\x6c\x65\x3d\x22\x63\157\x6c\157\x72\x3a\40\43\141\71\x34\x34\x34\x32\x3b\x66\x6f\x6e\164\x2d\163\x69\172\x65\x3a\61\x34\x70\x74\73\x20\155\141\x72\147\151\156\55\x62\157\x74\164\157\155\72\62\x30\x70\170\x3b\x22\76\74\160\x3e\74\x73\x74\162\157\x6e\x67\76\105\x72\x72\157\162\x3a\x20\x3c\x2f\x73\x74\162\157\x6e\x67\x3e\125\x6e\x61\x62\154\x65\x20\x74\157\x20\146\x69\x6e\144\40\141\40\x63\145\x72\x74\151\146\x69\143\x61\x74\x65\40\155\141\164\x63\150\151\x6e\x67\x20\x74\150\x65\40\x63\x6f\156\146\x69\147\165\162\145\x64\x20\x66\x69\156\x67\x65\x72\160\162\151\x6e\164\56\74\57\x70\76\xa\x9\x9\11\74\160\76\x50\x6c\x65\141\163\x65\x20\x63\x6f\156\164\x61\x63\164\40\x79\157\165\162\40\141\144\x6d\151\156\x69\163\164\162\141\x74\x6f\162\x20\x61\x6e\x64\40\162\145\160\x6f\162\164\x20\x74\150\145\x20\x66\x6f\x6c\154\157\x77\x69\156\x67\x20\x65\x72\x72\x6f\162\x3a\74\x2f\x70\76\xa\11\x9\11\74\x70\76\x3c\x73\164\162\x6f\156\x67\x3e\x50\x6f\163\163\151\x62\x6c\145\x20\x43\141\x75\163\x65\x3a\40\74\57\x73\164\162\157\x6e\x67\76\47\x58\x2e\65\60\x39\x20\x43\145\x72\164\x69\x66\151\143\141\164\145\47\x20\146\x69\145\x6c\144\x20\x69\156\40\x70\154\165\x67\151\x6e\x20\144\x6f\145\163\x20\156\x6f\164\40\x6d\141\164\143\x68\40\x74\x68\145\40\x63\145\162\x74\151\146\151\x63\x61\x74\145\40\x66\157\165\156\x64\40\151\x6e\40\123\x41\x4d\x4c\40\x52\x65\x73\x70\157\x6e\163\145\x2e\x3c\x2f\160\76\xa\11\11\x9\x3c\x70\76\x3c\163\x74\162\157\156\147\76\x43\145\x72\164\x69\146\151\x63\141\x74\x65\x20\146\x6f\x75\x6e\144\40\x69\156\40\123\x41\115\114\40\122\x65\163\x70\157\156\163\145\x3a\40\74\57\163\x74\162\x6f\x6e\x67\76\x3c\146\157\156\164\x20\x66\x61\143\x65\75\42\103\157\x75\162\151\145\162\40\116\x65\x77\42\x3b\146\157\156\164\55\x73\x69\x7a\145\72\x31\x30\160\x74\76\x3c\x62\x72\x3e\74\x62\162\76" . $xC . "\74\57\160\76\74\57\146\157\156\x74\x3e\12\x9\x9\x9\x9\11\74\x2f\x64\x69\x76\x3e\12\x9\x9\x9\x9\11\74\144\151\x76\x20\163\164\x79\x6c\145\75\42\x6d\x61\x72\147\x69\156\x3a\63\45\73\144\x69\163\160\154\x61\x79\72\x62\154\157\x63\x6b\x3b\164\145\x78\x74\x2d\x61\154\x69\x67\x6e\72\143\145\156\164\x65\x72\73\42\x3e\12\11\x9\x9\x9\11\x3c\146\x6f\x72\155\x20\x61\x63\x74\x69\157\x6e\75\42\x69\x6e\144\145\x78\x2e\160\150\160\x22\x3e\12\x9\x9\11\x9\x9\x3c\144\x69\166\x20\163\164\171\154\145\75\42\x6d\x61\162\147\151\156\72\x33\x25\73\144\x69\x73\x70\154\141\171\72\x62\x6c\157\143\x6b\x3b\164\145\x78\x74\x2d\x61\154\x69\x67\156\72\x63\x65\x6e\x74\x65\x72\x3b\x22\76\x3c\151\x6e\160\165\x74\x20\x73\x74\x79\x6c\x65\x3d\x22\x70\141\x64\x64\151\156\147\72\x31\45\73\x77\x69\x64\164\x68\x3a\61\x30\x30\x70\x78\x3b\x62\141\x63\x6b\x67\x72\157\x75\156\144\x3a\x20\x23\x30\x30\71\61\103\x44\x20\156\157\156\x65\40\162\145\160\x65\x61\164\40\163\143\162\x6f\154\154\x20\x30\45\x20\60\45\73\x63\165\x72\x73\x6f\x72\x3a\40\160\x6f\151\156\164\x65\x72\x3b\146\x6f\x6e\164\x2d\x73\151\172\x65\72\x31\x35\160\x78\x3b\x62\157\162\144\x65\162\x2d\x77\x69\x64\164\x68\72\x20\x31\x70\x78\73\142\x6f\x72\x64\x65\x72\x2d\x73\164\171\154\145\72\x20\163\x6f\154\x69\144\x3b\142\157\162\144\x65\x72\55\x72\x61\144\x69\x75\163\72\40\x33\160\x78\73\167\150\151\164\145\x2d\163\x70\x61\143\x65\72\x20\156\157\x77\x72\141\160\x3b\x62\x6f\x78\55\x73\x69\172\151\x6e\x67\x3a\40\x62\x6f\162\x64\145\162\x2d\142\157\170\x3b\142\157\162\x64\145\x72\55\143\x6f\x6c\157\162\x3a\40\x23\60\60\x37\63\101\x41\73\142\157\x78\55\163\150\x61\x64\x6f\167\72\x20\x30\x70\x78\40\x31\160\x78\x20\60\x70\170\40\x72\147\142\141\x28\x31\x32\60\x2c\40\x32\x30\60\54\40\62\63\x30\54\40\x30\56\x36\51\40\x69\156\x73\145\x74\x3b\143\x6f\x6c\157\x72\72\x20\43\x46\x46\106\73\42\164\171\x70\x65\75\x22\x62\165\x74\x74\x6f\156\42\40\x76\141\154\165\145\75\x22\x44\157\156\145\x22\40\157\x6e\103\x6c\151\x63\153\x3d\x22\x73\145\154\146\x2e\143\x6c\157\163\x65\x28\x29\73\x22\76\x3c\57\x64\x69\x76\x3e";
    die;
    Tv:
    WU:
    $Ja = get_option("\163\x61\155\x6c\x5f\151\x73\163\x75\145\162");
    $ZD = get_option("\x6d\x6f\x5f\163\141\x6d\x6c\x5f\163\160\x5f\x65\156\164\151\164\171\137\x69\x64");
    if (!empty($ZD)) {
        goto dT;
    }
    $ZD = $zW . "\x2f\x77\x70\x2d\x63\x6f\x6e\x74\x65\x6e\164\57\160\154\x75\147\x69\x6e\163\57\155\151\156\x69\x6f\162\141\156\147\x65\55\163\x61\x6d\154\x2d\x32\x30\x2d\163\x69\x6e\147\x6c\145\x2d\x73\x69\147\156\x2d\x6f\156\x2f";
    dT:
    SAMLSPUtilities::validateIssuerAndAudience($yg, $ZD, $Ja, $mE);
    $gQ = current(current($yg->getAssertions())->getNameId());
    $Jn = current($yg->getAssertions())->getAttributes();
    $Jn["\116\141\x6d\x65\x49\x44"] = array("\x30" => $gQ);
    $yW = current($yg->getAssertions())->getSessionIndex();
    mo_saml_checkMapping($Jn, $mE, $yW);
    goto qb;
    P8:
    wp_logout();
    header("\114\x6f\143\141\x74\151\x6f\156\72\40" . home_url());
    die;
    qb:
    Su:
    if (!(array_key_exists("\123\x41\x4d\x4c\122\x65\161\x75\145\163\164", $_REQUEST) && !empty($_REQUEST["\123\101\115\x4c\122\x65\x71\165\145\x73\164"]))) {
        goto LH;
    }
    $zx = $_REQUEST["\x53\101\x4d\114\122\x65\161\x75\x65\163\164"];
    $mE = "\x2f";
    if (!array_key_exists("\x52\x65\154\141\171\x53\164\x61\x74\145", $_REQUEST)) {
        goto bh;
    }
    $mE = $_REQUEST["\122\x65\x6c\x61\171\x53\x74\x61\164\145"];
    bh:
    $zx = base64_decode($zx);
    if (!(array_key_exists("\x53\101\115\114\122\145\x71\x75\145\163\164", $_GET) && !empty($_GET["\x53\x41\115\x4c\x52\145\x71\x75\x65\163\164"]))) {
        goto MH;
    }
    $zx = gzinflate($zx);
    MH:
    $L_ = new DOMDocument();
    $L_->loadXML($zx);
    $L6 = $L_->firstChild;
    if (!($L6->localName == "\114\157\147\157\x75\x74\x52\145\x71\165\145\x73\x74")) {
        goto rt;
    }
    $et = new SAML2SPLogoutRequest($L6);
    if (!(!session_id() || session_id() == '' || !isset($_SESSION))) {
        goto FT;
    }
    session_start();
    FT:
    $_SESSION["\155\157\x5f\x73\141\x6d\x6c\137\154\x6f\x67\157\165\164\x5f\x72\x65\x71\x75\x65\163\x74"] = $zx;
    $_SESSION["\x6d\157\x5f\163\141\x6d\154\x5f\x6c\x6f\147\x6f\165\x74\x5f\162\145\154\141\x79\x5f\163\164\x61\x74\x65"] = $mE;
    wp_logout();
    rt:
    LH:
    if (!(isset($_REQUEST["\x6f\160\x74\151\x6f\x6e"]) and strpos($_REQUEST["\157\160\x74\151\157\x6e"], "\162\145\141\144\163\x61\x6d\154\154\157\147\151\156") !== false)) {
        goto EC;
    }
    require_once dirname(__FILE__) . "\57\x69\x6e\x63\154\x75\x64\145\x73\57\x6c\151\x62\x2f\x65\156\143\162\171\160\164\151\157\x6e\56\160\150\x70";
    if (isset($_POST["\x53\124\x41\124\125\x53"]) && $_POST["\123\x54\x41\124\x55\x53"] == "\x45\x52\122\117\122") {
        goto Qu;
    }
    if (!(isset($_POST["\123\124\x41\x54\125\x53"]) && $_POST["\123\124\x41\124\125\123"] == "\123\125\x43\x43\105\x53\123")) {
        goto DR;
    }
    $jL = '';
    if (!(isset($_REQUEST["\162\145\144\x69\x72\145\x63\164\137\x74\x6f"]) && !empty($_REQUEST["\x72\x65\x64\x69\x72\145\x63\x74\137\164\x6f"]) && $_REQUEST["\x72\145\x64\x69\162\x65\x63\x74\x5f\x74\157"] != "\x2f")) {
        goto G1;
    }
    $jL = $_REQUEST["\x72\x65\144\151\x72\145\143\x74\137\x74\157"];
    G1:
    delete_option("\x6d\157\137\163\141\155\x6c\137\162\145\x64\151\x72\145\x63\164\x5f\x65\x72\x72\x6f\162\x5f\143\157\144\145");
    delete_option("\155\157\x5f\x73\141\x6d\154\137\x72\x65\x64\151\x72\x65\x63\x74\137\x65\162\x72\x6f\x72\x5f\x72\145\x61\x73\x6f\x6e");
    try {
        $R4 = get_option("\x73\141\155\154\137\141\x6d\x5f\x65\x6d\141\151\154");
        $Br = get_option("\163\141\x6d\x6c\x5f\141\155\x5f\165\x73\145\x72\x6e\x61\155\x65");
        $OS = get_option("\x73\141\155\x6c\137\141\155\x5f\x66\x69\162\163\164\x5f\x6e\141\x6d\145");
        $O6 = get_option("\x73\141\x6d\154\x5f\x61\155\137\154\x61\x73\x74\x5f\156\x61\155\145");
        $dG = get_option("\163\x61\155\x6c\137\141\155\137\x67\x72\x6f\x75\160\x5f\156\141\155\x65");
        $ij = get_option("\x73\141\155\154\x5f\x61\155\x5f\x64\x65\146\141\165\x6c\x74\137\165\163\145\x72\137\162\157\x6c\145");
        $az = get_option("\x73\x61\x6d\154\137\141\155\137\x64\157\x6e\x74\x5f\x61\x6c\154\x6f\x77\137\165\156\x6c\x69\x73\164\145\x64\x5f\165\163\x65\x72\137\x72\x6f\x6c\x65");
        $V_ = get_option("\163\x61\x6d\154\137\141\155\137\141\x63\143\157\x75\x6e\x74\x5f\155\141\164\143\150\x65\162");
        $Ux = '';
        $PE = '';
        $OS = str_replace("\56", "\137", $OS);
        $OS = str_replace("\40", "\137", $OS);
        if (!(!empty($OS) && array_key_exists($OS, $_POST))) {
            goto dC;
        }
        $OS = $_POST[$OS];
        dC:
        $O6 = str_replace("\x2e", "\x5f", $O6);
        $O6 = str_replace("\x20", "\x5f", $O6);
        if (!(!empty($O6) && array_key_exists($O6, $_POST))) {
            goto lG;
        }
        $O6 = $_POST[$O6];
        lG:
        $Br = str_replace("\x2e", "\x5f", $Br);
        $Br = str_replace("\x20", "\x5f", $Br);
        if (!empty($Br) && array_key_exists($Br, $_POST)) {
            goto LX;
        }
        $PE = $_POST["\x4e\x61\155\x65\111\104"];
        goto YJ;
        LX:
        $PE = $_POST[$Br];
        YJ:
        $Ux = str_replace("\56", "\x5f", $R4);
        $Ux = str_replace("\x20", "\137", $R4);
        if (!empty($R4) && array_key_exists($R4, $_POST)) {
            goto yZ;
        }
        $Ux = $_POST["\116\141\155\145\x49\104"];
        goto PK;
        yZ:
        $Ux = $_POST[$R4];
        PK:
        $dG = str_replace("\x2e", "\137", $dG);
        $dG = str_replace("\40", "\x5f", $dG);
        if (!(!empty($dG) && array_key_exists($dG, $_POST))) {
            goto Ae;
        }
        $dG = $_POST[$dG];
        Ae:
        if (!empty($V_)) {
            goto h7;
        }
        $V_ = "\x65\155\141\x69\154";
        h7:
        $nz = get_option("\x6d\x6f\x5f\x73\141\155\x6c\137\x63\x75\163\164\x6f\155\x65\x72\137\164\x6f\153\145\156");
        if (!(isset($nz) || trim($nz) != '')) {
            goto XR;
        }
        $AU = AESEncryption::decrypt_data($Ux, $nz);
        $Ux = $AU;
        XR:
        if (!(!empty($OS) && !empty($nz))) {
            goto pv;
        }
        $ND = AESEncryption::decrypt_data($OS, $nz);
        $OS = $ND;
        pv:
        if (!(!empty($O6) && !empty($nz))) {
            goto iR;
        }
        $RE = AESEncryption::decrypt_data($O6, $nz);
        $O6 = $RE;
        iR:
        if (!(!empty($PE) && !empty($nz))) {
            goto oE;
        }
        $sA = AESEncryption::decrypt_data($PE, $nz);
        $PE = $sA;
        oE:
        if (!(!empty($dG) && !empty($nz))) {
            goto p4;
        }
        $L7 = AESEncryption::decrypt_data($dG, $nz);
        $dG = $L7;
        p4:
    } catch (Exception $El) {
        echo sprintf("\x41\x6e\x20\145\162\162\157\162\40\x6f\x63\143\x75\x72\x72\x65\144\x20\x77\150\x69\154\x65\40\160\x72\157\143\145\163\163\151\156\x67\x20\164\x68\145\x20\123\x41\x4d\114\40\x52\145\x73\160\157\x6e\x73\x65\x2e");
        die;
    }
    $kJ = array($dG);
    mo_saml_login_user($Ux, $OS, $O6, $PE, $kJ, $az, $ij, $jL, $V_);
    DR:
    goto QQ;
    Qu:
    update_option("\155\x6f\137\x73\141\x6d\154\137\x72\x65\144\x69\162\145\143\x74\x5f\x65\162\x72\157\x72\137\143\157\144\x65", $_POST["\105\122\122\x4f\122\137\x52\105\101\123\x4f\x4e"]);
    update_option("\155\x6f\x5f\163\x61\155\x6c\x5f\162\145\144\x69\162\x65\143\x74\x5f\x65\162\162\x6f\162\x5f\162\x65\141\163\x6f\156", $_POST["\x45\x52\x52\x4f\x52\137\115\x45\x53\123\x41\x47\x45"]);
    QQ:
    EC:
    CH:
}
function cldjkasjdksalc()
{
    $kt = plugin_dir_path(__FILE__);
    $i0 = wp_upload_dir();
    $X2 = home_url();
    $X2 = trim($X2, "\57");
    if (preg_match("\43\x5e\x68\164\x74\160\x28\x73\51\x3f\72\x2f\x2f\43", $X2)) {
        goto Mq;
    }
    $X2 = "\x68\x74\164\160\x3a\x2f\57" . $X2;
    Mq:
    $Ab = parse_url($X2);
    $D3 = preg_replace("\57\136\x77\167\167\134\56\x2f", '', $Ab["\x68\x6f\x73\x74"]);
    $gJ = $D3 . "\55" . $i0["\142\x61\163\145\x64\x69\162"];
    $xr = hash_hmac("\x73\150\141\x32\x35\66", $gJ, "\x34\x44\x48\146\x6a\x67\146\x6a\141\x73\156\144\x66\x73\141\x6a\146\x48\107\112");
    if (is_writable($kt . "\154\x69\143\145\156\x73\145")) {
        goto xq;
    }
    $ue = base64_decode("\x62\107\x4e\x6b\141\x6d\164\150\143\62\160\153\x61\63\x4e\x68\131\x32\167\75");
    $pk = get_option($ue);
    if (empty($pk)) {
        goto hp;
    }
    $RT = str_rot13($pk);
    hp:
    goto fA;
    xq:
    $pk = file_get_contents($kt . "\x6c\x69\x63\x65\x6e\163\145");
    if (!$pk) {
        goto Yq;
    }
    $RT = base64_encode($pk);
    Yq:
    fA:
    if (!empty($pk)) {
        goto zw;
    }
    $Sz = base64_decode("\124\107\154\x6a\x5a\x57\x35\x7a\132\x53\102\x47\x61\127\170\x6c\x49\x47\x31\160\x63\x33\116\160\142\x6d\143\147\x5a\x6e\x4a\x76\142\123\102\x30\x61\107\x55\147\143\x47\170\61\x5a\62\x6c\165\114\x67\75\x3d");
    wp_die($Sz);
    zw:
    if (strpos($RT, $xr) !== false) {
        goto pO;
    }
    $uh = new Customersaml();
    $nz = get_option("\x6d\157\x5f\x73\x61\155\x6c\x5f\x63\x75\163\x74\x6f\155\145\x72\x5f\164\157\153\145\156");
    $Az = AESEncryption::decrypt_data(get_option("\x73\155\154\137\x6c\153"), $nz);
    $YY = json_decode($uh->mo_saml_vl($Az, false), true);
    if (strcasecmp($YY["\x73\x74\x61\164\x75\x73"], "\123\125\x43\x43\105\123\x53") == 0) {
        goto kf;
    }
    $dX = base64_decode("\123\x57\65\62\x59\x57\x78\160\132\x43\x42\x4d\x61\x57\x4e\154\x62\156\116\154\111\105\x5a\x76\x64\x57\65\x6b\114\x69\x42\121\142\x47\126\150\x63\x32\x55\x67\x59\x32\71\165\144\107\x46\152\144\103\x42\x35\142\63\126\171\111\107\x46\153\142\127\154\x75\x61\x58\116\x30\x63\x6d\106\60\142\x33\111\x67\x64\107\x38\147\x64\x58\116\x6c\111\110\122\x6f\132\x53\102\x6a\142\63\x4a\x79\x5a\127\x4e\x30\x49\107\170\160\x59\62\126\x75\x63\x32\125\x75\x49\x45\132\x76\143\x69\x42\x74\x62\x33\x4a\154\111\107\x52\x6c\x64\x47\106\x70\x62\x48\115\163\x49\110\102\171\x62\x33\132\x70\x5a\x47\x55\147\x64\x47\150\x6c\x49\x46\x4a\x6c\132\x6d\x56\x79\x5a\127\65\152\132\x53\x42\112\122\104\157\147\124\x55\x38\171\x4e\x44\111\x34\x4d\124\101\x79\115\x54\x63\x77\116\x53\102\x30\142\171\102\x35\x62\x33\126\x79\111\x47\x46\x6b\x62\x57\154\x75\141\x58\x4e\60\x63\155\x46\60\x62\x33\x49\x67\144\x47\x38\147\x59\62\x68\x6c\x59\x32\x73\147\141\130\121\147\x64\127\x35\153\x5a\130\x49\x67\x53\x47\126\x73\143\x43\x41\x6d\x49\105\x5a\102\125\x53\102\x30\x59\x57\x49\x67\x61\x57\64\x67\x64\x47\x68\154\111\x48\102\163\144\127\x64\x70\142\x69\x34\75");
    $eU = base64_decode("\122\130\112\x79\x62\63\111\66\x49\105\x6c\165\x64\155\106\163\x61\127\x51\x67\124\107\x6c\x6a\x5a\127\x35\x7a\x5a\121\x3d\x3d");
    wp_die($dX, $eU);
    goto R5;
    kf:
    $kt = plugin_dir_path(__FILE__);
    $X2 = home_url();
    $X2 = trim($X2, "\x2f");
    if (preg_match("\43\x5e\x68\164\164\160\x28\x73\x29\x3f\72\57\x2f\43", $X2)) {
        goto eV;
    }
    $X2 = "\150\x74\164\160\x3a\x2f\x2f" . $X2;
    eV:
    $Ab = parse_url($X2);
    $D3 = preg_replace("\57\x5e\x77\x77\167\134\x2e\57", '', $Ab["\150\x6f\163\x74"]);
    $i0 = wp_upload_dir();
    $gJ = $D3 . "\55" . $i0["\x62\x61\x73\x65\x64\151\x72"];
    $xr = hash_hmac("\163\x68\x61\62\x35\x36", $gJ, "\x34\104\110\x66\152\x67\146\x6a\141\x73\x6e\144\x66\163\141\152\x66\x48\x47\112");
    $y0 = djkasjdksa();
    $dz = round(strlen($y0) / rand(2, 20));
    $y0 = substr_replace($y0, $xr, $dz, 0);
    $KW = base64_decode($y0);
    if (is_writable($kt . "\154\x69\143\145\156\163\145")) {
        goto tR;
    }
    $y0 = str_rot13($y0);
    $ue = base64_decode("\142\x47\x4e\x6b\141\155\164\x68\143\x32\160\x6b\x61\63\116\150\131\62\x77\x3d");
    update_option($ue, $y0);
    goto ce;
    tR:
    file_put_contents($kt . "\x6c\151\x63\145\x6e\163\x65", $KW);
    ce:
    return true;
    R5:
    goto UP;
    pO:
    return true;
    UP:
}
function djkasjdksa()
{
    $m4 = "\x21\176\100\x23\x24\45\x5e\46\52\x28\x29\137\x2b\x7c\173\175\x3c\76\77\x30\61\62\63\64\x35\x36\x37\x38\71\x61\x62\x63\x64\x65\x66\x67\x68\151\x6a\x6b\154\155\156\x6f\x70\x71\162\x73\x74\x75\166\x77\x78\171\x7a\101\102\103\x44\x45\x46\x47\110\111\112\113\x4c\115\x4e\x4f\x50\121\x52\x53\124\125\126\127\x58\x59\x5a";
    $HC = strlen($m4);
    $zM = '';
    $Qj = 0;
    ph:
    if (!($Qj < 10000)) {
        goto Qs;
    }
    $zM .= $m4[rand(0, $HC - 1)];
    nV:
    $Qj++;
    goto ph;
    Qs:
    return $zM;
}
function mo_saml_checkMapping($Jn, $mE, $yW)
{
    try {
        $R4 = get_option("\x73\141\155\x6c\137\x61\155\x5f\145\x6d\141\151\x6c");
        $Br = get_option("\163\x61\x6d\x6c\x5f\x61\x6d\x5f\x75\163\145\x72\156\141\155\145");
        $OS = get_option("\x73\x61\155\x6c\137\141\x6d\x5f\x66\151\x72\x73\164\x5f\x6e\x61\x6d\145");
        $O6 = get_option("\x73\x61\x6d\154\x5f\x61\x6d\x5f\154\141\163\x74\x5f\156\141\155\x65");
        $dG = get_option("\163\141\x6d\x6c\x5f\141\155\137\147\162\x6f\x75\160\x5f\156\x61\x6d\x65");
        $ij = get_option("\x73\141\x6d\154\137\141\155\x5f\144\145\x66\141\165\154\164\x5f\x75\x73\145\x72\137\x72\157\x6c\145");
        $az = get_option("\163\141\x6d\x6c\137\141\155\x5f\x64\157\x6e\x74\x5f\141\154\154\x6f\167\x5f\x75\156\x6c\151\163\164\145\x64\137\x75\163\145\x72\137\x72\x6f\x6c\x65");
        $V_ = get_option("\163\x61\155\154\137\x61\155\x5f\x61\x63\143\x6f\165\156\164\137\155\141\164\143\x68\145\162");
        $Ux = '';
        $PE = '';
        if (empty($Jn)) {
            goto UG;
        }
        if (!empty($OS) && array_key_exists($OS, $Jn)) {
            goto C5;
        }
        $OS = '';
        goto Rx;
        C5:
        $OS = $Jn[$OS][0];
        Rx:
        if (!empty($O6) && array_key_exists($O6, $Jn)) {
            goto XD;
        }
        $O6 = '';
        goto k9;
        XD:
        $O6 = $Jn[$O6][0];
        k9:
        if (!empty($Br) && array_key_exists($Br, $Jn)) {
            goto cu;
        }
        $PE = $Jn["\116\x61\x6d\145\111\104"][0];
        goto kp;
        cu:
        $PE = $Jn[$Br][0];
        kp:
        if (!empty($R4) && array_key_exists($R4, $Jn)) {
            goto oA;
        }
        $Ux = $Jn["\x4e\141\x6d\x65\x49\104"][0];
        goto JK;
        oA:
        $Ux = $Jn[$R4][0];
        JK:
        if (!empty($dG) && array_key_exists($dG, $Jn)) {
            goto Zp;
        }
        $dG = array();
        goto Lk;
        Zp:
        $dG = $Jn[$dG];
        Lk:
        if (!empty($V_)) {
            goto AC;
        }
        $V_ = "\x65\155\x61\151\154";
        AC:
        UG:
        if ($mE == "\164\x65\163\x74\x56\141\x6c\x69\x64\141\164\145") {
            goto ii;
        }
        mo_saml_login_user($Ux, $OS, $O6, $PE, $dG, $az, $ij, $mE, $V_, $yW, $Jn["\116\x61\155\x65\x49\104"][0], $Jn);
        goto gP;
        ii:
        mo_saml_show_test_result($OS, $O6, $Ux, $dG, $Jn);
        gP:
    } catch (Exception $El) {
        echo sprintf("\101\156\x20\145\x72\162\157\x72\x20\x6f\143\143\165\162\x72\145\144\x20\x77\150\151\x6c\145\x20\160\x72\157\x63\x65\x73\163\x69\x6e\x67\40\164\x68\145\40\x53\x41\x4d\x4c\x20\122\145\163\160\157\x6e\x73\145\56");
        die;
    }
}
function mo_saml_show_test_result($OS, $O6, $Ux, $dG, $Jn)
{
    echo "\74\x64\x69\166\x20\x73\x74\171\x6c\x65\x3d\x22\x66\157\x6e\x74\x2d\x66\141\155\151\154\171\72\x43\141\x6c\151\x62\162\x69\73\160\x61\x64\144\x69\x6e\147\x3a\x30\x20\63\45\x3b\42\76";
    if (!empty($Ux)) {
        goto od;
    }
    echo "\74\144\x69\166\x20\163\x74\x79\154\145\75\42\143\157\154\157\162\x3a\x20\x23\x61\x39\x34\64\x34\x32\73\x62\141\143\x6b\147\162\157\x75\156\144\x2d\x63\x6f\154\x6f\162\72\40\43\146\62\144\x65\x64\x65\73\160\x61\x64\x64\x69\x6e\x67\72\40\61\x35\x70\x78\x3b\155\x61\x72\147\151\x6e\x2d\x62\157\x74\x74\x6f\155\x3a\40\62\x30\x70\x78\x3b\164\145\x78\164\x2d\x61\x6c\151\147\x6e\72\x63\x65\x6e\164\145\162\x3b\x62\157\x72\x64\x65\162\72\61\160\170\40\163\x6f\x6c\151\144\x20\x23\105\x36\x42\63\x42\62\x3b\x66\157\x6e\x74\55\163\x69\x7a\145\x3a\61\70\x70\x74\x3b\42\x3e\124\x45\x53\124\40\106\101\111\114\105\104\74\57\144\x69\x76\x3e\xa\x9\x9\x9\11\74\144\x69\x76\x20\163\164\171\154\x65\75\x22\x63\x6f\154\x6f\162\x3a\40\x23\141\x39\x34\64\64\62\x3b\146\x6f\x6e\164\55\163\x69\x7a\145\72\x31\x34\160\164\x3b\40\x6d\141\162\147\151\x6e\55\x62\x6f\x74\x74\x6f\x6d\72\x32\x30\x70\170\73\x22\x3e\127\101\x52\x4e\111\116\x47\72\40\123\x6f\155\x65\40\101\x74\x74\x72\151\x62\x75\x74\145\x73\40\104\x69\144\40\116\x6f\x74\40\115\x61\164\143\150\56\74\x2f\x64\151\166\x3e\xa\x9\x9\11\x9\74\144\x69\166\40\x73\164\x79\154\x65\x3d\42\144\x69\163\x70\x6c\141\171\72\142\154\x6f\x63\153\x3b\164\x65\x78\x74\55\x61\154\x69\x67\156\x3a\143\145\156\164\145\x72\x3b\x6d\141\x72\x67\151\156\x2d\x62\x6f\164\x74\x6f\155\x3a\64\45\x3b\42\x3e\74\x69\155\147\x20\163\164\x79\x6c\145\75\42\167\151\x64\x74\x68\72\61\x35\45\x3b\42\x73\x72\x63\x3d\x22" . plugin_dir_url(__FILE__) . "\x69\x6d\x61\147\x65\163\x2f\x77\162\x6f\156\x67\56\x70\156\x67\x22\x3e\74\x2f\144\151\x76\x3e";
    goto eR;
    od:
    echo "\74\144\x69\166\x20\163\164\x79\x6c\145\75\x22\x63\x6f\x6c\x6f\162\72\x20\x23\x33\x63\x37\x36\63\x64\73\xa\11\11\11\x9\142\x61\x63\153\x67\x72\x6f\x75\156\144\x2d\143\x6f\154\157\x72\72\x20\x23\144\146\146\60\x64\70\x3b\x20\160\141\144\144\151\x6e\147\x3a\62\45\73\155\141\x72\x67\x69\x6e\x2d\x62\x6f\x74\164\x6f\155\x3a\62\x30\x70\x78\73\164\x65\170\x74\55\141\x6c\151\147\x6e\72\143\145\156\164\x65\x72\x3b\x20\x62\157\162\144\x65\162\x3a\61\x70\x78\x20\x73\x6f\154\151\x64\40\x23\x41\105\104\102\x39\x41\73\40\146\157\x6e\x74\x2d\x73\x69\x7a\145\72\x31\x38\160\x74\73\42\76\124\105\123\124\x20\123\125\x43\103\105\123\123\x46\x55\x4c\74\x2f\x64\151\166\x3e\xa\x9\11\x9\11\74\x64\151\x76\x20\163\164\171\154\x65\x3d\42\x64\x69\163\160\154\141\x79\x3a\x62\x6c\157\x63\153\x3b\x74\x65\x78\x74\55\x61\154\x69\147\156\x3a\143\145\x6e\164\x65\x72\x3b\x6d\x61\x72\147\151\156\55\x62\x6f\x74\x74\157\155\x3a\64\45\73\42\x3e\x3c\151\155\x67\x20\x73\x74\171\154\x65\75\42\167\x69\x64\164\150\72\x31\x35\x25\x3b\42\163\x72\x63\75\x22" . plugin_dir_url(__FILE__) . "\151\x6d\141\x67\145\163\57\147\162\145\x65\x6e\x5f\143\x68\x65\143\x6b\x2e\x70\156\x67\x22\x3e\x3c\57\144\x69\x76\x3e";
    eR:
    $ZZ = get_option("\163\141\x6d\x6c\137\x61\155\x5f\141\x63\143\x6f\x75\x6e\x74\137\x6d\141\x74\143\150\145\x72") ? get_option("\x73\141\x6d\154\137\141\155\137\141\x63\143\157\165\x6e\x74\137\155\x61\164\143\x68\x65\x72") : "\145\x6d\x61\151\154";
    if (!($ZZ == "\145\x6d\141\151\x6c" && !filter_var($Ux, FILTER_VALIDATE_EMAIL))) {
        goto KU;
    }
    echo "\x3c\x70\76\74\146\157\x6e\164\x20\143\157\x6c\x6f\162\75\x22\x23\x46\106\60\60\x30\x30\x22\x20\163\x74\x79\154\145\75\42\x66\157\x6e\164\55\x73\151\172\x65\72\61\64\x70\164\42\76\50\x57\x61\162\x6e\151\156\147\x3a\40\124\x68\145\40\x41\164\164\162\151\142\165\164\x65\40\42";
    echo get_option("\163\141\155\154\137\141\x6d\137\145\155\141\x69\154") ? get_option("\x73\x61\x6d\x6c\x5f\x61\x6d\x5f\145\x6d\141\151\154") : "\116\141\155\145\x49\104";
    echo "\42\x20\144\x6f\x65\163\x20\156\x6f\164\40\143\x6f\x6e\x74\x61\151\156\40\166\141\154\151\x64\x20\x45\155\141\x69\154\x20\111\104\51\x3c\57\146\157\156\x74\x3e\74\57\160\76";
    KU:
    echo "\x3c\163\160\x61\x6e\x20\163\x74\x79\154\145\75\42\x66\x6f\x6e\x74\55\163\x69\x7a\145\x3a\61\x34\160\164\73\x22\76\74\142\x3e\x48\145\x6c\x6c\157\x3c\x2f\x62\76\x2c\x20" . $Ux . "\74\57\163\160\141\x6e\76\74\x62\x72\x2f\76\74\160\40\x73\x74\x79\154\145\75\x22\146\157\x6e\x74\x2d\x77\x65\151\x67\150\164\72\142\157\x6c\144\73\146\x6f\x6e\164\55\163\151\172\145\72\x31\64\160\x74\73\155\x61\x72\x67\x69\x6e\x2d\154\145\x66\164\x3a\61\45\73\42\76\101\124\124\x52\x49\102\x55\124\105\123\x20\x52\105\x43\105\111\126\105\x44\72\x3c\57\160\x3e\12\11\x9\x9\11\x3c\164\x61\142\154\x65\x20\x73\x74\171\154\145\x3d\42\x62\x6f\162\x64\145\x72\55\x63\x6f\x6c\x6c\x61\x70\x73\145\x3a\143\x6f\154\154\141\160\x73\x65\x3b\x62\x6f\162\144\145\x72\x2d\x73\x70\x61\143\151\156\x67\72\x30\73\40\x64\151\x73\160\154\x61\171\x3a\164\141\142\x6c\x65\73\x77\151\x64\164\150\x3a\x31\60\x30\x25\73\x20\146\x6f\x6e\164\x2d\163\x69\x7a\x65\x3a\61\64\x70\164\x3b\142\141\x63\x6b\x67\x72\157\x75\156\x64\x2d\x63\157\x6c\157\x72\72\x23\105\x44\105\x44\105\x44\x3b\x22\76\12\x9\x9\x9\11\74\164\162\40\163\164\x79\154\145\x3d\42\x74\145\x78\164\x2d\x61\x6c\x69\147\x6e\x3a\x63\145\x6e\x74\145\162\73\x22\76\x3c\x74\x64\x20\163\164\171\154\x65\x3d\42\x66\x6f\156\x74\55\x77\x65\151\147\x68\164\72\x62\x6f\x6c\144\x3b\142\157\x72\x64\145\x72\x3a\x32\x70\x78\40\163\x6f\154\x69\144\x20\43\x39\64\71\x30\x39\60\73\160\x61\x64\x64\151\x6e\147\72\62\45\73\x22\76\x41\124\x54\x52\111\102\x55\124\x45\40\x4e\101\115\105\74\x2f\164\x64\x3e\74\x74\x64\40\163\164\x79\x6c\x65\75\42\146\157\x6e\164\x2d\167\x65\151\x67\x68\164\72\142\157\154\144\73\x70\x61\x64\144\x69\x6e\147\72\62\45\73\142\157\162\144\145\x72\72\62\x70\170\40\163\157\x6c\151\x64\x20\x23\71\64\71\x30\71\x30\73\x20\167\157\x72\x64\55\x77\x72\x61\x70\72\x62\x72\145\x61\153\55\x77\x6f\162\x64\73\42\x3e\101\x54\x54\x52\x49\102\125\124\105\x20\x56\x41\x4c\125\105\74\x2f\164\144\x3e\74\x2f\164\162\76";
    if (!empty($Jn)) {
        goto wk;
    }
    echo "\116\x6f\40\101\x74\164\x72\151\x62\165\164\145\163\x20\122\145\x63\x65\x69\166\145\x64\x2e";
    goto Ly;
    wk:
    foreach ($Jn as $nz => $q0) {
        echo "\74\x74\162\76\74\164\144\40\x73\x74\171\154\x65\75\x27\146\157\x6e\164\x2d\x77\145\151\147\x68\x74\x3a\142\x6f\154\x64\x3b\142\157\162\x64\145\162\72\x32\x70\x78\40\163\x6f\x6c\151\144\40\43\71\64\71\60\71\x30\73\160\x61\x64\x64\x69\156\x67\72\x32\45\x3b\x27\76" . $nz . "\74\x2f\164\144\76\x3c\164\x64\x20\163\164\171\x6c\145\75\x27\160\x61\x64\144\151\156\x67\x3a\x32\45\73\142\x6f\x72\x64\x65\162\x3a\62\x70\x78\x20\163\157\x6c\x69\144\x20\x23\x39\x34\x39\x30\x39\x30\x3b\x20\x77\x6f\162\144\x2d\x77\162\x61\160\x3a\x62\x72\x65\x61\153\55\167\157\x72\x64\x3b\x27\x3e" . implode("\74\150\x72\57\x3e", $q0) . "\74\57\164\144\76\x3c\57\x74\162\76";
        tE:
    }
    sI:
    Ly:
    echo "\x3c\57\164\x61\142\154\145\x3e\x3c\57\x64\151\166\x3e";
    echo "\74\144\151\x76\x20\163\x74\x79\x6c\145\75\42\155\x61\x72\x67\x69\156\x3a\63\x25\x3b\144\151\x73\x70\x6c\141\171\72\142\x6c\x6f\x63\153\73\164\x65\x78\164\x2d\141\x6c\x69\147\156\72\x63\x65\156\x74\x65\162\x3b\x22\x3e\x3c\151\x6e\x70\165\164\40\163\x74\x79\x6c\x65\75\42\160\141\144\x64\151\156\x67\72\61\45\x3b\167\151\144\164\x68\x3a\61\x30\60\x70\170\73\x62\141\143\x6b\x67\162\157\165\156\144\72\x20\x23\x30\60\71\61\x43\x44\40\156\x6f\156\x65\40\x72\x65\x70\x65\x61\x74\40\163\143\162\x6f\154\x6c\x20\x30\45\x20\60\x25\73\x63\x75\162\x73\157\x72\72\x20\x70\x6f\151\156\164\x65\x72\73\x66\157\x6e\x74\x2d\163\x69\x7a\145\x3a\x31\x35\x70\x78\73\x62\x6f\x72\144\145\x72\55\167\151\x64\x74\150\x3a\x20\x31\x70\x78\x3b\142\x6f\x72\x64\x65\x72\55\x73\164\171\x6c\x65\72\40\163\x6f\154\x69\x64\73\x62\x6f\162\144\x65\162\x2d\x72\141\144\x69\165\x73\72\x20\63\x70\x78\73\x77\x68\151\164\145\x2d\x73\160\x61\x63\145\72\x20\x6e\157\167\x72\141\160\73\142\157\170\55\163\x69\172\x69\156\147\x3a\40\142\157\162\x64\145\x72\x2d\142\x6f\170\x3b\142\x6f\x72\x64\x65\x72\x2d\143\x6f\154\157\162\72\x20\x23\x30\x30\67\x33\101\101\x3b\142\x6f\x78\55\x73\150\x61\x64\x6f\167\72\40\60\x70\x78\x20\61\160\170\40\60\x70\170\x20\x72\x67\142\141\x28\x31\x32\x30\x2c\x20\62\x30\60\54\40\62\63\x30\54\40\60\56\66\51\x20\x69\x6e\163\x65\164\73\x63\157\x6c\157\162\72\40\x23\106\x46\x46\x3b\42\164\171\x70\x65\x3d\42\x62\165\x74\164\157\156\x22\x20\x76\x61\x6c\165\145\75\x22\104\x6f\156\145\42\x20\x6f\x6e\103\154\151\143\153\x3d\42\163\145\154\x66\x2e\x63\x6c\x6f\163\145\x28\51\73\42\76\74\x2f\144\x69\x76\76";
    die;
}
function mo_saml_login_user($Ux, $OS, $O6, $PE, $dG, $az, $ij, $mE, $V_, $yW = '', $RM = '', $Jn = null)
{
    check_if_user_sllowed_to_login_due_to_role_restriction($dG);
    $zW = get_option("\x6d\157\x5f\163\141\x6d\x6c\137\163\160\x5f\x62\141\163\x65\x5f\165\162\154");
    if (!empty($zW)) {
        goto dP;
    }
    $zW = home_url();
    dP:
    if ($V_ == "\165\x73\145\x72\x6e\x61\155\145" && username_exists($PE)) {
        goto qw;
    }
    if (email_exists($Ux)) {
        goto Ah;
    }
    if (!username_exists($PE) && !email_exists($Ux)) {
        goto o4;
    }
    if (username_exists($PE) && !email_exists($Ux)) {
        goto Of;
    }
    goto Lr;
    qw:
    $user = get_user_by("\x6c\157\x67\151\156", $PE);
    $xh = $user->ID;
    if (empty($OS)) {
        goto Q2;
    }
    $aq = wp_update_user(array("\x49\x44" => $xh, "\146\x69\162\x73\164\137\156\x61\155\145" => $OS));
    Q2:
    if (empty($O6)) {
        goto Oa;
    }
    $aq = wp_update_user(array("\111\104" => $xh, "\x6c\141\x73\164\x5f\x6e\x61\155\x65" => $O6));
    Oa:
    if (empty($Ux)) {
        goto eL;
    }
    $aq = wp_update_user(array("\x49\104" => $xh, "\x75\x73\145\x72\x5f\145\155\141\151\154" => $Ux));
    eL:
    if (!get_option("\x6d\x6f\x5f\x73\x61\155\x6c\137\x63\165\163\164\157\x6d\137\x61\x74\x74\162\163\137\x6d\x61\x70\160\x69\x6e\x67")) {
        goto z2;
    }
    $j5 = get_option("\155\157\x5f\163\x61\x6d\154\x5f\143\x75\163\164\x6f\x6d\137\x61\164\164\x72\163\137\x6d\141\160\160\x69\x6e\x67");
    foreach ($j5 as $nz => $q0) {
        if (!array_key_exists($q0, $Jn)) {
            goto Ld;
        }
        $L5 = $Jn[$q0][0];
        update_user_meta($xh, $nz, $L5);
        Ld:
        qX:
    }
    f1:
    z2:
    $Re = get_option("\163\x61\x6d\x6c\137\x61\155\137\144\x6f\156\164\x5f\165\160\x64\x61\x74\x65\x5f\x65\x78\151\163\x74\x69\156\x67\x5f\165\x73\145\162\137\162\157\154\145");
    if (!(empty($Re) || $Re != "\x63\150\x65\143\x6b\145\x64")) {
        goto jb;
    }
    $QX = get_option("\x73\x61\x6d\154\137\x61\155\x5f\162\x6f\154\145\x5f\x6d\x61\x70\160\151\x6e\147");
    $on = assign_roles_to_user($user, $QX, $dG);
    if ($on !== true && !is_administrator_user($user) && !empty($az) && $az == "\x63\150\145\143\x6b\x65\144") {
        goto mW;
    }
    if ($on !== true && !is_administrator_user($user) && !empty($ij)) {
        goto mF;
    }
    goto z9;
    mW:
    $aq = wp_update_user(array("\x49\x44" => $xh, "\x72\x6f\154\145" => false));
    goto z9;
    mF:
    $aq = wp_update_user(array("\111\x44" => $xh, "\162\x6f\154\145" => $ij));
    z9:
    jb:
    if (is_null($Jn)) {
        goto yl;
    }
    update_user_meta($xh, "\155\x6f\137\x73\x61\155\x6c\137\x75\x73\x65\x72\x5f\x61\164\164\162\151\142\165\164\145\x73", $Jn);
    $Is = get_option("\x73\x61\155\x6c\137\x61\x6d\137\144\151\163\160\154\141\x79\x5f\156\x61\155\145");
    if (empty($Is)) {
        goto tb;
    }
    if (strcmp($Is, "\125\123\105\x52\x4e\101\x4d\105") == 0) {
        goto FN;
    }
    if (strcmp($Is, "\106\116\x41\115\x45") == 0 && !empty($OS)) {
        goto Ed;
    }
    if (strcmp($Is, "\x4c\x4e\x41\x4d\105") == 0 && !empty($O6)) {
        goto Ea;
    }
    if (strcmp($Is, "\106\116\101\115\x45\137\x4c\116\101\115\x45") == 0 && !empty($O6) && !empty($OS)) {
        goto Pf;
    }
    if (!(strcmp($Is, "\114\116\x41\x4d\105\x5f\x46\x4e\x41\x4d\x45") == 0 && !empty($O6) && !empty($OS))) {
        goto fL;
    }
    $aq = wp_update_user(array("\x49\x44" => $xh, "\x64\x69\x73\160\154\x61\x79\137\x6e\x61\x6d\145" => $O6 . "\40" . $OS));
    fL:
    goto ic;
    Pf:
    $aq = wp_update_user(array("\111\104" => $xh, "\x64\x69\163\x70\154\141\171\137\x6e\x61\155\145" => $OS . "\x20" . $O6));
    ic:
    goto h2;
    Ea:
    $aq = wp_update_user(array("\111\104" => $xh, "\144\x69\x73\x70\154\141\x79\x5f\x6e\141\155\145" => $O6));
    h2:
    goto wo;
    Ed:
    $aq = wp_update_user(array("\x49\x44" => $xh, "\x64\x69\163\x70\154\x61\x79\137\156\x61\155\145" => $OS));
    wo:
    goto gg;
    FN:
    $aq = wp_update_user(array("\x49\104" => $xh, "\x64\x69\x73\x70\154\141\171\x5f\x6e\x61\x6d\145" => $user->user_login));
    gg:
    tb:
    yl:
    wp_set_current_user($xh);
    wp_set_auth_cookie($xh);
    $user = get_user_by("\151\144", $xh);
    do_action("\167\160\137\154\x6f\x67\151\156", $user->user_login, $user);
    if (empty($yW)) {
        goto qZ;
    }
    update_user_meta($xh, "\155\157\137\x73\141\155\x6c\x5f\163\x65\x73\163\x69\x6f\156\x5f\151\156\144\x65\x78", $yW);
    qZ:
    if (empty($RM)) {
        goto yI;
    }
    update_user_meta($xh, "\155\x6f\137\163\141\x6d\154\x5f\156\x61\155\145\x5f\x69\x64", $RM);
    yI:
    if (!(!session_id() || session_id() == '' || !isset($_SESSION))) {
        goto Ke;
    }
    session_start();
    Ke:
    $_SESSION["\x6d\157\x5f\x73\x61\x6d\154"]["\154\x6f\x67\x67\145\x64\x5f\x69\x6e\137\x77\x69\x74\x68\137\x69\x64\x70"] = TRUE;
    $hF = get_option("\x6d\157\137\163\141\155\154\x5f\162\145\x6c\141\x79\x5f\x73\x74\141\164\x65");
    if (!empty($hF)) {
        goto C7;
    }
    if (!empty($mE)) {
        goto SM;
    }
    wp_redirect($zW);
    goto KW;
    SM:
    wp_redirect($mE);
    KW:
    goto aT;
    C7:
    wp_redirect($hF);
    aT:
    die;
    goto Lr;
    Ah:
    $user = get_user_by("\145\x6d\141\151\x6c", $Ux);
    $xh = $user->ID;
    if (empty($OS)) {
        goto LV;
    }
    $aq = wp_update_user(array("\x49\104" => $xh, "\x66\151\x72\x73\x74\x5f\156\141\155\x65" => $OS));
    LV:
    if (empty($O6)) {
        goto zb;
    }
    $aq = wp_update_user(array("\111\x44" => $xh, "\154\x61\163\164\137\x6e\141\x6d\145" => $O6));
    zb:
    if (!get_option("\155\x6f\137\x73\141\155\x6c\x5f\143\165\x73\x74\x6f\x6d\x5f\141\164\x74\x72\163\137\155\141\x70\x70\151\x6e\147")) {
        goto fo;
    }
    $j5 = get_option("\x6d\157\x5f\163\141\155\x6c\x5f\143\165\x73\164\x6f\155\x5f\141\164\x74\162\x73\x5f\x6d\141\160\x70\x69\x6e\x67");
    foreach ($j5 as $nz => $q0) {
        if (!array_key_exists($q0, $Jn)) {
            goto fT;
        }
        $L5 = $Jn[$q0][0];
        update_user_meta($xh, $nz, $L5);
        fT:
        Kt:
    }
    iE:
    fo:
    $QX = get_option("\163\141\x6d\x6c\x5f\x61\x6d\137\162\157\154\145\137\155\x61\160\160\x69\x6e\147");
    $Re = get_option("\x73\x61\x6d\x6c\137\x61\x6d\x5f\x64\157\156\164\137\x75\x70\x64\141\164\x65\x5f\x65\170\151\163\x74\151\156\x67\x5f\165\x73\x65\x72\137\x72\157\x6c\145");
    if (!(empty($Re) || $Re != "\x63\x68\145\143\153\x65\144")) {
        goto QX;
    }
    $on = assign_roles_to_user($user, $QX, $dG);
    if ($on !== true && !is_administrator_user($user) && !empty($az) && $az == "\x63\150\x65\143\x6b\145\144") {
        goto qv;
    }
    if ($on !== true && !is_administrator_user($user) && !empty($ij)) {
        goto vr;
    }
    goto GM;
    qv:
    $aq = wp_update_user(array("\x49\x44" => $xh, "\162\157\x6c\145" => false));
    goto GM;
    vr:
    $aq = wp_update_user(array("\x49\104" => $xh, "\x72\157\x6c\x65" => $ij));
    GM:
    QX:
    if (is_null($Jn)) {
        goto DV;
    }
    update_user_meta($xh, "\x6d\x6f\x5f\163\x61\x6d\154\x5f\165\163\x65\162\137\x61\164\x74\x72\x69\142\165\x74\x65\x73", $Jn);
    $Is = get_option("\163\x61\155\154\137\141\155\137\144\151\163\160\x6c\141\x79\137\156\x61\x6d\145");
    if (empty($Is)) {
        goto zX;
    }
    if (strcmp($Is, "\125\123\x45\x52\x4e\x41\115\x45") == 0) {
        goto MF;
    }
    if (strcmp($Is, "\x46\x4e\x41\x4d\105") == 0 && !empty($OS)) {
        goto rN;
    }
    if (strcmp($Is, "\114\116\101\x4d\105") == 0 && !empty($O6)) {
        goto Q0;
    }
    if (strcmp($Is, "\x46\x4e\101\115\x45\x5f\114\116\101\x4d\x45") == 0 && !empty($O6) && !empty($OS)) {
        goto R_;
    }
    if (!(strcmp($Is, "\x4c\116\x41\x4d\x45\x5f\x46\116\101\x4d\x45") == 0 && !empty($O6) && !empty($OS))) {
        goto Ny;
    }
    $aq = wp_update_user(array("\x49\104" => $xh, "\144\151\x73\160\154\141\x79\137\156\x61\155\145" => $O6 . "\x20" . $OS));
    Ny:
    goto uH;
    R_:
    $aq = wp_update_user(array("\x49\x44" => $xh, "\144\x69\163\160\x6c\x61\x79\137\156\141\x6d\145" => $OS . "\40" . $O6));
    uH:
    goto HY;
    Q0:
    $aq = wp_update_user(array("\x49\104" => $xh, "\144\x69\163\160\x6c\141\x79\x5f\x6e\x61\x6d\145" => $O6));
    HY:
    goto La;
    rN:
    $aq = wp_update_user(array("\111\104" => $xh, "\x64\151\163\160\154\141\171\137\x6e\x61\155\x65" => $OS));
    La:
    goto md;
    MF:
    $aq = wp_update_user(array("\111\x44" => $xh, "\x64\151\163\x70\x6c\141\171\x5f\156\x61\x6d\x65" => $user->user_login));
    md:
    zX:
    DV:
    wp_set_current_user($xh);
    wp_set_auth_cookie($xh);
    $user = get_user_by("\151\144", $xh);
    do_action("\x77\x70\x5f\154\157\x67\151\156", $user->user_login, $user);
    if (empty($yW)) {
        goto YC;
    }
    update_user_meta($xh, "\155\x6f\137\x73\141\155\x6c\137\x73\145\163\163\151\x6f\156\137\x69\x6e\144\x65\x78", $yW);
    YC:
    if (empty($RM)) {
        goto Wv;
    }
    update_user_meta($xh, "\155\x6f\137\163\x61\x6d\154\137\156\x61\x6d\145\x5f\151\144", $RM);
    Wv:
    if (!(!session_id() || session_id() == '' || !isset($_SESSION))) {
        goto Or1;
    }
    session_start();
    Or1:
    $_SESSION["\155\x6f\x5f\163\141\x6d\x6c"]["\154\x6f\147\147\x65\x64\x5f\151\x6e\x5f\167\151\164\x68\x5f\151\144\160"] = TRUE;
    $hF = get_option("\x6d\157\x5f\x73\x61\x6d\154\x5f\162\145\154\x61\x79\x5f\x73\164\x61\164\x65");
    if (!empty($hF)) {
        goto d8;
    }
    if (!empty($mE)) {
        goto Nz;
    }
    wp_redirect($zW);
    goto HE;
    Nz:
    wp_redirect($mE);
    HE:
    goto VS;
    d8:
    wp_redirect($hF);
    VS:
    die;
    goto Lr;
    o4:
    $QX = get_option("\163\x61\x6d\154\137\141\155\x5f\x72\x6f\154\145\x5f\x6d\141\x70\x70\151\156\147");
    $t0 = true;
    $Wm = get_option("\155\157\137\163\141\155\x6c\137\144\x6f\156\x74\x5f\143\x72\145\141\164\x65\137\165\163\x65\x72\x5f\x69\x66\137\x72\157\154\145\137\x6e\x6f\164\x5f\155\141\160\x70\145\x64");
    if (!(!empty($Wm) && strcmp($Wm, "\143\150\x65\x63\x6b\x65\x64") == 0)) {
        goto j_;
    }
    $j1 = is_role_mapping_configured_for_user($QX, $dG);
    $t0 = $j1;
    j_:
    if ($t0 === true) {
        goto vR;
    }
    $uJ = "\x57\x65\x20\143\157\x75\154\x64\x20\x6e\157\x74\x20\163\151\x67\156\x20\171\x6f\165\40\x69\x6e\x2e\40\120\154\x65\x61\163\145\40\x63\157\x6e\x74\x61\x63\x74\x20\171\157\x75\x72\x20\x41\x64\x6d\x69\156\x69\x73\x74\162\x61\164\x6f\162\56";
    wp_die($uJ, "\x45\162\x72\157\x72\x3a\40\x4e\157\x74\40\x61\x20\127\157\162\x64\x50\x72\145\163\163\x20\115\x65\x6d\x62\x65\x72");
    die;
    goto nN;
    vR:
    $Ih = wp_generate_password(10, false);
    if (!empty($PE)) {
        goto EP;
    }
    $xh = wp_create_user($Ux, $Ih, $Ux);
    goto mY;
    EP:
    $xh = wp_create_user($PE, $Ih, $Ux);
    mY:
    $user = get_user_by("\x69\144", $xh);
    $on = assign_roles_to_user($user, $QX, $dG);
    if ($on !== true && !empty($az) && $az == "\x63\x68\145\143\153\x65\144") {
        goto LP;
    }
    if ($on !== true && !empty($ij)) {
        goto nw;
    }
    if ($on !== true) {
        goto l9;
    }
    goto ks;
    LP:
    $aq = wp_update_user(array("\111\104" => $xh, "\x72\x6f\x6c\x65" => false));
    goto ks;
    nw:
    $aq = wp_update_user(array("\x49\104" => $xh, "\162\157\x6c\x65" => $ij));
    goto ks;
    l9:
    $ij = get_option("\144\145\x66\x61\165\x6c\x74\x5f\x72\x6f\154\x65");
    $aq = wp_update_user(array("\111\104" => $xh, "\x72\157\154\145" => $ij));
    ks:
    if (empty($OS)) {
        goto Pr;
    }
    $aq = wp_update_user(array("\x49\104" => $xh, "\x66\151\162\x73\x74\137\x6e\x61\155\145" => $OS));
    Pr:
    if (empty($O6)) {
        goto F3;
    }
    $aq = wp_update_user(array("\111\x44" => $xh, "\154\x61\x73\164\137\x6e\x61\155\145" => $O6));
    F3:
    if (is_null($Jn)) {
        goto Yu;
    }
    update_user_meta($xh, "\155\x6f\137\163\x61\155\154\x5f\x75\x73\x65\x72\137\x61\164\x74\x72\x69\142\x75\x74\145\x73", $Jn);
    $Is = get_option("\x73\x61\x6d\x6c\137\x61\x6d\137\144\151\x73\160\x6c\141\171\x5f\156\x61\155\x65");
    if (empty($Is)) {
        goto AQ;
    }
    if (strcmp($Is, "\x55\x53\x45\122\x4e\101\115\x45") == 0) {
        goto kr;
    }
    if (strcmp($Is, "\x46\x4e\101\115\x45") == 0 && !empty($OS)) {
        goto j6;
    }
    if (strcmp($Is, "\114\x4e\x41\115\105") == 0 && !empty($O6)) {
        goto oJ;
    }
    if (strcmp($Is, "\106\116\101\x4d\105\x5f\114\x4e\x41\x4d\x45") == 0 && !empty($O6) && !empty($OS)) {
        goto SI;
    }
    if (!(strcmp($Is, "\x4c\116\x41\115\105\x5f\106\116\x41\x4d\x45") == 0 && !empty($O6) && !empty($OS))) {
        goto Ua;
    }
    $aq = wp_update_user(array("\111\104" => $xh, "\x64\151\163\x70\154\141\171\x5f\x6e\x61\x6d\145" => $O6 . "\40" . $OS));
    Ua:
    goto Fu;
    SI:
    $aq = wp_update_user(array("\111\104" => $xh, "\x64\x69\163\x70\154\141\x79\x5f\156\x61\155\x65" => $OS . "\x20" . $O6));
    Fu:
    goto Oc;
    oJ:
    $aq = wp_update_user(array("\x49\104" => $xh, "\144\x69\163\160\154\141\x79\x5f\x6e\141\x6d\145" => $O6));
    Oc:
    goto FP;
    j6:
    $aq = wp_update_user(array("\111\x44" => $xh, "\144\x69\x73\160\x6c\x61\x79\x5f\156\x61\x6d\145" => $OS));
    FP:
    goto fY;
    kr:
    $aq = wp_update_user(array("\x49\x44" => $xh, "\x64\x69\163\x70\154\141\x79\137\156\141\x6d\145" => $user->user_login));
    fY:
    AQ:
    Yu:
    wp_set_current_user($xh);
    wp_set_auth_cookie($xh);
    $user = get_user_by("\x69\144", $xh);
    do_action("\167\160\x5f\154\157\x67\x69\x6e", $user->user_login, $user);
    if (empty($yW)) {
        goto Ct;
    }
    update_user_meta($xh, "\155\157\137\x73\x61\155\x6c\x5f\163\x65\163\163\x69\157\156\x5f\x69\156\x64\145\170", $yW);
    Ct:
    if (empty($RM)) {
        goto ag;
    }
    update_user_meta($xh, "\155\157\x5f\163\x61\x6d\x6c\x5f\x6e\141\155\145\x5f\151\144", $RM);
    ag:
    if (!get_option("\x6d\157\137\x73\141\x6d\154\137\x63\165\x73\164\157\x6d\137\x61\164\x74\162\163\137\x6d\141\160\160\151\156\147")) {
        goto jV;
    }
    $j5 = get_option("\155\157\x5f\163\x61\155\154\x5f\143\x75\x73\164\x6f\x6d\x5f\x61\x74\x74\x72\163\x5f\x6d\x61\160\160\x69\x6e\147");
    foreach ($j5 as $nz => $q0) {
        if (!array_key_exists($q0, $Jn)) {
            goto LN;
        }
        $L5 = $Jn[$q0][0];
        update_user_meta($xh, $nz, $L5);
        LN:
        Gg:
    }
    s9:
    jV:
    if (!(!session_id() || session_id() == '' || !isset($_SESSION))) {
        goto vj;
    }
    session_start();
    vj:
    $_SESSION["\x6d\x6f\x5f\x73\141\x6d\x6c"]["\x6c\157\147\147\145\144\137\151\x6e\137\x77\151\x74\x68\137\151\144\x70"] = TRUE;
    nN:
    $hF = get_option("\x6d\157\x5f\163\141\155\154\137\162\x65\x6c\141\x79\137\163\164\x61\x74\145");
    if (!empty($hF)) {
        goto NK;
    }
    if (!empty($mE)) {
        goto HB;
    }
    wp_redirect($zW);
    goto MR;
    HB:
    wp_redirect($mE);
    MR:
    goto ky;
    NK:
    wp_redirect($hF);
    ky:
    die;
    goto Lr;
    Of:
    wp_die("\122\x65\147\151\x73\164\162\141\x74\151\157\x6e\x20\x68\141\163\40\x66\141\x69\x6c\x65\144\x20\x61\x73\x20\141\40\165\163\145\162\x20\x77\151\164\x68\x20\x74\x68\145\40\163\141\x6d\145\x20\165\163\x65\x72\156\x61\155\x65\40\141\154\162\145\x61\144\171\40\145\170\x69\x73\164\163\40\151\x6e\40\x57\157\162\144\120\162\x65\163\163\x2e\x20\x50\154\145\141\163\145\x20\141\163\153\40\x79\157\x75\162\40\141\x64\155\151\156\x69\163\x74\162\x61\164\x6f\x72\x20\164\x6f\40\143\162\x65\141\164\x65\x20\x61\156\40\x61\x63\x63\x6f\x75\x6e\x74\40\x66\157\162\x20\x79\157\165\x20\167\x69\164\150\x20\x61\40\x75\x6e\151\161\165\145\40\x75\163\x65\x72\x6e\141\x6d\145\x2e", "\105\x72\x72\157\162");
    Lr:
}
function check_if_user_sllowed_to_login_due_to_role_restriction($dG)
{
    $GZ = get_option("\x73\141\155\154\137\x61\x6d\137\144\157\x6e\164\137\x61\154\x6c\x6f\167\137\x75\x73\x65\x72\137\164\157\154\157\x67\x69\x6e\x5f\x63\162\x65\141\x74\145\137\167\x69\164\150\x5f\147\x69\166\145\x6e\137\x67\162\x6f\165\160\x73");
    if (!($GZ == "\143\x68\x65\x63\153\x65\x64")) {
        goto Am;
    }
    if (empty($dG)) {
        goto ni;
    }
    $NZ = get_option("\x6d\x6f\137\x73\x61\155\x6c\137\162\x65\163\x74\162\151\x63\164\137\x75\x73\145\162\x73\137\x77\x69\x74\x68\x5f\147\x72\157\165\x70\x73");
    $mP = explode("\x3b", $NZ);
    foreach ($mP as $bQ) {
        foreach ($dG as $q3) {
            $q3 = trim($q3);
            if (!(!empty($q3) && $q3 == $bQ)) {
                goto BV;
            }
            wp_die("\131\x6f\x75\x20\141\162\x65\40\156\x6f\164\40\x61\165\x74\x68\x6f\162\151\x7a\x65\x64\40\x74\x6f\x20\x6c\x6f\x67\x69\156\56\x20\x50\x6c\x65\141\163\145\x20\143\x6f\156\164\141\143\x74\40\x79\x6f\165\x72\40\141\x64\x6d\151\156\151\163\164\x72\141\164\x6f\x72\56", "\105\162\x72\x6f\x72");
            BV:
            ny:
        }
        oV:
        dK:
    }
    OK:
    ni:
    Am:
}
function check_if_user_allowed_to_login($user, $zW)
{
    $xh = $user->ID;
    global $wpdb;
    if (get_user_meta($xh, "\x6d\157\137\163\x61\x6d\154\137\165\163\x65\x72\x5f\x74\171\160\x65", true)) {
        goto jn;
    }
    if (get_option("\155\x6f\137\163\141\x6d\154\x5f\x75\163\162\x5f\x6c\x6d\x74")) {
        goto S4;
    }
    update_user_meta($xh, "\155\x6f\x5f\163\141\x6d\154\137\x75\163\145\x72\137\x74\x79\x70\145", "\163\163\x6f\x5f\x75\x73\x65\x72");
    goto gi;
    S4:
    $nz = get_option("\155\x6f\137\163\141\x6d\154\x5f\143\165\x73\164\157\155\x65\x72\137\164\157\x6b\145\x6e");
    $HX = AESEncryption::decrypt_data(get_option("\155\157\x5f\x73\x61\155\x6c\137\165\163\162\x5f\x6c\x6d\164"), $nz);
    $R7 = "\x53\105\x4c\x45\103\x54\x20\x43\x4f\x55\116\x54\x28\x2a\x29\x20\106\122\117\115\40" . $wpdb->prefix . "\x75\163\145\162\155\x65\x74\141\x20\127\x48\x45\x52\x45\x20\155\145\164\x61\x5f\x6b\x65\171\x3d\x27\x6d\157\137\163\x61\x6d\154\x5f\x75\163\145\x72\137\x74\171\160\145\x27";
    $g2 = $wpdb->get_var($R7);
    if ($g2 >= $HX) {
        goto zC;
    }
    update_user_meta($xh, "\x6d\157\137\x73\141\x6d\154\x5f\165\x73\x65\162\x5f\164\171\160\145", "\163\163\x6f\137\165\163\145\x72");
    goto pR;
    zC:
    if (get_option("\x75\x73\145\162\137\x61\x6c\x65\162\x74\x5f\145\x6d\x61\x69\154\137\x73\x65\x6e\164")) {
        goto bA;
    }
    $uh = new Customersaml();
    $uh->mo_saml_send_user_exceeded_alert_email($HX);
    bA:
    if (is_administrator_user($user)) {
        goto eO;
    }
    wp_redirect($zW);
    die;
    goto VV;
    eO:
    update_user_meta($xh, "\155\157\x5f\x73\141\155\x6c\x5f\165\x73\145\162\137\x74\x79\160\145", "\x73\163\157\x5f\x75\x73\145\162");
    VV:
    pR:
    gi:
    jn:
}
function assign_roles_to_user($user, $QX, $dG)
{
    $on = false;
    if (!(!empty($dG) && !empty($QX) && !is_administrator_user($user))) {
        goto oB;
    }
    $user->set_role(false);
    $UB = '';
    $nc = false;
    foreach ($QX as $qV => $hm) {
        $mP = explode("\73", $hm);
        foreach ($mP as $bQ) {
            foreach ($dG as $q3) {
                $q3 = trim($q3);
                if (!(!empty($q3) && $q3 == $bQ)) {
                    goto ID;
                }
                $on = true;
                $user->add_role($qV);
                ID:
                DX:
            }
            m3:
            Pg:
        }
        zB:
        nr:
    }
    Nm:
    oB:
    return $on;
}
function is_role_mapping_configured_for_user($QX, $dG)
{
    if (!(!empty($dG) && !empty($QX))) {
        goto AG;
    }
    foreach ($QX as $qV => $hm) {
        $mP = explode("\73", $hm);
        foreach ($mP as $bQ) {
            foreach ($dG as $q3) {
                $q3 = trim($q3);
                if (!(!empty($q3) && $q3 == $bQ)) {
                    goto Cw;
                }
                return true;
                Cw:
                GO:
            }
            UY:
            x1:
        }
        rh:
        Gc:
    }
    Ul:
    AG:
    return false;
}
function is_administrator_user($user)
{
    $Fg = $user->roles;
    if (!is_null($Fg) && in_array("\x61\x64\155\x69\x6e\x69\163\164\x72\141\164\x6f\162", $Fg, TRUE)) {
        goto VN;
    }
    return false;
    goto ya;
    VN:
    return true;
    ya:
}
function mo_saml_is_customer_registered()
{
    $Mb = get_option("\x6d\x6f\137\163\x61\155\x6c\x5f\141\144\x6d\151\x6e\x5f\x65\155\141\x69\154");
    $VO = get_option("\155\157\x5f\x73\141\155\154\137\141\x64\155\151\x6e\137\x63\165\163\164\x6f\155\145\162\x5f\153\145\171");
    if (!$Mb || !$VO || !is_numeric(trim($VO))) {
        goto EA;
    }
    return 1;
    goto po;
    EA:
    return 0;
    po:
}
function mo_saml_is_customer_license_verified()
{
    $nz = get_option("\155\157\x5f\x73\141\155\x6c\137\x63\165\x73\x74\x6f\155\x65\x72\137\x74\157\x6b\145\156");
    $zh = AESEncryption::decrypt_data(get_option("\164\x5f\163\x69\x74\145\137\x73\164\x61\x74\x75\x73"), $nz);
    $HD = get_option("\163\155\x6c\137\x6c\153");
    $Mb = get_option("\x6d\157\x5f\163\141\x6d\154\137\x61\x64\155\151\x6e\137\145\x6d\x61\151\154");
    $VO = get_option("\x6d\x6f\x5f\163\141\x6d\154\137\x61\144\155\151\156\137\143\165\x73\164\157\x6d\x65\162\x5f\153\145\171");
    if (!$zh && !$HD || !$Mb || !$VO || !is_numeric(trim($VO))) {
        goto tc;
    }
    return 1;
    goto RB;
    tc:
    return 0;
    RB:
}
function saml_get_current_page_url()
{
    $dP = $_SERVER["\x48\x54\x54\x50\x5f\x48\x4f\x53\x54"];
    if (!(substr($dP, -1) == "\57")) {
        goto km;
    }
    $dP = substr($dP, 0, -1);
    km:
    $dL = $_SERVER["\x52\105\121\125\x45\x53\x54\137\x55\122\x49"];
    if (!(substr($dL, 0, 1) == "\57")) {
        goto gL;
    }
    $dL = substr($dL, 1);
    gL:
    $In = isset($_SERVER["\x48\124\x54\x50\x53"]) && strcasecmp($_SERVER["\110\x54\124\120\x53"], "\x6f\x6e") == 0;
    $Xk = "\150\164\164\160" . ($In ? "\163" : '') . "\x3a\57\x2f" . $dP . "\57" . $dL;
    return $Xk;
}
function show_status_error($yZ, $mE)
{
    if ($mE == "\164\x65\163\164\x56\141\154\151\x64\x61\x74\x65") {
        goto We;
    }
    wp_die("\x57\145\40\143\157\165\154\x64\40\x6e\x6f\164\x20\163\151\x67\156\40\171\x6f\165\40\x69\x6e\x2e\40\x50\154\x65\141\163\145\x20\x63\157\x6e\x74\x61\x63\164\x20\x79\x6f\165\x72\40\101\144\x6d\151\156\151\163\x74\x72\141\164\x6f\162\x2e", "\x45\162\162\157\162\x3a\x20\x49\x6e\166\x61\x6c\151\x64\40\123\101\x4d\x4c\x20\x52\145\163\160\x6f\x6e\x73\x65\x20\123\x74\141\x74\165\x73");
    goto mx;
    We:
    echo "\x3c\x64\151\166\40\163\164\x79\154\x65\x3d\x22\x66\x6f\156\x74\x2d\146\x61\x6d\151\x6c\171\x3a\x43\x61\154\151\x62\162\x69\73\x70\x61\144\144\151\156\147\x3a\x30\x20\63\45\x3b\x22\76";
    echo "\74\144\151\x76\x20\x73\164\x79\154\x65\x3d\x22\143\157\154\157\162\x3a\x20\43\141\71\64\x34\x34\x32\x3b\142\x61\x63\x6b\x67\x72\x6f\x75\x6e\x64\55\x63\x6f\154\x6f\x72\x3a\x20\x23\146\62\x64\x65\144\x65\x3b\160\141\144\144\x69\156\x67\x3a\x20\61\65\x70\x78\73\155\141\x72\147\x69\x6e\x2d\x62\x6f\164\x74\157\x6d\x3a\x20\62\60\160\x78\x3b\x74\x65\170\x74\55\141\x6c\151\x67\156\72\x63\145\x6e\164\145\162\x3b\142\157\x72\144\x65\162\72\61\160\x78\40\x73\157\154\151\x64\x20\x23\x45\x36\102\x33\x42\x32\x3b\146\157\156\164\x2d\163\151\x7a\x65\72\61\x38\160\164\x3b\x22\x3e\x20\x45\122\122\117\x52\x3c\x2f\144\x69\x76\x3e\xa\40\40\x20\40\x20\40\x20\40\40\40\40\40\x20\40\x20\x20\74\144\151\166\40\x73\x74\171\154\x65\75\x22\x63\157\x6c\157\x72\x3a\40\43\141\x39\64\x34\x34\62\73\146\157\156\164\55\163\x69\172\145\72\x31\x34\160\x74\x3b\40\x6d\141\162\x67\x69\156\x2d\142\x6f\164\164\157\x6d\72\x32\x30\160\x78\73\42\x3e\74\x70\x3e\x3c\x73\164\162\157\x6e\147\76\x45\x72\x72\x6f\162\72\x20\74\x2f\163\x74\162\157\x6e\147\x3e\x20\111\156\x76\x61\154\151\144\40\x53\x41\115\114\x20\122\145\163\160\x6f\x6e\163\x65\40\123\164\141\164\165\163\56\74\57\160\76\xa\x20\x20\x20\x20\40\x20\40\40\40\x20\40\x20\x20\40\x20\x20\x3c\160\x3e\74\163\164\x72\157\156\147\76\103\x61\x75\x73\145\x73\x3c\x2f\163\x74\162\157\x6e\x67\x3e\x3a\x20\x49\144\x65\156\x74\151\164\x79\x20\120\x72\157\166\151\144\145\x72\x20\150\x61\163\x20\163\x65\156\164\40\47" . $yZ . "\x27\40\x73\x74\x61\x74\165\x73\x20\143\x6f\x64\145\x20\x69\x6e\x20\123\x41\x4d\x4c\x20\x52\x65\x73\x70\157\156\x73\145\x2e\x20\x3c\x2f\160\x3e\xa\11\x9\x9\11\11\11\x9\11\x3c\x70\x3e\x3c\163\x74\x72\157\156\147\x3e\x52\145\x61\x73\x6f\156\74\x2f\x73\x74\x72\x6f\156\147\76\72\x20" . get_status_message($yZ) . "\x3c\x2f\160\76\x3c\x62\x72\76\12\40\x20\x20\x20\x20\40\x20\x20\40\40\x20\40\40\40\40\40\x3c\57\x64\x69\166\x3e\xa\12\40\x20\40\40\x20\x20\x20\40\x20\x20\40\40\x20\x20\x20\x20\74\144\151\166\40\163\x74\x79\x6c\145\75\x22\x6d\x61\x72\147\x69\156\x3a\63\45\73\x64\151\163\x70\154\x61\171\72\142\x6c\x6f\143\x6b\73\x74\145\x78\x74\x2d\141\x6c\x69\x67\156\72\143\x65\x6e\164\145\x72\x3b\42\x3e\xa\40\x20\40\x20\x20\x20\x20\40\x20\x20\x20\x20\40\x20\40\x20\x3c\144\x69\x76\x20\163\164\x79\x6c\x65\x3d\42\155\x61\162\147\151\156\x3a\x33\x25\73\144\x69\x73\160\154\x61\171\72\x62\x6c\x6f\x63\153\x3b\164\145\x78\x74\x2d\x61\x6c\x69\x67\156\72\143\x65\x6e\164\145\x72\x3b\42\x3e\x3c\151\156\x70\165\164\40\x73\x74\x79\154\x65\x3d\x22\160\x61\x64\144\x69\156\147\x3a\x31\x25\x3b\x77\151\x64\164\150\x3a\61\60\x30\160\x78\x3b\142\141\143\153\147\x72\x6f\x75\156\144\72\40\43\60\x30\x39\61\103\104\40\x6e\157\x6e\145\x20\162\145\x70\x65\141\164\x20\x73\x63\x72\x6f\x6c\x6c\x20\60\x25\40\60\45\73\x63\165\x72\x73\x6f\x72\x3a\x20\x70\x6f\x69\156\164\x65\162\73\146\157\x6e\164\x2d\163\151\172\x65\72\x31\65\160\170\x3b\142\157\x72\144\145\162\x2d\x77\x69\x64\x74\150\72\40\61\x70\x78\73\142\x6f\162\x64\145\x72\x2d\163\164\x79\154\145\x3a\40\x73\157\x6c\x69\144\73\142\x6f\162\144\x65\x72\x2d\162\x61\144\151\165\163\72\40\x33\x70\170\x3b\167\x68\x69\164\x65\x2d\163\160\141\x63\145\72\40\156\x6f\167\x72\141\160\x3b\x62\x6f\x78\x2d\163\151\172\151\156\147\72\x20\x62\157\x72\144\x65\x72\55\142\x6f\170\73\142\157\x72\144\145\x72\55\143\x6f\154\x6f\x72\x3a\x20\x23\x30\60\67\x33\101\x41\73\142\157\x78\55\163\150\141\x64\x6f\x77\x3a\40\x30\x70\x78\40\61\x70\x78\x20\x30\x70\170\40\162\147\142\141\50\61\x32\x30\54\40\62\x30\60\x2c\x20\x32\x33\x30\x2c\x20\60\56\x36\51\x20\151\x6e\163\x65\x74\x3b\x63\157\154\x6f\x72\72\40\x23\106\x46\x46\x3b\42\x74\x79\x70\x65\75\42\x62\x75\x74\x74\157\x6e\x22\40\166\141\x6c\165\x65\x3d\x22\x44\x6f\x6e\x65\42\x20\x6f\156\x43\154\x69\143\x6b\x3d\x22\x73\x65\154\x66\x2e\x63\154\x6f\163\145\x28\51\73\42\x3e\x3c\x2f\144\x69\166\76";
    die;
    mx:
}
function addLink($e3, $TZ)
{
    ?>
	<a href="<?php 
    echo $TZ;
    ?>
"><?php 
    echo $e3;
    ?>
</a>
<?php 
}
function get_status_message($yZ)
{
    switch ($yZ) {
        case "\122\145\x71\165\x65\x73\x74\145\x72":
            return "\124\150\x65\40\162\145\161\165\145\x73\164\40\x63\157\165\x6c\144\x20\156\x6f\164\x20\x62\x65\x20\x70\145\162\x66\x6f\x72\155\145\144\40\x64\x75\145\40\x74\x6f\40\x61\156\40\x65\162\x72\x6f\x72\x20\x6f\156\40\164\x68\145\40\160\x61\x72\164\40\157\146\40\164\x68\145\40\162\145\x71\165\x65\163\x74\x65\x72\56";
            goto Fm;
        case "\x52\145\x73\160\157\156\144\145\x72":
            return "\124\x68\145\40\162\145\161\x75\x65\x73\x74\x20\143\x6f\x75\x6c\144\x20\x6e\157\164\40\142\x65\x20\160\x65\x72\x66\x6f\x72\155\145\x64\40\144\165\145\40\x74\x6f\40\141\x6e\40\x65\162\162\x6f\162\x20\x6f\156\x20\x74\x68\145\40\160\x61\x72\164\x20\157\146\40\164\x68\x65\x20\x53\101\x4d\x4c\40\162\x65\163\160\x6f\x6e\x64\145\x72\40\x6f\162\x20\x53\x41\x4d\114\x20\141\x75\x74\150\157\x72\151\x74\x79\56";
            goto Fm;
        case "\x56\145\x72\163\151\157\x6e\115\151\x73\x6d\x61\164\x63\x68":
            return "\x54\x68\x65\40\x53\101\115\114\40\162\x65\x73\160\157\156\144\x65\x72\x20\x63\x6f\165\154\x64\x20\156\157\x74\40\x70\x72\x6f\143\x65\163\163\40\x74\x68\145\x20\x72\x65\161\165\x65\x73\164\x20\142\x65\x63\x61\x75\163\x65\40\x74\x68\145\40\x76\x65\x72\x73\151\157\156\x20\x6f\146\40\x74\x68\145\x20\x72\x65\161\165\x65\x73\x74\40\x6d\x65\x73\x73\141\x67\145\40\x77\141\163\40\151\156\143\x6f\x72\x72\x65\x63\x74\56";
            goto Fm;
        default:
            return "\125\156\x6b\156\157\167\x6e";
    }
    aG:
    Fm:
}
add_action("\167\151\x64\147\145\164\x73\x5f\x69\156\x69\x74", function () {
    register_widget("\x6d\x6f\137\x6c\x6f\147\x69\156\x5f\167\151\x64");
});
add_action("\151\x6e\x69\164", "\155\x6f\137\x6c\x6f\x67\x69\156\x5f\166\141\154\151\x64\x61\x74\x65");
?>

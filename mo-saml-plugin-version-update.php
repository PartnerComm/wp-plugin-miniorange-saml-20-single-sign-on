<?php
/**
 * This file is a part of the miniorange-saml-20-single-sign-on plugin.
 *
 * @link https://plugins.miniorange.com/
 * @author miniOrange
 * @package miniorange-saml-20-single-sign-on
 */


add_action("\141\144\155\151\156\137\151\156\x69\164", "\x6d\x6f\x5f\x73\141\x6d\154\x5f\165\160\x64\141\164\x65");
class mo_saml_update_framework
{
    private $current_version;
    private $update_path;
    private $plugin_slug;
    private $slug;
    private $plugin_file;
    private $new_version_changelog;
    public function __construct($cr, $x9 = "\57", $Za = "\57")
    {
        $this->current_version = $cr;
        $this->update_path = $x9;
        $this->plugin_slug = $Za;
        list($TH, $z5) = explode("\x2f", $Za);
        $this->slug = $TH;
        $this->plugin_file = $z5;
        add_filter("\x70\x72\x65\x5f\x73\145\164\137\x73\x69\164\145\x5f\164\x72\141\156\x73\x69\x65\156\x74\137\x75\x70\x64\141\164\145\137\x70\x6c\165\x67\x69\x6e\x73", array(&$this, "\155\x6f\x5f\163\141\x6d\154\137\x63\150\145\143\153\137\x75\160\144\x61\x74\x65"));
        add_filter("\x70\x6c\x75\x67\x69\x6e\163\137\141\160\x69", array(&$this, "\x6d\x6f\137\163\x61\x6d\x6c\137\143\150\x65\x63\153\137\x69\156\146\157"), 10, 3);
    }
    public function mo_saml_check_update($Vu)
    {
        if (!empty($Vu->checked)) {
            goto Ra;
        }
        return $Vu;
        Ra:
        $IX = $this->getRemote();
        if (!empty($IX)) {
            goto vz;
        }
        return $Vu;
        vz:
        if (!(!empty($IX["\154\x69\x63\145\x6e\x73\x65\111\156\146\x6f\162\x6d\x61\x74\x69\x6f\x6e"]) and get_option("\155\x6f\137\x73\141\x6d\x6c\137\163\154\x65"))) {
            goto Vl;
        }
        update_option("\x6d\157\x5f\162\x65\156\145\x77\141\154\137\x61\144\155\x69\156\x5f\156\x6f\164\x69\x63\x65", $IX["\154\x69\x63\x65\x6e\163\145\111\x6e\x66\x6f\162\155\x61\x74\151\x6f\156"]);
        Vl:
        if ($IX["\x73\164\x61\164\x75\163"] == "\123\x55\x43\x43\105\x53\x53") {
            goto mX;
        }
        if (!($IX["\163\164\141\164\x75\163"] == "\x44\105\x4e\111\105\104")) {
            goto aq;
        }
        if (!version_compare($this->current_version, $IX["\x6e\145\167\x56\145\x72\163\x69\157\156"], "\x3c")) {
            goto VR;
        }
        $Z4 = new stdClass();
        $Z4->slug = $this->slug;
        $Z4->new_version = $IX["\x6e\145\167\x56\145\162\x73\151\x6f\156"];
        $Z4->url = "\150\x74\164\x70\163\x3a\x2f\57\155\x69\x6e\x69\157\162\x61\156\x67\x65\56\x63\x6f\x6d";
        $Z4->plugin = $this->plugin_slug;
        $Z4->tested = $IX["\x63\155\x73\x43\x6f\x6d\x70\141\x74\151\142\151\x6c\x69\164\x79\x56\145\x72\163\151\157\x6e"];
        $Z4->icons = array("\x31\x78" => $IX["\151\x63\157\x6e"]);
        $Z4->status_code = $IX["\x73\164\141\164\x75\163"];
        $Z4->license_information = $IX["\154\x69\x63\145\x6e\x73\145\x49\x6e\146\x6f\162\x6d\141\x74\x69\157\x6e"];
        update_option("\155\x6f\137\x73\141\x6d\x6c\137\x6c\x65\x64", SAMLSPUtilities::mo_saml_encrypt_data($IX["\x6c\151\143\x65\156\145\x45\170\160\x69\x72\x79\x44\141\x74\x65"]));
        $Vu->response[$this->plugin_slug] = $Z4;
        $dW = true;
        update_option("\x6d\157\x5f\163\x61\x6d\154\x5f\163\154\145", $dW);
        set_transient("\165\x70\x64\x61\x74\145\x5f\x70\x6c\x75\147\x69\156\x73", $Vu);
        return $Vu;
        VR:
        aq:
        goto rp;
        mX:
        $dW = false;
        update_option("\x6d\x6f\137\x73\x61\155\x6c\137\163\154\145", $dW);
        if (!version_compare($this->current_version, $IX["\156\x65\167\126\x65\162\163\151\x6f\x6e"], "\x3c")) {
            goto yr;
        }
        ini_set("\x6d\141\x78\137\x65\170\x65\x63\x75\x74\x69\157\156\137\x74\x69\x6d\x65", 600);
        ini_set("\155\x65\155\x6f\x72\x79\137\154\151\155\151\164", "\61\x30\62\x34\115");
        $Xd = plugin_dir_path(__FILE__);
        $Xd = rtrim($Xd, "\57");
        $Xd = rtrim($Xd, "\x5c");
        $ZG = $Xd . "\55\x70\x72\145\155\151\165\x6d\x2d\x62\x61\x63\153\x75\x70\55" . $this->current_version . "\x2e\x7a\x69\x70";
        $this->mo_saml_create_backup_dir();
        $in = $this->getAuthToken();
        $om = round(microtime(true) * 1000);
        $om = number_format($om, 0, '', '');
        $Z4 = new stdClass();
        $Z4->slug = $this->slug;
        $Z4->new_version = $IX["\156\145\x77\126\x65\162\163\151\157\x6e"];
        $Z4->url = "\150\x74\164\160\163\x3a\x2f\x2f\155\151\156\x69\x6f\x72\x61\x6e\147\x65\56\x63\x6f\155";
        $Z4->plugin = $this->plugin_slug;
        $Z4->package = Mo_Saml_Options_Plugin_Constants::HOSTNAME . "\57\x6d\157\x61\x73\x2f\x70\x6c\165\x67\x69\x6e\57\x64\157\167\156\154\x6f\x61\144\x2d\x75\x70\x64\141\x74\145\x3f\x70\x6c\165\x67\151\x6e\x53\x6c\x75\x67\75" . $this->plugin_slug . "\46\x6c\x69\x63\145\156\x73\x65\x50\154\141\x6e\x4e\141\155\x65\75" . Mo_Saml_Options_Plugin_Constants::LICENSE_PLAN_NAME . "\46\x63\165\163\x74\157\x6d\145\x72\111\x64\x3d" . get_option("\x6d\x6f\x5f\163\x61\155\x6c\x5f\x61\x64\155\151\x6e\137\143\165\163\164\157\x6d\145\x72\137\x6b\145\x79") . "\46\x6c\x69\143\145\156\x73\x65\124\x79\x70\x65\75" . Mo_Saml_Options_Plugin_Constants::LICENSE_TYPE . "\46\x61\x75\164\150\x54\x6f\153\x65\156\x3d" . $in . "\x26\157\164\160\124\157\x6b\x65\x6e\x3d" . $om;
        $Z4->tested = $IX["\143\155\163\x43\157\x6d\x70\x61\164\x69\142\151\154\x69\164\x79\126\145\162\x73\x69\157\156"];
        $Z4->icons = array("\x31\x78" => $IX["\x69\143\x6f\x6e"]);
        $Z4->new_version_changelog = $IX["\x63\x68\x61\156\147\145\x6c\157\x67"];
        $Z4->status_code = $IX["\x73\x74\141\x74\165\163"];
        update_option("\155\x6f\x5f\x73\x61\x6d\x6c\x5f\154\145\x64", SAMLSPUtilities::mo_saml_encrypt_data($IX["\x6c\x69\x63\145\156\x65\105\170\160\x69\162\171\104\141\x74\x65"]));
        $Vu->response[$this->plugin_slug] = $Z4;
        set_transient("\165\160\x64\141\164\x65\x5f\x70\154\165\147\151\x6e\x73", $Vu);
        return $Vu;
        yr:
        rp:
        return $Vu;
    }
    public function mo_saml_check_info($Z4, $Hn, $an)
    {
        if (!(($Hn == "\161\165\145\x72\171\x5f\x70\154\x75\x67\151\156\x73" || $Hn == "\160\154\x75\x67\151\156\137\x69\x6e\x66\x6f\x72\x6d\141\x74\x69\157\x6e") && !empty($an->slug) && ($an->slug === $this->slug || $an->slug === $this->plugin_file))) {
            goto Ax;
        }
        $J6 = $this->getRemote();
        if (!empty($J6)) {
            goto Px;
        }
        return $Z4;
        Px:
        remove_filter("\160\x6c\165\147\151\156\x73\137\141\160\151", array($this, "\x6d\157\x5f\163\x61\x6d\x6c\x5f\143\150\145\x63\153\137\151\x6e\x66\157"));
        $Mf = plugins_api("\160\154\165\x67\151\156\137\x69\156\146\157\x72\x6d\x61\x74\x69\157\156", array("\x73\154\x75\147" => $this->slug, "\x66\151\x65\x6c\x64\163" => array("\141\x63\x74\x69\x76\145\x5f\x69\156\163\x74\141\154\154\x73" => true, "\156\x75\x6d\x5f\162\x61\x74\151\156\147\163" => true, "\x72\141\164\x69\x6e\147" => true, "\162\141\x74\x69\x6e\147\x73" => true, "\162\145\166\151\x65\167\x73" => true)));
        $M2 = false;
        $OM = false;
        $oi = false;
        $FX = false;
        $x4 = '';
        $T9 = '';
        if (is_wp_error($Mf)) {
            goto Ri;
        }
        $M2 = $Mf->active_installs;
        $OM = $Mf->rating;
        $oi = $Mf->ratings;
        $FX = $Mf->num_ratings;
        $x4 = $Mf->sections["\144\145\x73\x63\x72\x69\x70\x74\x69\x6f\156"];
        $T9 = $Mf->sections["\x72\145\x76\x69\x65\x77\163"];
        Ri:
        add_filter("\x70\154\x75\x67\151\x6e\x73\x5f\x61\x70\x69", array($this, "\x6d\157\x5f\163\x61\x6d\x6c\x5f\x63\150\145\x63\153\x5f\151\x6e\x66\157"), 10, 3);
        if ($J6["\163\x74\141\164\165\x73"] == "\x53\x55\103\103\x45\x53\123") {
            goto UY;
        }
        if (!($J6["\x73\164\x61\x74\x75\x73"] == "\x44\x45\x4e\111\x45\x44")) {
            goto a4;
        }
        if (!version_compare($this->current_version, $J6["\156\x65\x77\126\145\x72\x73\x69\157\x6e"], "\74")) {
            goto vd;
        }
        $fo = new stdClass();
        $fo->slug = $this->slug;
        $fo->plugin = $this->plugin_slug;
        $fo->name = $J6["\160\x6c\165\x67\x69\156\x4e\141\155\145"];
        $fo->version = $J6["\x6e\x65\167\x56\145\x72\163\x69\x6f\156"];
        $fo->new_version = $J6["\156\x65\x77\x56\x65\162\x73\151\x6f\x6e"];
        $fo->tested = $J6["\x63\155\163\x43\157\155\x70\141\164\151\x62\x69\154\x69\164\x79\x56\145\162\163\151\x6f\x6e"];
        $fo->requires = $J6["\x63\155\x73\x4d\151\156\x56\x65\x72\x73\151\157\156"];
        $fo->requires_php = $J6["\x70\x68\x70\x4d\151\156\126\x65\162\163\x69\x6f\156"];
        $fo->compatibility = array($J6["\x63\x6d\163\103\x6f\155\160\x61\x74\x69\142\x69\x6c\151\x74\171\126\145\x72\163\151\157\156"]);
        $fo->url = $J6["\143\x6d\x73\x50\154\165\x67\x69\156\125\x72\154"];
        $fo->author = $J6["\x70\154\x75\147\151\x6e\101\x75\164\x68\x6f\x72"];
        $fo->author_profile = $J6["\x70\x6c\165\147\151\x6e\101\x75\164\x68\x6f\162\x50\162\157\x66\x69\x6c\145"];
        $fo->last_updated = $J6["\x6c\x61\x73\164\x55\160\144\x61\164\x65\144"];
        $fo->banners = array("\154\157\167" => $J6["\x62\x61\156\156\x65\162"]);
        $fo->icons = array("\x31\x78" => $J6["\x69\143\x6f\156"]);
        $fo->sections = array("\143\x68\141\156\147\145\154\157\x67" => $J6["\x63\x68\x61\156\x67\x65\x6c\157\x67"], "\x6c\x69\143\145\156\x73\145\x5f\151\156\146\157\x72\x6d\141\164\x69\157\x6e" => _x($J6["\x6c\x69\x63\145\156\x73\x65\x49\156\146\157\x72\x6d\141\x74\x69\x6f\156"], "\x50\x6c\165\147\151\x6e\40\151\156\x73\x74\141\x6c\154\x65\x72\x20\163\145\143\x74\151\157\156\40\x74\151\x74\154\145"), "\x64\x65\x73\x63\x72\151\160\164\x69\157\x6e" => $x4, "\122\145\x76\x69\x65\167\163" => $T9);
        $fo->external = '';
        $fo->homepage = !empty($J6["\x68\157\155\x65\160\x61\147\145"]) ? $J6["\x68\157\x6d\x65\x70\x61\x67\x65"] : '';
        $fo->reviews = true;
        $fo->active_installs = $M2;
        $fo->rating = $OM;
        $fo->ratings = $oi;
        $fo->num_ratings = $FX;
        update_option("\155\x6f\137\163\141\155\x6c\137\x6c\145\x64", SAMLSPUtilities::mo_saml_encrypt_data($J6["\154\x69\x63\x65\x6e\x65\105\170\160\151\162\x79\x44\141\x74\x65"]));
        return $fo;
        vd:
        a4:
        goto ZW;
        UY:
        $dW = false;
        update_option("\x6d\x6f\x5f\x73\x61\155\x6c\137\163\x6c\x65", $dW);
        if (!version_compare($this->current_version, $J6["\x6e\x65\x77\126\x65\162\x73\151\x6f\x6e"], "\x3c\x3d")) {
            goto ZS;
        }
        $fo = new stdClass();
        $fo->slug = $this->slug;
        $fo->name = $J6["\160\x6c\x75\x67\151\156\x4e\141\x6d\145"];
        $fo->plugin = $this->plugin_slug;
        $fo->version = $J6["\x6e\x65\x77\x56\145\x72\x73\151\157\156"];
        $fo->new_version = $J6["\156\x65\167\126\145\162\163\x69\x6f\156"];
        $fo->tested = $J6["\x63\x6d\x73\103\157\155\x70\141\x74\x69\142\x69\154\x69\x74\x79\x56\x65\x72\163\151\157\x6e"];
        $fo->requires = $J6["\143\155\x73\115\x69\156\126\145\162\163\151\157\x6e"];
        $fo->requires_php = $J6["\160\x68\160\115\x69\x6e\x56\x65\x72\163\151\157\x6e"];
        $fo->compatibility = array($J6["\x63\155\x73\x43\157\x6d\160\141\x74\x69\x62\151\154\x69\x74\x79\x56\145\x72\x73\151\x6f\156"]);
        $fo->url = $J6["\x63\x6d\163\120\154\165\x67\151\156\125\162\x6c"];
        $fo->author = $J6["\160\154\x75\x67\x69\156\101\165\164\150\x6f\162"];
        $fo->author_profile = $J6["\160\x6c\165\x67\x69\x6e\101\165\164\x68\x6f\162\x50\162\157\146\x69\154\145"];
        $fo->last_updated = $J6["\x6c\x61\x73\164\125\x70\x64\x61\164\145\144"];
        $fo->banners = array("\154\157\167" => $J6["\x62\141\x6e\156\145\x72"]);
        $fo->icons = array("\61\x78" => $J6["\151\x63\157\156"]);
        $fo->sections = array("\143\150\x61\156\147\x65\154\157\147" => $J6["\143\x68\x61\156\x67\145\x6c\x6f\x67"], "\154\151\143\145\x6e\163\x65\x5f\x69\156\x66\157\x72\x6d\141\x74\x69\x6f\156" => _x($J6["\x6c\151\x63\145\156\163\x65\x49\156\146\157\162\155\141\x74\x69\x6f\x6e"], "\x50\x6c\165\147\151\156\x20\151\x6e\x73\164\141\154\x6c\145\x72\40\163\x65\143\164\151\157\156\40\x74\151\x74\154\145"), "\144\145\x73\x63\162\x69\x70\164\151\x6f\x6e" => $x4, "\x52\145\x76\151\x65\x77\163" => $T9);
        $in = $this->getAuthToken();
        $om = round(microtime(true) * 1000);
        $om = number_format($om, 0, '', '');
        $fo->download_link = Mo_Saml_Options_Plugin_Constants::HOSTNAME . "\x2f\x6d\x6f\x61\x73\57\x70\154\165\147\x69\x6e\57\x64\157\x77\x6e\154\x6f\x61\x64\55\165\160\x64\141\164\145\x3f\x70\154\165\147\151\156\x53\x6c\x75\147\75" . $this->plugin_slug . "\46\x6c\x69\x63\145\156\x73\x65\x50\154\x61\156\x4e\141\x6d\x65\x3d" . Mo_Saml_Options_Plugin_Constants::LICENSE_PLAN_NAME . "\x26\x63\x75\x73\164\157\155\145\162\111\x64\75" . get_option("\155\x6f\137\163\x61\155\154\137\141\x64\155\151\x6e\x5f\143\x75\163\164\x6f\155\x65\x72\x5f\153\x65\171") . "\x26\154\151\143\145\x6e\x73\145\x54\x79\160\145\x3d" . Mo_Saml_Options_Plugin_Constants::LICENSE_TYPE . "\x26\141\x75\x74\x68\x54\x6f\x6b\145\x6e\75" . $in . "\46\x6f\x74\160\124\157\x6b\x65\156\75" . $om;
        $fo->package = $fo->download_link;
        $fo->external = '';
        $fo->homepage = !empty($J6["\150\x6f\x6d\145\x70\x61\147\145"]) ? $J6["\150\157\155\145\x70\x61\x67\x65"] : '';
        $fo->reviews = true;
        $fo->active_installs = $M2;
        $fo->rating = $OM;
        $fo->ratings = $oi;
        $fo->num_ratings = $FX;
        update_option("\x6d\157\x5f\x73\141\x6d\x6c\x5f\154\x65\144", SAMLSPUtilities::mo_saml_encrypt_data($J6["\154\x69\x63\x65\x6e\x65\105\x78\x70\151\162\171\x44\x61\x74\x65"]));
        return $fo;
        ZS:
        ZW:
        Ax:
        return $Z4;
    }
    private function getRemote()
    {
        $Mz = get_option("\x6d\157\x5f\x73\x61\155\154\137\x61\144\x6d\x69\x6e\x5f\143\165\163\164\x6f\155\x65\x72\x5f\x6b\145\171");
        $sh = get_option("\155\x6f\x5f\x73\x61\155\154\137\141\144\x6d\x69\x6e\137\x61\160\x69\x5f\x6b\145\x79");
        $om = round(microtime(true) * 1000);
        $xB = $Mz . number_format($om, 0, '', '') . $sh;
        $in = hash("\163\x68\x61\x35\61\62", $xB);
        $om = number_format($om, 0, '', '');
        $yb = array("\160\x6c\x75\147\151\156\123\x6c\165\147" => $this->plugin_slug, "\154\x69\143\145\156\163\145\120\154\x61\x6e\116\x61\155\145" => Mo_Saml_Options_Plugin_Constants::LICENSE_PLAN_NAME, "\x63\165\163\164\x6f\155\145\x72\x49\x64" => $Mz, "\154\151\143\145\156\163\145\x54\x79\x70\145" => Mo_Saml_Options_Plugin_Constants::LICENSE_TYPE);
        $Cn = array("\150\x65\141\x64\145\x72\163" => array("\x43\157\156\164\145\x6e\164\55\x54\171\x70\145" => "\141\x70\x70\154\151\x63\141\x74\x69\x6f\156\57\x6a\x73\157\156\x3b\x20\x63\x68\141\162\x73\x65\x74\x3d\x75\x74\146\55\x38", "\103\165\163\x74\157\x6d\145\x72\55\113\x65\x79" => $Mz, "\x54\151\155\145\x73\x74\x61\x6d\160" => $om, "\101\x75\164\x68\x6f\162\x69\x7a\141\164\151\157\156" => $in), "\142\x6f\x64\171" => json_encode($yb), "\x6d\x65\164\x68\x6f\144" => "\x50\x4f\123\124", "\x64\x61\x74\141\x5f\146\157\162\x6d\x61\164" => "\142\157\x64\171", "\163\x73\154\x76\145\x72\151\x66\171" => false);
        $eq = wp_remote_post($this->update_path, $Cn);
        if (!(!is_wp_error($eq) || wp_remote_retrieve_response_code($eq) === 200)) {
            goto yh;
        }
        $Ir = json_decode($eq["\x62\x6f\x64\171"], true);
        return $Ir;
        yh:
        return false;
    }
    private function getAuthToken()
    {
        $Mz = get_option("\155\x6f\x5f\163\x61\155\154\x5f\x61\144\x6d\x69\x6e\x5f\x63\x75\x73\x74\157\155\145\162\137\x6b\145\x79");
        $sh = get_option("\155\x6f\x5f\163\141\x6d\154\x5f\x61\x64\155\x69\156\137\x61\x70\x69\137\x6b\x65\x79");
        $om = round(microtime(true) * 1000);
        $xB = $Mz . number_format($om, 0, '', '') . $sh;
        $in = hash("\x73\x68\141\65\61\62", $xB);
        return $in;
    }
    function zipData($Us, $Mp)
    {
        if (!(extension_loaded("\172\x69\x70") && file_exists($Us) && count(glob($Us . DIRECTORY_SEPARATOR . "\x2a")) !== 0)) {
            goto GW;
        }
        $na = new ZipArchive();
        if (!$na->open($Mp, ZIPARCHIVE::CREATE)) {
            goto FT;
        }
        $Us = realpath($Us);
        if (is_dir($Us) === true) {
            goto L7;
        }
        if (!is_file($Us)) {
            goto zN;
        }
        $na->addFromString(basename($Us), file_get_contents($Us));
        zN:
        goto AG;
        L7:
        $x0 = new RecursiveDirectoryIterator($Us);
        $x0->setFlags(RecursiveDirectoryIterator::SKIP_DOTS);
        $E8 = new RecursiveIteratorIterator($x0, RecursiveIteratorIterator::SELF_FIRST);
        foreach ($E8 as $b6) {
            $b6 = realpath($b6);
            if (is_dir($b6) === true) {
                goto nz;
            }
            if (!(is_file($b6) === true)) {
                goto T4;
            }
            $na->addFromString(str_replace($Us . DIRECTORY_SEPARATOR, '', $b6), file_get_contents($b6));
            T4:
            goto pT;
            nz:
            $na->addEmptyDir(str_replace($Us . DIRECTORY_SEPARATOR, '', $b6 . DIRECTORY_SEPARATOR));
            pT:
            CI:
        }
        e1:
        AG:
        FT:
        return $na->close();
        GW:
        return false;
    }
    function mo_saml_plugin_update_message($Zw, $eq)
    {
        if (!empty($Zw["\x73\164\x61\164\165\x73\x5f\x63\x6f\144\x65"])) {
            goto kO;
        }
        return;
        kO:
        if ($Zw["\163\164\141\x74\165\x73\137\143\x6f\144\x65"] == "\123\x55\103\x43\105\123\123") {
            goto KM;
        }
        if (!($Zw["\x73\164\141\x74\165\x73\x5f\x63\157\x64\145"] == "\x44\x45\x4e\x49\105\104")) {
            goto M_;
        }
        echo sprintf(__($Zw["\154\x69\143\x65\156\163\145\x5f\151\x6e\146\157\x72\x6d\141\164\151\157\x6e"]));
        M_:
        goto Q4;
        KM:
        $y2 = wp_upload_dir();
        $UI = $y2["\142\x61\163\145\144\x69\x72"];
        $y2 = rtrim($UI, "\x2f");
        $Xd = $y2 . DIRECTORY_SEPARATOR . "\142\141\143\x6b\165\160";
        $ZG = "\155\x69\156\151\157\x72\x61\156\x67\x65\55\163\141\x6d\154\55\62\x30\x2d\163\x69\x6e\147\154\x65\55\163\151\147\x6e\55\x6f\156\55\x70\162\x65\x6d\x69\x75\x6d\x2d\142\141\x63\153\x75\160\55" . $this->current_version;
        $WS = explode("\74\x2f\165\154\x3e", $Zw["\156\145\167\x5f\x76\x65\162\x73\x69\157\156\137\143\150\x61\x6e\x67\x65\154\x6f\147"]);
        $xj = $WS[0];
        $qj = $xj . "\74\57\165\x6c\x3e";
        echo "\x3c\x64\151\166\x3e\x3c\142\x3e" . __("\x3c\142\x72\40\57\76\x41\x6e\x20\141\165\164\157\155\x61\x74\151\x63\40\x62\141\143\x6b\165\x70\x20\157\x66\40\143\x75\x72\x72\x65\x6e\x74\x20\x76\x65\x72\x73\x69\157\156\x20" . $this->current_version . "\40\150\x61\x73\x20\x62\x65\145\156\x20\x63\x72\x65\141\x74\145\x64\x20\141\x74\x20\164\150\x65\40\x6c\x6f\x63\x61\x74\151\157\x6e\x20" . $Xd . "\40\167\151\164\x68\40\164\150\145\x20\x6e\141\x6d\x65\40\x3c\163\x70\141\156\x20\163\x74\x79\154\145\x3d\x22\143\157\154\x6f\x72\x3a\x23\60\60\x37\x33\141\x61\x3b\42\x3e" . $ZG . "\74\57\x73\160\141\156\76\56\40\111\x6e\x20\143\x61\x73\145\x2c\x20\163\157\x6d\x65\x74\150\x69\156\x67\x20\x62\x72\145\x61\x6b\x73\x20\144\x75\x72\x69\x6e\x67\40\164\x68\145\x20\x75\x70\144\141\x74\145\54\40\x79\x6f\x75\x20\x63\x61\x6e\x20\x72\x65\166\145\162\164\x20\164\157\x20\x79\x6f\165\x72\x20\143\x75\162\162\x65\156\164\x20\166\x65\x72\163\x69\x6f\156\x20\142\171\x20\x72\x65\x70\x6c\141\x63\x69\156\x67\40\164\x68\x65\x20\x62\x61\x63\153\165\x70\x20\165\x73\x69\x6e\x67\40\x46\x54\120\x20\141\143\x63\145\x73\163\x2e", "\155\x69\x6e\x69\x6f\162\141\x6e\147\145\x2d\163\x61\155\154\x2d\x32\60\55\163\151\x6e\x67\x6c\x65\x2d\163\x69\x67\x6e\x2d\157\156") . "\x3c\57\x62\76\x3c\x2f\x64\151\166\76\74\x64\151\x76\40\163\x74\171\154\x65\75\x22\143\x6f\x6c\157\162\72\40\43\x66\60\x30\73\x22\76" . __("\74\x62\x72\40\x2f\x3e\x54\x61\153\145\40\x61\x20\155\x69\x6e\x75\x74\x65\40\x74\x6f\x20\143\x68\145\143\x6b\x20\x74\150\145\40\x63\150\141\156\147\x65\154\x6f\147\40\x6f\146\x20\x6c\141\x74\x65\163\164\40\166\145\x72\x73\x69\157\156\x20\x6f\146\x20\164\150\x65\x20\x70\154\x75\147\151\156\56\x20\110\145\162\x65\x27\x73\40\x77\x68\171\40\171\x6f\165\x20\x6e\145\145\x64\40\164\x6f\40\x75\160\x64\141\164\145\x3a", "\x6d\x69\156\151\157\162\141\x6e\x67\145\55\x73\x61\x6d\154\55\62\x30\x2d\x73\151\156\x67\154\x65\x2d\x73\151\147\x6e\55\x6f\156") . "\x3c\x2f\x64\151\x76\76";
        echo "\74\144\x69\166\x20\163\x74\171\x6c\145\x3d\42\146\x6f\x6e\x74\x2d\167\145\151\x67\x68\164\72\40\156\x6f\162\x6d\x61\x6c\x3b\x22\76" . $qj . "\x3c\x2f\x64\x69\x76\x3e\x3c\x62\x3e\x4e\157\x74\145\x3a\x3c\57\142\x3e\x20\120\154\145\141\163\x65\x20\143\x6c\x69\x63\x6b\40\x6f\156\40\74\x62\x3e\x56\151\x65\167\x20\x56\145\x72\x73\x69\157\x6e\x20\x64\x65\164\x61\x69\x6c\163\x3c\57\x62\76\x20\154\151\x6e\x6b\x20\x74\x6f\40\147\x65\164\40\143\x6f\x6d\160\154\x65\164\x65\40\143\150\x61\x6e\x67\145\x6c\x6f\x67\x20\141\156\x64\x20\x6c\151\143\x65\x6e\x73\145\x20\x69\x6e\146\157\162\x6d\141\164\151\157\156\56\40\103\x6c\x69\143\153\40\x6f\156\40\74\142\76\125\x70\144\x61\164\145\x20\x4e\x6f\167\74\x2f\x62\x3e\40\154\151\156\x6b\40\164\x6f\x20\x75\x70\x64\x61\164\145\x20\x74\x68\x65\40\160\154\165\x67\151\156\x20\164\157\x20\154\141\164\x65\163\164\x20\x76\x65\162\x73\151\x6f\156\x2e";
        Q4:
    }
    function mo_saml_create_backup_dir()
    {
        $Xd = plugin_dir_path(__FILE__);
        $Xd = rtrim($Xd, "\x2f");
        $Xd = rtrim($Xd, "\x5c");
        $Zw = get_plugin_data(__FILE__);
        $YL = $Zw["\x54\x65\170\164\104\x6f\155\141\x69\156"];
        $y2 = wp_upload_dir();
        $UI = $y2["\x62\x61\163\145\144\151\162"];
        $y2 = rtrim($UI, "\x2f");
        $Bx = $y2 . DIRECTORY_SEPARATOR . "\142\x61\143\x6b\x75\x70" . DIRECTORY_SEPARATOR . $YL . "\x2d\160\162\145\155\x69\x75\x6d\55\x62\141\x63\153\x75\x70\55" . $this->current_version;
        if (file_exists($Bx)) {
            goto NW;
        }
        mkdir($Bx, 0777, true);
        NW:
        $Us = $Xd;
        $Mp = $Bx;
        $this->mo_saml_copy_files_to_backup_dir($Us, $Mp);
    }
    function mo_saml_copy_files_to_backup_dir($Xd, $Bx)
    {
        if (!is_dir($Xd)) {
            goto pa;
        }
        $vo = scandir($Xd);
        pa:
        if (!empty($vo)) {
            goto AW;
        }
        return;
        AW:
        foreach ($vo as $HO) {
            if (!($HO == "\56" || $HO == "\x2e\x2e")) {
                goto Ak;
            }
            goto Nd;
            Ak:
            $D3 = $Xd . DIRECTORY_SEPARATOR . $HO;
            $s4 = $Bx . DIRECTORY_SEPARATOR . $HO;
            if (is_dir($D3)) {
                goto lx;
            }
            copy($D3, $s4);
            goto s0;
            lx:
            if (file_exists($s4)) {
                goto T3;
            }
            mkdir($s4, 0777, true);
            T3:
            $this->mo_saml_copy_files_to_backup_dir($D3, $s4);
            s0:
            Nd:
        }
        I1:
    }
}
function mo_saml_update()
{
    if (!mo_saml_is_customer_registered()) {
        goto eW;
    }
    $H_ = Mo_Saml_Options_Plugin_Constants::HOSTNAME;
    $Ga = Mo_Saml_Options_Plugin_Constants::VERSION;
    $lq = $H_ . "\57\x6d\x6f\x61\x73\x2f\x61\x70\x69\x2f\160\x6c\165\x67\x69\x6e\57\155\x65\x74\x61\x64\x61\x74\141";
    $Za = plugin_basename(dirname(__FILE__) . "\x2f\x6c\x6f\147\x69\x6e\56\x70\150\160");
    $WA = new mo_saml_update_framework($Ga, $lq, $Za);
    add_action("\x69\156\137\160\154\165\x67\151\156\x5f\x75\x70\144\141\x74\145\137\155\145\163\163\141\147\145\55{$Za}", array($WA, "\x6d\157\137\163\x61\155\x6c\137\x70\154\x75\147\151\156\137\165\160\144\x61\x74\x65\137\155\145\163\x73\x61\147\145"), 10, 2);
    if (!get_option("\x6d\157\x5f\163\141\x6d\154\137\163\x6c\x65")) {
        goto UC;
    }
    update_option("\x6d\x6f\x5f\163\x61\155\154\x5f\163\x6c\x65\x5f\155\x65\x73\x73\x61\x67\x65", "\131\157\165\x72\40\x53\x41\115\114\40\x70\154\165\147\x69\x6e\40\x6c\151\143\x65\x6e\163\145\x20\150\141\x73\x65\40\x62\145\145\x6e\x20\x65\x78\x70\151\162\145\x64\56\x20\131\x6f\165\40\x61\x72\x65\x20\155\151\x73\163\x69\156\x67\40\x6f\x75\164\40\x6f\x6e\x20\x75\x70\144\x61\x74\x65\x73\40\x61\x6e\x64\40\163\x75\x70\160\x6f\x72\164\41\40\120\154\x65\141\x73\145\x20\x3c\141\40\150\x72\145\146\75\x22" . Mo_Saml_Options_Plugin_Constants::HOSTNAME . "\x2f\155\157\x61\x73\x2f\x6c\x6f\147\x69\156\x3f\162\x65\144\151\x72\x65\143\164\x55\162\154\x3d" . Mo_Saml_Options_Plugin_Constants::HOSTNAME . "\57\x6d\157\141\163\x2f\x61\x64\x6d\x69\156\x2f\x63\x75\163\164\157\155\145\x72\57\x6c\x69\143\145\156\x73\x65\x72\x65\x6e\x65\167\x61\x6c\x73\x3f\162\145\156\x65\167\141\154\x72\x65\x71\x75\x65\163\x74\x3d" . Mo_Saml_Options_Plugin_Constants::LICENSE_TYPE . "\40\42\40\164\141\x72\147\x65\164\x3d\42\x5f\142\154\x61\156\153\42\76\x3c\x62\76\103\154\x69\x63\x6b\40\x48\145\x72\x65\x3c\57\x62\76\74\x2f\x61\76\40\x74\157\40\162\145\x6e\145\x77\40\x74\x68\145\x20\x53\x75\160\160\x6f\x72\164\40\x61\156\x64\40\x4d\141\151\x6e\164\145\156\x61\x63\145\x20\160\x6c\x61\156\x2e");
    UC:
    eW:
}

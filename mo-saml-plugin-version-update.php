<?php


require_once dirname( __FILE__ ) . '/includes/lib/mo-options-enum.php';
add_action("\x61\x64\155\151\156\x5f\151\156\x69\164", "\155\x6f\x5f\163\x61\x6d\x6c\x5f\x75\160\144\141\x74\145");
class mo_saml_update_framework
{
    private $current_version;
    private $update_path;
    private $plugin_slug;
    private $slug;
    private $plugin_file;
    private $new_version_changelog;
    public function __construct($RD, $K1 = "\57", $lX = "\x2f")
    {
        $this->current_version = $RD;
        $this->update_path = $K1;
        $this->plugin_slug = $lX;
        list($xI, $nI) = explode("\57", $lX);
        $this->slug = $xI;
        $this->plugin_file = $nI;
        add_filter("\160\162\x65\137\163\x65\164\x5f\x73\x69\164\145\x5f\164\x72\x61\x6e\163\151\145\x6e\164\x5f\165\160\144\x61\164\145\137\x70\154\165\147\151\x6e\163", array(&$this, "\x6d\x6f\x5f\163\x61\x6d\x6c\x5f\143\150\145\143\153\137\x75\x70\144\141\x74\145"));
        add_filter("\160\154\x75\147\x69\156\163\x5f\141\x70\x69", array(&$this, "\x6d\157\137\163\x61\155\154\137\143\150\x65\x63\x6b\x5f\151\x6e\146\x6f"), 10, 3);
    }
    public function mo_saml_check_update($Rz)
    {
        if (!empty($Rz->checked)) {
            goto SK;
        }
        return $Rz;
        SK:
        $oe = $this->getRemote();
        if (!empty($oe)) {
            goto JK;
        }
        return $Rz;
        JK:
        if (!(!empty($oe["\154\151\143\x65\156\x73\x65\x49\156\146\157\162\155\141\164\151\x6f\x6e"]) and get_option("\155\x6f\137\163\141\x6d\154\137\163\x6c\145"))) {
            goto rN;
        }
        update_option("\x6d\157\137\162\x65\x6e\145\x77\141\x6c\x5f\x61\144\x6d\x69\156\137\x6e\x6f\x74\x69\x63\145", $oe["\154\x69\143\x65\156\163\145\111\x6e\146\157\162\155\x61\164\151\x6f\x6e"]);
        rN:
        if ($oe["\163\x74\141\164\x75\x73"] == "\123\x55\103\x43\105\123\x53") {
            goto eM;
        }
        if (!($oe["\163\164\141\164\165\x73"] == "\x44\105\116\x49\105\x44")) {
            goto wv;
        }
        if (!version_compare($this->current_version, $oe["\x6e\145\x77\126\145\162\x73\x69\x6f\x6e"], "\74")) {
            goto Qy;
        }
        $yy = new stdClass();
        $yy->slug = $this->slug;
        $yy->new_version = $oe["\156\x65\167\126\145\162\163\x69\157\156"];
        $yy->url = "\150\x74\x74\x70\x73\x3a\57\57\x6d\x69\156\x69\157\162\x61\156\x67\x65\56\x63\157\x6d";
        $yy->plugin = $this->plugin_slug;
        $yy->tested = $oe["\x63\155\163\x43\x6f\x6d\x70\x61\x74\x69\142\151\x6c\151\164\x79\126\145\x72\x73\x69\157\156"];
        $yy->icons = array("\61\x78" => $oe["\x69\x63\157\x6e"]);
        $yy->status_code = $oe["\163\164\x61\x74\165\x73"];
        $yy->license_information = $oe["\154\151\x63\145\x6e\163\145\x49\156\x66\157\x72\x6d\141\164\x69\x6f\156"];
        update_option("\x6d\x6f\x5f\163\141\155\154\137\x6c\x69\x63\145\156\163\145\x5f\x65\170\x70\x69\x72\x79\x5f\144\141\x74\x65", $oe["\x6c\x69\x63\145\x6e\145\105\170\x70\151\x72\171\104\x61\x74\145"]);
        $Rz->response[$this->plugin_slug] = $yy;
        $nQ = true;
        update_option("\155\x6f\137\163\141\x6d\154\137\x73\x6c\x65", $nQ);
        set_transient("\x75\160\x64\x61\x74\145\137\160\154\x75\147\151\156\x73", $Rz);
        return $Rz;
        Qy:
        wv:
        goto il;
        eM:
        $nQ = false;
        update_option("\155\x6f\137\163\141\155\154\x5f\163\154\x65", $nQ);
        if (!version_compare($this->current_version, $oe["\156\x65\167\x56\145\162\163\151\x6f\156"], "\x3c")) {
            goto zn;
        }
        ini_set("\155\141\170\x5f\145\x78\x65\x63\x75\x74\x69\x6f\x6e\137\164\151\155\x65", 600);
        ini_set("\155\x65\155\x6f\x72\171\x5f\154\x69\155\x69\x74", "\x31\60\x32\64\x4d");
        $ou = plugin_dir_path(__FILE__);
        $ou = rtrim($ou, "\x2f");
        $ou = rtrim($ou, "\134");
        $kV = $ou . "\x2d\x70\162\145\155\151\x75\x6d\55\142\x61\143\153\165\x70\55" . $this->current_version . "\56\x7a\x69\x70";
        $this->mo_saml_create_backup_dir();
        $dI = $this->getAuthToken();
        $z8 = round(microtime(true) * 1000);
        $z8 = number_format($z8, 0, '', '');
        $yy = new stdClass();
        $yy->slug = $this->slug;
        $yy->new_version = $oe["\156\145\167\x56\145\x72\163\151\x6f\156"];
        $yy->url = "\150\164\164\160\163\72\57\57\x6d\x69\x6e\151\157\162\141\156\147\145\x2e\x63\x6f\x6d";
        $yy->plugin = $this->plugin_slug;
        $yy->package = mo_options_plugin_constants::HOSTNAME . "\57\155\x6f\x61\163\x2f\x70\x6c\x75\x67\151\x6e\x2f\x64\157\x77\x6e\x6c\157\x61\x64\x2d\x75\x70\144\x61\164\145\77\x70\x6c\165\147\151\x6e\x53\x6c\x75\147\x3d" . $this->plugin_slug . "\x26\154\x69\x63\145\156\163\x65\x50\154\x61\x6e\x4e\x61\x6d\x65\75" . mo_options_plugin_constants::LICENSE_PLAN_NAME . "\46\143\165\x73\164\x6f\x6d\145\x72\111\144\75" . get_option("\155\157\x5f\x73\141\155\x6c\x5f\141\x64\155\x69\x6e\137\143\165\x73\164\x6f\x6d\x65\162\x5f\153\x65\171") . "\x26\x6c\x69\x63\145\x6e\x73\x65\x54\x79\160\x65\75" . mo_options_plugin_constants::LICENSE_TYPE . "\46\x61\x75\164\150\124\157\153\145\x6e\x3d" . $dI . "\46\157\164\x70\124\x6f\153\145\x6e\x3d" . $z8;
        $yy->tested = $oe["\x63\155\163\103\x6f\x6d\x70\x61\x74\x69\142\x69\154\151\164\171\126\145\162\163\x69\157\156"];
        $yy->icons = array("\x31\170" => $oe["\151\143\157\x6e"]);
        $yy->new_version_changelog = $oe["\143\150\141\156\x67\145\x6c\x6f\147"];
        $yy->status_code = $oe["\x73\164\141\x74\165\163"];
        update_option("\155\157\x5f\x73\141\155\x6c\137\154\x69\x63\145\x6e\163\145\x5f\x65\x78\x70\x69\x72\x79\x5f\144\141\164\145", $oe["\154\x69\x63\x65\x6e\145\x45\x78\160\x69\x72\x79\104\x61\x74\145"]);
        $Rz->response[$this->plugin_slug] = $yy;
        set_transient("\165\160\x64\x61\x74\x65\x5f\160\154\165\147\x69\x6e\163", $Rz);
        return $Rz;
        zn:
        il:
        return $Rz;
    }
    public function mo_saml_check_info($yy, $Jl, $ye)
    {
        if (!(($Jl == "\x71\165\x65\x72\x79\137\x70\x6c\165\x67\151\156\163" || $Jl == "\x70\x6c\x75\147\151\x6e\x5f\151\x6e\x66\x6f\x72\155\141\164\151\157\156") && !empty($ye->slug) && ($ye->slug === $this->slug || $ye->slug === $this->plugin_file))) {
            goto me;
        }
        $v5 = $this->getRemote();
        if (!empty($v5)) {
            goto Ef;
        }
        return $yy;
        Ef:
        remove_filter("\x70\154\x75\x67\151\156\163\137\141\x70\151", array($this, "\155\157\x5f\x73\x61\155\154\137\x63\x68\x65\143\153\x5f\x69\x6e\146\157"));
        $EZ = plugins_api("\160\x6c\x75\147\x69\x6e\x5f\x69\x6e\x66\157\x72\155\x61\x74\151\157\x6e", array("\163\154\165\x67" => $this->slug, "\x66\151\x65\x6c\x64\x73" => array("\x61\x63\x74\151\166\x65\x5f\151\156\x73\x74\141\x6c\x6c\163" => true, "\156\x75\155\x5f\x72\141\164\151\x6e\x67\x73" => true, "\162\x61\x74\x69\156\147" => true, "\x72\141\164\151\x6e\x67\163" => true, "\x72\145\x76\151\x65\167\163" => true)));
        $Ef = false;
        $Zx = false;
        $hw = false;
        $Hu = false;
        $uO = '';
        $Oa = '';
        if (is_wp_error($EZ)) {
            goto hN;
        }
        $Ef = $EZ->active_installs;
        $Zx = $EZ->rating;
        $hw = $EZ->ratings;
        $Hu = $EZ->num_ratings;
        $uO = $EZ->sections["\x64\x65\163\143\162\x69\160\x74\151\157\156"];
        $Oa = $EZ->sections["\162\145\x76\x69\145\167\x73"];
        hN:
        add_filter("\x70\x6c\x75\147\151\x6e\163\x5f\x61\x70\151", array($this, "\155\157\x5f\163\141\x6d\154\x5f\x63\x68\145\x63\x6b\137\x69\156\x66\x6f"), 10, 3);
        if ($v5["\x73\164\141\164\165\x73"] == "\x53\x55\x43\103\x45\123\x53") {
            goto T3;
        }
        if (!($v5["\163\164\141\164\165\163"] == "\x44\105\x4e\111\105\104")) {
            goto Zz;
        }
        if (!version_compare($this->current_version, $v5["\x6e\x65\167\126\145\x72\163\151\x6f\x6e"], "\74")) {
            goto Rs;
        }
        $vn = new stdClass();
        $vn->slug = $this->slug;
        $vn->plugin = $this->plugin_slug;
        $vn->name = $v5["\x70\x6c\165\x67\151\x6e\116\x61\x6d\145"];
        $vn->version = $v5["\156\x65\x77\x56\x65\162\x73\151\x6f\x6e"];
        $vn->new_version = $v5["\x6e\x65\167\x56\x65\162\163\x69\x6f\156"];
        $vn->tested = $v5["\x63\155\163\x43\157\155\160\141\x74\x69\142\x69\154\151\164\171\x56\145\x72\x73\x69\x6f\x6e"];
        $vn->requires = $v5["\143\155\163\x4d\x69\156\126\x65\162\x73\151\x6f\x6e"];
        $vn->requires_php = $v5["\x70\x68\160\x4d\x69\x6e\x56\145\x72\163\x69\157\156"];
        $vn->compatibility = array($v5["\x63\155\x73\103\x6f\155\160\x61\x74\x69\x62\151\154\151\x74\x79\126\145\162\163\x69\157\x6e"]);
        $vn->url = $v5["\x63\x6d\x73\x50\154\x75\x67\151\x6e\x55\162\154"];
        $vn->author = $v5["\160\x6c\165\147\x69\x6e\x41\x75\x74\150\157\162"];
        $vn->author_profile = $v5["\x70\154\x75\x67\x69\x6e\x41\165\164\150\157\162\x50\162\x6f\x66\x69\x6c\x65"];
        $vn->last_updated = $v5["\x6c\141\x73\x74\x55\x70\144\x61\x74\145\144"];
        $vn->banners = array("\154\x6f\167" => $v5["\x62\141\x6e\x6e\x65\x72"]);
        $vn->icons = array("\61\x78" => $v5["\x69\143\157\x6e"]);
        $vn->sections = array("\x63\150\x61\x6e\x67\145\x6c\x6f\147" => $v5["\143\150\141\156\x67\x65\154\157\x67"], "\x6c\151\x63\145\156\x73\145\x5f\151\x6e\x66\x6f\x72\x6d\x61\164\x69\x6f\x6e" => _x($v5["\x6c\x69\x63\145\156\163\x65\x49\x6e\146\157\162\155\x61\x74\151\157\156"], "\x50\x6c\x75\147\151\156\40\x69\156\163\x74\141\x6c\x6c\145\x72\x20\x73\x65\143\x74\151\x6f\156\40\164\151\x74\154\145"), "\x64\145\x73\x63\162\x69\160\x74\x69\157\156" => $uO, "\x52\x65\166\151\x65\x77\x73" => $Oa);
        $vn->external = '';
        $vn->homepage = !empty($v5["\x68\x6f\x6d\x65\x70\141\x67\145"]) ? $v5["\x68\157\155\145\160\x61\x67\x65"] : '';
        $vn->reviews = true;
        $vn->active_installs = $Ef;
        $vn->rating = $Zx;
        $vn->ratings = $hw;
        $vn->num_ratings = $Hu;
        update_option("\x6d\x6f\x5f\163\141\155\x6c\x5f\154\x69\x63\145\x6e\x73\145\137\x65\x78\x70\151\162\x79\x5f\144\141\164\145", $v5["\x6c\151\143\x65\156\x65\x45\x78\160\151\162\x79\x44\x61\164\145"]);
        return $vn;
        Rs:
        Zz:
        goto bk;
        T3:
        $nQ = false;
        update_option("\x6d\x6f\x5f\163\x61\x6d\x6c\x5f\x73\154\x65", $nQ);
        if (!version_compare($this->current_version, $v5["\x6e\x65\167\126\145\x72\x73\151\x6f\156"], "\74\75")) {
            goto g8;
        }
        $vn = new stdClass();
        $vn->slug = $this->slug;
        $vn->name = $v5["\160\x6c\165\147\x69\156\116\x61\155\x65"];
        $vn->plugin = $this->plugin_slug;
        $vn->version = $v5["\156\x65\x77\x56\145\x72\163\x69\157\156"];
        $vn->new_version = $v5["\156\x65\x77\126\145\162\163\x69\x6f\x6e"];
        $vn->tested = $v5["\143\155\163\103\x6f\155\x70\x61\x74\x69\x62\151\154\x69\164\171\x56\145\x72\163\151\x6f\x6e"];
        $vn->requires = $v5["\143\x6d\x73\x4d\151\x6e\126\145\x72\x73\151\x6f\x6e"];
        $vn->requires_php = $v5["\x70\x68\160\115\151\x6e\x56\145\x72\163\x69\157\156"];
        $vn->compatibility = array($v5["\x63\x6d\163\103\x6f\x6d\160\141\164\x69\x62\x69\x6c\151\x74\171\x56\145\x72\x73\151\x6f\x6e"]);
        $vn->url = $v5["\x63\x6d\x73\120\x6c\165\x67\151\156\125\x72\154"];
        $vn->author = $v5["\160\154\x75\x67\151\x6e\x41\x75\164\x68\x6f\162"];
        $vn->author_profile = $v5["\x70\x6c\x75\147\x69\156\x41\x75\164\150\157\162\x50\162\157\146\x69\154\145"];
        $vn->last_updated = $v5["\154\x61\x73\x74\x55\160\144\x61\x74\145\x64"];
        $vn->banners = array("\154\157\x77" => $v5["\x62\141\156\x6e\x65\162"]);
        $vn->icons = array("\x31\x78" => $v5["\x69\143\x6f\156"]);
        $vn->sections = array("\x63\150\x61\x6e\147\x65\154\157\147" => $v5["\143\x68\x61\x6e\147\145\x6c\x6f\147"], "\x6c\151\143\x65\x6e\163\x65\137\151\x6e\x66\157\162\155\x61\x74\151\x6f\x6e" => _x($v5["\x6c\x69\x63\x65\x6e\163\x65\111\156\146\157\x72\155\141\x74\151\157\156"], "\120\154\165\147\x69\156\x20\151\x6e\163\164\141\154\x6c\145\162\40\x73\145\x63\164\151\157\x6e\x20\x74\151\x74\154\145"), "\x64\145\x73\143\162\151\160\164\151\x6f\x6e" => $uO, "\122\x65\x76\x69\x65\167\x73" => $Oa);
        $dI = $this->getAuthToken();
        $z8 = round(microtime(true) * 1000);
        $z8 = number_format($z8, 0, '', '');
        $vn->download_link = mo_options_plugin_constants::HOSTNAME . "\x2f\155\157\x61\x73\57\160\154\165\x67\x69\x6e\57\144\157\167\156\x6c\157\x61\x64\x2d\165\160\144\x61\164\145\x3f\x70\x6c\x75\x67\x69\156\123\154\x75\x67\x3d" . $this->plugin_slug . "\46\x6c\x69\x63\x65\156\163\145\120\154\x61\x6e\x4e\141\x6d\145\75" . mo_options_plugin_constants::LICENSE_PLAN_NAME . "\x26\143\x75\x73\x74\157\x6d\145\x72\x49\x64\75" . get_option("\x6d\x6f\137\x73\141\155\x6c\x5f\x61\144\x6d\x69\x6e\x5f\143\x75\163\x74\157\x6d\x65\x72\137\153\x65\171") . "\46\154\x69\143\x65\156\x73\x65\124\171\x70\x65\x3d" . mo_options_plugin_constants::LICENSE_TYPE . "\46\x61\165\164\150\x54\157\x6b\145\156\75" . $dI . "\x26\x6f\x74\160\x54\x6f\153\145\x6e\75" . $z8;
        $vn->package = $vn->download_link;
        $vn->external = '';
        $vn->homepage = !empty($v5["\x68\157\155\145\160\141\147\145"]) ? $v5["\150\x6f\155\145\x70\x61\147\145"] : '';
        $vn->reviews = true;
        $vn->active_installs = $Ef;
        $vn->rating = $Zx;
        $vn->ratings = $hw;
        $vn->num_ratings = $Hu;
        update_option("\x6d\x6f\137\163\x61\155\154\x5f\154\151\143\145\156\x73\x65\137\x65\x78\160\x69\162\171\x5f\144\x61\164\x65", $v5["\154\x69\x63\145\156\145\105\170\x70\151\x72\171\104\x61\164\x65"]);
        return $vn;
        g8:
        bk:
        me:
        return $yy;
    }
    private function getRemote()
    {
        $UY = get_option("\155\x6f\137\x73\x61\x6d\154\x5f\x61\144\x6d\151\156\x5f\143\x75\x73\164\157\x6d\145\162\137\x6b\x65\171");
        $Ru = get_option("\x6d\x6f\x5f\x73\141\x6d\x6c\137\x61\144\x6d\x69\x6e\137\x61\x70\x69\137\x6b\x65\171");
        $z8 = round(microtime(true) * 1000);
        $Po = $UY . number_format($z8, 0, '', '') . $Ru;
        $dI = hash("\x73\150\x61\x35\x31\x32", $Po);
        $z8 = number_format($z8, 0, '', '');
        $eM = array("\x70\154\165\x67\151\x6e\123\154\x75\147" => $this->plugin_slug, "\154\151\143\x65\x6e\163\x65\x50\x6c\141\x6e\x4e\141\155\x65" => mo_options_plugin_constants::LICENSE_PLAN_NAME, "\143\165\163\164\157\155\x65\162\111\x64" => $UY, "\x6c\151\x63\145\x6e\x73\x65\x54\x79\160\x65" => mo_options_plugin_constants::LICENSE_TYPE);
        $E7 = array("\x68\145\x61\x64\x65\162\x73" => array("\103\x6f\156\164\145\x6e\164\55\124\x79\160\x65" => "\x61\160\x70\154\x69\143\x61\164\151\157\156\57\152\163\x6f\156\x3b\40\x63\150\141\162\x73\145\164\x3d\165\x74\x66\55\70", "\x43\x75\x73\164\x6f\155\145\162\55\113\x65\171" => $UY, "\124\x69\155\x65\163\x74\141\155\x70" => $z8, "\x41\165\164\x68\x6f\x72\x69\172\x61\x74\x69\x6f\156" => $dI), "\142\x6f\x64\171" => json_encode($eM), "\x6d\145\164\x68\x6f\144" => "\120\117\x53\124", "\x64\141\164\141\x5f\x66\x6f\162\x6d\x61\x74" => "\142\157\x64\x79", "\163\163\x6c\166\145\162\x69\146\x79" => false);
        $Oc = wp_remote_post($this->update_path, $E7);
        if (!(!is_wp_error($Oc) || wp_remote_retrieve_response_code($Oc) === 200)) {
            goto Nc;
        }
        $CV = json_decode($Oc["\x62\x6f\x64\x79"], true);
        return $CV;
        Nc:
        return false;
    }
    private function getAuthToken()
    {
        $UY = get_option("\x6d\157\137\x73\141\155\x6c\137\141\144\x6d\151\156\x5f\143\x75\x73\164\157\x6d\x65\x72\x5f\x6b\145\x79");
        $Ru = get_option("\x6d\x6f\137\163\141\x6d\154\137\141\144\155\x69\x6e\137\141\x70\x69\137\x6b\x65\x79");
        $z8 = round(microtime(true) * 1000);
        $Po = $UY . number_format($z8, 0, '', '') . $Ru;
        $dI = hash("\x73\150\x61\x35\x31\x32", $Po);
        return $dI;
    }
    function zipData($gH, $tG)
    {
        if (!(extension_loaded("\x7a\151\160") && file_exists($gH) && count(glob($gH . DIRECTORY_SEPARATOR . "\x2a")) !== 0)) {
            goto Vq;
        }
        $vs = new ZipArchive();
        if (!$vs->open($tG, ZIPARCHIVE::CREATE)) {
            goto y2;
        }
        $gH = realpath($gH);
        if (is_dir($gH) === true) {
            goto bO;
        }
        if (!is_file($gH)) {
            goto hg;
        }
        $vs->addFromString(basename($gH), file_get_contents($gH));
        hg:
        goto co;
        bO:
        $We = new RecursiveDirectoryIterator($gH);
        $We->setFlags(RecursiveDirectoryIterator::SKIP_DOTS);
        $Qt = new RecursiveIteratorIterator($We, RecursiveIteratorIterator::SELF_FIRST);
        foreach ($Qt as $ZD) {
            $ZD = realpath($ZD);
            if (is_dir($ZD) === true) {
                goto kZ;
            }
            if (!(is_file($ZD) === true)) {
                goto mu;
            }
            $vs->addFromString(str_replace($gH . DIRECTORY_SEPARATOR, '', $ZD), file_get_contents($ZD));
            mu:
            goto cS;
            kZ:
            $vs->addEmptyDir(str_replace($gH . DIRECTORY_SEPARATOR, '', $ZD . DIRECTORY_SEPARATOR));
            cS:
            ag:
        }
        iL:
        co:
        y2:
        return $vs->close();
        Vq:
        return false;
    }
    function mo_saml_plugin_update_message($g4, $Oc)
    {
        if (!empty($g4["\x73\164\141\164\165\163\137\x63\157\x64\145"])) {
            goto C1;
        }
        return;
        C1:
        if ($g4["\x73\x74\x61\x74\165\x73\137\143\x6f\x64\x65"] == "\123\125\x43\103\x45\123\x53") {
            goto ij;
        }
        if (!($g4["\163\164\x61\x74\x75\163\x5f\x63\x6f\144\145"] == "\104\105\x4e\x49\x45\104")) {
            goto pU;
        }
        echo sprintf(__($g4["\x6c\151\x63\145\x6e\163\145\137\x69\156\x66\157\x72\155\141\164\151\157\156"]));
        pU:
        goto HB;
        ij:
        $xT = wp_upload_dir();
        $pI = $xT["\x62\x61\163\145\144\151\x72"];
        $xT = rtrim($pI, "\57");
        $ou = $xT . DIRECTORY_SEPARATOR . "\142\x61\x63\153\x75\x70";
        $kV = "\x6d\x69\x6e\151\x6f\x72\x61\x6e\x67\x65\x2d\x73\141\x6d\154\55\62\x30\55\x73\151\x6e\x67\x6c\145\55\x73\151\147\156\x2d\x6f\x6e\55\160\x72\x65\x6d\151\165\x6d\x2d\142\141\x63\x6b\x75\x70\x2d" . $this->current_version;
        $Mp = explode("\74\x2f\165\154\76", $g4["\x6e\145\x77\137\x76\x65\x72\163\x69\x6f\x6e\x5f\143\x68\x61\156\147\145\154\157\147"]);
        $z6 = $Mp[0];
        $S9 = $z6 . "\x3c\57\165\x6c\x3e";
        echo "\74\144\x69\166\76\x3c\142\76" . __("\x3c\x62\162\40\x2f\76\101\156\x20\141\x75\164\157\155\x61\x74\151\143\40\142\x61\143\153\x75\x70\40\x6f\146\x20\x63\165\x72\162\145\156\x74\40\166\x65\x72\x73\x69\x6f\x6e\40" . $this->current_version . "\40\x68\x61\x73\x20\142\x65\x65\x6e\x20\x63\x72\145\141\164\x65\144\40\x61\164\x20\164\150\x65\x20\x6c\x6f\143\x61\x74\x69\x6f\x6e\40" . $ou . "\40\167\151\164\x68\40\x74\x68\x65\40\156\x61\155\x65\x20\74\163\x70\x61\156\x20\163\164\171\154\145\75\42\143\x6f\x6c\157\162\72\43\60\x30\x37\x33\x61\x61\73\x22\76" . $kV . "\x3c\x2f\163\x70\x61\x6e\76\56\40\x49\x6e\40\x63\141\x73\x65\x2c\40\163\x6f\155\145\164\150\151\x6e\x67\x20\142\x72\x65\141\153\x73\40\x64\x75\162\x69\156\147\40\x74\x68\x65\40\165\x70\x64\x61\x74\x65\54\40\171\157\165\x20\143\x61\x6e\40\162\145\166\x65\x72\x74\40\164\x6f\x20\x79\157\165\x72\40\x63\x75\x72\162\x65\x6e\164\x20\166\x65\162\x73\x69\157\x6e\40\142\171\x20\162\x65\160\x6c\141\x63\151\x6e\x67\40\x74\x68\x65\40\x62\141\143\x6b\x75\x70\x20\165\163\x69\156\147\40\106\124\x50\40\x61\x63\143\x65\x73\163\56", "\x6d\x69\x6e\151\157\162\x61\156\x67\x65\x2d\x73\x61\x6d\x6c\55\x32\x30\55\x73\151\156\147\154\x65\55\163\151\147\156\55\157\x6e") . "\74\x2f\142\x3e\x3c\x2f\x64\151\166\x3e\74\x64\x69\166\40\x73\x74\171\x6c\145\x3d\x22\143\x6f\x6c\x6f\162\x3a\40\x23\x66\x30\60\x3b\42\x3e" . __("\74\142\x72\40\57\76\124\141\x6b\x65\x20\141\x20\x6d\x69\x6e\x75\x74\145\x20\x74\157\40\x63\x68\x65\x63\x6b\x20\164\150\145\x20\x63\150\141\156\147\x65\x6c\x6f\x67\x20\157\146\40\154\141\x74\145\x73\x74\40\x76\x65\x72\x73\x69\x6f\x6e\40\x6f\x66\x20\x74\x68\x65\x20\x70\x6c\x75\x67\x69\156\56\40\x48\x65\x72\145\47\163\x20\x77\150\171\x20\x79\157\165\x20\156\145\145\x64\x20\164\x6f\x20\x75\160\144\141\164\145\72", "\x6d\x69\156\x69\x6f\x72\141\x6e\147\x65\x2d\x73\141\x6d\154\55\x32\60\x2d\x73\151\156\x67\154\145\x2d\163\x69\147\x6e\55\x6f\156") . "\74\x2f\x64\x69\x76\76";
        echo "\x3c\144\x69\166\40\x73\164\171\154\145\75\42\146\x6f\156\164\55\x77\145\151\x67\150\x74\x3a\x20\156\157\162\x6d\x61\154\x3b\42\76" . $S9 . "\x3c\57\144\x69\x76\x3e\x3c\x62\76\x4e\157\x74\145\72\74\x2f\x62\76\40\120\x6c\145\141\163\145\x20\x63\154\151\143\x6b\x20\x6f\x6e\x20\74\x62\x3e\x56\151\x65\167\x20\126\145\x72\163\151\157\x6e\40\x64\x65\x74\141\x69\x6c\163\x3c\57\x62\76\40\x6c\x69\156\153\x20\164\x6f\x20\x67\145\x74\40\143\157\155\x70\154\x65\164\x65\40\143\150\141\156\x67\x65\154\x6f\x67\x20\141\x6e\144\x20\154\x69\x63\x65\156\x73\145\x20\151\156\x66\157\162\x6d\141\x74\151\x6f\x6e\56\40\103\154\151\143\x6b\40\157\x6e\x20\74\x62\x3e\125\x70\144\141\x74\x65\40\116\x6f\x77\74\57\142\x3e\40\x6c\151\x6e\153\x20\x74\157\x20\x75\x70\144\141\164\x65\x20\x74\150\x65\40\160\154\x75\147\151\156\40\164\157\40\x6c\141\164\x65\x73\x74\x20\166\145\x72\x73\151\x6f\156\56";
        HB:
    }
    public function mo_saml_license_key_notice()
    {
        if (empty($_GET["\x6d\157\163\x61\x6d\154\55\144\x69\x73\x6d\151\163\163"])) {
            goto na;
        }
        return;
        na:
        $user = wp_get_current_user();
        $Df = $user->roles;
        $iT = 0;
        if (empty(get_option("\155\157\137\163\x61\x6d\154\x5f\154\x69\x63\x65\x6e\163\145\x5f\145\170\160\151\x72\x79\137\x64\x61\x74\x65"))) {
            goto xJ;
        }
        $iT = date_diff(new DateTime(), new DateTime(get_option("\155\157\x5f\163\141\155\x6c\137\154\151\x63\145\156\163\145\137\145\x78\160\151\162\171\x5f\144\141\x74\145")))->days;
        xJ:
        if (!(!in_array("\141\x64\x6d\x69\x6e\x69\163\x74\162\141\x74\x6f\x72", $Df) && $iT <= 30)) {
            goto qT;
        }
        return;
        qT:
        if (!(get_option("\155\x6f\137\163\x61\x6d\154\137\163\154\145") && new DateTime() > get_option("\x6d\157\55\163\141\x6d\154\x2d\x70\x6c\x75\x67\x69\156\x2d\164\x69\155\x65\162"))) {
            goto Bb;
        }
        $of = esc_url(add_query_arg(array("\155\x6f\x73\x61\x6d\154\x2d\144\x69\163\x6d\151\163\x73" => wp_create_nonce("\x73\141\155\154\55\x64\x69\163\155\x69\x73\x73"))));
        echo "\74\x73\x63\162\151\x70\164\x3e\15\12\x9\x9\11\11\146\165\156\x63\x74\151\x6f\x6e\x20\155\157\x53\101\115\x4c\120\x61\x79\x6d\145\x6e\164\123\164\145\160\x73\50\51\x20\173\xd\12\x9\11\x9\11\x9\x76\x61\x72\x20\x61\x74\164\162\x20\75\x20\x64\x6f\143\x75\155\x65\156\164\x2e\x67\x65\164\105\x6c\145\x6d\145\x6e\164\x42\171\111\144\50\42\x6d\x6f\163\x61\x6d\154\x70\141\x79\155\x65\156\x74\163\x74\145\160\x73\42\51\x2e\x73\164\x79\x6c\145\x2e\144\151\163\160\x6c\x61\171\73\xd\12\11\x9\x9\x9\x9\x69\146\50\141\164\x74\x72\40\x3d\x3d\40\42\156\157\x6e\145\42\51\173\15\xa\11\x9\11\11\11\x9\x64\x6f\x63\165\155\145\156\x74\x2e\147\145\164\105\154\145\x6d\145\x6e\x74\x42\x79\x49\144\50\42\155\157\x73\x61\155\154\160\x61\x79\155\x65\156\164\163\164\x65\x70\x73\x22\x29\x2e\x73\x74\171\x6c\x65\56\144\151\163\160\154\x61\171\40\75\x20\42\x62\x6c\157\143\153\42\73\xd\12\11\11\x9\11\11\175\145\x6c\x73\x65\173\xd\xa\11\x9\11\11\11\11\144\x6f\143\x75\x6d\x65\x6e\164\56\147\x65\x74\x45\154\x65\155\x65\x6e\x74\102\171\111\x64\x28\42\x6d\x6f\163\141\x6d\x6c\160\141\x79\155\145\156\164\x73\x74\145\x70\x73\x22\x29\x2e\x73\x74\171\x6c\x65\x2e\x64\151\x73\x70\154\141\x79\x20\75\x20\42\156\x6f\x6e\145\x22\x3b\xd\12\x9\11\11\x9\11\175\15\xa\11\11\11\11\x7d\15\xa\11\x9\11\x3c\57\x73\143\x72\151\160\x74\76";
        $iV = get_option("\x6d\157\x5f\x72\x65\x6e\x65\167\x61\x6c\137\x61\x64\155\x69\x6e\137\x6e\157\x74\151\x63\x65");
        if (empty($iV)) {
            goto lA;
        }
        $Ng = "\x3c\144\x69\166\x20\x69\x64\75\42\x6d\x65\163\x73\141\x67\x65\x22\40\163\164\x79\x6c\x65\x3d\42\160\x6f\163\x69\164\x69\157\156\72\x72\145\x6c\141\x74\151\166\145\x22\x20\x63\x6c\141\163\163\75\42\156\157\x74\x69\143\145\x20\x6e\x6f\x74\x69\x63\145\x20\x6e\x6f\164\151\x63\x65\x2d\167\141\x72\x6e\x69\156\147\x22\76\x3c\x62\x72\x20\57\x3e\74\163\x70\x61\x6e\40\143\x6c\x61\163\163\x3d\x22\141\154\151\147\156\x6c\145\146\x74\x22\x20\163\164\171\154\145\x3d\x22\143\157\x6c\x6f\x72\72\x23\x61\x30\x30\73\x66\x6f\156\x74\55\146\x61\x6d\151\x6c\171\72\40\x2d\x77\x65\142\x6b\151\164\55\160\x69\143\x74\157\147\x72\x61\160\150\73\146\x6f\x6e\x74\x2d\163\151\172\x65\x3a\x20\62\65\160\x78\x3b\42\x3e\x49\x4d\x50\x4f\x52\x54\101\x4e\124\41\x3c\57\x73\160\x61\156\76\74\x62\162\40\57\76\x3c\x69\x6d\x67\x20\x73\162\143\x3d\42" . plugin_dir_url(__FILE__) . "\x69\155\x61\147\145\163\57\x6d\x69\156\x69\x6f\162\x61\156\x67\145\x2d\154\157\147\157\x2e\x70\x6e\147" . "\x22\x20\143\x6c\x61\163\163\x3d\x22\141\x6c\x69\147\156\154\145\x66\164\x22\x20\x68\x65\x69\x67\150\x74\x3d\42\x38\x37\x22\x20\167\151\144\x74\x68\x3d\42\66\66\x22\x20\x61\x6c\164\x3d\42\x6d\x69\156\x69\x4f\x72\141\156\147\145\40\x6c\157\147\x6f\x22\x20\x73\164\x79\154\145\75\x22\155\x61\162\147\151\x6e\x3a\61\60\x70\x78\40\61\60\160\x78\40\61\60\160\x78\x20\60\73\x20\150\x65\x69\147\150\164\72\x31\x32\70\x70\x78\73\x20\167\x69\144\x74\150\x3a\40\61\x32\70\x70\x78\73\42\76\x3c\x68\x33\x3e\155\151\x6e\x69\x4f\162\x61\156\147\145\40\x53\x41\115\x4c\x20\x32\56\60\x20\x53\151\x6e\x67\x6c\x65\x20\x53\151\147\x6e\x2d\x4f\x6e\x20\123\165\160\x70\x6f\162\x74\40\46\40\x4d\x61\151\x6e\164\145\156\x61\156\x63\145\x20\114\x69\143\x65\x6e\163\x65\x20\x45\x78\x70\151\x72\145\144\74\x2f\x68\63\76";
        $Ng .= $iV;
        $Ng .= "\74\141\40\x68\162\x65\146\x3d\x22" . $of . "\42\x20\143\154\x61\163\x73\75\42\x61\x6c\x69\x67\x6e\x72\151\x67\x68\x74\x20\x62\165\x74\x74\x6f\156\x20\142\165\x74\x74\x6f\156\x2d\x6c\151\156\x6b\42\x3e\x44\x69\163\x6d\x69\163\163\x3c\x2f\x61\x3e\x3c\57\160\76\74\144\151\x76\40\143\x6c\x61\x73\163\x3d\42\x63\x6c\145\141\x72\x22\76\74\x2f\144\151\x76\x3e\x3c\57\144\x69\x76\x3e";
        echo $Ng;
        lA:
        Bb:
    }
    public function mo_saml_dismiss_notice()
    {
        if (!empty($_GET["\x6d\x6f\x73\141\155\x6c\55\x64\151\163\x6d\151\x73\163"])) {
            goto O_;
        }
        return;
        O_:
        if (wp_verify_nonce($_GET["\155\x6f\163\141\x6d\x6c\55\144\x69\163\155\x69\x73\163"], "\x73\141\x6d\x6c\x2d\x64\151\x73\155\x69\163\163")) {
            goto cR;
        }
        return;
        cR:
        if (!(isset($_GET["\155\x6f\x73\141\x6d\154\55\144\151\x73\x6d\x69\x73\x73"]) && wp_verify_nonce($_GET["\x6d\157\x73\x61\155\x6c\x2d\x64\151\x73\155\x69\x73\163"], "\163\141\155\x6c\x2d\x64\x69\163\x6d\151\163\x73"))) {
            goto zB;
        }
        $rS = new DateTime();
        $rS->modify("\x2b\61\40\x64\x61\171");
        update_option("\155\x6f\55\163\141\x6d\x6c\55\x70\154\x75\147\151\156\x2d\x74\151\x6d\x65\162", $rS);
        zB:
    }
    function mo_saml_create_backup_dir()
    {
        $ou = plugin_dir_path(__FILE__);
        $ou = rtrim($ou, "\57");
        $ou = rtrim($ou, "\x5c");
        $g4 = get_plugin_data(__FILE__);
        $Yy = $g4["\124\x65\170\x74\104\x6f\155\141\151\156"];
        $xT = wp_upload_dir();
        $pI = $xT["\x62\141\x73\x65\144\151\162"];
        $xT = rtrim($pI, "\x2f");
        $fa = $xT . DIRECTORY_SEPARATOR . "\142\141\x63\153\165\x70" . DIRECTORY_SEPARATOR . $Yy . "\x2d\160\162\145\155\x69\165\x6d\55\142\141\143\153\165\160\x2d" . $this->current_version;
        if (file_exists($fa)) {
            goto qp;
        }
        mkdir($fa, 0777, true);
        qp:
        $gH = $ou;
        $tG = $fa;
        $this->mo_saml_copy_files_to_backup_dir($gH, $tG);
    }
    function mo_saml_copy_files_to_backup_dir($ou, $fa)
    {
        if (!is_dir($ou)) {
            goto JR;
        }
        $RO = scandir($ou);
        JR:
        if (!empty($RO)) {
            goto Cd;
        }
        return;
        Cd:
        foreach ($RO as $q1) {
            if (!($q1 == "\56" || $q1 == "\56\56")) {
                goto oP;
            }
            goto Eg;
            oP:
            $bo = $ou . DIRECTORY_SEPARATOR . $q1;
            $EG = $fa . DIRECTORY_SEPARATOR . $q1;
            if (is_dir($bo)) {
                goto Wf;
            }
            copy($bo, $EG);
            goto PR;
            Wf:
            if (file_exists($EG)) {
                goto bG;
            }
            mkdir($EG, 0777, true);
            bG:
            $this->mo_saml_copy_files_to_backup_dir($bo, $EG);
            PR:
            Eg:
        }
        dX:
    }
}
function mo_saml_update()
{
    if (!mo_saml_is_customer_registered()) {
        goto jQ;
    }
    $kA = mo_options_plugin_constants::HOSTNAME;
    $WJ = mo_options_plugin_constants::Version;
    $oi = $kA . "\x2f\155\x6f\x61\x73\x2f\x61\160\x69\x2f\160\x6c\165\147\x69\x6e\57\155\145\164\x61\144\141\x74\x61";
    $lX = plugin_basename(dirname(__FILE__) . "\x2f\x6c\157\x67\x69\156\56\160\150\x70");
    $cB = new mo_saml_update_framework($WJ, $oi, $lX);
    add_action("\x69\156\x5f\160\154\x75\x67\151\x6e\x5f\x75\160\x64\141\x74\x65\137\x6d\x65\163\x73\x61\x67\145\x2d{$lX}", array($cB, "\155\x6f\x5f\163\x61\155\154\x5f\x70\x6c\x75\x67\151\x6e\x5f\165\160\144\x61\x74\x65\137\x6d\x65\163\163\x61\x67\x65"), 10, 2);
    add_action("\141\144\x6d\151\156\x5f\150\x65\x61\x64", array($cB, "\155\157\137\163\141\155\154\137\x6c\x69\x63\145\x6e\163\x65\x5f\153\145\171\137\x6e\157\x74\x69\x63\145"));
    add_action("\x61\144\155\x69\156\137\156\x6f\164\x69\x63\x65\163", array($cB, "\155\157\137\x73\x61\155\x6c\137\144\x69\x73\155\151\x73\x73\x5f\156\157\x74\151\143\x65"), 50);
    if (!get_option("\x6d\x6f\x5f\163\141\x6d\x6c\x5f\x73\154\145")) {
        goto U8;
    }
    update_option("\x6d\x6f\x5f\163\x61\x6d\x6c\137\163\154\145\137\155\x65\163\x73\x61\147\x65", "\x59\x6f\165\x72\40\123\101\x4d\114\x20\x70\154\x75\147\151\x6e\40\154\151\143\145\x6e\x73\x65\40\150\141\x73\x65\40\x62\145\145\156\x20\145\170\x70\x69\x72\145\x64\x2e\x20\x59\157\x75\x20\141\162\145\x20\x6d\x69\163\x73\x69\x6e\x67\40\x6f\165\164\x20\157\x6e\x20\x75\x70\x64\141\164\145\x73\x20\141\156\x64\40\163\x75\x70\x70\157\162\164\41\40\x50\154\x65\x61\x73\x65\40\x3c\141\40\150\x72\145\146\75\42" . mo_options_plugin_constants::HOSTNAME . "\x2f\x6d\157\x61\163\57\154\x6f\147\151\x6e\x3f\162\145\144\x69\x72\145\143\x74\125\x72\x6c\x3d" . mo_options_plugin_constants::HOSTNAME . "\57\155\x6f\x61\x73\57\x61\x64\x6d\151\x6e\57\143\165\163\x74\x6f\155\145\x72\x2f\x6c\151\x63\145\156\163\x65\162\145\156\x65\x77\141\x6c\163\x3f\x72\145\156\x65\167\x61\154\x72\x65\x71\165\x65\x73\164\75" . mo_options_plugin_constants::LICENSE_TYPE . "\x20\x22\40\x74\x61\x72\147\145\x74\75\42\x5f\x62\x6c\141\156\x6b\x22\x3e\x3c\x62\x3e\x43\x6c\x69\x63\x6b\40\x48\145\162\x65\74\57\x62\76\74\x2f\141\76\x20\x74\157\40\162\145\x6e\145\x77\40\164\150\145\40\x53\165\x70\x70\157\x72\164\x20\x61\156\x64\x20\x4d\x61\x69\156\164\145\156\x61\143\145\x20\x70\x6c\x61\x6e\56");
    U8:
    jQ:
}

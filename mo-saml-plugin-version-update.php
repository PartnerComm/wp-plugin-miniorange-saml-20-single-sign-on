<?php


require_once dirname(__FILE__) . "\57\151\156\143\154\x75\144\145\x73\57\154\151\x62\x2f\x6d\x6f\55\x6f\160\x74\151\x6f\156\x73\55\x65\x6e\x75\x6d\x2e\160\150\x70";
add_action("\141\144\x6d\151\x6e\137\151\x6e\x69\x74", "\155\157\x5f\163\141\x6d\x6c\137\x75\160\x64\141\x74\x65");
class mo_saml_update_framework
{
    private $current_version;
    private $update_path;
    private $plugin_slug;
    private $slug;
    private $plugin_file;
    private $new_version_changelog;
    public function __construct($hO, $HD = "\x2f", $jn = "\57")
    {
        $this->current_version = $hO;
        $this->update_path = $HD;
        $this->plugin_slug = $jn;
        list($OU, $RP) = explode("\x2f", $jn);
        $this->slug = $OU;
        $this->plugin_file = $RP;
        add_filter("\160\x72\x65\x5f\163\145\x74\137\163\x69\x74\145\x5f\x74\x72\x61\156\163\151\x65\156\164\137\165\160\144\141\164\x65\x5f\x70\154\165\x67\x69\156\x73", array(&$this, "\x6d\x6f\137\163\x61\155\x6c\137\x63\150\x65\143\x6b\x5f\x75\x70\144\141\164\x65"));
        add_filter("\160\154\x75\x67\x69\156\x73\137\x61\160\151", array(&$this, "\155\157\137\163\x61\155\x6c\x5f\143\150\145\x63\x6b\x5f\151\x6e\146\x6f"), 10, 3);
    }
    public function mo_saml_check_update($WK)
    {
        if (!empty($WK->checked)) {
            goto yJ;
        }
        return $WK;
        yJ:
        $WH = $this->getRemote();
        if (!empty($WH)) {
            goto l2;
        }
        return $WK;
        l2:
        if (!(isset($WH["\154\x69\x63\145\x6e\163\x65\111\x6e\x66\157\162\x6d\x61\164\151\157\156"]) and get_option("\x6d\157\x5f\163\x61\155\x6c\x5f\163\x6c\145"))) {
            goto h_;
        }
        update_option("\x6d\157\x5f\x72\x65\156\x65\x77\141\154\x5f\x61\x64\155\151\156\x5f\x6e\x6f\164\151\x63\145", $WH["\x6c\151\x63\x65\x6e\163\x65\111\156\x66\157\x72\155\141\x74\x69\x6f\x6e"]);
        h_:
        if ($WH["\x73\x74\x61\x74\165\163"] == "\x53\125\103\x43\x45\123\x53") {
            goto db;
        }
        if (!($WH["\x73\164\x61\x74\165\163"] == "\104\105\116\x49\105\104")) {
            goto V2;
        }
        if (!version_compare($this->current_version, $WH["\x6e\145\x77\126\145\x72\163\151\x6f\156"], "\x3c")) {
            goto Ad;
        }
        $p2 = new stdClass();
        $p2->slug = $this->slug;
        $p2->new_version = $WH["\156\145\x77\x56\x65\162\163\x69\157\156"];
        $p2->url = "\x68\x74\x74\160\163\x3a\x2f\x2f\155\151\156\x69\157\162\141\156\147\145\x2e\x63\157\155";
        $p2->plugin = $this->plugin_slug;
        $p2->tested = $WH["\x63\x6d\163\x43\157\x6d\x70\x61\164\x69\142\151\x6c\151\164\171\x56\x65\x72\163\x69\157\x6e"];
        $p2->icons = array("\61\x78" => $WH["\x69\143\x6f\156"]);
        $p2->status_code = $WH["\163\164\141\164\x75\163"];
        $p2->license_information = $WH["\154\x69\143\145\156\163\x65\x49\x6e\x66\x6f\162\155\141\x74\151\x6f\x6e"];
        update_option("\155\157\x5f\163\x61\x6d\x6c\x5f\154\x69\143\x65\x6e\163\x65\x5f\x65\170\160\x69\162\x79\x5f\144\x61\x74\145", $WH["\154\151\x63\x65\156\x65\x45\170\160\x69\162\x79\x44\141\164\x65"]);
        $WK->response[$this->plugin_slug] = $p2;
        $ot = true;
        update_option("\155\157\137\x73\141\155\154\137\163\x6c\x65", $ot);
        set_transient("\165\x70\x64\x61\x74\145\137\x70\154\x75\x67\151\156\163", $WK);
        return $WK;
        Ad:
        V2:
        goto mN;
        db:
        $ot = false;
        update_option("\155\x6f\137\x73\x61\x6d\x6c\x5f\x73\x6c\x65", $ot);
        if (!version_compare($this->current_version, $WH["\x6e\x65\x77\126\x65\162\x73\151\x6f\156"], "\74")) {
            goto lB;
        }
        ini_set("\155\141\x78\x5f\x65\x78\x65\x63\165\x74\x69\x6f\156\137\164\x69\x6d\x65", 600);
        ini_set("\155\145\155\157\x72\x79\x5f\154\x69\155\151\164", "\61\60\62\64\115");
        $aT = plugin_dir_path(__FILE__);
        $aT = rtrim($aT, "\57");
        $aT = rtrim($aT, "\x5c");
        $u6 = $aT . "\55\x70\162\145\155\x69\x75\x6d\55\142\141\143\x6b\x75\x70\55" . $this->current_version . "\56\x7a\151\160";
        $this->mo_saml_create_backup_dir();
        $Vz = $this->getAuthToken();
        $a3 = round(microtime(true) * 1000);
        $a3 = number_format($a3, 0, '', '');
        $p2 = new stdClass();
        $p2->slug = $this->slug;
        $p2->new_version = $WH["\x6e\145\x77\126\x65\x72\x73\151\157\156"];
        $p2->url = "\150\164\x74\x70\163\72\57\x2f\x6d\x69\x6e\x69\x6f\162\x61\156\x67\x65\56\x63\x6f\x6d";
        $p2->plugin = $this->plugin_slug;
        $p2->package = mo_options_plugin_constants::HOSTNAME . "\57\x6d\157\x61\163\57\160\x6c\165\x67\151\156\x2f\144\x6f\167\156\154\x6f\141\144\55\x75\160\x64\141\164\x65\77\x70\x6c\x75\x67\151\x6e\x53\154\x75\x67\75" . $this->plugin_slug . "\46\x6c\x69\x63\145\156\x73\145\x50\x6c\141\x6e\116\x61\x6d\x65\75" . mo_options_plugin_constants::LICENSE_PLAN_NAME . "\46\143\x75\x73\164\157\155\x65\162\x49\x64\x3d" . get_option("\x6d\157\137\x73\x61\155\154\137\x61\x64\x6d\151\x6e\x5f\x63\x75\163\164\157\155\x65\x72\137\153\x65\x79") . "\x26\x6c\151\143\x65\x6e\x73\x65\124\x79\x70\145\x3d" . mo_options_plugin_constants::LICENSE_TYPE . "\46\x61\x75\164\x68\124\157\x6b\145\156\75" . $Vz . "\46\157\x74\x70\124\x6f\153\145\x6e\x3d" . $a3;
        $p2->tested = $WH["\143\155\163\x43\157\155\160\141\164\151\x62\151\x6c\151\164\171\126\145\162\163\x69\157\x6e"];
        $p2->icons = array("\61\x78" => $WH["\151\143\x6f\156"]);
        $p2->new_version_changelog = $WH["\x63\150\x61\x6e\x67\x65\x6c\x6f\147"];
        $p2->status_code = $WH["\163\x74\141\164\165\163"];
        update_option("\155\157\x5f\163\x61\155\x6c\x5f\154\x69\143\x65\x6e\x73\145\x5f\145\x78\160\x69\x72\x79\137\x64\x61\x74\x65", $WH["\x6c\x69\143\x65\x6e\x65\x45\170\160\x69\x72\171\104\141\x74\x65"]);
        $WK->response[$this->plugin_slug] = $p2;
        set_transient("\x75\160\x64\141\164\x65\x5f\160\154\x75\x67\x69\x6e\163", $WK);
        return $WK;
        lB:
        mN:
        return $WK;
    }
    public function mo_saml_check_info($p2, $cF, $Zq)
    {
        if (!(($cF == "\161\x75\145\162\x79\x5f\160\x6c\165\x67\151\x6e\163" || $cF == "\x70\x6c\165\147\x69\156\137\x69\x6e\x66\x6f\162\155\x61\164\151\x6f\x6e") && isset($Zq->slug) && ($Zq->slug === $this->slug || $Zq->slug === $this->plugin_file))) {
            goto qM;
        }
        $cj = $this->getRemote();
        if (!empty($cj)) {
            goto Pk;
        }
        return $p2;
        Pk:
        remove_filter("\160\154\165\x67\151\x6e\x73\137\141\160\x69", array($this, "\155\157\137\163\141\x6d\154\x5f\x63\150\145\x63\x6b\x5f\151\x6e\146\157"));
        $PD = plugins_api("\160\154\x75\x67\x69\156\137\151\x6e\146\157\162\x6d\x61\164\151\157\156", array("\x73\x6c\x75\147" => $this->slug, "\146\151\145\x6c\x64\163" => array("\141\143\164\151\166\145\137\151\156\x73\164\x61\x6c\154\163" => true, "\x6e\x75\x6d\x5f\x72\x61\x74\151\x6e\147\x73" => true, "\x72\141\x74\151\x6e\x67" => true, "\x72\x61\x74\151\x6e\x67\163" => true, "\162\x65\166\x69\145\167\x73" => true)));
        $tw = false;
        $jW = false;
        $kv = false;
        $BM = false;
        $B3 = '';
        $Fd = '';
        if (is_wp_error($PD)) {
            goto gq;
        }
        $tw = $PD->active_installs;
        $jW = $PD->rating;
        $kv = $PD->ratings;
        $BM = $PD->num_ratings;
        $B3 = $PD->sections["\144\x65\x73\x63\x72\151\160\x74\151\157\156"];
        $Fd = $PD->sections["\x72\x65\x76\x69\x65\167\163"];
        gq:
        add_filter("\x70\x6c\165\x67\151\156\x73\x5f\141\x70\151", array($this, "\x6d\157\137\x73\x61\x6d\x6c\137\x63\x68\145\x63\153\x5f\x69\x6e\x66\157"), 10, 3);
        if ($cj["\x73\164\x61\164\x75\x73"] == "\123\125\x43\103\x45\123\x53") {
            goto Ko;
        }
        if (!($cj["\x73\164\141\164\165\x73"] == "\104\105\x4e\x49\x45\x44")) {
            goto Ew;
        }
        if (!version_compare($this->current_version, $cj["\156\145\167\x56\145\x72\x73\151\x6f\156"], "\74")) {
            goto Nn;
        }
        $sP = new stdClass();
        $sP->slug = $this->slug;
        $sP->plugin = $this->plugin_slug;
        $sP->name = $cj["\160\x6c\165\147\x69\156\116\x61\x6d\x65"];
        $sP->version = $cj["\156\x65\x77\126\145\162\x73\x69\157\x6e"];
        $sP->new_version = $cj["\156\x65\167\126\x65\162\x73\x69\x6f\156"];
        $sP->tested = $cj["\x63\155\x73\x43\157\155\x70\x61\164\x69\x62\x69\x6c\x69\x74\171\126\145\162\163\151\157\x6e"];
        $sP->requires = $cj["\143\x6d\163\115\x69\156\126\145\162\163\x69\157\x6e"];
        $sP->requires_php = $cj["\160\x68\x70\115\x69\156\126\x65\162\x73\151\x6f\156"];
        $sP->compatibility = array($cj["\x63\155\163\x43\157\155\x70\141\164\151\x62\151\154\151\x74\171\x56\x65\162\x73\151\x6f\x6e"]);
        $sP->url = $cj["\x63\x6d\163\x50\x6c\x75\147\x69\156\x55\162\154"];
        $sP->author = $cj["\x70\154\165\x67\x69\x6e\x41\x75\x74\x68\x6f\162"];
        $sP->author_profile = $cj["\x70\154\x75\x67\151\x6e\101\165\164\150\157\162\x50\x72\157\x66\151\154\x65"];
        $sP->last_updated = $cj["\x6c\141\163\164\x55\160\x64\x61\x74\x65\x64"];
        $sP->banners = array("\x6c\157\x77" => $cj["\x62\141\156\x6e\x65\x72"]);
        $sP->icons = array("\61\170" => $cj["\151\143\157\x6e"]);
        $sP->sections = array("\x63\x68\141\x6e\147\145\154\157\147" => $cj["\143\x68\x61\156\147\145\154\157\x67"], "\x6c\151\x63\145\x6e\x73\145\137\x69\156\x66\157\x72\155\x61\164\151\x6f\x6e" => _x($cj["\154\x69\x63\145\156\x73\145\111\156\146\x6f\x72\x6d\x61\164\x69\x6f\156"], "\120\x6c\165\x67\151\x6e\40\151\156\163\164\x61\154\x6c\145\x72\40\163\x65\143\164\151\x6f\156\40\x74\151\164\x6c\145"), "\144\145\x73\143\162\x69\x70\164\151\157\156" => $B3, "\122\x65\x76\151\145\x77\x73" => $Fd);
        $sP->external = '';
        $sP->homepage = isset($cj["\150\157\155\145\160\x61\147\x65"]) ? $cj["\x68\x6f\x6d\145\160\141\x67\x65"] : '';
        $sP->reviews = true;
        $sP->active_installs = $tw;
        $sP->rating = $jW;
        $sP->ratings = $kv;
        $sP->num_ratings = $BM;
        update_option("\x6d\157\x5f\163\141\x6d\x6c\x5f\x6c\x69\x63\145\x6e\x73\145\x5f\x65\170\x70\x69\162\x79\137\144\141\x74\145", $cj["\154\x69\x63\x65\156\x65\105\170\160\151\x72\171\104\141\x74\x65"]);
        return $sP;
        Nn:
        Ew:
        goto zU;
        Ko:
        $ot = false;
        update_option("\x6d\157\x5f\163\x61\155\x6c\137\x73\154\x65", $ot);
        if (!version_compare($this->current_version, $cj["\x6e\145\x77\x56\x65\162\x73\x69\x6f\x6e"], "\74\75")) {
            goto gv;
        }
        $sP = new stdClass();
        $sP->slug = $this->slug;
        $sP->name = $cj["\x70\154\165\x67\151\x6e\x4e\x61\x6d\145"];
        $sP->plugin = $this->plugin_slug;
        $sP->version = $cj["\156\x65\167\x56\x65\162\x73\151\x6f\x6e"];
        $sP->new_version = $cj["\x6e\145\167\x56\x65\x72\x73\151\x6f\156"];
        $sP->tested = $cj["\x63\x6d\x73\x43\x6f\x6d\160\141\x74\151\x62\151\154\x69\x74\171\x56\145\x72\163\151\157\x6e"];
        $sP->requires = $cj["\x63\155\x73\x4d\x69\x6e\x56\145\x72\163\151\x6f\156"];
        $sP->requires_php = $cj["\x70\150\x70\x4d\x69\156\x56\x65\x72\163\x69\x6f\156"];
        $sP->compatibility = array($cj["\x63\155\163\103\x6f\x6d\x70\141\x74\x69\142\x69\154\151\164\x79\126\x65\162\x73\x69\157\x6e"]);
        $sP->url = $cj["\x63\155\x73\120\x6c\165\x67\151\x6e\125\x72\x6c"];
        $sP->author = $cj["\x70\x6c\165\x67\151\156\101\165\164\150\157\x72"];
        $sP->author_profile = $cj["\160\154\165\147\151\x6e\101\165\164\150\x6f\162\120\x72\157\x66\x69\x6c\x65"];
        $sP->last_updated = $cj["\x6c\x61\163\164\125\x70\144\x61\x74\145\144"];
        $sP->banners = array("\154\x6f\167" => $cj["\142\141\156\156\145\162"]);
        $sP->icons = array("\61\170" => $cj["\151\143\157\156"]);
        $sP->sections = array("\143\x68\141\156\147\x65\x6c\x6f\x67" => $cj["\x63\150\141\x6e\x67\145\x6c\x6f\147"], "\154\151\x63\145\x6e\163\145\x5f\x69\x6e\x66\157\x72\x6d\x61\x74\x69\x6f\x6e" => _x($cj["\x6c\x69\143\145\156\163\145\x49\x6e\146\157\x72\155\141\x74\x69\x6f\156"], "\x50\154\165\x67\x69\x6e\40\151\156\163\x74\x61\154\x6c\145\162\40\163\145\143\164\x69\157\156\x20\x74\x69\164\x6c\x65"), "\x64\145\x73\143\x72\151\x70\164\x69\157\156" => $B3, "\122\145\166\x69\x65\167\163" => $Fd);
        $Vz = $this->getAuthToken();
        $a3 = round(microtime(true) * 1000);
        $a3 = number_format($a3, 0, '', '');
        $sP->download_link = mo_options_plugin_constants::HOSTNAME . "\x2f\155\x6f\x61\163\57\160\154\x75\x67\151\156\57\x64\157\167\x6e\x6c\x6f\x61\x64\55\x75\x70\x64\141\x74\145\x3f\x70\x6c\165\147\x69\x6e\x53\154\x75\x67\75" . $this->plugin_slug . "\x26\x6c\151\x63\145\x6e\163\x65\x50\154\x61\156\x4e\x61\155\x65\x3d" . mo_options_plugin_constants::LICENSE_PLAN_NAME . "\x26\x63\165\x73\x74\x6f\x6d\145\x72\111\144\75" . get_option("\x6d\x6f\137\x73\x61\155\x6c\x5f\x61\x64\155\x69\156\x5f\x63\165\163\164\157\155\x65\x72\x5f\x6b\145\171") . "\46\154\151\x63\145\x6e\163\145\x54\171\160\x65\75" . mo_options_plugin_constants::LICENSE_TYPE . "\46\141\x75\x74\x68\124\157\x6b\x65\x6e\75" . $Vz . "\46\x6f\164\160\x54\157\x6b\x65\156\75" . $a3;
        $sP->package = $sP->download_link;
        $sP->external = '';
        $sP->homepage = isset($cj["\x68\x6f\x6d\x65\x70\x61\147\x65"]) ? $cj["\x68\157\x6d\x65\160\141\147\145"] : '';
        $sP->reviews = true;
        $sP->active_installs = $tw;
        $sP->rating = $jW;
        $sP->ratings = $kv;
        $sP->num_ratings = $BM;
        update_option("\155\x6f\x5f\163\x61\155\154\137\x6c\x69\x63\x65\156\163\145\137\x65\170\160\x69\x72\171\x5f\x64\141\164\145", $cj["\154\151\x63\145\x6e\x65\x45\170\160\x69\162\171\x44\141\164\x65"]);
        return $sP;
        gv:
        zU:
        qM:
        return $p2;
    }
    private function getRemote()
    {
        $jx = get_option("\155\157\x5f\x73\141\155\154\137\141\144\155\x69\x6e\137\x63\x75\163\x74\157\155\x65\x72\137\x6b\145\x79");
        $BU = get_option("\x6d\x6f\x5f\163\x61\155\x6c\x5f\x61\144\155\x69\156\x5f\141\x70\151\x5f\153\145\171");
        $a3 = round(microtime(true) * 1000);
        $OI = $jx . number_format($a3, 0, '', '') . $BU;
        $Vz = hash("\x73\x68\141\65\61\x32", $OI);
        $a3 = number_format($a3, 0, '', '');
        $uR = array("\x70\x6c\x75\147\x69\x6e\x53\x6c\x75\x67" => $this->plugin_slug, "\x6c\151\x63\145\156\163\145\120\x6c\141\x6e\x4e\141\x6d\145" => mo_options_plugin_constants::LICENSE_PLAN_NAME, "\x63\x75\163\164\157\x6d\145\162\111\x64" => $jx, "\x6c\x69\143\x65\156\163\145\x54\x79\160\x65" => mo_options_plugin_constants::LICENSE_TYPE);
        $Y2 = array("\150\145\x61\x64\x65\162\163" => array("\x43\157\156\164\145\156\164\x2d\x54\171\160\145" => "\141\160\x70\154\151\143\141\164\x69\157\156\x2f\152\163\x6f\156\73\40\x63\150\141\x72\163\145\x74\x3d\x75\164\x66\55\70", "\x43\x75\x73\164\157\x6d\145\162\55\113\145\x79" => $jx, "\124\151\x6d\145\x73\x74\141\x6d\160" => $a3, "\x41\165\x74\x68\x6f\x72\151\172\141\x74\x69\x6f\x6e" => $Vz), "\142\157\x64\171" => json_encode($uR), "\x6d\145\164\150\157\144" => "\120\117\123\124", "\x64\141\x74\141\137\146\157\x72\x6d\141\x74" => "\142\x6f\144\171", "\x73\x73\154\166\x65\x72\151\x66\171" => false);
        $A4 = wp_remote_post($this->update_path, $Y2);
        if (!(!is_wp_error($A4) || wp_remote_retrieve_response_code($A4) === 200)) {
            goto mG;
        }
        $dV = json_decode($A4["\142\x6f\144\x79"], true);
        return $dV;
        mG:
        return false;
    }
    private function getAuthToken()
    {
        $jx = get_option("\x6d\x6f\x5f\163\x61\x6d\x6c\137\x61\x64\x6d\151\156\x5f\143\165\x73\x74\x6f\155\145\162\x5f\x6b\x65\171");
        $BU = get_option("\x6d\x6f\x5f\163\x61\x6d\154\137\x61\x64\155\x69\x6e\137\141\x70\x69\x5f\x6b\145\171");
        $a3 = round(microtime(true) * 1000);
        $OI = $jx . number_format($a3, 0, '', '') . $BU;
        $Vz = hash("\163\x68\141\65\x31\62", $OI);
        return $Vz;
    }
    function zipData($K8, $uZ)
    {
        if (!(extension_loaded("\172\x69\x70") && file_exists($K8) && count(glob($K8 . DIRECTORY_SEPARATOR . "\x2a")) !== 0)) {
            goto q9;
        }
        $OA = new ZipArchive();
        if (!$OA->open($uZ, ZIPARCHIVE::CREATE)) {
            goto fI;
        }
        $K8 = realpath($K8);
        if (is_dir($K8) === true) {
            goto oe;
        }
        if (!is_file($K8)) {
            goto ri;
        }
        $OA->addFromString(basename($K8), file_get_contents($K8));
        ri:
        goto H6;
        oe:
        $mG = new RecursiveDirectoryIterator($K8);
        $mG->setFlags(RecursiveDirectoryIterator::SKIP_DOTS);
        $Sn = new RecursiveIteratorIterator($mG, RecursiveIteratorIterator::SELF_FIRST);
        foreach ($Sn as $ms) {
            $ms = realpath($ms);
            if (is_dir($ms) === true) {
                goto vI;
            }
            if (!(is_file($ms) === true)) {
                goto xq;
            }
            $OA->addFromString(str_replace($K8 . DIRECTORY_SEPARATOR, '', $ms), file_get_contents($ms));
            xq:
            goto Dq;
            vI:
            $OA->addEmptyDir(str_replace($K8 . DIRECTORY_SEPARATOR, '', $ms . DIRECTORY_SEPARATOR));
            Dq:
            LL:
        }
        n_:
        H6:
        fI:
        return $OA->close();
        q9:
        return false;
    }
    function mo_saml_plugin_update_message($A2, $A4)
    {
        if (array_key_exists("\163\164\x61\164\x75\163\137\x63\157\144\x65", $A2)) {
            goto rn;
        }
        return;
        rn:
        if ($A2["\x73\164\141\x74\x75\x73\x5f\x63\x6f\144\x65"] == "\x53\x55\103\x43\x45\123\123") {
            goto wE;
        }
        if (!($A2["\163\164\x61\x74\x75\163\x5f\143\157\144\x65"] == "\x44\105\x4e\x49\105\104")) {
            goto mo;
        }
        echo sprintf(__($A2["\154\x69\x63\x65\156\163\x65\x5f\x69\156\x66\157\162\x6d\141\164\x69\157\156"]));
        mo:
        goto ee;
        wE:
        $jK = wp_upload_dir();
        $Vu = $jK["\x62\141\x73\x65\144\151\162"];
        $jK = rtrim($Vu, "\57");
        $aT = $jK . DIRECTORY_SEPARATOR . "\x62\x61\x63\x6b\x75\x70";
        $u6 = "\155\151\x6e\151\x6f\162\141\156\x67\x65\55\x73\141\155\x6c\55\x32\60\55\x73\151\x6e\x67\x6c\x65\55\163\151\147\x6e\55\157\156\55\x70\x72\x65\x6d\x69\x75\x6d\55\x62\x61\x63\153\x75\160\55" . $this->current_version;
        $bU = explode("\x3c\57\x75\x6c\76", $A2["\x6e\x65\x77\x5f\x76\145\162\x73\x69\x6f\x6e\x5f\x63\150\141\156\x67\x65\154\x6f\x67"]);
        $eA = $bU[0];
        $mw = $eA . "\74\x2f\165\154\x3e";
        echo "\x3c\x64\x69\166\x3e\x3c\142\76" . __("\x3c\x62\x72\x20\57\x3e\101\x6e\40\x61\165\x74\157\155\141\x74\x69\143\40\142\x61\x63\x6b\165\x70\x20\157\x66\40\143\x75\162\x72\x65\156\x74\40\166\145\162\x73\151\x6f\x6e\x20" . $this->current_version . "\x20\x68\x61\163\40\142\x65\x65\x6e\40\143\162\145\141\164\x65\x64\40\141\164\40\164\x68\145\x20\x6c\157\143\141\x74\x69\x6f\156\x20" . $aT . "\x20\167\x69\x74\x68\40\x74\150\145\40\156\141\155\x65\x20\74\x73\x70\x61\156\40\x73\x74\x79\x6c\x65\x3d\42\143\157\154\157\x72\72\43\x30\60\x37\63\x61\x61\x3b\42\x3e" . $u6 . "\74\57\163\x70\x61\156\76\x2e\x20\x49\156\x20\x63\141\x73\145\54\x20\163\x6f\155\x65\x74\x68\151\x6e\147\x20\142\162\145\x61\153\163\x20\x64\165\x72\151\x6e\147\40\x74\x68\x65\x20\165\x70\144\x61\x74\145\x2c\40\x79\157\x75\x20\x63\141\x6e\x20\162\x65\x76\145\x72\164\x20\164\157\x20\x79\x6f\x75\x72\x20\x63\x75\162\x72\x65\x6e\164\x20\166\x65\162\163\151\x6f\x6e\40\x62\171\x20\x72\x65\x70\154\141\143\x69\x6e\147\x20\164\x68\145\40\x62\141\x63\x6b\165\160\x20\x75\163\151\x6e\x67\x20\106\x54\120\40\x61\143\x63\145\x73\163\56", "\x6d\x69\x6e\151\157\x72\x61\x6e\x67\x65\x2d\163\141\x6d\154\55\x32\60\55\x73\151\156\x67\154\x65\x2d\163\151\147\156\55\x6f\x6e") . "\x3c\57\x62\76\74\57\144\151\166\x3e\x3c\144\x69\x76\x20\163\x74\x79\x6c\x65\75\x22\143\x6f\x6c\x6f\162\x3a\x20\43\146\x30\60\73\42\x3e" . __("\x3c\142\x72\x20\57\76\124\141\x6b\x65\40\x61\40\155\x69\x6e\165\164\145\40\164\x6f\40\143\x68\x65\x63\153\x20\164\x68\145\40\x63\150\x61\x6e\x67\x65\x6c\x6f\147\x20\157\x66\x20\154\x61\x74\x65\x73\164\40\166\145\x72\163\x69\x6f\x6e\40\x6f\146\x20\164\x68\145\40\x70\154\x75\147\151\156\x2e\x20\110\x65\162\x65\47\163\40\167\150\171\x20\x79\157\x75\40\156\x65\x65\144\40\164\x6f\40\x75\160\x64\141\x74\145\72", "\x6d\x69\156\151\x6f\162\x61\x6e\147\x65\x2d\x73\x61\x6d\x6c\x2d\62\60\x2d\x73\151\x6e\147\154\x65\55\163\x69\x67\x6e\x2d\157\156") . "\x3c\57\x64\x69\x76\76";
        echo "\x3c\144\151\166\x20\163\164\x79\x6c\x65\75\42\x66\157\x6e\x74\55\167\145\151\147\150\x74\72\x20\x6e\157\162\155\x61\154\73\42\x3e" . $mw . "\x3c\57\144\x69\166\x3e\x3c\x62\76\116\x6f\164\x65\x3a\x3c\x2f\142\76\40\120\154\145\141\163\x65\x20\143\x6c\x69\x63\153\x20\157\156\x20\74\x62\76\126\151\x65\x77\x20\x56\145\162\x73\151\157\156\40\144\x65\x74\141\x69\x6c\x73\x3c\57\x62\x3e\40\154\x69\156\153\40\x74\x6f\x20\x67\145\164\x20\143\x6f\155\x70\x6c\145\164\x65\40\143\150\x61\156\x67\145\154\157\x67\40\x61\156\x64\40\154\151\x63\145\x6e\x73\x65\x20\151\x6e\x66\x6f\x72\x6d\141\164\151\157\156\56\40\x43\x6c\x69\143\153\x20\x6f\156\40\x3c\142\x3e\125\160\x64\141\164\145\x20\x4e\157\x77\x3c\57\x62\76\x20\154\x69\x6e\x6b\x20\164\157\40\x75\160\x64\141\x74\145\40\164\150\x65\40\x70\154\165\147\151\156\40\164\157\40\x6c\x61\164\145\x73\164\x20\166\145\162\x73\151\157\x6e\56";
        ee:
    }
    public function mo_saml_license_key_notice()
    {
        if (!array_key_exists("\x6d\157\163\141\155\154\x2d\144\x69\x73\x6d\151\163\x73", $_GET)) {
            goto RF;
        }
        return;
        RF:
        $user = wp_get_current_user();
        $in = $user->roles;
        $RN = 0;
        if (empty(get_option("\155\157\137\163\141\155\154\x5f\x6c\151\x63\x65\x6e\163\145\x5f\x65\x78\x70\151\162\x79\137\144\141\164\145"))) {
            goto fi;
        }
        $RN = date_diff(new DateTime(), new DateTime(get_option("\155\157\137\163\141\x6d\x6c\x5f\154\x69\x63\145\x6e\163\145\137\x65\x78\160\x69\162\171\x5f\x64\141\164\145")))->days;
        fi:
        if (!(!in_array("\141\144\155\x69\156\x69\x73\164\162\141\x74\x6f\x72", $in) && $RN <= 30)) {
            goto M3;
        }
        return;
        M3:
        if (!(get_option("\x6d\157\x5f\163\141\155\154\x5f\x73\154\145") && new DateTime() > get_option("\155\x6f\55\x73\x61\x6d\x6c\55\x70\154\x75\x67\151\x6e\x2d\x74\x69\x6d\145\162"))) {
            goto Vw;
        }
        $hD = esc_url(add_query_arg(array("\x6d\x6f\x73\x61\155\154\x2d\x64\151\x73\x6d\x69\163\x73" => wp_create_nonce("\x73\141\x6d\x6c\55\144\151\163\x6d\x69\163\x73"))));
        echo "\74\x73\143\x72\x69\160\x74\x3e\15\xa\11\11\11\11\x66\165\156\x63\x74\151\x6f\x6e\x20\155\x6f\123\x41\x4d\x4c\x50\141\x79\x6d\145\x6e\164\x53\x74\x65\160\x73\x28\x29\x20\x7b\15\xa\x9\x9\x9\x9\x9\x76\x61\162\x20\141\164\164\x72\x20\x3d\x20\x64\157\143\165\x6d\145\156\164\x2e\x67\145\x74\105\154\x65\155\x65\156\164\x42\x79\111\144\x28\42\x6d\x6f\x73\x61\155\154\x70\141\x79\x6d\x65\x6e\x74\x73\164\x65\x70\163\42\51\56\x73\164\171\x6c\x65\56\x64\151\x73\x70\x6c\x61\x79\73\xd\12\11\x9\x9\x9\x9\x69\x66\x28\141\164\x74\162\x20\75\75\x20\x22\x6e\x6f\x6e\x65\x22\51\173\15\12\11\x9\11\11\11\x9\x64\157\143\x75\x6d\145\156\x74\x2e\x67\x65\164\105\x6c\x65\x6d\145\156\164\102\171\111\144\50\x22\x6d\x6f\x73\x61\155\154\160\x61\171\155\145\156\164\x73\x74\145\160\163\42\51\56\163\164\x79\154\x65\x2e\x64\151\163\x70\154\x61\171\x20\75\x20\x22\x62\154\157\143\x6b\x22\73\xd\12\11\11\11\x9\x9\x7d\145\154\x73\x65\173\xd\12\11\11\x9\11\x9\11\x64\157\143\x75\x6d\x65\156\164\x2e\147\x65\x74\105\x6c\x65\155\145\156\164\x42\x79\x49\x64\50\x22\155\x6f\163\x61\155\154\160\141\171\155\x65\x6e\164\x73\x74\x65\160\x73\x22\51\56\x73\164\x79\x6c\x65\56\144\151\x73\160\154\x61\171\40\x3d\40\42\156\x6f\156\x65\x22\x3b\xd\xa\11\x9\x9\11\x9\175\xd\12\11\11\11\x9\x7d\xd\12\11\x9\x9\74\x2f\163\x63\162\151\x70\x74\76";
        $qp = get_option("\x6d\x6f\137\x72\145\156\x65\167\141\154\137\x61\x64\155\151\x6e\137\156\x6f\x74\151\143\x65");
        if (empty($qp)) {
            goto dc;
        }
        $YV = "\x3c\144\151\x76\40\x69\144\x3d\42\155\x65\x73\163\x61\x67\145\42\x20\163\x74\171\x6c\145\75\x22\x70\157\163\151\164\x69\157\x6e\x3a\162\x65\154\x61\x74\x69\x76\x65\42\40\x63\154\141\x73\163\x3d\42\x6e\x6f\x74\x69\x63\145\x20\156\x6f\x74\151\x63\x65\x20\156\x6f\164\x69\143\x65\x2d\x77\x61\x72\156\151\x6e\147\42\76\74\x62\x72\40\57\76\74\163\160\x61\x6e\x20\143\154\141\163\x73\75\42\141\154\x69\147\x6e\x6c\x65\146\x74\x22\40\163\x74\171\x6c\x65\75\x22\143\x6f\154\157\162\72\x23\x61\x30\60\73\146\157\x6e\164\x2d\146\x61\155\151\x6c\x79\x3a\x20\x2d\167\x65\x62\153\x69\164\55\160\x69\143\x74\x6f\147\162\141\160\x68\x3b\146\x6f\156\x74\55\163\151\172\145\x3a\x20\x32\65\x70\x78\73\42\x3e\x49\x4d\x50\117\x52\124\x41\116\x54\41\74\x2f\163\160\141\156\x3e\x3c\x62\162\x20\57\x3e\74\151\x6d\x67\x20\x73\x72\143\75\x22" . plugin_dir_url(__FILE__) . "\x69\x6d\x61\147\x65\x73\57\155\x69\156\x69\x6f\162\x61\x6e\x67\x65\x2d\x6c\x6f\x67\157\56\160\x6e\x67" . "\x22\40\x63\x6c\x61\x73\163\x3d\x22\x61\154\151\x67\156\154\x65\146\164\42\x20\150\145\151\x67\x68\x74\75\42\70\67\42\40\167\151\x64\164\x68\75\42\x36\x36\42\x20\141\x6c\164\x3d\x22\155\x69\x6e\x69\x4f\x72\x61\x6e\147\x65\40\x6c\x6f\x67\x6f\42\x20\x73\164\171\154\x65\x3d\42\x6d\141\162\147\151\x6e\72\x31\x30\160\170\40\61\60\x70\170\40\61\60\x70\170\x20\x30\73\x20\150\145\x69\x67\x68\x74\x3a\61\62\70\160\170\x3b\40\x77\151\x64\164\150\x3a\x20\x31\x32\70\160\x78\73\x22\x3e\x3c\x68\x33\76\155\151\x6e\151\x4f\162\x61\x6e\147\x65\40\x53\x41\x4d\x4c\x20\62\x2e\60\x20\x53\x69\x6e\147\x6c\145\x20\x53\x69\147\156\x2d\x4f\156\x20\123\165\x70\x70\x6f\162\x74\40\x26\x20\x4d\x61\x69\x6e\x74\x65\156\x61\156\x63\x65\40\114\151\x63\145\x6e\163\145\x20\105\x78\160\151\x72\145\144\x3c\x2f\x68\63\x3e";
        $YV .= $qp;
        $YV .= "\74\x61\40\x68\x72\x65\146\75\42" . $hD . "\42\40\x63\154\141\163\x73\75\42\x61\x6c\151\147\x6e\x72\151\147\150\164\x20\142\165\164\x74\x6f\x6e\x20\x62\x75\164\x74\x6f\156\x2d\x6c\151\156\153\x22\x3e\x44\x69\x73\x6d\151\x73\x73\74\x2f\x61\76\x3c\57\x70\76\x3c\144\x69\x76\40\x63\154\141\163\163\x3d\x22\x63\x6c\145\141\x72\42\x3e\x3c\57\x64\151\166\x3e\x3c\x2f\x64\151\166\x3e";
        echo $YV;
        dc:
        Vw:
    }
    public function mo_saml_dismiss_notice()
    {
        if (!empty($_GET["\x6d\x6f\x73\141\x6d\x6c\x2d\x64\x69\163\x6d\x69\x73\163"])) {
            goto U1;
        }
        return;
        U1:
        if (wp_verify_nonce($_GET["\155\157\x73\141\155\154\x2d\144\151\x73\x6d\151\163\x73"], "\163\x61\155\x6c\x2d\144\x69\163\155\151\x73\x73")) {
            goto AM;
        }
        return;
        AM:
        if (!(isset($_GET["\155\157\163\x61\155\x6c\x2d\x64\x69\163\155\x69\163\x73"]) && wp_verify_nonce($_GET["\155\157\x73\x61\x6d\154\x2d\x64\151\x73\x6d\x69\163\x73"], "\x73\141\x6d\154\x2d\x64\x69\x73\x6d\151\x73\x73"))) {
            goto R3;
        }
        $E3 = new DateTime();
        $E3->modify("\x2b\61\x20\144\141\x79");
        update_option("\155\157\x2d\x73\x61\x6d\154\x2d\160\x6c\x75\x67\151\x6e\55\x74\151\155\x65\x72", $E3);
        R3:
    }
    function mo_saml_create_backup_dir()
    {
        $aT = plugin_dir_path(__FILE__);
        $aT = rtrim($aT, "\57");
        $aT = rtrim($aT, "\x5c");
        $A2 = get_plugin_data(__FILE__);
        $aM = $A2["\x54\x65\x78\x74\104\x6f\x6d\x61\x69\156"];
        $jK = wp_upload_dir();
        $Vu = $jK["\x62\141\163\x65\x64\151\x72"];
        $jK = rtrim($Vu, "\x2f");
        $SZ = $jK . DIRECTORY_SEPARATOR . "\x62\x61\x63\153\x75\x70" . DIRECTORY_SEPARATOR . $aM . "\55\160\162\145\x6d\x69\x75\155\55\x62\141\143\x6b\165\x70\x2d" . $this->current_version;
        if (file_exists($SZ)) {
            goto Wr;
        }
        mkdir($SZ, 0777, true);
        Wr:
        $K8 = $aT;
        $uZ = $SZ;
        $this->mo_saml_copy_files_to_backup_dir($K8, $uZ);
    }
    function mo_saml_copy_files_to_backup_dir($aT, $SZ)
    {
        if (!is_dir($aT)) {
            goto YH;
        }
        $gQ = scandir($aT);
        YH:
        if (!empty($gQ)) {
            goto kD;
        }
        return;
        kD:
        foreach ($gQ as $nD) {
            if (!($nD == "\x2e" || $nD == "\x2e\56")) {
                goto yE;
            }
            goto hb;
            yE:
            $u9 = $aT . DIRECTORY_SEPARATOR . $nD;
            $xh = $SZ . DIRECTORY_SEPARATOR . $nD;
            if (is_dir($u9)) {
                goto W1;
            }
            copy($u9, $xh);
            goto ET;
            W1:
            if (file_exists($xh)) {
                goto N0;
            }
            mkdir($xh, 0777, true);
            N0:
            $this->mo_saml_copy_files_to_backup_dir($u9, $xh);
            ET:
            hb:
        }
        Z8:
    }
}
function mo_saml_update()
{
    if (!mo_saml_is_customer_registered()) {
        goto SX;
    }
    $gt = mo_options_plugin_constants::HOSTNAME;
    $r3 = mo_options_plugin_constants::Version;
    $Z6 = $gt . "\x2f\155\x6f\141\163\57\x61\160\151\57\x70\154\165\x67\151\156\57\155\x65\164\x61\x64\141\x74\x61";
    $jn = plugin_basename(dirname(__FILE__) . "\x2f\x6c\157\147\x69\x6e\x2e\x70\150\160");
    $jt = new mo_saml_update_framework($r3, $Z6, $jn);
    add_action("\151\156\137\160\x6c\x75\x67\x69\x6e\137\165\160\x64\x61\x74\145\137\155\x65\x73\163\141\147\x65\x2d{$jn}", array($jt, "\155\157\x5f\163\x61\x6d\x6c\x5f\x70\154\x75\x67\x69\x6e\137\x75\x70\144\141\x74\x65\137\155\x65\163\163\141\x67\x65"), 10, 2);
    add_action("\x61\144\x6d\151\x6e\x5f\x68\145\x61\x64", array($jt, "\155\157\137\x73\x61\x6d\154\x5f\x6c\x69\143\145\156\x73\145\137\153\x65\171\x5f\x6e\157\164\x69\x63\x65"));
    add_action("\x61\144\x6d\x69\x6e\x5f\156\157\164\x69\x63\x65\x73", array($jt, "\x6d\157\x5f\x73\x61\155\154\137\x64\151\163\155\x69\163\x73\x5f\x6e\x6f\x74\x69\143\145"), 50);
    if (!get_option("\155\157\x5f\163\x61\155\154\137\163\154\145")) {
        goto dD;
    }
    update_option("\155\157\137\x73\x61\155\154\137\x73\154\x65\137\155\145\x73\x73\141\x67\145", "\x59\157\x75\162\x20\x53\x41\x4d\x4c\x20\160\x6c\x75\147\151\156\x20\154\151\x63\x65\156\x73\145\x20\x68\141\x73\145\40\x62\145\145\x6e\40\x65\x78\x70\x69\x72\x65\x64\56\40\131\x6f\165\x20\x61\x72\x65\40\x6d\151\x73\163\151\x6e\147\x20\x6f\165\164\x20\x6f\x6e\40\165\160\144\141\164\145\163\40\x61\x6e\144\40\163\165\160\160\157\x72\164\41\x20\120\x6c\x65\141\163\145\x20\74\141\40\150\162\145\146\75\x22" . mo_options_plugin_constants::HOSTNAME . "\x2f\155\157\141\x73\57\154\x6f\147\151\x6e\77\x72\x65\144\151\162\145\143\164\x55\x72\x6c\x3d" . mo_options_plugin_constants::HOSTNAME . "\x2f\155\157\141\x73\x2f\141\144\x6d\x69\x6e\57\x63\x75\x73\x74\x6f\x6d\145\x72\57\154\151\x63\145\156\163\x65\162\x65\x6e\x65\x77\141\154\163\77\x72\145\156\x65\167\x61\154\162\x65\x71\165\x65\x73\x74\75" . mo_options_plugin_constants::LICENSE_TYPE . "\40\42\40\164\x61\x72\147\x65\x74\75\42\x5f\x62\x6c\141\156\153\42\x3e\74\142\76\103\154\x69\x63\153\x20\110\145\x72\145\x3c\x2f\142\76\x3c\57\141\76\40\164\x6f\40\162\145\156\145\x77\40\164\x68\145\40\123\x75\160\x70\157\x72\164\x20\141\156\x64\40\x4d\x61\x69\x6e\164\x65\x6e\x61\143\145\x20\x70\x6c\x61\156\x2e");
    dD:
    SX:
}

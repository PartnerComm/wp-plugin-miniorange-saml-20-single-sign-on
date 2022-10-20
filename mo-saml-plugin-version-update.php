<?php


require_once dirname(__FILE__) . "\x2f\151\156\143\x6c\165\x64\x65\x73\x2f\x6c\151\142\x2f\x6d\157\55\157\x70\x74\x69\157\x6e\163\55\145\x6e\165\x6d\x2e\160\150\x70";
add_action("\141\x64\155\x69\156\137\151\156\x69\x74", "\x6d\x6f\137\163\141\155\x6c\x5f\x75\x70\144\x61\164\145");
class mo_saml_update_framework
{
    private $current_version;
    private $update_path;
    private $plugin_slug;
    private $slug;
    private $plugin_file;
    private $new_version_changelog;
    public function __construct($oQ, $xz = "\57", $cp = "\57")
    {
        $this->current_version = $oQ;
        $this->update_path = $xz;
        $this->plugin_slug = $cp;
        list($vF, $dL) = explode("\x2f", $cp);
        $this->slug = $vF;
        $this->plugin_file = $dL;
        add_filter("\x70\162\x65\137\x73\145\x74\137\163\151\x74\x65\x5f\x74\162\141\156\163\x69\x65\x6e\164\x5f\165\x70\144\141\x74\145\137\160\154\165\x67\x69\156\163", array(&$this, "\155\157\x5f\163\x61\155\x6c\x5f\143\150\x65\x63\153\x5f\x75\160\144\141\x74\x65"));
        add_filter("\x70\154\x75\147\151\x6e\163\x5f\x61\160\151", array(&$this, "\x6d\157\x5f\163\x61\155\154\137\x63\150\x65\143\153\137\151\x6e\146\157"), 10, 3);
    }
    public function mo_saml_check_update($Pc)
    {
        if (!empty($Pc->checked)) {
            goto B9;
        }
        return $Pc;
        B9:
        $J9 = $this->getRemote();
        if (!empty($J9)) {
            goto Jr;
        }
        return $Pc;
        Jr:
        if (!(isset($J9["\154\151\x63\x65\156\x73\145\111\156\146\157\162\x6d\x61\164\x69\x6f\156"]) and get_option("\x6d\x6f\x5f\163\141\155\154\137\x73\154\x65"))) {
            goto Q9;
        }
        update_option("\155\157\137\x72\145\156\145\167\141\x6c\x5f\141\x64\x6d\151\156\x5f\156\157\164\151\x63\x65", $J9["\154\151\x63\x65\156\163\145\111\x6e\146\157\x72\x6d\141\164\151\x6f\156"]);
        Q9:
        if ($J9["\x73\164\141\x74\165\x73"] == "\x53\x55\x43\x43\105\123\123") {
            goto YG;
        }
        if (!($J9["\163\x74\141\x74\165\x73"] == "\x44\x45\x4e\x49\x45\104")) {
            goto eA;
        }
        if (!version_compare($this->current_version, $J9["\x6e\x65\x77\126\145\162\x73\151\157\x6e"], "\74")) {
            goto vI;
        }
        $pl = new stdClass();
        $pl->slug = $this->slug;
        $pl->new_version = $J9["\156\x65\x77\x56\x65\x72\163\151\x6f\156"];
        $pl->url = "\150\164\164\x70\x73\72\57\57\155\151\x6e\151\157\x72\x61\x6e\147\145\56\143\157\155";
        $pl->plugin = $this->plugin_slug;
        $pl->tested = $J9["\x63\155\x73\x43\157\155\160\141\164\151\x62\151\154\x69\x74\x79\126\x65\x72\x73\151\157\x6e"];
        $pl->icons = array("\61\x78" => $J9["\x69\x63\x6f\x6e"]);
        $pl->status_code = $J9["\x73\164\x61\164\x75\x73"];
        $pl->license_information = $J9["\x6c\x69\143\x65\x6e\x73\145\111\156\146\157\162\x6d\141\164\x69\157\x6e"];
        update_option("\155\157\x5f\x73\141\155\x6c\x5f\x6c\x69\x63\145\156\163\x65\x5f\x65\170\160\151\x72\171\x5f\x64\x61\x74\145", $J9["\154\151\143\x65\x6e\x65\105\170\x70\151\x72\171\x44\x61\x74\x65"]);
        $Pc->response[$this->plugin_slug] = $pl;
        $Ns = true;
        update_option("\155\x6f\137\x73\x61\155\x6c\137\163\x6c\x65", $Ns);
        set_transient("\x75\x70\x64\141\x74\x65\x5f\160\154\x75\x67\x69\x6e\x73", $Pc);
        return $Pc;
        vI:
        eA:
        goto eS;
        YG:
        $Ns = false;
        update_option("\155\157\137\x73\141\x6d\154\137\x73\154\x65", $Ns);
        if (!version_compare($this->current_version, $J9["\x6e\145\x77\126\145\162\163\151\157\x6e"], "\74")) {
            goto Hn;
        }
        ini_set("\x6d\x61\170\137\145\170\145\x63\x75\164\151\x6f\x6e\x5f\164\151\155\x65", 600);
        ini_set("\x6d\145\x6d\157\162\x79\137\x6c\151\155\151\164", "\x31\60\x32\64\115");
        $hf = plugin_dir_path(__FILE__);
        $hf = rtrim($hf, "\x2f");
        $hf = rtrim($hf, "\x5c");
        $m0 = $hf . "\55\x70\x72\x65\155\x69\165\x6d\x2d\142\x61\x63\x6b\165\x70\55" . $this->current_version . "\56\x7a\151\x70";
        $this->mo_saml_create_backup_dir();
        $wo = $this->getAuthToken();
        $Zq = round(microtime(true) * 1000);
        $Zq = number_format($Zq, 0, '', '');
        $pl = new stdClass();
        $pl->slug = $this->slug;
        $pl->new_version = $J9["\x6e\145\167\126\x65\x72\x73\x69\157\x6e"];
        $pl->url = "\150\164\164\160\x73\72\x2f\57\x6d\x69\156\x69\157\x72\x61\x6e\x67\x65\x2e\x63\x6f\x6d";
        $pl->plugin = $this->plugin_slug;
        $pl->package = mo_options_plugin_constants::HOSTNAME . "\57\155\157\141\163\57\160\x6c\x75\147\151\156\x2f\144\x6f\167\156\x6c\157\141\x64\55\165\160\144\141\x74\145\x3f\x70\x6c\165\147\151\x6e\x53\154\x75\147\75" . $this->plugin_slug . "\46\x6c\x69\x63\145\x6e\x73\145\x50\154\141\x6e\116\x61\155\145\x3d" . mo_options_plugin_constants::LICENSE_PLAN_NAME . "\x26\x63\165\163\164\157\155\x65\162\111\144\75" . get_option("\155\157\137\x73\x61\x6d\x6c\x5f\x61\144\155\151\x6e\137\143\165\x73\164\157\x6d\x65\162\x5f\x6b\x65\171") . "\46\154\151\143\x65\156\x73\x65\124\171\160\145\75" . mo_options_plugin_constants::LICENSE_TYPE . "\x26\141\x75\164\150\124\157\153\x65\156\75" . $wo . "\46\x6f\x74\160\x54\x6f\153\x65\x6e\75" . $Zq;
        $pl->tested = $J9["\143\x6d\163\x43\x6f\x6d\x70\141\164\151\x62\x69\x6c\151\x74\171\x56\x65\162\x73\x69\x6f\156"];
        $pl->icons = array("\61\x78" => $J9["\x69\143\x6f\x6e"]);
        $pl->new_version_changelog = $J9["\143\x68\141\x6e\x67\145\x6c\157\147"];
        $pl->status_code = $J9["\163\x74\x61\x74\x75\x73"];
        update_option("\x6d\157\137\x73\x61\x6d\x6c\x5f\154\151\143\145\156\x73\x65\137\x65\x78\x70\151\162\171\x5f\144\x61\164\145", $J9["\x6c\x69\x63\145\x6e\145\x45\170\x70\x69\162\x79\104\x61\164\145"]);
        $Pc->response[$this->plugin_slug] = $pl;
        set_transient("\x75\160\144\x61\164\145\x5f\x70\x6c\x75\x67\x69\x6e\x73", $Pc);
        return $Pc;
        Hn:
        eS:
        return $Pc;
    }
    public function mo_saml_check_info($pl, $Qy, $st)
    {
        if (!(($Qy == "\161\165\145\162\x79\137\x70\x6c\165\x67\151\x6e\163" || $Qy == "\x70\154\165\147\151\156\x5f\x69\156\x66\157\x72\x6d\141\x74\x69\157\156") && isset($st->slug) && ($st->slug === $this->slug || $st->slug === $this->plugin_file))) {
            goto i4;
        }
        $nw = $this->getRemote();
        if (!empty($nw)) {
            goto qf;
        }
        return $pl;
        qf:
        remove_filter("\x70\154\x75\147\151\x6e\163\x5f\141\160\151", array($this, "\155\157\137\x73\141\155\154\x5f\143\x68\x65\x63\x6b\137\x69\156\146\157"));
        $g3 = plugins_api("\160\x6c\165\x67\151\156\x5f\x69\156\146\157\x72\155\141\x74\x69\x6f\156", array("\163\154\165\147" => $this->slug, "\146\x69\x65\x6c\x64\x73" => array("\141\x63\x74\151\x76\145\x5f\151\x6e\163\x74\141\154\154\163" => true, "\x6e\x75\x6d\137\162\141\x74\151\x6e\147\163" => true, "\162\141\x74\151\x6e\x67" => true, "\x72\x61\x74\x69\156\147\x73" => true, "\162\145\x76\x69\145\x77\x73" => true)));
        $Vt = false;
        $Mn = false;
        $iK = false;
        $Bh = false;
        $FW = '';
        $hl = '';
        if (is_wp_error($g3)) {
            goto m_;
        }
        $Vt = $g3->active_installs;
        $Mn = $g3->rating;
        $iK = $g3->ratings;
        $Bh = $g3->num_ratings;
        $FW = $g3->sections["\144\x65\163\143\x72\151\x70\164\x69\157\156"];
        $hl = $g3->sections["\x72\x65\166\x69\x65\167\x73"];
        m_:
        add_filter("\x70\154\165\147\151\x6e\x73\x5f\x61\x70\151", array($this, "\155\x6f\137\163\141\155\x6c\137\143\x68\145\143\x6b\x5f\151\156\x66\157"), 10, 3);
        if ($nw["\x73\164\x61\164\165\163"] == "\123\125\x43\103\105\x53\x53") {
            goto Jq;
        }
        if (!($nw["\x73\x74\141\164\165\163"] == "\x44\x45\116\111\105\x44")) {
            goto ae;
        }
        if (!version_compare($this->current_version, $nw["\x6e\x65\167\126\145\x72\163\x69\x6f\x6e"], "\74")) {
            goto On;
        }
        $rl = new stdClass();
        $rl->slug = $this->slug;
        $rl->plugin = $this->plugin_slug;
        $rl->name = $nw["\160\x6c\165\147\151\156\116\x61\x6d\145"];
        $rl->version = $nw["\156\x65\167\126\x65\162\x73\151\x6f\x6e"];
        $rl->new_version = $nw["\156\145\x77\126\x65\162\x73\x69\x6f\156"];
        $rl->tested = $nw["\x63\155\163\103\x6f\155\160\x61\164\151\x62\151\154\x69\164\171\x56\145\162\163\x69\x6f\x6e"];
        $rl->requires = $nw["\143\155\163\115\x69\x6e\x56\x65\162\163\151\157\156"];
        $rl->requires_php = $nw["\160\150\x70\115\151\156\x56\x65\x72\x73\151\157\x6e"];
        $rl->compatibility = array($nw["\x63\x6d\x73\103\x6f\x6d\x70\141\164\151\x62\x69\x6c\151\x74\171\x56\x65\162\163\151\x6f\156"]);
        $rl->url = $nw["\x63\155\x73\120\x6c\x75\147\151\x6e\x55\x72\x6c"];
        $rl->author = $nw["\160\154\x75\147\x69\x6e\x41\165\164\150\x6f\x72"];
        $rl->author_profile = $nw["\x70\154\x75\147\x69\156\101\165\164\150\x6f\162\x50\162\x6f\146\151\154\x65"];
        $rl->last_updated = $nw["\154\x61\163\x74\x55\x70\144\141\164\145\144"];
        $rl->banners = array("\x6c\157\x77" => $nw["\x62\x61\x6e\x6e\145\162"]);
        $rl->icons = array("\61\170" => $nw["\x69\143\x6f\x6e"]);
        $rl->sections = array("\143\x68\141\156\x67\145\154\x6f\147" => $nw["\143\x68\x61\156\x67\x65\x6c\x6f\147"], "\154\151\x63\145\x6e\163\145\137\x69\156\x66\157\162\155\141\164\151\x6f\156" => _x($nw["\154\x69\143\x65\x6e\x73\145\x49\156\x66\157\x72\x6d\x61\x74\x69\157\x6e"], "\120\154\165\x67\x69\156\40\151\156\x73\x74\141\x6c\154\x65\162\x20\163\x65\x63\x74\x69\x6f\156\40\x74\x69\x74\x6c\145"), "\x64\x65\x73\x63\162\x69\x70\164\x69\157\156" => $FW, "\x52\145\x76\151\x65\167\163" => $hl);
        $rl->external = '';
        $rl->homepage = isset($nw["\150\157\155\145\x70\141\x67\x65"]) ? $nw["\150\157\x6d\x65\160\x61\x67\x65"] : '';
        $rl->reviews = true;
        $rl->active_installs = $Vt;
        $rl->rating = $Mn;
        $rl->ratings = $iK;
        $rl->num_ratings = $Bh;
        update_option("\155\x6f\137\163\141\x6d\x6c\137\154\x69\x63\145\x6e\163\x65\137\145\170\160\151\x72\171\x5f\x64\141\x74\x65", $nw["\x6c\151\143\x65\x6e\x65\105\170\160\151\162\171\104\x61\164\145"]);
        return $rl;
        On:
        ae:
        goto vM;
        Jq:
        $Ns = false;
        update_option("\155\x6f\x5f\x73\141\x6d\154\x5f\163\154\145", $Ns);
        if (!version_compare($this->current_version, $nw["\156\x65\167\126\145\162\x73\x69\157\x6e"], "\x3c\75")) {
            goto dF;
        }
        $rl = new stdClass();
        $rl->slug = $this->slug;
        $rl->name = $nw["\x70\x6c\x75\x67\151\x6e\x4e\x61\155\x65"];
        $rl->plugin = $this->plugin_slug;
        $rl->version = $nw["\156\x65\x77\126\145\x72\x73\x69\x6f\x6e"];
        $rl->new_version = $nw["\x6e\x65\x77\x56\x65\162\163\x69\157\x6e"];
        $rl->tested = $nw["\x63\155\x73\103\157\155\160\x61\x74\x69\x62\x69\x6c\151\x74\x79\126\145\162\x73\151\157\x6e"];
        $rl->requires = $nw["\x63\x6d\x73\115\151\x6e\x56\145\162\163\151\157\156"];
        $rl->requires_php = $nw["\x70\x68\x70\x4d\x69\x6e\x56\145\162\163\151\157\x6e"];
        $rl->compatibility = array($nw["\x63\x6d\x73\x43\x6f\x6d\x70\141\164\x69\142\151\154\x69\x74\171\126\x65\x72\163\x69\x6f\156"]);
        $rl->url = $nw["\x63\155\163\120\x6c\165\x67\x69\156\x55\162\x6c"];
        $rl->author = $nw["\160\154\x75\x67\x69\x6e\x41\x75\x74\150\157\162"];
        $rl->author_profile = $nw["\160\154\165\147\x69\x6e\101\x75\x74\x68\x6f\162\120\162\x6f\146\151\x6c\x65"];
        $rl->last_updated = $nw["\x6c\x61\163\x74\125\160\144\x61\164\145\144"];
        $rl->banners = array("\x6c\x6f\x77" => $nw["\x62\141\156\x6e\145\x72"]);
        $rl->icons = array("\x31\x78" => $nw["\151\143\157\156"]);
        $rl->sections = array("\143\150\141\x6e\x67\x65\x6c\x6f\x67" => $nw["\143\x68\141\156\x67\x65\x6c\157\x67"], "\154\151\x63\x65\x6e\x73\x65\x5f\x69\156\146\x6f\162\155\141\164\x69\x6f\x6e" => _x($nw["\x6c\x69\x63\145\x6e\163\145\111\x6e\146\157\162\155\141\x74\151\x6f\156"], "\x50\154\x75\147\151\x6e\x20\x69\x6e\163\164\141\154\x6c\145\x72\40\163\145\x63\x74\x69\x6f\156\40\x74\x69\x74\154\145"), "\144\145\163\x63\162\x69\160\x74\151\157\x6e" => $FW, "\122\x65\166\151\145\x77\x73" => $hl);
        $wo = $this->getAuthToken();
        $Zq = round(microtime(true) * 1000);
        $Zq = number_format($Zq, 0, '', '');
        $rl->download_link = mo_options_plugin_constants::HOSTNAME . "\x2f\155\x6f\141\x73\57\160\154\x75\x67\151\x6e\x2f\144\x6f\x77\156\154\157\x61\144\x2d\165\x70\144\141\164\145\x3f\160\154\x75\147\151\156\x53\154\165\147\75" . $this->plugin_slug . "\x26\x6c\x69\143\x65\x6e\163\145\120\x6c\141\156\x4e\141\155\145\75" . mo_options_plugin_constants::LICENSE_PLAN_NAME . "\x26\x63\x75\163\164\157\155\x65\162\111\x64\75" . get_option("\x6d\x6f\137\x73\141\x6d\154\137\141\144\155\x69\156\137\143\x75\163\164\157\155\x65\x72\137\153\x65\x79") . "\46\154\x69\x63\x65\156\x73\145\x54\x79\x70\x65\75" . mo_options_plugin_constants::LICENSE_TYPE . "\x26\141\x75\164\x68\124\x6f\153\145\x6e\x3d" . $wo . "\x26\157\164\160\124\157\x6b\145\x6e\x3d" . $Zq;
        $rl->package = $rl->download_link;
        $rl->external = '';
        $rl->homepage = isset($nw["\150\157\x6d\x65\160\141\147\145"]) ? $nw["\150\157\155\x65\x70\x61\x67\145"] : '';
        $rl->reviews = true;
        $rl->active_installs = $Vt;
        $rl->rating = $Mn;
        $rl->ratings = $iK;
        $rl->num_ratings = $Bh;
        update_option("\155\x6f\137\163\x61\155\x6c\137\x6c\151\143\145\x6e\x73\x65\x5f\145\170\160\x69\x72\x79\137\x64\141\164\x65", $nw["\154\151\143\x65\156\x65\105\170\x70\x69\162\x79\104\x61\x74\145"]);
        return $rl;
        dF:
        vM:
        i4:
        return $pl;
    }
    private function getRemote()
    {
        $I1 = get_option("\155\157\x5f\x73\141\x6d\x6c\x5f\141\144\155\x69\x6e\137\x63\165\x73\x74\x6f\155\x65\x72\137\x6b\x65\x79");
        $yd = get_option("\155\157\x5f\x73\x61\155\x6c\x5f\x61\x64\x6d\x69\x6e\x5f\x61\160\x69\137\x6b\x65\x79");
        $Zq = round(microtime(true) * 1000);
        $g_ = $I1 . number_format($Zq, 0, '', '') . $yd;
        $wo = hash("\163\x68\141\x35\x31\x32", $g_);
        $Zq = number_format($Zq, 0, '', '');
        $OU = array("\x70\x6c\165\x67\151\x6e\x53\154\165\x67" => $this->plugin_slug, "\x6c\x69\x63\x65\156\163\x65\x50\154\141\x6e\x4e\141\x6d\145" => mo_options_plugin_constants::LICENSE_PLAN_NAME, "\x63\x75\x73\164\157\x6d\x65\162\x49\x64" => $I1, "\x6c\151\x63\145\156\163\x65\x54\171\x70\145" => mo_options_plugin_constants::LICENSE_TYPE);
        $eS = array("\x68\x65\141\144\x65\x72\x73" => array("\103\157\x6e\164\145\x6e\164\x2d\x54\x79\160\x65" => "\141\160\x70\154\x69\143\x61\x74\151\x6f\156\57\152\x73\157\156\x3b\40\x63\x68\x61\162\x73\145\x74\75\165\164\146\55\70", "\x43\x75\x73\164\157\x6d\145\162\x2d\113\145\x79" => $I1, "\124\151\155\145\163\164\141\155\x70" => $Zq, "\x41\165\x74\150\157\x72\151\x7a\141\x74\x69\157\156" => $wo), "\142\x6f\144\x79" => json_encode($OU), "\155\145\x74\x68\x6f\x64" => "\x50\117\123\124", "\144\141\164\x61\x5f\146\157\162\x6d\141\x74" => "\x62\x6f\144\171", "\163\163\154\166\145\162\x69\146\171" => false);
        $e7 = wp_remote_post($this->update_path, $eS);
        if (!(!is_wp_error($e7) || wp_remote_retrieve_response_code($e7) === 200)) {
            goto ny;
        }
        $lP = json_decode($e7["\142\x6f\x64\x79"], true);
        return $lP;
        ny:
        return false;
    }
    private function getAuthToken()
    {
        $I1 = get_option("\155\157\x5f\x73\x61\155\x6c\x5f\x61\144\x6d\x69\x6e\x5f\x63\x75\x73\x74\x6f\155\145\x72\137\153\145\x79");
        $yd = get_option("\x6d\x6f\137\x73\141\x6d\x6c\137\x61\144\155\151\x6e\137\141\x70\x69\137\153\x65\x79");
        $Zq = round(microtime(true) * 1000);
        $g_ = $I1 . number_format($Zq, 0, '', '') . $yd;
        $wo = hash("\163\150\x61\65\x31\x32", $g_);
        return $wo;
    }
    function zipData($Fi, $P9)
    {
        if (!(extension_loaded("\172\151\x70") && file_exists($Fi) && count(glob($Fi . DIRECTORY_SEPARATOR . "\x2a")) !== 0)) {
            goto jI;
        }
        $zy = new ZipArchive();
        if (!$zy->open($P9, ZIPARCHIVE::CREATE)) {
            goto Ux;
        }
        $Fi = realpath($Fi);
        if (is_dir($Fi) === true) {
            goto th;
        }
        if (!is_file($Fi)) {
            goto U8;
        }
        $zy->addFromString(basename($Fi), file_get_contents($Fi));
        U8:
        goto Yn;
        th:
        $fK = new RecursiveDirectoryIterator($Fi);
        $fK->setFlags(RecursiveDirectoryIterator::SKIP_DOTS);
        $TB = new RecursiveIteratorIterator($fK, RecursiveIteratorIterator::SELF_FIRST);
        foreach ($TB as $Sk) {
            $Sk = realpath($Sk);
            if (is_dir($Sk) === true) {
                goto O6;
            }
            if (!(is_file($Sk) === true)) {
                goto BF;
            }
            $zy->addFromString(str_replace($Fi . DIRECTORY_SEPARATOR, '', $Sk), file_get_contents($Sk));
            BF:
            goto b8;
            O6:
            $zy->addEmptyDir(str_replace($Fi . DIRECTORY_SEPARATOR, '', $Sk . DIRECTORY_SEPARATOR));
            b8:
            KA:
        }
        pj:
        Yn:
        Ux:
        return $zy->close();
        jI:
        return false;
    }
    function mo_saml_plugin_update_message($wU, $e7)
    {
        if (array_key_exists("\x73\x74\141\164\x75\163\137\143\x6f\x64\x65", $wU)) {
            goto az;
        }
        return;
        az:
        if ($wU["\x73\164\x61\164\165\163\137\143\157\x64\145"] == "\x53\125\x43\103\x45\123\123") {
            goto I7;
        }
        if (!($wU["\163\164\141\x74\x75\163\137\x63\157\x64\x65"] == "\x44\105\116\x49\x45\104")) {
            goto b6;
        }
        echo sprintf(__($wU["\x6c\x69\x63\145\x6e\x73\145\137\151\x6e\x66\157\162\155\x61\164\151\157\x6e"]));
        b6:
        goto SP;
        I7:
        $P5 = wp_upload_dir();
        $Jm = $P5["\x62\x61\x73\x65\x64\x69\x72"];
        $P5 = rtrim($Jm, "\x2f");
        $hf = $P5 . DIRECTORY_SEPARATOR . "\x62\x61\143\153\165\x70";
        $m0 = "\155\151\x6e\x69\x6f\162\141\x6e\x67\x65\x2d\163\x61\155\x6c\55\62\x30\x2d\x73\x69\x6e\147\x6c\145\55\163\x69\147\x6e\x2d\157\156\x2d\x70\x72\x65\x6d\x69\165\x6d\55\x62\x61\143\x6b\x75\x70\x2d" . $this->current_version;
        $xa = explode("\74\x2f\165\154\76", $wU["\156\x65\167\137\x76\145\x72\163\x69\x6f\156\x5f\143\150\x61\156\147\145\x6c\157\147"]);
        $Zr = $xa[0];
        $XP = $Zr . "\x3c\x2f\165\x6c\x3e";
        echo "\x3c\x64\x69\166\76\74\x62\x3e" . __("\74\142\162\40\x2f\x3e\x41\156\40\141\165\x74\x6f\155\x61\x74\x69\143\40\142\x61\x63\153\165\x70\40\157\x66\x20\143\x75\162\162\145\156\x74\40\166\145\x72\163\151\x6f\156\x20" . $this->current_version . "\40\x68\x61\163\40\142\x65\145\156\40\143\x72\145\x61\x74\145\144\x20\x61\164\x20\x74\150\145\x20\154\x6f\143\x61\164\x69\157\x6e\40" . $hf . "\x20\167\x69\x74\150\x20\164\x68\145\40\156\x61\x6d\x65\40\x3c\163\x70\141\156\x20\x73\x74\171\154\145\x3d\42\143\157\x6c\x6f\x72\x3a\x23\60\x30\67\x33\x61\x61\x3b\x22\76" . $m0 . "\x3c\57\x73\160\141\x6e\x3e\x2e\x20\x49\x6e\40\143\141\x73\x65\54\x20\x73\157\x6d\145\x74\x68\x69\156\147\x20\x62\x72\145\141\153\163\x20\x64\165\162\x69\156\147\40\x74\150\x65\40\165\160\144\x61\164\x65\54\40\x79\157\x75\40\143\x61\x6e\40\162\x65\x76\x65\x72\x74\x20\x74\x6f\40\x79\x6f\x75\x72\x20\x63\165\x72\x72\x65\x6e\164\40\166\145\x72\x73\x69\157\x6e\40\x62\x79\40\x72\145\x70\154\x61\x63\x69\x6e\x67\x20\164\x68\145\x20\142\141\143\153\165\160\40\165\163\151\156\147\40\x46\124\120\x20\141\143\x63\x65\163\x73\x2e", "\x6d\x69\x6e\151\x6f\x72\x61\x6e\147\145\55\x73\x61\x6d\154\x2d\62\60\x2d\163\151\156\147\x6c\145\x2d\163\x69\147\x6e\x2d\x6f\x6e") . "\x3c\57\x62\76\x3c\57\x64\151\166\x3e\x3c\144\151\166\x20\x73\164\171\154\145\x3d\x22\x63\157\x6c\x6f\x72\x3a\x20\x23\x66\x30\60\73\42\76" . __("\74\x62\x72\x20\x2f\76\x54\x61\153\145\x20\x61\x20\x6d\151\156\165\x74\x65\x20\x74\157\x20\143\150\x65\143\x6b\x20\164\x68\145\40\143\150\x61\x6e\147\x65\x6c\x6f\x67\x20\157\146\40\x6c\x61\x74\145\163\164\40\x76\x65\162\163\x69\157\156\x20\157\x66\40\x74\x68\x65\x20\x70\154\165\147\x69\156\56\40\110\x65\x72\x65\47\163\x20\167\150\x79\40\171\x6f\165\40\x6e\145\x65\x64\40\164\x6f\x20\165\x70\144\141\164\145\72", "\155\151\156\x69\157\x72\x61\x6e\x67\145\x2d\x73\141\155\154\x2d\x32\60\x2d\163\151\x6e\147\x6c\x65\55\163\151\x67\156\x2d\x6f\x6e") . "\74\57\144\151\166\76";
        echo "\74\144\x69\166\x20\163\x74\171\154\145\x3d\42\x66\157\156\x74\x2d\x77\x65\x69\147\x68\164\x3a\40\156\157\x72\155\x61\154\73\x22\76" . $XP . "\x3c\x2f\144\151\166\x3e\x3c\142\x3e\116\157\x74\x65\72\x3c\57\142\x3e\40\120\x6c\145\x61\x73\145\40\x63\154\151\x63\153\40\157\x6e\x20\x3c\x62\x3e\126\x69\x65\x77\x20\126\145\162\x73\151\x6f\156\x20\144\145\164\141\151\154\x73\74\x2f\142\76\x20\x6c\151\156\153\40\x74\x6f\x20\x67\145\164\x20\143\x6f\x6d\160\x6c\x65\164\145\x20\143\x68\x61\x6e\147\145\x6c\x6f\147\x20\x61\x6e\x64\40\x6c\x69\x63\x65\156\163\x65\x20\x69\156\x66\x6f\x72\x6d\x61\x74\151\157\156\x2e\x20\x43\x6c\x69\143\153\x20\157\156\40\74\x62\76\x55\x70\144\x61\x74\x65\x20\116\x6f\x77\x3c\57\x62\x3e\40\x6c\x69\156\x6b\40\x74\x6f\x20\x75\x70\144\141\164\145\x20\164\x68\x65\40\160\x6c\165\147\x69\156\x20\164\x6f\40\154\x61\x74\x65\163\164\x20\166\x65\162\x73\151\x6f\156\x2e";
        SP:
    }
    public function mo_saml_license_key_notice()
    {
        if (!array_key_exists("\155\157\163\141\x6d\154\55\144\x69\x73\155\151\163\x73", $_GET)) {
            goto mp;
        }
        return;
        mp:
        $user = wp_get_current_user();
        $Dp = $user->roles;
        $qi = 0;
        if (empty(get_option("\x6d\x6f\x5f\x73\x61\155\x6c\x5f\154\x69\x63\x65\156\163\145\x5f\x65\170\160\151\162\x79\137\x64\141\x74\x65"))) {
            goto C9;
        }
        $qi = date_diff(new DateTime(), new DateTime(get_option("\155\x6f\137\163\x61\x6d\154\x5f\x6c\151\x63\x65\156\x73\x65\137\x65\x78\x70\x69\162\171\x5f\144\x61\x74\145")))->days;
        C9:
        if (!(!in_array("\141\x64\155\151\x6e\151\163\164\162\x61\x74\x6f\162", $Dp) && $qi <= 30)) {
            goto ZE;
        }
        return;
        ZE:
        if (!(get_option("\x6d\x6f\x5f\x73\x61\155\154\x5f\x73\x6c\145") && new DateTime() > get_option("\155\x6f\x2d\x73\x61\155\154\55\160\x6c\165\147\x69\x6e\55\x74\151\x6d\145\162"))) {
            goto qD;
        }
        $GV = esc_url(add_query_arg(array("\x6d\157\x73\141\x6d\154\55\144\x69\163\x6d\x69\163\x73" => wp_create_nonce("\163\141\155\x6c\55\x64\x69\163\x6d\x69\163\x73"))));
        echo "\x3c\163\143\x72\x69\x70\164\x3e\xd\xa\x9\11\x9\11\146\165\x6e\143\x74\x69\x6f\156\x20\x6d\x6f\x53\x41\x4d\x4c\120\141\171\155\x65\x6e\164\123\x74\x65\x70\163\x28\x29\x20\x7b\xd\12\11\11\x9\x9\x9\x76\x61\162\40\141\x74\x74\x72\40\x3d\x20\x64\157\143\165\155\x65\x6e\164\x2e\147\x65\164\x45\154\145\x6d\x65\156\x74\102\171\111\144\50\x22\155\157\163\141\x6d\154\x70\x61\x79\x6d\145\x6e\164\163\164\145\x70\x73\x22\x29\56\x73\x74\x79\154\x65\x2e\144\x69\x73\160\154\141\x79\x3b\15\xa\x9\11\11\x9\x9\151\x66\x28\141\x74\x74\x72\40\x3d\x3d\x20\x22\x6e\x6f\156\145\x22\51\x7b\xd\xa\11\11\x9\x9\11\11\x64\157\x63\165\x6d\x65\x6e\164\x2e\147\x65\164\x45\154\x65\x6d\x65\x6e\164\102\x79\111\x64\x28\42\x6d\157\x73\x61\155\x6c\x70\141\x79\x6d\145\156\x74\163\164\x65\x70\163\42\51\x2e\x73\164\171\x6c\145\x2e\x64\x69\163\160\154\141\x79\40\75\40\x22\142\x6c\157\143\x6b\x22\73\xd\xa\x9\11\11\x9\x9\x7d\145\x6c\x73\x65\x7b\15\xa\11\11\11\11\11\x9\x64\157\143\165\155\x65\156\164\x2e\147\x65\x74\105\x6c\145\x6d\x65\156\164\102\x79\x49\144\50\42\155\x6f\163\141\x6d\x6c\x70\x61\171\155\145\x6e\164\x73\164\x65\160\x73\x22\x29\x2e\x73\x74\x79\x6c\x65\x2e\x64\x69\x73\160\x6c\x61\171\40\75\x20\x22\x6e\157\x6e\145\42\x3b\xd\xa\x9\x9\x9\11\11\175\15\12\x9\x9\x9\11\x7d\15\12\11\x9\11\x3c\57\163\x63\x72\151\x70\x74\x3e";
        $mu = get_option("\x6d\x6f\x5f\x72\145\156\145\x77\x61\x6c\137\141\144\x6d\x69\156\137\x6e\157\164\x69\143\x65");
        if (empty($mu)) {
            goto lb;
        }
        $F1 = "\x3c\144\x69\x76\x20\151\144\x3d\42\155\x65\x73\x73\x61\147\145\42\x20\163\164\x79\x6c\x65\x3d\42\x70\157\163\151\x74\151\x6f\156\72\162\x65\154\x61\164\151\x76\145\x22\x20\x63\x6c\141\163\x73\x3d\x22\x6e\x6f\x74\151\x63\x65\x20\x6e\x6f\164\x69\143\x65\x20\x6e\x6f\164\151\x63\x65\55\x77\141\162\x6e\x69\156\147\42\76\x3c\x62\162\40\57\x3e\x3c\163\x70\141\156\40\x63\x6c\x61\163\x73\75\42\x61\154\151\x67\x6e\154\x65\146\x74\x22\40\163\164\171\154\x65\x3d\42\143\x6f\x6c\x6f\162\72\x23\141\60\x30\x3b\146\157\156\x74\55\146\141\x6d\151\x6c\171\72\x20\x2d\x77\145\x62\153\x69\x74\x2d\160\x69\x63\x74\x6f\x67\x72\x61\x70\150\x3b\x66\157\x6e\x74\x2d\x73\151\x7a\145\72\40\x32\65\x70\x78\73\42\76\111\x4d\x50\117\122\124\x41\x4e\124\41\x3c\57\x73\x70\141\x6e\x3e\74\x62\162\x20\57\x3e\74\151\x6d\x67\40\x73\x72\x63\75\42" . plugin_dir_url(__FILE__) . "\x69\x6d\x61\147\145\163\57\x6d\151\156\151\157\162\x61\156\x67\145\x2d\x6c\x6f\x67\157\x2e\160\x6e\147" . "\42\x20\143\154\x61\163\x73\x3d\42\141\154\151\147\156\154\x65\146\x74\x22\x20\150\145\x69\147\x68\164\x3d\x22\x38\x37\x22\40\167\x69\144\164\150\75\x22\66\x36\42\40\x61\x6c\x74\x3d\42\155\151\156\151\117\x72\x61\x6e\147\x65\40\154\x6f\x67\157\x22\40\x73\x74\171\154\145\x3d\42\x6d\x61\x72\147\151\x6e\72\61\x30\160\x78\x20\61\60\x70\170\x20\x31\x30\160\170\x20\60\73\40\x68\x65\x69\147\x68\164\x3a\x31\62\70\x70\x78\x3b\x20\x77\x69\144\x74\x68\x3a\40\x31\x32\x38\x70\170\x3b\x22\x3e\x3c\150\63\76\x6d\151\156\x69\x4f\x72\x61\x6e\147\x65\40\123\101\x4d\114\40\62\56\x30\40\x53\x69\156\147\154\x65\40\123\151\147\x6e\55\117\156\40\123\x75\160\x70\x6f\x72\164\40\x26\x20\x4d\141\x69\156\x74\145\x6e\141\156\x63\145\40\x4c\151\143\x65\x6e\163\x65\40\x45\x78\160\151\x72\145\x64\74\x2f\150\x33\x3e";
        $F1 .= $mu;
        $F1 .= "\74\x61\x20\x68\162\x65\x66\x3d\42" . $GV . "\42\40\143\154\x61\163\x73\75\42\x61\154\x69\x67\156\x72\x69\x67\150\164\40\x62\165\x74\x74\x6f\156\40\x62\x75\164\164\157\156\55\x6c\151\156\153\x22\76\104\151\x73\155\x69\163\163\x3c\57\141\76\x3c\57\x70\76\74\x64\x69\x76\x20\143\154\141\x73\x73\x3d\x22\x63\154\145\x61\162\42\76\74\57\x64\151\x76\x3e\x3c\57\144\151\x76\76";
        echo $F1;
        lb:
        qD:
    }
    public function mo_saml_dismiss_notice()
    {
        if (!empty($_GET["\x6d\157\163\x61\x6d\154\55\x64\151\163\x6d\151\x73\163"])) {
            goto MT;
        }
        return;
        MT:
        if (wp_verify_nonce($_GET["\x6d\x6f\x73\141\155\x6c\x2d\x64\x69\163\x6d\x69\163\x73"], "\163\141\x6d\154\x2d\x64\151\x73\155\151\x73\x73")) {
            goto oC;
        }
        return;
        oC:
        if (!(isset($_GET["\155\157\x73\141\x6d\154\x2d\144\x69\x73\x6d\x69\163\163"]) && wp_verify_nonce($_GET["\x6d\157\163\x61\155\x6c\x2d\x64\x69\x73\155\151\x73\163"], "\x73\x61\x6d\154\x2d\144\151\163\x6d\x69\x73\x73"))) {
            goto gt;
        }
        $tP = new DateTime();
        $tP->modify("\x2b\x31\40\x64\141\171");
        update_option("\155\x6f\x2d\x73\x61\155\x6c\x2d\160\154\165\147\151\x6e\x2d\164\x69\155\x65\x72", $tP);
        gt:
    }
    function mo_saml_create_backup_dir()
    {
        $hf = plugin_dir_path(__FILE__);
        $hf = rtrim($hf, "\57");
        $hf = rtrim($hf, "\x5c");
        $wU = get_plugin_data(__FILE__);
        $uk = $wU["\124\145\x78\164\x44\157\155\x61\x69\x6e"];
        $P5 = wp_upload_dir();
        $Jm = $P5["\142\141\x73\145\x64\x69\x72"];
        $P5 = rtrim($Jm, "\57");
        $fr = $P5 . DIRECTORY_SEPARATOR . "\142\141\x63\153\x75\x70" . DIRECTORY_SEPARATOR . $uk . "\x2d\x70\x72\145\x6d\151\x75\155\55\x62\x61\143\153\x75\160\55" . $this->current_version;
        if (file_exists($fr)) {
            goto mG;
        }
        mkdir($fr, 0777, true);
        mG:
        $Fi = $hf;
        $P9 = $fr;
        $this->mo_saml_copy_files_to_backup_dir($Fi, $P9);
    }
    function mo_saml_copy_files_to_backup_dir($hf, $fr)
    {
        if (!is_dir($hf)) {
            goto mz;
        }
        $qC = scandir($hf);
        mz:
        if (!empty($qC)) {
            goto lu;
        }
        return;
        lu:
        foreach ($qC as $Rs) {
            if (!($Rs == "\x2e" || $Rs == "\x2e\x2e")) {
                goto fJ;
            }
            goto dd;
            fJ:
            $q2 = $hf . DIRECTORY_SEPARATOR . $Rs;
            $XS = $fr . DIRECTORY_SEPARATOR . $Rs;
            if (is_dir($q2)) {
                goto vt;
            }
            copy($q2, $XS);
            goto Tv;
            vt:
            if (file_exists($XS)) {
                goto S_;
            }
            mkdir($XS, 0777, true);
            S_:
            $this->mo_saml_copy_files_to_backup_dir($q2, $XS);
            Tv:
            dd:
        }
        ko:
    }
}
function mo_saml_update()
{
    if (!mo_saml_is_customer_registered()) {
        goto Eg;
    }
    $AN = mo_options_plugin_constants::HOSTNAME;
    $u7 = mo_options_plugin_constants::Version;
    $zG = $AN . "\57\155\157\141\163\57\141\160\x69\57\160\154\165\x67\x69\156\x2f\155\145\x74\141\x64\x61\x74\x61";
    $cp = plugin_basename(dirname(__FILE__) . "\57\x6c\157\x67\x69\x6e\56\x70\150\x70");
    $xn = new mo_saml_update_framework($u7, $zG, $cp);
    add_action("\x69\x6e\137\160\x6c\x75\147\x69\156\137\165\160\x64\x61\x74\x65\x5f\155\145\163\163\x61\147\145\55{$cp}", array($xn, "\155\x6f\137\163\141\155\154\x5f\x70\154\x75\147\x69\156\137\165\x70\x64\141\x74\x65\137\155\x65\163\163\x61\x67\x65"), 10, 2);
    add_action("\x61\144\x6d\x69\x6e\137\x68\145\x61\144", array($xn, "\155\x6f\137\163\141\x6d\154\x5f\154\x69\143\x65\156\x73\145\x5f\153\x65\x79\x5f\156\157\x74\x69\143\145"));
    add_action("\x61\144\x6d\151\156\x5f\156\157\x74\x69\143\x65\163", array($xn, "\x6d\x6f\x5f\163\141\x6d\x6c\137\x64\x69\x73\155\151\x73\x73\137\156\x6f\164\151\143\x65"), 50);
    if (!get_option("\155\x6f\x5f\163\x61\155\154\137\x73\154\x65")) {
        goto cN;
    }
    update_option("\x6d\157\137\x73\141\x6d\x6c\137\x73\154\145\137\x6d\145\163\163\x61\147\x65", "\131\157\165\x72\40\x53\x41\x4d\x4c\x20\x70\x6c\x75\x67\x69\156\40\x6c\151\x63\x65\156\x73\x65\x20\150\141\x73\x65\40\142\x65\x65\156\40\145\x78\x70\x69\x72\145\144\x2e\40\x59\x6f\x75\x20\x61\x72\145\40\155\x69\x73\163\151\156\147\x20\x6f\x75\x74\40\157\156\x20\x75\160\144\141\x74\145\x73\x20\x61\156\x64\40\163\165\160\x70\157\x72\x74\x21\40\120\x6c\x65\x61\x73\145\40\x3c\x61\40\150\162\x65\x66\75\x22" . mo_options_plugin_constants::HOSTNAME . "\x2f\x6d\157\x61\x73\57\154\x6f\x67\151\156\77\x72\x65\144\x69\x72\145\x63\164\x55\x72\154\75" . mo_options_plugin_constants::HOSTNAME . "\57\x6d\157\141\163\57\141\144\155\151\x6e\x2f\143\x75\163\x74\157\155\x65\x72\57\x6c\x69\143\x65\156\x73\145\162\145\x6e\145\x77\x61\154\x73\77\162\x65\156\145\167\x61\x6c\x72\x65\x71\x75\145\163\164\x3d" . mo_options_plugin_constants::LICENSE_TYPE . "\40\x22\40\164\141\x72\x67\145\164\75\x22\137\142\x6c\141\156\153\x22\76\x3c\x62\76\103\x6c\151\143\153\40\x48\145\x72\x65\74\57\x62\x3e\74\57\141\76\x20\164\x6f\x20\x72\x65\x6e\x65\167\40\164\x68\145\x20\123\x75\x70\x70\157\162\x74\x20\x61\x6e\144\x20\x4d\141\151\156\x74\145\x6e\141\x63\145\x20\x70\154\x61\156\56");
    cN:
    Eg:
}

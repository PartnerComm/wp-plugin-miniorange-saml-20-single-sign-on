<?php


class LicenseObject
{
    private $wp_site_url;
    private $plugin_settings = array();
    public function __construct($kM)
    {
        $this->wp_site_url = $kM;
    }
    public function getWpSiteUrl()
    {
        return $this->wp_site_url;
    }
    public function setWpSiteUrl($kM)
    {
        $this->wp_site_url = $kM;
    }
    public function getPluginSettings()
    {
        return $this->plugin_settings;
    }
    public function setPluginSettings($Hi, $QR = false)
    {
        if ($QR) {
            goto np;
        }
        $this->plugin_settings = $Hi;
        goto yu;
        np:
        foreach (mo_options_enum_service_provider::getConstants() as $bh) {
            if ($bh == mo_options_enum_service_provider::Request_signed || $bh == mo_options_enum_service_provider::Is_encoding_enabled) {
                goto B7;
            }
            if (!isset($Hi[$bh])) {
                goto fx;
            }
            if (!($bh == mo_options_enum_service_provider::X509_certificate)) {
                goto Hg;
            }
            $x6 = $Hi[mo_options_enum_service_provider::X509_certificate];
            $Wq = array();
            foreach ($x6 as $N5 => $x9) {
                if (empty($x9)) {
                    goto Ka;
                }
                $Wq[$N5] = SAMLSPUtilities::sanitize_certificate($x9);
                if (@openssl_x509_read($Wq[$N5])) {
                    goto Ro;
                }
                update_option("\x6d\x6f\137\163\x61\x6d\154\137\x6d\145\163\163\x61\147\x65", "\x49\156\x76\x61\154\151\x64\40\x63\x65\x72\x74\151\146\151\x63\141\x74\145\72\x20\120\154\145\141\163\x65\40\x70\x72\157\166\151\144\x65\40\141\40\x76\x61\x6c\151\144\40\x63\145\162\164\151\146\x69\143\141\x74\145\56");
                delete_option("\x73\x61\x6d\154\137\x78\x35\x30\x39\x5f\x63\145\162\164\x69\146\151\143\141\164\145");
                return;
                Ro:
                goto r9;
                Ka:
                unset($x6[$N5]);
                r9:
                OT:
            }
            xj:
            $Hi[$bh] = maybe_serialize($Wq);
            Hg:
            $this->plugin_settings[$bh] = htmlspecialchars(trim($Hi[$bh]));
            fx:
            goto s5;
            B7:
            if (isset($Hi[$bh]) and !empty($Hi[$bh])) {
                goto a4;
            }
            $Hi[$bh] = "\x75\x6e\x63\x68\x65\x63\153\145\x64";
            goto ni;
            a4:
            $Hi[$bh] = "\x63\x68\x65\143\x6b\x65\144";
            ni:
            $this->plugin_settings[$bh] = htmlspecialchars(trim($Hi[$bh]));
            s5:
            Ht:
        }
        Jz:
        foreach (mo_options_enum_attribute_mapping::getConstants() as $bh) {
            if (!isset($Hi[$bh])) {
                goto Ki;
            }
            $this->plugin_settings[$bh] = htmlspecialchars(trim($Hi[$bh]));
            Ki:
            Xd:
        }
        ng:
        foreach (mo_options_enum_domain_restriction::getConstants() as $bh) {
            if (!isset($Hi[$bh])) {
                goto ow;
            }
            $this->plugin_settings[$bh] = htmlspecialchars(trim($Hi[$bh]));
            ow:
            S5:
        }
        mD:
        foreach (mo_options_enum_role_mapping::getConstants() as $bh) {
            if (!isset($Hi[$bh])) {
                goto eH;
            }
            $this->plugin_settings[$bh] = htmlspecialchars(trim($Hi[$bh]));
            eH:
            XQ:
        }
        Uj:
        yu:
    }
}

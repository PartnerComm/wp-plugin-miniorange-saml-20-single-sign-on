<?php


class LicenseObject
{
    private $wp_site_url;
    private $plugin_settings = array();
    public function __construct($KG)
    {
        $this->wp_site_url = $KG;
    }
    public function getWpSiteUrl()
    {
        return $this->wp_site_url;
    }
    public function setWpSiteUrl($KG)
    {
        $this->wp_site_url = $KG;
    }
    public function convertEnvironmentObjectToArray()
    {
        return get_object_vars($this);
    }
    public function getPluginSettings()
    {
        return $this->plugin_settings;
    }
    public function setPluginSettings($bD, $Th = false)
    {
        if ($Th) {
            goto zr;
        }
        $this->plugin_settings = $bD;
        goto ef;
        zr:
        foreach (mo_options_enum_service_provider::getConstants() as $jh) {
            if ($jh == mo_options_enum_service_provider::Request_signed || $jh == mo_options_enum_service_provider::Is_encoding_enabled) {
                goto vT;
            }
            if (empty($bD[$jh])) {
                goto Hz;
            }
            if (!($jh == mo_options_enum_service_provider::X509_certificate)) {
                goto xC;
            }
            $DR = $bD[mo_options_enum_service_provider::X509_certificate];
            $kc = array();
            foreach ($DR as $WO => $cK) {
                if (empty($cK)) {
                    goto ck;
                }
                $kc[$WO] = SAMLSPUtilities::sanitize_certificate($cK);
                if (@openssl_x509_read($kc[$WO])) {
                    goto sD;
                }
                update_option("\x6d\x6f\137\x73\141\x6d\154\137\155\145\x73\163\x61\x67\x65", "\111\x6e\x76\141\x6c\151\x64\40\143\x65\x72\164\x69\146\151\x63\141\164\145\x3a\x20\x50\x6c\x65\x61\x73\x65\40\x70\x72\x6f\166\x69\144\145\40\x61\x20\x76\x61\x6c\151\144\x20\x63\145\162\x74\x69\146\151\x63\x61\x74\x65\56");
                delete_option("\163\141\x6d\154\137\x78\65\60\71\x5f\x63\x65\162\164\x69\146\151\x63\x61\x74\x65");
                return;
                sD:
                goto zm;
                ck:
                unset($DR[$WO]);
                zm:
                t1:
            }
            Et:
            $bD[$jh] = maybe_serialize($kc);
            xC:
            $this->plugin_settings[$jh] = htmlspecialchars(trim($bD[$jh]));
            Hz:
            goto pZ;
            vT:
            if (!empty($bD[$jh])) {
                goto fr;
            }
            $bD[$jh] = "\165\156\143\x68\145\x63\x6b\145\x64";
            goto UR;
            fr:
            $bD[$jh] = "\143\150\x65\x63\153\x65\144";
            UR:
            $this->plugin_settings[$jh] = htmlspecialchars(trim($bD[$jh]));
            pZ:
            kV:
        }
        rb:
        foreach (mo_options_enum_attribute_mapping::getConstants() as $jh) {
            if (empty($bD[$jh])) {
                goto Jf;
            }
            $this->plugin_settings[$jh] = htmlspecialchars(trim($bD[$jh]));
            Jf:
            AJ:
        }
        gY:
        foreach (mo_options_enum_domain_restriction::getConstants() as $jh) {
            if (empty($bD[$jh])) {
                goto oT;
            }
            $this->plugin_settings[$jh] = htmlspecialchars(trim($bD[$jh]));
            oT:
            i8:
        }
        ak:
        foreach (mo_options_enum_role_mapping::getConstants() as $jh) {
            if (empty($bD[$jh])) {
                goto J8;
            }
            $this->plugin_settings[$jh] = htmlspecialchars(trim($bD[$jh]));
            J8:
            An:
        }
        Zh:
        ef:
    }
}

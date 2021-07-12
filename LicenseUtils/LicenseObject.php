<?php


class LicenseObject
{
    private $wp_site_url;
    private $plugin_settings = array();
    public function __construct($P9)
    {
        $this->wp_site_url = $P9;
    }
    public function getWpSiteUrl()
    {
        return $this->wp_site_url;
    }
    public function setWpSiteUrl($P9)
    {
        $this->wp_site_url = $P9;
    }
    public function getPluginSettings()
    {
        return $this->plugin_settings;
    }
    public function setPluginSettings($D7, $uy = false)
    {
        if ($uy) {
            goto MS;
        }
        $this->plugin_settings = $D7;
        goto NE;
        MS:
        foreach (mo_options_enum_service_provider::getConstants() as $vR) {
            if ($vR == mo_options_enum_service_provider::Request_signed || $vR == mo_options_enum_service_provider::Is_encoding_enabled) {
                goto mk;
            }
            if (!isset($D7[$vR])) {
                goto Ew;
            }
            if (!($vR == mo_options_enum_service_provider::X509_certificate)) {
                goto RK;
            }
            $xY = $D7[mo_options_enum_service_provider::X509_certificate];
            $Pd = array();
            foreach ($xY as $Ej => $j1) {
                if (empty($j1)) {
                    goto UM;
                }
                $Pd[$Ej] = SAMLSPUtilities::sanitize_certificate($j1);
                if (@openssl_x509_read($Pd[$Ej])) {
                    goto fF;
                }
                update_option("\155\157\137\x73\x61\x6d\154\137\x6d\x65\163\163\141\147\145", "\x49\156\166\141\154\151\144\40\x63\x65\x72\164\151\146\151\143\141\164\145\72\x20\120\154\145\141\x73\x65\40\160\x72\x6f\166\x69\x64\x65\x20\141\x20\x76\x61\154\151\x64\x20\143\x65\x72\x74\151\146\151\143\141\x74\x65\56");
                delete_option("\x73\141\155\154\137\170\x35\x30\x39\x5f\x63\145\162\164\151\x66\x69\143\x61\164\x65");
                return;
                fF:
                goto Mp;
                UM:
                unset($xY[$Ej]);
                Mp:
                Yh:
            }
            oe:
            $D7[$vR] = maybe_serialize($Pd);
            RK:
            $this->plugin_settings[$vR] = htmlspecialchars(trim($D7[$vR]));
            Ew:
            goto D8;
            mk:
            if (isset($D7[$vR]) and !empty($D7[$vR])) {
                goto by;
            }
            $D7[$vR] = "\165\x6e\143\150\x65\143\x6b\x65\144";
            goto AE;
            by:
            $D7[$vR] = "\x63\150\145\143\153\x65\144";
            AE:
            $this->plugin_settings[$vR] = htmlspecialchars(trim($D7[$vR]));
            D8:
            WX:
        }
        Tv:
        foreach (mo_options_enum_attribute_mapping::getConstants() as $vR) {
            if (!isset($D7[$vR])) {
                goto XG;
            }
            $this->plugin_settings[$vR] = htmlspecialchars(trim($D7[$vR]));
            XG:
            Lb:
        }
        ti:
        foreach (mo_options_enum_domain_restriction::getConstants() as $vR) {
            if (!isset($D7[$vR])) {
                goto pq;
            }
            $this->plugin_settings[$vR] = htmlspecialchars(trim($D7[$vR]));
            pq:
            eX:
        }
        fm:
        foreach (mo_options_enum_role_mapping::getConstants() as $vR) {
            if (!isset($D7[$vR])) {
                goto pK;
            }
            $this->plugin_settings[$vR] = htmlspecialchars(trim($D7[$vR]));
            pK:
            Vl:
        }
        XR:
        NE:
    }
}

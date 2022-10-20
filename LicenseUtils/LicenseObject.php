<?php


class LicenseObject
{
    private $wp_site_url;
    private $plugin_settings = array();
    public function __construct($mh)
    {
        $this->wp_site_url = $mh;
    }
    public function getWpSiteUrl()
    {
        return $this->wp_site_url;
    }
    public function setWpSiteUrl($mh)
    {
        $this->wp_site_url = $mh;
    }
    public function getPluginSettings()
    {
        return $this->plugin_settings;
    }
    public function setPluginSettings($PC, $Hx = false)
    {
        if ($Hx) {
            goto ik;
        }
        $this->plugin_settings = $PC;
        goto Bg;
        ik:
        foreach (mo_options_enum_service_provider::getConstants() as $en) {
            if ($en == mo_options_enum_service_provider::Request_signed || $en == mo_options_enum_service_provider::Is_encoding_enabled) {
                goto AC;
            }
            if (!isset($PC[$en])) {
                goto my;
            }
            if (!($en == mo_options_enum_service_provider::X509_certificate)) {
                goto n5;
            }
            $kC = $PC[mo_options_enum_service_provider::X509_certificate];
            $Jg = array();
            foreach ($kC as $U6 => $St) {
                if (empty($St)) {
                    goto dV;
                }
                $Jg[$U6] = SAMLSPUtilities::sanitize_certificate($St);
                if (@openssl_x509_read($Jg[$U6])) {
                    goto WE;
                }
                update_option("\155\x6f\137\x73\x61\155\x6c\x5f\155\145\163\163\141\x67\x65", "\111\156\166\141\154\151\144\40\x63\145\162\x74\x69\146\151\143\141\x74\x65\x3a\x20\x50\x6c\x65\x61\163\145\40\160\162\157\166\x69\144\145\40\x61\40\166\141\154\x69\x64\x20\x63\145\x72\x74\x69\x66\x69\x63\141\164\145\x2e");
                delete_option("\163\141\155\x6c\137\170\65\60\x39\137\143\x65\162\164\x69\146\x69\x63\141\x74\x65");
                return;
                WE:
                goto uG;
                dV:
                unset($kC[$U6]);
                uG:
                GW:
            }
            UZ:
            $PC[$en] = maybe_serialize($Jg);
            n5:
            $this->plugin_settings[$en] = htmlspecialchars(trim($PC[$en]));
            my:
            goto p8;
            AC:
            if (isset($PC[$en]) and !empty($PC[$en])) {
                goto Rt;
            }
            $PC[$en] = "\165\156\143\x68\145\x63\153\145\x64";
            goto sw;
            Rt:
            $PC[$en] = "\x63\x68\x65\143\153\145\x64";
            sw:
            $this->plugin_settings[$en] = htmlspecialchars(trim($PC[$en]));
            p8:
            KU:
        }
        vl:
        foreach (mo_options_enum_attribute_mapping::getConstants() as $en) {
            if (!isset($PC[$en])) {
                goto Te;
            }
            $this->plugin_settings[$en] = htmlspecialchars(trim($PC[$en]));
            Te:
            bI:
        }
        Z4:
        foreach (mo_options_enum_domain_restriction::getConstants() as $en) {
            if (!isset($PC[$en])) {
                goto jt;
            }
            $this->plugin_settings[$en] = htmlspecialchars(trim($PC[$en]));
            jt:
            oK:
        }
        Dv:
        foreach (mo_options_enum_role_mapping::getConstants() as $en) {
            if (!isset($PC[$en])) {
                goto aT;
            }
            $this->plugin_settings[$en] = htmlspecialchars(trim($PC[$en]));
            aT:
            Dz:
        }
        RS:
        Bg:
    }
}

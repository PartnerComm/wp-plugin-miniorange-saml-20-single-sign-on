<?php
/**
 * This file is a part of the miniorange-saml-20-single-sign-on plugin.
 *
 * @link https://plugins.miniorange.com/
 * @author miniOrange
 * @package miniorange-saml-20-single-sign-on
 */


class LicenseObject
{
    private $wp_site_url;
    private $plugin_settings = array();
    public function __construct($sy)
    {
        $this->wp_site_url = $sy;
    }
    public function getWpSiteUrl()
    {
        return $this->wp_site_url;
    }
    public function setWpSiteUrl($sy)
    {
        $this->wp_site_url = $sy;
    }
    public function convertEnvironmentObjectToArray()
    {
        return get_object_vars($this);
    }
    public function getPluginSettings()
    {
        return $this->plugin_settings;
    }
    public function setPluginSettings($n4, $X8 = false)
    {
        if ($X8) {
            goto lm;
        }
        $this->plugin_settings = $n4;
        goto u9;
        lm:
        foreach (Mo_Saml_Options_Enum_Service_Provider::get_constants() as $RW) {
            if ($RW == Mo_Saml_Options_Enum_Service_Provider::REQUEST_SIGNED || $RW == Mo_Saml_Options_Enum_Service_Provider::IS_ENCODING_ENABLED) {
                goto ci;
            }
            if (empty($n4[$RW])) {
                goto yk;
            }
            if (!($RW == Mo_Saml_Options_Enum_Service_Provider::X509_CERTIFICATE)) {
                goto Nv;
            }
            $CD = $n4[Mo_Saml_Options_Enum_Service_Provider::X509_CERTIFICATE];
            $hc = array();
            foreach ($CD as $mr => $Wl) {
                if (empty($Wl)) {
                    goto La;
                }
                $hc[$mr] = SAMLSPUtilities::sanitize_certificate($Wl);
                if (@openssl_x509_read($hc[$mr])) {
                    goto KX;
                }
                update_option("\155\157\137\163\x61\155\154\137\x6d\x65\163\x73\x61\147\x65", "\x49\156\166\141\x6c\x69\144\40\143\x65\x72\164\x69\146\151\143\x61\x74\145\72\40\120\154\145\x61\163\145\40\160\162\157\166\151\144\x65\40\141\40\x76\141\x6c\151\144\40\x63\145\162\x74\x69\x66\x69\x63\141\x74\x65\56");
                delete_option("\x73\141\155\x6c\137\170\x35\x30\71\x5f\143\145\x72\164\151\x66\151\x63\141\x74\x65");
                return;
                KX:
                goto bj;
                La:
                unset($CD[$mr]);
                bj:
                xc:
            }
            YS:
            $n4[$RW] = maybe_serialize($hc);
            Nv:
            $this->plugin_settings[$RW] = htmlspecialchars(trim($n4[$RW]));
            yk:
            goto AN;
            ci:
            if (!empty($n4[$RW])) {
                goto LL;
            }
            $n4[$RW] = "\x75\156\143\150\x65\143\153\x65\x64";
            goto Dd;
            LL:
            $n4[$RW] = "\143\150\145\143\x6b\145\144";
            Dd:
            $this->plugin_settings[$RW] = htmlspecialchars(trim($n4[$RW]));
            AN:
            i6:
        }
        Az:
        foreach (Mo_Saml_Options_Enum_Attribute_Mapping::get_constants() as $RW) {
            if (empty($n4[$RW])) {
                goto NT;
            }
            $this->plugin_settings[$RW] = htmlspecialchars(trim($n4[$RW]));
            NT:
            Nw:
        }
        pt:
        foreach (Mo_Saml_Options_Enum_Domain_Restriction::get_constants() as $RW) {
            if (empty($n4[$RW])) {
                goto xq;
            }
            $this->plugin_settings[$RW] = htmlspecialchars(trim($n4[$RW]));
            xq:
            ni:
        }
        a7:
        foreach (Mo_Saml_Options_Enum_Role_Mapping::get_constants() as $RW) {
            if (empty($n4[$RW])) {
                goto l8;
            }
            $this->plugin_settings[$RW] = htmlspecialchars(trim($n4[$RW]));
            l8:
            bO:
        }
        AI:
        u9:
    }
}

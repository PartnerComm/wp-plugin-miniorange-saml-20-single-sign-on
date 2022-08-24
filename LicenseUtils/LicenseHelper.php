<?php


class LicenseHelper
{
    public static function getBasePluginConfigurationArray()
    {
        $pi = array();
        foreach (mo_options_enum_service_provider::getConstants() as $bh) {
            $pi[$bh] = get_option($bh);
            FL:
        }
        k2:
        foreach (mo_options_enum_attribute_mapping::getConstants() as $bh) {
            $pi[$bh] = get_option($bh);
            YZ:
        }
        c6:
        foreach (mo_options_enum_domain_restriction::getConstants() as $bh) {
            $pi[$bh] = get_option($bh);
            Jv:
        }
        Pi:
        foreach (mo_options_enum_role_mapping::getConstants() as $bh) {
            $pi[$bh] = get_option($bh);
            oI:
        }
        Fb:
        return $pi;
    }
    public static function getPluginConfiguration($rt = '')
    {
        $VF = get_option("\x6d\x6f\x5f\145\156\141\x62\x6c\x65\x5f\x6d\x75\x6c\x74\x69\160\154\145\137\x6c\151\143\x65\156\x73\145\x73");
        if ($VF) {
            goto PP;
        }
        return self::getBasePluginConfigurationArray();
        PP:
        $Bc = get_option("\x6d\x6f\x5f\x73\x61\155\x6c\x5f\145\156\x76\x69\162\x6f\x6e\155\x65\x6e\x74\137\x6f\x62\152\145\143\x74\x73");
        $W2 = self::getSelectedEnvironment();
        if (!is_array($Bc)) {
            goto AR;
        }
        if (array_key_exists($rt, $Bc)) {
            goto el;
        }
        if (!array_key_exists($W2, $Bc)) {
            goto hd;
        }
        return $Bc[$W2]->getPluginSettings();
        hd:
        goto Q8;
        el:
        return $Bc[$rt]->getPluginSettings();
        Q8:
        AR:
        return self::getBasePluginConfigurationArray();
    }
    public static function getOptionForSelectedEnvironment($bh)
    {
        $Wz = self::getPluginConfiguration();
        if (isset($Wz[$bh])) {
            goto qK;
        }
        return false;
        goto tu;
        qK:
        return $Wz[$bh];
        tu:
    }
    public static function getCurrentEnvironment()
    {
        $su = site_url();
        $Hh = get_option("\x6d\x6f\x5f\163\x61\155\x6c\x5f\145\x6e\x76\x69\x72\157\156\x6d\145\156\164\137\157\142\x6a\x65\143\x74\163");
        $J7 = '';
        if (!is_array($Hh)) {
            goto Xz;
        }
        foreach ($Hh as $TT => $gB) {
            if (!(self::parseEnvironmentUrl($gB->getWpSiteUrl()) == self::parseEnvironmentUrl($su))) {
                goto r7;
            }
            $J7 = $TT;
            r7:
            Gu:
        }
        mz:
        Xz:
        return $J7;
    }
    public static function parseEnvironmentUrl($hD)
    {
        $vW = parse_url($hD, PHP_URL_SCHEME);
        $hD = str_replace($vW . "\x3a\x2f\x2f", '', $hD);
        return $hD;
    }
    public static function getCurrentOption($FL)
    {
        $Hc = self::getPluginConfiguration(self::getCurrentEnvironment());
        if ($FL == "\x73\x61\x6d\154\x5f\x78\65\x30\x39\137\x63\145\x72\164\x69\146\x69\143\x61\164\x65") {
            goto G2;
        }
        $WX = isset($Hc[$FL]) ? $Hc[$FL] : false;
        goto jJ;
        G2:
        $WX = isset($Hc[$FL]) ? maybe_unserialize(htmlspecialchars_decode($Hc[$FL])) : false;
        jJ:
        return $WX;
    }
    public static function getNewEnvironmentObject($Yn)
    {
        $p7 = new LicenseObject($Yn);
        $p7->setPluginSettings(self::getBasePluginConfigurationArray());
        return $p7;
    }
    public static function fetchExistingEnvironmentName($TT, $Yn)
    {
        $Hh = get_option("\155\157\137\x73\141\x6d\154\137\145\156\x76\x69\x72\x6f\x6e\x6d\145\156\x74\137\157\x62\152\145\143\x74\x73");
        if (!empty($Hh)) {
            goto aR;
        }
        return false;
        aR:
        if (array_key_exists($TT, $Hh)) {
            goto kC;
        }
        foreach ($Hh as $TT => $co) {
            if (!(self::parseEnvironmentUrl($co->getWpSiteUrl()) == self::parseEnvironmentUrl($Yn))) {
                goto ji;
            }
            return $TT;
            ji:
            e6:
        }
        XD:
        goto Lt;
        kC:
        return $TT;
        Lt:
        return false;
    }
    public static function getSelectedEnvironment()
    {
        $W2 = get_option("\x6d\x6f\x5f\163\x61\x6d\x6c\x5f\163\145\154\145\143\x74\145\x64\x5f\x65\156\166\151\162\x6f\156\x6d\x65\156\x74");
        $Hh = get_option("\x6d\x6f\137\x73\141\x6d\x6c\x5f\145\156\166\x69\162\x6f\156\x6d\x65\156\164\137\157\x62\152\145\143\164\x73");
        if (!(empty($W2) || !array_key_exists($W2, $Hh))) {
            goto VD;
        }
        $W2 = self::getCurrentEnvironment();
        VD:
        return $W2;
    }
    public static function migrateExistingEnvironments()
    {
        $Vr = get_option("\145\x6e\x76\x69\x72\157\x6e\x6d\145\156\x74\137\157\x62\x6a\145\143\x74\x73");
        $EA = get_option("\155\157\x5f\163\141\x6d\154\137\x65\156\x76\151\162\x6f\x6e\155\145\x6e\x74\x5f\x6f\142\x6a\145\x63\164\163");
        if (!(!empty($Vr) and empty($EA))) {
            goto xl;
        }
        $EA = $Vr;
        update_option("\x6d\157\137\x73\x61\x6d\154\137\x65\x6e\166\151\162\x6f\156\155\x65\x6e\164\x5f\x6f\x62\x6a\145\143\x74\163", $EA);
        xl:
    }
}

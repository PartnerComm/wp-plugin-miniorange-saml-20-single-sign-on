<?php


class LicenseHelper
{
    public static function getBasePluginConfigurationArray()
    {
        $Ko = array();
        foreach (mo_options_enum_service_provider::getConstants() as $vR) {
            $Ko[$vR] = get_option($vR);
            KH:
        }
        Dw:
        foreach (mo_options_enum_attribute_mapping::getConstants() as $vR) {
            $Ko[$vR] = get_option($vR);
            ZN:
        }
        HB:
        foreach (mo_options_enum_domain_restriction::getConstants() as $vR) {
            $Ko[$vR] = get_option($vR);
            eS:
        }
        wg:
        foreach (mo_options_enum_role_mapping::getConstants() as $vR) {
            $Ko[$vR] = get_option($vR);
            UT:
        }
        vj:
        return $Ko;
    }
    public static function getPluginConfiguration($qZ = '')
    {
        $uG = get_option("\155\x6f\x5f\145\x6e\141\142\x6c\x65\x5f\x6d\165\x6c\164\151\160\154\145\137\x6c\151\143\145\156\x73\145\163");
        if ($uG) {
            goto Y0;
        }
        return self::getBasePluginConfigurationArray();
        Y0:
        $qW = get_option("\155\x6f\x5f\x73\141\x6d\x6c\x5f\145\156\166\151\x72\x6f\x6e\x6d\x65\x6e\x74\x5f\x6f\142\x6a\145\143\164\x73");
        $TE = self::getSelectedEnvironment();
        if (!is_array($qW)) {
            goto dV;
        }
        if (array_key_exists($qZ, $qW)) {
            goto Wr;
        }
        if (!array_key_exists($TE, $qW)) {
            goto x5;
        }
        return $qW[$TE]->getPluginSettings();
        x5:
        goto JA;
        Wr:
        return $qW[$qZ]->getPluginSettings();
        JA:
        dV:
        return self::getBasePluginConfigurationArray();
    }
    public static function getOptionForSelectedEnvironment($vR)
    {
        $RQ = self::getPluginConfiguration();
        if (isset($RQ[$vR])) {
            goto Dy;
        }
        return false;
        goto dH;
        Dy:
        return $RQ[$vR];
        dH:
    }
    public static function getCurrentEnvironment()
    {
        $FI = site_url();
        $zG = get_option("\x6d\157\x5f\163\141\x6d\x6c\x5f\145\x6e\166\x69\162\x6f\156\155\x65\156\164\x5f\157\142\152\145\x63\164\163");
        $MM = '';
        if (!is_array($zG)) {
            goto GS;
        }
        foreach ($zG as $kc => $Pa) {
            if (!(self::parseEnvironmentUrl($Pa->getWpSiteUrl()) == self::parseEnvironmentUrl($FI))) {
                goto Ag;
            }
            $MM = $kc;
            Ag:
            ZS:
        }
        GI:
        GS:
        return $MM;
    }
    public static function parseEnvironmentUrl($xz)
    {
        $qt = parse_url($xz, PHP_URL_SCHEME);
        $xz = str_replace($qt . "\x3a\x2f\57", '', $xz);
        return $xz;
    }
    public static function getCurrentOption($i8)
    {
        $zh = self::getPluginConfiguration(self::getCurrentEnvironment());
        if ($i8 == "\163\141\155\154\x5f\170\65\60\x39\x5f\x63\x65\x72\x74\151\x66\151\143\x61\164\x65") {
            goto XY;
        }
        $xX = isset($zh[$i8]) ? $zh[$i8] : false;
        goto ev;
        XY:
        $xX = isset($zh[$i8]) ? maybe_unserialize(htmlspecialchars_decode($zh[$i8])) : false;
        ev:
        return $xX;
    }
    public static function getNewEnvironmentObject($Nj)
    {
        $vY = new LicenseObject($Nj);
        $vY->setPluginSettings(self::getBasePluginConfigurationArray());
        return $vY;
    }
    public static function fetchExistingEnvironmentName($kc, $Nj)
    {
        $zG = get_option("\x6d\x6f\x5f\x73\141\155\154\x5f\145\x6e\x76\151\x72\x6f\x6e\x6d\x65\x6e\164\x5f\x6f\x62\x6a\x65\143\x74\163");
        if (!empty($zG)) {
            goto CV;
        }
        return false;
        CV:
        if (array_key_exists($kc, $zG)) {
            goto c4;
        }
        foreach ($zG as $kc => $J7) {
            if (!(self::parseEnvironmentUrl($J7->getWpSiteUrl()) == self::parseEnvironmentUrl($Nj))) {
                goto wO;
            }
            return $kc;
            wO:
            Go:
        }
        xJ:
        goto Yx;
        c4:
        return $kc;
        Yx:
        return false;
    }
    public static function getSelectedEnvironment()
    {
        $TE = get_option("\x6d\x6f\137\163\141\155\154\137\163\145\154\145\x63\164\145\144\137\145\156\x76\151\162\x6f\156\155\145\x6e\164");
        $zG = get_option("\155\x6f\137\163\141\155\x6c\137\x65\x6e\x76\x69\x72\157\x6e\155\145\156\x74\x5f\157\x62\152\x65\143\x74\x73");
        if (!(empty($TE) || !array_key_exists($TE, $zG))) {
            goto Fr;
        }
        $TE = self::getCurrentEnvironment();
        Fr:
        return $TE;
    }
    public static function migrateExistingEnvironments()
    {
        $zx = get_option("\x65\156\166\x69\162\157\156\155\x65\x6e\x74\137\157\142\x6a\145\143\164\x73");
        $i1 = get_option("\x6d\x6f\137\163\x61\x6d\154\137\x65\x6e\x76\x69\162\157\156\155\x65\x6e\164\x5f\x6f\142\152\x65\x63\164\x73");
        if (!(!empty($zx) and empty($i1))) {
            goto I3;
        }
        $i1 = $zx;
        update_option("\x6d\x6f\137\163\x61\155\154\x5f\x65\x6e\166\x69\x72\x6f\x6e\x6d\145\156\x74\137\157\142\152\145\143\164\x73", $i1);
        I3:
    }
}

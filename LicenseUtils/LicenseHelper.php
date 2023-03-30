<?php


class LicenseHelper
{
    public static function getBasePluginConfigurationArray()
    {
        $sH = array();
        foreach (mo_options_enum_service_provider::getConstants() as $jh) {
            $sH[$jh] = get_option($jh);
            VP:
        }
        IJ:
        foreach (mo_options_enum_attribute_mapping::getConstants() as $jh) {
            $sH[$jh] = get_option($jh);
            Kh:
        }
        FP:
        foreach (mo_options_enum_domain_restriction::getConstants() as $jh) {
            $sH[$jh] = get_option($jh);
            oX:
        }
        N4:
        foreach (mo_options_enum_role_mapping::getConstants() as $jh) {
            $sH[$jh] = get_option($jh);
            D_:
        }
        r0:
        return $sH;
    }
    public static function getPluginConfiguration($e1 = '')
    {
        $tE = get_option("\x6d\157\x5f\145\x6e\141\x62\154\145\137\155\165\x6c\x74\x69\x70\154\x65\x5f\154\151\x63\145\156\163\145\x73");
        if ($tE) {
            goto yQ;
        }
        return self::getBasePluginConfigurationArray();
        yQ:
        $e8 = maybe_unserialize(get_option("\x6d\157\137\x73\x61\x6d\154\x5f\x65\156\166\151\162\x6f\x6e\x6d\145\156\x74\x5f\157\x62\x6a\145\x63\164\163"));
        $Pu = self::getSelectedEnvironment();
        if (!is_array($e8)) {
            goto W2;
        }
        if (isset($e8[$e1])) {
            goto Dp;
        }
        if (!isset($e8[$Pu])) {
            goto L1;
        }
        return $e8[$Pu]->getPluginSettings();
        L1:
        goto Kw;
        Dp:
        return $e8[$e1]->getPluginSettings();
        Kw:
        W2:
        return self::getBasePluginConfigurationArray();
    }
    public static function getOptionForSelectedEnvironment($jh)
    {
        $Wl = self::getPluginConfiguration();
        if (!empty($Wl[$jh])) {
            goto nQ;
        }
        return false;
        goto Pa;
        nQ:
        return $Wl[$jh];
        Pa:
    }
    public static function getCurrentEnvironment()
    {
        $uX = site_url();
        $ka = maybe_unserialize(get_option("\155\x6f\x5f\x73\141\155\x6c\x5f\x65\x6e\166\151\x72\157\156\155\145\156\x74\x5f\x6f\x62\152\145\143\x74\163"));
        $jQ = '';
        if (!is_array($ka)) {
            goto Wb;
        }
        foreach ($ka as $T4 => $tB) {
            if (!(self::parseEnvironmentUrl($tB->getWpSiteUrl()) == self::parseEnvironmentUrl($uX))) {
                goto PU;
            }
            $jQ = $T4;
            PU:
            AW:
        }
        gn:
        Wb:
        return $jQ;
    }
    public static function parseEnvironmentUrl($of)
    {
        $zF = parse_url($of, PHP_URL_SCHEME);
        $of = str_replace($zF . "\x3a\57\57", '', $of);
        return $of;
    }
    public static function getCurrentOption($uz)
    {
        $I8 = self::getPluginConfiguration(self::getCurrentEnvironment());
        if ($uz == "\x73\x61\155\154\x5f\170\x35\x30\71\137\x63\145\162\x74\151\x66\151\143\x61\164\145") {
            goto Za;
        }
        $fC = !empty($I8[$uz]) ? $I8[$uz] : false;
        goto yU;
        Za:
        $fC = !empty($I8[$uz]) ? maybe_unserialize(htmlspecialchars_decode($I8[$uz])) : false;
        yU:
        return $fC;
    }
    public static function getNewEnvironmentObject($mf)
    {
        $cG = new LicenseObject($mf);
        $cG->setPluginSettings(self::getBasePluginConfigurationArray());
        return $cG;
    }
    public static function fetchExistingEnvironmentName($T4, $mf)
    {
        $ka = maybe_unserialize(get_option("\155\x6f\137\x73\141\155\154\137\145\x6e\x76\x69\x72\157\156\x6d\x65\156\x74\137\157\142\152\x65\x63\164\x73"));
        if (!(empty($ka) && !is_array($ka))) {
            goto vO;
        }
        return false;
        vO:
        if (!empty($ka[$T4])) {
            goto UQ;
        }
        foreach ($ka as $T4 => $Qs) {
            if (!(self::parseEnvironmentUrl($Qs->getWpSiteUrl()) == self::parseEnvironmentUrl($mf))) {
                goto qW;
            }
            return $T4;
            qW:
            HP:
        }
        Ds:
        goto Pt;
        UQ:
        return $T4;
        Pt:
        return false;
    }
    public static function getSelectedEnvironment()
    {
        $Pu = get_option("\155\x6f\x5f\163\141\x6d\154\x5f\x73\145\154\145\143\x74\145\x64\137\x65\156\166\x69\x72\x6f\x6e\155\x65\156\164");
        $ka = maybe_unserialize(get_option("\x6d\x6f\x5f\163\141\155\x6c\137\145\x6e\x76\151\x72\x6f\x6e\x6d\x65\x6e\164\137\157\x62\152\145\x63\164\x73"));
        if (!empty($ka[$Pu])) {
            goto Af;
        }
        $Pu = self::getCurrentEnvironment();
        Af:
        return $Pu;
    }
    public static function migrateExistingEnvironments()
    {
        $a2 = get_option("\x65\x6e\x76\151\162\x6f\x6e\155\x65\x6e\x74\x5f\x6f\x62\152\145\143\164\x73");
        $XJ = maybe_unserialize(get_option("\x6d\157\x5f\x73\141\x6d\154\137\x65\x6e\x76\x69\x72\157\156\x6d\145\x6e\x74\137\157\142\x6a\x65\x63\164\163"));
        if (!(!empty($a2) and empty($XJ))) {
            goto b6;
        }
        $XJ = $a2;
        update_option("\155\x6f\x5f\x73\x61\x6d\154\137\x65\x6e\x76\151\x72\x6f\156\155\x65\156\x74\137\157\x62\x6a\x65\x63\164\x73", $XJ);
        b6:
    }
}

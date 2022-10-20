<?php


class LicenseHelper
{
    public static function getBasePluginConfigurationArray()
    {
        $Fk = array();
        foreach (mo_options_enum_service_provider::getConstants() as $en) {
            $Fk[$en] = get_option($en);
            js:
        }
        Q5:
        foreach (mo_options_enum_attribute_mapping::getConstants() as $en) {
            $Fk[$en] = get_option($en);
            zn:
        }
        bt:
        foreach (mo_options_enum_domain_restriction::getConstants() as $en) {
            $Fk[$en] = get_option($en);
            cT:
        }
        Lu:
        foreach (mo_options_enum_role_mapping::getConstants() as $en) {
            $Fk[$en] = get_option($en);
            DH:
        }
        aw:
        return $Fk;
    }
    public static function getPluginConfiguration($ks = '')
    {
        $gF = get_option("\155\x6f\137\x65\156\141\x62\154\x65\137\155\x75\154\x74\x69\160\154\x65\x5f\154\151\143\145\156\x73\x65\163");
        if ($gF) {
            goto Z2;
        }
        return self::getBasePluginConfigurationArray();
        Z2:
        $oa = get_option("\155\157\x5f\x73\141\155\x6c\x5f\145\x6e\x76\x69\x72\x6f\x6e\x6d\145\156\164\137\157\x62\x6a\x65\x63\x74\x73");
        $xM = self::getSelectedEnvironment();
        if (!is_array($oa)) {
            goto Qb;
        }
        if (array_key_exists($ks, $oa)) {
            goto xS;
        }
        if (!array_key_exists($xM, $oa)) {
            goto Di;
        }
        return $oa[$xM]->getPluginSettings();
        Di:
        goto hQ;
        xS:
        return $oa[$ks]->getPluginSettings();
        hQ:
        Qb:
        return self::getBasePluginConfigurationArray();
    }
    public static function getOptionForSelectedEnvironment($en)
    {
        $Gs = self::getPluginConfiguration();
        if (isset($Gs[$en])) {
            goto pf;
        }
        return false;
        goto co;
        pf:
        return $Gs[$en];
        co:
    }
    public static function getCurrentEnvironment()
    {
        $Tz = site_url();
        $I7 = get_option("\155\157\x5f\x73\141\x6d\x6c\x5f\x65\156\166\151\x72\157\x6e\x6d\145\156\164\x5f\x6f\142\152\x65\143\164\163");
        $ts = '';
        if (!is_array($I7)) {
            goto bP;
        }
        foreach ($I7 as $Ng => $C0) {
            if (!(self::parseEnvironmentUrl($C0->getWpSiteUrl()) == self::parseEnvironmentUrl($Tz))) {
                goto r7;
            }
            $ts = $Ng;
            r7:
            eU:
        }
        VX:
        bP:
        return $ts;
    }
    public static function parseEnvironmentUrl($GV)
    {
        $iJ = parse_url($GV, PHP_URL_SCHEME);
        $GV = str_replace($iJ . "\x3a\57\x2f", '', $GV);
        return $GV;
    }
    public static function getCurrentOption($p9)
    {
        $Jv = self::getPluginConfiguration(self::getCurrentEnvironment());
        if ($p9 == "\163\x61\x6d\154\137\170\x35\x30\71\x5f\143\x65\162\x74\x69\x66\x69\143\141\164\145") {
            goto a5;
        }
        $Xk = isset($Jv[$p9]) ? $Jv[$p9] : false;
        goto Ek;
        a5:
        $Xk = isset($Jv[$p9]) ? maybe_unserialize(htmlspecialchars_decode($Jv[$p9])) : false;
        Ek:
        return $Xk;
    }
    public static function getNewEnvironmentObject($la)
    {
        $hx = new LicenseObject($la);
        $hx->setPluginSettings(self::getBasePluginConfigurationArray());
        return $hx;
    }
    public static function fetchExistingEnvironmentName($Ng, $la)
    {
        $I7 = get_option("\155\157\137\163\141\x6d\x6c\x5f\145\x6e\x76\151\x72\x6f\x6e\155\145\x6e\x74\x5f\157\142\x6a\x65\143\x74\x73");
        if (!empty($I7)) {
            goto O2;
        }
        return false;
        O2:
        if (array_key_exists($Ng, $I7)) {
            goto wW;
        }
        foreach ($I7 as $Ng => $cM) {
            if (!(self::parseEnvironmentUrl($cM->getWpSiteUrl()) == self::parseEnvironmentUrl($la))) {
                goto jO;
            }
            return $Ng;
            jO:
            Vw:
        }
        ma:
        goto wA;
        wW:
        return $Ng;
        wA:
        return false;
    }
    public static function getSelectedEnvironment()
    {
        $xM = get_option("\155\x6f\x5f\163\141\x6d\154\137\x73\x65\154\145\143\x74\x65\x64\x5f\x65\x6e\x76\151\x72\x6f\156\x6d\145\156\164");
        $I7 = get_option("\155\157\137\x73\141\x6d\x6c\x5f\145\x6e\x76\151\162\157\x6e\x6d\145\x6e\164\137\157\142\x6a\x65\143\164\x73");
        if (!(empty($xM) || !array_key_exists($xM, $I7))) {
            goto f7;
        }
        $xM = self::getCurrentEnvironment();
        f7:
        return $xM;
    }
    public static function migrateExistingEnvironments()
    {
        $He = get_option("\x65\156\166\x69\x72\157\156\x6d\x65\x6e\x74\x5f\x6f\x62\152\x65\x63\x74\163");
        $zq = get_option("\x6d\x6f\137\163\141\155\x6c\137\x65\156\x76\x69\162\x6f\x6e\x6d\145\x6e\164\x5f\x6f\x62\152\x65\x63\164\x73");
        if (!(!empty($He) and empty($zq))) {
            goto Gv;
        }
        $zq = $He;
        update_option("\x6d\157\137\163\x61\x6d\x6c\x5f\x65\156\166\151\162\x6f\156\155\145\156\x74\x5f\157\x62\x6a\145\143\x74\x73", $zq);
        Gv:
    }
}

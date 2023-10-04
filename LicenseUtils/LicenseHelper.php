<?php
/**
 * This file is a part of the miniorange-saml-20-single-sign-on plugin.
 *
 * @link https://plugins.miniorange.com/
 * @author miniOrange
 * @package miniorange-saml-20-single-sign-on
 */


class LicenseHelper
{
    public static function getBasePluginConfigurationArray()
    {
        $yi = array();
        foreach (Mo_Saml_Options_Enum_Service_Provider::get_constants() as $RW) {
            $yi[$RW] = get_option($RW);
            kh:
        }
        B0:
        foreach (Mo_Saml_Options_Enum_Attribute_Mapping::get_constants() as $RW) {
            $yi[$RW] = get_option($RW);
            xG:
        }
        KG:
        foreach (Mo_Saml_Options_Enum_Domain_Restriction::get_constants() as $RW) {
            $yi[$RW] = get_option($RW);
            Iv:
        }
        gO:
        foreach (Mo_Saml_Options_Enum_Role_Mapping::get_constants() as $RW) {
            $yi[$RW] = get_option($RW);
            NX:
        }
        Ti:
        return $yi;
    }
    public static function getPluginConfiguration($J_ = '')
    {
        $XK = get_option("\155\157\x5f\x65\156\141\142\x6c\x65\x5f\x6d\x75\x6c\x74\151\x70\x6c\145\137\154\x69\x63\x65\x6e\x73\145\163");
        if ($XK) {
            goto Xp;
        }
        return self::getBasePluginConfigurationArray();
        Xp:
        $Z6 = maybe_unserialize(get_option("\155\x6f\x5f\x73\x61\x6d\154\x5f\145\x6e\x76\151\x72\157\x6e\x6d\145\156\x74\137\157\x62\x6a\145\x63\x74\163"));
        $gW = self::getSelectedEnvironment();
        if (!is_array($Z6)) {
            goto vM;
        }
        if (!empty($Z6[$J_])) {
            goto nL;
        }
        if (!empty($Z6[$gW])) {
            goto E5;
        }
        goto sh;
        nL:
        return $Z6[$J_]->getPluginSettings();
        goto sh;
        E5:
        return $Z6[$gW]->getPluginSettings();
        sh:
        vM:
        return self::getBasePluginConfigurationArray();
    }
    public static function getOptionForSelectedEnvironment($RW)
    {
        $Hr = self::getPluginConfiguration();
        if (!empty($Hr[$RW])) {
            goto l6;
        }
        return false;
        goto rn;
        l6:
        return $Hr[$RW];
        rn:
    }
    public static function getCurrentEnvironment()
    {
        $sM = site_url();
        $YN = maybe_unserialize(get_option("\155\157\137\163\x61\x6d\154\x5f\145\156\166\x69\x72\157\x6e\155\145\156\164\137\157\x62\x6a\145\x63\x74\163"));
        $Zb = '';
        if (!is_array($YN)) {
            goto ww;
        }
        foreach ($YN as $nt => $Lk) {
            if (!is_a($Lk, "\114\151\x63\x65\x6e\x73\145\117\142\152\145\143\x74")) {
                goto fG;
            }
            if (!(self::parseEnvironmentUrl($Lk->getWpSiteUrl()) === self::parseEnvironmentUrl($sM))) {
                goto dJ;
            }
            $Zb = $nt;
            dJ:
            fG:
            Tf:
        }
        We:
        ww:
        return $Zb;
    }
    public static function parseEnvironmentUrl($gA)
    {
        $uN = parse_url($gA, PHP_URL_SCHEME);
        $gA = str_replace($uN . "\x3a\57\57", '', $gA);
        return $gA;
    }
    public static function getCurrentOption($C8)
    {
        $Cl = self::getPluginConfiguration(self::getCurrentEnvironment());
        if ($C8 == "\163\141\155\x6c\137\x78\x35\60\71\x5f\143\145\x72\164\x69\x66\151\x63\141\164\x65") {
            goto fL;
        }
        $rg = !empty($Cl[$C8]) ? $Cl[$C8] : false;
        goto Gu;
        fL:
        $rg = !empty($Cl[$C8]) ? maybe_unserialize(htmlspecialchars_decode($Cl[$C8])) : false;
        Gu:
        return $rg;
    }
    public static function getNewEnvironmentObject($T0)
    {
        $YH = new LicenseObject($T0);
        $YH->setPluginSettings(self::getBasePluginConfigurationArray());
        return $YH;
    }
    public static function fetchExistingEnvironmentName($nt, $T0)
    {
        $YN = maybe_unserialize(get_option("\155\157\137\x73\141\x6d\x6c\137\x65\x6e\x76\x69\162\x6f\x6e\155\x65\156\x74\137\157\x62\152\145\143\164\x73"));
        if (!(empty($YN) && !is_array($YN))) {
            goto z1;
        }
        return false;
        z1:
        if (!empty($YN[$nt])) {
            goto FL;
        }
        foreach ($YN as $nt => $xm) {
            if (!is_a($xm, "\114\x69\x63\x65\x6e\163\x65\x4f\x62\152\x65\143\x74")) {
                goto ml;
            }
            if (!(self::parseEnvironmentUrl($xm->getWpSiteUrl()) == self::parseEnvironmentUrl($T0))) {
                goto bN;
            }
            return $nt;
            bN:
            ml:
            oO:
        }
        JB:
        goto kd;
        FL:
        return $nt;
        kd:
        return false;
    }
    public static function getSelectedEnvironment()
    {
        $gW = get_option("\155\x6f\x5f\163\x61\155\154\137\x73\x65\154\145\x63\x74\145\x64\137\x65\156\x76\x69\162\157\x6e\155\x65\x6e\164");
        $YN = maybe_unserialize(get_option("\155\x6f\137\163\x61\155\x6c\x5f\145\156\x76\x69\x72\x6f\x6e\x6d\x65\156\164\137\157\x62\x6a\145\143\x74\x73"));
        if (!empty($YN[$gW])) {
            goto Xh;
        }
        $gW = self::getCurrentEnvironment();
        Xh:
        return $gW;
    }
    public static function migrateExistingEnvironments()
    {
        $rW = get_option("\145\x6e\x76\151\162\x6f\156\x6d\145\x6e\x74\137\157\x62\152\145\x63\164\x73");
        $pe = maybe_unserialize(get_option("\x6d\x6f\x5f\x73\x61\155\x6c\137\145\156\x76\151\162\157\x6e\155\145\x6e\164\137\x6f\x62\152\x65\143\164\163"));
        if (!(!empty($rW) and empty($pe))) {
            goto hZ;
        }
        $pe = $rW;
        update_option("\155\157\137\163\x61\155\154\137\145\156\x76\151\162\157\156\x6d\145\x6e\x74\137\x6f\x62\152\145\x63\x74\163", $pe);
        hZ:
    }
}

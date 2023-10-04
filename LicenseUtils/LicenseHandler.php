<?php
/**
 * This file is a part of the miniorange-saml-20-single-sign-on plugin.
 *
 * @link https://plugins.miniorange.com/
 * @author miniOrange
 * @package miniorange-saml-20-single-sign-on
 */


function initializeLicenseObjectArray()
{
    $nX = get_bloginfo("\156\x61\155\145");
    $T1 = site_url();
    if (!empty(get_option("\155\x6f\137\x73\x61\155\x6c\x5f\145\x6e\166\151\x72\x6f\x6e\x6d\145\156\x74\x5f\157\x62\x6a\145\x63\x74\x73"))) {
        goto IH;
    }
    $YN = array($nX => LicenseHelper::getNewEnvironmentObject($T1));
    update_option("\x6d\x6f\137\x73\x61\155\154\137\145\156\x76\151\162\157\156\x6d\145\x6e\x74\137\x6f\142\x6a\145\x63\164\163", $YN);
    IH:
    update_option("\155\157\x5f\163\141\155\x6c\137\x73\145\x6c\145\143\164\x65\x64\x5f\x65\156\x76\151\x72\x6f\x6e\x6d\x65\x6e\164", $nX);
}
function updateLicenseObjects($X8)
{
    $SQ = array();
    $Wv = array();
    if (empty($X8["\155\157\x5f\163\x61\155\x6c\137\145\x6e\x76\x69\162\x6f\x6e\x6d\145\x6e\x74\x5f\156\x61\x6d\x65\163"])) {
        goto a5;
    }
    $SQ = $X8["\x6d\157\x5f\163\141\155\x6c\x5f\145\156\x76\x69\x72\157\x6e\x6d\145\156\x74\137\156\x61\x6d\145\163"];
    a5:
    if (empty($X8["\155\157\x5f\163\141\x6d\x6c\137\x65\x6e\166\151\162\157\156\x6d\145\156\164\137\x75\x72\154\x73"])) {
        goto od;
    }
    $Wv = $X8["\x6d\x6f\137\163\x61\155\x6c\x5f\x65\156\166\151\x72\x6f\156\155\145\x6e\x74\137\x75\162\x6c\163"];
    od:
    if (!(isArrayWithDuplicateEntries($SQ) || isArrayWithDuplicateEntries($Wv) || isCurrentEnvironmentRemoved($Wv))) {
        goto mR;
    }
    return false;
    mR:
    $u2 = array_combine($SQ, $Wv);
    $u2 = array_filter($u2);
    $Z6 = createEnvironmentObjectsForEnvironments($u2);
    update_option("\x6d\x6f\x5f\x73\x61\x6d\x6c\137\x65\x6e\x76\151\162\x6f\x6e\155\x65\156\x74\x5f\157\142\x6a\x65\x63\x74\x73", $Z6);
    return true;
}
function mo_saml_filter_environmentObjects($Z6, $u2)
{
    foreach ($Z6 as $nt => $xm) {
        if (!is_a($xm, "\x4c\151\143\x65\156\x73\145\x4f\142\x6a\145\x63\x74")) {
            goto lL;
        }
        if (!(empty($nt) || empty($xm->getWpSiteUrl()) || empty($u2[$nt]))) {
            goto Zf;
        }
        unset($Z6[$nt]);
        Zf:
        lL:
        p6:
    }
    Vr:
    return $Z6;
}
function isArrayWithDuplicateEntries($u2)
{
    $uS = array_unique($u2);
    if (count($u2) != count($uS)) {
        goto vv;
    }
    return false;
    goto lK;
    vv:
    return true;
    lK:
}
function createEnvironmentObjectsForEnvironments($u2)
{
    $Z6 = get_option("\x6d\157\137\x73\141\x6d\x6c\x5f\145\x6e\166\x69\162\157\x6e\x6d\145\156\164\x5f\157\x62\x6a\145\143\164\x73");
    $Zb = LicenseHelper::getCurrentEnvironment();
    $uC = !empty($Z6[$Zb]) ? $Z6[$Zb]->getPluginSettings() : null;
    foreach ($u2 as $J_ => $gA) {
        $m8 = $gA;
        if (!(substr($m8, -1) == "\x2f")) {
            goto M4;
        }
        $m8 = substr($m8, 0, -1);
        M4:
        $nW = LicenseHelper::fetchExistingEnvironmentName($J_, $gA);
        if (!empty($nW)) {
            goto Xy;
        }
        $rK = new LicenseObject($m8);
        $Z6[$J_] = $rK;
        $rK->setPluginSettings($uC);
        goto xU;
        Xy:
        $Rp = $Z6[$nW];
        $Rp->setWpSiteUrl($m8);
        unset($Z6[$nW]);
        $Z6[$J_] = $Rp;
        xU:
        W7:
    }
    OE:
    $Z6 = mo_saml_filter_environmentObjects($Z6, $u2);
    return $Z6;
}
function isCurrentEnvironmentRemoved($Wv)
{
    $sM = LicenseHelper::parseEnvironmentUrl(site_url());
    foreach ($Wv as $T0) {
        if (!($sM == LicenseHelper::parseEnvironmentUrl($T0))) {
            goto Rj;
        }
        return false;
        Rj:
        kt:
    }
    A6:
    return true;
}

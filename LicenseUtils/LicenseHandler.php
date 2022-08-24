<?php


function initializeLicenseObjectArray()
{
    $m_ = get_bloginfo("\x6e\x61\x6d\145");
    $JN = site_url();
    if (!empty(get_option("\x6d\x6f\x5f\163\x61\155\154\137\145\156\x76\x69\x72\x6f\156\155\145\156\x74\137\157\x62\x6a\x65\143\x74\x73"))) {
        goto gs;
    }
    $Hh = array($m_ => LicenseHelper::getNewEnvironmentObject($JN));
    update_option("\155\157\137\163\141\x6d\154\137\145\156\166\151\x72\x6f\x6e\155\x65\156\x74\x5f\157\142\152\145\x63\x74\x73", $Hh);
    gs:
    update_option("\155\x6f\x5f\163\141\x6d\154\137\x73\x65\x6c\145\143\x74\x65\144\137\x65\x6e\166\x69\x72\x6f\x6e\155\145\156\x74", $m_);
}
function updateLicenseObjects($QR)
{
    $MS = array();
    $pv = array();
    if (!checkIssetAndEmpty($QR, "\x6d\x6f\137\163\141\155\x6c\137\145\156\x76\x69\x72\x6f\156\x6d\x65\x6e\x74\137\156\x61\155\145\163")) {
        goto Jk;
    }
    $MS = $QR["\155\157\137\x73\141\x6d\x6c\x5f\145\x6e\166\151\162\x6f\x6e\x6d\145\156\x74\137\156\141\x6d\145\x73"];
    Jk:
    if (!checkIssetAndEmpty($QR, "\x6d\157\x5f\163\141\x6d\x6c\137\145\x6e\166\151\162\x6f\156\155\145\156\x74\137\165\162\154\163")) {
        goto Wz;
    }
    $pv = $QR["\155\157\137\x73\141\155\x6c\x5f\145\156\x76\151\x72\x6f\x6e\x6d\x65\x6e\164\x5f\x75\x72\154\163"];
    Wz:
    if (!(isArrayWithDuplicateEntries($MS) || isArrayWithDuplicateEntries($pv) || isCurrentEnvironmentRemoved($pv))) {
        goto Se;
    }
    return false;
    Se:
    $Ie = array_combine($MS, $pv);
    $Ie = array_filter($Ie);
    $Bc = createEnvironmentObjectsForEnvironments($Ie);
    update_option("\x6d\157\137\x73\141\x6d\154\x5f\145\x6e\x76\151\x72\x6f\156\x6d\x65\x6e\x74\x5f\157\x62\x6a\x65\x63\x74\x73", $Bc);
    return true;
}
function checkIssetAndEmpty($iR, $QP)
{
    if (!(isset($iR[$QP]) and !empty($iR[$QP]))) {
        goto TX;
    }
    return true;
    TX:
    return false;
}
function mo_saml_filter_environmentObjects($Bc, $Ie)
{
    foreach ($Bc as $TT => $co) {
        if (!(empty($TT) || empty($co->getWpSiteUrl()) || !array_key_exists($TT, $Ie))) {
            goto JM;
        }
        unset($Bc[$TT]);
        JM:
        g_:
    }
    Ke:
    return $Bc;
}
function isArrayWithDuplicateEntries($Ie)
{
    $JB = array_unique($Ie);
    if (count($Ie) != count($JB)) {
        goto XZ;
    }
    return false;
    goto it;
    XZ:
    return true;
    it:
}
function createEnvironmentObjectsForEnvironments($Ie)
{
    $Bc = get_option("\155\x6f\137\163\x61\155\x6c\x5f\145\x6e\x76\x69\162\157\156\x6d\145\156\x74\137\157\142\x6a\x65\143\164\163");
    $J7 = LicenseHelper::getCurrentEnvironment();
    $Wc = isset($Bc[$J7]) ? $Bc[$J7]->getPluginSettings() : null;
    foreach ($Ie as $rt => $hD) {
        $eG = $hD;
        if (!(substr($eG, -1) == "\57")) {
            goto p4;
        }
        $eG = substr($eG, 0, -1);
        p4:
        $wH = LicenseHelper::fetchExistingEnvironmentName($rt, $hD);
        if (!empty($wH)) {
            goto WR;
        }
        $Vg = new LicenseObject($eG);
        $Bc[$rt] = $Vg;
        $Vg->setPluginSettings($Wc);
        goto ft;
        WR:
        $c6 = $Bc[$wH];
        $c6->setWpSiteUrl($eG);
        unset($Bc[$wH]);
        $Bc[$rt] = $c6;
        ft:
        XS:
    }
    eB:
    $Bc = mo_saml_filter_environmentObjects($Bc, $Ie);
    return $Bc;
}
function isCurrentEnvironmentRemoved($pv)
{
    $su = LicenseHelper::parseEnvironmentUrl(site_url());
    foreach ($pv as $Yn) {
        if (!($su == LicenseHelper::parseEnvironmentUrl($Yn))) {
            goto NE;
        }
        return false;
        NE:
        Xu:
    }
    Ot:
    return true;
}

<?php


function initializeLicenseObjectArray()
{
    $cE = get_bloginfo("\x6e\x61\x6d\x65");
    $b6 = site_url();
    if (!empty(get_option("\x6d\157\x5f\163\141\155\x6c\137\145\156\166\x69\162\157\x6e\x6d\145\x6e\164\x5f\x6f\x62\x6a\x65\143\164\x73"))) {
        goto Df;
    }
    $I7 = array($cE => LicenseHelper::getNewEnvironmentObject($b6));
    update_option("\155\x6f\x5f\x73\x61\155\x6c\137\145\156\166\151\162\157\x6e\x6d\x65\x6e\x74\137\x6f\x62\152\x65\143\x74\x73", $I7);
    Df:
    update_option("\x6d\x6f\x5f\163\141\x6d\154\x5f\x73\x65\x6c\x65\143\164\x65\144\x5f\145\156\x76\151\162\157\156\155\145\x6e\164", $cE);
}
function updateLicenseObjects($Hx)
{
    $ub = array();
    $xh = array();
    if (!checkIssetAndEmpty($Hx, "\x6d\157\137\x73\141\155\154\137\x65\x6e\166\x69\162\157\156\155\x65\156\164\x5f\156\x61\x6d\x65\163")) {
        goto E2;
    }
    $ub = $Hx["\155\x6f\x5f\163\141\x6d\x6c\137\x65\x6e\x76\x69\162\157\156\155\145\156\x74\137\x6e\141\155\145\163"];
    E2:
    if (!checkIssetAndEmpty($Hx, "\x6d\157\137\x73\141\x6d\154\x5f\145\156\x76\151\x72\x6f\x6e\155\145\x6e\164\137\165\x72\x6c\163")) {
        goto eZ;
    }
    $xh = $Hx["\x6d\157\137\x73\141\x6d\x6c\x5f\145\x6e\166\x69\x72\x6f\x6e\x6d\x65\156\x74\137\x75\x72\x6c\163"];
    eZ:
    if (!(isArrayWithDuplicateEntries($ub) || isArrayWithDuplicateEntries($xh) || isCurrentEnvironmentRemoved($xh))) {
        goto bm;
    }
    return false;
    bm:
    $CN = array_combine($ub, $xh);
    $CN = array_filter($CN);
    $oa = createEnvironmentObjectsForEnvironments($CN);
    update_option("\x6d\x6f\x5f\163\141\x6d\154\137\145\x6e\x76\151\x72\157\156\x6d\x65\156\164\x5f\157\x62\152\145\x63\164\x73", $oa);
    return true;
}
function checkIssetAndEmpty($CP, $o8)
{
    if (!(isset($CP[$o8]) and !empty($CP[$o8]))) {
        goto nC;
    }
    return true;
    nC:
    return false;
}
function mo_saml_filter_environmentObjects($oa, $CN)
{
    foreach ($oa as $Ng => $cM) {
        if (!(empty($Ng) || empty($cM->getWpSiteUrl()) || !array_key_exists($Ng, $CN))) {
            goto nX;
        }
        unset($oa[$Ng]);
        nX:
        f0:
    }
    Ub:
    return $oa;
}
function isArrayWithDuplicateEntries($CN)
{
    $Ty = array_unique($CN);
    if (count($CN) != count($Ty)) {
        goto Xy;
    }
    return false;
    goto f9;
    Xy:
    return true;
    f9:
}
function createEnvironmentObjectsForEnvironments($CN)
{
    $oa = get_option("\155\x6f\137\x73\141\155\x6c\137\145\x6e\x76\x69\x72\157\x6e\x6d\x65\x6e\x74\x5f\157\142\x6a\145\x63\164\x73");
    $ts = LicenseHelper::getCurrentEnvironment();
    $ut = isset($oa[$ts]) ? $oa[$ts]->getPluginSettings() : null;
    foreach ($CN as $ks => $GV) {
        $uV = $GV;
        if (!(substr($uV, -1) == "\x2f")) {
            goto E7;
        }
        $uV = substr($uV, 0, -1);
        E7:
        $DL = LicenseHelper::fetchExistingEnvironmentName($ks, $GV);
        if (!empty($DL)) {
            goto lA;
        }
        $pb = new LicenseObject($uV);
        $oa[$ks] = $pb;
        $pb->setPluginSettings($ut);
        goto AV;
        lA:
        $hA = $oa[$DL];
        $hA->setWpSiteUrl($uV);
        unset($oa[$DL]);
        $oa[$ks] = $hA;
        AV:
        Hh:
    }
    rP:
    $oa = mo_saml_filter_environmentObjects($oa, $CN);
    return $oa;
}
function isCurrentEnvironmentRemoved($xh)
{
    $Tz = LicenseHelper::parseEnvironmentUrl(site_url());
    foreach ($xh as $la) {
        if (!($Tz == LicenseHelper::parseEnvironmentUrl($la))) {
            goto vE;
        }
        return false;
        vE:
        dh:
    }
    AJ:
    return true;
}

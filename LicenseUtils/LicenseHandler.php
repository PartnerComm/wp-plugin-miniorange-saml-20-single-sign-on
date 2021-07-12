<?php


function initializeLicenseObjectArray()
{
    $Ry = get_bloginfo("\156\141\155\x65");
    $Li = site_url();
    if (!empty(get_option("\155\157\137\x73\x61\x6d\154\x5f\x65\156\x76\151\162\157\x6e\x6d\x65\x6e\x74\x5f\157\x62\x6a\x65\x63\164\163"))) {
        goto s2;
    }
    $zG = array($Ry => LicenseHelper::getNewEnvironmentObject($Li));
    update_option("\155\157\137\x73\141\155\154\137\x65\156\166\x69\x72\x6f\156\x6d\145\156\x74\x5f\157\x62\x6a\145\143\x74\163", $zG);
    s2:
    update_option("\x6d\157\x5f\x73\141\155\154\x5f\x73\x65\x6c\145\x63\x74\x65\x64\x5f\x65\x6e\x76\151\x72\x6f\x6e\x6d\145\x6e\164", $Ry);
}
function updateLicenseObjects($uy)
{
    $zI = array();
    $G2 = array();
    if (!checkIssetAndEmpty($uy, "\155\x6f\x5f\x73\x61\155\154\137\145\x6e\166\x69\x72\157\x6e\155\x65\156\x74\137\x6e\141\155\145\x73")) {
        goto BE;
    }
    $zI = $uy["\x6d\157\137\163\141\155\x6c\137\145\x6e\166\151\162\157\156\x6d\x65\x6e\x74\137\156\141\x6d\145\163"];
    BE:
    if (!checkIssetAndEmpty($uy, "\155\x6f\x5f\x73\x61\x6d\154\137\x65\x6e\166\151\x72\157\x6e\155\145\x6e\164\137\x75\162\x6c\163")) {
        goto pa;
    }
    $G2 = $uy["\155\157\137\163\141\x6d\x6c\137\x65\156\166\x69\162\x6f\x6e\155\145\156\x74\137\x75\x72\154\x73"];
    pa:
    if (!(isArrayWithDuplicateEntries($zI) || isArrayWithDuplicateEntries($G2) || isCurrentEnvironmentRemoved($G2))) {
        goto Jn;
    }
    return false;
    Jn:
    $VO = array_combine($zI, $G2);
    $VO = array_filter($VO);
    $qW = createEnvironmentObjectsForEnvironments($VO);
    update_option("\x6d\x6f\x5f\163\141\x6d\154\137\x65\156\x76\x69\x72\157\x6e\x6d\145\x6e\x74\137\x6f\x62\x6a\145\x63\164\x73", $qW);
    return true;
}
function checkIssetAndEmpty($gc, $RP)
{
    if (!(isset($gc[$RP]) and !empty($gc[$RP]))) {
        goto j8;
    }
    return true;
    j8:
    return false;
}
function mo_saml_filter_environmentObjects($qW, $VO)
{
    foreach ($qW as $kc => $J7) {
        if (!(empty($kc) || empty($J7->getWpSiteUrl()) || !array_key_exists($kc, $VO))) {
            goto LC;
        }
        unset($qW[$kc]);
        LC:
        Mq:
    }
    Qd:
    return $qW;
}
function isArrayWithDuplicateEntries($VO)
{
    $lp = array_unique($VO);
    if (count($VO) != count($lp)) {
        goto pn;
    }
    return false;
    goto ty;
    pn:
    return true;
    ty:
}
function createEnvironmentObjectsForEnvironments($VO)
{
    $qW = get_option("\x6d\157\x5f\x73\141\x6d\154\x5f\x65\156\166\151\x72\157\x6e\x6d\145\156\x74\x5f\157\x62\152\145\143\x74\x73");
    $MM = LicenseHelper::getCurrentEnvironment();
    $qp = isset($qW[$MM]) ? $qW[$MM]->getPluginSettings() : null;
    foreach ($VO as $qZ => $xz) {
        $dZ = $xz;
        if (!(substr($dZ, -1) == "\57")) {
            goto Fy;
        }
        $dZ = substr($dZ, 0, -1);
        Fy:
        $rn = LicenseHelper::fetchExistingEnvironmentName($qZ, $xz);
        if (!empty($rn)) {
            goto BD;
        }
        $WC = new LicenseObject($dZ);
        $qW[$qZ] = $WC;
        $WC->setPluginSettings($qp);
        goto vN;
        BD:
        $ZZ = $qW[$rn];
        $ZZ->setWpSiteUrl($dZ);
        unset($qW[$rn]);
        $qW[$qZ] = $ZZ;
        vN:
        nR:
    }
    Kn:
    $qW = mo_saml_filter_environmentObjects($qW, $VO);
    return $qW;
}
function isCurrentEnvironmentRemoved($G2)
{
    $FI = LicenseHelper::parseEnvironmentUrl(site_url());
    foreach ($G2 as $Nj) {
        if (!($FI == LicenseHelper::parseEnvironmentUrl($Nj))) {
            goto GE;
        }
        return false;
        GE:
        ku:
    }
    JT:
    return true;
}

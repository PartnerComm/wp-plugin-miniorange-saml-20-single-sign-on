<?php


function initializeLicenseObjectArray()
{
    $NQ = get_bloginfo("\156\x61\x6d\x65");
    $jq = site_url();
    if (!empty(get_option("\x6d\x6f\137\163\x61\x6d\154\x5f\x65\156\166\x69\x72\x6f\x6e\155\x65\x6e\164\137\157\x62\152\145\x63\x74\x73"))) {
        goto ke;
    }
    $ka = array($NQ => LicenseHelper::getNewEnvironmentObject($jq));
    update_option("\x6d\157\137\163\141\x6d\154\137\145\x6e\166\151\x72\x6f\x6e\155\145\156\164\137\157\142\152\x65\143\164\163", $ka);
    ke:
    update_option("\155\x6f\x5f\x73\x61\x6d\x6c\x5f\163\145\154\x65\x63\x74\x65\144\137\x65\156\x76\x69\162\x6f\156\155\x65\x6e\164", $NQ);
}
function updateLicenseObjects($Th)
{
    $V4 = array();
    $mL = array();
    if (empty($Th["\x6d\157\x5f\x73\x61\x6d\x6c\137\145\156\166\151\162\x6f\x6e\155\145\156\164\x5f\x6e\x61\155\x65\x73"])) {
        goto RX;
    }
    $V4 = $Th["\x6d\x6f\x5f\163\x61\155\154\137\145\156\x76\151\x72\x6f\156\x6d\x65\156\164\137\156\141\155\145\163"];
    RX:
    if (empty($Th["\155\157\x5f\x73\x61\155\154\x5f\145\156\166\x69\x72\x6f\156\155\145\x6e\x74\x5f\165\x72\154\163"])) {
        goto G5;
    }
    $mL = $Th["\155\157\137\x73\141\155\154\137\x65\156\166\151\x72\157\x6e\x6d\x65\156\164\137\165\x72\x6c\x73"];
    G5:
    if (!(isArrayWithDuplicateEntries($V4) || isArrayWithDuplicateEntries($mL) || isCurrentEnvironmentRemoved($mL))) {
        goto cx;
    }
    return false;
    cx:
    $je = array_combine($V4, $mL);
    $je = array_filter($je);
    $e8 = createEnvironmentObjectsForEnvironments($je);
    update_option("\x6d\x6f\x5f\163\x61\x6d\x6c\x5f\145\156\166\x69\x72\157\156\x6d\x65\x6e\164\137\157\x62\152\x65\x63\x74\x73", $e8);
    return true;
}
function mo_saml_filter_environmentObjects($e8, $je)
{
    foreach ($e8 as $T4 => $Qs) {
        if (!(empty($T4) || empty($Qs->getWpSiteUrl()) || empty($je[$T4]))) {
            goto CG;
        }
        unset($e8[$T4]);
        CG:
        bi:
    }
    oB:
    return $e8;
}
function isArrayWithDuplicateEntries($je)
{
    $ND = array_unique($je);
    if (count($je) != count($ND)) {
        goto el;
    }
    return false;
    goto gI;
    el:
    return true;
    gI:
}
function createEnvironmentObjectsForEnvironments($je)
{
    $e8 = get_option("\x6d\x6f\x5f\163\141\x6d\x6c\x5f\x65\156\x76\151\x72\x6f\x6e\155\x65\x6e\164\x5f\x6f\x62\152\145\143\x74\163");
    $jQ = LicenseHelper::getCurrentEnvironment();
    $qb = !empty($e8[$jQ]) ? $e8[$jQ]->getPluginSettings() : null;
    foreach ($je as $e1 => $of) {
        $q4 = $of;
        if (!(substr($q4, -1) == "\57")) {
            goto Yj;
        }
        $q4 = substr($q4, 0, -1);
        Yj:
        $k9 = LicenseHelper::fetchExistingEnvironmentName($e1, $of);
        if (!empty($k9)) {
            goto Cp;
        }
        $UM = new LicenseObject($q4);
        $e8[$e1] = $UM;
        $UM->setPluginSettings($qb);
        goto Gq;
        Cp:
        $Yq = $e8[$k9];
        $Yq->setWpSiteUrl($q4);
        unset($e8[$k9]);
        $e8[$e1] = $Yq;
        Gq:
        Nu:
    }
    iZ:
    $e8 = mo_saml_filter_environmentObjects($e8, $je);
    return $e8;
}
function isCurrentEnvironmentRemoved($mL)
{
    $uX = LicenseHelper::parseEnvironmentUrl(site_url());
    foreach ($mL as $mf) {
        if (!($uX == LicenseHelper::parseEnvironmentUrl($mf))) {
            goto Ns;
        }
        return false;
        Ns:
        Wj:
    }
    PC:
    return true;
}

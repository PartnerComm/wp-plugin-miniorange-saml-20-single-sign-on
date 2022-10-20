<?php


function mo_save_environment_settings($Hx)
{
    if (get_option("\155\x6f\x5f\x65\x6e\141\142\154\145\137\x6d\165\154\x74\151\160\154\145\x5f\154\151\x63\145\x6e\x73\145\x73")) {
        goto pD;
    }
    return false;
    pD:
    $xM = LicenseHelper::getSelectedEnvironment();
    $cV = get_option("\155\x6f\137\x73\141\155\x6c\x5f\x65\x6e\166\151\162\x6f\156\x6d\145\156\164\x5f\157\x62\x6a\145\143\x74\x73");
    if (!($cV and isset($cV[$xM]))) {
        goto f3;
    }
    $cV[$xM]->setPluginSettings($Hx, true);
    f3:
    update_option("\x6d\x6f\137\163\x61\155\x6c\x5f\145\156\166\151\x72\157\156\155\x65\156\164\x5f\157\x62\x6a\145\x63\x74\163", $cV);
    return true;
}

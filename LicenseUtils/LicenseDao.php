<?php


function mo_save_environment_settings($Th)
{
    if (get_option("\155\157\x5f\145\156\141\x62\154\145\137\155\165\154\x74\x69\160\x6c\x65\137\x6c\x69\x63\x65\156\163\x65\x73")) {
        goto EX;
    }
    return false;
    EX:
    $Pu = LicenseHelper::getSelectedEnvironment();
    $v1 = get_option("\155\x6f\137\x73\141\155\154\137\145\156\x76\x69\162\x6f\x6e\155\145\x6e\164\137\x6f\142\x6a\x65\x63\164\x73");
    if (!($v1 and isset($v1[$Pu]))) {
        goto eD;
    }
    $v1[$Pu]->setPluginSettings($Th, true);
    eD:
    update_option("\155\157\137\x73\141\155\x6c\x5f\145\156\x76\x69\x72\x6f\156\155\145\156\164\x5f\x6f\x62\x6a\145\143\164\x73", $v1);
    return true;
}

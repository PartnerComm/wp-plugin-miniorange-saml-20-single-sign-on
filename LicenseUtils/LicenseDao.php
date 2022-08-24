<?php


function mo_save_environment_settings($QR)
{
    if (get_option("\155\157\x5f\145\156\x61\x62\x6c\x65\137\x6d\165\154\164\151\160\x6c\x65\x5f\x6c\x69\143\145\156\x73\145\163")) {
        goto rq;
    }
    return false;
    rq:
    $W2 = LicenseHelper::getSelectedEnvironment();
    $XO = get_option("\x6d\x6f\x5f\x73\141\x6d\x6c\137\x65\156\x76\x69\x72\157\x6e\x6d\145\x6e\164\137\x6f\x62\x6a\x65\143\x74\x73");
    if (!($XO and isset($XO[$W2]))) {
        goto l0;
    }
    $XO[$W2]->setPluginSettings($QR, true);
    l0:
    update_option("\x6d\157\137\163\141\155\154\x5f\x65\156\166\151\162\x6f\x6e\155\x65\156\164\137\157\142\x6a\x65\x63\164\x73", $XO);
    return true;
}

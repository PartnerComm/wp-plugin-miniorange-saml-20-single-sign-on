<?php


function mo_save_environment_settings($uy)
{
    if (get_option("\x6d\x6f\x5f\x65\156\141\x62\x6c\145\x5f\x6d\x75\x6c\164\151\160\x6c\x65\x5f\154\151\143\x65\156\163\x65\x73")) {
        goto EQ;
    }
    return false;
    EQ:
    $TE = LicenseHelper::getSelectedEnvironment();
    $ko = get_option("\155\x6f\x5f\x73\141\155\154\137\x65\x6e\166\x69\162\157\156\x6d\145\x6e\164\x5f\x6f\142\152\x65\143\164\163");
    if (!($ko and isset($ko[$TE]))) {
        goto A9;
    }
    $ko[$TE]->setPluginSettings($uy, true);
    A9:
    update_option("\155\157\x5f\x73\141\x6d\x6c\x5f\145\156\x76\151\x72\157\156\155\x65\156\164\137\157\x62\x6a\145\x63\164\163", $ko);
    return true;
}

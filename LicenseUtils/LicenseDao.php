<?php
/**
 * This file is a part of the miniorange-saml-20-single-sign-on plugin.
 *
 * @link https://plugins.miniorange.com/
 * @author miniOrange
 * @package miniorange-saml-20-single-sign-on
 */


function mo_save_environment_settings($X8)
{
    if (get_option("\155\x6f\137\x65\156\141\x62\x6c\145\x5f\x6d\x75\x6c\164\151\160\x6c\x65\x5f\x6c\151\x63\145\x6e\x73\x65\x73")) {
        goto WH;
    }
    return false;
    WH:
    $gW = LicenseHelper::getSelectedEnvironment();
    $Wf = get_option("\155\x6f\137\163\141\x6d\x6c\x5f\x65\156\x76\151\x72\157\156\155\x65\x6e\164\x5f\157\x62\152\145\x63\164\163");
    if (!($Wf and isset($Wf[$gW]))) {
        goto lU;
    }
    $Wf[$gW]->setPluginSettings($X8, true);
    lU:
    update_option("\155\157\137\x73\141\x6d\154\x5f\145\156\x76\x69\x72\157\x6e\x6d\x65\x6e\164\137\157\142\x6a\x65\143\x74\x73", $Wf);
    return true;
}

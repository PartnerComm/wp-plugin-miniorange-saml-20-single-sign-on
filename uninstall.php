<?php
/**
 * This file is a part of the miniorange-saml-20-single-sign-on plugin.
 *
 * @link https://plugins.miniorange.com/
 * @author miniOrange
 * @package miniorange-saml-20-single-sign-on
 */


define("\115\x4f\137\x53\101\x4d\114\x5f\x50\x4c\125\x47\x49\116\x5f\x44\111\x52", plugin_dir_path(__FILE__));
const OPTIONS_ENUM = "\x69\156\143\154\x75\144\145\x73\x2f\x6c\151\142\x2f\155\157\55\x6f\160\164\151\157\156\163\55\145\156\x75\155\x2e\x70\150\160";
require_once MO_SAML_PLUGIN_DIR . OPTIONS_ENUM;
require_once Mo_Saml_Plugin_Files::IMPORT_EXPORT;
define("\115\x6f\137\x53\x61\155\x6c\137\x55\156\x69\156\163\164\141\154\x6c\x5f\103\154\x61\x73\163\x5f\x4e\x61\x6d\145\x73", serialize(array("\123\123\117\x5f\114\157\x67\x69\156" => "\x4d\157\x5f\123\141\155\154\137\x4f\160\164\151\x6f\x6e\163\137\x45\x6e\x75\x6d\137\x53\x73\157\137\114\x6f\x67\151\x6e", "\x49\x64\x65\156\164\x69\x74\x79\137\x50\162\157\x76\x69\144\145\162" => "\x4d\157\x5f\123\x61\155\x6c\137\117\x70\x74\x69\x6f\156\x73\137\x45\x6e\x75\x6d\x5f\111\x64\x65\156\164\151\164\171\x5f\x50\162\x6f\166\x69\144\145\162", "\123\145\162\x76\151\143\x65\x5f\x50\162\x6f\166\x69\x64\x65\162" => "\115\x6f\137\x53\141\x6d\x6c\137\x4f\160\x74\x69\x6f\x6e\x73\x5f\105\x6e\165\x6d\x5f\x53\x65\162\x76\x69\x63\x65\137\120\x72\x6f\x76\x69\144\x65\162", "\101\x74\x74\162\x69\x62\x75\164\145\x5f\115\141\160\160\x69\x6e\x67" => "\115\157\137\x53\x61\155\x6c\137\117\160\x74\151\x6f\x6e\163\x5f\x45\x6e\165\x6d\x5f\x41\x74\x74\x72\x69\x62\165\x74\x65\x5f\115\141\160\x70\151\x6e\147", "\104\x6f\155\x61\x69\x6e\137\122\x65\163\x74\162\x69\x63\x74\x69\157\156" => "\x4d\x6f\137\x53\141\155\154\137\x4f\x70\164\151\x6f\156\163\137\x45\156\165\x6d\137\x44\157\x6d\141\151\156\137\122\145\x73\164\162\x69\x63\x74\x69\157\156", "\122\x6f\x6c\145\137\115\x61\160\160\x69\x6e\x67" => "\115\x6f\x5f\123\x61\155\154\x5f\117\160\x74\151\x6f\x6e\x73\x5f\105\x6e\165\x6d\x5f\x52\157\154\x65\137\x4d\x61\160\160\151\156\147", "\x54\145\163\164\x5f\103\x6f\x6e\x66\x69\x67\165\162\141\164\x69\x6f\x6e" => "\x4d\157\x5f\123\x61\155\x6c\x5f\117\x70\x74\x69\157\x6e\163\137\x45\156\x75\x6d\137\x54\x65\163\164\x5f\x43\157\156\x66\151\x67\x75\162\141\164\151\x6f\156", "\103\x75\163\x74\x6f\155\137\x43\145\x72\x74\x69\146\x69\143\x61\x74\145" => "\x4d\157\x5f\123\x61\x6d\154\137\117\160\x74\151\x6f\x6e\163\137\x45\x6e\165\155\137\x43\165\x73\164\x6f\x6d\137\x43\x65\162\164\x69\146\151\x63\x61\x74\x65", "\x43\x75\163\x74\x6f\x6d\x5f\x4d\145\x73\x73\x61\147\145" => "\115\157\137\x53\141\155\154\x5f\117\x70\164\151\x6f\x6e\163\x5f\x45\156\x75\x6d\137\103\165\x73\x74\157\155\137\x4d\145\163\163\141\147\x65\163", "\x50\x6c\165\x67\151\156\x5f\x41\144\155\151\x6e" => "\x4d\157\137\123\141\155\154\x5f\117\160\x74\151\x6f\x6e\163\x5f\120\154\165\147\151\156\137\x41\144\155\151\x6e", "\105\x6e\166\x69\x72\x6f\x6e\155\145\156\164\163" => "\x4d\x6f\137\123\x61\x6d\x6c\137\117\x70\164\x69\x6f\x6e\163\137\105\x6e\166\151\162\157\156\155\x65\156\164\163")));
if (defined("\x57\x50\137\x55\116\x49\x4e\123\x54\x41\x4c\x4c\137\x50\x4c\125\x47\x49\x4e")) {
    goto Rm5;
}
exit;
Rm5:
if (!(get_option("\155\157\x5f\163\x61\155\154\137\153\x65\145\160\137\163\x65\x74\164\x69\x6e\x67\x73\x5f\157\156\x5f\x64\x65\154\145\164\x69\x6f\156") !== "\x74\x72\x75\145")) {
    goto LGp;
}
if (!is_plugin_active_for_network(plugin_basename(dirname(__FILE__) . DIRECTORY_SEPARATOR . Mo_Saml_Plugin_Files::MAIN_PLUGIN_FILE))) {
    goto a5K;
}
global $wpdb;
$vS = $wpdb->get_col("\x53\105\x4c\x45\x43\124\x20\142\154\x6f\147\x5f\x69\x64\40\x46\122\x4f\115\x20{$wpdb->blogs}");
$TY = get_current_blog_id();
foreach ($vS as $blog_id) {
    switch_to_blog($blog_id);
    mo_saml_delete_plugin_configuration();
    mo_saml_delete_user_meta();
    UUc:
}
qYf:
switch_to_blog($TY);
goto aKR;
a5K:
mo_saml_delete_plugin_configuration();
mo_saml_delete_user_meta();
aKR:
LGp:
function mo_saml_delete_plugin_configuration()
{
    $mO = maybe_unserialize(Mo_Saml_Uninstall_Class_Names);
    $Cw = array();
    foreach ($mO as $mr => $Wl) {
        $Cw[$mr] = mo_get_configuration_array($Wl, true);
        Y5n:
    }
    Y1c:
    foreach ($Cw as $Hp => $RM) {
        foreach ($RM as $DG => $RW) {
            delete_option($RW);
            wNs:
        }
        wtf:
        FxP:
    }
    ojM:
}
function mo_saml_delete_user_meta()
{
    $Vp = get_users(array());
    foreach ($Vp as $user) {
        delete_user_meta($user->ID, "\x6d\157\137\x73\x61\155\154\137\165\x73\145\x72\137\141\x74\164\x72\x69\x62\x75\x74\145\x73");
        delete_user_meta($user->ID, "\155\157\x5f\x73\x61\x6d\154\x5f\x73\145\x73\x73\x69\x6f\156\x5f\151\x6e\144\145\x78");
        delete_user_meta($user->ID, "\x6d\157\137\163\x61\155\154\137\x6e\x61\155\145\x5f\151\x64");
        DNe:
    }
    a60:
}

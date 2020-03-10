<?php


require_once dirname(__FILE__) . "\57\x69\x6e\x63\154\165\x64\x65\x73\x2f\154\151\x62\57\x6d\157\x2d\x6f\x70\x74\x69\x6f\x6e\x73\x2d\145\x6e\x75\x6d\56\x70\x68\160";
require_once dirname(__FILE__) . "\57\111\155\x70\x6f\x72\x74\55\145\x78\160\x6f\162\164\x2e\160\150\160";
define("\125\x6e\x69\156\163\x74\141\154\x6c\x5f\x43\154\141\x73\x73\137\x4e\x61\155\x65\163", serialize(array("\123\123\117\x5f\114\x6f\x67\x69\x6e" => "\x6d\x6f\x5f\157\x70\x74\151\157\x6e\x73\x5f\x65\x6e\165\155\x5f\x73\x73\157\x5f\x6c\x6f\147\151\x6e", "\111\x64\x65\156\x74\x69\x74\171\137\x50\162\x6f\x76\151\144\x65\162" => "\155\157\137\157\x70\164\x69\157\x6e\163\137\x65\x6e\x75\155\137\x69\144\x65\x6e\164\151\164\x79\x5f\160\162\157\x76\151\x64\145\x72", "\x53\145\162\x76\151\x63\x65\x5f\120\x72\x6f\166\x69\x64\x65\162" => "\155\157\x5f\x6f\x70\164\151\157\156\163\137\145\156\x75\x6d\137\x73\x65\x72\x76\x69\143\x65\137\x70\162\x6f\166\151\x64\x65\162", "\x41\x74\x74\x72\x69\x62\165\x74\145\137\x4d\141\x70\x70\x69\x6e\x67" => "\155\x6f\137\157\160\x74\x69\157\156\163\x5f\x65\156\165\155\x5f\x61\x74\164\162\151\x62\x75\x74\145\x5f\x6d\x61\x70\x70\151\x6e\x67", "\x44\157\x6d\x61\x69\156\x5f\122\145\163\x74\162\151\x63\x74\151\x6f\156" => "\155\157\x5f\157\x70\x74\x69\x6f\156\163\x5f\145\156\165\155\x5f\144\x6f\x6d\x61\x69\x6e\137\x72\145\x73\164\x72\151\x63\164\x69\157\156", "\122\157\154\x65\137\115\x61\x70\x70\151\156\147" => "\155\x6f\137\x6f\x70\x74\x69\x6f\156\163\x5f\145\x6e\x75\x6d\137\162\x6f\x6c\145\x5f\x6d\141\x70\x70\x69\156\x67", "\x54\x65\163\164\x5f\x43\157\x6e\146\151\x67\165\162\x61\x74\151\x6f\x6e" => "\155\x6f\x5f\x6f\x70\x74\151\157\x6e\x73\x5f\145\156\x75\155\x5f\164\145\163\164\137\143\157\x6e\146\151\147\165\x72\141\x74\x69\157\156", "\x43\165\x73\x74\x6f\x6d\x5f\103\145\x72\x74\x69\x66\151\x63\141\164\145" => "\x6d\x6f\x5f\x6f\160\x74\151\x6f\x6e\163\x5f\145\156\x75\x6d\137\x63\165\x73\x74\157\x6d\x5f\x63\x65\162\x74\x69\146\151\143\141\x74\145", "\103\165\163\164\x6f\155\137\x4d\x65\163\163\x61\147\x65" => "\155\157\x5f\x6f\x70\x74\x69\157\156\x73\137\x65\156\x75\x6d\x5f\143\165\163\164\157\155\137\155\145\x73\163\x61\x67\x65\163", "\120\154\x75\x67\151\156\137\x41\x64\x6d\x69\x6e" => "\x6d\157\137\x6f\x70\164\151\x6f\x6e\163\x5f\160\x6c\x75\x67\x69\156\x5f\x61\144\x6d\x69\156")));
if (defined("\127\120\137\x55\x4e\x49\x4e\x53\x54\101\114\x4c\137\120\x4c\x55\107\x49\x4e")) {
    goto WT;
}
die;
WT:
if (!(get_option("\x6d\157\137\163\141\155\154\137\153\145\145\160\x5f\163\x65\164\164\x69\156\147\163\137\157\x6e\x5f\144\x65\154\145\164\151\157\x6e") !== "\x74\x72\165\145")) {
    goto Hu;
}
if (!is_multisite()) {
    goto uO;
}
global $wpdb;
$TH = $wpdb->get_col("\x53\x45\x4c\105\103\x54\40\142\x6c\x6f\x67\x5f\x69\144\x20\106\122\x4f\115\x20{$wpdb->blogs}");
$FR = get_current_blog_id();
foreach ($TH as $blog_id) {
    switch_to_blog($blog_id);
    mo_saml_delete_plugin_configuration();
    mo_saml_delete_user_meta();
    F0:
}
ok:
switch_to_blog($FR);
goto MR;
uO:
mo_saml_delete_plugin_configuration();
mo_saml_delete_user_meta();
MR:
Hu:
function mo_saml_delete_plugin_configuration()
{
    $HL = unserialize(Uninstall_Class_Names);
    $at = array();
    foreach ($HL as $k3 => $zw) {
        $at[$k3] = mo_get_configuration_array($zw, true);
        c_:
    }
    HO:
    foreach ($at as $lu => $dT) {
        foreach ($dT as $rH => $qT) {
            delete_option($qT);
            qQ:
        }
        Ef:
        JY:
    }
    ix:
}
function mo_saml_delete_user_meta()
{
    $A3 = get_users(array());
    foreach ($A3 as $user) {
        delete_user_meta($user->ID, "\155\157\137\163\141\155\154\x5f\165\x73\145\x72\x5f\141\164\164\x72\151\x62\165\x74\145\x73");
        delete_user_meta($user->ID, "\x6d\x6f\137\x73\141\155\x6c\137\x73\145\x73\163\151\157\x6e\137\151\x6e\x64\x65\x78");
        delete_user_meta($user->ID, "\x6d\x6f\137\x73\141\155\154\x5f\x6e\x61\x6d\x65\137\151\x64");
        u8:
    }
    BC:
}
?>
